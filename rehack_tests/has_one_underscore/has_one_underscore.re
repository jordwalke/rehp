let hasOneUnderscore = id_or_token => {
  let id_or_token = Js_of_ocaml.Js.to_string(id_or_token);
  let index =
    try (String.index(id_or_token, '_')) {
    | Not_found => (-1)
    };
  index > (-1) && !String.contains_from(id_or_token, index + 1, '_');
};
