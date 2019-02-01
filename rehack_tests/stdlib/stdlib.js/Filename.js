/**
 * Filename
 * @providesModule Filename
 */
"use strict";
var Buffer = require('Buffer.js');
var CamlinternalLazy = require('CamlinternalLazy.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var Random = require('Random.js');
var String_ = require('String_.js');
var Sys = require('Sys.js');
var Not_found = require('Not_found.js');
var Sys_error = require('Sys_error.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_ml_string_length = runtime.caml_ml_string_length;
var caml_new_string = runtime.caml_new_string;
var caml_string_equal = runtime.caml_string_equal;
var caml_string_get = runtime.caml_string_get;
var caml_string_notequal = runtime.caml_string_notequal;
var caml_sys_getenv = runtime.caml_sys_getenv;
var caml_trampoline = runtime.caml_trampoline;
var caml_trampoline_return = runtime.caml_trampoline_return;
var caml_wrap_exception = runtime.caml_wrap_exception;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ? f(a0, a1, a2) : runtime.caml_call_gen(f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length == 4 ?
    f(a0, a1, a2, a3) :
    runtime.caml_call_gen(f, [a0,a1,a2,a3]);
}

var global_data = runtime.caml_get_global_data();
var cst_Filename_chop_extension = caml_new_string("Filename.chop_extension");
var cst__10 = caml_new_string("");
var cst_Filename_chop_suffix = caml_new_string("Filename.chop_suffix");
var cst__9 = caml_new_string("");
var cst__7 = caml_new_string("./");
var cst__6 = caml_new_string(".\\");
var cst__5 = caml_new_string("../");
var cst__4 = caml_new_string("..\\");
var cst__2 = caml_new_string("./");
var cst__1 = caml_new_string("../");
var cst__0 = caml_new_string("");
var cst = caml_new_string("");
var current_dir_name = caml_new_string(".");
var parent_dir_name = caml_new_string("..");
var dir_sep = caml_new_string("/");
var cst_TMPDIR = caml_new_string("TMPDIR");
var cst_tmp = caml_new_string("/tmp");
var cst__3 = caml_new_string("'\\''");
var current_dir_name__0 = caml_new_string(".");
var parent_dir_name__0 = caml_new_string("..");
var dir_sep__0 = caml_new_string("\\");
var cst_TEMP = caml_new_string("TEMP");
var cst__8 = caml_new_string(".");
var current_dir_name__1 = caml_new_string(".");
var parent_dir_name__1 = caml_new_string("..");
var dir_sep__1 = caml_new_string("/");
var cst_Cygwin = caml_new_string("Cygwin");
var cst_Win32 = caml_new_string("Win32");
var Pervasives = global_data.Pervasives;
var Sys_error = global_data.Sys_error;
var CamlinternalLazy = global_data.CamlinternalLazy;
var Random = global_data.Random;
var Printf = global_data.Printf;
var String = global_data.String;
var Buffer = global_data.Buffer;
var Not_found = global_data.Not_found;
var Sys = global_data.Sys;
var Bh = [0,7,0];
var Bg = [0,1,[0,3,[0,5,0]]];
var Bf = [0,[2,0,[4,6,[0,2,6],0,[2,0,0]]],caml_new_string("%s%06x%s")];

function generic_quote(quotequote, s) {
  var l = caml_ml_string_length(s);
  var b = caml_call1(Buffer[1], l + 20 | 0);
  caml_call2(Buffer[10], b, 39);
  var Cj = l + -1 | 0;
  var Ci = 0;
  if (! (Cj < 0)) {
    var i = Ci;
    for (; ; ) {
      if (39 === caml_string_get(s, i)) caml_call2(
        Buffer[14],
        b,
        quotequote
      );
      else {var Cl = caml_string_get(s, i);caml_call2(Buffer[10], b, Cl);}
      var Ck = i + 1 | 0;
      if (Cj !== i) {var i = Ck;continue;}
      break;
    }
  }
  caml_call2(Buffer[10], b, 39);
  return caml_call1(Buffer[2], b);
}

function generic_basename(is_dir_sep, current_dir_name, name) {
  function find_beg(n, p) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (caml_call2(is_dir_sep, name, n__0)) {
          return caml_call3(
            String[4],
            name,
            n__0 + 1 | 0,
            (p - n__0 | 0) + -1 | 0
          );
        }
        var n__1 = n__0 + -1 | 0;
        var n__0 = n__1;
        continue;
      }
      return caml_call3(String[4], name, 0, p);
    }
  }
  function find_end(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (caml_call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return find_beg(n__0, n__0 + 1 | 0);
      }
      return caml_call3(String[4], name, 0, 1);
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
        if (caml_call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return caml_call3(String[4], name, 0, n__0 + 1 | 0);
      }
      return caml_call3(String[4], name, 0, 1);
    }
  }
  function base(n) {
    var n__0 = n;
    for (; ; ) {
      if (0 <= n__0) {
        if (caml_call2(is_dir_sep, name, n__0)) {return intermediate_sep(n__0);}
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
        if (caml_call2(is_dir_sep, name, n__0)) {
          var n__1 = n__0 + -1 | 0;
          var n__0 = n__1;
          continue;
        }
        return base(n__0);
      }
      return caml_call3(String[4], name, 0, 1);
    }
  }
  return caml_string_equal(name, cst__0) ?
    current_dir_name :
    trailing_sep(caml_ml_string_length(name) + -1 | 0);
}

