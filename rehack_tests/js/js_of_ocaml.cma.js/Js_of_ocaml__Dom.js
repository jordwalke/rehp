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
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Not_found = global_data["Not_found"];
var List = global_data["List_"];
var e_ = [0,caml_new_string("lib/js_of_ocaml/dom.ml"),343,67];

function list_of_nodeList(nodeList) {
  function fW(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 48), x);
  }
  var length = function(t2, param) {return t2.length;}(nodeList, fW);
  function add_item(acc, i) {
    var acc__0 = acc;
    var i__0 = i;
    for (; ; ) {
      if (i__0 < length) {
        var fX = function(x) {
          return caml_call1(caml_get_public_method(x, -977287917, 49), x);
        };
        var fY = function(t1, t0, param) {return t1.item(t0);}(nodeList, i__0, fX
        );
        var match = caml_call1(Js_of_ocaml_Js[5][10], fY);
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
      return caml_call1(List[9], acc__0);
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
  function fV(x) {
    return caml_call1(caml_get_public_method(x, 36716898, 50), x);
  }
  (function(t4, t3, param) {return t4.appendChild(t3);}(p, n, fV));
  return 0;
}

function removeChild(p, n) {
  function fU(x) {
    return caml_call1(caml_get_public_method(x, -1007843656, 51), x);
  }
  (function(t6, t5, param) {return t6.removeChild(t5);}(p, n, fU));
  return 0;
}

function replaceChild(p, n, o) {
  function fT(x) {
    return caml_call1(caml_get_public_method(x, 961057992, 52), x);
  }
  (function(t9, t7, t8, param) {return t9.replaceChild(t7, t8);}(p, n, o, fT));
  return 0;
}

function insertBefore(p, n, o) {
  function fS(x) {
    return caml_call1(caml_get_public_method(x, 281001112, 53), x);
  }
  (function(t12, t10, t11, param) {return t12.insertBefore(t10, t11);}(p, n, o, fS
   ));
  return 0;
}

function nodeType(e) {
  function fR(x) {
    return caml_call1(caml_get_public_method(x, -158969380, 54), x);
  }
  var match = function(t13, param) {return t13.nodeType;}(e, fR);
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
  function fQ(x) {
    return caml_call1(caml_get_public_method(x, -158969380, 55), x);
  }
  return function(t14, param) {return t14.nodeType;}(e, fQ) === t ?
    caml_call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function element(e) {return cast(e, 1);}

function text(e) {
  function fO(x) {
    return caml_call1(caml_get_public_method(x, -158969380, 56), x);
  }
  if (3 !== function(t15, param) {return t15.nodeType;}(e, fO)) {
    var fP = function(x) {
      return caml_call1(caml_get_public_method(x, -158969380, 57), x);
    };
    if (4 !== function(t16, param) {return t16.nodeType;}(e, fP)) {return Js_of_ocaml_Js[1];}
  }
  return caml_call1(Js_of_ocaml_Js[2], e);
}

function attr(e) {return cast(e, 2);}

var no_handler = Js_of_ocaml_Js[1];

function window_event(param) {return  event ;}

function handler(f) {
  function fK(e) {
    var fL = caml_call1(Js_of_ocaml_Js[2], e);
    if (caml_call1(Js_of_ocaml_Js[5][5], fL)) {
      var res = caml_call1(f, e);
      if (1 - (res | 0)) {
        var fM = function(x) {
          return caml_call1(caml_get_public_method(x, -408605495, 58), x);
        };
        (function(t17, param) {return t17.preventDefault();}(e, fM));
      }
      return res;
    }
    var e__0 = window_event(0);
    var res__0 = caml_call1(f, e__0);
    if (1 - (res__0 | 0)) {
      var fN = function(x) {
        return caml_call1(caml_get_public_method(x, 1049971873, 59), x);
      };
      (function(t19, t18, param) {t19.returnValue = t18;return 0;}(e__0, res__0, fN
       ));
    }
    return res__0;
  }
  return caml_call1(Js_of_ocaml_Js[2], fK);
}

function full_handler(f) {
  var fG = runtime["caml_js_wrap_meth_callback_unsafe"](
    function(this__0, e) {
      var fH = caml_call1(Js_of_ocaml_Js[2], e);
      if (caml_call1(Js_of_ocaml_Js[5][5], fH)) {
        var res = caml_call2(f, this__0, e);
        if (1 - (res | 0)) {
          var fI = function(x) {
            return caml_call1(caml_get_public_method(x, -408605495, 60), x);
          };
          (function(t20, param) {return t20.preventDefault();}(e, fI));
        }
        return res;
      }
      var e__0 = window_event(0);
      var res__0 = caml_call2(f, this__0, e__0);
      if (1 - (res__0 | 0)) {
        var fJ = function(x) {
          return caml_call1(caml_get_public_method(x, 1049971873, 61), x);
        };
        (function(t22, t21, param) {t22.returnValue = t21;return 0;}(e__0, res__0, fJ
         ));
      }
      return res__0;
    }
  );
  return caml_call1(Js_of_ocaml_Js[2], fG);
}

function invoke_handler(f, this__0, event) {return f.call(this__0, event);}

function eventTarget(e) {
  function fu(param) {
    function fD(param) {
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
    function fE(x) {
      return caml_call1(caml_get_public_method(x, -1021537224, 62), x);
    }
    var fF = function(t27, param) {return t27.srcElement;}(e, fE);
    return caml_call2(Js_of_ocaml_Js[5][8], fF, fD);
  }
  function fv(x) {
    return caml_call1(caml_get_public_method(x, 116192081, 63), x);
  }
  var fw = function(t26, param) {return t26.target;}(e, fv);
  var target = caml_call2(Js_of_ocaml_Js[5][8], fw, fu);
  function fx(x) {
    return caml_call1(caml_get_public_method(x, -420195839, 64), x);
  }
  var fy = Js_of_ocaml_Js[50][1];
  if (target instanceof function(t25, param) {return t25.Node;}(fy, fx)) {
    var fz = function(x) {
      return caml_call1(caml_get_public_method(x, -158969380, 65), x);
    };
    if (3 === function(t24, param) {return t24.nodeType;}(target, fz)) {
      var fA = function(param) {
        throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,e_]);
      };
      var fB = function(x) {
        return caml_call1(caml_get_public_method(x, -400811956, 66), x);
      };
      var fC = function(t23, param) {return t23.parentNode;}(target, fB);
      return caml_call2(Js_of_ocaml_Js[5][8], fC, fA);
    }
    return target;
  }
  return target;
}

function make(s) {return s.toString();}

var Event = [0,make];

function addEventListener(e, typ, h, capt) {
  var ff = Js_of_ocaml_Js[3];
  function fg(x) {
    return caml_call1(caml_get_public_method(x, -245101619, 67), x);
  }
  if (function(t44, param) {return t44.addEventListener;}(e, fg) === ff) {
    var fh = function(x) {
      return caml_call1(caml_get_public_method(x, -942667500, 68), x);
    };
    var fi = "on";
    var ev = function(t43, t42, param) {return t43.concat(t42);}(fi, typ, fh);
    var callback = function(e) {
      var fn = [0,h,e,[0]];
      function fo(ft, fs, fr) {return runtime["caml_js_call"](ft, fs, fr);}
      return function(fp, fq) {return fo(fn, fp, fq);};
    };
    var fj = function(x) {
      return caml_call1(caml_get_public_method(x, -362647019, 69), x);
    };
    (function(t41, t39, t40, param) {return t41.attachEvent(t39, t40);}(e, ev, callback, fj
     ));
    return function(param) {
      function fm(x) {
        return caml_call1(caml_get_public_method(x, 681618887, 70), x);
      }
      return function(t38, t36, t37, param) {
        return t38.detachEvent(t36, t37);
      }(e, ev, callback, fm
      );
    };
  }
  function fk(x) {
    return caml_call1(caml_get_public_method(x, -245101619, 71), x);
  }
  (function(t35, t32, t33, t34, param) {
     return t35.addEventListener(t32, t33, t34);
   }(e, typ, h, capt, fk
   ));
  return function(param) {
    function fl(x) {
      return caml_call1(caml_get_public_method(x, -713717814, 72), x);
    }
    return function(t31, t28, t29, t30, param) {
      return t31.removeEventListener(t28, t29, t30);
    }(e, typ, h, capt, fl
    );
  };
}

function removeEventListener(id) {return caml_call1(id, 0);}

function preventDefault(ev) {
  function fa(x) {
    return caml_call1(caml_get_public_method(x, -408605495, 73), x);
  }
  var fb = function(t48, param) {return t48.preventDefault;}(ev, fa);
  if (caml_call1(Js_of_ocaml_Js[6][5], fb)) {
    var fc = function(x) {
      return caml_call1(caml_get_public_method(x, -408605495, 74), x);
    };
    return function(t47, param) {return t47.preventDefault();}(ev, fc);
  }
  function fd(x) {
    return caml_call1(caml_get_public_method(x, 1049971873, 75), x);
  }
  var fe = ! ! 0;
  return function(t46, t45, param) {t46.returnValue = t45;return 0;}(ev, fe, fd
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

runtime["caml_register_global"](35, Js_of_ocaml_Dom, "Js_of_ocaml__Dom");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Dom;