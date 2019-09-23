/**
 * Char
 * @providesModule Char
 */
"use strict";
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst = string("\\\\");
var cst__0 = string("\\'");
var cst_b = string("\\b");
var cst_t = string("\\t");
var cst_n = string("\\n");
var cst_r = string("\\r");
var cst_Char_chr = string("Char.chr");
var Pervasives = global_data["Pervasives"];

function chr(n) {
  if (0 <= n) {if (! (255 < n)) {return n;}}
  return call1(Pervasives[1], cst_Char_chr);
}

function escaped(c) {
  if (40 <= c) {
    if (92 === c) {return cst;}
    var switch__0 = 127 <= c ? 0 : 1;
  }
  else if (32 <= c) {
    if (39 <= c) {return cst__0;}
    var switch__0 = 1;
  }
  else if (14 <= c) var switch__0 = 0;
  else switch (c) {
    case 8:
      return cst_b;
    case 9:
      return cst_t;
    case 10:
      return cst_n;
    case 13:
      return cst_r;
    default:
      var switch__0 = 0
    }
  if (switch__0) {
    var s__0 = caml_create_bytes(1);
    caml_bytes_unsafe_set(s__0, 0, c);
    return s__0;
  }
  var s = caml_create_bytes(4);
  caml_bytes_unsafe_set(s, 0, 92);
  caml_bytes_unsafe_set(s, 1, 48 + (c / 100 | 0) | 0);
  caml_bytes_unsafe_set(s, 2, 48 + ((c / 10 | 0) % 10 | 0) | 0);
  caml_bytes_unsafe_set(s, 3, 48 + (c % 10 | 0) | 0);
  return s;
}

function lowercase(c) {
  var switch__0 = 65 <= c ? 90 < c ? 0 : 1 : 0;
  if (! switch__0) {
    var switch__1 = 192 <= c ? 214 < c ? 0 : 1 : 0;
    if (! switch__1) {
      var switch__2 = 216 <= c ? 222 < c ? 1 : 0 : 1;
      if (switch__2) {return c;}
    }
  }
  return c + 32 | 0;
}

function uppercase(c) {
  var switch__0 = 97 <= c ? 122 < c ? 0 : 1 : 0;
  if (! switch__0) {
    var switch__1 = 224 <= c ? 246 < c ? 0 : 1 : 0;
    if (! switch__1) {
      var switch__2 = 248 <= c ? 254 < c ? 1 : 0 : 1;
      if (switch__2) {return c;}
    }
  }
  return c + -32 | 0;
}

function lowercase_ascii(c) {
  if (65 <= c) {if (! (90 < c)) {return c + 32 | 0;}}
  return c;
}

function uppercase_ascii(c) {
  if (97 <= c) {if (! (122 < c)) {return c + -32 | 0;}}
  return c;
}

function compare(c1, c2) {return c1 - c2 | 0;}

function equal(c1, c2) {return 0 === compare(c1, c2) ? 1 : 0;}

var Char = [
  0,
  chr,
  escaped,
  lowercase,
  uppercase,
  lowercase_ascii,
  uppercase_ascii,
  compare,
  equal
];

runtime["caml_register_global"](8, Char, "Char");


module.exports = global.jsoo_runtime.caml_get_global_data().Char;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