function is_dir_sep(s, i) {return 47 === caml_string_get(s, i) ? 1 : 0;}

function is_relative(n) {
  var Cg = caml_ml_string_length(n) < 1 ? 1 : 0;
  var Ch = Cg || (47 !== caml_string_get(n, 0) ? 1 : 0);
  return Ch;
}

function is_implicit(n) {
  var Cb = is_relative(n);
  if (Cb) {
    var Cc = caml_ml_string_length(n) < 2 ? 1 : 0;
    var Cd = Cc ||
      caml_string_notequal(caml_call3(String[4], n, 0, 2), cst__2);
    if (Cd) {
      var Ce = caml_ml_string_length(n) < 3 ? 1 : 0;
      var Cf = Ce ||
        caml_string_notequal(caml_call3(String[4], n, 0, 3), cst__1);
    }
    else var Cf = Cd;
  }
  else var Cf = Cb;
  return Cf;
}

function check_suffix(name, suff) {
  var B_ = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  var Ca = B_ ?
    caml_string_equal(
     caml_call3(
       String[4],
       name,
       caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
       caml_ml_string_length(suff)
     ),
     suff
   ) :
    B_;
  return Ca;
}

try {var Br = caml_sys_getenv(cst_TMPDIR);var temp_dir_name = Br;}
catch(B9) {
  B9 = caml_wrap_exception(B9);
  if (B9 !== Not_found) {
    throw runtime.caml_wrap_thrown_exception_reraise(B9);
  }
  var temp_dir_name = cst_tmp;
}

function quote(B8) {return generic_quote(cst__3, B8);}

function basename(B7) {
  return generic_basename(is_dir_sep, current_dir_name, B7);
}

function dirname(B6) {
  return generic_dirname(is_dir_sep, current_dir_name, B6);
}

function is_dir_sep__0(s, i) {
  var c = caml_string_get(s, i);
  var B3 = 47 === c ? 1 : 0;
  if (B3) var B4 = B3;
  else {var B5 = 92 === c ? 1 : 0;var B4 = B5 || (58 === c ? 1 : 0);}
  return B4;
}

function is_relative__0(n) {
  var BX = caml_ml_string_length(n) < 1 ? 1 : 0;
  var BY = BX || (47 !== caml_string_get(n, 0) ? 1 : 0);
  if (BY) {
    var BZ = caml_ml_string_length(n) < 1 ? 1 : 0;
    var B0 = BZ || (92 !== caml_string_get(n, 0) ? 1 : 0);
    if (B0) {
      var B1 = caml_ml_string_length(n) < 2 ? 1 : 0;
      var B2 = B1 || (58 !== caml_string_get(n, 1) ? 1 : 0);
    }
    else var B2 = B0;
  }
  else var B2 = BY;
  return B2;
}

function is_implicit__0(n) {
  var BO = is_relative__0(n);
  if (BO) {
    var BP = caml_ml_string_length(n) < 2 ? 1 : 0;
    var BQ = BP ||
      caml_string_notequal(caml_call3(String[4], n, 0, 2), cst__7);
    if (BQ) {
      var BR = caml_ml_string_length(n) < 2 ? 1 : 0;
      var BS = BR ||
        caml_string_notequal(caml_call3(String[4], n, 0, 2), cst__6);
      if (BS) {
        var BT = caml_ml_string_length(n) < 3 ? 1 : 0;
        var BU = BT ||
          caml_string_notequal(caml_call3(String[4], n, 0, 3), cst__5);
        if (BU) {
          var BV = caml_ml_string_length(n) < 3 ? 1 : 0;
          var BW = BV ||
            caml_string_notequal(caml_call3(String[4], n, 0, 3), cst__4);
        }
        else var BW = BU;
      }
      else var BW = BS;
    }
    else var BW = BQ;
  }
  else var BW = BO;
  return BW;
}

