(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string,
     caml_obj_tag=runtime.caml_obj_tag;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Obj_extension_constructor$0=
      caml_new_string("Obj.extension_constructor"),
     cst_Obj_extension_constructor=
      caml_new_string("Obj.extension_constructor"),
     Pervasives=global_data.Pervasives,
     Marshal=global_data.Marshal;
    function is_block(a){return 1 - (typeof a === "number"?1:0)}
    function double_field(x,i){return runtime.caml_array_get(x,i)}
    function set_double_field(x,i,v){return runtime.caml_array_set(x,i,v)}
    function marshal(obj){return runtime.caml_output_value_to_string(obj,0)}
    function unmarshal(str,pos)
     {var _L_=pos + caml_call2(Marshal[8],str,pos) | 0;
      return [0,caml_call2(Marshal[4],str,pos),_L_]}
    var
     first_non_constant_constructor_tag=0,
     last_non_constant_constructor_tag=245,
     lazy_tag=246,
     closure_tag=247,
     object_tag=248,
     infix_tag=249,
     forward_tag=250,
     no_scan_tag=251,
     abstract_tag=251,
     string_tag=252,
     double_tag=253,
     double_array_tag=254,
     custom_tag=255,
     int_tag=1000,
     out_of_heap_tag=1001,
     unaligned_tag=1002;
    function extension_constructor(x)
     {if(is_block(x))
       if(caml_obj_tag(x) !== 248)
        if(1 <= x.length - 1)var slot=x[1],switch$0=1;else var switch$0=0;
       else
        var switch$0=0;
      else
       var switch$0=0;
      if(! switch$0)var slot=x;
      if(is_block(slot))
       if(caml_obj_tag(slot) === 248)
        var name=slot[1],switch$1=1;
       else
        var switch$1=0;
      else
       var switch$1=0;
      if(! switch$1)
       var name=caml_call1(Pervasives[1],cst_Obj_extension_constructor$0);
      return caml_obj_tag(name) === 252
              ?slot
              :caml_call1(Pervasives[1],cst_Obj_extension_constructor)}
    function extension_name(slot){return slot[1]}
    function extension_id(slot){return slot[2]}
    function length(x){return x.length - 1 - 2 | 0}
    function _a_(_K_,_J_){return runtime.caml_ephe_blit_data(_K_,_J_)}
    function _b_(_I_){return runtime.caml_ephe_check_data(_I_)}
    function _c_(_H_){return runtime.caml_ephe_unset_data(_H_)}
    function _d_(_G_,_F_){return runtime.caml_ephe_set_data(_G_,_F_)}
    function _e_(_E_){return runtime.caml_ephe_get_data_copy(_E_)}
    function _f_(_D_){return runtime.caml_ephe_get_data(_D_)}
    function _g_(_C_,_B_,_A_,_z_,_y_)
     {return runtime.caml_ephe_blit_key(_C_,_B_,_A_,_z_,_y_)}
    function _h_(_x_,_w_){return runtime.caml_ephe_check_key(_x_,_w_)}
    function _i_(_v_,_u_){return runtime.caml_ephe_unset_key(_v_,_u_)}
    function _j_(_t_,_s_,_r_){return runtime.caml_ephe_set_key(_t_,_s_,_r_)}
    function _k_(_q_,_p_){return runtime.caml_ephe_get_key_copy(_q_,_p_)}
    function _l_(_o_,_n_){return runtime.caml_ephe_get_key(_o_,_n_)}
    var
     Obj=
      [0,
       is_block,
       double_field,
       set_double_field,
       first_non_constant_constructor_tag,
       last_non_constant_constructor_tag,
       lazy_tag,
       closure_tag,
       object_tag,
       infix_tag,
       forward_tag,
       no_scan_tag,
       abstract_tag,
       string_tag,
       double_tag,
       double_array_tag,
       custom_tag,
       custom_tag,
       int_tag,
       out_of_heap_tag,
       unaligned_tag,
       extension_constructor,
       extension_name,
       extension_id,
       marshal,
       unmarshal,
       [0,
        function(_m_){return runtime.caml_ephe_create(_m_)},
        length,
        _l_,
        _k_,
        _j_,
        _i_,
        _h_,
        _g_,
        _f_,
        _e_,
        _d_,
        _c_,
        _b_,
        _a_]];
    runtime.caml_register_global(4,Obj,"Obj");
    return}
  (function(){return this}()));
