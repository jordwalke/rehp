// @ts-check

"use strict";

var runtime = require("../../runtime/runtime.js");
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];

function is_even__0(counter, n) {
  if (0 === n) {
    return 1;
  }
  var b_ = n + -1 | 0;
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return is_odd__0(counter__0, b_);
  }
  return caml_trampoline_return(is_odd__0, [0, b_]);
}

function is_odd__0(counter, n) {
  if (0 === n) {
    return 0;
  }
  var a_ = n + -1 | 0;
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return is_even__0(counter__0, a_);
  }
  return caml_trampoline_return(is_even__0, [0, a_]);
}

function is_even(n) {
  return caml_trampoline(is_even__0(0, n));
}

function is_odd(n) {
  return caml_trampoline(is_odd__0(0, n));
}

var MutualRecursion_Mutual_recursion = [0, is_even, is_odd];

module.exports = MutualRecursion_Mutual_recursion;

type Exports = {
  is_even: (n: any) => any,
  is_odd: (n: any) => any,
};
/** @type {{
  is_even: (n: any) => any,
  is_odd: (n: any) => any,
}} */
module.exports = ((module.exports: any): Exports);
module.exports.is_even = module.exports[1];
module.exports.is_odd = module.exports[2];

/* Hashing disabled */
