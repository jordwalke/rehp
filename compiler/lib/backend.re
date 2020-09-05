open Stdlib;

exception Not_an_ident;
let times = Debug.find("times");

module Helpers = {
  let git_version = () => "temporarily-disabled-git-version";

  let is_prefixed_with_one_of = (set, str) => {
    StringSet.exists(elem => set);
  };

  /**
   * Prints leading chunks until compilation output placeholder, and performs
   * the required formatter indent command at that point. Returns remaining
   * chunks.
   */
  let rec print_until_compilation_output =
          (formatter, chunks: list(Module_prep.chunk)) => {
    switch (chunks) {
    | [] => []
    | [Text(s), ...tl] =>
      Pretty_print.string(formatter, s);
      print_until_compilation_output(formatter, tl);
    | [Module_prep.CompilationOutputPlaceholder(indent), ...tl] =>
      Pretty_print.space(~indent, formatter);
      tl;
    | [Module_prep.SummaryPlaceholder(async, indent), ...tl] =>
      raise(
        Invalid_argument(
          "Summary should not come before compilation output in template",
        ),
      )
    };
  };

  /**
   * Prints leading chunks until compilation output placeholder, and performs
   * the required formatter indent command at that point. Returns remaining
   * chunks and a bool indicating whether or not the summary should even be
   * printed.
   */
  let rec print_until_summary = (formatter, chunks: list(Module_prep.chunk)) => {
    switch (chunks) {
    | [] => ([], false, false)
    | [Text(s), ...tl] =>
      Pretty_print.string(formatter, s);
      print_until_summary(formatter, tl);
    | [Module_prep.CompilationOutputPlaceholder(indent), ...tl] =>
      raise(
        Invalid_argument(
          "Summary should not come before compilation output in template",
        ),
      )
    | [Module_prep.SummaryPlaceholder(should_async, _), ...tl] => (
        tl,
        true,
        should_async,
      )
    };
  };

  let rec print_texts = (formatter, chunks: list(Module_prep.chunk)) => {
    switch (chunks) {
    | [Text(s), ...tl] =>
      Pretty_print.string(formatter, s);
      print_texts(formatter, tl);
    | [] => ()
    | [Module_prep.CompilationOutputPlaceholder(_), ...tl]
    | [Module_prep.SummaryPlaceholder(_, _), ...tl] =>
      print_texts(formatter, tl)
    };
  };

  /* Checks if a primitive is supplied by a stub js file or by a generate.ml
   * registered primitive. See generate.ml */
  let if_prim_supplied = (s, ~if_supplied, ~fallback) => {
    let s = Primitive.resolve(s);
    /* Primitive.exists only returns true if it was provided by the linker or
     * something that actually registers it with its arity/kind etc typically
     * from runtime stubs, or from one of the register_prim functions here.  If
     * it is not registered by linker or by one of the register_prim functions
     * here, but it is found in bytecode, it will merely be "added" as a
     * Primitive.add_external, but it won't "exist". Being "aliased" as a
     * primitive also does not mean it exists, though it too will be added as
     * Primitive.add_external.
     */
    if (Primitive.exists(s)) {
      /*
       * These "optional" prmitives still need to be added via
       * add_special_prim_if_exists in order to get "shared"/hoisted.
       */
      if_supplied();
    } else {
      fallback();
    };
  };

  let l =
    Array.init(
      256,
      ~f=i => {
        let c = Char.chr(i);
        if (c >= 'a'
            && c <= 'z'
            || c >= 'A'
            && c <= 'Z'
            || c == '_'
            || c == '$') {
          1;
        } else if (c >= '0' && c <= '9') {
          2;
        } else {
          0;
        };
      },
    );
  let is_ident = (keywords, s) => {
    let isKeyword = StringSet.mem(s, keywords);
    if (isKeyword) {
      false;
    } else {
      try(
        {
          for (i in 0 to String.length(s) - 1) {
            let code = l[Char.code(s.[i])];
            if (i == 0) {
              if (code != 1) {
                raise(Not_an_ident);
              };
            } else if (code < 1) {
              raise(Not_an_ident);
            };
          };
          true;
        }
      ) {
      | Not_an_ident => false
      };
    };
  };
};

/**
 * Some backends require the help of external implementation in order to to
 * implement some Rehp semantics. It is not something that can easily be
 * injected after the Rehp AST is constructed. It has to be done during the
 * construction of the Rehp AST, so that references to these externs are
 * properly hoisted etc.
 */
module type Rehp_external_implementations = {};

type runtime_getter = unit => Rehp.expression;

module type Backend_implementation = {
  /** Initialize backend with flags */
  let init: option(string) => unit;
  /* module Rehp_external_implementations: Rehp_external_implementations; */
  let custom_module_registration:
    unit =>
    option(
      (runtime_getter, Rehp.expression, list(Module_export_metadata.t)) =>
      option(Rehp.expression),
    );
  /**
   * Loads compiled module outputs using the language module loader.
   */
  let custom_module_loader:
    unit => option((runtime_getter, string) => option(Rehp.expression));

  /**
   * Loads non-compiled modules using the language module loader.
   */
  let module_require: unit => option(string => option(Rehp.expression));
  /**
   * Variable expression that the runtime variable is set to in separate
   * compilation mode.
   */
  let runtime_module_var: unit => Rehp.expression;
  let is_prim_supplied: (unit, string) => option(string);
  let extension: unit => string;
  let compiler_backend_flag: unit => string;
  let keyword: unit => StringSet.t;
  let provided: unit => StringSet.t;
  let is_ident: (unit, string) => bool;
  let allow_simplify_ifdecl: unit => bool;
  let object_wrapper: (unit, Rehp.expression) => Rehp.expression;
  let output:
    (
      unit,
      Pretty_print.t,
      ~custom_header: Module_prep.parsed,
      ~source_map: (option(string), Source_map.t)=?,
      (
        (Rehp.program, list(Module_export_metadata.t)),
        option(Linker.state),
      )
    ) =>
    unit;
};

type t = (module Backend_implementation);

let current = ref(None);

let set_backend = (backend: (module Backend_implementation), opt_flags) => {
  if (current.contents !== None) {
    raise(
      Invalid_argument(
        "Backend already set, but something is trying to set it again",
      ),
    );
  };
  module NewBackend = (val backend);
  NewBackend.init(opt_flags);
  current := Some(backend);
  VarPrinter.add_reserved(StringSet.elements(NewBackend.keyword()));
  VarPrinter.add_reserved(StringSet.elements(NewBackend.provided()));
};

module Current: Backend_implementation = {
  let init = opt_flags =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.init(opt_flags)
    };
  let extension = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.extension()
    };
  let compiler_backend_flag = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.compiler_backend_flag()
    };
  let keyword = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.keyword()
    };
  let provided = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.provided()
    };
  let is_ident = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.is_ident()
    };
  let object_wrapper = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.object_wrapper()
    };
  let output = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.output()
    };
  let allow_simplify_ifdecl = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.allow_simplify_ifdecl()
    };
  let is_prim_supplied = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.is_prim_supplied()
    };
  let custom_module_registration = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) =>
      CurrentBackend.custom_module_registration()
    };
  let custom_module_loader = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.custom_module_loader()
    };
  let module_require = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Compiler backend not set"))
    | Some((module CurrentBackend)) => CurrentBackend.module_require()
    };
  let runtime_module_var = () =>
    switch (current^) {
    | None => raise(Invalid_argument("Runtime setter not set"))
    | Some((module CurrentBackend)) => CurrentBackend.runtime_module_var()
    };
};
