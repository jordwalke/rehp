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

global $jsContext;
global $null;
global $undefined;

# Reflection vs. wrapping of functions:
# Wrapping of functions in class.
# echo '<?php class F1 {public function __construct($f, $len){$this->f =$f; $this->len=$len;} } $start = microtime(true); $s = array(); class MyArrayObject{ public $name, $age; public function __construct( $name, $age ) { $this->name = new F1(function($a, $b){}, 2); $this->age = $this->name->len; } }; for($x=0;$x<100000;$x++){ $o = new MyArrayObject("Adam", rand()); $s[] = $o; }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "time:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php
# Using reflection (surprisingly much faster).
# echo '<?php $start = microtime(true); $s = array(); class MyArrayObject{ public $name, $age; public function __construct( $name, $age ) { $this->name = function($a, $b){}; $this->age = (new ReflectionFunction($this->name))->getNumberOfRequiredParameters(); } }; for($x=0;$x<100000;$x++){ $o = new MyArrayObject("Adam", rand()); $s[] = $o; }; $time_elapsed_secs = (microtime(true) - $start) * 1000; echo "time:"; print($time_elapsed_secs); echo ""; echo " peakMem:"; echo memory_get_peak_usage();' | php
# In hhvm they're roughly equivalent

# Length of function args. Can't be a lambda, or it won't work!
# return (new ReflectionFunction($f))->getNumberOfRequiredParameters() == 2 
$rehp_arg_count = function($f) {
  return (new ReflectionFunction($f))->getNumberOfRequiredParameters();
};
$rehp_apply_args = function($f, $args) {
  return $args instanceof JSArrayLikeInstance ?
    call_user_func_array($f, $args->__toPhpArray()) :
    call_user_func_array($f, $args);
};
$GLOBALS['rehp_arg_count'] = $rehp_arg_count; # Just so class defs can access it.
# JS null:
# Suitable for tripple equal reference identity.
$null = array();
$GLOBALS['null'] = $null; # Just so class defs can access it.
# JS undefined:
# Suitable for tripple equal reference identity. So that accessing missing
# properties of "objects" $o->field returns ::undefined. Is NOT double equal
# to ::null. All compiled js "light" code should use triple equal.
$undefined = null;
$GLOBALS['undefined'] = null; # Just so class defs can access it.
# JS current function context:
$jsContext = $null; # This one really is global.
$JSFunction = function($the_fun) {
  return new JSFunction($the_fun);
};

# TODO: Walk to detect multiple levels of inheriting. Standard library didn't
# require multiple prototype levels.
function instance_of($obj, $constructor) {
  return is_object($obj) && ($obj instanceof Closure) ? false :
    $obj->constructor === $constructor;
}

$instance_of = function ($obj, $constructor) {
  return instance_of($obj, $constructor);
};

# Still requires that consumers be transformed into the form:
# typeof ident => isset(ident) ? typeof(ident) : 'undefined'
# typeof notIdent => typeof(ident)
# isset(expr) ? 
# Even without that fix, the standard library will be ported over correctly.
function typeof($thing) {
  global $String;
  global $null;
  if ($thing === null) {
    return 'undefined';
  }
  if ($thing === $null) {
    return 'object';
  }
  if (is_callable($thing)) {
    return 'function';
  }
  if (instance_of($thing, $String)) {
    return "string";
  }
  $gotten_type = gettype($thing);
  if ($gotten_type === 'integer' || $gotten_type === 'double') {
    return 'number';
  }
  return $gotten_type;
};

# Version callable from ported standard library.
# Wraps result in $String.
$typeof = function($thing) use(&$String) {
  return $String->jsNew(typeof($thing));
};


# >>> Unsigned shift right:
# https://stackoverflow.com/a/43359819
# Then the >> operator could be derived from this by preserving the sign.
function unsigned_right_shift($a, $b) {
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
}

# Bit shifters: To emulate 32 bits on 64 bit platforms, we shift off any
# leading 32 bits.
# See also:
# https://stackoverflow.com/questions/29726466/difference-in-the-results-of-operations-bitwise-between-javascript-and-php/29726748

# https://stackoverflow.com/a/25587827
# https://stackoverflow.com/questions/6303241/find-windows-32-or-64-bit-using-php
function left_shift($a, $b) {
  $shifted = $a << $b; 
  if (PHP_INT_SIZE === 8) {
    # 64 bit.
    return ($shifted << 32) >> 32; 
  } else {
    # Size four means 32bit
    return $shifted;
  }
}

function right_shift($a, $b) {
  if (PHP_INT_SIZE === 8) {
    # 64 bit.
    $a_normalized = ($a << 32) >> 32; 
  } else {
    # Size four means 32bit
    $a_normalized = $a;
  }
  return $a_normalized >> $b; 
}

