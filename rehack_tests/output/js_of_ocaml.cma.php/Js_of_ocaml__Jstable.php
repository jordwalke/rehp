<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Jstable {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst_Jstable_keys = $string("Jstable.keys");
    $Pervasives =  Pervasives::requireModule ();
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::requireModule ();
    $List =  List_::requireModule ();
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 944440446, 270), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $obj = ((dynamic $t0, dynamic $param) ==> {return $t0->Object;})($b_, $a_);
    $create = (dynamic $param) ==> {
      $z_ = 0 as dynamic;
      return ((dynamic $t1, dynamic $param) ==> {return new $t1();})($obj, $z_);
    };
    $add = (dynamic $t, dynamic $k, dynamic $v) ==> {
      $w_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -942667500, 271), $x);
      };
      $x_ = "_";
      $y_ = 0 as dynamic;
      $t[
         ((dynamic $t3, dynamic $t2, dynamic $param) ==> {return $t3->concat($t2);
          })($k, $x_, $w_)
       ] = $v;
      return $y_;
    };
    $remove = (dynamic $t, dynamic $k) ==> {
      $t_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -942667500, 272), $x);
      };
      $u_ = "_";
      $v_ = 0 as dynamic;
      unset(
        $t[
           ((dynamic $t5, dynamic $t4, dynamic $param) ==> {return $t5->concat($t4);
            })($k, $u_, $t_)
         ]
      );
      return $v_;
    };
    $find = (dynamic $t, dynamic $k) ==> {
      $r_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -942667500, 273), $x);
      };
      $s_ = "_";
      return $t[
         ((dynamic $t7, dynamic $t6, dynamic $param) ==> {return $t7->concat($t6);
          })($k, $s_, $r_)
       ];
    };
    $keys = (dynamic $t) ==> {
      $c_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -955850252, 274), $x);
      };
      $d_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 944440446, 275), $x);
      };
      $e_ = $Js_of_ocaml_Js[50][1];
      $f_ = ((dynamic $t13, dynamic $param) ==> {return $t13->Object;})($e_, $d_);
      $key_array = ((dynamic $t15, dynamic $t14, dynamic $param) ==> {return $t15->keys($t14);
       })($f_, $t, $c_);
      $res = Vector{0, 0} as dynamic;
      $g_ = 0 as dynamic;
      $h_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 276), $x);
      };
      $i_ = (int)
      (((dynamic $t12, dynamic $param) ==> {return $t12->length;})($key_array, $h_) + -1) as dynamic;
      if (! ($i_ < 0)) {
        $i = $g_;
        for (;;) {
          $j_ = (dynamic $param) ==> {
            return $call1($Pervasives[2], $cst_Jstable_keys);
          };
          $k_ = $call2($Js_of_ocaml_Js[16], $key_array, $i);
          $key = $call2($Js_of_ocaml_Js[6][8], $k_, $j_);
          $l_ = $res[1];
          $m_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, -488115631, 277), $x);
          };
          $n_ = (dynamic $x) ==> {
            return $call1($caml_get_public_method($x, 520590566, 278), $x);
          };
          $o_ = (int)
          (((dynamic $t8, dynamic $param) ==> {return $t8->length;})($key, $n_) + -1) as dynamic;
          $p_ = 0 as dynamic;
          $res[1] =
            Vector{
              0,
              ((dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) ==> {return $t11->substring($t9, $t10);
               })($key, $p_, $o_, $m_),
              $l_
            };
          $q_ = (int) ($i + 1) as dynamic;
          if ($i_ !== $i) {$i = $q_;continue;}
          break;
        }
      }
      return $call1($List[9], $res[1]);
    };
    $Js_of_ocaml_Jstable = Vector{0, $create, $add, $remove, $find, $keys} as dynamic;
    
     return ($Js_of_ocaml_Jstable);

  }
  public static function create(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$param]);
  }
  public static function add(dynamic $t, dynamic $k, dynamic $v): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$t, $k, $v]);
  }
  public static function remove(dynamic $t, dynamic $k): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$t, $k]);
  }
  public static function find(dynamic $t, dynamic $k): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$t, $k]);
  }
  public static function keys(dynamic $t): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$t]);
  }

}
/* Hashing disabled */
