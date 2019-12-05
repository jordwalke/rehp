set -e
set -u

esy build

echo "./rehack_tests/stdlib/stdlib.cma.py"
esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --keep-unit-names --enable excwrap --enable wrapped-exceptions --noinline --disable shortvar --pretty --custom-header "file:./rehack_tests/templates/python-module-header.py" --backend python ./rehack_tests/stdlib/stdlib.cma -o ./rehack_tests/stdlib/stdlib.cma.py/' && \
black ./rehack_tests/stdlib/stdlib.cma.py/*

for test in $(echo "
switch_continue
hello_world
loop_labels
"); do
  echo "building ./rehack_tests/$test"
  esy refmterr dune build rehack_tests/$test/$test.bc
  dir=$(esy where)/default/rehack_tests/$test/

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --noinline --disable shortvar --disable simplify_ifdecl --pretty --backend js $dir/$test.bc -o ./rehack_tests/$test/$test.js" && \
  prettier ./rehack_tests/$test/$test.js --write

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --noinline --disable shortvar --pretty --backend php --custom-header '<?hh' $dir/$test.bc -o ./rehack_tests/$test/$test.php" && \
  perl -i -pe 's/instanceof/is/g' ./rehack_tests/$test/$test.php && \
  hackfmt ./rehack_tests/$test/$test.php --in-place

  esy x sh -c "export OCAMLRUNPARAM=b && time js_of_ocaml --enable excwrap --enable wrapped-exceptions --noinline --disable shortvar --pretty --backend python $dir/$test.bc -o ./rehack_tests/$test/$test.py" && \
  black ./rehack_tests/$test/$test.py 

  echo "done"
done
