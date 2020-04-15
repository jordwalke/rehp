open Stdlib;

type macroData = {
  macro: string,
  backend: string,
  callerLoc: option(Parse_info.t),
};

/**
 * When finding a raw-macro, we will:
 * - Grab the string that comes immediately after raw-macro.
 * - Remove one possible newline after the word raw-macro.
 * - Remove one possible newline at the end of the string.
 * - Trim all leading whitespace on all lines according to the smallest amount
 * of whitespace found on any of the non-empty lines.
 * - Then within each macro we will also remove one potential leading newline
 * and ending newline inside the tags.
 *
 * So the following:
 *
 * external foo : type = "
 *     raw-macro:
 *     <js>
 *       stuff here
 *     </js>
 * ";
 *
 * Is equivalent to:
 *
 * external foo : type = "raw-macro:<js>stuff here</js>";
 *
 * - You may force there to be a newline in any by writing two newlines.
 *
 * external foo : type = "
 *     raw-macro:
 *
 *     <js>
 *
 *       stuff here
 *
 *     </js>
 * ";
 *
 * external foo : type = "
 *   raw-macro:
 * ";
 */
let removeLeadingNewline = s => {
  let len = String.length(s);
  len === 0 ? s : s.[0] === '\n' ? String.sub(s, ~pos=1, ~len=len - 1) : s;
};

let removeTrailingNewline = s => {
  let len = String.length(s);
  len === 0
    ? s : s.[len - 1] === '\n' ? String.sub(s, ~pos=0, ~len=len - 1) : s;
};

let removeBookendNewlines = s =>
  removeLeadingNewline(removeTrailingNewline(s));

let rec minLeadingNonEmptySpaces = (minSoFar, l) => {
  String.is_empty(l)
    ? minSoFar : min(String.num_leading_char(' ', l), minSoFar);
};

let rec normalizeLeading = text => {
  let lines = String.split(~sep="\n", text);
  let min = List.fold_left(~f=minLeadingNonEmptySpaces, ~init=100, lines);
  let lines =
    List.map(lines, ~f=line =>
      String.(
        is_empty(line) ? line : sub(~pos=min, ~len=length(line) - min, line)
      )
    );
  String.concat(~sep="\n", lines);
};

let formatForError = s => {
  let s = removeBookendNewlines(s);
  let s = normalizeLeading(s);
  String.split_on_char('\n', s)
  |> List.map(~f=ln => "    " ++ ln)
  |> String.concat(~sep="\n");
};

/**
 * Exception for problems that the user is responsible for - something wrong
 * with their code for example.
 * Could be used beyond macros as well. Used to surface a user facing message
 * with potential file/lineno.
 */
exception UserError(string, option(Parse_info.t));

let commonError = {|There is a problem with the macro being called at this approximate location.|};

type tokens =
  | TOpen(string)
  | TClose(string)
  | TSelfClose(string)
  | TRaw(string);

type node =
  | Node(string, list(node))
  | Raw(string);

type tokenizedTag =
  | Nothing
  | Gt(string, list(char))
  | SlashGt(string, list(char));

let raiseMacroUnsupportedTag = (tagName, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called was defined using unsupported tag (%s).
  The only supported macros are ones that specify portions to be used in backends such
  as <@js>...</@js> or argument substitution <@1 />. You can also supply multiple
  backends in one macro such as: external x : type = "raw-macro:<@js>...</@js><@php>...<@/php>)
  The macro contents are:
%s
|},
      commonError,
      tagName,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let raiseMalformedMacro = (specificError, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called has a parse error: %s.
  The macro contents are:
%s
|},
      commonError,
      specificError,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let raiseMalformedExtern =
    (specificError, (externTag, external_name), macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The external macro being called %s (%s) contains raw text in its children. %s.
  The macro contents are:
%s
|},
      commonError,
      externTag,
      external_name,
      specificError,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let raiseMacroCallIndexNotSupported = (i, len, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called uses index %d, but it should not.
  It can only use indices 1 - %d. Hint: The number of arguments in the `external`'s
  type has to be compatible with the macro nodes referenced (<@1> - <@%d/>).
  The macro contents are:
%s
|},
      commonError,
      i,
      len,
      len,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let is = nm => {
  let trimmed = String.trim(nm);
  switch (String.find_substring("raw-macro:", trimmed, 0)) {
  | exception Not_found => false
  | 0 => true
  | _ => false
  };
};

