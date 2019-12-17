function polymorphic_log(s) {console.log("c" in s ? s.c : s);} /**
 * Main executable compiled output. Runtime included in compilation output.
 */

"use strict";

let joo_global_object = typeof global !== 'undefined' ? global : window;


var caml_oo_last_id = 0;

function caml_ml_string_length(s) {return s.l;}

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

function caml_int64_add(x, y) {
  var z1 = x[1] + y[1];
  var z2 = x[2] + y[2] + (z1 >> 24);
  var z3 = x[3] + y[3] + (z2 >> 24);
  return [255,z1 & 16777215,z2 & 16777215,z3 & 65535];
}

var caml_int64_offset = Math.pow(2, - 24);

function caml_int64_mul(x, y) {
  var z1 = x[1] * y[1];
  var z2 = (z1 * caml_int64_offset | 0) + x[2] * y[1] + x[1] * y[2];
  var z3 = (z2 * caml_int64_offset | 0) + x[3] * y[1] + x[2] * y[2] + x[1] * y[3];
  return [255,z1 & 16777215,z2 & 16777215,z3 & 65535];
}

function caml_int64_neg(x) {
  var y1 = - x[1];
  var y2 = - x[2] + (y1 >> 24);
  var y3 = - x[3] + (y2 >> 24);
  return [255,y1 & 16777215,y2 & 16777215,y3 & 65535];
}

function caml_int64_of_int32(x) {
  return [255,x & 16777215,x >> 24 & 16777215,x >> 31 & 65535];
}

function caml_obj_dup(x) {
  var l = x.length;
  var a = new Array(l);
  for (var i = 0; i < l; i++) a[i] = x[i];
  return a;
}

function caml_int64_sub(x, y) {
  var z1 = x[1] - y[1];
  var z2 = x[2] - y[2] + (z1 >> 24);
  var z3 = x[3] - y[3] + (z2 >> 24);
  return [255,z1 & 16777215,z2 & 16777215,z3 & 65535];
}

function caml_int64_ucompare(x, y) {
  if (x[3] > y[3]) {return 1;}
  if (x[3] < y[3]) {return - 1;}
  if (x[2] > y[2]) {return 1;}
  if (x[2] < y[2]) {return - 1;}
  if (x[1] > y[1]) {return 1;}
  if (x[1] < y[1]) {return - 1;}
  return 0;
}

function caml_int64_lsl1(x) {
  x[3] = x[3] << 1 | x[2] >> 23;
  x[2] = (x[2] << 1 | x[1] >> 23) & 16777215;
  x[1] = x[1] << 1 & 16777215;
}

function caml_int64_lsr1(x) {
  x[1] = (x[1] >>> 1 | x[2] << 23) & 16777215;
  x[2] = (x[2] >>> 1 | x[3] << 23) & 16777215;
  x[3] = x[3] >>> 1;
}

function caml_int64_udivmod(x, y) {
  var offset = 0;
  var modulus = caml_obj_dup(x);
  var divisor = caml_obj_dup(y);
  var quotient = [255,0,0,0];
  while(caml_int64_ucompare(modulus, divisor) > 0) {offset++;caml_int64_lsl1(divisor);}
  while(offset >= 0) {
    offset--;
    caml_int64_lsl1(quotient);
    if (caml_int64_ucompare(modulus, divisor) >= 0) {
      quotient[1]++;
      modulus = caml_int64_sub(modulus, divisor);
    }
    caml_int64_lsr1(divisor);
  }
  return [0,quotient,modulus];
}

function caml_int64_ult(x, y) {return caml_int64_ucompare(x, y) < 0;}

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

function caml_failwith(msg) {
  caml_raise_with_string(caml_global_data.Failure, msg);
}

function caml_parse_digit(c) {
  if (c >= 48 && c <= 57) {return c - 48;}
  if (c >= 65 && c <= 90) {return c - 55;}
  if (c >= 97 && c <= 122) {return c - 87;}
  return - 1;
}

function caml_int64_of_string(s) {
  var r = caml_parse_sign_and_base(s);
  var i = r[0], sign = r[1], base = r[2];
  var base64 = caml_int64_of_int32(base);
  var threshold = caml_int64_udivmod([255,16777215,268435455,65535], base64)
   [1];
  var c = caml_string_unsafe_get(s, i);
  var d = caml_parse_digit(c);
  if (d < 0 || d >= base) {caml_failwith("int_of_string");}
  var res = caml_int64_of_int32(d);
  for (; ; ) {
    i++;
    c = caml_string_unsafe_get(s, i);
    if (c == 95) {continue;}
    d = caml_parse_digit(c);
    if (d < 0 || d >= base) {break;}
    if (caml_int64_ult(threshold, res)) {caml_failwith("int_of_string");}
    d = caml_int64_of_int32(d);
    res = caml_int64_add(caml_int64_mul(base64, res), d);
    if (caml_int64_ult(res, d)) {caml_failwith("int_of_string");}
  }
  if (i != caml_ml_string_length(s)) {caml_failwith("int_of_string");}
  if (r[2] == 10 && caml_int64_ult([255,0,0,32768], res)) {caml_failwith("int_of_string");}
  if (sign < 0) {res = caml_int64_neg(res);}
  return res;
}

function caml_int64_is_zero(x) {return (x[3] | x[2] | x[1]) == 0;}

function caml_int64_to_int32(x) {return x[1] | x[2] << 24;}

function caml_int64_is_negative(x) {return x[3] << 16 < 0;}

function caml_jsbytes_of_string(s) {
  if ((s.t & 6) != 0) {caml_convert_string_to_bytes(s);}
  return s.c;
}

