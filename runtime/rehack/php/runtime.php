<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.


/**
 *
 * Runtime.php
 */

namespace Rehack;

use namespace HH\Lib\{Math, Str};

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
    return GlobalData::get()['Out_of_memory'];
  }
}
abstract final class Sys_error {
  public static function get(): mixed {
    return GlobalData::get()['Sys_error'];
  }
}
abstract final class Failure {
  public static function get(): mixed {
    return GlobalData::get()['Failure'];
  }
}
abstract final class Invalid_argument {
  public static function get(): mixed {
    return GlobalData::get()['Invalid_argument'];
  }
}
abstract final class End_of_file {
  public static function get(): mixed {
    return GlobalData::get()['End_of_file'];
  }
}
abstract final class Division_by_zero {
  public static function get(): mixed {
    return GlobalData::get()['Division_by_zero'];
  }
}
abstract final class Not_found {
  public static function get(): mixed {
    return GlobalData::get()['Not_found'];
  }
}
abstract final class Match_failure {
  public static function get(): mixed {
    return GlobalData::get()['Match_failure'];
  }
}
abstract final class Stack_overflow {
  public static function get(): mixed {
    return GlobalData::get()['Stack_overflow'];
  }
}
abstract final class Sys_blocked_io {
  public static function get(): mixed {
    return GlobalData::get()['Sys_blocked_io'];
  }
}
abstract final class Assert_failure {
  public static function get(): mixed {
    return GlobalData::get()['Assert_failure'];
  }
}
abstract final class Undefined_recursive_module {
  public static function get(): mixed {
    return GlobalData::get()['Undefined_recursive_module'];
  }
}


// An OCaml string is an object with three fields:
// - tag 't'
// - length 'l'
// - contents 'c'
//
// The contents of the string can be either a JavaScript array or
// a JavaScript string. The length of this string can be less than the
// length of the OCaml string. In this case, remaining bytes are
// assumed to be zeroes. Arrays are mutable but consumes more memory
// than strings. A common pattern is to start from an empty string and
// progressively fill it from the start. Partial strings makes it
// possible to implement this efficiently.
//
// When converting to and from UTF-8 byte arrays, we keep track of whether the
// string is composed only of ASCII characters.
//
// The string tag can thus take the following values:
//   full string     BYTE | UNKNOWN:      0  \
//                   BYTE | ASCII:        9  |  All of these & 6 equals zero
//                   BYTE | NOT_ASCII:    8  /
//   string prefix   PARTIAL:             2  \  & 6 for these is the identity.
//   array           ARRAY:               4  /
//
// One can use bit masking to discriminate these different cases:
//   known_encoding(x) = x&8
//   is_ascii(x) =       x&1
//   kind(x) =           x&6

final class MlBytes {
  public function __construct(
    public int $t,
    public Vector<int> $a,
    public string $c,
    public int $l,
  ) {
  }
  // TODO: remove this and fix the fatal from
  // compiled code that is assuming it exists
  public function count(): int {
    return 0;
  }
  public function toString(): string {
    return caml_to_js_string($this);
  }
}

function caml_jsbytes_of_string(MlBytes $s): string {
  if (($s->t & 6) !== 0) {
    caml_convert_string_to_bytes($s);
  }
  return $s->c;
}

function caml_ml_flush(int $chanid): int {
  $chan = Channel::get($chanid);
  if ($chan->opened === null) {
    caml_raise_sys_error("Cannot flush a closed channel");
  }
  $buffer = $chan->buffer;
  if ($buffer === null || $buffer === "") {
    return 0;
  }
  if ($chan->fd !== null) {
    $output = ChannelInfo::get($chan->fd as int)?->output;
    if ($output !== null) {
      $output($chanid, $buffer);
    }
  }
  $chan->buffer = "";
  return 0;
}

// Returns -1 if not found.
function php_last_index_of(string $php_str, string $find): int {
  $index = PHP\mb_strrpos($php_str, $find);
  return ($index === false) ? -1 : $index;
}

function caml_ml_output_bytes(
  int $chanid,
  MlBytes $buffer,
  int $offset,
  int $len,
): int {
  $chan = Channel::get($chanid);
  if ($chan->opened === null) {
    caml_raise_sys_error("Cannot output to a closed channel");
  }
  if ($offset === 0 && caml_ml_bytes_length($buffer) === $len) {
    $string = $buffer;
  } else {
    $string = caml_create_bytes($len);
    caml_blit_bytes($buffer, $offset, $string, 0, $len);
  }
  $phpStr = caml_jsbytes_of_string($string);
  $id = php_last_index_of($phpStr, "\n");
  if ($id < 0) {
    $chan->buffer = $chan->buffer.$phpStr;
  } else {
    $chan->buffer = $chan->buffer.PHP\mb_substr($phpStr, 0, $id + 1);
    caml_ml_flush($chanid);
    $chan->buffer = $chan->buffer.PHP\mb_substr($phpStr, $id + 1);
  }
  return 0;
}

function caml_ml_output(
  int $chanid,
  MlBytes $buffer,
  int $offset,
  int $len,
): int {
  return caml_ml_output_bytes($chanid, $buffer, $offset, $len);
}

function caml_ml_output_char(int $chanid, int $c): int {
  // TODO: Check that chr() is the same as fromCharCode
  $s = caml_new_string(PHP\chr($c));
  caml_ml_output($chanid, $s, 0, 1);
  return 0;
}


function php_str_from_char_codes(KeyedContainer<int, int> $codes): string {
  $ret = '';
  foreach ($codes as $code) {
    $ret .= PHP\chr($code);
  }
  return $ret;
}

/**
 * Converts from Rehp's representation of arrays (which happen to be vectors
 * with v[0] set to 0) into raw platform's default representation of arrays
 * (varrays).
 */
function raw_array_sub<T>(Vector<T> $a, int $i, int $l): varray<T> {
  $b = varray[];
  for ($j = 0; $j < $l; $j++) {
    $b[] = $a[$i + $j];
  }
  return $b;
}

/**
 * Creates a new caml array from an existing caml array, but a subsequence of
 * it.
 */
function caml_array_sub(Vector<mixed> $a, int $i, int $len): Vector<mixed> {
  // Should be length $len + 1
  $b = varray[];
  $b[] = 0;
  for ($j = 0; $j < $len; $j++) {
    $b[] = $a[$j + $i];
  }
  return Vector::fromItems($b);
}

function caml_array_append(
  Vector<mixed> $a1,
  Vector<mixed> $a2,
): Vector<mixed> {
  $len1 = C\count($a1);
  $len2 = C\count($a2);
  $a = Vector {0};
  $a->reserve($len1 + $len2 - 1);
  for ($i = 1; $i < $len1; $i++) {
    $a[] = $a1[$i];
  }
  for ($i = 1; $i < $len2; $i++) {
    $a[] = $a2[$i];
  }
  return $a;
}

/**
 * Takes a platform default array representation and returns a subsequence of
 * it.
 */
function array_sub<T>(varray<T> $a, int $i, int $l): varray<T> {
  $b = varray[];
  for ($j = 0; $j < $l; $j++) {
    $b[] = $a[$i + $j];
  }
  return $b;
}

/**
 * Accepts a Hack varray or Vector, and outputs a new Hack Vector that has the
 * `$x` argument prepended at position zero of that new Vector, and then copies
 * the remaining items from `$a` into that new vector.
 * Typically called like `raw_array_cons($hack_array, 0)` in order to turn
 * a Hack array into a Rehp Vector array.
 */
