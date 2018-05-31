<?php

namespace ReHP;

# Benchmarking Custom object with fixed fields vs. fixed array.
# Performance of objects with fixed fields vs. arrays:
# Initially discussed here, but fixed to use random int so as not to trigger
# array optimization which is not representative.
# https://gist.github.com/Thinkscape/1136563#gistcomment-1561237

// $start = microtime(true);
// $s = array();
// class MyArrayObject{ public $name, $age;
//   public function __construct( $name, $age ) {
//    $this->name = $name;
//    $this->age = $age;
//   }
// };
// for($x=0;$x<100000;$x++){
//   $o = new MyArrayObject("Adam", rand());
//   $s[] = $o;
// };
// $time_elapsed_secs = (microtime(true) - $start) * 1000;
// echo "time:";
// print($time_elapsed_secs);
// echo "";
// echo " peakMem:";
// echo memory_get_peak_usage();

# Or this bash command:
# echo '<?php $start = microtime(true); $s = array(); class MyArrayObject{ public $name, $age; public function __construct( $name, $age ) { $this->name = $name; $this->age = $age; } }; for($x=0;$x<100000;$x++){ $o = new MyArrayObject("Adam", rand()); $s[] = $o; }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "time:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php
# Or with the same one but implementing array access methods. (not much different from one above on either VM)
# echo '<?php $start = microtime(true); $s = array(); class Struct2 implements ArrayAccess { private $zero = NULL; private $one = NULL; function __construct($a, $b) { $this->zero = $a; $this->one = $b; } public function offsetSet($offset, $value) { switch ($offset) { case 0: $this->zero = $value; break; case 1: $this->one = $value; break; } } public function offsetExists($offset) { return $offset >= 0 && $offset < 2; } public function offsetUnset($offset) { } public function offsetGet($offset) { switch ($i) { case 0: return $this->zero; case 1: return $this->one; } } }; for($x=0;$x<100000;$x++){ $o = new Struct2("Adam", rand()); $s[] = $o; }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "time:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php


// $start = microtime(true); $s = array();
// for($x=0;$x<100000;$x++){
//   $s[] = array("name"=>"Adam","age"=>rand());
// };
// $time_elapsed_secs = (microtime(true) - $start) * 1000;
// echo "timeMs:";
// print($time_elapsed_secs);
// echo "";
// echo " peakMem:";
// echo memory_get_peak_usage();

# Or this bash command:
# echo '<?php $start = microtime(true); $s = array(); for($x=0;$x<100000;$x++){ $s[] = array("name"=>"Adam","age"=>rand()); }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "timeMs:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php


# PHP 7.1:
# Custom Fixed Sized Objects:
#   25ms mem:13,594,016
# Arrays:
#   35ms mem:42,152,088
#
# HHVM:
# Custom Fixed Sized Objects:
#   46ms mem:11,010,048
# Arrays:
#   30ms mem:17,301,504


# Dynamic object class from http://www.php.net/manual/en/language.oop5.php#53282 (last comment)
class Struct2 implements \ArrayAccess { 
  private $zero = NULL;
  private $one = NULL;
  function __construct($a, $b) { 
    $this->zero = $a;
    $this->one = $b;
  } 
  public function offsetSet($offset, $value) {
    switch ($offset) {
    case 0:
        $this->zero = $value;
        break;
    case 1:
        $this->one = $value;
        break;
    }
  }
  public function offsetExists($offset) {
    return $offset >= 0 && $offset < 2;
  }
  public function offsetUnset($offset) {
  }
  public function offsetGet($offset) {
    switch ($i) {
    case 0:
        return $this->zero;
    case 1:
        return $this->one;
    }
  }
}

class Struct3 implements \ArrayAccess { 
  private $zero = NULL;
  private $one = NULL;
  private $two = NULL;
  function __construct($a, $b, $c) { 
    $this->zero = $a;
    $this->one = $b;
    $this->two = $c;
  } 
  public function offsetSet($offset, $value) {
    switch ($offset) {
    case 0:
        $this->zero = $value;
        break;
    case 1:
        $this->one = $value;
        break;
    case 2:
        $this->two = $value;
        break;
    }
  }
  public function offsetExists($offset) {
    return $offset >= 0 && $offset < 3;
  }
  public function offsetUnset($offset) {
  }
  public function offsetGet($offset) {
    switch ($i) {
    case 0:
        return $this->zero;
    case 1:
        return $this->one;
    case 2:
        return $this->two;
    }
  }
} 

