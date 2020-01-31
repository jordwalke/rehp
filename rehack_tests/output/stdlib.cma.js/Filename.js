/**
 * @flow strict
 * Filename
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var switch__0;
var n_;
var m_;
var l_;
var k_;
var j_;
var i_;
var h_;
var g_;
var f_;
var e_;
var current_dir_name__2;
var parent_dir_name__2;
var dir_sep__2;
var is_dir_sep__1;
var is_relative__1;
var is_implicit__1;
var check_suffix__1;
var temp_dir_name__1;
var quote__1;
var basename__2;
var dirname__2;
var temp_dir_name__0;
var temp_dir_name;

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
var Pervasives = require("./Pervasives.js");
var Sys_error = require("../runtime/Sys_error.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Random = require("./Random.js");
var Printf = require("./Printf.js");
var String = require("./String.js");
var Buffer = require("./Buffer.js");
var Not_found = require("../runtime/Not_found.js");
var Sys = require("./Sys.js");
var d_ = [0,7,0];
var c_ = [0,1,[0,3,[0,5,0]]];
var b_ = [0,[2,0,[4,6,[0,2,6],0,[2,0,0]]],string("%s%06x%s")];

function generic_quote(quotequote, s) {
  var i;
  var ar_;
  var as_;
  var l = caml_ml_string_length(s);
  var b = call1(Buffer[1], l + 20 | 0);
  call2(Buffer[10], b, 39);
  var aq_ = l + -1 | 0;
  var ap_ = 0;
  if (! (aq_ < 0)) {
    i = ap_;
    for (; ; ) {
      if (39 === caml_string_get(s, i)) call2(Buffer[14], b, quotequote);
      else {as_ = caml_string_get(s, i);call2(Buffer[10], b, as_);}
      ar_ = i + 1 | 0;
      if (aq_ !== i) {i = ar_;continue;}
      break;
    }
  }
  call2(Buffer[10], b, 39);
  return call1(Buffer[2], b);
}

function generic_basename(is_dir_sep, current_dir_name, name) {
  function find_beg(n, p) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          return call3(String[4], name, n__0 + 1 | 0, (p - n__0 | 0) + -1 | 0);
        }
        n__1 = n__0 + -1 | 0;
        n__0 = n__1;
        continue;
      }
      return call3(String[4], name, 0, p);
    }
  }
  function find_end(n) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          n__1 = n__0 + -1 | 0;
          n__0 = n__1;
          continue;
        }
        return find_beg(n__0, n__0 + 1 | 0);
      }
      return call3(String[4], name, 0, 1);
    }
  }
  return caml_string_equal(name, cst) ?
    current_dir_name :
    find_end(caml_ml_string_length(name) + -1 | 0);
}

function generic_dirname(is_dir_sep, current_dir_name, name) {
  function intermediate_sep(n) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          n__1 = n__0 + -1 | 0;
          n__0 = n__1;
          continue;
        }
        return call3(String[4], name, 0, n__0 + 1 | 0);
      }
      return call3(String[4], name, 0, 1);
    }
  }
  function base(n) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {return intermediate_sep(n__0);}
        n__1 = n__0 + -1 | 0;
        n__0 = n__1;
        continue;
      }
      return current_dir_name;
    }
  }
  function trailing_sep(n) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (call2(is_dir_sep, name, n__0)) {
          n__1 = n__0 + -1 | 0;
          n__0 = n__1;
          continue;
        }
        return base(n__0);
      }
      return call3(String[4], name, 0, 1);
    }
  }
  return caml_string_equal(name, cst__0) ?
    current_dir_name :
    trailing_sep(caml_ml_string_length(name) + -1 | 0);
}

function is_dir_sep(s, i) {return 47 === caml_string_get(s, i) ? 1 : 0;}

function is_relative(n) {
  var an_ = caml_ml_string_length(n) < 1 ? 1 : 0;
  var ao_ = an_ ? an_ : 47 !== caml_string_get(n, 0) ? 1 : 0;
  return ao_;
}

function is_implicit(n) {
  var aj_;
  var ak_;
  var al_;
  var am_;
  var ai_ = is_relative(n);
  if (ai_) {
    aj_ = caml_ml_string_length(n) < 2 ? 1 : 0;
    ak_ = aj_ ? aj_ : caml_string_notequal(call3(String[4], n, 0, 2), cst__2);
    if (ak_) {
      al_ = caml_ml_string_length(n) < 3 ? 1 : 0;
      am_ =
        al_ ? al_ : caml_string_notequal(call3(String[4], n, 0, 3), cst__1);
    }
    else am_ = ak_;
  }
  else am_ = ai_;
  return am_;
}

function check_suffix(name, suff) {
  var ag_ = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  var ah_ = ag_ ?
    caml_string_equal(
     call3(
       String[4],
       name,
       caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
       caml_ml_string_length(suff)
     ),
     suff
   ) :
    ag_;
  return ah_;
}

try {n_ = caml_sys_getenv(cst_TMPDIR);temp_dir_name = n_;}
catch(af_) {
  af_ = runtime["caml_wrap_exception"](af_);
  if (af_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(af_);}
  temp_dir_name = cst_tmp;
}

function quote(ae_) {return generic_quote(cst__3, ae_);}

function basename(ad_) {
  return generic_basename(is_dir_sep, current_dir_name, ad_);
}

function dirname(ac_) {
  return generic_dirname(is_dir_sep, current_dir_name, ac_);
}

function is_dir_sep__0(s, i) {
  var aa_;
  var ab_;
  var c = caml_string_get(s, i);
  var Z_ = 47 === c ? 1 : 0;
  if (Z_) aa_ = Z_;
  else {ab_ = 92 === c ? 1 : 0;aa_ = ab_ ? ab_ : 58 === c ? 1 : 0;}
  return aa_;
}

function is_relative__0(n) {
  var V_;
  var W_;
  var X_;
  var Y_;
  var T_ = caml_ml_string_length(n) < 1 ? 1 : 0;
  var U_ = T_ ? T_ : 47 !== caml_string_get(n, 0) ? 1 : 0;
  if (U_) {
    V_ = caml_ml_string_length(n) < 1 ? 1 : 0;
    W_ = V_ ? V_ : 92 !== caml_string_get(n, 0) ? 1 : 0;
    if (W_) {
      X_ = caml_ml_string_length(n) < 2 ? 1 : 0;
      Y_ = X_ ? X_ : 58 !== caml_string_get(n, 1) ? 1 : 0;
    }
    else Y_ = W_;
  }
  else Y_ = U_;
  return Y_;
}

function is_implicit__0(n) {
  var L_;
  var M_;
  var N_;
  var O_;
  var P_;
  var Q_;
  var R_;
  var S_;
  var K_ = is_relative__0(n);
  if (K_) {
    L_ = caml_ml_string_length(n) < 2 ? 1 : 0;
    M_ = L_ ? L_ : caml_string_notequal(call3(String[4], n, 0, 2), cst__7);
    if (M_) {
      N_ = caml_ml_string_length(n) < 2 ? 1 : 0;
      O_ = N_ ? N_ : caml_string_notequal(call3(String[4], n, 0, 2), cst__6);
      if (O_) {
        P_ = caml_ml_string_length(n) < 3 ? 1 : 0;
        Q_ = P_ ? P_ : caml_string_notequal(call3(String[4], n, 0, 3), cst__5);
        if (Q_) {
          R_ = caml_ml_string_length(n) < 3 ? 1 : 0;
          S_ =
            R_ ? R_ : caml_string_notequal(call3(String[4], n, 0, 3), cst__4);
        }
        else S_ = Q_;
      }
      else S_ = O_;
    }
    else S_ = M_;
  }
  else S_ = K_;
  return S_;
}

function check_suffix__0(name, suff) {
  var s;
  var I_;
  var J_;
  var H_ = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  if (H_) {
    s =
      call3(
        String[4],
        name,
        caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
        caml_ml_string_length(suff)
      );
    I_ = call1(String[30], suff);
    J_ = caml_string_equal(call1(String[30], s), I_);
  }
  else J_ = H_;
  return J_;
}

try {m_ = caml_sys_getenv(cst_TEMP);temp_dir_name__0 = m_;}
catch(G_) {
  G_ = runtime["caml_wrap_exception"](G_);
  if (G_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(G_);}
  temp_dir_name__0 = cst__8;
}

function quote__0(s) {
  var l = caml_ml_string_length(s);
  var b = call1(Buffer[1], l + 20 | 0);
  call2(Buffer[10], b, 34);
  function add_bs(n) {
    var j;
    var F_;
    var E_ = 1;
    if (! (n < 1)) {
      j = E_;
      for (; ; ) {
        call2(Buffer[10], b, 92);
        F_ = j + 1 | 0;
        if (n !== j) {j = F_;continue;}
        break;
      }
    }
    return 0;
  }
  function loop__0(counter, i) {
    var c;
    var C_;
    var D_;
    var i__1;
    var counter__0;
    var counter__1;
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {return call2(Buffer[10], b, 34);}
      c = caml_string_get(s, i__0);
      if (34 === c) {
        C_ = 0;
        if (counter < 50) {
          counter__1 = counter + 1 | 0;
          return loop_bs(counter__1, C_, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,C_,i__0]);
      }
      if (92 === c) {
        D_ = 0;
        if (counter < 50) {
          counter__0 = counter + 1 | 0;
          return loop_bs(counter__0, D_, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,D_,i__0]);
      }
      call2(Buffer[10], b, c);
      i__1 = i__0 + 1 | 0;
      i__0 = i__1;
      continue;
    }
  }
  function loop_bs(counter, n, i) {
    var match;
    var B_;
    var i__1;
    var n__1;
    var counter__0;
    var counter__1;
    var n__0 = n;
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {call2(Buffer[10], b, 34);return add_bs(n__0);}
      match = caml_string_get(s, i__0);
      if (34 === match) {
        add_bs((2 * n__0 | 0) + 1 | 0);
        call2(Buffer[10], b, 34);
        B_ = i__0 + 1 | 0;
        if (counter < 50) {
          counter__1 = counter + 1 | 0;
          return loop__0(counter__1, B_);
        }
        return caml_trampoline_return(loop__0, [0,B_]);
      }
      if (92 === match) {
        i__1 = i__0 + 1 | 0;
        n__1 = n__0 + 1 | 0;
        n__0 = n__1;
        i__0 = i__1;
        continue;
      }
      add_bs(n__0);
      if (counter < 50) {
        counter__0 = counter + 1 | 0;
        return loop__0(counter__0, i__0);
      }
      return caml_trampoline_return(loop__0, [0,i__0]);
    }
  }
  function loop(i) {return caml_trampoline(loop__0(0, i));}
  loop(0);
  return call1(Buffer[2], b);
}

function has_drive(s) {
  var z_;
  var A_;
  function is_letter(param) {
    var switch__0 = 91 <= param ?
      25 < (param + -97 | 0) >>> 0 ? 0 : 1 :
      65 <= param ? 1 : 0;
    return switch__0 ? 1 : 0;
  }
  var y_ = 2 <= caml_ml_string_length(s) ? 1 : 0;
  if (y_) {
    z_ = is_letter(caml_string_get(s, 0));
    A_ = z_ ? 58 === caml_string_get(s, 1) ? 1 : 0 : z_;
  }
  else A_ = y_;
  return A_;
}

function drive_and_path(s) {
  var x_;
  if (has_drive(s)) {
    x_ = call3(String[4], s, 2, caml_ml_string_length(s) + -2 | 0);
    return [0,call3(String[4], s, 0, 2),x_];
  }
  return [0,cst__9,s];
}

function dirname__0(s) {
  var match = drive_and_path(s);
  var path = match[2];
  var drive = match[1];
  var dir = generic_dirname(is_dir_sep__0, current_dir_name__0, path);
  return call2(Pervasives[16], drive, dir);
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

var a_ = Sys[5];

if (caml_string_notequal(a_, cst_Cygwin)) if (caml_string_notequal(a_, cst_Win32)) {
  current_dir_name__2 = current_dir_name;
  parent_dir_name__2 = parent_dir_name;
  dir_sep__2 = dir_sep;
  is_dir_sep__1 = is_dir_sep;
  is_relative__1 = is_relative;
  is_implicit__1 = is_implicit;
  check_suffix__1 = check_suffix;
  temp_dir_name__1 = temp_dir_name;
  quote__1 = quote;
  basename__2 = basename;
  dirname__2 = dirname;
  switch__0 = 1;
}
else {
  e_ =
    [
      0,
      current_dir_name__0,
      parent_dir_name__0,
      dir_sep__0,
      is_dir_sep__0,
      is_relative__0,
      is_implicit__0,
      check_suffix__0,
      temp_dir_name__0,
      quote__0,
      basename__0,
      dirname__0
    ];
  switch__0 = 0;
}
else {
  e_ =
    [
      0,
      current_dir_name__1,
      parent_dir_name__1,
      dir_sep__1,
      is_dir_sep__0,
      is_relative__0,
      is_implicit__0,
      check_suffix__0,
      temp_dir_name,
      quote,
      basename__1,
      dirname__1
    ];
  switch__0 = 0;
}

if (! switch__0) {
  f_ = e_[11];
  g_ = e_[10];
  h_ = e_[9];
  i_ = e_[8];
  j_ = e_[3];
  k_ = e_[2];
  l_ = e_[1];
  current_dir_name__2 = l_;
  parent_dir_name__2 = k_;
  dir_sep__2 = j_;
  is_dir_sep__1 = is_dir_sep__0;
  is_relative__1 = is_relative__0;
  is_implicit__1 = is_implicit__0;
  check_suffix__1 = check_suffix__0;
  temp_dir_name__1 = i_;
  quote__1 = h_;
  basename__2 = g_;
  dirname__2 = f_;
}

function concat(dirname, filename) {
  var u_;
  var l = caml_ml_string_length(dirname);
  if (0 !== l) {
    if (! is_dir_sep__1(dirname, l + -1 | 0)) {
      u_ = call2(Pervasives[16], dir_sep__2, filename);
      return call2(Pervasives[16], dirname, u_);
    }
  }
  return call2(Pervasives[16], dirname, filename);
}

function chop_suffix(name, suff) {
  var n = caml_ml_string_length(name) - caml_ml_string_length(suff) | 0;
  return 0 <= n ?
    call3(String[4], name, 0, n) :
    call1(Pervasives[1], cst_Filename_chop_suffix);
}

function extension_len(name) {
  function check(i0, i) {
    var i__1;
    var i__0 = i;
    for (; ; ) {
      if (0 <= i__0) {
        if (! is_dir_sep__1(name, i__0)) {
          if (46 === caml_string_get(name, i__0)) {
            i__1 = i__0 + -1 | 0;
            i__0 = i__1;
            continue;
          }
          return caml_ml_string_length(name) - i0 | 0;
        }
      }
      return 0;
    }
  }
  function search_dot(i) {
    var i__1;
    var i__0 = i;
    for (; ; ) {
      if (0 <= i__0) {
        if (! is_dir_sep__1(name, i__0)) {
          if (46 === caml_string_get(name, i__0)) {return check(i__0, i__0 + -1 | 0);}
          i__1 = i__0 + -1 | 0;
          i__0 = i__1;
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
    call3(String[4], name, caml_ml_string_length(name) - l | 0, l);
}

function chop_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    call1(Pervasives[1], cst_Filename_chop_extension) :
    call3(String[4], name, 0, caml_ml_string_length(name) - l | 0);
}

function remove_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    name :
    call3(String[4], name, 0, caml_ml_string_length(name) - l | 0);
}

var prng = [246,function(t_) {return call1(Random[11][2], 0);}];

function temp_file_name(temp_dir, prefix, suffix) {
  var r_ = runtime["caml_obj_tag"](prng);
  var s_ = 250 === r_ ?
    prng[1] :
    246 === r_ ? call1(CamlinternalLazy[2], prng) : prng;
  var rnd = call1(Random[11][4], s_) & 16777215;
  return concat(temp_dir, call4(Printf[4], b_, prefix, rnd, suffix));
}

var current_temp_dir_name = [0,temp_dir_name__1];

function set_temp_dir_name(s) {current_temp_dir_name[1] = s;return 0;}

function get_temp_dir_name(param) {return current_temp_dir_name[1];}

function temp_file(opt, prefix, suffix) {
  var temp_dir;
  var sth;
  if (opt) {
    sth = opt[1];
    temp_dir = sth;
  }
  else temp_dir = current_temp_dir_name[1];
  function try_name(counter) {
    var name;
    var counter__1;
    var counter__0 = counter;
    for (; ; ) {
      name = temp_file_name(temp_dir, prefix, suffix);
      try {
        runtime["caml_sys_close"](runtime["caml_sys_open"](name, c_, 384));
        return name;
      }
      catch(e) {
        e = runtime["caml_wrap_exception"](e);
        if (e[1] === Sys_error) {
          if (1e3 <= counter__0) {
            throw caml_wrap_thrown_exception_reraise(e);
          }
          counter__1 = counter__0 + 1 | 0;
          counter__0 = counter__1;
          continue;
        }
        throw caml_wrap_thrown_exception_reraise(e);
      }
    }
  }
  return try_name(0);
}

function open_temp_file(opt, p_, o_, prefix, suffix) {
  var temp_dir;
  var sth__1;
  var perms;
  var sth__0;
  var mode;
  var sth;
  if (opt) {
    sth = opt[1];
    mode = sth;
  }
  else mode = d_;
  if (p_) {
    sth__0 = p_[1];
    perms = sth__0;
  }
  else perms = 384;
  if (o_) {
    sth__1 = o_[1];
    temp_dir = sth__1;
  }
  else temp_dir = current_temp_dir_name[1];
  function try_name(counter) {
    var name;
    var counter__1;
    var q_;
    var counter__0 = counter;
    for (; ; ) {
      name = temp_file_name(temp_dir, prefix, suffix);
      try {
        q_ =
          [0,name,call3(Pervasives[50], [0,1,[0,3,[0,5,mode]]], perms, name)];
        return q_;
      }
      catch(e) {
        e = runtime["caml_wrap_exception"](e);
        if (e[1] === Sys_error) {
          if (1e3 <= counter__0) {
            throw caml_wrap_thrown_exception_reraise(e);
          }
          counter__1 = counter__0 + 1 | 0;
          counter__0 = counter__1;
          continue;
        }
        throw caml_wrap_thrown_exception_reraise(e);
      }
    }
  }
  return try_name(0);
}

var Filename = [
  0,
  current_dir_name__2,
  parent_dir_name__2,
  dir_sep__2,
  concat,
  is_relative__1,
  is_implicit__1,
  check_suffix__1,
  chop_suffix,
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

module.exports = Filename;

/*::type Exports = {
  current_dir_name: any,
  parent_dir_name: any,
  dir_sep: any,
  concat: (dirname: any, filename: any) => any,
  is_relative: (n: any) => any,
  is_implicit: (n: any) => any,
  check_suffix: (name: any, suff: any) => any,
  chop_suffix: (name: any, suff: any) => any,
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
module.exports.extension = module.exports[9];
module.exports.remove_extension = module.exports[10];
module.exports.chop_extension = module.exports[11];
module.exports.basename = module.exports[12];
module.exports.dirname = module.exports[13];
module.exports.temp_file = module.exports[14];
module.exports.open_temp_file = module.exports[15];
module.exports.get_temp_dir_name = module.exports[16];
module.exports.set_temp_dir_name = module.exports[17];
module.exports.temp_dir_name = module.exports[18];
module.exports.quote = module.exports[19];

/* Hashing disabled */
