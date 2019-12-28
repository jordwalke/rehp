/**
 * @flow strict
 * CamlinternalFormatBasics
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

function erase_rel(param) {
  var rest__13;
  var rest__12;
  var rest__11;
  var rest__10;
  var rest__9;
  var ty1;
  var rest__8;
  var ty;
  var rest__7;
  var rest__6;
  var rest__5;
  var rest__4;
  var rest__3;
  var rest__2;
  var rest__1;
  var rest__0;
  var rest;
  if (typeof param === "number") return 0;
  else switch (param[0]) {
    case 0:
      rest = param[1];
      return [0,erase_rel(rest)];
    case 1:
      rest__0 = param[1];
      return [1,erase_rel(rest__0)];
    case 2:
      rest__1 = param[1];
      return [2,erase_rel(rest__1)];
    case 3:
      rest__2 = param[1];
      return [3,erase_rel(rest__2)];
    case 4:
      rest__3 = param[1];
      return [4,erase_rel(rest__3)];
    case 5:
      rest__4 = param[1];
      return [5,erase_rel(rest__4)];
    case 6:
      rest__5 = param[1];
      return [6,erase_rel(rest__5)];
    case 7:
      rest__6 = param[1];
      return [7,erase_rel(rest__6)];
    case 8:
      rest__7 = param[2];
      ty = param[1];
      return [8,ty,erase_rel(rest__7)];
    case 9:
      rest__8 = param[3];
      ty1 = param[1];
      return [9,ty1,ty1,erase_rel(rest__8)];
    case 10:
      rest__9 = param[1];
      return [10,erase_rel(rest__9)];
    case 11:
      rest__10 = param[1];
      return [11,erase_rel(rest__10)];
    case 12:
      rest__11 = param[1];
      return [12,erase_rel(rest__11)];
    case 13:
      rest__12 = param[1];
      return [13,erase_rel(rest__12)];
    default:
      rest__13 = param[1];
      return [14,erase_rel(rest__13)]
    }
}

function concat_fmtty(fmtty1, fmtty2) {
  var rest__13;
  var rest__12;
  var rest__11;
  var rest__10;
  var rest__9;
  var ty1;
  var ty2;
  var rest__8;
  var ty;
  var rest__7;
  var rest__6;
  var rest__5;
  var rest__4;
  var rest__3;
  var rest__2;
  var rest__1;
  var rest__0;
  var rest;
  if (typeof fmtty1 === "number") return fmtty2;
  else switch (fmtty1[0]) {
    case 0:
      rest = fmtty1[1];
      return [0,concat_fmtty(rest, fmtty2)];
    case 1:
      rest__0 = fmtty1[1];
      return [1,concat_fmtty(rest__0, fmtty2)];
    case 2:
      rest__1 = fmtty1[1];
      return [2,concat_fmtty(rest__1, fmtty2)];
    case 3:
      rest__2 = fmtty1[1];
      return [3,concat_fmtty(rest__2, fmtty2)];
    case 4:
      rest__3 = fmtty1[1];
      return [4,concat_fmtty(rest__3, fmtty2)];
    case 5:
      rest__4 = fmtty1[1];
      return [5,concat_fmtty(rest__4, fmtty2)];
    case 6:
      rest__5 = fmtty1[1];
      return [6,concat_fmtty(rest__5, fmtty2)];
    case 7:
      rest__6 = fmtty1[1];
      return [7,concat_fmtty(rest__6, fmtty2)];
    case 8:
      rest__7 = fmtty1[2];
      ty = fmtty1[1];
      return [8,ty,concat_fmtty(rest__7, fmtty2)];
    case 9:
      rest__8 = fmtty1[3];
      ty2 = fmtty1[2];
      ty1 = fmtty1[1];
      return [9,ty1,ty2,concat_fmtty(rest__8, fmtty2)];
    case 10:
      rest__9 = fmtty1[1];
      return [10,concat_fmtty(rest__9, fmtty2)];
    case 11:
      rest__10 = fmtty1[1];
      return [11,concat_fmtty(rest__10, fmtty2)];
    case 12:
      rest__11 = fmtty1[1];
      return [12,concat_fmtty(rest__11, fmtty2)];
    case 13:
      rest__12 = fmtty1[1];
      return [13,concat_fmtty(rest__12, fmtty2)];
    default:
      rest__13 = fmtty1[1];
      return [14,concat_fmtty(rest__13, fmtty2)]
    }
}

function concat_fmt(fmt1, fmt2) {
  var arity;
  var f;
  var rest__23;
  var ign;
  var rest__22;
  var rest__21;
  var counter;
  var rest__20;
  var width_opt;
  var char_set;
  var rest__19;
  var rest__18;
  var fmting_gen;
  var rest__17;
  var fmting_lit;
  var rest__16;
  var rest__15;
  var rest__14;
  var pad__8;
  var fmtty__0;
  var rest__13;
  var pad__7;
  var fmtty;
  var rest__12;
  var chr;
  var rest__11;
  var str;
  var rest__10;
  var rest__9;
  var pad__6;
  var rest__8;
  var fconv;
  var pad__5;
  var prec__3;
  var rest__7;
  var iconv__2;
  var pad__4;
  var prec__2;
  var rest__6;
  var iconv__1;
  var pad__3;
  var prec__1;
  var rest__5;
  var iconv__0;
  var pad__2;
  var prec__0;
  var rest__4;
  var iconv;
  var pad__1;
  var prec;
  var rest__3;
  var pad__0;
  var rest__2;
  var pad;
  var rest__1;
  var rest__0;
  var rest;
  if (typeof fmt1 === "number") return fmt2;
  else switch (fmt1[0]) {
    case 0:
      rest = fmt1[1];
      return [0,concat_fmt(rest, fmt2)];
    case 1:
      rest__0 = fmt1[1];
      return [1,concat_fmt(rest__0, fmt2)];
    case 2:
      rest__1 = fmt1[2];
      pad = fmt1[1];
      return [2,pad,concat_fmt(rest__1, fmt2)];
    case 3:
      rest__2 = fmt1[2];
      pad__0 = fmt1[1];
      return [3,pad__0,concat_fmt(rest__2, fmt2)];
    case 4:
      rest__3 = fmt1[4];
      prec = fmt1[3];
      pad__1 = fmt1[2];
      iconv = fmt1[1];
      return [4,iconv,pad__1,prec,concat_fmt(rest__3, fmt2)];
    case 5:
      rest__4 = fmt1[4];
      prec__0 = fmt1[3];
      pad__2 = fmt1[2];
      iconv__0 = fmt1[1];
      return [5,iconv__0,pad__2,prec__0,concat_fmt(rest__4, fmt2)];
    case 6:
      rest__5 = fmt1[4];
      prec__1 = fmt1[3];
      pad__3 = fmt1[2];
      iconv__1 = fmt1[1];
      return [6,iconv__1,pad__3,prec__1,concat_fmt(rest__5, fmt2)];
    case 7:
      rest__6 = fmt1[4];
      prec__2 = fmt1[3];
      pad__4 = fmt1[2];
      iconv__2 = fmt1[1];
      return [7,iconv__2,pad__4,prec__2,concat_fmt(rest__6, fmt2)];
    case 8:
      rest__7 = fmt1[4];
      prec__3 = fmt1[3];
      pad__5 = fmt1[2];
      fconv = fmt1[1];
      return [8,fconv,pad__5,prec__3,concat_fmt(rest__7, fmt2)];
    case 9:
      rest__8 = fmt1[2];
      pad__6 = fmt1[1];
      return [9,pad__6,concat_fmt(rest__8, fmt2)];
    case 10:
      rest__9 = fmt1[1];
      return [10,concat_fmt(rest__9, fmt2)];
    case 11:
      rest__10 = fmt1[2];
      str = fmt1[1];
      return [11,str,concat_fmt(rest__10, fmt2)];
    case 12:
      rest__11 = fmt1[2];
      chr = fmt1[1];
      return [12,chr,concat_fmt(rest__11, fmt2)];
    case 13:
      rest__12 = fmt1[3];
      fmtty = fmt1[2];
      pad__7 = fmt1[1];
      return [13,pad__7,fmtty,concat_fmt(rest__12, fmt2)];
    case 14:
      rest__13 = fmt1[3];
      fmtty__0 = fmt1[2];
      pad__8 = fmt1[1];
      return [14,pad__8,fmtty__0,concat_fmt(rest__13, fmt2)];
    case 15:
      rest__14 = fmt1[1];
      return [15,concat_fmt(rest__14, fmt2)];
    case 16:
      rest__15 = fmt1[1];
      return [16,concat_fmt(rest__15, fmt2)];
    case 17:
      rest__16 = fmt1[2];
      fmting_lit = fmt1[1];
      return [17,fmting_lit,concat_fmt(rest__16, fmt2)];
    case 18:
      rest__17 = fmt1[2];
      fmting_gen = fmt1[1];
      return [18,fmting_gen,concat_fmt(rest__17, fmt2)];
    case 19:
      rest__18 = fmt1[1];
      return [19,concat_fmt(rest__18, fmt2)];
    case 20:
      rest__19 = fmt1[3];
      char_set = fmt1[2];
      width_opt = fmt1[1];
      return [20,width_opt,char_set,concat_fmt(rest__19, fmt2)];
    case 21:
      rest__20 = fmt1[2];
      counter = fmt1[1];
      return [21,counter,concat_fmt(rest__20, fmt2)];
    case 22:
      rest__21 = fmt1[1];
      return [22,concat_fmt(rest__21, fmt2)];
    case 23:
      rest__22 = fmt1[2];
      ign = fmt1[1];
      return [23,ign,concat_fmt(rest__22, fmt2)];
    default:
      rest__23 = fmt1[3];
      f = fmt1[2];
      arity = fmt1[1];
      return [24,arity,f,concat_fmt(rest__23, fmt2)]
    }
}

var CamlinternalFormatBasics = [0,concat_fmtty,erase_rel,concat_fmt];

exports = CamlinternalFormatBasics;

/*::type Exports = {
  concat_fmtty: (fmtty1: any, fmtty2: any) => any,
  erase_rel: (param: any) => any,
  concat_fmt: (fmt1: any, fmt2: any) => any,
}*/
/** @type {{
  concat_fmtty: (fmtty1: any, fmtty2: any) => any,
  erase_rel: (param: any) => any,
  concat_fmt: (fmt1: any, fmt2: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.concat_fmtty = module.exports[1];
module.exports.erase_rel = module.exports[2];
module.exports.concat_fmt = module.exports[3];

/* Hashing disabled */
