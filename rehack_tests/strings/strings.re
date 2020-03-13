let greeting = "hello world";
print_endline(greeting);
let greeting = "hello world with unicode: Ɋ";
print_endline(greeting);

let unicodeLength = String.length("Ɋ");
print_endline(
  "String.length(\"Ɋ\") should be two:" ++ string_of_int(unicodeLength),
);
print_endline(String.make(1, "Ɋ".[0]) ++ String.make(1, "Ɋ".[1]));

let _negativeOne = int_of_string("-1");
let _negativeOne = int_of_string("-6");
let one = int_of_string("1");
let six = int_of_string("6");

let index = String.index("as_df", '_');
print_endline("index from string with char: " ++ string_of_int(index));
let index =
  try (String.index("asdf", '_')) {
  | Not_found => (-1)
  };
print_endline("index from string without char: " ++ string_of_int(index));
print_int(index);

print_endline("Prints seven:");
print_int(one + six);
print_newline();

print_endline("Prints six:");
print_int(six);
print_newline();

print_endline("Prints six:");
print_string("6");
print_newline();

print_endline(StringHelper.helperVal);

print_endline("Reason is on 🔥");
print_endline(String.trim(" trimmed string "));

/* Floats still need some help for printing. */
/* The 'toFixed' is missing. */
/* print_endline("Prints 4.3 float:"); */
/* print_float(4.3); */
/* print_newline(); */

external caml_int_of_string: string => int = "caml_int_of_string";

/**
 * This should become an alias for the extern, when inlining is enabled.
 * TODO: Add test version of this that enabled inlining.
 */
let createIntFromString = ss => caml_int_of_string(ss);

let myFunction = cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope => {
  print_string(
    "The variable v_ should not conflict with any other variables in scope",
  );
  print_newline();
};


myFunction("tmp");

let i =
  try (createIntFromString("WHEREAMI")) {
  | Failure(_s) => 102
  };

if (i === 102) {
  print_string("Properly caught invalid string to int conversion.");
  print_newline();
} else {
  failwith("Did not properly catch Failure exception");
};

let i =
  try (createIntFromString("20")) {
  | Failure(_s) => 102
  };

if (i === 20) {
  print_string(
    "Properly caught conversion from string '20' to int " ++ string_of_int(i),
  );
  print_newline();
} else {
  failwith("Did not properly catch conversion from string to int");
};

let myRefCell = {contents: 0};
let myRefCellContents = myRefCell.contents;
let one = {contents: [1, 2, 3, 4]};
let two = {contents: [1, 2, 3, 4]};

print_string("ARE == T: " ++ string_of_bool(one == two));
print_newline();
print_string("ARE === F: " ++ string_of_bool(one === two));
print_newline();


let n = nan;

let anotherName = nan;

print_string ("Nans are === (should output true):" ++ string_of_bool(n === anotherName));
print_newline ();

print_string ("Nans are == (should output false):" ++ string_of_bool(n === anotherName));
print_newline ();
