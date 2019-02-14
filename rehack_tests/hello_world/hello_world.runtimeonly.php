<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Runtime.php
 */

namespace Rehack;

final class Runtime {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Runtime::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Runtime;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $caml_CamlinternalMod_update_mod = new Ref();
    $caml_ba_create_from = new Ref();
    $caml_oo_last_id = 0;
    $caml_ml_string_length = $Func(function($s) {return $s->l;});
    $caml_string_unsafe_get = $Func(
      function($s, $i) {
        switch($s->t & 6) {
          // FALLTHROUGH
          default:
            if ($i >= $s->c->length) {return 0;}
          // FALLTHROUGH
          case 0:
            return $s->c->charCodeAt($i);
          // FALLTHROUGH
          case 4:
            return $s->c[$i];
          }
      }
    );
    $caml_int64_add = $Func(
      function($x, $y) use ($ArrayLiteral,$plus,$right_shift_32) {
        $z1 = $plus($x[1], $y[1]);
        $z2 = $plus($x[2], $y[2]) + $right_shift_32($z1, 24);
        $z3 = $plus($x[3], $y[3]) + $right_shift_32($z2, 24);
        return $ArrayLiteral(255, $z1 & 16777215, $z2 & 16777215, $z3 & 65535);
      }
    );
    $caml_int64_offset = $Math->pow(2, - 24);
    $caml_int64_mul = $Func(
      function($x, $y) use ($ArrayLiteral,$caml_int64_offset) {
        $z1 = $x[1] * $y[1];
        $z2 = ($z1 * $caml_int64_offset | 0) + $x[2] * $y[1] + $x[1] * $y[2];
        $z3 = ($z2 * $caml_int64_offset | 0) + $x[3] * $y[1] +
          $x[2] *
            $y[2] +
          $x[1] *
            $y[3];
        return $ArrayLiteral(255, $z1 & 16777215, $z2 & 16777215, $z3 & 65535);
      }
    );
    $caml_int64_neg = $Func(
      function($x) use ($ArrayLiteral,$right_shift_32) {
        $y1 = - $x[1];
        $y2 = - $x[2] + $right_shift_32($y1, 24);
        $y3 = - $x[3] + $right_shift_32($y2, 24);
        return $ArrayLiteral(255, $y1 & 16777215, $y2 & 16777215, $y3 & 65535);
      }
    );
    $caml_int64_of_int32 = $Func(
      function($x) use ($ArrayLiteral,$right_shift_32) {
        return $ArrayLiteral(
          255,
          $x & 16777215,
          $right_shift_32($x, 24) & 16777215,
          $right_shift_32($x, 31) & 65535
        );
      }
    );
    $caml_obj_dup = $Func(
      function($x) use ($Array) {
        $l = $x->length;
        $a = $Array->new($l);
        for ($i = 0;$i < $l;$i++) $a[$i] = $x[$i];
        return $a;
      }
    );
    $caml_int64_sub = $Func(
      function($x, $y) use ($ArrayLiteral,$right_shift_32) {
        $z1 = $x[1] - $y[1];
        $z2 = $x[2] - $y[2] + $right_shift_32($z1, 24);
        $z3 = $x[3] - $y[3] + $right_shift_32($z2, 24);
        return $ArrayLiteral(255, $z1 & 16777215, $z2 & 16777215, $z3 & 65535);
      }
    );
    $caml_int64_ucompare = $Func(
      function($x, $y) {
        if ($x[3] > $y[3]) {return 1;}
        if ($x[3] < $y[3]) {return - 1;}
        if ($x[2] > $y[2]) {return 1;}
        if ($x[2] < $y[2]) {return - 1;}
        if ($x[1] > $y[1]) {return 1;}
        if ($x[1] < $y[1]) {return - 1;}
        return 0;
      }
    );
    $caml_int64_lsl1 = $Func(
      function($x) use ($left_shift_32,$right_shift_32) {
        $x[3] = $left_shift_32($x[3], 1) | $right_shift_32($x[2], 23);
        $x[2] =
          ($left_shift_32($x[2], 1) | $right_shift_32($x[1], 23)) & 16777215;
        $x[1] = $left_shift_32($x[1], 1) & 16777215;
      }
    );
    $caml_int64_lsr1 = $Func(
      function($x) use ($left_shift_32,$unsigned_right_shift_32) {
        $x[1] =
          ($unsigned_right_shift_32($x[1], 1) | $left_shift_32($x[2], 23)) & 16777215;
        $x[2] =
          ($unsigned_right_shift_32($x[2], 1) | $left_shift_32($x[3], 23)) & 16777215;
        $x[3] = $unsigned_right_shift_32($x[3], 1);
      }
    );
    $caml_int64_udivmod = $Func(
      function($x, $y) use ($ArrayLiteral,$caml_int64_lsl1,$caml_int64_lsr1,$caml_int64_sub,$caml_int64_ucompare,$caml_obj_dup) {
        $offset = 0;
        $modulus = $caml_obj_dup($x);
        $divisor = $caml_obj_dup($y);
        $quotient = $ArrayLiteral(255, 0, 0, 0);
        while($caml_int64_ucompare($modulus, $divisor) > 0) {$offset++;$caml_int64_lsl1($divisor);}
        while($offset >= 0) {
           $offset--;
           $caml_int64_lsl1($quotient);
           if ($caml_int64_ucompare($modulus, $divisor) >= 0) {
             $quotient[1]++;
             $modulus = $caml_int64_sub($modulus, $divisor);
           }
           $caml_int64_lsr1($divisor);
         }
        return $ArrayLiteral(0, $quotient, $modulus);
      }
    );
    $caml_int64_ult = $Func(
      function($x, $y) use ($caml_int64_ucompare) {
        return $caml_int64_ucompare($x, $y) < 0;
      }
    );
    $caml_parse_sign_and_base = $Func(
      function($s) use ($ArrayLiteral,$caml_ml_string_length,$caml_string_unsafe_get,$plus) {
        $i = 0;$len = $caml_ml_string_length($s);$base = 10;$sign = 1;
        if ($len > 0) {
          switch($caml_string_unsafe_get($s, $i)) {
            // FALLTHROUGH
            case 45:
              $i++;
              $sign = - 1;
              break;
            // FALLTHROUGH
            case 43:
              $i++;
              $sign = 1;
              break;
            }
        }
        if ($i + 1 < $len && $caml_string_unsafe_get($s, $i) == 48) {
          switch($caml_string_unsafe_get($s, $i + 1)) {
            // FALLTHROUGH
            case 120:
            // FALLTHROUGH
            case 88:
              $base = 16;
              $i = $plus($i, 2);
              break;
            // FALLTHROUGH
            case 111:
            // FALLTHROUGH
            case 79:
              $base = 8;
              $i = $plus($i, 2);
              break;
            // FALLTHROUGH
            case 98:
            // FALLTHROUGH
            case 66:
              $base = 2;
              $i = $plus($i, 2);
              break;
            }
        }
        return $ArrayLiteral($i, $sign, $base);
      }
    );
    
    
    
$String = $joo_global_object->String;
    
    
    $caml_named_values = $ObjectLiteral((object)darray[]);
    $caml_named_value = $Func(
      function($nm) use ($caml_named_values) {return $caml_named_values[$nm];}
    );
    $caml_global_data = $ArrayLiteral(0);
    
    
    
$caml_wrap_thrown_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if($e instanceof \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(R(0, $String->new("phpError"), $e), $e->getCode(), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};
    
    
    $caml_raise_with_arg = $Func(
      function($tag, $arg) use ($ArrayLiteral,$caml_wrap_thrown_exception) {
        throw $caml_wrap_thrown_exception($ArrayLiteral(0, $tag, $arg));
      }
    );
    $caml_str_repeat = $Func(
      function($n, $s) use ($String,$plus,$right_shift_32) {
        if ($s->repeat) {return $s->repeat($n);}
        $r = $String->new("");$l = 0;
        if ($n == 0) {return $r;}
        for (;;) {
          if ($n & 1) {$r = $plus($r, $s);}
          $n = $right_shift_32($n, 1);
          if ($n == 0) {return $r;}
          $s = $plus($s, $s);
          $l++;
          if ($l == 9) {$s->slice(0, 1);}
        }
      }
    );
    $raw_array_sub = $Func(
      function($a, $i, $l) use ($Array,$plus) {
        $b = $Array->new($l);
        for ($j = 0;$j < $l;$j++) $b[$j] = $a[$plus($i, $j)];
        return $b;
      }
    );
    $caml_subarray_to_string = $Func(
      function($a, $i, $len) use ($Math,$String,$eqEq,$plus,$raw_array_sub) {
        $f = $String->fromCharCode;
        if ($i == 0 && $len <= 4096 && $eqEq($len, $a->length)) {return $f->apply(varray[], $a);}
        $s = $String->new("");
        for (;0 < $len;($i += 1024) || true ? $len -= 1024 : ($len -= 1024)) $s =
          $plus(
            $s,
            $f->apply(varray[], $raw_array_sub($a, $i, $Math->min($len, 1024))
            )
          );
        return $s;
      }
    );
    $caml_convert_string_to_bytes = $Func(
      function($s) use ($String,$caml_str_repeat,$caml_subarray_to_string,$plus) {
        if ($s->t == 2) {
          $s->c =
            $plus(
              $s->c,
              $caml_str_repeat($s->l - $s->c->length, $String->new("\0"))
            );
        }
        else {$s->c = $caml_subarray_to_string($s->c, 0, $s->c->length);}
        $s->t = 0;
      }
    );
    $caml_is_ascii = $Func(
      function($s) use ($RegExp,$String) {
        if ($s->length < 24) {
          for ($i = 0;$i < $s->length;$i++) if ($s->charCodeAt($i) > 127) {return false;}
          return true;
        }
        else {return ! $RegExp->new($String->new("[^\\x00-\\x7f]"))->test($s);
        }
      }
    );
    $caml_utf16_of_utf8 = $Func(
      function($s) use ($String,$eqEq,$left_shift_32,$plus,$right_shift_32) {
        for (
          $b = $String->new(""),
          $t = $String->new(""),
          $c,
          $c1,
          $c2,
          $v,
          $i = 0,
          $l = $s->length;
          $i < $l;
          $i++
        ) {
          $c1 = $s->charCodeAt($i);
          if ($c1 < 128) {
            for ($j = $i + 1;$j < $l && ($c1 = $s->charCodeAt($j)) < 128;$j++) ;
            if ($j - $i > 512) {
              $t->substr(0, 1);
              $b = $plus($b, $t);
              $t = $String->new("");
              $b = $plus($b, $s->slice($i, $j));
            }
            else {$t = $plus($t, $s->slice($i, $j));}
            if ($eqEq($j, $l)) {break;}
            $i = $j;
          }
          $v = 1;
          if (++$i < $l && (($c2 = $s->charCodeAt($i)) & - 64) == 128) {
            $c = $c2 + $left_shift_32($c1, 6);
            if ($c1 < 224) {
              $v = $c - 12416;
              if ($v < 128) {$v = 1;}
            }
            else {
              $v = 2;
              if (++$i < $l && (($c2 = $s->charCodeAt($i)) & - 64) == 128) {
                $c = $c2 + $left_shift_32($c, 6);
                if ($c1 < 240) {
                  $v = $c - 925824;
                  if ($v < 2048 || $v >= 55295 && $v < 57344) {$v = 2;}
                }
                else {
                  $v = 3;
                  if (
                    ++$i < $l &&
                      (($c2 = $s->charCodeAt($i)) & - 64) == 128 &&
                      $c1 < 245
                  ) {
                    $v = $c2 - 63447168 + $left_shift_32($c, 6);
                    if ($v < 65536 || $v > 1114111) {$v = 3;}
                  }
                }
              }
            }
          }
          if ($v < 4) {
            $i -= $v;
            $t = $plus($t, $String->new("\ufffd"));
          }
          else {
            if ($v > 65535) {
              $t =
                $plus(
                  $t,
                  $String->fromCharCode(
                    55232 + $right_shift_32($v, 10),
                    56320 + ($v & 1023)
                  )
                );
            }
            else {$t = $plus($t, $String->fromCharCode($v));}
          }
          if ($t->length > 1024) {
            $t->substr(0, 1);
            $b = $plus($b, $t);
            $t = $String->new("");
          }
        }
        return $plus($b, $t);
      }
    );
    $caml_to_js_string = $Func(
      function($s) use ($caml_convert_string_to_bytes,$caml_is_ascii) {
        switch($s->t) {
          // FALLTHROUGH
          case 9:
            return $s->c;
          // FALLTHROUGH
          default:
            $caml_convert_string_to_bytes($s);
          // FALLTHROUGH
          case 0:
            if ($caml_is_ascii($s->c)) {$s->t = 9;return $s->c;}
            $s->t = 8;
          // FALLTHROUGH
          case 8:
            return $s->c;
          }
      }
    );
    $MlBytes = $Func(
      function($tag, $contents, $length) use ($joo_global_object) {
        $joo_global_object->context->t = $tag;
        $joo_global_object->context->c = $contents;
        $joo_global_object->context->l = $length;
      }
    );
    
    $MlBytes->prototype->toString =
      $Func(
        function() use ($caml_to_js_string,$joo_global_object) {
          return $caml_to_js_string($joo_global_object->context);
        }
      );
    
    $MlBytes->prototype->slice =
      $Func(
        function() use ($MlBytes,$joo_global_object) {
          $content = $joo_global_object->context->t == 4
            ? $joo_global_object->context->c->slice()
            : ($joo_global_object->context->c);
          return $MlBytes->new(
            $joo_global_object->context->t,
            $content,
            $joo_global_object->context->l
          );
        }
      );
    
    $caml_new_string_impl = $Func(
      function($s) use ($MlBytes) {return $MlBytes->new(0, $s, $s->length);}
    );
    $caml_new_string = $Func(
      function($s) use ($String,$caml_new_string_impl) {
        if (! instance_of($s, $String)) {
          return $caml_new_string_impl($String->new($s));
        }
        return $caml_new_string_impl($s);
      }
    );
    $caml_raise_with_string = $Func(
      function($tag, $msg) use ($caml_new_string,$caml_raise_with_arg) {
        $caml_raise_with_arg($tag, $caml_new_string($msg));
      }
    );
    $caml_failwith = $Func(
      function($msg) use ($caml_global_data,$caml_raise_with_string) {
        $caml_raise_with_string($caml_global_data->Failure, $msg);
      }
    );
    $caml_parse_digit = $Func(
      function($c) {
        if ($c >= 48 && $c <= 57) {return $c - 48;}
        if ($c >= 65 && $c <= 90) {return $c - 55;}
        if ($c >= 97 && $c <= 122) {return $c - 87;}
        return - 1;
      }
    );
    $caml_int64_of_string = $Func(
      function($s) use ($ArrayLiteral,$String,$caml_failwith,$caml_int64_add,$caml_int64_mul,$caml_int64_neg,$caml_int64_of_int32,$caml_int64_udivmod,$caml_int64_ult,$caml_ml_string_length,$caml_parse_digit,$caml_parse_sign_and_base,$caml_string_unsafe_get,$eqEq) {
        $r = $caml_parse_sign_and_base($s);
        $i = $r[0];$sign = $r[1];$base = $r[2];
        $base64 = $caml_int64_of_int32($base);
        $threshold = $caml_int64_udivmod(
           $ArrayLiteral(255, 16777215, 268435455, 65535),
           $base64
         )[1
         ];
        $c = $caml_string_unsafe_get($s, $i);
        $d = $caml_parse_digit($c);
        if ($d < 0 || $d >= $base) {
          $caml_failwith($String->new("int_of_string"));
        }
        $res = $caml_int64_of_int32($d);
        for (;;) {
          $i++;
          $c = $caml_string_unsafe_get($s, $i);
          if ($c == 95) {continue;}
          $d = $caml_parse_digit($c);
          if ($d < 0 || $d >= $base) {break;}
          if ($caml_int64_ult($threshold, $res)) {
            $caml_failwith($String->new("int_of_string"));
          }
          $d = $caml_int64_of_int32($d);
          $res = $caml_int64_add($caml_int64_mul($base64, $res), $d);
          if ($caml_int64_ult($res, $d)) {
            $caml_failwith($String->new("int_of_string"));
          }
        }
        if (! $eqEq($i, $caml_ml_string_length($s))) {
          $caml_failwith($String->new("int_of_string"));
        }
        if (
          $r[2] ==
            10 && $caml_int64_ult($ArrayLiteral(255, 0, 0, 32768), $res)
        ) {$caml_failwith($String->new("int_of_string"));}
        if ($sign < 0) {$res = $caml_int64_neg($res);}
        return $res;
      }
    );
    $caml_int64_is_zero = $Func(
      function($x) {return ($x[3] | $x[2] | $x[1]) == 0;}
    );
    $caml_int64_to_int32 = $Func(
      function($x) use ($left_shift_32) {
        return $x[1] | $left_shift_32($x[2], 24);
      }
    );
    $caml_int64_is_negative = $Func(
      function($x) use ($left_shift_32) {
        return $left_shift_32($x[3], 16) < 0;
      }
    );
    $caml_jsbytes_of_string = $Func(
      function($s) use ($caml_convert_string_to_bytes) {
        if (($s->t & 6) != 0) {$caml_convert_string_to_bytes($s);}
        return $s->c;
      }
    );
    $caml_invalid_argument = $Func(
      function($msg) use ($caml_global_data,$caml_raise_with_string) {
        $caml_raise_with_string($caml_global_data->Invalid_argument, $msg);
      }
    );
    $caml_parse_format = $Func(
      function($fmt) use ($ObjectLiteral,$String,$caml_invalid_argument,$caml_jsbytes_of_string) {
        $fmt = $caml_jsbytes_of_string($fmt);
        $len = $fmt->length;
        if ($len > 31) {
          $caml_invalid_argument($String->new("format_int: format too long"));
        }
        $f = $ObjectLiteral(
          (object)darray[
           "justify"=>$String->new("+"),
           "signstyle"=>$String->new("-"),
           "filler"=>$String->new(" "),
           "alternate"=>false,
           "base"=>0,
           "signedconv"=>false,
           "width"=>0,
           "uppercase"=>false,
           "sign"=>1,
           "prec"=>- 1,
           "conv"=>$String->new("f")]
        );
        for ($i = 0;$i < $len;$i++) {
          $c = $fmt->charAt($i);
          switch($c) {
            // FALLTHROUGH
            case $String->new("-"):
              $f->justify = $String->new("-");
              break;
            // FALLTHROUGH
            case $String->new("+"):
            // FALLTHROUGH
            case $String->new(" "):
              $f->signstyle = $c;
              break;
            // FALLTHROUGH
            case $String->new("0"):
              $f->filler = $String->new("0");
              break;
            // FALLTHROUGH
            case $String->new("#"):
              $f->alternate = true;
              break;
            // FALLTHROUGH
            case $String->new("1"):
            // FALLTHROUGH
            case $String->new("2"):
            // FALLTHROUGH
            case $String->new("3"):
            // FALLTHROUGH
            case $String->new("4"):
            // FALLTHROUGH
            case $String->new("5"):
            // FALLTHROUGH
            case $String->new("6"):
            // FALLTHROUGH
            case $String->new("7"):
            // FALLTHROUGH
            case $String->new("8"):
            // FALLTHROUGH
            case $String->new("9"):
              $f->width = 0;
              while
               (($c = $fmt->charCodeAt($i) - 48) || true
                  ? $c >= 0 && $c <= 9
                  : ($c >= 0 && $c <= 9)) {
                 $f->width = $f->width * 10 + $c;
                 $i++;
               }
              $i--;
              break;
            // FALLTHROUGH
            case $String->new("."):
              $f->prec = 0;
              $i++;
              while
               (($c = $fmt->charCodeAt($i) - 48) || true
                  ? $c >= 0 && $c <= 9
                  : ($c >= 0 && $c <= 9)) {
                 $f->prec = $f->prec * 10 + $c;
                 $i++;
               }
              $i--;
            // FALLTHROUGH
            case $String->new("d"):
            // FALLTHROUGH
            case $String->new("i"):$f->signedconv = true;
            // FALLTHROUGH
            case $String->new("u"):$f->base = 10;break;
            // FALLTHROUGH
            case $String->new("x"):$f->base = 16;break;
            // FALLTHROUGH
            case $String->new("X"):
              $f->base = 16;
              $f->uppercase = true;
              break;
            // FALLTHROUGH
            case $String->new("o"):$f->base = 8;break;
            // FALLTHROUGH
            case $String->new("e"):
            // FALLTHROUGH
            case $String->new("f"):
            // FALLTHROUGH
            case $String->new("g"):
              $f->signedconv = true;
              $f->conv = $c;
              break;
            // FALLTHROUGH
            case $String->new("E"):
            // FALLTHROUGH
            case $String->new("F"):
            // FALLTHROUGH
            case $String->new("G"):
              $f->signedconv = true;
              $f->uppercase = true;
              $f->conv = $c->toLowerCase();
              break;
            }
        }
        return $f;
      }
    );
    $caml_finish_formatting = $Func(
      function($f, $rawbuffer) use ($String,$caml_new_string,$eqEq,$plus) {
        if ($f->uppercase) {$rawbuffer = $rawbuffer->toUpperCase();}
        $len = $rawbuffer->length;
        if (
          $f->signedconv &&
            ($f->sign < 0 || ! $eqEq($f->signstyle, $String->new("-")))
        ) {$len++;}
        if ($f->alternate) {
          if ($f->base == 8) {$len = $plus($len, 1);}
          if ($f->base == 16) {$len = $plus($len, 2);}
        }
        $buffer = $String->new("");
        if (
          $eqEq($f->justify, $String->new("+")) &&
            $eqEq($f->filler, $String->new(" "))
        ) {
          for ($i = $len;$i < $f->width;$i++) $buffer =
            $plus($buffer, $String->new(" "));
        }
        if ($f->signedconv) {
          if ($f->sign < 0) {
            $buffer = $plus($buffer, $String->new("-"));
          }
          else {
            if (! $eqEq($f->signstyle, $String->new("-"))) {$buffer = $plus($buffer, $f->signstyle);}
          }
        }
        if ($f->alternate && $f->base == 8) {
          $buffer = $plus($buffer, $String->new("0"));
        }
        if ($f->alternate && $f->base == 16) {
          $buffer = $plus($buffer, $String->new("0x"));
        }
        if (
          $eqEq($f->justify, $String->new("+")) &&
            $eqEq($f->filler, $String->new("0"))
        ) {
          for ($i = $len;$i < $f->width;$i++) $buffer =
            $plus($buffer, $String->new("0"));
        }
        $buffer = $plus($buffer, $rawbuffer);
        if ($eqEq($f->justify, $String->new("-"))) {
          for ($i = $len;$i < $f->width;$i++) $buffer =
            $plus($buffer, $String->new(" "));
        }
        return $caml_new_string($buffer);
      }
    );
    $caml_int64_format = $Func(
      function($fmt, $x) use ($String,$caml_finish_formatting,$caml_int64_is_negative,$caml_int64_is_zero,$caml_int64_neg,$caml_int64_of_int32,$caml_int64_to_int32,$caml_int64_udivmod,$caml_parse_format,$caml_str_repeat,$plus) {
        $f = $caml_parse_format($fmt);
        if ($f->signedconv && $caml_int64_is_negative($x)) {$f->sign = - 1;$x = $caml_int64_neg($x);}
        $buffer = $String->new("");
        $wbase = $caml_int64_of_int32($f->base);
        $cvtbl = $String->new("0123456789abcdef");
        do {
          $p = $caml_int64_udivmod($x, $wbase);
          $x = $p[1];
          $buffer =
            $plus($cvtbl->charAt($caml_int64_to_int32($p[2])), $buffer);
        }
        while
         (! $caml_int64_is_zero($x));
        if ($f->prec >= 0) {
          $f->filler = $String->new(" ");
          $n = $f->prec - $buffer->length;
          if ($n > 0) {
            $buffer = $plus($caml_str_repeat($n, $String->new("0")), $buffer);
          }
        }
        return $caml_finish_formatting($f, $buffer);
      }
    );
    $caml_expm1_float = $Func(
      function($x) use ($Math) {
        $y = $Math->exp($x);$z = $y - 1;
        return $Math->abs($x) > 1
          ? $z
          : ($z == 0 ? $x : ($x * $z / $Math->log($y)));
      }
    );
    
    if ($joo_global_object->process && $joo_global_object->process->cwd) {
      $caml_current_dir = $joo_global_object->process->cwd()->replace(
        $RegExp->new($String->new("\\\\"), $String->new("g")),
        $String->new("/")
      );
    }
    else {$caml_current_dir = $String->new("/static");}
    
    if (! $eqEqEq($caml_current_dir->slice(- 1), $String->new("/"))) {$caml_current_dir = $plus($caml_current_dir, $String->new("/"));
    }
    
    $caml_make_path = $Func(
      function($name) use ($ArrayLiteral,$MlBytes,$String,$caml_current_dir,$plus) {
        $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
        if ($name->charCodeAt(0) != 47) {
          $name = $plus($caml_current_dir, $name);
        }
        $comp = $name->split($String->new("/"));
        $ncomp = $ArrayLiteral();
        for ($i = 0;$i < $comp->length;$i++) {
          switch($comp[$i]) {
            // FALLTHROUGH
            case $String->new(".."):
              if ($ncomp->length > 1) {$ncomp->pop();}
              break;
            // FALLTHROUGH
            case $String->new("."):break;
            // FALLTHROUGH
            case $String->new(""):
              if ($ncomp->length == 0) {$ncomp->push($String->new(""));}
              break;
            // FALLTHROUGH
            default:
              $ncomp->push($comp[$i]);
              break;
            }
        }
        $ncomp->orig = $name;
        return $ncomp;
      }
    );
    $caml_raise_sys_error = $Func(
      function($msg) use ($caml_global_data,$caml_raise_with_string) {
        $caml_raise_with_string($caml_global_data->Sys_error, $msg);
      }
    );
    $caml_raise_no_such_file = $Func(
      function($name) use ($MlBytes,$String,$caml_raise_sys_error,$plus) {
        $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
        $caml_raise_sys_error(
          $plus($name, $String->new(": No such file or directory"))
        );
      }
    );
    $caml_string_of_array = $Func(
      function($a) use ($MlBytes) {return $MlBytes->new(4, $a, $a->length);}
    );
    $caml_string_bound_error = $Func(
      function() use ($String,$caml_invalid_argument) {
        $caml_invalid_argument($String->new("index out of bounds"));
      }
    );
    $caml_bytes_unsafe_get = $Func(
      function($s, $i) {
        switch($s->t & 6) {
          // FALLTHROUGH
          default:
            if ($i >= $s->c->length) {return 0;}
          // FALLTHROUGH
          case 0:
            return $s->c->charCodeAt($i) | 0;
          // FALLTHROUGH
          case 4:
            return $s->c[$i];
          }
      }
    );
    $caml_bytes_get = $Func(
      function($s, $i) use ($caml_bytes_unsafe_get,$caml_string_bound_error,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
        return $caml_bytes_unsafe_get($s, $i);
      }
    );
    $caml_create_bytes = $Func(
      function($len) use ($MlBytes,$String,$caml_invalid_argument) {
        if ($len < 0) {$caml_invalid_argument($String->new("Bytes.create"));}
        return $MlBytes->new($len ? 2 : (9), $String->new(""), $len);
      }
    );
    $caml_ml_bytes_length = $Func(function($s) {return $s->l;});
    $caml_convert_string_to_array = $Func(
      function($s) use ($Array,$joo_global_object) {
        if ($joo_global_object->Uint8Array) {
          $a = $joo_global_object->Uint8Array->new($s->l);
        }
        else {$a = $Array->new($s->l);}
        $b = $s->c;$l = $b->length;$i = 0;
        for (;$i < $l;$i++) $a[$i] = $b->charCodeAt($i);
        for ($l = $s->l;$i < $l;$i++) $a[$i] = 0;
        $s->c = $a;
        $s->t = 4;
        return $a;
      }
    );
    $caml_blit_bytes = $Func(
      function($s1, $i1, $s2, $i2, $len) use ($Math,$caml_convert_string_to_array,$caml_subarray_to_string,$eqEq,$plus) {
        if ($len == 0) {return 0;}
        if (
          $i2 == 0 &&
            ($len >= $s2->l || $s2->t == 2 && $len >= $s2->c->length)
        ) {
          $s2->c =
            $s1->t == 4
              ? $caml_subarray_to_string($s1->c, $i1, $len)
              : ($i1 == 0 && $eqEq($s1->c->length, $len)
               ? $s1->c
               : ($s1->c->substr($i1, $len)));
          $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
        }
        else {
          if ($s2->t == 2 && $eqEq($i2, $s2->c->length)) {
            $s2->c =
              $plus(
                $s2->c,
                $s1->t == 4
                  ? $caml_subarray_to_string($s1->c, $i1, $len)
                  : ($i1 == 0 && $eqEq($s1->c->length, $len)
                   ? $s1->c
                   : ($s1->c->substr($i1, $len)))
              );
            $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
          }
          else {
            if ($s2->t != 4) {$caml_convert_string_to_array($s2);}
            $c1 = $s1->c;$c2 = $s2->c;
            if ($s1->t == 4) {
              if ($i2 <= $i1) {
                for ($i = 0;$i < $len;$i++) $c2[$plus($i2, $i)] =
                  $c1[$plus($i1, $i)];
              }
              else {
                for ($i = $len - 1;$i >= 0;$i--) $c2[$plus($i2, $i)] =
                  $c1[$plus($i1, $i)];
              }
            }
            else {
              $l = $Math->min($len, $c1->length - $i1);
              for ($i = 0;$i < $l;$i++) $c2[$plus($i2, $i)] =
                $c1->charCodeAt($plus($i1, $i));
              for (;$i < $len;$i++) $c2[$plus($i2, $i)] = 0;
            }
          }
        }
        return 0;
      }
    );
    $MlFile = $Func(function() {});
    $MlFakeFile = $Func(
      function($content) use ($joo_global_object) {
        $joo_global_object->context->data = $content;
      }
    );
    
    $MlFakeFile->prototype = $MlFile->new();
    
    $MlFakeFile->prototype->truncate =
      $Func(
        function($len) use ($caml_blit_bytes,$caml_create_bytes,$joo_global_object) {
          $old = $joo_global_object->context->data;
          $joo_global_object->context->data = $caml_create_bytes($len | 0);
          $caml_blit_bytes($old, 0, $joo_global_object->context->data, 0, $len
          );
        }
      );
    
    $MlFakeFile->prototype->length =
      $Func(
        function() use ($caml_ml_bytes_length,$joo_global_object) {
          return $caml_ml_bytes_length($joo_global_object->context->data);
        }
      );
    
    $MlFakeFile->prototype->write =
      $Func(
        function($offset, $buf, $pos, $len) use ($caml_blit_bytes,$caml_create_bytes,$joo_global_object,$plus) {
          $clen = $joo_global_object->context->length();
          if ($plus($offset, $len) >= $clen) {
            $new_str = $caml_create_bytes($plus($offset, $len));
            $old_data = $joo_global_object->context->data;
            $joo_global_object->context->data = $new_str;
            $caml_blit_bytes(
              $old_data,
              0,
              $joo_global_object->context->data,
              0,
              $clen
            );
          }
          $caml_blit_bytes(
            $buf,
            $pos,
            $joo_global_object->context->data,
            $offset,
            $len
          );
          return 0;
        }
      );
    
    $MlFakeFile->prototype->read =
      $Func(
        function($offset, $buf, $pos, $len) use ($caml_blit_bytes,$joo_global_object) {
          $clen = $joo_global_object->context->length();
          $caml_blit_bytes(
            $joo_global_object->context->data,
            $offset,
            $buf,
            $pos,
            $len
          );
          return 0;
        }
      );
    
    $MlFakeFile->prototype->read_one =
      $Func(
        function($offset) use ($caml_bytes_get,$joo_global_object) {
          return $caml_bytes_get($joo_global_object->context->data, $offset);
        }
      );
    
    $MlFakeFile->prototype->close = $Func(function() {});
    
    $MlFakeFile->prototype->constructor = $MlFakeFile;
    
    $MlFakeDevice = $Func(
      function($root, $f) use ($ObjectLiteral,$joo_global_object) {
        $joo_global_object->context->content =
          $ObjectLiteral((object)darray[]);
        $joo_global_object->context->root = $root;
        $joo_global_object->context->lookupFun = $f;
      }
    );
    
    $MlFakeDevice->prototype->nm =
      $Func(
        function($name) use ($joo_global_object,$plus) {
          return $plus($joo_global_object->context->root, $name);
        }
      );
    
    $MlFakeDevice->prototype->lookup =
      $Func(
        function($name) use ($MlFakeFile,$caml_new_string,$joo_global_object) {
          if (
            !
            $joo_global_object->context->content[$name] && $joo_global_object->context->lookupFun
          ) {
            $res = $joo_global_object->context->lookupFun(
              $caml_new_string($joo_global_object->context->root),
              $caml_new_string($name)
            );
            if ($res != 0) {
              $joo_global_object->context->content[$name] = $MlFakeFile->new($res[1]);
            }
          }
        }
      );
    
    $MlFakeDevice->prototype->exists =
      $Func(
        function($name) use ($RegExp,$String,$eqEq,$joo_global_object,$plus) {
          if ($eqEq($name, $String->new(""))) {return 1;}
          $name_slash = $plus($name, $String->new("/"));
          $r = $RegExp->new($plus($String->new("^"), $name_slash));
          foreach(
            $joo_global_object->context->content->__all_enumerable_keys()
            as
            
            $n=> $____
          ) {if ($n->match($r)) {return 1;}}
          $joo_global_object->context->lookup($name);
          return $joo_global_object->context->content[$name] ? 1 : (0);
        }
      );
    
    $MlFakeDevice->prototype->readdir =
      $Func(
        function($name) use ($ArrayLiteral,$ObjectLiteral,$RegExp,$String,$eqEq,$joo_global_object,$plus) {
          $name_slash = $eqEq($name, $String->new(""))
            ? $String->new("")
            : ($plus($name, $String->new("/")));
          $r = $RegExp->new(
            $plus(
              $plus($String->new("^"), $name_slash),
              $String->new("([^/]*)")
            )
          );
          $seen = $ObjectLiteral((object)darray[]);
          $a = $ArrayLiteral();
          foreach(
            $joo_global_object->context->content->__all_enumerable_keys()
            as
            
            $n=> $____
          ) {
            $m = $n->match($r);
            if ($m && ! $seen[$m[1]]) {$seen[$m[1]] = true;$a->push($m[1]);}
          }
          return $a;
        }
      );
    
    $MlFakeDevice->prototype->is_dir =
      $Func(
        function($name) use ($ArrayLiteral,$RegExp,$String,$eqEq,$joo_global_object,$plus) {
          $name_slash = $eqEq($name, $String->new(""))
            ? $String->new("")
            : ($plus($name, $String->new("/")));
          $r = $RegExp->new(
            $plus(
              $plus($String->new("^"), $name_slash),
              $String->new("([^/]*)")
            )
          );
          $a = $ArrayLiteral();
          foreach(
            $joo_global_object->context->content->__all_enumerable_keys()
            as
            
            $n=> $____
          ) {$m = $n->match($r);if ($m) {return 1;}}
          return 0;
        }
      );
    
    $MlFakeDevice->prototype->unlink =
      $Func(
        function($name) use ($joo_global_object) {
          $ok = $joo_global_object->context->content[$name] ? true : (false);
          unset($joo_global_object->context->content[$name]);
          return $ok;
        }
      );
    
    $MlFakeDevice->prototype->open =
      $Func(
        function($name, $f) use ($MlFakeFile,$String,$caml_create_bytes,$caml_raise_no_such_file,$caml_raise_sys_error,$joo_global_object,$plus) {
          if ($f->rdonly && $f->wronly) {
            $caml_raise_sys_error(
              $plus(
                $joo_global_object->context->nm($name),
                $String->new(
                  " : flags Open_rdonly and Open_wronly are not compatible"
                )
              )
            );
          }
          if ($f->text && $f->binary) {
            $caml_raise_sys_error(
              $plus(
                $joo_global_object->context->nm($name),
                $String->new(
                  " : flags Open_text and Open_binary are not compatible"
                )
              )
            );
          }
          $joo_global_object->context->lookup($name);
          if ($joo_global_object->context->content[$name]) {
            if ($joo_global_object->context->is_dir($name)) {
              $caml_raise_sys_error(
                $plus(
                  $joo_global_object->context->nm($name),
                  $String->new(" : is a directory")
                )
              );
            }
            if ($f->create && $f->excl) {
              $caml_raise_sys_error(
                $plus(
                  $joo_global_object->context->nm($name),
                  $String->new(" : file already exists")
                )
              );
            }
            $file = $joo_global_object->context->content[$name];
            if ($f->truncate) {$file->truncate();}
            return $file;
          }
          else {
            if ($f->create) {
              $joo_global_object->context->content[$name] = $MlFakeFile->new($caml_create_bytes(0));
              return $joo_global_object->context->content[$name];
            }
            else {
              $caml_raise_no_such_file($joo_global_object->context->nm($name));
            }
          }
        }
      );
    
    $MlFakeDevice->prototype->register =
      $Func(
        function($name, $content) use ($Array,$MlBytes,$MlFakeFile,$String,$caml_new_string,$caml_raise_sys_error,$caml_string_of_array,$joo_global_object,$plus) {
          if ($joo_global_object->context->content[$name]) {
            $caml_raise_sys_error(
              $plus(
                $joo_global_object->context->nm($name),
                $String->new(" : file already exists")
              )
            );
          }
          if (instance_of($content, $MlBytes)) {
            $joo_global_object->context->content[$name] = $MlFakeFile->new($content);
          }
          else {
            if (instance_of($content, $Array)) {
              $joo_global_object->context->content[$name] =
                $MlFakeFile->new($caml_string_of_array($content));
            }
            else {
              if ($content->toString) {
                $mlstring = $caml_new_string($content->toString());
                $joo_global_object->context->content[$name] = $MlFakeFile->new($mlstring);
              }
            }
          }
        }
      );
    
    $MlFakeDevice->prototype->constructor = $MlFakeDevice;
    
    $caml_array_of_string = $Func(
      function($s) use ($caml_convert_string_to_array) {
        if ($s->t != 4) {$caml_convert_string_to_array($s);}
        return $s->c;
      }
    );
    $caml_bytes_unsafe_set = $Func(
      function($s, $i, $c) use ($String,$caml_convert_string_to_array,$eqEq,$plus) {
        $c &= 255;
        if ($s->t != 4) {
          if ($eqEq($i, $s->c->length)) {
            $s->c = $plus($s->c, $String->fromCharCode($c));
            if ($eqEq($i + 1, $s->l)) {$s->t = 0;}
            return 0;
          }
          $caml_convert_string_to_array($s);
        }
        $s->c[$i] = $c;
        return 0;
      }
    );
    $caml_bytes_set = $Func(
      function($s, $i, $c) use ($caml_bytes_unsafe_set,$caml_string_bound_error,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
        return $caml_bytes_unsafe_set($s, $i, $c);
      }
    );
    $Buffer = $joo_global_object->Buffer;
    $MlNodeFile = $Func(
      function($fd) use ($String,$joo_global_object,$require) {
        $joo_global_object->context->fs = $require($String->new("fs"));
        $joo_global_object->context->fd = $fd;
      }
    );
    
    $MlNodeFile->prototype = $MlFile->new();
    
    $MlNodeFile->prototype->truncate =
      $Func(
        function($len) use ($joo_global_object) {
          $joo_global_object->context->fs->ftruncateSync(
            $joo_global_object->context->fd,
            $len | 0
          );
        }
      );
    
    $MlNodeFile->prototype->length =
      $Func(
        function() use ($joo_global_object) {
          return $joo_global_object->context->fs->fstatSync(
            $joo_global_object->context->fd
          )->size;
        }
      );
    
    $MlNodeFile->prototype->write =
      $Func(
        function($offset, $buf, $buf_offset, $len) use ($Buffer,$caml_array_of_string,$joo_global_object) {
          $a = $caml_array_of_string($buf);
          if (! instance_of($a, $joo_global_object->Uint8Array)) {$a = $joo_global_object->Uint8Array->new($a);}
          $buffer = $Buffer->from($a);
          $joo_global_object->context->fs->writeSync(
            $joo_global_object->context->fd,
            $buffer,
            $buf_offset,
            $len,
            $offset
          );
          return 0;
        }
      );
    
    $MlNodeFile->prototype->read =
      $Func(
        function($offset, $buf, $buf_offset, $len) use ($Buffer,$caml_array_of_string,$caml_bytes_set,$joo_global_object,$plus) {
          $a = $caml_array_of_string($buf);
          if (! instance_of($a, $joo_global_object->Uint8Array)) {$a = $joo_global_object->Uint8Array->new($a);}
          $buffer = $Buffer->from($a);
          $joo_global_object->context->fs->readSync(
            $joo_global_object->context->fd,
            $buffer,
            $buf_offset,
            $len,
            $offset
          );
          for ($i = 0;$i < $len;$i++) {
            $caml_bytes_set(
              $buf,
              $plus($buf_offset, $i),
              $buffer[$plus($buf_offset, $i)]
            );
          }
          return 0;
        }
      );
    
    $MlNodeFile->prototype->read_one =
      $Func(
        function($offset) use ($Buffer,$joo_global_object) {
          $a = $joo_global_object->Uint8Array->new(1);
          $buffer = $Buffer->from($a);
          $joo_global_object->context->fs->readSync(
            $joo_global_object->context->fd,
            $buffer,
            0,
            1,
            $offset
          );
          return $buffer[0];
        }
      );
    
    $MlNodeFile->prototype->close =
      $Func(
        function() use ($joo_global_object) {
          $joo_global_object->context->fs->closeSync(
            $joo_global_object->context->fd
          );
        }
      );
    
    $MlNodeFile->prototype->constructor = $MlNodeFile;
    
    $MlNodeDevice = $Func(
      function($root) use ($String,$joo_global_object,$require) {
        $joo_global_object->context->fs = $require($String->new("fs"));
        $joo_global_object->context->root = $root;
      }
    );
    
    $MlNodeDevice->prototype->nm =
      $Func(
        function($name) use ($joo_global_object,$plus) {
          return $plus($joo_global_object->context->root, $name);
        }
      );
    
    $MlNodeDevice->prototype->exists =
      $Func(
        function($name) use ($joo_global_object) {
          return $joo_global_object->context->fs->existsSync(
             $joo_global_object->context->nm($name)
           )
            ? 1
            : (0);
        }
      );
    
    $MlNodeDevice->prototype->readdir =
      $Func(
        function($name) use ($joo_global_object) {
          return $joo_global_object->context->fs->readdirSync(
            $joo_global_object->context->nm($name)
          );
        }
      );
    
    $MlNodeDevice->prototype->is_dir =
      $Func(
        function($name) use ($joo_global_object) {
          return $joo_global_object->context->fs->statSync(
             $joo_global_object->context->nm($name)
           )->isDirectory()
            ? 1
            : (0);
        }
      );
    
    $MlNodeDevice->prototype->unlink =
      $Func(
        function($name) use ($joo_global_object) {
          $b = $joo_global_object->context->fs->existsSync(
             $joo_global_object->context->nm($name)
           )
            ? 1
            : (0);
          $joo_global_object->context->fs->unlinkSync(
            $joo_global_object->context->nm($name)
          );
          return $b;
        }
      );
    
    $MlNodeDevice->prototype->open =
      $Func(
        function($name, $f) use ($MlNodeFile,$String,$joo_global_object,$require) {
          $consts = $require($String->new("constants"));
          $res = 0;
          foreach($f->__all_enumerable_keys() as $key=> $____) {
            switch($key) {
              // FALLTHROUGH
              case $String->new("rdonly"):
                $res |= $consts->O_RDONLY;
                break;
              // FALLTHROUGH
              case $String->new("wronly"):
                $res |= $consts->O_WRONLY;
                break;
              // FALLTHROUGH
              case $String->new("append"):
                $res |= $consts->O_WRONLY | $consts->O_APPEND;
                break;
              // FALLTHROUGH
              case $String->new("create"):
                $res |= $consts->O_CREAT;
                break;
              // FALLTHROUGH
              case $String->new("truncate"):
                $res |= $consts->O_TRUNC;
                break;
              // FALLTHROUGH
              case $String->new("excl"):
                $res |= $consts->O_EXCL;
                break;
              // FALLTHROUGH
              case $String->new("binary"):
                $res |= $consts->O_BINARY;
                break;
              // FALLTHROUGH
              case $String->new("text"):
                $res |= $consts->O_TEXT;
                break;
              // FALLTHROUGH
              case $String->new("nonblock"):
                $res |= $consts->O_NONBLOCK;
                break;
              }
          }
          $fd = $joo_global_object->context->fs->openSync(
            $joo_global_object->context->nm($name),
            $res
          );
          return $MlNodeFile->new($fd);
        }
      );
    
    $MlNodeDevice->prototype->rename =
      $Func(
        function($o, $n) use ($joo_global_object) {
          $joo_global_object->context->fs->renameSync(
            $joo_global_object->context->nm($o),
            $joo_global_object->context->nm($n)
          );
        }
      );
    
    $MlNodeDevice->prototype->constructor = $MlNodeDevice;
    
    $caml_root = $caml_current_dir->match(
       $RegExp->new($String->new("[^\\/]*\\/"))
     )[0
     ];
    $fs_node_supported = $Func(
      function() use ($String,$eqEqEq,$joo_global_object,$typeof) {
        return !
        $eqEqEq(
          $typeof($joo_global_object->process),
          $String->new("undefined")
        ) &&
          !
          $eqEqEq(
            $typeof($joo_global_object->process->versions),
            $String->new("undefined")
          ) &&
          !
          $eqEqEq(
            $typeof($joo_global_object->process->versions->node),
            $String->new("undefined")
          );
      }
    );
    $jsoo_mount_point = $ArrayLiteral();
    
    if ($fs_node_supported()) {
      $jsoo_mount_point->push(
        $ObjectLiteral(
          (object)darray[
           "path"=>$caml_root,
           "device"=>$MlNodeDevice->new($caml_root)]
        )
      );
    }
    else {
      $jsoo_mount_point->push(
        $ObjectLiteral(
          (object)darray[
           "path"=>$caml_root,
           "device"=>$MlFakeDevice->new($caml_root)]
        )
      );
    }
    
    $jsoo_mount_point->push(
      $ObjectLiteral(
        (object)darray[
         "path"=>$plus($caml_root, $String->new("static/")),
         "device"=>
         $MlFakeDevice->new($plus($caml_root, $String->new("static/")))]
      )
    );
    
    $resolve_fs_device = $Func(
      function($name) use ($ObjectLiteral,$String,$caml_make_path,$jsoo_mount_point,$plus) {
        $path = $caml_make_path($name);
        $name = $path->join($String->new("/"));
        $name_slash = $plus($name, $String->new("/"));
        $res = NULL;
        for ($i = 0;$i < $jsoo_mount_point->length;$i++) {
          $m = $jsoo_mount_point[$i];
          if (
            $name_slash->search($m->path) == 0 &&
              (! $res || $res->path->length < $m->path->length)
          ) {
            $res =
              $ObjectLiteral(
                (object)darray[
                 "path"=>$m->path,
                 "device"=>$m->device,
                 "rest"=>$name->substring($m->path->length, $name->length)]
              );
          }
        }
        return $res;
      }
    );
    $caml_sys_is_directory = $Func(
      function($name) use ($resolve_fs_device) {
        $root = $resolve_fs_device($name);
        $a = $root->device->is_dir($root->rest);
        return $a ? 1 : (0);
      }
    );
    $caml_string_get = $Func(
      function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
        return $caml_string_unsafe_get($s, $i);
      }
    );
    $caml_ba_set_1 = $Func(function($ba, $i0, $v) {return $ba->set1($i0, $v);}
    );
    $bigstring_blit_string_bigstring_stub = $Func(
      function($v_str, $v_src_pos, $v_bstr, $v_dst_pos, $v_len) use ($caml_ba_set_1,$caml_string_get,$plus) {
        for ($i = 0;$i < $v_len;$i++) $caml_ba_set_1(
          $v_bstr,
          $plus($v_dst_pos, $i),
          $caml_string_get($v_str, $plus($v_src_pos, $i))
        );
        return 0;
      }
    );
    $caml_blit_string_to_bigstring = $bigstring_blit_string_bigstring_stub;
    $caml_make_vect = $Func(
      function($len, $init) use ($Array) {
        $len = $len + 1 | 0;
        $b = $Array->new($len);
        $b[0] = 0;
        for ($i = 1;$i < $len;$i++) $b[$i] = $init;
        return $b;
      }
    );
    $js_print_stderr = $Func(
      function($s) use ($joo_global_object) {
        $g = $joo_global_object;
        if ($g->process && $g->process->stdout && $g->process->stdout->write) {$g->process->stderr->write($s);}
        else {
          if ($s->charCodeAt($s->length - 1) == 10) {$s = $s->substr(0, $s->length - 1);}
          $v = $g->console;
          $v && $v->error && $v->error($s);
        }
      }
    );
    $caml_utf8_of_utf16 = $Func(
      function($s) use ($String,$eqEq,$left_shift_32,$plus,$right_shift_32) {
        for (
          $b = $String->new(""),$t = $b,$c,$d,$i = 0,$l = $s->length;
          $i < $l;
          $i++
        ) {
          $c = $s->charCodeAt($i);
          if ($c < 128) {
            for ($j = $i + 1;$j < $l && ($c = $s->charCodeAt($j)) < 128;$j++) ;
            if ($j - $i > 512) {
              $t->substr(0, 1);
              $b = $plus($b, $t);
              $t = $String->new("");
              $b = $plus($b, $s->slice($i, $j));
            }
            else {$t = $plus($t, $s->slice($i, $j));}
            if ($eqEq($j, $l)) {break;}
            $i = $j;
          }
          if ($c < 2048) {
            $t =
              $plus($t, $String->fromCharCode(192 | $right_shift_32($c, 6)));
            $t = $plus($t, $String->fromCharCode(128 | $c & 63));
          }
          else {
            if ($c < 55296 || $c >= 57343) {
              $t =
                $plus(
                  $t,
                  $String->fromCharCode(
                    224 | $right_shift_32($c, 12),
                    128 | $right_shift_32($c, 6) & 63,
                    128 | $c & 63
                  )
                );
            }
            else {
              if (
                $c >= 56319 ||
                  $eqEq($i + 1, $l) ||
                  ($d = $s->charCodeAt($i + 1)) < 56320 ||
                  $d > 57343
              ) {$t = $plus($t, $String->new("\xef\xbf\xbd"));}
              else {
                $i++;
                $c = $left_shift_32($c, 10) + $d - 56613888;
                $t =
                  $plus(
                    $t,
                    $String->fromCharCode(
                      240 | $right_shift_32($c, 18),
                      128 | $right_shift_32($c, 12) & 63,
                      128 | $right_shift_32($c, 6) & 63,
                      128 | $c & 63
                    )
                  );
              }
            }
          }
          if ($t->length > 1024) {
            $t->substr(0, 1);
            $b = $plus($b, $t);
            $t = $String->new("");
          }
        }
        return $plus($b, $t);
      }
    );
    
    
    
