
module MenhirBasics = struct
  
  exception Error
  
  type token = 
    | TWeakdef
    | TVersion
    | TVNum of (
# 22 "annot_parser.mly"
      (string)
# 13 "annot_parser.ml"
  )
    | TSemi
    | TRequires
    | TProvides
    | TOTHER of (
# 24 "annot_parser.mly"
      (string)
# 21 "annot_parser.ml"
  )
    | TIdent of (
# 22 "annot_parser.mly"
      (string)
# 26 "annot_parser.ml"
  )
    | TForBackend
    | TComma
    | TA_Shallow
    | TA_Pure
    | TA_Object_literal
    | TA_Mutator
    | TA_Mutable
    | TA_Const
    | RPARENT
    | LT
    | LPARENT
    | LE
    | GT
    | GE
    | EQ
    | EOL
    | EOF
  
end

include MenhirBasics

let _eRR =
  MenhirBasics.Error

type _menhir_env = {
  _menhir_lexer: Lexing.lexbuf -> token;
  _menhir_lexbuf: Lexing.lexbuf;
  _menhir_token: token;
  mutable _menhir_error: bool
}

and _menhir_state = 
  | MenhirState50
  | MenhirState49
  | MenhirState46
  | MenhirState44
  | MenhirState35
  | MenhirState24
  | MenhirState22
  | MenhirState20
  | MenhirState14
  | MenhirState10
  | MenhirState3

