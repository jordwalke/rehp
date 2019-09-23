(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_obj_tag=runtime.caml_obj_tag,
     global_data=runtime.caml_get_global_data(),
     Obj=global_data.Obj,
     CamlinternalLazy=global_data.CamlinternalLazy,
     Undefined=CamlinternalLazy[1],
     force_val=CamlinternalLazy[5];
    function from_fun(f)
     {var x=runtime.caml_obj_block(Obj[6],1);x[1] = f;return x}
    function from_val(v)
     {var t=caml_obj_tag(v);
      if(t !== Obj[10])if(t !== Obj[6])if(t !== Obj[14])return v;
      return runtime.caml_lazy_make_forward(v)}
    function is_val(l){var _a_=Obj[6];return caml_obj_tag(l) !== _a_?1:0}
    var
     Lazy=
      [0,
       Undefined,
       force_val,
       from_fun,
       from_val,
       is_val,
       from_fun,
       from_val,
       is_val];
    runtime.caml_register_global(2,Lazy,"Lazy");
    return}
  (function(){return this}()));