function caml_invalid_argument(msg) {
  caml_raise_with_string(caml_global_data.Invalid_argument, msg);
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

function caml_int64_format(fmt, x) {
  var f = caml_parse_format(fmt);
  if (f.signedconv && caml_int64_is_negative(x)) {f.sign = - 1;x = caml_int64_neg(x);}
  var buffer = "";
  var wbase = caml_int64_of_int32(f.base);
  var cvtbl = "0123456789abcdef";
  do
   {
     var p = caml_int64_udivmod(x, wbase);
     x = p[1];
     buffer = cvtbl.charAt(caml_int64_to_int32(p[2])) + buffer;
   }
  while (! caml_int64_is_zero(x)
  );
  if (f.prec >= 0) {
    f.filler = " ";
    var n = f.prec - buffer.length;
    if (n > 0) {buffer = caml_str_repeat(n, "0") + buffer;}
  }
  return caml_finish_formatting(f, buffer);
}

function caml_expm1_float(x) {
  var y = Math.exp(x), z = y - 1;
  return Math.abs(x) > 1 ? z : z == 0 ? x : x * z / Math.log(y);
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

function caml_raise_sys_error(msg) {
  caml_raise_with_string(caml_global_data.Sys_error, msg);
}

function caml_raise_no_such_file(name) {
  name = name instanceof MlBytes ? name.toString() : name;
  caml_raise_sys_error(name + ": No such file or directory");
}

function caml_string_of_array(a) {return new MlBytes(4, a, a.length);}

function caml_string_bound_error() {
  caml_invalid_argument("index out of bounds");
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

function caml_bytes_get(s, i) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_bytes_unsafe_get(s, i);
}

function caml_create_bytes(len) {
  if (len < 0) {caml_invalid_argument("Bytes.create");}
  return new MlBytes(len ? 2 : 9, "", len);
}

function caml_ml_bytes_length(s) {return s.l;}

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

function caml_sys_is_directory(name) {
  var root = resolve_fs_device(name);
  var a = root.device.is_dir(root.rest);
  return a ? 1 : 0;
}

function caml_string_get(s, i) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_string_unsafe_get(s, i);
}

function caml_ba_set_1(ba, i0, v) {return ba.set1(i0, v);}

function bigstring_blit_string_bigstring_stub(v_str, v_src_pos, v_bstr, v_dst_pos, v_len) {
  for (var i = 0; i < v_len; i++) caml_ba_set_1(
    v_bstr,
    v_dst_pos + i,
    caml_string_get(v_str, v_src_pos + i)
  );
  return 0;
}

var caml_blit_string_to_bigstring = bigstring_blit_string_bigstring_stub;

function caml_make_vect(len, init) {
  var len = len + 1 | 0;
  var b = new Array(len);
  b[0] = 0;
  for (var i = 1; i < len; i++) b[i] = init;
  return b;
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

function caml_js_to_string(s) {
  if (typeof s !== "string") {
    throw new Error("caml_js_to_string called with non-string");
  }
  var tag = 9;
  if (! caml_is_ascii(s)) {tag = 8,s = caml_utf8_of_utf16(s);}
  return new MlBytes(tag, s, s.length);
}

function caml_raise_constant(tag) {throw caml_wrap_thrown_exception(tag);}

function caml_raise_not_found() {
  caml_raise_constant(caml_global_data.Not_found);
}

function caml_sys_getenv(name) {
  var g = joo_global_object;
  var n = name.toString();
  if (g.process && g.process.env && g.process.env[n] != undefined) {return caml_js_to_string(g.process.env[n]);}
  if (
  joo_global_object.jsoo_static_env && joo_global_object.jsoo_static_env[n]
  ) {return caml_js_to_string(joo_global_object.jsoo_static_env[n]);}
  caml_raise_not_found();
}

function caml_sys_rename(o, n) {
  var o_root = resolve_fs_device(o);
  var n_root = resolve_fs_device(n);
  if (o_root.device != n_root.device) {
    caml_failwith("caml_sys_rename: cannot move file between two filesystem");
  }
  if (! o_root.device.rename) {
    caml_failwith("caml_sys_rename: no implemented");
  }
  o_root.device.rename(o_root.rest, n_root.rest);
}

function caml_raise_not_a_dir(name) {
  name = name instanceof MlBytes ? name.toString() : name;
  caml_raise_sys_error(name + ": Not a directory");
}

function caml_sys_read_directory(name) {
  var root = resolve_fs_device(name);
  var a = root.device.readdir(root.rest);
  var l = new Array(a.length + 1);
  l[0] = 0;
  for (var i = 0; i < a.length; i++) l[i + 1] = caml_new_string(a[i]);
  return l;
}

var caml_ml_channels = new Array();

function caml_ml_seek_in(chanid, pos) {
  var chan = caml_ml_channels[chanid];
  if (chan.refill != null) {caml_raise_sys_error("Illegal seek");}
  chan.offset = pos;
  return 0;
}

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

function caml_ml_output_char(chanid, c) {
  var s = caml_new_string(String.fromCharCode(c));
  caml_ml_output(chanid, s, 0, 1);
  return 0;
}

function caml_js_fun_call0(f) {return f();}

function caml_ml_refill_input(chan) {
  var str = chan.refill();
  var str_len = caml_ml_bytes_length(str);
  if (str_len == 0) {chan.refill = null;}
  chan.file.write(chan.file.length(), str, 0, str_len);
  return str_len;
}

function caml_ml_may_refill_input(chanid) {
  var chan = caml_ml_channels[chanid];
  if (chan.refill == null) {return;}
  if (chan.file.length() != chan.offset) {return;}
  caml_ml_refill_input(chan);
}

function caml_raise_end_of_file() {
  caml_raise_constant(caml_global_data.End_of_file);
}

function caml_array_bound_error() {
  caml_invalid_argument("index out of bounds");
}

function caml_ml_input_char(chanid) {
  var chan = caml_ml_channels[chanid];
  caml_ml_may_refill_input(chanid);
  if (chan.offset >= chan.file.length()) {caml_raise_end_of_file();}
  var res = chan.file.read_one(chan.offset);
  chan.offset++;
  return res;
}

function caml_sys_const_ostype_win32() {return 0;}

function caml_obj_is_block(x) {return + (x instanceof Array);}

function caml_int64_float_of_bits(x) {
  var exp = (x[3] & 32767) >> 4;
  if (exp == 2047) {
    if ((x[1] | x[2] | x[3] & 15) == 0) return x[3] & 32768 ?
      -
     Infinity :
      Infinity;
    else return NaN;
  }
  var k = Math.pow(2, - 24);
  var res = (x[1] * k + x[2]) * k + (x[3] & 15);
  if (exp > 0) {
    res += 16;
    res *= Math.pow(2, exp - 1027);
  }
  else res *= Math.pow(2, - 1026);
  if (x[3] & 32768) {res = - res;}
  return res;
}

function caml_int64_of_bytes(a) {
  return [
    255,
    a[7] | a[6] << 8 | a[5] << 16,
    a[4] | a[3] << 8 | a[2] << 16,
    a[1] | a[0] << 8
  ];
}

function caml_float_of_bytes(a) {
  return caml_int64_float_of_bits(caml_int64_of_bytes(a));
}

function caml_log10_float(x) {return Math.LOG10E * Math.log(x);}

var caml_runtime_warnings = 0;

function caml_ml_enable_runtime_warnings(bool) {caml_runtime_warnings = bool;return 0;
}

function caml_classify_float(x) {
  if (isFinite(x)) {
    if (Math.abs(x) >= 2.22507385850720138e-308) {return 0;}
    if (x != 0) {return 1;}
    return 2;
  }
  return isNaN(x) ? 4 : 3;
}

function caml_js_var(x) {
  var x = x.toString();
  if (! x.match(/^[a-zA-Z_$][a-zA-Z_$0-9]*(\.[a-zA-Z_$][a-zA-Z_$0-9]*)*$/)) {
    js_print_stderr(
      'caml_js_var: "' + x +
        '" is not a valid JavaScript variable. continuing ..'
    );
  }
  return eval(x);
}

function caml_ml_input_scan_line(chanid) {
  var chan = caml_ml_channels[chanid];
  caml_ml_may_refill_input(chanid);
  var p = chan.offset;
  var len = chan.file.length();
  if (p >= len) {return 0;}
  while(true) {
    if (p >= len) {return - (p - chan.offset);}
    if (chan.file.read_one(p) == 10) {return p - chan.offset + 1;}
    p++;
  }
}

function caml_std_output(chanid, s) {
  var chan = caml_ml_channels[chanid];
  var str = caml_new_string(s);
  var slen = caml_ml_string_length(str);
  chan.file.write(chan.offset, str, 0, slen);
  chan.offset += slen;
  return 0;
}

function caml_gc_minor() {return 0;}

var caml_ephe_data_offset = 2;

function caml_ephe_blit_data(src, dst) {
  dst[caml_ephe_data_offset] = src[caml_ephe_data_offset];
  return 0;
}

function caml_is_printable(c) {return + (c > 31 && c < 127);}

function caml_bytes_lessequal(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c <= s2.c ? 1 : 0;
}

function caml_ba_uint8_get64(ba, i0) {
  var b1 = ba.get1(i0);
  var b2 = ba.get1(i0 + 1) << 8;
  var b3 = ba.get1(i0 + 2) << 16;
  var b4 = ba.get1(i0 + 3);
  var b5 = ba.get1(i0 + 4) << 8;
  var b6 = ba.get1(i0 + 5) << 16;
  var b7 = ba.get1(i0 + 6);
  var b8 = ba.get1(i0 + 7) << 8;
  return [255,b1 | b2 | b3,b4 | b5 | b6,b7 | b8];
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

function caml_ba_num_dims(ba, _dim) {return ba.num_dims;}

function caml_ba_get_1(ba, i0) {return ba.get1(i0);}

function bigstring_blit_bigstring_bytes_stub(v_bstr, v_src_pos, v_str, v_dst_pos, v_len) {
  for (var i = 0; i < v_len; i++) {
    var c = caml_ba_get_1(v_bstr, v_src_pos + i);
    caml_bytes_set(v_str, v_dst_pos + i, c);
  }
  return 0;
}

function caml_create_file(name, content) {
  var root = resolve_fs_device(name);
  if (! root.device.register) {caml_failwith("cannot register file");}
  root.device.register(root.rest, content);
  return 0;
}

function caml_fs_init() {
  var tmp = joo_global_object.caml_fs_tmp;
  if (tmp) {
    for (var i = 0; i < tmp.length; i++) {
      caml_create_file(tmp[i].name, tmp[i].content);
    }
  }
  joo_global_object.caml_create_file = caml_create_file;
  return 0;
}

if (! Math.imul) {
  Math.imul =
    function(x, y) {
      y |= 0;
      return ((x >> 16) * y << 16) + (x & 65535) * y | 0;
    };
}

var caml_mul = Math.imul;

function caml_hash_mix_int(h, d) {
  d = caml_mul(d, 3432918353 | 0);
  d = d << 15 | d >>> 32 - 15;
  d = caml_mul(d, 461845907);
  h ^= d;
  h = h << 13 | h >>> 32 - 13;
  return (h + (h << 2) | 0) + (3864292196 | 0) | 0;
}

function caml_hash_mix_string_arr(h, s) {
  var len = s.length, i, w;
  for (i = 0; i + 4 <= len; i += 4) {
    w = s[i] | s[i + 1] << 8 | s[i + 2] << 16 | s[i + 3] << 24;
    h = caml_hash_mix_int(h, w);
  }
  w = 0;
  switch (len & 3) {
    case 3:
      w = s[i + 2] << 16;
    case 2:
      w |= s[i + 1] << 8;
    case 1:
      w |= s[i];
      h = caml_hash_mix_int(h, w);
    default:
    }
  h ^= len;
  return h;
}

function caml_return_exn_constant(tag) {return tag;}

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

function caml_load_global_module(n) {return caml_global_data[n];}

function caml_final_register_called_without_value() {return 0;}

function caml_sys_random_seed() {
  var x = new Date().getTime() ^ 4294967295 * Math.random();
  return [0,x];
}

function caml_list_of_js_array(a) {
  var l = 0;
  for (var i = a.length - 1; i >= 0; i--) {var e = a[i];l = [0,e,l];}
  return l;
}

function caml_ba_get_2(ba, i0, i1) {return ba.get([i0,i1]);}

function caml_set_parser_trace() {return 0;}

function win_handle_fd(x) {return x;}

function unix_gettimeofday() {return new Date().getTime() / 1e3;}

function caml_ba_uint8_set16(ba, i0, v) {
  ba.set1(i0, v & 255);
  ba.set1(i0 + 1, v >>> 8 & 255);
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

function caml_js_wrap_callback(f) {
  return function() {
    if (arguments.length > 0) {
      return caml_call_gen(f, arguments);
    }
    else {return caml_call_gen(f, [undefined]);}
  };
}

function caml_js_wrap_callback_arguments(f) {
  return function() {return caml_js_wrap_callback(f)(arguments);};
}

function caml_sys_chdir(dir) {
  var root = resolve_fs_device(dir);
  if (root.device.exists(root.rest)) {
    if (root.rest) caml_current_dir =
      root.path + root.rest + "/";
    else caml_current_dir = root.path;
    return 0;
  }
  else {caml_raise_no_such_file(dir);}
}

function caml_gc_counters() {return [254,0,0,0];}

function caml_js_delete(o, f) {delete o[f];return 0;}

function caml_list_mount_point() {
  var prev = 0;
  for (var i = 0; i < jsoo_mount_point.length; i++) {
    var old = prev;
    prev = [0,caml_new_string(jsoo_mount_point[i].path),old];
  }
  return prev;
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

var caml_marshal_constants = {
  PREFIX_SMALL_BLOCK: 128,
  PREFIX_SMALL_INT: 64,
  PREFIX_SMALL_STRING: 32,
  CODE_INT8: 0,
  CODE_INT16: 1,
  CODE_INT32: 2,
  CODE_INT64: 3,
  CODE_SHARED8: 4,
  CODE_SHARED16: 5,
  CODE_SHARED32: 6,
  CODE_BLOCK32: 8,
  CODE_BLOCK64: 19,
  CODE_STRING8: 9,
  CODE_STRING32: 10,
  CODE_DOUBLE_BIG: 11,
  CODE_DOUBLE_LITTLE: 12,
  CODE_DOUBLE_ARRAY8_BIG: 13,
  CODE_DOUBLE_ARRAY8_LITTLE: 14,
  CODE_DOUBLE_ARRAY32_BIG: 15,
  CODE_DOUBLE_ARRAY32_LITTLE: 7,
  CODE_CODEPOINTER: 16,
  CODE_INFIXPOINTER: 17,
  CODE_CUSTOM: 18
};

function caml_js_equals(x, y) {return + (x == y);}

function caml_hash_mix_string_str(h, s) {
  var len = s.length, i, w;
  for (i = 0; i + 4 <= len; i += 4) {
    w =
      s.charCodeAt(i) |
        s.charCodeAt(i + 1) << 8 |
        s.charCodeAt(i + 2) << 16 |
        s.charCodeAt(i + 3) << 24;
    h = caml_hash_mix_int(h, w);
  }
  w = 0;
  switch (len & 3) {
    case 3:
      w = s.charCodeAt(i + 2) << 16;
    case 2:
      w |= s.charCodeAt(i + 1) << 8;
    case 1:
      w |= s.charCodeAt(i);
      h = caml_hash_mix_int(h, w);
    default:
    }
  h ^= len;
  return h;
}

function caml_greaterthan(x, y) {
  return + (caml_compare_val(x, y, false) > 0);
}

function caml_ba_blit(src, dst) {dst.blit(src);return 0;}

function caml_input_value_from_reader(reader, ofs) {
  var _magic = reader.read32u();
  var _block_len = reader.read32u();
  var num_objects = reader.read32u();
  var _size_32 = reader.read32u();
  var _size_64 = reader.read32u();
  var stack = [];
  var intern_obj_table = num_objects > 0 ? [] : null;
  var obj_counter = 0;
  function intern_rec() {
    var code = reader.read8u();
    if (code >= 64) {
      if (code >= 128) {
        var tag = code & 15;
        var size = code >> 4 & 7;
        var v = [tag];
        if (size == 0) {return v;}
        if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
        stack.push(v, size);
        return v;
      }
      else return code & 63;
    }
    else {
      if (code >= 32) {
        var len = code & 31;
        var v = reader.readstr(len);
        if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
        return v;
      }
      else {
        switch (code) {
          case 0:
            return reader.read8s();
          case 1:
            return reader.read16s();
          case 2:
            return reader.read32s();
          case 3:
            caml_failwith("input_value: integer too large");
            break;
          case 4:
            var offset = reader.read8u();
            return intern_obj_table[obj_counter - offset];
          case 5:
            var offset = reader.read16u();
            return intern_obj_table[obj_counter - offset];
          case 6:
            var offset = reader.read32u();
            return intern_obj_table[obj_counter - offset];
          case 8:
            var header = reader.read32u();
            var tag = header & 255;
            var size = header >> 10;
            var v = [tag];
            if (size == 0) {return v;}
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            stack.push(v, size);
            return v;
          case 19:
            caml_failwith("input_value: data block too large");
            break;
          case 9:
            var len = reader.read8u();
            var v = reader.readstr(len);
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            return v;
          case 10:
            var len = reader.read32u();
            var v = reader.readstr(len);
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            return v;
          case 12:
            var t = new Array(8);
            ;
            for (var i = 0; i < 8; i++) t[7 - i] = reader.read8u();
            var v = caml_float_of_bytes(t);
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            return v;
          case 11:
            var t = new Array(8);
            ;
            for (var i = 0; i < 8; i++) t[i] = reader.read8u();
            var v = caml_float_of_bytes(t);
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            return v;
          case 14:
            var len = reader.read8u();
            var v = new Array(len + 1);
            v[0] = 254;
            var t = new Array(8);
            ;
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            for (var i = 1; i <= len; i++) {
              for (var j = 0; j < 8; j++) t[7 - j] = reader.read8u();
              v[i] = caml_float_of_bytes(t);
            }
            return v;
          case 13:
            var len = reader.read8u();
            var v = new Array(len + 1);
            v[0] = 254;
            var t = new Array(8);
            ;
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            for (var i = 1; i <= len; i++) {
              for (var j = 0; j < 8; j++) t[j] = reader.read8u();
              v[i] = caml_float_of_bytes(t);
            }
            return v;
          case 7:
            var len = reader.read32u();
            var v = new Array(len + 1);
            v[0] = 254;
            if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
            var t = new Array(8);
            ;
            for (var i = 1; i <= len; i++) {
              for (var j = 0; j < 8; j++) t[7 - j] = reader.read8u();
              v[i] = caml_float_of_bytes(t);
            }
            return v;
          case 15:
            var len = reader.read32u();
            var v = new Array(len + 1);
            v[0] = 254;
            var t = new Array(8);
            ;
            for (var i = 1; i <= len; i++) {
              for (var j = 0; j < 8; j++) t[j] = reader.read8u();
              v[i] = caml_float_of_bytes(t);
            }
            return v;
          case 16:
          case 17:
            caml_failwith("input_value: code pointer");
            break;
          case 18:
            var c, s = "";
            while((c = reader.read8u()) != 0) s += String.fromCharCode(c);
            switch (s) {
              case "_j":
                var t = new Array(8);
                ;
                for (var j = 0; j < 8; j++) t[j] = reader.read8u();
                var v = caml_int64_of_bytes(t);
                if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
                return v;
              case "_i":
                var v = reader.read32s();
                if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
                return v;
              case "_n":
                switch (reader.read8u()) {
                  case 1:
                    var v = reader.read32s();
                    if (intern_obj_table) {intern_obj_table[obj_counter++] = v;}
                    return v;
                  case 2:
                    caml_failwith("input_value: native integer value too large");
                  default:
                    caml_failwith("input_value: ill-formed native integer")
                  }
              default:
                caml_failwith("input_value: unknown custom block identifier")
              }
          default:
            caml_failwith("input_value: ill-formed message")
          }
      }
    }
  }
  var res = intern_rec();
  while(stack.length > 0) {
    var size = stack.pop();
    var v = stack.pop();
    var d = v.length;
    if (d < size) {stack.push(v, size);}
    v[d] = intern_rec();
  }
  if (typeof ofs != "number") {ofs[0] = reader.i;}
  return res;
}

function caml_js_from_array(a) {return raw_array_sub(a, 1, a.length - 1);}

function caml_ba_slice(ba, vind) {return ba.slice(caml_js_from_array(vind));}

function caml_raise_zero_divide() {
  caml_raise_constant(caml_global_data.Division_by_zero);
}

function caml_int64_div(x, y) {
  if (caml_int64_is_zero(y)) {caml_raise_zero_divide();}
  var sign = x[3] ^ y[3];
  if (x[3] & 32768) {x = caml_int64_neg(x);}
  if (y[3] & 32768) {y = caml_int64_neg(y);}
  var q = caml_int64_udivmod(x, y)[1];
  if (sign & 32768) {q = caml_int64_neg(q);}
  return q;
}

function bigstring_find(bs, chr, pos, len) {
  while(len > 0) {
    if (caml_ba_get_1(bs, pos) == chr) {return pos;}
    pos++;
    len--;
  }
  return - 1;
}

function caml_js_html_entities(s) {
  var str, temp = document.createElement("p");
  temp.innerHTML = s;
  str = temp.textContent || temp.innerText;
  temp = null;
  return str;
}

function caml_js_property_set(o, f, v) {
  js_print_stderr(
    "caml_js_property_set: This should never happen - all accesses should have been optimized by now."
  );
  o[f] = v;
  return 0;
}

function caml_int64_of_float(x) {
  if (x < 0) {x = Math.ceil(x);}
  return [
    255,
    x & 16777215,
    Math.floor(x * caml_int64_offset) & 16777215,
    Math.floor(x * caml_int64_offset * caml_int64_offset) & 65535
  ];
}

function caml_ml_channel_size_64(chanid) {
  var chan = caml_ml_channels[chanid];
  return caml_int64_of_float(chan.file.length());
}

function caml_ba_set_2(ba, i0, i1, v) {return ba.set([i0,i1], v);}

function caml_string_unsafe_set(s, i, c) {return caml_bytes_unsafe_set(s, i, c);
}

function caml_CamlinternalMod_init_mod(loc, shape) {
  function undef_module(_x) {
    caml_raise_with_arg(caml_global_data.Undefined_recursive_module, loc);
  }
  function loop(shape, struct, idx) {
    if (typeof shape === "number") switch (shape) {
      case 0:
        struct[idx] = {fun: undef_module};
        break;
      case 1:
        struct[idx] = [246,undef_module];
        break;
      default:
        struct[idx] = []
      }
    else switch (shape[0]) {
      case 0:
        struct[idx] = [0];
        for (var i = 1; i < shape[1].length; i++) loop(shape[1][i], struct[idx], i);
        break;
      default:
        struct[idx] = shape[1]
      }
  }
  var res = [];
  loop(shape, res, 0);
  return res[0];
}

function caml_js_eval_string(s) {return eval(s.toString());}

function caml_bytes_compare(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c < s2.c ? - 1 : s1.c > s2.c ? 1 : 0;
}

function caml_marshal_data_size(s, ofs) {
  function get32(s, i) {
    return caml_bytes_unsafe_get(s, i) << 24 |
      caml_bytes_unsafe_get(s, i + 1) << 16 |
      caml_bytes_unsafe_get(s, i + 2) << 8 |
      caml_bytes_unsafe_get(s, i + 3);
  }
  if (get32(s, ofs) != (2224400062 | 0)) {
    caml_failwith("Marshal.data_size: bad object");
  }
  return get32(s, ofs + 4);
}

function MlBytesReader(s, i) {this.s = caml_jsbytes_of_string(s);this.i = i;}

MlBytesReader.prototype =
  {
    read8u: function() {return this.s.charCodeAt(this.i++);},
    read8s: function() {return this.s.charCodeAt(this.i++) << 24 >> 24;},
    read16u: function() {
      var s = this.s, i = this.i;
      this.i = i + 2;
      return s.charCodeAt(i) << 8 | s.charCodeAt(i + 1);
    },
    read16s: function() {
      var s = this.s, i = this.i;
      this.i = i + 2;
      return s.charCodeAt(i) << 24 >> 16 | s.charCodeAt(i + 1);
    },
    read32u: function() {
      var s = this.s, i = this.i;
      this.i = i + 4;
      return (s.charCodeAt(i) << 24 |
         s.charCodeAt(i + 1) << 16 |
         s.charCodeAt(i + 2) << 8 |
         s.charCodeAt(i + 3)) >>> 0;
    },
    read32s: function() {
      var s = this.s, i = this.i;
      this.i = i + 4;
      return s.charCodeAt(i) << 24 |
        s.charCodeAt(i + 1) << 16 |
        s.charCodeAt(i + 2) << 8 |
        s.charCodeAt(i + 3);
    },
    readstr: function(len) {
      var i = this.i;
      this.i = i + len;
      return caml_new_string(this.s.substring(i, i + len));
    }
  };

function caml_input_value_from_string(s, ofs) {
  var reader = new MlBytesReader(s, typeof ofs == "number" ? ofs : ofs[0]);
  return caml_input_value_from_reader(reader, ofs);
}

function caml_input_value(chanid) {
  var chan = caml_ml_channels[chanid];
  var buf = caml_create_bytes(8);
  chan.file.read(chan.offset, buf, 0, 8);
  var len = caml_marshal_data_size(buf, 0) + 20;
  var buf = caml_create_bytes(len);
  chan.file.read(chan.offset, buf, 0, len);
  var offset = [0];
  var res = caml_input_value_from_string(buf, offset);
  chan.offset = chan.offset + offset[0];
  return res;
}

function caml_ba_kind(ba) {return ba.kind;}

function caml_js_fun_call(f, a) {
  switch (a.length) {
    case 1:
      return f();
    case 2:
      return f(a[1]);
    case 3:
      return f(a[1], a[2]);
    case 4:
      return f(a[1], a[2], a[3]);
    case 5:
      return f(a[1], a[2], a[3], a[4]);
    case 6:
      return f(a[1], a[2], a[3], a[4], a[5]);
    case 7:
      return f(a[1], a[2], a[3], a[4], a[5], a[6]);
    case 8:
      return f(a[1], a[2], a[3], a[4], a[5], a[6], a[7])
    }
  return f.apply(null, caml_js_from_array(a));
}

function caml_js_pure_expr(f) {return f();}

function caml_sys_exit(code) {
  var g = joo_global_object;
  if (g.quit) {g.quit(code);}
  if (g.process && g.process.exit) {g.process.exit(code);}
  caml_invalid_argument("Function 'exit' not implemented");
}

function caml_ml_input(chanid, s, i, l) {
  var chan = caml_ml_channels[chanid];
  var l2 = chan.file.length() - chan.offset;
  if (l2 == 0 && chan.refill != null) {l2 = caml_ml_refill_input(chan);}
  if (l2 < l) {l = l2;}
  chan.file.read(chan.offset, s, i, l);
  chan.offset += l;
  return l;
}

function caml_ba_reshape(ba, vind) {
  return ba.reshape(caml_js_from_array(vind));
}

var log2_ok = Math.log2 && Math.log2(1.12355820928894744e+307) == 1020;

function jsoo_floor_log2(x) {
  if (log2_ok) {return Math.floor(Math.log2(x));}
  var i = 0;
  if (x == 0) {return - Infinity;}
  if (x >= 1) {
    while(x >= 2) {x /= 2;i++;}
  }
  else {while(x < 1) {x *= 2;i--;}}
  ;
  return i;
}

function caml_int32_bits_of_float(x) {
  var float32a = new (joo_global_object.Float32Array)(1);
  float32a[0] = x;
  var int32a = new (joo_global_object.Int32Array)(float32a.buffer);
  return int32a[0] | 0;
}

function caml_hash_mix_bigstring(h, bs) {
  return caml_hash_mix_string_arr(h, bs.data);
}

function caml_set_oo_id(b) {b[2] = caml_oo_last_id++;return b;}

function caml_js_meth_call2(o, f, a, b) {return o[f.toString()].call(o, a, b);
}

function caml_record_backtrace() {return 0;}

function polymorphic_log(x) {
  if (typeof x == "string") {
    joo_global_object.console.log(x);
  }
  else if (x instanceof MlBytes) {
    joo_global_object.console.log(x.c);
  }
  else {joo_global_object.console.log(x);}
}

function caml_get_global_data() {return caml_global_data;}

function unix_gmtime(t) {
  var d = new Date(t * 1e3);
  var januaryfirst = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
  var doy = Math.floor((d.getTime() - januaryfirst.getTime()) / 864e5);
  return [
    0,
    d.getUTCSeconds(),
    d.getUTCMinutes(),
    d.getUTCHours(),
    d.getUTCDate(),
    d.getUTCMonth(),
    d.getUTCFullYear() - 1900,
    d.getUTCDay(),
    doy,
    false | 0
  ];
}

function caml_ba_uint8_get16(ba, i0) {
  var b1 = ba.get1(i0);
  var b2 = ba.get1(i0 + 1) << 8;
  return b1 | b2;
}

function caml_int64_shift_right_unsigned(x, s) {
  s = s & 63;
  if (s == 0) {return x;}
  if (s < 24) {
    return [
      255,
      (x[1] >> s | x[2] << 24 - s) & 16777215,
      (x[2] >> s | x[3] << 24 - s) & 16777215,
      x[3] >> s
    ];
  }
  if (s < 48) {
    return [255,(x[2] >> s - 24 | x[3] << 48 - s) & 16777215,x[3] >> s - 24,0];
  }
  return [255,x[3] >> s - 48,0,0];
}

function caml_sys_const_backend_type() {
  return [0,caml_new_string("js_of_ocaml")];
}

function caml_sys_get_config() {return [0,caml_new_string("Unix"),32,0];}

function caml_compare(a, b) {return caml_compare_val(a, b, true);}

function unix_time() {return Math.floor(unix_gettimeofday());}

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

var bigstring_blit_bigstring_string_stub = bigstring_blit_bigstring_bytes_stub;

function caml_js_dict_set(o, f, v) {
  js_print_stderr(
    "caml_js_dict_set: This should never happen - all accesses should have been optimized by now."
  );
  o[f] = v;
  return 0;
}

function caml_fresh_oo_id() {return caml_oo_last_id++;}

function caml_int64_to_float(x) {
  return (x[3] << 16) * Math.pow(2, 32) + x[2] * Math.pow(2, 24) + x[1];
}

function caml_ba_get_size(dims) {
  var n_dims = dims.length;
  var size = 1;
  for (var i = 0; i < n_dims; i++) {
    if (dims[i] < 0) {
      caml_invalid_argument("Bigarray.create: negative dimension");
    }
    size = size * dims[i];
  }
  return size;
}

function caml_ba_create_from(data, data2, data_type, kind, layout, dims) {
  var n_dims = dims.length;
  var size = caml_ba_get_size(dims);
  function offset_c(index) {
    var ofs = 0;
    if (n_dims != index.length) {
      caml_invalid_argument("Bigarray.get/set: bad number of dimensions");
    }
    for (var i = 0; i < n_dims; i++) {
      if (index[i] < 0 || index[i] >= dims[i]) {caml_array_bound_error();}
      ofs = ofs * dims[i] + index[i];
    }
    return ofs;
  }
  function offset_fortran(index) {
    var ofs = 0;
    if (n_dims != index.length) {
      caml_invalid_argument("Bigarray.get/set: wrong number of indices");
    }
    for (var i = n_dims - 1; i >= 0; i--) {
      if (index[i] < 1 || index[i] > dims[i]) {caml_array_bound_error();}
      ofs = ofs * dims[i] + (index[i] - 1);
    }
    return ofs;
  }
  var offset = layout == 0 ? offset_c : offset_fortran;
  var dim0 = dims[0];
  function get_std(index) {
    var ofs = offset(index);
    var v = data[ofs];
    return v;
  }
  function get_int64(index) {
    var off = offset(index);
    var l = data[off];
    var h = data2[off];
    return [
      255,
      l & 16777215,
      l >>> 24 & 255 | (h & 65535) << 8,
      h >>> 16 & 65535
    ];
  }
  function get_complex(index) {
    var off = offset(index);
    var r = data[off];
    var i = data2[off];
    return [254,r,i];
  }
  var get = data_type == 1 ?
    get_int64 :
    data_type == 2 ? get_complex : get_std;
  function get1_c(i) {
    if (i < 0 || i >= dim0) {caml_array_bound_error();}
    return data[i];
  }
  function get1_fortran(i) {
    if (i < 1 || i > dim0) {caml_array_bound_error();}
    return data[i - 1];
  }
  function get1_any(i) {return get([i]);}
  var get1 = data_type == 0 ? layout == 0 ? get1_c : get1_fortran : get1_any;
  function set_std_raw(off, v) {data[off] = v;}
  function set_int64_raw(off, v) {
    data[off] = v[1] | (v[2] & 255) << 24;
    data2[off] = v[2] >>> 8 & 65535 | v[3] << 16;
  }
  function set_complex_raw(off, v) {data[off] = v[1];data2[off] = v[2];}
  function set_std(index, v) {
    var ofs = offset(index);
    return set_std_raw(ofs, v);
  }
  function set_int64(index, v) {return set_int64_raw(offset(index), v);}
  function set_complex(index, v) {return set_complex_raw(offset(index), v);}
  var set = data_type == 1 ?
    set_int64 :
    data_type == 2 ? set_complex : set_std;
  function set1_c(i, v) {
    if (i < 0 || i >= dim0) {caml_array_bound_error();}
    data[i] = v;
  }
  function set1_fortran(i, v) {
    if (i < 1 || i > dim0) {caml_array_bound_error();}
    data[i - 1] = v;
  }
  function set1_any(i, v) {set([i], v);}
  var set1 = data_type == 0 ? layout == 0 ? set1_c : set1_fortran : set1_any;
  function nth_dim(i) {
    if (i < 0 || i >= n_dims) {caml_invalid_argument("Bigarray.dim");}
    return dims[i];
  }
  function fill(v) {
    if (data_type == 0) {
      for (var i = 0; i < data.length; i++) set_std_raw(i, v);
    }
    if (data_type == 1) {
      for (var i = 0; i < data.length; i++) set_int64_raw(i, v);
    }
    if (data_type == 2) {
      for (var i = 0; i < data.length; i++) set_complex_raw(i, v);
    }
  }
  function blit(from) {
    if (n_dims != from.num_dims) {
      caml_invalid_argument("Bigarray.blit: dimension mismatch");
    }
    for (var i = 0; i < n_dims; i++) if (dims[i] != from.nth_dim(i)) {
      caml_invalid_argument("Bigarray.blit: dimension mismatch");
    }
    data.set(from.data);
    if (data_type != 0) {data2.set(from.data2);}
  }
  function sub(ofs, len) {
    var changed_dim;
    var mul = 1;
    if (layout == 0) {
      for (var i = 1; i < n_dims; i++) mul = mul * dims[i];
      changed_dim = 0;
    }
    else {
      for (var i = 0; i < n_dims - 1; i++) mul = mul * dims[i];
      changed_dim = n_dims - 1;
      ofs = ofs - 1;
    }
    if (ofs < 0 || len < 0 || ofs + len > dims[changed_dim]) {caml_invalid_argument("Bigarray.sub: bad sub-array");}
    var new_data = data.subarray(ofs * mul, (ofs + len) * mul);
    var new_data2 = data_type == 0 ?
      null :
      data2.subarray(ofs * mul, (ofs + len) * mul);
    var new_dims = [];
    for (var i = 0; i < n_dims; i++) new_dims[i] = dims[i];
    new_dims[changed_dim] = len;
    return caml_ba_create_from(
      new_data,
      new_data2,
      data_type,
      kind,
      layout,
      new_dims
    );
  }
  function slice(vind) {
    var num_inds = vind.length;
    var index = [];
    var sub_dims = [];
    var ofs;
    if (num_inds >= n_dims) {
      caml_invalid_argument("Bigarray.slice: too many indices");
    }
    if (layout == 0) {
      for (var i = 0; i < num_inds; i++) index[i] = vind[i];
      for (; i < n_dims; i++) index[i] = 0;
      ofs = offset(index);
      sub_dims = dims.slice(num_inds);
    }
    else {
      for (var i = 0; i < num_inds; i++) index[n_dims - num_inds + i] = vind[i];
      for (var i = 0; i < n_dims - num_inds; i++) index[i] = 1;
      ofs = offset(index);
      sub_dims = dims.slice(0, num_inds);
    }
    var size = caml_ba_get_size(sub_dims);
    var new_data = data.subarray(ofs, ofs + size);
    var new_data2 = data_type == 0 ? null : data2.subarray(ofs, ofs + size);
    return caml_ba_create_from(
      new_data,
      new_data2,
      data_type,
      kind,
      layout,
      sub_dims
    );
  }
  function reshape(vdim) {
    var new_dim = [];
    var num_dims = vdim.length;
    if (num_dims < 1) {
      caml_invalid_argument("Bigarray.reshape: bad number of dimensions");
    }
    var num_elts = 1;
    for (var i = 0; i < num_dims; i++) {
      new_dim[i] = vdim[i];
      if (new_dim[i] < 0) {
        caml_invalid_argument("Bigarray.reshape: negative dimension");
      }
      num_elts = num_elts * new_dim[i];
    }
    if (num_elts != size) {
      caml_invalid_argument("Bigarray.reshape: size mismatch");
    }
    return caml_ba_create_from(data, data2, data_type, kind, layout, new_dim);
  }
  function compare(b, total) {
    if (layout != b.layout) {return b.layout - layout;}
    if (n_dims != b.num_dims) {return b.num_dims - n_dims;}
    for (var i = 0; i < n_dims; i++) if (nth_dim(i) != b.nth_dim(i)) {
      return nth_dim(i) < b.nth_dim(i) ? - 1 : 1;
    }
    switch (kind) {
      case 0:
      case 1:
      case 10:
      case 11:
        var x, y;
        for (var i = 0; i < data.length; i++) {
          x = data[i];
          y = b.data[i];
          if (x < y) {return - 1;}
          if (x > y) {return 1;}
          if (x != y) {
            if (x != y) {
              if (! total) {return NaN;}
              if (x == x) {return 1;}
              if (y == y) {return - 1;}
            }
          }
          if (data2) {
            x = data2[i];
            y = b.data2[i];
            if (x < y) {return - 1;}
            if (x > y) {return 1;}
            if (x != y) {
              if (x != y) {
                if (! total) {return NaN;}
                if (x == x) {return 1;}
                if (y == y) {return - 1;}
              }
            }
          }
        }
        ;
        break;
      case 2:
      case 3:
      case 4:
      case 5:
      case 6:
      case 8:
      case 9:
      case 12:
        for (var i = 0; i < data.length; i++) {
          if (data[i] < b.data[i]) {return - 1;}
          if (data[i] > b.data[i]) {return 1;}
        }
        ;
        break;
      case 7:
        for (var i = 0; i < data.length; i++) {
          if (data2[i] < b.data2[i]) {return - 1;}
          if (data2[i] > b.data2[i]) {return 1;}
          if (data[i] < b.data[i]) {return - 1;}
          if (data[i] > b.data[i]) {return 1;}
        }
        ;
        break
      }
    return 0;
  }
  return {
    data: data,
    data2: data2,
    data_type: data_type,
    num_dims: n_dims,
    nth_dim: nth_dim,
    kind: kind,
    layout: layout,
    size: size,
    sub: sub,
    slice: slice,
    blit: blit,
    fill: fill,
    reshape: reshape,
    get: get,
    get1: get1,
    set: set,
    set1: set1,
    compare: compare
  };
}

function bigstring_of_array_buffer(ab) {
  var ta = new (joo_global_object.Uint8Array)(ab);
  return caml_ba_create_from(ta, null, 0, 12, 0, [ta.length]);
}

function bigstring_destroy_stub(v_bstr) {
  if (v_bstr.data2 != null) {
    caml_invalid_argument("bigstring_destroy: unsupported kind");
  }
  if (v_bstr.hasOwnProperty("__is_deallocated")) {
    caml_invalid_argument(
      "bigstring_destroy: bigstring is already deallocated"
    );
  }
  var destroyed_data = new (v_bstr.data.__proto__.constructor)(0);
  var destroyed_bigstring = caml_ba_create_from(
    destroyed_data,
    null,
    v_bstr.data_type,
    v_bstr.kind,
    v_bstr.layout,
    [0]
  );
  destroyed_bigstring.__is_deallocated = true;
  Object.assign(v_bstr, destroyed_bigstring);
  return 0;
}

function caml_raw_backtrace_length() {return 0;}

function caml_ba_uint8_get32(ba, i0) {
  var b1 = ba.get1(i0);
  var b2 = ba.get1(i0 + 1) << 8;
  var b3 = ba.get1(i0 + 2) << 16;
  var b4 = ba.get1(i0 + 3) << 24;
  return b1 | b2 | b3 | b4;
}

function bigstring_to_array_buffer(bs) {return bs.data.buffer;}

function caml_mod(x, y) {if (y == 0) {caml_raise_zero_divide();}return x % y;}

function caml_obj_block(tag, size) {
  var o = new Array(size + 1);
  o[0] = tag;
  for (var i = 1; i <= size; i++) o[i] = 0;
  return o;
}

function caml_ba_init() {return 0;}

function caml_final_release() {return 0;}

function caml_ba_get_generic(ba, index) {
  return ba.get(caml_js_from_array(index));
}

function BigStringReader(bs, i) {this.s = bs;this.i = i;}

BigStringReader.prototype =
  {
    read8u: function() {return caml_ba_get_1(this.s, this.i++);},
    read8s: function() {return caml_ba_get_1(this.s, this.i++) << 24 >> 24;},
    read16u: function() {
      var s = this.s, i = this.i;
      this.i = i + 2;
      return caml_ba_get_1(s, i) << 8 | caml_ba_get_1(s, i + 1);
    },
    read16s: function() {
      var s = this.s, i = this.i;
      this.i = i + 2;
      return caml_ba_get_1(s, i) << 24 >> 16 | caml_ba_get_1(s, i + 1);
    },
    read32u: function() {
      var s = this.s, i = this.i;
      this.i = i + 4;
      return (caml_ba_get_1(s, i) << 24 |
         caml_ba_get_1(s, i + 1) << 16 |
         caml_ba_get_1(s, i + 2) << 8 |
         caml_ba_get_1(s, i + 3)) >>> 0;
    },
    read32s: function() {
      var s = this.s, i = this.i;
      this.i = i + 4;
      return caml_ba_get_1(s, i) << 24 |
        caml_ba_get_1(s, i + 1) << 16 |
        caml_ba_get_1(s, i + 2) << 8 |
        caml_ba_get_1(s, i + 3);
    },
    readstr: function(len) {
      var i = this.i;
      var arr = new Array(len);
      for (var j = 0; j < len; j++) {arr[j] = caml_ba_get_1(this.s, i + j);}
      this.i = i + len;
      return caml_string_of_array(arr);
    }
  };

function caml_get_exception_backtrace() {return 0;}

function raw_array_cons(a, x) {
  var l = a.length;
  var b = new Array(l + 1);
  b[0] = x;
  for (var i = 1; i <= l; i++) b[i] = a[i - 1];
  return b;
}

function caml_js_to_array(a) {return raw_array_cons(a, 0);}

function caml_mount_autoload(name, f) {
  var path = caml_make_path(name);
  var name = path.join("/") + "/";
  jsoo_mount_point.push({path: name,device: new MlFakeDevice(name, f)});
  return 0;
}

function caml_sys_close(fd) {delete caml_global_data.fds[fd];return 0;}

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

function caml_int64_to_bytes(x) {
  return [
    x[3] >> 8,
    x[3] & 255,
    x[2] >> 16,
    x[2] >> 8 & 255,
    x[2] & 255,
    x[1] >> 16,
    x[1] >> 8 & 255,
    x[1] & 255
  ];
}

function caml_bytes_set64(s, i, i64) {
  if (i >>> 0 >= s.l + 7) {caml_string_bound_error();}
  var a = caml_int64_to_bytes(i64);
  for (var j = 0; j < 8; j++) {caml_string_unsafe_set(s, i + 7 - j, a[j]);}
  return 0;
}

function caml_bytes_set16(s, i, i16) {
  if (i >>> 0 >= s.l + 1) {caml_string_bound_error();}
  var b2 = 255 & i16 >> 8, b1 = 255 & i16;
  caml_string_unsafe_set(s, i + 0, b1);
  caml_string_unsafe_set(s, i + 1, b2);
  return 0;
}

function caml_string_set16(s, i, i16) {return caml_bytes_set16(s, i, i16);}

function caml_int64_bswap(x) {
  return [
    255,
    (x[3] & 65280) >> 8 | (x[3] & 255) << 8 | x[2] & 16711680,
    (x[2] & 65280) >> 8 | (x[2] & 255) << 8 | x[1] & 16711680,
    (x[1] & 65280) >> 8 | (x[1] & 255) << 8
  ];
}

function caml_div(x, y) {
  if (y == 0) {caml_raise_zero_divide();}
  return x / y | 0;
}

function caml_fill_bytes(s, i, l, c) {
  if (l > 0) {
    if (i == 0 && (l >= s.l || s.t == 2 && l >= s.c.length)) {
      if (c == 0) {
        s.c = "";
        s.t = 2;
      }
      else {
        s.c = caml_str_repeat(l, String.fromCharCode(c));
        s.t = l == s.l ? 0 : 2;
      }
    }
    else {
      if (s.t != 4) {caml_convert_string_to_array(s);}
      for (l += i; i < l; i++) s.c[i] = c;
    }
  }
  return 0;
}

var caml_fill_string = caml_fill_bytes;

function caml_string_lessthan(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c < s2.c ? 1 : 0;
}

function caml_string_greaterthan(s1, s2) {return caml_string_lessthan(s2, s1);
}

function caml_gc_major() {return 0;}

function caml_ephe_get_data_copy(x) {
  if (x[caml_ephe_data_offset] === undefined) return 0;
  else return [0,caml_obj_dup(x[caml_ephe_data_offset])];
}

function caml_lex_array(s) {
  s = caml_jsbytes_of_string(s);
  var l = s.length / 2;
  var a = new Array(l);
  for (var i = 0; i < l; i++) a[i] =
    (s.charCodeAt(2 * i) | s.charCodeAt(2 * i + 1) << 8) << 16 >> 16;
  return a;
}

function caml_lex_engine(tbl, start_state, lexbuf) {
  var lex_buffer = 2;
  var lex_buffer_len = 3;
  var lex_start_pos = 5;
  var lex_curr_pos = 6;
  var lex_last_pos = 7;
  var lex_last_action = 8;
  var lex_eof_reached = 9;
  var lex_base = 1;
  var lex_backtrk = 2;
  var lex_default = 3;
  var lex_trans = 4;
  var lex_check = 5;
  if (! tbl.lex_default) {
    tbl.lex_base = caml_lex_array(tbl[lex_base]);
    tbl.lex_backtrk = caml_lex_array(tbl[lex_backtrk]);
    tbl.lex_check = caml_lex_array(tbl[lex_check]);
    tbl.lex_trans = caml_lex_array(tbl[lex_trans]);
    tbl.lex_default = caml_lex_array(tbl[lex_default]);
  }
  var c, state = start_state;
  var buffer = caml_array_of_string(lexbuf[lex_buffer]);
  if (state >= 0) {
    lexbuf[lex_last_pos] = lexbuf[lex_start_pos] = lexbuf[lex_curr_pos];
    lexbuf[lex_last_action] = - 1;
  }
  else {state = - state - 1;}
  for (; ; ) {
    var base = tbl.lex_base[state];
    if (base < 0) {return - base - 1;}
    var backtrk = tbl.lex_backtrk[state];
    if (backtrk >= 0) {
      lexbuf[lex_last_pos] = lexbuf[lex_curr_pos];
      lexbuf[lex_last_action] = backtrk;
    }
    if (lexbuf[lex_curr_pos] >= lexbuf[lex_buffer_len]) {
      if (lexbuf[lex_eof_reached] == 0) return - state - 1;
      else c = 256;
    }
    else {c = buffer[lexbuf[lex_curr_pos]];lexbuf[lex_curr_pos]++;}
    if (tbl.lex_check[base + c] == state) state = tbl.lex_trans[base + c];
    else state = tbl.lex_default[state];
    if (state < 0) {
      lexbuf[lex_curr_pos] = lexbuf[lex_last_pos];
      if (lexbuf[lex_last_action] == - 1) caml_failwith("lexing: empty token");
      else return lexbuf[lex_last_action];
    }
    else {if (c == 256) {lexbuf[lex_eof_reached] = 0;}}
  }
}

function caml_sys_get_argv() {
  var g = joo_global_object;
  var main = "a.out";
  var args = [];
  if (g.process && g.process.argv && g.process.argv.length > 1) {
    var argv = g.process.argv;
    main = argv[1];
    args = raw_array_sub(argv, 2, argv.length - 2);
  }
  var p = caml_js_to_string(main);
  var args2 = [0,p];
  for (var i = 0; i < args.length; i++) args2.push(
    caml_js_to_string(args[i])
  );
  return [0,p,args2];
}

function caml_js_to_bool(x) {return + x;}

function caml_sys_file_exists(name) {
  var root = resolve_fs_device(name);
  return root.device.exists(root.rest);
}

var caml_ephe_key_offset = 3;

function caml_weak_get(x, i) {
  if (i < 0 || caml_ephe_key_offset + i >= x.length) {caml_invalid_argument("Weak.get_key");}
  return x[caml_ephe_key_offset + i] === undefined ?
    0 :
    x[caml_ephe_key_offset + i];
}

function caml_weak_get_copy(x, i) {
  if (i < 0 || caml_ephe_key_offset + i >= x.length) {caml_invalid_argument("Weak.get_copy");}
  var y = caml_weak_get(x, i);
  if (y === 0) {return y;}
  var z = y[1];
  if (z instanceof Array) {return [0,caml_obj_dup(z)];}
  return y;
}

var caml_ephe_get_key_copy = caml_weak_get_copy;

function caml_convert_raw_backtrace_slot() {
  caml_failwith("caml_convert_raw_backtrace_slot");
}

function caml_raw_backtrace_next_slot() {return 0;}

function caml_array_sub(a, i, len) {
  var a2 = new Array(len + 1);
  a2[0] = 0;
  for (var i2 = 1, i1 = i + 1; i2 <= len; i2++,i1++) {a2[i2] = a[i1];}
  return a2;
}

function caml_lessthan(x, y) {return + (caml_compare_val(x, y, false) < 0);}

function caml_bytes_equal(s1, s2) {
  if (s1 === s2) {return 1;}
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c == s2.c ? 1 : 0;
}

var caml_ba_views;

function caml_ba_init_views() {
  if (! caml_ba_views) {
    var g = joo_global_object;
    caml_ba_views =
      [
        [
          g.Float32Array,
          g.Float64Array,
          g.Int8Array,
          g.Uint8Array,
          g.Int16Array,
          g.Uint16Array,
          g.Int32Array,
          g.Int32Array,
          g.Int32Array,
          g.Int32Array,
          g.Float32Array,
          g.Float64Array,
          g.Uint8Array
        ],
        [0,0,0,0,0,0,0,1,0,0,2,2,0]
      ];
  }
}

function caml_sys_const_ostype_cygwin() {return 0;}

function caml_register_global(n, v, name_opt) {
  if (name_opt && joo_global_object.toplevelReloc) {n = joo_global_object.toplevelReloc(name_opt);
  }
  caml_global_data[n + 1] = v;
  if (name_opt) {caml_global_data[name_opt] = v;}
}

function caml_cosh_float(x) {return (Math.exp(x) + Math.exp(- x)) / 2;}

function caml_weak_check(x, i) {
  if (
    x[caml_ephe_key_offset + i] !== undefined &&
      x[caml_ephe_key_offset + i] !== 0
  ) return 1;
  else return 0;
}

var caml_ephe_check_key = caml_weak_check;

function caml_hash_mix_final(h) {
  h ^= h >>> 16;
  h = caml_mul(h, 2246822507 | 0);
  h ^= h >>> 13;
  h = caml_mul(h, 3266489909 | 0);
  h ^= h >>> 16;
  return h;
}

function caml_ba_uint8_set64(ba, i0, v) {
  ba.set1(i0, v[1] & 255);
  ba.set1(i0 + 1, v[1] >> 8 & 255);
  ba.set1(i0 + 2, v[1] >> 16);
  ba.set1(i0 + 3, v[2] & 255);
  ba.set1(i0 + 4, v[2] >> 8 & 255);
  ba.set1(i0 + 5, v[2] >> 16);
  ba.set1(i0 + 6, v[3] & 255);
  ba.set1(i0 + 7, v[3] >> 8);
  return 0;
}

function caml_lex_run_mem(s, i, mem, curr_pos) {
  for (; ; ) {
    var dst = s.charCodeAt(i);
    i++;
    if (dst == 255) {return;}
    var src = s.charCodeAt(i);
    i++;
    if (src == 255) mem[dst + 1] = curr_pos;
    else mem[dst + 1] = mem[src + 1];
  }
}

function caml_lex_run_tag(s, i, mem) {
  for (; ; ) {
    var dst = s.charCodeAt(i);
    i++;
    if (dst == 255) {return;}
    var src = s.charCodeAt(i);
    i++;
    if (src == 255) mem[dst + 1] = - 1;
    else mem[dst + 1] = mem[src + 1];
  }
}

function caml_new_lex_engine(tbl, start_state, lexbuf) {
  var lex_buffer = 2;
  var lex_buffer_len = 3;
  var lex_start_pos = 5;
  var lex_curr_pos = 6;
  var lex_last_pos = 7;
  var lex_last_action = 8;
  var lex_eof_reached = 9;
  var lex_mem = 10;
  var lex_base = 1;
  var lex_backtrk = 2;
  var lex_default = 3;
  var lex_trans = 4;
  var lex_check = 5;
  var lex_base_code = 6;
  var lex_backtrk_code = 7;
  var lex_default_code = 8;
  var lex_trans_code = 9;
  var lex_check_code = 10;
  var lex_code = 11;
  if (! tbl.lex_default) {
    tbl.lex_base = caml_lex_array(tbl[lex_base]);
    tbl.lex_backtrk = caml_lex_array(tbl[lex_backtrk]);
    tbl.lex_check = caml_lex_array(tbl[lex_check]);
    tbl.lex_trans = caml_lex_array(tbl[lex_trans]);
    tbl.lex_default = caml_lex_array(tbl[lex_default]);
  }
  if (! tbl.lex_default_code) {
    tbl.lex_base_code = caml_lex_array(tbl[lex_base_code]);
    tbl.lex_backtrk_code = caml_lex_array(tbl[lex_backtrk_code]);
    tbl.lex_check_code = caml_lex_array(tbl[lex_check_code]);
    tbl.lex_trans_code = caml_lex_array(tbl[lex_trans_code]);
    tbl.lex_default_code = caml_lex_array(tbl[lex_default_code]);
  }
  if (tbl.lex_code == null) {
    tbl.lex_code = caml_jsbytes_of_string(tbl[lex_code]);
  }
  var c, state = start_state;
  var buffer = caml_array_of_string(lexbuf[lex_buffer]);
  if (state >= 0) {
    lexbuf[lex_last_pos] = lexbuf[lex_start_pos] = lexbuf[lex_curr_pos];
    lexbuf[lex_last_action] = - 1;
  }
  else {state = - state - 1;}
  for (; ; ) {
    var base = tbl.lex_base[state];
    if (base < 0) {
      var pc_off = tbl.lex_base_code[state];
      caml_lex_run_tag(tbl.lex_code, pc_off, lexbuf[lex_mem]);
      return - base - 1;
    }
    var backtrk = tbl.lex_backtrk[state];
    if (backtrk >= 0) {
      var pc_off = tbl.lex_backtrk_code[state];
      caml_lex_run_tag(tbl.lex_code, pc_off, lexbuf[lex_mem]);
      lexbuf[lex_last_pos] = lexbuf[lex_curr_pos];
      lexbuf[lex_last_action] = backtrk;
    }
    if (lexbuf[lex_curr_pos] >= lexbuf[lex_buffer_len]) {
      if (lexbuf[lex_eof_reached] == 0) return - state - 1;
      else c = 256;
    }
    else {c = buffer[lexbuf[lex_curr_pos]];lexbuf[lex_curr_pos]++;}
    var pstate = state;
    if (tbl.lex_check[base + c] == state) state = tbl.lex_trans[base + c];
    else state = tbl.lex_default[state];
    if (state < 0) {
      lexbuf[lex_curr_pos] = lexbuf[lex_last_pos];
      if (lexbuf[lex_last_action] == - 1) caml_failwith("lexing: empty token");
      else return lexbuf[lex_last_action];
    }
    else {
      var base_code = tbl.lex_base_code[pstate], pc_off;
      if (tbl.lex_check_code[base_code + c] == pstate) pc_off = tbl.lex_trans_code[base_code + c];
      else pc_off = tbl.lex_default_code[pstate];
      if (pc_off > 0) {
        caml_lex_run_mem(
          tbl.lex_code,
          pc_off,
          lexbuf[lex_mem],
          lexbuf[lex_curr_pos]
        );
      }
      if (c == 256) {lexbuf[lex_eof_reached] = 0;}
    }
  }
}

function caml_int64_bits_of_float(x) {
  if (! isFinite(x)) {
    if (isNaN(x)) {return [255,1,0,32752];}
    return x > 0 ? [255,0,0,32752] : [255,0,0,65520];
  }
  var sign = x == 0 && 1 / x == - Infinity ? 32768 : x >= 0 ? 0 : 32768;
  if (sign) {x = - x;}
  var exp = jsoo_floor_log2(x) + 1023;
  if (exp <= 0) {
    exp = 0;
    x /= Math.pow(2, - 1026);
  }
  else {
    x /= Math.pow(2, exp - 1027);
    if (x < 16) {x *= 2;exp -= 1;}
    if (exp == 0) {x /= 2;}
  }
  var k = Math.pow(2, 24);
  var r3 = x | 0;
  x = (x - r3) * k;
  var r2 = x | 0;
  x = (x - r2) * k;
  var r1 = x | 0;
  r3 = r3 & 15 | sign | exp << 4;
  return [255,r1,r2,r3];
}

var caml_output_val = function() {
  function Writer() {this.chunk = [];}
  Writer.prototype =
    {
      chunk_idx: 20,
      block_len: 0,
      obj_counter: 0,
      size_32: 0,
      size_64: 0,
      write: function(size, value) {
        for (var i = size - 8; i >= 0; i -= 8) this.chunk[this.chunk_idx++] = value >> i & 255;
      },
      write_code: function(size, code, value) {
        this.chunk[this.chunk_idx++] = code;
        for (var i = size - 8; i >= 0; i -= 8) this.chunk[this.chunk_idx++] = value >> i & 255;
      },
      finalize: function() {
        this.block_len = this.chunk_idx - 20;
        this.chunk_idx = 0;
        this.write(32, 2224400062);
        this.write(32, this.block_len);
        this.write(32, this.obj_counter);
        this.write(32, this.size_32);
        this.write(32, this.size_64);
        return this.chunk;
      }
    };
  return function(v) {
    var writer = new Writer();
    var stack = [];
    function extern_rec(v) {
      if (v instanceof Array && v[0] === (v[0] | 0)) {
        if (v[0] == 255) {
          writer.write(8, 18);
          for (var i = 0; i < 3; i++) writer.write(8, "_j\0".charCodeAt(i));
          var b = caml_int64_to_bytes(v);
          for (var i = 0; i < 8; i++) writer.write(8, b[i]);
          writer.size_32 += 4;
          writer.size_64 += 3;
          return;
        }
        if (v[0] == 251) {
          caml_failwith("output_value: abstract value (Abstract)");
        }
        if (v[0] < 16 && v.length - 1 < 8) writer.write(
          8,
          128 + v[0] + (v.length - 1 << 4)
        );
        else writer.write_code(32, 8, v.length - 1 << 10 | v[0]);
        writer.size_32 += v.length;
        writer.size_64 += v.length;
        if (v.length > 1) {stack.push(v, 1);}
      }
      else if (v instanceof MlBytes) {
        var len = caml_ml_string_length(v);
        if (len < 32) writer.write(
          8,
          32 + len
        );
        else if (len < 256) writer.write_code(
          8,
          9,
          len
        );
        else writer.write_code(32, 10, len);
        for (var i = 0; i < len; i++) writer.write(
          8,
          caml_string_unsafe_get(v, i)
        );
        writer.size_32 += 1 + ((len + 4) / 4 | 0);
        writer.size_64 += 1 + ((len + 8) / 8 | 0);
      }
      else {
        if (v != (v | 0)) {
          var type_of_v = typeof v;
          caml_failwith("output_value: abstract value (" + type_of_v + ")");
        }
        else if (v >= 0 && v < 64) {
          writer.write(8, 64 + v);
        }
        else {
          if (v >= - (1 << 7) && v < 1 << 7) writer.write_code(8, 0, v);
          else if (v >= - (1 << 15) && v < 1 << 15) writer.write_code(16, 1, v);
          else writer.write_code(32, 2, v);
        }
      }
    }
    extern_rec(v);
    while(stack.length > 0) {
      var i = stack.pop();
      var v = stack.pop();
      if (i + 1 < v.length) {stack.push(v, i + 1);}
      extern_rec(v[i]);
    }
    writer.finalize();
    return writer.chunk;
  };
}();

function caml_js_from_float(x) {return x;}

function caml_floatarray_create(len) {
  var len = len + 1 | 0;
  var b = new Array(len);
  b[0] = 254;
  for (var i = 1; i < len; i++) b[i] = 0;
  return b;
}

function caml_gc_stat() {return [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];}

function caml_lessequal(x, y) {return + (caml_compare_val(x, y, false) <= 0);}

function caml_ml_seek_out_64(chanid, pos) {
  caml_ml_channels[chanid].offset = caml_int64_to_float(pos);
  return 0;
}

function caml_gc_set(_control) {return 0;}

function caml_js_get(o, f) {return o[f];}

var caml_method_cache = [];

function caml_get_public_method(obj, tag, cacheid) {
  var meths = obj[1];
  var ofs = caml_method_cache[cacheid];
  if (ofs === null) {
    for (var i = caml_method_cache.length; i < cacheid; i++) caml_method_cache[i] = 0;
  }
  else if (meths[ofs] === tag) {return meths[ofs - 1];}
  var li = 3, hi = meths[1] * 2 + 1, mi;
  while(li < hi) {
    mi = li + hi >> 1 | 1;
    if (tag < meths[mi + 1]) hi = mi - 2;
    else li = mi;
  }
  caml_method_cache[cacheid] = li + 1;
  return tag == meths[li + 1] ? meths[li] : 0;
}

function caml_js_get_console() {
  var c = joo_global_object.console ? joo_global_object.console : {};
  var m = [
    "log",
    "debug",
    "info",
    "warn",
    "error",
    "assert",
    "dir",
    "dirxml",
    "trace",
    "group",
    "groupCollapsed",
    "groupEnd",
    "time",
    "timeEnd"
  ];
  function f() {}
  for (var i = 0; i < m.length; i++) if (! c[m[i]]) {c[m[i]] = f;}
  return c;
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

function caml_gc_compaction() {return 0;}

function caml_ojs_new_arr(c, a) {
  switch (a.length) {
    case 0:
      return new c();
    case 1:
      return new c(a[0]);
    case 2:
      return new c(a[0], a[1]);
    case 3:
      return new c(a[0], a[1], a[2]);
    case 4:
      return new c(a[0], a[1], a[2], a[3]);
    case 5:
      return new c(a[0], a[1], a[2], a[3], a[4]);
    case 6:
      return new c(a[0], a[1], a[2], a[3], a[4], a[5]);
    case 7:
      return new c(a[0], a[1], a[2], a[3], a[4], a[5], a[6])
    }
  function F() {return c.apply(this, a);}
  F.prototype = c.prototype;
  return new F();
}

var caml_ephe_get_key = caml_weak_get;
var caml_js_regexps = {amp: /&/g,lt: /</g,quot: /\"/g,all: /[&<\"]/};

function caml_js_html_escape(s) {
  if (! caml_js_regexps.all.test(s)) {return s;}
  return s.replace(caml_js_regexps.amp, "&amp;").replace(caml_js_regexps.lt, "&lt;"
  ).replace(caml_js_regexps.quot, "&quot;"
  );
}

function caml_ml_close_channel(chanid) {
  var chan = caml_ml_channels[chanid];
  caml_ml_flush(chanid);
  chan.opened = false;
  chan.file.close();
  caml_sys_close(chan.fd);
  return 0;
}

function win_cleanup() {}

function caml_sys_isatty(_chan) {return 0;}

function caml_ba_dim_2(ba) {return ba.nth_dim(1);}

function caml_js_wrap_meth_callback_arguments(f) {
  return function() {return caml_call_gen(f, [this,arguments]);};
}

function unix_inet_addr_of_string() {return 0;}

function caml_sinh_float(x) {return (Math.exp(x) - Math.exp(- x)) / 2;}

function caml_js_set(o, f, v) {o[f] = v;return 0;}

function caml_ldexp_float(x, exp) {
  exp |= 0;
  if (exp > 1023) {
    exp -= 1023;
    x *= Math.pow(2, 1023);
    if (exp > 1023) {exp -= 1023;x *= Math.pow(2, 1023);}
  }
  if (exp < - 1023) {exp += 1023;x *= Math.pow(2, - 1023);}
  x *= Math.pow(2, exp);
  return x;
}

function caml_js_wrap_callback_strict(arity, f) {
  return function() {
    var n = arguments.length;
    if (n == arity) {return caml_call_gen(f, arguments);}
    var args = new Array(arity);
    for (var i = 0; i < n && i < arity; i++) args[i] = arguments[i];
    return caml_call_gen(f, args);
  };
}

function caml_array_get(array, index) {
  if (index < 0 || index >= array.length - 1) {caml_array_bound_error();}
  return array[index + 1];
}

function caml_get_current_callstack() {return [0];}

function caml_int64_mod(x, y) {
  if (caml_int64_is_zero(y)) {caml_raise_zero_divide();}
  var sign = x[3];
  if (x[3] & 32768) {x = caml_int64_neg(x);}
  if (y[3] & 32768) {y = caml_int64_neg(y);}
  var r = caml_int64_udivmod(x, y)[2];
  if (sign & 32768) {r = caml_int64_neg(r);}
  return r;
}

function caml_create_file_extern(name, content) {
  if (joo_global_object.caml_create_file) joo_global_object.caml_create_file(
    name,
    content
  );
  else {
    if (! joo_global_object.caml_fs_tmp) {joo_global_object.caml_fs_tmp = [];}
    joo_global_object.caml_fs_tmp.push({name: name,content: content});
  }
  return 0;
}

function caml_obj_set_tag(x, tag) {x[0] = tag;return 0;}

function caml_int32_bswap(x) {
  return (x & 255) << 24 |
    (x & 65280) << 8 |
    (x & 16711680) >>> 8 |
    (x & 4278190080) >>> 24;
}

function caml_spacetime_only_works_for_native_code() {
  caml_failwith("Spacetime profiling only works for native code");
}

function win_startup() {}

function caml_ml_seek_in_64(chanid, pos) {
  var chan = caml_ml_channels[chanid];
  if (chan.refill != null) {caml_raise_sys_error("Illegal seek");}
  chan.offset = caml_int64_to_float(pos);
  return 0;
}

function caml_ba_set_3(ba, i0, i1, i2, v) {return ba.set([i0,i1,i2], v);}

function caml_js_instanceof(o, c) {return o instanceof c;}

function caml_hash_mix_float(h, v0) {
  var v = caml_int64_bits_of_float(v0);
  var lo = v[1] | v[2] << 24;
  var hi = v[2] >>> 8 | v[3] << 16;
  h = caml_hash_mix_int(h, lo);
  h = caml_hash_mix_int(h, hi);
  return h;
}

function caml_notequal(x, y) {return + (caml_compare_val(x, y, false) != 0);}

function caml_int64_shift_left(x, s) {
  s = s & 63;
  if (s == 0) {return x;}
  if (s < 24) {
    return [
      255,
      x[1] << s & 16777215,
      (x[2] << s | x[1] >> 24 - s) & 16777215,
      (x[3] << s | x[2] >> 24 - s) & 65535
    ];
  }
  if (s < 48) {
    return [
      255,
      0,
      x[1] << s - 24 & 16777215,
      (x[2] << s - 24 | x[1] >> 48 - s) & 65535
    ];
  }
  return [255,0,0,x[1] << s - 48 & 65535];
}

function caml_js_wrap_meth_callback(f) {
  return function() {
    return caml_call_gen(f, raw_array_cons(arguments, this));
  };
}

function caml_sys_const_int_size() {return 32;}

function caml_register_global_module(n, v, name) {return caml_register_global(n, v, name);
}

var caml_blit_bigstring_to_string = bigstring_blit_bigstring_bytes_stub;

function caml_is_js() {return 1;}

function caml_string_set64(s, i, i64) {return caml_bytes_set64(s, i, i64);}

function caml_ba_dim_1(ba) {return ba.nth_dim(0);}

function caml_js_meth_call(o, f, args) {
  return o[f.toString()].apply(o, caml_js_from_array(args));
}

function caml_ba_map_file(vfd, kind, layout, shared, dims, pos) {caml_failwith("caml_ba_map_file not implemented");
}

function caml_ba_map_file_bytecode(argv, argn) {
  return caml_ba_map_file(argv[0], argv[1], argv[2], argv[3], argv[4], argv[5]
  );
}

function unix_localtime(t) {
  var d = new Date(t * 1e3);
  var januaryfirst = new Date(d.getFullYear(), 0, 1);
  var doy = Math.floor((d.getTime() - januaryfirst.getTime()) / 864e5);
  var jan = new Date(d.getFullYear(), 0, 1);
  var jul = new Date(d.getFullYear(), 6, 1);
  var stdTimezoneOffset = Math.max(
    jan.getTimezoneOffset(),
    jul.getTimezoneOffset()
  );
  return [
    0,
    d.getSeconds(),
    d.getMinutes(),
    d.getHours(),
    d.getDate(),
    d.getMonth(),
    d.getFullYear() - 1900,
    d.getDay(),
    doy,
    d.getTimezoneOffset() < stdTimezoneOffset | 0
  ];
}

function caml_weak_create(n) {
  if (n < 0) {caml_invalid_argument("Weak.create");}
  var x = [251,"caml_ephe_list_head"];
  x.length = caml_ephe_key_offset + n;
  return x;
}

var caml_ephe_create = caml_weak_create;

function caml_js_to_byte_string(s) {return caml_new_string(s);}

function caml_tanh_float(x) {
  var y = Math.exp(x), z = Math.exp(- x);
  return (y - z) / (y + z);
}

var JSON = joo_global_object.JSON;

if (typeof JSON !== "object") {JSON = {};}

(function() {
   "use strict";
   var rx_one = /^[\],:{}\s]*$/,
     rx_two = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
     rx_three = 
       /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
     rx_four = /(?:^|:|,)(?:\s*\[)+/g,
     rx_escapable = 
       /[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
     rx_dangerous = 
       /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
   function f(n) {return n < 10 ? "0" + n : n;}
   function this_value() {return this.valueOf();}
   if (typeof Date.prototype.toJSON !== "function") {
     Date.prototype.toJSON =
       function() {
         return isFinite(this.valueOf()) ?
           this.getUTCFullYear() + "-" +
            f(this.getUTCMonth() + 1) + "-" +
            f(this.getUTCDate()) + "T" +
            f(this.getUTCHours()) + ":" +
            f(this.getUTCMinutes()) + ":" +
            f(this.getUTCSeconds()) + "Z" :
           null;
       };
     Boolean.prototype.toJSON = this_value;
     Number.prototype.toJSON = this_value;
     String.prototype.toJSON = this_value;
   }
   var gap, indent, meta, rep;
   function quote(string) {
     rx_escapable.lastIndex = 0;
     return rx_escapable.test(string) ?
       '"' +
        string.replace(
          rx_escapable,
          function(a) {
            var c = meta[a];
            return typeof c === "string" ?
              c :
              "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(- 4);
          }
        ) + '"' :
       '"' + string + '"';
   }
   function str(key, holder) {
     var i, k, v, length, mind = gap, partial, value = holder[key];
     if (
     value && typeof value === "object" &&
       typeof value.toJSON === "function"
     ) {value = value.toJSON(key);}
     if (typeof rep === "function") {value = rep.call(holder, key, value);}
     switch (typeof value) {
       case "string":
         return quote(value);
       case "number":
         return isFinite(value) ? String(value) : "null";
       case "boolean":
       case "null":
         return String(value);
       case "object":
         if (! value) {return "null";}
         gap += indent;
         partial = [];
         if (Object.prototype.toString.apply(value) === "[object Array]") {
           length = value.length;
           for (i = 0; i < length; i += 1) {
             partial[i] = str(i, value) || "null";
           }
           v =
             partial.length === 0 ?
               "[]" :
               gap ?
                "[\n" + gap +
                 partial.join(",\n" + gap) + "\n" + mind + "]" :
                "[" + partial.join(",") + "]";
           gap = mind;
           return v;
         }
         if (rep && typeof rep === "object") {
           length = rep.length;
           for (i = 0; i < length; i += 1) {
             if (typeof rep[i] === "string") {
               k = rep[i];
               v = str(k, value);
               if (v) {partial.push(quote(k) + (gap ? ": " : ":") + v);}
             }
           }
         }
         else {
           for (k in value) {
             if (Object.prototype.hasOwnProperty.call(value, k)) {
               v = str(k, value);
               if (v) {partial.push(quote(k) + (gap ? ": " : ":") + v);}
             }
           }
         }
         v =
           partial.length === 0 ?
             "{}" :
             gap ?
              "{\n" + gap +
               partial.join(",\n" + gap) + "\n" + mind + "}" :
              "{" + partial.join(",") + "}";
         gap = mind;
         return v
       }
   }
   if (typeof JSON.stringify !== "function") {
     meta =
       {
         "\b": "\\b",
         "\t": "\\t",
         "\n": "\\n",
         "\f": "\\f",
         "\r": "\\r",
         '"': '\\"',
         "\\": "\\\\"
       };
     JSON.stringify =
       function(value, replacer, space) {
         var i;
         gap = "";
         indent = "";
         if (typeof space === "number") {
           for (i = 0; i < space; i += 1) {indent += " ";}
         }
         else if (typeof space === "string") {indent = space;}
         rep = replacer;
         if (
         replacer && typeof replacer !== "function" &&
           (typeof replacer !== "object" ||
              typeof replacer.length !== "number")
         ) {throw new Error("JSON.stringify");}
         return str("", {"": value});
       };
   }
   if (typeof JSON.parse !== "function") {
     JSON.parse =
       function(text, reviver) {
         var j;
         function walk(holder, key) {
           var k, v, value = holder[key];
           if (value && typeof value === "object") {
             for (k in value) {
               if (Object.prototype.hasOwnProperty.call(value, k)) {
                 v = walk(value, k);
                 if (v !== undefined) {value[k] = v;}
                 else {delete value[k];}
               }
             }
           }
           return reviver.call(holder, key, value);
         }
         text = String(text);
         rx_dangerous.lastIndex = 0;
         if (rx_dangerous.test(text)) {
           text =
             text.replace(
               rx_dangerous,
               function(a) {
                 return "\\u" +
                   ("0000" + a.charCodeAt(0).toString(16)).slice(- 4);
               }
             );
         }
         if (
         rx_one.test(
           text.replace(rx_two, "@").replace(rx_three, "]").replace(rx_four, ""
           )
         )
         ) {
           j = eval("(" + text + ")");
           return typeof reviver === "function" ? walk({"": j}, "") : j;
         }
         throw new SyntaxError("JSON.parse");
       };
   }
 }());

function caml_json() {return JSON;}

function caml_trampoline(res) {
  var c = 1;
  while(res && res.joo_tramp) {
    res = res.joo_tramp.apply(null, res.joo_args);
    c++;
  }
  return res;
}

function unix_mktime(tm) {
  var d = new Date(tm[6] + 1900, tm[5], tm[4], tm[3], tm[2], tm[1]);
  var t = Math.floor(d.getTime() / 1e3);
  var tm2 = unix_localtime(t);
  return [0,t,tm2];
}

function caml_bytes_get64(s, i) {
  if (i >>> 0 >= s.l + 7) {caml_string_bound_error();}
  var a = new Array(8);
  for (var j = 0; j < 8; j++) {a[7 - j] = caml_string_unsafe_get(s, i + j);}
  return caml_int64_of_bytes(a);
}

function caml_weak_set(x, i, v) {
  if (i < 0 || caml_ephe_key_offset + i >= x.length) {caml_invalid_argument("Weak.set");}
  x[caml_ephe_key_offset + i] = v;
  return 0;
}

function caml_sys_remove(name) {
  var root = resolve_fs_device(name);
  var ok = root.device.unlink(root.rest);
  if (ok == 0) {caml_raise_no_such_file(name);}
  return 0;
}

function caml_unmount(name) {
  var path = caml_make_path(name);
  var name = path.join("/") + "/";
  var idx = - 1;
  for (var i = 0; i < jsoo_mount_point.length; i++) if (jsoo_mount_point[i].path == name) {idx = i;}
  if (idx > - 1) {jsoo_mount_point.splice(idx, 1);}
  return 0;
}

function caml_string_get32(s, i) {
  if (i >>> 0 >= s.l + 3) {caml_string_bound_error();}
  var b1 = caml_string_unsafe_get(s, i),
    b2 = caml_string_unsafe_get(s, i + 1),
    b3 = caml_string_unsafe_get(s, i + 2),
    b4 = caml_string_unsafe_get(s, i + 3);
  return b4 << 24 | b3 << 16 | b2 << 8 | b1;
}

function caml_hypot_float(x, y) {
  var x = Math.abs(x), y = Math.abs(y);
  var a = Math.max(x, y), b = Math.min(x, y) / (a ? a : 1);
  return a * Math.sqrt(1 + b * b);
}

function caml_int32_float_of_bits(x) {
  var int32a = new (joo_global_object.Int32Array)(1);
  int32a[0] = x;
  var float32a = new (joo_global_object.Float32Array)(int32a.buffer);
  return float32a[0];
}

function caml_ml_pos_in_64(chanid) {
  return caml_int64_of_float(caml_ml_channels[chanid].offset);
}

function caml_js_call(f, o, args) {
  return f.apply(o, caml_js_from_array(args));
}

function caml_js_property_get(o, s) {
  js_print_stderr(
    "caml_js_property_get: This should never happen - all accesses should have been optimized by now."
  );
  return o[s];
}

function caml_register_channel_for_spacetime(_channel) {return 0;}

function caml_string_set(s, i, c) {
  if (i >>> 0 >= s.l) {caml_string_bound_error();}
  return caml_string_unsafe_set(s, i, c);
}

function caml_sys_const_max_wosize() {return 2147483647 / 4 | 0;}

function caml_ephe_unset_key(x, i) {return caml_weak_set(x, i, 0);}

function caml_ml_pos_out(chanid) {return caml_ml_channels[chanid].offset;}

function caml_spacetime_enabled(_unit) {return 0;}

function caml_string_equal(s1, s2) {
  if (s1 === s2) {return 1;}
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c == s2.c ? 1 : 0;
}

function caml_bytes_notequal(s1, s2) {return 1 - caml_string_equal(s1, s2);}

function caml_js_object(a) {
  var o = {};
  for (var i = 1; i < a.length; i++) {var p = a[i];o[p[1].toString()] = p[2];}
  return o;
}

function caml_runtime_parameters(_unit) {return caml_new_string("");}

function caml_ba_create(kind, layout, dims_ml) {
  caml_ba_init_views();
  var dims = caml_js_from_array(dims_ml);
  var size = caml_ba_get_size(dims);
  var view = caml_ba_views[0][kind];
  if (! view) {caml_invalid_argument("Bigarray.create: unsupported kind");}
  var data = new view(size);
  var data_type = caml_ba_views[1][kind];
  var data2 = null;
  if (data_type != 0) {data2 = new view(size);}
  return caml_ba_create_from(data, data2, data_type, kind, layout, dims);
}

function caml_array_blit(a1, i1, a2, i2, len) {
  if (i2 <= i1) {
    for (var j = 1; j <= len; j++) a2[i2 + j] = a1[i1 + j];
  }
  else {for (var j = len; j >= 1; j--) a2[i2 + j] = a1[i1 + j];}
  ;
  return 0;
}

function caml_weak_blit(a1, i1, a2, i2, len) {
  caml_array_blit(
    a1,
    caml_ephe_key_offset + i1 - 1,
    a2,
    caml_ephe_key_offset + i2 - 1,
    len
  );
  return 0;
}

function caml_bytes_lessthan(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c < s2.c ? 1 : 0;
}

function caml_gc_quick_stat() {return [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];}

function caml_ml_input_int(chanid) {
  var chan = caml_ml_channels[chanid];
  var file = chan.file;
  while(chan.offset + 3 >= file.length()) {
    var l = caml_ml_refill_input(chan);
    if (l == 0) {caml_raise_end_of_file();}
  }
  var o = chan.offset;
  var r = file.read_one(o) << 24 |
    file.read_one(o + 1) << 16 |
    file.read_one(o + 2) << 8 |
    file.read_one(o + 3);
  chan.offset += 4;
  return r;
}

function caml_bswap16(x) {return (x & 255) << 8 | (x & 65280) >> 8;}

function caml_ml_set_binary_mode(chanid, mode) {
  var chan = caml_ml_channels[chanid];
  var data = caml_global_data.fds[chan.fd];
  data.flags.text = ! mode;
  data.flags.binary = mode;
  return 0;
}

function caml_final_register() {return 0;}

function caml_sys_getcwd() {return caml_new_string(caml_current_dir);}

function caml_float_of_string(s) {
  var res;
  s = caml_jsbytes_of_string(s);
  res = + s;
  if (s.length > 0 && res === res) {return res;}
  s = s.replace(/_/g, "");
  res = + s;
  if (s.length > 0 && res === res || /^[+-]?nan$/i.test(s)) {return res;}
  var m = /^ *([+-]?)0x([0-9a-f]+)\.?([0-9a-f]*)p([+-]?[0-9]+)/i.exec(s);
  if (m) {
    var m3 = m[3].replace(/0+$/, "");
    var mantissa = parseInt(m[1] + m[2] + m3, 16);
    var exponent = (m[4] | 0) - 4 * m3.length;
    res = mantissa * Math.pow(2, exponent);
    return res;
  }
  if (/^\+?inf(inity)?$/i.test(s)) {return Infinity;}
  if (/^-inf(inity)?$/i.test(s)) {return - Infinity;}
  caml_failwith("float_of_string");
}

function caml_string_get16(s, i) {
  if (i >>> 0 >= s.l + 1) {caml_string_bound_error();}
  var b1 = caml_string_unsafe_get(s, i),
    b2 = caml_string_unsafe_get(s, i + 1);
  return b2 << 8 | b1;
}

function caml_sys_const_big_endian() {return 0;}

function caml_ephe_unset_data(x, data) {
  x[caml_ephe_data_offset] = undefined;
  return 0;
}

function caml_output_value_to_string(v, _fl) {
  return caml_string_of_array(caml_output_val(v));
}

function caml_output_value(chanid, v, _flags) {
  var s = caml_output_value_to_string(v);
  caml_ml_output(chanid, s, 0, caml_ml_string_length(s));
  return 0;
}

function caml_js_dict_get(o, f) {
  js_print_stderr(
    "caml_js_dict_get: This should never happen - all accesses should have been optimized by now."
  );
  return o[f];
}

function caml_sys_system_command(cmd) {
  var cmd = cmd.toString();
  joo_global_object.console.log(cmd);
  if (
    typeof require !=
      "undefined" && require("child_process") &&
      require("child_process").execSync
  ) {
    try {require("child_process").execSync(cmd);return 0;}catch(e) {return 1;}
  }
  else return 127;
}

function caml_ba_get_3(ba, i0, i1, i2) {return ba.get([i0,i1,i2]);}

var caml_ephe_blit_key = caml_weak_blit;

function caml_js_error_of_exception(exn) {
  if (exn.stack_trace) {return exn.stack_trace;}
  return null;
}

function caml_check_bound(array, index) {
  if (index >>> 0 >= array.length - 1) {caml_array_bound_error();}
  return array;
}

function caml_bytes_of_string(s) {return s;}

function caml_hash_mix_int64(h, v) {
  var lo = v[1] | v[2] << 24;
  var hi = v[2] >>> 8 | v[3] << 16;
  h = caml_hash_mix_int(h, lo);
  h = caml_hash_mix_int(h, hi);
  return h;
}

function caml_hash_mix_string(h, v) {
  switch (v.t & 6) {
    default:
      caml_convert_string_to_bytes(v);
    case 0:
      h = caml_hash_mix_string_str(h, v.c);
      break;
    case 2:
      h = caml_hash_mix_string_arr(h, v.c)
    }
  return h;
}

var HASH_QUEUE_SIZE = 256;

function caml_hash(count, limit, seed, obj) {
  var queue, rd, wr, sz, num, h, v, i, len;
  sz = limit;
  if (sz < 0 || sz > HASH_QUEUE_SIZE) {sz = HASH_QUEUE_SIZE;}
  num = count;
  h = seed;
  queue = [obj];
  rd = 0;
  wr = 1;
  while(rd < wr && num > 0) {
    v = queue[rd++];
    if (v instanceof Array && v[0] === (v[0] | 0)) {
      switch (v[0]) {
        case 248:
          h = caml_hash_mix_int(h, v[2]);
          num--;
          break;
        case 250:
          queue[--rd] = v[1];
          break;
        case 255:
          h = caml_hash_mix_int64(h, v);
          num--;
          break;
        default:
          var tag = v.length - 1 << 10 | v[0];
          h = caml_hash_mix_int(h, tag);
          for (i = 1,len = v.length; i < len; i++) {
            if (wr >= sz) {break;}
            queue[wr++] = v[i];
          }
          break
        }
    }
    else if (v instanceof MlBytes) {
      h = caml_hash_mix_string(h, v);
      num--;
    }
    else if (v === (v | 0)) {
      h = caml_hash_mix_int(h, v + v + 1);
      num--;
    }
    else if (v === + v) {
      h = caml_hash_mix_float(h, v);
      num--;
    }
    else if (v && v.hash && typeof v.hash === "function") {h = caml_hash_mix_int(h, v.hash());}
  }
  h = caml_hash_mix_final(h);
  return h & 1073741823;
}

function bigstring_memcmp_stub(v_s1, v_s1_pos, v_s2, v_s2_pos, v_len) {
  for (var i = 0; i < v_len; i++) {
    var a = caml_ba_get_1(v_s1, v_s1_pos + i);
    var b = caml_ba_get_1(v_s2, v_s2_pos + i);
    if (a < b) {return - 1;}
    if (a > b) {return 1;}
  }
  return 0;
}

function caml_obj_tag(x) {
  return x instanceof Array ? x[0] : x instanceof MlBytes ? 252 : 1e3;
}

function caml_js_export_var() {
  if (typeof module !== "undefined" && module && module.exports) return module.exports;
  else return joo_global_object;
}

function caml_js_meth_call0(o, f) {return o[f.toString()]();}

function caml_frexp_float(x) {
  if (x == 0 || ! isFinite(x)) {return [0,x,0];}
  var neg = x < 0;
  if (neg) {x = - x;}
  var exp = jsoo_floor_log2(x) + 1;
  x *= Math.pow(2, - exp);
  if (x < 0.5) {x *= 2;exp -= 1;}
  if (neg) {x = - x;}
  return [0,x,exp];
}

function caml_bytes_get32(s, i) {
  if (i >>> 0 >= s.l + 3) {caml_string_bound_error();}
  var b1 = caml_string_unsafe_get(s, i),
    b2 = caml_string_unsafe_get(s, i + 1),
    b3 = caml_string_unsafe_get(s, i + 2),
    b4 = caml_string_unsafe_get(s, i + 3);
  return b4 << 24 | b3 << 16 | b2 << 8 | b1;
}

function bigstring_blit_bytes_bigstring_stub(v_str, v_src_pos, v_bstr, v_dst_pos, v_len) {
  for (var i = 0; i < v_len; i++) caml_ba_set_1(
    v_bstr,
    v_dst_pos + i,
    caml_bytes_get(v_str, v_src_pos + i)
  );
  return 0;
}

function caml_copysign_float(x, y) {
  if (y == 0) {y = 1 / y;}
  x = Math.abs(x);
  return y < 0 ? - x : x;
}

function caml_ba_set_generic(ba, index, v) {
  return ba.set(caml_js_from_array(index), v);
}

function caml_ephe_set_key(x, i, v) {return caml_weak_set(x, i, [0,v]);}

function caml_ml_pos_out_64(chanid) {
  return caml_int64_of_float(caml_ml_channels[chanid].offset);
}

function caml_string_get64(s, i) {
  if (i >>> 0 >= s.l + 7) {caml_string_bound_error();}
  var a = new Array(8);
  for (var j = 0; j < 8; j++) {a[7 - j] = caml_string_unsafe_get(s, i + j);}
  return caml_int64_of_bytes(a);
}

function caml_string_lessequal(s1, s2) {
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c <= s2.c ? 1 : 0;
}

function caml_string_greaterequal(s1, s2) {return caml_string_lessequal(s2, s1);
}

function caml_ml_pos_in(chanid) {return caml_ml_channels[chanid].offset;}

function caml_int64_and(x, y) {
  return [255,x[1] & y[1],x[2] & y[2],x[3] & y[3]];
}

function caml_sys_const_word_size() {return 32;}

function caml_set_static_env(k, v) {
  if (! joo_global_object.jsoo_static_env) {
    joo_global_object.jsoo_static_env = {};
  }
  joo_global_object.jsoo_static_env[k] = v;
  return 0;
}

function caml_ba_change_layout(ba, layout) {
  if (ba.layout == layout) {return ba;}
  var dims = [];
  for (var i = 0; i < ba.num_dims; i++) dims[i] = ba.nth_dim(i);
  return caml_ba_create_from(
    ba.data,
    ba.data2,
    ba.data_type,
    ba.kind,
    layout,
    dims
  );
}

function caml_wrap_thrown_exception_traceless(exn, force) {return exn;}

function caml_input_value_from_bytes(s, ofs) {
  var reader = new MlBytesReader(s, typeof ofs == "number" ? ofs : ofs[0]);
  return caml_input_value_from_reader(reader, ofs);
}

function caml_js_new(c, a) {
  switch (a.length) {
    case 1:
      return new c();
    case 2:
      return new c(a[1]);
    case 3:
      return new c(a[1], a[2]);
    case 4:
      return new c(a[1], a[2], a[3]);
    case 5:
      return new c(a[1], a[2], a[3], a[4]);
    case 6:
      return new c(a[1], a[2], a[3], a[4], a[5]);
    case 7:
      return new c(a[1], a[2], a[3], a[4], a[5], a[6]);
    case 8:
      return new c(a[1], a[2], a[3], a[4], a[5], a[6], a[7])
    }
  function F() {return c.apply(this, caml_js_from_array(a));}
  F.prototype = c.prototype;
  return new F();
}

function caml_js_meth_call1(o, f, a) {return o[f.toString()].call(o, a);}

function caml_format_int(fmt, i) {
  if (caml_jsbytes_of_string(fmt) == "%d") {return caml_new_string("" + i);}
  var f = caml_parse_format(fmt);
  if (i < 0) {if (f.signedconv) {f.sign = - 1;i = - i;}else i >>>= 0;}
  var s = i.toString(f.base);
  if (f.prec >= 0) {
    f.filler = " ";
    var n = f.prec - s.length;
    if (n > 0) {s = caml_str_repeat(n, "0") + s;}
  }
  return caml_finish_formatting(f, s);
}

function bigstring_alloc(_, size) {return caml_ba_create(12, 0, [0,size]);}

function caml_js_from_string(s) {return s.toString();}

function caml_obj_truncate(x, s) {
  if (s <= 0 || s + 1 > x.length) {caml_invalid_argument("Obj.truncate");}
  if (x.length != s + 1) {x.length = s + 1;}
  return 0;
}

function caml_ba_sub(ba, ofs, len) {return ba.sub(ofs, len);}

function caml_gc_full_major() {return 0;}

function caml_int64_is_minus_one(x) {
  return x[3] == 65535 && (x[1] & x[2]) == 16777215;
}

function caml_bytes_set32(s, i, i32) {
  if (i >>> 0 >= s.l + 3) {caml_string_bound_error();}
  var b4 = 255 & i32 >> 24,
    b3 = 255 & i32 >> 16,
    b2 = 255 & i32 >> 8,
    b1 = 255 & i32;
  caml_string_unsafe_set(s, i + 0, b1);
  caml_string_unsafe_set(s, i + 1, b2);
  caml_string_unsafe_set(s, i + 2, b3);
  caml_string_unsafe_set(s, i + 3, b4);
  return 0;
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

function caml_runtime_variant(_unit) {return caml_new_string("");}

function caml_array_concat(l) {
  var a = [0];
  while(l !== 0) {
    var b = l[1];
    for (var i = 1; i < b.length; i++) a.push(b[i]);
    l = l[2];
  }
  return a;
}

function caml_ba_uint8_set32(ba, i0, v) {
  ba.set1(i0, v & 255);
  ba.set1(i0 + 1, v >>> 8 & 255);
  ba.set1(i0 + 2, v >>> 16 & 255);
  ba.set1(i0 + 3, v >>> 24 & 255);
  return 0;
}

function caml_sys_const_ostype_unix() {return 1;}

function caml_ephe_set_data(x, data) {
  x[caml_ephe_data_offset] = data;
  return 0;
}

function caml_make_float_vect(len) {
  var len = len + 1 | 0;
  var b = new Array(len);
  b[0] = 254;
  for (var i = 1; i < len; i++) b[i] = 0;
  return b;
}

function caml_ml_seek_out(chanid, pos) {
  caml_ml_channels[chanid].offset = pos;
  return 0;
}

function caml_greaterequal(x, y) {
  return + (caml_compare_val(x, y, false) >= 0);
}

function caml_js_raw_expr(s) {
  js_print_stderr(
    "caml_js_raw_expr: This should never happen - all raw code must be directly supplied to caml_js_raw_expr."
  );
  return eval(s.toString());
}

function caml_js_typeof(o) {return typeof o;}

function caml_restore_raw_backtrace(exn, bt) {return 0;}

function caml_js_wrap_meth_callback_unsafe(f) {
  return function() {f.apply(null, raw_array_cons(arguments, this));};
}

function caml_ba_dim_3(ba) {return ba.nth_dim(2);}

function caml_get_exception_raw_backtrace() {return [0];}

function caml_ephe_check_data(x) {
  if (x[caml_ephe_data_offset] === undefined) return 0;
  else return 1;
}

function caml_log1p_float(x) {
  var y = 1 + x, z = y - 1;
  return z == 0 ? x : x * Math.log(y) / z;
}

function caml_bytes_get16(s, i) {
  if (i >>> 0 >= s.l + 1) {caml_string_bound_error();}
  var b1 = caml_string_unsafe_get(s, i),
    b2 = caml_string_unsafe_get(s, i + 1);
  return b2 << 8 | b1;
}

function caml_int64_or(x, y) {
  return [255,x[1] | y[1],x[2] | y[2],x[3] | y[3]];
}

function caml_js_from_bool(x) {return ! ! x;}

function caml_ml_set_channel_name() {return 0;}

function caml_js_meth_call3(o, f, a, b, c) {return o[f.toString()].call(o, a, b, c);
}

function caml_lazy_make_forward(v) {return [250,v];}

function caml_create_string(len) {
  if (len < 0) {caml_invalid_argument("String.create");}
  return new MlBytes(len ? 2 : 9, "", len);
}

function caml_js_on_ie() {
  var ua = joo_global_object.navigator ?
    joo_global_object.navigator.userAgent :
    "";
  return ua.indexOf("MSIE") != - 1 && ua.indexOf("Opera") != 0;
}

function caml_ba_layout(ba) {return ba.layout;}

var caml_md5_string = function() {
  function add(x, y) {return x + y | 0;}
  function xx(q, a, b, x, s, t) {
    a = add(add(a, q), add(x, t));
    return add(a << s | a >>> 32 - s, b);
  }
  function ff(a, b, c, d, x, s, t) {
    return xx(b & c | ~ b & d, a, b, x, s, t);
  }
  function gg(a, b, c, d, x, s, t) {
    return xx(b & d | c & ~ d, a, b, x, s, t);
  }
  function hh(a, b, c, d, x, s, t) {return xx(b ^ c ^ d, a, b, x, s, t);}
  function ii(a, b, c, d, x, s, t) {return xx(c ^ (b | ~ d), a, b, x, s, t);}
  function md5(buffer, length) {
    var i = length;
    buffer[i >> 2] |= 128 << 8 * (i & 3);
    for (i = (i & ~ 3) + 8; (i & 63) < 60; i += 4) buffer[(i >> 2) - 1] = 0;
    buffer[(i >> 2) - 1] = length << 3;
    buffer[i >> 2] = length >> 29 & 536870911;
    var w = [1732584193,4023233417,2562383102,271733878];
    for (i = 0; i < buffer.length; i += 16) {
      var a = w[0], b = w[1], c = w[2], d = w[3];
      a = ff(a, b, c, d, buffer[i + 0], 7, 3614090360);
      d = ff(d, a, b, c, buffer[i + 1], 12, 3905402710);
      c = ff(c, d, a, b, buffer[i + 2], 17, 606105819);
      b = ff(b, c, d, a, buffer[i + 3], 22, 3250441966);
      a = ff(a, b, c, d, buffer[i + 4], 7, 4118548399);
      d = ff(d, a, b, c, buffer[i + 5], 12, 1200080426);
      c = ff(c, d, a, b, buffer[i + 6], 17, 2821735955);
      b = ff(b, c, d, a, buffer[i + 7], 22, 4249261313);
      a = ff(a, b, c, d, buffer[i + 8], 7, 1770035416);
      d = ff(d, a, b, c, buffer[i + 9], 12, 2336552879);
      c = ff(c, d, a, b, buffer[i + 10], 17, 4294925233);
      b = ff(b, c, d, a, buffer[i + 11], 22, 2304563134);
      a = ff(a, b, c, d, buffer[i + 12], 7, 1804603682);
      d = ff(d, a, b, c, buffer[i + 13], 12, 4254626195);
      c = ff(c, d, a, b, buffer[i + 14], 17, 2792965006);
      b = ff(b, c, d, a, buffer[i + 15], 22, 1236535329);
      a = gg(a, b, c, d, buffer[i + 1], 5, 4129170786);
      d = gg(d, a, b, c, buffer[i + 6], 9, 3225465664);
      c = gg(c, d, a, b, buffer[i + 11], 14, 643717713);
      b = gg(b, c, d, a, buffer[i + 0], 20, 3921069994);
      a = gg(a, b, c, d, buffer[i + 5], 5, 3593408605);
      d = gg(d, a, b, c, buffer[i + 10], 9, 38016083);
      c = gg(c, d, a, b, buffer[i + 15], 14, 3634488961);
      b = gg(b, c, d, a, buffer[i + 4], 20, 3889429448);
      a = gg(a, b, c, d, buffer[i + 9], 5, 568446438);
      d = gg(d, a, b, c, buffer[i + 14], 9, 3275163606);
      c = gg(c, d, a, b, buffer[i + 3], 14, 4107603335);
      b = gg(b, c, d, a, buffer[i + 8], 20, 1163531501);
      a = gg(a, b, c, d, buffer[i + 13], 5, 2850285829);
      d = gg(d, a, b, c, buffer[i + 2], 9, 4243563512);
      c = gg(c, d, a, b, buffer[i + 7], 14, 1735328473);
      b = gg(b, c, d, a, buffer[i + 12], 20, 2368359562);
      a = hh(a, b, c, d, buffer[i + 5], 4, 4294588738);
      d = hh(d, a, b, c, buffer[i + 8], 11, 2272392833);
      c = hh(c, d, a, b, buffer[i + 11], 16, 1839030562);
      b = hh(b, c, d, a, buffer[i + 14], 23, 4259657740);
      a = hh(a, b, c, d, buffer[i + 1], 4, 2763975236);
      d = hh(d, a, b, c, buffer[i + 4], 11, 1272893353);
      c = hh(c, d, a, b, buffer[i + 7], 16, 4139469664);
      b = hh(b, c, d, a, buffer[i + 10], 23, 3200236656);
      a = hh(a, b, c, d, buffer[i + 13], 4, 681279174);
      d = hh(d, a, b, c, buffer[i + 0], 11, 3936430074);
      c = hh(c, d, a, b, buffer[i + 3], 16, 3572445317);
      b = hh(b, c, d, a, buffer[i + 6], 23, 76029189);
      a = hh(a, b, c, d, buffer[i + 9], 4, 3654602809);
      d = hh(d, a, b, c, buffer[i + 12], 11, 3873151461);
      c = hh(c, d, a, b, buffer[i + 15], 16, 530742520);
      b = hh(b, c, d, a, buffer[i + 2], 23, 3299628645);
      a = ii(a, b, c, d, buffer[i + 0], 6, 4096336452);
      d = ii(d, a, b, c, buffer[i + 7], 10, 1126891415);
      c = ii(c, d, a, b, buffer[i + 14], 15, 2878612391);
      b = ii(b, c, d, a, buffer[i + 5], 21, 4237533241);
      a = ii(a, b, c, d, buffer[i + 12], 6, 1700485571);
      d = ii(d, a, b, c, buffer[i + 3], 10, 2399980690);
      c = ii(c, d, a, b, buffer[i + 10], 15, 4293915773);
      b = ii(b, c, d, a, buffer[i + 1], 21, 2240044497);
      a = ii(a, b, c, d, buffer[i + 8], 6, 1873313359);
      d = ii(d, a, b, c, buffer[i + 15], 10, 4264355552);
      c = ii(c, d, a, b, buffer[i + 6], 15, 2734768916);
      b = ii(b, c, d, a, buffer[i + 13], 21, 1309151649);
      a = ii(a, b, c, d, buffer[i + 4], 6, 4149444226);
      d = ii(d, a, b, c, buffer[i + 11], 10, 3174756917);
      c = ii(c, d, a, b, buffer[i + 2], 15, 718787259);
      b = ii(b, c, d, a, buffer[i + 9], 21, 3951481745);
      w[0] = add(a, w[0]);
      w[1] = add(b, w[1]);
      w[2] = add(c, w[2]);
      w[3] = add(d, w[3]);
    }
    var t = new Array(16);
    for (var i = 0; i < 4; i++) for (var j = 0; j < 4; j++
    ) t[i * 4 + j] = w[i] >> 8 * j & 255;
    return t;
  }
  return function(s, ofs, len) {
    var buf = [];
    switch (s.t & 6) {
      default:
        caml_convert_string_to_bytes(s);
      case 0:
        var b = s.c;
        for (var i = 0; i < len; i += 4) {
          var j = i + ofs;
          buf[i >> 2] =
            b.charCodeAt(j) |
              b.charCodeAt(j + 1) << 8 |
              b.charCodeAt(j + 2) << 16 |
              b.charCodeAt(j + 3) << 24;
        }
        for (; i < len; i++) buf[i >> 2] |=
          b.charCodeAt(i + ofs) << 8 * (i & 3);
        break;
      case 4:
        var a = s.c;
        for (var i = 0; i < len; i += 4) {
          var j = i + ofs;
          buf[i >> 2] =
            a[j] |
              a[j + 1] << 8 |
              a[j + 2] << 16 |
              a[j + 3] << 24;
        }
        for (; i < len; i++) buf[i >> 2] |= a[i + ofs] << 8 * (i & 3)
      }
    return caml_string_of_array(md5(buf, len));
  };
}();

function caml_md5_chan(chanid, len) {
  var chan = caml_ml_channels[chanid];
  var chan_len = chan.file.length();
  if (len < 0) {len = chan_len - chan.offset;}
  if (chan.offset + len > chan_len) {caml_raise_end_of_file();}
  var buf = caml_create_bytes(len);
  chan.file.read(chan.offset, buf, 0, len);
  return caml_md5_string(buf, 0, len);
}

function caml_int64_shift_right(x, s) {
  s = s & 63;
  if (s == 0) {return x;}
  var h = x[3] << 16 >> 16;
  if (s < 24) {
    return [
      255,
      (x[1] >> s | x[2] << 24 - s) & 16777215,
      (x[2] >> s | h << 24 - s) & 16777215,
      x[3] << 16 >> s >>> 16
    ];
  }
  var sign = x[3] << 16 >> 31;
  if (s < 48) {
    return [
      255,
      (x[2] >> s - 24 | x[3] << 48 - s) & 16777215,
      x[3] << 16 >> s - 24 >> 16 & 16777215,
      sign & 65535
    ];
  }
  return [255,x[3] << 16 >> s - 32 & 16777215,sign & 16777215,sign & 65535];
}

function caml_convert_raw_backtrace() {return [0];}

function caml_array_set(array, index, newval) {
  if (index < 0 || index >= array.length - 1) {caml_array_bound_error();}
  array[index + 1] = newval;
  return 0;
}

function caml_bytes_greaterequal(s1, s2) {return caml_bytes_lessequal(s2, s1);
}

function caml_update_dummy(x, y) {
  if (typeof y === "function") {x.fun = y;return 0;}
  if (y.fun) {x.fun = y.fun;return 0;}
  var i = y.length;
  while(i--) x[i] = y[i];
  return 0;
}

function caml_CamlinternalMod_update_mod(shape, real, x) {
  if (typeof shape === "number") switch (shape) {
    case 0:
      real.fun = x;
      break;
    case 1:
    default:
      caml_update_dummy(real, x)
    }
  else switch (shape[0]) {
    case 0:
      for (var i = 1; i < shape[1].length; i++) caml_CamlinternalMod_update_mod(
        shape[1][i],
        real[i],
        x[i]
      );
      break;
    default:
    }
  ;
  return 0;
}

function caml_ephe_get_data(x) {
  if (x[caml_ephe_data_offset] === undefined) return 0;
  else return [0,x[caml_ephe_data_offset]];
}

function caml_trampoline_return(f, args) {return {joo_tramp: f,joo_args: args};
}

function caml_wrap_thrown_exception_reraise(exn) {
  if (! exn.stack_trace || exn[0] == 248) {
    return caml_wrap_thrown_exception(exn);
  }
  return exn;
}

function caml_js_fun_call4(f, a, b, c, d) {return f(a, b, c, d);}

function caml_ml_output_int(chanid, i) {
  var arr = [i >> 24 & 255,i >> 16 & 255,i >> 8 & 255,i & 255];
  var s = caml_string_of_array(arr);
  caml_ml_output(chanid, s, 0, 4);
  return 0;
}

var caml_initial_time = new Date().getTime() * 0.001;

function caml_sys_time() {
  return new Date().getTime() * 0.001 - caml_initial_time;
}

function caml_ml_channel_size(chanid) {
  var chan = caml_ml_channels[chanid];
  return chan.file.length();
}

function caml_array_append(a1, a2) {
  var l1 = a1.length, l2 = a2.length;
  var l = l1 + l2 - 1;
  var a = new Array(l);
  a[0] = 0;
  var i = 1, j = 1;
  for (; i < l1; i++) a[i] = a1[i];
  for (; i < l; i++,j++) a[i] = a2[j];
  return a;
}

function caml_raw_backtrace_slot() {
  caml_invalid_argument("Printexc.get_raw_backtrace_slot: index out of bounds"
  );
}

function caml_string_of_bytes(s) {return s;}

function caml_ml_set_channel_refill(chanid, f) {
  caml_ml_channels[chanid].refill = f;
  return 0;
}

function caml_alloc_dummy_function(size, arity) {
  function f() {return f.fun.apply(this, arguments);}
  ;
  f.length = arity;
  return f;
}

function caml_int64_is_min_int(x) {
  return x[3] == 32768 && (x[1] | x[2]) == 0;
}

function caml_hexstring_of_float(x, prec, style) {
  if (! isFinite(x)) {
    if (isNaN(x)) {return caml_js_to_string("nan");}
    return caml_js_to_string(x > 0 ? "infinity" : "-infinity");
  }
  var sign = x == 0 && 1 / x == - Infinity ? 1 : x >= 0 ? 0 : 1;
  if (sign) {x = - x;}
  var exp = 0;
  if (x == 0) {}
  else if (x < 1) {
    while(x < 1 && exp > - 1022) {x *= 2;exp--;}
  }
  else {while(x >= 2) {x /= 2;exp++;}}
  var exp_sign = exp < 0 ? "" : "+";
  var sign_str = "";
  if (sign) sign_str =
    "-";
  else {
    switch (style) {
      case 43:
        sign_str = "+";
        break;
      case 32:
        sign_str = " ";
        break;
      default:break
      }
  }
  if (prec >= 0 && prec < 13) {
    var cst = Math.pow(2, prec * 4);
    x = Math.round(x * cst) / cst;
  }
  var x_str = x.toString(16);
  if (prec >= 0) {
    var idx = x_str.indexOf(".");
    if (idx < 0) {
      x_str += "." + caml_str_repeat(prec, "0");
    }
    else {
      var size = idx + 1 + prec;
      if (x_str.length < size) x_str +=
        caml_str_repeat(size - x_str.length, "0");
      else x_str = x_str.substr(0, size);
    }
  }
  return caml_js_to_string(
    sign_str + "0x" + x_str + "p" + exp_sign + exp.toString(10)
  );
}

function caml_js_expr(s) {
  js_print_stderr("caml_js_expr: fallback to runtime evaluation");
  return eval(s.toString());
}

function caml_js_wrap_meth_callback_strict(arity, f) {
  return function() {
    var n = arguments.length;
    if (n == arity) {
      return caml_call_gen(f, raw_array_cons(arguments, this));
    }
    var args = new Array(arity + 1);
    args[0] = this;
    for (var i = 1; i < n && i <= arity; i++) args[i] = arguments[i];
    return caml_call_gen(f, args);
  };
}

function caml_ml_runtime_warnings_enabled(_unit) {return caml_runtime_warnings;
}

function caml_backtrace_status() {return 0;}

function caml_install_signal_handler() {return 0;}

function caml_ba_fill(ba, init) {ba.fill(init);return 0;}

function caml_gc_get() {return [0,0,0,0,0,0,0,0,0];}

function caml_output_value_to_bytes(v, _fl) {
  return caml_string_of_array(caml_output_val(v));
}

function caml_modf_float(x) {
  if (isFinite(x)) {
    var neg = 1 / x < 0;
    x = Math.abs(x);
    var i = Math.floor(x);
    var f = x - i;
    if (neg) {i = - i;f = - f;}
    return [0,f,i];
  }
  if (isNaN(x)) {return [0,NaN,NaN];}
  return [0,1 / x,x];
}

function caml_hash_univ_param(count, limit, obj) {
  var hash_accu = 0;
  function hash_aux(obj) {
    limit--;
    if (count < 0 || limit < 0) {return;}
    if (obj instanceof Array && obj[0] === (obj[0] | 0)) {
      switch (obj[0]) {
        case 248:
          count--;
          hash_accu = hash_accu * 65599 + obj[2] | 0;
          break;
        case 250:
          limit++;
          hash_aux(obj);
          break;
        case 255:
          count--;
          hash_accu = hash_accu * 65599 + obj[1] + (obj[2] << 24) | 0;
          break;
        default:
          count--;
          hash_accu = hash_accu * 19 + obj[0] | 0;
          for (var i = obj.length - 1; i > 0; i--) hash_aux(obj[i])
        }
    }
    else if (obj instanceof MlBytes) {
      count--;
      switch (obj.t & 6) {
        default:
          caml_convert_string_to_bytes(obj);
        case 0:
          for (var b = obj.c, l = obj.l, i = 0; i < l; i++) hash_accu = hash_accu * 19 + b.charCodeAt(i) | 0;
          break;
        case 2:
          for (var a = obj.c, l = obj.l, i = 0; i < l; i++) hash_accu = hash_accu * 19 + a[i] | 0
        }
    }
    else if (obj === (obj | 0)) {
      count--;
      hash_accu = hash_accu * 65599 + obj | 0;
    }
    else if (obj === + obj) {
      count--;
      var p = caml_int64_to_bytes(caml_int64_bits_of_float(obj));
      for (var i = 7; i >= 0; i--) hash_accu = hash_accu * 19 + p[i] | 0;
    }
    else if (obj && obj.hash && typeof obj.hash === "function") {hash_accu = hash_accu * 65599 + obj.hash() | 0;}
  }
  hash_aux(obj);
  return hash_accu & 1073741823;
}

function caml_float_compare(x, y) {
  if (x === y) {return 0;}
  if (x < y) {return - 1;}
  if (x > y) {return 1;}
  if (x === x) {return 1;}
  if (y === y) {return - 1;}
  return 0;
}

function caml_string_set32(s, i, i32) {return caml_bytes_set32(s, i, i32);}

function caml_js_fun_call1(f, a) {return f(a);}

function caml_register_global_module_metadata(n, v, name) {return caml_register_global(n, v, name);
}

function caml_parse_engine(tables, env, cmd, arg) {
  var ERRCODE = 256;
  var loop = 6;
  var testshift = 7;
  var shift = 8;
  var shift_recover = 9;
  var reduce = 10;
  var READ_TOKEN = 0;
  var RAISE_PARSE_ERROR = 1;
  var GROW_STACKS_1 = 2;
  var GROW_STACKS_2 = 3;
  var COMPUTE_SEMANTIC_ACTION = 4;
  var CALL_ERROR_FUNCTION = 5;
  var env_s_stack = 1;
  var env_v_stack = 2;
  var env_symb_start_stack = 3;
  var env_symb_end_stack = 4;
  var env_stacksize = 5;
  var env_stackbase = 6;
  var env_curr_char = 7;
  var env_lval = 8;
  var env_symb_start = 9;
  var env_symb_end = 10;
  var env_asp = 11;
  var env_rule_len = 12;
  var env_rule_number = 13;
  var env_sp = 14;
  var env_state = 15;
  var env_errflag = 16;
  var tbl_transl_const = 2;
  var tbl_transl_block = 3;
  var tbl_lhs = 4;
  var tbl_len = 5;
  var tbl_defred = 6;
  var tbl_dgoto = 7;
  var tbl_sindex = 8;
  var tbl_rindex = 9;
  var tbl_gindex = 10;
  var tbl_tablesize = 11;
  var tbl_table = 12;
  var tbl_check = 13;
  if (! tables.dgoto) {
    tables.defred = caml_lex_array(tables[tbl_defred]);
    tables.sindex = caml_lex_array(tables[tbl_sindex]);
    tables.check = caml_lex_array(tables[tbl_check]);
    tables.rindex = caml_lex_array(tables[tbl_rindex]);
    tables.table = caml_lex_array(tables[tbl_table]);
    tables.len = caml_lex_array(tables[tbl_len]);
    tables.lhs = caml_lex_array(tables[tbl_lhs]);
    tables.gindex = caml_lex_array(tables[tbl_gindex]);
    tables.dgoto = caml_lex_array(tables[tbl_dgoto]);
  }
  var res = 0, n, n1, n2, state1;
  var sp = env[env_sp];
  var state = env[env_state];
  var errflag = env[env_errflag];
  exit:
  for (; ; ) {
    switch (cmd) {
      case 0:
        state = 0;
        errflag = 0;
      case 6:
        n = tables.defred[state];
        if (n != 0) {cmd = reduce;break;}
        if (env[env_curr_char] >= 0) {cmd = testshift;break;}
        res = READ_TOKEN;
        break exit;
      case 1:
        if (arg instanceof Array) {
          env[env_curr_char] = tables[tbl_transl_block][arg[0] + 1];
          env[env_lval] = arg[1];
        }
        else {
          env[env_curr_char] = tables[tbl_transl_const][arg + 1];
          env[env_lval] = 0;
        }
      case 7:
        n1 = tables.sindex[state];
        n2 = n1 + env[env_curr_char];
        if (
        n1 != 0 &&
          n2 >= 0 &&
          n2 <= tables[tbl_tablesize] &&
          tables.check[n2] ==
            env[env_curr_char]
        ) {cmd = shift;break;}
        n1 = tables.rindex[state];
        n2 = n1 + env[env_curr_char];
        if (
        n1 != 0 &&
          n2 >= 0 &&
          n2 <= tables[tbl_tablesize] &&
          tables.check[n2] ==
            env[env_curr_char]
        ) {n = tables.table[n2];cmd = reduce;break;}
        if (errflag <= 0) {res = CALL_ERROR_FUNCTION;break exit;}
      case 5:
        if (errflag < 3) {
          errflag = 3;
          for (; ; ) {
            state1 = env[env_s_stack][sp + 1];
            n1 = tables.sindex[state1];
            n2 = n1 + ERRCODE;
            if (
              n1 != 0 &&
                n2 >= 0 &&
                n2 <= tables[tbl_tablesize] &&
                tables.check[n2] == ERRCODE
            ) {cmd = shift_recover;break;}
            else {
              if (sp <= env[env_stackbase]) {return RAISE_PARSE_ERROR;}
              sp--;
            }
          }
        }
        else {
          if (env[env_curr_char] == 0) {return RAISE_PARSE_ERROR;}
          env[env_curr_char] = - 1;
          cmd = loop;
          break;
        }
      case 8:
        env[env_curr_char] = - 1;
        if (errflag > 0) {errflag--;}
      case 9:
        state = tables.table[n2];
        sp++;
        if (sp >= env[env_stacksize]) {res = GROW_STACKS_1;break exit;}
      case 2:
        env[env_s_stack][sp + 1] = state;
        env[env_v_stack][sp + 1] = env[env_lval];
        env[env_symb_start_stack][sp + 1] = env[env_symb_start];
        env[env_symb_end_stack][sp + 1] = env[env_symb_end];
        cmd = loop;
        break;
      case 10:
        var m = tables.len[n];
        env[env_asp] = sp;
        env[env_rule_number] = n;
        env[env_rule_len] = m;
        sp = sp - m + 1;
        m = tables.lhs[n];
        state1 = env[env_s_stack][sp];
        n1 = tables.gindex[m];
        n2 = n1 + state1;
        if (
          n1 != 0 &&
            n2 >= 0 &&
            n2 <= tables[tbl_tablesize] &&
            tables.check[n2] == state1
        ) state = tables.table[n2];
        else state = tables.dgoto[m];
        if (sp >= env[env_stacksize]) {res = GROW_STACKS_2;break exit;}
      case 3:
        res = COMPUTE_SEMANTIC_ACTION;
        break exit;
      case 4:
        env[env_s_stack][sp + 1] = state;
        env[env_v_stack][sp + 1] = arg;
        var asp = env[env_asp];
        env[env_symb_end_stack][sp + 1] = env[env_symb_end_stack][asp + 1];
        if (sp > asp) {
          env[env_symb_start_stack][sp + 1] =
            env[env_symb_end_stack][asp + 1];
        }
        cmd = loop;
        break;
      default:
        return RAISE_PARSE_ERROR
      }
  }
  env[env_sp] = sp;
  env[env_state] = state;
  env[env_errflag] = errflag;
  return res;
}

function raw_array_copy(a) {
  var l = a.length;
  var b = new Array(l);
  for (var i = 0; i < l; i++) b[i] = a[i];
  return b;
}

function caml_output_value_to_buffer(s, ofs, len, v, _fl) {
  var t = caml_output_val(v);
  if (t.length > len) {caml_failwith("Marshal.to_buffer: buffer overflow");}
  caml_blit_bytes(t, 0, s, ofs, t.length);
  return 0;
}

function caml_pure_js_expr(s) {
  js_print_stderr("caml_pure_js_expr: fallback to runtime evaluation");
  return eval(s.toString());
}

function caml_js_fun_call3(f, a, b, c) {return f(a, b, c);}

function caml_blit_string(s1, i1, s2, i2, len) {return caml_blit_bytes(s1, i1, s2, i2, len);
}

function bigstring_blit_stub(s1, i1, s2, i2, len) {
  for (var i = 0; i < len; i++) caml_ba_set_1(
    s2,
    i2 + i,
    caml_ba_get_1(s1, i1 + i)
  );
  return 0;
}

function caml_string_notequal(s1, s2) {return 1 - caml_string_equal(s1, s2);}

function caml_int64_xor(x, y) {
  return [255,x[1] ^ y[1],x[2] ^ y[2],x[3] ^ y[3]];
}

function caml_bytes_greaterthan(s1, s2) {return caml_bytes_lessthan(s2, s1);}

function caml_read_file_content(name) {
  var root = resolve_fs_device(name);
  if (root.device.exists(root.rest)) {
    var file = root.device.open(root.rest, {rdonly: 1});
    var len = file.length();
    var buf = caml_create_bytes(len);
    file.read(0, buf, 0, len);
    return buf;
  }
  caml_raise_no_such_file(name);
}

function caml_ml_set_channel_output(chanid, f) {
  var chan = caml_ml_channels[chanid];
  caml_global_data.fds[chan.fd].output = f;
  return 0;
}

function caml_js_to_float(x) {return x;}

function caml_register_named_value(nm, v) {
  caml_named_values[caml_jsbytes_of_string(nm)] = v;
  return 0;
}

function caml_js_fun_call2(f, a, b) {return f(a, b);}

function caml_ba_dim(ba, dim) {return ba.nth_dim(dim);}

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

var b_ = caml_new_string("%.12g");
var a_ = caml_new_string(".");
var f_ = caml_new_string("String.contains_from / Bytes.contains_from");
var e_ = caml_new_string("");
var d_ = caml_new_string("String.concat");
var g_ = caml_new_string("Random.int");
var h_ = [
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
var j_ = [0,0,0];
var l_ = caml_new_string("  ");
var m_ = caml_new_string("");
var n_ = caml_new_string("  ");
var o_ = caml_new_string("    ");
var p_ = caml_new_string("      ");
var q_ = caml_new_string("        ");
var r_ = caml_new_string("          ");
var s_ = caml_new_string("            ");
var t_ = caml_new_string("              ");
var u_ = caml_new_string("                ");
var ai_ = caml_new_string('"');
var aj_ = caml_new_string('"');
var af_ = caml_new_string("@max-depth");
var ad_ = caml_new_string("@max-length");
var ab_ = caml_new_string("~unknown");
var Z_ = caml_new_string("~lazy");
var X_ = [0,caml_new_string("[|"),caml_new_string("|]")];
var U_ = caml_new_string(")");
var V_ = caml_new_string("closure(");
var S_ = [0,caml_new_string("{"),caml_new_string("}")];
var J_ = caml_new_string(",\n");
var D_ = caml_new_string("");
var E_ = caml_new_string("]");
var F_ = caml_new_string("\n");
var G_ = caml_new_string(",\n");
var H_ = caml_new_string("\n");
var I_ = caml_new_string("[");
var O_ = caml_new_string(", ");
var K_ = caml_new_string("");
var L_ = caml_new_string("]");
var M_ = caml_new_string(", ");
var N_ = caml_new_string("[");
var z_ = caml_new_string(",\n");
var v_ = caml_new_string("");
var w_ = caml_new_string("\n");
var x_ = caml_new_string(",\n");
var y_ = caml_new_string("\n");
var C_ = caml_new_string(", ");
var A_ = caml_new_string("");
var B_ = caml_new_string(", ");
var k_ = [0,0,0];
var ao_ = caml_new_string("\n");
var an_ = caml_new_string("\n");
var am_ = caml_new_string("\n");
var al_ = caml_new_string("\n");
var ap_ = caml_new_string("Length changing sequences aren't supported yet.");
var aq_ = caml_new_string("Empty list cannot be split at ");
var ar_ = caml_new_string("");
var as_ = caml_new_string("Impossible");
var aJ_ = caml_new_string("");
var au_ = caml_new_string(" ");
var av_ = caml_new_string("IEmpty");
var aw_ = caml_new_string(")");
var ax_ = caml_new_string(" ");
var ay_ = caml_new_string("IOne(");
var az_ = caml_new_string(")");
var aA_ = caml_new_string("\n");
var aB_ = caml_new_string("\n");
var aC_ = caml_new_string(",");
var aD_ = caml_new_string("\n");
var aE_ = caml_new_string("ITwo(");
var aF_ = caml_new_string(")");
var aG_ = caml_new_string(" ");
var aH_ = caml_new_string(",");
var aI_ = caml_new_string("IOrderedMap(");
var aU_ = caml_new_string("");
var aK_ = caml_new_string("}");
var aL_ = caml_new_string("\n");
var aM_ = caml_new_string(" ");
var aN_ = caml_new_string("  subtree: ");
var aO_ = caml_new_string(",\n");
var aR_ = caml_new_string('"');
var aS_ = caml_new_string('"');
var aT_ = caml_new_string("-");
var aP_ = caml_new_string("  state: ");
var aQ_ = caml_new_string("{\n");
var aW_ = caml_new_string("\n");
var aX_ = caml_new_string("\n\n");
var aY_ = caml_new_string("\n");
var aZ_ = caml_new_string("<NotRendered>");
var a0_ = caml_new_string("\n\n");
var aV_ = caml_new_string("\n\n");
var a1_ = caml_new_string("");
var a3_ = caml_new_string("deafult");
var a2_ = [0,caml_new_string("buttonClass")];
var a5_ = caml_new_string("deafult");
var a4_ = [0,caml_new_string("childContainer")];
var a6_ = caml_new_string("size changed times:");
var a7_ = [0,caml_new_string("ButtonInContainerThatCountsSizeChanges")];
var a9_ = caml_new_string("deafult");
var a8_ = [0,caml_new_string("divRenderedByInput")];
var ba_ = caml_new_string("divClicked!");
var a__ = caml_new_string("MyReducer:");
var be_ = caml_new_string("AppInstance");
var bb_ = [0,caml_new_string("initialInputText")];
var bd_ = caml_new_string("haha I am controlling your input");
var bc_ = [0,caml_new_string("divRenderedByAppContainsInput")];
var bh_ = caml_new_string(")");
var bi_ = caml_new_string("->animFiredWithDeepDivState(");
var bj_ = caml_new_string("rafDeepDiv");
var bk_ = [0,caml_new_string("rafSecond")];
var bl_ = [0,caml_new_string("rafFirstDiv")];
var bg_ = caml_new_string("initialAnimationFrameSetup");
var bf_ = [0,caml_new_string("TODO")];
var bm_ = caml_new_string("default");
var bn_ = caml_new_string("HELLO");
var bq_ = [0,caml_new_string("stateless")];
var br_ = caml_new_string(
  "\n\n-------------------\nChild Container \n-------------------"
);
var bY_ = [0,caml_new_string("stateless")];
var b0_ = [0,caml_new_string("Foo")];
var bs_ = caml_new_string(
  "\n\n-------------------\nGets Derived State From Props\n-------------------"
);
var bu_ = [0,caml_new_string("Foo")];
var bv_ = caml_new_string("Init:");
var bx_ = [0,caml_new_string("Foo")];
var by_ = caml_new_string("Update Without Changing Props:");
var bA_ = [0,caml_new_string("Foo")];
var bB_ = caml_new_string("Update With Changing Props:");
var bC_ = caml_new_string(
  "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
);
var bE_ = caml_new_string("Init:");
var bH_ = caml_new_string("Update:");
var bI_ = caml_new_string(
  "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
);
var bJ_ = [0,2,3];
var bK_ = [0,caml_new_string("")];
var bL_ = caml_new_string("Init:");
var bM_ = caml_new_string("Update After raf tick:");
var bN_ = caml_new_string("Update After raf tick:");
var bO_ = caml_new_string(
  "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
);
var bQ_ = caml_new_string("zero");
var bR_ = caml_new_string("hello");
var bS_ = caml_new_string("Init:");
var bU_ = caml_new_string("zero");
var bW_ = caml_new_string("Another Type Init:");
var bo_ = caml_new_string("Total ms (Title): %d ");
var bp_ = caml_new_string("Second Part Of Tuple:");

function invalid_arg(s) {
  throw caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

caml_fresh_oo_id(0);

function symbol(s1, s2) {
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
      if (l <= i__0) {return symbol(s, a_);}
      var match = caml_string_get(s, i__0);
      var switch__0 = 48 <= match ? 58 <= match ? 0 : 1 : 45 === match ? 1 : 0;
      if (switch__0) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      return s;
    }
  }
  return loop(0);
}

function string_of_float(f) {
  return valid_float_lexem(caml_format_float(b_, f));
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
        catch(et_) {
          et_ = caml_wrap_exception(et_);
          if (et_[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(et_);
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

function c_(i, f, param) {
  if (param) {
    var l = param[2];
    var a = param[1];
    var r = call2(f, i, a);
    return [0,r,c_(i + 1 | 0, f, l)];
  }
  return 0;
}

function mapi(f, l) {return c_(0, f, l);}

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
  var em_ = caml_ml_bytes_length(s) + -1 | 0;
  var el_ = 0;
  if (! (em_ < 0)) {
    var i__0 = el_;
    for (; ; ) {
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var eq_ = match + -34 | 0;
        if (58 < eq_ >>> 0) if (93 <= eq_) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (eq_ + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var er_ = 1;var switch__0 = 2;}
      }
      else var switch__0 = 11 <= match ?
        13 === match ? 1 : 0 :
        8 <= match ? 1 : 0;
      switch (switch__0) {case 0:var er_ = 4;break;case 1:var er_ = 2;break}
      n[1] = n[1] + er_ | 0;
      var es_ = i__0 + 1 | 0;
      if (em_ !== i__0) {var i__0 = es_;continue;}
      break;
    }
  }
  if (n[1] === caml_ml_bytes_length(s)) {return copy(s);}
  var s__0 = caml_create_bytes(n[1]);
  n[1] = 0;
  var eo_ = caml_ml_bytes_length(s) + -1 | 0;
  var en_ = 0;
  if (! (eo_ < 0)) {
    var i = en_;
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
      var ep_ = i + 1 | 0;
      if (eo_ !== i) {var i = ep_;continue;}
      break;
    }
  }
  return s__0;
}

function bos(ek_) {return ek_;}

function bts(ej_) {return ej_;}

function ensure_ge(x, y) {return y <= x ? x : invalid_arg(d_);}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var eh_ = param__0[2];
      var ei_ = param__0[1];
      if (eh_) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(ei_) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = eh_;
        continue;
      }
      return caml_ml_string_length(ei_) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var ef_ = param__0[2];
      var eg_ = param__0[1];
      if (ef_) {
        caml_blit_string(eg_, 0, dst, pos__0, caml_ml_string_length(eg_));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(eg_) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(eg_) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = ef_;
        continue;
      }
      caml_blit_string(eg_, 0, dst, pos__0, caml_ml_string_length(eg_));
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
  return e_;
}

function escaped__0(s) {
  function needs_escape(i) {
    var i__0 = i;
    for (; ; ) {
      if (caml_ml_string_length(s) <= i__0) {return 0;}
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var ee_ = match + -34 | 0;
        if (58 < ee_ >>> 0) if (93 <= ee_) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (ee_ + -1 | 0) >>> 0) {
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
      try {index_rec(s, l, i, c);var ec_ = 1;return ec_;}
      catch(ed_) {
        ed_ = caml_wrap_exception(ed_);
        if (ed_ === Not_found) {return 0;}
        throw caml_wrap_thrown_exception_reraise(ed_);
      }
    }
  }
  return invalid_arg(f_);
}

function contains(s, c) {return contains_from(s, 0, c);}

caml_fresh_oo_id(0);

caml_fresh_oo_id(0);

function bits(s) {
  s[2] = (s[2] + 1 | 0) % 55 | 0;
  var d__ = s[2];
  var curval = caml_check_bound(s[1], d__)[d__ + 1];
  var ea_ = (s[2] + 24 | 0) % 55 | 0;
  var newval = caml_check_bound(s[1], ea_)[ea_ + 1] +
    (curval ^ (curval >>> 25 | 0) & 31) | 0;
  var newval30 = newval & 1073741823;
  var eb_ = s[2];
  caml_check_bound(s[1], eb_)[eb_ + 1] = newval30;
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
  return invalid_arg(g_);
}

var default__0 = [0,h_.slice(),0];

function int__1(bound) {return int__0(default__0, bound);}

var i_ = 5;

function detectList(maxLength, o) {
  var maxLength__0 = maxLength;
  var o__0 = o;
  for (; ; ) {
    if (0 === maxLength__0) {return 1;}
    var tag = caml_obj_tag(o__0);
    var match = tag === 1e3 ? 1 : 0;
    if (0 === match) {
      var size = o__0.length - 1;
      var d7_ = tag === 0 ? 1 : 0;
      if (d7_) {
        var d8_ = 2 === size ? 1 : 0;
        if (d8_) {
          var o__1 = o__0[2];
          var maxLength__1 = maxLength__0 + -1 | 0;
          var maxLength__0 = maxLength__1;
          var o__0 = o__1;
          continue;
        }
        var d9_ = d8_;
      }
      else var d9_ = d7_;
      return d9_;
    }
    return caml_equal(o__0, 0);
  }
}

function extractList(maxNum, o) {
  if (0 === maxNum) {return [0,1 - (typeof o === "number"),0];}
  if (typeof o === "number") {return j_;}
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
    k_,
    itms
  );
  var someChildBroke = match[2];
  var allItemsLen = match[1];
  return [0,allItemsLen,someChildBroke];
}

function indentForDepth(n) {
  if (8 < n >>> 0) {return symbol(indentForDepth(n + -1 | 0), l_);}
  switch (n) {
    case 0:
      return m_;
    case 1:
      return n_;
    case 2:
      return o_;
    case 3:
      return p_;
    case 4:
      return q_;
    case 5:
      return r_;
    case 6:
      return s_;
    case 7:
      return t_;
    default:
      return u_
    }
}

function printTreeShape(pair, self, depth, o) {
  var right = pair[2];
  var left = pair[1];
  var match = extractFields(i_, o);
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
        A_ :
        symbol(C_, call1(self[6], self));
      var d6_ = symbol(truncationMsg__0, right);
      return symbol(left, symbol(concat(B_, itms), d6_));
    }
  }
  var truncationMsg = 0 === wasTruncated ?
    v_ :
    symbol(z_, symbol(indentNext, call1(self[6], self)));
  var d5_ = symbol(truncationMsg, symbol(w_, symbol(indent, right)));
  return symbol(
    left,
    symbol(
      y_,
      symbol(indentNext, symbol(concat(symbol(x_, indentNext), itms), d5_))
    )
  );
}

function printListShape(self, depth, o) {
  var match = extractList(i_, o);
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
        K_ :
        symbol(O_, call1(self[6], self));
      var d4_ = symbol(truncationMsg__0, L_);
      return symbol(N_, symbol(concat(M_, itms), d4_));
    }
  }
  var truncationMsg = 0 === wasTruncated ?
    D_ :
    symbol(J_, symbol(indentNext, call1(self[6], self)));
  var d3_ = symbol(truncationMsg, symbol(F_, symbol(indent, E_)));
  return symbol(
    I_,
    symbol(
      H_,
      symbol(indentNext, symbol(concat(symbol(G_, indentNext), itms), d3_))
    )
  );
}

function P_(self, opt, o) {
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
        detectList(i_, o) ?
         call3(self[12], self, [0,depth], o) :
         tag === 0 ?
          call3(self[11], self, [0,depth], o) :
          call2(self[7], self, o);
}

function Q_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printListShape(self, depth, o);
}

function R_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(S_, self, depth, o);
}

function T_(self, f) {return symbol(V_, symbol(string_of_int(f | 0), U_));}

function W_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(X_, self, depth, o);
}

