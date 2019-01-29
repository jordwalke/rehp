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




