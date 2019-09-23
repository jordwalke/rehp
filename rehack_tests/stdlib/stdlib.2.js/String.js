(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_blit_string=runtime.caml_blit_string,
     caml_bytes_unsafe_get=runtime.caml_bytes_unsafe_get,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_equal=runtime.caml_string_equal,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_String_rcontains_from_Bytes_rcontains_from=
      caml_new_string("String.rcontains_from / Bytes.rcontains_from"),
     cst_String_contains_from_Bytes_contains_from=
      caml_new_string("String.contains_from / Bytes.contains_from"),
     cst_String_rindex_from_opt_Bytes_rindex_from_opt=
      caml_new_string("String.rindex_from_opt / Bytes.rindex_from_opt"),
     cst_String_rindex_from_Bytes_rindex_from=
      caml_new_string("String.rindex_from / Bytes.rindex_from"),
     cst_String_index_from_opt_Bytes_index_from_opt=
      caml_new_string("String.index_from_opt / Bytes.index_from_opt"),
     cst_String_index_from_Bytes_index_from=
      caml_new_string("String.index_from / Bytes.index_from"),
     cst$0=caml_new_string(""),
     cst=caml_new_string(""),
     cst_String_concat=caml_new_string("String.concat"),
     Not_found=global_data.Not_found,
     Bytes=global_data.Bytes,
     Pervasives=global_data.Pervasives,
     bts=Bytes[42],
     bos=Bytes[43];
    function make(n,c){return caml_call1(bts,caml_call2(Bytes[1],n,c))}
    function init(n,f){return caml_call1(bts,caml_call2(Bytes[2],n,f))}
    function copy(s)
     {var _J_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[4],_J_))}
    function sub(s,ofs,len)
     {var _I_=caml_call1(bos,s);
      return caml_call1(bts,caml_call3(Bytes[7],_I_,ofs,len))}
    var fill=Bytes[10],blit=Bytes[12];
    function ensure_ge(x,y)
     {return y <= x?x:caml_call1(Pervasives[1],cst_String_concat)}
    function sum_lengths(acc,seplen,param)
     {var acc$0=acc,param$0=param;
      for(;;)
       {if(param$0)
         {var _G_=param$0[2],_H_=param$0[1];
          if(_G_)
           {var
             acc$1=
              ensure_ge
               ((caml_ml_string_length(_H_) + seplen | 0) + acc$0 | 0,acc$0),
             acc$0=acc$1,
             param$0=_G_;
            continue}
          return caml_ml_string_length(_H_) + acc$0 | 0}
        return acc$0}}
    function unsafe_blits(dst,pos,sep,seplen,param)
     {var pos$0=pos,param$0=param;
      for(;;)
       {if(param$0)
         {var _E_=param$0[2],_F_=param$0[1];
          if(_E_)
           {caml_blit_string(_F_,0,dst,pos$0,caml_ml_string_length(_F_));
            caml_blit_string
             (sep,0,dst,pos$0 + caml_ml_string_length(_F_) | 0,seplen);
            var
             pos$1=(pos$0 + caml_ml_string_length(_F_) | 0) + seplen | 0,
             pos$0=pos$1,
             param$0=_E_;
            continue}
          caml_blit_string(_F_,0,dst,pos$0,caml_ml_string_length(_F_));
          return dst}
        return dst}}
    function concat(sep,l)
     {if(l)
       {var seplen=caml_ml_string_length(sep);
        return caml_call1
                (bts,
                 unsafe_blits
                  (runtime.caml_create_bytes(sum_lengths(0,seplen,l)),
                   0,
                   sep,
                   seplen,
                   l))}
      return cst}
    function iter(f,s)
     {var _C_=caml_ml_string_length(s) - 1 | 0,_B_=0;
      if(! (_C_ < 0))
       {var i=_B_;
        for(;;)
         {caml_call1(f,caml_bytes_unsafe_get(s,i));
          var _D_=i + 1 | 0;
          if(_C_ !== i){var i=_D_;continue}
          break}}
      return 0}
    function iteri(f,s)
     {var _z_=caml_ml_string_length(s) - 1 | 0,_y_=0;
      if(! (_z_ < 0))
       {var i=_y_;
        for(;;)
         {caml_call2(f,i,caml_bytes_unsafe_get(s,i));
          var _A_=i + 1 | 0;
          if(_z_ !== i){var i=_A_;continue}
          break}}
      return 0}
    function map(f,s)
     {var _x_=caml_call1(bos,s);
      return caml_call1(bts,caml_call2(Bytes[17],f,_x_))}
    function mapi(f,s)
     {var _w_=caml_call1(bos,s);
      return caml_call1(bts,caml_call2(Bytes[18],f,_w_))}
    function is_space(param)
     {var
       _v_=param - 9 | 0,
       switch$0=4 < _v_ >>> 0?23 === _v_?1:0:2 === _v_?0:1;
      return switch$0?1:0}
    function trim(s)
     {if(caml_string_equal(s,cst$0))return s;
      if(! is_space(caml_bytes_unsafe_get(s,0)))
       if
        (!
         is_space(caml_bytes_unsafe_get(s,caml_ml_string_length(s) - 1 | 0)))
        return s;
      var _u_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[19],_u_))}
    function escaped(s)
     {function needs_escape(i)
       {var i$0=i;
        for(;;)
         {if(caml_ml_string_length(s) <= i$0)return 0;
          var match=caml_bytes_unsafe_get(s,i$0);
          if(32 <= match)
           {var _t_=match - 34 | 0;
            if(58 < _t_ >>> 0)
             if(93 <= _t_)var switch$0=0,switch$1=0;else var switch$1=1;
            else
             if(56 < (_t_ - 1 | 0) >>> 0)
              var switch$0=1,switch$1=0;
             else
              var switch$1=1;
            if(switch$1){var i$1=i$0 + 1 | 0,i$0=i$1;continue}}
          else
           var switch$0=11 <= match?13 === match?1:0:8 <= match?1:0;
          return switch$0?1:1}}
      if(needs_escape(0))
       {var _s_=caml_call1(bos,s);
        return caml_call1(bts,caml_call1(Bytes[20],_s_))}
      return s}
    function index_rec(s,lim,i,c)
     {var i$0=i;
      for(;;)
       {if(lim <= i$0)throw Not_found;
        if(caml_bytes_unsafe_get(s,i$0) === c)return i$0;
        var i$1=i$0 + 1 | 0,i$0=i$1;
        continue}}
    function index(s,c){return index_rec(s,caml_ml_string_length(s),0,c)}
    function index_rec_opt(s,lim,i,c)
     {var i$0=i;
      for(;;)
       {if(lim <= i$0)return 0;
        if(caml_bytes_unsafe_get(s,i$0) === c)return [0,i$0];
        var i$1=i$0 + 1 | 0,i$0=i$1;
        continue}}
    function index_opt(s,c)
     {return index_rec_opt(s,caml_ml_string_length(s),0,c)}
    function index_from(s,i,c)
     {var l=caml_ml_string_length(s);
      if(0 <= i)if(! (l < i))return index_rec(s,l,i,c);
      return caml_call1(Pervasives[1],cst_String_index_from_Bytes_index_from)}
    function index_from_opt(s,i,c)
     {var l=caml_ml_string_length(s);
      if(0 <= i)if(! (l < i))return index_rec_opt(s,l,i,c);
      return caml_call1
              (Pervasives[1],cst_String_index_from_opt_Bytes_index_from_opt)}
    function rindex_rec(s,i,c)
     {var i$0=i;
      for(;;)
       {if(0 <= i$0)
         {if(caml_bytes_unsafe_get(s,i$0) === c)return i$0;
          var i$1=i$0 - 1 | 0,i$0=i$1;
          continue}
        throw Not_found}}
    function rindex(s,c)
     {return rindex_rec(s,caml_ml_string_length(s) - 1 | 0,c)}
    function rindex_from(s,i,c)
     {if(-1 <= i)
       if(! (caml_ml_string_length(s) <= i))return rindex_rec(s,i,c);
      return caml_call1
              (Pervasives[1],cst_String_rindex_from_Bytes_rindex_from)}
    function rindex_rec_opt(s,i,c)
     {var i$0=i;
      for(;;)
       {if(0 <= i$0)
         {if(caml_bytes_unsafe_get(s,i$0) === c)return [0,i$0];
          var i$1=i$0 - 1 | 0,i$0=i$1;
          continue}
        return 0}}
    function rindex_opt(s,c)
     {return rindex_rec_opt(s,caml_ml_string_length(s) - 1 | 0,c)}
    function rindex_from_opt(s,i,c)
     {if(-1 <= i)
       if(! (caml_ml_string_length(s) <= i))return rindex_rec_opt(s,i,c);
      return caml_call1
              (Pervasives[1],cst_String_rindex_from_opt_Bytes_rindex_from_opt)}
    function contains_from(s,i,c)
     {var l=caml_ml_string_length(s);
      if(0 <= i)
       if(! (l < i))
        try
         {index_rec(s,l,i,c);var _q_=1;return _q_}
        catch(_r_)
         {_r_ = caml_wrap_exception(_r_);
          if(_r_ === Not_found)return 0;
          throw _r_}
      return caml_call1
              (Pervasives[1],cst_String_contains_from_Bytes_contains_from)}
    function contains(s,c){return contains_from(s,0,c)}
    function rcontains_from(s,i,c)
     {if(0 <= i)
       if(! (caml_ml_string_length(s) <= i))
        try
         {rindex_rec(s,i,c);var _o_=1;return _o_}
        catch(_p_)
         {_p_ = caml_wrap_exception(_p_);
          if(_p_ === Not_found)return 0;
          throw _p_}
      return caml_call1
              (Pervasives[1],cst_String_rcontains_from_Bytes_rcontains_from)}
    function uppercase_ascii(s)
     {var _n_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[36],_n_))}
    function lowercase_ascii(s)
     {var _m_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[37],_m_))}
    function capitalize_ascii(s)
     {var _l_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[38],_l_))}
    function uncapitalize_ascii(s)
     {var _k_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[39],_k_))}
    function compare(x,y){return runtime.caml_string_compare(x,y)}
    function split_on_char(sep,s)
     {var
       r=[0,0],
       j=[0,caml_ml_string_length(s)],
       _g_=caml_ml_string_length(s) - 1 | 0;
      if(! (_g_ < 0))
       {var i=_g_;
        for(;;)
         {if(caml_bytes_unsafe_get(s,i) === sep)
           {var _i_=r[1];
            r[1] = [0,sub(s,i + 1 | 0,(j[1] - i | 0) - 1 | 0),_i_];
            j[1] = i}
          var _j_=i - 1 | 0;
          if(0 !== i){var i=_j_;continue}
          break}}
      var _h_=r[1];
      return [0,sub(s,0,j[1]),_h_]}
    function uppercase(s)
     {var _f_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[32],_f_))}
    function lowercase(s)
     {var _e_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[33],_e_))}
    function capitalize(s)
     {var _d_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[34],_d_))}
    function uncapitalize(s)
     {var _c_=caml_call1(bos,s);
      return caml_call1(bts,caml_call1(Bytes[35],_c_))}
    var
     String=
      [0,
       make,
       init,
       copy,
       sub,
       fill,
       blit,
       concat,
       iter,
       iteri,
       map,
       mapi,
       trim,
       escaped,
       index,
       index_opt,
       rindex,
       rindex_opt,
       index_from,
       index_from_opt,
       rindex_from,
       rindex_from_opt,
       contains,
       contains_from,
       rcontains_from,
       uppercase,
       lowercase,
       capitalize,
       uncapitalize,
       uppercase_ascii,
       lowercase_ascii,
       capitalize_ascii,
       uncapitalize_ascii,
       compare,
       function(_b_,_a_){return caml_string_equal(_b_,_a_)},
       split_on_char];
    runtime.caml_register_global(12,String,"String");
    return}
  (function(){return this}()));
