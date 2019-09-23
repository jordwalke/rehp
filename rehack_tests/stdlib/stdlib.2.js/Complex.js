(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     zero=[254,0.,0.],
     one=[254,1.,0.],
     i=[254,0.,1.],
     _a_=[254,0.,0.];
    function add(x,y){return [254,x[1] + y[1],x[2] + y[2]]}
    function sub(x,y){return [254,x[1] - y[1],x[2] - y[2]]}
    function neg(x){return [254,- x[1],- x[2]]}
    function conj(x){return [254,x[1],- x[2]]}
    function mul(x,y)
     {return [254,x[1] * y[1] - x[2] * y[2],x[1] * y[2] + x[2] * y[1]]}
    function div(x,y)
     {if(Math.abs(y[2]) <= Math.abs(y[1]))
       {var r=y[2] / y[1],d=y[1] + r * y[2];
        return [254,(x[1] + r * x[2]) / d,(x[2] - r * x[1]) / d]}
      var r$0=y[1] / y[2],d$0=y[2] + r$0 * y[1];
      return [254,(r$0 * x[1] + x[2]) / d$0,(r$0 * x[2] - x[1]) / d$0]}
    function inv(x){return div(one,x)}
    function norm2(x){return x[1] * x[1] + x[2] * x[2]}
    function norm(x)
     {var r=Math.abs(x[1]),i=Math.abs(x[2]);
      if(r == 0.)return i;
      if(i == 0.)return r;
      if(i <= r){var q=i / r;return r * Math.sqrt(1. + q * q)}
      var q$0=r / i;
      return i * Math.sqrt(1. + q$0 * q$0)}
    function arg(x){return Math.atan2(x[2],x[1])}
    function polar(n,a){return [254,Math.cos(a) * n,Math.sin(a) * n]}
    function sqrt(x)
     {if(x[1] == 0.)if(x[2] == 0.)return _a_;
      var r=Math.abs(x[1]),i=Math.abs(x[2]);
      if(i <= r)
       var
        q=i / r,
        w=Math.sqrt(r) * Math.sqrt(0.5 * (1. + Math.sqrt(1. + q * q)));
      else
       var
        q$0=r / i,
        w=Math.sqrt(i) * Math.sqrt(0.5 * (q$0 + Math.sqrt(1. + q$0 * q$0)));
      if(0. <= x[1])return [254,w,0.5 * x[2] / w];
      var w$0=0. <= x[2]?w:- w;
      return [254,0.5 * i / w,w$0]}
    function exp(x)
     {var e=Math.exp(x[1]);return [254,e * Math.cos(x[2]),e * Math.sin(x[2])]}
    function log(x)
     {var _b_=Math.atan2(x[2],x[1]);return [254,Math.log(norm(x)),_b_]}
    function pow(x,y){return exp(mul(y,log(x)))}
    var
     Complex=
      [0,
       zero,
       one,
       i,
       neg,
       conj,
       add,
       sub,
       mul,
       inv,
       div,
       sqrt,
       norm2,
       norm,
       arg,
       polar,
       exp,
       log,
       pow];
    runtime.caml_register_global(19,Complex,"Complex");
    return}
  (function(){return this}()));
