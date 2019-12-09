open Stdlib;
let times = Debug.find("times");
let php_keywords =
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    [
      /* keywork */
      "break",
      "case",
      "catch",
      "continue",
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
      "float",
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
let extension = () => "php";
let compiler_backend_flag = () => extension();
let keyword = () => php_keywords;
let is_ident = () => Backend.Helpers.is_ident(keyword());
let allow_simplify_ifdecl = () => false;
let _php_globals = [
  "joo_global_object",
  "Object",
  "Func",
  "ObjectLiteral",
  "ArrayLiteral",
  "Array",
  "RegExp",
  "String",
  "Math",
  "plus",
  "eqEq",
  "eqEqEq",
  "typeof",
  "Date",
  "Boolean",
  "Number",
  "max_int",
  "min_int",
  "Infinity",
  "require",
  "module",
  "NaN",
  "isNaN",
];
let provided = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    _php_globals,
  );
let object_wrapper = ((), obj) =>
  Rehp.ECall(EVar(Id.ident("ObjectLiteral")), [obj], N);

let output =
    ((), formatter, ~custom_header, ~source_map=?, (), (rehp, linkinfos)) => {
  let addOneStr = (env, name) => Php_from_rehp.addOne(env, Id.ident(name));

  /* let missing = StringSet.diff(used, languageProvided); */

  /* let other = StringSet.diff(free, missing); */

  let initialEnv =
    List.fold_left(
      ~f=addOneStr,
      ~init=Php_from_rehp.empty,
      StringSet.elements(provided()),
    );
  let (runtimePhp, env) =
    switch (linkinfos) {
    | None => (
        [],
        Php_from_rehp.{
          vars: initialEnv,
          enclosed_by: Php_from_rehp.NoLoopOrSwitch,
        },
      )
    | Some(linkinfos) =>
      let envWithRuntimeVars =
        List.fold_left(
          ~f=addOneStr,
          ~init=initialEnv,
          Linker.all(linkinfos),
        );
      let {Linker.runtime_code, always_required_codes} =
        Linker.link(linkinfos);
      let initialEnv =
        Php_from_rehp.{
          vars: initialEnv,
          enclosed_by: Php_from_rehp.NoLoopOrSwitch,
        };
      let (_, mapped) =
        [
          runtime_code,
          ...List.map(~f=ar => ar.Linker.program, always_required_codes),
        ]
        |> List.rev
        |> List.map(~f=js => Rehp_from_javascript.raws_from_javascript(js))
        |> List.flatten
        /* Render the stubs with an env that includes themselves because we
         * know they'll be placed in the correct topological sort (mostly). */
        |> Php_from_rehp.(program(initialEnv));
      (
        mapped,
        Php_from_rehp.{
          vars: envWithRuntimeVars,
          enclosed_by: Php_from_rehp.NoLoopOrSwitch,
        },
      );
    };

  let (_, php) = Php_from_rehp.(program(env, rehp));
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Writing file (Php)...@.");
  };
  let allPhp = List.concat([runtimePhp, php]);
  Backend.Helpers.print_header_head(~custom_header, formatter);
  Php_output.program(formatter, ~custom_header, ~source_map?, allPhp);
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};
