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
var f_ = [0,string("lib/js_of_ocaml/form.ml"),170,58];
var e_ = [0,1];

function a_(x) {return call1(caml_get_public_method(x, -137852659, 168), x);}

var b_ = Js_of_ocaml_Js[50][1];
var formData = function(t0, param) {return t0.FormData;}(b_, a_);

function c_(x) {return call1(caml_get_public_method(x, -137852659, 169), x);}

var d_ = Js_of_ocaml_Js[50][1];
var formData_form = function(t1, param) {return t1.FormData;}(d_, c_);

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
  function at_(x) {
    return call1(caml_get_public_method(x, 520590566, 170), x);
  }
  function au_(x) {
    return call1(caml_get_public_method(x, -922783157, 171), x);
  }
  var av_ = function(t2, param) {return t2.name;}(elt, au_);
  var aw_ = 0 < function(t3, param) {return t3.length;}(av_, at_) ? 1 : 0;
  if (aw_) {
    var ax_ = function(x) {
      return call1(caml_get_public_method(x, -66829956, 172), x);
    };
    var ay_ = 1 - (function(t4, param) {return t4.disabled;}(elt, ax_) | 0);
  }
  else var ay_ = aw_;
  return ay_;
}

function get_textarea_val(elt) {
  if (have_content(elt)) {
    var aq_ = function(x) {
      return call1(caml_get_public_method(x, -922783157, 173), x);
    };
    var name = caml_js_to_string(
      function(t6, param) {return t6.name;}(elt, aq_)
    );
    var ar_ = 0;
    var as_ = function(x) {
      return call1(caml_get_public_method(x, 834174833, 174), x);
    };
    return [
      0,
      [0,name,[0,-976970511,function(t5, param) {return t5.value;}(elt, as_)]],
      ar_
    ];
  }
  return 0;
}

