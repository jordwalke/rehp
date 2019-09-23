(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_unsafe_set=runtime.caml_bytes_unsafe_set,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    var
     global_data=runtime.caml_get_global_data(),
     cst=caml_new_string("\\\\"),
     cst$0=caml_new_string("\\'"),
     cst_b=caml_new_string("\\b"),
     cst_t=caml_new_string("\\t"),
     cst_n=caml_new_string("\\n"),
     cst_r=caml_new_string("\\r"),
     cst_Char_chr=caml_new_string("Char.chr"),
     Pervasives=global_data.Pervasives;
    function chr(n)
     {if(0 <= n)if(! (255 < n))return n;
      return caml_call1(Pervasives[1],cst_Char_chr)}
    function escaped(c)
     {if(40 <= c)
       {if(92 === c)return cst;var switch$0=127 <= c?0:1}
      else
       if(32 <= c)
        {if(39 <= c)return cst$0;var switch$0=1}
       else
        if(14 <= c)
         var switch$0=0;
        else
         switch(c)
          {case 8:return cst_b;
           case 9:return cst_t;
           case 10:return cst_n;
           case 13:return cst_r;
           default:var switch$0=0}
      if(switch$0)
       {var s$0=caml_create_bytes(1);
        caml_bytes_unsafe_set(s$0,0,c);
        return s$0}
      var s=caml_create_bytes(4);
      caml_bytes_unsafe_set(s,0,92);
      caml_bytes_unsafe_set(s,1,48 + (c / 100 | 0) | 0);
      caml_bytes_unsafe_set(s,2,48 + ((c / 10 | 0) % 10 | 0) | 0);
      caml_bytes_unsafe_set(s,3,48 + (c % 10 | 0) | 0);
      return s}
    function lowercase(c)
     {var switch$0=65 <= c?90 < c?0:1:0;
      if(! switch$0)
       {var switch$1=192 <= c?214 < c?0:1:0;
        if(! switch$1)
         {var switch$2=216 <= c?222 < c?1:0:1;if(switch$2)return c}}
      return c + 32 | 0}
    function uppercase(c)
     {var switch$0=97 <= c?122 < c?0:1:0;
      if(! switch$0)
       {var switch$1=224 <= c?246 < c?0:1:0;
        if(! switch$1)
         {var switch$2=248 <= c?254 < c?1:0:1;if(switch$2)return c}}
      return c - 32 | 0}
    function lowercase_ascii(c)
     {if(65 <= c)if(! (90 < c))return c + 32 | 0;return c}
    function uppercase_ascii(c)
     {if(97 <= c)if(! (122 < c))return c - 32 | 0;return c}
    function compare(c1,c2){return c1 - c2 | 0}
    function equal(c1,c2){return 0 === compare(c1,c2)?1:0}
    var
     Char=
      [0,
       chr,
       escaped,
       lowercase,
       uppercase,
       lowercase_ascii,
       uppercase_ascii,
       compare,
       equal];
    runtime.caml_register_global(8,Char,"Char");
    return}
  (function(){return this}()));
