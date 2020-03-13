/**
 * @flow strict
 * CamlinternalOO
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var caml_check_bound = runtime["caml_check_bound"];
var caml_div = runtime["caml_div"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_make_vect = runtime["caml_make_vect"];
var string = runtime["caml_new_string"];
var caml_obj_block = runtime["caml_obj_block"];
var caml_set_oo_id = runtime["caml_set_oo_id"];
var caml_string_compare = runtime["caml_string_compare"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst = string("");
var Assert_failure = require("../runtime/Assert_failure.js");
var Sys = require("./Sys.js");
var Obj = require("./Obj.js");
var Undefined_recursive_module = require(
  "../runtime/Undefined_recursive_module.js"
);
var Array = require("./Array.js");
var List = require("./List.js");
var Not_found = require("../runtime/Not_found.js");
var Map = require("./Map.js");
var g_ = [0,string("camlinternalOO.ml"),438,17];
var f_ = [0,string("camlinternalOO.ml"),420,13];
var e_ = [0,string("camlinternalOO.ml"),417,13];
var d_ = [0,string("camlinternalOO.ml"),414,13];
var c_ = [0,string("camlinternalOO.ml"),411,13];
var b_ = [0,string("camlinternalOO.ml"),408,13];
var a_ = [0,string("camlinternalOO.ml"),281,50];

function copy(o) {var o__0 = o.slice();return caml_set_oo_id(o__0);}

var params = [0,1,1,1,3,16];
var initial_object_size = 2;
var dummy_item = 0;

function public_method_label(s) {
  var i;
  var aD_;
  var aE_;
  var accu = [0,0];
  var aC_ = runtime["caml_ml_string_length"](s) + -1 | 0;
  var aB_ = 0;
  if (! (aC_ < 0)) {
    i = aB_;
    for (; ; ) {
      aD_ = runtime["caml_string_get"](s, i);
      accu[1] = (223 * accu[1] | 0) + aD_ | 0;
      aE_ = i + 1 | 0;
      if (aC_ !== i) {i = aE_;continue;}
      break;
    }
  }
  accu[1] = accu[1] & 2147483647;
  var tag = 1073741823 < accu[1] ? accu[1] + 2147483648 | 0 : accu[1];
  return tag;
}

function compare(x, y) {return caml_string_compare(x, y);}

var Vars = call1(Map[1], [0,compare]);

function compare__0(x, y) {return caml_string_compare(x, y);}

var Meths = call1(Map[1], [0,compare__0]);

function compare__1(x, y) {return runtime["caml_int_compare"](x, y);}

var Labs = call1(Map[1], [0,compare__1]);
var dummy_table = [0,0,[0,dummy_item],Meths[1],Labs[1],0,0,Vars[1],0];
var table_count = [0,0];
var dummy_met = caml_obj_block(0, 0);

function fit_size(n) {
  return 2 < n ? fit_size((n + 1 | 0) / 2 | 0) * 2 | 0 : n;
}

function new_table(pub_labels) {
  var aA_;
  var az_;
  var ay_;
  var i;
  table_count[1] += 1;
  var len = pub_labels.length - 1;
  var methods = caml_make_vect((len * 2 | 0) + 2 | 0, dummy_met);
  caml_check_bound(methods, 0)[1] = len;
  var au_ = Sys[10];
  var av_ = (runtime["caml_mul"](fit_size(len), au_) / 8 | 0) + -1 | 0;
  caml_check_bound(methods, 1)[2] = av_;
  var ax_ = len + -1 | 0;
  var aw_ = 0;
  if (! (ax_ < 0)) {
    i = aw_;
    for (; ; ) {
      az_ = (i * 2 | 0) + 3 | 0;
      ay_ = caml_check_bound(pub_labels, i)[i + 1];
      caml_check_bound(methods, az_)[az_ + 1] = ay_;
      aA_ = i + 1 | 0;
      if (ax_ !== i) {i = aA_;continue;}
      break;
    }
  }
  return [0,initial_object_size,methods,Meths[1],Labs[1],0,0,Vars[1],0];
}

function resize(array, new_size) {
  var new_buck;
  var at_;
  var old_size = array[2].length - 1;
  var as_ = old_size < new_size ? 1 : 0;
  if (as_) {
    new_buck = caml_make_vect(new_size, dummy_met);
    call5(Array[10], array[2], 0, new_buck, 0, old_size);
    array[2] = new_buck;
    at_ = 0;
  }
  else at_ = as_;
  return at_;
}

function put(array, label, element) {
  resize(array, label + 1 | 0);
  caml_check_bound(array[2], label)[label + 1] = element;
  return 0;
}

var method_count = [0,0];
var inst_var_count = [0,0];

function new_method(table) {
  var index = table[2].length - 1;
  resize(table, index + 1 | 0);
  return index;
}

function get_method_label(table, name) {
  var aq_;
  var label;
  try {aq_ = call2(Meths[27], name, table[3]);return aq_;}
  catch(ar_) {
    ar_ = runtime["caml_wrap_exception"](ar_);
    if (ar_ === Not_found) {
      label = new_method(table);
      table[3] = call3(Meths[4], name, label, table[3]);
      table[4] = call3(Labs[4], label, 1, table[4]);
      return label;
    }
    throw caml_wrap_thrown_exception_reraise(ar_);
  }
}

function get_method_labels(table, names) {
  function ao_(ap_) {return get_method_label(table, ap_);}
  return call2(Array[15], ao_, names);
}

function set_method(table, label, element) {
  method_count[1] += 1;
  if (call2(Labs[27], label, table[4])) {return put(table, label, element);}
  table[6] = [0,[0,label,element],table[6]];
  return 0;
}

function get_method(table, label) {
  var am_;
  try {am_ = call2(List[38], label, table[6]);return am_;}
  catch(an_) {
    an_ = runtime["caml_wrap_exception"](an_);
    if (an_ === Not_found) {
      return caml_check_bound(table[2], label)[label + 1];
    }
    throw caml_wrap_thrown_exception_reraise(an_);
  }
}

function to_list(arr) {return arr === 0 ? 0 : call1(Array[11], arr);}

function narrow(table, vars, virt_meths, concr_meths) {
  var vars__0 = to_list(vars);
  var virt_meths__0 = to_list(virt_meths);
  var concr_meths__0 = to_list(concr_meths);
  function V_(al_) {return get_method_label(table, al_);}
  var virt_meth_labs = call2(List[17], V_, virt_meths__0);
  function W_(ak_) {return get_method_label(table, ak_);}
  var concr_meth_labs = call2(List[17], W_, concr_meths__0);
  table[5] =
    [0,[0,table[3],table[4],table[6],table[7],virt_meth_labs,vars__0],table[5]
    ];
  var X_ = Vars[1];
  var Y_ = table[7];
  function Z_(lab, info, tvars) {
    return call2(List[31], lab, vars__0) ?
      call3(Vars[4], lab, info, tvars) :
      tvars;
  }
  table[7] = call3(Vars[13], Z_, Y_, X_);
  var by_name = [0,Meths[1]];
  var by_label = [0,Labs[1]];
  function aa_(met, label) {
    var ai_;
    var ah_;
    var ag_;
    by_name[1] = call3(Meths[4], met, label, by_name[1]);
    var af_ = by_label[1];
    try {ai_ = call2(Labs[27], label, table[4]);ah_ = ai_;}
    catch(aj_) {
      aj_ = runtime["caml_wrap_exception"](aj_);
      if (aj_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(aj_);}
      ag_ = 1;
      ah_ = ag_;
    }
    by_label[1] = call3(Labs[4], label, ah_, af_);
    return 0;
  }
  call3(List[22], aa_, concr_meths__0, concr_meth_labs);
  function ab_(met, label) {
    by_name[1] = call3(Meths[4], met, label, by_name[1]);
    by_label[1] = call3(Labs[4], label, 0, by_label[1]);
    return 0;
  }
  call3(List[22], ab_, virt_meths__0, virt_meth_labs);
  table[3] = by_name[1];
  table[4] = by_label[1];
  var ac_ = 0;
  var ad_ = table[6];
  function ae_(met, hm) {
    var lab = met[1];
    return call2(List[31], lab, virt_meth_labs) ? hm : [0,met,hm];
  }
  table[6] = call3(List[21], ae_, ad_, ac_);
  return 0;
}

function widen(table) {
  var match = call1(List[5], table[5]);
  var vars = match[6];
  var virt_meths = match[5];
  var saved_vars = match[4];
  var saved_hidden_meths = match[3];
  var by_label = match[2];
  var by_name = match[1];
  table[5] = call1(List[6], table[5]);
  function R_(s, v) {
    var U_ = call2(Vars[27], v, table[7]);
    return call3(Vars[4], v, U_, s);
  }
  table[7] = call3(List[20], R_, saved_vars, vars);
  table[3] = by_name;
  table[4] = by_label;
  var S_ = table[6];
  function T_(met, hm) {
    var lab = met[1];
    return call2(List[31], lab, virt_meths) ? hm : [0,met,hm];
  }
  table[6] = call3(List[21], T_, S_, saved_hidden_meths);
  return 0;
}

function new_slot(table) {
  var index = table[1];
  table[1] = index + 1 | 0;
  return index;
}

function new_variable(table, name) {
  var P_;
  var index;
  try {P_ = call2(Vars[27], name, table[7]);return P_;}
  catch(Q_) {
    Q_ = runtime["caml_wrap_exception"](Q_);
    if (Q_ === Not_found) {
      index = new_slot(table);
      if (runtime["caml_string_notequal"](name, cst)) {
        table[7] = call3(Vars[4], name, index, table[7]);
      }
      return index;
    }
    throw caml_wrap_thrown_exception_reraise(Q_);
  }
}

function to_array(arr) {return runtime["caml_equal"](arr, 0) ? [0] : arr;}

function new_methods_variables(table, meths, vals) {
  var i;
  var K_;
  var L_;
  var M_;
  var i__0;
  var N_;
  var O_;
  var meths__0 = to_array(meths);
  var nmeths = meths__0.length - 1;
  var nvals = vals.length - 1;
  var res = caml_make_vect(nmeths + nvals | 0, 0);
  var H_ = nmeths + -1 | 0;
  var G_ = 0;
  if (! (H_ < 0)) {
    i__0 = G_;
    for (; ; ) {
      N_ = get_method_label(table, caml_check_bound(meths__0, i__0)[i__0 + 1]);
      caml_check_bound(res, i__0)[i__0 + 1] = N_;
      O_ = i__0 + 1 | 0;
      if (H_ !== i__0) {i__0 = O_;continue;}
      break;
    }
  }
  var J_ = nvals + -1 | 0;
  var I_ = 0;
  if (! (J_ < 0)) {
    i = I_;
    for (; ; ) {
      L_ = i + nmeths | 0;
      K_ = new_variable(table, caml_check_bound(vals, i)[i + 1]);
      caml_check_bound(res, L_)[L_ + 1] = K_;
      M_ = i + 1 | 0;
      if (J_ !== i) {i = M_;continue;}
      break;
    }
  }
  return res;
}

function get_variable(table, name) {
  var E_;
  try {E_ = call2(Vars[27], name, table[7]);return E_;}
  catch(F_) {
    F_ = runtime["caml_wrap_exception"](F_);
    if (F_ === Not_found) {
      throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
    }
    throw caml_wrap_thrown_exception_reraise(F_);
  }
}

function get_variables(table, names) {
  function C_(D_) {return get_variable(table, D_);}
  return call2(Array[15], C_, names);
}

function add_initializer(table, f) {table[8] = [0,f,table[8]];return 0;}

function create_table(public_methods) {
  if (public_methods === 0) {return new_table([0]);}
  var tags = call2(Array[15], public_method_label, public_methods);
  var table = new_table(tags);
  function B_(i, met) {
    var lab = (i * 2 | 0) + 2 | 0;
    table[3] = call3(Meths[4], met, lab, table[3]);
    table[4] = call3(Labs[4], lab, 1, table[4]);
    return 0;
  }
  call2(Array[14], B_, public_methods);
  return table;
}

function init_class(table) {
  inst_var_count[1] = (inst_var_count[1] + table[1] | 0) + -1 | 0;
  table[8] = call1(List[9], table[8]);
  var A_ = Sys[10];
  return resize(
    table,
    3 + caml_div(caml_check_bound(table[2], 1)[2] * 16 | 0, A_) | 0
  );
}

function inherits(cla, vals, virt_meths, concr_meths, param, top) {
  var env = param[4];
  var super__0 = param[2];
  narrow(cla, vals, virt_meths, concr_meths);
  var init = top ? call2(super__0, cla, env) : call1(super__0, cla);
  widen(cla);
  var s_ = 0;
  var t_ = to_array(concr_meths);
  function u_(nm) {return get_method(cla, get_method_label(cla, nm));}
  var v_ = [0,call2(Array[15], u_, t_),s_];
  var w_ = to_array(vals);
  function x_(z_) {return get_variable(cla, z_);}
  var y_ = [0,[0,init],[0,call2(Array[15], x_, w_),v_]];
  return call1(Array[6], y_);
}

function make_class(pub_meths, class_init) {
  var table = create_table(pub_meths);
  var env_init = call1(class_init, table);
  init_class(table);
  return [0,call1(env_init, 0),class_init,env_init,0];
}

function make_class_store(pub_meths, class_init, init_table) {
  var table = create_table(pub_meths);
  var env_init = call1(class_init, table);
  init_class(table);
  init_table[2] = class_init;
  init_table[1] = env_init;
  return 0;
}

function dummy_class(loc) {
  function undef(param) {
    throw caml_wrap_thrown_exception([0,Undefined_recursive_module,loc]);
  }
  return [0,undef,undef,undef,0];
}

function create_object(table) {
  var obj = caml_obj_block(Obj[8], table[1]);
  obj[1] = table[2];
  return caml_set_oo_id(obj);
}

function create_object_opt(obj_0, table) {
  if (obj_0) {return obj_0;}
  var obj = caml_obj_block(Obj[8], table[1]);
  obj[1] = table[2];
  return caml_set_oo_id(obj);
}

function iter_f(obj, param) {
  var param__1;
  var f;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      param__1 = param__0[2];
      f = param__0[1];
      call1(f, obj);
      param__0 = param__1;
      continue;
    }
    return 0;
  }
}

function run_initializers(obj, table) {
  var inits = table[8];
  var r_ = 0 !== inits ? 1 : 0;
  return r_ ? iter_f(obj, inits) : r_;
}

function run_initializers_opt(obj_0, obj, table) {
  if (obj_0) {return obj;}
  var inits = table[8];
  if (0 !== inits) {iter_f(obj, inits);}
  return obj;
}

function create_object_and_run_initializers(obj_0, table) {
  if (obj_0) {return obj_0;}
  var obj = create_object(table);
  run_initializers(obj, table);
  return obj;
}

function set_data(tables, v) {
  if (tables) {tables[2] = v;return 0;}
  throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
}

function set_next(tables, v) {
  if (tables) {tables[3] = v;return 0;}
  throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
}

function get_key(param) {
  if (param) {return param[1];}
  throw caml_wrap_thrown_exception([0,Assert_failure,d_]);
}

function get_data(param) {
  if (param) {return param[2];}
  throw caml_wrap_thrown_exception([0,Assert_failure,e_]);
}

function get_next(param) {
  if (param) {return param[3];}
  throw caml_wrap_thrown_exception([0,Assert_failure,f_]);
}

function build_path(n, keys, tables) {
  var i;
  var p_;
  var q_;
  var res = [0,0,0,0];
  var r = [0,res];
  var o_ = 0;
  if (! (n < 0)) {
    i = o_;
    for (; ; ) {
      p_ = r[1];
      r[1] = [0,caml_check_bound(keys, i)[i + 1],p_,0];
      q_ = i + 1 | 0;
      if (n !== i) {i = q_;continue;}
      break;
    }
  }
  set_data(tables, r[1]);
  return res;
}

function lookup_keys(i, keys, tables) {
  var lookup_key;
  var key;
  if (0 <= i) {
    key = caml_check_bound(keys, i)[i + 1];
    lookup_key =
      function(tables) {
        var tables_data;
        var next;
        var next__0;
        var tables__0 = tables;
        for (; ; ) {
          if (get_key(tables__0) === key) {
            tables_data = get_data(tables__0);
            if (tables_data) {
              return lookup_keys(i + -1 | 0, keys, tables_data);
            }
            throw caml_wrap_thrown_exception([0,Assert_failure,g_]);
          }
          next = get_next(tables__0);
          if (next) {tables__0 = next;continue;}
          next__0 = [0,key,0,0];
          set_next(tables__0, next__0);
          return build_path(i + -1 | 0, keys, next__0);
        }
      };
    return lookup_key(tables);
  }
  return tables;
}

function lookup_tables(root, keys) {
  var root_data = get_data(root);
  return root_data ?
    lookup_keys(keys.length - 1 + -1 | 0, keys, root_data) :
    build_path(keys.length - 1 + -1 | 0, keys, root);
}

function get_const(x) {return function(obj) {return x;};}

function get_var(n) {return function(obj) {return obj[n + 1];};}

function get_env(e, n) {return function(obj) {return obj[e + 1][n + 1];};}

function get_meth(n) {
  return function(obj) {return call1(obj[1][n + 1], obj);};
}

function set_var(n) {return function(obj, x) {obj[n + 1] = x;return 0;};}

function app_const(f, x) {return function(obj) {return call1(f, x);};}

function app_var(f, n) {return function(obj) {return call1(f, obj[n + 1]);};}

function app_env(f, e, n) {
  return function(obj) {return call1(f, obj[e + 1][n + 1]);};
}

function app_meth(f, n) {
  return function(obj) {return call1(f, call1(obj[1][n + 1], obj));};
}

function app_const_const(f, x, y) {
  return function(obj) {return call2(f, x, y);};
}

function app_const_var(f, x, n) {
  return function(obj) {return call2(f, x, obj[n + 1]);};
}

function app_const_meth(f, x, n) {
  return function(obj) {return call2(f, x, call1(obj[1][n + 1], obj));};
}

function app_var_const(f, n, x) {
  return function(obj) {return call2(f, obj[n + 1], x);};
}

function app_meth_const(f, n, x) {
  return function(obj) {return call2(f, call1(obj[1][n + 1], obj), x);};
}

function app_const_env(f, x, e, n) {
  return function(obj) {return call2(f, x, obj[e + 1][n + 1]);};
}

function app_env_const(f, e, n, x) {
  return function(obj) {return call2(f, obj[e + 1][n + 1], x);};
}

function meth_app_const(n, x) {
  return function(obj) {return call2(obj[1][n + 1], obj, x);};
}

function meth_app_var(n, m) {
  return function(obj) {return call2(obj[1][n + 1], obj, obj[m + 1]);};
}

function meth_app_env(n, e, m) {
  return function(obj) {return call2(obj[1][n + 1], obj, obj[e + 1][m + 1]);};
}

function meth_app_meth(n, m) {
  return function(obj) {
    var n_ = call1(obj[1][m + 1], obj);
    return call2(obj[1][n + 1], obj, n_);
  };
}

function send_const(m, x, c) {
  return function(obj) {return call1(caml_get_public_method(x, m, 0), x);};
}

function send_var(m, n, c) {
  return function(obj) {
    var m_ = obj[n + 1];
    return call1(caml_get_public_method(m_, m, 0), m_);
  };
}

function send_env(m, e, n, c) {
  return function(obj) {
    var l_ = obj[e + 1][n + 1];
    return call1(caml_get_public_method(l_, m, 0), l_);
  };
}

function send_meth(m, n, c) {
  return function(obj) {
    var k_ = call1(obj[1][n + 1], obj);
    return call1(caml_get_public_method(k_, m, 0), k_);
  };
}

function new_cache(table) {
  var n__0;
  var j_;
  var switch__0;
  var n = new_method(table);
  if (0 === (n % 2 | 0)) switch__0 = 0;
  else {
    j_ = Sys[10];
    if ((2 + caml_div(caml_check_bound(table[2], 1)[2] * 16 | 0, j_) | 0) < n
    ) switch__0 = 0;
    else {n__0 = new_method(table);switch__0 = 1;}
  }
  if (! switch__0) {n__0 = n;}
  caml_check_bound(table[2], n__0)[n__0 + 1] = 0;
  return n__0;
}

function method_impl(table, i, arr) {
  var x;
  var n;
  var e;
  var n__0;
  var n__1;
  var n__2;
  var f;
  var x__0;
  var f__0;
  var n__3;
  var f__1;
  var e__0;
  var n__4;
  var f__2;
  var n__5;
  var f__3;
  var x__1;
  var y;
  var f__4;
  var x__2;
  var n__6;
  var f__5;
  var x__3;
  var e__1;
  var n__7;
  var f__6;
  var x__4;
  var n__8;
  var f__7;
  var n__9;
  var x__5;
  var f__8;
  var e__2;
  var n__10;
  var x__6;
  var f__9;
  var n__11;
  var x__7;
  var n__12;
  var x__8;
  var n__13;
  var m;
  var n__14;
  var e__3;
  var m__0;
  var n__15;
  var m__1;
  var m__2;
  var x__9;
  var m__3;
  var n__16;
  var m__4;
  var e__4;
  var n__17;
  var m__5;
  var n__18;
  function next(param) {
    i[1] += 1;
    var i_ = i[1];
    return caml_check_bound(arr, i_)[i_ + 1];
  }
  var clo = next(0);
  if (typeof clo === "number") {
    switch (clo) {
      case 0:
        x = next(0);
        return get_const(x);
      case 1:
        n = next(0);
        return get_var(n);
      case 2:
        e = next(0);
        n__0 = next(0);
        return get_env(e, n__0);
      case 3:
        n__1 = next(0);
        return get_meth(n__1);
      case 4:
        n__2 = next(0);
        return set_var(n__2);
      case 5:
        f = next(0);
        x__0 = next(0);
        return app_const(f, x__0);
      case 6:
        f__0 = next(0);
        n__3 = next(0);
        return app_var(f__0, n__3);
      case 7:
        f__1 = next(0);
        e__0 = next(0);
        n__4 = next(0);
        return app_env(f__1, e__0, n__4);
      case 8:
        f__2 = next(0);
        n__5 = next(0);
        return app_meth(f__2, n__5);
      case 9:
        f__3 = next(0);
        x__1 = next(0);
        y = next(0);
        return app_const_const(f__3, x__1, y);
      case 10:
        f__4 = next(0);
        x__2 = next(0);
        n__6 = next(0);
        return app_const_var(f__4, x__2, n__6);
      case 11:
        f__5 = next(0);
        x__3 = next(0);
        e__1 = next(0);
        n__7 = next(0);
        return app_const_env(f__5, x__3, e__1, n__7);
      case 12:
        f__6 = next(0);
        x__4 = next(0);
        n__8 = next(0);
        return app_const_meth(f__6, x__4, n__8);
      case 13:
        f__7 = next(0);
        n__9 = next(0);
        x__5 = next(0);
        return app_var_const(f__7, n__9, x__5);
      case 14:
        f__8 = next(0);
        e__2 = next(0);
        n__10 = next(0);
        x__6 = next(0);
        return app_env_const(f__8, e__2, n__10, x__6);
      case 15:
        f__9 = next(0);
        n__11 = next(0);
        x__7 = next(0);
        return app_meth_const(f__9, n__11, x__7);
      case 16:
        n__12 = next(0);
        x__8 = next(0);
        return meth_app_const(n__12, x__8);
      case 17:
        n__13 = next(0);
        m = next(0);
        return meth_app_var(n__13, m);
      case 18:
        n__14 = next(0);
        e__3 = next(0);
        m__0 = next(0);
        return meth_app_env(n__14, e__3, m__0);
      case 19:
        n__15 = next(0);
        m__1 = next(0);
        return meth_app_meth(n__15, m__1);
      case 20:
        m__2 = next(0);
        x__9 = next(0);
        return send_const(m__2, x__9, new_cache(table));
      case 21:
        m__3 = next(0);
        n__16 = next(0);
        return send_var(m__3, n__16, new_cache(table));
      case 22:
        m__4 = next(0);
        e__4 = next(0);
        n__17 = next(0);
        return send_env(m__4, e__4, n__17, new_cache(table));
      default:
        m__5 = next(0);
        n__18 = next(0);
        return send_meth(m__5, n__18, new_cache(table))
      }
  }
  return clo;
}

function set_methods(table, methods) {
  var h_;
  var label;
  var clo;
  var len = methods.length - 1;
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      h_ = i[1];
      label = caml_check_bound(methods, h_)[h_ + 1];
      clo = method_impl(table, i, methods);
      set_method(table, label, clo);
      i[1] += 1;
      continue;
    }
    return 0;
  }
}

function stats(param) {
  return [0,table_count[1],method_count[1],inst_var_count[1]];
}

var CamlinternalOO = [
  0,
  public_method_label,
  new_method,
  new_variable,
  new_methods_variables,
  get_variable,
  get_variables,
  get_method_label,
  get_method_labels,
  get_method,
  set_method,
  set_methods,
  narrow,
  widen,
  add_initializer,
  dummy_table,
  create_table,
  init_class,
  inherits,
  make_class,
  make_class_store,
  dummy_class,
  copy,
  create_object,
  create_object_opt,
  run_initializers,
  run_initializers_opt,
  create_object_and_run_initializers,
  lookup_tables,
  params,
  stats
];

module.exports = CamlinternalOO;

/*::type Exports = {
  public_method_label: (s: any) => any,
  new_method: (table: any) => any,
  new_variable: (table: any, name: any) => any,
  new_methods_variables: (table: any, meths: any, vals: any) => any,
  get_variable: (table: any, name: any) => any,
  get_variables: (table: any, names: any) => any,
  get_method_label: (table: any, name: any) => any,
  get_method_labels: (table: any, names: any) => any,
  get_method: (table: any, label: any) => any,
  set_method: (table: any, label: any, element: any) => any,
  set_methods: (table: any, methods: any) => any,
  narrow: (table: any, vars: any, virt_meths: any, concr_meths: any) => any,
  widen: (table: any) => any,
  add_initializer: (table: any, f: any) => any,
  dummy_table: any,
  create_table: (public_methods: any) => any,
  init_class: (table: any) => any,
  inherits: (cla: any, vals: any, virt_meths: any, concr_meths: any, param: any, top: any) => any,
  make_class: (pub_meths: any, class_init: any) => any,
  make_class_store: (pub_meths: any, class_init: any, init_table: any) => any,
  dummy_class: (loc: any) => any,
  copy: (o: any) => any,
  create_object: (table: any) => any,
  create_object_opt: (obj_0: any, table: any) => any,
  run_initializers: (obj: any, table: any) => any,
  run_initializers_opt: (obj_0: any, obj: any, table: any) => any,
  create_object_and_run_initializers: (obj_0: any, table: any) => any,
  lookup_tables: (root: any, keys: any) => any,
  params: any,
  stats: (param: any) => any,
}*/
/** @type {{
  public_method_label: (s: any) => any,
  new_method: (table: any) => any,
  new_variable: (table: any, name: any) => any,
  new_methods_variables: (table: any, meths: any, vals: any) => any,
  get_variable: (table: any, name: any) => any,
  get_variables: (table: any, names: any) => any,
  get_method_label: (table: any, name: any) => any,
  get_method_labels: (table: any, names: any) => any,
  get_method: (table: any, label: any) => any,
  set_method: (table: any, label: any, element: any) => any,
  set_methods: (table: any, methods: any) => any,
  narrow: (table: any, vars: any, virt_meths: any, concr_meths: any) => any,
  widen: (table: any) => any,
  add_initializer: (table: any, f: any) => any,
  dummy_table: any,
  create_table: (public_methods: any) => any,
  init_class: (table: any) => any,
  inherits: (cla: any, vals: any, virt_meths: any, concr_meths: any, param: any, top: any) => any,
  make_class: (pub_meths: any, class_init: any) => any,
  make_class_store: (pub_meths: any, class_init: any, init_table: any) => any,
  dummy_class: (loc: any) => any,
  copy: (o: any) => any,
  create_object: (table: any) => any,
  create_object_opt: (obj_0: any, table: any) => any,
  run_initializers: (obj: any, table: any) => any,
  run_initializers_opt: (obj_0: any, obj: any, table: any) => any,
  create_object_and_run_initializers: (obj_0: any, table: any) => any,
  lookup_tables: (root: any, keys: any) => any,
  params: any,
  stats: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.public_method_label = module.exports[1];
module.exports.new_method = module.exports[2];
module.exports.new_variable = module.exports[3];
module.exports.new_methods_variables = module.exports[4];
module.exports.get_variable = module.exports[5];
module.exports.get_variables = module.exports[6];
module.exports.get_method_label = module.exports[7];
module.exports.get_method_labels = module.exports[8];
module.exports.get_method = module.exports[9];
module.exports.set_method = module.exports[10];
module.exports.set_methods = module.exports[11];
module.exports.narrow = module.exports[12];
module.exports.widen = module.exports[13];
module.exports.add_initializer = module.exports[14];
module.exports.dummy_table = module.exports[15];
module.exports.create_table = module.exports[16];
module.exports.init_class = module.exports[17];
module.exports.inherits = module.exports[18];
module.exports.make_class = module.exports[19];
module.exports.make_class_store = module.exports[20];
module.exports.dummy_class = module.exports[21];
module.exports.copy = module.exports[22];
module.exports.create_object = module.exports[23];
module.exports.create_object_opt = module.exports[24];
module.exports.run_initializers = module.exports[25];
module.exports.run_initializers_opt = module.exports[26];
module.exports.create_object_and_run_initializers = module.exports[27];
module.exports.lookup_tables = module.exports[28];
module.exports.params = module.exports[29];
module.exports.stats = module.exports[30];

/* Hashing disabled */
