(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_make_vect=runtime.caml_make_vect,
     caml_mod=runtime.caml_mod,
     caml_new_string=runtime.caml_new_string,
     caml_obj_truncate=runtime.caml_obj_truncate,
     caml_weak_blit=runtime.caml_weak_blit,
     caml_weak_check=runtime.caml_weak_check,
     caml_weak_create=runtime.caml_weak_create,
     caml_weak_get=runtime.caml_weak_get,
     caml_weak_get_copy=runtime.caml_weak_get_copy,
     caml_weak_set=runtime.caml_weak_set;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Weak_Make_hash_bucket_cannot_grow_more=
      caml_new_string("Weak.Make: hash bucket cannot grow more"),
     cst_Weak_fill=caml_new_string("Weak.fill"),
     Pervasives=global_data.Pervasives,
     Sys=global_data.Sys,
     Array=global_data.Array,
     Not_found=global_data.Not_found,
     Invalid_argument=global_data.Invalid_argument;
    function length(x){return x.length - 1 - 2 | 0}
    function fill(ar,ofs,len,x)
     {if(0 <= ofs)
       if(0 <= len)
        if(! (length(ar) < (ofs + len | 0)))
         {var _aA_=(ofs + len | 0) - 1 | 0;
          if(! (_aA_ < ofs))
           {var i=ofs;
            for(;;)
             {caml_weak_set(ar,i,x);
              var _aB_=i + 1 | 0;
              if(_aA_ !== i){var i=_aB_;continue}
              break}}
          return 0}
      throw [0,Invalid_argument,cst_Weak_fill]}
    function Make(H)
     {function weak_create(_az_){return caml_weak_create(_az_)}
      var emptybucket=weak_create(0);
      function get_index(t,h)
       {return caml_mod(h & Pervasives[7],t[1].length - 1)}
      var limit=7;
      function create(sz)
       {var sz$0=7 <= sz?sz:7,sz$1=Sys[14] < sz$0?Sys[14]:sz$0;
        return [0,
                caml_make_vect(sz$1,emptybucket),
                caml_make_vect(sz$1,[0]),
                limit,
                0,
                0]}
      function clear(t)
       {var _ax_=t[1].length - 1 - 1 | 0,_aw_=0;
        if(! (_ax_ < 0))
         {var i=_aw_;
          for(;;)
           {caml_check_bound(t[1],i)[1 + i] = emptybucket;
            caml_check_bound(t[2],i)[1 + i] = [0];
            var _ay_=i + 1 | 0;
            if(_ax_ !== i){var i=_ay_;continue}
            break}}
        t[3] = limit;
        t[4] = 0;
        return 0}
      function fold(f,t,init)
       {function fold_bucket(i,b,accu)
         {var i$0=i,accu$0=accu;
          for(;;)
           {if(length(b) <= i$0)return accu$0;
            var match=caml_weak_get(b,i$0);
            if(match)
             {var
               v=match[1],
               accu$1=caml_call2(f,v,accu$0),
               i$1=i$0 + 1 | 0,
               i$0=i$1,
               accu$0=accu$1;
              continue}
            var i$2=i$0 + 1 | 0,i$0=i$2;
            continue}}
        var _ar_=t[1],_as_=0;
        function _at_(_au_,_av_){return fold_bucket(_as_,_au_,_av_)}
        return caml_call3(Array[18],_at_,_ar_,init)}
      function iter(f,t)
       {function iter_bucket(i,b)
         {var i$0=i;
          for(;;)
           {if(length(b) <= i$0)return 0;
            var match=caml_weak_get(b,i$0);
            if(match)
             {var v=match[1];
              caml_call1(f,v);
              var i$1=i$0 + 1 | 0,i$0=i$1;
              continue}
            var i$2=i$0 + 1 | 0,i$0=i$2;
            continue}}
        var _an_=t[1],_ao_=0;
        function _ap_(_aq_){return iter_bucket(_ao_,_aq_)}
        return caml_call2(Array[13],_ap_,_an_)}
      function iter_weak(f,t)
       {function iter_bucket(i,j,b)
         {var i$0=i;
          for(;;)
           {if(length(b) <= i$0)return 0;
            var match=caml_weak_check(b,i$0);
            if(0 === match){var i$1=i$0 + 1 | 0,i$0=i$1;continue}
            caml_call3(f,b,caml_check_bound(t[2],j)[1 + j],i$0);
            var i$2=i$0 + 1 | 0,i$0=i$2;
            continue}}
        var _ai_=t[1],_aj_=0;
        function _ak_(_al_,_am_){return iter_bucket(_aj_,_al_,_am_)}
        return caml_call2(Array[14],_ak_,_ai_)}
      function count_bucket(i,b,accu)
       {var i$0=i,accu$0=accu;
        for(;;)
         {if(length(b) <= i$0)return accu$0;
          var
           _ah_=caml_weak_check(b,i$0)?1:0,
           accu$1=accu$0 + _ah_ | 0,
           i$1=i$0 + 1 | 0,
           i$0=i$1,
           accu$0=accu$1;
          continue}}
      function count(t)
       {var _ab_=0,_ac_=t[1],_ad_=0;
        function _ae_(_af_,_ag_){return count_bucket(_ad_,_af_,_ag_)}
        return caml_call3(Array[18],_ae_,_ac_,_ab_)}
      function next_sz(n)
       {return caml_call2(Pervasives[4],((3 * n | 0) / 2 | 0) + 3 | 0,Sys[14])}
      function prev_sz(n){return (((n - 3 | 0) * 2 | 0) + 2 | 0) / 3 | 0}
      function test_shrink_bucket(t)
       {var
         _V_=t[5],
         bucket=caml_check_bound(t[1],_V_)[1 + _V_],
         _W_=t[5],
         hbucket=caml_check_bound(t[2],_W_)[1 + _W_],
         len=length(bucket),
         prev_len=prev_sz(len),
         live=count_bucket(0,bucket,0);
        if(live <= prev_len)
         {var
           loop=
            function(i,j)
             {var i$0=i,j$0=j;
              for(;;)
               {var _$_=prev_len <= j$0?1:0;
                if(_$_)
                 {if(caml_weak_check(bucket,i$0))
                   {var i$1=i$0 + 1 | 0,i$0=i$1;continue}
                  if(caml_weak_check(bucket,j$0))
                   {caml_weak_blit(bucket,j$0,bucket,i$0,1);
                    var _aa_=caml_check_bound(hbucket,j$0)[1 + j$0];
                    caml_check_bound(hbucket,i$0)[1 + i$0] = _aa_;
                    var j$1=j$0 - 1 | 0,i$2=i$0 + 1 | 0,i$0=i$2,j$0=j$1;
                    continue}
                  var j$2=j$0 - 1 | 0,j$0=j$2;
                  continue}
                return _$_}};
          loop(0,length(bucket) - 1 | 0);
          if(0 === prev_len)
           {var _X_=t[5];
            caml_check_bound(t[1],_X_)[1 + _X_] = emptybucket;
            var _Y_=t[5];
            caml_check_bound(t[2],_Y_)[1 + _Y_] = [0]}
          else
           {caml_obj_truncate(bucket,prev_len + 2 | 0);
            caml_obj_truncate(hbucket,prev_len)}
          var _Z_=t[3] < len?1:0,___=_Z_?prev_len <= t[3]?1:0:_Z_;
          if(___)t[4] = t[4] - 1 | 0}
        t[5] = caml_mod(t[5] + 1 | 0,t[1].length - 1);
        return 0}
      function resize(t)
       {var oldlen=t[1].length - 1,newlen=next_sz(oldlen);
        if(oldlen < newlen)
         {var
           newt=create(newlen),
           add_weak=
            function(ob,oh,oi)
             {function setter(nb,ni,param)
               {return caml_weak_blit(ob,oi,nb,ni,1)}
              var h=caml_check_bound(oh,oi)[1 + oi];
              return add_aux(newt,setter,0,h,get_index(newt,h))};
          iter_weak(add_weak,t);
          t[1] = newt[1];
          t[2] = newt[2];
          t[3] = newt[3];
          t[4] = newt[4];
          t[5] = caml_mod(t[5],newt[1].length - 1);
          return 0}
        t[3] = Pervasives[7];
        t[4] = 0;
        return 0}
      function add_aux(t,setter,d,h,index)
       {var
         bucket=caml_check_bound(t[1],index)[1 + index],
         hashes=caml_check_bound(t[2],index)[1 + index],
         sz=length(bucket);
        function loop(i)
         {var i$0=i;
          for(;;)
           {if(sz <= i$0)
             {var
               newsz=
                caml_call2
                 (Pervasives[4],
                  ((3 * sz | 0) / 2 | 0) + 3 | 0,
                  Sys[14] - 2 | 0);
              if(newsz <= sz)
               caml_call1
                (Pervasives[2],cst_Weak_Make_hash_bucket_cannot_grow_more);
              var
               newbucket=weak_create(newsz),
               newhashes=caml_make_vect(newsz,0);
              caml_weak_blit(bucket,0,newbucket,0,sz);
              caml_call5(Array[10],hashes,0,newhashes,0,sz);
              caml_call3(setter,newbucket,sz,d);
              caml_check_bound(newhashes,sz)[1 + sz] = h;
              caml_check_bound(t[1],index)[1 + index] = newbucket;
              caml_check_bound(t[2],index)[1 + index] = newhashes;
              var _R_=sz <= t[3]?1:0,_S_=_R_?t[3] < newsz?1:0:_R_;
              if(_S_)
               {t[4] = t[4] + 1 | 0;
                var i$1=0;
                for(;;)
                 {test_shrink_bucket(t);
                  var _U_=i$1 + 1 | 0;
                  if(2 !== i$1){var i$1=_U_;continue}
                  break}}
              var _T_=((t[1].length - 1) / 2 | 0) < t[4]?1:0;
              return _T_?resize(t):_T_}
            if(caml_weak_check(bucket,i$0))
             {var i$2=i$0 + 1 | 0,i$0=i$2;continue}
            caml_call3(setter,bucket,i$0,d);
            caml_check_bound(hashes,i$0)[1 + i$0] = h;
            return 0}}
        return loop(0)}
      function add(t,d)
       {var h=caml_call1(H[2],d),_M_=get_index(t,h),_N_=[0,d];
        return add_aux
                (t,
                 function(_Q_,_P_,_O_){return caml_weak_set(_Q_,_P_,_O_)},
                 _N_,
                 h,
                 _M_)}
      function find_or(t,d,ifnotfound)
       {var
         h=caml_call1(H[2],d),
         index=get_index(t,h),
         bucket=caml_check_bound(t[1],index)[1 + index],
         hashes=caml_check_bound(t[2],index)[1 + index],
         sz=length(bucket);
        function loop(i)
         {var i$0=i;
          for(;;)
           {if(sz <= i$0)return caml_call2(ifnotfound,h,index);
            if(h === caml_check_bound(hashes,i$0)[1 + i$0])
             {var match=caml_weak_get_copy(bucket,i$0);
              if(match)
               {var v=match[1];
                if(caml_call2(H[1],v,d))
                 {var match$0=caml_weak_get(bucket,i$0);
                  if(match$0){var v$0=match$0[1];return v$0}
                  var i$1=i$0 + 1 | 0,i$0=i$1;
                  continue}}
              var i$2=i$0 + 1 | 0,i$0=i$2;
              continue}
            var i$3=i$0 + 1 | 0,i$0=i$3;
            continue}}
        return loop(0)}
      function merge(t,d)
       {return find_or
                (t,
                 d,
                 function(h,index)
                  {var _I_=[0,d];
                   add_aux
                    (t,
                     function(_L_,_K_,_J_){return caml_weak_set(_L_,_K_,_J_)},
                     _I_,
                     h,
                     index);
                   return d})}
      function find(t,d)
       {return find_or(t,d,function(h,index){throw Not_found})}
      function find_opt(t,d)
       {var
         h=caml_call1(H[2],d),
         index=get_index(t,h),
         bucket=caml_check_bound(t[1],index)[1 + index],
         hashes=caml_check_bound(t[2],index)[1 + index],
         sz=length(bucket);
        function loop(i)
         {var i$0=i;
          for(;;)
           {if(sz <= i$0)return 0;
            if(h === caml_check_bound(hashes,i$0)[1 + i$0])
             {var match=caml_weak_get_copy(bucket,i$0);
              if(match)
               {var v=match[1];
                if(caml_call2(H[1],v,d))
                 {var v$0=caml_weak_get(bucket,i$0);
                  if(v$0)return v$0;
                  var i$1=i$0 + 1 | 0,i$0=i$1;
                  continue}}
              var i$2=i$0 + 1 | 0,i$0=i$2;
              continue}
            var i$3=i$0 + 1 | 0,i$0=i$3;
            continue}}
        return loop(0)}
      function find_shadow(t,d,iffound,ifnotfound)
       {var
         h=caml_call1(H[2],d),
         index=get_index(t,h),
         bucket=caml_check_bound(t[1],index)[1 + index],
         hashes=caml_check_bound(t[2],index)[1 + index],
         sz=length(bucket);
        function loop(i)
         {var i$0=i;
          for(;;)
           {if(sz <= i$0)return ifnotfound;
            if(h === caml_check_bound(hashes,i$0)[1 + i$0])
             {var match=caml_weak_get_copy(bucket,i$0);
              if(match)
               {var v=match[1];
                if(caml_call2(H[1],v,d))return caml_call2(iffound,bucket,i$0)}
              var i$1=i$0 + 1 | 0,i$0=i$1;
              continue}
            var i$2=i$0 + 1 | 0,i$0=i$2;
            continue}}
        return loop(0)}
      function remove(t,d)
       {var _H_=0;
        return find_shadow(t,d,function(w,i){return caml_weak_set(w,i,0)},_H_)}
      function mem(t,d)
       {var _G_=0;return find_shadow(t,d,function(w,i){return 1},_G_)}
      function find_all(t,d)
       {var
         h=caml_call1(H[2],d),
         index=get_index(t,h),
         bucket=caml_check_bound(t[1],index)[1 + index],
         hashes=caml_check_bound(t[2],index)[1 + index],
         sz=length(bucket);
        function loop(i,accu)
         {var i$0=i,accu$0=accu;
          for(;;)
           {if(sz <= i$0)return accu$0;
            if(h === caml_check_bound(hashes,i$0)[1 + i$0])
             {var match=caml_weak_get_copy(bucket,i$0);
              if(match)
               {var v=match[1];
                if(caml_call2(H[1],v,d))
                 {var match$0=caml_weak_get(bucket,i$0);
                  if(match$0)
                   {var
                     v$0=match$0[1],
                     accu$1=[0,v$0,accu$0],
                     i$1=i$0 + 1 | 0,
                     i$0=i$1,
                     accu$0=accu$1;
                    continue}
                  var i$2=i$0 + 1 | 0,i$0=i$2;
                  continue}}
              var i$3=i$0 + 1 | 0,i$0=i$3;
              continue}
            var i$4=i$0 + 1 | 0,i$0=i$4;
            continue}}
        return loop(0,0)}
      function stats(t)
       {var len=t[1].length - 1,lens=caml_call2(Array[15],length,t[1]);
        function _u_(_F_,_E_){return runtime.caml_int_compare(_F_,_E_)}
        caml_call2(Array[25],_u_,lens);
        var _v_=0;
        function _w_(_D_,_C_){return _D_ + _C_ | 0}
        var
         totlen=caml_call3(Array[17],_w_,_v_,lens),
         _x_=len - 1 | 0,
         _z_=len / 2 | 0,
         _y_=caml_check_bound(lens,_x_)[1 + _x_],
         _A_=caml_check_bound(lens,_z_)[1 + _z_],
         _B_=caml_check_bound(lens,0)[1];
        return [0,len,count(t),totlen,_B_,_A_,_y_]}
      return [0,
              create,
              clear,
              merge,
              add,
              remove,
              find,
              find_opt,
              find_all,
              mem,
              iter,
              fold,
              count,
              stats]}
    function _a_(_t_,_s_,_r_,_q_,_p_)
     {return caml_weak_blit(_t_,_s_,_r_,_q_,_p_)}
    function _b_(_o_,_n_){return caml_weak_check(_o_,_n_)}
    function _c_(_m_,_l_){return caml_weak_get_copy(_m_,_l_)}
    function _d_(_k_,_j_){return caml_weak_get(_k_,_j_)}
    function _e_(_i_,_h_,_g_){return caml_weak_set(_i_,_h_,_g_)}
    var
     Weak=
      [0,
       function(_f_){return caml_weak_create(_f_)},
       length,
       _e_,
       _d_,
       _c_,
       _b_,
       fill,
       _a_,
       Make];
    runtime.caml_register_global(7,Weak,"Weak");
    return}
  (function(){return this}()));
