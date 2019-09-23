(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_get=runtime.caml_bytes_get,
     caml_int_of_string=runtime.caml_int_of_string,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
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
    var
     global_data=runtime.caml_get_global_data(),
     cst_end_of_input_not_found=caml_new_string("end of input not found"),
     cst_scanf_bad_conversion_a=caml_new_string('scanf: bad conversion "%a"'),
     cst_scanf_bad_conversion_t=caml_new_string('scanf: bad conversion "%t"'),
     cst_scanf_missing_reader=caml_new_string("scanf: missing reader"),
     cst_scanf_bad_conversion_custom_converter=
      caml_new_string('scanf: bad conversion "%?" (custom converter)'),
     cst_scanf_bad_conversion=caml_new_string('scanf: bad conversion "%*"'),
     cst_scanf_bad_conversion$1=caml_new_string('scanf: bad conversion "%*"'),
     cst_scanf_bad_conversion$0=caml_new_string('scanf: bad conversion "%-"'),
     cst_scanf_bad_conversion$2=caml_new_string('scanf: bad conversion "%*"'),
     cst$2=caml_new_string('"'),
     cst$3=caml_new_string('"'),
     cst$1=caml_new_string('"'),
     cst_in_format=caml_new_string(' in format "'),
     cst_an=caml_new_string("an"),
     cst_x=caml_new_string("x"),
     cst_nfinity=caml_new_string("nfinity"),
     cst_digits=caml_new_string("digits"),
     cst_decimal_digits=caml_new_string("decimal digits"),
     cst_0b=caml_new_string("0b"),
     cst_0o=caml_new_string("0o"),
     cst_0u=caml_new_string("0u"),
     cst_0x=caml_new_string("0x"),
     cst_false=caml_new_string("false"),
     cst_true=caml_new_string("true"),
     cst_not_a_valid_float_in_hexadecimal_notation=
      caml_new_string("not a valid float in hexadecimal notation"),
     cst_no_dot_or_exponent_part_found_in_float_token=
      caml_new_string("no dot or exponent part found in float token"),
     cst$0=caml_new_string("-"),
     cst_unnamed_function=caml_new_string("unnamed function"),
     cst_unnamed_character_string=caml_new_string("unnamed character string"),
     cst_unnamed_Pervasives_input_channel=
      caml_new_string("unnamed Pervasives input channel"),
     cst=caml_new_string("-"),
     cst_Scanf_Scan_failure=caml_new_string("Scanf.Scan_failure"),
     cst_binary=caml_new_string("binary"),
     cst_octal=caml_new_string("octal"),
     cst_hexadecimal=caml_new_string("hexadecimal"),
     cst_a_Char=caml_new_string("a Char"),
     cst_a_String=caml_new_string("a String"),
     CamlinternalFormat=global_data.CamlinternalFormat,
     CamlinternalFormatBasics=global_data.CamlinternalFormatBasics,
     String=global_data.String,
     Failure=global_data.Failure,
     Pervasives=global_data.Pervasives,
     Assert_failure=global_data.Assert_failure,
     Buffer=global_data.Buffer,
     End_of_file=global_data.End_of_file,
     Invalid_argument=global_data.Invalid_argument,
     Printf=global_data.Printf,
     List=global_data.List,
     Not_found=global_data.Not_found,
     _r_=[0,91],
     _q_=[0,123],
     _s_=[0,caml_new_string("scanf.ml"),1455,13],
     _t_=[0,[3,0,[10,0]],caml_new_string("%S%!")],
     _p_=[0,37,caml_new_string("")],
     _o_=
      [0,
       [11,
        caml_new_string("scanf: bad input at char number "),
        [4,3,0,0,[11,caml_new_string(": "),[2,0,0]]]],
       caml_new_string("scanf: bad input at char number %i: %s")],
     _n_=
      [0,
       [11,
        caml_new_string("the character "),
        [1,[11,caml_new_string(" cannot start a boolean"),0]]],
       caml_new_string("the character %C cannot start a boolean")],
     _m_=
      [0,
       [11,caml_new_string("bad character hexadecimal encoding \\"),[0,[0,0]]],
       caml_new_string("bad character hexadecimal encoding \\%c%c")],
     _l_=
      [0,
       [11,caml_new_string("bad character decimal encoding \\"),[0,[0,[0,0]]]],
       caml_new_string("bad character decimal encoding \\%c%c%c")],
     _k_=
      [0,
       [11,
        caml_new_string("character "),
        [1,
         [11,
          caml_new_string(" is not a valid "),
          [2,0,[11,caml_new_string(" digit"),0]]]]],
       caml_new_string("character %C is not a valid %s digit")],
     _j_=
      [0,
       [11,
        caml_new_string("character "),
        [1,[11,caml_new_string(" is not a decimal digit"),0]]],
       caml_new_string("character %C is not a decimal digit")],
     _i_=[0,caml_new_string("scanf.ml"),555,9],
     _h_=
      [0,
       [11,caml_new_string("invalid boolean '"),[2,0,[12,39,0]]],
       caml_new_string("invalid boolean '%s'")],
     _g_=
      [0,
       [11,
        caml_new_string("looking for "),
        [1,[11,caml_new_string(", found "),[1,0]]]],
       caml_new_string("looking for %C, found %C")],
     _f_=
      [0,
       [11,
        caml_new_string("scanning of "),
        [2,
         0,
         [11,
          caml_new_string
           (" failed: premature end of file occurred before end of token"),
          0]]],
       caml_new_string
        ("scanning of %s failed: premature end of file occurred before end of token")],
     _e_=
      [0,
       [11,
        caml_new_string("scanning of "),
        [2,
         0,
         [11,
          caml_new_string
           (" failed: the specified length was too short for token"),
          0]]],
       caml_new_string
        ("scanning of %s failed: the specified length was too short for token")],
     _d_=
      [0,
       [11,caml_new_string("illegal escape character "),[1,0]],
       caml_new_string("illegal escape character %C")],
     null_char=0;
    function next_char(ib)
     {try
       {var c=caml_call1(ib[7],0);
        ib[2] = c;
        ib[3] = 1;
        ib[4] = ib[4] + 1 | 0;
        if(10 === c)ib[5] = ib[5] + 1 | 0;
        return c}
      catch(_bE_)
       {_bE_ = caml_wrap_exception(_bE_);
        if(_bE_ === End_of_file)
         {ib[2] = null_char;ib[3] = 0;ib[1] = 1;return null_char}
        throw _bE_}}
    function peek_char(ib){return ib[3]?ib[2]:next_char(ib)}
    function checked_peek_char(ib)
     {var c=peek_char(ib);if(ib[1])throw End_of_file;return c}
    function end_of_input(ib){peek_char(ib);return ib[1]}
    function eof(ib){return ib[1]}
    function beginning_of_input(ib){return 0 === ib[4]?1:0}
    function name_of_input(ib)
     {var _bD_=ib[9];
      if(typeof _bD_ === "number")
       return 0 === _bD_?cst_unnamed_function:cst_unnamed_character_string;
      else
       {if(0 === _bD_[0])return cst_unnamed_Pervasives_input_channel;
        var fname=_bD_[1];
        return fname}}
    function char_count(ib){return ib[3]?ib[4] - 1 | 0:ib[4]}
    function line_count(ib){return ib[5]}
    function reset_token(ib){return caml_call1(Buffer[9],ib[8])}
    function invalidate_current_char(ib){ib[3] = 0;return 0}
    function token_string(ib)
     {var token_buffer=ib[8],tok=caml_call1(Buffer[2],token_buffer);
      caml_call1(Buffer[8],token_buffer);
      ib[6] = ib[6] + 1 | 0;
      return tok}
    function token_count(ib){return ib[6]}
    function skip_char(width,ib){invalidate_current_char(ib);return width}
    function ignore_char(width,ib){return skip_char(width - 1 | 0,ib)}
    function store_char(width,ib,c)
     {caml_call2(Buffer[10],ib[8],c);return ignore_char(width,ib)}
    var default_token_buffer_size=1024;
    function create(iname,next)
     {return [0,
              0,
              null_char,
              0,
              0,
              0,
              0,
              next,
              caml_call1(Buffer[1],default_token_buffer_size),
              iname]}
    function from_string(s)
     {var i=[0,0],len=caml_ml_string_length(s);
      function next(param)
       {if(len <= i[1])throw End_of_file;
        var c=caml_string_get(s,i[1]);
        i[1]++;
        return c}
      return create(1,next)}
    var _a_=0;
    function from_function(_bC_){return create(_a_,_bC_)}
    var len=1024;
    function scan_close_at_end(ic)
     {caml_call1(Pervasives[81],ic);throw End_of_file}
    function scan_raise_at_end(ic){throw End_of_file}
    function from_ic(scan_close_ic,iname,ic)
     {var buf=runtime.caml_create_bytes(1024),i=[0,0],lim=[0,0],eof=[0,0];
      function next(param)
       {if(i[1] < lim[1]){var c=caml_bytes_get(buf,i[1]);i[1]++;return c}
        if(eof[1])throw End_of_file;
        lim[1] = caml_call4(Pervasives[72],ic,buf,0,len);
        return 0 === lim[1]
                ?(eof[1] = 1,caml_call1(scan_close_ic,ic))
                :(i[1] = 1,caml_bytes_get(buf,0))}
      return create(iname,next)}
    function from_ic_close_at_end(_bA_,_bB_)
     {return from_ic(scan_close_at_end,_bA_,_bB_)}
    function from_ic_raise_at_end(_by_,_bz_)
     {return from_ic(scan_raise_at_end,_by_,_bz_)}
    var
     stdin=
      from_ic(scan_raise_at_end,[1,cst,Pervasives[26]],Pervasives[26]);
    function open_in_file(open_in,fname)
     {if(caml_string_notequal(fname,cst$0))
       {var ic=caml_call1(open_in,fname);
        return from_ic_close_at_end([1,fname,ic],ic)}
      return stdin}
    var _b_=Pervasives[67];
    function open_in(_bx_){return open_in_file(_b_,_bx_)}
    var _c_=Pervasives[68];
    function open_in_bin(_bw_){return open_in_file(_c_,_bw_)}
    function from_channel(ic){return from_ic_raise_at_end([0,ic],ic)}
    function close_in(ib)
     {var _bv_=ib[9];
      if(typeof _bv_ === "number")
       return 0;
      else
       {if(0 === _bv_[0]){var ic=_bv_[1];return caml_call1(Pervasives[81],ic)}
        var ic$0=_bv_[2];
        return caml_call1(Pervasives[81],ic$0)}}
    var memo=[0,0];
    function memo_from_ic(scan_close_ic,ic)
     {try
       {var _bt_=caml_call2(List[40],ic,memo[1]);return _bt_}
      catch(_bu_)
       {_bu_ = caml_wrap_exception(_bu_);
        if(_bu_ === Not_found)
         {var ib=from_ic(scan_close_ic,[0,ic],ic);
          memo[1] = [0,[0,ic,ib],memo[1]];
          return ib}
        throw _bu_}}
    function memo_from_channel(_bs_)
     {return memo_from_ic(scan_raise_at_end,_bs_)}
    var Scan_failure=[248,cst_Scanf_Scan_failure,runtime.caml_fresh_oo_id(0)];
    function bad_input(s){throw [0,Scan_failure,s]}
    function bad_input_escape(c)
     {return bad_input(caml_call2(Printf[4],_d_,c))}
    function bad_token_length(message)
     {return bad_input(caml_call2(Printf[4],_e_,message))}
    function bad_end_of_input(message)
     {return bad_input(caml_call2(Printf[4],_f_,message))}
    function bad_float(param)
     {return bad_input(cst_no_dot_or_exponent_part_found_in_float_token)}
    function bad_hex_float(param)
     {return bad_input(cst_not_a_valid_float_in_hexadecimal_notation)}
    function character_mismatch_err(c,ci)
     {return caml_call3(Printf[4],_g_,c,ci)}
    function character_mismatch(c,ci)
     {return bad_input(character_mismatch_err(c,ci))}
    function skip_whites(ib)
     {for(;;)
       {var c=peek_char(ib),_bq_=1 - eof(ib);
        if(_bq_)
         {var
           _br_=c - 9 | 0,
           switch$0=
            4 < _br_ >>> 0?23 === _br_?1:0:1 < (_br_ - 2 | 0) >>> 0?1:0;
          if(switch$0){invalidate_current_char(ib);continue}
          return 0}
        return _bq_}}
    function check_this_char(ib,c)
     {var ci=checked_peek_char(ib);
      return ci === c?invalidate_current_char(ib):character_mismatch(c,ci)}
    function check_newline(ib)
     {var ci=checked_peek_char(ib);
      return 10 === ci
              ?invalidate_current_char(ib)
              :13 === ci
                ?(invalidate_current_char(ib),check_this_char(ib,10))
                :character_mismatch(10,ci)}
    function check_char(ib,c)
     {return 10 === c
              ?check_newline(ib)
              :32 === c?skip_whites(ib):check_this_char(ib,c)}
    function token_char(ib){return caml_string_get(token_string(ib),0)}
    function token_bool(ib)
     {var s=token_string(ib);
      return caml_string_notequal(s,cst_false)
              ?caml_string_notequal(s,cst_true)
                ?bad_input(caml_call2(Printf[4],_h_,s))
                :1
              :0}
    function integer_conversion_of_char(param)
     {var switcher=param - 88 | 0;
      if(! (32 < switcher >>> 0))
       switch(switcher)
        {case 10:return 0;
         case 12:return 1;
         case 17:return 2;
         case 23:return 3;
         case 29:return 4;
         case 0:
         case 32:return 5
         }
      throw [0,Assert_failure,_i_]}
    function token_int_literal(conv,ib)
     {switch(conv)
       {case 0:
         var _bm_=token_string(ib),tok=caml_call2(Pervasives[16],cst_0b,_bm_);
         break;
        case 3:
         var _bn_=token_string(ib),tok=caml_call2(Pervasives[16],cst_0o,_bn_);
         break;
        case 4:
         var _bo_=token_string(ib),tok=caml_call2(Pervasives[16],cst_0u,_bo_);
         break;
        case 5:
         var _bp_=token_string(ib),tok=caml_call2(Pervasives[16],cst_0x,_bp_);
         break;
        default:var tok=token_string(ib)}
      var l=caml_ml_string_length(tok);
      if(0 !== l)
       if(43 === caml_string_get(tok,0))
        return caml_call3(String[4],tok,1,l - 1 | 0);
      return tok}
    function token_int(conv,ib)
     {return caml_int_of_string(token_int_literal(conv,ib))}
    function token_float(ib)
     {return runtime.caml_float_of_string(token_string(ib))}
    function token_nativeint(conv,ib)
     {return caml_int_of_string(token_int_literal(conv,ib))}
    function token_int32(conv,ib)
     {return caml_int_of_string(token_int_literal(conv,ib))}
    function token_int64(conv,ib)
     {return runtime.caml_int64_of_string(token_int_literal(conv,ib))}
    function scan_decimal_digit_star(width,ib)
     {var width$0=width;
      for(;;)
       {if(0 === width$0)return width$0;
        var c=peek_char(ib);
        if(eof(ib))return width$0;
        if(58 <= c)
         {if(95 === c)
           {var width$1=ignore_char(width$0,ib),width$0=width$1;continue}}
        else
         if(48 <= c)
          {var width$2=store_char(width$0,ib,c),width$0=width$2;continue}
        return width$0}}
    function scan_decimal_digit_plus(width,ib)
     {if(0 === width)return bad_token_length(cst_decimal_digits);
      var c=checked_peek_char(ib),switcher=c - 48 | 0;
      if(9 < switcher >>> 0)return bad_input(caml_call2(Printf[4],_j_,c));
      var width$0=store_char(width,ib,c);
      return scan_decimal_digit_star(width$0,ib)}
    function scan_digit_star(digitp,width,ib)
     {function scan_digits(width,ib)
       {var width$0=width;
        for(;;)
         {if(0 === width$0)return width$0;
          var c=peek_char(ib);
          if(eof(ib))return width$0;
          if(caml_call1(digitp,c))
           {var width$1=store_char(width$0,ib,c),width$0=width$1;continue}
          if(95 === c)
           {var width$2=ignore_char(width$0,ib),width$0=width$2;continue}
          return width$0}}
      return scan_digits(width,ib)}
    function scan_digit_plus(basis,digitp,width,ib)
     {if(0 === width)return bad_token_length(cst_digits);
      var c=checked_peek_char(ib);
      if(caml_call1(digitp,c))
       {var width$0=store_char(width,ib,c);
        return scan_digit_star(digitp,width$0,ib)}
      return bad_input(caml_call3(Printf[4],_k_,c,basis))}
    function is_binary_digit(param)
     {var switcher=param - 48 | 0;return 1 < switcher >>> 0?0:1}
    function scan_binary_int(_bk_,_bl_)
     {return scan_digit_plus(cst_binary,is_binary_digit,_bk_,_bl_)}
    function is_octal_digit(param)
     {var switcher=param - 48 | 0;return 7 < switcher >>> 0?0:1}
    function scan_octal_int(_bi_,_bj_)
     {return scan_digit_plus(cst_octal,is_octal_digit,_bi_,_bj_)}
    function is_hexa_digit(param)
     {var
       _bh_=param - 48 | 0,
       switch$0=
        22 < _bh_ >>> 0
         ?5 < (_bh_ - 49 | 0) >>> 0?0:1
         :6 < (_bh_ - 10 | 0) >>> 0?1:0;
      return switch$0?1:0}
    function scan_hexadecimal_int(_bf_,_bg_)
     {return scan_digit_plus(cst_hexadecimal,is_hexa_digit,_bf_,_bg_)}
    function scan_sign(width,ib)
     {var c=checked_peek_char(ib),switcher=c - 43 | 0;
      if(! (2 < switcher >>> 0))
       switch(switcher)
        {case 0:return store_char(width,ib,c);
         case 1:break;
         default:return store_char(width,ib,c)}
      return width}
    function scan_optionally_signed_decimal_int(width,ib)
     {var width$0=scan_sign(width,ib);
      return scan_decimal_digit_plus(width$0,ib)}
    function scan_unsigned_int(width,ib)
     {var c=checked_peek_char(ib);
      if(48 === c)
       {var width$0=store_char(width,ib,c);
        if(0 === width$0)return width$0;
        var c$0=peek_char(ib);
        if(eof(ib))return width$0;
        if(99 <= c$0)
         {if(111 === c$0)return scan_octal_int(store_char(width$0,ib,c$0),ib);
          var switch$0=120 === c$0?1:0}
        else
         if(88 === c$0)
          var switch$0=1;
         else
          {if(98 <= c$0)return scan_binary_int(store_char(width$0,ib,c$0),ib);
           var switch$0=0}
        return switch$0
                ?scan_hexadecimal_int(store_char(width$0,ib,c$0),ib)
                :scan_decimal_digit_star(width$0,ib)}
      return scan_decimal_digit_plus(width,ib)}
    function scan_optionally_signed_int(width,ib)
     {var width$0=scan_sign(width,ib);return scan_unsigned_int(width$0,ib)}
    function scan_int_conversion(conv,width,ib)
     {switch(conv)
       {case 0:return scan_binary_int(width,ib);
        case 1:return scan_optionally_signed_decimal_int(width,ib);
        case 2:return scan_optionally_signed_int(width,ib);
        case 3:return scan_octal_int(width,ib);
        case 4:return scan_decimal_digit_plus(width,ib);
        default:return scan_hexadecimal_int(width,ib)}}
    function scan_fractional_part(width,ib)
     {if(0 === width)return width;
      var c=peek_char(ib);
      if(eof(ib))return width;
      var switcher=c - 48 | 0;
      return 9 < switcher >>> 0
              ?width
              :scan_decimal_digit_star(store_char(width,ib,c),ib)}
    function scan_exponent_part(width,ib)
     {if(0 === width)return width;
      var c=peek_char(ib);
      if(eof(ib))return width;
      if(69 !== c)if(101 !== c)return width;
      return scan_optionally_signed_decimal_int(store_char(width,ib,c),ib)}
    function scan_integer_part(width,ib)
     {var width$0=scan_sign(width,ib);
      return scan_decimal_digit_star(width$0,ib)}
    function scan_float(width,precision,ib)
     {var width$0=scan_integer_part(width,ib);
      if(0 === width$0)return [0,width$0,precision];
      var c=peek_char(ib);
      if(eof(ib))return [0,width$0,precision];
      if(46 === c)
       {var
         width$1=store_char(width$0,ib,c),
         precision$0=caml_call2(Pervasives[4],width$1,precision),
         width$2=
          width$1
          -
          (precision$0 - scan_fractional_part(precision$0,ib) | 0)
          |
          0;
        return [0,scan_exponent_part(width$2,ib),precision$0]}
      return [0,scan_exponent_part(width$0,ib),precision]}
    function check_case_insensitive_string(width,ib,error,str)
     {function lowercase(c)
       {var switcher=c - 65 | 0;
        return 25 < switcher >>> 0
                ?c
                :caml_call1(Pervasives[17],(c - 65 | 0) + 97 | 0)}
      var
       len=caml_ml_string_length(str),
       width$0=[0,width],
       _bc_=len - 1 | 0,
       _bb_=0;
      if(! (_bc_ < 0))
       {var i=_bb_;
        for(;;)
         {var c=peek_char(ib),_bd_=lowercase(caml_string_get(str,i));
          if(lowercase(c) !== _bd_)caml_call1(error,0);
          if(0 === width$0[1])caml_call1(error,0);
          width$0[1] = store_char(width$0[1],ib,c);
          var _be_=i + 1 | 0;
          if(_bc_ !== i){var i=_be_;continue}
          break}}
      return width$0[1]}
    function scan_hex_float(width,precision,ib)
     {var _a0_=0 === width?1:0,_a1_=_a0_ || end_of_input(ib);
      if(_a1_)bad_hex_float(0);
      var
       width$0=scan_sign(width,ib),
       _a2_=0 === width$0?1:0,
       _a3_=_a2_ || end_of_input(ib);
      if(_a3_)bad_hex_float(0);
      var c=peek_char(ib);
      if(78 <= c)
       {var switcher=c - 79 | 0;
        if(30 < switcher >>> 0)
         {if(! (32 <= switcher))
           {var
             width$1=store_char(width$0,ib,c),
             _a4_=0 === width$1?1:0,
             _a5_=_a4_ || end_of_input(ib);
            if(_a5_)bad_hex_float(0);
            return check_case_insensitive_string
                    (width$1,ib,bad_hex_float,cst_an)}
          var switch$0=0}
        else
         var switch$0=26 === switcher?1:0}
      else
       {if(48 === c)
         {var
           width$3=store_char(width$0,ib,c),
           _a8_=0 === width$3?1:0,
           _a9_=_a8_ || end_of_input(ib);
          if(_a9_)bad_hex_float(0);
          var
           width$4=
            check_case_insensitive_string(width$3,ib,bad_hex_float,cst_x);
          if(0 !== width$4)
           if(! end_of_input(ib))
            {var
              match=peek_char(ib),
              _a__=match - 46 | 0,
              switch$1=
               34 < _a__ >>> 0?66 === _a__?1:0:32 < (_a__ - 1 | 0) >>> 0?1:0,
              width$5=switch$1?width$4:scan_hexadecimal_int(width$4,ib);
             if(0 !== width$5)
              if(! end_of_input(ib))
               {var c$0=peek_char(ib);
                if(46 === c$0)
                 {var width$6=store_char(width$5,ib,c$0);
                  if(0 === width$6)
                   var switch$2=0;
                  else
                   if(end_of_input(ib))
                    var switch$2=0;
                   else
                    {var match$0=peek_char(ib);
                     if(80 === match$0)
                      var switch$3=0;
                     else
                      if(112 === match$0)
                       var switch$3=0;
                      else
                       var
                        precision$0=caml_call2(Pervasives[4],width$6,precision),
                        width$10=
                         width$6
                         -
                         (precision$0 - scan_hexadecimal_int(precision$0,ib) | 0)
                         |
                         0,
                        switch$3=1;
                     if(! switch$3)var width$10=width$6;
                     var width$7=width$10,switch$2=1}
                  if(! switch$2)var width$7=width$6;
                  var width$8=width$7}
                else
                 var width$8=width$5;
                if(0 !== width$8)
                 if(! end_of_input(ib))
                  {var c$1=peek_char(ib);
                   if(80 !== c$1)if(112 !== c$1)return width$8;
                   var
                    width$9=store_char(width$8,ib,c$1),
                    _a$_=0 === width$9?1:0,
                    _ba_=_a$_ || end_of_input(ib);
                   if(_ba_)bad_hex_float(0);
                   return scan_optionally_signed_decimal_int(width$9,ib)}
                return width$8}
             return width$5}
          return width$4}
        var switch$0=73 === c?1:0}
      if(switch$0)
       {var
         width$2=store_char(width$0,ib,c),
         _a6_=0 === width$2?1:0,
         _a7_=_a6_ || end_of_input(ib);
        if(_a7_)bad_hex_float(0);
        return check_case_insensitive_string
                (width$2,ib,bad_hex_float,cst_nfinity)}
      return bad_hex_float(0)}
    function scan_caml_float_rest(width,precision,ib)
     {var _aW_=0 === width?1:0,_aX_=_aW_ || end_of_input(ib);
      if(_aX_)bad_float(0);
      var
       width$0=scan_decimal_digit_star(width,ib),
       _aY_=0 === width$0?1:0,
       _aZ_=_aY_ || end_of_input(ib);
      if(_aZ_)bad_float(0);
      var c=peek_char(ib),switcher=c - 69 | 0;
      if(32 < switcher >>> 0)
       {if(-23 === switcher)
         {var
           width$1=store_char(width$0,ib,c),
           precision$0=caml_call2(Pervasives[4],width$1,precision),
           width_precision=scan_fractional_part(precision$0,ib),
           frac_width=precision$0 - width_precision | 0,
           width$2=width$1 - frac_width | 0;
          return scan_exponent_part(width$2,ib)}}
      else
       {var switcher$0=switcher - 1 | 0;
        if(30 < switcher$0 >>> 0)return scan_exponent_part(width$0,ib)}
      return bad_float(0)}
    function scan_caml_float(width,precision,ib)
     {var _aI_=0 === width?1:0,_aJ_=_aI_ || end_of_input(ib);
      if(_aJ_)bad_float(0);
      var
       width$0=scan_sign(width,ib),
       _aK_=0 === width$0?1:0,
       _aL_=_aK_ || end_of_input(ib);
      if(_aL_)bad_float(0);
      var c=peek_char(ib);
      if(49 <= c)
       {if(! (58 <= c))
         {var
           width$1=store_char(width$0,ib,c),
           _aM_=0 === width$1?1:0,
           _aN_=_aM_ || end_of_input(ib);
          if(_aN_)bad_float(0);
          return scan_caml_float_rest(width$1,precision,ib)}}
      else
       if(48 <= c)
        {var
          width$2=store_char(width$0,ib,c),
          _aO_=0 === width$2?1:0,
          _aP_=_aO_ || end_of_input(ib);
         if(_aP_)bad_float(0);
         var c$0=peek_char(ib);
         if(88 !== c$0)
          if(120 !== c$0)return scan_caml_float_rest(width$2,precision,ib);
         var
          width$3=store_char(width$2,ib,c$0),
          _aQ_=0 === width$3?1:0,
          _aR_=_aQ_ || end_of_input(ib);
         if(_aR_)bad_float(0);
         var
          width$4=scan_hexadecimal_int(width$3,ib),
          _aS_=0 === width$4?1:0,
          _aT_=_aS_ || end_of_input(ib);
         if(_aT_)bad_float(0);
         var c$1=peek_char(ib),switcher=c$1 - 80 | 0;
         if(32 < switcher >>> 0)
          if(-34 === switcher)
           {var width$5=store_char(width$4,ib,c$1);
            if(0 === width$5)
             var switch$1=0;
            else
             if(end_of_input(ib))
              var switch$1=0;
             else
              {var match=peek_char(ib);
               if(80 === match)
                var switch$2=0;
               else
                if(112 === match)
                 var switch$2=0;
                else
                 var
                  precision$0=caml_call2(Pervasives[4],width$5,precision),
                  width$10=
                   width$5
                   -
                   (precision$0 - scan_hexadecimal_int(precision$0,ib) | 0)
                   |
                   0,
                  switch$2=1;
               if(! switch$2)var width$10=width$5;
               var width$6=width$10,switch$1=1}
            if(! switch$1)var width$6=width$5;
            var width$7=width$6,switch$0=0}
          else
           var switch$0=1;
         else
          {var switcher$0=switcher - 1 | 0;
           if(30 < switcher$0 >>> 0)
            var width$7=width$4,switch$0=0;
           else
            var switch$0=1}
         var width$8=switch$0?bad_float(0):width$7;
         if(0 !== width$8)
          if(! end_of_input(ib))
           {var c$2=peek_char(ib);
            if(80 !== c$2)if(112 !== c$2)return width$8;
            var
             width$9=store_char(width$8,ib,c$2),
             _aU_=0 === width$9?1:0,
             _aV_=_aU_ || end_of_input(ib);
            if(_aV_)bad_hex_float(0);
            return scan_optionally_signed_decimal_int(width$9,ib)}
         return width$8}
      return bad_float(0)}
    function scan_string(stp,width,ib)
     {function loop(width)
       {var width$0=width;
        for(;;)
         {if(0 === width$0)return width$0;
          var c=peek_char(ib);
          if(eof(ib))return width$0;
          if(stp)
           {var c$0=stp[1];
            if(c === c$0)return skip_char(width$0,ib);
            var width$1=store_char(width$0,ib,c),width$0=width$1;
            continue}
          var
           _aH_=c - 9 | 0,
           switch$0=
            4 < _aH_ >>> 0?23 === _aH_?1:0:1 < (_aH_ - 2 | 0) >>> 0?1:0;
          if(switch$0)return width$0;
          var width$2=store_char(width$0,ib,c),width$0=width$2;
          continue}}
      return loop(width)}
    function scan_char(width,ib)
     {return store_char(width,ib,checked_peek_char(ib))}
    function char_for_backslash(c)
     {if(110 <= c)
       {if(! (117 <= c))
         {var switcher=c - 110 | 0;
          switch(switcher){case 0:return 10;case 4:return 13;case 6:return 9}}}
      else
       if(98 === c)return 8;
      return c}
    function decimal_value_of_char(c){return c - 48 | 0}
    function char_for_decimal_code(c0,c1,c2)
     {var
       _aF_=decimal_value_of_char(c2),
       _aG_=10 * decimal_value_of_char(c1) | 0,
       c=((100 * decimal_value_of_char(c0) | 0) + _aG_ | 0) + _aF_ | 0;
      if(0 <= c)if(! (255 < c))return caml_call1(Pervasives[17],c);
      return bad_input(caml_call4(Printf[4],_l_,c0,c1,c2))}
    function hexadecimal_value_of_char(d)
     {return 97 <= d?d - 87 | 0:65 <= d?d - 55 | 0:d - 48 | 0}
    function char_for_hexadecimal_code(c1,c2)
     {var
       _aE_=hexadecimal_value_of_char(c2),
       c=(16 * hexadecimal_value_of_char(c1) | 0) + _aE_ | 0;
      if(0 <= c)if(! (255 < c))return caml_call1(Pervasives[17],c);
      return bad_input(caml_call3(Printf[4],_m_,c1,c2))}
    function check_next_char(message,width,ib)
     {if(0 === width)return bad_token_length(message);
      var c=peek_char(ib);
      return eof(ib)?bad_end_of_input(message):c}
    function check_next_char_for_char(_aC_,_aD_)
     {return check_next_char(cst_a_Char,_aC_,_aD_)}
    function check_next_char_for_string(_aA_,_aB_)
     {return check_next_char(cst_a_String,_aA_,_aB_)}
    function scan_backslash_char(width,ib)
     {var c=check_next_char_for_char(width,ib);
      if(40 <= c)
       if(58 <= c)
        {var switcher=c - 92 | 0;
         if(28 < switcher >>> 0)
          var switch$0=0;
         else
          switch(switcher)
           {case 28:
             var
              get_digit=
               function(param)
                {var
                  c=next_char(ib),
                  _az_=c - 48 | 0,
                  switch$0=
                   22 < _az_ >>> 0
                    ?5 < (_az_ - 49 | 0) >>> 0?0:1
                    :6 < (_az_ - 10 | 0) >>> 0?1:0;
                 return switch$0?c:bad_input_escape(c)},
              c1=get_digit(0),
              c2=get_digit(0);
             return store_char
                     (width - 2 | 0,ib,char_for_hexadecimal_code(c1,c2));
            case 0:
            case 6:
            case 18:
            case 22:
            case 24:var switch$0=1;break;
            default:var switch$0=0}}
       else
        {if(48 <= c)
          {var
            get_digit$0=
             function(param)
              {var c=next_char(ib),switcher=c - 48 | 0;
               return 9 < switcher >>> 0?bad_input_escape(c):c},
            c1$0=get_digit$0(0),
            c2$0=get_digit$0(0);
           return store_char
                   (width - 2 | 0,ib,char_for_decimal_code(c,c1$0,c2$0))}
         var switch$0=0}
      else
       var switch$0=34 === c?1:39 <= c?1:0;
      return switch$0
              ?store_char(width,ib,char_for_backslash(c))
              :bad_input_escape(c)}
    function scan_caml_char(width,ib)
     {function find_stop(width)
       {var c=check_next_char_for_char(width,ib);
        return 39 === c?ignore_char(width,ib):character_mismatch(39,c)}
      function find_char(width)
       {var c=check_next_char_for_char(width,ib);
        return 92 === c
                ?find_stop(scan_backslash_char(ignore_char(width,ib),ib))
                :find_stop(store_char(width,ib,c))}
      function find_start(width)
       {var c=checked_peek_char(ib);
        return 39 === c
                ?find_char(ignore_char(width,ib))
                :character_mismatch(39,c)}
      return find_start(width)}
    function scan_caml_string(width,ib)
     {function find_stop$0(counter,width)
       {var width$0=width;
        for(;;)
         {var c=check_next_char_for_string(width$0,ib);
          if(34 === c)return ignore_char(width$0,ib);
          if(92 === c)
           {var _ay_=ignore_char(width$0,ib);
            if(counter < 50)
             {var counter$0=counter + 1 | 0;
              return scan_backslash(counter$0,_ay_)}
            return caml_trampoline_return(scan_backslash,[0,_ay_])}
          var width$1=store_char(width$0,ib,c),width$0=width$1;
          continue}}
      function scan_backslash(counter,width)
       {var match=check_next_char_for_string(width,ib);
        if(10 === match)
         {var _av_=ignore_char(width,ib);
          if(counter < 50)
           {var counter$0=counter + 1 | 0;return skip_spaces(counter$0,_av_)}
          return caml_trampoline_return(skip_spaces,[0,_av_])}
        if(13 === match)
         {var _aw_=ignore_char(width,ib);
          if(counter < 50)
           {var counter$1=counter + 1 | 0;return skip_newline(counter$1,_aw_)}
          return caml_trampoline_return(skip_newline,[0,_aw_])}
        var _ax_=scan_backslash_char(width,ib);
        if(counter < 50)
         {var counter$2=counter + 1 | 0;return find_stop$0(counter$2,_ax_)}
        return caml_trampoline_return(find_stop$0,[0,_ax_])}
      function skip_newline(counter,width)
       {var match=check_next_char_for_string(width,ib);
        if(10 === match)
         {var _at_=ignore_char(width,ib);
          if(counter < 50)
           {var counter$0=counter + 1 | 0;return skip_spaces(counter$0,_at_)}
          return caml_trampoline_return(skip_spaces,[0,_at_])}
        var _au_=store_char(width,ib,13);
        if(counter < 50)
         {var counter$1=counter + 1 | 0;return find_stop$0(counter$1,_au_)}
        return caml_trampoline_return(find_stop$0,[0,_au_])}
      function skip_spaces(counter,width)
       {var width$0=width;
        for(;;)
         {var match=check_next_char_for_string(width$0,ib);
          if(32 === match)
           {var width$1=ignore_char(width$0,ib),width$0=width$1;continue}
          if(counter < 50)
           {var counter$0=counter + 1 | 0;
            return find_stop$0(counter$0,width$0)}
          return caml_trampoline_return(find_stop$0,[0,width$0])}}
      function find_stop(width){return caml_trampoline(find_stop$0(0,width))}
      function find_start(width)
       {var c=checked_peek_char(ib);
        return 34 === c
                ?find_stop(ignore_char(width,ib))
                :character_mismatch(34,c)}
      return find_start(width)}
    function scan_bool(ib)
     {var
       c=checked_peek_char(ib),
       m=102 === c?5:116 === c?4:bad_input(caml_call2(Printf[4],_n_,c));
      return scan_string(0,m,ib)}
    function scan_chars_in_char_set(char_set,scan_indic,width,ib)
     {function scan_chars(i,stp)
       {var i$0=i;
        for(;;)
         {var c=peek_char(ib),_ap_=0 < i$0?1:0;
          if(_ap_)
           {var _aq_=1 - eof(ib);
            if(_aq_)
             var
              _ar_=caml_call2(CamlinternalFormat[1],char_set,c),
              _as_=_ar_?c !== stp?1:0:_ar_;
            else
             var _as_=_aq_}
          else
           var _as_=_ap_;
          if(_as_)
           {store_char(Pervasives[7],ib,c);
            var i$1=i$0 - 1 | 0,i$0=i$1;
            continue}
          return _as_}}
      if(scan_indic)
       {var c=scan_indic[1];
        scan_chars(width,c);
        var _ao_=1 - eof(ib);
        if(_ao_)
         {var ci=peek_char(ib);
          return c === ci?invalidate_current_char(ib):character_mismatch(c,ci)}
        return _ao_}
      return scan_chars(width,-1)}
    function scanf_bad_input(ib,x)
     {if(x[1] === Scan_failure)
       var s=x[2];
      else
       {if(x[1] !== Failure)throw x;var s=x[2]}
      var i=char_count(ib);
      return bad_input(caml_call3(Printf[4],_o_,i,s))}
    function get_counter(ib,counter)
     {switch(counter)
       {case 0:return line_count(ib);
        case 1:return char_count(ib);
        default:return token_count(ib)}}
    function width_of_pad_opt(pad_opt)
     {if(pad_opt){var width=pad_opt[1];return width}return Pervasives[7]}
    function stopper_of_formatting_lit(fmting)
     {if(6 === fmting)return _p_;
      var
       str=caml_call1(CamlinternalFormat[17],fmting),
       stp=caml_string_get(str,1),
       sub_str=caml_call3(String[4],str,2,caml_ml_string_length(str) - 2 | 0);
      return [0,stp,sub_str]}
    function take_format_readers$0(counter,k,fmt)
     {var fmt$0=fmt;
      for(;;)
       if(typeof fmt$0 === "number")
        return caml_call1(k,0);
       else
        switch(fmt$0[0])
         {case 0:var fmt$1=fmt$0[1],fmt$0=fmt$1;continue;
          case 1:var fmt$2=fmt$0[1],fmt$0=fmt$2;continue;
          case 2:var fmt$3=fmt$0[2],fmt$0=fmt$3;continue;
          case 3:var fmt$4=fmt$0[2],fmt$0=fmt$4;continue;
          case 4:var fmt$5=fmt$0[4],fmt$0=fmt$5;continue;
          case 5:var fmt$6=fmt$0[4],fmt$0=fmt$6;continue;
          case 6:var fmt$7=fmt$0[4],fmt$0=fmt$7;continue;
          case 7:var fmt$8=fmt$0[4],fmt$0=fmt$8;continue;
          case 8:var fmt$9=fmt$0[4],fmt$0=fmt$9;continue;
          case 9:var fmt$10=fmt$0[2],fmt$0=fmt$10;continue;
          case 10:var fmt$11=fmt$0[1],fmt$0=fmt$11;continue;
          case 11:var fmt$12=fmt$0[2],fmt$0=fmt$12;continue;
          case 12:var fmt$13=fmt$0[2],fmt$0=fmt$13;continue;
          case 13:var fmt$14=fmt$0[3],fmt$0=fmt$14;continue;
          case 14:
           var
            rest=fmt$0[3],
            fmtty=fmt$0[2],
            _al_=caml_call1(CamlinternalFormat[22],fmtty),
            _am_=caml_call1(CamlinternalFormatBasics[2],_al_);
           if(counter < 50)
            {var counter$1=counter + 1 | 0;
             return take_fmtty_format_readers$0(counter$1,k,_am_,rest)}
           return caml_trampoline_return
                   (take_fmtty_format_readers$0,[0,k,_am_,rest]);
          case 15:var fmt$15=fmt$0[1],fmt$0=fmt$15;continue;
          case 16:var fmt$16=fmt$0[1],fmt$0=fmt$16;continue;
          case 17:var fmt$17=fmt$0[2],fmt$0=fmt$17;continue;
          case 18:
           var _an_=fmt$0[1];
           if(0 === _an_[0])
            {var
              rest$0=fmt$0[2],
              match=_an_[1],
              fmt$18=match[1],
              fmt$19=caml_call2(CamlinternalFormatBasics[3],fmt$18,rest$0),
              fmt$0=fmt$19;
             continue}
           var
            rest$1=fmt$0[2],
            match$0=_an_[1],
            fmt$20=match$0[1],
            fmt$21=caml_call2(CamlinternalFormatBasics[3],fmt$20,rest$1),
            fmt$0=fmt$21;
           continue;
          case 19:
           var fmt_rest=fmt$0[1];
           return function(reader)
            {function new_k(readers_rest)
              {return caml_call1(k,[0,reader,readers_rest])}
             return take_format_readers(new_k,fmt_rest)};
          case 20:var fmt$22=fmt$0[3],fmt$0=fmt$22;continue;
          case 21:var fmt$23=fmt$0[2],fmt$0=fmt$23;continue;
          case 22:var fmt$24=fmt$0[1],fmt$0=fmt$24;continue;
          case 23:
           var rest$2=fmt$0[2],ign=fmt$0[1];
           if(counter < 50)
            {var counter$0=counter + 1 | 0;
             return take_ignored_format_readers(counter$0,k,ign,rest$2)}
           return caml_trampoline_return
                   (take_ignored_format_readers,[0,k,ign,rest$2]);
          default:var fmt$25=fmt$0[3],fmt$0=fmt$25;continue}}
    function take_fmtty_format_readers$0(counter,k,fmtty,fmt)
     {var fmtty$0=fmtty;
      for(;;)
       if(typeof fmtty$0 === "number")
        {if(counter < 50)
          {var counter$0=counter + 1 | 0;
           return take_format_readers$0(counter$0,k,fmt)}
         return caml_trampoline_return(take_format_readers$0,[0,k,fmt])}
       else
        switch(fmtty$0[0])
         {case 0:var fmtty$1=fmtty$0[1],fmtty$0=fmtty$1;continue;
          case 1:var fmtty$2=fmtty$0[1],fmtty$0=fmtty$2;continue;
          case 2:var fmtty$3=fmtty$0[1],fmtty$0=fmtty$3;continue;
          case 3:var fmtty$4=fmtty$0[1],fmtty$0=fmtty$4;continue;
          case 4:var fmtty$5=fmtty$0[1],fmtty$0=fmtty$5;continue;
          case 5:var fmtty$6=fmtty$0[1],fmtty$0=fmtty$6;continue;
          case 6:var fmtty$7=fmtty$0[1],fmtty$0=fmtty$7;continue;
          case 7:var fmtty$8=fmtty$0[1],fmtty$0=fmtty$8;continue;
          case 8:var fmtty$9=fmtty$0[2],fmtty$0=fmtty$9;continue;
          case 9:
           var
            rest=fmtty$0[3],
            ty2=fmtty$0[2],
            ty1=fmtty$0[1],
            _ak_=caml_call1(CamlinternalFormat[22],ty1),
            ty=caml_call2(CamlinternalFormat[23],_ak_,ty2),
            fmtty$10=caml_call2(CamlinternalFormatBasics[1],ty,rest),
            fmtty$0=fmtty$10;
           continue;
          case 10:var fmtty$11=fmtty$0[1],fmtty$0=fmtty$11;continue;
          case 11:var fmtty$12=fmtty$0[1],fmtty$0=fmtty$12;continue;
          case 12:var fmtty$13=fmtty$0[1],fmtty$0=fmtty$13;continue;
          case 13:
           var fmt_rest=fmtty$0[1];
           return function(reader)
            {function new_k(readers_rest)
              {return caml_call1(k,[0,reader,readers_rest])}
             return take_fmtty_format_readers(new_k,fmt_rest,fmt)};
          default:
           var fmt_rest$0=fmtty$0[1];
           return function(reader)
            {function new_k(readers_rest)
              {return caml_call1(k,[0,reader,readers_rest])}
             return take_fmtty_format_readers(new_k,fmt_rest$0,fmt)}}}
    function take_ignored_format_readers(counter,k,ign,fmt)
     {if(typeof ign === "number")
       switch(ign)
        {case 0:
          if(counter < 50)
           {var counter$1=counter + 1 | 0;
            return take_format_readers$0(counter$1,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 1:
          if(counter < 50)
           {var counter$2=counter + 1 | 0;
            return take_format_readers$0(counter$2,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 2:
          return function(reader)
           {function new_k(readers_rest)
             {return caml_call1(k,[0,reader,readers_rest])}
            return take_format_readers(new_k,fmt)};
         default:
          if(counter < 50)
           {var counter$3=counter + 1 | 0;
            return take_format_readers$0(counter$3,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt])}
      else
       switch(ign[0])
        {case 0:
          if(counter < 50)
           {var counter$4=counter + 1 | 0;
            return take_format_readers$0(counter$4,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 1:
          if(counter < 50)
           {var counter$5=counter + 1 | 0;
            return take_format_readers$0(counter$5,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 2:
          if(counter < 50)
           {var counter$6=counter + 1 | 0;
            return take_format_readers$0(counter$6,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 3:
          if(counter < 50)
           {var counter$7=counter + 1 | 0;
            return take_format_readers$0(counter$7,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 4:
          if(counter < 50)
           {var counter$8=counter + 1 | 0;
            return take_format_readers$0(counter$8,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 5:
          if(counter < 50)
           {var counter$9=counter + 1 | 0;
            return take_format_readers$0(counter$9,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 6:
          if(counter < 50)
           {var counter$10=counter + 1 | 0;
            return take_format_readers$0(counter$10,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 7:
          if(counter < 50)
           {var counter$11=counter + 1 | 0;
            return take_format_readers$0(counter$11,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 8:
          if(counter < 50)
           {var counter$12=counter + 1 | 0;
            return take_format_readers$0(counter$12,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         case 9:
          var fmtty=ign[2];
          if(counter < 50)
           {var counter$0=counter + 1 | 0;
            return take_fmtty_format_readers$0(counter$0,k,fmtty,fmt)}
          return caml_trampoline_return
                  (take_fmtty_format_readers$0,[0,k,fmtty,fmt]);
         case 10:
          if(counter < 50)
           {var counter$13=counter + 1 | 0;
            return take_format_readers$0(counter$13,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt]);
         default:
          if(counter < 50)
           {var counter$14=counter + 1 | 0;
            return take_format_readers$0(counter$14,k,fmt)}
          return caml_trampoline_return(take_format_readers$0,[0,k,fmt])}}
    function take_format_readers(k,fmt)
     {return caml_trampoline(take_format_readers$0(0,k,fmt))}
    function take_fmtty_format_readers(k,fmtty,fmt)
     {return caml_trampoline(take_fmtty_format_readers$0(0,k,fmtty,fmt))}
    function pad_prec_scanf(ib,fmt,readers,pad,prec,scan,token)
     {if(typeof pad === "number")
       {if(typeof prec === "number")
         {if(0 === prec)
           {caml_call3(scan,Pervasives[7],Pervasives[7],ib);
            var x=caml_call1(token,ib);
            return [0,x,make_scanf(ib,fmt,readers)]}
          return caml_call1(Pervasives[1],cst_scanf_bad_conversion)}
        var p=prec[1];
        caml_call3(scan,Pervasives[7],p,ib);
        var x$0=caml_call1(token,ib);
        return [0,x$0,make_scanf(ib,fmt,readers)]}
      else
       {if(0 === pad[0])
         {if(0 === pad[1])
           return caml_call1(Pervasives[1],cst_scanf_bad_conversion$0);
          var _aj_=pad[2];
          if(typeof prec === "number")
           {if(0 === prec)
             {caml_call3(scan,_aj_,Pervasives[7],ib);
              var x$1=caml_call1(token,ib);
              return [0,x$1,make_scanf(ib,fmt,readers)]}
            return caml_call1(Pervasives[1],cst_scanf_bad_conversion$1)}
          var p$0=prec[1];
          caml_call3(scan,_aj_,p$0,ib);
          var x$2=caml_call1(token,ib);
          return [0,x$2,make_scanf(ib,fmt,readers)]}
        return caml_call1(Pervasives[1],cst_scanf_bad_conversion$2)}}
    function make_scanf(ib,fmt,readers)
     {var fmt$0=fmt;
      for(;;)
       if(typeof fmt$0 === "number")
        return 0;
       else
        switch(fmt$0[0])
         {case 0:
           var rest=fmt$0[1];
           scan_char(0,ib);
           var c=token_char(ib);
           return [0,c,make_scanf(ib,rest,readers)];
          case 1:
           var rest$0=fmt$0[1];
           scan_caml_char(0,ib);
           var c$0=token_char(ib);
           return [0,c$0,make_scanf(ib,rest$0,readers)];
          case 2:
           var _K_=fmt$0[2],_L_=fmt$0[1];
           if(typeof _K_ !== "number")
            switch(_K_[0])
             {case 17:
               var
                rest$1=_K_[2],
                fmting_lit=_K_[1],
                match=stopper_of_formatting_lit(fmting_lit),
                str=match[2],
                stp=match[1],
                scan$0=
                 function(width,param,ib)
                  {return scan_string([0,stp],width,ib)},
                str_rest=[11,str,rest$1];
               return pad_prec_scanf
                       (ib,str_rest,readers,_L_,0,scan$0,token_string);
              case 18:
               var _M_=_K_[1];
               if(0 === _M_[0])
                {var
                  rest$2=_K_[2],
                  match$0=_M_[1],
                  fmt$1=match$0[1],
                  scan$1=
                   function(width,param,ib){return scan_string(_q_,width,ib)};
                 return pad_prec_scanf
                         (ib,
                          caml_call2(CamlinternalFormatBasics[3],fmt$1,rest$2),
                          readers,
                          _L_,
                          0,
                          scan$1,
                          token_string)}
               var
                rest$3=_K_[2],
                match$1=_M_[1],
                fmt$2=match$1[1],
                scan$2=
                 function(width,param,ib){return scan_string(_r_,width,ib)};
               return pad_prec_scanf
                       (ib,
                        caml_call2(CamlinternalFormatBasics[3],fmt$2,rest$3),
                        readers,
                        _L_,
                        0,
                        scan$2,
                        token_string)
              }
           var scan=function(width,param,ib){return scan_string(0,width,ib)};
           return pad_prec_scanf(ib,_K_,readers,_L_,0,scan,token_string);
          case 3:
           var
            rest$4=fmt$0[2],
            pad=fmt$0[1],
            scan$3=function(width,param,ib){return scan_caml_string(width,ib)};
           return pad_prec_scanf(ib,rest$4,readers,pad,0,scan$3,token_string);
          case 4:
           var
            rest$5=fmt$0[4],
            prec=fmt$0[3],
            pad$0=fmt$0[2],
            iconv=fmt$0[1],
            c$1=
             integer_conversion_of_char
              (caml_call1(CamlinternalFormat[16],iconv)),
            scan$4=
             function(width,param,ib)
              {return scan_int_conversion(c$1,width,ib)};
           return pad_prec_scanf
                   (ib,
                    rest$5,
                    readers,
                    pad$0,
                    prec,
                    scan$4,
                    function(_ai_){return token_int(c$1,_ai_)});
          case 5:
           var
            rest$6=fmt$0[4],
            prec$0=fmt$0[3],
            pad$1=fmt$0[2],
            iconv$0=fmt$0[1],
            c$2=
             integer_conversion_of_char
              (caml_call1(CamlinternalFormat[16],iconv$0)),
            scan$5=
             function(width,param,ib)
              {return scan_int_conversion(c$2,width,ib)};
           return pad_prec_scanf
                   (ib,
                    rest$6,
                    readers,
                    pad$1,
                    prec$0,
                    scan$5,
                    function(_ah_){return token_int32(c$2,_ah_)});
          case 6:
           var
            rest$7=fmt$0[4],
            prec$1=fmt$0[3],
            pad$2=fmt$0[2],
            iconv$1=fmt$0[1],
            c$3=
             integer_conversion_of_char
              (caml_call1(CamlinternalFormat[16],iconv$1)),
            scan$6=
             function(width,param,ib)
              {return scan_int_conversion(c$3,width,ib)};
           return pad_prec_scanf
                   (ib,
                    rest$7,
                    readers,
                    pad$2,
                    prec$1,
                    scan$6,
                    function(_ag_){return token_nativeint(c$3,_ag_)});
          case 7:
           var
            rest$8=fmt$0[4],
            prec$2=fmt$0[3],
            pad$3=fmt$0[2],
            iconv$2=fmt$0[1],
            c$4=
             integer_conversion_of_char
              (caml_call1(CamlinternalFormat[16],iconv$2)),
            scan$7=
             function(width,param,ib)
              {return scan_int_conversion(c$4,width,ib)};
           return pad_prec_scanf
                   (ib,
                    rest$8,
                    readers,
                    pad$3,
                    prec$2,
                    scan$7,
                    function(_af_){return token_int64(c$4,_af_)});
          case 8:
           var _N_=fmt$0[1];
           if(15 === _N_)
            {var rest$9=fmt$0[4],prec$3=fmt$0[3],pad$4=fmt$0[2];
             return pad_prec_scanf
                     (ib,rest$9,readers,pad$4,prec$3,scan_caml_float,token_float)}
           if(16 <= _N_)
            {var rest$10=fmt$0[4],prec$4=fmt$0[3],pad$5=fmt$0[2];
             return pad_prec_scanf
                     (ib,rest$10,readers,pad$5,prec$4,scan_hex_float,token_float)}
           var rest$11=fmt$0[4],prec$5=fmt$0[3],pad$6=fmt$0[2];
           return pad_prec_scanf
                   (ib,rest$11,readers,pad$6,prec$5,scan_float,token_float);
          case 9:
           var
            rest$12=fmt$0[2],
            pad$7=fmt$0[1],
            scan$8=function(param,_ae_,ib){return scan_bool(ib)};
           return pad_prec_scanf(ib,rest$12,readers,pad$7,0,scan$8,token_bool);
          case 10:
           var rest$13=fmt$0[1];
           if(end_of_input(ib)){var fmt$0=rest$13;continue}
           return bad_input(cst_end_of_input_not_found);
          case 11:
           var
            fmt$3=fmt$0[2],
            str$0=fmt$0[1],
            _O_=function(_ad_){return check_char(ib,_ad_)};
           caml_call2(String[8],_O_,str$0);
           var fmt$0=fmt$3;
           continue;
          case 12:
           var fmt$4=fmt$0[2],chr=fmt$0[1];
           check_char(ib,chr);
           var fmt$0=fmt$4;
           continue;
          case 13:
           var rest$14=fmt$0[3],fmtty=fmt$0[2],pad_opt=fmt$0[1];
           scan_caml_string(width_of_pad_opt(pad_opt),ib);
           var s=token_string(ib);
           try
            {var _Q_=caml_call2(CamlinternalFormat[14],s,fmtty),fmt$5=_Q_}
           catch(exn)
            {exn = caml_wrap_exception(exn);
             if(exn[1] !== Failure)throw exn;
             var msg=exn[2],_P_=bad_input(msg),fmt$5=_P_}
           return [0,fmt$5,make_scanf(ib,rest$14,readers)];
          case 14:
           var rest$15=fmt$0[3],fmtty$0=fmt$0[2],pad_opt$0=fmt$0[1];
           scan_caml_string(width_of_pad_opt(pad_opt$0),ib);
           var s$0=token_string(ib);
           try
            {var
              match$2=caml_call2(CamlinternalFormat[13],0,s$0),
              fmt$8=match$2[1],
              match$3=caml_call2(CamlinternalFormat[13],0,s$0),
              fmt$9=match$3[1],
              _U_=caml_call1(CamlinternalFormat[22],fmtty$0),
              _V_=caml_call1(CamlinternalFormatBasics[2],_U_),
              fmt$10=caml_call2(CamlinternalFormat[12],fmt$9,_V_),
              _W_=caml_call1(CamlinternalFormatBasics[2],fmtty$0),
              _X_=caml_call2(CamlinternalFormat[12],fmt$8,_W_),
              fmt$7=_X_,
              fmt$6=fmt$10}
           catch(exn)
            {exn = caml_wrap_exception(exn);
             if(exn[1] !== Failure)throw exn;
             var
              msg$0=exn[2],
              _R_=bad_input(msg$0),
              _S_=_R_[2],
              _T_=_R_[1],
              fmt$7=_T_,
              fmt$6=_S_}
           return [0,
                   [0,fmt$7,s$0],
                   make_scanf
                    (ib,
                     caml_call2(CamlinternalFormatBasics[3],fmt$6,rest$15),
                     readers)];
          case 15:return caml_call1(Pervasives[1],cst_scanf_bad_conversion_a);
          case 16:return caml_call1(Pervasives[1],cst_scanf_bad_conversion_t);
          case 17:
           var
            fmt$11=fmt$0[2],
            formatting_lit=fmt$0[1],
            _Y_=caml_call1(CamlinternalFormat[17],formatting_lit),
            _Z_=function(_ac_){return check_char(ib,_ac_)};
           caml_call2(String[8],_Z_,_Y_);
           var fmt$0=fmt$11;
           continue;
          case 18:
           var ___=fmt$0[1];
           if(0 === ___[0])
            {var rest$16=fmt$0[2],match$4=___[1],fmt$12=match$4[1];
             check_char(ib,64);
             check_char(ib,123);
             var
              fmt$13=caml_call2(CamlinternalFormatBasics[3],fmt$12,rest$16),
              fmt$0=fmt$13;
             continue}
           var rest$17=fmt$0[2],match$5=___[1],fmt$14=match$5[1];
           check_char(ib,64);
           check_char(ib,91);
           var
            fmt$15=caml_call2(CamlinternalFormatBasics[3],fmt$14,rest$17),
            fmt$0=fmt$15;
           continue;
          case 19:
           var fmt_rest=fmt$0[1];
           if(readers)
            {var
              readers_rest=readers[2],
              reader=readers[1],
              x=caml_call1(reader,ib);
             return [0,x,make_scanf(ib,fmt_rest,readers_rest)]}
           return caml_call1(Pervasives[1],cst_scanf_missing_reader);
          case 20:
           var _$_=fmt$0[3],_aa_=fmt$0[2],_ab_=fmt$0[1];
           if(typeof _$_ !== "number" && 17 === _$_[0])
            {var
              rest$18=_$_[2],
              fmting_lit$0=_$_[1],
              match$6=stopper_of_formatting_lit(fmting_lit$0),
              str$1=match$6[2],
              stp$0=match$6[1],
              width$0=width_of_pad_opt(_ab_);
             scan_chars_in_char_set(_aa_,[0,stp$0],width$0,ib);
             var s$2=token_string(ib),str_rest$0=[11,str$1,rest$18];
             return [0,s$2,make_scanf(ib,str_rest$0,readers)]}
           var width=width_of_pad_opt(_ab_);
           scan_chars_in_char_set(_aa_,0,width,ib);
           var s$1=token_string(ib);
           return [0,s$1,make_scanf(ib,_$_,readers)];
          case 21:
           var
            rest$19=fmt$0[2],
            counter=fmt$0[1],
            count=get_counter(ib,counter);
           return [0,count,make_scanf(ib,rest$19,readers)];
          case 22:
           var rest$20=fmt$0[1],c$5=checked_peek_char(ib);
           return [0,c$5,make_scanf(ib,rest$20,readers)];
          case 23:
           var
            rest$21=fmt$0[2],
            ign=fmt$0[1],
            match$7=caml_call2(CamlinternalFormat[6],ign,rest$21),
            fmt$16=match$7[1],
            match$8=make_scanf(ib,fmt$16,readers);
           if(match$8){var arg_rest=match$8[2];return arg_rest}
           throw [0,Assert_failure,_s_];
          default:
           return caml_call1
                   (Pervasives[1],cst_scanf_bad_conversion_custom_converter)}}
    function kscanf(ib,ef,param)
     {var str=param[2],fmt=param[1];
      function apply(f,args)
       {var f$0=f,args$0=args;
        for(;;)
         {if(args$0)
           {var
             args$1=args$0[2],
             x=args$0[1],
             f$1=caml_call1(f$0,x),
             f$0=f$1,
             args$0=args$1;
            continue}
          return f$0}}
      function k(readers,f)
       {reset_token(ib);
        try
         {var _J_=[0,make_scanf(ib,fmt,readers)],_D_=_J_}
        catch(exc)
         {exc = caml_wrap_exception(exc);
          if(exc[1] === Scan_failure)
           var switch$0=0;
          else
           if(exc[1] === Failure)
            var switch$0=0;
           else
            if(exc === End_of_file)
             var switch$0=0;
            else
             {if(exc[1] !== Invalid_argument)throw exc;
              var
               msg=exc[2],
               _E_=caml_call1(String[13],str),
               _F_=caml_call2(Pervasives[16],_E_,cst$1),
               _G_=caml_call2(Pervasives[16],cst_in_format,_F_),
               _H_=caml_call2(Pervasives[16],msg,_G_),
               _I_=caml_call1(Pervasives[1],_H_),
               _C_=_I_,
               switch$0=1}
          if(! switch$0)var _C_=[1,exc];
          var _D_=_C_}
        if(0 === _D_[0]){var args=_D_[1];return apply(f,args)}
        var exc=_D_[1];
        return caml_call2(ef,ib,exc)}
      return take_format_readers(k,fmt)}
    function bscanf(ib,fmt){return kscanf(ib,scanf_bad_input,fmt)}
    function ksscanf(s,ef,fmt){return kscanf(from_string(s),ef,fmt)}
    function sscanf(s,fmt){return kscanf(from_string(s),scanf_bad_input,fmt)}
    function scanf(fmt){return kscanf(stdin,scanf_bad_input,fmt)}
    function bscanf_format(ib,format,f)
     {scan_caml_string(Pervasives[7],ib);
      var str=token_string(ib);
      try
       {var _B_=caml_call2(CamlinternalFormat[15],str,format),fmt=_B_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(exn[1] !== Failure)throw exn;
        var msg=exn[2],_A_=bad_input(msg),fmt=_A_}
      return caml_call1(f,fmt)}
    function sscanf_format(s,format,f)
     {return bscanf_format(from_string(s),format,f)}
    function string_to_String(s)
     {var l=caml_ml_string_length(s),b=caml_call1(Buffer[1],l + 2 | 0);
      caml_call2(Buffer[10],b,34);
      var _y_=l - 1 | 0,_x_=0;
      if(! (_y_ < 0))
       {var i=_x_;
        for(;;)
         {var c=caml_string_get(s,i);
          if(34 === c)caml_call2(Buffer[10],b,92);
          caml_call2(Buffer[10],b,c);
          var _z_=i + 1 | 0;
          if(_y_ !== i){var i=_z_;continue}
          break}}
      caml_call2(Buffer[10],b,34);
      return caml_call1(Buffer[2],b)}
    function format_from_string(s,fmt)
     {function _w_(x){return x}
      return sscanf_format(string_to_String(s),fmt,_w_)}
    function unescaped(s)
     {function _u_(x){return x}
      var _v_=caml_call2(Pervasives[16],s,cst$2);
      return caml_call1(sscanf(caml_call2(Pervasives[16],cst$3,_v_),_t_),_u_)}
    function kfscanf(ic,ef,fmt){return kscanf(memo_from_channel(ic),ef,fmt)}
    function fscanf(ic,fmt)
     {return kscanf(memo_from_channel(ic),scanf_bad_input,fmt)}
    var
     Scanf=
      [0,
       [0,
        stdin,
        open_in,
        open_in_bin,
        close_in,
        open_in,
        open_in_bin,
        from_string,
        from_function,
        from_channel,
        end_of_input,
        beginning_of_input,
        name_of_input,
        stdin],
       Scan_failure,
       bscanf,
       sscanf,
       scanf,
       kscanf,
       ksscanf,
       bscanf_format,
       sscanf_format,
       format_from_string,
       unescaped,
       fscanf,
       kfscanf];
    runtime.caml_register_global(66,Scanf,"Scanf");
    return}
  (function(){return this}()));
