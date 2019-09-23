/**
 * Js_of_ocaml__Dom
 * @providesModule Js_of_ocaml__Dom
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var List_ = require('List_.js');
var Not_found = require('Not_found.js');
var Assert_failure = require('Assert_failure.js');
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
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Not_found = global_data["Not_found"];
var List = global_data["List_"];
var a = [0,string("lib/js_of_ocaml/dom.ml"),343,67];

function list_of_nodeList(nodeList) {
  function X(x) {return call1(caml_get_public_method(x, 520590566, 24), x);}
  var length = function(t2, param) {return t2.length;}(nodeList, X);
  function add_item(acc, i) {
    var acc__0 = acc;
    var i__0 = i;
    for (; ; ) {
      if (i__0 < length) {
        var Y = function(x) {
          return call1(caml_get_public_method(x, -977287917, 25), x);
        };
        var Z = function(t1, t0, param) {return t1.item(t0);}(nodeList, i__0, Y
        );
        var match = call1(Js_of_ocaml_Js[5][10], Z);
        if (match) {
          var e = match[1];
          var i__1 = i__0 + 1 | 0;
          var acc__1 = [0,e,acc__0];
          var acc__0 = acc__1;
          var i__0 = i__1;
          continue;
        }
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
      return call1(List[9], acc__0);
    }
  }
  return add_item(0, 0);
}

var disconnected = 1;
var preceding = 2;
var following = 4;
var contains = 8;
var contained_by = 16;
var implementation_specific = 32;

function has(t, mask) {return (t & mask) === mask ? 1 : 0;}

function add(x, y) {return x | y;}

var DocumentPosition = [
  0,
  disconnected,
  preceding,
  following,
  contains,
  contained_by,
  implementation_specific,
  has,
  add,
  add
];

function appendChild(p, n) {
  function W(x) {return call1(caml_get_public_method(x, 36716898, 26), x);}
  (function(t4, t3, param) {return t4.appendChild(t3);}(p, n, W));
  return 0;
}

function removeChild(p, n) {
  function V(x) {return call1(caml_get_public_method(x, -1007843656, 27), x);}
  (function(t6, t5, param) {return t6.removeChild(t5);}(p, n, V));
  return 0;
}

function replaceChild(p, n, o) {
  function U(x) {return call1(caml_get_public_method(x, 961057992, 28), x);}
  (function(t9, t7, t8, param) {return t9.replaceChild(t7, t8);}(p, n, o, U));
  return 0;
}

function insertBefore(p, n, o) {
  function T(x) {return call1(caml_get_public_method(x, 281001112, 29), x);}
  (function(t12, t10, t11, param) {return t12.insertBefore(t10, t11);}(p, n, o, T
   ));
  return 0;
}

function nodeType(e) {
  function S(x) {return call1(caml_get_public_method(x, -158969380, 30), x);}
  var match = function(t13, param) {return t13.nodeType;}(e, S);
  if (0 !== match) {
    var switcher = match + -1 | 0;
    switch (switcher) {
      case 0:
        return [0,e];
      case 1:
        return [1,e];
      case 2:
      case 3:
        return [2,e]
      }
  }
  return [3,e];
}

function cast(e, t) {
  function R(x) {return call1(caml_get_public_method(x, -158969380, 31), x);}
  return function(t14, param) {return t14.nodeType;}(e, R) === t ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function element(e) {return cast(e, 1);}

function text(e) {
  function P(x) {return call1(caml_get_public_method(x, -158969380, 32), x);}
  if (3 !== function(t15, param) {return t15.nodeType;}(e, P)) {
    var Q = function(x) {
      return call1(caml_get_public_method(x, -158969380, 33), x);
    };
    if (4 !== function(t16, param) {return t16.nodeType;}(e, Q)) {return Js_of_ocaml_Js[1];}
  }
  return call1(Js_of_ocaml_Js[2], e);
}

function attr(e) {return cast(e, 2);}

var no_handler = Js_of_ocaml_Js[1];

function window_event(param) {return  event ;}

function handler(f) {
  function L(e) {
    var M = call1(Js_of_ocaml_Js[2], e);
    if (call1(Js_of_ocaml_Js[5][5], M)) {
      var res = call1(f, e);
      if (1 - (res | 0)) {
        var N = function(x) {
          return call1(caml_get_public_method(x, -408605495, 34), x);
        };
        (function(t17, param) {return t17.preventDefault();}(e, N));
      }
      return res;
    }
    var e__0 = window_event(0);
    var res__0 = call1(f, e__0);
    if (1 - (res__0 | 0)) {
      var O = function(x) {
        return call1(caml_get_public_method(x, 1049971873, 35), x);
      };
      (function(t19, t18, param) {t19.returnValue = t18;return 0;}(e__0, res__0, O
       ));
    }
    return res__0;
  }
  return call1(Js_of_ocaml_Js[2], L);
}

function full_handler(f) {
  var H = runtime["caml_js_wrap_meth_callback_unsafe"](
    function(this__0, e) {
      var I = call1(Js_of_ocaml_Js[2], e);
      if (call1(Js_of_ocaml_Js[5][5], I)) {
        var res = call2(f, this__0, e);
        if (1 - (res | 0)) {
          var J = function(x) {
            return call1(caml_get_public_method(x, -408605495, 36), x);
          };
          (function(t20, param) {return t20.preventDefault();}(e, J));
        }
        return res;
      }
      var e__0 = window_event(0);
      var res__0 = call2(f, this__0, e__0);
      if (1 - (res__0 | 0)) {
        var K = function(x) {
          return call1(caml_get_public_method(x, 1049971873, 37), x);
        };
        (function(t22, t21, param) {t22.returnValue = t21;return 0;}(e__0, res__0, K
         ));
      }
      return res__0;
    }
  );
  return call1(Js_of_ocaml_Js[2], H);
}

function invoke_handler(f, this__0, event) {return f.call(this__0, event);}

function eventTarget(e) {
  function v(param) {
    function E(param) {
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
    function F(x) {
      return call1(caml_get_public_method(x, -1021537224, 38), x);
    }
    var G = function(t27, param) {return t27.srcElement;}(e, F);
    return call2(Js_of_ocaml_Js[5][8], G, E);
  }
  function w(x) {return call1(caml_get_public_method(x, 116192081, 39), x);}
  var x = function(t26, param) {return t26.target;}(e, w);
  var target = call2(Js_of_ocaml_Js[5][8], x, v);
  function y(x) {return call1(caml_get_public_method(x, -420195839, 40), x);}
  var z = Js_of_ocaml_Js[50][1];
  if (target instanceof function(t25, param) {return t25.Node;}(z, y)) {
    var A = function(x) {
      return call1(caml_get_public_method(x, -158969380, 41), x);
    };
    if (3 === function(t24, param) {return t24.nodeType;}(target, A)) {
      var B = function(param) {
        throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,a]);
      };
      var C = function(x) {
        return call1(caml_get_public_method(x, -400811956, 42), x);
      };
      var D = function(t23, param) {return t23.parentNode;}(target, C);
      return call2(Js_of_ocaml_Js[5][8], D, B);
    }
    return target;
  }
  return target;
}

function make(s) {return s.toString();}

var Event = [0,make];

function addEventListener(e, typ, h, capt) {
  var g = Js_of_ocaml_Js[3];
  function h(x) {return call1(caml_get_public_method(x, -245101619, 43), x);}
  if (function(t44, param) {return t44.addEventListener;}(e, h) === g) {
    var i = function(x) {
      return call1(caml_get_public_method(x, -942667500, 44), x);
    };
    var j = "on";
    var ev = function(t43, t42, param) {return t43.concat(t42);}(j, typ, i);
    var callback = function(e) {
      var o = [0,h,e,[0]];
      function p(u, t, s) {return runtime["caml_js_call"](u, t, s);}
      return function(q, r) {return p(o, q, r);};
    };
    var k = function(x) {
      return call1(caml_get_public_method(x, -362647019, 45), x);
    };
    (function(t41, t39, t40, param) {return t41.attachEvent(t39, t40);}(e, ev, callback, k
     ));
    return function(param) {
      function n(x) {
        return call1(caml_get_public_method(x, 681618887, 46), x);
      }
      return function(t38, t36, t37, param) {
        return t38.detachEvent(t36, t37);
      }(e, ev, callback, n
      );
    };
  }
  function l(x) {return call1(caml_get_public_method(x, -245101619, 47), x);}
  (function(t35, t32, t33, t34, param) {
     return t35.addEventListener(t32, t33, t34);
   }(e, typ, h, capt, l
   ));
  return function(param) {
    function m(x) {
      return call1(caml_get_public_method(x, -713717814, 48), x);
    }
    return function(t31, t28, t29, t30, param) {
      return t31.removeEventListener(t28, t29, t30);
    }(e, typ, h, capt, m
    );
  };
}

function removeEventListener(id) {return call1(id, 0);}

function preventDefault(ev) {
  function b(x) {return call1(caml_get_public_method(x, -408605495, 49), x);}
  var c = function(t48, param) {return t48.preventDefault;}(ev, b);
  if (call1(Js_of_ocaml_Js[6][5], c)) {
    var d = function(x) {
      return call1(caml_get_public_method(x, -408605495, 50), x);
    };
    return function(t47, param) {return t47.preventDefault();}(ev, d);
  }
  function e(x) {return call1(caml_get_public_method(x, 1049971873, 51), x);}
  var f = ! ! 0;
  return function(t46, t45, param) {t46.returnValue = t45;return 0;}(ev, f, e);
}

var Js_of_ocaml_Dom = [
  0,
  DocumentPosition,
  insertBefore,
  replaceChild,
  removeChild,
  appendChild,
  list_of_nodeList,
  nodeType,
  [0,element,text,attr],
  no_handler,
  handler,
  full_handler,
  invoke_handler,
  eventTarget,
  Event,
  addEventListener,
  removeEventListener,
  preventDefault
];

runtime["caml_register_global"](35, Js_of_ocaml_Dom, "Js_of_ocaml__Dom");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Dom;