function get_select_val(elt) {
  if (have_content(elt)) {
    var aa_ = function(x) {
      return call1(caml_get_public_method(x, -922783157, 175), x);
    };
    var name = caml_js_to_string(
      function(t16, param) {return t16.name;}(elt, aa_)
    );
    var ab_ = function(x) {
      return call1(caml_get_public_method(x, 445440528, 176), x);
    };
    if (function(t15, param) {return t15.multiple;}(elt, ab_) | 0) {
      var ac_ = function(i) {
        function am_(x) {
          return call1(caml_get_public_method(x, -977287917, 177), x);
        }
        function an_(x) {
          return call1(caml_get_public_method(x, -536988834, 178), x);
        }
        var ao_ = function(t12, param) {return t12.options;}(elt, an_);
        var ap_ = function(t14, t13, param) {return t14.item(t13);}(ao_, i, am_
        );
        return call1(Js_of_ocaml_Js[5][10], ap_);
      };
      var ad_ = function(x) {
        return call1(caml_get_public_method(x, 520590566, 179), x);
      };
      var ae_ = function(x) {
        return call1(caml_get_public_method(x, -536988834, 180), x);
      };
      var af_ = function(t10, param) {return t10.options;}(elt, ae_);
      var ag_ = function(t11, param) {return t11.length;}(af_, ad_);
      var options = call2(Array[2], ag_, ac_);
      var ah_ = call1(Array[11], options);
      return filter_map(
        function(param) {
          if (param) {
            var e = param[1];
            var ak_ = function(x) {
              return call1(caml_get_public_method(x, 829237851, 181), x);
            };
            if (function(t9, param) {return t9.selected;}(e, ak_) | 0) {
              var al_ = function(x) {
                return call1(caml_get_public_method(x, 834174833, 182), x);
              };
              return [
                0,
                [
                  0,
                  name,
                  [0,-976970511,function(t8, param) {return t8.value;}(e, al_)
                  ]
                ]
              ];
            }
            return 0;
          }
          return 0;
        },
        ah_
      );
    }
    var ai_ = 0;
    var aj_ = function(x) {
      return call1(caml_get_public_method(x, 834174833, 183), x);
    };
    return [
      0,
      [0,name,[0,-976970511,function(t7, param) {return t7.value;}(elt, aj_)]],
      ai_
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
    var G_ = function(x) {
      return call1(caml_get_public_method(x, -922783157, 184), x);
    };
    var name = caml_js_to_string(
      function(t29, param) {return t29.name;}(elt, G_)
    );
    var H_ = function(x) {
      return call1(caml_get_public_method(x, 834174833, 185), x);
    };
    var value = function(t28, param) {return t28.value;}(elt, H_);
    var I_ = function(x) {
      return call1(caml_get_public_method(x, 946097238, 186), x);
    };
    var J_ = function(x) {
      return call1(caml_get_public_method(x, 1707673, 187), x);
    };
    var K_ = function(t26, param) {return t26.type;}(elt, J_);
    var match = runtime["caml_js_to_byte_string"](
      function(t27, param) {return t27.toLowerCase();}(K_, I_)
    );
    if (caml_string_notequal(match, cst_checkbox)) {
      if (! caml_string_notequal(match, cst_file)) {
        if (get) {return [0,[0,name,[0,-976970511,value]],0];}
        var M_ = function(x) {
          return call1(caml_get_public_method(x, 10018423, 189), x);
        };
        var N_ = function(t25, param) {return t25.files;}(elt, M_);
        var match__0 = call1(Js_of_ocaml_Js[6][10], N_);
        if (match__0) {
          var list = match__0[1];
          var O_ = function(x) {
            return call1(caml_get_public_method(x, 520590566, 190), x);
          };
          if (0 === function(t24, param) {return t24.length;}(list, O_)) {return [0,[0,name,[0,-976970511,""]],0];}
          var P_ = function(x) {
            return call1(caml_get_public_method(x, 445440528, 191), x);
          };
          var Q_ = function(t23, param) {return t23.multiple;}(elt, P_);
          var match__1 = call1(Js_of_ocaml_Js[6][10], Q_);
          if (match__1) {
            if (0 !== match__1[1]) {
              var U_ = function(i) {
                function Z_(x) {
                  return call1(caml_get_public_method(x, -977287917, 193), x);
                }
                return function(t22, t21, param) {return t22.item(t21);}(list, i, Z_
                );
              };
              var V_ = function(x) {
                return call1(caml_get_public_method(x, 520590566, 194), x);
              };
              var W_ = function(t20, param) {return t20.length;}(list, V_);
              var X_ = call2(Array[2], W_, U_);
              var Y_ = call1(Array[11], X_);
              return filter_map(
                function(f) {
                  var match = call1(Js_of_ocaml_Js[5][10], f);
                  if (match) {
                    var file = match[1];
                    return [0,[0,name,[0,781515420,file]]];
                  }
                  return 0;
                },
                Y_
              );
            }
          }
          var R_ = function(x) {
            return call1(caml_get_public_method(x, -977287917, 192), x);
          };
          var S_ = 0;
          var T_ = function(t19, t18, param) {return t19.item(t18);}(list, S_, R_
          );
          var match__2 = call1(Js_of_ocaml_Js[5][10], T_);
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
    var L_ = function(x) {
      return call1(caml_get_public_method(x, 321172263, 188), x);
    };
    return function(t17, param) {return t17.checked;}(elt, L_) | 0 ?
      [0,[0,name,[0,-976970511,value]],0] :
      0;
  }
  return 0;
}

function form_elements(get, form) {
  function v_(x) {return call1(caml_get_public_method(x, 520590566, 195), x);}
  function w_(x) {return call1(caml_get_public_method(x, 63190583, 196), x);}
  var x_ = function(t33, param) {return t33.elements;}(form, w_);
  var length = function(t34, param) {return t34.length;}(x_, v_);
  function y_(i) {
    function C_(x) {
      return call1(caml_get_public_method(x, -977287917, 197), x);
    }
    function D_(x) {
      return call1(caml_get_public_method(x, 63190583, 198), x);
    }
    var E_ = function(t30, param) {return t30.elements;}(form, D_);
    var F_ = function(t32, t31, param) {return t32.item(t31);}(E_, i, C_);
    return call1(Js_of_ocaml_Js[5][10], F_);
  }
  var z_ = call2(Array[2], length, y_);
  var elements = call1(Array[11], z_);
  function A_(param) {
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
  var B_ = call2(List[17], A_, elements);
  var contents = call1(List[14], B_);
  return contents;
}

function append(form_contents, form_elt) {
  if (891486873 <= form_contents[1]) {
    var list = form_contents[2];
    list[1] = [0,form_elt,list[1]];
    return 0;
  }
  var f = form_contents[2];
  var p_ = form_elt[2];
  var q_ = form_elt[1];
  if (781515420 <= p_[1]) {
    var file = p_[2];
    var r_ = function(x) {
      return call1(caml_get_public_method(x, 494108962, 199), x);
    };
    var s_ = q_.toString();
    return function(t40, t38, t39, param) {return t40.append(t38, t39);}(f, s_, file, r_
    );
  }
  var s = p_[2];
  function t_(x) {return call1(caml_get_public_method(x, 265544154, 200), x);}
  var u_ = q_.toString();
  return function(t37, t35, t36, param) {return t37.append(t35, t36);}(f, u_, s, t_
  );
}

function empty_form_contents(param) {
  var n_ = call1(Js_of_ocaml_Js[4], formData);
  var match = call1(Js_of_ocaml_Js[6][10], n_);
  if (match) {
    var constr = match[1];
    var o_ = 0;
    return [0,808620462,function(t41, param) {return new t41();}(constr, o_)];
  }
  return [0,891486873,[0,0]];
}

function post_form_contents(form) {
  var contents = empty_form_contents(0);
  var k_ = form_elements(0, form);
  function l_(m_) {return append(contents, m_);}
  call2(List[15], l_, k_);
  return contents;
}

function get_form_contents(form) {
  var g_ = form_elements(e_, form);
  function h_(param) {
    var i_ = param[2];
    var j_ = param[1];
    if (! (typeof i_ === "number")) {
      if (-976970511 === i_[1]) {
        var s = i_[2];
        return [0,j_,caml_js_to_string(s)];
      }
    }
    throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,f_]);
  }
  return call2(List[17], h_, g_);
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
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
