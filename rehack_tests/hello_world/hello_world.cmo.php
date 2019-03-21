

$runtime = $joo_global_object->jsoo_runtime;
$caml_arity_test = $runtime["caml_arity_test"];
$caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
  return $caml_arity_test($f) === 1
    ? $f($a0)
    : ($runtime["caml_call_gen"]($f, varray[$a0]));
};
$global_data = $runtime["caml_get_global_data"]();
$cst_hello_world = $runtime["caml_new_string"]("hello world");
$Pervasives = $global_data["Pervasives"];

$caml_call1($Pervasives[30], $cst_hello_world);

$Hello_world = Vector{0};

$runtime["caml_register_global"](2, $Hello_world, "Hello_world");
