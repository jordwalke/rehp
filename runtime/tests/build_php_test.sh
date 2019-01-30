js_of_ocaml \
 --enable excwrap \
 --noinline \
 --disable shortvar \
 --pretty \
 --backend php \
 --custom-header "$(< ../support.php)" \
 $1 \
 -o $2
