./rehack_tests/Runner.php \
-I runtime/rehack/ \
-I rehack_tests/stdlib/stdlib.cma.php \
-I rehack_tests/strings/ \
rehack_tests/strings/strings.cmo.module.php \
-r '\Rehack\Strings::get();'
