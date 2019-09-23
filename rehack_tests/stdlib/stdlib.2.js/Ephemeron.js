(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_make_vect=runtime.caml_make_vect,
     caml_wrap_exception=runtime.caml_wrap_exception;
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
     Obj=global_data.Obj,
     Sys=global_data.Sys,
     Not_found=global_data.Not_found,
     Pervasives=global_data.Pervasives,
     Array=global_data.Array,
     Hashtbl=global_data.Hashtbl,
     CamlinternalLazy=global_data.CamlinternalLazy,
     Random=global_data.Random,
     _c_=[0,0],
     _b_=[0,0],
     _a_=[0,0];
    function MakeSeeded(H)
     {function power_2_above(x,n)
       {var x$0=x;
        for(;;)
         {if(n <= x$0)return x$0;
          if(Sys[14] < (x$0 * 2 | 0))return x$0;
          var x$1=x$0 * 2 | 0,x$0=x$1;
          continue}}
      var prng=[246,function(_av_){return caml_call1(Random[11][2],0)}];
      function create(opt,initial_size)
       {if(opt)
         var sth=opt[1],random=sth;
        else
         var random=caml_call1(Hashtbl[17],0);
        var s=power_2_above(16,initial_size);
        if(random)
         var
          _at_=runtime.caml_obj_tag(prng),
          _au_=
           250 === _at_
            ?prng[1]
            :246 === _at_?caml_call1(CamlinternalLazy[2],prng):prng,
          seed=caml_call1(Random[11][4],_au_);
        else
         var seed=0;
        return [0,0,caml_make_vect(s,0),seed,s]}
      function clear(h)
       {h[1] = 0;
        var len=h[2].length - 1,_ar_=len - 1 | 0,_aq_=0;
        if(! (_ar_ < 0))
         {var i=_aq_;
          for(;;)
           {caml_check_bound(h[2],i)[1 + i] = 0;
            var _as_=i + 1 | 0;
            if(_ar_ !== i){var i=_as_;continue}
            break}}
        return 0}
      function reset(h)
       {var len=h[2].length - 1;
        return len === h[4]
                ?clear(h)
                :(h[1] = 0,h[2] = caml_make_vect(h[4],0),0)}
      function copy(h)
       {var _an_=h[4],_ao_=h[3],_ap_=caml_call1(Array[8],h[2]);
        return [0,h[1],_ap_,_ao_,_an_]}
      function key_index(h,hkey){return hkey & (h[2].length - 1 - 1 | 0)}
      function clean(h)
       {function do_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var rest=param$0[3],c=param$0[2],hkey=param$0[1];
              if(caml_call1(H[7],c))return [0,hkey,c,do_bucket(rest)];
              h[1] = h[1] - 1 | 0;
              var param$0=rest;
              continue}
            return 0}}
        var d=h[2],_al_=d.length - 1 - 1 | 0,_ak_=0;
        if(! (_al_ < 0))
         {var i=_ak_;
          for(;;)
           {d[1 + i] = do_bucket(caml_check_bound(d,i)[1 + i]);
            var _am_=i + 1 | 0;
            if(_al_ !== i){var i=_am_;continue}
            break}}
        return 0}
      function resize(h)
       {var odata=h[2],osize=odata.length - 1,nsize=osize * 2 | 0;
        clean(h);
        var
         _ae_=nsize < Sys[14]?1:0,
         _af_=_ae_?(osize >>> 1 | 0) <= h[1]?1:0:_ae_;
        if(_af_)
         {var ndata=caml_make_vect(nsize,0);
          h[2] = ndata;
          var
           insert_bucket=
            function(param)
             {if(param)
               {var rest=param[3],data=param[2],hkey=param[1];
                insert_bucket(rest);
                var nidx=key_index(h,hkey);
                ndata[1 + nidx]
                =
                [0,hkey,data,caml_check_bound(ndata,nidx)[1 + nidx]];
                return 0}
              return 0},
           _ah_=osize - 1 | 0,
           _ag_=0;
          if(! (_ah_ < 0))
           {var i=_ag_;
            for(;;)
             {insert_bucket(caml_check_bound(odata,i)[1 + i]);
              var _aj_=i + 1 | 0;
              if(_ah_ !== i){var i=_aj_;continue}
              break}}
          var _ai_=0}
        else
         var _ai_=_af_;
        return _ai_}
      function add(h,key,info)
       {var
         hkey=caml_call2(H[2],h[3],key),
         i=key_index(h,hkey),
         container=caml_call2(H[1],key,info),
         bucket=[0,hkey,container,caml_check_bound(h[2],i)[1 + i]];
        caml_check_bound(h[2],i)[1 + i] = bucket;
        h[1] = h[1] + 1 | 0;
        var _ad_=h[2].length - 1 << 1 < h[1]?1:0;
        return _ad_?resize(h):_ad_}
      function remove(h,key)
       {var hkey=caml_call2(H[2],h[3],key);
        function remove_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var next=param$0[3],c=param$0[2],hk=param$0[1];
              if(hkey === hk)
               {var match=caml_call2(H[3],c,key);
                switch(match)
                 {case 0:h[1] = h[1] - 1 | 0;return next;
                  case 1:return [0,hk,c,remove_bucket(next)];
                  default:h[1] = h[1] - 1 | 0;var param$0=next;continue}}
              return [0,hk,c,remove_bucket(next)]}
            return 0}}
        var
         i=key_index(h,hkey),
         _ac_=remove_bucket(caml_check_bound(h[2],i)[1 + i]);
        caml_check_bound(h[2],i)[1 + i] = _ac_;
        return 0}
      function find_rec(key,hkey,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var rest=param$0[3],c=param$0[2],hk=param$0[1];
            if(hkey === hk)
             {var match=caml_call2(H[3],c,key);
              switch(match)
               {case 0:
                 var match$0=caml_call1(H[4],c);
                 if(match$0){var d=match$0[1];return d}
                 var param$0=rest;
                 continue;
                case 1:var param$0=rest;continue;
                default:var param$0=rest;continue}}
            var param$0=rest;
            continue}
          throw Not_found}}
      function find(h,key)
       {var hkey=caml_call2(H[2],h[3],key),_ab_=key_index(h,hkey);
        return find_rec(key,hkey,caml_check_bound(h[2],_ab_)[1 + _ab_])}
      function find_rec_opt(key,hkey,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var rest=param$0[3],c=param$0[2],hk=param$0[1];
            if(hkey === hk)
             {var match=caml_call2(H[3],c,key);
              switch(match)
               {case 0:
                 var d=caml_call1(H[4],c);
                 if(d)return d;
                 var param$0=rest;
                 continue;
                case 1:var param$0=rest;continue;
                default:var param$0=rest;continue}}
            var param$0=rest;
            continue}
          return 0}}
      function find_opt(h,key)
       {var hkey=caml_call2(H[2],h[3],key),_aa_=key_index(h,hkey);
        return find_rec_opt(key,hkey,caml_check_bound(h[2],_aa_)[1 + _aa_])}
      function find_all(h,key)
       {var hkey=caml_call2(H[2],h[3],key);
        function find_in_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var rest=param$0[3],c=param$0[2],hk=param$0[1];
              if(hkey === hk)
               {var match=caml_call2(H[3],c,key);
                switch(match)
                 {case 0:
                   var match$0=caml_call1(H[4],c);
                   if(match$0)
                    {var d=match$0[1];return [0,d,find_in_bucket(rest)]}
                   var param$0=rest;
                   continue;
                  case 1:var param$0=rest;continue;
                  default:var param$0=rest;continue}}
              var param$0=rest;
              continue}
            return 0}}
        var _$_=key_index(h,hkey);
        return find_in_bucket(caml_check_bound(h[2],_$_)[1 + _$_])}
      function replace(h,key,info)
       {var hkey=caml_call2(H[2],h[3],key);
        function replace_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var next=param$0[3],c=param$0[2],hk=param$0[1];
              if(hkey === hk)
               {var match=caml_call2(H[3],c,key);
                if(0 === match)return caml_call3(H[6],c,key,info);
                var param$0=next;
                continue}
              var param$0=next;
              continue}
            throw Not_found}}
        var i=key_index(h,hkey),l=caml_check_bound(h[2],i)[1 + i];
        try
         {var _Z_=replace_bucket(l);return _Z_}
        catch(___)
         {___ = caml_wrap_exception(___);
          if(___ === Not_found)
           {var container=caml_call2(H[1],key,info);
            caml_check_bound(h[2],i)[1 + i] = [0,hkey,container,l];
            h[1] = h[1] + 1 | 0;
            var _Y_=h[2].length - 1 << 1 < h[1]?1:0;
            return _Y_?resize(h):_Y_}
          throw ___}}
      function mem(h,key)
       {var hkey=caml_call2(H[2],h[3],key);
        function mem_in_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var rest=param$0[3],c=param$0[2],hk=param$0[1];
              if(hk === hkey)
               {var match=caml_call2(H[3],c,key);
                if(0 === match)return 1;
                var param$0=rest;
                continue}
              var param$0=rest;
              continue}
            return 0}}
        var _X_=key_index(h,hkey);
        return mem_in_bucket(caml_check_bound(h[2],_X_)[1 + _X_])}
      function iter(f,h)
       {function do_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var
               rest=param$0[3],
               c=param$0[2],
               match=caml_call1(H[5],c),
               match$0=caml_call1(H[4],c);
              if(match)
               if(match$0)
                {var d=match$0[1],k=match[1];caml_call2(f,k,d);var switch$0=1}
               else
                var switch$0=0;
              else
               var switch$0=0;
              var param$0=rest;
              continue}
            return 0}}
        var d=h[2],_V_=d.length - 1 - 1 | 0,_U_=0;
        if(! (_V_ < 0))
         {var i=_U_;
          for(;;)
           {do_bucket(caml_check_bound(d,i)[1 + i]);
            var _W_=i + 1 | 0;
            if(_V_ !== i){var i=_W_;continue}
            break}}
        return 0}
      function fold(f,h,init)
       {function do_bucket(b,accu)
         {var b$0=b,accu$0=accu;
          for(;;)
           {if(b$0)
             {var
               rest=b$0[3],
               c=b$0[2],
               match=caml_call1(H[5],c),
               match$0=caml_call1(H[4],c);
              if(match)
               if(match$0)
                var
                 d=match$0[1],
                 k=match[1],
                 accu$1=caml_call3(f,k,d,accu$0),
                 switch$0=1;
               else
                var switch$0=0;
              else
               var switch$0=0;
              if(! switch$0)var accu$1=accu$0;
              var b$0=rest,accu$0=accu$1;
              continue}
            return accu$0}}
        var d=h[2],accu=[0,init],_R_=d.length - 1 - 1 | 0,_Q_=0;
        if(! (_R_ < 0))
         {var i=_Q_;
          for(;;)
           {var _S_=accu[1];
            accu[1] = do_bucket(caml_check_bound(d,i)[1 + i],_S_);
            var _T_=i + 1 | 0;
            if(_R_ !== i){var i=_T_;continue}
            break}}
        return accu[1]}
      function filter_map_inplace(f,h)
       {function do_bucket(param)
         {var param$0=param;
          for(;;)
           {if(param$0)
             {var
               rest=param$0[3],
               c=param$0[2],
               hk=param$0[1],
               match=caml_call1(H[5],c),
               match$0=caml_call1(H[4],c);
              if(match)
               if(match$0)
                {var d=match$0[1],k=match[1],match$1=caml_call2(f,k,d);
                 if(match$1)
                  {var new_d=match$1[1];
                   caml_call3(H[6],c,k,new_d);
                   return [0,hk,c,do_bucket(rest)]}
                 var param$0=rest;
                 continue}
              var param$0=rest;
              continue}
            return 0}}
        var d=h[2],_O_=d.length - 1 - 1 | 0,_N_=0;
        if(! (_O_ < 0))
         {var i=_N_;
          for(;;)
           {d[1 + i] = do_bucket(caml_check_bound(d,i)[1 + i]);
            var _P_=i + 1 | 0;
            if(_O_ !== i){var i=_P_;continue}
            break}}
        return 0}
      function length(h){return h[1]}
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
       {var _H_=h[2],_I_=0;
        function _J_(m,b)
         {var _M_=bucket_length(0,b);return caml_call2(Pervasives[5],m,_M_)}
        var
         mbl=caml_call3(Array[17],_J_,_I_,_H_),
         histo=caml_make_vect(mbl + 1 | 0,0),
         _K_=h[2];
        function _L_(b)
         {var l=bucket_length(0,b);
          histo[1 + l] = caml_check_bound(histo,l)[1 + l] + 1 | 0;
          return 0}
        caml_call2(Array[13],_L_,_K_);
        return [0,h[1],h[2].length - 1,mbl,histo]}
      function bucket_length_alive(accu,param)
       {var accu$0=accu,param$0=param;
        for(;;)
         {if(param$0)
           {var rest=param$0[3],c=param$0[2];
            if(caml_call1(H[7],c))
             {var accu$1=accu$0 + 1 | 0,accu$0=accu$1,param$0=rest;continue}
            var param$0=rest;
            continue}
          return accu$0}}
      function stats_alive(h)
       {var size=[0,0],_B_=h[2],_C_=0;
        function _D_(m,b)
         {var _G_=bucket_length_alive(0,b);
          return caml_call2(Pervasives[5],m,_G_)}
        var
         mbl=caml_call3(Array[17],_D_,_C_,_B_),
         histo=caml_make_vect(mbl + 1 | 0,0),
         _E_=h[2];
        function _F_(b)
         {var l=bucket_length_alive(0,b);
          size[1] = size[1] + l | 0;
          histo[1 + l] = caml_check_bound(histo,l)[1 + l] + 1 | 0;
          return 0}
        caml_call2(Array[13],_F_,_E_);
        return [0,size[1],h[2].length - 1,mbl,histo]}
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
              stats,
              clean,
              stats_alive]}
    function obj_opt(x){return x}
    function create(param){return caml_call1(Obj[26][1],1)}
    function get_key(t){return obj_opt(caml_call2(Obj[26][3],t,0))}
    function get_key_copy(t){return obj_opt(caml_call2(Obj[26][4],t,0))}
    function set_key(t,k){return caml_call3(Obj[26][5],t,0,k)}
    function unset_key(t){return caml_call2(Obj[26][6],t,0)}
    function check_key(t){return caml_call2(Obj[26][7],t,0)}
    function blit_key(t1,t2){return caml_call5(Obj[26][8],t1,0,t2,0,1)}
    function get_data(t){return obj_opt(caml_call1(Obj[26][9],t))}
    function get_data_copy(t){return obj_opt(caml_call1(Obj[26][10],t))}
    function set_data(t,d){return caml_call2(Obj[26][11],t,d)}
    function unset_data(t){return caml_call1(Obj[26][12],t)}
    function check_data(t){return caml_call1(Obj[26][13],t)}
    function blit_data(t1,t2){return caml_call2(Obj[26][14],t1,t2)}
    function MakeSeeded$0(H)
     {function create$0(k,d)
       {var c=create(0);set_data(c,d);set_key(c,k);return c}
      var hash=H[2];
      function equal(c,k)
       {var match=get_key(c);
        if(match){var k$0=match[1];return caml_call2(H[1],k,k$0)?0:1}
        return 2}
      function set_key_data(c,k,d)
       {unset_data(c);set_key(c,k);return set_data(c,d)}
      return MakeSeeded
              ([0,create$0,hash,equal,get_data,get_key,set_key_data,check_key])}
    function Make(H)
     {var equal=H[1];
      function hash(seed,x){return caml_call1(H[2],x)}
      var
       include=MakeSeeded$0([0,equal,hash]),
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
       clean=include[17],
       stats_alive=include[18],
       _A_=include[1];
      function create(sz){return caml_call2(_A_,_a_,sz)}
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
              stats,
              clean,
              stats_alive]}
    function create$0(param){return caml_call1(Obj[26][1],2)}
    function get_key1(t){return obj_opt(caml_call2(Obj[26][3],t,0))}
    function get_key1_copy(t){return obj_opt(caml_call2(Obj[26][4],t,0))}
    function set_key1(t,k){return caml_call3(Obj[26][5],t,0,k)}
    function unset_key1(t){return caml_call2(Obj[26][6],t,0)}
    function check_key1(t){return caml_call2(Obj[26][7],t,0)}
    function get_key2(t){return obj_opt(caml_call2(Obj[26][3],t,1))}
    function get_key2_copy(t){return obj_opt(caml_call2(Obj[26][4],t,1))}
    function set_key2(t,k){return caml_call3(Obj[26][5],t,1,k)}
    function unset_key2(t){return caml_call2(Obj[26][6],t,1)}
    function check_key2(t){return caml_call2(Obj[26][7],t,1)}
    function blit_key1(t1,t2){return caml_call5(Obj[26][8],t1,0,t2,0,1)}
    function blit_key2(t1,t2){return caml_call5(Obj[26][8],t1,1,t2,1,1)}
    function blit_key12(t1,t2){return caml_call5(Obj[26][8],t1,0,t2,0,2)}
    function get_data$0(t){return obj_opt(caml_call1(Obj[26][9],t))}
    function get_data_copy$0(t){return obj_opt(caml_call1(Obj[26][10],t))}
    function set_data$0(t,d){return caml_call2(Obj[26][11],t,d)}
    function unset_data$0(t){return caml_call1(Obj[26][12],t)}
    function check_data$0(t){return caml_call1(Obj[26][13],t)}
    function blit_data$0(t1,t2){return caml_call2(Obj[26][14],t1,t2)}
    function MakeSeeded$1(H1,H2)
     {function create(param,d)
       {var k2=param[2],k1=param[1],c=create$0(0);
        set_data$0(c,d);
        set_key1(c,k1);
        set_key2(c,k2);
        return c}
      function hash(seed,param)
       {var k2=param[2],k1=param[1],_z_=caml_call2(H2[2],seed,k2) * 65599 | 0;
        return caml_call2(H1[2],seed,k1) + _z_ | 0}
      function equal(c,param)
       {var k2=param[2],k1=param[1],match=get_key1(c),match$0=get_key2(c);
        if(match)
         if(match$0)
          {var k2$0=match$0[1],k1$0=match[1];
           if(caml_call2(H1[1],k1,k1$0))if(caml_call2(H2[1],k2,k2$0))return 0;
           return 1}
        return 2}
      function get_key(c)
       {var match=get_key1(c),match$0=get_key2(c);
        if(match)
         if(match$0){var k2=match$0[1],k1=match[1];return [0,[0,k1,k2]]}
        return 0}
      function set_key_data(c,param,d)
       {var k2=param[2],k1=param[1];
        unset_data$0(c);
        set_key1(c,k1);
        set_key2(c,k2);
        return set_data$0(c,d)}
      function check_key(c)
       {var _y_=check_key1(c);return _y_?check_key2(c):_y_}
      return MakeSeeded
              ([0,create,hash,equal,get_data$0,get_key,set_key_data,check_key])}
    function Make$0(H1,H2)
     {var equal=H2[1];
      function hash(seed,x){return caml_call1(H2[2],x)}
      var equal$0=H1[1],_u_=[0,equal,hash];
      function hash$0(seed,x){return caml_call1(H1[2],x)}
      var
       _v_=[0,equal$0,hash$0],
       include=function(_x_){return MakeSeeded$1(_v_,_x_)}(_u_),
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
       clean=include[17],
       stats_alive=include[18],
       _w_=include[1];
      function create(sz){return caml_call2(_w_,_b_,sz)}
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
              stats,
              clean,
              stats_alive]}
    function create$1(n){return caml_call1(Obj[26][1],n)}
    function length(k){return caml_call1(Obj[26][2],k)}
    function get_key$0(t,n){return obj_opt(caml_call2(Obj[26][3],t,n))}
    function get_key_copy$0(t,n){return obj_opt(caml_call2(Obj[26][4],t,n))}
    function set_key$0(t,n,k){return caml_call3(Obj[26][5],t,n,k)}
    function unset_key$0(t,n){return caml_call2(Obj[26][6],t,n)}
    function check_key$0(t,n){return caml_call2(Obj[26][7],t,n)}
    function blit_key$0(t1,o1,t2,o2,l)
     {return caml_call5(Obj[26][8],t1,o1,t2,o2,l)}
    function get_data$1(t){return obj_opt(caml_call1(Obj[26][9],t))}
    function get_data_copy$1(t){return obj_opt(caml_call1(Obj[26][10],t))}
    function set_data$1(t,d){return caml_call2(Obj[26][11],t,d)}
    function unset_data$1(t){return caml_call1(Obj[26][12],t)}
    function check_data$1(t){return caml_call1(Obj[26][13],t)}
    function blit_data$1(t1,t2){return caml_call2(Obj[26][14],t1,t2)}
    function MakeSeeded$2(H)
     {function create(k,d)
       {var c=create$1(k.length - 1);
        set_data$1(c,d);
        var _s_=k.length - 1 - 1 | 0,_r_=0;
        if(! (_s_ < 0))
         {var i=_r_;
          for(;;)
           {set_key$0(c,i,caml_check_bound(k,i)[1 + i]);
            var _t_=i + 1 | 0;
            if(_s_ !== i){var i=_t_;continue}
            break}}
        return c}
      function hash(seed,k)
       {var h=[0,0],_n_=k.length - 1 - 1 | 0,_m_=0;
        if(! (_n_ < 0))
         {var i=_m_;
          for(;;)
           {var _o_=h[1],_p_=caml_check_bound(k,i)[1 + i];
            h[1] = (caml_call2(H[2],seed,_p_) * 65599 | 0) + _o_ | 0;
            var _q_=i + 1 | 0;
            if(_n_ !== i){var i=_q_;continue}
            break}}
        return h[1]}
      function equal(c,k)
       {var len=k.length - 1,len$0=length(c);
        if(len !== len$0)return 1;
        function equal_array(k,c,i)
         {var i$0=i;
          for(;;)
           {if(0 <= i$0)
             {var match=get_key$0(c,i$0);
              if(match)
               {var ki=match[1],_l_=caml_check_bound(k,i$0)[1 + i$0];
                if(caml_call2(H[1],_l_,ki))
                 {var i$1=i$0 - 1 | 0,i$0=i$1;continue}
                return 1}
              return 2}
            return 0}}
        return equal_array(k,c,len - 1 | 0)}
      function get_key(c)
       {var len=length(c);
        if(0 === len)return [0,[0]];
        var match=get_key$0(c,0);
        if(match)
         {var
           k0=match[1],
           fill=
            function(a,i)
             {var i$0=i;
              for(;;)
               {if(1 <= i$0)
                 {var match=get_key$0(c,i$0);
                  if(match)
                   {var ki=match[1];
                    caml_check_bound(a,i$0)[1 + i$0] = ki;
                    var i$1=i$0 - 1 | 0,i$0=i$1;
                    continue}
                  return 0}
                return [0,a]}},
           a=caml_make_vect(len,k0);
          return fill(a,len - 1 | 0)}
        return 0}
      function set_key_data(c,k,d)
       {unset_data$1(c);
        var _j_=k.length - 1 - 1 | 0,_i_=0;
        if(! (_j_ < 0))
         {var i=_i_;
          for(;;)
           {set_key$0(c,i,caml_check_bound(k,i)[1 + i]);
            var _k_=i + 1 | 0;
            if(_j_ !== i){var i=_k_;continue}
            break}}
        return set_data$1(c,d)}
      function check_key(c)
       {function check(c,i)
         {var i$0=i;
          for(;;)
           {var _f_=i$0 < 0?1:0;
            if(_f_)
             var _g_=_f_;
            else
             {var _h_=check_key$0(c,i$0);
              if(_h_){var i$1=i$0 - 1 | 0,i$0=i$1;continue}
              var _g_=_h_}
            return _g_}}
        return check(c,length(c) - 1 | 0)}
      return MakeSeeded
              ([0,create,hash,equal,get_data$1,get_key,set_key_data,check_key])}
    function Make$1(H)
     {var equal=H[1];
      function hash(seed,x){return caml_call1(H[2],x)}
      var
       include=MakeSeeded$2([0,equal,hash]),
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
       clean=include[17],
       stats_alive=include[18],
       _e_=include[1];
      function create(sz){return caml_call2(_e_,_c_,sz)}
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
              stats,
              clean,
              stats_alive]}
    var
     Ephemeron=
      [0,
       [0,
        create,
        get_key,
        get_key_copy,
        set_key,
        unset_key,
        check_key,
        blit_key,
        get_data,
        get_data_copy,
        set_data,
        unset_data,
        check_data,
        blit_data,
        Make,
        MakeSeeded$0],
       [0,
        create$0,
        get_key1,
        get_key1_copy,
        set_key1,
        unset_key1,
        check_key1,
        get_key2,
        get_key2_copy,
        set_key2,
        unset_key2,
        check_key2,
        blit_key1,
        blit_key2,
        blit_key12,
        get_data$0,
        get_data_copy$0,
        set_data$0,
        unset_data$0,
        check_data$0,
        blit_data$0,
        Make$0,
        MakeSeeded$1],
       [0,
        create$1,
        get_key$0,
        get_key_copy$0,
        set_key$0,
        unset_key$0,
        check_key$0,
        blit_key$0,
        get_data$1,
        get_data_copy$1,
        set_data$1,
        unset_data$1,
        check_data$1,
        blit_data$1,
        Make$1,
        MakeSeeded$2],
       [0,
        function(_d_)
         {return MakeSeeded
                  ([0,_d_[3],_d_[1],_d_[2],_d_[5],_d_[4],_d_[6],_d_[7]])}]];
    runtime.caml_register_global(11,Ephemeron,"Ephemeron");
    return}
  (function(){return this}()));
