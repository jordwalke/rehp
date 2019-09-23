(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_unsafe_set=runtime.caml_bytes_unsafe_set,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_ml_bytes_length=runtime.caml_ml_bytes_length,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_get=runtime.caml_string_get;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
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
     cst_Buffer_truncate=caml_new_string("Buffer.truncate"),
     cst_Buffer_add_channel=caml_new_string("Buffer.add_channel"),
     cst_Buffer_add_substring_add_subbytes=
      caml_new_string("Buffer.add_substring/add_subbytes"),
     cst_Buffer_add_cannot_grow_buffer=
      caml_new_string("Buffer.add: cannot grow buffer"),
     cst_Buffer_nth=caml_new_string("Buffer.nth"),
     cst_Buffer_blit=caml_new_string("Buffer.blit"),
     cst_Buffer_sub=caml_new_string("Buffer.sub"),
     Pervasives=global_data.Pervasives,
     End_of_file=global_data.End_of_file,
     Not_found=global_data.Not_found,
     String=global_data.String,
     Assert_failure=global_data.Assert_failure,
     Sys=global_data.Sys,
     Bytes=global_data.Bytes,
     Uchar=global_data.Uchar,
     _g_=[0,caml_new_string("buffer.ml"),205,9],
     _f_=[0,caml_new_string("buffer.ml"),141,19],
     _e_=[0,caml_new_string("buffer.ml"),159,8],
     _d_=[0,caml_new_string("buffer.ml"),120,19],
     _c_=[0,caml_new_string("buffer.ml"),138,8],
     _b_=[0,caml_new_string("buffer.ml"),84,19],
     _a_=[0,caml_new_string("buffer.ml"),117,8];
    function create(n)
     {var
       n$0=1 <= n?n:1,
       n$1=Sys[13] < n$0?Sys[13]:n$0,
       s=caml_create_bytes(n$1);
      return [0,s,0,n$1,s]}
    function contents(b){return caml_call3(Bytes[8],b[1],0,b[2])}
    function to_bytes(b){return caml_call3(Bytes[7],b[1],0,b[2])}
    function sub(b,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((b[2] - len | 0) < ofs))
         return caml_call3(Bytes[8],b[1],ofs,len);
      return caml_call1(Pervasives[1],cst_Buffer_sub)}
    function blit(src,srcoff,dst,dstoff,len)
     {if(0 <= len)
       if(0 <= srcoff)
        if(! ((src[2] - len | 0) < srcoff))
         if(0 <= dstoff)
          if(! ((caml_ml_bytes_length(dst) - len | 0) < dstoff))
           return runtime.caml_blit_bytes(src[1],srcoff,dst,dstoff,len);
      return caml_call1(Pervasives[1],cst_Buffer_blit)}
    function nth(b,ofs)
     {if(0 <= ofs)
       if(! (b[2] <= ofs))return runtime.caml_bytes_unsafe_get(b[1],ofs);
      return caml_call1(Pervasives[1],cst_Buffer_nth)}
    function length(b){return b[2]}
    function clear(b){b[2] = 0;return 0}
    function reset(b)
     {b[2] = 0;b[1] = b[4];b[3] = caml_ml_bytes_length(b[1]);return 0}
    function resize(b,more)
     {var len=b[3],new_len=[0,len];
      for(;;)
       {if(new_len[1] < (b[2] + more | 0))
         {new_len[1] = 2 * new_len[1] | 0;continue}
        if(Sys[13] < new_len[1])
         if((b[2] + more | 0) <= Sys[13])
          new_len[1] = Sys[13];
         else
          caml_call1(Pervasives[2],cst_Buffer_add_cannot_grow_buffer);
        var new_buffer=caml_create_bytes(new_len[1]);
        caml_call5(Bytes[11],b[1],0,new_buffer,0,b[2]);
        b[1] = new_buffer;
        b[3] = new_len[1];
        return 0}}
    function add_char(b,c)
     {var pos=b[2];
      if(b[3] <= pos)resize(b,1);
      caml_bytes_unsafe_set(b[1],pos,c);
      b[2] = pos + 1 | 0;
      return 0}
    function add_utf_8_uchar(b,u)
     {var u$0=caml_call1(Uchar[10],u);
      if(0 <= u$0)
       {if(127 < u$0)
         {if(2047 < u$0)
           {if(65535 < u$0)
             {if(1114111 < u$0)throw [0,Assert_failure,_a_];
              var pos=b[2];
              if(b[3] < (pos + 4 | 0))resize(b,4);
              caml_bytes_unsafe_set(b[1],pos,240 | u$0 >>> 18 | 0);
              caml_bytes_unsafe_set
               (b[1],pos + 1 | 0,128 | (u$0 >>> 12 | 0) & 63);
              caml_bytes_unsafe_set
               (b[1],pos + 2 | 0,128 | (u$0 >>> 6 | 0) & 63);
              caml_bytes_unsafe_set(b[1],pos + 3 | 0,128 | u$0 & 63);
              b[2] = pos + 4 | 0;
              return 0}
            var pos$0=b[2];
            if(b[3] < (pos$0 + 3 | 0))resize(b,3);
            caml_bytes_unsafe_set(b[1],pos$0,224 | u$0 >>> 12 | 0);
            caml_bytes_unsafe_set
             (b[1],pos$0 + 1 | 0,128 | (u$0 >>> 6 | 0) & 63);
            caml_bytes_unsafe_set(b[1],pos$0 + 2 | 0,128 | u$0 & 63);
            b[2] = pos$0 + 3 | 0;
            return 0}
          var pos$1=b[2];
          if(b[3] < (pos$1 + 2 | 0))resize(b,2);
          caml_bytes_unsafe_set(b[1],pos$1,192 | u$0 >>> 6 | 0);
          caml_bytes_unsafe_set(b[1],pos$1 + 1 | 0,128 | u$0 & 63);
          b[2] = pos$1 + 2 | 0;
          return 0}
        return add_char(b,u$0)}
      throw [0,Assert_failure,_b_]}
    function add_utf_16be_uchar(b,u)
     {var u$0=caml_call1(Uchar[10],u);
      if(0 <= u$0)
       {if(65535 < u$0)
         {if(1114111 < u$0)throw [0,Assert_failure,_c_];
          var
           u$1=u$0 - 65536 | 0,
           hi=55296 | u$1 >>> 10 | 0,
           lo=56320 | u$1 & 1023,
           pos=b[2];
          if(b[3] < (pos + 4 | 0))resize(b,4);
          caml_bytes_unsafe_set(b[1],pos,hi >>> 8 | 0);
          caml_bytes_unsafe_set(b[1],pos + 1 | 0,hi & 255);
          caml_bytes_unsafe_set(b[1],pos + 2 | 0,lo >>> 8 | 0);
          caml_bytes_unsafe_set(b[1],pos + 3 | 0,lo & 255);
          b[2] = pos + 4 | 0;
          return 0}
        var pos$0=b[2];
        if(b[3] < (pos$0 + 2 | 0))resize(b,2);
        caml_bytes_unsafe_set(b[1],pos$0,u$0 >>> 8 | 0);
        caml_bytes_unsafe_set(b[1],pos$0 + 1 | 0,u$0 & 255);
        b[2] = pos$0 + 2 | 0;
        return 0}
      throw [0,Assert_failure,_d_]}
    function add_utf_16le_uchar(b,u)
     {var u$0=caml_call1(Uchar[10],u);
      if(0 <= u$0)
       {if(65535 < u$0)
         {if(1114111 < u$0)throw [0,Assert_failure,_e_];
          var
           u$1=u$0 - 65536 | 0,
           hi=55296 | u$1 >>> 10 | 0,
           lo=56320 | u$1 & 1023,
           pos=b[2];
          if(b[3] < (pos + 4 | 0))resize(b,4);
          caml_bytes_unsafe_set(b[1],pos,hi & 255);
          caml_bytes_unsafe_set(b[1],pos + 1 | 0,hi >>> 8 | 0);
          caml_bytes_unsafe_set(b[1],pos + 2 | 0,lo & 255);
          caml_bytes_unsafe_set(b[1],pos + 3 | 0,lo >>> 8 | 0);
          b[2] = pos + 4 | 0;
          return 0}
        var pos$0=b[2];
        if(b[3] < (pos$0 + 2 | 0))resize(b,2);
        caml_bytes_unsafe_set(b[1],pos$0,u$0 & 255);
        caml_bytes_unsafe_set(b[1],pos$0 + 1 | 0,u$0 >>> 8 | 0);
        b[2] = pos$0 + 2 | 0;
        return 0}
      throw [0,Assert_failure,_f_]}
    function add_substring(b,s,offset,len)
     {var _l_=offset < 0?1:0;
      if(_l_)
       var _m_=_l_;
      else
       var
        _n_=len < 0?1:0,
        _m_=_n_ || ((caml_ml_string_length(s) - len | 0) < offset?1:0);
      if(_m_)caml_call1(Pervasives[1],cst_Buffer_add_substring_add_subbytes);
      var new_position=b[2] + len | 0;
      if(b[3] < new_position)resize(b,len);
      caml_call5(Bytes[12],s,offset,b[1],b[2],len);
      b[2] = new_position;
      return 0}
    function add_subbytes(b,s,offset,len)
     {return add_substring(b,caml_call1(Bytes[42],s),offset,len)}
    function add_string(b,s)
     {var len=caml_ml_string_length(s),new_position=b[2] + len | 0;
      if(b[3] < new_position)resize(b,len);
      caml_call5(Bytes[12],s,0,b[1],b[2],len);
      b[2] = new_position;
      return 0}
    function add_bytes(b,s){return add_string(b,caml_call1(Bytes[42],s))}
    function add_buffer(b,bs){return add_subbytes(b,bs[1],0,bs[2])}
    function add_channel_rec(b,ic,len)
     {var len$0=len;
      for(;;)
       {var _k_=0 < len$0?1:0;
        if(_k_)
         {var n=caml_call4(Pervasives[72],ic,b[1],b[2],len$0);
          b[2] = b[2] + n | 0;
          if(0 === n)throw End_of_file;
          var len$1=len$0 - n | 0,len$0=len$1;
          continue}
        return _k_}}
    function add_channel(b,ic,len)
     {var _i_=len < 0?1:0,_j_=_i_ || (Sys[13] < len?1:0);
      if(_j_)caml_call1(Pervasives[1],cst_Buffer_add_channel);
      if(b[3] < (b[2] + len | 0))resize(b,len);
      return add_channel_rec(b,ic,len)}
    function output_buffer(oc,b)
     {return caml_call4(Pervasives[56],oc,b[1],0,b[2])}
    function closing(param)
     {if(40 === param)return 41;
      if(123 === param)return 125;
      throw [0,Assert_failure,_g_]}
    function advance_to_closing(opening,closing,k,s,start)
     {function advance(k,i,lim)
       {var k$0=k,i$0=i;
        for(;;)
         {if(lim <= i$0)throw Not_found;
          if(caml_string_get(s,i$0) === opening)
           {var i$1=i$0 + 1 | 0,k$1=k$0 + 1 | 0,k$0=k$1,i$0=i$1;continue}
          if(caml_string_get(s,i$0) === closing)
           {if(0 === k$0)return i$0;
            var i$2=i$0 + 1 | 0,k$2=k$0 - 1 | 0,k$0=k$2,i$0=i$2;
            continue}
          var i$3=i$0 + 1 | 0,i$0=i$3;
          continue}}
      return advance(k,start,caml_ml_string_length(s))}
    function advance_to_non_alpha(s,start)
     {function advance(i,lim)
       {var i$0=i;
        for(;;)
         {if(lim <= i$0)return lim;
          var
           match=caml_string_get(s,i$0),
           switch$0=
            91 <= match
             ?97 <= match?123 <= match?0:1:95 === match?1:0
             :58 <= match?65 <= match?1:0:48 <= match?1:0;
          if(switch$0){var i$1=i$0 + 1 | 0,i$0=i$1;continue}
          return i$0}}
      return advance(start,caml_ml_string_length(s))}
    function find_ident(s,start,lim)
     {if(lim <= start)throw Not_found;
      var c=caml_string_get(s,start);
      if(40 !== c)
       if(123 !== c)
        {var stop$0=advance_to_non_alpha(s,start + 1 | 0);
         return [0,caml_call3(String[4],s,start,stop$0 - start | 0),stop$0]}
      var
       new_start=start + 1 | 0,
       stop=advance_to_closing(c,closing(c),0,s,new_start);
      return [0,
              caml_call3(String[4],s,new_start,(stop - start | 0) - 1 | 0),
              stop + 1 | 0]}
    function add_substitute(b,f,s)
     {var lim=caml_ml_string_length(s);
      function subst(previous,i)
       {var previous$0=previous,i$0=i;
        for(;;)
         {if(i$0 < lim)
           {var current=caml_string_get(s,i$0);
            if(36 === current)
             {if(92 === previous$0)
               {add_char(b,current);
                var i$1=i$0 + 1 | 0,previous$0=32,i$0=i$1;
                continue}
              var
               j=i$0 + 1 | 0,
               match=find_ident(s,j,lim),
               i$2=match[2],
               ident=match[1];
              add_string(b,caml_call1(f,ident));
              var previous$0=32,i$0=i$2;
              continue}
            if(92 === previous$0)
             {add_char(b,92);
              add_char(b,current);
              var i$3=i$0 + 1 | 0,previous$0=32,i$0=i$3;
              continue}
            if(92 === current)
             {var i$4=i$0 + 1 | 0,previous$0=current,i$0=i$4;continue}
            add_char(b,current);
            var i$5=i$0 + 1 | 0,previous$0=current,i$0=i$5;
            continue}
          var _h_=92 === previous$0?1:0;
          return _h_?add_char(b,previous$0):_h_}}
      return subst(32,0)}
    function truncate(b,len)
     {if(0 <= len)if(! (length(b) < len)){b[2] = len;return 0}
      return caml_call1(Pervasives[1],cst_Buffer_truncate)}
    var
     Buffer=
      [0,
       create,
       contents,
       to_bytes,
       sub,
       blit,
       nth,
       length,
       clear,
       reset,
       add_char,
       add_utf_8_uchar,
       add_utf_16le_uchar,
       add_utf_16be_uchar,
       add_string,
       add_bytes,
       add_substring,
       add_subbytes,
       add_substitute,
       add_buffer,
       add_channel,
       output_buffer,
       truncate];
    runtime.caml_register_global(22,Buffer,"Buffer");
    return}
  (function(){return this}()));