let rec _menhir_goto_separated_nonempty_list_TComma_arg_annot_ : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_separated_nonempty_list_TComma_arg_annot_ -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    match _menhir_s with
    | MenhirState35 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv195) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_separated_nonempty_list_TComma_arg_annot_) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv193) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let ((x : 'tv_separated_nonempty_list_TComma_arg_annot_) : 'tv_separated_nonempty_list_TComma_arg_annot_) = _v in
        ((let _v : 'tv_loption_separated_nonempty_list_TComma_arg_annot__ = 
# 144 "./standard.mly"
    ( x )
# 88 "annot_parser.ml"
         in
        _menhir_goto_loption_separated_nonempty_list_TComma_arg_annot__ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv194)) : 'freshtv196)
    | MenhirState44 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv199 * _menhir_state * 'tv_arg_annot)) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_separated_nonempty_list_TComma_arg_annot_) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv197 * _menhir_state * 'tv_arg_annot)) = Obj.magic _menhir_stack in
        let (_ : _menhir_state) = _menhir_s in
        let ((xs : 'tv_separated_nonempty_list_TComma_arg_annot_) : 'tv_separated_nonempty_list_TComma_arg_annot_) = _v in
        ((let (_menhir_stack, _menhir_s, (x : 'tv_arg_annot)) = _menhir_stack in
        let _2 = () in
        let _v : 'tv_separated_nonempty_list_TComma_arg_annot_ = 
# 243 "./standard.mly"
    ( x :: xs )
# 105 "annot_parser.ml"
         in
        _menhir_goto_separated_nonempty_list_TComma_arg_annot_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv198)) : 'freshtv200)
    | _ ->
        _menhir_fail ()

and _menhir_goto_endline : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_endline -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    match _menhir_s with
    | MenhirState14 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv179)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_endline) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv177)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        let (_ : _menhir_state) = _menhir_s in
        let ((_4 : 'tv_endline) : 'tv_endline) = _v in
        ((let (_menhir_stack, _, (l : 'tv_separated_nonempty_list_TComma_version_)) = _menhir_stack in
        let _2 = () in
        let _1 = () in
        let _v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 129 "annot_parser.ml"
        ) = 
# 41 "annot_parser.mly"
    ( `Version (None,l) )
# 133 "annot_parser.ml"
         in
        _menhir_goto_annot _menhir_env _menhir_stack _v) : 'freshtv178)) : 'freshtv180)
    | MenhirState24 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv183)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_endline) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv181)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        let (_ : _menhir_state) = _menhir_s in
        let ((_4 : 'tv_endline) : 'tv_endline) = _v in
        ((let (_menhir_stack, _, (l : 'tv_separated_nonempty_list_TComma_TIdent_)) = _menhir_stack in
        let _2 = () in
        let _1 = () in
        let _v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 151 "annot_parser.ml"
        ) = 
# 37 "annot_parser.mly"
    ( `Requires (None,l) )
# 155 "annot_parser.ml"
         in
        _menhir_goto_annot _menhir_env _menhir_stack _v) : 'freshtv182)) : 'freshtv184)
    | MenhirState46 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (((('freshtv187)) * (
# 22 "annot_parser.mly"
      (string)
# 163 "annot_parser.ml"
        )) * 'tv_option_prim_annot_) * 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_endline) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (((('freshtv185)) * (
# 22 "annot_parser.mly"
      (string)
# 171 "annot_parser.ml"
        )) * 'tv_option_prim_annot_) * 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__) = Obj.magic _menhir_stack in
        let (_ : _menhir_state) = _menhir_s in
        let ((_6 : 'tv_endline) : 'tv_endline) = _v in
        ((let (((_menhir_stack, (id : (
# 22 "annot_parser.mly"
      (string)
# 178 "annot_parser.ml"
        ))), (opt : 'tv_option_prim_annot_)), (args : 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__)) = _menhir_stack in
        let _2 = () in
        let _1 = () in
        let _v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 185 "annot_parser.ml"
        ) = 
# 35 "annot_parser.mly"
    ( `Provides (None,id,(match opt with None -> `Mutator | Some k -> k),args) )
# 189 "annot_parser.ml"
         in
        _menhir_goto_annot _menhir_env _menhir_stack _v) : 'freshtv186)) : 'freshtv188)
    | MenhirState50 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv191)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_endline) = _v in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv189)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        let (_ : _menhir_state) = _menhir_s in
        let ((_4 : 'tv_endline) : 'tv_endline) = _v in
        ((let (_menhir_stack, _, (l : 'tv_separated_nonempty_list_TComma_TIdent_)) = _menhir_stack in
        let _2 = () in
        let _1 = () in
        let _v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 207 "annot_parser.ml"
        ) = 
# 39 "annot_parser.mly"
    ( `ForBackend (None,l) )
# 211 "annot_parser.ml"
         in
        _menhir_goto_annot _menhir_env _menhir_stack _v) : 'freshtv190)) : 'freshtv192)
    | _ ->
        _menhir_fail ()

and _menhir_goto_separated_nonempty_list_TComma_version_ : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_separated_nonempty_list_TComma_version_ -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    match _menhir_s with
    | MenhirState10 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv173 * _menhir_state * 'tv_version)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv171 * _menhir_state * 'tv_version)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        ((let ((_menhir_stack, _menhir_s, (x : 'tv_version)), _, (xs : 'tv_separated_nonempty_list_TComma_version_)) = _menhir_stack in
        let _2 = () in
        let _v : 'tv_separated_nonempty_list_TComma_version_ = 
# 243 "./standard.mly"
    ( x :: xs )
# 231 "annot_parser.ml"
         in
        _menhir_goto_separated_nonempty_list_TComma_version_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv172)) : 'freshtv174)
    | MenhirState3 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv175)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        ((assert (not _menhir_env._menhir_error);
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | EOF ->
            _menhir_run17 _menhir_env (Obj.magic _menhir_stack) MenhirState14
        | EOL ->
            _menhir_run16 _menhir_env (Obj.magic _menhir_stack) MenhirState14
        | TOTHER _v ->
            _menhir_run15 _menhir_env (Obj.magic _menhir_stack) MenhirState14 _v
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState14) : 'freshtv176)
    | _ ->
        _menhir_fail ()

and _menhir_goto_arg_annot : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_arg_annot -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv169 * _menhir_state * 'tv_arg_annot) = Obj.magic _menhir_stack in
    ((assert (not _menhir_env._menhir_error);
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | TComma ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv163 * _menhir_state * 'tv_arg_annot) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TA_Const ->
            _menhir_run39 _menhir_env (Obj.magic _menhir_stack) MenhirState44
        | TA_Mutable ->
            _menhir_run38 _menhir_env (Obj.magic _menhir_stack) MenhirState44
        | TA_Object_literal ->
            _menhir_run37 _menhir_env (Obj.magic _menhir_stack) MenhirState44
        | TA_Shallow ->
            _menhir_run36 _menhir_env (Obj.magic _menhir_stack) MenhirState44
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState44) : 'freshtv164)
    | RPARENT ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv165 * _menhir_state * 'tv_arg_annot) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, (x : 'tv_arg_annot)) = _menhir_stack in
        let _v : 'tv_separated_nonempty_list_TComma_arg_annot_ = 
# 241 "./standard.mly"
    ( [ x ] )
# 286 "annot_parser.ml"
         in
        _menhir_goto_separated_nonempty_list_TComma_arg_annot_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv166)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv167 * _menhir_state * 'tv_arg_annot) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv168)) : 'freshtv170)

and _menhir_fail : unit -> 'a =
  fun () ->
    Printf.fprintf stderr "Internal failure -- please contact the parser generator's developers.\n%!";
    assert false

and _menhir_run15 : _menhir_env -> 'ttv_tail -> _menhir_state -> (
# 24 "annot_parser.mly"
      (string)
# 305 "annot_parser.ml"
) -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv161) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    let ((_1 : (
# 24 "annot_parser.mly"
      (string)
# 314 "annot_parser.ml"
    )) : (
# 24 "annot_parser.mly"
      (string)
# 318 "annot_parser.ml"
    )) = _v in
    ((let _v : 'tv_endline = 
# 69 "annot_parser.mly"
           ( failwith _1  )
# 323 "annot_parser.ml"
     in
    _menhir_goto_endline _menhir_env _menhir_stack _menhir_s _v) : 'freshtv162)

and _menhir_run16 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv159) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_endline = 
# 67 "annot_parser.mly"
        ( () )
# 336 "annot_parser.ml"
     in
    _menhir_goto_endline _menhir_env _menhir_stack _menhir_s _v) : 'freshtv160)

and _menhir_run17 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv157) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_endline = 
# 68 "annot_parser.mly"
        ( () )
# 349 "annot_parser.ml"
     in
    _menhir_goto_endline _menhir_env _menhir_stack _menhir_s _v) : 'freshtv158)

and _menhir_goto_op : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_op -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv155 * _menhir_state * 'tv_op) = Obj.magic _menhir_stack in
    ((assert (not _menhir_env._menhir_error);
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | TVNum _v ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv151 * _menhir_state * 'tv_op) = Obj.magic _menhir_stack in
        let (_v : (
# 22 "annot_parser.mly"
      (string)
# 367 "annot_parser.ml"
        )) = _v in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv149 * _menhir_state * 'tv_op) = Obj.magic _menhir_stack in
        let ((_2 : (
# 22 "annot_parser.mly"
      (string)
# 375 "annot_parser.ml"
        )) : (
# 22 "annot_parser.mly"
      (string)
# 379 "annot_parser.ml"
        )) = _v in
        ((let (_menhir_stack, _menhir_s, (_1 : 'tv_op)) = _menhir_stack in
        let _v : 'tv_version = 
# 64 "annot_parser.mly"
             ( _1,_2 )
# 385 "annot_parser.ml"
         in
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv147) = _menhir_stack in
        let (_menhir_s : _menhir_state) = _menhir_s in
        let (_v : 'tv_version) = _v in
        ((let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv145 * _menhir_state * 'tv_version) = Obj.magic _menhir_stack in
        ((assert (not _menhir_env._menhir_error);
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TComma ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv139 * _menhir_state * 'tv_version) = Obj.magic _menhir_stack in
            ((let _menhir_env = _menhir_discard _menhir_env in
            let _tok = _menhir_env._menhir_token in
            match _tok with
            | EQ ->
                _menhir_run8 _menhir_env (Obj.magic _menhir_stack) MenhirState10
            | GE ->
                _menhir_run7 _menhir_env (Obj.magic _menhir_stack) MenhirState10
            | GT ->
                _menhir_run6 _menhir_env (Obj.magic _menhir_stack) MenhirState10
            | LE ->
                _menhir_run5 _menhir_env (Obj.magic _menhir_stack) MenhirState10
            | LT ->
                _menhir_run4 _menhir_env (Obj.magic _menhir_stack) MenhirState10
            | _ ->
                assert (not _menhir_env._menhir_error);
                _menhir_env._menhir_error <- true;
                _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState10) : 'freshtv140)
        | EOF | EOL | TOTHER _ ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv141 * _menhir_state * 'tv_version) = Obj.magic _menhir_stack in
            ((let (_menhir_stack, _menhir_s, (x : 'tv_version)) = _menhir_stack in
            let _v : 'tv_separated_nonempty_list_TComma_version_ = 
# 241 "./standard.mly"
    ( [ x ] )
# 424 "annot_parser.ml"
             in
            _menhir_goto_separated_nonempty_list_TComma_version_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv142)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv143 * _menhir_state * 'tv_version) = Obj.magic _menhir_stack in
            ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv144)) : 'freshtv146)) : 'freshtv148)) : 'freshtv150)) : 'freshtv152)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv153 * _menhir_state * 'tv_op) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv154)) : 'freshtv156)

and _menhir_goto_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ : _menhir_env -> 'ttv_tail -> 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ -> 'ttv_return =
  fun _menhir_env _menhir_stack _v ->
    let _menhir_stack = (_menhir_stack, _v) in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : (((('freshtv137)) * (
# 22 "annot_parser.mly"
      (string)
# 449 "annot_parser.ml"
    )) * 'tv_option_prim_annot_) * 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__) = Obj.magic _menhir_stack in
    ((assert (not _menhir_env._menhir_error);
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | EOF ->
        _menhir_run17 _menhir_env (Obj.magic _menhir_stack) MenhirState46
    | EOL ->
        _menhir_run16 _menhir_env (Obj.magic _menhir_stack) MenhirState46
    | TOTHER _v ->
        _menhir_run15 _menhir_env (Obj.magic _menhir_stack) MenhirState46 _v
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState46) : 'freshtv138)

and _menhir_goto_loption_separated_nonempty_list_TComma_arg_annot__ : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_loption_separated_nonempty_list_TComma_arg_annot__ -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : ('freshtv135) * _menhir_state * 'tv_loption_separated_nonempty_list_TComma_arg_annot__) = Obj.magic _menhir_stack in
    ((assert (not _menhir_env._menhir_error);
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | RPARENT ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv131) * _menhir_state * 'tv_loption_separated_nonempty_list_TComma_arg_annot__) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv129) * _menhir_state * 'tv_loption_separated_nonempty_list_TComma_arg_annot__) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _, (xs : 'tv_loption_separated_nonempty_list_TComma_arg_annot__)) = _menhir_stack in
        let _3 = () in
        let _1 = () in
        let _v : 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ = let x =
          let x = 
# 232 "./standard.mly"
    ( xs )
# 486 "annot_parser.ml"
           in
          
# 200 "./standard.mly"
    ( x )
# 491 "annot_parser.ml"
          
        in
        
# 116 "./standard.mly"
    ( Some x )
# 497 "annot_parser.ml"
         in
        _menhir_goto_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ _menhir_env _menhir_stack _v) : 'freshtv130)) : 'freshtv132)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv133) * _menhir_state * 'tv_loption_separated_nonempty_list_TComma_arg_annot__) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv134)) : 'freshtv136)

and _menhir_run36 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv127) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_arg_annot = 
# 52 "annot_parser.mly"
               ( `Shallow_const)
# 518 "annot_parser.ml"
     in
    _menhir_goto_arg_annot _menhir_env _menhir_stack _menhir_s _v) : 'freshtv128)

and _menhir_run37 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv125) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_arg_annot = 
# 53 "annot_parser.mly"
                      ( `Object_literal)
# 532 "annot_parser.ml"
     in
    _menhir_goto_arg_annot _menhir_env _menhir_stack _menhir_s _v) : 'freshtv126)

and _menhir_run38 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv123) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_arg_annot = 
# 54 "annot_parser.mly"
               ( `Mutable)
# 546 "annot_parser.ml"
     in
    _menhir_goto_arg_annot _menhir_env _menhir_stack _menhir_s _v) : 'freshtv124)

and _menhir_run39 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv121) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_arg_annot = 
# 51 "annot_parser.mly"
             ( `Const )
# 560 "annot_parser.ml"
     in
    _menhir_goto_arg_annot _menhir_env _menhir_stack _menhir_s _v) : 'freshtv122)

and _menhir_goto_separated_nonempty_list_TComma_TIdent_ : _menhir_env -> 'ttv_tail -> _menhir_state -> 'tv_separated_nonempty_list_TComma_TIdent_ -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    match _menhir_s with
    | MenhirState22 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv115 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 573 "annot_parser.ml"
        ))) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv113 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 579 "annot_parser.ml"
        ))) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((let ((_menhir_stack, _menhir_s, (x : (
# 22 "annot_parser.mly"
      (string)
# 584 "annot_parser.ml"
        ))), _, (xs : 'tv_separated_nonempty_list_TComma_TIdent_)) = _menhir_stack in
        let _2 = () in
        let _v : 'tv_separated_nonempty_list_TComma_TIdent_ = 
# 243 "./standard.mly"
    ( x :: xs )
# 590 "annot_parser.ml"
         in
        _menhir_goto_separated_nonempty_list_TComma_TIdent_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv114)) : 'freshtv116)
    | MenhirState20 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv117)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((assert (not _menhir_env._menhir_error);
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | EOF ->
            _menhir_run17 _menhir_env (Obj.magic _menhir_stack) MenhirState24
        | EOL ->
            _menhir_run16 _menhir_env (Obj.magic _menhir_stack) MenhirState24
        | TOTHER _v ->
            _menhir_run15 _menhir_env (Obj.magic _menhir_stack) MenhirState24 _v
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState24) : 'freshtv118)
    | MenhirState49 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv119)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((assert (not _menhir_env._menhir_error);
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | EOF ->
            _menhir_run17 _menhir_env (Obj.magic _menhir_stack) MenhirState50
        | EOL ->
            _menhir_run16 _menhir_env (Obj.magic _menhir_stack) MenhirState50
        | TOTHER _v ->
            _menhir_run15 _menhir_env (Obj.magic _menhir_stack) MenhirState50 _v
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState50) : 'freshtv120)
    | _ ->
        _menhir_fail ()

and _menhir_goto_annot : _menhir_env -> 'ttv_tail -> (
# 27 "annot_parser.mly"
      (Primitive.t)
# 631 "annot_parser.ml"
) -> 'ttv_return =
  fun _menhir_env _menhir_stack _v ->
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv111) = Obj.magic _menhir_stack in
    let (_v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 639 "annot_parser.ml"
    )) = _v in
    ((let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv109) = Obj.magic _menhir_stack in
    let ((_1 : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 646 "annot_parser.ml"
    )) : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 650 "annot_parser.ml"
    )) = _v in
    (Obj.magic _1 : 'freshtv110)) : 'freshtv112)

and _menhir_run4 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv107) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_op = 
# 58 "annot_parser.mly"
       ((<))
# 664 "annot_parser.ml"
     in
    _menhir_goto_op _menhir_env _menhir_stack _menhir_s _v) : 'freshtv108)

and _menhir_run5 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv105) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_op = 
# 57 "annot_parser.mly"
       ((<=))
# 678 "annot_parser.ml"
     in
    _menhir_goto_op _menhir_env _menhir_stack _menhir_s _v) : 'freshtv106)

and _menhir_run6 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv103) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_op = 
# 59 "annot_parser.mly"
       ((>))
# 692 "annot_parser.ml"
     in
    _menhir_goto_op _menhir_env _menhir_stack _menhir_s _v) : 'freshtv104)

and _menhir_run7 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv101) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_op = 
# 60 "annot_parser.mly"
       ((>=))
# 706 "annot_parser.ml"
     in
    _menhir_goto_op _menhir_env _menhir_stack _menhir_s _v) : 'freshtv102)

and _menhir_run8 : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    let _menhir_env = _menhir_discard _menhir_env in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv99) = Obj.magic _menhir_stack in
    let (_menhir_s : _menhir_state) = _menhir_s in
    ((let _1 = () in
    let _v : 'tv_op = 
# 61 "annot_parser.mly"
       ((=))
# 720 "annot_parser.ml"
     in
    _menhir_goto_op _menhir_env _menhir_stack _menhir_s _v) : 'freshtv100)

and _menhir_goto_option_prim_annot_ : _menhir_env -> 'ttv_tail -> 'tv_option_prim_annot_ -> 'ttv_return =
  fun _menhir_env _menhir_stack _v ->
    let _menhir_stack = (_menhir_stack, _v) in
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : ((('freshtv97)) * (
# 22 "annot_parser.mly"
      (string)
# 731 "annot_parser.ml"
    )) * 'tv_option_prim_annot_) = Obj.magic _menhir_stack in
    ((assert (not _menhir_env._menhir_error);
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | LPARENT ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv91) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TA_Const ->
            _menhir_run39 _menhir_env (Obj.magic _menhir_stack) MenhirState35
        | TA_Mutable ->
            _menhir_run38 _menhir_env (Obj.magic _menhir_stack) MenhirState35
        | TA_Object_literal ->
            _menhir_run37 _menhir_env (Obj.magic _menhir_stack) MenhirState35
        | TA_Shallow ->
            _menhir_run36 _menhir_env (Obj.magic _menhir_stack) MenhirState35
        | RPARENT ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv89) = Obj.magic _menhir_stack in
            let (_menhir_s : _menhir_state) = MenhirState35 in
            ((let _v : 'tv_loption_separated_nonempty_list_TComma_arg_annot__ = 
# 142 "./standard.mly"
    ( [] )
# 757 "annot_parser.ml"
             in
            _menhir_goto_loption_separated_nonempty_list_TComma_arg_annot__ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv90)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState35) : 'freshtv92)
    | EOF | EOL | TOTHER _ ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv93) = Obj.magic _menhir_stack in
        ((let _v : 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ = 
# 114 "./standard.mly"
    ( None )
# 770 "annot_parser.ml"
         in
        _menhir_goto_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__ _menhir_env _menhir_stack _v) : 'freshtv94)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ((('freshtv95)) * (
# 22 "annot_parser.mly"
      (string)
# 780 "annot_parser.ml"
        )) * 'tv_option_prim_annot_) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv96)) : 'freshtv98)

and _menhir_goto_prim_annot : _menhir_env -> 'ttv_tail -> 'tv_prim_annot -> 'ttv_return =
  fun _menhir_env _menhir_stack _v ->
    let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv87) = Obj.magic _menhir_stack in
    let (_v : 'tv_prim_annot) = _v in
    ((let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv85) = Obj.magic _menhir_stack in
    let ((x : 'tv_prim_annot) : 'tv_prim_annot) = _v in
    ((let _v : 'tv_option_prim_annot_ = 
# 116 "./standard.mly"
    ( Some x )
# 795 "annot_parser.ml"
     in
    _menhir_goto_option_prim_annot_ _menhir_env _menhir_stack _v) : 'freshtv86)) : 'freshtv88)

and _menhir_errorcase : _menhir_env -> 'ttv_tail -> _menhir_state -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s ->
    match _menhir_s with
    | MenhirState50 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv63)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv64)
    | MenhirState49 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv65)) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv66)
    | MenhirState46 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (((('freshtv67)) * (
# 22 "annot_parser.mly"
      (string)
# 816 "annot_parser.ml"
        )) * 'tv_option_prim_annot_) * 'tv_option_delimited_LPARENT_separated_list_TComma_arg_annot__RPARENT__) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv68)
    | MenhirState44 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv69 * _menhir_state * 'tv_arg_annot)) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv70)
    | MenhirState35 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv71) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv72)
    | MenhirState24 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv73)) * _menhir_state * 'tv_separated_nonempty_list_TComma_TIdent_) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv74)
    | MenhirState22 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv75 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 838 "annot_parser.ml"
        ))) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv76)
    | MenhirState20 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv77)) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv78)
    | MenhirState14 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : (('freshtv79)) * _menhir_state * 'tv_separated_nonempty_list_TComma_version_) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv80)
    | MenhirState10 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv81 * _menhir_state * 'tv_version)) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv82)
    | MenhirState3 ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : ('freshtv83)) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv84)

and _menhir_run21 : _menhir_env -> 'ttv_tail -> _menhir_state -> (
# 22 "annot_parser.mly"
      (string)
# 864 "annot_parser.ml"
) -> 'ttv_return =
  fun _menhir_env _menhir_stack _menhir_s _v ->
    let _menhir_stack = (_menhir_stack, _menhir_s, _v) in
    let _menhir_env = _menhir_discard _menhir_env in
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | TComma ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv57 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 876 "annot_parser.ml"
        )) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TIdent _v ->
            _menhir_run21 _menhir_env (Obj.magic _menhir_stack) MenhirState22 _v
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState22) : 'freshtv58)
    | EOF | EOL | TOTHER _ ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv59 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 892 "annot_parser.ml"
        )) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, (x : (
# 22 "annot_parser.mly"
      (string)
# 897 "annot_parser.ml"
        ))) = _menhir_stack in
        let _v : 'tv_separated_nonempty_list_TComma_TIdent_ = 
# 241 "./standard.mly"
    ( [ x ] )
# 902 "annot_parser.ml"
         in
        _menhir_goto_separated_nonempty_list_TComma_TIdent_ _menhir_env _menhir_stack _menhir_s _v) : 'freshtv60)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv61 * _menhir_state * (
# 22 "annot_parser.mly"
      (string)
# 912 "annot_parser.ml"
        )) = Obj.magic _menhir_stack in
        ((let (_menhir_stack, _menhir_s, _) = _menhir_stack in
        _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) _menhir_s) : 'freshtv62)

and _menhir_discard : _menhir_env -> _menhir_env =
  fun _menhir_env ->
    let lexer = _menhir_env._menhir_lexer in
    let lexbuf = _menhir_env._menhir_lexbuf in
    let _tok = lexer lexbuf in
    {
      _menhir_lexer = lexer;
      _menhir_lexbuf = lexbuf;
      _menhir_token = _tok;
      _menhir_error = false;
    }

and annot : (Lexing.lexbuf -> token) -> Lexing.lexbuf -> (
# 27 "annot_parser.mly"
      (Primitive.t)
# 932 "annot_parser.ml"
) =
  fun lexer lexbuf ->
    let _menhir_env =
      let (lexer : Lexing.lexbuf -> token) = lexer in
      let (lexbuf : Lexing.lexbuf) = lexbuf in
      ((let _tok = Obj.magic () in
      {
        _menhir_lexer = lexer;
        _menhir_lexbuf = lexbuf;
        _menhir_token = _tok;
        _menhir_error = false;
      }) : _menhir_env)
    in
    Obj.magic (let (_menhir_env : _menhir_env) = _menhir_env in
    let (_menhir_stack : 'freshtv55) = ((), _menhir_env._menhir_lexbuf.Lexing.lex_curr_p) in
    ((let _menhir_env = _menhir_discard _menhir_env in
    let _tok = _menhir_env._menhir_token in
    match _tok with
    | TForBackend ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv5) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TSemi ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv1) = Obj.magic _menhir_stack in
            ((let _menhir_env = _menhir_discard _menhir_env in
            let _tok = _menhir_env._menhir_token in
            match _tok with
            | TIdent _v ->
                _menhir_run21 _menhir_env (Obj.magic _menhir_stack) MenhirState49 _v
            | _ ->
                assert (not _menhir_env._menhir_error);
                _menhir_env._menhir_error <- true;
                _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState49) : 'freshtv2)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv3) = Obj.magic _menhir_stack in
            (raise _eRR : 'freshtv4)) : 'freshtv6)
    | TProvides ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv35) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TSemi ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv31) = Obj.magic _menhir_stack in
            ((let _menhir_env = _menhir_discard _menhir_env in
            let _tok = _menhir_env._menhir_token in
            match _tok with
            | TIdent _v ->
                let (_menhir_env : _menhir_env) = _menhir_env in
                let (_menhir_stack : ('freshtv27)) = Obj.magic _menhir_stack in
                let (_v : (
# 22 "annot_parser.mly"
      (string)
# 993 "annot_parser.ml"
                )) = _v in
                ((let _menhir_stack = (_menhir_stack, _v) in
                let _menhir_env = _menhir_discard _menhir_env in
                let _tok = _menhir_env._menhir_token in
                match _tok with
                | TA_Const ->
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv9) = Obj.magic _menhir_stack in
                    ((let _menhir_env = _menhir_discard _menhir_env in
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv7) = Obj.magic _menhir_stack in
                    ((let _1 = () in
                    let _v : 'tv_prim_annot = 
# 46 "annot_parser.mly"
             (`Pure)
