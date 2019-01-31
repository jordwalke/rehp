
- The right_shift/left_shift and unsigned_left_shift all currently (supposedly)
  work on 32 bits of the integer operands. That is the correct behavior. Rehp
  emits bitwise operators that should work on 32 bits of integers discarding
  the rest. That has nothing to do with JavaScript and more to do with
  guaranteeing correct/consistent behavior across all backends.  JavaScript's
  bitwise operators (even on a 64 bit machine) happen to operate on 32 bits of
  integers. Php's bitwise operators need to do the same.
  
TODO:

- Add test cases for all of the bit shifting operations ensuring they operate
  as Rehp expects them to.

- Fix and test BOr/BAnd operation in PHP backend which should also operate on
  32 bits. Add test cases (in PHP as well as e2e).
