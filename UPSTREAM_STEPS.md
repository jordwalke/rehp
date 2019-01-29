# Upstreaming Changes:

Here's the best order of steps to upstreaming changes.

- Send a PR to jsoo upstream to break out `Id.re` and `Loc.re` (we should
  probably convert them to `.ml` before sending the PR).

- Remove the ability for javascript.ml to contain `Id.t` in its tree.  It
  won't be needed anymore, because `Id.t` contains data from the bytecode
  extraction, which now would be entirely in `Rehp`. `javascript.ml` could
  make do with just `ident_string` in its AST. (That requires small
  changes to the js parser).
  We'll already make this change for the `php.re` AST since it's at a
  similar layer of the toolchain as `javascript.ml`.
