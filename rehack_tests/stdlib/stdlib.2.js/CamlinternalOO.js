(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_div=runtime.caml_div,
     caml_get_public_method=runtime.caml_get_public_method,
     caml_make_vect=runtime.caml_make_vect,
     caml_new_string=runtime.caml_new_string,
     caml_obj_block=runtime.caml_obj_block,
     caml_set_oo_id=runtime.caml_set_oo_id,
     caml_string_compare=runtime.caml_string_compare,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst=caml_new_string(""),
     Assert_failure=global_data.Assert_failure,
     Sys=global_data.Sys,
     Obj=global_data.Obj,
     Undefined_recursive_module=global_data.Undefined_recursive_module,
     Array=global_data.Array,
     List=global_data.List,
     Not_found=global_data.Not_found,
     Map=global_data.Map,
     _g_=[0,caml_new_string("camlinternalOO.ml"),438,17],
     _f_=[0,caml_new_string("camlinternalOO.ml"),420,13],
     _e_=[0,caml_new_string("camlinternalOO.ml"),417,13],
     _d_=[0,caml_new_string("camlinternalOO.ml"),414,13],
     _c_=[0,caml_new_string("camlinternalOO.ml"),411,13],
     _b_=[0,caml_new_string("camlinternalOO.ml"),408,13],
     _a_=[0,caml_new_string("camlinternalOO.ml"),281,50];
    function copy(o){var o$0=o.slice();return caml_set_oo_id(o$0)}
    var params=[0,1,1,1,3,16],initial_object_size=2,dummy_item=0;
    function public_method_label(s)
     {var accu=[0,0],_aA_=runtime.caml_ml_string_length(s) - 1 | 0,_az_=0;
      if(! (_aA_ < 0))
       {var i=_az_;
        for(;;)
         {var _aB_=runtime.caml_string_get(s,i);
          accu[1] = (223 * accu[1] | 0) + _aB_ | 0;
          var _aC_=i + 1 | 0;
          if(_aA_ !== i){var i=_aC_;continue}
          break}}
      accu[1] = accu[1] & 2147483647;
      var tag=1073741823 < accu[1]?accu[1] + 2147483648 | 0:accu[1];
      return tag}
    function compare(x,y){return caml_string_compare(x,y)}
    var Vars=caml_call1(Map[1],[0,compare]);
    function compare$0(x,y){return caml_string_compare(x,y)}
    var Meths=caml_call1(Map[1],[0,compare$0]);
    function compare$1(x,y){return runtime.caml_int_compare(x,y)}
    var
     Labs=caml_call1(Map[1],[0,compare$1]),
     dummy_table=[0,0,[0,dummy_item],Meths[1],Labs[1],0,0,Vars[1],0],
     table_count=[0,0],
     dummy_met=caml_obj_block(0,0);
    function fit_size(n){return 2 < n?fit_size((n + 1 | 0) / 2 | 0) * 2 | 0:n}
    function new_table(pub_labels)
     {table_count[1]++;
      var
       len=pub_labels.length - 1,
       methods=caml_make_vect((len * 2 | 0) + 2 | 0,dummy_met);
      caml_check_bound(methods,0)[1] = len;
      var
       _as_=Sys[10],
       _at_=(runtime.caml_mul(fit_size(len),_as_) / 8 | 0) - 1 | 0;
      caml_check_bound(methods,1)[2] = _at_;
      var _av_=len - 1 | 0,_au_=0;
      if(! (_av_ < 0))
       {var i=_au_;
        for(;;)
         {var
           _ax_=(i * 2 | 0) + 3 | 0,
           _aw_=caml_check_bound(pub_labels,i)[1 + i];
          caml_check_bound(methods,_ax_)[1 + _ax_] = _aw_;
          var _ay_=i + 1 | 0;
          if(_av_ !== i){var i=_ay_;continue}
          break}}
      return [0,initial_object_size,methods,Meths[1],Labs[1],0,0,Vars[1],0]}
    function resize(array,new_size)
     {var old_size=array[2].length - 1,_aq_=old_size < new_size?1:0;
      if(_aq_)
       {var new_buck=caml_make_vect(new_size,dummy_met);
        caml_call5(Array[10],array[2],0,new_buck,0,old_size);
        array[2] = new_buck;
        var _ar_=0}
      else
       var _ar_=_aq_;
      return _ar_}
    function put(array,label,element)
     {resize(array,label + 1 | 0);
      caml_check_bound(array[2],label)[1 + label] = element;
      return 0}
    var method_count=[0,0],inst_var_count=[0,0];
    function new_method(table)
     {var index=table[2].length - 1;resize(table,index + 1 | 0);return index}
    function get_method_label(table,name)
     {try
       {var _ao_=caml_call2(Meths[27],name,table[3]);return _ao_}
      catch(_ap_)
       {_ap_ = caml_wrap_exception(_ap_);
        if(_ap_ === Not_found)
         {var label=new_method(table);
          table[3] = caml_call3(Meths[4],name,label,table[3]);
          table[4] = caml_call3(Labs[4],label,1,table[4]);
          return label}
        throw _ap_}}
    function get_method_labels(table,names)
     {function _am_(_an_){return get_method_label(table,_an_)}
      return caml_call2(Array[15],_am_,names)}
    function set_method(table,label,element)
     {method_count[1]++;
      return caml_call2(Labs[27],label,table[4])
              ?put(table,label,element)
              :(table[6] = [0,[0,label,element],table[6]],0)}
    function get_method(table,label)
     {try
       {var _ak_=caml_call2(List[38],label,table[6]);return _ak_}
      catch(_al_)
       {_al_ = caml_wrap_exception(_al_);
        if(_al_ === Not_found)
         return caml_check_bound(table[2],label)[1 + label];
        throw _al_}}
    function to_list(arr){return arr === 0?0:caml_call1(Array[11],arr)}
    function narrow(table,vars,virt_meths,concr_meths)
     {var
       vars$0=to_list(vars),
       virt_meths$0=to_list(virt_meths),
       concr_meths$0=to_list(concr_meths);
      function _V_(_aj_){return get_method_label(table,_aj_)}
      var virt_meth_labs=caml_call2(List[17],_V_,virt_meths$0);
      function _W_(_ai_){return get_method_label(table,_ai_)}
      var concr_meth_labs=caml_call2(List[17],_W_,concr_meths$0);
      table[5]
      =
      [0,
       [0,table[3],table[4],table[6],table[7],virt_meth_labs,vars$0],
       table[5]];
      var _X_=Vars[1],_Y_=table[7];
      function _Z_(lab,info,tvars)
       {return caml_call2(List[31],lab,vars$0)
                ?caml_call3(Vars[4],lab,info,tvars)
                :tvars}
      table[7] = caml_call3(Vars[13],_Z_,_Y_,_X_);
      var by_name=[0,Meths[1]],by_label=[0,Labs[1]];
      function ___(met,label)
       {by_name[1] = caml_call3(Meths[4],met,label,by_name[1]);
        var _ad_=by_label[1];
        try
         {var _ag_=caml_call2(Labs[27],label,table[4]),_af_=_ag_}
        catch(_ah_)
         {_ah_ = caml_wrap_exception(_ah_);
          if(_ah_ !== Not_found)throw _ah_;
          var _ae_=1,_af_=_ae_}
        by_label[1] = caml_call3(Labs[4],label,_af_,_ad_);
        return 0}
      caml_call3(List[22],___,concr_meths$0,concr_meth_labs);
      function _$_(met,label)
       {by_name[1] = caml_call3(Meths[4],met,label,by_name[1]);
        by_label[1] = caml_call3(Labs[4],label,0,by_label[1]);
        return 0}
      caml_call3(List[22],_$_,virt_meths$0,virt_meth_labs);
      table[3] = by_name[1];
      table[4] = by_label[1];
      var _aa_=0,_ab_=table[6];
      function _ac_(met,hm)
       {var lab=met[1];
        return caml_call2(List[31],lab,virt_meth_labs)?hm:[0,met,hm]}
      table[6] = caml_call3(List[21],_ac_,_ab_,_aa_);
      return 0}
    function widen(table)
     {var
       match=caml_call1(List[5],table[5]),
       vars=match[6],
       virt_meths=match[5],
       saved_vars=match[4],
       saved_hidden_meths=match[3],
       by_label=match[2],
       by_name=match[1];
      table[5] = caml_call1(List[6],table[5]);
      function _R_(s,v)
       {var _U_=caml_call2(Vars[27],v,table[7]);
        return caml_call3(Vars[4],v,_U_,s)}
      table[7] = caml_call3(List[20],_R_,saved_vars,vars);
      table[3] = by_name;
      table[4] = by_label;
      var _S_=table[6];
      function _T_(met,hm)
       {var lab=met[1];
        return caml_call2(List[31],lab,virt_meths)?hm:[0,met,hm]}
      table[6] = caml_call3(List[21],_T_,_S_,saved_hidden_meths);
      return 0}
    function new_slot(table)
     {var index=table[1];table[1] = index + 1 | 0;return index}
    function new_variable(table,name)
     {try
       {var _P_=caml_call2(Vars[27],name,table[7]);return _P_}
      catch(_Q_)
       {_Q_ = caml_wrap_exception(_Q_);
        if(_Q_ === Not_found)
         {var index=new_slot(table);
          if(runtime.caml_string_notequal(name,cst))
           table[7] = caml_call3(Vars[4],name,index,table[7]);
          return index}
        throw _Q_}}
    function to_array(arr){return runtime.caml_equal(arr,0)?[0]:arr}
    function new_methods_variables(table,meths,vals)
     {var
       meths$0=to_array(meths),
       nmeths=meths$0.length - 1,
       nvals=vals.length - 1,
       res=caml_make_vect(nmeths + nvals | 0,0),
       _H_=nmeths - 1 | 0,
       _G_=0;
      if(! (_H_ < 0))
       {var i$0=_G_;
        for(;;)
         {var
           _N_=
            get_method_label(table,caml_check_bound(meths$0,i$0)[1 + i$0]);
          caml_check_bound(res,i$0)[1 + i$0] = _N_;
          var _O_=i$0 + 1 | 0;
          if(_H_ !== i$0){var i$0=_O_;continue}
          break}}
      var _J_=nvals - 1 | 0,_I_=0;
      if(! (_J_ < 0))
       {var i=_I_;
        for(;;)
         {var
           _L_=i + nmeths | 0,
           _K_=new_variable(table,caml_check_bound(vals,i)[1 + i]);
          caml_check_bound(res,_L_)[1 + _L_] = _K_;
          var _M_=i + 1 | 0;
          if(_J_ !== i){var i=_M_;continue}
          break}}
      return res}
    function get_variable(table,name)
     {try
       {var _E_=caml_call2(Vars[27],name,table[7]);return _E_}
      catch(_F_)
       {_F_ = caml_wrap_exception(_F_);
        if(_F_ === Not_found)throw [0,Assert_failure,_a_];
        throw _F_}}
    function get_variables(table,names)
     {function _C_(_D_){return get_variable(table,_D_)}
      return caml_call2(Array[15],_C_,names)}
    function add_initializer(table,f){table[8] = [0,f,table[8]];return 0}
    function create_table(public_methods)
     {if(public_methods === 0)return new_table([0]);
      var
       tags=caml_call2(Array[15],public_method_label,public_methods),
       table=new_table(tags);
      function _B_(i,met)
       {var lab=(i * 2 | 0) + 2 | 0;
        table[3] = caml_call3(Meths[4],met,lab,table[3]);
        table[4] = caml_call3(Labs[4],lab,1,table[4]);
        return 0}
      caml_call2(Array[14],_B_,public_methods);
      return table}
    function init_class(table)
     {inst_var_count[1] = (inst_var_count[1] + table[1] | 0) - 1 | 0;
      table[8] = caml_call1(List[9],table[8]);
      var _A_=Sys[10];
      return resize
              (table,
               3 + caml_div(caml_check_bound(table[2],1)[2] * 16 | 0,_A_) | 0)}
    function inherits(cla,vals,virt_meths,concr_meths,param,top)
     {var env=param[4],super$0=param[2];
      narrow(cla,vals,virt_meths,concr_meths);
      var init=top?caml_call2(super$0,cla,env):caml_call1(super$0,cla);
      widen(cla);
      var _s_=0,_t_=to_array(concr_meths);
      function _u_(nm){return get_method(cla,get_method_label(cla,nm))}
      var _v_=[0,caml_call2(Array[15],_u_,_t_),_s_],_w_=to_array(vals);
      function _x_(_z_){return get_variable(cla,_z_)}
      var _y_=[0,[0,init],[0,caml_call2(Array[15],_x_,_w_),_v_]];
      return caml_call1(Array[6],_y_)}
    function make_class(pub_meths,class_init)
     {var table=create_table(pub_meths),env_init=caml_call1(class_init,table);
      init_class(table);
      return [0,caml_call1(env_init,0),class_init,env_init,0]}
    function make_class_store(pub_meths,class_init,init_table)
     {var table=create_table(pub_meths),env_init=caml_call1(class_init,table);
      init_class(table);
      init_table[2] = class_init;
      init_table[1] = env_init;
      return 0}
    function dummy_class(loc)
     {function undef(param){throw [0,Undefined_recursive_module,loc]}
      return [0,undef,undef,undef,0]}
    function create_object(table)
     {var obj=caml_obj_block(Obj[8],table[1]);
      obj[1] = table[2];
      return caml_set_oo_id(obj)}
    function create_object_opt(obj_0,table)
     {if(obj_0)return obj_0;
      var obj=caml_obj_block(Obj[8],table[1]);
      obj[1] = table[2];
      return caml_set_oo_id(obj)}
    function iter_f(obj,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var param$1=param$0[2],f=param$0[1];
          caml_call1(f,obj);
          var param$0=param$1;
          continue}
        return 0}}
    function run_initializers(obj,table)
     {var inits=table[8],_r_=0 !== inits?1:0;return _r_?iter_f(obj,inits):_r_}
    function run_initializers_opt(obj_0,obj,table)
     {if(obj_0)return obj;
      var inits=table[8];
      if(0 !== inits)iter_f(obj,inits);
      return obj}
    function create_object_and_run_initializers(obj_0,table)
     {if(obj_0)return obj_0;
      var obj=create_object(table);
      run_initializers(obj,table);
      return obj}
    function set_data(tables,v)
     {if(tables){tables[2] = v;return 0}throw [0,Assert_failure,_b_]}
    function set_next(tables,v)
     {if(tables){tables[3] = v;return 0}throw [0,Assert_failure,_c_]}
    function get_key(param)
     {if(param)return param[1];throw [0,Assert_failure,_d_]}
    function get_data(param)
     {if(param)return param[2];throw [0,Assert_failure,_e_]}
    function get_next(param)
     {if(param)return param[3];throw [0,Assert_failure,_f_]}
    function build_path(n,keys,tables)
     {var res=[0,0,0,0],r=[0,res],_o_=0;
      if(! (n < 0))
       {var i=_o_;
        for(;;)
         {var _p_=r[1];
          r[1] = [0,caml_check_bound(keys,i)[1 + i],_p_,0];
          var _q_=i + 1 | 0;
          if(n !== i){var i=_q_;continue}
          break}}
      set_data(tables,r[1]);
      return res}
    function lookup_keys(i,keys,tables)
     {if(0 <= i)
       {var
         key=caml_check_bound(keys,i)[1 + i],
         lookup_key=
          function(tables)
           {var tables$0=tables;
            for(;;)
             {if(get_key(tables$0) === key)
               {var tables_data=get_data(tables$0);
                if(tables_data)return lookup_keys(i - 1 | 0,keys,tables_data);
                throw [0,Assert_failure,_g_]}
              var next=get_next(tables$0);
              if(next){var tables$0=next;continue}
              var next$0=[0,key,0,0];
              set_next(tables$0,next$0);
              return build_path(i - 1 | 0,keys,next$0)}};
        return lookup_key(tables)}
      return tables}
    function lookup_tables(root,keys)
     {var root_data=get_data(root);
      return root_data
              ?lookup_keys(keys.length - 1 - 1 | 0,keys,root_data)
              :build_path(keys.length - 1 - 1 | 0,keys,root)}
    function get_const(x){return function(obj){return x}}
    function get_var(n){return function(obj){return obj[1 + n]}}
    function get_env(e,n){return function(obj){return obj[1 + e][1 + n]}}
    function get_meth(n)
     {return function(obj){return caml_call1(obj[1][1 + n],obj)}}
    function set_var(n){return function(obj,x){obj[1 + n] = x;return 0}}
    function app_const(f,x){return function(obj){return caml_call1(f,x)}}
    function app_var(f,n)
     {return function(obj){return caml_call1(f,obj[1 + n])}}
    function app_env(f,e,n)
     {return function(obj){return caml_call1(f,obj[1 + e][1 + n])}}
    function app_meth(f,n)
     {return function(obj){return caml_call1(f,caml_call1(obj[1][1 + n],obj))}}
    function app_const_const(f,x,y)
     {return function(obj){return caml_call2(f,x,y)}}
    function app_const_var(f,x,n)
     {return function(obj){return caml_call2(f,x,obj[1 + n])}}
    function app_const_meth(f,x,n)
     {return function(obj)
       {return caml_call2(f,x,caml_call1(obj[1][1 + n],obj))}}
    function app_var_const(f,n,x)
     {return function(obj){return caml_call2(f,obj[1 + n],x)}}
    function app_meth_const(f,n,x)
     {return function(obj)
       {return caml_call2(f,caml_call1(obj[1][1 + n],obj),x)}}
    function app_const_env(f,x,e,n)
     {return function(obj){return caml_call2(f,x,obj[1 + e][1 + n])}}
    function app_env_const(f,e,n,x)
     {return function(obj){return caml_call2(f,obj[1 + e][1 + n],x)}}
    function meth_app_const(n,x)
     {return function(obj){return caml_call2(obj[1][1 + n],obj,x)}}
    function meth_app_var(n,m)
     {return function(obj){return caml_call2(obj[1][1 + n],obj,obj[1 + m])}}
    function meth_app_env(n,e,m)
     {return function(obj)
       {return caml_call2(obj[1][1 + n],obj,obj[1 + e][1 + m])}}
    function meth_app_meth(n,m)
     {return function(obj)
       {var _n_=caml_call1(obj[1][1 + m],obj);
        return caml_call2(obj[1][1 + n],obj,_n_)}}
    function send_const(m,x,c)
     {return function(obj){return caml_call1(caml_get_public_method(x,m,0),x)}}
    function send_var(m,n,c)
     {return function(obj)
       {var _m_=obj[1 + n];
        return caml_call1(caml_get_public_method(_m_,m,0),_m_)}}
    function send_env(m,e,n,c)
     {return function(obj)
       {var _l_=obj[1 + e][1 + n];
        return caml_call1(caml_get_public_method(_l_,m,0),_l_)}}
    function send_meth(m,n,c)
     {return function(obj)
       {var _k_=caml_call1(obj[1][1 + n],obj);
        return caml_call1(caml_get_public_method(_k_,m,0),_k_)}}
    function new_cache(table)
     {var n=new_method(table);
      if(0 === (n % 2 | 0))
       var switch$0=0;
      else
       {var _j_=Sys[10];
        if
         ((2 + caml_div(caml_check_bound(table[2],1)[2] * 16 | 0,_j_) | 0)
          <
          n)
         var switch$0=0;
        else
         var n$0=new_method(table),switch$0=1}
      if(! switch$0)var n$0=n;
      caml_check_bound(table[2],n$0)[1 + n$0] = 0;
      return n$0}
    function method_impl(table,i,arr)
     {function next(param)
       {i[1]++;var _i_=i[1];return caml_check_bound(arr,_i_)[1 + _i_]}
      var clo=next(0);
      if(typeof clo === "number")
       switch(clo)
        {case 0:var x=next(0);return get_const(x);
         case 1:var n=next(0);return get_var(n);
         case 2:var e=next(0),n$0=next(0);return get_env(e,n$0);
         case 3:var n$1=next(0);return get_meth(n$1);
         case 4:var n$2=next(0);return set_var(n$2);
         case 5:var f=next(0),x$0=next(0);return app_const(f,x$0);
         case 6:var f$0=next(0),n$3=next(0);return app_var(f$0,n$3);
         case 7:
          var f$1=next(0),e$0=next(0),n$4=next(0);return app_env(f$1,e$0,n$4);
         case 8:var f$2=next(0),n$5=next(0);return app_meth(f$2,n$5);
         case 9:
          var f$3=next(0),x$1=next(0),y=next(0);
          return app_const_const(f$3,x$1,y);
         case 10:
          var f$4=next(0),x$2=next(0),n$6=next(0);
          return app_const_var(f$4,x$2,n$6);
         case 11:
          var f$5=next(0),x$3=next(0),e$1=next(0),n$7=next(0);
          return app_const_env(f$5,x$3,e$1,n$7);
         case 12:
          var f$6=next(0),x$4=next(0),n$8=next(0);
          return app_const_meth(f$6,x$4,n$8);
         case 13:
          var f$7=next(0),n$9=next(0),x$5=next(0);
          return app_var_const(f$7,n$9,x$5);
         case 14:
          var f$8=next(0),e$2=next(0),n$10=next(0),x$6=next(0);
          return app_env_const(f$8,e$2,n$10,x$6);
         case 15:
          var f$9=next(0),n$11=next(0),x$7=next(0);
          return app_meth_const(f$9,n$11,x$7);
         case 16:var n$12=next(0),x$8=next(0);return meth_app_const(n$12,x$8);
         case 17:var n$13=next(0),m=next(0);return meth_app_var(n$13,m);
         case 18:
          var n$14=next(0),e$3=next(0),m$0=next(0);
          return meth_app_env(n$14,e$3,m$0);
         case 19:var n$15=next(0),m$1=next(0);return meth_app_meth(n$15,m$1);
         case 20:
          var m$2=next(0),x$9=next(0);
          return send_const(m$2,x$9,new_cache(table));
         case 21:
          var m$3=next(0),n$16=next(0);
          return send_var(m$3,n$16,new_cache(table));
         case 22:
          var m$4=next(0),e$4=next(0),n$17=next(0);
          return send_env(m$4,e$4,n$17,new_cache(table));
         default:
          var m$5=next(0),n$18=next(0);
          return send_meth(m$5,n$18,new_cache(table))}
      return clo}
    function set_methods(table,methods)
     {var len=methods.length - 1,i=[0,0];
      for(;;)
       {if(i[1] < len)
         {var
           _h_=i[1],
           label=caml_check_bound(methods,_h_)[1 + _h_],
           clo=method_impl(table,i,methods);
          set_method(table,label,clo);
          i[1]++;
          continue}
        return 0}}
    function stats(param)
     {return [0,table_count[1],method_count[1],inst_var_count[1]]}
    var
     CamlinternalOO=
      [0,
       public_method_label,
       new_method,
       new_variable,
       new_methods_variables,
       get_variable,
       get_variables,
       get_method_label,
       get_method_labels,
       get_method,
       set_method,
       set_methods,
       narrow,
       widen,
       add_initializer,
       dummy_table,
       create_table,
       init_class,
       inherits,
       make_class,
       make_class_store,
       dummy_class,
       copy,
       create_object,
       create_object_opt,
       run_initializers,
       run_initializers_opt,
       create_object_and_run_initializers,
       lookup_tables,
       params,
       stats];
    runtime.caml_register_global(18,CamlinternalOO,"CamlinternalOO");
    return}
  (function(){return this}()));
