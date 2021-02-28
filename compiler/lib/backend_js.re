open Stdlib;
module Fp = RehpFp;
module PP = Pretty_print;
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

/**
 * Since module.exports is (currently) an Array, we can't set these properties
 * because they collide with array properties that we need
 */
let js_array_conflict =
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    ["length"],
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

/*::
   type Exports = {
     foo: string,
     bar: void => number
   }
  */
/** @type {{_: any, bar: () => number, foo: String }} */
// module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
// module.exports.foo = module.exports[1];
// module.exports.bar = module.exports[2];
//

let normalize_name = nm => {
  let nm_no_unders = String.trim_leading_char('_', nm);
  let elem_matches = elem => {
    String.equal(String.trim_leading_char('_', elem), nm_no_unders);
  };
  StringSet.exists(elem_matches, js_array_conflict)
  || StringSet.exists(elem_matches, js_keywords)
    ? "_" ++ nm ++ "_" : nm;
};
let compute_footer_summary = (moduleName, metadatas) => {
  let rec dedupeAndFilter = (revDeduped, rest) => {
    switch ((rest: list(Module_export_metadata.t))) {
    | [] => List.rev(revDeduped)
    | [{original_name: None}, ...tl] => dedupeAndFilter(revDeduped, tl)
    | [{original_name: Some(nm)} as hd, ...tl] =>
      List.exists(revDeduped, ~f=md =>
        switch (md.Module_export_metadata.original_name) {
        | None => true
        | Some(dedupedNm) => String.equal(dedupedNm, nm)
        }
      )
        ? dedupeAndFilter(revDeduped, tl)
        : dedupeAndFilter([hd, ...revDeduped], tl)
    };
  };
  let metadatas = dedupeAndFilter([], metadatas);
  let flowRows =
    List.map(metadatas, ~f=metadata =>
      switch (metadata.Module_export_metadata.original_name) {
      | None => []
      | Some(nm) =>
        let nm = normalize_name(nm);
        if (metadata.Module_export_metadata.arity === 0) {
          ["  " ++ nm ++ ": any,"];
        } else {
          let argsList =
            List.mapi(metadata.arg_names, ~f=(i, nm) =>
              switch (nm) {
              | None => "arg" ++ string_of_int(i)
              | Some(n) => n
              }
            );
          let flowTypeArgs =
            List.map(~f=nm => normalize_name(nm) ++ ": any", argsList)
            |> String.concat(~sep=", ");
          ["  " ++ nm ++ ": (" ++ flowTypeArgs ++ ") => any,"];
        };
      }
    )
    |> List.concat;
  let tsRows =
    List.mapi(metadatas, ~f=(i, metadata) =>
      switch (metadata.Module_export_metadata.original_name) {
      | None => []
      | Some(nm) =>
        let nm = normalize_name(nm);
        if (metadata.Module_export_metadata.arity === 0) {
          ["  " ++ nm ++ ": any,"];
        } else {
          let tsTypeArgs =
            List.mapi(
              ~f=
                (i, nm) =>
                  switch (nm) {
                  | None => "arg" ++ string_of_int(i) ++ ": any"
                  | Some(n) => normalize_name(n) ++ ": any"
                  },
              metadata.arg_names,
            )
            |> String.concat(~sep=", ");
          ["  " ++ nm ++ ": (" ++ tsTypeArgs ++ ") => any,"];
        };
      }
    )
    |> List.concat;

  let exportRows =
    List.map(metadatas, ~f=metadata =>
      switch (metadata.Module_export_metadata.original_name) {
      | None => []
      | Some(nm) => [
          "module.exports."
          ++ normalize_name(nm)
          ++ " = module.exports["
          ++ string_of_int(metadata.export_index)
          ++ "];",
        ]
      }
    )
    |> List.concat;

  List.concat([
    ["/*::" ++ "type Exports = {"],
    flowRows,
    ["}*/"],
    ["/** @type {{"],
    tsRows,
    ["}} */"],
    ["module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);"],
    exportRows,
  ]);
};
let provided = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    _js_globals,
  );
let object_wrapper = ((), obj: Rehp.expression) => obj;

let output =
    (
      (),
      formatter,
      ~custom_header,
      ~source_map=?,
      ((rehp, module_export_metadatas), linkinfos),
    ) => {
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
  let remainingChunks =
    Backend.Helpers.print_until_compilation_output(
      formatter,
      custom_header.Module_prep.chunks,
    );
  let print_sourcemaps =
    Js_output.program(formatter, ~source_map?, jsWithRuntime);
  let (remainingChunks, shouldPrintSummary, _should_async) =
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
  print_sourcemaps();
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};

let extra_pretty_print = ((), partially_formatted_output) =>
  Js_of_ocaml_flow_pretty_printer.Util.pretty_print(
    partially_formatted_output,
  );

/**
 * Primitive.exists only returns true if it was provided by the linker or
 * something that actually registers it with its arity/kind etc typically
 * from runtime stubs, or from one of the register_prim functions here.  If
 * it is not registered by linker or by one of the register_prim functions
 * here, but it is found in bytecode, it will merely be "added" as a
 * Primitive.add_external, but it won't "exist". Being "aliased" as a
 * primitive also does not mean it exists, though it too will be added as
 * Primitive.add_external.
 */
let is_prim_supplied = ((), s) => {
  let len = String.length(s);
  let s = Primitive.resolve(s);
  if (Primitive.exists(s)) {
    let pretty_name = {
      len > 9 && String.equal(String.sub(s, ~pos=0, ~len=9), "caml_call")
        ? "call" ++ String.sub(s, ~pos=9, ~len=len - 9) : s;
    };
    Some(pretty_name);
  } else {
    None;
  };
};

/**
 * Note that this particular approach does not work well when --pretty is
 * disabled (but you probably use some other JS minifier anyways).
 */
let custom_module_registration = () =>
  Some(
    (runtime_getter, module_expression, module_export_metadatas) => {
      let moduleExports =
        Rehp.EBin(
          Rehp.Eq,
          Rehp.EDot(Rehp.EVar(Id.ident("module")), "exports"),
          module_expression,
        );
      Some(moduleExports);
    },
  );

let _findInDependencyOutputs = name => {
  let dependency_outputs = Dependency_outputs.get();
  let found =
    List.find_all(dependency_outputs, ~f=output =>
      String.equal(output.Dependency_outputs.normalizedCompilationUnit, name)
    );
  let requireStr =
    switch (found) {
    | [] => name ++ ".js"
    | [hd, ...tl] =>
      let s =
        Fp.toDebugString(Fp.append(hd.dirRelativeToOutput, hd.filename));
      let len = String.length(s);
      /* Normalize require("./../foo") to require("../foo") for style. */
      len > 4
      && s.[0] === '.'
      && s.[1] === '/'
      && s.[2] === '.'
      && s.[3] === '.'
      && s.[4] === '/'
        ? String.sub(~pos=2, ~len=len - 2, s) : s;
    };
  Rehp.ECall(
    Rehp.EVar(Id.ident("require")),
    [Rehp.EStr(requireStr, `Bytes)],
    Loc.N,
  );
};
let custom_module_loader = () =>
  Some((runtime_getter, name) => Some(_findInDependencyOutputs(name)));

let module_require = () =>
  Some(
    name => {
      Some(
        Rehp.ECall(
          Rehp.EVar(Id.ident("require")),
          [Rehp.EStr(name, `Bytes)],
          Loc.N,
        ),
      )
    },
  );

let runtime_module_var = () => _findInDependencyOutputs("runtime");
