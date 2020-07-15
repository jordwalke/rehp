/**
 * @flow strict
 * Stdlib__list
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_compare = runtime["caml_compare"];
var string = runtime["caml_new_string"];
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

var cst_List_map2 = string("List.map2");
var cst_List_iter2 = string("List.iter2");
var cst_List_fold_left2 = string("List.fold_left2");
var cst_List_fold_right2 = string("List.fold_right2");
var cst_List_for_all2 = string("List.for_all2");
var cst_List_exists2 = string("List.exists2");
var cst_List_combine = string("List.combine");
var cst_List_rev_map2 = string("List.rev_map2");
var cst_List_init = string("List.init");
var cst_List_nth__0 = string("List.nth");
var cst_nth = string("nth");
var cst_List_nth = string("List.nth");
var cst_tl = string("tl");
var cst_hd = string("hd");
var Stdlib = require("./Stdlib.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var d_ = [0,0,0];
var e_ = [0,string("list.ml"),282,11];

function length_aux(len, param) {
  var len__0 = len;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var len__1 = len__0 + 1 | 0;
      var len__0 = len__1;
      var param__0 = param__1;
      continue;
    }
    return len__0;
  }
}

function length(l) {return length_aux(0, l);}

function cons(a, l) {return [0,a,l];}

function hd(param) {
  if (param) {var a = param[1];return a;}
  return call1(Stdlib[2], cst_hd);
}

function tl(param) {
  if (param) {var l = param[2];return l;}
  return call1(Stdlib[2], cst_tl);
}

function nth(l, n) {
  if (0 <= n) {
    var nth_aux = function(l, n) {
      var l__0 = l;
      var n__0 = n;
      for (; ; ) {
        if (l__0) {
          var l__1 = l__0[2];
          var a = l__0[1];
          if (0 === n__0) {return a;}
          var n__1 = n__0 + -1 | 0;
          var l__0 = l__1;
          var n__0 = n__1;
          continue;
        }
        return call1(Stdlib[2], cst_nth);
      }
    };
    return nth_aux(l, n);
  }
  return call1(Stdlib[1], cst_List_nth);
}

function nth_opt(l, n) {
  if (0 <= n) {
    var nth_aux = function(l, n) {
      var l__0 = l;
      var n__0 = n;
      for (; ; ) {
        if (l__0) {
          var l__1 = l__0[2];
          var a = l__0[1];
          if (0 === n__0) {return [0,a];}
          var n__1 = n__0 + -1 | 0;
          var l__0 = l__1;
          var n__0 = n__1;
          continue;
        }
        return 0;
      }
    };
    return nth_aux(l, n);
  }
  return call1(Stdlib[1], cst_List_nth__0);
}

var a_ = Stdlib[37];

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

function init_tailrec_aux(acc, i, n, f) {
  var acc__0 = acc;
  var i__0 = i;
  for (; ; ) {
    if (n <= i__0) {return acc__0;}
    var i__1 = i__0 + 1 | 0;
    var acc__1 = [0,call1(f, i__0),acc__0];
    var acc__0 = acc__1;
    var i__0 = i__1;
    continue;
  }
}

function init_aux(i, n, f) {
  if (n <= i) {return 0;}
  var r = call1(f, i);
  return [0,r,init_aux(i + 1 | 0, n, f)];
}

var rev_init_threshold = typeof Stdlib_sys[6] === "number" ? 1e4 : 50;

function init(len, f) {
  return 0 <= len ?
    rev_init_threshold < len ?
     rev(init_tailrec_aux(0, 0, len, f)) :
     init_aux(0, len, f) :
    call1(Stdlib[1], cst_List_init);
}

function flatten(param) {
  if (param) {
    var r = param[2];
    var l = param[1];
    var I_ = flatten(r);
    return call2(Stdlib[37], l, I_);
  }
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

function b_(i, f, param) {
  if (param) {
    var l = param[2];
    var a = param[1];
    var r = call2(f, i, a);
    return [0,r,b_(i + 1 | 0, f, l)];
  }
  return 0;
}

function mapi(f, l) {return b_(0, f, l);}

function rev_map(f, l) {
  function rmap_f(accu, param) {
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var param__1 = param__0[2];
        var a = param__0[1];
        var accu__1 = [0,call1(f, a),accu__0];
        var accu__0 = accu__1;
        var param__0 = param__1;
        continue;
      }
      return accu__0;
    }
  }
  return rmap_f(0, l);
}

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

function c_(i, f, param) {
  var i__0 = i;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var a = param__0[1];
      call2(f, i__0, a);
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      var param__0 = param__1;
      continue;
    }
    return 0;
  }
}

function iteri(f, l) {return c_(0, f, l);}

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

function fold_right(f, l, accu) {
  if (l) {
    var l__0 = l[2];
    var a = l[1];
    return call2(f, a, fold_right(f, l__0, accu));
  }
  return accu;
}

function map2(f, l1, l2) {
  if (l1) {
    if (l2) {
      var l2__0 = l2[2];
      var a2 = l2[1];
      var l1__0 = l1[2];
      var a1 = l1[1];
      var r = call2(f, a1, a2);
      return [0,r,map2(f, l1__0, l2__0)];
    }
  }
  else if (! l2) {return 0;}
  return call1(Stdlib[1], cst_List_map2);
}

function rev_map2(f, l1, l2) {
  function rmap2_f(accu, l1, l2) {
    var accu__0 = accu;
    var l1__0 = l1;
    var l2__0 = l2;
    for (; ; ) {
      if (l1__0) {
        if (l2__0) {
          var l2__1 = l2__0[2];
          var a2 = l2__0[1];
          var l1__1 = l1__0[2];
          var a1 = l1__0[1];
          var accu__1 = [0,call2(f, a1, a2),accu__0];
          var accu__0 = accu__1;
          var l1__0 = l1__1;
          var l2__0 = l2__1;
          continue;
        }
      }
      else if (! l2__0) {return accu__0;}
      return call1(Stdlib[1], cst_List_rev_map2);
    }
  }
  return rmap2_f(0, l1, l2);
}

function iter2(f, l1, l2) {
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      if (l2__0) {
        var l2__1 = l2__0[2];
        var a2 = l2__0[1];
        var l1__1 = l1__0[2];
        var a1 = l1__0[1];
        call2(f, a1, a2);
        var l1__0 = l1__1;
        var l2__0 = l2__1;
        continue;
      }
    }
    else if (! l2__0) {return 0;}
    return call1(Stdlib[1], cst_List_iter2);
  }
}

function fold_left2(f, accu, l1, l2) {
  var accu__0 = accu;
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      if (l2__0) {
        var l2__1 = l2__0[2];
        var a2 = l2__0[1];
        var l1__1 = l1__0[2];
        var a1 = l1__0[1];
        var accu__1 = call3(f, accu__0, a1, a2);
        var accu__0 = accu__1;
        var l1__0 = l1__1;
        var l2__0 = l2__1;
        continue;
      }
    }
    else if (! l2__0) {return accu__0;}
    return call1(Stdlib[1], cst_List_fold_left2);
  }
}

function fold_right2(f, l1, l2, accu) {
  if (l1) {
    if (l2) {
      var l2__0 = l2[2];
      var a2 = l2[1];
      var l1__0 = l1[2];
      var a1 = l1[1];
      return call3(f, a1, a2, fold_right2(f, l1__0, l2__0, accu));
    }
  }
  else if (! l2) {return accu;}
  return call1(Stdlib[1], cst_List_fold_right2);
}

function for_all(p, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var a = param__0[1];
      var H_ = call1(p, a);
      if (H_) {var param__0 = l;continue;}
      return H_;
    }
    return 1;
  }
}

function exists(p, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var a = param__0[1];
      var G_ = call1(p, a);
      if (G_) {return G_;}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function for_all2(p, l1, l2) {
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      if (l2__0) {
        var l2__1 = l2__0[2];
        var a2 = l2__0[1];
        var l1__1 = l1__0[2];
        var a1 = l1__0[1];
        var F_ = call2(p, a1, a2);
        if (F_) {var l1__0 = l1__1;var l2__0 = l2__1;continue;}
        return F_;
      }
    }
    else if (! l2__0) {return 1;}
    return call1(Stdlib[1], cst_List_for_all2);
  }
}

function exists2(p, l1, l2) {
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      if (l2__0) {
        var l2__1 = l2__0[2];
        var a2 = l2__0[1];
        var l1__1 = l1__0[2];
        var a1 = l1__0[1];
        var E_ = call2(p, a1, a2);
        if (E_) {return E_;}
        var l1__0 = l1__1;
        var l2__0 = l2__1;
        continue;
      }
    }
    else if (! l2__0) {return 0;}
    return call1(Stdlib[1], cst_List_exists2);
  }
}

function mem(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var a = param__0[1];
      var D_ = 0 === caml_compare(a, x) ? 1 : 0;
      if (D_) {return D_;}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function memq(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var a = param__0[1];
      var C_ = a === x ? 1 : 0;
      if (C_) {return C_;}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function assoc(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var b = match[2];
      var a = match[1];
      if (0 === caml_compare(a, x)) {return b;}
      var param__0 = l;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function assoc_opt(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var b = match[2];
      var a = match[1];
      if (0 === caml_compare(a, x)) {return [0,b];}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function assq(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var b = match[2];
      var a = match[1];
      if (a === x) {return b;}
      var param__0 = l;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function assq_opt(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var b = match[2];
      var a = match[1];
      if (a === x) {return [0,b];}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function mem_assoc(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var a = match[1];
      var B_ = 0 === caml_compare(a, x) ? 1 : 0;
      if (B_) {return B_;}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function mem_assq(x, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var match = param__0[1];
      var a = match[1];
      var A_ = a === x ? 1 : 0;
      if (A_) {return A_;}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function remove_assoc(x, param) {
  if (param) {
    var l = param[2];
    var pair = param[1];
    var a = pair[1];
    return 0 === caml_compare(a, x) ? l : [0,pair,remove_assoc(x, l)];
  }
  return 0;
}

function remove_assq(x, param) {
  if (param) {
    var l = param[2];
    var pair = param[1];
    var a = pair[1];
    return a === x ? l : [0,pair,remove_assq(x, l)];
  }
  return 0;
}

function find(p, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var x = param__0[1];
      if (call1(p, x)) {return x;}
      var param__0 = l;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function find_opt(p, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var l = param__0[2];
      var x = param__0[1];
      if (call1(p, x)) {return [0,x];}
      var param__0 = l;
      continue;
    }
    return 0;
  }
}

function find_all(p) {
  function find(accu, param) {
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var x = param__0[1];
        if (call1(p, x)) {
          var accu__1 = [0,x,accu__0];
          var accu__0 = accu__1;
          var param__0 = l;
          continue;
        }
        var param__0 = l;
        continue;
      }
      return rev(accu__0);
    }
  }
  var y_ = 0;
  return function(z_) {return find(y_, z_);};
}

function filter_map(f) {
  function aux(accu, param) {
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var x = param__0[1];
        var match = call1(f, x);
        if (match) {
          var v = match[1];
          var accu__1 = [0,v,accu__0];
          var accu__0 = accu__1;
          var param__0 = l;
          continue;
        }
        var param__0 = l;
        continue;
      }
      return rev(accu__0);
    }
  }
  var w_ = 0;
  return function(x_) {return aux(w_, x_);};
}

function partition(p, l) {
  function part(yes, no, param) {
    var yes__0 = yes;
    var no__0 = no;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var x = param__0[1];
        if (call1(p, x)) {
          var yes__1 = [0,x,yes__0];
          var yes__0 = yes__1;
          var param__0 = l;
          continue;
        }
        var no__1 = [0,x,no__0];
        var no__0 = no__1;
        var param__0 = l;
        continue;
      }
      var v_ = rev(no__0);
      return [0,rev(yes__0),v_];
    }
  }
  return part(0, 0, l);
}

function split(param) {
  if (param) {
    var l = param[2];
    var match = param[1];
    var y = match[2];
    var x = match[1];
    var match__0 = split(l);
    var ry = match__0[2];
    var rx = match__0[1];
    return [0,[0,x,rx],[0,y,ry]];
  }
  return d_;
}

function combine(l1, l2) {
  if (l1) {
    if (l2) {
      var l2__0 = l2[2];
      var a2 = l2[1];
      var l1__0 = l1[2];
      var a1 = l1[1];
      return [0,[0,a1,a2],combine(l1__0, l2__0)];
    }
  }
  else if (! l2) {return 0;}
  return call1(Stdlib[1], cst_List_combine);
}

function merge(cmp, l1, match) {
  if (l1) {
    if (match) {
      var t2 = match[2];
      var h2 = match[1];
      var t1 = l1[2];
      var h1 = l1[1];
      return 0 < call2(cmp, h1, h2) ?
        [0,h2,merge(cmp, l1, t2)] :
        [0,h1,merge(cmp, t1, match)];
    }
    return l1;
  }
  return match;
}

function chop(k, l) {
  var k__0 = k;
  var l__0 = l;
  for (; ; ) {
    if (0 === k__0) {return l__0;}
    if (l__0) {
      var l__1 = l__0[2];
      var k__1 = k__0 + -1 | 0;
      var k__0 = k__1;
      var l__0 = l__1;
      continue;
    }
    throw caml_wrap_thrown_exception([0,Assert_failure,e_]);
  }
}

function stable_sort(cmp, l) {
  function rev_merge(l1, l2, accu) {
    var l1__0 = l1;
    var l2__0 = l2;
    var accu__0 = accu;
    for (; ; ) {
      if (l1__0) {
        if (l2__0) {
          var t2 = l2__0[2];
          var h2 = l2__0[1];
          var t1 = l1__0[2];
          var h1 = l1__0[1];
          if (0 < call2(cmp, h1, h2)) {
            var accu__1 = [0,h2,accu__0];
            var l2__0 = t2;
            var accu__0 = accu__1;
            continue;
          }
          var accu__2 = [0,h1,accu__0];
          var l1__0 = t1;
          var accu__0 = accu__2;
          continue;
        }
        return rev_append(l1__0, accu__0);
      }
      return rev_append(l2__0, accu__0);
    }
  }
  function rev_merge_rev(l1, l2, accu) {
    var l1__0 = l1;
    var l2__0 = l2;
    var accu__0 = accu;
    for (; ; ) {
      if (l1__0) {
        if (l2__0) {
          var t2 = l2__0[2];
          var h2 = l2__0[1];
          var t1 = l1__0[2];
          var h1 = l1__0[1];
          if (0 < call2(cmp, h1, h2)) {
            var accu__1 = [0,h1,accu__0];
            var l1__0 = t1;
            var accu__0 = accu__1;
            continue;
          }
          var accu__2 = [0,h2,accu__0];
          var l2__0 = t2;
          var accu__0 = accu__2;
          continue;
        }
        return rev_append(l1__0, accu__0);
      }
      return rev_append(l2__0, accu__0);
    }
  }
  function sort(n, l) {
    if (2 === n) {
      if (l) {
        var s_ = l[2];
        if (s_) {
          var x2 = s_[1];
          var x1 = l[1];
          return 0 < call2(cmp, x1, x2) ? [0,x2,[0,x1,0]] : [0,x1,[0,x2,0]];
        }
      }
    }
    else if (3 === n) {
      if (l) {
        var t_ = l[2];
        if (t_) {
          var u_ = t_[2];
          if (u_) {
            var x3 = u_[1];
            var x2__0 = t_[1];
            var x1__0 = l[1];
            return 0 < call2(cmp, x1__0, x2__0) ?
              0 < call2(cmp, x1__0, x3) ?
               0 < call2(cmp, x2__0, x3) ?
                [0,x3,[0,x2__0,[0,x1__0,0]]] :
                [0,x2__0,[0,x3,[0,x1__0,0]]] :
               [0,x2__0,[0,x1__0,[0,x3,0]]] :
              0 < call2(cmp, x2__0, x3) ?
               0 < call2(cmp, x1__0, x3) ?
                [0,x3,[0,x1__0,[0,x2__0,0]]] :
                [0,x1__0,[0,x3,[0,x2__0,0]]] :
               [0,x1__0,[0,x2__0,[0,x3,0]]];
          }
        }
      }
    }
    var n1 = n >> 1;
    var n2 = n - n1 | 0;
    var l2 = chop(n1, l);
    var s1 = rev_sort(n1, l);
    var s2 = rev_sort(n2, l2);
    return rev_merge_rev(s1, s2, 0);
  }
  function rev_sort(n, l) {
    if (2 === n) {
      if (l) {
        var p_ = l[2];
        if (p_) {
          var x2 = p_[1];
          var x1 = l[1];
          return 0 < call2(cmp, x1, x2) ? [0,x1,[0,x2,0]] : [0,x2,[0,x1,0]];
        }
      }
    }
    else if (3 === n) {
      if (l) {
        var q_ = l[2];
        if (q_) {
          var r_ = q_[2];
          if (r_) {
            var x3 = r_[1];
            var x2__0 = q_[1];
            var x1__0 = l[1];
            return 0 < call2(cmp, x1__0, x2__0) ?
              0 < call2(cmp, x2__0, x3) ?
               [0,x1__0,[0,x2__0,[0,x3,0]]] :
               0 < call2(cmp, x1__0, x3) ?
                [0,x1__0,[0,x3,[0,x2__0,0]]] :
                [0,x3,[0,x1__0,[0,x2__0,0]]] :
              0 < call2(cmp, x1__0, x3) ?
               [0,x2__0,[0,x1__0,[0,x3,0]]] :
               0 < call2(cmp, x2__0, x3) ?
                [0,x2__0,[0,x3,[0,x1__0,0]]] :
                [0,x3,[0,x2__0,[0,x1__0,0]]];
          }
        }
      }
    }
    var n1 = n >> 1;
    var n2 = n - n1 | 0;
    var l2 = chop(n1, l);
    var s1 = sort(n1, l);
    var s2 = sort(n2, l2);
    return rev_merge(s1, s2, 0);
  }
  var len = length(l);
  return 2 <= len ? sort(len, l) : l;
}

function sort_uniq(cmp, l) {
  function rev_merge(l1, l2, accu) {
    var l1__0 = l1;
    var l2__0 = l2;
    var accu__0 = accu;
    for (; ; ) {
      if (l1__0) {
        if (l2__0) {
          var t2 = l2__0[2];
          var h2 = l2__0[1];
          var t1 = l1__0[2];
          var h1 = l1__0[1];
          var c = call2(cmp, h1, h2);
          if (0 === c) {
            var accu__1 = [0,h1,accu__0];
            var l1__0 = t1;
            var l2__0 = t2;
            var accu__0 = accu__1;
            continue;
          }
          if (0 <= c) {
            var accu__2 = [0,h2,accu__0];
            var l2__0 = t2;
            var accu__0 = accu__2;
            continue;
          }
          var accu__3 = [0,h1,accu__0];
          var l1__0 = t1;
          var accu__0 = accu__3;
          continue;
        }
        return rev_append(l1__0, accu__0);
      }
      return rev_append(l2__0, accu__0);
    }
  }
  function rev_merge_rev(l1, l2, accu) {
    var l1__0 = l1;
    var l2__0 = l2;
    var accu__0 = accu;
    for (; ; ) {
      if (l1__0) {
        if (l2__0) {
          var t2 = l2__0[2];
          var h2 = l2__0[1];
          var t1 = l1__0[2];
          var h1 = l1__0[1];
          var c = call2(cmp, h1, h2);
          if (0 === c) {
            var accu__1 = [0,h1,accu__0];
            var l1__0 = t1;
            var l2__0 = t2;
            var accu__0 = accu__1;
            continue;
          }
          if (0 < c) {
            var accu__2 = [0,h1,accu__0];
            var l1__0 = t1;
            var accu__0 = accu__2;
            continue;
          }
          var accu__3 = [0,h2,accu__0];
          var l2__0 = t2;
          var accu__0 = accu__3;
          continue;
        }
        return rev_append(l1__0, accu__0);
      }
      return rev_append(l2__0, accu__0);
    }
  }
  function sort(n, l) {
    if (2 === n) {
      if (l) {
        var m_ = l[2];
        if (m_) {
          var x2 = m_[1];
          var x1 = l[1];
          var c = call2(cmp, x1, x2);
          return 0 === c ?
            [0,x1,0] :
            0 <= c ? [0,x2,[0,x1,0]] : [0,x1,[0,x2,0]];
        }
      }
    }
    else if (3 === n) {
      if (l) {
        var n_ = l[2];
        if (n_) {
          var o_ = n_[2];
          if (o_) {
            var x3 = o_[1];
            var x2__0 = n_[1];
            var x1__0 = l[1];
            var c__0 = call2(cmp, x1__0, x2__0);
            if (0 === c__0) {
              var c__1 = call2(cmp, x2__0, x3);
              return 0 === c__1 ?
                [0,x2__0,0] :
                0 <= c__1 ? [0,x3,[0,x2__0,0]] : [0,x2__0,[0,x3,0]];
            }
            if (0 <= c__0) {
              var c__2 = call2(cmp, x1__0, x3);
              if (0 === c__2) {return [0,x2__0,[0,x1__0,0]];}
              if (0 <= c__2) {
                var c__3 = call2(cmp, x2__0, x3);
                return 0 === c__3 ?
                  [0,x2__0,[0,x1__0,0]] :
                  0 <= c__3 ?
                   [0,x3,[0,x2__0,[0,x1__0,0]]] :
                   [0,x2__0,[0,x3,[0,x1__0,0]]];
              }
              return [0,x2__0,[0,x1__0,[0,x3,0]]];
            }
            var c__4 = call2(cmp, x2__0, x3);
            if (0 === c__4) {return [0,x1__0,[0,x2__0,0]];}
            if (0 <= c__4) {
              var c__5 = call2(cmp, x1__0, x3);
              return 0 === c__5 ?
                [0,x1__0,[0,x2__0,0]] :
                0 <= c__5 ?
                 [0,x3,[0,x1__0,[0,x2__0,0]]] :
                 [0,x1__0,[0,x3,[0,x2__0,0]]];
            }
            return [0,x1__0,[0,x2__0,[0,x3,0]]];
          }
        }
      }
    }
    var n1 = n >> 1;
    var n2 = n - n1 | 0;
    var l2 = chop(n1, l);
    var s1 = rev_sort(n1, l);
    var s2 = rev_sort(n2, l2);
    return rev_merge_rev(s1, s2, 0);
  }
  function rev_sort(n, l) {
    if (2 === n) {
      if (l) {
        var j_ = l[2];
        if (j_) {
          var x2 = j_[1];
          var x1 = l[1];
          var c = call2(cmp, x1, x2);
          return 0 === c ?
            [0,x1,0] :
            0 < c ? [0,x1,[0,x2,0]] : [0,x2,[0,x1,0]];
        }
      }
    }
    else if (3 === n) {
      if (l) {
        var k_ = l[2];
        if (k_) {
          var l_ = k_[2];
          if (l_) {
            var x3 = l_[1];
            var x2__0 = k_[1];
            var x1__0 = l[1];
            var c__0 = call2(cmp, x1__0, x2__0);
            if (0 === c__0) {
              var c__1 = call2(cmp, x2__0, x3);
              return 0 === c__1 ?
                [0,x2__0,0] :
                0 < c__1 ? [0,x2__0,[0,x3,0]] : [0,x3,[0,x2__0,0]];
            }
            if (0 < c__0) {
              var c__2 = call2(cmp, x2__0, x3);
              if (0 === c__2) {return [0,x1__0,[0,x2__0,0]];}
              if (0 < c__2) {return [0,x1__0,[0,x2__0,[0,x3,0]]];}
              var c__3 = call2(cmp, x1__0, x3);
              return 0 === c__3 ?
                [0,x1__0,[0,x2__0,0]] :
                0 < c__3 ?
                 [0,x1__0,[0,x3,[0,x2__0,0]]] :
                 [0,x3,[0,x1__0,[0,x2__0,0]]];
            }
            var c__4 = call2(cmp, x1__0, x3);
            if (0 === c__4) {return [0,x2__0,[0,x1__0,0]];}
            if (0 < c__4) {return [0,x2__0,[0,x1__0,[0,x3,0]]];}
            var c__5 = call2(cmp, x2__0, x3);
            return 0 === c__5 ?
              [0,x2__0,[0,x1__0,0]] :
              0 < c__5 ?
               [0,x2__0,[0,x3,[0,x1__0,0]]] :
               [0,x3,[0,x2__0,[0,x1__0,0]]];
          }
        }
      }
    }
    var n1 = n >> 1;
    var n2 = n - n1 | 0;
    var l2 = chop(n1, l);
    var s1 = sort(n1, l);
    var s2 = sort(n2, l2);
    return rev_merge(s1, s2, 0);
  }
  var len = length(l);
  return 2 <= len ? sort(len, l) : l;
}

function compare_lengths(l1, l2) {
  var l1__0 = l1;
  var l2__0 = l2;
  for (; ; ) {
    if (l1__0) {
      if (l2__0) {
        var l2__1 = l2__0[2];
        var l1__1 = l1__0[2];
        var l1__0 = l1__1;
        var l2__0 = l2__1;
        continue;
      }
      return 1;
    }
    return l2__0 ? -1 : 0;
  }
}

function compare_length_with(l, n) {
  var l__0 = l;
  var n__0 = n;
  for (; ; ) {
    if (l__0) {
      var l__1 = l__0[2];
      if (0 < n__0) {
        var n__1 = n__0 + -1 | 0;
        var l__0 = l__1;
        var n__0 = n__1;
        continue;
      }
      return 1;
    }
    return 0 === n__0 ? 0 : 0 < n__0 ? -1 : 1;
  }
}

function to_seq(l) {
  function aux(l, param) {
    if (l) {
      var tail = l[2];
      var x = l[1];
      return [0,x,function(i_) {return aux(tail, i_);}];
    }
    return 0;
  }
  return function(h_) {return aux(l, h_);};
}

function of_seq(seq) {
  function direct(depth, seq) {
    if (0 === depth) {
      var f_ = 0;
      var g_ = function(acc, x) {return [0,x,acc];};
      return rev(call3(Stdlib_seq[7], g_, f_, seq));
    }
    var match = call1(seq, 0);
    if (match) {
      var next = match[2];
      var x = match[1];
      return [0,x,direct(depth + -1 | 0, next)];
    }
    return 0;
  }
  return direct(500, seq);
}

var Stdlib_list = [
  0,
  length,
  compare_lengths,
  compare_length_with,
  cons,
  hd,
  tl,
  nth,
  nth_opt,
  rev,
  init,
  a_,
  rev_append,
  flatten,
  flatten,
  iter,
  iteri,
  map,
  mapi,
  rev_map,
  filter_map,
  fold_left,
  fold_right,
  iter2,
  map2,
  rev_map2,
  fold_left2,
  fold_right2,
  for_all,
  exists,
  for_all2,
  exists2,
  mem,
  memq,
  find,
  find_opt,
  find_all,
  find_all,
  partition,
  assoc,
  assoc_opt,
  assq,
  assq_opt,
  mem_assoc,
  mem_assq,
  remove_assoc,
  remove_assq,
  split,
  combine,
  stable_sort,
  stable_sort,
  stable_sort,
  sort_uniq,
  merge,
  to_seq,
  of_seq
];

module.exports = Stdlib_list;

/*::type Exports = {
  _length_: (l: any) => any,
  compare_lengths: (l1: any, l2: any) => any,
  compare_length_with: (l: any, n: any) => any,
  cons: (a: any, l: any) => any,
  hd: (param: any) => any,
  tl: (param: any) => any,
  nth: (l: any, n: any) => any,
  nth_opt: (l: any, n: any) => any,
  rev: (l: any) => any,
  init: (len: any, f: any) => any,
  append: any,
  rev_append: (l1: any, l2: any) => any,
  flatten: (param: any) => any,
  iter: (f: any, param: any) => any,
  iteri: (f: any, l: any) => any,
  map: (f: any, param: any) => any,
  mapi: (f: any, l: any) => any,
  rev_map: (f: any, l: any) => any,
  filter_map: (f: any) => any,
  fold_left: (f: any, accu: any, l: any) => any,
  fold_right: (f: any, l: any, accu: any) => any,
  iter2: (f: any, l1: any, l2: any) => any,
  map2: (f: any, l1: any, l2: any) => any,
  rev_map2: (f: any, l1: any, l2: any) => any,
  fold_left2: (f: any, accu: any, l1: any, l2: any) => any,
  fold_right2: (f: any, l1: any, l2: any, accu: any) => any,
  for_all: (p: any, param: any) => any,
  exists: (p: any, param: any) => any,
  for_all2: (p: any, l1: any, l2: any) => any,
  exists2: (p: any, l1: any, l2: any) => any,
  mem: (x: any, param: any) => any,
  memq: (x: any, param: any) => any,
  find: (p: any, param: any) => any,
  find_opt: (p: any, param: any) => any,
  find_all: (p: any) => any,
  partition: (p: any, l: any) => any,
  assoc: (x: any, param: any) => any,
  assoc_opt: (x: any, param: any) => any,
  assq: (x: any, param: any) => any,
  assq_opt: (x: any, param: any) => any,
  mem_assoc: (x: any, param: any) => any,
  mem_assq: (x: any, param: any) => any,
  remove_assoc: (x: any, param: any) => any,
  remove_assq: (x: any, param: any) => any,
  split: (param: any) => any,
  combine: (l1: any, l2: any) => any,
  stable_sort: (cmp: any, l: any) => any,
  sort_uniq: (cmp: any, l: any) => any,
  merge: (cmp: any, l1: any, l2: any) => any,
  to_seq: (l: any) => any,
  of_seq: (seq: any) => any,
}*/
/** @type {{
  _length_: (l: any) => any,
  compare_lengths: (l1: any, l2: any) => any,
  compare_length_with: (l: any, n: any) => any,
  cons: (a: any, l: any) => any,
  hd: (param: any) => any,
  tl: (param: any) => any,
  nth: (l: any, n: any) => any,
  nth_opt: (l: any, n: any) => any,
  rev: (l: any) => any,
  init: (len: any, f: any) => any,
  append: any,
  rev_append: (l1: any, l2: any) => any,
  flatten: (param: any) => any,
  iter: (f: any, param: any) => any,
  iteri: (f: any, l: any) => any,
  map: (f: any, param: any) => any,
  mapi: (f: any, l: any) => any,
  rev_map: (f: any, l: any) => any,
  filter_map: (f: any) => any,
  fold_left: (f: any, accu: any, l: any) => any,
  fold_right: (f: any, l: any, accu: any) => any,
  iter2: (f: any, l1: any, l2: any) => any,
  map2: (f: any, l1: any, l2: any) => any,
  rev_map2: (f: any, l1: any, l2: any) => any,
  fold_left2: (f: any, accu: any, l1: any, l2: any) => any,
  fold_right2: (f: any, l1: any, l2: any, accu: any) => any,
  for_all: (p: any, param: any) => any,
  exists: (p: any, param: any) => any,
  for_all2: (p: any, l1: any, l2: any) => any,
  exists2: (p: any, l1: any, l2: any) => any,
  mem: (x: any, param: any) => any,
  memq: (x: any, param: any) => any,
  find: (p: any, param: any) => any,
  find_opt: (p: any, param: any) => any,
  find_all: (p: any) => any,
  partition: (p: any, l: any) => any,
  assoc: (x: any, param: any) => any,
  assoc_opt: (x: any, param: any) => any,
  assq: (x: any, param: any) => any,
  assq_opt: (x: any, param: any) => any,
  mem_assoc: (x: any, param: any) => any,
  mem_assq: (x: any, param: any) => any,
  remove_assoc: (x: any, param: any) => any,
  remove_assq: (x: any, param: any) => any,
  split: (param: any) => any,
  combine: (l1: any, l2: any) => any,
  stable_sort: (cmp: any, l: any) => any,
  sort_uniq: (cmp: any, l: any) => any,
  merge: (cmp: any, l1: any, l2: any) => any,
  to_seq: (l: any) => any,
  of_seq: (seq: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._length_ = module.exports[1];
module.exports.compare_lengths = module.exports[2];
module.exports.compare_length_with = module.exports[3];
module.exports.cons = module.exports[4];
module.exports.hd = module.exports[5];
module.exports.tl = module.exports[6];
module.exports.nth = module.exports[7];
module.exports.nth_opt = module.exports[8];
module.exports.rev = module.exports[9];
module.exports.init = module.exports[10];
module.exports.append = module.exports[11];
module.exports.rev_append = module.exports[12];
module.exports.flatten = module.exports[13];
module.exports.iter = module.exports[15];
module.exports.iteri = module.exports[16];
module.exports.map = module.exports[17];
module.exports.mapi = module.exports[18];
module.exports.rev_map = module.exports[19];
module.exports.filter_map = module.exports[20];
module.exports.fold_left = module.exports[21];
module.exports.fold_right = module.exports[22];
module.exports.iter2 = module.exports[23];
module.exports.map2 = module.exports[24];
module.exports.rev_map2 = module.exports[25];
module.exports.fold_left2 = module.exports[26];
module.exports.fold_right2 = module.exports[27];
module.exports.for_all = module.exports[28];
module.exports.exists = module.exports[29];
module.exports.for_all2 = module.exports[30];
module.exports.exists2 = module.exports[31];
module.exports.mem = module.exports[32];
module.exports.memq = module.exports[33];
module.exports.find = module.exports[34];
module.exports.find_opt = module.exports[35];
module.exports.find_all = module.exports[36];
module.exports.partition = module.exports[38];
module.exports.assoc = module.exports[39];
module.exports.assoc_opt = module.exports[40];
module.exports.assq = module.exports[41];
module.exports.assq_opt = module.exports[42];
module.exports.mem_assoc = module.exports[43];
module.exports.mem_assq = module.exports[44];
module.exports.remove_assoc = module.exports[45];
module.exports.remove_assq = module.exports[46];
module.exports.split = module.exports[47];
module.exports.combine = module.exports[48];
module.exports.stable_sort = module.exports[49];
module.exports.sort_uniq = module.exports[52];
module.exports.merge = module.exports[53];
module.exports.to_seq = module.exports[54];
module.exports.of_seq = module.exports[55];

/* Hashing disabled */
