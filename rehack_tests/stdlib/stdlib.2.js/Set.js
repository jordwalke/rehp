(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Set_remove_min_elt=caml_new_string("Set.remove_min_elt"),
     cst_Set_bal=caml_new_string("Set.bal"),
     cst_Set_bal$0=caml_new_string("Set.bal"),
     cst_Set_bal$1=caml_new_string("Set.bal"),
     cst_Set_bal$2=caml_new_string("Set.bal"),
     Not_found=global_data.Not_found,
     Pervasives=global_data.Pervasives,
     List=global_data.List,
     Assert_failure=global_data.Assert_failure,
     _a_=[0,0,0,0],
     _b_=[0,0,0],
     _c_=[0,caml_new_string("set.ml"),510,18];
    function Make(Ord)
     {function height(param){if(param){var h=param[4];return h}return 0}
      function create(l,v,r)
       {if(l)var h=l[4],hl=h;else var hl=0;
        if(r)var h$0=r[4],hr=h$0;else var hr=0;
        var _ac_=hr <= hl?hl + 1 | 0:hr + 1 | 0;
        return [0,l,v,r,_ac_]}
      function bal(l,v,r)
       {if(l)var h=l[4],hl=h;else var hl=0;
        if(r)var h$0=r[4],hr=h$0;else var hr=0;
        if((hr + 2 | 0) < hl)
         {if(l)
           {var lr=l[3],lv=l[2],ll=l[1],_Z_=height(lr);
            if(_Z_ <= height(ll))return create(ll,lv,create(lr,v,r));
            if(lr)
             {var lrr=lr[3],lrv=lr[2],lrl=lr[1],___=create(lrr,v,r);
              return create(create(ll,lv,lrl),lrv,___)}
            return caml_call1(Pervasives[1],cst_Set_bal)}
          return caml_call1(Pervasives[1],cst_Set_bal$0)}
        if((hl + 2 | 0) < hr)
         {if(r)
           {var rr=r[3],rv=r[2],rl=r[1],_$_=height(rl);
            if(_$_ <= height(rr))return create(create(l,v,rl),rv,rr);
            if(rl)
             {var rlr=rl[3],rlv=rl[2],rll=rl[1],_aa_=create(rlr,rv,rr);
              return create(create(l,v,rll),rlv,_aa_)}
            return caml_call1(Pervasives[1],cst_Set_bal$1)}
          return caml_call1(Pervasives[1],cst_Set_bal$2)}
        var _ab_=hr <= hl?hl + 1 | 0:hr + 1 | 0;
        return [0,l,v,r,_ab_]}
      function add(x,t)
       {if(t)
         {var r=t[3],v=t[2],l=t[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)return t;
          if(0 <= c){var rr=add(x,r);return r === rr?t:bal(l,v,rr)}
          var ll=add(x,l);
          return l === ll?t:bal(ll,v,r)}
        return [0,0,x,0,1]}
      function singleton(x){return [0,0,x,0,1]}
      function add_min_element(x,param)
       {if(param)
         {var r=param[3],v=param[2],l=param[1];
          return bal(add_min_element(x,l),v,r)}
        return singleton(x)}
      function add_max_element(x,param)
       {if(param)
         {var r=param[3],v=param[2],l=param[1];
          return bal(l,v,add_max_element(x,r))}
        return singleton(x)}
      function join(l,v,r)
       {if(l)
         {if(r)
           {var
             rh=r[4],
             rr=r[3],
             rv=r[2],
             rl=r[1],
             lh=l[4],
             lr=l[3],
             lv=l[2],
             ll=l[1];
            return (rh + 2 | 0) < lh
                    ?bal(ll,lv,join(lr,v,r))
                    :(lh + 2 | 0) < rh?bal(join(l,v,rl),rv,rr):create(l,v,r)}
          return add_max_element(v,l)}
        return add_min_element(v,r)}
      function min_elt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _Y_=param$0[1];
            if(_Y_){var param$0=_Y_;continue}
            var v=param$0[2];
            return v}
          throw Not_found}}
      function min_elt_opt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _X_=param$0[1];
            if(_X_){var param$0=_X_;continue}
            var v=param$0[2];
            return [0,v]}
          return 0}}
      function max_elt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _V_=param$0[3],_W_=param$0[2];
            if(_V_){var param$0=_V_;continue}
            return _W_}
          throw Not_found}}
      function max_elt_opt(param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var _T_=param$0[3],_U_=param$0[2];
            if(_T_){var param$0=_T_;continue}
            return [0,_U_]}
          return 0}}
      function remove_min_elt(param)
       {if(param)
         {var _S_=param[1];
          if(_S_)
           {var r=param[3],v=param[2];return bal(remove_min_elt(_S_),v,r)}
          var r$0=param[3];
          return r$0}
        return caml_call1(Pervasives[1],cst_Set_remove_min_elt)}
      function merge(t,match)
       {if(t)
         {if(match)
           {var _R_=remove_min_elt(match);return bal(t,min_elt(match),_R_)}
          return t}
        return match}
      function concat(t,match)
       {if(t)
         {if(match)
           {var _Q_=remove_min_elt(match);return join(t,min_elt(match),_Q_)}
          return t}
        return match}
      function split(x,param)
       {if(param)
         {var r=param[3],v=param[2],l=param[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)return [0,l,1,r];
          if(0 <= c)
           {var match=split(x,r),rr=match[3],pres=match[2],lr=match[1];
            return [0,join(l,v,lr),pres,rr]}
          var
           match$0=split(x,l),
           rl=match$0[3],
           pres$0=match$0[2],
           ll=match$0[1];
          return [0,ll,pres$0,join(rl,v,r)]}
        return _a_}
      var empty=0;
      function is_empty(param){return param?0:1}
      function mem(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[3],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v),
             _P_=0 === c?1:0;
            if(_P_)return _P_;
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          return 0}}
      function remove(x,t)
       {if(t)
         {var r=t[3],v=t[2],l=t[1],c=caml_call2(Ord[1],x,v);
          if(0 === c)return merge(l,r);
          if(0 <= c){var rr=remove(x,r);return r === rr?t:bal(l,v,rr)}
          var ll=remove(x,l);
          return l === ll?t:bal(ll,v,r)}
        return 0}
      function union(t1,match)
       {if(t1)
         {if(match)
           {var
             h2=match[4],
             r2=match[3],
             v2=match[2],
             l2=match[1],
             h1=t1[4],
             r1=t1[3],
             v1=t1[2],
             l1=t1[1];
            if(h2 <= h1)
             {if(1 === h2)return add(v2,t1);
              var
               match$0=split(v1,match),
               r2$0=match$0[3],
               l2$0=match$0[1],
               _N_=union(r1,r2$0);
              return join(union(l1,l2$0),v1,_N_)}
            if(1 === h1)return add(v1,match);
            var
             match$1=split(v2,t1),
             r1$0=match$1[3],
             l1$0=match$1[1],
             _O_=union(r1$0,r2);
            return join(union(l1$0,l2),v2,_O_)}
          return t1}
        return match}
      function inter(s1,match)
       {if(s1)
         {if(match)
           {var r1=s1[3],v1=s1[2],l1=s1[1],_J_=split(v1,match),_K_=_J_[1];
            if(0 === _J_[2])
             {var r2=_J_[3],_L_=inter(r1,r2);return concat(inter(l1,_K_),_L_)}
            var r2$0=_J_[3],_M_=inter(r1,r2$0);
            return join(inter(l1,_K_),v1,_M_)}
          return 0}
        return 0}
      function diff(t1,match)
       {if(t1)
         {if(match)
           {var r1=t1[3],v1=t1[2],l1=t1[1],_F_=split(v1,match),_G_=_F_[1];
            if(0 === _F_[2])
             {var r2=_F_[3],_H_=diff(r1,r2);return join(diff(l1,_G_),v1,_H_)}
            var r2$0=_F_[3],_I_=diff(r1,r2$0);
            return concat(diff(l1,_G_),_I_)}
          return t1}
        return 0}
      function cons_enum(s,e)
       {var s$0=s,e$0=e;
        for(;;)
         {if(s$0)
           {var r=s$0[3],v=s$0[2],s$1=s$0[1],e$1=[0,v,r,e$0],s$0=s$1,e$0=e$1;
            continue}
          return e$0}}
      function compare_aux(e1,e2)
       {var e1$0=e1,e2$0=e2;
        for(;;)
         {if(e1$0)
           {if(e2$0)
             {var
               e2$1=e2$0[3],
               r2=e2$0[2],
               v2=e2$0[1],
               e1$1=e1$0[3],
               r1=e1$0[2],
               v1=e1$0[1],
               c=caml_call2(Ord[1],v1,v2);
              if(0 === c)
               {var
                 e2$2=cons_enum(r2,e2$1),
                 e1$2=cons_enum(r1,e1$1),
                 e1$0=e1$2,
                 e2$0=e2$2;
                continue}
              return c}
            return 1}
          return e2$0?-1:0}}
      function compare(s1,s2)
       {var _E_=cons_enum(s2,0);return compare_aux(cons_enum(s1,0),_E_)}
      function equal(s1,s2){return 0 === compare(s1,s2)?1:0}
      function subset(s1,s2)
       {var s1$0=s1,s2$0=s2;
        for(;;)
         {if(s1$0)
           {if(s2$0)
             {var
               r2=s2$0[3],
               v2=s2$0[2],
               l2=s2$0[1],
               r1=s1$0[3],
               v1=s1$0[2],
               l1=s1$0[1],
               c=caml_call2(Ord[1],v1,v2);
              if(0 === c)
               {var _B_=subset(l1,l2);
                if(_B_){var s1$0=r1,s2$0=r2;continue}
                return _B_}
              if(0 <= c)
               {var _C_=subset([0,0,v1,r1,0],r2);
                if(_C_){var s1$0=l1;continue}
                return _C_}
              var _D_=subset([0,l1,v1,0,0],l2);
              if(_D_){var s1$0=r1;continue}
              return _D_}
            return 0}
          return 1}}
      function iter(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var param$1=param$0[3],v=param$0[2],l=param$0[1];
            iter(f,l);
            caml_call1(f,v);
            var param$0=param$1;
            continue}
          return 0}}
      function fold(f,s,accu)
       {var s$0=s,accu$0=accu;
        for(;;)
         {if(s$0)
           {var
             s$1=s$0[3],
             v=s$0[2],
             l=s$0[1],
             accu$1=caml_call2(f,v,fold(f,l,accu$0)),
             s$0=s$1,
             accu$0=accu$1;
            continue}
          return accu$0}}
      function for_all(p,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1],_y_=caml_call1(p,v);
            if(_y_)
             {var _z_=for_all(p,l);if(_z_){var param$0=r;continue}var _A_=_z_}
            else
             var _A_=_y_;
            return _A_}
          return 1}}
      function exists(p,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1],_v_=caml_call1(p,v);
            if(_v_)
             var _w_=_v_;
            else
             {var _x_=exists(p,l);
              if(! _x_){var param$0=r;continue}
              var _w_=_x_}
            return _w_}
          return 0}}
      function filter(p,t)
       {if(t)
         {var
           r=t[3],
           v=t[2],
           l=t[1],
           l$0=filter(p,l),
           pv=caml_call1(p,v),
           r$0=filter(p,r);
          if(pv){if(l === l$0)if(r === r$0)return t;return join(l$0,v,r$0)}
          return concat(l$0,r$0)}
        return 0}
      function partition(p,param)
       {if(param)
         {var
           r=param[3],
           v=param[2],
           l=param[1],
           match=partition(p,l),
           lf=match[2],
           lt=match[1],
           pv=caml_call1(p,v),
           match$0=partition(p,r),
           rf=match$0[2],
           rt=match$0[1];
          if(pv){var _t_=concat(lf,rf);return [0,join(lt,v,rt),_t_]}
          var _u_=join(lf,v,rf);
          return [0,concat(lt,rt),_u_]}
        return _b_}
      function cardinal(param)
       {if(param)
         {var r=param[3],l=param[1],_s_=cardinal(r);
          return (cardinal(l) + 1 | 0) + _s_ | 0}
        return 0}
      function elements_aux(accu,param)
       {var accu$0=accu,param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[3],
             v=param$0[2],
             param$1=param$0[1],
             accu$1=[0,v,elements_aux(accu$0,r)],
             accu$0=accu$1,
             param$0=param$1;
            continue}
          return accu$0}}
      function elements(s){return elements_aux(0,s)}
      function find(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[3],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v);
            if(0 === c)return v;
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          throw Not_found}}
      function find_first_aux(v0,f,param)
       {var v0$0=v0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,param$0=l;continue}
            var param$0=r;
            continue}
          return v0$0}}
      function find_first(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_first_aux(v,f,l);
            var param$0=r;
            continue}
          throw Not_found}}
      function find_first_opt_aux(v0,f,param)
       {var v0$0=v0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,param$0=l;continue}
            var param$0=r;
            continue}
          return [0,v0$0]}}
      function find_first_opt(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_first_opt_aux(v,f,l);
            var param$0=r;
            continue}
          return 0}}
      function find_last_aux(v0,f,param)
       {var v0$0=v0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,param$0=r;continue}
            var param$0=l;
            continue}
          return v0$0}}
      function find_last(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_last_aux(v,f,r);
            var param$0=l;
            continue}
          throw Not_found}}
      function find_last_opt_aux(v0,f,param)
       {var v0$0=v0,param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v)){var v0$0=v,param$0=r;continue}
            var param$0=l;
            continue}
          return [0,v0$0]}}
      function find_last_opt(f,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var r=param$0[3],v=param$0[2],l=param$0[1];
            if(caml_call1(f,v))return find_last_opt_aux(v,f,r);
            var param$0=l;
            continue}
          return 0}}
      function find_opt(x,param)
       {var param$0=param;
        for(;;)
         {if(param$0)
           {var
             r=param$0[3],
             v=param$0[2],
             l=param$0[1],
             c=caml_call2(Ord[1],x,v);
            if(0 === c)return [0,v];
            var param$1=0 <= c?r:l,param$0=param$1;
            continue}
          return 0}}
      function try_join(l,v,r)
       {if(0 === l)
         var switch$0=0;
        else
         var _r_=max_elt(l),switch$0=0 <= caml_call2(Ord[1],_r_,v)?1:0;
        if(! switch$0)
         {if(0 === r)
           var switch$1=0;
          else
           var _q_=min_elt(r),switch$1=0 <= caml_call2(Ord[1],v,_q_)?1:0;
          if(! switch$1)return join(l,v,r)}
        return union(l,add(v,r))}
      function map(f,t)
       {if(t)
         {var
           r=t[3],
           v=t[2],
           l=t[1],
           l$0=map(f,l),
           v$0=caml_call1(f,v),
           r$0=map(f,r);
          if(l === l$0)if(v === v$0)if(r === r$0)return t;
          return try_join(l$0,v$0,r$0)}
        return 0}
      function of_sorted_list(l)
       {function sub(n,l)
         {if(! (3 < n >>> 0))
           switch(n)
            {case 0:return [0,0,l];
             case 1:
              if(l){var l$3=l[2],x0=l[1];return [0,[0,0,x0,0,1],l$3]}break;
             case 2:
              if(l)
               {var _n_=l[2];
                if(_n_)
                 {var l$4=_n_[2],x1=_n_[1],x0$0=l[1];
                  return [0,[0,[0,0,x0$0,0,1],x1,0,2],l$4]}}
              break;
             default:
              if(l)
               {var _o_=l[2];
                if(_o_)
                 {var _p_=_o_[2];
                  if(_p_)
                   {var l$5=_p_[2],x2=_p_[1],x1$0=_o_[1],x0$1=l[1];
                    return [0,[0,[0,0,x0$1,0,1],x1$0,[0,0,x2,0,1],2],l$5]}}}}
          var nl=n / 2 | 0,match=sub(nl,l),l$0=match[2],left=match[1];
          if(l$0)
           {var
             l$1=l$0[2],
             mid=l$0[1],
             match$0=sub((n - nl | 0) - 1 | 0,l$1),
             l$2=match$0[2],
             right=match$0[1];
            return [0,create(left,mid,right),l$2]}
          throw [0,Assert_failure,_c_]}
        return sub(caml_call1(List[1],l),l)[1]}
      function of_list(l)
       {if(l)
         {var _f_=l[2],_g_=l[1];
          if(_f_)
           {var _h_=_f_[2],_i_=_f_[1];
            if(_h_)
             {var _j_=_h_[2],_k_=_h_[1];
              if(_j_)
               {var _l_=_j_[2],_m_=_j_[1];
                if(_l_)
                 {if(_l_[2])
                   return of_sorted_list(caml_call2(List[51],Ord[1],l));
                  var x4=_l_[1];
                  return add(x4,add(_m_,add(_k_,add(_i_,singleton(_g_)))))}
                return add(_m_,add(_k_,add(_i_,singleton(_g_))))}
              return add(_k_,add(_i_,singleton(_g_)))}
            return add(_i_,singleton(_g_))}
          return singleton(_g_)}
        return empty}
      return [0,
              height,
              create,
              bal,
              add,
              singleton,
              add_min_element,
              add_max_element,
              join,
              min_elt,
              min_elt_opt,
              max_elt,
              max_elt_opt,
              remove_min_elt,
              merge,
              concat,
              split,
              empty,
              is_empty,
              mem,
              remove,
              union,
              inter,
              diff,
              cons_enum,
              compare_aux,
              compare,
              equal,
              subset,
              iter,
              fold,
              for_all,
              exists,
              filter,
              partition,
              cardinal,
              elements_aux,
              elements,
              min_elt,
              min_elt_opt,
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
              try_join,
              map,
              of_sorted_list,
              of_list]}
    var
     Set=
      [0,
       function(_d_)
        {var _e_=Make(_d_);
         return [0,
                 _e_[17],
                 _e_[18],
                 _e_[19],
                 _e_[4],
                 _e_[5],
                 _e_[20],
                 _e_[21],
                 _e_[22],
                 _e_[23],
                 _e_[26],
                 _e_[27],
                 _e_[28],
                 _e_[29],
                 _e_[51],
                 _e_[30],
                 _e_[31],
                 _e_[32],
                 _e_[33],
                 _e_[34],
                 _e_[35],
                 _e_[37],
                 _e_[9],
                 _e_[10],
                 _e_[11],
                 _e_[12],
                 _e_[38],
                 _e_[39],
                 _e_[16],
                 _e_[40],
                 _e_[49],
                 _e_[42],
                 _e_[44],
                 _e_[46],
                 _e_[48],
                 _e_[53]]}];
    runtime.caml_register_global(12,Set,"Set");
    return}
  (function(){return this}()));