function check_suffix__0(name, suff) {
  var BL = caml_ml_string_length(suff) <= caml_ml_string_length(name) ? 1 : 0;
  if (BL) {
    var s = caml_call3(
      String[4],
      name,
      caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
      caml_ml_string_length(suff)
    );
    var BM = caml_call1(String[30], suff);
    var BN = caml_string_equal(caml_call1(String[30], s), BM);
  }
  else var BN = BL;
  return BN;
}

try {var Bq = caml_sys_getenv(cst_TEMP);var temp_dir_name__0 = Bq;}
catch(BK) {
  BK = caml_wrap_exception(BK);
  if (BK !== Not_found) {
    throw runtime.caml_wrap_thrown_exception_reraise(BK);
  }
  var temp_dir_name__0 = cst__8;
}

function quote__0(s) {
  var l = caml_ml_string_length(s);
  var b = caml_call1(Buffer[1], l + 20 | 0);
  caml_call2(Buffer[10], b, 34);
  function add_bs(n) {
    var BI = 1;
    if (! (n < 1)) {
      var j = BI;
      for (; ; ) {
        caml_call2(Buffer[10], b, 92);
        var BJ = j + 1 | 0;
        if (n !== j) {var j = BJ;continue;}
        break;
      }
    }
    return 0;
  }
  function loop__0(counter, i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {return caml_call2(Buffer[10], b, 34);}
      var c = caml_string_get(s, i__0);
      if (34 === c) {
        var BG = 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return loop_bs(counter__1, BG, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,BG,i__0]);
      }
      if (92 === c) {
        var BH = 0;
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return loop_bs(counter__0, BH, i__0);
        }
        return caml_trampoline_return(loop_bs, [0,BH,i__0]);
      }
      caml_call2(Buffer[10], b, c);
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  function loop_bs(counter, n, i) {
    var n__0 = n;
    var i__0 = i;
    for (; ; ) {
      if (i__0 === l) {caml_call2(Buffer[10], b, 34);return add_bs(n__0);}
      var match = caml_string_get(s, i__0);
      if (34 === match) {
        add_bs((2 * n__0 | 0) + 1 | 0);
        caml_call2(Buffer[10], b, 34);
        var BF = i__0 + 1 | 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return loop__0(counter__1, BF);
        }
        return caml_trampoline_return(loop__0, [0,BF]);
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
  return caml_call1(Buffer[2], b);
}

function has_drive(s) {
  function is_letter(param) {
    var switch__0 = 91 <= param ?
      25 < (param + -97 | 0) >>> 0 ? 0 : 1 :
      65 <= param ? 1 : 0;
    return switch__0 ? 1 : 0;
  }
  var BC = 2 <= caml_ml_string_length(s) ? 1 : 0;
  if (BC) {
    var BD = is_letter(caml_string_get(s, 0));
    var BE = BD ? 58 === caml_string_get(s, 1) ? 1 : 0 : BD;
  }
  else var BE = BC;
  return BE;
}

function drive_and_path(s) {
  if (has_drive(s)) {
    var BB = caml_call3(String[4], s, 2, caml_ml_string_length(s) + -2 | 0);
    return [0,caml_call3(String[4], s, 0, 2),BB];
  }
  return [0,cst__9,s];
}

function dirname__0(s) {
  var match = drive_and_path(s);
  var path = match[2];
  var drive = match[1];
  var dir = generic_dirname(is_dir_sep__0, current_dir_name__0, path);
  return caml_call2(Pervasives[16], drive, dir);
}

function basename__0(s) {
  var match = drive_and_path(s);
  var path = match[2];
  return generic_basename(is_dir_sep__0, current_dir_name__0, path);
}

function basename__1(BA) {
  return generic_basename(is_dir_sep__0, current_dir_name__1, BA);
}

function dirname__1(Bz) {
  return generic_dirname(is_dir_sep__0, current_dir_name__1, Bz);
}

var Be = Sys[5];

if (caml_string_notequal(Be, cst_Cygwin)) if (caml_string_notequal(Be, cst_Win32)) {
  var current_dir_name__2 = current_dir_name;
  var parent_dir_name__2 = parent_dir_name;
  var dir_sep__2 = dir_sep;
  var is_dir_sep__1 = is_dir_sep;
  var is_relative__1 = is_relative;
  var is_implicit__1 = is_implicit;
  var check_suffix__1 = check_suffix;
  var temp_dir_name__1 = temp_dir_name;
  var quote__1 = quote;
  var basename__2 = basename;
  var dirname__2 = dirname;
  var switch__0 = 1;
}
else {
  var Bi = [
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
  var switch__0 = 0;
}
else {
  var Bi = [
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
  var switch__0 = 0;
}

if (! switch__0) {
  var Bj = Bi[11];
  var Bk = Bi[10];
  var Bl = Bi[9];
  var Bm = Bi[8];
  var Bn = Bi[3];
  var Bo = Bi[2];
  var Bp = Bi[1];
  var current_dir_name__2 = Bp;
  var parent_dir_name__2 = Bo;
  var dir_sep__2 = Bn;
  var is_dir_sep__1 = is_dir_sep__0;
  var is_relative__1 = is_relative__0;
  var is_implicit__1 = is_implicit__0;
  var check_suffix__1 = check_suffix__0;
  var temp_dir_name__1 = Bm;
  var quote__1 = Bl;
  var basename__2 = Bk;
  var dirname__2 = Bj;
}

function concat(dirname, filename) {
  var l = caml_ml_string_length(dirname);
  if (0 !== l) {
    if (! is_dir_sep__1(dirname, l + -1 | 0)) {
      var By = caml_call2(Pervasives[16], dir_sep__2, filename);
      return caml_call2(Pervasives[16], dirname, By);
    }
  }
  return caml_call2(Pervasives[16], dirname, filename);
}

function chop_suffix(name, suff) {
  var n = caml_ml_string_length(name) - caml_ml_string_length(suff) | 0;
  return 0 <= n ?
    caml_call3(String[4], name, 0, n) :
    caml_call1(Pervasives[1], cst_Filename_chop_suffix);
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
    caml_call3(String[4], name, caml_ml_string_length(name) - l | 0, l);
}

function chop_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    caml_call1(Pervasives[1], cst_Filename_chop_extension) :
    caml_call3(String[4], name, 0, caml_ml_string_length(name) - l | 0);
}

function remove_extension(name) {
  var l = extension_len(name);
  return 0 === l ?
    name :
    caml_call3(String[4], name, 0, caml_ml_string_length(name) - l | 0);
}

var prng = [246,function(Bx) {return caml_call1(Random[11][2], 0);}];

function temp_file_name(temp_dir, prefix, suffix) {
  var Bv = runtime.caml_obj_tag(prng);
  var Bw = 250 === Bv ?
    prng[1] :
    246 === Bv ? caml_call1(CamlinternalLazy[2], prng) : prng;
  var rnd = caml_call1(Random[11][4], Bw) & 16777215;
  return concat(temp_dir, caml_call4(Printf[4], Bf, prefix, rnd, suffix));
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
        runtime.caml_sys_close(runtime.caml_sys_open(name, Bg, 384));
        return name;
      }
      catch(e) {
        e = caml_wrap_exception(e);
        if (e[1] === Sys_error) {
          if (1e3 <= counter__0) {
            throw runtime.caml_wrap_thrown_exception_reraise(e);
          }
          var counter__1 = counter__0 + 1 | 0;
          var counter__0 = counter__1;
          continue;
        }
        throw runtime.caml_wrap_thrown_exception_reraise(e);
      }
    }
  }
  return try_name(0);
}

