(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string;
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Sort_array=caml_new_string("Sort.array"),
     Invalid_argument=global_data.Invalid_argument;
    function merge(order,l1,l2)
     {if(l1)
       {var t1=l1[2],h1=l1[1];
        if(l2)
         {var t2=l2[2],h2=l2[1];
          return caml_call2(order,h1,h2)
                  ?[0,h1,merge(order,t1,l2)]
                  :[0,h2,merge(order,l1,t2)]}
        return l1}
      return l2}
    function list(order,l)
     {function initlist(param)
       {if(param)
         {var _i_=param[2],_j_=param[1];
          if(_i_)
           {var
             rest=_i_[2],
             e2=_i_[1],
             _k_=initlist(rest),
             _l_=caml_call2(order,_j_,e2)?[0,_j_,[0,e2,0]]:[0,e2,[0,_j_,0]];
            return [0,_l_,_k_]}
          return [0,[0,_j_,0],0]}
        return 0}
      function merge2(x)
       {if(x)
         {var _g_=x[2];
          if(_g_)
           {var rest=_g_[2],l2=_g_[1],l1=x[1],_h_=merge2(rest);
            return [0,merge(order,l1,l2),_h_]}}
        return x}
      function mergeall(llist)
       {var llist$0=llist;
        for(;;)
         {if(llist$0)
           {if(llist$0[2])
             {var llist$1=merge2(llist$0),llist$0=llist$1;continue}
            var l=llist$0[1];
            return l}
          return 0}}
      return mergeall(initlist(l))}
    function swap(arr,i,j)
     {var tmp=arr[1 + i];arr[1 + i] = arr[1 + j];arr[1 + j] = tmp;return 0}
    function array(cmp,arr)
     {function qsort(lo,hi)
       {var lo$0=lo,hi$0=hi;
        a:
        for(;;)
         {var _d_=6 <= (hi$0 - lo$0 | 0)?1:0;
          if(_d_)
           {var mid=(lo$0 + hi$0 | 0) >>> 1 | 0;
            if(caml_call2(cmp,arr[1 + mid],arr[1 + lo$0]))swap(arr,mid,lo$0);
            if(caml_call2(cmp,arr[1 + hi$0],arr[1 + mid]))
             {swap(arr,mid,hi$0);
              if(caml_call2(cmp,arr[1 + mid],arr[1 + lo$0]))swap(arr,mid,lo$0)}
            var
             pivot=arr[1 + mid],
             i=[0,lo$0 + 1 | 0],
             j=[0,hi$0 - 1 | 0],
             _e_=1 - caml_call2(cmp,pivot,arr[1 + hi$0]),
             _f_=_e_ || 1 - caml_call2(cmp,arr[1 + lo$0],pivot);
            if(_f_)throw [0,Invalid_argument,cst_Sort_array];
            b:
            for(;;)
             {if(i[1] < j[1])
               for(;;)
                {if(caml_call2(cmp,pivot,arr[1 + i[1]]))
                  for(;;)
                   {if(caml_call2(cmp,arr[1 + j[1]],pivot))
                     {if(i[1] < j[1])swap(arr,i[1],j[1]);
                      i[1]++;
                      j[1] += -1;
                      continue b}
                    j[1] += -1;
                    continue}
                 i[1]++;
                 continue}
              if((j[1] - lo$0 | 0) <= (hi$0 - i[1] | 0))
               {qsort(lo$0,j[1]);var lo$1=i[1],lo$0=lo$1;continue a}
              qsort(i[1],hi$0);
              var hi$1=j[1],hi$0=hi$1;
              continue a}}
          return _d_}}
      qsort(0,arr.length - 1 - 1 | 0);
      var _b_=arr.length - 1 - 1 | 0,_a_=1;
      if(! (_b_ < 1))
       {var i=_a_;
        for(;;)
         {var val_i=arr[1 + i];
          if(1 - caml_call2(cmp,arr[1 + (i - 1 | 0)],val_i))
           {arr[1 + i] = arr[1 + (i - 1 | 0)];
            var j=[0,i - 1 | 0];
            for(;;)
             {if(1 <= j[1])
               if(! caml_call2(cmp,arr[1 + (j[1] - 1 | 0)],val_i))
                {arr[1 + j[1]] = arr[1 + (j[1] - 1 | 0)];j[1] += -1;continue}
              arr[1 + j[1]] = val_i;
              break}}
          var _c_=i + 1 | 0;
          if(_b_ !== i){var i=_c_;continue}
          break}}
      return 0}
    var Sort=[0,list,array,merge];
    runtime.caml_register_global(2,Sort,"Sort");
    return}
  (function(){return this}()));
