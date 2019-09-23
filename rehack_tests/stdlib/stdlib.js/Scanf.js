/**
 * Scanf
 * @providesModule Scanf
 */
"use strict";
var Buffer = require('Buffer.js');
var Bytes = require('Bytes.js');
var CamlinternalFormat = require('CamlinternalFormat.js');
var CamlinternalFormatBasics = require('CamlinternalFormatBasics.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var String_ = require('String_.js');
var Invalid_argument = require('Invalid_argument.js');
var Failure = require('Failure.js');
var Not_found = require('Not_found.js');
var End_of_file = require('End_of_file.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_bytes_get = runtime["caml_bytes_get"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
var caml_string_notequal = runtime["caml_string_notequal"];
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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_end_of_input_not_found = string("end of input not found");
var cst_scanf_bad_conversion_a = string('scanf: bad conversion "%a"');
var cst_scanf_bad_conversion_t = string('scanf: bad conversion "%t"');
var cst_scanf_missing_reader = string("scanf: missing reader");
var cst_scanf_bad_conversion_custom_converter = string(
  'scanf: bad conversion "%?" (custom converter)'
);
var cst_scanf_bad_conversion = string('scanf: bad conversion "%*"');
var cst_scanf_bad_conversion__1 = string('scanf: bad conversion "%*"');
var cst_scanf_bad_conversion__0 = string('scanf: bad conversion "%-"');
var cst_scanf_bad_conversion__2 = string('scanf: bad conversion "%*"');
var cst__2 = string('"');
var cst__3 = string('"');
var cst__1 = string('"');
var cst_in_format = string(' in format "');
var cst_an = string("an");
var cst_x = string("x");
var cst_nfinity = string("nfinity");
var cst_digits = string("digits");
var cst_decimal_digits = string("decimal digits");
var cst_0b = string("0b");
var cst_0o = string("0o");
var cst_0u = string("0u");
var cst_0x = string("0x");
var cst_false = string("false");
var cst_true = string("true");
var cst_not_a_valid_float_in_hexadecimal_notation = string(
  "not a valid float in hexadecimal notation"
);
var cst_no_dot_or_exponent_part_found_in_float_token = string(
  "no dot or exponent part found in float token"
);
var cst__0 = string("-");
var cst_unnamed_function = string("unnamed function");
var cst_unnamed_character_string = string("unnamed character string");
var cst_unnamed_Pervasives_input_channel = string(
  "unnamed Pervasives input channel"
);
var cst = string("-");
var cst_Scanf_Scan_failure = string("Scanf.Scan_failure");
var cst_binary = string("binary");
var cst_octal = string("octal");
var cst_hexadecimal = string("hexadecimal");
var cst_a_Char = string("a Char");
var cst_a_String = string("a String");
var CamlinternalFormat = global_data["CamlinternalFormat"];
var CamlinternalFormatBasics = global_data["CamlinternalFormatBasics"];
var String = global_data["String_"];
var Failure = global_data["Failure"];
var Pervasives = global_data["Pervasives"];
var Assert_failure = global_data["Assert_failure"];
var Buffer = global_data["Buffer"];
var End_of_file = global_data["End_of_file"];
var Invalid_argument = global_data["Invalid_argument"];
var Printf = global_data["Printf"];
var List = global_data["List_"];
var Not_found = global_data["Not_found"];
var r = [0,91];
var q = [0,123];
var s = [0,string("scanf.ml"),1455,13];
var t = [0,[3,0,[10,0]],string("%S%!")];
var p = [0,37,string("")];
var o = [
  0,
  [
    11,
    string("scanf: bad input at char number "),
    [4,3,0,0,[11,string(": "),[2,0,0]]]
  ],
  string("scanf: bad input at char number %i: %s")
];
var n = [
  0,
  [11,string("the character "),[1,[11,string(" cannot start a boolean"),0]]],
  string("the character %C cannot start a boolean")
];
var m = [
  0,
  [11,string("bad character hexadecimal encoding \\"),[0,[0,0]]],
  string("bad character hexadecimal encoding \\%c%c")
];
var l = [
  0,
  [11,string("bad character decimal encoding \\"),[0,[0,[0,0]]]],
  string("bad character decimal encoding \\%c%c%c")
];
var k = [
  0,
  [
    11,
    string("character "),
    [1,[11,string(" is not a valid "),[2,0,[11,string(" digit"),0]]]]
  ],
  string("character %C is not a valid %s digit")
];
var j = [
  0,
  [11,string("character "),[1,[11,string(" is not a decimal digit"),0]]],
  string("character %C is not a decimal digit")
];
var i = [0,string("scanf.ml"),555,9];
var h = [
  0,
  [11,string("invalid boolean '"),[2,0,[12,39,0]]],
  string("invalid boolean '%s'")
];
var g = [
  0,
  [11,string("looking for "),[1,[11,string(", found "),[1,0]]]],
  string("looking for %C, found %C")
];
var f = [
  0,
  [
    11,
    string("scanning of "),
    [
      2,
      0,
      [
        11,
        string(" failed: premature end of file occurred before end of token"),
        0
      ]
    ]
  ],
  string(
    "scanning of %s failed: premature end of file occurred before end of token"
  )
];
var e = [
  0,
  [
    11,
    string("scanning of "),
    [
      2,
      0,
      [11,string(" failed: the specified length was too short for token"),0]
    ]
  ],
  string("scanning of %s failed: the specified length was too short for token"
  )
];
var d = [
  0,
  [11,string("illegal escape character "),[1,0]],
  string("illegal escape character %C")
];
var null_char = 0;

function next_char(ib) {
  try {
    var c = call1(ib[7], 0);
    ib[2] = c;
    ib[3] = 1;
    ib[4] = ib[4] + 1 | 0;
    if (10 === c) {ib[5] = ib[5] + 1 | 0;}
    return c;
  }
  catch(bH) {
    bH = caml_wrap_exception(bH);
    if (bH === End_of_file) {
      ib[2] = null_char;
      ib[3] = 0;
      ib[1] = 1;
      return null_char;
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](bH);
  }
}

function peek_char(ib) {return ib[3] ? ib[2] : next_char(ib);}

function checked_peek_char(ib) {
  var c = peek_char(ib);
  if (ib[1]) {throw runtime["caml_wrap_thrown_exception"](End_of_file);}
  return c;
}

function end_of_input(ib) {peek_char(ib);return ib[1];}

function eof(ib) {return ib[1];}

function beginning_of_input(ib) {return 0 === ib[4] ? 1 : 0;}

function name_of_input(ib) {
  var bG = ib[9];
  if (typeof bG === "number") return 0 === bG ?
    cst_unnamed_function :
    cst_unnamed_character_string;
  else {
    if (0 === bG[0]) {return cst_unnamed_Pervasives_input_channel;}
    var fname = bG[1];
    return fname;
  }
}

function char_count(ib) {return ib[3] ? ib[4] + -1 | 0 : ib[4];}

function line_count(ib) {return ib[5];}

function reset_token(ib) {return call1(Buffer[9], ib[8]);}

function invalidate_current_char(ib) {ib[3] = 0;return 0;}

function token_string(ib) {
  var token_buffer = ib[8];
  var tok = call1(Buffer[2], token_buffer);
  call1(Buffer[8], token_buffer);
  ib[6] = ib[6] + 1 | 0;
  return tok;
}

function token_count(ib) {return ib[6];}

function skip_char(width, ib) {invalidate_current_char(ib);return width;}

function ignore_char(width, ib) {return skip_char(width + -1 | 0, ib);}

function store_char(width, ib, c) {
  call2(Buffer[10], ib[8], c);
  return ignore_char(width, ib);
}

var default_token_buffer_size = 1024;

function create(iname, next) {
  return [
    0,
    0,
    null_char,
    0,
    0,
    0,
    0,
    next,
    call1(Buffer[1], default_token_buffer_size),
    iname
  ];
}

function from_string(s) {
  var i = [0,0];
  var len = caml_ml_string_length(s);
  function next(param) {
    if (len <= i[1]) {
      throw runtime["caml_wrap_thrown_exception"](End_of_file);
    }
    var c = caml_string_get(s, i[1]);
    i[1] += 1;
    return c;
  }
  return create(1, next);
}

var a = 0;

function from_function(bF) {return create(a, bF);}

var len = 1024;

function scan_close_at_end(ic) {
  call1(Pervasives[81], ic);
  throw runtime["caml_wrap_thrown_exception"](End_of_file);
}

function scan_raise_at_end(ic) {
  throw runtime["caml_wrap_thrown_exception"](End_of_file);
}

function from_ic(scan_close_ic, iname, ic) {
  var buf = runtime["caml_create_bytes"](1024);
  var i = [0,0];
  var lim = [0,0];
  var eof = [0,0];
  function next(param) {
    if (i[1] < lim[1]) {var c = caml_bytes_get(buf, i[1]);i[1] += 1;return c;}
    if (eof[1]) {throw runtime["caml_wrap_thrown_exception"](End_of_file);}
    lim[1] = call4(Pervasives[72], ic, buf, 0, len);
    if (0 === lim[1]) {eof[1] = 1;return call1(scan_close_ic, ic);}
    i[1] = 1;
    return caml_bytes_get(buf, 0);
  }
  return create(iname, next);
}

function from_ic_close_at_end(bD, bE) {
  return from_ic(scan_close_at_end, bD, bE);
}

function from_ic_raise_at_end(bB, bC) {
  return from_ic(scan_raise_at_end, bB, bC);
}

var stdin = from_ic(scan_raise_at_end, [1,cst,Pervasives[26]], Pervasives[26]);

function open_in_file(open_in, fname) {
  if (caml_string_notequal(fname, cst__0)) {
    var ic = call1(open_in, fname);
    return from_ic_close_at_end([1,fname,ic], ic);
  }
  return stdin;
}

var b = Pervasives[67];

function open_in(bA) {return open_in_file(b, bA);}

var c = Pervasives[68];

function open_in_bin(bz) {return open_in_file(c, bz);}

function from_channel(ic) {return from_ic_raise_at_end([0,ic], ic);}

function close_in(ib) {
  var by = ib[9];
  if (typeof by === "number") return 0;
  else {
    if (0 === by[0]) {var ic = by[1];return call1(Pervasives[81], ic);}
    var ic__0 = by[2];
    return call1(Pervasives[81], ic__0);
  }
}

var memo = [0,0];

function memo_from_ic(scan_close_ic, ic) {
  try {var bw = call2(List[40], ic, memo[1]);return bw;}
  catch(bx) {
    bx = caml_wrap_exception(bx);
    if (bx === Not_found) {
      var ib = from_ic(scan_close_ic, [0,ic], ic);
      memo[1] = [0,[0,ic,ib],memo[1]];
      return ib;
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](bx);
  }
}

function memo_from_channel(bv) {return memo_from_ic(scan_raise_at_end, bv);}

var Scan_failure = [248,cst_Scanf_Scan_failure,runtime["caml_fresh_oo_id"](0)];

function bad_input(s) {
  throw runtime["caml_wrap_thrown_exception"]([0,Scan_failure,s]);
}

function bad_input_escape(c) {return bad_input(call2(Printf[4], d, c));}

function bad_token_length(message) {
  return bad_input(call2(Printf[4], e, message));
}

function bad_end_of_input(message) {
  return bad_input(call2(Printf[4], f, message));
}

function bad_float(param) {
  return bad_input(cst_no_dot_or_exponent_part_found_in_float_token);
}

function bad_hex_float(param) {
  return bad_input(cst_not_a_valid_float_in_hexadecimal_notation);
}

function character_mismatch_err(c, ci) {return call3(Printf[4], g, c, ci);}

function character_mismatch(c, ci) {
  return bad_input(character_mismatch_err(c, ci));
}

function skip_whites(ib) {
  for (; ; ) {
    var c = peek_char(ib);
    var bt = 1 - eof(ib);
    if (bt) {
      var bu = c + -9 | 0;
      var switch__0 = 4 < bu >>> 0 ?
        23 === bu ? 1 : 0 :
        1 < (bu + -2 | 0) >>> 0 ? 1 : 0;
      if (switch__0) {invalidate_current_char(ib);continue;}
      return 0;
    }
    return bt;
  }
}

function check_this_char(ib, c) {
  var ci = checked_peek_char(ib);
  return ci === c ? invalidate_current_char(ib) : character_mismatch(c, ci);
}

function check_newline(ib) {
  var ci = checked_peek_char(ib);
  if (10 === ci) {return invalidate_current_char(ib);}
  if (13 === ci) {invalidate_current_char(ib);return check_this_char(ib, 10);}
  return character_mismatch(10, ci);
}

function check_char(ib, c) {
  return 10 === c ?
    check_newline(ib) :
    32 === c ? skip_whites(ib) : check_this_char(ib, c);
}

function token_char(ib) {return caml_string_get(token_string(ib), 0);}

function token_bool(ib) {
  var s = token_string(ib);
  return caml_string_notequal(s, cst_false) ?
    caml_string_notequal(s, cst_true) ? bad_input(call2(Printf[4], h, s)) : 1 :
    0;
}

function integer_conversion_of_char(param) {
  var switcher = param + -88 | 0;
  if (! (32 < switcher >>> 0)) {
    switch (switcher) {
      case 10:
        return 0;
      case 12:
        return 1;
      case 17:
        return 2;
      case 23:
        return 3;
      case 29:
        return 4;
      case 0:
      case 32:return 5
      }
  }
  throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,i]);
}

