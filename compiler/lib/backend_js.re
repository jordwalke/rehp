open Stdlib;
let times = Debug.find("times");
let js_keywords =
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    [
      /* keywork */
      "break",
      "case",
      "catch",
      "continue",
      "debugger",
      "default",
      "delete",
      "do",
      "else",
      "finally",
      "for",
      "function",
      "if",
      "in",
      "instanceof",
      "new",
      "return",
      "switch",
      "this",
      "throw",
      "try",
      "typeof",
      "var",
      "void",
      "while",
      "with",
      /* reserved in ECMAScript 5 */
      "class",
      "enum",
      "export",
      "extends",
      "import",
      "super",
      "implements",
      "interface",
      "let",
      "package",
      "private",
      "protected",
      "public",
      "static",
      "yield",
      /* other */
      "null",
      "true",
      "false",
      "NaN",
      "undefined",
      "this",
      /* Unexpected eval or arguments in strict mode */
      "eval",
      "arguments",
      /* also reserved in ECMAScript 3 */
      "abstract",
      "boolean",
      "byte",
      "char",
      "const",
      "double",
      "final",
      "goto",
      "int",
      "long",
      "native",
      "short",
      "synchronized",
      "throws",
      "transient",
      "volatile",
      /* also reserved in ECMAScript 6 */
      "await",
    ],
  );
let extension = () => "js";
let compiler_backend_flag = () => extension();
let keyword = () => js_keywords;
let is_ident = () => Backend.Helpers.is_ident(keyword());
let allow_simplify_ifdecl = () => true;
let _js_globals = [
  "joo_global_object",
  "event",
  "location",
  "window",
  "document",
  "eval",
  "navigator",
  "self",
  "Array",
  "Date",
  "Math",
  "JSON",
  "Object",
  "RegExp",
  "String",
  "Boolean",
  "Number",
  "Infinity",
  "isFinite",
  "ActiveXObject",
  "XMLHttpRequest",
  "XDomainRequest",
  "DOMException",
  "Error",
  "SyntaxError",
  "TypeError",
  "arguments",
  "decodeURI",
  "decodeURIComponent",
  "encodeURI",
  "encodeURIComponent",
  "escape",
  "unescape",
  "isNaN",
  "parseFloat",
  "parseInt",
  "module",
  "require",
];

let provided = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    _js_globals,
  );
let object_wrapper = ((), obj: Rehp.expression) => obj;

let output =
    ((), formatter, ~custom_header, ~source_map=?, (), (rehp, linkinfos)) => {
  let js = Javascript_from_rehp.from_rehp(rehp);
  let jsWithRuntime =
    switch (linkinfos) {
    | None => js
    | Some(linkinfos) =>
      let {Linker.runtime_code, always_required_codes} =
        Linker.link(linkinfos);
      List.flatten(
        List.rev([
          js,
          runtime_code,
          ...List.map(~f=ar => ar.Linker.program, always_required_codes),
        ]),
      );
    };
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Writing file...@.");
  };
  Backend.Helpers.print_header_head(~custom_header, formatter);
  Js_output_impl.program(
    formatter,
    ~custom_header,
    ~source_map?,
    jsWithRuntime,
  );
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};