  $ObjectLiteral = $joo_global_object->ObjectLiteral;
    
    
    
    
  $Error = $ObjectLiteral(darray[
     // Define to return a PHP exception subclass.
    "new" => function($payload) {
       return new \ErrorException($payload->__php_str);
    }
  ]);
    
    
    
    
$Func=$joo_global_object->Func;
    
    
    
    
$caml_js_to_string = $Func(
  function($s) use ($Error,$MlBytes,$String,$caml_is_ascii,$eqEqEq,$typeof) {
    if (PHP\is_string($s)) {
      $s=$String->new($s);
    }
    if (!$eqEqEq($typeof($s), $String->new("string"))) {
      throw $Error->new(
              $String->new("caml_js_to_string called with non-string")
            );
    }
    $tag = 9;
    if (! $caml_is_ascii($s)) {($tag = 8) || true ? $s = $s : ($s = $s);}
    return $MlBytes->new($tag, $s, $s->length);
  }
);
    
    
    $caml_raise_constant = $Func(
      function($tag) use ($caml_wrap_thrown_exception) {
        throw $caml_wrap_thrown_exception($tag);
      }
    );
    $caml_raise_not_found = $Func(
      function() use ($caml_global_data,$caml_raise_constant) {
        $caml_raise_constant($caml_global_data->Not_found);
      }
    );
    $caml_sys_getenv = $Func(
      function($name) use ($caml_js_to_string,$caml_raise_not_found,$joo_global_object) {
        $g = $joo_global_object;
        $n = $name->toString();
        if ($g->process && $g->process->env && $g->process->env[$n] != NULL) {return $caml_js_to_string($g->process->env[$n]);}
        if (
          $joo_global_object->jsoo_static_env &&
            $joo_global_object->jsoo_static_env[$n]
        ) {return $caml_js_to_string($joo_global_object->jsoo_static_env[$n]);
        }
        $caml_raise_not_found();
      }
    );
    $caml_sys_rename = $Func(
      function($o, $n) use ($String,$caml_failwith,$eqEq,$resolve_fs_device) {
        $o_root = $resolve_fs_device($o);
        $n_root = $resolve_fs_device($n);
        if (! $eqEq($o_root->device, $n_root->device)) {
          $caml_failwith(
            $String->new(
              "caml_sys_rename: cannot move file between two filesystem"
            )
          );
        }
        if (! $o_root->device->rename) {
          $caml_failwith($String->new("caml_sys_rename: no implemented"));
        }
        $o_root->device->rename($o_root->rest, $n_root->rest);
      }
    );
    $caml_raise_not_a_dir = $Func(
      function($name) use ($MlBytes,$String,$caml_raise_sys_error,$plus) {
        $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
        $caml_raise_sys_error($plus($name, $String->new(": Not a directory")));
      }
    );
    $caml_sys_read_directory = $Func(
      function($name) use ($Array,$caml_new_string,$resolve_fs_device) {
        $root = $resolve_fs_device($name);
        $a = $root->device->readdir($root->rest);
        $l = $Array->new($a->length + 1);
        $l[0] = 0;
        for ($i = 0;$i < $a->length;$i++) $l[$i + 1] =
          $caml_new_string($a[$i]);
        return $l;
      }
    );
    $caml_ml_channels = $Array->new();
    $caml_ml_seek_in = $Func(
      function($chanid, $pos) use ($String,$caml_ml_channels,$caml_raise_sys_error) {
        $chan = $caml_ml_channels[$chanid];
        if ($chan->refill != varray[]) {
          $caml_raise_sys_error($String->new("Illegal seek"));
        }
        $chan->offset = $pos;
        return 0;
      }
    );
    $caml_ml_flush = $Func(
      function($chanid) use ($String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$eqEq) {
        $chan = $caml_ml_channels[$chanid];
        if (! $chan->opened) {
          $caml_raise_sys_error($String->new("Cannot flush a closed channel"));
        }
        if (! $chan->buffer || $eqEq($chan->buffer, $String->new(""))) {return 0;}
        if (
          $chan->fd && $caml_global_data->fds[$chan->fd] &&
            $caml_global_data->fds[$chan->fd]->output
        ) {
          $output = $caml_global_data->fds[$chan->fd]->output;
          switch($output->length) {
            // FALLTHROUGH
            case 2:
              $output($chanid, $chan->buffer);
              break;
            // FALLTHROUGH
            default:
              $output($chan->buffer);
            }
          ;
        }
        $chan->buffer = $String->new("");
        return 0;
      }
    );
    $caml_ml_output_bytes = $Func(
      function($chanid, $buffer, $offset, $len) use ($String,$caml_blit_bytes,$caml_create_bytes,$caml_jsbytes_of_string,$caml_ml_bytes_length,$caml_ml_channels,$caml_ml_flush,$caml_raise_sys_error,$eqEq,$plus) {
        $chan = $caml_ml_channels[$chanid];
        if (! $chan->opened) {
          $caml_raise_sys_error(
            $String->new("Cannot output to a closed channel")
          );
        }
        $string = NULL;
        if ($offset == 0 && $eqEq($caml_ml_bytes_length($buffer), $len)) {$string = $buffer;}
        else {
          $string = $caml_create_bytes($len);
          $caml_blit_bytes($buffer, $offset, $string, 0, $len);
        }
        $jsstring = $caml_jsbytes_of_string($string);
        $id = $jsstring->lastIndexOf($String->new("\n"));
        if ($id < 0) {
          $chan->buffer = $plus($chan->buffer, $jsstring);
        }
        else {
          $chan->buffer = $plus($chan->buffer, $jsstring->substr(0, $id + 1));
          $caml_ml_flush($chanid);
          $chan->buffer = $plus($chan->buffer, $jsstring->substr($id + 1));
        }
        return 0;
      }
    );
    $caml_ml_output = $Func(
      function($chanid, $buffer, $offset, $len) use ($caml_ml_output_bytes) {
        return $caml_ml_output_bytes($chanid, $buffer, $offset, $len);
      }
    );
    $caml_ml_output_char = $Func(
      function($chanid, $c) use ($String,$caml_ml_output,$caml_new_string) {
        $s = $caml_new_string($String->fromCharCode($c));
        $caml_ml_output($chanid, $s, 0, 1);
        return 0;
      }
    );
    $caml_ml_refill_input = $Func(
      function($chan) use ($caml_ml_bytes_length) {
        $str = $chan->refill();
        $str_len = $caml_ml_bytes_length($str);
        if ($str_len == 0) {$chan->refill = varray[];}
        $chan->file->write($chan->file->length(), $str, 0, $str_len);
        return $str_len;
      }
    );
    $caml_ml_may_refill_input = $Func(
      function($chanid) use ($caml_ml_channels,$caml_ml_refill_input,$eqEq) {
        $chan = $caml_ml_channels[$chanid];
        if ($chan->refill == varray[]) {return;}
        if (! $eqEq($chan->file->length(), $chan->offset)) {return;}
        $caml_ml_refill_input($chan);
      }
    );
    $caml_raise_end_of_file = $Func(
      function() use ($caml_global_data,$caml_raise_constant) {
        $caml_raise_constant($caml_global_data->End_of_file);
      }
    );
    $caml_array_bound_error = $Func(
      function() use ($String,$caml_invalid_argument) {
        $caml_invalid_argument($String->new("index out of bounds"));
      }
    );
    $caml_ml_input_char = $Func(
      function($chanid) use ($caml_ml_channels,$caml_ml_may_refill_input,$caml_raise_end_of_file) {
        $chan = $caml_ml_channels[$chanid];
        $caml_ml_may_refill_input($chanid);
        if ($chan->offset >= $chan->file->length()) {$caml_raise_end_of_file();}
        $res = $chan->file->read_one($chan->offset);
        $chan->offset++;
        return $res;
      }
    );
    $caml_sys_const_ostype_win32 = $Func(function() {return 0;});
    $caml_obj_is_block = $Func(
      function($x) use ($Array) {return + instance_of($x, $Array);}
    );
    $caml_int64_float_of_bits = $Func(
      function($x) use ($Infinity,$Math,$NaN,$plus,$right_shift_32) {
        $exp = $right_shift_32($x[3] & 32767, 4);
        if ($exp == 2047) {
          if (($x[1] | $x[2] | $x[3] & 15) == 0) {
            return $x[3] & 32768 ? - $Infinity : ($Infinity);
          }
          else {return $NaN;}
        }
        $k = $Math->pow(2, - 24);
        $res = ($x[1] * $k + $x[2]) * $k + ($x[3] & 15);
        if ($exp > 0) {
          $res = $plus($res, 16);
          $res *= $Math->pow(2, $exp - 1027);
        }
        else {$res *= $Math->pow(2, - 1026);}
        if ($x[3] & 32768) {$res = - $res;}
        return $res;
      }
    );
    $caml_int64_of_bytes = $Func(
      function($a) use ($ArrayLiteral,$left_shift_32) {
        return $ArrayLiteral(
          255,
          $a[7] |
            $left_shift_32($a[6], 8) |
            $left_shift_32($a[5], 16),
          $a[4] |
            $left_shift_32($a[3], 8) |
            $left_shift_32($a[2], 16),
          $a[1] |
            $left_shift_32($a[0], 8)
        );
      }
    );
    $caml_float_of_bytes = $Func(
      function($a) use ($caml_int64_float_of_bits,$caml_int64_of_bytes) {
        return $caml_int64_float_of_bits($caml_int64_of_bytes($a));
      }
    );
    $caml_log10_float = $Func(
      function($x) use ($Math) {return $Math->LOG10E * $Math->log($x);}
    );
    $caml_runtime_warnings = 0;
    $caml_ml_enable_runtime_warnings = $Func(
      function($bool) use ($caml_runtime_warnings) {
        $caml_runtime_warnings = $bool;
        return 0;
      }
    );
    
    
    
  $isFinite = function($value) {
   $value = to_number($value);
   return !($value === \INF || $value === -\INF || PHP\is_nan($value));
  };
    
    
    
    
  $isNaN = function($value) {
   return PHP\is_nan(to_number($value));
  };
    
    
    $caml_classify_float = $Func(
      function($x) use ($Math,$isFinite,$isNaN) {
        if ($isFinite($x)) {
          if ($Math->abs($x) >= 2.22507385850720138e-308) {return 0;}
          if ($x != 0) {return 1;}
          return 2;
        }
        return $isNaN($x) ? 4 : (3);
      }
    );
    
    
    
  $eval = function($str){throw new \ErrorException("Eval not supported");};
    
    
    $caml_js_var = $Func(
      function($x) use ($RegExp,$String,$eval,$js_print_stderr,$plus) {
        $x = $x->toString();
        if (
          !
          $x->match(
            $RegExp->new(
              $String->new(
                "^[a-zA-Z_\$][a-zA-Z_\$0-9]*(\\.[a-zA-Z_\$][a-zA-Z_\$0-9]*)*\$"
              )
            )
          )
        ) {
          $js_print_stderr(
            $plus(
              $plus($String->new("caml_js_var: \""), $x),
              $String->new(
                "\" is not a valid JavaScript variable. continuing .."
              )
            )
          );
        }
        return $eval($x);
      }
    );
    $caml_ml_input_scan_line = $Func(
      function($chanid) use ($caml_ml_channels,$caml_ml_may_refill_input) {
        $chan = $caml_ml_channels[$chanid];
        $caml_ml_may_refill_input($chanid);
        $p = $chan->offset;
        $len = $chan->file->length();
        if ($p >= $len) {return 0;}
        while(true) {
           if ($p >= $len) {return - ($p - $chan->offset);}
           if ($chan->file->read_one($p) == 10) {return $p - $chan->offset + 1;}
           $p++;
         }
      }
    );
    $caml_std_output = $Func(
      function($chanid, $s) use ($caml_ml_channels,$caml_ml_string_length,$caml_new_string,$plus) {
        $chan = $caml_ml_channels[$chanid];
        $str = $caml_new_string($s);
        $slen = $caml_ml_string_length($str);
        $chan->file->write($chan->offset, $str, 0, $slen);
        $chan->offset = $plus($chan->offset, $slen);
        return 0;
      }
    );
    $caml_gc_minor = $Func(function() {return 0;});
    $caml_ephe_data_offset = 2;
    $caml_ephe_blit_data = $Func(
      function($src, $dst) use ($caml_ephe_data_offset) {
        $dst[$caml_ephe_data_offset] = $src[$caml_ephe_data_offset];
        return 0;
      }
    );
    $caml_is_printable = $Func(function($c) {return + ($c > 31 && $c < 127);});
    $caml_bytes_lessequal = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c <= $s2->c ? 1 : (0);
      }
    );
    $caml_ba_uint8_get64 = $Func(
      function($ba, $i0) use ($ArrayLiteral,$left_shift_32) {
        $b1 = $ba->get1($i0);
        $b2 = $left_shift_32($ba->get1($i0 + 1), 8);
        $b3 = $left_shift_32($ba->get1($i0 + 2), 16);
        $b4 = $ba->get1($i0 + 3);
        $b5 = $left_shift_32($ba->get1($i0 + 4), 8);
        $b6 = $left_shift_32($ba->get1($i0 + 5), 16);
        $b7 = $ba->get1($i0 + 6);
        $b8 = $left_shift_32($ba->get1($i0 + 7), 8);
        return $ArrayLiteral(255, $b1 | $b2 | $b3, $b4 | $b5 | $b6, $b7 | $b8);
      }
    );
    $caml_int64_compare = $Func(
      function($x, $y) use ($left_shift_32) {
        $x3 = $left_shift_32($x[3], 16);
        $y3 = $left_shift_32($y[3], 16);
        if ($x3 > $y3) {return 1;}
        if ($x3 < $y3) {return - 1;}
        if ($x[2] > $y[2]) {return 1;}
        if ($x[2] < $y[2]) {return - 1;}
        if ($x[1] > $y[1]) {return 1;}
        if ($x[1] < $y[1]) {return - 1;}
        return 0;
      }
    );
    $caml_int_compare = $Func(
      function($a, $b) use ($eqEq) {
        if ($a < $b) {return - 1;}
        if ($eqEq($a, $b)) {return 0;}
        return 1;
      }
    );
    $caml_string_compare = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c < $s2->c ? - 1 : ($s1->c > $s2->c ? 1 : (0));
      }
    );
    
    
    
  $NaN=\NAN;
    
    
    
    
  $is_in = function($key, $val) {
   return isset($val[$key]);
  };
    
    
    $caml_compare_val = $Func(
      function($a, $b, $total) use ($Array,$ArrayLiteral,$MlBytes,$NaN,$String,$caml_int64_compare,$caml_int_compare,$caml_invalid_argument,$caml_string_compare,$eqEq,$eqEqEq,$is_in,$typeof) {
        $stack = $ArrayLiteral();
        for (;;) {
          if (! ($total && $eqEqEq($a, $b))) {
            if (instance_of($a, $MlBytes)) {
              if (instance_of($b, $MlBytes)) {
                if (! $eqEqEq($a, $b)) {
                  $x = $caml_string_compare($a, $b);
                  if ($x != 0) {return $x;}
                }
              }
              else {return 1;}
            }
            else {
              if (instance_of($a, $Array) && $eqEqEq($a[0], $a[0] | 0)) {
                $ta = $a[0];
                if ($ta === 254) {$ta = 0;}
                if ($ta === 250) {
                  $a = $a[1];
                  continue;
                }
                else {
                  if (instance_of($b, $Array) && $eqEqEq($b[0], $b[0] | 0)) {
                    $tb = $b[0];
                    if ($tb === 254) {$tb = 0;}
                    if ($tb === 250) {
                      $b = $b[1];
                      continue;
                    }
                    else {
                      if (! $eqEq($ta, $tb)) {
                        return $ta < $tb ? - 1 : (1);
                      }
                      else {
                        switch($ta) {
                          // FALLTHROUGH
                          case 248:
                            {
                              $x = $caml_int_compare($a[2], $b[2]);
                              if ($x != 0) {return $x;}
                              break;
                            }
                          // FALLTHROUGH
                          case 251:
                            {
                              $caml_invalid_argument($String->new("equal: abstract value")
                              );
                            }
                          // FALLTHROUGH
                          case 255:
                            {
                              $x = $caml_int64_compare($a, $b);
                              if ($x != 0) {return $x;}
                              break;
                            }
                          // FALLTHROUGH
                          default:
                            if (! $eqEq($a->length, $b->length)) {
                              return $a->length < $b->length ? - 1 : (1);
                            }
                            if ($a->length > 1) {$stack->push($a, $b, 1);}
                          }
                      }
                    }
                  }
                  else {return 1;}
                }
              }
              else {
                if (
                  instance_of($b, $MlBytes) ||
                    instance_of($b, $Array) &&
                      $eqEqEq($b[0], $b[0] | 0)
                ) {return - 1;}
                else {
                  if (
                    !
                    $eqEq($typeof($a), $String->new("number")) && $a &&
                      $is_in("compare", $a)
                  ) {
                    $cmp = $a->compare($b, $total);
                    if ($cmp != 0) {return $cmp;}
                  }
                  else {
                    if ($eqEq($typeof($a), $String->new("function"))) {
                      $caml_invalid_argument(
                        $String->new("compare: functional value")
                      );
                    }
                    else {
                      if ($a < $b) {return - 1;}
                      if ($a > $b) {return 1;}
                      if (! $eqEq($a, $b)) {
                        if (! $total) {return $NaN;}
                        if ($eqEq($a, $a)) {return 1;}
                        if ($eqEq($b, $b)) {return - 1;}
                      }
                    }
                  }
                }
              }
            }
          }
          if ($stack->length == 0) {return 0;}
          $i = $stack->pop();
          $b = $stack->pop();
          $a = $stack->pop();
          if ($i + 1 < $a->length) {$stack->push($a, $b, $i + 1);}
          $a = $a[$i];
          $b = $b[$i];
        }
      }
    );
    $caml_equal = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) == 0);
      }
    );
    $caml_ba_num_dims = $Func(function($ba, $_dim) {return $ba->num_dims;});
    $caml_ba_get_1 = $Func(function($ba, $i0) {return $ba->get1($i0);});
    $bigstring_blit_bigstring_bytes_stub = $Func(
      function($v_bstr, $v_src_pos, $v_str, $v_dst_pos, $v_len) use ($caml_ba_get_1,$caml_bytes_set,$plus) {
        for ($i = 0;$i < $v_len;$i++) {
          $c = $caml_ba_get_1($v_bstr, $plus($v_src_pos, $i));
          $caml_bytes_set($v_str, $plus($v_dst_pos, $i), $c);
        }
        return 0;
      }
    );
    $caml_create_file = $Func(
      function($name, $content) use ($String,$caml_failwith,$resolve_fs_device) {
        $root = $resolve_fs_device($name);
        if (! $root->device->register) {
          $caml_failwith($String->new("cannot register file"));
        }
        $root->device->register($root->rest, $content);
        return 0;
      }
    );
    $caml_fs_init = $Func(
      function() use ($caml_create_file,$joo_global_object) {
        $tmp = $joo_global_object->caml_fs_tmp;
        if ($tmp) {
          for ($i = 0;$i < $tmp->length;$i++) {
            $caml_create_file($tmp[$i]->name, $tmp[$i]->content);
          }
        }
        $joo_global_object->caml_create_file = $caml_create_file;
        return 0;
      }
    );
    
    if (! $Math->imul) {
      $Math->imul =
        $Func(
          function($x, $y) use ($left_shift_32,$right_shift_32) {
            $y |= 0;
            return $left_shift_32($right_shift_32($x, 16) * $y, 16) + ($x & 65535) * $y | 0;
          }
        );
    }
    
    $caml_mul = $Math->imul;
    $caml_hash_mix_int = $Func(
      function($h, $d) use ($caml_mul,$left_shift_32,$plus,$unsigned_right_shift_32) {
        $d = $caml_mul($d, 3432918353 | 0);
        $d = $left_shift_32($d, 15) | $unsigned_right_shift_32($d, 32 - 15);
        $d = $caml_mul($d, 461845907);
        $h &= $d;
        $h = $left_shift_32($h, 13) | $unsigned_right_shift_32($h, 32 - 13);
        return $plus($h + $left_shift_32($h, 2) | 0, 3864292196 | 0) | 0;
      }
    );
    $caml_hash_mix_string_arr = $Func(
      function($h, $s) use ($caml_hash_mix_int,$left_shift_32) {
        $len = $s->length;$i = NULL;$w = NULL;
        for ($i = 0;$i + 4 <= $len;$i += 4) {
          $w =
            $s[$i] |
              $left_shift_32($s[$i + 1], 8) |
              $left_shift_32($s[$i + 2], 16) |
              $left_shift_32($s[$i + 3], 24);
          $h = $caml_hash_mix_int($h, $w);
        }
        $w = 0;
        switch($len & 3) {
          // FALLTHROUGH
          case 3:
            $w = $left_shift_32($s[$i + 2], 16);
          // FALLTHROUGH
          case 2:
            $w |= $left_shift_32($s[$i + 1], 8);
          // FALLTHROUGH
          case 1:
            $w |= $s[$i];
            $h = $caml_hash_mix_int($h, $w);
          // FALLTHROUGH
          default:
          }
        $h &= $len;
        return $h;
      }
    );
    
    
    
