function polymorphic_log(s) {console.log(c in s ? s.c : s);} /**
 * Main executable compiled output. Runtime included in compilation output.
 */

"use strict";

let joo_global_object = typeof global !== 'undefined' ? global : window;


function caml_alloc_dummy_function(size, arity) {
  function f() {return f.fun.apply(this, arguments);}
  ;
  f.length = arity;
  return f;
}

function raw_array_sub(a, i, l) {
  var b = new Array(l);
  for (var j = 0; j < l; j++) b[j] = a[i + j];
  return b;
}

function caml_subarray_to_string(a, i, len) {
  var f = String.fromCharCode;
  if (i == 0 && len <= 4096 && len == a.length) {return f.apply(null, a);}
  var s = "";
  for (; 0 < len; i += 1024,len -= 1024) s +=
    f.apply(null, raw_array_sub(a, i, Math.min(len, 1024)));
  return s;
}

function caml_convert_string_to_array(s) {
  if (joo_global_object.Uint8Array) {
    var a = new (joo_global_object.Uint8Array)(s.l);
  }
  else {var a = new Array(s.l);}
  var b = s.c, l = b.length, i = 0;
  for (; i < l; i++) a[i] = b.charCodeAt(i);
  for (l = s.l; i < l; i++) a[i] = 0;
  s.c = a;
  s.t = 4;
  return a;
}

function caml_blit_bytes(s1, i1, s2, i2, len) {
  if (len == 0) {return 0;}
  if (i2 == 0 && (len >= s2.l || s2.t == 2 && len >= s2.c.length)) {
    s2.c =
      s1.t == 4 ?
        caml_subarray_to_string(s1.c, i1, len) :
        i1 == 0 && s1.c.length == len ? s1.c : s1.c.substr(i1, len);
    s2.t = s2.c.length == s2.l ? 0 : 2;
  }
  else if (s2.t == 2 && i2 == s2.c.length) {
    s2.c +=
      s1.t == 4 ?
        caml_subarray_to_string(s1.c, i1, len) :
        i1 == 0 && s1.c.length == len ? s1.c : s1.c.substr(i1, len);
    s2.t = s2.c.length == s2.l ? 0 : 2;
  }
  else {
    if (s2.t != 4) {caml_convert_string_to_array(s2);}
    var c1 = s1.c, c2 = s2.c;
    if (s1.t == 4) {
      if (i2 <= i1) {
        for (var i = 0; i < len; i++) c2[i2 + i] = c1[i1 + i];
      }
      else {for (var i = len - 1; i >= 0; i--) c2[i2 + i] = c1[i1 + i];}
    }
    else {
      var l = Math.min(len, c1.length - i1);
      for (var i = 0; i < l; i++) c2[i2 + i] = c1.charCodeAt(i1 + i);
      for (; i < len; i++) c2[i2 + i] = 0;
    }
  }
  return 0;
}

function caml_blit_string(s1, i1, s2, i2, len) {return caml_blit_bytes(s1, i1, s2, i2, len);
}

function caml_bytes_unsafe_get(s, i) {
  switch (s.t & 6) {
    default:
      if (i >= s.c.length) {return 0;}
    case 0:
      return s.c.charCodeAt(i) | 0;
    case 4:
      return s.c[i]
    }
}

function caml_bytes_unsafe_set(s, i, c) {
  c &= 255;
  if (s.t != 4) {
    if (i == s.c.length) {
      s.c += String.fromCharCode(c);
      if (i + 1 == s.l) {s.t = 0;}
      return 0;
    }
    caml_convert_string_to_array(s);
  }
  s.c[i] = c;
  return 0;
}

function raw_array_append_one(a, x) {
  var l = a.length;
  var b = new Array(l + 1);
  var i = 0;
  for (; i < l; i++) b[i] = a[i];
  b[i] = x;
  return b;
}

function caml_call_gen(f, args) {
  if (f.fun) {return caml_call_gen(f.fun, args);}
  var n = f.length;
  var argsLen = args.length;
  var d = n - argsLen;
  if (d == 0) return f.apply(
    null,
    args
  );
  else if (d < 0) return caml_call_gen(
    f.apply(null, raw_array_sub(args, 0, n)),
    raw_array_sub(args, n, argsLen - n)
  );
  else return function(x) {
    return caml_call_gen(f, raw_array_append_one(args, x));
  };
}

var caml_global_data = [0];

function caml_wrap_thrown_exception(exn) {
  exn.stack_trace =
    new (joo_global_object.Error)("Js exception containing backtrace");
  return exn;
}

function caml_raise_with_arg(tag, arg) {
  throw caml_wrap_thrown_exception([0,tag,arg]);
}

function caml_str_repeat(n, s) {
  if (s.repeat) {return s.repeat(n);}
  var r = "", l = 0;
  if (n == 0) {return r;}
  for (; ; ) {
    if (n & 1) {r += s;}
    n >>= 1;
    if (n == 0) {return r;}
    s += s;
    l++;
    if (l == 9) {s.slice(0, 1);}
  }
}

function caml_convert_string_to_bytes(s) {
  if (s.t == 2) s.c +=
    caml_str_repeat(s.l - s.c.length, "\0");
  else s.c = caml_subarray_to_string(s.c, 0, s.c.length);
  s.t = 0;
}

function caml_is_ascii(s) {
  if (s.length < 24) {
    for (var i = 0; i < s.length; i++) if (s.charCodeAt(i) > 127) {return false;}
    return true;
  }
  else return ! /[^\x00-\x7f]/.test(s);
}

function caml_utf16_of_utf8(s) {
  for (var b = "", t = "", c, c1, c2, v, i = 0, l = s.length; i < l; i++) {
    c1 = s.charCodeAt(i);
    if (c1 < 128) {
      for (var j = i + 1; j < l && (c1 = s.charCodeAt(j)) < 128; j++) ;
      if (j - i > 512) {
        t.substr(0, 1);
        b += t;
        t = "";
        b += s.slice(i, j);
      }
      else t += s.slice(i, j);
      if (j == l) {break;}
      i = j;
    }
    v = 1;
    if (++i < l && ((c2 = s.charCodeAt(i)) & - 64) == 128) {
      c = c2 + (c1 << 6);
      if (c1 < 224) {
        v = c - 12416;
        if (v < 128) {v = 1;}
      }
      else {
        v = 2;
        if (++i < l && ((c2 = s.charCodeAt(i)) & - 64) == 128) {
          c = c2 + (c << 6);
          if (c1 < 240) {
            v = c - 925824;
            if (v < 2048 || v >= 55295 && v < 57344) {v = 2;}
          }
          else {
            v = 3;
            if (++i < l && ((c2 = s.charCodeAt(i)) & - 64) == 128 && c1 < 245) {
              v = c2 - 63447168 + (c << 6);
              if (v < 65536 || v > 1114111) {v = 3;}
            }
          }
        }
      }
    }
    if (v < 4) {
      i -= v;
      t += "\ufffd";
    }
    else if (v > 65535) t +=
      String.fromCharCode(55232 + (v >> 10), 56320 + (v & 1023));
    else t += String.fromCharCode(v);
    if (t.length > 1024) {t.substr(0, 1);b += t;t = "";}
  }
  return b + t;
}

function caml_to_js_string(s) {
  switch (s.t) {
    case 9:
      return s.c;
    default:
      caml_convert_string_to_bytes(s);
    case 0:
      if (caml_is_ascii(s.c)) {s.t = 9;return s.c;}
      s.t = 8;
    case 8:
      return caml_utf16_of_utf8(s.c)
    }
}

function MlBytes(tag, contents, length) {
  this.t = tag;
  this.c = contents;
  this.l = length;
}

MlBytes.prototype.toString = function() {return caml_to_js_string(this);};

MlBytes.prototype.slice =
  function() {
    var content = this.t == 4 ? this.c.slice() : this.c;
    return new MlBytes(this.t, content, this.l);
  };

function caml_new_string(s) {return new MlBytes(0, s, s.length);}

function caml_raise_with_string(tag, msg) {
  caml_raise_with_arg(tag, caml_new_string(msg));
}

function caml_invalid_argument(msg) {
  caml_raise_with_string(caml_global_data.Invalid_argument, msg);
}

function caml_array_bound_error() {
  caml_invalid_argument("index out of bounds");
}

function caml_check_bound(array, index) {
  if (index >>> 0 >= array.length - 1) {caml_array_bound_error();}
  return array;
}

function caml_create_bytes(len) {
  if (len < 0) {caml_invalid_argument("Bytes.create");}
  return new MlBytes(len ? 2 : 9, "", len);
}

function caml_int64_compare(x, y) {
  var x3 = x[3] << 16;
  var y3 = y[3] << 16;
  if (x3 > y3) {return 1;}
  if (x3 < y3) {return - 1;}
  if (x[2] > y[2]) {return 1;}
  if (x[2] < y[2]) {return - 1;}
  if (x[1] > y[1]) {return 1;}
  if (x[1] < y[1]) {return - 1;}
  return 0;
}

function caml_int_compare(a, b) {
  if (a < b) {return - 1;}
  if (a == b) {return 0;}
  return 1;
}

function caml_string_compare(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c < s2.c ? - 1 : s1.c > s2.c ? 1 : 0;
}



  // Consumes NaN




var is_in = 0;


function caml_compare_val(a, b, total) {
  var stack = [];
  for (; ; ) {
    if (! (total && a === b)) {
      if (a instanceof MlBytes) {
        if (b instanceof MlBytes) {
          if (a !== b) {
            var x = caml_string_compare(a, b);
            if (x != 0) {return x;}
          }
        }
        else return 1;
      }
      else if (a instanceof Array && a[0] === (a[0] | 0)) {
        var ta = a[0];
        if (ta === 254) {ta = 0;}
        if (ta === 250) {
          a = a[1];
          continue;
        }
        else if (b instanceof Array && b[0] === (b[0] | 0)) {
          var tb = b[0];
          if (tb === 254) {tb = 0;}
          if (tb === 250) {
            b = b[1];
            continue;
          }
          else if (ta != tb) {
            return ta < tb ? - 1 : 1;
          }
          else {
            switch (ta) {
              case 248:
                {
                  var x = caml_int_compare(a[2], b[2]);
                  if (x != 0) {return x;}
                  break;
                }
              case 251:
                {caml_invalid_argument("equal: abstract value");
                }
              case 255:
                {
                  var x = caml_int64_compare(a, b);
                  if (x != 0) {return x;}
                  break;
                }
              default:
                if (a.length != b.length) {
                  return a.length < b.length ? - 1 : 1;
                }
                if (a.length > 1) {stack.push(a, b, 1);}
              }
          }
        }
        else return 1;
      }
      else if (
        b instanceof MlBytes ||
          b instanceof Array &&
            b[0] ===
              (b[0] | 0)
      ) {return - 1;}
      else if (typeof a != "number" && a && "compare" in a) {
        var cmp = a.compare(b, total);
        if (cmp != 0) {return cmp;}
      }
      else if (typeof a == "function") {
        caml_invalid_argument("compare: functional value");
      }
      else {
        if (a < b) {return - 1;}
        if (a > b) {return 1;}
        if (a != b) {
          if (! total) {return NaN;}
          if (a == a) {return 1;}
          if (b == b) {return - 1;}
        }
      }
    }
    if (stack.length == 0) {return 0;}
    var i = stack.pop();
    b = stack.pop();
    a = stack.pop();
    if (i + 1 < a.length) {stack.push(a, b, i + 1);}
    a = a[i];
    b = b[i];
  }
}

