/**
 * @flow strict
 * Stdlib__genlex
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

var caml_create_bytes = runtime["caml_create_bytes"];
var caml_float_of_string = runtime["caml_float_of_string"];
var string = runtime["caml_new_string"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst = string("");
var cst__0 = string("");
var cst__1 = string("");
var cst__2 = string("");
var cst__4 = string("");
var cst__3 = string("");
var cst_Illegal_character = string("Illegal character ");
var Stdlib_stream = require("./Stdlib__stream.js");
var Stdlib_char = require("./Stdlib__char.js");
var Stdlib_string = require("./Stdlib__string.js");
var Stdlib_hashtbl = require("./Stdlib__hashtbl.js");
var Stdlib = require("./Stdlib.js");
var Stdlib_list = require("./Stdlib__list.js");
var Stdlib_bytes = require("./Stdlib__bytes.js");
var initial_buffer = caml_create_bytes(32);
var buffer = [0,initial_buffer];
var bufpos = [0,0];

function reset_buffer(param) {
  buffer[1] = initial_buffer;
  bufpos[1] = 0;
  return 0;
}

function store(c) {
  var newbuffer;
  if (runtime["caml_ml_bytes_length"](buffer[1]) <= bufpos[1]) {
    newbuffer = caml_create_bytes(2 * bufpos[1] | 0);
    call5(Stdlib_bytes[11], buffer[1], 0, newbuffer, 0, bufpos[1]);
    buffer[1] = newbuffer;
  }
  runtime["caml_bytes_set"](buffer[1], bufpos[1], c);
  bufpos[1] += 1;
  return 0;
}

function get_string(param) {
  var s = call3(Stdlib_bytes[8], buffer[1], 0, bufpos[1]);
  buffer[1] = initial_buffer;
  return s;
}

function make_lexer(keywords) {
  var kwd_table = call2(Stdlib_hashtbl[1], 0, 17);
  function a_(s) {return call3(Stdlib_hashtbl[5], kwd_table, s, [0,s]);}
  call2(Stdlib_list[15], a_, keywords);
  function ident_or_keyword(id) {
    var C_;
    try {C_ = call2(Stdlib_hashtbl[6], kwd_table, id);return C_;}
    catch(D_) {
      D_ = runtime["caml_wrap_exception"](D_);
      if (D_ === Stdlib[8]) {return [1,id];}
      throw caml_wrap_thrown_exception_reraise(D_);
    }
  }
  function keyword_or_error(c) {
    var z_;
    var A_;
    var s = call2(Stdlib_string[1], 1, c);
    try {A_ = call2(Stdlib_hashtbl[6], kwd_table, s);return A_;}
    catch(B_) {
      B_ = runtime["caml_wrap_exception"](B_);
      if (B_ === Stdlib[8]) {
        z_ = call2(Stdlib[28], cst_Illegal_character, s);
        throw caml_wrap_thrown_exception([0,Stdlib_stream[2],z_]);
      }
      throw caml_wrap_thrown_exception_reraise(B_);
    }
  }
  function end_exponent_part(strm) {
    var switcher;
    var y_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        y_ = match[1];
        switcher = y_ + -48 | 0;
        if (! (9 < switcher >>> 0)) {
          call1(Stdlib_stream[12], strm);
          store(y_);
          continue;
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function exponent_part(strm) {
    var x_;
    var switch__0;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      x_ = match[1];
      switch__0 = 43 === x_ ? 0 : 45 === x_ ? 0 : 1;
      if (! switch__0) {
        call1(Stdlib_stream[12], strm);
        store(x_);
        return end_exponent_part(strm);
      }
    }
    return end_exponent_part(strm);
  }
  function decimal_part(strm) {
    var switcher__0;
    var switcher;
    var w_;
    var v_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        v_ = match[1];
        w_ = v_ + -69 | 0;
        if (32 < w_ >>> 0) {
          switcher = w_ + 21 | 0;
          if (! (9 < switcher >>> 0)) {
            call1(Stdlib_stream[12], strm);
            store(v_);
            continue;
          }
        }
        else {
          switcher__0 = w_ + -1 | 0;
          if (30 < switcher__0 >>> 0) {
            call1(Stdlib_stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function number(strm) {
    var switch__0;
    var u_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        u_ = match[1];
        if (58 <= u_) {
          switch__0 = 69 === u_ ? 0 : 101 === u_ ? 0 : 1;
          if (! switch__0) {
            call1(Stdlib_stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
        else {
          if (46 === u_) {
            call1(Stdlib_stream[12], strm);
            store(46);
            return decimal_part(strm);
          }
          if (48 <= u_) {call1(Stdlib_stream[12], strm);store(u_);continue;}
        }
      }
      return [0,[2,runtime["caml_int_of_string"](get_string(0))]];
    }
  }
  function ident2(strm) {
    var switch__0;
    var t_;
    var s_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        s_ = match[1];
        if (94 <= s_) {
          t_ = s_ + -95 | 0;
          switch__0 = 30 < t_ >>> 0 ? 32 <= t_ ? 1 : 0 : 29 === t_ ? 0 : 1;
        }
        else if (65 <= s_) switch__0 =
          92 === s_ ? 0 : 1;
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
            switch__0 = 0;
            break;
          default:
            switch__0 = 1
          }
        else switch__0 = 1;
        if (! switch__0) {call1(Stdlib_stream[12], strm);store(s_);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function neg_number(strm) {
    var r_;
    var switcher;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      r_ = match[1];
      switcher = r_ + -48 | 0;
      if (! (9 < switcher >>> 0)) {
        call1(Stdlib_stream[12], strm);
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
    var switch__0;
    var q_;
    var p_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        p_ = match[1];
        if (91 <= p_) {
          q_ = p_ + -95 | 0;
          switch__0 = 27 < q_ >>> 0 ? 97 <= q_ ? 0 : 1 : 1 === q_ ? 1 : 0;
        }
        else switch__0 =
          48 <= p_ ? 6 < (p_ + -58 | 0) >>> 0 ? 0 : 1 : 39 === p_ ? 0 : 1;
        if (! switch__0) {call1(Stdlib_stream[12], strm);store(p_);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function next_token__0(counter, strm) {
    var switch__0;
    var counter__0;
    var n_;
    var match__0;
    var c;
    var switcher;
    var m_;
    var l_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        l_ = match[1];
        if (124 <= l_) switch__0 =
          127 <= l_ ? 192 <= l_ ? 1 : 0 : 125 === l_ ? 0 : 2;
        else {
          m_ = l_ + -65 | 0;
          if (57 < m_ >>> 0) if (58 <= m_) switch__0 = 0;
          else {
            switcher = m_ + 65 | 0;
            switch (switcher) {
              case 34:
                call1(Stdlib_stream[12], strm);
                reset_buffer(0);
                return [0,[4,string(strm)]];
              case 39:
                call1(Stdlib_stream[12], strm);
                try {c = char__0(strm);}
                catch(o_) {
                  o_ = runtime["caml_wrap_exception"](o_);
                  if (o_ === Stdlib_stream[1]) {
                    throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst]);
                  }
                  throw caml_wrap_thrown_exception_reraise(o_);
                }
                match__0 = call1(Stdlib_stream[11], strm);
                if (match__0) {
                  if (39 === match__0[1]) {
                    call1(Stdlib_stream[12], strm);
                    return [0,[5,c]];
                  }
                }
                throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst__0]);
              case 40:
                call1(Stdlib_stream[12], strm);
                if (counter < 50) {
                  counter__0 = counter + 1 | 0;
                  return maybe_comment(counter__0, strm);
                }
                return caml_trampoline_return(maybe_comment, [0,strm]);
              case 45:
                call1(Stdlib_stream[12], strm);
                return neg_number(strm);
              case 9:
              case 10:
              case 12:
              case 13:
              case 26:
              case 32:
                call1(Stdlib_stream[12], strm);
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
                call1(Stdlib_stream[12], strm);
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
                switch__0 = 2;
                break;
              default:
                switch__0 = 0
              }
          }
          else {
            n_ = m_ + -26 | 0;
            if (5 < n_ >>> 0) switch__0 = 1;
            else switch (n_) {
              case 4:
                switch__0 = 1;
                break;
              case 1:
              case 3:
                switch__0 = 2;
                break;
              default:
                switch__0 = 0
              }
          }
        }
        switch (switch__0) {
          case 0:
            call1(Stdlib_stream[12], strm);
            return [0,keyword_or_error(l_)];
          case 1:
            call1(Stdlib_stream[12], strm);
            reset_buffer(0);
            store(l_);
            return ident(strm);
          default:
            call1(Stdlib_stream[12], strm);
            reset_buffer(0);
            store(l_);
            return ident2(strm)
          }
      }
      return 0;
    }
  }
  function maybe_comment(counter, strm) {
    var counter__0;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        call1(Stdlib_stream[12], strm);
        comment(strm);
        if (counter < 50) {
          counter__0 = counter + 1 | 0;
          return next_token__0(counter__0, strm);
        }
        return caml_trampoline_return(next_token__0, [0,strm]);
      }
    }
    return [0,keyword_or_error(40)];
  }
  function next_token(strm) {return caml_trampoline(next_token__0(0, strm));}
  function string(strm) {
    var c;
    var j_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        j_ = match[1];
        if (34 === j_) {call1(Stdlib_stream[12], strm);return get_string(0);}
        if (92 === j_) {
          call1(Stdlib_stream[12], strm);
          try {c = escape(strm);}
          catch(k_) {
            k_ = runtime["caml_wrap_exception"](k_);
            if (k_ === Stdlib_stream[1]) {
              throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst__1]);
            }
            throw caml_wrap_thrown_exception_reraise(k_);
          }
          store(c);
          continue;
        }
        call1(Stdlib_stream[12], strm);
        store(j_);
        continue;
      }
      throw caml_wrap_thrown_exception(Stdlib_stream[1]);
    }
  }
  function char__0(strm) {
    var g_;
    var h_;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      g_ = match[1];
      if (92 === g_) {
        call1(Stdlib_stream[12], strm);
        try {h_ = escape(strm);return h_;}
        catch(i_) {
          i_ = runtime["caml_wrap_exception"](i_);
          if (i_ === Stdlib_stream[1]) {
            throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst__2]);
          }
          throw caml_wrap_thrown_exception_reraise(i_);
        }
      }
      call1(Stdlib_stream[12], strm);
      return g_;
    }
    throw caml_wrap_thrown_exception(Stdlib_stream[1]);
  }
  function escape(strm) {
    var d_;
    var switcher;
    var match__0;
    var e_;
    var switcher__0;
    var match__1;
    var f_;
    var switcher__1;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      d_ = match[1];
      if (58 <= d_) {
        switcher = d_ + -110 | 0;
        if (! (6 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              call1(Stdlib_stream[12], strm);
              return 10;
            case 4:
              call1(Stdlib_stream[12], strm);
              return 13;
            case 6:
              call1(Stdlib_stream[12], strm);
              return 9
            }
        }
      }
      else if (48 <= d_) {
        call1(Stdlib_stream[12], strm);
        match__0 = call1(Stdlib_stream[11], strm);
        if (match__0) {
          e_ = match__0[1];
          switcher__0 = e_ + -48 | 0;
          if (! (9 < switcher__0 >>> 0)) {
            call1(Stdlib_stream[12], strm);
            match__1 = call1(Stdlib_stream[11], strm);
            if (match__1) {
              f_ = match__1[1];
              switcher__1 = f_ + -48 | 0;
              if (! (9 < switcher__1 >>> 0)) {
                call1(Stdlib_stream[12], strm);
                return call1(
                  Stdlib_char[1],
                  (((d_ + -48 | 0) * 100 | 0) + ((e_ + -48 | 0) * 10 | 0) | 0) + (f_ + -48 | 0) | 0
                );
              }
            }
            throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst__4]);
          }
        }
        throw caml_wrap_thrown_exception([0,Stdlib_stream[2],cst__3]);
      }
      call1(Stdlib_stream[12], strm);
      return d_;
    }
    throw caml_wrap_thrown_exception(Stdlib_stream[1]);
  }
  function comment__0(counter, strm) {
    var counter__1;
    var counter__0;
    var switcher;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        switcher = match[1] + -40 | 0;
        if (! (2 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              call1(Stdlib_stream[12], strm);
              if (counter < 50) {
                counter__1 = counter + 1 | 0;
                return maybe_nested_comment(counter__1, strm);
              }
              return caml_trampoline_return(maybe_nested_comment, [0,strm]);
            case 1:break;
            default:
              call1(Stdlib_stream[12], strm);
              if (counter < 50) {
                counter__0 = counter + 1 | 0;
                return maybe_end_comment(counter__0, strm);
              }
              return caml_trampoline_return(maybe_end_comment, [0,strm])
            }
        }
        call1(Stdlib_stream[12], strm);
        continue;
      }
      throw caml_wrap_thrown_exception(Stdlib_stream[1]);
    }
  }
  function maybe_nested_comment(counter, strm) {
    var counter__0;
    var counter__1;
    var match = call1(Stdlib_stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        call1(Stdlib_stream[12], strm);
        comment(strm);
        if (counter < 50) {
          counter__1 = counter + 1 | 0;
          return comment__0(counter__1, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      call1(Stdlib_stream[12], strm);
      if (counter < 50) {
        counter__0 = counter + 1 | 0;
        return comment__0(counter__0, strm);
      }
      return caml_trampoline_return(comment__0, [0,strm]);
    }
    throw caml_wrap_thrown_exception(Stdlib_stream[1]);
  }
  function maybe_end_comment(counter, strm) {
    var counter__0;
    var c_;
    var match;
    for (; ; ) {
      match = call1(Stdlib_stream[11], strm);
      if (match) {
        c_ = match[1];
        if (41 === c_) {call1(Stdlib_stream[12], strm);return 0;}
        if (42 === c_) {call1(Stdlib_stream[12], strm);continue;}
        call1(Stdlib_stream[12], strm);
        if (counter < 50) {
          counter__0 = counter + 1 | 0;
          return comment__0(counter__0, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      throw caml_wrap_thrown_exception(Stdlib_stream[1]);
    }
  }
  function comment(strm) {return caml_trampoline(comment__0(0, strm));}
  return function(input) {
    function b_(count) {return next_token(input);}
    return call1(Stdlib_stream[3], b_);
  };
}

var Stdlib_genlex = [0,make_lexer];

module.exports = Stdlib_genlex;

/*::type Exports = {
  make_lexer: (keywords: any) => any,
}*/
/** @type {{
  make_lexer: (keywords: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make_lexer = module.exports[1];

/* Hashing disabled */