function Y_(self, o) {return Z_;}

function aa_(self, o) {return ab_;}

function ac_(self) {return ad_;}

function ae_(self) {return af_;}

function ag_(self, f) {return string_of_float(f);}

function ah_(self, s) {
  return symbol(aj_, symbol(call2(self[2], self, s), ai_));
}

function ak_(self, s) {return s;}

var base = [
  0,
  function(self, i) {return string_of_int(i);},
  ak_,
  ah_,
  ag_,
  ae_,
  ac_,
  aa_,
  Y_,
  W_,
  T_,
  R_,
  Q_,
  P_
];

function makeStandardChannelsConsole(objectPrinter) {
  function dZ_(a) {
    return native_debug(
      symbol(call3(objectPrinter[13], objectPrinter, 0, a), al_)
    );
  }
  function d0_(a) {
    return native_error(
      symbol(call3(objectPrinter[13], objectPrinter, 0, a), am_)
    );
  }
  function d1_(a) {
    return native_warn(
      symbol(call3(objectPrinter[13], objectPrinter, 0, a), an_)
    );
  }
  function d2_(a) {
    return native_log(call3(objectPrinter[13], objectPrinter, 0, a));
  }
  return [
    0,
    function(a) {
      return native_log(
        symbol(call3(objectPrinter[13], objectPrinter, 0, a), ao_)
      );
    },
    d2_,
    d1_,
    d0_,
    dZ_
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
    throw caml_wrap_thrown_exception([0,Invalid_argument,ap_]);
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
            [0,Invalid_argument,symbol(aq_, string_of_int(splitAt))]
          );
  }
}

