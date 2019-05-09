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
var caml_new_string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__4 = caml_new_string(".");
var cst__2 = caml_new_string(">");
var cst__3 = caml_new_string("</");
var cst__0 = caml_new_string(">");
var cst__1 = caml_new_string("<");
var cst = caml_new_string("\n");
var cst_Format_Empty_queue = caml_new_string("Format.Empty_queue");
var CamlinternalFormat = global_data["CamlinternalFormat"];
var Pervasives = global_data["Pervasives"];
var String = global_data["String_"];
var Buffer = global_data["Buffer"];
var List = global_data["List_"];
var Not_found = global_data["Not_found"];
var sH = [3,0,3];
var sG = [0,caml_new_string("")];

function make_queue(param) {return [0,0,0];}

function clear_queue(q) {q[1] = 0;q[2] = 0;return 0;}

function add_queue(x, q) {
  var c = [0,x,0];
  var vS = q[1];
  if (vS) {q[1] = c;vS[2] = c;return 0;}
  q[1] = c;
  q[2] = c;
  return 0;
}

var Empty_queue = [248,cst_Format_Empty_queue,runtime["caml_fresh_oo_id"](0)];

function peek_queue(param) {
  var vR = param[2];
  if (vR) {var x = vR[1];return x;}
  throw runtime["caml_wrap_thrown_exception"](Empty_queue);
}

function take_queue(q) {
  var vQ = q[2];
  if (vQ) {
    var x = vQ[1];
    var tl = vQ[2];
    q[2] = tl;
    if (0 === tl) {q[1] = 0;}
    return x;
  }
  throw runtime["caml_wrap_thrown_exception"](Empty_queue);
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
  return caml_call3(state[17], s, 0, caml_ml_string_length(s));
}

function pp_output_newline(state) {return caml_call1(state[19], 0);}

function pp_output_spaces(state, n) {return caml_call1(state[20], n);}

function pp_output_indent(state, n) {return caml_call1(state[21], n);}

