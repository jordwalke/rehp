type t =
  | Php
  | Js
  
val to_string : t -> string

val from_string : string -> t

val extension : t -> string
