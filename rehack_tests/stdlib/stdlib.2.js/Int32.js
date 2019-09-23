(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception,
     global_data=runtime.caml_get_global_data(),
     cst_d=caml_new_string("%d"),
     Failure=global_data.Failure,
     zero=0,
     one=1,
     minus_one=-1;
    function succ(n){return n + 1 | 0}
    function pred(n){return n - 1 | 0}
    function abs(n){return runtime.caml_greaterequal(n,0)?n:- n | 0}
    var min_int=-2147483648,max_int=2147483647;
    function lognot(n){return n ^ -1}
    function to_string(n){return runtime.caml_format_int(cst_d,n)}
    function of_string_opt(s)
     {try
       {var _a_=[0,runtime.caml_int_of_string(s)];return _a_}
      catch(_b_)
       {_b_ = caml_wrap_exception(_b_);
        if(_b_[1] === Failure)return 0;
        throw _b_}}
    function compare(x,y){return runtime.caml_int_compare(x,y)}
    function equal(x,y){return 0 === compare(x,y)?1:0}
    var
     Int32=
      [0,
       zero,
       one,
       minus_one,
       succ,
       pred,
       abs,
       max_int,
       min_int,
       lognot,
       of_string_opt,
       to_string,
       compare,
       equal];
    runtime.caml_register_global(11,Int32,"Int32");
    return}
  (function(){return this}()));
