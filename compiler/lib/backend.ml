type t =
  | Php
  | Js

let to_string t = match t with
| Php -> "php"
| Js -> "js"

let from_string s =
  if s = "php" then
    Php
  else
    if s = "js" then Js
    else raise (Invalid_argument (s ^ " is not a valid backend"))

let extension = to_string