function splitList__0(splitAt, lst) {return splitList(0, 0, splitAt, lst);}

function nonReducer(param, dY_) {return ar_;}

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
  var dX_ = inst[5];
  return [
    0,
    inst[1],
    inst[2],
    inst[3],
    inst[4],
    [0,state,dX_[2],dX_[3],dX_[4]],
    inst[6]
  ];
}

function newSelf(replacer, subreplacer) {
  var self = [];
  function dR_(extractor, e, inst) {
    var dV_ = call1(extractor, e);
    var nextState = call2(inst[5][2], inst, dV_);
    var dW_ = inst[4];
    return reconcile(withState(inst, nextState), dW_);
  }
  function dS_(action) {
    return call1(
      replacer,
      function(inst) {
        var nextState = call2(inst[5][2], inst, action);
        var dU_ = inst[4];
        return reconcile(withState(inst, nextState), dU_);
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
            var dT_ = inst[4];
            return reconcile(withState(inst, nextState), dT_);
          }
        );
      },
      dS_,
      dR_
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
      var dQ_ = initSubtree(nextReplacerB, stateRendererB);
      return [1,initSubtree(nextReplacerA, stateRendererA),dQ_];
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
  var dP_ = reconcileSubtree(inst[6], inst[5][4], nextSpec[4]);
  return [0,inst[1],inst[2],inst[3],renderable,nextSpec,dP_];
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
      var dO_ = reconcileSubtree(ib, rbPrev, rb);
      return [1,reconcileSubtree(ia, raPrev, ra),dO_];
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
  var dM_ = 0;
  caml_update_dummy(
    root,
    [
      0,
      function(swapper) {
        var dN_ = root[2];
        if (dN_) {
          var ei = dN_[1];
          var curInst = ei[2];
          var curElems = ei[1];
          var nextEi = [0,curElems,call1(swapper, curInst)];
          root[2] = [0,nextEi];
          return 0;
        }
        throw caml_wrap_thrown_exception([0,Invalid_argument,as_]);
      },
      dM_
    ]
  );
  return root;
}

