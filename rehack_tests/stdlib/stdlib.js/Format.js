/**
 * Format
 * @providesModule Format
 */
"use strict";
var Buffer = require('Buffer.js');
var CamlinternalFormat = require('CamlinternalFormat.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var String_ = require('String_.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;



var runtime = joo_global_object.jsoo_runtime;
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__4 = string(".");
var cst__2 = string(">");
var cst__3 = string("</");
var cst__0 = string(">");
var cst__1 = string("<");
var cst = string("\n");
var cst_Format_Empty_queue = string("Format.Empty_queue");
var CamlinternalFormat = global_data["CamlinternalFormat"];
var Pervasives = global_data["Pervasives"];
var String = global_data["String_"];
var Buffer = global_data["Buffer"];
var List = global_data["List_"];
var Not_found = global_data["Not_found"];
var b_ = [3,0,3];
var a_ = [0,string("")];

function make_queue(param) {return [0,0,0];}

function clear_queue(q) {q[1] = 0;q[2] = 0;return 0;}

function add_queue(x, q) {
  var c = [0,x,0];
  var cx_ = q[1];
  if (cx_) {q[1] = c;cx_[2] = c;return 0;}
  q[1] = c;
  q[2] = c;
  return 0;
}

var Empty_queue = [248,cst_Format_Empty_queue,runtime["caml_fresh_oo_id"](0)];

function peek_queue(param) {
  var cw_ = param[2];
  if (cw_) {var x = cw_[1];return x;}
  throw caml_wrap_thrown_exception(Empty_queue);
}

function take_queue(q) {
  var cv_ = q[2];
  if (cv_) {
    var x = cv_[1];
    var tl = cv_[2];
    q[2] = tl;
    if (0 === tl) {q[1] = 0;}
    return x;
  }
  throw caml_wrap_thrown_exception(Empty_queue);
}

function pp_enqueue(state, token) {
  var len = token[3];
  state[13] = state[13] + len | 0;
  return add_queue(token, state[28]);
}

function pp_clear_queue(state) {
  state[12] = 1;
  state[13] = 1;
  return clear_queue(state[28]);
}

var pp_infinity = 1000000010;

function pp_output_string(state, s) {
  return call3(state[17], s, 0, caml_ml_string_length(s));
}

function pp_output_newline(state) {return call1(state[19], 0);}

function pp_output_spaces(state, n) {return call1(state[20], n);}

function pp_output_indent(state, n) {return call1(state[21], n);}

function break_new_line(state, offset, width) {
  pp_output_newline(state);
  state[11] = 1;
  var indent = (state[6] - width | 0) + offset | 0;
  var real_indent = call2(Pervasives[4], state[8], indent);
  state[10] = real_indent;
  state[9] = state[6] - state[10] | 0;
  return pp_output_indent(state, state[10]);
}

function break_line(state, width) {return break_new_line(state, 0, width);}

function break_same_line(state, width) {
  state[9] = state[9] - width | 0;
  return pp_output_spaces(state, width);
}

function pp_force_break_line(state) {
  var cs_ = state[2];
  if (cs_) {
    var match = cs_[1];
    var width = match[2];
    var bl_ty = match[1];
    var ct_ = state[9] < width ? 1 : 0;
    if (ct_) {
      if (0 !== bl_ty) {return 5 <= bl_ty ? 0 : break_line(state, width);}
      var cu_ = 0;
    }
    else var cu_ = ct_;
    return cu_;
  }
  return pp_output_newline(state);
}

function pp_skip_token(state) {
  var match = take_queue(state[28]);
  var size = match[1];
  var len = match[3];
  state[12] = state[12] - len | 0;
  state[9] = state[9] + size | 0;
  return 0;
}

function format_pp_token(state, size, param) {
  if (typeof param === "number") switch (param) {
    case 0:
      var ch_ = state[3];
      if (ch_) {
        var match = ch_[1];
        var tabs = match[1];
        var add_tab = function(n, ls) {
          if (ls) {
            var l = ls[2];
            var x = ls[1];
            return runtime["caml_lessthan"](n, x) ?
              [0,n,ls] :
              [0,x,add_tab(n, l)];
          }
          return [0,n,0];
        };
        tabs[1] = add_tab(state[6] - state[9] | 0, tabs[1]);
        return 0;
      }
      return 0;
    case 1:
      var ci_ = state[2];
      if (ci_) {var ls = ci_[2];state[2] = ls;return 0;}
      return 0;
    case 2:
      var cj_ = state[3];
      if (cj_) {var ls__0 = cj_[2];state[3] = ls__0;return 0;}
      return 0;
    case 3:
      var ck_ = state[2];
      if (ck_) {
        var match__0 = ck_[1];
        var width = match__0[2];
        return break_line(state, width);
      }
      return pp_output_newline(state);
    case 4:
      var cl_ = state[10] !== (state[6] - state[9] | 0) ? 1 : 0;
      return cl_ ? pp_skip_token(state) : cl_;
    default:
      var cm_ = state[5];
      if (cm_) {
        var tags = cm_[2];
        var tag_name = cm_[1];
        var marker = call1(state[25], tag_name);
        pp_output_string(state, marker);
        state[5] = tags;
        return 0;
      }
      return 0
    }
  else switch (param[0]) {
    case 0:
      var s = param[1];
      state[9] = state[9] - size | 0;
      pp_output_string(state, s);
      state[11] = 0;
      return 0;
    case 1:
      var off = param[2];
      var n = param[1];
      var cn_ = state[2];
      if (cn_) {
        var match__1 = cn_[1];
        var width__0 = match__1[2];
        var ty = match__1[1];
        switch (ty) {
          case 0:
            return break_same_line(state, n);
          case 1:
            return break_new_line(state, off, width__0);
          case 2:
            return break_new_line(state, off, width__0);
          case 3:
            return state[9] < size ?
              break_new_line(state, off, width__0) :
              break_same_line(state, n);
          case 4:
            return state[11] ?
              break_same_line(state, n) :
              state[9] < size ?
               break_new_line(state, off, width__0) :
               ((state[6] - width__0 | 0) + off | 0) < state[10] ?
                break_new_line(state, off, width__0) :
                break_same_line(state, n);
          default:
            return break_same_line(state, n)
          }
      }
      return 0;
    case 2:
      var off__0 = param[2];
      var n__0 = param[1];
      var insertion_point = state[6] - state[9] | 0;
      var co_ = state[3];
      if (co_) {
        var match__2 = co_[1];
        var tabs__0 = match__2[1];
        var find = function(n, param) {
          var param__0 = param;
          for (; ; ) {
            if (param__0) {
              var l = param__0[2];
              var x = param__0[1];
              if (runtime["caml_greaterequal"](x, n)) {return x;}
              var param__0 = l;
              continue;
            }
            throw caml_wrap_thrown_exception(Not_found);
          }
        };
        var cp_ = tabs__0[1];
        if (cp_) {
          var x = cp_[1];
          try {var cq_ = find(insertion_point, tabs__0[1]);var x__0 = cq_;}
          catch(cr_) {
            cr_ = runtime["caml_wrap_exception"](cr_);
            if (cr_ !== Not_found) {
              throw caml_wrap_thrown_exception_reraise(cr_);
            }
            var x__0 = x;
          }
          var tab = x__0;
        }
        else var tab = insertion_point;
        var offset = tab - insertion_point | 0;
        return 0 <= offset ?
          break_same_line(state, offset + n__0 | 0) :
          break_new_line(state, tab + off__0 | 0, state[6]);
      }
      return 0;
    case 3:
      var ty__0 = param[2];
      var off__1 = param[1];
      var insertion_point__0 = state[6] - state[9] | 0;
      if (state[8] < insertion_point__0) {pp_force_break_line(state);}
      var offset__0 = state[9] - off__1 | 0;
      var bl_type = 1 === ty__0 ? 1 : state[9] < size ? ty__0 : 5;
      state[2] = [0,[0,bl_type,offset__0],state[2]];
      return 0;
    case 4:
      var tbox = param[1];
      state[3] = [0,tbox,state[3]];
      return 0;
    default:
      var tag_name__0 = param[1];
      var marker__0 = call1(state[24], tag_name__0);
      pp_output_string(state, marker__0);
      state[5] = [0,tag_name__0,state[5]];
      return 0
    }
}

function advance_loop(state) {
  for (; ; ) {
    var match = peek_queue(state[28]);
    var size = match[1];
    var len = match[3];
    var tok = match[2];
    var ce_ = size < 0 ? 1 : 0;
    var cf_ = ce_ ? (state[13] - state[12] | 0) < state[9] ? 1 : 0 : ce_;
    var cg_ = 1 - cf_;
    if (cg_) {
      take_queue(state[28]);
      var size__0 = 0 <= size ? size : pp_infinity;
      format_pp_token(state, size__0, tok);
      state[12] = len + state[12] | 0;
      continue;
    }
    return cg_;
  }
}

function advance_left(state) {
  try {var cc_ = advance_loop(state);return cc_;}
  catch(cd_) {
    cd_ = runtime["caml_wrap_exception"](cd_);
    if (cd_ === Empty_queue) {return 0;}
    throw caml_wrap_thrown_exception_reraise(cd_);
  }
}

function enqueue_advance(state, tok) {
  pp_enqueue(state, tok);
  return advance_left(state);
}

function make_queue_elem(size, tok, len) {return [0,size,tok,len];}

function enqueue_string_as(state, size, s) {
  return enqueue_advance(state, make_queue_elem(size, [0,s], size));
}

function enqueue_string(state, s) {
  var len = caml_ml_string_length(s);
  return enqueue_string_as(state, len, s);
}

var q_elem = make_queue_elem(-1, a_, 0);
var scan_stack_bottom = [0,[0,-1,q_elem],0];

function clear_scan_stack(state) {state[1] = scan_stack_bottom;return 0;}

function set_size(state, ty) {
  var b9_ = state[1];
  if (b9_) {
    var match = b9_[1];
    var queue_elem = match[2];
    var left_tot = match[1];
    var size = queue_elem[1];
    var t = b9_[2];
    var tok = queue_elem[2];
    if (left_tot < state[12]) {return clear_scan_stack(state);}
    if (! (typeof tok === "number")) {
      switch (tok[0]) {
        case 3:
          var ca_ = 1 - ty;
          if (ca_) {
            queue_elem[1] = state[13] + size | 0;
            state[1] = t;
            var cb_ = 0;
          }
          else var cb_ = ca_;
          return cb_;
        case 1:
        case 2:
          if (ty) {
            queue_elem[1] = state[13] + size | 0;
            state[1] = t;
            var b__ = 0;
          }
          else var b__ = ty;
          return b__
        }
    }
    return 0;
  }
  return 0;
}

function scan_push(state, b, tok) {
  pp_enqueue(state, tok);
  if (b) {set_size(state, 1);}
  state[1] = [0,[0,state[13],tok],state[1]];
  return 0;
}

function pp_open_box_gen(state, indent, br_ty) {
  state[14] = state[14] + 1 | 0;
  if (state[14] < state[15]) {
    var elem = make_queue_elem(- state[13] | 0, [3,indent,br_ty], 0);
    return scan_push(state, 0, elem);
  }
  var b8_ = state[14] === state[15] ? 1 : 0;
  return b8_ ? enqueue_string(state, state[16]) : b8_;
}

function pp_open_sys_box(state) {return pp_open_box_gen(state, 0, 3);}

function pp_close_box(state, param) {
  var b6_ = 1 < state[14] ? 1 : 0;
  if (b6_) {
    if (state[14] < state[15]) {
      pp_enqueue(state, [0,0,1,0]);
      set_size(state, 1);
      set_size(state, 0);
    }
    state[14] = state[14] + -1 | 0;
    var b7_ = 0;
  }
  else var b7_ = b6_;
  return b7_;
}

function pp_open_tag(state, tag_name) {
  if (state[22]) {
    state[4] = [0,tag_name,state[4]];
    call1(state[26], tag_name);
  }
  var b5_ = state[23];
  return b5_ ? pp_enqueue(state, [0,0,[5,tag_name],0]) : b5_;
}

function pp_close_tag(state, param) {
  if (state[23]) {pp_enqueue(state, [0,0,5,0]);}
  var b2_ = state[22];
  if (b2_) {
    var b3_ = state[4];
    if (b3_) {
      var tags = b3_[2];
      var tag_name = b3_[1];
      call1(state[27], tag_name);
      state[4] = tags;
      return 0;
    }
    var b4_ = 0;
  }
  else var b4_ = b2_;
  return b4_;
}

function pp_set_print_tags(state, b) {state[22] = b;return 0;}

function pp_set_mark_tags(state, b) {state[23] = b;return 0;}

function pp_get_print_tags(state, param) {return state[22];}

function pp_get_mark_tags(state, param) {return state[23];}

function pp_set_tags(state, b) {
  pp_set_print_tags(state, b);
  return pp_set_mark_tags(state, b);
}

function pp_get_formatter_tag_functions(state, param) {return [0,state[24],state[25],state[26],state[27]];
}

function pp_set_formatter_tag_functions(state, param) {
  var pct = param[4];
  var pot = param[3];
  var mct = param[2];
  var mot = param[1];
  state[24] = mot;
  state[25] = mct;
  state[26] = pot;
  state[27] = pct;
  return 0;
}

function pp_rinit(state) {
  pp_clear_queue(state);
  clear_scan_stack(state);
  state[2] = 0;
  state[3] = 0;
  state[4] = 0;
  state[5] = 0;
  state[10] = 0;
  state[14] = 0;
  state[9] = state[6];
  return pp_open_sys_box(state);
}

function clear_tag_stack(state) {
  var b0_ = state[4];
  function b1_(param) {return pp_close_tag(state, 0);}
  return call2(List[15], b1_, b0_);
}

function pp_flush_queue(state, b) {
  clear_tag_stack(state);
  for (; ; ) {
    if (1 < state[14]) {pp_close_box(state, 0);continue;}
    state[13] = pp_infinity;
    advance_left(state);
    if (b) {pp_output_newline(state);}
    return pp_rinit(state);
  }
}

function pp_print_as_size(state, size, s) {
  var bZ_ = state[14] < state[15] ? 1 : 0;
  return bZ_ ? enqueue_string_as(state, size, s) : bZ_;
}

function pp_print_as(state, isize, s) {
  return pp_print_as_size(state, isize, s);
}

function pp_print_string(state, s) {
  return pp_print_as(state, caml_ml_string_length(s), s);
}

function pp_print_int(state, i) {
  return pp_print_string(state, call1(Pervasives[21], i));
}

function pp_print_float(state, f) {
  return pp_print_string(state, call1(Pervasives[23], f));
}

function pp_print_bool(state, b) {
  return pp_print_string(state, call1(Pervasives[18], b));
}

function pp_print_char(state, c) {
  return pp_print_as(state, 1, call2(String[1], 1, c));
}

function pp_open_hbox(state, param) {return pp_open_box_gen(state, 0, 0);}

function pp_open_vbox(state, indent) {
  return pp_open_box_gen(state, indent, 1);
}

function pp_open_hvbox(state, indent) {
  return pp_open_box_gen(state, indent, 2);
}

function pp_open_hovbox(state, indent) {
  return pp_open_box_gen(state, indent, 3);
}

function pp_open_box(state, indent) {
  return pp_open_box_gen(state, indent, 4);
}

function pp_print_newline(state, param) {
  pp_flush_queue(state, 1);
  return call1(state[18], 0);
}

function pp_print_flush(state, param) {
  pp_flush_queue(state, 0);
  return call1(state[18], 0);
}

function pp_force_newline(state, param) {
  var bY_ = state[14] < state[15] ? 1 : 0;
  return bY_ ? enqueue_advance(state, make_queue_elem(0, 3, 0)) : bY_;
}

function pp_print_if_newline(state, param) {
  var bX_ = state[14] < state[15] ? 1 : 0;
  return bX_ ? enqueue_advance(state, make_queue_elem(0, 4, 0)) : bX_;
}

function pp_print_break(state, width, offset) {
  var bW_ = state[14] < state[15] ? 1 : 0;
  if (bW_) {
    var elem = make_queue_elem(- state[13] | 0, [1,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return bW_;
}

function pp_print_space(state, param) {return pp_print_break(state, 1, 0);}

function pp_print_cut(state, param) {return pp_print_break(state, 0, 0);}

function pp_open_tbox(state, param) {
  state[14] = state[14] + 1 | 0;
  var bV_ = state[14] < state[15] ? 1 : 0;
  if (bV_) {
    var elem = make_queue_elem(0, [4,[0,[0,0]]], 0);
    return enqueue_advance(state, elem);
  }
  return bV_;
}

function pp_close_tbox(state, param) {
  var bS_ = 1 < state[14] ? 1 : 0;
  if (bS_) {
    var bT_ = state[14] < state[15] ? 1 : 0;
    if (bT_) {
      var elem = make_queue_elem(0, 2, 0);
      enqueue_advance(state, elem);
      state[14] = state[14] + -1 | 0;
      var bU_ = 0;
    }
    else var bU_ = bT_;
  }
  else var bU_ = bS_;
  return bU_;
}

function pp_print_tbreak(state, width, offset) {
  var bR_ = state[14] < state[15] ? 1 : 0;
  if (bR_) {
    var elem = make_queue_elem(- state[13] | 0, [2,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return bR_;
}

function pp_print_tab(state, param) {return pp_print_tbreak(state, 0, 0);}

function pp_set_tab(state, param) {
  var bQ_ = state[14] < state[15] ? 1 : 0;
  if (bQ_) {
    var elem = make_queue_elem(0, 0, 0);
    return enqueue_advance(state, elem);
  }
  return bQ_;
}

function pp_set_max_boxes(state, n) {
  var bO_ = 1 < n ? 1 : 0;
  if (bO_) {
    state[15] = n;
    var bP_ = 0;
  }
  else var bP_ = bO_;
  return bP_;
}

function pp_get_max_boxes(state, param) {return state[15];}

function pp_over_max_boxes(state, param) {
  return state[14] === state[15] ? 1 : 0;
}

function pp_set_ellipsis_text(state, s) {state[16] = s;return 0;}

function pp_get_ellipsis_text(state, param) {return state[16];}

function pp_limit(n) {return n < 1000000010 ? n : 1000000009;}

function pp_set_min_space_left(state, n) {
  var bN_ = 1 <= n ? 1 : 0;
  if (bN_) {
    var n__0 = pp_limit(n);
    state[7] = n__0;
    state[8] = state[6] - state[7] | 0;
    return pp_rinit(state);
  }
  return bN_;
}

function pp_set_max_indent(state, n) {
  return pp_set_min_space_left(state, state[6] - n | 0);
}

function pp_get_max_indent(state, param) {return state[8];}

function pp_set_margin(state, n) {
  var bL_ = 1 <= n ? 1 : 0;
  if (bL_) {
    var n__0 = pp_limit(n);
    state[6] = n__0;
    if (state[8] <= state[6]) var new_max_indent = state
     [8];
    else {
      var bM_ = call2(Pervasives[5], state[6] - state[7] | 0, state[6] / 2 | 0
      );
      var new_max_indent = call2(Pervasives[5], bM_, 1);
    }
    return pp_set_max_indent(state, new_max_indent);
  }
  return bL_;
}

function pp_get_margin(state, param) {return state[6];}

function pp_set_formatter_out_functions(state, param) {
  var j = param[5];
  var i = param[4];
  var h = param[3];
  var g = param[2];
  var f = param[1];
  state[17] = f;
  state[18] = g;
  state[19] = h;
  state[20] = i;
  state[21] = j;
  return 0;
}

function pp_get_formatter_out_functions(state, param) {
  return [0,state[17],state[18],state[19],state[20],state[21]];
}

function pp_set_formatter_output_functions(state, f, g) {state[17] = f;state[18] = g;return 0;
}

function pp_get_formatter_output_functions(state, param) {return [0,state[17],state[18]];
}

function display_newline(state, param) {return call3(state[17], cst, 0, 1);}

var blank_line = call2(String[1], 80, 32);

function display_blanks(state, n) {
  var n__0 = n;
  for (; ; ) {
    var bK_ = 0 < n__0 ? 1 : 0;
    if (bK_) {
      if (80 < n__0) {
        call3(state[17], blank_line, 0, 80);
        var n__1 = n__0 + -80 | 0;
        var n__0 = n__1;
        continue;
      }
      return call3(state[17], blank_line, 0, n__0);
    }
    return bK_;
  }
}

function pp_set_formatter_out_channel(state, oc) {
  state[17] = call1(Pervasives[57], oc);
  state[18] = function(param) {return call1(Pervasives[51], oc);};
  state[19] = function(bJ_) {return display_newline(state, bJ_);};
  state[20] = function(bI_) {return display_blanks(state, bI_);};
  state[21] = function(bH_) {return display_blanks(state, bH_);};
  return 0;
}

function default_pp_mark_open_tag(s) {
  var bG_ = call2(Pervasives[16], s, cst__0);
  return call2(Pervasives[16], cst__1, bG_);
}

function default_pp_mark_close_tag(s) {
  var bF_ = call2(Pervasives[16], s, cst__2);
  return call2(Pervasives[16], cst__3, bF_);
}

function default_pp_print_open_tag(bE_) {return 0;}

function default_pp_print_close_tag(bD_) {return 0;}

function pp_make_formatter(f, g, h, i, j) {
  var pp_queue = make_queue(0);
  var sys_tok = make_queue_elem(-1, b_, 0);
  add_queue(sys_tok, pp_queue);
  var sys_scan_stack = [0,[0,1,sys_tok],scan_stack_bottom];
  return [
    0,
    sys_scan_stack,
    0,
    0,
    0,
    0,
    78,
    10,
    68,
    78,
    0,
    1,
    1,
    1,
    1,
    Pervasives[7],
    cst__4,
    f,
    g,
    h,
    i,
    j,
    0,
    0,
    default_pp_mark_open_tag,
    default_pp_mark_close_tag,
    default_pp_print_open_tag,
    default_pp_print_close_tag,
    pp_queue
  ];
}

function formatter_of_out_functions(out_funs) {
  return pp_make_formatter(
    out_funs[1],
    out_funs[2],
    out_funs[3],
    out_funs[4],
    out_funs[5]
  );
}

function make_formatter(output, flush) {
  function bv_(bC_) {return 0;}
  function bw_(bB_) {return 0;}
  var ppf = pp_make_formatter(
    output,
    flush,
    function(bA_) {return 0;},
    bw_,
    bv_
  );
  ppf[19] = function(bz_) {return display_newline(ppf, bz_);};
  ppf[20] = function(by_) {return display_blanks(ppf, by_);};
  ppf[21] = function(bx_) {return display_blanks(ppf, bx_);};
  return ppf;
}

function formatter_of_out_channel(oc) {
  function bu_(param) {return call1(Pervasives[51], oc);}
  return make_formatter(call1(Pervasives[57], oc), bu_);
}

function formatter_of_buffer(b) {
  function bs_(bt_) {return 0;}
  return make_formatter(call1(Buffer[16], b), bs_);
}

var pp_buffer_size = 512;

function pp_make_buffer(param) {return call1(Buffer[1], pp_buffer_size);}

var stdbuf = pp_make_buffer(0);
var std_formatter = formatter_of_out_channel(Pervasives[27]);
var err_formatter = formatter_of_out_channel(Pervasives[28]);
var str_formatter = formatter_of_buffer(stdbuf);

function flush_buffer_formatter(buf, ppf) {
  pp_flush_queue(ppf, 0);
  var s = call1(Buffer[2], buf);
  call1(Buffer[9], buf);
  return s;
}

function flush_str_formatter(param) {
  return flush_buffer_formatter(stdbuf, str_formatter);
}

function make_symbolic_output_buffer(param) {return [0,0];}

function clear_symbolic_output_buffer(sob) {sob[1] = 0;return 0;}

function get_symbolic_output_buffer(sob) {return call1(List[9], sob[1]);}

function flush_symbolic_output_buffer(sob) {
  var items = get_symbolic_output_buffer(sob);
  clear_symbolic_output_buffer(sob);
  return items;
}

function add_symbolic_output_item(sob, item) {sob[1] = [0,item,sob[1]];return 0;
}

function formatter_of_symbolic_output_buffer(sob) {
  function symbolic_flush(sob, param) {
    return add_symbolic_output_item(sob, 0);
  }
  function symbolic_newline(sob, param) {
    return add_symbolic_output_item(sob, 1);
  }
  function symbolic_string(sob, s, i, n) {
    return add_symbolic_output_item(sob, [0,call3(String[4], s, i, n)]);
  }
  function symbolic_spaces(sob, n) {
    return add_symbolic_output_item(sob, [1,n]);
  }
  function symbolic_indent(sob, n) {
    return add_symbolic_output_item(sob, [2,n]);
  }
  function f(bp_, bq_, br_) {return symbolic_string(sob, bp_, bq_, br_);}
  function g(bo_) {return symbolic_flush(sob, bo_);}
  function h(bn_) {return symbolic_newline(sob, bn_);}
  function i(bm_) {return symbolic_spaces(sob, bm_);}
  function j(bl_) {return symbolic_indent(sob, bl_);}
  return pp_make_formatter(f, g, h, i, j);
}

function open_hbox(bk_) {return pp_open_hbox(std_formatter, bk_);}

function open_vbox(bj_) {return pp_open_vbox(std_formatter, bj_);}

function open_hvbox(bi_) {return pp_open_hvbox(std_formatter, bi_);}

function open_hovbox(bh_) {return pp_open_hovbox(std_formatter, bh_);}

function open_box(bg_) {return pp_open_box(std_formatter, bg_);}

function close_box(bf_) {return pp_close_box(std_formatter, bf_);}

function open_tag(be_) {return pp_open_tag(std_formatter, be_);}

function close_tag(bd_) {return pp_close_tag(std_formatter, bd_);}

function print_as(bb_, bc_) {return pp_print_as(std_formatter, bb_, bc_);}

function print_string(ba_) {return pp_print_string(std_formatter, ba_);}

function print_int(a__) {return pp_print_int(std_formatter, a__);}

function print_float(a9_) {return pp_print_float(std_formatter, a9_);}

function print_char(a8_) {return pp_print_char(std_formatter, a8_);}

function print_bool(a7_) {return pp_print_bool(std_formatter, a7_);}

function print_break(a5_, a6_) {
  return pp_print_break(std_formatter, a5_, a6_);
}

function print_cut(a4_) {return pp_print_cut(std_formatter, a4_);}

function print_space(a3_) {return pp_print_space(std_formatter, a3_);}

function force_newline(a2_) {return pp_force_newline(std_formatter, a2_);}

function print_flush(a1_) {return pp_print_flush(std_formatter, a1_);}

function print_newline(a0_) {return pp_print_newline(std_formatter, a0_);}

function print_if_newline(aZ_) {
  return pp_print_if_newline(std_formatter, aZ_);
}

function open_tbox(aY_) {return pp_open_tbox(std_formatter, aY_);}

function close_tbox(aX_) {return pp_close_tbox(std_formatter, aX_);}

function print_tbreak(aV_, aW_) {
  return pp_print_tbreak(std_formatter, aV_, aW_);
}

function set_tab(aU_) {return pp_set_tab(std_formatter, aU_);}

function print_tab(aT_) {return pp_print_tab(std_formatter, aT_);}

function set_margin(aS_) {return pp_set_margin(std_formatter, aS_);}

function get_margin(aR_) {return pp_get_margin(std_formatter, aR_);}

function set_max_indent(aQ_) {return pp_set_max_indent(std_formatter, aQ_);}

function get_max_indent(aP_) {return pp_get_max_indent(std_formatter, aP_);}

function set_max_boxes(aO_) {return pp_set_max_boxes(std_formatter, aO_);}

function get_max_boxes(aN_) {return pp_get_max_boxes(std_formatter, aN_);}

function over_max_boxes(aM_) {return pp_over_max_boxes(std_formatter, aM_);}

function set_ellipsis_text(aL_) {
  return pp_set_ellipsis_text(std_formatter, aL_);
}

function get_ellipsis_text(aK_) {
  return pp_get_ellipsis_text(std_formatter, aK_);
}

function set_formatter_out_channel(aJ_) {
  return pp_set_formatter_out_channel(std_formatter, aJ_);
}

function set_formatter_out_functions(aI_) {
  return pp_set_formatter_out_functions(std_formatter, aI_);
}

function get_formatter_out_functions(aH_) {
  return pp_get_formatter_out_functions(std_formatter, aH_);
}

function set_formatter_output_functions(aF_, aG_) {
  return pp_set_formatter_output_functions(std_formatter, aF_, aG_);
}

function get_formatter_output_functions(aE_) {
  return pp_get_formatter_output_functions(std_formatter, aE_);
}

function set_formatter_tag_functions(aD_) {
  return pp_set_formatter_tag_functions(std_formatter, aD_);
}

function get_formatter_tag_functions(aC_) {
  return pp_get_formatter_tag_functions(std_formatter, aC_);
}

function set_print_tags(aB_) {return pp_set_print_tags(std_formatter, aB_);}

function get_print_tags(aA_) {return pp_get_print_tags(std_formatter, aA_);}

function set_mark_tags(az_) {return pp_set_mark_tags(std_formatter, az_);}

function get_mark_tags(ay_) {return pp_get_mark_tags(std_formatter, ay_);}

function set_tags(ax_) {return pp_set_tags(std_formatter, ax_);}

function pp_print_list(opt, pp_v, ppf, param) {
  var opt__0 = opt;
  var param__0 = param;
  for (; ; ) {
    if (opt__0) {
      var sth = opt__0[1];
      var pp_sep = sth;
    }
    else var pp_sep = pp_print_cut;
    if (param__0) {
      var av_ = param__0[2];
      var aw_ = param__0[1];
      if (av_) {
        call2(pp_v, ppf, aw_);
        call2(pp_sep, ppf, 0);
        var opt__1 = [0,pp_sep];
        var opt__0 = opt__1;
        var param__0 = av_;
        continue;
      }
      return call2(pp_v, ppf, aw_);
    }
    return 0;
  }
}

function pp_print_text(ppf, s) {
  var len = caml_ml_string_length(s);
  var left = [0,0];
  var right = [0,0];
  function flush(param) {
    pp_print_string(ppf, call3(String[4], s, left[1], right[1] - left[1] | 0));
    right[1] += 1;
    left[1] = right[1];
    return 0;
  }
  for (; ; ) {
    if (right[1] !== len) {
      var match = runtime["caml_string_get"](s, right[1]);
      if (10 === match) {
        flush(0);
        pp_force_newline(ppf, 0);
      }
      else if (32 === match) {
        flush(0);
        pp_print_space(ppf, 0);
      }
      else right[1] += 1;
      continue;
    }
    var au_ = left[1] !== len ? 1 : 0;
    return au_ ? flush(0) : au_;
  }
}

function compute_tag(output, tag_acc) {
  var buf = call1(Buffer[1], 16);
  var ppf = formatter_of_buffer(buf);
  call2(output, ppf, tag_acc);
  pp_print_flush(ppf, 0);
  var len = call1(Buffer[7], buf);
  return 2 <= len ?
    call3(Buffer[4], buf, 1, len + -2 | 0) :
    call1(Buffer[2], buf);
}

function output_formatting_lit(ppf, fmting_lit) {
  if (typeof fmting_lit === "number") switch (fmting_lit) {
    case 0:
      return pp_close_box(ppf, 0);
    case 1:
      return pp_close_tag(ppf, 0);
    case 2:
      return pp_print_flush(ppf, 0);
    case 3:
      return pp_force_newline(ppf, 0);
    case 4:
      return pp_print_newline(ppf, 0);
    case 5:
      return pp_print_char(ppf, 64);
    default:
      return pp_print_char(ppf, 37)
    }
  else switch (fmting_lit[0]) {
    case 0:
      var offset = fmting_lit[3];
      var width = fmting_lit[2];
      return pp_print_break(ppf, width, offset);
    case 1:
      return 0;
    default:
      var c = fmting_lit[1];
      pp_print_char(ppf, 64);
      return pp_print_char(ppf, c)
    }
}

function output_acc(ppf, acc) {
  if (typeof acc === "number") return 0;
  else switch (acc[0]) {
    case 0:
      var f = acc[2];
      var p = acc[1];
      output_acc(ppf, p);
      return output_formatting_lit(ppf, f);
    case 1:
      var T_ = acc[2];
      var U_ = acc[1];
      if (0 === T_[0]) {
        var acc__0 = T_[1];
        output_acc(ppf, U_);
        return pp_open_tag(ppf, compute_tag(output_acc, acc__0));
      }
      var acc__1 = T_[1];
      output_acc(ppf, U_);
      var V_ = compute_tag(output_acc, acc__1);
      var match = call1(CamlinternalFormat[21], V_);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var W_ = acc[1];
      if (typeof W_ === "number") var switch__1 = 1;
      else if (0 === W_[0]) {
        var Y_ = W_[2];
        if (typeof Y_ === "number") var switch__2 = 1;
        else if (1 === Y_[0]) {
          var Z_ = acc[2];
          var aa_ = Y_[2];
          var ab_ = W_[1];
          var s__0 = Z_;
          var size = aa_;
          var p__1 = ab_;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var X_ = acc[2];
        var s = X_;
        var p__0 = W_;
        var switch__0 = 2;
      }
      break;
    case 3:
      var ac_ = acc[1];
      if (typeof ac_ === "number") var switch__3 = 1;
      else if (0 === ac_[0]) {
        var ae_ = ac_[2];
        if (typeof ae_ === "number") var switch__4 = 1;
        else if (1 === ae_[0]) {
          var af_ = acc[2];
          var ag_ = ae_[2];
          var ah_ = ac_[1];
          var c__0 = af_;
          var size__0 = ag_;
          var p__3 = ah_;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var ad_ = acc[2];
        var c = ad_;
        var p__2 = ac_;
        var switch__0 = 3;
      }
      break;
    case 4:
      var ai_ = acc[1];
      if (typeof ai_ === "number") var switch__5 = 1;
      else if (0 === ai_[0]) {
        var ak_ = ai_[2];
        if (typeof ak_ === "number") var switch__6 = 1;
        else if (1 === ak_[0]) {
          var al_ = acc[2];
          var am_ = ak_[2];
          var an_ = ai_[1];
          var s__0 = al_;
          var size = am_;
          var p__1 = an_;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var aj_ = acc[2];
        var s = aj_;
        var p__0 = ai_;
        var switch__0 = 2;
      }
      break;
    case 5:
      var ao_ = acc[1];
      if (typeof ao_ === "number") var switch__7 = 1;
      else if (0 === ao_[0]) {
        var aq_ = ao_[2];
        if (typeof aq_ === "number") var switch__8 = 1;
        else if (1 === aq_[0]) {
          var ar_ = acc[2];
          var as_ = aq_[2];
          var at_ = ao_[1];
          var c__0 = ar_;
          var size__0 = as_;
          var p__3 = at_;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var ap_ = acc[2];
        var c = ap_;
        var p__2 = ao_;
        var switch__0 = 3;
      }
      break;
    case 6:
      var f__0 = acc[2];
      var p__4 = acc[1];
      output_acc(ppf, p__4);
      return call1(f__0, ppf);
    case 7:
      var p__5 = acc[1];
      output_acc(ppf, p__5);
      return pp_print_flush(ppf, 0);
    default:
      var msg = acc[2];
      var p__6 = acc[1];
      output_acc(ppf, p__6);
      return call1(Pervasives[1], msg)
    }
  switch (switch__0) {
    case 0:
      output_acc(ppf, p__1);
      return pp_print_as_size(ppf, size, s__0);
    case 1:
      output_acc(ppf, p__3);
      return pp_print_as_size(ppf, size__0, call2(String[1], 1, c__0));
    case 2:
      output_acc(ppf, p__0);
      return pp_print_string(ppf, s);
    default:
      output_acc(ppf, p__2);
      return pp_print_char(ppf, c)
    }
}

function strput_acc(ppf, acc) {
  if (typeof acc === "number") return 0;
  else switch (acc[0]) {
    case 0:
      var f = acc[2];
      var p = acc[1];
      strput_acc(ppf, p);
      return output_formatting_lit(ppf, f);
    case 1:
      var q_ = acc[2];
      var r_ = acc[1];
      if (0 === q_[0]) {
        var acc__0 = q_[1];
        strput_acc(ppf, r_);
        return pp_open_tag(ppf, compute_tag(strput_acc, acc__0));
      }
      var acc__1 = q_[1];
      strput_acc(ppf, r_);
      var s_ = compute_tag(strput_acc, acc__1);
      var match = call1(CamlinternalFormat[21], s_);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var t_ = acc[1];
      if (typeof t_ === "number") var switch__1 = 1;
      else if (0 === t_[0]) {
        var v_ = t_[2];
        if (typeof v_ === "number") var switch__2 = 1;
        else if (1 === v_[0]) {
          var w_ = acc[2];
          var x_ = v_[2];
          var y_ = t_[1];
          var s__0 = w_;
          var size = x_;
          var p__1 = y_;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var u_ = acc[2];
        var s = u_;
        var p__0 = t_;
        var switch__0 = 2;
      }
      break;
    case 3:
      var z_ = acc[1];
      if (typeof z_ === "number") var switch__3 = 1;
      else if (0 === z_[0]) {
        var B_ = z_[2];
        if (typeof B_ === "number") var switch__4 = 1;
        else if (1 === B_[0]) {
          var C_ = acc[2];
          var D_ = B_[2];
          var E_ = z_[1];
          var c__0 = C_;
          var size__0 = D_;
          var p__3 = E_;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var A_ = acc[2];
        var c = A_;
        var p__2 = z_;
        var switch__0 = 3;
      }
      break;
    case 4:
      var F_ = acc[1];
      if (typeof F_ === "number") var switch__5 = 1;
      else if (0 === F_[0]) {
        var H_ = F_[2];
        if (typeof H_ === "number") var switch__6 = 1;
        else if (1 === H_[0]) {
          var I_ = acc[2];
          var J_ = H_[2];
          var K_ = F_[1];
          var s__0 = I_;
          var size = J_;
          var p__1 = K_;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var G_ = acc[2];
        var s = G_;
        var p__0 = F_;
        var switch__0 = 2;
      }
      break;
    case 5:
      var L_ = acc[1];
      if (typeof L_ === "number") var switch__7 = 1;
      else if (0 === L_[0]) {
        var N_ = L_[2];
        if (typeof N_ === "number") var switch__8 = 1;
        else if (1 === N_[0]) {
          var O_ = acc[2];
          var P_ = N_[2];
          var Q_ = L_[1];
          var c__0 = O_;
          var size__0 = P_;
          var p__3 = Q_;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var M_ = acc[2];
        var c = M_;
        var p__2 = L_;
        var switch__0 = 3;
      }
      break;
    case 6:
      var R_ = acc[1];
      if (! (typeof R_ === "number") && 0 === R_[0]) {
        var S_ = R_[2];
        if (! (typeof S_ === "number") && 1 === S_[0]) {
          var f__1 = acc[2];
          var size__1 = S_[2];
          var p__4 = R_[1];
          strput_acc(ppf, p__4);
          return pp_print_as_size(ppf, size__1, call1(f__1, 0));
        }
      }
      var f__0 = acc[2];
      strput_acc(ppf, R_);
      return pp_print_string(ppf, call1(f__0, 0));
    case 7:
      var p__5 = acc[1];
      strput_acc(ppf, p__5);
      return pp_print_flush(ppf, 0);
    default:
      var msg = acc[2];
      var p__6 = acc[1];
      strput_acc(ppf, p__6);
      return call1(Pervasives[1], msg)
    }
  switch (switch__0) {
    case 0:
      strput_acc(ppf, p__1);
      return pp_print_as_size(ppf, size, s__0);
    case 1:
      strput_acc(ppf, p__3);
      return pp_print_as_size(ppf, size__0, call2(String[1], 1, c__0));
    case 2:
      strput_acc(ppf, p__0);
      return pp_print_string(ppf, s);
    default:
      strput_acc(ppf, p__2);
      return pp_print_char(ppf, c)
    }
}

function kfprintf(k, ppf, param) {
  var fmt = param[1];
  var o_ = 0;
  function p_(ppf, acc) {output_acc(ppf, acc);return call1(k, ppf);}
  return call4(CamlinternalFormat[7], p_, ppf, o_, fmt);
}

function ikfprintf(k, ppf, param) {
  var fmt = param[1];
  return call3(CamlinternalFormat[8], k, ppf, fmt);
}

function fprintf(ppf) {
  function l_(n_) {return 0;}
  return function(m_) {return kfprintf(l_, ppf, m_);};
}

function ifprintf(ppf) {
  function i_(k_) {return 0;}
  return function(j_) {return ikfprintf(i_, ppf, j_);};
}

function printf(fmt) {return call1(fprintf(std_formatter), fmt);}

function eprintf(fmt) {return call1(fprintf(err_formatter), fmt);}

function ksprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(param, acc) {
    strput_acc(ppf, acc);
    return call1(k, flush_buffer_formatter(b, ppf));
  }
  return call4(CamlinternalFormat[7], k__0, 0, 0, fmt);
}

function sprintf(fmt) {return ksprintf(function(s) {return s;}, fmt);}

function kasprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(ppf, acc) {
    output_acc(ppf, acc);
    return call1(k, flush_buffer_formatter(b, ppf));
  }
  return call4(CamlinternalFormat[7], k__0, ppf, 0, fmt);
}

function asprintf(fmt) {return kasprintf(function(s) {return s;}, fmt);}

call1(Pervasives[88], print_flush);

function pp_set_all_formatter_output_functions(state, f, g, h, i) {
  pp_set_formatter_output_functions(state, f, g);
  state[19] = h;
  state[20] = i;
  return 0;
}

function pp_get_all_formatter_output_functions(state, param) {return [0,state[17],state[18],state[19],state[20]];
}

function set_all_formatter_output_functions(e_, f_, g_, h_) {
  return pp_set_all_formatter_output_functions(std_formatter, e_, f_, g_, h_);
}

function get_all_formatter_output_functions(d_) {
  return pp_get_all_formatter_output_functions(std_formatter, d_);
}

function bprintf(b, param) {
  var fmt = param[1];
  function k(ppf, acc) {output_acc(ppf, acc);return pp_flush_queue(ppf, 0);}
  var c_ = formatter_of_buffer(b);
  return call4(CamlinternalFormat[7], k, c_, 0, fmt);
}

var Format = [
  0,
  pp_open_box,
  open_box,
  pp_close_box,
  close_box,
  pp_open_hbox,
  open_hbox,
  pp_open_vbox,
  open_vbox,
  pp_open_hvbox,
  open_hvbox,
  pp_open_hovbox,
  open_hovbox,
  pp_print_string,
  print_string,
  pp_print_as,
  print_as,
  pp_print_int,
  print_int,
  pp_print_float,
  print_float,
  pp_print_char,
  print_char,
  pp_print_bool,
  print_bool,
  pp_print_space,
  print_space,
  pp_print_cut,
  print_cut,
  pp_print_break,
  print_break,
  pp_force_newline,
  force_newline,
  pp_print_if_newline,
  print_if_newline,
  pp_print_flush,
  print_flush,
  pp_print_newline,
  print_newline,
  pp_set_margin,
  set_margin,
  pp_get_margin,
  get_margin,
  pp_set_max_indent,
  set_max_indent,
  pp_get_max_indent,
  get_max_indent,
  pp_set_max_boxes,
  set_max_boxes,
  pp_get_max_boxes,
  get_max_boxes,
  pp_over_max_boxes,
  over_max_boxes,
  pp_open_tbox,
  open_tbox,
  pp_close_tbox,
  close_tbox,
  pp_set_tab,
  set_tab,
  pp_print_tab,
  print_tab,
  pp_print_tbreak,
  print_tbreak,
  pp_set_ellipsis_text,
  set_ellipsis_text,
  pp_get_ellipsis_text,
  get_ellipsis_text,
  pp_open_tag,
  open_tag,
  pp_close_tag,
  close_tag,
  pp_set_tags,
  set_tags,
  pp_set_print_tags,
  set_print_tags,
  pp_set_mark_tags,
  set_mark_tags,
  pp_get_print_tags,
  get_print_tags,
  pp_get_mark_tags,
  get_mark_tags,
  pp_set_formatter_out_channel,
  set_formatter_out_channel,
  pp_set_formatter_output_functions,
  set_formatter_output_functions,
  pp_get_formatter_output_functions,
  get_formatter_output_functions,
  pp_set_formatter_out_functions,
  set_formatter_out_functions,
  pp_get_formatter_out_functions,
  get_formatter_out_functions,
  pp_set_formatter_tag_functions,
  set_formatter_tag_functions,
  pp_get_formatter_tag_functions,
  get_formatter_tag_functions,
  formatter_of_out_channel,
  std_formatter,
  err_formatter,
  formatter_of_buffer,
  stdbuf,
  str_formatter,
  flush_str_formatter,
  make_formatter,
  formatter_of_out_functions,
  make_symbolic_output_buffer,
  clear_symbolic_output_buffer,
  get_symbolic_output_buffer,
  flush_symbolic_output_buffer,
  add_symbolic_output_item,
  formatter_of_symbolic_output_buffer,
  pp_print_list,
  pp_print_text,
  fprintf,
  printf,
  eprintf,
  sprintf,
  asprintf,
  ifprintf,
  kfprintf,
  ikfprintf,
  ksprintf,
  kasprintf,
  bprintf,
  ksprintf,
  set_all_formatter_output_functions,
  get_all_formatter_output_functions,
  pp_set_all_formatter_output_functions,
  pp_get_all_formatter_output_functions
];

runtime["caml_register_global"](15, Format, "Format");


module.exports = global.jsoo_runtime.caml_get_global_data().Format;
/* Hashing disabled */