function raw_array_cons<T>(KeyedContainer<int, T> $a, mixed $x): Vector<mixed> {
  $l = C\count($a);
  $b = varray[]; // length ($l + 1);
  $b[] = $x;
  for ($i = 1; $i <= $l; $i++) {
    $b[] = $a[$i - 1];
  }
  // This creates a Rehp Array, but should be kept in sync with how
  // Rehp Arrays are created in caml_make_vect
  return Vector::fromItems($b);
}

function caml_array_bound_error(): void {
  caml_invalid_argument("index out of bounds");
}


function caml_check_bound(Vector<mixed> $array, int $index): Vector<mixed> {
  if (unsigned_right_shift_32($index, 0) >= C\count($array) - 1) {
    caml_array_bound_error();
  }
  return $array;
}


/**
 * Converts from a Rehp array(which is a Hack Vector with index 0 set to 0) to
 * a Hack array.
 */
function caml_js_from_array<T>(Vector<T> $a): varray<T> {
  return raw_array_sub($a, 1, C\count($a) - 1);
}

/**
 * Converts from a Hack array (or Hack Vector) to a Rehp array (which is
 * represented by a Hack vector with index 0 set to 0). This function is a
 * little unique in that it is liberal with its input (accepting either a Hack
 * Vector, or a Hack varray). In most other cases we only support Hack varrays
 * converting back and forth to Reason arrays (which are represented by Hack
 * Vector with the 0 index set to 0).
 */
function caml_js_to_array<T>(KeyedContainer<int, T> $a): Vector<mixed> {
  return raw_array_cons($a, 0);
}


/**
 * Converts from an MlString's ->a field (which is a character Vector), into a Hack string.
 */
function caml_subarray_to_string(Vector<int> $a, int $i, int $len): string {
  if ($i === 0 && $len <= 4096 && $len === C\count($a)) {
    return php_str_from_char_codes($a);
  }
  $s = "";
  while (0 < $len) {
    $s = $s.
      php_str_from_char_codes(
        raw_array_sub($a, $i, Math\minva($len, 1024) ?? 0),
      );
    $i += 1024;
    $len -= 1024;
  }
  return $s;
}

// Assumes not full string "BYTES" Converts to BYTE of unknown classification,
// which in the case of PHP means ascii.
function caml_convert_string_to_bytes(MlBytes $s): void {
  if ($s->t === 2) {
    $s->c = $s->c.Str\repeat("\0", $s->l - Str\length($s->c));
  } else {
    // Then it must be array (type 4)
    $s->c = caml_subarray_to_string($s->a, 0, Str\length($s->c));
  }
  $s->t = 9;
}

// Returns false if contains some char code that is > 127 That would include
// nonascii JS characters like <fire>, but also Their compile-time-escaped forms
// like \xf0\x9f\x94\xa5 Because the escaped hex forms would include at least
// one character that is > 127.
// In PHP, the following two strings are identical bit for bit:
// - "Reason is on \xf0\x9f\x94\xa5"
// - "Reason is on <fire>"
//
function caml_is_ascii(string $s): bool {
  return PHP\mb_check_encoding($s, 'ASCII');
}


function caml_to_js_string(MlBytes $s): string {
  switch ($s->t) {
    case 9:
      return $s->c;
    case 8:
      return caml_utf16_of_utf8($s->c);
    case 0:
    default:
      if ($s->t != 0) {
        caml_convert_string_to_bytes($s);
      }
      if (caml_is_ascii($s->c)) {
        $s->t = 9;
        return $s->c;
      }
      $s->t = 8;
      return caml_utf16_of_utf8($s->c);
  }
}


function caml_bytes_unsafe_get(MlBytes $s, int $i): int {
  switch ($s->t & 6) {
    case 0:
      // TODO: Test that this is the same as charCodeAt
      return PHP\ord($s->c[$i]) | 0;
    case 4:
      // 'c' is an array.
      return $s->a[$i];
    default:
      // Partial(2) (will fall through).
      if ($i >= Str\length($s->c)) {
        // I wonder if this should throw an exception.
        return 0;
      }
      return PHP\ord($s->c[$i]) | 0;
  }
}

// caml_utf8_of_utf16 is really "convert from platform string to convenient
// representation" where "convenient representation" is a form of string that
// will allow us to efficiently perform all of the ocaml string operations with
// high degree of compatibility. For JS backends, that means converting the
// string to a string of characters each not exceeding \x7f.
// In PHP, the convenient representation is the default PHP string!
// That's because indexing into PHP strings is already as if the strings were
// broken up into characters not exceeding \x7f. This is commonly referred to
// as "UTF-8 raw bytes" string APIS. Reason/OCaml string APIs already match.
function caml_utf8_of_utf16(string $s): string {
  return $s;
}
function caml_utf16_of_utf8(string $s): string {
  return $s;
}

function caml_js_to_string(string $s): MlBytes {
  if (!($s is string)) {
    throw new \ErrorException("caml_js_to_string called with non-string");
  }
  $tag = 9 /* BYTES | ASCII */;
  if (!caml_is_ascii($s)) {
    $tag = 8 /* BYTES | NOT_ASCII */;
    $s = caml_utf8_of_utf16($s);
  }
  return new MlBytes($tag, Vector {}, $s, Str\length($s));
}


function caml_new_string(string $s): MlBytes {
  return new MlBytes(0, Vector {}, $s, Str\length($s));
}

function caml_ml_string_length(MlBytes $s): int {
  return $s->l;
}

function caml_raise_with_string(mixed $tag, string $msg): noreturn {
  caml_raise_with_arg($tag, caml_new_string($msg));
}

function caml_raise_with_arg(mixed $tag, mixed $arg): noreturn {
  throw caml_wrap_thrown_exception(varray[0, $tag, $arg]);
}

