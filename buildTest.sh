
if [ -z "$1" ]; then
  echo "./buildTest.sh MUST be invoked like 'esy test'"
  exit 1
fi
echo "Building test output from target directory $1"

# echo "./runtime/rehack/php/runtime.php"
# esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "$(< ./rehack_tests/templates/php-runtime-header.php)" --runtime-only --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/strings/strings.bc -o ./runtime/rehack/php/runtime.php'

# shared libraries
echo "./rehack_tests/output/runtime/runtime.js"
mkdir -p "rehack_tests/output/runtime/"
touch "rehack_tests/output/runtime/rehp-output-dir.txt"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "file:./rehack_tests/templates/common-js-runtime-header.js" --runtime-only --noinline --disable shortvar --pretty --backend js --prettiest-js "${1}"/default/rehack_tests/strings/strings.bc -o ./rehack_tests/output/runtime/runtime.js
echo "./rehack_tests/output/stdlib.cma.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/output/stdlib.cma.js/

echo "./rehack_tests/output/stdlib.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/output/stdlib.cma.php/

echo "./rehack_tests/output/Console.cma.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js $(ocamlfind query -qe console.lib)/Console.cma -o ./rehack_tests/output/Console.cma.js/

echo "./rehack_tests/output/Console.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php $(ocamlfind query -qe console.lib)/Console.cma -o ./rehack_tests/output/Console.cma.php/


echo "./rehack_tests/output/js_of_ocaml.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php  $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/output/js_of_ocaml.cma.php/

echo "./rehack_tests/output/js_of_ocaml.cma.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js --prettiest-js $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/output/js_of_ocaml.cma.js/


# Standalone static react test
# ./rehack_tests/Runner.php runtime/rehack/php/GlobalObject.php ./rehack_tests/static_react_bytecode/static-react-test.php
echo "./rehack_tests/output/static-react-test.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-exe-header.php" ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/output/static-react-test.php

# echo "./rehack_tests/hello_world/hello_world.php"
# ./buildHelloWorld.sh

# Note: You can also export *only* the runtime, via --runtime-only
echo "./rehack_tests/output/hello_world.runtimeonly.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --custom-header "file:./rehack_tests/templates/php-module-header.php" --runtime-only --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/hello_world/hello_world.bc -o ./rehack_tests/output/hello_world.runtimeonly.php

# Strings separate compilation:
# ./rehack_tests/Runner.php -I rehack_tests/stdlib/stdlib.cma.php -I rehack_tests/strings/ -I runtime/rehack/php  rehack_tests/strings/strings.cmo.module.php -r '\Rehack\Strings::get();'
echo "./rehack_tests/output/strings.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/strings.cmo -o ./rehack_tests/output/strings.cmo.module.php
# Strings standalone with runtime.
# ./rehack_tests/Runner.php runtime/rehack/php/GlobalObject.php ./rehack_tests/strings/stringsStandalone.withRuntime.php
# echo "./rehack_tests/strings/stringsStandalone.withRuntime.php"
# export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-exe-header.php)" --backend php '"${1}"'/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withRuntime.php'
# Strings standalone except the runtime.
# THIS USE CASE ISN'T THAT VALUABLE. IT RELIES ON THINGS BEING IN GLOBAL SCOPE.
# ./rehack_tests/Runner.php runtime/rehack/php/runtime.php runtime/rehack/php/GlobalObject.php  ./rehack_tests/strings/stringsStandalone.withoutRuntime.php
# echo "./rehack_tests/strings/stringsStandalone.withoutRuntime.php"
# export OCAMLRUNPARAM=b && time js_of_ocaml --no-runtime --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-exe-no-runtime-header.php)" --backend php '"${1}"'/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withoutRuntime.php'


# Random utility (checking for an underscore) compilation:
echo "./rehack_tests/output/has_one_underscore.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/has_one_underscore/.has_one_underscore.eobjs/byte/has_one_underscore.cmo -o ./rehack_tests/output/has_one_underscore.cmo.module.php

# Tests various "calls" externs.
echo "./rehack_tests/output/calls.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/calls/.Calls.objs/byte/calls.cmo -o ./rehack_tests/output/calls.cmo.module.php

# Tests various "calls" externs.
echo "./rehack_tests/output/calls.module.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/calls/.Calls.objs/byte/calls.cmo -o ./rehack_tests/output/calls.cmo.module.js

# Tests various "calls" externs.
echo "./rehack_tests/output/calls.module.with.keep.unit.names.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/calls/.Calls.objs/byte/calls.cmo -o ./rehack_tests/output/calls.cmo.module.with.keep.unit.names.js

# Tests various "calls" externs.
echo "./rehack_tests/output/calls/Calls.cma.php"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/calls/Calls.cma -o ./rehack_tests/output/calls/Calls.cma.php/
# Tests various "calls" externs.
echo "./rehack_tests/output/calls/Calls.cma.js"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/calls/Calls.cma -o ./rehack_tests/output/calls/Calls.cma.js/

