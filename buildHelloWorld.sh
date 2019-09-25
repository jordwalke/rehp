set -e
set -u

esy build

for test in $(echo "
hello_world
loop_labels
"); do
  echo "building ./rehack_tests/$test/$test.php"
  esy refmterr dune build --profile=release rehack_tests/$test/$test.bc
  dir=$(esy where)/default/rehack_tests/$test/
  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --pretty --backend php --custom-header '<?hh' $dir/$test.bc -o ./rehack_tests/$test/$test.php " && \
  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --disable simplify_ifdecl --pretty --backend js $dir/$test.bc -o ./rehack_tests/$test/$test.js" && \
  prettier ./rehack_tests/$test/$test.js --write
  hackfmt ./rehack_tests/$test/$test.php --in-place
  echo "done"
done
