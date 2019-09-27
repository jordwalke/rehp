type t =
  | Php
  | Js
  | Pp_rehp

val to_string : t -> string

val from_string : string -> t

val extension : t -> string