function caml_wrap_thrown_exception(mixed $e): RehpExceptionBox {
  if ($e is RehpExceptionBox) {
    return $e;
  }
  // Check for is_array because some exceptions are manually constructed in stubs
  if ($e is Vector<_> || \is_array($e)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if ($e is \Exception) {
    return new RehpExceptionBox(Vector {0, "phpError", $e}, $e->getCode(), $e);
  }
  //fallback: wrapped in Failure
  return new RehpExceptionBox(Vector {0, Failure::get(), $e});
}


function caml_invalid_argument(string $msg): noreturn {
  caml_raise_with_string(Invalid_argument::get(), $msg);
}


function caml_raise_sys_error(string $msg): noreturn {
  caml_raise_with_string(Sys_error::get(), $msg);
}

function caml_string_bound_error(): noreturn {
  caml_invalid_argument("index out of bounds");
}


function caml_wrap_exception(mixed $e): mixed {
  if ($e is RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e is Vector<_> || \is_array($e)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if ($e is \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return Vector {0, "phpError", $e};
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return Vector {0, Failure::get(), $e};
}


function caml_create_bytes(int $len): MlBytes {
  if ($len < 0) {
    caml_invalid_argument("Bytes.create");
  }
  return new MlBytes($len ? 2 : (9), Vector {}, "", $len);
}

function right_shift_32(int $a, int $b): int {
  if (\PHP_INT_SIZE === 8) {
    // 64 bit.
    $a_normalized = ($a << 32) >> 32;
  } else {
    // Size four means 32bit
    $a_normalized = $a;
  }
  return $a_normalized >> $b;
}


// Bit shifters: To emulate 32 bits on 64 bit platforms, we shift off any
// leading 32 bits.
// See also:
// https://stackoverflow.com/a/25587827
// https://stackoverflow.com/questions/6303241/find-windows-32-or-64-bit-using-php
function left_shift_32(int $a, int $b): int {
  $shifted = $a << $b;
  if (\PHP_INT_SIZE === 8) {
    // 64 bit.
    return ($shifted << 32) >> 32;
  } else {
    // Size four means 32bit
    return $shifted;
  }
}


// >>> Unsigned shift right:
// https://stackoverflow.com/a/43359819
// Then the >> operator could be derived from this by preserving the sign.
function unsigned_right_shift_32(int $a, int $b): int {
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
}

function caml_bytes_get(MlBytes $s, int $i): int {
  if (unsigned_right_shift_32($i, 0) >= $s->l) {
    caml_string_bound_error();
  }
  return caml_bytes_unsafe_get($s, $i);
}

function caml_ml_bytes_length(MlBytes $s): int {
  return $s->l;
}

/**
 * Actually converts to a vector (name inherited from JS backend).
 */
function caml_convert_string_to_array(MlBytes $s): Vector<int> {
  $a = Vector {};
  $b = $s->c;
  $l = Str\length($b);
  $i = 0;
  for (; $i < $l; $i++) {
    // TODO: Test that this is the same as charCodeAt
    $a[] = PHP\ord($b[$i]);
  }
  for ($l = $s->l; $i < $l; $i++) {
    $a[] = 0;
  }
  $s->a = $a;
  $s->t = 4;
  return $a;
}

// Doesn't this need to reset the ->l property?
function caml_blit_bytes(
  MlBytes $s1,
  int $i1,
  MlBytes $s2,
  int $i2,
  int $len,
): int {
  if ($len === 0) {
    return 0;
  }
  if (
    $i2 === 0 &&
    ($len >= $s2->l || ($s2->t === 2 && $len >= Str\length($s2->c)))
  ) {
    // Array
    $s2->c = $s1->t === 4
      ? caml_subarray_to_string($s1->a, $i1, $len)
      : (
          $i1 === 0 && Str\length($s1->c) === $len
            ? $s1->c
            : (Str\slice($s1->c, $i1, $len))
        );
    $s2->t = Str\length($s2->c) === $s2->l ? 0 : 2;
  } else {
    // Partial
    if ($s2->t === 2 && $i2 === Str\length($s2->c)) {
      $s2->c = $s2->c.
        (
          $s1->t === 4
            ? caml_subarray_to_string($s1->a, $i1, $len)
            : (
                $i1 === 0 && Str\length($s1->c) === $len
                  ? $s1->c
                  : (Str\slice($s1->c, $i1, $len))
              )
        );
      $s2->t = Str\length($s2->c) === $s2->l ? 0 : 2;
    } else {
      if ($s2->t !== 4) {
        caml_convert_string_to_array($s2);
      }
      // Array
      if ($s1->t === 4) {
        if ($i2 <= $i1) {
          for ($i = 0; $i < $len; $i++) {
            $s2->a[$i2 + $i] = $s1->a[$i1 + $i];
          }
        } else {
          for ($i = $len - 1; $i >= 0; $i--) {
            $s2->a[$i2 + $i] = $s1->a[$i1 + $i];
          }
        }
      } else {
        $l = Math\minva($len, Str\length($s1->c) - $i1) ?? 0;
        for ($i = 0; $i < $l; $i++) {
          $s2->a[$i2 + $i] = PHP\ord($s1->c[$i1 + $i]);
        }
        for (; $i < $len; $i++) {
          $s2->a[$i2 + $i] = 0;
        }
      }
    }
  }
  return 0;
}


function caml_blit_string(
  MlBytes $s1,
  int $i1,
  MlBytes $s2,
  int $i2,
  int $len,
): int {
  return caml_blit_bytes($s1, $i1, $s2, $i2, $len);
}


function caml_fill_bytes(MlBytes $s, int $i, int $l, int $c): int {
  if ($l > 0) {
    if ($i === 0 && ($l >= $s->l || ($s->t === 2 && $l >= Str\length($s->c)))) {
      if ($c === 0) {
        $s->c = "";
        $s->t = 2;
      } else {
        $s->c = Str\repeat(PHP\chr($c), $l);
        $s->t = $l === $s->l ? 0 : (2);
      }
    } else {
      if ($s->t !== 4) {
        caml_convert_string_to_array($s);
      }
      for ($l += $i; $i < $l; $i++) {
        $s->a[$i] = $c;
      }
    }
  }
  return 0;
}


function js_print_stdout(string $s): void {
  print("Rehack", $s);
}

function js_print_stderr(string $s): void {
  print("Rehack", $s);
}

// Note: This is all one dependency.
function caml_sys_open_internal(
  int $idx,
  (function(int, string): mixed) $output,
  MlFakeFile $file,
  ?ChannelInfoFlags $flags,
): int {
  $flags = $flags ?? new ChannelInfoFlags();
  $info = new ChannelInfo(
    $file,
    $flags->append ? $file->length() : 0,
    $flags,
    $output,
  );
  ChannelInfo::set($idx, $info);
  return $idx;
}

//Provides: native_warn
//ForBackend: php
function native_warn(dynamic $s): void {
  print 'Rehack::warn' && print ($s is MlBytes ? $s->c : $s) && print "\n";
}

//Provides: native_error
//ForBackend: php
function native_error(dynamic $s): void {
  print 'Rehack::mustfix' && print ($s is MlBytes ? $s->c : $s) && print "\n";
}

//Provides: native_debug
//ForBackend: php
function native_debug(dynamic $s): void {
  print 'Rehack::debug' && print ($s is MlBytes ? $s->c : $s) && print "\n";
}

//Provides: native_log
//ForBackend: php
function native_log(dynamic $s): void {
  print 'Rehack::info' && print ($s is MlBytes ? $s->c : $s) && print "\n";
}

//Provides: native_out
//ForBackend: php
function native_out(dynamic $s): void {
  print 'Rehack::info' && print ($s is MlBytes ? $s->c : $s);
}

// Version of named flags only used by stubs. Compiled output will
// use numeric versions of flags in a list.
final class ChannelInfoFlags {
  public bool $rdonly = false;
  public bool $wronly = false;
  public bool $append = false;
  public bool $create = false;
  public bool $truncate = false;
  public int $excl = 1;
  public bool $binary = false;
  public bool $text = false;
  public bool $nonblock = false;
}

final class ChannelInfo {
  public static darray<int, ChannelInfo> $fds = darray[];
  public static int $fdLastIdx = 0;

  public static function get(int $id): ?ChannelInfo {
    return self::$fds[$id];
  }
  public static function set(int $id, ChannelInfo $val): void {
    if (self::$fdLastIdx === 0 || $id > self::$fdLastIdx) {
      self::$fdLastIdx = $id;
    }
    self::$fds[$id] = $val;
  }
  public function __construct(
    public MlFakeFile $file,
    public int $offset,
    public ChannelInfoFlags $flags,
    public (function(int, string): mixed) $output,
  ) {
  }
}


// @Provides caml_ml_channels
final class Channel {
  public static darray<int, Channel> $channels = darray[];

  public ?MlFakeFile $file = null;
  public ?int $offset = null;
  public ?int $fd = null;
  public ?bool $opened = null;
  public ?bool $out = null;
  public ?string $buffer = null;
  public ?darray<arraykey, mixed> $refill = null;

  public static function get(int $id): Channel {
    return self::$channels[$id];
  }
  public static function set(int $id, Channel $val): void {
    self::$channels[$id] = $val;
  }
}


final class OOCounter {
  public static int $lastID = 0;

  public static function freshID(): int {
    self::$lastID = self::$lastID + 1;
    return self::$lastID;
  }
}

function caml_fresh_oo_id(mixed $_unit): int {
  return OOCounter::freshID();
}

function math_pow(float $num, float $exp): float {
  // $num = to_number($num);
  // $exp = to_number($exp);
  if (
    PHP\is_nan(\PHPism_FIXME::coerceToFloat($num)) ||
    PHP\is_nan(\PHPism_FIXME::coerceToFloat($exp))
  ) {
    return \NAN;
  }
  return $num ** $exp;
}

function caml_int64_float_of_bits(Vector<mixed> $x): float {
  $x = tuple($x[0], $x[1] as int, $x[2] as int, $x[3] as int);
  $NaN = \NAN;
  $Infinity = \INF;
  $exp = right_shift_32($x[3] & 32767, 4);
  if ($exp === 2047) {
    if (($x[1] | $x[2] | $x[3] & 15) === 0) {
      return $x[3] & 32768 ? -$Infinity : $Infinity;
    } else {
      return $NaN;
    }
  }
  $k = 2 ** -24;
  $res = ($x[1] * $k + $x[2]) * $k + ($x[3] & 15);
  if ($exp > 0) {
    $res = $res + 16;
    $res *= 2 ** ($exp - 1027);
  } else {
    $res *= 2 ** -1026;
  }
  if ($x[3] & 32768) {
    $res = -$res;
  }
  return (float)$res;
}


function caml_std_output(int $chanid, string $s): int {
  $chan = Channel::get($chanid);
  $str = caml_new_string($s);
  $slen = caml_ml_string_length($str);
  $chan->file?->write(\nullthrows($chan->offset), $str, 0, $slen);
  $chan->offset = $chan->offset ?? 0 + $slen;
  return 0;
}

final class MlFakeFile {
  public function __construct(public MlBytes $data) {}
  public function truncate(int $len): void {
    $old = $this->data;
    $this->data = caml_create_bytes($len | 0);
    caml_blit_bytes($old, 0, $this->data, 0, $len);
  }
  public function length(): int {
    return caml_ml_bytes_length($this->data);
  }
  public function write(int $offset, MlBytes $buf, int $pos, int $len): int {
    $clen = $this->length();
    if ($offset + $len >= $clen) {
      $new_str = caml_create_bytes($offset + $len);
      $old_data = $this->data;
      $this->data = $new_str;
      caml_blit_bytes($old_data, 0, $this->data, 0, $clen);
    }
    caml_blit_bytes($buf, $pos, $this->data, $offset, $len);
    return 0;
  }
  public function read(int $offset, MlBytes $buf, int $pos, int $len): int {
    caml_blit_bytes($this->data, $offset, $buf, $pos, $len);
    return 0;
  }
  public function readOne(int $offset): int {
    return caml_bytes_get($this->data, $offset);
  }
  public function close(): void {
  }
}

final class Env {
  <<__Memoize>>
  public static function get(): Map<string, string> {
    return Map {};
  }
}

final class GlobalData {
  <<__Memoize>>
  public static function get(): Map<arraykey, mixed> {
    return Map {};
  }
}

function caml_get_global_data(): Map<arraykey, mixed> {
  return GlobalData::get();
}

function caml_register_global(int $n, mixed $v, ?string $name_opt): void {
  $caml_global_data = GlobalData::get();
  $caml_global_data[$n + 1] = $v;
  if ($name_opt !== null) {
    $caml_global_data[$name_opt] = $v;
  }
}


function caml_ml_open_descriptor_out(int $fd): mixed {
  $info = ChannelInfo::get($fd);
  if ($info?->flags?->rdonly ?? false) {
    caml_raise_sys_error("fd ".$fd." is readonly");
  }
  $channel = new Channel();
  $channel->file = $info?->file;
  $channel->offset = $info?->offset;
  $channel->fd = $fd;
  $channel->opened = true;
  $channel->out = true;
  $channel->buffer = "";
  Channel::set($channel->fd, $channel);
  return $channel->fd;
}


function caml_arity_test(mixed $f): int {
  if (PHP\is_object($f) && ($f is \Closure)) {
    return (new \ReflectionFunction($f))->getNumberOfParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
}

function caml_ml_open_descriptor_in(int $fd): int {
  $info = ChannelInfo::get($fd);
  if ($info?->flags?->wronly ?? false) {
    caml_raise_sys_error("fd ".$fd." is writeonly");
  }
  $channel = new Channel();
  $channel->file = $info?->file;
  $channel->offset = $info?->offset;
  $channel->fd = $fd;
  $channel->opened = true;
  $channel->out = false;
  $channel->refill = darray[];
  return $channel->fd;
}

/**
 * Float madness in php:
 *
 * This is true:
 *   1e3==1000
 * but this is false:
 *   1e3===1000
 *
 * The same is not true in JS.
 */
function caml_obj_tag(nonnull $x): num {
  if ($x is Vector<_>) {
    return $x[0] as num;
  } else if (\is_array($x)) {
    return $x[0] as num;
  } else if ($x is MlBytes) {
    return 252;
  } else {
    return 1000;
  }
}

function caml_parse_digit(int $c): int {
  if ($c >= 48 && $c <= 57) {
    return $c - 48;
  }
  if ($c >= 65 && $c <= 90) {
    return $c - 55;
  }
  if ($c >= 97 && $c <= 122) {
    return $c - 87;
  }
  return -1;
}

function caml_string_unsafe_get(MlBytes $s, int $i): int {
  switch ($s->t & 6) {
    case 4:
      return $s->a[$i];
    case 0:
      return PHP\ord($s->c[$i]);
    default:
      if ($i >= Str\length($s->c)) {
        return 0;
      }
      return PHP\ord($s->c[$i]);
  }
}

function caml_parse_sign_and_base(MlBytes $s): (int, int, int) {
  $i = 0;
  $len = caml_ml_string_length($s);
  $base = 10;
  $sign = 1;
  if ($len > 0) {
    switch (caml_string_unsafe_get($s, $i)) {
      case 45:
        $i++;
        $sign = -1;
        break;
      case 43:
        $i++;
        $sign = 1;
        break;
      /* added due to nonexhaustive switch */
      default:
        break;
    }
  }
  if ($i + 1 < $len && caml_string_unsafe_get($s, $i) === 48) {
    switch (caml_string_unsafe_get($s, $i + 1)) {
      case 120:
      // FALLTHROUGH
      case 88:
        $base = 16;
        $i = $i + 2;
        break;
      case 111:
      // FALLTHROUGH
      case 79:
        $base = 8;
        $i = $i + 2;
        break;
      case 98:
      // FALLTHROUGH
      case 66:
        $base = 2;
        $i = $i + 2;
        break;
    }
  }
  return tuple($i, $sign, $base);
}


function caml_int_of_string(MlBytes $s): int {
  $r = caml_parse_sign_and_base($s);
  $i = $r[0];
  $sign = $r[1];
  $base = $r[2];
  $len = caml_ml_string_length($s);
  $threshold = unsigned_right_shift_32(-1, 0);
  $c = $i < $len ? caml_string_unsafe_get($s, $i) : (0);
  $d = caml_parse_digit($c);
  if ($d < 0 || $d >= $base) {
    caml_failwith("int_of_string");
  }
  $res = $d;
  for ($i++; $i < $len; $i++) {
    $c = caml_string_unsafe_get($s, $i);
    if ($c === 95) {
      continue;
    }
    $d = caml_parse_digit($c);
    if ($d < 0 || $d >= $base) {
      break;
    }
    $res = $base * $res + $d;
    if ($res > $threshold) {
      caml_failwith("int_of_string");
    }
  }
  if ($i !== $len) {
    caml_failwith("int_of_string");
  }
  $res = $sign * $res;
  if ($base === 10 && (($res | 0) !== $res)) {
    caml_failwith("int_of_string res=$res base=$base");
  }
  return $res | 0;
}

function caml_failwith(string $msg): noreturn {
  caml_raise_with_string(Failure::get(), $msg);
}

function caml_string_equal(MlBytes $s1, MlBytes $s2): int {
  if ($s1 === $s2) {
    return 1;
  }
  if ($s1->t & 6) {
    caml_convert_string_to_bytes($s1);
  }
  if ($s2->t & 6) {
    caml_convert_string_to_bytes($s2);
  }
  return ($s1->c === $s2->c) ? 1 : 0;
}

function caml_string_get(MlBytes $s, int $i): int {
  if (unsigned_right_shift_32($i, 0) >= $s->l) {
    caml_string_bound_error();
  }
  return caml_string_unsafe_get($s, $i);
}

function caml_utf8_length(string $s): int {
  return \utf8_strlen($s);
}

function caml_string_compare(MlBytes $s1, MlBytes $s2): int {
  if ($s1->t & 6) {
    caml_convert_string_to_bytes($s1);
  }
  if ($s2->t & 6) {
    caml_convert_string_to_bytes($s2);
  }
  return $s1->c < $s2->c ? -1 : ($s1->c > $s2->c ? 1 : 0);
}

function caml_int64_compare(mixed $x, mixed $y): int {
  throw new \ErrorException("caml_int64_compare not yet implemented");
}

function caml_int_compare(int $a, int $b): int {
  if ($a < $b) {
    return -1;
  }
  if ($a === $b) {
    return 0;
  }
  return 1;
}

function caml_compare_val(mixed $a, mixed $b, bool $total): num {
  if ($a === null || $b === null) {
    return $a === $b ? 0 : ($a === null ? -1 : 1);
  }
  $stack = varray[];
  for (; ; ) {
    if (!($total && $a === $b)) {
      // This if block copied from the MlBytes section below.
      if ($a is string) {
        if ($b is string) {
          if ($a !== $b) {
            $x = $a < $b ? -1 : 1;
            if ($x !== 0) {
              return $x;
            }
          }
        } else {
          return 1;
        }
      } else if ($a is MlBytes) {
        if ($b is MlBytes) {
          if ($a !== $b) {
            $x = caml_string_compare($a, $b);
            if ($x !== 0) {
              return $x;
            }
          }
        } else {
          return 1;
        }
      } else {
        if ($a is Vector<_>) {
          if ($a[0] === ($a[0] as int | 0)) {
            $ta = $a[0] as int;
            if ($ta === 254) {
              $ta = 0;
            }
            if ($ta === 250) {
              $a = $a[1];
              continue;
            } else {
              if ($b is Vector<_> && $b[0] === ($b[0] as int | 0)) {
                $tb = $b[0] as int;
                if ($tb === 254) {
                  $tb = 0;
                }
                if ($tb === 250) {
                  $b = $b[1];
                  continue;
                } else {
                  if ($ta !== $tb) {
                    return $ta < $tb ? -1 : 1;
                  } else {
                    switch ($ta) {
                      case 248: {
                        $x = caml_int_compare($a[2] as int, $b[2] as int);
                        if ($x !== 0) {
                          return $x;
                        }
                        break;
                      }
                      case 251: {
                        caml_invalid_argument("equal: abstract value");
                      }
                      case 255: {
                        $x = caml_int64_compare($a, $b);
                        if ($x !== 0) {
                          return $x;
                        }
                        break;
                      }
                      default:
                        if ($a->count() !== $b->count()) {
                          return $a->count() < $b->count() ? -1 : 1;
                        }
                        if ($a->count() > 1) {
                          $stack[] = $a;
                          $stack[] = $b;
                          $stack[] = 1;
                        }
                    }
                  }
                }
              } else {
                return 1;
              }
            }
          }
        } else {
          if (
            $b is string ||
            $b is MlBytes ||
            ($b !== null && ($b is Vector<_> && $b[0] === ($b[0] as int | 0)))
          ) {
            return -1;
          } else {
            if (!($a is num) && $a !== null && $a && $a is Comparable<_>) {
              /* HH_FIXME[4110] Not sure how to ensure that $b is the same type as $a */
              $cmp = $a->compare($b, $total);
              if ($cmp != 0) {
                return $cmp ? 1 : 0;
              }
            } else {
              if (PHP\is_callable($a)) {
                caml_invalid_argument("compare: functional value");
              } else {
                $a = $a as num;
                $b = $b as num;
                if ($a < $b) {
                  return -1;
                }
                if ($a > $b) {
                  return 1;
                }
                if ($a != $b) {
                  if (!$total) {
                    return \NAN;
                  }
                  if ($a == $a) {
                    return 1;
                  }
                  if ($b == $b) {
                    return -1;
                  }
                }
              }
            }
          }
        }
      }
    }
    if (PHP\count($stack) === 0) {
      return 0;
    }
    $i = PHP\array_pop(inout $stack);
    $b = PHP\array_pop(inout $stack);
    $a = PHP\array_pop(inout $stack);
    /* HH_FIXME[4110] Exposed by typing PHP\array_pop */
    if ($i + 1 < PHP\count($a)) {
      $stack[] = $a;
      $stack[] = $b;
      /* HH_FIXME[4110] Exposed by typing PHP\array_pop */
      $stack[] = $i + 1;
    }
    /* HH_FIXME[4063] Exposed by typing PHP\array_pop */
    $a = $a[$i];
    /* HH_FIXME[4063] Exposed by typing PHP\array_pop */
    $b = $b[$i];
  }
}

function caml_compare(mixed $a, mixed $b): num {
  return caml_compare_val($a, $b, true);
}


function caml_equal(mixed $x, mixed $y): int {
  return caml_compare_val($x, $y, false) === 0 ? 1 : 0;
}

function caml_notequal(mixed $x, mixed $y): int {
  return (caml_compare_val($x, $y, false) != 0) ? 1 : 0;
}

function caml_greaterequal(mixed $x, mixed $y): int {
  return (caml_compare_val($x, $y, false) >= 0) ? 1 : 0;
}

function caml_greaterthan(mixed $x, mixed $y): int {
  return (caml_compare_val($x, $y, false) > 0) ? 1 : 0;
}

function caml_lessequal(mixed $x, mixed $y): int {
  return (caml_compare_val($x, $y, false) <= 0) ? 1 : 0;
}

function caml_lessthan(mixed $x, mixed $y): int {
  return (caml_compare_val($x, $y, false) < 0) ? 1 : 0;
}

function caml_call_gen(dynamic $f, varray<mixed> $args): mixed {
  $n = caml_arity_test($f);
  $argsLen = C\count($args);
  $d = $n - $argsLen;

  if ($d === 0) {
    return $f(...$args);
  } else if ($d < 0) {
    return caml_call_gen(
      $f(...array_sub($args, 0, $n)),
      array_sub($args, $n, $argsLen - $n),
    );
  } else {
    return function(mixed $x) use ($f, $args) {
      $args[] = $x;
      return caml_call_gen($f, $args);
    };
  }
}

function caml_call1(dynamic $f, dynamic $a1): dynamic {
  return caml_arity_test($f) === 1 ? $f($a1) : caml_call_gen($f, varray[$a1]);
}
function caml_call2(dynamic $f, dynamic $a1, dynamic $a2): dynamic {
  return caml_arity_test($f) === 2
    ? $f($a1, $a2)
    : caml_call_gen($f, varray[$a1, $a2]);
}

function caml_call3(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
): dynamic {
  return caml_arity_test($f) === 3
    ? $f($a1, $a2, $a3)
    : caml_call_gen($f, varray[$a1, $a2, $a3]);
}

function caml_call4(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
  dynamic $a4,
): dynamic {
  return caml_arity_test($f) === 4
    ? $f($a1, $a2, $a3, $a4)
    : caml_call_gen($f, varray[$a1, $a2, $a3, $a4]);
}
function caml_call5(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
  dynamic $a4,
  dynamic $a5,
): dynamic {
  return caml_arity_test($f) === 5
    ? $f($a1, $a2, $a3, $a4, $a5)
    : caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5]);
}
function caml_call6(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
  dynamic $a4,
  dynamic $a5,
  dynamic $a6,
): dynamic {
  return caml_arity_test($f) === 6
    ? $f($a1, $a2, $a3, $a4, $a5, $a6)
    : caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6]);
}
function caml_call7(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
  dynamic $a4,
  dynamic $a5,
  dynamic $a6,
  dynamic $a7,
): dynamic {
  return caml_arity_test($f) === 7
    ? $f($a1, $a2, $a3, $a4, $a5, $a6, $a7)
    : caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6, $a7]);
}
function caml_call8(
  dynamic $f,
  dynamic $a1,
  dynamic $a2,
  dynamic $a3,
  dynamic $a4,
  dynamic $a5,
  dynamic $a6,
  dynamic $a7,
  dynamic $a8,
): dynamic {
  return caml_arity_test($f) === 8
    ? $f($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8)
    : caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8]);
}


