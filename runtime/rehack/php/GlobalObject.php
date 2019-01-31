<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

namespace Rehack;

use namespace HH\Lib\Math;

function rehack_arity(mixed $f): int {
  if (PHP\is_object($f) && ($f is \Closure)) {
    return (new \ReflectionFunction($f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
}

// TODO: Walk to detect multiple levels of inheriting. Standard library didn't
// require multiple prototype levels.
function instance_of(mixed $obj, mixed $constructor): bool {
  if (PHP\is_object($obj) && ($obj is \Closure)) {
    return false;
  } else if ($obj === null || $constructor === null) {
    return false;
  }
  /* HH_IGNORE_ERROR[4062] constructor is returned by property accessor */
  return isset($obj->constructor) && $obj->constructor === $constructor;
}

// Still requires that consumers be transformed into the form:
// typeof ident => isset(ident) ? typeof(ident) : 'undefined'
// typeof notIdent => typeof(ident)
// isset(expr) ?
// Even without that fix, the standard library will be ported over correctly.
function typeof(mixed $thing): string {
  $G = GlobalObject::get();
  if ($thing === null) {
    return 'undefined';
  }
  if ($thing === $G->null) {
    return 'object';
  }
  if (PHP\is_callable($thing)) {
    return 'function';
  }
  if (instance_of($thing, $G->String)) {
    return "string";
  }
  if ($thing is int || $thing is float) {
    return 'number';
  }
  if ($thing is bool) {
    return 'boolean';
  }
  if ($thing is string) {
    return 'string';
  }
  if (PHP\is_object($thing) || is_array($thing)) {
    return 'object';
  }
  throw new \ErrorException('unknown type');
}

// Function copyright :Copyright (c) 2014, sstur@me.com. All rights reserved.
// BSD
function to_number(mixed $value): float {
  $G = GlobalObject::get();
  if ($value === $G->undefined) {
    return \NAN;
  }
  if ($value === $G->null) {
    return 0.0;
  }
  if ($value is float) {
    return $value;
  }
  if ($value is int) {
    return (float)$value;
  }
  if ($value is bool) {
    return ($value ? 1.0 : 0.0);
  }
  if (PHP\is_callable($value)) {
    throw new \ErrorException("Error: Trying to convert function to string.");
  }
  // Not supported now
  // if ($value is ProtoInstance) {
  //   return to_number(to_primitive($value));
  // }
  //trim whitespace
  $value = PHP\preg_replace('/^[\s\x0B\xA0]+|[\s\x0B\xA0]+$/u', '', $value);
  if ($value === '') {
    return 0.0;
  }
  if ($value === 'Infinity' || $value === '+Infinity') {
    return \INF;
  }
  if ($value === '-Infinity') {
    return -\INF;
  }
  $m = darray[];
  if (PHP\preg_match('/^([+-]?)(\d+\.\d*|\.\d+|\d+)$/i', $value, &$m)) {
    return (float)$value;
  }
  if (
    PHP\preg_match(
      '/^([+-]?)(\d+\.\d*|\.\d+|\d+)e([+-]?[0-9]+)$/i',
      $value,
      &$m,
    )
  ) {
    return ($m[1] . $m[2]) ** $m[3];
  }
  if (PHP\preg_match('/^0x[a-z0-9]+$/i', $value, &$m)) {
    return (float)PHP\hexdec(PHP\substr($value, 2));
  }
  return \NAN;
}

final class Ref {
  public $contents = null;
  public function contents(mixed ...$args): mixed {
    $contents = $this->contents;
    return $contents(...$args);
  }
}

// Struct class (records)
final class R implements \ArrayAccess<mixed, mixed> {
  public darray<mixed, mixed> $fields;
  public int $length;
  public function __construct(mixed ...$fields) {
    $this->fields = \darray($fields);
    $this->length = PHP\count($fields);
  }
  public function offsetSet(mixed $offset, mixed $value): void {
    $this->fields[$offset] = $value;
  }
  public function offsetExists(mixed $offset): bool {
    return PHP\array_key_exists($offset, $this->fields);
  }
  public function offsetUnset(mixed $offset): void {
  }
  public function offsetGet(mixed $offset): mixed {
    return $this->fields[$offset];
  }
  public function slice(): R {
    return new R(...$this->fields);
  }
}
// "Tagged" variants class. Fixed size
final class V implements \ArrayAccess<mixed, mixed> {
  public darray<mixed, mixed> $fields;
  public int $length;
  public function __construct(mixed ...$fields) {
    $this->fields = \darray($fields);
    $this->length = PHP\count($fields);
  }
  public function offsetSet(mixed $offset, mixed $value): void {
    $this->fields[$offset] = $value;
  }
  public function offsetExists(mixed $offset): bool {
    return PHP\array_key_exists($offset, $this->fields);
  }
  public function offsetUnset(mixed $offset): void {
  }
  public function offsetGet(mixed $offset): mixed {
    return $this->fields[$offset];
  }
  public function slice() {
    return new V(...$this->fields);
  }
}

function R(mixed ...$args): R {
  return new R(...$args);
}

function V(mixed ...$args) {
  return new V(...$args);
}

final class StackPrinter {
  public static function callStack(varray<darray<string, string>> $stacktrace): string {
    $result = "";
    $filesAndLineNumbers = PHP\fb\varray_map(
      function($itm) {
        $file = empty($itm['file']) ? '<Unknown-file>' : $itm['file'];
        $line = empty($itm['line']) ? '??' : $itm['line'];
        return $file.':'.$line;
      },
      $stacktrace,
    );
    $max =
      PHP\max(PHP\fb\varray_map($s ==> PHP\strlen($s), $filesAndLineNumbers));
    $i = 1;
    foreach ($stacktrace as $node) {
      $pad = " ".
        PHP\str_repeat(" ", $max - PHP\strlen($filesAndLineNumbers[$i])).
        " | ";
      $result = $result.
        "  ^ ".
        $filesAndLineNumbers[$i].
        $pad.
        $node['class'].
        $node['type'].
        $node['function'].
        "(..)".
        "\n";
      $i++;
    }
    return $result."\n";
  }
}

// A class that wraps thrown objects in something that implement Throwable
// because PHP will have it no other way.
final class RehpExceptionBox extends \Exception {
  public static int $printThrownExceptions = 0;

  private function display(): string {
    $G = GlobalObject::get();
    try {
      $str =
        "RehpExceptionBox(".$G->js_to_string($this->contents)->__php_str.")";
    } catch (\Throwable $_t) {
      $str = "ReHP Boxed exception. Failure attempting to extract message";
    }
    $lines = PHP\explode("\n", $str);
    $lines = PHP\fb\varray_map(
      function($line) {
        return '  '.$line;
      },
      $lines,
    );
    return PHP\implode(\PHP_EOL, $lines);
  }

  public function __construct(
    public mixed $contents,
    int $code = 0,
    ?\Exception $chained = null,
  ) {
    $this->contents = $contents;
    if ($this::$printThrownExceptions) {
      $log =
        "\n\n===================================\n".
        "Rehack Thrown Exception\n".
        "===================================\n".
        "\nMessage:\n\n".$this->display()."\n".
        "\nStack:\n\n".
        StackPrinter::callStack(\debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS)).
        "\n";
      \FBLogger("Rehack", $log);
    }
    parent::__construct("RehpExceptionBox", $code, $chained);
  }
}

// TODO: Normalize setting/getting of numeric keys to match JS.
class ProtoInstance implements \ArrayAccess<mixed, mixed> {
  public darray<string, mixed> $__properties__;
  // JS instances trap a reference to their constructor's prototype
  // at the time of new(). If the prototype is mutated, they'll perceive it.
  // But if the o.constructor.prototype is reset to something else, they
  // won't perceive that. They retain the original reference.
  public $__proto__;

  public function __construct(Func $protoFunc, varray<mixed> $args) {
    $this->__properties__ = darray['constructor' => $protoFunc];
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $this->__proto__ = $protoFunc->prototype;
    if (GlobalObject::isContextReady()) {
      $G = GlobalObject::get();
      $prev_global_context = $G->context;
      $G->context = $this;
      /* HH_IGNORE_ERROR[4053] constructor is returned by property accessor */
      $this->constructor->apply($this, $args);
      $G->context = $prev_global_context;
    } else {
      // This can happen when the global object itself is being __constructed
      // as an ObjectLiteral.
      /* HH_IGNORE_ERROR[4053] constructor is returned by property accessor */
      $this->constructor->apply($this, $args);
    }
  }
  // Delegate to prototype.
  public function __call(string $name, varray<mixed> $args): mixed {
    $gotten = $this->$name;
    $G = GlobalObject::get();
    if (PHP\is_callable($gotten)) {
      if ($gotten is Func) {
        $prev_global_context = $G->context;
        $G->context = $this;
        $ret = $gotten->apply($G->context, $args);
        $G->context = $prev_global_context;
        // And if functions don't return anything, that is null by default, which is
        // conveniently $undefined.
        return $ret;
      } else {
        /* This is not the typical code path. Any output converted from JS
         * would have wrapped any functions assigned to ObjectLiteral fields.
         * But, because it's actually really nice to use ObjectLiterals as a
         * general purpose programming construct in manually written stubs,
         * we support plain PHP functions as members of ObjectLiterals.
         * This is used for the $G.
         */
        return $gotten(...$args);
      }
    } else {
      throw new \ErrorException(
        "Undefined is not a function! "." No Method ".$name,
      );
    }
  }
  // Implements the for in loop.
  public function __all_enumerable_keys(): varray<string> {
    // This one is not enumerable.
    return \varray(Vec\filter(
      $this->__all_keys(),
      $k ==> $k !== 'constructor',
    ));
  }
  public function __all_keys(): varray<string> {
    return \varray(Vec\concat(
      PHP\array_keys($this->__properties__),
      $this->__proto__->__all_enumerable_keys() ?? vec[],
    ));
  }
  // An Object.keys function.
  public function __all_own_keys(): varray<string> {
    return PHP\array_keys($this->__properties__);
  }
  public function __all_own_enumerable_keys(): varray<string> {
    return \varray(Vec\filter(
      $this->__all_own_keys(),
      $k ==> $k !== 'constructor',
    ));
  }
  // Custom function:
  // Note that isset($variableContainingNull) returns false!
  public function hasOwnProperty(string $name): bool {
    return PHP\array_key_exists(\HH\array_key_cast($name), $this->__properties__);
  }
  // Allow the object to respond to EDot. Shaddows prototype.
  public function __isset(string $name): bool {
    return true;
  }
  public function __set(string $name, mixed $value): void {
    /* HH_FIXME[4110] Error exposed when making intish cast explicit */
    $this->__properties__[\HH\array_key_cast($name)] = $value;
  }
  public function __get(string $name): mixed {
    $undefined = null;
    if ($this->hasOwnProperty($name)) {
      /* HH_FIXME[4110] Error exposed when making intish cast explicit */
      return $this->__properties__[\HH\array_key_cast($name)];
    } else {
      return
        isset($this->__proto__->$name) ? $this->__proto__->$name : $undefined;
    }
  }

  // Now let objects acts as arrays.
  public function offsetSet(mixed $offset, mixed $value): void {
    // Use the already implemented dot access delegation.
    // If it is a wrapped string, get the underlying bytes.
    /* HH_IGNORE_ERROR[4062] __php_str is returned by property accessor */
    if ($offset !== null && isset($offset->__php_str)) {
      $this->{$offset->__php_str} = $value;
    } else {
      $this->$offset = $value;
    }
  }
  // Always can access a field or property - always defaults to undefined.
  public function offsetExists(mixed $offset): bool {
    return true;
  }
  public function offsetUnset(mixed $offset): void {
    // TODO: implement this.
    throw new \ErrorException("Deletion of keys not yet supported");
  }
  public function offsetGet(mixed $offset): mixed {
    /* HH_IGNORE_ERROR[4062] __php_str is returned by property accessor */
    if ($offset !== null && isset($offset->__php_str)) {
      return $this->{$offset->__php_str};
    } else {
      if (
        $offset is string ||
        $offset is bool ||
        $offset is int ||
        $offset is float
      ) {
        return $this->$offset;
      } else {
        throw new \ErrorException("Cannot call offset with non-keyable thing");
      }
    }
  }
}

final class ProtoArrayLikeInstance
  extends ProtoInstance
  implements \ArrayAccess<mixed, mixed>, \Countable {
  public int $length = 0;

  // Implements the for in loop.
  public function __all_enumerable_keys(): varray<string> {
    return \varray(Vec\filter(
      parent::__all_keys(),
      $k ==> $k !== 'constructor' && $k !== 'length',
    ));
  }

  public function count(): int {
    return $this->length;
  }

  public function __toPhpArray(): varray<mixed> {
    // Make it a normal array in order to pass it to a variadic function
    $array_of_args = varray[];
    for ($i = 0; $i < $this->length; $i++) {
      $array_of_args[] = $this->offsetGet($i);
    }
    return $array_of_args;
  }

  public function __all_own_enumerable_keys(): varray<string> {
    return \varray(Vec\filter(
      parent::__all_own_keys(),
      $k ==> $k !== 'constructor' && $k !== 'length',
    ));
  }

  public function offsetSet(mixed $offset, mixed $value): void {
    $G = GlobalObject::get();
    if ($offset is int) {
      if ($offset > $this->length - 1) {
        for ($i = $this->length; $i < $offset - 1; $i++) {
          $this->$offset = $G->undefined;
        }
        $this->length = $offset + 1;
      }
    }
    // Use the already implemented dot access delegation.
    parent::offsetSet($offset, $value);
  }

  public function offsetUnset(mixed $offset): void {
    // TODO: implement this.
    throw new \ErrorException("Deletion of array elements not yet supported");
  }
}

final class HasNoKeys {
  public function hasOwnProperty(): bool {
    return false;
  }
  public function __all_enumerable_keys(): varray<mixed> {
    return varray[];
  }
  // An Object.keys function.
  public function __all_own_enumerable_keys(): darray<mixed, mixed> {
    return darray[];
  }
  public function toString(): ProtoInstance {
    $G = GlobalObject::get();
    return $G->String->new('Object(...)');
  }
}


// Only functions that might be used as classes need to use this.
// This also serves as the "dummy function" since it can be mutated.
// That's kind of a misuse. Refactor later.
final class Func implements \ArrayAccess<mixed, mixed> {
  public darray<string, mixed> $__properties__;
  // This function's very own prototype captured reference. Probably not the one
  // you're thinking of.
  public darray<mixed, mixed> $__proto__ = darray[];

  // For non prototypes, we could omit FN wrappers and instead use the caml_call
  // approach, if functions exposed their arity.
  public function __construct(public $fun) {
    $this->__properties__ = darray[
      'constructor' => darray['prototype' => new HasNoKeys()],
      'length' => rehack_arity($fun),
    ];
  }

  public function new(mixed ...$constructor_args) {
    if (
      /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
      isset($this->prototype->__isArrayLike)
        /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
        ? $this->prototype->__isArrayLike
        : false
    ) {
      $inst = new ProtoArrayLikeInstance($this, $constructor_args);
    } else {
      $inst = new ProtoInstance($this, $constructor_args);
    }
    return $inst;
  }

  // Implements JavaScript f.call()
  public function call(mixed $context, mixed ...$arguments): mixed {
    $origCount = PHP\count($arguments);
    /* HH_IGNORE_ERROR[4053] length is returned by property accessor */
    for ($i = $origCount; $i < $this->length; $i++) {
      $arguments[] = null;
    }

    $fun = $this->fun;
    if (GlobalObject::isContextReady()) {
      $G = GlobalObject::get();
      $prev_global_context = $G->context;
      $G->context = $context;
      $ret = $fun(...$arguments);
      $G->context = $prev_global_context;
      return $ret;
    } else {
      // This can happen when the global object itself is being __constructed
      // as an ObjectLiteral. Kind of an edge case. Should hardly ever happen.
      $ret = $fun(...$arguments);
      return $ret;
    }
  }

  // Implements JavaScript f.apply()
  public function apply(mixed $context, varray<mixed> $orig_array_of_args): mixed {
    $origCount = PHP\count($orig_array_of_args);
    if ($orig_array_of_args is ProtoArrayLikeInstance) {
      // Make it a normal array in order to pass it to a variadic function
      $array_of_args = $orig_array_of_args->__toPhpArray();
    } else {
      $array_of_args = $orig_array_of_args;
    }
    /* HH_IGNORE_ERROR[4053] length is returned by property accessor */
    for ($i = $origCount; $i < $this->length; $i++) {
      $array_of_args[] = null;
    }

    $fun = $this->fun;
    if (GlobalObject::isContextReady()) {
      $G = GlobalObject::get();
      $prev_global_context = $G->context;
      $G->context = $context;
      $ret = $fun(...$array_of_args);
      $G->context = $prev_global_context;
      return $ret;
    } else {
      // This can happen when the global object itself is being __constructed
      // as an ObjectLiteral. Kind of an edge case. Should hardly ever happen.
      $ret = $fun(...$array_of_args);
      return $ret;
    }
  }
  // When invoked as a regular function.
  public function __invoke(mixed ...$arguments): mixed {
    $required_args = rehack_arity($this->fun);
    for ($i = PHP\count($arguments); $i < $required_args; $i++) {
      $arguments[] = null;
    }

    $fun = $this->fun;
    if (GlobalObject::isContextReady()) {
      $G = GlobalObject::get();
      $prev_global_context = $G->context;
      $G->context = null;
      $ret = $fun(...$arguments);
      $G->context = $prev_global_context;
      return $ret;
    } else {
      // This can happen when the global object itself is being __constructed
      // as an ObjectLiteral. Kind of an edge case. Should hardly ever happen.
      $ret = $fun(...$arguments);
      return $ret;
    }
  }

  // Allow the object to respond to EDot.
  public function __isset(string $name): bool {
    return true;
  }

  public function __set(string $name, mixed $value): void {
    $this->__properties__[$name] = $value;
  }
  public function __get(string $name): mixed {
    if ($name === "prototype") {
      $this->__properties__['prototype'] ??=
        GlobalObject::get()->Object->new();
      return $this->__properties__['prototype'];
    }
    if (PHP\array_key_exists($name, $this->__properties__)) {
      return $this->__properties__[$name];
    }
    return null; /*$G->undefined;*/
  }

  // Now let objects acts as arrays.
  public function offsetSet(mixed $offset, mixed $value): void {
    // Use the already implemented dot access delegation.
    $this->$offset = $value;
  }
  // Always can access a field or property - always defaults to undefined.
  public function offsetExists(mixed $offset): bool {
    return true;
  }
  public function offsetUnset(mixed $offset): void {
    // TODO: implement this.
    throw new \ErrorException("Deletion of keys not yet supported");
  }
  public function offsetGet(mixed $offset): mixed {
    return $this->$offset;
  }

  // In case methods are attached to constructors like
  // $String->fromCharCode = ..
  public function __call(string $name, varray<mixed> $args): mixed {
    $gotten = $this->$name;
    if (!PHP\is_callable($gotten)) {
      throw new \ErrorException(
        "Undefined is not a function! No Method ".$name,
      );
    }

    if (GlobalObject::isContextReady()) {
      $G = GlobalObject::get();
      $prev_global_context = $G->context;
      $G->context = $this;
      $ret = $gotten->apply($G->context, $args);
      $G->context = $prev_global_context;
    } else {
      // This can happen when the global object itself is being __constructed
      // as an ObjectLiteral. Kind of an edge case. Should hardly ever happen.
      // null is
      $ret = $gotten->apply(null /*$G->undefined*/, $args);
    }
    // And if functions don't return anything, that is null by default, which is
    // conveniently $undefined.
    return $ret;
  }
}


/**
 * Creates a global object similar to a "window" object.
 */
abstract final class GlobalObject {
  public static ?ProtoInstance $single = null;
  public static bool $isGetting = false;
  public static bool $isReady = false;

  public static function isGetting(): bool {
    return self::$isGetting;
  }
  public static function isReady(): bool {
    return self::$isReady;
  }

  /**
   * In order to be "ready" we merely need the context to be set.
   */
  public static function isContextReady(): bool {
    /* HH_IGNORE_ERROR[4053] context is returned by property accessor */
    return self::$single !== null && isset(self::$single->context);
  }

  /**
   * single module getter.
   */
  public static function get() {
    if (self::$single !== null) {
      return self::$single;
    }
    self::$isReady = false;
    self::$isGetting = true;
    self::$single = null;
    self::load(); // Will set self::$single
    self::$isGetting = false;
    self::$isReady = true;
    return self::$single;
  }

  private static function load(): ProtoInstance {
    // JS null:
    // Suitable for tripple equal reference identity.
    // JS undefined:
    // Suitable for tripple equal reference identity. So that accessing missing
    // properties of "objects" $o->field returns ::undefined. Is NOT double equal
    // to ::null. All compiled js "light" code should use triple equal.
    // JS current function context:
    $Func = function($the_fun) {
      return new Func($the_fun);
    };

    // >>> Unsigned shift right:
    // https://stackoverflow.com/a/43359819
    // Then the >> operator could be derived from this by preserving the sign.
    $unsigned_right_shift_32 = function($a, $b) {
      if ($b >= 32 || $b < -32) {
        $m = (int)($b / 32);
        $b = $b - ($m * 32);
      }
      if ($b < 0) {
        $b = 32 + $b;
      }
      if ($b === 0) {
        return (($a >> 1) & 0x7fffffff) * 2 + (($a >> $b) & 1);
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

    // Bit shifters: To emulate 32 bits on 64 bit platforms, we shift off any
    // leading 32 bits.
    // See also:

    // https://stackoverflow.com/a/25587827
    // https://stackoverflow.com/questions/6303241/find-windows-32-or-64-bit-using-php
    $left_shift_32 = function($a, $b) {
      $shifted = $a << $b;
      if (\PHP_INT_SIZE === 8) {
        // 64 bit.
        return ($shifted << 32) >> 32;
      } else {
        // Size four means 32bit
        return $shifted;
      }
    };

    $right_shift_32 = function($a, $b) {
      if (\PHP_INT_SIZE === 8) {
        // 64 bit.
        $a_normalized = ($a << 32) >> 32;
      } else {
        // Size four means 32bit
        $a_normalized = $a;
      }
      return $a_normalized >> $b;
    };

    // In JS, Object is a function constructor for objects.
    $Object = $Func(function() {
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $Object->prototype = new HasNoKeys();


    $G = $Object->new();
    self::$single = $G;
    $G->null = darray[];
    $G->context = $G->null;
    $G->undefined = null;

    $G->rehack_arity = function($f) {
      if (($f is Func)) {
        return rehack_arity($f->fun);
      }
      return rehack_arity($f);
    };

    $G->unsigned_right_shift_32 = $unsigned_right_shift_32;
    $G->left_shift_32 = $left_shift_32;
    $G->right_shift_32 = $right_shift_32;

    // TODO: This needs fixing
    $G->max_int = $unsigned_right_shift_32(-1, 1) | 0;
    $G->min_int = $G->max_int + 1 | 0;
    $G->instance_of = function($obj, $constructor) {
      return instance_of($obj, $constructor);
    };


    $G->Func = $Func;

    // Version callable from ported standard library.
    // Wraps result in $String.
    $G->typeof = function($thing) {
      $G = GlobalObject::get();
      $String = $G->String;
      return $String->new(typeof($thing));
    };

    $G->Object = $Object;

    $G->ObjectLiteral = $ObjectLiteral = function($keyVals) {
      $G = GlobalObject::get();
      $Object = $G->Object;
      $inst = $Object->new();
      foreach ($keyVals as $k => $v) {
        $inst[$k] = $v;
      }
      return $inst;
    };


    // The worst initialization API in history: JS Arrays.
    $G->Array = $Array = $Func(function(...$args) {
      $G = GlobalObject::get();
      $Array = $G->Array;
      $arg_count = PHP\count($args);
      // TODO: Check length not neg.

      if ($arg_count === 1 && typeof($args[0]) === "number") {
        for ($i = 0; $i < $args[0]; $i++) {
          $G->context[$i] = $G->undefined;
        }
        $G->context->length = $args[0];
      } else if ($arg_count === 1 && instance_of($args[0], $Array)) {
        $literal = $args[0];
        for ($i = 0; $i < $literal->length; $i++) {
          $G->context[$i] = $literal[$i];
        }
        $G->context->length = $literal->length;
        // Array literals initialize with a Php array.
      } else if (
        $arg_count === 1 && is_array($args[0])
      ) {
        $literal = $args[0];
        $len = PHP\count($literal);
        for ($i = 0; $i < $len; $i++) {
          $G->context[$i] = $literal[$i];
        }
        $G->context->length = $len;
      } else {
        // Supplying multiple arguments, each arg an item.
        for ($i = 0; $i < $arg_count; $i++) {
          $G->context[$i] = $args[$i];
        }
        $G->context->length = $arg_count;
      }
    });
    /* HH_IGNORE_ERROR[4053] displayName is returned by property accessor */
    $Array->displayName = "Array";

    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $Array->prototype->length = 0;
    // Cause to be auto-updated length.
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $Array->prototype->__isArrayLike = true;

    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $Array->prototype->push = $Func(function($itm) {
      $G = GlobalObject::get();
      $G->context[$G->context->length] = $itm;
    });

    $ArrayLiteral = function(...$args) use ($Array) {
      return $Array->new($args);
    };
    $G->ArrayLiteral = $ArrayLiteral;

    $G->String = $String = $Func(function($literal) {
      $G = GlobalObject::get();
      $G->context->__php_str = $literal;
      $G->context->length = PHP\strlen($literal);
    });
    /* HH_IGNORE_ERROR[4053] displayName is returned by property accessor */
    $String->displayName = "String";
    /* HH_IGNORE_ERROR[4053] fromCharCode is returned by property accessor */
    $String->fromCharCode = $Func(function($code) {
      $G = GlobalObject::get();
      $String = $G->String;
      return $String->new(PHP\chr($code));
    });

    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->concat = $Func(function($other) {
      $G = GlobalObject::get();
      $String = $G->String;
      return $String->new(
        $G->context->__php_str.$G->js_to_string($other)->__php_str,
      );
    });

    // From https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->replace =
      $Func(function($search, $replace) use ($Func) {
        $G = GlobalObject::get();
        $String = $G->String;
        $RegExp = $G->RegExp;
        $str = $G->context->__php_str;
        $isRegEx = instance_of($search, $RegExp);
        $limit = ($isRegEx && $search->globalFlag) ? -1 : 1;
        $search =
          $isRegEx ? $search->toString(true) : $G->js_to_string($search);
        if (instance_of($replace, $Func)) {
          if ($isRegEx) {
            $count = 0;
            $offset = 0;
            $result = varray[];
            $success = null;
            $matches = darray[];
            while (
              ($limit === -1 || $count < $limit) &&
              (
                $success = PHP\preg_match(
                  $search,
                  $str,
                  &$matches,
                  \PREG_OFFSET_CAPTURE,
                  $offset,
                )
              )
            ) {
              $matchIndex = $matches[0][1];
              $args = varray[];
              foreach ($matches as $match) {
                $args[] = $match[0];
              }
              $result[] = PHP\substr($str, $offset, $matchIndex - $offset);
              //calculate multi-byte character index from match index
              $mbIndex = PHP\mb_strlen(PHP\substr($str, 0, $matchIndex));
              $args[] = $mbIndex;
              $args[] = $str;
              $result[] = $G->js_to_string($replace->apply(null, $args));
              $offset = $matchIndex + PHP\strlen($args[0]);
              $count += 1;
            }
            /* HH_IGNORE_ERROR[4118] preg_match returns false when the regex is
             * badly formatted */
            if ($success === false) {
              //this can happen in the case of invalid utf8 sequences
              throw new \ErrorException('String.prototype.replace() failed');
            }
            $result[] = PHP\substr($str, $offset);
            return $String->new(PHP\implode('', $result));
          } else {
            $matchIndex = PHP\strpos($str, $search);
            if ($matchIndex === false) {
              return $String->new($str);
            }
            $before = PHP\substr($str, 0, $matchIndex);
            $after = PHP\substr($str, $matchIndex + PHP\strlen($search));
            //mb_strlen used to calculate multi-byte character index
            $args = varray[$search, PHP\mb_strlen($before), $str];
            return $String->new(
              $before.$G->js_to_string($replace->apply(null, $args)).$after,
            );
          }
        }
        $replace = $G->js_to_string($replace)->__php_str;
        if ($isRegEx) {
          $replace = $RegExp->phpReplacementString($replace);
          return $String->new(
            PHP\preg_replace($search->__php_str, $replace, $str, $limit),
          );
        } else {
          $parts = PHP\explode($search->__php_str, $str);
          $first = PHP\array_shift(&$parts);
          return $String->new(
            $first.$replace.PHP\implode($search->__php_str, $parts),
          );
        }
      });

    // From https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->charAt = $Func(function($i) {
      $G = GlobalObject::get();
      $String = $G->String;
      $self = $G->context;
      $ch = PHP\mb_substr($self->__php_str, $i, 1);
      return $String->new(($ch === false) ? '' : $ch);
    });
    // From https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->charCodeAt = $Func(function($i) {
      $G = GlobalObject::get();
      $self = $G->context;
      $ch = PHP\mb_substr($self->__php_str, $i, 1);
      if ($ch === false) {
        return \NAN;
      }
      $len = PHP\strlen($ch);
      if ($len === 1) {
        $code = PHP\ord($ch[0]);
      } else {
        // TODO: This shouldn't convert from UCS.
        $ch = PHP\mb_convert_encoding($ch, 'UCS-2LE', 'UTF-8');
        $code = PHP\ord($ch[1]) * 256 + PHP\ord($ch[0]);
      }
      return (float)$code;
    });

    // From https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->indexOf = $Func(function($search, $offset = 0) {
      $G = GlobalObject::get();
      $self = $G->context;
      $index = PHP\mb_strpos($self->__php_str, $search, $offset);
      return ($index === false) ? -1.0 : (float)$index;
    });


    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->lastIndexOf = $Func(function($find, $offset) {
      $G = GlobalObject::get();
      $str = $G->context->__php_str;
      if ($offset !== $G->undefined) {
        $offset = to_number($offset);
        if ($offset > 0 && $offset < $G->context->length) {
          $str = PHP\mb_substr($str, 0, $offset + 1);
        }
      }
      $index = PHP\mb_strrpos($str, $find->__php_str);
      return ($index === false) ? -1.0 : (float)$index;
    });

    // Adapted from sstur's js2php: BSD.
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->slice = $Func(function(...$args) {
      $start = $args[0];
      $G = GlobalObject::get();
      $String = $G->String;
      $end = PHP\count($args) > 1 ? $args[1] : $G->undefined;
      $self = $G->context;
      $len = $self->length;
      if ($len === 0) {
        return $String->new('');
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) {
          $start = 0;
        }
      }
      if ($start >= $len) {
        return $String->new('');
      }
      $end = ($end === $G->undefined) ? $len : (int)$end;
      if ($end < 0) {
        $end = $len + $end;
      }
      if ($end < $start) {
        $end = $start;
      }
      if ($end > $len) {
        $end = $len;
      }
      return
        $String->new(PHP\mb_substr($self->__php_str, $start, $end - $start));
    });

    // From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->substr = $Func(function(...$args) {
      $start = $args[0];
      $G = GlobalObject::get();
      $String = $G->String;
      $num = PHP\count($args) > 1 ? $args[1] : $G->undefined;
      $len = $G->context->length;
      if ($len === 0) {
        return $String->new('');
      }
      $start = (int)$start;
      if ($start < 0) {
        $start = $len + $start;
        if ($start < 0) {
          $start = 0;
        }
      }
      if ($start >= $len) {
        return $String->new('');
      }
      if ($num === $G->undefined) {
        return $String->new(PHP\mb_substr($G->context->__php_str, $start));
      } else {
        return
          $String->new(PHP\mb_substr($G->context->__php_str, $start, $num));
      }
    });
    // From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->substring = $Func(function(...$args) {
      $start = $args[0];
      $G = GlobalObject::get();
      $String = $G->String;
      $end = PHP\count($args) > 1 ? $args[1] : $G->undefined;
      $len = $G->context->length;
      //if second param is absent
      if (PHP\count($args) === 1) {
        $end = $len;
      }
      $start = (int)$start;
      $end = (int)$end;
      if ($start < 0) {
        $start = 0;
      }
      if ($start > $len) {
        $start = $len;
      }
      if ($end < 0) {
        $end = 0;
      }
      if ($end > $len) {
        $end = $len;
      }
      if ($start === $end) {
        return $String->new('');
      }
      if ($end < $start) {
        list($start, $end) = varray[$end, $start];
      }
      return $String->new(
        PHP\mb_substr($G->context->__php_str, $start, $end - $start),
      );
    });


    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->toString = $Func(function() {
      $G = GlobalObject::get();
      return $G->context;
    });
    // From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $String->prototype->match = $Func(function($regex) {
      $G = GlobalObject::get();
      $RegExp = $G->RegExp;
      $String = $G->String;
      $Array = $G->Array;
      if (!(instance_of($regex, $RegExp))) {
        $regex = $RegExp->new($regex);
      }
      if (!$regex->globalFlag) {
        return $regex->exec($G->context);
      }
      $results = $Array->new();
      $index = 0;
      $preg = $regex->toPhpString(true);
      $matches = darray[];
      while (
        PHP\preg_match(
          $preg,
          $G->context->__php_str,
          &$matches,
          \PREG_OFFSET_CAPTURE,
          $index,
        ) ===
          1
      ) {
        $foundAt = $matches[0][1];
        $foundStr = $matches[0][0];
        $index = $foundAt + PHP\strlen($foundStr);
        $results->push($String->new($foundStr));
      }
      return $results;
    });

    // Adapted from:
    // https://github.com/sstur/js2php/blob/master/php/helpers/helpers.php
    $G->js_to_string = function(...$args) {
      $value = $args[0];
      $argsLen = PHP\count($args);
      $G = GlobalObject::get();
      $String = $G->String;
      if ($argsLen > 1) {
        $depth = $args[1];
      } else {
        $depth = "";
      }
      if (instance_of($value, $String)) {
        if (PHP\strlen($depth) === 0) {
          return $value;
        }
        return $String->new($depth.$value->__php_str);
      }
      if ($value === $G->undefined) {
        return $String->new($depth.'undefined');
      }
      if ($value === $G->null) {
        return $String->new($depth.'null');
      }
      // Arguably this should throw.
      if ($value is string) {
        return $String->new($depth.$value);
      }
      if ($value is bool) {
        return $String->new($depth.($value ? 'true' : 'false'));
      }
      if ($value is int || $value is float) {
        if (PHP\is_nan($value)) {
          return $String->new($depth.'NaN');
        }
        if ($value === \INF) {
          return $String->new($depth.'Infinity');
        }
        if ($value === -\INF) {
          return $String->new($depth.'-Infinity');
        }
        return $String->new($depth.($value.''));
      }

      if (PHP\is_callable($value) || $value is \Closure) {
        return $String->new($depth.'function() {...}');
      }
      if (isset($value->toString) && PHP\is_callable($value->toString)) {
        try {
          return $String->new($depth.$value->toString()->__php_str);
        } catch (\Throwable $_t) {
          return $String->new('Error: Cannot Call toString()');
        }
      }

      if ($value is ProtoArrayLikeInstance) {
        $ret = $depth."[";
        for ($i = 0; $i < $value->length; $i++) {
          $ret =
            $ret."\n".$G->js_to_string($value[$i], $depth."  ")->__php_str.",";
        }
        $ret = $ret.$depth."\n"."]";
        return $String->new($ret);
      }
      if ($value is Func) {
        return $String->new($depth.'function(){...}');
      }
      if ($value is ProtoInstance) {
        return $String->new($depth.'Object(...)');
      }
      if ($value is R || $value is V) {
        $name = null;
        if ($value is R) {
          $name = "Record";
        }
        if ($value is V) {
          $name = "Variant";
        }
        $ret = $depth.$name."([";
        for ($i = 0; $i < $value->length; $i++) {
          $ret =
            $ret."\n".$G->js_to_string($value[$i], $depth."  ")->__php_str.",";
        }
        $ret = $ret."\n".$depth."])";
        return $String->new($ret);
      }
      throw new \ErrorException(
        'Cannot convert object of unsupported type to to primitive value',
      );
    };

    // Adapted from
    // From: https://github.com/sstur/js2php/blob/master/php/classes/String.php
    $G->RegExp = $RegExp = $Func(function(...$args) {
      $G = GlobalObject::get();
      $G->context->__php_str_source = '';
      $G->context->ignoreCaseFlag = false;
      $G->context->globalFlag = false;
      $G->context->multilineFlag = false;
      $G->context->protoObject = $G->undefined;
      $G->context->classMethods = $G->undefined;
      $G->context->protoMethods = $G->undefined;
      if (PHP\count($args) > 0) {
        $zero = $args[0];
        $G->context->__php_str_source =
          ($zero === $G->undefined) ? '(?:)' : $zero->__php_str;
        $flags = PHP\array_key_exists(1, $args)
          ? $G->js_to_string($args[1])->__php_str
          : '';
        $G->context->ignoreCaseFlag = (PHP\strpos($flags, 'i') !== false);
        $G->context->globalFlag = (PHP\strpos($flags, 'g') !== false);
        $G->context->multilineFlag = (PHP\strpos($flags, 'm') !== false);
      }
    });
    /* HH_IGNORE_ERROR[4053] displayName is returned by property accessor */
    $RegExp->displayName = "RegExp";
    /**
     * Note: JS RegExp has different character classes than PCRE. For instance
     *   in JS `\w` is [ \f\n\r\t\v\xA0] (and a bunch of unicode spaces) but
     *   in PCRE it's only [ \f\n\r\t]
     * @param bool $pcre - whether to write pcre format. pcre does not allow /g
     *  flag but does support the non-standard /u flag for utf8
     * @return string
     */
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $RegExp->prototype->toPhpString = $Func(function($pcre) {
      $G = GlobalObject::get();
      $__php_str_source = $G->context->__php_str_source;
      $flags = '';
      if ($G->context->ignoreCaseFlag) {
        $flags .= 'i';
      }
      //pcre doesn't support the global flag
      if (!$pcre && $G->context->globalFlag) {
        $flags .= 'g';
      }
      //pcre will interpret the regex and the subject as utf8 with this flag
      if ($pcre) {
        $flags .= 'u';
      }
      if ($G->context->multilineFlag) {
        $flags .= 'm';
      }
      return '/'.$__php_str_source.'/'.$flags;
    });

    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $RegExp->prototype->toString = $Func(function($pcre) {
      $G = GlobalObject::get();
      $String = $G->String;
      return $String->new($G->context->toPhpString($pcre));
    });

    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $RegExp->prototype->exec = $Func(function($jsStr) {
      $G = GlobalObject::get();
      $Array = $G->Array;
      $String = $G->String;
      $str = $G->js_to_string($jsStr);
      //todo $offset
      $offset = 0;

      // Note: This may return boolean or an integer.
      // Only time should return false is with invalid offset.
      $matches = darray[];
      $result = PHP\preg_match(
        $G->context->toPhpString(true),
        $str->__php_str,
        &$matches,
        \PREG_OFFSET_CAPTURE,
        $offset,
      );
      /* HH_IGNORE_ERROR[4118] preg_match returns false when the regex is
       * badly formatted */
      if ($result === false) {
        throw new \ErrorException(
          'Error executing Regular Expression: '.$G->context->toPhpString(true),
        );
      }
      if ($result === 0) {
        return $G->null;
      }
      $index = $matches[0][1];
      // Last index is broken
      // $G->context->lastIndex = (float)($index + strlen($matches[0][0]));
      $arr = $Array->new();
      foreach ($matches as $match) {
        $arr->push($String->new($match[0]));
      }
      $arr->index = (float)$index;
      $arr->input = $str;
      return $arr;
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $RegExp->prototype->test = $Func(function($str) {
      $G = GlobalObject::get();
      $matches = varray[];
      $result = PHP\preg_match(
        $G->context->toPhpString(true),
        $G->js_to_string($str)->__php_str,
        &$matches,
      );
      return ($result !== 0);
    });
    /**
     * Format replacement string for preg_replace
     * @param string $str
     * @return string
     */
    /* HH_IGNORE_ERROR[4053] phpReplacementString is returned by property accessor */
    $RegExp->phpReplacementString = $Func(function($str) {
      $str = PHP\str_replace('\\', '\\\\', $str);
      $str = PHP\str_replace('$&', '$0', $str);
      return $str;
    });


    $G->plus = function($l, $r) {
      $G = GlobalObject::get();
      if (typeof($l) === "string") {
        if (typeof($r) === "string") {
          if (!isset($l->concat)) {
            throw new \ErrorException("this is not a string");
          }
          return $l->concat($r);
        } else {
          return $l->concat($G->js_to_string($r));
        }
      } else {
        if (typeof($r) === "string") {
          $l = $G->js_to_string($l);
          // throw new \ErrorException("Left is " . $G->js_to_string($l) . " right is " . $r);
          return $l->concat($r);
        } else {
          return $l + $r;
        }
      }
    };


    // MathConstructor copyright :Copyright (c) 2014, sstur@me.com. All rights reserved.
    // BSD
    $randMax = Math\INT32_MAX;
    $MathConstructor = $Func(function() {
      $G = GlobalObject::get();
      $G->context->E = \M_E;
      $G->context->LN10 = \M_LN10;
      $G->context->LN2 = \M_LN2;
      $G->context->LOG10E = \M_LOG10E;
      $G->context->LOG2E = \M_LOG2E;
      $G->context->PI = \M_PI;
      $G->context->SQRT1_2 = \M_SQRT1_2;
      $G->context->SQRT2 = \M_SQRT2;
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->random = $Func(function() use ($randMax) {
      return (float)(PHP\mt_rand() / ($randMax + 1));
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->round = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\round($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->ceil = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\ceil($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->floor = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\floor($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->abs = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\abs($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->max = $Func(function(...$args) {
      $max = -\INF;
      foreach ($args as $num) {
        $num = to_number($num);
        if (PHP\is_nan($num)) {
          return \NAN;
        }
        if ($num > $max) {
          $max = $num;
        }
      }
      return (float)$max;
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->min = $Func(function(...$args) {
      $min = \INF;
      foreach ($args as $num) {
        $num = to_number($num);
        if (PHP\is_nan($num)) {
          return \NAN;
        }
        if ($num < $min) {
          $min = $num;
        }
      }
      return (float)$min;
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->pow = $Func(function($num, $exp) {
      $num = to_number($num);
      $exp = to_number($exp);
      if (PHP\is_nan($num) || PHP\is_nan($exp)) {
        return \NAN;
      }
      return $num ** $exp;
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->log = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\log($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->exp = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\exp($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->sqrt = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\sqrt($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->sin = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\sin($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->cos = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\cos($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->tan = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\tan($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->atan = $Func(function($num) {
      $num = to_number($num);
      return PHP\is_nan($num) ? \NAN : (float)PHP\atan($num);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $MathConstructor->prototype->atan2 = $Func(function($y, $x) {
      $y = to_number($y);
      $x = to_number($x);
      if (PHP\is_nan($y) || PHP\is_nan($x)) {
        return \NAN;
      }
      return (float)PHP\atan2($y, $x);
    });


    $G->Math = $MathConstructor->new();


    // Close enough for our limited use case.
    $Date = $Func(function() {
      $G = GlobalObject::get();
      $G->context->__time = (int)PHP\round(PHP\microtime(true) * 1000);
    });
    /* HH_IGNORE_ERROR[4053] prototype is returned by property accessor */
    $Date->prototype->getTime = $Func(function() {
      $G = GlobalObject::get();
      return $G->context->__time;
    });
    /* HH_IGNORE_ERROR[4053] now is returned by property accessor */
    $Date->now = $Func(function() use ($Date) {
      return $Date->new()->getTime();
    });
    $G->Date = $Date;

    $G->Boolean = $Func(function() {
    });
    $G->Number = $Func(function() {
    });

    // Restore some of the properties of === when strings are wrapped etc.
    $G->eqEqEq = function($a, $b) {
      $G = GlobalObject::get();
      $String = $G->String;
      if ($a === $b) {
        return true;
      }
      if (instance_of($a, $String) && instance_of($b, $String)) {
        return $b->__php_str === $a->__php_str;
      }
      return false;
    };

    // Only differs in behavior for undefined/null (null/undefined should not be
    // considered == double equal)
    $G->eqEq = function($a, $b) {
      $G = GlobalObject::get();
      $String = $G->String;
      // Our null representation ([]) and our undefined representation (null)
      // will not be PHP ==, as we wish.
      if ($a == $b) {
        return true;
      }
      if (instance_of($a, $String) && instance_of($b, $String)) {
        return $b->__php_str === $a->__php_str;
      }
      return false;
    };

    // This is only needed for some special test cases that require this be defined.
    // Eventually can be removed.
    $G->polymorphic_log = function($itm) use ($String) {
      if (instance_of($itm->c, $String)) {
        \FBLogger("Rehack", "LOG:".$itm->c->__php_str);
      } else {
        \FBLogger("Rehack", "LOG Non String");
      }
    };

    $G->console = $ObjectLiteral(darray[
      "log" => $Func(function($itm) {
        $G = GlobalObject::get();
        \FBLogger("Rehack", $G->js_to_string($itm, "")->__php_str);
      }),
      "warn" => $Func(function($itm) {
        $G = GlobalObject::get();
        \FBLogger("Rehack", $G->js_to_string($itm, "")->__php_str);
      }),
      "error" => $Func(function($itm) {
        $G = GlobalObject::get();
        \FBLogger("Rehack", $G->js_to_string($itm, "")->__php_str);
      }),
    ]);

    $G->is_int = function($i) {
      return $i is int;
    };

    $G->NaN = \NAN;
    $G->Infinity = \INF;
    $G->require = function() {
      throw new \ErrorException("Require not implemented for PHP");
    };
    $G->module = null;

    $G->process = $ObjectLiteral(darray[
      "stdout" => $ObjectLiteral(darray[
        "write" => $Func(function($s) {
          \FBLogger("Rehack", $s->__php_str);
        }),
      ]),
      "stderr" => $ObjectLiteral(darray[
        "write" => $Func(function($s) {
          \FBLogger("Rehack", $s->__php_str);
        }),
      ]),
      "env" => $ObjectLiteral(darray[]),
      "cwd" => $Func(function() {
        $G = GlobalObject::get();
        $String = $G->String;
        return $String->new('');
      }),
      "argv" => $Array->new(varray[]),
    ]);
    return $G;
  }
}


/**
 * Some base modules that were never compilation units, however they show up
 * as compilation unit dependencies. Make some stub classes just so that when
 * our templates try to make sure they're initialized, nothing will fail. The
 * return values of `get` aren't even used. This is only even called because
 * our templates call `get` for each thing that looks like a module dependency.
 * See parse_bytecode.ml for a list of these.
 */

abstract final class Out_of_memory {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Out_of_memory;
  }
}
abstract final class Sys_error {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Sys_error;
  }
}
abstract final class Failure {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Failure;
  }
}
abstract final class Invalid_argument {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime
      ->caml_get_global_data()
      ->Invalid_argument;
  }
}
abstract final class End_of_file {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->End_of_file;
  }
}
abstract final class Division_by_zero {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime
      ->caml_get_global_data()
      ->Division_by_zero;
  }
}
abstract final class Not_found {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Not_found;
  }
}
abstract final class Match_failure {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Match_failure;
  }
}
abstract final class Stack_overflow {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Stack_overflow;
  }
}
abstract final class Sys_blocked_io {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Sys_blocked_io;
  }
}
abstract final class Assert_failure {
  public static function get(): mixed {
    return
      GlobalObject::get()->jsoo_runtime->caml_get_global_data()->Assert_failure;
  }
}
abstract final class Undefined_recursive_module {
  public static function get(): mixed {
    return GlobalObject::get()->jsoo_runtime
      ->caml_get_global_data()
      ->Undefined_recursive_module;
  }
}
