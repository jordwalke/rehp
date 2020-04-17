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
  | IfDefinitely(int, list(node))
  | Arg(int)
  | /** userExternName, externName */
    Extern(string, string, list(node))
  | Raw(string);

type tokenizedTag =
  | Nothing
  | Gt(string, list(char))
  | SlashGt(string, list(char));

let raiseMacroUnsupportedTag = (tagName, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called was uses an unsupported tag <%s>. The only valid tags are:
  - Specifying portions to be used in backends: <.js>...</.js>
  - Argument substitution <@1/>.
  - Calls to primitives (their children must be other tags and not raw text).
    <@primitiveName>
      <@2/>
      <@otherPrimitiveName> <@1/> <@/otherPrimitiveName>
    <@/primitiveName>
  - <@raw.ifDefinitelySomeN> If original arg n (<@n/>) is definitely Some(x) then include
     the contents, else do include nothing. Second+ children may be raw text.
  - <@raw.ifDefinitelySomeN> If original arg n (<@n/>) is NOT definitely Some(x) then include
     the contents, else do include nothing. Second+ children may be raw text.
  - <@raw>..<@/raw> tags which are used to group more raw text as a primitive argument.
    <@primitiveName>
      <@raw> ThisRawText.isBeingPassedAsAnArgNow(<@3/>)</@raw>
      <@otherPrimitiveName> <@1/> <@/otherPrimitiveName>
    <@/primitiveName>

  Note: You can also supply multiple backends in one macro such as:
  external x : type = "raw-macro:<@js>...</@js><@php>...<@/php>)

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

let raiseInternalError = (specificError, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro system has encountered an internal error. This is a bug in the compiler.
  Please report the issue with a clear repro:

%s.
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
  let externPrint =
    "<@"
    ++ externTag
    ++ ">"
    ++ (
      externTag != external_name
        ? "(sugar for extern." ++ external_name ++ ")" : ""
    );
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called contains a nested external call %s which incorrectly
  contains raw text somewhere in its children.

  %s

  Nested extern tags should only contain other tags. Each child is 1 argument to the extern call.

  If you need to supply raw text as an argument, wrap it in a <raw></raw> element.

  For example, instead of:

    <@%s>SomethingHere(<@1/>, <@2/>)</@%s>

  Do this:

    <@%s><@raw>SomethingHere(<@1/>, <@2/>)</@raw></@%s>

  Make sure you didn't accidentally supply commas or other text in between children.

  The macro being called is defined as:
%s
|},
      commonError,
      externPrint,
      specificError,
      externTag,
      externTag,
      externTag,
      externTag,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let raiseMacroCallIndexNotSupported = (~extra="", i, len, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called uses index %d, but it should not. %s
  It can only use indices 1 - %d. Hint: The number of arguments in the `external`'s
  type has to be compatible with the macro nodes referenced (<@1> - <@%d/>).
  The macro contents are:
%s
|},
      commonError,
      i,
      extra,
      len,
      len,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let nth_error = (lst, i, nm) =>
  switch (List.nth_opt(lst, i)) {
  | Some(itm) => itm
  | None =>
    raise(
      Sys_error(
        "Internal error getting element "
        ++ string_of_int(i)
        ++ " "
        ++ nm
        ++ ". There are only "
        ++ string_of_int(List.length(lst))
        ++ " elements."
        ++ " Please report with repro case. ",
      ),
    )
  };

let externName = extern =>
  switch (extern) {
  | "toNull" => "caml_js_nullable"
  | "toString" => "caml_js_from_string"
  | "toBool" => "caml_js_from_bool"
  | "fromBool" => "caml_js_to_bool"
  | "raw" => "%caml_js_expanded_raw_macro"
  | s => s
  };

let definitely = (macroData, tag) => {
  let isDefinitely =
    String.length(tag) > 20
    && String.sub(~pos=0, ~len=20, tag) == "raw.ifDefinitelySome";
  if (isDefinitely) {
    let iStr = String.sub(tag, ~pos=20, ~len=String.length(tag) - 20);
    switch (int_of_string_opt(iStr)) {
    | None => raiseMacroUnsupportedTag(tag, macroData)
    | Some(i) => Some(i)
    };
  } else {
    None;
  };
};

let classify = (mData, tag, sub) => {
  switch (definitely(mData, tag)) {
  | Some(i) => IfDefinitely(i, sub)
  | None =>
    switch (int_of_string_opt(tag), sub) {
    | (Some(i), []) => Arg(i)
    | (Some(i), [_hd, ..._tl]) =>
      raiseMalformedMacro("Index " ++ tag ++ " cannot have children.", mData)
    | (None, _) => Extern(tag, externName(tag), sub)
    }
  };
};

let isUnexpanded = nm => {
  let trimmed = String.trim(nm);
  switch (String.find_substring("raw-macro:", trimmed, 0)) {
  | exception Not_found => false
  | 0 => true
  | _ => false
  };
};

let extractUnexpanded = (~forBackend, ~loc=?, nm) => {
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

let extractExpanded = (~forBackend, ~loc=?, nm) =>
  extractUnexpanded(~forBackend, ~loc?, "raw-macro:" ++ nm);

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
  | (_, ['\n', '<' as n1, '@' as n2, '/' as n3 as knd, ...r])
  | (_, ['\n', '<' as n1, '/' as n2 as knd, '@' as n3, ...r])
  | (_, ['<' as n1, '@' as n2, '/' as n3 as knd, ...r])
  | (_, ['<' as n1, '/' as n2 as knd, '@' as n3, ...r])
  | (_, ['<' as n1, '@' as n2, _ as n3 as knd, ...r]) =>
    let kindStr = String.make(1, knd);
    switch (nonEmptyUntilGt(r)) {
    | Nothing => tokenize([n1, n2, n3, ...rawStack], r)
    | Gt(tag, r) =>
      let token = knd === '/' ? TClose(tag) : TOpen(kindStr ++ tag);
      appendRawToHead(rawStack, [token, ...tokenize([], r)]);
    | SlashGt(tag, r) =>
      let token = knd === '/' ? TSelfClose(tag) : TSelfClose(kindStr ++ tag);
      appendRawToHead(rawStack, [token, ...tokenize([], r)]);
    };
  | (_, [hd, ...r]) => tokenize([hd, ...rawStack], r)
  };
};