let extract = (~forBackend, ~loc=?, nm) => {
  let trimmed = String.trim(nm);
  let macro =
    switch (String.find_substring("raw-macro:", trimmed, 0)) {
    | exception Not_found => ""
    | 0 =>
      let posInNonTrimmed = String.find_substring("raw-macro:", nm, 0);
      let everythingAfterRawMacro =
        String.sub(
          ~pos=posInNonTrimmed + 10,
          ~len=String.length(nm) - 10 - posInNonTrimmed,
          nm,
        )
        |> removeBookendNewlines;
      normalizeLeading(everythingAfterRawMacro);
    | _ => ""
    };
  {macro, backend: forBackend, callerLoc: loc};
};

let rec nonEmptyUntilGt = (~rev=[], chars) =>
  switch (chars) {
  | [] => Nothing
  | ['/', '>', ...tl] => SlashGt(String.from_char_list(List.rev(rev)), tl)
  /* Ignore one newline after opening tag or before closing tag,
   * in this case it's after an opening tag. */
  | ['>', '\n', ...tl]
  | ['>', ...tl] => Gt(String.from_char_list(List.rev(rev)), tl)
  | [hd, ...tl] => nonEmptyUntilGt(~rev=[hd, ...rev], tl)
  };

let rec tokenize = (rawStack, next) => {
  let appendRawToHead = (rawStack, lst) =>
    switch (rawStack) {
    | [] => lst
    | [_, ..._] => [
        TRaw(String.from_char_list(List.rev(rawStack))),
        ...lst,
      ]
    };
  switch (rawStack, next) {
  | ([], [])
  | ([_, ..._], []) => appendRawToHead(rawStack, [])
  /* Ignore one newline after opening tag or before closing tag, in this case
   * it's before a closing tag */
  | (_, ['\n', '<' as first, '@' as second, '/' as third as kind, ...rest])
  | (_, ['\n', '<' as first, '/' as second as kind, '@' as third, ...rest])
  | (_, ['<' as first, '@' as second, '/' as third as kind, ...rest])
  | (_, ['<' as first, '/' as second as kind, '@' as third, ...rest])
  | (_, ['<' as first, '@' as second, _ as third as kind, ...rest]) =>
    let kindStr = String.make(1, kind);
    switch (nonEmptyUntilGt(rest)) {
    | Nothing => tokenize([first, second, third, ...rawStack], rest)
    | Gt(tag, rest) =>
      let token = kind === '/' ? TClose(tag) : TOpen(kindStr ++ tag);
      appendRawToHead(rawStack, [token, ...tokenize([], rest)]);
    | SlashGt(tag, rest) =>
      let token =
        kind === '/' ? TSelfClose(tag) : TSelfClose(kindStr ++ tag);
      appendRawToHead(rawStack, [token, ...tokenize([], rest)]);
    };
  | (_, [hd, ...rest]) => tokenize([hd, ...rawStack], rest)
  };
};

let rec parseNodeListImpl = (macroData, tokens) =>
  switch (tokens) {
  | [] => ([], [])
  | [TRaw(_), ...tl]
  | [TSelfClose(_), ...tl]
  | [TOpen(_), ...tl] =>
    let (node, remaining) = parseNodeImpl(macroData, tokens);
    let (otherChilren, remaining) = parseNodeListImpl(macroData, remaining);
    ([node, ...otherChilren], remaining);
  | [TClose(_), ..._] => ([], tokens)
  }