// Struct class (records)
class R implements ArrayAccess {
  public $fields = array();
  public $length = 0;
  function __construct() { 
    $count = func_num_args();
    for($i=0; $i < $count; $i++) {
      $this->fields[$i] = func_get_arg($i);
    }
    $this->length = $count;
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
  public function slice() {
    return new R(...$this->fields);
  }
}
function R() {
  return new R(...func_get_args());
}
// "Tagged" variants class. Fixed size
class V implements ArrayAccess {
  public $fields = NULL;
  public $length = 0;
  function __construct() { 
    $this->fields = array();
    $count = func_num_args();
    for($i=0; $i < $count; $i++) {
      $this->fields[$i] = func_get_arg($i);
    }
    $this->length = $count;
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
  public function slice() {
    return new V(...$this->fields);
  }
}

function V() {
  return new V(...func_get_args());
}

# Models the layout of Caml exceptions.
class RehpException extends Exception implements ArrayAccess {
  private $fields = array();
  # Pass this a "tag" that has shape like the following var:
  # This models the tag name (not its payload) but the final slot is a unique
  # error code number.
  # $Sys_error = [248, $caml_new_string('Sys_error'), -2];
  public function __construct($tag, $arg) {
    $code = $tag;
    parent::__construct("Rehp exception " . $tag . "(" . $arg . ")", $tag[2]);
    $this[0] = 0;
    $this[1] = $tag;
    $this[2] = $arg;
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
    global $jsContext;
    $this->__properties__ = array('constructor' => $jsFunction);
    $this->__proto__ = $jsFunction->prototype;
    $prev_global_context=$jsContext;
    $jsContext=$this;
    $this->constructor->apply($this, $args);
    $jsContext=$prev_global_context;
  }
  # Delegate to prototype.
  function __call($name, $args) {
    global $jsContext;
    $gotten = $this->$name;
    if (is_callable($gotten)) {
      $prev_global_context=$jsContext;
      $jsContext=$this;
      $ret = $gotten->apply($jsContext, $args);
      $jsContext=$prev_global_context;
      # And if functions don't return anything, that is NULL by default, which is
      # conveniently $undefined.
      return $ret;
    } else {
      throw new ErrorException("Undefined is not a function! " . " No Method " . $name);
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
    # If it is a wrapped string, get the underlying bytes.
    if(isset($offset->__php_str)) {
      $offset = $offset->__php_str;
      $this->$offset = $value;
    } else {
      $this->$offset = $value;
    }
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
    if(isset($offset->__php_str)) {
      $offset = $offset->__php_str;
      return $this->$offset;
    } else {
      return $this->$offset;
    }
  }
}

class JSArrayLikeInstance extends JSInstance implements ArrayAccess, Countable {
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
  public function count () {
    return $this->length;
  }

