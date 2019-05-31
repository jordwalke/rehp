<?hh


$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};


$raw_array_sub = $Func(
  function($a, $i, $l) use ($Array, $plus) {
    $b = $Array->new($l);
    for ($j = 0; $j < $l; $j++)
      $b[$j] = $a[$plus($i, $j)];
    return $b;
  },
);
$caml_subarray_to_string = $Func(
  function($a, $i, $len) use ($Math, $String, $eqEq, $plus, $raw_array_sub) {
    $f = $String->fromCharCode;
    if ($i == 0 && $len <= 4096 && $eqEq($len, $a->length)) {
      return $f->apply(varray[], $a);
    }
    $s = $String->new("");
    for (; 0 < $len; ($i += 1024) || true ? $len -= 1024 : ($len -= 1024))
      $s = $plus(
        $s,
        $f->apply(varray[], $raw_array_sub($a, $i, $Math->min($len, 1024))),
      );
    return $s;
  },
);
$caml_convert_string_to_array = $Func(
  function($s) use ($Array, $joo_global_object) {
    if ($joo_global_object->Uint8Array) {
      $a = $joo_global_object->Uint8Array->new($s->l);
    } else {
      $a = $Array->new($s->l);
    }
    $b = $s->c;
    $l = $b->length;
    $i = 0;
    for (; $i < $l; $i++)
      $a[$i] = $b->charCodeAt($i);
    for ($l = $s->l; $i < $l; $i++)
      $a[$i] = 0;
    $s->c = $a;
    $s->t = 4;
    return $a;
  },
);
$caml_blit_bytes = $Func(
  function($s1, $i1, $s2, $i2, $len) use (
    $Math,
    $caml_convert_string_to_array,
    $caml_subarray_to_string,
    $eqEq,
    $plus,
  ) {
    if ($len == 0) {
      return 0;
    }
    if ($i2 == 0 && ($len >= $s2->l || $s2->t == 2 && $len >= $s2->c->length)) {
      $s2->c = $s1->t == 4
        ? $caml_subarray_to_string($s1->c, $i1, $len)
        : (
            $i1 == 0 && $eqEq($s1->c->length, $len)
              ? $s1->c
              : ($s1->c->substr($i1, $len))
          );
      $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
    } else {
      if ($s2->t == 2 && $eqEq($i2, $s2->c->length)) {
        $s2->c = $plus(
          $s2->c,
          $s1->t == 4
            ? $caml_subarray_to_string($s1->c, $i1, $len)
            : (
                $i1 == 0 && $eqEq($s1->c->length, $len)
                  ? $s1->c
                  : ($s1->c->substr($i1, $len))
              ),
        );
        $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
      } else {
        if ($s2->t != 4) {
          $caml_convert_string_to_array($s2);
        }
        $c1 = $s1->c;
        $c2 = $s2->c;
        if ($s1->t == 4) {
          if ($i2 <= $i1) {
            for ($i = 0; $i < $len; $i++)
              $c2[$plus($i2, $i)] = $c1[$plus($i1, $i)];
          } else {
            for ($i = $len - 1; $i >= 0; $i--)
              $c2[$plus($i2, $i)] = $c1[$plus($i1, $i)];
          }
        } else {
          $l = $Math->min($len, $c1->length - $i1);
          for ($i = 0; $i < $l; $i++)
            $c2[$plus($i2, $i)] = $c1->charCodeAt($plus($i1, $i));
          for (; $i < $len; $i++)
            $c2[$plus($i2, $i)] = 0;
        }
      }
    }
    return 0;
  },
);
$caml_blit_string = $Func(
  function($s1, $i1, $s2, $i2, $len) use ($caml_blit_bytes) {
    return $caml_blit_bytes($s1, $i1, $s2, $i2, $len);
  },
);


$Func = $joo_global_object->Func;


$raw_array_append_one = $Func(
  function($a, $x) use ($Array) {
    $l = $a->length;
    $b = $Array->new($l + 1);
    $i = 0;
    for (; $i < $l; $i++)
      $b[$i] = $a[$i];
    $b[$i] = $x;
    return $b;
  },
);


$caml_call_gen = new Ref();
$caml_call_gen->contents = function($f, $args) use (
  $Func,
  $caml_arity_test,
  $caml_call_gen,
  $raw_array_append_one,
  $raw_array_sub,
) {
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
        $raw_array_sub($args, $n, $argsLen - $n),
      );
    } else {
      return
        function($x) use ($args, $caml_call_gen, $f, $raw_array_append_one) {
          return $caml_call_gen->contents($f, $raw_array_append_one($args, $x));
        };
    }
  }
};
$caml_call_gen = $caml_call_gen->contents;


