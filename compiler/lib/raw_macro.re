open Stdlib;

type macroData = {
  macro: string,
  backend: string,
  callerLoc: option(Parse_info.t),
};

/**
 * Macro language:
 * -----------
 *
 * Raw =
 *   | any text
 *   | Tag
 * Tag =
 *   | <@n/>                                   // callsite argument substitution
 *   | <@prmitiveName>Tag+...</@primitiveName> // Call a built-in primitive
 *   | <@.js/>Raw</@.js>                       // Embed Raw region only for backend = js
 *   | <@/>Raw</@>                             // Another embedded Raw region
 *   | <@?>                                    // Embed a Raw region inside of another conditionally
 *       Tag                                   // Condition to test
 *       <@true>Raw</@true>                    // Content to embed if definitely True
 *       <@false>Raw</@false>                  // Content to embed if definitely False
 *       <@unknown>Raw</@unknown>              // Content to embed if Unknown
 *     </@?>
 *
 * If you want a conditional argument you must pass a single tag to the
 * primitive call with <@?>.
 *
 * Special features/conveniences:
 * `<@><@/>` can be used to contain a new Raw region where a tag is required.
 * It is not useful for embedding a new raw region inside of an existing one,
 * but specifying a sub-raw region that should be passed as a parameter to a
 * primitive call (primitive calls require their arguments to be <tag> like
 * things).
 * `<@>` will cause the text of that new raw region to get split into its own
 * new variable, so make sure the contents of `<@>` tags are valid expressions
 * in your language.
 *
 * `<@?>` creates a conditional raw region. `<@?>` embeds not only as an
 * argument to a primitive, but also embeds inside of other raw regions. Its
 * generated output text will not be split up from the raw region text that
 * surrounds it.
 * `<@?>` requires exactly four children tags: The test condition - which must
 * be a primitve call tag, and the `<@true>,` `<@false>`, and `<@unknown>`
 * tags, which may contain raw regions which get embedded into its containing
 * raw region - depending on the value of the test condition (the first child
 * to `<@?>`).
 *
 * White Space:
 * -----------
 * When parsing the macro defined in an external binding, we do the following
 * normalization on the text at parse time:
 *
 * 1. Ignore all newlines that occur before the tag token '<' and after the tag
 * token '>'.
 * This:
 *
 *     external foo : type = {|
 *       <@.js><@x></@x></@.js>
 *     |};
 *
 * Is equivalent to:
 *
 *     external foo : type = {|
 *       <@.js>
 *         <@x></@x>
 *       </@.js>
 *     |};
 *
 * In order to explicitly specify a newline that you want to appear in the
 * output, include two newlines.
 *
 *     external foo : type = {|
 *       <@.js>
 *
 *         <@x></@x>
 *
 *       </@.js>
 *     |};
 *
 *
 * 2. Remove from every line, the smallest amount of leading whitespace found
 * among all the lines.
 *
 * This:
 *
 *     external foo : type = {|
 *     <@.js>
 *       <@x>
 *       </@x>
 *     </@.js>
 *     |};
 *
 * Is equivalent to:
 *
 *     external foo : type = {|
 *           <@.js>
 *             <@x>
 *             </@x>
 *           </@.js>
 *     |};
 *
 * TODO: Add some dangling comma primitive for a sequence of outputs that may
 * or may not evaluate to empty.
 *
 * TODO: Split `toNull` into three different forms:
 *   - `toNullable`: Today's `caml_js_nullable`
 *   - `toNull`: The same, but demands that the eval prove it is None.
 *   - `toNonNull`: The same, but demands that eval prove it is Some.
 *
 * TODO: Add a toNullableString primitive (is required for the <@unknown/> cases).
 * TODO: OR generalized:
 * `<@toNullableMap|toString>expr</@toNullableMap|toString>`: Special hook.
 * This is different than `<@toNullableMap|toString>expr</@toNullableMap|toString>`: Special hook.
 *
 * TODO: Add the following sugars:
 * <@1.isSome/>                            ==>   <@isSome><@1/></@isSome>
 * <@toString.toNull>X</@toString.toNull>  ==>   <@toNull><@toString>X</@toString></@toNull>
 * (Possibly on allow the previous with the form):
 * <@1.toString.toNull/>                   ==>   <@toNull><@toString><@1/></@toString></@toNull>
 * <@?>                                    ==>   <@?>
 *   testExpr                                      testExpr
 *   ifTrue                                        <@true>ifTrue<@/true>
 *   ifFalse                                       <@false>ifFalse</@false>
 *   ifUnknown                                     <@unknown>ifUnknown</@unknown>
 * <@/?>                                         <@/?>
 *
 * TODO: Maybe rethink the last one since @? tests typically are only used when
 * there is raw children in the branches.
 *
 * TODO: The <@n.toString.toNull/> would only support childless tags, as
 * opposed to partially applying the `<@n/>`.
 *
 * TODO: Allow combining multiple switch tests into one `<@?>`: Also, allow
 * omitting empty true/false/unknown branches.
 *
 *  {<@?>
 *    <@1.isSome/>
 *    <@true>backgroundColor: <@1.toString.toNull/>,</@true>
 *    <@unknown>backgroundColor: <@1.toString.toNull/>,</@unknown>
 *    <@2.isSome/>
 *    <@true>color: <@2.toString.toNull/>,</@true>
 *    <@unknown>color: <@2.toString.toNull/>,</@unknown>
 *    <@isSome><@3/></@isSome>
 *    <@true>position: <@3.toString.toNull/>,</@true>
 *    <@unknown>position: <@unknown.toNullableString/>
 *  </@?>
 *  }
 *
 * TODO: Multiple switches strung together would support a separator specifier
 * to handle trailing commas:
 *
 *  {<@? sep=",">
 *    <@1.isSome/>
 *    <@true>backgroundColor: <@1.toString.toNull/></@true>
 *    <@unknown>backgroundColor: <@1.toNullableString/></@unknown>
 *    <@2.isSome/>
 *    <@true>color: <@2.toString.toNull/></@true>
 *    <@unknown>color: <@2.toNullableString/></@unknown>
 *    <@isSome><@3/></@isSome>
 *    <@true>position: <@3.toString.toNull/></@true>
 *    <@unknown>position: <@3.toNullableString/>
 *  </@?>
 *  }
 *
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

let commonError = {|There is a problem with the macro being called at this approximate location.|};

type tokens =
  | TOpen(string)
  | TClose(string)
  | TSelfClose(string)
  | TRaw(string);

type node =
  | /** (expressionToTest, ifKnownTrueSub, ifKnownFalseSub, ifUnknownSub) */
    RawIf(
      node,
      list(node),
      list(node),
      list(node),
    )
  | Arg(int)
  | /** tagUsed, externName */
    Prim(string, string, list(node))
  | Raw(string);

