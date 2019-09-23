(function(joo_global_object)
   {"use strict";
    var runtime=joo_global_object.jsoo_runtime;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    var
     cst_Queue_Empty=runtime.caml_new_string("Queue.Empty"),
     Empty=[248,cst_Queue_Empty,runtime.caml_fresh_oo_id(0)];
    function create(param){return [0,0,0,0]}
    function clear(q){q[1] = 0;q[2] = 0;q[3] = 0;return 0}
    function add(x,q)
     {var cell=[0,x,0],_g_=q[3];
      return _g_
              ?(q[1] = q[1] + 1 | 0,_g_[2] = cell,q[3] = cell,0)
              :(q[1] = 1,q[2] = cell,q[3] = cell,0)}
    function peek(q)
     {var _f_=q[2];if(_f_){var content=_f_[1];return content}throw Empty}
    function take(q)
     {var _c_=q[2];
      if(_c_)
       {var _d_=_c_[1],_e_=_c_[2];
        return _e_?(q[1] = q[1] - 1 | 0,q[2] = _e_,_d_):(clear(q),_d_)}
      throw Empty}
    function copy(q_res,prev,cell)
     {var prev$0=prev,cell$0=cell;
      for(;;)
       {if(cell$0)
         {var content=cell$0[1],next=cell$0[2],res=[0,content,0];
          if(prev$0)prev$0[2] = res;else q_res[2] = res;
          var prev$0=res,cell$0=next;
          continue}
        q_res[3] = prev$0;
        return q_res}}
    function copy$0(q){return copy([0,q[1],0,0],0,q[2])}
    function is_empty(q){return 0 === q[1]?1:0}
    function length(q){return q[1]}
    function iter(f,cell)
     {var cell$0=cell;
      for(;;)
       {if(cell$0)
         {var content=cell$0[1],cell$1=cell$0[2];
          caml_call1(f,content);
          var cell$0=cell$1;
          continue}
        return 0}}
    function iter$0(f,q){return iter(f,q[2])}
    function fold(f,accu,cell)
     {var accu$0=accu,cell$0=cell;
      for(;;)
       {if(cell$0)
         {var
           content=cell$0[1],
           cell$1=cell$0[2],
           accu$1=caml_call2(f,accu$0,content),
           accu$0=accu$1,
           cell$0=cell$1;
          continue}
        return accu$0}}
    function fold$0(f,accu,q){return fold(f,accu,q[2])}
    function transfer(q1,q2)
     {var _a_=0 < q1[1]?1:0;
      if(_a_)
       {var _b_=q2[3];
        return _b_
                ?(q2[1]
                  =
                  q2[1]
                  +
                  q1[1]
                  |
                  0,
                  _b_[2]
                  =
                  q1[2],
                  q2[3]
                  =
                  q1[3],
                  clear(q1))
                :(q2[1] = q1[1],q2[2] = q1[2],q2[3] = q1[3],clear(q1))}
      return _a_}
    var
     Queue=
      [0,
       Empty,
       create,
       add,
       add,
       take,
       take,
       peek,
       peek,
       clear,
       copy$0,
       is_empty,
       length,
       iter$0,
       fold$0,
       transfer];
    runtime.caml_register_global(1,Queue,"Queue");
    return}
  (function(){return this}()));
