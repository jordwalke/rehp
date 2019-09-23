(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception;
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
    var
     global_data=runtime.caml_get_global_data(),
     cst$4=caml_new_string("."),
     cst$2=caml_new_string(">"),
     cst$3=caml_new_string("</"),
     cst$0=caml_new_string(">"),
     cst$1=caml_new_string("<"),
     cst=caml_new_string("\n"),
     cst_Format_Empty_queue=caml_new_string("Format.Empty_queue"),
     CamlinternalFormat=global_data.CamlinternalFormat,
     Pervasives=global_data.Pervasives,
     String=global_data.String,
     Buffer=global_data.Buffer,
     List=global_data.List,
     Not_found=global_data.Not_found,
     _b_=[3,0,3],
     _a_=[0,caml_new_string("")];
    function make_queue(param){return [0,0,0]}
    function clear_queue(q){q[1] = 0;q[2] = 0;return 0}
    function add_queue(x,q)
     {var c=[0,x,0],_ct_=q[1];
      return _ct_?(q[1] = c,_ct_[2] = c,0):(q[1] = c,q[2] = c,0)}
    var Empty_queue=[248,cst_Format_Empty_queue,runtime.caml_fresh_oo_id(0)];
    function peek_queue(param)
     {var _cs_=param[2];if(_cs_){var x=_cs_[1];return x}throw Empty_queue}
    function take_queue(q)
     {var _cr_=q[2];
      if(_cr_)
       {var x=_cr_[1],tl=_cr_[2];q[2] = tl;if(0 === tl)q[1] = 0;return x}
      throw Empty_queue}
    function pp_enqueue(state,token)
     {var len=token[3];
      state[13] = state[13] + len | 0;
      return add_queue(token,state[28])}
    function pp_clear_queue(state)
     {state[12] = 1;state[13] = 1;return clear_queue(state[28])}
    var pp_infinity=1000000010;
    function pp_output_string(state,s)
     {return caml_call3(state[17],s,0,caml_ml_string_length(s))}
    function pp_output_newline(state){return caml_call1(state[19],0)}
    function pp_output_spaces(state,n){return caml_call1(state[20],n)}
    function pp_output_indent(state,n){return caml_call1(state[21],n)}
    function break_new_line(state,offset,width)
     {pp_output_newline(state);
      state[11] = 1;
      var
       indent=(state[6] - width | 0) + offset | 0,
       real_indent=caml_call2(Pervasives[4],state[8],indent);
      state[10] = real_indent;
      state[9] = state[6] - state[10] | 0;
      return pp_output_indent(state,state[10])}
    function break_line(state,width){return break_new_line(state,0,width)}
    function break_same_line(state,width)
     {state[9] = state[9] - width | 0;return pp_output_spaces(state,width)}
    function pp_force_break_line(state)
     {var _co_=state[2];
      if(_co_)
       {var
         match=_co_[1],
         width=match[2],
         bl_ty=match[1],
         _cp_=state[9] < width?1:0;
        if(_cp_)
         {if(0 !== bl_ty)return 5 <= bl_ty?0:break_line(state,width);
          var _cq_=0}
        else
         var _cq_=_cp_;
        return _cq_}
      return pp_output_newline(state)}
    function pp_skip_token(state)
     {var match=take_queue(state[28]),size=match[1],len=match[3];
      state[12] = state[12] - len | 0;
      state[9] = state[9] + size | 0;
      return 0}
    function format_pp_token(state,size,param)
     {if(typeof param === "number")
       switch(param)
        {case 0:
          var _cd_=state[3];
          if(_cd_)
           {var
             match=_cd_[1],
             tabs=match[1],
             add_tab=
              function(n,ls)
               {if(ls)
                 {var l=ls[2],x=ls[1];
                  return runtime.caml_lessthan(n,x)
                          ?[0,n,ls]
                          :[0,x,add_tab(n,l)]}
                return [0,n,0]};
            tabs[1] = add_tab(state[6] - state[9] | 0,tabs[1]);
            return 0}
          return 0;
         case 1:
          var _ce_=state[2];
          if(_ce_){var ls=_ce_[2];state[2] = ls;return 0}
          return 0;
         case 2:
          var _cf_=state[3];
          if(_cf_){var ls$0=_cf_[2];state[3] = ls$0;return 0}
          return 0;
         case 3:
          var _cg_=state[2];
          if(_cg_)
           {var match$0=_cg_[1],width=match$0[2];
            return break_line(state,width)}
          return pp_output_newline(state);
         case 4:
          var _ch_=state[10] !== (state[6] - state[9] | 0)?1:0;
          return _ch_?pp_skip_token(state):_ch_;
         default:
          var _ci_=state[5];
          if(_ci_)
           {var
             tags=_ci_[2],
             tag_name=_ci_[1],
             marker=caml_call1(state[25],tag_name);
            pp_output_string(state,marker);
            state[5] = tags;
            return 0}
          return 0}
      else
       switch(param[0])
        {case 0:
          var s=param[1];
          state[9] = state[9] - size | 0;
          pp_output_string(state,s);
          state[11] = 0;
          return 0;
         case 1:
          var off=param[2],n=param[1],_cj_=state[2];
          if(_cj_)
           {var match$1=_cj_[1],width$0=match$1[2],ty=match$1[1];
            switch(ty)
             {case 0:return break_same_line(state,n);
              case 1:return break_new_line(state,off,width$0);
              case 2:return break_new_line(state,off,width$0);
              case 3:
               return state[9] < size
                       ?break_new_line(state,off,width$0)
                       :break_same_line(state,n);
              case 4:
               return state[11]
                       ?break_same_line(state,n)
                       :state[9] < size
                         ?break_new_line(state,off,width$0)
                         :((state[6] - width$0 | 0) + off | 0) < state[10]
                           ?break_new_line(state,off,width$0)
                           :break_same_line(state,n);
              default:return break_same_line(state,n)}}
          return 0;
         case 2:
          var
           off$0=param[2],
           n$0=param[1],
           insertion_point=state[6] - state[9] | 0,
           _ck_=state[3];
          if(_ck_)
           {var
             match$2=_ck_[1],
             tabs$0=match$2[1],
             find=
              function(n,param)
               {var param$0=param;
                for(;;)
                 {if(param$0)
                   {var l=param$0[2],x=param$0[1];
                    if(runtime.caml_greaterequal(x,n))return x;
                    var param$0=l;
                    continue}
                  throw Not_found}},
             _cl_=tabs$0[1];
            if(_cl_)
             {var x=_cl_[1];
              try
               {var _cm_=find(insertion_point,tabs$0[1]),x$0=_cm_}
              catch(_cn_)
               {_cn_ = caml_wrap_exception(_cn_);
                if(_cn_ !== Not_found)throw _cn_;
                var x$0=x}
              var tab=x$0}
            else
             var tab=insertion_point;
            var offset=tab - insertion_point | 0;
            return 0 <= offset
                    ?break_same_line(state,offset + n$0 | 0)
                    :break_new_line(state,tab + off$0 | 0,state[6])}
          return 0;
         case 3:
          var
           ty$0=param[2],
           off$1=param[1],
           insertion_point$0=state[6] - state[9] | 0;
          if(state[8] < insertion_point$0)pp_force_break_line(state);
          var
           offset$0=state[9] - off$1 | 0,
           bl_type=1 === ty$0?1:state[9] < size?ty$0:5;
          state[2] = [0,[0,bl_type,offset$0],state[2]];
          return 0;
         case 4:var tbox=param[1];state[3] = [0,tbox,state[3]];return 0;
         default:
          var tag_name$0=param[1],marker$0=caml_call1(state[24],tag_name$0);
          pp_output_string(state,marker$0);
          state[5] = [0,tag_name$0,state[5]];
          return 0}}
    function advance_loop(state)
     {for(;;)
       {var
         match=peek_queue(state[28]),
         size=match[1],
         len=match[3],
         tok=match[2],
         _ca_=size < 0?1:0,
         _cb_=_ca_?(state[13] - state[12] | 0) < state[9]?1:0:_ca_,
         _cc_=1 - _cb_;
        if(_cc_)
         {take_queue(state[28]);
          var size$0=0 <= size?size:pp_infinity;
          format_pp_token(state,size$0,tok);
          state[12] = len + state[12] | 0;
          continue}
        return _cc_}}
    function advance_left(state)
     {try
       {var _b__=advance_loop(state);return _b__}
      catch(_b$_)
       {_b$_ = caml_wrap_exception(_b$_);
        if(_b$_ === Empty_queue)return 0;
        throw _b$_}}
    function enqueue_advance(state,tok)
     {pp_enqueue(state,tok);return advance_left(state)}
    function make_queue_elem(size,tok,len){return [0,size,tok,len]}
    function enqueue_string_as(state,size,s)
     {return enqueue_advance(state,make_queue_elem(size,[0,s],size))}
    function enqueue_string(state,s)
     {var len=caml_ml_string_length(s);return enqueue_string_as(state,len,s)}
    var
     q_elem=make_queue_elem(-1,_a_,0),
     scan_stack_bottom=[0,[0,-1,q_elem],0];
    function clear_scan_stack(state){state[1] = scan_stack_bottom;return 0}
    function set_size(state,ty)
     {var _b6_=state[1];
      if(_b6_)
       {var
         match=_b6_[1],
         queue_elem=match[2],
         left_tot=match[1],
         size=queue_elem[1],
         t=_b6_[2],
         tok=queue_elem[2];
        if(left_tot < state[12])return clear_scan_stack(state);
        if(typeof tok !== "number")
         switch(tok[0])
          {case 3:
            var
             _b8_=1 - ty,
             _b9_=
              _b8_?(queue_elem[1] = state[13] + size | 0,state[1] = t,0):_b8_;
            return _b9_;
           case 1:
           case 2:
            var
             _b7_=
              ty?(queue_elem[1] = state[13] + size | 0,state[1] = t,0):ty;
            return _b7_
           }
        return 0}
      return 0}
    function scan_push(state,b,tok)
     {pp_enqueue(state,tok);
      if(b)set_size(state,1);
      state[1] = [0,[0,state[13],tok],state[1]];
      return 0}
    function pp_open_box_gen(state,indent,br_ty)
     {state[14] = state[14] + 1 | 0;
      if(state[14] < state[15])
       {var elem=make_queue_elem(- state[13] | 0,[3,indent,br_ty],0);
        return scan_push(state,0,elem)}
      var _b5_=state[14] === state[15]?1:0;
      return _b5_?enqueue_string(state,state[16]):_b5_}
    function pp_open_sys_box(state){return pp_open_box_gen(state,0,3)}
    function pp_close_box(state,param)
     {var _b3_=1 < state[14]?1:0;
      if(_b3_)
       {if(state[14] < state[15])
         {pp_enqueue(state,[0,0,1,0]);set_size(state,1);set_size(state,0)}
        state[14] = state[14] - 1 | 0;
        var _b4_=0}
      else
       var _b4_=_b3_;
      return _b4_}
    function pp_open_tag(state,tag_name)
     {if(state[22])
       {state[4] = [0,tag_name,state[4]];caml_call1(state[26],tag_name)}
      var _b2_=state[23];
      return _b2_?pp_enqueue(state,[0,0,[5,tag_name],0]):_b2_}
    function pp_close_tag(state,param)
     {if(state[23])pp_enqueue(state,[0,0,5,0]);
      var _bZ_=state[22];
      if(_bZ_)
       {var _b0_=state[4];
        if(_b0_)
         {var tags=_b0_[2],tag_name=_b0_[1];
          caml_call1(state[27],tag_name);
          state[4] = tags;
          return 0}
        var _b1_=0}
      else
       var _b1_=_bZ_;
      return _b1_}
    function pp_set_print_tags(state,b){state[22] = b;return 0}
    function pp_set_mark_tags(state,b){state[23] = b;return 0}
    function pp_get_print_tags(state,param){return state[22]}
    function pp_get_mark_tags(state,param){return state[23]}
    function pp_set_tags(state,b)
     {pp_set_print_tags(state,b);return pp_set_mark_tags(state,b)}
    function pp_get_formatter_tag_functions(state,param)
     {return [0,state[24],state[25],state[26],state[27]]}
    function pp_set_formatter_tag_functions(state,param)
     {var pct=param[4],pot=param[3],mct=param[2],mot=param[1];
      state[24] = mot;
      state[25] = mct;
      state[26] = pot;
      state[27] = pct;
      return 0}
    function pp_rinit(state)
     {pp_clear_queue(state);
      clear_scan_stack(state);
      state[2] = 0;
      state[3] = 0;
      state[4] = 0;
      state[5] = 0;
      state[10] = 0;
      state[14] = 0;
      state[9] = state[6];
      return pp_open_sys_box(state)}
    function clear_tag_stack(state)
     {var _bX_=state[4];
      function _bY_(param){return pp_close_tag(state,0)}
      return caml_call2(List[15],_bY_,_bX_)}
    function pp_flush_queue(state,b)
     {clear_tag_stack(state);
      for(;;)
       {if(1 < state[14]){pp_close_box(state,0);continue}
        state[13] = pp_infinity;
        advance_left(state);
        if(b)pp_output_newline(state);
        return pp_rinit(state)}}
    function pp_print_as_size(state,size,s)
     {var _bW_=state[14] < state[15]?1:0;
      return _bW_?enqueue_string_as(state,size,s):_bW_}
    function pp_print_as(state,isize,s)
     {return pp_print_as_size(state,isize,s)}
    function pp_print_string(state,s)
     {return pp_print_as(state,caml_ml_string_length(s),s)}
    function pp_print_int(state,i)
     {return pp_print_string(state,caml_call1(Pervasives[21],i))}
    function pp_print_float(state,f)
     {return pp_print_string(state,caml_call1(Pervasives[23],f))}
    function pp_print_bool(state,b)
     {return pp_print_string(state,caml_call1(Pervasives[18],b))}
    function pp_print_char(state,c)
     {return pp_print_as(state,1,caml_call2(String[1],1,c))}
    function pp_open_hbox(state,param){return pp_open_box_gen(state,0,0)}
    function pp_open_vbox(state,indent)
     {return pp_open_box_gen(state,indent,1)}
    function pp_open_hvbox(state,indent)
     {return pp_open_box_gen(state,indent,2)}
    function pp_open_hovbox(state,indent)
     {return pp_open_box_gen(state,indent,3)}
    function pp_open_box(state,indent){return pp_open_box_gen(state,indent,4)}
    function pp_print_newline(state,param)
     {pp_flush_queue(state,1);return caml_call1(state[18],0)}
    function pp_print_flush(state,param)
     {pp_flush_queue(state,0);return caml_call1(state[18],0)}
    function pp_force_newline(state,param)
     {var _bV_=state[14] < state[15]?1:0;
      return _bV_?enqueue_advance(state,make_queue_elem(0,3,0)):_bV_}
    function pp_print_if_newline(state,param)
     {var _bU_=state[14] < state[15]?1:0;
      return _bU_?enqueue_advance(state,make_queue_elem(0,4,0)):_bU_}
    function pp_print_break(state,width,offset)
     {var _bT_=state[14] < state[15]?1:0;
      if(_bT_)
       {var elem=make_queue_elem(- state[13] | 0,[1,width,offset],width);
        return scan_push(state,1,elem)}
      return _bT_}
    function pp_print_space(state,param){return pp_print_break(state,1,0)}
    function pp_print_cut(state,param){return pp_print_break(state,0,0)}
    function pp_open_tbox(state,param)
     {state[14] = state[14] + 1 | 0;
      var _bS_=state[14] < state[15]?1:0;
      if(_bS_)
       {var elem=make_queue_elem(0,[4,[0,[0,0]]],0);
        return enqueue_advance(state,elem)}
      return _bS_}
    function pp_close_tbox(state,param)
     {var _bP_=1 < state[14]?1:0;
      if(_bP_)
       {var _bQ_=state[14] < state[15]?1:0;
        if(_bQ_)
         {var elem=make_queue_elem(0,2,0);
          enqueue_advance(state,elem);
          state[14] = state[14] - 1 | 0;
          var _bR_=0}
        else
         var _bR_=_bQ_}
      else
       var _bR_=_bP_;
      return _bR_}
    function pp_print_tbreak(state,width,offset)
     {var _bO_=state[14] < state[15]?1:0;
      if(_bO_)
       {var elem=make_queue_elem(- state[13] | 0,[2,width,offset],width);
        return scan_push(state,1,elem)}
      return _bO_}
    function pp_print_tab(state,param){return pp_print_tbreak(state,0,0)}
    function pp_set_tab(state,param)
     {var _bN_=state[14] < state[15]?1:0;
      if(_bN_)
       {var elem=make_queue_elem(0,0,0);return enqueue_advance(state,elem)}
      return _bN_}
    function pp_set_max_boxes(state,n)
     {var _bL_=1 < n?1:0,_bM_=_bL_?(state[15] = n,0):_bL_;return _bM_}
    function pp_get_max_boxes(state,param){return state[15]}
    function pp_over_max_boxes(state,param)
     {return state[14] === state[15]?1:0}
    function pp_set_ellipsis_text(state,s){state[16] = s;return 0}
    function pp_get_ellipsis_text(state,param){return state[16]}
    function pp_limit(n){return n < 1000000010?n:1000000009}
    function pp_set_min_space_left(state,n)
     {var _bK_=1 <= n?1:0;
      if(_bK_)
       {var n$0=pp_limit(n);
        state[7] = n$0;
        state[8] = state[6] - state[7] | 0;
        return pp_rinit(state)}
      return _bK_}
    function pp_set_max_indent(state,n)
     {return pp_set_min_space_left(state,state[6] - n | 0)}
    function pp_get_max_indent(state,param){return state[8]}
    function pp_set_margin(state,n)
     {var _bI_=1 <= n?1:0;
      if(_bI_)
       {var n$0=pp_limit(n);
        state[6] = n$0;
        if(state[8] <= state[6])
         var new_max_indent=state[8];
        else
         var
          _bJ_=
           caml_call2(Pervasives[5],state[6] - state[7] | 0,state[6] / 2 | 0),
          new_max_indent=caml_call2(Pervasives[5],_bJ_,1);
        return pp_set_max_indent(state,new_max_indent)}
      return _bI_}
    function pp_get_margin(state,param){return state[6]}
    function pp_set_formatter_out_functions(state,param)
     {var j=param[5],i=param[4],h=param[3],g=param[2],f=param[1];
      state[17] = f;
      state[18] = g;
      state[19] = h;
      state[20] = i;
      state[21] = j;
      return 0}
    function pp_get_formatter_out_functions(state,param)
     {return [0,state[17],state[18],state[19],state[20],state[21]]}
    function pp_set_formatter_output_functions(state,f,g)
     {state[17] = f;state[18] = g;return 0}
    function pp_get_formatter_output_functions(state,param)
     {return [0,state[17],state[18]]}
    function display_newline(state,param)
     {return caml_call3(state[17],cst,0,1)}
    var blank_line=caml_call2(String[1],80,32);
    function display_blanks(state,n)
     {var n$0=n;
      for(;;)
       {var _bH_=0 < n$0?1:0;
        if(_bH_)
         {if(80 < n$0)
           {caml_call3(state[17],blank_line,0,80);
            var n$1=n$0 - 80 | 0,n$0=n$1;
            continue}
          return caml_call3(state[17],blank_line,0,n$0)}
        return _bH_}}
    function pp_set_formatter_out_channel(state,oc)
     {state[17] = caml_call1(Pervasives[57],oc);
      state[18] = function(param){return caml_call1(Pervasives[51],oc)};
      state[19] = function(_bG_){return display_newline(state,_bG_)};
      state[20] = function(_bF_){return display_blanks(state,_bF_)};
      state[21] = function(_bE_){return display_blanks(state,_bE_)};
      return 0}
    function default_pp_mark_open_tag(s)
     {var _bD_=caml_call2(Pervasives[16],s,cst$0);
      return caml_call2(Pervasives[16],cst$1,_bD_)}
    function default_pp_mark_close_tag(s)
     {var _bC_=caml_call2(Pervasives[16],s,cst$2);
      return caml_call2(Pervasives[16],cst$3,_bC_)}
    function default_pp_print_open_tag(_bB_){return 0}
    function default_pp_print_close_tag(_bA_){return 0}
    function pp_make_formatter(f,g,h,i,j)
     {var pp_queue=make_queue(0),sys_tok=make_queue_elem(-1,_b_,0);
      add_queue(sys_tok,pp_queue);
      var sys_scan_stack=[0,[0,1,sys_tok],scan_stack_bottom];
      return [0,
              sys_scan_stack,
              0,
              0,
              0,
              0,
              78,
              10,
              68,
              78,
              0,
              1,
              1,
              1,
              1,
              Pervasives[7],
              cst$4,
              f,
              g,
              h,
              i,
              j,
              0,
              0,
              default_pp_mark_open_tag,
              default_pp_mark_close_tag,
              default_pp_print_open_tag,
              default_pp_print_close_tag,
              pp_queue]}
    function formatter_of_out_functions(out_funs)
     {return pp_make_formatter
              (out_funs[1],out_funs[2],out_funs[3],out_funs[4],out_funs[5])}
    function make_formatter(output,flush)
     {function _bs_(_bz_){return 0}
      function _bt_(_by_){return 0}
      var
       ppf=
        pp_make_formatter(output,flush,function(_bx_){return 0},_bt_,_bs_);
      ppf[19] = function(_bw_){return display_newline(ppf,_bw_)};
      ppf[20] = function(_bv_){return display_blanks(ppf,_bv_)};
      ppf[21] = function(_bu_){return display_blanks(ppf,_bu_)};
      return ppf}
    function formatter_of_out_channel(oc)
     {function _br_(param){return caml_call1(Pervasives[51],oc)}
      return make_formatter(caml_call1(Pervasives[57],oc),_br_)}
    function formatter_of_buffer(b)
     {function _bp_(_bq_){return 0}
      return make_formatter(caml_call1(Buffer[16],b),_bp_)}
    var pp_buffer_size=512;
    function pp_make_buffer(param)
     {return caml_call1(Buffer[1],pp_buffer_size)}
    var
     stdbuf=pp_make_buffer(0),
     std_formatter=formatter_of_out_channel(Pervasives[27]),
     err_formatter=formatter_of_out_channel(Pervasives[28]),
     str_formatter=formatter_of_buffer(stdbuf);
    function flush_buffer_formatter(buf,ppf)
     {pp_flush_queue(ppf,0);
      var s=caml_call1(Buffer[2],buf);
      caml_call1(Buffer[9],buf);
      return s}
    function flush_str_formatter(param)
     {return flush_buffer_formatter(stdbuf,str_formatter)}
    function make_symbolic_output_buffer(param){return [0,0]}
    function clear_symbolic_output_buffer(sob){sob[1] = 0;return 0}
    function get_symbolic_output_buffer(sob)
     {return caml_call1(List[9],sob[1])}
    function flush_symbolic_output_buffer(sob)
     {var items=get_symbolic_output_buffer(sob);
      clear_symbolic_output_buffer(sob);
      return items}
    function add_symbolic_output_item(sob,item)
     {sob[1] = [0,item,sob[1]];return 0}
    function formatter_of_symbolic_output_buffer(sob)
     {function symbolic_flush(sob,param)
       {return add_symbolic_output_item(sob,0)}
      function symbolic_newline(sob,param)
       {return add_symbolic_output_item(sob,1)}
      function symbolic_string(sob,s,i,n)
       {return add_symbolic_output_item(sob,[0,caml_call3(String[4],s,i,n)])}
      function symbolic_spaces(sob,n)
       {return add_symbolic_output_item(sob,[1,n])}
      function symbolic_indent(sob,n)
       {return add_symbolic_output_item(sob,[2,n])}
      function f(_bm_,_bn_,_bo_){return symbolic_string(sob,_bm_,_bn_,_bo_)}
      function g(_bl_){return symbolic_flush(sob,_bl_)}
      function h(_bk_){return symbolic_newline(sob,_bk_)}
      function i(_bj_){return symbolic_spaces(sob,_bj_)}
      function j(_bi_){return symbolic_indent(sob,_bi_)}
      return pp_make_formatter(f,g,h,i,j)}
    function open_hbox(_bh_){return pp_open_hbox(std_formatter,_bh_)}
    function open_vbox(_bg_){return pp_open_vbox(std_formatter,_bg_)}
    function open_hvbox(_bf_){return pp_open_hvbox(std_formatter,_bf_)}
    function open_hovbox(_be_){return pp_open_hovbox(std_formatter,_be_)}
    function open_box(_bd_){return pp_open_box(std_formatter,_bd_)}
    function close_box(_bc_){return pp_close_box(std_formatter,_bc_)}
    function open_tag(_bb_){return pp_open_tag(std_formatter,_bb_)}
    function close_tag(_ba_){return pp_close_tag(std_formatter,_ba_)}
    function print_as(_a__,_a$_){return pp_print_as(std_formatter,_a__,_a$_)}
    function print_string(_a9_){return pp_print_string(std_formatter,_a9_)}
    function print_int(_a8_){return pp_print_int(std_formatter,_a8_)}
    function print_float(_a7_){return pp_print_float(std_formatter,_a7_)}
    function print_char(_a6_){return pp_print_char(std_formatter,_a6_)}
    function print_bool(_a5_){return pp_print_bool(std_formatter,_a5_)}
    function print_break(_a3_,_a4_)
     {return pp_print_break(std_formatter,_a3_,_a4_)}
    function print_cut(_a2_){return pp_print_cut(std_formatter,_a2_)}
    function print_space(_a1_){return pp_print_space(std_formatter,_a1_)}
    function force_newline(_a0_){return pp_force_newline(std_formatter,_a0_)}
    function print_flush(_aZ_){return pp_print_flush(std_formatter,_aZ_)}
    function print_newline(_aY_){return pp_print_newline(std_formatter,_aY_)}
    function print_if_newline(_aX_)
     {return pp_print_if_newline(std_formatter,_aX_)}
    function open_tbox(_aW_){return pp_open_tbox(std_formatter,_aW_)}
    function close_tbox(_aV_){return pp_close_tbox(std_formatter,_aV_)}
    function print_tbreak(_aT_,_aU_)
     {return pp_print_tbreak(std_formatter,_aT_,_aU_)}
    function set_tab(_aS_){return pp_set_tab(std_formatter,_aS_)}
    function print_tab(_aR_){return pp_print_tab(std_formatter,_aR_)}
    function set_margin(_aQ_){return pp_set_margin(std_formatter,_aQ_)}
    function get_margin(_aP_){return pp_get_margin(std_formatter,_aP_)}
    function set_max_indent(_aO_)
     {return pp_set_max_indent(std_formatter,_aO_)}
    function get_max_indent(_aN_)
     {return pp_get_max_indent(std_formatter,_aN_)}
    function set_max_boxes(_aM_){return pp_set_max_boxes(std_formatter,_aM_)}
    function get_max_boxes(_aL_){return pp_get_max_boxes(std_formatter,_aL_)}
    function over_max_boxes(_aK_)
     {return pp_over_max_boxes(std_formatter,_aK_)}
    function set_ellipsis_text(_aJ_)
     {return pp_set_ellipsis_text(std_formatter,_aJ_)}
    function get_ellipsis_text(_aI_)
     {return pp_get_ellipsis_text(std_formatter,_aI_)}
    function set_formatter_out_channel(_aH_)
     {return pp_set_formatter_out_channel(std_formatter,_aH_)}
    function set_formatter_out_functions(_aG_)
     {return pp_set_formatter_out_functions(std_formatter,_aG_)}
    function get_formatter_out_functions(_aF_)
     {return pp_get_formatter_out_functions(std_formatter,_aF_)}
    function set_formatter_output_functions(_aD_,_aE_)
     {return pp_set_formatter_output_functions(std_formatter,_aD_,_aE_)}
    function get_formatter_output_functions(_aC_)
     {return pp_get_formatter_output_functions(std_formatter,_aC_)}
    function set_formatter_tag_functions(_aB_)
     {return pp_set_formatter_tag_functions(std_formatter,_aB_)}
    function get_formatter_tag_functions(_aA_)
     {return pp_get_formatter_tag_functions(std_formatter,_aA_)}
    function set_print_tags(_az_)
     {return pp_set_print_tags(std_formatter,_az_)}
    function get_print_tags(_ay_)
     {return pp_get_print_tags(std_formatter,_ay_)}
    function set_mark_tags(_ax_){return pp_set_mark_tags(std_formatter,_ax_)}
    function get_mark_tags(_aw_){return pp_get_mark_tags(std_formatter,_aw_)}
    function set_tags(_av_){return pp_set_tags(std_formatter,_av_)}
    function pp_print_list(opt,pp_v,ppf,param)
     {var opt$0=opt,param$0=param;
      for(;;)
       {if(opt$0)var sth=opt$0[1],pp_sep=sth;else var pp_sep=pp_print_cut;
        if(param$0)
         {var _at_=param$0[2],_au_=param$0[1];
          if(_at_)
           {caml_call2(pp_v,ppf,_au_);
            caml_call2(pp_sep,ppf,0);
            var opt$1=[0,pp_sep],opt$0=opt$1,param$0=_at_;
            continue}
          return caml_call2(pp_v,ppf,_au_)}
        return 0}}
    function pp_print_text(ppf,s)
     {var len=caml_ml_string_length(s),left=[0,0],right=[0,0];
      function flush(param)
       {pp_print_string
         (ppf,caml_call3(String[4],s,left[1],right[1] - left[1] | 0));
        right[1]++;
        left[1] = right[1];
        return 0}
      for(;;)
       {if(right[1] !== len)
         {var match=runtime.caml_string_get(s,right[1]);
          if(10 === match)
           {flush(0);pp_force_newline(ppf,0)}
          else
           if(32 === match){flush(0);pp_print_space(ppf,0)}else right[1]++;
          continue}
        var _as_=left[1] !== len?1:0;
        return _as_?flush(0):_as_}}
    function compute_tag(output,tag_acc)
     {var buf=caml_call1(Buffer[1],16),ppf=formatter_of_buffer(buf);
      caml_call2(output,ppf,tag_acc);
      pp_print_flush(ppf,0);
      var len=caml_call1(Buffer[7],buf);
      return 2 <= len
              ?caml_call3(Buffer[4],buf,1,len - 2 | 0)
              :caml_call1(Buffer[2],buf)}
    function output_formatting_lit(ppf,fmting_lit)
     {if(typeof fmting_lit === "number")
       switch(fmting_lit)
        {case 0:return pp_close_box(ppf,0);
         case 1:return pp_close_tag(ppf,0);
         case 2:return pp_print_flush(ppf,0);
         case 3:return pp_force_newline(ppf,0);
         case 4:return pp_print_newline(ppf,0);
         case 5:return pp_print_char(ppf,64);
         default:return pp_print_char(ppf,37)}
      else
       switch(fmting_lit[0])
        {case 0:
          var offset=fmting_lit[3],width=fmting_lit[2];
          return pp_print_break(ppf,width,offset);
         case 1:return 0;
         default:
          var c=fmting_lit[1];
          pp_print_char(ppf,64);
          return pp_print_char(ppf,c)}}
    function output_acc(ppf,acc)
     {if(typeof acc === "number")
       return 0;
      else
       switch(acc[0])
        {case 0:
          var f=acc[2],p=acc[1];
          output_acc(ppf,p);
          return output_formatting_lit(ppf,f);
         case 1:
          var _T_=acc[2],_U_=acc[1];
          if(0 === _T_[0])
           {var acc$0=_T_[1];
            output_acc(ppf,_U_);
            return pp_open_tag(ppf,compute_tag(output_acc,acc$0))}
          var acc$1=_T_[1];
          output_acc(ppf,_U_);
          var
           _V_=compute_tag(output_acc,acc$1),
           match=caml_call1(CamlinternalFormat[21],_V_),
           bty=match[2],
           indent=match[1];
          return pp_open_box_gen(ppf,indent,bty);
         case 2:
          var _W_=acc[1];
          if(typeof _W_ === "number")
           var switch$1=1;
          else
           if(0 === _W_[0])
            {var _Y_=_W_[2];
             if(typeof _Y_ === "number")
              var switch$2=1;
             else
              if(1 === _Y_[0])
               var
                _Z_=acc[2],
                ___=_Y_[2],
                _$_=_W_[1],
                s$0=_Z_,
                size=___,
                p$1=_$_,
                switch$0=0,
                switch$1=0,
                switch$2=0;
              else
               var switch$2=1;
             if(switch$2)var switch$1=1}
           else
            var switch$1=1;
          if(switch$1)var _X_=acc[2],s=_X_,p$0=_W_,switch$0=2;
          break;
         case 3:
          var _aa_=acc[1];
          if(typeof _aa_ === "number")
           var switch$3=1;
          else
           if(0 === _aa_[0])
            {var _ac_=_aa_[2];
             if(typeof _ac_ === "number")
              var switch$4=1;
             else
              if(1 === _ac_[0])
               var
                _ad_=acc[2],
                _ae_=_ac_[2],
                _af_=_aa_[1],
                c$0=_ad_,
                size$0=_ae_,
                p$3=_af_,
                switch$0=1,
                switch$3=0,
                switch$4=0;
              else
               var switch$4=1;
             if(switch$4)var switch$3=1}
           else
            var switch$3=1;
          if(switch$3)var _ab_=acc[2],c=_ab_,p$2=_aa_,switch$0=3;
          break;
         case 4:
          var _ag_=acc[1];
          if(typeof _ag_ === "number")
           var switch$5=1;
          else
           if(0 === _ag_[0])
            {var _ai_=_ag_[2];
             if(typeof _ai_ === "number")
              var switch$6=1;
             else
              if(1 === _ai_[0])
               var
                _aj_=acc[2],
                _ak_=_ai_[2],
                _al_=_ag_[1],
                s$0=_aj_,
                size=_ak_,
                p$1=_al_,
                switch$0=0,
                switch$5=0,
                switch$6=0;
              else
               var switch$6=1;
             if(switch$6)var switch$5=1}
           else
            var switch$5=1;
          if(switch$5)var _ah_=acc[2],s=_ah_,p$0=_ag_,switch$0=2;
          break;
         case 5:
          var _am_=acc[1];
          if(typeof _am_ === "number")
           var switch$7=1;
          else
           if(0 === _am_[0])
            {var _ao_=_am_[2];
             if(typeof _ao_ === "number")
              var switch$8=1;
             else
              if(1 === _ao_[0])
               var
                _ap_=acc[2],
                _aq_=_ao_[2],
                _ar_=_am_[1],
                c$0=_ap_,
                size$0=_aq_,
                p$3=_ar_,
                switch$0=1,
                switch$7=0,
                switch$8=0;
              else
               var switch$8=1;
             if(switch$8)var switch$7=1}
           else
            var switch$7=1;
          if(switch$7)var _an_=acc[2],c=_an_,p$2=_am_,switch$0=3;
          break;
         case 6:
          var f$0=acc[2],p$4=acc[1];
          output_acc(ppf,p$4);
          return caml_call1(f$0,ppf);
         case 7:
          var p$5=acc[1];output_acc(ppf,p$5);return pp_print_flush(ppf,0);
         default:
          var msg=acc[2],p$6=acc[1];
          output_acc(ppf,p$6);
          return caml_call1(Pervasives[1],msg)}
      switch(switch$0)
       {case 0:output_acc(ppf,p$1);return pp_print_as_size(ppf,size,s$0);
        case 1:
         output_acc(ppf,p$3);
         return pp_print_as_size(ppf,size$0,caml_call2(String[1],1,c$0));
        case 2:output_acc(ppf,p$0);return pp_print_string(ppf,s);
        default:output_acc(ppf,p$2);return pp_print_char(ppf,c)}}
    function strput_acc(ppf,acc)
     {if(typeof acc === "number")
       return 0;
      else
       switch(acc[0])
        {case 0:
          var f=acc[2],p=acc[1];
          strput_acc(ppf,p);
          return output_formatting_lit(ppf,f);
         case 1:
          var _q_=acc[2],_r_=acc[1];
          if(0 === _q_[0])
           {var acc$0=_q_[1];
            strput_acc(ppf,_r_);
            return pp_open_tag(ppf,compute_tag(strput_acc,acc$0))}
          var acc$1=_q_[1];
          strput_acc(ppf,_r_);
          var
           _s_=compute_tag(strput_acc,acc$1),
           match=caml_call1(CamlinternalFormat[21],_s_),
           bty=match[2],
           indent=match[1];
          return pp_open_box_gen(ppf,indent,bty);
         case 2:
          var _t_=acc[1];
          if(typeof _t_ === "number")
           var switch$1=1;
          else
           if(0 === _t_[0])
            {var _v_=_t_[2];
             if(typeof _v_ === "number")
              var switch$2=1;
             else
              if(1 === _v_[0])
               var
                _w_=acc[2],
                _x_=_v_[2],
                _y_=_t_[1],
                s$0=_w_,
                size=_x_,
                p$1=_y_,
                switch$0=0,
                switch$1=0,
                switch$2=0;
              else
               var switch$2=1;
             if(switch$2)var switch$1=1}
           else
            var switch$1=1;
          if(switch$1)var _u_=acc[2],s=_u_,p$0=_t_,switch$0=2;
          break;
         case 3:
          var _z_=acc[1];
          if(typeof _z_ === "number")
           var switch$3=1;
          else
           if(0 === _z_[0])
            {var _B_=_z_[2];
             if(typeof _B_ === "number")
              var switch$4=1;
             else
              if(1 === _B_[0])
               var
                _C_=acc[2],
                _D_=_B_[2],
                _E_=_z_[1],
                c$0=_C_,
                size$0=_D_,
                p$3=_E_,
                switch$0=1,
                switch$3=0,
                switch$4=0;
              else
               var switch$4=1;
             if(switch$4)var switch$3=1}
           else
            var switch$3=1;
          if(switch$3)var _A_=acc[2],c=_A_,p$2=_z_,switch$0=3;
          break;
         case 4:
          var _F_=acc[1];
          if(typeof _F_ === "number")
           var switch$5=1;
          else
           if(0 === _F_[0])
            {var _H_=_F_[2];
             if(typeof _H_ === "number")
              var switch$6=1;
             else
              if(1 === _H_[0])
               var
                _I_=acc[2],
                _J_=_H_[2],
                _K_=_F_[1],
                s$0=_I_,
                size=_J_,
                p$1=_K_,
                switch$0=0,
                switch$5=0,
                switch$6=0;
              else
               var switch$6=1;
             if(switch$6)var switch$5=1}
           else
            var switch$5=1;
          if(switch$5)var _G_=acc[2],s=_G_,p$0=_F_,switch$0=2;
          break;
         case 5:
          var _L_=acc[1];
          if(typeof _L_ === "number")
           var switch$7=1;
          else
           if(0 === _L_[0])
            {var _N_=_L_[2];
             if(typeof _N_ === "number")
              var switch$8=1;
             else
              if(1 === _N_[0])
               var
                _O_=acc[2],
                _P_=_N_[2],
                _Q_=_L_[1],
                c$0=_O_,
                size$0=_P_,
                p$3=_Q_,
                switch$0=1,
                switch$7=0,
                switch$8=0;
              else
               var switch$8=1;
             if(switch$8)var switch$7=1}
           else
            var switch$7=1;
          if(switch$7)var _M_=acc[2],c=_M_,p$2=_L_,switch$0=3;
          break;
         case 6:
          var _R_=acc[1];
          if(typeof _R_ !== "number" && 0 === _R_[0])
           {var _S_=_R_[2];
            if(typeof _S_ !== "number" && 1 === _S_[0])
             {var f$1=acc[2],size$1=_S_[2],p$4=_R_[1];
              strput_acc(ppf,p$4);
              return pp_print_as_size(ppf,size$1,caml_call1(f$1,0))}}
          var f$0=acc[2];
          strput_acc(ppf,_R_);
          return pp_print_string(ppf,caml_call1(f$0,0));
         case 7:
          var p$5=acc[1];strput_acc(ppf,p$5);return pp_print_flush(ppf,0);
         default:
          var msg=acc[2],p$6=acc[1];
          strput_acc(ppf,p$6);
          return caml_call1(Pervasives[1],msg)}
      switch(switch$0)
       {case 0:strput_acc(ppf,p$1);return pp_print_as_size(ppf,size,s$0);
        case 1:
         strput_acc(ppf,p$3);
         return pp_print_as_size(ppf,size$0,caml_call2(String[1],1,c$0));
        case 2:strput_acc(ppf,p$0);return pp_print_string(ppf,s);
        default:strput_acc(ppf,p$2);return pp_print_char(ppf,c)}}
    function kfprintf(k,ppf,param)
     {var fmt=param[1],_o_=0;
      function _p_(ppf,acc){output_acc(ppf,acc);return caml_call1(k,ppf)}
      return caml_call4(CamlinternalFormat[7],_p_,ppf,_o_,fmt)}
    function ikfprintf(k,ppf,param)
     {var fmt=param[1];return caml_call3(CamlinternalFormat[8],k,ppf,fmt)}
    function fprintf(ppf)
     {function _l_(_n_){return 0}
      return function(_m_){return kfprintf(_l_,ppf,_m_)}}
    function ifprintf(ppf)
     {function _i_(_k_){return 0}
      return function(_j_){return ikfprintf(_i_,ppf,_j_)}}
    function printf(fmt){return caml_call1(fprintf(std_formatter),fmt)}
    function eprintf(fmt){return caml_call1(fprintf(err_formatter),fmt)}
    function ksprintf(k,param)
     {var fmt=param[1],b=pp_make_buffer(0),ppf=formatter_of_buffer(b);
      function k$0(param,acc)
       {strput_acc(ppf,acc);
        return caml_call1(k,flush_buffer_formatter(b,ppf))}
      return caml_call4(CamlinternalFormat[7],k$0,0,0,fmt)}
    function sprintf(fmt){return ksprintf(function(s){return s},fmt)}
    function kasprintf(k,param)
     {var fmt=param[1],b=pp_make_buffer(0),ppf=formatter_of_buffer(b);
      function k$0(ppf,acc)
       {output_acc(ppf,acc);
        return caml_call1(k,flush_buffer_formatter(b,ppf))}
      return caml_call4(CamlinternalFormat[7],k$0,ppf,0,fmt)}
    function asprintf(fmt){return kasprintf(function(s){return s},fmt)}
    caml_call1(Pervasives[88],print_flush);
    function pp_set_all_formatter_output_functions(state,f,g,h,i)
     {pp_set_formatter_output_functions(state,f,g);
      state[19] = h;
      state[20] = i;
      return 0}
    function pp_get_all_formatter_output_functions(state,param)
     {return [0,state[17],state[18],state[19],state[20]]}
    function set_all_formatter_output_functions(_e_,_f_,_g_,_h_)
     {return pp_set_all_formatter_output_functions
              (std_formatter,_e_,_f_,_g_,_h_)}
    function get_all_formatter_output_functions(_d_)
     {return pp_get_all_formatter_output_functions(std_formatter,_d_)}
    function bprintf(b,param)
     {var fmt=param[1];
      function k(ppf,acc){output_acc(ppf,acc);return pp_flush_queue(ppf,0)}
      var _c_=formatter_of_buffer(b);
      return caml_call4(CamlinternalFormat[7],k,_c_,0,fmt)}
    var
     Format=
      [0,
       pp_open_box,
       open_box,
       pp_close_box,
       close_box,
       pp_open_hbox,
       open_hbox,
       pp_open_vbox,
       open_vbox,
       pp_open_hvbox,
       open_hvbox,
       pp_open_hovbox,
       open_hovbox,
       pp_print_string,
       print_string,
       pp_print_as,
       print_as,
       pp_print_int,
       print_int,
       pp_print_float,
       print_float,
       pp_print_char,
       print_char,
       pp_print_bool,
       print_bool,
       pp_print_space,
       print_space,
       pp_print_cut,
       print_cut,
       pp_print_break,
       print_break,
       pp_force_newline,
       force_newline,
       pp_print_if_newline,
       print_if_newline,
       pp_print_flush,
       print_flush,
       pp_print_newline,
       print_newline,
       pp_set_margin,
       set_margin,
       pp_get_margin,
       get_margin,
       pp_set_max_indent,
       set_max_indent,
       pp_get_max_indent,
       get_max_indent,
       pp_set_max_boxes,
       set_max_boxes,
       pp_get_max_boxes,
       get_max_boxes,
       pp_over_max_boxes,
       over_max_boxes,
       pp_open_tbox,
       open_tbox,
       pp_close_tbox,
       close_tbox,
       pp_set_tab,
       set_tab,
       pp_print_tab,
       print_tab,
       pp_print_tbreak,
       print_tbreak,
       pp_set_ellipsis_text,
       set_ellipsis_text,
       pp_get_ellipsis_text,
       get_ellipsis_text,
       pp_open_tag,
       open_tag,
       pp_close_tag,
       close_tag,
       pp_set_tags,
       set_tags,
       pp_set_print_tags,
       set_print_tags,
       pp_set_mark_tags,
       set_mark_tags,
       pp_get_print_tags,
       get_print_tags,
       pp_get_mark_tags,
       get_mark_tags,
       pp_set_formatter_out_channel,
       set_formatter_out_channel,
       pp_set_formatter_output_functions,
       set_formatter_output_functions,
       pp_get_formatter_output_functions,
       get_formatter_output_functions,
       pp_set_formatter_out_functions,
       set_formatter_out_functions,
       pp_get_formatter_out_functions,
       get_formatter_out_functions,
       pp_set_formatter_tag_functions,
       set_formatter_tag_functions,
       pp_get_formatter_tag_functions,
       get_formatter_tag_functions,
       formatter_of_out_channel,
       std_formatter,
       err_formatter,
       formatter_of_buffer,
       stdbuf,
       str_formatter,
       flush_str_formatter,
       make_formatter,
       formatter_of_out_functions,
       make_symbolic_output_buffer,
       clear_symbolic_output_buffer,
       get_symbolic_output_buffer,
       flush_symbolic_output_buffer,
       add_symbolic_output_item,
       formatter_of_symbolic_output_buffer,
       pp_print_list,
       pp_print_text,
       fprintf,
       printf,
       eprintf,
       sprintf,
       asprintf,
       ifprintf,
       kfprintf,
       ikfprintf,
       ksprintf,
       kasprintf,
       bprintf,
       ksprintf,
       set_all_formatter_output_functions,
       get_all_formatter_output_functions,
       pp_set_all_formatter_output_functions,
       pp_get_all_formatter_output_functions];
    runtime.caml_register_global(15,Format,"Format");
    return}
  (function(){return this}()));
