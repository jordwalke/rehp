(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_greaterthan=runtime.caml_greaterthan,
     caml_int64_of_int32=runtime.caml_int64_of_int32,
     caml_int64_or=runtime.caml_int64_or,
     caml_int64_shift_left=runtime.caml_int64_shift_left,
     caml_int64_sub=runtime.caml_int64_sub,
     caml_lessequal=runtime.caml_lessequal,
     caml_mod=runtime.caml_mod,
     caml_new_string=runtime.caml_new_string,
     caml_string_get=runtime.caml_string_get,
     caml_sys_random_seed=runtime.caml_sys_random_seed;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Random_int64=caml_new_string("Random.int64"),
     cst_Random_int32=caml_new_string("Random.int32"),
     cst_Random_int=caml_new_string("Random.int"),
     cst_x=caml_new_string("x"),
     Int32=global_data.Int32,
     Int64=global_data.Int64,
     Pervasives=global_data.Pervasives,
     Digest=global_data.Digest,
     Array=global_data.Array,
     Nativeint=global_data.Nativeint,
     _a_=[255,1,0,0],
     _b_=[255,0,0,0],
     _c_=
      [0,
       987910699,
       495797812,
       364182224,
       414272206,
       318284740,
       990407751,
       383018966,
       270373319,
       840823159,
       24560019,
       536292337,
       512266505,
       189156120,
       730249596,
       143776328,
       51606627,
       140166561,
       366354223,
       1003410265,
       700563762,
       981890670,
       913149062,
       526082594,
       1021425055,
       784300257,
       667753350,
       630144451,
       949649812,
       48546892,
       415514493,
       258888527,
       511570777,
       89983870,
       283659902,
       308386020,
       242688715,
       482270760,
       865188196,
       1027664170,
       207196989,
       193777847,
       619708188,
       671350186,
       149669678,
       257044018,
       87658204,
       558145612,
       183450813,
       28133145,
       901332182,
       710253903,
       510646120,
       652377910,
       409934019,
       801085050];
    function new_state(param){return [0,runtime.caml_make_vect(55,0),0]}
    function assign(st1,st2)
     {caml_call5(Array[10],st2[1],0,st1[1],0,55);st1[2] = st2[2];return 0}
    function full_init(s,seed)
     {function combine(accu,x)
       {var
         _q_=caml_call1(Pervasives[21],x),
         _r_=caml_call2(Pervasives[16],accu,_q_);
        return caml_call1(Digest[3],_r_)}
      function extract(d)
       {var
         _n_=caml_string_get(d,3) << 24,
         _o_=caml_string_get(d,2) << 16,
         _p_=caml_string_get(d,1) << 8;
        return ((caml_string_get(d,0) + _p_ | 0) + _o_ | 0) + _n_ | 0}
      var seed$0=0 === seed.length - 1?[0,0]:seed,l=seed$0.length - 1,i$0=0;
      for(;;)
       {caml_check_bound(s[1],i$0)[1 + i$0] = i$0;
        var _m_=i$0 + 1 | 0;
        if(54 !== i$0){var i$0=_m_;continue}
        var accu=[0,cst_x],_h_=54 + caml_call2(Pervasives[5],55,l) | 0,_g_=0;
        if(! (_h_ < 0))
         {var i=_g_;
          for(;;)
           {var
             j=i % 55 | 0,
             k=caml_mod(i,l),
             _i_=caml_check_bound(seed$0,k)[1 + k];
            accu[1] = combine(accu[1],_i_);
            var
             _j_=extract(accu[1]),
             _k_=(caml_check_bound(s[1],j)[1 + j] ^ _j_) & 1073741823;
            caml_check_bound(s[1],j)[1 + j] = _k_;
            var _l_=i + 1 | 0;
            if(_h_ !== i){var i=_l_;continue}
            break}}
        s[2] = 0;
        return 0}}
    function make(seed)
     {var result=new_state(0);full_init(result,seed);return result}
    function make_self_init(param){return make(caml_sys_random_seed(0))}
    function copy(s){var result=new_state(0);assign(result,s);return result}
    function bits(s)
     {s[2] = (s[2] + 1 | 0) % 55 | 0;
      var
       _d_=s[2],
       curval=caml_check_bound(s[1],_d_)[1 + _d_],
       _e_=(s[2] + 24 | 0) % 55 | 0,
       newval=
        caml_check_bound(s[1],_e_)[1 + _e_]
        +
        (curval ^ (curval >>> 25 | 0) & 31)
        |
        0,
       newval30=newval & 1073741823,
       _f_=s[2];
      caml_check_bound(s[1],_f_)[1 + _f_] = newval30;
      return newval30}
    function intaux(s,n)
     {for(;;)
       {var r=bits(s),v=caml_mod(r,n);
        if(((1073741823 - n | 0) + 1 | 0) < (r - v | 0))continue;
        return v}}
    function int$0(s,bound)
     {if(! (1073741823 < bound))if(0 < bound)return intaux(s,bound);
      return caml_call1(Pervasives[1],cst_Random_int)}
    function int32aux(s,n)
     {for(;;)
       {var b1=bits(s),b2=(bits(s) & 1) << 30,r=b1 | b2,v=caml_mod(r,n);
        if(caml_greaterthan(r - v | 0,(Int32[7] - n | 0) + 1 | 0))continue;
        return v}}
    function int32(s,bound)
     {return caml_lessequal(bound,0)
              ?caml_call1(Pervasives[1],cst_Random_int32)
              :int32aux(s,bound)}
    function int64aux(s,n)
     {for(;;)
       {var
         b1=caml_int64_of_int32(bits(s)),
         b2=caml_int64_shift_left(caml_int64_of_int32(bits(s)),30),
         b3=caml_int64_shift_left(caml_int64_of_int32(bits(s) & 7),60),
         r=caml_int64_or(b1,caml_int64_or(b2,b3)),
         v=runtime.caml_int64_mod(r,n);
        if
         (caml_greaterthan
           (caml_int64_sub(r,v),
            runtime.caml_int64_add(caml_int64_sub(Int64[7],n),_a_)))
         continue;
        return v}}
    function int64(s,bound)
     {return caml_lessequal(bound,_b_)
              ?caml_call1(Pervasives[1],cst_Random_int64)
              :int64aux(s,bound)}
    var
     nativeint=
      32 === Nativeint[7]
       ?function(s,bound){return int32(s,bound)}
       :function(s,bound)
         {return runtime.caml_int64_to_int32
                  (int64(s,caml_int64_of_int32(bound)))};
    function rawfloat(s)
     {var r1=bits(s),r2=bits(s);return (r1 / 1073741824. + r2) / 1073741824.}
    function float$0(s,bound){return rawfloat(s) * bound}
    function bool(s){return 0 === (bits(s) & 1)?1:0}
    var default$0=[0,_c_.slice(),0];
    function bits$0(param){return bits(default$0)}
    function int$1(bound){return int$0(default$0,bound)}
    function int32$0(bound){return int32(default$0,bound)}
    function nativeint$0(bound){return nativeint(default$0,bound)}
    function int64$0(bound){return int64(default$0,bound)}
    function float$1(scale){return float$0(default$0,scale)}
    function bool$0(param){return bool(default$0)}
    function full_init$0(seed){return full_init(default$0,seed)}
    function init(seed){return full_init(default$0,[0,seed])}
    function self_init(param){return full_init$0(caml_sys_random_seed(0))}
    function get_state(param){return copy(default$0)}
    function set_state(s){return assign(default$0,s)}
    var
     Random=
      [0,
       init,
       full_init$0,
       self_init,
       bits$0,
       int$1,
       int32$0,
       nativeint$0,
       int64$0,
       float$1,
       bool$0,
       [0,
        make,
        make_self_init,
        copy,
        bits,
        int$0,
        int32,
        nativeint,
        int64,
        float$0,
        bool],
       get_state,
       set_state];
    runtime.caml_register_global(16,Random,"Random");
    return}
  (function(){return this}()));