$s = new Struct3('jo', 'mo', 'end');

$GLOBALS['global_this'] = (object)array();

# TODO: Normalize setting/getting of numeric keys to match JS.
class JSInstance {
  public $__members__ = NULL;
  public $__constructor__ = NULL;
  function __construct($jsFunction, $args) { 
    $this->__members__ = (object)array();
    $this->__constructor__ = $jsFunction;
    $prev_global_context=$$GLOBALS['global_this'];
    $GLOBALS['global_this']=$this;
    call_user_func_array($this->__constructor__->fun, $args);
    $GLOBALS['global_this']=$prev_global_context;
  }
  function __call($name, $args) {
    if (is_callable($this->__members__->$name)) {
      $prev_global_context=$GLOBALS['global_this'];
      $GLOBALS['global_this']=$this;
      $ret = call_user_func_array($this->__members__->$name, $args);
      $GLOBALS['global_this']=$prev_global_context;
    }
    if (is_callable($this->__constructor__->properties->prototype->$name)) {
      $prev_global_context=$GLOBALS['global_this'];
      $GLOBALS['global_this']=$this;
      $ret = call_user_func_array($this->__constructor__->properties->prototype->$name, $args);
      $GLOBALS['global_this']=$prev_global_context;
    }
  }
  public function __set($name, $value) {
    $this->__members__->$name = $value;
  }
  # Getting members on the function.
  public function __get($name) {
    if (isset($this->__members__->$name)) {
      return $this->__members__->$name;
    }
    if (isset($this->__constructor__->properties->prototype->$name)) {
      return $this->__constructor__->properties->prototype->$name;
    }
    return null;
  }
}

# Only functions that might be used as classes need to use this.
class JSFunction {
  public $length = NULL;
  public $properties = NULL;
  public $fun = NULL;
  # For non prototypes, we could omit FN wrappers and instead use the caml_call
  # approach, if functions exposed their arity.
  public function __construct($arity, $fun) {
    $this->properties = (object)array(
      'prototype' => (object)array()
    );
    $this->length = $arity;
    $this->fun = $fun;
  }
  public function jsNew() {
    $constructor_args = func_get_args();
    return new JSInstance($this, $constructor_args);
  }
  public function __set($name, $value) {
    $this->properties->$name = $value;
  }

  # Getting members on the function.
  public function __get($name) {
    var_dump("Getting " . $name);
    return $this->properties->$name;
  }

  # Implements JavaScript f.call()
  public function call() {
    $arguments = func_get_args();
    $prev_global_context=$GLOBALS['global_this'];
    $context = array_shift($arguments);
    $GLOBALS['global_this']=$context;
    $ret = call_user_func_array($this->fun, $arguments);
    $GLOBALS['global_this']=$prev_global_context;
    return $ret;
  }

  # Implements JavaScript f.apply()
  public function apply($context, $array_of_args) {
    $arguments = func_get_args();
    $prev_global_context=$GLOBALS['global_this'];
    $GLOBALS['global_this']=$context;
    $ret = call_user_func_array($this->fun, $arguments);
    $GLOBALS['global_this']=$prev_global_context;
    return $ret;
  }
  # When invoked as a regular function.
  public function __invoke() {
    $prev_global_context=$GLOBALS['global_this'];
    $GLOBALS['global_this']=NULL;
    $arguments = func_get_args();
    $ret = call_user_func_array($this->fun, $arguments);
    $GLOBALS['global_this']=$prev_global_context;
    return $ret;
  }
}

# An Array that has object semantics (instead of strange copy on write).
# Should implement array indexing.
// class JSArray {
//   private $internal_array;
//   public function __construct() {
//     $internal_array = array();
//     # To avoid creating array coppies we get the number and loop through.
//     $num_args = func_num_args();
//     for($i = 0; $i < $num_args; $i++) {
//       $arg = func_get_arg($i);
//       $internal_array[$i] = 
//     };

