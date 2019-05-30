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
var caml_new_string = runtime["caml_new_string"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst = caml_new_string("");
var cst__0 = caml_new_string("");
var cst__1 = caml_new_string("");
var cst__2 = caml_new_string("");
var cst__4 = caml_new_string("");
var cst__3 = caml_new_string("");
var cst_Illegal_character = caml_new_string("Illegal character ");
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
    caml_call5(Bytes[11], buffer[1], 0, newbuffer, 0, bufpos[1]);
    buffer[1] = newbuffer;
  }
  runtime["caml_bytes_set"](buffer[1], bufpos[1], c);
  bufpos[1] += 1;
  return 0;
}

function get_string(param) {
  var s = caml_call3(Bytes[8], buffer[1], 0, bufpos[1]);
  buffer[1] = initial_buffer;
  return s;
}

function make_lexer(keywords) {
  var kwd_table = caml_call2(Hashtbl[1], 0, 17);
  function zz(s) {return caml_call3(Hashtbl[5], kwd_table, s, [0,s]);}
  caml_call2(List[15], zz, keywords);
  function ident_or_keyword(id) {
    try {var z1 = caml_call2(Hashtbl[6], kwd_table, id);return z1;}
    catch(z2) {
      z2 = caml_wrap_exception(z2);
      if (z2 === Not_found) {return [1,id];}
      throw runtime["caml_wrap_thrown_exception_reraise"](z2);
    }
  }
  function keyword_or_error(c) {
    var s = caml_call2(String[1], 1, c);
    try {var zZ = caml_call2(Hashtbl[6], kwd_table, s);return zZ;}
    catch(z0) {
      z0 = caml_wrap_exception(z0);
      if (z0 === Not_found) {
        var zY = caml_call2(Pervasives[16], cst_Illegal_character, s);
        throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],zY]);
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](z0);
    }
  }
  function end_exponent_part(strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zX = match[1];
        var switcher = zX + -48 | 0;
        if (! (9 < switcher >>> 0)) {
          caml_call1(Stream[12], strm);
          store(zX);
          continue;
        }
      }
      return [0,[3,caml_float_of_string(get_string(0))]];
    }
  }
  function exponent_part(strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      var zW = match[1];
      var switch__0 = 43 === zW ? 0 : 45 === zW ? 0 : 1;
      if (! switch__0) {
        caml_call1(Stream[12], strm);
        store(zW);
        return end_exponent_part(strm);
      }
    }
    return end_exponent_part(strm);
  }
  function decimal_part(strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zU = match[1];
        var zV = zU + -69 | 0;
        if (32 < zV >>> 0) {
          var switcher = zV + 21 | 0;
          if (! (9 < switcher >>> 0)) {
            caml_call1(Stream[12], strm);
            store(zU);
            continue;
          }
        }
        else {
          var switcher__0 = zV + -1 | 0;
          if (30 < switcher__0 >>> 0) {
            caml_call1(Stream[12], strm);
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
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zT = match[1];
        if (58 <= zT) {
          var switch__0 = 69 === zT ? 0 : 101 === zT ? 0 : 1;
          if (! switch__0) {
            caml_call1(Stream[12], strm);
            store(69);
            return exponent_part(strm);
          }
        }
        else {
          if (46 === zT) {
            caml_call1(Stream[12], strm);
            store(46);
            return decimal_part(strm);
          }
          if (48 <= zT) {caml_call1(Stream[12], strm);store(zT);continue;}
        }
      }
      return [0,[2,runtime["caml_int_of_string"](get_string(0))]];
    }
  }
  function ident2(strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zR = match[1];
        if (94 <= zR) {
          var zS = zR + -95 | 0;
          var switch__0 = 30 < zS >>> 0 ? 32 <= zS ? 1 : 0 : 29 === zS ? 0 : 1;
        }
        else if (65 <= zR) var switch__0 = 92 ===
           zR ?
          0 :
          1;
        else if (33 <= zR) switch (
          zR + -33 | 0
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
        if (! switch__0) {caml_call1(Stream[12], strm);store(zR);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function neg_number(strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      var zQ = match[1];
      var switcher = zQ + -48 | 0;
      if (! (9 < switcher >>> 0)) {
        caml_call1(Stream[12], strm);
        reset_buffer(0);
        store(45);
        store(zQ);
        return number(strm);
      }
    }
    reset_buffer(0);
    store(45);
    return ident2(strm);
  }
  function ident(strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zO = match[1];
        if (91 <= zO) {
          var zP = zO + -95 | 0;
          var switch__0 = 27 < zP >>> 0 ? 97 <= zP ? 0 : 1 : 1 === zP ? 1 : 0;
        }
        else var switch__0 = 48 <= zO ?
          6 < (zO + -58 | 0) >>> 0 ? 0 : 1 :
          39 === zO ? 0 : 1;
        if (! switch__0) {caml_call1(Stream[12], strm);store(zO);continue;}
      }
      return [0,ident_or_keyword(get_string(0))];
    }
  }
  function next_token__0(counter, strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zK = match[1];
        if (124 <= zK) var switch__0 = 127 <=
           zK ?
          192 <= zK ? 1 : 0 :
          125 === zK ? 0 : 2;
        else {
          var zL = zK + -65 | 0;
          if (57 < zL >>> 0) if (58 <= zL) var switch__0 = 0;
          else {
            var switcher = zL + 65 | 0;
            switch (switcher) {
              case 34:
                caml_call1(Stream[12], strm);
                reset_buffer(0);
                return [0,[4,string(strm)]];
              case 39:
                caml_call1(Stream[12], strm);
                try {var c = char__0(strm);}
                catch(zN) {
                  zN = caml_wrap_exception(zN);
                  if (zN === Stream[1]) {
                    throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst]
                          );
                  }
                  throw runtime["caml_wrap_thrown_exception_reraise"](zN);
                }
                var match__0 = caml_call1(Stream[11], strm);
                if (match__0) {
                  if (39 === match__0[1]) {
                    caml_call1(Stream[12], strm);
                    return [0,[5,c]];
                  }
                }
                throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__0]
                      );
              case 40:
                caml_call1(Stream[12], strm);
                if (counter < 50) {
                  var counter__0 = counter + 1 | 0;
                  return maybe_comment(counter__0, strm);
                }
                return caml_trampoline_return(maybe_comment, [0,strm]);
              case 45:
                caml_call1(Stream[12], strm);
                return neg_number(strm);
              case 9:
              case 10:
              case 12:
              case 13:
              case 26:
              case 32:
                caml_call1(Stream[12], strm);
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
                caml_call1(Stream[12], strm);
                reset_buffer(0);
                store(zK);
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
            var zM = zL + -26 | 0;
            if (5 < zM >>> 0) var switch__0 = 1;
            else switch (zM) {
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
            caml_call1(Stream[12], strm);
            return [0,keyword_or_error(zK)];
          case 1:
            caml_call1(Stream[12], strm);
            reset_buffer(0);
            store(zK);
            return ident(strm);
          default:
            caml_call1(Stream[12], strm);
            reset_buffer(0);
            store(zK);
            return ident2(strm)
          }
      }
      return 0;
    }
  }
  function maybe_comment(counter, strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        caml_call1(Stream[12], strm);
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
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zI = match[1];
        if (34 === zI) {caml_call1(Stream[12], strm);return get_string(0);}
        if (92 === zI) {
          caml_call1(Stream[12], strm);
          try {var c = escape(strm);}
          catch(zJ) {
            zJ = caml_wrap_exception(zJ);
            if (zJ === Stream[1]) {
              throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__1]
                    );
            }
            throw runtime["caml_wrap_thrown_exception_reraise"](zJ);
          }
          store(c);
          continue;
        }
        caml_call1(Stream[12], strm);
        store(zI);
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Stream[1]);
    }
  }
  function char__0(strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      var zF = match[1];
      if (92 === zF) {
        caml_call1(Stream[12], strm);
        try {var zG = escape(strm);return zG;}
        catch(zH) {
          zH = caml_wrap_exception(zH);
          if (zH === Stream[1]) {
            throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__2]);
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](zH);
        }
      }
      caml_call1(Stream[12], strm);
      return zF;
    }
    throw runtime["caml_wrap_thrown_exception"](Stream[1]);
  }
  function escape(strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      var zC = match[1];
      if (58 <= zC) {
        var switcher = zC + -110 | 0;
        if (! (6 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              caml_call1(Stream[12], strm);
              return 10;
            case 4:
              caml_call1(Stream[12], strm);
              return 13;
            case 6:
              caml_call1(Stream[12], strm);
              return 9
            }
        }
      }
      else if (48 <= zC) {
        caml_call1(Stream[12], strm);
        var match__0 = caml_call1(Stream[11], strm);
        if (match__0) {
          var zD = match__0[1];
          var switcher__0 = zD + -48 | 0;
          if (! (9 < switcher__0 >>> 0)) {
            caml_call1(Stream[12], strm);
            var match__1 = caml_call1(Stream[11], strm);
            if (match__1) {
              var zE = match__1[1];
              var switcher__1 = zE + -48 | 0;
              if (! (9 < switcher__1 >>> 0)) {
                caml_call1(Stream[12], strm);
                return caml_call1(
                  Char[1],
                  (((zC + -48 | 0) * 100 | 0) + ((zD + -48 | 0) * 10 | 0) | 0) + (zE + -48 | 0) | 0
                );
              }
            }
            throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__4]);
          }
        }
        throw runtime["caml_wrap_thrown_exception"]([0,Stream[2],cst__3]);
      }
      caml_call1(Stream[12], strm);
      return zC;
    }
    throw runtime["caml_wrap_thrown_exception"](Stream[1]);
  }
  function comment__0(counter, strm) {
    for (; ; ) {
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var switcher = match[1] + -40 | 0;
        if (! (2 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              caml_call1(Stream[12], strm);
              if (counter < 50) {
                var counter__1 = counter + 1 | 0;
                return maybe_nested_comment(counter__1, strm);
              }
              return caml_trampoline_return(maybe_nested_comment, [0,strm]);
            case 1:break;
            default:
              caml_call1(Stream[12], strm);
              if (counter < 50) {
                var counter__0 = counter + 1 | 0;
                return maybe_end_comment(counter__0, strm);
              }
              return caml_trampoline_return(maybe_end_comment, [0,strm])
            }
        }
        caml_call1(Stream[12], strm);
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Stream[1]);
    }
  }
  function maybe_nested_comment(counter, strm) {
    var match = caml_call1(Stream[11], strm);
    if (match) {
      if (42 === match[1]) {
        caml_call1(Stream[12], strm);
        comment(strm);
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return comment__0(counter__1, strm);
        }
        return caml_trampoline_return(comment__0, [0,strm]);
      }
      caml_call1(Stream[12], strm);
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
      var match = caml_call1(Stream[11], strm);
      if (match) {
        var zB = match[1];
        if (41 === zB) {caml_call1(Stream[12], strm);return 0;}
        if (42 === zB) {caml_call1(Stream[12], strm);continue;}
        caml_call1(Stream[12], strm);
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
    function zA(count) {return next_token(input);}
    return caml_call1(Stream[3], zA);
  };
}

var Genlex = [0,make_lexer];

runtime["caml_register_global"](15, Genlex, "Genlex");


module.exports = global.jsoo_runtime.caml_get_global_data().Genlex;