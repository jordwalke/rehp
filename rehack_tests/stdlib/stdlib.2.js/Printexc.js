(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_get_exception_raw_backtrace=runtime.caml_get_exception_raw_backtrace,
     caml_new_string=runtime.caml_new_string,
     caml_obj_tag=runtime.caml_obj_tag,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call6(f,a0,a1,a2,a3,a4,a5)
     {return f.length == 6
              ?f(a0,a1,a2,a3,a4,a5)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4,a5])}
    function caml_call7(f,a0,a1,a2,a3,a4,a5,a6)
     {return f.length == 7
              ?f(a0,a1,a2,a3,a4,a5,a6)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4,a5,a6])}
    var
     global_data=runtime.caml_get_global_data(),
     cst$0=caml_new_string(""),
     cst_Program_not_linked_with_g_cannot_print_stack_backtrace=
      caml_new_string
       ("(Program not linked with -g, cannot print stack backtrace)\n"),
     cst_Raised_at=caml_new_string("Raised at"),
     cst_Re_raised_at=caml_new_string("Re-raised at"),
     cst_Raised_by_primitive_operation_at=
      caml_new_string("Raised by primitive operation at"),
     cst_Called_from=caml_new_string("Called from"),
     cst_inlined=caml_new_string(" (inlined)"),
     cst$3=caml_new_string(""),
     partial=[4,0,0,0,0],
     cst_Out_of_memory=caml_new_string("Out of memory"),
     cst_Stack_overflow=caml_new_string("Stack overflow"),
     cst_Pattern_matching_failed=caml_new_string("Pattern matching failed"),
     cst_Assertion_failed=caml_new_string("Assertion failed"),
     cst_Undefined_recursive_module=
      caml_new_string("Undefined recursive module"),
     cst$1=caml_new_string(""),
     cst$2=caml_new_string(""),
     cst=caml_new_string("_"),
     locfmt=
      [0,
       [11,
        caml_new_string('File "'),
        [2,
         0,
         [11,
          caml_new_string('", line '),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(", characters "),
            [4,0,0,0,[12,45,[4,0,0,0,[11,caml_new_string(": "),[2,0,0]]]]]]]]]],
       caml_new_string('File "%s", line %d, characters %d-%d: %s')],
     Printf=global_data.Printf,
     Pervasives=global_data.Pervasives,
     Out_of_memory=global_data.Out_of_memory,
     Buffer=global_data.Buffer,
     Stack_overflow=global_data.Stack_overflow,
     Match_failure=global_data.Match_failure,
     Assert_failure=global_data.Assert_failure,
     Undefined_recursive_module=global_data.Undefined_recursive_module,
     Obj=global_data.Obj,
     _c_=
      [0,[11,caml_new_string(", "),[2,0,[2,0,0]]],caml_new_string(", %s%s")],
     _l_=[0,[2,0,[12,10,0]],caml_new_string("%s\n")],
     _j_=[0,[2,0,[12,10,0]],caml_new_string("%s\n")],
     _k_=
      [0,
       [11,
        caml_new_string
         ("(Program not linked with -g, cannot print stack backtrace)\n"),
        0],
       caml_new_string
        ("(Program not linked with -g, cannot print stack backtrace)\n")],
     _h_=
      [0,
       [2,
        0,
        [11,
         caml_new_string(' file "'),
         [2,
          0,
          [12,
           34,
           [2,
            0,
            [11,
             caml_new_string(", line "),
             [4,
              0,
              0,
              0,
              [11,caml_new_string(", characters "),[4,0,0,0,[12,45,partial]]]]]]]]]],
       caml_new_string('%s file "%s"%s, line %d, characters %d-%d')],
     _i_=
      [0,
       [2,0,[11,caml_new_string(" unknown location"),0]],
       caml_new_string("%s unknown location")],
     _g_=
      [0,
       [11,caml_new_string("Uncaught exception: "),[2,0,[12,10,0]]],
       caml_new_string("Uncaught exception: %s\n")],
     _f_=
      [0,
       [11,caml_new_string("Uncaught exception: "),[2,0,[12,10,0]]],
       caml_new_string("Uncaught exception: %s\n")],
     _d_=[0,[12,40,[2,0,[2,0,[12,41,0]]]],caml_new_string("(%s%s)")],
     _e_=[0,[12,40,[2,0,[12,41,0]]],caml_new_string("(%s)")],
     _b_=[0,[4,0,0,0,0],caml_new_string("%d")],
     _a_=[0,[3,0,0],caml_new_string("%S")],
     printers=[0,0];
    function field(x,i)
     {var f=x[1 + i];
      if(caml_call1(Obj[1],f))
       {var _ad_=Obj[13];
        if(caml_obj_tag(f) === _ad_)return caml_call2(Printf[4],_a_,f);
        var _ae_=Obj[14];
        return caml_obj_tag(f) === _ae_?caml_call1(Pervasives[23],f):cst}
      return caml_call2(Printf[4],_b_,f)}
    function other_fields(x,i)
     {if(x.length - 1 <= i)return cst$0;
      var _ab_=other_fields(x,i + 1 | 0),_ac_=field(x,i);
      return caml_call3(Printf[4],_c_,_ac_,_ab_)}
    function fields(x)
     {var match=x.length - 1;
      if(2 < match >>> 0)
       {var ___=other_fields(x,2),_$_=field(x,1);
        return caml_call3(Printf[4],_d_,_$_,___)}
      switch(match)
       {case 0:return cst$1;
        case 1:return cst$2;
        default:var _aa_=field(x,1);return caml_call2(Printf[4],_e_,_aa_)}}
    function to_string(x)
     {function conv(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var tl=param$0[2],hd=param$0[1];
            try {var _X_=caml_call1(hd,x),_W_=_X_}catch(_Z_){var _W_=0}
            if(_W_){var s=_W_[1];return s}
            var param$0=tl;
            continue}
          if(x === Out_of_memory)return cst_Out_of_memory;
          if(x === Stack_overflow)return cst_Stack_overflow;
          if(x[1] === Match_failure)
           {var match=x[2],char$0=match[3],line=match[2],file=match[1];
            return caml_call6
                    (Printf[4],
                     locfmt,
                     file,
                     line,
                     char$0,
                     char$0 + 5 | 0,
                     cst_Pattern_matching_failed)}
          if(x[1] === Assert_failure)
           {var
             match$0=x[2],
             char$1=match$0[3],
             line$0=match$0[2],
             file$0=match$0[1];
            return caml_call6
                    (Printf[4],
                     locfmt,
                     file$0,
                     line$0,
                     char$1,
                     char$1 + 6 | 0,
                     cst_Assertion_failed)}
          if(x[1] === Undefined_recursive_module)
           {var
             match$1=x[2],
             char$2=match$1[3],
             line$1=match$1[2],
             file$1=match$1[1];
            return caml_call6
                    (Printf[4],
                     locfmt,
                     file$1,
                     line$1,
                     char$2,
                     char$2 + 6 | 0,
                     cst_Undefined_recursive_module)}
          if(0 === caml_obj_tag(x))
           {var constructor=x[1][1],_Y_=fields(x);
            return caml_call2(Pervasives[16],constructor,_Y_)}
          return x[1]}}
      return conv(printers[1])}
    function print(fct,arg)
     {try
       {var _V_=caml_call1(fct,arg);return _V_}
      catch(x)
       {x = caml_wrap_exception(x);
        var _U_=to_string(x);
        caml_call2(Printf[3],_f_,_U_);
        caml_call1(Pervasives[51],Pervasives[28]);
        throw x}}
    function catch$0(fct,arg)
     {try
       {var _T_=caml_call1(fct,arg);return _T_}
      catch(x)
       {x = caml_wrap_exception(x);
        caml_call1(Pervasives[51],Pervasives[27]);
        var _S_=to_string(x);
        caml_call2(Printf[3],_g_,_S_);
        return caml_call1(Pervasives[87],2)}}
    function convert_raw_backtrace(bt)
     {var _R_=[0,runtime.caml_convert_raw_backtrace(bt)];return _R_}
    function format_backtrace_slot(pos,slot)
     {function info(is_raise)
       {return is_raise
                ?0 === pos?cst_Raised_at:cst_Re_raised_at
                :0 === pos
                  ?cst_Raised_by_primitive_operation_at
                  :cst_Called_from}
      if(0 === slot[0])
       {var
         _K_=slot[5],
         _L_=slot[4],
         _M_=slot[3],
         _N_=slot[6]?cst_inlined:cst$3,
         _O_=slot[2],
         _P_=info(slot[1]);
        return [0,caml_call7(Printf[4],_h_,_P_,_O_,_N_,_M_,_L_,_K_)]}
      if(slot[1])return 0;
      var _Q_=info(0);
      return [0,caml_call2(Printf[4],_i_,_Q_)]}
    function print_exception_backtrace(outchan,backtrace)
     {if(backtrace)
       {var a=backtrace[1],_I_=a.length - 1 - 1 | 0,_H_=0;
        if(! (_I_ < 0))
         {var i=_H_;
          for(;;)
           {var match=format_backtrace_slot(i,caml_check_bound(a,i)[1 + i]);
            if(match){var str=match[1];caml_call3(Printf[1],outchan,_j_,str)}
            var _J_=i + 1 | 0;
            if(_I_ !== i){var i=_J_;continue}
            break}}
        return 0}
      return caml_call2(Printf[1],outchan,_k_)}
    function print_raw_backtrace(outchan,raw_backtrace)
     {return print_exception_backtrace
              (outchan,convert_raw_backtrace(raw_backtrace))}
    function print_backtrace(outchan)
     {return print_raw_backtrace(outchan,caml_get_exception_raw_backtrace(0))}
    function backtrace_to_string(backtrace)
     {if(backtrace)
       {var
         a=backtrace[1],
         b=caml_call1(Buffer[1],1024),
         _F_=a.length - 1 - 1 | 0,
         _E_=0;
        if(! (_F_ < 0))
         {var i=_E_;
          for(;;)
           {var match=format_backtrace_slot(i,caml_check_bound(a,i)[1 + i]);
            if(match){var str=match[1];caml_call3(Printf[5],b,_l_,str)}
            var _G_=i + 1 | 0;
            if(_F_ !== i){var i=_G_;continue}
            break}}
        return caml_call1(Buffer[2],b)}
      return cst_Program_not_linked_with_g_cannot_print_stack_backtrace}
    function raw_backtrace_to_string(raw_backtrace)
     {return backtrace_to_string(convert_raw_backtrace(raw_backtrace))}
    function backtrace_slot_is_raise(param)
     {return 0 === param[0]?param[1]:param[1]}
    function backtrace_slot_is_inline(param){return 0 === param[0]?param[6]:0}
    function backtrace_slot_location(param)
     {return 0 === param[0]?[0,[0,param[2],param[3],param[4],param[5]]]:0}
    function backtrace_slots(raw_backtrace)
     {var match=convert_raw_backtrace(raw_backtrace);
      if(match)
       {var
         backtrace=match[1],
         usable_slot=function(param){return 0 === param[0]?1:0},
         exists_usable=
          function(i)
           {var i$0=i;
            for(;;)
             {if(-1 === i$0)return 0;
              var _D_=usable_slot(caml_check_bound(backtrace,i$0)[1 + i$0]);
              if(_D_)return _D_;
              var i$1=i$0 - 1 | 0,i$0=i$1;
              continue}};
        return exists_usable(backtrace.length - 1 - 1 | 0)?[0,backtrace]:0}
      return 0}
    function get_backtrace(param)
     {return raw_backtrace_to_string(caml_get_exception_raw_backtrace(0))}
    function register_printer(fn){printers[1] = [0,fn,printers[1]];return 0}
    function exn_slot(x){return 0 === caml_obj_tag(x)?x[1]:x}
    function exn_slot_id(x){var slot=exn_slot(x);return slot[2]}
    function exn_slot_name(x){var slot=exn_slot(x);return slot[1]}
    var uncaught_exception_handler=[0,0];
    function set_uncaught_exception_handler(fn)
     {uncaught_exception_handler[1] = [0,fn];return 0}
    function _m_(_C_){return runtime.caml_raw_backtrace_next_slot(_C_)}
    function _n_(_B_){return runtime.caml_convert_raw_backtrace_slot(_B_)}
    function _o_(_A_,_z_){return runtime.caml_raw_backtrace_slot(_A_,_z_)}
    function _p_(_y_){return runtime.caml_raw_backtrace_length(_y_)}
    var
     _q_=
      [0,
       backtrace_slot_is_raise,
       backtrace_slot_is_inline,
       backtrace_slot_location,
       format_backtrace_slot];
    function _r_(_x_){return runtime.caml_get_current_callstack(_x_)}
    function _s_(_w_){return caml_get_exception_raw_backtrace(_w_)}
    function _t_(_v_){return runtime.caml_backtrace_status(_v_)}
    var
     Printexc=
      [0,
       to_string,
       print,
       catch$0,
       print_backtrace,
       get_backtrace,
       function(_u_){return runtime.caml_record_backtrace(_u_)},
       _t_,
       register_printer,
       _s_,
       print_raw_backtrace,
       raw_backtrace_to_string,
       _r_,
       set_uncaught_exception_handler,
       backtrace_slots,
       _q_,
       _p_,
       _o_,
       _n_,
       _m_,
       exn_slot_id,
       exn_slot_name];
    runtime.caml_register_global(45,Printexc,"Printexc");
    return}
  (function(){return this}()));
