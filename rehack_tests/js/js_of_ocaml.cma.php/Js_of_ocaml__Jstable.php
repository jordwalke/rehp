<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Jstable {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst_Jstable_keys = $string("Jstable.keys");
    $Pervasives =  Pervasives::get ();
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $List =  List_::get ();
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 270), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $obj = (function(dynamic $t0, dynamic $param) {return $t0->Object;})($b_, $a_);
    $create = function(dynamic $param) use ($obj) {
      $z_ = 0;
      return (function(dynamic $t1, dynamic $param) {return new $t1();})($obj, $z_);
    };
    $add = function(dynamic $t, dynamic $k, dynamic $v) use ($call1,$caml_get_public_method) {
      $w_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 271), $x);
      };
      $x_ = "_";
      $y_ = 0;
      $t[
         (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->concat($t2);
          })($k, $x_, $w_)
       ] = $v;
      return $y_;
    };
    $remove = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $t_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 272), $x);
      };
      $u_ = "_";
      $v_ = 0;
      unset(
        $t[
           (function(dynamic $t5, dynamic $t4, dynamic $param) {return $t5->concat($t4);
            })($k, $u_, $t_)
         ]
      );
      return $v_;
    };
    $find = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $r_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 273), $x);
      };
      $s_ = "_";
      return $t[
         (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->concat($t6);
          })($k, $s_, $r_)
       ];
    };
    $keys = function(dynamic $t) use ($Js_of_ocaml_Js,$List,$Pervasives,$call1,$call2,$caml_get_public_method,$cst_Jstable_keys) {
      $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 274), $x);
      };
      $d_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 944440446, 275), $x);
      };
      $e_ = $Js_of_ocaml_Js[50][1];
      $f_ = (function(dynamic $t13, dynamic $param) {return $t13->Object;})($e_, $d_);
      $key_array = (function(dynamic $t15, dynamic $t14, dynamic $param) {return $t15->keys($t14);
       })($f_, $t, $c_);
      $res = Vector{0, 0};
      $g_ = 0;
      $h_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 276), $x);
      };
      $i_ = (int)
      ((function(dynamic $t12, dynamic $param) {return $t12->length;})($key_array, $h_) + -1);
      if (! ($i_ < 0)) {
        $i = $g_;
        for (;;) {
          $j_ = function(dynamic $param) use ($Pervasives,$call1,$cst_Jstable_keys) {
            return $call1($Pervasives[2], $cst_Jstable_keys);
          };
          $k_ = $call2($Js_of_ocaml_Js[16], $key_array, $i);
          $key = $call2($Js_of_ocaml_Js[6][8], $k_, $j_);
          $l_ = $res[1];
          $m_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -488115631, 277), $x);
          };
          $n_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 278), $x);
          };
          $o_ = (int)
          ((function(dynamic $t8, dynamic $param) {return $t8->length;})($key, $n_) + -1);
          $p_ = 0;
          $res[1] =
            Vector{
              0,
              (function
               (dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) {return $t11->substring($t9, $t10);
               })($key, $p_, $o_, $m_),
              $l_
            };
          $q_ = (int) ($i + 1);
          if ($i_ !== $i) {$i = $q_;continue;}
          break;
        }
      }
      return $call1($List[9], $res[1]);
    };
    $Js_of_ocaml_Jstable = Vector{0, $create, $add, $remove, $find, $keys};
    
     return ($Js_of_ocaml_Jstable);

  }
  public static function keys(dynamic $t) {
    return static::get()[5]($t);
  }
  public static function find(dynamic $t, dynamic $k) {
    return static::get()[4]($t, $k);
  }
  public static function remove(dynamic $t, dynamic $k) {
    return static::get()[3]($t, $k);
  }
  public static function add(dynamic $t, dynamic $k, dynamic $v) {
    return static::get()[2]($t, $k, $v);
  }
  public static function create(dynamic $param) {
    return static::get()[1]($param);
  }

}
/* Hashing disabled */
