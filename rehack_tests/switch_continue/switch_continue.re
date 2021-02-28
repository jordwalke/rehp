let rec h0 = i => i > 0 ? h0(i - 1) : 42;
print_endline(string_of_int(h0(4)));

let rec g0 = i =>
  if (i == 0) {
    10;
  } else if (i > 10) {
    g0(i - 5);
  } else {
    g0(i - 1);
  };
let rec g1 = i => {
  let x =
    if (i == 0) {
      10;
    } else if (i > 10) {
      g1(i - 5);
    } else {
      g1(i - 1);
    };
  x + 1;
};

print_endline(string_of_int(g0(3)));
print_endline(string_of_int(g1(2)));

type t =
  | A
  | B
  | C;
let f0 = t => {
  switch (t) {
  | A => 1
  | B => 2
  | C => 3
  };
};
let rec f1 = t => {
  switch (t) {
  | A => f1(B)
  | B => f1(C)
  | C => 3
  };
};
let rec f2 = t => {
  let x =
    switch (t) {
    | A => f2(B)
    | B => f2(C)
    | C => 3
    };
  x + 1;
};
let rec f3 = t => {
  switch (t) {
  | A => f3(B)
  | B =>
    switch (t) {
    | A => f3(B)
    | B => f3(C)
    | C => 3
    }
  | C => 3
  };
};

print_endline(string_of_int(f0(A)));
print_endline(string_of_int(f1(A)));
print_endline(string_of_int(f2(A)));
print_endline(string_of_int(f3(A)));

let rec h0 = c => {
  switch (c) {
  | '_' => h0(c)
  | '{' => h0(c)
  | '(' => h0(c)
  | '}' | _ => raise(Not_found)
  };
};

/* bug: extra continue_label on second switch */
let rec h1 = (t) => {
  if (t == A) {
    switch (t) {
    | A => h1(t)
    | B => 2
    | C => 3
    };
  } else {
    switch (t) {
    | A => 1
    | B => 2
    | C => 3
    };
  };
};

print_endline(string_of_int(h0('h')));
print_endline(string_of_int(h1(A)));