function caml_equal(x, y) {return + (caml_compare_val(x, y, false) == 0);}



  /* Uses isFinite */


function caml_jsbytes_of_string(s) {
  if ((s.t & 6) != 0) {caml_convert_string_to_bytes(s);}
  return s.c;
}

function caml_parse_format(fmt) {
  fmt = caml_jsbytes_of_string(fmt);
  var len = fmt.length;
  if (len > 31) {caml_invalid_argument("format_int: format too long");}
  var f = {
    justify: "+",
    signstyle: "-",
    filler: " ",
    alternate: false,
    base: 0,
    signedconv: false,
    width: 0,
    uppercase: false,
    sign: 1,
    prec: - 1,
    conv: "f"
  };
  for (var i = 0; i < len; i++) {
    var c = fmt.charAt(i);
    switch (c) {
      case "-":
        f.justify = "-";
        break;
      case "+":
      case " ":
        f.signstyle = c;
        break;
      case "0":
        f.filler = "0";
        break;
      case "#":
        f.alternate = true;
        break;
      case "1":
      case "2":
      case "3":
      case "4":
      case "5":
      case "6":
      case "7":
      case "8":
      case "9":
        f.width = 0;
        while(c = fmt.charCodeAt(i) - 48,c >= 0 && c <= 9) {f.width = f.width * 10 + c;i++;}
        i--;
        break;
      case ".":
        f.prec = 0;
        i++;
        while(c = fmt.charCodeAt(i) - 48,c >= 0 && c <= 9) {f.prec = f.prec * 10 + c;i++;}
        i--;
      case "d":
      case "i":
        f.signedconv = true;
      case "u":
        f.base = 10;
        break;
      case "x":
        f.base = 16;
        break;
      case "X":
        f.base = 16;
        f.uppercase = true;
        break;
      case "o":
        f.base = 8;
        break;
      case "e":
      case "f":
      case "g":
        f.signedconv = true;
        f.conv = c;
        break;
      case "E":
      case "F":
      case "G":
        f.signedconv = true;
        f.uppercase = true;
        f.conv = c.toLowerCase();
        break
      }
  }
  return f;
}

function caml_finish_formatting(f, rawbuffer) {
  if (f.uppercase) {rawbuffer = rawbuffer.toUpperCase();}
  var len = rawbuffer.length;
  if (f.signedconv && (f.sign < 0 || f.signstyle != "-")) {len++;}
  if (f.alternate) {if (f.base == 8) {len += 1;}if (f.base == 16) {len += 2;}}
  var buffer = "";
  if (f.justify == "+" && f.filler == " ") {
    for (var i = len; i < f.width; i++) buffer += " ";
  }
  if (f.signedconv) {
    if (f.sign < 0) buffer += "-";
    else if (f.signstyle != "-") {buffer += f.signstyle;}
  }
  if (f.alternate && f.base == 8) {buffer += "0";}
  if (f.alternate && f.base == 16) {buffer += "0x";}
  if (f.justify == "+" && f.filler == "0") {
    for (var i = len; i < f.width; i++) buffer += "0";
  }
  buffer += rawbuffer;
  if (f.justify == "-") {for (var i = len; i < f.width; i++) buffer += " ";}
  return caml_new_string(buffer);
}



  /* Uses isNaN */


function caml_format_float(fmt, x) {
  var s, f = caml_parse_format(fmt);
  var prec = f.prec < 0 ? 6 : f.prec;
  if (x < 0 || x == 0 && 1 / x == - Infinity) {f.sign = - 1;x = - x;}
  if (isNaN(x)) {
    s = "nan";
    f.filler = " ";
  }
  else if (! isFinite(x)) {
    s = "inf";
    f.filler = " ";
  }
  else switch (f.conv) {
    case "e":
      var s = x.toExponential(prec);
      var i = s.length;
      if (s.charAt(i - 3) == "e") {
        s = s.slice(0, i - 1) + "0" + s.slice(i - 1);
      }
      break;
    case "f":
      s = x.toFixed(prec);
      break;
    case "g":
      prec = prec ? prec : 1;
      s = x.toExponential(prec - 1);
      var j = s.indexOf("e");
      var exp = + s.slice(j + 1);
      if (exp < - 4 || x >= 1e+21 || x.toFixed(0).length > prec) {
        var i = j - 1;
        while(s.charAt(i) == "0") i--;
        if (s.charAt(i) == ".") {i--;}
        s = s.slice(0, i + 1) + s.slice(j);
        i = s.length;
        if (s.charAt(i - 3) == "e") {
          s = s.slice(0, i - 1) + "0" + s.slice(i - 1);
        }
        break;
      }
      else {
        var p = prec;
        if (exp < 0) {
          p -= exp + 1;
          s = x.toFixed(p);
        }
        else while(s = x.toFixed(p),s.length > prec + 1) p--;
        if (p) {
          var i = s.length - 1;
          while(s.charAt(i) == "0") i--;
          if (s.charAt(i) == ".") {i--;}
          s = s.slice(0, i + 1);
        }
      }
      break
    }
  return caml_finish_formatting(f, s);
}

var caml_oo_last_id = 0;

function caml_fresh_oo_id() {return caml_oo_last_id++;}

function caml_string_unsafe_get(s, i) {
  switch (s.t & 6) {
    default:
      if (i >= s.c.length) {return 0;}
    case 0:
      return s.c.charCodeAt(i);
    case 4:
      return s.c[i]
    }
}

function caml_ml_string_length(s) {return s.l;}

function caml_parse_sign_and_base(s) {
  var i = 0, len = caml_ml_string_length(s), base = 10, sign = 1;
  if (len > 0) {
    switch (caml_string_unsafe_get(s, i)) {
      case 45:
        i++;
        sign = - 1;
        break;
      case 43:
        i++;
        sign = 1;
        break
      }
  }
  if (i + 1 < len && caml_string_unsafe_get(s, i) == 48) {
    switch (caml_string_unsafe_get(s, i + 1)) {
      case 120:
      case 88:
        base = 16;
        i += 2;
        break;
      case 111:
      case 79:
        base = 8;
        i += 2;
        break;
      case 98:
      case 66:
        base = 2;
        i += 2;
        break
      }
  }
  return [i,sign,base];
}

function caml_parse_digit(c) {
  if (c >= 48 && c <= 57) {return c - 48;}
  if (c >= 65 && c <= 90) {return c - 55;}
  if (c >= 97 && c <= 122) {return c - 87;}
  return - 1;
}

function caml_failwith(msg) {
  caml_raise_with_string(caml_global_data.Failure, msg);
}

function caml_int_of_string(s) {
  var r = caml_parse_sign_and_base(s);
  var i = r[0], sign = r[1], base = r[2];
  var len = caml_ml_string_length(s);
  var threshold = - 1 >>> 0;
  var c = i < len ? caml_string_unsafe_get(s, i) : 0;
  var d = caml_parse_digit(c);
  if (d < 0 || d >= base) {caml_failwith("int_of_string");}
  var res = d;
  for (i++; i < len; i++) {
    c = caml_string_unsafe_get(s, i);
    if (c == 95) {continue;}
    d = caml_parse_digit(c);
    if (d < 0 || d >= base) {break;}
    res = base * res + d;
    if (res > threshold) {caml_failwith("int_of_string");}
  }
  if (i != len) {caml_failwith("int_of_string");}
  res = sign * res;
  if (base == 10 && (res | 0) != res) {caml_failwith("int_of_string");}
  return res | 0;
}

function caml_ml_bytes_length(s) {return s.l;}

function caml_raise_sys_error(msg) {
  caml_raise_with_string(caml_global_data.Sys_error, msg);
}

var caml_ml_channels = new Array();

function caml_ml_flush(chanid) {
  var chan = caml_ml_channels[chanid];
  if (! chan.opened) {caml_raise_sys_error("Cannot flush a closed channel");}
  if (! chan.buffer || chan.buffer == "") {return 0;}
  if (
  chan.fd && caml_global_data.fds[chan.fd] &&
    caml_global_data.fds[chan.fd].output
  ) {
    var output = caml_global_data.fds[chan.fd].output;
    switch (output.length) {
      case 2:
        output(chanid, chan.buffer);
        break;
      default:
        output(chan.buffer)
      }
    ;
  }
  chan.buffer = "";
  return 0;
}

if (joo_global_object.process && joo_global_object.process.cwd) var caml_current_dir = joo_global_object.process.cwd().replace(/\\/g, "/"
);
else var caml_current_dir = "/static";

if (caml_current_dir.slice(- 1) !== "/") {caml_current_dir += "/";}

function caml_make_path(name) {
  name = name instanceof MlBytes ? name.toString() : name;
  if (name.charCodeAt(0) != 47) {name = caml_current_dir + name;}
  var comp = name.split("/");
  var ncomp = [];
  for (var i = 0; i < comp.length; i++) {
    switch (comp[i]) {
      case "..":
        if (ncomp.length > 1) {ncomp.pop();}
        break;
      case ".":break;
      case "":
        if (ncomp.length == 0) {ncomp.push("");}
        break;
      default:
        ncomp.push(comp[i]);
        break
      }
  }
  ncomp.orig = name;
  return ncomp;
}

function caml_raise_no_such_file(name) {
  name = name instanceof MlBytes ? name.toString() : name;
  caml_raise_sys_error(name + ": No such file or directory");
}

function caml_string_of_array(a) {return new MlBytes(4, a, a.length);}

function caml_string_bound_error() {
  caml_invalid_argument("index out of bounds");
}

function caml_bytes_get(s, i) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_bytes_unsafe_get(s, i);
}

function MlFile() {}

function MlFakeFile(content) {this.data = content;}

MlFakeFile.prototype = new MlFile();

MlFakeFile.prototype.truncate =
  function(len) {
    var old = this.data;
    this.data = caml_create_bytes(len | 0);
    caml_blit_bytes(old, 0, this.data, 0, len);
  };

MlFakeFile.prototype.length =
  function() {return caml_ml_bytes_length(this.data);};

