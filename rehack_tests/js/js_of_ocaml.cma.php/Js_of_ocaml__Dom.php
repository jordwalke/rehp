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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Assert_failure = $global_data["Assert_failure"];
    $Not_found = $global_data["Not_found"];
    $List = $global_data["List_"];
    $e_ = Vector{0, $caml_new_string("lib/js_of_ocaml/dom.ml"), 343, 67};
    $list_of_nodeList = function($nodeList) use ($Js_of_ocaml_Js,$List,$caml_call1,$caml_get_public_method) {
      $fW = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 48), $x);
      };
      $length = (function($t2, $param) {return $t2->length;})($nodeList, $fW);
      $add_item = function($acc, $i) use ($Js_of_ocaml_Js,$List,$caml_call1,$caml_get_public_method,$length,$nodeList) {
        $acc__0 = $acc;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $length) {
            $fX = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -977287917, 49),
                $x
              );
            };
            $fY = (function($t1, $t0, $param) {return $t1->item($t0);})($nodeList, $i__0, $fX);
            $match = $caml_call1($Js_of_ocaml_Js[5][10], $fY);
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
          return $caml_call1($List[9], $acc__0);
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
    $has = function($t, $mask) {return ($t & $mask) === $mask ? 1 : (0);};
    $add = function($x, $y) {return $x | $y;};
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
    $appendChild = function($p, $n) use ($caml_call1,$caml_get_public_method) {
      $fV = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 36716898, 50), $x);
      };
      ((function($t4, $t3, $param) {return $t4->appendChild($t3);})($p, $n, $fV));
      return 0;
    };
    $removeChild = function($p, $n) use ($caml_call1,$caml_get_public_method) {
      $fU = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1007843656, 51), $x);
      };
      ((function($t6, $t5, $param) {return $t6->removeChild($t5);})($p, $n, $fU));
      return 0;
    };
    $replaceChild = function($p, $n, $o) use ($caml_call1,$caml_get_public_method) {
      $fT = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 961057992, 52), $x);
      };
      ((function($t9, $t7, $t8, $param) {return $t9->replaceChild($t7, $t8);})($p, $n, $o, $fT));
      return 0;
    };
    $insertBefore = function($p, $n, $o) use ($caml_call1,$caml_get_public_method) {
      $fS = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 281001112, 53), $x);
      };
      ((function($t12, $t10, $t11, $param) {
          return $t12->insertBefore($t10, $t11);
        })($p, $n, $o, $fS));
      return 0;
    };
    $nodeType = function($e) use ($caml_call1,$caml_get_public_method) {
      $fR = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -158969380, 54), $x);
      };
      $match = (function($t13, $param) {return $t13->nodeType;})($e, $fR);
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
    $cast = function($e, $t) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $fQ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -158969380, 55), $x);
      };
      return (function($t14, $param) {return $t14->nodeType;})($e, $fQ) === $t
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $element = function($e) use ($cast) {return $cast($e, 1);};
    $text = function($e) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $fO = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -158969380, 56), $x);
      };
      if (3 !== (function($t15, $param) {return $t15->nodeType;})($e, $fO)) {
        $fP = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -158969380, 57), $x);
        };
        if (4 !== (function($t16, $param) {return $t16->nodeType;})($e, $fP)) {return $Js_of_ocaml_Js[1];}
      }
      return $caml_call1($Js_of_ocaml_Js[2], $e);
    };
    $attr = function($e) use ($cast) {return $cast($e, 2);};
    $no_handler = $Js_of_ocaml_Js[1];
    $window_event = function($param) {return  event ;};
    $handler = function($f) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$window_event) {
      $fK = function($e) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$f,$window_event) {
        $fL = $caml_call1($Js_of_ocaml_Js[2], $e);
        if ($caml_call1($Js_of_ocaml_Js[5][5], $fL)) {
          $res = $caml_call1($f, $e);
          if (1 - (int) $res) {
            $fM = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -408605495, 58),
                $x
              );
            };
            ((function($t17, $param) {return $t17->preventDefault();})($e, $fM));
          }
          return $res;
        }
        $e__0 = $window_event(0);
        $res__0 = $caml_call1($f, $e__0);
        if (1 - (int) $res__0) {
          $fN = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 1049971873, 59), $x
            );
          };
          ((function($t19, $t18, $param) {$t19->returnValue = $t18;return 0;})($e__0, $res__0, $fN));
        }
        return $res__0;
      };
      return $caml_call1($Js_of_ocaml_Js[2], $fK);
    };
    $full_handler = function($f) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$runtime,$window_event) {
      $fG = $runtime["caml_js_wrap_meth_callback_unsafe"](
        function($this__0, $e) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$f,$window_event) {
          $fH = $caml_call1($Js_of_ocaml_Js[2], $e);
          if ($caml_call1($Js_of_ocaml_Js[5][5], $fH)) {
            $res = $caml_call2($f, $this__0, $e);
            if (1 - (int) $res) {
              $fI = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, -408605495, 60),
                  $x
                );
              };
              ((function($t20, $param) {return $t20->preventDefault();})($e, $fI));
            }
            return $res;
          }
          $e__0 = $window_event(0);
          $res__0 = $caml_call2($f, $this__0, $e__0);
          if (1 - (int) $res__0) {
            $fJ = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, 1049971873, 61),
                $x
              );
            };
            ((function($t22, $t21, $param) {
                $t22->returnValue = $t21;
                return 0;
              })($e__0, $res__0, $fJ));
          }
          return $res__0;
        }
      );
      return $caml_call1($Js_of_ocaml_Js[2], $fG);
    };
    $invoke_handler = function($f, $this__0, $event) {
      return $f->call($this__0, $event);
    };
    $eventTarget = function($e) use ($Assert_failure,$Js_of_ocaml_Js,$Not_found,$caml_call1,$caml_call2,$caml_get_public_method,$e_,$runtime) {
      $fu = function($param) use ($Js_of_ocaml_Js,$Not_found,$caml_call1,$caml_call2,$caml_get_public_method,$e,$runtime) {
        $fD = function($param) use ($Not_found,$runtime) {
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        };
        $fE = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -1021537224, 62), $x);
        };
        $fF = (function($t27, $param) {return $t27->srcElement;})($e, $fE);
        return $caml_call2($Js_of_ocaml_Js[5][8], $fF, $fD);
      };
      $fv = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 116192081, 63), $x);
      };
      $fw = (function($t26, $param) {return $t26->target;})($e, $fv);
      $target = $caml_call2($Js_of_ocaml_Js[5][8], $fw, $fu);
      $fx = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -420195839, 64), $x);
      };
      $fy = $Js_of_ocaml_Js[50][1];
      if (
        instance_of
         ($target, (function($t25, $param) {return $t25->Node;})($fy, $fx))
      ) {
        $fz = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -158969380, 65), $x);
        };
        if (
          3 ===
            (function($t24, $param) {return $t24->nodeType;})($target, $fz)
        ) {
          $fA = function($param) use ($Assert_failure,$e_,$runtime) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $e_}) as \Throwable;
          };
          $fB = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, -400811956, 66), $x
            );
          };
          $fC = (function($t23, $param) {return $t23->parentNode;})($target, $fB);
          return $caml_call2($Js_of_ocaml_Js[5][8], $fC, $fA);
        }
        return $target;
      }
      return $target;
    };
    $make = function($s) {return $s->toString();};
    $Event = Vector{0, $make};
    $addEventListener = function($e, $typ, $h, $capt) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$runtime) {
      $ff = $Js_of_ocaml_Js[3];
      $fg = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -245101619, 67), $x);
      };
      if (
        (function($t44, $param) {return $t44->addEventListener;})($e, $fg) === $ff
      ) {
        $fh = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -942667500, 68), $x);
        };
        $fi = "on";
        $ev = (function($t43, $t42, $param) {return $t43->concat($t42);})($fi, $typ, $fh);
        $callback = function($e) use ($h,$runtime) {
          $fn = Vector{0, $h, $e, Vector{0}};
          $fo = function($ft, $fs, $fr) use ($runtime) {
            return $runtime["caml_js_call"]($ft, $fs, $fr);
          };
          return function($fp, $fq) use ($fn,$fo) {return $fo($fn, $fp, $fq);};
        };
        $fj = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -362647019, 69), $x);
        };
        ((function($t41, $t39, $t40, $param) {
            return $t41->attachEvent($t39, $t40);
          })($e, $ev, $callback, $fj));
        return function($param) use ($callback,$caml_call1,$caml_get_public_method,$e,$ev) {
          $fm = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 681618887, 70), $x);
          };
          return (function($t38, $t36, $t37, $param) {
             return $t38->detachEvent($t36, $t37);
           })($e, $ev, $callback, $fm);
        };
      }
      $fk = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -245101619, 71), $x);
      };
      ((function($t35, $t32, $t33, $t34, $param) {
          return $t35->addEventListener($t32, $t33, $t34);
        })($e, $typ, $h, $capt, $fk));
      return function($param) use ($caml_call1,$caml_get_public_method,$capt,$e,$h,$typ) {
        $fl = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -713717814, 72), $x);
        };
        return (function($t31, $t28, $t29, $t30, $param) {
           return $t31->removeEventListener($t28, $t29, $t30);
         })($e, $typ, $h, $capt, $fl);
      };
    };
    $removeEventListener = function($id) use ($caml_call1) {
      return $caml_call1($id, 0);
    };
    $preventDefault = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $fa = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -408605495, 73), $x);
      };
      $fb = (function($t48, $param) {return $t48->preventDefault;})($ev, $fa);
      if ($caml_call1($Js_of_ocaml_Js[6][5], $fb)) {
        $fc = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -408605495, 74), $x);
        };
        return (function($t47, $param) {return $t47->preventDefault();})($ev, $fc);
      }
      $fd = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1049971873, 75), $x);
      };
      $fe = ! ! 0;
      return (function($t46, $t45, $param) {
         $t46->returnValue = $t45;
         return 0;
       })($ev, $fe, $fd);
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