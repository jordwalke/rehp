/**
 * Genlex
 * @providesModule Genlex
 */
"use strict";
var Bytes = require('Bytes.js');
var Char = require('Char.js');
var Hashtbl = require('Hashtbl.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Stream = require('Stream.js');
var String_ = require('String_.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_float_of_string = runtime["caml_float_of_string"];
var string = runtime["caml_new_string"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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

var global_data = runtime["caml_get_global_data"]();
var cst = string("");
var cst__0 = string("");
var cst__1 = string("");
var cst__2 = string("");
var cst__4 = string("");
var cst__3 = string("");
var cst_Illegal_character = string("Illegal character ");
var Stream = global_data["Stream"];
var Char = global_data["Char"];
var String = global_data["String_"];
var Hashtbl = global_data["Hashtbl"];
var Not_found = global_data["Not_found"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var Bytes = global_data["Bytes"];
var initial_buffer = caml_create_bytes(32);
var buffer = [0,initial_buffer];
var bufpos = [0,0];

function reset_buffer(param) {
  buffer[1] = initial_buffer;
  bufpos[1] = 0;
  return 0;
}

function store(c) {
  if (runtime["caml_ml_bytes_length"](buffer[1]) <= bufpos[1]) {
    var newbuffer = caml_create_bytes(2 * bufpos[1] | 0);
    call5(Bytes[11], buffer[1], 0, newbuffer, 0, bufpos[1]);
    buffer[1] = newbuffer;
  }
  runtime["caml_bytes_set"](buffer[1], bufpos[1], c);
  bufpos[1] += 1;
  return 0;
}

function get_string(param) {
  var s = call3(Bytes[8], buffer[1], 0, bufpos[1]);
  buffer[1] = initial_buffer;
  return s;
}

function make_lexer(keywords) {
  var kwd_table = call2(Hashtbl[1], 0, 17);
  function a(s) {return call3(Hashtbl[5], kwd_table, s, [0,s]);}
  call2(List[15], a, keywords);
  function ident_or_keyword(id) {
    try {var C = call2(Hashtbl[6], kwd_table, id);return C;}
    catch(D) {
      D = caml_wrap_exception(D);
      if (D === Not_found) {return [1,id];}
      throw runtime["caml_wrap_thrown_exception_reraise"](D);
    }
  }
  function keyword_or_error(c) {
    var s = call2(String[1], 1, c);
    try {var A = call2(Hashtbl[6], kwd_table, s);return A;}
    catch(B) {
      B = caml_wrap_exception(B);
      if (B === Not_found) {
        var z = call2(Pervasives[16], cst_Illegal_character, s);
        throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],z]);
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](B);
    }
  }
  function end_exponent_part(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var y = match[1];
        var switcher = y + -48 | 0;
        if (! (9 < switcher >>> 0)) {
          call1(Stream[12], strm);
          store(y);
          continue;
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function exponent_part(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var x = match[1];
      var switch__0 = 43 === x ? 0 : 45 === x ? 0 : 1;
      if (! switch__0) {
        call1(Stream[12], strm);
        store(x);
        return end_exponent_part(strm);
      }
    }
    return end_exponent_part(strm);
  }
  function decimal_part(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var v = match[1];
        var w = v + -69 | 0;
        if (32 < w >>> 0) {
          var switcher = w + 21 | 0;
          if (! (9 < switcher >>> 0)) {
            call1(Stream[12], strm);
            store(v);
            continue;
          }
        }
        else {
          var switcher__0 = w + -1 | 0;
          if (30 < switcher__0 >>> 0) {
            call1(Stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function number(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var u = match[1];
        if (58 <= u) {
          var switch__0 = 69 === u ? 0 : 101 === u ? 0 : 1;
          if (! switch__0) {
            call1(Stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
        else {
          if (46 === u) {
            call1(Stream[12], strm);
            store(46);
            return decimal_part(strm);
          }
          if (48 <= u) {call1(Stream[12], strm);store(u);continue;}
        }
      }
      return [0,[2,runtime["caml_int_of_string"](get_string(0))]];
    }
  }
  function ident2(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var s = match[1];
        if (94 <= s) {
          var t = s + -95 | 0;
          var switch__0 = 30 < t >>> 0 ? 32 <= t ? 1 : 0 : 29 === t ? 0 : 1;
        }
        else if (65 <= s) var switch__0 = 92 ===
           s ?
          0 :
          1;
        else if (33 <= s) switch (
          s + -33 | 0
        ) {
          case 0:
          case 2:
          case 3:
          case 4:
          case 5:
          case 9:
          case 10:
          case 12:
          case 14:
          case 25:
          case 27:
          case 28:
          case 29:
          case 30:
          case 31:
            var switch__0 = 0;
            break;
          default:
            var switch__0 = 1
          }
        else var switch__0 = 1;
        if (! switch__0) {call1(Stream[12], strm);store(s);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function neg_number(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var r = match[1];
      var switcher = r + -48 | 0;
      if (! (9 < switcher >>> 0)) {
        call1(Stream[12], strm);
        reset_buffer(0);
        store(45);
        store(r);
        return number(strm);
      }
    }
    reset_buffer(0);
    store(45);
    return ident2(strm);
  }
  function ident(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var p = match[1];
        if (91 <= p) {
          var q = p + -95 | 0;
          var switch__0 = 27 < q >>> 0 ? 97 <= q ? 0 : 1 : 1 === q ? 1 : 0;
        }
        else var switch__0 = 48 <= p ?
          6 < (p + -58 | 0) >>> 0 ? 0 : 1 :
          39 === p ? 0 : 1;
        if (! switch__0) {call1(Stream[12], strm);store(p);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function next_token__0(counter, strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var l = match[1];
        if (124 <= l) var switch__0 = 127 <=
           l ?
          192 <= l ? 1 : 0 :
          125 === l ? 0 : 2;
        else {
          var m = l + -65 | 0;
          if (57 < m >>> 0) if (58 <= m) var switch__0 = 0;
          else {
            var switcher = m + 65 | 0;
            switch (switcher) {
              case 34:
                call1(Stream[12], strm);
                reset_buffer(0);
                return [0,[4,string(strm)]];
              case 39:
                call1(Stream[12], strm);
                try {var c = char__0(strm);}
                catch(o) {
                  o = caml_wrap_exception(o);
                  if (o === Stream[1]) {
                    throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst]
                          );
                  }
                  throw runtime["caml_wrap_thrown_exception_reraise"](o);
                }
                var match__0 = call1(Stream[11], strm);
                if (match__0) {
                  if (39 === match__0[1]) {
                    call1(Stream[12], strm);
                    return [0,[5,c]];
                  }
                }
                throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__0]
                      );
              case 40:
                call1(Stream[12], strm);
                if (counter < 50) {
                  var counter__0 = counter + 1 | 0;
                  return maybe_comment(counter__0, strm);
                }
                return caml_trampoline_return(maybe_comment, [0,strm]);
              case 45:
                call1(Stream[12], strm);
                return neg_number(strm);
              case 9:
              case 10:
              case 12:
              case 13:
              case 26:
              case 32:
                call1(Stream[12], strm);
                continue;
              case 48:
              case 49:
              case 50:
              case 51:
              case 52:
              case 53:
              case 54:
              case 55:
              case 56:
              case 57:
                call1(Stream[12], strm);
                reset_buffer(0);
                store(l);
                return number(strm);
              case 33:
              case 35:
              case 36:
              case 37:
              case 38:
              case 42:
              case 43:
              case 47:
              case 58:
              case 60:
              case 61:
              case 62:
              case 63:
              case 64:
                var switch__0 = 2;
                break;
              default:
                var switch__0 = 0
              }
          }
          else {
            var n = m + -26 | 0;
            if (5 < n >>> 0) var switch__0 = 1;
            else switch (n) {
              case 4:
                var switch__0 = 1;
                break;
              case 1:
              case 3:
                var switch__0 = 2;
                break;
              default:
                var switch__0 = 0
              }
          }
        }
        switch (switch__0) {
          case 0:
            call1(Stream[12], strm);
            return [0,keyword_or_error(l)];
          case 1:
            call1(Stream[12], strm);
            reset_buffer(0);
            store(l);
            return ident(strm);
          default:
            call1(Stream[12], strm);
            reset_buffer(0);
            store(l);
            return ident2(strm)
          }
      }
      return 0;
    }
  }
  function maybe_comment(counter, strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        call1(Stream[12], strm);
        comment(strm);
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return next_token__0(counter__0, strm);
        }
        return caml_trampoline_return(next_token__0, [0,strm]);
      }
    }
    return [0,keyword_or_error(40)];
  }
  function next_token(strm) {return caml_trampoline(next_token__0(0, strm));}
  function string(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var j = match[1];
        if (34 === j) {call1(Stream[12], strm);return get_string(0);}
        if (92 === j) {
          call1(Stream[12], strm);
          try {var c = escape(strm);}
          catch(k) {
            k = caml_wrap_exception(k);
            if (k === Stream[1]) {
              throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__1]
                    );
            }
            throw runtime["caml_wrap_thrown_exception_reraise"](k);
          }
          store(c);
          continue;
        }
        call1(Stream[12], strm);
        store(j);
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Stream[1]);
    }
  }
  function char__0(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var g = match[1];
      if (92 === g) {
        call1(Stream[12], strm);
        try {var h = escape(strm);return h;}
        catch(i) {
          i = caml_wrap_exception(i);
          if (i === Stream[1]) {
            throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__2]);
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](i);
        }
      }
      call1(Stream[12], strm);
      return g;
    }
    throw runtime["caml_wrap_thrown_exception"](Stream[1]);
  }
  function escape(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var d = match[1];
      if (58 <= d) {
        var switcher = d + -110 | 0;
        if (! (6 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              call1(Stream[12], strm);
              return 10;
            case 4:
              call1(Stream[12], strm);
              return 13;
            case 6:
              call1(Stream[12], strm);
              return 9
            }
        }
      }
      else if (48 <= d) {
        call1(Stream[12], strm);
        var match__0 = call1(Stream[11], strm);
        if (match__0) {
          var e = match__0[1];
          var switcher__0 = e + -48 | 0;
          if (! (9 < switcher__0 >>> 0)) {
            call1(Stream[12], strm);
            var match__1 = call1(Stream[11], strm);
            if (match__1) {
              var f = match__1[1];
              var switcher__1 = f + -48 | 0;
              if (! (9 < switcher__1 >>> 0)) {
                call1(Stream[12], strm);
                return call1(
                  Char[1],
                  (((d + -48 | 0) * 100 | 0) + ((e + -48 | 0) * 10 | 0) | 0) + (f + -48 | 0) | 0
                );
              }
            }
            throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__4]);
          }
        }
        throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__3]);
      }
      call1(Stream[12], strm);
      return d;
    }
    throw runtime["caml_wrap_thrown_exception"](Stream[1]);
  }
  function comment__0(counter, strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var switcher = match[1] + -40 | 0;
        if (! (2 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              call1(Stream[12], strm);
              if (counter < 50) {
                var counter__1 = counter + 1 | 0;
                return maybe_nested_comment(counter__1, strm);
              }
              return caml_trampoline_return(maybe_nested_comment, [0,strm]);
            case 1:break;
            default:
              call1(Stream[12], strm);
              if (counter < 50) {
                var counter__0 = counter + 1 | 0;
                return maybe_end_comment(counter__0, strm);
              }
              return caml_trampoline_return(maybe_end_comment, [0,strm])
            }
        }
        call1(Stream[12], strm);
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Stream[1]);
    }
  }
  function maybe_nested_comment(counter, strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        call1(Stream[12], strm);
        comment(strm);
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return comment__0(counter__1, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      call1(Stream[12], strm);
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return comment__0(counter__0, strm);
      }
      return caml_trampoline_return(comment__0, [0,strm]);
    }
    throw runtime["caml_wrap_thrown_exception"](Stream[1]);
  }
  function maybe_end_comment(counter, strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var c = match[1];
        if (41 === c) {call1(Stream[12], strm);return 0;}
        if (42 === c) {call1(Stream[12], strm);continue;}
        call1(Stream[12], strm);
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return comment__0(counter__0, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      throw runtime["caml_wrap_thrown_exception"](Stream[1]);
    }
  }
  function comment(strm) {return caml_trampoline(comment__0(0, strm));}
  return function(input) {
    function b(count) {return next_token(input);}
    return call1(Stream[3], b);
  };
}

var Genlex = [0,make_lexer];

runtime["caml_register_global"](15, Genlex, "Genlex");


module.exports = global.jsoo_runtime.caml_get_global_data().Genlex;