function token_int_literal(conv, ib) {
  switch (conv) {
    case 0:
      var bp = token_string(ib);
      var tok = call2(Pervasives[16], cst_0b, bp);
      break;
    case 3:
      var bq = token_string(ib);
      var tok = call2(Pervasives[16], cst_0o, bq);
      break;
    case 4:
      var br = token_string(ib);
      var tok = call2(Pervasives[16], cst_0u, br);
      break;
    case 5:
      var bs = token_string(ib);
      var tok = call2(Pervasives[16], cst_0x, bs);
      break;
    default:
      var tok = token_string(ib)
    }
  var l = caml_ml_string_length(tok);
  if (0 !== l) {
    if (43 === caml_string_get(tok, 0)) {
      return call3(String[4], tok, 1, l + -1 | 0);
    }
  }
  return tok;
}

function token_int(conv, ib) {
  return caml_int_of_string(token_int_literal(conv, ib));
}

function token_float(ib) {
  return runtime["caml_float_of_string"](token_string(ib));
}

function token_nativeint(conv, ib) {
  return caml_int_of_string(token_int_literal(conv, ib));
}

function token_int32(conv, ib) {
  return caml_int_of_string(token_int_literal(conv, ib));
}

function token_int64(conv, ib) {
  return runtime["caml_int64_of_string"](token_int_literal(conv, ib));
}

function scan_decimal_digit_star(width, ib) {
  var width__0 = width;
  for (; ; ) {
    if (0 === width__0) {return width__0;}
    var c = peek_char(ib);
    if (eof(ib)) {return width__0;}
    if (58 <= c) {
      if (95 === c) {
        var width__1 = ignore_char(width__0, ib);
        var width__0 = width__1;
        continue;
      }
    }
    else if (48 <= c) {
      var width__2 = store_char(width__0, ib, c);
      var width__0 = width__2;
      continue;
    }
    return width__0;
  }
}

function scan_decimal_digit_plus(width, ib) {
  if (0 === width) {return bad_token_length(cst_decimal_digits);}
  var c = checked_peek_char(ib);
  var switcher = c + -48 | 0;
  if (9 < switcher >>> 0) {return bad_input(call2(Printf[4], j, c));}
  var width__0 = store_char(width, ib, c);
  return scan_decimal_digit_star(width__0, ib);
}

function scan_digit_star(digitp, width, ib) {
  function scan_digits(width, ib) {
    var width__0 = width;
    for (; ; ) {
      if (0 === width__0) {return width__0;}
      var c = peek_char(ib);
      if (eof(ib)) {return width__0;}
      if (call1(digitp, c)) {
        var width__1 = store_char(width__0, ib, c);
        var width__0 = width__1;
        continue;
      }
      if (95 === c) {
        var width__2 = ignore_char(width__0, ib);
        var width__0 = width__2;
        continue;
      }
      return width__0;
    }
  }
  return scan_digits(width, ib);
}

function scan_digit_plus(basis, digitp, width, ib) {
  if (0 === width) {return bad_token_length(cst_digits);}
  var c = checked_peek_char(ib);
  if (call1(digitp, c)) {
    var width__0 = store_char(width, ib, c);
    return scan_digit_star(digitp, width__0, ib);
  }
  return bad_input(call3(Printf[4], k, c, basis));
}

function is_binary_digit(param) {
  var switcher = param + -48 | 0;
  return 1 < switcher >>> 0 ? 0 : 1;
}

