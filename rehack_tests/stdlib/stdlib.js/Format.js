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
var caml_ml_string_length = runtime.caml_ml_string_length;
var caml_new_string = runtime.caml_new_string;
var caml_wrap_exception = runtime.caml_wrap_exception;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ? f(a0, a1, a2) : runtime.caml_call_gen(f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length == 4 ?
    f(a0, a1, a2, a3) :
    runtime.caml_call_gen(f, [a0,a1,a2,a3]);
}

var global_data = runtime.caml_get_global_data();
var cst__4 = caml_new_string(".");
var cst__2 = caml_new_string(">");
var cst__3 = caml_new_string("</");
var cst__0 = caml_new_string(">");
var cst__1 = caml_new_string("<");
var cst = caml_new_string("\n");
var cst_Format_Empty_queue = caml_new_string("Format.Empty_queue");
var CamlinternalFormat = global_data.CamlinternalFormat;
var Pervasives = global_data.Pervasives;
var String = global_data.String;
var Buffer = global_data.Buffer;
var List = global_data.List;
var Not_found = global_data.Not_found;
var sG = [3,0,3];
var sF = [0,caml_new_string("")];

function make_queue(param) {return [0,0,0];}

function clear_queue(q) {q[1] = 0;q[2] = 0;return 0;}

function add_queue(x, q) {
  var c = [0,x,0];
  var vR = q[1];
  return vR ? (q[1] = c,vR[2] = c,0) : (q[1] = c,q[2] = c,0);
}

var Empty_queue = [248,cst_Format_Empty_queue,runtime.caml_fresh_oo_id(0)];

function peek_queue(param) {
  var vQ = param[2];
  if (vQ) {var x = vQ[1];return x;}
  throw runtime.caml_wrap_thrown_exception(Empty_queue);
}

