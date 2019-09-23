(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string,
     caml_spacetime_enabled=runtime.caml_spacetime_enabled,
     caml_spacetime_only_works_for_native_code=
      runtime.caml_spacetime_only_works_for_native_code;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Series_is_closed$0=caml_new_string("Series is closed"),
     cst_Series_is_closed=caml_new_string("Series is closed"),
     Pervasives=global_data.Pervasives,
     enabled=caml_spacetime_enabled(0);
    function if_spacetime_enabled(f){return enabled?caml_call1(f,0):0}
    function create(path)
     {if(caml_spacetime_enabled(0))
       {var channel=caml_call1(Pervasives[48],path),t=[0,channel,0];
        caml_spacetime_only_works_for_native_code(t[1]);
        return t}
      return [0,Pervasives[27],1]}
    function save_event(time,t,event_name)
     {return if_spacetime_enabled
              (function(param)
                {return caml_spacetime_only_works_for_native_code
                         (time,t[1],event_name)})}
    function save_and_close(time,t)
     {return if_spacetime_enabled
              (function(param)
                {if(t[2])caml_call1(Pervasives[2],cst_Series_is_closed);
                 caml_spacetime_only_works_for_native_code(time,t[1]);
                 caml_call1(Pervasives[64],t[1]);
                 t[2] = 1;
                 return 0})}
    var Series=[0,create,save_event,save_and_close];
    function take(time,param)
     {var channel=param[1],closed=param[2];
      return if_spacetime_enabled
              (function(param)
                {if(closed)caml_call1(Pervasives[2],cst_Series_is_closed$0);
                 runtime.caml_gc_minor(0);
                 return caml_spacetime_only_works_for_native_code
                         (time,channel)})}
    var Snapshot=[0,take];
    function save_event_for_automatic_snapshots(event_name)
     {return if_spacetime_enabled
              (function(param)
                {return caml_spacetime_only_works_for_native_code(event_name)})}
    var
     Spacetime=
      [0,enabled,Series,Snapshot,save_event_for_automatic_snapshots];
    runtime.caml_register_global(3,Spacetime,"Spacetime");
    return}
  (function(){return this}()));
