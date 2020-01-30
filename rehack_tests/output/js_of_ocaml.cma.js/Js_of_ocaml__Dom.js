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
var Js_of_ocaml_Import = require("./Js_of_ocaml__Import.js");
var List = require("../stdlib.cma.js/List.js");
var a_ = [0,string("lib/js_of_ocaml/dom.ml"),351,67];

function list_of_nodeList(nodeList) {
  function aj_(x) {return call1(caml_get_public_method(x, 520590566, 24), x);}
  var length = function(t2, param) {return t2.length;}(nodeList, aj_);
  function add_item(acc, i) {
    var acc__0 = acc;
    var i__0 = i;
    for (; ; ) {
      if (call2(Js_of_ocaml_Import[5], i__0, length)) {
        var ak_ = function(x) {
          return call1(caml_get_public_method(x, -977287917, 25), x);
        };
        var al_ = function(t1, t0, param) {return t1.item(t0);}(nodeList, i__0, ak_
        );
        var match = call1(Js_of_ocaml_Js[5][10], al_);
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

function has(t, mask) {return call2(Js_of_ocaml_Import[8], t & mask, mask);}

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
  function ai_(x) {return call1(caml_get_public_method(x, 36716898, 26), x);}
  (function(t4, t3, param) {return t4.appendChild(t3);}(p, n, ai_));
  return 0;
}

function removeChild(p, n) {
  function ah_(x) {
    return call1(caml_get_public_method(x, -1007843656, 27), x);
  }
  (function(t6, t5, param) {return t6.removeChild(t5);}(p, n, ah_));
  return 0;
}

function replaceChild(p, n, o) {
  function ag_(x) {return call1(caml_get_public_method(x, 961057992, 28), x);}
  (function(t9, t7, t8, param) {return t9.replaceChild(t7, t8);}(p, n, o, ag_));
  return 0;
}

function insertBefore(p, n, o) {
  function af_(x) {return call1(caml_get_public_method(x, 281001112, 29), x);}
  (function(t12, t10, t11, param) {return t12.insertBefore(t10, t11);}(p, n, o, af_
   ));
  return 0;
}

function nodeType(e) {
  function ae_(x) {
    return call1(caml_get_public_method(x, -158969380, 30), x);
  }
  var match = function(t13, param) {return t13.nodeType;}(e, ae_);
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
  function ad_(x) {
    return call1(caml_get_public_method(x, -158969380, 31), x);
  }
  return function(t14, param) {return t14.nodeType;}(e, ad_) === t ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function element(e) {return cast(e, 1);}

function text(e) {
  function ab_(x) {
    return call1(caml_get_public_method(x, -158969380, 32), x);
  }
  if (3 !== function(t15, param) {return t15.nodeType;}(e, ab_)) {
    var ac_ = function(x) {
      return call1(caml_get_public_method(x, -158969380, 33), x);
    };
    if (4 !== function(t16, param) {return t16.nodeType;}(e, ac_)) {return Js_of_ocaml_Js[1];}
  }
  return call1(Js_of_ocaml_Js[2], e);
}

function attr(e) {return cast(e, 2);}

var no_handler = Js_of_ocaml_Js[1];

function window_event(param) {return (event);}

function handler(f) {
  function X_(e) {
    var Y_ = call1(Js_of_ocaml_Js[2], e);
    if (call1(Js_of_ocaml_Js[5][5], Y_)) {
      var res = call1(f, e);
      if (1 - (res | 0)) {
        var Z_ = function(x) {
          return call1(caml_get_public_method(x, -408605495, 34), x);
        };
        (function(t17, param) {return t17.preventDefault();}(e, Z_));
      }
      return res;
    }
    var e__0 = window_event(0);
    var res__0 = call1(f, e__0);
    if (1 - (res__0 | 0)) {
      var aa_ = function(x) {
        return call1(caml_get_public_method(x, 1049971873, 35), x);
      };
      (function(t19, t18, param) {t19.returnValue = t18;return 0;}(e__0, res__0, aa_
       ));
    }
    return res__0;
  }
  return call1(Js_of_ocaml_Js[2], X_);
}

function full_handler(f) {
  var T_ = runtime["caml_js_wrap_meth_callback_unsafe"](
    function(this__0, e) {
      var U_ = call1(Js_of_ocaml_Js[2], e);
      if (call1(Js_of_ocaml_Js[5][5], U_)) {
        var res = call2(f, this__0, e);
        if (1 - (res | 0)) {
          var V_ = function(x) {
            return call1(caml_get_public_method(x, -408605495, 36), x);
          };
          (function(t20, param) {return t20.preventDefault();}(e, V_));
        }
        return res;
      }
      var e__0 = window_event(0);
      var res__0 = call2(f, this__0, e__0);
      if (1 - (res__0 | 0)) {
        var W_ = function(x) {
          return call1(caml_get_public_method(x, 1049971873, 37), x);
        };
        (function(t22, t21, param) {t22.returnValue = t21;return 0;}(e__0, res__0, W_
         ));
      }
      return res__0;
    }
  );
  return call1(Js_of_ocaml_Js[2], T_);
}

function invoke_handler(f, this__0, event) {return f.call(this__0, event);}

function eventTarget(e) {
  function H_(param) {
    function Q_(param) {throw caml_wrap_thrown_exception(Not_found);}
    function R_(x) {
      return call1(caml_get_public_method(x, -1021537224, 38), x);
    }
    var S_ = function(t27, param) {return t27.srcElement;}(e, R_);
    return call2(Js_of_ocaml_Js[5][8], S_, Q_);
  }
  function I_(x) {return call1(caml_get_public_method(x, 116192081, 39), x);}
  var J_ = function(t26, param) {return t26.target;}(e, I_);
  var target = call2(Js_of_ocaml_Js[5][8], J_, H_);
  function K_(x) {return call1(caml_get_public_method(x, -420195839, 40), x);}
  var L_ = Js_of_ocaml_Js[50][1];
  if (target instanceof function(t25, param) {return t25.Node;}(L_, K_)) {
    var M_ = function(x) {
      return call1(caml_get_public_method(x, -158969380, 41), x);
    };
    if (3 === function(t24, param) {return t24.nodeType;}(target, M_)) {
      var N_ = function(param) {
        throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
      };
      var O_ = function(x) {
        return call1(caml_get_public_method(x, -400811956, 42), x);
      };
      var P_ = function(t23, param) {return t23.parentNode;}(target, O_);
      return call2(Js_of_ocaml_Js[5][8], P_, N_);
    }
    return target;
  }
  return target;
}

function make(s) {return s.toString();}

var Event = [0,make];

function addEventListenerWithOptions(e, typ, capture, once, passive, h) {
  var p_ = Js_of_ocaml_Js[3];
  function q_(x) {return call1(caml_get_public_method(x, -245101619, 43), x);}
  if (function(t50, param) {return t50.addEventListener;}(e, q_) === p_) {
    var r_ = function(x) {
      return call1(caml_get_public_method(x, -942667500, 44), x);
    };
    var s_ = "on";
    var ev = function(t49, t48, param) {return t49.concat(t48);}(s_, typ, r_);
    var callback = function(e) {
      var A_ = [0,h,e,[0]];
      function B_(G_, F_, E_) {return runtime["caml_js_call"](G_, F_, E_);}
      return function(C_, D_) {return B_(A_, C_, D_);};
    };
    var t_ = function(x) {
      return call1(caml_get_public_method(x, -362647019, 45), x);
    };
    (function(t47, t45, t46, param) {return t47.attachEvent(t45, t46);}(e, ev, callback, t_
     ));
    return function(param) {
      function z_(x) {
        return call1(caml_get_public_method(x, 681618887, 46), x);
      }
      return function(t44, t42, t43, param) {
        return t44.detachEvent(t42, t43);
      }(e, ev, callback, z_
      );
    };
  }
  var opts = {};
  function iter(t, f) {if (t) {var b = t[1];return call1(f, b);}return 0;}
  iter(
    capture,
    function(b) {
      function y_(x) {
        return call1(caml_get_public_method(x, 659673222, 47), x);
      }
      return function(t41, t40, param) {t41.capture = t40;return 0;}(opts, b, y_
      );
    }
  );
  iter(
    once,
    function(b) {
      function x_(x) {
        return call1(caml_get_public_method(x, -911049343, 48), x);
      }
      return function(t39, t38, param) {t39.once = t38;return 0;}(opts, b, x_);
    }
  );
  iter(
    passive,
    function(b) {
      function w_(x) {
        return call1(caml_get_public_method(x, -43366489, 49), x);
      }
      return function(t37, t36, param) {t37.passive = t36;return 0;}(opts, b, w_
      );
    }
  );
  function u_(x) {return call1(caml_get_public_method(x, -245101619, 50), x);}
  (function(t35, t32, t33, t34, param) {
     return t35.addEventListener(t32, t33, t34);
   }(e, typ, h, opts, u_
   ));
  return function(param) {
    function v_(x) {
      return call1(caml_get_public_method(x, -713717814, 51), x);
    }
    return function(t31, t28, t29, t30, param) {
      return t31.removeEventListener(t28, t29, t30);
    }(e, typ, h, opts, v_
    );
  };
}

function addEventListener(e, typ, h, capt) {
  return addEventListenerWithOptions(e, typ, [0,capt], 0, 0, h);
}

function removeEventListener(id) {return call1(id, 0);}

function preventDefault(ev) {
  function k_(x) {return call1(caml_get_public_method(x, -408605495, 52), x);}
  var l_ = function(t54, param) {return t54.preventDefault;}(ev, k_);
  if (call1(Js_of_ocaml_Js[6][5], l_)) {
    var m_ = function(x) {
      return call1(caml_get_public_method(x, -408605495, 53), x);
    };
    return function(t53, param) {return t53.preventDefault();}(ev, m_);
  }
  function n_(x) {return call1(caml_get_public_method(x, 1049971873, 54), x);}
  var o_ = ! ! 0;
  return function(t52, t51, param) {t52.returnValue = t51;return 0;}(ev, o_, n_
  );
}

function createCustomEvent(bubbles, cancelable, detail, typ) {
  function opt_iter(f, param) {
    if (param) {var x = param[1];return call1(f, x);}
    return 0;
  }
  var opts = {};
  opt_iter(
    function(x) {
      function i_(x) {
        return call1(caml_get_public_method(x, -514409625, 55), x);
      }
      var j_ = ! ! x;
      return function(t64, t63, param) {t64.bubbles = t63;return 0;}(opts, j_, i_
      );
    },
    bubbles
  );
  opt_iter(
    function(x) {
      function g_(x) {
        return call1(caml_get_public_method(x, -998662124, 56), x);
      }
      var h_ = ! ! x;
      return function(t62, t61, param) {t62.cancelable = t61;return 0;}(opts, h_, g_
      );
    },
    cancelable
  );
  opt_iter(
    function(x) {
      function e_(x) {
        return call1(caml_get_public_method(x, -266378607, 57), x);
      }
      var f_ = call1(Js_of_ocaml_Js[2], x);
      return function(t60, t59, param) {t60.detail = t59;return 0;}(opts, f_, e_
      );
    },
    detail
  );
  function b_(x) {return call1(caml_get_public_method(x, -717392758, 58), x);}
  var c_ = Js_of_ocaml_Js[50][1];
  var constr = function(t58, param) {return t58.CustomEvent;}(c_, b_);
  var d_ = 0;
  return function(t57, t55, t56, param) {return new t57(t55, t56);}(constr, typ, opts, d_
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
  addEventListenerWithOptions,
  addEventListener,
  removeEventListener,
  preventDefault,
  createCustomEvent
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
  addEventListenerWithOptions: (e: any, typ: any, capture: any, once: any, passive: any, h: any) => any,
  addEventListener: (e: any, typ: any, h: any, capt: any) => any,
  removeEventListener: (id: any) => any,
  preventDefault: (ev: any) => any,
  createCustomEvent: (bubbles: any, cancelable: any, detail: any, typ: any) => any,
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
  addEventListenerWithOptions: (e: any, typ: any, capture: any, once: any, passive: any, h: any) => any,
  addEventListener: (e: any, typ: any, h: any, capt: any) => any,
  removeEventListener: (id: any) => any,
  preventDefault: (ev: any) => any,
  createCustomEvent: (bubbles: any, cancelable: any, detail: any, typ: any) => any,
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
module.exports.addEventListenerWithOptions = module.exports[15];
module.exports.addEventListener = module.exports[16];
module.exports.removeEventListener = module.exports[17];
module.exports.preventDefault = module.exports[18];
module.exports.createCustomEvent = module.exports[19];

/* Hashing disabled */