  public function __toPhpArray() {
    # Make it a normal array for purposes of calling call_user_func_array
    $array_of_args = [];
    for($i=0; $i < $this->length; $i++) {
      array_push($array_of_args, $this[$i]);
    }
    return $array_of_args;
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
    global $undefined;
    # Use the already implemented dot access delegation.
    if ($offset > $this->length - 1) {
      for($i = $this->length; $i < $offset - 1; $i++) {
        $this->$offset = $undefined;
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
  public function hasOwnProperty() {
    return false;
  }
  public function __all_enumerable_keys() {
    return array();
  }
  # An Object.keys function.
  public function __all_own_enumerable_keys() {
    return array();
  }
}


# Only functions that might be used as classes need to use this.
# This also serves as the "dummy function" since it can be mutated.
# That's kind of a misuse. Refactor later.
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
    global $jsContext;
    global $undefined;
    $arguments = func_get_args();
    # Prevent php from erroring.
    $context = array_shift($arguments);
    $origCount = count($arguments);
    for($i=$origCount; $i < $this->length; $i++) {
      array_push($arguments, $undefined);
    }
    $prev_global_context=$jsContext;
    $jsContext=$context;
    $ret = call_user_func_array($this->fun, $arguments);
    $jsContext=$prev_global_context;
    return $ret;
  }

  # Implements JavaScript f.apply()
  public function apply($context, $orig_array_of_args) {
    global $jsContext;
    global $undefined;
    $origCount = count($orig_array_of_args);
    if ($orig_array_of_args instanceof JSArrayLikeInstance) {
      # Make it a normal array for purposes of calling call_user_func_array
      $array_of_args = $orig_array_of_args->__toPhpArray();
    } else {
      $array_of_args = $orig_array_of_args;
    }
    for($i=$origCount; $i < $this->length; $i++) {
      array_push($array_of_args, $undefined);
    }
    $prev_global_context=$jsContext;
    $jsContext=$context;
    $ret = call_user_func_array($this->fun, $array_of_args);
    $jsContext=$prev_global_context;
    return $ret;
  }
  # When invoked as a regular function.
  public function __invoke() {
    global $jsContext;
    global $undefined;
    global $rehp_arg_count;
    $prev_global_context=$jsContext;
    $jsContext=NULL;
    $arguments = func_get_args();
    $required_args = $rehp_arg_count($this->fun);
    for($i=count($arguments); $i < $required_args; $i++) {
      $arguments[] = $undefined;
    }
    $ret = call_user_func_array($this->fun, $arguments);
    $jsContext=$prev_global_context;
    return $ret;
  }

  # Allow the object to respond to EDot.
  public function __set($name, $value) {
    $this->__properties__[$name] = $value;
  }
  public function __get($name) {
    global $undefined;
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
    return $undefined;
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

  # In case methods are attached to constructors like
  # $String->fromCharCode = ..
  function __call($name, $args) {
    global $jsContext;
    $gotten = $this->$name;
    if (is_callable($gotten)) {
      $prev_global_context=$jsContext;
      $jsContext=$this;
      $ret = $gotten->apply($jsContext, $args);
      $jsContext=$prev_global_context;
      # And if functions don't return anything, that is NULL by default, which is
      # conveniently $undefined.
      return $ret;
    } else {
      throw new ErrorException("Undefined is not a function! " . " No Method " . $name);
    }
  }
}

# In JS, Object is a function constructor for objects.
$GLOBALS['Object'] = $JSFunction(function() {
});
$GLOBALS['Object']->prototype = new HasNoKeys();


$Object = $GLOBALS['Object'];

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

$expect = function($x, $toEqual) use(&$jsEqEqEq, &$String) {
  if (!$jsEqEqEq($x, $toEqual)) {
    print("Expected:");
    if(instance_of($x, $String)) {
      var_dump("StringInstance");
      var_dump($x->__php_str);
    } else {
      var_dump($x);
    }
    print("To equal:");
    if(instance_of($toEqual, $String)) {
      var_dump("StringInstance");
      var_dump($toEqual->__php_str);
    } else {
      var_dump($toEqual);
    }
    throw new ErrorException("FAIL");
  }
};
# TODO: This needs fixing
$max_int=unsigned_right_shift(-1,1) | 0;
$min_int=$max_int + 1 | 0;

$caml_global_data=$Object->jsNew();
$jsoo_global_object = $Object->jsNew();
$joo_global_object = isset($jsoo_global_object) ? $jsoo_global_object : $Object->jsNew();


# The worst initialization API in history: JS Arrays.
$Array = $JSFunction(function() use(&$Array) {
  global $jsContext;
  global $undefined;
  $arg_count = func_num_args();
  # TODO: Check length not neg.

  if($arg_count === 1 && typeof(func_get_arg(0)) === "number") {
    for($i = 0; $i < func_get_arg(0); $i++) {
      $jsContext[$i] = $undefined;
    }
    $jsContext->length = func_get_arg(0);
  } else if ($arg_count === 1 && instance_of(func_get_arg(0), $Array)) {
    $literal = func_get_arg(0);
    for($i = 0; $i < $literal->length; $i++) {
      $jsContext[$i] = $literal[$i];
    }
    $jsContext->length = $literal->length;
  # Array literals initialize with a Php array.
  } else if ($arg_count === 1 && gettype(func_get_arg(0)) === "array") {
    $literal = func_get_arg(0);
    $len = count($literal);
    for($i = 0; $i < $len; $i++) {
      $jsContext[$i] = $literal[$i];
    }
    $jsContext->length = $len;
  } else {
    # Supplying multiple arguments, each arg an item.
    $args = func_get_args();
    for($i = 0; $i < $arg_count; $i++) {
      $jsContext[$i] = $args[$i];
    }
    $jsContext->length = $arg_count;
  }
});
$Array->displayName="Array";

$Array->prototype->length = 0;
# Cause to be auto-updated length.
$Array->prototype->__isArrayLike = true;

$Array->prototype->push = $JSFunction(function($itm) use(&$jsContext) {
  $jsContext[$jsContext->length] = $itm;
});

$ArrayLiteral = function() use($Array) {
  $args = func_get_args();
  return $Array->jsNew($args);
};

$String = $JSFunction(function($literal) {
  global $jsContext;
  $jsContext->__php_str = $literal;
  $jsContext->length = strlen($literal);
});
$String->displayName="String";
$String->fromCharCode = $JSFunction(function($code) use(&$String) {
  return $String->jsNew(chr($code));
});
# Adapted from sstur's js2php: BSD.
$String->prototype->charCodeAt = $JSFunction(function($i) use(&$String) {
  global $jsContext;
  $ch = mb_substr($jsContext->__php_str, $i, 1);
  if ($ch === false) return NAN;
  $len = strlen($ch);
  if ($len === 1) {
    $code = ord($ch[0]);
  } else {
    $ch = mb_convert_encoding($ch, 'UCS-2LE', 'UTF-8');
    $code = ord($ch[1]) * 256 + ord($ch[0]);
  }
  return (float)$code;
});
$String->prototype->concat = $JSFunction(function($other) use (&$String, &$jsContext) {
  return $String->jsNew($jsContext->__php_str . $other->__php_str);
});
$String->prototype->lastIndexOf = $JSFunction(function($find, $offset) use (&$jsContext, &$String) {
  $str = $jsContext->__php_str;
  global $undefined;
  if ($offset !== $undefind) {
    $offset = to_number($offset);
    if ($offset > 0 && $offset < $jsContext->length) {
      $str = mb_substr($str, 0, $offset + 1);
    }
  }
  $index = mb_strrpos($str, $search);
  return ($index === false) ? -1.0 : (float)$index;
});

# Adapted from sstur's js2php: BSD.
$String->prototype->slice = $JSFunction(function($start) use (&$String, &$jsContext) {
  global $undefined;
  $end = func_num_args() > 1 ? func_get_arg(1) : $undefined;
  $self = $jsContext;
  $len = $self->length;
  if ($len === 0) {
    return '';
  }
  $start = (int)$start;
  if ($start < 0) {
    $start = $len + $start;
    if ($start < 0) $start = 0;
  }
  if ($start >= $len) {
    return '';
  }
  $end = ($end === $undefined) ? $len : (int)$end;
  if ($end < 0) {
    $end = $len + $end;
  }
  if ($end < $start) {
    $end = $start;
  }
  if ($end > $len) {
    $end = $len;
  }
  return mb_substr($self->__php_str, $start, $end - $start);
});

# From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
$String->prototype->substr = $JSFunction(function($start) {
  global $jsContext;
  global $undefined;
  $num = func_num_args() > 1 ? func_get_arg(1) : $undefined;
  $len = $jsContext->length;
  if ($len === 0) {
    return '';
  }
  $start = (int)$start;
  if ($start < 0) {
    $start = $len + $start;
    if ($start < 0) $start = 0;
  }
  if ($start >= $len) {
    return '';
  }
  if ($num === $undefined) {
    return mb_substr($jsContext->__php_str, $start);
  } else {
    return mb_substr($jsContext->__php_str, $start, $num);
  }
});
# From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
$String->prototype->substring = $JSFunction(function($start) {
  global $undefined;
  $end = func_num_args() > 1 ? func_get_arg(1) : $undefined;
  $len = $jsContext->length;
  //if second param is absent
  if (func_num_args() === 1) {
    $end = $len;
  }
  $start = (int)$start;
  $end = (int)$end;
  if ($start < 0) $start = 0;
  if ($start > $len) $start = $len;
  if ($end < 0) $end = 0;
  if ($end > $len) $end = $len;
  if ($start === $end) {
    return '';
  }
  if ($end < $start) {
    list($start, $end) = array($end, $start);
  }
  return mb_substr($jsContext->__php_str, $start, $end - $start);
});

$String->prototype->toString = $JSFunction(function() {
  global $jsContext;
  return $jsContext;
});
# From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
$String->prototype->match = $JSFunction(function($regex) use (&$RegExp) {
  global $jsContext;
  $str = $jsContext;
  if (!(instance_of($regex, $RegExp))) {
    $regex = $RegExp->jsNew($regex);
  }
  if (!$regex->globalFlag) {
    return $regex->exec($jsContext);
  }
  $results = $Array->jsNew();
  $index = 0;
  $preg = $regex->toPhpString(true);
  while (preg_match($preg, $jsContext->__php_str, $matches, PREG_OFFSET_CAPTURE, $index) === 1) {
    $foundAt = $matches[0][1];
    $foundStr = $matches[0][0];
    $index = $foundAt + strlen($foundStr);
    $results->push($String->jsNew($foundStr));
  }
  return $results;
});

// Adapted from:
// https://github.com/sstur/js2php/blob/master/php/helpers/helpers.php
$to_string = function($value) use (&$String) {
  global $undefined;
  global $null;
  if ($value === $undefined) {
    return $String->jsNew('undefined');
  }
  if ($value === $null) {
    return $String->jsNew('null');
  }
  $type = gettype($value);
  if ($type === 'string') {
    return $String->jsNew($value);
  }
  if ($type === 'boolean') {
    return $String->jsNew($value ? 'true' : 'false');
  }
  if ($type === 'integer' || $type === 'double') {
    if ($value !== $value) return $String->jsNew('NaN');
    if ($value === INF) return $String->jsNew('Infinity');
    if ($value === -INF) return $String->jsNew('-Infinity');
    return $String->jsNew($value . '');
  }
  return $value->toString();
 
  // TODO:
  // if (isset($value->toString) && is_callable(($value->toStr
  //   $fn = $value->get('toString');
  //   if ($fn instanceof Func) {
  //     return $fn->call($value);
  //   } else {
  //     throw new Ex(Error::create('Cannot convert object to primitive value'));
  //   }
  // }
  throw new ErrorException('Cannot convert object of unsupported type to to primitive value');
};



// Patch the original one (requires corresponding chage in importing of
// stdlib).
$caml_new_string_patch = function($s) use (&$String, &$to_string, &$MlBytes) {
  $phpType = gettype($value);
  if($phpType === 'string') {
    $s = $String->jsNew($s);
    return $MlBytes->jsNew(0,$s,$s->length);
  } else {
    $s = $to_string($s);
    return $MlBytes->jsNew(0,$s,$s->length);
  }
};


# Adapted from
# From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
$RegExp = $JSFunction(function() use (&$to_string) {
  global $jsContext;
  global $null;
  global $undefined;
  $jsContext->__php_str_source = '';
  $jsContext->ignoreCaseFlag = false;
  $jsContext->globalFlag = false;
  $jsContext->multilineFlag = false;
  $jsContext->protoObject = $undefined;
  $jsContext->classMethods = $undefined;
  $jsContext->protoMethods = $undefined;
  $args = func_get_args();
  if (count($args) > 0) {
    // Assume this is only ever constructed with a PHP string as input since
    // it's generated via compiler.
    $zero = $args[0];
    $jsContext->__php_str_source = ($zero === $undefined) ? '(?:)' : $zero;
    $flags = array_key_exists('1', $args) ? $to_string($args[1])->__php_str : '';
    $jsContext->ignoreCaseFlag = (strpos($flags, 'i') !== false);
    $jsContext->globalFlag = (strpos($flags, 'g') !== false);
    $jsContext->multilineFlag = (strpos($flags, 'm') !== false);
  }
});
$RegExp->displayName="RegExp";
/**
 * Note: JS RegExp has different character classes than PCRE. For instance
 *   in JS `\w` is [ \f\n\r\t\v​\xA0] (and a bunch of unicode spaces) but
 *   in PCRE it's only [ \f\n\r\t]
 * @param bool $pcre - whether to write pcre format. pcre does not allow /g
 *  flag but does support the non-standard /u flag for utf8
 * @return string
 */
$RegExp->prototype->toPhpString=$JSFunction(function($pcre) use(&$String) {
  $pcre=false;
  global $jsContext;
  $__php_str_source = $jsContext->__php_str_source;
  $flags = '';
  if ($jsContext->ignoreCaseFlag) {
    $flags .= 'i';
  }
  //pcre doesn't support the global flag
  if (!$pcre && $jsContext->globalFlag) {
    $flags .= 'g';
  }
  //pcre will interpret the regex and the subject as utf8 with this flag
  if ($pcre) {
    $flags .= 'u';
  }
  if ($jsContext->multilineFlag) {
    $flags .= 'm';
  }
  return '/' . $__php_str_source . '/' . $flags;
});

$RegExp->prototype->toString=$JSFunction(function($pcre) use(&$String) {
  global $jsContext;
  return $String->jsNew($jsContext->toPhpString());
});

$RegExp->prototype->exec=$JSFunction(function($jsStr) use(&$to_string, &$Array, &$String) {
  global $null;
  global $jsContext;
  $str = $to_string($jsStr);
  //todo $offset
  $offset = 0;

  $result = preg_match($jsContext->toPhpString(true), $str->__php_str, $matches, PREG_OFFSET_CAPTURE, $offset);
  if ($result === false) {
    throw new ErrorException('Error executing Regular Expression: ' . $jsContext->toPhpString(true));
  }
  if ($result === 0) {
    return $null;
  }
  $index = $matches[0][1];
  // Last index is broken
  // $jsContext->lastIndex = (float)($index + strlen($matches[0][0]));
  $arr = $Array->jsNew();
  foreach ($matches as $match) {
    $arr->push($String->jsNew($match[0]));
  }
  $arr->index =(float)$index;
  $arr->input=$str;
  return $arr;
});
$RegExp->prototype->test=$JSFunction(function($str) {
  global $jsContext;
  $result = preg_match($jsContext->toPhpString(true), $to_string($str)->__php_str);
  return ($result !== false);
});
/**
 * Format replacement string for preg_replace
 * @param string $str
 * @return string
 */
$RegExp->toReplacementString=function ($str) {
  $str = str_replace('\\', '\\\\', $str);
  $str = str_replace('$&', '$0', $str);
  return $str;
};


$jsPlus = function($l, $r) use(&$to_string) {
  if (typeof($l) === "string") {
    if (typeof($r) === "string") {
      return $l->concat($r);
    } else {
      return $l->concat($to_string($r));
    }
  } else {
    $l = $to_string($l);
    if (typeof($r) === "string") {
      // throw new ErrorException("Left is " . $to_string($l) . " right is " . $r);
      return $to_string($l)->concat($r);
    } else {
      return $l + $r;
    }
  }
};


# Function copyright :Copyright (c) 2014, sstur@me.com. All rights reserved.
# BSD
function to_number($value) {
  global $null;
  global $undefined;
  if ($value === $undefined) {
    return NAN;
  }
  if ($value === $null) {
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
  if(is_callable($value)) {
    throw new ErrorException("Error: Trying to convert function to string.");
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
  global $jsContext;
  $jsContext->E = M_E;
  $jsContext->LN10 = M_LN10;
  $jsContext->LN2 = M_LN2;
  $jsContext->LOG10E = M_LOG10E;
  $jsContext->LOG2E = M_LOG2E;
  $jsContext->PI = M_PI;
  $jsContext->SQRT1_2 = M_SQRT1_2;
  $jsContext->SQRT2 = M_SQRT2;
});
$MathConstructor->prototype->random = $JSFunction(function() use (&$randMax) {
  return (float)(mt_rand() / ($randMax + 1));
});
$MathConstructor->prototype->round = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)round($num);
});
$MathConstructor->prototype->ceil = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)ceil($num);
});
$MathConstructor->prototype->floor = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)floor($num);
});
$MathConstructor->prototype->abs = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)abs($num);
});
$MathConstructor->prototype->max = $JSFunction(function() {
  $max = -INF;
  foreach (func_get_args() as $num) {
    $num = to_number($num);
    if (is_nan($num)) return NAN;
    if ($num > $max) $max = $num;
  }
  return (float)$max;
});
$MathConstructor->prototype->min = $JSFunction(function() {
  $min = INF;
  foreach (func_get_args() as $num) {
    $num = to_number($num);
    if (is_nan($num)) return NAN;
    if ($num < $min) $min = $num;
  }
  return (float)$min;
});
$MathConstructor->prototype->pow = $JSFunction(function($num, $exp) {
  $num = to_number($num);
  $exp = to_number($exp);
  if (is_nan($num) || is_nan($exp)) {
    return NAN;
  }
  return (float)pow($num, $exp);
});
$MathConstructor->prototype->log = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)log($num);
});
$MathConstructor->prototype->exp = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)exp($num);
});
$MathConstructor->prototype->sqrt = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)sqrt($num);
});
$MathConstructor->prototype->sin = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)sin($num);
});
$MathConstructor->prototype->cos = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)cos($num);
});
$MathConstructor->prototype->tan = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)tan($num);
});
$MathConstructor->prototype->atan = $JSFunction(function($num) {
  $num = to_number($num);
  return is_nan($num) ? NAN : (float)atan($num);
});
$MathConstructor->prototype->atan2 = $JSFunction(function($y, $x) {
  $y = to_number($y);
  $x = to_number($x);
  if (is_nan($y) || is_nan($x)) {
    return NAN;
  }
  return (float)atan2($y, $x);
});