MlFakeFile.prototype.write =
  function(offset, buf, pos, len) {
    var clen = this.length();
    if (offset + len >= clen) {
      var new_str = caml_create_bytes(offset + len);
      var old_data = this.data;
      this.data = new_str;
      caml_blit_bytes(old_data, 0, this.data, 0, clen);
    }
    caml_blit_bytes(buf, pos, this.data, offset, len);
    return 0;
  };

MlFakeFile.prototype.read =
  function(offset, buf, pos, len) {
    var clen = this.length();
    caml_blit_bytes(this.data, offset, buf, pos, len);
    return 0;
  };

MlFakeFile.prototype.read_one =
  function(offset) {return caml_bytes_get(this.data, offset);};

MlFakeFile.prototype.close = function() {};

MlFakeFile.prototype.constructor = MlFakeFile;

function MlFakeDevice(root, f) {
  this.content = {};
  this.root = root;
  this.lookupFun = f;
}

MlFakeDevice.prototype.nm = function(name) {return this.root + name;};

MlFakeDevice.prototype.lookup =
  function(name) {
    if (! this.content[name] && this.lookupFun) {
      var res = this.lookupFun(
        caml_new_string(this.root),
        caml_new_string(name)
      );
      if (res != 0) {this.content[name] = new MlFakeFile(res[1]);}
    }
  };

MlFakeDevice.prototype.exists =
  function(name) {
    if (name == "") {return 1;}
    var name_slash = name + "/";
    var r = new RegExp("^" + name_slash);
    for (var n in this.content) {if (n.match(r)) {return 1;}}
    this.lookup(name);
    return this.content[name] ? 1 : 0;
  };

MlFakeDevice.prototype.readdir =
  function(name) {
    var name_slash = name == "" ? "" : name + "/";
    var r = new RegExp("^" + name_slash + "([^/]*)");
    var seen = {};
    var a = [];
    for (var n in this.content) {
      var m = n.match(r);
      if (m && ! seen[m[1]]) {seen[m[1]] = true;a.push(m[1]);}
    }
    return a;
  };

MlFakeDevice.prototype.is_dir =
  function(name) {
    var name_slash = name == "" ? "" : name + "/";
    var r = new RegExp("^" + name_slash + "([^/]*)");
    var a = [];
    for (var n in this.content) {var m = n.match(r);if (m) {return 1;}}
    return 0;
  };

MlFakeDevice.prototype.unlink =
  function(name) {
    var ok = this.content[name] ? true : false;
    delete this.content[name];
    return ok;
  };

MlFakeDevice.prototype.open =
  function(name, f) {
    if (f.rdonly && f.wronly) {
      caml_raise_sys_error(
        this.nm(name) +
          " : flags Open_rdonly and Open_wronly are not compatible"
      );
    }
    if (f.text && f.binary) {
      caml_raise_sys_error(
        this.nm(name) +
          " : flags Open_text and Open_binary are not compatible"
      );
    }
    this.lookup(name);
    if (this.content[name]) {
      if (this.is_dir(name)) {
        caml_raise_sys_error(this.nm(name) + " : is a directory");
      }
      if (f.create && f.excl) {
        caml_raise_sys_error(this.nm(name) + " : file already exists");
      }
      var file = this.content[name];
      if (f.truncate) {file.truncate();}
      return file;
    }
    else if (f.create) {
      this.content[name] = new MlFakeFile(caml_create_bytes(0));
      return this.content[name];
    }
    else {caml_raise_no_such_file(this.nm(name));}
  };

MlFakeDevice.prototype.register =
  function(name, content) {
    if (this.content[name]) {
      caml_raise_sys_error(this.nm(name) + " : file already exists");
    }
    if (content instanceof MlBytes) this.content[name] =
      new MlFakeFile(content);
    else if (content instanceof Array) this.content[name] =
      new MlFakeFile(caml_string_of_array(content));
    else if (content.toString) {
      var mlstring = caml_new_string(content.toString());
      this.content[name] = new MlFakeFile(mlstring);
    }
  };

MlFakeDevice.prototype.constructor = MlFakeDevice;

function caml_array_of_string(s) {
  if (s.t != 4) {caml_convert_string_to_array(s);}
  return s.c;
}

function caml_bytes_set(s, i, c) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_bytes_unsafe_set(s, i, c);
}

var Buffer = joo_global_object.Buffer;

function MlNodeFile(fd) {this.fs = require("fs");this.fd = fd;}

MlNodeFile.prototype = new MlFile();

MlNodeFile.prototype.truncate =
  function(len) {this.fs.ftruncateSync(this.fd, len | 0);};

MlNodeFile.prototype.length =
  function() {return this.fs.fstatSync(this.fd).size;};

MlNodeFile.prototype.write =
  function(offset, buf, buf_offset, len) {
    var a = caml_array_of_string(buf);
    if (! (a instanceof joo_global_object.Uint8Array)) {a = new (joo_global_object.Uint8Array)(a);}
    var buffer = Buffer.from(a);
    this.fs.writeSync(this.fd, buffer, buf_offset, len, offset);
    return 0;
  };

MlNodeFile.prototype.read =
  function(offset, buf, buf_offset, len) {
    var a = caml_array_of_string(buf);
    if (! (a instanceof joo_global_object.Uint8Array)) {a = new (joo_global_object.Uint8Array)(a);}
    var buffer = Buffer.from(a);
    this.fs.readSync(this.fd, buffer, buf_offset, len, offset);
    for (var i = 0; i < len; i++) {
      caml_bytes_set(buf, buf_offset + i, buffer[buf_offset + i]);
    }
    return 0;
  };

MlNodeFile.prototype.read_one =
  function(offset) {
    var a = new (joo_global_object.Uint8Array)(1);
    var buffer = Buffer.from(a);
    this.fs.readSync(this.fd, buffer, 0, 1, offset);
    return buffer[0];
  };

MlNodeFile.prototype.close = function() {this.fs.closeSync(this.fd);};

MlNodeFile.prototype.constructor = MlNodeFile;

function MlNodeDevice(root) {this.fs = require("fs");this.root = root;}

MlNodeDevice.prototype.nm = function(name) {return this.root + name;};

MlNodeDevice.prototype.exists =
  function(name) {return this.fs.existsSync(this.nm(name)) ? 1 : 0;};

MlNodeDevice.prototype.readdir =
  function(name) {return this.fs.readdirSync(this.nm(name));};

MlNodeDevice.prototype.is_dir =
  function(name) {
    return this.fs.statSync(this.nm(name)).isDirectory() ? 1 : 0;
  };

MlNodeDevice.prototype.unlink =
  function(name) {
    var b = this.fs.existsSync(this.nm(name)) ? 1 : 0;
    this.fs.unlinkSync(this.nm(name));
    return b;
  };

MlNodeDevice.prototype.open =
  function(name, f) {
    var consts = require("constants");
    var res = 0;
    for (var key in f) {
      switch (key) {
        case "rdonly":
          res |= consts.O_RDONLY;
          break;
        case "wronly":
          res |= consts.O_WRONLY;
          break;
        case "append":
          res |= consts.O_WRONLY | consts.O_APPEND;
          break;
        case "create":
          res |= consts.O_CREAT;
          break;
        case "truncate":
          res |= consts.O_TRUNC;
          break;
        case "excl":
          res |= consts.O_EXCL;
          break;
        case "binary":
          res |= consts.O_BINARY;
          break;
        case "text":
          res |= consts.O_TEXT;
          break;
        case "nonblock":
          res |= consts.O_NONBLOCK;
          break
        }
    }
    var fd = this.fs.openSync(this.nm(name), res);
    return new MlNodeFile(fd);
  };

MlNodeDevice.prototype.rename =
  function(o, n) {this.fs.renameSync(this.nm(o), this.nm(n));};

MlNodeDevice.prototype.constructor = MlNodeDevice;

