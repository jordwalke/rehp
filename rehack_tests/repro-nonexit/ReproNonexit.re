let bench = lim => {
  let sum = ref(0);
  for (i in 0 to lim) {
    sum.contents = sum.contents + 1;
  };
  print_endline(string_of_int(sum.contents));
};

let res = bench(999);


