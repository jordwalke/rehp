(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     global_data=runtime.caml_get_global_data(),
     Set=global_data.Set,
     Map=global_data.Map,
     Hashtbl=global_data.Hashtbl,
     MoreLabels=[0,Hashtbl,Map,Set];
    runtime.caml_register_global(3,MoreLabels,"MoreLabels");
    return}
  (function(){return this}()));