var caml_root = caml_current_dir.match(/[^\/]*\//)[0];

function fs_node_supported() {
  return typeof joo_global_object.process !== "undefined" &&
    typeof joo_global_object.process.versions !== "undefined" &&
    typeof joo_global_object.process.versions.node !== "undefined";
}

var jsoo_mount_point = [];

if (fs_node_supported()) {
  jsoo_mount_point.push({path: caml_root,device: new MlNodeDevice(caml_root)});
}
else {
  jsoo_mount_point.push({path: caml_root,device: new MlFakeDevice(caml_root)});
}

jsoo_mount_point.push(
  {path: caml_root + "static/",device: new MlFakeDevice(caml_root + "static/")
  }
);

function resolve_fs_device(name) {
  var path = caml_make_path(name);
  var name = path.join("/");
  var name_slash = name + "/";
  var res;
  for (var i = 0; i < jsoo_mount_point.length; i++) {
    var m = jsoo_mount_point[i];
    if (
    name_slash.search(m.path) == 0 &&
      (! res || res.path.length < m.path.length)
    ) {
      res =
        {
          path: m.path,
          device: m.device,
          rest: name.substring(m.path.length, name.length)
        };
    }
  }
  return res;
}

function caml_std_output(chanid, s) {
  var chan = caml_ml_channels[chanid];
  var str = caml_new_string(s);
  var slen = caml_ml_string_length(str);
  chan.file.write(chan.offset, str, 0, slen);
  chan.offset += slen;
  return 0;
}

function js_print_stderr(s) {
  var g = joo_global_object;
  if (g.process && g.process.stdout && g.process.stdout.write) {g.process.stderr.write(s);}
  else {
    if (s.charCodeAt(s.length - 1) == 10) {s = s.substr(0, s.length - 1);}
    var v = g.console;
    v && v.error && v.error(s);
  }
}

function js_print_stdout(s) {
  var g = joo_global_object;
  if (g.process && g.process.stdout && g.process.stdout.write) {g.process.stdout.write(s);}
  else {
    if (s.charCodeAt(s.length - 1) == 10) {s = s.substr(0, s.length - 1);}
    var v = g.console;
    v && v.log && v.log(s);
  }
}

function caml_sys_open_internal(idx, output, file, flags) {
  if (caml_global_data.fds === undefined) {caml_global_data.fds = new Array();}
  flags = flags ? flags : {};
  var info = {};
  info.file = file;
  info.offset = flags.append ? file.length() : 0;
  info.flags = flags;
  info.output = output;
  caml_global_data.fds[idx] = info;
  if (! caml_global_data.fd_last_idx || idx > caml_global_data.fd_last_idx) {caml_global_data.fd_last_idx = idx;}
  return idx;
}

function caml_sys_open(name, flags, _perms) {
  var f = {};
  while(flags) {
    switch (flags[1]) {
      case 0:
        f.rdonly = 1;
        break;
      case 1:
        f.wronly = 1;
        break;
      case 2:
        f.append = 1;
        break;
      case 3:
        f.create = 1;
        break;
      case 4:
        f.truncate = 1;
        break;
      case 5:
        f.excl = 1;
        break;
      case 6:
        f.binary = 1;
        break;
      case 7:
        f.text = 1;
        break;
      case 8:
        f.nonblock = 1;
        break
      }
    flags = flags[2];
  }
  if (f.rdonly && f.wronly) {
    caml_raise_sys_error(
      name.toString() +
        " : flags Open_rdonly and Open_wronly are not compatible"
    );
  }
  if (f.text && f.binary) {
    caml_raise_sys_error(
      name.toString() +
        " : flags Open_text and Open_binary are not compatible"
    );
  }
  var root = resolve_fs_device(name);
  var file = root.device.open(root.rest, f);
  var idx = caml_global_data.fd_last_idx ? caml_global_data.fd_last_idx : 0;
  return caml_sys_open_internal(idx + 1, caml_std_output, file, f);
}

caml_sys_open_internal(
  0,
  caml_std_output,
  new MlFakeFile(caml_create_bytes(0))
);

caml_sys_open_internal(
  1,
  js_print_stdout,
  new MlFakeFile(caml_create_bytes(0))
);

caml_sys_open_internal(
  2,
  js_print_stderr,
  new MlFakeFile(caml_create_bytes(0))
);

function caml_ml_open_descriptor_in(fd) {
  var data = caml_global_data.fds[fd];
  if (data.flags.wronly) {caml_raise_sys_error("fd " + fd + " is writeonly");}
  var channel = {
    file: data.file,
    offset: data.offset,
    fd: fd,
    opened: true,
    out: false,
    refill: null
  };
  caml_ml_channels[channel.fd] = channel;
  return channel.fd;
}

function caml_ml_open_descriptor_out(fd) {
  var data = caml_global_data.fds[fd];
  if (data.flags.rdonly) {caml_raise_sys_error("fd " + fd + " is readonly");}
  var channel = {
    file: data.file,
    offset: data.offset,
    fd: fd,
    opened: true,
    out: true,
    buffer: ""
  };
  caml_ml_channels[channel.fd] = channel;
  return channel.fd;
}

function caml_ml_out_channels_list() {
  var l = 0;
  for (var c = 0; c < caml_ml_channels.length; c++) {
    if (
    caml_ml_channels[c] &&
      caml_ml_channels[c].opened &&
      caml_ml_channels[c].out
    ) {l = [0,caml_ml_channels[c].fd,l];}
  }
  return l;
}

function caml_ml_output_bytes(chanid, buffer, offset, len) {
  var chan = caml_ml_channels[chanid];
  if (! chan.opened) {
    caml_raise_sys_error("Cannot output to a closed channel");
  }
  var string;
  if (offset == 0 && caml_ml_bytes_length(buffer) == len) string = buffer;
  else {
    string = caml_create_bytes(len);
    caml_blit_bytes(buffer, offset, string, 0, len);
  }
  var jsstring = caml_jsbytes_of_string(string);
  var id = jsstring.lastIndexOf("\n");
  if (id < 0) chan.buffer +=
    jsstring;
  else {
    chan.buffer += jsstring.substr(0, id + 1);
    caml_ml_flush(chanid);
    chan.buffer += jsstring.substr(id + 1);
  }
  return 0;
}

function caml_ml_output(chanid, buffer, offset, len) {
  return caml_ml_output_bytes(chanid, buffer, offset, len);
}

function caml_raise_constant(tag) {throw caml_wrap_thrown_exception(tag);}

function caml_raise_zero_divide() {
  caml_raise_constant(caml_global_data.Division_by_zero);
}

function caml_mod(x, y) {if (y == 0) {caml_raise_zero_divide();}return x % y;}

function caml_obj_tag(x) {
  return x instanceof Array ? x[0] : x instanceof MlBytes ? 252 : 1e3;
}

function caml_register_global(n, v, name_opt) {
  if (name_opt && joo_global_object.toplevelReloc) {n = joo_global_object.toplevelReloc(name_opt);
  }
  caml_global_data[n + 1] = v;
  if (name_opt) {caml_global_data[name_opt] = v;}
}

function caml_string_get(s, i) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_string_unsafe_get(s, i);
}

var caml_initial_time = new Date().getTime() * 0.001;

function caml_sys_time() {
  return new Date().getTime() * 0.001 - caml_initial_time;
}

function caml_update_dummy(x, y) {
  if (typeof y === "function") {x.fun = y;return 0;}
  if (y.fun) {x.fun = y.fun;return 0;}
  var i = y.length;
  while(i--) x[i] = y[i];
  return 0;
}

function caml_return_exn_constant(tag) {return tag;}

function caml_utf8_of_utf16(s) {
  for (var b = "", t = b, c, d, i = 0, l = s.length; i < l; i++) {
    c = s.charCodeAt(i);
    if (c < 128) {
      for (var j = i + 1; j < l && (c = s.charCodeAt(j)) < 128; j++) ;
      if (j - i > 512) {
        t.substr(0, 1);
        b += t;
        t = "";
        b += s.slice(i, j);
      }
      else t += s.slice(i, j);
      if (j == l) {break;}
      i = j;
    }
    if (c < 2048) {
      t += String.fromCharCode(192 | c >> 6);
      t += String.fromCharCode(128 | c & 63);
    }
    else if (c < 55296 || c >= 57343) {
      t += String.fromCharCode(224 | c >> 12, 128 | c >> 6 & 63, 128 | c & 63);
    }
    else if (
      c >= 56319 ||
        i + 1 ==
          l || (d = s.charCodeAt(i + 1)) < 56320 || d > 57343
    ) {t += "\xef\xbf\xbd";}
    else {
      i++;
      c = (c << 10) + d - 56613888;
      t +=
        String.fromCharCode(
          240 | c >> 18,
          128 | c >> 12 & 63,
          128 | c >> 6 & 63,
          128 | c & 63
        );
    }
    if (t.length > 1024) {t.substr(0, 1);b += t;t = "";}
  }
  return b + t;
}



  /* Uses Error */


function caml_js_to_string(s) {
  if (typeof s !== "string") {
    throw new Error("caml_js_to_string called with non-string");
  }
  var tag = 9;
  if (! caml_is_ascii(s)) {tag = 8,s = caml_utf8_of_utf16(s);}
  return new MlBytes(tag, s, s.length);
}

var caml_named_values = {};

function caml_named_value(nm) {return caml_named_values[nm];}

function caml_wrap_exception(e) {
  if (e instanceof Array) {return e;}
  if (
  joo_global_object.RangeError && e instanceof joo_global_object.RangeError && e.message &&
    e.message.match(/maximum call stack/i)
  ) {return caml_return_exn_constant(caml_global_data.Stack_overflow);}
  if (
  joo_global_object.InternalError &&
    e instanceof joo_global_object.InternalError && e.message &&
    e.message.match(/too much recursion/i)
  ) {return caml_return_exn_constant(caml_global_data.Stack_overflow);}
  if (e instanceof joo_global_object.Error && caml_named_value("jsError")) {return [0,caml_named_value("jsError"),e];}
  return [0,caml_global_data.Failure,caml_js_to_string(new String(e))];
}

function caml_wrap_thrown_exception_reraise(exn) {
  if (! exn.stack_trace || exn[0] == 248) {
    return caml_wrap_thrown_exception(exn);
  }
  return exn;
}

var native_warn = 
    joo_global_object.native_warn !== undefined ?
      joo_global_object.native_warn :
      function() {caml_failwith("native_warn" + " not implemented");},
  native_log = 
    joo_global_object.native_log !== undefined ?
      joo_global_object.native_log :
      function() {caml_failwith("native_log" + " not implemented");},
  native_error = 
    joo_global_object.native_error !== undefined ?
      joo_global_object.native_error :
      function() {caml_failwith("native_error" + " not implemented");},
  native_debug = 
    joo_global_object.native_debug !== undefined ?
      joo_global_object.native_debug :
      function() {caml_failwith("native_debug" + " not implemented");};

