type output = {
  relative_dir_from_project: string;
  relative_dir_from_output: string;
  normalized_compilation_unit: string;
  filename: string;
}
val set : output list -> unit
val get : unit -> output list
