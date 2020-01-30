/**
 * @flow strict
 * Js_of_ocaml__Jstable
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Jstable_keys = string("Jstable.keys");
var Pervasives = require("../stdlib.cma.js/Pervasives.js");
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var List = require("../stdlib.cma.js/List.js");

function a_(x) {return call1(caml_get_public_method(x, 944440446, 277), x);}

var b_ = Js_of_ocaml_Js[50][1];
var obj = function(t0, param) {return t0.Object;}(b_, a_);

function create(param) {
  var z_ = 0;
  return function(t1, param) {return new t1();}(obj, z_);
}

function add(t, k, v) {
  function w_(x) {
    return call1(caml_get_public_method(x, -942667500, 278), x);
  }
  var x_ = "_";
  var y_ = 0;
  t[function(t3, t2, param) {return t3.concat(t2);}(k, x_, w_)] = v;
  return y_;
}

function remove(t, k) {
  function t_(x) {
    return call1(caml_get_public_method(x, -942667500, 279), x);
  }
  var u_ = "_";
  var v_ = 0;
  delete t[function(t5, t4, param) {return t5.concat(t4);}(k, u_, t_)];
  return v_;
}

function find(t, k) {
  function r_(x) {
    return call1(caml_get_public_method(x, -942667500, 280), x);
  }
  var s_ = "_";
  return t[function(t7, t6, param) {return t7.concat(t6);}(k, s_, r_)];
}

function keys(t) {
  function c_(x) {
    return call1(caml_get_public_method(x, -955850252, 281), x);
  }
  function d_(x) {return call1(caml_get_public_method(x, 944440446, 282), x);}
  var e_ = Js_of_ocaml_Js[50][1];
  var f_ = function(t13, param) {return t13.Object;}(e_, d_);
  var key_array = function(t15, t14, param) {return t15.keys(t14);}(f_, t, c_);
  var res = [0,0];
  var g_ = 0;
  function h_(x) {return call1(caml_get_public_method(x, 520590566, 283), x);}
  var i_ = function(t12, param) {return t12.length;}(key_array, h_) + -1 | 0;
  if (! (i_ < 0)) {
    var i = g_;
    for (; ; ) {
      var j_ = function(param) {
        return call1(Pervasives[2], cst_Jstable_keys);
      };
      var k_ = call2(Js_of_ocaml_Js[16], key_array, i);
      var key = call2(Js_of_ocaml_Js[6][8], k_, j_);
      var l_ = res[1];
      var m_ = function(x) {
        return call1(caml_get_public_method(x, -488115631, 284), x);
      };
      var n_ = function(x) {
        return call1(caml_get_public_method(x, 520590566, 285), x);
      };
      var o_ = function(t8, param) {return t8.length;}(key, n_) + -1 | 0;
      var p_ = 0;
      res[1] =
        [
          0,
          function(t11, t9, t10, param) {return t11.substring(t9, t10);}(key, p_, o_, m_
          ),
          l_
        ];
      var q_ = i + 1 | 0;
      if (i_ !== i) {var i = q_;continue;}
      break;
    }
  }
  return call1(List[9], res[1]);
}

var Js_of_ocaml_Jstable = [0,create,add,remove,find,keys];

module.exports = Js_of_ocaml_Jstable;

/*::type Exports = {
  create: (param: any) => any,
  add: (t: any, k: any, v: any) => any,
  remove: (t: any, k: any) => any,
  find: (t: any, k: any) => any,
  keys: (t: any) => any,
}*/
/** @type {{
  create: (param: any) => any,
  add: (t: any, k: any, v: any) => any,
  remove: (t: any, k: any) => any,
  find: (t: any, k: any) => any,
  keys: (t: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.create = module.exports[1];
module.exports.add = module.exports[2];
module.exports.remove = module.exports[3];
module.exports.find = module.exports[4];
module.exports.keys = module.exports[5];

/* Hashing disabled */
