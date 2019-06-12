/**
 * Js_of_ocaml__Form
 * @providesModule Js_of_ocaml__Form
 */
"use strict";
var Array_ = require('Array_.js');
var Js_of_ocaml__Dom_html = require('Js_of_ocaml__Dom_html.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var List_ = require('List_.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_string = runtime["caml_js_to_string"];
var string = runtime["caml_new_string"];
var caml_string_notequal = runtime["caml_string_notequal"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_checkbox = string("checkbox");
var cst_file = string("file");
var cst_password = string("password");
var cst_radio = string("radio");
var cst_reset = string("reset");
var cst_submit = string("submit");
var cst_text = string("text");
var Assert_failure = global_data["Assert_failure"];
var List = global_data["List_"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Js_of_ocaml_Dom_html = global_data["Js_of_ocaml__Dom_html"];
var Array = global_data["Array_"];
var lq = [0,string("lib/js_of_ocaml/form.ml"),170,58];
var lp = [0,1];

function ll(x) {return call1(caml_get_public_method(x, -137852659, 202), x);}

var lm = Js_of_ocaml_Js[50][1];
var formData = function(t0, param) {return t0.FormData;}(lm, ll);

function ln(x) {return call1(caml_get_public_method(x, -137852659, 203), x);}

var lo = Js_of_ocaml_Js[50][1];
var formData_form = function(t1, param) {return t1.FormData;}(lo, ln);

function filter_map(f, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var q = param__0[2];
      var v = param__0[1];
      var match = call1(f, v);
      if (match) {var v__0 = match[1];return [0,v__0,filter_map(f, q)];}
      var param__0 = q;
      continue;
    }
    return 0;
  }
}

function have_content(elt) {
  function mt(x) {return call1(caml_get_public_method(x, 520590566, 204), x);}
  function mu(x) {
    return call1(caml_get_public_method(x, -922783157, 205), x);
  }
  var mv = function(t2, param) {return t2.name;}(elt, mu);
  var mw = 0 < function(t3, param) {return t3.length;}(mv, mt) ? 1 : 0;
  if (mw) {
    var mx = function(x) {
      return call1(caml_get_public_method(x, -66829956, 206), x);
    };
    var my = 1 - (function(t4, param) {return t4.disabled;}(elt, mx) | 0);
  }
  else var my = mw;
  return my;
}

function get_textarea_val(elt) {
  if (have_content(elt)) {
    var mq = function(x) {
      return call1(caml_get_public_method(x, -922783157, 207), x);
    };
    var name = caml_js_to_string(
      function(t6, param) {return t6.name;}(elt, mq)
    );
    var mr = 0;
    var ms = function(x) {
      return call1(caml_get_public_method(x, 834174833, 208), x);
    };
    return [
      0,
      [0,name,[0,-976970511,function(t5, param) {return t5.value;}(elt, ms)]],
      mr
    ];
  }
  return 0;
}

function get_select_val(elt) {
  if (have_content(elt)) {
    var ma = function(x) {
      return call1(caml_get_public_method(x, -922783157, 209), x);
    };
    var name = caml_js_to_string(
      function(t16, param) {return t16.name;}(elt, ma)
    );
    var mb = function(x) {
      return call1(caml_get_public_method(x, 445440528, 210), x);
    };
    if (function(t15, param) {return t15.multiple;}(elt, mb) | 0) {
      var mc = function(i) {
        function mm(x) {
          return call1(caml_get_public_method(x, -977287917, 211), x);
        }
        function mn(x) {
          return call1(caml_get_public_method(x, -536988834, 212), x);
        }
        var mo = function(t12, param) {return t12.options;}(elt, mn);
        var mp = function(t14, t13, param) {return t14.item(t13);}(mo, i, mm);
        return call1(Js_of_ocaml_Js[5][10], mp);
      };
      var md = function(x) {
        return call1(caml_get_public_method(x, 520590566, 213), x);
      };
      var me = function(x) {
        return call1(caml_get_public_method(x, -536988834, 214), x);
      };
      var mf = function(t10, param) {return t10.options;}(elt, me);
      var mg = function(t11, param) {return t11.length;}(mf, md);
      var options = call2(Array[2], mg, mc);
      var mh = call1(Array[11], options);
      return filter_map(
        function(param) {
          if (param) {
            var e = param[1];
            var mk = function(x) {
              return call1(caml_get_public_method(x, 829237851, 215), x);
            };
            if (function(t9, param) {return t9.selected;}(e, mk) | 0) {
              var ml = function(x) {
                return call1(caml_get_public_method(x, 834174833, 216), x);
              };
              return [
                0,
                [
                  0,
                  name,
                  [0,-976970511,function(t8, param) {return t8.value;}(e, ml)]
                ]
              ];
            }
            return 0;
          }
          return 0;
        },
        mh
      );
    }
    var mi = 0;
    var mj = function(x) {
      return call1(caml_get_public_method(x, 834174833, 217), x);
    };
    return [
      0,
      [0,name,[0,-976970511,function(t7, param) {return t7.value;}(elt, mj)]],
      mi
    ];
  }
  return 0;
}

function get_input_val(opt, elt) {
  if (opt) {
    var sth = opt[1];
    var get = sth;
  }
  else var get = 0;
  if (have_content(elt)) {
    var lR = function(x) {
      return call1(caml_get_public_method(x, -922783157, 218), x);
    };
    var name = caml_js_to_string(
      function(t29, param) {return t29.name;}(elt, lR)
    );
    var lS = function(x) {
      return call1(caml_get_public_method(x, 834174833, 219), x);
    };
    var value = function(t28, param) {return t28.value;}(elt, lS);
    var lT = function(x) {
      return call1(caml_get_public_method(x, 946097238, 220), x);
    };
    var lU = function(x) {
      return call1(caml_get_public_method(x, 1707673, 221), x);
    };
    var lV = function(t26, param) {return t26.type;}(elt, lU);
    var match = runtime["caml_js_to_byte_string"](
      function(t27, param) {return t27.toLowerCase();}(lV, lT)
    );
    if (caml_string_notequal(match, cst_checkbox)) {
      if (! caml_string_notequal(match, cst_file)) {
        if (get) {return [0,[0,name,[0,-976970511,value]],0];}
        var lX = function(x) {
          return call1(caml_get_public_method(x, 10018423, 223), x);
        };
        var lY = function(t25, param) {return t25.files;}(elt, lX);
        var match__0 = call1(Js_of_ocaml_Js[6][10], lY);
        if (match__0) {
          var list = match__0[1];
          var lZ = function(x) {
            return call1(caml_get_public_method(x, 520590566, 224), x);
          };
          if (0 === function(t24, param) {return t24.length;}(list, lZ)) {return [0,[0,name,[0,-976970511,""]],0];}
          var l0 = function(x) {
            return call1(caml_get_public_method(x, 445440528, 225), x);
          };
          var l1 = function(t23, param) {return t23.multiple;}(elt, l0);
          var match__1 = call1(Js_of_ocaml_Js[6][10], l1);
          if (match__1) {
            if (0 !== match__1[1]) {
              var l5 = function(i) {
                function l_(x) {
                  return call1(caml_get_public_method(x, -977287917, 227), x);
                }
                return function(t22, t21, param) {return t22.item(t21);}(list, i, l_
                );
              };
              var l6 = function(x) {
                return call1(caml_get_public_method(x, 520590566, 228), x);
              };
              var l7 = function(t20, param) {return t20.length;}(list, l6);
              var l8 = call2(Array[2], l7, l5);
              var l9 = call1(Array[11], l8);
              return filter_map(
                function(f) {
                  var match = call1(Js_of_ocaml_Js[5][10], f);
                  if (match) {
                    var file = match[1];
                    return [0,[0,name,[0,781515420,file]]];
                  }
                  return 0;
                },
                l9
              );
            }
          }
          var l2 = function(x) {
            return call1(caml_get_public_method(x, -977287917, 226), x);
          };
          var l3 = 0;
          var l4 = function(t19, t18, param) {return t19.item(t18);}(list, l3, l2
          );
          var match__2 = call1(Js_of_ocaml_Js[5][10], l4);
          if (match__2) {
            var file = match__2[1];
            return [0,[0,name,[0,781515420,file]],0];
          }
          return 0;
        }
        return 0;
      }
      if (caml_string_notequal(match, cst_password)) if (caml_string_notequal(match, cst_radio)) {
        if (caml_string_notequal(match, cst_reset)) if (caml_string_notequal(match, cst_submit)
        ) {
          if (caml_string_notequal(match, cst_text)) {
            return [0,[0,name,[0,-976970511,value]],0];
          }
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else var switch__1 = 1;
        if (switch__1) {return 0;}
      }
      else var switch__0 = 0;
      else var switch__0 = 1;
      if (switch__0) {return [0,[0,name,[0,-976970511,value]],0];}
    }
    var lW = function(x) {
      return call1(caml_get_public_method(x, 321172263, 222), x);
    };
    return function(t17, param) {return t17.checked;}(elt, lW) | 0 ?
      [0,[0,name,[0,-976970511,value]],0] :
      0;
  }
  return 0;
}

function form_elements(get, form) {
  function lG(x) {return call1(caml_get_public_method(x, 520590566, 229), x);}
  function lH(x) {return call1(caml_get_public_method(x, 63190583, 230), x);}
  var lI = function(t33, param) {return t33.elements;}(form, lH);
  var length = function(t34, param) {return t34.length;}(lI, lG);
  function lJ(i) {
    function lN(x) {
      return call1(caml_get_public_method(x, -977287917, 231), x);
    }
    function lO(x) {
      return call1(caml_get_public_method(x, 63190583, 232), x);
    }
    var lP = function(t30, param) {return t30.elements;}(form, lO);
    var lQ = function(t32, t31, param) {return t32.item(t31);}(lP, i, lN);
    return call1(Js_of_ocaml_Js[5][10], lQ);
  }
  var lK = call2(Array[2], length, lJ);
  var elements = call1(Array[11], lK);
  function lL(param) {
    if (param) {
      var v = param[1];
      var match = call1(Js_of_ocaml_Dom_html[109], v);
      switch (match[0]) {
        case 31:
          var v__0 = match[1];
          return get_input_val(get, v__0);
        case 48:
          var v__1 = match[1];
          return get_select_val(v__1);
        case 53:
          var v__2 = match[1];
          return get_textarea_val(v__2);
        default:return 0
        }
    }
    return 0;
  }
  var lM = call2(List[17], lL, elements);
  var contents = call1(List[14], lM);
  return contents;
}

function append(form_contents, form_elt) {
  if (891486873 <= form_contents[1]) {
    var list = form_contents[2];
    list[1] = [0,form_elt,list[1]];
    return 0;
  }
  var f = form_contents[2];
  var lA = form_elt[2];
  var lB = form_elt[1];
  if (781515420 <= lA[1]) {
    var file = lA[2];
    var lC = function(x) {
      return call1(caml_get_public_method(x, 494108962, 233), x);
    };
    var lD = lB.toString();
    return function(t40, t38, t39, param) {return t40.append(t38, t39);}(f, lD, file, lC
    );
  }
  var s = lA[2];
  function lE(x) {return call1(caml_get_public_method(x, 265544154, 234), x);}
  var lF = lB.toString();
  return function(t37, t35, t36, param) {return t37.append(t35, t36);}(f, lF, s, lE
  );
}

function empty_form_contents(param) {
  var ly = call1(Js_of_ocaml_Js[4], formData);
  var match = call1(Js_of_ocaml_Js[6][10], ly);
  if (match) {
    var constr = match[1];
    var lz = 0;
    return [0,808620462,function(t41, param) {return new t41();}(constr, lz)];
  }
  return [0,891486873,[0,0]];
}

function post_form_contents(form) {
  var contents = empty_form_contents(0);
  var lv = form_elements(0, form);
  function lw(lx) {return append(contents, lx);}
  call2(List[15], lw, lv);
  return contents;
}

function get_form_contents(form) {
  var lr = form_elements(lp, form);
  function ls(param) {
    var lt = param[2];
    var lu = param[1];
    if (! (typeof lt === "number")) {
      if (-976970511 === lt[1]) {
        var s = lt[2];
        return [0,lu,caml_js_to_string(s)];
      }
    }
    throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,lq]);
  }
  return call2(List[17], ls, lr);
}

var Js_of_ocaml_Form = [
  0,
  formData,
  formData_form,
  append,
  post_form_contents,
  get_form_contents,
  empty_form_contents,
  form_elements
];

runtime["caml_register_global"](48, Js_of_ocaml_Form, "Js_of_ocaml__Form");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Form;