# It's also possible to compile from a .cmo, which will also omit the runtime
echo "./rehack_tests/output/hello_world.cmo.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/hello_world/.hello_world.eobjs/byte/hello_world.cmo -o ./rehack_tests/output/hello_world.cmo.php
echo "./rehack_tests/output/stringHelper.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/stringHelper.cmo -o ./rehack_tests/output/stringHelper.cmo.module.php

# Custom library
# Also test hash busting.
echo "./rehack_tests/output/my-lib.cma.php"
# NODE_PATH="${PWD}/rehack_tests/my-lib/my-lib.cma.js/:${PWD}/rehack_tests/output/stdlib.cma.js:${PWD}/runtime/rehack/js/" node -e 'require("MyLib")'
export REHP_HASH_BUST="v4" && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --async-compilation-summary --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-module-header.php" "${1}"/default/rehack_tests/my-lib/MyLib.cma -o ./rehack_tests/output/my-lib.cma.php/
export REHP_HASH_BUST="v4" && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js  --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/my-lib/MyLib.cma -o ./rehack_tests/output/my-lib.cma.js/
unset REHP_HASH_BUST

# Custom library
echo "./rehack_tests/output/SeparateCompilation.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-module-header.php" "${1}"/default/rehack_tests/SeparateCompilation/SeparateCompilation.cma -o ./rehack_tests/output/SeparateCompilation.cma.php/
export OCAMLRUNPARAM=b && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js  --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/SeparateCompilation/SeparateCompilation.cma -o ./rehack_tests/output/SeparateCompilation.cma.js/

# Reproduce a current hash "bug" (not bug in correctness - unless you consume the generated php code with named fields)
echo "./rehack_tests/output/HashBugReproduce.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-module-header.php" "${1}"/default/rehack_tests/HashBugReproduce/HashBugReproduce.cma -o ./rehack_tests/output/HashBugReproduce.cma.php/
export OCAMLRUNPARAM=b && time js_of_ocaml --use-hashing --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js  --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/HashBugReproduce/HashBugReproduce.cma -o ./rehack_tests/output/HashBugReproduce.cma.js/

# Js version complete standalone
# node ./rehack_tests/strings/stringsStandalone.withRuntime.js
echo "./rehack_tests/output/stringsStandalone.withRuntime.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-exe-header.js" --backend js --prettiest-js "${1}"/default/rehack_tests/strings/strings.bc -o ./rehack_tests/output/stringsStandalone.withRuntime.js

# node -e 'global.native_log=(s)=>console.log(s); require("./rehack_tests/static_react_bytecode/static-react-test.js")'
echo "./rehack_tests/output/static-react-test.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --linkall --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js --prettiest-js --custom-header "function polymorphic_log(s) {console.log(\"c\" in s ? s.c : s);} $(< ./rehack_tests/templates/common-js-exe-header.js)"  ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/output/static-react-test.js

# JS separate compilation + require modules.
# NODE_PATH="${PWD}/rehack_tests/output/:${PWD}/rehack_tests/stdlib/stdlib.js:${PWD}/runtime/rehack/js/" node -e 'require("Strings")'
echo "./rehack_tests/output/stringHelper.js"
echo "./rehack_tests/output/strings.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/stringHelper.cmo -o ./rehack_tests/output/stringHelper.js
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/strings.cmo -o ./rehack_tests/output/strings.js

# Tests recursive functions
echo "./rehack_tests/output/recursion/Recursion-vardecl-inline.cma.php"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/recursion/Recursion.cma -o ./rehack_tests/output/recursion/Recursion-vardecl-inline.cma.php/

echo "./rehack_tests/output/recursion/Recursion-novardecl-inline.cma.php"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/recursion/Recursion.cma -o ./rehack_tests/output/recursion/Recursion-novardecl-inline.cma.php/

echo "./rehack_tests/output/recursion/Recursion-vardecl-noinline.cma.php"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --enable vardecl --noinline --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/recursion/Recursion.cma -o ./rehack_tests/output/recursion/Recursion-vardecl-noinline.cma.php/

echo "./rehack_tests/output/recursion/Recursion-novardecl-noinline.cma.php"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --noinline --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/recursion/Recursion.cma -o ./rehack_tests/output/recursion/Recursion-novardecl-noinline.cma.php/

# Tests recursive functions
echo "./rehack_tests/output/recursion/Recursion.cma.js"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/recursion/Recursion.cma -o ./rehack_tests/output/recursion/Recursion.cma.js/

# Tests mutually recursive functions
echo "./rehack_tests/output/flow_pretty_printing/MutualRecursion.cma.js"
export OCAMLRUNPARAM=b && time refmterr js_of_ocaml --enable vardecl --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --disable shortvar --pretty --flow-pretty-js --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/flow_pretty_printing/MutualRecursion.cma -o ./rehack_tests/output/flow_pretty_printing/MutualRecursion.cma.js/