let rec parseNodeListImpl = (mData, tokens) =>
  switch (tokens) {
  | [] => ([], [])
  | [TRaw(_), ...tl]
  | [TSelfClose(_), ...tl]
  | [TOpen(_), ...tl] =>
    let (node, remaining) = parseNodeImpl(mData, tokens);
    let (otherChilren, remaining) = parseNodeListImpl(mData, remaining);
    ([node, ...otherChilren], remaining);
  | [TClose(_), ..._] => ([], tokens)
  }
and parseNodeImpl = (mData, tokens) =>
  switch (tokens) {
  | [] => raiseMalformedMacro("Inbalanced opening or closing tags", mData)
  | [TClose(c), ...tl] =>
    raiseMalformedMacro("Closing token " ++ c ++ " has no opening", mData)
  | [TRaw(r), ...tl] => (Raw(r), tl)
  | [TOpen(t), ...tl] =>
    let (nodeList, remaining) = parseNodeListImpl(mData, tl);
    switch (remaining) {
    | [] =>
      raiseMalformedMacro("Opening token " ++ t ++ " has no closing", mData)
    | [TClose(c), ...tl] when c == t => (classify(mData, t, nodeList), tl)
    | _ =>
      raiseMalformedMacro(
        "Opening token " ++ t ++ " has mismatched or missing closing",
        mData,
      )
    };
  | [TSelfClose(sc), ...tl] => (classify(mData, sc, []), tl)
  }
and parseNodeList = mData => {
  let tokens = tokenize([], String.to_char_list(mData.macro));
  let (parsedNodeList, remaining) = parseNodeListImpl(mData, tokens);
  if (remaining !== []) {
    raiseMalformedMacro(
      "The macro contains unmatched macro nodes at the end.",
      mData,
    );
  };
  parsedNodeList;
};