function call1(f, a0) {
  return f.length === 1 ? f(a0) : caml_call_gen(f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : caml_call_gen(f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ? f(a0, a1, a2) : caml_call_gen(f, [a0,a1,a2]);
}

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ? f(a0, a1, a2, a3) : caml_call_gen(f, [a0,a1,a2,a3]);
}

var Out_of_memory = [248,caml_new_string("Out_of_memory"),-1];
var Sys_error = [248,caml_new_string("Sys_error"),-2];
var Failure = [248,caml_new_string("Failure"),-3];
var Invalid_argument = [248,caml_new_string("Invalid_argument"),-4];
var End_of_file = [248,caml_new_string("End_of_file"),-5];
var Division_by_zero = [248,caml_new_string("Division_by_zero"),-6];
var Not_found = [248,caml_new_string("Not_found"),-7];
var Match_failure = [248,caml_new_string("Match_failure"),-8];
var Stack_overflow = [248,caml_new_string("Stack_overflow"),-9];
var Sys_blocked_io = [248,caml_new_string("Sys_blocked_io"),-10];
var Assert_failure = [248,caml_new_string("Assert_failure"),-11];
var Undefined_recursive_module = [
  248,
  caml_new_string("Undefined_recursive_module"),
  -12
];

caml_register_global(
  11,
  Undefined_recursive_module,
  "Undefined_recursive_module"
);

caml_register_global(10, Assert_failure, "Assert_failure");

caml_register_global(9, Sys_blocked_io, "Sys_blocked_io");

caml_register_global(8, Stack_overflow, "Stack_overflow");

caml_register_global(7, Match_failure, "Match_failure");

caml_register_global(6, Not_found, "Not_found");

caml_register_global(5, Division_by_zero, "Division_by_zero");

caml_register_global(4, End_of_file, "End_of_file");

caml_register_global(3, Invalid_argument, "Invalid_argument");

caml_register_global(2, Failure, "Failure");

caml_register_global(1, Sys_error, "Sys_error");

caml_register_global(0, Out_of_memory, "Out_of_memory");

var c = caml_new_string("%.12g");
var b = caml_new_string(".");
var g = caml_new_string("String.contains_from / Bytes.contains_from");
var f = caml_new_string("");
var e = caml_new_string("String.concat");
var h = caml_new_string("Random.int");
var i = [
  0,
  987910699,
  495797812,
  364182224,
  414272206,
  318284740,
  990407751,
  383018966,
  270373319,
  840823159,
  24560019,
  536292337,
  512266505,
  189156120,
  730249596,
  143776328,
  51606627,
  140166561,
  366354223,
  1003410265,
  700563762,
  981890670,
  913149062,
  526082594,
  1021425055,
  784300257,
  667753350,
  630144451,
  949649812,
  48546892,
  415514493,
  258888527,
  511570777,
  89983870,
  283659902,
  308386020,
  242688715,
  482270760,
  865188196,
  1027664170,
  207196989,
  193777847,
  619708188,
  671350186,
  149669678,
  257044018,
  87658204,
  558145612,
  183450813,
  28133145,
  901332182,
  710253903,
  510646120,
  652377910,
  409934019,
  801085050
];
var k = [0,0,0];
var m = caml_new_string("  ");
var n = caml_new_string("");
var o = caml_new_string("  ");
var p = caml_new_string("    ");
var q = caml_new_string("      ");
var r = caml_new_string("        ");
var s = caml_new_string("          ");
var t = caml_new_string("            ");
var u = caml_new_string("              ");
var v = caml_new_string("                ");
var aj = caml_new_string('"');
var ak = caml_new_string('"');
var ag = caml_new_string("@max-depth");
var ae = caml_new_string("@max-length");
var ac = caml_new_string("~unknown");
var aa = caml_new_string("~lazy");
var Y = [0,caml_new_string("[|"),caml_new_string("|]")];
var V = caml_new_string(")");
var W = caml_new_string("closure(");
var T = [0,caml_new_string("{"),caml_new_string("}")];
var K = caml_new_string(",\n");
var E = caml_new_string("");
var F = caml_new_string("]");
var G = caml_new_string("\n");
var H = caml_new_string(",\n");
var I = caml_new_string("\n");
var J = caml_new_string("[");
var P = caml_new_string(", ");
var L = caml_new_string("");
var M = caml_new_string("]");
var N = caml_new_string(", ");
var O = caml_new_string("[");
var A = caml_new_string(",\n");
var w = caml_new_string("");
var x = caml_new_string("\n");
var y = caml_new_string(",\n");
var z = caml_new_string("\n");
var D = caml_new_string(", ");
var B = caml_new_string("");
var C = caml_new_string(", ");
var l = [0,0,0];
var ap = caml_new_string("\n");
var ao = caml_new_string("\n");
var an = caml_new_string("\n");
var am = caml_new_string("\n");
var aq = caml_new_string("Length changing sequences aren't supported yet.");
var ar = caml_new_string("Empty list cannot be split at ");
var as = caml_new_string("");
var at = caml_new_string("Impossible");
var aK = caml_new_string("");
var av = caml_new_string(" ");
var aw = caml_new_string("IEmpty");
var ax = caml_new_string(")");
var ay = caml_new_string(" ");
var az = caml_new_string("IOne(");
var aA = caml_new_string(")");
var aB = caml_new_string("\n");
var aC = caml_new_string("\n");
var aD = caml_new_string(",");
var aE = caml_new_string("\n");
var aF = caml_new_string("ITwo(");
var aG = caml_new_string(")");
var aH = caml_new_string(" ");
var aI = caml_new_string(",");
var aJ = caml_new_string("IOrderedMap(");
var aV = caml_new_string("");
var aL = caml_new_string("}");
var aM = caml_new_string("\n");
var aN = caml_new_string(" ");
var aO = caml_new_string("  subtree: ");
var aP = caml_new_string(",\n");
var aS = caml_new_string('"');
var aT = caml_new_string('"');
var aU = caml_new_string("-");
var aQ = caml_new_string("  state: ");
var aR = caml_new_string("{\n");
var aX = caml_new_string("\n");
var aY = caml_new_string("\n\n");
var aZ = caml_new_string("\n");
var a0 = caml_new_string("<NotRendered>");
var a1 = caml_new_string("\n\n");
var aW = caml_new_string("\n\n");
var a2 = caml_new_string("");
var a4 = caml_new_string("deafult");
var a3 = [0,caml_new_string("buttonClass")];
var a6 = caml_new_string("deafult");
var a5 = [0,caml_new_string("childContainer")];
var a7 = caml_new_string("size changed times:");
var a8 = [0,caml_new_string("ButtonInContainerThatCountsSizeChanges")];
var a_ = caml_new_string("deafult");
var a9 = [0,caml_new_string("divRenderedByInput")];
var bb = caml_new_string("divClicked!");
var ba = caml_new_string("MyReducer:");
var bf = caml_new_string("AppInstance");
var bc = [0,caml_new_string("initialInputText")];
var be = caml_new_string("haha I am controlling your input");
var bd = [0,caml_new_string("divRenderedByAppContainsInput")];
var bj = caml_new_string(")");
var bk = caml_new_string("->animFiredWithDeepDivState(");
var bl = caml_new_string("rafDeepDiv");
var bm = [0,caml_new_string("rafSecond")];
var bn = [0,caml_new_string("rafFirstDiv")];
var bi = caml_new_string("initialAnimationFrameSetup");
var bh = [0,caml_new_string("TODO")];
var bo = caml_new_string("default");
var bp = caml_new_string("HELLO");
var bs = [0,caml_new_string("stateless")];
var bt = caml_new_string(
  "\n\n-------------------\nChild Container \n-------------------"
);
var b0 = [0,caml_new_string("stateless")];
var b2 = [0,caml_new_string("Foo")];
var bu = caml_new_string(
  "\n\n-------------------\nGets Derived State From Props\n-------------------"
);
var bw = [0,caml_new_string("Foo")];
var bx = caml_new_string("Init:");
var bz = [0,caml_new_string("Foo")];
var bA = caml_new_string("Update Without Changing Props:");
var bC = [0,caml_new_string("Foo")];
var bD = caml_new_string("Update With Changing Props:");
var bE = caml_new_string(
  "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
);
var bG = caml_new_string("Init:");
var bJ = caml_new_string("Update:");
var bK = caml_new_string(
  "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
);
var bL = [0,2,3];
var bM = [0,caml_new_string("")];
var bN = caml_new_string("Init:");
var bO = caml_new_string("Update After raf tick:");
var bP = caml_new_string("Update After raf tick:");
var bQ = caml_new_string(
  "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
);
var bS = caml_new_string("zero");
var bT = caml_new_string("hello");
var bU = caml_new_string("Init:");
var bW = caml_new_string("zero");
var bY = caml_new_string("Another Type Init:");
var bq = caml_new_string("Total ms (Title): %d ");
var br = caml_new_string("Second Part Of Tuple:");

function invalid_arg(s) {
  throw caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

caml_fresh_oo_id(0);

function a(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = caml_create_bytes(l1 + l2 | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return s;
}

function string_of_int(n) {return caml_new_string("" + n);}

function valid_float_lexem(s) {
  var l = caml_ml_string_length(s);
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (l <= i__0) {return a(s, b);}
      var match = caml_string_get(s, i__0);
      var switch__0 = 48 <= match ? 58 <= match ? 0 : 1 : 45 === match ? 1 : 0;
      if (switch__0) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      return s;
    }
  }
  return loop(0);
}

function string_of_float(f) {
  return valid_float_lexem(caml_format_float(c, f));
}

function append(l1, l2) {
  if (l1) {var tl = l1[2];var hd = l1[1];return [0,hd,append(tl, l2)];}
  return l2;
}

caml_ml_open_descriptor_in(0);

var stdout = caml_ml_open_descriptor_out(1);

caml_ml_open_descriptor_out(2);

function flush_all(param) {
  function iter(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var a = param__0[1];
        try {caml_ml_flush(a);}
        catch(ew) {
          ew = caml_wrap_exception(ew);
          if (ew[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(ew);
          }
        }
        var param__0 = l;
        continue;
      }
      return 0;
    }
  }
  return iter(caml_ml_out_channels_list(0));
}

function output_string(oc, s) {
  return caml_ml_output(oc, s, 0, caml_ml_string_length(s));
}

function print_string(s) {return output_string(stdout, s);}

function do_at_exit(param) {return flush_all(0);}

function rev_append(l1, l2) {
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      var l1__1 = l1__0[2];
      var a = l1__0[1];
      var l2__1 = [0,a,l2__0];
      var l1__0 = l1__1;
      var l2__0 = l2__1;
      continue;
    }
    return l2__0;
  }
}

function rev(l) {return rev_append(l, 0);}

function flatten(param) {
  if (param) {var r = param[2];var l = param[1];return append(l, flatten(r));}
  return 0;
}

function map(f, param) {
  if (param) {
    var l = param[2];
    var a = param[1];
    var r = call1(f, a);
    return [0,r,map(f, l)];
  }
  return 0;
}

function d(i, f, param) {
  if (param) {
    var l = param[2];
    var a = param[1];
    var r = call2(f, i, a);
    return [0,r,d(i + 1 | 0, f, l)];
  }
  return 0;
}

function mapi(f, l) {return d(0, f, l);}

function iter(f, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var a = param__0[1];
      call1(f, a);
      var param__0 = param__1;
      continue;
    }
    return 0;
  }
}

function fold_left(f, accu, l) {
  var accu__0 = accu;
  var l__0 = l;
  for (; ; ) {
    if (l__0) {
      var l__1 = l__0[2];
      var a = l__0[1];
      var accu__1 = call2(f, accu__0, a);
      var accu__0 = accu__1;
      var l__0 = l__1;
      continue;
    }
    return accu__0;
  }
}

function copy(s) {
  var len = caml_ml_bytes_length(s);
  var r = caml_create_bytes(len);
  caml_blit_bytes(s, 0, r, 0, len);
  return r;
}

function escaped(s) {
  var n = [0,0];
  var ep = caml_ml_bytes_length(s) + -1 | 0;
  var eo = 0;
  if (! (ep < 0)) {
    var i__0 = eo;
    for (; ; ) {
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var et = match + -34 | 0;
        if (58 < et >>> 0) if (93 <= et) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (et + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var eu = 1;var switch__0 = 2;}
      }
      else var switch__0 = 11 <= match ?
        13 === match ? 1 : 0 :
        8 <= match ? 1 : 0;
      switch (switch__0) {case 0:var eu = 4;break;case 1:var eu = 2;break}
      n[1] = n[1] + eu | 0;
      var ev = i__0 + 1 | 0;
      if (ep !== i__0) {var i__0 = ev;continue;}
      break;
    }
  }
  if (n[1] === caml_ml_bytes_length(s)) {return copy(s);}
  var s__0 = caml_create_bytes(n[1]);
  n[1] = 0;
  var er = caml_ml_bytes_length(s) + -1 | 0;
  var eq = 0;
  if (! (er < 0)) {
    var i = eq;
    for (; ; ) {
      var c = caml_bytes_unsafe_get(s, i);
      if (35 <= c) var switch__2 = 92 ===
         c ?
        1 :
        127 <= c ? 0 : 2;
      else if (32 <= c) var switch__2 = 34 <=
         c ?
        1 :
        2;
      else if (14 <= c) var switch__2 = 0;
      else switch (c) {
        case 8:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 98);
          var switch__2 = 3;
          break;
        case 9:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 116);
          var switch__2 = 3;
          break;
        case 10:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 110);
          var switch__2 = 3;
          break;
        case 13:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 114);
          var switch__2 = 3;
          break;
        default:
          var switch__2 = 0
        }
      switch (switch__2) {
        case 0:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c / 100 | 0) | 0);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + ((c / 10 | 0) % 10 | 0) | 0);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c % 10 | 0) | 0);
          break;
        case 1:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], c);
          break;
        case 2:
          caml_bytes_unsafe_set(s__0, n[1], c);
          break
        }
      n[1] += 1;
      var es = i + 1 | 0;
      if (er !== i) {var i = es;continue;}
      break;
    }
  }
  return s__0;
}

