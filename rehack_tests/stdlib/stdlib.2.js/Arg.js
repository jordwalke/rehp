(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_equal=runtime.caml_equal,
     caml_fresh_oo_id=runtime.caml_fresh_oo_id,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_get=runtime.caml_string_get,
     caml_string_notequal=runtime.caml_string_notequal,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call4(f,a0,a1,a2,a3)
     {return f.length == 4
              ?f(a0,a1,a2,a3)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    function caml_call6(f,a0,a1,a2,a3,a4,a5)
     {return f.length == 6
              ?f(a0,a1,a2,a3,a4,a5)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4,a5])}
    var
     global_data=runtime.caml_get_global_data(),
     cst$6=caml_new_string(""),
     cst$7=caml_new_string("\n"),
     cst_a_boolean=caml_new_string("a boolean"),
     cst_an_integer=caml_new_string("an integer"),
     cst_an_integer$0=caml_new_string("an integer"),
     cst_a_float=caml_new_string("a float"),
     cst_a_float$0=caml_new_string("a float"),
     cst$3=caml_new_string(""),
     cst$4=caml_new_string(" "),
     cst$5=caml_new_string(""),
     cst_one_of=caml_new_string("one of: "),
     cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic=
      caml_new_string
       ("Arg.Expand is is only allowed with Arg.parse_and_expand_argv_dynamic"),
     cst_no_argument=caml_new_string("no argument"),
     cst$2=caml_new_string("(?)"),
     cst_help$3=caml_new_string("--help"),
     cst_help$4=caml_new_string("-help"),
     cst_help$2=caml_new_string("-help"),
     cst_Display_this_list_of_options=
      caml_new_string(" Display this list of options"),
     cst_help=caml_new_string("-help"),
     cst_help$1=caml_new_string("--help"),
     cst_Display_this_list_of_options$0=
      caml_new_string(" Display this list of options"),
     cst_help$0=caml_new_string("--help"),
     cst=caml_new_string("}"),
     cst$0=caml_new_string("|"),
     cst$1=caml_new_string("{"),
     cst_none=caml_new_string("<none>"),
     cst_Arg_Bad=caml_new_string("Arg.Bad"),
     cst_Arg_Help=caml_new_string("Arg.Help"),
     cst_Arg_Stop=caml_new_string("Arg.Stop"),
     Not_found=global_data.Not_found,
     Printf=global_data.Printf,
     Pervasives=global_data.Pervasives,
     Array=global_data.Array,
     Buffer=global_data.Buffer,
     End_of_file=global_data.End_of_file,
     List=global_data.List,
     String=global_data.String,
     Sys=global_data.Sys,
     Invalid_argument=global_data.Invalid_argument,
     Failure=global_data.Failure,
     _v_=[0,[2,0,[0,0]],caml_new_string("%s%c")],
     _p_=[0,[2,0,0],caml_new_string("%s")],
     _q_=[0,[2,0,0],caml_new_string("%s")],
     _n_=[0,[2,0,0],caml_new_string("%s")],
     _o_=[0,[2,0,0],caml_new_string("%s")],
     _l_=[0,[2,0,0],caml_new_string("%s")],
     _m_=[0,[2,0,0],caml_new_string("%s")],
     _f_=
      [0,
       [2,
        0,
        [11,
         caml_new_string(": unknown option '"),
         [2,0,[11,caml_new_string("'.\n"),0]]]],
       caml_new_string("%s: unknown option '%s'.\n")],
     _i_=
      [0,
       [2,
        0,
        [11,
         caml_new_string(": wrong argument '"),
         [2,
          0,
          [11,
           caml_new_string("'; option '"),
           [2,
            0,
            [11,
             caml_new_string("' expects "),
             [2,0,[11,caml_new_string(".\n"),0]]]]]]]],
       caml_new_string("%s: wrong argument '%s'; option '%s' expects %s.\n")],
     _j_=
      [0,
       [2,
        0,
        [11,
         caml_new_string(": option '"),
         [2,0,[11,caml_new_string("' needs an argument.\n"),0]]]],
       caml_new_string("%s: option '%s' needs an argument.\n")],
     _k_=
      [0,
       [2,0,[11,caml_new_string(": "),[2,0,[11,caml_new_string(".\n"),0]]]],
       caml_new_string("%s: %s.\n")],
     _g_=[0,caml_new_string("-help")],
     _h_=[0,caml_new_string("--help")],
     _e_=[0,[2,0,0],caml_new_string("%s")],
     _d_=[0,[2,0,[12,10,0]],caml_new_string("%s\n")],
     _c_=[0,caml_new_string("-help")],
     _a_=
      [0,
       [11,caml_new_string("  "),[2,0,[12,32,[2,0,[12,10,0]]]]],
       caml_new_string("  %s %s\n")],
     _b_=
      [0,
       [11,caml_new_string("  "),[2,0,[12,32,[2,0,[2,0,[12,10,0]]]]]],
       caml_new_string("  %s %s%s\n")],
     Bad=[248,cst_Arg_Bad,caml_fresh_oo_id(0)],
     Help=[248,cst_Arg_Help,caml_fresh_oo_id(0)],
     Stop=[248,cst_Arg_Stop,caml_fresh_oo_id(0)];
    function assoc3(x,l)
     {var l$0=l;
      for(;;)
       {if(l$0)
         {var t=l$0[2],match=l$0[1],y2=match[2],y1=match[1];
          if(caml_equal(y1,x))return y2;
          var l$0=t;
          continue}
        throw Not_found}}
    function split(s)
     {var
       i=caml_call2(String[14],s,61),
       len=caml_ml_string_length(s),
       _aG_=caml_call3(String[4],s,i + 1 | 0,len - (i + 1 | 0) | 0);
      return [0,caml_call3(String[4],s,0,i),_aG_]}
    function make_symlist(prefix,sep,suffix,l)
     {if(l)
       {var
         t=l[2],
         h=l[1],
         _aC_=caml_call2(Pervasives[16],prefix,h),
         _aD_=
          function(x,y)
           {var _aF_=caml_call2(Pervasives[16],sep,y);
            return caml_call2(Pervasives[16],x,_aF_)},
         _aE_=caml_call3(List[20],_aD_,_aC_,t);
        return caml_call2(Pervasives[16],_aE_,suffix)}
      return cst_none}
    function print_spec(buf,param)
     {var
       doc=param[3],
       spec=param[2],
       key=param[1],
       _aA_=0 < caml_ml_string_length(doc)?1:0;
      if(_aA_)
       {if(11 === spec[0])
         {var l=spec[1],_aB_=make_symlist(cst$1,cst$0,cst,l);
          return caml_call5(Printf[5],buf,_b_,key,_aB_,doc)}
        return caml_call4(Printf[5],buf,_a_,key,doc)}
      return _aA_}
    function help_action(param){throw [0,Stop,_c_]}
    function add_help(speclist)
     {try
       {assoc3(cst_help$2,speclist);var _ax_=0,_at_=_ax_}
      catch(_az_)
       {_az_ = caml_wrap_exception(_az_);
        if(_az_ !== Not_found)throw _az_;
        var
         _as_=
          [0,[0,cst_help,[0,help_action],cst_Display_this_list_of_options],0],
         _at_=_as_}
      try
       {assoc3(cst_help$1,speclist);var _aw_=0,add2=_aw_}
      catch(_ay_)
       {_ay_ = caml_wrap_exception(_ay_);
        if(_ay_ !== Not_found)throw _ay_;
        var
         _au_=
          [0,
           [0,cst_help$0,[0,help_action],cst_Display_this_list_of_options$0],
           0],
         add2=_au_}
      var _av_=caml_call2(Pervasives[25],_at_,add2);
      return caml_call2(Pervasives[25],speclist,_av_)}
    function usage_b(buf,speclist,errmsg)
     {caml_call3(Printf[5],buf,_d_,errmsg);
      var _ap_=add_help(speclist);
      function _aq_(_ar_){return print_spec(buf,_ar_)}
      return caml_call2(List[15],_aq_,_ap_)}
    function usage_string(speclist,errmsg)
     {var b=caml_call1(Buffer[1],200);
      usage_b(b,speclist,errmsg);
      return caml_call1(Buffer[2],b)}
    function usage(speclist,errmsg)
     {var _ao_=usage_string(speclist,errmsg);
      return caml_call2(Printf[3],_e_,_ao_)}
    var current=[0,0];
    function bool_of_string_opt(x)
     {try
       {var _am_=[0,caml_call1(Pervasives[19],x)];return _am_}
      catch(_an_)
       {_an_ = caml_wrap_exception(_an_);
        if(_an_[1] === Invalid_argument)return 0;
        throw _an_}}
    function int_of_string_opt(x)
     {try
       {var _ak_=[0,runtime.caml_int_of_string(x)];return _ak_}
      catch(_al_)
       {_al_ = caml_wrap_exception(_al_);
        if(_al_[1] === Failure)return 0;
        throw _al_}}
    function float_of_string_opt(x)
     {try
       {var _ai_=[0,runtime.caml_float_of_string(x)];return _ai_}
      catch(_aj_)
       {_aj_ = caml_wrap_exception(_aj_);
        if(_aj_[1] === Failure)return 0;
        throw _aj_}}
    function parse_and_expand_argv_dynamic_aux
     (allow_expand,current,argv,speclist,anonfun,errmsg)
     {var initpos=current[1];
      function convert_error(error)
       {var
         b=caml_call1(Buffer[1],200),
         progname=
          initpos < argv[1].length - 1
           ?caml_check_bound(argv[1],initpos)[1 + initpos]
           :cst$2;
        switch(error[0])
         {case 0:
           var _ah_=error[1];
           if(caml_string_notequal(_ah_,cst_help$3))
            if(caml_string_notequal(_ah_,cst_help$4))
             caml_call4(Printf[5],b,_f_,progname,_ah_);
           break;
          case 1:
           var expected=error[3],arg=error[2],opt=error[1];
           caml_call6(Printf[5],b,_i_,progname,arg,opt,expected);
           break;
          case 2:var s=error[1];caml_call4(Printf[5],b,_j_,progname,s);break;
          default:var s$0=error[1];caml_call4(Printf[5],b,_k_,progname,s$0)}
        usage_b(b,speclist[1],errmsg);
        if(! caml_equal(error,_g_))
         if(! caml_equal(error,_h_))return [0,Bad,caml_call1(Buffer[2],b)];
        return [0,Help,caml_call1(Buffer[2],b)]}
      current[1]++;
      for(;;)
       {if(current[1] < argv[1].length - 1)
         {try
           {var _Z_=current[1],s=caml_check_bound(argv[1],_Z_)[1 + _Z_];
            if(1 <= caml_ml_string_length(s))
             if(45 === caml_string_get(s,0))
              {try
                {var
                  follow$1=0,
                  _$_=assoc3(s,speclist[1]),
                  action=_$_,
                  follow$0=follow$1}
               catch(_af_)
                {_af_ = caml_wrap_exception(_af_);
                 if(_af_ !== Not_found)throw _af_;
                 try
                  {var
                    match=split(s),
                    arg=match[2],
                    keyword=match[1],
                    follow=[0,arg],
                    ___=assoc3(keyword,speclist[1])}
                 catch(_ag_)
                  {_ag_ = caml_wrap_exception(_ag_);
                   if(_ag_ === Not_found)throw [0,Stop,[0,s]];
                   throw _ag_;
                   var _aa_=_ag_}
                 var action=___,follow$0=follow,_ab_=_af_}
               var
                no_arg$0=
                 function(s,follow)
                  {function no_arg(param)
                    {if(follow)
                      {var arg=follow[1];throw [0,Stop,[1,s,arg,cst_no_argument]]}
                     return 0}
                   return no_arg},
                no_arg=no_arg$0(s,follow$0),
                get_arg$0=
                 function(s,follow)
                  {function get_arg(param)
                    {if(follow){var arg=follow[1];return arg}
                     if((current[1] + 1 | 0) < argv[1].length - 1)
                      {var _ae_=current[1] + 1 | 0;
                       return caml_check_bound(argv[1],_ae_)[1 + _ae_]}
                     throw [0,Stop,[2,s]]}
                   return get_arg},
                get_arg=get_arg$0(s,follow$0),
                consume_arg$0=
                 function(follow)
                  {function consume_arg(param)
                    {return follow?0:(current[1]++,0)}
                   return consume_arg},
                consume_arg=consume_arg$0(follow$0),
                treat_action$0=
                 function(s,no_arg,get_arg,consume_arg)
                  {function treat_action(param)
                    {switch(param[0])
                      {case 0:var f=param[1];return caml_call1(f,0);
                       case 1:
                        var
                         f$0=param[1],
                         arg=get_arg(0),
                         match=bool_of_string_opt(arg);
                        if(match)
                         {var s$0=match[1];caml_call1(f$0,s$0);return consume_arg(0)}
                        throw [0,Stop,[1,s,arg,cst_a_boolean]];
                       case 2:var r=param[1];no_arg(0);r[1] = 1;return 0;
                       case 3:var r$0=param[1];no_arg(0);r$0[1] = 0;return 0;
                       case 4:
                        var f$1=param[1],arg$0=get_arg(0);
                        caml_call1(f$1,arg$0);
                        return consume_arg(0);
                       case 5:
                        var r$1=param[1];r$1[1] = get_arg(0);return consume_arg(0);
                       case 6:
                        var
                         f$2=param[1],
                         arg$1=get_arg(0),
                         match$0=int_of_string_opt(arg$1);
                        if(match$0)
                         {var x=match$0[1];caml_call1(f$2,x);return consume_arg(0)}
                        throw [0,Stop,[1,s,arg$1,cst_an_integer]];
                       case 7:
                        var
                         r$2=param[1],
                         arg$2=get_arg(0),
                         match$1=int_of_string_opt(arg$2);
                        if(match$1)
                         {var x$0=match$1[1];r$2[1] = x$0;return consume_arg(0)}
                        throw [0,Stop,[1,s,arg$2,cst_an_integer$0]];
                       case 8:
                        var
                         f$3=param[1],
                         arg$3=get_arg(0),
                         match$2=float_of_string_opt(arg$3);
                        if(match$2)
                         {var x$1=match$2[1];
                          caml_call1(f$3,x$1);
                          return consume_arg(0)}
                        throw [0,Stop,[1,s,arg$3,cst_a_float]];
                       case 9:
                        var
                         r$3=param[1],
                         arg$4=get_arg(0),
                         match$3=float_of_string_opt(arg$4);
                        if(match$3)
                         {var x$2=match$3[1];r$3[1] = x$2;return consume_arg(0)}
                        throw [0,Stop,[1,s,arg$4,cst_a_float$0]];
                       case 10:
                        var specs=param[1];
                        return caml_call2(List[15],treat_action,specs);
                       case 11:
                        var f$4=param[2],symb=param[1],arg$5=get_arg(0);
                        if(caml_call2(List[31],arg$5,symb))
                         {caml_call1(f$4,arg$5);return consume_arg(0)}
                        var _ac_=make_symlist(cst$5,cst$4,cst$3,symb);
                        throw [0,
                               Stop,
                               [1,s,arg$5,caml_call2(Pervasives[16],cst_one_of,_ac_)]];
                       case 12:
                        var f$5=param[1];
                        for(;;)
                         {if(current[1] < (argv[1].length - 1 - 1 | 0))
                           {var _ad_=current[1] + 1 | 0;
                            caml_call1(f$5,caml_check_bound(argv[1],_ad_)[1 + _ad_]);
                            consume_arg(0);
                            continue}
                          return 0}
                       default:
                        var f$6=param[1];
                        if(1 - allow_expand)
                         throw [0,
                                Invalid_argument,
                                cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic];
                        var arg$6=get_arg(0),newarg=caml_call1(f$6,arg$6);
                        consume_arg(0);
                        var
                         before=caml_call3(Array[7],argv[1],0,current[1] + 1 | 0),
                         after=
                          caml_call3
                           (Array[7],
                            argv[1],
                            current[1] + 1 | 0,
                            (argv[1].length - 1 - current[1] | 0) - 1 | 0);
                        argv[1]
                        =
                        caml_call1(Array[6],[0,before,[0,newarg,[0,after,0]]]);
                        return 0}}
                   return treat_action},
                treat_action=treat_action$0(s,no_arg,get_arg,consume_arg);
               treat_action(action);
               var switch$0=1}
             else
              var switch$0=0;
            else
             var switch$0=0;
            if(! switch$0)caml_call1(anonfun,s)}
          catch(exn$0)
           {exn$0 = caml_wrap_exception(exn$0);
            if(exn$0[1] === Bad){var m=exn$0[2];throw convert_error([3,m])}
            if(exn$0[1] === Stop){var e=exn$0[2];throw convert_error(e)}
            throw exn$0;
            var exn=exn$0}
          current[1]++;
          continue}
        return 0}}
    function parse_and_expand_argv_dynamic
     (current,argv,speclist,anonfun,errmsg)
     {return parse_and_expand_argv_dynamic_aux
              (1,current,argv,speclist,anonfun,errmsg)}
    function parse_argv_dynamic(opt,argv,speclist,anonfun,errmsg)
     {if(opt)var sth=opt[1],current$0=sth;else var current$0=current;
      return parse_and_expand_argv_dynamic_aux
              (0,current$0,[0,argv],speclist,anonfun,errmsg)}
    function parse_argv(opt,argv,speclist,anonfun,errmsg)
     {if(opt)var sth=opt[1],current$0=sth;else var current$0=current;
      return parse_argv_dynamic
              ([0,current$0],argv,[0,speclist],anonfun,errmsg)}
    function parse(l,f,msg)
     {try
       {var _Y_=parse_argv(0,Sys[1],l,f,msg);return _Y_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(exn[1] === Bad)
         {var msg$0=exn[2];
          caml_call2(Printf[3],_l_,msg$0);
          return caml_call1(Pervasives[87],2)}
        if(exn[1] === Help)
         {var msg$1=exn[2];
          caml_call2(Printf[2],_m_,msg$1);
          return caml_call1(Pervasives[87],0)}
        throw exn}}
    function parse_dynamic(l,f,msg)
     {try
       {var _X_=parse_argv_dynamic(0,Sys[1],l,f,msg);return _X_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(exn[1] === Bad)
         {var msg$0=exn[2];
          caml_call2(Printf[3],_n_,msg$0);
          return caml_call1(Pervasives[87],2)}
        if(exn[1] === Help)
         {var msg$1=exn[2];
          caml_call2(Printf[2],_o_,msg$1);
          return caml_call1(Pervasives[87],0)}
        throw exn}}
    function parse_expand(l,f,msg)
     {try
       {var
         argv=[0,Sys[1]],
         spec=[0,l],
         current$0=[0,current[1]],
         _W_=parse_and_expand_argv_dynamic(current$0,argv,spec,f,msg);
        return _W_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(exn[1] === Bad)
         {var msg$0=exn[2];
          caml_call2(Printf[3],_p_,msg$0);
          return caml_call1(Pervasives[87],2)}
        if(exn[1] === Help)
         {var msg$1=exn[2];
          caml_call2(Printf[2],_q_,msg$1);
          return caml_call1(Pervasives[87],0)}
        throw exn}}
    function second_word(s)
     {var len=caml_ml_string_length(s);
      function loop(n)
       {var n$0=n;
        for(;;)
         {if(len <= n$0)return len;
          if(32 === caml_string_get(s,n$0))
           {var n$1=n$0 + 1 | 0,n$0=n$1;continue}
          return n$0}}
      try
       {var n$0=caml_call2(String[14],s,9)}
      catch(_U_)
       {_U_ = caml_wrap_exception(_U_);
        if(_U_ === Not_found)
         {try
           {var n=caml_call2(String[14],s,32)}
          catch(_V_)
           {_V_ = caml_wrap_exception(_V_);
            if(_V_ === Not_found)return len;
            throw _V_}
          return loop(n + 1 | 0)}
        throw _U_}
      return loop(n$0 + 1 | 0)}
    function max_arg_len(cur,param)
     {var doc=param[3],spec=param[2],kwd=param[1];
      if(11 === spec[0])
       return caml_call2(Pervasives[5],cur,caml_ml_string_length(kwd));
      var _T_=caml_ml_string_length(kwd) + second_word(doc) | 0;
      return caml_call2(Pervasives[5],cur,_T_)}
    function replace_leading_tab(s)
     {var seen=[0,0];
      function _S_(c){if(9 === c)if(! seen[1]){seen[1] = 1;return 32}return c}
      return caml_call2(String[10],_S_,s)}
    function add_padding(len,ksd)
     {var _L_=ksd[2],_M_=ksd[1];
      if(caml_string_notequal(ksd[3],cst$6))
       {if(11 === _L_[0])
         {var
           msg$0=ksd[3],
           cutcol$0=second_word(msg$0),
           _P_=caml_call2(Pervasives[5],0,len - cutcol$0 | 0) + 3 | 0,
           spaces$0=caml_call2(String[1],_P_,32),
           _Q_=replace_leading_tab(msg$0),
           _R_=caml_call2(Pervasives[16],spaces$0,_Q_);
          return [0,_M_,_L_,caml_call2(Pervasives[16],cst$7,_R_)]}
        var
         msg=ksd[3],
         cutcol=second_word(msg),
         kwd_len=caml_ml_string_length(_M_),
         diff=(len - kwd_len | 0) - cutcol | 0;
        if(0 < diff)
         {var
           spaces=caml_call2(String[1],diff,32),
           _N_=replace_leading_tab(msg),
           prefix=caml_call3(String[4],_N_,0,cutcol),
           suffix=
            caml_call3
             (String[4],msg,cutcol,caml_ml_string_length(msg) - cutcol | 0),
           _O_=caml_call2(Pervasives[16],spaces,suffix);
          return [0,_M_,_L_,caml_call2(Pervasives[16],prefix,_O_)]}
        return [0,_M_,_L_,replace_leading_tab(msg)]}
      return ksd}
    function align(opt,speclist)
     {if(opt)var sth=opt[1],limit=sth;else var limit=Pervasives[7];
      var
       completed=add_help(speclist),
       len=caml_call3(List[20],max_arg_len,0,completed),
       len$0=caml_call2(Pervasives[4],len,limit);
      function _J_(_K_){return add_padding(len$0,_K_)}
      return caml_call2(List[17],_J_,completed)}
    function trim_cr(s)
     {var len=caml_ml_string_length(s);
      if(0 < len)
       if(13 === caml_string_get(s,len - 1 | 0))
        return caml_call3(String[4],s,0,len - 1 | 0);
      return s}
    function read_aux(trim,sep,file)
     {var
       ic=caml_call1(Pervasives[68],file),
       buf=caml_call1(Buffer[1],200),
       words=[0,0];
      function stash(param)
       {var word=caml_call1(Buffer[2],buf),word$0=trim?trim_cr(word):word;
        words[1] = [0,word$0,words[1]];
        return caml_call1(Buffer[8],buf)}
      function read(param)
       {try
         {var
           c=caml_call1(Pervasives[70],ic),
           _H_=
            c === sep
             ?(stash(0),read(0))
             :(caml_call2(Buffer[10],buf,c),read(0));
          return _H_}
        catch(_I_)
         {_I_ = caml_wrap_exception(_I_);
          if(_I_ === End_of_file)
           {var _G_=0 < caml_call1(Buffer[7],buf)?1:0;return _G_?stash(0):_G_}
          throw _I_}}
      read(0);
      caml_call1(Pervasives[81],ic);
      var _F_=caml_call1(List[9],words[1]);
      return caml_call1(Array[12],_F_)}
    var _r_=10,_s_=1;
    function read_arg(_E_){return read_aux(_s_,_r_,_E_)}
    var _t_=0,_u_=0;
    function read_arg0(_D_){return read_aux(_u_,_t_,_D_)}
    function write_aux(sep,file,args)
     {var oc=caml_call1(Pervasives[49],file);
      function _C_(s){return caml_call4(Printf[1],oc,_v_,s,sep)}
      caml_call2(Array[13],_C_,args);
      return caml_call1(Pervasives[64],oc)}
    var _w_=10;
    function write_arg(_A_,_B_){return write_aux(_w_,_A_,_B_)}
    var _x_=0;
    function write_arg0(_y_,_z_){return write_aux(_x_,_y_,_z_)}
    var
     Arg=
      [0,
       parse,
       parse_dynamic,
       parse_argv,
       parse_argv_dynamic,
       parse_and_expand_argv_dynamic,
       parse_expand,
       Help,
       Bad,
       usage,
       usage_string,
       align,
       current,
       read_arg,
       read_arg0,
       write_arg,
       write_arg0];
    runtime.caml_register_global(58,Arg,"Arg");
    return}
  (function(){return this}()));
