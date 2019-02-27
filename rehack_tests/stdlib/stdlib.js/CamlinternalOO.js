/**
 * CamlinternalOO
 * @providesModule CamlinternalOO
 */
"use strict";
var Array_ = require('Array_.js');
var List_ = require('List_.js');
var Map = require('Map.js');
var Obj = require('Obj.js');
var Sys = require('Sys.js');
var Not_found = require('Not_found.js');
var Assert_failure = require('Assert_failure.js');
var Undefined_recursive_module = require('Undefined_recursive_module.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_div = runtime["caml_div"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_new_string = runtime["caml_new_string"];
var caml_obj_block = runtime["caml_obj_block"];
var caml_set_oo_id = runtime["caml_set_oo_id"];
var caml_string_compare = runtime["caml_string_compare"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call5(f, a0, a1, a2, a3, a4) {
  return f.length == 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst = caml_new_string("");
var Assert_failure = global_data["Assert_failure"];
var Sys = global_data["Sys"];
var Obj = global_data["Obj"];
var Undefined_recursive_module = global_data["Undefined_recursive_module"];
var Array = global_data["Array_"];
var List = global_data["List_"];
var Not_found = global_data["Not_found"];
var Map = global_data["Map"];
var yk = [0,caml_new_string("camlinternalOO.ml"),438,17];
var yj = [0,caml_new_string("camlinternalOO.ml"),420,13];
var yi = [0,caml_new_string("camlinternalOO.ml"),417,13];
var yh = [0,caml_new_string("camlinternalOO.ml"),414,13];
var yg = [0,caml_new_string("camlinternalOO.ml"),411,13];
var yf = [0,caml_new_string("camlinternalOO.ml"),408,13];
var ye = [0,caml_new_string("camlinternalOO.ml"),281,50];

function copy(o) {var o__0 = o.slice();return caml_set_oo_id(o__0);}

var params = [0,1,1,1,3,16];
var initial_object_size = 2;
var dummy_item = 0;

function public_method_label(s) {
  var accu = [0,0];
  var zv = runtime["caml_ml_string_length"](s) + -1 | 0;
  var zu = 0;
  if (! (zv < 0)) {
    var i = zu;
    for (; ; ) {
      var zw = runtime["caml_string_get"](s, i);
      accu[1] = (223 * accu[1] | 0) + zw | 0;
      var zx = i + 1 | 0;
      if (zv !== i) {var i = zx;continue;}
      break;
    }
  }
  accu[1] = accu[1] & 2147483647;
  var tag = 1073741823 < accu[1] ? accu[1] + 2147483648 | 0 : accu[1];
  return tag;
}

function compare(x, y) {return caml_string_compare(x, y);}

var Vars = caml_call1(Map[1], [0,compare]);

function compare__0(x, y) {return caml_string_compare(x, y);}

var Meths = caml_call1(Map[1], [0,compare__0]);

function compare__1(x, y) {return runtime["caml_int_compare"](x, y);}

var Labs = caml_call1(Map[1], [0,compare__1]);
var dummy_table = [0,0,[0,dummy_item],Meths[1],Labs[1],0,0,Vars[1],0];
var table_count = [0,0];
var dummy_met = caml_obj_block(0, 0);

function fit_size(n) {
  return 2 < n ? fit_size((n + 1 | 0) / 2 | 0) * 2 | 0 : n;
}

function new_table(pub_labels) {
  table_count[1] += 1;
  var len = pub_labels.length - 1;
  var methods = caml_make_vect((len * 2 | 0) + 2 | 0, dummy_met);
  caml_check_bound(methods, 0)[1] = len;
  var zn = Sys[10];
  var zo = (runtime["caml_mul"](fit_size(len), zn) / 8 | 0) + -1 | 0;
  caml_check_bound(methods, 1)[2] = zo;
  var zq = len + -1 | 0;
  var zp = 0;
  if (! (zq < 0)) {
    var i = zp;
    for (; ; ) {
      var zs = (i * 2 | 0) + 3 | 0;
      var zr = caml_check_bound(pub_labels, i)[i + 1];
      caml_check_bound(methods, zs)[zs + 1] = zr;
      var zt = i + 1 | 0;
      if (zq !== i) {var i = zt;continue;}
      break;
    }
  }
  return [0,initial_object_size,methods,Meths[1],Labs[1],0,0,Vars[1],0];
}

function resize(array, new_size) {
  var old_size = array[2].length - 1;
  var zl = old_size < new_size ? 1 : 0;
  if (zl) {
    var new_buck = caml_make_vect(new_size, dummy_met);
    caml_call5(Array[10], array[2], 0, new_buck, 0, old_size);
    array[2] = new_buck;
    var zm = 0;
  }
  else var zm = zl;
  return zm;
}

function put(array, label, element) {
  resize(array, label + 1 | 0);
  return caml_check_bound(array[2], label)[label + 1] = element;
}

var method_count = [0,0];
var inst_var_count = [0,0];

function new_method(table) {
  var index = table[2].length - 1;
  resize(table, index + 1 | 0);
  return index;
}

function get_method_label(table, name) {
  try {var zj = caml_call2(Meths[27], name, table[3]);return zj;}
  catch(zk) {
    zk = caml_wrap_exception(zk);
    if (zk === Not_found) {
      var label = new_method(table);
      table[3] = caml_call3(Meths[4], name, label, table[3]);
      table[4] = caml_call3(Labs[4], label, 1, table[4]);
      return label;
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](zk);
  }
}

function get_method_labels(table, names) {
  function zh(zi) {return get_method_label(table, zi);}
  return caml_call2(Array[15], zh, names);
}

function set_method(table, label, element) {
  method_count[1] += 1;
  return caml_call2(Labs[27], label, table[4]) ?
    put(table, label, element) :
    (table[6] = [0,[0,label,element],table[6]],0);
}

function get_method(table, label) {
  try {var zf = caml_call2(List[38], label, table[6]);return zf;}
  catch(zg) {
    zg = caml_wrap_exception(zg);
    if (zg === Not_found) {
      return caml_check_bound(table[2], label)[label + 1];
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](zg);
  }
}

function to_list(arr) {return arr === 0 ? 0 : caml_call1(Array[11], arr);}

function narrow(table, vars, virt_meths, concr_meths) {
  var vars__0 = to_list(vars);
  var virt_meths__0 = to_list(virt_meths);
  var concr_meths__0 = to_list(concr_meths);
  function yZ(ze) {return get_method_label(table, ze);}
  var virt_meth_labs = caml_call2(List[17], yZ, virt_meths__0);
  function y0(zd) {return get_method_label(table, zd);}
  var concr_meth_labs = caml_call2(List[17], y0, concr_meths__0);
  table[5] =
    [0,[0,table[3],table[4],table[6],table[7],virt_meth_labs,vars__0],table[5]
    ];
  var y1 = Vars[1];
  var y2 = table[7];
  function y3(lab, info, tvars) {
    return caml_call2(List[31], lab, vars__0) ?
      caml_call3(Vars[4], lab, info, tvars) :
      tvars;
  }
  table[7] = caml_call3(Vars[13], y3, y2, y1);
  var by_name = [0,Meths[1]];
  var by_label = [0,Labs[1]];
  function y4(met, label) {
    by_name[1] = caml_call3(Meths[4], met, label, by_name[1]);
    var y9 = by_label[1];
    try {var zb = caml_call2(Labs[27], label, table[4]);var za = zb;}
    catch(zc) {
      zc = caml_wrap_exception(zc);
      if (zc !== Not_found) {
        throw runtime["caml_wrap_thrown_exception_reraise"](zc);
      }
      var y_ = 1;
      var za = y_;
    }
    by_label[1] = caml_call3(Labs[4], label, za, y9);
    return 0;
  }
  caml_call3(List[22], y4, concr_meths__0, concr_meth_labs);
  function y5(met, label) {
    by_name[1] = caml_call3(Meths[4], met, label, by_name[1]);
    by_label[1] = caml_call3(Labs[4], label, 0, by_label[1]);
    return 0;
  }
  caml_call3(List[22], y5, virt_meths__0, virt_meth_labs);
  table[3] = by_name[1];
  table[4] = by_label[1];
  var y6 = 0;
  var y7 = table[6];
  function y8(met, hm) {
    var lab = met[1];
    return caml_call2(List[31], lab, virt_meth_labs) ? hm : [0,met,hm];
  }
  table[6] = caml_call3(List[21], y8, y7, y6);
  return 0;
}

function widen(table) {
  var match = caml_call1(List[5], table[5]);
  var vars = match[6];
  var virt_meths = match[5];
  var saved_vars = match[4];
  var saved_hidden_meths = match[3];
  var by_label = match[2];
  var by_name = match[1];
  table[5] = caml_call1(List[6], table[5]);
  function yV(s, v) {
    var yY = caml_call2(Vars[27], v, table[7]);
    return caml_call3(Vars[4], v, yY, s);
  }
  table[7] = caml_call3(List[20], yV, saved_vars, vars);
  table[3] = by_name;
  table[4] = by_label;
  var yW = table[6];
  function yX(met, hm) {
    var lab = met[1];
    return caml_call2(List[31], lab, virt_meths) ? hm : [0,met,hm];
  }
  table[6] = caml_call3(List[21], yX, yW, saved_hidden_meths);
  return 0;
}

function new_slot(table) {
  var index = table[1];
  table[1] = index + 1 | 0;
  return index;
}

function new_variable(table, name) {
  try {var yT = caml_call2(Vars[27], name, table[7]);return yT;}
  catch(yU) {
    yU = caml_wrap_exception(yU);
    if (yU === Not_found) {
      var index = new_slot(table);
      if (runtime["caml_string_notequal"](name, cst)) {
        table[7] = caml_call3(Vars[4], name, index, table[7]);
      }
      return index;
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](yU);
  }
}

function to_array(arr) {return runtime["caml_equal"](arr, 0) ? [0] : arr;}

function new_methods_variables(table, meths, vals) {
  var meths__0 = to_array(meths);
  var nmeths = meths__0.length - 1;
  var nvals = vals.length - 1;
  var res = caml_make_vect(nmeths + nvals | 0, 0);
  var yL = nmeths + -1 | 0;
  var yK = 0;
  if (! (yL < 0)) {
    var i__0 = yK;
    for (; ; ) {
      var yR = get_method_label(
        table,
        caml_check_bound(meths__0, i__0)[i__0 + 1]
      );
      caml_check_bound(res, i__0)[i__0 + 1] = yR;
      var yS = i__0 + 1 | 0;
      if (yL !== i__0) {var i__0 = yS;continue;}
      break;
    }
  }
  var yN = nvals + -1 | 0;
  var yM = 0;
  if (! (yN < 0)) {
    var i = yM;
    for (; ; ) {
      var yP = i + nmeths | 0;
      var yO = new_variable(table, caml_check_bound(vals, i)[i + 1]);
      caml_check_bound(res, yP)[yP + 1] = yO;
      var yQ = i + 1 | 0;
      if (yN !== i) {var i = yQ;continue;}
      break;
    }
  }
  return res;
}

function get_variable(table, name) {
  try {var yI = caml_call2(Vars[27], name, table[7]);return yI;}
  catch(yJ) {
    yJ = caml_wrap_exception(yJ);
    if (yJ === Not_found) {
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,ye]);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](yJ);
  }
}

function get_variables(table, names) {
  function yG(yH) {return get_variable(table, yH);}
  return caml_call2(Array[15], yG, names);
}

function add_initializer(table, f) {table[8] = [0,f,table[8]];return 0;}

function create_table(public_methods) {
  if (public_methods === 0) {return new_table([0]);}
  var tags = caml_call2(Array[15], public_method_label, public_methods);
  var table = new_table(tags);
  function yF(i, met) {
    var lab = (i * 2 | 0) + 2 | 0;
    table[3] = caml_call3(Meths[4], met, lab, table[3]);
    table[4] = caml_call3(Labs[4], lab, 1, table[4]);
    return 0;
  }
  caml_call2(Array[14], yF, public_methods);
  return table;
}

function init_class(table) {
  inst_var_count[1] = (inst_var_count[1] + table[1] | 0) + -1 | 0;
  table[8] = caml_call1(List[9], table[8]);
  var yE = Sys[10];
  return resize(
    table,
    3 + caml_div(caml_check_bound(table[2], 1)[2] * 16 | 0, yE) | 0
  );
}

function inherits(cla, vals, virt_meths, concr_meths, param, top) {
  var env = param[4];
  var super__0 = param[2];
  narrow(cla, vals, virt_meths, concr_meths);
  var init = top ? caml_call2(super__0, cla, env) : caml_call1(super__0, cla);
  widen(cla);
  var yw = 0;
  var yx = to_array(concr_meths);
  function yy(nm) {return get_method(cla, get_method_label(cla, nm));}
  var yz = [0,caml_call2(Array[15], yy, yx),yw];
  var yA = to_array(vals);
  function yB(yD) {return get_variable(cla, yD);}
  var yC = [0,[0,init],[0,caml_call2(Array[15], yB, yA),yz]];
  return caml_call1(Array[6], yC);
}

function make_class(pub_meths, class_init) {
  var table = create_table(pub_meths);
  var env_init = caml_call1(class_init, table);
  init_class(table);
  return [0,caml_call1(env_init, 0),class_init,env_init,0];
}

function make_class_store(pub_meths, class_init, init_table) {
  var table = create_table(pub_meths);
  var env_init = caml_call1(class_init, table);
  init_class(table);
  init_table[2] = class_init;
  init_table[1] = env_init;
  return 0;
}

function dummy_class(loc) {
  function undef(param) {
    throw runtime["caml_wrap_thrown_exception"]([0,Undefined_recursive_module,loc]
          );
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
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var f = param__0[1];
      caml_call1(f, obj);
      var param__0 = param__1;
      continue;
    }
    return 0;
  }
}