function bos(en) {return en;}

function bts(em) {return em;}

function ensure_ge(x, y) {return y <= x ? x : invalid_arg(e);}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var ek = param__0[2];
      var el = param__0[1];
      if (ek) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(el) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = ek;
        continue;
      }
      return caml_ml_string_length(el) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var ei = param__0[2];
      var ej = param__0[1];
      if (ei) {
        caml_blit_string(ej, 0, dst, pos__0, caml_ml_string_length(ej));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(ej) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(ej) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = ei;
        continue;
      }
      caml_blit_string(ej, 0, dst, pos__0, caml_ml_string_length(ej));
      return dst;
    }
    return dst;
  }
}

function concat(sep, l) {
  if (l) {
    var seplen = caml_ml_string_length(sep);
    return bts(
      unsafe_blits(
        caml_create_bytes(sum_lengths(0, seplen, l)),
        0,
        sep,
        seplen,
        l
      )
    );
  }
  return f;
}

function escaped__0(s) {
  function needs_escape(i) {
    var i__0 = i;
    for (; ; ) {
      if (caml_ml_string_length(s) <= i__0) {return 0;}
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var eh = match + -34 | 0;
        if (58 < eh >>> 0) if (93 <= eh) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (eh + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      }
      else var switch__0 = 11 <= match ?
        13 === match ? 1 : 0 :
        8 <= match ? 1 : 0;
      return switch__0 ? 1 : 1;
    }
  }
  return needs_escape(0) ? bts(escaped(bos(s))) : s;
}

function index_rec(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw caml_wrap_thrown_exception(Not_found);}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function contains_from(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var ef = 1;return ef;}
      catch(eg) {
        eg = caml_wrap_exception(eg);
        if (eg === Not_found) {return 0;}
        throw caml_wrap_thrown_exception_reraise(eg);
      }
    }
  }
  return invalid_arg(g);
}

function contains(s, c) {return contains_from(s, 0, c);}

caml_fresh_oo_id(0);

caml_fresh_oo_id(0);

function bits(s) {
  s[2] = (s[2] + 1 | 0) % 55 | 0;
  var ec = s[2];
  var curval = caml_check_bound(s[1], ec)[ec + 1];
  var ed = (s[2] + 24 | 0) % 55 | 0;
  var newval = caml_check_bound(s[1], ed)[ed + 1] +
    (curval ^ (curval >>> 25 | 0) & 31) | 0;
  var newval30 = newval & 1073741823;
  var ee = s[2];
  caml_check_bound(s[1], ee)[ee + 1] = newval30;
  return newval30;
}

function intaux(s, n) {
  for (; ; ) {
    var r = bits(s);
    var v = caml_mod(r, n);
    if (((1073741823 - n | 0) + 1 | 0) < (r - v | 0)) {continue;}
    return v;
  }
}

function int__0(s, bound) {
  if (! (1073741823 < bound)) {if (0 < bound) {return intaux(s, bound);}}
  return invalid_arg(h);
}

var default__0 = [0,i.slice(),0];

function int__1(bound) {return int__0(default__0, bound);}

var j = 5;

function detectList(maxLength, o) {
  var maxLength__0 = maxLength;
  var o__0 = o;
  for (; ; ) {
    if (0 === maxLength__0) {return 1;}
    var tag = caml_obj_tag(o__0);
    var match = tag === 1e3 ? 1 : 0;
    if (0 === match) {
      var size = o__0.length - 1;
      var d_ = tag === 0 ? 1 : 0;
      if (d_) {
        var ea = 2 === size ? 1 : 0;
        if (ea) {
          var o__1 = o__0[2];
          var maxLength__1 = maxLength__0 + -1 | 0;
          var maxLength__0 = maxLength__1;
          var o__0 = o__1;
          continue;
        }
        var eb = ea;
      }
      else var eb = d_;
      return eb;
    }
    return caml_equal(o__0, 0);
  }
}

function extractList(maxNum, o) {
  if (0 === maxNum) {return [0,1 - (typeof o === "number"),0];}
  if (typeof o === "number") {return k;}
  var match = extractList(maxNum + -1 | 0, o[2]);
  var rest = match[2];
  var restWasTruncated = match[1];
  return [0,restWasTruncated,[0,o[1],rest]];
}

function extractFields(maxNum, o) {
  function extractFields(maxNum, fieldsSoFar, numFields) {
    var maxNum__0 = maxNum;
    var fieldsSoFar__0 = fieldsSoFar;
    var numFields__0 = numFields;
    for (; ; ) {
      if (0 === maxNum__0) {
        return [0,0 < numFields__0 ? 1 : 0,fieldsSoFar__0];
      }
      if (0 === numFields__0) {return [0,0,fieldsSoFar__0];}
      var numFields__1 = numFields__0 + -1 | 0;
      var fieldsSoFar__1 = [0,o[(numFields__0 + -1 | 0) + 1],fieldsSoFar__0];
      var maxNum__1 = maxNum__0 + -1 | 0;
      var maxNum__0 = maxNum__1;
      var fieldsSoFar__0 = fieldsSoFar__1;
      var numFields__0 = numFields__1;
      continue;
    }
  }
  return extractFields(maxNum, 0, o.length - 1);
}

function getBreakData(itms) {
  var match = fold_left(
    function(param, itm) {
      var curDidBreak = param[2];
      var curTotalLen = param[1];
      var containsNewline = contains(itm, 10);
      var curDidBreak__0 = curDidBreak ? curDidBreak : containsNewline;
      return [
        0,
        (curTotalLen + caml_ml_string_length(itm) | 0) + 2 | 0,
        curDidBreak__0
      ];
    },
    l,
    itms
  );
  var someChildBroke = match[2];
  var allItemsLen = match[1];
  return [0,allItemsLen,someChildBroke];
}

function indentForDepth(n__0) {
  if (8 < n__0 >>> 0) {return a(indentForDepth(n__0 + -1 | 0), m);}
  switch (n__0) {
    case 0:
      return n;
    case 1:
      return o;
    case 2:
      return p;
    case 3:
      return q;
    case 4:
      return r;
    case 5:
      return s;
    case 6:
      return t;
    case 7:
      return u;
    default:return v
    }
}

function printTreeShape(pair, self, depth, o) {
  var right = pair[2];
  var left = pair[1];
  var match = extractFields(j, o);
  var lst = match[2];
  var wasTruncated = match[1];
  var dNext = 1 + depth | 0;
  var indent = indentForDepth(depth);
  var indentNext = indentForDepth(dNext);
  var itms = map(
    function(o) {return call3(self[13], self, [0,dNext], o);},
    lst
  );
  var match__0 = getBreakData(itms);
  var someChildBroke = match__0[2];
  var allItemsLen = match__0[1];
  if (! (70 <= ((caml_ml_string_length(indent) + 2 | 0) + allItemsLen | 0))) {
    if (! someChildBroke) {
      var truncationMsg__0 = 0 === wasTruncated ?
        B :
        a(D, call1(self[6], self));
      var d9 = a(truncationMsg__0, right);
      return a(left, a(concat(C, itms), d9));
    }
  }
  var truncationMsg = 0 === wasTruncated ?
    w :
    a(A, a(indentNext, call1(self[6], self)));
  var d8 = a(truncationMsg, a(x, a(indent, right)));
  return a(left, a(z, a(indentNext, a(concat(a(y, indentNext), itms), d8))));
}

function printListShape(self, depth, o) {
  var match = extractList(j, o);
  var lst = match[2];
  var wasTruncated = match[1];
  var dNext = 1 + depth | 0;
  var indent = indentForDepth(depth);
  var indentNext = indentForDepth(dNext);
  var itms = map(
    function(o) {return call3(self[13], self, [0,dNext], o);},
    lst
  );
  var match__0 = getBreakData(itms);
  var someChildBroke = match__0[2];
  var allItemsLen = match__0[1];
  if (! (70 <= ((caml_ml_string_length(indent) + 2 | 0) + allItemsLen | 0))) {
    if (! someChildBroke) {
      var truncationMsg__0 = 0 === wasTruncated ?
        L :
        a(P, call1(self[6], self));
      var d7 = a(truncationMsg__0, M);
      return a(O, a(concat(N, itms), d7));
    }
  }
  var truncationMsg = 0 === wasTruncated ?
    E :
    a(K, a(indentNext, call1(self[6], self)));
  var d6 = a(truncationMsg, a(G, a(indent, F)));
  return a(J, a(I, a(indentNext, a(concat(a(H, indentNext), itms), d6))));
}

function Q(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  if (70 < depth) {return call1(self[5], self);}
  var tag = caml_obj_tag(o);
  if (tag === 252) {
    var match = 0 === depth ? 1 : 0;
    return 0 === match ? call2(self[3], self, o) : call2(self[2], self, o);
  }
  return tag === 1e3 ?
    call2(self[1], self, o) :
    tag === 253 ?
     call2(self[4], self, o) :
     tag === 247 ?
      call2(self[10], self, o) :
      tag === 254 ?
       call3(self[9], self, 0, o) :
       tag === 246 ?
        call2(self[8], self, o) :
        detectList(j, o) ?
         call3(self[12], self, [0,depth], o) :
         tag === 0 ?
          call3(self[11], self, [0,depth], o) :
          call2(self[7], self, o);
}

function R(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printListShape(self, depth, o);
}

function S(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(T, self, depth, o);
}

function U(self, f) {return a(W, a(string_of_int(f | 0), V));}

function X(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(Y, self, depth, o);
}

function Z(self, o) {return aa;}

function ab(self, o) {return ac;}

function ad(self) {return ae;}

function af(self) {return ag;}

function ah(self, f) {return string_of_float(f);}

function ai(self, s) {return a(ak, a(call2(self[2], self, s), aj));}

function al(self, s) {return s;}

var base = [
  0,
  function(self, i) {return string_of_int(i);},
  al,
  ai,
  ah,
  af,
  ad,
  ab,
  Z,
  X,
  U,
  S,
  R,
  Q
];

