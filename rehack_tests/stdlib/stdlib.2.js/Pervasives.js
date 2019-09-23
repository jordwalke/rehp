(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_blit_string=runtime.caml_blit_string,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_float_of_string=runtime.caml_float_of_string,
     caml_int64_float_of_bits=runtime.caml_int64_float_of_bits,
     caml_int_of_string=runtime.caml_int_of_string,
     caml_ml_bytes_length=runtime.caml_ml_bytes_length,
     caml_ml_channel_size=runtime.caml_ml_channel_size,
     caml_ml_channel_size_64=runtime.caml_ml_channel_size_64,
     caml_ml_close_channel=runtime.caml_ml_close_channel,
     caml_ml_flush=runtime.caml_ml_flush,
     caml_ml_input=runtime.caml_ml_input,
     caml_ml_input_char=runtime.caml_ml_input_char,
     caml_ml_open_descriptor_in=runtime.caml_ml_open_descriptor_in,
     caml_ml_open_descriptor_out=runtime.caml_ml_open_descriptor_out,
     caml_ml_output=runtime.caml_ml_output,
     caml_ml_output_bytes=runtime.caml_ml_output_bytes,
     caml_ml_output_char=runtime.caml_ml_output_char,
     caml_ml_set_binary_mode=runtime.caml_ml_set_binary_mode,
     caml_ml_set_channel_name=runtime.caml_ml_set_channel_name,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_notequal=runtime.caml_string_notequal,
     caml_sys_open=runtime.caml_sys_open,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst$0=caml_new_string("%,"),
     cst_really_input=caml_new_string("really_input"),
     cst_input=caml_new_string("input"),
     cst_output_substring=caml_new_string("output_substring"),
     cst_output=caml_new_string("output"),
     cst_12g=caml_new_string("%.12g"),
     cst=caml_new_string("."),
     cst_false$1=caml_new_string("false"),
     cst_true$1=caml_new_string("true"),
     cst_false$0=caml_new_string("false"),
     cst_true$0=caml_new_string("true"),
     cst_bool_of_string=caml_new_string("bool_of_string"),
     cst_true=caml_new_string("true"),
     cst_false=caml_new_string("false"),
     cst_char_of_int=caml_new_string("char_of_int"),
     cst_Pervasives_Exit=caml_new_string("Pervasives.Exit"),
     End_of_file=global_data.End_of_file,
     CamlinternalFormatBasics=global_data.CamlinternalFormatBasics,
     Sys_error=global_data.Sys_error,
     Failure=global_data.Failure,
     Invalid_argument=global_data.Invalid_argument,
     _l_=[0,0,[0,6,0]],
     _k_=[0,0,[0,7,0]],
     _j_=[0,1,[0,3,[0,4,[0,6,0]]]],
     _i_=[0,1,[0,3,[0,4,[0,7,0]]]],
     _g_=[0,1],
     _h_=[0,0],
     _a_=[255,0,0,32752],
     _b_=[255,0,0,65520],
     _c_=[255,1,0,32752],
     _d_=[255,16777215,16777215,32751],
     _e_=[255,0,0,16],
     _f_=[255,0,0,15536];
    function failwith(s){throw [0,Failure,s]}
    function invalid_arg(s){throw [0,Invalid_argument,s]}
    var Exit=[248,cst_Pervasives_Exit,runtime.caml_fresh_oo_id(0)];
    function min(x,y){return runtime.caml_lessequal(x,y)?x:y}
    function max(x,y){return runtime.caml_greaterequal(x,y)?x:y}
    function abs(x){return 0 <= x?x:- x | 0}
    function lnot(x){return x ^ -1}
    var
     infinity=caml_int64_float_of_bits(_a_),
     neg_infinity=caml_int64_float_of_bits(_b_),
     nan=caml_int64_float_of_bits(_c_),
     max_float=caml_int64_float_of_bits(_d_),
     min_float=caml_int64_float_of_bits(_e_),
     epsilon_float=caml_int64_float_of_bits(_f_),
     max_int=2147483647,
     min_int=-2147483648;
    function symbol(s1,s2)
     {var
       l1=caml_ml_string_length(s1),
       l2=caml_ml_string_length(s2),
       s=caml_create_bytes(l1 + l2 | 0);
      caml_blit_string(s1,0,s,0,l1);
      caml_blit_string(s2,0,s,l1,l2);
      return s}
    function char_of_int(n)
     {if(0 <= n)if(! (255 < n))return n;return invalid_arg(cst_char_of_int)}
    function string_of_bool(b){return b?cst_true:cst_false}
    function bool_of_string(param)
     {return caml_string_notequal(param,cst_false$0)
              ?caml_string_notequal(param,cst_true$0)
                ?invalid_arg(cst_bool_of_string)
                :1
              :0}
    function bool_of_string_opt(param)
     {return caml_string_notequal(param,cst_false$1)
              ?caml_string_notequal(param,cst_true$1)?0:_g_
              :_h_}
    function string_of_int(n){return caml_new_string("" + n)}
    function int_of_string_opt(s)
     {try
       {var _ax_=[0,caml_int_of_string(s)];return _ax_}
      catch(_ay_)
       {_ay_ = caml_wrap_exception(_ay_);
        if(_ay_[1] === Failure)return 0;
        throw _ay_}}
    function valid_float_lexem(s)
     {var l=caml_ml_string_length(s);
      function loop(i)
       {var i$0=i;
        for(;;)
         {if(l <= i$0)return symbol(s,cst);
          var
           match=runtime.caml_string_get(s,i$0),
           switch$0=48 <= match?58 <= match?0:1:45 === match?1:0;
          if(switch$0){var i$1=i$0 + 1 | 0,i$0=i$1;continue}
          return s}}
      return loop(0)}
    function string_of_float(f)
     {return valid_float_lexem(runtime.caml_format_float(cst_12g,f))}
    function float_of_string_opt(s)
     {try
       {var _av_=[0,caml_float_of_string(s)];return _av_}
      catch(_aw_)
       {_aw_ = caml_wrap_exception(_aw_);
        if(_aw_[1] === Failure)return 0;
        throw _aw_}}
    function symbol$0(l1,l2)
     {if(l1){var tl=l1[2],hd=l1[1];return [0,hd,symbol$0(tl,l2)]}return l2}
    var
     stdin=caml_ml_open_descriptor_in(0),
     stdout=caml_ml_open_descriptor_out(1),
     stderr=caml_ml_open_descriptor_out(2);
    function open_out_gen(mode,perm,name)
     {var c=caml_ml_open_descriptor_out(caml_sys_open(name,mode,perm));
      caml_ml_set_channel_name(c,name);
      return c}
    function open_out(name){return open_out_gen(_i_,438,name)}
    function open_out_bin(name){return open_out_gen(_j_,438,name)}
    function flush_all(param)
     {function iter(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var l=param$0[2],a=param$0[1];
            try
             {caml_ml_flush(a)}
            catch(_au_)
             {_au_ = caml_wrap_exception(_au_);
              if(_au_[1] !== Sys_error)throw _au_;
              var _at_=_au_}
            var param$0=l;
            continue}
          return 0}}
      return iter(runtime.caml_ml_out_channels_list(0))}
    function output_bytes(oc,s)
     {return caml_ml_output_bytes(oc,s,0,caml_ml_bytes_length(s))}
    function output_string(oc,s)
     {return caml_ml_output(oc,s,0,caml_ml_string_length(s))}
    function output(oc,s,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_bytes_length(s) - len | 0) < ofs))
         return caml_ml_output_bytes(oc,s,ofs,len);
      return invalid_arg(cst_output)}
    function output_substring(oc,s,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_string_length(s) - len | 0) < ofs))
         return caml_ml_output(oc,s,ofs,len);
      return invalid_arg(cst_output_substring)}
    function output_value(chan,v){return runtime.caml_output_value(chan,v,0)}
    function close_out(oc){caml_ml_flush(oc);return caml_ml_close_channel(oc)}
    function close_out_noerr(oc)
     {try {caml_ml_flush(oc)}catch(_as_){}
      try
       {var _aq_=caml_ml_close_channel(oc);return _aq_}
      catch(_ar_){return 0}}
    function open_in_gen(mode,perm,name)
     {var c=caml_ml_open_descriptor_in(caml_sys_open(name,mode,perm));
      caml_ml_set_channel_name(c,name);
      return c}
    function open_in(name){return open_in_gen(_k_,0,name)}
    function open_in_bin(name){return open_in_gen(_l_,0,name)}
    function input(ic,s,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_bytes_length(s) - len | 0) < ofs))
         return caml_ml_input(ic,s,ofs,len);
      return invalid_arg(cst_input)}
    function unsafe_really_input(ic,s,ofs,len)
     {var ofs$0=ofs,len$0=len;
      for(;;)
       {if(0 < len$0)
         {var r=caml_ml_input(ic,s,ofs$0,len$0);
          if(0 === r)throw End_of_file;
          var len$1=len$0 - r | 0,ofs$1=ofs$0 + r | 0,ofs$0=ofs$1,len$0=len$1;
          continue}
        return 0}}
    function really_input(ic,s,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_bytes_length(s) - len | 0) < ofs))
         return unsafe_really_input(ic,s,ofs,len);
      return invalid_arg(cst_really_input)}
    function really_input_string(ic,len)
     {var s=caml_create_bytes(len);really_input(ic,s,0,len);return s}
    function input_line(chan)
     {function build_result(buf,pos,param)
       {var pos$0=pos,param$0=param;
        for(;;)
         {if(param$0)
           {var param$1=param$0[2],hd=param$0[1],len=caml_ml_bytes_length(hd);
            runtime.caml_blit_bytes(hd,0,buf,pos$0 - len | 0,len);
            var pos$1=pos$0 - len | 0,pos$0=pos$1,param$0=param$1;
            continue}
          return buf}}
      function scan(accu,len)
       {var accu$0=accu,len$0=len;
        for(;;)
         {var n=runtime.caml_ml_input_scan_line(chan);
          if(0 === n)
           {if(accu$0)
             return build_result(caml_create_bytes(len$0),len$0,accu$0);
            throw End_of_file}
          if(0 < n)
           {var res=caml_create_bytes(n - 1 | 0);
            caml_ml_input(chan,res,0,n - 1 | 0);
            caml_ml_input_char(chan);
            if(accu$0)
             {var len$1=(len$0 + n | 0) - 1 | 0;
              return build_result
                      (caml_create_bytes(len$1),len$1,[0,res,accu$0])}
            return res}
          var beg=caml_create_bytes(- n | 0);
          caml_ml_input(chan,beg,0,- n | 0);
          var
           len$2=len$0 - n | 0,
           accu$1=[0,beg,accu$0],
           accu$0=accu$1,
           len$0=len$2;
          continue}}
      return scan(0,0)}
    function close_in_noerr(ic)
     {try
       {var _ao_=caml_ml_close_channel(ic);return _ao_}
      catch(_ap_){return 0}}
    function print_char(c){return caml_ml_output_char(stdout,c)}
    function print_string(s){return output_string(stdout,s)}
    function print_bytes(s){return output_bytes(stdout,s)}
    function print_int(i){return output_string(stdout,string_of_int(i))}
    function print_float(f){return output_string(stdout,string_of_float(f))}
    function print_endline(s)
     {output_string(stdout,s);
      caml_ml_output_char(stdout,10);
      return caml_ml_flush(stdout)}
    function print_newline(param)
     {caml_ml_output_char(stdout,10);return caml_ml_flush(stdout)}
    function prerr_char(c){return caml_ml_output_char(stderr,c)}
    function prerr_string(s){return output_string(stderr,s)}
    function prerr_bytes(s){return output_bytes(stderr,s)}
    function prerr_int(i){return output_string(stderr,string_of_int(i))}
    function prerr_float(f){return output_string(stderr,string_of_float(f))}
    function prerr_endline(s)
     {output_string(stderr,s);
      caml_ml_output_char(stderr,10);
      return caml_ml_flush(stderr)}
    function prerr_newline(param)
     {caml_ml_output_char(stderr,10);return caml_ml_flush(stderr)}
    function read_line(param){caml_ml_flush(stdout);return input_line(stdin)}
    function read_int(param){return caml_int_of_string(read_line(0))}
    function read_int_opt(param){return int_of_string_opt(read_line(0))}
    function read_float(param){return caml_float_of_string(read_line(0))}
    function read_float_opt(param){return float_of_string_opt(read_line(0))}
    function string_of_format(param){var str=param[2];return str}
    function symbol$1(param,_am_)
     {var
       str2=_am_[2],
       fmt2=_am_[1],
       str1=param[2],
       fmt1=param[1],
       _an_=symbol(str1,symbol(cst$0,str2));
      return [0,caml_call2(CamlinternalFormatBasics[3],fmt1,fmt2),_an_]}
    var exit_function=[0,flush_all];
    function at_exit(f)
     {var g=exit_function[1];
      exit_function[1]
      =
      function(param){caml_call1(f,0);return caml_call1(g,0)};
      return 0}
    function do_at_exit(param){return caml_call1(exit_function[1],0)}
    function exit(retcode)
     {do_at_exit(0);return runtime.caml_sys_exit(retcode)}
    function _m_(_al_){return caml_ml_channel_size_64(_al_)}
    function _n_(_ak_){return runtime.caml_ml_pos_in_64(_ak_)}
    function _o_(_aj_,_ai_){return runtime.caml_ml_seek_in_64(_aj_,_ai_)}
    function _p_(_ah_){return caml_ml_channel_size_64(_ah_)}
    function _q_(_ag_){return runtime.caml_ml_pos_out_64(_ag_)}
    var
     _r_=
      [0,
       function(_af_,_ae_){return runtime.caml_ml_seek_out_64(_af_,_ae_)},
       _q_,
       _p_,
       _o_,
       _n_,
       _m_];
    function _s_(_ad_,_ac_){return caml_ml_set_binary_mode(_ad_,_ac_)}
    function _t_(_ab_){return caml_ml_close_channel(_ab_)}
    function _u_(_aa_){return caml_ml_channel_size(_aa_)}
    function _v_(_$_){return runtime.caml_ml_pos_in(_$_)}
    function _w_(___,_Z_){return runtime.caml_ml_seek_in(___,_Z_)}
    function _x_(_Y_){return runtime.caml_input_value(_Y_)}
    function _y_(_X_){return runtime.caml_ml_input_int(_X_)}
    function _z_(_W_){return caml_ml_input_char(_W_)}
    function _A_(_V_){return caml_ml_input_char(_V_)}
    function _B_(_U_,_T_){return caml_ml_set_binary_mode(_U_,_T_)}
    function _C_(_S_){return caml_ml_channel_size(_S_)}
    function _D_(_R_){return runtime.caml_ml_pos_out(_R_)}
    function _E_(_Q_,_P_){return runtime.caml_ml_seek_out(_Q_,_P_)}
    function _F_(_O_,_N_){return runtime.caml_ml_output_int(_O_,_N_)}
    function _G_(_M_,_L_){return caml_ml_output_char(_M_,_L_)}
    function _H_(_K_,_J_){return caml_ml_output_char(_K_,_J_)}
    var
     Pervasives=
      [0,
       invalid_arg,
       failwith,
       Exit,
       min,
       max,
       abs,
       max_int,
       min_int,
       lnot,
       infinity,
       neg_infinity,
       nan,
       max_float,
       min_float,
       epsilon_float,
       symbol,
       char_of_int,
       string_of_bool,
       bool_of_string,
       bool_of_string_opt,
       string_of_int,
       int_of_string_opt,
       string_of_float,
       float_of_string_opt,
       symbol$0,
       stdin,
       stdout,
       stderr,
       print_char,
       print_string,
       print_bytes,
       print_int,
       print_float,
       print_endline,
       print_newline,
       prerr_char,
       prerr_string,
       prerr_bytes,
       prerr_int,
       prerr_float,
       prerr_endline,
       prerr_newline,
       read_line,
       read_int,
       read_int_opt,
       read_float,
       read_float_opt,
       open_out,
       open_out_bin,
       open_out_gen,
       function(_I_){return caml_ml_flush(_I_)},
       flush_all,
       _H_,
       output_string,
       output_bytes,
       output,
       output_substring,
       _G_,
       _F_,
       output_value,
       _E_,
       _D_,
       _C_,
       close_out,
       close_out_noerr,
       _B_,
       open_in,
       open_in_bin,
       open_in_gen,
       _A_,
       input_line,
       input,
       really_input,
       really_input_string,
       _z_,
       _y_,
       _x_,
       _w_,
       _v_,
       _u_,
       _t_,
       close_in_noerr,
       _s_,
       _r_,
       string_of_format,
       symbol$1,
       exit,
       at_exit,
       valid_float_lexem,
       unsafe_really_input,
       do_at_exit];
    runtime.caml_register_global(37,Pervasives,"Pervasives");
    return}
  (function(){return this}()));
