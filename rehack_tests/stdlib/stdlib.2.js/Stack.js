(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string;
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Stack_Empty=caml_new_string("Stack.Empty"),
     List=global_data.List,
     Empty=[248,cst_Stack_Empty,runtime.caml_fresh_oo_id(0)];
    function create(param){return [0,0,0]}
    function clear(s){s[1] = 0;s[2] = 0;return 0}
    function copy(s){return [0,s[1],s[2]]}
    function push(x,s){s[1] = [0,x,s[1]];s[2] = s[2] + 1 | 0;return 0}
    function pop(s)
     {var _b_=s[1];
      if(_b_){var tl=_b_[2],hd=_b_[1];s[1] = tl;s[2] = s[2] - 1 | 0;return hd}
      throw Empty}
    function top(s){var _a_=s[1];if(_a_){var hd=_a_[1];return hd}throw Empty}
    function is_empty(s){return 0 === s[1]?1:0}
    function length(s){return s[2]}
    function iter(f,s){return caml_call2(List[15],f,s[1])}
    function fold(f,acc,s){return caml_call3(List[20],f,acc,s[1])}
    var
     Stack=
      [0,Empty,create,push,pop,top,clear,copy,is_empty,length,iter,fold];
    runtime.caml_register_global(2,Stack,"Stack");
    return}
  (function(){return this}()));
