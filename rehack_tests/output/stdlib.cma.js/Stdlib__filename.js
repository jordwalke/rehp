/**
 * @flow strict
 * Stdlib__filename
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_equal = runtime["caml_string_equal"];
var caml_string_get = runtime["caml_string_get"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_sys_getenv = runtime["caml_sys_getenv"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var cst_Filename_chop_extension = string("Filename.chop_extension");
var cst__10 = string("");
var cst_Filename_chop_suffix = string("Filename.chop_suffix");
var cst__9 = string("");
var cst__7 = string("./");
var cst__6 = string(".\\");
var cst__5 = string("../");
var cst__4 = string("..\\");
var cst__2 = string("./");
var cst__1 = string("../");
var cst__0 = string("");
var cst = string("");
var current_dir_name = string(".");
var parent_dir_name = string("..");
var dir_sep = string("/");
var cst_TMPDIR = string("TMPDIR");
var cst_tmp = string("/tmp");
var cst__3 = string("'\\''");
var current_dir_name__0 = string(".");
var parent_dir_name__0 = string("..");
var dir_sep__0 = string("\\");
var cst_TEMP = string("TEMP");
var cst__8 = string(".");
var current_dir_name__1 = string(".");
var parent_dir_name__1 = string("..");
var dir_sep__1 = string("/");
var cst_Cygwin = string("Cygwin");
var cst_Win32 = string("Win32");
var Stdlib = require("./Stdlib.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Stdlib_random = require("./Stdlib__random.js");
var Stdlib_printf = require("./Stdlib__printf.js");
var Stdlib_string = require("./Stdlib__string.js");
var Stdlib_buffer = require("./Stdlib__buffer.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var d_ = [0,7,0];
var c_ = [0,1,[0,3,[0,5,0]]];
var b_ = [0,[2,0,[4,6,[0,2,6],0,[2,0,0]]],string("%s%06x%s")];

function generic_quote(quotequote, s) {
  var l = caml_ml_string_length(s);
  var b = call1(Stdlib_buffer[1], l + 20 | 0);
  call2(Stdlib_buffer[10], b, 39);
  var ar_ = l + -1 | 0;
  var aq_ = 0;
  if (! (ar_ < 0)) {
    var i = aq_;
    for (; ; ) {
      if (39 === caml_string_get(s, i)) call2(
        Stdlib_buffer[14],
        b,
        quotequote
      );
      else {var at_ = caml_string_get(s, i);call2(Stdlib_buffer[10], b, at_);}
      var as_ = i + 1 | 0;
      if (ar_ !== i) {var i = as_;continue;}
      break;
    }
  }
  call2(Stdlib_buffer[10], b, 39);
  return call1(Stdlib_buffer[2], b);
}

function generic_basename(is_dir_sep, current_dir_name, name) {
  function find_beg(n, p) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          return call3(
            Stdlib_string[4],
            name,
            n__0 + 1 | 0,
            (p - n__0 | 0) + -1 | 0
          );
        }
        var n__1 = n__0 + -1 | 0;
        var n__0 = n__1;
        continue;
      }
      return call3(Stdlib_string[4], name, 0, p);
    }
  }
  function find_end(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return find_beg(n__0, n__0 + 1 | 0);
      }
      return call3(Stdlib_string[4], name, 0, 1);
    }
  }
  return caml_string_equal(name, cst) ?
    current_dir_name :
    find_end(caml_ml_string_length(name) + -1 | 0);
}

function generic_dirname(is_dir_sep, current_dir_name, name) {
  function intermediate_sep(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return call3(Stdlib_string[4], name, 0, n__0 + 1 | 0);
      }
      return call3(Stdlib_string[4], name, 0, 1);
    }
  }
  function base(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {return intermediate_sep(n__0);}
        var n__1 = n__0 + -1 | 0;
        var n__0 = n__1;
        continue;
      }
      return current_dir_name;
    }
  }
  function trailing_sep(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return base(n__0);
      }
      return call3(Stdlib_string[4], name, 0, 1);
    }
  }
  return caml_string_equal(name, cst__0) ?
    current_dir_name :
    trailing_sep(caml_ml_string_length(name) + -1 | 0);
}

function is_dir_sep(s, i) {return 47 === caml_string_get(s, i) ? 1 : 0;}

function is_relative(n) {
  var ao_ = caml_ml_string_length(n) < 1 ? 1 : 0;
  var ap_ = ao_ ? ao_ : 47 !== caml_string_get(n, 0) ? 1 : 0;
  return ap_;
}

function is_implicit(n) {
  var aj_ = is_relative(n);
  if (aj_) {
    var ak_ = caml_ml_string_length(n) < 2 ? 1 : 0;
    var al_ = ak_ ?
      ak_ :
      caml_string_notequal(call3(Stdlib_string[4], n, 0, 2), cst__2);
    if (al_) {
      var am_ = caml_ml_string_length(n) < 3 ? 1 : 0;
      var an_ = am_ ?
        am_ :
        caml_string_notequal(call3(Stdlib_string[4], n, 0, 3), cst__1);
    }
    else var an_ = al_;
  }
  else var an_ = aj_;
  return an_;
}

function check_suffix(name, suff) {
  var ah_ = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  var ai_ = ah_ ?
    caml_string_equal(
     call3(
       Stdlib_string[4],
       name,
       caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
       caml_ml_string_length(suff)
     ),
     suff
   ) :
    ah_;
  return ai_;
}

function chop_suffix_opt(suffix, filename) {
  var len_s = caml_ml_string_length(suffix);
  var len_f = caml_ml_string_length(filename);
  if (len_s <= len_f) {
    var r = call3(Stdlib_string[4], filename, len_f - len_s | 0, len_s);
    return caml_string_equal(r, suffix) ?
      [0,call3(Stdlib_string[4], filename, 0, len_f - len_s | 0)] :
      0;
  }
  return 0;
}

try {var n_ = caml_sys_getenv(cst_TMPDIR);var temp_dir_name = n_;}
catch(ag_) {
  ag_ = runtime["caml_wrap_exception"](ag_);
  if (ag_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(ag_);}
  var temp_dir_name = cst_tmp;
}

function quote(af_) {return generic_quote(cst__3, af_);}

function basename(ae_) {
  return generic_basename(is_dir_sep, current_dir_name, ae_);
}

function dirname(ad_) {
  return generic_dirname(is_dir_sep, current_dir_name, ad_);
}

function is_dir_sep__0(s, i) {
  var c = caml_string_get(s, i);
  var aa_ = 47 === c ? 1 : 0;
  if (aa_) var ab_ = aa_;
  else {var ac_ = 92 === c ? 1 : 0;var ab_ = ac_ ? ac_ : 58 === c ? 1 : 0;}
  return ab_;
}

function is_relative__0(n) {
  var U_ = caml_ml_string_length(n) < 1 ? 1 : 0;
  var V_ = U_ ? U_ : 47 !== caml_string_get(n, 0) ? 1 : 0;
  if (V_) {
    var W_ = caml_ml_string_length(n) < 1 ? 1 : 0;
    var X_ = W_ ? W_ : 92 !== caml_string_get(n, 0) ? 1 : 0;
    if (X_) {
      var Y_ = caml_ml_string_length(n) < 2 ? 1 : 0;
      var Z_ = Y_ ? Y_ : 58 !== caml_string_get(n, 1) ? 1 : 0;
    }
    else var Z_ = X_;
  }
  else var Z_ = V_;
  return Z_;
}

function is_implicit__0(n) {
  var L_ = is_relative__0(n);
  if (L_) {
    var M_ = caml_ml_string_length(n) < 2 ? 1 : 0;
    var N_ = M_ ?
      M_ :
      caml_string_notequal(call3(Stdlib_string[4], n, 0, 2), cst__7);
    if (N_) {
      var O_ = caml_ml_string_length(n) < 2 ? 1 : 0;
      var P_ = O_ ?
        O_ :
        caml_string_notequal(call3(Stdlib_string[4], n, 0, 2), cst__6);
      if (P_) {
        var Q_ = caml_ml_string_length(n) < 3 ? 1 : 0;
        var R_ = Q_ ?
          Q_ :
          caml_string_notequal(call3(Stdlib_string[4], n, 0, 3), cst__5);
        if (R_) {
          var S_ = caml_ml_string_length(n) < 3 ? 1 : 0;
          var T_ = S_ ?
            S_ :
            caml_string_notequal(call3(Stdlib_string[4], n, 0, 3), cst__4);
        }
        else var T_ = R_;
      }
      else var T_ = P_;
    }
    else var T_ = N_;
  }
  else var T_ = L_;
  return T_;
}

function check_suffix__0(name, suff) {
  var I_ = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  if (I_) {
    var s = call3(
      Stdlib_string[4],
      name,
      caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
      caml_ml_string_length(suff)
    );
    var J_ = call1(Stdlib_string[30], suff);
    var K_ = caml_string_equal(call1(Stdlib_string[30], s), J_);
  }
  else var K_ = I_;
  return K_;
}

function chop_suffix_opt__0(suffix, filename) {
  var len_s = caml_ml_string_length(suffix);
  var len_f = caml_ml_string_length(filename);
  if (len_s <= len_f) {
    var r = call3(Stdlib_string[4], filename, len_f - len_s | 0, len_s);
    var H_ = call1(Stdlib_string[30], suffix);
    return caml_string_equal(call1(Stdlib_string[30], r), H_) ?
      [0,call3(Stdlib_string[4], filename, 0, len_f - len_s | 0)] :
      0;
  }
  return 0;
}

try {var m_ = caml_sys_getenv(cst_TEMP);var temp_dir_name__0 = m_;}
catch(G_) {
  G_ = runtime["caml_wrap_exception"](G_);
  if (G_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(G_);}
  var temp_dir_name__0 = cst__8;
}

function quote__0(s) {
  var l = caml_ml_string_length(s);
  var b = call1(Stdlib_buffer[1], l + 20 | 0);
  call2(Stdlib_buffer[10], b, 34);
  function add_bs(n) {
    var E_ = 1;
    if (! (n < 1)) {
      var j = E_;
      for (; ; ) {
        call2(Stdlib_buffer[10], b, 92);
        var F_ = j + 1 | 0;
        if (n !== j) {var j = F_;continue;}
        break;
      }
    }
    return 0;
  }
  function loop__0(counter, i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {return call2(Stdlib_buffer[10], b, 34);}
      var c = caml_string_get(s, i__0);
      if (34 === c) {
        var C_ = 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return loop_bs(counter__1, C_, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,C_,i__0]);
      }
      if (92 === c) {
        var D_ = 0;
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return loop_bs(counter__0, D_, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,D_,i__0]);
      }
      call2(Stdlib_buffer[10], b, c);
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  function loop_bs(counter, n, i) {
    var n__0 = n;
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {call2(Stdlib_buffer[10], b, 34);return add_bs(n__0);}
      var match = caml_string_get(s, i__0);
      if (34 === match) {
        add_bs((2 * n__0 | 0) + 1 | 0);
        call2(Stdlib_buffer[10], b, 34);
        var B_ = i__0 + 1 | 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return loop__0(counter__1, B_);
        }
        return caml_trampoline_return(loop__0, [0,B_]);
      }
      if (92 === match) {
        var i__1 = i__0 + 1 | 0;
        var n__1 = n__0 + 1 | 0;
        var n__0 = n__1;
        var i__0 = i__1;
        continue;
      }
      add_bs(n__0);
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return loop__0(counter__0, i__0);
      }
      return caml_trampoline_return(loop__0, [0,i__0]);
    }
  }
  function loop(i) {return caml_trampoline(loop__0(0, i));}
  loop(0);
  return call1(Stdlib_buffer[2], b);
}

function has_drive(s) {
  function is_letter(param) {
    var switch__0 = 91 <= param ?
      25 < (param + -97 | 0) >>> 0 ? 0 : 1 :
      65 <= param ? 1 : 0;
    return switch__0 ? 1 : 0;
  }
  var y_ = 2 <= caml_ml_string_length(s) ? 1 : 0;
  if (y_) {
    var z_ = is_letter(caml_string_get(s, 0));
    var A_ = z_ ? 58 === caml_string_get(s, 1) ? 1 : 0 : z_;
  }
  else var A_ = y_;
  return A_;
}

function drive_and_path(s) {
  if (has_drive(s)) {
    var x_ = call3(Stdlib_string[4], s, 2, caml_ml_string_length(s) + -2 | 0);
    return [0,call3(Stdlib_string[4], s, 0, 2),x_];
  }
  return [0,cst__9,s];
}

function dirname__0(s) {
  var match = drive_and_path(s);
  var path = match[2];
  var drive = match[1];
  var dir = generic_dirname(is_dir_sep__0, current_dir_name__0, path);
  return call2(Stdlib[28], drive, dir);
}

function basename__0(s) {
  var match = drive_and_path(s);
  var path = match[2];
  return generic_basename(is_dir_sep__0, current_dir_name__0, path);
}

function basename__1(w_) {
  return generic_basename(is_dir_sep__0, current_dir_name__1, w_);
}

function dirname__1(v_) {
  return generic_dirname(is_dir_sep__0, current_dir_name__1, v_);
}

var a_ = Stdlib_sys[5];

if (caml_string_notequal(a_, cst_Cygwin)) if (caml_string_notequal(a_, cst_Win32)) {
  var current_dir_name__2 = current_dir_name;
  var parent_dir_name__2 = parent_dir_name;
  var dir_sep__2 = dir_sep;
  var is_dir_sep__1 = is_dir_sep;
  var is_relative__1 = is_relative;
  var is_implicit__1 = is_implicit;
  var check_suffix__1 = check_suffix;
  var chop_suffix_opt__1 = chop_suffix_opt;
  var temp_dir_name__1 = temp_dir_name;
  var quote__1 = quote;
  var basename__2 = basename;
  var dirname__2 = dirname;
  var switch__0 = 1;
}
else {
  var e_ = [
    0,
    current_dir_name__0,
    parent_dir_name__0,
    dir_sep__0,
    is_dir_sep__0,
    is_relative__0,
    is_implicit__0,
    check_suffix__0,
    chop_suffix_opt__0,
    temp_dir_name__0,
    quote__0,
    basename__0,
    dirname__0
  ];
  var switch__0 = 0;
}
else {
  var e_ = [
    0,
    current_dir_name__1,
    parent_dir_name__1,
    dir_sep__1,
    is_dir_sep__0,
    is_relative__0,
    is_implicit__0,
    check_suffix__0,
    chop_suffix_opt__0,
    temp_dir_name,
    quote,
    basename__1,
    dirname__1
  ];
  var switch__0 = 0;
}

if (! switch__0) {
  var f_ = e_[12];
  var g_ = e_[11];
  var h_ = e_[10];
  var i_ = e_[9];
  var j_ = e_[3];
  var k_ = e_[2];
  var l_ = e_[1];
  var current_dir_name__2 = l_;
  var parent_dir_name__2 = k_;
  var dir_sep__2 = j_;
  var is_dir_sep__1 = is_dir_sep__0;
  var is_relative__1 = is_relative__0;
  var is_implicit__1 = is_implicit__0;
  var check_suffix__1 = check_suffix__0;
  var chop_suffix_opt__1 = chop_suffix_opt__0;
  var temp_dir_name__1 = i_;
  var quote__1 = h_;
  var basename__2 = g_;
  var dirname__2 = f_;
}

function concat(dirname, filename) {
  var l = caml_ml_string_length(dirname);
  if (0 !== l) {
    if (! is_dir_sep__1(dirname, l + -1 | 0)) {
      var u_ = call2(Stdlib[28], dir_sep__2, filename);
      return call2(Stdlib[28], dirname, u_);
    }
  }
  return call2(Stdlib[28], dirname, filename);
}

function chop_suffix(name, suff) {
  var n = caml_ml_string_length(name) - caml_ml_string_length(suff) | 0;
  return 0 <= n ?
    call3(Stdlib_string[4], name, 0, n) :
    call1(Stdlib[1], cst_Filename_chop_suffix);
}

function extension_len(name) {
  function check(i0, i) {
    var i__0 = i;
    for (; ; ) {
      if (0 <= i__0) {
        if (! is_dir_sep__1(name, i__0)) {
          if (46 === caml_string_get(name, i__0)) {
            var i__1 = i__0 + -1 | 0;
            var i__0 = i__1;
            continue;
          }
          return caml_ml_string_length(name) - i0 | 0;
        }
      }
      return 0;
    }
  }
  function search_dot(i) {
    var i__0 = i;
    for (; ; ) {
      if (0 <= i__0) {
        if (! is_dir_sep__1(name, i__0)) {
          if (46 === caml_string_get(name, i__0)) {return check(i__0, i__0 + -1 | 0);}
          var i__1 = i__0 + -1 | 0;
          var i__0 = i__1;
          continue;
        }
      }
      return 0;
    }
  }
  return search_dot(caml_ml_string_length(name) + -1 | 0);
}

function extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    cst__10 :
    call3(Stdlib_string[4], name, caml_ml_string_length(name) - l | 0, l);
}

function chop_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    call1(Stdlib[1], cst_Filename_chop_extension) :
    call3(Stdlib_string[4], name, 0, caml_ml_string_length(name) - l | 0);
}

function remove_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    name :
    call3(Stdlib_string[4], name, 0, caml_ml_string_length(name) - l | 0);
}

var prng = [246,function(t_) {return call1(Stdlib_random[11][2], 0);}];

function temp_file_name(temp_dir, prefix, suffix) {
  var r_ = runtime["caml_obj_tag"](prng);
  var s_ = 250 === r_ ?
    prng[1] :
    246 === r_ ? call1(CamlinternalLazy[2], prng) : prng;
  var rnd = call1(Stdlib_random[11][4], s_) & 16777215;
  return concat(temp_dir, call4(Stdlib_printf[4], b_, prefix, rnd, suffix));
}

var current_temp_dir_name = [0,temp_dir_name__1];

function set_temp_dir_name(s) {current_temp_dir_name[1] = s;return 0;}

function get_temp_dir_name(param) {return current_temp_dir_name[1];}

function temp_file(opt, prefix, suffix) {
  if (opt) {
    var sth = opt[1];
    var temp_dir = sth;
  }
  else var temp_dir = current_temp_dir_name[1];
  function try_name(counter) {
    var counter__0 = counter;
    for (; ; ) {
      var name = temp_file_name(temp_dir, prefix, suffix);
      try {
        runtime["caml_sys_close"](runtime["caml_sys_open"](name, c_, 384));
        return name;
      }
      catch(e) {
        e = runtime["caml_wrap_exception"](e);
        if (e[1] === Stdlib[11]) {
          if (1e3 <= counter__0) {
            throw caml_wrap_thrown_exception_reraise(e);
          }
          var counter__1 = counter__0 + 1 | 0;
          var counter__0 = counter__1;
          continue;
        }
        throw caml_wrap_thrown_exception_reraise(e);
      }
    }
  }
  return try_name(0);
}

function open_temp_file(opt, p_, o_, prefix, suffix) {
  if (opt) {
    var sth = opt[1];
    var mode = sth;
  }
  else var mode = d_;
  if (p_) {
    var sth__0 = p_[1];
    var perms = sth__0;
  }
  else var perms = 384;
  if (o_) {
    var sth__1 = o_[1];
    var temp_dir = sth__1;
  }
  else var temp_dir = current_temp_dir_name[1];
  function try_name(counter) {
    var counter__0 = counter;
    for (; ; ) {
      var name = temp_file_name(temp_dir, prefix, suffix);
      try {
        var q_ = [
          0,
          name,
          call3(Stdlib[62], [0,1,[0,3,[0,5,mode]]], perms, name)
        ];
        return q_;
      }
      catch(e) {
        e = runtime["caml_wrap_exception"](e);
        if (e[1] === Stdlib[11]) {
          if (1e3 <= counter__0) {
            throw caml_wrap_thrown_exception_reraise(e);
          }
          var counter__1 = counter__0 + 1 | 0;
          var counter__0 = counter__1;
          continue;
        }
        throw caml_wrap_thrown_exception_reraise(e);
      }
    }
  }
  return try_name(0);
}

var Stdlib_filename = [
  0,
  current_dir_name__2,
  parent_dir_name__2,
  dir_sep__2,
  concat,
  is_relative__1,
  is_implicit__1,
  check_suffix__1,
  chop_suffix,
  chop_suffix_opt__1,
  extension,
  remove_extension,
  chop_extension,
  basename__2,
  dirname__2,
  temp_file,
  open_temp_file,
  get_temp_dir_name,
  set_temp_dir_name,
  temp_dir_name__1,
  quote__1
];

module.exports = Stdlib_filename;

/*::type Exports = {
  current_dir_name: any,
  parent_dir_name: any,
  dir_sep: any,
  concat: (dirname: any, filename: any) => any,
  is_relative: (n: any) => any,
  is_implicit: (n: any) => any,
  check_suffix: (name: any, suff: any) => any,
  chop_suffix: (name: any, suff: any) => any,
  chop_suffix_opt: (suffix: any, filename: any) => any,
  extension: (name: any) => any,
  remove_extension: (name: any) => any,
  chop_extension: (name: any) => any,
  basename: (arg0: any) => any,
  dirname: (arg0: any) => any,
  temp_file: (opt: any, prefix: any, suffix: any) => any,
  open_temp_file: (opt: any, arg1: any, arg2: any, prefix: any, suffix: any) => any,
  get_temp_dir_name: (param: any) => any,
  set_temp_dir_name: (s: any) => any,
  temp_dir_name: any,
  quote: (arg0: any) => any,
}*/
/** @type {{
  current_dir_name: any,
  parent_dir_name: any,
  dir_sep: any,
  concat: (dirname: any, filename: any) => any,
  is_relative: (n: any) => any,
  is_implicit: (n: any) => any,
  check_suffix: (name: any, suff: any) => any,
  chop_suffix: (name: any, suff: any) => any,
  chop_suffix_opt: (suffix: any, filename: any) => any,
  extension: (name: any) => any,
  remove_extension: (name: any) => any,
  chop_extension: (name: any) => any,
  basename: (arg0: any) => any,
  dirname: (arg0: any) => any,
  temp_file: (opt: any, prefix: any, suffix: any) => any,
  open_temp_file: (opt: any, arg1: any, arg2: any, prefix: any, suffix: any) => any,
  get_temp_dir_name: (param: any) => any,
  set_temp_dir_name: (s: any) => any,
  temp_dir_name: any,
  quote: (arg0: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.current_dir_name = module.exports[1];
module.exports.parent_dir_name = module.exports[2];
module.exports.dir_sep = module.exports[3];
module.exports.concat = module.exports[4];
module.exports.is_relative = module.exports[5];
module.exports.is_implicit = module.exports[6];
module.exports.check_suffix = module.exports[7];
module.exports.chop_suffix = module.exports[8];
module.exports.chop_suffix_opt = module.exports[9];
module.exports.extension = module.exports[10];
module.exports.remove_extension = module.exports[11];
module.exports.chop_extension = module.exports[12];
module.exports.basename = module.exports[13];
module.exports.dirname = module.exports[14];
module.exports.temp_file = module.exports[15];
module.exports.open_temp_file = module.exports[16];
module.exports.get_temp_dir_name = module.exports[17];
module.exports.set_temp_dir_name = module.exports[18];
module.exports.temp_dir_name = module.exports[19];
module.exports.quote = module.exports[20];

/* Hashing disabled */