$caml_wrap_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};
    
    
    $caml_final_register_called_without_value = $Func(function() {return 0;});
    $caml_sys_random_seed = $Func(
      function() use ($ArrayLiteral,$Date,$Math) {
        $x = $Date->new()->getTime() ^ 4294967295 * $Math->random();
        return $ArrayLiteral(0, $x);
      }
    );
    $caml_list_of_js_array = $Func(
      function($a) use ($ArrayLiteral) {
        $l = 0;
        for ($i = $a->length - 1;$i >= 0;$i--) {
          $e = $a[$i];
          $l = $ArrayLiteral(0, $e, $l);
        }
        return $l;
      }
    );
    $caml_ba_get_2 = $Func(
      function($ba, $i0, $i1) use ($ArrayLiteral) {
        return $ba->get($ArrayLiteral($i0, $i1));
      }
    );
    $caml_set_parser_trace = $Func(function() {return 0;});
    $win_handle_fd = $Func(function($x) {return $x;});
    $unix_gettimeofday = $Func(
      function() use ($Date) {return $Date->new()->getTime() / 1e3;}
    );
    $caml_ba_uint8_set16 = $Func(
      function($ba, $i0, $v) use ($unsigned_right_shift_32) {
        $ba->set1($i0, $v & 255);
        $ba->set1($i0 + 1, $unsigned_right_shift_32($v, 8) & 255);
        return 0;
      }
    );
    
    
    
$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};
    
    
    $raw_array_append_one = $Func(
      function($a, $x) use ($Array) {
        $l = $a->length;
        $b = $Array->new($l + 1);
        $i = 0;
        for (;$i < $l;$i++) $b[$i] = $a[$i];
        $b[$i] = $x;
        return $b;
      }
    );
    
    
    
  $caml_call_gen = new Ref();
  $caml_call_gen->contents =
    function($f, $args) use ($Func,$caml_arity_test,$caml_call_gen,$raw_array_append_one,$raw_array_sub) {
      if (instance_of($f, $Func)) {
        return $caml_call_gen->contents($f->fun, $args);
      }
      $n = $caml_arity_test($f);
      $argsLen = $args->length;
      $d = $n - $argsLen;
      if ($d === 0) {
        return \call_user_func_array($f, $args->__toPhpArray());
      } else {
        if ($d < 0) {
          return $caml_call_gen->contents(
            \call_user_func_array($f, $raw_array_sub($args, 0, $n)->__toPhpArray()),
            $raw_array_sub($args, $n, $argsLen - $n)
          );
        } else {
          return function($x) use ($args,$caml_call_gen,$f,$raw_array_append_one) {
            return $caml_call_gen->contents(
              $f,
              $raw_array_append_one($args, $x)
            );
          };
        }
      }
    };
  $caml_call_gen=$caml_call_gen->contents;
    
    
    
    
$ArrayLiteral=$joo_global_object->ArrayLiteral;
    
    
    
    
  $caml_js_wrap_callback = $Func(
    function($f) use ($Array,$ArrayLiteral,$Func,$caml_call_gen) {
      print("WARNING: caml_js_wrap_callback is not yet tested");
      return $Func(
        function() use ($Array,$ArrayLiteral,$caml_call_gen,$f) {
          $arguments=\func_get_args();
          if (PHP\count($arguments) > 0) {
            return $caml_call_gen($f, $Array->new($arguments));
          } else {
            return $caml_call_gen($f, $ArrayLiteral(NULL));
          }
        }
      );
    }
  );
    
    
    
    
  $caml_js_wrap_callback_arguments = $Func(
    function($f) use ($Func, $caml_js_wrap_callback) {
      print("WARNING: caml_js_wrap_callback_arguments is not yet tested");
      return $Func(
        function() use ($caml_js_wrap_callback, $f) {
          $arguments=\func_get_args();
          return $caml_js_wrap_callback($f)($arguments);
        }
      );
    }
  );
    
    
    $caml_sys_chdir = $Func(
      function($dir) use ($String,$caml_current_dir,$caml_raise_no_such_file,$plus,$resolve_fs_device) {
        $root = $resolve_fs_device($dir);
        if ($root->device->exists($root->rest)) {
          if ($root->rest) {
            $caml_current_dir =
              $plus($plus($root->path, $root->rest), $String->new("/"));
          }
          else {$caml_current_dir = $root->path;}
          return 0;
        }
        else {$caml_raise_no_such_file($dir);}
      }
    );
    $caml_gc_counters = $Func(
      function() use ($ArrayLiteral) {return $ArrayLiteral(254, 0, 0, 0);}
    );
    $caml_js_delete = $Func(function($o, $f) {unset($o[$f]);return 0;});
    $caml_list_mount_point = $Func(
      function() use ($ArrayLiteral,$caml_new_string,$jsoo_mount_point) {
        $prev = 0;
        for ($i = 0;$i < $jsoo_mount_point->length;$i++) {
          $old = $prev;
          $prev =
            $ArrayLiteral(
              0,
              $caml_new_string($jsoo_mount_point[$i]->path),
              $old
            );
        }
        return $prev;
      }
    );
    $caml_int_of_string = $Func(
      function($s) use ($String,$caml_failwith,$caml_ml_string_length,$caml_parse_digit,$caml_parse_sign_and_base,$caml_string_unsafe_get,$eqEq,$unsigned_right_shift_32) {
        $r = $caml_parse_sign_and_base($s);
        $i = $r[0];$sign = $r[1];$base = $r[2];
        $len = $caml_ml_string_length($s);
        $threshold = $unsigned_right_shift_32(- 1, 0);
        $c = $i < $len ? $caml_string_unsafe_get($s, $i) : (0);
        $d = $caml_parse_digit($c);
        if ($d < 0 || $d >= $base) {
          $caml_failwith($String->new("int_of_string"));
        }
        $res = $d;
        for ($i++;$i < $len;$i++) {
          $c = $caml_string_unsafe_get($s, $i);
          if ($c == 95) {continue;}
          $d = $caml_parse_digit($c);
          if ($d < 0 || $d >= $base) {break;}
          $res = $base * $res + $d;
          if ($res > $threshold) {
            $caml_failwith($String->new("int_of_string"));
          }
        }
        if (! $eqEq($i, $len)) {
          $caml_failwith($String->new("int_of_string"));
        }
        $res = $sign * $res;
        if ($base == 10 && ! $eqEq($res | 0, $res)) {
          $caml_failwith($String->new("int_of_string"));
        }
        return $res | 0;
      }
    );
    $caml_marshal_constants = $ObjectLiteral(
      (object)darray[
       "PREFIX_SMALL_BLOCK"=>128,
       "PREFIX_SMALL_INT"=>64,
       "PREFIX_SMALL_STRING"=>32,
       "CODE_INT8"=>0,
       "CODE_INT16"=>1,
       "CODE_INT32"=>2,
       "CODE_INT64"=>3,
       "CODE_SHARED8"=>4,
       "CODE_SHARED16"=>5,
       "CODE_SHARED32"=>6,
       "CODE_BLOCK32"=>8,
       "CODE_BLOCK64"=>19,
       "CODE_STRING8"=>9,
       "CODE_STRING32"=>10,
       "CODE_DOUBLE_BIG"=>11,
       "CODE_DOUBLE_LITTLE"=>12,
       "CODE_DOUBLE_ARRAY8_BIG"=>13,
       "CODE_DOUBLE_ARRAY8_LITTLE"=>14,
       "CODE_DOUBLE_ARRAY32_BIG"=>15,
       "CODE_DOUBLE_ARRAY32_LITTLE"=>7,
       "CODE_CODEPOINTER"=>16,
       "CODE_INFIXPOINTER"=>17,
       "CODE_CUSTOM"=>18]
    );
    $caml_js_equals = $Func(
      function($x, $y) use ($eqEq) {return + $eqEq($x, $y);}
    );
    $caml_hash_mix_string_str = $Func(
      function($h, $s) use ($caml_hash_mix_int,$left_shift_32) {
        $len = $s->length;$i = NULL;$w = NULL;
        for ($i = 0;$i + 4 <= $len;$i += 4) {
          $w =
            $s->charCodeAt($i) |
              $left_shift_32($s->charCodeAt($i + 1), 8) |
              $left_shift_32($s->charCodeAt($i + 2), 16) |
              $left_shift_32($s->charCodeAt($i + 3), 24);
          $h = $caml_hash_mix_int($h, $w);
        }
        $w = 0;
        switch($len & 3) {
          // FALLTHROUGH
          case 3:
            $w = $left_shift_32($s->charCodeAt($i + 2), 16);
          // FALLTHROUGH
          case 2:
            $w |= $left_shift_32($s->charCodeAt($i + 1), 8);
          // FALLTHROUGH
          case 1:
            $w |= $s->charCodeAt($i);
            $h = $caml_hash_mix_int($h, $w);
          // FALLTHROUGH
          default:
          }
        $h &= $len;
        return $h;
      }
    );
    $caml_greaterthan = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) > 0);
      }
    );
    $caml_ba_blit = $Func(function($src, $dst) {$dst->blit($src);return 0;});
    $caml_input_value_from_reader = $Func(
      function($reader, $ofs) use ($Array,$ArrayLiteral,$Func,$String,$caml_failwith,$caml_float_of_bytes,$caml_int64_of_bytes,$eqEq,$plus,$right_shift_32,$typeof) {
        $_magic = $reader->read32u();
        $_block_len = $reader->read32u();
        $num_objects = $reader->read32u();
        $_size_32 = $reader->read32u();
        $_size_64 = $reader->read32u();
        $stack = $ArrayLiteral();
        $intern_obj_table = $num_objects > 0 ? $ArrayLiteral() : (varray[]);
        $obj_counter = 0;
        $intern_rec = $Func(
          function() use ($Array,$ArrayLiteral,$String,$caml_failwith,$caml_float_of_bytes,$caml_int64_of_bytes,$intern_obj_table,$obj_counter,$plus,$reader,$right_shift_32,$stack) {
            $code = $reader->read8u();
            if ($code >= 64) {
              if ($code >= 128) {
                $tag = $code & 15;
                $size = $right_shift_32($code, 4) & 7;
                $v = $ArrayLiteral($tag);
                if ($size == 0) {return $v;}
                if ($intern_obj_table) {
                  $intern_obj_table[$obj_counter++] = $v;
                }
                $stack->push($v, $size);
                return $v;
              }
              else {return $code & 63;}
            }
            else {
              if ($code >= 32) {
                $len = $code & 31;
                $v = $reader->readstr($len);
                if ($intern_obj_table) {
                  $intern_obj_table[$obj_counter++] = $v;
                }
                return $v;
              }
              else {
                switch($code) {
                  // FALLTHROUGH
                  case 0:
                    return $reader->read8s();
                  // FALLTHROUGH
                  case 1:
                    return $reader->read16s();
                  // FALLTHROUGH
                  case 2:
                    return $reader->read32s();
                  // FALLTHROUGH
                  case 3:
                    $caml_failwith(
                      $String->new("input_value: integer too large")
                    );
                    break;
                  // FALLTHROUGH
                  case 4:
                    $offset = $reader->read8u();
                    return $intern_obj_table[$obj_counter - $offset];
                  // FALLTHROUGH
                  case 5:
                    $offset = $reader->read16u();
                    return $intern_obj_table[$obj_counter - $offset];
                  // FALLTHROUGH
                  case 6:
                    $offset = $reader->read32u();
                    return $intern_obj_table[$obj_counter - $offset];
                  // FALLTHROUGH
                  case 8:
                    $header = $reader->read32u();
                    $tag = $header & 255;
                    $size = $right_shift_32($header, 10);
                    $v = $ArrayLiteral($tag);
                    if ($size == 0) {return $v;}
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    $stack->push($v, $size);
                    return $v;
                  // FALLTHROUGH
                  case 19:
                    $caml_failwith(
                      $String->new("input_value: data block too large")
                    );
                    break;
                  // FALLTHROUGH
                  case 9:
                    $len = $reader->read8u();
                    $v = $reader->readstr($len);
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    return $v;
                  // FALLTHROUGH
                  case 10:
                    $len = $reader->read32u();
                    $v = $reader->readstr($len);
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    return $v;
                  // FALLTHROUGH
                  case 12:
                    $t = $Array->new(8);
                    ;
                    for ($i = 0;$i < 8;$i++) $t[7 - $i] = $reader->read8u();
                    $v = $caml_float_of_bytes($t);
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    return $v;
                  // FALLTHROUGH
                  case 11:
                    $t = $Array->new(8);
                    ;
                    for ($i = 0;$i < 8;$i++) $t[$i] = $reader->read8u();
                    $v = $caml_float_of_bytes($t);
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    return $v;
                  // FALLTHROUGH
                  case 14:
                    $len = $reader->read8u();
                    $v = $Array->new($len + 1);
                    $v[0] = 254;
                    $t = $Array->new(8);
                    ;
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    for ($i = 1;$i <= $len;$i++) {
                      for ($j = 0;$j < 8;$j++) $t[7 - $j] = $reader->read8u();
                      $v[$i] = $caml_float_of_bytes($t);
                    }
                    return $v;
                  // FALLTHROUGH
                  case 13:
                    $len = $reader->read8u();
                    $v = $Array->new($len + 1);
                    $v[0] = 254;
                    $t = $Array->new(8);
                    ;
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    for ($i = 1;$i <= $len;$i++) {
                      for ($j = 0;$j < 8;$j++) $t[$j] = $reader->read8u();
                      $v[$i] = $caml_float_of_bytes($t);
                    }
                    return $v;
                  // FALLTHROUGH
                  case 7:
                    $len = $reader->read32u();
                    $v = $Array->new($len + 1);
                    $v[0] = 254;
                    if ($intern_obj_table) {
                      $intern_obj_table[$obj_counter++] = $v;
                    }
                    $t = $Array->new(8);
                    ;
                    for ($i = 1;$i <= $len;$i++) {
                      for ($j = 0;$j < 8;$j++) $t[7 - $j] = $reader->read8u();
                      $v[$i] = $caml_float_of_bytes($t);
                    }
                    return $v;
                  // FALLTHROUGH
                  case 15:
                    $len = $reader->read32u();
                    $v = $Array->new($len + 1);
                    $v[0] = 254;
                    $t = $Array->new(8);
                    ;
                    for ($i = 1;$i <= $len;$i++) {
                      for ($j = 0;$j < 8;$j++) $t[$j] = $reader->read8u();
                      $v[$i] = $caml_float_of_bytes($t);
                    }
                    return $v;
                  // FALLTHROUGH
                  case 16:
                  // FALLTHROUGH
                  case 17:
                    $caml_failwith($String->new("input_value: code pointer"));
                    break;
                  // FALLTHROUGH
                  case 18:
                    $c = NULL;$s = $String->new("");
                    while(($c = $reader->read8u()) != 0) $s =
                       $plus($s, $String->fromCharCode($c));
                    switch($s) {
                      // FALLTHROUGH
                      case $String->new("_j"):
                        $t = $Array->new(8);
                        ;
                        for ($j = 0;$j < 8;$j++) $t[$j] = $reader->read8u();
                        $v = $caml_int64_of_bytes($t);
                        if ($intern_obj_table) {
                          $intern_obj_table[$obj_counter++] = $v;
                        }
                        return $v;
                      // FALLTHROUGH
                      case $String->new("_i"):
                        $v = $reader->read32s();
                        if ($intern_obj_table) {
                          $intern_obj_table[$obj_counter++] = $v;
                        }
                        return $v;
                      // FALLTHROUGH
                      case $String->new("_n"):
                        switch($reader->read8u()) {
                          // FALLTHROUGH
                          case 1:
                            $v = $reader->read32s();
                            if ($intern_obj_table) {
                              $intern_obj_table[$obj_counter++] = $v;
                            }
                            return $v;
                          // FALLTHROUGH
                          case 2:
                            $caml_failwith(
                              $String->new("input_value: native integer value too large")
                            );
                          // FALLTHROUGH
                          default:
                            $caml_failwith(
                              $String->new("input_value: ill-formed native integer")
                            );
                          }
                      // FALLTHROUGH
                      default:
                        $caml_failwith(
                          $String->new("input_value: unknown custom block identifier")
                        );
                      }
                  // FALLTHROUGH
                  default:
                    $caml_failwith(
                      $String->new("input_value: ill-formed message")
                    );
                  }
              }
            }
          }
        );
        $res = $intern_rec();
        while($stack->length > 0) {
           $size = $stack->pop();
           $v = $stack->pop();
           $d = $v->length;
           if ($d < $size) {$stack->push($v, $size);}
           $v[$d] = $intern_rec();
         }
        if (! $eqEq($typeof($ofs), $String->new("number"))) {$ofs[0] = $reader->i;}
        return $res;
      }
    );
    $caml_js_from_array = $Func(
      function($a) use ($raw_array_sub) {
        return $raw_array_sub($a, 1, $a->length - 1);
      }
    );
    $caml_ba_slice = $Func(
      function($ba, $vind) use ($caml_js_from_array) {
        return $ba->slice($caml_js_from_array($vind));
      }
    );
    $caml_raise_zero_divide = $Func(
      function() use ($caml_global_data,$caml_raise_constant) {
        $caml_raise_constant($caml_global_data->Division_by_zero);
      }
    );
    $caml_int64_div = $Func(
      function($x, $y) use ($caml_int64_is_zero,$caml_int64_neg,$caml_int64_udivmod,$caml_raise_zero_divide) {
        if ($caml_int64_is_zero($y)) {$caml_raise_zero_divide();}
        $sign = $x[3] ^ $y[3];
        if ($x[3] & 32768) {$x = $caml_int64_neg($x);}
        if ($y[3] & 32768) {$y = $caml_int64_neg($y);}
        $q = $caml_int64_udivmod($x, $y)[1];
        if ($sign & 32768) {$q = $caml_int64_neg($q);}
        return $q;
      }
    );
    $bigstring_find = $Func(
      function($bs, $chr, $pos, $len) use ($caml_ba_get_1,$eqEq) {
        while($len > 0) {
           if ($eqEq($caml_ba_get_1($bs, $pos), $chr)) {return $pos;}
           $pos++;
           $len--;
         }
        return - 1;
      }
    );
    
    
    
    $caml_js_html_entities = function() {
      throw new \Exception(
        'caml_js_html_entities is not supported in PHP backend'
      );
    };
    
    
    $caml_js_property_set = $Func(
      function($o, $f, $v) use ($String,$js_print_stderr) {
        $js_print_stderr(
          $String->new(
            "caml_js_property_set: This should never happen - all accesses should have been optimized by now."
          )
        );
        $o[$f] = $v;
        return 0;
      }
    );
    $caml_int64_of_float = $Func(
      function($x) use ($ArrayLiteral,$Math,$caml_int64_offset) {
        if ($x < 0) {$x = $Math->ceil($x);}
        return $ArrayLiteral(
          255,
          $x & 16777215,
          $Math->floor($x * $caml_int64_offset) & 16777215,
          $Math->floor($x * $caml_int64_offset * $caml_int64_offset) & 65535
        );
      }
    );
    $caml_ml_channel_size_64 = $Func(
      function($chanid) use ($caml_int64_of_float,$caml_ml_channels) {
        $chan = $caml_ml_channels[$chanid];
        return $caml_int64_of_float($chan->file->length());
      }
    );
    $caml_ba_set_2 = $Func(
      function($ba, $i0, $i1, $v) use ($ArrayLiteral) {
        return $ba->set($ArrayLiteral($i0, $i1), $v);
      }
    );
    $caml_string_unsafe_set = $Func(
      function($s, $i, $c) use ($caml_bytes_unsafe_set) {
        return $caml_bytes_unsafe_set($s, $i, $c);
      }
    );
    $caml_CamlinternalMod_init_mod = $Func(
      function($loc, $shape) use ($ArrayLiteral,$Func,$ObjectLiteral,$String,$caml_global_data,$caml_raise_with_arg,$eqEqEq,$typeof) {
        $loop = new Ref();
        $undef_module = $Func(
          function($_x) use ($caml_global_data,$caml_raise_with_arg,$loc) {
            $caml_raise_with_arg(
              $caml_global_data->Undefined_recursive_module,
              $loc
            );
          }
        );
        $_ = $loop->contents =
          $Func(
            function($shape, $struct, $idx) use ($ArrayLiteral,$ObjectLiteral,$String,$eqEqEq,$loop,$typeof,$undef_module) {
              if ($eqEqEq($typeof($shape), $String->new("number"))) {
                switch($shape) {
                  // FALLTHROUGH
                  case 0:
                    $struct[$idx] =
                      $ObjectLiteral((object)darray["fun"=>$undef_module]);
                    break;
                  // FALLTHROUGH
                  case 1:
                    $struct[$idx] = $ArrayLiteral(246, $undef_module);
                    break;
                  // FALLTHROUGH
                  default:
                    $struct[$idx] = $ArrayLiteral();
                  }
              }
              else {
                switch($shape[0]) {
                  // FALLTHROUGH
                  case 0:
                    $struct[$idx] = $ArrayLiteral(0);
                    for ($i = 1;$i < $shape[1]->length;$i++) $loop->contents(
                      $shape[1][$i],
                      $struct[$idx],
                      $i
                    );
                    break;
                  // FALLTHROUGH
                  default:
                    $struct[$idx] = $shape[1];
                  }
              }
            }
          );
        $res = $ArrayLiteral();
        $loop->contents($shape, $res, 0);
        return $res[0];
      }
    );
    $caml_js_eval_string = $Func(
      function($s) use ($eval) {return $eval($s->toString());}
    );
    $caml_bytes_compare = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c < $s2->c ? - 1 : ($s1->c > $s2->c ? 1 : (0));
      }
    );
    $caml_marshal_data_size = $Func(
      function($s, $ofs) use ($Func,$String,$caml_bytes_unsafe_get,$caml_failwith,$eqEq,$left_shift_32) {
        $get32 = $Func(
          function($s, $i) use ($caml_bytes_unsafe_get,$left_shift_32) {
            return $left_shift_32($caml_bytes_unsafe_get($s, $i), 24) |
              $left_shift_32($caml_bytes_unsafe_get($s, $i + 1), 16) |
              $left_shift_32($caml_bytes_unsafe_get($s, $i + 2), 8) | $caml_bytes_unsafe_get($s, $i + 3);
          }
        );
        if (! $eqEq($get32($s, $ofs), 2224400062 | 0)) {
          $caml_failwith($String->new("Marshal.data_size: bad object"));
        }
        return $get32($s, $ofs + 4);
      }
    );
    $MlBytesReader = $Func(
      function($s, $i) use ($caml_jsbytes_of_string,$joo_global_object) {
        $joo_global_object->context->s = $caml_jsbytes_of_string($s);
        $joo_global_object->context->i = $i;
      }
    );
    
    $MlBytesReader->prototype =
      $ObjectLiteral(
        (object)darray[
         "read8u"=>
         $Func(
           function() use ($joo_global_object) {
             return $joo_global_object->context->s->charCodeAt(
               $joo_global_object->context->i++
             );
           }
         ),
         "read8s"=>
         $Func(
           function() use ($joo_global_object,$left_shift_32,$right_shift_32) {
             return $right_shift_32(
               $left_shift_32(
                 $joo_global_object->context->s->charCodeAt(
                   $joo_global_object->context->i++
                 ),
                 24
               ),
               24
             );
           }
         ),
         "read16u"=>
         $Func(
           function() use ($joo_global_object,$left_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 2;
             return $left_shift_32($s->charCodeAt($i), 8) | $s->charCodeAt($i + 1);
           }
         ),
         "read16s"=>
         $Func(
           function() use ($joo_global_object,$left_shift_32,$right_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 2;
             return $right_shift_32($left_shift_32($s->charCodeAt($i), 24), 16
             ) | $s->charCodeAt($i + 1);
           }
         ),
         "read32u"=>
         $Func(
           function() use ($joo_global_object,$left_shift_32,$unsigned_right_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 4;
             return $unsigned_right_shift_32(
               $left_shift_32($s->charCodeAt($i), 24) |
                 $left_shift_32($s->charCodeAt($i + 1), 16) |
                 $left_shift_32($s->charCodeAt($i + 2), 8) | $s->charCodeAt($i + 3),
               0
             );
           }
         ),
         "read32s"=>
         $Func(
           function() use ($joo_global_object,$left_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 4;
             return $left_shift_32($s->charCodeAt($i), 24) |
               $left_shift_32($s->charCodeAt($i + 1), 16) |
               $left_shift_32($s->charCodeAt($i + 2), 8) | $s->charCodeAt($i + 3);
           }
         ),
         "readstr"=>
         $Func(
           function($len) use ($caml_new_string,$joo_global_object,$plus) {
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $plus($i, $len);
             return $caml_new_string(
               $joo_global_object->context->s->substring($i, $plus($i, $len))
             );
           }
         )]
      );
    
    $caml_input_value_from_string = $Func(
      function($s, $ofs) use ($MlBytesReader,$String,$caml_input_value_from_reader,$eqEq,$typeof) {
        $reader = $MlBytesReader->new(
          $s,
          $eqEq($typeof($ofs), $String->new("number")) ? $ofs : ($ofs[0])
        );
        return $caml_input_value_from_reader($reader, $ofs);
      }
    );
    $caml_input_value = $Func(
      function($chanid) use ($ArrayLiteral,$caml_create_bytes,$caml_input_value_from_string,$caml_marshal_data_size,$caml_ml_channels,$plus) {
        $chan = $caml_ml_channels[$chanid];
        $buf = $caml_create_bytes(8);
        $chan->file->read($chan->offset, $buf, 0, 8);
        $len = $caml_marshal_data_size($buf, 0) + 20;
        $buf = $caml_create_bytes($len);
        $chan->file->read($chan->offset, $buf, 0, $len);
        $offset = $ArrayLiteral(0);
        $res = $caml_input_value_from_string($buf, $offset);
        $chan->offset = $plus($chan->offset, $offset[0]);
        return $res;
      }
    );
    $caml_ba_kind = $Func(function($ba) {return $ba->kind;});
    $caml_js_fun_call = $Func(
      function($f, $a) use ($caml_js_from_array) {
        switch($a->length) {
          // FALLTHROUGH
          case 1:
            return $f();
          // FALLTHROUGH
          case 2:
            return $f($a[1]);
          // FALLTHROUGH
          case 3:
            return $f($a[1], $a[2]);
          // FALLTHROUGH
          case 4:
            return $f($a[1], $a[2], $a[3]);
          // FALLTHROUGH
          case 5:
            return $f($a[1], $a[2], $a[3], $a[4]);
          // FALLTHROUGH
          case 6:
            return $f($a[1], $a[2], $a[3], $a[4], $a[5]);
          // FALLTHROUGH
          case 7:
            return $f($a[1], $a[2], $a[3], $a[4], $a[5], $a[6]);
          // FALLTHROUGH
          case 8:
            return $f($a[1], $a[2], $a[3], $a[4], $a[5], $a[6], $a[7]);
          }
        return $f->apply(varray[], $caml_js_from_array($a));
      }
    );
    $caml_js_pure_expr = $Func(function($f) {return $f();});
    $caml_sys_exit = $Func(
      function($code) use ($String,$caml_invalid_argument,$joo_global_object) {
        $g = $joo_global_object;
        if ($g->quit) {$g->quit($code);}
        if ($g->process && $g->process->exit) {$g->process->exit($code);}
        $caml_invalid_argument($String->new("Function 'exit' not implemented")
        );
      }
    );
    $caml_ml_input = $Func(
      function($chanid, $s, $i, $l) use ($caml_ml_channels,$caml_ml_refill_input,$plus) {
        $chan = $caml_ml_channels[$chanid];
        $l2 = $chan->file->length() - $chan->offset;
        if ($l2 == 0 && $chan->refill != varray[]) {$l2 = $caml_ml_refill_input($chan);}
        if ($l2 < $l) {$l = $l2;}
        $chan->file->read($chan->offset, $s, $i, $l);
        $chan->offset = $plus($chan->offset, $l);
        return $l;
      }
    );
    $caml_ba_reshape = $Func(
      function($ba, $vind) use ($caml_js_from_array) {
        return $ba->reshape($caml_js_from_array($vind));
      }
    );
    $log2_ok = $Math->log2 && $Math->log2(1.12355820928894744e+307) == 1020;
    $jsoo_floor_log2 = $Func(
      function($x) use ($Infinity,$Math,$log2_ok) {
        if ($log2_ok) {return $Math->floor($Math->log2($x));}
        $i = 0;
        if ($x == 0) {return - $Infinity;}
        if ($x >= 1) {
          while($x >= 2) {$x /= 2;$i++;}
        }
        else {while($x < 1) {$x *= 2;$i--;}}
        ;
        return $i;
      }
    );
    $caml_int32_bits_of_float = $Func(
      function($x) use ($joo_global_object) {
        $float32a = $joo_global_object->Float32Array->new(1);
        $float32a[0] = $x;
        $int32a = $joo_global_object->Int32Array->new($float32a->buffer);
        return $int32a[0] | 0;
      }
    );
    $caml_hash_mix_bigstring = $Func(
      function($h, $bs) use ($caml_hash_mix_string_arr) {
        return $caml_hash_mix_string_arr($h, $bs->data);
      }
    );
    $caml_set_oo_id = $Func(
      function($b) use ($caml_oo_last_id) {
        $b[2] = $caml_oo_last_id++;
        return $b;
      }
    );
    $caml_record_backtrace = $Func(function() {return 0;});
    
    
    
