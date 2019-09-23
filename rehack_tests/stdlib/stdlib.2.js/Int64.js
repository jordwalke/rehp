(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception,
     global_data=runtime.caml_get_global_data(),
     cst_d=caml_new_string("%d"),
     zero=[255,0,0,0],
     one=[255,1,0,0],
     minus_one=[255,16777215,16777215,65535],
     min_int=[255,0,0,32768],
     max_int=[255,16777215,16777215,32767],
     Failure=global_data.Failure,
     _d_=[255,16777215,16777215,65535],
     _c_=[255,0,0,0],
     _b_=[255,1,0,0],
     _a_=[255,1,0,0];
    function succ(n){return runtime.caml_int64_add(n,_a_)}
    function pred(n){return runtime.caml_int64_sub(n,_b_)}
    function abs(n)
     {return runtime.caml_greaterequal(n,_c_)?n:runtime.caml_int64_neg(n)}
    function lognot(n){return runtime.caml_int64_xor(n,_d_)}
    function to_string(n){return runtime.caml_int64_format(cst_d,n)}
    function of_string_opt(s)
     {try
       {var _e_=[0,runtime.caml_int64_of_string(s)];return _e_}
      catch(_f_)
       {_f_ = caml_wrap_exception(_f_);
        if(_f_[1] === Failure)return 0;
        throw _f_}}
    function compare(x,y){return runtime.caml_int64_compare(x,y)}
    function equal(x,y){return 0 === compare(x,y)?1:0}
    var
     Int64=
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
    runtime.caml_register_global(11,Int64,"Int64");
    return}
  (function(){return this}()));
