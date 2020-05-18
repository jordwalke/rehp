open Stdlib;

type backend_config = {
  extension: string,
  keywords: list(string),
  globals: list(string),
  supplied_primitives: list((string, string)),
  allow_simplify_ifdecl: bool,
};

type rpc_resp =
  | Config(backend_config)
  | Output(string);

type rpc_req =
  | FetchConfig
  | ProcessTree(Rehp.program);


module Subprocess = {
  type t = {
    ic: in_channel,
    oc: out_channel,
  };
  let create = cmd => {
    let (ic, oc) = Unix.open_process(cmd);
    {ic, oc};
  };
  let rpc = (t, req) => {
    Marshal.to_channel(t.oc, req, [Marshal.No_sharing]);
    flush(t.oc);
    let resp : rpc_resp = Marshal.from_channel(t.ic);
    resp;
  };
  let fetch_config = t => {
    switch (rpc(t, FetchConfig)) {
    | Config(cfg) => cfg
    | _ => failwith("unexpected rpc response for FetchConfig")
    };
  };
  let process_tree = (t, tree) => {
    switch (rpc(t, ProcessTree(tree))) {
    | Output(str) => str
    | _ => failwith("unexpected rpc response for ProcessIR")
    };
  };
};

let config = ref(None);
let subprocess = ref(None);

let get_config = () =>
  switch (config^) {
  | Some(cfg) => cfg
  | None => failwith("init() was not called")
  };

let get_subprocess = () =>
  switch (subprocess^) {
  | Some(sp) => sp
  | None => failwith("init() was not called")
  };

let init = flags => {
  let cmd =
    switch (flags) {
    | Some(flags) => flags
    | None =>
      failwith(
        "exec backend expects command line for exec passed as backend-flags",
      )
    };
  let sp = Subprocess.create(cmd);
  subprocess := Some(sp);
  let cfg = Subprocess.fetch_config(sp);
  config := Some(cfg);
};

let extension = () => get_config().extension;
let compiler_backend_flag = () => "exec";
let keyword = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    get_config().keywords,
  );
let is_ident = () => Backend.Helpers.is_ident(keyword());
let allow_simplify_ifdecl = () => get_config().allow_simplify_ifdecl;
let provided = () =>
  List.fold_left(
    ~f=(acc, x) => StringSet.add(x, acc),
    ~init=StringSet.empty,
    get_config().globals,
  );
let object_wrapper = ((), obj: Rehp.expression) => obj;

let output =
    (
      (),
      formatter,
      ~custom_header as _,
      ~source_map as _=?,
      ((rehp, _module_export_metadatas), _linkinfos),
    ) => {
  let output = Subprocess.process_tree(get_subprocess(), rehp);
  Pretty_print.start_group(formatter, 0);
  Pretty_print.string(formatter, output);
  Pretty_print.end_group(formatter);
};

let is_prim_supplied = ((), s) =>
  List.assoc_opt(s, get_config().supplied_primitives);

let custom_module_registration = () =>
  Some(
    (_runtime_getter, module_expression, _module_export_metadatas) => {
      Some(Rehp.ECustomRegister(module_expression))
    },
  );

let custom_module_loader = () =>
  Some((_runtime_getter, name) => Some(Rehp.ECustomRequire(name)));

let module_require = () => Some(name => Some(Rehp.ERequire(name)));

let runtime_module_var = () => Rehp.ERuntime;
