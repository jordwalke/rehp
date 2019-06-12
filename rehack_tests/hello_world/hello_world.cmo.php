

$runtime = $joo_global_object->jsoo_runtime;
$call1 = $runtime["caml_call1"];
$global_data = $runtime["caml_get_global_data"]();
$cst_hello_world = $runtime["caml_new_string"]("hello world");
$Pervasives = $global_data["Pervasives"];

$call1($Pervasives[30], $cst_hello_world);

$Hello_world = Vector{0};

$runtime["caml_register_global"](2, $Hello_world, "Hello_world");