$caml_str_repeat = $Func(
  function($n, $s) use ($String, $plus, $right_shift_32) {
    if ($s->repeat) {
      return $s->repeat($n);
    }
    $r = $String->new("");
    $l = 0;
    if ($n == 0) {
      return $r;
    }
    for (; ; ) {
      if ($n & 1) {
        $r = $plus($r, $s);
      }
      $n = $right_shift_32($n, 1);
      if ($n == 0) {
        return $r;
      }
      $s = $plus($s, $s);
      $l++;
      if ($l == 9) {
        $s->slice(0, 1);
      }
    }
  },
);
$caml_convert_string_to_bytes = $Func(
  function($s) use (
    $String,
    $caml_str_repeat,
    $caml_subarray_to_string,
    $plus,
  ) {
    if ($s->t == 2) {
      $s->c = $plus(
        $s->c,
        $caml_str_repeat($s->l - $s->c->length, $String->new("\0")),
      );
    } else {
      $s->c = $caml_subarray_to_string($s->c, 0, $s->c->length);
    }
    $s->t = 0;
  },
);
$caml_is_ascii = $Func(
  function($s) use ($RegExp, $String) {
    if ($s->length < 24) {
      for ($i = 0; $i < $s->length; $i++)
        if ($s->charCodeAt($i) > 127) {
          return false;
        }
      return true;
    } else {
      return !$RegExp->new($String->new("[^\\x00-\\x7f]"))->test($s);
    }
  },
);
$caml_utf16_of_utf8 = $Func(
  function($s) use ($String, $eqEq, $left_shift_32, $plus, $right_shift_32) {
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
        for ($j = $i + 1; $j < $l && ($c1 = $s->charCodeAt($j)) < 128; $j++)
          ;
        if ($j - $i > 512) {
          $t->substr(0, 1);
          $b = $plus($b, $t);
          $t = $String->new("");
          $b = $plus($b, $s->slice($i, $j));
        } else {
          $t = $plus($t, $s->slice($i, $j));
        }
        if ($eqEq($j, $l)) {
          break;
        }
        $i = $j;
      }
      $v = 1;
      if (++$i < $l && (($c2 = $s->charCodeAt($i)) & -64) == 128) {
        $c = $c2 + $left_shift_32($c1, 6);
        if ($c1 < 224) {
          $v = $c - 12416;
          if ($v < 128) {
            $v = 1;
          }
        } else {
          $v = 2;
          if (++$i < $l && (($c2 = $s->charCodeAt($i)) & -64) == 128) {
            $c = $c2 + $left_shift_32($c, 6);
            if ($c1 < 240) {
              $v = $c - 925824;
              if ($v < 2048 || $v >= 55295 && $v < 57344) {
                $v = 2;
              }
            } else {
              $v = 3;
              if (
                ++$i < $l &&
                (($c2 = $s->charCodeAt($i)) & -64) == 128 &&
                $c1 < 245
              ) {
                $v = $c2 - 63447168 + $left_shift_32($c, 6);
                if ($v < 65536 || $v > 1114111) {
                  $v = 3;
                }
              }
            }
          }
        }
      }
      if ($v < 4) {
        $i -= $v;
        $t = $plus($t, $String->new("\ufffd"));
      } else {
        if ($v > 65535) {
          $t = $plus(
            $t,
            $String->fromCharCode(
              55232 + $right_shift_32($v, 10),
              56320 + ($v & 1023),
            ),
          );
        } else {
          $t = $plus($t, $String->fromCharCode($v));
        }
      }
      if ($t->length > 1024) {
        $t->substr(0, 1);
        $b = $plus($b, $t);
        $t = $String->new("");
      }
    }
    return $plus($b, $t);
  },
);
$caml_to_js_string = $Func(
  function($s) use ($caml_convert_string_to_bytes, $caml_is_ascii) {
    switch ($s->t) {
        // FALLTHROUGH
      case 9:
        return $s->c;
        // FALLTHROUGH
      default:
        $caml_convert_string_to_bytes($s);
        // FALLTHROUGH
      case 0:
        if ($caml_is_ascii($s->c)) {
          $s->t = 9;
          return $s->c;
        }
        $s->t = 8;
        // FALLTHROUGH
      case 8:
        return $s->c;
    }
  },
);
$MlBytes = $Func(
  function($tag, $contents, $length) use ($joo_global_object) {
    $joo_global_object->context->t = $tag;
    $joo_global_object->context->c = $contents;
    $joo_global_object->context->l = $length;
  },
);

$MlBytes->prototype->toString = $Func(
  function() use ($caml_to_js_string, $joo_global_object) {
    return $caml_to_js_string($joo_global_object->context);
  },
);

$MlBytes->prototype->slice = $Func(
  function() use ($MlBytes, $joo_global_object) {
    $content = $joo_global_object->context->t == 4
      ? $joo_global_object->context->c->slice()
      : ($joo_global_object->context->c);
    return $MlBytes->new(
      $joo_global_object->context->t,
      $content,
      $joo_global_object->context->l,
    );
  },
);


$String = $joo_global_object->String;


$caml_named_values = $ObjectLiteral((object)darray[]);
$caml_named_value = $Func(
  function($nm) use ($caml_named_values) {
    return $caml_named_values[$nm];
  },
);
$caml_global_data = varray[0];


