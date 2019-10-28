set -e
set -u

esy build

for test in $(echo "
switch_continue
hello_world
loop_labels
"); do
  echo "building ./rehack_tests/$test"
  esy refmterr dune build --profile=release rehack_tests/$test/$test.bc
  dir=$(esy where)/default/rehack_tests/$test/

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --pretty --backend php --custom-header '<?hh' $dir/$test.bc -o ./rehack_tests/$test/$test.php " && \
  prettier ./rehack_tests/$test/$test.js --write

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions  --noinline --disable shortvar --disable simplify_ifdecl --pretty --backend js $dir/$test.bc -o ./rehack_tests/$test/$test.js" && \
  hackfmt ./rehack_tests/$test/$test.php --in-place

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --backend python $dir/$test.bc -o ./rehack_tests/$test/$test.py" && \
  black ./rehack_tests/$test/$test.py 

  echo "done"
done
