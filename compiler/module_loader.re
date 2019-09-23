/*
 * Driver.module_loader_vars defines the set of free variables in _your_
 * injected code, which your template should make defined (making those
 * variables no longer free)
 */

/* From Reason Repo */
let is_prefixed = (prefix, str, i) => {
  let len = String.length(prefix);
  let j = ref(0);
  while (j^ < len
         && String.unsafe_get(prefix, j^) == String.unsafe_get(str, i + j^)) {
    incr(j);
  };
  j^ == len;
};

/* From Reason Repo */
let find_substring = (sub, str, i) => {
  let len = String.length(str) - String.length(sub);
  let found = ref(false)
  and i = ref(i);
  while (! found^ && i^ <= len) {
    if (is_prefixed(sub, str, i^)) {
      found := true;
    } else {
      incr(i);
    };
  };
  if (! found^) {
    raise(Not_found);
  };
  i^;
};

let rec code_indent_amount = (~soFar=0, s) => {
  let len = String.length(s);
  if (len - 1 - soFar >= 0 && s.[len - 1 - soFar] !== '\n') {
    code_indent_amount(~soFar=soFar + 1, s);
  } else {
    soFar;
  };
};

/* From Reason Repo */

/**
 * `replace_string old_str new_str str` replaces old_str to new_str in str.
 */

let replace_string = (old_str, new_str, str) =>
  switch (find_substring(old_str, str, 0)) {
  | exception Not_found => str
  | occurrence =>
    let buffer = Buffer.create(String.length(str) + 15);
    let rec loop = (i, j) => {
      Buffer.add_substring(buffer, str, i, j - i);
      Buffer.add_string(buffer, new_str);
      let i = j + String.length(old_str);
      switch (find_substring(old_str, str, i)) {
      | j => loop(i, j)
      | exception Not_found =>
        Buffer.add_substring(buffer, str, i, String.length(str) - i)
      };
    };

    loop(0, occurrence);
    Buffer.contents(buffer);
  };

let first_char_lower = s => {
  let first_char_string = String.make(1, s.[0]);
  String.lowercase_ascii(first_char_string);
};

let first_char_upper = s => {
  let first_char_string = String.make(1, s.[0]);
  String.uppercase_ascii(first_char_string);
};

let lower_leading = s => {
  let len = String.length(s);
  if (len === 0) {
    raise(Invalid_argument("Compilation unit name is not present "));
  } else if (len === 1) {
    String.lowercase_ascii(s);
  } else {
    first_char_lower(s) ++ String.sub(s, 1, len - 1);
  };
};

let upper_leading = s => {
  let len = String.length(s);
  if (len === 0) {
    raise(Invalid_argument("Compilation unit name is not present "));
  } else if (len === 1) {
    String.uppercase_ascii(s);
  } else {
    first_char_upper(s) ++ String.sub(s, 1, len - 1);
  };
};

let split_on = (on, str) =>
  switch (find_substring(on, str, 0)) {
  | exception Not_found => None
  | i =>
    let len_on = String.length(on);
    let strlen = String.length(str);
    Some((
      String.sub(str, 0, i),
      String.sub(str, i + len_on, strlen - (i + len_on)),
    ));
  };

let normalize_module_name = Js_of_ocaml_compiler.Parse_bytecode.normalize_module_name;

let substitute_and_split = (txt, hashesComment, compunit_name, ordered_compunit_deps) => {
  let compunit_name = normalize_module_name(compunit_name);
  let lower_compunit_name = lower_leading(compunit_name);
  let upper_compunit_name = upper_leading(compunit_name);
  let txt = replace_string("/*____hashes*/", hashesComment, txt);
  let txt =
    replace_string("____CompilationUnitName", upper_compunit_name, txt);
  let txt =
    replace_string("____compilationUnitName", lower_compunit_name, txt);

  /* Avoid a bunch of work if there isn't anything to do. */
  let substituted =
    switch (find_substring("orEachDependencyCompilationUnitName", txt, 0)) {
    | exception Not_found => txt
    | _ =>
      let lines = String.split_on_char('\n', txt);
      let lines =
        List.map(
          line =>
            switch (
              find_substring("orEachDependencyCompilationUnitName", line, 0)
            ) {
            | exception Not_found => line
            | _ =>
              let expanded_lines =
                List.map(
                  dep => {
                    let dep = normalize_module_name(dep);
                    let lower_dep_name = lower_leading(dep);
                    let upper_dep_name = upper_leading(dep);
                    let line =
                      replace_string(
                        "____ForEachDependencyCompilationUnitName",
                        upper_dep_name,
                        line,
                      );
                    replace_string(
                      "____forEachDependencyCompilationUnitName",
                      lower_dep_name,
                      line,
                    );
                  },
                  ordered_compunit_deps,
                );
              String.concat("\n", expanded_lines);
            },
          lines,
        );
      String.concat("\n", lines);
    };

  switch (split_on("/*____CompilationOutput*/", substituted)) {
  | None => (substituted, 0, "")
  | Some((l, r)) => (l, code_indent_amount(l), r)
  };
};

/* This is difficult to get injected correctly with the way source maps are
 * appended to the bottom. */
/* let substitute_compiled_content custom_header compiled_content = */
/*   match custom_header with */
/*   | None -> None */
/*   | Some header -> replace_string "/*{compiled_content}*/" compiled_content header */
