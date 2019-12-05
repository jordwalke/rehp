open Format;
open Rehp;

let (>>) = (g, f, x) => g(f(x));

module Sexp = {
  type t =
    | Atom(string)
    | Expression(list(t));

  let createAtom = a => Atom(a);

  let createExpression = l => Expression(l);

  let rec pp = ff =>
    fun
    | Atom(a) => Format.fprintf(ff, "%s", a)
    | Expression(l) => {
        let formatBody =
          Format.pp_print_list(pp, ~pp_sep=(ff, _) =>
            Format.fprintf(ff, "@;")
          );
        Format.fprintf(ff, "@[<hv 4>(%a)@]", formatBody, l);
      };
};

let todo = n => Sexp.createExpression([Sexp.createAtom(n ++ ": todo")]);
module Handler = {
  let rec id =
    fun
    | Id.S({Id.name: n, _}) => Sexp.createAtom(n)
    | Id.V(v) => v |> Code.Var.to_string |> Sexp.createAtom
  and idIdentifier = x => Sexp.createAtom(x)
  and idPropertyName =
    Id.(
      fun
      | PNI(idx) => idIdentifier(idx)
      | PNS(s) => Sexp.createAtom(s)
      | PNN(f) => f |> string_of_float |> Sexp.createAtom
    )
  and arrayLiteral = al =>
    al
    |> List.map(x =>
         switch (x) {
         | Some(x) => expression(x)
         | None => Sexp.createAtom("none-expression")
         }
       )
    |> Sexp.createExpression
  and functionBody = x => sourceElements(x)
  and block = x =>
    x |> List.map(((st, _loc)) => statement(st)) |> Sexp.createExpression
  and formalParameterList = x => Sexp.createExpression(List.map(id, x))
  and binop = x =>
    Sexp.createAtom(
      switch (x) {
      | Eq => "Eq"
      | StarEq => "stareq"
      | SlashEq => "slasheq"
      | ModEq => "modeq"
      | PlusEq => "pluseq"
      | MinusEq => "minuseq"
      /* TODO: BandEq/BxorEq/BorEq is not ever generated by the compiler */
      | BandEq => "bandeq"
      | BxorEq => "bxoreq"
      | BorEq => "boreq"
      | Or => "or"
      | And => "band"
      | Bor => "bor"
      | Bxor => "bxor"
      | Band => "band"
      | EqEq => "=="
      | NotEq => "!="
      | EqEqEq => "==="
      | NotEqEq => "!=="
      | Lt => "<"
      | Le => "<="
      | Gt => ">"
      | Ge => ">="
      /* TODO: Can delete this from Rehp when JS is never converted to Rehp */
      | InstanceOf => "instanceof"
      /* TODO: Can delete this from Rehp when JS is never converted to Rehp */
      | In => "in"
      /* JS equivalent of Lsl is << (Left Shift Operator) */
      | Lsl => "lsl"
      /* JS equivalent of Lsr is >>> (The Unsigned Right Shift Operator) */
      | Lsr => "lsr"
      /* JS equivalent of Asr is >> (Signed Right Shift Operator) */
      | Asr => "asr"
      | FloatPlus => "+."
      | IntPlus => "+"
      | Plus => "+"
      | Minus => "-"
      | Mul => "*"
      | Div => "/"
      | Mod => "mod"
      },
    )
  and unop = x =>
    Sexp.createAtom(
      switch (x) {
      | Not => "not"
      | Neg => "neg"
      | Pl => "pl"
      | Typeof => "typeof"
      | IsInt => "isint"
      | ToInt => "toint"
      | Void => "void"
      | Delete => "delete"
      | Bnot => "bnot"
      | IncrA => "incra"
      | DecrA => "decra"
      | IncrB => "incrb"
      | DecrB => "decrb"
      },
    )
  and arguments = x => Sexp.createExpression(x |> List.map(expression))
  and functionExpression = ((idx, params, fb, _loc: Loc.t)) =>
    Sexp.createExpression(
      (
        switch (idx) {
        | Some(idx) => [id(idx)]
        | None => []
        }
      )
      @ [formalParameterList(params), functionBody(fb)],
    )
  and expression =
    fun
    | ERaw(x) =>
      Sexp.createExpression([Sexp.createAtom("%raw"), Sexp.createAtom(x)])
    | ESeq(e1, e2) => todo("eseq")
    | ECond(cond, b1, b2) =>
      Sexp.createExpression([
        Sexp.createAtom("if"),
        Sexp.createExpression([expression(cond)]),
        Sexp.createExpression([expression(b1)]),
        Sexp.createExpression([expression(b2)]),
      ])
    | EBin(op, e1, e2) =>
      Sexp.createExpression([binop(op), expression(e1), expression(e2)])
    | EUn(op, e) => Sexp.createExpression([unop(op), expression(e)])
    | ECall(e, args, _loc) =>
      Sexp.createExpression([Sexp.createAtom("call"), arguments(args)])
    | ECopy(e, _loc) =>
      Sexp.createExpression([Sexp.createAtom("copy"), expression(e)])
    | EVar(x) => Sexp.createExpression([Sexp.createAtom("var"), id(x)])
    | EFun(x) =>
      Sexp.createExpression([
        Sexp.createAtom("funexpr"),
        functionExpression(x),
      ])
    | EArityTest(x) =>
      Sexp.createExpression([Sexp.createAtom("arityTest"), expression(x)])
    | EStr(s, _encoding) => Sexp.createAtom(s)
    | EVectlength(e) =>
      Sexp.createExpression([
        Sexp.createAtom("vector-length"),
        expression(e),
      ])
    | EArrLen(x) =>
      Sexp.createExpression([Sexp.createAtom("arr-len"), expression(x)])
    | EArr(x) => arrayLiteral(x)
    | EStructAccess(e1, e2) =>
      Sexp.createExpression([
        Sexp.createAtom("struct-access"),
        expression(e1),
        expression(e2),
      ])
    | EStruct(args) => arguments(args)
    | ETag(e, args) =>
      Sexp.createExpression([
        Sexp.createAtom("etag"),
        expression(e),
        arguments(args),
      ])
    | EDot(e, idxIdentifier) =>
      Sexp.createExpression([
        Sexp.createAtom("dot"),
        expression(e),
        idIdentifier(idxIdentifier),
      ])
    | EAccess(e1, e2) =>
      Sexp.createExpression([
        Sexp.createAtom("access"),
        expression(e1),
        expression(e2),
      ])
    | ENew(e, argsOpt) =>
      Sexp.createExpression(
        [Sexp.createAtom("new"), expression(e)]
        @ (
          switch (argsOpt) {
          | Some(args) => [arguments(args)]
          | None => []
          }
        ),
      )
    | EObj(pv) =>
      Sexp.(
        createExpression([createAtom("obj"), propertyNameAndValueList(pv)])
      )
    | EArrAccess(e1, e2) =>
      Sexp.createExpression([
        Sexp.createAtom("arr-access"),
        expression(e1),
        expression(e2),
      ])
    | EBool(b) => Sexp.createAtom(string_of_bool(b))
    | EFloat(f) => Sexp.createAtom(string_of_float(f))
    | EInt(i) => Sexp.createAtom(string_of_int(i))
    | EQuote(s) =>
      Sexp.createExpression([Sexp.createAtom("quote"), Sexp.createAtom(s)])
    | ERegexp(s1, s2Opt) =>
      Sexp.createExpression(
        [Sexp.createAtom("regexp"), Sexp.createAtom(s1)]
        @ (
          switch (s2Opt) {
          | Some(s2) => [Sexp.createAtom(s2)]
          | None => []
          }
        ),
      )
  and propertyNameAndValueList = pvl =>
    Sexp.(
      createExpression(
        List.map(
          pv => {
            let (propName, e) = pv;
            createExpression([idPropertyName(propName), expression(e)]);
          },
          pvl,
        ),
      )
    )
  and initialiser = x => {
    let (expressionx, _) = x;
    expression(expressionx);
  }
  and variableStatement = x => {
    let (idx, initialiserx) = x;
    Sexp.createExpression(
      [id(idx)]
      @ (
        switch (initialiserx) {
        | Some(x) => [Sexp.createAtom("="), initialiser(x)]
        | None => []
        }
      ),
    );
  }
  and variableDeclaration = ((idx, initOpt)) => {
    Sexp.createExpression(
      [Sexp.createAtom("let"), id(idx)]
      @ (
        switch (initOpt) {
        | Some(x) => [initialiser(x)]
        | None => []
        }
      ),
    );
  }
  and statement =
    fun
    | Block(b) => block(b)
    | Raw_statement(_) => todo("Raw_statement")
    | Variable_statement(vs) =>
      Sexp.createExpression(List.map(variableStatement, vs))
    | Empty_statement => Sexp.createAtom("empty")
    | Expression_statement(e) => expression(e)
    | If_statement(e, (s, _loc), sOpt) => {
        Sexp.createExpression(
          [Sexp.createAtom("if"), expression(e), statement(s)]
          @ (
            switch (sOpt) {
            | Some((x, _loc)) => [statement(x)]
            | None => []
            }
          ),
        );
      }
    | Do_while_statement((s, _loc), e) =>
      Sexp.createExpression([Sexp.createAtom("do-while"), expression(e)])
    | While_statement(e, (s, _loc)) =>
      Sexp.createExpression([Sexp.createAtom("while"), expression(e)])
    | For_statement(init, limit, incr, (s, _loc), iOpt) =>
      Sexp.createExpression(
        [Sexp.createAtom("for")]
        @ (
          switch (init) {
          | Left(eOpt) =>
            switch (eOpt) {
            | Some(e) => [expression(e)]
            | None => []
            }
          | Right(lv) => [
              Sexp.createExpression(List.map(variableDeclaration, lv)),
            ]
          }
        )
        @ (
          switch (limit) {
          | Some(x) => [expression(x)]
          | None => []
          }
        )
        @ (
          switch (incr) {
          | Some(x) => [expression(x)]
          | None => []
          }
        )
        @ [statement(s)]
        @ (
          switch (iOpt) {
          | Some(x) => [Sexp.createAtom(string_of_int(x))]
          | None => []
          }
        ),
      )
    | ForIn_statement(expOrVarDecl, e, (s, _loc)) =>
      Sexp.createExpression(
        [Sexp.createAtom("for-in")]
        @ (
          switch (expOrVarDecl) {
          | Left(e) => [expression(e)]
          | Right(vd) => [variableDeclaration(vd)]
          }
        )
        @ [expression(e), statement(s)],
      )
    | Continue_statement(labelOpt, iOpt) =>
      Sexp.createExpression(
        (
          switch (labelOpt) {
          | Some(label) => [
              Sexp.createAtom(Javascript.Label.to_string(label)),
            ]
          | None => []
          }
        )
        @ (
          switch (iOpt) {
          | Some(i) => [Sexp.createAtom(string_of_int(i))]
          | None => []
          }
        ),
      )
    | Break_statement(labelOpt) =>
      Sexp.createExpression(
        [Sexp.createAtom("break")]
        @ (
          switch (labelOpt) {
          | Some(label) => [
              Sexp.createAtom(Javascript.Label.to_string(label)),
            ]
          | None => []
          }
        ),
      )
    | Return_statement(eOpt) =>
      Sexp.createExpression(
        [Sexp.createAtom("return")]
        @ (
          switch (eOpt) {
          | Some(e) => [expression(e)]
          | None => []
          }
        ),
      )
    | Labelled_statement(label, (s, _loc)) =>
      Sexp.createExpression([
        Sexp.createAtom(Javascript.Label.to_string(label)),
        statement(s),
      ])
    | Switch_statement(e, caseClauses1, statementsOpt, caseClauses2) => {
        Sexp.createExpression(
          [
            Sexp.createAtom("switch"),
            Sexp.createExpression(List.map(caseClause, caseClauses1)),
          ]
          @ (
            switch (statementsOpt) {
            | Some(sl) => [statements(sl)]
            | None => []
            }
          )
          @ [Sexp.createExpression(List.map(caseClause, caseClauses2))],
        );
      }
    | Throw_statement(e) =>
      Sexp.createExpression([Sexp.createAtom("throw"), expression(e)])
    | Try_statement(b, idBlockOpt, blockOpt) =>
      Sexp.(
        createExpression(
          [createAtom("try"), block(b)]
          @ (
            switch (idBlockOpt) {
            | None => []
            | Some((idx, bOpt)) => [
                Sexp.createExpression([id(idx), block(b)]),
              ]
            }
          )
          @ (
            switch (blockOpt) {
            | None => []
            | Some(x) => [block(x)]
            }
          ),
        )
      )
    | Debugger_statement => Sexp.createAtom("debug")

  and statements = sl =>
    Sexp.createExpression(List.map(((s, _loc)) => statement(s), sl))
  and caseClause = ((e, sl)) => {
    Sexp.createExpression([expression(e), statements(sl)]);
  }
  and functionDeclaration = ((idx, formalParameters, fBody, _loc)) => {
    Sexp.createExpression([
      Sexp.createAtom("defun"),
      id(idx),
      formalParameters |> List.map(id) |> Sexp.createExpression,
      fBody |> functionBody,
    ]);
  }
  and sourceElement =
    fun
    | Statement(s) => statement(s)
    | Function_declaration(fd) => {
        functionDeclaration(fd);
      }
  and sourceElements = x =>
    x |> List.map(((x, _loc)) => sourceElement(x)) |> Sexp.createExpression
  and program = x =>
    Sexp.createExpression([Sexp.createAtom("program"), sourceElements(x)]);
};

let toSexp = Handler.program;

let program' = Sexp.pp(Format.std_formatter) >> Handler.program;
let program = (_f, ~custom_header=?, ~source_map=?, p) => {
  program'(p);
};
