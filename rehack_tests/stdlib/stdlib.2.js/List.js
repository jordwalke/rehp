(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_compare=runtime.caml_compare,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_List_map2=caml_new_string("List.map2"),
     cst_List_iter2=caml_new_string("List.iter2"),
     cst_List_fold_left2=caml_new_string("List.fold_left2"),
     cst_List_fold_right2=caml_new_string("List.fold_right2"),
     cst_List_for_all2=caml_new_string("List.for_all2"),
     cst_List_exists2=caml_new_string("List.exists2"),
     cst_List_combine=caml_new_string("List.combine"),
     cst_List_rev_map2=caml_new_string("List.rev_map2"),
     cst_List_init=caml_new_string("List.init"),
     cst_List_nth$0=caml_new_string("List.nth"),
     cst_nth=caml_new_string("nth"),
     cst_List_nth=caml_new_string("List.nth"),
     cst_tl=caml_new_string("tl"),
     cst_hd=caml_new_string("hd"),
     Pervasives=global_data.Pervasives,
     Not_found=global_data.Not_found,
     Assert_failure=global_data.Assert_failure,
     _c_=[0,0,0],
     _d_=[0,caml_new_string("list.ml"),262,11];
    function length_aux(len,param)
     {var len$0=len,param$0=param;
      for(;;)
       {if(param$0)
         {var
           param$1=param$0[2],
           len$1=len$0 + 1 | 0,
           len$0=len$1,
           param$0=param$1;
          continue}
        return len$0}}
    function length(l){return length_aux(0,l)}
    function cons(a,l){return [0,a,l]}
    function hd(param)
     {if(param){var a=param[1];return a}
      return caml_call1(Pervasives[2],cst_hd)}
    function tl(param)
     {if(param){var l=param[2];return l}
      return caml_call1(Pervasives[2],cst_tl)}
    function nth(l,n)
     {if(0 <= n)
       {var
         nth_aux=
          function(l,n)
           {var l$0=l,n$0=n;
            for(;;)
             {if(l$0)
               {var l$1=l$0[2],a=l$0[1];
                if(0 === n$0)return a;
                var n$1=n$0 - 1 | 0,l$0=l$1,n$0=n$1;
                continue}
              return caml_call1(Pervasives[2],cst_nth)}};
        return nth_aux(l,n)}
      return caml_call1(Pervasives[1],cst_List_nth)}
    function nth_opt(l,n)
     {if(0 <= n)
       {var
         nth_aux=
          function(l,n)
           {var l$0=l,n$0=n;
            for(;;)
             {if(l$0)
               {var l$1=l$0[2],a=l$0[1];
                if(0 === n$0)return [0,a];
                var n$1=n$0 - 1 | 0,l$0=l$1,n$0=n$1;
                continue}
              return 0}};
        return nth_aux(l,n)}
      return caml_call1(Pervasives[1],cst_List_nth$0)}
    var append=Pervasives[25];
    function rev_append(l1,l2)
     {var l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {var l1$1=l1$0[2],a=l1$0[1],l2$1=[0,a,l2$0],l1$0=l1$1,l2$0=l2$1;
          continue}
        return l2$0}}
    function rev(l){return rev_append(l,0)}
    function init_tailrec_aux(acc,i,n,f)
     {var acc$0=acc,i$0=i;
      for(;;)
       {if(n <= i$0)return acc$0;
        var
         i$1=i$0 + 1 | 0,
         acc$1=[0,caml_call1(f,i$0),acc$0],
         acc$0=acc$1,
         i$0=i$1;
        continue}}
    function init_aux(i,n,f)
     {if(n <= i)return 0;
      var r=caml_call1(f,i);
      return [0,r,init_aux(i + 1 | 0,n,f)]}
    function init(len,f)
     {return 0 <= len
              ?10000 < len?rev(init_tailrec_aux(0,0,len,f)):init_aux(0,len,f)
              :caml_call1(Pervasives[1],cst_List_init)}
    function flatten(param)
     {if(param)
       {var r=param[2],l=param[1],_B_=flatten(r);
        return caml_call2(Pervasives[25],l,_B_)}
      return 0}
    function map(f,param)
     {if(param)
       {var l=param[2],a=param[1],r=caml_call1(f,a);return [0,r,map(f,l)]}
      return 0}
    function _a_(i,f,param)
     {if(param)
       {var l=param[2],a=param[1],r=caml_call2(f,i,a);
        return [0,r,_a_(i + 1 | 0,f,l)]}
      return 0}
    function mapi(f,l){return _a_(0,f,l)}
    function rev_map(f,l)
     {function rmap_f(accu,param)
       {var accu$0=accu,param$0=param;
        for(;;)
         {if(param$0)
           {var
             param$1=param$0[2],
             a=param$0[1],
             accu$1=[0,caml_call1(f,a),accu$0],
             accu$0=accu$1,
             param$0=param$1;
            continue}
          return accu$0}}
      return rmap_f(0,l)}
    function iter(f,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var param$1=param$0[2],a=param$0[1];
          caml_call1(f,a);
          var param$0=param$1;
          continue}
        return 0}}
    function _b_(i,f,param)
     {var i$0=i,param$0=param;
      for(;;)
       {if(param$0)
         {var param$1=param$0[2],a=param$0[1];
          caml_call2(f,i$0,a);
          var i$1=i$0 + 1 | 0,i$0=i$1,param$0=param$1;
          continue}
        return 0}}
    function iteri(f,l){return _b_(0,f,l)}
    function fold_left(f,accu,l)
     {var accu$0=accu,l$0=l;
      for(;;)
       {if(l$0)
         {var
           l$1=l$0[2],
           a=l$0[1],
           accu$1=caml_call2(f,accu$0,a),
           accu$0=accu$1,
           l$0=l$1;
          continue}
        return accu$0}}
    function fold_right(f,l,accu)
     {if(l){var l$0=l[2],a=l[1];return caml_call2(f,a,fold_right(f,l$0,accu))}
      return accu}
    function map2(f,l1,l2)
     {if(l1)
       {if(l2)
         {var l2$0=l2[2],a2=l2[1],l1$0=l1[2],a1=l1[1],r=caml_call2(f,a1,a2);
          return [0,r,map2(f,l1$0,l2$0)]}}
      else
       if(! l2)return 0;
      return caml_call1(Pervasives[1],cst_List_map2)}
    function rev_map2(f,l1,l2)
     {function rmap2_f(accu,l1,l2)
       {var accu$0=accu,l1$0=l1,l2$0=l2;
        for(;;)
         {if(l1$0)
           {if(l2$0)
             {var
               l2$1=l2$0[2],
               a2=l2$0[1],
               l1$1=l1$0[2],
               a1=l1$0[1],
               accu$1=[0,caml_call2(f,a1,a2),accu$0],
               accu$0=accu$1,
               l1$0=l1$1,
               l2$0=l2$1;
              continue}}
          else
           if(! l2$0)return accu$0;
          return caml_call1(Pervasives[1],cst_List_rev_map2)}}
      return rmap2_f(0,l1,l2)}
    function iter2(f,l1,l2)
     {var l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {if(l2$0)
           {var l2$1=l2$0[2],a2=l2$0[1],l1$1=l1$0[2],a1=l1$0[1];
            caml_call2(f,a1,a2);
            var l1$0=l1$1,l2$0=l2$1;
            continue}}
        else
         if(! l2$0)return 0;
        return caml_call1(Pervasives[1],cst_List_iter2)}}
    function fold_left2(f,accu,l1,l2)
     {var accu$0=accu,l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {if(l2$0)
           {var
             l2$1=l2$0[2],
             a2=l2$0[1],
             l1$1=l1$0[2],
             a1=l1$0[1],
             accu$1=caml_call3(f,accu$0,a1,a2),
             accu$0=accu$1,
             l1$0=l1$1,
             l2$0=l2$1;
            continue}}
        else
         if(! l2$0)return accu$0;
        return caml_call1(Pervasives[1],cst_List_fold_left2)}}
    function fold_right2(f,l1,l2,accu)
     {if(l1)
       {if(l2)
         {var l2$0=l2[2],a2=l2[1],l1$0=l1[2],a1=l1[1];
          return caml_call3(f,a1,a2,fold_right2(f,l1$0,l2$0,accu))}}
      else
       if(! l2)return accu;
      return caml_call1(Pervasives[1],cst_List_fold_right2)}
    function for_all(p,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],a=param$0[1],_A_=caml_call1(p,a);
          if(_A_){var param$0=l;continue}
          return _A_}
        return 1}}
    function exists(p,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],a=param$0[1],_z_=caml_call1(p,a);
          if(_z_)return _z_;
          var param$0=l;
          continue}
        return 0}}
    function for_all2(p,l1,l2)
     {var l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {if(l2$0)
           {var
             l2$1=l2$0[2],
             a2=l2$0[1],
             l1$1=l1$0[2],
             a1=l1$0[1],
             _y_=caml_call2(p,a1,a2);
            if(_y_){var l1$0=l1$1,l2$0=l2$1;continue}
            return _y_}}
        else
         if(! l2$0)return 1;
        return caml_call1(Pervasives[1],cst_List_for_all2)}}
    function exists2(p,l1,l2)
     {var l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {if(l2$0)
           {var
             l2$1=l2$0[2],
             a2=l2$0[1],
             l1$1=l1$0[2],
             a1=l1$0[1],
             _x_=caml_call2(p,a1,a2);
            if(_x_)return _x_;
            var l1$0=l1$1,l2$0=l2$1;
            continue}}
        else
         if(! l2$0)return 0;
        return caml_call1(Pervasives[1],cst_List_exists2)}}
    function mem(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],a=param$0[1],_w_=0 === caml_compare(a,x)?1:0;
          if(_w_)return _w_;
          var param$0=l;
          continue}
        return 0}}
    function memq(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],a=param$0[1],_v_=a === x?1:0;
          if(_v_)return _v_;
          var param$0=l;
          continue}
        return 0}}
    function assoc(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],match=param$0[1],b=match[2],a=match[1];
          if(0 === caml_compare(a,x))return b;
          var param$0=l;
          continue}
        throw Not_found}}
    function assoc_opt(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],match=param$0[1],b=match[2],a=match[1];
          if(0 === caml_compare(a,x))return [0,b];
          var param$0=l;
          continue}
        return 0}}
    function assq(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],match=param$0[1],b=match[2],a=match[1];
          if(a === x)return b;
          var param$0=l;
          continue}
        throw Not_found}}
    function assq_opt(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],match=param$0[1],b=match[2],a=match[1];
          if(a === x)return [0,b];
          var param$0=l;
          continue}
        return 0}}
    function mem_assoc(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var
           l=param$0[2],
           match=param$0[1],
           a=match[1],
           _u_=0 === caml_compare(a,x)?1:0;
          if(_u_)return _u_;
          var param$0=l;
          continue}
        return 0}}
    function mem_assq(x,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],match=param$0[1],a=match[1],_t_=a === x?1:0;
          if(_t_)return _t_;
          var param$0=l;
          continue}
        return 0}}
    function remove_assoc(x,param)
     {if(param)
       {var l=param[2],pair=param[1],a=pair[1];
        return 0 === caml_compare(a,x)?l:[0,pair,remove_assoc(x,l)]}
      return 0}
    function remove_assq(x,param)
     {if(param)
       {var l=param[2],pair=param[1],a=pair[1];
        return a === x?l:[0,pair,remove_assq(x,l)]}
      return 0}
    function find(p,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],x=param$0[1];
          if(caml_call1(p,x))return x;
          var param$0=l;
          continue}
        throw Not_found}}
    function find_opt(p,param)
     {var param$0=param;
      for(;;)
       {if(param$0)
         {var l=param$0[2],x=param$0[1];
          if(caml_call1(p,x))return [0,x];
          var param$0=l;
          continue}
        return 0}}
    function find_all(p)
     {function find(accu,param)
       {var accu$0=accu,param$0=param;
        for(;;)
         {if(param$0)
           {var l=param$0[2],x=param$0[1];
            if(caml_call1(p,x))
             {var accu$1=[0,x,accu$0],accu$0=accu$1,param$0=l;continue}
            var param$0=l;
            continue}
          return rev(accu$0)}}
      var _r_=0;
      return function(_s_){return find(_r_,_s_)}}
    function partition(p,l)
     {function part(yes,no,param)
       {var yes$0=yes,no$0=no,param$0=param;
        for(;;)
         {if(param$0)
           {var l=param$0[2],x=param$0[1];
            if(caml_call1(p,x))
             {var yes$1=[0,x,yes$0],yes$0=yes$1,param$0=l;continue}
            var no$1=[0,x,no$0],no$0=no$1,param$0=l;
            continue}
          var _q_=rev(no$0);
          return [0,rev(yes$0),_q_]}}
      return part(0,0,l)}
    function split(param)
     {if(param)
       {var
         l=param[2],
         match=param[1],
         y=match[2],
         x=match[1],
         match$0=split(l),
         ry=match$0[2],
         rx=match$0[1];
        return [0,[0,x,rx],[0,y,ry]]}
      return _c_}
    function combine(l1,l2)
     {if(l1)
       {if(l2)
         {var l2$0=l2[2],a2=l2[1],l1$0=l1[2],a1=l1[1];
          return [0,[0,a1,a2],combine(l1$0,l2$0)]}}
      else
       if(! l2)return 0;
      return caml_call1(Pervasives[1],cst_List_combine)}
    function merge(cmp,l1,match)
     {if(l1)
       {if(match)
         {var t2=match[2],h2=match[1],t1=l1[2],h1=l1[1];
          return 0 < caml_call2(cmp,h1,h2)
                  ?[0,h2,merge(cmp,l1,t2)]
                  :[0,h1,merge(cmp,t1,match)]}
        return l1}
      return match}
    function chop(k,l)
     {var k$0=k,l$0=l;
      for(;;)
       {if(0 === k$0)return l$0;
        if(l$0){var l$1=l$0[2],k$1=k$0 - 1 | 0,k$0=k$1,l$0=l$1;continue}
        throw [0,Assert_failure,_d_]}}
    function stable_sort(cmp,l)
     {function rev_merge(l1,l2,accu)
       {var l1$0=l1,l2$0=l2,accu$0=accu;
        for(;;)
         {if(l1$0)
           {if(l2$0)
             {var t2=l2$0[2],h2=l2$0[1],t1=l1$0[2],h1=l1$0[1];
              if(0 < caml_call2(cmp,h1,h2))
               {var accu$1=[0,h2,accu$0],l2$0=t2,accu$0=accu$1;continue}
              var accu$2=[0,h1,accu$0],l1$0=t1,accu$0=accu$2;
              continue}
            return rev_append(l1$0,accu$0)}
          return rev_append(l2$0,accu$0)}}
      function rev_merge_rev(l1,l2,accu)
       {var l1$0=l1,l2$0=l2,accu$0=accu;
        for(;;)
         {if(l1$0)
           {if(l2$0)
             {var t2=l2$0[2],h2=l2$0[1],t1=l1$0[2],h1=l1$0[1];
              if(0 < caml_call2(cmp,h1,h2))
               {var accu$1=[0,h1,accu$0],l1$0=t1,accu$0=accu$1;continue}
              var accu$2=[0,h2,accu$0],l2$0=t2,accu$0=accu$2;
              continue}
            return rev_append(l1$0,accu$0)}
          return rev_append(l2$0,accu$0)}}
      function sort(n,l)
       {if(2 === n)
         {if(l)
           {var _n_=l[2];
            if(_n_)
             {var x2=_n_[1],x1=l[1];
              return 0 < caml_call2(cmp,x1,x2)?[0,x2,[0,x1,0]]:[0,x1,[0,x2,0]]}}}
        else
         if(3 === n)
          if(l)
           {var _o_=l[2];
            if(_o_)
             {var _p_=_o_[2];
              if(_p_)
               {var x3=_p_[1],x2$0=_o_[1],x1$0=l[1];
                return 0 < caml_call2(cmp,x1$0,x2$0)
                        ?0 < caml_call2(cmp,x1$0,x3)
                          ?0 < caml_call2(cmp,x2$0,x3)
                            ?[0,x3,[0,x2$0,[0,x1$0,0]]]
                            :[0,x2$0,[0,x3,[0,x1$0,0]]]
                          :[0,x2$0,[0,x1$0,[0,x3,0]]]
                        :0 < caml_call2(cmp,x2$0,x3)
                          ?0 < caml_call2(cmp,x1$0,x3)
                            ?[0,x3,[0,x1$0,[0,x2$0,0]]]
                            :[0,x1$0,[0,x3,[0,x2$0,0]]]
                          :[0,x1$0,[0,x2$0,[0,x3,0]]]}}}
        var
         n1=n >> 1,
         n2=n - n1 | 0,
         l2=chop(n1,l),
         s1=rev_sort(n1,l),
         s2=rev_sort(n2,l2);
        return rev_merge_rev(s1,s2,0)}
      function rev_sort(n,l)
       {if(2 === n)
         {if(l)
           {var _k_=l[2];
            if(_k_)
             {var x2=_k_[1],x1=l[1];
              return 0 < caml_call2(cmp,x1,x2)?[0,x1,[0,x2,0]]:[0,x2,[0,x1,0]]}}}
        else
         if(3 === n)
          if(l)
           {var _l_=l[2];
            if(_l_)
             {var _m_=_l_[2];
              if(_m_)
               {var x3=_m_[1],x2$0=_l_[1],x1$0=l[1];
                return 0 < caml_call2(cmp,x1$0,x2$0)
                        ?0 < caml_call2(cmp,x2$0,x3)
                          ?[0,x1$0,[0,x2$0,[0,x3,0]]]
                          :0 < caml_call2(cmp,x1$0,x3)
                            ?[0,x1$0,[0,x3,[0,x2$0,0]]]
                            :[0,x3,[0,x1$0,[0,x2$0,0]]]
                        :0 < caml_call2(cmp,x1$0,x3)
                          ?[0,x2$0,[0,x1$0,[0,x3,0]]]
                          :0 < caml_call2(cmp,x2$0,x3)
                            ?[0,x2$0,[0,x3,[0,x1$0,0]]]
                            :[0,x3,[0,x2$0,[0,x1$0,0]]]}}}
        var
         n1=n >> 1,
         n2=n - n1 | 0,
         l2=chop(n1,l),
         s1=sort(n1,l),
         s2=sort(n2,l2);
        return rev_merge(s1,s2,0)}
      var len=length(l);
      return 2 <= len?sort(len,l):l}
    function sort_uniq(cmp,l)
     {function rev_merge(l1,l2,accu)
       {var l1$0=l1,l2$0=l2,accu$0=accu;
        for(;;)
         {if(l1$0)
           {if(l2$0)
             {var
               t2=l2$0[2],
               h2=l2$0[1],
               t1=l1$0[2],
               h1=l1$0[1],
               c=caml_call2(cmp,h1,h2);
              if(0 === c)
               {var accu$1=[0,h1,accu$0],l1$0=t1,l2$0=t2,accu$0=accu$1;
                continue}
              if(0 <= c)
               {var accu$2=[0,h2,accu$0],l2$0=t2,accu$0=accu$2;continue}
              var accu$3=[0,h1,accu$0],l1$0=t1,accu$0=accu$3;
              continue}
            return rev_append(l1$0,accu$0)}
          return rev_append(l2$0,accu$0)}}
      function rev_merge_rev(l1,l2,accu)
       {var l1$0=l1,l2$0=l2,accu$0=accu;
        for(;;)
         {if(l1$0)
           {if(l2$0)
             {var
               t2=l2$0[2],
               h2=l2$0[1],
               t1=l1$0[2],
               h1=l1$0[1],
               c=caml_call2(cmp,h1,h2);
              if(0 === c)
               {var accu$1=[0,h1,accu$0],l1$0=t1,l2$0=t2,accu$0=accu$1;
                continue}
              if(0 < c)
               {var accu$2=[0,h1,accu$0],l1$0=t1,accu$0=accu$2;continue}
              var accu$3=[0,h2,accu$0],l2$0=t2,accu$0=accu$3;
              continue}
            return rev_append(l1$0,accu$0)}
          return rev_append(l2$0,accu$0)}}
      function sort(n,l)
       {if(2 === n)
         {if(l)
           {var _h_=l[2];
            if(_h_)
             {var x2=_h_[1],x1=l[1],c=caml_call2(cmp,x1,x2);
              return 0 === c?[0,x1,0]:0 <= c?[0,x2,[0,x1,0]]:[0,x1,[0,x2,0]]}}}
        else
         if(3 === n)
          if(l)
           {var _i_=l[2];
            if(_i_)
             {var _j_=_i_[2];
              if(_j_)
               {var
                 x3=_j_[1],
                 x2$0=_i_[1],
                 x1$0=l[1],
                 c$0=caml_call2(cmp,x1$0,x2$0);
                if(0 === c$0)
                 {var c$1=caml_call2(cmp,x2$0,x3);
                  return 0 === c$1
                          ?[0,x2$0,0]
                          :0 <= c$1?[0,x3,[0,x2$0,0]]:[0,x2$0,[0,x3,0]]}
                if(0 <= c$0)
                 {var c$2=caml_call2(cmp,x1$0,x3);
                  if(0 === c$2)return [0,x2$0,[0,x1$0,0]];
                  if(0 <= c$2)
                   {var c$3=caml_call2(cmp,x2$0,x3);
                    return 0 === c$3
                            ?[0,x2$0,[0,x1$0,0]]
                            :0 <= c$3
                              ?[0,x3,[0,x2$0,[0,x1$0,0]]]
                              :[0,x2$0,[0,x3,[0,x1$0,0]]]}
                  return [0,x2$0,[0,x1$0,[0,x3,0]]]}
                var c$4=caml_call2(cmp,x2$0,x3);
                if(0 === c$4)return [0,x1$0,[0,x2$0,0]];
                if(0 <= c$4)
                 {var c$5=caml_call2(cmp,x1$0,x3);
                  return 0 === c$5
                          ?[0,x1$0,[0,x2$0,0]]
                          :0 <= c$5
                            ?[0,x3,[0,x1$0,[0,x2$0,0]]]
                            :[0,x1$0,[0,x3,[0,x2$0,0]]]}
                return [0,x1$0,[0,x2$0,[0,x3,0]]]}}}
        var
         n1=n >> 1,
         n2=n - n1 | 0,
         l2=chop(n1,l),
         s1=rev_sort(n1,l),
         s2=rev_sort(n2,l2);
        return rev_merge_rev(s1,s2,0)}
      function rev_sort(n,l)
       {if(2 === n)
         {if(l)
           {var _e_=l[2];
            if(_e_)
             {var x2=_e_[1],x1=l[1],c=caml_call2(cmp,x1,x2);
              return 0 === c?[0,x1,0]:0 < c?[0,x1,[0,x2,0]]:[0,x2,[0,x1,0]]}}}
        else
         if(3 === n)
          if(l)
           {var _f_=l[2];
            if(_f_)
             {var _g_=_f_[2];
              if(_g_)
               {var
                 x3=_g_[1],
                 x2$0=_f_[1],
                 x1$0=l[1],
                 c$0=caml_call2(cmp,x1$0,x2$0);
                if(0 === c$0)
                 {var c$1=caml_call2(cmp,x2$0,x3);
                  return 0 === c$1
                          ?[0,x2$0,0]
                          :0 < c$1?[0,x2$0,[0,x3,0]]:[0,x3,[0,x2$0,0]]}
                if(0 < c$0)
                 {var c$2=caml_call2(cmp,x2$0,x3);
                  if(0 === c$2)return [0,x1$0,[0,x2$0,0]];
                  if(0 < c$2)return [0,x1$0,[0,x2$0,[0,x3,0]]];
                  var c$3=caml_call2(cmp,x1$0,x3);
                  return 0 === c$3
                          ?[0,x1$0,[0,x2$0,0]]
                          :0 < c$3
                            ?[0,x1$0,[0,x3,[0,x2$0,0]]]
                            :[0,x3,[0,x1$0,[0,x2$0,0]]]}
                var c$4=caml_call2(cmp,x1$0,x3);
                if(0 === c$4)return [0,x2$0,[0,x1$0,0]];
                if(0 < c$4)return [0,x2$0,[0,x1$0,[0,x3,0]]];
                var c$5=caml_call2(cmp,x2$0,x3);
                return 0 === c$5
                        ?[0,x2$0,[0,x1$0,0]]
                        :0 < c$5
                          ?[0,x2$0,[0,x3,[0,x1$0,0]]]
                          :[0,x3,[0,x2$0,[0,x1$0,0]]]}}}
        var
         n1=n >> 1,
         n2=n - n1 | 0,
         l2=chop(n1,l),
         s1=sort(n1,l),
         s2=sort(n2,l2);
        return rev_merge(s1,s2,0)}
      var len=length(l);
      return 2 <= len?sort(len,l):l}
    function compare_lengths(l1,l2)
     {var l1$0=l1,l2$0=l2;
      for(;;)
       {if(l1$0)
         {if(l2$0){var l2$1=l2$0[2],l1$1=l1$0[2],l1$0=l1$1,l2$0=l2$1;continue}
          return 1}
        return l2$0?-1:0}}
    function compare_length_with(l,n)
     {var l$0=l,n$0=n;
      for(;;)
       {if(l$0)
         {var l$1=l$0[2];
          if(0 < n$0){var n$1=n$0 - 1 | 0,l$0=l$1,n$0=n$1;continue}
          return 1}
        return 0 === n$0?0:0 < n$0?-1:1}}
    var
     List=
      [0,
       length,
       compare_lengths,
       compare_length_with,
       cons,
       hd,
       tl,
       nth,
       nth_opt,
       rev,
       init,
       append,
       rev_append,
       flatten,
       flatten,
       iter,
       iteri,
       map,
       mapi,
       rev_map,
       fold_left,
       fold_right,
       iter2,
       map2,
       rev_map2,
       fold_left2,
       fold_right2,
       for_all,
       exists,
       for_all2,
       exists2,
       mem,
       memq,
       find,
       find_opt,
       find_all,
       find_all,
       partition,
       assoc,
       assoc_opt,
       assq,
       assq_opt,
       mem_assoc,
       mem_assq,
       remove_assoc,
       remove_assq,
       split,
       combine,
       stable_sort,
       stable_sort,
       stable_sort,
       sort_uniq,
       merge];
    runtime.caml_register_global(19,List,"List");
    return}
  (function(){return this}()));