$polymorphic_log=$joo_global_object->polymorphic_log;
    
    
    $caml_get_global_data = $Func(
      function() use ($caml_global_data) {return $caml_global_data;}
    );
    $unix_gmtime = $Func(
      function($t) use ($ArrayLiteral,$Date,$Math) {
        $d = $Date->new($t * 1e3);
        $januaryfirst = $Date->new($Date->UTC($d->getUTCFullYear(), 0, 1));
        $doy = $Math->floor(($d->getTime() - $januaryfirst->getTime()) / 864e5
        );
        return $ArrayLiteral(
          0,
          $d->getUTCSeconds(),
          $d->getUTCMinutes(),
          $d->getUTCHours(),
          $d->getUTCDate(),
          $d->getUTCMonth(),
          $d->getUTCFullYear() - 1900,
          $d->getUTCDay(),
          $doy,
          false | 0
        );
      }
    );
    $caml_ba_uint8_get16 = $Func(
      function($ba, $i0) use ($left_shift_32) {
        $b1 = $ba->get1($i0);
        $b2 = $left_shift_32($ba->get1($i0 + 1), 8);
        return $b1 | $b2;
      }
    );
    $caml_int64_shift_right_unsigned = $Func(
      function($x, $s) use ($ArrayLiteral,$left_shift_32,$right_shift_32) {
        $s = $s & 63;
        if ($s == 0) {return $x;}
        if ($s < 24) {
          return $ArrayLiteral(
            255,
            ($right_shift_32($x[1], $s) | $left_shift_32($x[2], 24 - $s)) & 16777215,
            ($right_shift_32($x[2], $s) | $left_shift_32($x[3], 24 - $s)) & 16777215,
            $right_shift_32($x[3], $s)
          );
        }
        if ($s < 48) {
          return $ArrayLiteral(
            255,
            ($right_shift_32($x[2], $s - 24) | $left_shift_32($x[3], 48 - $s)) & 16777215,
            $right_shift_32($x[3], $s - 24),
            0
          );
        }
        return $ArrayLiteral(255, $right_shift_32($x[3], $s - 48), 0, 0);
      }
    );
    $caml_sys_const_backend_type = $Func(
      function() use ($ArrayLiteral,$String,$caml_new_string) {
        return $ArrayLiteral(0, $caml_new_string($String->new("js_of_ocaml")));
      }
    );
    $caml_sys_get_config = $Func(
      function() use ($ArrayLiteral,$String,$caml_new_string) {
        return $ArrayLiteral(0, $caml_new_string($String->new("Unix")), 32, 0);
      }
    );
    $caml_compare = $Func(
      function($a, $b) use ($caml_compare_val) {
        return $caml_compare_val($a, $b, true);
      }
    );
    $unix_time = $Func(
      function() use ($Math,$unix_gettimeofday) {
        return $Math->floor($unix_gettimeofday());
      }
    );
    $caml_ml_out_channels_list = $Func(
      function() use ($ArrayLiteral,$caml_ml_channels) {
        $l = 0;
        for ($c = 0;$c < $caml_ml_channels->length;$c++) {
          if (
            $caml_ml_channels[$c] &&
              $caml_ml_channels[$c]->opened &&
              $caml_ml_channels[$c]->out
          ) {$l = $ArrayLiteral(0, $caml_ml_channels[$c]->fd, $l);}
        }
        return $l;
      }
    );
    $bigstring_blit_bigstring_string_stub = $bigstring_blit_bigstring_bytes_stub;
    $caml_js_dict_set = $Func(
      function($o, $f, $v) use ($String,$js_print_stderr) {
        $js_print_stderr(
          $String->new(
            "caml_js_dict_set: This should never happen - all accesses should have been optimized by now."
          )
        );
        $o[$f] = $v;
        return 0;
      }
    );
    $caml_fresh_oo_id = $Func(
      function() use ($caml_oo_last_id) {return $caml_oo_last_id++;}
    );
    $caml_int64_to_float = $Func(
      function($x) use ($Math,$left_shift_32,$plus) {
        return $plus(
          $left_shift_32($x[3], 16) * $Math->pow(2, 32) +
            $x[2] *
              $Math->pow(2, 24),
          $x[1]
        );
      }
    );
    $caml_ba_get_size = $Func(
      function($dims) use ($String,$caml_invalid_argument) {
        $n_dims = $dims->length;
        $size = 1;
        for ($i = 0;$i < $n_dims;$i++) {
          if ($dims[$i] < 0) {
            $caml_invalid_argument(
              $String->new("Bigarray.create: negative dimension")
            );
          }
          $size = $size * $dims[$i];
        }
        return $size;
      }
    );
    $_ = $caml_ba_create_from->contents =
      $Func(
        function($data, $data2, $data_type, $kind, $layout, $dims) use ($ArrayLiteral,$Func,$NaN,$ObjectLiteral,$String,$caml_array_bound_error,$caml_ba_create_from,$caml_ba_get_size,$caml_invalid_argument,$eqEq,$left_shift_32,$plus,$unsigned_right_shift_32) {
          $n_dims = $dims->length;
          $size = $caml_ba_get_size($dims);
          $offset_c = $Func(
            function($index) use ($String,$caml_array_bound_error,$caml_invalid_argument,$dims,$eqEq,$n_dims) {
              $ofs = 0;
              if (! $eqEq($n_dims, $index->length)) {
                $caml_invalid_argument(
                  $String->new("Bigarray.get/set: bad number of dimensions")
                );
              }
              for ($i = 0;$i < $n_dims;$i++) {
                if ($index[$i] < 0 || $index[$i] >= $dims[$i]) {$caml_array_bound_error();}
                $ofs = $ofs * $dims[$i] + $index[$i];
              }
              return $ofs;
            }
          );
          $offset_fortran = $Func(
            function($index) use ($String,$caml_array_bound_error,$caml_invalid_argument,$dims,$eqEq,$n_dims) {
              $ofs = 0;
              if (! $eqEq($n_dims, $index->length)) {
                $caml_invalid_argument(
                  $String->new("Bigarray.get/set: wrong number of indices")
                );
              }
              for ($i = $n_dims - 1;$i >= 0;$i--) {
                if ($index[$i] < 1 || $index[$i] > $dims[$i]) {$caml_array_bound_error();}
                $ofs = $ofs * $dims[$i] + ($index[$i] - 1);
              }
              return $ofs;
            }
          );
          $offset = $layout == 0 ? $offset_c : ($offset_fortran);
          $dim0 = $dims[0];
          $get_std = $Func(
            function($index) use ($data,$offset) {
              $ofs = $offset($index);
              $v = $data[$ofs];
              return $v;
            }
          );
          $get_int64 = $Func(
            function($index) use ($ArrayLiteral,$data,$data2,$left_shift_32,$offset,$unsigned_right_shift_32) {
              $off = $offset($index);
              $l = $data[$off];
              $h = $data2[$off];
              return $ArrayLiteral(
                255,
                $l & 16777215,
                $unsigned_right_shift_32($l, 24) & 255 |
                  $left_shift_32($h & 65535, 8),
                $unsigned_right_shift_32($h, 16) & 65535
              );
            }
          );
          $get_complex = $Func(
            function($index) use ($ArrayLiteral,$data,$data2,$offset) {
              $off = $offset($index);
              $r = $data[$off];
              $i = $data2[$off];
              return $ArrayLiteral(254, $r, $i);
            }
          );
          $get = $data_type == 1
            ? $get_int64
            : ($data_type == 2 ? $get_complex : ($get_std));
          $get1_c = $Func(
            function($i) use ($caml_array_bound_error,$data,$dim0) {
              if ($i < 0 || $i >= $dim0) {$caml_array_bound_error();}
              return $data[$i];
            }
          );
          $get1_fortran = $Func(
            function($i) use ($caml_array_bound_error,$data,$dim0) {
              if ($i < 1 || $i > $dim0) {$caml_array_bound_error();}
              return $data[$i - 1];
            }
          );
          $get1_any = $Func(
            function($i) use ($ArrayLiteral,$get) {
              return $get($ArrayLiteral($i));
            }
          );
          $get1 = $data_type == 0
            ? $layout == 0 ? $get1_c : ($get1_fortran)
            : ($get1_any);
          $set_std_raw = $Func(
            function($off, $v) use ($data) {$data[$off] = $v;}
          );
          $set_int64_raw = $Func(
            function($off, $v) use ($data,$data2,$left_shift_32,$unsigned_right_shift_32) {
              $data[$off] = $v[1] | $left_shift_32($v[2] & 255, 24);
              $data2[$off] =
                $unsigned_right_shift_32($v[2], 8) & 65535 |
                  $left_shift_32($v[3], 16);
            }
          );
          $set_complex_raw = $Func(
            function($off, $v) use ($data,$data2) {
              $data[$off] = $v[1];
              $data2[$off] = $v[2];
            }
          );
          $set_std = $Func(
            function($index, $v) use ($offset,$set_std_raw) {
              $ofs = $offset($index);
              return $set_std_raw($ofs, $v);
            }
          );
          $set_int64 = $Func(
            function($index, $v) use ($offset,$set_int64_raw) {
              return $set_int64_raw($offset($index), $v);
            }
          );
          $set_complex = $Func(
            function($index, $v) use ($offset,$set_complex_raw) {
              return $set_complex_raw($offset($index), $v);
            }
          );
          $set = $data_type == 1
            ? $set_int64
            : ($data_type == 2 ? $set_complex : ($set_std));
          $set1_c = $Func(
            function($i, $v) use ($caml_array_bound_error,$data,$dim0) {
              if ($i < 0 || $i >= $dim0) {$caml_array_bound_error();}
              $data[$i] = $v;
            }
          );
          $set1_fortran = $Func(
            function($i, $v) use ($caml_array_bound_error,$data,$dim0) {
              if ($i < 1 || $i > $dim0) {$caml_array_bound_error();}
              $data[$i - 1] = $v;
            }
          );
          $set1_any = $Func(
            function($i, $v) use ($ArrayLiteral,$set) {
              $set($ArrayLiteral($i), $v);
            }
          );
          $set1 = $data_type == 0
            ? $layout == 0 ? $set1_c : ($set1_fortran)
            : ($set1_any);
          $nth_dim = $Func(
            function($i) use ($String,$caml_invalid_argument,$dims,$n_dims) {
              if ($i < 0 || $i >= $n_dims) {
                $caml_invalid_argument($String->new("Bigarray.dim"));
              }
              return $dims[$i];
            }
          );
          $fill = $Func(
            function($v) use ($data,$data_type,$set_complex_raw,$set_int64_raw,$set_std_raw) {
              if ($data_type == 0) {
                for ($i = 0;$i < $data->length;$i++) $set_std_raw($i, $v);
              }
              if ($data_type == 1) {
                for ($i = 0;$i < $data->length;$i++) $set_int64_raw($i, $v);
              }
              if ($data_type == 2) {
                for ($i = 0;$i < $data->length;$i++) $set_complex_raw($i, $v);
              }
            }
          );
          $blit = $Func(
            function($from) use ($String,$caml_invalid_argument,$data,$data2,$data_type,$dims,$eqEq,$n_dims) {
              if (! $eqEq($n_dims, $from->num_dims)) {
                $caml_invalid_argument(
                  $String->new("Bigarray.blit: dimension mismatch")
                );
              }
              for ($i = 0;$i < $n_dims;$i++) if (
                !
                $eqEq($dims[$i], $from->nth_dim($i))
              ) {
                $caml_invalid_argument(
                  $String->new("Bigarray.blit: dimension mismatch")
                );
              }
              $data->set($from->data);
              if ($data_type != 0) {$data2->set($from->data2);}
            }
          );
          $sub = $Func(
            function($ofs, $len) use ($ArrayLiteral,$String,$caml_ba_create_from,$caml_invalid_argument,$data,$data2,$data_type,$dims,$kind,$layout,$n_dims,$plus) {
              $changed_dim = NULL;
              $mul = 1;
              if ($layout == 0) {
                for ($i = 1;$i < $n_dims;$i++) $mul = $mul * $dims[$i];
                $changed_dim = 0;
              }
              else {
                for ($i = 0;$i < $n_dims - 1;$i++) $mul = $mul * $dims[$i];
                $changed_dim = $n_dims - 1;
                $ofs = $ofs - 1;
              }
              if (
                $ofs < 0 ||
                  $len < 0 ||
                  $plus($ofs, $len) >
                    $dims[$changed_dim]
              ) {
                $caml_invalid_argument(
                  $String->new("Bigarray.sub: bad sub-array")
                );
              }
              $new_data = $data->subarray(
                $ofs * $mul,
                $plus($ofs, $len) * $mul
              );
              $new_data2 = $data_type == 0
                ? varray[]
                : ($data2->subarray($ofs * $mul, $plus($ofs, $len) * $mul));
              $new_dims = $ArrayLiteral();
              for ($i = 0;$i < $n_dims;$i++) $new_dims[$i] = $dims[$i];
              $new_dims[$changed_dim] = $len;
              return $caml_ba_create_from->contents(
                $new_data,
                $new_data2,
                $data_type,
                $kind,
                $layout,
                $new_dims
              );
            }
          );
          $slice = $Func(
            function($vind) use ($ArrayLiteral,$String,$caml_ba_create_from,$caml_ba_get_size,$caml_invalid_argument,$data,$data2,$data_type,$dims,$kind,$layout,$n_dims,$offset,$plus) {
              $num_inds = $vind->length;
              $index = $ArrayLiteral();
              $sub_dims = $ArrayLiteral();
              $ofs = NULL;
              if ($num_inds >= $n_dims) {
                $caml_invalid_argument(
                  $String->new("Bigarray.slice: too many indices")
                );
              }
              if ($layout == 0) {
                for ($i = 0;$i < $num_inds;$i++) $index[$i] = $vind[$i];
                for (;$i < $n_dims;$i++) $index[$i] = 0;
                $ofs = $offset($index);
                $sub_dims = $dims->slice($num_inds);
              }
              else {
                for ($i = 0;$i < $num_inds;$i++) $index[$n_dims - $num_inds + $i
                 ] = $vind[$i];
                for ($i = 0;$i < $n_dims - $num_inds;$i++) $index[$i] = 1;
                $ofs = $offset($index);
                $sub_dims = $dims->slice(0, $num_inds);
              }
              $size = $caml_ba_get_size($sub_dims);
              $new_data = $data->subarray($ofs, $plus($ofs, $size));
              $new_data2 = $data_type == 0
                ? varray[]
                : ($data2->subarray($ofs, $plus($ofs, $size)));
              return $caml_ba_create_from->contents(
                $new_data,
                $new_data2,
                $data_type,
                $kind,
                $layout,
                $sub_dims
              );
            }
          );
          $reshape = $Func(
            function($vdim) use ($ArrayLiteral,$String,$caml_ba_create_from,$caml_invalid_argument,$data,$data2,$data_type,$eqEq,$kind,$layout,$size) {
              $new_dim = $ArrayLiteral();
              $num_dims = $vdim->length;
              if ($num_dims < 1) {
                $caml_invalid_argument(
                  $String->new("Bigarray.reshape: bad number of dimensions")
                );
              }
              $num_elts = 1;
              for ($i = 0;$i < $num_dims;$i++) {
                $new_dim[$i] = $vdim[$i];
                if ($new_dim[$i] < 0) {
                  $caml_invalid_argument(
                    $String->new("Bigarray.reshape: negative dimension")
                  );
                }
                $num_elts = $num_elts * $new_dim[$i];
              }
              if (! $eqEq($num_elts, $size)) {
                $caml_invalid_argument(
                  $String->new("Bigarray.reshape: size mismatch")
                );
              }
              return $caml_ba_create_from->contents(
                $data,
                $data2,
                $data_type,
                $kind,
                $layout,
                $new_dim
              );
            }
          );
          $compare = $Func(
            function($b, $total) use ($NaN,$data,$data2,$eqEq,$kind,$layout,$n_dims,$nth_dim) {
              if (! $eqEq($layout, $b->layout)) {return $b->layout - $layout;}
              if (! $eqEq($n_dims, $b->num_dims)) {return $b->num_dims - $n_dims;}
              for ($i = 0;$i < $n_dims;$i++) if (
                !
                $eqEq($nth_dim($i), $b->nth_dim($i))
              ) {return $nth_dim($i) < $b->nth_dim($i) ? - 1 : (1);}
              switch($kind) {
                // FALLTHROUGH
                case 0:
                // FALLTHROUGH
                case 1:
                // FALLTHROUGH
                case 10:
                // FALLTHROUGH
                case 11:
                  $x = NULL;$y = NULL;
                  for ($i = 0;$i < $data->length;$i++) {
                    $x = $data[$i];
                    $y = $b->data[$i];
                    if ($x < $y) {return - 1;}
                    if ($x > $y) {return 1;}
                    if (! $eqEq($x, $y)) {
                      if (! $eqEq($x, $y)) {
                        if (! $total) {return $NaN;}
                        if ($eqEq($x, $x)) {return 1;}
                        if ($eqEq($y, $y)) {return - 1;}
                      }
                    }
                    if ($data2) {
                      $x = $data2[$i];
                      $y = $b->data2[$i];
                      if ($x < $y) {return - 1;}
                      if ($x > $y) {return 1;}
                      if (! $eqEq($x, $y)) {
                        if (! $eqEq($x, $y)) {
                          if (! $total) {return $NaN;}
                          if ($eqEq($x, $x)) {return 1;}
                          if ($eqEq($y, $y)) {return - 1;}
                        }
                      }
                    }
                  }
                  ;
                  break;
                // FALLTHROUGH
                case 2:
                // FALLTHROUGH
                case 3:
                // FALLTHROUGH
                case 4:
                // FALLTHROUGH
                case 5:
                // FALLTHROUGH
                case 6:
                // FALLTHROUGH
                case 8:
                // FALLTHROUGH
                case 9:
                // FALLTHROUGH
                case 12:
                  for ($i = 0;$i < $data->length;$i++) {
                    if ($data[$i] < $b->data[$i]) {return - 1;}
                    if ($data[$i] > $b->data[$i]) {return 1;}
                  }
                  ;
                  break;
                // FALLTHROUGH
                case 7:
                  for ($i = 0;$i < $data->length;$i++) {
                    if ($data2[$i] < $b->data2[$i]) {return - 1;}
                    if ($data2[$i] > $b->data2[$i]) {return 1;}
                    if ($data[$i] < $b->data[$i]) {return - 1;}
                    if ($data[$i] > $b->data[$i]) {return 1;}
                  }
                  ;
                  break;
                }
              return 0;
            }
          );
          return $ObjectLiteral(
            (object)darray[
             "data"=>$data,
             "data2"=>$data2,
             "data_type"=>$data_type,
             "num_dims"=>$n_dims,
             "nth_dim"=>$nth_dim,
             "kind"=>$kind,
             "layout"=>$layout,
             "size"=>$size,
             "sub"=>$sub,
             "slice"=>$slice,
             "blit"=>$blit,
             "fill"=>$fill,
             "reshape"=>$reshape,
             "get"=>$get,
             "get1"=>$get1,
             "set"=>$set,
             "set1"=>$set1,
             "compare"=>$compare]
          );
        }
      );
    $bigstring_of_array_buffer = $Func(
      function($ab) use ($ArrayLiteral,$caml_ba_create_from,$joo_global_object) {
        $ta = $joo_global_object->Uint8Array->new($ab);
        return $caml_ba_create_from->contents(
          $ta,
          varray[],
          0,
          12,
          0,
          $ArrayLiteral($ta->length)
        );
      }
    );
    $bigstring_destroy_stub = $Func(
      function($v_bstr) use ($ArrayLiteral,$Object,$String,$caml_ba_create_from,$caml_invalid_argument) {
        if ($v_bstr->data2 != varray[]) {
          $caml_invalid_argument(
            $String->new("bigstring_destroy: unsupported kind")
          );
        }
        if ($v_bstr->hasOwnProperty($String->new("__is_deallocated"))) {
          $caml_invalid_argument(
            $String->new("bigstring_destroy: bigstring is already deallocated"
            )
          );
        }
        $destroyed_data = $v_bstr->data->__proto__->constructor->new(0);
        $destroyed_bigstring = $caml_ba_create_from->contents(
          $destroyed_data,
          varray[],
          $v_bstr->data_type,
          $v_bstr->kind,
          $v_bstr->layout,
          $ArrayLiteral(0)
        );
        $destroyed_bigstring->__is_deallocated = true;
        $Object->assign($v_bstr, $destroyed_bigstring);
        return 0;
      }
    );
    $caml_raw_backtrace_length = $Func(function() {return 0;});
    $caml_ba_uint8_get32 = $Func(
      function($ba, $i0) use ($left_shift_32) {
        $b1 = $ba->get1($i0);
        $b2 = $left_shift_32($ba->get1($i0 + 1), 8);
        $b3 = $left_shift_32($ba->get1($i0 + 2), 16);
        $b4 = $left_shift_32($ba->get1($i0 + 3), 24);
        return $b1 | $b2 | $b3 | $b4;
      }
    );
    $bigstring_to_array_buffer = $Func(
      function($bs) {return $bs->data->buffer;}
    );
    $caml_mod = $Func(
      function($x, $y) use ($caml_raise_zero_divide) {
        if ($y == 0) {$caml_raise_zero_divide();}
        return $x % $y;
      }
    );
    $caml_obj_block = $Func(
      function($tag, $size) use ($Array) {
        $o = $Array->new($size + 1);
        $o[0] = $tag;
        for ($i = 1;$i <= $size;$i++) $o[$i] = 0;
        return $o;
      }
    );
    $caml_ba_init = $Func(function() {return 0;});
    
    
    
