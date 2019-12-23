
$runtime = $joo_global_object->jsoo_runtime;
$call1 = $runtime["caml_call1"];
$cst_hello_world = $runtime["caml_new_string"]("hello world");
$Pervasives =  Pervasives::requireModule ();

$call1($Pervasives[34], $cst_hello_world);

$Hello_world = Vector{0};

 return ($Hello_world);