function break_new_line(state, offset, width) {
  pp_output_newline(state);
  state[11] = 1;
  var indent = (state[6] - width | 0) + offset | 0;
  var real_indent = caml_call2(Pervasives[4], state[8], indent);
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
  var vN = state[2];
  if (vN) {
    var match = vN[1];
    var width = match[2];
    var bl_ty = match[1];
    var vO = state[9] < width ? 1 : 0;
    if (vO) {
      if (0 !== bl_ty) {
        if (5 <= bl_ty) {return 0;}
        return break_line(state, width);
      }
      var vP = 0;
    }
    else var vP = vO;
    return vP;
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
      var vC = state[3];
      if (vC) {
        var match = vC[1];
        var tabs = match[1];
        var add_tab = function(n, ls) {
          if (ls) {
            var l = ls[2];
            var x = ls[1];
            if (runtime["caml_lessthan"](n, x)) {return [0,n,ls];}
            return [0,x,add_tab(n, l)];
          }
          return [0,n,0];
        };
        tabs[1] = add_tab(state[6] - state[9] | 0, tabs[1]);
        return 0;
      }
      return 0;
    case 1:
      var vD = state[2];
      if (vD) {var ls = vD[2];state[2] = ls;return 0;}
      return 0;
    case 2:
      var vE = state[3];
      if (vE) {var ls__0 = vE[2];state[3] = ls__0;return 0;}
      return 0;
    case 3:
      var vF = state[2];
      if (vF) {
        var match__0 = vF[1];
        var width = match__0[2];
        return break_line(state, width);
      }
      return pp_output_newline(state);
    case 4:
      var vG = state[10] !== (state[6] - state[9] | 0) ? 1 : 0;
      if (vG) {return pp_skip_token(state);}
      return vG;
    default:
      var vH = state[5];
      if (vH) {
        var tags = vH[2];
        var tag_name = vH[1];
        var marker = caml_call1(state[25], tag_name);
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
      var vI = state[2];
      if (vI) {
        var match__1 = vI[1];
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
            if (state[9] < size) {
              return break_new_line(state, off, width__0);
            }
            return break_same_line(state, n);
          case 4:
            if (state[11]) {return break_same_line(state, n);}
            if (state[9] < size) {
              return break_new_line(state, off, width__0);
            }
            if (((state[6] - width__0 | 0) + off | 0) < state[10]) {return break_new_line(state, off, width__0);}
            return break_same_line(state, n);
          default:
            return break_same_line(state, n)
          }
      }
      return 0;
    case 2:
      var off__0 = param[2];
      var n__0 = param[1];
      var insertion_point = state[6] - state[9] | 0;
      var vJ = state[3];
      if (vJ) {
        var match__2 = vJ[1];
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
            throw runtime["caml_wrap_thrown_exception"](Not_found);
          }
        };
        var vK = tabs__0[1];
        if (vK) {
          var x = vK[1];
          try {var vL = find(insertion_point, tabs__0[1]);var x__0 = vL;}
          catch(vM) {
            vM = caml_wrap_exception(vM);
            if (vM !== Not_found) {
              throw runtime["caml_wrap_thrown_exception_reraise"](vM);
            }
            var x__0 = x;
          }
          var tab = x__0;
        }
        else var tab = insertion_point;
        var offset = tab - insertion_point | 0;
        if (0 <= offset) {return break_same_line(state, offset + n__0 | 0);}
        return break_new_line(state, tab + off__0 | 0, state[6]);
      }
      return 0;
    case 3:
      var ty__0 = param[2];
      var off__1 = param[1];
      var insertion_point__0 = state[6] - state[9] | 0;
      if (state[8] < insertion_point__0) {pp_force_break_line(state);}
      var offset__0 = state[9] - off__1 | 0;
      if (1 === ty__0) var bl_type = 1;
      else if (state[9] < size) var bl_type = ty__0;else var bl_type = 5;
      state[2] = [0,[0,bl_type,offset__0],state[2]];
      return 0;
    case 4:
      var tbox = param[1];
      state[3] = [0,tbox,state[3]];
      return 0;
    default:
      var tag_name__0 = param[1];
      var marker__0 = caml_call1(state[24], tag_name__0);
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
    var vz = size < 0 ? 1 : 0;
    if (vz) var vA = (state
       [13] -
        state[12] | 0) <
       state[9] ?
      1 :
      0;
    else var vA = vz;
    var vB = 1 - vA;
    if (vB) {
      take_queue(state[28]);
      if (0 <= size) var size__0 = size;
      else var size__0 = pp_infinity;
      format_pp_token(state, size__0, tok);
      state[12] = len + state[12] | 0;
      continue;
    }
    return vB;
  }
}

