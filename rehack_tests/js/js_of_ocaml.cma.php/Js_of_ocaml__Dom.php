<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Dom.php
 */

namespace Rehack;

final class Js_of_ocaml__Dom {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $List_ = List_::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    Js_of_ocaml__Dom::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Dom;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Assert_failure = $global_data["Assert_failure"];
    $Not_found = $global_data["Not_found"];
    $List = $global_data["List_"];
    $a = Vector{0, $string("lib/js_of_ocaml/dom.ml"), 343, 67};
    $list_of_nodeList = function(dynamic $nodeList) use ($Js_of_ocaml_Js,$List,$call1,$caml_get_public_method) {
      $X = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 24), $x);
      };
      $length = (function(dynamic $t2, dynamic $param) {return $t2->length;})($nodeList, $X);
      $add_item = function(dynamic $acc, dynamic $i) use ($Js_of_ocaml_Js,$List,$call1,$caml_get_public_method,$length,$nodeList) {
        $acc__0 = $acc;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $length) {
            $Y = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -977287917, 25), $x);
            };
            $Z = (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->item($t0);
             })($nodeList, $i__0, $Y);
            $match = $call1($Js_of_ocaml_Js[5][10], $Z);
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
      $W = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 36716898, 26), $x);
      };
      ((function(dynamic $t4, dynamic $t3, dynamic $param) {return $t4->appendChild($t3);
        })($p, $n, $W));
      return 0;
    };
    $removeChild = function(dynamic $p, dynamic $n) use ($call1,$caml_get_public_method) {
      $V = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1007843656, 27), $x);
      };
      ((function(dynamic $t6, dynamic $t5, dynamic $param) {return $t6->removeChild($t5);
        })($p, $n, $V));
      return 0;
    };
    $replaceChild = function(dynamic $p, dynamic $n, dynamic $o) use ($call1,$caml_get_public_method) {
      $U = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 961057992, 28), $x);
      };
      ((function(dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) {return $t9->replaceChild($t7, $t8);
        })($p, $n, $o, $U));
      return 0;
    };
    $insertBefore = function(dynamic $p, dynamic $n, dynamic $o) use ($call1,$caml_get_public_method) {
      $T = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 281001112, 29), $x);
      };
      ((function(dynamic $t12, dynamic $t10, dynamic $t11, dynamic $param) {return $t12->insertBefore($t10, $t11);
        })($p, $n, $o, $T));
      return 0;
    };
    $nodeType = function(dynamic $e) use ($call1,$caml_get_public_method) {
      $S = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 30), $x);
      };
      $match = (function(dynamic $t13, dynamic $param) {return $t13->nodeType;
       })($e, $S);
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
      $R = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 31), $x);
      };
      return (function(dynamic $t14, dynamic $param) {return $t14->nodeType;})($e, $R) === $t
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $element = function(dynamic $e) use ($cast) {return $cast($e, 1);};
    $text = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $P = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -158969380, 32), $x);
      };
      if (
        3 !==
          (function(dynamic $t15, dynamic $param) {return $t15->nodeType;})($e, $P)
      ) {
        $Q = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -158969380, 33), $x);
        };
        if (
          4 !==
            (function(dynamic $t16, dynamic $param) {return $t16->nodeType;})($e, $Q)
        ) {return $Js_of_ocaml_Js[1];}
      }
      return $call1($Js_of_ocaml_Js[2], $e);
    };
    $attr = function(dynamic $e) use ($cast) {return $cast($e, 2);};
    $no_handler = $Js_of_ocaml_Js[1];
    $window_event = function(dynamic $param) {return  event ;};
    $handler = function(dynamic $f) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$window_event) {
      $L = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$f,$window_event) {
        $M = $call1($Js_of_ocaml_Js[2], $e);
        if ($call1($Js_of_ocaml_Js[5][5], $M)) {
          $res = $call1($f, $e);
          if (1 - (int) $res) {
            $N = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -408605495, 34), $x);
            };
            ((function(dynamic $t17, dynamic $param) {return $t17->preventDefault();
              })($e, $N));
          }
          return $res;
        }
        $e__0 = $window_event(0);
        $res__0 = $call1($f, $e__0);
        if (1 - (int) $res__0) {
          $O = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 1049971873, 35), $x);
          };
          ((function(dynamic $t19, dynamic $t18, dynamic $param) {$t19->returnValue = $t18;return 0;
            })($e__0, $res__0, $O));
        }
        return $res__0;
      };
      return $call1($Js_of_ocaml_Js[2], $L);
    };
    $full_handler = function(dynamic $f) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$runtime,$window_event) {
      $H = $runtime["caml_js_wrap_meth_callback_unsafe"](
        function(dynamic $this__0, dynamic $e) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$f,$window_event) {
          $I = $call1($Js_of_ocaml_Js[2], $e);
          if ($call1($Js_of_ocaml_Js[5][5], $I)) {
            $res = $call2($f, $this__0, $e);
            if (1 - (int) $res) {
              $J = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -408605495, 36), $x);
              };
              ((function(dynamic $t20, dynamic $param) {return $t20->preventDefault();
                })($e, $J));
            }
            return $res;
          }
          $e__0 = $window_event(0);
          $res__0 = $call2($f, $this__0, $e__0);
          if (1 - (int) $res__0) {
            $K = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 1049971873, 37), $x);
            };
            ((function(dynamic $t22, dynamic $t21, dynamic $param) {$t22->returnValue = $t21;return 0;
              })($e__0, $res__0, $K));
          }
          return $res__0;
        }
      );
      return $call1($Js_of_ocaml_Js[2], $H);
    };
    $invoke_handler = function(dynamic $f, dynamic $this__0, dynamic $event) {return $f->call($this__0, $event);
    };
    $eventTarget = function(dynamic $e) use ($Assert_failure,$Js_of_ocaml_Js,$Not_found,$a,$call1,$call2,$caml_get_public_method,$runtime) {
      $v = function(dynamic $param) use ($Js_of_ocaml_Js,$Not_found,$call1,$call2,$caml_get_public_method,$e,$runtime) {
        $E = function(dynamic $param) use ($Not_found,$runtime) {
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        };
        $F = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -1021537224, 38), $x);
        };
        $G = (function(dynamic $t27, dynamic $param) {return $t27->srcElement;
         })($e, $F);
        return $call2($Js_of_ocaml_Js[5][8], $G, $E);
      };
      $w = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 116192081, 39), $x);
      };
      $x = (function(dynamic $t26, dynamic $param) {return $t26->target;})($e, $w);
      $target = $call2($Js_of_ocaml_Js[5][8], $x, $v);
      $y = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -420195839, 40), $x);
      };
      $z = $Js_of_ocaml_Js[50][1];
      if (
        instance_of
         ($target,
          (function(dynamic $t25, dynamic $param) {return $t25->Node;})($z, $y))
      ) {
        $A = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -158969380, 41), $x);
        };
        if (
          3 ===
            (function(dynamic $t24, dynamic $param) {return $t24->nodeType;})($target, $A)
        ) {
          $B = function(dynamic $param) use ($Assert_failure,$a,$runtime) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $a}) as \Throwable;
          };
          $C = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -400811956, 42), $x);
          };
          $D = (function(dynamic $t23, dynamic $param) {return $t23->parentNode;
           })($target, $C);
          return $call2($Js_of_ocaml_Js[5][8], $D, $B);
        }
        return $target;
      }
      return $target;
    };
    $make = function(dynamic $s) {return $s->toString();};
    $Event = Vector{0, $make};
    $addEventListener = function
    (dynamic $e, dynamic $typ, dynamic $h, dynamic $capt) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$runtime) {
      $g = $Js_of_ocaml_Js[3];
      $h = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -245101619, 43), $x);
      };
      if (
        (function(dynamic $t44, dynamic $param) {return $t44->addEventListener;
         })($e, $h) === $g
      ) {
        $i = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -942667500, 44), $x);
        };
        $j = "on";
        $ev = (function(dynamic $t43, dynamic $t42, dynamic $param) {return $t43->concat($t42);
         })($j, $typ, $i);
        $callback = function(dynamic $e) use ($h,$runtime) {
          $o = Vector{0, $h, $e, Vector{0}};
          $p = function(dynamic $u, dynamic $t, dynamic $s) use ($runtime) {
            return $runtime["caml_js_call"]($u, $t, $s);
          };
          return function(dynamic $q, dynamic $r) use ($o,$p) {
            return $p($o, $q, $r);
          };
        };
        $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -362647019, 45), $x);
        };
        ((function(dynamic $t41, dynamic $t39, dynamic $t40, dynamic $param) {return $t41->attachEvent($t39, $t40);
          })($e, $ev, $callback, $k));
        return function(dynamic $param) use ($call1,$callback,$caml_get_public_method,$e,$ev) {
          $n = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 681618887, 46), $x);
          };
          return (function
           (dynamic $t38, dynamic $t36, dynamic $t37, dynamic $param) {return $t38->detachEvent($t36, $t37);
           })($e, $ev, $callback, $n);
        };
      }
      $l = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -245101619, 47), $x);
      };
      ((function
        (dynamic $t35, dynamic $t32, dynamic $t33, dynamic $t34, dynamic $param) {
          return $t35->addEventListener($t32, $t33, $t34);
        })($e, $typ, $h, $capt, $l));
      return function(dynamic $param) use ($call1,$caml_get_public_method,$capt,$e,$h,$typ) {
        $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -713717814, 48), $x);
        };
        return (function
         (dynamic $t31, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) {
           return $t31->removeEventListener($t28, $t29, $t30);
         })($e, $typ, $h, $capt, $m);
      };
    };
    $removeEventListener = function(dynamic $id) use ($call1) {
      return $call1($id, 0);
    };
    $preventDefault = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $b = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -408605495, 49), $x);
      };
      $c = (function(dynamic $t48, dynamic $param) {return $t48->preventDefault;
       })($ev, $b);
      if ($call1($Js_of_ocaml_Js[6][5], $c)) {
        $d = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -408605495, 50), $x);
        };
        return (function(dynamic $t47, dynamic $param) {return $t47->preventDefault();
         })($ev, $d);
      }
      $e = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1049971873, 51), $x);
      };
      $f = ! ! 0;
      return (function(dynamic $t46, dynamic $t45, dynamic $param) {$t46->returnValue = $t45;return 0;
       })($ev, $f, $e);
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
    
    $runtime["caml_register_global"](35, $Js_of_ocaml_Dom, "Js_of_ocaml__Dom");

  }
}

