/**
 * @flow strict
 * Set
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

var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var cst_Set_remove_min_elt = string("Set.remove_min_elt");
var cst_Set_bal = string("Set.bal");
var cst_Set_bal__0 = string("Set.bal");
var cst_Set_bal__1 = string("Set.bal");
var cst_Set_bal__2 = string("Set.bal");
var Not_found = require("../runtime/Not_found.js");
var Pervasives = require("./Pervasives.js");
var List = require("./List.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var a_ = [0,0,0,0];
var b_ = [0,0,0];
var c_ = [0,string("set.ml"),510,18];

function Make(Ord) {
  function height(param) {var h;if (param) {h = param[4];return h;}return 0;}
  function create(l, v, r) {
    var hr;
    var h__0;
    var hl;
    var h;
    if (l) {
      h = l[4];
      hl = h;
    }
    else hl = 0;
    if (r) {
      h__0 = r[4];
      hr = h__0;
    }
    else hr = 0;
    var ae_ = hr <= hl ? hl + 1 | 0 : hr + 1 | 0;
    return [0,l,v,r,ae_];
  }
  function bal(l, v, r) {
    var ac_;
    var rll;
    var rlv;
    var rlr;
    var ab_;
    var rl;
    var rv;
    var rr;
    var aa_;
    var lrl;
    var lrv;
    var lrr;
    var Z_;
    var ll;
    var lv;
    var lr;
    var hr;
    var h__0;
    var hl;
    var h;
    if (l) {
      h = l[4];
      hl = h;
    }
    else hl = 0;
    if (r) {
      h__0 = r[4];
      hr = h__0;
    }
    else hr = 0;
    if ((hr + 2 | 0) < hl) {
      if (l) {
        lr = l[3];
        lv = l[2];
        ll = l[1];
        Z_ = height(lr);
        if (Z_ <= height(ll)) {return create(ll, lv, create(lr, v, r));}
        if (lr) {
          lrr = lr[3];
          lrv = lr[2];
          lrl = lr[1];
          aa_ = create(lrr, v, r);
          return create(create(ll, lv, lrl), lrv, aa_);
        }
        return call1(Pervasives[1], cst_Set_bal);
      }
      return call1(Pervasives[1], cst_Set_bal__0);
    }
    if ((hl + 2 | 0) < hr) {
      if (r) {
        rr = r[3];
        rv = r[2];
        rl = r[1];
        ab_ = height(rl);
        if (ab_ <= height(rr)) {return create(create(l, v, rl), rv, rr);}
        if (rl) {
          rlr = rl[3];
          rlv = rl[2];
          rll = rl[1];
          ac_ = create(rlr, rv, rr);
          return create(create(l, v, rll), rlv, ac_);
        }
        return call1(Pervasives[1], cst_Set_bal__1);
      }
      return call1(Pervasives[1], cst_Set_bal__2);
    }
    var ad_ = hr <= hl ? hl + 1 | 0 : hr + 1 | 0;
    return [0,l,v,r,ad_];
  }
  function add(x, t) {
    var ll;
    var rr;
    var c;
    var l;
    var v;
    var r;
    if (t) {
      r = t[3];
      v = t[2];
      l = t[1];
      c = call2(Ord[1], x, v);
      if (0 === c) {return t;}
      if (0 <= c) {rr = add(x, r);return r === rr ? t : bal(l, v, rr);}
      ll = add(x, l);
      return l === ll ? t : bal(ll, v, r);
    }
    return [0,0,x,0,1];
  }
  function singleton(x) {return [0,0,x,0,1];}
  function add_min_element(x, param) {
    var l;
    var v;
    var r;
    if (param) {
      r = param[3];
      v = param[2];
      l = param[1];
      return bal(add_min_element(x, l), v, r);
    }
    return singleton(x);
  }
  function add_max_element(x, param) {
    var l;
    var v;
    var r;
    if (param) {
      r = param[3];
      v = param[2];
      l = param[1];
      return bal(l, v, add_max_element(x, r));
    }
    return singleton(x);
  }
  function join(l, v, r) {
    var ll;
    var lv;
    var lr;
    var lh;
    var rl;
    var rv;
    var rr;
    var rh;
    if (l) {
      if (r) {
        rh = r[4];
        rr = r[3];
        rv = r[2];
        rl = r[1];
        lh = l[4];
        lr = l[3];
        lv = l[2];
        ll = l[1];
        return (rh + 2 | 0) < lh ?
          bal(ll, lv, join(lr, v, r)) :
          (lh + 2 | 0) < rh ? bal(join(l, v, rl), rv, rr) : create(l, v, r);
      }
      return add_max_element(v, l);
    }
    return add_min_element(v, r);
  }
  function min_elt(param) {
    var Y_;
    var v;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        Y_ = param__0[1];
        if (Y_) {param__0 = Y_;continue;}
        v = param__0[2];
        return v;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function min_elt_opt(param) {
    var X_;
    var v;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        X_ = param__0[1];
        if (X_) {param__0 = X_;continue;}
        v = param__0[2];
        return [0,v];
      }
      return 0;
    }
  }
  function max_elt(param) {
    var V_;
    var W_;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        V_ = param__0[3];
        W_ = param__0[2];
        if (V_) {param__0 = V_;continue;}
        return W_;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function max_elt_opt(param) {
    var T_;
    var U_;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        T_ = param__0[3];
        U_ = param__0[2];
        if (T_) {param__0 = T_;continue;}
        return [0,U_];
      }
      return 0;
    }
  }
  function remove_min_elt(param) {
    var r__0;
    var v;
    var r;
    var S_;
    if (param) {
      S_ = param[1];
      if (S_) {
        r = param[3];
        v = param[2];
        return bal(remove_min_elt(S_), v, r);
      }
      r__0 = param[3];
      return r__0;
    }
    return call1(Pervasives[1], cst_Set_remove_min_elt);
  }
  function merge(t, match) {
    var R_;
    if (t) {
      if (match) {
        R_ = remove_min_elt(match);
        return bal(t, min_elt(match), R_);
      }
      return t;
    }
    return match;
  }
  function concat(t, match) {
    var Q_;
    if (t) {
      if (match) {
        Q_ = remove_min_elt(match);
        return join(t, min_elt(match), Q_);
      }
      return t;
    }
    return match;
  }
  function split(x, param) {
    var ll;
    var pres__0;
    var rl;
    var match__0;
    var lr;
    var pres;
    var rr;
    var match;
    var c;
    var l;
    var v;
    var r;
    if (param) {
      r = param[3];
      v = param[2];
      l = param[1];
      c = call2(Ord[1], x, v);
      if (0 === c) {return [0,l,1,r];}
      if (0 <= c) {
        match = split(x, r);
        rr = match[3];
        pres = match[2];
        lr = match[1];
        return [0,join(l, v, lr),pres,rr];
      }
      match__0 = split(x, l);
      rl = match__0[3];
      pres__0 = match__0[2];
      ll = match__0[1];
      return [0,ll,pres__0,join(rl, v, r)];
    }
    return a_;
  }
  var empty = 0;
  function is_empty(param) {return param ? 0 : 1;}
  function mem(x, param) {
    var r;
    var v;
    var l;
    var c;
    var P_;
    var param__1;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        c = call2(Ord[1], x, v);
        P_ = 0 === c ? 1 : 0;
        if (P_) {return P_;}
        param__1 = 0 <= c ? r : l;
        param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function remove(x, t) {
    var ll;
    var rr;
    var c;
    var l;
    var v;
    var r;
    if (t) {
      r = t[3];
      v = t[2];
      l = t[1];
      c = call2(Ord[1], x, v);
      if (0 === c) {return merge(l, r);}
      if (0 <= c) {rr = remove(x, r);return r === rr ? t : bal(l, v, rr);}
      ll = remove(x, l);
      return l === ll ? t : bal(ll, v, r);
    }
    return 0;
  }
  function union(t1, match) {
    var O_;
    var l1__0;
    var r1__0;
    var match__1;
    var N_;
    var l2__0;
    var r2__0;
    var match__0;
    var l1;
    var v1;
    var r1;
    var h1;
    var l2;
    var v2;
    var r2;
    var h2;
    if (t1) {
      if (match) {
        h2 = match[4];
        r2 = match[3];
        v2 = match[2];
        l2 = match[1];
        h1 = t1[4];
        r1 = t1[3];
        v1 = t1[2];
        l1 = t1[1];
        if (h2 <= h1) {
          if (1 === h2) {return add(v2, t1);}
          match__0 = split(v1, match);
          r2__0 = match__0[3];
          l2__0 = match__0[1];
          N_ = union(r1, r2__0);
          return join(union(l1, l2__0), v1, N_);
        }
        if (1 === h1) {return add(v1, match);}
        match__1 = split(v2, t1);
        r1__0 = match__1[3];
        l1__0 = match__1[1];
        O_ = union(r1__0, r2);
        return join(union(l1__0, l2), v2, O_);
      }
      return t1;
    }
    return match;
  }
  function inter(s1, match) {
    var M_;
    var r2__0;
    var L_;
    var r2;
    var K_;
    var J_;
    var l1;
    var v1;
    var r1;
    if (s1) {
      if (match) {
        r1 = s1[3];
        v1 = s1[2];
        l1 = s1[1];
        J_ = split(v1, match);
        K_ = J_[1];
        if (0 === J_[2]) {
          r2 = J_[3];
          L_ = inter(r1, r2);
          return concat(inter(l1, K_), L_);
        }
        r2__0 = J_[3];
        M_ = inter(r1, r2__0);
        return join(inter(l1, K_), v1, M_);
      }
      return 0;
    }
    return 0;
  }
  function diff(t1, match) {
    var I_;
    var r2__0;
    var H_;
    var r2;
    var G_;
    var F_;
    var l1;
    var v1;
    var r1;
    if (t1) {
      if (match) {
        r1 = t1[3];
        v1 = t1[2];
        l1 = t1[1];
        F_ = split(v1, match);
        G_ = F_[1];
        if (0 === F_[2]) {
          r2 = F_[3];
          H_ = diff(r1, r2);
          return join(diff(l1, G_), v1, H_);
        }
        r2__0 = F_[3];
        I_ = diff(r1, r2__0);
        return concat(diff(l1, G_), I_);
      }
      return t1;
    }
    return 0;
  }
  function cons_enum(s, e) {
    var r;
    var v;
    var s__1;
    var e__1;
    var s__0 = s;
    var e__0 = e;
    for (; ; ) {
      if (s__0) {
        r = s__0[3];
        v = s__0[2];
        s__1 = s__0[1];
        e__1 = [0,v,r,e__0];
        s__0 = s__1;
        e__0 = e__1;
        continue;
      }
      return e__0;
    }
  }
  function compare_aux(e1, e2) {
    var e2__1;
    var r2;
    var v2;
    var e1__1;
    var r1;
    var v1;
    var c;
    var e2__2;
    var e1__2;
    var e1__0 = e1;
    var e2__0 = e2;
    for (; ; ) {
      if (e1__0) {
        if (e2__0) {
          e2__1 = e2__0[3];
          r2 = e2__0[2];
          v2 = e2__0[1];
          e1__1 = e1__0[3];
          r1 = e1__0[2];
          v1 = e1__0[1];
          c = call2(Ord[1], v1, v2);
          if (0 === c) {
            e2__2 = cons_enum(r2, e2__1);
            e1__2 = cons_enum(r1, e1__1);
            e1__0 = e1__2;
            e2__0 = e2__2;
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
    var E_ = cons_enum(s2, 0);
    return compare_aux(cons_enum(s1, 0), E_);
  }
  function equal(s1, s2) {return 0 === compare(s1, s2) ? 1 : 0;}
  function subset(s1, s2) {
    var r2;
    var v2;
    var l2;
    var r1;
    var v1;
    var l1;
    var c;
    var B_;
    var C_;
    var D_;
    var s1__0 = s1;
    var s2__0 = s2;
    for (; ; ) {
      if (s1__0) {
        if (s2__0) {
          r2 = s2__0[3];
          v2 = s2__0[2];
          l2 = s2__0[1];
          r1 = s1__0[3];
          v1 = s1__0[2];
          l1 = s1__0[1];
          c = call2(Ord[1], v1, v2);
          if (0 === c) {
            B_ = subset(l1, l2);
            if (B_) {s1__0 = r1;s2__0 = r2;continue;}
            return B_;
          }
          if (0 <= c) {
            C_ = subset([0,0,v1,r1,0], r2);
            if (C_) {s1__0 = l1;continue;}
            return C_;
          }
          D_ = subset([0,l1,v1,0,0], l2);
          if (D_) {s1__0 = r1;continue;}
          return D_;
        }
        return 0;
      }
      return 1;
    }
  }
  function iter(f, param) {
    var param__1;
    var v;
    var l;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        param__1 = param__0[3];
        v = param__0[2];
        l = param__0[1];
        iter(f, l);
        call1(f, v);
        param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function fold(f, s, accu) {
    var s__1;
    var v;
    var l;
    var accu__1;
    var s__0 = s;
    var accu__0 = accu;
    for (; ; ) {
      if (s__0) {
        s__1 = s__0[3];
        v = s__0[2];
        l = s__0[1];
        accu__1 = call2(f, v, fold(f, l, accu__0));
        s__0 = s__1;
        accu__0 = accu__1;
        continue;
      }
      return accu__0;
    }
  }
  function for_all(p, param) {
    var r;
    var v;
    var l;
    var y_;
    var z_;
    var A_;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        y_ = call1(p, v);
        if (y_) {
          z_ = for_all(p, l);
          if (z_) {param__0 = r;continue;}
          A_ = z_;
        }
        else A_ = y_;
        return A_;
      }
      return 1;
    }
  }
  function exists(p, param) {
    var r;
    var v;
    var l;
    var v_;
    var w_;
    var x_;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        v_ = call1(p, v);
        if (v_) w_ = v_;
        else {x_ = exists(p, l);if (! x_) {param__0 = r;continue;}w_ = x_;}
        return w_;
      }
      return 0;
    }
  }
  function filter(p, t) {
    var r__0;
    var pv;
    var l__0;
    var l;
    var v;
    var r;
    if (t) {
      r = t[3];
      v = t[2];
      l = t[1];
      l__0 = filter(p, l);
      pv = call1(p, v);
      r__0 = filter(p, r);
      if (pv) {
        if (l === l__0) {if (r === r__0) {return t;}}
        return join(l__0, v, r__0);
      }
      return concat(l__0, r__0);
    }
    return 0;
  }
  function partition(p, param) {
    var u_;
    var t_;
    var rt;
    var rf;
    var match__0;
    var pv;
    var lt;
    var lf;
    var match;
    var l;
    var v;
    var r;
    if (param) {
      r = param[3];
      v = param[2];
      l = param[1];
      match = partition(p, l);
      lf = match[2];
      lt = match[1];
      pv = call1(p, v);
      match__0 = partition(p, r);
      rf = match__0[2];
      rt = match__0[1];
      if (pv) {t_ = concat(lf, rf);return [0,join(lt, v, rt),t_];}
      u_ = join(lf, v, rf);
      return [0,concat(lt, rt),u_];
    }
    return b_;
  }
  function cardinal(param) {
    var s_;
    var l;
    var r;
    if (param) {
      r = param[3];
      l = param[1];
      s_ = cardinal(r);
      return (cardinal(l) + 1 | 0) + s_ | 0;
    }
    return 0;
  }
  function elements_aux(accu, param) {
    var r;
    var v;
    var param__1;
    var accu__1;
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        param__1 = param__0[1];
        accu__1 = [0,v,elements_aux(accu__0, r)];
        accu__0 = accu__1;
        param__0 = param__1;
        continue;
      }
      return accu__0;
    }
  }
  function elements(s) {return elements_aux(0, s);}
  function find(x, param) {
    var r;
    var v;
    var l;
    var c;
    var param__1;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        c = call2(Ord[1], x, v);
        if (0 === c) {return v;}
        param__1 = 0 <= c ? r : l;
        param__0 = param__1;
        continue;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function find_first_aux(v0, f, param) {
    var r;
    var v;
    var l;
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {v0__0 = v;param__0 = l;continue;}
        param__0 = r;
        continue;
      }
      return v0__0;
    }
  }
  function find_first(f, param) {
    var r;
    var v;
    var l;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {return find_first_aux(v, f, l);}
        param__0 = r;
        continue;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function find_first_opt_aux(v0, f, param) {
    var r;
    var v;
    var l;
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {v0__0 = v;param__0 = l;continue;}
        param__0 = r;
        continue;
      }
      return [0,v0__0];
    }
  }
  function find_first_opt(f, param) {
    var r;
    var v;
    var l;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {return find_first_opt_aux(v, f, l);}
        param__0 = r;
        continue;
      }
      return 0;
    }
  }
  function find_last_aux(v0, f, param) {
    var r;
    var v;
    var l;
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {v0__0 = v;param__0 = r;continue;}
        param__0 = l;
        continue;
      }
      return v0__0;
    }
  }
  function find_last(f, param) {
    var r;
    var v;
    var l;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {return find_last_aux(v, f, r);}
        param__0 = l;
        continue;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function find_last_opt_aux(v0, f, param) {
    var r;
    var v;
    var l;
    var v0__0 = v0;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {v0__0 = v;param__0 = r;continue;}
        param__0 = l;
        continue;
      }
      return [0,v0__0];
    }
  }
  function find_last_opt(f, param) {
    var r;
    var v;
    var l;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        if (call1(f, v)) {return find_last_opt_aux(v, f, r);}
        param__0 = l;
        continue;
      }
      return 0;
    }
  }
  function find_opt(x, param) {
    var r;
    var v;
    var l;
    var c;
    var param__1;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        r = param__0[3];
        v = param__0[2];
        l = param__0[1];
        c = call2(Ord[1], x, v);
        if (0 === c) {return [0,v];}
        param__1 = 0 <= c ? r : l;
        param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  function try_join(l, v, r) {
    var switch__1;
    var switch__0;
    var r_;
    var q_;
    if (0 === l) switch__0 = 0;
    else {r_ = max_elt(l);switch__0 = 0 <= call2(Ord[1], r_, v) ? 1 : 0;}
    if (! switch__0) {
      if (0 === r) switch__1 = 0;
      else {q_ = min_elt(r);switch__1 = 0 <= call2(Ord[1], v, q_) ? 1 : 0;}
      if (! switch__1) {return join(l, v, r);}
    }
    return union(l, add(v, r));
  }
  function map(f, t) {
    var r__0;
    var v__0;
    var l__0;
    var l;
    var v;
    var r;
    if (t) {
      r = t[3];
      v = t[2];
      l = t[1];
      l__0 = map(f, l);
      v__0 = call1(f, v);
      r__0 = map(f, r);
      if (l === l__0) {if (v === v__0) {if (r === r__0) {return t;}}}
      return try_join(l__0, v__0, r__0);
    }
    return 0;
  }
  function of_sorted_list(l) {
    function sub(n, l) {
      var x0__1;
      var x1__0;
      var x2;
      var l__5;
      var p_;
      var o_;
      var x0__0;
      var x1;
      var l__4;
      var n_;
      var x0;
      var l__3;
      var right;
      var l__2;
      var match__0;
      var mid;
      var l__1;
      if (! (3 < n >>> 0)) {
        switch (n) {
          case 0:
            return [0,0,l];
          case 1:
            if (l) {l__3 = l[2];x0 = l[1];return [0,[0,0,x0,0,1],l__3];}
            break;
          case 2:
            if (l) {
              n_ = l[2];
              if (n_) {
                l__4 = n_[2];
                x1 = n_[1];
                x0__0 = l[1];
                return [0,[0,[0,0,x0__0,0,1],x1,0,2],l__4];
              }
            }
            break;
          default:
            if (l) {
              o_ = l[2];
              if (o_) {
                p_ = o_[2];
                if (p_) {
                  l__5 = p_[2];
                  x2 = p_[1];
                  x1__0 = o_[1];
                  x0__1 = l[1];
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
        l__1 = l__0[2];
        mid = l__0[1];
        match__0 = sub((n - nl | 0) + -1 | 0, l__1);
        l__2 = match__0[2];
        right = match__0[1];
        return [0,create(left, mid, right),l__2];
      }
      throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
    }
    return sub(call1(List[1], l), l)[1];
  }
  function of_list(l) {
    var x4;
    var m_;
    var l_;
    var k_;
    var j_;
    var i_;
    var h_;
    var g_;
    var f_;
    if (l) {
      f_ = l[2];
      g_ = l[1];
      if (f_) {
        h_ = f_[2];
        i_ = f_[1];
        if (h_) {
          j_ = h_[2];
          k_ = h_[1];
          if (j_) {
            l_ = j_[2];
            m_ = j_[1];
            if (l_) {
              if (l_[2]) {return of_sorted_list(call2(List[51], Ord[1], l));}
              x4 = l_[1];
              return add(x4, add(m_, add(k_, add(i_, singleton(g_)))));
            }
            return add(m_, add(k_, add(i_, singleton(g_))));
          }
          return add(k_, add(i_, singleton(g_)));
        }
        return add(i_, singleton(g_));
      }
      return singleton(g_);
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
  function(d_) {
    var e_ = Make(d_);
    return [
      0,
      e_[17],
      e_[18],
      e_[19],
      e_[4],
      e_[5],
      e_[20],
      e_[21],
      e_[22],
      e_[23],
      e_[26],
      e_[27],
      e_[28],
      e_[29],
      e_[51],
      e_[30],
      e_[31],
      e_[32],
      e_[33],
      e_[34],
      e_[35],
      e_[37],
      e_[9],
      e_[10],
      e_[11],
      e_[12],
      e_[38],
      e_[39],
      e_[16],
      e_[40],
      e_[49],
      e_[42],
      e_[44],
      e_[46],
      e_[48],
      e_[53]
    ];
  }
];

module.exports = Set;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);

/* Hashing disabled */
