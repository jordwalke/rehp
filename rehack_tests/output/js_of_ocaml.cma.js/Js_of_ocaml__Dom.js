/**
 * @flow strict
 * Js_of_ocaml__Dom
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Not_found = require("../runtime/Not_found.js");
var List = require("../stdlib.cma.js/List.js");
var a_ = [0,string("lib/js_of_ocaml/dom.ml"),343,67];

function list_of_nodeList(nodeList) {
  function X_(x) {return call1(caml_get_public_method(x, 520590566, 24), x);}
  var length = function(t2, param) {return t2.length;}(nodeList, X_);
  function add_item(acc, i) {
    var acc__0 = acc;
    var i__0 = i;
    for (; ; ) {
      if (i__0 < length) {
        var Y_ = function(x) {
          return call1(caml_get_public_method(x, -977287917, 25), x);
        };
        var Z_ = function(t1, t0, param) {return t1.item(t0);}(nodeList, i__0, Y_
        );
        var match = call1(Js_of_ocaml_Js[5][10], Z_);
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
  function W_(x) {return call1(caml_get_public_method(x, 36716898, 26), x);}
  (function(t4, t3, param) {return t4.appendChild(t3);}(p, n, W_));
  return 0;
}

function removeChild(p, n) {
  function V_(x) {
    return call1(caml_get_public_method(x, -1007843656, 27), x);
  }
  (function(t6, t5, param) {return t6.removeChild(t5);}(p, n, V_));
  return 0;
}

function replaceChild(p, n, o) {
  function U_(x) {return call1(caml_get_public_method(x, 961057992, 28), x);}
  (function(t9, t7, t8, param) {return t9.replaceChild(t7, t8);}(p, n, o, U_));
  return 0;
}

function insertBefore(p, n, o) {
  function T_(x) {return call1(caml_get_public_method(x, 281001112, 29), x);}
  (function(t12, t10, t11, param) {return t12.insertBefore(t10, t11);}(p, n, o, T_
   ));
  return 0;
}

function nodeType(e) {
  function S_(x) {return call1(caml_get_public_method(x, -158969380, 30), x);}
  var match = function(t13, param) {return t13.nodeType;}(e, S_);
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
  function R_(x) {return call1(caml_get_public_method(x, -158969380, 31), x);}
  return function(t14, param) {return t14.nodeType;}(e, R_) === t ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function element(e) {return cast(e, 1);}

function text(e) {
  function P_(x) {return call1(caml_get_public_method(x, -158969380, 32), x);}
  if (3 !== function(t15, param) {return t15.nodeType;}(e, P_)) {
    var Q_ = function(x) {
      return call1(caml_get_public_method(x, -158969380, 33), x);
    };
    if (4 !== function(t16, param) {return t16.nodeType;}(e, Q_)) {return Js_of_ocaml_Js[1];}
  }
  return call1(Js_of_ocaml_Js[2], e);
}

function attr(e) {return cast(e, 2);}

var no_handler = Js_of_ocaml_Js[1];

function window_event(param) {return (event);}

function handler(f) {
  function L_(e) {
    var M_ = call1(Js_of_ocaml_Js[2], e);
    if (call1(Js_of_ocaml_Js[5][5], M_)) {
      var res = call1(f, e);
      if (1 - (res | 0)) {
        var N_ = function(x) {
          return call1(caml_get_public_method(x, -408605495, 34), x);
        };
        (function(t17, param) {return t17.preventDefault();}(e, N_));
      }
      return res;
    }
    var e__0 = window_event(0);
    var res__0 = call1(f, e__0);
    if (1 - (res__0 | 0)) {
      var O_ = function(x) {
        return call1(caml_get_public_method(x, 1049971873, 35), x);
      };
      (function(t19, t18, param) {t19.returnValue = t18;return 0;}(e__0, res__0, O_
       ));
    }
    return res__0;
  }
  return call1(Js_of_ocaml_Js[2], L_);
}

function full_handler(f) {
  var H_ = runtime["caml_js_wrap_meth_callback_unsafe"](
    function(this__0, e) {
      var I_ = call1(Js_of_ocaml_Js[2], e);
      if (call1(Js_of_ocaml_Js[5][5], I_)) {
        var res = call2(f, this__0, e);
        if (1 - (res | 0)) {
          var J_ = function(x) {
            return call1(caml_get_public_method(x, -408605495, 36), x);
          };
          (function(t20, param) {return t20.preventDefault();}(e, J_));
        }
        return res;
      }
      var e__0 = window_event(0);
      var res__0 = call2(f, this__0, e__0);
      if (1 - (res__0 | 0)) {
        var K_ = function(x) {
          return call1(caml_get_public_method(x, 1049971873, 37), x);
        };
        (function(t22, t21, param) {t22.returnValue = t21;return 0;}(e__0, res__0, K_
         ));
      }
      return res__0;
    }
  );
  return call1(Js_of_ocaml_Js[2], H_);
}

function invoke_handler(f, this__0, event) {return f.call(this__0, event);}

function eventTarget(e) {
  function v_(param) {
    function E_(param) {throw caml_wrap_thrown_exception(Not_found);}
    function F_(x) {
      return call1(caml_get_public_method(x, -1021537224, 38), x);
    }
    var G_ = function(t27, param) {return t27.srcElement;}(e, F_);
    return call2(Js_of_ocaml_Js[5][8], G_, E_);
  }
  function w_(x) {return call1(caml_get_public_method(x, 116192081, 39), x);}
  var x_ = function(t26, param) {return t26.target;}(e, w_);
  var target = call2(Js_of_ocaml_Js[5][8], x_, v_);
  function y_(x) {return call1(caml_get_public_method(x, -420195839, 40), x);}
  var z_ = Js_of_ocaml_Js[50][1];
  if (target instanceof function(t25, param) {return t25.Node;}(z_, y_)) {
    var A_ = function(x) {
      return call1(caml_get_public_method(x, -158969380, 41), x);
    };
    if (3 === function(t24, param) {return t24.nodeType;}(target, A_)) {
      var B_ = function(param) {
        throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
      };
      var C_ = function(x) {
        return call1(caml_get_public_method(x, -400811956, 42), x);
      };
      var D_ = function(t23, param) {return t23.parentNode;}(target, C_);
      return call2(Js_of_ocaml_Js[5][8], D_, B_);
    }
    return target;
  }
  return target;
}

function make(s) {return s.toString();}

var Event = [0,make];

function addEventListener(e, typ, h, capt) {
  var g_ = Js_of_ocaml_Js[3];
  function h_(x) {return call1(caml_get_public_method(x, -245101619, 43), x);}
  if (function(t44, param) {return t44.addEventListener;}(e, h_) === g_) {
    var i_ = function(x) {
      return call1(caml_get_public_method(x, -942667500, 44), x);
    };
    var j_ = "on";
    var ev = function(t43, t42, param) {return t43.concat(t42);}(j_, typ, i_);
    var callback = function(e) {
      var o_ = [0,h,e,[0]];
      function p_(u_, t_, s_) {return runtime["caml_js_call"](u_, t_, s_);}
      return function(q_, r_) {return p_(o_, q_, r_);};
    };
    var k_ = function(x) {
      return call1(caml_get_public_method(x, -362647019, 45), x);
    };
    (function(t41, t39, t40, param) {return t41.attachEvent(t39, t40);}(e, ev, callback, k_
     ));
    return function(param) {
      function n_(x) {
        return call1(caml_get_public_method(x, 681618887, 46), x);
      }
      return function(t38, t36, t37, param) {
        return t38.detachEvent(t36, t37);
      }(e, ev, callback, n_
      );
    };
  }
  function l_(x) {return call1(caml_get_public_method(x, -245101619, 47), x);}
  (function(t35, t32, t33, t34, param) {
     return t35.addEventListener(t32, t33, t34);
   }(e, typ, h, capt, l_
   ));
  return function(param) {
    function m_(x) {
      return call1(caml_get_public_method(x, -713717814, 48), x);
    }
    return function(t31, t28, t29, t30, param) {
      return t31.removeEventListener(t28, t29, t30);
    }(e, typ, h, capt, m_
    );
  };
}

function removeEventListener(id) {return call1(id, 0);}

function preventDefault(ev) {
  function b_(x) {return call1(caml_get_public_method(x, -408605495, 49), x);}
  var c_ = function(t48, param) {return t48.preventDefault;}(ev, b_);
  if (call1(Js_of_ocaml_Js[6][5], c_)) {
    var d_ = function(x) {
      return call1(caml_get_public_method(x, -408605495, 50), x);
    };
    return function(t47, param) {return t47.preventDefault();}(ev, d_);
  }
  function e_(x) {return call1(caml_get_public_method(x, 1049971873, 51), x);}
  var f_ = ! ! 0;
  return function(t46, t45, param) {t46.returnValue = t45;return 0;}(ev, f_, e_
  );
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

module.exports = Js_of_ocaml_Dom;

/*::type Exports = {
  DocumentPosition: any,
  insertBefore: (p: any, n: any, o: any) => any,
  replaceChild: (p: any, n: any, o: any) => any,
  removeChild: (p: any, n: any) => any,
  appendChild: (p: any, n: any) => any,
  list_of_nodeList: (nodeList: any) => any,
  nodeType: (e: any) => any,
  no_handler: any,
  handler: (f: any) => any,
  full_handler: (f: any) => any,
  invoke_handler: (f: any, _this_: any, event: any) => any,
  eventTarget: (e: any) => any,
  Event: any,
  addEventListener: (e: any, typ: any, h: any, capt: any) => any,
  removeEventListener: (id: any) => any,
  preventDefault: (ev: any) => any,
}*/
/** @type {{
  DocumentPosition: any,
  insertBefore: (p: any, n: any, o: any) => any,
  replaceChild: (p: any, n: any, o: any) => any,
  removeChild: (p: any, n: any) => any,
  appendChild: (p: any, n: any) => any,
  list_of_nodeList: (nodeList: any) => any,
  nodeType: (e: any) => any,
  no_handler: any,
  handler: (f: any) => any,
  full_handler: (f: any) => any,
  invoke_handler: (f: any, _this_: any, event: any) => any,
  eventTarget: (e: any) => any,
  Event: any,
  addEventListener: (e: any, typ: any, h: any, capt: any) => any,
  removeEventListener: (id: any) => any,
  preventDefault: (ev: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.DocumentPosition = module.exports[1];
module.exports.insertBefore = module.exports[2];
module.exports.replaceChild = module.exports[3];
module.exports.removeChild = module.exports[4];
module.exports.appendChild = module.exports[5];
module.exports.list_of_nodeList = module.exports[6];
module.exports.nodeType = module.exports[7];
module.exports.no_handler = module.exports[9];
module.exports.handler = module.exports[10];
module.exports.full_handler = module.exports[11];
module.exports.invoke_handler = module.exports[12];
module.exports.eventTarget = module.exports[13];
module.exports.Event = module.exports[14];
module.exports.addEventListener = module.exports[15];
module.exports.removeEventListener = module.exports[16];
module.exports.preventDefault = module.exports[17];

/* Hashing disabled */
