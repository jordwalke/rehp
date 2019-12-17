/**
 * @flow strict
 * Genlex
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_float_of_string = runtime["caml_float_of_string"];
var string = runtime["caml_new_string"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
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

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var cst = string("");
var cst__0 = string("");
var cst__1 = string("");
var cst__2 = string("");
var cst__4 = string("");
var cst__3 = string("");
var cst_Illegal_character = string("Illegal character ");
var Stream = require("Stream.js");
var Char = require("Char.js");
var String = require("String_.js");
var Hashtbl = require("Hashtbl.js");
var Not_found = require("Not_found.js");
var Pervasives = require("Pervasives.js");
var List = require("List_.js");
var Bytes = require("Bytes.js");
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
  function a_(s) {return call3(Hashtbl[5], kwd_table, s, [0,s]);}
  call2(List[15], a_, keywords);
  function ident_or_keyword(id) {
    try {var C_ = call2(Hashtbl[6], kwd_table, id);return C_;}
    catch(D_) {
      D_ = runtime["caml_wrap_exception"](D_);
      if (D_ === Not_found) {return [1,id];}
      throw caml_wrap_thrown_exception_reraise(D_);
    }
  }
  function keyword_or_error(c) {
    var s = call2(String[1], 1, c);
    try {var A_ = call2(Hashtbl[6], kwd_table, s);return A_;}
    catch(B_) {
      B_ = runtime["caml_wrap_exception"](B_);
      if (B_ === Not_found) {
        var z_ = call2(Pervasives[16], cst_Illegal_character, s);
        throw caml_wrap_thrown_exception([0,Stream[2],z_]);
      }
      throw caml_wrap_thrown_exception_reraise(B_);
    }
  }
  function end_exponent_part(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var y_ = match[1];
        var switcher = y_ + -48 | 0;
        if (! (9 < switcher >>> 0)) {
          call1(Stream[12], strm);
          store(y_);
          continue;
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function exponent_part(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var x_ = match[1];
      var switch__0 = 43 === x_ ? 0 : 45 === x_ ? 0 : 1;
      if (! switch__0) {
        call1(Stream[12], strm);
        store(x_);
        return end_exponent_part(strm);
      }
    }
    return end_exponent_part(strm);
  }
  function decimal_part(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var v_ = match[1];
        var w_ = v_ + -69 | 0;
        if (32 < w_ >>> 0) {
          var switcher = w_ + 21 | 0;
          if (! (9 < switcher >>> 0)) {
            call1(Stream[12], strm);
            store(v_);
            continue;
          }
        }
        else {
          var switcher__0 = w_ + -1 | 0;
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
        var u_ = match[1];
        if (58 <= u_) {
          var switch__0 = 69 === u_ ? 0 : 101 === u_ ? 0 : 1;
          if (! switch__0) {
            call1(Stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
        else {
          if (46 === u_) {
            call1(Stream[12], strm);
            store(46);
            return decimal_part(strm);
          }
          if (48 <= u_) {call1(Stream[12], strm);store(u_);continue;}
        }
      }
      return [0,[2,runtime["caml_int_of_string"](get_string(0))]];
    }
  }
  function ident2(strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var s_ = match[1];
        if (94 <= s_) {
          var t_ = s_ + -95 | 0;
          var switch__0 = 30 < t_ >>> 0 ? 32 <= t_ ? 1 : 0 : 29 === t_ ? 0 : 1;
        }
        else if (65 <= s_) var switch__0 = 92 ===
           s_ ?
          0 :
          1;
        else if (33 <= s_) switch (
          s_ + -33 | 0
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
        if (! switch__0) {call1(Stream[12], strm);store(s_);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function neg_number(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var r_ = match[1];
      var switcher = r_ + -48 | 0;
      if (! (9 < switcher >>> 0)) {
        call1(Stream[12], strm);
        reset_buffer(0);
        store(45);
        store(r_);
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
        var p_ = match[1];
        if (91 <= p_) {
          var q_ = p_ + -95 | 0;
          var switch__0 = 27 < q_ >>> 0 ? 97 <= q_ ? 0 : 1 : 1 === q_ ? 1 : 0;
        }
        else var switch__0 = 48 <= p_ ?
          6 < (p_ + -58 | 0) >>> 0 ? 0 : 1 :
          39 === p_ ? 0 : 1;
        if (! switch__0) {call1(Stream[12], strm);store(p_);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function next_token__0(counter, strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var l_ = match[1];
        if (124 <= l_) var switch__0 = 127 <=
           l_ ?
          192 <= l_ ? 1 : 0 :
          125 === l_ ? 0 : 2;
        else {
          var m_ = l_ + -65 | 0;
          if (57 < m_ >>> 0) if (58 <= m_) var switch__0 = 0;
          else {
            var switcher = m_ + 65 | 0;
            switch (switcher) {
              case 34:
                call1(Stream[12], strm);
                reset_buffer(0);
                return [0,[4,string(strm)]];
              case 39:
                call1(Stream[12], strm);
                try {var c = char__0(strm);}
                catch(o_) {
                  o_ = runtime["caml_wrap_exception"](o_);
                  if (o_ === Stream[1]) {
                    throw caml_wrap_thrown_exception([0,Stream[2],cst]);
                  }
                  throw caml_wrap_thrown_exception_reraise(o_);
                }
                var match__0 = call1(Stream[11], strm);
                if (match__0) {
                  if (39 === match__0[1]) {
                    call1(Stream[12], strm);
                    return [0,[5,c]];
                  }
                }
                throw caml_wrap_thrown_exception([0,Stream[2],cst__0]);
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
                store(l_);
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
            var n_ = m_ + -26 | 0;
            if (5 < n_ >>> 0) var switch__0 = 1;
            else switch (n_) {
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
            return [0,keyword_or_error(l_)];
          case 1:
            call1(Stream[12], strm);
            reset_buffer(0);
            store(l_);
            return ident(strm);
          default:
            call1(Stream[12], strm);
            reset_buffer(0);
            store(l_);
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
        var j_ = match[1];
        if (34 === j_) {call1(Stream[12], strm);return get_string(0);}
        if (92 === j_) {
          call1(Stream[12], strm);
          try {var c = escape(strm);}
          catch(k_) {
            k_ = runtime["caml_wrap_exception"](k_);
            if (k_ === Stream[1]) {
              throw caml_wrap_thrown_exception([0,Stream[2],cst__1]);
            }
            throw caml_wrap_thrown_exception_reraise(k_);
          }
          store(c);
          continue;
        }
        call1(Stream[12], strm);
        store(j_);
        continue;
      }
      throw caml_wrap_thrown_exception(Stream[1]);
    }
  }
  function char__0(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var g_ = match[1];
      if (92 === g_) {
        call1(Stream[12], strm);
        try {var h_ = escape(strm);return h_;}
        catch(i_) {
          i_ = runtime["caml_wrap_exception"](i_);
          if (i_ === Stream[1]) {
            throw caml_wrap_thrown_exception([0,Stream[2],cst__2]);
          }
          throw caml_wrap_thrown_exception_reraise(i_);
        }
      }
      call1(Stream[12], strm);
      return g_;
    }
    throw caml_wrap_thrown_exception(Stream[1]);
  }
  function escape(strm) {
    var match = call1(Stream[11], strm);
    if (match) {
      var d_ = match[1];
      if (58 <= d_) {
        var switcher = d_ + -110 | 0;
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
      else if (48 <= d_) {
        call1(Stream[12], strm);
        var match__0 = call1(Stream[11], strm);
        if (match__0) {
          var e_ = match__0[1];
          var switcher__0 = e_ + -48 | 0;
          if (! (9 < switcher__0 >>> 0)) {
            call1(Stream[12], strm);
            var match__1 = call1(Stream[11], strm);
            if (match__1) {
              var f_ = match__1[1];
              var switcher__1 = f_ + -48 | 0;
              if (! (9 < switcher__1 >>> 0)) {
                call1(Stream[12], strm);
                return call1(
                  Char[1],
                  (((d_ + -48 | 0) * 100 | 0) + ((e_ + -48 | 0) * 10 | 0) | 0) + (f_ + -48 | 0) | 0
                );
              }
            }
            throw caml_wrap_thrown_exception([0,Stream[2],cst__4]);
          }
        }
        throw caml_wrap_thrown_exception([0,Stream[2],cst__3]);
      }
      call1(Stream[12], strm);
      return d_;
    }
    throw caml_wrap_thrown_exception(Stream[1]);
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
      throw caml_wrap_thrown_exception(Stream[1]);
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
    throw caml_wrap_thrown_exception(Stream[1]);
  }
  function maybe_end_comment(counter, strm) {
    for (; ; ) {
      var match = call1(Stream[11], strm);
      if (match) {
        var c_ = match[1];
        if (41 === c_) {call1(Stream[12], strm);return 0;}
        if (42 === c_) {call1(Stream[12], strm);continue;}
        call1(Stream[12], strm);
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return comment__0(counter__0, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      throw caml_wrap_thrown_exception(Stream[1]);
    }
  }
  function comment(strm) {return caml_trampoline(comment__0(0, strm));}
  return function(input) {
    function b_(count) {return next_token(input);}
    return call1(Stream[3], b_);
  };
}

var Genlex = [0,make_lexer];

exports = Genlex;

/*::type Exports = {
  make_lexer: (keywords: any) => any,
}*/
/** @type {{
  make_lexer: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.make_lexer = module.exports[1];

/* Hashing disabled */
