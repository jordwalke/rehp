(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_blit_bytes=runtime.caml_blit_bytes,
     caml_bytes_unsafe_get=runtime.caml_bytes_unsafe_get,
     caml_bytes_unsafe_set=runtime.caml_bytes_unsafe_set,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_fill_bytes=runtime.caml_fill_bytes,
     caml_ml_bytes_length=runtime.caml_ml_bytes_length,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
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
     cst_Bytes_concat=caml_new_string("Bytes.concat"),
     cst_String_blit_Bytes_blit_string=
      caml_new_string("String.blit / Bytes.blit_string"),
     cst_Bytes_blit=caml_new_string("Bytes.blit"),
     cst_String_fill_Bytes_fill=caml_new_string("String.fill / Bytes.fill"),
     cst_Bytes_extend=caml_new_string("Bytes.extend"),
     cst_String_sub_Bytes_sub=caml_new_string("String.sub / Bytes.sub"),
     Not_found=global_data.Not_found,
     Char=global_data.Char,
     Pervasives=global_data.Pervasives;
    function make(n,c)
     {var s=caml_create_bytes(n);caml_fill_bytes(s,0,n,c);return s}
    function init(n,f)
     {var s=caml_create_bytes(n),_N_=n - 1 | 0,_M_=0;
      if(! (_N_ < 0))
       {var i=_M_;
        for(;;)
         {caml_bytes_unsafe_set(s,i,caml_call1(f,i));
          var _O_=i + 1 | 0;
          if(_N_ !== i){var i=_O_;continue}
          break}}
      return s}
    var empty=caml_create_bytes(0);
    function copy(s)
     {var len=caml_ml_bytes_length(s),r=caml_create_bytes(len);
      caml_blit_bytes(s,0,r,0,len);
      return r}
    function to_string(b){return copy(b)}
    function of_string(s){return copy(s)}
    function sub(s,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_bytes_length(s) - len | 0) < ofs))
         {var r=caml_create_bytes(len);
          caml_blit_bytes(s,ofs,r,0,len);
          return r}
      return caml_call1(Pervasives[1],cst_String_sub_Bytes_sub)}
    function sub_string(b,ofs,len){return sub(b,ofs,len)}
    function symbol(a,b)
     {var
       c=a + b | 0,
       _L_=b < 0?1:0,
       match=c < 0?1:0,
       switch$0=
        0 === (a < 0?1:0)
         ?0 === _L_?0 === match?0:1:0
         :0 === _L_?0:0 === match?1:0;
      return switch$0?caml_call1(Pervasives[1],cst_Bytes_extend):c}
    function extend(s,left,right)
     {var
       len=symbol(symbol(caml_ml_bytes_length(s),left),right),
       r=caml_create_bytes(len);
      if(0 <= left)
       var srcoff=0,srcoff$0=srcoff,dstoff=left;
      else
       var _J_=0,_K_=- left | 0,srcoff$0=_K_,dstoff=_J_;
      var
       cpylen=
        caml_call2
         (Pervasives[4],
          caml_ml_bytes_length(s) - srcoff$0 | 0,
          len - dstoff | 0);
      if(0 < cpylen)caml_blit_bytes(s,srcoff$0,r,dstoff,cpylen);
      return r}
    function fill(s,ofs,len,c)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_bytes_length(s) - len | 0) < ofs))
         return caml_fill_bytes(s,ofs,len,c);
      return caml_call1(Pervasives[1],cst_String_fill_Bytes_fill)}
    function blit(s1,ofs1,s2,ofs2,len)
     {if(0 <= len)
       if(0 <= ofs1)
        if(! ((caml_ml_bytes_length(s1) - len | 0) < ofs1))
         if(0 <= ofs2)
          if(! ((caml_ml_bytes_length(s2) - len | 0) < ofs2))
           return caml_blit_bytes(s1,ofs1,s2,ofs2,len);
      return caml_call1(Pervasives[1],cst_Bytes_blit)}
    function blit_string(s1,ofs1,s2,ofs2,len)
     {if(0 <= len)
       if(0 <= ofs1)
        if(! ((runtime.caml_ml_string_length(s1) - len | 0) < ofs1))
         if(0 <= ofs2)
          if(! ((caml_ml_bytes_length(s2) - len | 0) < ofs2))
           return runtime.caml_blit_string(s1,ofs1,s2,ofs2,len);
      return caml_call1(Pervasives[1],cst_String_blit_Bytes_blit_string)}
    function iter(f,a)
     {var _H_=caml_ml_bytes_length(a) - 1 | 0,_G_=0;
      if(! (_H_ < 0))
       {var i=_G_;
        for(;;)
         {caml_call1(f,caml_bytes_unsafe_get(a,i));
          var _I_=i + 1 | 0;
          if(_H_ !== i){var i=_I_;continue}
          break}}
      return 0}
    function iteri(f,a)
     {var _E_=caml_ml_bytes_length(a) - 1 | 0,_D_=0;
      if(! (_E_ < 0))
       {var i=_D_;
        for(;;)
         {caml_call2(f,i,caml_bytes_unsafe_get(a,i));
          var _F_=i + 1 | 0;
          if(_E_ !== i){var i=_F_;continue}
          break}}
      return 0}
    function ensure_ge(x,y)
     {return y <= x?x:caml_call1(Pervasives[1],cst_Bytes_concat)}
    function sum_lengths(acc,seplen,param)
     {var acc$0=acc,param$0=param;
      for(;;)
       {if(param$0)
         {var _B_=param$0[2],_C_=param$0[1];
          if(_B_)
           {var
             acc$1=
              ensure_ge
               ((caml_ml_bytes_length(_C_) + seplen | 0) + acc$0 | 0,acc$0),
             acc$0=acc$1,
             param$0=_B_;
            continue}
          return caml_ml_bytes_length(_C_) + acc$0 | 0}
        return acc$0}}
    function unsafe_blits(dst,pos,sep,seplen,param)
     {var pos$0=pos,param$0=param;
      for(;;)
       {if(param$0)
         {var _z_=param$0[2],_A_=param$0[1];
          if(_z_)
           {caml_blit_bytes(_A_,0,dst,pos$0,caml_ml_bytes_length(_A_));
            caml_blit_bytes
             (sep,0,dst,pos$0 + caml_ml_bytes_length(_A_) | 0,seplen);
            var
             pos$1=(pos$0 + caml_ml_bytes_length(_A_) | 0) + seplen | 0,
             pos$0=pos$1,
             param$0=_z_;
            continue}
          caml_blit_bytes(_A_,0,dst,pos$0,caml_ml_bytes_length(_A_));
          return dst}
        return dst}}
    function concat(sep,l)
     {if(l)
       {var seplen=caml_ml_bytes_length(sep);
        return unsafe_blits
                (caml_create_bytes(sum_lengths(0,seplen,l)),0,sep,seplen,l)}
      return empty}
    function cat(s1,s2)
     {var
       l1=caml_ml_bytes_length(s1),
       l2=caml_ml_bytes_length(s2),
       r=caml_create_bytes(l1 + l2 | 0);
      caml_blit_bytes(s1,0,r,0,l1);
      caml_blit_bytes(s2,0,r,l1,l2);
      return r}
    function is_space(param)
     {var
       _y_=param - 9 | 0,
       switch$0=4 < _y_ >>> 0?23 === _y_?1:0:2 === _y_?0:1;
      return switch$0?1:0}
    function trim(s)
     {var len=caml_ml_bytes_length(s),i=[0,0];
      for(;;)
       {if(i[1] < len)
         if(is_space(caml_bytes_unsafe_get(s,i[1]))){i[1]++;continue}
        var j=[0,len - 1 | 0];
        for(;;)
         {if(i[1] <= j[1])
           if(is_space(caml_bytes_unsafe_get(s,j[1]))){j[1] += -1;continue}
          return i[1] <= j[1]?sub(s,i[1],(j[1] - i[1] | 0) + 1 | 0):empty}}}
    function escaped(s)
     {var n=[0,0],_r_=caml_ml_bytes_length(s) - 1 | 0,_q_=0;
      if(! (_r_ < 0))
       {var i$0=_q_;
        for(;;)
         {var match=caml_bytes_unsafe_get(s,i$0);
          if(32 <= match)
           {var _v_=match - 34 | 0;
            if(58 < _v_ >>> 0)
             if(93 <= _v_)var switch$0=0,switch$1=0;else var switch$1=1;
            else
             if(56 < (_v_ - 1 | 0) >>> 0)
              var switch$0=1,switch$1=0;
             else
              var switch$1=1;
            if(switch$1)var _w_=1,switch$0=2}
          else
           var switch$0=11 <= match?13 === match?1:0:8 <= match?1:0;
          switch(switch$0){case 0:var _w_=4;break;case 1:var _w_=2;break}
          n[1] = n[1] + _w_ | 0;
          var _x_=i$0 + 1 | 0;
          if(_r_ !== i$0){var i$0=_x_;continue}
          break}}
      if(n[1] === caml_ml_bytes_length(s))return copy(s);
      var s$0=caml_create_bytes(n[1]);
      n[1] = 0;
      var _t_=caml_ml_bytes_length(s) - 1 | 0,_s_=0;
      if(! (_t_ < 0))
       {var i=_s_;
        for(;;)
         {var c=caml_bytes_unsafe_get(s,i);
          if(35 <= c)
           var switch$2=92 === c?1:127 <= c?0:2;
          else
           if(32 <= c)
            var switch$2=34 <= c?1:2;
           else
            if(14 <= c)
             var switch$2=0;
            else
             switch(c)
              {case 8:
                caml_bytes_unsafe_set(s$0,n[1],92);
                n[1]++;
                caml_bytes_unsafe_set(s$0,n[1],98);
                var switch$2=3;
                break;
               case 9:
                caml_bytes_unsafe_set(s$0,n[1],92);
                n[1]++;
                caml_bytes_unsafe_set(s$0,n[1],116);
                var switch$2=3;
                break;
               case 10:
                caml_bytes_unsafe_set(s$0,n[1],92);
                n[1]++;
                caml_bytes_unsafe_set(s$0,n[1],110);
                var switch$2=3;
                break;
               case 13:
                caml_bytes_unsafe_set(s$0,n[1],92);
                n[1]++;
                caml_bytes_unsafe_set(s$0,n[1],114);
                var switch$2=3;
                break;
               default:var switch$2=0}
          switch(switch$2)
           {case 0:
             caml_bytes_unsafe_set(s$0,n[1],92);
             n[1]++;
             caml_bytes_unsafe_set(s$0,n[1],48 + (c / 100 | 0) | 0);
             n[1]++;
             caml_bytes_unsafe_set(s$0,n[1],48 + ((c / 10 | 0) % 10 | 0) | 0);
             n[1]++;
             caml_bytes_unsafe_set(s$0,n[1],48 + (c % 10 | 0) | 0);
             break;
            case 1:
             caml_bytes_unsafe_set(s$0,n[1],92);
             n[1]++;
             caml_bytes_unsafe_set(s$0,n[1],c);
             break;
            case 2:caml_bytes_unsafe_set(s$0,n[1],c);break
            }
          n[1]++;
          var _u_=i + 1 | 0;
          if(_t_ !== i){var i=_u_;continue}
          break}}
      return s$0}
    function map(f,s)
     {var l=caml_ml_bytes_length(s);
      if(0 === l)return s;
      var r=caml_create_bytes(l),_o_=l - 1 | 0,_n_=0;
      if(! (_o_ < 0))
       {var i=_n_;
        for(;;)
         {caml_bytes_unsafe_set(r,i,caml_call1(f,caml_bytes_unsafe_get(s,i)));
          var _p_=i + 1 | 0;
          if(_o_ !== i){var i=_p_;continue}
          break}}
      return r}
    function mapi(f,s)
     {var l=caml_ml_bytes_length(s);
      if(0 === l)return s;
      var r=caml_create_bytes(l),_l_=l - 1 | 0,_k_=0;
      if(! (_l_ < 0))
       {var i=_k_;
        for(;;)
         {caml_bytes_unsafe_set
           (r,i,caml_call2(f,i,caml_bytes_unsafe_get(s,i)));
          var _m_=i + 1 | 0;
          if(_l_ !== i){var i=_m_;continue}
          break}}
      return r}
    function uppercase_ascii(s){return map(Char[6],s)}
    function lowercase_ascii(s){return map(Char[5],s)}
    function apply1(f,s)
     {if(0 === caml_ml_bytes_length(s))return s;
      var r=copy(s);
      caml_bytes_unsafe_set(r,0,caml_call1(f,caml_bytes_unsafe_get(s,0)));
      return r}
    function capitalize_ascii(s){return apply1(Char[6],s)}
    function uncapitalize_ascii(s){return apply1(Char[5],s)}
    function index_rec(s,lim,i,c)
     {var i$0=i;
      for(;;)
       {if(lim <= i$0)throw Not_found;
        if(caml_bytes_unsafe_get(s,i$0) === c)return i$0;
        var i$1=i$0 + 1 | 0,i$0=i$1;
        continue}}
    function index(s,c){return index_rec(s,caml_ml_bytes_length(s),0,c)}
    function index_rec_opt(s,lim,i,c)
     {var i$0=i;
      for(;;)
       {if(lim <= i$0)return 0;
        if(caml_bytes_unsafe_get(s,i$0) === c)return [0,i$0];
        var i$1=i$0 + 1 | 0,i$0=i$1;
        continue}}
    function index_opt(s,c)
     {return index_rec_opt(s,caml_ml_bytes_length(s),0,c)}
    function index_from(s,i,c)
     {var l=caml_ml_bytes_length(s);
      if(0 <= i)if(! (l < i))return index_rec(s,l,i,c);
      return caml_call1(Pervasives[1],cst_String_index_from_Bytes_index_from)}
    function index_from_opt(s,i,c)
     {var l=caml_ml_bytes_length(s);
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
     {return rindex_rec(s,caml_ml_bytes_length(s) - 1 | 0,c)}
    function rindex_from(s,i,c)
     {if(-1 <= i)if(! (caml_ml_bytes_length(s) <= i))return rindex_rec(s,i,c);
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
     {return rindex_rec_opt(s,caml_ml_bytes_length(s) - 1 | 0,c)}
    function rindex_from_opt(s,i,c)
     {if(-1 <= i)
       if(! (caml_ml_bytes_length(s) <= i))return rindex_rec_opt(s,i,c);
      return caml_call1
              (Pervasives[1],cst_String_rindex_from_opt_Bytes_rindex_from_opt)}
    function contains_from(s,i,c)
     {var l=caml_ml_bytes_length(s);
      if(0 <= i)
       if(! (l < i))
        try
         {index_rec(s,l,i,c);var _i_=1;return _i_}
        catch(_j_)
         {_j_ = caml_wrap_exception(_j_);
          if(_j_ === Not_found)return 0;
          throw _j_}
      return caml_call1
              (Pervasives[1],cst_String_contains_from_Bytes_contains_from)}
    function contains(s,c){return contains_from(s,0,c)}
    function rcontains_from(s,i,c)
     {if(0 <= i)
       if(! (caml_ml_bytes_length(s) <= i))
        try
         {rindex_rec(s,i,c);var _g_=1;return _g_}
        catch(_h_)
         {_h_ = caml_wrap_exception(_h_);
          if(_h_ === Not_found)return 0;
          throw _h_}
      return caml_call1
              (Pervasives[1],cst_String_rcontains_from_Bytes_rcontains_from)}
    function compare(x,y){return runtime.caml_bytes_compare(x,y)}
    function uppercase(s){return map(Char[4],s)}
    function lowercase(s){return map(Char[3],s)}
    function capitalize(s){return apply1(Char[4],s)}
    function uncapitalize(s){return apply1(Char[3],s)}
    function _a_(_f_){return _f_}
    function _b_(_e_){return _e_}
    var
     Bytes=
      [0,
       make,
       init,
       empty,
       copy,
       of_string,
       to_string,
       sub,
       sub_string,
       extend,
       fill,
       blit,
       blit_string,
       concat,
       cat,
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
       function(_d_,_c_){return runtime.caml_bytes_equal(_d_,_c_)},
       _b_,
       _a_];
    runtime.caml_register_global(15,Bytes,"Bytes");
    return}
  (function(){return this}()));