$right_shift_32=$joo_global_object->right_shift_32;
    
    
    $caml_final_release = $Func(function() {return 0;});
    $caml_ba_get_generic = $Func(
      function($ba, $index) use ($caml_js_from_array) {
        return $ba->get($caml_js_from_array($index));
      }
    );
    $BigStringReader = $Func(
      function($bs, $i) use ($joo_global_object) {
        $joo_global_object->context->s = $bs;
        $joo_global_object->context->i = $i;
      }
    );
    
    $BigStringReader->prototype =
      $ObjectLiteral(
        (object)darray[
         "read8u"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object) {
             return $caml_ba_get_1(
               $joo_global_object->context->s,
               $joo_global_object->context->i++
             );
           }
         ),
         "read8s"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object,$left_shift_32,$right_shift_32) {
             return $right_shift_32(
               $left_shift_32(
                 $caml_ba_get_1(
                   $joo_global_object->context->s,
                   $joo_global_object->context->i++
                 ),
                 24
               ),
               24
             );
           }
         ),
         "read16u"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object,$left_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 2;
             return $left_shift_32($caml_ba_get_1($s, $i), 8) | $caml_ba_get_1($s, $i + 1);
           }
         ),
         "read16s"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object,$left_shift_32,$right_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 2;
             return $right_shift_32(
               $left_shift_32($caml_ba_get_1($s, $i), 24),
               16
             ) | $caml_ba_get_1($s, $i + 1);
           }
         ),
         "read32u"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object,$left_shift_32,$unsigned_right_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 4;
             return $unsigned_right_shift_32(
               $left_shift_32($caml_ba_get_1($s, $i), 24) |
                 $left_shift_32($caml_ba_get_1($s, $i + 1), 16) |
                 $left_shift_32($caml_ba_get_1($s, $i + 2), 8) | $caml_ba_get_1($s, $i + 3),
               0
             );
           }
         ),
         "read32s"=>
         $Func(
           function() use ($caml_ba_get_1,$joo_global_object,$left_shift_32) {
             $s = $joo_global_object->context->s;
             $i = $joo_global_object->context->i;
             $joo_global_object->context->i = $i + 4;
             return $left_shift_32($caml_ba_get_1($s, $i), 24) |
               $left_shift_32($caml_ba_get_1($s, $i + 1), 16) |
               $left_shift_32($caml_ba_get_1($s, $i + 2), 8) | $caml_ba_get_1($s, $i + 3);
           }
         ),
         "readstr"=>
         $Func(
           function($len) use ($Array,$caml_ba_get_1,$caml_string_of_array,$joo_global_object,$plus) {
             $i = $joo_global_object->context->i;
             $arr = $Array->new($len);
             for ($j = 0;$j < $len;$j++) {
               $arr[$j] =
                 $caml_ba_get_1($joo_global_object->context->s, $plus($i, $j));
             }
             $joo_global_object->context->i = $plus($i, $len);
             return $caml_string_of_array($arr);
           }
         )]
      );
    
    $caml_get_exception_backtrace = $Func(function() {return 0;});
    $raw_array_cons = $Func(
      function($a, $x) use ($Array) {
        $l = $a->length;
        $b = $Array->new($l + 1);
        $b[0] = $x;
        for ($i = 1;$i <= $l;$i++) $b[$i] = $a[$i - 1];
        return $b;
      }
    );
    $caml_js_to_array = $Func(
      function($a) use ($raw_array_cons) {return $raw_array_cons($a, 0);}
    );
    $caml_mount_autoload = $Func(
      function($name, $f) use ($MlFakeDevice,$ObjectLiteral,$String,$caml_make_path,$jsoo_mount_point,$plus) {
        $path = $caml_make_path($name);
        $name = $plus($path->join($String->new("/")), $String->new("/"));
        $jsoo_mount_point->push(
          $ObjectLiteral(
            (object)darray[
             "path"=>$name,
             "device"=>$MlFakeDevice->new($name, $f)]
          )
        );
        return 0;
      }
    );
    $caml_sys_close = $Func(
      function($fd) use ($caml_global_data) {
        unset($caml_global_data->fds[$fd]);
        return 0;
      }
    );
    $caml_format_float = $Func(
      function($fmt, $x) use ($Infinity,$String,$caml_finish_formatting,$caml_parse_format,$eqEq,$isFinite,$isNaN,$plus) {
        $s = NULL;$f = $caml_parse_format($fmt);
        $prec = $f->prec < 0 ? 6 : ($f->prec);
        if ($x < 0 || $x == 0 && 1 / $x == - $Infinity) {$f->sign = - 1;$x = - $x;}
        if ($isNaN($x)) {
          $s = $String->new("nan");
          $f->filler = $String->new(" ");
        }
        else {
          if (! $isFinite($x)) {
            $s = $String->new("inf");
            $f->filler = $String->new(" ");
          }
          else {
            switch($f->conv) {
              // FALLTHROUGH
              case $String->new("e"):
                $s = $x->toExponential($prec);
                $i = $s->length;
                if ($eqEq($s->charAt($i - 3), $String->new("e"))) {
                  $s =
                    $plus(
                      $plus($s->slice(0, $i - 1), $String->new("0")),
                      $s->slice($i - 1)
                    );
                }
                break;
              // FALLTHROUGH
              case $String->new("f"):
                $s = $x->toFixed($prec);
                break;
              // FALLTHROUGH
              case $String->new("g"):
                $prec = $prec ? $prec : (1);
                $s = $x->toExponential($prec - 1);
                $j = $s->indexOf($String->new("e"));
                $exp = + $s->slice($j + 1);
                if (
                  $exp < - 4 ||
                    $x >= 1e+21 ||
                    $x->toFixed(0)->length >
                      $prec
                ) {
                  $i = $j - 1;
                  while($eqEq($s->charAt($i), $String->new("0"))) $i--;
                  if ($eqEq($s->charAt($i), $String->new("."))) {$i--;}
                  $s = $plus($s->slice(0, $i + 1), $s->slice($j));
                  $i = $s->length;
                  if ($eqEq($s->charAt($i - 3), $String->new("e"))) {
                    $s =
                      $plus(
                        $plus($s->slice(0, $i - 1), $String->new("0")),
                        $s->slice($i - 1)
                      );
                  }
                  break;
                }
                else {
                  $p = $prec;
                  if ($exp < 0) {
                    $p -= $exp + 1;
                    $s = $x->toFixed($p);
                  }
                  else {
                    while
                     (($s = $x->toFixed($p)) || true
                        ? $s->length > $prec + 1
                        : ($s->length > $prec + 1)) $p--;
                  }
                  if ($p) {
                    $i = $s->length - 1;
                    while($eqEq($s->charAt($i), $String->new("0"))) $i--;
                    if ($eqEq($s->charAt($i), $String->new("."))) {$i--;}
                    $s = $s->slice(0, $i + 1);
                  }
                }
                break;
              }
          }
        }
        return $caml_finish_formatting($f, $s);
      }
    );
    $caml_int64_to_bytes = $Func(
      function($x) use ($ArrayLiteral,$right_shift_32) {
        return $ArrayLiteral(
          $right_shift_32($x[3], 8),
          $x[3] &
            255,
          $right_shift_32($x[2], 16),
          $right_shift_32($x[2], 8) & 255,
          $x[2] &
            255,
          $right_shift_32($x[1], 16),
          $right_shift_32($x[1], 8) & 255,
          $x[1] &
            255
        );
      }
    );
    $caml_bytes_set64 = $Func(
      function($s, $i, $i64) use ($caml_int64_to_bytes,$caml_string_bound_error,$caml_string_unsafe_set,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 7) {$caml_string_bound_error();}
        $a = $caml_int64_to_bytes($i64);
        for ($j = 0;$j < 8;$j++) {
          $caml_string_unsafe_set($s, $i + 7 - $j, $a[$j]);
        }
        return 0;
      }
    );
    $caml_bytes_set16 = $Func(
      function($s, $i, $i16) use ($caml_string_bound_error,$caml_string_unsafe_set,$right_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 1) {$caml_string_bound_error();}
        $b2 = 255 & $right_shift_32($i16, 8);$b1 = 255 & $i16;
        $caml_string_unsafe_set($s, $i + 0, $b1);
        $caml_string_unsafe_set($s, $i + 1, $b2);
        return 0;
      }
    );
    $caml_string_set16 = $Func(
      function($s, $i, $i16) use ($caml_bytes_set16) {
        return $caml_bytes_set16($s, $i, $i16);
      }
    );
    $caml_int64_bswap = $Func(
      function($x) use ($ArrayLiteral,$left_shift_32,$right_shift_32) {
        return $ArrayLiteral(
          255,
          $right_shift_32($x[3] & 65280, 8) | $left_shift_32($x[3] & 255, 8) | $x[2] & 16711680,
          $right_shift_32($x[2] & 65280, 8) | $left_shift_32($x[2] & 255, 8) | $x[1] & 16711680,
          $right_shift_32($x[1] & 65280, 8) | $left_shift_32($x[1] & 255, 8)
        );
      }
    );
    $caml_div = $Func(
      function($x, $y) use ($caml_raise_zero_divide) {
        if ($y == 0) {$caml_raise_zero_divide();}
        return $x / $y | 0;
      }
    );
    $caml_fill_bytes = $Func(
      function($s, $i, $l, $c) use ($String,$caml_convert_string_to_array,$caml_str_repeat,$eqEq) {
        if ($l > 0) {
          if ($i == 0 && ($l >= $s->l || $s->t == 2 && $l >= $s->c->length)) {
            if ($c == 0) {
              $s->c = $String->new("");
              $s->t = 2;
            }
            else {
              $s->c = $caml_str_repeat($l, $String->fromCharCode($c));
              $s->t = $eqEq($l, $s->l) ? 0 : (2);
            }
          }
          else {
            if ($s->t != 4) {$caml_convert_string_to_array($s);}
            for ($l += $i;$i < $l;$i++) $s->c[$i] = $c;
          }
        }
        return 0;
      }
    );
    $caml_fill_string = $caml_fill_bytes;
    $caml_string_lessthan = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c < $s2->c ? 1 : (0);
      }
    );
    $caml_string_greaterthan = $Func(
      function($s1, $s2) use ($caml_string_lessthan) {
        return $caml_string_lessthan($s2, $s1);
      }
    );
    $caml_gc_major = $Func(function() {return 0;});
    $caml_ephe_get_data_copy = $Func(
      function($x) use ($ArrayLiteral,$caml_ephe_data_offset,$caml_obj_dup) {
        if ($x[$caml_ephe_data_offset] === NULL) {return 0;}
        else {
          return $ArrayLiteral(0, $caml_obj_dup($x[$caml_ephe_data_offset]));
        }
      }
    );
    $caml_lex_array = $Func(
      function($s) use ($Array,$caml_jsbytes_of_string,$left_shift_32,$right_shift_32) {
        $s = $caml_jsbytes_of_string($s);
        $l = $s->length / 2;
        $a = $Array->new($l);
        for ($i = 0;$i < $l;$i++) $a[$i] =
          $right_shift_32(
            $left_shift_32(
              $s->charCodeAt(2 * $i) |
                $left_shift_32($s->charCodeAt(2 * $i + 1), 8),
              16
            ),
            16
          );
        return $a;
      }
    );
    $caml_lex_engine = $Func(
      function($tbl, $start_state, $lexbuf) use ($String,$caml_array_of_string,$caml_failwith,$caml_lex_array,$eqEq,$plus) {
        $lex_buffer = 2;
        $lex_buffer_len = 3;
        $lex_start_pos = 5;
        $lex_curr_pos = 6;
        $lex_last_pos = 7;
        $lex_last_action = 8;
        $lex_eof_reached = 9;
        $lex_base = 1;
        $lex_backtrk = 2;
        $lex_default = 3;
        $lex_trans = 4;
        $lex_check = 5;
        if (! $tbl->lex_default) {
          $tbl->lex_base = $caml_lex_array($tbl[$lex_base]);
          $tbl->lex_backtrk = $caml_lex_array($tbl[$lex_backtrk]);
          $tbl->lex_check = $caml_lex_array($tbl[$lex_check]);
          $tbl->lex_trans = $caml_lex_array($tbl[$lex_trans]);
          $tbl->lex_default = $caml_lex_array($tbl[$lex_default]);
        }
        $c = NULL;$state = $start_state;
        $buffer = $caml_array_of_string($lexbuf[$lex_buffer]);
        if ($state >= 0) {
          $lexbuf[$lex_last_pos] =
            $lexbuf[$lex_start_pos] =
              $lexbuf[$lex_curr_pos];
          $lexbuf[$lex_last_action] = - 1;
        }
        else {$state = - $state - 1;}
        for (;;) {
          $base = $tbl->lex_base[$state];
          if ($base < 0) {return - $base - 1;}
          $backtrk = $tbl->lex_backtrk[$state];
          if ($backtrk >= 0) {
            $lexbuf[$lex_last_pos] = $lexbuf[$lex_curr_pos];
            $lexbuf[$lex_last_action] = $backtrk;
          }
          if ($lexbuf[$lex_curr_pos] >= $lexbuf[$lex_buffer_len]) {
            if ($lexbuf[$lex_eof_reached] == 0) {return - $state - 1;}
            else {$c = 256;}
          }
          else {$c = $buffer[$lexbuf[$lex_curr_pos]];$lexbuf[$lex_curr_pos]++;
          }
          if ($eqEq($tbl->lex_check[$plus($base, $c)], $state)) {$state = $tbl->lex_trans[$plus($base, $c)];}
          else {$state = $tbl->lex_default[$state];}
          if ($state < 0) {
            $lexbuf[$lex_curr_pos] = $lexbuf[$lex_last_pos];
            if ($lexbuf[$lex_last_action] == - 1) {
              $caml_failwith($String->new("lexing: empty token"));
            }
            else {return $lexbuf[$lex_last_action];}
          }
          else {if ($c == 256) {$lexbuf[$lex_eof_reached] = 0;}}
        }
      }
    );
    $caml_sys_get_argv = $Func(
      function() use ($ArrayLiteral,$String,$caml_js_to_string,$joo_global_object,$raw_array_sub) {
        $g = $joo_global_object;
        $main = $String->new("a.out");
        $args = $ArrayLiteral();
        if ($g->process && $g->process->argv && $g->process->argv->length > 1
        ) {
          $argv = $g->process->argv;
          $main = $argv[1];
          $args = $raw_array_sub($argv, 2, $argv->length - 2);
        }
        $p = $caml_js_to_string($main);
        $args2 = $ArrayLiteral(0, $p);
        for ($i = 0;$i < $args->length;$i++) $args2->push(
          $caml_js_to_string($args[$i])
        );
        return $ArrayLiteral(0, $p, $args2);
      }
    );
    $caml_js_to_bool = $Func(function($x) {return + $x;});
    $caml_sys_file_exists = $Func(
      function($name) use ($resolve_fs_device) {
        $root = $resolve_fs_device($name);
        return $root->device->exists($root->rest);
      }
    );
    $caml_ephe_key_offset = 3;
    $caml_weak_get = $Func(
      function($x, $i) use ($String,$caml_ephe_key_offset,$caml_invalid_argument,$plus) {
        if ($i < 0 || $plus($caml_ephe_key_offset, $i) >= $x->length) {$caml_invalid_argument($String->new("Weak.get_key"));}
        return $x[$plus($caml_ephe_key_offset, $i)] === NULL
          ? 0
          : ($x[$plus($caml_ephe_key_offset, $i)]);
      }
    );
    $caml_weak_get_copy = $Func(
      function($x, $i) use ($Array,$ArrayLiteral,$String,$caml_ephe_key_offset,$caml_invalid_argument,$caml_obj_dup,$caml_weak_get,$plus) {
        if ($i < 0 || $plus($caml_ephe_key_offset, $i) >= $x->length) {$caml_invalid_argument($String->new("Weak.get_copy"));}
        $y = $caml_weak_get($x, $i);
        if ($y === 0) {return $y;}
        $z = $y[1];
        if (instance_of($z, $Array)) {
          return $ArrayLiteral(0, $caml_obj_dup($z));
        }
        return $y;
      }
    );
    $caml_ephe_get_key_copy = $caml_weak_get_copy;
    $caml_convert_raw_backtrace_slot = $Func(
      function() use ($String,$caml_failwith) {
        $caml_failwith($String->new("caml_convert_raw_backtrace_slot"));
      }
    );
    $caml_raw_backtrace_next_slot = $Func(function() {return 0;});
    $caml_array_sub = $Func(
      function($a, $i, $len) use ($Array) {
        $a2 = $Array->new($len + 1);
        $a2[0] = 0;
        for ($i2 = 1,$i1 = $i + 1;$i2 <= $len;$i2++ || true ? $i1++ : ($i1++)) {$a2[$i2] = $a[$i1];}
        return $a2;
      }
    );
    $caml_lessthan = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) < 0);
      }
    );
    $caml_bytes_equal = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes,$eqEq,$eqEqEq) {
        if ($eqEqEq($s1, $s2)) {return 1;}
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $eqEq($s1->c, $s2->c) ? 1 : (0);
      }
    );
    $caml_ba_views = NULL;
    $caml_ba_init_views = $Func(
      function() use ($ArrayLiteral,$caml_ba_views,$joo_global_object) {
        if (! $caml_ba_views) {
          $g = $joo_global_object;
          $caml_ba_views =
            $ArrayLiteral(
              $ArrayLiteral(
                $g->Float32Array,
                $g->Float64Array,
                $g->Int8Array,
                $g->Uint8Array,
                $g->Int16Array,
                $g->Uint16Array,
                $g->Int32Array,
                $g->Int32Array,
                $g->Int32Array,
                $g->Int32Array,
                $g->Float32Array,
                $g->Float64Array,
                $g->Uint8Array
              ),
              $ArrayLiteral(0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 2, 2, 0)
            );
        }
      }
    );
    $caml_sys_const_ostype_cygwin = $Func(function() {return 0;});
    $caml_register_global = $Func(
      function($n, $v, $name_opt) use ($caml_global_data,$joo_global_object) {
        if ($name_opt && $joo_global_object->toplevelReloc) {$n = $joo_global_object->toplevelReloc($name_opt);}
        $caml_global_data[$n + 1] = $v;
        if ($name_opt) {$caml_global_data[$name_opt] = $v;}
      }
    );
    $caml_cosh_float = $Func(
      function($x) use ($Math,$plus) {
        return $plus($Math->exp($x), $Math->exp(- $x)) / 2;
      }
    );
    $caml_weak_check = $Func(
      function($x, $i) use ($caml_ephe_key_offset,$plus) {
        if (
          $x[$plus($caml_ephe_key_offset, $i)] !== NULL &&
            $x[$plus($caml_ephe_key_offset, $i)] !== 0
        ) {return 1;}
        else {return 0;}
      }
    );
    $caml_ephe_check_key = $caml_weak_check;
    $caml_hash_mix_final = $Func(
      function($h) use ($caml_mul,$unsigned_right_shift_32) {
        $h &= $unsigned_right_shift_32($h, 16);
        $h = $caml_mul($h, 2246822507 | 0);
        $h &= $unsigned_right_shift_32($h, 13);
        $h = $caml_mul($h, 3266489909 | 0);
        $h &= $unsigned_right_shift_32($h, 16);
        return $h;
      }
    );
    $caml_ba_uint8_set64 = $Func(
      function($ba, $i0, $v) use ($right_shift_32) {
        $ba->set1($i0, $v[1] & 255);
        $ba->set1($i0 + 1, $right_shift_32($v[1], 8) & 255);
        $ba->set1($i0 + 2, $right_shift_32($v[1], 16));
        $ba->set1($i0 + 3, $v[2] & 255);
        $ba->set1($i0 + 4, $right_shift_32($v[2], 8) & 255);
        $ba->set1($i0 + 5, $right_shift_32($v[2], 16));
        $ba->set1($i0 + 6, $v[3] & 255);
        $ba->set1($i0 + 7, $right_shift_32($v[3], 8));
        return 0;
      }
    );
    $caml_lex_run_mem = $Func(
      function($s, $i, $mem, $curr_pos) {
        for (;;) {
          $dst = $s->charCodeAt($i);
          $i++;
          if ($dst == 255) {return;}
          $src = $s->charCodeAt($i);
          $i++;
          if ($src == 255) {
            $mem[$dst + 1] = $curr_pos;
          }
          else {$mem[$dst + 1] = $mem[$src + 1];}
        }
      }
    );
    $caml_lex_run_tag = $Func(
      function($s, $i, $mem) {
        for (;;) {
          $dst = $s->charCodeAt($i);
          $i++;
          if ($dst == 255) {return;}
          $src = $s->charCodeAt($i);
          $i++;
          if ($src == 255) {
            $mem[$dst + 1] = - 1;
          }
          else {$mem[$dst + 1] = $mem[$src + 1];}
        }
      }
    );
    $caml_new_lex_engine = $Func(
      function($tbl, $start_state, $lexbuf) use ($String,$caml_array_of_string,$caml_failwith,$caml_jsbytes_of_string,$caml_lex_array,$caml_lex_run_mem,$caml_lex_run_tag,$eqEq,$plus) {
        $lex_buffer = 2;
        $lex_buffer_len = 3;
        $lex_start_pos = 5;
        $lex_curr_pos = 6;
        $lex_last_pos = 7;
        $lex_last_action = 8;
        $lex_eof_reached = 9;
        $lex_mem = 10;
        $lex_base = 1;
        $lex_backtrk = 2;
        $lex_default = 3;
        $lex_trans = 4;
        $lex_check = 5;
        $lex_base_code = 6;
        $lex_backtrk_code = 7;
        $lex_default_code = 8;
        $lex_trans_code = 9;
        $lex_check_code = 10;
        $lex_code = 11;
        if (! $tbl->lex_default) {
          $tbl->lex_base = $caml_lex_array($tbl[$lex_base]);
          $tbl->lex_backtrk = $caml_lex_array($tbl[$lex_backtrk]);
          $tbl->lex_check = $caml_lex_array($tbl[$lex_check]);
          $tbl->lex_trans = $caml_lex_array($tbl[$lex_trans]);
          $tbl->lex_default = $caml_lex_array($tbl[$lex_default]);
        }
        if (! $tbl->lex_default_code) {
          $tbl->lex_base_code = $caml_lex_array($tbl[$lex_base_code]);
          $tbl->lex_backtrk_code = $caml_lex_array($tbl[$lex_backtrk_code]);
          $tbl->lex_check_code = $caml_lex_array($tbl[$lex_check_code]);
          $tbl->lex_trans_code = $caml_lex_array($tbl[$lex_trans_code]);
          $tbl->lex_default_code = $caml_lex_array($tbl[$lex_default_code]);
        }
        if ($tbl->lex_code == varray[]) {
          $tbl->lex_code = $caml_jsbytes_of_string($tbl[$lex_code]);
        }
        $c = NULL;$state = $start_state;
        $buffer = $caml_array_of_string($lexbuf[$lex_buffer]);
        if ($state >= 0) {
          $lexbuf[$lex_last_pos] =
            $lexbuf[$lex_start_pos] =
              $lexbuf[$lex_curr_pos];
          $lexbuf[$lex_last_action] = - 1;
        }
        else {$state = - $state - 1;}
        for (;;) {
          $base = $tbl->lex_base[$state];
          if ($base < 0) {
            $pc_off = $tbl->lex_base_code[$state];
            $caml_lex_run_tag($tbl->lex_code, $pc_off, $lexbuf[$lex_mem]);
            return - $base - 1;
          }
          $backtrk = $tbl->lex_backtrk[$state];
          if ($backtrk >= 0) {
            $pc_off = $tbl->lex_backtrk_code[$state];
            $caml_lex_run_tag($tbl->lex_code, $pc_off, $lexbuf[$lex_mem]);
            $lexbuf[$lex_last_pos] = $lexbuf[$lex_curr_pos];
            $lexbuf[$lex_last_action] = $backtrk;
          }
          if ($lexbuf[$lex_curr_pos] >= $lexbuf[$lex_buffer_len]) {
            if ($lexbuf[$lex_eof_reached] == 0) {return - $state - 1;}
            else {$c = 256;}
          }
          else {$c = $buffer[$lexbuf[$lex_curr_pos]];$lexbuf[$lex_curr_pos]++;
          }
          $pstate = $state;
          if ($eqEq($tbl->lex_check[$plus($base, $c)], $state)) {$state = $tbl->lex_trans[$plus($base, $c)];}
          else {$state = $tbl->lex_default[$state];}
          if ($state < 0) {
            $lexbuf[$lex_curr_pos] = $lexbuf[$lex_last_pos];
            if ($lexbuf[$lex_last_action] == - 1) {
              $caml_failwith($String->new("lexing: empty token"));
            }
            else {return $lexbuf[$lex_last_action];}
          }
          else {
            $base_code = $tbl->lex_base_code[$pstate];$pc_off = NULL;
            if ($eqEq($tbl->lex_check_code[$plus($base_code, $c)], $pstate)) {$pc_off = $tbl->lex_trans_code[$plus($base_code, $c)];}
            else {$pc_off = $tbl->lex_default_code[$pstate];}
            if ($pc_off > 0) {
              $caml_lex_run_mem(
                $tbl->lex_code,
                $pc_off,
                $lexbuf[$lex_mem],
                $lexbuf[$lex_curr_pos]
              );
            }
            if ($c == 256) {$lexbuf[$lex_eof_reached] = 0;}
          }
        }
      }
    );
    $caml_int64_bits_of_float = $Func(
      function($x) use ($ArrayLiteral,$Infinity,$Math,$isFinite,$isNaN,$jsoo_floor_log2,$left_shift_32) {
        if (! $isFinite($x)) {
          if ($isNaN($x)) {return $ArrayLiteral(255, 1, 0, 32752);}
          return $x > 0
            ? $ArrayLiteral(255, 0, 0, 32752)
            : ($ArrayLiteral(255, 0, 0, 65520));
        }
        $sign = $x == 0 && 1 / $x == - $Infinity
          ? 32768
          : ($x >= 0 ? 0 : (32768));
        if ($sign) {$x = - $x;}
        $exp = $jsoo_floor_log2($x) + 1023;
        if ($exp <= 0) {
          $exp = 0;
          $x /= $Math->pow(2, - 1026);
        }
        else {
          $x /= $Math->pow(2, $exp - 1027);
          if ($x < 16) {$x *= 2;$exp -= 1;}
          if ($exp == 0) {$x /= 2;}
        }
        $k = $Math->pow(2, 24);
        $r3 = $x | 0;
        $x = ($x - $r3) * $k;
        $r2 = $x | 0;
        $x = ($x - $r2) * $k;
        $r1 = $x | 0;
        $r3 = $r3 & 15 | $sign | $left_shift_32($exp, 4);
        return $ArrayLiteral(255, $r1, $r2, $r3);
      }
    );
    $caml_output_val = $Func(
      function() use ($Array,$ArrayLiteral,$Func,$MlBytes,$ObjectLiteral,$String,$caml_failwith,$caml_int64_to_bytes,$caml_ml_string_length,$caml_string_unsafe_get,$eqEq,$eqEqEq,$joo_global_object,$left_shift_32,$plus,$right_shift_32,$typeof) {
        $Writer = $Func(
          function() use ($ArrayLiteral,$joo_global_object) {
            $joo_global_object->context->chunk = $ArrayLiteral();
          }
        );
        $Writer->prototype =
          $ObjectLiteral(
            (object)darray[
             "chunk_idx"=>20,
             "block_len"=>0,
             "obj_counter"=>0,
             "size_32"=>0,
             "size_64"=>0,
             "write"=>
             $Func(
               function($size, $value) use ($joo_global_object,$right_shift_32) {
                 for ($i = $size - 8;$i >= 0;$i -= 8) $joo_global_object->context->chunk[
                    $joo_global_object->context->chunk_idx++
                  ] = $right_shift_32($value, $i) & 255;
               }
             ),
             "write_code"=>
             $Func(
               function($size, $code, $value) use ($joo_global_object,$right_shift_32) {
                 $joo_global_object->context->chunk[
                    $joo_global_object->context->chunk_idx++
                  ] = $code;
                 for ($i = $size - 8;$i >= 0;$i -= 8) $joo_global_object->context->chunk[
                    $joo_global_object->context->chunk_idx++
                  ] = $right_shift_32($value, $i) & 255;
               }
             ),
             "finalize"=>
             $Func(
               function() use ($joo_global_object) {
                 $joo_global_object->context->block_len =
                   $joo_global_object->context->chunk_idx - 20;
                 $joo_global_object->context->chunk_idx = 0;
                 $joo_global_object->context->write(32, 2224400062);
                 $joo_global_object->context->write(
                   32,
                   $joo_global_object->context->block_len
                 );
                 $joo_global_object->context->write(
                   32,
                   $joo_global_object->context->obj_counter
                 );
                 $joo_global_object->context->write(
                   32,
                   $joo_global_object->context->size_32
                 );
                 $joo_global_object->context->write(
                   32,
                   $joo_global_object->context->size_64
                 );
                 return $joo_global_object->context->chunk;
               }
             )]
          );
        return $Func(
          function($v) use ($Array,$ArrayLiteral,$Func,$MlBytes,$String,$Writer,$caml_failwith,$caml_int64_to_bytes,$caml_ml_string_length,$caml_string_unsafe_get,$eqEq,$eqEqEq,$left_shift_32,$plus,$typeof) {
            $writer = $Writer->new();
            $stack = $ArrayLiteral();
            $extern_rec = $Func(
              function($v) use ($Array,$MlBytes,$String,$caml_failwith,$caml_int64_to_bytes,$caml_ml_string_length,$caml_string_unsafe_get,$eqEq,$eqEqEq,$left_shift_32,$plus,$stack,$typeof,$writer) {
                if (instance_of($v, $Array) && $eqEqEq($v[0], $v[0] | 0)) {
                  if ($v[0] == 255) {
                    $writer->write(8, 18);
                    for ($i = 0;$i < 3;$i++) $writer->write(
                      8,
                      $String->new("_j\0")->charCodeAt($i)
                    );
                    $b = $caml_int64_to_bytes($v);
                    for ($i = 0;$i < 8;$i++) $writer->write(8, $b[$i]);
                    $writer->size_32 = $plus($writer->size_32, 4);
                    $writer->size_64 = $plus($writer->size_64, 3);
                    return;
                  }
                  if ($v[0] == 251) {
                    $caml_failwith(
                      $String->new("output_value: abstract value (Abstract)")
                    );
                  }
                  if ($v[0] < 16 && $v->length - 1 < 8) {
                    $writer->write(
                      8,
                      128 + $v[0] +
                        $left_shift_32($v->length - 1, 4)
                    );
                  }
                  else {
                    $writer->write_code(
                      32,
                      8,
                      $left_shift_32($v->length - 1, 10) | $v[0]
                    );
                  }
                  $writer->size_32 = $plus($writer->size_32, $v->length);
                  $writer->size_64 = $plus($writer->size_64, $v->length);
                  if ($v->length > 1) {$stack->push($v, 1);}
                }
                else {
                  if (instance_of($v, $MlBytes)) {
                    $len = $caml_ml_string_length($v);
                    if ($len < 32) {
                      $writer->write(8, 32 + $len);
                    }
                    else {
                      if ($len < 256) {
                        $writer->write_code(8, 9, $len);
                      }
                      else {$writer->write_code(32, 10, $len);}
                    }
                    for ($i = 0;$i < $len;$i++) $writer->write(
                      8,
                      $caml_string_unsafe_get($v, $i)
                    );
                    $writer->size_32 =
                      $plus($writer->size_32, 1 + (($len + 4) / 4 | 0));
                    $writer->size_64 =
                      $plus($writer->size_64, 1 + (($len + 8) / 8 | 0));
                  }
                  else {
                    if (! $eqEq($v, $v | 0)) {
                      $type_of_v = $typeof($v);
                      $caml_failwith(
                        $plus(
                          $plus(
                            $String->new("output_value: abstract value ("),
                            $type_of_v
                          ),
                          $String->new(")")
                        )
                      );
                    }
                    else {
                      if ($v >= 0 && $v < 64) {
                        $writer->write(8, 64 + $v);
                      }
                      else {
                        if (
                          $v >= - $left_shift_32(1, 7) &&
                            $v < $left_shift_32(1, 7)
                        ) {$writer->write_code(8, 0, $v);}
                        else {
                          if (
                            $v >= - $left_shift_32(1, 15) &&
                              $v < $left_shift_32(1, 15)
                          ) {$writer->write_code(16, 1, $v);}
                          else {$writer->write_code(32, 2, $v);}
                        }
                      }
                    }
                  }
                }
              }
            );
            $extern_rec($v);
            while($stack->length > 0) {
               $i = $stack->pop();
               $v = $stack->pop();
               if ($i + 1 < $v->length) {$stack->push($v, $i + 1);}
               $extern_rec($v[$i]);
             }
            $writer->finalize();
            return $writer->chunk;
          }
        );
      }
    )();
    $caml_js_from_float = $Func(function($x) {return $x;});
    
    
    
    $parseInt = function($str, $base) {
      print('oh hi markk');
      return PHP\intval($str, $base);
    };
    
    
    $caml_floatarray_create = $Func(
      function($len) use ($Array) {
        $len = $len + 1 | 0;
        $b = $Array->new($len);
        $b[0] = 254;
        for ($i = 1;$i < $len;$i++) $b[$i] = 0;
        return $b;
      }
    );
    $caml_gc_stat = $Func(
      function() use ($ArrayLiteral) {
        return $ArrayLiteral(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        );
      }
    );
    $caml_lessequal = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) <= 0);
      }
    );
    $caml_ml_seek_out_64 = $Func(
      function($chanid, $pos) use ($caml_int64_to_float,$caml_ml_channels) {
        $caml_ml_channels[$chanid]->offset = $caml_int64_to_float($pos);
        return 0;
      }
    );
    $caml_gc_set = $Func(function($_control) {return 0;});
    $caml_js_get = $Func(function($o, $f) {return $o[$f];});
    $caml_method_cache = $ArrayLiteral();
    $caml_get_public_method = $Func(
      function($obj, $tag, $cacheid) use ($caml_method_cache,$eqEq,$eqEqEq,$plus,$right_shift_32) {
        $meths = $obj[1];
        $ofs = $caml_method_cache[$cacheid];
        if ($ofs === varray[]) {
          for ($i = $caml_method_cache->length;$i < $cacheid;$i++) $caml_method_cache[$i] = 0;
        }
        else {if ($eqEqEq($meths[$ofs], $tag)) {return $meths[$ofs - 1];}}
        $li = 3;$hi = $meths[1] * 2 + 1;$mi = NULL;
        while($li < $hi) {
           $mi = $right_shift_32($plus($li, $hi), 1) | 1;
           if ($tag < $meths[$mi + 1]) {$hi = $mi - 2;}
           else {$li = $mi;}
         }
        $caml_method_cache[$cacheid] = $li + 1;
        return $eqEq($tag, $meths[$li + 1]) ? $meths[$li] : (0);
      }
    );
    $caml_js_get_console = $Func(
      function() use ($ArrayLiteral,$Func,$ObjectLiteral,$String,$joo_global_object) {
        $c = $joo_global_object->console
          ? $joo_global_object->console
          : ($ObjectLiteral((object)darray[]));
        $m = $ArrayLiteral(
          $String->new("log"),
          $String->new("debug"),
          $String->new("info"),
          $String->new("warn"),
          $String->new("error"),
          $String->new("assert"),
          $String->new("dir"),
          $String->new("dirxml"),
          $String->new("trace"),
          $String->new("group"),
          $String->new("groupCollapsed"),
          $String->new("groupEnd"),
          $String->new("time"),
          $String->new("timeEnd")
        );
        $f = $Func(function() {});
        for ($i = 0;$i < $m->length;$i++) if (! $c[$m[$i]]) {$c[$m[$i]] = $f;}
        return $c;
      }
    );
    $js_print_stdout = $Func(
      function($s) use ($joo_global_object) {
        $g = $joo_global_object;
        if ($g->process && $g->process->stdout && $g->process->stdout->write) {$g->process->stdout->write($s);}
        else {
          if ($s->charCodeAt($s->length - 1) == 10) {$s = $s->substr(0, $s->length - 1);}
          $v = $g->console;
          $v && $v->log && $v->log($s);
        }
      }
    );
    $caml_sys_open_internal = $Func(
      function($idx, $output, $file, $flags) use ($Array,$ObjectLiteral,$caml_global_data) {
        if ($caml_global_data->fds === NULL) {
          $caml_global_data->fds = $Array->new();
        }
        $flags = $flags ? $flags : ($ObjectLiteral((object)darray[]));
        $info = $ObjectLiteral((object)darray[]);
        $info->file = $file;
        $info->offset = $flags->append ? $file->length() : (0);
        $info->flags = $flags;
        $info->output = $output;
        $caml_global_data->fds[$idx] = $info;
        if (
          !
          $caml_global_data->fd_last_idx ||
            $idx > $caml_global_data->fd_last_idx
        ) {$caml_global_data->fd_last_idx = $idx;}
        return $idx;
      }
    );
    $caml_sys_open = $Func(
      function($name, $flags, $_perms) use ($ObjectLiteral,$String,$caml_global_data,$caml_raise_sys_error,$caml_std_output,$caml_sys_open_internal,$plus,$resolve_fs_device) {
        $f = $ObjectLiteral((object)darray[]);
        while($flags) {
           switch($flags[1]) {
             // FALLTHROUGH
             case 0:
               $f->rdonly = 1;
               break;
             // FALLTHROUGH
             case 1:
               $f->wronly = 1;
               break;
             // FALLTHROUGH
             case 2:
               $f->append = 1;
               break;
             // FALLTHROUGH
             case 3:
               $f->create = 1;
               break;
             // FALLTHROUGH
             case 4:
               $f->truncate = 1;
               break;
             // FALLTHROUGH
             case 5:
               $f->excl = 1;
               break;
             // FALLTHROUGH
             case 6:
               $f->binary = 1;
               break;
             // FALLTHROUGH
             case 7:
               $f->text = 1;
               break;
             // FALLTHROUGH
             case 8:
               $f->nonblock = 1;
               break;
             }
           $flags = $flags[2];
         }
        if ($f->rdonly && $f->wronly) {
          $caml_raise_sys_error(
            $plus(
              $name->toString(),
              $String->new(
                " : flags Open_rdonly and Open_wronly are not compatible"
              )
            )
          );
        }
        if ($f->text && $f->binary) {
          $caml_raise_sys_error(
            $plus(
              $name->toString(),
              $String->new(
                " : flags Open_text and Open_binary are not compatible"
              )
            )
          );
        }
        $root = $resolve_fs_device($name);
        $file = $root->device->open($root->rest, $f);
        $idx = $caml_global_data->fd_last_idx
          ? $caml_global_data->fd_last_idx
          : (0);
        return $caml_sys_open_internal($idx + 1, $caml_std_output, $file, $f);
      }
    );
    
    $caml_sys_open_internal(
      0,
      $caml_std_output,
      $MlFakeFile->new($caml_create_bytes(0))
    );
    
    $caml_sys_open_internal(
      1,
      $js_print_stdout,
      $MlFakeFile->new($caml_create_bytes(0))
    );
    
    $caml_sys_open_internal(
      2,
      $js_print_stderr,
      $MlFakeFile->new($caml_create_bytes(0))
    );
    
    $caml_ml_open_descriptor_in = $Func(
      function($fd) use ($ObjectLiteral,$String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$plus) {
        $data = $caml_global_data->fds[$fd];
        if ($data->flags->wronly) {
          $caml_raise_sys_error(
            $plus(
              $plus($String->new("fd "), $fd),
              $String->new(" is writeonly")
            )
          );
        }
        $channel = $ObjectLiteral(
          (object)darray[
           "file"=>$data->file,
           "offset"=>$data->offset,
           "fd"=>$fd,
           "opened"=>true,
           "out"=>false,
           "refill"=>varray[]]
        );
        $caml_ml_channels[$channel->fd] = $channel;
        return $channel->fd;
      }
    );
    $caml_gc_compaction = $Func(function() {return 0;});
    $caml_ojs_new_arr = $Func(
      function($c, $a) use ($Func,$joo_global_object) {
        switch($a->length) {
          // FALLTHROUGH
          case 0:
            return $c->new();
          // FALLTHROUGH
          case 1:
            return $c->new($a[0]);
          // FALLTHROUGH
          case 2:
            return $c->new($a[0], $a[1]);
          // FALLTHROUGH
          case 3:
            return $c->new($a[0], $a[1], $a[2]);
          // FALLTHROUGH
          case 4:
            return $c->new($a[0], $a[1], $a[2], $a[3]);
          // FALLTHROUGH
          case 5:
            return $c->new($a[0], $a[1], $a[2], $a[3], $a[4]);
          // FALLTHROUGH
          case 6:
            return $c->new($a[0], $a[1], $a[2], $a[3], $a[4], $a[5]);
          // FALLTHROUGH
          case 7:
            return $c->new($a[0], $a[1], $a[2], $a[3], $a[4], $a[5], $a[6]);
          }
        $F = $Func(
          function() use ($a,$c,$joo_global_object) {
            return $c->apply($joo_global_object->context, $a);
          }
        );
        $F->prototype = $c->prototype;
        return $F->new();
      }
    );
    $caml_ephe_get_key = $caml_weak_get;
    $caml_js_regexps = $ObjectLiteral(
      (object)darray[
       "amp"=>$RegExp->new($String->new("&"), $String->new("g")),
       "lt"=>$RegExp->new($String->new("<"), $String->new("g")),
       "quot"=>$RegExp->new($String->new("\\\""), $String->new("g")),
       "all"=>$RegExp->new($String->new("[&<\\\"]"))]
    );
    $caml_js_html_escape = $Func(
      function($s) use ($String,$caml_js_regexps) {
        if (! $caml_js_regexps->all->test($s)) {return $s;}
        return $s->replace($caml_js_regexps->amp, $String->new("&amp;"))->replace($caml_js_regexps->lt, $String->new("&lt;"))->replace(
          $caml_js_regexps->quot,
          $String->new("&quot;")
        );
      }
    );
    $caml_ml_close_channel = $Func(
      function($chanid) use ($caml_ml_channels,$caml_ml_flush,$caml_sys_close) {
        $chan = $caml_ml_channels[$chanid];
        $caml_ml_flush($chanid);
        $chan->opened = false;
        $chan->file->close();
        $caml_sys_close($chan->fd);
        return 0;
      }
    );
    $win_cleanup = $Func(function() {});
    $caml_sys_isatty = $Func(function($_chan) {return 0;});
    $caml_ba_dim_2 = $Func(function($ba) {return $ba->nth_dim(1);});
    
    
    
    $caml_js_wrap_meth_callback_arguments = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback_arguments is not yet tested");
        return $Func(
          function() use ($ArrayLiteral, $caml_call_gen, $f, $joo_global_object) {
            return $caml_call_gen(
              $f,
              $ArrayLiteral(
                varray[
                  $joo_global_object->context,
                  $ArrayLiteral(\func_get_args())
                ]
              )
            );
          }
        );
      }
    );
    
    
    $unix_inet_addr_of_string = $Func(function() {return 0;});
    $caml_sinh_float = $Func(
      function($x) use ($Math) {
        return ($Math->exp($x) - $Math->exp(- $x)) / 2;
      }
    );
    $caml_js_set = $Func(function($o, $f, $v) {$o[$f] = $v;return 0;});
    $caml_ldexp_float = $Func(
      function($x, $exp) use ($Math,$plus) {
        $exp |= 0;
        if ($exp > 1023) {
          $exp -= 1023;
          $x *= $Math->pow(2, 1023);
          if ($exp > 1023) {$exp -= 1023;$x *= $Math->pow(2, 1023);}
        }
        if ($exp < - 1023) {
          $exp = $plus($exp, 1023);
          $x *= $Math->pow(2, - 1023);
        }
        $x *= $Math->pow(2, $exp);
        return $x;
      }
    );
    
    
    
    $caml_js_wrap_callback_strict = $Func(
      function($arity, $f) use (
        $Func,
        $Math,
        $ArrayLiteral,
        $caml_call_gen
      ) {
        print("WARNING: caml_js_wrap_callback_strict is not yet tested");
        return $Func(
          function() use (
            $Math,
            $ArrayLiteral,
            $arity,
            $caml_call_gen,
            $f
          ) {
            $func_args = \func_get_args();
            $n = PHP\count($func_args);
            if ($n !== $arity) {
              $func_args = PHP\array_slice($func_args, 0, $Math->min($n, $arity));
            }
            return $caml_call_gen($f, $ArrayLiteral($func_args));
          }
        );
      }
    );
    
    
    $caml_array_get = $Func(
      function($array, $index) use ($caml_array_bound_error) {
        if ($index < 0 || $index >= $array->length - 1) {$caml_array_bound_error();}
        return $array[$index + 1];
      }
    );
    $caml_get_current_callstack = $Func(
      function() use ($ArrayLiteral) {return $ArrayLiteral(0);}
    );
    $caml_int64_mod = $Func(
      function($x, $y) use ($caml_int64_is_zero,$caml_int64_neg,$caml_int64_udivmod,$caml_raise_zero_divide) {
        if ($caml_int64_is_zero($y)) {$caml_raise_zero_divide();}
        $sign = $x[3];
        if ($x[3] & 32768) {$x = $caml_int64_neg($x);}
        if ($y[3] & 32768) {$y = $caml_int64_neg($y);}
        $r = $caml_int64_udivmod($x, $y)[2];
        if ($sign & 32768) {$r = $caml_int64_neg($r);}
        return $r;
      }
    );
    $caml_create_file_extern = $Func(
      function($name, $content) use ($ArrayLiteral,$ObjectLiteral,$joo_global_object) {
        if ($joo_global_object->caml_create_file) {
          $joo_global_object->caml_create_file($name, $content);
        }
        else {
          if (! $joo_global_object->caml_fs_tmp) {
            $joo_global_object->caml_fs_tmp = $ArrayLiteral();
          }
          $joo_global_object->caml_fs_tmp->push(
            $ObjectLiteral((object)darray["name"=>$name,"content"=>$content])
          );
        }
        return 0;
      }
    );
    $caml_obj_set_tag = $Func(function($x, $tag) {$x[0] = $tag;return 0;});
    $caml_int32_bswap = $Func(
      function($x) use ($left_shift_32,$unsigned_right_shift_32) {
        return $left_shift_32($x & 255, 24) |
          $left_shift_32($x & 65280, 8) |
          $unsigned_right_shift_32($x & 16711680, 8) |
          $unsigned_right_shift_32($x & 4278190080, 24);
      }
    );
    $caml_spacetime_only_works_for_native_code = $Func(
      function() use ($String,$caml_failwith) {
        $caml_failwith(
          $String->new("Spacetime profiling only works for native code")
        );
      }
    );
    $win_startup = $Func(function() {});
    $caml_ml_seek_in_64 = $Func(
      function($chanid, $pos) use ($String,$caml_int64_to_float,$caml_ml_channels,$caml_raise_sys_error) {
        $chan = $caml_ml_channels[$chanid];
        if ($chan->refill != varray[]) {
          $caml_raise_sys_error($String->new("Illegal seek"));
        }
        $chan->offset = $caml_int64_to_float($pos);
        return 0;
      }
    );
    $caml_ba_set_3 = $Func(
      function($ba, $i0, $i1, $i2, $v) use ($ArrayLiteral) {
        return $ba->set($ArrayLiteral($i0, $i1, $i2), $v);
      }
    );
    $caml_js_instanceof = $Func(function($o, $c) {return instance_of($o, $c);}
    );
    $caml_hash_mix_float = $Func(
      function($h, $v0) use ($caml_hash_mix_int,$caml_int64_bits_of_float,$left_shift_32,$unsigned_right_shift_32) {
        $v = $caml_int64_bits_of_float($v0);
        $lo = $v[1] | $left_shift_32($v[2], 24);
        $hi = $unsigned_right_shift_32($v[2], 8) | $left_shift_32($v[3], 16);
        $h = $caml_hash_mix_int($h, $lo);
        $h = $caml_hash_mix_int($h, $hi);
        return $h;
      }
    );
    $caml_notequal = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) != 0);
      }
    );
    $caml_int64_shift_left = $Func(
      function($x, $s) use ($ArrayLiteral,$left_shift_32,$right_shift_32) {
        $s = $s & 63;
        if ($s == 0) {return $x;}
        if ($s < 24) {
          return $ArrayLiteral(
            255,
            $left_shift_32($x[1], $s) & 16777215,
            ($left_shift_32($x[2], $s) | $right_shift_32($x[1], 24 - $s)) & 16777215,
            ($left_shift_32($x[3], $s) | $right_shift_32($x[2], 24 - $s)) & 65535
          );
        }
        if ($s < 48) {
          return $ArrayLiteral(
            255,
            0,
            $left_shift_32($x[1], $s - 24) & 16777215,
            ($left_shift_32($x[2], $s - 24) | $right_shift_32($x[1], 48 - $s)) & 65535
          );
        }
        return $ArrayLiteral(255, 0, 0, $left_shift_32($x[1], $s - 48) & 65535
        );
      }
    );
    
    
    
    $caml_js_wrap_meth_callback = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $raw_array_cons,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback is not yet tested");
        return $Func(
          function() use (
            $caml_call_gen,
            $f,
            $joo_global_object,
            $raw_array_cons,
            $ArrayLiteral
          ) {
            return $caml_call_gen(
              $f,
              $raw_array_cons(
                $ArrayLiteral(\func_get_args()),
                $joo_global_object->context
              )
            );
          }
        );
      }
    );
    
    
    $caml_sys_const_int_size = $Func(function() {return 32;});
    $caml_blit_bigstring_to_string = $bigstring_blit_bigstring_bytes_stub;
    $caml_is_js = $Func(function() {return 1;});
    $caml_string_set64 = $Func(
      function($s, $i, $i64) use ($caml_bytes_set64) {
        return $caml_bytes_set64($s, $i, $i64);
      }
    );
    $caml_ba_dim_1 = $Func(function($ba) {return $ba->nth_dim(0);});
    $caml_js_meth_call = $Func(
      function($o, $f, $args) use ($caml_js_from_array) {
        return $o[$f->toString()]->apply($o, $caml_js_from_array($args));
      }
    );
    $caml_ba_map_file = $Func(
      function($vfd, $kind, $layout, $shared, $dims, $pos) use ($String,$caml_failwith) {
        $caml_failwith($String->new("caml_ba_map_file not implemented"));
      }
    );
    $caml_ba_map_file_bytecode = $Func(
      function($argv, $argn) use ($caml_ba_map_file) {
        return $caml_ba_map_file(
          $argv[0],
          $argv[1],
          $argv[2],
          $argv[3],
          $argv[4],
          $argv[5]
        );
      }
    );
    $unix_localtime = $Func(
      function($t) use ($ArrayLiteral,$Date,$Math) {
        $d = $Date->new($t * 1e3);
        $januaryfirst = $Date->new($d->getFullYear(), 0, 1);
        $doy = $Math->floor(($d->getTime() - $januaryfirst->getTime()) / 864e5
        );
        $jan = $Date->new($d->getFullYear(), 0, 1);
        $jul = $Date->new($d->getFullYear(), 6, 1);
        $stdTimezoneOffset = $Math->max(
          $jan->getTimezoneOffset(),
          $jul->getTimezoneOffset()
        );
        return $ArrayLiteral(
          0,
          $d->getSeconds(),
          $d->getMinutes(),
          $d->getHours(),
          $d->getDate(),
          $d->getMonth(),
          $d->getFullYear() - 1900,
          $d->getDay(),
          $doy,
          $d->getTimezoneOffset() < $stdTimezoneOffset | 0
        );
      }
    );
    $caml_weak_create = $Func(
      function($n) use ($ArrayLiteral,$String,$caml_ephe_key_offset,$caml_invalid_argument,$plus) {
        if ($n < 0) {$caml_invalid_argument($String->new("Weak.create"));}
        $x = $ArrayLiteral(251, $String->new("caml_ephe_list_head"));
        $x->length = $plus($caml_ephe_key_offset, $n);
        return $x;
      }
    );
    $caml_ephe_create = $caml_weak_create;
    $caml_js_to_byte_string = $Func(
      function($s) use ($caml_new_string) {return $caml_new_string($s);}
    );
    $caml_tanh_float = $Func(
      function($x) use ($Math,$plus) {
        $y = $Math->exp($x);$z = $Math->exp(- $x);
        return ($y - $z) / $plus($y, $z);
      }
    );
    
    
    
  $SyntaxError = $ObjectLiteral(darray[
     // Define to return a PHP exception subclass.
    "new" => function($payload) {
       return new \ErrorException('SyntaxError: ' .$payload->__php_str);
    }
  ]);
    
    
    $JSON = $joo_global_object->JSON;
    
    if (! $eqEqEq($typeof($JSON), $String->new("object"))) {$JSON = $ObjectLiteral((object)darray[]);}
    
    $Func(
      function() use ($ArrayLiteral,$Boolean,$Date,$Error,$Func,$JSON,$Number,$Object,$ObjectLiteral,$RegExp,$String,$SyntaxError,$eqEqEq,$eval,$isFinite,$joo_global_object,$plus,$typeof) {
        $str = new Ref();
        $String->new("use strict");
        $rx_one = $RegExp->new($String->new("^[\\],:{}\\s]*\$"));
        $rx_two = $RegExp->new(
          $String->new("\\\\(?:[\"\\\\\\/bfnrt]|u[0-9a-fA-F]{4})"),
          $String->new("g")
        );
        $rx_three = $RegExp->new(
          $String->new(
            "\"[^\"\\\\\\n\\r]*\"|true|false|null|-?\\d+(?:\\.\\d*)?(?:[eE][+\\-]?\\d+)?"
          ),
          $String->new("g")
        );
        $rx_four = $RegExp->new(
          $String->new("(?:^|:|,)(?:\\s*\\[)+"),
          $String->new("g")
        );
        $rx_escapable = $RegExp->new(
          $String->new(
            "[\\\\\\\"\\u0000-\\u001f\\u007f-\\u009f\\u00ad\\u0600-\\u0604\\u070f\\u17b4\\u17b5\\u200c-\\u200f\\u2028-\\u202f\\u2060-\\u206f\\ufeff\\ufff0-\\uffff]"
          ),
          $String->new("g")
        );
        $rx_dangerous = $RegExp->new(
          $String->new(
            "[\\u0000\\u00ad\\u0600-\\u0604\\u070f\\u17b4\\u17b5\\u200c-\\u200f\\u2028-\\u202f\\u2060-\\u206f\\ufeff\\ufff0-\\uffff]"
          ),
          $String->new("g")
        );
        $f = $Func(
          function($n) use ($String,$plus) {
            return $n < 10 ? $plus($String->new("0"), $n) : ($n);
          }
        );
        $this_value = $Func(
          function() use ($joo_global_object) {
            return $joo_global_object->context->valueOf();
          }
        );
        if (
          !
          $eqEqEq($typeof($Date->prototype->toJSON), $String->new("function"))
        ) {
          $Date->prototype->toJSON =
            $Func(
              function() use ($String,$f,$isFinite,$joo_global_object,$plus) {
                return $isFinite($joo_global_object->context->valueOf())
                  ? $plus(
                   $plus(
                     $plus(
                       $plus(
                         $plus(
                           $plus(
                             $plus(
                               $plus(
                                 $plus(
                                   $plus(
                                     $plus(
                                       $joo_global_object->context->getUTCFullYear(),
                                       $String->new("-")
                                     ),
                                     $f($joo_global_object->context->getUTCMonth() + 1)
                                   ),
                                   $String->new("-")
                                 ),
                                 $f($joo_global_object->context->getUTCDate())
                               ),
                               $String->new("T")
                             ),
                             $f($joo_global_object->context->getUTCHours())
                           ),
                           $String->new(":")
                         ),
                         $f($joo_global_object->context->getUTCMinutes())
                       ),
                       $String->new(":")
                     ),
                     $f($joo_global_object->context->getUTCSeconds())
                   ),
                   $String->new("Z")
                 )
                  : (varray[]);
              }
            );
          $Boolean->prototype->toJSON = $this_value;
          $Number->prototype->toJSON = $this_value;
          $String->prototype->toJSON = $this_value;
        }
        $gap = NULL;$indent = NULL;$meta = NULL;$rep = NULL;
        $quote = $Func(
          function($string) use ($Func,$String,$eqEqEq,$meta,$plus,$rx_escapable,$typeof) {
            $rx_escapable->lastIndex = 0;
            return $rx_escapable->test($string)
              ? $plus(
               $plus(
                 $String->new("\""),
                 $string->replace(
                   $rx_escapable,
                   $Func(
                     function($a) use ($String,$eqEqEq,$meta,$plus,$typeof) {
                       $c = $meta[$a];
                       return $eqEqEq($typeof($c), $String->new("string"))
                         ? $c
                         : ($plus(
                          $String->new("\\u"),
                          $plus($String->new("0000"), $a->charCodeAt(0)->toString(16))->slice(- 4)
                        ));
                     }
                   )
                 )
               ),
               $String->new("\"")
             )
              : ($plus($plus($String->new("\""), $string), $String->new("\"")));
          }
        );
        $_ = $str->contents =
          $Func(
            function($key, $holder) use ($ArrayLiteral,$Object,$String,$eqEqEq,$gap,$indent,$isFinite,$plus,$quote,$rep,$str,$typeof) {
              $i = NULL;
              $k = NULL;
              $v = NULL;
              $length = NULL;
              $mind = $gap;
              $partial = NULL;
              $value = $holder[$key];
              if (
                $value && $eqEqEq($typeof($value), $String->new("object")) &&
                  $eqEqEq($typeof($value->toJSON), $String->new("function"))
              ) {$value = $value->toJSON($key);}
              if ($eqEqEq($typeof($rep), $String->new("function"))) {$value = $rep->call($holder, $key, $value);}
              switch($typeof($value)) {
                // FALLTHROUGH
                case $String->new("string"):return $quote($value);
                // FALLTHROUGH
                case $String->new("number"):
                  return $isFinite($value)
                    ? $String($value)
                    : ($String->new("null"));
                // FALLTHROUGH
                case $String->new("boolean"):
                // FALLTHROUGH
                case $String->new("null"):return $String($value);
                // FALLTHROUGH
                case $String->new("object"):
                  if (! $value) {return $String->new("null");}
                  $gap = $plus($gap, $indent);
                  $partial = $ArrayLiteral();
                  if (
                    $eqEqEq(
                      $Object->prototype->toString->apply($value),
                      $String->new("[object Array]")
                    )
                  ) {
                    $length = $value->length;
                    for ($i = 0;$i < $length;$i += 1) {
                      $partial[$i] =
                        $str->contents($i, $value) || $String->new("null");
                    }
                    $v =
                      $partial->length === 0
                        ? $String->new("[]")
                        : ($gap
                         ? $plus(
                          $plus(
                            $plus(
                              $plus(
                                $plus($String->new("[\n"), $gap),
                                $partial->join($plus($String->new(",\n"), $gap))
                              ),
                              $String->new("\n")
                            ),
                            $mind
                          ),
                          $String->new("]")
                        )
                         : ($plus(
                          $plus($String->new("["), $partial->join($String->new(","))),
                          $String->new("]")
                        )));
                    $gap = $mind;
                    return $v;
                  }
                  if ($rep && $eqEqEq($typeof($rep), $String->new("object"))) {
                    $length = $rep->length;
                    for ($i = 0;$i < $length;$i += 1) {
                      if ($eqEqEq($typeof($rep[$i]), $String->new("string"))) {
                        $k = $rep[$i];
                        $v = $str->contents($k, $value);
                        if ($v) {
                          $partial->push(
                            $plus(
                              $plus(
                                $quote($k),
                                $gap ? $String->new(": ") : ($String->new(":"))
                              ),
                              $v
                            )
                          );
                        }
                      }
                    }
                  }
                  else {
                    foreach($value->__all_enumerable_keys() as $k=> $____) {
                      if ($Object->prototype->hasOwnProperty->call($value, $k)) {
                        $v = $str->contents($k, $value);
                        if ($v) {
                          $partial->push(
                            $plus(
                              $plus(
                                $quote($k),
                                $gap ? $String->new(": ") : ($String->new(":"))
                              ),
                              $v
                            )
                          );
                        }
                      }
                    }
                  }
                  $v =
                    $partial->length === 0
                      ? $String->new("{}")
                      : ($gap
                       ? $plus(
                        $plus(
                          $plus(
                            $plus(
                              $plus($String->new("{\n"), $gap),
                              $partial->join($plus($String->new(",\n"), $gap))
                            ),
                            $String->new("\n")
                          ),
                          $mind
                        ),
                        $String->new("}")
                      )
                       : ($plus(
                        $plus($String->new("{"), $partial->join($String->new(","))),
                        $String->new("}")
                      )));
                  $gap = $mind;
                  return $v;
                }
            }
          );
        if (! $eqEqEq($typeof($JSON->stringify), $String->new("function"))) {
          $meta =
            $ObjectLiteral(
              (object)darray[
               "\b"=>$String->new("\\b"),
               "\t"=>$String->new("\\t"),
               "\n"=>$String->new("\\n"),
               "\f"=>$String->new("\\f"),
               "\r"=>$String->new("\\r"),
               "\""=>$String->new("\\\""),
               "\\"=>$String->new("\\\\")]
            );
          $JSON->stringify =
            $Func(
              function($value, $replacer, $space) use ($Error,$ObjectLiteral,$String,$eqEqEq,$gap,$indent,$plus,$rep,$str,$typeof) {
                $i = NULL;
                $gap = $String->new("");
                $indent = $String->new("");
                if ($eqEqEq($typeof($space), $String->new("number"))) {
                  for ($i = 0;$i < $space;$i += 1) {
                    $indent = $plus($indent, $String->new(" "));
                  }
                }
                else {
                  if ($eqEqEq($typeof($space), $String->new("string"))) {$indent = $space;}
                }
                $rep = $replacer;
                if (
                  $replacer &&
                    !
                    $eqEqEq($typeof($replacer), $String->new("function")) &&
                    (!
                     $eqEqEq($typeof($replacer), $String->new("object")) ||
                       !
                       $eqEqEq($typeof($replacer->length), $String->new("number")))
                ) {throw $Error->new($String->new("JSON.stringify"));}
                return $str->contents(
                  $String->new(""),
                  $ObjectLiteral((object)darray[""=>$value])
                );
              }
            );
        }
        if (! $eqEqEq($typeof($JSON->parse), $String->new("function"))) {
          $JSON->parse =
            $Func(
              function($text, $reviver) use ($Func,$Object,$ObjectLiteral,$String,$SyntaxError,$eqEqEq,$eval,$plus,$rx_dangerous,$rx_four,$rx_one,$rx_three,$rx_two,$typeof) {
                $walk = new Ref();
                $j = NULL;
                $_ = $walk->contents =
                  $Func(
                    function($holder, $key) use ($Object,$String,$eqEqEq,$reviver,$typeof,$walk) {
                      $k = NULL;$v = NULL;$value = $holder[$key];
                      if (
                        $value && $eqEqEq($typeof($value), $String->new("object"))
                      ) {
                        foreach($value->__all_enumerable_keys() as $k=> $____) {
                          if ($Object->prototype->hasOwnProperty->call($value, $k)) {
                            $v = $walk->contents($value, $k);
                            if ($v !== NULL) {$value[$k] = $v;
                            }
                            else {unset($value[$k]);}
                          }
                        }
                      }
                      return $reviver->call($holder, $key, $value);
                    }
                  );
                $text = $String($text);
                $rx_dangerous->lastIndex = 0;
                if ($rx_dangerous->test($text)) {
                  $text =
                    $text->replace(
                      $rx_dangerous,
                      $Func(
                        function($a) use ($String,$plus) {
                          return $plus(
                            $String->new("\\u"),
                            $plus($String->new("0000"), $a->charCodeAt(0)->toString(16))->slice(- 4)
                          );
                        }
                      )
                    );
                }
                if (
                  $rx_one->test(
                    $text->replace($rx_two, $String->new("@"))->replace($rx_three, $String->new("]"))->replace(
                      $rx_four,
                      $String->new("")
                    )
                  )
                ) {
                  $j =
                    $eval(
                      $plus($plus($String->new("("), $text), $String->new(")"))
                    );
                  return $eqEqEq($typeof($reviver), $String->new("function"))
                    ? $walk->contents(
                     $ObjectLiteral((object)darray[""=>$j]),
                     $String->new("")
                   )
                    : ($j);
                }
                throw $SyntaxError->new($String->new("JSON.parse"));
              }
            );
        }
      }
    )();
    
    $caml_json = $Func(function() use ($JSON) {return $JSON;});
    $caml_trampoline = $Func(
      function($res) {
        $c = 1;
        while($res && $res->joo_tramp) {
           $res = $res->joo_tramp->apply(varray[], $res->joo_args);
           $c++;
         }
        return $res;
      }
    );
    $unix_mktime = $Func(
      function($tm) use ($ArrayLiteral,$Date,$Math,$unix_localtime) {
        $d = $Date->new($tm[6] + 1900, $tm[5], $tm[4], $tm[3], $tm[2], $tm[1]);
        $t = $Math->floor($d->getTime() / 1e3);
        $tm2 = $unix_localtime($t);
        return $ArrayLiteral(0, $t, $tm2);
      }
    );
    $caml_bytes_get64 = $Func(
      function($s, $i) use ($Array,$caml_int64_of_bytes,$caml_string_bound_error,$caml_string_unsafe_get,$plus,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 7) {$caml_string_bound_error();}
        $a = $Array->new(8);
        for ($j = 0;$j < 8;$j++) {
          $a[7 - $j] = $caml_string_unsafe_get($s, $plus($i, $j));
        }
        return $caml_int64_of_bytes($a);
      }
    );
    $caml_weak_set = $Func(
      function($x, $i, $v) use ($String,$caml_ephe_key_offset,$caml_invalid_argument,$plus) {
        if ($i < 0 || $plus($caml_ephe_key_offset, $i) >= $x->length) {$caml_invalid_argument($String->new("Weak.set"));}
        $x[$plus($caml_ephe_key_offset, $i)] = $v;
        return 0;
      }
    );
    $caml_sys_remove = $Func(
      function($name) use ($caml_raise_no_such_file,$resolve_fs_device) {
        $root = $resolve_fs_device($name);
        $ok = $root->device->unlink($root->rest);
        if ($ok == 0) {$caml_raise_no_such_file($name);}
        return 0;
      }
    );
    $caml_unmount = $Func(
      function($name) use ($String,$caml_make_path,$eqEq,$jsoo_mount_point,$plus) {
        $path = $caml_make_path($name);
        $name = $plus($path->join($String->new("/")), $String->new("/"));
        $idx = - 1;
        for ($i = 0;$i < $jsoo_mount_point->length;$i++) if ($eqEq($jsoo_mount_point[$i]->path, $name)) {$idx = $i;}
        if ($idx > - 1) {$jsoo_mount_point->splice($idx, 1);}
        return 0;
      }
    );
    $caml_string_get32 = $Func(
      function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$left_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 3) {$caml_string_bound_error();}
        $b1 = $caml_string_unsafe_get($s, $i);
        $b2 = $caml_string_unsafe_get($s, $i + 1);
        $b3 = $caml_string_unsafe_get($s, $i + 2);
        $b4 = $caml_string_unsafe_get($s, $i + 3);
        return $left_shift_32($b4, 24) |
          $left_shift_32($b3, 16) |
          $left_shift_32($b2, 8) | $b1;
      }
    );
    $caml_hypot_float = $Func(
      function($x, $y) use ($Math) {
        $x = $Math->abs($x);$y = $Math->abs($y);
        $a = $Math->max($x, $y);$b = $Math->min($x, $y) / ($a ? $a : (1));
        return $a * $Math->sqrt(1 + $b * $b);
      }
    );
    $caml_int32_float_of_bits = $Func(
      function($x) use ($joo_global_object) {
        $int32a = $joo_global_object->Int32Array->new(1);
        $int32a[0] = $x;
        $float32a = $joo_global_object->Float32Array->new($int32a->buffer);
        return $float32a[0];
      }
    );
    $caml_ml_pos_in_64 = $Func(
      function($chanid) use ($caml_int64_of_float,$caml_ml_channels) {
        return $caml_int64_of_float($caml_ml_channels[$chanid]->offset);
      }
    );
    $caml_js_call = $Func(
      function($f, $o, $args) use ($caml_js_from_array) {
        return $f->apply($o, $caml_js_from_array($args));
      }
    );
    $caml_js_property_get = $Func(
      function($o, $s) use ($String,$js_print_stderr) {
        $js_print_stderr(
          $String->new(
            "caml_js_property_get: This should never happen - all accesses should have been optimized by now."
          )
        );
        return $o[$s];
      }
    );
    $caml_register_channel_for_spacetime = $Func(
      function($_channel) {return 0;}
    );
    $caml_string_set = $Func(
      function($s, $i, $c) use ($caml_string_bound_error,$caml_string_unsafe_set,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
        return $caml_string_unsafe_set($s, $i, $c);
      }
    );
    $caml_sys_const_max_wosize = $Func(function() {return 2147483647 / 4 | 0;}
    );
    $caml_ephe_unset_key = $Func(
      function($x, $i) use ($caml_weak_set) {
        return $caml_weak_set($x, $i, 0);
      }
    );
    $caml_ml_pos_out = $Func(
      function($chanid) use ($caml_ml_channels) {
        return $caml_ml_channels[$chanid]->offset;
      }
    );
    
    
    
