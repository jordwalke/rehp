/**
 * Maps from Rehp to Rehp. By default, does nothing to the tree, but can be
 * extended to customize a tree transform selectively.
 */;

type t = {
  expression: ('self, Rehp.expression) => Rehp.expression,
  switchCase: ('self, Rehp.expression) => Rehp.expression,
  initialiser: ('self, (Rehp.expression, Loc.t)) => (Rehp.expression, Loc.t),
  statement: ('self, Rehp.statement) => Rehp.statement,
  statements: ('self, Rehp.statement_list) => Rehp.statement_list,
  source: ('self, Rehp.source_element) => Rehp.source_element,
  sources: ('self, Rehp.source_elements) => Rehp.source_elements,
  ident: ('self, Id.t) => Id.t,
  program: ('self, Rehp.program) => Rehp.program,
}
constraint 'self = t;

let optMap = (f, x) =>
  switch (x) {
  | None => None
  | Some(data) =>
    let mapped = f(data);
    Some(mapped);
  };

let mapFrom = (i: int, iRes, mapper, lst) => {
  let rec mapFrom_ = (iCur, lst) =>
    switch (lst) {
    | [] => []
    | [hd, ...tl] =>
      let tlRes = mapFrom_(iCur + 1, tl);
      iCur === i ?
        [iRes, ...tlRes] :
        iCur < i ? [hd, ...tlRes] : [mapper(hd), ...tlRes];
    };
  mapFrom_(0, lst);
};

/**
 * Maps but conserves memory if no changes occur.
 */
let listMapConserve = (mapper, origList) => {
  let rec map_ = (i, lst) =>
    switch (lst) {
    /* Never found a single difference. */
    | [] => origList
    | [hd, ...tl] =>
      let hdOut = mapper(hd);
      /* No difference in output */
      if (hdOut === hd) {
        map_(i + 1, tl);
      } else {
        mapFrom(i, hdOut, mapper, origList);
      };
    };
  map_(0, origList);
};

/*
 * TODO: use physical equality to minimize allocations when mappings produce
 * no changes.
 *
 * Requirement: the joiner must be uphold the following:
 * joiner(empty, empty) === empty
 * joiner(empty, x) === x
 */
let wrapInStruct = lst => Rehp.EStruct(lst);

/**
   * Instead of List.map, write custom folder avoiding final List.rev if no
   * change.  Fairly ugly, but intended to be performance focused. Does not
   * allocate intermediate closures etc.
   * Can only be used when no change in `remaining` implies the entire mapping
   * may return `origE`.
   */
let rec foldExprs = (sawChange, curMappedRev, self, origE, wrapRes, remaining) =>
  switch (remaining) {
  | [] => !sawChange ? origE : wrapRes(List.rev(curMappedRev))
  | [hd, ...tl] =>
    let mapped = self.expression(self, hd);
    let changed = mapped !== hd;
    foldExprs(
      sawChange || changed,
      [mapped, ...curMappedRev],
      self,
      origE,
      wrapRes,
      tl,
    );
  };
let create = () => {
  ident: (_self, i) => i,
  statements: (self, l) => {
    let forEach = ((s, pc)) => {
      let sMapped = self.statement(self, s);
      (sMapped, pc);
    };
    List.map(forEach, l);
  },
  statement: (self, x) =>
    switch (x) {
    | Block(b) =>
      let mapped_statements = self.statements(self, b);
      Block(mapped_statements);
    | Raw_statement(p, r, s) => Raw_statement(p, r, s)
    | Variable_statement(l) =>
      let forEach = ((id, eo)) => {
        let identMapped = self.ident(self, id);
        let initMapped = optMap(self.initialiser(self), eo);
        (identMapped, initMapped);
      };
      Variable_statement(List.map(forEach, l));
    | Empty_statement => Empty_statement
    | Debugger_statement => Debugger_statement
    | Expression_statement(e) =>
      let mapped = self.expression(self, e);
      /*
       * Example of allocation optimization:
       */
      if (mapped === e) {
        x;
      } else {
        Expression_statement(mapped);
      };
    | If_statement(e, s, sopt) =>
      let statementLocation = ((statement, loc)) => {
        let mapped = self.statement(self, statement);
        (mapped, loc);
      };
      let exprMapped = self.expression(self, e);
      let ifMapped = statementLocation(s);
      let soptMapped = optMap(statementLocation, sopt);
      If_statement(exprMapped, ifMapped, soptMapped);
    | Do_while_statement((s, loc), e) =>
      let sMapped = self.statement(self, s);
      let eMapped = self.expression(self, e);
      Do_while_statement((sMapped, loc), eMapped);
    | While_statement(e, (s, loc)) =>
      let sMapped = self.statement(self, s);
      let eMapped = self.expression(self, e);
      While_statement(eMapped, (sMapped, loc));
    | For_statement(e1, e2, e3, (s, loc)) =>
      let e1Mapped =
        switch (e1) {
        | Stdlib.Left(x) =>
          let xMapped = optMap(self.expression(self), x);
          Stdlib.Left(xMapped);
        | Right(l) =>
          let forEach = ((id, eo)) => {
            let identMapped = self.ident(self, id);
            let initMapped = optMap(self.initialiser(self), eo);
            (identMapped, initMapped);
          };
          Right(List.map(forEach, l));
        };
      let e2Mapped = optMap(self.expression(self), e2);
      let e3Mapped = optMap(self.expression(self), e3);
      let sMapped = self.statement(self, s);
      For_statement(e1Mapped, e2Mapped, e3Mapped, (sMapped, loc));
    | ForIn_statement(e1, e2, (s, loc)) =>
      let e1Mapped =
        switch (e1) {
        | Left(e) =>
          let eMapped = self.expression(self, e);
          Stdlib.Left(eMapped);
        | Right((id, e)) =>
          let identMapped = self.ident(self, id);
          let initMapped = optMap(self.initialiser(self), e);
          Right((identMapped, initMapped));
        };
      let e2Mapped = self.expression(self, e2);
      let sMapped = self.statement(self, s);
      ForIn_statement(e1Mapped, e2Mapped, (sMapped, loc));
    | Continue_statement(s) => Continue_statement(s)
    | Break_statement(s) => Break_statement(s)
    | Return_statement(e) =>
      let eMapped = optMap(self.expression(self), e);
      Return_statement(eMapped);
    | Labelled_statement(l, (s, loc)) =>
      let stMapped = self.statement(self, s);
      Labelled_statement(l, (stMapped, loc));
    | Throw_statement(e) =>
      let eMapped = self.expression(self, e);
      Throw_statement(eMapped);
    | Switch_statement(e, l, def, l') =>
      let eMapped = self.expression(self, e);
      let dMapped = optMap(self.statements(self), def);
      let forEach = ((e, s)) => {
        let eMapped = self.switchCase(self, e);
        let stmMapped = self.statements(self, s);
        (eMapped, stmMapped);
      };
      let lMapped = List.map(forEach, l);
      let forEach = ((e, s)) => {
        let eMapped = self.switchCase(self, e);
        let stmMapped = self.statements(self, s);
        (eMapped, stmMapped);
      };
      let l'Mapped = List.map(forEach, l');
      Switch_statement(eMapped, lMapped, dMapped, l'Mapped);
    | Try_statement(b, catch, final) =>
      let identAndStatements = ((ident, st)) => {
        let identMapped = self.ident(self, ident);
        let stMapped = self.statements(self, st);
        (identMapped, stMapped);
      };
      let bMapped = self.statements(self, b);
      let catchMapped = optMap(identAndStatements, catch);
      let finalMapped = optMap(self.statements(self), final);
      Try_statement(bMapped, catchMapped, finalMapped);
    },
  switchCase: (self, e) => self.expression(self, e),
  expression: (self, x) =>
    Rehp.(
      switch (x) {
      | ERaw(s) => x
      | ESeq(e1, e2) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        /* Optimized allocation */
        e1Mapped === e1 && e2Mapped === e2 ?
          x : Rehp.ESeq(e1Mapped, e2Mapped);
      | ECond(e1, e2, e3) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        let e3Mapped = self.expression(self, e3);
        /* Optimized allocation */
        e1Mapped === e1 && e2Mapped === e2 && e3Mapped === e3 ?
          x : ECond(e1Mapped, e2Mapped, e3Mapped);
      | EBin(b, e1, e2) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        /* Optimized allocation */
        e1Mapped === e1 && e2Mapped === e2 ?
          x : Rehp.EBin(b, e1Mapped, e2Mapped);
      | EUn(b, e1) =>
        let e1Mapped = self.expression(self, e1);
        /* Optimized allocation */
        e1Mapped === e1 ? x : EUn(b, e1Mapped);
      | ECall(e1, e2, loc) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mappeds = List.map(self.expression(self), e2);
        ECall(e1Mapped, e2Mappeds, loc);
      | ECopy(e1, loc) =>
        let e1Mapped = self.expression(self, e1);
        ECopy(e1Mapped, loc);
      | EAccess(e1, e2) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        EAccess(e1Mapped, e2Mapped);
      | EStructAccess(e1, e2) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        /* Optimized allocation */
        e1Mapped === e1 && e2Mapped === e2 ?
          x : EStructAccess(e1Mapped, e2Mapped);
      | EArrAccess(e1, e2) =>
        let e1Mapped = self.expression(self, e1);
        let e2Mapped = self.expression(self, e2);
        e1Mapped === e1 && e2Mapped === e2 ?
          x : EArrAccess(e1Mapped, e2Mapped);
      | EDot(e1, id) =>
        let e1Mapped = self.expression(self, e1);
        /* Optimized allocation */
        e1Mapped === e1 ? x : EDot(e1Mapped, id);
      | ENew(e1, Some(args)) =>
        let e1Mapped = self.expression(self, e1);
        let argsMappeds = List.map(self.expression(self), args);
        ENew(e1Mapped, Some(argsMappeds));
      | ENew(e1, None) =>
        let e1Mapped = self.expression(self, e1);
        /* Optimized allocation */
        e1Mapped === e1 ? x : ENew(e1Mapped, None);
      | EVar(v) =>
        let eMapped = self.ident(self, v);
        /* Optimized allocation */
        eMapped === v ? x : EVar(eMapped);
      | EFun((idopt, params, body, nid)) =>
        let identMapped = optMap(self.ident(self), idopt);
        let paramsMappeds = List.map(self.ident(self), params);
        let sourcesMapped = self.sources(self, body);
        EFun((identMapped, paramsMappeds, sourcesMapped, nid));
      | EArityTest(e1) =>
        let e1Mapped = self.expression(self, e1);
        EArityTest(e1Mapped);
      | EVectlength(e) => EVectlength(self.expression(self, e))
      | EArrLen(e) => EArrLen(self.expression(self, e))
      | EStruct(l) => foldExprs(false, [], self, x, wrapInStruct, l)
      | ETag(i, l) =>
        let iMapped = self.expression(self, i);
        let mappeds = List.map(self.expression(self), l);
        ETag(iMapped, mappeds);
      | EArr(l) => EArr(List.map(optMap(self.expression(self)), l))
      | EObj(l) =>
        let mappeds =
          List.map(
            ((i, e)) => {
              let mapped = self.expression(self, e);
              (i, mapped);
            },
            l,
          );
        EObj(mappeds);
      | EStr(_) as x
      | EBool(_) as x
      | ENum(_) as x
      | EQuote(_) as x
      | ERegexp(_) as x => x
      }
    ),
  initialiser: (self, (e, pc)) => {
    let m = self.expression(self, e);
    (m, pc);
  },
  /* TODO: The free vars should also be mapped over. But if you wait to add
     them until the end, that isn't required. */
  source: self =>
    fun
    | Statement(s) => {
        let mapped = self.statement(self, s);
        Rehp.Statement(mapped);
      }
    | Function_declaration((id, params, body, nid)) => {
        let paramsMappeds = List.map(self.ident(self), params);
        let identMapped = self.ident(self, id);
        let sourcesMapped = self.sources(self, body);
        Function_declaration((
          identMapped,
          paramsMappeds,
          sourcesMapped,
          nid,
        ));
      },
  sources: (self, x) => {
    let forEach = ((s, loc)) => (self.source(self, s), loc);
    List.map(forEach, x);
  },
  program: (self, x) => self.sources(self, x),
};
