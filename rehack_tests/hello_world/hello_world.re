let a = [|2|];
let x = a[0] = 42;
let f = x => print_endline("hi");
f(a[0] = 42);
f(x);
