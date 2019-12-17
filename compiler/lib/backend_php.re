open Stdlib;
module PP = Pretty_print;
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
  /* This allows us to use return as an identifier in certain situations
   * without causing it to be ref boxed. Let's us fake return(x) as a function
   * call expression in module loading scenarios. */
  "return",
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

let compute_footer_summary = (moduleName, metadatas) => {
  List.map(metadatas, ~f=metadata =>
    switch (metadata.Module_export_metadata.original_name) {
    | None => []
    | Some(nm) =>
      let noNames = {contents: 0};
      let argsList =
        List.map(metadata.arg_names, ~f=nm =>
          switch (nm) {
          | None =>
            noNames.contents = noNames.contents + 1;
            "unnamed" ++ string_of_int(noNames.contents);
          | Some(n) => n
          }
        );
      let params =
        List.map(~f=nm => "dynamic $" ++ nm, argsList)
        |> String.concat(~sep=", ");
      let args =
        List.map(~f=nm => "$" ++ nm, argsList) |> String.concat(~sep=", ");
      [
        "  public static function " ++ nm ++ "(" ++ params ++ ") {",
        "    return static::get()["
        ++ string_of_int(metadata.export_index)
        ++ "]("
        ++ args
        ++ ");",
        "  }",
      ];
    }
  )
  |> List.concat;
};
let provided = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    _php_globals,
  );
let object_wrapper = ((), obj) =>
  Rehp.ECall(EVar(Id.ident("ObjectLiteral")), [obj], N);

let output =
    (
      (),
      formatter,
      ~custom_header,
      ~source_map=?,
      ((rehp, module_export_metadatas), linkinfos),
    ) => {
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
  let remainingChunks =
    Backend.Helpers.print_until_compilation_output(
      formatter,
      custom_header.Module_prep.chunks,
    );
  Php_output.program(formatter, ~source_map?, allPhp);
  let (remainingChunks, shouldPrintSummary) =
    Backend.Helpers.print_until_summary(formatter, remainingChunks);
  if (shouldPrintSummary) {
    let summary =
      compute_footer_summary(
        custom_header.module_name,
        module_export_metadatas,
      );
    List.iter(
      summary,
      ~f=s => {
        PP.string(formatter, s);
        PP.newline(formatter);
      },
    );
  };
  Backend.Helpers.print_texts(formatter, remainingChunks);
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};

/**
 * In PHP or other backends, we aren't doing any intelligent detection of
 * which external bindings are linked in. So instead we keep a manual list of
 * externals we know we need to implement.
 */
let is_prim_supplied = ((), s) => {
  let len = String.length(s);
  switch (s) {
  | "caml_call1"
  | "caml_call2"
  | "caml_call3"
  | "caml_call4"
  | "caml_call5"
  | "caml_call6"
  | "caml_call7"
  | "caml_call8" =>
    let pretty_name =
      len > 9 && String.equal(String.sub(s, ~pos=0, ~len=9), "caml_call")
        ? "call" ++ String.sub(s, ~pos=9, ~len=len - 9) : s;
    Some(pretty_name);
  | "unsigned_right_shift_32"
  | "left_shift_32"
  | "right_shift_32"
  | "is_int"
  | "caml_wrap_thrown_exception_traceless"
  | "caml_wrap_thrown_exception_reraise"
  | "caml_wrap_thrown_exception"
  | "caml_wrap_exception"
  | "caml_arity_test" => Some(s)
  | _ => None
  };
};

let custom_module_registration = () =>
  Some(
    (runtime_getter, module_expression, module_export_metadatas) => {
      let moduleExports =
        Rehp.ECall(Rehp.ERaw("return"), [module_expression], Loc.N);
      Some(moduleExports);
    },
  );
let custom_module_loader = () =>
  Some(
    (runtime_getter, name) =>
      Some(Rehp.ECall(Rehp.ERaw(name ++ "::get"), [], Loc.N)),
  );
