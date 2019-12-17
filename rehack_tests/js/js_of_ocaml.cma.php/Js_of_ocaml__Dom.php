<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Assert_failure =  Assert_failure::get ();
    $Not_found =  Not_found::get ();
    $List =  List_::get ();
    $a_ = Vector{0, $string("lib/js_of_ocaml/dom.ml"), 343, 67};
    $list_of_nodeList = function(dynamic $nodeList) use ($Js_of_ocaml_Js,$List,$call1,$caml_get_public_method) {
      $X_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 24), $x);
      };
      $length = (function(dynamic $t2, dynamic $param) {return $t2->length;})($nodeList, $X_);
      $add_item = function(dynamic $acc, dynamic $i) use ($Js_of_ocaml_Js,$List,$call1,$caml_get_public_method,$length,$nodeList) {
        $acc__0 = $acc;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $length) {
            $Y_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -977287917, 25), $x);
            };
            $Z_ = (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->item($t0);
             })($nodeList, $i__0, $Y_);
            $match = $call1($Js_of_ocaml_Js[5][10], $Z_);
            if ($match) {
              $e = $match[1];
              $i__1 = (int) ($i__0 + 1);
              $acc__1 = Vector{0, $e, $acc__0};
              $acc__0 = $acc__1;
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
          return $call1($List[9], $acc__0);
        }
      };
      return $add_item(0, 0);
    };
    $disconnected = 1;
    $preceding = 2;
    $following = 4;
    $contains = 8;
    $contained_by = 16;
    $implementation_specific = 32;
    $has = function(dynamic $t, dynamic $mask) {
      return ($t & $mask) === $mask ? 1 : (0);
    };
    $add = function(dynamic $x, dynamic $y) {return $x | $y;};
    $DocumentPosition = Vector{
      0,
      $disconnected,
      $preceding,
      $following,
      $contains,
      $contained_by,
      $implementation_specific,
      $has,
      $add,
      $add
    };
    $appendChild = function(dynamic $p, dynamic $n) use ($call1,$caml_get_public_method) {
      $W_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 36716898, 26), $x);
      };
      ((function(dynamic $t4, dynamic $t3, dynamic $param) {return $t4->appendChild($t3);
        })($p, $n, $W_));
      return 0;
    };
    $removeChild = function(dynamic $p, dynamic $n) use ($call1,$caml_get_public_method) {
      $V_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1007843656, 27), $x);
      };
      ((function(dynamic $t6, dynamic $t5, dynamic $param) {return $t6->removeChild($t5);
        })($p, $n, $V_));
      return 0;
    };
    $replaceChild = function(dynamic $p, dynamic $n, dynamic $o) use ($call1,$caml_get_public_method) {
      $U_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 961057992, 28), $x);
      };
      ((function(dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) {return $t9->replaceChild($t7, $t8);
        })($p, $n, $o, $U_));
      return 0;
    };
    $insertBefore = function(dynamic $p, dynamic $n, dynamic $o) use ($call1,$caml_get_public_method) {
      $T_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 281001112, 29), $x);
      };
      ((function(dynamic $t12, dynamic $t10, dynamic $t11, dynamic $param) {return $t12->insertBefore($t10, $t11);
        })($p, $n, $o, $T_));
      return 0;
    };
    $nodeType = function(dynamic $e) use ($call1,$caml_get_public_method) {
      $S_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 30), $x);
      };
      $match = (function(dynamic $t13, dynamic $param) {return $t13->nodeType;
       })($e, $S_);
      if (0 !== $match) {
        $switcher = (int) ($match + -1);
        switch($switcher) {
          // FALLTHROUGH
          case 0:
            return Vector{0, $e};
          // FALLTHROUGH
          case 1:
            return Vector{1, $e};
          // FALLTHROUGH
          case 2:
          // FALLTHROUGH
          case 3:
            return Vector{2, $e};
          }
      }
      return Vector{3, $e};
    };
    $cast = function(dynamic $e, dynamic $t) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $R_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 31), $x);
      };
      return (function(dynamic $t14, dynamic $param) {return $t14->nodeType;})($e, $R_) === $t
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $element = function(dynamic $e) use ($cast) {return $cast($e, 1);};
    $text = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $P_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 32), $x);
      };
      if (
        3 !==
          (function(dynamic $t15, dynamic $param) {return $t15->nodeType;})($e, $P_)
      ) {
        $Q_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -158969380, 33), $x);
        };
        if (
          4 !==
            (function(dynamic $t16, dynamic $param) {return $t16->nodeType;})($e, $Q_)
        ) {return $Js_of_ocaml_Js[1];}
      }
      return $call1($Js_of_ocaml_Js[2], $e);
    };
    $attr = function(dynamic $e) use ($cast) {return $cast($e, 2);};
    $no_handler = $Js_of_ocaml_Js[1];
    $window_event = function(dynamic $param) {return  event ;};
    $handler = function(dynamic $f) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$window_event) {
      $L_ = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$f,$window_event) {
        $M_ = $call1($Js_of_ocaml_Js[2], $e);
        if ($call1($Js_of_ocaml_Js[5][5], $M_)) {
          $res = $call1($f, $e);
          if (1 - (int) $res) {
            $N_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -408605495, 34), $x);
            };
            ((function(dynamic $t17, dynamic $param) {return $t17->preventDefault();
              })($e, $N_));
          }
          return $res;
        }
        $e__0 = $window_event(0);
        $res__0 = $call1($f, $e__0);
        if (1 - (int) $res__0) {
          $O_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 1049971873, 35), $x);
          };
          ((function(dynamic $t19, dynamic $t18, dynamic $param) {$t19->returnValue = $t18;return 0;
            })($e__0, $res__0, $O_));
        }
        return $res__0;
      };
      return $call1($Js_of_ocaml_Js[2], $L_);
    };
    $full_handler = function(dynamic $f) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$runtime,$window_event) {
      $H_ = $runtime["caml_js_wrap_meth_callback_unsafe"](
        function(dynamic $this__0, dynamic $e) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$f,$window_event) {
          $I_ = $call1($Js_of_ocaml_Js[2], $e);
          if ($call1($Js_of_ocaml_Js[5][5], $I_)) {
            $res = $call2($f, $this__0, $e);
            if (1 - (int) $res) {
              $J_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -408605495, 36), $x);
              };
              ((function(dynamic $t20, dynamic $param) {return $t20->preventDefault();
                })($e, $J_));
            }
            return $res;
          }
          $e__0 = $window_event(0);
          $res__0 = $call2($f, $this__0, $e__0);
          if (1 - (int) $res__0) {
            $K_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 1049971873, 37), $x);
            };
            ((function(dynamic $t22, dynamic $t21, dynamic $param) {$t22->returnValue = $t21;return 0;
              })($e__0, $res__0, $K_));
          }
          return $res__0;
        }
      );
      return $call1($Js_of_ocaml_Js[2], $H_);
    };
    $invoke_handler = function(dynamic $f, dynamic $this__0, dynamic $event) {return $f->call($this__0, $event);
    };
    $eventTarget = function(dynamic $e) use ($Assert_failure,$Js_of_ocaml_Js,$Not_found,$a_,$call1,$call2,$caml_get_public_method,$caml_wrap_thrown_exception) {
      $v_ = function(dynamic $param) use ($Js_of_ocaml_Js,$Not_found,$call1,$call2,$caml_get_public_method,$caml_wrap_thrown_exception,$e) {
        $E_ = function(dynamic $param) use ($Not_found,$caml_wrap_thrown_exception) {
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        };
        $F_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -1021537224, 38), $x);
        };
        $G_ = (function(dynamic $t27, dynamic $param) {return $t27->srcElement;
         })($e, $F_);
        return $call2($Js_of_ocaml_Js[5][8], $G_, $E_);
      };
      $w_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 116192081, 39), $x);
      };
      $x_ = (function(dynamic $t26, dynamic $param) {return $t26->target;})($e, $w_);
      $target = $call2($Js_of_ocaml_Js[5][8], $x_, $v_);
      $y_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -420195839, 40), $x);
      };
      $z_ = $Js_of_ocaml_Js[50][1];
      if (
        instance_of
         ($target,
          (function(dynamic $t25, dynamic $param) {return $t25->Node;})($z_, $y_))
      ) {
        $A_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -158969380, 41), $x);
        };
        if (
          3 ===
            (function(dynamic $t24, dynamic $param) {return $t24->nodeType;})($target, $A_)
        ) {
          $B_ = function(dynamic $param) use ($Assert_failure,$a_,$caml_wrap_thrown_exception) {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
          };
          $C_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -400811956, 42), $x);
          };
          $D_ = (function(dynamic $t23, dynamic $param) {return $t23->parentNode;
           })($target, $C_);
          return $call2($Js_of_ocaml_Js[5][8], $D_, $B_);
        }
        return $target;
      }
      return $target;
    };
    $make = function(dynamic $s) {return $s->toString();};
    $Event = Vector{0, $make};
    $addEventListener = function
    (dynamic $e, dynamic $typ, dynamic $h, dynamic $capt) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$runtime) {
      $g_ = $Js_of_ocaml_Js[3];
      $h_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -245101619, 43), $x);
      };
      if (
        (function(dynamic $t44, dynamic $param) {return $t44->addEventListener;
         })($e, $h_) === $g_
      ) {
        $i_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -942667500, 44), $x);
        };
        $j_ = "on";
        $ev = (function(dynamic $t43, dynamic $t42, dynamic $param) {return $t43->concat($t42);
         })($j_, $typ, $i_);
        $callback = function(dynamic $e) use ($h,$runtime) {
          $o_ = Vector{0, $h, $e, Vector{0}};
          $p_ = function(dynamic $u_, dynamic $t_, dynamic $s_) use ($runtime) {
            return $runtime["caml_js_call"]($u_, $t_, $s_);
          };
          return function(dynamic $q_, dynamic $r_) use ($o_,$p_) {
            return $p_($o_, $q_, $r_);
          };
        };
        $k_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -362647019, 45), $x);
        };
        ((function(dynamic $t41, dynamic $t39, dynamic $t40, dynamic $param) {return $t41->attachEvent($t39, $t40);
          })($e, $ev, $callback, $k_));
        return function(dynamic $param) use ($call1,$callback,$caml_get_public_method,$e,$ev) {
          $n_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 681618887, 46), $x);
          };
          return (function
           (dynamic $t38, dynamic $t36, dynamic $t37, dynamic $param) {return $t38->detachEvent($t36, $t37);
           })($e, $ev, $callback, $n_);
        };
      }
      $l_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -245101619, 47), $x);
      };
      ((function
        (dynamic $t35, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $param) {
          return $t35->addEventListener($t32, $t33, $t34);
        })($e, $typ, $h, $capt, $l_));
      return function(dynamic $param) use ($call1,$caml_get_public_method,$capt,$e,$h,$typ) {
        $m_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -713717814, 48), $x);
        };
        return (function
         (dynamic $t31, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) {
           return $t31->removeEventListener($t28, $t29, $t30);
         })($e, $typ, $h, $capt, $m_);
      };
    };
    $removeEventListener = function(dynamic $id) use ($call1) {
      return $call1($id, 0);
    };
    $preventDefault = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $b_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -408605495, 49), $x);
      };
      $c_ = (function(dynamic $t48, dynamic $param) {return $t48->preventDefault;
       })($ev, $b_);
      if ($call1($Js_of_ocaml_Js[6][5], $c_)) {
        $d_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -408605495, 50), $x);
        };
        return (function(dynamic $t47, dynamic $param) {return $t47->preventDefault();
         })($ev, $d_);
      }
      $e_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1049971873, 51), $x);
      };
      $f_ = ! ! 0;
      return (function(dynamic $t46, dynamic $t45, dynamic $param) {$t46->returnValue = $t45;return 0;
       })($ev, $f_, $e_);
    };
    $Js_of_ocaml_Dom = Vector{
      0,
      $DocumentPosition,
      $insertBefore,
      $replaceChild,
      $removeChild,
      $appendChild,
      $list_of_nodeList,
      $nodeType,
      Vector{0, $element, $text, $attr},
      $no_handler,
      $handler,
      $full_handler,
      $invoke_handler,
      $eventTarget,
      $Event,
      $addEventListener,
      $removeEventListener,
      $preventDefault
    };
    
     return ($Js_of_ocaml_Dom);

  }
  public static function preventDefault(dynamic $ev) {
    return static::get()[17]($ev);
  }
  public static function removeEventListener(dynamic $id) {
    return static::get()[16]($id);
  }
  public static function addEventListener(dynamic $e, dynamic $typ, dynamic $h, dynamic $capt) {
    return static::get()[15]($e, $typ, $h, $capt);
  }
  public static function Event() {
    return static::get()[14]();
  }
  public static function eventTarget(dynamic $e) {
    return static::get()[13]($e);
  }
  public static function invoke_handler(dynamic $f, dynamic $this, dynamic $event) {
    return static::get()[12]($f, $this, $event);
  }
  public static function full_handler(dynamic $f) {
    return static::get()[11]($f);
  }
  public static function handler(dynamic $f) {
    return static::get()[10]($f);
  }
  public static function no_handler() {
    return static::get()[9]();
  }
  public static function nodeType(dynamic $e) {
    return static::get()[7]($e);
  }
  public static function list_of_nodeList(dynamic $nodeList) {
    return static::get()[6]($nodeList);
  }
  public static function appendChild(dynamic $p, dynamic $n) {
    return static::get()[5]($p, $n);
  }
  public static function removeChild(dynamic $p, dynamic $n) {
    return static::get()[4]($p, $n);
  }
  public static function replaceChild(dynamic $p, dynamic $n, dynamic $o) {
    return static::get()[3]($p, $n, $o);
  }
  public static function insertBefore(dynamic $p, dynamic $n, dynamic $o) {
    return static::get()[2]($p, $n, $o);
  }
  public static function DocumentPosition() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