function is_int(mixed $x): bool {
  return $x is int;
}

function caml_sys_get_argv(mixed $_unit): Vector<mixed> {
  $main = caml_new_string("a.out");
  $args2 = Vector {0, $main};
  return Vector {0, $main, $args2};
}

function caml_sys_get_config(mixed $_unit): Vector<mixed> {
  return Vector {0, caml_new_string("Unix"), 32, 0};
}

function caml_sys_const_backend_type(mixed $_unit): Vector<mixed> {
  return Vector {0, caml_new_string("js_of_ocaml")};
}

function caml_sys_const_ostype_unix(mixed $_unit): int {
  return 1;
}

function caml_sys_const_ostype_win32(mixed $_unit): int {
  return 0;
}

function caml_sys_const_ostype_cygwin(mixed $_unit): int {
  return 0;
}

function caml_sys_const_max_wosize(mixed $_unit): int {
  return (int)(2147483647 / 4);
}

function caml_set_static_env(string $_k, string $_v): int {
  throw new \ErrorException("caml_set_static_env not yet implemented");
}

function caml_raise_constant(mixed $tag): noreturn {
  throw caml_wrap_thrown_exception($tag);
}

function caml_raise_not_found(mixed $_unit): noreturn {
  $caml_global_data = GlobalData::get();
  caml_raise_constant($caml_global_data['Not_found']);
}

