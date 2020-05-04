/**
 * Exception for problems that the user is responsible for - something wrong
 * with their code for example.
 * Could be used beyond macros as well. Used to surface a user facing message
 * with potential file/lineno.
 */
open Stdlib;
exception UserError(string, option(Parse_info.t));

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

let backendUnsupportedRequire = path =>
  "The macro called here contains a <@require> and your backend was not "
  ++ "capable of loading this particular require statement. ";

let requireUnsupportedBackend = path =>
  "Somewhere in this file you are calling macro that has a <@require*> tag "
  ++ " but your backend doesn't support require tags. The macro definition "
  ++ "itself is requiring "
  ++ path
  ++ ". That macro may be defined in another file but called here.";

let weirdArgumentsToCamlRequire = {|
  This code calls a macro with an invalidly written <@require>.
  <@require> should either contain a single raw text child like:

    <@require>some-npm-dependency/path/to/file.js</@require>

  Or a reference to a module within the current project followed by the
  rest of the path - no spaces anywhere inside the <@require>:

    <@require><@projectRoot/>/src/file.js</@require>

  This error could also be because your specific backend doesn't support
  the <@require> tag, but more likely that the <@require> was not written
  correctly.
|};

let macroUndefinedProjectRoot = {|
  The macro called here uses a <@projectRoot/> in a <@require>, but we
  cannot determine the projectRoot. The env variables $cur__original_root and
  $ESY__ROOT_PACKAGE_CONFIG_PATH were checked but not set.
|};

let relativeRequiresNotSupported =
    (commonMacroError, path, projectRoot, formattedMacro) => {
  let rootMsg =
    switch (projectRoot) {
    | None => {|
  However, that won't work until your project root is detectable and we cannot
  detect your project root. Currently the following esy environment variable
  is checked: $cur__original_root. Is that set during the build? In the future
  more ways to set/infer the project root will be added.
    |}
    | Some(r) => Printf.sprintf("Your <@root/> has been detected as: %s", r)
    };
  Printf.sprintf(
    {|%s
  The macro called here uses a require "relative to the current file" using ./ (such as %s)
  are not yet supported. Requires (of non-compiled modules) relative to the
  project root (typically the one with a package.json) should use `<@root/>`.
  Instead of:
    <@require>./someJsFile.js</@require>
  Do:
    <@require><@root/>/path/to/someJsFile.js</@require>

  %s

  The macro contents are:
%s
|},
    commonMacroError,
    path,
    rootMsg,
    formattedMacro,
  );
};

let macroNoOutputFile = (commonMacroError, formattedMacro) => {
  Printf.sprintf(
    {|%s
  The macro being called here uses a <@require> with a <@projectRoot/>, but
  doing so requires that we know the compiled output file name/path, and the
  output file path is not known - likely because you are compiling to stdout.
  The macro contents are:
%s
|},
    commonMacroError,
    formattedMacro,
  );
};
