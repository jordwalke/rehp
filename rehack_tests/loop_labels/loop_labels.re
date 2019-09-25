let f1 = g => {
  for (i in 2 to 3) {
    g(i);
  };
};
let f2 = g => {
  for (i in 2 to 3) {
    for (j in 4 to 5) {
      g(i + j);
    };
  };
};
let f3 = g => {
  for (i in 2 to 3) {
    for (j in 4 to 5) {
      for (k in 4 to 5) {
        g(i + j + k);
      };
    };
    for (l in 6 to 7) {
      g(i + l);
    };
  };
};
let f4 = g => {
  for (i in 2 to 3) {
    for (k in 4 to 5) {
      g(i + k);
    };
    for (j in 4 to 5) {
      for (k in 4 to 5) {
        for (l in 4 to 5) {
          g(i + j + k + l);
        };
      };
      for (k in 4 to 5) {
        g(i + j + k);
      };
    };
    for (l in 6 to 7) {
      for (n in 4 to 5) {
        g(i + l + n);
      };
      for (m in 4 to 5) {
        for (n in 4 to 5) {
          g(i + l + m + n);
        };
      };
    };
    for (k in 4 to 5) {
      g(i + k);
    };
  };
  for (k in 4 to 5) {
    g(k);
  };
};
let f5 = g => {
  for (i in 2 to 3) {
    g(i);
  };
  for (i in 2 to 3) {
    g(i);
  };
};
let f6 = g => {
  for (i in 2 to 3) {
    g(i);
  };
  for (i in 2 to 3) {
    g(i);
  };
  for (i in 2 to 3) {
    g(i);
  };
  for (i in 2 to 3) {
    g(i);
  };
};
let fx = (prefix, x) => print_endline("prefix " ++ string_of_int(x));
f1(fx("f1"));
f2(fx("f2"));
f3(fx("f3"));
f4(fx("f4"));
f5(fx("f5"));
f6(fx("f6"));