$unsigned_right_shift_32=$joo_global_object->unsigned_right_shift_32;
    
    
    $caml_spacetime_enabled = $Func(function($_unit) {return 0;});
    $caml_string_equal = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes,$eqEq,$eqEqEq) {
        if ($eqEqEq($s1, $s2)) {return 1;}
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $eqEq($s1->c, $s2->c) ? 1 : (0);
      }
    );
    $caml_bytes_notequal = $Func(
      function($s1, $s2) use ($caml_string_equal) {
        return 1 - $caml_string_equal($s1, $s2);
      }
    );
    $caml_js_object = $Func(
      function($a) use ($ObjectLiteral) {
        $o = $ObjectLiteral((object)darray[]);
        for ($i = 1;$i < $a->length;$i++) {
          $p = $a[$i];
          $o[$p[1]->toString()] = $p[2];
        }
        return $o;
      }
    );
    $caml_runtime_parameters = $Func(
      function($_unit) use ($String,$caml_new_string) {
        return $caml_new_string($String->new(""));
      }
    );
    $caml_ba_create = $Func(
      function($kind, $layout, $dims_ml) use ($String,$caml_ba_create_from,$caml_ba_get_size,$caml_ba_init_views,$caml_ba_views,$caml_invalid_argument,$caml_js_from_array) {
        $caml_ba_init_views();
        $dims = $caml_js_from_array($dims_ml);
        $size = $caml_ba_get_size($dims);
        $view = $caml_ba_views[0][$kind];
        if (! $view) {
          $caml_invalid_argument(
            $String->new("Bigarray.create: unsupported kind")
          );
        }
        $data = $view->new($size);
        $data_type = $caml_ba_views[1][$kind];
        $data2 = varray[];
        if ($data_type != 0) {$data2 = $view->new($size);}
        return $caml_ba_create_from->contents(
          $data,
          $data2,
          $data_type,
          $kind,
          $layout,
          $dims
        );
      }
    );
    $caml_array_blit = $Func(
      function($a1, $i1, $a2, $i2, $len) use ($plus) {
        if ($i2 <= $i1) {
          for ($j = 1;$j <= $len;$j++) $a2[$plus($i2, $j)] =
            $a1[$plus($i1, $j)];
        }
        else {
          for ($j = $len;$j >= 1;$j--) $a2[$plus($i2, $j)] =
            $a1[$plus($i1, $j)];
        }
        ;
        return 0;
      }
    );
    $caml_weak_blit = $Func(
      function($a1, $i1, $a2, $i2, $len) use ($caml_array_blit,$caml_ephe_key_offset,$plus) {
        $caml_array_blit(
          $a1,
          $plus($caml_ephe_key_offset, $i1) - 1,
          $a2,
          $plus($caml_ephe_key_offset, $i2) - 1,
          $len
        );
        return 0;
      }
    );
    $caml_bytes_lessthan = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c < $s2->c ? 1 : (0);
      }
    );
    $caml_gc_quick_stat = $Func(
      function() use ($ArrayLiteral) {
        return $ArrayLiteral(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        );
      }
    );
    $caml_ml_input_int = $Func(
      function($chanid) use ($caml_ml_channels,$caml_ml_refill_input,$caml_raise_end_of_file,$left_shift_32,$plus) {
        $chan = $caml_ml_channels[$chanid];
        $file = $chan->file;
        while($chan->offset + 3 >= $file->length()) {
           $l = $caml_ml_refill_input($chan);
           if ($l == 0) {$caml_raise_end_of_file();}
         }
        $o = $chan->offset;
        $r = $left_shift_32($file->read_one($o), 24) |
          $left_shift_32($file->read_one($o + 1), 16) |
          $left_shift_32($file->read_one($o + 2), 8) | $file->read_one($o + 3);
        $chan->offset = $plus($chan->offset, 4);
        return $r;
      }
    );
    $caml_bswap16 = $Func(
      function($x) use ($left_shift_32,$right_shift_32) {
        return $left_shift_32($x & 255, 8) | $right_shift_32($x & 65280, 8);
      }
    );
    $caml_ml_set_binary_mode = $Func(
      function($chanid, $mode) use ($caml_global_data,$caml_ml_channels) {
        $chan = $caml_ml_channels[$chanid];
        $data = $caml_global_data->fds[$chan->fd];
        $data->flags->text = ! $mode;
        $data->flags->binary = $mode;
        return 0;
      }
    );
    $caml_final_register = $Func(function() {return 0;});
    $caml_sys_getcwd = $Func(
      function() use ($caml_current_dir,$caml_new_string) {
        return $caml_new_string($caml_current_dir);
      }
    );
    $caml_float_of_string = $Func(
      function($s) use ($Infinity,$Math,$RegExp,$String,$caml_failwith,$caml_jsbytes_of_string,$eqEqEq,$parseInt,$plus) {
        $res = NULL;
        $s = $caml_jsbytes_of_string($s);
        $res = + $s;
        if ($s->length > 0 && $eqEqEq($res, $res)) {return $res;}
        $s =
          $s->replace(
            $RegExp->new($String->new("_"), $String->new("g")),
            $String->new("")
          );
        $res = + $s;
        if (
          $s->length > 0 &&
            $eqEqEq($res, $res) ||
            $RegExp->new($String->new("^[+-]?nan\$"), $String->new("i"))->test($s)
        ) {return $res;}
        $m = $RegExp->new(
          $String->new("^ *([+-]?)0x([0-9a-f]+)\\.?([0-9a-f]*)p([+-]?[0-9]+)"),
          $String->new("i")
        )->exec($s);
        if ($m) {
          $m3 = $m[3]->replace(
            $RegExp->new($String->new("0+\$")),
            $String->new("")
          );
          $mantissa = $parseInt($plus($plus($m[1], $m[2]), $m3), 16);
          $exponent = ($m[4] | 0) - 4 * $m3->length;
          $res = $mantissa * $Math->pow(2, $exponent);
          return $res;
        }
        if (
          $RegExp->new($String->new("^\\+?inf(inity)?\$"), $String->new("i"))->test($s)
        ) {return $Infinity;}
        if (
          $RegExp->new($String->new("^-inf(inity)?\$"), $String->new("i"))->test($s)
        ) {return - $Infinity;}
        $caml_failwith($String->new("float_of_string"));
      }
    );
    $caml_string_get16 = $Func(
      function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$left_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 1) {$caml_string_bound_error();}
        $b1 = $caml_string_unsafe_get($s, $i);
        $b2 = $caml_string_unsafe_get($s, $i + 1);
        return $left_shift_32($b2, 8) | $b1;
      }
    );
    $caml_sys_const_big_endian = $Func(function() {return 0;});
    $caml_ephe_unset_data = $Func(
      function($x, $data) use ($caml_ephe_data_offset) {
        $x[$caml_ephe_data_offset] = NULL;
        return 0;
      }
    );
    $caml_output_value_to_string = $Func(
      function($v, $_fl) use ($caml_output_val,$caml_string_of_array) {
        return $caml_string_of_array($caml_output_val($v));
      }
    );
    $caml_output_value = $Func(
      function($chanid, $v, $_flags) use ($caml_ml_output,$caml_ml_string_length,$caml_output_value_to_string) {
        $s = $caml_output_value_to_string($v);
        $caml_ml_output($chanid, $s, 0, $caml_ml_string_length($s));
        return 0;
      }
    );
    $caml_js_dict_get = $Func(
      function($o, $f) use ($String,$js_print_stderr) {
        $js_print_stderr(
          $String->new(
            "caml_js_dict_get: This should never happen - all accesses should have been optimized by now."
          )
        );
        return $o[$f];
      }
    );
    $caml_sys_system_command = $Func(
      function($cmd) use ($String,$eqEq,$joo_global_object,$require,$typeof) {
        $cmd = $cmd->toString();
        $joo_global_object->console->log($cmd);
        if (
          !
          $eqEq($typeof($require), $String->new("undefined")) && $require($String->new("child_process")) &&
            $require($String->new("child_process"))->execSync
        ) {
          try {
            $require($String->new("child_process"))->execSync($cmd);
            return 0;
          }
          catch(\Throwable $e) {return 1;}
        }
        else {return 127;}
      }
    );
    $caml_ba_get_3 = $Func(
      function($ba, $i0, $i1, $i2) use ($ArrayLiteral) {
        return $ba->get($ArrayLiteral($i0, $i1, $i2));
      }
    );
    $caml_ephe_blit_key = $caml_weak_blit;
    $caml_js_error_of_exception = $Func(
      function($exn) {
        if ($exn->stack_trace) {return $exn->stack_trace;}
        return varray[];
      }
    );
    
    
    
  $is_int=$joo_global_object->is_int;
    
    
    $caml_check_bound = $Func(
      function($array, $index) use ($caml_array_bound_error,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($index, 0) >= $array->length - 1) {$caml_array_bound_error();}
        return $array;
      }
    );
    $caml_bytes_of_string = $Func(function($s) {return $s;});
    $caml_hash_mix_int64 = $Func(
      function($h, $v) use ($caml_hash_mix_int,$left_shift_32,$unsigned_right_shift_32) {
        $lo = $v[1] | $left_shift_32($v[2], 24);
        $hi = $unsigned_right_shift_32($v[2], 8) | $left_shift_32($v[3], 16);
        $h = $caml_hash_mix_int($h, $lo);
        $h = $caml_hash_mix_int($h, $hi);
        return $h;
      }
    );
    $caml_hash_mix_string = $Func(
      function($h, $v) use ($caml_convert_string_to_bytes,$caml_hash_mix_string_arr,$caml_hash_mix_string_str) {
        switch($v->t & 6) {
          // FALLTHROUGH
          default:
            $caml_convert_string_to_bytes($v);
          // FALLTHROUGH
          case 0:
            $h = $caml_hash_mix_string_str($h, $v->c);
            break;
          // FALLTHROUGH
          case 2:
            $h = $caml_hash_mix_string_arr($h, $v->c);
          }
        return $h;
      }
    );
    $HASH_QUEUE_SIZE = 256;
    $caml_hash = $Func(
      function($count, $limit, $seed, $obj) use ($Array,$ArrayLiteral,$HASH_QUEUE_SIZE,$MlBytes,$String,$caml_hash_mix_final,$caml_hash_mix_float,$caml_hash_mix_int,$caml_hash_mix_int64,$caml_hash_mix_string,$eqEqEq,$left_shift_32,$plus,$typeof) {
        $queue = NULL;
        $rd = NULL;
        $wr = NULL;
        $sz = NULL;
        $num = NULL;
        $h = NULL;
        $v = NULL;
        $i = NULL;
        $len = NULL;
        $sz = $limit;
        if ($sz < 0 || $sz > $HASH_QUEUE_SIZE) {$sz = $HASH_QUEUE_SIZE;}
        $num = $count;
        $h = $seed;
        $queue = $ArrayLiteral($obj);
        $rd = 0;
        $wr = 1;
        while($rd < $wr && $num > 0) {
           $v = $queue[$rd++];
           if (instance_of($v, $Array) && $eqEqEq($v[0], $v[0] | 0)) {
             switch($v[0]) {
               // FALLTHROUGH
               case 248:
                 $h = $caml_hash_mix_int($h, $v[2]);
                 $num--;
                 break;
               // FALLTHROUGH
               case 250:
                 $queue[--$rd] = $v[1];
                 break;
               // FALLTHROUGH
               case 255:
                 $h = $caml_hash_mix_int64($h, $v);
                 $num--;
                 break;
               // FALLTHROUGH
               default:
                 $tag = $left_shift_32($v->length - 1, 10) | $v[0];
                 $h = $caml_hash_mix_int($h, $tag);
                 for (
                   ($i = 1) || true ? $len = $v->length : ($len = $v->length);
                   $i < $len;
                   $i++
                 ) {if ($wr >= $sz) {break;}$queue[$wr++] = $v[$i];}
                 break;
               }
           }
           else {
             if (instance_of($v, $MlBytes)) {
               $h = $caml_hash_mix_string($h, $v);
               $num--;
             }
             else {
               if ($eqEqEq($v, $v | 0)) {
                 $h = $caml_hash_mix_int($h, $plus($v, $v) + 1);
                 $num--;
               }
               else {
                 if ($eqEqEq($v, + $v)) {
                   $h = $caml_hash_mix_float($h, $v);
                   $num--;
                 }
                 else {
                   if (
                     $v && $v->hash &&
                       $eqEqEq($typeof($v->hash), $String->new("function"))
                   ) {$h = $caml_hash_mix_int($h, $v->hash());}
                 }
               }
             }
           }
         }
        $h = $caml_hash_mix_final($h);
        return $h & 1073741823;
      }
    );
    $bigstring_memcmp_stub = $Func(
      function($v_s1, $v_s1_pos, $v_s2, $v_s2_pos, $v_len) use ($caml_ba_get_1,$plus) {
        for ($i = 0;$i < $v_len;$i++) {
          $a = $caml_ba_get_1($v_s1, $plus($v_s1_pos, $i));
          $b = $caml_ba_get_1($v_s2, $plus($v_s2_pos, $i));
          if ($a < $b) {return - 1;}
          if ($a > $b) {return 1;}
        }
        return 0;
      }
    );
    $caml_obj_tag = $Func(
      function($x) use ($Array,$MlBytes) {
        return instance_of($x, $Array)
          ? $x[0]
          : (instance_of($x, $MlBytes) ? 252 : (1e3));
      }
    );
    $caml_js_export_var = $Func(
      function() use ($String,$eqEqEq,$joo_global_object,$module,$typeof) {
        if (
          !
          $eqEqEq($typeof($module), $String->new("undefined")) && $module &&
            $module->exports
        ) {return $module->exports;}
        else {return $joo_global_object;}
      }
    );
    $caml_frexp_float = $Func(
      function($x) use ($ArrayLiteral,$Math,$isFinite,$jsoo_floor_log2) {
        if ($x == 0 || ! $isFinite($x)) {return $ArrayLiteral(0, $x, 0);}
        $neg = $x < 0;
        if ($neg) {$x = - $x;}
        $exp = $jsoo_floor_log2($x) + 1;
        $x *= $Math->pow(2, - $exp);
        if ($x < 0.5) {$x *= 2;$exp -= 1;}
        if ($neg) {$x = - $x;}
        return $ArrayLiteral(0, $x, $exp);
      }
    );
    $caml_bytes_get32 = $Func(
      function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$left_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 3) {$caml_string_bound_error();}
        $b1 = $caml_string_unsafe_get($s, $i);
        $b2 = $caml_string_unsafe_get($s, $i + 1);
        $b3 = $caml_string_unsafe_get($s, $i + 2);
        $b4 = $caml_string_unsafe_get($s, $i + 3);
        return $left_shift_32($b4, 24) |
          $left_shift_32($b3, 16) |
          $left_shift_32($b2, 8) | $b1;
      }
    );
    $bigstring_blit_bytes_bigstring_stub = $Func(
      function($v_str, $v_src_pos, $v_bstr, $v_dst_pos, $v_len) use ($caml_ba_set_1,$caml_bytes_get,$plus) {
        for ($i = 0;$i < $v_len;$i++) $caml_ba_set_1(
          $v_bstr,
          $plus($v_dst_pos, $i),
          $caml_bytes_get($v_str, $plus($v_src_pos, $i))
        );
        return 0;
      }
    );
    $caml_copysign_float = $Func(
      function($x, $y) use ($Math) {
        if ($y == 0) {$y = 1 / $y;}
        $x = $Math->abs($x);
        return $y < 0 ? - $x : ($x);
      }
    );
    $caml_ba_set_generic = $Func(
      function($ba, $index, $v) use ($caml_js_from_array) {
        return $ba->set($caml_js_from_array($index), $v);
      }
    );
    $caml_ephe_set_key = $Func(
      function($x, $i, $v) use ($ArrayLiteral,$caml_weak_set) {
        return $caml_weak_set($x, $i, $ArrayLiteral(0, $v));
      }
    );
    $caml_ml_pos_out_64 = $Func(
      function($chanid) use ($caml_int64_of_float,$caml_ml_channels) {
        return $caml_int64_of_float($caml_ml_channels[$chanid]->offset);
      }
    );
    $caml_string_get64 = $Func(
      function($s, $i) use ($Array,$caml_int64_of_bytes,$caml_string_bound_error,$caml_string_unsafe_get,$plus,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 7) {$caml_string_bound_error();}
        $a = $Array->new(8);
        for ($j = 0;$j < 8;$j++) {
          $a[7 - $j] = $caml_string_unsafe_get($s, $plus($i, $j));
        }
        return $caml_int64_of_bytes($a);
      }
    );
    $caml_string_lessequal = $Func(
      function($s1, $s2) use ($caml_convert_string_to_bytes) {
        $s1->t & 6 && $caml_convert_string_to_bytes($s1);
        $s2->t & 6 && $caml_convert_string_to_bytes($s2);
        return $s1->c <= $s2->c ? 1 : (0);
      }
    );
    $caml_string_greaterequal = $Func(
      function($s1, $s2) use ($caml_string_lessequal) {
        return $caml_string_lessequal($s2, $s1);
      }
    );
    $caml_ml_pos_in = $Func(
      function($chanid) use ($caml_ml_channels) {
        return $caml_ml_channels[$chanid]->offset;
      }
    );
    $caml_int64_and = $Func(
      function($x, $y) use ($ArrayLiteral) {
        return $ArrayLiteral(255, $x[1] & $y[1], $x[2] & $y[2], $x[3] & $y[3]);
      }
    );
    $caml_sys_const_word_size = $Func(function() {return 32;});
    $caml_set_static_env = $Func(
      function($k, $v) use ($ObjectLiteral,$joo_global_object) {
        if (! $joo_global_object->jsoo_static_env) {
          $joo_global_object->jsoo_static_env =
            $ObjectLiteral((object)darray[]);
        }
        $joo_global_object->jsoo_static_env[$k] = $v;
        return 0;
      }
    );
    $caml_ba_change_layout = $Func(
      function($ba, $layout) use ($ArrayLiteral,$caml_ba_create_from,$eqEq) {
        if ($eqEq($ba->layout, $layout)) {return $ba;}
        $dims = $ArrayLiteral();
        for ($i = 0;$i < $ba->num_dims;$i++) $dims[$i] = $ba->nth_dim($i);
        return $caml_ba_create_from->contents(
          $ba->data,
          $ba->data2,
          $ba->data_type,
          $ba->kind,
          $layout,
          $dims
        );
      }
    );
    
    
    
$caml_wrap_thrown_exception_traceless = $caml_wrap_thrown_exception;
    
    
    $caml_input_value_from_bytes = $Func(
      function($s, $ofs) use ($MlBytesReader,$String,$caml_input_value_from_reader,$eqEq,$typeof) {
        $reader = $MlBytesReader->new(
          $s,
          $eqEq($typeof($ofs), $String->new("number")) ? $ofs : ($ofs[0])
        );
        return $caml_input_value_from_reader($reader, $ofs);
      }
    );
    $caml_js_new = $Func(
      function($c, $a) use ($Func,$caml_js_from_array,$joo_global_object) {
        switch($a->length) {
          // FALLTHROUGH
          case 1:
            return $c->new();
          // FALLTHROUGH
          case 2:
            return $c->new($a[1]);
          // FALLTHROUGH
          case 3:
            return $c->new($a[1], $a[2]);
          // FALLTHROUGH
          case 4:
            return $c->new($a[1], $a[2], $a[3]);
          // FALLTHROUGH
          case 5:
            return $c->new($a[1], $a[2], $a[3], $a[4]);
          // FALLTHROUGH
          case 6:
            return $c->new($a[1], $a[2], $a[3], $a[4], $a[5]);
          // FALLTHROUGH
          case 7:
            return $c->new($a[1], $a[2], $a[3], $a[4], $a[5], $a[6]);
          // FALLTHROUGH
          case 8:
            return $c->new($a[1], $a[2], $a[3], $a[4], $a[5], $a[6], $a[7]);
          }
        $F = $Func(
          function() use ($a,$c,$caml_js_from_array,$joo_global_object) {
            return $c->apply(
              $joo_global_object->context,
              $caml_js_from_array($a)
            );
          }
        );
        $F->prototype = $c->prototype;
        return $F->new();
      }
    );
    
    
    
$left_shift_32=$joo_global_object->left_shift_32;
    
    
    $caml_format_int = $Func(
      function($fmt, $i) use ($String,$caml_finish_formatting,$caml_jsbytes_of_string,$caml_new_string,$caml_parse_format,$caml_str_repeat,$eqEq,$plus,$unsigned_right_shift_32) {
        if ($eqEq($caml_jsbytes_of_string($fmt), $String->new("%d"))) {return $caml_new_string($plus($String->new(""), $i));}
        $f = $caml_parse_format($fmt);
        if ($i < 0) {
          if ($f->signedconv) {
            $f->sign = - 1;
            $i = - $i;
          }
          else {$i = $unsigned_right_shift_32($i, 0);}
        }
        $s = $i->toString($f->base);
        if ($f->prec >= 0) {
          $f->filler = $String->new(" ");
          $n = $f->prec - $s->length;
          if ($n > 0) {
            $s = $plus($caml_str_repeat($n, $String->new("0")), $s);
          }
        }
        return $caml_finish_formatting($f, $s);
      }
    );
    $bigstring_alloc = $Func(
      function($_, $size) use ($ArrayLiteral,$caml_ba_create) {
        return $caml_ba_create(12, 0, $ArrayLiteral(0, $size));
      }
    );
    $caml_js_from_string = $Func(function($s) {return $s->toString();});
    $caml_obj_truncate = $Func(
      function($x, $s) use ($String,$caml_invalid_argument,$eqEq) {
        if ($s <= 0 || $s + 1 > $x->length) {
          $caml_invalid_argument($String->new("Obj.truncate"));
        }
        if (! $eqEq($x->length, $s + 1)) {$x->length = $s + 1;}
        return 0;
      }
    );
    $caml_ba_sub = $Func(
      function($ba, $ofs, $len) {return $ba->sub($ofs, $len);}
    );
    $caml_gc_full_major = $Func(function() {return 0;});
    $caml_int64_is_minus_one = $Func(
      function($x) {return $x[3] == 65535 && ($x[1] & $x[2]) == 16777215;}
    );
    $caml_bytes_set32 = $Func(
      function($s, $i, $i32) use ($caml_string_bound_error,$caml_string_unsafe_set,$right_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 3) {$caml_string_bound_error();}
        $b4 = 255 & $right_shift_32($i32, 24);
        $b3 = 255 & $right_shift_32($i32, 16);
        $b2 = 255 & $right_shift_32($i32, 8);
        $b1 = 255 & $i32;
        $caml_string_unsafe_set($s, $i + 0, $b1);
        $caml_string_unsafe_set($s, $i + 1, $b2);
        $caml_string_unsafe_set($s, $i + 2, $b3);
        $caml_string_unsafe_set($s, $i + 3, $b4);
        return 0;
      }
    );
    $caml_ml_open_descriptor_out = $Func(
      function($fd) use ($ObjectLiteral,$String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$plus) {
        $data = $caml_global_data->fds[$fd];
        if ($data->flags->rdonly) {
          $caml_raise_sys_error(
            $plus(
              $plus($String->new("fd "), $fd),
              $String->new(" is readonly")
            )
          );
        }
        $channel = $ObjectLiteral(
          (object)darray[
           "file"=>$data->file,
           "offset"=>$data->offset,
           "fd"=>$fd,
           "opened"=>true,
           "out"=>true,
           "buffer"=>$String->new("")]
        );
        $caml_ml_channels[$channel->fd] = $channel;
        return $channel->fd;
      }
    );
    $caml_runtime_variant = $Func(
      function($_unit) use ($String,$caml_new_string) {
        return $caml_new_string($String->new(""));
      }
    );
    $caml_array_concat = $Func(
      function($l) use ($ArrayLiteral) {
        $a = $ArrayLiteral(0);
        while($l !== 0) {
           $b = $l[1];
           for ($i = 1;$i < $b->length;$i++) $a->push($b[$i]);
           $l = $l[2];
         }
        return $a;
      }
    );
    $caml_ba_uint8_set32 = $Func(
      function($ba, $i0, $v) use ($unsigned_right_shift_32) {
        $ba->set1($i0, $v & 255);
        $ba->set1($i0 + 1, $unsigned_right_shift_32($v, 8) & 255);
        $ba->set1($i0 + 2, $unsigned_right_shift_32($v, 16) & 255);
        $ba->set1($i0 + 3, $unsigned_right_shift_32($v, 24) & 255);
        return 0;
      }
    );
    $caml_sys_const_ostype_unix = $Func(function() {return 1;});
    
    
    
