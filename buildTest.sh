
if [ -z "$1" ]; then
  echo "./buildTest.sh MUST be invoked like 'esy test'"
  exit 1
fi
echo "Building test output from target directory $1"

# echo "./runtime/rehack/php/runtime.php"
# esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "$(< ./rehack_tests/templates/php-runtime-header.php)" --runtime-only --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/strings/strings.bc -o ./runtime/rehack/php/runtime.php'


# Standalone static react test
# ./rehack_tests/Runner.php runtime/rehack/php/GlobalObject.php ./rehack_tests/static_react_bytecode/static-react-test.php
echo "./rehack_tests/static_react_bytecode/static-react-test.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-exe-header.php" ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/static_react_bytecode/static-react-test.php

# echo "./rehack_tests/hello_world/hello_world.php"
# ./buildHelloWorld.sh

# Note: You can also export *only* the runtime, via --runtime-only
echo "./rehack_tests/hello_world/hello_world.runtimeonly.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --custom-header "file:./rehack_tests/templates/php-module-header.php" --runtime-only --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/hello_world/hello_world.bc -o ./rehack_tests/hello_world/hello_world.runtimeonly.php

# Strings separate compilation:
# ./rehack_tests/Runner.php -I rehack_tests/stdlib/stdlib.cma.php -I rehack_tests/strings/ -I runtime/rehack/php  rehack_tests/strings/strings.cmo.module.php -r '\Rehack\Strings::get();'
echo "./rehack_tests/strings/strings.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/strings.cmo -o ./rehack_tests/strings/strings.cmo.module.php
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
echo "./rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/has_one_underscore/.has_one_underscore.eobjs/byte/has_one_underscore.cmo -o ./rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php

# Tests various "calls" externs.
echo "./rehack_tests/calls/calls.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/calls/.calls.eobjs/byte/calls.cmo -o ./rehack_tests/calls/calls.cmo.module.php

# Tests various "calls" externs.
echo "./rehack_tests/calls/calls.module.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js "${1}"/default/rehack_tests/calls/.calls.eobjs/byte/calls.cmo -o ./rehack_tests/calls/calls.cmo.module.js

# It's also possible to compile from a .cmo, which will also omit the runtime
echo "./rehack_tests/hello_world/hello_world.cmo.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php "${1}"/default/rehack_tests/hello_world/.hello_world.eobjs/byte/hello_world.cmo -o ./rehack_tests/hello_world/hello_world.cmo.php
echo "./rehack_tests/strings/stringHelper.cmo.module.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/stringHelper.cmo -o ./rehack_tests/strings/stringHelper.cmo.module.php

# shared libraries
echo "./rehack_tests/stdlib/stdlib.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/stdlib/stdlib.cma.php/

echo "./rehack_tests/js/js_of_ocaml.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/php-module-header.php" --backend php  $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/js/js_of_ocaml.cma.php/

echo "./rehack_tests/js/js_of_ocaml.cma.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" --backend js --prettiest-js $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/js/js_of_ocaml.cma.js/

# Custom library
echo "./rehack_tests/my-lib/my-lib.cma.php"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "file:./rehack_tests/templates/php-module-header.php" "${1}"/default/rehack_tests/my-lib/MyLib.cma -o ./rehack_tests/my-lib/my-lib.cma.php/
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js  --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/my-lib/MyLib.cma -o ./rehack_tests/my-lib/my-lib.cma.js/


echo "./runtime/rehack/php/runtime.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "file:./rehack_tests/templates/common-js-runtime-header.js" --runtime-only --noinline --disable shortvar --pretty --backend js --prettiest-js "${1}"/default/rehack_tests/strings/strings.bc -o ./runtime/rehack/js/runtime.js
echo "./rehack_tests/stdlib/stdlib.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/stdlib/stdlib.js/

# Js version complete standalone
# node ./rehack_tests/strings/stringsStandalone.withRuntime.js
echo "./rehack_tests/strings/stringsStandalone.withRuntime.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-exe-header.js" --backend js --prettiest-js "${1}"/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withRuntime.js

# node -e 'global.native_log=(s)=>console.log(s); require("./rehack_tests/static_react_bytecode/static-react-test.js")'
echo "./rehack_tests/static_react_bytecode/static-react-test.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js --prettiest-js --custom-header "function polymorphic_log(s) {console.log(\"c\" in s ? s.c : s);} $(< ./rehack_tests/templates/common-js-exe-header.js)"  ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/static_react_bytecode/static-react-test.js

# JS separate compilation + require modules.
# NODE_PATH="${PWD}/rehack_tests/strings/:${PWD}/rehack_tests/stdlib/stdlib.js:${PWD}/runtime/rehack/js/" node -e 'require("Strings")'
echo "./rehack_tests/strings/stringHelper.js"
echo "./rehack_tests/strings/strings.js"
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/stringHelper.cmo -o ./rehack_tests/strings/stringHelper.js
export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/common-js-module-header.js" "${1}"/default/rehack_tests/strings/.strings.eobjs/byte/strings.cmo -o ./rehack_tests/strings/strings.js