$caml_wrap_thrown_exception = function($e) use ($String, $caml_global_data) {
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
  if ($e instanceof \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(
      R(0, $String->new("phpError"), $e),
      $e->getCode(),
      $e,
    );
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};


$caml_raise_with_arg = $Func(
  function($tag, $arg) use ($caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(varray[0, $tag, $arg]) as \Throwable;
  },
);
$caml_new_string_impl = $Func(
  function($s) use ($MlBytes) {
    return $MlBytes->new(0, $s, $s->length);
  },
);
$caml_new_string = $Func(
  function($s) use ($String, $caml_new_string_impl) {
    if (!instance_of($s, $String)) {
      return $caml_new_string_impl($String->new($s));
    }
    return $caml_new_string_impl($s);
  },
);
$caml_raise_with_string = $Func(
  function($tag, $msg) use ($caml_new_string, $caml_raise_with_arg) {
    $caml_raise_with_arg($tag, $caml_new_string($msg));
  },
);
$caml_invalid_argument = $Func(
  function($msg) use ($caml_global_data, $caml_raise_with_string) {
    $caml_raise_with_string($caml_global_data->Invalid_argument, $msg);
  },
);
$caml_create_bytes = $Func(
  function($len) use ($MlBytes, $String, $caml_invalid_argument) {
    if ($len < 0) {
      $caml_invalid_argument($String->new("Bytes.create"));
    }
    return $MlBytes->new($len ? 2 : (9), $String->new(""), $len);
  },
);
$caml_oo_last_id = 0;
$caml_fresh_oo_id = $Func(
  function() use ($caml_oo_last_id) {
    return $caml_oo_last_id++;
  },
);
$caml_raise_sys_error = $Func(
  function($msg) use ($caml_global_data, $caml_raise_with_string) {
    $caml_raise_with_string($caml_global_data->Sys_error, $msg);
  },
);
$caml_ml_channels = $Array->new();
$caml_ml_flush = $Func(
  function($chanid) use (
    $String,
    $caml_global_data,
    $caml_ml_channels,
    $caml_raise_sys_error,
    $eqEq,
  ) {
    $chan = $caml_ml_channels[$chanid];
    if (!$chan->opened) {
      $caml_raise_sys_error($String->new("Cannot flush a closed channel"));
    }
    if (!$chan->buffer || $eqEq($chan->buffer, $String->new(""))) {
      return 0;
    }
    if (
      $chan->fd &&
      $caml_global_data->fds[$chan->fd] &&
      $caml_global_data->fds[$chan->fd]->output
    ) {
      $output = $caml_global_data->fds[$chan->fd]->output;
      switch ($output->length) {
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
  },
);

if ($joo_global_object->process && $joo_global_object->process->cwd) {
  $caml_current_dir = $joo_global_object->process->cwd()->replace(
    $RegExp->new($String->new("\\\\"), $String->new("g")),
    $String->new("/"),
  );
} else {
  $caml_current_dir = $String->new("/static");
}

if (!$eqEqEq($caml_current_dir->slice(-1), $String->new("/"))) {
  $caml_current_dir = $plus($caml_current_dir, $String->new("/"));
}

$caml_make_path = $Func(
  function($name) use ($MlBytes, $String, $caml_current_dir, $plus) {
    $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
    if ($name->charCodeAt(0) != 47) {
      $name = $plus($caml_current_dir, $name);
    }
    $comp = $name->split($String->new("/"));
    $ncomp = varray[];
    for ($i = 0; $i < $comp->length; $i++) {
      switch ($comp[$i]) {
          // FALLTHROUGH
        case $String->new(".."):
          if ($ncomp->length > 1) {
            $ncomp->pop();
          }
          break;
          // FALLTHROUGH
        case $String->new("."):
          break;
          // FALLTHROUGH
        case $String->new(""):
          if ($ncomp->length == 0) {
            $ncomp->push($String->new(""));
          }
          break;
          // FALLTHROUGH
        default:
          $ncomp->push($comp[$i]);
          break;
      }
    }
    $ncomp->orig = $name;
    return $ncomp;
  },
);
$caml_raise_no_such_file = $Func(
  function($name) use ($MlBytes, $String, $caml_raise_sys_error, $plus) {
    $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
    $caml_raise_sys_error(
      $plus($name, $String->new(": No such file or directory")),
    );
  },
);
$caml_string_of_array = $Func(
  function($a) use ($MlBytes) {
    return $MlBytes->new(4, $a, $a->length);
  },
);
$caml_string_bound_error = $Func(
  function() use ($String, $caml_invalid_argument) {
    $caml_invalid_argument($String->new("index out of bounds"));
  },
);
$caml_bytes_unsafe_get = $Func(
  function($s, $i) {
    switch ($s->t & 6) {
        // FALLTHROUGH
      default:
        if ($i >= $s->c->length) {
          return 0;
        }
        // FALLTHROUGH
      case 0:
        return $s->c->charCodeAt($i) | 0;
        // FALLTHROUGH
      case 4:
        return $s->c[$i];
    }
  },
);
$caml_bytes_get = $Func(
  function($s, $i) use (
    $caml_bytes_unsafe_get,
    $caml_string_bound_error,
    $unsigned_right_shift_32,
  ) {
    if ($unsigned_right_shift_32($i, 0) >= $s->l) {
      $caml_string_bound_error();
    }
    return $caml_bytes_unsafe_get($s, $i);
  },
);
$caml_ml_bytes_length = $Func(function($s) {
  return $s->l;
});
$MlFile = $Func(function() {});
$MlFakeFile = $Func(
  function($content) use ($joo_global_object) {
    $joo_global_object->context->data = $content;
  },
);

$MlFakeFile->prototype = $MlFile->new();

$MlFakeFile->prototype->truncate = $Func(
  function($len) use (
    $caml_blit_bytes,
    $caml_create_bytes,
    $joo_global_object,
  ) {
    $old = $joo_global_object->context->data;
    $joo_global_object->context->data = $caml_create_bytes($len | 0);
    $caml_blit_bytes($old, 0, $joo_global_object->context->data, 0, $len);
  },
);

$MlFakeFile->prototype->length = $Func(
  function() use ($caml_ml_bytes_length, $joo_global_object) {
    return $caml_ml_bytes_length($joo_global_object->context->data);
  },
);

$MlFakeFile->prototype->write = $Func(
  function($offset, $buf, $pos, $len) use (
    $caml_blit_bytes,
    $caml_create_bytes,
    $joo_global_object,
    $plus,
  ) {
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
        $clen,
      );
    }
    $caml_blit_bytes(
      $buf,
      $pos,
      $joo_global_object->context->data,
      $offset,
      $len,
    );
    return 0;
  },
);

$MlFakeFile->prototype->read = $Func(
  function($offset, $buf, $pos, $len) use (
    $caml_blit_bytes,
    $joo_global_object,
  ) {
    $clen = $joo_global_object->context->length();
    $caml_blit_bytes(
      $joo_global_object->context->data,
      $offset,
      $buf,
      $pos,
      $len,
    );
    return 0;
  },
);

$MlFakeFile->prototype->read_one = $Func(
  function($offset) use ($caml_bytes_get, $joo_global_object) {
    return $caml_bytes_get($joo_global_object->context->data, $offset);
  },
);

$MlFakeFile->prototype->close = $Func(function() {});

$MlFakeFile->prototype->constructor = $MlFakeFile;

$MlFakeDevice = $Func(
  function($root, $f) use ($ObjectLiteral, $joo_global_object) {
    $joo_global_object->context->content = $ObjectLiteral((object)darray[]);
    $joo_global_object->context->root = $root;
    $joo_global_object->context->lookupFun = $f;
  },
);

$MlFakeDevice->prototype->nm = $Func(
  function($name) use ($joo_global_object, $plus) {
    return $plus($joo_global_object->context->root, $name);
  },
);

$MlFakeDevice->prototype->lookup = $Func(
  function($name) use ($MlFakeFile, $caml_new_string, $joo_global_object) {
    if (
      !$joo_global_object->context->content[$name] &&
      $joo_global_object->context->lookupFun
    ) {
      $res = $joo_global_object->context->lookupFun(
        $caml_new_string($joo_global_object->context->root),
        $caml_new_string($name),
      );
      if ($res != 0) {
        $joo_global_object->context->content[$name] = $MlFakeFile->new($res[1]);
      }
    }
  },
);

$MlFakeDevice->prototype->exists = $Func(
  function($name) use ($RegExp, $String, $eqEq, $joo_global_object, $plus) {
    if ($eqEq($name, $String->new(""))) {
      return 1;
    }
    $name_slash = $plus($name, $String->new("/"));
    $r = $RegExp->new($plus($String->new("^"), $name_slash));
    foreach (
      $joo_global_object->context->content->__all_enumerable_keys() as

        $n => $____
    ) {
      if ($n->match($r)) {
        return 1;
      }
    }
    $joo_global_object->context->lookup($name);
    return $joo_global_object->context->content[$name] ? 1 : (0);
  },
);

$MlFakeDevice->prototype->readdir = $Func(
  function($name) use (
    $ObjectLiteral,
    $RegExp,
    $String,
    $eqEq,
    $joo_global_object,
    $plus,
  ) {
    $name_slash = $eqEq($name, $String->new(""))
      ? $String->new("")
      : ($plus($name, $String->new("/")));
    $r = $RegExp->new(
      $plus($plus($String->new("^"), $name_slash), $String->new("([^/]*)")),
    );
    $seen = $ObjectLiteral((object)darray[]);
    $a = varray[];
    foreach (
      $joo_global_object->context->content->__all_enumerable_keys() as

        $n => $____
    ) {
      $m = $n->match($r);
      if ($m && !$seen[$m[1]]) {
        $seen[$m[1]] = true;
        $a->push($m[1]);
      }
    }
    return $a;
  },
);

$MlFakeDevice->prototype->is_dir = $Func(
  function($name) use ($RegExp, $String, $eqEq, $joo_global_object, $plus) {
    $name_slash = $eqEq($name, $String->new(""))
      ? $String->new("")
      : ($plus($name, $String->new("/")));
    $r = $RegExp->new(
      $plus($plus($String->new("^"), $name_slash), $String->new("([^/]*)")),
    );
    $a = varray[];
    foreach (
      $joo_global_object->context->content->__all_enumerable_keys() as

        $n => $____
    ) {
      $m = $n->match($r);
      if ($m) {
        return 1;
      }
    }
    return 0;
  },
);

$MlFakeDevice->prototype->unlink = $Func(
  function($name) use ($joo_global_object) {
    $ok = $joo_global_object->context->content[$name] ? true : (false);
    unset($joo_global_object->context->content[$name]);
    return $ok;
  },
);

$MlFakeDevice->prototype->open = $Func(
  function($name, $f) use (
    $MlFakeFile,
    $String,
    $caml_create_bytes,
    $caml_raise_no_such_file,
    $caml_raise_sys_error,
    $joo_global_object,
    $plus,
  ) {
    if ($f->rdonly && $f->wronly) {
      $caml_raise_sys_error(
        $plus(
          $joo_global_object->context->nm($name),
          $String->new(
            " : flags Open_rdonly and Open_wronly are not compatible",
          ),
        ),
      );
    }
    if ($f->text && $f->binary) {
      $caml_raise_sys_error(
        $plus(
          $joo_global_object->context->nm($name),
          $String->new(" : flags Open_text and Open_binary are not compatible"),
        ),
      );
    }
    $joo_global_object->context->lookup($name);
    if ($joo_global_object->context->content[$name]) {
      if ($joo_global_object->context->is_dir($name)) {
        $caml_raise_sys_error(
          $plus(
            $joo_global_object->context->nm($name),
            $String->new(" : is a directory"),
          ),
        );
      }
      if ($f->create && $f->excl) {
        $caml_raise_sys_error(
          $plus(
            $joo_global_object->context->nm($name),
            $String->new(" : file already exists"),
          ),
        );
      }
      $file = $joo_global_object->context->content[$name];
      if ($f->truncate) {
        $file->truncate();
      }
      return $file;
    } else {
      if ($f->create) {
        $joo_global_object->context->content[$name] =
          $MlFakeFile->new($caml_create_bytes(0));
        return $joo_global_object->context->content[$name];
      } else {
        $caml_raise_no_such_file($joo_global_object->context->nm($name));
      }
    }
  },
);

$MlFakeDevice->prototype->register = $Func(
  function($name, $content) use (
    $Array,
    $MlBytes,
    $MlFakeFile,
    $String,
    $caml_new_string,
    $caml_raise_sys_error,
    $caml_string_of_array,
    $joo_global_object,
    $plus,
  ) {
    if ($joo_global_object->context->content[$name]) {
      $caml_raise_sys_error(
        $plus(
          $joo_global_object->context->nm($name),
          $String->new(" : file already exists"),
        ),
      );
    }
    if (instance_of($content, $MlBytes)) {
      $joo_global_object->context->content[$name] = $MlFakeFile->new($content);
    } else {
      if (instance_of($content, $Array)) {
        $joo_global_object->context->content[$name] =
          $MlFakeFile->new($caml_string_of_array($content));
      } else {
        if ($content->toString) {
          $mlstring = $caml_new_string($content->toString());
          $joo_global_object->context->content[$name] =
            $MlFakeFile->new($mlstring);
        }
      }
    }
  },
);

$MlFakeDevice->prototype->constructor = $MlFakeDevice;

$caml_array_of_string = $Func(
  function($s) use ($caml_convert_string_to_array) {
    if ($s->t != 4) {
      $caml_convert_string_to_array($s);
    }
    return $s->c;
  },
);
$caml_bytes_unsafe_set = $Func(
  function($s, $i, $c) use (
    $String,
    $caml_convert_string_to_array,
    $eqEq,
    $plus,
  ) {
    $c &= 255;
    if ($s->t != 4) {
      if ($eqEq($i, $s->c->length)) {
        $s->c = $plus($s->c, $String->fromCharCode($c));
        if ($eqEq($i + 1, $s->l)) {
          $s->t = 0;
        }
        return 0;
      }
      $caml_convert_string_to_array($s);
    }
    $s->c[$i] = $c;
    return 0;
  },
);
$caml_bytes_set = $Func(
  function($s, $i, $c) use (
    $caml_bytes_unsafe_set,
    $caml_string_bound_error,
    $unsigned_right_shift_32,
  ) {
    if ($unsigned_right_shift_32($i, 0) >= $s->l) {
      $caml_string_bound_error();
    }
    return $caml_bytes_unsafe_set($s, $i, $c);
  },
);
$Buffer = $joo_global_object->Buffer;
$MlNodeFile = $Func(
  function($fd) use ($String, $joo_global_object, $require) {
    $joo_global_object->context->fs = $require($String->new("fs"));
    $joo_global_object->context->fd = $fd;
  },
);

$MlNodeFile->prototype = $MlFile->new();

$MlNodeFile->prototype->truncate = $Func(
  function($len) use ($joo_global_object) {
    $joo_global_object->context
      ->fs
      ->ftruncateSync($joo_global_object->context->fd, $len | 0);
  },
);

$MlNodeFile->prototype->length = $Func(
  function() use ($joo_global_object) {
    return $joo_global_object->context
      ->fs
      ->fstatSync($joo_global_object->context->fd)
      ->size;
  },
);

$MlNodeFile->prototype->write = $Func(
  function($offset, $buf, $buf_offset, $len) use (
    $Buffer,
    $caml_array_of_string,
    $joo_global_object,
  ) {
    $a = $caml_array_of_string($buf);
    if (!instance_of($a, $joo_global_object->Uint8Array)) {
      $a = $joo_global_object->Uint8Array->new($a);
    }
    $buffer = $Buffer->from($a);
    $joo_global_object->context->fs->writeSync(
      $joo_global_object->context->fd,
      $buffer,
      $buf_offset,
      $len,
      $offset,
    );
    return 0;
  },
);

$MlNodeFile->prototype->read = $Func(
  function($offset, $buf, $buf_offset, $len) use (
    $Buffer,
    $caml_array_of_string,
    $caml_bytes_set,
    $joo_global_object,
    $plus,
  ) {
    $a = $caml_array_of_string($buf);
    if (!instance_of($a, $joo_global_object->Uint8Array)) {
      $a = $joo_global_object->Uint8Array->new($a);
    }
    $buffer = $Buffer->from($a);
    $joo_global_object->context->fs->readSync(
      $joo_global_object->context->fd,
      $buffer,
      $buf_offset,
      $len,
      $offset,
    );
    for ($i = 0; $i < $len; $i++) {
      $caml_bytes_set(
        $buf,
        $plus($buf_offset, $i),
        $buffer[$plus($buf_offset, $i)],
      );
    }
    return 0;
  },
);

$MlNodeFile->prototype->read_one = $Func(
  function($offset) use ($Buffer, $joo_global_object) {
    $a = $joo_global_object->Uint8Array->new(1);
    $buffer = $Buffer->from($a);
    $joo_global_object->context
      ->fs
      ->readSync($joo_global_object->context->fd, $buffer, 0, 1, $offset);
    return $buffer[0];
  },
);

$MlNodeFile->prototype->close = $Func(
  function() use ($joo_global_object) {
    $joo_global_object->context->fs->closeSync($joo_global_object->context->fd);
  },
);

$MlNodeFile->prototype->constructor = $MlNodeFile;

$MlNodeDevice = $Func(
  function($root) use ($String, $joo_global_object, $require) {
    $joo_global_object->context->fs = $require($String->new("fs"));
    $joo_global_object->context->root = $root;
  },
);

$MlNodeDevice->prototype->nm = $Func(
  function($name) use ($joo_global_object, $plus) {
    return $plus($joo_global_object->context->root, $name);
  },
);

$MlNodeDevice->prototype->exists = $Func(
  function($name) use ($joo_global_object) {
    return $joo_global_object->context
      ->fs
      ->existsSync($joo_global_object->context->nm($name))
      ? 1
      : (0);
  },
);

$MlNodeDevice->prototype->readdir = $Func(
  function($name) use ($joo_global_object) {
    return $joo_global_object->context
      ->fs
      ->readdirSync($joo_global_object->context->nm($name));
  },
);

$MlNodeDevice->prototype->is_dir = $Func(
  function($name) use ($joo_global_object) {
    return $joo_global_object->context
      ->fs
      ->statSync($joo_global_object->context->nm($name))
      ->isDirectory()
      ? 1
      : (0);
  },
);

$MlNodeDevice->prototype->unlink = $Func(
  function($name) use ($joo_global_object) {
    $b = $joo_global_object->context
      ->fs
      ->existsSync($joo_global_object->context->nm($name))
      ? 1
      : (0);
    $joo_global_object->context
      ->fs
      ->unlinkSync($joo_global_object->context->nm($name));
    return $b;
  },
);

$MlNodeDevice->prototype->open = $Func(
  function($name, $f) use ($MlNodeFile, $String, $joo_global_object, $require) {
    $consts = $require($String->new("constants"));
    $res = 0;
    foreach ($f->__all_enumerable_keys() as $key => $____) {
      switch ($key) {
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
    $fd = $joo_global_object->context
      ->fs
      ->openSync($joo_global_object->context->nm($name), $res);
    return $MlNodeFile->new($fd);
  },
);

$MlNodeDevice->prototype->rename = $Func(
  function($o, $n) use ($joo_global_object) {
    $joo_global_object->context->fs->renameSync(
      $joo_global_object->context->nm($o),
      $joo_global_object->context->nm($n),
    );
  },
);

$MlNodeDevice->prototype->constructor = $MlNodeDevice;

$caml_root =
  $caml_current_dir->match($RegExp->new($String->new("[^\\/]*\\/")))[0];
$fs_node_supported = $Func(
  function() use ($String, $eqEqEq, $joo_global_object, $typeof) {
    return !$eqEqEq(
      $typeof($joo_global_object->process),
      $String->new("undefined"),
    ) &&
      !$eqEqEq(
        $typeof($joo_global_object->process->versions),
        $String->new("undefined"),
      ) &&
      !$eqEqEq(
        $typeof($joo_global_object->process->versions->node),
        $String->new("undefined"),
      );
  },
);
$jsoo_mount_point = varray[];

if ($fs_node_supported()) {
  $jsoo_mount_point->push(
    $ObjectLiteral(
      (object)darray[
        "path" => $caml_root,
        "device" => $MlNodeDevice->new($caml_root),
      ],
    ),
  );
} else {
  $jsoo_mount_point->push(
    $ObjectLiteral(
      (object)darray[
        "path" => $caml_root,
        "device" => $MlFakeDevice->new($caml_root),
      ],
    ),
  );
}

$jsoo_mount_point->push(
  $ObjectLiteral(
    (object)darray[
      "path" => $plus($caml_root, $String->new("static/")),
      "device" =>
        $MlFakeDevice->new($plus($caml_root, $String->new("static/"))),
    ],
  ),
);

$resolve_fs_device = $Func(
  function($name) use (
    $ObjectLiteral,
    $String,
    $caml_make_path,
    $jsoo_mount_point,
    $plus,
  ) {
    $path = $caml_make_path($name);
    $name = $path->join($String->new("/"));
    $name_slash = $plus($name, $String->new("/"));
    $res = null;
    for ($i = 0; $i < $jsoo_mount_point->length; $i++) {
      $m = $jsoo_mount_point[$i];
      if (
        $name_slash->search($m->path) == 0 &&
        (!$res || $res->path->length < $m->path->length)
      ) {
        $res = $ObjectLiteral(
          (object)darray[
            "path" => $m->path,
            "device" => $m->device,
            "rest" => $name->substring($m->path->length, $name->length),
          ],
        );
      }
    }
    return $res;
  },
);
$caml_ml_string_length = $Func(function($s) {
  return $s->l;
});
$caml_std_output = $Func(
  function($chanid, $s) use (
    $caml_ml_channels,
    $caml_ml_string_length,
    $caml_new_string,
    $plus,
  ) {
    $chan = $caml_ml_channels[$chanid];
    $str = $caml_new_string($s);
    $slen = $caml_ml_string_length($str);
    $chan->file->write($chan->offset, $str, 0, $slen);
    $chan->offset = $plus($chan->offset, $slen);
    return 0;
  },
);
$js_print_stderr = $Func(
  function($s) use ($joo_global_object) {
    $g = $joo_global_object;
    if ($g->process && $g->process->stdout && $g->process->stdout->write) {
      $g->process->stderr->write($s);
    } else {
      if ($s->charCodeAt($s->length - 1) == 10) {
        $s = $s->substr(0, $s->length - 1);
      }
      $v = $g->console;
      $v && $v->error && $v->error($s);
    }
  },
);
$js_print_stdout = $Func(
  function($s) use ($joo_global_object) {
    $g = $joo_global_object;
    if ($g->process && $g->process->stdout && $g->process->stdout->write) {
      $g->process->stdout->write($s);
    } else {
      if ($s->charCodeAt($s->length - 1) == 10) {
        $s = $s->substr(0, $s->length - 1);
      }
      $v = $g->console;
      $v && $v->log && $v->log($s);
    }
  },
);
$caml_sys_open_internal = $Func(
  function($idx, $output, $file, $flags) use (
    $Array,
    $ObjectLiteral,
    $caml_global_data,
  ) {
    if ($caml_global_data->fds === null) {
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
      !$caml_global_data->fd_last_idx || $idx > $caml_global_data->fd_last_idx
    ) {
      $caml_global_data->fd_last_idx = $idx;
    }
    return $idx;
  },
);
$caml_sys_open = $Func(
  function($name, $flags, $_perms) use (
    $ObjectLiteral,
    $String,
    $caml_global_data,
    $caml_raise_sys_error,
    $caml_std_output,
    $caml_sys_open_internal,
    $plus,
    $resolve_fs_device,
  ) {
    $f = $ObjectLiteral((object)darray[]);
    while ($flags) {
      switch ($flags[1]) {
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
            " : flags Open_rdonly and Open_wronly are not compatible",
          ),
        ),
      );
    }
    if ($f->text && $f->binary) {
      $caml_raise_sys_error(
        $plus(
          $name->toString(),
          $String->new(" : flags Open_text and Open_binary are not compatible"),
        ),
      );
    }
    $root = $resolve_fs_device($name);
    $file = $root->device->open($root->rest, $f);
    $idx =
      $caml_global_data->fd_last_idx ? $caml_global_data->fd_last_idx : (0);
    return $caml_sys_open_internal($idx + 1, $caml_std_output, $file, $f);
  },
);

$caml_sys_open_internal(
  0,
  $caml_std_output,
  $MlFakeFile->new($caml_create_bytes(0)),
);

$caml_sys_open_internal(
  1,
  $js_print_stdout,
  $MlFakeFile->new($caml_create_bytes(0)),
);

$caml_sys_open_internal(
  2,
  $js_print_stderr,
  $MlFakeFile->new($caml_create_bytes(0)),
);

$caml_ml_open_descriptor_in = $Func(
  function($fd) use (
    $ObjectLiteral,
    $String,
    $caml_global_data,
    $caml_ml_channels,
    $caml_raise_sys_error,
    $plus,
  ) {
    $data = $caml_global_data->fds[$fd];
    if ($data->flags->wronly) {
      $caml_raise_sys_error(
        $plus($plus($String->new("fd "), $fd), $String->new(" is writeonly")),
      );
    }
    $channel = $ObjectLiteral(
      (object)darray[
        "file" => $data->file,
        "offset" => $data->offset,
        "fd" => $fd,
        "opened" => true,
        "out" => false,
        "refill" => varray[],
      ],
    );
    $caml_ml_channels[$channel->fd] = $channel;
    return $channel->fd;
  },
);
$caml_ml_open_descriptor_out = $Func(
  function($fd) use (
    $ObjectLiteral,
    $String,
    $caml_global_data,
    $caml_ml_channels,
    $caml_raise_sys_error,
    $plus,
  ) {
    $data = $caml_global_data->fds[$fd];
    if ($data->flags->rdonly) {
      $caml_raise_sys_error(
        $plus($plus($String->new("fd "), $fd), $String->new(" is readonly")),
      );
    }
    $channel = $ObjectLiteral(
      (object)darray[
        "file" => $data->file,
        "offset" => $data->offset,
        "fd" => $fd,
        "opened" => true,
        "out" => true,
        "buffer" => $String->new(""),
      ],
    );
    $caml_ml_channels[$channel->fd] = $channel;
    return $channel->fd;
  },
);
$caml_ml_out_channels_list = $Func(
  function() use ($caml_ml_channels) {
    $l = 0;
    for ($c = 0; $c < $caml_ml_channels->length; $c++) {
      if (
        $caml_ml_channels[$c] &&
        $caml_ml_channels[$c]->opened &&
        $caml_ml_channels[$c]->out
      ) {
        $l = varray[0, $caml_ml_channels[$c]->fd, $l];
      }
    }
    return $l;
  },
);
$caml_jsbytes_of_string = $Func(
  function($s) use ($caml_convert_string_to_bytes) {
    if (($s->t & 6) != 0) {
      $caml_convert_string_to_bytes($s);
    }
    return $s->c;
  },
);
$caml_ml_output_bytes = $Func(
  function($chanid, $buffer, $offset, $len) use (
    $String,
    $caml_blit_bytes,
    $caml_create_bytes,
    $caml_jsbytes_of_string,
    $caml_ml_bytes_length,
    $caml_ml_channels,
    $caml_ml_flush,
    $caml_raise_sys_error,
    $eqEq,
    $plus,
  ) {
    $chan = $caml_ml_channels[$chanid];
    if (!$chan->opened) {
      $caml_raise_sys_error($String->new("Cannot output to a closed channel"));
    }
    $string = null;
    if ($offset == 0 && $eqEq($caml_ml_bytes_length($buffer), $len)) {
      $string = $buffer;
    } else {
      $string = $caml_create_bytes($len);
      $caml_blit_bytes($buffer, $offset, $string, 0, $len);
    }
    $jsstring = $caml_jsbytes_of_string($string);
    $id = $jsstring->lastIndexOf($String->new("\n"));
    if ($id < 0) {
      $chan->buffer = $plus($chan->buffer, $jsstring);
    } else {
      $chan->buffer = $plus($chan->buffer, $jsstring->substr(0, $id + 1));
      $caml_ml_flush($chanid);
      $chan->buffer = $plus($chan->buffer, $jsstring->substr($id + 1));
    }
    return 0;
  },
);
$caml_ml_output = $Func(
  function($chanid, $buffer, $offset, $len) use ($caml_ml_output_bytes) {
    return $caml_ml_output_bytes($chanid, $buffer, $offset, $len);
  },
);
$caml_ml_output_char = $Func(
  function($chanid, $c) use ($String, $caml_ml_output, $caml_new_string) {
    $s = $caml_new_string($String->fromCharCode($c));
    $caml_ml_output($chanid, $s, 0, 1);
    return 0;
  },
);
$caml_register_global = $Func(
  function($n, $v, $name_opt) use ($caml_global_data, $joo_global_object) {
    if ($name_opt && $joo_global_object->toplevelReloc) {
      $n = $joo_global_object->toplevelReloc($name_opt);
    }
    $caml_global_data[$n + 1] = $v;
    if ($name_opt) {
      $caml_global_data[$name_opt] = $v;
    }
  },
);


$caml_wrap_exception = function($e) use ($String, $caml_global_data) {
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
  if ($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};


$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;


$caml_call1 = function($f, $a0) use ($caml_arity_test, $caml_call_gen) {
  return
    $caml_arity_test($f) === 1 ? $f($a0) : ($caml_call_gen($f, varray[$a0]));
};
$Out_of_memory = Vector {248, $caml_new_string("Out_of_memory"), -1};
$Sys_error = Vector {248, $caml_new_string("Sys_error"), -2};
$Failure = Vector {248, $caml_new_string("Failure"), -3};
$Invalid_argument = Vector {248, $caml_new_string("Invalid_argument"), -4};
$End_of_file = Vector {248, $caml_new_string("End_of_file"), -5};
$Division_by_zero = Vector {248, $caml_new_string("Division_by_zero"), -6};
$Not_found = Vector {248, $caml_new_string("Not_found"), -7};
$Match_failure = Vector {248, $caml_new_string("Match_failure"), -8};
$Stack_overflow = Vector {248, $caml_new_string("Stack_overflow"), -9};
$Sys_blocked_io = Vector {248, $caml_new_string("Sys_blocked_io"), -10};
$Assert_failure = Vector {248, $caml_new_string("Assert_failure"), -11};
$Undefined_recursive_module = Vector {
  248,
  $caml_new_string("Undefined_recursive_module"),
  -12,
};

$caml_register_global(
  11,
  $Undefined_recursive_module,
  "Undefined_recursive_module",
);

$caml_register_global(10, $Assert_failure, "Assert_failure");

$caml_register_global(9, $Sys_blocked_io, "Sys_blocked_io");

$caml_register_global(8, $Stack_overflow, "Stack_overflow");

$caml_register_global(7, $Match_failure, "Match_failure");

$caml_register_global(6, $Not_found, "Not_found");

$caml_register_global(5, $Division_by_zero, "Division_by_zero");

$caml_register_global(4, $End_of_file, "End_of_file");

$caml_register_global(3, $Invalid_argument, "Invalid_argument");

$caml_register_global(2, $Failure, "Failure");

$caml_register_global(1, $Sys_error, "Sys_error");

$caml_register_global(0, $Out_of_memory, "Out_of_memory");

$b = $caml_new_string("prefix ");
$c = $caml_new_string("f1");
$d = $caml_new_string("f2");
$e = $caml_new_string("f3");
$f = $caml_new_string("f4");

$caml_fresh_oo_id(0);

$a = function($s1, $s2) use (
  $caml_blit_string,
  $caml_create_bytes,
  $caml_ml_string_length,
) {
  $l1 = $caml_ml_string_length($s1);
  $l2 = $caml_ml_string_length($s2);
  $s = $caml_create_bytes((int)($l1 + $l2));
  $caml_blit_string($s1, 0, $s, 0, $l1);
  $caml_blit_string($s2, 0, $s, $l1, $l2);
  return $s;
};
$string_of_int = function($n) use ($caml_new_string) {
  return $caml_new_string("".$n);
};

$caml_ml_open_descriptor_in(0);

$stdout = $caml_ml_open_descriptor_out(1);

$caml_ml_open_descriptor_out(2);

$flush_all = function($param) use (
  $Sys_error,
  $caml_ml_flush,
  $caml_ml_out_channels_list,
  $caml_wrap_exception,
  $caml_wrap_thrown_exception_reraise,
) {
  $iter = function($param) use (
    $Sys_error,
    $caml_ml_flush,
    $caml_wrap_exception,
    $caml_wrap_thrown_exception_reraise,
  ) {
    $param__0 = $param;
    for (; ; ) {
      if ($param__0) {
        $l = $param__0[2];
        $a = $param__0[1];
        try {
          $caml_ml_flush($a);
        } catch (\Throwable $D) {
          $D = $caml_wrap_exception($D);
          if ($D[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($D) as \Throwable;
          }
        }
        $param__0 = $l;
        continue;
      }
      return 0;
    }
  };
  return $iter($caml_ml_out_channels_list(0));
};
$output_string =
  function($oc, $s) use ($caml_ml_output, $caml_ml_string_length) {
    return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
  };
$print_endline = function($s) use (
  $caml_ml_flush,
  $caml_ml_output_char,
  $output_string,
  $stdout,
) {
  $output_string($stdout, $s);
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = function($param) use ($flush_all) {
  return $flush_all(0);
};
$f1 = function($g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $caml_call1($g, $i);
    $C = (int)($i + 1);
    if (3 !== $i) {
      $i = $C;
      continue;
    }
    return 0;
  }
};
$f2 = function($g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $j));
      $B = (int)($j + 1);
      if (5 !== $j) {
        $j = $B;
        continue;
      }
      $A = (int)($i + 1);
      if (3 !== $i) {
        $i = $A;
        $continue_counter = 0;
        break;
      }
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f3 = function($g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $k = 4;
      for (; ; ) {
        $caml_call1($g, (int)((int)($i + $j) + $k));
        $z = (int)($k + 1);
        if (5 !== $k) {
          $k = $z;
          continue;
        }
        $y = (int)($j + 1);
        if (5 !== $j) {
          $j = $y;
          $continue_counter = 0;
          break;
        }
        $l = 6;
        for (; ; ) {
          $caml_call1($g, (int)($i + $l));
          $x = (int)($l + 1);
          if (7 !== $l) {
            $l = $x;
            continue;
          }
          $w = (int)($i + 1);
          if (3 !== $i) {
            $i = $w;
            $continue_counter = 2;
            break;
          }
          return 0;
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      } else if ($continue_counter === 0) {
        $continue_counter = null;
        continue;
      }
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f4 = function($g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $k__3 = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $k__3));
      $v = (int)($k__3 + 1);
      if (5 !== $k__3) {
        $k__3 = $v;
        continue;
      }
      $j = 4;
      for (; ; ) {
        $k__2 = 4;
        for (; ; ) {
          $l__1 = 4;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i + $j) + $k__2) + $l__1));
            $u = (int)($l__1 + 1);
            if (5 !== $l__1) {
              $l__1 = $u;
              continue;
            }
            $t = (int)($k__2 + 1);
            if (5 !== $k__2) {
              $k__2 = $t;
              $continue_counter = 0;
              break;
            }
            $k__1 = 4;
            for (; ; ) {
              $caml_call1($g, (int)((int)($i + $j) + $k__1));
              $s = (int)($k__1 + 1);
              if (5 !== $k__1) {
                $k__1 = $s;
                continue;
              }
              $r = (int)($j + 1);
              if (5 !== $j) {
                $j = $r;
                $continue_counter = 2;
                break;
              }
              $l__0 = 6;
              for (; ; ) {
                $n__1 = 4;
                for (; ; ) {
                  $caml_call1($g, (int)((int)($i + $l__0) + $n__1));
                  $q = (int)($n__1 + 1);
                  if (5 !== $n__1) {
                    $n__1 = $q;
                    continue;
                  }
                  $m__0 = 4;
                  for (; ; ) {
                    $n__0 = 4;
                    for (; ; ) {
                      $caml_call1(
                        $g,
                        (int)((int)((int)($i + $l__0) + $m__0) + $n__0),
                      );
                      $p = (int)($n__0 + 1);
                      if (5 !== $n__0) {
                        $n__0 = $p;
                        continue;
                      }
                      $o = (int)($m__0 + 1);
                      if (5 !== $m__0) {
                        $m__0 = $o;
                        $continue_counter = 0;
                        break;
                      }
                      $n = (int)($l__0 + 1);
                      if (7 !== $l__0) {
                        $l__0 = $n;
                        $continue_counter = 2;
                        break;
                      }
                      $k__0 = 4;
                      for (; ; ) {
                        $caml_call1($g, (int)($i + $k__0));
                        $m = (int)($k__0 + 1);
                        if (5 !== $k__0) {
                          $k__0 = $m;
                          continue;
                        }
                        $l = (int)($i + 1);
                        if (3 !== $i) {
                          $i = $l;
                          $continue_counter = 9;
                          break;
                        }
                        $k = 4;
                        for (; ; ) {
                          $caml_call1($g, $k);
                          $k = (int)($k + 1);
                          if (5 !== $k) {
                            $k = $k;
                            continue;
                          }
                          return 0;
                        }
                        if ($continue_counter > 0) {
                          $continue_counter -= 1;
                          break;
                        } else if ($continue_counter === 0) {
                          $continue_counter = null;
                          continue;
                        }
                      }
                      if ($continue_counter > 0) {
                        $continue_counter -= 1;
                        break;
                      } else if ($continue_counter === 0) {
                        $continue_counter = null;
                        continue;
                      }
                    }
                    if ($continue_counter > 0) {
                      $continue_counter -= 1;
                      break;
                    } else if ($continue_counter === 0) {
                      $continue_counter = null;
                      continue;
                    }
                  }
                  if ($continue_counter > 0) {
                    $continue_counter -= 1;
                    break;
                  } else if ($continue_counter === 0) {
                    $continue_counter = null;
                    continue;
                  }
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                } else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              if ($continue_counter > 0) {
                $continue_counter -= 1;
                break;
              } else if ($continue_counter === 0) {
                $continue_counter = null;
                continue;
              }
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            } else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
          if ($continue_counter > 0) {
            $continue_counter -= 1;
            break;
          } else if ($continue_counter === 0) {
            $continue_counter = null;
            continue;
          }
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      } else if ($continue_counter === 0) {
        $continue_counter = null;
        continue;
      }
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$fx = function($prefix, $x) use ($a, $b, $print_endline, $string_of_int) {
  return $print_endline($a($b, $string_of_int($x)));
};

$f1(function($j) use ($c, $fx) {
  return $fx($c, $j);
});

$f2(function($i) use ($d, $fx) {
  return $fx($d, $i);
});

$f3(function($h) use ($e, $fx) {
  return $fx($e, $h);
});

$f4(function($g) use ($f, $fx) {
  return $fx($f, $g);
});

$do_at_exit(0);