$RegExp=$joo_global_object->RegExp;
    
    
    $caml_ephe_set_data = $Func(
      function($x, $data) use ($caml_ephe_data_offset) {
        $x[$caml_ephe_data_offset] = $data;
        return 0;
      }
    );
    $caml_make_float_vect = $Func(
      function($len) use ($Array) {
        $len = $len + 1 | 0;
        $b = $Array->new($len);
        $b[0] = 254;
        for ($i = 1;$i < $len;$i++) $b[$i] = 0;
        return $b;
      }
    );
    $caml_ml_seek_out = $Func(
      function($chanid, $pos) use ($caml_ml_channels) {
        $caml_ml_channels[$chanid]->offset = $pos;
        return 0;
      }
    );
    $caml_greaterequal = $Func(
      function($x, $y) use ($caml_compare_val) {
        return + ($caml_compare_val($x, $y, false) >= 0);
      }
    );
    $caml_js_raw_expr = $Func(
      function($s) use ($String,$eval,$js_print_stderr) {
        $js_print_stderr(
          $String->new(
            "caml_js_raw_expr: This should never happen - all raw code must be directly supplied to caml_js_raw_expr."
          )
        );
        return $eval($s->toString());
      }
    );
    $caml_js_typeof = $Func(function($o) use ($typeof) {return $typeof($o);});
    $caml_restore_raw_backtrace = $Func(function($exn, $bt) {return 0;});
    
    
    
    $caml_js_wrap_meth_callback_unsafe = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object,
        $raw_array_cons
      ) {
        print("WARNING: caml_js_wrap_meth_callback_unsafe is not yet tested");
        return $Func(
          function() use (
            $ArrayLiteral,
            $f,
            $joo_global_object,
            $raw_array_cons
          ) {
            $f->apply(
              varray[],
              $raw_array_cons(
                $ArrayLiteral(\func_get_args()),
                $joo_global_object->context
              )
            );
          }
        );
      }
    );
    
    
    $caml_ba_dim_3 = $Func(function($ba) {return $ba->nth_dim(2);});
    $caml_get_exception_raw_backtrace = $Func(
      function() use ($ArrayLiteral) {return $ArrayLiteral(0);}
    );
    $caml_ephe_check_data = $Func(
      function($x) use ($caml_ephe_data_offset) {
        if ($x[$caml_ephe_data_offset] === NULL) {return 0;}
        else {return 1;}
      }
    );
    $caml_log1p_float = $Func(
      function($x) use ($Math) {
        $y = 1 + $x;$z = $y - 1;
        return $z == 0 ? $x : ($x * $Math->log($y) / $z);
      }
    );
    $caml_bytes_get16 = $Func(
      function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$left_shift_32,$unsigned_right_shift_32) {
        if ($unsigned_right_shift_32($i, 0) >= $s->l + 1) {$caml_string_bound_error();}
        $b1 = $caml_string_unsafe_get($s, $i);
        $b2 = $caml_string_unsafe_get($s, $i + 1);
        return $left_shift_32($b2, 8) | $b1;
      }
    );
    $caml_int64_or = $Func(
      function($x, $y) use ($ArrayLiteral) {
        return $ArrayLiteral(255, $x[1] | $y[1], $x[2] | $y[2], $x[3] | $y[3]);
      }
    );
    $caml_js_from_bool = $Func(function($x) {return ! ! $x;});
    $caml_ml_set_channel_name = $Func(function() {return 0;});
    $caml_lazy_make_forward = $Func(
      function($v) use ($ArrayLiteral) {return $ArrayLiteral(250, $v);}
    );
    $caml_create_string = $Func(
      function($len) use ($MlBytes,$String,$caml_invalid_argument) {
        if ($len < 0) {$caml_invalid_argument($String->new("String.create"));}
        return $MlBytes->new($len ? 2 : (9), $String->new(""), $len);
      }
    );
    $caml_js_on_ie = $Func(
      function() use ($String,$joo_global_object) {
        $ua = $joo_global_object->navigator
          ? $joo_global_object->navigator->userAgent
          : ($String->new(""));
        return $ua->indexOf($String->new("MSIE")) != - 1 &&
          $ua->indexOf($String->new("Opera")) != 0;
      }
    );
    $caml_ba_layout = $Func(function($ba) {return $ba->layout;});
    $caml_md5_string = $Func(
      function() use ($Array,$ArrayLiteral,$Func,$caml_convert_string_to_bytes,$caml_string_of_array,$left_shift_32,$plus,$right_shift_32,$unsigned_right_shift_32) {
        $add = $Func(function($x, $y) use ($plus) {return $plus($x, $y) | 0;});
        $xx = $Func(
          function($q, $a, $b, $x, $s, $t) use ($add,$left_shift_32,$unsigned_right_shift_32) {
            $a = $add($add($a, $q), $add($x, $t));
            return $add(
              $left_shift_32($a, $s) |
                $unsigned_right_shift_32($a, 32 - $s),
              $b
            );
          }
        );
        $ff = $Func(
          function($a, $b, $c, $d, $x, $s, $t) use ($xx) {
            return $xx($b & $c | ~ $b & $d, $a, $b, $x, $s, $t);
          }
        );
        $gg = $Func(
          function($a, $b, $c, $d, $x, $s, $t) use ($xx) {
            return $xx($b & $d | $c & ~ $d, $a, $b, $x, $s, $t);
          }
        );
        $hh = $Func(
          function($a, $b, $c, $d, $x, $s, $t) use ($xx) {
            return $xx($b ^ $c ^ $d, $a, $b, $x, $s, $t);
          }
        );
        $ii = $Func(
          function($a, $b, $c, $d, $x, $s, $t) use ($xx) {
            return $xx($c ^ ($b | ~ $d), $a, $b, $x, $s, $t);
          }
        );
        $md5 = $Func(
          function($buffer, $length) use ($Array,$ArrayLiteral,$add,$ff,$gg,$hh,$ii,$left_shift_32,$right_shift_32) {
            $i = $length;
            $buffer[$right_shift_32($i, 2)] |=
              $left_shift_32(128, 8 * ($i & 3));
            for ($i = ($i & ~ 3) + 8;($i & 63) < 60;$i += 4) $buffer[$right_shift_32($i, 2) - 1] = 0;
            $buffer[$right_shift_32($i, 2) - 1] = $left_shift_32($length, 3);
            $buffer[$right_shift_32($i, 2)] =
              $right_shift_32($length, 29) & 536870911;
            $w = $ArrayLiteral(1732584193, 4023233417, 2562383102, 271733878);
            for ($i = 0;$i < $buffer->length;$i += 16) {
              $a = $w[0];$b = $w[1];$c = $w[2];$d = $w[3];
              $a = $ff($a, $b, $c, $d, $buffer[$i + 0], 7, 3614090360);
              $d = $ff($d, $a, $b, $c, $buffer[$i + 1], 12, 3905402710);
              $c = $ff($c, $d, $a, $b, $buffer[$i + 2], 17, 606105819);
              $b = $ff($b, $c, $d, $a, $buffer[$i + 3], 22, 3250441966);
              $a = $ff($a, $b, $c, $d, $buffer[$i + 4], 7, 4118548399);
              $d = $ff($d, $a, $b, $c, $buffer[$i + 5], 12, 1200080426);
              $c = $ff($c, $d, $a, $b, $buffer[$i + 6], 17, 2821735955);
              $b = $ff($b, $c, $d, $a, $buffer[$i + 7], 22, 4249261313);
              $a = $ff($a, $b, $c, $d, $buffer[$i + 8], 7, 1770035416);
              $d = $ff($d, $a, $b, $c, $buffer[$i + 9], 12, 2336552879);
              $c = $ff($c, $d, $a, $b, $buffer[$i + 10], 17, 4294925233);
              $b = $ff($b, $c, $d, $a, $buffer[$i + 11], 22, 2304563134);
              $a = $ff($a, $b, $c, $d, $buffer[$i + 12], 7, 1804603682);
              $d = $ff($d, $a, $b, $c, $buffer[$i + 13], 12, 4254626195);
              $c = $ff($c, $d, $a, $b, $buffer[$i + 14], 17, 2792965006);
              $b = $ff($b, $c, $d, $a, $buffer[$i + 15], 22, 1236535329);
              $a = $gg($a, $b, $c, $d, $buffer[$i + 1], 5, 4129170786);
              $d = $gg($d, $a, $b, $c, $buffer[$i + 6], 9, 3225465664);
              $c = $gg($c, $d, $a, $b, $buffer[$i + 11], 14, 643717713);
              $b = $gg($b, $c, $d, $a, $buffer[$i + 0], 20, 3921069994);
              $a = $gg($a, $b, $c, $d, $buffer[$i + 5], 5, 3593408605);
              $d = $gg($d, $a, $b, $c, $buffer[$i + 10], 9, 38016083);
              $c = $gg($c, $d, $a, $b, $buffer[$i + 15], 14, 3634488961);
              $b = $gg($b, $c, $d, $a, $buffer[$i + 4], 20, 3889429448);
              $a = $gg($a, $b, $c, $d, $buffer[$i + 9], 5, 568446438);
              $d = $gg($d, $a, $b, $c, $buffer[$i + 14], 9, 3275163606);
              $c = $gg($c, $d, $a, $b, $buffer[$i + 3], 14, 4107603335);
              $b = $gg($b, $c, $d, $a, $buffer[$i + 8], 20, 1163531501);
              $a = $gg($a, $b, $c, $d, $buffer[$i + 13], 5, 2850285829);
              $d = $gg($d, $a, $b, $c, $buffer[$i + 2], 9, 4243563512);
              $c = $gg($c, $d, $a, $b, $buffer[$i + 7], 14, 1735328473);
              $b = $gg($b, $c, $d, $a, $buffer[$i + 12], 20, 2368359562);
              $a = $hh($a, $b, $c, $d, $buffer[$i + 5], 4, 4294588738);
              $d = $hh($d, $a, $b, $c, $buffer[$i + 8], 11, 2272392833);
              $c = $hh($c, $d, $a, $b, $buffer[$i + 11], 16, 1839030562);
              $b = $hh($b, $c, $d, $a, $buffer[$i + 14], 23, 4259657740);
              $a = $hh($a, $b, $c, $d, $buffer[$i + 1], 4, 2763975236);
              $d = $hh($d, $a, $b, $c, $buffer[$i + 4], 11, 1272893353);
              $c = $hh($c, $d, $a, $b, $buffer[$i + 7], 16, 4139469664);
              $b = $hh($b, $c, $d, $a, $buffer[$i + 10], 23, 3200236656);
              $a = $hh($a, $b, $c, $d, $buffer[$i + 13], 4, 681279174);
              $d = $hh($d, $a, $b, $c, $buffer[$i + 0], 11, 3936430074);
              $c = $hh($c, $d, $a, $b, $buffer[$i + 3], 16, 3572445317);
              $b = $hh($b, $c, $d, $a, $buffer[$i + 6], 23, 76029189);
              $a = $hh($a, $b, $c, $d, $buffer[$i + 9], 4, 3654602809);
              $d = $hh($d, $a, $b, $c, $buffer[$i + 12], 11, 3873151461);
              $c = $hh($c, $d, $a, $b, $buffer[$i + 15], 16, 530742520);
              $b = $hh($b, $c, $d, $a, $buffer[$i + 2], 23, 3299628645);
              $a = $ii($a, $b, $c, $d, $buffer[$i + 0], 6, 4096336452);
              $d = $ii($d, $a, $b, $c, $buffer[$i + 7], 10, 1126891415);
              $c = $ii($c, $d, $a, $b, $buffer[$i + 14], 15, 2878612391);
              $b = $ii($b, $c, $d, $a, $buffer[$i + 5], 21, 4237533241);
              $a = $ii($a, $b, $c, $d, $buffer[$i + 12], 6, 1700485571);
              $d = $ii($d, $a, $b, $c, $buffer[$i + 3], 10, 2399980690);
              $c = $ii($c, $d, $a, $b, $buffer[$i + 10], 15, 4293915773);
              $b = $ii($b, $c, $d, $a, $buffer[$i + 1], 21, 2240044497);
              $a = $ii($a, $b, $c, $d, $buffer[$i + 8], 6, 1873313359);
              $d = $ii($d, $a, $b, $c, $buffer[$i + 15], 10, 4264355552);
              $c = $ii($c, $d, $a, $b, $buffer[$i + 6], 15, 2734768916);
              $b = $ii($b, $c, $d, $a, $buffer[$i + 13], 21, 1309151649);
              $a = $ii($a, $b, $c, $d, $buffer[$i + 4], 6, 4149444226);
              $d = $ii($d, $a, $b, $c, $buffer[$i + 11], 10, 3174756917);
              $c = $ii($c, $d, $a, $b, $buffer[$i + 2], 15, 718787259);
              $b = $ii($b, $c, $d, $a, $buffer[$i + 9], 21, 3951481745);
              $w[0] = $add($a, $w[0]);
              $w[1] = $add($b, $w[1]);
              $w[2] = $add($c, $w[2]);
              $w[3] = $add($d, $w[3]);
            }
            $t = $Array->new(16);
            for ($i = 0;$i < 4;$i++) for ($j = 0;$j < 4;$j++
            ) $t[$i * 4 + $j] = $right_shift_32($w[$i], 8 * $j) & 255;
            return $t;
          }
        );
        return $Func(
          function($s, $ofs, $len) use ($ArrayLiteral,$caml_convert_string_to_bytes,$caml_string_of_array,$left_shift_32,$md5,$plus,$right_shift_32) {
            $buf = $ArrayLiteral();
            switch($s->t & 6) {
              // FALLTHROUGH
              default:
                $caml_convert_string_to_bytes($s);
              // FALLTHROUGH
              case 0:
                $b = $s->c;
                for ($i = 0;$i < $len;$i += 4) {
                  $j = $plus($i, $ofs);
                  $buf[$right_shift_32($i, 2)] =
                    $b->charCodeAt($j) |
                      $left_shift_32($b->charCodeAt($j + 1), 8) |
                      $left_shift_32($b->charCodeAt($j + 2), 16) |
                      $left_shift_32($b->charCodeAt($j + 3), 24);
                }
                for (;$i < $len;$i++) $buf[
                   $right_shift_32($i, 2)
                 ] |=
                  $left_shift_32($b->charCodeAt($plus($i, $ofs)), 8 * ($i & 3)
                  );
                break;
              // FALLTHROUGH
              case 4:
                $a = $s->c;
                for ($i = 0;$i < $len;$i += 4) {
                  $j = $plus($i, $ofs);
                  $buf[$right_shift_32($i, 2)] =
                    $a[$j] |
                      $left_shift_32($a[$j + 1], 8) |
                      $left_shift_32($a[$j + 2], 16) |
                      $left_shift_32($a[$j + 3], 24);
                }
                for (;$i < $len;$i++) $buf[
                   $right_shift_32($i, 2)
                 ] |= $left_shift_32($a[$plus($i, $ofs)], 8 * ($i & 3));
              }
            return $caml_string_of_array($md5($buf, $len));
          }
        );
      }
    )();
    $caml_md5_chan = $Func(
      function($chanid, $len) use ($caml_create_bytes,$caml_md5_string,$caml_ml_channels,$caml_raise_end_of_file,$plus) {
        $chan = $caml_ml_channels[$chanid];
        $chan_len = $chan->file->length();
        if ($len < 0) {$len = $chan_len - $chan->offset;}
        if ($plus($chan->offset, $len) > $chan_len) {$caml_raise_end_of_file();}
        $buf = $caml_create_bytes($len);
        $chan->file->read($chan->offset, $buf, 0, $len);
        return $caml_md5_string($buf, 0, $len);
      }
    );
    $caml_int64_shift_right = $Func(
      function($x, $s) use ($ArrayLiteral,$left_shift_32,$right_shift_32,$unsigned_right_shift_32) {
        $s = $s & 63;
        if ($s == 0) {return $x;}
        $h = $right_shift_32($left_shift_32($x[3], 16), 16);
        if ($s < 24) {
          return $ArrayLiteral(
            255,
            ($right_shift_32($x[1], $s) | $left_shift_32($x[2], 24 - $s)) & 16777215,
            ($right_shift_32($x[2], $s) | $left_shift_32($h, 24 - $s)) & 16777215,
            $unsigned_right_shift_32(
              $right_shift_32($left_shift_32($x[3], 16), $s),
              16
            )
          );
        }
        $sign = $right_shift_32($left_shift_32($x[3], 16), 31);
        if ($s < 48) {
          return $ArrayLiteral(
            255,
            ($right_shift_32($x[2], $s - 24) | $left_shift_32($x[3], 48 - $s)) & 16777215,
            $right_shift_32(
              $right_shift_32($left_shift_32($x[3], 16), $s - 24),
              16
            ) & 16777215,
            $sign & 65535
          );
        }
        return $ArrayLiteral(
          255,
          $right_shift_32($left_shift_32($x[3], 16), $s - 32) & 16777215,
          $sign & 16777215,
          $sign & 65535
        );
      }
    );
    $caml_convert_raw_backtrace = $Func(
      function() use ($ArrayLiteral) {return $ArrayLiteral(0);}
    );
    $caml_array_set = $Func(
      function($array, $index, $newval) use ($caml_array_bound_error) {
        if ($index < 0 || $index >= $array->length - 1) {$caml_array_bound_error();}
        $array[$index + 1] = $newval;
        return 0;
      }
    );
    $caml_bytes_greaterequal = $Func(
      function($s1, $s2) use ($caml_bytes_lessequal) {
        return $caml_bytes_lessequal($s2, $s1);
      }
    );
    
    
    
  $caml_update_dummy = function($x, $y) {
    if(PHP\is_callable($y)) {
      $x->fun = $y;
      return 0;
    }
    if(isset($y->fun)) {
      $x->fun = $y->fun;
      return 0;
    }
    $i = $y->length;
    while ($i--) $x[$i] = $y[$i];
    return 0;
  };
    
    
    $_ = $caml_CamlinternalMod_update_mod->contents =
      $Func(
        function($shape, $real, $x) use ($String,$caml_CamlinternalMod_update_mod,$caml_update_dummy,$eqEqEq,$typeof) {
          if ($eqEqEq($typeof($shape), $String->new("number"))) {
            switch($shape) {
              // FALLTHROUGH
              case 0:
                $real->fun = $x;
                break;
              // FALLTHROUGH
              case 1:
              // FALLTHROUGH
              default:
                $caml_update_dummy($real, $x);
              }
          }
          else {
            switch($shape[0]) {
              // FALLTHROUGH
              case 0:
                for ($i = 1;$i < $shape[1]->length;$i++) $caml_CamlinternalMod_update_mod->contents(
                  $shape[1][$i],
                  $real[$i],
                  $x[$i]
                );
                break;
              // FALLTHROUGH
              default:
              }
          }
          ;
          return 0;
        }
      );
    $caml_ephe_get_data = $Func(
      function($x) use ($ArrayLiteral,$caml_ephe_data_offset) {
        if ($x[$caml_ephe_data_offset] === NULL) {return 0;}
        else {return $ArrayLiteral(0, $x[$caml_ephe_data_offset]);}
      }
    );
    $caml_trampoline_return = $Func(
      function($f, $args) use ($ObjectLiteral) {
        return $ObjectLiteral(
          (object)darray["joo_tramp"=>$f,"joo_args"=>$args]
        );
      }
    );
    
    
    
