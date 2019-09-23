(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_array_sub=runtime.caml_array_sub,
     caml_check_bound=runtime.caml_check_bound,
     caml_make_vect=runtime.caml_make_vect,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Array_map2_arrays_must_have_the_same_length=
      caml_new_string("Array.map2: arrays must have the same length"),
     cst_Array_iter2_arrays_must_have_the_same_length=
      caml_new_string("Array.iter2: arrays must have the same length"),
     cst_Array_blit=caml_new_string("Array.blit"),
     cst_Array_fill=caml_new_string("Array.fill"),
     cst_Array_sub=caml_new_string("Array.sub"),
     cst_Array_init=caml_new_string("Array.init"),
     cst_Array_Bottom=caml_new_string("Array.Bottom"),
     Assert_failure=global_data.Assert_failure,
     Pervasives=global_data.Pervasives,
     _a_=[0,caml_new_string("array.ml"),233,4];
    function make_float(_ah_){return runtime.caml_make_float_vect(_ah_)}
    var Floatarray=[0];
    function init(l,f)
     {if(0 === l)return [0];
      if(0 <= l)
       {var res=caml_make_vect(l,caml_call1(f,0)),_af_=l - 1 | 0,_ae_=1;
        if(! (_af_ < 1))
         {var i=_ae_;
          for(;;)
           {res[1 + i] = caml_call1(f,i);
            var _ag_=i + 1 | 0;
            if(_af_ !== i){var i=_ag_;continue}
            break}}
        return res}
      return caml_call1(Pervasives[1],cst_Array_init)}
    function make_matrix(sx,sy,init)
     {var res=caml_make_vect(sx,[0]),_ac_=sx - 1 | 0,_ab_=0;
      if(! (_ac_ < 0))
       {var x=_ab_;
        for(;;)
         {res[1 + x] = caml_make_vect(sy,init);
          var _ad_=x + 1 | 0;
          if(_ac_ !== x){var x=_ad_;continue}
          break}}
      return res}
    function copy(a)
     {var l=a.length - 1;return 0 === l?[0]:caml_array_sub(a,0,l)}
    function append(a1,a2)
     {var l1=a1.length - 1;
      return 0 === l1
              ?copy(a2)
              :0 === a2.length - 1
                ?caml_array_sub(a1,0,l1)
                :runtime.caml_array_append(a1,a2)}
    function sub(a,ofs,len)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((a.length - 1 - len | 0) < ofs))
         return caml_array_sub(a,ofs,len);
      return caml_call1(Pervasives[1],cst_Array_sub)}
    function fill(a,ofs,len,v)
     {if(0 <= ofs)
       if(0 <= len)
        if(! ((a.length - 1 - len | 0) < ofs))
         {var _$_=(ofs + len | 0) - 1 | 0;
          if(! (_$_ < ofs))
           {var i=ofs;
            for(;;)
             {a[1 + i] = v;
              var _aa_=i + 1 | 0;
              if(_$_ !== i){var i=_aa_;continue}
              break}}
          return 0}
      return caml_call1(Pervasives[1],cst_Array_fill)}
    function blit(a1,ofs1,a2,ofs2,len)
     {if(0 <= len)
       if(0 <= ofs1)
        if(! ((a1.length - 1 - len | 0) < ofs1))
         if(0 <= ofs2)
          if(! ((a2.length - 1 - len | 0) < ofs2))
           return runtime.caml_array_blit(a1,ofs1,a2,ofs2,len);
      return caml_call1(Pervasives[1],cst_Array_blit)}
    function iter(f,a)
     {var _Z_=a.length - 1 - 1 | 0,_Y_=0;
      if(! (_Z_ < 0))
       {var i=_Y_;
        for(;;)
         {caml_call1(f,a[1 + i]);
          var ___=i + 1 | 0;
          if(_Z_ !== i){var i=___;continue}
          break}}
      return 0}
    function iter2(f,a,b)
     {if(a.length - 1 !== b.length - 1)
       return caml_call1
               (Pervasives[1],
                cst_Array_iter2_arrays_must_have_the_same_length);
      var _W_=a.length - 1 - 1 | 0,_V_=0;
      if(! (_W_ < 0))
       {var i=_V_;
        for(;;)
         {caml_call2(f,a[1 + i],b[1 + i]);
          var _X_=i + 1 | 0;
          if(_W_ !== i){var i=_X_;continue}
          break}}
      return 0}
    function map(f,a)
     {var l=a.length - 1;
      if(0 === l)return [0];
      var r=caml_make_vect(l,caml_call1(f,a[1])),_T_=l - 1 | 0,_S_=1;
      if(! (_T_ < 1))
       {var i=_S_;
        for(;;)
         {r[1 + i] = caml_call1(f,a[1 + i]);
          var _U_=i + 1 | 0;
          if(_T_ !== i){var i=_U_;continue}
          break}}
      return r}
    function map2(f,a,b)
     {var la=a.length - 1,lb=b.length - 1;
      if(la !== lb)
       return caml_call1
               (Pervasives[1],cst_Array_map2_arrays_must_have_the_same_length);
      if(0 === la)return [0];
      var r=caml_make_vect(la,caml_call2(f,a[1],b[1])),_Q_=la - 1 | 0,_P_=1;
      if(! (_Q_ < 1))
       {var i=_P_;
        for(;;)
         {r[1 + i] = caml_call2(f,a[1 + i],b[1 + i]);
          var _R_=i + 1 | 0;
          if(_Q_ !== i){var i=_R_;continue}
          break}}
      return r}
    function iteri(f,a)
     {var _N_=a.length - 1 - 1 | 0,_M_=0;
      if(! (_N_ < 0))
       {var i=_M_;
        for(;;)
         {caml_call2(f,i,a[1 + i]);
          var _O_=i + 1 | 0;
          if(_N_ !== i){var i=_O_;continue}
          break}}
      return 0}
    function mapi(f,a)
     {var l=a.length - 1;
      if(0 === l)return [0];
      var r=caml_make_vect(l,caml_call2(f,0,a[1])),_K_=l - 1 | 0,_J_=1;
      if(! (_K_ < 1))
       {var i=_J_;
        for(;;)
         {r[1 + i] = caml_call2(f,i,a[1 + i]);
          var _L_=i + 1 | 0;
          if(_K_ !== i){var i=_L_;continue}
          break}}
      return r}
    function to_list(a)
     {function tolist(i,res)
       {var i$0=i,res$0=res;
        for(;;)
         {if(0 <= i$0)
           {var
             res$1=[0,a[1 + i$0],res$0],
             i$1=i$0 - 1 | 0,
             i$0=i$1,
             res$0=res$1;
            continue}
          return res$0}}
      return tolist(a.length - 1 - 1 | 0,0)}
    function list_length(accu,param)
     {var accu$0=accu,param$0=param;
      for(;;)
       {if(param$0)
         {var
           param$1=param$0[2],
           accu$1=accu$0 + 1 | 0,
           accu$0=accu$1,
           param$0=param$1;
          continue}
        return accu$0}}
    function of_list(l)
     {if(l)
       {var
         tl=l[2],
         hd=l[1],
         a=caml_make_vect(list_length(0,l),hd),
         fill=
          function(i,param)
           {var i$0=i,param$0=param;
            for(;;)
             {if(param$0)
               {var param$1=param$0[2],hd=param$0[1];
                a[1 + i$0] = hd;
                var i$1=i$0 + 1 | 0,i$0=i$1,param$0=param$1;
                continue}
              return a}};
        return fill(1,tl)}
      return [0]}
    function fold_left(f,x,a)
     {var r=[0,x],_H_=a.length - 1 - 1 | 0,_G_=0;
      if(! (_H_ < 0))
       {var i=_G_;
        for(;;)
         {r[1] = caml_call2(f,r[1],a[1 + i]);
          var _I_=i + 1 | 0;
          if(_H_ !== i){var i=_I_;continue}
          break}}
      return r[1]}
    function fold_right(f,a,x)
     {var r=[0,x],_E_=a.length - 1 - 1 | 0;
      if(! (_E_ < 0))
       {var i=_E_;
        for(;;)
         {r[1] = caml_call2(f,a[1 + i],r[1]);
          var _F_=i - 1 | 0;
          if(0 !== i){var i=_F_;continue}
          break}}
      return r[1]}
    function exists(p,a)
     {var n=a.length - 1;
      function loop(i)
       {var i$0=i;
        for(;;)
         {if(i$0 === n)return 0;
          if(caml_call1(p,a[1 + i$0]))return 1;
          var i$1=i$0 + 1 | 0,i$0=i$1;
          continue}}
      return loop(0)}
    function for_all(p,a)
     {var n=a.length - 1;
      function loop(i)
       {var i$0=i;
        for(;;)
         {if(i$0 === n)return 1;
          if(caml_call1(p,a[1 + i$0])){var i$1=i$0 + 1 | 0,i$0=i$1;continue}
          return 0}}
      return loop(0)}
    function mem(x,a)
     {var n=a.length - 1;
      function loop(i)
       {var i$0=i;
        for(;;)
         {if(i$0 === n)return 0;
          if(0 === runtime.caml_compare(a[1 + i$0],x))return 1;
          var i$1=i$0 + 1 | 0,i$0=i$1;
          continue}}
      return loop(0)}
    function memq(x,a)
     {var n=a.length - 1;
      function loop(i)
       {var i$0=i;
        for(;;)
         {if(i$0 === n)return 0;
          if(x === a[1 + i$0])return 1;
          var i$1=i$0 + 1 | 0,i$0=i$1;
          continue}}
      return loop(0)}
    var Bottom=[248,cst_Array_Bottom,runtime.caml_fresh_oo_id(0)];
    function sort(cmp,a)
     {function maxson(l,i)
       {var i31=((i + i | 0) + i | 0) + 1 | 0,x=[0,i31];
        if((i31 + 2 | 0) < l)
         {var _x_=i31 + 1 | 0,_y_=caml_check_bound(a,_x_)[1 + _x_];
          if(caml_call2(cmp,caml_check_bound(a,i31)[1 + i31],_y_) < 0)
           x[1] = i31 + 1 | 0;
          var _z_=i31 + 2 | 0,_A_=caml_check_bound(a,_z_)[1 + _z_],_B_=x[1];
          if(caml_call2(cmp,caml_check_bound(a,_B_)[1 + _B_],_A_) < 0)
           x[1] = i31 + 2 | 0;
          return x[1]}
        if((i31 + 1 | 0) < l)
         {var _C_=i31 + 1 | 0,_D_=caml_check_bound(a,_C_)[1 + _C_];
          if(! (0 <= caml_call2(cmp,caml_check_bound(a,i31)[1 + i31],_D_)))
           return i31 + 1 | 0}
        if(i31 < l)return i31;
        throw [0,Bottom,i]}
      function trickledown(l,i,e)
       {var i$0=i;
        for(;;)
         {var j=maxson(l,i$0);
          if(0 < caml_call2(cmp,caml_check_bound(a,j)[1 + j],e))
           {var _w_=caml_check_bound(a,j)[1 + j];
            caml_check_bound(a,i$0)[1 + i$0] = _w_;
            var i$0=j;
            continue}
          caml_check_bound(a,i$0)[1 + i$0] = e;
          return 0}}
      function trickle(l,i,e)
       {try
         {var _v_=trickledown(l,i,e);return _v_}
        catch(exn)
         {exn = caml_wrap_exception(exn);
          if(exn[1] === Bottom)
           {var i$0=exn[2];caml_check_bound(a,i$0)[1 + i$0] = e;return 0}
          throw exn}}
      function bubbledown(l,i)
       {var i$0=i;
        for(;;)
         {var i$1=maxson(l,i$0),_u_=caml_check_bound(a,i$1)[1 + i$1];
          caml_check_bound(a,i$0)[1 + i$0] = _u_;
          var i$0=i$1;
          continue}}
      function bubble(l,i)
       {try
         {var _t_=bubbledown(l,i);return _t_}
        catch(exn)
         {exn = caml_wrap_exception(exn);
          if(exn[1] === Bottom){var i$0=exn[2];return i$0}
          throw exn}}
      function trickleup(i,e)
       {var i$0=i;
        for(;;)
         {var father=(i$0 - 1 | 0) / 3 | 0;
          if(i$0 !== father)
           {if(0 <= caml_call2(cmp,caml_check_bound(a,father)[1 + father],e))
             {caml_check_bound(a,i$0)[1 + i$0] = e;return 0}
            var _s_=caml_check_bound(a,father)[1 + father];
            caml_check_bound(a,i$0)[1 + i$0] = _s_;
            if(0 < father){var i$0=father;continue}
            caml_check_bound(a,0)[1] = e;
            return 0}
          throw [0,Assert_failure,_a_]}}
      var l=a.length - 1,_m_=((l + 1 | 0) / 3 | 0) - 1 | 0;
      if(! (_m_ < 0))
       {var i$0=_m_;
        for(;;)
         {trickle(l,i$0,caml_check_bound(a,i$0)[1 + i$0]);
          var _r_=i$0 - 1 | 0;
          if(0 !== i$0){var i$0=_r_;continue}
          break}}
      var _n_=l - 1 | 0;
      if(! (_n_ < 2))
       {var i=_n_;
        for(;;)
         {var e$0=caml_check_bound(a,i)[1 + i];
          a[1 + i] = caml_check_bound(a,0)[1];
          trickleup(bubble(i,0),e$0);
          var _q_=i - 1 | 0;
          if(2 !== i){var i=_q_;continue}
          break}}
      var _o_=1 < l?1:0;
      if(_o_)
       {var e=caml_check_bound(a,1)[2];
        a[2] = caml_check_bound(a,0)[1];
        a[1] = e;
        var _p_=0}
      else
       var _p_=_o_;
      return _p_}
    function stable_sort(cmp,a)
     {function merge(src1ofs,src1len,src2,src2ofs,src2len,dst,dstofs)
       {var src1r=src1ofs + src1len | 0,src2r=src2ofs + src2len | 0;
        function loop(i1,s1,i2,s2,d)
         {var i1$0=i1,s1$0=s1,i2$0=i2,s2$0=s2,d$0=d;
          for(;;)
           {if(0 < caml_call2(cmp,s1$0,s2$0))
             {caml_check_bound(dst,d$0)[1 + d$0] = s2$0;
              var i2$1=i2$0 + 1 | 0;
              if(i2$1 < src2r)
               {var
                 d$1=d$0 + 1 | 0,
                 s2$1=caml_check_bound(src2,i2$1)[1 + i2$1],
                 i2$0=i2$1,
                 s2$0=s2$1,
                 d$0=d$1;
                continue}
              return blit(a,i1$0,dst,d$0 + 1 | 0,src1r - i1$0 | 0)}
            caml_check_bound(dst,d$0)[1 + d$0] = s1$0;
            var i1$1=i1$0 + 1 | 0;
            if(i1$1 < src1r)
             {var
               d$2=d$0 + 1 | 0,
               s1$1=caml_check_bound(a,i1$1)[1 + i1$1],
               i1$0=i1$1,
               s1$0=s1$1,
               d$0=d$2;
              continue}
            return blit(src2,i2$0,dst,d$0 + 1 | 0,src2r - i2$0 | 0)}}
        var _l_=caml_check_bound(src2,src2ofs)[1 + src2ofs];
        return loop
                (src1ofs,
                 caml_check_bound(a,src1ofs)[1 + src1ofs],
                 src2ofs,
                 _l_,
                 dstofs)}
      function isortto(srcofs,dst,dstofs,len)
       {var _d_=len - 1 | 0,_c_=0;
        if(! (_d_ < 0))
         {var i=_c_;
          a:
          for(;;)
           {var
             _e_=srcofs + i | 0,
             e=caml_check_bound(a,_e_)[1 + _e_],
             j=[0,(dstofs + i | 0) - 1 | 0];
            for(;;)
             {if(dstofs <= j[1])
               {var _f_=j[1];
                if(0 < caml_call2(cmp,caml_check_bound(dst,_f_)[1 + _f_],e))
                 {var
                   _g_=j[1],
                   _h_=caml_check_bound(dst,_g_)[1 + _g_],
                   _i_=j[1] + 1 | 0;
                  caml_check_bound(dst,_i_)[1 + _i_] = _h_;
                  j[1] += -1;
                  continue}}
              var _j_=j[1] + 1 | 0;
              caml_check_bound(dst,_j_)[1 + _j_] = e;
              var _k_=i + 1 | 0;
              if(_d_ !== i){var i=_k_;continue a}
              break}
            break}}
        return 0}
      function sortto(srcofs,dst,dstofs,len)
       {if(len <= 5)return isortto(srcofs,dst,dstofs,len);
        var l1=len / 2 | 0,l2=len - l1 | 0;
        sortto(srcofs + l1 | 0,dst,dstofs + l1 | 0,l2);
        sortto(srcofs,a,srcofs + l2 | 0,l1);
        return merge(srcofs + l2 | 0,l1,dst,dstofs + l1 | 0,l2,dst,dstofs)}
      var l=a.length - 1;
      if(l <= 5)return isortto(0,a,0,l);
      var
       l1=l / 2 | 0,
       l2=l - l1 | 0,
       t=caml_make_vect(l2,caml_check_bound(a,0)[1]);
      sortto(l1,t,0,l2);
      sortto(0,a,l2,l1);
      return merge(l2,l1,t,0,l2,a,0)}
    var
     Array=
      [0,
       make_float,
       init,
       make_matrix,
       make_matrix,
       append,
       function(_b_){return runtime.caml_array_concat(_b_)},
       sub,
       copy,
       fill,
       blit,
       to_list,
       of_list,
       iter,
       iteri,
       map,
       mapi,
       fold_left,
       fold_right,
       iter2,
       map2,
       for_all,
       exists,
       mem,
       memq,
       sort,
       stable_sort,
       stable_sort,
       Floatarray];
    runtime.caml_register_global(10,Array,"Array");
    return}
  (function(){return this}()));
