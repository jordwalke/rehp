(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Map_remove_min_elt=caml_new_string("Map.remove_min_elt"),
     cst_Map_bal=caml_new_string("Map.bal"),
     cst_Map_bal$0=caml_new_string("Map.bal"),
     cst_Map_bal$1=caml_new_string("Map.bal"),
     cst_Map_bal$2=caml_new_string("Map.bal"),
     Not_found=global_data.Not_found,
     Pervasives=global_data.Pervasives,
     Assert_failure=global_data.Assert_failure,
     _a_=[0,0,0,0],
     _b_=[0,caml_new_string("map.ml"),393,10],
     _c_=[0,0,0];
    function Make(Ord)
     {function height(param){if(param){var h=param[5];return h}return 0}
      function create(l,x,d,r)
       {var hl=height(l),hr=height(r),_N_=hr <= hl?hl + 1 | 0:hr + 1 | 0;
        return [0,l,x,d,r,_N_]}
      function singleton(x,d){return [0,0,x,d,0,1]}
      function bal(l,x,d,r)
       {if(l)var h=l[5],hl=h;else var hl=0;
        if(r)var h$0=r[5],hr=h$0;else var hr=0;
        if((hr + 2 | 0) < hl)
         {if(l)
           {var lr=l[4],ld=l[3],lv=l[2],ll=l[1],_I_=height(lr);
            if(_I_ <= height(ll))return create(ll,lv,ld,create(lr,x,d,r));
            if(lr)
             {var
               lrr=lr[4],
               lrd=lr[3],
               lrv=lr[2],
               lrl=lr[1],
               _J_=create(lrr,x,d,r);
              return create(create(ll,lv,ld,lrl),lrv,lrd,_J_)}
            return caml_call1(Pervasives[1],cst_Map_bal)}
          return caml_call1(Pervasives[1],cst_Map_bal$0)}
        if((hl + 2 | 0) < hr)
         {if(r)
           {var rr=r[4],rd=r[3],rv=r[2],rl=r[1],_K_=height(rl);
            if(_K_ <= height(rr))return create(create(l,x,d,rl),rv,rd,rr);
            if(rl)
             {var
               rlr=rl[4],
               rld=rl[3],
               rlv=rl[2],
               rll=rl[1],
               _L_=create(rlr,rv,rd,rr);
              return create(create(l,x,d,rll),rlv,rld,_L_)}
            return caml_call1(Pervasives[1],cst_Map_bal$1)}
          return caml_call1(Pervasives[1],cst_Map_bal$2)}
        var _M_=hr <= hl?hl + 1 | 0:hr + 1 | 0;
        return [0,l,x,d,r,_M_]}
      var empty=0;
      function is_empty(param){return param?0:1}
      function add(x,data,m)
       {if(m)
         {var h=m[5],r=m[4],d=m[3],v=m[2],l=m[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)return d === data?m:[0,l,x,data,r,h];
          if(0 <= c){var rr=add(x,data,r);return r === rr?m:bal(l,v,d,rr)}
          var ll=add(x,data,l);
          return l === ll?m:bal(ll,v,d,r)}
        return [0,0,x,data,0,1]}
      function find(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             d=param$0[3],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v);
            if(0 === c)return d;
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          throw Not_found}}
      function find_first_aux(v0,d0,f,param)
       {var v0$0=v0,d0$0=d0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,d0$0=d,param$0=l;continue}
            var param$0=r;
            continue}
          return [0,v0$0,d0$0]}}
      function find_first(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_first_aux(v,d,f,l);
            var param$0=r;
            continue}
          throw Not_found}}
      function find_first_opt_aux(v0,d0,f,param)
       {var v0$0=v0,d0$0=d0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,d0$0=d,param$0=l;continue}
            var param$0=r;
            continue}
          return [0,[0,v0$0,d0$0]]}}
      function find_first_opt(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_first_opt_aux(v,d,f,l);
            var param$0=r;
            continue}
          return 0}}
      function find_last_aux(v0,d0,f,param)
       {var v0$0=v0,d0$0=d0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,d0$0=d,param$0=r;continue}
            var param$0=l;
            continue}
          return [0,v0$0,d0$0]}}
      function find_last(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_last_aux(v,d,f,r);
            var param$0=l;
            continue}
          throw Not_found}}
      function find_last_opt_aux(v0,d0,f,param)
       {var v0$0=v0,d0$0=d0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,d0$0=d,param$0=r;continue}
            var param$0=l;
            continue}
          return [0,[0,v0$0,d0$0]]}}
      function find_last_opt(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_last_opt_aux(v,d,f,r);
            var param$0=l;
            continue}
          return 0}}
      function find_opt(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             d=param$0[3],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v);
            if(0 === c)return [0,d];
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          return 0}}
      function mem(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v),
             _H_=0 === c?1:0;
            if(_H_)return _H_;
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          return 0}}
      function min_binding(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _G_=param$0[1];
            if(_G_){var param$0=_G_;continue}
            var d=param$0[3],v=param$0[2];
            return [0,v,d]}
          throw Not_found}}
      function min_binding_opt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _F_=param$0[1];
            if(_F_){var param$0=_F_;continue}
            var d=param$0[3],v=param$0[2];
            return [0,[0,v,d]]}
          return 0}}
      function max_binding(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _C_=param$0[4],_D_=param$0[3],_E_=param$0[2];
            if(_C_){var param$0=_C_;continue}
            return [0,_E_,_D_]}
          throw Not_found}}
      function max_binding_opt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _z_=param$0[4],_A_=param$0[3],_B_=param$0[2];
            if(_z_){var param$0=_z_;continue}
            return [0,[0,_B_,_A_]]}
          return 0}}
      function remove_min_binding(param)
       {if(param)
         {var _y_=param[1];
          if(_y_)
           {var r=param[4],d=param[3],v=param[2];
            return bal(remove_min_binding(_y_),v,d,r)}
          var r$0=param[4];
          return r$0}
        return caml_call1(Pervasives[1],cst_Map_remove_min_elt)}
      function _f_(t,match)
       {if(t)
         {if(match)
           {var match$0=min_binding(match),d=match$0[2],x=match$0[1];
            return bal(t,x,d,remove_min_binding(match))}
          return t}
        return match}
      function remove(x,m)
       {if(m)
         {var r=m[4],d=m[3],v=m[2],l=m[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)return _f_(l,r);
          if(0 <= c){var rr=remove(x,r);return r === rr?m:bal(l,v,d,rr)}
          var ll=remove(x,l);
          return l === ll?m:bal(ll,v,d,r)}
        return 0}
      function update(x,f,m)
       {if(m)
         {var h=m[5],r=m[4],d=m[3],v=m[2],l=m[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)
           {var match=caml_call1(f,[0,d]);
            if(match){var data=match[1];return d === data?m:[0,l,x,data,r,h]}
            return _f_(l,r)}
          if(0 <= c){var rr=update(x,f,r);return r === rr?m:bal(l,v,d,rr)}
          var ll=update(x,f,l);
          return l === ll?m:bal(ll,v,d,r)}
        var match$0=caml_call1(f,0);
        if(match$0){var data$0=match$0[1];return [0,0,x,data$0,0,1]}
        return 0}
      function iter(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var param$1=param$0[4],d=param$0[3],v=param$0[2],l=param$0[1];
            iter(f,l);
            caml_call2(f,v,d);
            var param$0=param$1;
            continue}
          return 0}}
      function map(f,param)
       {if(param)
         {var
           h=param[5],
           r=param[4],
           d=param[3],
           v=param[2],
           l=param[1],
           l$0=map(f,l),
           d$0=caml_call1(f,d),
           r$0=map(f,r);
          return [0,l$0,v,d$0,r$0,h]}
        return 0}
      function mapi(f,param)
       {if(param)
         {var
           h=param[5],
           r=param[4],
           d=param[3],
           v=param[2],
           l=param[1],
           l$0=mapi(f,l),
           d$0=caml_call2(f,v,d),
           r$0=mapi(f,r);
          return [0,l$0,v,d$0,r$0,h]}
        return 0}
      function fold(f,m,accu)
       {var m$0=m,accu$0=accu;
        for(;;)
         {if(m$0)
           {var
             m$1=m$0[4],
             d=m$0[3],
             v=m$0[2],
             l=m$0[1],
             accu$1=caml_call3(f,v,d,fold(f,l,accu$0)),
             m$0=m$1,
             accu$0=accu$1;
            continue}
          return accu$0}}
      function for_all(p,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             d=param$0[3],
             v=param$0[2],
             l=param$0[1],
             _v_=caml_call2(p,v,d);
            if(_v_)
             {var _w_=for_all(p,l);if(_w_){var param$0=r;continue}var _x_=_w_}
            else
             var _x_=_v_;
            return _x_}
          return 1}}
      function exists(p,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             d=param$0[3],
             v=param$0[2],
             l=param$0[1],
             _s_=caml_call2(p,v,d);
            if(_s_)
             var _t_=_s_;
            else
             {var _u_=exists(p,l);
              if(! _u_){var param$0=r;continue}
              var _t_=_u_}
            return _t_}
          return 0}}
      function add_min_binding(k,x,param)
       {if(param)
         {var r=param[4],d=param[3],v=param[2],l=param[1];
          return bal(add_min_binding(k,x,l),v,d,r)}
        return singleton(k,x)}
      function add_max_binding(k,x,param)
       {if(param)
         {var r=param[4],d=param[3],v=param[2],l=param[1];
          return bal(l,v,d,add_max_binding(k,x,r))}
        return singleton(k,x)}
      function join(l,v,d,r)
       {if(l)
         {if(r)
           {var
             rh=r[5],
             rr=r[4],
             rd=r[3],
             rv=r[2],
             rl=r[1],
             lh=l[5],
             lr=l[4],
             ld=l[3],
             lv=l[2],
             ll=l[1];
            return (rh + 2 | 0) < lh
                    ?bal(ll,lv,ld,join(lr,v,d,r))
                    :(lh + 2 | 0) < rh
                      ?bal(join(l,v,d,rl),rv,rd,rr)
                      :create(l,v,d,r)}
          return add_max_binding(v,d,l)}
        return add_min_binding(v,d,r)}
      function concat(t,match)
       {if(t)
         {if(match)
           {var match$0=min_binding(match),d=match$0[2],x=match$0[1];
            return join(t,x,d,remove_min_binding(match))}
          return t}
        return match}
      function concat_or_join(t1,v,d,t2)
       {if(d){var d$0=d[1];return join(t1,v,d$0,t2)}return concat(t1,t2)}
      function split(x,param)
       {if(param)
         {var
           r=param[4],
           d=param[3],
           v=param[2],
           l=param[1],
           c=caml_call2(Ord[1],x,v);
          if(0 === c)return [0,l,[0,d],r];
          if(0 <= c)
           {var match=split(x,r),rr=match[3],pres=match[2],lr=match[1];
            return [0,join(l,v,d,lr),pres,rr]}
          var
           match$0=split(x,l),
           rl=match$0[3],
           pres$0=match$0[2],
           ll=match$0[1];
          return [0,ll,pres$0,join(rl,v,d,r)]}
        return _a_}
      function merge(f,s1,s2)
       {if(s1)
         {var h1=s1[5],r1=s1[4],d1=s1[3],v1=s1[2],l1=s1[1];
          if(height(s2) <= h1)
           {var
             match=split(v1,s2),
             r2=match[3],
             d2=match[2],
             l2=match[1],
             _o_=merge(f,r1,r2),
             _p_=caml_call3(f,v1,[0,d1],d2);
            return concat_or_join(merge(f,l1,l2),v1,_p_,_o_)}}
        else
         if(! s2)return 0;
        if(s2)
         {var
           r2$0=s2[4],
           d2$0=s2[3],
           v2=s2[2],
           l2$0=s2[1],
           match$0=split(v2,s1),
           r1$0=match$0[3],
           d1$0=match$0[2],
           l1$0=match$0[1],
           _q_=merge(f,r1$0,r2$0),
           _r_=caml_call3(f,v2,d1$0,[0,d2$0]);
          return concat_or_join(merge(f,l1$0,l2$0),v2,_r_,_q_)}
        throw [0,Assert_failure,_b_]}
      function union(f,s1,s2)
       {if(s1)
         {if(s2)
           {var
             h2=s2[5],
             r2=s2[4],
             d2=s2[3],
             v2=s2[2],
             l2=s2[1],
             h1=s1[5],
             r1=s1[4],
             d1=s1[3],
             v1=s1[2],
             l1=s1[1];
            if(h2 <= h1)
             {var
               match=split(v1,s2),
               r2$0=match[3],
               d2$0=match[2],
               l2$0=match[1],
               l=union(f,l1,l2$0),
               r=union(f,r1,r2$0);
              if(d2$0)
               {var d2$1=d2$0[1];
                return concat_or_join(l,v1,caml_call3(f,v1,d1,d2$1),r)}
              return join(l,v1,d1,r)}
            var
             match$0=split(v2,s1),
             r1$0=match$0[3],
             d1$0=match$0[2],
             l1$0=match$0[1],
             l$0=union(f,l1$0,l2),
             r$0=union(f,r1$0,r2);
            if(d1$0)
             {var d1$1=d1$0[1];
              return concat_or_join(l$0,v2,caml_call3(f,v2,d1$1,d2),r$0)}
            return join(l$0,v2,d2,r$0)}
          var s=s1}
        else
         var s=s2;
        return s}
      function filter(p,m)
       {if(m)
         {var
           r=m[4],
           d=m[3],
           v=m[2],
           l=m[1],
           l$0=filter(p,l),
           pvd=caml_call2(p,v,d),
           r$0=filter(p,r);
          if(pvd){if(l === l$0)if(r === r$0)return m;return join(l$0,v,d,r$0)}
          return concat(l$0,r$0)}
        return 0}
      function partition(p,param)
       {if(param)
         {var
           r=param[4],
           d=param[3],
           v=param[2],
           l=param[1],
           match=partition(p,l),
           lf=match[2],
           lt=match[1],
           pvd=caml_call2(p,v,d),
           match$0=partition(p,r),
           rf=match$0[2],
           rt=match$0[1];
          if(pvd){var _m_=concat(lf,rf);return [0,join(lt,v,d,rt),_m_]}
          var _n_=join(lf,v,d,rf);
          return [0,concat(lt,rt),_n_]}
        return _c_}
      function cons_enum(m,e)
       {var m$0=m,e$0=e;
        for(;;)
         {if(m$0)
           {var
             r=m$0[4],
             d=m$0[3],
             v=m$0[2],
             m$1=m$0[1],
             e$1=[0,v,d,r,e$0],
             m$0=m$1,
             e$0=e$1;
            continue}
          return e$0}}
      function compare(cmp,m1,m2)
       {function compare_aux(e1,e2)
         {var e1$0=e1,e2$0=e2;
          for(;;)
           {if(e1$0)
             {if(e2$0)
               {var
                 e2$1=e2$0[4],
                 r2=e2$0[3],
                 d2=e2$0[2],
                 v2=e2$0[1],
                 e1$1=e1$0[4],
                 r1=e1$0[3],
                 d1=e1$0[2],
                 v1=e1$0[1],
                 c=caml_call2(Ord[1],v1,v2);
                if(0 === c)
                 {var c$0=caml_call2(cmp,d1,d2);
                  if(0 === c$0)
                   {var
                     e2$2=cons_enum(r2,e2$1),
                     e1$2=cons_enum(r1,e1$1),
                     e1$0=e1$2,
                     e2$0=e2$2;
                    continue}
                  return c$0}
                return c}
              return 1}
            return e2$0?-1:0}}
        var _l_=cons_enum(m2,0);
        return compare_aux(cons_enum(m1,0),_l_)}
      function equal(cmp,m1,m2)
       {function equal_aux(e1,e2)
         {var e1$0=e1,e2$0=e2;
          for(;;)
           {if(e1$0)
             {if(e2$0)
               {var
                 e2$1=e2$0[4],
                 r2=e2$0[3],
                 d2=e2$0[2],
                 v2=e2$0[1],
                 e1$1=e1$0[4],
                 r1=e1$0[3],
                 d1=e1$0[2],
                 v1=e1$0[1],
                 _i_=0 === caml_call2(Ord[1],v1,v2)?1:0;
                if(_i_)
                 {var _j_=caml_call2(cmp,d1,d2);
                  if(_j_)
                   {var
                     e2$2=cons_enum(r2,e2$1),
                     e1$2=cons_enum(r1,e1$1),
                     e1$0=e1$2,
                     e2$0=e2$2;
                    continue}
                  var _k_=_j_}
                else
                 var _k_=_i_;
                return _k_}
              return 0}
            return e2$0?0:1}}
        var _h_=cons_enum(m2,0);
        return equal_aux(cons_enum(m1,0),_h_)}
      function cardinal(param)
       {if(param)
         {var r=param[4],l=param[1],_g_=cardinal(r);
          return (cardinal(l) + 1 | 0) + _g_ | 0}
        return 0}
      function bindings_aux(accu,param)
       {var accu$0=accu,param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[4],
             d=param$0[3],
             v=param$0[2],
             param$1=param$0[1],
             accu$1=[0,[0,v,d],bindings_aux(accu$0,r)],
             accu$0=accu$1,
             param$0=param$1;
            continue}
          return accu$0}}
      function bindings(s){return bindings_aux(0,s)}
      return [0,
              height,
              create,
              singleton,
              bal,
              empty,
              is_empty,
              add,
              find,
              find_first_aux,
              find_first,
              find_first_opt_aux,
              find_first_opt,
              find_last_aux,
              find_last,
              find_last_opt_aux,
              find_last_opt,
              find_opt,
              mem,
              min_binding,
              min_binding_opt,
              max_binding,
              max_binding_opt,
              remove_min_binding,
              remove,
              update,
              iter,
              map,
              mapi,
              fold,
              for_all,
              exists,
              add_min_binding,
              add_max_binding,
              join,
              concat,
              concat_or_join,
              split,
              merge,
              union,
              filter,
              partition,
              cons_enum,
              compare,
              equal,
              cardinal,
              bindings_aux,
              bindings,
              min_binding,
              min_binding_opt]}
    var
     Map=
      [0,
       function(_d_)
        {var _e_=Make(_d_);
         return [0,
                 _e_[5],
                 _e_[6],
                 _e_[18],
                 _e_[7],
                 _e_[25],
                 _e_[3],
                 _e_[24],
                 _e_[38],
                 _e_[39],
                 _e_[43],
                 _e_[44],
                 _e_[26],
                 _e_[29],
                 _e_[30],
                 _e_[31],
                 _e_[40],
                 _e_[41],
                 _e_[45],
                 _e_[47],
                 _e_[19],
                 _e_[20],
                 _e_[21],
                 _e_[22],
                 _e_[48],
                 _e_[49],
                 _e_[37],
                 _e_[8],
                 _e_[17],
                 _e_[10],
                 _e_[12],
                 _e_[14],
                 _e_[16],
                 _e_[27],
                 _e_[28]]}];
    runtime.caml_register_global(11,Map,"Map");
    return}
  (function(){return this}()));
