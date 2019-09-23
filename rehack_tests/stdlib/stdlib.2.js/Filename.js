(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_equal=runtime.caml_string_equal,
     caml_string_get=runtime.caml_string_get,
     caml_string_notequal=runtime.caml_string_notequal,
     caml_sys_getenv=runtime.caml_sys_getenv,
     caml_trampoline=runtime.caml_trampoline,
     caml_trampoline_return=runtime.caml_trampoline_return,
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
    var
     global_data=runtime.caml_get_global_data(),
     cst_Filename_chop_extension=caml_new_string("Filename.chop_extension"),
     cst$10=caml_new_string(""),
     cst_Filename_chop_suffix=caml_new_string("Filename.chop_suffix"),
     cst$9=caml_new_string(""),
     cst$7=caml_new_string("./"),
     cst$6=caml_new_string(".\\"),
     cst$5=caml_new_string("../"),
     cst$4=caml_new_string("..\\"),
     cst$2=caml_new_string("./"),
     cst$1=caml_new_string("../"),
     cst$0=caml_new_string(""),
     cst=caml_new_string(""),
     current_dir_name=caml_new_string("."),
     parent_dir_name=caml_new_string(".."),
     dir_sep=caml_new_string("/"),
     cst_TMPDIR=caml_new_string("TMPDIR"),
     cst_tmp=caml_new_string("/tmp"),
     cst$3=caml_new_string("'\\''"),
     current_dir_name$0=caml_new_string("."),
     parent_dir_name$0=caml_new_string(".."),
     dir_sep$0=caml_new_string("\\"),
     cst_TEMP=caml_new_string("TEMP"),
     cst$8=caml_new_string("."),
     current_dir_name$1=caml_new_string("."),
     parent_dir_name$1=caml_new_string(".."),
     dir_sep$1=caml_new_string("/"),
     cst_Cygwin=caml_new_string("Cygwin"),
     cst_Win32=caml_new_string("Win32"),
     Pervasives=global_data.Pervasives,
     Sys_error=global_data.Sys_error,
     CamlinternalLazy=global_data.CamlinternalLazy,
     Random=global_data.Random,
     Printf=global_data.Printf,
     String=global_data.String,
     Buffer=global_data.Buffer,
     Not_found=global_data.Not_found,
     Sys=global_data.Sys,
     _d_=[0,7,0],
     _c_=[0,1,[0,3,[0,5,0]]],
     _b_=[0,[2,0,[4,6,[0,2,6],0,[2,0,0]]],caml_new_string("%s%06x%s")];
    function generic_quote(quotequote,s)
     {var l=caml_ml_string_length(s),b=caml_call1(Buffer[1],l + 20 | 0);
      caml_call2(Buffer[10],b,39);
      var _ao_=l - 1 | 0,_an_=0;
      if(! (_ao_ < 0))
       {var i=_an_;
        for(;;)
         {if(39 === caml_string_get(s,i))
           caml_call2(Buffer[14],b,quotequote);
          else
           {var _aq_=caml_string_get(s,i);caml_call2(Buffer[10],b,_aq_)}
          var _ap_=i + 1 | 0;
          if(_ao_ !== i){var i=_ap_;continue}
          break}}
      caml_call2(Buffer[10],b,39);
      return caml_call1(Buffer[2],b)}
    function generic_basename(is_dir_sep,current_dir_name,name)
     {function find_beg(n,p)
       {var n$0=n;
        for(;;)
         {if(0 <= n$0)
           {if(caml_call2(is_dir_sep,name,n$0))
             return caml_call3
                     (String[4],name,n$0 + 1 | 0,(p - n$0 | 0) - 1 | 0);
            var n$1=n$0 - 1 | 0,n$0=n$1;
            continue}
          return caml_call3(String[4],name,0,p)}}
      function find_end(n)
       {var n$0=n;
        for(;;)
         {if(0 <= n$0)
           {if(caml_call2(is_dir_sep,name,n$0))
             {var n$1=n$0 - 1 | 0,n$0=n$1;continue}
            return find_beg(n$0,n$0 + 1 | 0)}
          return caml_call3(String[4],name,0,1)}}
      return caml_string_equal(name,cst)
              ?current_dir_name
              :find_end(caml_ml_string_length(name) - 1 | 0)}
    function generic_dirname(is_dir_sep,current_dir_name,name)
     {function intermediate_sep(n)
       {var n$0=n;
        for(;;)
         {if(0 <= n$0)
           {if(caml_call2(is_dir_sep,name,n$0))
             {var n$1=n$0 - 1 | 0,n$0=n$1;continue}
            return caml_call3(String[4],name,0,n$0 + 1 | 0)}
          return caml_call3(String[4],name,0,1)}}
      function base(n)
       {var n$0=n;
        for(;;)
         {if(0 <= n$0)
           {if(caml_call2(is_dir_sep,name,n$0))return intermediate_sep(n$0);
            var n$1=n$0 - 1 | 0,n$0=n$1;
            continue}
          return current_dir_name}}
      function trailing_sep(n)
       {var n$0=n;
        for(;;)
         {if(0 <= n$0)
           {if(caml_call2(is_dir_sep,name,n$0))
             {var n$1=n$0 - 1 | 0,n$0=n$1;continue}
            return base(n$0)}
          return caml_call3(String[4],name,0,1)}}
      return caml_string_equal(name,cst$0)
              ?current_dir_name
              :trailing_sep(caml_ml_string_length(name) - 1 | 0)}
    function is_dir_sep(s,i){return 47 === caml_string_get(s,i)?1:0}
    function is_relative(n)
     {var
       _al_=caml_ml_string_length(n) < 1?1:0,
       _am_=_al_ || (47 !== caml_string_get(n,0)?1:0);
      return _am_}
    function is_implicit(n)
     {var _ag_=is_relative(n);
      if(_ag_)
       {var
         _ah_=caml_ml_string_length(n) < 2?1:0,
         _ai_=_ah_ || caml_string_notequal(caml_call3(String[4],n,0,2),cst$2);
        if(_ai_)
         var
          _aj_=caml_ml_string_length(n) < 3?1:0,
          _ak_=_aj_ || caml_string_notequal(caml_call3(String[4],n,0,3),cst$1);
        else
         var _ak_=_ai_}
      else
       var _ak_=_ag_;
      return _ak_}
    function check_suffix(name,suff)
     {var
       _ae_=caml_ml_string_length(suff) <= caml_ml_string_length(name)?1:0,
       _af_=
        _ae_
         ?caml_string_equal
           (caml_call3
             (String[4],
              name,
              caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
              caml_ml_string_length(suff)),
            suff)
         :_ae_;
      return _af_}
    try
     {var _n_=caml_sys_getenv(cst_TMPDIR),temp_dir_name=_n_}
    catch(_ad_)
     {_ad_ = caml_wrap_exception(_ad_);
      if(_ad_ !== Not_found)throw _ad_;
      var temp_dir_name=cst_tmp}
    function quote(_ac_){return generic_quote(cst$3,_ac_)}
    function basename(_ab_)
     {return generic_basename(is_dir_sep,current_dir_name,_ab_)}
    function dirname(_aa_)
     {return generic_dirname(is_dir_sep,current_dir_name,_aa_)}
    function is_dir_sep$0(s,i)
     {var c=caml_string_get(s,i),_Z_=47 === c?1:0;
      if(_Z_)var ___=_Z_;else var _$_=92 === c?1:0,___=_$_ || (58 === c?1:0);
      return ___}
    function is_relative$0(n)
     {var
       _T_=caml_ml_string_length(n) < 1?1:0,
       _U_=_T_ || (47 !== caml_string_get(n,0)?1:0);
      if(_U_)
       {var
         _V_=caml_ml_string_length(n) < 1?1:0,
         _W_=_V_ || (92 !== caml_string_get(n,0)?1:0);
        if(_W_)
         var
          _X_=caml_ml_string_length(n) < 2?1:0,
          _Y_=_X_ || (58 !== caml_string_get(n,1)?1:0);
        else
         var _Y_=_W_}
      else
       var _Y_=_U_;
      return _Y_}
    function is_implicit$0(n)
     {var _K_=is_relative$0(n);
      if(_K_)
       {var
         _L_=caml_ml_string_length(n) < 2?1:0,
         _M_=_L_ || caml_string_notequal(caml_call3(String[4],n,0,2),cst$7);
        if(_M_)
         {var
           _N_=caml_ml_string_length(n) < 2?1:0,
           _O_=_N_ || caml_string_notequal(caml_call3(String[4],n,0,2),cst$6);
          if(_O_)
           {var
             _P_=caml_ml_string_length(n) < 3?1:0,
             _Q_=
              _P_
              ||
              caml_string_notequal(caml_call3(String[4],n,0,3),cst$5);
            if(_Q_)
             var
              _R_=caml_ml_string_length(n) < 3?1:0,
              _S_=
               _R_
               ||
               caml_string_notequal(caml_call3(String[4],n,0,3),cst$4);
            else
             var _S_=_Q_}
          else
           var _S_=_O_}
        else
         var _S_=_M_}
      else
       var _S_=_K_;
      return _S_}
    function check_suffix$0(name,suff)
     {var _H_=caml_ml_string_length(suff) <= caml_ml_string_length(name)?1:0;
      if(_H_)
       var
        s=
         caml_call3
          (String[4],
           name,
           caml_ml_string_length(name) - caml_ml_string_length(suff) | 0,
           caml_ml_string_length(suff)),
        _I_=caml_call1(String[30],suff),
        _J_=caml_string_equal(caml_call1(String[30],s),_I_);
      else
       var _J_=_H_;
      return _J_}
    try
     {var _m_=caml_sys_getenv(cst_TEMP),temp_dir_name$0=_m_}
    catch(_G_)
     {_G_ = caml_wrap_exception(_G_);
      if(_G_ !== Not_found)throw _G_;
      var temp_dir_name$0=cst$8}
    function quote$0(s)
     {var l=caml_ml_string_length(s),b=caml_call1(Buffer[1],l + 20 | 0);
      caml_call2(Buffer[10],b,34);
      function add_bs(n)
       {var _E_=1;
        if(! (n < 1))
         {var j=_E_;
          for(;;)
           {caml_call2(Buffer[10],b,92);
            var _F_=j + 1 | 0;
            if(n !== j){var j=_F_;continue}
            break}}
        return 0}
      function loop$0(counter,i)
       {var i$0=i;
        for(;;)
         {if(i$0 === l)return caml_call2(Buffer[10],b,34);
          var c=caml_string_get(s,i$0);
          if(34 === c)
           {var _C_=0;
            if(counter < 50)
             {var counter$1=counter + 1 | 0;return loop_bs(counter$1,_C_,i$0)}
            return caml_trampoline_return(loop_bs,[0,_C_,i$0])}
          if(92 === c)
           {var _D_=0;
            if(counter < 50)
             {var counter$0=counter + 1 | 0;return loop_bs(counter$0,_D_,i$0)}
            return caml_trampoline_return(loop_bs,[0,_D_,i$0])}
          caml_call2(Buffer[10],b,c);
          var i$1=i$0 + 1 | 0,i$0=i$1;
          continue}}
      function loop_bs(counter,n,i)
       {var n$0=n,i$0=i;
        for(;;)
         {if(i$0 === l){caml_call2(Buffer[10],b,34);return add_bs(n$0)}
          var match=caml_string_get(s,i$0);
          if(34 === match)
           {add_bs((2 * n$0 | 0) + 1 | 0);
            caml_call2(Buffer[10],b,34);
            var _B_=i$0 + 1 | 0;
            if(counter < 50)
             {var counter$1=counter + 1 | 0;return loop$0(counter$1,_B_)}
            return caml_trampoline_return(loop$0,[0,_B_])}
          if(92 === match)
           {var i$1=i$0 + 1 | 0,n$1=n$0 + 1 | 0,n$0=n$1,i$0=i$1;continue}
          add_bs(n$0);
          if(counter < 50)
           {var counter$0=counter + 1 | 0;return loop$0(counter$0,i$0)}
          return caml_trampoline_return(loop$0,[0,i$0])}}
      function loop(i){return caml_trampoline(loop$0(0,i))}
      loop(0);
      return caml_call1(Buffer[2],b)}
    function has_drive(s)
     {function is_letter(param)
       {var
         switch$0=
          91 <= param?25 < (param - 97 | 0) >>> 0?0:1:65 <= param?1:0;
        return switch$0?1:0}
      var _y_=2 <= caml_ml_string_length(s)?1:0;
      if(_y_)
       var
        _z_=is_letter(caml_string_get(s,0)),
        _A_=_z_?58 === caml_string_get(s,1)?1:0:_z_;
      else
       var _A_=_y_;
      return _A_}
    function drive_and_path(s)
     {if(has_drive(s))
       {var _x_=caml_call3(String[4],s,2,caml_ml_string_length(s) - 2 | 0);
        return [0,caml_call3(String[4],s,0,2),_x_]}
      return [0,cst$9,s]}
    function dirname$0(s)
     {var
       match=drive_and_path(s),
       path=match[2],
       drive=match[1],
       dir=generic_dirname(is_dir_sep$0,current_dir_name$0,path);
      return caml_call2(Pervasives[16],drive,dir)}
    function basename$0(s)
     {var match=drive_and_path(s),path=match[2];
      return generic_basename(is_dir_sep$0,current_dir_name$0,path)}
    function basename$1(_w_)
     {return generic_basename(is_dir_sep$0,current_dir_name$1,_w_)}
    function dirname$1(_v_)
     {return generic_dirname(is_dir_sep$0,current_dir_name$1,_v_)}
    var _a_=Sys[5];
    if(caml_string_notequal(_a_,cst_Cygwin))
     if(caml_string_notequal(_a_,cst_Win32))
      var
       current_dir_name$2=current_dir_name,
       parent_dir_name$2=parent_dir_name,
       dir_sep$2=dir_sep,
       is_dir_sep$1=is_dir_sep,
       is_relative$1=is_relative,
       is_implicit$1=is_implicit,
       check_suffix$1=check_suffix,
       temp_dir_name$1=temp_dir_name,
       quote$1=quote,
       basename$2=basename,
       dirname$2=dirname,
       switch$0=1;
     else
      var
       _e_=
        [0,
         current_dir_name$0,
         parent_dir_name$0,
         dir_sep$0,
         is_dir_sep$0,
         is_relative$0,
         is_implicit$0,
         check_suffix$0,
         temp_dir_name$0,
         quote$0,
         basename$0,
         dirname$0],
       switch$0=0;
    else
     var
      _e_=
       [0,
        current_dir_name$1,
        parent_dir_name$1,
        dir_sep$1,
        is_dir_sep$0,
        is_relative$0,
        is_implicit$0,
        check_suffix$0,
        temp_dir_name,
        quote,
        basename$1,
        dirname$1],
      switch$0=0;
    if(! switch$0)
     var
      _f_=_e_[11],
      _g_=_e_[10],
      _h_=_e_[9],
      _i_=_e_[8],
      _j_=_e_[3],
      _k_=_e_[2],
      _l_=_e_[1],
      current_dir_name$2=_l_,
      parent_dir_name$2=_k_,
      dir_sep$2=_j_,
      is_dir_sep$1=is_dir_sep$0,
      is_relative$1=is_relative$0,
      is_implicit$1=is_implicit$0,
      check_suffix$1=check_suffix$0,
      temp_dir_name$1=_i_,
      quote$1=_h_,
      basename$2=_g_,
      dirname$2=_f_;
    function concat(dirname,filename)
     {var l=caml_ml_string_length(dirname);
      if(0 !== l)
       if(! is_dir_sep$1(dirname,l - 1 | 0))
        {var _u_=caml_call2(Pervasives[16],dir_sep$2,filename);
         return caml_call2(Pervasives[16],dirname,_u_)}
      return caml_call2(Pervasives[16],dirname,filename)}
    function chop_suffix(name,suff)
     {var n=caml_ml_string_length(name) - caml_ml_string_length(suff) | 0;
      return 0 <= n
              ?caml_call3(String[4],name,0,n)
              :caml_call1(Pervasives[1],cst_Filename_chop_suffix)}
    function extension_len(name)
     {function check(i0,i)
       {var i$0=i;
        for(;;)
         {if(0 <= i$0)
           if(! is_dir_sep$1(name,i$0))
            {if(46 === caml_string_get(name,i$0))
              {var i$1=i$0 - 1 | 0,i$0=i$1;continue}
             return caml_ml_string_length(name) - i0 | 0}
          return 0}}
      function search_dot(i)
       {var i$0=i;
        for(;;)
         {if(0 <= i$0)
           if(! is_dir_sep$1(name,i$0))
            {if(46 === caml_string_get(name,i$0))
              return check(i$0,i$0 - 1 | 0);
             var i$1=i$0 - 1 | 0,i$0=i$1;
             continue}
          return 0}}
      return search_dot(caml_ml_string_length(name) - 1 | 0)}
    function extension(name)
     {var l=extension_len(name);
      return 0 === l
              ?cst$10
              :caml_call3
                (String[4],name,caml_ml_string_length(name) - l | 0,l)}
    function chop_extension(name)
     {var l=extension_len(name);
      return 0 === l
              ?caml_call1(Pervasives[1],cst_Filename_chop_extension)
              :caml_call3
                (String[4],name,0,caml_ml_string_length(name) - l | 0)}
    function remove_extension(name)
     {var l=extension_len(name);
      return 0 === l
              ?name
              :caml_call3
                (String[4],name,0,caml_ml_string_length(name) - l | 0)}
    var prng=[246,function(_t_){return caml_call1(Random[11][2],0)}];
    function temp_file_name(temp_dir,prefix,suffix)
     {var
       _r_=runtime.caml_obj_tag(prng),
       _s_=
        250 === _r_
         ?prng[1]
         :246 === _r_?caml_call1(CamlinternalLazy[2],prng):prng,
       rnd=caml_call1(Random[11][4],_s_) & 16777215;
      return concat(temp_dir,caml_call4(Printf[4],_b_,prefix,rnd,suffix))}
    var current_temp_dir_name=[0,temp_dir_name$1];
    function set_temp_dir_name(s){current_temp_dir_name[1] = s;return 0}
    function get_temp_dir_name(param){return current_temp_dir_name[1]}
    function temp_file(opt,prefix,suffix)
     {if(opt)
       var sth=opt[1],temp_dir=sth;
      else
       var temp_dir=current_temp_dir_name[1];
      function try_name(counter)
       {var counter$0=counter;
        for(;;)
         {var name=temp_file_name(temp_dir,prefix,suffix);
          try
           {runtime.caml_sys_close(runtime.caml_sys_open(name,_c_,384));
            return name}
          catch(e)
           {e = caml_wrap_exception(e);
            if(e[1] === Sys_error)
             {if(1000 <= counter$0)throw e;
              var counter$1=counter$0 + 1 | 0,counter$0=counter$1;
              continue}
            throw e}}}
      return try_name(0)}
    function open_temp_file(opt,_p_,_o_,prefix,suffix)
     {if(opt)var sth=opt[1],mode=sth;else var mode=_d_;
      if(_p_)var sth$0=_p_[1],perms=sth$0;else var perms=384;
      if(_o_)
       var sth$1=_o_[1],temp_dir=sth$1;
      else
       var temp_dir=current_temp_dir_name[1];
      function try_name(counter)
       {var counter$0=counter;
        for(;;)
         {var name=temp_file_name(temp_dir,prefix,suffix);
          try
           {var
             _q_=
              [0,
               name,
               caml_call3(Pervasives[50],[0,1,[0,3,[0,5,mode]]],perms,name)];
            return _q_}
          catch(e)
           {e = caml_wrap_exception(e);
            if(e[1] === Sys_error)
             {if(1000 <= counter$0)throw e;
              var counter$1=counter$0 + 1 | 0,counter$0=counter$1;
              continue}
            throw e}}}
      return try_name(0)}
    var
     Filename=
      [0,
       current_dir_name$2,
       parent_dir_name$2,
       dir_sep$2,
       concat,
       is_relative$1,
       is_implicit$1,
       check_suffix$1,
       chop_suffix,
       extension,
       remove_extension,
       chop_extension,
       basename$2,
       dirname$2,
       temp_file,
       open_temp_file,
       get_temp_dir_name,
       set_temp_dir_name,
       temp_dir_name$1,
       quote$1];
    runtime.caml_register_global(40,Filename,"Filename");
    return}
  (function(){return this}()));