//     $this->properties = (object)array(
//       'prototype' => (object)array()
//     );
//     $this->length = $arity;
//     $this->fun = $fun;
//   }
// }

function F($the_fun) {
  return new JSFunction(1, $the_fun);
};
function F2($the_fun) {
  return new JSFunction(2, $the_fun);
};
function F3($the_fun) {
  return new JSFunction(3, $the_fun);
};
function F4($the_fun) {
  return new JSFunction(4, $the_fun);
};
function F5($the_fun) {
  return new JSFunction(5, $the_fun);
};
function F6($the_fun) {
  return new JSFunction(6, $the_fun);
};
function F7($the_fun) {
  return new JSFunction(7, $the_fun);
};
function F8($the_fun) {
  return new JSFunction(8, $the_fun);
};
function F9($the_fun) {
  return new JSFunction(9, $the_fun);
};
function F10($the_fun) {
  return new JSFunction(10, $the_fun);
};
function F11($the_fun) {
  return new JSFunction(11, $the_fun);
};
function F12($the_fun) {
  return new JSFunction(12, $the_fun);
};
function F13($the_fun) {
  return new JSFunction(13, $the_fun);
};
function F14($the_fun) {
  return new JSFunction(14, $the_fun);
};
function F15($the_fun) {
  return new JSFunction(15, $the_fun);
};
function F16($the_fun) {
  return new JSFunction(16, $the_fun);
};
function F17($the_fun) {
  return new JSFunction(17, $the_fun);
};
function F18($the_fun) {
  return new JSFunction(18, $the_fun);
};
function F19($the_fun) {
  return new JSFunction(19, $the_fun);
};
function F20($the_fun) {
  return new JSFunction(20, $the_fun);
};
function F21($the_fun) {
  return new JSFunction(21, $the_fun);
};
function F22($the_fun) {
  return new JSFunction(22, $the_fun);
};
function F23($the_fun) {
  return new JSFunction(23, $the_fun);
};
function F24($the_fun) {
  return new JSFunction(24, $the_fun);
};
function F25($the_fun) {
  return new JSFunction(25, $the_fun);
};
function F26($the_fun) {
  return new JSFunction(26, $the_fun);
};
function F27($the_fun) {
  return new JSFunction(27, $the_fun);
};
function F28($the_fun) {
  return new JSFunction(28, $the_fun);
};
function F29($the_fun) {
  return new JSFunction(29, $the_fun);
};
function F30($the_fun) {
  return new JSFunction(30, $the_fun);
};
function F31($the_fun) {
  return new JSFunction(31, $the_fun);
};
function F32($the_fun) {
  return new JSFunction(32, $the_fun);
};
function F33($the_fun) {
  return new JSFunction(33, $the_fun);
};
function F34($the_fun) {
  return new JSFunction(34, $the_fun);
};
function F35($the_fun) {
  return new JSFunction(35, $the_fun);
};
function F36($the_fun) {
  return new JSFunction(36, $the_fun);
};
function F37($the_fun) {
  return new JSFunction(37, $the_fun);
};
function F38($the_fun) {
  return new JSFunction(38, $the_fun);
};
function F39($the_fun) {
  return new JSFunction(39, $the_fun);
};


function instance_of($obj, $constructor) {
  return $obj->__constructor__ === $constructor;
};

# This:
// function X() {$this->bar = "hello";};
// $X->prototype->foo = function($arg) {print($this->bar);};
// $inst = new $X($initArg);
// $inst->foo(101);
# Becomes:
$X = F(function($arg) {
  echo "INSIDE F global this is ";
  var_dump($GLOBALS['global_this']);
  $GLOBALS['global_this']->bar = $arg;
});
# It can be called just like a regular function in case it wasn't meant to be a
# constructor.
$X->prototype->foo = function($arg) {print($GLOBALS['global_this']->bar);};
$inst = $X->jsNew("CONSTRUCTORARG");
$inst->foo(101);

$inst->anotherField = "anotherValue";
echo "\n";
foreach($inst->__members__ as $var => $_) {
  echo "\nforin [$var === $value]";
}
echo "\n";

