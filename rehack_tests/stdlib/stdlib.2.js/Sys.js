(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string,
     caml_wrap_exception=runtime.caml_wrap_exception,
     global_data=runtime.caml_get_global_data(),
     cst_Sys_Break=caml_new_string("Sys.Break"),
     ocaml_version=caml_new_string("4.06.0"),
     Not_found=global_data.Not_found,
     match=runtime.caml_sys_get_argv(0),
     argv=match[2],
     executable_name=match[1],
     match$0=runtime.caml_sys_get_config(0),
     os_type=match$0[1],
     backend_type=runtime.caml_sys_const_backend_type(0),
     unix=runtime.caml_sys_const_ostype_unix(0),
     win32=runtime.caml_sys_const_ostype_win32(0),
     cygwin=runtime.caml_sys_const_ostype_cygwin(0),
     max_array_length=runtime.caml_sys_const_max_wosize(0),
     max_string_length=(4 * max_array_length | 0) - 1 | 0,
     big_endian=0,
     word_size=32,
     int_size=32;
    function getenv_opt(s)
     {try
       {var _d_=[0,runtime.caml_sys_getenv(s)];return _d_}
      catch(_e_)
       {_e_ = caml_wrap_exception(_e_);
        if(_e_ === Not_found)return 0;
        throw _e_}}
    var interactive=[0,0];
    function set_signal(sig_num,sig_beh){return 0}
    var
     Break=[248,cst_Sys_Break,runtime.caml_fresh_oo_id(0)],
     sigabrt=-1,
     sigalrm=-2,
     sigfpe=-3,
     sighup=-4,
     sigill=-5,
     sigint=-6,
     sigkill=-7,
     sigpipe=-8,
     sigquit=-9,
     sigsegv=-10,
     sigterm=-11,
     sigusr1=-12,
     sigusr2=-13,
     sigchld=-14,
     sigcont=-15,
     sigstop=-16,
     sigtstp=-17,
     sigttin=-18,
     sigttou=-19,
     sigvtalrm=-20,
     sigprof=-21,
     sigbus=-22,
     sigpoll=-23,
     sigsys=-24,
     sigtrap=-25,
     sigurg=-26,
     sigxcpu=-27,
     sigxfsz=-28;
    function catch_break(on)
     {return on
              ?set_signal(sigint,[0,function(param){throw Break}])
              :set_signal(sigint,0)}
    function _a_(_c_){return runtime.caml_ml_runtime_warnings_enabled(_c_)}
    var
     Sys=
      [0,
       argv,
       executable_name,
       getenv_opt,
       interactive,
       os_type,
       backend_type,
       unix,
       win32,
       cygwin,
       word_size,
       int_size,
       big_endian,
       max_string_length,
       max_array_length,
       set_signal,
       sigabrt,
       sigalrm,
       sigfpe,
       sighup,
       sigill,
       sigint,
       sigkill,
       sigpipe,
       sigquit,
       sigsegv,
       sigterm,
       sigusr1,
       sigusr2,
       sigchld,
       sigcont,
       sigstop,
       sigtstp,
       sigttin,
       sigttou,
       sigvtalrm,
       sigprof,
       sigbus,
       sigpoll,
       sigsys,
       sigtrap,
       sigurg,
       sigxcpu,
       sigxfsz,
       Break,
       catch_break,
       ocaml_version,
       function(_b_){return runtime.caml_ml_enable_runtime_warnings(_b_)},
       _a_];
    runtime.caml_register_global(3,Sys,"Sys");
    return}
  (function(){return this}()));