function scan_binary_int(bn, bo) {
  return scan_digit_plus(cst_binary, is_binary_digit, bn, bo);
}

function is_octal_digit(param) {
  var switcher = param + -48 | 0;
  return 7 < switcher >>> 0 ? 0 : 1;
}

function scan_octal_int(bl, bm) {
  return scan_digit_plus(cst_octal, is_octal_digit, bl, bm);
}

function is_hexa_digit(param) {
  var bk = param + -48 | 0;
  var switch__0 = 22 < bk >>> 0 ?
    5 < (bk + -49 | 0) >>> 0 ? 0 : 1 :
    6 < (bk + -10 | 0) >>> 0 ? 1 : 0;
  return switch__0 ? 1 : 0;
}

function scan_hexadecimal_int(bi, bj) {
  return scan_digit_plus(cst_hexadecimal, is_hexa_digit, bi, bj);
}

function scan_sign(width, ib) {
  var c = checked_peek_char(ib);
  var switcher = c + -43 | 0;
  if (! (2 < switcher >>> 0)) {
    switch (switcher) {
      case 0:
        return store_char(width, ib, c);
      case 1:break;
      default:
        return store_char(width, ib, c)
      }
  }
  return width;
}

function scan_optionally_signed_decimal_int(width, ib) {
  var width__0 = scan_sign(width, ib);
  return scan_decimal_digit_plus(width__0, ib);
}

function scan_unsigned_int(width, ib) {
  var c = checked_peek_char(ib);
  if (48 === c) {
    var width__0 = store_char(width, ib, c);
    if (0 === width__0) {return width__0;}
    var c__0 = peek_char(ib);
    if (eof(ib)) {return width__0;}
    if (99 <= c__0) {
      if (111 === c__0) {
        return scan_octal_int(store_char(width__0, ib, c__0), ib);
      }
      var switch__0 = 120 === c__0 ? 1 : 0;
    }
    else if (88 === c__0) var switch__0 = 1;
    else {
      if (98 <= c__0) {
        return scan_binary_int(store_char(width__0, ib, c__0), ib);
      }
      var switch__0 = 0;
    }
    return switch__0 ?
      scan_hexadecimal_int(store_char(width__0, ib, c__0), ib) :
      scan_decimal_digit_star(width__0, ib);
  }
  return scan_decimal_digit_plus(width, ib);
}

function scan_optionally_signed_int(width, ib) {
  var width__0 = scan_sign(width, ib);
  return scan_unsigned_int(width__0, ib);
}

function scan_int_conversion(conv, width, ib) {
  switch (conv) {
    case 0:
      return scan_binary_int(width, ib);
    case 1:
      return scan_optionally_signed_decimal_int(width, ib);
    case 2:
      return scan_optionally_signed_int(width, ib);
    case 3:
      return scan_octal_int(width, ib);
    case 4:
      return scan_decimal_digit_plus(width, ib);
    default:
      return scan_hexadecimal_int(width, ib)
    }
}

function scan_fractional_part(width, ib) {
  if (0 === width) {return width;}
  var c = peek_char(ib);
  if (eof(ib)) {return width;}
  var switcher = c + -48 | 0;
  return 9 < switcher >>> 0 ?
    width :
    scan_decimal_digit_star(store_char(width, ib, c), ib);
}

function scan_exponent_part(width, ib) {
  if (0 === width) {return width;}
  var c = peek_char(ib);
  if (eof(ib)) {return width;}
  if (69 !== c) {if (101 !== c) {return width;}}
  return scan_optionally_signed_decimal_int(store_char(width, ib, c), ib);
}

function scan_integer_part(width, ib) {
  var width__0 = scan_sign(width, ib);
  return scan_decimal_digit_star(width__0, ib);
}

function scan_float(width, precision, ib) {
  var width__0 = scan_integer_part(width, ib);
  if (0 === width__0) {return [0,width__0,precision];}
  var c = peek_char(ib);
  if (eof(ib)) {return [0,width__0,precision];}
  if (46 === c) {
    var width__1 = store_char(width__0, ib, c);
    var precision__0 = call2(Pervasives[4], width__1, precision);
    var width__2 = width__1 -
      (precision__0 - scan_fractional_part(precision__0, ib) | 0) | 0;
    return [0,scan_exponent_part(width__2, ib),precision__0];
  }
  return [0,scan_exponent_part(width__0, ib),precision];
}

function check_case_insensitive_string(width, ib, error, str) {
  function lowercase(c) {
    var switcher = c + -65 | 0;
    return 25 < switcher >>> 0 ?
      c :
      call1(Pervasives[17], (c - 65 | 0) + 97 | 0);
  }
  var len = caml_ml_string_length(str);
  var width__0 = [0,width];
  var bf = len + -1 | 0;
  var be = 0;
  if (! (bf < 0)) {
    var i = be;
    for (; ; ) {
      var c = peek_char(ib);
      var bg = lowercase(caml_string_get(str, i));
      if (lowercase(c) !== bg) {call1(error, 0);}
      if (0 === width__0[1]) {call1(error, 0);}
      width__0[1] = store_char(width__0[1], ib, c);
      var bh = i + 1 | 0;
      if (bf !== i) {var i = bh;continue;}
      break;
    }
  }
  return width__0[1];
}

function scan_hex_float(width, precision, ib) {
  var a2 = 0 === width ? 1 : 0;
  var a3 = a2 ? a2 : end_of_input(ib);
  if (a3) {bad_hex_float(0);}
  var width__0 = scan_sign(width, ib);
  var a4 = 0 === width__0 ? 1 : 0;
  var a5 = a4 ? a4 : end_of_input(ib);
  if (a5) {bad_hex_float(0);}
  var c = peek_char(ib);
  if (78 <= c) {
    var switcher = c + -79 | 0;
    if (30 < switcher >>> 0) {
      if (! (32 <= switcher)) {
        var width__1 = store_char(width__0, ib, c);
        var a6 = 0 === width__1 ? 1 : 0;
        var a7 = a6 ? a6 : end_of_input(ib);
        if (a7) {bad_hex_float(0);}
        return check_case_insensitive_string(
          width__1,
          ib,
          bad_hex_float,
          cst_an
        );
      }
      var switch__0 = 0;
    }
    else var switch__0 = 26 === switcher ? 1 : 0;
  }
  else {
    if (48 === c) {
      var width__3 = store_char(width__0, ib, c);
      var a_ = 0 === width__3 ? 1 : 0;
      var ba = a_ ? a_ : end_of_input(ib);
      if (ba) {bad_hex_float(0);}
      var width__4 = check_case_insensitive_string(
        width__3,
        ib,
        bad_hex_float,
        cst_x
      );
      if (0 !== width__4) {
        if (! end_of_input(ib)) {
          var match = peek_char(ib);
          var bb = match + -46 | 0;
          var switch__1 = 34 < bb >>> 0 ?
            66 === bb ? 1 : 0 :
            32 < (bb + -1 | 0) >>> 0 ? 1 : 0;
          var width__5 = switch__1 ?
            width__4 :
            scan_hexadecimal_int(width__4, ib);
          if (0 !== width__5) {
            if (! end_of_input(ib)) {
              var c__0 = peek_char(ib);
              if (46 === c__0) {
                var width__6 = store_char(width__5, ib, c__0);
                if (0 === width__6) var switch__2 = 0;
                else if (end_of_input(ib)) var switch__2 = 0;
                else {
                  var match__0 = peek_char(ib);
                  if (80 === match__0) var switch__3 = 0;
                  else if (112 === match__0) var switch__3 = 0;
                  else {
                    var precision__0 = call2(Pervasives[4], width__6, precision);
                    var width__10 = width__6 -
                      (precision__0 - scan_hexadecimal_int(precision__0, ib) | 0) | 0;
                    var switch__3 = 1;
                  }
                  if (! switch__3) {var width__10 = width__6;}
                  var width__7 = width__10;
                  var switch__2 = 1;
                }
                if (! switch__2) {var width__7 = width__6;}
                var width__8 = width__7;
              }
              else var width__8 = width__5;
              if (0 !== width__8) {
                if (! end_of_input(ib)) {
                  var c__1 = peek_char(ib);
                  if (80 !== c__1) {if (112 !== c__1) {return width__8;}}
                  var width__9 = store_char(width__8, ib, c__1);
                  var bc = 0 === width__9 ? 1 : 0;
                  var bd = bc ? bc : end_of_input(ib);
                  if (bd) {bad_hex_float(0);}
                  return scan_optionally_signed_decimal_int(width__9, ib);
                }
              }
              return width__8;
            }
          }
          return width__5;
        }
      }
      return width__4;
    }
    var switch__0 = 73 === c ? 1 : 0;
  }
  if (switch__0) {
    var width__2 = store_char(width__0, ib, c);
    var a8 = 0 === width__2 ? 1 : 0;
    var a9 = a8 ? a8 : end_of_input(ib);
    if (a9) {bad_hex_float(0);}
    return check_case_insensitive_string(
      width__2,
      ib,
      bad_hex_float,
      cst_nfinity
    );
  }
  return bad_hex_float(0);
}

