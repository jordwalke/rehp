type t =
  | Php
  | Js
  | Pp_rehp

let to_string t =
  match t with
  | Php -> "php"
  | Js -> "js"
  | Pp_rehp -> "pp_rehp"

let from_string = function
  | "php" -> Php
  | "js" -> Js
  | "pp_rehp" -> Pp_rehp
  | _ as s -> raise (Invalid_argument (s ^ " is not a valid backend"))

let extension = to_string
