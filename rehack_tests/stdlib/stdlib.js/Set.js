/**
 * Set
 * @providesModule Set
 */
"use strict";
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Not_found = require('Not_found.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Set_remove_min_elt = caml_new_string("Set.remove_min_elt");
var cst_Set_bal = caml_new_string("Set.bal");
var cst_Set_bal__0 = caml_new_string("Set.bal");
var cst_Set_bal__1 = caml_new_string("Set.bal");
var cst_Set_bal__2 = caml_new_string("Set.bal");
var Not_found = global_data["Not_found"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var Assert_failure = global_data["Assert_failure"];
var fl = [0,0,0,0];
var fm = [0,0,0];
var fn = [0,caml_new_string("set.ml"),510,18];

function Make(Ord) {
  function height(param) {if (param) {var h = param[4];return h;}return 0;}
  function create(l, v, r) {
    if (l) {
      var h = l[4];
      var hl = h;
    }
    else var hl = 0;
    if (r) {
      var h__0 = r[4];
      var hr = h__0;
    }
    else var hr = 0;
    var ge = hr <= hl ? hl + 1 | 0 : hr + 1 | 0;
    return [0,l,v,r,ge];
  }
  function bal(l, v, r) {
    if (l) {
      var h = l[4];
      var hl = h;
    }
    else var hl = 0;
    if (r) {
      var h__0 = r[4];
      var hr = h__0;
    }
    else var hr = 0;
    if ((hr + 2 | 0) < hl) {
      if (l) {
        var lr = l[3];
        var lv = l[2];
        var ll = l[1];
        var f_ = height(lr);
        if (f_ <= height(ll)) {return create(ll, lv, create(lr, v, r));}
        if (lr) {
          var lrr = lr[3];
          var lrv = lr[2];
          var lrl = lr[1];
          var ga = create(lrr, v, r);
          return create(create(ll, lv, lrl), lrv, ga);
        }
        return caml_call1(Pervasives[1], cst_Set_bal);
      }
      return caml_call1(Pervasives[1], cst_Set_bal__0);
    }
    if ((hl + 2 | 0) < hr) {
      if (r) {
        var rr = r[3];
        var rv = r[2];
        var rl = r[1];
        var gb = height(rl);
        if (gb <= height(rr)) {return create(create(l, v, rl), rv, rr);}
        if (rl) {
          var rlr = rl[3];
          var rlv = rl[2];
          var rll = rl[1];
          var gc = create(rlr, rv, rr);
          return create(create(l, v, rll), rlv, gc);
        }
        return caml_call1(Pervasives[1], cst_Set_bal__1);
      }
      return caml_call1(Pervasives[1], cst_Set_bal__2);
    }
    var gd = hr <= hl ? hl + 1 | 0 : hr + 1 | 0;
    return [0,l,v,r,gd];
  }
  function add(x, t) {
    if (t) {
      var r = t[3];
      var v = t[2];
      var l = t[1];
      var c = caml_call2(Ord[1], x, v);
      if (0 === c) {return t;}
      if (0 <= c) {var rr = add(x, r);return r === rr ? t : bal(l, v, rr);}
      var ll = add(x, l);
      return l === ll ? t : bal(ll, v, r);
    }
    return [0,0,x,0,1];
  }
  function singleton(x) {return [0,0,x,0,1];}
  function add_min_element(x, param) {
    if (param) {
      var r = param[3];
      var v = param[2];
      var l = param[1];
      return bal(add_min_element(x, l), v, r);
    }
    return singleton(x);
  }
  function add_max_element(x, param) {
    if (param) {
      var r = param[3];
      var v = param[2];
      var l = param[1];
      return bal(l, v, add_max_element(x, r));
    }
    return singleton(x);
  }
  function join(l, v, r) {
    if (l) {
      if (r) {
        var rh = r[4];
        var rr = r[3];
        var rv = r[2];
        var rl = r[1];
        var lh = l[4];
        var lr = l[3];
        var lv = l[2];
        var ll = l[1];
        return (rh + 2 | 0) < lh ?
          bal(ll, lv, join(lr, v, r)) :
          (lh + 2 | 0) < rh ? bal(join(l, v, rl), rv, rr) : create(l, v, r);
      }
      return add_max_element(v, l);
    }
    return add_min_element(v, r);
  }
  function min_elt(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var f9 = param__0[1];
        if (f9) {var param__0 = f9;continue;}
        var v = param__0[2];
        return v;
      }
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function min_elt_opt(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var f8 = param__0[1];
        if (f8) {var param__0 = f8;continue;}
        var v = param__0[2];
        return [0,v];
      }
      return 0;
    }
  }
  function max_elt(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var f6 = param__0[3];
        var f7 = param__0[2];
        if (f6) {var param__0 = f6;continue;}
        return f7;
      }
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function max_elt_opt(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var f4 = param__0[3];
        var f5 = param__0[2];
        if (f4) {var param__0 = f4;continue;}
        return [0,f5];
      }
      return 0;
    }
  }
  function remove_min_elt(param) {
    if (param) {
      var f3 = param[1];
      if (f3) {
        var r = param[3];
        var v = param[2];
        return bal(remove_min_elt(f3), v, r);
      }
      var r__0 = param[3];
      return r__0;
    }
    return caml_call1(Pervasives[1], cst_Set_remove_min_elt);
  }
  function merge(t, match) {
    if (t) {
      if (match) {
        var f2 = remove_min_elt(match);
        return bal(t, min_elt(match), f2);
      }
      return t;
    }
    return match;
  }
  function concat(t, match) {
    if (t) {
      if (match) {
        var f1 = remove_min_elt(match);
        return join(t, min_elt(match), f1);
      }
      return t;
    }
    return match;
  }
  function split(x, param) {
    if (param) {
      var r = param[3];
      var v = param[2];
      var l = param[1];
      var c = caml_call2(Ord[1], x, v);
      if (0 === c) {return [0,l,1,r];}
      if (0 <= c) {
        var match = split(x, r);
        var rr = match[3];
        var pres = match[2];
        var lr = match[1];
        return [0,join(l, v, lr),pres,rr];
      }
      var match__0 = split(x, l);
      var rl = match__0[3];
      var pres__0 = match__0[2];
      var ll = match__0[1];
      return [0,ll,pres__0,join(rl, v, r)];
    }
    return fl;
  }
  var empty = 0;
  function is_empty(param) {return param ? 0 : 1;}
  function mem(x, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        var c = caml_call2(Ord[1], x, v);
        var f0 = 0 === c ? 1 : 0;
        if (f0) {return f0;}
        var param__1 = 0 <= c ? r : l;
        var param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function remove(x, t) {
    if (t) {
      var r = t[3];
      var v = t[2];
      var l = t[1];
      var c = caml_call2(Ord[1], x, v);
      if (0 === c) {return merge(l, r);}
      if (0 <= c) {var rr = remove(x, r);return r === rr ? t : bal(l, v, rr);}
      var ll = remove(x, l);
      return l === ll ? t : bal(ll, v, r);
    }
    return 0;
  }
  function union(t1, match) {
    if (t1) {
      if (match) {
        var h2 = match[4];
        var r2 = match[3];
        var v2 = match[2];
        var l2 = match[1];
        var h1 = t1[4];
        var r1 = t1[3];
        var v1 = t1[2];
        var l1 = t1[1];
        if (h2 <= h1) {
          if (1 === h2) {return add(v2, t1);}
          var match__0 = split(v1, match);
          var r2__0 = match__0[3];
          var l2__0 = match__0[1];
          var fY = union(r1, r2__0);
          return join(union(l1, l2__0), v1, fY);
        }
        if (1 === h1) {return add(v1, match);}
        var match__1 = split(v2, t1);
        var r1__0 = match__1[3];
        var l1__0 = match__1[1];
        var fZ = union(r1__0, r2);
        return join(union(l1__0, l2), v2, fZ);
      }
      return t1;
    }
    return match;
  }
  function inter(s1, match) {
    if (s1) {
      if (match) {
        var r1 = s1[3];
        var v1 = s1[2];
        var l1 = s1[1];
        var fU = split(v1, match);
        var fV = fU[1];
        if (0 === fU[2]) {
          var r2 = fU[3];
          var fW = inter(r1, r2);
          return concat(inter(l1, fV), fW);
        }
        var r2__0 = fU[3];
        var fX = inter(r1, r2__0);
        return join(inter(l1, fV), v1, fX);
      }
      return 0;
    }
    return 0;
  }
  function diff(t1, match) {
    if (t1) {
      if (match) {
        var r1 = t1[3];
        var v1 = t1[2];
        var l1 = t1[1];
        var fQ = split(v1, match);
        var fR = fQ[1];
        if (0 === fQ[2]) {
          var r2 = fQ[3];
          var fS = diff(r1, r2);
          return join(diff(l1, fR), v1, fS);
        }
        var r2__0 = fQ[3];
        var fT = diff(r1, r2__0);
        return concat(diff(l1, fR), fT);
      }
      return t1;
    }
    return 0;
  }
  function cons_enum(s, e) {
    var s__0 = s;
    var e__0 = e;
    for (; ; ) {
      if (s__0) {
        var r = s__0[3];
        var v = s__0[2];
        var s__1 = s__0[1];
        var e__1 = [0,v,r,e__0];
        var s__0 = s__1;
        var e__0 = e__1;
        continue;
      }
      return e__0;
    }
  }
  function compare_aux(e1, e2) {
    var e1__0 = e1;
    var e2__0 = e2;
    for (; ; ) {
      if (e1__0) {
        if (e2__0) {
          var e2__1 = e2__0[3];
          var r2 = e2__0[2];
          var v2 = e2__0[1];
          var e1__1 = e1__0[3];
          var r1 = e1__0[2];
          var v1 = e1__0[1];
          var c = caml_call2(Ord[1], v1, v2);
          if (0 === c) {
            var e2__2 = cons_enum(r2, e2__1);
            var e1__2 = cons_enum(r1, e1__1);
            var e1__0 = e1__2;
            var e2__0 = e2__2;
            continue;
          }
          return c;
        }
        return 1;
      }
      return e2__0 ? -1 : 0;
    }
  }
  function compare(s1, s2) {
    var fP = cons_enum(s2, 0);
    return compare_aux(cons_enum(s1, 0), fP);
  }
  function equal(s1, s2) {return 0 === compare(s1, s2) ? 1 : 0;}
  function subset(s1, s2) {
    var s1__0 = s1;
    var s2__0 = s2;
    for (; ; ) {
      if (s1__0) {
        if (s2__0) {
          var r2 = s2__0[3];
          var v2 = s2__0[2];
          var l2 = s2__0[1];
          var r1 = s1__0[3];
          var v1 = s1__0[2];
          var l1 = s1__0[1];
          var c = caml_call2(Ord[1], v1, v2);
          if (0 === c) {
            var fM = subset(l1, l2);
            if (fM) {var s1__0 = r1;var s2__0 = r2;continue;}
            return fM;
          }
          if (0 <= c) {
            var fN = subset([0,0,v1,r1,0], r2);
            if (fN) {var s1__0 = l1;continue;}
            return fN;
          }
          var fO = subset([0,l1,v1,0,0], l2);
          if (fO) {var s1__0 = r1;continue;}
          return fO;
        }
        return 0;
      }
      return 1;
    }
  }
  function iter(f, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var param__1 = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        iter(f, l);
        caml_call1(f, v);
        var param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function fold(f, s, accu) {
    var s__0 = s;
    var accu__0 = accu;
    for (; ; ) {
      if (s__0) {
        var s__1 = s__0[3];
        var v = s__0[2];
        var l = s__0[1];
        var accu__1 = caml_call2(f, v, fold(f, l, accu__0));
        var s__0 = s__1;
        var accu__0 = accu__1;
        continue;
      }
      return accu__0;
    }
  }
  function for_all(p, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        var fJ = caml_call1(p, v);
        if (fJ) {
          var fK = for_all(p, l);
          if (fK) {var param__0 = r;continue;}
          var fL = fK;
        }
        else var fL = fJ;
        return fL;
      }
      return 1;
    }
  }
  function exists(p, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        var fG = caml_call1(p, v);
        if (fG) var fH = fG;
        else {
          var fI = exists(p, l);
          if (! fI) {var param__0 = r;continue;}
          var fH = fI;
        }
        return fH;
      }
      return 0;
    }
  }
  function filter(p, t) {
    if (t) {
      var r = t[3];
      var v = t[2];
      var l = t[1];
      var l__0 = filter(p, l);
      var pv = caml_call1(p, v);
      var r__0 = filter(p, r);
      if (pv) {
        if (l === l__0) {if (r === r__0) {return t;}}
        return join(l__0, v, r__0);
      }
      return concat(l__0, r__0);
    }
    return 0;
  }
  function partition(p, param) {
    if (param) {
      var r = param[3];
      var v = param[2];
      var l = param[1];
      var match = partition(p, l);
      var lf = match[2];
      var lt = match[1];
      var pv = caml_call1(p, v);
      var match__0 = partition(p, r);
      var rf = match__0[2];
      var rt = match__0[1];
      if (pv) {var fE = concat(lf, rf);return [0,join(lt, v, rt),fE];}
      var fF = join(lf, v, rf);
      return [0,concat(lt, rt),fF];
    }
    return fm;
  }
  function cardinal(param) {
    if (param) {
      var r = param[3];
      var l = param[1];
      var fD = cardinal(r);
      return (cardinal(l) + 1 | 0) + fD | 0;
    }
    return 0;
  }
  function elements_aux(accu, param) {
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var param__1 = param__0[1];
        var accu__1 = [0,v,elements_aux(accu__0, r)];
        var accu__0 = accu__1;
        var param__0 = param__1;
        continue;
      }
      return accu__0;
    }
  }
  function elements(s) {return elements_aux(0, s);}
  function find(x, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        var c = caml_call2(Ord[1], x, v);
        if (0 === c) {return v;}
        var param__1 = 0 <= c ? r : l;
        var param__0 = param__1;
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function find_first_aux(v0, f, param) {
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {var v0__0 = v;var param__0 = l;continue;}
        var param__0 = r;
        continue;
      }
      return v0__0;
    }
  }
  function find_first(f, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {return find_first_aux(v, f, l);}
        var param__0 = r;
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function find_first_opt_aux(v0, f, param) {
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {var v0__0 = v;var param__0 = l;continue;}
        var param__0 = r;
        continue;
      }
      return [0,v0__0];
    }
  }
  function find_first_opt(f, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {return find_first_opt_aux(v, f, l);}
        var param__0 = r;
        continue;
      }
      return 0;
    }
  }
  function find_last_aux(v0, f, param) {
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {var v0__0 = v;var param__0 = r;continue;}
        var param__0 = l;
        continue;
      }
      return v0__0;
    }
  }
  function find_last(f, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {return find_last_aux(v, f, r);}
        var param__0 = l;
        continue;
      }
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function find_last_opt_aux(v0, f, param) {
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {var v0__0 = v;var param__0 = r;continue;}
        var param__0 = l;
        continue;
      }
      return [0,v0__0];
    }
  }
  function find_last_opt(f, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        if (caml_call1(f, v)) {return find_last_opt_aux(v, f, r);}
        var param__0 = l;
        continue;
      }
      return 0;
    }
  }
  function find_opt(x, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var r = param__0[3];
        var v = param__0[2];
        var l = param__0[1];
        var c = caml_call2(Ord[1], x, v);
        if (0 === c) {return [0,v];}
        var param__1 = 0 <= c ? r : l;
        var param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function try_join(l, v, r) {
    if (0 === l) var switch__0 = 0;
    else {
      var fC = max_elt(l);
      var switch__0 = 0 <= caml_call2(Ord[1], fC, v) ? 1 : 0;
    }
    if (! switch__0) {
      if (0 === r) var switch__1 = 0;
      else {
        var fB = min_elt(r);
        var switch__1 = 0 <= caml_call2(Ord[1], v, fB) ? 1 : 0;
      }
      if (! switch__1) {return join(l, v, r);}
    }
    return union(l, add(v, r));
  }
  function map(f, t) {
    if (t) {
      var r = t[3];
      var v = t[2];
      var l = t[1];
      var l__0 = map(f, l);
      var v__0 = caml_call1(f, v);
      var r__0 = map(f, r);
      if (l === l__0) {if (v === v__0) {if (r === r__0) {return t;}}}
      return try_join(l__0, v__0, r__0);
    }
    return 0;
  }
  function of_sorted_list(l) {
    function sub(n, l) {
      if (! (3 < n >>> 0)) {
        switch (n) {
          case 0:
            return [0,0,l];
          case 1:
            if (l) {
              var l__3 = l[2];
              var x0 = l[1];
              return [0,[0,0,x0,0,1],l__3];
            }
            break;
          case 2:
            if (l) {
              var fy = l[2];
              if (fy) {
                var l__4 = fy[2];
                var x1 = fy[1];
                var x0__0 = l[1];
                return [0,[0,[0,0,x0__0,0,1],x1,0,2],l__4];
              }
            }
            break;
          default:
            if (l) {
              var fz = l[2];
              if (fz) {
                var fA = fz[2];
                if (fA) {
                  var l__5 = fA[2];
                  var x2 = fA[1];
                  var x1__0 = fz[1];
                  var x0__1 = l[1];
                  return [0,[0,[0,0,x0__1,0,1],x1__0,[0,0,x2,0,1],2],l__5];
                }
              }
            }
          }
      }
      var nl = n / 2 | 0;
      var match = sub(nl, l);
      var l__0 = match[2];
      var left = match[1];
      if (l__0) {
        var l__1 = l__0[2];
        var mid = l__0[1];
        var match__0 = sub((n - nl | 0) + -1 | 0, l__1);
        var l__2 = match__0[2];
        var right = match__0[1];
        return [0,create(left, mid, right),l__2];
      }
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,fn]);
    }
    return sub(caml_call1(List[1], l), l)[1];
  }
  function of_list(l) {
    if (l) {
      var fq = l[2];
      var fr = l[1];
      if (fq) {
        var fs = fq[2];
        var ft = fq[1];
        if (fs) {
          var fu = fs[2];
          var fv = fs[1];
          if (fu) {
            var fw = fu[2];
            var fx = fu[1];
            if (fw) {
              if (fw[2]) {
                return of_sorted_list(caml_call2(List[51], Ord[1], l));
              }
              var x4 = fw[1];
              return add(x4, add(fx, add(fv, add(ft, singleton(fr)))));
            }
            return add(fx, add(fv, add(ft, singleton(fr))));
          }
          return add(fv, add(ft, singleton(fr)));
        }
        return add(ft, singleton(fr));
      }
      return singleton(fr);
    }
    return empty;
  }
  return [
    0,
    height,
    create,
    bal,
    add,
    singleton,
    add_min_element,
    add_max_element,
    join,
    min_elt,
    min_elt_opt,
    max_elt,
    max_elt_opt,
    remove_min_elt,
    merge,
    concat,
    split,
    empty,
    is_empty,
    mem,
    remove,
    union,
    inter,
    diff,
    cons_enum,
    compare_aux,
    compare,
    equal,
    subset,
    iter,
    fold,
    for_all,
    exists,
    filter,
    partition,
    cardinal,
    elements_aux,
    elements,
    min_elt,
    min_elt_opt,
    find,
    find_first_aux,
    find_first,
    find_first_opt_aux,
    find_first_opt,
    find_last_aux,
    find_last,
    find_last_opt_aux,
    find_last_opt,
    find_opt,
    try_join,
    map,
    of_sorted_list,
    of_list
  ];
}

var Set = [
  0,
  function(fo) {
    var fp = Make(fo);
    return [
      0,
      fp[17],
      fp[18],
      fp[19],
      fp[4],
      fp[5],
      fp[20],
      fp[21],
      fp[22],
      fp[23],
      fp[26],
      fp[27],
      fp[28],
      fp[29],
      fp[51],
      fp[30],
      fp[31],
      fp[32],
      fp[33],
      fp[34],
      fp[35],
      fp[37],
      fp[9],
      fp[10],
      fp[11],
      fp[12],
      fp[38],
      fp[39],
      fp[16],
      fp[40],
      fp[49],
      fp[42],
      fp[44],
      fp[46],
      fp[48],
      fp[53]
    ];
  }
];

runtime["caml_register_global"](12, Set, "Set");


module.exports = global.jsoo_runtime.caml_get_global_data().Set;