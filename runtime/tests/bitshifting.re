type operator =
  | Left
  | Right
  | RightLogical;

let testCases: list((int32, operator, int, int32)) =
  List.map(
    ((value, op, shiftBy, expected)) => (
      Int32.of_int(value),
      op,
      shiftBy,
      Int32.of_int(expected),
    ),
    [
      /* left positive */
      (1, Left, 1, 2),
      (2, Left, 1, 4),
      (1073741824, Left, 1, (-2147483648)),
      /* right positive */
      (1, Right, 1, 0),
      (2, Right, 1, 1),
      (1073741824, Right, 1, 536870912),
      /* left negative */
      ((-1), Left, 1, (-2)),
      ((-2), Left, 1, (-4)),
      ((-1073741824), Left, 1, (-2147483648)),
      ((-2147483648), Left, 1, 0),
      /* right negative */
      ((-1), Right, 1, (-1)),
      ((-2), Right, 1, (-1)),
      ((-3), Right, 1, (-2)),
      ((-2147483648), Right, 1, (-1073741824)),
      /* right logical negative */
      ((-1), RightLogical, 1, 2147483647), /* 2**31 - 1 */
      ((-2), RightLogical, 1, 2147483647), /* 2**31 - 1 */
      ((-3), RightLogical, 1, 2147483646), /* 2**31 - 2 */
      ((-2147483648), RightLogical, 1, 1073741824),
    ],
  );

let toStr = (i: int32) => string_of_int(Int32.to_int(i));

let f = () => {
  List.iteri(
    (index, (value, op, shiftBy, expected): (int32, operator, int, int32)) => {
      let result =
        switch (op) {
        | Left => Int32.shift_left(value, shiftBy)
        | Right => Int32.shift_right(value, shiftBy)
        | RightLogical => Int32.shift_right_logical(value, shiftBy)
        };
      if (expected != result) {
        print_endline(
          "case "
          ++ string_of_int(index)
          ++ ") "
          ++ "expected "
          ++ toStr(expected)
          ++ " but received "
          ++ toStr(result)
          ++ " for "
          ++ toStr(value)
          ++ (
            switch (op) {
            | Left => " << "
            | Right => " >> "
            | RightLogical => " >>> "
            }
          )
          ++ string_of_int(shiftBy),
        );
      };
      assert(expected == result);
    },
    testCases,
  );

  print_endline("all bitshifting tests passed");
};
