/**
 * Js_of_ocaml__Jstable
 * @providesModule Js_of_ocaml__Jstable
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Jstable_keys = string("Jstable.keys");
var Pervasives = global_data["Pervasives"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var List = global_data["List_"];

function a(x) {return call1(caml_get_public_method(x, 944440446, 270), x);}

var b = Js_of_ocaml_Js[50][1];
var obj = function(t0, param) {return t0.Object;}(b, a);

function create(param) {
  var z = 0;
  return function(t1, param) {return new t1();}(obj, z);
}

function add(t, k, v) {
  function w(x) {return call1(caml_get_public_method(x, -942667500, 271), x);}
  var x = "_";
  var y = 0;
  t[function(t3, t2, param) {return t3.concat(t2);}(k, x, w)] = v;
  return y;
}

function remove(t, k) {
  function t(x) {return call1(caml_get_public_method(x, -942667500, 272), x);}
  var u = "_";
  var v = 0;
  delete t[function(t5, t4, param) {return t5.concat(t4);}(k, u, t)];
  return v;
}

function find(t, k) {
  function r(x) {return call1(caml_get_public_method(x, -942667500, 273), x);}
  var s = "_";
  return t[function(t7, t6, param) {return t7.concat(t6);}(k, s, r)];
}

function keys(t) {
  function c(x) {return call1(caml_get_public_method(x, -955850252, 274), x);}
  function d(x) {return call1(caml_get_public_method(x, 944440446, 275), x);}
  var e = Js_of_ocaml_Js[50][1];
  var f = function(t13, param) {return t13.Object;}(e, d);
  var key_array = function(t15, t14, param) {return t15.keys(t14);}(f, t, c);
  var res = [0,0];
  var g = 0;
  function h(x) {return call1(caml_get_public_method(x, 520590566, 276), x);}
  var i = function(t12, param) {return t12.length;}(key_array, h) + -1 | 0;
  if (! (i < 0)) {
    var i__0 = g;
    for (; ; ) {
      var j = function(param) {return call1(Pervasives[2], cst_Jstable_keys);};
      var k = call2(Js_of_ocaml_Js[16], key_array, i__0);
      var key = call2(Js_of_ocaml_Js[6][8], k, j);
      var l = res[1];
      var m = function(x) {
        return call1(caml_get_public_method(x, -488115631, 277), x);
      };
      var n = function(x) {
        return call1(caml_get_public_method(x, 520590566, 278), x);
      };
      var o = function(t8, param) {return t8.length;}(key, n) + -1 | 0;
      var p = 0;
      res[1] =
        [
          0,
          function(t11, t9, t10, param) {return t11.substring(t9, t10);}(key, p, o, m
          ),
          l
        ];
      var q = i__0 + 1 | 0;
      if (i !== i__0) {var i__0 = q;continue;}
      break;
    }
  }
  return call1(List[9], res[1]);
}

var Js_of_ocaml_Jstable = [0,create,add,remove,find,keys];

runtime["caml_register_global"](
  16,
  Js_of_ocaml_Jstable,
  "Js_of_ocaml__Jstable"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Jstable;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