$Math=$MathConstructor->jsNew();

// NOT YET IMPLEMENTED - FAKE STUBS THAT DONT FAIL BUT DONT WORK
class MlFakeFile {
  public function __construct($bytes) {
  }
}
$caml_create_bytes=function($c) { };

// $caml_initial_time=round(microtime(true) * 1000) * 0.001;

// $caml_sys_time= function() use ($caml_initial_time) {
//   return round(microtime(true) * 1000) * 0.001 - $caml_initial_time;
// };

# Close enough for our limited use case.
$DateClass = $JSFunction(function() {
});
// Hack!
$DateClass->prototype->jsNew=$JSFunction(function() {
  return round(microtime(true) * 1000);
});
$Date = $DateClass->jsNew();


$caml_register_global= function($n, $v, $name_opt) use (&$caml_global_data) {
  $caml_global_data[$n + 1] = $v;
  if($name_opt){
    $caml_global_data[$name_opt] = $v;
  }
};

$caml_oo_last_id=0;
$caml_fresh_oo_id=function($caml_oo_last_id) {
  global $caml_oo_last_id;
  return $caml_oo_last_id++;
};
$caml_method_cache=$ArrayLiteral();
# Not needed for most basic programs.
$caml_get_public_method=function($obj, $tag, $cacheid) use ($caml_method_cache) {
  global $null;
  $meths=$obj[1];
  $ofs=$caml_method_cache[$cacheid];
  if($ofs === $null) {
   for($i=$caml_method_cache->length;$i < $cacheid;$i++)
    $caml_method_cache[$i] = 0;
  } else {
    if($meths[$ofs] === $tag) {
      return $meths[$ofs - 1];
    }
  }
  $li=3;
  $hi=($meths[1] * 2 + 1);
  $mi;
  while($li < $hi) {
    $mi = right_shift($li + $hi, 1) | 1;
    if($tag < $meths[$mi + 1]) {
      $hi = $mi - 2;
    } else{
      $li = $mi;
    }
  }
  $caml_method_cache[$cacheid] = $li + 1;
  return $tag == $meths[$li + 1] ? $meths[$li] : 0;
};