and parseNodeImpl = (macroData, tokens) =>
  switch (tokens) {
  | [] => raiseMalformedMacro("Inbalanced opening or closing tags", macroData)
  | [TClose(c), ...tl] =>
    raiseMalformedMacro("Closing token " ++ c ++ " has no opening", macroData)
  | [TRaw(r), ...tl] => (Raw(r), tl)
  | [TOpen(t), ...tl] =>
    let (nodeList, remaining) = parseNodeListImpl(macroData, tl);
    switch (remaining) {
    | [] =>
      raiseMalformedMacro(
        "Opening token " ++ t ++ " has no closing",
        macroData,
      )
    | [TClose(c), ...tl] when c == t => (Node(t, nodeList), tl)
    | _ =>
      raiseMalformedMacro(
        "Opening token " ++ t ++ " has mismatched or missing closing",
        macroData,
      )
    };
  | [TSelfClose(sc), ...tl] => (Node(sc, []), tl)
  }
and parseNodeList = macroData => {
  let tokens = tokenize([], String.to_char_list(macroData.macro));
  let (parsedNodeList, remaining) = parseNodeListImpl(macroData, tokens);
  if (remaining !== []) {
    raiseMalformedMacro(
      "The macro contains unmatched macro nodes at the end.",
      macroData,
    );
  };
  parsedNodeList;
};

let rec inOrderNode = (f, init, node) => {
  switch (node) {
  | Raw(r) => f(init, node)
  | Node(t, nodeList) =>
    let next = f(init, node);
    foldInOrder(f, next, nodeList);
  };
}
and foldInOrder = (f, init, nodeList) => {
  List.fold_left(~f=inOrderNode(f), ~init, nodeList);
};

/**
 * To turn a nodelist that has no depth beyond terminal nodes into a list.
 */
let flattenNodeList = (flattener, nodeList) => {
  foldInOrder((cur, next) => [flattener(next), ...cur], [], nodeList);
};

let externName = extern =>
  switch (extern) {
  | "toNull" => Some("caml_js_nullable")
  | "toString" => Some("caml_js_from_string")
  | "toBool" => Some("caml_js_from_bool")
  | "fromBool" => Some("caml_js_to_bool")
  | _
      when
        String.length(extern) > 7
        && String.equal(String.sub(extern, ~pos=0, ~len=7), "extern.") =>
    Some(String.sub(extern, ~pos=7, ~len=String.length(extern) - 7))
  | _
      when
        String.length(extern) > 9
        && String.equal(String.sub(extern, ~pos=0, ~len=9), "external.") =>
    Some(String.sub(extern, ~pos=9, ~len=String.length(extern) - 9))
  | _ => None
  };

type expanded =
  | ExpandedRaw(string)
  | ExpandedOrigArg(int)
  | ExpandedBinding(int);

/**
 * Expands recursive macro calls into a list of bindings, and a list of
 * "expanded"s.
 */
