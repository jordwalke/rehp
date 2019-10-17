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
let f7 = g => {
  for (i in 2 to 3) {
    g(i);
  };
  let x =
    for (i in 2 to 3) {
      g(i);
    };
  x;
};
let f8 = g => {
  for (i in 2 to 3) {
    g(i);
  };
  let f = x =>
    for (i in 2 to 3) {
      for (j in 4 to 5) {
        g(x + i + j);
      };
    };
  for (i in 2 to 3) {
    g(i);
  };
  f;
};
let f9 = g => {
  for (i1 in 2 to 3) {
    for (i2 in 2 to 3) {
      let f = x =>
        for (i3 in 2 to 3) {
          for (i4 in 2 to 3) {
            g(x + i1 + i2 + i3 + i4);
          };
        };
      f(i2);
    };
  };
};
let f10 = g => {
  for (i1 in 2 to 3) {
    for (i2 in 2 to 3) {
      try(
        for (i3 in 2 to 3) {
          for (i4 in 2 to 3) {
            g(i1 + i2 + i3 + i4);
          };
          if (i3 > 2) {
            raise(Not_found);
          };
        }
      ) {
      | Not_found => ()
      };
    };
  };
};
let fx = (prefix, x) => print_endline("prefix " ++ string_of_int(x));
f1(fx("f1"));
f2(fx("f2"));
f3(fx("f3"));
f4(fx("f4"));
f5(fx("f5"));
f6(fx("f6"));
f7(fx("f7"));
f8(fx("f8"));
f9(fx("f9"));
f10(fx("f10"));

type t =
  | A
  | B
  | C;
/* no bugs */
let h1 = (g, t) => {
  for (i in 2 to 3) {
    switch (t) {
    | A => g(0)
    | B =>
      for (k in 4 to 5) {
        g(i + k);
      }
    | C => g(1)
    };
  };
};
/* no bugs */
let h2 = (g, t) => {
  for (i in 2 to 3) {
    for (j in 2 to 3) {
      switch (t) {
      | A => g(0)
      | B =>
        for (k in 4 to 5) {
          g(i + j + k);
        }
      | C => g(1)
      };
    };
  };
};
/* no bug */
let h3 = (g, t) => {
  for (i in 4 to 5) {
    switch (t) {
    | A => g(0)
    | B =>
      for (j in 4 to 5) {
        for (k in 2 to 3) {
          g(i + j + k);
        };
      }
    | C => g(1)
    };
  };
};
/* no bug */
let h4 = (g, t) => {
  switch (t) {
  | A => g(0)
  | B =>
    for (j in 4 to 5) {
      for (k in 2 to 3) {
        g(j + k);
      };
    }
  | C => g(1)
  };
};
/* no bug */
let h5 = (g, t) => {
  for (i in 2 to 3) {
    for (j in 2 to 3) {
      switch (t) {
      | A => g(0)
      | B =>
        for (k in 4 to 5) {
          for (l in 2 to 3) {
            g(i + j + k);
          };
        }
      | C => g(1)
      };
    };
  };
};

h1(fx("h1"), A);
h2(fx("h2"), A);
h3(fx("h3"), A);
h4(fx("h4"), A);
h5(fx("h5"), A);