$caml_bytes_unsafe_get = function($s, $i) {
  switch($s->t & 6) {
    default:
    if($i >= $s->c->length) {
      return 0;
    }
    case 0:
      return $s->c->charCodeAt($i);
    case 4:
      return $s->c[$i];
  }
};



# TODO: Test this against the JS version for the following inputs:
# $_a_=[255,0,0,32752];
# $_b_=[255,0,0,65520];
# $_c_=[255,1,0,32752];
# $_d_=[255,16777215,16777215,32751];
# $_e_=[255,0,0,16];
# $_f_=[255,0,0,15536];
$caml_int64_float_of_bits=function($x) use($Math) {
  $exp = right_shift($x[3] & 0x7fff, 4);
  if ($exp == 2047) {
    if (($x[1]|$x[2]|($x[3]&0xf)) == 0)
      return ($x[3] & 0x8000)?(-INF):INF;
    else
      return NAN;
  }
  $k = $Math->pow(2,-24);
  $res = ($x[1]*$k+$x[2])*$k+($x[3]&0xf);
  if ($exp > 0) {
    $res += 16;
    $res *= $Math->pow(2, $exp - 1027);
  } else {
    $res *= $Math->pow(2,-1026);
  }
  if ($x[3] & 0x8000) {
    $res = - $res;
  }
  return $res;
};

