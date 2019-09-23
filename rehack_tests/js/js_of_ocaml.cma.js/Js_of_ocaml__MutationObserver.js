/**
 * Js_of_ocaml__MutationObserver
 * @providesModule Js_of_ocaml__MutationObserver
 */
"use strict";
var Array_ = require('Array_.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var Array = global_data["Array_"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];

function empty_mutation_observer_init(param) {return {};}

function a(x) {return call1(caml_get_public_method(x, -412262690, 261), x);}

var b = Js_of_ocaml_Js[50][1];
var mutationObserver = function(t0, param) {return t0.MutationObserver;}(b, a);

function is_supported(param) {
  return call1(Js_of_ocaml_Js[6][5], mutationObserver);
}

function observe(node, f, child_list, attributes, character_data, subtree, attribute_old_value, character_data_old_value, attribute_filter, param) {
  function opt_iter(x, f) {
    if (x) {var x__0 = x[1];return call1(f, x__0);}
    return 0;
  }
  var c = 0;
  var d = runtime["caml_js_wrap_callback"](f);
  var obs = function(t19, t18, param) {return new t19(t18);}(mutationObserver, d, c
  );
  var cfg = empty_mutation_observer_init(0);
  opt_iter(
    child_list,
    function(v) {
      function m(x) {
        return call1(caml_get_public_method(x, -749670374, 262), x);
      }
      return function(t17, t16, param) {t17.childList = t16;return 0;}(cfg, v, m
      );
    }
  );
  opt_iter(
    attributes,
    function(v) {
      function l(x) {
        return call1(caml_get_public_method(x, 393324759, 263), x);
      }
      return function(t15, t14, param) {t15.attributes = t14;return 0;}(cfg, v, l
      );
    }
  );
  opt_iter(
    character_data,
    function(v) {
      function k(x) {
        return call1(caml_get_public_method(x, 995092083, 264), x);
      }
      return function(t13, t12, param) {t13.characterData = t12;return 0;}(cfg, v, k
      );
    }
  );
  opt_iter(
    subtree,
    function(v) {
      function j(x) {
        return call1(caml_get_public_method(x, 808321758, 265), x);
      }
      return function(t11, t10, param) {t11.subtree = t10;return 0;}(cfg, v, j
      );
    }
  );
  opt_iter(
    attribute_old_value,
    function(v) {
      function i(x) {
        return call1(caml_get_public_method(x, 226312582, 266), x);
      }
      return function(t9, t8, param) {t9.attributeOldValue = t8;return 0;}(cfg, v, i
      );
    }
  );
  opt_iter(
    character_data_old_value,
    function(v) {
      function h(x) {
        return call1(caml_get_public_method(x, 994928349, 267), x);
      }
      return function(t7, t6, param) {t7.characterDataOldValue = t6;return 0;}(cfg, v, h
      );
    }
  );
  opt_iter(
    attribute_filter,
    function(l) {
      function f(x) {
        return call1(caml_get_public_method(x, -116981516, 268), x);
      }
      var g = runtime["caml_js_from_array"](call1(Array[12], l));
      return function(t5, t4, param) {t5.attributeFilter = t4;return 0;}(cfg, g, f
      );
    }
  );
  function e(x) {return call1(caml_get_public_method(x, 821429468, 269), x);}
  (function(t3, t1, t2, param) {return t3.observe(t1, t2);}(obs, node, cfg, e));
  return obs;
}

var Js_of_ocaml_MutationObserver = [
  0,
  empty_mutation_observer_init,
  mutationObserver,
  is_supported,
  observe
];

runtime["caml_register_global"](
  11,
  Js_of_ocaml_MutationObserver,
  "Js_of_ocaml__MutationObserver"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__MutationObserver;