let expandIntoMultipleArguments = (macroData, argsToExpand, nodeList) => {
  /**
   * To turn a nodelist that has no depth beyond terminal nodes into a list.
   */
  let rec expandNodeIntoMultipleArgumentsImpl =
          ((curExpandedBindings, curExpanded), curNode) => {
    switch (curNode) {
    | Raw(r) => (curExpandedBindings, [ExpandedRaw(r), ...curExpanded])
    | Node(
        (
          "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" | "10" | "11" |
          "12"
        ) as s,
        [],
      ) =>
      let i = int_of_string(s);
      if (List.nth_opt(argsToExpand, i - 1) === None) {
        raiseMacroCallIndexNotSupported(
          i,
          List.length(argsToExpand),
          macroData,
        );
      };
      (curExpandedBindings, [ExpandedOrigArg(i - 1), ...curExpanded]);
    | Node(extern, subNodeList) when externName(extern) !== None =>
      /*
       * Filter out empty raw text in external calls because we forbid raw text,
       * but can overlook white space.
       */
      let subNodeList =
        List.filter(subNodeList, ~f=itm =>
          switch (itm) {
          | Raw(txt) => !String.is_empty(String.trim(txt))
          | _ => true
          }
        );
      let extern_name =
        switch (externName(extern)) {
        | None => failwith("Should never happen")
        | Some(extern_name) => extern_name
        };

      let (nextExpandedBindings, subExpanded) =
        expandIntoMultipleArgumentsImpl(curExpandedBindings, [], subNodeList);
      let expandedBindingsWithThis = [
        ((extern, extern_name), subExpanded),
        ...nextExpandedBindings,
      ];
      let nextBindingsLen = List.length(expandedBindingsWithThis);
      let expandedWithThis = [
        ExpandedBinding(nextBindingsLen - 1),
        ...curExpanded,
      ];
      (expandedBindingsWithThis, expandedWithThis);
    | Node(tagName, _) => raiseMacroUnsupportedTag(tagName, macroData)
    };
  }
  and expandIntoMultipleArgumentsImpl =
      (curExpandedBindings, curExpanded, nodeList) => {
    let (expandedBindings, expanded) =
      List.fold_left(
        ~f=expandNodeIntoMultipleArgumentsImpl,
        ~init=(curExpandedBindings, curExpanded),
        nodeList,
      );
    (expandedBindings, expanded);
  };
  let backwards = expandIntoMultipleArgumentsImpl([], [], nodeList);
  (List.rev(fst(backwards)), List.rev(snd(backwards)));
};

/**
 * Filters nodes that have non-empty children based on cb. If the cb returns
 * true for a parent, the parent's children are spliced into the parent's
 * previous location. Nodes with no children are left in tact.
 */
let rec evalContainers = (nodeList, cb) => {
  let taken =
    List.fold_left(
      ~init=[],
      ~f=
        (cur, child) =>
          switch (child) {
          | Raw(_) as r => [r, ...cur]
          | Node(_, []) as n => [n, ...cur]
          | Node(tag, [_, ..._] as sub) as n =>
            externName(tag) !== None
              ? [n, ...evalContainers(cur, cb)]
              : cb(tag)
                  ? List.rev_append(evalContainers(sub, cb), cur) : cur
          },
      nodeList,
    );
  List.rev(taken);
};

let rec printNode =
  fun
  | Node(t, []) => "<@" ++ t ++ "/>"
  | Node(t, [_, ..._] as nodeList) =>
    "<@" ++ t ++ ">" ++ printNodeList(nodeList) ++ "<@/" ++ t ++ ">"
  | Raw(r) => r

and printNodeList = nodes => {
  String.concat(~sep="", List.map(printNode, nodes));
};

let printMacro = nodeList => "raw-macro:" ++ printNodeList(nodeList);

let expandedsToNodeListString = expandeds =>
  List.map(expandeds, ~f=expanded =>
    switch (expanded) {
    | ExpandedRaw(string) => string
    | ExpandedOrigArg(int) => "<@" ++ string_of_int(int + 1) ++ "/>"
    /* These must have been replaced by the time you print the expandeds
     * into a node list string */
    | ExpandedBinding(_int) =>
      failwith(
        "This should never happen. This is a problem with the compiler. ",
      )
    }
  )
  |> String.concat(~sep="");

let renderPosition = pos => "<@" ++ string_of_int(pos) ++ "/>";

let nth_error = (lst, i, nm) =>
  switch (List.nth_opt(lst, i)) {
  | Some(itm) => itm
  | None =>
    raise(
      Sys_error(
        "Internal error expanding macro arg at index (zero based) "
        ++ string_of_int(i)
        ++ " of "
        ++ nm,
      ),
    )
  };
