/**
 * Main executable compiled output. Runtime included in compilation output.
 */

"use strict";

let joo_global_object = typeof global !== 'undefined' ? global : window;


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

var caml_global_data = [0];

function caml_wrap_thrown_exception(exn) {
  exn.stack_trace =
    new (joo_global_object.Error)("Js exception containing backtrace");
  return exn;
}

function caml_raise_with_arg(tag, arg) {
  throw caml_wrap_thrown_exception([0,tag,arg]);
}

function caml_new_string(s) {return new MlBytes(0, s, s.length);}

function caml_raise_with_string(tag, msg) {
  caml_raise_with_arg(tag, caml_new_string(msg));
}

function caml_invalid_argument(msg) {
  caml_raise_with_string(caml_global_data.Invalid_argument, msg);
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

var caml_oo_last_id = 0;

function caml_fresh_oo_id() {return caml_oo_last_id++;}

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

function caml_jsbytes_of_string(s) {
  if ((s.t & 6) != 0) {caml_convert_string_to_bytes(s);}
  return s.c;
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

function caml_register_global(n, v, name_opt) {
  if (name_opt && joo_global_object.toplevelReloc) {n = joo_global_object.toplevelReloc(name_opt);
  }
  caml_global_data[n + 1] = v;
  if (name_opt) {caml_global_data[name_opt] = v;}
}

function caml_string_equal(s1, s2) {
  if (s1 === s2) {return 1;}
  s1.t & 6 && caml_convert_string_to_bytes(s1);
  s2.t & 6 && caml_convert_string_to_bytes(s2);
  return s1.c == s2.c ? 1 : 0;
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
var helperVal = caml_new_string("hello");
var greeting = caml_new_string("hello world");
var greeting__0 = caml_new_string("hello world with unicode: \xc9\x8a");

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

var b = caml_new_string("true");
var c = caml_new_string("false");
var a = [255,1,0,32752];
var d = caml_new_string("String.sub / Bytes.sub");
var e = caml_new_string("");
var v = caml_new_string(
  "The variable v_ should not conflict with any other variables in scope"
);
var f = caml_new_string('String.length("\xc9\x8a") should be two:');
var h = caml_new_string("-1");
var i = caml_new_string("-6");
var j = caml_new_string("1");
var k = caml_new_string("6");
var l = caml_new_string("as_df");
var m = caml_new_string("index from string with char: ");
var P = caml_new_string("asdf");
var o = caml_new_string("index from string without char: ");
var p = caml_new_string("Prints seven:");
var q = caml_new_string("Prints six:");
var r = caml_new_string("Prints six:");
var s = caml_new_string("6");
var t = caml_new_string("Reason is on \xf0\x9f\x94\xa5");
var u = caml_new_string(" trimmed string ");
var w = caml_new_string("tmp");
var N = caml_new_string("WHEREAMI");
var z = caml_new_string("Properly caught invalid string to int conversion.");
var M = caml_new_string("Did not properly catch Failure exception");
var K = caml_new_string("20");
var C = caml_new_string("Properly caught conversion from string '20' to int ");
var J = caml_new_string("Did not properly catch conversion from string to int"
);
var D = [0,1,[0,2,[0,3,[0,4,0]]]];
var E = [0,1,[0,2,[0,3,[0,4,0]]]];
var F = caml_new_string("ARE == T: ");
var G = caml_new_string("ARE === F: ");
var H = caml_new_string("Nans are === (should output true):");
var I = caml_new_string("Nans are == (should output false):");

function failwith(s) {throw caml_wrap_thrown_exception([0,Failure,s]);}

function invalid_arg(s) {
  throw caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

caml_fresh_oo_id(0);

var anotherName = caml_int64_float_of_bits(a);

function symbol(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = caml_create_bytes(l1 + l2 | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return s;
}

function string_of_bool(b__0) {return b__0 ? b : c;}

function string_of_int(n) {return caml_new_string("" + n);}

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
        catch(Y) {
          Y = caml_wrap_exception(Y);
          if (Y[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(Y);
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

function print_int(i) {return output_string(stdout, string_of_int(i));}

function print_endline(s) {
  output_string(stdout, s);
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function print_newline(param) {
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function do_at_exit(param) {return flush_all(0);}

function make(n, c) {
  var s = caml_create_bytes(n);
  caml_fill_bytes(s, 0, n, c);
  return s;
}

var empty = caml_create_bytes(0);

function sub(s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {
        var r = caml_create_bytes(len);
        caml_blit_bytes(s, ofs, r, 0, len);
        return r;
      }
    }
  }
  return invalid_arg(d);
}

function is_space(param) {
  var X = param + -9 | 0;
  var switch__0 = 4 < X >>> 0 ? 23 === X ? 1 : 0 : 2 === X ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  var len = caml_ml_bytes_length(s);
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      if (is_space(caml_bytes_unsafe_get(s, i[1]))) {i[1] += 1;continue;}
    }
    var j = [0,len + -1 | 0];
    for (; ; ) {
      if (i[1] <= j[1]) {
        if (is_space(caml_bytes_unsafe_get(s, j[1]))) {j[1] += -1;continue;}
      }
      return i[1] <= j[1] ? sub(s, i[1], (j[1] - i[1] | 0) + 1 | 0) : empty;
    }
  }
}

function bos(W) {return W;}

function bts(V) {return V;}

function make__0(n, c) {return bts(make(n, c));}

function is_space__0(param) {
  var U = param + -9 | 0;
  var switch__0 = 4 < U >>> 0 ? 23 === U ? 1 : 0 : 2 === U ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim__0(s) {
  if (caml_string_equal(s, e)) {return s;}
  if (! is_space__0(caml_bytes_unsafe_get(s, 0))) {
    if (
    !
    is_space__0(caml_bytes_unsafe_get(s, caml_ml_string_length(s) + -1 | 0))
    ) {return s;}
  }
  return bts(trim(bos(s)));
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

function index(s, c) {return index_rec(s, caml_ml_string_length(s), 0, c);}

print_endline(greeting);

print_endline(greeting__0);

print_endline(symbol(f, string_of_int(2)));

var g = make__0(1, 138);

print_endline(symbol(make__0(1, 201), g));

caml_int_of_string(h);

caml_int_of_string(i);

var one = caml_int_of_string(j);
var six = caml_int_of_string(k);
var index__0 = index(l, 95);

print_endline(symbol(m, string_of_int(index__0)));

try {var Q = index(P, 95);var index__1 = Q;}
catch(T) {
  T = caml_wrap_exception(T);
  if (T !== Not_found) {throw caml_wrap_thrown_exception_reraise(T);}
  var n = -1;
  var index__1 = n;
}

print_endline(symbol(o, string_of_int(index__1)));

print_int(index__1);

print_endline(p);

print_int(one + six | 0);

print_newline(0);

print_endline(q);

print_int(six);

print_newline(0);

print_endline(r);

print_string(s);

print_newline(0);

print_endline(helperVal);

print_endline(t);

print_endline(trim__0(u));

function createIntFromString(ss) {return caml_int_of_string(ss);}

function myFunction(cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) {
  print_string(v);
  return print_newline(0);
}

myFunction(w);

try {var O = createIntFromString(N);var y = O;}
catch(S) {
  S = caml_wrap_exception(S);
  if (S[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(S);}
  var x = 102;
  var y = x;
}

if (102 === y) {
  print_string(z);
  print_newline(0);
}
else failwith(M);

try {var L = createIntFromString(K);var B = L;}
catch(R) {
  R = caml_wrap_exception(R);
  if (R[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(R);}
  var A = 102;
  var B = A;
}

if (20 === B) {
  print_string(symbol(C, string_of_int(B)));
  print_newline(0);
}
else failwith(J);

var one__0 = [0,D];
var two = [0,E];

print_string(symbol(F, string_of_bool(caml_equal(one__0, two))));

print_newline(0);

print_string(symbol(G, string_of_bool(one__0 === two ? 1 : 0)));

print_newline(0);

print_string(symbol(H, string_of_bool(anotherName === anotherName ? 1 : 0)));

print_newline(0);

print_string(symbol(I, string_of_bool(anotherName === anotherName ? 1 : 0)));

print_newline(0);

do_at_exit(0);

