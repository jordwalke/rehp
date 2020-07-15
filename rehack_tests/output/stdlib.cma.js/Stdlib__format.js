/**
 * @flow strict
 * Stdlib__format
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

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

var cst__16 = string("");
var cst__17 = string("");
var cst__15 = string(".");
var cst__12 = string(">");
var cst__13 = string("</");
var cst__14 = string("");
var cst__9 = string(">");
var cst__10 = string("<");
var cst__11 = string("");
var cst__8 = string("\n");
var cst_Format_pp_set_geometry_max_indent_2 = string(
  "Format.pp_set_geometry: max_indent < 2"
);
var cst_Format_pp_set_geometry_margin_max_indent = string(
  "Format.pp_set_geometry: margin <= max_indent"
);
var cst__4 = string("");
var cst__5 = string("");
var cst__6 = string("");
var cst__7 = string("");
var cst__0 = string("");
var cst__1 = string("");
var cst__2 = string("");
var cst__3 = string("");
var cst = string("");
var cst_Stdlib_Format_String_tag = string("Stdlib.Format.String_tag");
var Stdlib_queue = require("./Stdlib__queue.js");
var CamlinternalFormat = require("./CamlinternalFormat.js");
var Stdlib = require("./Stdlib.js");
var Stdlib_string = require("./Stdlib__string.js");
var Stdlib_buffer = require("./Stdlib__buffer.js");
var Stdlib_list = require("./Stdlib__list.js");
var Stdlib_stack = require("./Stdlib__stack.js");
var Stdlib_int = require("./Stdlib__int.js");
var c_ = [3,0,3];
var b_ = [0,string("")];
var a_ = [0,string(""),0,string("")];

function id(x) {return x;}

var size = 0;
var unknown = -1;

function is_known(n) {return 0 <= n ? 1 : 0;}

var String_tag = [
  248,
  cst_Stdlib_Format_String_tag,
  runtime["caml_fresh_oo_id"](0)
];

function pp_enqueue(state, token) {
  state[13] = state[13] + token[3] | 0;
  return call2(Stdlib_queue[3], token, state[28]);
}

function pp_clear_queue(state) {
  state[12] = 1;
  state[13] = 1;
  return call1(Stdlib_queue[11], state[28]);
}

var pp_infinity = 1000000010;

function pp_output_string(state, s) {
  return call3(state[17], s, 0, caml_ml_string_length(s));
}

function pp_output_newline(state) {return call1(state[19], 0);}

function pp_output_spaces(state, n) {return call1(state[20], n);}

function pp_output_indent(state, n) {return call1(state[21], n);}

function format_pp_text(state, size, text) {
  state[9] = state[9] - size | 0;
  pp_output_string(state, text);
  state[11] = 0;
  return 0;
}

function format_string(state, s) {
  var cQ_ = runtime["caml_string_notequal"](s, cst);
  return cQ_ ? format_pp_text(state, caml_ml_string_length(s), s) : cQ_;
}

function break_new_line(state, param, width) {
  var after = param[3];
  var offset = param[2];
  var before = param[1];
  format_string(state, before);
  pp_output_newline(state);
  state[11] = 1;
  var indent = (state[6] - width | 0) + offset | 0;
  var real_indent = call2(Stdlib[16], state[8], indent);
  state[10] = real_indent;
  state[9] = state[6] - state[10] | 0;
  pp_output_indent(state, state[10]);
  return format_string(state, after);
}

function break_line(state, width) {return break_new_line(state, a_, width);}

function break_same_line(state, param) {
  var after = param[3];
  var width = param[2];
  var before = param[1];
  format_string(state, before);
  state[9] = state[9] - width | 0;
  pp_output_spaces(state, width);
  return format_string(state, after);
}

function pp_force_break_line(state) {
  var match = call1(Stdlib_stack[7], state[2]);
  if (match) {
    var match__0 = match[1];
    var width = match__0[2];
    var box_type = match__0[1];
    var cP_ = state[9] < width ? 1 : 0;
    if (cP_) {
      var switcher = box_type + -1 | 0;
      return 3 < switcher >>> 0 ? 0 : break_line(state, width);
    }
    return cP_;
  }
  return pp_output_newline(state);
}

function pp_skip_token(state) {
  var match = call1(Stdlib_queue[6], state[28]);
  if (match) {
    var match__0 = match[1];
    var size = match__0[1];
    var length = match__0[3];
    state[12] = state[12] - length | 0;
    var cO_ = id(size);
    state[9] = state[9] + cO_ | 0;
    return 0;
  }
  return 0;
}

function format_pp_token(state, size, param) {
  if (typeof param === "number") switch (param) {
    case 0:
      var match = call1(Stdlib_stack[7], state[3]);
      if (match) {
        var match__0 = match[1];
        var tabs = match__0[1];
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
      var cI_ = call1(Stdlib_stack[5], state[2]);
      return function(cN_) {return 0;}(cI_);
    case 2:
      var cJ_ = call1(Stdlib_stack[5], state[3]);
      return function(cM_) {return 0;}(cJ_);
    case 3:
      var match__1 = call1(Stdlib_stack[7], state[2]);
      if (match__1) {
        var match__2 = match__1[1];
        var width = match__2[2];
        return break_line(state, width);
      }
      return pp_output_newline(state);
    case 4:
      var cK_ = state[10] !== (state[6] - state[9] | 0) ? 1 : 0;
      return cK_ ? pp_skip_token(state) : cK_;
    default:
      var match__3 = call1(Stdlib_stack[5], state[5]);
      if (match__3) {
        var tag_name = match__3[1];
        var marker = call1(state[25], tag_name);
        return pp_output_string(state, marker);
      }
      return 0
    }
  else switch (param[0]) {
    case 0:
      var s = param[1];
      return format_pp_text(state, size, s);
    case 1:
      var breaks = param[2];
      var fits = param[1];
      var off = breaks[2];
      var before = breaks[1];
      var match__4 = call1(Stdlib_stack[7], state[2]);
      if (match__4) {
        var match__5 = match__4[1];
        var width__0 = match__5[2];
        var box_type = match__5[1];
        switch (box_type) {
          case 0:
            return break_same_line(state, fits);
          case 1:
            return break_new_line(state, breaks, width__0);
          case 2:
            return break_new_line(state, breaks, width__0);
          case 3:
            return state[9] < (size + caml_ml_string_length(before) | 0) ?
              break_new_line(state, breaks, width__0) :
              break_same_line(state, fits);
          case 4:
            return state[11] ?
              break_same_line(state, fits) :
              state[9] < (size + caml_ml_string_length(before) | 0) ?
               break_new_line(state, breaks, width__0) :
               ((state[6] - width__0 | 0) + off | 0) < state[10] ?
                break_new_line(state, breaks, width__0) :
                break_same_line(state, fits);
          default:
            return break_same_line(state, fits)
          }
      }
      return 0;
    case 2:
      var off__0 = param[2];
      var n = param[1];
      var insertion_point = state[6] - state[9] | 0;
      var match__6 = call1(Stdlib_stack[7], state[3]);
      if (match__6) {
        var match__7 = match__6[1];
        var tabs__0 = match__7[1];
        var cL_ = tabs__0[1];
        if (cL_) {
          var first = cL_[1];
          var find = function(param) {
            var param__0 = param;
            for (; ; ) {
              if (param__0) {
                var tail = param__0[2];
                var head = param__0[1];
                if (insertion_point <= head) {return head;}
                var param__0 = tail;
                continue;
              }
              return first;
            }
          };
          var tab = find(tabs__0[1]);
        }
        else var tab = insertion_point;
        var offset = tab - insertion_point | 0;
        return 0 <= offset ?
          break_same_line(state, [0,cst__1,offset + n | 0,cst__0]) :
          break_new_line(state, [0,cst__3,tab + off__0 | 0,cst__2], state[6]);
      }
      return 0;
    case 3:
      var ty = param[2];
      var off__1 = param[1];
      var insertion_point__0 = state[6] - state[9] | 0;
      if (state[8] < insertion_point__0) {pp_force_break_line(state);}
      var width__1 = state[9] - off__1 | 0;
      var box_type__0 = 1 === ty ? 1 : state[9] < size ? ty : 5;
      return call2(Stdlib_stack[3], [0,box_type__0,width__1], state[2]);
    case 4:
      var tbox = param[1];
      return call2(Stdlib_stack[3], tbox, state[3]);
    default:
      var tag_name__0 = param[1];
      var marker__0 = call1(state[24], tag_name__0);
      pp_output_string(state, marker__0);
      return call2(Stdlib_stack[3], tag_name__0, state[5])
    }
}

function advance_left(state) {
  for (; ; ) {
    var match = call1(Stdlib_queue[9], state[28]);
    if (match) {
      var match__0 = match[1];
      var size = match__0[1];
      var length = match__0[3];
      var token = match__0[2];
      var pending_count = state[13] - state[12] | 0;
      var cG_ = is_known(size);
      var cH_ = cG_ ? cG_ : state[9] <= pending_count ? 1 : 0;
      if (cH_) {
        call1(Stdlib_queue[5], state[28]);
        var size__0 = is_known(size) ? id(size) : pp_infinity;
        format_pp_token(state, size__0, token);
        state[12] = length + state[12] | 0;
        continue;
      }
      return cH_;
    }
    return 0;
  }
}

function enqueue_advance(state, tok) {
  pp_enqueue(state, tok);
  return advance_left(state);
}

function enqueue_string_as(state, size, s) {
  return enqueue_advance(state, [0,size,[0,s],id(size)]);
}

function enqueue_string(state, s) {
  return enqueue_string_as(state, id(caml_ml_string_length(s)), s);
}

function initialize_scan_stack(stack) {
  call1(Stdlib_stack[8], stack);
  var queue_elem = [0,unknown,b_,0];
  return call2(Stdlib_stack[3], [0,-1,queue_elem], stack);
}

function set_size(state, ty) {
  var match = call1(Stdlib_stack[7], state[1]);
  if (match) {
    var match__0 = match[1];
    var queue_elem = match__0[2];
    var left_total = match__0[1];
    var size = id(queue_elem[1]);
    if (left_total < state[12]) {return initialize_scan_stack(state[1]);}
    var cA_ = queue_elem[2];
    if (! (typeof cA_ === "number")) {
      switch (cA_[0]) {
        case 3:
          var cC_ = 1 - ty;
          if (cC_) {
            queue_elem[1] = id(state[13] + size | 0);
            var cD_ = call1(Stdlib_stack[5], state[1]);
            return function(cF_) {return 0;}(cD_);
          }
          return cC_;
        case 1:
        case 2:
          if (ty) {
            queue_elem[1] = id(state[13] + size | 0);
            var cB_ = call1(Stdlib_stack[5], state[1]);
            return function(cE_) {return 0;}(cB_);
          }
          return ty
        }
    }
    return 0;
  }
  return 0;
}

function scan_push(state, b, token) {
  pp_enqueue(state, token);
  if (b) {set_size(state, 1);}
  var elem = [0,state[13],token];
  return call2(Stdlib_stack[3], elem, state[1]);
}

function pp_open_box_gen(state, indent, br_ty) {
  state[14] = state[14] + 1 | 0;
  if (state[14] < state[15]) {
    var size = id(- state[13] | 0);
    var elem = [0,size,[3,indent,br_ty],0];
    return scan_push(state, 0, elem);
  }
  var cz_ = state[14] === state[15] ? 1 : 0;
  return cz_ ? enqueue_string(state, state[16]) : cz_;
}

function pp_open_sys_box(state) {return pp_open_box_gen(state, 0, 3);}

function pp_close_box(state, param) {
  var cx_ = 1 < state[14] ? 1 : 0;
  if (cx_) {
    if (state[14] < state[15]) {
      pp_enqueue(state, [0,size,1,0]);
      set_size(state, 1);
      set_size(state, 0);
    }
    state[14] = state[14] + -1 | 0;
    var cy_ = 0;
  }
  else var cy_ = cx_;
  return cy_;
}

function pp_open_stag(state, tag_name) {
  if (state[22]) {
    call2(Stdlib_stack[3], tag_name, state[4]);
    call1(state[26], tag_name);
  }
  var cw_ = state[23];
  if (cw_) {
    var token = [5,tag_name];
    return pp_enqueue(state, [0,size,token,0]);
  }
  return cw_;
}

function pp_close_stag(state, param) {
  if (state[23]) {pp_enqueue(state, [0,size,5,0]);}
  var cu_ = state[22];
  if (cu_) {
    var match = call1(Stdlib_stack[5], state[4]);
    if (match) {var tag_name = match[1];return call1(state[27], tag_name);}
    var cv_ = 0;
  }
  else var cv_ = cu_;
  return cv_;
}

function pp_open_tag(state, s) {return pp_open_stag(state, [0,String_tag,s]);}

function pp_close_tag(state, param) {return pp_close_stag(state, 0);}

function pp_set_print_tags(state, b) {state[22] = b;return 0;}

function pp_set_mark_tags(state, b) {state[23] = b;return 0;}

function pp_get_print_tags(state, param) {return state[22];}

function pp_get_mark_tags(state, param) {return state[23];}

function pp_set_tags(state, b) {
  pp_set_print_tags(state, b);
  return pp_set_mark_tags(state, b);
}

function pp_get_formatter_stag_functions(state, param) {return [0,state[24],state[25],state[26],state[27]];
}

function pp_set_formatter_stag_functions(state, param) {
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
  initialize_scan_stack(state[1]);
  call1(Stdlib_stack[8], state[2]);
  call1(Stdlib_stack[8], state[3]);
  call1(Stdlib_stack[8], state[4]);
  call1(Stdlib_stack[8], state[5]);
  state[10] = 0;
  state[14] = 0;
  state[9] = state[6];
  return pp_open_sys_box(state);
}

function clear_tag_stack(state) {
  var cs_ = state[4];
  function ct_(param) {return pp_close_tag(state, 0);}
  return call2(Stdlib_stack[12], ct_, cs_);
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
  var cr_ = state[14] < state[15] ? 1 : 0;
  return cr_ ? enqueue_string_as(state, size, s) : cr_;
}

function pp_print_as(state, isize, s) {
  return pp_print_as_size(state, id(isize), s);
}

function pp_print_string(state, s) {
  return pp_print_as(state, caml_ml_string_length(s), s);
}

function pp_print_int(state, i) {
  return pp_print_string(state, call1(Stdlib_int[10], i));
}

function pp_print_float(state, f) {
  return pp_print_string(state, call1(Stdlib[35], f));
}

function pp_print_bool(state, b) {
  return pp_print_string(state, call1(Stdlib[30], b));
}

function pp_print_char(state, c) {
  return pp_print_as(state, 1, call2(Stdlib_string[1], 1, c));
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
  var cq_ = state[14] < state[15] ? 1 : 0;
  return cq_ ? enqueue_advance(state, [0,size,3,0]) : cq_;
}

function pp_print_if_newline(state, param) {
  var cp_ = state[14] < state[15] ? 1 : 0;
  return cp_ ? enqueue_advance(state, [0,size,4,0]) : cp_;
}

function pp_print_custom_break(state, fits, breaks) {
  var after = fits[3];
  var width = fits[2];
  var before = fits[1];
  var co_ = state[14] < state[15] ? 1 : 0;
  if (co_) {
    var size = id(- state[13] | 0);
    var token = [1,fits,breaks];
    var length = (caml_ml_string_length(before) + width | 0) + caml_ml_string_length(after) | 0;
    var elem = [0,size,token,length];
    return scan_push(state, 1, elem);
  }
  return co_;
}

function pp_print_break(state, width, offset) {
  return pp_print_custom_break(
    state,
    [0,cst__7,width,cst__6],
    [0,cst__5,offset,cst__4]
  );
}

function pp_print_space(state, param) {return pp_print_break(state, 1, 0);}

function pp_print_cut(state, param) {return pp_print_break(state, 0, 0);}

function pp_open_tbox(state, param) {
  state[14] = state[14] + 1 | 0;
  var cn_ = state[14] < state[15] ? 1 : 0;
  if (cn_) {
    var elem = [0,size,[4,[0,[0,0]]],0];
    return enqueue_advance(state, elem);
  }
  return cn_;
}

function pp_close_tbox(state, param) {
  var ck_ = 1 < state[14] ? 1 : 0;
  if (ck_) {
    var cl_ = state[14] < state[15] ? 1 : 0;
    if (cl_) {
      var elem = [0,size,2,0];
      enqueue_advance(state, elem);
      state[14] = state[14] + -1 | 0;
      var cm_ = 0;
    }
    else var cm_ = cl_;
  }
  else var cm_ = ck_;
  return cm_;
}

function pp_print_tbreak(state, width, offset) {
  var cj_ = state[14] < state[15] ? 1 : 0;
  if (cj_) {
    var size = id(- state[13] | 0);
    var elem = [0,size,[2,width,offset],width];
    return scan_push(state, 1, elem);
  }
  return cj_;
}

function pp_print_tab(state, param) {return pp_print_tbreak(state, 0, 0);}

function pp_set_tab(state, param) {
  var ci_ = state[14] < state[15] ? 1 : 0;
  if (ci_) {var elem = [0,size,0,0];return enqueue_advance(state, elem);}
  return ci_;
}

function pp_set_max_boxes(state, n) {
  var cg_ = 1 < n ? 1 : 0;
  if (cg_) {
    state[15] = n;
    var ch_ = 0;
  }
  else var ch_ = cg_;
  return ch_;
}

function pp_get_max_boxes(state, param) {return state[15];}

function pp_over_max_boxes(state, param) {
  return state[14] === state[15] ? 1 : 0;
}

function pp_set_ellipsis_text(state, s) {state[16] = s;return 0;}

function pp_get_ellipsis_text(state, param) {return state[16];}

function pp_limit(n) {return n < 1000000010 ? n : 1000000009;}

function pp_set_min_space_left(state, n) {
  var cf_ = 1 <= n ? 1 : 0;
  if (cf_) {
    var n__0 = pp_limit(n);
    state[7] = n__0;
    state[8] = state[6] - state[7] | 0;
    return pp_rinit(state);
  }
  return cf_;
}

function pp_set_max_indent(state, n) {
  var ce_ = 1 < n ? 1 : 0;
  return ce_ ? pp_set_min_space_left(state, state[6] - n | 0) : ce_;
}

function pp_get_max_indent(state, param) {return state[8];}

function pp_set_margin(state, n) {
  var cc_ = 1 <= n ? 1 : 0;
  if (cc_) {
    var n__0 = pp_limit(n);
    state[6] = n__0;
    if (state[8] <= state[6]) var new_max_indent = state
     [8];
    else {
      var cd_ = call2(Stdlib[17], state[6] - state[7] | 0, state[6] / 2 | 0);
      var new_max_indent = call2(Stdlib[17], cd_, 1);
    }
    return pp_set_max_indent(state, new_max_indent);
  }
  return cc_;
}

function check_geometry(geometry) {
  var ca_ = 1 < geometry[1] ? 1 : 0;
  var cb_ = ca_ ? geometry[1] < geometry[2] ? 1 : 0 : ca_;
  return cb_;
}

function pp_get_margin(state, param) {return state[6];}

function pp_set_geometry(state, max_indent, margin) {
  if (2 <= max_indent) {
    if (margin <= max_indent) {
      throw caml_wrap_thrown_exception(
              [0,Stdlib[6],cst_Format_pp_set_geometry_margin_max_indent]
            );
    }
    pp_set_margin(state, margin);
    return pp_set_max_indent(state, max_indent);
  }
  throw caml_wrap_thrown_exception(
          [0,Stdlib[6],cst_Format_pp_set_geometry_max_indent_2]
        );
}

function pp_safe_set_geometry(state, max_indent, margin) {
  return check_geometry([0,max_indent,margin]) ?
    pp_set_geometry(state, max_indent, margin) :
    0;
}

function pp_get_geometry(state, param) {
  var b__ = pp_get_margin(state, 0);
  return [0,pp_get_max_indent(state, 0),b__];
}

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

function display_newline(state, param) {
  return call3(state[17], cst__8, 0, 1);
}

var blank_line = call2(Stdlib_string[1], 80, 32);

function display_blanks(state, n) {
  var n__0 = n;
  for (; ; ) {
    var b9_ = 0 < n__0 ? 1 : 0;
    if (b9_) {
      if (80 < n__0) {
        call3(state[17], blank_line, 0, 80);
        var n__1 = n__0 + -80 | 0;
        var n__0 = n__1;
        continue;
      }
      return call3(state[17], blank_line, 0, n__0);
    }
    return b9_;
  }
}

function pp_set_formatter_out_channel(state, oc) {
  state[17] = call1(Stdlib[69], oc);
  state[18] = function(param) {return call1(Stdlib[63], oc);};
  state[19] = function(b8_) {return display_newline(state, b8_);};
  state[20] = function(b7_) {return display_blanks(state, b7_);};
  state[21] = function(b6_) {return display_blanks(state, b6_);};
  return 0;
}

function default_pp_mark_open_tag(param) {
  if (param[1] === String_tag) {
    var s = param[2];
    var b5_ = call2(Stdlib[28], s, cst__9);
    return call2(Stdlib[28], cst__10, b5_);
  }
  return cst__11;
}

function default_pp_mark_close_tag(param) {
  if (param[1] === String_tag) {
    var s = param[2];
    var b4_ = call2(Stdlib[28], s, cst__12);
    return call2(Stdlib[28], cst__13, b4_);
  }
  return cst__14;
}

function default_pp_print_open_tag(b3_) {return 0;}

function default_pp_print_close_tag(b2_) {return 0;}

function pp_make_formatter(f, g, h, i, j) {
  var pp_queue = call1(Stdlib_queue[2], 0);
  var sys_tok = [0,unknown,c_,0];
  call2(Stdlib_queue[3], sys_tok, pp_queue);
  var scan_stack = call1(Stdlib_stack[2], 0);
  initialize_scan_stack(scan_stack);
  call2(Stdlib_stack[3], [0,1,sys_tok], scan_stack);
  var bY_ = Stdlib[19];
  var bZ_ = call1(Stdlib_stack[2], 0);
  var b0_ = call1(Stdlib_stack[2], 0);
  var b1_ = call1(Stdlib_stack[2], 0);
  return [
    0,
    scan_stack,
    call1(Stdlib_stack[2], 0),
    b1_,
    b0_,
    bZ_,
    78,
    10,
    68,
    78,
    0,
    1,
    1,
    1,
    1,
    bY_,
    cst__15,
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
  function bQ_(bX_) {return 0;}
  function bR_(bW_) {return 0;}
  var ppf = pp_make_formatter(
    output,
    flush,
    function(bV_) {return 0;},
    bR_,
    bQ_
  );
  ppf[19] = function(bU_) {return display_newline(ppf, bU_);};
  ppf[20] = function(bT_) {return display_blanks(ppf, bT_);};
  ppf[21] = function(bS_) {return display_blanks(ppf, bS_);};
  return ppf;
}

function formatter_of_out_channel(oc) {
  function bP_(param) {return call1(Stdlib[63], oc);}
  return make_formatter(call1(Stdlib[69], oc), bP_);
}

function formatter_of_buffer(b) {
  function bN_(bO_) {return 0;}
  return make_formatter(call1(Stdlib_buffer[16], b), bN_);
}

var pp_buffer_size = 512;

function pp_make_buffer(param) {
  return call1(Stdlib_buffer[1], pp_buffer_size);
}

var stdbuf = pp_make_buffer(0);
var std_formatter = formatter_of_out_channel(Stdlib[39]);
var err_formatter = formatter_of_out_channel(Stdlib[40]);
var str_formatter = formatter_of_buffer(stdbuf);

function flush_buffer_formatter(buf, ppf) {
  pp_flush_queue(ppf, 0);
  var s = call1(Stdlib_buffer[2], buf);
  call1(Stdlib_buffer[9], buf);
  return s;
}

function flush_str_formatter(param) {
  return flush_buffer_formatter(stdbuf, str_formatter);
}

function make_symbolic_output_buffer(param) {return [0,0];}

function clear_symbolic_output_buffer(sob) {sob[1] = 0;return 0;}

function get_symbolic_output_buffer(sob) {return call1(Stdlib_list[9], sob[1]);
}

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
    return add_symbolic_output_item(sob, [0,call3(Stdlib_string[4], s, i, n)]);
  }
  function symbolic_spaces(sob, n) {
    return add_symbolic_output_item(sob, [1,n]);
  }
  function symbolic_indent(sob, n) {
    return add_symbolic_output_item(sob, [2,n]);
  }
  function f(bK_, bL_, bM_) {return symbolic_string(sob, bK_, bL_, bM_);}
  function g(bJ_) {return symbolic_flush(sob, bJ_);}
  function h(bI_) {return symbolic_newline(sob, bI_);}
  function i(bH_) {return symbolic_spaces(sob, bH_);}
  function j(bG_) {return symbolic_indent(sob, bG_);}
  return pp_make_formatter(f, g, h, i, j);
}

function open_hbox(bF_) {return pp_open_hbox(std_formatter, bF_);}

function open_vbox(bE_) {return pp_open_vbox(std_formatter, bE_);}

function open_hvbox(bD_) {return pp_open_hvbox(std_formatter, bD_);}

function open_hovbox(bC_) {return pp_open_hovbox(std_formatter, bC_);}

function open_box(bB_) {return pp_open_box(std_formatter, bB_);}

function close_box(bA_) {return pp_close_box(std_formatter, bA_);}

function open_tag(bz_) {return pp_open_tag(std_formatter, bz_);}

function close_tag(by_) {return pp_close_tag(std_formatter, by_);}

function open_stag(bx_) {return pp_open_stag(std_formatter, bx_);}

function close_stag(bw_) {return pp_close_stag(std_formatter, bw_);}

function print_as(bu_, bv_) {return pp_print_as(std_formatter, bu_, bv_);}

function print_string(bt_) {return pp_print_string(std_formatter, bt_);}

function print_int(bs_) {return pp_print_int(std_formatter, bs_);}

function print_float(br_) {return pp_print_float(std_formatter, br_);}

function print_char(bq_) {return pp_print_char(std_formatter, bq_);}

function print_bool(bp_) {return pp_print_bool(std_formatter, bp_);}

function print_break(bn_, bo_) {
  return pp_print_break(std_formatter, bn_, bo_);
}

function print_cut(bm_) {return pp_print_cut(std_formatter, bm_);}

function print_space(bl_) {return pp_print_space(std_formatter, bl_);}

function force_newline(bk_) {return pp_force_newline(std_formatter, bk_);}

function print_flush(bj_) {return pp_print_flush(std_formatter, bj_);}

function print_newline(bi_) {return pp_print_newline(std_formatter, bi_);}

function print_if_newline(bh_) {
  return pp_print_if_newline(std_formatter, bh_);
}

function open_tbox(bg_) {return pp_open_tbox(std_formatter, bg_);}

function close_tbox(bf_) {return pp_close_tbox(std_formatter, bf_);}

function print_tbreak(bd_, be_) {
  return pp_print_tbreak(std_formatter, bd_, be_);
}

function set_tab(bc_) {return pp_set_tab(std_formatter, bc_);}

function print_tab(bb_) {return pp_print_tab(std_formatter, bb_);}

function set_margin(ba_) {return pp_set_margin(std_formatter, ba_);}

function get_margin(a__) {return pp_get_margin(std_formatter, a__);}

function set_max_indent(a9_) {return pp_set_max_indent(std_formatter, a9_);}

function get_max_indent(a8_) {return pp_get_max_indent(std_formatter, a8_);}

function set_geometry(a6_, a7_) {
  return pp_set_geometry(std_formatter, a6_, a7_);
}

function safe_set_geometry(a4_, a5_) {
  return pp_safe_set_geometry(std_formatter, a4_, a5_);
}

function get_geometry(a3_) {return pp_get_geometry(std_formatter, a3_);}

function set_max_boxes(a2_) {return pp_set_max_boxes(std_formatter, a2_);}

function get_max_boxes(a1_) {return pp_get_max_boxes(std_formatter, a1_);}

function over_max_boxes(a0_) {return pp_over_max_boxes(std_formatter, a0_);}

function set_ellipsis_text(aZ_) {
  return pp_set_ellipsis_text(std_formatter, aZ_);
}

function get_ellipsis_text(aY_) {
  return pp_get_ellipsis_text(std_formatter, aY_);
}

function set_formatter_out_channel(aX_) {
  return pp_set_formatter_out_channel(std_formatter, aX_);
}

function set_formatter_out_functions(aW_) {
  return pp_set_formatter_out_functions(std_formatter, aW_);
}

function get_formatter_out_functions(aV_) {
  return pp_get_formatter_out_functions(std_formatter, aV_);
}

function set_formatter_output_functions(aT_, aU_) {
  return pp_set_formatter_output_functions(std_formatter, aT_, aU_);
}

function get_formatter_output_functions(aS_) {
  return pp_get_formatter_output_functions(std_formatter, aS_);
}

function set_formatter_stag_functions(aR_) {
  return pp_set_formatter_stag_functions(std_formatter, aR_);
}

function get_formatter_stag_functions(aQ_) {
  return pp_get_formatter_stag_functions(std_formatter, aQ_);
}

function set_print_tags(aP_) {return pp_set_print_tags(std_formatter, aP_);}

function get_print_tags(aO_) {return pp_get_print_tags(std_formatter, aO_);}

function set_mark_tags(aN_) {return pp_set_mark_tags(std_formatter, aN_);}

function get_mark_tags(aM_) {return pp_get_mark_tags(std_formatter, aM_);}

function set_tags(aL_) {return pp_set_tags(std_formatter, aL_);}

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
      var aJ_ = param__0[2];
      var aK_ = param__0[1];
      if (aJ_) {
        call2(pp_v, ppf, aK_);
        call2(pp_sep, ppf, 0);
        var opt__1 = [0,pp_sep];
        var opt__0 = opt__1;
        var param__0 = aJ_;
        continue;
      }
      return call2(pp_v, ppf, aK_);
    }
    return 0;
  }
}

function pp_print_text(ppf, s) {
  var len = caml_ml_string_length(s);
  var left = [0,0];
  var right = [0,0];
  function flush(param) {
    pp_print_string(
      ppf,
      call3(Stdlib_string[4], s, left[1], right[1] - left[1] | 0)
    );
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
    var aI_ = left[1] !== len ? 1 : 0;
    return aI_ ? flush(0) : aI_;
  }
}

function pp_print_option(opt, pp_v, ppf, param) {
  if (opt) {
    var sth = opt[1];
    var none = sth;
  }
  else var none = function(param, aH_) {return 0;};
  if (param) {var v = param[1];return call2(pp_v, ppf, v);}
  return call2(none, ppf, 0);
}

function pp_print_result(ok, error, ppf, param) {
  if (0 === param[0]) {var v = param[1];return call2(ok, ppf, v);}
  var e = param[1];
  return call2(error, ppf, e);
}

function compute_tag(output, tag_acc) {
  var buf = call1(Stdlib_buffer[1], 16);
  var ppf = formatter_of_buffer(buf);
  call2(output, ppf, tag_acc);
  pp_print_flush(ppf, 0);
  var len = call1(Stdlib_buffer[7], buf);
  return 2 <= len ?
    call3(Stdlib_buffer[4], buf, 1, len + -2 | 0) :
    call1(Stdlib_buffer[2], buf);
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
      var af_ = acc[2];
      var ag_ = acc[1];
      if (0 === af_[0]) {
        var acc__0 = af_[1];
        output_acc(ppf, ag_);
        return pp_open_stag(
          ppf,
          [0,String_tag,compute_tag(output_acc, acc__0)]
        );
      }
      var acc__1 = af_[1];
      output_acc(ppf, ag_);
      var ah_ = compute_tag(output_acc, acc__1);
      var match = call1(CamlinternalFormat[21], ah_);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var ai_ = acc[1];
      if (typeof ai_ === "number") var switch__1 = 1;
      else if (0 === ai_[0]) {
        var ak_ = ai_[2];
        if (typeof ak_ === "number") var switch__2 = 1;
        else if (1 === ak_[0]) {
          var al_ = acc[2];
          var am_ = ak_[2];
          var an_ = ai_[1];
          var p__1 = an_;
          var size = am_;
          var s__0 = al_;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var aj_ = acc[2];
        var p__0 = ai_;
        var s = aj_;
        var switch__0 = 2;
      }
      break;
    case 3:
      var ao_ = acc[1];
      if (typeof ao_ === "number") var switch__3 = 1;
      else if (0 === ao_[0]) {
        var aq_ = ao_[2];
        if (typeof aq_ === "number") var switch__4 = 1;
        else if (1 === aq_[0]) {
          var ar_ = acc[2];
          var as_ = aq_[2];
          var at_ = ao_[1];
          var p__3 = at_;
          var size__0 = as_;
          var c__0 = ar_;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var ap_ = acc[2];
        var p__2 = ao_;
        var c = ap_;
        var switch__0 = 3;
      }
      break;
    case 4:
      var av_ = acc[1];
      if (typeof av_ === "number") var switch__5 = 1;
      else if (0 === av_[0]) {
        var ax_ = av_[2];
        if (typeof ax_ === "number") var switch__6 = 1;
        else if (1 === ax_[0]) {
          var ay_ = acc[2];
          var az_ = ax_[2];
          var aA_ = av_[1];
          var p__1 = aA_;
          var size = az_;
          var s__0 = ay_;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var aw_ = acc[2];
        var p__0 = av_;
        var s = aw_;
        var switch__0 = 2;
      }
      break;
    case 5:
      var aB_ = acc[1];
      if (typeof aB_ === "number") var switch__7 = 1;
      else if (0 === aB_[0]) {
        var aD_ = aB_[2];
        if (typeof aD_ === "number") var switch__8 = 1;
        else if (1 === aD_[0]) {
          var aE_ = acc[2];
          var aF_ = aD_[2];
          var aG_ = aB_[1];
          var p__3 = aG_;
          var size__0 = aF_;
          var c__0 = aE_;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var aC_ = acc[2];
        var p__2 = aB_;
        var c = aC_;
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
      return call1(Stdlib[1], msg)
    }
  switch (switch__0) {
    case 0:
      output_acc(ppf, p__1);
      return pp_print_as_size(ppf, id(size), s__0);
    case 1:
      output_acc(ppf, p__3);
      var au_ = call2(Stdlib_string[1], 1, c__0);
      return pp_print_as_size(ppf, id(size__0), au_);
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
      var A_ = acc[2];
      var B_ = acc[1];
      if (0 === A_[0]) {
        var acc__0 = A_[1];
        strput_acc(ppf, B_);
        return pp_open_stag(
          ppf,
          [0,String_tag,compute_tag(strput_acc, acc__0)]
        );
      }
      var acc__1 = A_[1];
      strput_acc(ppf, B_);
      var C_ = compute_tag(strput_acc, acc__1);
      var match = call1(CamlinternalFormat[21], C_);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var D_ = acc[1];
      if (typeof D_ === "number") var switch__1 = 1;
      else if (0 === D_[0]) {
        var F_ = D_[2];
        if (typeof F_ === "number") var switch__2 = 1;
        else if (1 === F_[0]) {
          var G_ = acc[2];
          var H_ = F_[2];
          var I_ = D_[1];
          var p__1 = I_;
          var size = H_;
          var s__0 = G_;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var E_ = acc[2];
        var p__0 = D_;
        var s = E_;
        var switch__0 = 2;
      }
      break;
    case 3:
      var J_ = acc[1];
      if (typeof J_ === "number") var switch__3 = 1;
      else if (0 === J_[0]) {
        var L_ = J_[2];
        if (typeof L_ === "number") var switch__4 = 1;
        else if (1 === L_[0]) {
          var M_ = acc[2];
          var N_ = L_[2];
          var O_ = J_[1];
          var p__3 = O_;
          var size__0 = N_;
          var c__0 = M_;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var K_ = acc[2];
        var p__2 = J_;
        var c = K_;
        var switch__0 = 3;
      }
      break;
    case 4:
      var Q_ = acc[1];
      if (typeof Q_ === "number") var switch__5 = 1;
      else if (0 === Q_[0]) {
        var S_ = Q_[2];
        if (typeof S_ === "number") var switch__6 = 1;
        else if (1 === S_[0]) {
          var T_ = acc[2];
          var U_ = S_[2];
          var V_ = Q_[1];
          var p__1 = V_;
          var size = U_;
          var s__0 = T_;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var R_ = acc[2];
        var p__0 = Q_;
        var s = R_;
        var switch__0 = 2;
      }
      break;
    case 5:
      var W_ = acc[1];
      if (typeof W_ === "number") var switch__7 = 1;
      else if (0 === W_[0]) {
        var Y_ = W_[2];
        if (typeof Y_ === "number") var switch__8 = 1;
        else if (1 === Y_[0]) {
          var Z_ = acc[2];
          var aa_ = Y_[2];
          var ab_ = W_[1];
          var p__3 = ab_;
          var size__0 = aa_;
          var c__0 = Z_;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var X_ = acc[2];
        var p__2 = W_;
        var c = X_;
        var switch__0 = 3;
      }
      break;
    case 6:
      var ac_ = acc[1];
      if (! (typeof ac_ === "number") && 0 === ac_[0]) {
        var ad_ = ac_[2];
        if (! (typeof ad_ === "number") && 1 === ad_[0]) {
          var f__1 = acc[2];
          var size__1 = ad_[2];
          var p__4 = ac_[1];
          strput_acc(ppf, p__4);
          var ae_ = call1(f__1, 0);
          return pp_print_as_size(ppf, id(size__1), ae_);
        }
      }
      var f__0 = acc[2];
      strput_acc(ppf, ac_);
      return pp_print_string(ppf, call1(f__0, 0));
    case 7:
      var p__5 = acc[1];
      strput_acc(ppf, p__5);
      return pp_print_flush(ppf, 0);
    default:
      var msg = acc[2];
      var p__6 = acc[1];
      strput_acc(ppf, p__6);
      return call1(Stdlib[1], msg)
    }
  switch (switch__0) {
    case 0:
      strput_acc(ppf, p__1);
      return pp_print_as_size(ppf, id(size), s__0);
    case 1:
      strput_acc(ppf, p__3);
      var P_ = call2(Stdlib_string[1], 1, c__0);
      return pp_print_as_size(ppf, id(size__0), P_);
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
  var y_ = 0;
  function z_(acc) {output_acc(ppf, acc);return call1(k, ppf);}
  return call3(CamlinternalFormat[7], z_, y_, fmt);
}

function ikfprintf(k, ppf, param) {
  var fmt = param[1];
  return call3(CamlinternalFormat[8], k, ppf, fmt);
}

function ifprintf(ppf, param) {
  var fmt = param[1];
  var v_ = 0;
  function w_(x_) {return 0;}
  return call3(CamlinternalFormat[8], w_, v_, fmt);
}

function fprintf(ppf) {
  function s_(u_) {return 0;}
  return function(t_) {return kfprintf(s_, ppf, t_);};
}

function printf(fmt) {return call1(fprintf(std_formatter), fmt);}

function eprintf(fmt) {return call1(fprintf(err_formatter), fmt);}

function kdprintf(k, param) {
  var fmt = param[1];
  var q_ = 0;
  function r_(acc) {
    return call1(k, function(ppf) {return output_acc(ppf, acc);});
  }
  return call3(CamlinternalFormat[7], r_, q_, fmt);
}

function dprintf(fmt) {return kdprintf(function(i) {return i;}, fmt);}

function ksprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(acc) {
    strput_acc(ppf, acc);
    return call1(k, flush_buffer_formatter(b, ppf));
  }
  return call3(CamlinternalFormat[7], k__0, 0, fmt);
}

function sprintf(fmt) {return ksprintf(id, fmt);}

function kasprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(acc) {
    output_acc(ppf, acc);
    return call1(k, flush_buffer_formatter(b, ppf));
  }
  return call3(CamlinternalFormat[7], k__0, 0, fmt);
}

function asprintf(fmt) {return kasprintf(id, fmt);}

function flush_standard_formatters(param) {
  pp_print_flush(std_formatter, 0);
  return pp_print_flush(err_formatter, 0);
}

call1(Stdlib[100], flush_standard_formatters);

function pp_set_all_formatter_output_functions(state, f, g, h, i) {
  pp_set_formatter_output_functions(state, f, g);
  state[19] = h;
  state[20] = i;
  return 0;
}

function pp_get_all_formatter_output_functions(state, param) {return [0,state[17],state[18],state[19],state[20]];
}

function set_all_formatter_output_functions(m_, n_, o_, p_) {
  return pp_set_all_formatter_output_functions(std_formatter, m_, n_, o_, p_);
}

function get_all_formatter_output_functions(l_) {
  return pp_get_all_formatter_output_functions(std_formatter, l_);
}

function bprintf(b, param) {
  var fmt = param[1];
  var ppf = formatter_of_buffer(b);
  function k(acc) {output_acc(ppf, acc);return pp_flush_queue(ppf, 0);}
  return call3(CamlinternalFormat[7], k, 0, fmt);
}

function pp_set_formatter_tag_functions(state, param) {
  var pct = param[4];
  var pot = param[3];
  var mct = param[2];
  var mot = param[1];
  function stringify(f, e, param) {
    if (param[1] === String_tag) {var s = param[2];return call1(f, s);}
    return e;
  }
  state[24] = function(k_) {return stringify(mot, cst__16, k_);};
  state[25] = function(j_) {return stringify(mct, cst__17, j_);};
  var f_ = 0;
  state[26] = function(i_) {return stringify(pot, f_, i_);};
  var g_ = 0;
  state[27] = function(h_) {return stringify(pct, g_, h_);};
  return 0;
}

function pp_get_formatter_tag_functions(fmt, param) {
  var funs = pp_get_formatter_stag_functions(fmt, 0);
  function mark_open_tag(s) {return call1(funs[1], [0,String_tag,s]);}
  function mark_close_tag(s) {return call1(funs[2], [0,String_tag,s]);}
  function print_open_tag(s) {return call1(funs[3], [0,String_tag,s]);}
  function print_close_tag(s) {return call1(funs[4], [0,String_tag,s]);}
  return [0,mark_open_tag,mark_close_tag,print_open_tag,print_close_tag];
}

function set_formatter_tag_functions(e_) {
  return pp_set_formatter_tag_functions(std_formatter, e_);
}

function get_formatter_tag_functions(d_) {
  return pp_get_formatter_tag_functions(std_formatter, d_);
}

var Stdlib_format = [
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
  pp_print_custom_break,
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
  check_geometry,
  pp_set_geometry,
  set_geometry,
  pp_safe_set_geometry,
  safe_set_geometry,
  pp_get_geometry,
  get_geometry,
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
  String_tag,
  pp_open_stag,
  open_stag,
  pp_close_stag,
  close_stag,
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
  pp_set_formatter_stag_functions,
  set_formatter_stag_functions,
  pp_get_formatter_stag_functions,
  get_formatter_stag_functions,
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
  pp_print_option,
  pp_print_result,
  fprintf,
  printf,
  eprintf,
  sprintf,
  asprintf,
  dprintf,
  ifprintf,
  kfprintf,
  kdprintf,
  ikfprintf,
  ksprintf,
  kasprintf,
  bprintf,
  ksprintf,
  set_all_formatter_output_functions,
  get_all_formatter_output_functions,
  pp_set_all_formatter_output_functions,
  pp_get_all_formatter_output_functions,
  pp_open_tag,
  open_tag,
  pp_close_tag,
  close_tag,
  pp_set_formatter_tag_functions,
  set_formatter_tag_functions,
  pp_get_formatter_tag_functions,
  get_formatter_tag_functions
];

module.exports = Stdlib_format;

/*::type Exports = {
  pp_open_box: (state: any, indent: any) => any,
  open_box: (indent: any) => any,
  pp_close_box: (state: any, param: any) => any,
  close_box: (param: any) => any,
  pp_open_hbox: (state: any, param: any) => any,
  open_hbox: (param: any) => any,
  pp_open_vbox: (state: any, indent: any) => any,
  open_vbox: (indent: any) => any,
  pp_open_hvbox: (state: any, indent: any) => any,
  open_hvbox: (indent: any) => any,
  pp_open_hovbox: (state: any, indent: any) => any,
  open_hovbox: (indent: any) => any,
  pp_print_string: (state: any, s: any) => any,
  print_string: (s: any) => any,
  pp_print_as: (state: any, isize: any, s: any) => any,
  print_as: (isize: any, s: any) => any,
  pp_print_int: (state: any, i: any) => any,
  print_int: (i: any) => any,
  pp_print_float: (state: any, f: any) => any,
  print_float: (f: any) => any,
  pp_print_char: (state: any, c: any) => any,
  print_char: (c: any) => any,
  pp_print_bool: (state: any, b: any) => any,
  print_bool: (b: any) => any,
  pp_print_space: (state: any, param: any) => any,
  print_space: (param: any) => any,
  pp_print_cut: (state: any, param: any) => any,
  print_cut: (param: any) => any,
  pp_print_break: (state: any, width: any, offset: any) => any,
  print_break: (width: any, offset: any) => any,
  pp_print_custom_break: (state: any, fits: any, breaks: any) => any,
  pp_force_newline: (state: any, param: any) => any,
  force_newline: (param: any) => any,
  pp_print_if_newline: (state: any, param: any) => any,
  print_if_newline: (param: any) => any,
  pp_print_flush: (state: any, param: any) => any,
  print_flush: (param: any) => any,
  pp_print_newline: (state: any, param: any) => any,
  print_newline: (param: any) => any,
  pp_set_margin: (state: any, n: any) => any,
  set_margin: (n: any) => any,
  pp_get_margin: (state: any, param: any) => any,
  get_margin: (param: any) => any,
  pp_set_max_indent: (state: any, n: any) => any,
  set_max_indent: (n: any) => any,
  pp_get_max_indent: (state: any, param: any) => any,
  get_max_indent: (param: any) => any,
  check_geometry: (geometry: any) => any,
  pp_set_geometry: (state: any, max_indent: any, margin: any) => any,
  set_geometry: (max_indent: any, margin: any) => any,
  pp_safe_set_geometry: (state: any, max_indent: any, margin: any) => any,
  safe_set_geometry: (max_indent: any, margin: any) => any,
  pp_get_geometry: (state: any, param: any) => any,
  get_geometry: (param: any) => any,
  pp_set_max_boxes: (state: any, n: any) => any,
  set_max_boxes: (n: any) => any,
  pp_get_max_boxes: (state: any, param: any) => any,
  get_max_boxes: (param: any) => any,
  pp_over_max_boxes: (state: any, param: any) => any,
  over_max_boxes: (param: any) => any,
  pp_open_tbox: (state: any, param: any) => any,
  open_tbox: (param: any) => any,
  pp_close_tbox: (state: any, param: any) => any,
  close_tbox: (param: any) => any,
  pp_set_tab: (state: any, param: any) => any,
  set_tab: (param: any) => any,
  pp_print_tab: (state: any, param: any) => any,
  print_tab: (param: any) => any,
  pp_print_tbreak: (state: any, width: any, offset: any) => any,
  print_tbreak: (width: any, offset: any) => any,
  pp_set_ellipsis_text: (state: any, s: any) => any,
  set_ellipsis_text: (s: any) => any,
  pp_get_ellipsis_text: (state: any, param: any) => any,
  get_ellipsis_text: (param: any) => any,
  String_tag: any,
  pp_open_stag: (state: any, tag_name: any) => any,
  open_stag: (tag_name: any) => any,
  pp_close_stag: (state: any, param: any) => any,
  close_stag: (param: any) => any,
  pp_set_tags: (state: any, b: any) => any,
  set_tags: (b: any) => any,
  pp_set_print_tags: (state: any, b: any) => any,
  set_print_tags: (b: any) => any,
  pp_set_mark_tags: (state: any, b: any) => any,
  set_mark_tags: (b: any) => any,
  pp_get_print_tags: (state: any, param: any) => any,
  get_print_tags: (param: any) => any,
  pp_get_mark_tags: (state: any, param: any) => any,
  get_mark_tags: (param: any) => any,
  pp_set_formatter_out_channel: (state: any, oc: any) => any,
  set_formatter_out_channel: (oc: any) => any,
  pp_set_formatter_output_functions: (state: any, f: any, g: any) => any,
  set_formatter_output_functions: (f: any, g: any) => any,
  pp_get_formatter_output_functions: (state: any, param: any) => any,
  get_formatter_output_functions: (param: any) => any,
  pp_set_formatter_out_functions: (state: any, param: any) => any,
  set_formatter_out_functions: (param: any) => any,
  pp_get_formatter_out_functions: (state: any, param: any) => any,
  get_formatter_out_functions: (param: any) => any,
  pp_set_formatter_stag_functions: (state: any, param: any) => any,
  set_formatter_stag_functions: (param: any) => any,
  pp_get_formatter_stag_functions: (state: any, param: any) => any,
  get_formatter_stag_functions: (param: any) => any,
  formatter_of_out_channel: (oc: any) => any,
  std_formatter: any,
  err_formatter: any,
  formatter_of_buffer: (b: any) => any,
  stdbuf: any,
  str_formatter: any,
  flush_str_formatter: (param: any) => any,
  make_formatter: (output: any, flush: any) => any,
  formatter_of_out_functions: (out_funs: any) => any,
  make_symbolic_output_buffer: (param: any) => any,
  clear_symbolic_output_buffer: (sob: any) => any,
  get_symbolic_output_buffer: (sob: any) => any,
  flush_symbolic_output_buffer: (sob: any) => any,
  add_symbolic_output_item: (sob: any, item: any) => any,
  formatter_of_symbolic_output_buffer: (sob: any) => any,
  pp_print_list: (opt: any, pp_v: any, ppf: any, param: any) => any,
  pp_print_text: (ppf: any, s: any) => any,
  pp_print_option: (opt: any, pp_v: any, ppf: any, param: any) => any,
  pp_print_result: (ok: any, error: any, ppf: any, param: any) => any,
  fprintf: (ppf: any) => any,
  printf: (fmt: any) => any,
  eprintf: (fmt: any) => any,
  sprintf: (fmt: any) => any,
  asprintf: (fmt: any) => any,
  dprintf: (fmt: any) => any,
  ifprintf: (ppf: any, param: any) => any,
  kfprintf: (k: any, ppf: any, param: any) => any,
  kdprintf: (k: any, param: any) => any,
  ikfprintf: (k: any, ppf: any, param: any) => any,
  ksprintf: (k: any, param: any) => any,
  kasprintf: (k: any, param: any) => any,
  bprintf: (b: any, param: any) => any,
  set_all_formatter_output_functions: (f: any, g: any, h: any, i: any) => any,
  get_all_formatter_output_functions: (param: any) => any,
  pp_set_all_formatter_output_functions: (state: any, f: any, g: any, h: any, i: any) => any,
  pp_get_all_formatter_output_functions: (state: any, param: any) => any,
  pp_open_tag: (state: any, s: any) => any,
  open_tag: (s: any) => any,
  pp_close_tag: (state: any, param: any) => any,
  close_tag: (param: any) => any,
  pp_set_formatter_tag_functions: (state: any, param: any) => any,
  set_formatter_tag_functions: (param: any) => any,
  pp_get_formatter_tag_functions: (fmt: any, param: any) => any,
  get_formatter_tag_functions: (param: any) => any,
}*/
/** @type {{
  pp_open_box: (state: any, indent: any) => any,
  open_box: (indent: any) => any,
  pp_close_box: (state: any, param: any) => any,
  close_box: (param: any) => any,
  pp_open_hbox: (state: any, param: any) => any,
  open_hbox: (param: any) => any,
  pp_open_vbox: (state: any, indent: any) => any,
  open_vbox: (indent: any) => any,
  pp_open_hvbox: (state: any, indent: any) => any,
  open_hvbox: (indent: any) => any,
  pp_open_hovbox: (state: any, indent: any) => any,
  open_hovbox: (indent: any) => any,
  pp_print_string: (state: any, s: any) => any,
  print_string: (s: any) => any,
  pp_print_as: (state: any, isize: any, s: any) => any,
  print_as: (isize: any, s: any) => any,
  pp_print_int: (state: any, i: any) => any,
  print_int: (i: any) => any,
  pp_print_float: (state: any, f: any) => any,
  print_float: (f: any) => any,
  pp_print_char: (state: any, c: any) => any,
  print_char: (c: any) => any,
  pp_print_bool: (state: any, b: any) => any,
  print_bool: (b: any) => any,
  pp_print_space: (state: any, param: any) => any,
  print_space: (param: any) => any,
  pp_print_cut: (state: any, param: any) => any,
  print_cut: (param: any) => any,
  pp_print_break: (state: any, width: any, offset: any) => any,
  print_break: (width: any, offset: any) => any,
  pp_print_custom_break: (state: any, fits: any, breaks: any) => any,
  pp_force_newline: (state: any, param: any) => any,
  force_newline: (param: any) => any,
  pp_print_if_newline: (state: any, param: any) => any,
  print_if_newline: (param: any) => any,
  pp_print_flush: (state: any, param: any) => any,
  print_flush: (param: any) => any,
  pp_print_newline: (state: any, param: any) => any,
  print_newline: (param: any) => any,
  pp_set_margin: (state: any, n: any) => any,
  set_margin: (n: any) => any,
  pp_get_margin: (state: any, param: any) => any,
  get_margin: (param: any) => any,
  pp_set_max_indent: (state: any, n: any) => any,
  set_max_indent: (n: any) => any,
  pp_get_max_indent: (state: any, param: any) => any,
  get_max_indent: (param: any) => any,
  check_geometry: (geometry: any) => any,
  pp_set_geometry: (state: any, max_indent: any, margin: any) => any,
  set_geometry: (max_indent: any, margin: any) => any,
  pp_safe_set_geometry: (state: any, max_indent: any, margin: any) => any,
  safe_set_geometry: (max_indent: any, margin: any) => any,
  pp_get_geometry: (state: any, param: any) => any,
  get_geometry: (param: any) => any,
  pp_set_max_boxes: (state: any, n: any) => any,
  set_max_boxes: (n: any) => any,
  pp_get_max_boxes: (state: any, param: any) => any,
  get_max_boxes: (param: any) => any,
  pp_over_max_boxes: (state: any, param: any) => any,
  over_max_boxes: (param: any) => any,
  pp_open_tbox: (state: any, param: any) => any,
  open_tbox: (param: any) => any,
  pp_close_tbox: (state: any, param: any) => any,
  close_tbox: (param: any) => any,
  pp_set_tab: (state: any, param: any) => any,
  set_tab: (param: any) => any,
  pp_print_tab: (state: any, param: any) => any,
  print_tab: (param: any) => any,
  pp_print_tbreak: (state: any, width: any, offset: any) => any,
  print_tbreak: (width: any, offset: any) => any,
  pp_set_ellipsis_text: (state: any, s: any) => any,
  set_ellipsis_text: (s: any) => any,
  pp_get_ellipsis_text: (state: any, param: any) => any,
  get_ellipsis_text: (param: any) => any,
  String_tag: any,
  pp_open_stag: (state: any, tag_name: any) => any,
  open_stag: (tag_name: any) => any,
  pp_close_stag: (state: any, param: any) => any,
  close_stag: (param: any) => any,
  pp_set_tags: (state: any, b: any) => any,
  set_tags: (b: any) => any,
  pp_set_print_tags: (state: any, b: any) => any,
  set_print_tags: (b: any) => any,
  pp_set_mark_tags: (state: any, b: any) => any,
  set_mark_tags: (b: any) => any,
  pp_get_print_tags: (state: any, param: any) => any,
  get_print_tags: (param: any) => any,
  pp_get_mark_tags: (state: any, param: any) => any,
  get_mark_tags: (param: any) => any,
  pp_set_formatter_out_channel: (state: any, oc: any) => any,
  set_formatter_out_channel: (oc: any) => any,
  pp_set_formatter_output_functions: (state: any, f: any, g: any) => any,
  set_formatter_output_functions: (f: any, g: any) => any,
  pp_get_formatter_output_functions: (state: any, param: any) => any,
  get_formatter_output_functions: (param: any) => any,
  pp_set_formatter_out_functions: (state: any, param: any) => any,
  set_formatter_out_functions: (param: any) => any,
  pp_get_formatter_out_functions: (state: any, param: any) => any,
  get_formatter_out_functions: (param: any) => any,
  pp_set_formatter_stag_functions: (state: any, param: any) => any,
  set_formatter_stag_functions: (param: any) => any,
  pp_get_formatter_stag_functions: (state: any, param: any) => any,
  get_formatter_stag_functions: (param: any) => any,
  formatter_of_out_channel: (oc: any) => any,
  std_formatter: any,
  err_formatter: any,
  formatter_of_buffer: (b: any) => any,
  stdbuf: any,
  str_formatter: any,
  flush_str_formatter: (param: any) => any,
  make_formatter: (output: any, flush: any) => any,
  formatter_of_out_functions: (out_funs: any) => any,
  make_symbolic_output_buffer: (param: any) => any,
  clear_symbolic_output_buffer: (sob: any) => any,
  get_symbolic_output_buffer: (sob: any) => any,
  flush_symbolic_output_buffer: (sob: any) => any,
  add_symbolic_output_item: (sob: any, item: any) => any,
  formatter_of_symbolic_output_buffer: (sob: any) => any,
  pp_print_list: (opt: any, pp_v: any, ppf: any, param: any) => any,
  pp_print_text: (ppf: any, s: any) => any,
  pp_print_option: (opt: any, pp_v: any, ppf: any, param: any) => any,
  pp_print_result: (ok: any, error: any, ppf: any, param: any) => any,
  fprintf: (ppf: any) => any,
  printf: (fmt: any) => any,
  eprintf: (fmt: any) => any,
  sprintf: (fmt: any) => any,
  asprintf: (fmt: any) => any,
  dprintf: (fmt: any) => any,
  ifprintf: (ppf: any, param: any) => any,
  kfprintf: (k: any, ppf: any, param: any) => any,
  kdprintf: (k: any, param: any) => any,
  ikfprintf: (k: any, ppf: any, param: any) => any,
  ksprintf: (k: any, param: any) => any,
  kasprintf: (k: any, param: any) => any,
  bprintf: (b: any, param: any) => any,
  set_all_formatter_output_functions: (f: any, g: any, h: any, i: any) => any,
  get_all_formatter_output_functions: (param: any) => any,
  pp_set_all_formatter_output_functions: (state: any, f: any, g: any, h: any, i: any) => any,
  pp_get_all_formatter_output_functions: (state: any, param: any) => any,
  pp_open_tag: (state: any, s: any) => any,
  open_tag: (s: any) => any,
  pp_close_tag: (state: any, param: any) => any,
  close_tag: (param: any) => any,
  pp_set_formatter_tag_functions: (state: any, param: any) => any,
  set_formatter_tag_functions: (param: any) => any,
  pp_get_formatter_tag_functions: (fmt: any, param: any) => any,
  get_formatter_tag_functions: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.pp_open_box = module.exports[1];
module.exports.open_box = module.exports[2];
module.exports.pp_close_box = module.exports[3];
module.exports.close_box = module.exports[4];
module.exports.pp_open_hbox = module.exports[5];
module.exports.open_hbox = module.exports[6];
module.exports.pp_open_vbox = module.exports[7];
module.exports.open_vbox = module.exports[8];
module.exports.pp_open_hvbox = module.exports[9];
module.exports.open_hvbox = module.exports[10];
module.exports.pp_open_hovbox = module.exports[11];
module.exports.open_hovbox = module.exports[12];
module.exports.pp_print_string = module.exports[13];
module.exports.print_string = module.exports[14];
module.exports.pp_print_as = module.exports[15];
module.exports.print_as = module.exports[16];
module.exports.pp_print_int = module.exports[17];
module.exports.print_int = module.exports[18];
module.exports.pp_print_float = module.exports[19];
module.exports.print_float = module.exports[20];
module.exports.pp_print_char = module.exports[21];
module.exports.print_char = module.exports[22];
module.exports.pp_print_bool = module.exports[23];
module.exports.print_bool = module.exports[24];
module.exports.pp_print_space = module.exports[25];
module.exports.print_space = module.exports[26];
module.exports.pp_print_cut = module.exports[27];
module.exports.print_cut = module.exports[28];
module.exports.pp_print_break = module.exports[29];
module.exports.print_break = module.exports[30];
module.exports.pp_print_custom_break = module.exports[31];
module.exports.pp_force_newline = module.exports[32];
module.exports.force_newline = module.exports[33];
module.exports.pp_print_if_newline = module.exports[34];
module.exports.print_if_newline = module.exports[35];
module.exports.pp_print_flush = module.exports[36];
module.exports.print_flush = module.exports[37];
module.exports.pp_print_newline = module.exports[38];
module.exports.print_newline = module.exports[39];
module.exports.pp_set_margin = module.exports[40];
module.exports.set_margin = module.exports[41];
module.exports.pp_get_margin = module.exports[42];
module.exports.get_margin = module.exports[43];
module.exports.pp_set_max_indent = module.exports[44];
module.exports.set_max_indent = module.exports[45];
module.exports.pp_get_max_indent = module.exports[46];
module.exports.get_max_indent = module.exports[47];
module.exports.check_geometry = module.exports[48];
module.exports.pp_set_geometry = module.exports[49];
module.exports.set_geometry = module.exports[50];
module.exports.pp_safe_set_geometry = module.exports[51];
module.exports.safe_set_geometry = module.exports[52];
module.exports.pp_get_geometry = module.exports[53];
module.exports.get_geometry = module.exports[54];
module.exports.pp_set_max_boxes = module.exports[55];
module.exports.set_max_boxes = module.exports[56];
module.exports.pp_get_max_boxes = module.exports[57];
module.exports.get_max_boxes = module.exports[58];
module.exports.pp_over_max_boxes = module.exports[59];
module.exports.over_max_boxes = module.exports[60];
module.exports.pp_open_tbox = module.exports[61];
module.exports.open_tbox = module.exports[62];
module.exports.pp_close_tbox = module.exports[63];
module.exports.close_tbox = module.exports[64];
module.exports.pp_set_tab = module.exports[65];
module.exports.set_tab = module.exports[66];
module.exports.pp_print_tab = module.exports[67];
module.exports.print_tab = module.exports[68];
module.exports.pp_print_tbreak = module.exports[69];
module.exports.print_tbreak = module.exports[70];
module.exports.pp_set_ellipsis_text = module.exports[71];
module.exports.set_ellipsis_text = module.exports[72];
module.exports.pp_get_ellipsis_text = module.exports[73];
module.exports.get_ellipsis_text = module.exports[74];
module.exports.String_tag = module.exports[75];
module.exports.pp_open_stag = module.exports[76];
module.exports.open_stag = module.exports[77];
module.exports.pp_close_stag = module.exports[78];
module.exports.close_stag = module.exports[79];
module.exports.pp_set_tags = module.exports[80];
module.exports.set_tags = module.exports[81];
module.exports.pp_set_print_tags = module.exports[82];
module.exports.set_print_tags = module.exports[83];
module.exports.pp_set_mark_tags = module.exports[84];
module.exports.set_mark_tags = module.exports[85];
module.exports.pp_get_print_tags = module.exports[86];
module.exports.get_print_tags = module.exports[87];
module.exports.pp_get_mark_tags = module.exports[88];
module.exports.get_mark_tags = module.exports[89];
module.exports.pp_set_formatter_out_channel = module.exports[90];
module.exports.set_formatter_out_channel = module.exports[91];
module.exports.pp_set_formatter_output_functions = module.exports[92];
module.exports.set_formatter_output_functions = module.exports[93];
module.exports.pp_get_formatter_output_functions = module.exports[94];
module.exports.get_formatter_output_functions = module.exports[95];
module.exports.pp_set_formatter_out_functions = module.exports[96];
module.exports.set_formatter_out_functions = module.exports[97];
module.exports.pp_get_formatter_out_functions = module.exports[98];
module.exports.get_formatter_out_functions = module.exports[99];
module.exports.pp_set_formatter_stag_functions = module.exports[100];
module.exports.set_formatter_stag_functions = module.exports[101];
module.exports.pp_get_formatter_stag_functions = module.exports[102];
module.exports.get_formatter_stag_functions = module.exports[103];
module.exports.formatter_of_out_channel = module.exports[104];
module.exports.std_formatter = module.exports[105];
module.exports.err_formatter = module.exports[106];
module.exports.formatter_of_buffer = module.exports[107];
module.exports.stdbuf = module.exports[108];
module.exports.str_formatter = module.exports[109];
module.exports.flush_str_formatter = module.exports[110];
module.exports.make_formatter = module.exports[111];
module.exports.formatter_of_out_functions = module.exports[112];
module.exports.make_symbolic_output_buffer = module.exports[113];
module.exports.clear_symbolic_output_buffer = module.exports[114];
module.exports.get_symbolic_output_buffer = module.exports[115];
module.exports.flush_symbolic_output_buffer = module.exports[116];
module.exports.add_symbolic_output_item = module.exports[117];
module.exports.formatter_of_symbolic_output_buffer = module.exports[118];
module.exports.pp_print_list = module.exports[119];
module.exports.pp_print_text = module.exports[120];
module.exports.pp_print_option = module.exports[121];
module.exports.pp_print_result = module.exports[122];
module.exports.fprintf = module.exports[123];
module.exports.printf = module.exports[124];
module.exports.eprintf = module.exports[125];
module.exports.sprintf = module.exports[126];
module.exports.asprintf = module.exports[127];
module.exports.dprintf = module.exports[128];
module.exports.ifprintf = module.exports[129];
module.exports.kfprintf = module.exports[130];
module.exports.kdprintf = module.exports[131];
module.exports.ikfprintf = module.exports[132];
module.exports.ksprintf = module.exports[133];
module.exports.kasprintf = module.exports[134];
module.exports.bprintf = module.exports[135];
module.exports.set_all_formatter_output_functions = module.exports[137];
module.exports.get_all_formatter_output_functions = module.exports[138];
module.exports.pp_set_all_formatter_output_functions = module.exports[139];
module.exports.pp_get_all_formatter_output_functions = module.exports[140];
module.exports.pp_open_tag = module.exports[141];
module.exports.open_tag = module.exports[142];
module.exports.pp_close_tag = module.exports[143];
module.exports.close_tag = module.exports[144];
module.exports.pp_set_formatter_tag_functions = module.exports[145];
module.exports.set_formatter_tag_functions = module.exports[146];
module.exports.pp_get_formatter_tag_functions = module.exports[147];
module.exports.get_formatter_tag_functions = module.exports[148];

/* Hashing disabled */
