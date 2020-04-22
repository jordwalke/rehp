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
  | /** (primPredicateName, position, predicate, ifKnownTrueSub, ifKnownFalseSub, ifUnknownSub) */
    RawIf(
      string,
      int,
      list(node),
      list(node),
      list(node),
    )
  | Arg(int)
  | /** userExternName, externName */
    Extern(string, string, list(node))
  | Raw(string);

type tokenizedTag =
  | Nothing
  | Gt(string, list(char))
  | SlashGt(string, list(char));

let validMacroHelp = {|Valid Macros may only contain:
  - <@.js>...</@.js>
    Portions only to be included for specific backends.
  - <@1/> - <@10/>
    Argument substitution.
  - <@primitiveName> <@/primitiveName>
    Calls to primitives (their immediate children must be other tags - not raw text).
    Some shortened primitive names are: toNull, toString, fromNull, fromString, toBool, fromBool
  - <@if.primitiveName.n>
      <@true>..</@true>
      <@false>..</@false>
      <@unknown>..</@unknown>
    <@if.primitiveName.n>
    Embeds different contents depending on if callsite arg <@n/> is known to satisfy some primitive
    that returns true/false.
    Whether or not the argument is "known" depends on optimization level and simplicity of calling code.
    It is on the developer to ensure that the unknown case behaves exactly as the others but performing
    the necessary checks at runtime.
  - <@raw>..<@/raw> tags which are used to group more raw text as a primitive argument since
    calls to primitives require each child to be a tag, not raw text. Example:
    <@primitiveName>
      <@raw> ThisRawText.isBeingPassedAsAnArgNow(<@3/>)</@raw>
      <@otherPrimitiveName> <@1/> <@/otherPrimitiveName>
    <@/primitiveName>|};

let raiseMacroUnsupportedTag = (~hint="", tagName, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called uses unsupported tag <@%s>.
  %s
  %s
  The macro contents are:
%s
|},
      commonError,
      tagName,
      String.is_empty(hint) ? "" : "Hint: " ++ hint,
      validMacroHelp,
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

  Make sure you didn't accidentally supply commas or other text in between children.

  %s

  The macro being called is defined as:
%s
|},
      commonError,
      externPrint,
      specificError,
      validMacroHelp,
      formatForError(macroData.macro),
    );
  raise(UserError(msg, macroData.callerLoc));
};

let raiseIndexNotSupported = (~extra="", i, len, macroData) => {
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

let filterEmptyRawText = subNodeList =>
  List.filter(subNodeList, ~f=itm =>
    switch (itm) {
    | Raw(txt) => !String.is_empty(String.trim(txt))
    | _ => true
    }
  );

let classifyPredicate = (macroData, tag, sub, ~otherwise) => {
  switch (String.split_char(~sep='.', tag)) {
  | ["if", ...rest] =>
    let withoutEmptyRaws = filterEmptyRawText(sub);
    switch (rest, withoutEmptyRaws) {
    | (
        [
          pred,
          ("1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" | "10") as pos,
        ],
        [
          Extern("true", _, trueSub),
          Extern("false", _, falseSub),
          Extern("unknown", _, unknownSub),
        ],
      ) =>
      RawIf(pred, int_of_string(pos), trueSub, falseSub, unknownSub)
    | ([pred, "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" | "10"], _) =>
      let hint =
        "You're trying to use the conditional macro embedding "
        ++ "<@if.primitiveName.n> but did not provide necessary ordered children of the if.";
      raiseMacroUnsupportedTag(~hint, tag, macroData);
    | (_, _) =>
      let hint =
        "It looks like you're trying to use the conditional macro embedding "
        ++ "<@if.primitiveName.n> but the order/contents of the segments are wrong.";
      raiseMacroUnsupportedTag(~hint, tag, macroData);
    };
  | _ => otherwise()
  };
};

let classify = (mData, tag, sub) => {
  classifyPredicate(mData, tag, sub, ~otherwise=() => {
    switch (int_of_string_opt(tag), sub) {
    | (Some(i), []) => Arg(i)
    | (Some(i), [_hd, ..._tl]) =>
      raiseMalformedMacro("Index " ++ tag ++ " cannot have children.", mData)
    | (None, _) => Extern(tag, externName(tag), sub)
    }
  });
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
      "Tihe macro contains unmatched macro nodes at the end.",
      mData,
    );
  };
  parsedNodeList;
};

type expanded =
  | ExpandedRaw(string)
  | ExpandedOrigArg(int)
  | ExpandedBinding(int);

