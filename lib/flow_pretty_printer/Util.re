open Flow_parser;

let print = Pretty_printer.print(~source_maps=None, ~skip_endline=false);

let pretty_print = source => {
  let (ast, _errors) = Parser_flow.program(~fail=false, source);
  let layoutNode = Js_layout_generator.program_simple(ast);
  print(layoutNode) |> Source.contents
}
