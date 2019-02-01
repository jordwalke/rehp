./rehack_tests/Runner.php \
-I runtime/rehack/php \
-I rehack_tests/stdlib/stdlib.cma.php \
-I rehack_tests/js/js.cmo.module.php \
-I rehack_tests/has_one_underscore/ \
runtime/rehack/php/PHP.php \
rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php \
-r 'var_dump( \Rehack\has_one_underscore::get()->fields[1](   \Rehack\GlobalObject::get()->String->new("as_df")   ));'

./rehack_tests/Runner.php \
-I runtime/rehack/php \
-I rehack_tests/stdlib/stdlib.cma.php \
-I rehack_tests/js/js.cmo.module.php \
-I rehack_tests/has_one_underscore/ \
runtime/rehack/php/PHP.php \
rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php \
-r 'var_dump( \Rehack\has_one_underscore::get()->fields[1](   \Rehack\GlobalObject::get()->String->new("asdf")   ));'

./rehack_tests/Runner.php \
-I runtime/rehack/php \
-I rehack_tests/stdlib/stdlib.cma.php \
-I rehack_tests/js/js.cmo.module.php \
-I rehack_tests/has_one_underscore/ \
runtime/rehack/php/PHP.php \
rehack_tests/has_one_underscore/has_one_underscore.cmo.module.php \
-r 'var_dump( \Rehack\has_one_underscore::get()->fields[1](   \Rehack\GlobalObject::get()->String->new("as__df")   ));'
