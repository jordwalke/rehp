echo "building ./rehack_tests/hello_world/hello_world.php"
esy build  && \
dir=$(esy where)/default/rehack_tests/hello_world/ && \
esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --disable simplify_ifdecl --pretty --backend php --custom-header '<?hh' $dir/hello_world.bc -o ./rehack_tests/hello_world/hello_world.php " && \
esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --disable simplify_ifdecl --pretty --backend js $dir/hello_world.bc -o ./rehack_tests/hello_world/hello_world.js" && \
prettier ./rehack_tests/hello_world/hello_world.js --write && \
hackfmt ./rehack_tests/hello_world/hello_world.php --in-place && \
echo "result: " && \
git diff rehack_tests && \
echo "done"
