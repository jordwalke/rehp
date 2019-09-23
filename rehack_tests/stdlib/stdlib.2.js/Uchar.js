(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_format_int=runtime.caml_format_int,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_is_not_a_latin1_character=
      caml_new_string(" is not a latin1 character"),
     cst_04X=caml_new_string("%04X"),
     cst_U=caml_new_string("U+"),
     cst_is_not_an_Unicode_scalar_value=
      caml_new_string(" is not an Unicode scalar value"),
     cst_X=caml_new_string("%X"),
     err_no_pred=caml_new_string("U+0000 has no predecessor"),
     err_no_succ=caml_new_string("U+10FFFF has no successor"),
     Pervasives=global_data.Pervasives;
    function err_not_sv(i)
     {return caml_call2
              (Pervasives[16],
               caml_format_int(cst_X,i),
               cst_is_not_an_Unicode_scalar_value)}
    function err_not_latin1(u)
     {var
       _p_=
        caml_call2
         (Pervasives[16],
          caml_format_int(cst_04X,u),
          cst_is_not_a_latin1_character);
      return caml_call2(Pervasives[16],cst_U,_p_)}
    var min=0,max=1114111,lo_bound=55295,hi_bound=57344,bom=65279,rep=65533;
    function succ(u)
     {return u === 55295
              ?hi_bound
              :u === 1114111?caml_call1(Pervasives[1],err_no_succ):u + 1 | 0}
    function pred(u)
     {return u === 57344
              ?lo_bound
              :u === 0?caml_call1(Pervasives[1],err_no_pred):u - 1 | 0}
    function is_valid(i)
     {var _l_=0 <= i?1:0,_m_=_l_?i <= 55295?1:0:_l_;
      if(_m_)
       var _n_=_m_;
      else
       var _o_=57344 <= i?1:0,_n_=_o_?i <= 1114111?1:0:_o_;
      return _n_}
    function of_int(i)
     {if(is_valid(i))return i;
      var _k_=err_not_sv(i);
      return caml_call1(Pervasives[1],_k_)}
    function is_char(u){return u < 256?1:0}
    function of_char(c){return c}
    function to_char(u)
     {if(255 < u)
       {var _j_=err_not_latin1(u);return caml_call1(Pervasives[1],_j_)}
      return u}
    function unsafe_to_char(_i_){return _i_}
    function equal(_h_,_g_){return _h_ === _g_?1:0}
    function compare(_f_,_e_){return runtime.caml_int_compare(_f_,_e_)}
    function hash(_d_){return _d_}
    function _a_(_c_){return _c_}
    var
     Uchar=
      [0,
       min,
       max,
       bom,
       rep,
       succ,
       pred,
       is_valid,
       of_int,
       function(_b_){return _b_},
       _a_,
       is_char,
       of_char,
       to_char,
       unsafe_to_char,
       equal,
       compare,
       hash];
    runtime.caml_register_global(8,Uchar,"Uchar");
    return}
  (function(){return this}()));
