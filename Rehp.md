# Rehp

## Constraints:
- Variables must be defined before use, with the one exception of named
  functions recursive functions. ("before" meaning in the file position).
- Variables can be defined once per function scope. (They may be updated after
- that)
- Functions must always be assigned a name either as a function statement or
  via:
  - Todo: Consider removing ability for anonymous functions to have names.

    var functionName = function() { };

- It should not be relied upon to give a function _expression_ a name:

    var x = function functionMame() { };


## Temporary Limitations:

Rehp intermediate representation assumes that EFun's identifier (which is
almost always omitted in practice) may only be available to the function body's
scope - not containing scope. There isn't a straightforward way to represent
that in Php. It should be delegated to stubs, and we can remove the ability for
Efun to have identifiiers.





## Rehp Semantics
The following are assumptions made by the generation from `code.ml` into
`Rehp.re`, as well as optimizations that take place in `js_simpl.ml`:

`Not(EInt(0))` evaluates to `EBool(true)`.
`Not(EInt(1))` evaluates to `EBool(false)`.

And therefore:

`Not(Not(EInt(0)))` evaluates to `EBool(false)`.
`Not(Not(EInt(1)))` evaluates to `EBool(true)`.
