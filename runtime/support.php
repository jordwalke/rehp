<?php

# TODO:
# Create constructor.
# Set a field on prototype.
# Create instance.
# Verify instance has prototype field.
# Set new field on existing prototype object.
# Verify instance has new field.
# Reset entire prototype to new object.
# Verify old instance has their original fields.
# Make new instance.
# Verify new instance only has the new object's fields.
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
# echo '<?php $start = microtime(true); $s = array(); class Struct implements ArrayAccess { private $fields = array(); function __construct($a, $b) { $count = func_num_args(); for($i=0; $i < $count; $i++) { $this->fields[$i] = func_get_arg($i); } } public function offsetSet($offset, $value) { $this->fields[$offset] = $value; } public function offsetExists($offset) { return isset($this->fields[$offset]); } public function offsetUnset($offset) { } public function offsetGet($offset) { return $this->fields[$offset]; } }; for($x=0;$x<100000;$x++){ $o = new Struct("Adam", rand()); $s[] = $o; }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "time:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php 
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

  $joo_global_object = isset($jsoo_global_object) ? $jsoo_global_object : (object)array();

  # Length of function args. Can't be a lambda, or it won't work!
  $rehp_arg_count = function($f) {
    return (new ReflectionFunction($f))->getNumberOfRequiredParameters();
  };
  $GLOBALS['rehp_arg_count'] = $rehp_arg_count; # Just so class defs can access it.
  # JS null:
  # Suitable for tripple equal reference identity.
  $jsNull = array();
  $GLOBALS['jsNull'] = $jsNull; # Just so class defs can access it.
  # JS undefined:
  # Suitable for tripple equal reference identity. So that accessing missing
  # properties of "objects" $o->field returns ::undefined. Is NOT double equal
  # to ::null. All compiled js "light" code should use triple equal.
  $jsUndefined = null;
  $GLOBALS['jsUndefined'] = null; # Just so class defs can access it.
  # JS current function context:
  $GLOBALS['jsContext'] = $jsNull; # This one really is global.
  $JSFunction = function($the_fun) {
    return new JSFunction($the_fun);
  };

  # TODO: Walk to detect multiple levels of inheriting.
  $instance_of = function ($obj, $constructor) {
    return $obj->constructor === $constructor;
  };

    # Still requires that consumers be transformed into the form:
    # typeof ident => isset(ident) ? typeof(ident) : 'undefined'
    # typeof notIdent => typeof(ident)
    # isset(expr) ? 
  $typeof = function($thing) use($jsNull) {
    if ($thing === null) {
      return 'undefined';
    }
    if ($thing === $jsNull) {
      return 'object';
    }
    if (is_callable($thing)) {
      return 'function';
    }
    $gotten_type = gettype($thing);
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
  # See also:
  # https://stackoverflow.com/questions/29726466/difference-in-the-results-of-operations-bitwise-between-javascript-and-php/29726748

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




  class Struct implements ArrayAccess {
    private $fields = array();
    function __construct($a, $b) { 
      $count = func_num_args();
      for($i=0; $i < $count; $i++) {
        $this->fields[$i] = func_get_arg($i);
      }
    } 
    public function offsetSet($offset, $value) {
      $this->fields[$offset] = $value;
    }
    public function offsetExists($offset) {
      return isset($this->fields[$offset]);
    }
    public function offsetUnset($offset) {
    }
    public function offsetGet($offset) {
      return $this->fields[$offset];
    }
  }

  # Dynamic object class from http://www.php.net/manual/en/language.oop5.php#53282 (last comment)
  class Struct2 implements ArrayAccess {
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

  class Struct3 implements ArrayAccess { 
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

  # TODO: Normalize setting/getting of numeric keys to match JS.
  class JSInstance implements ArrayAccess {
    public $__properties__ = NULL;
    # JS instances trap a reference to their constructor's prototype
    # at the time of new(). If the prototype is mutated, they'll perceive it.
    # But if the o.constructor.prototype is reset to something else, they
    # won't perceive that. They retain the original reference.
    public $__proto__ = NULL;
    function __construct($jsFunction, $args) { 
      $this->__properties__ = array('constructor' => $jsFunction);
      $this->__proto__ = $jsFunction->prototype;
      $prev_global_context=$GLOBALS['jsContext'];
      $GLOBALS['jsContext']=$this;
      $this->constructor->apply($this, $args);
      $GLOBALS['jsContext']=$prev_global_context;
    }
    # Delegate to prototype.
    function __call($name, $args) {
      $gotten = $this->$name;
      if (is_callable($gotten)) {
        $prev_global_context=$GLOBALS['jsContext'];
        $GLOBALS['jsContext']=$this;
        $ret = call_user_func_array($gotten, $args);
        $GLOBALS['jsContext']=$prev_global_context;
        # And if functions don't return anything, that is NULL by default, which is
        # conveniently $jsUndefined.
        return $ret;
      } else {
        throw new ErrorException("Undefined is not a function!");
      }
    }
    # Implements the for in loop.
    public function __all_enumerable_keys() {
      $includingNonEnum = $this->__all_keys();
      $count = count($includingNonEnum);
      $ret = array();
      for($i = 0; $i < $count; $i++) {
        if ($includingNonEnum[$i] !== 'constructor') {
          $ret[] = $includingNonEnum[$i];
        }
      }
      # This one is not enumerable.
      return $ret;
    }
    public function __all_keys() {
      $keys = array_keys($this->__properties__);
      $protoKeys = $this->__proto__->__all_enumerable_keys();
      $includingNonEnum = !empty($protoKeys) ? ($keys + $protoKeys) : $keys;
      $count = count($includingNonEnum);
      return $includingNonEnum;
    }
    # An Object.keys function.
    public function __all_own_keys() {
      $includingNonEnum = array_keys($this->__properties__);
      return $includingNonEnum;
    }
    public function __all_own_enumerable_keys() {
      $includingNonEnum = $this->__all_own_keys();
      $count = count($includingNonEnum);
      $ret = array();
      for($i = 0; $i < $count; $i++) {
        if ($includingNonEnum[$i] !== 'constructor') {
          $ret[] = $includingNonEnum[$i];
        }
      }
      # This one is not enumerable.
      return $ret;
    }
    # Custom function:
    # Note that isset($variableContainingNull) returns false!
    public function hasOwnProperty($name) {
      return array_key_exists($name, $this->__properties__);
    }
    # Allow the object to respond to EDot. Shaddows prototype.
    public function __set($name, $value) {
      $this->__properties__[$name] = $value;
    }
    public function __get($name) {
      if ($this->hasOwnProperty($name)) {
        return $this->__properties__[$name];
      } else {
        return $this->__proto__->$name;
      }
    }

    # Now let objects acts as arrays.
    public function offsetSet($offset, $value) {
      # Use the already implemented dot access delegation.
      $this->$offset = $value;
    }
    # Always can access a field or property - always defaults to undefined.
    public function offsetExists($offset) {
      return true;
    }
    public function offsetUnset($offset) {
      # TODO: implement this.
      throw new ErrorException("Deletion of keys not yet supported");
    }
    public function offsetGet($offset) {
      return $this->$offset;
    }
  }

  class JSArrayLikeInstance extends JSInstance implements ArrayAccess {
    function __construct($jsFunction, $args) { 
      parent::__construct($jsFunction, $args);
    }
    # Implements the for in loop.
    public function __all_enumerable_keys() {
      $includingNonEnum = parent::__all_keys();
      $count = count($includingNonEnum);
      $ret = array();
      for($i = 0; $i < $count; $i++) {
        if ($includingNonEnum[$i] !== 'constructor' && $includingNonEnum[$i] !== 'length') {
          $ret[] = $includingNonEnum[$i];
        }
      }
      return $ret;
    }
    public function __all_own_enumerable_keys() {
      $includingNonEnum = parent::__all_own_keys();
      $count = count($includingNonEnum);
      $ret = array();
      for($i = 0; $i < $count; $i++) {
        if ($includingNonEnum[$i] !== 'constructor' && $includingNonEnum[$i] !== 'length') {
          $ret[] = $includingNonEnum[$i];
        }
      }
      return $ret;
    }

    public function offsetSet($offset, $value) {
      # Use the already implemented dot access delegation.
      if ($offset > $this->length - 1) {
        for($i = $this->length; $i < $offset - 1; $i++) {
          $this->$offset = $GLOBALS['jsUndefined'];
        }
        $this->length = $offset + 1;
      }
      parent::offsetSet($offset, $value);
    }
    public function offsetUnset($offset) {
      # TODO: implement this.
      throw new ErrorException("Deletion of array elements not yet supported");
    }
  }

  class HasNoKeys {
    public function __all_enumerable_keys() {
      return array();
    }
    # An Object.keys function.
    public function __all_own_enumerable_keys() {
      return array();
    }
  }


  # Only functions that might be used as classes need to use this.
  class JSFunction implements ArrayAccess {
    public $__properties__ = NULL;
    # This function's very own prototype captured reference. Probably not the one
    # you're thinking of.
    public $__proto__ = NULL;
    public $fun = NULL;
    # For non prototypes, we could omit FN wrappers and instead use the caml_call
    # approach, if functions exposed their arity.
    public function __construct($fun) {
      global $rehp_arg_count;
      $this->__proto__ = (object)array();
      $this->__properties__ = array(
        'constructor' => (object)array('prototype' => new HasNoKeys()),
        'length' => $rehp_arg_count($fun)
      );
      $this->fun = $fun;
    }
    public function jsNew() {
      $constructor_args = func_get_args();
      if($this->prototype->__isArrayLike) {
        return new JSArrayLikeInstance($this, $constructor_args);
      } else {
        return new JSInstance($this, $constructor_args);
      }
    }

    # Implements JavaScript f.call()
    public function call() {
      $arguments = func_get_args();
      # Prevent php from erroring.
      $context = array_shift($arguments);
      $origCount = count($arguments);
      for($i=$origCount; $i < $this->length; $i++) {
        array_push($arguments, $GLOBALS['jsUndefined']);
      }
      $prev_global_context=$GLOBALS['jsContext'];
      $GLOBALS['jsContext']=$context;
      $ret = call_user_func_array($this->fun, $arguments);
      $GLOBALS['jsContext']=$prev_global_context;
      return $ret;
    }

    # Implements JavaScript f.apply()
    public function apply($context, $array_of_args) {
      $origCount = count($array_of_args);
      for($i=$origCount; $i < $this->length; $i++) {
        array_push($array_of_args, $GLOBALS['jsUndefined']);
      }
      $prev_global_context=$GLOBALS['jsContext'];
      $GLOBALS['jsContext']=$context;
      $ret = call_user_func_array($this->fun, $array_of_args);
      $GLOBALS['jsContext']=$prev_global_context;
      return $ret;
    }
    # When invoked as a regular function.
    public function __invoke() {
      $prev_global_context=$GLOBALS['jsContext'];
      $GLOBALS['jsContext']=NULL;
      $arguments = func_get_args();
      $ret = call_user_func_array($this->fun, $arguments);
      $GLOBALS['jsContext']=$prev_global_context;
      return $ret;
    }

    # Allow the object to respond to EDot.
    public function __set($name, $value) {
      $this->__properties__[$name] = $value;
    }
    public function __get($name) {
      if ($name === "prototype") {
        if (!isset($this->__properties__['prototype'])) {
          # Breaks circular dependency to set this lazily.
          $this->__properties__['prototype'] = $GLOBALS['Object']->jsNew();
        }
        return $this->__properties__['prototype'];
      }
      if (isset($this->__properties__[$name])) {
        return $this->__properties__[$name];
      }
      // if (isset($this->__proto__->$name)) {
      //   return $this->__proto__->$name;
      // }
      return $GLOBALS['jsUndefined'];
    }

    # Now let objects acts as arrays.
    public function offsetSet($offset, $value) {
      # Use the already implemented dot access delegation.
      $this->$offset = $value;
    }
    # Always can access a field or property - always defaults to undefined.
    public function offsetExists($offset) {
      return true;
    }
    public function offsetUnset($offset) {
      # TODO: implement this.
      throw new ErrorException("Deletion of keys not yet supported");
    }
    public function offsetGet($offset) {
      return $this->$offset;
    }
  }

  # In JS, Object is a function constructor for objects.
  $GLOBALS['Object'] = $JSFunction(function() {
  });
  $GLOBALS['Object']->prototype = new HasNoKeys();


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

  //     $this->__properties__ = (object)array(
  //       'prototype' => (object)array()
  //     );
  //     $this->length = $arity;
  //     $this->fun = $fun;
  //   }
  // }

$expect = function($x, $toEqual) {
  if ($x !== $toEqual) {
    print("Expected:");
    var_dump($x);
    print("To equal:");
    var_dump($toEqual);
    throw new ErrorException("FAIL");
  }
};
# TODO: This needs fixing
$max_int=$unsigned_right_shift(-1,1) | 0;
$min_int=$max_int + 1 | 0;

$jsoo_global_object = (object)array();

# Php equality table: https://ruempler.eu/2015/01/03/the-php-equality-table/
# JS equality table: https://dorey.github.io/JavaScript-Equality-Table/

$expect($typeof($identifierThatDoesntExist), "undefined"); # Php null is our representation of undefined.
$expect($typeof(null), "undefined"); # Php null is our representation of undefined.
$expect($typeof($jsNull), "object");
$expect($typeof($jsUndefined), "undefined");
$expect($jsUndefined === $jsNull, false);
$expect($jsUndefined == $jsNull, true);
$expect($typeof('asdf'), "string");
$expect($typeof("asdf"), "string");
$expect($typeof(function() {}), "function");
$expect($typeof(234.0), "number");
$expect($typeof(2), "number");
$expect($typeof($asdf->foo), "undefined");
$expect($asdf->foo, $jsUndefined);
$expect($typeof(true), "boolean");

// var_dump(shift_left_32(0, 1));
$expect($right_shift(234321341324, 5), -59433124);


# This:
// function X() {$this->bar = "hello";};
// $X->prototype->foo = function($arg) {print($this->bar);};
// $inst = new $X($initArg);
// $inst->foo(101);
# Becomes:
$X = $JSFunction(function($arg, $h) {
  $GLOBALS['jsContext']->bar = $arg;
});

$expect($X->length, 2);

# It can be called just like a regular function in case it wasn't meant to be a
# constructor.
$X->prototype->foo = function($arg) {return $GLOBALS['jsContext']->bar . $arg;};
$inst = $X->jsNew("CONSTRUCTORARG", 0);
$expect($inst->foo("!"), "CONSTRUCTORARG!");
$inst->anotherField = "anotherValue";

# Test what we will compile for-in loops to.
$observedKeys = array();
$observedVals = array();
foreach($inst->__all_enumerable_keys() as $_ => $key) {
  $observedKeys[] = $key;
  $observedVals[] = $inst[$key];
}

$expect(implode(",", $observedKeys), "bar,anotherField");

$tmpThis = (object)array('bar' => 9);
$X->call($tmpThis, "theArgPassedToCall");
$expect($tmpThis->bar, "theArgPassedToCall");

$X->apply($tmpThis, ["theArgPassedToApply"]);
$expect($tmpThis->bar, "theArgPassedToApply");

$Array = $JSFunction(function($literal) {
  $count = count($literal);

  for($i = 0; $i < $count; $i++) {
    $GLOBALS['jsContext'][$i] = $literal[$i];
  };
  $GLOBALS['jsContext']->length = $count;
});
$Array->prototype->length = 0;
# Cause to be auto-updated length.
$Array->prototype->__isArrayLike = true;

$ArrayLiteral = function() use($Array) {
  $args = func_get_args();
  return $Array->jsNew($args);
};


# Function copyright :Copyright (c) 2014, sstur@me.com. All rights reserved.
# BSD
function to_number($value) {
  if ($value === $jsUndefined) {
    return NAN;
  }
  if ($value === $jsNull) {
    return 0.0;
  }
  if (is_float($value)) {
    return $value;
  }
  if (is_int($value)) {
    return (float)$value;
  }
  if (is_bool($value)) {
    return ($value ? 1.0 : 0.0);
  }
  // Not supported now
  // if ($value instanceof JSInstance) {
  //   return to_number(to_primitive($value));
  // }
  //trim whitespace
  $value = preg_replace('/^[\s\x0B\xA0]+|[\s\x0B\xA0]+$/u', '', $value);
  if ($value === '') {
    return 0.0;
  }
  if ($value === 'Infinity' || $value === '+Infinity') {
    return INF;
  }
  if ($value === '-Infinity') {
    return -INF;
  }
  if (preg_match('/^([+-]?)(\d+\.\d*|\.\d+|\d+)$/i', $value)) {
    return (float)$value;
  }
  if (preg_match('/^([+-]?)(\d+\.\d*|\.\d+|\d+)e([+-]?[0-9]+)$/i', $value, $m)) {
    return pow($m[1] . $m[2], $m[3]);
  }
  if (preg_match('/^0x[a-z0-9]+$/i', $value)) {
    return (float)hexdec(substr($value, 2));
  }
  return NAN;
}


# MathConstructor copyright :Copyright (c) 2014, sstur@me.com. All rights reserved.
# BSD
$randMax = mt_getrandmax();
$MathConstructor = $JSFunction(function() {
  $GLOBALS['jsContext']->E = M_E;
  $GLOBALS['jsContext']->LN10 = M_LN10;
  $GLOBALS['jsContext']->LN2 = M_LN2;
  $GLOBALS['jsContext']->LOG10E = M_LOG10E;
  $GLOBALS['jsContext']->LOG2E = M_LOG2E;
  $GLOBALS['jsContext']->PI = M_PI;
  $GLOBALS['jsContext']->SQRT1_2 = M_SQRT1_2;
  $GLOBALS['jsContext']->SQRT2 = M_SQRT2;
});
$MathConstructor->prototype->random = function() use (&$randMax) {
  return (float)(mt_rand() / ($randMax + 1));
};
$MathConstructor->prototype->round = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)round($num);
};
$MathConstructor->prototype->ceil = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)ceil($num);
};
$MathConstructor->prototype->floor = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)floor($num);
};
$MathConstructor->prototype->abs = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)abs($num);
};
$MathConstructor->prototype->max = function() {
  $max = -INF;
  foreach (func_get_args() as $num) {
    $num = to_number($num);
    if (is_nan($num)) return NAN;
    if ($num > $max) $max = $num;
  }
  return (float)$max;
};
$MathConstructor->prototype->min = function() {
  $min = INF;
  foreach (func_get_args() as $num) {
    $num = to_number($num);
    if (is_nan($num)) return NAN;
    if ($num < $min) $min = $num;
  }
  return (float)$min;
};
$MathConstructor->prototype->pow = function($num, $exp) {
  $num = to_number($num);
  $exp = to_number($exp);
  if (is_nan($num) || is_nan($exp)) {
    return NAN;
  }
  return (float)pow($num, $exp);
};
$MathConstructor->prototype->log = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)log($num);
};
$MathConstructor->prototype->exp = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)exp($num);
};
$MathConstructor->prototype->sqrt = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)sqrt($num);
};
$MathConstructor->prototype->sin = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)sin($num);
};
$MathConstructor->prototype->cos = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)cos($num);
};
$MathConstructor->prototype->tan = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)tan($num);
};
$MathConstructor->prototype->atan = function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)atan($num);
};
$MathConstructor->prototype->atan2 = function($y, $x) {
  $y = to_number($y);
  $x = to_number($x);
  if (is_nan($y) || is_nan($x)) {
    return NAN;
  }
  return (float)atan2($y, $x);
};

$Math=$MathConstructor->jsNew();


$arr = $ArrayLiteral("hi", "there");
$expect($arr->length, 2);
$arr[2] = "new item";
$expect($arr->length, 3);
$arr[4] = "new item whoa";
$expect($arr->length, 5);
$expect($arr[3], $GLOBALS['jsUndefined']);
$arr->addThisProperty = "hi";
$expect(implode(",", $arr->__all_own_enumerable_keys()), '0,1,2,4,addThisProperty');

