type t =
  | Php
  | Js
  | Python
  
val to_string : t -> string

val from_string : string -> t

val extension : t -> string
