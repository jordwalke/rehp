type t =
  | Js

let to_string t = match t with
| Js -> "js"

let from_string s =
  if s = "js" then Js
  else raise (Invalid_argument (s ^ " is not a valid backend"))
  
let extension Js = "js"