let renderPosition = pos => "<@" ++ string_of_int(pos) ++ "/>";
let renderRawIf = (externPredicateName, pos, trueTxt, falseTxt, unknownTxt) => {
  let tagStr = "@if." ++ externPredicateName ++ "." ++ string_of_int(pos);
  "<"
  ++ tagStr
  ++ "><@true>"
  ++ trueTxt
  ++ "</@true><@false>"
  ++ falseTxt
  ++ "</@false><@unknown>"
  ++ unknownTxt
  ++ "</@unknown></"
  ++ tagStr
  ++ ">";
};

let rec printNode =
  fun
  | Arg(i) => "<@" ++ string_of_int(i) ++ "/>"
  | RawIf(externPredicateName, i, trueSub, falseSub, unknownSub) => {
      renderRawIf(
        externPredicateName,
        i,
        printNodeList(trueSub),
        printNodeList(falseSub),
        printNodeList(unknownSub),
      );
    }
  | Extern(user, _, sub) =>
    "<@" ++ user ++ ">" ++ printNodeList(sub) ++ "<@/" ++ user ++ ">"
  | Raw(r) => r

and printNodeList = nodes => {
  String.concat(~sep="", List.map(printNode, nodes));
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
        raiseIndexNotSupported(i, List.length(argsToExpand), macroData)
      | Some(a) =>
        let nextArgs = [a, ...revArgs];
        (
          revBindings,
          curTxt ++ renderPosition(List.length(nextArgs)),
          nextArgs,
        );
      }
    | RawIf(pred, i, trueList, falseList, unknownList) =>
      switch (List.nth_opt(argsToExpand, i - 1)) {
      | None =>
        let xtra = " See " ++ renderRawIf(pred, i, "..", "..", "..");
        raiseIndexNotSupported(
          ~extra=xtra,
          i,
          List.length(argsToExpand),
          macroData,
        );
      | Some(a) =>
        let argToPredicate =
          switch (List.nth_opt(argsToExpand, i - 1)) {
          | None =>
            raiseIndexNotSupported(i, List.length(argsToExpand), macroData)
          | Some(a) => [a]
          };
        let externName = externName(pred);
        let bindingVar = Code.Var.fresh();
        let revArgs = [Code.Pv(bindingVar), ...revArgs];
        let newPosition = List.length(revArgs);
        let (revBindingsTrue, subTxtTrue, revArgs) =
          expandIntoMultipleArgumentsImpl(trueList, revArgs);
        let (revBindingsFalse, subTxtFalse, revArgs) =
          expandIntoMultipleArgumentsImpl(trueList, revArgs);
        let (revBindingsUnknown, subTxtUnknown, revArgs) =
          expandIntoMultipleArgumentsImpl(trueList, revArgs);
        let nextRevBindings =
          List.concat([
            revBindingsUnknown,
            revBindingsFalse,
            revBindingsTrue,
            revBindings,
          ]);
        let revBindingsWithThis = [
          ((pred, externName, bindingVar), argToPredicate),
          ...nextRevBindings,
        ];
        (
          revBindingsWithThis,
          curTxt
          ++ renderRawIf(
               "caml_js_if_true",
               newPosition,
               subTxtTrue,
               subTxtFalse,
               subTxtUnknown,
             ),
          revArgs,
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
          let subNodeList = filterEmptyRawText(subNodeList);
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
      //
      //
      //
      //
      //
      // WAIT THIS ISN"T THE RIGHT ORDER OF APPEND
      //
      //
      //
      //
      let nextRevExpandedBindings =
        List.append(nextRevExpandedBindings, revBindings);
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
   * Similar to how we evaluate "predicate".
   */
  and expandIntoMultipleArgumentsImpl = (nodeList, curRevArgs) => {
    let (_, _ as txt, _) as res =
      List.fold_left(
        ~f=expandNodeIntoMultipleArgumentsImpl,
        ~init=([], "", curRevArgs),
        nodeList,
      );
    res;
  };
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
          | RawIf(_, _, _, _, _) as n => [n, ...evalBackends(cur, be)]
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
 * <@somePrim>
 *    <@1/>
 *    <@if.1.known.some>"issome"</if.1.known.some>
 *    <@2/>
 * <@/somePrim>(a, b)
 *
 * Is just sugar for:
 * <@somePrim>
 *    <@1/>
 *    <@if.caml_js_is_some.1>
 *      <@true>"issome"</@true>
 *      <@false></@knowFalse>
 *      <@unknown></@unknown>
 *    </@if.caml_js_is_some.1>
 *    <@2/>
 * <@/somePrim>(a, b)
 *
 * let isSome = <@caml_js_is_some><@1/><@/caml_js_is_some>(a)
 * <@somePrim>
 *    <@a/>
 *    <@if.2>
 *      <@true>"issome"</@true>
 *      <@false>"issome"</@false>
 *      <@unknown></@unknown>
 *    <@/rawIf.2>
 *    <@if.1.known.some>"issome"</if.1.known.some>
 *    <@2/>
 * <@/somePrim>(a, isSome, b)
 *
 * Becomes:
 *
 * Removes the if.n.known.pred tag, and also shifts arguments to reflect the
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
let rec evalDefinitelyInExpanded = (nodeList, macroData, args, ~testVal) => {
  let rec impl = (nodeList, initRevArgs) =>
    List.fold_left(
      nodeList, ~init=([], initRevArgs), ~f=((revNodes, revArgs), child) =>
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
      | RawIf("caml_js_if_true", i, trueList, falseList, unknownList) =>
        let arg =
          nth_error(args, i - 1, renderRawIf("pred", i, "..", "..", ".."));
        switch (testVal(arg)) {
        /* Defer removal of dead segments until all flow analysis is done (in generate) */
        | None =>
          let nextRevArgs = [arg, ...revArgs];
          let nextLen = List.length(nextRevArgs);
          /* Shifts the index because we could have removed some in previous impl calls. */
          let (nextRevSubNodesTrue, nextRevArgs) =
            impl(trueList, nextRevArgs);
          let (nextRevSubNodesFalse, nextRevArgs) =
            impl(falseList, nextRevArgs);
          let (nextRevSubNodesUnknown, nextRevArgs) =
            impl(unknownList, nextRevArgs);
          let nextRevNodes = [
            RawIf(
              "caml_js_if_true",
              nextLen,
              List.rev(nextRevSubNodesTrue),
              List.rev(nextRevSubNodesFalse),
              List.rev(nextRevSubNodesUnknown),
            ),
            ...revNodes,
          ];
          (nextRevNodes, nextRevArgs);
        | Some(b) =>
          let sub = b ? trueList : falseList;
          // TODO: I think we can remove this arg.
          let nextRevArgsWithThis = [arg, ...revArgs];
          /* Shifts the index because we could have removed some */
          let (nextRevSubNodes, nextRevArgs) =
            impl(sub, nextRevArgsWithThis);
          let nextRevNodes = nextRevSubNodes @ revNodes;
          (nextRevNodes, nextRevArgs);
        };
      | RawIf(_) =>
        raiseInternalError(
          "Something went wrong with expanding 'raw ifs'. It should only have caml_js_if_true at this point",
          macroData,
        )
      | Extern(_, _, _) =>
        raiseInternalError(
          "Externs should be removed before flow-based optimizations.",
          macroData,
        )
      }
    );
  let (finalRevNodes, finalRevArgs) = impl(nodeList, []);
  print_newline();
  (List.rev(finalRevNodes), List.rev(finalRevArgs));
};

let printMacro = nodeList => "raw-macro:" ++ printNodeList(nodeList);

let flattenFinal = (macroData, args, nodeList) => {
  let arg_len = List.length(args);
  let rec impl = (curRev, node) => {
    switch (node) {
    | Raw(r) => [Rehp.RawText(r), ...curRev]
    | Arg(i) =>
      if (i - 1 < arg_len) {
        [RawSubstitution(List.nth(args, i - 1)), ...curRev];
      } else {
        raiseIndexNotSupported(i, arg_len, macroData);
      }
    | RawIf("caml_js_if_true", i, trueList, falseList, unknownList) =>
      List.fold_left(~f=impl, ~init=curRev, unknownList)
    | RawIf(_) =>
      raiseInternalError(
        "RawIf extern calls should be expanded by now.",
        macroData,
      )
    | Extern(_, _, nodeList) =>
      raiseInternalError(
        "Macro extern calls should be expanded by now.",
        macroData,
      )
    };
  };
  List.rev(List.fold_left(~f=impl, ~init=[], nodeList));
};

let printFlattened = rawSegmentList =>
  List.map(rawSegmentList, ~f=seg =>
    switch (seg) {
    | Rehp.RawText(r) => r
    | RawSubstitution(i) => "<@arg/>"
    }
  )
  |> String.concat(~sep="");
