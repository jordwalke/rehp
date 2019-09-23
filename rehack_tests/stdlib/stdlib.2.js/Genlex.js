(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_float_of_string=runtime.caml_float_of_string,
     caml_new_string=runtime.caml_new_string,
     caml_trampoline=runtime.caml_trampoline,
     caml_trampoline_return=runtime.caml_trampoline_return,
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
     cst=caml_new_string(""),
     cst$0=caml_new_string(""),
     cst$1=caml_new_string(""),
     cst$2=caml_new_string(""),
     cst$4=caml_new_string(""),
     cst$3=caml_new_string(""),
     cst_Illegal_character=caml_new_string("Illegal character "),
     Stream=global_data.Stream,
     Char=global_data.Char,
     String=global_data.String,
     Hashtbl=global_data.Hashtbl,
     Not_found=global_data.Not_found,
     Pervasives=global_data.Pervasives,
     List=global_data.List,
     Bytes=global_data.Bytes,
     initial_buffer=caml_create_bytes(32),
     buffer=[0,initial_buffer],
     bufpos=[0,0];
    function reset_buffer(param)
     {buffer[1] = initial_buffer;bufpos[1] = 0;return 0}
    function store(c)
     {if(runtime.caml_ml_bytes_length(buffer[1]) <= bufpos[1])
       {var newbuffer=caml_create_bytes(2 * bufpos[1] | 0);
        caml_call5(Bytes[11],buffer[1],0,newbuffer,0,bufpos[1]);
        buffer[1] = newbuffer}
      runtime.caml_bytes_set(buffer[1],bufpos[1],c);
      bufpos[1]++;
      return 0}
    function get_string(param)
     {var s=caml_call3(Bytes[8],buffer[1],0,bufpos[1]);
      buffer[1] = initial_buffer;
      return s}
    function make_lexer(keywords)
     {var kwd_table=caml_call2(Hashtbl[1],0,17);
      function _a_(s){return caml_call3(Hashtbl[5],kwd_table,s,[0,s])}
      caml_call2(List[15],_a_,keywords);
      function ident_or_keyword(id)
       {try
         {var _D_=caml_call2(Hashtbl[6],kwd_table,id);return _D_}
        catch(_E_)
         {_E_ = caml_wrap_exception(_E_);
          if(_E_ === Not_found)return [1,id];
          throw _E_}}
      function keyword_or_error(c)
       {var s=caml_call2(String[1],1,c);
        try
         {var _B_=caml_call2(Hashtbl[6],kwd_table,s);return _B_}
        catch(_C_)
         {_C_ = caml_wrap_exception(_C_);
          if(_C_ === Not_found)
           {var _A_=caml_call2(Pervasives[16],cst_Illegal_character,s);
            throw [0,Stream[2],_A_]}
          throw _C_}}
      function end_exponent_part(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _z_=match[1],switcher=_z_ - 48 | 0;
            if(! (9 < switcher >>> 0))
             {caml_call1(Stream[12],strm);store(_z_);continue}}
          return [0,[3,caml_float_of_string(get_string(0))]]}}
      function exponent_part(strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         {var _y_=match[1],switch$0=43 === _y_?0:45 === _y_?0:1;
          if(! switch$0)
           {caml_call1(Stream[12],strm);
            store(_y_);
            return end_exponent_part(strm)}}
        return end_exponent_part(strm)}
      function decimal_part(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _w_=match[1],_x_=_w_ - 69 | 0;
            if(32 < _x_ >>> 0)
             {var switcher=_x_ + 21 | 0;
              if(! (9 < switcher >>> 0))
               {caml_call1(Stream[12],strm);store(_w_);continue}}
            else
             {var switcher$0=_x_ - 1 | 0;
              if(30 < switcher$0 >>> 0)
               {caml_call1(Stream[12],strm);
                store(69);
                return exponent_part(strm)}}}
          return [0,[3,caml_float_of_string(get_string(0))]]}}
      function number(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _v_=match[1];
            if(58 <= _v_)
             {var switch$0=69 === _v_?0:101 === _v_?0:1;
              if(! switch$0)
               {caml_call1(Stream[12],strm);
                store(69);
                return exponent_part(strm)}}
            else
             {if(46 === _v_)
               {caml_call1(Stream[12],strm);
                store(46);
                return decimal_part(strm)}
              if(48 <= _v_){caml_call1(Stream[12],strm);store(_v_);continue}}}
          return [0,[2,runtime.caml_int_of_string(get_string(0))]]}}
      function ident2(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _t_=match[1];
            if(94 <= _t_)
             var
              _u_=_t_ - 95 | 0,
              switch$0=30 < _u_ >>> 0?32 <= _u_?1:0:29 === _u_?0:1;
            else
             if(65 <= _t_)
              var switch$0=92 === _t_?0:1;
             else
              if(33 <= _t_)
               switch(_t_ - 33 | 0)
                {case 0:
                 case 2:
                 case 3:
                 case 4:
                 case 5:
                 case 9:
                 case 10:
                 case 12:
                 case 14:
                 case 25:
                 case 27:
                 case 28:
                 case 29:
                 case 30:
                 case 31:var switch$0=0;break;
                 default:var switch$0=1}
              else
               var switch$0=1;
            if(! switch$0){caml_call1(Stream[12],strm);store(_t_);continue}}
          return [0,ident_or_keyword(get_string(0))]}}
      function neg_number(strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         {var _s_=match[1],switcher=_s_ - 48 | 0;
          if(! (9 < switcher >>> 0))
           {caml_call1(Stream[12],strm);
            reset_buffer(0);
            store(45);
            store(_s_);
            return number(strm)}}
        reset_buffer(0);
        store(45);
        return ident2(strm)}
      function ident(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _q_=match[1];
            if(91 <= _q_)
             var
              _r_=_q_ - 95 | 0,
              switch$0=27 < _r_ >>> 0?97 <= _r_?0:1:1 === _r_?1:0;
            else
             var
              switch$0=
               48 <= _q_?6 < (_q_ - 58 | 0) >>> 0?0:1:39 === _q_?0:1;
            if(! switch$0){caml_call1(Stream[12],strm);store(_q_);continue}}
          return [0,ident_or_keyword(get_string(0))]}}
      function next_token$0(counter,strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _m_=match[1];
            if(124 <= _m_)
             var switch$0=127 <= _m_?192 <= _m_?1:0:125 === _m_?0:2;
            else
             {var _n_=_m_ - 65 | 0;
              if(57 < _n_ >>> 0)
               if(58 <= _n_)
                var switch$0=0;
               else
                {var switcher=_n_ + 65 | 0;
                 switch(switcher)
                  {case 34:
                    caml_call1(Stream[12],strm);
                    reset_buffer(0);
                    return [0,[4,string(strm)]];
                   case 39:
                    caml_call1(Stream[12],strm);
                    try
                     {var c=char$0(strm)}
                    catch(_p_)
                     {_p_ = caml_wrap_exception(_p_);
                      if(_p_ === Stream[1])throw [0,Stream[2],cst];
                      throw _p_}
                    var match$0=caml_call1(Stream[11],strm);
                    if(match$0)
                     if(39 === match$0[1])
                      {caml_call1(Stream[12],strm);return [0,[5,c]]}
                    throw [0,Stream[2],cst$0];
                   case 40:
                    caml_call1(Stream[12],strm);
                    if(counter < 50)
                     {var counter$0=counter + 1 | 0;
                      return maybe_comment(counter$0,strm)}
                    return caml_trampoline_return(maybe_comment,[0,strm]);
                   case 45:caml_call1(Stream[12],strm);return neg_number(strm);
                   case 9:
                   case 10:
                   case 12:
                   case 13:
                   case 26:
                   case 32:caml_call1(Stream[12],strm);continue;
                   case 48:
                   case 49:
                   case 50:
                   case 51:
                   case 52:
                   case 53:
                   case 54:
                   case 55:
                   case 56:
                   case 57:
                    caml_call1(Stream[12],strm);
                    reset_buffer(0);
                    store(_m_);
                    return number(strm);
                   case 33:
                   case 35:
                   case 36:
                   case 37:
                   case 38:
                   case 42:
                   case 43:
                   case 47:
                   case 58:
                   case 60:
                   case 61:
                   case 62:
                   case 63:
                   case 64:var switch$0=2;break;
                   default:var switch$0=0}}
              else
               {var _o_=_n_ - 26 | 0;
                if(5 < _o_ >>> 0)
                 var switch$0=1;
                else
                 switch(_o_)
                  {case 4:var switch$0=1;break;
                   case 1:
                   case 3:var switch$0=2;break;
                   default:var switch$0=0}}}
            switch(switch$0)
             {case 0:
               caml_call1(Stream[12],strm);return [0,keyword_or_error(_m_)];
              case 1:
               caml_call1(Stream[12],strm);
               reset_buffer(0);
               store(_m_);
               return ident(strm);
              default:
               caml_call1(Stream[12],strm);
               reset_buffer(0);
               store(_m_);
               return ident2(strm)}}
          return 0}}
      function maybe_comment(counter,strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         if(42 === match[1])
          {caml_call1(Stream[12],strm);
           comment(strm);
           if(counter < 50)
            {var counter$0=counter + 1 | 0;
             return next_token$0(counter$0,strm)}
           return caml_trampoline_return(next_token$0,[0,strm])}
        return [0,keyword_or_error(40)]}
      function next_token(strm){return caml_trampoline(next_token$0(0,strm))}
      function string(strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _j_=match[1];
            if(34 === _j_){caml_call1(Stream[12],strm);return get_string(0)}
            if(92 === _j_)
             {caml_call1(Stream[12],strm);
              try
               {var c=escape(strm)}
              catch(_l_)
               {_l_ = caml_wrap_exception(_l_);
                if(_l_ === Stream[1])throw [0,Stream[2],cst$1];
                throw _l_;
                var _k_=_l_}
              store(c);
              continue}
            caml_call1(Stream[12],strm);
            store(_j_);
            continue}
          throw Stream[1]}}
      function char$0(strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         {var _g_=match[1];
          if(92 === _g_)
           {caml_call1(Stream[12],strm);
            try
             {var _h_=escape(strm);return _h_}
            catch(_i_)
             {_i_ = caml_wrap_exception(_i_);
              if(_i_ === Stream[1])throw [0,Stream[2],cst$2];
              throw _i_}}
          caml_call1(Stream[12],strm);
          return _g_}
        throw Stream[1]}
      function escape(strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         {var _d_=match[1];
          if(58 <= _d_)
           {var switcher=_d_ - 110 | 0;
            if(! (6 < switcher >>> 0))
             switch(switcher)
              {case 0:caml_call1(Stream[12],strm);return 10;
               case 4:caml_call1(Stream[12],strm);return 13;
               case 6:caml_call1(Stream[12],strm);return 9
               }}
          else
           if(48 <= _d_)
            {caml_call1(Stream[12],strm);
             var match$0=caml_call1(Stream[11],strm);
             if(match$0)
              {var _e_=match$0[1],switcher$0=_e_ - 48 | 0;
               if(! (9 < switcher$0 >>> 0))
                {caml_call1(Stream[12],strm);
                 var match$1=caml_call1(Stream[11],strm);
                 if(match$1)
                  {var _f_=match$1[1],switcher$1=_f_ - 48 | 0;
                   if(! (9 < switcher$1 >>> 0))
                    {caml_call1(Stream[12],strm);
                     return caml_call1
                             (Char[1],
                              (((_d_ - 48 | 0) * 100 | 0) + ((_e_ - 48 | 0) * 10 | 0) | 0)
                              +
                              (_f_ - 48 | 0)
                              |
                              0)}}
                 throw [0,Stream[2],cst$4]}}
             throw [0,Stream[2],cst$3]}
          caml_call1(Stream[12],strm);
          return _d_}
        throw Stream[1]}
      function comment$0(counter,strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var switcher=match[1] - 40 | 0;
            if(! (2 < switcher >>> 0))
             switch(switcher)
              {case 0:
                caml_call1(Stream[12],strm);
                if(counter < 50)
                 {var counter$1=counter + 1 | 0;
                  return maybe_nested_comment(counter$1,strm)}
                return caml_trampoline_return(maybe_nested_comment,[0,strm]);
               case 1:break;
               default:
                caml_call1(Stream[12],strm);
                if(counter < 50)
                 {var counter$0=counter + 1 | 0;
                  return maybe_end_comment(counter$0,strm)}
                return caml_trampoline_return(maybe_end_comment,[0,strm])}
            caml_call1(Stream[12],strm);
            continue}
          throw Stream[1]}}
      function maybe_nested_comment(counter,strm)
       {var match=caml_call1(Stream[11],strm);
        if(match)
         {if(42 === match[1])
           {caml_call1(Stream[12],strm);
            comment(strm);
            if(counter < 50)
             {var counter$1=counter + 1 | 0;return comment$0(counter$1,strm)}
            return caml_trampoline_return(comment$0,[0,strm])}
          caml_call1(Stream[12],strm);
          if(counter < 50)
           {var counter$0=counter + 1 | 0;return comment$0(counter$0,strm)}
          return caml_trampoline_return(comment$0,[0,strm])}
        throw Stream[1]}
      function maybe_end_comment(counter,strm)
       {for(;;)
         {var match=caml_call1(Stream[11],strm);
          if(match)
           {var _c_=match[1];
            if(41 === _c_){caml_call1(Stream[12],strm);return 0}
            if(42 === _c_){caml_call1(Stream[12],strm);continue}
            caml_call1(Stream[12],strm);
            if(counter < 50)
             {var counter$0=counter + 1 | 0;return comment$0(counter$0,strm)}
            return caml_trampoline_return(comment$0,[0,strm])}
          throw Stream[1]}}
      function comment(strm){return caml_trampoline(comment$0(0,strm))}
      return function(input)
       {function _b_(count){return next_token(input)}
        return caml_call1(Stream[3],_b_)}}
    var Genlex=[0,make_lexer];
    runtime.caml_register_global(15,Genlex,"Genlex");
    return}
  (function(){return this}()));
