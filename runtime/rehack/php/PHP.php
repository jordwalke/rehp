<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

namespace Rehack\PHP;

function array_push(&$array, $var, ...$rest) {
  return \array_push(
    &$array,
    $var,
    ...$rest
  );
}

function array_shift(&$array) {
  return \array_shift(
    &$array,
  );
}

function array_merge($array1, ...$rest) {
  return \array_merge(
    $array1,
    ...$rest
  );
}

function array_slice(
  $array,
  $offset,
  $length = null,
  $preserve_keys = false,
) {
  return \array_slice(
    $array,
    $offset,
    $length,
    $preserve_keys,
  );
}

function intval($v, $base = 10) {
  return \intval(
    $v,
    $base,
  );
}

function preg_match(
  $pattern,
  $subject,
  &$matches,
  $flags = 0,
  $offset = 0,
) {
  return \preg_match(
    $pattern,
    $subject,
    &$matches,
    $flags,
    $offset,
  );
}

function array_key_exists($key, $search) {
  return \array_key_exists($key, $search);
}

function is_object($x) {
  return \is_object($x);
}

function is_nan($x) {
  return \is_nan($x);
}

function count($x) {
  return \count($x);
}

function strlen($x) {
  return \strlen($x);
}

// TODO confirm this implementation
function mb_substr($str, $start, $length = 0x7FFFFFFF) {
  return \mb_substr(
    $str,
    $start,
    $length,
  );
}

function substr($str, $start, $length = 0x7FFFFFFF) {
  return \substr(
    $str,
    $start,
    $length,
  );
}

function is_string($arg) {
  return \is_string($arg);
}

function is_callable($x) {
  return \is_callable($x);
}


function strpos($x, $y) {
  return \strpos($x, $y);
}

function ord($x) {
  return \ord($x);
}

function implode($x, $y) {
  return \implode($x, $y);
}

function str_replace($x, $y, $z) {
  return \str_replace($x, $y, $z);
}

function round($x) {
  return \round($x);
}

function preg_replace(
  $pattern,
  $replacement,
  $subject,
  $limit = -1,
) {
  return \preg_replace(
    $pattern,
    $replacement,
    $subject,
    $limit,
  );
}

function mb_strlen($x) {
  return \mb_strlen($x);
}

function explode($x, $y) {
  return \explode($x, $y);
}

function array_keys($x) {
  return \array_keys($x);
}

function tan($x) {
  return \tan($x);
}

function str_repeat($x, $y) {
  return \str_repeat($x, $y);
}

function sqrt($x) {
  return \sqrt($x);
}

function sin($x) {
  return \sin($x);
}

function mt_rand() {
  return \mt_rand();
}

function microtime($x) {
  return \microtime($x);
}

function mb_strrpos($x, $y) {
  return \mb_strrpos($x, $y);
}

function mb_strpos($x, $y, $z) {
  return \mb_strpos($x, $y, $z);
}

function mb_convert_encoding($x, $y, $z) {
  return \mb_convert_encoding($x, $y, $z);
}

function max($x) {
  return \max($x);
}

function log($x) {
  return \log($x);
}

function hexdec($x) {
  return \hexdec($x);
}

function floor($x) {
  return \floor($x);
}

function exp($x) {
  return \exp($x);
}

function cos($x) {
  return \cos($x);
}

function chr($x) {
  return \chr($x);
}

function ceil($x) {
  return \ceil($x);
}

function atan2($x, $y) {
  return \atan2($x, $y);
}

function atan($x) {
  return \atan($x);
}

function abs($x) {
  return abs($x);
}