$polymorphic_log= function($itm) use($String) {
  if (instance_of($itm->c, $String)) {
    print("LOG:" . $itm->c->__php_str);
  } else {
    print("LOG Non String:");
    var_dump($itm->c->constructor == $String);
    // var_dump($itm);
  }
};

# Restore some of the properties of === when strings are wrapped etc.
$jsEqEqEq=function($a, $b) use(&$String) {
  if($a===$b) {
    return true;
  }
  if (instance_of($a, $String) && instance_of($b, $String)) {
    return $b->__php_str === $a->__php_str;
  }
  return false;
};

//Provides: caml_get_global_data mutable
//Requires: caml_global_data
$caml_get_global_data = function() { return $caml_global_data; };

//Raise exception


//Provides: caml_raise_constant (const)
//Version: < 4.02
$caml_raise_constant = function($tag) { throw [0, $tag]; };

//Provides: caml_raise_constant (const)
//Version: >= 4.02
$caml_raise_constant = function($tag) { throw $tag; };

//Provides: caml_return_exn_constant (const)
//Version: < 4.02
$caml_return_exn_constant = function($tag) { return [0, $tag]; };

//Provides: caml_return_exn_constant (const)
//Version: >= 4.02
$caml_return_exn_constant = function($tag) { return $tag; };

//Provides: caml_raise_with_arg (const, const)
$caml_raise_with_arg = function($tag, $arg) {
  throw new RehpException($tag, $arg);
};

//Provides: caml_raise_with_string (const, const)
//Requires: caml_raise_with_arg,caml_new_string
$caml_raise_with_string = function($tag, $msg) use(&$caml_raise_with_arg, &$caml_new_string) {
  return $caml_raise_with_arg ($tag, $caml_new_string($msg));
};

//Provides: caml_raise_sys_error (const)
//Requires: caml_raise_with_string, caml_global_data
$caml_raise_sys_error = function($msg) use(&$caml_raise_with_string, &$caml_global_data) {
  return $caml_raise_with_string($caml_global_data['Sys_error'], $msg);
};

//Provides: caml_failwith (const)
//Requires: caml_raise_with_string, caml_global_data
$caml_failwith = function($msg) use(&$caml_raise_with_string, &$caml_global_data) {
  return $caml_raise_with_string($caml_global_data['Failure'], $msg);
};

///////////// Io

//Provides: caml_sys_close
//Requires: caml_global_data
$caml_sys_close=function($fd) use(&$caml_global_data) {
  unset ($caml_global_data->fds[fd]);
  return 0;
};

//Provides: caml_std_output
//Requires: caml_new_string, caml_ml_string_length, caml_ml_channels
$caml_std_output = function($chanid,$s) use (&$caml_ml_channels, &$caml_new_string, &$caml_ml_string_length) {
  $chan = $caml_ml_channels[$chanid];
  $str = $caml_new_string($s);
  $slen = $caml_ml_string_length($str);
  $chan->file->write($chan->offset, $str, 0, $slen);
  $chan->offset += $slen;
  return 0;
};

