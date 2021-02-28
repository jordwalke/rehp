open Flow_parser;

let print = Pretty_printer.print(~source_maps=None, ~skip_endline=false);

let disable_types = (parse_options) => {...parse_options, Parser_env.types: false};

let parse_options = Some(disable_types(Parser_env.default_parse_options));

let pretty_print = source => {
  let (ast, _errors) = Parser_flow.program(~fail=false, ~parse_options, source);
  let layoutNode = Js_layout_generator.program_simple(ast);
  print(layoutNode) |> Source.contents
}