function take_queue(q) {
  var vP = q[2];
  if (vP) {
    var x = vP[1];
    var tl = vP[2];
    q[2] = tl;
    if (0 === tl) {q[1] = 0;}
    return x;
  }
  throw runtime.caml_wrap_thrown_exception(Empty_queue);
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
  var vM = state[2];
  if (vM) {
    var match = vM[1];
    var width = match[2];
    var bl_ty = match[1];
    var vN = state[9] < width ? 1 : 0;
    if (vN) {
      if (0 !== bl_ty) {return 5 <= bl_ty ? 0 : break_line(state, width);}
      var vO = 0;
    }
    else var vO = vN;
    return vO;
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
      var vB = state[3];
      if (vB) {
        var match = vB[1];
        var tabs = match[1];
        var add_tab = function(n, ls) {
          if (ls) {
            var l = ls[2];
            var x = ls[1];
            return runtime.caml_lessthan(n, x) ?
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
      var vC = state[2];
      if (vC) {var ls = vC[2];state[2] = ls;return 0;}
      return 0;
    case 2:
      var vD = state[3];
      if (vD) {var ls__0 = vD[2];state[3] = ls__0;return 0;}
      return 0;
    case 3:
      var vE = state[2];
      if (vE) {
        var match__0 = vE[1];
        var width = match__0[2];
        return break_line(state, width);
      }
      return pp_output_newline(state);
    case 4:
      var vF = state[10] !== (state[6] - state[9] | 0) ? 1 : 0;
      return vF ? pp_skip_token(state) : vF;
    default:
      var vG = state[5];
      if (vG) {
        var tags = vG[2];
        var tag_name = vG[1];
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
      var vH = state[2];
      if (vH) {
        var match__1 = vH[1];
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
      var vI = state[3];
      if (vI) {
        var match__2 = vI[1];
        var tabs__0 = match__2[1];
        var find = function(n, param) {
          var param__0 = param;
          for (; ; ) {
            if (param__0) {
              var l = param__0[2];
              var x = param__0[1];
              if (runtime.caml_greaterequal(x, n)) {return x;}
              var param__0 = l;
              continue;
            }
            throw runtime.caml_wrap_thrown_exception(Not_found);
          }
        };
        var vJ = tabs__0[1];
        if (vJ) {
          var x = vJ[1];
          try {var vK = find(insertion_point, tabs__0[1]);var x__0 = vK;}
          catch(vL) {
            vL = caml_wrap_exception(vL);
            if (vL !== Not_found) {
              throw runtime.caml_wrap_thrown_exception_reraise(vL);
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
    var vy = size < 0 ? 1 : 0;
    var vz = vy ? (state[13] - state[12] | 0) < state[9] ? 1 : 0 : vy;
    var vA = 1 - vz;
    if (vA) {
      take_queue(state[28]);
      var size__0 = 0 <= size ? size : pp_infinity;
      format_pp_token(state, size__0, tok);
      state[12] = len + state[12] | 0;
      continue;
    }
    return vA;
  }
}

function advance_left(state) {
  try {var vw = advance_loop(state);return vw;}
  catch(vx) {
    vx = caml_wrap_exception(vx);
    if (vx === Empty_queue) {return 0;}
    throw runtime.caml_wrap_thrown_exception_reraise(vx);
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

var q_elem = make_queue_elem(-1, sF, 0);
var scan_stack_bottom = [0,[0,-1,q_elem],0];

function clear_scan_stack(state) {state[1] = scan_stack_bottom;return 0;}

function set_size(state, ty) {
  var vs = state[1];
  if (vs) {
    var match = vs[1];
    var queue_elem = match[2];
    var left_tot = match[1];
    var size = queue_elem[1];
    var t = vs[2];
    var tok = queue_elem[2];
    if (left_tot < state[12]) {return clear_scan_stack(state);}
    if (! (typeof tok === "number")) {
      switch (tok[0]) {
        case 3:
          var vu = 1 - ty;
          var vv = vu ?
            (queue_elem[1] = state[13] + size | 0,state[1] = t,0) :
            vu;
          return vv;
        case 1:
        case 2:
          var vt = ty ?
            (queue_elem[1] = state[13] + size | 0,state[1] = t,0) :
            ty;
          return vt
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
  var vr = state[14] === state[15] ? 1 : 0;
  return vr ? enqueue_string(state, state[16]) : vr;
}

function pp_open_sys_box(state) {return pp_open_box_gen(state, 0, 3);}

function pp_close_box(state, param) {
  var vp = 1 < state[14] ? 1 : 0;
  if (vp) {
    if (state[14] < state[15]) {
      pp_enqueue(state, [0,0,1,0]);
      set_size(state, 1);
      set_size(state, 0);
    }
    state[14] = state[14] + -1 | 0;
    var vq = 0;
  }
  else var vq = vp;
  return vq;
}

function pp_open_tag(state, tag_name) {
  if (state[22]) {
    state[4] = [0,tag_name,state[4]];
    caml_call1(state[26], tag_name);
  }
  var vo = state[23];
  return vo ? pp_enqueue(state, [0,0,[5,tag_name],0]) : vo;
}

function pp_close_tag(state, param) {
  if (state[23]) {pp_enqueue(state, [0,0,5,0]);}
  var vl = state[22];
  if (vl) {
    var vm = state[4];
    if (vm) {
      var tags = vm[2];
      var tag_name = vm[1];
      caml_call1(state[27], tag_name);
      state[4] = tags;
      return 0;
    }
    var vn = 0;
  }
  else var vn = vl;
  return vn;
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
  var vj = state[4];
  function vk(param) {return pp_close_tag(state, 0);}
  return caml_call2(List[15], vk, vj);
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
  var vi = state[14] < state[15] ? 1 : 0;
  return vi ? enqueue_string_as(state, size, s) : vi;
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
  var vh = state[14] < state[15] ? 1 : 0;
  return vh ? enqueue_advance(state, make_queue_elem(0, 3, 0)) : vh;
}

function pp_print_if_newline(state, param) {
  var vg = state[14] < state[15] ? 1 : 0;
  return vg ? enqueue_advance(state, make_queue_elem(0, 4, 0)) : vg;
}

function pp_print_break(state, width, offset) {
  var vf = state[14] < state[15] ? 1 : 0;
  if (vf) {
    var elem = make_queue_elem(- state[13] | 0, [1,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return vf;
}

function pp_print_space(state, param) {return pp_print_break(state, 1, 0);}

function pp_print_cut(state, param) {return pp_print_break(state, 0, 0);}

function pp_open_tbox(state, param) {
  state[14] = state[14] + 1 | 0;
  var ve = state[14] < state[15] ? 1 : 0;
  if (ve) {
    var elem = make_queue_elem(0, [4,[0,[0,0]]], 0);
    return enqueue_advance(state, elem);
  }
  return ve;
}

function pp_close_tbox(state, param) {
  var vb = 1 < state[14] ? 1 : 0;
  if (vb) {
    var vc = state[14] < state[15] ? 1 : 0;
    if (vc) {
      var elem = make_queue_elem(0, 2, 0);
      enqueue_advance(state, elem);
      state[14] = state[14] + -1 | 0;
      var vd = 0;
    }
    else var vd = vc;
  }
  else var vd = vb;
  return vd;
}

function pp_print_tbreak(state, width, offset) {
  var va = state[14] < state[15] ? 1 : 0;
  if (va) {
    var elem = make_queue_elem(- state[13] | 0, [2,width,offset], width);
    return scan_push(state, 1, elem);
  }
  return va;
}

function pp_print_tab(state, param) {return pp_print_tbreak(state, 0, 0);}

function pp_set_tab(state, param) {
  var u_ = state[14] < state[15] ? 1 : 0;
  if (u_) {
    var elem = make_queue_elem(0, 0, 0);
    return enqueue_advance(state, elem);
  }
  return u_;
}

function pp_set_max_boxes(state, n) {
  var u8 = 1 < n ? 1 : 0;
  var u9 = u8 ? (state[15] = n,0) : u8;
  return u9;
}

function pp_get_max_boxes(state, param) {return state[15];}

function pp_over_max_boxes(state, param) {
  return state[14] === state[15] ? 1 : 0;
}

function pp_set_ellipsis_text(state, s) {state[16] = s;return 0;}

function pp_get_ellipsis_text(state, param) {return state[16];}

function pp_limit(n) {return n < 1000000010 ? n : 1000000009;}

function pp_set_min_space_left(state, n) {
  var u7 = 1 <= n ? 1 : 0;
  if (u7) {
    var n__0 = pp_limit(n);
    state[7] = n__0;
    state[8] = state[6] - state[7] | 0;
    return pp_rinit(state);
  }
  return u7;
}

function pp_set_max_indent(state, n) {
  return pp_set_min_space_left(state, state[6] - n | 0);
}

function pp_get_max_indent(state, param) {return state[8];}

function pp_set_margin(state, n) {
  var u5 = 1 <= n ? 1 : 0;
  if (u5) {
    var n__0 = pp_limit(n);
    state[6] = n__0;
    if (state[8] <= state[6]) var new_max_indent = state
     [8];
    else {
      var u6 = caml_call2(
        Pervasives[5],
        state[6] - state[7] | 0,
        state[6] / 2 | 0
      );
      var new_max_indent = caml_call2(Pervasives[5], u6, 1);
    }
    return pp_set_max_indent(state, new_max_indent);
  }
  return u5;
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
    var u4 = 0 < n__0 ? 1 : 0;
    if (u4) {
      if (80 < n__0) {
        caml_call3(state[17], blank_line, 0, 80);
        var n__1 = n__0 + -80 | 0;
        var n__0 = n__1;
        continue;
      }
      return caml_call3(state[17], blank_line, 0, n__0);
    }
    return u4;
  }
}

function pp_set_formatter_out_channel(state, oc) {
  state[17] = caml_call1(Pervasives[57], oc);
  state[18] = function(param) {return caml_call1(Pervasives[51], oc);};
  state[19] = function(u3) {return display_newline(state, u3);};
  state[20] = function(u2) {return display_blanks(state, u2);};
  state[21] = function(u1) {return display_blanks(state, u1);};
  return 0;
}

function default_pp_mark_open_tag(s) {
  var u0 = caml_call2(Pervasives[16], s, cst__0);
  return caml_call2(Pervasives[16], cst__1, u0);
}

function default_pp_mark_close_tag(s) {
  var uZ = caml_call2(Pervasives[16], s, cst__2);
  return caml_call2(Pervasives[16], cst__3, uZ);
}

function default_pp_print_open_tag(uY) {return 0;}

function default_pp_print_close_tag(uX) {return 0;}

function pp_make_formatter(f, g, h, i, j) {
  var pp_queue = make_queue(0);
  var sys_tok = make_queue_elem(-1, sG, 0);
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
  function uP(uW) {return 0;}
  function uQ(uV) {return 0;}
  var ppf = pp_make_formatter(output, flush, function(uU) {return 0;}, uQ, uP);
  ppf[19] = function(uT) {return display_newline(ppf, uT);};
  ppf[20] = function(uS) {return display_blanks(ppf, uS);};
  ppf[21] = function(uR) {return display_blanks(ppf, uR);};
  return ppf;
}

function formatter_of_out_channel(oc) {
  function uO(param) {return caml_call1(Pervasives[51], oc);}
  return make_formatter(caml_call1(Pervasives[57], oc), uO);
}

function formatter_of_buffer(b) {
  function uM(uN) {return 0;}
  return make_formatter(caml_call1(Buffer[16], b), uM);
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
  function f(uJ, uK, uL) {return symbolic_string(sob, uJ, uK, uL);}
  function g(uI) {return symbolic_flush(sob, uI);}
  function h(uH) {return symbolic_newline(sob, uH);}
  function i(uG) {return symbolic_spaces(sob, uG);}
  function j(uF) {return symbolic_indent(sob, uF);}
  return pp_make_formatter(f, g, h, i, j);
}

function open_hbox(uE) {return pp_open_hbox(std_formatter, uE);}

function open_vbox(uD) {return pp_open_vbox(std_formatter, uD);}

function open_hvbox(uC) {return pp_open_hvbox(std_formatter, uC);}

function open_hovbox(uB) {return pp_open_hovbox(std_formatter, uB);}

function open_box(uA) {return pp_open_box(std_formatter, uA);}

function close_box(uz) {return pp_close_box(std_formatter, uz);}

function open_tag(uy) {return pp_open_tag(std_formatter, uy);}

function close_tag(ux) {return pp_close_tag(std_formatter, ux);}

function print_as(uv, uw) {return pp_print_as(std_formatter, uv, uw);}

function print_string(uu) {return pp_print_string(std_formatter, uu);}

function print_int(ut) {return pp_print_int(std_formatter, ut);}

function print_float(us) {return pp_print_float(std_formatter, us);}

function print_char(ur) {return pp_print_char(std_formatter, ur);}

function print_bool(uq) {return pp_print_bool(std_formatter, uq);}

function print_break(uo, up) {return pp_print_break(std_formatter, uo, up);}

function print_cut(un) {return pp_print_cut(std_formatter, un);}

function print_space(um) {return pp_print_space(std_formatter, um);}

function force_newline(ul) {return pp_force_newline(std_formatter, ul);}

function print_flush(uk) {return pp_print_flush(std_formatter, uk);}

function print_newline(uj) {return pp_print_newline(std_formatter, uj);}

function print_if_newline(ui) {return pp_print_if_newline(std_formatter, ui);}

function open_tbox(uh) {return pp_open_tbox(std_formatter, uh);}

function close_tbox(ug) {return pp_close_tbox(std_formatter, ug);}

function print_tbreak(ue, uf) {return pp_print_tbreak(std_formatter, ue, uf);}

function set_tab(ud) {return pp_set_tab(std_formatter, ud);}

function print_tab(uc) {return pp_print_tab(std_formatter, uc);}

function set_margin(ub) {return pp_set_margin(std_formatter, ub);}

function get_margin(ua) {return pp_get_margin(std_formatter, ua);}

function set_max_indent(t_) {return pp_set_max_indent(std_formatter, t_);}

function get_max_indent(t9) {return pp_get_max_indent(std_formatter, t9);}

function set_max_boxes(t8) {return pp_set_max_boxes(std_formatter, t8);}

function get_max_boxes(t7) {return pp_get_max_boxes(std_formatter, t7);}

function over_max_boxes(t6) {return pp_over_max_boxes(std_formatter, t6);}

function set_ellipsis_text(t5) {
  return pp_set_ellipsis_text(std_formatter, t5);
}

function get_ellipsis_text(t4) {
  return pp_get_ellipsis_text(std_formatter, t4);
}

function set_formatter_out_channel(t3) {
  return pp_set_formatter_out_channel(std_formatter, t3);
}

function set_formatter_out_functions(t2) {
  return pp_set_formatter_out_functions(std_formatter, t2);
}

function get_formatter_out_functions(t1) {
  return pp_get_formatter_out_functions(std_formatter, t1);
}

function set_formatter_output_functions(tZ, t0) {
  return pp_set_formatter_output_functions(std_formatter, tZ, t0);
}

function get_formatter_output_functions(tY) {
  return pp_get_formatter_output_functions(std_formatter, tY);
}

function set_formatter_tag_functions(tX) {
  return pp_set_formatter_tag_functions(std_formatter, tX);
}

function get_formatter_tag_functions(tW) {
  return pp_get_formatter_tag_functions(std_formatter, tW);
}

function set_print_tags(tV) {return pp_set_print_tags(std_formatter, tV);}

function get_print_tags(tU) {return pp_get_print_tags(std_formatter, tU);}

function set_mark_tags(tT) {return pp_set_mark_tags(std_formatter, tT);}

function get_mark_tags(tS) {return pp_get_mark_tags(std_formatter, tS);}

function set_tags(tR) {return pp_set_tags(std_formatter, tR);}

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
      var tP = param__0[2];
      var tQ = param__0[1];
      if (tP) {
        caml_call2(pp_v, ppf, tQ);
        caml_call2(pp_sep, ppf, 0);
        var opt__1 = [0,pp_sep];
        var opt__0 = opt__1;
        var param__0 = tP;
        continue;
      }
      return caml_call2(pp_v, ppf, tQ);
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
      var match = runtime.caml_string_get(s, right[1]);
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
    var tO = left[1] !== len ? 1 : 0;
    return tO ? flush(0) : tO;
  }
}

function compute_tag(output, tag_acc) {
  var buf = caml_call1(Buffer[1], 16);
  var ppf = formatter_of_buffer(buf);
  caml_call2(output, ppf, tag_acc);
  pp_print_flush(ppf, 0);
  var len = caml_call1(Buffer[7], buf);
  return 2 <= len ?
    caml_call3(Buffer[4], buf, 1, len + -2 | 0) :
    caml_call1(Buffer[2], buf);
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
      var tn = acc[2];
      var to = acc[1];
      if (0 === tn[0]) {
        var acc__0 = tn[1];
        output_acc(ppf, to);
        return pp_open_tag(ppf, compute_tag(output_acc, acc__0));
      }
      var acc__1 = tn[1];
      output_acc(ppf, to);
      var tp = compute_tag(output_acc, acc__1);
      var match = caml_call1(CamlinternalFormat[21], tp);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var tq = acc[1];
      if (typeof tq === "number") var switch__1 = 1;
      else if (0 === tq[0]) {
        var ts = tq[2];
        if (typeof ts === "number") var switch__2 = 1;
        else if (1 === ts[0]) {
          var tt = acc[2];
          var tu = ts[2];
          var tv = tq[1];
          var s__0 = tt;
          var size = tu;
          var p__1 = tv;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var tr = acc[2];
        var s = tr;
        var p__0 = tq;
        var switch__0 = 2;
      }
      break;
    case 3:
      var tw = acc[1];
      if (typeof tw === "number") var switch__3 = 1;
      else if (0 === tw[0]) {
        var ty = tw[2];
        if (typeof ty === "number") var switch__4 = 1;
        else if (1 === ty[0]) {
          var tz = acc[2];
          var tA = ty[2];
          var tB = tw[1];
          var c__0 = tz;
          var size__0 = tA;
          var p__3 = tB;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var tx = acc[2];
        var c = tx;
        var p__2 = tw;
        var switch__0 = 3;
      }
      break;
    case 4:
      var tC = acc[1];
      if (typeof tC === "number") var switch__5 = 1;
      else if (0 === tC[0]) {
        var tE = tC[2];
        if (typeof tE === "number") var switch__6 = 1;
        else if (1 === tE[0]) {
          var tF = acc[2];
          var tG = tE[2];
          var tH = tC[1];
          var s__0 = tF;
          var size = tG;
          var p__1 = tH;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var tD = acc[2];
        var s = tD;
        var p__0 = tC;
        var switch__0 = 2;
      }
      break;
    case 5:
      var tI = acc[1];
      if (typeof tI === "number") var switch__7 = 1;
      else if (0 === tI[0]) {
        var tK = tI[2];
        if (typeof tK === "number") var switch__8 = 1;
        else if (1 === tK[0]) {
          var tL = acc[2];
          var tM = tK[2];
          var tN = tI[1];
          var c__0 = tL;
          var size__0 = tM;
          var p__3 = tN;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var tJ = acc[2];
        var c = tJ;
        var p__2 = tI;
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
      var sV = acc[2];
      var sW = acc[1];
      if (0 === sV[0]) {
        var acc__0 = sV[1];
        strput_acc(ppf, sW);
        return pp_open_tag(ppf, compute_tag(strput_acc, acc__0));
      }
      var acc__1 = sV[1];
      strput_acc(ppf, sW);
      var sX = compute_tag(strput_acc, acc__1);
      var match = caml_call1(CamlinternalFormat[21], sX);
      var bty = match[2];
      var indent = match[1];
      return pp_open_box_gen(ppf, indent, bty);
    case 2:
      var sY = acc[1];
      if (typeof sY === "number") var switch__1 = 1;
      else if (0 === sY[0]) {
        var s0 = sY[2];
        if (typeof s0 === "number") var switch__2 = 1;
        else if (1 === s0[0]) {
          var s1 = acc[2];
          var s2 = s0[2];
          var s3 = sY[1];
          var s__0 = s1;
          var size = s2;
          var p__1 = s3;
          var switch__0 = 0;
          var switch__1 = 0;
          var switch__2 = 0;
        }
        else var switch__2 = 1;
        if (switch__2) {var switch__1 = 1;}
      }
      else var switch__1 = 1;
      if (switch__1) {
        var sZ = acc[2];
        var s = sZ;
        var p__0 = sY;
        var switch__0 = 2;
      }
      break;
    case 3:
      var s4 = acc[1];
      if (typeof s4 === "number") var switch__3 = 1;
      else if (0 === s4[0]) {
        var s6 = s4[2];
        if (typeof s6 === "number") var switch__4 = 1;
        else if (1 === s6[0]) {
          var s7 = acc[2];
          var s8 = s6[2];
          var s9 = s4[1];
          var c__0 = s7;
          var size__0 = s8;
          var p__3 = s9;
          var switch__0 = 1;
          var switch__3 = 0;
          var switch__4 = 0;
        }
        else var switch__4 = 1;
        if (switch__4) {var switch__3 = 1;}
      }
      else var switch__3 = 1;
      if (switch__3) {
        var s5 = acc[2];
        var c = s5;
        var p__2 = s4;
        var switch__0 = 3;
      }
      break;
    case 4:
      var s_ = acc[1];
      if (typeof s_ === "number") var switch__5 = 1;
      else if (0 === s_[0]) {
        var tb = s_[2];
        if (typeof tb === "number") var switch__6 = 1;
        else if (1 === tb[0]) {
          var tc = acc[2];
          var td = tb[2];
          var te = s_[1];
          var s__0 = tc;
          var size = td;
          var p__1 = te;
          var switch__0 = 0;
          var switch__5 = 0;
          var switch__6 = 0;
        }
        else var switch__6 = 1;
        if (switch__6) {var switch__5 = 1;}
      }
      else var switch__5 = 1;
      if (switch__5) {
        var ta = acc[2];
        var s = ta;
        var p__0 = s_;
        var switch__0 = 2;
      }
      break;
    case 5:
      var tf = acc[1];
      if (typeof tf === "number") var switch__7 = 1;
      else if (0 === tf[0]) {
        var th = tf[2];
        if (typeof th === "number") var switch__8 = 1;
        else if (1 === th[0]) {
          var ti = acc[2];
          var tj = th[2];
          var tk = tf[1];
          var c__0 = ti;
          var size__0 = tj;
          var p__3 = tk;
          var switch__0 = 1;
          var switch__7 = 0;
          var switch__8 = 0;
        }
        else var switch__8 = 1;
        if (switch__8) {var switch__7 = 1;}
      }
      else var switch__7 = 1;
      if (switch__7) {
        var tg = acc[2];
        var c = tg;
        var p__2 = tf;
        var switch__0 = 3;
      }
      break;
    case 6:
      var tl = acc[1];
      if (! (typeof tl === "number") && 0 === tl[0]) {
        var tm = tl[2];
        if (! (typeof tm === "number") && 1 === tm[0]) {
          var f__1 = acc[2];
          var size__1 = tm[2];
          var p__4 = tl[1];
          strput_acc(ppf, p__4);
          return pp_print_as_size(ppf, size__1, caml_call1(f__1, 0));
        }
      }
      var f__0 = acc[2];
      strput_acc(ppf, tl);
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
  var sT = 0;
  function sU(ppf, acc) {output_acc(ppf, acc);return caml_call1(k, ppf);}
  return caml_call4(CamlinternalFormat[7], sU, ppf, sT, fmt);
}

function ikfprintf(k, ppf, param) {
  var fmt = param[1];
  return caml_call3(CamlinternalFormat[8], k, ppf, fmt);
}

function fprintf(ppf) {
  function sQ(sS) {return 0;}
  return function(sR) {return kfprintf(sQ, ppf, sR);};
}

function ifprintf(ppf) {
  function sN(sP) {return 0;}
  return function(sO) {return ikfprintf(sN, ppf, sO);};
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

function set_all_formatter_output_functions(sJ, sK, sL, sM) {
  return pp_set_all_formatter_output_functions(std_formatter, sJ, sK, sL, sM);
}

function get_all_formatter_output_functions(sI) {
  return pp_get_all_formatter_output_functions(std_formatter, sI);
}

function bprintf(b, param) {
  var fmt = param[1];
  function k(ppf, acc) {output_acc(ppf, acc);return pp_flush_queue(ppf, 0);}
  var sH = formatter_of_buffer(b);
  return caml_call4(CamlinternalFormat[7], k, sH, 0, fmt);
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

runtime.caml_register_global(15, Format, "Format");


module.exports = global.jsoo_runtime.caml_get_global_data().Format;