function render(root, elems) {
  var dL_ = root[2];
  if (dL_) {
    var ei = dL_[1];
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
  else var s = aJ_;
  var dNext = symbol(au_, s);
  if (typeof subtree === "number") return av_;
  else switch (subtree[0]) {
    case 0:
      var n = subtree[1];
      return symbol(ay_, symbol(at_([0,symbol(ax_, s)], n), aw_));
    case 1:
      var n2 = subtree[2];
      var n1 = subtree[1];
      var dH_ = symbol(aA_, symbol(s, az_));
      var dI_ = symbol(
        aC_,
        symbol(
          aB_,
          symbol(dNext, symbol(printInstanceCollection([0,dNext], n2), dH_))
        )
      );
      return symbol(
        aE_,
        symbol(
          aD_,
          symbol(dNext, symbol(printInstanceCollection([0,dNext], n1), dI_))
        )
      );
    default:
      var lst = subtree[1];
      var dJ_ = [0,symbol(aG_, s)];
      return symbol(
        aI_,
        symbol(
          concat(
            aH_,
            map(function(dK_) {return printInstanceCollection(dJ_, dK_);}, lst
            )
          ),
          aF_
        )
      )
    }
}

function at_(opt, n) {
  if (opt) {
    var sth = opt[1];
    var s = sth;
  }
  else var s = aU_;
  var match = n[5];
  var state = match[1];
  var dD_ = symbol(aL_, symbol(s, aK_));
  var dE_ = n[6];
  var dF_ = symbol(
    aO_,
    symbol(
      s,
      symbol(
        aN_,
        symbol(printInstanceCollection([0,symbol(aM_, s)], dE_), dD_)
      )
    )
  );
  var dG_ = typeof state === "number" ?
    string_of_int(state) :
    caml_obj_tag(state) === 252 ?
     symbol(aS_, symbol(escaped__0(state), aR_)) :
     aT_;
  return symbol(aQ_, symbol(s, symbol(aP_, symbol(dG_, dF_))));
}

function printSection(s) {return suppress[1] ? 0 : log(symbol(aV_, s));}

function printRoot(title, root) {
  var dC_ = root[2];
  if (0 === suppress[1]) {
    if (dC_) {
      var match = dC_[1];
      var subtree = match[2];
      log(symbol(aX_, symbol(title, aW_)));
      return log(printInstanceCollection(0, subtree));
    }
    log(title);
    return log(symbol(a0_, symbol(aZ_, aY_)));
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
  else var className = a1_;
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

function render__1(opt, size, children, dx_, self) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = a3_;
  if (dx_) {
    var sth__0 = dx_[1];
    var state = sth__0;
  }
  else var state = txt;
  var dy_ = 0;
  var dz_ = 0;
  return [
    0,
    state,
    element(
      [0,function(dA_, dB_) {return render__0(dz_, a2_, dy_, dA_, dB_);}]
    ),
    nonReducer
  ];
}

function render__2(opt, children, dt_, self) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = a5_;
  if (dt_) {
    var sth__0 = dt_[1];
    var state = sth__0;
  }
  else var state = txt;
  var du_ = 0;
  return [
    0,
    state,
    element(
      [0,function(dv_, dw_) {return render__0(du_, a4_, children, dv_, dw_);}]
    ),
    nonReducer
  ];
}

function render__3(opt, size, children, dh_, self) {
  ;
  if (dh_) {
    var sth = dh_[1];
    var state = sth;
  }
  else var state = [0,size,0];
  var curChangeCount = state[2];
  var curSize = state[1];
  var match = curSize !== size ? 1 : 0;
  var nextChangeCount = 0 === match ? curChangeCount : curChangeCount + 1 | 0;
  function di_(param, ds_) {return state;}
  var dj_ = 0;
  var dk_ = [0,symbol(a6_, string_of_int(nextChangeCount))];
  var dl_ = 0;
  var dm_ = element(
    [0,function(dq_, dr_) {return render__0(dl_, dk_, dj_, dq_, dr_);}]
  );
  var dn_ = 0;
  return [
    0,
    [0,size,nextChangeCount],
    [
      1,
      element(
        [
          0,
          function(do_, dp_) {return render__1(a7_, dn_, children, do_, dp_);}
        ]
      ),
      dm_
    ],
    di_
  ];
}

function render__4(opt, children, da_, self) {
  if (opt) {
    var sth = opt[1];
    var initialText = sth;
  }
  else var initialText = a9_;
  if (da_) {
    var sth__0 = da_[1];
    var state = sth__0;
  }
  else var state = initialText;
  function db_(param, dg_) {return state;}
  var dc_ = 0;
  var dd_ = 0;
  return [
    0,
    state,
    element(
      [0,function(de_, df_) {return render__0(dd_, a8_, dc_, de_, df_);}]
    ),
    db_
  ];
}

function render__5(children, opt, self) {
  if (opt) {
    var sth = opt[1];
    var state = sth;
  }
  else var state = 0;
  function c4_(param, c__) {
    var next = c__[1];
    return caml_int_of_string(next);
  }
  var c5_ = 0;
  var c6_ = [0,symbol(a__, string_of_int(state))];
  var c7_ = [0,function(e) {return print_string(ba_);}];
  return [
    0,
    state,
    [0,function(c8_, c9_) {return render__0(c7_, c6_, c5_, c8_, c9_);}],
    c4_
  ];
}

function render__6(shouldControlInput, children, opt, self) {
  if (opt) {
    var sth = opt[1];
    var state = sth;
  }
  else var state = be_;
  var cU_ = 0;
  var input = element(
    [0,function(c2_, c3_) {return render__4(bb_, cU_, c2_, c3_);}]
  );
  var input__0 = 0 === shouldControlInput ? input : control(input, bd_);
  var cV_ = 0;
  var cW_ = element([0,function(c0_, c1_) {return render__5(cV_, c0_, c1_);}]);
  var cX_ = 0;
  return [
    0,
    state,
    [
      1,
      element(
        [
          0,
          function(cY_, cZ_) {return render__0(cX_, bc_, input__0, cY_, cZ_);}
        ]
      ),
      cW_
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
  function cO_(param, action) {return state;}
  var cP_ = 0;
  var cQ_ = [0,size];
  var cR_ = 0;
  return [
    0,
    state,
    [0,function(cS_, cT_) {return render__0(cR_, cQ_, cP_, cS_, cT_);}],
    cO_
  ];
}

function symbol__0(x, getDefault) {
  if (x) {var x__0 = x[1];return x__0;}
  return call1(getDefault, 0);
}

function onRaf(e) {return bf_;}

function initialStateGetter(self, param) {
  request(call1(self[1], onRaf));
  return bg_;
}

function render__8(opt, param, state, self) {
  ;
  var state__0 = symbol__0(
    state,
    function(cN_) {return initialStateGetter(self, cN_);}
  );
  function cy_(inst, action) {
    var match = inst[6][2][1][6];
    var deepestDiv = match[1];
    var divStateStr = domStateToString(deepestDiv[5][1]);
    request(call1(self[1], onRaf));
    return symbol(state__0, symbol(bi_, symbol(divStateStr, bh_)));
  }
  var cz_ = 0;
  var cA_ = [0,symbol(bj_, string_of_int(int__1(10)))];
  var cB_ = 0;
  var cC_ = element(
    [0,function(cL_, cM_) {return render__0(cB_, cA_, cz_, cL_, cM_);}]
  );
  var cD_ = 0;
  var cE_ = element(
    [0,function(cJ_, cK_) {return render__0(cD_, bk_, cC_, cJ_, cK_);}]
  );
  var cF_ = 0;
  var cG_ = 0;
  return [
    0,
    state__0,
    [
      1,
      element(
        [0,function(cH_, cI_) {return render__0(cG_, bl_, cF_, cH_, cI_);}]
      ),
      cE_
    ],
    cy_
  ];
}

function render__9(opt, children) {
  if (opt) {
    var sth = opt[1];
    var txt = sth;
  }
  else var txt = bm_;
  var ct_ = 0;
  var cu_ = [0,txt];
  var cv_ = 0;
  return function(cw_, cx_) {return render__0(cv_, cu_, ct_, cw_, cx_);};
}

log(bn_);

var startSeconds = caml_sys_time(0);

suppress[1] = 0;

var i = 0;

a:
for (; ; ) {
  var stateless = element([0,render__9(bq_, 0)]);
  printSection(br_);
  var containerRoot = create(0);
  var j = 0;
  for (; ; ) {
    var bZ_ = element([0,render__9(bY_, 0)]);
    render(
      containerRoot,
      element(
        [
          0,
          function(cq_) {
            return function(cr_, cs_) {return render__2(b0_, cq_, cr_, cs_);};
          }(bZ_
          )
        ]
      )
    );
    var b1_ = j + 1 | 0;
    if (10 !== j) {var j = b1_;continue;}
    printSection(bs_);
    var counterRoot = create(0);
    var bt_ = 0;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, cn_) {
            return function(co_, cp_) {
              return render__3(bu_, cn_, stateless, co_, cp_);
            };
          }(stateless, bt_
          )
        ]
      )
    );
    printRoot(bv_, counterRoot);
    var bw_ = 0;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, ck_) {
            return function(cl_, cm_) {
              return render__3(bx_, ck_, stateless, cl_, cm_);
            };
          }(stateless, bw_
          )
        ]
      )
    );
    printRoot(by_, counterRoot);
    var bz_ = 8;
    render(
      counterRoot,
      element(
        [
          0,
          function(stateless, ch_) {
            return function(ci_, cj_) {
              return render__3(bA_, ch_, stateless, ci_, cj_);
            };
          }(stateless, bz_
          )
        ]
      )
    );
    printRoot(bB_, counterRoot);
    printSection(bC_);
    var appRoot = create(0);
    var bD_ = 0;
    render(
      appRoot,
      element(
        [
          0,
          function(stateless, ce_) {
            return function(cf_, cg_) {
              return render__6(ce_, stateless, cf_, cg_);
            };
          }(stateless, bD_
          )
        ]
      )
    );
    printRoot(bE_, appRoot);
    var bF_ = 0;
    var bG_ = 1;
    render(
      appRoot,
      element(
        [
          0,
          function(ca_, cb_) {
            return function(cc_, cd_) {return render__6(cb_, ca_, cc_, cd_);};
          }(bF_, bG_
          )
        ]
      )
    );
    printRoot(bH_, appRoot);
    printSection(bI_);
    var animRoot = create(0);
    render(
      animRoot,
      element([0,function(b9_, b__) {return render__8(bK_, bJ_, b9_, b__);}])
    );
    printRoot(bL_, animRoot);
    tick(0);
    printRoot(bM_, animRoot);
    tick(0);
    printRoot(bN_, animRoot);
    clearAll(0);
    printSection(bO_);
    var polyRoot = create(0);
    var bP_ = 0;
    render(
      polyRoot,
      element(
        [
          0,
          function(b6_) {
            return function(b7_, b8_) {
              return render__7(bR_, bQ_, b6_, b7_, b8_);
            };
          }(bP_
          )
        ]
      )
    );
    printRoot(bS_, polyRoot);
    var anotherPolyRoot = create(0);
    var bT_ = 0;
    var bV_ = 0;
    render(
      anotherPolyRoot,
      element(
        [
          0,
          function(b2_, b3_) {
            return function(b4_, b5_) {
              return render__7(b3_, bU_, b2_, b4_, b5_);
            };
          }(bT_, bV_
          )
        ]
      )
    );
    printRoot(bW_, anotherPolyRoot);
    var bX_ = i + 1 | 0;
    if (0 !== i) {var i = bX_;continue a;}
    var endSeconds = caml_sys_time(0);
    log(symbol(bo_, string_of_int((endSeconds - startSeconds) * 1e3 | 0)));
    var f = caml_alloc_dummy_function(1, 2);
    var z = [];
    caml_update_dummy(f, function(x, y) {return 1;});
    caml_update_dummy(z, [0,[0,f,bp_]]);
    if (z) {
      var match = z[1];
      var str = match[2];
      var f__0 = match[1];
      log(symbol(str, string_of_int(call2(f__0, 0, 0))));
    }
    do_at_exit(0);
  }
}