function advance_left(state) {
  try {var vx = advance_loop(state);return vx;}
  catch(vy) {
    vy = caml_wrap_exception(vy);
    if (vy === Empty_queue) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](vy);
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

var q_elem = make_queue_elem(-1, sG, 0);
var scan_stack_bottom = [0,[0,-1,q_elem],0];

function clear_scan_stack(state) {state[1] = scan_stack_bottom;return 0;}

function set_size(state, ty) {
  var vt = state[1];
  if (vt) {
    var match = vt[1];
    var queue_elem = match[2];
    var left_tot = match[1];
    var size = queue_elem[1];
    var t = vt[2];
    var tok = queue_elem[2];
    if (left_tot < state[12]) {return clear_scan_stack(state);}
    if (! (typeof tok === "number")) {
      switch (tok[0]) {
        case 3:
          var vv = 1 - ty;
          if (vv) {
            queue_elem[1] = state[13] + size | 0;
            state[1] = t;
            var vw = 0;
          }
          else var vw = vv;
          return vw;
        case 1:
        case 2:
          if (ty) {
            queue_elem[1] = state[13] + size | 0;
            state[1] = t;
            var vu = 0;
          }
          else var vu = ty;
          return vu
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
  var vs = state[14] === state[15] ? 1 : 0;
  if (vs) {return enqueue_string(state, state[16]);}
  return vs;
}

function pp_open_sys_box(state) {return pp_open_box_gen(state, 0, 3);}

function pp_close_box(state, param) {
  var vq = 1 < state[14] ? 1 : 0;
  if (vq) {
    if (state[14] < state[15]) {
      pp_enqueue(state, [0,0,1,0]);
      set_size(state, 1);
      set_size(state, 0);
    }
    state[14] = state[14] + -1 | 0;
    var vr = 0;
  }
  else var vr = vq;
  return vr;
}

function pp_open_tag(state, tag_name) {
  if (state[22]) {
    state[4] = [0,tag_name,state[4]];
    caml_call1(state[26], tag_name);
  }
  var vp = state[23];
  if (vp) {return pp_enqueue(state, [0,0,[5,tag_name],0]);}
  return vp;
}

function pp_close_tag(state, param) {
  if (state[23]) {pp_enqueue(state, [0,0,5,0]);}
  var vm = state[22];
  if (vm) {
    var vn = state[4];
    if (vn) {
      var tags = vn[2];
      var tag_name = vn[1];
      caml_call1(state[27], tag_name);
      state[4] = tags;
      return 0;
    }
    var vo = 0;
  }
  else var vo = vm;
  return vo;
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
  var vk = state[4];
  function vl(param) {return pp_close_tag(state, 0);}
  return caml_call2(List[15], vl, vk);
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
  var vj = state[14] < state[15] ? 1 : 0;
  if (vj) {return enqueue_string_as(state, size, s);}
  return vj;
}

function pp_print_as(state, isize, s) {
  return pp_print_as_size(state, isize, s);
}

function pp_print_string(state, s) {
  return pp_print_as(state, caml_ml_string_length(s), s);
}

function pp_print_int(state, i) {
  return pp_print_string(state, caml_call1(Pervasives[21], i));
}

function pp_print_float(state, f) {
  return pp_print_string(state, caml_call1(Pervasives[23], f));
}

function pp_print_bool(state, b) {
  return pp_print_string(state, caml_call1(Pervasives[18], b));
}

function pp_print_char(state, c) {
  return pp_print_as(state, 1, caml_call2(String[1], 1, c));
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
  return caml_call1(state[18], 0);
}

function pp_print_flush(state, param) {
  pp_flush_queue(state, 0);
  return caml_call1(state[18], 0);
}

function pp_force_newline(state, param) {
  var vi = state[14] < state[15] ? 1 : 0;
  if (vi) {return enqueue_advance(state, make_queue_elem(0, 3, 0));}
  return vi;
}

function pp_print_if_newline(state, param) {
  var vh = state[14] < state[15] ? 1 : 0;
  if (vh) {return enqueue_advance(state, make_queue_elem(0, 4, 0));}
  return vh;
}

function pp_print_break(state, width, offset) {
  var vg = state[14] < state[15] ? 1 : 0;
  if (vg) {
    var elem = make_queue_elem(- state[13] | 0, [1,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return vg;
}

function pp_print_space(state, param) {return pp_print_break(state, 1, 0);}

function pp_print_cut(state, param) {return pp_print_break(state, 0, 0);}

function pp_open_tbox(state, param) {
  state[14] = state[14] + 1 | 0;
  var vf = state[14] < state[15] ? 1 : 0;
  if (vf) {
    var elem = make_queue_elem(0, [4,[0,[0,0]]], 0);
    return enqueue_advance(state, elem);
  }
  return vf;
}

function pp_close_tbox(state, param) {
  var vc = 1 < state[14] ? 1 : 0;
  if (vc) {
    var vd = state[14] < state[15] ? 1 : 0;
    if (vd) {
      var elem = make_queue_elem(0, 2, 0);
      enqueue_advance(state, elem);
      state[14] = state[14] + -1 | 0;
      var ve = 0;
    }
    else var ve = vd;
  }
  else var ve = vc;
  return ve;
}

function pp_print_tbreak(state, width, offset) {
  var vb = state[14] < state[15] ? 1 : 0;
  if (vb) {
    var elem = make_queue_elem(- state[13] | 0, [2,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return vb;
}

function pp_print_tab(state, param) {return pp_print_tbreak(state, 0, 0);}

function pp_set_tab(state, param) {
  var va = state[14] < state[15] ? 1 : 0;
  if (va) {
    var elem = make_queue_elem(0, 0, 0);
    return enqueue_advance(state, elem);
  }
  return va;
}

function pp_set_max_boxes(state, n) {
  var u9 = 1 < n ? 1 : 0;
  if (u9) {
    state[15] = n;
    var u_ = 0;
  }
  else var u_ = u9;
  return u_;
}

function pp_get_max_boxes(state, param) {return state[15];}

function pp_over_max_boxes(state, param) {
  return state[14] === state[15] ? 1 : 0;
}

function pp_set_ellipsis_text(state, s) {state[16] = s;return 0;}

function pp_get_ellipsis_text(state, param) {return state[16];}

function pp_limit(n) {if (n < 1000000010) {return n;}return 1000000009;}

function pp_set_min_space_left(state, n) {
  var u8 = 1 <= n ? 1 : 0;
  if (u8) {
    var n__0 = pp_limit(n);
    state[7] = n__0;
    state[8] = state[6] - state[7] | 0;
    return pp_rinit(state);
  }
  return u8;
}

function pp_set_max_indent(state, n) {
  return pp_set_min_space_left(state, state[6] - n | 0);
}

function pp_get_max_indent(state, param) {return state[8];}

function pp_set_margin(state, n) {
  var u6 = 1 <= n ? 1 : 0;
  if (u6) {
    var n__0 = pp_limit(n);
    state[6] = n__0;
    if (state[8] <= state[6]) var new_max_indent = state
     [8];
    else {
      var u7 = caml_call2(
        Pervasives[5],
        state[6] - state[7] | 0,
        state[6] / 2 | 0
      );
      var new_max_indent = caml_call2(Pervasives[5], u7, 1);
    }
    return pp_set_max_indent(state, new_max_indent);
  }
  return u6;
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

function display_newline(state, param) {
  return caml_call3(state[17], cst, 0, 1);
}

var blank_line = caml_call2(String[1], 80, 32);

function display_blanks(state, n) {
  var n__0 = n;
  for (; ; ) {
    var u5 = 0 < n__0 ? 1 : 0;
    if (u5) {
      if (80 < n__0) {
        caml_call3(state[17], blank_line, 0, 80);
        var n__1 = n__0 + -80 | 0;
        var n__0 = n__1;
        continue;
      }
      return caml_call3(state[17], blank_line, 0, n__0);
    }
    return u5;
  }
}

function pp_set_formatter_out_channel(state, oc) {
  state[17] = caml_call1(Pervasives[57], oc);
  state[18] = function(param) {return caml_call1(Pervasives[51], oc);};
  state[19] = function(u4) {return display_newline(state, u4);};
  state[20] = function(u3) {return display_blanks(state, u3);};
  state[21] = function(u2) {return display_blanks(state, u2);};
  return 0;
}

function default_pp_mark_open_tag(s) {
  var u1 = caml_call2(Pervasives[16], s, cst__0);
  return caml_call2(Pervasives[16], cst__1, u1);
}

function default_pp_mark_close_tag(s) {
  var u0 = caml_call2(Pervasives[16], s, cst__2);
  return caml_call2(Pervasives[16], cst__3, u0);
}

function default_pp_print_open_tag(uZ) {return 0;}

function default_pp_print_close_tag(uY) {return 0;}

function pp_make_formatter(f, g, h, i, j) {
  var pp_queue = make_queue(0);
  var sys_tok = make_queue_elem(-1, sH, 0);
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
  function uQ(uX) {return 0;}
  function uR(uW) {return 0;}
  var ppf = pp_make_formatter(output, flush, function(uV) {return 0;}, uR, uQ);
  ppf[19] = function(uU) {return display_newline(ppf, uU);};
  ppf[20] = function(uT) {return display_blanks(ppf, uT);};
  ppf[21] = function(uS) {return display_blanks(ppf, uS);};
  return ppf;
}

function formatter_of_out_channel(oc) {
  function uP(param) {return caml_call1(Pervasives[51], oc);}
  return make_formatter(caml_call1(Pervasives[57], oc), uP);
}

function formatter_of_buffer(b) {
  function uN(uO) {return 0;}
  return make_formatter(caml_call1(Buffer[16], b), uN);
}

var pp_buffer_size = 512;

function pp_make_buffer(param) {return caml_call1(Buffer[1], pp_buffer_size);}

var stdbuf = pp_make_buffer(0);
var std_formatter = formatter_of_out_channel(Pervasives[27]);
var err_formatter = formatter_of_out_channel(Pervasives[28]);
var str_formatter = formatter_of_buffer(stdbuf);

function flush_buffer_formatter(buf, ppf) {
  pp_flush_queue(ppf, 0);
  var s = caml_call1(Buffer[2], buf);
  caml_call1(Buffer[9], buf);
  return s;
}

function flush_str_formatter(param) {
  return flush_buffer_formatter(stdbuf, str_formatter);
}

function make_symbolic_output_buffer(param) {return [0,0];}

function clear_symbolic_output_buffer(sob) {sob[1] = 0;return 0;}

function get_symbolic_output_buffer(sob) {return caml_call1(List[9], sob[1]);}

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
    return add_symbolic_output_item(sob, [0,caml_call3(String[4], s, i, n)]);
  }
  function symbolic_spaces(sob, n) {
    return add_symbolic_output_item(sob, [1,n]);
  }
  function symbolic_indent(sob, n) {
    return add_symbolic_output_item(sob, [2,n]);
  }
  function f(uK, uL, uM) {return symbolic_string(sob, uK, uL, uM);}
  function g(uJ) {return symbolic_flush(sob, uJ);}
  function h(uI) {return symbolic_newline(sob, uI);}
  function i(uH) {return symbolic_spaces(sob, uH);}
  function j(uG) {return symbolic_indent(sob, uG);}
  return pp_make_formatter(f, g, h, i, j);
}

function open_hbox(uF) {return pp_open_hbox(std_formatter, uF);}

function open_vbox(uE) {return pp_open_vbox(std_formatter, uE);}

function open_hvbox(uD) {return pp_open_hvbox(std_formatter, uD);}

function open_hovbox(uC) {return pp_open_hovbox(std_formatter, uC);}

function open_box(uB) {return pp_open_box(std_formatter, uB);}

function close_box(uA) {return pp_close_box(std_formatter, uA);}

function open_tag(uz) {return pp_open_tag(std_formatter, uz);}

function close_tag(uy) {return pp_close_tag(std_formatter, uy);}

function print_as(uw, ux) {return pp_print_as(std_formatter, uw, ux);}

function print_string(uv) {return pp_print_string(std_formatter, uv);}

function print_int(uu) {return pp_print_int(std_formatter, uu);}

function print_float(ut) {return pp_print_float(std_formatter, ut);}

function print_char(us) {return pp_print_char(std_formatter, us);}

function print_bool(ur) {return pp_print_bool(std_formatter, ur);}

function print_break(up, uq) {return pp_print_break(std_formatter, up, uq);}

function print_cut(uo) {return pp_print_cut(std_formatter, uo);}

function print_space(un) {return pp_print_space(std_formatter, un);}

function force_newline(um) {return pp_force_newline(std_formatter, um);}

function print_flush(ul) {return pp_print_flush(std_formatter, ul);}

function print_newline(uk) {return pp_print_newline(std_formatter, uk);}

function print_if_newline(uj) {return pp_print_if_newline(std_formatter, uj);}

function open_tbox(ui) {return pp_open_tbox(std_formatter, ui);}

function close_tbox(uh) {return pp_close_tbox(std_formatter, uh);}

function print_tbreak(uf, ug) {return pp_print_tbreak(std_formatter, uf, ug);}

function set_tab(ue) {return pp_set_tab(std_formatter, ue);}

function print_tab(ud) {return pp_print_tab(std_formatter, ud);}

function set_margin(uc) {return pp_set_margin(std_formatter, uc);}

function get_margin(ub) {return pp_get_margin(std_formatter, ub);}

function set_max_indent(ua) {return pp_set_max_indent(std_formatter, ua);}

function get_max_indent(t_) {return pp_get_max_indent(std_formatter, t_);}

function set_max_boxes(t9) {return pp_set_max_boxes(std_formatter, t9);}

function get_max_boxes(t8) {return pp_get_max_boxes(std_formatter, t8);}

function over_max_boxes(t7) {return pp_over_max_boxes(std_formatter, t7);}

function set_ellipsis_text(t6) {
  return pp_set_ellipsis_text(std_formatter, t6);
}

function get_ellipsis_text(t5) {
  return pp_get_ellipsis_text(std_formatter, t5);
}

function set_formatter_out_channel(t4) {
  return pp_set_formatter_out_channel(std_formatter, t4);
}

function set_formatter_out_functions(t3) {
  return pp_set_formatter_out_functions(std_formatter, t3);
}

function get_formatter_out_functions(t2) {
  return pp_get_formatter_out_functions(std_formatter, t2);
}

function set_formatter_output_functions(t0, t1) {
  return pp_set_formatter_output_functions(std_formatter, t0, t1);
}

function get_formatter_output_functions(tZ) {
  return pp_get_formatter_output_functions(std_formatter, tZ);
}

function set_formatter_tag_functions(tY) {
  return pp_set_formatter_tag_functions(std_formatter, tY);
}

function get_formatter_tag_functions(tX) {
  return pp_get_formatter_tag_functions(std_formatter, tX);
}

function set_print_tags(tW) {return pp_set_print_tags(std_formatter, tW);}

function get_print_tags(tV) {return pp_get_print_tags(std_formatter, tV);}

function set_mark_tags(tU) {return pp_set_mark_tags(std_formatter, tU);}

function get_mark_tags(tT) {return pp_get_mark_tags(std_formatter, tT);}

function set_tags(tS) {return pp_set_tags(std_formatter, tS);}

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
      var tQ = param__0[2];
      var tR = param__0[1];
      if (tQ) {
        caml_call2(pp_v, ppf, tR);
        caml_call2(pp_sep, ppf, 0);
        var opt__1 = [0,pp_sep];
        var opt__0 = opt__1;
        var param__0 = tQ;
        continue;
      }
      return caml_call2(pp_v, ppf, tR);
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
      caml_call3(String[4], s, left[1], right[1] - left[1] | 0)
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
    var tP = left[1] !== len ? 1 : 0;
    if (tP) {return flush(0);}
    return tP;
  }
}

function compute_tag(output, tag_acc) {
  var buf = caml_call1(Buffer[1], 16);
  var ppf = formatter_of_buffer(buf);
  caml_call2(output, ppf, tag_acc);
  pp_print_flush(ppf, 0);
  var len = caml_call1(Buffer[7], buf);
  if (2 <= len) {return caml_call3(Buffer[4], buf, 1, len + -2 | 0);}
  return caml_call1(Buffer[2], buf);
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
      var to = acc[2];
      var tp = acc[1];
      if (0 === to[0]) {
        var acc__0 = to[1];
        output_acc(ppf, tp);
        return pp_open_tag(ppf, compute_tag(output_acc, acc__0));
      }
      var acc__1 = to[1];
      output_acc(ppf, tp);
      var tq = compute_tag(output_acc, acc__1);
      var match = caml_call1(CamlinternalFormat[21], tq);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var tr = acc[1];
      if (typeof tr === "number") var switch__1 = 1;
      else if (0 === tr[0]) {
        var tt = tr[2];
        if (typeof tt === "number") var switch__2 = 1;
        else if (1 === tt[0]) {
          var tu = acc[2];
          var tv = tt[2];
          var tw = tr[1];
          var s__0 = tu;
          var size = tv;
          var p__1 = tw;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var ts = acc[2];
        var s = ts;
        var p__0 = tr;
        var switch__0 = 2;
      }
      break;
    case 3:
      var tx = acc[1];
      if (typeof tx === "number") var switch__3 = 1;
      else if (0 === tx[0]) {
        var tz = tx[2];
        if (typeof tz === "number") var switch__4 = 1;
        else if (1 === tz[0]) {
          var tA = acc[2];
          var tB = tz[2];
          var tC = tx[1];
          var c__0 = tA;
          var size__0 = tB;
          var p__3 = tC;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var ty = acc[2];
        var c = ty;
        var p__2 = tx;
        var switch__0 = 3;
      }
      break;
    case 4:
      var tD = acc[1];
      if (typeof tD === "number") var switch__5 = 1;
      else if (0 === tD[0]) {
        var tF = tD[2];
        if (typeof tF === "number") var switch__6 = 1;
        else if (1 === tF[0]) {
          var tG = acc[2];
          var tH = tF[2];
          var tI = tD[1];
          var s__0 = tG;
          var size = tH;
          var p__1 = tI;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var tE = acc[2];
        var s = tE;
        var p__0 = tD;
        var switch__0 = 2;
      }
      break;
    case 5:
      var tJ = acc[1];
      if (typeof tJ === "number") var switch__7 = 1;
      else if (0 === tJ[0]) {
        var tL = tJ[2];
        if (typeof tL === "number") var switch__8 = 1;
        else if (1 === tL[0]) {
          var tM = acc[2];
          var tN = tL[2];
          var tO = tJ[1];
          var c__0 = tM;
          var size__0 = tN;
          var p__3 = tO;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var tK = acc[2];
        var c = tK;
        var p__2 = tJ;
        var switch__0 = 3;
      }
      break;
    case 6:
      var f__0 = acc[2];
      var p__4 = acc[1];
      output_acc(ppf, p__4);
      return caml_call1(f__0, ppf);
    case 7:
      var p__5 = acc[1];
      output_acc(ppf, p__5);
      return pp_print_flush(ppf, 0);
    default:
      var msg = acc[2];
      var p__6 = acc[1];
      output_acc(ppf, p__6);
      return caml_call1(Pervasives[1], msg)
    }
  switch (switch__0) {
    case 0:
      output_acc(ppf, p__1);
      return pp_print_as_size(ppf, size, s__0);
    case 1:
      output_acc(ppf, p__3);
      return pp_print_as_size(ppf, size__0, caml_call2(String[1], 1, c__0));
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
      var sW = acc[2];
      var sX = acc[1];
      if (0 === sW[0]) {
        var acc__0 = sW[1];
        strput_acc(ppf, sX);
        return pp_open_tag(ppf, compute_tag(strput_acc, acc__0));
      }
      var acc__1 = sW[1];
      strput_acc(ppf, sX);
      var sY = compute_tag(strput_acc, acc__1);
      var match = caml_call1(CamlinternalFormat[21], sY);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var sZ = acc[1];
      if (typeof sZ === "number") var switch__1 = 1;
      else if (0 === sZ[0]) {
        var s1 = sZ[2];
        if (typeof s1 === "number") var switch__2 = 1;
        else if (1 === s1[0]) {
          var s2 = acc[2];
          var s3 = s1[2];
          var s4 = sZ[1];
          var s__0 = s2;
          var size = s3;
          var p__1 = s4;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var s0 = acc[2];
        var s = s0;
        var p__0 = sZ;
        var switch__0 = 2;
      }
      break;
    case 3:
      var s5 = acc[1];
      if (typeof s5 === "number") var switch__3 = 1;
      else if (0 === s5[0]) {
        var s7 = s5[2];
        if (typeof s7 === "number") var switch__4 = 1;
        else if (1 === s7[0]) {
          var s8 = acc[2];
          var s9 = s7[2];
          var s_ = s5[1];
          var c__0 = s8;
          var size__0 = s9;
          var p__3 = s_;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var s6 = acc[2];
        var c = s6;
        var p__2 = s5;
        var switch__0 = 3;
      }
      break;
    case 4:
      var ta = acc[1];
      if (typeof ta === "number") var switch__5 = 1;
      else if (0 === ta[0]) {
        var tc = ta[2];
        if (typeof tc === "number") var switch__6 = 1;
        else if (1 === tc[0]) {
          var td = acc[2];
          var te = tc[2];
          var tf = ta[1];
          var s__0 = td;
          var size = te;
          var p__1 = tf;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var tb = acc[2];
        var s = tb;
        var p__0 = ta;
        var switch__0 = 2;
      }
      break;
    case 5:
      var tg = acc[1];
      if (typeof tg === "number") var switch__7 = 1;
      else if (0 === tg[0]) {
        var ti = tg[2];
        if (typeof ti === "number") var switch__8 = 1;
        else if (1 === ti[0]) {
          var tj = acc[2];
          var tk = ti[2];
          var tl = tg[1];
          var c__0 = tj;
          var size__0 = tk;
          var p__3 = tl;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var th = acc[2];
        var c = th;
        var p__2 = tg;
        var switch__0 = 3;
      }
      break;
    case 6:
      var tm = acc[1];
      if (! (typeof tm === "number") && 0 === tm[0]) {
        var tn = tm[2];
        if (! (typeof tn === "number") && 1 === tn[0]) {
          var f__1 = acc[2];
          var size__1 = tn[2];
          var p__4 = tm[1];
          strput_acc(ppf, p__4);
          return pp_print_as_size(ppf, size__1, caml_call1(f__1, 0));
        }
      }
      var f__0 = acc[2];
      strput_acc(ppf, tm);
      return pp_print_string(ppf, caml_call1(f__0, 0));
    case 7:
      var p__5 = acc[1];
      strput_acc(ppf, p__5);
      return pp_print_flush(ppf, 0);
    default:
      var msg = acc[2];
      var p__6 = acc[1];
      strput_acc(ppf, p__6);
      return caml_call1(Pervasives[1], msg)
    }
  switch (switch__0) {
    case 0:
      strput_acc(ppf, p__1);
      return pp_print_as_size(ppf, size, s__0);
    case 1:
      strput_acc(ppf, p__3);
      return pp_print_as_size(ppf, size__0, caml_call2(String[1], 1, c__0));
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
  var sU = 0;
  function sV(ppf, acc) {output_acc(ppf, acc);return caml_call1(k, ppf);}
  return caml_call4(CamlinternalFormat[7], sV, ppf, sU, fmt);
}

function ikfprintf(k, ppf, param) {
  var fmt = param[1];
  return caml_call3(CamlinternalFormat[8], k, ppf, fmt);
}

function fprintf(ppf) {
  function sR(sT) {return 0;}
  return function(sS) {return kfprintf(sR, ppf, sS);};
}

function ifprintf(ppf) {
  function sO(sQ) {return 0;}
  return function(sP) {return ikfprintf(sO, ppf, sP);};
}

function printf(fmt) {return caml_call1(fprintf(std_formatter), fmt);}

function eprintf(fmt) {return caml_call1(fprintf(err_formatter), fmt);}

function ksprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(param, acc) {
    strput_acc(ppf, acc);
    return caml_call1(k, flush_buffer_formatter(b, ppf));
  }
  return caml_call4(CamlinternalFormat[7], k__0, 0, 0, fmt);
}

function sprintf(fmt) {return ksprintf(function(s) {return s;}, fmt);}

function kasprintf(k, param) {
  var fmt = param[1];
  var b = pp_make_buffer(0);
  var ppf = formatter_of_buffer(b);
  function k__0(ppf, acc) {
    output_acc(ppf, acc);
    return caml_call1(k, flush_buffer_formatter(b, ppf));
  }
  return caml_call4(CamlinternalFormat[7], k__0, ppf, 0, fmt);
}

function asprintf(fmt) {return kasprintf(function(s) {return s;}, fmt);}

caml_call1(Pervasives[88], print_flush);

function pp_set_all_formatter_output_functions(state, f, g, h, i) {
  pp_set_formatter_output_functions(state, f, g);
  state[19] = h;
  state[20] = i;
  return 0;
}

function pp_get_all_formatter_output_functions(state, param) {return [0,state[17],state[18],state[19],state[20]];
}

function set_all_formatter_output_functions(sK, sL, sM, sN) {
  return pp_set_all_formatter_output_functions(std_formatter, sK, sL, sM, sN);
}

function get_all_formatter_output_functions(sJ) {
  return pp_get_all_formatter_output_functions(std_formatter, sJ);
}

function bprintf(b, param) {
  var fmt = param[1];
  function k(ppf, acc) {output_acc(ppf, acc);return pp_flush_queue(ppf, 0);}
  var sI = formatter_of_buffer(b);
  return caml_call4(CamlinternalFormat[7], k, sI, 0, fmt);
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