(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_check_bound=runtime.caml_check_bound,
     caml_fresh_oo_id=runtime.caml_fresh_oo_id,
     caml_make_vect=runtime.caml_make_vect,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
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
     cst_syntax_error=caml_new_string("syntax error"),
     cst_Parsing_YYexit=caml_new_string("Parsing.YYexit"),
     cst_Parsing_Parse_error=caml_new_string("Parsing.Parse_error"),
     Obj=global_data.Obj,
     Array=global_data.Array,
     Lexing=global_data.Lexing,
     YYexit=[248,cst_Parsing_YYexit,caml_fresh_oo_id(0)],
     Parse_error=[248,cst_Parsing_Parse_error,caml_fresh_oo_id(0)],
     env=
      [0,
       caml_make_vect(100,0),
       caml_make_vect(100,0),
       caml_make_vect(100,Lexing[1]),
       caml_make_vect(100,Lexing[1]),
       100,
       0,
       0,
       0,
       Lexing[1],
       Lexing[1],
       0,
       0,
       0,
       0,
       0,
       0];
    function grow_stacks(param)
     {var
       oldsize=env[5],
       newsize=oldsize * 2 | 0,
       new_s=caml_make_vect(newsize,0),
       new_v=caml_make_vect(newsize,0),
       new_start=caml_make_vect(newsize,Lexing[1]),
       new_end=caml_make_vect(newsize,Lexing[1]);
      caml_call5(Array[10],env[1],0,new_s,0,oldsize);
      env[1] = new_s;
      caml_call5(Array[10],env[2],0,new_v,0,oldsize);
      env[2] = new_v;
      caml_call5(Array[10],env[3],0,new_start,0,oldsize);
      env[3] = new_start;
      caml_call5(Array[10],env[4],0,new_end,0,oldsize);
      env[4] = new_end;
      env[5] = newsize;
      return 0}
    function clear_parser(param)
     {caml_call4(Array[9],env[2],0,env[5],0);env[8] = 0;return 0}
    var current_lookahead_fun=[0,function(param){return 0}];
    function yyparse(tables,start,lexer,lexbuf)
     {function loop(cmd,arg)
       {var cmd$0=cmd,arg$0=arg;
        for(;;)
         {var match=runtime.caml_parse_engine(tables,env,cmd$0,arg$0);
          switch(match)
           {case 0:
             var arg$1=caml_call1(lexer,lexbuf);
             env[9] = lexbuf[11];
             env[10] = lexbuf[12];
             var cmd$0=1,arg$0=arg$1;
             continue;
            case 1:throw Parse_error;
            case 2:grow_stacks(0);var cmd$0=2,arg$0=0;continue;
            case 3:grow_stacks(0);var cmd$0=3,arg$0=0;continue;
            case 4:
             try
              {var
                _m_=env[13],
                _n_=caml_call1(caml_check_bound(tables[1],_m_)[1 + _m_],env),
                _o_=4,
                cmd$1=_o_,
                arg$2=_n_}
             catch(_q_)
              {_q_ = caml_wrap_exception(_q_);
               if(_q_ !== Parse_error)throw _q_;
               var _k_=0,_l_=5,cmd$1=_l_,arg$2=_k_,_p_=_q_}
             var cmd$0=cmd$1,arg$0=arg$2;
             continue;
            default:
             caml_call1(tables[14],cst_syntax_error);
             var cmd$0=5,arg$0=0;
             continue}}}
      var
       init_asp=env[11],
       init_sp=env[14],
       init_stackbase=env[6],
       init_state=env[15],
       init_curr_char=env[7],
       init_lval=env[8],
       init_errflag=env[16];
      env[6] = env[14] + 1 | 0;
      env[7] = start;
      env[10] = lexbuf[12];
      try
       {var _i_=loop(0,0);return _i_}
      catch(exn)
       {exn = caml_wrap_exception(exn);
        var curr_char=env[7];
        env[11] = init_asp;
        env[14] = init_sp;
        env[6] = init_stackbase;
        env[15] = init_state;
        env[7] = init_curr_char;
        env[8] = init_lval;
        env[16] = init_errflag;
        if(exn[1] === YYexit){var v=exn[2];return v}
        current_lookahead_fun[1]
        =
        function(tok)
         {if(caml_call1(Obj[1],tok))
           {var _j_=runtime.caml_obj_tag(tok);
            return caml_check_bound(tables[3],_j_)[1 + _j_] === curr_char?1:0}
          return caml_check_bound(tables[2],tok)[1 + tok] === curr_char?1:0};
        throw exn}}
    function peek_val(env,n)
     {var _h_=env[11] - n | 0;return caml_check_bound(env[2],_h_)[1 + _h_]}
    function symbol_start_pos(param)
     {function loop(i)
       {var i$0=i;
        for(;;)
         {if(0 < i$0)
           {var
             _e_=(env[11] - i$0 | 0) + 1 | 0,
             st=caml_check_bound(env[3],_e_)[1 + _e_],
             _f_=(env[11] - i$0 | 0) + 1 | 0,
             en=caml_check_bound(env[4],_f_)[1 + _f_];
            if(runtime.caml_notequal(st,en))return st;
            var i$1=i$0 - 1 | 0,i$0=i$1;
            continue}
          var _g_=env[11];
          return caml_check_bound(env[4],_g_)[1 + _g_]}}
      return loop(env[12])}
    function symbol_end_pos(param)
     {var _d_=env[11];return caml_check_bound(env[4],_d_)[1 + _d_]}
    function rhs_start_pos(n)
     {var _c_=env[11] - (env[12] - n | 0) | 0;
      return caml_check_bound(env[3],_c_)[1 + _c_]}
    function rhs_end_pos(n)
     {var _b_=env[11] - (env[12] - n | 0) | 0;
      return caml_check_bound(env[4],_b_)[1 + _b_]}
    function symbol_start(param){return symbol_start_pos(0)[4]}
    function symbol_end(param){return symbol_end_pos(0)[4]}
    function rhs_start(n){return rhs_start_pos(n)[4]}
    function rhs_end(n){return rhs_end_pos(n)[4]}
    function is_current_lookahead(tok)
     {return caml_call1(current_lookahead_fun[1],tok)}
    function parse_error(param){return 0}
    var
     Parsing=
      [0,
       symbol_start,
       symbol_end,
       rhs_start,
       rhs_end,
       symbol_start_pos,
       symbol_end_pos,
       rhs_start_pos,
       rhs_end_pos,
       clear_parser,
       Parse_error,
       function(_a_){return runtime.caml_set_parser_trace(_a_)},
       YYexit,
       yyparse,
       peek_val,
       is_current_lookahead,
       parse_error];
    runtime.caml_register_global(7,Parsing,"Parsing");
    return}
  (function(){return this}()));
