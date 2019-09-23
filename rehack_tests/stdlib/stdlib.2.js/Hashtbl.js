(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_compare=runtime.caml_compare,
     caml_hash=runtime.caml_hash,
     caml_make_vect=runtime.caml_make_vect,
     caml_new_string=runtime.caml_new_string,
     caml_sys_getenv=runtime.caml_sys_getenv,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_OCAMLRUNPARAM=caml_new_string("OCAMLRUNPARAM"),
     cst_CAMLRUNPARAM=caml_new_string("CAMLRUNPARAM"),
     cst=caml_new_string(""),
     Sys=global_data.Sys,
     Not_found=global_data.Not_found,
     Pervasives=global_data.Pervasives,
     Array=global_data.Array,
     Assert_failure=global_data.Assert_failure,
     CamlinternalLazy=global_data.CamlinternalLazy,
     Random=global_data.Random,
     String=global_data.String,
     _c_=[0,0],
     _b_=[0,caml_new_string("hashtbl.ml"),108,23];
    function hash(x){return caml_hash(10,100,0,x)}
    function hash_param(n1,n2,x){return caml_hash(n1,n2,0,x)}
    function seeded_hash(seed,x){return caml_hash(10,100,seed,x)}
    function ongoing_traversal(h)
     {var _ap_=h.length - 1 < 4?1:0,_aq_=_ap_ || (h[4] < 0?1:0);return _aq_}
    function flip_ongoing_traversal(h){h[4] = - h[4] | 0;return 0}
    try
     {var _e_=caml_sys_getenv(cst_OCAMLRUNPARAM),params=_e_}
    catch(_an_)
     {_an_ = caml_wrap_exception(_an_);
      if(_an_ !== Not_found)throw _an_;
      try
       {var _d_=caml_sys_getenv(cst_CAMLRUNPARAM),_a_=_d_}
      catch(_ao_)
       {_ao_ = caml_wrap_exception(_ao_);
        if(_ao_ !== Not_found)throw _ao_;
        var _a_=cst}
      var params=_a_}
    var
     randomized_default=caml_call2(String[22],params,82),
     randomized=[0,randomized_default];
    function randomize(param){randomized[1] = 1;return 0}
    function is_randomized(param){return randomized[1]}
    var prng=[246,function(_am_){return caml_call1(Random[11][2],0)}];
    function power_2_above(x,n)
     {var x$0=x;
      for(;;)
       {if(n <= x$0)return x$0;
        if(Sys[14] < (x$0 * 2 | 0))return x$0;
        var x$1=x$0 * 2 | 0,x$0=x$1;
        continue}}
    function create(opt,initial_size)
     {if(opt)var sth=opt[1],random=sth;else var random=randomized[1];
      var s=power_2_above(16,initial_size);
      if(random)
       var
        _ak_=runtime.caml_obj_tag(prng),
        _al_=
         250 === _ak_
          ?prng[1]
          :246 === _ak_?caml_call1(CamlinternalLazy[2],prng):prng,
        seed=caml_call1(Random[11][4],_al_);
      else
       var seed=0;
      return [0,0,caml_make_vect(s,0),seed,s]}
    function clear(h)
     {h[1] = 0;
      var len=h[2].length - 1,_ai_=len - 1 | 0,_ah_=0;
      if(! (_ai_ < 0))
       {var i=_ah_;
        for(;;)
         {caml_check_bound(h[2],i)[1 + i] = 0;
          var _aj_=i + 1 | 0;
          if(_ai_ !== i){var i=_aj_;continue}
          break}}
      return 0}
    function reset(h)
     {var len=h[2].length - 1;
      if(4 <= h.length - 1)
       if(len !== caml_call1(Pervasives[6],h[4]))
        {h[1] = 0;
         h[2] = caml_make_vect(caml_call1(Pervasives[6],h[4]),0);
         return 0}
      return clear(h)}
    function copy_bucketlist(param)
     {if(param)
       {var
         key=param[1],
         data=param[2],
         next=param[3],
         loop=
          function(prec,param)
           {var prec$0=prec,param$0=param;
            for(;;)
             {if(param$0)
               {var
                 key=param$0[1],
                 data=param$0[2],
                 next=param$0[3],
                 r=[0,key,data,next];
                if(prec$0){prec$0[3] = r;var prec$0=r,param$0=next;continue}
                throw [0,Assert_failure,_b_]}
              return 0}},
         r=[0,key,data,next];
        loop(r,next);
        return r}
      return 0}
    function copy(h)
     {var _ae_=h[4],_af_=h[3],_ag_=caml_call2(Array[15],copy_bucketlist,h[2]);
      return [0,h[1],_ag_,_af_,_ae_]}
    function length(h){return h[1]}
    function resize(indexfun,h)
     {var
       odata=h[2],
       osize=odata.length - 1,
       nsize=osize * 2 | 0,
       _X_=nsize < Sys[14]?1:0;
      if(_X_)
       {var
         ndata=caml_make_vect(nsize,0),
         ndata_tail=caml_make_vect(nsize,0),
         inplace=1 - ongoing_traversal(h);
        h[2] = ndata;
        var
         insert_bucket=
          function(cell)
           {var cell$0=cell;
            for(;;)
             {if(cell$0)
               {var
                 key=cell$0[1],
                 data=cell$0[2],
                 next=cell$0[3],
                 cell$1=inplace?cell$0:[0,key,data,0],
                 nidx=caml_call2(indexfun,h,key),
                 match=caml_check_bound(ndata_tail,nidx)[1 + nidx];
                if(match)
                 match[3] = cell$1;
                else
                 caml_check_bound(ndata,nidx)[1 + nidx] = cell$1;
                caml_check_bound(ndata_tail,nidx)[1 + nidx] = cell$1;
                var cell$0=next;
                continue}
              return 0}},
         _Z_=osize - 1 | 0,
         _Y_=0;
        if(! (_Z_ < 0))
         {var i$0=_Y_;
          for(;;)
           {insert_bucket(caml_check_bound(odata,i$0)[1 + i$0]);
            var _ad_=i$0 + 1 | 0;
            if(_Z_ !== i$0){var i$0=_ad_;continue}
            break}}
        if(inplace)
         {var _$_=nsize - 1 | 0,___=0;
          if(! (_$_ < 0))
           {var i=___;
            for(;;)
             {var match=caml_check_bound(ndata_tail,i)[1 + i];
              if(match)match[3] = 0;
              var _ac_=i + 1 | 0;
              if(_$_ !== i){var i=_ac_;continue}
              break}}
          var _aa_=0}
        else
         var _aa_=inplace;
        var _ab_=_aa_}
      else
       var _ab_=_X_;
      return _ab_}
    function key_index(h,key)
     {return 3 <= h.length - 1
              ?caml_hash(10,100,h[3],key) & (h[2].length - 1 - 1 | 0)
              :runtime.caml_mod
                (runtime.caml_hash_univ_param(10,100,key),h[2].length - 1)}
    function add(h,key,data)
     {var
       i=key_index(h,key),
       bucket=[0,key,data,caml_check_bound(h[2],i)[1 + i]];
      caml_check_bound(h[2],i)[1 + i] = bucket;
      h[1] = h[1] + 1 | 0;
      var _W_=h[2].length - 1 << 1 < h[1]?1:0;
      return _W_?resize(key_index,h):_W_}
    function remove_bucket(h,i,key,prec,c)
     {var prec$0=prec,c$0=c;
      for(;;)
       {if(c$0)
         {var k=c$0[1],next=c$0[3];
          if(0 === caml_compare(k,key))
           {h[1] = h[1] - 1 | 0;
            return prec$0
                    ?(prec$0[3] = next,0)
                    :(caml_check_bound(h[2],i)[1 + i] = next,0)}
          var prec$0=c$0,c$0=next;
          continue}
        return 0}}
    function remove(h,key)
     {var i=key_index(h,key);
      return remove_bucket(h,i,key,0,caml_check_bound(h[2],i)[1 + i])}
    function find_rec(key,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var k=param$0[1],data=param$0[2],next=param$0[3];
          if(0 === caml_compare(key,k))return data;
          var param$0=next;
          continue}
        throw Not_found}}
    function find(h,key)
     {var _V_=key_index(h,key),match=caml_check_bound(h[2],_V_)[1 + _V_];
      if(match)
       {var k1=match[1],d1=match[2],next1=match[3];
        if(0 === caml_compare(key,k1))return d1;
        if(next1)
         {var k2=next1[1],d2=next1[2],next2=next1[3];
          if(0 === caml_compare(key,k2))return d2;
          if(next2)
           {var k3=next2[1],d3=next2[2],next3=next2[3];
            return 0 === caml_compare(key,k3)?d3:find_rec(key,next3)}
          throw Not_found}
        throw Not_found}
      throw Not_found}
    function find_rec_opt(key,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var k=param$0[1],data=param$0[2],next=param$0[3];
          if(0 === caml_compare(key,k))return [0,data];
          var param$0=next;
          continue}
        return 0}}
    function find_opt(h,key)
     {var _U_=key_index(h,key),match=caml_check_bound(h[2],_U_)[1 + _U_];
      if(match)
       {var k1=match[1],d1=match[2],next1=match[3];
        if(0 === caml_compare(key,k1))return [0,d1];
        if(next1)
         {var k2=next1[1],d2=next1[2],next2=next1[3];
          if(0 === caml_compare(key,k2))return [0,d2];
          if(next2)
           {var k3=next2[1],d3=next2[2],next3=next2[3];
            return 0 === caml_compare(key,k3)?[0,d3]:find_rec_opt(key,next3)}
          return 0}
        return 0}
      return 0}
    function find_all(h,key)
     {function find_in_bucket(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var k=param$0[1],data=param$0[2],next=param$0[3];
            if(0 === caml_compare(k,key))return [0,data,find_in_bucket(next)];
            var param$0=next;
            continue}
          return 0}}
      var _T_=key_index(h,key);
      return find_in_bucket(caml_check_bound(h[2],_T_)[1 + _T_])}
    function replace_bucket(key,data,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var k=param$0[1],next=param$0[3];
          if(0 === caml_compare(k,key))
           {param$0[1] = key;param$0[2] = data;return 0}
          var param$0=next;
          continue}
        return 1}}
    function replace(h,key,data)
     {var
       i=key_index(h,key),
       l=caml_check_bound(h[2],i)[1 + i],
       _Q_=replace_bucket(key,data,l);
      if(_Q_)
       {caml_check_bound(h[2],i)[1 + i] = [0,key,data,l];
        h[1] = h[1] + 1 | 0;
        var _R_=h[2].length - 1 << 1 < h[1]?1:0;
        if(_R_)return resize(key_index,h);
        var _S_=_R_}
      else
       var _S_=_Q_;
      return _S_}
    function mem(h,key)
     {function mem_in_bucket(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             k=param$0[1],
             next=param$0[3],
             _P_=0 === caml_compare(k,key)?1:0;
            if(_P_)return _P_;
            var param$0=next;
            continue}
          return 0}}
      var _O_=key_index(h,key);
      return mem_in_bucket(caml_check_bound(h[2],_O_)[1 + _O_])}
    function iter(f,h)
     {function do_bucket(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var key=param$0[1],data=param$0[2],param$1=param$0[3];
            caml_call2(f,key,data);
            var param$0=param$1;
            continue}
          return 0}}
      var old_trav=ongoing_traversal(h);
      if(1 - old_trav)flip_ongoing_traversal(h);
      try
       {var d=h[2],_K_=d.length - 1 - 1 | 0,_J_=0;
        if(! (_K_ < 0))
         {var i=_J_;
          for(;;)
           {do_bucket(caml_check_bound(d,i)[1 + i]);
            var _N_=i + 1 | 0;
            if(_K_ !== i){var i=_N_;continue}
            break}}
        var _L_=1 - old_trav,_M_=_L_?flip_ongoing_traversal(h):_L_;
        return _M_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(old_trav)throw exn;
        flip_ongoing_traversal(h);
        throw exn}}
    function filter_map_inplace_bucket(f,h,i,prec,slot)
     {var prec$0=prec,slot$0=slot;
      for(;;)
       {if(slot$0)
         {var
           key=slot$0[1],
           data=slot$0[2],
           next=slot$0[3],
           match=caml_call2(f,key,data);
          if(match)
           {var data$0=match[1];
            if(prec$0)
             prec$0[3] = slot$0;
            else
             caml_check_bound(h[2],i)[1 + i] = slot$0;
            slot$0[2] = data$0;
            var prec$0=slot$0,slot$0=next;
            continue}
          h[1] = h[1] - 1 | 0;
          var slot$0=next;
          continue}
        return prec$0
                ?(prec$0[3] = 0,0)
                :(caml_check_bound(h[2],i)[1 + i] = 0,0)}}
    function filter_map_inplace(f,h)
     {var d=h[2],old_trav=ongoing_traversal(h);
      if(1 - old_trav)flip_ongoing_traversal(h);
      try
       {var _G_=d.length - 1 - 1 | 0,_F_=0;
        if(! (_G_ < 0))
         {var i=_F_;
          for(;;)
           {filter_map_inplace_bucket(f,h,i,0,caml_check_bound(h[2],i)[1 + i]);
            var _I_=i + 1 | 0;
            if(_G_ !== i){var i=_I_;continue}
            break}}
        var _H_=0;
        return _H_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(old_trav)throw exn;
        flip_ongoing_traversal(h);
        throw exn}}
    function fold(f,h,init)
     {function do_bucket(b,accu)
       {var b$0=b,accu$0=accu;
        for(;;)
         {if(b$0)
           {var
             key=b$0[1],
             data=b$0[2],
             b$1=b$0[3],
             accu$1=caml_call3(f,key,data,accu$0),
             b$0=b$1,
             accu$0=accu$1;
            continue}
          return accu$0}}
      var old_trav=ongoing_traversal(h);
      if(1 - old_trav)flip_ongoing_traversal(h);
      try
       {var d=h[2],accu=[0,init],_B_=d.length - 1 - 1 | 0,_A_=0;
        if(! (_B_ < 0))
         {var i=_A_;
          for(;;)
           {var _D_=accu[1];
            accu[1] = do_bucket(caml_check_bound(d,i)[1 + i],_D_);
            var _E_=i + 1 | 0;
            if(_B_ !== i){var i=_E_;continue}
            break}}
        if(1 - old_trav)flip_ongoing_traversal(h);
        var _C_=accu[1];
        return _C_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        if(old_trav)throw exn;
        flip_ongoing_traversal(h);
        throw exn}}
    function bucket_length(accu,param)
     {var accu$0=accu,param$0=param;
      for(;;)
       {if(param$0)
         {var
           param$1=param$0[3],
           accu$1=accu$0 + 1 | 0,
           accu$0=accu$1,
           param$0=param$1;
          continue}
        return accu$0}}
    function stats(h)
     {var _u_=h[2],_v_=0;
      function _w_(m,b)
       {var _z_=bucket_length(0,b);return caml_call2(Pervasives[5],m,_z_)}
      var
       mbl=caml_call3(Array[17],_w_,_v_,_u_),
       histo=caml_make_vect(mbl + 1 | 0,0),
       _x_=h[2];
      function _y_(b)
       {var l=bucket_length(0,b);
        histo[1 + l] = caml_check_bound(histo,l)[1 + l] + 1 | 0;
        return 0}
      caml_call2(Array[13],_y_,_x_);
      return [0,h[1],h[2].length - 1,mbl,histo]}
    function MakeSeeded(H)
     {function key_index(h,key)
       {var _t_=h[2].length - 1 - 1 | 0;
        return caml_call2(H[2],h[3],key) & _t_}
      function add(h,key,data)
       {var
         i=key_index(h,key),
         bucket=[0,key,data,caml_check_bound(h[2],i)[1 + i]];
        caml_check_bound(h[2],i)[1 + i] = bucket;
        h[1] = h[1] + 1 | 0;
        var _s_=h[2].length - 1 << 1 < h[1]?1:0;
        return _s_?resize(key_index,h):_s_}
      function remove_bucket(h,i,key,prec,c)
       {var prec$0=prec,c$0=c;
        for(;;)
         {if(c$0)
           {var k=c$0[1],next=c$0[3];
            if(caml_call2(H[1],k,key))
             {h[1] = h[1] - 1 | 0;
              return prec$0
                      ?(prec$0[3] = next,0)
                      :(caml_check_bound(h[2],i)[1 + i] = next,0)}
            var prec$0=c$0,c$0=next;
            continue}
          return 0}}
      function remove(h,key)
       {var i=key_index(h,key);
        return remove_bucket(h,i,key,0,caml_check_bound(h[2],i)[1 + i])}
      function find_rec(key,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var k=param$0[1],data=param$0[2],next=param$0[3];
            if(caml_call2(H[1],key,k))return data;
            var param$0=next;
            continue}
          throw Not_found}}
      function find(h,key)
       {var _r_=key_index(h,key),match=caml_check_bound(h[2],_r_)[1 + _r_];
        if(match)
         {var k1=match[1],d1=match[2],next1=match[3];
          if(caml_call2(H[1],key,k1))return d1;
          if(next1)
           {var k2=next1[1],d2=next1[2],next2=next1[3];
            if(caml_call2(H[1],key,k2))return d2;
            if(next2)
             {var k3=next2[1],d3=next2[2],next3=next2[3];
              return caml_call2(H[1],key,k3)?d3:find_rec(key,next3)}
            throw Not_found}
          throw Not_found}
        throw Not_found}
      function find_rec_opt(key,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var k=param$0[1],data=param$0[2],next=param$0[3];
            if(caml_call2(H[1],key,k))return [0,data];
            var param$0=next;
            continue}
          return 0}}
      function find_opt(h,key)
       {var _q_=key_index(h,key),match=caml_check_bound(h[2],_q_)[1 + _q_];
        if(match)
         {var k1=match[1],d1=match[2],next1=match[3];
          if(caml_call2(H[1],key,k1))return [0,d1];
          if(next1)
           {var k2=next1[1],d2=next1[2],next2=next1[3];
            if(caml_call2(H[1],key,k2))return [0,d2];
            if(next2)
             {var k3=next2[1],d3=next2[2],next3=next2[3];
              return caml_call2(H[1],key,k3)?[0,d3]:find_rec_opt(key,next3)}
            return 0}
          return 0}
        return 0}
      function find_all(h,key)
       {function find_in_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var k=param$0[1],d=param$0[2],next=param$0[3];
              if(caml_call2(H[1],k,key))return [0,d,find_in_bucket(next)];
              var param$0=next;
              continue}
            return 0}}
        var _p_=key_index(h,key);
        return find_in_bucket(caml_check_bound(h[2],_p_)[1 + _p_])}
      function replace_bucket(key,data,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var k=param$0[1],next=param$0[3];
            if(caml_call2(H[1],k,key))
             {param$0[1] = key;param$0[2] = data;return 0}
            var param$0=next;
            continue}
          return 1}}
      function replace(h,key,data)
       {var
         i=key_index(h,key),
         l=caml_check_bound(h[2],i)[1 + i],
         _m_=replace_bucket(key,data,l);
        if(_m_)
         {caml_check_bound(h[2],i)[1 + i] = [0,key,data,l];
          h[1] = h[1] + 1 | 0;
          var _n_=h[2].length - 1 << 1 < h[1]?1:0;
          if(_n_)return resize(key_index,h);
          var _o_=_n_}
        else
         var _o_=_m_;
        return _o_}
      function mem(h,key)
       {function mem_in_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var k=param$0[1],next=param$0[3],_l_=caml_call2(H[1],k,key);
              if(_l_)return _l_;
              var param$0=next;
              continue}
            return 0}}
        var _k_=key_index(h,key);
        return mem_in_bucket(caml_check_bound(h[2],_k_)[1 + _k_])}
      return [0,
              create,
              clear,
              reset,
              copy,
              add,
              remove,
              find,
              find_opt,
              find_all,
              replace,
              mem,
              iter,
              filter_map_inplace,
              fold,
              length,
              stats]}
    function Make(H)
     {var equal=H[1];
      function hash(seed,x){return caml_call1(H[2],x)}
      var
       include=MakeSeeded([0,equal,hash]),
       clear=include[2],
       reset=include[3],
       copy=include[4],
       add=include[5],
       remove=include[6],
       find=include[7],
       find_opt=include[8],
       find_all=include[9],
       replace=include[10],
       mem=include[11],
       iter=include[12],
       filter_map_inplace=include[13],
       fold=include[14],
       length=include[15],
       stats=include[16],
       _j_=include[1];
      function create(sz){return caml_call2(_j_,_c_,sz)}
      return [0,
              create,
              clear,
              reset,
              copy,
              add,
              remove,
              find,
              find_opt,
              find_all,
              replace,
              mem,
              iter,
              filter_map_inplace,
              fold,
              length,
              stats]}
    var
     Hashtbl=
      [0,
       create,
       clear,
       reset,
       copy,
       add,
       find,
       find_opt,
       find_all,
       mem,
       remove,
       replace,
       iter,
       filter_map_inplace,
       fold,
       length,
       randomize,
       is_randomized,
       stats,
       Make,
       MakeSeeded,
       hash,
       seeded_hash,
       hash_param,
       function(_i_,_h_,_g_,_f_){return caml_hash(_i_,_h_,_g_,_f_)}];
    runtime.caml_register_global(13,Hashtbl,"Hashtbl");
    return}
  (function(){return this}()));