let rec inOrderNode = (f, init, node) => {
  switch (node) {
  | Raw(_)
  | Arg(_) => f(init, node)
  | IfDefinitely(_, nodeList)
  | Extern(_, _, nodeList) =>
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

type expanded =
  | ExpandedRaw(string)
  | ExpandedOrigArg(int)
  | ExpandedBinding(int);

let renderPosition = pos => "<@" ++ string_of_int(pos) ++ "/>";
let renderIfDefinitelySome = (pos, txt) => {
  let posStr = string_of_int(pos);
  let tagStr = "@raw.ifDefinitelySome" ++ posStr;
  "<" ++ tagStr ++ ">" ++ txt ++ "</" ++ tagStr ++ ">";
};

/**
 * Expands recursive macro calls into a list of bindings, and a list of
 * "expanded"s.
 */
let expandIntoMultipleArguments =
    (mainBindingVar, macroData, argsToExpand, nodeList) => {
  /**
   * To turn a nodelist that has no depth beyond terminal nodes into a list.
   */
  let rec expandNodeIntoMultipleArgumentsImpl =
          ((revBindings, curTxt, revArgs), curNode) => {
    switch (curNode) {
    | Raw(r) => (revBindings, curTxt ++ r, revArgs)
    | Arg(i) =>
      /* TODO: Throw if empty subNodeList */
      switch (List.nth_opt(argsToExpand, i - 1)) {
      | None =>
        raiseMacroCallIndexNotSupported(
          i,
          List.length(argsToExpand),
          macroData,
        )
      | Some(a) =>
        let nextArgs = [a, ...revArgs];
        (
          revBindings,
          curTxt ++ renderPosition(List.length(nextArgs)),
          nextArgs,
        );
      }
    | IfDefinitely(i, subNodeList) =>
      switch (List.nth_opt(argsToExpand, i - 1)) {
      | None =>
        raiseMacroCallIndexNotSupported(
          ~extra=" See <@raw.ifDefinitelySome" ++ string_of_int(i) ++ ">",
          i,
          List.length(argsToExpand),
          macroData,
        )
      | Some(a) =>
        let revArgsWithThisArg = [a, ...revArgs];
        let newPosition = List.length(revArgsWithThisArg);
        let (nextRevExpandedBindings, subTxt, nextRevArgs) =
          expandIntoMultipleArgumentsImpl(subNodeList, revArgsWithThisArg);
        let nextRevExpandedBindings =
          List.append(revBindings, nextRevExpandedBindings);
        (
          nextRevExpandedBindings,
          curTxt ++ renderIfDefinitelySome(newPosition, subTxt),
          nextRevArgs,
        );
      }
    | Extern(userExternName, externName, subNodeList) =>
      /*
       * Filter out empty raw text in external calls because we forbid raw text,
       * but can overlook white space.
       */
      let subNodeList =
        if (String.equal(externName, "%caml_js_expanded_raw_macro")) {
          subNodeList;
        } else {
          let subNodeList =
            List.filter(subNodeList, ~f=itm =>
              switch (itm) {
              | Raw(txt) => !String.is_empty(String.trim(txt))
              | _ => true
              }
            );
          List.iter(subNodeList, ~f=itm =>
            switch (itm) {
            | Raw(txt) =>
              if (!String.is_empty(String.trim(txt))) {
                raiseMalformedExtern(
                  "Contained raw text:'" ++ txt ++ "'",
                  (userExternName, externName),
                  macroData,
                );
              }
            | _ => ()
            }
          );
          subNodeList;
        };

      /*
       * Reset the arg count for externals since they get their own args and the
       * whole extern call becomes a single arg for the current macro.
       */
      let (nextRevExpandedBindings, subTxt, subRevArgs) =
        expandIntoMultipleArgumentsImpl(subNodeList, []);
      let nextRevExpandedBindings =
        List.append(revBindings, nextRevExpandedBindings);
      let bindingVar = Code.Var.fresh();
      let args =
        String.equal(externName, "%caml_js_expanded_raw_macro")
          ? [Code.Pc(Code.String(subTxt)), ...List.rev(subRevArgs)]
          : List.rev(subRevArgs);
      let revBindingsWithThis = [
        ((userExternName, externName, bindingVar), args),
        ...nextRevExpandedBindings,
      ];
      let nextRevArgsWithBinding = [Code.Pv(bindingVar), ...revArgs];
      (
        revBindingsWithThis,
        curTxt ++ renderPosition(List.length(nextRevArgsWithBinding)),
        nextRevArgsWithBinding,
      );
    };
  }
  /**
   * TODO: Couldn't this just compute a new tree, and then we can render it?
   * Similar to how we evaluate "definitely".
   */
  and expandIntoMultipleArgumentsImpl = (nodeList, curRevArgs) =>
    List.fold_left(
      ~f=expandNodeIntoMultipleArgumentsImpl,
      ~init=([], "", curRevArgs),
      nodeList,
    );
  let (revBindings, subTxt, subRevArgs) =
    expandIntoMultipleArgumentsImpl(nodeList, []);
  let finalBinding = (
    (
      "%caml_js_expanded_raw_macro",
      "%caml_js_expanded_raw_macro",
      mainBindingVar,
    ),
    [Code.Pc(Code.String(subTxt)), ...List.rev(subRevArgs)],
  );
  List.rev([finalBinding, ...revBindings]);
};

/**
 * Filters nodes that have non-empty children based on cb. If the cb returns
 * true for a parent, the parent's children are spliced into the parent's
 * previous location. Nodes with no children are left in tact.
 */
let rec evalBackends = (nodeList, be) => {
  let taken =
    List.fold_left(
      ~init=[],
      ~f=
        (cur, child) =>
          switch (child) {
          | Raw(_) as r => [r, ...cur]
          | Arg(_) as a => [a, ...cur]
          | IfDefinitely(_, _) as n => [n, ...evalBackends(cur, be)]
          | Extern(tag, _, sub) as n =>
            let isOldForm =
              String.equal(tag, "js") || String.equal(tag, "php");
            if (isOldForm) {
              String.equal(tag, be)
                ? List.rev_append(evalBackends(sub, be), cur) : cur;
            } else if (String.length(tag) > 1
                       && String.equal(String.sub(tag, ~pos=0, ~len=1), ".")) {
              String.equal(
                String.sub(tag, ~pos=1, ~len=String.length(tag) - 1),
                be,
              )
                ? List.rev_append(evalBackends(sub, be), cur) : cur;
            } else {
              [n, ...evalBackends(cur, be)];
            };
          },
      nodeList,
    );
  List.rev(taken);
};

/**
 * Removes the raw.ifDefinitely tag, and also shifts arguments to reflect the
 * removal. After rendering and reparsing, the newly adjacent (extra) raws will
 * get compressed.
 *
 * We will keep the argument that is being tested in the returned argument list
 * even if the test fails. I think we could actually remove it though. TODO:
 * try removing it.
 *
 * TODO TODO TODO TODO TODO TODO:
 * Use a different extern name besides "caml_js_expanded_raw_macro" to
 * designate macros that need flow time evaluation because it is expensive to
 * continually parse and print them on each flow iteration.
 */
let rec evalDefinitelyInExpanded = (nodeList, macroData, args, testSome) => {
  let rec impl = (nodeList, initRevArgs) =>
    List.fold_left(
      nodeList,
      ~init=([], initRevArgs),
      ~f=((revNodes, revArgs) as cur, child) =>
      switch (child) {
      | Raw(_) => ([child, ...revNodes], revArgs)
      | Arg(i) =>
        let nextRevArgs = [
          nth_error(args, i - 1, "arg " ++ formatForError(macroData.macro)),
          ...revArgs,
        ];
        let nextLen = List.length(nextRevArgs);
        /* Shifts the index because we could have removed some */
        let nextNode = Arg(nextLen);
        let nextRevNodes = [nextNode, ...revNodes];
        (nextRevNodes, nextRevArgs);
      | IfDefinitely(i, sub) =>
        let arg = nth_error(args, i - 1, "ifDefinitely");
        if (testSome(arg)) {
          let nextRevArgsWithThis = [arg, ...revArgs];
          /* Shifts the index because we could have removed some */
          let (nextRevSubNodes, nextRevArgs) =
            impl(sub, nextRevArgsWithThis);
          let nextRevNodes = nextRevSubNodes @ revNodes;
          (nextRevNodes, nextRevArgs);
        } else {
          cur;
        };
      | Extern(_, _, _) =>
        raiseInternalError(
          "Externs should be removed before flow-based optimizations.",
          macroData,
        )
      }
    );
  let (finalRevNodes, finalRevArgs) = impl(nodeList, []);
  (List.rev(finalRevNodes), List.rev(finalRevArgs));
};

let rec printNode =
  fun
  | Arg(i) => "<@" ++ string_of_int(i) ++ "/>"
  | IfDefinitely(i, sub) => renderIfDefinitelySome(i, printNodeList(sub))
  | Extern(user, _, sub) =>
    "<@" ++ user ++ ">" ++ printNodeList(sub) ++ "<@/" ++ user ++ ">"
  | Raw(r) => r

and printNodeList = nodes => {
  String.concat(~sep="", List.map(printNode, nodes));
};

let printMacro = nodeList => "raw-macro:" ++ printNodeList(nodeList);
