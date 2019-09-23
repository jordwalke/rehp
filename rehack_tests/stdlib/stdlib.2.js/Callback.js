(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_register_named_value=runtime.caml_register_named_value,
     global_data=runtime.caml_get_global_data(),
     Obj=global_data.Obj;
    function register(name,v){return caml_register_named_value(name,v)}
    function register_exception(name,exn)
     {var _a_=Obj[8],slot=runtime.caml_obj_tag(exn) === _a_?exn:exn[1];
      return caml_register_named_value(name,slot)}
    var Callback=[0,register,register_exception];
    runtime.caml_register_global(1,Callback,"Callback");
    return}
  (function(){return this}()));
