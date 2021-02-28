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

/**
 * Names of methods which might conflict with the base class that each module
 * extends.
 */
let static_methods =
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    [
      "__construct",
      /* get will be the assumed base static method used to load a module */
      "get",
      "call",
      "genCall",
      "syncCall",
      "getExports",
      "callRehackFunction",
      "genCallFunctionWithArgs",
      "genCallName",
      "syncCallName",
      "syncCallFunctionWithArgs",
    ],
  );

let removeConflicts = (set, nm) => {
  let nm_no_unders = String.trim_leading_char('_', nm);
  let same_modulo_unders = elem =>
    String.equal(String.trim_leading_char('_', elem), nm_no_unders);
  /*
   * reservedWord -> _reservedWord
   * _reservedWord -> __reservedWord
   *
   * Or if the reserved word already has underscores (like __construct):
   * construct -> ___construct
   * _construct -> ____construct
   */
  let found = {contents: None};
  /*
   * Very strange, StringSet.find_first_opt(same_modulo_unders, set)
   * isn't iterating through all of the items!! Need to manually loop.
   * Seems like a really bad bug somewhere.
   */
  set
  |> StringSet.iter(s =>
       same_modulo_unders(s) ? found.contents = Some(s) : ()
     );

  switch (found.contents) {
  | None => nm
  | Some(found) =>
    let conflictUnders = String.num_leading_char('_', found);
    let numOrigUnders = String.num_leading_char('_', nm);
    String.make(1 + conflictUnders + numOrigUnders, '_') ++ nm_no_unders;
  };
};

let compute_footer_summary = (moduleName, metadatas, should_async) => {
  let rec dedupeAndFilter = (revDeduped, rest) => {
    switch ((rest: list(Module_export_metadata.t))) {
    | [] => List.rev(revDeduped)
    | [{original_name: None}, ...tl] => dedupeAndFilter(revDeduped, tl)
    | [{original_name: Some(nm)} as hd, ...tl] =>
      List.exists(revDeduped, ~f=md =>
        switch (md.Module_export_metadata.original_name) {
        | None => true
        | Some(dedupedNm) =>
          String.equal(
            String.lowercase_ascii(dedupedNm),
            String.lowercase_ascii(nm),
          )
        }
      )
        ? dedupeAndFilter(revDeduped, tl)
        : dedupeAndFilter([hd, ...revDeduped], tl)
    };
  };
  let metadatas = dedupeAndFilter([], metadatas);
  List.map(metadatas, ~f=metadata =>
    switch (
      metadata.Module_export_metadata.arity,
      metadata.Module_export_metadata.original_name,
    ) {
    | (0, _)
    | (_, None) => []
    | (_, Some(nm)) =>
      let nm = removeConflicts(static_methods, nm);
      let nm = removeConflicts(php_keywords, nm);
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
      let nmLen = String.length(nm);
      let argsLen = List.length(argsList);
      if (should_async
          && argsLen > 0
          && String.is_prefixed_i("gen", nm, 0)
          && (
            nmLen === 3
            || nmLen > 3
            && nm.[3] !== Char.lowercase_ascii(nm.[4])
          )) {
        let (params, argsList) =
          switch (List.rev(argsList)) {
          /* Remove the callback since genCall will handle that.*/
          | [cb, ...tl] =>
            let nonCallbacks = List.rev(tl);
            let params =
              List.map(~f=nm => "dynamic $" ++ nm, nonCallbacks)
              |> String.concat(~sep=", ");
            (params, nonCallbacks);
          | [] => failwith("This should never happen")
          };
        let args = List.map(~f=nm => "$" ++ nm, argsList);
        let args = [
          "__FUNCTION__",
          string_of_int(metadata.export_index),
          ...args,
        ];
        [
          "  public static function "
          ++ nm
          ++ "("
          ++ params
          ++ "): Awaitable<dynamic> {",
          "    return static::genCall("
          ++ String.concat(~sep=", ", args)
          ++ ");",
          "  }",
        ];
      } else {
        let args = List.map(~f=nm => "$" ++ nm, argsList);
        let args = [
          "__FUNCTION__",
          string_of_int(metadata.export_index),
          ...args,
        ];
        let params =
          List.map(~f=nm => "dynamic $" ++ nm, argsList)
          |> String.concat(~sep=", ");
        [
          "  public static function " ++ nm ++ "(" ++ params ++ "): dynamic {",
          "    return static::syncCall("
          ++ String.concat(~sep=", ", args)
          ++ ");",
          "  }",
        ];
      };
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
  let addOneStr = (env, name) => Php_from_rehp.addVar(Id.ident(name), env);

  /* let missing = StringSet.diff(used, languageProvided); */

  /* let other = StringSet.diff(free, missing); */

  let initialEnv =
    List.fold_left(
      ~f=addOneStr,
      ~init=Php_from_rehp.emptyVars,
      StringSet.elements(provided()),
    );
  let env =
    Php_from_rehp.{
      vars: initialEnv,
      enclosedBy: Php_from_rehp.NoLoopOrSwitch,
    };

  let (_, php) = Php_from_rehp.(program(env, rehp));
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Writing file (Php)...@.");
  };
  let remainingChunks =
    Backend.Helpers.print_until_compilation_output(
      formatter,
      custom_header.Module_prep.chunks,
    );
  Php_output.program(formatter, ~source_map?, php);
  let (remainingChunks, shouldPrintSummary, should_async) =
    Backend.Helpers.print_until_summary(formatter, remainingChunks);
  if (shouldPrintSummary) {
    let summary =
      compute_footer_summary(
        custom_header.module_name,
        module_export_metadatas,
        should_async,
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

let extra_pretty_print = ((), partially_formatted_output) => partially_formatted_output;

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
        Rehp.ECall(
          Rehp.ERaw([Rehp.RawText("return")]),
          [module_expression],
          Loc.N,
        );
      Some(moduleExports);
    },
  );
let custom_module_loader = () =>
  Some(
    (runtime_getter, name) =>
      Some(
        Rehp.ECall(Rehp.ERaw([Rehp.RawText(name ++ "::get")]), [], Loc.N),
      ),
  );

let module_require = () => None;

let runtime_module_var = () =>
  Rehp.ERaw([
    Rehp.RawText("(\\Rehack\\GlobalObject::get() as dynamic)->jsoo_runtime"),
  ]);