function scan_caml_float_rest(width, precision, ib) {
  var aY = 0 === width ? 1 : 0;
  var aZ = aY ? aY : end_of_input(ib);
  if (aZ) {bad_float(0);}
  var width__0 = scan_decimal_digit_star(width, ib);
  var a0 = 0 === width__0 ? 1 : 0;
  var a1 = a0 ? a0 : end_of_input(ib);
  if (a1) {bad_float(0);}
  var c = peek_char(ib);
  var switcher = c + -69 | 0;
  if (32 < switcher >>> 0) {
    if (-23 === switcher) {
      var width__1 = store_char(width__0, ib, c);
      var precision__0 = call2(Pervasives[4], width__1, precision);
      var width_precision = scan_fractional_part(precision__0, ib);
      var frac_width = precision__0 - width_precision | 0;
      var width__2 = width__1 - frac_width | 0;
      return scan_exponent_part(width__2, ib);
    }
  }
  else {
    var switcher__0 = switcher + -1 | 0;
    if (30 < switcher__0 >>> 0) {return scan_exponent_part(width__0, ib);}
  }
  return bad_float(0);
}

function scan_caml_float(width, precision, ib) {
  var aK = 0 === width ? 1 : 0;
  var aL = aK ? aK : end_of_input(ib);
  if (aL) {bad_float(0);}
  var width__0 = scan_sign(width, ib);
  var aM = 0 === width__0 ? 1 : 0;
  var aN = aM ? aM : end_of_input(ib);
  if (aN) {bad_float(0);}
  var c = peek_char(ib);
  if (49 <= c) {
    if (! (58 <= c)) {
      var width__1 = store_char(width__0, ib, c);
      var aO = 0 === width__1 ? 1 : 0;
      var aP = aO ? aO : end_of_input(ib);
      if (aP) {bad_float(0);}
      return scan_caml_float_rest(width__1, precision, ib);
    }
  }
  else if (48 <= c) {
    var width__2 = store_char(width__0, ib, c);
    var aQ = 0 === width__2 ? 1 : 0;
    var aR = aQ ? aQ : end_of_input(ib);
    if (aR) {bad_float(0);}
    var c__0 = peek_char(ib);
    if (88 !== c__0) {
      if (120 !== c__0) {
        return scan_caml_float_rest(width__2, precision, ib);
      }
    }
    var width__3 = store_char(width__2, ib, c__0);
    var aS = 0 === width__3 ? 1 : 0;
    var aT = aS ? aS : end_of_input(ib);
    if (aT) {bad_float(0);}
    var width__4 = scan_hexadecimal_int(width__3, ib);
    var aU = 0 === width__4 ? 1 : 0;
    var aV = aU ? aU : end_of_input(ib);
    if (aV) {bad_float(0);}
    var c__1 = peek_char(ib);
    var switcher = c__1 + -80 | 0;
    if (32 < switcher >>> 0) if (-34 === switcher) {
      var width__5 = store_char(width__4, ib, c__1);
      if (0 === width__5) var switch__1 = 0;
      else if (end_of_input(ib)) var switch__1 = 0;
      else {
        var match = peek_char(ib);
        if (80 === match) var switch__2 = 0;
        else if (112 === match) var switch__2 = 0;
        else {
          var precision__0 = call2(Pervasives[4], width__5, precision);
          var width__10 = width__5 -
            (precision__0 - scan_hexadecimal_int(precision__0, ib) | 0) | 0;
          var switch__2 = 1;
        }
        if (! switch__2) {var width__10 = width__5;}
        var width__6 = width__10;
        var switch__1 = 1;
      }
      if (! switch__1) {var width__6 = width__5;}
      var width__7 = width__6;
      var switch__0 = 0;
    }
    else var switch__0 = 1;
    else {
      var switcher__0 = switcher + -1 | 0;
      if (30 < switcher__0 >>> 0) {
        var width__7 = width__4;
        var switch__0 = 0;
      }
      else var switch__0 = 1;
    }
    var width__8 = switch__0 ? bad_float(0) : width__7;
    if (0 !== width__8) {
      if (! end_of_input(ib)) {
        var c__2 = peek_char(ib);
        if (80 !== c__2) {if (112 !== c__2) {return width__8;}}
        var width__9 = store_char(width__8, ib, c__2);
        var aW = 0 === width__9 ? 1 : 0;
        var aX = aW ? aW : end_of_input(ib);
        if (aX) {bad_hex_float(0);}
        return scan_optionally_signed_decimal_int(width__9, ib);
      }
    }
    return width__8;
  }
  return bad_float(0);
}

function scan_string(stp, width, ib) {
  function loop(width) {
    var width__0 = width;
    for (; ; ) {
      if (0 === width__0) {return width__0;}
      var c = peek_char(ib);
      if (eof(ib)) {return width__0;}
      if (stp) {
        var c__0 = stp[1];
        if (c === c__0) {return skip_char(width__0, ib);}
        var width__1 = store_char(width__0, ib, c);
        var width__0 = width__1;
        continue;
      }
      var aJ = c + -9 | 0;
      var switch__0 = 4 < aJ >>> 0 ?
        23 === aJ ? 1 : 0 :
        1 < (aJ + -2 | 0) >>> 0 ? 1 : 0;
      if (switch__0) {return width__0;}
      var width__2 = store_char(width__0, ib, c);
      var width__0 = width__2;
      continue;
    }
  }
  return loop(width);
}

function scan_char(width, ib) {
  return store_char(width, ib, checked_peek_char(ib));
}

function char_for_backslash(c) {
  if (110 <= c) {
    if (! (117 <= c)) {
      var switcher = c + -110 | 0;
      switch (switcher) {case 0:return 10;case 4:return 13;case 6:return 9}
    }
  }
  else if (98 === c) {return 8;}
  return c;
}

function decimal_value_of_char(c) {return c - 48 | 0;}

function char_for_decimal_code(c0, c1, c2) {
  var aH = decimal_value_of_char(c2);
  var aI = 10 * decimal_value_of_char(c1) | 0;
  var c = ((100 * decimal_value_of_char(c0) | 0) + aI | 0) + aH | 0;
  if (0 <= c) {if (! (255 < c)) {return call1(Pervasives[17], c);}}
  return bad_input(call4(Printf[4], l, c0, c1, c2));
}

function hexadecimal_value_of_char(d) {
  return 97 <= d ? d + -87 | 0 : 65 <= d ? d + -55 | 0 : d - 48 | 0;
}

function char_for_hexadecimal_code(c1, c2) {
  var aG = hexadecimal_value_of_char(c2);
  var c = (16 * hexadecimal_value_of_char(c1) | 0) + aG | 0;
  if (0 <= c) {if (! (255 < c)) {return call1(Pervasives[17], c);}}
  return bad_input(call3(Printf[4], m, c1, c2));
}

function check_next_char(message, width, ib) {
  if (0 === width) {return bad_token_length(message);}
  var c = peek_char(ib);
  return eof(ib) ? bad_end_of_input(message) : c;
}

function check_next_char_for_char(aE, aF) {
  return check_next_char(cst_a_Char, aE, aF);
}

function check_next_char_for_string(aC, aD) {
  return check_next_char(cst_a_String, aC, aD);
}

