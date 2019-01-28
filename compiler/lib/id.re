/* Js_of_ocaml compiler
 * http://www.ocsigen.org/js_of_ocaml/
 * Copyright (C) 2010 Jérôme Vouillon
 * Laboratoire PPS - CNRS Université Paris Diderot
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, with linking exception;
 * either version 2.1 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

/* Types for identifiers. */

open Stdlib
type identifier = string;

type ident_string = {
  name: identifier,
  var: option(Code.Var.t),
};

type t =
  | S(ident_string)
  | V(Code.Var.t);

type property_name =
  | PNI(identifier)
  | PNS(string)
  | PNN(float);

let compare_ident = (t1, t2) =>
  switch (t1, t2) {
  | (V(v1), V(v2)) => Code.Var.compare(v1, v2)
  | (S({name: s1, var: v1}), S({name: s2, var: v2})) =>
    switch (String.compare(s1, s2)) {
    | 0 =>
      switch (v1, v2) {
      | (None, None) => 0
      | (None, _) => (-1)
      | (_, None) => 1
      | (Some(v1), Some(v2)) => Code.Var.compare(v1, v2)
      }
    | n => n
    }
  | (S(_), V(_)) => (-1)
  | (V(_), S(_)) => 1
  };

exception Not_an_ident;

let is_ident = {
  let l =
    Array.init(
      256,
      i => {
        let c = Char.chr(i);
        if (c >= 'a'
            && c <= 'z'
            || c >= 'A'
            && c <= 'Z'
            || c == '_'
            || c == '$') {
          1;
        } else if (c >= '0' && c <= '9') {
          2;
        } else {
          0;
        };
      },
    );
  s =>
    !StringSet.mem(s, Reserved.keyword)
    && (
      try (
        {
          for (i in 0 to String.length(s) - 1) {
            let code = l[(Char.code(s.[i]))];
            if (i == 0) {
              if (code != 1) {
                raise(Not_an_ident);
              };
            } else if (code < 1) {
              raise(Not_an_ident);
            };
          };
          true;
        }
      ) {
      | Not_an_ident => false
      }
    );
};

module IdentSet =
  Set.Make({
    type nonrec t = t;
    let compare = compare_ident;
  });
module IdentMap =
  Map.Make({
    type nonrec t = t;
    let compare = compare_ident;
  });

let string_of_number = v =>
  if (v == infinity) {
    "Infinity";
  } else if (v == neg_infinity) {
    "-Infinity";
  } else if (v != v) {
    "NaN";
  } else if
    /* [1/-0] = -inf seems to be the only way to detect -0 in JavaScript */
    (v == 0. && 1. /. v == neg_infinity) {
    "-0";
  } else {
    let vint = int_of_float(v);
    /* compiler 1000 into 1e3 */
    if (float_of_int(vint) == v) {
      let rec div = (n, i) =>
        if (n != 0 && n mod 10 == 0) {
          div(n / 10, succ(i));
        } else if (i > 2) {
          Printf.sprintf("%de%d", n, i);
        } else {
          string_of_int(vint);
        };
      div(vint, 0);
    } else {
      let s1 = Printf.sprintf("%.12g", v);
      if (v == float_of_string(s1)) {
        s1;
      } else {
        let s2 = Printf.sprintf("%.15g", v);
        if (v == float_of_string(s2)) {
          s2;
        } else {
          Printf.sprintf("%.18g", v);
        };
      };
    };
  };