function caml_raise_zero_divide(): void {
  $caml_global_data = GlobalData::get();
  caml_raise_constant($caml_global_data['Division_by_zero']);
}

/**
 * Mod math. Negative iff first number negative. Throws specific catchable
 * error if y is zero.
 */
function caml_mod(int $x, int $y): int {
  if ($y === 0) {
    caml_raise_zero_divide();
  }
  ;
  return $x % $y;
}

function caml_sys_getenv(mixed $_name): noreturn {
  caml_raise_not_found(0);
}

// TODO: use Vec\fill here after switching to vecs
function caml_make_vect(int $len, mixed $init): Vector<mixed> {
  $v = varray[];
  $v[] = 0;
  for ($i = 1; $i < $len + 1; $i++) {
    $v[] = $init;
  }
  return Vector::fromItems($v);
}

function caml_bytes_of_string(MlBytes $s): MlBytes {
  return $s;
}

function caml_string_of_bytes(MlBytes $s): MlBytes {
  return $s;
}

final class Ref {
  public mixed $contents = null;
  public function contents(mixed ...$args): dynamic {
    $contents = $this->contents as dynamic;
    return $contents(...$args);
  }
}

interface Comparable<T> {
  public function compare(T $other, bool $total): bool;
}

// A class that wraps thrown objects in something that implement Throwable
// because PHP will have it no other way.
final class RehpExceptionBox extends \Exception {
  public function __construct(
    public mixed $contents,
    int $code = 0,
    ?\Exception $chained = null,
  ) {
    parent::__construct("RehpExceptionBox", $code, $chained);
  }
}