function open_temp_file(opt, Bt, Bs, prefix, suffix) {
  if (opt) {
    var sth = opt[1];
    var mode = sth;
  }
  else var mode = Bh;
  if (Bt) {
    var sth__0 = Bt[1];
    var perms = sth__0;
  }
  else var perms = 384;
  if (Bs) {
    var sth__1 = Bs[1];
    var temp_dir = sth__1;
  }
  else var temp_dir = current_temp_dir_name[1];
  function try_name(counter) {
    var counter__0 = counter;
    for (; ; ) {
      var name = temp_file_name(temp_dir, prefix, suffix);
      try {
        var Bu = [
          0,
          name,
          caml_call3(Pervasives[50], [0,1,[0,3,[0,5,mode]]], perms, name)
        ];
        return Bu;
      }
      catch(e) {
        e = caml_wrap_exception(e);
        if (e[1] === Sys_error) {
          if (1e3 <= counter__0) {
            throw runtime.caml_wrap_thrown_exception_reraise(e);
          }
          var counter__1 = counter__0 + 1 | 0;
          var counter__0 = counter__1;
          continue;
        }
        throw runtime.caml_wrap_thrown_exception_reraise(e);
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

runtime.caml_register_global(40, Filename, "Filename");


module.exports = global.jsoo_runtime.caml_get_global_data().Filename;