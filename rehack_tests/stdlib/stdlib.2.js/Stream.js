(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_unsafe_get=runtime.caml_bytes_unsafe_get,
     caml_fresh_oo_id=runtime.caml_fresh_oo_id,
     caml_ml_bytes_length=runtime.caml_ml_bytes_length,
     caml_new_string=runtime.caml_new_string,
     caml_obj_tag=runtime.caml_obj_tag;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call4(f,a0,a1,a2,a3)
     {return f.length == 4
              ?f(a0,a1,a2,a3)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_count=caml_new_string("{count = "),
     cst_data=caml_new_string("; data = "),
     cst=caml_new_string("}"),
     cst_Sempty=caml_new_string("Sempty"),
     cst_Scons=caml_new_string("Scons ("),
     cst$0=caml_new_string(", "),
     cst$1=caml_new_string(")"),
     cst_Sapp=caml_new_string("Sapp ("),
     cst$2=caml_new_string(", "),
     cst$3=caml_new_string(")"),
     cst_Slazy=caml_new_string("Slazy"),
     cst_Sgen=caml_new_string("Sgen"),
     cst_Sbuffio=caml_new_string("Sbuffio"),
     cst_Stream_Failure=caml_new_string("Stream.Failure"),
     cst_Stream_Error=caml_new_string("Stream.Error"),
     Assert_failure=global_data.Assert_failure,
     CamlinternalLazy=global_data.CamlinternalLazy,
     Pervasives=global_data.Pervasives,
     List=global_data.List,
     _a_=[0,caml_new_string("stream.ml"),53,12],
     _b_=[0,0],
     _c_=[0,caml_new_string("stream.ml"),82,12],
     Failure=[248,cst_Stream_Failure,caml_fresh_oo_id(0)],
     Error=[248,cst_Stream_Error,caml_fresh_oo_id(0)];
    function count(param)
     {if(param){var match=param[1],count=match[1];return count}return 0}
    function data(param)
     {if(param){var match=param[1],data=match[2];return data}return 0}
    function fill_buff(b)
     {b[3]
      =
      caml_call4(Pervasives[72],b[1],b[2],0,caml_ml_bytes_length(b[2]));
      b[4] = 0;
      return 0}
    function get_data(count,d)
     {var d$0=d;
      for(;;)
       {if(typeof d$0 !== "number")
         switch(d$0[0])
          {case 1:
            var d2=d$0[2],d1=d$0[1],match=get_data(count,d1);
            if(typeof match === "number")
             {var d$0=d2;continue}
            else
             {if(0 === match[0])
               {var d11=match[2],a=match[1];return [0,a,[1,d11,d2]]}
              throw [0,Assert_failure,_a_]}
           case 2:
            var
             f=d$0[1],
             _q_=caml_obj_tag(f),
             d$1=
              250 === _q_?f[1]:246 === _q_?caml_call1(CamlinternalLazy[2],f):f,
             d$0=d$1;
            continue;
           case 3:
            var _r_=d$0[1],_s_=_r_[1];
            if(_s_)
             {var _t_=_s_[1];
              if(_t_){var a$0=_t_[1];_r_[1] = 0;return [0,a$0,d$0]}
              return 0}
            var match$0=caml_call1(_r_[2],count);
            if(match$0){var a$1=match$0[1];return [0,a$1,d$0]}
            _r_[1] = _b_;
            return 0;
           case 4:
            var b=d$0[1];
            if(b[3] <= b[4])fill_buff(b);
            if(0 === b[3])return 0;
            var r=caml_bytes_unsafe_get(b[2],b[4]);
            b[4] = b[4] + 1 | 0;
            return [0,r,d$0]
           }
        return d$0}}
    function peek_data(s)
     {for(;;)
       {var _l_=s[2];
        if(typeof _l_ === "number")
         return 0;
        else
         switch(_l_[0])
          {case 0:var a=_l_[1];return [0,a];
           case 1:
            var d=get_data(s[1],s[2]);
            if(typeof d === "number")
             return 0;
            else
             {if(0 === d[0]){var a$0=d[1];s[2] = d;return [0,a$0]}
              throw [0,Assert_failure,_c_]}
           case 2:
            var
             f=_l_[1],
             _m_=caml_obj_tag(f),
             _n_=
              250 === _m_?f[1]:246 === _m_?caml_call1(CamlinternalLazy[2],f):f;
            s[2] = _n_;
            continue;
           case 3:
            var _o_=_l_[1],_p_=_o_[1];
            if(_p_){var a$1=_p_[1];return a$1}
            var x=caml_call1(_o_[2],s[1]);
            _o_[1] = [0,x];
            return x;
           default:
            var b=_l_[1];
            if(b[3] <= b[4])fill_buff(b);
            return 0 === b[3]
                    ?(s[2] = 0,0)
                    :[0,caml_bytes_unsafe_get(b[2],b[4])]}}}
    function peek(param)
     {if(param){var s=param[1];return peek_data(s)}return 0}
    function junk_data(s)
     {for(;;)
       {var _j_=s[2];
        if(typeof _j_ !== "number")
         switch(_j_[0])
          {case 0:var d=_j_[2];s[1] = s[1] + 1 | 0;s[2] = d;return 0;
           case 3:
            var _k_=_j_[1];
            if(_k_[1]){s[1] = s[1] + 1 | 0;_k_[1] = 0;return 0}
            break;
           case 4:
            var b=_j_[1];s[1] = s[1] + 1 | 0;b[4] = b[4] + 1 | 0;return 0
           }
        var match=peek_data(s);
        if(match)continue;
        return 0}}
    function junk(param)
     {if(param){var data=param[1];return junk_data(data)}return 0}
    function nget_data(n,s)
     {if(0 < n)
       {var match=peek_data(s);
        if(match)
         {var a=match[1];
          junk_data(s);
          var
           match$0=nget_data(n - 1 | 0,s),
           k=match$0[3],
           d=match$0[2],
           al=match$0[1];
          return [0,[0,a,al],[0,a,d],k + 1 | 0]}
        return [0,0,s[2],0]}
      return [0,0,s[2],0]}
    function npeek_data(n,s)
     {var match=nget_data(n,s),len=match[3],d=match[2],al=match[1];
      s[1] = s[1] - len | 0;
      s[2] = d;
      return al}
    function npeek(n,param)
     {if(param){var d=param[1];return npeek_data(n,d)}return 0}
    function next(s)
     {var match=peek(s);
      if(match){var a=match[1];junk(s);return a}
      throw Failure}
    function empty(s){var match=peek(s);if(match)throw Failure;return 0}
    function iter(f,strm)
     {function do_rec(param)
       {for(;;)
         {var match=peek(strm);
          if(match){var a=match[1];junk(strm);caml_call1(f,a);continue}
          return 0}}
      return do_rec(0)}
    function from(f){return [0,[0,0,[3,[0,0,f]]]]}
    function of_list(l)
     {var _h_=0;
      function _i_(x,l){return [0,x,l]}
      return [0,[0,0,caml_call3(List[21],_i_,l,_h_)]]}
    function of_string(s)
     {var count=[0,0];
      return from
              (function(param)
                {var c=count[1];
                 return c < runtime.caml_ml_string_length(s)
                         ?(count[1]++,[0,runtime.caml_string_get(s,c)])
                         :0})}
    function of_bytes(s)
     {var count=[0,0];
      return from
              (function(param)
                {var c=count[1];
                 return c < caml_ml_bytes_length(s)
                         ?(count[1]++,[0,runtime.caml_bytes_get(s,c)])
                         :0})}
    function of_channel(ic)
     {return [0,[0,0,[4,[0,ic,runtime.caml_create_bytes(4096),0,0]]]]}
    function iapp(i,s){var _g_=data(s);return [0,[0,0,[1,data(i),_g_]]]}
    function icons(i,s){return [0,[0,0,[0,i,data(s)]]]}
    function ising(i){return [0,[0,0,[0,i,0]]]}
    function lapp(f,s)
     {return [0,
              [0,
               0,
               [2,
                [246,
                 function(param)
                  {var _f_=data(s);return [1,data(caml_call1(f,0)),_f_]}]]]]}
    function lcons(f,s)
     {return [0,
              [0,
               0,
               [2,
                [246,
                 function(param)
                  {var _e_=data(s);return [0,caml_call1(f,0),_e_]}]]]]}
    function lsing(f)
     {return [0,[0,0,[2,[246,function(param){return [0,caml_call1(f,0),0]}]]]]}
    var sempty=0;
    function slazy(f)
     {return [0,[0,0,[2,[246,function(param){return data(caml_call1(f,0))}]]]]}
    function dump(f,s)
     {caml_call1(Pervasives[30],cst_count);
      var _d_=count(s);
      caml_call1(Pervasives[32],_d_);
      caml_call1(Pervasives[30],cst_data);
      dump_data(f,data(s));
      caml_call1(Pervasives[30],cst);
      return caml_call1(Pervasives[35],0)}
    function dump_data(f,param)
     {if(typeof param === "number")
       return caml_call1(Pervasives[30],cst_Sempty);
      else
       switch(param[0])
        {case 0:
          var d=param[2],a=param[1];
          caml_call1(Pervasives[30],cst_Scons);
          caml_call1(f,a);
          caml_call1(Pervasives[30],cst$0);
          dump_data(f,d);
          return caml_call1(Pervasives[30],cst$1);
         case 1:
          var d2=param[2],d1=param[1];
          caml_call1(Pervasives[30],cst_Sapp);
          dump_data(f,d1);
          caml_call1(Pervasives[30],cst$2);
          dump_data(f,d2);
          return caml_call1(Pervasives[30],cst$3);
         case 2:return caml_call1(Pervasives[30],cst_Slazy);
         case 3:return caml_call1(Pervasives[30],cst_Sgen);
         default:return caml_call1(Pervasives[30],cst_Sbuffio)}}
    var
     Stream=
      [0,
       Failure,
       Error,
       from,
       of_list,
       of_string,
       of_bytes,
       of_channel,
       iter,
       next,
       empty,
       peek,
       junk,
       count,
       npeek,
       iapp,
       icons,
       ising,
       lapp,
       lcons,
       lsing,
       sempty,
       slazy,
       dump];
    runtime.caml_register_global(22,Stream,"Stream");
    return}
  (function(){return this}()));
