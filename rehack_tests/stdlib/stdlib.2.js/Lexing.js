(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_bytes_get=runtime.caml_bytes_get,
     caml_check_bound=runtime.caml_check_bound,
     caml_create_bytes=runtime.caml_create_bytes,
     caml_ml_bytes_length=runtime.caml_ml_bytes_length,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call4(f,a0,a1,a2,a3)
     {return f.length == 4
              ?f(a0,a1,a2,a3)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_Lexing_lex_refill_cannot_grow_buffer=
      caml_new_string("Lexing.lex_refill: cannot grow buffer"),
     dummy_pos=[0,caml_new_string(""),0,0,-1],
     zero_pos=[0,caml_new_string(""),1,0,0],
     Bytes=global_data.Bytes,
     Pervasives=global_data.Pervasives,
     Sys=global_data.Sys;
    function engine(tbl,state,buf)
     {var result=runtime.caml_lex_engine(tbl,state,buf);
      if(0 <= result)
       {buf[11] = buf[12];
        var _z_=buf[12];
        buf[12] = [0,_z_[1],_z_[2],_z_[3],buf[4] + buf[6] | 0]}
      return result}
    function new_engine(tbl,state,buf)
     {var result=runtime.caml_new_lex_engine(tbl,state,buf);
      if(0 <= result)
       {buf[11] = buf[12];
        var _y_=buf[12];
        buf[12] = [0,_y_[1],_y_[2],_y_[3],buf[4] + buf[6] | 0]}
      return result}
    function lex_refill(read_fun,aux_buffer,lexbuf)
     {var
       read=caml_call2(read_fun,aux_buffer,caml_ml_bytes_length(aux_buffer)),
       n=0 < read?read:(lexbuf[9] = 1,0);
      if(caml_ml_bytes_length(lexbuf[2]) < (lexbuf[3] + n | 0))
       {if
         (((lexbuf[3] - lexbuf[5] | 0) + n | 0)
          <=
          caml_ml_bytes_length(lexbuf[2]))
         caml_call5
          (Bytes[11],
           lexbuf[2],
           lexbuf[5],
           lexbuf[2],
           0,
           lexbuf[3] - lexbuf[5] | 0);
        else
         {var
           newlen=
            caml_call2
             (Pervasives[4],2 * caml_ml_bytes_length(lexbuf[2]) | 0,Sys[13]);
          if(newlen < ((lexbuf[3] - lexbuf[5] | 0) + n | 0))
           caml_call1(Pervasives[2],cst_Lexing_lex_refill_cannot_grow_buffer);
          var newbuf=caml_create_bytes(newlen);
          caml_call5
           (Bytes[11],lexbuf[2],lexbuf[5],newbuf,0,lexbuf[3] - lexbuf[5] | 0);
          lexbuf[2] = newbuf}
        var s=lexbuf[5];
        lexbuf[4] = lexbuf[4] + s | 0;
        lexbuf[6] = lexbuf[6] - s | 0;
        lexbuf[5] = 0;
        lexbuf[7] = lexbuf[7] - s | 0;
        lexbuf[3] = lexbuf[3] - s | 0;
        var t=lexbuf[10],_w_=t.length - 1 - 1 | 0,_v_=0;
        if(! (_w_ < 0))
         {var i=_v_;
          for(;;)
           {var v=caml_check_bound(t,i)[1 + i];
            if(0 <= v)caml_check_bound(t,i)[1 + i] = v - s | 0;
            var _x_=i + 1 | 0;
            if(_w_ !== i){var i=_x_;continue}
            break}}}
      caml_call5(Bytes[11],aux_buffer,0,lexbuf[2],lexbuf[3],n);
      lexbuf[3] = lexbuf[3] + n | 0;
      return 0}
    function from_function(f)
     {var
       _k_=[0],
       _l_=0,
       _m_=0,
       _n_=0,
       _o_=0,
       _p_=0,
       _q_=0,
       _r_=0,
       _s_=caml_create_bytes(1024),
       _t_=caml_create_bytes(512);
      return [0,
              function(_u_){return lex_refill(f,_t_,_u_)},
              _s_,
              _r_,
              _q_,
              _p_,
              _o_,
              _n_,
              _m_,
              _l_,
              _k_,
              zero_pos,
              zero_pos]}
    function from_channel(ic)
     {return from_function
              (function(buf,n){return caml_call4(Pervasives[72],ic,buf,0,n)})}
    function from_string(s)
     {var
       _b_=[0],
       _c_=1,
       _d_=0,
       _e_=0,
       _f_=0,
       _g_=0,
       _h_=0,
       _i_=runtime.caml_ml_string_length(s),
       _j_=caml_call1(Bytes[5],s);
      return [0,
              function(lexbuf){lexbuf[9] = 1;return 0},
              _j_,
              _i_,
              _h_,
              _g_,
              _f_,
              _e_,
              _d_,
              _c_,
              _b_,
              zero_pos,
              zero_pos]}
    function lexeme(lexbuf)
     {var len=lexbuf[6] - lexbuf[5] | 0;
      return caml_call3(Bytes[8],lexbuf[2],lexbuf[5],len)}
    function sub_lexeme(lexbuf,i1,i2)
     {var len=i2 - i1 | 0;return caml_call3(Bytes[8],lexbuf[2],i1,len)}
    function sub_lexeme_opt(lexbuf,i1,i2)
     {if(0 <= i1)
       {var len=i2 - i1 | 0;return [0,caml_call3(Bytes[8],lexbuf[2],i1,len)]}
      return 0}
    function sub_lexeme_char(lexbuf,i){return caml_bytes_get(lexbuf[2],i)}
    function sub_lexeme_char_opt(lexbuf,i)
     {return 0 <= i?[0,caml_bytes_get(lexbuf[2],i)]:0}
    function lexeme_char(lexbuf,i)
     {return caml_bytes_get(lexbuf[2],lexbuf[5] + i | 0)}
    function lexeme_start(lexbuf){return lexbuf[11][4]}
    function lexeme_end(lexbuf){return lexbuf[12][4]}
    function lexeme_start_p(lexbuf){return lexbuf[11]}
    function lexeme_end_p(lexbuf){return lexbuf[12]}
    function new_line(lexbuf)
     {var lcp=lexbuf[12];
      lexbuf[12] = [0,lcp[1],lcp[2] + 1 | 0,lcp[4],lcp[4]];
      return 0}
    function flush_input(lb)
     {lb[6] = 0;
      lb[4] = 0;
      var _a_=lb[12];
      lb[12] = [0,_a_[1],_a_[2],_a_[3],0];
      lb[3] = 0;
      return 0}
    var
     Lexing=
      [0,
       dummy_pos,
       from_channel,
       from_string,
       from_function,
       lexeme,
       lexeme_char,
       lexeme_start,
       lexeme_end,
       lexeme_start_p,
       lexeme_end_p,
       new_line,
       flush_input,
       sub_lexeme,
       sub_lexeme_opt,
       sub_lexeme_char,
       sub_lexeme_char_opt,
       engine,
       new_engine];
    runtime.caml_register_global(6,Lexing,"Lexing");
    return}
  (function(){return this}()));