type tokenizedTag =
  | Nothing
  | Gt(string, list(char))
  | SlashGt(string, list(char));

type fooNonGadt('arg) =
  | Bar(int, float);

type foo('arg) =
  | Bar(int, float): foo('arg);

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
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseEmptyRequirePaths = (~which, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called here uses a %s which is empty.
  The macro contents are:
%s
|},
      commonError,
      which,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseNoOutputFileButProjectRoot = macroData => {
  let msg =
    Errors.macroNoOutputFile(commonError, formatForError(macroData.macro));
  raise(Errors.UserError(msg, macroData.callerLoc));
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
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseMacroUndefinedProjectRoot = macroData => {
  let msg =
    Printf.sprintf(
      {|%s
%s
%s
|},
      commonError,
      Errors.macroUndefinedProjectRoot,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseMacroMalformedRequire = macroData => {
  let msg =
    Printf.sprintf(
      {|%s
%s
%s
|},
      commonError,
      Errors.weirdArgumentsToCamlRequire,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
};

/**
 * Gets the project root for npm projects using commonly set environment
 * variables.  These ones are esy specific but we should add any other
 * variables/file system searches that would reliably discover an npm project
 * root.
 */
let getProjectRoot = () =>
  /* cur__original_root is set during esy build */
  switch (Sys.getenv("cur__original_root")) {
  | exception Not_found =>
    /* ESY__ROOT_PACKAGE_CONFIG_PATH is set during esy x (useful for testing jsoo/rehp itself) */
    switch (Sys.getenv("ESY__ROOT_PACKAGE_CONFIG_PATH")) {
    | exception Not_found => None
    | p =>
      let trimmed = String.trim(p);
      String.is_empty(trimmed) ? None : Some(Filename.dirname(trimmed));
    }
  | p =>
    let trimmed = String.trim(p);
    String.is_empty(trimmed) ? None : Some(Filename.dirname(trimmed));
  };

let raiseRelativeRequires = (path, projectRoot, macroData) => {
  let msg =
    Errors.relativeRequiresNotSupported(
      commonError,
      path,
      projectRoot,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
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
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseMalformedPrim = (specificError, (primTag, prim_name), macroData) => {
  let primPrint =
    "<@"
    ++ primTag
    ++ ">"
    ++ (primTag != prim_name ? "(sugar for prim " ++ prim_name ++ ")" : "");
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called contains a nested primimitve call %s which incorrectly
  contains raw text somewhere in its children.

  %s

  Make sure you didn't accidentally supply commas or other text in between children.

  %s

  The macro being called is defined as:
%s
|},
      commonError,
      primPrint,
      specificError,
      validMacroHelp,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseIndexNotSupported = (i, len, macroData) => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called uses index %d, but it should only be accessing
  indices 1 - %d.
  Hint: The number of arguments in the extern's type has to be
  compatible with the arguments nodes referenced (<@1> - <@%d/>).  The macro
  contents are:
%s
|},
      commonError,
      i,
      len,
      len,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
};

let raiseNestedMacro = macroData => {
  let msg =
    Printf.sprintf(
      {|%s
  The macro being called contains a conditional macro <@?> inside one of the
  cases (true/false/unknown) of another macro. This is not supported because
  it is too difficult for users to prove they do not have bugs with side
  effects, and there isn't currently many optimization opportunities to be
  gained by nested conditional expansion.
%s
|},
      commonError,
      formatForError(macroData.macro),
    );
  raise(Errors.UserError(msg, macroData.callerLoc));
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

let primName = prim =>
  switch (prim) {
  | "isSome" => "caml_js_is_some"
  | "isNone" => "caml_js_is_none"
  | "toNull" => "caml_js_nullable"
  | "toString" => "caml_js_from_string"
  | "toBool" => "caml_js_from_bool"
  | "fromBool" => "caml_js_to_bool"
  | "require" => "%caml_require"
  | "" => "%caml_js_expanded_raw_macro_done"
  | s => s
  };

let removeEmptyRaw = (~errorNonEmpty=None, md, subs) =>
  List.filter(subs, ~f=itm =>
    switch (errorNonEmpty, itm) {
    | (None, Raw(txt)) => !String.is_empty(String.trim(txt))
    | (Some((tag, prim)), Raw(txt)) =>
      if (!String.is_empty(String.trim(txt))) {
        let hint = "Contained raw text:'" ++ txt ++ "'";
        raiseMalformedPrim(hint, (tag, prim), md);
      };
      !String.is_empty(String.trim(txt));
    | _ => true
    }
  );

let renderPos = pos => "<@" ++ string_of_int(pos) ++ "/>";
let rec renderRawIf = (testTxt, trueTxt, falseTxt, unknownTxt) => {
  "<@?>"
  ++ testTxt
  ++ "<@true>"
  ++ trueTxt
  ++ "</@true><@false>"
  ++ falseTxt
  ++ "</@false><@unknown>"
  ++ unknownTxt
  ++ "</@unknown>"
  ++ "<@/?>";
}

and renderPrim = (tag, subTxt) =>
  "<@" ++ tag ++ ">" ++ subTxt ++ "</@" ++ tag ++ ">"

and printNode =
  fun
  | Arg(i) => renderPos(i)
  | RawIf(test, ts, fs, unknwns) => {
      renderRawIf(
        printNode(test),
        printNodeList(ts),
        printNodeList(fs),
        printNodeList(unknwns),
      );
    }
  | Prim(user, _, sub) => renderPrim(user, printNodeList(sub))
  | Raw(r) => r

and printNodeList = nodes => {
  String.concat(~sep="", List.map(printNode, nodes));
};

let classifyRawIf = (macroData, tag, sub, ~otherwise) =>
  if (String.equal("?", tag)) {
    switch (removeEmptyRaw(macroData, sub)) {
    | [
        (Arg(_) | Prim(_, _, _)) as testExpr,
        Prim("true", _, ts),
        Prim("false", _, fs),
        Prim("unknown", _, unknwns),
      ] =>
      RawIf(testExpr, ts, fs, unknwns)
    | [
        Raw(_) | RawIf(_),
        Prim("true", _, ts),
        Prim("false", _, fs),
        Prim("unknown", _, unknwns),
      ] =>
      let hint =
        "Conditional macro embedding can only accept an argument substitution <@n/>"
        ++ " or a primitive call <@primitiveName>.. as the first child of <@?>.";
      raiseMacroUnsupportedTag(~hint, tag, macroData);
    | [Arg(_) | Prim(_, _, _), next, ...rest] =>
      let hint =
        "Incorrect use of <@?> conditional macro embedding. It must be in this exact form:\n"
        ++ "<@?>\n"
        ++ "  <@primitiveName/>..</@primitiveName>    or   <@n/>\n"
        ++ "  <@true>...</@true> \n"
        ++ "  <@false>...</@false> \n"
        ++ "  <@unknown>...</@unknown> \n"
        ++ "</@?>\n";
      raiseMacroUnsupportedTag(~hint, tag, macroData);
    | _ => raiseMacroUnsupportedTag(tag, macroData)
    };
  } else {
    otherwise();
  };

let classify = (mData, tag, sub) => {
  classifyRawIf(mData, tag, sub, ~otherwise=() => {
    switch (int_of_string_opt(tag), sub) {
    | (Some(i), []) => Arg(i)
    | (Some(i), [_, ..._]) =>
      raiseMalformedMacro("Index " ++ tag ++ " cannot have children.", mData)
    /* It's a primitive call */
    | (None, _) => Prim(tag, primName(tag), sub)
    }
  });
};

let isUnexpanded = nm => {
  let trimmed = String.trim(nm);
  let onProblem = () =>
    switch (String.find_substring("<@.", trimmed, 0)) {
    | exception Not_found => false
    | 0 => true
    | _ => false
    };
  switch (String.find_substring("raw-macro:", trimmed, 0)) {
  | exception Not_found => onProblem()
  | 0 => true
  | _ => onProblem()
  };
};

let extractOriginalExtern = (~forBackend, ~loc=?, nm) => {
  let trimmed = String.trim(nm);
  let onProblem = () =>
    switch (String.find_substring("<@.", trimmed, 0)) {
    | 0 =>
      let everythingAfterRawMacro = nm |> removeBookendNewlines;
      normalizeLeading(everythingAfterRawMacro);
    | exception Not_found => ""
    | _ => ""
    };
  let macro =
    switch (String.find_substring("raw-macro:", trimmed, 0)) {
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
    | exception Not_found => onProblem()
    | _ => onProblem()
    };
  {macro, backend: forBackend, callerLoc: loc};
};

let extractExpanded = (~forBackend, ~loc=?, nm) =>
  extractOriginalExtern(~forBackend, ~loc?, "raw-macro:" ++ nm);

let rec nonEmptyUntilGt = (~rev=[], chars) =>
  switch (chars) {
  | [] => Nothing
  | ['/', '>', '\n', ...tl]
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
  | (_, ['<', '@', '>', ...r]) =>
    let token = TOpen("");
    appendRawToHead(rawStack, [token, ...tokenize([], r)]);
  | (_, ['<', '/', '@', '>', ...r]) =>
    let token = TClose("");
    appendRawToHead(rawStack, [token, ...tokenize([], r)]);
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

/**
 * There are two modes of primitive binding expansion:
 *
 * 1. During optimization/specialization(or eval):  Do nothing in RawIf
 * branches except argument shifts.  (Which is overkill because the cases are
 * mutually exclusive, Could just add ones that haven't been added to args yet,
 * but it never hurts correctness to overadd, it only hurts inlining
 * opportunities).  TODO: minimally expand in mutex rawifs.
 * 2. During final generate.ml after all eval/specialization/inlining: take the
 * <@unknown> portions, and epxand all the primitives into bindings within
 * them. This will not expose those bindings to optimization, but typically the
 * unknown case is the one where we don't have those opportunities anyways.
 *
 * In either mode, always expand bindings in the test case, always shift
 * arguments, and never allow nested RawIfs inside of the branches.
 *
 * The reason we don't allow nested RawIfs is because we defer *all* primitive
 * expansion in the subtree until `evalRawIfsInExpanded`(during specialize_js
 * time) selects a true/false branch, or at final `generate` time, where we run
 * `expands` in `ExpandPrimsInUnknownBranches`
 * mode. That means RawIf's expansion of bindings (including for nested RawIf's
 * test cases) can get deferred all the way until generate time and a lot of
 * evaluation/inlining opportunities are foregone. Also, it's too difficult for
 * users to guarantee that even their nested RawIf test cases have the same
 * side effects.
 *
 */
type rawIfExpansionMode =
  | DontExpandPrimsInRawIfBranches
  | ExpandPrimsInUnknownBranches;

/**
 * For a caml_js_expanded_raw_macro, expands primitives inside of macro calls
 * into a their own bindings, and then shifts that binding onto the newly
 * adjusted arguments of the original caml_js_expanded_raw_macro.
 * Has two `~mode`s it operates in. See `rawIfExpansionMode`.
 */
let expandPrimBindingsAndArgs = (~mode, md, origArgs, nodeList) => {
  /* doExpand is not just inIf because the test case is "inIf" for purposes of
   * validating nesting, but is still a place we want to expand */
  /* TODO: Just do early validation at normalization stage so that we can simplify this
   * and make the assumption that RawIfs can never be nested. */
  let rec expandNode =
          (~doExpand, ~inIf, (revBinds, curTxt, revArgs), curNode) => {
    switch (curNode, doExpand, inIf, mode) {
    | (Raw(r), _, _, _) => (revBinds, curTxt ++ r, revArgs)
    | (Arg(i), _, _, _) =>
      switch (List.nth_opt(origArgs, i - 1)) {
      /* TODO: Throw if empty subs */
      | None => raiseIndexNotSupported(i, List.length(origArgs), md)
      | Some(a) =>
        let nextArgs = [a, ...revArgs];
        (revBinds, curTxt ++ renderPos(List.length(nextArgs)), nextArgs);
      }
    | (RawIf(test, ts, fs, us), _, true, _) => raiseNestedMacro(md)
    /* This is still part of the raw content */
    | (RawIf(test, ts, fs, us), _, false, DontExpandPrimsInRawIfBranches) =>
      let inIf = true;
      let doExpand = false;
      /* We expand primitives in the RawIf test branch, but nothing else! */
      let (revBindingsTest, sTest, revArgs) =
        expandNode(~doExpand=true, ~inIf, ([], "", revArgs), test);
      let (revBindingsTrue, sTrue, revArgs) =
        expand(~doExpand, ~inIf, ts, revArgs);
      let (revBindingsFalse, sFalse, revArgs) =
        expand(~doExpand, ~inIf, fs, revArgs);
      let (revBindingsUnknown, sUnknown, revArgs) =
        expand(~doExpand, ~inIf, us, revArgs);
      /* if (List.length(revBindingsTest) === 0) { */
      /*   raiseInternalError( */
      /*     "revBindingsTest was NOT supposed to be length zero." */
      /*     ++ "Saw expanded binding text " */
      /*     ++ sTest, */
      /*     md, */
      /*   ); */
      /* }; */
      if (List.length(revBindingsTrue) !== 0) {
        failwith("revBindingsTrue was supposed to be length zero");
      };
      if (List.length(revBindingsFalse) !== 0) {
        failwith("revBindingsFalse was revBindingsFalse to be length zero");
      };
      if (List.length(revBindingsUnknown) !== 0) {
        failwith("revBindingsUnknown was supposed to be length zero");
      };
      let nextRevBindings =
        List.concat([
          revBindingsUnknown,
          revBindingsFalse,
          revBindingsTrue,
          revBindingsTest,
          revBinds,
        ]);
      (
        nextRevBindings,
        curTxt ++ renderRawIf(sTest, sTrue, sFalse, sUnknown),
        revArgs,
      );
    | (RawIf(test, _, _, unknowns), _, false, ExpandPrimsInUnknownBranches) =>
      let (revBindingsUnknown, sUnknown, revArgs) =
        expand(~doExpand=true, ~inIf=true, unknowns, revArgs);
      let nextRevBindings = List.concat([revBindingsUnknown, revBinds]);
      (nextRevBindings, curTxt ++ sUnknown, revArgs);
    | (Prim(tag, "%caml_require", [Raw(normalizedPath)]), true, _, _) =>
      let bindVar = Code.Var.fresh();

      let args = [Code.Pc(Code.IString(normalizedPath))];
      let revBindingsWithThis = [
        ((tag, "%caml_require", bindVar), args),
        ...revBinds,
      ];
      let nextRevArgsWithBinding = [Code.Pv(bindVar), ...revArgs];
      (
        revBindingsWithThis,
        curTxt ++ renderPos(List.length(nextRevArgsWithBinding)),
        nextRevArgsWithBinding,
      );
    | (Prim(tag, "%caml_require", [Raw(path)] as subs), false, _, _) =>
      /* revPrimBindings should be empty */
      let (revPrimBindings, subTxt, revArgsWithSubRevArgs) =
        expand(~doExpand, ~inIf, subs, revArgs);
      if (List.length(revPrimBindings) !== 0) {
        failwith("revPrimBindings was supposed to be length zero");
      };
      (revBinds, curTxt ++ renderPrim(tag, subTxt), revArgsWithSubRevArgs);
    | (Prim(tag, prim, subs), true, _, _) =>
      /* Filter empty tag in prim calls because forbid raw text, but allow white. */
      let errorNonEmpty = Some((tag, prim));
      let isMacro = String.equal(prim, "%caml_js_expanded_raw_macro_done");
      let subs = isMacro ? subs : removeEmptyRaw(~errorNonEmpty, md, subs);
      /* Reset arg count for prims. They get own args and whole prim call
       * becomes a single arg for the current macro.  */
      let (revPrimBindings, subTxt, subRevArgs) =
        expand(~doExpand, ~inIf, subs, []);
      let revPrimBindings = List.append(revPrimBindings, revBinds);
      let bindVar = Code.Var.fresh();
      let args =
        isMacro
          ? [Code.Pc(Code.String(subTxt)), ...List.rev(subRevArgs)]
          : List.rev(subRevArgs);
      let revBindingsWithThis = [
        ((tag, prim, bindVar), args),
        ...revPrimBindings,
      ];
      let nextRevArgsWithBinding = [Code.Pv(bindVar), ...revArgs];
      (
        revBindingsWithThis,
        curTxt ++ renderPos(List.length(nextRevArgsWithBinding)),
        nextRevArgsWithBinding,
      );
    | (Prim(tag, prim, subs), false, _, _) =>
      /* Filter empty tag in prim calls because forbid raw text, but allow white. */
      let errorNonEmpty = Some((tag, prim));
      let isMacro = String.equal(prim, "%caml_js_expanded_raw_macro_done");
      let subs = isMacro ? subs : removeEmptyRaw(~errorNonEmpty, md, subs);
      /* revPrimBindings should be empty */
      let (revPrimBindings, subTxt, revArgsWithSubRevArgs) =
        expand(~doExpand, ~inIf, subs, revArgs);
      if (List.length(revPrimBindings) !== 0) {
        failwith("revPrimBindings was supposed to be length zero");
      };
      (revBinds, curTxt ++ renderPrim(tag, subTxt), revArgsWithSubRevArgs);
    };
  }
  /**
   * TODO: Couldn't this just compute a new tree, and then we can render it?
   * Similar to how we evaluate "predicate". Yes, we should fix this up.
   */
  and expand = (~doExpand, ~inIf, nodeList, curRevArgs) => {
    let init = ([], "", curRevArgs);
    List.fold_left(~f=expandNode(~doExpand, ~inIf), ~init, nodeList);
  };
  let (revBinds, subTxt, subRevArgs) =
    expand(~doExpand=true, ~inIf=false, nodeList, []);
  let finalBindingData = (subTxt, List.rev(subRevArgs));
  (List.rev(revBinds), finalBindingData);
};

/**
 * - Removes backend primitive specific portions.
 * - Automatically hoists RawIfs supplied directly as primitive args into their
 * own extern calls.
 * - Converts sugars such as `<@1.toNull.toString/> into
 *    `<@toString><@toNull><@1/></@toNull><@/toString>`
 * - Converts all of the following to `<@require>Raw(MyModule)</@require>` even
 * though this would not be allowed for any other prim.
 *
 *     <@require>MyModule</@require>
 *     <@require>"MyModule"</@require>
 */
let rec normalize = (~file=?, md, nodeList, ~forBackend) => {
  let normalize = normalize(~file?, ~forBackend, md);
  let be = forBackend;
  let numericDot = tag =>
    switch (String.split_char(~sep='.', tag)) {
    /* At least an n.a, and maybe n.a.b */
    | [hd, _hd2, ...tl] =>
      switch (int_of_string_opt(hd)) {
      | Some(i) => Some((i, [_hd2, ...tl]))
      | None => None
      }
    | [_]
    | [] => None
    };
  let rec primArg = node =>
    switch (node) {
    | RawIf(_) =>
      Prim(
        "%caml_js_expanded_raw_macro_done",
        "%caml_js_expanded_raw_macro_done",
        normalize([node]),
      )
    | _ => normalize1(node)
    }
  and removeQuotes = p => {
    let len = String.length(p);
    p.[0] === '"' && p.[len - 1] === '"'
      ? String.sub(p, ~pos=1, ~len=len - 2) : p;
  }
  and chainPrims = (content, lst) =>
    switch (lst) {
    | [] => content
    | [hd, ...tl] => chainPrims(Prim(hd, primName(hd), [content]), tl)
    }
  and normalizeOnePrim = (tag, thePrimName, sub) => {
    switch (numericDot(tag), getProjectRoot(), file, thePrimName, sub) {
    | (Some((n, dots)), _, _, _, sub) => chainPrims(Arg(n), dots)
    | (_, _, None, "%caml_require", [Prim("projectRoot", _, []), ..._]) =>
      raiseNoOutputFileButProjectRoot(md)
    | (
        _,
        Some(root) as projectRoot,
        Some(file),
        "%caml_require",
        [Prim("projectRoot", _, []), Raw(path)],
      ) =>
      let path = String.trim(path);
      let path = removeQuotes(path);
      let len = String.length(path);
      if (len === 0) {
        raiseEmptyRequirePaths(~which="require path", md);
      };
      if (path.[0] == '.') {
        raiseRelativeRequires(path, projectRoot, md);
      };
      let relativized =
        PathUtils.relativizeAbsolutePathsOnSameDrive(
          PathUtils.normalizeRelativeToCwd(file),
          PathUtils.concat(root, "/" ++ path),
        );
      Prim(tag, thePrimName, normalize([Raw(relativized)]));
    | (_, _, _, "%caml_require", [Raw(path)]) =>
      let path = String.trim(path);
      let path = removeQuotes(path);
      let len = String.length(path);
      if (len === 0) {
        raiseEmptyRequirePaths(~which="require path", md);
      };
      if (path.[0] == '.') {
        let projectRoot = getProjectRoot();
        raiseRelativeRequires(path, projectRoot, md);
      };
      Prim(tag, thePrimName, normalize([Raw(path)]));
    | (_, _, _, "%caml_require", _) => raiseMacroMalformedRequire(md)
    | _ => Prim(tag, thePrimName, List.map(sub, ~f=primArg))
    };
  }
  and normalize1 = child =>
    switch (child) {
    | Raw(_)
    | Arg(_) => child
    /* TODO: Normalize the expression test */
    | RawIf(exp, tr, fl, un) =>
      RawIf(normalize1(exp), normalize(tr), normalize(fl), normalize(un))
    | Prim(tag, thePrimName, sub) => normalizeOnePrim(tag, thePrimName, sub)
    };
  let folder = (cur, child) =>
    switch (child) {
    | Prim(tag, thePrimName, sub) =>
      let isOldForm = String.equal(tag, "js") || String.equal(tag, "php");
      let tagLen = String.length(tag);
      if (isOldForm) {
        String.equal(tag, be) ? List.rev_append(normalize(sub), cur) : cur;
      } else if (tagLen > 2 && String.sub(tag, ~pos=0, ~len=1) == ".") {
        String.equal(String.sub(tag, ~pos=1, ~len=tagLen - 1), be)
          ? List.rev_append(normalize(sub), cur) : cur;
      } else {
        [normalize1(child), ...cur];
      };
    | _ => [normalize1(child), ...cur]
    };

  let taken = List.fold_left(~init=[], ~f=folder, nodeList);
  List.rev(taken);
};

let rec evalRawIfsInExpanded = (subs, macroData, args, ~testVal) => {
  let rec impl = (subs, initRevArgs) =>
    List.fold_left(
      subs, ~init=([], initRevArgs), ~f=((revNodes, revArgs), child) =>
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
      | RawIf(Arg(i), ts, fs, unknwns) =>
        let arg =
          nth_error(
            args,
            i - 1,
            renderRawIf(renderPos(i), "..", "..", ".."),
          );
        switch (testVal(arg)) {
        /* Defer removal of dead segments until all flow analysis is done (in generate) */
        | None =>
          let nextRevArgs = [arg, ...revArgs];
          let nextLen = List.length(nextRevArgs);
          /* Shifts the index because we could have removed some in previous impl calls. */
          let (nextRevSubNodesTrue, nextRevArgs) = impl(ts, nextRevArgs);
          let (nextRevSubNodesFalse, nextRevArgs) = impl(fs, nextRevArgs);
          let (nextRevSubNodesUnknown, nextRevArgs) =
            impl(unknwns, nextRevArgs);
          let nextRevNodes = [
            RawIf(
              Arg(nextLen),
              List.rev(nextRevSubNodesTrue),
              List.rev(nextRevSubNodesFalse),
              List.rev(nextRevSubNodesUnknown),
            ),
            ...revNodes,
          ];
          (nextRevNodes, nextRevArgs);
        | Some(b) =>
          let sub = b ? ts : fs;
          // TODO: I think we can remove this arg.
          let nextRevArgsWithThis = [arg, ...revArgs];
          /* Shifts the index because we could have removed some */
          let (nextRevSubs, nextRevArgs) = impl(sub, nextRevArgsWithThis);
          let nextRevNodes = nextRevSubs @ revNodes;
          (nextRevNodes, nextRevArgs);
        };
      | RawIf(Prim(tag, _, _), _, _, _) =>
        raiseInternalError(
          "Something went wrong with expanding 'raw ifs' tag "
          ++ tag
          ++ ". Primitives in RawIf <@?> test arguments should have already been expaneded.",
          macroData,
        )
      | RawIf(_) =>
        raiseInternalError(
          "Something went wrong with expanding 'raw ifs'. Raw ifs should have already been expaneded",
          macroData,
        )
      | Prim(tag, prim, subs) =>
        let (nextRevSubs, revArgs) = impl(subs, revArgs);
        let nextRevNodes = [
          Prim(tag, prim, List.rev(nextRevSubs)),
          ...revNodes,
        ];
        (nextRevNodes, revArgs);
      }
    );
  let (finalRevNodes, finalRevArgs) = impl(subs, []);
  (List.rev(finalRevNodes), List.rev(finalRevArgs));
};

let printMacro = subs => "raw-macro:" ++ printNodeList(subs);

let flattenFinal = (macroData, args, subs) => {
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
    | RawIf(Arg(i), _t, _f, unknwns) =>
      List.fold_left(~f=impl, ~init=curRev, unknwns)
    | RawIf(_) =>
      raiseInternalError(
        "RawIf prim calls should be expanded by now.",
        macroData,
      )
    | Prim(_, _, subs) =>
      raiseInternalError(
        "Macro prim calls should be expanded by now.",
        macroData,
      )
    };
  };
  List.rev(List.fold_left(~f=impl, ~init=[], subs));
};

let printFlattened = rawSegmentList =>
  List.map(rawSegmentList, ~f=seg =>
    switch (seg) {
    | Rehp.RawText(r) => r
    | RawSubstitution(i) => "<@arg/>"
    }
  )
  |> String.concat(~sep="");

module Eval = {
  let _printArgsString = args =>
    List.mapi(args, ~f=(i, arg) =>
      switch (arg) {
      | Code.Pc(String(s) | IString(s)) => s
      | Code.Pv(v) => "v(" ++ string_of_int(Code.Var.idx(v)) ++ ") "
      | _ => "?"
      }
    )
    |> String.concat(~sep=",");
  let _printNewBinding = (~title, bindVar, ~firstArg, args) => {
    let argsString = "(" ++ firstArg ++ "," ++ _printArgsString(args) ++ ")";
    print_endline(
      title
      ++ " bindings: var "
      ++ string_of_int(Code.Var.idx(bindVar))
      ++ " = call"
      ++ argsString,
    );
  };
  let evalConditionalMacros = (~testVal, x, macroData, nodeList, args) =>
    evalRawIfsInExpanded(nodeList, macroData, args, ~testVal);

  let expandMacros = (x, macroData, nodeList, args) => {
    /* let macroText = printNodeList(nodeList); */
    /* _printNewBinding(~title="preexpanded :", x, ~firstArg=macroText, args); */
    /* Expand any newly surfaced primitive calls that were previously defered
     * until the RawIf tests could be simplified */
    let mode = DontExpandPrimsInRawIfBranches;
    let (expandedBindings, finalBindingData) =
      expandPrimBindingsAndArgs(~mode, macroData, args, nodeList);
    let (nextMacroText, nextMacroArgs) = finalBindingData;
    let newBindings =
      List.map(expandedBindings, ~f=(((_tag, externName, bindVar), args)) => {
        /* let title = "  expanded binding " ++ externName; */
        /* _printNewBinding(~title, bindVar, ~firstArg="", args); */
        Code.Let(
          bindVar,
          Prim(Extern(externName), args),
        )
      });
    /* let title = ="expanded :"; */
    /* _printNewBinding( ~title, x, ~firstArg=nextMacroText, nextMacroArgs,); */
    (newBindings, nextMacroText, nextMacroArgs);
  };

  let take_the_unknown_case_of_macro = (x, macroData, args) => {
    let nodeList = parseNodeList(macroData);
    let mode = ExpandPrimsInUnknownBranches;
    /* let title = "pre expanded unknown but after evalling conditional macros: "; */
    /* _printNewBinding(~title, x, ~firstArg=printNodeList(nodeList), args); */
    let (expandedBindings, finalBindingData) =
      expandPrimBindingsAndArgs(~mode, macroData, args, nodeList);
    let (nextMacroText, nextMacroArgs) = finalBindingData;
    let newBindings =
      List.map(expandedBindings, ~f=(((_tag, externName, bindVar), args)) => {
        /* let title = */
        /*   "  expanded macro binding for unknown cases " ++ externName; */
        /* _printNewBinding(~title, bindVar, ~firstArg="", args); */
        Code.Let(
          bindVar,
          Prim(Extern(externName), args),
        )
      });
    /* let title = "expanded unknown : "; */
    /* _printNewBinding(~title, x, ~firstArg=nextMacroText, args); */
    (newBindings, nextMacroText, nextMacroArgs);
  };
};
