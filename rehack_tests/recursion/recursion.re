let rec nobug1 = x => {
  1 + nobug1(x);
};
nobug1(42);

let nobug2 = x => {
  let rec sub = x => 1 + sub(x);
  sub(x);
};

let bug = x =>
  if (x === 0) {
    let rec sub = x => 1 + sub(x);
    sub(x);
  } else {
    0;
  };

module M: {let bug: int => int;} = {
  let bug_helper = x => {
    let rec sub = x => 1 + sub(x);
    sub(x);
  };
  let bug = x =>
    if (x === 0) {
      bug_helper(x);
    } else {
      0;
    };
};

let bug2 = () => {
  let k = ref(0);
  for (x in 0 to 10) {
    let rec sub = x => 1 + sub(x);
    k := k^ + sub(x);
  };
  k;
};

let bug3 = () => {
  let k = ref(0);
  for (x in 0 to 10) {
    k :=
      k^
      + (
        if (x === 0) {
          let rec sub = x => 1 + sub(x);
          sub(x);
        } else {
          0;
        }
      );
  };
  k;
};

let mutual_recursion1 = () => {
  let rec f = () => f()
  and g = () => f();
  (f, g);
};

let mutual_recursion2 = () => {
  let rec f2 = () => {
    let f3 = () => {
      f1();
    };
    f3;
  }
  and f1 = () => f1();
  (f1, f2);
};
