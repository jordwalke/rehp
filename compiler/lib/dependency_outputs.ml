
type output = {
  relative_dir_from_project: string;
  relative_dir_from_output: string;
  filename: string;
}
let dependency_outputs: output list ref = ref []

let set outputs = dependency_outputs.contents <- outputs

let get () = dependency_outputs.contents
