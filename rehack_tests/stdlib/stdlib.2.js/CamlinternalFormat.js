(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_blit_string=runtime.caml_blit_string,
     caml_bytes_set=runtime.caml_bytes_set,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_format_int=runtime.caml_format_int,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_notequal=runtime.caml_notequal,
     caml_string_get=runtime.caml_string_get,
     caml_string_notequal=runtime.caml_string_notequal,
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
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_c=caml_new_string("%c"),
     cst_s=caml_new_string("%s"),
     cst_i=caml_new_string("%i"),
     cst_li=caml_new_string("%li"),
     cst_ni=caml_new_string("%ni"),
     cst_Li=caml_new_string("%Li"),
     cst_f=caml_new_string("%f"),
     cst_B=caml_new_string("%B"),
     cst$9=caml_new_string("%{"),
     cst$10=caml_new_string("%}"),
     cst$11=caml_new_string("%("),
     cst$12=caml_new_string("%)"),
     cst_a=caml_new_string("%a"),
     cst_t=caml_new_string("%t"),
     cst$13=caml_new_string("%?"),
     cst_r=caml_new_string("%r"),
     cst_r$0=caml_new_string("%_r"),
     cst_u$0=caml_new_string("%u"),
     cst_Printf_bad_conversion=caml_new_string("Printf: bad conversion %["),
     cst_Printf_bad_conversion$0=caml_new_string("Printf: bad conversion %_"),
     cst$17=caml_new_string("@{"),
     cst$18=caml_new_string("@["),
     cst$19=caml_new_string("@{"),
     cst$20=caml_new_string("@["),
     cst$21=caml_new_string("@{"),
     cst$22=caml_new_string("@["),
     cst_0=caml_new_string("0"),
     cst_padding=caml_new_string("padding"),
     cst_precision=caml_new_string("precision"),
     cst$27=caml_new_string("'*'"),
     cst$25=caml_new_string("'-'"),
     cst_0$2=caml_new_string("'0'"),
     cst$26=caml_new_string("'*'"),
     cst_0$0=caml_new_string("0"),
     cst_0$1=caml_new_string("0"),
     cst_precision$0=caml_new_string("precision"),
     cst_precision$1=caml_new_string("precision"),
     cst$28=caml_new_string("'+'"),
     cst$29=caml_new_string("'#'"),
     cst$30=caml_new_string("' '"),
     cst_padding$0=caml_new_string("`padding'"),
     cst_precision$2=caml_new_string("`precision'"),
     cst$31=caml_new_string("'+'"),
     cst$32=caml_new_string("'_'"),
     sub_format=[0,0,caml_new_string("")],
     formatting_lit=[0,caml_new_string("@;"),1,0],
     cst_digit=caml_new_string("digit"),
     cst_character=caml_new_string("character ')'"),
     cst_character$0=caml_new_string("character '}'"),
     cst$36=caml_new_string("'#'"),
     cst$35=caml_new_string("'+'"),
     cst$34=caml_new_string("'+'"),
     cst$33=caml_new_string("' '"),
     cst$39=caml_new_string("'+'"),
     cst$38=caml_new_string("'+'"),
     cst$37=caml_new_string("' '"),
     cst_non_zero_widths_are_unsupported_for_c_conversions=
      caml_new_string("non-zero widths are unsupported for %c conversions"),
     cst_unexpected_end_of_format=caml_new_string("unexpected end of format"),
     cst$23=caml_new_string(""),
     cst$24=caml_new_string(""),
     cst_b=caml_new_string("b"),
     cst_h=caml_new_string("h"),
     cst_hov=caml_new_string("hov"),
     cst_hv=caml_new_string("hv"),
     cst_v=caml_new_string("v"),
     cst_nan=caml_new_string("nan"),
     cst$16=caml_new_string("."),
     cst_neg_infinity=caml_new_string("neg_infinity"),
     cst_infinity=caml_new_string("infinity"),
     cst_12g=caml_new_string("%.12g"),
     cst_nd=caml_new_string("%nd"),
     cst_nd$0=caml_new_string("%+nd"),
     cst_nd$1=caml_new_string("% nd"),
     cst_ni$0=caml_new_string("%ni"),
     cst_ni$1=caml_new_string("%+ni"),
     cst_ni$2=caml_new_string("% ni"),
     cst_nx=caml_new_string("%nx"),
     cst_nx$0=caml_new_string("%#nx"),
     cst_nX=caml_new_string("%nX"),
     cst_nX$0=caml_new_string("%#nX"),
     cst_no=caml_new_string("%no"),
     cst_no$0=caml_new_string("%#no"),
     cst_nu=caml_new_string("%nu"),
     cst_ld=caml_new_string("%ld"),
     cst_ld$0=caml_new_string("%+ld"),
     cst_ld$1=caml_new_string("% ld"),
     cst_li$0=caml_new_string("%li"),
     cst_li$1=caml_new_string("%+li"),
     cst_li$2=caml_new_string("% li"),
     cst_lx=caml_new_string("%lx"),
     cst_lx$0=caml_new_string("%#lx"),
     cst_lX=caml_new_string("%lX"),
     cst_lX$0=caml_new_string("%#lX"),
     cst_lo=caml_new_string("%lo"),
     cst_lo$0=caml_new_string("%#lo"),
     cst_lu=caml_new_string("%lu"),
     cst_Ld=caml_new_string("%Ld"),
     cst_Ld$0=caml_new_string("%+Ld"),
     cst_Ld$1=caml_new_string("% Ld"),
     cst_Li$0=caml_new_string("%Li"),
     cst_Li$1=caml_new_string("%+Li"),
     cst_Li$2=caml_new_string("% Li"),
     cst_Lx=caml_new_string("%Lx"),
     cst_Lx$0=caml_new_string("%#Lx"),
     cst_LX=caml_new_string("%LX"),
     cst_LX$0=caml_new_string("%#LX"),
     cst_Lo=caml_new_string("%Lo"),
     cst_Lo$0=caml_new_string("%#Lo"),
     cst_Lu=caml_new_string("%Lu"),
     cst_d=caml_new_string("%d"),
     cst_d$0=caml_new_string("%+d"),
     cst_d$1=caml_new_string("% d"),
     cst_i$0=caml_new_string("%i"),
     cst_i$1=caml_new_string("%+i"),
     cst_i$2=caml_new_string("% i"),
     cst_x=caml_new_string("%x"),
     cst_x$0=caml_new_string("%#x"),
     cst_X=caml_new_string("%X"),
     cst_X$0=caml_new_string("%#X"),
     cst_o=caml_new_string("%o"),
     cst_o$0=caml_new_string("%#o"),
     cst_u=caml_new_string("%u"),
     cst$14=caml_new_string("%!"),
     cst$15=caml_new_string("@{"),
     cst_0c=caml_new_string("0c"),
     cst$8=caml_new_string("%%"),
     cst$0=caml_new_string("@]"),
     cst$1=caml_new_string("@}"),
     cst$2=caml_new_string("@?"),
     cst$3=caml_new_string("@\n"),
     cst$4=caml_new_string("@."),
     cst$5=caml_new_string("@@"),
     cst$6=caml_new_string("@%"),
     cst$7=caml_new_string("@"),
     cst=caml_new_string(".*"),
     cst_CamlinternalFormat_Type_mismatch=
      caml_new_string("CamlinternalFormat.Type_mismatch"),
     Assert_failure=global_data.Assert_failure,
     CamlinternalFormatBasics=global_data.CamlinternalFormatBasics,
     Pervasives=global_data.Pervasives,
     Buffer=global_data.Buffer,
     Failure=global_data.Failure,
     Not_found=global_data.Not_found,
     String=global_data.String,
     Sys=global_data.Sys,
     Char=global_data.Char,
     Bytes=global_data.Bytes,
     _a_=[0,caml_new_string("camlinternalFormat.ml"),846,23],
     _l_=[0,caml_new_string("camlinternalFormat.ml"),810,21],
     _d_=[0,caml_new_string("camlinternalFormat.ml"),811,21],
     _m_=[0,caml_new_string("camlinternalFormat.ml"),814,21],
     _e_=[0,caml_new_string("camlinternalFormat.ml"),815,21],
     _n_=[0,caml_new_string("camlinternalFormat.ml"),818,19],
     _f_=[0,caml_new_string("camlinternalFormat.ml"),819,19],
     _o_=[0,caml_new_string("camlinternalFormat.ml"),822,22],
     _g_=[0,caml_new_string("camlinternalFormat.ml"),823,22],
     _p_=[0,caml_new_string("camlinternalFormat.ml"),827,30],
     _h_=[0,caml_new_string("camlinternalFormat.ml"),828,30],
     _j_=[0,caml_new_string("camlinternalFormat.ml"),832,26],
     _b_=[0,caml_new_string("camlinternalFormat.ml"),833,26],
     _k_=[0,caml_new_string("camlinternalFormat.ml"),842,28],
     _c_=[0,caml_new_string("camlinternalFormat.ml"),843,28],
     _i_=[0,caml_new_string("camlinternalFormat.ml"),847,23],
     _q_=[0,caml_new_string("camlinternalFormat.ml"),1525,4],
     _r_=[0,caml_new_string("camlinternalFormat.ml"),1593,39],
     _s_=[0,caml_new_string("camlinternalFormat.ml"),1616,31],
     _t_=[0,caml_new_string("camlinternalFormat.ml"),1617,31],
     _u_=[0,caml_new_string("camlinternalFormat.ml"),1797,8],
     _Y_=
      [0,
       [11,
        caml_new_string("bad input: format type mismatch between "),
        [3,0,[11,caml_new_string(" and "),[3,0,0]]]],
       caml_new_string("bad input: format type mismatch between %S and %S")],
     _X_=
      [0,
       [11,
        caml_new_string("bad input: format type mismatch between "),
        [3,0,[11,caml_new_string(" and "),[3,0,0]]]],
       caml_new_string("bad input: format type mismatch between %S and %S")],
     _A_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,0,0,0,[11,caml_new_string(", duplicate flag "),[1,0]]]]]],
       caml_new_string
        ("invalid format %S: at character number %d, duplicate flag %C")],
     _B_=[0,1,0],
     _C_=[0,0],
     _E_=[1,0],
     _D_=[1,1],
     _G_=[1,1],
     _F_=[1,1],
     _K_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(", flag "),
            [1,
             [11,
              caml_new_string(" is only allowed after the '"),
              [12,
               37,
               [11,caml_new_string("', before padding and precision"),0]]]]]]]]],
       caml_new_string
        ("invalid format %S: at character number %d, flag %C is only allowed after the '%%', before padding and precision")],
     _H_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(', invalid conversion "'),
            [12,37,[0,[12,34,0]]]]]]]],
       caml_new_string
        ('invalid format %S: at character number %d, invalid conversion "%%%c"')],
     _I_=[0,0],
     _J_=[0,0],
     _L_=[0,[12,64,0]],
     _M_=[0,caml_new_string("@ "),1,0],
     _N_=[0,caml_new_string("@,"),0,0],
     _O_=[2,60],
     _P_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": '"),
          [12,
           37,
           [11,
            caml_new_string("' alone is not accepted in character sets, use "),
            [12,
             37,
             [12,
              37,
              [11,
               caml_new_string(" instead at position "),
               [4,0,0,0,[12,46,0]]]]]]]]]],
       caml_new_string
        ("invalid format %S: '%%' alone is not accepted in character sets, use %%%% instead at position %d.")],
     _Q_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": integer "),
          [4,
           0,
           0,
           0,
           [11,caml_new_string(" is greater than the limit "),[4,0,0,0,0]]]]]],
       caml_new_string
        ("invalid format %S: integer %d is greater than the limit %d")],
     _R_=[0,caml_new_string("camlinternalFormat.ml"),2811,11],
     _S_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(': unclosed sub-format, expected "'),
          [12,
           37,
           [0,[11,caml_new_string('" at character number '),[4,0,0,0,0]]]]]]],
       caml_new_string
        ('invalid format %S: unclosed sub-format, expected "%%%c" at character number %d')],
     _T_=[0,caml_new_string("camlinternalFormat.ml"),2873,34],
     _U_=[0,caml_new_string("camlinternalFormat.ml"),2906,28],
     _V_=[0,caml_new_string("camlinternalFormat.ml"),2940,25],
     _W_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(", "),
            [2,
             0,
             [11,
              caml_new_string(" is incompatible with '"),
              [0,[11,caml_new_string("' in sub-format "),[3,0,0]]]]]]]]]],
       caml_new_string
        ("invalid format %S: at character number %d, %s is incompatible with '%c' in sub-format %S")],
     _z_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(", "),
            [2,0,[11,caml_new_string(" expected, read "),[1,0]]]]]]]],
       caml_new_string
        ("invalid format %S: at character number %d, %s expected, read %C")],
     _y_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,
           0,
           0,
           0,
           [11,
            caml_new_string(", '"),
            [0,[11,caml_new_string("' without "),[2,0,0]]]]]]]],
       caml_new_string
        ("invalid format %S: at character number %d, '%c' without %s")],
     _x_=
      [0,
       [11,
        caml_new_string("invalid format "),
        [3,
         0,
         [11,
          caml_new_string(": at character number "),
          [4,0,0,0,[11,caml_new_string(", "),[2,0,0]]]]]],
       caml_new_string("invalid format %S: at character number %d, %s")],
     _w_=
      [0,
       [11,caml_new_string("invalid box description "),[3,0,0]],
       caml_new_string("invalid box description %S")],
     _v_=[0,0,4];
    function create_char_set(param){return caml_call2(Bytes[1],32,0)}
    function add_in_char_set(char_set,c)
     {var
       str_ind=c >>> 3 | 0,
       mask=1 << (c & 7),
       _eJ_=runtime.caml_bytes_get(char_set,str_ind) | mask;
      return caml_bytes_set(char_set,str_ind,caml_call1(Pervasives[17],_eJ_))}
    function freeze_char_set(char_set){return caml_call1(Bytes[6],char_set)}
    function rev_char_set(char_set)
     {var char_set$0=create_char_set(0),i=0;
      for(;;)
       {var _eH_=caml_string_get(char_set,i) ^ 255;
        caml_bytes_set(char_set$0,i,caml_call1(Pervasives[17],_eH_));
        var _eI_=i + 1 | 0;
        if(31 !== i){var i=_eI_;continue}
        return caml_call1(Bytes[42],char_set$0)}}
    function is_in_char_set(char_set,c)
     {var str_ind=c >>> 3 | 0,mask=1 << (c & 7);
      return 0 !== (caml_string_get(char_set,str_ind) & mask)?1:0}
    function pad_of_pad_opt(pad_opt)
     {if(pad_opt){var width=pad_opt[1];return [0,1,width]}return 0}
    function prec_of_prec_opt(prec_opt)
     {if(prec_opt){var ndec=prec_opt[1];return [0,ndec]}return 0}
    function param_format_of_ignored_format(ign,fmt)
     {if(typeof ign === "number")
       switch(ign)
        {case 0:return [0,[0,fmt]];
         case 1:return [0,[1,fmt]];
         case 2:return [0,[19,fmt]];
         default:return [0,[22,fmt]]}
      else
       switch(ign[0])
        {case 0:var pad_opt=ign[1];return [0,[2,pad_of_pad_opt(pad_opt),fmt]];
         case 1:
          var pad_opt$0=ign[1];return [0,[3,pad_of_pad_opt(pad_opt$0),fmt]];
         case 2:
          var pad_opt$1=ign[2],iconv=ign[1];
          return [0,[4,iconv,pad_of_pad_opt(pad_opt$1),0,fmt]];
         case 3:
          var pad_opt$2=ign[2],iconv$0=ign[1];
          return [0,[5,iconv$0,pad_of_pad_opt(pad_opt$2),0,fmt]];
         case 4:
          var pad_opt$3=ign[2],iconv$1=ign[1];
          return [0,[6,iconv$1,pad_of_pad_opt(pad_opt$3),0,fmt]];
         case 5:
          var pad_opt$4=ign[2],iconv$2=ign[1];
          return [0,[7,iconv$2,pad_of_pad_opt(pad_opt$4),0,fmt]];
         case 6:
          var
           prec_opt=ign[2],
           pad_opt$5=ign[1],
           _eG_=prec_of_prec_opt(prec_opt);
          return [0,[8,0,pad_of_pad_opt(pad_opt$5),_eG_,fmt]];
         case 7:
          var pad_opt$6=ign[1];return [0,[9,pad_of_pad_opt(pad_opt$6),fmt]];
         case 8:
          var fmtty=ign[2],pad_opt$7=ign[1];
          return [0,[13,pad_opt$7,fmtty,fmt]];
         case 9:
          var fmtty$0=ign[2],pad_opt$8=ign[1];
          return [0,[14,pad_opt$8,fmtty$0,fmt]];
         case 10:
          var char_set=ign[2],width_opt=ign[1];
          return [0,[20,width_opt,char_set,fmt]];
         default:var counter=ign[1];return [0,[21,counter,fmt]]}}
    var default_float_precision=-6;
    function buffer_create(init_size)
     {return [0,0,caml_create_bytes(init_size)]}
    function buffer_check_size(buf,overhead)
     {var
       len=runtime.caml_ml_bytes_length(buf[2]),
       min_len=buf[1] + overhead | 0,
       _eE_=len < min_len?1:0;
      if(_eE_)
       {var
         new_len=caml_call2(Pervasives[5],len * 2 | 0,min_len),
         new_str=caml_create_bytes(new_len);
        caml_call5(Bytes[11],buf[2],0,new_str,0,len);
        buf[2] = new_str;
        var _eF_=0}
      else
       var _eF_=_eE_;
      return _eF_}
    function buffer_add_char(buf,c)
     {buffer_check_size(buf,1);
      caml_bytes_set(buf[2],buf[1],c);
      buf[1] = buf[1] + 1 | 0;
      return 0}
    function buffer_add_string(buf,s)
     {var str_len=caml_ml_string_length(s);
      buffer_check_size(buf,str_len);
      caml_call5(String[6],s,0,buf[2],buf[1],str_len);
      buf[1] = buf[1] + str_len | 0;
      return 0}
    function buffer_contents(buf){return caml_call3(Bytes[8],buf[2],0,buf[1])}
    function char_of_iconv(iconv)
     {switch(iconv)
       {case 12:return 117;
        case 6:
        case 7:return 120;
        case 8:
        case 9:return 88;
        case 10:
        case 11:return 111;
        case 0:
        case 1:
        case 2:return 100;
        default:return 105}}
    function char_of_fconv(fconv)
     {switch(fconv)
       {case 15:return 70;
        case 0:
        case 1:
        case 2:return 102;
        case 3:
        case 4:
        case 5:return 101;
        case 6:
        case 7:
        case 8:return 69;
        case 9:
        case 10:
        case 11:return 103;
        case 12:
        case 13:
        case 14:return 71;
        case 16:
        case 17:
        case 18:return 104;
        default:return 72}}
    function char_of_counter(counter)
     {switch(counter){case 0:return 108;case 1:return 110;default:return 78}}
    function bprint_char_set(buf,char_set)
     {function print_start(set)
       {function is_alone(c)
         {var
           after=caml_call1(Char[1],c + 1 | 0),
           before=caml_call1(Char[1],c - 1 | 0),
           _eA_=is_in_char_set(set,c);
          if(_eA_)
           var
            _eB_=is_in_char_set(set,before),
            _eC_=_eB_?is_in_char_set(set,after):_eB_,
            _eD_=1 - _eC_;
          else
           var _eD_=_eA_;
          return _eD_}
        if(is_alone(93))buffer_add_char(buf,93);
        print_out(set,1);
        var _ez_=is_alone(45);
        return _ez_?buffer_add_char(buf,45):_ez_}
      function print_char(buf,i)
       {var c=caml_call1(Pervasives[17],i);
        return 37 === c
                ?(buffer_add_char(buf,37),buffer_add_char(buf,37))
                :64 === c
                  ?(buffer_add_char(buf,37),buffer_add_char(buf,64))
                  :buffer_add_char(buf,c)}
      function print_out$0(counter,set,i)
       {var i$0=i;
        for(;;)
         {var _ey_=i$0 < 256?1:0;
          if(_ey_)
           {if(is_in_char_set(set,caml_call1(Pervasives[17],i$0)))
             {if(counter < 50)
               {var counter$0=counter + 1 | 0;
                return print_first(counter$0,set,i$0)}
              return caml_trampoline_return(print_first,[0,set,i$0])}
            var i$1=i$0 + 1 | 0,i$0=i$1;
            continue}
          return _ey_}}
      function print_first(counter,set,i)
       {var match=caml_call1(Pervasives[17],i),switcher=match - 45 | 0;
        if(48 < switcher >>> 0)
         {if(210 <= switcher)return print_char(buf,255)}
        else
         {var switcher$0=switcher - 1 | 0;
          if(46 < switcher$0 >>> 0)
           {var _ex_=i + 1 | 0;
            if(counter < 50)
             {var counter$1=counter + 1 | 0;
              return print_out$0(counter$1,set,_ex_)}
            return caml_trampoline_return(print_out$0,[0,set,_ex_])}}
        var _ew_=i + 1 | 0;
        if(counter < 50)
         {var counter$0=counter + 1 | 0;
          return print_second(counter$0,set,_ew_)}
        return caml_trampoline_return(print_second,[0,set,_ew_])}
      function print_second(counter,set,i)
       {if(is_in_char_set(set,caml_call1(Pervasives[17],i)))
         {var match=caml_call1(Pervasives[17],i),switcher=match - 45 | 0;
          if(48 < switcher >>> 0)
           {if(210 <= switcher)
             {print_char(buf,254);return print_char(buf,255)}}
          else
           {var switcher$0=switcher - 1 | 0;
            if(46 < switcher$0 >>> 0)
             if(! is_in_char_set(set,caml_call1(Pervasives[17],i + 1 | 0)))
              {print_char(buf,i - 1 | 0);
               var _eu_=i + 1 | 0;
               if(counter < 50)
                {var counter$1=counter + 1 | 0;
                 return print_out$0(counter$1,set,_eu_)}
               return caml_trampoline_return(print_out$0,[0,set,_eu_])}}
          if(is_in_char_set(set,caml_call1(Pervasives[17],i + 1 | 0)))
           {var _er_=i + 2 | 0,_es_=i - 1 | 0;
            if(counter < 50)
             {var counter$0=counter + 1 | 0;
              return print_in(counter$0,set,_es_,_er_)}
            return caml_trampoline_return(print_in,[0,set,_es_,_er_])}
          print_char(buf,i - 1 | 0);
          print_char(buf,i);
          var _et_=i + 2 | 0;
          if(counter < 50)
           {var counter$2=counter + 1 | 0;
            return print_out$0(counter$2,set,_et_)}
          return caml_trampoline_return(print_out$0,[0,set,_et_])}
        print_char(buf,i - 1 | 0);
        var _ev_=i + 1 | 0;
        if(counter < 50)
         {var counter$3=counter + 1 | 0;
          return print_out$0(counter$3,set,_ev_)}
        return caml_trampoline_return(print_out$0,[0,set,_ev_])}
      function print_in(counter,set,i,j)
       {var j$0=j;
        for(;;)
         {if(256 !== j$0)
           if(is_in_char_set(set,caml_call1(Pervasives[17],j$0)))
            {var j$1=j$0 + 1 | 0,j$0=j$1;continue}
          print_char(buf,i);
          print_char(buf,45);
          print_char(buf,j$0 - 1 | 0);
          var _ep_=j$0 < 256?1:0;
          if(_ep_)
           {var _eq_=j$0 + 1 | 0;
            if(counter < 50)
             {var counter$0=counter + 1 | 0;
              return print_out$0(counter$0,set,_eq_)}
            return caml_trampoline_return(print_out$0,[0,set,_eq_])}
          return _ep_}}
      function print_out(set,i){return caml_trampoline(print_out$0(0,set,i))}
      buffer_add_char(buf,91);
      var
       _eo_=
        is_in_char_set(char_set,0)
         ?(buffer_add_char(buf,94),rev_char_set(char_set))
         :char_set;
      print_start(_eo_);
      return buffer_add_char(buf,93)}
    function bprint_padty(buf,padty)
     {switch(padty)
       {case 0:return buffer_add_char(buf,45);
        case 1:return 0;
        default:return buffer_add_char(buf,48)}}
    function bprint_ignored_flag(buf,ign_flag)
     {return ign_flag?buffer_add_char(buf,95):ign_flag}
    function bprint_pad_opt(buf,pad_opt)
     {if(pad_opt)
       {var width=pad_opt[1];
        return buffer_add_string(buf,caml_call1(Pervasives[21],width))}
      return 0}
    function bprint_padding(buf,pad)
     {if(typeof pad === "number")
       return 0;
      else
       {if(0 === pad[0])
         {var n=pad[2],padty=pad[1];
          bprint_padty(buf,padty);
          return buffer_add_string(buf,caml_call1(Pervasives[21],n))}
        var padty$0=pad[1];
        bprint_padty(buf,padty$0);
        return buffer_add_char(buf,42)}}
    function bprint_precision(buf,prec)
     {if(typeof prec === "number")
       return 0 === prec?0:buffer_add_string(buf,cst);
      var n=prec[1];
      buffer_add_char(buf,46);
      return buffer_add_string(buf,caml_call1(Pervasives[21],n))}
    function bprint_iconv_flag(buf,iconv)
     {switch(iconv)
       {case 1:
        case 4:return buffer_add_char(buf,43);
        case 2:
        case 5:return buffer_add_char(buf,32);
        case 7:
        case 9:
        case 11:return buffer_add_char(buf,35);
        default:return 0}}
    function bprint_int_fmt(buf,ign_flag,iconv,pad,prec)
     {buffer_add_char(buf,37);
      bprint_ignored_flag(buf,ign_flag);
      bprint_iconv_flag(buf,iconv);
      bprint_padding(buf,pad);
      bprint_precision(buf,prec);
      return buffer_add_char(buf,char_of_iconv(iconv))}
    function bprint_altint_fmt(buf,ign_flag,iconv,pad,prec,c)
     {buffer_add_char(buf,37);
      bprint_ignored_flag(buf,ign_flag);
      bprint_iconv_flag(buf,iconv);
      bprint_padding(buf,pad);
      bprint_precision(buf,prec);
      buffer_add_char(buf,c);
      return buffer_add_char(buf,char_of_iconv(iconv))}
    function bprint_fconv_flag(buf,fconv)
     {switch(fconv)
       {case 1:
        case 4:
        case 7:
        case 10:
        case 13:
        case 17:
        case 20:return buffer_add_char(buf,43);
        case 2:
        case 5:
        case 8:
        case 11:
        case 14:
        case 18:
        case 21:return buffer_add_char(buf,32);
        default:return 0}}
    function bprint_float_fmt(buf,ign_flag,fconv,pad,prec)
     {buffer_add_char(buf,37);
      bprint_ignored_flag(buf,ign_flag);
      bprint_fconv_flag(buf,fconv);
      bprint_padding(buf,pad);
      bprint_precision(buf,prec);
      return buffer_add_char(buf,char_of_fconv(fconv))}
    function string_of_formatting_lit(formatting_lit)
     {if(typeof formatting_lit === "number")
       switch(formatting_lit)
        {case 0:return cst$0;
         case 1:return cst$1;
         case 2:return cst$2;
         case 3:return cst$3;
         case 4:return cst$4;
         case 5:return cst$5;
         default:return cst$6}
      else
       switch(formatting_lit[0])
        {case 0:var str=formatting_lit[1];return str;
         case 1:var str$0=formatting_lit[1];return str$0;
         default:
          var c=formatting_lit[1],_en_=caml_call2(String[1],1,c);
          return caml_call2(Pervasives[16],cst$7,_en_)}}
    function string_of_formatting_gen(formatting_gen)
     {if(0 === formatting_gen[0])
       {var match=formatting_gen[1],str=match[2];return str}
      var match$0=formatting_gen[1],str$0=match$0[2];
      return str$0}
    function bprint_char_literal(buf,chr)
     {return 37 === chr?buffer_add_string(buf,cst$8):buffer_add_char(buf,chr)}
    function bprint_string_literal(buf,str)
     {var _el_=caml_ml_string_length(str) - 1 | 0,_ek_=0;
      if(! (_el_ < 0))
       {var i=_ek_;
        for(;;)
         {bprint_char_literal(buf,caml_string_get(str,i));
          var _em_=i + 1 | 0;
          if(_el_ !== i){var i=_em_;continue}
          break}}
      return 0}
    function bprint_fmtty(buf,fmtty)
     {var fmtty$0=fmtty;
      for(;;)
       if(typeof fmtty$0 === "number")
        return 0;
       else
        switch(fmtty$0[0])
         {case 0:
           var fmtty$1=fmtty$0[1];
           buffer_add_string(buf,cst_c);
           var fmtty$0=fmtty$1;
           continue;
          case 1:
           var fmtty$2=fmtty$0[1];
           buffer_add_string(buf,cst_s);
           var fmtty$0=fmtty$2;
           continue;
          case 2:
           var fmtty$3=fmtty$0[1];
           buffer_add_string(buf,cst_i);
           var fmtty$0=fmtty$3;
           continue;
          case 3:
           var fmtty$4=fmtty$0[1];
           buffer_add_string(buf,cst_li);
           var fmtty$0=fmtty$4;
           continue;
          case 4:
           var fmtty$5=fmtty$0[1];
           buffer_add_string(buf,cst_ni);
           var fmtty$0=fmtty$5;
           continue;
          case 5:
           var fmtty$6=fmtty$0[1];
           buffer_add_string(buf,cst_Li);
           var fmtty$0=fmtty$6;
           continue;
          case 6:
           var fmtty$7=fmtty$0[1];
           buffer_add_string(buf,cst_f);
           var fmtty$0=fmtty$7;
           continue;
          case 7:
           var fmtty$8=fmtty$0[1];
           buffer_add_string(buf,cst_B);
           var fmtty$0=fmtty$8;
           continue;
          case 8:
           var fmtty$9=fmtty$0[2],sub_fmtty=fmtty$0[1];
           buffer_add_string(buf,cst$9);
           bprint_fmtty(buf,sub_fmtty);
           buffer_add_string(buf,cst$10);
           var fmtty$0=fmtty$9;
           continue;
          case 9:
           var fmtty$10=fmtty$0[3],sub_fmtty$0=fmtty$0[1];
           buffer_add_string(buf,cst$11);
           bprint_fmtty(buf,sub_fmtty$0);
           buffer_add_string(buf,cst$12);
           var fmtty$0=fmtty$10;
           continue;
          case 10:
           var fmtty$11=fmtty$0[1];
           buffer_add_string(buf,cst_a);
           var fmtty$0=fmtty$11;
           continue;
          case 11:
           var fmtty$12=fmtty$0[1];
           buffer_add_string(buf,cst_t);
           var fmtty$0=fmtty$12;
           continue;
          case 12:
           var fmtty$13=fmtty$0[1];
           buffer_add_string(buf,cst$13);
           var fmtty$0=fmtty$13;
           continue;
          case 13:
           var fmtty$14=fmtty$0[1];
           buffer_add_string(buf,cst_r);
           var fmtty$0=fmtty$14;
           continue;
          default:
           var fmtty$15=fmtty$0[1];
           buffer_add_string(buf,cst_r$0);
           var fmtty$0=fmtty$15;
           continue}}
    function int_of_custom_arity(param)
     {if(param){var x=param[1];return 1 + int_of_custom_arity(x) | 0}return 0}
    function bprint_fmt(buf,fmt)
     {function fmtiter(fmt,ign_flag)
       {var fmt$0=fmt,ign_flag$0=ign_flag;
        for(;;)
         if(typeof fmt$0 === "number")
          return 0;
         else
          switch(fmt$0[0])
           {case 0:
             var fmt$1=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,99);
             var fmt$0=fmt$1,ign_flag$0=0;
             continue;
            case 1:
             var fmt$2=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,67);
             var fmt$0=fmt$2,ign_flag$0=0;
             continue;
            case 2:
             var fmt$3=fmt$0[2],pad=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_padding(buf,pad);
             buffer_add_char(buf,115);
             var fmt$0=fmt$3,ign_flag$0=0;
             continue;
            case 3:
             var fmt$4=fmt$0[2],pad$0=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_padding(buf,pad$0);
             buffer_add_char(buf,83);
             var fmt$0=fmt$4,ign_flag$0=0;
             continue;
            case 4:
             var fmt$5=fmt$0[4],prec=fmt$0[3],pad$1=fmt$0[2],iconv=fmt$0[1];
             bprint_int_fmt(buf,ign_flag$0,iconv,pad$1,prec);
             var fmt$0=fmt$5,ign_flag$0=0;
             continue;
            case 5:
             var
              fmt$6=fmt$0[4],
              prec$0=fmt$0[3],
              pad$2=fmt$0[2],
              iconv$0=fmt$0[1];
             bprint_altint_fmt(buf,ign_flag$0,iconv$0,pad$2,prec$0,108);
             var fmt$0=fmt$6,ign_flag$0=0;
             continue;
            case 6:
             var
              fmt$7=fmt$0[4],
              prec$1=fmt$0[3],
              pad$3=fmt$0[2],
              iconv$1=fmt$0[1];
             bprint_altint_fmt(buf,ign_flag$0,iconv$1,pad$3,prec$1,110);
             var fmt$0=fmt$7,ign_flag$0=0;
             continue;
            case 7:
             var
              fmt$8=fmt$0[4],
              prec$2=fmt$0[3],
              pad$4=fmt$0[2],
              iconv$2=fmt$0[1];
             bprint_altint_fmt(buf,ign_flag$0,iconv$2,pad$4,prec$2,76);
             var fmt$0=fmt$8,ign_flag$0=0;
             continue;
            case 8:
             var fmt$9=fmt$0[4],prec$3=fmt$0[3],pad$5=fmt$0[2],fconv=fmt$0[1];
             bprint_float_fmt(buf,ign_flag$0,fconv,pad$5,prec$3);
             var fmt$0=fmt$9,ign_flag$0=0;
             continue;
            case 9:
             var fmt$10=fmt$0[2],pad$6=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_padding(buf,pad$6);
             buffer_add_char(buf,66);
             var fmt$0=fmt$10,ign_flag$0=0;
             continue;
            case 10:
             var fmt$11=fmt$0[1];
             buffer_add_string(buf,cst$14);
             var fmt$0=fmt$11;
             continue;
            case 11:
             var fmt$12=fmt$0[2],str=fmt$0[1];
             bprint_string_literal(buf,str);
             var fmt$0=fmt$12;
             continue;
            case 12:
             var fmt$13=fmt$0[2],chr=fmt$0[1];
             bprint_char_literal(buf,chr);
             var fmt$0=fmt$13;
             continue;
            case 13:
             var fmt$14=fmt$0[3],fmtty=fmt$0[2],pad_opt=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_pad_opt(buf,pad_opt);
             buffer_add_char(buf,123);
             bprint_fmtty(buf,fmtty);
             buffer_add_char(buf,37);
             buffer_add_char(buf,125);
             var fmt$0=fmt$14,ign_flag$0=0;
             continue;
            case 14:
             var fmt$15=fmt$0[3],fmtty$0=fmt$0[2],pad_opt$0=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_pad_opt(buf,pad_opt$0);
             buffer_add_char(buf,40);
             bprint_fmtty(buf,fmtty$0);
             buffer_add_char(buf,37);
             buffer_add_char(buf,41);
             var fmt$0=fmt$15,ign_flag$0=0;
             continue;
            case 15:
             var fmt$16=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,97);
             var fmt$0=fmt$16,ign_flag$0=0;
             continue;
            case 16:
             var fmt$17=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,116);
             var fmt$0=fmt$17,ign_flag$0=0;
             continue;
            case 17:
             var fmt$18=fmt$0[2],fmting_lit=fmt$0[1];
             bprint_string_literal(buf,string_of_formatting_lit(fmting_lit));
             var fmt$0=fmt$18;
             continue;
            case 18:
             var fmt$19=fmt$0[2],fmting_gen=fmt$0[1];
             bprint_string_literal(buf,cst$15);
             bprint_string_literal(buf,string_of_formatting_gen(fmting_gen));
             var fmt$0=fmt$19;
             continue;
            case 19:
             var fmt$20=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,114);
             var fmt$0=fmt$20,ign_flag$0=0;
             continue;
            case 20:
             var fmt$21=fmt$0[3],char_set=fmt$0[2],width_opt=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_pad_opt(buf,width_opt);
             bprint_char_set(buf,char_set);
             var fmt$0=fmt$21,ign_flag$0=0;
             continue;
            case 21:
             var fmt$22=fmt$0[2],counter=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             buffer_add_char(buf,char_of_counter(counter));
             var fmt$0=fmt$22,ign_flag$0=0;
             continue;
            case 22:
             var fmt$23=fmt$0[1];
             buffer_add_char(buf,37);
             bprint_ignored_flag(buf,ign_flag$0);
             bprint_string_literal(buf,cst_0c);
             var fmt$0=fmt$23,ign_flag$0=0;
             continue;
            case 23:
             var
              rest=fmt$0[2],
              ign=fmt$0[1],
              match=param_format_of_ignored_format(ign,rest),
              fmt$24=match[1],
              fmt$0=fmt$24,
              ign_flag$0=1;
             continue;
            default:
             var
              rest$0=fmt$0[3],
              arity=fmt$0[1],
              _ei_=int_of_custom_arity(arity),
              _eh_=1;
             if(! (_ei_ < 1))
              {var i=_eh_;
               for(;;)
                {buffer_add_char(buf,37);
                 bprint_ignored_flag(buf,ign_flag$0);
                 buffer_add_char(buf,63);
                 var _ej_=i + 1 | 0;
                 if(_ei_ !== i){var i=_ej_;continue}
                 break}}
             var fmt$0=rest$0,ign_flag$0=0;
             continue}}
      return fmtiter(fmt,0)}
    function string_of_fmt(fmt)
     {var buf=buffer_create(16);
      bprint_fmt(buf,fmt);
      return buffer_contents(buf)}
    function symm(param)
     {if(typeof param === "number")
       return 0;
      else
       switch(param[0])
        {case 0:var rest=param[1];return [0,symm(rest)];
         case 1:var rest$0=param[1];return [1,symm(rest$0)];
         case 2:var rest$1=param[1];return [2,symm(rest$1)];
         case 3:var rest$2=param[1];return [3,symm(rest$2)];
         case 4:var rest$3=param[1];return [4,symm(rest$3)];
         case 5:var rest$4=param[1];return [5,symm(rest$4)];
         case 6:var rest$5=param[1];return [6,symm(rest$5)];
         case 7:var rest$6=param[1];return [7,symm(rest$6)];
         case 8:var rest$7=param[2],ty=param[1];return [8,ty,symm(rest$7)];
         case 9:
          var rest$8=param[3],ty2=param[2],ty1=param[1];
          return [9,ty2,ty1,symm(rest$8)];
         case 10:var rest$9=param[1];return [10,symm(rest$9)];
         case 11:var rest$10=param[1];return [11,symm(rest$10)];
         case 12:var rest$11=param[1];return [12,symm(rest$11)];
         case 13:var rest$12=param[1];return [13,symm(rest$12)];
         default:var rest$13=param[1];return [14,symm(rest$13)]}}
    function fmtty_rel_det(param)
     {if(typeof param === "number")
       {var
         _dV_=function(param){return 0},
         _dW_=function(param){return 0},
         _dX_=function(param){return 0};
        return [0,function(param){return 0},_dX_,_dW_,_dV_]}
      else
       switch(param[0])
        {case 0:
          var
           rest=param[1],
           match=fmtty_rel_det(rest),
           de=match[4],
           ed=match[3],
           af=match[2],
           fa=match[1],
           _dY_=function(param){caml_call1(af,0);return 0};
          return [0,function(param){caml_call1(fa,0);return 0},_dY_,ed,de];
         case 1:
          var
           rest$0=param[1],
           match$0=fmtty_rel_det(rest$0),
           de$0=match$0[4],
           ed$0=match$0[3],
           af$0=match$0[2],
           fa$0=match$0[1],
           _dZ_=function(param){caml_call1(af$0,0);return 0};
          return [0,
                  function(param){caml_call1(fa$0,0);return 0},
                  _dZ_,
                  ed$0,
                  de$0];
         case 2:
          var
           rest$1=param[1],
           match$1=fmtty_rel_det(rest$1),
           de$1=match$1[4],
           ed$1=match$1[3],
           af$1=match$1[2],
           fa$1=match$1[1],
           _d0_=function(param){caml_call1(af$1,0);return 0};
          return [0,
                  function(param){caml_call1(fa$1,0);return 0},
                  _d0_,
                  ed$1,
                  de$1];
         case 3:
          var
           rest$2=param[1],
           match$2=fmtty_rel_det(rest$2),
           de$2=match$2[4],
           ed$2=match$2[3],
           af$2=match$2[2],
           fa$2=match$2[1],
           _d1_=function(param){caml_call1(af$2,0);return 0};
          return [0,
                  function(param){caml_call1(fa$2,0);return 0},
                  _d1_,
                  ed$2,
                  de$2];
         case 4:
          var
           rest$3=param[1],
           match$3=fmtty_rel_det(rest$3),
           de$3=match$3[4],
           ed$3=match$3[3],
           af$3=match$3[2],
           fa$3=match$3[1],
           _d2_=function(param){caml_call1(af$3,0);return 0};
          return [0,
                  function(param){caml_call1(fa$3,0);return 0},
                  _d2_,
                  ed$3,
                  de$3];
         case 5:
          var
           rest$4=param[1],
           match$4=fmtty_rel_det(rest$4),
           de$4=match$4[4],
           ed$4=match$4[3],
           af$4=match$4[2],
           fa$4=match$4[1],
           _d3_=function(param){caml_call1(af$4,0);return 0};
          return [0,
                  function(param){caml_call1(fa$4,0);return 0},
                  _d3_,
                  ed$4,
                  de$4];
         case 6:
          var
           rest$5=param[1],
           match$5=fmtty_rel_det(rest$5),
           de$5=match$5[4],
           ed$5=match$5[3],
           af$5=match$5[2],
           fa$5=match$5[1],
           _d4_=function(param){caml_call1(af$5,0);return 0};
          return [0,
                  function(param){caml_call1(fa$5,0);return 0},
                  _d4_,
                  ed$5,
                  de$5];
         case 7:
          var
           rest$6=param[1],
           match$6=fmtty_rel_det(rest$6),
           de$6=match$6[4],
           ed$6=match$6[3],
           af$6=match$6[2],
           fa$6=match$6[1],
           _d5_=function(param){caml_call1(af$6,0);return 0};
          return [0,
                  function(param){caml_call1(fa$6,0);return 0},
                  _d5_,
                  ed$6,
                  de$6];
         case 8:
          var
           rest$7=param[2],
           match$7=fmtty_rel_det(rest$7),
           de$7=match$7[4],
           ed$7=match$7[3],
           af$7=match$7[2],
           fa$7=match$7[1],
           _d6_=function(param){caml_call1(af$7,0);return 0};
          return [0,
                  function(param){caml_call1(fa$7,0);return 0},
                  _d6_,
                  ed$7,
                  de$7];
         case 9:
          var
           rest$8=param[3],
           ty2=param[2],
           ty1=param[1],
           match$8=fmtty_rel_det(rest$8),
           de$8=match$8[4],
           ed$8=match$8[3],
           af$8=match$8[2],
           fa$8=match$8[1],
           ty=trans(symm(ty1),ty2),
           match$9=fmtty_rel_det(ty),
           jd=match$9[4],
           dj=match$9[3],
           ga=match$9[2],
           ag=match$9[1],
           _d7_=function(param){caml_call1(jd,0);caml_call1(de$8,0);return 0},
           _d8_=function(param){caml_call1(ed$8,0);caml_call1(dj,0);return 0},
           _d9_=function(param){caml_call1(ga,0);caml_call1(af$8,0);return 0};
          return [0,
                  function(param)
                   {caml_call1(fa$8,0);caml_call1(ag,0);return 0},
                  _d9_,
                  _d8_,
                  _d7_];
         case 10:
          var
           rest$9=param[1],
           match$10=fmtty_rel_det(rest$9),
           de$9=match$10[4],
           ed$9=match$10[3],
           af$9=match$10[2],
           fa$9=match$10[1],
           _d__=function(param){caml_call1(af$9,0);return 0};
          return [0,
                  function(param){caml_call1(fa$9,0);return 0},
                  _d__,
                  ed$9,
                  de$9];
         case 11:
          var
           rest$10=param[1],
           match$11=fmtty_rel_det(rest$10),
           de$10=match$11[4],
           ed$10=match$11[3],
           af$10=match$11[2],
           fa$10=match$11[1],
           _d$_=function(param){caml_call1(af$10,0);return 0};
          return [0,
                  function(param){caml_call1(fa$10,0);return 0},
                  _d$_,
                  ed$10,
                  de$10];
         case 12:
          var
           rest$11=param[1],
           match$12=fmtty_rel_det(rest$11),
           de$11=match$12[4],
           ed$11=match$12[3],
           af$11=match$12[2],
           fa$11=match$12[1],
           _ea_=function(param){caml_call1(af$11,0);return 0};
          return [0,
                  function(param){caml_call1(fa$11,0);return 0},
                  _ea_,
                  ed$11,
                  de$11];
         case 13:
          var
           rest$12=param[1],
           match$13=fmtty_rel_det(rest$12),
           de$12=match$13[4],
           ed$12=match$13[3],
           af$12=match$13[2],
           fa$12=match$13[1],
           _eb_=function(param){caml_call1(de$12,0);return 0},
           _ec_=function(param){caml_call1(ed$12,0);return 0},
           _ed_=function(param){caml_call1(af$12,0);return 0};
          return [0,
                  function(param){caml_call1(fa$12,0);return 0},
                  _ed_,
                  _ec_,
                  _eb_];
         default:
          var
           rest$13=param[1],
           match$14=fmtty_rel_det(rest$13),
           de$13=match$14[4],
           ed$13=match$14[3],
           af$13=match$14[2],
           fa$13=match$14[1],
           _ee_=function(param){caml_call1(de$13,0);return 0},
           _ef_=function(param){caml_call1(ed$13,0);return 0},
           _eg_=function(param){caml_call1(af$13,0);return 0};
          return [0,
                  function(param){caml_call1(fa$13,0);return 0},
                  _eg_,
                  _ef_,
                  _ee_]}}
    function trans(ty1,match)
     {if(typeof ty1 === "number")
       if(typeof match === "number")
        return 0;
       else
        switch(match[0])
         {case 10:var switch$0=0;break;
          case 11:var switch$0=1;break;
          case 12:var switch$0=2;break;
          case 13:var switch$0=3;break;
          case 14:var switch$0=4;break;
          case 8:var switch$0=5;break;
          case 9:var switch$0=6;break;
          default:throw [0,Assert_failure,_a_]}
      else
       switch(ty1[0])
        {case 0:
          var _dC_=ty1[1];
          if(typeof match === "number")
           var switch$1=1;
          else
           switch(match[0])
            {case 0:var rest2=match[1];return [0,trans(_dC_,rest2)];
             case 8:var switch$0=5,switch$1=0;break;
             case 9:var switch$0=6,switch$1=0;break;
             case 10:var switch$0=0,switch$1=0;break;
             case 11:var switch$0=1,switch$1=0;break;
             case 12:var switch$0=2,switch$1=0;break;
             case 13:var switch$0=3,switch$1=0;break;
             case 14:var switch$0=4,switch$1=0;break;
             default:var switch$1=1}
          if(switch$1)var switch$0=7;
          break;
         case 1:
          var _dD_=ty1[1];
          if(typeof match === "number")
           var switch$2=1;
          else
           switch(match[0])
            {case 1:var rest2$0=match[1];return [1,trans(_dD_,rest2$0)];
             case 8:var switch$0=5,switch$2=0;break;
             case 9:var switch$0=6,switch$2=0;break;
             case 10:var switch$0=0,switch$2=0;break;
             case 11:var switch$0=1,switch$2=0;break;
             case 12:var switch$0=2,switch$2=0;break;
             case 13:var switch$0=3,switch$2=0;break;
             case 14:var switch$0=4,switch$2=0;break;
             default:var switch$2=1}
          if(switch$2)var switch$0=7;
          break;
         case 2:
          var _dE_=ty1[1];
          if(typeof match === "number")
           var switch$3=1;
          else
           switch(match[0])
            {case 2:var rest2$1=match[1];return [2,trans(_dE_,rest2$1)];
             case 8:var switch$0=5,switch$3=0;break;
             case 9:var switch$0=6,switch$3=0;break;
             case 10:var switch$0=0,switch$3=0;break;
             case 11:var switch$0=1,switch$3=0;break;
             case 12:var switch$0=2,switch$3=0;break;
             case 13:var switch$0=3,switch$3=0;break;
             case 14:var switch$0=4,switch$3=0;break;
             default:var switch$3=1}
          if(switch$3)var switch$0=7;
          break;
         case 3:
          var _dF_=ty1[1];
          if(typeof match === "number")
           var switch$4=1;
          else
           switch(match[0])
            {case 3:var rest2$2=match[1];return [3,trans(_dF_,rest2$2)];
             case 8:var switch$0=5,switch$4=0;break;
             case 9:var switch$0=6,switch$4=0;break;
             case 10:var switch$0=0,switch$4=0;break;
             case 11:var switch$0=1,switch$4=0;break;
             case 12:var switch$0=2,switch$4=0;break;
             case 13:var switch$0=3,switch$4=0;break;
             case 14:var switch$0=4,switch$4=0;break;
             default:var switch$4=1}
          if(switch$4)var switch$0=7;
          break;
         case 4:
          var _dG_=ty1[1];
          if(typeof match === "number")
           var switch$5=1;
          else
           switch(match[0])
            {case 4:var rest2$3=match[1];return [4,trans(_dG_,rest2$3)];
             case 8:var switch$0=5,switch$5=0;break;
             case 9:var switch$0=6,switch$5=0;break;
             case 10:var switch$0=0,switch$5=0;break;
             case 11:var switch$0=1,switch$5=0;break;
             case 12:var switch$0=2,switch$5=0;break;
             case 13:var switch$0=3,switch$5=0;break;
             case 14:var switch$0=4,switch$5=0;break;
             default:var switch$5=1}
          if(switch$5)var switch$0=7;
          break;
         case 5:
          var _dH_=ty1[1];
          if(typeof match === "number")
           var switch$6=1;
          else
           switch(match[0])
            {case 5:var rest2$4=match[1];return [5,trans(_dH_,rest2$4)];
             case 8:var switch$0=5,switch$6=0;break;
             case 9:var switch$0=6,switch$6=0;break;
             case 10:var switch$0=0,switch$6=0;break;
             case 11:var switch$0=1,switch$6=0;break;
             case 12:var switch$0=2,switch$6=0;break;
             case 13:var switch$0=3,switch$6=0;break;
             case 14:var switch$0=4,switch$6=0;break;
             default:var switch$6=1}
          if(switch$6)var switch$0=7;
          break;
         case 6:
          var _dI_=ty1[1];
          if(typeof match === "number")
           var switch$7=1;
          else
           switch(match[0])
            {case 6:var rest2$5=match[1];return [6,trans(_dI_,rest2$5)];
             case 8:var switch$0=5,switch$7=0;break;
             case 9:var switch$0=6,switch$7=0;break;
             case 10:var switch$0=0,switch$7=0;break;
             case 11:var switch$0=1,switch$7=0;break;
             case 12:var switch$0=2,switch$7=0;break;
             case 13:var switch$0=3,switch$7=0;break;
             case 14:var switch$0=4,switch$7=0;break;
             default:var switch$7=1}
          if(switch$7)var switch$0=7;
          break;
         case 7:
          var _dJ_=ty1[1];
          if(typeof match === "number")
           var switch$8=1;
          else
           switch(match[0])
            {case 7:var rest2$6=match[1];return [7,trans(_dJ_,rest2$6)];
             case 8:var switch$0=5,switch$8=0;break;
             case 9:var switch$0=6,switch$8=0;break;
             case 10:var switch$0=0,switch$8=0;break;
             case 11:var switch$0=1,switch$8=0;break;
             case 12:var switch$0=2,switch$8=0;break;
             case 13:var switch$0=3,switch$8=0;break;
             case 14:var switch$0=4,switch$8=0;break;
             default:var switch$8=1}
          if(switch$8)var switch$0=7;
          break;
         case 8:
          var _dK_=ty1[2],_dL_=ty1[1];
          if(typeof match === "number")
           var switch$9=1;
          else
           switch(match[0])
            {case 8:
              var rest2$7=match[2],ty2=match[1],_dM_=trans(_dK_,rest2$7);
              return [8,trans(_dL_,ty2),_dM_];
             case 10:var switch$0=0,switch$9=0;break;
             case 11:var switch$0=1,switch$9=0;break;
             case 12:var switch$0=2,switch$9=0;break;
             case 13:var switch$0=3,switch$9=0;break;
             case 14:var switch$0=4,switch$9=0;break;
             default:var switch$9=1}
          if(switch$9)throw [0,Assert_failure,_j_];
          break;
         case 9:
          var _dN_=ty1[3],_dO_=ty1[2],_dP_=ty1[1];
          if(typeof match === "number")
           var switch$10=1;
          else
           switch(match[0])
            {case 8:var switch$0=5,switch$10=0;break;
             case 9:
              var
               rest2$8=match[3],
               ty22=match[2],
               ty21=match[1],
               ty=trans(symm(_dO_),ty21),
               match$0=fmtty_rel_det(ty),
               f4=match$0[4],
               f2=match$0[2];
              caml_call1(f2,0);
              caml_call1(f4,0);
              return [9,_dP_,ty22,trans(_dN_,rest2$8)];
             case 10:var switch$0=0,switch$10=0;break;
             case 11:var switch$0=1,switch$10=0;break;
             case 12:var switch$0=2,switch$10=0;break;
             case 13:var switch$0=3,switch$10=0;break;
             case 14:var switch$0=4,switch$10=0;break;
             default:var switch$10=1}
          if(switch$10)throw [0,Assert_failure,_k_];
          break;
         case 10:
          var _dQ_=ty1[1];
          if(typeof match !== "number" && 10 === match[0])
           {var rest2$9=match[1];return [10,trans(_dQ_,rest2$9)]}
          throw [0,Assert_failure,_l_];
         case 11:
          var _dR_=ty1[1];
          if(typeof match === "number")
           var switch$11=1;
          else
           switch(match[0])
            {case 10:var switch$0=0,switch$11=0;break;
             case 11:var rest2$10=match[1];return [11,trans(_dR_,rest2$10)];
             default:var switch$11=1}
          if(switch$11)throw [0,Assert_failure,_m_];
          break;
         case 12:
          var _dS_=ty1[1];
          if(typeof match === "number")
           var switch$12=1;
          else
           switch(match[0])
            {case 10:var switch$0=0,switch$12=0;break;
             case 11:var switch$0=1,switch$12=0;break;
             case 12:var rest2$11=match[1];return [12,trans(_dS_,rest2$11)];
             default:var switch$12=1}
          if(switch$12)throw [0,Assert_failure,_n_];
          break;
         case 13:
          var _dT_=ty1[1];
          if(typeof match === "number")
           var switch$13=1;
          else
           switch(match[0])
            {case 10:var switch$0=0,switch$13=0;break;
             case 11:var switch$0=1,switch$13=0;break;
             case 12:var switch$0=2,switch$13=0;break;
             case 13:var rest2$12=match[1];return [13,trans(_dT_,rest2$12)];
             default:var switch$13=1}
          if(switch$13)throw [0,Assert_failure,_o_];
          break;
         default:
          var _dU_=ty1[1];
          if(typeof match === "number")
           var switch$14=1;
          else
           switch(match[0])
            {case 10:var switch$0=0,switch$14=0;break;
             case 11:var switch$0=1,switch$14=0;break;
             case 12:var switch$0=2,switch$14=0;break;
             case 13:var switch$0=3,switch$14=0;break;
             case 14:var rest2$13=match[1];return [14,trans(_dU_,rest2$13)];
             default:var switch$14=1}
          if(switch$14)throw [0,Assert_failure,_p_]}
      switch(switch$0)
       {case 0:throw [0,Assert_failure,_d_];
        case 1:throw [0,Assert_failure,_e_];
        case 2:throw [0,Assert_failure,_f_];
        case 3:throw [0,Assert_failure,_g_];
        case 4:throw [0,Assert_failure,_h_];
        case 5:throw [0,Assert_failure,_b_];
        case 6:throw [0,Assert_failure,_c_];
        default:throw [0,Assert_failure,_i_]}}
    function fmtty_of_padding_fmtty(pad,fmtty)
     {return typeof pad === "number"?fmtty:0 === pad[0]?fmtty:[2,fmtty]}
    function fmtty_of_custom(arity,fmtty)
     {if(arity)
       {var arity$0=arity[1];return [12,fmtty_of_custom(arity$0,fmtty)]}
      return fmtty}
    function fmtty_of_fmt$0(counter,fmtty)
     {var fmtty$0=fmtty;
      for(;;)
       if(typeof fmtty$0 === "number")
        return 0;
       else
        switch(fmtty$0[0])
         {case 0:var rest=fmtty$0[1];return [0,fmtty_of_fmt(rest)];
          case 1:var rest$0=fmtty$0[1];return [0,fmtty_of_fmt(rest$0)];
          case 2:
           var rest$1=fmtty$0[2],pad=fmtty$0[1];
           return fmtty_of_padding_fmtty(pad,[1,fmtty_of_fmt(rest$1)]);
          case 3:
           var rest$2=fmtty$0[2],pad$0=fmtty$0[1];
           return fmtty_of_padding_fmtty(pad$0,[1,fmtty_of_fmt(rest$2)]);
          case 4:
           var
            rest$3=fmtty$0[4],
            prec=fmtty$0[3],
            pad$1=fmtty$0[2],
            ty_rest=fmtty_of_fmt(rest$3),
            prec_ty=fmtty_of_precision_fmtty(prec,[2,ty_rest]);
           return fmtty_of_padding_fmtty(pad$1,prec_ty);
          case 5:
           var
            rest$4=fmtty$0[4],
            prec$0=fmtty$0[3],
            pad$2=fmtty$0[2],
            ty_rest$0=fmtty_of_fmt(rest$4),
            prec_ty$0=fmtty_of_precision_fmtty(prec$0,[3,ty_rest$0]);
           return fmtty_of_padding_fmtty(pad$2,prec_ty$0);
          case 6:
           var
            rest$5=fmtty$0[4],
            prec$1=fmtty$0[3],
            pad$3=fmtty$0[2],
            ty_rest$1=fmtty_of_fmt(rest$5),
            prec_ty$1=fmtty_of_precision_fmtty(prec$1,[4,ty_rest$1]);
           return fmtty_of_padding_fmtty(pad$3,prec_ty$1);
          case 7:
           var
            rest$6=fmtty$0[4],
            prec$2=fmtty$0[3],
            pad$4=fmtty$0[2],
            ty_rest$2=fmtty_of_fmt(rest$6),
            prec_ty$2=fmtty_of_precision_fmtty(prec$2,[5,ty_rest$2]);
           return fmtty_of_padding_fmtty(pad$4,prec_ty$2);
          case 8:
           var
            rest$7=fmtty$0[4],
            prec$3=fmtty$0[3],
            pad$5=fmtty$0[2],
            ty_rest$3=fmtty_of_fmt(rest$7),
            prec_ty$3=fmtty_of_precision_fmtty(prec$3,[6,ty_rest$3]);
           return fmtty_of_padding_fmtty(pad$5,prec_ty$3);
          case 9:
           var rest$8=fmtty$0[2],pad$6=fmtty$0[1];
           return fmtty_of_padding_fmtty(pad$6,[7,fmtty_of_fmt(rest$8)]);
          case 10:var fmtty$1=fmtty$0[1],fmtty$0=fmtty$1;continue;
          case 11:var fmtty$2=fmtty$0[2],fmtty$0=fmtty$2;continue;
          case 12:var fmtty$3=fmtty$0[2],fmtty$0=fmtty$3;continue;
          case 13:
           var rest$9=fmtty$0[3],ty=fmtty$0[2];
           return [8,ty,fmtty_of_fmt(rest$9)];
          case 14:
           var rest$10=fmtty$0[3],ty$0=fmtty$0[2];
           return [9,ty$0,ty$0,fmtty_of_fmt(rest$10)];
          case 15:var rest$11=fmtty$0[1];return [10,fmtty_of_fmt(rest$11)];
          case 16:var rest$12=fmtty$0[1];return [11,fmtty_of_fmt(rest$12)];
          case 17:var fmtty$4=fmtty$0[2],fmtty$0=fmtty$4;continue;
          case 18:
           var
            rest$13=fmtty$0[2],
            fmting_gen=fmtty$0[1],
            _dA_=fmtty_of_fmt(rest$13),
            _dB_=fmtty_of_formatting_gen(fmting_gen);
           return caml_call2(CamlinternalFormatBasics[1],_dB_,_dA_);
          case 19:var rest$14=fmtty$0[1];return [13,fmtty_of_fmt(rest$14)];
          case 20:var rest$15=fmtty$0[3];return [1,fmtty_of_fmt(rest$15)];
          case 21:var rest$16=fmtty$0[2];return [2,fmtty_of_fmt(rest$16)];
          case 22:var rest$17=fmtty$0[1];return [0,fmtty_of_fmt(rest$17)];
          case 23:
           var rest$18=fmtty$0[2],ign=fmtty$0[1];
           if(counter < 50)
            {var counter$0=counter + 1 | 0;
             return fmtty_of_ignored_format(counter$0,ign,rest$18)}
           return caml_trampoline_return
                   (fmtty_of_ignored_format,[0,ign,rest$18]);
          default:
           var rest$19=fmtty$0[3],arity=fmtty$0[1];
           return fmtty_of_custom(arity,fmtty_of_fmt(rest$19))}}
    function fmtty_of_ignored_format(counter,ign,fmt)
     {if(typeof ign === "number")
       switch(ign)
        {case 0:
          if(counter < 50)
           {var counter$0=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$0,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 1:
          if(counter < 50)
           {var counter$1=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$1,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 2:return [14,fmtty_of_fmt(fmt)];
         default:
          if(counter < 50)
           {var counter$2=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$2,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt])}
      else
       switch(ign[0])
        {case 0:
          if(counter < 50)
           {var counter$3=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$3,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 1:
          if(counter < 50)
           {var counter$4=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$4,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 2:
          if(counter < 50)
           {var counter$5=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$5,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 3:
          if(counter < 50)
           {var counter$6=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$6,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 4:
          if(counter < 50)
           {var counter$7=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$7,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 5:
          if(counter < 50)
           {var counter$8=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$8,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 6:
          if(counter < 50)
           {var counter$9=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$9,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 7:
          if(counter < 50)
           {var counter$10=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$10,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 8:
          if(counter < 50)
           {var counter$11=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$11,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         case 9:
          var fmtty=ign[2],_dz_=fmtty_of_fmt(fmt);
          return caml_call2(CamlinternalFormatBasics[1],fmtty,_dz_);
         case 10:
          if(counter < 50)
           {var counter$12=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$12,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt]);
         default:
          if(counter < 50)
           {var counter$13=counter + 1 | 0;
            return fmtty_of_fmt$0(counter$13,fmt)}
          return caml_trampoline_return(fmtty_of_fmt$0,[0,fmt])}}
    function fmtty_of_fmt(fmtty)
     {return caml_trampoline(fmtty_of_fmt$0(0,fmtty))}
    function fmtty_of_formatting_gen(formatting_gen)
     {if(0 === formatting_gen[0])
       {var match=formatting_gen[1],fmt=match[1];return fmtty_of_fmt(fmt)}
      var match$0=formatting_gen[1],fmt$0=match$0[1];
      return fmtty_of_fmt(fmt$0)}
    function fmtty_of_precision_fmtty(prec,fmtty)
     {return typeof prec === "number"?0 === prec?fmtty:[2,fmtty]:fmtty}
    var
     Type_mismatch=
      [248,cst_CamlinternalFormat_Type_mismatch,runtime.caml_fresh_oo_id(0)];
    function type_padding(pad,match)
     {if(typeof pad === "number")
       return [0,0,match];
      else
       {if(0 === pad[0])
         {var w=pad[2],padty=pad[1];return [0,[0,padty,w],match]}
        if(typeof match !== "number" && 2 === match[0])
         {var rest=match[1],padty$0=pad[1];return [0,[1,padty$0],rest]}
        throw Type_mismatch}}
    function type_padprec(pad,prec,fmtty)
     {var match=type_padding(pad,fmtty);
      if(typeof prec === "number")
       {if(0 === prec)
         {var rest=match[2],pad$0=match[1];return [0,pad$0,0,rest]}
        var _dy_=match[2];
        if(typeof _dy_ !== "number" && 2 === _dy_[0])
         {var rest$0=_dy_[1],pad$1=match[1];return [0,pad$1,1,rest$0]}
        throw Type_mismatch}
      var rest$1=match[2],pad$2=match[1],p=prec[1];
      return [0,pad$2,[0,p],rest$1]}
    function type_format(fmt,fmtty)
     {var _dx_=type_format_gen(fmt,fmtty);
      if(typeof _dx_[2] === "number"){var fmt$0=_dx_[1];return fmt$0}
      throw Type_mismatch}
    function type_ignored_param_one(ign,fmt,fmtty)
     {var match=type_format_gen(fmt,fmtty),fmtty$0=match[2],fmt$0=match[1];
      return [0,[23,ign,fmt$0],fmtty$0]}
    function type_ignored_param(ign,fmt,fmtty)
     {if(typeof ign === "number")
       switch(ign)
        {case 0:return type_ignored_param_one(ign,fmt,fmtty);
         case 1:return type_ignored_param_one(ign,fmt,fmtty);
         case 2:
          if(typeof fmtty !== "number" && 14 === fmtty[0])
           {var
             fmtty_rest=fmtty[1],
             match=type_format_gen(fmt,fmtty_rest),
             fmtty$0=match[2],
             fmt$0=match[1];
            return [0,[23,2,fmt$0],fmtty$0]}
          throw Type_mismatch;
         default:return type_ignored_param_one(ign,fmt,fmtty)}
      else
       switch(ign[0])
        {case 0:return type_ignored_param_one(ign,fmt,fmtty);
         case 1:return type_ignored_param_one(ign,fmt,fmtty);
         case 2:return type_ignored_param_one(ign,fmt,fmtty);
         case 3:return type_ignored_param_one(ign,fmt,fmtty);
         case 4:return type_ignored_param_one(ign,fmt,fmtty);
         case 5:return type_ignored_param_one(ign,fmt,fmtty);
         case 6:return type_ignored_param_one(ign,fmt,fmtty);
         case 7:return type_ignored_param_one(ign,fmt,fmtty);
         case 8:
          var sub_fmtty=ign[2],pad_opt=ign[1];
          return type_ignored_param_one([8,pad_opt,sub_fmtty],fmt,fmtty);
         case 9:
          var
           sub_fmtty$0=ign[2],
           pad_opt$0=ign[1],
           _dw_=type_ignored_format_substitution(sub_fmtty$0,fmt,fmtty),
           match$0=_dw_[2],
           fmtty$1=match$0[2],
           fmt$1=match$0[1],
           sub_fmtty$1=_dw_[1];
          return [0,[23,[9,pad_opt$0,sub_fmtty$1],fmt$1],fmtty$1];
         case 10:return type_ignored_param_one(ign,fmt,fmtty);
         default:return type_ignored_param_one(ign,fmt,fmtty)}}
    function type_formatting_gen(formatting_gen,fmt0,fmtty0)
     {if(0 === formatting_gen[0])
       {var
         match=formatting_gen[1],
         str=match[2],
         fmt1=match[1],
         match$0=type_format_gen(fmt1,fmtty0),
         fmtty2=match$0[2],
         fmt2=match$0[1],
         match$1=type_format_gen(fmt0,fmtty2),
         fmtty3=match$1[2],
         fmt3=match$1[1];
        return [0,[18,[0,[0,fmt2,str]],fmt3],fmtty3]}
      var
       match$2=formatting_gen[1],
       str$0=match$2[2],
       fmt1$0=match$2[1],
       match$3=type_format_gen(fmt1$0,fmtty0),
       fmtty2$0=match$3[2],
       fmt2$0=match$3[1],
       match$4=type_format_gen(fmt0,fmtty2$0),
       fmtty3$0=match$4[2],
       fmt3$0=match$4[1];
      return [0,[18,[1,[0,fmt2$0,str$0]],fmt3$0],fmtty3$0]}
    function type_format_gen(fmt,match)
     {if(typeof fmt === "number")
       return [0,0,match];
      else
       switch(fmt[0])
        {case 0:
          if(typeof match !== "number" && 0 === match[0])
           {var
             fmtty_rest=match[1],
             fmt_rest=fmt[1],
             match$0=type_format_gen(fmt_rest,fmtty_rest),
             fmtty=match$0[2],
             fmt$0=match$0[1];
            return [0,[0,fmt$0],fmtty]}
          break;
         case 1:
          if(typeof match !== "number" && 0 === match[0])
           {var
             fmtty_rest$0=match[1],
             fmt_rest$0=fmt[1],
             match$1=type_format_gen(fmt_rest$0,fmtty_rest$0),
             fmtty$0=match$1[2],
             fmt$1=match$1[1];
            return [0,[1,fmt$1],fmtty$0]}
          break;
         case 2:
          var
           fmt_rest$1=fmt[2],
           pad=fmt[1],
           _c4_=type_padding(pad,match),
           _c5_=_c4_[2],
           _c6_=_c4_[1];
          if(typeof _c5_ !== "number" && 1 === _c5_[0])
           {var
             fmtty_rest$1=_c5_[1],
             match$2=type_format_gen(fmt_rest$1,fmtty_rest$1),
             fmtty$1=match$2[2],
             fmt$2=match$2[1];
            return [0,[2,_c6_,fmt$2],fmtty$1]}
          throw Type_mismatch;
         case 3:
          var
           fmt_rest$2=fmt[2],
           pad$0=fmt[1],
           _c7_=type_padding(pad$0,match),
           _c8_=_c7_[2],
           _c9_=_c7_[1];
          if(typeof _c8_ !== "number" && 1 === _c8_[0])
           {var
             fmtty_rest$2=_c8_[1],
             match$3=type_format_gen(fmt_rest$2,fmtty_rest$2),
             fmtty$2=match$3[2],
             fmt$3=match$3[1];
            return [0,[3,_c9_,fmt$3],fmtty$2]}
          throw Type_mismatch;
         case 4:
          var
           fmt_rest$3=fmt[4],
           prec=fmt[3],
           pad$1=fmt[2],
           iconv=fmt[1],
           _c__=type_padprec(pad$1,prec,match),
           _c$_=_c__[3],
           _da_=_c__[2],
           _db_=_c__[1];
          if(typeof _c$_ !== "number" && 2 === _c$_[0])
           {var
             fmtty_rest$3=_c$_[1],
             match$4=type_format_gen(fmt_rest$3,fmtty_rest$3),
             fmtty$3=match$4[2],
             fmt$4=match$4[1];
            return [0,[4,iconv,_db_,_da_,fmt$4],fmtty$3]}
          throw Type_mismatch;
         case 5:
          var
           fmt_rest$4=fmt[4],
           prec$0=fmt[3],
           pad$2=fmt[2],
           iconv$0=fmt[1],
           _dc_=type_padprec(pad$2,prec$0,match),
           _dd_=_dc_[3],
           _de_=_dc_[2],
           _df_=_dc_[1];
          if(typeof _dd_ !== "number" && 3 === _dd_[0])
           {var
             fmtty_rest$4=_dd_[1],
             match$5=type_format_gen(fmt_rest$4,fmtty_rest$4),
             fmtty$4=match$5[2],
             fmt$5=match$5[1];
            return [0,[5,iconv$0,_df_,_de_,fmt$5],fmtty$4]}
          throw Type_mismatch;
         case 6:
          var
           fmt_rest$5=fmt[4],
           prec$1=fmt[3],
           pad$3=fmt[2],
           iconv$1=fmt[1],
           _dg_=type_padprec(pad$3,prec$1,match),
           _dh_=_dg_[3],
           _di_=_dg_[2],
           _dj_=_dg_[1];
          if(typeof _dh_ !== "number" && 4 === _dh_[0])
           {var
             fmtty_rest$5=_dh_[1],
             match$6=type_format_gen(fmt_rest$5,fmtty_rest$5),
             fmtty$5=match$6[2],
             fmt$6=match$6[1];
            return [0,[6,iconv$1,_dj_,_di_,fmt$6],fmtty$5]}
          throw Type_mismatch;
         case 7:
          var
           fmt_rest$6=fmt[4],
           prec$2=fmt[3],
           pad$4=fmt[2],
           iconv$2=fmt[1],
           _dk_=type_padprec(pad$4,prec$2,match),
           _dl_=_dk_[3],
           _dm_=_dk_[2],
           _dn_=_dk_[1];
          if(typeof _dl_ !== "number" && 5 === _dl_[0])
           {var
             fmtty_rest$6=_dl_[1],
             match$7=type_format_gen(fmt_rest$6,fmtty_rest$6),
             fmtty$6=match$7[2],
             fmt$7=match$7[1];
            return [0,[7,iconv$2,_dn_,_dm_,fmt$7],fmtty$6]}
          throw Type_mismatch;
         case 8:
          var
           fmt_rest$7=fmt[4],
           prec$3=fmt[3],
           pad$5=fmt[2],
           fconv=fmt[1],
           _do_=type_padprec(pad$5,prec$3,match),
           _dp_=_do_[3],
           _dq_=_do_[2],
           _dr_=_do_[1];
          if(typeof _dp_ !== "number" && 6 === _dp_[0])
           {var
             fmtty_rest$7=_dp_[1],
             match$8=type_format_gen(fmt_rest$7,fmtty_rest$7),
             fmtty$7=match$8[2],
             fmt$8=match$8[1];
            return [0,[8,fconv,_dr_,_dq_,fmt$8],fmtty$7]}
          throw Type_mismatch;
         case 9:
          var
           fmt_rest$8=fmt[2],
           pad$6=fmt[1],
           _ds_=type_padding(pad$6,match),
           _dt_=_ds_[2],
           _du_=_ds_[1];
          if(typeof _dt_ !== "number" && 7 === _dt_[0])
           {var
             fmtty_rest$8=_dt_[1],
             match$9=type_format_gen(fmt_rest$8,fmtty_rest$8),
             fmtty$8=match$9[2],
             fmt$9=match$9[1];
            return [0,[9,_du_,fmt$9],fmtty$8]}
          throw Type_mismatch;
         case 10:
          var
           fmt_rest$9=fmt[1],
           match$10=type_format_gen(fmt_rest$9,match),
           fmtty$9=match$10[2],
           fmt$10=match$10[1];
          return [0,[10,fmt$10],fmtty$9];
         case 11:
          var
           fmt_rest$10=fmt[2],
           str=fmt[1],
           match$11=type_format_gen(fmt_rest$10,match),
           fmtty$10=match$11[2],
           fmt$11=match$11[1];
          return [0,[11,str,fmt$11],fmtty$10];
         case 12:
          var
           fmt_rest$11=fmt[2],
           chr=fmt[1],
           match$12=type_format_gen(fmt_rest$11,match),
           fmtty$11=match$12[2],
           fmt$12=match$12[1];
          return [0,[12,chr,fmt$12],fmtty$11];
         case 13:
          if(typeof match !== "number" && 8 === match[0])
           {var
             fmtty_rest$9=match[2],
             sub_fmtty=match[1],
             fmt_rest$12=fmt[3],
             sub_fmtty$0=fmt[2],
             pad_opt=fmt[1];
            if(caml_notequal([0,sub_fmtty$0],[0,sub_fmtty]))
             throw Type_mismatch;
            var
             match$13=type_format_gen(fmt_rest$12,fmtty_rest$9),
             fmtty$12=match$13[2],
             fmt$13=match$13[1];
            return [0,[13,pad_opt,sub_fmtty,fmt$13],fmtty$12]}
          break;
         case 14:
          if(typeof match !== "number" && 9 === match[0])
           {var
             fmtty_rest$10=match[3],
             sub_fmtty1=match[1],
             fmt_rest$13=fmt[3],
             sub_fmtty$1=fmt[2],
             pad_opt$0=fmt[1],
             _dv_=[0,caml_call1(CamlinternalFormatBasics[2],sub_fmtty1)];
            if
             (caml_notequal
               ([0,caml_call1(CamlinternalFormatBasics[2],sub_fmtty$1)],_dv_))
             throw Type_mismatch;
            var
             match$14=
              type_format_gen
               (fmt_rest$13,
                caml_call1(CamlinternalFormatBasics[2],fmtty_rest$10)),
             fmtty$13=match$14[2],
             fmt$14=match$14[1];
            return [0,[14,pad_opt$0,sub_fmtty1,fmt$14],fmtty$13]}
          break;
         case 15:
          if(typeof match !== "number" && 10 === match[0])
           {var
             fmtty_rest$11=match[1],
             fmt_rest$14=fmt[1],
             match$15=type_format_gen(fmt_rest$14,fmtty_rest$11),
             fmtty$14=match$15[2],
             fmt$15=match$15[1];
            return [0,[15,fmt$15],fmtty$14]}
          break;
         case 16:
          if(typeof match !== "number" && 11 === match[0])
           {var
             fmtty_rest$12=match[1],
             fmt_rest$15=fmt[1],
             match$16=type_format_gen(fmt_rest$15,fmtty_rest$12),
             fmtty$15=match$16[2],
             fmt$16=match$16[1];
            return [0,[16,fmt$16],fmtty$15]}
          break;
         case 17:
          var
           fmt_rest$16=fmt[2],
           formatting_lit=fmt[1],
           match$17=type_format_gen(fmt_rest$16,match),
           fmtty$16=match$17[2],
           fmt$17=match$17[1];
          return [0,[17,formatting_lit,fmt$17],fmtty$16];
         case 18:
          var fmt_rest$17=fmt[2],formatting_gen=fmt[1];
          return type_formatting_gen(formatting_gen,fmt_rest$17,match);
         case 19:
          if(typeof match !== "number" && 13 === match[0])
           {var
             fmtty_rest$13=match[1],
             fmt_rest$18=fmt[1],
             match$18=type_format_gen(fmt_rest$18,fmtty_rest$13),
             fmtty$17=match$18[2],
             fmt$18=match$18[1];
            return [0,[19,fmt$18],fmtty$17]}
          break;
         case 20:
          if(typeof match !== "number" && 1 === match[0])
           {var
             fmtty_rest$14=match[1],
             fmt_rest$19=fmt[3],
             char_set=fmt[2],
             width_opt=fmt[1],
             match$19=type_format_gen(fmt_rest$19,fmtty_rest$14),
             fmtty$18=match$19[2],
             fmt$19=match$19[1];
            return [0,[20,width_opt,char_set,fmt$19],fmtty$18]}
          break;
         case 21:
          if(typeof match !== "number" && 2 === match[0])
           {var
             fmtty_rest$15=match[1],
             fmt_rest$20=fmt[2],
             counter=fmt[1],
             match$20=type_format_gen(fmt_rest$20,fmtty_rest$15),
             fmtty$19=match$20[2],
             fmt$20=match$20[1];
            return [0,[21,counter,fmt$20],fmtty$19]}
          break;
         case 23:
          var rest=fmt[2],ign=fmt[1];return type_ignored_param(ign,rest,match)
         }
      throw Type_mismatch}
    function type_ignored_format_substitution(sub_fmtty,fmt,match)
     {if(typeof sub_fmtty === "number")
       return [0,0,type_format_gen(fmt,match)];
      else
       switch(sub_fmtty[0])
        {case 0:
          if(typeof match !== "number" && 0 === match[0])
           {var
             fmtty_rest=match[1],
             sub_fmtty_rest=sub_fmtty[1],
             match$0=
              type_ignored_format_substitution(sub_fmtty_rest,fmt,fmtty_rest),
             fmt$0=match$0[2],
             sub_fmtty_rest$0=match$0[1];
            return [0,[0,sub_fmtty_rest$0],fmt$0]}
          break;
         case 1:
          if(typeof match !== "number" && 1 === match[0])
           {var
             fmtty_rest$0=match[1],
             sub_fmtty_rest$1=sub_fmtty[1],
             match$1=
              type_ignored_format_substitution
               (sub_fmtty_rest$1,fmt,fmtty_rest$0),
             fmt$1=match$1[2],
             sub_fmtty_rest$2=match$1[1];
            return [0,[1,sub_fmtty_rest$2],fmt$1]}
          break;
         case 2:
          if(typeof match !== "number" && 2 === match[0])
           {var
             fmtty_rest$1=match[1],
             sub_fmtty_rest$3=sub_fmtty[1],
             match$2=
              type_ignored_format_substitution
               (sub_fmtty_rest$3,fmt,fmtty_rest$1),
             fmt$2=match$2[2],
             sub_fmtty_rest$4=match$2[1];
            return [0,[2,sub_fmtty_rest$4],fmt$2]}
          break;
         case 3:
          if(typeof match !== "number" && 3 === match[0])
           {var
             fmtty_rest$2=match[1],
             sub_fmtty_rest$5=sub_fmtty[1],
             match$3=
              type_ignored_format_substitution
               (sub_fmtty_rest$5,fmt,fmtty_rest$2),
             fmt$3=match$3[2],
             sub_fmtty_rest$6=match$3[1];
            return [0,[3,sub_fmtty_rest$6],fmt$3]}
          break;
         case 4:
          if(typeof match !== "number" && 4 === match[0])
           {var
             fmtty_rest$3=match[1],
             sub_fmtty_rest$7=sub_fmtty[1],
             match$4=
              type_ignored_format_substitution
               (sub_fmtty_rest$7,fmt,fmtty_rest$3),
             fmt$4=match$4[2],
             sub_fmtty_rest$8=match$4[1];
            return [0,[4,sub_fmtty_rest$8],fmt$4]}
          break;
         case 5:
          if(typeof match !== "number" && 5 === match[0])
           {var
             fmtty_rest$4=match[1],
             sub_fmtty_rest$9=sub_fmtty[1],
             match$5=
              type_ignored_format_substitution
               (sub_fmtty_rest$9,fmt,fmtty_rest$4),
             fmt$5=match$5[2],
             sub_fmtty_rest$10=match$5[1];
            return [0,[5,sub_fmtty_rest$10],fmt$5]}
          break;
         case 6:
          if(typeof match !== "number" && 6 === match[0])
           {var
             fmtty_rest$5=match[1],
             sub_fmtty_rest$11=sub_fmtty[1],
             match$6=
              type_ignored_format_substitution
               (sub_fmtty_rest$11,fmt,fmtty_rest$5),
             fmt$6=match$6[2],
             sub_fmtty_rest$12=match$6[1];
            return [0,[6,sub_fmtty_rest$12],fmt$6]}
          break;
         case 7:
          if(typeof match !== "number" && 7 === match[0])
           {var
             fmtty_rest$6=match[1],
             sub_fmtty_rest$13=sub_fmtty[1],
             match$7=
              type_ignored_format_substitution
               (sub_fmtty_rest$13,fmt,fmtty_rest$6),
             fmt$7=match$7[2],
             sub_fmtty_rest$14=match$7[1];
            return [0,[7,sub_fmtty_rest$14],fmt$7]}
          break;
         case 8:
          if(typeof match !== "number" && 8 === match[0])
           {var
             fmtty_rest$7=match[2],
             sub2_fmtty=match[1],
             sub_fmtty_rest$15=sub_fmtty[2],
             sub2_fmtty$0=sub_fmtty[1];
            if(caml_notequal([0,sub2_fmtty$0],[0,sub2_fmtty]))
             throw Type_mismatch;
            var
             match$8=
              type_ignored_format_substitution
               (sub_fmtty_rest$15,fmt,fmtty_rest$7),
             fmt$8=match$8[2],
             sub_fmtty_rest$16=match$8[1];
            return [0,[8,sub2_fmtty,sub_fmtty_rest$16],fmt$8]}
          break;
         case 9:
          if(typeof match !== "number" && 9 === match[0])
           {var
             fmtty_rest$8=match[3],
             sub2_fmtty$1=match[2],
             sub1_fmtty=match[1],
             sub_fmtty_rest$17=sub_fmtty[3],
             sub2_fmtty$2=sub_fmtty[2],
             sub1_fmtty$0=sub_fmtty[1],
             _c2_=[0,caml_call1(CamlinternalFormatBasics[2],sub1_fmtty)];
            if
             (caml_notequal
               ([0,caml_call1(CamlinternalFormatBasics[2],sub1_fmtty$0)],_c2_))
             throw Type_mismatch;
            var _c3_=[0,caml_call1(CamlinternalFormatBasics[2],sub2_fmtty$1)];
            if
             (caml_notequal
               ([0,caml_call1(CamlinternalFormatBasics[2],sub2_fmtty$2)],_c3_))
             throw Type_mismatch;
            var
             sub_fmtty$0=trans(symm(sub1_fmtty),sub2_fmtty$1),
             match$9=fmtty_rel_det(sub_fmtty$0),
             f4=match$9[4],
             f2=match$9[2];
            caml_call1(f2,0);
            caml_call1(f4,0);
            var
             match$10=
              type_ignored_format_substitution
               (caml_call1(CamlinternalFormatBasics[2],sub_fmtty_rest$17),
                fmt,
                fmtty_rest$8),
             fmt$9=match$10[2],
             sub_fmtty_rest$18=match$10[1];
            return [0,
                    [9,sub1_fmtty,sub2_fmtty$1,symm(sub_fmtty_rest$18)],
                    fmt$9]}
          break;
         case 10:
          if(typeof match !== "number" && 10 === match[0])
           {var
             fmtty_rest$9=match[1],
             sub_fmtty_rest$19=sub_fmtty[1],
             match$11=
              type_ignored_format_substitution
               (sub_fmtty_rest$19,fmt,fmtty_rest$9),
             fmt$10=match$11[2],
             sub_fmtty_rest$20=match$11[1];
            return [0,[10,sub_fmtty_rest$20],fmt$10]}
          break;
         case 11:
          if(typeof match !== "number" && 11 === match[0])
           {var
             fmtty_rest$10=match[1],
             sub_fmtty_rest$21=sub_fmtty[1],
             match$12=
              type_ignored_format_substitution
               (sub_fmtty_rest$21,fmt,fmtty_rest$10),
             fmt$11=match$12[2],
             sub_fmtty_rest$22=match$12[1];
            return [0,[11,sub_fmtty_rest$22],fmt$11]}
          break;
         case 13:
          if(typeof match !== "number" && 13 === match[0])
           {var
             fmtty_rest$11=match[1],
             sub_fmtty_rest$23=sub_fmtty[1],
             match$13=
              type_ignored_format_substitution
               (sub_fmtty_rest$23,fmt,fmtty_rest$11),
             fmt$12=match$13[2],
             sub_fmtty_rest$24=match$13[1];
            return [0,[13,sub_fmtty_rest$24],fmt$12]}
          break;
         case 14:
          if(typeof match !== "number" && 14 === match[0])
           {var
             fmtty_rest$12=match[1],
             sub_fmtty_rest$25=sub_fmtty[1],
             match$14=
              type_ignored_format_substitution
               (sub_fmtty_rest$25,fmt,fmtty_rest$12),
             fmt$13=match$14[2],
             sub_fmtty_rest$26=match$14[1];
            return [0,[14,sub_fmtty_rest$26],fmt$13]}
          break
         }
      throw Type_mismatch}
    function recast(fmt,fmtty)
     {var _c1_=symm(fmtty);
      return type_format(fmt,caml_call1(CamlinternalFormatBasics[2],_c1_))}
    function fix_padding(padty,width,str)
     {var
       len=caml_ml_string_length(str),
       padty$0=0 <= width?padty:0,
       width$0=caml_call1(Pervasives[6],width);
      if(width$0 <= len)return str;
      var _c0_=2 === padty$0?48:32,res=caml_call2(Bytes[1],width$0,_c0_);
      switch(padty$0)
       {case 0:caml_call5(String[6],str,0,res,0,len);break;
        case 1:caml_call5(String[6],str,0,res,width$0 - len | 0,len);break;
        default:
         if(0 < len)
          {if(43 === caml_string_get(str,0))
            var switch$1=1;
           else
            if(45 === caml_string_get(str,0))
             var switch$1=1;
            else
             if(32 === caml_string_get(str,0))
              var switch$1=1;
             else
              var switch$0=0,switch$1=0;
           if(switch$1)
            {caml_bytes_set(res,0,caml_string_get(str,0));
             caml_call5
              (String[6],str,1,res,(width$0 - len | 0) + 1 | 0,len - 1 | 0);
             var switch$0=1}}
         else
          var switch$0=0;
         if(! switch$0)
          {if(1 < len)
            if(48 === caml_string_get(str,0))
             {if(120 === caml_string_get(str,1))
               var switch$3=1;
              else
               if(88 === caml_string_get(str,1))
                var switch$3=1;
               else
                var switch$2=0,switch$3=0;
              if(switch$3)
               {caml_bytes_set(res,1,caml_string_get(str,1));
                caml_call5
                 (String[6],str,2,res,(width$0 - len | 0) + 2 | 0,len - 2 | 0);
                var switch$2=1}}
            else
             var switch$2=0;
           else
            var switch$2=0;
           if(! switch$2)caml_call5(String[6],str,0,res,width$0 - len | 0,len)}}
      return caml_call1(Bytes[42],res)}
    function fix_int_precision(prec,str)
     {var
       prec$0=caml_call1(Pervasives[6],prec),
       len=caml_ml_string_length(str),
       c=caml_string_get(str,0);
      if(58 <= c)
       var switch$0=71 <= c?5 < (c - 97 | 0) >>> 0?1:0:65 <= c?0:1;
      else
       {if(32 === c)
         var switch$1=1;
        else
         if(43 <= c)
          {var switcher=c - 43 | 0;
           switch(switcher)
            {case 5:
              if(len < (prec$0 + 2 | 0))
               if(1 < len)
                {var
                  switch$2=
                   120 === caml_string_get(str,1)
                    ?0
                    :88 === caml_string_get(str,1)?0:1;
                 if(! switch$2)
                  {var res$1=caml_call2(Bytes[1],prec$0 + 2 | 0,48);
                   caml_bytes_set(res$1,1,caml_string_get(str,1));
                   caml_call5
                    (String[6],
                     str,
                     2,
                     res$1,
                     (prec$0 - len | 0) + 4 | 0,
                     len - 2 | 0);
                   return caml_call1(Bytes[42],res$1)}}
              var switch$0=0,switch$1=0;
              break;
             case 0:
             case 2:var switch$1=1;break;
             case 1:
             case 3:
             case 4:var switch$0=1,switch$1=0;break;
             default:var switch$0=0,switch$1=0}}
         else
          var switch$0=1,switch$1=0;
        if(switch$1)
         {if(len < (prec$0 + 1 | 0))
           {var res$0=caml_call2(Bytes[1],prec$0 + 1 | 0,48);
            caml_bytes_set(res$0,0,c);
            caml_call5
             (String[6],str,1,res$0,(prec$0 - len | 0) + 2 | 0,len - 1 | 0);
            return caml_call1(Bytes[42],res$0)}
          var switch$0=1}}
      if(! switch$0)
       if(len < prec$0)
        {var res=caml_call2(Bytes[1],prec$0,48);
         caml_call5(String[6],str,0,res,prec$0 - len | 0,len);
         return caml_call1(Bytes[42],res)}
      return str}
    function string_to_caml_string(str)
     {var
       str$0=caml_call1(String[13],str),
       l=caml_ml_string_length(str$0),
       res=caml_call2(Bytes[1],l + 2 | 0,34);
      caml_blit_string(str$0,0,res,1,l);
      return caml_call1(Bytes[42],res)}
    function format_of_iconv(param)
     {switch(param)
       {case 0:return cst_d;
        case 1:return cst_d$0;
        case 2:return cst_d$1;
        case 3:return cst_i$0;
        case 4:return cst_i$1;
        case 5:return cst_i$2;
        case 6:return cst_x;
        case 7:return cst_x$0;
        case 8:return cst_X;
        case 9:return cst_X$0;
        case 10:return cst_o;
        case 11:return cst_o$0;
        default:return cst_u}}
    function format_of_iconvL(param)
     {switch(param)
       {case 0:return cst_Ld;
        case 1:return cst_Ld$0;
        case 2:return cst_Ld$1;
        case 3:return cst_Li$0;
        case 4:return cst_Li$1;
        case 5:return cst_Li$2;
        case 6:return cst_Lx;
        case 7:return cst_Lx$0;
        case 8:return cst_LX;
        case 9:return cst_LX$0;
        case 10:return cst_Lo;
        case 11:return cst_Lo$0;
        default:return cst_Lu}}
    function format_of_iconvl(param)
     {switch(param)
       {case 0:return cst_ld;
        case 1:return cst_ld$0;
        case 2:return cst_ld$1;
        case 3:return cst_li$0;
        case 4:return cst_li$1;
        case 5:return cst_li$2;
        case 6:return cst_lx;
        case 7:return cst_lx$0;
        case 8:return cst_lX;
        case 9:return cst_lX$0;
        case 10:return cst_lo;
        case 11:return cst_lo$0;
        default:return cst_lu}}
    function format_of_iconvn(param)
     {switch(param)
       {case 0:return cst_nd;
        case 1:return cst_nd$0;
        case 2:return cst_nd$1;
        case 3:return cst_ni$0;
        case 4:return cst_ni$1;
        case 5:return cst_ni$2;
        case 6:return cst_nx;
        case 7:return cst_nx$0;
        case 8:return cst_nX;
        case 9:return cst_nX$0;
        case 10:return cst_no;
        case 11:return cst_no$0;
        default:return cst_nu}}
    function format_of_fconv(fconv,prec)
     {if(15 === fconv)return cst_12g;
      var
       prec$0=caml_call1(Pervasives[6],prec),
       symb=char_of_fconv(fconv),
       buf=buffer_create(16);
      buffer_add_char(buf,37);
      bprint_fconv_flag(buf,fconv);
      buffer_add_char(buf,46);
      buffer_add_string(buf,caml_call1(Pervasives[21],prec$0));
      buffer_add_char(buf,symb);
      return buffer_contents(buf)}
    function convert_int(iconv,n)
     {return caml_format_int(format_of_iconv(iconv),n)}
    function convert_int32(iconv,n)
     {return caml_format_int(format_of_iconvl(iconv),n)}
    function convert_nativeint(iconv,n)
     {return caml_format_int(format_of_iconvn(iconv),n)}
    function convert_int64(iconv,n)
     {return runtime.caml_int64_format(format_of_iconvL(iconv),n)}
    function convert_float(fconv,prec,x)
     {if(16 <= fconv)
       {if(17 <= fconv)
         switch(fconv - 17 | 0)
          {case 2:var switch$0=0;break;
           case 0:
           case 3:var sign=43,switch$0=1;break;
           default:var sign=32,switch$0=1}
        else
         var switch$0=0;
        if(! switch$0)var sign=45;
        var str=runtime.caml_hexstring_of_float(x,prec,sign);
        return 19 <= fconv?caml_call1(String[29],str):str}
      var str$0=runtime.caml_format_float(format_of_fconv(fconv,prec),x);
      if(15 === fconv)
       {var
         len=caml_ml_string_length(str$0),
         is_valid=
          function(i)
           {var i$0=i;
            for(;;)
             {if(i$0 === len)return 0;
              var
               match=caml_string_get(str$0,i$0),
               _cZ_=match - 46 | 0,
               switch$0=
                23 < _cZ_ >>> 0?55 === _cZ_?1:0:21 < (_cZ_ - 1 | 0) >>> 0?1:0;
              if(switch$0)return 1;
              var i$1=i$0 + 1 | 0,i$0=i$1;
              continue}},
         match=runtime.caml_classify_float(x);
        return 3 === match
                ?x < 0.?cst_neg_infinity:cst_infinity
                :4 <= match
                  ?cst_nan
                  :is_valid(0)?str$0:caml_call2(Pervasives[16],str$0,cst$16)}
      return str$0}
    function format_caml_char(c)
     {var
       str=caml_call1(Char[2],c),
       l=caml_ml_string_length(str),
       res=caml_call2(Bytes[1],l + 2 | 0,39);
      caml_blit_string(str,0,res,1,l);
      return caml_call1(Bytes[42],res)}
    function string_of_fmtty(fmtty)
     {var buf=buffer_create(16);
      bprint_fmtty(buf,fmtty);
      return buffer_contents(buf)}
    function make_float_padding_precision(k,o,acc,fmt,pad,match,fconv)
     {if(typeof pad === "number")
       {if(typeof match === "number")
         return 0 === match
                 ?function(x)
                   {var str=convert_float(fconv,default_float_precision,x);
                    return make_printf(k,o,[4,acc,str],fmt)}
                 :function(p,x)
                   {var str=convert_float(fconv,p,x);
                    return make_printf(k,o,[4,acc,str],fmt)};
        var p=match[1];
        return function(x)
         {var str=convert_float(fconv,p,x);
          return make_printf(k,o,[4,acc,str],fmt)}}
      else
       {if(0 === pad[0])
         {var _cW_=pad[2],_cX_=pad[1];
          if(typeof match === "number")
           return 0 === match
                   ?function(x)
                     {var
                       str=convert_float(fconv,default_float_precision,x),
                       str$0=fix_padding(_cX_,_cW_,str);
                      return make_printf(k,o,[4,acc,str$0],fmt)}
                   :function(p,x)
                     {var str=fix_padding(_cX_,_cW_,convert_float(fconv,p,x));
                      return make_printf(k,o,[4,acc,str],fmt)};
          var p$0=match[1];
          return function(x)
           {var str=fix_padding(_cX_,_cW_,convert_float(fconv,p$0,x));
            return make_printf(k,o,[4,acc,str],fmt)}}
        var _cY_=pad[1];
        if(typeof match === "number")
         return 0 === match
                 ?function(w,x)
                   {var
                     str=convert_float(fconv,default_float_precision,x),
                     str$0=fix_padding(_cY_,w,str);
                    return make_printf(k,o,[4,acc,str$0],fmt)}
                 :function(w,p,x)
                   {var str=fix_padding(_cY_,w,convert_float(fconv,p,x));
                    return make_printf(k,o,[4,acc,str],fmt)};
        var p$1=match[1];
        return function(w,x)
         {var str=fix_padding(_cY_,w,convert_float(fconv,p$1,x));
          return make_printf(k,o,[4,acc,str],fmt)}}}
    function make_int_padding_precision(k,o,acc,fmt,pad,match,trans,iconv)
     {if(typeof pad === "number")
       {if(typeof match === "number")
         return 0 === match
                 ?function(x)
                   {var str=caml_call2(trans,iconv,x);
                    return make_printf(k,o,[4,acc,str],fmt)}
                 :function(p,x)
                   {var str=fix_int_precision(p,caml_call2(trans,iconv,x));
                    return make_printf(k,o,[4,acc,str],fmt)};
        var p=match[1];
        return function(x)
         {var str=fix_int_precision(p,caml_call2(trans,iconv,x));
          return make_printf(k,o,[4,acc,str],fmt)}}
      else
       {if(0 === pad[0])
         {var _cT_=pad[2],_cU_=pad[1];
          if(typeof match === "number")
           return 0 === match
                   ?function(x)
                     {var str=fix_padding(_cU_,_cT_,caml_call2(trans,iconv,x));
                      return make_printf(k,o,[4,acc,str],fmt)}
                   :function(p,x)
                     {var
                       str=
                        fix_padding
                         (_cU_,_cT_,fix_int_precision(p,caml_call2(trans,iconv,x)));
                      return make_printf(k,o,[4,acc,str],fmt)};
          var p$0=match[1];
          return function(x)
           {var
             str=
              fix_padding
               (_cU_,_cT_,fix_int_precision(p$0,caml_call2(trans,iconv,x)));
            return make_printf(k,o,[4,acc,str],fmt)}}
        var _cV_=pad[1];
        if(typeof match === "number")
         return 0 === match
                 ?function(w,x)
                   {var str=fix_padding(_cV_,w,caml_call2(trans,iconv,x));
                    return make_printf(k,o,[4,acc,str],fmt)}
                 :function(w,p,x)
                   {var
                     str=
                      fix_padding
                       (_cV_,w,fix_int_precision(p,caml_call2(trans,iconv,x)));
                    return make_printf(k,o,[4,acc,str],fmt)};
        var p$1=match[1];
        return function(w,x)
         {var
           str=
            fix_padding
             (_cV_,w,fix_int_precision(p$1,caml_call2(trans,iconv,x)));
          return make_printf(k,o,[4,acc,str],fmt)}}}
    function make_padding(k,o,acc,fmt,pad,trans)
     {if(typeof pad === "number")
       return function(x)
        {var new_acc=[4,acc,caml_call1(trans,x)];
         return make_printf(k,o,new_acc,fmt)};
      else
       {if(0 === pad[0])
         {var width=pad[2],padty=pad[1];
          return function(x)
           {var new_acc=[4,acc,fix_padding(padty,width,caml_call1(trans,x))];
            return make_printf(k,o,new_acc,fmt)}}
        var padty$0=pad[1];
        return function(w,x)
         {var new_acc=[4,acc,fix_padding(padty$0,w,caml_call1(trans,x))];
          return make_printf(k,o,new_acc,fmt)}}}
    function make_printf$0(counter,k,o,acc,fmt)
     {var k$0=k,acc$0=acc,fmt$0=fmt;
      for(;;)
       if(typeof fmt$0 === "number")
        return caml_call2(k$0,o,acc$0);
       else
        switch(fmt$0[0])
         {case 0:
           var rest=fmt$0[1];
           return function(c)
            {var new_acc=[5,acc$0,c];return make_printf(k$0,o,new_acc,rest)};
          case 1:
           var rest$0=fmt$0[1];
           return function(c)
            {var new_acc=[4,acc$0,format_caml_char(c)];
             return make_printf(k$0,o,new_acc,rest$0)};
          case 2:
           var rest$1=fmt$0[2],pad=fmt$0[1];
           return make_padding
                   (k$0,o,acc$0,rest$1,pad,function(str){return str});
          case 3:
           var rest$2=fmt$0[2],pad$0=fmt$0[1];
           return make_padding(k$0,o,acc$0,rest$2,pad$0,string_to_caml_string);
          case 4:
           var rest$3=fmt$0[4],prec=fmt$0[3],pad$1=fmt$0[2],iconv=fmt$0[1];
           return make_int_padding_precision
                   (k$0,o,acc$0,rest$3,pad$1,prec,convert_int,iconv);
          case 5:
           var
            rest$4=fmt$0[4],
            prec$0=fmt$0[3],
            pad$2=fmt$0[2],
            iconv$0=fmt$0[1];
           return make_int_padding_precision
                   (k$0,o,acc$0,rest$4,pad$2,prec$0,convert_int32,iconv$0);
          case 6:
           var
            rest$5=fmt$0[4],
            prec$1=fmt$0[3],
            pad$3=fmt$0[2],
            iconv$1=fmt$0[1];
           return make_int_padding_precision
                   (k$0,o,acc$0,rest$5,pad$3,prec$1,convert_nativeint,iconv$1);
          case 7:
           var
            rest$6=fmt$0[4],
            prec$2=fmt$0[3],
            pad$4=fmt$0[2],
            iconv$2=fmt$0[1];
           return make_int_padding_precision
                   (k$0,o,acc$0,rest$6,pad$4,prec$2,convert_int64,iconv$2);
          case 8:
           var rest$7=fmt$0[4],prec$3=fmt$0[3],pad$5=fmt$0[2],fconv=fmt$0[1];
           return make_float_padding_precision
                   (k$0,o,acc$0,rest$7,pad$5,prec$3,fconv);
          case 9:
           var rest$8=fmt$0[2],pad$6=fmt$0[1];
           return make_padding(k$0,o,acc$0,rest$8,pad$6,Pervasives[18]);
          case 10:
           var fmt$1=fmt$0[1],acc$1=[7,acc$0],acc$0=acc$1,fmt$0=fmt$1;
           continue;
          case 11:
           var
            fmt$2=fmt$0[2],
            str=fmt$0[1],
            acc$2=[2,acc$0,str],
            acc$0=acc$2,
            fmt$0=fmt$2;
           continue;
          case 12:
           var
            fmt$3=fmt$0[2],
            chr=fmt$0[1],
            acc$3=[3,acc$0,chr],
            acc$0=acc$3,
            fmt$0=fmt$3;
           continue;
          case 13:
           var
            rest$9=fmt$0[3],
            sub_fmtty=fmt$0[2],
            ty=string_of_fmtty(sub_fmtty);
           return function(str)
            {return make_printf(k$0,o,[4,acc$0,ty],rest$9)};
          case 14:
           var rest$10=fmt$0[3],fmtty=fmt$0[2];
           return function(param)
            {var fmt=param[1],_cS_=recast(fmt,fmtty);
             return make_printf
                     (k$0,
                      o,
                      acc$0,
                      caml_call2(CamlinternalFormatBasics[3],_cS_,rest$10))};
          case 15:
           var rest$11=fmt$0[1];
           return function(f,x)
            {return make_printf
                     (k$0,
                      o,
                      [6,acc$0,function(o){return caml_call2(f,o,x)}],
                      rest$11)};
          case 16:
           var rest$12=fmt$0[1];
           return function(f){return make_printf(k$0,o,[6,acc$0,f],rest$12)};
          case 17:
           var
            fmt$4=fmt$0[2],
            fmting_lit=fmt$0[1],
            acc$4=[0,acc$0,fmting_lit],
            acc$0=acc$4,
            fmt$0=fmt$4;
           continue;
          case 18:
           var _cQ_=fmt$0[1];
           if(0 === _cQ_[0])
            {var
              rest$13=fmt$0[2],
              match=_cQ_[1],
              fmt$5=match[1],
              k$3=
               function(acc,k,rest)
                {function k$0(koc,kacc)
                  {return make_printf(k,koc,[1,acc,[0,kacc]],rest)}
                 return k$0},
              k$1=k$3(acc$0,k$0,rest$13),
              k$0=k$1,
              acc$0=0,
              fmt$0=fmt$5;
             continue}
           var
            rest$14=fmt$0[2],
            match$0=_cQ_[1],
            fmt$6=match$0[1],
            k$4=
             function(acc,k,rest)
              {function k$0(koc,kacc)
                {return make_printf(k,koc,[1,acc,[1,kacc]],rest)}
               return k$0},
            k$2=k$4(acc$0,k$0,rest$14),
            k$0=k$2,
            acc$0=0,
            fmt$0=fmt$6;
           continue;
          case 19:throw [0,Assert_failure,_q_];
          case 20:
           var rest$15=fmt$0[3],new_acc=[8,acc$0,cst_Printf_bad_conversion];
           return function(param){return make_printf(k$0,o,new_acc,rest$15)};
          case 21:
           var rest$16=fmt$0[2];
           return function(n)
            {var new_acc=[4,acc$0,caml_format_int(cst_u$0,n)];
             return make_printf(k$0,o,new_acc,rest$16)};
          case 22:
           var rest$17=fmt$0[1];
           return function(c)
            {var new_acc=[5,acc$0,c];
             return make_printf(k$0,o,new_acc,rest$17)};
          case 23:
           var rest$18=fmt$0[2],ign=fmt$0[1];
           if(counter < 50)
            {var counter$1=counter + 1 | 0;
             return make_ignored_param$0(counter$1,k$0,o,acc$0,ign,rest$18)}
           return caml_trampoline_return
                   (make_ignored_param$0,[0,k$0,o,acc$0,ign,rest$18]);
          default:
           var
            rest$19=fmt$0[3],
            f=fmt$0[2],
            arity=fmt$0[1],
            _cR_=caml_call1(f,0);
           if(counter < 50)
            {var counter$0=counter + 1 | 0;
             return make_custom$0(counter$0,k$0,o,acc$0,rest$19,arity,_cR_)}
           return caml_trampoline_return
                   (make_custom$0,[0,k$0,o,acc$0,rest$19,arity,_cR_])}}
    function make_ignored_param$0(counter,k,o,acc,ign,fmt)
     {if(typeof ign === "number")
       switch(ign)
        {case 0:
          if(counter < 50)
           {var counter$0=counter + 1 | 0;
            return make_invalid_arg(counter$0,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 1:
          if(counter < 50)
           {var counter$1=counter + 1 | 0;
            return make_invalid_arg(counter$1,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 2:throw [0,Assert_failure,_r_];
         default:
          if(counter < 50)
           {var counter$2=counter + 1 | 0;
            return make_invalid_arg(counter$2,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt])}
      else
       switch(ign[0])
        {case 0:
          if(counter < 50)
           {var counter$3=counter + 1 | 0;
            return make_invalid_arg(counter$3,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 1:
          if(counter < 50)
           {var counter$4=counter + 1 | 0;
            return make_invalid_arg(counter$4,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 2:
          if(counter < 50)
           {var counter$5=counter + 1 | 0;
            return make_invalid_arg(counter$5,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 3:
          if(counter < 50)
           {var counter$6=counter + 1 | 0;
            return make_invalid_arg(counter$6,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 4:
          if(counter < 50)
           {var counter$7=counter + 1 | 0;
            return make_invalid_arg(counter$7,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 5:
          if(counter < 50)
           {var counter$8=counter + 1 | 0;
            return make_invalid_arg(counter$8,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 6:
          if(counter < 50)
           {var counter$9=counter + 1 | 0;
            return make_invalid_arg(counter$9,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 7:
          if(counter < 50)
           {var counter$10=counter + 1 | 0;
            return make_invalid_arg(counter$10,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 8:
          if(counter < 50)
           {var counter$11=counter + 1 | 0;
            return make_invalid_arg(counter$11,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         case 9:
          var fmtty=ign[2];
          if(counter < 50)
           {var counter$14=counter + 1 | 0;
            return make_from_fmtty$0(counter$14,k,o,acc,fmtty,fmt)}
          return caml_trampoline_return
                  (make_from_fmtty$0,[0,k,o,acc,fmtty,fmt]);
         case 10:
          if(counter < 50)
           {var counter$12=counter + 1 | 0;
            return make_invalid_arg(counter$12,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt]);
         default:
          if(counter < 50)
           {var counter$13=counter + 1 | 0;
            return make_invalid_arg(counter$13,k,o,acc,fmt)}
          return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt])}}
    function make_from_fmtty$0(counter,k,o,acc,fmtty,fmt)
     {if(typeof fmtty === "number")
       {if(counter < 50)
         {var counter$0=counter + 1 | 0;
          return make_invalid_arg(counter$0,k,o,acc,fmt)}
        return caml_trampoline_return(make_invalid_arg,[0,k,o,acc,fmt])}
      else
       switch(fmtty[0])
        {case 0:
          var rest=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest,fmt)};
         case 1:
          var rest$0=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$0,fmt)};
         case 2:
          var rest$1=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$1,fmt)};
         case 3:
          var rest$2=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$2,fmt)};
         case 4:
          var rest$3=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$3,fmt)};
         case 5:
          var rest$4=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$4,fmt)};
         case 6:
          var rest$5=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$5,fmt)};
         case 7:
          var rest$6=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$6,fmt)};
         case 8:
          var rest$7=fmtty[2];
          return function(param){return make_from_fmtty(k,o,acc,rest$7,fmt)};
         case 9:
          var
           rest$8=fmtty[3],
           ty2=fmtty[2],
           ty1=fmtty[1],
           ty=trans(symm(ty1),ty2);
          return function(param)
           {return make_from_fmtty
                    (k,
                     o,
                     acc,
                     caml_call2(CamlinternalFormatBasics[1],ty,rest$8),
                     fmt)};
         case 10:
          var rest$9=fmtty[1];
          return function(param,_cP_)
           {return make_from_fmtty(k,o,acc,rest$9,fmt)};
         case 11:
          var rest$10=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$10,fmt)};
         case 12:
          var rest$11=fmtty[1];
          return function(param){return make_from_fmtty(k,o,acc,rest$11,fmt)};
         case 13:throw [0,Assert_failure,_s_];
         default:throw [0,Assert_failure,_t_]}}
    function make_invalid_arg(counter,k,o,acc,fmt)
     {var _cO_=[8,acc,cst_Printf_bad_conversion$0];
      if(counter < 50)
       {var counter$0=counter + 1 | 0;
        return make_printf$0(counter$0,k,o,_cO_,fmt)}
      return caml_trampoline_return(make_printf$0,[0,k,o,_cO_,fmt])}
    function make_custom$0(counter,k,o,acc,rest,arity,f)
     {if(arity)
       {var arity$0=arity[1];
        return function(x)
         {return make_custom(k,o,acc,rest,arity$0,caml_call1(f,x))}}
      var _cN_=[4,acc,f];
      if(counter < 50)
       {var counter$0=counter + 1 | 0;
        return make_printf$0(counter$0,k,o,_cN_,rest)}
      return caml_trampoline_return(make_printf$0,[0,k,o,_cN_,rest])}
    function make_printf(k,o,acc,fmt)
     {return caml_trampoline(make_printf$0(0,k,o,acc,fmt))}
    function make_ignored_param(k,o,acc,ign,fmt)
     {return caml_trampoline(make_ignored_param$0(0,k,o,acc,ign,fmt))}
    function make_from_fmtty(k,o,acc,fmtty,fmt)
     {return caml_trampoline(make_from_fmtty$0(0,k,o,acc,fmtty,fmt))}
    function make_custom(k,o,acc,rest,arity,f)
     {return caml_trampoline(make_custom$0(0,k,o,acc,rest,arity,f))}
    function const$0(x,param){return x}
    function fn_of_padding_precision(k,o,fmt,pad,prec)
     {if(typeof pad === "number")
       {if(typeof prec === "number")
         {if(0 === prec)
           {var _cj_=make_iprintf(k,o,fmt);
            return function(_cB_){return const$0(_cj_,_cB_)}}
          var
           _ck_=make_iprintf(k,o,fmt),
           _cl_=function(_cA_){return const$0(_ck_,_cA_)};
          return function(_cz_){return const$0(_cl_,_cz_)}}
        var _cm_=make_iprintf(k,o,fmt);
        return function(_cy_){return const$0(_cm_,_cy_)}}
      else
       {if(0 === pad[0])
         {if(typeof prec === "number")
           {if(0 === prec)
             {var _cn_=make_iprintf(k,o,fmt);
              return function(_cM_){return const$0(_cn_,_cM_)}}
            var
             _co_=make_iprintf(k,o,fmt),
             _cp_=function(_cL_){return const$0(_co_,_cL_)};
            return function(_cK_){return const$0(_cp_,_cK_)}}
          var _cq_=make_iprintf(k,o,fmt);
          return function(_cJ_){return const$0(_cq_,_cJ_)}}
        if(typeof prec === "number")
         {if(0 === prec)
           {var
             _cr_=make_iprintf(k,o,fmt),
             _cs_=function(_cI_){return const$0(_cr_,_cI_)};
            return function(_cH_){return const$0(_cs_,_cH_)}}
          var
           _ct_=make_iprintf(k,o,fmt),
           _cu_=function(_cG_){return const$0(_ct_,_cG_)},
           _cv_=function(_cF_){return const$0(_cu_,_cF_)};
          return function(_cE_){return const$0(_cv_,_cE_)}}
        var
         _cw_=make_iprintf(k,o,fmt),
         _cx_=function(_cD_){return const$0(_cw_,_cD_)};
        return function(_cC_){return const$0(_cx_,_cC_)}}}
    function make_iprintf$0(counter,k,o,fmt)
     {var k$0=k,fmt$0=fmt;
      for(;;)
       if(typeof fmt$0 === "number")
        return caml_call1(k$0,o);
       else
        switch(fmt$0[0])
         {case 0:
           var rest=fmt$0[1],_bz_=make_iprintf(k$0,o,rest);
           return function(_ci_){return const$0(_bz_,_ci_)};
          case 1:
           var rest$0=fmt$0[1],_bA_=make_iprintf(k$0,o,rest$0);
           return function(_ch_){return const$0(_bA_,_ch_)};
          case 2:
           var _bB_=fmt$0[1];
           if(typeof _bB_ === "number")
            {var rest$1=fmt$0[2],_bC_=make_iprintf(k$0,o,rest$1);
             return function(_cd_){return const$0(_bC_,_cd_)}}
           else
            {if(0 === _bB_[0])
              {var rest$2=fmt$0[2],_bD_=make_iprintf(k$0,o,rest$2);
               return function(_cg_){return const$0(_bD_,_cg_)}}
             var
              rest$3=fmt$0[2],
              _bE_=make_iprintf(k$0,o,rest$3),
              _bF_=function(_cf_){return const$0(_bE_,_cf_)};
             return function(_ce_){return const$0(_bF_,_ce_)}}
          case 3:
           var _bG_=fmt$0[1];
           if(typeof _bG_ === "number")
            {var rest$4=fmt$0[2],_bH_=make_iprintf(k$0,o,rest$4);
             return function(_b$_){return const$0(_bH_,_b$_)}}
           else
            {if(0 === _bG_[0])
              {var rest$5=fmt$0[2],_bI_=make_iprintf(k$0,o,rest$5);
               return function(_cc_){return const$0(_bI_,_cc_)}}
             var
              rest$6=fmt$0[2],
              _bJ_=make_iprintf(k$0,o,rest$6),
              _bK_=function(_cb_){return const$0(_bJ_,_cb_)};
             return function(_ca_){return const$0(_bK_,_ca_)}}
          case 4:
           var rest$7=fmt$0[4],prec=fmt$0[3],pad=fmt$0[2];
           return fn_of_padding_precision(k$0,o,rest$7,pad,prec);
          case 5:
           var rest$8=fmt$0[4],prec$0=fmt$0[3],pad$0=fmt$0[2];
           return fn_of_padding_precision(k$0,o,rest$8,pad$0,prec$0);
          case 6:
           var rest$9=fmt$0[4],prec$1=fmt$0[3],pad$1=fmt$0[2];
           return fn_of_padding_precision(k$0,o,rest$9,pad$1,prec$1);
          case 7:
           var rest$10=fmt$0[4],prec$2=fmt$0[3],pad$2=fmt$0[2];
           return fn_of_padding_precision(k$0,o,rest$10,pad$2,prec$2);
          case 8:
           var rest$11=fmt$0[4],prec$3=fmt$0[3],pad$3=fmt$0[2];
           return fn_of_padding_precision(k$0,o,rest$11,pad$3,prec$3);
          case 9:
           var _bL_=fmt$0[1];
           if(typeof _bL_ === "number")
            {var rest$12=fmt$0[2],_bM_=make_iprintf(k$0,o,rest$12);
             return function(_b7_){return const$0(_bM_,_b7_)}}
           else
            {if(0 === _bL_[0])
              {var rest$13=fmt$0[2],_bN_=make_iprintf(k$0,o,rest$13);
               return function(_b__){return const$0(_bN_,_b__)}}
             var
              rest$14=fmt$0[2],
              _bO_=make_iprintf(k$0,o,rest$14),
              _bP_=function(_b9_){return const$0(_bO_,_b9_)};
             return function(_b8_){return const$0(_bP_,_b8_)}}
          case 10:var fmt$1=fmt$0[1],fmt$0=fmt$1;continue;
          case 11:var fmt$2=fmt$0[2],fmt$0=fmt$2;continue;
          case 12:var fmt$3=fmt$0[2],fmt$0=fmt$3;continue;
          case 13:
           var rest$15=fmt$0[3],_bQ_=make_iprintf(k$0,o,rest$15);
           return function(_b6_){return const$0(_bQ_,_b6_)};
          case 14:
           var rest$16=fmt$0[3],fmtty=fmt$0[2];
           return function(param)
            {var fmt=param[1],_b5_=recast(fmt,fmtty);
             return make_iprintf
                     (k$0,o,caml_call2(CamlinternalFormatBasics[3],_b5_,rest$16))};
          case 15:
           var
            rest$17=fmt$0[1],
            _bR_=make_iprintf(k$0,o,rest$17),
            _bS_=function(_b4_){return const$0(_bR_,_b4_)};
           return function(_b3_){return const$0(_bS_,_b3_)};
          case 16:
           var rest$18=fmt$0[1],_bT_=make_iprintf(k$0,o,rest$18);
           return function(_b2_){return const$0(_bT_,_b2_)};
          case 17:var fmt$4=fmt$0[2],fmt$0=fmt$4;continue;
          case 18:
           var _bU_=fmt$0[1];
           if(0 === _bU_[0])
            {var
              rest$19=fmt$0[2],
              match=_bU_[1],
              fmt$5=match[1],
              k$3=
               function(k,rest)
                {function k$0(koc){return make_iprintf(k,koc,rest)}return k$0},
              k$1=k$3(k$0,rest$19),
              k$0=k$1,
              fmt$0=fmt$5;
             continue}
           var
            rest$20=fmt$0[2],
            match$0=_bU_[1],
            fmt$6=match$0[1],
            k$4=
             function(k,rest)
              {function k$0(koc){return make_iprintf(k,koc,rest)}return k$0},
            k$2=k$4(k$0,rest$20),
            k$0=k$2,
            fmt$0=fmt$6;
           continue;
          case 19:throw [0,Assert_failure,_u_];
          case 20:
           var rest$21=fmt$0[3],_bV_=make_iprintf(k$0,o,rest$21);
           return function(_b1_){return const$0(_bV_,_b1_)};
          case 21:
           var rest$22=fmt$0[2],_bW_=make_iprintf(k$0,o,rest$22);
           return function(_b0_){return const$0(_bW_,_b0_)};
          case 22:
           var rest$23=fmt$0[1],_bX_=make_iprintf(k$0,o,rest$23);
           return function(_bZ_){return const$0(_bX_,_bZ_)};
          case 23:
           var rest$24=fmt$0[2],ign=fmt$0[1],_bY_=0;
           return make_ignored_param
                   (function(x,param){return caml_call1(k$0,x)},
                    o,
                    _bY_,
                    ign,
                    rest$24);
          default:
           var rest$25=fmt$0[3],arity=fmt$0[1];
           if(counter < 50)
            {var counter$0=counter + 1 | 0;
             return fn_of_custom_arity$0(counter$0,k$0,o,rest$25,arity)}
           return caml_trampoline_return
                   (fn_of_custom_arity$0,[0,k$0,o,rest$25,arity])}}
    function fn_of_custom_arity$0(counter,k,o,fmt,param)
     {if(param)
       {var arity=param[1],_bx_=fn_of_custom_arity(k,o,fmt,arity);
        return function(_by_){return const$0(_bx_,_by_)}}
      if(counter < 50)
       {var counter$0=counter + 1 | 0;
        return make_iprintf$0(counter$0,k,o,fmt)}
      return caml_trampoline_return(make_iprintf$0,[0,k,o,fmt])}
    function make_iprintf(k,o,fmt)
     {return caml_trampoline(make_iprintf$0(0,k,o,fmt))}
    function fn_of_custom_arity(k,o,fmt,param)
     {return caml_trampoline(fn_of_custom_arity$0(0,k,o,fmt,param))}
    function output_acc(o,acc)
     {var acc$0=acc;
      for(;;)
       if(typeof acc$0 === "number")
        return 0;
       else
        switch(acc$0[0])
         {case 0:
           var
            fmting_lit=acc$0[2],
            p=acc$0[1],
            s=string_of_formatting_lit(fmting_lit);
           output_acc(o,p);
           return caml_call2(Pervasives[54],o,s);
          case 1:
           var _bv_=acc$0[2],_bw_=acc$0[1];
           if(0 === _bv_[0])
            {var acc$1=_bv_[1];
             output_acc(o,_bw_);
             caml_call2(Pervasives[54],o,cst$17);
             var acc$0=acc$1;
             continue}
           var acc$2=_bv_[1];
           output_acc(o,_bw_);
           caml_call2(Pervasives[54],o,cst$18);
           var acc$0=acc$2;
           continue;
          case 6:
           var f=acc$0[2],p$2=acc$0[1];
           output_acc(o,p$2);
           return caml_call1(f,o);
          case 7:
           var p$3=acc$0[1];
           output_acc(o,p$3);
           return caml_call1(Pervasives[51],o);
          case 8:
           var msg=acc$0[2],p$4=acc$0[1];
           output_acc(o,p$4);
           return caml_call1(Pervasives[1],msg);
          case 2:
          case 4:
           var s$0=acc$0[2],p$0=acc$0[1];
           output_acc(o,p$0);
           return caml_call2(Pervasives[54],o,s$0);
          default:
           var c=acc$0[2],p$1=acc$0[1];
           output_acc(o,p$1);
           return caml_call2(Pervasives[53],o,c)}}
    function bufput_acc(b,acc)
     {var acc$0=acc;
      for(;;)
       if(typeof acc$0 === "number")
        return 0;
       else
        switch(acc$0[0])
         {case 0:
           var
            fmting_lit=acc$0[2],
            p=acc$0[1],
            s=string_of_formatting_lit(fmting_lit);
           bufput_acc(b,p);
           return caml_call2(Buffer[14],b,s);
          case 1:
           var _bt_=acc$0[2],_bu_=acc$0[1];
           if(0 === _bt_[0])
            {var acc$1=_bt_[1];
             bufput_acc(b,_bu_);
             caml_call2(Buffer[14],b,cst$19);
             var acc$0=acc$1;
             continue}
           var acc$2=_bt_[1];
           bufput_acc(b,_bu_);
           caml_call2(Buffer[14],b,cst$20);
           var acc$0=acc$2;
           continue;
          case 6:
           var f=acc$0[2],p$2=acc$0[1];
           bufput_acc(b,p$2);
           return caml_call1(f,b);
          case 7:var acc$3=acc$0[1],acc$0=acc$3;continue;
          case 8:
           var msg=acc$0[2],p$3=acc$0[1];
           bufput_acc(b,p$3);
           return caml_call1(Pervasives[1],msg);
          case 2:
          case 4:
           var s$0=acc$0[2],p$0=acc$0[1];
           bufput_acc(b,p$0);
           return caml_call2(Buffer[14],b,s$0);
          default:
           var c=acc$0[2],p$1=acc$0[1];
           bufput_acc(b,p$1);
           return caml_call2(Buffer[10],b,c)}}
    function strput_acc(b,acc)
     {var acc$0=acc;
      for(;;)
       if(typeof acc$0 === "number")
        return 0;
       else
        switch(acc$0[0])
         {case 0:
           var
            fmting_lit=acc$0[2],
            p=acc$0[1],
            s=string_of_formatting_lit(fmting_lit);
           strput_acc(b,p);
           return caml_call2(Buffer[14],b,s);
          case 1:
           var _bq_=acc$0[2],_br_=acc$0[1];
           if(0 === _bq_[0])
            {var acc$1=_bq_[1];
             strput_acc(b,_br_);
             caml_call2(Buffer[14],b,cst$21);
             var acc$0=acc$1;
             continue}
           var acc$2=_bq_[1];
           strput_acc(b,_br_);
           caml_call2(Buffer[14],b,cst$22);
           var acc$0=acc$2;
           continue;
          case 6:
           var f=acc$0[2],p$2=acc$0[1];
           strput_acc(b,p$2);
           var _bs_=caml_call1(f,0);
           return caml_call2(Buffer[14],b,_bs_);
          case 7:var acc$3=acc$0[1],acc$0=acc$3;continue;
          case 8:
           var msg=acc$0[2],p$3=acc$0[1];
           strput_acc(b,p$3);
           return caml_call1(Pervasives[1],msg);
          case 2:
          case 4:
           var s$0=acc$0[2],p$0=acc$0[1];
           strput_acc(b,p$0);
           return caml_call2(Buffer[14],b,s$0);
          default:
           var c=acc$0[2],p$1=acc$0[1];
           strput_acc(b,p$1);
           return caml_call2(Buffer[10],b,c)}}
    function failwith_message(param)
     {var fmt=param[1],buf=caml_call1(Buffer[1],256);
      function k(param,acc)
       {strput_acc(buf,acc);
        var _bp_=caml_call1(Buffer[2],buf);
        return caml_call1(Pervasives[2],_bp_)}
      return make_printf(k,0,0,fmt)}
    function open_box_of_string(str)
     {if(runtime.caml_string_equal(str,cst$23))return _v_;
      var len=caml_ml_string_length(str);
      function invalid_box(param)
       {return caml_call1(failwith_message(_w_),str)}
      function parse_spaces(i)
       {var i$0=i;
        for(;;)
         {if(i$0 === len)return i$0;
          var match=caml_string_get(str,i$0);
          if(9 !== match)if(32 !== match)return i$0;
          var i$1=i$0 + 1 | 0,i$0=i$1;
          continue}}
      function parse_lword(i,j)
       {var j$0=j;
        for(;;)
         {if(j$0 === len)return j$0;
          var match=caml_string_get(str,j$0),switcher=match - 97 | 0;
          if(25 < switcher >>> 0)return j$0;
          var j$1=j$0 + 1 | 0,j$0=j$1;
          continue}}
      function parse_int(i,j)
       {var j$0=j;
        for(;;)
         {if(j$0 === len)return j$0;
          var
           match=caml_string_get(str,j$0),
           switch$0=48 <= match?58 <= match?0:1:45 === match?1:0;
          if(switch$0){var j$1=j$0 + 1 | 0,j$0=j$1;continue}
          return j$0}}
      var
       wstart=parse_spaces(0),
       wend=parse_lword(wstart,wstart),
       box_name=caml_call3(String[4],str,wstart,wend - wstart | 0),
       nstart=parse_spaces(wend),
       nend=parse_int(nstart,nstart);
      if(nstart === nend)
       var indent=0;
      else
       try
        {var
          _bn_=
           runtime.caml_int_of_string
            (caml_call3(String[4],str,nstart,nend - nstart | 0)),
          indent=_bn_}
       catch(_bo_)
        {_bo_ = caml_wrap_exception(_bo_);
         if(_bo_[1] !== Failure)throw _bo_;
         var _bm_=invalid_box(0),indent=_bm_}
      var exp_end=parse_spaces(nend);
      if(exp_end !== len)invalid_box(0);
      if(caml_string_notequal(box_name,cst$24))
       if(caml_string_notequal(box_name,cst_b))
        if(caml_string_notequal(box_name,cst_h))
         if(caml_string_notequal(box_name,cst_hov))
          if(caml_string_notequal(box_name,cst_hv))
           if(caml_string_notequal(box_name,cst_v))
            var box_type=invalid_box(0),switch$0=1;
           else
            var box_type=1,switch$0=1;
          else
           var box_type=2,switch$0=1;
         else
          var box_type=3,switch$0=1;
        else
         var box_type=0,switch$0=1;
       else
        var switch$0=0;
      else
       var switch$0=0;
      if(! switch$0)var box_type=4;
      return [0,indent,box_type]}
    function make_padding_fmt_ebb(pad,fmt)
     {if(typeof pad === "number")
       return [0,0,fmt];
      else
       {if(0 === pad[0]){var w=pad[2],s=pad[1];return [0,[0,s,w],fmt]}
        var s$0=pad[1];
        return [0,[1,s$0],fmt]}}
    function make_precision_fmt_ebb(prec,fmt)
     {if(typeof prec === "number")return 0 === prec?[0,0,fmt]:[0,1,fmt];
      var p=prec[1];
      return [0,[0,p],fmt]}
    function make_padprec_fmt_ebb(pad,prec,fmt)
     {var
       match=make_precision_fmt_ebb(prec,fmt),
       fmt$0=match[2],
       prec$0=match[1];
      if(typeof pad === "number")
       return [0,0,prec$0,fmt$0];
      else
       {if(0 === pad[0])
         {var w=pad[2],s=pad[1];return [0,[0,s,w],prec$0,fmt$0]}
        var s$0=pad[1];
        return [0,[1,s$0],prec$0,fmt$0]}}
    function fmt_ebb_of_string(legacy_behavior,str)
     {if(legacy_behavior)
       var flag=legacy_behavior[1],legacy_behavior$0=flag;
      else
       var legacy_behavior$0=1;
      function invalid_format_message(str_ind,msg)
       {return caml_call3(failwith_message(_x_),str,str_ind,msg)}
      function unexpected_end_of_format(end_ind)
       {return invalid_format_message(end_ind,cst_unexpected_end_of_format)}
      function invalid_nonnull_char_width(str_ind)
       {return invalid_format_message
                (str_ind,
                 cst_non_zero_widths_are_unsupported_for_c_conversions)}
      function invalid_format_without(str_ind,c,s)
       {return caml_call4(failwith_message(_y_),str,str_ind,c,s)}
      function expected_character(str_ind,expected,read)
       {return caml_call4(failwith_message(_z_),str,str_ind,expected,read)}
      function add_literal(lit_start,str_ind,fmt)
       {var size=str_ind - lit_start | 0;
        return 0 === size
                ?[0,fmt]
                :1 === size
                  ?[0,[12,caml_string_get(str,lit_start),fmt]]
                  :[0,[11,caml_call3(String[4],str,lit_start,size),fmt]]}
      function parse_literal(lit_start,str_ind,end_ind)
       {var str_ind$0=str_ind;
        for(;;)
         {if(str_ind$0 === end_ind)return add_literal(lit_start,str_ind$0,0);
          var match=caml_string_get(str,str_ind$0);
          if(37 === match)
           {var match$0=parse_format(str_ind$0,end_ind),fmt_rest=match$0[1];
            return add_literal(lit_start,str_ind$0,fmt_rest)}
          if(64 === match)
           {var
             match$1=parse_after_at(str_ind$0 + 1 | 0,end_ind),
             fmt_rest$0=match$1[1];
            return add_literal(lit_start,str_ind$0,fmt_rest$0)}
          var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1;
          continue}}
      function parse(beg_ind,end_ind)
       {return parse_literal(beg_ind,beg_ind,end_ind)}
      function parse_flags(pct_ind,str_ind,end_ind,ign)
       {var zero=[0,0],minus=[0,0],plus=[0,0],space=[0,0],hash=[0,0];
        function set_flag(str_ind,flag)
         {var _bj_=flag[1],_bk_=_bj_?1 - legacy_behavior$0:_bj_;
          if(_bk_)
           {var _bl_=caml_string_get(str,str_ind);
            caml_call3(failwith_message(_A_),str,str_ind,_bl_)}
          flag[1] = 1;
          return 0}
        function read_flags(str_ind)
         {var str_ind$0=str_ind;
          for(;;)
           {if(str_ind$0 === end_ind)unexpected_end_of_format(end_ind);
            var match=caml_string_get(str,str_ind$0),switcher=match - 32 | 0;
            if(! (16 < switcher >>> 0))
             switch(switcher)
              {case 0:
                set_flag(str_ind$0,space);
                var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1;
                continue;
               case 3:
                set_flag(str_ind$0,hash);
                var str_ind$2=str_ind$0 + 1 | 0,str_ind$0=str_ind$2;
                continue;
               case 11:
                set_flag(str_ind$0,plus);
                var str_ind$3=str_ind$0 + 1 | 0,str_ind$0=str_ind$3;
                continue;
               case 13:
                set_flag(str_ind$0,minus);
                var str_ind$4=str_ind$0 + 1 | 0,str_ind$0=str_ind$4;
                continue;
               case 16:
                set_flag(str_ind$0,zero);
                var str_ind$5=str_ind$0 + 1 | 0,str_ind$0=str_ind$5;
                continue
               }
            return parse_padding
                    (pct_ind,
                     str_ind$0,
                     end_ind,
                     zero[1],
                     minus[1],
                     plus[1],
                     hash[1],
                     space[1],
                     ign)}}
        return read_flags(str_ind)}
      function parse_ign(pct_ind,str_ind,end_ind)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var match=caml_string_get(str,str_ind);
        return 95 === match
                ?parse_flags(pct_ind,str_ind + 1 | 0,end_ind,1)
                :parse_flags(pct_ind,str_ind,end_ind,0)}
      function parse_format(pct_ind,end_ind)
       {return parse_ign(pct_ind,pct_ind + 1 | 0,end_ind)}
      function parse_conversion
       (pct_ind,str_ind,end_ind,plus,hash,space,ign,pad,prec,padprec,symb)
       {var
         plus_used=[0,0],
         hash_used=[0,0],
         space_used=[0,0],
         ign_used=[0,0],
         pad_used=[0,0],
         prec_used=[0,0];
        function get_plus(param){plus_used[1] = 1;return plus}
        function get_hash(param){hash_used[1] = 1;return hash}
        function get_space(param){space_used[1] = 1;return space}
        function get_ign(param){ign_used[1] = 1;return ign}
        function get_pad(param){pad_used[1] = 1;return pad}
        function get_prec(param){prec_used[1] = 1;return prec}
        function get_padprec(param){pad_used[1] = 1;return padprec}
        function get_int_pad(param)
         {var pad=get_pad(0),match=get_prec(0);
          if(typeof match === "number")if(0 === match)return pad;
          if(typeof pad === "number")
           return 0;
          else
           {if(0 === pad[0])
             {if(2 <= pad[1])
               {var n=pad[2];
                return legacy_behavior$0
                        ?[0,1,n]
                        :incompatible_flag(pct_ind,str_ind,48,cst_precision$0)}
              return pad}
            return 2 <= pad[1]
                    ?legacy_behavior$0
                      ?_F_
                      :incompatible_flag(pct_ind,str_ind,48,cst_precision$1)
                    :pad}}
        function check_no_0(symb,pad)
         {if(typeof pad === "number")
           return pad;
          else
           {if(0 === pad[0])
             {if(2 <= pad[1])
               {var width=pad[2];
                return legacy_behavior$0
                        ?[0,1,width]
                        :incompatible_flag(pct_ind,str_ind,symb,cst_0$0)}
              return pad}
            return 2 <= pad[1]
                    ?legacy_behavior$0
                      ?_G_
                      :incompatible_flag(pct_ind,str_ind,symb,cst_0$1)
                    :pad}}
        function opt_of_pad(c,pad)
         {if(typeof pad === "number")
           return 0;
          else
           {if(0 === pad[0])
             switch(pad[1])
              {case 0:
                var width=pad[2];
                return legacy_behavior$0
                        ?[0,width]
                        :incompatible_flag(pct_ind,str_ind,c,cst$25);
               case 1:var width$0=pad[2];return [0,width$0];
               default:
                var width$1=pad[2];
                return legacy_behavior$0
                        ?[0,width$1]
                        :incompatible_flag(pct_ind,str_ind,c,cst_0$2)}
            return incompatible_flag(pct_ind,str_ind,c,cst$26)}}
        function get_pad_opt(c){return opt_of_pad(c,get_pad(0))}
        function get_padprec_opt(c){return opt_of_pad(c,get_padprec(0))}
        function get_prec_opt(param)
         {var match=get_prec(0);
          if(typeof match === "number")
           return 0 === match?0:incompatible_flag(pct_ind,str_ind,95,cst$27);
          var ndec=match[1];
          return [0,ndec]}
        if(124 <= symb)
         var switch$0=0;
        else
         switch(symb)
          {case 33:
            var
             match$5=parse(str_ind,end_ind),
             fmt_rest$5=match$5[1],
             fmt_result=[0,[10,fmt_rest$5]],
             switch$0=1;
            break;
           case 40:
            var
             sub_end=search_subformat_end(str_ind,end_ind,41),
             match$7=parse(sub_end + 2 | 0,end_ind),
             fmt_rest$7=match$7[1],
             match$8=parse(str_ind,sub_end),
             sub_fmt=match$8[1],
             sub_fmtty=fmtty_of_fmt(sub_fmt);
            if(get_ign(0))
             var
              ignored$2=[9,get_pad_opt(95),sub_fmtty],
              _a1_=[0,[23,ignored$2,fmt_rest$7]];
            else
             var _a1_=[0,[14,get_pad_opt(40),sub_fmtty,fmt_rest$7]];
            var fmt_result=_a1_,switch$0=1;
            break;
           case 44:var fmt_result=parse(str_ind,end_ind),switch$0=1;break;
           case 67:
            var
             match$11=parse(str_ind,end_ind),
             fmt_rest$10=match$11[1],
             _a3_=get_ign(0)?[0,[23,1,fmt_rest$10]]:[0,[1,fmt_rest$10]],
             fmt_result=_a3_,
             switch$0=1;
            break;
           case 78:
            var
             match$15=parse(str_ind,end_ind),
             fmt_rest$14=match$15[1],
             counter$0=2;
            if(get_ign(0))
             var ignored$6=[11,counter$0],_a9_=[0,[23,ignored$6,fmt_rest$14]];
            else
             var _a9_=[0,[21,counter$0,fmt_rest$14]];
            var fmt_result=_a9_,switch$0=1;
            break;
           case 83:
            var
             pad$6=check_no_0(symb,get_padprec(0)),
             match$16=parse(str_ind,end_ind),
             fmt_rest$15=match$16[1];
            if(get_ign(0))
             var
              ignored$7=[1,get_padprec_opt(95)],
              _a__=[0,[23,ignored$7,fmt_rest$15]];
            else
             var
              match$17=make_padding_fmt_ebb(pad$6,fmt_rest$15),
              fmt_rest$16=match$17[2],
              pad$7=match$17[1],
              _a__=[0,[3,pad$7,fmt_rest$16]];
            var fmt_result=_a__,switch$0=1;
            break;
           case 91:
            var
             match$20=parse_char_set(str_ind,end_ind),
             char_set=match$20[2],
             next_ind=match$20[1],
             match$21=parse(next_ind,end_ind),
             fmt_rest$19=match$21[1];
            if(get_ign(0))
             var
              ignored$9=[10,get_pad_opt(95),char_set],
              _bd_=[0,[23,ignored$9,fmt_rest$19]];
            else
             var _bd_=[0,[20,get_pad_opt(91),char_set,fmt_rest$19]];
            var fmt_result=_bd_,switch$0=1;
            break;
           case 97:
            var
             match$22=parse(str_ind,end_ind),
             fmt_rest$20=match$22[1],
             fmt_result=[0,[15,fmt_rest$20]],
             switch$0=1;
            break;
           case 99:
            var
             char_format=
              function(fmt_rest)
               {return get_ign(0)?[0,[23,0,fmt_rest]]:[0,[0,fmt_rest]]},
             scan_format=
              function(fmt_rest)
               {return get_ign(0)?[0,[23,3,fmt_rest]]:[0,[22,fmt_rest]]},
             match$23=parse(str_ind,end_ind),
             fmt_rest$21=match$23[1],
             match$24=get_pad_opt(99);
            if(match$24)
             var
              _be_=
               0 === match$24[1]
                ?scan_format(fmt_rest$21)
                :legacy_behavior$0
                  ?char_format(fmt_rest$21)
                  :invalid_nonnull_char_width(str_ind),
              _bf_=_be_;
            else
             var _bf_=char_format(fmt_rest$21);
            var fmt_result=_bf_,switch$0=1;
            break;
           case 114:
            var
             match$25=parse(str_ind,end_ind),
             fmt_rest$22=match$25[1],
             _bg_=get_ign(0)?[0,[23,2,fmt_rest$22]]:[0,[19,fmt_rest$22]],
             fmt_result=_bg_,
             switch$0=1;
            break;
           case 115:
            var
             pad$9=check_no_0(symb,get_padprec(0)),
             match$26=parse(str_ind,end_ind),
             fmt_rest$23=match$26[1];
            if(get_ign(0))
             var
              ignored$10=[0,get_padprec_opt(95)],
              _bh_=[0,[23,ignored$10,fmt_rest$23]];
            else
             var
              match$27=make_padding_fmt_ebb(pad$9,fmt_rest$23),
              fmt_rest$24=match$27[2],
              pad$10=match$27[1],
              _bh_=[0,[2,pad$10,fmt_rest$24]];
            var fmt_result=_bh_,switch$0=1;
            break;
           case 116:
            var
             match$28=parse(str_ind,end_ind),
             fmt_rest$25=match$28[1],
             fmt_result=[0,[16,fmt_rest$25]],
             switch$0=1;
            break;
           case 123:
            var
             sub_end$0=search_subformat_end(str_ind,end_ind,125),
             match$29=parse(str_ind,sub_end$0),
             sub_fmt$0=match$29[1],
             match$30=parse(sub_end$0 + 2 | 0,end_ind),
             fmt_rest$26=match$30[1],
             sub_fmtty$0=fmtty_of_fmt(sub_fmt$0);
            if(get_ign(0))
             var
              ignored$11=[8,get_pad_opt(95),sub_fmtty$0],
              _bi_=[0,[23,ignored$11,fmt_rest$26]];
            else
             var _bi_=[0,[13,get_pad_opt(123),sub_fmtty$0,fmt_rest$26]];
            var fmt_result=_bi_,switch$0=1;
            break;
           case 66:
           case 98:
            var
             pad$3=check_no_0(symb,get_padprec(0)),
             match$9=parse(str_ind,end_ind),
             fmt_rest$8=match$9[1];
            if(get_ign(0))
             var
              ignored$3=[7,get_padprec_opt(95)],
              _a2_=[0,[23,ignored$3,fmt_rest$8]];
            else
             var
              match$10=make_padding_fmt_ebb(pad$3,fmt_rest$8),
              fmt_rest$9=match$10[2],
              pad$4=match$10[1],
              _a2_=[0,[9,pad$4,fmt_rest$9]];
            var fmt_result=_a2_,switch$0=1;
            break;
           case 37:
           case 64:
            var
             match$6=parse(str_ind,end_ind),
             fmt_rest$6=match$6[1],
             fmt_result=[0,[12,symb,fmt_rest$6]],
             switch$0=1;
            break;
           case 76:
           case 108:
           case 110:
            if(str_ind === end_ind)
             var switch$1=1;
            else
             if(is_int_base(caml_string_get(str,str_ind)))
              var switch$0=0,switch$1=0;
             else
              var switch$1=1;
            if(switch$1)
             {var
               match$14=parse(str_ind,end_ind),
               fmt_rest$13=match$14[1],
               counter=counter_of_char(symb);
              if(get_ign(0))
               var ignored$5=[11,counter],_a8_=[0,[23,ignored$5,fmt_rest$13]];
              else
               var _a8_=[0,[21,counter,fmt_rest$13]];
              var fmt_result=_a8_,switch$0=1}
            break;
           case 32:
           case 35:
           case 43:
           case 45:
           case 95:
            var
             fmt_result=caml_call3(failwith_message(_K_),str,pct_ind,symb),
             switch$0=1;
            break;
           case 88:
           case 100:
           case 105:
           case 111:
           case 117:
           case 120:
            var
             _a$_=get_space(0),
             _ba_=get_hash(0),
             iconv$2=
              compute_int_conv(pct_ind,str_ind,get_plus(0),_ba_,_a$_,symb),
             match$18=parse(str_ind,end_ind),
             fmt_rest$17=match$18[1];
            if(get_ign(0))
             var
              ignored$8=[2,iconv$2,get_pad_opt(95)],
              _bb_=[0,[23,ignored$8,fmt_rest$17]];
            else
             var
              _bc_=get_prec(0),
              match$19=make_padprec_fmt_ebb(get_int_pad(0),_bc_,fmt_rest$17),
              fmt_rest$18=match$19[3],
              prec$4=match$19[2],
              pad$8=match$19[1],
              _bb_=[0,[4,iconv$2,pad$8,prec$4,fmt_rest$18]];
            var fmt_result=_bb_,switch$0=1;
            break;
           case 69:
           case 70:
           case 71:
           case 72:
           case 101:
           case 102:
           case 103:
           case 104:
            var
             _a4_=get_space(0),
             fconv=compute_float_conv(pct_ind,str_ind,get_plus(0),_a4_,symb),
             match$12=parse(str_ind,end_ind),
             fmt_rest$11=match$12[1];
            if(get_ign(0))
             var
              _a5_=get_prec_opt(0),
              ignored$4=[6,get_pad_opt(95),_a5_],
              _a6_=[0,[23,ignored$4,fmt_rest$11]];
            else
             var
              _a7_=get_prec(0),
              match$13=make_padprec_fmt_ebb(get_pad(0),_a7_,fmt_rest$11),
              fmt_rest$12=match$13[3],
              prec$3=match$13[2],
              pad$5=match$13[1],
              _a6_=[0,[8,fconv,pad$5,prec$3,fmt_rest$12]];
            var fmt_result=_a6_,switch$0=1;
            break;
           default:var switch$0=0}
        if(! switch$0)
         {if(108 <= symb)
           if(111 <= symb)
            var switch$2=0;
           else
            {var switcher=symb - 108 | 0;
             switch(switcher)
              {case 0:
                var
                 _aL_=caml_string_get(str,str_ind),
                 _aM_=get_space(0),
                 _aN_=get_hash(0),
                 iconv=
                  compute_int_conv
                   (pct_ind,str_ind + 1 | 0,get_plus(0),_aN_,_aM_,_aL_),
                 match=parse(str_ind + 1 | 0,end_ind),
                 fmt_rest=match[1];
                if(get_ign(0))
                 var
                  ignored=[3,iconv,get_pad_opt(95)],
                  _aO_=[0,[23,ignored,fmt_rest]];
                else
                 var
                  _aQ_=get_prec(0),
                  match$0=make_padprec_fmt_ebb(get_int_pad(0),_aQ_,fmt_rest),
                  fmt_rest$0=match$0[3],
                  prec$0=match$0[2],
                  pad$0=match$0[1],
                  _aO_=[0,[5,iconv,pad$0,prec$0,fmt_rest$0]];
                var _aP_=_aO_,switch$3=1;
                break;
               case 1:var switch$2=0,switch$3=0;break;
               default:
                var
                 _aR_=caml_string_get(str,str_ind),
                 _aS_=get_space(0),
                 _aT_=get_hash(0),
                 iconv$0=
                  compute_int_conv
                   (pct_ind,str_ind + 1 | 0,get_plus(0),_aT_,_aS_,_aR_),
                 match$1=parse(str_ind + 1 | 0,end_ind),
                 fmt_rest$1=match$1[1];
                if(get_ign(0))
                 var
                  ignored$0=[4,iconv$0,get_pad_opt(95)],
                  _aU_=[0,[23,ignored$0,fmt_rest$1]];
                else
                 var
                  _aV_=get_prec(0),
                  match$2=make_padprec_fmt_ebb(get_int_pad(0),_aV_,fmt_rest$1),
                  fmt_rest$2=match$2[3],
                  prec$1=match$2[2],
                  pad$1=match$2[1],
                  _aU_=[0,[6,iconv$0,pad$1,prec$1,fmt_rest$2]];
                var _aP_=_aU_,switch$3=1}
             if(switch$3)var fmt_result=_aP_,switch$2=1}
          else
           if(76 === symb)
            {var
              _aW_=caml_string_get(str,str_ind),
              _aX_=get_space(0),
              _aY_=get_hash(0),
              iconv$1=
               compute_int_conv
                (pct_ind,str_ind + 1 | 0,get_plus(0),_aY_,_aX_,_aW_),
              match$3=parse(str_ind + 1 | 0,end_ind),
              fmt_rest$3=match$3[1];
             if(get_ign(0))
              var
               ignored$1=[5,iconv$1,get_pad_opt(95)],
               _aZ_=[0,[23,ignored$1,fmt_rest$3]];
             else
              var
               _a0_=get_prec(0),
               match$4=make_padprec_fmt_ebb(get_int_pad(0),_a0_,fmt_rest$3),
               fmt_rest$4=match$4[3],
               prec$2=match$4[2],
               pad$2=match$4[1],
               _aZ_=[0,[7,iconv$1,pad$2,prec$2,fmt_rest$4]];
             var fmt_result=_aZ_,switch$2=1}
           else
            var switch$2=0;
          if(! switch$2)
           var
            fmt_result=
             caml_call3(failwith_message(_H_),str,str_ind - 1 | 0,symb)}
        if(1 - legacy_behavior$0)
         {var _aC_=1 - plus_used[1],plus$0=_aC_?plus:_aC_;
          if(plus$0)incompatible_flag(pct_ind,str_ind,symb,cst$28);
          var _aD_=1 - hash_used[1],hash$0=_aD_?hash:_aD_;
          if(hash$0)incompatible_flag(pct_ind,str_ind,symb,cst$29);
          var _aE_=1 - space_used[1],space$0=_aE_?space:_aE_;
          if(space$0)incompatible_flag(pct_ind,str_ind,symb,cst$30);
          var _aF_=1 - pad_used[1],_aG_=_aF_?caml_notequal([0,pad],_I_):_aF_;
          if(_aG_)incompatible_flag(pct_ind,str_ind,symb,cst_padding$0);
          var
           _aH_=1 - prec_used[1],
           _aI_=_aH_?caml_notequal([0,prec],_J_):_aH_;
          if(_aI_)
           {var _aJ_=ign?95:symb;
            incompatible_flag(pct_ind,str_ind,_aJ_,cst_precision$2)}
          var plus$1=ign?plus:ign;
          if(plus$1)incompatible_flag(pct_ind,str_ind,95,cst$31)}
        var _aK_=1 - ign_used[1],ign$0=_aK_?ign:_aK_;
        if(ign$0)
         {var
           switch$4=
            38 <= symb
             ?44 === symb?0:64 === symb?0:1
             :33 === symb?0:37 <= symb?0:1,
           switch$5=switch$4?0:legacy_behavior$0?1:0;
          if(! switch$5)incompatible_flag(pct_ind,str_ind,symb,cst$32)}
        return fmt_result}
      function parse_after_precision
       (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,pad,match)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        function parse_conv(padprec)
         {return parse_conversion
                  (pct_ind,
                   str_ind + 1 | 0,
                   end_ind,
                   plus,
                   hash,
                   space,
                   ign,
                   pad,
                   match,
                   padprec,
                   caml_string_get(str,str_ind))}
        if(typeof pad === "number")
         {if(typeof match === "number")if(0 === match)return parse_conv(0);
          if(0 === minus)
           {if(typeof match === "number")return parse_conv(_D_);
            var n=match[1];
            return parse_conv([0,1,n])}
          if(typeof match === "number")return parse_conv(_E_);
          var n$0=match[1];
          return parse_conv([0,0,n$0])}
        return parse_conv(pad)}
      function parse_precision
       (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,pad)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        function parse_literal(minus,str_ind)
         {var
           match=parse_positive(str_ind,end_ind,0),
           prec=match[2],
           new_ind=match[1];
          return parse_after_precision
                  (pct_ind,
                   new_ind,
                   end_ind,
                   minus,
                   plus,
                   hash,
                   space,
                   ign,
                   pad,
                   [0,prec])}
        var symb=caml_string_get(str,str_ind);
        if(48 <= symb)
         {if(! (58 <= symb))return parse_literal(minus,str_ind)}
        else
         if(42 <= symb)
          {var switcher=symb - 42 | 0;
           switch(switcher)
            {case 0:
              return parse_after_precision
                      (pct_ind,
                       str_ind + 1 | 0,
                       end_ind,
                       minus,
                       plus,
                       hash,
                       space,
                       ign,
                       pad,
                       1);
             case 1:
             case 3:
              if(legacy_behavior$0)
               {var _aB_=str_ind + 1 | 0,minus$0=minus || (45 === symb?1:0);
                return parse_literal(minus$0,_aB_)}
              break
             }}
        return legacy_behavior$0
                ?parse_after_precision
                  (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,pad,_C_)
                :invalid_format_without(str_ind - 1 | 0,46,cst_precision)}
      function parse_after_padding
       (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,pad)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var symb=caml_string_get(str,str_ind);
        return 46 === symb
                ?parse_precision
                  (pct_ind,
                   str_ind + 1 | 0,
                   end_ind,
                   minus,
                   plus,
                   hash,
                   space,
                   ign,
                   pad)
                :parse_conversion
                  (pct_ind,
                   str_ind + 1 | 0,
                   end_ind,
                   plus,
                   hash,
                   space,
                   ign,
                   pad,
                   0,
                   pad,
                   symb)}
      function parse_padding
       (pct_ind,str_ind,end_ind,zero,minus,plus,hash,space,ign)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var
         padty=
          0 === zero
           ?0 === minus?1:0
           :0 === minus
             ?2
             :legacy_behavior$0?0:incompatible_flag(pct_ind,str_ind,45,cst_0),
         match=caml_string_get(str,str_ind);
        if(48 <= match)
         {if(! (58 <= match))
           {var
             match$0=parse_positive(str_ind,end_ind,0),
             width=match$0[2],
             new_ind=match$0[1];
            return parse_after_padding
                    (pct_ind,
                     new_ind,
                     end_ind,
                     minus,
                     plus,
                     hash,
                     space,
                     ign,
                     [0,padty,width])}}
        else
         if(42 === match)
          return parse_after_padding
                  (pct_ind,
                   str_ind + 1 | 0,
                   end_ind,
                   minus,
                   plus,
                   hash,
                   space,
                   ign,
                   [1,padty]);
        switch(padty)
         {case 0:
           if(1 - legacy_behavior$0)
            invalid_format_without(str_ind - 1 | 0,45,cst_padding);
           return parse_after_padding
                   (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,0);
          case 1:
           return parse_after_padding
                   (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,0);
          default:
           return parse_after_padding
                   (pct_ind,str_ind,end_ind,minus,plus,hash,space,ign,_B_)}}
      function parse_magic_size(str_ind,end_ind)
       {try
         {var
           str_ind_1=parse_spaces(str_ind,end_ind),
           match$2=caml_string_get(str,str_ind_1),
           switch$0=48 <= match$2?58 <= match$2?0:1:45 === match$2?1:0;
          if(switch$0)
           {var
             match$3=parse_integer(str_ind_1,end_ind),
             size=match$3[2],
             str_ind_2=match$3[1],
             str_ind_3=parse_spaces(str_ind_2,end_ind);
            if(62 !== caml_string_get(str,str_ind_3))throw Not_found;
            var
             s=
              caml_call3
               (String[4],
                str,
                str_ind - 2 | 0,
                (str_ind_3 - str_ind | 0) + 3 | 0),
             _az_=[0,[0,str_ind_3 + 1 | 0,[1,s,size]]]}
          else
           var _az_=0;
          var _ay_=_az_}
        catch(_aA_)
         {_aA_ = caml_wrap_exception(_aA_);
          if(_aA_ !== Not_found)if(_aA_[1] !== Failure)throw _aA_;
          var _ax_=0,_ay_=_ax_}
        if(_ay_)
         {var
           match=_ay_[1],
           formatting_lit=match[2],
           next_ind=match[1],
           match$0=parse(next_ind,end_ind),
           fmt_rest=match$0[1];
          return [0,[17,formatting_lit,fmt_rest]]}
        var match$1=parse(str_ind,end_ind),fmt_rest$0=match$1[1];
        return [0,[17,_O_,fmt_rest$0]]}
      function parse_good_break(str_ind,end_ind)
       {try
         {var
           _aq_=str_ind === end_ind?1:0,
           _ar_=_aq_ || (60 !== caml_string_get(str,str_ind)?1:0);
          if(_ar_)throw Not_found;
          var
           str_ind_1=parse_spaces(str_ind + 1 | 0,end_ind),
           match$0=caml_string_get(str,str_ind_1),
           switch$0=48 <= match$0?58 <= match$0?0:1:45 === match$0?1:0;
          if(! switch$0)throw Not_found;
          var
           match$1=parse_integer(str_ind_1,end_ind),
           width=match$1[2],
           str_ind_2=match$1[1],
           str_ind_3=parse_spaces(str_ind_2,end_ind),
           match$2=caml_string_get(str,str_ind_3),
           switcher=match$2 - 45 | 0;
          if(12 < switcher >>> 0)
           if(17 === switcher)
            var
             s=
              caml_call3
               (String[4],
                str,
                str_ind - 2 | 0,
                (str_ind_3 - str_ind | 0) + 3 | 0),
             _as_=[0,s,width,0],
             _at_=str_ind_3 + 1 | 0,
             next_ind=_at_,
             formatting_lit$0=_as_,
             switch$1=1;
           else
            var switch$1=0;
          else
           {var switcher$0=switcher - 1 | 0;
            if(1 < switcher$0 >>> 0)
             {var
               match$3=parse_integer(str_ind_3,end_ind),
               offset=match$3[2],
               str_ind_4=match$3[1],
               str_ind_5=parse_spaces(str_ind_4,end_ind);
              if(62 !== caml_string_get(str,str_ind_5))throw Not_found;
              var
               s$0=
                caml_call3
                 (String[4],
                  str,
                  str_ind - 2 | 0,
                  (str_ind_5 - str_ind | 0) + 3 | 0),
               _au_=[0,s$0,width,offset],
               _av_=str_ind_5 + 1 | 0,
               next_ind=_av_,
               formatting_lit$0=_au_,
               switch$1=1}
            else
             var switch$1=0}
          if(! switch$1)throw Not_found}
        catch(_aw_)
         {_aw_ = caml_wrap_exception(_aw_);
          if(_aw_ !== Not_found)if(_aw_[1] !== Failure)throw _aw_;
          var next_ind=str_ind,formatting_lit$0=formatting_lit}
        var match=parse(next_ind,end_ind),fmt_rest=match[1];
        return [0,[17,formatting_lit$0,fmt_rest]]}
      function parse_tag(is_open_tag,str_ind,end_ind)
       {try
         {if(str_ind === end_ind)throw Not_found;
          var match$0=caml_string_get(str,str_ind);
          if(60 === match$0)
           {var ind=caml_call3(String[18],str,str_ind + 1 | 0,62);
            if(end_ind <= ind)throw Not_found;
            var
             sub_str=
              caml_call3(String[4],str,str_ind,(ind - str_ind | 0) + 1 | 0),
             match$1=parse(ind + 1 | 0,end_ind),
             fmt_rest$0=match$1[1],
             match$2=parse(str_ind,ind + 1 | 0),
             sub_fmt=match$2[1],
             sub_format$0=[0,sub_fmt,sub_str],
             formatting$0=
              is_open_tag
               ?[0,sub_format$0]
               :(check_open_box(sub_fmt),[1,sub_format$0]),
             _ao_=[0,[18,formatting$0,fmt_rest$0]];
            return _ao_}
          throw Not_found}
        catch(_ap_)
         {_ap_ = caml_wrap_exception(_ap_);
          if(_ap_ === Not_found)
           {var
             match=parse(str_ind,end_ind),
             fmt_rest=match[1],
             formatting=is_open_tag?[0,sub_format]:[1,sub_format];
            return [0,[18,formatting,fmt_rest]]}
          throw _ap_}}
      function parse_after_at(str_ind,end_ind)
       {if(str_ind === end_ind)return _L_;
        var c=caml_string_get(str,str_ind);
        if(65 <= c)
         {if(94 <= c)
           {var switcher=c - 123 | 0;
            if(! (2 < switcher >>> 0))
             switch(switcher)
              {case 0:return parse_tag(1,str_ind + 1 | 0,end_ind);
               case 1:break;
               default:
                var
                 match$0=parse(str_ind + 1 | 0,end_ind),
                 fmt_rest$0=match$0[1];
                return [0,[17,1,fmt_rest$0]]}}
          else
           if(91 <= c)
            {var switcher$0=c - 91 | 0;
             switch(switcher$0)
              {case 0:return parse_tag(0,str_ind + 1 | 0,end_ind);
               case 1:break;
               default:
                var
                 match$1=parse(str_ind + 1 | 0,end_ind),
                 fmt_rest$1=match$1[1];
                return [0,[17,0,fmt_rest$1]]}}}
        else
         {if(10 === c)
           {var match$2=parse(str_ind + 1 | 0,end_ind),fmt_rest$2=match$2[1];
            return [0,[17,3,fmt_rest$2]]}
          if(32 <= c)
           {var switcher$1=c - 32 | 0;
            switch(switcher$1)
             {case 0:
               var
                match$3=parse(str_ind + 1 | 0,end_ind),
                fmt_rest$3=match$3[1];
               return [0,[17,_M_,fmt_rest$3]];
              case 5:
               if((str_ind + 1 | 0) < end_ind)
                if(37 === caml_string_get(str,str_ind + 1 | 0))
                 {var
                   match$4=parse(str_ind + 2 | 0,end_ind),
                   fmt_rest$4=match$4[1];
                  return [0,[17,6,fmt_rest$4]]}
               var match$5=parse(str_ind,end_ind),fmt_rest$5=match$5[1];
               return [0,[12,64,fmt_rest$5]];
              case 12:
               var
                match$6=parse(str_ind + 1 | 0,end_ind),
                fmt_rest$6=match$6[1];
               return [0,[17,_N_,fmt_rest$6]];
              case 14:
               var
                match$7=parse(str_ind + 1 | 0,end_ind),
                fmt_rest$7=match$7[1];
               return [0,[17,4,fmt_rest$7]];
              case 27:return parse_good_break(str_ind + 1 | 0,end_ind);
              case 28:return parse_magic_size(str_ind + 1 | 0,end_ind);
              case 31:
               var
                match$8=parse(str_ind + 1 | 0,end_ind),
                fmt_rest$8=match$8[1];
               return [0,[17,2,fmt_rest$8]];
              case 32:
               var
                match$9=parse(str_ind + 1 | 0,end_ind),
                fmt_rest$9=match$9[1];
               return [0,[17,5,fmt_rest$9]]
              }}}
        var match=parse(str_ind + 1 | 0,end_ind),fmt_rest=match[1];
        return [0,[17,[2,c],fmt_rest]]}
      function check_open_box(fmt)
       {if(typeof fmt !== "number" && 11 === fmt[0])
         if(typeof fmt[2] === "number")
          {var str=fmt[1];
           try
            {open_box_of_string(str);var _am_=0;return _am_}
           catch(_an_)
            {_an_ = caml_wrap_exception(_an_);
             if(_an_[1] === Failure)return 0;
             throw _an_}}
        return 0}
      function parse_char_set(str_ind,end_ind)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var char_set=create_char_set(0);
        function add_char(c){return add_in_char_set(char_set,c)}
        function add_range(c$0,c)
         {if(! (c < c$0))
           {var i=c$0;
            for(;;)
             {add_in_char_set(char_set,caml_call1(Pervasives[17],i));
              var _al_=i + 1 | 0;
              if(c !== i){var i=_al_;continue}
              break}}
          return 0}
        function fail_single_percent(str_ind)
         {return caml_call2(failwith_message(_P_),str,str_ind)}
        function parse_char_set_content(counter,str_ind,end_ind)
         {var str_ind$0=str_ind;
          for(;;)
           {if(str_ind$0 === end_ind)unexpected_end_of_format(end_ind);
            var c=caml_string_get(str,str_ind$0);
            if(45 === c)
             {add_char(45);
              var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1;
              continue}
            if(93 === c)return str_ind$0 + 1 | 0;
            var _ak_=str_ind$0 + 1 | 0;
            if(counter < 50)
             {var counter$0=counter + 1 | 0;
              return parse_char_set_after_char$0(counter$0,_ak_,end_ind,c)}
            return caml_trampoline_return
                    (parse_char_set_after_char$0,[0,_ak_,end_ind,c])}}
        function parse_char_set_after_char$0(counter,str_ind,end_ind,c)
         {var str_ind$0=str_ind,c$0=c;
          for(;;)
           {if(str_ind$0 === end_ind)unexpected_end_of_format(end_ind);
            var c$1=caml_string_get(str,str_ind$0);
            if(46 <= c$1)
             if(64 === c$1)
              var switch$0=0;
             else
              {if(93 === c$1){add_char(c$0);return str_ind$0 + 1 | 0}
               var switch$0=1}
            else
             if(37 === c$1)
              var switch$0=0;
             else
              {if(45 <= c$1)
                {var _aj_=str_ind$0 + 1 | 0;
                 if(counter < 50)
                  {var counter$0=counter + 1 | 0;
                   return parse_char_set_after_minus
                           (counter$0,_aj_,end_ind,c$0)}
                 return caml_trampoline_return
                         (parse_char_set_after_minus,[0,_aj_,end_ind,c$0])}
               var switch$0=1}
            if(! switch$0)
             if(37 === c$0)
              {add_char(c$1);
               var _ai_=str_ind$0 + 1 | 0;
               if(counter < 50)
                {var counter$1=counter + 1 | 0;
                 return parse_char_set_content(counter$1,_ai_,end_ind)}
               return caml_trampoline_return
                       (parse_char_set_content,[0,_ai_,end_ind])}
            if(37 === c$0)fail_single_percent(str_ind$0);
            add_char(c$0);
            var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1,c$0=c$1;
            continue}}
        function parse_char_set_after_minus(counter,str_ind,end_ind,c)
         {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
          var c$0=caml_string_get(str,str_ind);
          if(37 === c$0)
           {if((str_ind + 1 | 0) === end_ind)
             unexpected_end_of_format(end_ind);
            var c$1=caml_string_get(str,str_ind + 1 | 0);
            if(37 !== c$1)if(64 !== c$1)return fail_single_percent(str_ind);
            add_range(c,c$1);
            var _ag_=str_ind + 2 | 0;
            if(counter < 50)
             {var counter$1=counter + 1 | 0;
              return parse_char_set_content(counter$1,_ag_,end_ind)}
            return caml_trampoline_return
                    (parse_char_set_content,[0,_ag_,end_ind])}
          if(93 === c$0){add_char(c);add_char(45);return str_ind + 1 | 0}
          add_range(c,c$0);
          var _ah_=str_ind + 1 | 0;
          if(counter < 50)
           {var counter$0=counter + 1 | 0;
            return parse_char_set_content(counter$0,_ah_,end_ind)}
          return caml_trampoline_return
                  (parse_char_set_content,[0,_ah_,end_ind])}
        function parse_char_set_after_char(str_ind,end_ind,c)
         {return caml_trampoline
                  (parse_char_set_after_char$0(0,str_ind,end_ind,c))}
        function parse_char_set_start(str_ind,end_ind)
         {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
          var c=caml_string_get(str,str_ind);
          return parse_char_set_after_char(str_ind + 1 | 0,end_ind,c)}
        if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var match=caml_string_get(str,str_ind);
        if(94 === match)
         var
          str_ind$0=str_ind + 1 | 0,
          reverse=1,
          str_ind$1=str_ind$0,
          reverse$0=reverse;
        else
         var _af_=0,str_ind$1=str_ind,reverse$0=_af_;
        var
         next_ind=parse_char_set_start(str_ind$1,end_ind),
         char_set$0=freeze_char_set(char_set),
         _ae_=reverse$0?rev_char_set(char_set$0):char_set$0;
        return [0,next_ind,_ae_]}
      function parse_spaces(str_ind,end_ind)
       {var str_ind$0=str_ind;
        for(;;)
         {if(str_ind$0 === end_ind)unexpected_end_of_format(end_ind);
          if(32 === caml_string_get(str,str_ind$0))
           {var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1;continue}
          return str_ind$0}}
      function parse_positive(str_ind,end_ind,acc)
       {var str_ind$0=str_ind,acc$0=acc;
        for(;;)
         {if(str_ind$0 === end_ind)unexpected_end_of_format(end_ind);
          var c=caml_string_get(str,str_ind$0),switcher=c - 48 | 0;
          if(9 < switcher >>> 0)return [0,str_ind$0,acc$0];
          var acc$1=(acc$0 * 10 | 0) + (c - 48 | 0) | 0;
          if(Sys[13] < acc$1)
           {var _ad_=Sys[13];
            return caml_call3(failwith_message(_Q_),str,acc$1,_ad_)}
          var str_ind$1=str_ind$0 + 1 | 0,str_ind$0=str_ind$1,acc$0=acc$1;
          continue}}
      function parse_integer(str_ind,end_ind)
       {if(str_ind === end_ind)unexpected_end_of_format(end_ind);
        var match=caml_string_get(str,str_ind);
        if(48 <= match)
         {if(! (58 <= match))return parse_positive(str_ind,end_ind,0)}
        else
         if(45 === match)
          {if((str_ind + 1 | 0) === end_ind)unexpected_end_of_format(end_ind);
           var c=caml_string_get(str,str_ind + 1 | 0),switcher=c - 48 | 0;
           if(9 < switcher >>> 0)
            return expected_character(str_ind + 1 | 0,cst_digit,c);
           var
            match$0=parse_positive(str_ind + 1 | 0,end_ind,0),
            n=match$0[2],
            next_ind=match$0[1];
           return [0,next_ind,- n | 0]}
        throw [0,Assert_failure,_R_]}
      function search_subformat_end(str_ind,end_ind,c)
       {var str_ind$0=str_ind;
        for(;;)
         {if(str_ind$0 === end_ind)
           caml_call3(failwith_message(_S_),str,c,end_ind);
          var match=caml_string_get(str,str_ind$0);
          if(37 === match)
           {if((str_ind$0 + 1 | 0) === end_ind)
             unexpected_end_of_format(end_ind);
            if(caml_string_get(str,str_ind$0 + 1 | 0) === c)return str_ind$0;
            var match$0=caml_string_get(str,str_ind$0 + 1 | 0);
            if(95 <= match$0)
             {if(123 <= match$0)
               {if(! (126 <= match$0))
                 {var switcher=match$0 - 123 | 0;
                  switch(switcher)
                   {case 0:
                     var
                      sub_end=search_subformat_end(str_ind$0 + 2 | 0,end_ind,125),
                      str_ind$2=sub_end + 2 | 0,
                      str_ind$0=str_ind$2;
                     continue;
                    case 1:break;
                    default:
                     return expected_character
                             (str_ind$0 + 1 | 0,cst_character,125)}}}
              else
               if(! (96 <= match$0))
                {if((str_ind$0 + 2 | 0) === end_ind)
                  unexpected_end_of_format(end_ind);
                 var match$1=caml_string_get(str,str_ind$0 + 2 | 0);
                 if(40 === match$1)
                  {var
                    sub_end$0=search_subformat_end(str_ind$0 + 3 | 0,end_ind,41),
                    str_ind$3=sub_end$0 + 2 | 0,
                    str_ind$0=str_ind$3;
                   continue}
                 if(123 === match$1)
                  {var
                    sub_end$1=
                     search_subformat_end(str_ind$0 + 3 | 0,end_ind,125),
                    str_ind$4=sub_end$1 + 2 | 0,
                    str_ind$0=str_ind$4;
                   continue}
                 var str_ind$5=str_ind$0 + 3 | 0,str_ind$0=str_ind$5;
                 continue}}
            else
             {if(40 === match$0)
               {var
                 sub_end$2=search_subformat_end(str_ind$0 + 2 | 0,end_ind,41),
                 str_ind$6=sub_end$2 + 2 | 0,
                 str_ind$0=str_ind$6;
                continue}
              if(41 === match$0)
               return expected_character(str_ind$0 + 1 | 0,cst_character$0,41)}
            var str_ind$1=str_ind$0 + 2 | 0,str_ind$0=str_ind$1;
            continue}
          var str_ind$7=str_ind$0 + 1 | 0,str_ind$0=str_ind$7;
          continue}}
      function is_int_base(symb)
       {var _ac_=symb - 88 | 0;
        if(! (32 < _ac_ >>> 0))
         switch(_ac_){case 0:case 12:case 17:case 23:case 29:case 32:return 1}
        return 0}
      function counter_of_char(symb)
       {if(108 <= symb)
         {if(! (111 <= symb))
           {var switcher=symb - 108 | 0;
            switch(switcher){case 0:return 0;case 1:break;default:return 1}}}
        else
         if(76 === symb)return 2;
        throw [0,Assert_failure,_T_]}
      function incompatible_flag(pct_ind,str_ind,symb,option)
       {var subfmt=caml_call3(String[4],str,pct_ind,str_ind - pct_ind | 0);
        return caml_call5
                (failwith_message(_W_),str,pct_ind,option,symb,subfmt)}
      function compute_int_conv(pct_ind,str_ind,plus,hash,space,symb)
       {var plus$0=plus,hash$0=hash,space$0=space;
        for(;;)
         {if(0 === plus$0)
           if(0 === hash$0)
            if(0 === space$0)
             {var switcher=symb - 88 | 0;
              if(32 < switcher >>> 0)
               var switch$0=1;
              else
               switch(switcher)
                {case 0:return 8;
                 case 12:return 0;
                 case 17:return 3;
                 case 23:return 10;
                 case 29:return 12;
                 case 32:return 6;
                 default:var switch$0=1}}
            else
             {if(100 === symb)return 2;
              if(105 === symb)return 5;
              var switch$0=1}
           else
            if(0 === space$0)
             {if(88 === symb)return 9;
              if(111 === symb)return 11;
              if(120 === symb)return 7;
              var switch$0=0}
            else
             var switch$0=0;
          else
           if(0 === hash$0)
            if(0 === space$0)
             {if(100 === symb)return 1;
              if(105 === symb)return 4;
              var switch$0=1}
            else
             var switch$0=1;
           else
            var switch$0=0;
          if(! switch$0)
           {var switcher$0=symb - 88 | 0;
            if(! (32 < switcher$0 >>> 0))
             switch(switcher$0)
              {case 0:if(legacy_behavior$0)return 9;break;
               case 23:if(legacy_behavior$0)return 11;break;
               case 32:if(legacy_behavior$0)return 7;break;
               case 12:
               case 17:
               case 29:
                if(legacy_behavior$0){var hash$0=0;continue}
                return incompatible_flag(pct_ind,str_ind,symb,cst$36)
               }}
          if(0 === plus$0)
           {if(0 === space$0)throw [0,Assert_failure,_U_];
            if(legacy_behavior$0){var space$0=0;continue}
            return incompatible_flag(pct_ind,str_ind,symb,cst$33)}
          if(0 === space$0)
           {if(legacy_behavior$0){var plus$0=0;continue}
            return incompatible_flag(pct_ind,str_ind,symb,cst$34)}
          if(legacy_behavior$0){var space$0=0;continue}
          return incompatible_flag(pct_ind,str_ind,32,cst$35)}}
      function compute_float_conv(pct_ind,str_ind,plus,space,symb)
       {var plus$0=plus,space$0=space;
        for(;;)
         {if(0 === plus$0)
           {if(0 === space$0)
             {if(73 <= symb)
               {var switcher=symb - 101 | 0;
                if(! (3 < switcher >>> 0))
                 switch(switcher)
                  {case 0:return 3;
                   case 1:return 0;
                   case 2:return 9;
                   default:return 16}}
              else
               if(69 <= symb)
                {var switcher$0=symb - 69 | 0;
                 switch(switcher$0)
                  {case 0:return 6;
                   case 1:return 15;
                   case 2:return 12;
                   default:return 19}}
              throw [0,Assert_failure,_V_]}
            if(73 <= symb)
             {var switcher$1=symb - 101 | 0;
              if(! (3 < switcher$1 >>> 0))
               switch(switcher$1)
                {case 0:return 5;
                 case 1:return 2;
                 case 2:return 11;
                 default:return 18}}
            else
             if(69 <= symb)
              {var switcher$2=symb - 69 | 0;
               switch(switcher$2)
                {case 0:return 8;
                 case 1:break;
                 case 2:return 14;
                 default:return 21}}
            if(legacy_behavior$0){var space$0=0;continue}
            return incompatible_flag(pct_ind,str_ind,symb,cst$37)}
          if(0 === space$0)
           {if(73 <= symb)
             {var switcher$3=symb - 101 | 0;
              if(! (3 < switcher$3 >>> 0))
               switch(switcher$3)
                {case 0:return 4;
                 case 1:return 1;
                 case 2:return 10;
                 default:return 17}}
            else
             if(69 <= symb)
              {var switcher$4=symb - 69 | 0;
               switch(switcher$4)
                {case 0:return 7;
                 case 1:break;
                 case 2:return 13;
                 default:return 20}}
            if(legacy_behavior$0){var plus$0=0;continue}
            return incompatible_flag(pct_ind,str_ind,symb,cst$38)}
          if(legacy_behavior$0){var space$0=0;continue}
          return incompatible_flag(pct_ind,str_ind,32,cst$39)}}
      return parse(0,caml_ml_string_length(str))}
    function format_of_string_fmtty(str,fmtty)
     {var match=fmt_ebb_of_string(0,str),fmt=match[1];
      try
       {var _aa_=[0,type_format(fmt,fmtty),str];return _aa_}
      catch(_ab_)
       {_ab_ = caml_wrap_exception(_ab_);
        if(_ab_ === Type_mismatch)
         {var _$_=string_of_fmtty(fmtty);
          return caml_call2(failwith_message(_X_),str,_$_)}
        throw _ab_}}
    function format_of_string_format(str,param)
     {var
       str$0=param[2],
       fmt=param[1],
       match=fmt_ebb_of_string(0,str),
       fmt$0=match[1];
      try
       {var _Z_=[0,type_format(fmt$0,fmtty_of_fmt(fmt)),str];return _Z_}
      catch(___)
       {___ = caml_wrap_exception(___);
        if(___ === Type_mismatch)
         return caml_call2(failwith_message(_Y_),str,str$0);
        throw ___}}
    var
     CamlinternalFormat=
      [0,
       is_in_char_set,
       rev_char_set,
       create_char_set,
       add_in_char_set,
       freeze_char_set,
       param_format_of_ignored_format,
       make_printf,
       make_iprintf,
       output_acc,
       bufput_acc,
       strput_acc,
       type_format,
       fmt_ebb_of_string,
       format_of_string_fmtty,
       format_of_string_format,
       char_of_iconv,
       string_of_formatting_lit,
       string_of_formatting_gen,
       string_of_fmtty,
       string_of_fmt,
       open_box_of_string,
       symm,
       trans,
       recast];
    runtime.caml_register_global(198,CamlinternalFormat,"CamlinternalFormat");
    return}
  (function(){return this}()));
