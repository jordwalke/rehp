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
var caml_new_string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Jstable_keys = caml_new_string("Jstable.keys");
var Pervasives = global_data["Pervasives"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var List = global_data["List_"];

function pg(x) {return call1(caml_get_public_method(x, 944440446, 249), x);}

var ph = Js_of_ocaml_Js[50][1];
var obj = function(t0, param) {return t0.Object;}(ph, pg);

function create(param) {
  var pF = 0;
  return function(t1, param) {return new t1();}(obj, pF);
}

function add(t, k, v) {
  function pC(x) {
    return call1(caml_get_public_method(x, -942667500, 250), x);
  }
  var pD = "_";
  var pE = 0;
  t[function(t3, t2, param) {return t3.concat(t2);}(k, pD, pC)] = v;
  return pE;
}

function remove(t, k) {
  function pz(x) {
    return call1(caml_get_public_method(x, -942667500, 251), x);
  }
  var pA = "_";
  var pB = 0;
  delete t[function(t5, t4, param) {return t5.concat(t4);}(k, pA, pz)];
  return pB;
}

function find(t, k) {
  function px(x) {
    return call1(caml_get_public_method(x, -942667500, 252), x);
  }
  var py = "_";
  return t[function(t7, t6, param) {return t7.concat(t6);}(k, py, px)];
}

function keys(t) {
  function pi(x) {
    return call1(caml_get_public_method(x, -955850252, 253), x);
  }
  function pj(x) {return call1(caml_get_public_method(x, 944440446, 254), x);}
  var pk = Js_of_ocaml_Js[50][1];
  var pl = function(t13, param) {return t13.Object;}(pk, pj);
  var key_array = function(t15, t14, param) {return t15.keys(t14);}(pl, t, pi);
  var res = [0,0];
  var pm = 0;
  function pn(x) {return call1(caml_get_public_method(x, 520590566, 255), x);}
  var po = function(t12, param) {return t12.length;}(key_array, pn) + -1 | 0;
  if (! (po < 0)) {
    var i = pm;
    for (; ; ) {
      var pp = function(param) {
        return call1(Pervasives[2], cst_Jstable_keys);
      };
      var pq = call2(Js_of_ocaml_Js[16], key_array, i);
      var key = call2(Js_of_ocaml_Js[6][8], pq, pp);
      var pr = res[1];
      var ps = function(x) {
        return call1(caml_get_public_method(x, -488115631, 256), x);
      };
      var pt = function(x) {
        return call1(caml_get_public_method(x, 520590566, 257), x);
      };
      var pu = function(t8, param) {return t8.length;}(key, pt) + -1 | 0;
      var pv = 0;
      res[1] =
        [
          0,
          function(t11, t9, t10, param) {return t11.substring(t9, t10);}(key, pv, pu, ps
          ),
          pr
        ];
      var pw = i + 1 | 0;
      if (po !== i) {var i = pw;continue;}
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