echo "./runtime/rehack/php/runtime.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "$(< ./rehack_tests/templates/php-runtime-header.php)" --runtime-only --noinline --disable shortvar --pretty --backend php ./_build/default/rehack_tests/strings/strings.bc -o ./runtime/rehack/php/runtime.php'


# Standalone static react test
# ./rehack_tests/Runner.php runtime/rehack/php/GlobalObject.php ./rehack_tests/static_react_bytecode/static-react-test.php
echo "./rehack_tests/static_react_bytecode/static-react-test.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php --custom-header "$(< ./rehack_tests/templates/php-exe-header.php)" ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/static_react_bytecode/static-react-test.php'

echo "./rehack_tests/hello_world/hello_world.php"
./buildHelloWorld.sh

# Note: You can also export *only* the runtime, via --runtime-only
echo "./rehack_tests/hello_world/hello_world.runtimeonly.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --runtime-only --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php ./_build/default/rehack_tests/hello_world/hello_world.bc -o ./rehack_tests/hello_world/hello_world.runtimeonly.php'

# Strings separate compilation:
# ./rehack_tests/Runner.php -I rehack_tests/stdlib/stdlib.cma.php -I rehack_tests/strings/ -I runtime/rehack/php  rehack_tests/strings/strings.cmo.module.php -r '\Rehack\Strings::get();'
echo "./rehack_tests/strings/strings.cmo.module.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --backend php ./_build/default/rehack_tests/strings/.strings.eobjs/strings.cmo -o ./rehack_tests/strings/strings.cmo.module.php'
# Strings standalone with runtime.
# ./rehack_tests/Runner.php runtime/rehack/php/GlobalObject.php ./rehack_tests/strings/stringsStandalone.withRuntime.php
echo "./rehack_tests/strings/stringsStandalone.withRuntime.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-exe-header.php)" --backend php ./_build/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withRuntime.php'
# Strings standalone except the runtime.
# THIS USE CASE ISN'T THAT VALUABLE. IT RELIES ON THINGS BEING IN GLOBAL SCOPE.
# ./rehack_tests/Runner.php runtime/rehack/php/runtime.php runtime/rehack/php/GlobalObject.php  ./rehack_tests/strings/stringsStandalone.withoutRuntime.php
# echo "./rehack_tests/strings/stringsStandalone.withoutRuntime.php"
# esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --no-runtime --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-exe-no-runtime-header.php)" --backend php ./_build/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withoutRuntime.php'


# Random utility (checking for an underscore) compilation:
echo "./rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --backend php ./_build/default/rehack_tests/has_one_underscore/.has_one_underscore.eobjs/has_one_underscore.cmo -o ./rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php'

# It's also possible to compile from a .cmo, which will also omit the runtime
echo "./rehack_tests/hello_world/hello_world.cmo.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend php ./_build/default/rehack_tests/hello_world/.hello_world.eobjs/hello_world.cmo -o ./rehack_tests/hello_world/hello_world.cmo.php'
echo "./rehack_tests/strings/stringHelper.cmo.module.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --backend php ./_build/default/rehack_tests/strings/.strings.eobjs/stringHelper.cmo -o ./rehack_tests/strings/stringHelper.cmo.module.php'

# shared libraries
echo "./rehack_tests/stdlib/stdlib.cma.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --backend php ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/stdlib/stdlib.cma.php'
mkdir -p ./rehack_tests/js/

echo "./rehack_tests/js/js.cmo.module.php"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/php-module-header.php)" --backend php  $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/js/js_of_ocaml.cma.php'
echo "./rehack_tests/js/js.cmo.module.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/common-js-module-header.js)" --backend js --prettiest-js $(ocamlfind query -qe js_of_ocaml)/js_of_ocaml.cma -o ./rehack_tests/js/js_of_ocaml.cma.js'



echo "./runtime/rehack/php/runtime.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl --custom-header "$(< ./rehack_tests/templates/common-js-runtime-header.js)" --runtime-only --noinline --disable shortvar --pretty --backend js --prettiest-js ./_build/default/rehack_tests/strings/strings.bc -o ./runtime/rehack/js/runtime.js'
echo "./rehack_tests/stdlib/stdlib.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/common-js-module-header.js)" ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/stdlib/stdlib.js'

# Js version complete standalone
# node ./rehack_tests/strings/stringsStandalone.withRuntime.js
echo "./rehack_tests/strings/stringsStandalone.withRuntime.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/common-js-exe-header.js)" --backend js --prettiest-js ./_build/default/rehack_tests/strings/strings.bc -o ./rehack_tests/strings/stringsStandalone.withRuntime.js'

# node ./rehack_tests/static_react_bytecode/static-react-test.js
echo "./rehack_tests/static_react_bytecode/static-react-test.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --backend js --prettiest-js --custom-header "function polymorphic_log(s) {console.log(\"c\" in s ? s.c : s);} $(< ./rehack_tests/templates/common-js-exe-header.js)"  ./rehack_tests/static_react_bytecode/static-react-test.bc -o ./rehack_tests/static_react_bytecode/static-react-test.js'

# JS separate compilation + require modules.
# NODE_PATH="${PWD}/rehack_tests/strings/:${PWD}/rehack_tests/stdlib/stdlib.js:${PWD}/runtime/rehack/js/" node -e 'require("Strings")'
echo "./rehack_tests/strings/stringHelper.js"
echo "./rehack_tests/strings/strings.js"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/common-js-module-header.js)" ./_build/default/rehack_tests/strings/.strings.eobjs/stringHelper.cmo -o ./rehack_tests/strings/stringHelper.js'
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --disable simplify_ifdecl  --noinline --disable shortvar --pretty --custom-header "$(< ./rehack_tests/templates/common-js-module-header.js)" ./_build/default/rehack_tests/strings/.strings.eobjs/strings.cmo -o ./rehack_tests/strings/strings.js'