$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;
    
    
    $caml_ml_output_int = $Func(
      function($chanid, $i) use ($ArrayLiteral,$caml_ml_output,$caml_string_of_array,$right_shift_32) {
        $arr = $ArrayLiteral(
          $right_shift_32($i, 24) & 255,
          $right_shift_32($i, 16) & 255,
          $right_shift_32($i, 8) & 255,
          $i & 255
        );
        $s = $caml_string_of_array($arr);
        $caml_ml_output($chanid, $s, 0, 4);
        return 0;
      }
    );
    $caml_initial_time = $Date->new()->getTime() * 0.001;
    $caml_sys_time = $Func(
      function() use ($Date,$caml_initial_time) {
        return $Date->new()->getTime() * 0.001 - $caml_initial_time;
      }
    );
    $caml_ml_channel_size = $Func(
      function($chanid) use ($caml_ml_channels) {
        $chan = $caml_ml_channels[$chanid];
        return $chan->file->length();
      }
    );
    $caml_array_append = $Func(
      function($a1, $a2) use ($Array,$plus) {
        $l1 = $a1->length;$l2 = $a2->length;
        $l = $plus($l1, $l2) - 1;
        $a = $Array->new($l);
        $a[0] = 0;
        $i = 1;$j = 1;
        for (;$i < $l1;$i++) $a[$i] = $a1[$i];
        for (;$i < $l;$i++ || true ? $j++ : ($j++)) $a[$i] = $a2[$j];
        return $a;
      }
    );
    $caml_raw_backtrace_slot = $Func(
      function() use ($String,$caml_invalid_argument) {
        $caml_invalid_argument(
          $String->new("Printexc.get_raw_backtrace_slot: index out of bounds")
        );
      }
    );
    $caml_string_of_bytes = $Func(function($s) {return $s;});
    $caml_ml_set_channel_refill = $Func(
      function($chanid, $f) use ($caml_ml_channels) {
        $caml_ml_channels[$chanid]->refill = $f;
        return 0;
      }
    );
    
    
    
    $caml_alloc_dummy_function = $Func(
      function($size, $arity) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object
      ) {
        print("WARNING: caml_alloc_dummy_function is not yet tested");
        $f = new Ref();
        $f->contents = $Func(
          function() use ($ArrayLiteral, $f, $joo_global_object) {
            return $f->contents
              ->fun
              ->apply(
                $joo_global_object->context,
                $ArrayLiteral(\func_get_args())
              );
          }
        );
        $f->contents->length = $arity;
        return $f->contents;
      }
    );
    
    
    $caml_int64_is_min_int = $Func(
      function($x) {return $x[3] == 32768 && ($x[1] | $x[2]) == 0;}
    );
    $caml_hexstring_of_float = $Func(
      function($x, $prec, $style) use ($Infinity,$Math,$String,$caml_js_to_string,$caml_str_repeat,$isFinite,$isNaN,$plus) {
        if (! $isFinite($x)) {
          if ($isNaN($x)) {return $caml_js_to_string($String->new("nan"));}
          return $caml_js_to_string(
            $x > 0 ? $String->new("infinity") : ($String->new("-infinity"))
          );
        }
        $sign = $x == 0 && 1 / $x == - $Infinity ? 1 : ($x >= 0 ? 0 : (1));
        if ($sign) {$x = - $x;}
        $exp = 0;
        if ($x == 0) {}
        else {
          if ($x < 1) {
            while($x < 1 && $exp > - 1022) {$x *= 2;$exp--;}
          }
          else {while($x >= 2) {$x /= 2;$exp++;}}
        }
        $exp_sign = $exp < 0 ? $String->new("") : ($String->new("+"));
        $sign_str = $String->new("");
        if ($sign) {
          $sign_str = $String->new("-");
        }
        else {
          switch($style) {
            // FALLTHROUGH
            case 43:
              $sign_str = $String->new("+");
              break;
            // FALLTHROUGH
            case 32:
              $sign_str = $String->new(" ");
              break;
            // FALLTHROUGH
            default:break;
            }
        }
        if ($prec >= 0 && $prec < 13) {
          $cst = $Math->pow(2, $prec * 4);
          $x = $Math->round($x * $cst) / $cst;
        }
        $x_str = $x->toString(16);
        if ($prec >= 0) {
          $idx = $x_str->indexOf($String->new("."));
          if ($idx < 0) {
            $x_str =
              $plus(
                $x_str,
                $plus(
                  $String->new("."),
                  $caml_str_repeat($prec, $String->new("0"))
                )
              );
          }
          else {
            $size = $plus($idx + 1, $prec);
            if ($x_str->length < $size) {
              $x_str =
                $plus(
                  $x_str,
                  $caml_str_repeat($size - $x_str->length, $String->new("0"))
                );
            }
            else {$x_str = $x_str->substr(0, $size);}
          }
        }
        return $caml_js_to_string(
          $plus(
            $plus(
              $plus(
                $plus($plus($sign_str, $String->new("0x")), $x_str),
                $String->new("p")
              ),
              $exp_sign
            ),
            $exp->toString(10)
          )
        );
      }
    );
    $caml_return_exn_constant = $Func(function($tag) {return $tag;});
    $caml_js_expr = $Func(
      function($s) use ($String,$eval,$js_print_stderr) {
        $js_print_stderr(
          $String->new("caml_js_expr: fallback to runtime evaluation")
        );
        return $eval($s->toString());
      }
    );
    
    
    
    $caml_js_wrap_meth_callback_strict = $Func(
      function($arity, $f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback_strict is not yet tested");
        return $Func(
          function() use (
            $ArrayLiteral,
            $arity,
            $caml_call_gen,
            $f,
            $joo_global_object
          ) {
            $func_args = \func_get_args();
            $n = PHP\count($func_args);
            $args = varray[$joo_global_object->context];
            if ($n === $arity) {
              $args = PHP\array_merge($args, $func_args);
            } else {
              for ($i = 1; $i < $n && $i <= $arity; $i++) {
                $args[$i] = $func_args[$i];
              }
            }
            return $caml_call_gen($f, $ArrayLiteral($args));
          }
        );
      }
    );
    
    
    $caml_ml_runtime_warnings_enabled = $Func(
      function($_unit) use ($caml_runtime_warnings) {
        return $caml_runtime_warnings;
      }
    );
    $caml_backtrace_status = $Func(function() {return 0;});
    $caml_install_signal_handler = $Func(function() {return 0;});
    $caml_ba_fill = $Func(function($ba, $init) {$ba->fill($init);return 0;});
    $caml_gc_get = $Func(
      function() use ($ArrayLiteral) {
        return $ArrayLiteral(0, 0, 0, 0, 0, 0, 0, 0, 0);
      }
    );
    $caml_output_value_to_bytes = $Func(
      function($v, $_fl) use ($caml_output_val,$caml_string_of_array) {
        return $caml_string_of_array($caml_output_val($v));
      }
    );
    $caml_modf_float = $Func(
      function($x) use ($ArrayLiteral,$Math,$NaN,$isFinite,$isNaN) {
        if ($isFinite($x)) {
          $neg = 1 / $x < 0;
          $x = $Math->abs($x);
          $i = $Math->floor($x);
          $f = $x - $i;
          if ($neg) {$i = - $i;$f = - $f;}
          return $ArrayLiteral(0, $f, $i);
        }
        if ($isNaN($x)) {return $ArrayLiteral(0, $NaN, $NaN);}
        return $ArrayLiteral(0, 1 / $x, $x);
      }
    );
    $caml_hash_univ_param = $Func(
      function($count, $limit, $obj) use ($Array,$Func,$MlBytes,$String,$caml_convert_string_to_bytes,$caml_int64_bits_of_float,$caml_int64_to_bytes,$eqEqEq,$left_shift_32,$typeof) {
        $hash_aux = new Ref();
        $hash_accu = 0;
        $_ = $hash_aux->contents =
          $Func(
            function($obj) use ($Array,$MlBytes,$String,$caml_convert_string_to_bytes,$caml_int64_bits_of_float,$caml_int64_to_bytes,$count,$eqEqEq,$hash_accu,$hash_aux,$left_shift_32,$limit,$typeof) {
              $limit--;
              if ($count < 0 || $limit < 0) {return;}
              if (instance_of($obj, $Array) && $eqEqEq($obj[0], $obj[0] | 0)) {
                switch($obj[0]) {
                  // FALLTHROUGH
                  case 248:
                    $count--;
                    $hash_accu = $hash_accu * 65599 + $obj[2] | 0;
                    break;
                  // FALLTHROUGH
                  case 250:
                    $limit++;
                    $hash_aux->contents($obj);
                    break;
                  // FALLTHROUGH
                  case 255:
                    $count--;
                    $hash_accu =
                      $hash_accu * 65599 +
                        $obj[1] +
                        $left_shift_32($obj[2], 24) | 0;
                    break;
                  // FALLTHROUGH
                  default:
                    $count--;
                    $hash_accu = $hash_accu * 19 + $obj[0] | 0;
                    for ($i = $obj->length - 1;$i > 0;$i--) $hash_aux->contents($obj[$i]);
                  }
              }
              else {
                if (instance_of($obj, $MlBytes)) {
                  $count--;
                  switch($obj->t & 6) {
                    // FALLTHROUGH
                    default:
                      $caml_convert_string_to_bytes($obj);
                    // FALLTHROUGH
                    case 0:
                      for ($b = $obj->c,$l = $obj->l,$i = 0;$i < $l;$i++) $hash_accu =
                        $hash_accu * 19 +
                          $b->charCodeAt($i) | 0;
                      break;
                    // FALLTHROUGH
                    case 2:
                      for ($a = $obj->c,$l = $obj->l,$i = 0;$i < $l;$i++) $hash_accu = $hash_accu * 19 + $a[$i] | 0;
                    }
                }
                else {
                  if ($eqEqEq($obj, $obj | 0)) {
                    $count--;
                    $hash_accu = $hash_accu * 65599 + $obj | 0;
                  }
                  else {
                    if ($eqEqEq($obj, + $obj)) {
                      $count--;
                      $p = $caml_int64_to_bytes($caml_int64_bits_of_float($obj));
                      for ($i = 7;$i >= 0;$i--) $hash_accu =
                        $hash_accu * 19 +
                          $p[$i] | 0;
                    }
                    else {
                      if (
                        $obj && $obj->hash &&
                          $eqEqEq($typeof($obj->hash), $String->new("function"))
                      ) {$hash_accu = $hash_accu * 65599 + $obj->hash() | 0;}
                    }
                  }
                }
              }
            }
          );
        $hash_aux->contents($obj);
        return $hash_accu & 1073741823;
      }
    );
    $caml_float_compare = $Func(
      function($x, $y) use ($eqEqEq) {
        if ($eqEqEq($x, $y)) {return 0;}
        if ($x < $y) {return - 1;}
        if ($x > $y) {return 1;}
        if ($eqEqEq($x, $x)) {return 1;}
        if ($eqEqEq($y, $y)) {return - 1;}
        return 0;
      }
    );
    $caml_string_set32 = $Func(
      function($s, $i, $i32) use ($caml_bytes_set32) {
        return $caml_bytes_set32($s, $i, $i32);
      }
    );
    $caml_js_fun_call1 = $Func(function($f, $a) {return $f($a);});
    $caml_parse_engine = $Func(
      function($tables, $env, $cmd, $arg) use ($Array,$caml_lex_array,$eqEq,$plus) {
        $ERRCODE = 256;
        $loop = 6;
        $testshift = 7;
        $shift = 8;
        $shift_recover = 9;
        $reduce = 10;
        $READ_TOKEN = 0;
        $RAISE_PARSE_ERROR = 1;
        $GROW_STACKS_1 = 2;
        $GROW_STACKS_2 = 3;
        $COMPUTE_SEMANTIC_ACTION = 4;
        $CALL_ERROR_FUNCTION = 5;
        $env_s_stack = 1;
        $env_v_stack = 2;
        $env_symb_start_stack = 3;
        $env_symb_end_stack = 4;
        $env_stacksize = 5;
        $env_stackbase = 6;
        $env_curr_char = 7;
        $env_lval = 8;
        $env_symb_start = 9;
        $env_symb_end = 10;
        $env_asp = 11;
        $env_rule_len = 12;
        $env_rule_number = 13;
        $env_sp = 14;
        $env_state = 15;
        $env_errflag = 16;
        $tbl_transl_const = 2;
        $tbl_transl_block = 3;
        $tbl_lhs = 4;
        $tbl_len = 5;
        $tbl_defred = 6;
        $tbl_dgoto = 7;
        $tbl_sindex = 8;
        $tbl_rindex = 9;
        $tbl_gindex = 10;
        $tbl_tablesize = 11;
        $tbl_table = 12;
        $tbl_check = 13;
        if (! $tables->dgoto) {
          $tables->defred = $caml_lex_array($tables[$tbl_defred]);
          $tables->sindex = $caml_lex_array($tables[$tbl_sindex]);
          $tables->check = $caml_lex_array($tables[$tbl_check]);
          $tables->rindex = $caml_lex_array($tables[$tbl_rindex]);
          $tables->table = $caml_lex_array($tables[$tbl_table]);
          $tables->len = $caml_lex_array($tables[$tbl_len]);
          $tables->lhs = $caml_lex_array($tables[$tbl_lhs]);
          $tables->gindex = $caml_lex_array($tables[$tbl_gindex]);
          $tables->dgoto = $caml_lex_array($tables[$tbl_dgoto]);
        }
        $res = 0;$n = NULL;$n1 = NULL;$n2 = NULL;$state1 = NULL;
        $sp = $env[$env_sp];
        $state = $env[$env_state];
        $errflag = $env[$env_errflag];
        for (;;) {
          switch($cmd) {
            // FALLTHROUGH
            case 0:
              $state = 0;
              $errflag = 0;
            // FALLTHROUGH
            case 6:
              $n = $tables->defred[$state];
              if ($n != 0) {$cmd = $reduce;break;}
              if ($env[$env_curr_char] >= 0) {$cmd = $testshift;break;}
              $res = $READ_TOKEN;
              goto exit_break;
            // FALLTHROUGH
            case 1:
              if (instance_of($arg, $Array)) {
                $env[$env_curr_char] =
                  $tables[$tbl_transl_block][$arg[0] + 1];
                $env[$env_lval] = $arg[1];
              }
              else {
                $env[$env_curr_char] = $tables[$tbl_transl_const][$arg + 1];
                $env[$env_lval] = 0;
              }
            // FALLTHROUGH
            case 7:
              $n1 = $tables->sindex[$state];
              $n2 = $plus($n1, $env[$env_curr_char]);
              if (
                $n1 != 0 &&
                  $n2 >= 0 &&
                  $n2 <= $tables[$tbl_tablesize] &&
                  $eqEq($tables->check[$n2], $env[$env_curr_char])
              ) {$cmd = $shift;break;}
              $n1 = $tables->rindex[$state];
              $n2 = $plus($n1, $env[$env_curr_char]);
              if (
                $n1 != 0 &&
                  $n2 >= 0 &&
                  $n2 <= $tables[$tbl_tablesize] &&
                  $eqEq($tables->check[$n2], $env[$env_curr_char])
              ) {$n = $tables->table[$n2];$cmd = $reduce;break;}
              if ($errflag <= 0) {
                $res = $CALL_ERROR_FUNCTION;
                goto exit_break;
              }
            // FALLTHROUGH
            case 5:
              if ($errflag < 3) {
                $errflag = 3;
                for (;;) {
                  $state1 = $env[$env_s_stack][$sp + 1];
                  $n1 = $tables->sindex[$state1];
                  $n2 = $plus($n1, $ERRCODE);
                  if (
                    $n1 != 0 &&
                      $n2 >= 0 &&
                      $n2 <= $tables[$tbl_tablesize] &&
                      $eqEq($tables->check[$n2], $ERRCODE)
                  ) {$cmd = $shift_recover;break;}
                  else {
                    if ($sp <= $env[$env_stackbase]) {return $RAISE_PARSE_ERROR;}
                    $sp--;
                  }
                }
              }
              else {
                if ($env[$env_curr_char] == 0) {return $RAISE_PARSE_ERROR;}
                $env[$env_curr_char] = - 1;
                $cmd = $loop;
                break;
              }
            // FALLTHROUGH
            case 8:
              $env[$env_curr_char] = - 1;
              if ($errflag > 0) {$errflag--;}
            // FALLTHROUGH
            case 9:
              $state = $tables->table[$n2];
              $sp++;
              if ($sp >= $env[$env_stacksize]) {
                $res = $GROW_STACKS_1;
                goto exit_break;
              }
            // FALLTHROUGH
            case 2:
              $env[$env_s_stack][$sp + 1] = $state;
              $env[$env_v_stack][$sp + 1] = $env[$env_lval];
              $env[$env_symb_start_stack][$sp + 1] = $env[$env_symb_start];
              $env[$env_symb_end_stack][$sp + 1] = $env[$env_symb_end];
              $cmd = $loop;
              break;
            // FALLTHROUGH
            case 10:
              $m = $tables->len[$n];
              $env[$env_asp] = $sp;
              $env[$env_rule_number] = $n;
              $env[$env_rule_len] = $m;
              $sp = $sp - $m + 1;
              $m = $tables->lhs[$n];
              $state1 = $env[$env_s_stack][$sp];
              $n1 = $tables->gindex[$m];
              $n2 = $plus($n1, $state1);
              if (
                $n1 != 0 &&
                  $n2 >= 0 &&
                  $n2 <= $tables[$tbl_tablesize] &&
                  $eqEq($tables->check[$n2], $state1)
              ) {$state = $tables->table[$n2];}
              else {$state = $tables->dgoto[$m];}
              if ($sp >= $env[$env_stacksize]) {
                $res = $GROW_STACKS_2;
                goto exit_break;
              }
            // FALLTHROUGH
            case 3:
              $res = $COMPUTE_SEMANTIC_ACTION;
              goto exit_break;
            // FALLTHROUGH
            case 4:
              $env[$env_s_stack][$sp + 1] = $state;
              $env[$env_v_stack][$sp + 1] = $arg;
              $asp = $env[$env_asp];
              $env[$env_symb_end_stack][$sp + 1] =
                $env[$env_symb_end_stack][$asp + 1];
              if ($sp > $asp) {
                $env[$env_symb_start_stack][$sp + 1] =
                  $env[$env_symb_end_stack][$asp + 1];
              }
              $cmd = $loop;
              break;
            // FALLTHROUGH
            default:
              return $RAISE_PARSE_ERROR;
            }
          exit_continue:;
          
        }
        exit_break:
        $env[$env_sp] = $sp;
        $env[$env_state] = $state;
        $env[$env_errflag] = $errflag;
        return $res;
      }
    );
    $raw_array_copy = $Func(
      function($a) use ($Array) {
        $l = $a->length;
        $b = $Array->new($l);
        for ($i = 0;$i < $l;$i++) $b[$i] = $a[$i];
        return $b;
      }
    );
    $caml_output_value_to_buffer = $Func(
      function($s, $ofs, $len, $v, $_fl) use ($String,$caml_blit_bytes,$caml_failwith,$caml_output_val) {
        $t = $caml_output_val($v);
        if ($t->length > $len) {
          $caml_failwith($String->new("Marshal.to_buffer: buffer overflow"));
        }
        $caml_blit_bytes($t, 0, $s, $ofs, $t->length);
        return 0;
      }
    );
    $caml_pure_js_expr = $Func(
      function($s) use ($String,$eval,$js_print_stderr) {
        $js_print_stderr(
          $String->new("caml_pure_js_expr: fallback to runtime evaluation")
        );
        return $eval($s->toString());
      }
    );
    $caml_blit_string = $Func(
      function($s1, $i1, $s2, $i2, $len) use ($caml_blit_bytes) {
        return $caml_blit_bytes($s1, $i1, $s2, $i2, $len);
      }
    );
    $bigstring_blit_stub = $Func(
      function($s1, $i1, $s2, $i2, $len) use ($caml_ba_get_1,$caml_ba_set_1,$plus) {
        for ($i = 0;$i < $len;$i++) $caml_ba_set_1(
          $s2,
          $plus($i2, $i),
          $caml_ba_get_1($s1, $plus($i1, $i))
        );
        return 0;
      }
    );
    $caml_string_notequal = $Func(
      function($s1, $s2) use ($caml_string_equal) {
        return 1 - $caml_string_equal($s1, $s2);
      }
    );
    $caml_int64_xor = $Func(
      function($x, $y) use ($ArrayLiteral) {
        return $ArrayLiteral(255, $x[1] ^ $y[1], $x[2] ^ $y[2], $x[3] ^ $y[3]);
      }
    );
    $caml_bytes_greaterthan = $Func(
      function($s1, $s2) use ($caml_bytes_lessthan) {
        return $caml_bytes_lessthan($s2, $s1);
      }
    );
    $caml_read_file_content = $Func(
      function($name) use ($ObjectLiteral,$caml_create_bytes,$caml_raise_no_such_file,$resolve_fs_device) {
        $root = $resolve_fs_device($name);
        if ($root->device->exists($root->rest)) {
          $file = $root->device->open(
            $root->rest,
            $ObjectLiteral((object)darray["rdonly"=>1])
          );
          $len = $file->length();
          $buf = $caml_create_bytes($len);
          $file->read(0, $buf, 0, $len);
          return $buf;
        }
        $caml_raise_no_such_file($name);
      }
    );
    $caml_ml_set_channel_output = $Func(
      function($chanid, $f) use ($caml_global_data,$caml_ml_channels) {
        $chan = $caml_ml_channels[$chanid];
        $caml_global_data->fds[$chan->fd]->output = $f;
        return 0;
      }
    );
    $caml_js_to_float = $Func(function($x) {return $x;});
    $caml_register_named_value = $Func(
      function($nm, $v) use ($caml_jsbytes_of_string,$caml_named_values) {
        $caml_named_values[$caml_jsbytes_of_string($nm)] = $v;
        return 0;
      }
    );
    $caml_js_fun_call2 = $Func(function($f, $a, $b) {return $f($a, $b);});
    $caml_ba_dim = $Func(function($ba, $dim) {return $ba->nth_dim($dim);});
    
    $joo_global_object->jsoo_runtime =
      $ObjectLiteral(
        (object)darray[
         "caml_ephe_check_data"=>$caml_ephe_check_data,
         "caml_ephe_unset_data"=>$caml_ephe_unset_data,
         "caml_ephe_set_data"=>$caml_ephe_set_data,
         "caml_ephe_get_data_copy"=>$caml_ephe_get_data_copy,
         "caml_ephe_get_data"=>$caml_ephe_get_data,
         "caml_ephe_blit_data"=>$caml_ephe_blit_data,
         "caml_ephe_unset_key"=>$caml_ephe_unset_key,
         "caml_ephe_set_key"=>$caml_ephe_set_key,
         "caml_ephe_check_key"=>$caml_ephe_check_key,
         "caml_ephe_get_key_copy"=>$caml_ephe_get_key_copy,
         "caml_ephe_get_key"=>$caml_ephe_get_key,
         "caml_ephe_blit_key"=>$caml_ephe_blit_key,
         "caml_ephe_create"=>$caml_ephe_create,
         "caml_weak_blit"=>$caml_weak_blit,
         "caml_weak_check"=>$caml_weak_check,
         "caml_weak_get_copy"=>$caml_weak_get_copy,
         "caml_weak_get"=>$caml_weak_get,
         "caml_weak_set"=>$caml_weak_set,
         "caml_weak_create"=>$caml_weak_create,
         "caml_ephe_data_offset"=>$caml_ephe_data_offset,
         "caml_ephe_key_offset"=>$caml_ephe_key_offset,
         "caml_hash_mix_bigstring"=>$caml_hash_mix_bigstring,
         "bigstring_of_array_buffer"=>$bigstring_of_array_buffer,
         "bigstring_to_array_buffer"=>$bigstring_to_array_buffer,
         "bigstring_find"=>$bigstring_find,
         "bigstring_memcmp_stub"=>$bigstring_memcmp_stub,
         "bigstring_blit_stub"=>$bigstring_blit_stub,
         "caml_blit_string_to_bigstring"=>$caml_blit_string_to_bigstring,
         "bigstring_blit_bytes_bigstring_stub"=>
         $bigstring_blit_bytes_bigstring_stub,
         "bigstring_blit_string_bigstring_stub"=>
         $bigstring_blit_string_bigstring_stub,
         "caml_blit_bigstring_to_string"=>$caml_blit_bigstring_to_string,
         "bigstring_blit_bigstring_string_stub"=>
         $bigstring_blit_bigstring_string_stub,
         "bigstring_blit_bigstring_bytes_stub"=>
         $bigstring_blit_bigstring_bytes_stub,
         "bigstring_destroy_stub"=>$bigstring_destroy_stub,
         "bigstring_alloc"=>$bigstring_alloc,
         "caml_json"=>$caml_json,
         "JSON"=>$JSON,
         "caml_gc_get"=>$caml_gc_get,
         "caml_gc_set"=>$caml_gc_set,
         "caml_gc_stat"=>$caml_gc_stat,
         "caml_gc_quick_stat"=>$caml_gc_quick_stat,
         "caml_gc_counters"=>$caml_gc_counters,
         "caml_gc_compaction"=>$caml_gc_compaction,
         "caml_gc_full_major"=>$caml_gc_full_major,
         "caml_gc_major"=>$caml_gc_major,
         "caml_gc_minor"=>$caml_gc_minor,
         "caml_CamlinternalMod_update_mod"=>$caml_CamlinternalMod_update_mod,
         "caml_CamlinternalMod_init_mod"=>$caml_CamlinternalMod_init_mod,
         "eval"=>$eval,
         "caml_js_export_var"=>$caml_js_export_var,
         "caml_js_object"=>$caml_js_object,
         "caml_pure_js_expr"=>$caml_pure_js_expr,
         "caml_js_raw_expr"=>$caml_js_raw_expr,
         "caml_js_expr"=>$caml_js_expr,
         "caml_js_eval_string"=>$caml_js_eval_string,
         "caml_js_to_byte_string"=>$caml_js_to_byte_string,
         "caml_js_equals"=>$caml_js_equals,
         "caml_js_wrap_meth_callback_unsafe"=>
         $caml_js_wrap_meth_callback_unsafe,
         "caml_js_wrap_meth_callback_strict"=>
         $caml_js_wrap_meth_callback_strict,
         "caml_js_wrap_meth_callback_arguments"=>
         $caml_js_wrap_meth_callback_arguments,
         "caml_js_wrap_meth_callback"=>$caml_js_wrap_meth_callback,
         "caml_js_wrap_callback_strict"=>$caml_js_wrap_callback_strict,
         "caml_js_wrap_callback_arguments"=>$caml_js_wrap_callback_arguments,
         "caml_js_wrap_callback"=>$caml_js_wrap_callback,
         "caml_ojs_new_arr"=>$caml_ojs_new_arr,
         "caml_js_new"=>$caml_js_new,
         "caml_js_meth_call"=>$caml_js_meth_call,
         "caml_js_fun_call2"=>$caml_js_fun_call2,
         "caml_js_fun_call1"=>$caml_js_fun_call1,
         "caml_js_fun_call"=>$caml_js_fun_call,
         "caml_js_call"=>$caml_js_call,
         "caml_js_var"=>$caml_js_var,
         "caml_js_to_array"=>$caml_js_to_array,
         "caml_js_from_array"=>$caml_js_from_array,
         "caml_js_from_string"=>$caml_js_from_string,
         "caml_js_to_float"=>$caml_js_to_float,
         "caml_js_from_float"=>$caml_js_from_float,
         "caml_js_to_bool"=>$caml_js_to_bool,
         "caml_js_from_bool"=>$caml_js_from_bool,
         "js_print_stderr"=>$js_print_stderr,
         "js_print_stdout"=>$js_print_stdout,
         "caml_trampoline_return"=>$caml_trampoline_return,
         "caml_trampoline"=>$caml_trampoline,
         "caml_js_get_console"=>$caml_js_get_console,
         "caml_js_html_entities"=>$caml_js_html_entities,
         "caml_js_html_escape"=>$caml_js_html_escape,
         "caml_js_on_ie"=>$caml_js_on_ie,
         "caml_js_typeof"=>$caml_js_typeof,
         "caml_js_instanceof"=>$caml_js_instanceof,
         "caml_js_set"=>$caml_js_set,
         "caml_js_property_set"=>$caml_js_property_set,
         "caml_js_dict_set"=>$caml_js_dict_set,
         "caml_js_get"=>$caml_js_get,
         "caml_js_property_get"=>$caml_js_property_get,
         "caml_js_dict_get"=>$caml_js_dict_get,
         "caml_js_delete"=>$caml_js_delete,
         "caml_js_pure_expr"=>$caml_js_pure_expr,
         "MlNodeFile"=>$MlNodeFile,
         "MlNodeDevice"=>$MlNodeDevice,
         "fs_node_supported"=>$fs_node_supported,
         "MlFakeFile"=>$MlFakeFile,
         "MlFakeDevice"=>$MlFakeDevice,
         "caml_read_file_content"=>$caml_read_file_content,
         "caml_create_file"=>$caml_create_file,
         "caml_fs_init"=>$caml_fs_init,
         "caml_create_file_extern"=>$caml_create_file_extern,
         "caml_ba_map_file_bytecode"=>$caml_ba_map_file_bytecode,
         "caml_ba_map_file"=>$caml_ba_map_file,
         "caml_sys_rename"=>$caml_sys_rename,
         "caml_sys_is_directory"=>$caml_sys_is_directory,
         "caml_sys_remove"=>$caml_sys_remove,
         "caml_sys_read_directory"=>$caml_sys_read_directory,
         "caml_sys_file_exists"=>$caml_sys_file_exists,
         "caml_raise_not_a_dir"=>$caml_raise_not_a_dir,
         "caml_raise_no_such_file"=>$caml_raise_no_such_file,
         "caml_sys_chdir"=>$caml_sys_chdir,
         "caml_sys_getcwd"=>$caml_sys_getcwd,
         "caml_unmount"=>$caml_unmount,
         "caml_mount_autoload"=>$caml_mount_autoload,
         "resolve_fs_device"=>$resolve_fs_device,
         "caml_list_mount_point"=>$caml_list_mount_point,
         "jsoo_mount_point"=>$jsoo_mount_point,
         "caml_make_path"=>$caml_make_path,
         "MlFile"=>$MlFile,
         "caml_root"=>$caml_root,
         "caml_current_dir"=>$caml_current_dir,
         "caml_ml_output_int"=>$caml_ml_output_int,
         "caml_ml_pos_out_64"=>$caml_ml_pos_out_64,
         "caml_ml_pos_out"=>$caml_ml_pos_out,
         "caml_ml_seek_out_64"=>$caml_ml_seek_out_64,
         "caml_ml_seek_out"=>$caml_ml_seek_out,
         "caml_output_value"=>$caml_output_value,
         "caml_ml_output_char"=>$caml_ml_output_char,
         "caml_ml_output"=>$caml_ml_output,
         "caml_ml_output_bytes"=>$caml_ml_output_bytes,
         "caml_ml_flush"=>$caml_ml_flush,
         "caml_ml_input_scan_line"=>$caml_ml_input_scan_line,
         "caml_ml_pos_in_64"=>$caml_ml_pos_in_64,
         "caml_ml_pos_in"=>$caml_ml_pos_in,
         "caml_ml_seek_in_64"=>$caml_ml_seek_in_64,
         "caml_ml_seek_in"=>$caml_ml_seek_in,
         "caml_ml_input_int"=>$caml_ml_input_int,
         "caml_ml_input_char"=>$caml_ml_input_char,
         "caml_input_value"=>$caml_input_value,
         "caml_ml_input"=>$caml_ml_input,
         "caml_ml_may_refill_input"=>$caml_ml_may_refill_input,
         "caml_ml_refill_input"=>$caml_ml_refill_input,
         "caml_ml_set_channel_refill"=>$caml_ml_set_channel_refill,
         "caml_ml_set_channel_output"=>$caml_ml_set_channel_output,
         "caml_ml_channel_size_64"=>$caml_ml_channel_size_64,
         "caml_ml_channel_size"=>$caml_ml_channel_size,
         "caml_ml_close_channel"=>$caml_ml_close_channel,
         "caml_ml_set_binary_mode"=>$caml_ml_set_binary_mode,
         "caml_ml_open_descriptor_in"=>$caml_ml_open_descriptor_in,
         "caml_ml_open_descriptor_out"=>$caml_ml_open_descriptor_out,
         "caml_ml_out_channels_list"=>$caml_ml_out_channels_list,
         "caml_ml_channels"=>$caml_ml_channels,
         "caml_ml_set_channel_name"=>$caml_ml_set_channel_name,
         "caml_sys_open"=>$caml_sys_open,
         "caml_std_output"=>$caml_std_output,
         "caml_sys_close"=>$caml_sys_close,
         "is_in"=>$is_in,
         "isFinite"=>$isFinite,
         "isNaN"=>$isNaN,
         "SyntaxError"=>$SyntaxError,
         "Error"=>$Error,
         "ObjectLiteral"=>$ObjectLiteral,
         "NaN"=>$NaN,
         "is_int"=>$is_int,
         "polymorphic_log"=>$polymorphic_log,
         "Func"=>$Func,
         "RegExp"=>$RegExp,
         "ArrayLiteral"=>$ArrayLiteral,
         "right_shift_32"=>$right_shift_32,
         "left_shift_32"=>$left_shift_32,
         "unsigned_right_shift_32"=>$unsigned_right_shift_32,
         "caml_is_js"=>$caml_is_js,
         "caml_spacetime_only_works_for_native_code"=>
         $caml_spacetime_only_works_for_native_code,
         "caml_register_channel_for_spacetime"=>
         $caml_register_channel_for_spacetime,
         "caml_spacetime_enabled"=>$caml_spacetime_enabled,
         "caml_sys_isatty"=>$caml_sys_isatty,
         "caml_runtime_parameters"=>$caml_runtime_parameters,
         "caml_runtime_variant"=>$caml_runtime_variant,
         "caml_ml_runtime_warnings_enabled"=>$caml_ml_runtime_warnings_enabled,
         "caml_ml_enable_runtime_warnings"=>$caml_ml_enable_runtime_warnings,
         "caml_runtime_warnings"=>$caml_runtime_warnings,
         "caml_list_of_js_array"=>$caml_list_of_js_array,
         "caml_int64_bswap"=>$caml_int64_bswap,
         "caml_int32_bswap"=>$caml_int32_bswap,
         "caml_bswap16"=>$caml_bswap16,
         "caml_convert_raw_backtrace_slot"=>$caml_convert_raw_backtrace_slot,
         "caml_install_signal_handler"=>$caml_install_signal_handler,
         "caml_fresh_oo_id"=>$caml_fresh_oo_id,
         "caml_set_oo_id"=>$caml_set_oo_id,
         "caml_oo_last_id"=>$caml_oo_last_id,
         "unix_inet_addr_of_string"=>$unix_inet_addr_of_string,
         "caml_sys_get_argv"=>$caml_sys_get_argv,
         "caml_sys_exit"=>$caml_sys_exit,
         "caml_sys_getenv"=>$caml_sys_getenv,
         "caml_set_static_env"=>$caml_set_static_env,
         "caml_get_current_callstack"=>$caml_get_current_callstack,
         "caml_restore_raw_backtrace"=>$caml_restore_raw_backtrace,
         "caml_raw_backtrace_slot"=>$caml_raw_backtrace_slot,
         "caml_raw_backtrace_next_slot"=>$caml_raw_backtrace_next_slot,
         "caml_raw_backtrace_length"=>$caml_raw_backtrace_length,
         "caml_convert_raw_backtrace"=>$caml_convert_raw_backtrace,
         "caml_record_backtrace"=>$caml_record_backtrace,
         "caml_get_exception_raw_backtrace"=>$caml_get_exception_raw_backtrace,
         "caml_get_exception_backtrace"=>$caml_get_exception_backtrace,
         "caml_backtrace_status"=>$caml_backtrace_status,
         "caml_final_release"=>$caml_final_release,
         "caml_final_register_called_without_value"=>
         $caml_final_register_called_without_value,
         "caml_final_register"=>$caml_final_register,
         "caml_get_public_method"=>$caml_get_public_method,
         "caml_array_blit"=>$caml_array_blit,
         "caml_array_concat"=>$caml_array_concat,
         "caml_array_append"=>$caml_array_append,
         "caml_array_sub"=>$caml_array_sub,
         "caml_sys_system_command"=>$caml_sys_system_command,
         "caml_sys_const_ostype_win32"=>$caml_sys_const_ostype_win32,
         "caml_sys_const_ostype_unix"=>$caml_sys_const_ostype_unix,
         "caml_sys_const_ostype_cygwin"=>$caml_sys_const_ostype_cygwin,
         "caml_sys_const_max_wosize"=>$caml_sys_const_max_wosize,
         "caml_sys_const_int_size"=>$caml_sys_const_int_size,
         "caml_sys_const_word_size"=>$caml_sys_const_word_size,
         "caml_sys_const_big_endian"=>$caml_sys_const_big_endian,
         "caml_sys_random_seed"=>$caml_sys_random_seed,
         "caml_sys_const_backend_type"=>$caml_sys_const_backend_type,
         "caml_sys_get_config"=>$caml_sys_get_config,
         "caml_sys_time"=>$caml_sys_time,
         "caml_hash"=>$caml_hash,
         "caml_hash_mix_string"=>$caml_hash_mix_string,
         "caml_hash_mix_string_arr"=>$caml_hash_mix_string_arr,
         "caml_hash_mix_string_str"=>$caml_hash_mix_string_str,
         "caml_hash_mix_int64"=>$caml_hash_mix_int64,
         "caml_hash_mix_float"=>$caml_hash_mix_float,
         "caml_hash_mix_final"=>$caml_hash_mix_final,
         "caml_hash_mix_int"=>$caml_hash_mix_int,
         "caml_hash_univ_param"=>$caml_hash_univ_param,
         "caml_format_float"=>$caml_format_float,
         "caml_format_int"=>$caml_format_int,
         "caml_finish_formatting"=>$caml_finish_formatting,
         "caml_parse_format"=>$caml_parse_format,
         "caml_is_printable"=>$caml_is_printable,
         "caml_float_of_string"=>$caml_float_of_string,
         "parseInt"=>$parseInt,
         "caml_int_of_string"=>$caml_int_of_string,
         "caml_parse_digit"=>$caml_parse_digit,
         "caml_parse_sign_and_base"=>$caml_parse_sign_and_base,
         "caml_lessthan"=>$caml_lessthan,
         "caml_lessequal"=>$caml_lessequal,
         "caml_greaterthan"=>$caml_greaterthan,
         "caml_greaterequal"=>$caml_greaterequal,
         "caml_notequal"=>$caml_notequal,
         "caml_equal"=>$caml_equal,
         "caml_int_compare"=>$caml_int_compare,
         "caml_compare"=>$caml_compare,
         "caml_compare_val"=>$caml_compare_val,
         "caml_floatarray_create"=>$caml_floatarray_create,
         "caml_make_float_vect"=>$caml_make_float_vect,
         "caml_make_vect"=>$caml_make_vect,
         "caml_check_bound"=>$caml_check_bound,
         "caml_array_get"=>$caml_array_get,
         "caml_array_set"=>$caml_array_set,
         "caml_mod"=>$caml_mod,
         "caml_div"=>$caml_div,
         "caml_mul"=>$caml_mul,
         "caml_lazy_make_forward"=>$caml_lazy_make_forward,
         "caml_obj_truncate"=>$caml_obj_truncate,
         "caml_obj_dup"=>$caml_obj_dup,
         "caml_obj_block"=>$caml_obj_block,
         "caml_obj_set_tag"=>$caml_obj_set_tag,
         "caml_obj_tag"=>$caml_obj_tag,
         "caml_obj_is_block"=>$caml_obj_is_block,
         "caml_update_dummy"=>$caml_update_dummy,
         "caml_array_bound_error"=>$caml_array_bound_error,
         "caml_raise_not_found"=>$caml_raise_not_found,
         "caml_raise_zero_divide"=>$caml_raise_zero_divide,
         "caml_raise_end_of_file"=>$caml_raise_end_of_file,
         "caml_invalid_argument"=>$caml_invalid_argument,
         "caml_alloc_dummy_function"=>$caml_alloc_dummy_function,
         "caml_js_error_of_exception"=>$caml_js_error_of_exception,
         "caml_failwith"=>$caml_failwith,
         "caml_raise_sys_error"=>$caml_raise_sys_error,
         "caml_raise_with_string"=>$caml_raise_with_string,
         "caml_raise_with_arg"=>$caml_raise_with_arg,
         "caml_raise_constant"=>$caml_raise_constant,
         "caml_wrap_thrown_exception_traceless"=>
         $caml_wrap_thrown_exception_traceless,
         "caml_wrap_thrown_exception_reraise"=>
         $caml_wrap_thrown_exception_reraise,
         "caml_wrap_thrown_exception"=>$caml_wrap_thrown_exception,
         "caml_wrap_exception"=>$caml_wrap_exception,
         "String"=>$String,
         "caml_return_exn_constant"=>$caml_return_exn_constant,
         "caml_get_global_data"=>$caml_get_global_data,
         "caml_register_global"=>$caml_register_global,
         "caml_global_data"=>$caml_global_data,
         "caml_named_value"=>$caml_named_value,
         "caml_register_named_value"=>$caml_register_named_value,
         "caml_named_values"=>$caml_named_values,
         "caml_call_gen"=>$caml_call_gen,
         "caml_arity_test"=>$caml_arity_test,
         "raw_array_append_one"=>$raw_array_append_one,
         "raw_array_cons"=>$raw_array_cons,
         "raw_array_copy"=>$raw_array_copy,
         "raw_array_sub"=>$raw_array_sub,
         "win_handle_fd"=>$win_handle_fd,
         "win_cleanup"=>$win_cleanup,
         "win_startup"=>$win_startup,
         "unix_mktime"=>$unix_mktime,
         "unix_localtime"=>$unix_localtime,
         "unix_gmtime"=>$unix_gmtime,
         "unix_time"=>$unix_time,
         "unix_gettimeofday"=>$unix_gettimeofday,
         "caml_ba_reshape"=>$caml_ba_reshape,
         "caml_ba_slice"=>$caml_ba_slice,
         "caml_ba_sub"=>$caml_ba_sub,
         "caml_ba_fill"=>$caml_ba_fill,
         "caml_ba_blit"=>$caml_ba_blit,
         "caml_ba_set_3"=>$caml_ba_set_3,
         "caml_ba_set_2"=>$caml_ba_set_2,
         "caml_ba_set_1"=>$caml_ba_set_1,
         "caml_ba_uint8_set64"=>$caml_ba_uint8_set64,
         "caml_ba_uint8_set32"=>$caml_ba_uint8_set32,
         "caml_ba_uint8_set16"=>$caml_ba_uint8_set16,
         "caml_ba_set_generic"=>$caml_ba_set_generic,
         "caml_ba_get_3"=>$caml_ba_get_3,
         "caml_ba_get_2"=>$caml_ba_get_2,
         "caml_ba_get_1"=>$caml_ba_get_1,
         "caml_ba_uint8_get64"=>$caml_ba_uint8_get64,
         "caml_ba_uint8_get32"=>$caml_ba_uint8_get32,
         "caml_ba_uint8_get16"=>$caml_ba_uint8_get16,
         "caml_ba_get_generic"=>$caml_ba_get_generic,
         "caml_ba_dim_3"=>$caml_ba_dim_3,
         "caml_ba_dim_2"=>$caml_ba_dim_2,
         "caml_ba_dim_1"=>$caml_ba_dim_1,
         "caml_ba_dim"=>$caml_ba_dim,
         "caml_ba_num_dims"=>$caml_ba_num_dims,
         "caml_ba_layout"=>$caml_ba_layout,
         "caml_ba_kind"=>$caml_ba_kind,
         "caml_ba_change_layout"=>$caml_ba_change_layout,
         "caml_ba_create"=>$caml_ba_create,
         "caml_ba_create_from"=>$caml_ba_create_from,
         "caml_ba_views"=>$caml_ba_views,
         "caml_ba_get_size"=>$caml_ba_get_size,
         "caml_ba_init_views"=>$caml_ba_init_views,
         "caml_ba_init"=>$caml_ba_init,
         "caml_set_parser_trace"=>$caml_set_parser_trace,
         "caml_parse_engine"=>$caml_parse_engine,
         "caml_new_lex_engine"=>$caml_new_lex_engine,
         "caml_lex_engine"=>$caml_lex_engine,
         "caml_lex_array"=>$caml_lex_array,
         "caml_output_value_to_buffer"=>$caml_output_value_to_buffer,
         "caml_output_value_to_bytes"=>$caml_output_value_to_bytes,
         "caml_output_value_to_string"=>$caml_output_value_to_string,
         "caml_output_val"=>$caml_output_val,
         "caml_marshal_data_size"=>$caml_marshal_data_size,
         "caml_input_value_from_reader"=>$caml_input_value_from_reader,
         "caml_input_value_from_bytes"=>$caml_input_value_from_bytes,
         "caml_input_value_from_string"=>$caml_input_value_from_string,
         "caml_float_of_bytes"=>$caml_float_of_bytes,
         "BigStringReader"=>$BigStringReader,
         "MlBytesReader"=>$MlBytesReader,
         "caml_marshal_constants"=>$caml_marshal_constants,
         "caml_md5_string"=>$caml_md5_string,
         "caml_md5_chan"=>$caml_md5_chan,
         "caml_int64_to_bytes"=>$caml_int64_to_bytes,
         "caml_int64_of_bytes"=>$caml_int64_of_bytes,
         "caml_int64_of_string"=>$caml_int64_of_string,
         "caml_int64_format"=>$caml_int64_format,
         "caml_int64_of_float"=>$caml_int64_of_float,
         "caml_int64_to_float"=>$caml_int64_to_float,
         "caml_int64_to_int32"=>$caml_int64_to_int32,
         "caml_int64_of_int32"=>$caml_int64_of_int32,
         "caml_int64_mod"=>$caml_int64_mod,
         "caml_int64_div"=>$caml_int64_div,
         "caml_int64_udivmod"=>$caml_int64_udivmod,
         "caml_int64_lsr1"=>$caml_int64_lsr1,
         "caml_int64_lsl1"=>$caml_int64_lsl1,
         "caml_int64_shift_right"=>$caml_int64_shift_right,
         "caml_int64_shift_right_unsigned"=>$caml_int64_shift_right_unsigned,
         "caml_int64_shift_left"=>$caml_int64_shift_left,
         "caml_int64_xor"=>$caml_int64_xor,
         "caml_int64_or"=>$caml_int64_or,
         "caml_int64_and"=>$caml_int64_and,
         "caml_int64_is_minus_one"=>$caml_int64_is_minus_one,
         "caml_int64_is_min_int"=>$caml_int64_is_min_int,
         "caml_int64_is_negative"=>$caml_int64_is_negative,
         "caml_int64_is_zero"=>$caml_int64_is_zero,
         "caml_int64_mul"=>$caml_int64_mul,
         "caml_int64_sub"=>$caml_int64_sub,
         "caml_int64_add"=>$caml_int64_add,
         "caml_int64_neg"=>$caml_int64_neg,
         "caml_int64_compare"=>$caml_int64_compare,
         "caml_int64_ult"=>$caml_int64_ult,
         "caml_int64_ucompare"=>$caml_int64_ucompare,
         "caml_int64_offset"=>$caml_int64_offset,
         "caml_tanh_float"=>$caml_tanh_float,
         "caml_sinh_float"=>$caml_sinh_float,
         "caml_cosh_float"=>$caml_cosh_float,
         "caml_log10_float"=>$caml_log10_float,
         "caml_hypot_float"=>$caml_hypot_float,
         "caml_log1p_float"=>$caml_log1p_float,
         "caml_expm1_float"=>$caml_expm1_float,
         "caml_copysign_float"=>$caml_copysign_float,
         "caml_float_compare"=>$caml_float_compare,
         "caml_frexp_float"=>$caml_frexp_float,
         "caml_ldexp_float"=>$caml_ldexp_float,
         "caml_modf_float"=>$caml_modf_float,
         "caml_classify_float"=>$caml_classify_float,
         "caml_int32_float_of_bits"=>$caml_int32_float_of_bits,
         "caml_int64_float_of_bits"=>$caml_int64_float_of_bits,
         "caml_hexstring_of_float"=>$caml_hexstring_of_float,
         "caml_int32_bits_of_float"=>$caml_int32_bits_of_float,
         "caml_int64_bits_of_float"=>$caml_int64_bits_of_float,
         "jsoo_floor_log2"=>$jsoo_floor_log2,
         "caml_bytes_of_string"=>$caml_bytes_of_string,
         "caml_string_of_bytes"=>$caml_string_of_bytes,
         "caml_ml_bytes_length"=>$caml_ml_bytes_length,
         "caml_ml_string_length"=>$caml_ml_string_length,
         "caml_blit_string"=>$caml_blit_string,
         "caml_blit_bytes"=>$caml_blit_bytes,
         "caml_fill_string"=>$caml_fill_string,
         "caml_fill_bytes"=>$caml_fill_bytes,
         "caml_bytes_greaterthan"=>$caml_bytes_greaterthan,
         "caml_string_greaterthan"=>$caml_string_greaterthan,
         "caml_bytes_greaterequal"=>$caml_bytes_greaterequal,
         "caml_string_greaterequal"=>$caml_string_greaterequal,
         "caml_bytes_lessthan"=>$caml_bytes_lessthan,
         "caml_string_lessthan"=>$caml_string_lessthan,
         "caml_bytes_lessequal"=>$caml_bytes_lessequal,
         "caml_string_lessequal"=>$caml_string_lessequal,
         "caml_bytes_notequal"=>$caml_bytes_notequal,
         "caml_string_notequal"=>$caml_string_notequal,
         "caml_bytes_equal"=>$caml_bytes_equal,
         "caml_string_equal"=>$caml_string_equal,
         "caml_bytes_compare"=>$caml_bytes_compare,
         "caml_string_compare"=>$caml_string_compare,
         "caml_string_of_array"=>$caml_string_of_array,
         "caml_new_string"=>$caml_new_string,
         "caml_new_string_impl"=>$caml_new_string_impl,
         "caml_create_bytes"=>$caml_create_bytes,
         "caml_create_string"=>$caml_create_string,
         "caml_js_to_string"=>$caml_js_to_string,
         "caml_jsbytes_of_string"=>$caml_jsbytes_of_string,
         "caml_array_of_string"=>$caml_array_of_string,
         "caml_convert_string_to_array"=>$caml_convert_string_to_array,
         "caml_convert_string_to_bytes"=>$caml_convert_string_to_bytes,
         "MlBytes"=>$MlBytes,
         "caml_bytes_set"=>$caml_bytes_set,
         "caml_string_set64"=>$caml_string_set64,
         "caml_bytes_set64"=>$caml_bytes_set64,
         "caml_string_set32"=>$caml_string_set32,
         "caml_bytes_set32"=>$caml_bytes_set32,
         "caml_string_set16"=>$caml_string_set16,
         "caml_bytes_set16"=>$caml_bytes_set16,
         "caml_string_set"=>$caml_string_set,
         "caml_bytes_get"=>$caml_bytes_get,
         "caml_bytes_get64"=>$caml_bytes_get64,
         "caml_string_get64"=>$caml_string_get64,
         "caml_bytes_get32"=>$caml_bytes_get32,
         "caml_string_get32"=>$caml_string_get32,
         "caml_bytes_get16"=>$caml_bytes_get16,
         "caml_string_get16"=>$caml_string_get16,
         "caml_string_get"=>$caml_string_get,
         "caml_string_bound_error"=>$caml_string_bound_error,
         "caml_string_unsafe_set"=>$caml_string_unsafe_set,
         "caml_bytes_unsafe_set"=>$caml_bytes_unsafe_set,
         "caml_bytes_unsafe_get"=>$caml_bytes_unsafe_get,
         "caml_string_unsafe_get"=>$caml_string_unsafe_get,
         "caml_to_js_string"=>$caml_to_js_string,
         "caml_is_ascii"=>$caml_is_ascii,
         "caml_utf16_of_utf8"=>$caml_utf16_of_utf8,
         "caml_utf8_of_utf16"=>$caml_utf8_of_utf16,
         "caml_subarray_to_string"=>$caml_subarray_to_string,
         "caml_str_repeat"=>$caml_str_repeat]
      );
    
    
    
    $caml_fs_init();
    
    $caml_register_global(
      0,
      V(248, $caml_new_string("Out_of_memory"), 0),
      "Out_of_memory"
    );
    
    $caml_register_global(
      1,
      V(248, $caml_new_string("Sys_error"), -1),
      "Sys_error"
    );
    
    $caml_register_global(
      2,
      V(248, $caml_new_string("Failure"), -2),
      "Failure"
    );
    
    $caml_register_global(
      3,
      V(248, $caml_new_string("Invalid_argument"), -3),
      "Invalid_argument"
    );
    
    $caml_register_global(
      4,
      V(248, $caml_new_string("End_of_file"), -4),
      "End_of_file"
    );
    
    $caml_register_global(
      5,
      V(248, $caml_new_string("Division_by_zero"), -5),
      "Division_by_zero"
    );
    
    $caml_register_global(
      6,
      V(248, $caml_new_string("Not_found"), -6),
      "Not_found"
    );
    
    $caml_register_global(
      7,
      V(248, $caml_new_string("Match_failure"), -7),
      "Match_failure"
    );
    
    $caml_register_global(
      8,
      V(248, $caml_new_string("Stack_overflow"), -8),
      "Stack_overflow"
    );
    
    $caml_register_global(
      9,
      V(248, $caml_new_string("Sys_blocked_io"), -9),
      "Sys_blocked_io"
    );
    
    $caml_register_global(
      10,
      V(248, $caml_new_string("Assert_failure"), -10),
      "Assert_failure"
    );
    
    $caml_register_global(
      11,
      V(248, $caml_new_string("Undefined_recursive_module"), -11),
      "Undefined_recursive_module"
    );

  }
}