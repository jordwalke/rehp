./rehack_tests/Runner.php \
-I runtime/rehack/ \
-I rehack_tests/output/stdlib.cma.php \
-I rehack_tests/output \
rehack_tests/output/strings.cmo.module.php \
-r '\Rehack\Strings::get();'