//Provides: caml_sys_open
//Requires: caml_raise_sys_error, caml_global_data
//Requires: caml_create_bytes,MlFakeFile
//Requires: js_print_stderr, js_print_stdout
//Requires: caml_std_output
//Requires: resolve_fs_device
$caml_sys_open_internal = new JSFunction(function($idx,$output,$file,$flags) use (&$caml_global_data, &$undefined, &$Array) {
  if($caml_global_data->fds === $undefined){
    $caml_global_data->fds = $Array->jsNew();
  }
  $flags=$flags?$flags:(object)array();
  $info = (object)array();
  $info->file = $file;
  $info->offset = $flags->append ? $file->length(): 0;
  $info->flags = $flags;
  $info->output = $output;
  $caml_global_data->fds[$idx] = $info;
  if(!$caml_global_data->fd_last_idx || $idx > $caml_global_data->fd_last_idx)
    $caml_global_data->fd_last_idx = $idx;
  return $idx;
});
$caml_sys_open = function($name, $flags, $_perms) use(&$caml_sys_open_internal, &$caml_raise_sys_error, &$caml_global_data, &$caml_std_output) {
  $f = (object)array();
  while($flags) {
    switch($flags[1]) {
    case 0: $f->rdonly = 1;break;
    case 1: $f->wronly = 1;break;
    case 2: $f->append = 1;break;
    case 3: $f->create = 1;break;
    case 4: $f->truncate = 1;break;
    case 5: $f->excl = 1; break;
    case 6: $f->binary = 1;break;
    case 7: $f->text = 1;break;
    case 8: $f->nonblock = 1;break;
    }
    $flags=$flags[2];
  }
  if($f->rdonly && $f->wronly)
    $caml_raise_sys_error($name->toString() . " : flags Open_rdonly and Open_wronly are not compatible");
  if($f->text && $f->binary)
    $caml_raise_sys_error($name->toString() . " : flags Open_text and Open_binary are not compatible");
  $root = $resolve_fs_device($name);
  $file = $root->device->open($root->rest,$f);
  $idx = $caml_global_data->fd_last_idx ? $caml_global_data->fd_last_idx : 0;
  return $caml_sys_open_internal($idx + 1, $caml_std_output,$file,$f);
};
$caml_sys_open_internal(0,$caml_std_output, new MlFakeFile($caml_create_bytes(0))); //stdin
$caml_sys_open_internal(1,$js_print_stdout, new MlFakeFile($caml_create_bytes(0))); //stdout
$caml_sys_open_internal(2,$js_print_stderr, new MlFakeFile($caml_create_bytes(0))); //stderr


// ocaml Channels

//Provides: caml_ml_set_channel_name
$caml_ml_set_channel_name = function() {
  return 0;
};

//Provides: caml_ml_channels
$caml_ml_channels = $Array->jsNew();

//Provides: caml_ml_out_channels_list
//Requires: caml_ml_channels
$caml_ml_out_channels_list = function() use(&$caml_ml_channels) {
  $l = 0;
  for($c = 0; $c < $caml_ml_channels->length; $c++){
    if($caml_ml_channels[$c] && $caml_ml_channels[$c]->opened && $caml_ml_channels[$c]->out)
      $l=[0, $caml_ml_channels[$c]->fd, $l];
  }
  return $l;
};

//Provides: caml_ml_open_descriptor_out
//Requires: caml_ml_channels, caml_global_data
//Requires: caml_raise_sys_error
$caml_ml_open_descriptor_out=function($fd)
  use (&$caml_global_data,&$caml_ml_channels,&$caml_raise_sys_error) {
  $data=$caml_global_data->fds[$fd];
  if($data->flags->rdonly) {
    $caml_raise_sys_error('fd ' . $fd . ' is readonly');
  }
  $channel= (object)array(
    'file'=>$data->file,
    'offset'=>$data->offset,
    'fd'=>$fd,
    'opened'=>true,
    'out'=>true,
    'buffer'=>''
  );
  $caml_ml_channels[$channel->fd] = $channel;
  return $channel->fd;
};
//Provides: caml_ml_open_descriptor_in
//Requires: caml_global_data,caml_sys_open,caml_raise_sys_error, caml_ml_channels
$caml_ml_open_descriptor_in=function() use (&$caml_global_data,&$caml_ml_channels,&$caml_raise_sys_error) {
  global $null;
  $data=$caml_global_data->fds[$fd];
  if($data->flags->wronly) {
    $caml_raise_sys_error('fd' . $fd . ' is writeonly');
  }
  $channel= (object)array(
    'file'=>$data->file,
    'offset'=>$data->offset,
    'fd'=>$fd,
    'opened'=>true,
    'out'=>false,
    'refill'=>$null
  );
  $caml_ml_channels[$channel->fd] = $channel;
  return $channel->fd;
};

$joo_global_object->caml_failwith=$caml_failwith;
$joo_global_object->caml_fresh_oo_id=$caml_fresh_oo_id;
$joo_global_object->caml_int64_float_of_bits=$caml_int64_float_of_bits;
$joo_global_object->caml_ml_open_descriptor_in=$caml_ml_open_descriptor_in;
$joo_global_object->caml_ml_open_descriptor_out=$caml_ml_open_descriptor_out;


// global $ArrayLiteral;
// global $caml_bytes_unsafe_get;
// global $caml_bytes_unsafe_set;
// global $caml_call_gen;
// global $caml_check_bound;
// global $caml_new_string;
// global $caml_register_global;
// global $caml_wrap_exception;
// global $polymorphic_log;
// global $undefined;





# Php equality table: https://ruempler.eu/2015/01/03/the-php-equality-table/
# JS equality table: https://dorey.github.io/JavaScript-Equality-Table/

$expect($typeof($identifierThatDoesntExist), $String->jsNew("undefined")); # Php null is our representation of undefined.
$expect(typeof($identifierThatDoesntExist), "undefined"); # Php null is our representation of undefined.
$expect($typeof(null), $String->jsNew("undefined")); # Php null is our representation of undefined.
$expect(typeof(null), "undefined"); # Php null is our representation of undefined.
$expect($typeof($null), $String->jsNew("object"));
$expect(typeof($null), "object");
$expect($typeof($undefined), $String->jsNew("undefined"));
$expect(typeof($undefined), "undefined");
$expect($undefined === $null, false);
$expect($undefined == $null, true);
$expect($typeof('asdf'), $String->jsNew("string"));
$expect(typeof('asdf'), "string");
$expect($typeof("asdf"), $String->jsNew("string"));
$expect(typeof("asdf"), "string");
$expect($typeof(function() {}), $String->jsNew("function"));
$expect(typeof(function() {}), "function");
$expect($typeof(234.0), $String->jsNew("number"));
$expect(typeof(234.0), "number");
$expect($typeof(2), $String->jsNew("number"));
$expect(typeof(2), "number");
$expect($typeof($asdf->foo), $String->jsNew("undefined"));
$expect(typeof($asdf->foo), "undefined");
$expect($asdf->foo, $undefined);
$expect($typeof(true), $String->jsNew("boolean"));
$expect(typeof(true), "boolean");