function scan_backslash_char(width, ib) {
  var c = check_next_char_for_char(width, ib);
  if (40 <= c) if (58 <= c) {
    var switcher = c + -92 | 0;
    if (28 < switcher >>> 0) var switch__0 = 0;
    else switch (switcher) {
      case 28:
        var get_digit = function(param) {
          var c = next_char(ib);
          var aB = c + -48 | 0;
          var switch__0 = 22 < aB >>> 0 ?
            5 < (aB + -49 | 0) >>> 0 ? 0 : 1 :
            6 < (aB + -10 | 0) >>> 0 ? 1 : 0;
          return switch__0 ? c : bad_input_escape(c);
        };
        var c1 = get_digit(0);
        var c2 = get_digit(0);
        return store_char(
          width + -2 | 0,
          ib,
          char_for_hexadecimal_code(c1, c2)
        );
      case 0:
      case 6:
      case 18:
      case 22:
      case 24:
        var switch__0 = 1;
        break;
      default:
        var switch__0 = 0
      }
  }
  else {
    if (48 <= c) {
      var get_digit__0 = function(param) {
        var c = next_char(ib);
        var switcher = c + -48 | 0;
        return 9 < switcher >>> 0 ? bad_input_escape(c) : c;
      };
      var c1__0 = get_digit__0(0);
      var c2__0 = get_digit__0(0);
      return store_char(
        width + -2 | 0,
        ib,
        char_for_decimal_code(c, c1__0, c2__0)
      );
    }
    var switch__0 = 0;
  }
  else var switch__0 = 34 === c ? 1 : 39 <= c ? 1 : 0;
  return switch__0 ?
    store_char(width, ib, char_for_backslash(c)) :
    bad_input_escape(c);
}

function scan_caml_char(width, ib) {
  function find_stop(width) {
    var c = check_next_char_for_char(width, ib);
    return 39 === c ? ignore_char(width, ib) : character_mismatch(39, c);
  }
  function find_char(width) {
    var c = check_next_char_for_char(width, ib);
    return 92 === c ?
      find_stop(scan_backslash_char(ignore_char(width, ib), ib)) :
      find_stop(store_char(width, ib, c));
  }
  function find_start(width) {
    var c = checked_peek_char(ib);
    return 39 === c ?
      find_char(ignore_char(width, ib)) :
      character_mismatch(39, c);
  }
  return find_start(width);
}

function scan_caml_string(width, ib) {
  function find_stop__0(counter, width) {
    var width__0 = width;
    for (; ; ) {
      var c = check_next_char_for_string(width__0, ib);
      if (34 === c) {return ignore_char(width__0, ib);}
      if (92 === c) {
        var aA = ignore_char(width__0, ib);
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return scan_backslash(counter__0, aA);
        }
        return caml_trampoline_return(scan_backslash, [0,aA]);
      }
      var width__1 = store_char(width__0, ib, c);
      var width__0 = width__1;
      continue;
    }
  }
  function scan_backslash(counter, width) {
    var match = check_next_char_for_string(width, ib);
    if (10 === match) {
      var ax = ignore_char(width, ib);
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return skip_spaces(counter__0, ax);
      }
      return caml_trampoline_return(skip_spaces, [0,ax]);
    }
    if (13 === match) {
      var ay = ignore_char(width, ib);
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return skip_newline(counter__1, ay);
      }
      return caml_trampoline_return(skip_newline, [0,ay]);
    }
    var az = scan_backslash_char(width, ib);
    if (counter < 50) {
      var counter__2 = counter + 1 | 0;
      return find_stop__0(counter__2, az);
    }
    return caml_trampoline_return(find_stop__0, [0,az]);
  }
  function skip_newline(counter, width) {
    var match = check_next_char_for_string(width, ib);
    if (10 === match) {
      var av = ignore_char(width, ib);
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return skip_spaces(counter__0, av);
      }
      return caml_trampoline_return(skip_spaces, [0,av]);
    }
    var aw = store_char(width, ib, 13);
    if (counter < 50) {
      var counter__1 = counter + 1 | 0;
      return find_stop__0(counter__1, aw);
    }
    return caml_trampoline_return(find_stop__0, [0,aw]);
  }
  function skip_spaces(counter, width) {
    var width__0 = width;
    for (; ; ) {
      var match = check_next_char_for_string(width__0, ib);
      if (32 === match) {
        var width__1 = ignore_char(width__0, ib);
        var width__0 = width__1;
        continue;
      }
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return find_stop__0(counter__0, width__0);
      }
      return caml_trampoline_return(find_stop__0, [0,width__0]);
    }
  }
  function find_stop(width) {return caml_trampoline(find_stop__0(0, width));}
  function find_start(width) {
    var c = checked_peek_char(ib);
    return 34 === c ?
      find_stop(ignore_char(width, ib)) :
      character_mismatch(34, c);
  }
  return find_start(width);
}

function scan_bool(ib) {
  var c = checked_peek_char(ib);
  var m = 102 === c ? 5 : 116 === c ? 4 : bad_input(call2(Printf[4], n, c));
  return scan_string(0, m, ib);
}

function scan_chars_in_char_set(char_set, scan_indic, width, ib) {
  function scan_chars(i, stp) {
    var i__0 = i;
    for (; ; ) {
      var c = peek_char(ib);
      var ar = 0 < i__0 ? 1 : 0;
      if (ar) {
        var as = 1 - eof(ib);
        if (as) {
          var at = call2(CamlinternalFormat[1], char_set, c);
          var au = at ? c !== stp ? 1 : 0 : at;
        }
        else var au = as;
      }
      else var au = ar;
      if (au) {
        store_char(Pervasives[7], ib, c);
        var i__1 = i__0 + -1 | 0;
        var i__0 = i__1;
        continue;
      }
      return au;
    }
  }
  if (scan_indic) {
    var c = scan_indic[1];
    scan_chars(width, c);
    var aq = 1 - eof(ib);
    if (aq) {
      var ci = peek_char(ib);
      return c === ci ?
        invalidate_current_char(ib) :
        character_mismatch(c, ci);
    }
    return aq;
  }
  return scan_chars(width, -1);
}

function scanf_bad_input(ib, x) {
  if (x[1] === Scan_failure) var s = x[2];
  else {
    if (x[1] !== Failure) {throw runtime["caml_wrap_thrown_exception"](x);}
    var s = x[2];
  }
  var i = char_count(ib);
  return bad_input(call3(Printf[4], o, i, s));
}

function get_counter(ib, counter) {
  switch (counter) {
    case 0:
      return line_count(ib);
    case 1:
      return char_count(ib);
    default:
      return token_count(ib)
    }
}

function width_of_pad_opt(pad_opt) {
  if (pad_opt) {var width = pad_opt[1];return width;}
  return Pervasives[7];
}

function stopper_of_formatting_lit(fmting) {
  if (6 === fmting) {return p;}
  var str = call1(CamlinternalFormat[17], fmting);
  var stp = caml_string_get(str, 1);
  var sub_str = call3(String[4], str, 2, caml_ml_string_length(str) + -2 | 0);
  return [0,stp,sub_str];
}