type RuntimeT = shape(
  "caml_arity_test" => dynamic,
  "caml_array_append" => dynamic,
  "caml_array_blit" => mixed,
  "caml_array_concat" => mixed,
  "caml_array_get" => mixed,
  "caml_array_set" => mixed,
  "caml_array_sub" => dynamic,
  "caml_blit_bytes" => dynamic,
  "caml_blit_string" => dynamic,
  "caml_bytes_compare" => mixed,
  "caml_bytes_equal" => mixed,
  "caml_bytes_get" => dynamic,
  "caml_bytes_of_string" => dynamic,
  "caml_bytes_set" => mixed,
  "caml_bytes_unsafe_get" => dynamic,
  "caml_bytes_unsafe_set" => mixed,
  "caml_call1" => dynamic,
  "caml_call2" => dynamic,
  "caml_call3" => dynamic,
  "caml_call4" => dynamic,
  "caml_call5" => dynamic,
  "caml_call6" => dynamic,
  "caml_call7" => dynamic,
  "caml_call8" => dynamic,
  "caml_call_gen" => dynamic,
  "caml_check_bound" => dynamic,
  "caml_compare" => dynamic,
  "caml_create_bytes" => dynamic,
  "caml_ephe_blit_data" => mixed,
  "caml_ephe_blit_key" => mixed,
  "caml_ephe_check_data" => mixed,
  "caml_ephe_check_key" => mixed,
  "caml_ephe_create" => mixed,
  "caml_ephe_get_data" => mixed,
  "caml_ephe_get_data_copy" => mixed,
  "caml_ephe_get_key" => mixed,
  "caml_ephe_get_key_copy" => mixed,
  "caml_ephe_set_data" => mixed,
  "caml_ephe_set_key" => mixed,
  "caml_ephe_unset_data" => mixed,
  "caml_ephe_unset_key" => mixed,
  "caml_equal" => dynamic,
  "caml_fill_bytes" => dynamic,
  "caml_float_compare" => mixed,
  "caml_float_of_string" => mixed,
  "caml_format_float" => mixed,
  "caml_format_int" => mixed,
  "caml_fresh_oo_id" => dynamic,
  "caml_get_global_data" => dynamic,
  "caml_greaterequal" => dynamic,
  "caml_greaterthan" => dynamic,
  "caml_hash" => mixed,
  "caml_hash_univ_param" => null,
  "caml_input_value" => mixed,
  "caml_input_value_from_bytes" => mixed,
  "caml_int64_add" => mixed,
  "caml_int64_compare" => dynamic,
  "caml_int64_float_of_bits" => dynamic,
  "caml_int64_format" => mixed,
  "caml_int64_mod" => mixed,
  "caml_int64_neg" => mixed,
  "caml_int64_of_int32" => mixed,
  "caml_int64_of_string" => mixed,
  "caml_int64_or" => mixed,
  "caml_int64_shift_left" => mixed,
  "caml_int64_sub" => mixed,
  "caml_int64_to_int32" => mixed,
  "caml_int64_xor" => mixed,
  "caml_int_compare" => dynamic,
  "caml_int_of_string" => dynamic,
  "caml_js_from_array" => dynamic,
  "caml_js_to_array" => dynamic,
  "caml_js_to_string" => dynamic,
  "caml_lessequal" => dynamic,
  "caml_lessthan" => dynamic,
  "caml_make_float_vect" => mixed,
  "caml_make_vect" => dynamic,
  "caml_marshal_data_size" => mixed,
  "caml_md5_chan" => mixed,
  "caml_md5_string" => mixed,
  "caml_ml_bytes_length" => dynamic,
  "caml_ml_channel_size" => mixed,
  "caml_ml_channel_size_64" => mixed,
  "caml_ml_close_channel" => mixed,
  "caml_ml_enable_runtime_warnings" => mixed,
  "caml_ml_flush" => dynamic,
  "caml_ml_input" => mixed,
  "caml_ml_input_char" => mixed,
  "caml_ml_input_int" => mixed,
  "caml_ml_input_scan_line" => mixed,
  "caml_ml_open_descriptor_in" => dynamic,
  "caml_ml_open_descriptor_out" => dynamic,
  "caml_ml_out_channels_list" => mixed,
  "caml_ml_output" => dynamic,
  "caml_ml_output_bytes" => dynamic,
  "caml_ml_output_char" => dynamic,
  "caml_ml_output_int" => mixed,
  "caml_ml_pos_in" => mixed,
  "caml_ml_pos_in_64" => mixed,
  "caml_ml_pos_out" => mixed,
  "caml_ml_pos_out_64" => mixed,
  "caml_ml_runtime_warnings_enabled" => mixed,
  "caml_ml_seek_in" => mixed,
  "caml_ml_seek_in_64" => mixed,
  "caml_ml_seek_out" => mixed,
  "caml_ml_seek_out_64" => mixed,
  "caml_ml_set_binary_mode" => mixed,
  "caml_ml_set_channel_name" => mixed,
  "caml_ml_string_length" => dynamic,
  "caml_mod" => dynamic,
  "caml_mul" => mixed,
  "caml_new_string" => dynamic,
  "caml_notequal" => dynamic,
  "caml_obj_set_tag" => mixed,
  "caml_obj_tag" => dynamic,
  "caml_output_value" => mixed,
  "caml_output_value_to_buffer" => mixed,
  "caml_output_value_to_bytes" => mixed,
  "caml_raise_constant" => mixed,
  "caml_raise_not_found" => mixed,
  "caml_register_global" => mixed,
  "caml_set_static_env" => mixed,
  "caml_string_compare" => dynamic,
  "caml_string_equal" => dynamic,
  "caml_string_get" => dynamic,
  "caml_string_notequal" => mixed,
  "caml_string_of_bytes" => dynamic,
  "caml_string_unsafe_get" => dynamic,
  "caml_sys_const_backend_type" => dynamic,
  "caml_sys_const_max_wosize" => dynamic,
  "caml_sys_const_ostype_cygwin" => dynamic,
  "caml_sys_const_ostype_unix" => dynamic,
  "caml_sys_const_ostype_win32" => dynamic,
  "caml_sys_exit" => mixed,
  "caml_sys_get_argv" => dynamic,
  "caml_sys_get_config" => dynamic,
  "caml_sys_getenv" => dynamic,
  "caml_sys_open" => mixed,
  "caml_sys_random_seed" => mixed,
  "caml_trampoline" => mixed,
  "caml_trampoline_return" => mixed,
  "caml_utf8_length" => dynamic,
  "caml_wrap_exception" => dynamic,
  "caml_wrap_thrown_exception" => dynamic,
  "caml_wrap_thrown_exception_reraise" => dynamic,
  "is_int" => dynamic,
  "left_shift_32" => dynamic,
  "native_debug" => dynamic,
  "native_error" => dynamic,
  "native_log" => dynamic,
  "native_out" => dynamic,
  "native_warn" => dynamic,
  "null" => mixed,
  "right_shift_32" => dynamic,
  "unsigned_right_shift_32" => dynamic,
);