function makeStandardChannelsConsole(objectPrinter) {
  function d2(a__0) {
    return native_debug(
      a(call3(objectPrinter[13], objectPrinter, 0, a__0), am)
    );
  }
  function d3(a__0) {
    return native_error(
      a(call3(objectPrinter[13], objectPrinter, 0, a__0), an)
    );
  }
  function d4(a__0) {
    return native_warn(a(call3(objectPrinter[13], objectPrinter, 0, a__0), ao)
    );
  }
  function d5(a) {
    return native_log(call3(objectPrinter[13], objectPrinter, 0, a));
  }
  return [
    0,
    function(a__0) {
      return native_log(
        a(call3(objectPrinter[13], objectPrinter, 0, a__0), ap)
      );
    },
    d5,
    d4,
    d3,
    d2
  ];
}

var defaultGlobalConsole = makeStandardChannelsConsole(base);

function log(a) {return call1(defaultGlobalConsole[1], a);}

function mapi3(f, iSoFar, revSoFar, listA, listB, listC) {
  var iSoFar__0 = iSoFar;
  var revSoFar__0 = revSoFar;
  var listA__0 = listA;
  var listB__0 = listB;
  var listC__0 = listC;
  for (; ; ) {
    if (listA__0) {
      if (listB__0) {
        if (listC__0) {
          var listC__1 = listC__0[2];
          var hdc = listC__0[1];
          var listB__1 = listB__0[2];
          var hdb = listB__0[1];
          var listA__1 = listA__0[2];
          var hda = listA__0[1];
          var revSoFar__1 = [0,call4(f, iSoFar__0, hda, hdb, hdc),revSoFar__0];
          var iSoFar__1 = iSoFar__0 + 1 | 0;
          var iSoFar__0 = iSoFar__1;
          var revSoFar__0 = revSoFar__1;
          var listA__0 = listA__1;
          var listB__0 = listB__1;
          var listC__0 = listC__1;
          continue;
        }
      }
    }
    else if (! listB__0) {if (! listC__0) {return rev(revSoFar__0);}}
    throw caml_wrap_thrown_exception([0,Invalid_argument,aq]);
  }
}

function mapi3__0(f, listA, listB, listC) {
  return mapi3(f, 0, 0, listA, listB, listC);
}

function splitList(revCount, revSoFar, splitAt, lst) {
  var revCount__0 = revCount;
  var revSoFar__0 = revSoFar;
  var lst__0 = lst;
  for (; ; ) {
    if (lst__0) {
      var tl = lst__0[2];
      var hd = lst__0[1];
      var match = revCount__0 === splitAt ? 1 : 0;
      if (0 === match) {
        var revSoFar__1 = [0,hd,revSoFar__0];
        var revCount__1 = revCount__0 + 1 | 0;
        var revCount__0 = revCount__1;
        var revSoFar__0 = revSoFar__1;
        var lst__0 = tl;
        continue;
      }
      return [0,rev(revSoFar__0),hd,tl];
    }
    throw caml_wrap_thrown_exception(
            [0,Invalid_argument,a(ar, string_of_int(splitAt))]
          );
  }
}

function splitList__0(splitAt, lst) {return splitList(0, 0, splitAt, lst);}

function nonReducer(param, d1) {return as;}

function nonEventHandler(e) {return 0;}

function spec(param) {
  if (0 === param[0]) {
    var reducer = param[3];
    var subelems = param[2];
    var state = param[1];
    return [0,state,reducer,nonEventHandler,subelems];
  }
  var spec = param[1];
  return spec;
}

function withState(inst, state) {
  var d0 = inst[5];
  return [
    0,
    inst[1],
    inst[2],
    inst[3],
    inst[4],
    [0,state,d0[2],d0[3],d0[4]],
    inst[6]
  ];
}

function newSelf(replacer, subreplacer) {
  var self = [];
  function dU(extractor, e, inst) {
    var dY = call1(extractor, e);
    var nextState = call2(inst[5][2], inst, dY);
    var dZ = inst[4];
    return reconcile(withState(inst, nextState), dZ);
  }
  function dV(action) {
    return call1(
      replacer,
      function(inst) {
        var nextState = call2(inst[5][2], inst, action);
        var dX = inst[4];
        return reconcile(withState(inst, nextState), dX);
      }
    );
  }
  caml_update_dummy(
    self,
    [
      0,
      function(actionExtractor, ev) {
        var action = call1(actionExtractor, ev);
        return call1(
          replacer,
          function(inst) {
            var nextState = call2(inst[5][2], inst, action);
            var dW = inst[4];
            return reconcile(withState(inst, nextState), dW);
          }
        );
      },
      dV,
      dU
    ]
  );
  return self;
}

function init(replacer, renderable) {
  function subreplacer(subtreeSwapper) {
    return call1(
      replacer,
      function(inst) {
        var nextSubtree = call1(subtreeSwapper, inst[6]);
        var match = inst[6] !== nextSubtree ? 1 : 0;
        return 0 === match ?
          inst :
          [0,inst[1],inst[2],inst[3],inst[4],inst[5],nextSubtree];
      }
    );
  }
  var self = newSelf(replacer, subreplacer);
  var nextSpec = spec(call2(renderable, 0, self));
  return [
    0,
    replacer,
    subreplacer,
    self,
    renderable,
    nextSpec,
    initSubtree(subreplacer, nextSpec[4])
  ];
}

function initSubtree(thisReplacer, jsx) {
  if (typeof jsx === "number") return 0;
  else switch (jsx[0]) {
    case 0:
      var renderable = jsx[1];
      var nextReplacer = function(instSwapper) {
        return call1(
          thisReplacer,
          function(subtree) {
            var inst = subtree[1];
            var next = call1(instSwapper, inst);
            var match = inst !== next ? 1 : 0;
            return 0 === match ? subtree : [0,next];
          }
        );
      };
      return [0,init(nextReplacer, renderable)];
    case 1:
      var stateRendererB = jsx[2];
      var stateRendererA = jsx[1];
      var nextReplacerA = function(aSwapper) {
        return call1(
          thisReplacer,
          function(subtree) {
            var b = subtree[2];
            var a = subtree[1];
            var next = call1(aSwapper, a);
            var match = next === a ? 1 : 0;
            return 0 === match ? [1,next,b] : subtree;
          }
        );
      };
      var nextReplacerB = function(bSwapper) {
        return call1(
          thisReplacer,
          function(subtree) {
            var b = subtree[2];
            var a = subtree[1];
            var next = call1(bSwapper, b);
            var match = next === b ? 1 : 0;
            return 0 === match ? [1,a,next] : subtree;
          }
        );
      };
      var dT = initSubtree(nextReplacerB, stateRendererB);
      return [1,initSubtree(nextReplacerA, stateRendererA),dT];
    default:
      var elems = jsx[1];
      var initElem = function(i, e) {
        function subreplacer(swapper) {
          return call1(
            thisReplacer,
            function(subtree) {
              var iLst = subtree[1];
              var match = splitList__0(i, iLst);
              var post = match[3];
              var inst = match[2];
              var pre = match[1];
              var next = call1(swapper, inst);
              var match__0 = next === inst ? 1 : 0;
              return 0 === match__0 ?
                [2,flatten([0,pre,[0,[0,next,0],[0,post,0]]])] :
                subtree;
            }
          );
        }
        return initSubtree(subreplacer, e);
      };
      var sub = mapi(initElem, elems);
      return [2,sub]
    }
}

function reconcile(inst, renderable) {
  var nextSpec = spec(call2(renderable, [0,inst[5][1]], inst[3]));
  var dS = reconcileSubtree(inst[6], inst[5][4], nextSpec[4]);
  return [0,inst[1],inst[2],inst[3],renderable,nextSpec,dS];
}

function reconcileSubtree(subtree, prevJsx, match) {
  if (typeof subtree === "number") return 0;
  else switch (subtree[0]) {
    case 0:
      var r = match[1];
      var rPrev = prevJsx[1];
      var i = subtree[1];
      var match__0 = r === rPrev ? 1 : 0;
      return 0 === match__0 ? [0,reconcile(i, r)] : subtree;
    case 1:
      var rb = match[2];
      var ra = match[1];
      var rbPrev = prevJsx[2];
      var raPrev = prevJsx[1];
      var ib = subtree[2];
      var ia = subtree[1];
      var dR = reconcileSubtree(ib, rbPrev, rb);
      return [1,reconcileSubtree(ia, raPrev, ra),dR];
    default:
      var eLst = match[1];
      var eLstPrev = prevJsx[1];
      var iLst = subtree[1];
      var nextSeq = mapi3__0(
        function(i, itm, r, rPrev) {return reconcileSubtree(itm, rPrev, r);},
        iLst,
        eLst,
        eLstPrev
      );
      return [2,nextSeq]
    }
}

function control(param, controlledState) {
  var renderable = param[1];
  return [
    0,
    function(state, self) {
      return call2(renderable, [0,controlledState], self);
    }
  ];
}

function create(param) {
  var root = [];
  var dP = 0;
  caml_update_dummy(
    root,
    [
      0,
      function(swapper) {
        var dQ = root[2];
        if (dQ) {
          var ei = dQ[1];
          var curInst = ei[2];
          var curElems = ei[1];
          var nextEi = [0,curElems,call1(swapper, curInst)];
          root[2] = [0,nextEi];
          return 0;
        }
        throw caml_wrap_thrown_exception([0,Invalid_argument,at]);
      },
      dP
    ]
  );
  return root;
}

function render(root, elems) {
  var dO = root[2];
  if (dO) {
    var ei = dO[1];
    var curSubtree = ei[2];
    var curElems = ei[1];
    var nextEi = [0,elems,reconcileSubtree(curSubtree, curElems, elems)];
    root[2] = [0,nextEi];
    return 0;
  }
  var nextEi__0 = [0,elems,initSubtree(root[1], elems)];
  root[2] = [0,nextEi__0];
  return 0;
}

var counter = [0,0];
var subscribers = [0,0];

function request(cb) {
  subscribers[1] = [0,cb,subscribers[1]];
  counter[1] = counter[1] + 1 | 0;
  return counter[1];
}

function tick(param) {
  var prevSubscribers = subscribers[1];
  subscribers[1] = 0;
  return iter(function(cb) {return call1(cb, 0);}, prevSubscribers);
}

function clearAll(param) {subscribers[1] = 0;return 0;}

function element(x) {return x;}

var suppress = [0,0];

function printInstanceCollection(opt, subtree) {
  if (opt) {
    var sth = opt[1];
    var s = sth;
  }
  else var s = aK;
  var dNext = a(av, s);
  if (typeof subtree === "number") return aw;
  else switch (subtree[0]) {
    case 0:
      var n = subtree[1];
      return a(az, a(au([0,a(ay, s)], n), ax));
    case 1:
      var n2 = subtree[2];
      var n1 = subtree[1];
      var dK = a(aB, a(s, aA));
      var dL = a(
        aD,
        a(aC, a(dNext, a(printInstanceCollection([0,dNext], n2), dK)))
      );
      return a(
        aF,
        a(aE, a(dNext, a(printInstanceCollection([0,dNext], n1), dL)))
      );
    default:
      var lst = subtree[1];
      var dM = [0,a(aH, s)];
      return a(
        aJ,
        a(
          concat(
            aI,
            map(function(dN) {return printInstanceCollection(dM, dN);}, lst)
          ),
          aG
        )
      )
    }
}