function take_format_readers__0(counter, k, fmt) {
  var fmt__0 = fmt;
  for (; ; ) if (
    typeof fmt__0 === "number"
  ) return call1(k, 0);
  else switch (fmt__0[0]) {
    case 0:
      var fmt__1 = fmt__0[1];
      var fmt__0 = fmt__1;
      continue;
    case 1:
      var fmt__2 = fmt__0[1];
      var fmt__0 = fmt__2;
      continue;
    case 2:
      var fmt__3 = fmt__0[2];
      var fmt__0 = fmt__3;
      continue;
    case 3:
      var fmt__4 = fmt__0[2];
      var fmt__0 = fmt__4;
      continue;
    case 4:
      var fmt__5 = fmt__0[4];
      var fmt__0 = fmt__5;
      continue;
    case 5:
      var fmt__6 = fmt__0[4];
      var fmt__0 = fmt__6;
      continue;
    case 6:
      var fmt__7 = fmt__0[4];
      var fmt__0 = fmt__7;
      continue;
    case 7:
      var fmt__8 = fmt__0[4];
      var fmt__0 = fmt__8;
      continue;
    case 8:
      var fmt__9 = fmt__0[4];
      var fmt__0 = fmt__9;
      continue;
    case 9:
      var fmt__10 = fmt__0[2];
      var fmt__0 = fmt__10;
      continue;
    case 10:
      var fmt__11 = fmt__0[1];
      var fmt__0 = fmt__11;
      continue;
    case 11:
      var fmt__12 = fmt__0[2];
      var fmt__0 = fmt__12;
      continue;
    case 12:
      var fmt__13 = fmt__0[2];
      var fmt__0 = fmt__13;
      continue;
    case 13:
      var fmt__14 = fmt__0[3];
      var fmt__0 = fmt__14;
      continue;
    case 14:
      var rest = fmt__0[3];
      var fmtty = fmt__0[2];
      var an = call1(CamlinternalFormat[22], fmtty);
      var ao = call1(CamlinternalFormatBasics[2], an);
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return take_fmtty_format_readers__0(counter__1, k, ao, rest);
      }
      return caml_trampoline_return(
        take_fmtty_format_readers__0,
        [0,k,ao,rest]
      );
    case 15:
      var fmt__15 = fmt__0[1];
      var fmt__0 = fmt__15;
      continue;
    case 16:
      var fmt__16 = fmt__0[1];
      var fmt__0 = fmt__16;
      continue;
    case 17:
      var fmt__17 = fmt__0[2];
      var fmt__0 = fmt__17;
      continue;
    case 18:
      var ap = fmt__0[1];
      if (0 === ap[0]) {
        var rest__0 = fmt__0[2];
        var match = ap[1];
        var fmt__18 = match[1];
        var fmt__19 = call2(CamlinternalFormatBasics[3], fmt__18, rest__0);
        var fmt__0 = fmt__19;
        continue;
      }
      var rest__1 = fmt__0[2];
      var match__0 = ap[1];
      var fmt__20 = match__0[1];
      var fmt__21 = call2(CamlinternalFormatBasics[3], fmt__20, rest__1);
      var fmt__0 = fmt__21;
      continue;
    case 19:
      var fmt_rest = fmt__0[1];
      return function(reader) {
        function new_k(readers_rest) {
          return call1(k, [0,reader,readers_rest]);
        }
        return take_format_readers(new_k, fmt_rest);
      };
    case 20:
      var fmt__22 = fmt__0[3];
      var fmt__0 = fmt__22;
      continue;
    case 21:
      var fmt__23 = fmt__0[2];
      var fmt__0 = fmt__23;
      continue;
    case 22:
      var fmt__24 = fmt__0[1];
      var fmt__0 = fmt__24;
      continue;
    case 23:
      var rest__2 = fmt__0[2];
      var ign = fmt__0[1];
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return take_ignored_format_readers(counter__0, k, ign, rest__2);
      }
      return caml_trampoline_return(
        take_ignored_format_readers,
        [0,k,ign,rest__2]
      );
    default:
      var fmt__25 = fmt__0[3];
      var fmt__0 = fmt__25;
      continue
    }
}

function take_fmtty_format_readers__0(counter, k, fmtty, fmt) {
  var fmtty__0 = fmtty;
  for (; ; ) if (
    typeof fmtty__0 === "number"
  ) {
    if (counter < 50) {
      var counter__0 = counter + 1 | 0;
      return take_format_readers__0(counter__0, k, fmt);
    }
    return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
  }
  else switch (fmtty__0[0]) {
    case 0:
      var fmtty__1 = fmtty__0[1];
      var fmtty__0 = fmtty__1;
      continue;
    case 1:
      var fmtty__2 = fmtty__0[1];
      var fmtty__0 = fmtty__2;
      continue;
    case 2:
      var fmtty__3 = fmtty__0[1];
      var fmtty__0 = fmtty__3;
      continue;
    case 3:
      var fmtty__4 = fmtty__0[1];
      var fmtty__0 = fmtty__4;
      continue;
    case 4:
      var fmtty__5 = fmtty__0[1];
      var fmtty__0 = fmtty__5;
      continue;
    case 5:
      var fmtty__6 = fmtty__0[1];
      var fmtty__0 = fmtty__6;
      continue;
    case 6:
      var fmtty__7 = fmtty__0[1];
      var fmtty__0 = fmtty__7;
      continue;
    case 7:
      var fmtty__8 = fmtty__0[1];
      var fmtty__0 = fmtty__8;
      continue;
    case 8:
      var fmtty__9 = fmtty__0[2];
      var fmtty__0 = fmtty__9;
      continue;
    case 9:
      var rest = fmtty__0[3];
      var ty2 = fmtty__0[2];
      var ty1 = fmtty__0[1];
      var am = call1(CamlinternalFormat[22], ty1);
      var ty = call2(CamlinternalFormat[23], am, ty2);
      var fmtty__10 = call2(CamlinternalFormatBasics[1], ty, rest);
      var fmtty__0 = fmtty__10;
      continue;
    case 10:
      var fmtty__11 = fmtty__0[1];
      var fmtty__0 = fmtty__11;
      continue;
    case 11:
      var fmtty__12 = fmtty__0[1];
      var fmtty__0 = fmtty__12;
      continue;
    case 12:
      var fmtty__13 = fmtty__0[1];
      var fmtty__0 = fmtty__13;
      continue;
    case 13:
      var fmt_rest = fmtty__0[1];
      return function(reader) {
        function new_k(readers_rest) {
          return call1(k, [0,reader,readers_rest]);
        }
        return take_fmtty_format_readers(new_k, fmt_rest, fmt);
      };
    default:
      var fmt_rest__0 = fmtty__0[1];
      return function(reader) {
        function new_k(readers_rest) {
          return call1(k, [0,reader,readers_rest]);
        }
        return take_fmtty_format_readers(new_k, fmt_rest__0, fmt);
      }
    }
}

