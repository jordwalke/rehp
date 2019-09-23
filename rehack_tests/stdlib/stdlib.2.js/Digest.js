(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_unsafe_set=runtime.caml_bytes_unsafe_set,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_md5_string=runtime.caml_md5_string,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_string_get=runtime.caml_string_get,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Digest_from_hex$0=caml_new_string("Digest.from_hex"),
     cst_Digest_from_hex=caml_new_string("Digest.from_hex"),
     cst_Digest_to_hex=caml_new_string("Digest.to_hex"),
     cst_Digest_substring=caml_new_string("Digest.substring"),
     Invalid_argument=global_data.Invalid_argument,
     Pervasives=global_data.Pervasives,
     Char=global_data.Char,
     Bytes=global_data.Bytes,
     String=global_data.String,
     compare=String[33],
     equal=String[34];
    function string(str)
     {return caml_md5_string(str,0,caml_ml_string_length(str))}
    function bytes(b){return string(caml_call1(Bytes[42],b))}
    function substring(str,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((caml_ml_string_length(str) - len | 0) < ofs))
         return caml_md5_string(str,ofs,len);
      return caml_call1(Pervasives[1],cst_Digest_substring)}
    function subbytes(b,ofs,len)
     {return substring(caml_call1(Bytes[42],b),ofs,len)}
    function file(filename)
     {var ic=caml_call1(Pervasives[68],filename);
      try
       {var d=runtime.caml_md5_chan(ic,-1)}
      catch(e)
       {e = caml_wrap_exception(e);caml_call1(Pervasives[81],ic);throw e}
      caml_call1(Pervasives[81],ic);
      return d}
    function output(chan,digest)
     {return caml_call2(Pervasives[54],chan,digest)}
    function input(chan){return caml_call2(Pervasives[74],chan,16)}
    function char_hex(n){var _e_=10 <= n?87:48;return n + _e_ | 0}
    function to_hex(d)
     {if(16 !== caml_ml_string_length(d))
       caml_call1(Pervasives[1],cst_Digest_to_hex);
      var result=caml_create_bytes(32),i=0;
      for(;;)
       {var x=caml_string_get(d,i);
        caml_bytes_unsafe_set(result,i * 2 | 0,char_hex(x >>> 4 | 0));
        caml_bytes_unsafe_set(result,(i * 2 | 0) + 1 | 0,char_hex(x & 15));
        var _d_=i + 1 | 0;
        if(15 !== i){var i=_d_;continue}
        return caml_call1(Bytes[42],result)}}
    function from_hex(s)
     {if(32 !== caml_ml_string_length(s))
       caml_call1(Pervasives[1],cst_Digest_from_hex);
      function digit(c)
       {if(65 <= c)
         {if(97 <= c)
           {if(! (103 <= c))return (c - 97 | 0) + 10 | 0}
          else
           if(! (71 <= c))return (c - 65 | 0) + 10 | 0}
        else
         {var switcher=c - 48 | 0;if(! (9 < switcher >>> 0))return c - 48 | 0}
        throw [0,Invalid_argument,cst_Digest_from_hex$0]}
      function byte$0(i)
       {var _c_=digit(caml_string_get(s,i + 1 | 0));
        return (digit(caml_string_get(s,i)) << 4) + _c_ | 0}
      var result=caml_create_bytes(16),i=0;
      for(;;)
       {var _a_=byte$0(2 * i | 0);
        runtime.caml_bytes_set(result,i,caml_call1(Char[1],_a_));
        var _b_=i + 1 | 0;
        if(15 !== i){var i=_b_;continue}
        return caml_call1(Bytes[42],result)}}
    var
     Digest=
      [0,
       compare,
       equal,
       string,
       bytes,
       substring,
       subbytes,
       file,
       output,
       input,
       to_hex,
       from_hex];
    runtime.caml_register_global(9,Digest,"Digest");
    return}
  (function(){return this}()));