function au(opt, n) {
  if (opt) {
    var sth = opt[1];
    var s = sth;
  }
  else var s = aV;
  var match = n[5];
  var state = match[1];
  var dG = a(aM, a(s, aL));
  var dH = n[6];
  var dI = a(aP, a(s, a(aO, a(printInstanceCollection([0,a(aN, s)], dH), dG)))
  );
  var dJ = typeof state === "number" ?
    string_of_int(state) :
    caml_obj_tag(state) === 252 ? a(aT, a(escaped__0(state), aS)) : aU;
  return a(aR, a(s, a(aQ, a(dJ, dI))));
}

function printSection(s) {return suppress[1] ? 0 : log(a(aW, s));}

function printRoot(title, root) {
  var dF = root[2];
  if (0 === suppress[1]) {
    if (dF) {
      var match = dF[1];
      var subtree = match[2];
      log(a(aY, a(title, aX)));
      return log(printInstanceCollection(0, subtree));
    }
    log(title);
    return log(a(a1, a(a0, aZ)));
  }
  return 0;
}

function domEventHandler(e) {return 0;}

function domStateToString(state) {return state;}

function render__0(onClick, opt, children, state, self) {
  if (opt) {
    var sth = opt[1];
    var className = sth;
  }
  else var className = a2;
  return [
    1,
    [
      0,
      className,
      function(inst, param) {var str = param[1];return str;},
      domEventHandler,
      children
    ]
  ];
}

function render__1(opt, size, children, dA, self) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = a4;
  if (dA) {
    var sth__0 = dA[1];
    var state = sth__0;
  }
  else var state = txt;
  var dB = 0;
  var dC = 0;
  return [
    0,
    state,
    element([0,function(dD, dE) {return render__0(dC, a3, dB, dD, dE);}]),
    nonReducer
  ];
}

function render__2(opt, children, dw, self) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = a6;
  if (dw) {
    var sth__0 = dw[1];
    var state = sth__0;
  }
  else var state = txt;
  var dx = 0;
  return [
    0,
    state,
    element([0,function(dy, dz) {return render__0(dx, a5, children, dy, dz);}]
    ),
    nonReducer
  ];
}

function render__3(opt, size, children, dj, self) {
  ;
  if (dj) {
    var sth = dj[1];
    var state = sth;
  }
  else var state = [0,size,0];
  var curChangeCount = state[2];
  var curSize = state[1];
  var match = curSize !== size ? 1 : 0;
  var nextChangeCount = 0 === match ? curChangeCount : curChangeCount + 1 | 0;
  function dk(param, dv) {return state;}
  var dl = 0;
  var dm = [0,a(a7, string_of_int(nextChangeCount))];
  var dn = 0;
  var dp = element(
    [0,function(dt, du) {return render__0(dn, dm, dl, dt, du);}]
  );
  var dq = 0;
  return [
    0,
    [0,size,nextChangeCount],
    [
      1,
      element(
        [0,function(dr, ds) {return render__1(a8, dq, children, dr, ds);}]
      ),
      dp
    ],
    dk
  ];
}

function render__4(opt, children, dc, self) {
  if (opt) {
    var sth = opt[1];
    var initialText = sth;
  }
  else var initialText = a_;
  if (dc) {
    var sth__0 = dc[1];
    var state = sth__0;
  }
  else var state = initialText;
  function dd(param, di) {return state;}
  var de = 0;
  var df = 0;
  return [
    0,
    state,
    element([0,function(dg, dh) {return render__0(df, a9, de, dg, dh);}]),
    dd
  ];
}

function render__5(children, opt, self) {
  if (opt) {
    var sth = opt[1];
    var state = sth;
  }
  else var state = 0;
  function c6(param, db) {var next = db[1];return caml_int_of_string(next);}
  var c7 = 0;
  var c8 = [0,a(ba, string_of_int(state))];
  var c9 = [0,function(e) {return print_string(bb);}];
  return [
    0,
    state,
    [0,function(c_, da) {return render__0(c9, c8, c7, c_, da);}],
    c6
  ];
}

function render__6(shouldControlInput, children, opt, self) {
  if (opt) {
    var sth = opt[1];
    var state = sth;
  }
  else var state = bf;
  var cW = 0;
  var input = element([0,function(c4, c5) {return render__4(bc, cW, c4, c5);}]
  );
  var input__0 = 0 === shouldControlInput ? input : control(input, be);
  var cX = 0;
  var cY = element([0,function(c2, c3) {return render__5(cX, c2, c3);}]);
  var cZ = 0;
  return [
    0,
    state,
    [
      1,
      element(
        [0,function(c0, c1) {return render__0(cZ, bd, input__0, c0, c1);}]
      ),
      cY
    ],
    nonReducer
  ];
}

function render__7(anyProp, size, children, opt, self) {
  if (opt) {
    var sth = opt[1];
    var state = sth;
  }
  else var state = [0,anyProp,anyProp];
  function cQ(param, action) {return state;}
  var cR = 0;
  var cS = [0,size];
  var cT = 0;
  return [
    0,
    state,
    [0,function(cU, cV) {return render__0(cT, cS, cR, cU, cV);}],
    cQ
  ];
}

function bg(x, getDefault) {
  if (x) {var x__0 = x[1];return x__0;}
  return call1(getDefault, 0);
}

function onRaf(e) {return bh;}

function initialStateGetter(self, param) {
  request(call1(self[1], onRaf));
  return bi;
}

function render__8(opt, param, state, self) {
  ;
  var state__0 = bg(state, function(cP) {return initialStateGetter(self, cP);}
  );
  function cA(inst, action) {
    var match = inst[6][2][1][6];
    var deepestDiv = match[1];
    var divStateStr = domStateToString(deepestDiv[5][1]);
    request(call1(self[1], onRaf));
    return a(state__0, a(bk, a(divStateStr, bj)));
  }
  var cB = 0;
  var cC = [0,a(bl, string_of_int(int__1(10)))];
  var cD = 0;
  var cE = element(
    [0,function(cN, cO) {return render__0(cD, cC, cB, cN, cO);}]
  );
  var cF = 0;
  var cG = element(
    [0,function(cL, cM) {return render__0(cF, bm, cE, cL, cM);}]
  );
  var cH = 0;
  var cI = 0;
  return [
    0,
    state__0,
    [
      1,
      element([0,function(cJ, cK) {return render__0(cI, bn, cH, cJ, cK);}]),
      cG
    ],
    cA
  ];
}

function render__9(opt, children) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = bo;
  var cv = 0;
  var cw = [0,txt];
  var cx = 0;
  return function(cy, cz) {return render__0(cx, cw, cv, cy, cz);};
}

log(bp);

var startSeconds = caml_sys_time(0);

suppress[1] = 0;

var i__0 = 0;

a:
for (; ; ) {
  var stateless = element([0,render__9(bs, 0)]);
  printSection(bt);
  var containerRoot = create(0);
  var j__0 = 0;
  for (; ; ) {
    var b1 = element([0,render__9(b0, 0)]);
    render(
      containerRoot,
      element(
        [
          0,
          function(cs) {
            return function(ct, cu) {return render__2(b2, cs, ct, cu);};
          }(b1
          )
        ]
      )
    );
    var b3 = j__0 + 1 | 0;
    if (10 !== j__0) {var j__0 = b3;continue;}
    printSection(bu);
    var counterRoot = create(0);
    var bv = 0;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, cp) {
            return function(cq, cr) {
              return render__3(bw, cp, stateless, cq, cr);
            };
          }(stateless, bv
          )
        ]
      )
    );
    printRoot(bx, counterRoot);
    var by = 0;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, cm) {
            return function(cn, co) {
              return render__3(bz, cm, stateless, cn, co);
            };
          }(stateless, by
          )
        ]
      )
    );
    printRoot(bA, counterRoot);
    var bB = 8;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, cj) {
            return function(ck, cl) {
              return render__3(bC, cj, stateless, ck, cl);
            };
          }(stateless, bB
          )
        ]
      )
    );
    printRoot(bD, counterRoot);
    printSection(bE);
    var appRoot = create(0);
    var bF = 0;
    render(
      appRoot,
      element(
        [
          0,
          function(stateless, cg) {
            return function(ch, ci) {
              return render__6(cg, stateless, ch, ci);
            };
          }(stateless, bF
          )
        ]
      )
    );
    printRoot(bG, appRoot);
    var bH = 0;
    var bI = 1;
    render(
      appRoot,
      element(
        [
          0,
          function(cc, cd) {
            return function(ce, cf) {return render__6(cd, cc, ce, cf);};
          }(bH, bI
          )
        ]
      )
    );
    printRoot(bJ, appRoot);
    printSection(bK);
    var animRoot = create(0);
    render(
      animRoot,
      element([0,function(ca, cb) {return render__8(bM, bL, ca, cb);}])
    );
    printRoot(bN, animRoot);
    tick(0);
    printRoot(bO, animRoot);
    tick(0);
    printRoot(bP, animRoot);
    clearAll(0);
    printSection(bQ);
    var polyRoot = create(0);
    var bR = 0;
    render(
      polyRoot,
      element(
        [
          0,
          function(b8) {
            return function(b9, b_) {return render__7(bT, bS, b8, b9, b_);};
          }(bR
          )
        ]
      )
    );
    printRoot(bU, polyRoot);
    var anotherPolyRoot = create(0);
    var bV = 0;
    var bX = 0;
    render(
      anotherPolyRoot,
      element(
        [
          0,
          function(b4, b5) {
            return function(b6, b7) {return render__7(b5, bW, b4, b6, b7);};
          }(bV, bX
          )
        ]
      )
    );
    printRoot(bY, anotherPolyRoot);
    var bZ = i__0 + 1 | 0;
    if (0 !== i__0) {var i__0 = bZ;continue a;}
    var endSeconds = caml_sys_time(0);
    log(a(bq, string_of_int((endSeconds - startSeconds) * 1e3 | 0)));
    var f__0 = caml_alloc_dummy_function(1, 2);
    var z__0 = [];
    caml_update_dummy(f__0, function(x, y) {return 1;});
    caml_update_dummy(z__0, [0,[0,f__0,br]]);
    if (z__0) {
      var match = z__0[1];
      var str = match[2];
      var f__1 = match[1];
      log(a(str, string_of_int(call2(f__1, 0, 0))));
    }
    do_at_exit(0);
  }
}