function run_initializers(obj, table) {
  var inits = table[8];
  var yv = 0 !== inits ? 1 : 0;
  return yv ? iter_f(obj, inits) : yv;
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
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yf]);
}

function set_next(tables, v) {
  if (tables) {tables[3] = v;return 0;}
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yg]);
}

function get_key(param) {
  if (param) {return param[1];}
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yh]);
}

function get_data(param) {
  if (param) {return param[2];}
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yi]);
}

function get_next(param) {
  if (param) {return param[3];}
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yj]);
}

function build_path(n, keys, tables) {
  var res = [0,0,0,0];
  var r = [0,res];
  var ys = 0;
  if (! (n < 0)) {
    var i = ys;
    for (; ; ) {
      var yt = r[1];
      r[1] = [0,caml_check_bound(keys, i)[i + 1],yt,0];
      var yu = i + 1 | 0;
      if (n !== i) {var i = yu;continue;}
      break;
    }
  }
  set_data(tables, r[1]);
  return res;
}

function lookup_keys(i, keys, tables) {
  if (0 <= i) {
    var key = caml_check_bound(keys, i)[i + 1];
    var lookup_key = function(tables) {
      var tables__0 = tables;
      for (; ; ) {
        if (get_key(tables__0) === key) {
          var tables_data = get_data(tables__0);
          if (tables_data) {
            return lookup_keys(i + -1 | 0, keys, tables_data);
          }
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,yk]);
        }
        var next = get_next(tables__0);
        if (next) {var tables__0 = next;continue;}
        var next__0 = [0,key,0,0];
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
  return function(obj) {return caml_call1(obj[1][n + 1], obj);};
}

function set_var(n) {return function(obj, x) {obj[n + 1] = x;return 0;};}

function app_const(f, x) {return function(obj) {return caml_call1(f, x);};}

function app_var(f, n) {
  return function(obj) {return caml_call1(f, obj[n + 1]);};
}

function app_env(f, e, n) {
  return function(obj) {return caml_call1(f, obj[e + 1][n + 1]);};
}

function app_meth(f, n) {
  return function(obj) {
    return caml_call1(f, caml_call1(obj[1][n + 1], obj));
  };
}

function app_const_const(f, x, y) {
  return function(obj) {return caml_call2(f, x, y);};
}

function app_const_var(f, x, n) {
  return function(obj) {return caml_call2(f, x, obj[n + 1]);};
}

function app_const_meth(f, x, n) {
  return function(obj) {
    return caml_call2(f, x, caml_call1(obj[1][n + 1], obj));
  };
}

function app_var_const(f, n, x) {
  return function(obj) {return caml_call2(f, obj[n + 1], x);};
}

function app_meth_const(f, n, x) {
  return function(obj) {
    return caml_call2(f, caml_call1(obj[1][n + 1], obj), x);
  };
}

function app_const_env(f, x, e, n) {
  return function(obj) {return caml_call2(f, x, obj[e + 1][n + 1]);};
}

function app_env_const(f, e, n, x) {
  return function(obj) {return caml_call2(f, obj[e + 1][n + 1], x);};
}

function meth_app_const(n, x) {
  return function(obj) {return caml_call2(obj[1][n + 1], obj, x);};
}

function meth_app_var(n, m) {
  return function(obj) {return caml_call2(obj[1][n + 1], obj, obj[m + 1]);};
}

function meth_app_env(n, e, m) {
  return function(obj) {
    return caml_call2(obj[1][n + 1], obj, obj[e + 1][m + 1]);
  };
}

function meth_app_meth(n, m) {
  return function(obj) {
    var yr = caml_call1(obj[1][m + 1], obj);
    return caml_call2(obj[1][n + 1], obj, yr);
  };
}

function send_const(m, x, c) {
  return function(obj) {
    return caml_call1(caml_get_public_method(x, m, 0), x);
  };
}

function send_var(m, n, c) {
  return function(obj) {
    var yq = obj[n + 1];
    return caml_call1(caml_get_public_method(yq, m, 0), yq);
  };
}

function send_env(m, e, n, c) {
  return function(obj) {
    var yp = obj[e + 1][n + 1];
    return caml_call1(caml_get_public_method(yp, m, 0), yp);
  };
}

function send_meth(m, n, c) {
  return function(obj) {
    var yo = caml_call1(obj[1][n + 1], obj);
    return caml_call1(caml_get_public_method(yo, m, 0), yo);
  };
}

function new_cache(table) {
  var n = new_method(table);
  if (0 === (n % 2 | 0)) var switch__0 = 0;
  else {
    var yn = Sys[10];
    if ((2 + caml_div(caml_check_bound(table[2], 1)[2] * 16 | 0, yn) | 0) < n
    ) var switch__0 = 0;
    else {var n__0 = new_method(table);var switch__0 = 1;}
  }
  if (! switch__0) {var n__0 = n;}
  caml_check_bound(table[2], n__0)[n__0 + 1] = 0;
  return n__0;
}

function method_impl(table, i, arr) {
  function next(param) {
    i[1] += 1;
    var ym = i[1];
    return caml_check_bound(arr, ym)[ym + 1];
  }
  var clo = next(0);
  if (typeof clo === "number") {
    switch (clo) {
      case 0:
        var x = next(0);
        return get_const(x);
      case 1:
        var n = next(0);
        return get_var(n);
      case 2:
        var e = next(0);
        var n__0 = next(0);
        return get_env(e, n__0);
      case 3:
        var n__1 = next(0);
        return get_meth(n__1);
      case 4:
        var n__2 = next(0);
        return set_var(n__2);
      case 5:
        var f = next(0);
        var x__0 = next(0);
        return app_const(f, x__0);
      case 6:
        var f__0 = next(0);
        var n__3 = next(0);
        return app_var(f__0, n__3);
      case 7:
        var f__1 = next(0);
        var e__0 = next(0);
        var n__4 = next(0);
        return app_env(f__1, e__0, n__4);
      case 8:
        var f__2 = next(0);
        var n__5 = next(0);
        return app_meth(f__2, n__5);
      case 9:
        var f__3 = next(0);
        var x__1 = next(0);
        var y = next(0);
        return app_const_const(f__3, x__1, y);
      case 10:
        var f__4 = next(0);
        var x__2 = next(0);
        var n__6 = next(0);
        return app_const_var(f__4, x__2, n__6);
      case 11:
        var f__5 = next(0);
        var x__3 = next(0);
        var e__1 = next(0);
        var n__7 = next(0);
        return app_const_env(f__5, x__3, e__1, n__7);
      case 12:
        var f__6 = next(0);
        var x__4 = next(0);
        var n__8 = next(0);
        return app_const_meth(f__6, x__4, n__8);
      case 13:
        var f__7 = next(0);
        var n__9 = next(0);
        var x__5 = next(0);
        return app_var_const(f__7, n__9, x__5);
      case 14:
        var f__8 = next(0);
        var e__2 = next(0);
        var n__10 = next(0);
        var x__6 = next(0);
        return app_env_const(f__8, e__2, n__10, x__6);
      case 15:
        var f__9 = next(0);
        var n__11 = next(0);
        var x__7 = next(0);
        return app_meth_const(f__9, n__11, x__7);
      case 16:
        var n__12 = next(0);
        var x__8 = next(0);
        return meth_app_const(n__12, x__8);
      case 17:
        var n__13 = next(0);
        var m = next(0);
        return meth_app_var(n__13, m);
      case 18:
        var n__14 = next(0);
        var e__3 = next(0);
        var m__0 = next(0);
        return meth_app_env(n__14, e__3, m__0);
      case 19:
        var n__15 = next(0);
        var m__1 = next(0);
        return meth_app_meth(n__15, m__1);
      case 20:
        var m__2 = next(0);
        var x__9 = next(0);
        return send_const(m__2, x__9, new_cache(table));
      case 21:
        var m__3 = next(0);
        var n__16 = next(0);
        return send_var(m__3, n__16, new_cache(table));
      case 22:
        var m__4 = next(0);
        var e__4 = next(0);
        var n__17 = next(0);
        return send_env(m__4, e__4, n__17, new_cache(table));
      default:
        var m__5 = next(0);
        var n__18 = next(0);
        return send_meth(m__5, n__18, new_cache(table))
      }
  }
  return clo;
}

function set_methods(table, methods) {
  var len = methods.length - 1;
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      var yl = i[1];
      var label = caml_check_bound(methods, yl)[yl + 1];
      var clo = method_impl(table, i, methods);
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

runtime["caml_register_global"](18, CamlinternalOO, "CamlinternalOO");


module.exports = global.jsoo_runtime.caml_get_global_data().CamlinternalOO;