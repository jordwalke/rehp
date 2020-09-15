/**
 * @flow strict
 * Console__ObjectPrinter
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

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

var cst = string("  ");
var cst__0 = string("");
var cst__1 = string("  ");
var cst__2 = string("    ");
var cst__3 = string("      ");
var cst__4 = string("        ");
var cst__5 = string("          ");
var cst__6 = string("            ");
var cst__7 = string("              ");
var cst__8 = string("                ");
var cst__30 = string('"');
var cst__31 = string('"');
var cst_max_depth = string("@max-depth");
var cst_max_length = string("@max-length");
var cst_unknown = string("~unknown");
var cst_lazy = string("~lazy");
var cst__29 = string(")");
var cst_closure = string("closure(");
var cst__23 = string(",\n");
var cst__17 = string("");
var cst__18 = string("]");
var cst__19 = string("\n");
var cst__20 = string(",\n");
var cst__21 = string("\n");
var cst__22 = string("[");
var cst__28 = string(", ");
var cst__24 = string("");
var cst__25 = string("]");
var cst__26 = string(", ");
var cst__27 = string("[");
var cst__13 = string(",\n");
var cst__9 = string("");
var cst__10 = string("\n");
var cst__11 = string(",\n");
var cst__12 = string("\n");
var cst__16 = string(", ");
var cst__14 = string("");
var cst__15 = string(", ");
var Stdlib_obj = require("../stdlib.cma.js/Stdlib__obj.js");
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var Stdlib_list = require("../stdlib.cma.js/Stdlib__list.js");
var Stdlib_string = require("../stdlib.cma.js/Stdlib__string.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var b_ = [0,0,0];
var j_ = [0,string("[|"),string("|]")];
var g_ = [0,string("{"),string("}")];
var c_ = [0,0,0];
var a_ = [0,string("shared-src/objectPrinter/ObjectPrinter.re"),20,2];
var colWidth = [0,70];
var maxDepth = [0,70];
var maxLength = [0,5];

function setPrintWidth(w) {colWidth[1] = w;return 0;}

function setMaxDepth(d) {maxDepth[1] = d;return 0;}

function setMaxLength(l) {
  if (2 < l) {maxLength[1] = l;return 0;}
  throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
}

function detectList(maxLength, o) {
  var maxLength__0 = maxLength;
  var o__0 = o;
  for (; ; ) {
    if (0 === maxLength__0) {return 1;}
    var tag = caml_obj_tag(o__0);
    var match = tag === Stdlib_obj[18] ? 1 : 0;
    if (0 === match) {
      var size = o__0.length - 1;
      var ab_ = tag === Stdlib_obj[4] ? 1 : 0;
      if (ab_) {
        var ac_ = 2 === size ? 1 : 0;
        if (ac_) {
          var o__1 = o__0[2];
          var maxLength__1 = maxLength__0 + -1 | 0;
          var maxLength__0 = maxLength__1;
          var o__0 = o__1;
          continue;
        }
        var ad_ = ac_;
      }
      else var ad_ = ab_;
      return ad_;
    }
    return runtime["caml_equal"](o__0, 0);
  }
}

function extractList(maxNum, o) {
  if (0 === maxNum) {return [0,! (typeof o === "number"),0];}
  if (typeof o === "number") {return b_;}
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
  function aa_(param, itm) {
    var curDidBreak = param[2];
    var curTotalLen = param[1];
    var containsNewline = call2(Stdlib_string[22], itm, 10);
    var curDidBreak__0 = curDidBreak ? curDidBreak : containsNewline;
    return [
      0,
      (curTotalLen + caml_ml_string_length(itm) | 0) + 2 | 0,
      curDidBreak__0
    ];
  }
  var match = call3(Stdlib_list[21], aa_, c_, itms);
  var someChildBroke = match[2];
  var allItemsLen = match[1];
  return [0,allItemsLen,someChildBroke];
}

function indentForDepth(n) {
  if (8 < n >>> 0) {
    var Z_ = indentForDepth(n + -1 | 0);
    return call2(Stdlib[28], Z_, cst);
  }
  switch (n) {
    case 0:
      return cst__0;
    case 1:
      return cst__1;
    case 2:
      return cst__2;
    case 3:
      return cst__3;
    case 4:
      return cst__4;
    case 5:
      return cst__5;
    case 6:
      return cst__6;
    case 7:
      return cst__7;
    default:
      return cst__8
    }
}

function printTreeShape(pair, self, depth, o) {
  var right = pair[2];
  var left = pair[1];
  var match = extractFields(maxLength[1], o);
  var lst = match[2];
  var wasTruncated = match[1];
  var dNext = 1 + depth | 0;
  var indent = indentForDepth(depth);
  var indentNext = indentForDepth(dNext);
  function K_(o) {return call3(self[13], self, [0,dNext], o);}
  var itms = call2(Stdlib_list[17], K_, lst);
  var match__0 = getBreakData(itms);
  var someChildBroke = match__0[2];
  var allItemsLen = match__0[1];
  if (
  !
  (colWidth[1] <= ((caml_ml_string_length(indent) + 2 | 0) + allItemsLen | 0))
  ) {
    if (! someChildBroke) {
      if (0 === wasTruncated) var truncationMsg__0 = cst__14;
      else {
        var Y_ = call1(self[6], self);
        var truncationMsg__0 = call2(Stdlib[28], cst__16, Y_);
      }
      var V_ = call2(Stdlib[28], truncationMsg__0, right);
      var W_ = call2(Stdlib_string[7], cst__15, itms);
      var X_ = call2(Stdlib[28], W_, V_);
      return call2(Stdlib[28], left, X_);
    }
  }
  if (0 === wasTruncated) var truncationMsg = cst__9;
  else {
    var T_ = call1(self[6], self);
    var U_ = call2(Stdlib[28], indentNext, T_);
    var truncationMsg = call2(Stdlib[28], cst__13, U_);
  }
  var L_ = call2(Stdlib[28], indent, right);
  var M_ = call2(Stdlib[28], cst__10, L_);
  var N_ = call2(Stdlib[28], truncationMsg, M_);
  var O_ = call2(Stdlib[28], cst__11, indentNext);
  var P_ = call2(Stdlib_string[7], O_, itms);
  var Q_ = call2(Stdlib[28], P_, N_);
  var R_ = call2(Stdlib[28], indentNext, Q_);
  var S_ = call2(Stdlib[28], cst__12, R_);
  return call2(Stdlib[28], left, S_);
}

function printListShape(self, depth, o) {
  var match = extractList(maxLength[1], o);
  var lst = match[2];
  var wasTruncated = match[1];
  var dNext = 1 + depth | 0;
  var indent = indentForDepth(depth);
  var indentNext = indentForDepth(dNext);
  function v_(o) {return call3(self[13], self, [0,dNext], o);}
  var itms = call2(Stdlib_list[17], v_, lst);
  var match__0 = getBreakData(itms);
  var someChildBroke = match__0[2];
  var allItemsLen = match__0[1];
  if (
  !
  (colWidth[1] <= ((caml_ml_string_length(indent) + 2 | 0) + allItemsLen | 0))
  ) {
    if (! someChildBroke) {
      if (0 === wasTruncated) var truncationMsg__0 = cst__24;
      else {
        var J_ = call1(self[6], self);
        var truncationMsg__0 = call2(Stdlib[28], cst__28, J_);
      }
      var G_ = call2(Stdlib[28], truncationMsg__0, cst__25);
      var H_ = call2(Stdlib_string[7], cst__26, itms);
      var I_ = call2(Stdlib[28], H_, G_);
      return call2(Stdlib[28], cst__27, I_);
    }
  }
  if (0 === wasTruncated) var truncationMsg = cst__17;
  else {
    var E_ = call1(self[6], self);
    var F_ = call2(Stdlib[28], indentNext, E_);
    var truncationMsg = call2(Stdlib[28], cst__23, F_);
  }
  var w_ = call2(Stdlib[28], indent, cst__18);
  var x_ = call2(Stdlib[28], cst__19, w_);
  var y_ = call2(Stdlib[28], truncationMsg, x_);
  var z_ = call2(Stdlib[28], cst__20, indentNext);
  var A_ = call2(Stdlib_string[7], z_, itms);
  var B_ = call2(Stdlib[28], A_, y_);
  var C_ = call2(Stdlib[28], indentNext, B_);
  var D_ = call2(Stdlib[28], cst__21, C_);
  return call2(Stdlib[28], cst__22, D_);
}

function d_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  if (maxDepth[1] < depth) {return call1(self[5], self);}
  var tag = caml_obj_tag(o);
  if (tag === Stdlib_obj[13]) {
    var match = 0 === depth ? 1 : 0;
    return 0 === match ? call2(self[3], self, o) : call2(self[2], self, o);
  }
  return tag === Stdlib_obj[18] ?
    call2(self[1], self, o) :
    tag === Stdlib_obj[14] ?
     call2(self[4], self, o) :
     tag === Stdlib_obj[7] ?
      call2(self[10], self, o) :
      tag === Stdlib_obj[15] ?
       call3(self[9], self, 0, o) :
       tag === Stdlib_obj[6] ?
        call2(self[8], self, o) :
        detectList(maxLength[1], o) ?
         call3(self[12], self, [0,depth], o) :
         tag === Stdlib_obj[4] ?
          call3(self[11], self, [0,depth], o) :
          call2(self[7], self, o);
}

function e_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printListShape(self, depth, o);
}

function f_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(g_, self, depth, o);
}

function h_(self, f) {
  var t_ = call1(Stdlib[33], f | 0);
  var u_ = call2(Stdlib[28], t_, cst__29);
  return call2(Stdlib[28], cst_closure, u_);
}

function i_(self, opt, o) {
  if (opt) {
    var sth = opt[1];
    var depth = sth;
  }
  else var depth = 0;
  return printTreeShape(j_, self, depth, o);
}

function k_(self, o) {return cst_lazy;}

function l_(self, o) {return cst_unknown;}

function m_(self) {return cst_max_length;}

function n_(self) {return cst_max_depth;}

function o_(self, f) {return call1(Stdlib[35], f);}

function p_(self, s) {
  var r_ = call2(self[2], self, s);
  var s_ = call2(Stdlib[28], r_, cst__30);
  return call2(Stdlib[28], cst__31, s_);
}

function q_(self, s) {return s;}

var base = [
  0,
  function(self, i) {return call1(Stdlib[33], i);},
  q_,
  p_,
  o_,
  n_,
  m_,
  l_,
  k_,
  i_,
  h_,
  f_,
  e_,
  d_
];
var Console_ObjectPrinter = [0,setPrintWidth,setMaxDepth,setMaxLength,base];

module.exports = Console_ObjectPrinter;

/*::type Exports = {
  setPrintWidth: (w: any) => any,
  setMaxDepth: (d: any) => any,
  setMaxLength: (l: any) => any,
  base: any,
}*/
/** @type {{
  setPrintWidth: (w: any) => any,
  setMaxDepth: (d: any) => any,
  setMaxLength: (l: any) => any,
  base: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.setPrintWidth = module.exports[1];
module.exports.setMaxDepth = module.exports[2];
module.exports.setMaxLength = module.exports[3];
module.exports.base = module.exports[4];

/* Hashing disabled */
