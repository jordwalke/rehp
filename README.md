# ReHP: Compile Reason/OCaml to PHP.

`rehp` makes it easier to write new language backends for
Reason/OCaml that integrate well into existing languages.


`rehp` takes opam/esy packages that would normally compile natively, and
instead compiles them to PHP. Currently, `rehp` compiles to the
[Hack](https://hhvm.com/) variant of PHP, but we plan on outputing pure PHP5 as
well. In either case, the output is very simple and doesn't used advanced
language features.

Under the hood, `rehp` is a fork of
[js_of_ocaml](https://github.com/ocsigen/js_of_ocaml), refactored to make
supporting other language backends easier. Most of this project can be merged
upstream into `js_of_ocaml`, aside from the parts that are specific to only one
language backend. 

### Who

[jordwalke](https://twitter.com/jordwalke) and
[robbynevels](https://twitter.com/robbynevels) have contributed the commits on
top of `js_of_ocaml` (`git` blame is not representative for those commits)


## Goals:

Our first focus will remain on the PHP/Hack backend for Reason applications
until that is sufficiently stable, however we can begin sending pull requests
to `js_of_ocaml` for the earliest commits.

If many of the changes are merged (after addressing any feedback), the time
required to add additional language backends for Reason/OCaml will be cut down
dramatically (Java, VimScript).

# Features:

- Working PHP/Hack language backend for Reason/OCaml projects.
- Integrates with arbitrary language module loaders via a special template
  format that describes the style of module output, and how dependencies should
  be required.
- Compiles package dependencies (`.cma` libraries) into individual module
  outputs. `rehp` adds a feature for decomposing compiled
  libraries into individual module outputs, instead of having them be bundled
  together in the output.
- Allows writing multiple backend implementations of C stubs in one file. In
  addition to `// @Provides`, you may now also supply `// @ForBackend`.

# Try:

You can try out `rehp` on your project, by using [esy](https://esy.sh) to
directly consume this repo. Just add the following to your `package.json` and
then run `esy` from your project root as usual.

```json
"dependencies": {
  "@opam/js_of_ocaml": "*"
},
"resolutions": {
  "@opam/js_of_ocaml": "jordwalke/rehp:js_of_ocaml.opam#f65bbc",
  "@opam/js_of_ocaml-compiler": "jordwalke/rehp:js_of_ocaml-compiler.opam#f65bbc"
},
```

Then you can try the PHP compiler by doing:

```sh
FLAGS="--backend php --enable excwrap --enable wrapped-exceptions"

# Compile a library to individual php files.
esy js_of_ocaml $FLAGS someFile.cma -o someOutput.cma.php

# Compile a bytecode app to one monolithic output.
esy js_of_ocaml $FLAGS someFile.bc -o someOutput.bc.php
```

## Module Templates:

`rehp` allows you to pass strings to `--custom-header` that determine how each
individual input `.re` file is compiled into each individual output file, and
how it should pull in dependencies. The custom header param is a string
template with a mini-DSL to help you describe how to pull in each dependency,
and where to put the main compiled output for each module.

This was implemented to work with PHP module loaders, but it will work with any
language, and the example below demonstrates it with JS modules for
illustration.

For example if you had a file `js-module-template.js`, with the following
content:

```javascript
/**
 * ____CompilationUnitName
 */
var ____ForEachDependencyCompilationUnitName = require('____ForEachDependencyCompilationUnitName.js');
var runtime = require('runtime.js');

/*____CompilationOutput*/
module.exports = global.jsoo_runtime.caml_get_global_data().____CompilationUnitName;
```

Then if you passed it as a parameter to compilation:

```bash
# Read the file into a variable
$TEMPLATE="$(< ./js-module-template.js)"
esy js_of_ocaml --custom-header=$TEMPLATE Array.cmo -o Array.js
```

Then you would have a module compiled as:

```javascript
/**
 * Array
 */
var Pervasives = require('Pervasives.js');
var List = require('List.js');
var runtime = require('runtime.js');

// < Compiled output here >

module.exports = global.jsoo_runtime.caml_get_global_data().Array;
```

Each line that has a `____ForEachDependencyCompilationUnitName` is expanded
into several lines, one line for each dependency of the module, where
`____ForEachDependencyCompilationUnitName` is replaced with the capitalized
dependency name.

There are other variables that are substituted in the template:

- `____CompilationUnitName` The name of the current compilation unit,
  capitalized.
- `____compilationUnitName` The name of the current compilation unit,
  lowercased.
- `____ForEachDependencyCompilationUnitName` : Expanded into multiple lines,
  one line for dependency (capitalized).
- `____forEachDependencyCompilationUnitName` : Expanded into multiple lines,
  one line for dependency (lowercased).
- `/*____CompilationOutput*/` : Where the compilation output will be placed.


## Collaborating:

We are actively welcoming collaboration in helping with the overall design, and
implementation of this project and the changes to the `js_of_ocaml` compiler.
A quick coordination with `@jordwalke` on the [Reason
Discord](https://discord.gg/reasonml) or any other chat system will help us
make sure we aren't developing improvements redundantly.


To build this project, and collaborate, you can use opam or `esy`.  If using
`esy`, make sure `esy --version` is > `0.5.4`. Just run `esy` from the top
level directory of this project, then run `esy test` to see compiled outputs of
various tests.


# How

We introduce a new intermediate representation in the compiler called
`Rehp`(name to be changed).

**`Rehp`**: A constrained intermediate language with the purpose of targeting
higher level languages (such as PHP).

Rehp's semantics are similar to a narrow subset of JavaScript, with the
addition of special nodes that have type specific operations, externs, and
retain shapes of structures emitted by the ocaml compiler.

Currently, Rehp contains too many forms, because JavaScript stubs have to be
converted to Rehp. The This project aims to remove that architectural feature
of js_of_ocaml, so that js_of_ocaml treats hand written JavaScript stubs as raw
strings, without ever doing any analysis on them. Then we can remove many parts
of Rehp - as a result compilation will be much faster as well.

# Status:

The earliest commits are easy to upstream, and the later commits are
approaching an upstreamable state.


# Helping Out:
Here are some ways you can help out:

- Get it building locally.
- If you have a problem getting it build/tested locally, fix it and send a PR.
- If you see something that can be improved, do it.
- If you see something that can be upstreamed to `js_of_ocaml`, break it off
  into a PR to `js_of_ocaml`.
- The later commits which still need some organization are not upstreamable but
  some of them could be with your help. The code that switches between JS and
  PHP mode should be functorized or turned into Dune virtual libraries.
- If you see something you don't like, start a discussion about changing it, or
  just try changing it.

# Next Steps:

- Give back as much as possible upstream to `js_of_ocaml`.
- Treat all language stubs as raw text, performing no analysis on them (except
  arity and dependency tracking).
  - This allows us to greatly simplify the Rehp tree, trimming it down to only
    what is needed to compile bytecode to other languages, not analyze
    JavaScript source stubs.
  - Requires another solution to track arity optimizations.
    - Encode arity in function names?
- We also aim to formalize the semantics of Rehp, as well as specify language
  requirements.
  - Variable scoping.
  - Reference semantics.
  - Function arity / application.
  - And more.
- Rewrite the PHP stubs by hand. Currently, we include a compiler from JS to
  PHP just to automate writing the existing JS stubs, but this is only
  temporary.
- Have each extern stub implementation exist in its own file.
- Remove packaging / minifying features of `js_of_ocaml`, and delegate that to
  conventional tools. (This makes it easier to add new language backends). 
- Remove a lot of the code that tries to detect missing stubs. Module loaders
  and bundlers will typically do so. It adds a lot of complexity that makes it
  difficult to abstract to multiple language backends.

The approach taken in `rehp` is to simplify `js_of_ocaml` so that it can apply
to many languages. Part of that means getting `js_of_ocaml` out of the
bundling/module game and letting the output integrate better with the target
language. It also makes some steps (not enough yet) to make `js_of_ocaml` treat
stubs as raw code and not do any analysis on it (other than arity analysis for
optimization).

In order to do this, we recommend further simplifying how runtime dependencies
are pulled in, also using language modules to represent them. Currently, it is
not the case and there is one large runtime file generated.

Also, `js_of_ocaml` currently supports three modes:

1. Individual modules / libraries.
2. Monolithic compilation of bytecode executables with embedded runtime.
3. Monolithic compilation of bytecode executables without embedded runtime.

We suggest that supporting the second mode adds little benefit but adds a lot
of additional complexity to the implementation. It should likely be removed.
The third mode has some benefits over mode `1`(individual modules/library
compilation). That is, monolithic mode allows additional optimizations and
inlining. It is worth keeping monolithic compilation in general.



## Contents of the distribution
| Filename    | Description                                  |
|-----------  |----------------------------------------------|
| LICENSE     | license and copyright notice                 |
| README      | this file                                    |
| compiler/   | compiler                                     |
| examples/   | small examples                               |
| lib/        | library for interfacing with JavaScript APIs |
| ppx/        | ppx syntax extensions                        |
| runtime/    | runtime system                               |
| toplevel/   | web-based OCaml toplevel                     |
| ocamlbuild/ | ocamlbuild plugin for js_of_ocaml            |

## Thanks:

Thank you to everyone who answered questions, and has provided guidance about
the overall approach.

- [hhugo](https://github.com/hhugo)
- [vouillon](https://github.com/vouillon)
- [let-def](https://github.com/let-def)
- [vincentbalat](https://twitter.com/vincentbalat)
- [diml](https://github.com/diml)

Also, thank you to [sstur](https://github.com/sstur) whose
[js2php](https://github.com/sstur/js2php) project served as a reference for how
to bootstrap the C stubs in PHP by converting them from `js_of_ocaml`'s JS
stubs into PHP. (The longer term plan is to rewrite them by hand, using the
generated conversion as a starting point).

Also, thank you to everyone who created / improved `js_of_ocaml` over the
years.