// var_dump(shift_left_32(0, 1));
$expect(right_shift(234321341324, 5), -59433124);


# This:
// function X() {$this->bar = "hello";};
// $X->prototype->foo = function($arg) {print($this->bar);};
// $inst = new $X($initArg);
// $inst->foo(101);
# Becomes:
$X = $JSFunction(function($arg, $h) {
  global $jsContext;
  $jsContext->bar = $arg;
});

$expect($X->length, 2);

# It can be called just like a regular function in case it wasn't meant to be a
# constructor.
$X->prototype->foo = $JSFunction(function($arg) {
  global $jsContext;
  return $jsContext->bar . $arg;
});
$inst = $X->jsNew('CONSTRUCTORARG', 0);
$expect($inst->foo('!'), 'CONSTRUCTORARG!');
$inst->anotherField = 'anotherValue';

# Test what we will compile for-in loops to.
$observedKeys = array();
$observedVals = array();
foreach($inst->__all_enumerable_keys() as $_ => $key) {
  $observedKeys[] = $key;
  $observedVals[] = $inst[$key];
}

$expect(implode(',', $observedKeys), 'bar,anotherField');

$tmpThis = (object)array('bar' => 9);
$X->call($tmpThis, 'theArgPassedToCall');
$expect($tmpThis->bar, 'theArgPassedToCall');

$X->apply($tmpThis, ['theArgPassedToApply']);
$expect($tmpThis->bar, 'theArgPassedToApply');

$arr = $ArrayLiteral('hi', 'there');
$expect($arr->length, 2);
$arr = $ArrayLiteral(0);
$expect($arr->length, 1);
$arr = $ArrayLiteral(0, 1);
$expect($arr->length, 2);
$arr = $ArrayLiteral(1, 1);
$expect($arr->length, 2);
$arr = $Array->jsNew(1, 1);
$expect($arr->length, 2);
$arr = $Array->jsNew(0);
$expect($arr->length, 0);
$arr = $Array->jsNew(8);
$expect($arr->length, 8);
$arr = $Array->jsNew('hello');
$expect($arr->length, 1);
$arr = $Array->jsNew(8, 'hello');
$expect($arr->length, 2);
$arr[2] = 'new item';
$expect($arr->length, 3);
$arr[4] = 'new item whoa';
$expect($arr->length, 5);
$expect($arr[3], $GLOBALS['undefined']);
$arr->addThisProperty = 'hi';
$expect(implode(',', $arr->__all_own_enumerable_keys()), '0,1,2,4,addThisProperty');


// $test_sys_error = [248, $caml_new_string('Sys_error'), -2];
// $camlException = new RehpException($test_sys_error, 'msg');
// $expect($camlException[0], 0);
// $expect($camlException[1], $test_sys_error);
// $expect($camlException[2], 'msg');

// try {
//   throw $camlException; 
// } catch (RehpException $e) {
//   $expect($camlException[0], 0);
//   $expect($camlException[1], $test_sys_error);
//   $expect($camlException[2], 'msg');
// }
$one=$String->jsNew('testMe');
$expect(instance_of($one, $String), true);
$two=$String->jsNew('testMe');
$expect($one,$two);

$expect("abc" === "abc", true);
$abc = $String->jsNew('abc');
$abc2 = $String->jsNew('abc');
$expect($abc, $abc2);
$expect($jsEqEqEq($abc, $abc2), true);
$expect($abc === $abc2, false);
$expect("abc" === "abc", true); // Probably shouldn't rely on this.

$expect($jsEqEqEq($abc, "abc"), false); // One is wrapped

$str = $String->jsNew('xabcdef');
$reg = $RegExp->jsNew('a(b|c)', 'i');
$expect($reg->__php_str_source, 'a(b|c)');
$tos = $expect(is_callable($JSFunction(function(){})), true);
$expect($reg->toString(), $String->jsNew('/a(b|c)/i'));
$match = $reg->exec($str);
$expect($match[0], $String->jsNew('ab'));
$expect($match->length, 2);
// $expect($reg->lastIndex, 3.0);

$reg = $RegExp->jsNew('[^\\/]*\\/', 'i');
$expect($reg->__php_str_source, '[^\\/]*\\/');
$expect($reg->toPhpString(), '/[^\\/]*\\//i');
$expect($reg->toString(), $String->jsNew('/[^\\/]*\\//i'));
$match = $reg->exec($String->jsNew('file/system/'));
$expect($match[0], $String->jsNew('file/'));
$expect($match->length, 1);

$test_dir=$String->jsNew('/static/');
$expect($test_dir->match($RegExp->jsNew('[^\\/]*\\/'))[0], $String->jsNew('/'));

$one_escaped=$String->jsNew('\0');

$expect($rehp_arg_count(function() { }), 0);
$outside = function($a, $b) {
};
$run = function() use(&$outside, &$rehp_arg_count, &$expect) {
  $expect($rehp_arg_count($outside), 2);
};
$run();

$variant = V(0, "hello", "there");
$expect($variant[0], 0);
$expect(count($variant->fields), 3);
$expect($variant->length, 3);
$record = R(0, "hello", "there");
$expect($record[0], 0);
$expect($record->length, 3);

$expect($rehp_apply_args($JSFunction(function($a, $b){return $a+$b;}), [9, 4]), 13);

echo count($ArrayLiteral(9, 4));

$expect($rehp_apply_args($JSFunction(function($a, $b){return $a+$b;}), $ArrayLiteral(9, 4)), 13);




$noArgs = $JSFunction(function(){});

// $expect($Math->min(-1, 0, 300), -1);