$tmpThis = (object)array('bar' => 9);
$X->call($tmpThis, "theArgPassedToCall");
var_dump($tmpThis);

$X->apply($tmpThis, ["theArgPassedToApply"]);
# This:
// $anyFunExpr1->apply(anyContextExpr1, [arr, arr]);
// $anyFunExpr2->call(anyContextExpr2, arg, arg);
// # Becomes:
// $global_calling_func=anyFunExpr1;
// $prev_global_context_rand=$GLOBALS['global_this'];
// $GLOBALS['global_this']=anyContextExpr1;
// $global_calling_func(); 


# Will only work on lambdas, not regular functions.
# Still requires that consumers be transformed into the form:
# typeof ident => isset(ident) ? typeof(ident) : 'undefined'
# typeof notIdent => typeof(ident)
# isset(expr) ? 
function typeof($thing) {
  global $jsNull;
  if ($thing === null) {
    return 'undefined';
  }
  if (is_callable($thing)) {
    return 'function';
  }
  if ($thing === $jsNull) {
    return 'object';
  }
  $gotten_type = gettype($thing);
  if ($gotten_type === 'string' || $gotten_type === 'boolean') {
    return $gotten_type;
  }
  if ($gotten_type === 'integer' || $gotten_type === 'double') {
    return 'number';
  }
  return $gotten_type;
};


# >>> Unsigned shift right:
# https://stackoverflow.com/a/43359819
# Then the >> operator could be derived from this by preserving the sign.
$unsigned_right_shift = function($a, $b) {
  if ($b >= 32 || $b < -32) {
    $m = (int)($b/32);
    $b = $b-($m*32);
  }
  if ($b < 0) {
    $b = 32 + $b;
  }
  if ($b == 0) {
    return (($a>>1)&0x7fffffff)*2+(($a>>$b)&1);
  }
  if ($a < 0) { 
    $a = ($a >> 1); 
    $a &= 2147483647; 
    $a |= 0x40000000; 
    $a = ($a >> ($b - 1)); 
  } else { 
    $a = ($a >> $b); 
  } 
  return $a; 
};

# Bit shifters: To emulate 32 bits on 64 bit platforms, we shift off any
# leading 32 bits.

# https://stackoverflow.com/a/25587827
# https://stackoverflow.com/questions/6303241/find-windows-32-or-64-bit-using-php
$left_shift = function($a, $b) {
  $shifted = $a << $b; 
  if (PHP_INT_SIZE === 8) {
    # 64 bit.
    return ($shifted << 32) >> 32; 
  } else {
    # Size four means 32bit
    return $shifted;
  }
};

$right_shift = function($a, $b) {
  if (PHP_INT_SIZE === 8) {
    # 64 bit.
    $a_normalized = ($a << 32) >> 32; 
  } else {
    # Size four means 32bit
    $a_normalized = $a;
  }
  return $a_normalized >> $b; 
};


# See also:
# https://stackoverflow.com/questions/29726466/difference-in-the-results-of-operations-bitwise-between-javascript-and-php/29726748

var_dump(typeof(null));
var_dump(typeof('asdf'));
var_dump(typeof(function() {}));
var_dump(typeof("asdf"));
var_dump(typeof(234.0));
var_dump(typeof(2));
var_dump(typeof($asdf->foo));
var_dump(typeof(true));

// var_dump(shift_left_32(0, 1));
var_dump($right_shift(234321341324, 5));


$i=0;
$j=0;

for(;$i < 10;$i++ || true ? $j++:$j++)$a[$i] = $a2[$j];
var_dump($i);
var_dump($j);

$right_shift_ = function($a, $b) {
  if (PHP_INT_SIZE === 8) {
    # 64 bit.
    $a_normalized = ($a << 32) >> 32; 
  } else {
    # Size four means 32bit
    $a_normalized = $a;
  }
  return $a_normalized >> $b; 
};

# Length of function args.
$length = function($f) {
  return (new ReflectionFunction($f))->getNumberOfRequiredParameters();
};

// $c = "\ReHp\JSFunction";
// $f = new $c();


$max_int=$unsigned_right_shift(-1,1) | 0;
$min_int=$max_int + 1 | 0;

var_dump($max_int);
var_dump($min_int);
