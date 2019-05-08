let a = [|2|];
let x = a[0] = 42;
let f = x => print_endline("hi");
f(a[0] = 42);
f(x);
type t =
  | A
  | B;
let g =
  fun
  | A => a[0] = 42
  | B => a[0] = 43;
g(A);
let h =
  fun
  | 42 => A
  | _ => B;
let x = h(42);
let y =
  switch (x) {
  | A => a[0] = 42
  | B => a[0] = 43
  };
f(y);
let y =
  switch (x) {
  | A =>
    a[0] = 42;
    4;
  | B =>
    a[0] = 43;
    5;
  };
f(y);
let y =
  switch (x) {
  | A =>
    a[0] = 42;
    switch (x) {
    | A => 44
    | B => 45
    };
  | B =>
    a[0] = 43;
    5;
  };
f(y);
let g2 =
  fun
  | A => {
      print_endline("hi");
      a[0] = 3;
    }
  | B => {
      print_endline("hi");
      print_endline("hi");
      print_endline("hi");
      a[0] = 4;
      print_endline("hi");
      print_endline("hi");
    };
g2(A);