# 1009 "annot_parser.ml"
                     in
                    _menhir_goto_prim_annot _menhir_env _menhir_stack _v) : 'freshtv8)) : 'freshtv10)
                | TA_Mutable ->
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv13) = Obj.magic _menhir_stack in
                    ((let _menhir_env = _menhir_discard _menhir_env in
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv11) = Obj.magic _menhir_stack in
                    ((let _1 = () in
                    let _v : 'tv_prim_annot = 
# 47 "annot_parser.mly"
               (`Mutable)
# 1022 "annot_parser.ml"
                     in
                    _menhir_goto_prim_annot _menhir_env _menhir_stack _v) : 'freshtv12)) : 'freshtv14)
                | TA_Mutator ->
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv17) = Obj.magic _menhir_stack in
                    ((let _menhir_env = _menhir_discard _menhir_env in
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv15) = Obj.magic _menhir_stack in
                    ((let _1 = () in
                    let _v : 'tv_prim_annot = 
# 48 "annot_parser.mly"
               (`Mutator)
# 1035 "annot_parser.ml"
                     in
                    _menhir_goto_prim_annot _menhir_env _menhir_stack _v) : 'freshtv16)) : 'freshtv18)
                | TA_Pure ->
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv21) = Obj.magic _menhir_stack in
                    ((let _menhir_env = _menhir_discard _menhir_env in
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv19) = Obj.magic _menhir_stack in
                    ((let _1 = () in
                    let _v : 'tv_prim_annot = 
# 45 "annot_parser.mly"
            (`Pure)
# 1048 "annot_parser.ml"
                     in
                    _menhir_goto_prim_annot _menhir_env _menhir_stack _v) : 'freshtv20)) : 'freshtv22)
                | EOF | EOL | LPARENT | TOTHER _ ->
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : 'freshtv23) = Obj.magic _menhir_stack in
                    ((let _v : 'tv_option_prim_annot_ = 
# 114 "./standard.mly"
    ( None )
# 1057 "annot_parser.ml"
                     in
                    _menhir_goto_option_prim_annot_ _menhir_env _menhir_stack _v) : 'freshtv24)
                | _ ->
                    assert (not _menhir_env._menhir_error);
                    _menhir_env._menhir_error <- true;
                    let (_menhir_env : _menhir_env) = _menhir_env in
                    let (_menhir_stack : (('freshtv25)) * (
# 22 "annot_parser.mly"
      (string)
# 1067 "annot_parser.ml"
                    )) = Obj.magic _menhir_stack in
                    (raise _eRR : 'freshtv26)) : 'freshtv28)
            | _ ->
                assert (not _menhir_env._menhir_error);
                _menhir_env._menhir_error <- true;
                let (_menhir_env : _menhir_env) = _menhir_env in
                let (_menhir_stack : ('freshtv29)) = Obj.magic _menhir_stack in
                (raise _eRR : 'freshtv30)) : 'freshtv32)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv33) = Obj.magic _menhir_stack in
            (raise _eRR : 'freshtv34)) : 'freshtv36)
    | TRequires ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv41) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TSemi ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv37) = Obj.magic _menhir_stack in
            ((let _menhir_env = _menhir_discard _menhir_env in
            let _tok = _menhir_env._menhir_token in
            match _tok with
            | TIdent _v ->
                _menhir_run21 _menhir_env (Obj.magic _menhir_stack) MenhirState20 _v
            | _ ->
                assert (not _menhir_env._menhir_error);
                _menhir_env._menhir_error <- true;
                _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState20) : 'freshtv38)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv39) = Obj.magic _menhir_stack in
            (raise _eRR : 'freshtv40)) : 'freshtv42)
    | TVersion ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv47) = Obj.magic _menhir_stack in
        ((let _menhir_env = _menhir_discard _menhir_env in
        let _tok = _menhir_env._menhir_token in
        match _tok with
        | TSemi ->
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv43) = Obj.magic _menhir_stack in
            ((let _menhir_env = _menhir_discard _menhir_env in
            let _tok = _menhir_env._menhir_token in
            match _tok with
            | EQ ->
                _menhir_run8 _menhir_env (Obj.magic _menhir_stack) MenhirState3
            | GE ->
                _menhir_run7 _menhir_env (Obj.magic _menhir_stack) MenhirState3
            | GT ->
                _menhir_run6 _menhir_env (Obj.magic _menhir_stack) MenhirState3
            | LE ->
                _menhir_run5 _menhir_env (Obj.magic _menhir_stack) MenhirState3
            | LT ->
                _menhir_run4 _menhir_env (Obj.magic _menhir_stack) MenhirState3
            | _ ->
                assert (not _menhir_env._menhir_error);
                _menhir_env._menhir_error <- true;
                _menhir_errorcase _menhir_env (Obj.magic _menhir_stack) MenhirState3) : 'freshtv44)
        | _ ->
            assert (not _menhir_env._menhir_error);
            _menhir_env._menhir_error <- true;
            let (_menhir_env : _menhir_env) = _menhir_env in
            let (_menhir_stack : 'freshtv45) = Obj.magic _menhir_stack in
            (raise _eRR : 'freshtv46)) : 'freshtv48)
    | TWeakdef ->
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv51) = Obj.magic _menhir_stack in
        ((let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv49) = Obj.magic _menhir_stack in
        ((let _1 = () in
        let _v : (
# 27 "annot_parser.mly"
      (Primitive.t)
# 1147 "annot_parser.ml"
        ) = 
# 42 "annot_parser.mly"
             ( `Weakdef None )
# 1151 "annot_parser.ml"
         in
        _menhir_goto_annot _menhir_env _menhir_stack _v) : 'freshtv50)) : 'freshtv52)
    | _ ->
        assert (not _menhir_env._menhir_error);
        _menhir_env._menhir_error <- true;
        let (_menhir_env : _menhir_env) = _menhir_env in
        let (_menhir_stack : 'freshtv53) = Obj.magic _menhir_stack in
        (raise _eRR : 'freshtv54)) : 'freshtv56))

# 269 "./standard.mly"
  

# 1164 "annot_parser.ml"
