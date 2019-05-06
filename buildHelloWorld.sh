echo "building ./rehack_tests/hello_world/hello_world.php"
esy build  && \
dir=$(esy where)/default/rehack_tests/hello_world/ && \
esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --pretty --backend php --custom-header '<?hh' $dir/hello_world.bc -o ./rehack_tests/hello_world/hello_world.php" && \
hackfmt ./rehack_tests/hello_world/hello_world.php --in-place && \
echo "result: " && \
grep -E -A2 -B2 '\b42\b' rehack_tests/hello_world/hello_world.php && \
echo "done"