function take_ignored_format_readers(counter, k, ign, fmt) {
  if (typeof ign === "number") switch (ign) {
    case 0:
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return take_format_readers__0(counter__1, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 1:
      if (counter < 50) {
        var counter__2 = counter + 1 | 0;
        return take_format_readers__0(counter__2, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 2:
      return function(reader) {
        function new_k(readers_rest) {
          return call1(k, [0,reader,readers_rest]);
        }
        return take_format_readers(new_k, fmt);
      };
    default:
      if (counter < 50) {
        var counter__3 = counter + 1 | 0;
        return take_format_readers__0(counter__3, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt])
    }
  else switch (ign[0]) {
    case 0:
      if (counter < 50) {
        var counter__4 = counter + 1 | 0;
        return take_format_readers__0(counter__4, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 1:
      if (counter < 50) {
        var counter__5 = counter + 1 | 0;
        return take_format_readers__0(counter__5, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 2:
      if (counter < 50) {
        var counter__6 = counter + 1 | 0;
        return take_format_readers__0(counter__6, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 3:
      if (counter < 50) {
        var counter__7 = counter + 1 | 0;
        return take_format_readers__0(counter__7, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 4:
      if (counter < 50) {
        var counter__8 = counter + 1 | 0;
        return take_format_readers__0(counter__8, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 5:
      if (counter < 50) {
        var counter__9 = counter + 1 | 0;
        return take_format_readers__0(counter__9, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 6:
      if (counter < 50) {
        var counter__10 = counter + 1 | 0;
        return take_format_readers__0(counter__10, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 7:
      if (counter < 50) {
        var counter__11 = counter + 1 | 0;
        return take_format_readers__0(counter__11, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 8:
      if (counter < 50) {
        var counter__12 = counter + 1 | 0;
        return take_format_readers__0(counter__12, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    case 9:
      var fmtty = ign[2];
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return take_fmtty_format_readers__0(counter__0, k, fmtty, fmt);
      }
      return caml_trampoline_return(
        take_fmtty_format_readers__0,
        [0,k,fmtty,fmt]
      );
    case 10:
      if (counter < 50) {
        var counter__13 = counter + 1 | 0;
        return take_format_readers__0(counter__13, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt]);
    default:
      if (counter < 50) {
        var counter__14 = counter + 1 | 0;
        return take_format_readers__0(counter__14, k, fmt);
      }
      return caml_trampoline_return(take_format_readers__0, [0,k,fmt])
    }
}

function take_format_readers(k, fmt) {
  return caml_trampoline(take_format_readers__0(0, k, fmt));
}

function take_fmtty_format_readers(k, fmtty, fmt) {
  return caml_trampoline(take_fmtty_format_readers__0(0, k, fmtty, fmt));
}

function pad_prec_scanf(ib, fmt, readers, pad, prec, scan, token) {
  if (typeof pad === "number") {
    if (typeof prec === "number") {
      if (0 === prec) {
        call3(scan, Pervasives[7], Pervasives[7], ib);
        var x = call1(token, ib);
        return [0,x,make_scanf(ib, fmt, readers)];
      }
      return call1(Pervasives[1], cst_scanf_bad_conversion);
    }
    var p = prec[1];
    call3(scan, Pervasives[7], p, ib);
    var x__0 = call1(token, ib);
    return [0,x__0,make_scanf(ib, fmt, readers)];
  }
  else {
    if (0 === pad[0]) {
      if (0 === pad[1]) {
        return call1(Pervasives[1], cst_scanf_bad_conversion__0);
      }
      var al = pad[2];
      if (typeof prec === "number") {
        if (0 === prec) {
          call3(scan, al, Pervasives[7], ib);
          var x__1 = call1(token, ib);
          return [0,x__1,make_scanf(ib, fmt, readers)];
        }
        return call1(Pervasives[1], cst_scanf_bad_conversion__1);
      }
      var p__0 = prec[1];
      call3(scan, al, p__0, ib);
      var x__2 = call1(token, ib);
      return [0,x__2,make_scanf(ib, fmt, readers)];
    }
    return call1(Pervasives[1], cst_scanf_bad_conversion__2);
  }
}

function make_scanf(ib, fmt, readers) {
  var fmt__0 = fmt;
  for (; ; ) if (
    typeof fmt__0 === "number"
  ) return 0;
  else switch (fmt__0[0]) {
    case 0:
      var rest = fmt__0[1];
      scan_char(0, ib);
      var c = token_char(ib);
      return [0,c,make_scanf(ib, rest, readers)];
    case 1:
      var rest__0 = fmt__0[1];
      scan_caml_char(0, ib);
      var c__0 = token_char(ib);
      return [0,c__0,make_scanf(ib, rest__0, readers)];
    case 2:
      var K = fmt__0[2];
      var L = fmt__0[1];
      if (! (typeof K === "number")) {
        switch (K[0]) {
          case 17:
            var rest__1 = K[2];
            var fmting_lit = K[1];
            var match = stopper_of_formatting_lit(fmting_lit);
            var str = match[2];
            var stp = match[1];
            var scan__0 = function(width, param, ib) {
              return scan_string([0,stp], width, ib);
            };
            var str_rest = [11,str,rest__1];
            return pad_prec_scanf(
              ib,
              str_rest,
              readers,
              L,
              0,
              scan__0,
              token_string
            );
          case 18:
            var M = K[1];
            if (0 === M[0]) {
              var rest__2 = K[2];
              var match__0 = M[1];
              var fmt__1 = match__0[1];
              var scan__1 = function(width, param, ib) {
                return scan_string(q, width, ib);
              };
              return pad_prec_scanf(
                ib,
                call2(CamlinternalFormatBasics[3], fmt__1, rest__2),
                readers,
                L,
                0,
                scan__1,
                token_string
              );
            }
            var rest__3 = K[2];
            var match__1 = M[1];
            var fmt__2 = match__1[1];
            var scan__2 = function(width, param, ib) {
              return scan_string(r, width, ib);
            };
            return pad_prec_scanf(
              ib,
              call2(CamlinternalFormatBasics[3], fmt__2, rest__3),
              readers,
              L,
              0,
              scan__2,
              token_string
            )
          }
      }
      var scan = function(width, param, ib) {
        return scan_string(0, width, ib);
      };
      return pad_prec_scanf(ib, K, readers, L, 0, scan, token_string);
    case 3:
      var rest__4 = fmt__0[2];
      var pad = fmt__0[1];
      var scan__3 = function(width, param, ib) {
        return scan_caml_string(width, ib);
      };
      return pad_prec_scanf(
        ib,
        rest__4,
        readers,
        pad,
        0,
        scan__3,
        token_string
      );
    case 4:
      var rest__5 = fmt__0[4];
      var prec = fmt__0[3];
      var pad__0 = fmt__0[2];
      var iconv = fmt__0[1];
      var c__1 = integer_conversion_of_char(
        call1(CamlinternalFormat[16], iconv)
      );
      var scan__4 = function(width, param, ib) {
        return scan_int_conversion(c__1, width, ib);
      };
      return pad_prec_scanf(
        ib,
        rest__5,
        readers,
        pad__0,
        prec,
        scan__4,
        function(ak) {return token_int(c__1, ak);}
      );
    case 5:
      var rest__6 = fmt__0[4];
      var prec__0 = fmt__0[3];
      var pad__1 = fmt__0[2];
      var iconv__0 = fmt__0[1];
      var c__2 = integer_conversion_of_char(
        call1(CamlinternalFormat[16], iconv__0)
      );
      var scan__5 = function(width, param, ib) {
        return scan_int_conversion(c__2, width, ib);
      };
      return pad_prec_scanf(
        ib,
        rest__6,
        readers,
        pad__1,
        prec__0,
        scan__5,
        function(aj) {return token_int32(c__2, aj);}
      );
    case 6:
      var rest__7 = fmt__0[4];
      var prec__1 = fmt__0[3];
      var pad__2 = fmt__0[2];
      var iconv__1 = fmt__0[1];
      var c__3 = integer_conversion_of_char(
        call1(CamlinternalFormat[16], iconv__1)
      );
      var scan__6 = function(width, param, ib) {
        return scan_int_conversion(c__3, width, ib);
      };
      return pad_prec_scanf(
        ib,
        rest__7,
        readers,
        pad__2,
        prec__1,
        scan__6,
        function(ai) {return token_nativeint(c__3, ai);}
      );
    case 7:
      var rest__8 = fmt__0[4];
      var prec__2 = fmt__0[3];
      var pad__3 = fmt__0[2];
      var iconv__2 = fmt__0[1];
      var c__4 = integer_conversion_of_char(
        call1(CamlinternalFormat[16], iconv__2)
      );
      var scan__7 = function(width, param, ib) {
        return scan_int_conversion(c__4, width, ib);
      };
      return pad_prec_scanf(
        ib,
        rest__8,
        readers,
        pad__3,
        prec__2,
        scan__7,
        function(ah) {return token_int64(c__4, ah);}
      );
    case 8:
      var N = fmt__0[1];
      if (15 === N) {
        var rest__9 = fmt__0[4];
        var prec__3 = fmt__0[3];
        var pad__4 = fmt__0[2];
        return pad_prec_scanf(
          ib,
          rest__9,
          readers,
          pad__4,
          prec__3,
          scan_caml_float,
          token_float
        );
      }
      if (16 <= N) {
        var rest__10 = fmt__0[4];
        var prec__4 = fmt__0[3];
        var pad__5 = fmt__0[2];
        return pad_prec_scanf(
          ib,
          rest__10,
          readers,
          pad__5,
          prec__4,
          scan_hex_float,
          token_float
        );
      }
      var rest__11 = fmt__0[4];
      var prec__5 = fmt__0[3];
      var pad__6 = fmt__0[2];
      return pad_prec_scanf(
        ib,
        rest__11,
        readers,
        pad__6,
        prec__5,
        scan_float,
        token_float
      );
    case 9:
      var rest__12 = fmt__0[2];
      var pad__7 = fmt__0[1];
      var scan__8 = function(param, ag, ib) {return scan_bool(ib);};
      return pad_prec_scanf(
        ib,
        rest__12,
        readers,
        pad__7,
        0,
        scan__8,
        token_bool
      );
    case 10:
      var rest__13 = fmt__0[1];
      if (end_of_input(ib)) {var fmt__0 = rest__13;continue;}
      return bad_input(cst_end_of_input_not_found);
    case 11:
      var fmt__3 = fmt__0[2];
      var str__0 = fmt__0[1];
      var O = function(af) {return check_char(ib, af);};
      call2(String[8], O, str__0);
      var fmt__0 = fmt__3;
      continue;
    case 12:
      var fmt__4 = fmt__0[2];
      var chr = fmt__0[1];
      check_char(ib, chr);
      var fmt__0 = fmt__4;
      continue;
    case 13:
      var rest__14 = fmt__0[3];
      var fmtty = fmt__0[2];
      var pad_opt = fmt__0[1];
      scan_caml_string(width_of_pad_opt(pad_opt), ib);
      var s__0 = token_string(ib);
      try {var Q = call2(CamlinternalFormat[14], s__0, fmtty);var fmt__5 = Q;}
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] !== Failure) {
          throw runtime["caml_wrap_thrown_exception_reraise"](exn);
        }
        var msg = exn[2];
        var P = bad_input(msg);
        var fmt__5 = P;
      }
      return [0,fmt__5,make_scanf(ib, rest__14, readers)];
    case 14:
      var rest__15 = fmt__0[3];
      var fmtty__0 = fmt__0[2];
      var pad_opt__0 = fmt__0[1];
      scan_caml_string(width_of_pad_opt(pad_opt__0), ib);
      var s__1 = token_string(ib);
      try {
        var match__2 = call2(CamlinternalFormat[13], 0, s__1);
        var fmt__8 = match__2[1];
        var match__3 = call2(CamlinternalFormat[13], 0, s__1);
        var fmt__9 = match__3[1];
        var U = call1(CamlinternalFormat[22], fmtty__0);
        var V = call1(CamlinternalFormatBasics[2], U);
        var fmt__10 = call2(CamlinternalFormat[12], fmt__9, V);
        var W = call1(CamlinternalFormatBasics[2], fmtty__0);
        var X = call2(CamlinternalFormat[12], fmt__8, W);
        var fmt__7 = X;
        var fmt__6 = fmt__10;
      }
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] !== Failure) {
          throw runtime["caml_wrap_thrown_exception_reraise"](exn);
        }
        var msg__0 = exn[2];
        var R = bad_input(msg__0);
        var S = R[2];
        var T = R[1];
        var fmt__7 = T;
        var fmt__6 = S;
      }
      return [
        0,
        [0,fmt__7,s__1],
        make_scanf(
          ib,
          call2(CamlinternalFormatBasics[3], fmt__6, rest__15),
          readers
        )
      ];
    case 15:
      return call1(Pervasives[1], cst_scanf_bad_conversion_a);
    case 16:
      return call1(Pervasives[1], cst_scanf_bad_conversion_t);
    case 17:
      var fmt__11 = fmt__0[2];
      var formatting_lit = fmt__0[1];
      var Y = call1(CamlinternalFormat[17], formatting_lit);
      var Z = function(ae) {return check_char(ib, ae);};
      call2(String[8], Z, Y);
      var fmt__0 = fmt__11;
      continue;
    case 18:
      var aa = fmt__0[1];
      if (0 === aa[0]) {
        var rest__16 = fmt__0[2];
        var match__4 = aa[1];
        var fmt__12 = match__4[1];
        check_char(ib, 64);
        check_char(ib, 123);
        var fmt__13 = call2(CamlinternalFormatBasics[3], fmt__12, rest__16);
        var fmt__0 = fmt__13;
        continue;
      }
      var rest__17 = fmt__0[2];
      var match__5 = aa[1];
      var fmt__14 = match__5[1];
      check_char(ib, 64);
      check_char(ib, 91);
      var fmt__15 = call2(CamlinternalFormatBasics[3], fmt__14, rest__17);
      var fmt__0 = fmt__15;
      continue;
    case 19:
      var fmt_rest = fmt__0[1];
      if (readers) {
        var readers_rest = readers[2];
        var reader = readers[1];
        var x = call1(reader, ib);
        return [0,x,make_scanf(ib, fmt_rest, readers_rest)];
      }
      return call1(Pervasives[1], cst_scanf_missing_reader);
    case 20:
      var ab = fmt__0[3];
      var ac = fmt__0[2];
      var ad = fmt__0[1];
      if (! (typeof ab === "number") && 17 === ab[0]) {
        var rest__18 = ab[2];
        var fmting_lit__0 = ab[1];
        var match__6 = stopper_of_formatting_lit(fmting_lit__0);
        var str__1 = match__6[2];
        var stp__0 = match__6[1];
        var width__0 = width_of_pad_opt(ad);
        scan_chars_in_char_set(ac, [0,stp__0], width__0, ib);
        var s__3 = token_string(ib);
        var str_rest__0 = [11,str__1,rest__18];
        return [0,s__3,make_scanf(ib, str_rest__0, readers)];
      }
      var width = width_of_pad_opt(ad);
      scan_chars_in_char_set(ac, 0, width, ib);
      var s__2 = token_string(ib);
      return [0,s__2,make_scanf(ib, ab, readers)];
    case 21:
      var rest__19 = fmt__0[2];
      var counter = fmt__0[1];
      var count = get_counter(ib, counter);
      return [0,count,make_scanf(ib, rest__19, readers)];
    case 22:
      var rest__20 = fmt__0[1];
      var c__5 = checked_peek_char(ib);
      return [0,c__5,make_scanf(ib, rest__20, readers)];
    case 23:
      var rest__21 = fmt__0[2];
      var ign = fmt__0[1];
      var match__7 = call2(CamlinternalFormat[6], ign, rest__21);
      var fmt__16 = match__7[1];
      var match__8 = make_scanf(ib, fmt__16, readers);
      if (match__8) {var arg_rest = match__8[2];return arg_rest;}
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,s]);
    default:
      return call1(Pervasives[1], cst_scanf_bad_conversion_custom_converter)
    }
}

function kscanf(ib, ef, param) {
  var str = param[2];
  var fmt = param[1];
  function apply(f, args) {
    var f__0 = f;
    var args__0 = args;
    for (; ; ) {
      if (args__0) {
        var args__1 = args__0[2];
        var x = args__0[1];
        var f__1 = call1(f__0, x);
        var f__0 = f__1;
        var args__0 = args__1;
        continue;
      }
      return f__0;
    }
  }
  function k(readers, f) {
    reset_token(ib);
    try {var J = [0,make_scanf(ib, fmt, readers)];var D = J;}
    catch(exc) {
      exc = caml_wrap_exception(exc);
      if (exc[1] === Scan_failure) var switch__0 = 0;
      else if (exc[1] === Failure) var switch__0 = 0;
      else if (exc === End_of_file) var switch__0 = 0;
      else {
        if (exc[1] !== Invalid_argument) {
          throw runtime["caml_wrap_thrown_exception_reraise"](exc);
        }
        var msg = exc[2];
        var E = call1(String[13], str);
        var F = call2(Pervasives[16], E, cst__1);
        var G = call2(Pervasives[16], cst_in_format, F);
        var H = call2(Pervasives[16], msg, G);
        var I = call1(Pervasives[1], H);
        var C = I;
        var switch__0 = 1;
      }
      if (! switch__0) {var C = [1,exc];}
      var D = C;
    }
    if (0 === D[0]) {var args = D[1];return apply(f, args);}
    var exc = D[1];
    return call2(ef, ib, exc);
  }
  return take_format_readers(k, fmt);
}

function bscanf(ib, fmt) {return kscanf(ib, scanf_bad_input, fmt);}

function ksscanf(s, ef, fmt) {return kscanf(from_string(s), ef, fmt);}

function sscanf(s, fmt) {return kscanf(from_string(s), scanf_bad_input, fmt);}

function scanf(fmt) {return kscanf(stdin, scanf_bad_input, fmt);}

function bscanf_format(ib, format, f) {
  scan_caml_string(Pervasives[7], ib);
  var str = token_string(ib);
  try {var B = call2(CamlinternalFormat[15], str, format);var fmt = B;}
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (exn[1] !== Failure) {
      throw runtime["caml_wrap_thrown_exception_reraise"](exn);
    }
    var msg = exn[2];
    var A = bad_input(msg);
    var fmt = A;
  }
  return call1(f, fmt);
}

function sscanf_format(s, format, f) {
  return bscanf_format(from_string(s), format, f);
}

function string_to_String(s) {
  var l = caml_ml_string_length(s);
  var b = call1(Buffer[1], l + 2 | 0);
  call2(Buffer[10], b, 34);
  var y = l + -1 | 0;
  var x = 0;
  if (! (y < 0)) {
    var i = x;
    for (; ; ) {
      var c = caml_string_get(s, i);
      if (34 === c) {call2(Buffer[10], b, 92);}
      call2(Buffer[10], b, c);
      var z = i + 1 | 0;
      if (y !== i) {var i = z;continue;}
      break;
    }
  }
  call2(Buffer[10], b, 34);
  return call1(Buffer[2], b);
}

function format_from_string(s, fmt) {
  function w(x) {return x;}
  return sscanf_format(string_to_String(s), fmt, w);
}

function unescaped(s) {
  function u(x) {return x;}
  var v = call2(Pervasives[16], s, cst__2);
  return call1(sscanf(call2(Pervasives[16], cst__3, v), t), u);
}

function kfscanf(ic, ef, fmt) {return kscanf(memo_from_channel(ic), ef, fmt);}

function fscanf(ic, fmt) {
  return kscanf(memo_from_channel(ic), scanf_bad_input, fmt);
}

var Scanf = [
  0,
  [
    0,
    stdin,
    open_in,
    open_in_bin,
    close_in,
    open_in,
    open_in_bin,
    from_string,
    from_function,
    from_channel,
    end_of_input,
    beginning_of_input,
    name_of_input,
    stdin
  ],
  Scan_failure,
  bscanf,
  sscanf,
  scanf,
  kscanf,
  ksscanf,
  bscanf_format,
  sscanf_format,
  format_from_string,
  unescaped,
  fscanf,
  kfscanf
];

runtime["caml_register_global"](66, Scanf, "Scanf");


module.exports = global.jsoo_runtime.caml_get_global_data().Scanf;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
