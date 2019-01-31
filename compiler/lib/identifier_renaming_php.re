/**
 * This will evolve into a true ReHP->PHP mapper which takes in a ReHP AST and
 * produces the PHP AST as the output. In the process, it should take on the
 * lexical scope tracking/conversion that is currently done in
 * rehp_mapper_free.
 */

let super = Rehp_mapper.create();

let exprOrUndef = (f, o) =>
  switch (o) {
  | None => Rehp.EVar(S({name: "undefined", var: None}))
  | Some(e) => f(e)
  };

/*
 *                   Driver summary:
 *                (from Php standpoint)
 *
 * Parse_bytecode(text->byte)          Parse_js(text->Js)
 *            |                               |
 *    Generate(byte->Rehp)                    |
 *            |                               |
 *            |                               |
 *            |                               |
 *            |                        Rehp_from_javascript(Js->Rehp)
 *            |                         /
 *            |                        /
 *            |                       /
 *            |                      /
 *            |                     v
 *            v
 *         Identifier_renaming_php(Rehp->Rehp)
 *                     |
 *                     |
 *                     v
 *            Driver.augmentWithLinkInfo
 *                     |
 *                     ...
 *                     |
 *                     v
 *               Driver.coloring(Rehp->Rehp)
 *                     |
 *                     |
 *                     v
 *             Php_from_rehp(Rehp->Rehp)
 *
 *
 *
 * This process "prepares" Rehp for transformation into PHP.  Why not just
 * perform that preparation during the transform to PHP? Because some of the
 * transformation has to be done before lexical analysis/linking is performed.
 * See the diagram above.
 * The linker needs to know what is in scope/free to determine what to link in.
 * This preparation phase turns all of the special Rehp AST nodes into "user
 * space" function calls when possible. That means that Php_from_rehp only has
 * to deal with a more limited subset of Rehp that corresponds to ordinary
 * identifiers / scope.
 * Anything that manipulates terms and analyzes scope should probably be done
 * after coloring because coloring adds functions. That's why Php_from_rehp
 * also does some lexical scope analysis/transformations.
 */
let mapper = {
  ...super,
  expression: (self, x) =>
    switch (x) {
    | EBin(Lsr, e1, e2) =>
      ECall(
        EVar(S({name: "unsigned_right_shift_32", var: None})),
        [self.expression(self, e1), self.expression(self, e2)],
        N,
      )

    | EBin(Lsl, e1, e2) =>
      ECall(
        EVar(S({name: "left_shift_32", var: None})),
        [self.expression(self, e1), self.expression(self, e2)],
        N,
      )
    | EArityTest(e) =>
      ECall(
        EVar(S({name: "caml_arity_test", var: None})),
        [self.expression(self, e)],
        N,
      )
    | EUn(IsInt, e) =>
      Rehp.(ECall(EVar(Id.S({name: "is_int", var: None})), [e], Loc.N))
    | EBin(Asr, e1, e2) =>
      ECall(
        EVar(S({name: "right_shift_32", var: None})),
        [self.expression(self, e1), self.expression(self, e2)],
        N,
      )
    | EArr(l) =>
      ECall(
        EVar(S({name: "ArrayLiteral", var: None})),
        List.map(exprOrUndef(self.expression(self)), l),
        Loc.N,
      )
    /*
     * TODO: Only perform this preparation for code that was compiled from JS
     * stubs. No code compiled from ocaml bytecode should be emitting Regexes.
     */
    | ERegexp(s, opt) =>
      let boxedString = self.expression(self, EStr(s, `Utf8));
      Rehp.ECall(
        EDot(EVar(S({name: "Regex", var: None})), "jsNew"),
        switch (opt) {
        | None => [boxedString]
        | Some(optS) => [
            boxedString,
            self.expression(self, EStr(optS, `Utf8)),
          ]
        },
        N,
      );

    /* CONVERT REGEXES TO ENEW HERE. */

    /* ALSO MOVE THE CONVERSION FROM ENEW TO X->jsNew here too */

    | _ => super.expression(self, x)
    },
};
