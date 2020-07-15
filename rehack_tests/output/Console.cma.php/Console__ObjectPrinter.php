<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Console__ObjectPrinter {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $extractList = new Ref();$indentForDepth = new Ref();
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $is_int = $runtime["is_int"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst = $string("  ");
    $cst__0 = $string("");
    $cst__1 = $string("  ");
    $cst__2 = $string("    ");
    $cst__3 = $string("      ");
    $cst__4 = $string("        ");
    $cst__5 = $string("          ");
    $cst__6 = $string("            ");
    $cst__7 = $string("              ");
    $cst__8 = $string("                ");
    $cst__30 = $string("\"");
    $cst__31 = $string("\"");
    $cst_max_depth = $string("@max-depth");
    $cst_max_length = $string("@max-length");
    $cst_unknown = $string("~unknown");
    $cst_lazy = $string("~lazy");
    $cst__29 = $string(")");
    $cst_closure = $string("closure(");
    $cst__23 = $string(",\n");
    $cst__17 = $string("");
    $cst__18 = $string("]");
    $cst__19 = $string("\n");
    $cst__20 = $string(",\n");
    $cst__21 = $string("\n");
    $cst__22 = $string("[");
    $cst__28 = $string(", ");
    $cst__24 = $string("");
    $cst__25 = $string("]");
    $cst__26 = $string(", ");
    $cst__27 = $string("[");
    $cst__13 = $string(",\n");
    $cst__9 = $string("");
    $cst__10 = $string("\n");
    $cst__11 = $string(",\n");
    $cst__12 = $string("\n");
    $cst__16 = $string(", ");
    $cst__14 = $string("");
    $cst__15 = $string(", ");
    $Stdlib_obj = Stdlib__obj::get();
    $Stdlib = Stdlib::get();
    $Stdlib_list = Stdlib__list::get();
    $Stdlib_string = Stdlib__string::get();
    $Assert_failure = Assert_failure::get();
    $b_ = Vector{0, 0, 0} as dynamic;
    $j_ = Vector{0, $string("[|"), $string("|]")} as dynamic;
    $g_ = Vector{0, $string("{"), $string("}")} as dynamic;
    $c_ = Vector{0, 0, 0} as dynamic;
    $a_ = Vector{
      0,
      $string("shared-src/objectPrinter/ObjectPrinter.re"),
      20,
      2
    } as dynamic;
    $colWidth = Vector{0, 70} as dynamic;
    $maxDepth = Vector{0, 70} as dynamic;
    $maxLength = Vector{0, 5} as dynamic;
    $setPrintWidth = (dynamic $w) : dynamic ==> {$colWidth[1] = $w;return 0;};
    $setMaxDepth = (dynamic $d) : dynamic ==> {$maxDepth[1] = $d;return 0;};
    $setMaxLength = (dynamic $l) : dynamic ==> {
      if (2 < $l) {$maxLength[1] = $l;return 0;}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
    };
    $detectList = (dynamic $maxLength, dynamic $o) : dynamic ==> {
      $ab_ = null as dynamic;
      $ac_ = null as dynamic;
      $ad_ = null as dynamic;
      $match = null as dynamic;
      $maxLength__1 = null as dynamic;
      $o__1 = null as dynamic;
      $size = null as dynamic;
      $tag = null as dynamic;
      $maxLength__0 = $maxLength;
      $o__0 = $o;
      for (;;) {
        if (0 === $maxLength__0) {return 1;}
        $tag = $caml_obj_tag($o__0);
        $match = $tag === $Stdlib_obj[18] ? 1 : (0);
        if (0 === $match) {
          $size = $o__0->count() - 1;
          $ab_ = $tag === $Stdlib_obj[4] ? 1 : (0);
          if ($ab_) {
            $ac_ = 2 === $size ? 1 : (0);
            if ($ac_) {
              $o__1 = $o__0[2];
              $maxLength__1 = (int) ($maxLength__0 + -1) as dynamic;
              $maxLength__0 = $maxLength__1;
              $o__0 = $o__1;
              continue;
            }
            $ad_ = $ac_;
          }
          else {$ad_ = $ab_;}
          return $ad_;
        }
        return $runtime["caml_equal"]($o__0, 0);
      }
    };
    $extractList->contents = (dynamic $maxNum, dynamic $o) : dynamic ==> {
      if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
      if ($is_int($o)) {return $b_;}
      $match = $extractList->contents((int) ($maxNum + -1), $o[2]);
      $rest = $match[2];
      $restWasTruncated = $match[1];
      return Vector{0, $restWasTruncated, Vector{0, $o[1], $rest}};
    };
    $extractFields = (dynamic $maxNum, dynamic $o) : dynamic ==> {
      $extractFields = 
      (dynamic $maxNum, dynamic $fieldsSoFar, dynamic $numFields) : dynamic ==> {
        $fieldsSoFar__1 = null as dynamic;
        $maxNum__1 = null as dynamic;
        $numFields__1 = null as dynamic;
        $maxNum__0 = $maxNum;
        $fieldsSoFar__0 = $fieldsSoFar;
        $numFields__0 = $numFields;
        for (;;) {
          if (0 === $maxNum__0) {
            return Vector{0, 0 < $numFields__0 ? 1 : (0), $fieldsSoFar__0};
          }
          if (0 === $numFields__0) {return Vector{0, 0, $fieldsSoFar__0};}
          $numFields__1 = (int) ($numFields__0 + -1) as dynamic;
          $fieldsSoFar__1 = Vector{
            0,
            $o[(int) ($numFields__0 + -1) + 1],
            $fieldsSoFar__0
          } as dynamic;
          $maxNum__1 = (int) ($maxNum__0 + -1) as dynamic;
          $maxNum__0 = $maxNum__1;
          $fieldsSoFar__0 = $fieldsSoFar__1;
          $numFields__0 = $numFields__1;
          continue;
        }
      };
      return $extractFields($maxNum, 0, $o->count() - 1);
    };
    $getBreakData = (dynamic $itms) : dynamic ==> {
      $aa_ = (dynamic $param, dynamic $itm) : dynamic ==> {
        $curDidBreak = $param[2];
        $curTotalLen = $param[1];
        $containsNewline = $call2($Stdlib_string[22], $itm, 10);
        $curDidBreak__0 = $curDidBreak ? $curDidBreak : ($containsNewline);
        return Vector{
          0,
          (int)
          ((int) ($curTotalLen + $caml_ml_string_length($itm)) + 2),
          $curDidBreak__0
        };
      };
      $match = $call3($Stdlib_list[21], $aa_, $c_, $itms);
      $someChildBroke = $match[2];
      $allItemsLen = $match[1];
      return Vector{0, $allItemsLen, $someChildBroke};
    };
    $indentForDepth->contents = (dynamic $n) : dynamic ==> {
      $Z_ = null as dynamic;
      if (8 < $unsigned_right_shift_32($n, 0)) {
        $Z_ = $indentForDepth->contents((int) ($n + -1));
        return $call2($Stdlib[28], $Z_, $cst);
      }
      switch($n) {
        // FALLTHROUGH
        case 0:
          return $cst__0;
        // FALLTHROUGH
        case 1:
          return $cst__1;
        // FALLTHROUGH
        case 2:
          return $cst__2;
        // FALLTHROUGH
        case 3:
          return $cst__3;
        // FALLTHROUGH
        case 4:
          return $cst__4;
        // FALLTHROUGH
        case 5:
          return $cst__5;
        // FALLTHROUGH
        case 6:
          return $cst__6;
        // FALLTHROUGH
        case 7:
          return $cst__7;
        // FALLTHROUGH
        default:
          return $cst__8;
        }
    };
    $printTreeShape = 
    (dynamic $pair, dynamic $self, dynamic $depth, dynamic $o) : dynamic ==> {
      $T_ = null as dynamic;
      $U_ = null as dynamic;
      $V_ = null as dynamic;
      $W_ = null as dynamic;
      $X_ = null as dynamic;
      $Y_ = null as dynamic;
      $truncationMsg = null as dynamic;
      $truncationMsg__0 = null as dynamic;
      $right = $pair[2];
      $left = $pair[1];
      $match = $extractFields($maxLength[1], $o);
      $lst = $match[2];
      $wasTruncated = $match[1];
      $dNext = (int) (1 + $depth) as dynamic;
      $indent = $indentForDepth->contents($depth);
      $indentNext = $indentForDepth->contents($dNext);
      $K_ = (dynamic $o) : dynamic ==> {
        return $call3($self[13], $self, Vector{0, $dNext}, $o);
      };
      $itms = $call2($Stdlib_list[17], $K_, $lst);
      $match__0 = $getBreakData($itms);
      $someChildBroke = $match__0[2];
      $allItemsLen = $match__0[1];
      if (
        !
        ($colWidth[1] <=
           (int)
           ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
      ) {
        if (! $someChildBroke) {
          if (0 === $wasTruncated) {
            $truncationMsg__0 = $cst__14;
          }
          else {
            $Y_ = $call1($self[6], $self);
            $truncationMsg__0 = $call2($Stdlib[28], $cst__16, $Y_);
          }
          $V_ = $call2($Stdlib[28], $truncationMsg__0, $right);
          $W_ = $call2($Stdlib_string[7], $cst__15, $itms);
          $X_ = $call2($Stdlib[28], $W_, $V_);
          return $call2($Stdlib[28], $left, $X_);
        }
      }
      if (0 === $wasTruncated) {
        $truncationMsg = $cst__9;
      }
      else {
        $T_ = $call1($self[6], $self);
        $U_ = $call2($Stdlib[28], $indentNext, $T_);
        $truncationMsg = $call2($Stdlib[28], $cst__13, $U_);
      }
      $L_ = $call2($Stdlib[28], $indent, $right);
      $M_ = $call2($Stdlib[28], $cst__10, $L_);
      $N_ = $call2($Stdlib[28], $truncationMsg, $M_);
      $O_ = $call2($Stdlib[28], $cst__11, $indentNext);
      $P_ = $call2($Stdlib_string[7], $O_, $itms);
      $Q_ = $call2($Stdlib[28], $P_, $N_);
      $R_ = $call2($Stdlib[28], $indentNext, $Q_);
      $S_ = $call2($Stdlib[28], $cst__12, $R_);
      return $call2($Stdlib[28], $left, $S_);
    };
    $printListShape = (dynamic $self, dynamic $depth, dynamic $o) : dynamic ==> {
      $E_ = null as dynamic;
      $F_ = null as dynamic;
      $G_ = null as dynamic;
      $H_ = null as dynamic;
      $I_ = null as dynamic;
      $J_ = null as dynamic;
      $truncationMsg = null as dynamic;
      $truncationMsg__0 = null as dynamic;
      $match = $extractList->contents($maxLength[1], $o);
      $lst = $match[2];
      $wasTruncated = $match[1];
      $dNext = (int) (1 + $depth) as dynamic;
      $indent = $indentForDepth->contents($depth);
      $indentNext = $indentForDepth->contents($dNext);
      $v_ = (dynamic $o) : dynamic ==> {
        return $call3($self[13], $self, Vector{0, $dNext}, $o);
      };
      $itms = $call2($Stdlib_list[17], $v_, $lst);
      $match__0 = $getBreakData($itms);
      $someChildBroke = $match__0[2];
      $allItemsLen = $match__0[1];
      if (
        !
        ($colWidth[1] <=
           (int)
           ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
      ) {
        if (! $someChildBroke) {
          if (0 === $wasTruncated) {
            $truncationMsg__0 = $cst__24;
          }
          else {
            $J_ = $call1($self[6], $self);
            $truncationMsg__0 = $call2($Stdlib[28], $cst__28, $J_);
          }
          $G_ = $call2($Stdlib[28], $truncationMsg__0, $cst__25);
          $H_ = $call2($Stdlib_string[7], $cst__26, $itms);
          $I_ = $call2($Stdlib[28], $H_, $G_);
          return $call2($Stdlib[28], $cst__27, $I_);
        }
      }
      if (0 === $wasTruncated) {
        $truncationMsg = $cst__17;
      }
      else {
        $E_ = $call1($self[6], $self);
        $F_ = $call2($Stdlib[28], $indentNext, $E_);
        $truncationMsg = $call2($Stdlib[28], $cst__23, $F_);
      }
      $w_ = $call2($Stdlib[28], $indent, $cst__18);
      $x_ = $call2($Stdlib[28], $cst__19, $w_);
      $y_ = $call2($Stdlib[28], $truncationMsg, $x_);
      $z_ = $call2($Stdlib[28], $cst__20, $indentNext);
      $A_ = $call2($Stdlib_string[7], $z_, $itms);
      $B_ = $call2($Stdlib[28], $A_, $y_);
      $C_ = $call2($Stdlib[28], $indentNext, $B_);
      $D_ = $call2($Stdlib[28], $cst__21, $C_);
      return $call2($Stdlib[28], $cst__22, $D_);
    };
    $d_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
      $depth = null as dynamic;
      $match = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $depth = $sth;
      }
      else {$depth = 0 as dynamic;}
      if ($maxDepth[1] < $depth) {return $call1($self[5], $self);}
      $tag = $caml_obj_tag($o);
      if ($tag === $Stdlib_obj[13]) {
        $match = 0 === $depth ? 1 : (0);
        return 0 === $match
          ? $call2($self[3], $self, $o)
          : ($call2($self[2], $self, $o));
      }
      return $tag === $Stdlib_obj[18]
        ? $call2($self[1], $self, $o)
        : ($tag === $Stdlib_obj[14]
         ? $call2($self[4], $self, $o)
         : ($tag === $Stdlib_obj[7]
          ? $call2($self[10], $self, $o)
          : ($tag === $Stdlib_obj[15]
           ? $call3($self[9], $self, 0, $o)
           : ($tag === $Stdlib_obj[6]
            ? $call2($self[8], $self, $o)
            : ($detectList($maxLength[1], $o)
             ? $call3($self[12], $self, Vector{0, $depth}, $o)
             : ($tag === $Stdlib_obj[4]
              ? $call3($self[11], $self, Vector{0, $depth}, $o)
              : ($call2($self[7], $self, $o))))))));
    };
    $e_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
      $depth = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $depth = $sth;
      }
      else {$depth = 0 as dynamic;}
      return $printListShape($self, $depth, $o);
    };
    $f_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
      $depth = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $depth = $sth;
      }
      else {$depth = 0 as dynamic;}
      return $printTreeShape($g_, $self, $depth, $o);
    };
    $h_ = (dynamic $self, dynamic $f) : dynamic ==> {
      $t_ = $call1($Stdlib[33], (int) $f);
      $u_ = $call2($Stdlib[28], $t_, $cst__29);
      return $call2($Stdlib[28], $cst_closure, $u_);
    };
    $i_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
      $depth = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $depth = $sth;
      }
      else {$depth = 0 as dynamic;}
      return $printTreeShape($j_, $self, $depth, $o);
    };
    $k_ = (dynamic $self, dynamic $o) : dynamic ==> {return $cst_lazy;};
    $l_ = (dynamic $self, dynamic $o) : dynamic ==> {return $cst_unknown;};
    $m_ = (dynamic $self) : dynamic ==> {return $cst_max_length;};
    $n_ = (dynamic $self) : dynamic ==> {return $cst_max_depth;};
    $o_ = (dynamic $self, dynamic $f) : dynamic ==> {
      return $call1($Stdlib[35], $f);
    };
    $p_ = (dynamic $self, dynamic $s) : dynamic ==> {
      $r_ = $call2($self[2], $self, $s);
      $s_ = $call2($Stdlib[28], $r_, $cst__30);
      return $call2($Stdlib[28], $cst__31, $s_);
    };
    $q_ = (dynamic $self, dynamic $s) : dynamic ==> {return $s;};
    $base = Vector{
      0,
      (dynamic $self, dynamic $i) : dynamic ==> {
        return $call1($Stdlib[33], $i);
      },
      $q_,
      $p_,
      $o_,
      $n_,
      $m_,
      $l_,
      $k_,
      $i_,
      $h_,
      $f_,
      $e_,
      $d_
    } as dynamic;
    $Console_ObjectPrinter = Vector{
      0,
      $setPrintWidth,
      $setMaxDepth,
      $setMaxLength,
      $base
    } as dynamic;
    
    return($Console_ObjectPrinter);

  }
  public static function setPrintWidth(dynamic $w): dynamic {
    return static::syncCall(__FUNCTION__, 1, $w);
  }
  public static function setMaxDepth(dynamic $d): dynamic {
    return static::syncCall(__FUNCTION__, 2, $d);
  }
  public static function setMaxLength(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 3, $l);
  }

}
/* Hashing disabled */
