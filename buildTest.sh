esy build && esy x sh -c 'export OCAMLRUNPARAM=b && time js_of_ocaml --noinline --disable shortvar --pretty --backend php --custom-header "$(< ./runtime/support.php)" ~/github/static-react/_build/default/bin/react-app/Main.bc -o ./test-data/Main3.php '
