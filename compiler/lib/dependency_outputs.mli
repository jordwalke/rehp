type output = {
  relative_dir_from_project: string;
  relative_dir_from_output: string;
  filename: string;
}
val set : output list -> unit
val get : unit -> output list