abstract final class Runtime {
  /**
   * Memoized module getter.
   */
  <<__Memoize>>
  public static function get(): RuntimeT {
    caml_sys_open_internal(
      0,
      fun('\\Rehack\\caml_std_output'),
      new MlFakeFile(caml_create_bytes(0)),
      null,
    );
    caml_sys_open_internal(
      1,
      function(int $_chan_id, string $s): void {
        js_print_stdout($s);
      },
      new MlFakeFile(caml_create_bytes(0)),
      null,
    );
    caml_sys_open_internal(
      2,
      function(int $_chan_id, string $s): void {
        js_print_stderr($s);
      },
      new MlFakeFile(caml_create_bytes(0)),
      null,
    );

    $register_global = vec[
      "Out_of_memory",
      "Sys_error",
      "Failure",
      "Invalid_argument",
      "End_of_file",
      "Division_by_zero",
      "Not_found",
      "Match_failure",
      "Stack_overflow",
      "Sys_blocked_io",
      "Assert_failure",
      "Undefined_recursive_module",
    ];
    foreach ($register_global as $i => $s) {
      caml_register_global($i, Vector {248, caml_new_string($s), -1 * $i}, $s);
    }
    return shape(
      "caml_arity_test" => fun('\\Rehack\\caml_arity_test') as dynamic,
      "caml_array_append" => fun('\\Rehack\\caml_array_append') as dynamic,
      "caml_array_blit" => null,
      "caml_array_concat" => null,
      "caml_array_get" => null,
      "caml_array_set" => null,
      "caml_array_sub" => fun('\\Rehack\\caml_array_sub') as dynamic,
      "caml_blit_bytes" => fun('\\Rehack\\caml_blit_bytes') as dynamic,
      "caml_blit_string" => fun('\\Rehack\\caml_blit_string') as dynamic,
      "caml_bytes_compare" => null,
      "caml_bytes_equal" => null,
      "caml_bytes_get" => fun('\\Rehack\\caml_bytes_get') as dynamic,
      "caml_bytes_of_string" => fun('\\Rehack\\caml_bytes_of_string')
        as dynamic,
      "caml_bytes_set" => null,
      "caml_bytes_unsafe_get" => fun('\\Rehack\\caml_bytes_unsafe_get')
        as dynamic,
      "caml_bytes_unsafe_set" => null,
      "caml_call1" => fun('\\Rehack\\caml_call1') as dynamic,
      "caml_call2" => fun('\\Rehack\\caml_call2') as dynamic,
      "caml_call3" => fun('\\Rehack\\caml_call3') as dynamic,
      "caml_call4" => fun('\\Rehack\\caml_call4') as dynamic,
      "caml_call5" => fun('\\Rehack\\caml_call5') as dynamic,
      "caml_call6" => fun('\\Rehack\\caml_call6') as dynamic,
      "caml_call7" => fun('\\Rehack\\caml_call7') as dynamic,
      "caml_call8" => fun('\\Rehack\\caml_call8') as dynamic,
      "caml_call_gen" => fun('\\Rehack\\caml_call_gen') as dynamic,
      "caml_check_bound" => fun('\\Rehack\\caml_check_bound') as dynamic,
      "caml_compare" => fun('\\Rehack\\caml_compare') as dynamic,
      "caml_create_bytes" => fun('\\Rehack\\caml_create_bytes') as dynamic,
      "caml_ephe_blit_data" => null,
      "caml_ephe_blit_key" => null,
      "caml_ephe_check_data" => null,
      "caml_ephe_check_key" => null,
      "caml_ephe_create" => null,
      "caml_ephe_get_data" => null,
      "caml_ephe_get_data_copy" => null,
      "caml_ephe_get_key" => null,
      "caml_ephe_get_key_copy" => null,
      "caml_ephe_set_data" => null,
      "caml_ephe_set_key" => null,
      "caml_ephe_unset_data" => null,
      "caml_ephe_unset_key" => null,
      "caml_equal" => fun('\\Rehack\\caml_equal') as dynamic,
      "caml_fill_bytes" => fun('\\Rehack\\caml_fill_bytes') as dynamic,
      "caml_float_compare" => null,
      "caml_float_of_string" => null,
      "caml_format_float" => null,
      "caml_format_int" => null,
      "caml_fresh_oo_id" => fun('\\Rehack\\caml_fresh_oo_id') as dynamic,
      "caml_get_global_data" => fun('\\Rehack\\caml_get_global_data')
        as dynamic,
      "caml_greaterequal" => fun('\\Rehack\\caml_greaterequal') as dynamic,
      "caml_greaterthan" => fun('\\Rehack\\caml_greaterthan') as dynamic,
      "caml_hash" => null,
      "caml_hash_univ_param" => null,
      "caml_input_value" => null,
      "caml_input_value_from_bytes" => null,
      "caml_int64_add" => null,
      "caml_int64_compare" => fun('\\Rehack\\caml_int64_compare') as dynamic,
      "caml_int64_float_of_bits" => fun('\\Rehack\\caml_int64_float_of_bits')
        as dynamic,
      "caml_int64_format" => null,
      "caml_int64_mod" => null,
      "caml_int64_neg" => null,
      "caml_int64_of_int32" => null,
      "caml_int64_of_string" => null,
      "caml_int64_or" => null,
      "caml_int64_shift_left" => null,
      "caml_int64_sub" => null,
      "caml_int64_to_int32" => null,
      "caml_int64_xor" => null,
      "caml_int_compare" => fun('\\Rehack\\caml_int_compare') as dynamic,
      "caml_int_of_string" => fun('\\Rehack\\caml_int_of_string') as dynamic,
      "caml_js_from_array" => fun('\\Rehack\\caml_js_from_array') as dynamic,
      "caml_js_to_array" => fun('\\Rehack\\caml_js_to_array') as dynamic,
      "caml_js_to_string" => fun('\\Rehack\\caml_js_to_string') as dynamic,
      "caml_lessequal" => fun('\\Rehack\\caml_lessequal') as dynamic,
      "caml_lessthan" => fun('\\Rehack\\caml_lessthan') as dynamic,
      "caml_make_float_vect" => null,
      "caml_make_vect" => fun('\\Rehack\\caml_make_vect') as dynamic,
      "caml_marshal_data_size" => null,
      "caml_md5_chan" => null,
      "caml_md5_string" => null,
      "caml_ml_bytes_length" => fun('\\Rehack\\caml_ml_bytes_length')
        as dynamic,
      "caml_ml_channel_size" => null,
      "caml_ml_channel_size_64" => null,
      "caml_ml_close_channel" => null,
      "caml_ml_enable_runtime_warnings" => null,
      "caml_ml_flush" => fun('\\Rehack\\caml_ml_flush') as dynamic,
      "caml_ml_input" => null,
      "caml_ml_input_char" => null,
      "caml_ml_input_int" => null,
      "caml_ml_input_scan_line" => null,
      "caml_ml_open_descriptor_in" =>
        fun('\\Rehack\\caml_ml_open_descriptor_in') as dynamic,
      "caml_ml_open_descriptor_out" =>
        fun('\\Rehack\\caml_ml_open_descriptor_out') as dynamic,
      "caml_ml_out_channels_list" => null,
      "caml_ml_output" => fun('\\Rehack\\caml_ml_output') as dynamic,
      "caml_ml_output_bytes" => fun('\\Rehack\\caml_ml_output_bytes')
        as dynamic,
      "caml_ml_output_char" => fun('\\Rehack\\caml_ml_output_char') as dynamic,
      "caml_ml_output_int" => null,
      "caml_ml_pos_in" => null,
      "caml_ml_pos_in_64" => null,
      "caml_ml_pos_out" => null,
      "caml_ml_pos_out_64" => null,
      "caml_ml_runtime_warnings_enabled" => null,
      "caml_ml_seek_in" => null,
      "caml_ml_seek_in_64" => null,
      "caml_ml_seek_out" => null,
      "caml_ml_seek_out_64" => null,
      "caml_ml_set_binary_mode" => null,
      "caml_ml_set_channel_name" => null,
      "caml_ml_string_length" => fun('\\Rehack\\caml_ml_string_length')
        as dynamic,
      "caml_mod" => fun('\\Rehack\\caml_mod') as dynamic,
      "caml_mul" => null,
      "caml_new_string" => fun('\\Rehack\\caml_new_string') as dynamic,
      "caml_notequal" => fun('\\Rehack\\caml_notequal') as dynamic,
      "caml_obj_set_tag" => null,
      "caml_obj_tag" => fun('\\Rehack\\caml_obj_tag') as dynamic,
      "caml_output_value" => null,
      "caml_output_value_to_buffer" => null,
      "caml_output_value_to_bytes" => null,
      "caml_raise_constant" => fun('\\Rehack\\caml_raise_constant') as dynamic,
      "caml_raise_not_found" => fun('\\Rehack\\caml_raise_not_found')
        as dynamic,
      "caml_register_global" => fun('\\Rehack\\caml_register_global')
        as dynamic,
      "caml_set_static_env" => fun('\\Rehack\\caml_set_static_env') as dynamic,
      "caml_string_compare" => fun('\\Rehack\\caml_string_compare') as dynamic,
      "caml_string_equal" => fun('\\Rehack\\caml_string_equal') as dynamic,
      "caml_string_get" => fun('\\Rehack\\caml_string_get') as dynamic,
      "caml_string_notequal" => null,
      "caml_string_of_bytes" => fun('\\Rehack\\caml_string_of_bytes')
        as dynamic,
      "caml_string_unsafe_get" => fun('\\Rehack\\caml_string_unsafe_get')
        as dynamic,
      "caml_sys_const_backend_type" =>
        fun('\\Rehack\\caml_sys_const_backend_type') as dynamic,
      "caml_sys_const_max_wosize" => fun('\\Rehack\\caml_sys_const_max_wosize')
        as dynamic,
      "caml_sys_const_ostype_cygwin" =>
        fun('\\Rehack\\caml_sys_const_ostype_cygwin') as dynamic,
      "caml_sys_const_ostype_unix" =>
        fun('\\Rehack\\caml_sys_const_ostype_unix') as dynamic,
      "caml_sys_const_ostype_win32" =>
        fun('\\Rehack\\caml_sys_const_ostype_win32') as dynamic,
      "caml_sys_exit" => null,
      "caml_sys_get_argv" => fun('\\Rehack\\caml_sys_get_argv') as dynamic,
      "caml_sys_get_config" => fun('\\Rehack\\caml_sys_get_config') as dynamic,
      "caml_sys_getenv" => fun('\\Rehack\\caml_sys_getenv') as dynamic,
      "caml_sys_open" => null,
      "caml_sys_random_seed" => null,
      "caml_trampoline" => null,
      "caml_trampoline_return" => null,
      "caml_utf8_length" => fun('\\Rehack\\caml_utf8_length') as dynamic,
      "caml_wrap_exception" => fun('\\Rehack\\caml_wrap_exception') as dynamic,
      "caml_wrap_thrown_exception" =>
        fun('\\Rehack\\caml_wrap_thrown_exception') as dynamic,
      // TODO: Actually implement exception chaining with special primitive
      "caml_wrap_thrown_exception_reraise" =>
        fun('\\Rehack\\caml_wrap_thrown_exception') as dynamic,
      "is_int" => fun('\\Rehack\\is_int') as dynamic,
      "left_shift_32" => fun('\\Rehack\\left_shift_32') as dynamic,
      "native_debug" => fun('\\Rehack\\native_debug') as dynamic,
      "native_error" => fun('\\Rehack\\native_error') as dynamic,
      "native_log" => fun('\\Rehack\\native_log') as dynamic,
      "native_out" => fun('\\Rehack\\native_out') as dynamic,
      "native_warn" => fun('\\Rehack\\native_warn') as dynamic,
      "null" => null,
      "right_shift_32" => fun('\\Rehack\\right_shift_32') as dynamic,
      "unsigned_right_shift_32" => fun('\\Rehack\\unsigned_right_shift_32')
        as dynamic,
    );

  }
}

final class GlobalObject {
  public function __construct(public RuntimeT $jsoo_runtime) {}

  <<__Memoize>>
  public static function get(): GlobalObject {
    return new GlobalObject(Runtime::get());
  }
}
