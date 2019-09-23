(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_ml_string_length=runtime.caml_ml_string_length,
     caml_new_string=runtime.caml_new_string;
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
     Sys=global_data.Sys,
     Printf=global_data.Printf,
     _a_=
      [0,
       [11,caml_new_string("minor_collections: "),[4,0,0,0,[12,10,0]]],
       caml_new_string("minor_collections: %d\n")],
     _b_=
      [0,
       [11,caml_new_string("major_collections: "),[4,0,0,0,[12,10,0]]],
       caml_new_string("major_collections: %d\n")],
     _c_=
      [0,
       [11,caml_new_string("compactions:       "),[4,0,0,0,[12,10,0]]],
       caml_new_string("compactions:       %d\n")],
     _d_=[0,[12,10,0],caml_new_string("\n")],
     _e_=[0,[8,0,0,[0,0],0],caml_new_string("%.0f")],
     _f_=
      [0,
       [11,caml_new_string("minor_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
       caml_new_string("minor_words:    %*.0f\n")],
     _g_=
      [0,
       [11,caml_new_string("promoted_words: "),[8,0,[1,1],[0,0],[12,10,0]]],
       caml_new_string("promoted_words: %*.0f\n")],
     _h_=
      [0,
       [11,caml_new_string("major_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
       caml_new_string("major_words:    %*.0f\n")],
     _i_=[0,[12,10,0],caml_new_string("\n")],
     _j_=[0,[4,0,0,0,0],caml_new_string("%d")],
     _k_=
      [0,
       [11,caml_new_string("top_heap_words: "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("top_heap_words: %*d\n")],
     _l_=
      [0,
       [11,caml_new_string("heap_words:     "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("heap_words:     %*d\n")],
     _m_=
      [0,
       [11,caml_new_string("live_words:     "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("live_words:     %*d\n")],
     _n_=
      [0,
       [11,caml_new_string("free_words:     "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("free_words:     %*d\n")],
     _o_=
      [0,
       [11,caml_new_string("largest_free:   "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("largest_free:   %*d\n")],
     _p_=
      [0,
       [11,caml_new_string("fragments:      "),[4,0,[1,1],0,[12,10,0]]],
       caml_new_string("fragments:      %*d\n")],
     _q_=[0,[12,10,0],caml_new_string("\n")],
     _r_=
      [0,
       [11,caml_new_string("live_blocks: "),[4,0,0,0,[12,10,0]]],
       caml_new_string("live_blocks: %d\n")],
     _s_=
      [0,
       [11,caml_new_string("free_blocks: "),[4,0,0,0,[12,10,0]]],
       caml_new_string("free_blocks: %d\n")],
     _t_=
      [0,
       [11,caml_new_string("heap_chunks: "),[4,0,0,0,[12,10,0]]],
       caml_new_string("heap_chunks: %d\n")];
    function print_stat(c)
     {var st=runtime.caml_gc_stat(0);
      caml_call3(Printf[1],c,_a_,st[4]);
      caml_call3(Printf[1],c,_b_,st[5]);
      caml_call3(Printf[1],c,_c_,st[14]);
      caml_call2(Printf[1],c,_d_);
      var l1=caml_ml_string_length(caml_call2(Printf[4],_e_,st[1]));
      caml_call4(Printf[1],c,_f_,l1,st[1]);
      caml_call4(Printf[1],c,_g_,l1,st[2]);
      caml_call4(Printf[1],c,_h_,l1,st[3]);
      caml_call2(Printf[1],c,_i_);
      var l2=caml_ml_string_length(caml_call2(Printf[4],_j_,st[15]));
      caml_call4(Printf[1],c,_k_,l2,st[15]);
      caml_call4(Printf[1],c,_l_,l2,st[6]);
      caml_call4(Printf[1],c,_m_,l2,st[8]);
      caml_call4(Printf[1],c,_n_,l2,st[10]);
      caml_call4(Printf[1],c,_o_,l2,st[12]);
      caml_call4(Printf[1],c,_p_,l2,st[13]);
      caml_call2(Printf[1],c,_q_);
      caml_call3(Printf[1],c,_r_,st[9]);
      caml_call3(Printf[1],c,_s_,st[11]);
      return caml_call3(Printf[1],c,_t_,st[7])}
    function allocated_bytes(param)
     {var
       match=runtime.caml_gc_counters(0),
       ma=match[3],
       pro=match[2],
       mi=match[1];
      return (mi + ma - pro) * (Sys[10] / 8 | 0)}
    function create_alarm(f){return [0,1]}
    function delete_alarm(a){a[1] = 0;return 0}
    function _u_(_A_){return runtime.caml_final_release(_A_)}
    function _v_(_z_,_y_)
     {return runtime.caml_final_register_called_without_value(_z_,_y_)}
    var
     Gc=
      [0,
       print_stat,
       allocated_bytes,
       function(_x_,_w_){return runtime.caml_final_register(_x_,_w_)},
       _v_,
       _u_,
       create_alarm,
       delete_alarm];
    runtime.caml_register_global(22,Gc,"Gc");
    return}
  (function(){return this}()));
