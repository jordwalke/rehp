/**
 * Js_of_ocaml__Dom_html
 * @providesModule Js_of_ocaml__Dom_html
 */
"use strict";
var Js_of_ocaml__Dom = require('Js_of_ocaml__Dom.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var Uchar = require('Uchar.js');
var Not_found = require('Not_found.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_html_escape = runtime["caml_js_html_escape"];
var caml_js_to_string = runtime["caml_js_to_string"];
var string = runtime["caml_new_string"];
var caml_string_compare = runtime["caml_string_compare"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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
var cst_a__1 = string("a");
var cst_area__1 = string("area");
var cst_audio__1 = string("audio");
var cst_base__1 = string("base");
var cst_blockquote__1 = string("blockquote");
var cst_body__1 = string("body");
var cst_br__1 = string("br");
var cst_button__1 = string("button");
var cst_canvas__1 = string("canvas");
var cst_caption__1 = string("caption");
var cst_col__1 = string("col");
var cst_colgroup__1 = string("colgroup");
var cst_del__1 = string("del");
var cst_div__1 = string("div");
var cst_dl__1 = string("dl");
var cst_embed__1 = string("embed");
var cst_fieldset__1 = string("fieldset");
var cst_form__1 = string("form");
var cst_frame__1 = string("frame");
var cst_frameset__1 = string("frameset");
var cst_h1__1 = string("h1");
var cst_h2__1 = string("h2");
var cst_h3__1 = string("h3");
var cst_h4__1 = string("h4");
var cst_h5__1 = string("h5");
var cst_h6__1 = string("h6");
var cst_head__1 = string("head");
var cst_hr__1 = string("hr");
var cst_html__1 = string("html");
var cst_iframe__1 = string("iframe");
var cst_img__1 = string("img");
var cst_input__2 = string("input");
var cst_ins__1 = string("ins");
var cst_label__1 = string("label");
var cst_legend__1 = string("legend");
var cst_li__1 = string("li");
var cst_link__1 = string("link");
var cst_map__1 = string("map");
var cst_meta__1 = string("meta");
var cst_object__1 = string("object");
var cst_ol__1 = string("ol");
var cst_optgroup__1 = string("optgroup");
var cst_option__1 = string("option");
var cst_p__1 = string("p");
var cst_param__1 = string("param");
var cst_pre__1 = string("pre");
var cst_q__1 = string("q");
var cst_script__1 = string("script");
var cst_select__2 = string("select");
var cst_style__1 = string("style");
var cst_table__1 = string("table");
var cst_tbody__1 = string("tbody");
var cst_td__1 = string("td");
var cst_textarea__1 = string("textarea");
var cst_tfoot__1 = string("tfoot");
var cst_th__1 = string("th");
var cst_thead__1 = string("thead");
var cst_title__1 = string("title");
var cst_tr__1 = string("tr");
var cst_ul__1 = string("ul");
var cst_video__1 = string("video");
var cst_KeyH = string("KeyH");
var cst_Digit6 = string("Digit6");
var cst_BrowserRefresh = string("BrowserRefresh");
var cst_Backslash = string("Backslash");
var cst_AltLeft = string("AltLeft");
var cst_AltRight = string("AltRight");
var cst_ArrowDown = string("ArrowDown");
var cst_ArrowLeft = string("ArrowLeft");
var cst_ArrowRight = string("ArrowRight");
var cst_ArrowUp = string("ArrowUp");
var cst_Backquote = string("Backquote");
var cst_Backspace = string("Backspace");
var cst_BracketLeft = string("BracketLeft");
var cst_BracketRight = string("BracketRight");
var cst_BrowserBack = string("BrowserBack");
var cst_BrowserFavorites = string("BrowserFavorites");
var cst_BrowserForward = string("BrowserForward");
var cst_BrowserHome = string("BrowserHome");
var cst_Delete = string("Delete");
var cst_BrowserSearch = string("BrowserSearch");
var cst_BrowserStop = string("BrowserStop");
var cst_CapsLock = string("CapsLock");
var cst_Comma = string("Comma");
var cst_ContextMenu = string("ContextMenu");
var cst_ControlLeft = string("ControlLeft");
var cst_ControlRight = string("ControlRight");
var cst_Digit0 = string("Digit0");
var cst_Digit1 = string("Digit1");
var cst_Digit2 = string("Digit2");
var cst_Digit3 = string("Digit3");
var cst_Digit4 = string("Digit4");
var cst_Digit5 = string("Digit5");
var cst_F6 = string("F6");
var cst_F1 = string("F1");
var cst_Digit7 = string("Digit7");
var cst_Digit8 = string("Digit8");
var cst_Digit9 = string("Digit9");
var cst_End = string("End");
var cst_Enter = string("Enter");
var cst_Equal = string("Equal");
var cst_Escape = string("Escape");
var cst_F10 = string("F10");
var cst_F11 = string("F11");
var cst_F12 = string("F12");
var cst_F2 = string("F2");
var cst_F3 = string("F3");
var cst_F4 = string("F4");
var cst_F5 = string("F5");
var cst_KeyA = string("KeyA");
var cst_F7 = string("F7");
var cst_F8 = string("F8");
var cst_F9 = string("F9");
var cst_Home = string("Home");
var cst_Insert = string("Insert");
var cst_IntlBackslash = string("IntlBackslash");
var cst_IntlYen = string("IntlYen");
var cst_KeyB = string("KeyB");
var cst_KeyC = string("KeyC");
var cst_KeyD = string("KeyD");
var cst_KeyE = string("KeyE");
var cst_KeyF = string("KeyF");
var cst_KeyG = string("KeyG");
var cst_Numpad4 = string("Numpad4");
var cst_KeyX = string("KeyX");
var cst_KeyP = string("KeyP");
var cst_KeyI = string("KeyI");
var cst_KeyJ = string("KeyJ");
var cst_KeyK = string("KeyK");
var cst_KeyL = string("KeyL");
var cst_KeyM = string("KeyM");
var cst_KeyN = string("KeyN");
var cst_KeyO = string("KeyO");
var cst_KeyQ = string("KeyQ");
var cst_KeyR = string("KeyR");
var cst_KeyS = string("KeyS");
var cst_KeyT = string("KeyT");
var cst_KeyU = string("KeyU");
var cst_KeyV = string("KeyV");
var cst_KeyW = string("KeyW");
var cst_MetaRight = string("MetaRight");
var cst_KeyY = string("KeyY");
var cst_KeyZ = string("KeyZ");
var cst_MediaPlayPause = string("MediaPlayPause");
var cst_MediaStop = string("MediaStop");
var cst_MediaTrackNext = string("MediaTrackNext");
var cst_MediaTrackPrevious = string("MediaTrackPrevious");
var cst_MetaLeft = string("MetaLeft");
var cst_Minus = string("Minus");
var cst_NumLock = string("NumLock");
var cst_Numpad0 = string("Numpad0");
var cst_Numpad1 = string("Numpad1");
var cst_Numpad2 = string("Numpad2");
var cst_Numpad3 = string("Numpad3");
var cst_PageUp = string("PageUp");
var cst_NumpadDivide = string("NumpadDivide");
var cst_Numpad5 = string("Numpad5");
var cst_Numpad6 = string("Numpad6");
var cst_Numpad7 = string("Numpad7");
var cst_Numpad8 = string("Numpad8");
var cst_Numpad9 = string("Numpad9");
var cst_NumpadAdd = string("NumpadAdd");
var cst_NumpadDecimal = string("NumpadDecimal");
var cst_NumpadEnter = string("NumpadEnter");
var cst_NumpadEqual = string("NumpadEqual");
var cst_NumpadMultiply = string("NumpadMultiply");
var cst_NumpadSubtract = string("NumpadSubtract");
var cst_OSLeft = string("OSLeft");
var cst_OSRight = string("OSRight");
var cst_PageDown = string("PageDown");
var cst_ShiftRight = string("ShiftRight");
var cst_Pause = string("Pause");
var cst_Period = string("Period");
var cst_PrintScreen = string("PrintScreen");
var cst_Quote = string("Quote");
var cst_ScrollLock = string("ScrollLock");
var cst_Semicolon = string("Semicolon");
var cst_ShiftLeft = string("ShiftLeft");
var cst_Slash = string("Slash");
var cst_Space = string("Space");
var cst_Tab = string("Tab");
var cst_VolumeDown = string("VolumeDown");
var cst_VolumeMute = string("VolumeMute");
var cst_VolumeUp = string("VolumeUp");
var cst_mouseout__0 = string("mouseout");
var cst_mouseover__0 = string("mouseover");
var cst_video__0 = string("video");
var cst_audio__0 = string("audio");
var cst_ul__0 = string("ul");
var cst_tr__0 = string("tr");
var cst_title__0 = string("title");
var cst_thead__0 = string("thead");
var cst_th__0 = string("th");
var cst_tfoot__0 = string("tfoot");
var cst_textarea__0 = string("textarea");
var cst_td__0 = string("td");
var cst_tbody__0 = string("tbody");
var cst_table__0 = string("table");
var cst_style__0 = string("style");
var cst_select__1 = string("select");
var cst_script__0 = string("script");
var cst_q__0 = string("q");
var cst_pre__0 = string("pre");
var cst_param__0 = string("param");
var cst_p__0 = string("p");
var cst_option__0 = string("option");
var cst_optgroup__0 = string("optgroup");
var cst_ol__0 = string("ol");
var cst_object__0 = string("object");
var cst_meta__0 = string("meta");
var cst_map__0 = string("map");
var cst_link__0 = string("link");
var cst_li__0 = string("li");
var cst_legend__0 = string("legend");
var cst_label__0 = string("label");
var cst_ins__0 = string("ins");
var cst_input__1 = string("input");
var cst_img__0 = string("img");
var cst_iframe__0 = string("iframe");
var cst_html__0 = string("html");
var cst_hr__0 = string("hr");
var cst_head__0 = string("head");
var cst_h6__0 = string("h6");
var cst_h5__0 = string("h5");
var cst_h4__0 = string("h4");
var cst_h3__0 = string("h3");
var cst_h2__0 = string("h2");
var cst_h1__0 = string("h1");
var cst_frame__0 = string("frame");
var cst_frameset__0 = string("frameset");
var cst_form__0 = string("form");
var cst_embed__0 = string("embed");
var cst_fieldset__0 = string("fieldset");
var cst_dl__0 = string("dl");
var cst_div__0 = string("div");
var cst_del__0 = string("del");
var cst_colgroup__0 = string("colgroup");
var cst_col__0 = string("col");
var cst_caption__0 = string("caption");
var cst_canvas__0 = string("canvas");
var cst_button__0 = string("button");
var cst_br__0 = string("br");
var cst_body__0 = string("body");
var cst_blockquote__0 = string("blockquote");
var cst_base__0 = string("base");
var cst_area__0 = string("area");
var cst_a__0 = string("a");
var cst_canvas = string("canvas");
var cst_video = string("video");
var cst_audio = string("audio");
var cst_iframe = string("iframe");
var cst_frame = string("frame");
var cst_frameset = string("frameset");
var cst_address = string("address");
var cst_noscript = string("noscript");
var cst_dt = string("dt");
var cst_dd = string("dd");
var cst_abbr = string("abbr");
var cst_var = string("var");
var cst_kbd = string("kbd");
var cst_samp = string("samp");
var cst_code = string("code");
var cst_dfn = string("dfn");
var cst_cite = string("cite");
var cst_strong = string("strong");
var cst_em = string("em");
var cst_small = string("small");
var cst_big = string("big");
var cst_b = string("b");
var cst_i = string("i");
var cst_tt = string("tt");
var cst_span = string("span");
var cst_sup = string("sup");
var cst_sub = string("sub");
var cst_td = string("td");
var cst_th = string("th");
var cst_tr = string("tr");
var cst_tbody = string("tbody");
var cst_tfoot = string("tfoot");
var cst_thead = string("thead");
var cst_colgroup = string("colgroup");
var cst_col = string("col");
var cst_caption = string("caption");
var cst_table = string("table");
var cst_script = string("script");
var cst_area = string("area");
var cst_map = string("map");
var cst_param = string("param");
var cst_object = string("object");
var cst_img = string("img");
var cst_a = string("a");
var cst_del = string("del");
var cst_ins = string("ins");
var cst_hr = string("hr");
var cst_br = string("br");
var cst_pre = string("pre");
var cst_blockquote = string("blockquote");
var cst_q = string("q");
var cst_h6 = string("h6");
var cst_h5 = string("h5");
var cst_h4 = string("h4");
var cst_h3 = string("h3");
var cst_h2 = string("h2");
var cst_h1 = string("h1");
var cst_p = string("p");
var cst_embed = string("embed");
var cst_div = string("div");
var cst_li = string("li");
var cst_dl = string("dl");
var cst_ol = string("ol");
var cst_ul = string("ul");
var cst_legend = string("legend");
var cst_fieldset = string("fieldset");
var cst_label = string("label");
var cst_button = string("button");
var cst_textarea = string("textarea");
var cst_input__0 = string("input");
var cst_select__0 = string("select");
var cst_option = string("option");
var cst_optgroup = string("optgroup");
var cst_form = string("form");
var cst_body = string("body");
var cst_style = string("style");
var cst_base = string("base");
var cst_meta = string("meta");
var cst_title = string("title");
var cst_link = string("link");
var cst_head = string("head");
var cst_html = string("html");
var cst_click = string("click");
var cst_dblclick = string("dblclick");
var cst_mousedown = string("mousedown");
var cst_mouseup = string("mouseup");
var cst_mouseover = string("mouseover");
var cst_mousemove = string("mousemove");
var cst_mouseout = string("mouseout");
var cst_keypress = string("keypress");
var cst_keydown = string("keydown");
var cst_keyup = string("keyup");
var cst_mousewheel = string("mousewheel");
var cst_DOMMouseScroll = string("DOMMouseScroll");
var cst_touchstart = string("touchstart");
var cst_touchmove = string("touchmove");
var cst_touchend = string("touchend");
var cst_touchcancel = string("touchcancel");
var cst_dragstart = string("dragstart");
var cst_dragend = string("dragend");
var cst_dragenter = string("dragenter");
var cst_dragover = string("dragover");
var cst_dragleave = string("dragleave");
var cst_drag = string("drag");
var cst_drop = string("drop");
var cst_hashchange = string("hashchange");
var cst_change = string("change");
var cst_input = string("input");
var cst_timeupdate = string("timeupdate");
var cst_submit = string("submit");
var cst_scroll = string("scroll");
var cst_focus = string("focus");
var cst_blur = string("blur");
var cst_load = string("load");
var cst_unload = string("unload");
var cst_beforeunload = string("beforeunload");
var cst_resize = string("resize");
var cst_orientationchange = string("orientationchange");
var cst_popstate = string("popstate");
var cst_error = string("error");
var cst_abort = string("abort");
var cst_select = string("select");
var cst_online = string("online");
var cst_offline = string("offline");
var cst_checking = string("checking");
var cst_noupdate = string("noupdate");
var cst_downloading = string("downloading");
var cst_progress = string("progress");
var cst_updateready = string("updateready");
var cst_cached = string("cached");
var cst_obsolete = string("obsolete");
var cst_DOMContentLoaded = string("DOMContentLoaded");
var cst_animationstart = string("animationstart");
var cst_animationend = string("animationend");
var cst_animationiteration = string("animationiteration");
var cst_animationcancel = string("animationcancel");
var cst_canplay = string("canplay");
var cst_canplaythrough = string("canplaythrough");
var cst_durationchange = string("durationchange");
var cst_emptied = string("emptied");
var cst_ended = string("ended");
var cst_loadeddata = string("loadeddata");
var cst_loadedmetadata = string("loadedmetadata");
var cst_loadstart = string("loadstart");
var cst_pause = string("pause");
var cst_play = string("play");
var cst_playing = string("playing");
var cst_ratechange = string("ratechange");
var cst_seeked = string("seeked");
var cst_seeking = string("seeking");
var cst_stalled = string("stalled");
var cst_suspend = string("suspend");
var cst_volumechange = string("volumechange");
var cst_waiting = string("waiting");
var cst_Js_of_ocaml_Dom_html_Canvas_not_available = string(
  "Js_of_ocaml__Dom_html.Canvas_not_available"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var List = global_data["List_"];
var Not_found = global_data["Not_found"];
var Uchar = global_data["Uchar"];
var Assert_failure = global_data["Assert_failure"];
var Printf = global_data["Printf"];
var Pervasives = global_data["Pervasives"];
var Js_of_ocaml_Dom = global_data["Js_of_ocaml__Dom"];
var g = [0,string("lib/js_of_ocaml/dom_html.ml"),2704,58];
var f = [0,string("lib/js_of_ocaml/dom_html.ml"),2703,61];
var b = [
  0,
  [11,string("getElementById_exn: "),[3,0,[11,string(" not found"),0]]],
  string("getElementById_exn: %S not found")
];
var onIE = runtime["caml_js_on_ie"](0) | 0;
var no_handler = Js_of_ocaml_Dom[9];
var handler = Js_of_ocaml_Dom[10];
var full_handler = Js_of_ocaml_Dom[11];
var invoke_handler = Js_of_ocaml_Dom[12];
var click = call1(Js_of_ocaml_Dom[14][1], cst_click);
var dblclick = call1(Js_of_ocaml_Dom[14][1], cst_dblclick);
var mousedown = call1(Js_of_ocaml_Dom[14][1], cst_mousedown);
var mouseup = call1(Js_of_ocaml_Dom[14][1], cst_mouseup);
var mouseover = call1(Js_of_ocaml_Dom[14][1], cst_mouseover);
var mousemove = call1(Js_of_ocaml_Dom[14][1], cst_mousemove);
var mouseout = call1(Js_of_ocaml_Dom[14][1], cst_mouseout);
var keypress = call1(Js_of_ocaml_Dom[14][1], cst_keypress);
var keydown = call1(Js_of_ocaml_Dom[14][1], cst_keydown);
var keyup = call1(Js_of_ocaml_Dom[14][1], cst_keyup);
var mousewheel = call1(Js_of_ocaml_Dom[14][1], cst_mousewheel);
var DOMMouseScroll = call1(Js_of_ocaml_Dom[14][1], cst_DOMMouseScroll);
var touchstart = call1(Js_of_ocaml_Dom[14][1], cst_touchstart);
var touchmove = call1(Js_of_ocaml_Dom[14][1], cst_touchmove);
var touchend = call1(Js_of_ocaml_Dom[14][1], cst_touchend);
var touchcancel = call1(Js_of_ocaml_Dom[14][1], cst_touchcancel);
var dragstart = call1(Js_of_ocaml_Dom[14][1], cst_dragstart);
var dragend = call1(Js_of_ocaml_Dom[14][1], cst_dragend);
var dragenter = call1(Js_of_ocaml_Dom[14][1], cst_dragenter);
var dragover = call1(Js_of_ocaml_Dom[14][1], cst_dragover);
var dragleave = call1(Js_of_ocaml_Dom[14][1], cst_dragleave);
var drag = call1(Js_of_ocaml_Dom[14][1], cst_drag);
var drop = call1(Js_of_ocaml_Dom[14][1], cst_drop);
var hashchange = call1(Js_of_ocaml_Dom[14][1], cst_hashchange);
var change = call1(Js_of_ocaml_Dom[14][1], cst_change);
var input = call1(Js_of_ocaml_Dom[14][1], cst_input);
var timeupdate = call1(Js_of_ocaml_Dom[14][1], cst_timeupdate);
var submit = call1(Js_of_ocaml_Dom[14][1], cst_submit);
var scroll = call1(Js_of_ocaml_Dom[14][1], cst_scroll);
var focus = call1(Js_of_ocaml_Dom[14][1], cst_focus);
var blur = call1(Js_of_ocaml_Dom[14][1], cst_blur);
var load = call1(Js_of_ocaml_Dom[14][1], cst_load);
var unload = call1(Js_of_ocaml_Dom[14][1], cst_unload);
var beforeunload = call1(Js_of_ocaml_Dom[14][1], cst_beforeunload);
var resize = call1(Js_of_ocaml_Dom[14][1], cst_resize);
var orientationchange = call1(Js_of_ocaml_Dom[14][1], cst_orientationchange);
var popstate = call1(Js_of_ocaml_Dom[14][1], cst_popstate);
var error = call1(Js_of_ocaml_Dom[14][1], cst_error);
var abort = call1(Js_of_ocaml_Dom[14][1], cst_abort);
var select = call1(Js_of_ocaml_Dom[14][1], cst_select);
var online = call1(Js_of_ocaml_Dom[14][1], cst_online);
var offline = call1(Js_of_ocaml_Dom[14][1], cst_offline);
var checking = call1(Js_of_ocaml_Dom[14][1], cst_checking);
var noupdate = call1(Js_of_ocaml_Dom[14][1], cst_noupdate);
var downloading = call1(Js_of_ocaml_Dom[14][1], cst_downloading);
var progress = call1(Js_of_ocaml_Dom[14][1], cst_progress);
var updateready = call1(Js_of_ocaml_Dom[14][1], cst_updateready);
var cached = call1(Js_of_ocaml_Dom[14][1], cst_cached);
var obsolete = call1(Js_of_ocaml_Dom[14][1], cst_obsolete);
var domContentLoaded = call1(Js_of_ocaml_Dom[14][1], cst_DOMContentLoaded);
var animationstart = call1(Js_of_ocaml_Dom[14][1], cst_animationstart);
var animationend = call1(Js_of_ocaml_Dom[14][1], cst_animationend);
var animationiteration = call1(Js_of_ocaml_Dom[14][1], cst_animationiteration);
var animationcancel = call1(Js_of_ocaml_Dom[14][1], cst_animationcancel);
var canplay = call1(Js_of_ocaml_Dom[14][1], cst_canplay);
var canplaythrough = call1(Js_of_ocaml_Dom[14][1], cst_canplaythrough);
var durationchange = call1(Js_of_ocaml_Dom[14][1], cst_durationchange);
var emptied = call1(Js_of_ocaml_Dom[14][1], cst_emptied);
var ended = call1(Js_of_ocaml_Dom[14][1], cst_ended);
var loadeddata = call1(Js_of_ocaml_Dom[14][1], cst_loadeddata);
var loadedmetadata = call1(Js_of_ocaml_Dom[14][1], cst_loadedmetadata);
var loadstart = call1(Js_of_ocaml_Dom[14][1], cst_loadstart);
var pause = call1(Js_of_ocaml_Dom[14][1], cst_pause);
var play = call1(Js_of_ocaml_Dom[14][1], cst_play);
var playing = call1(Js_of_ocaml_Dom[14][1], cst_playing);
var ratechange = call1(Js_of_ocaml_Dom[14][1], cst_ratechange);
var seeked = call1(Js_of_ocaml_Dom[14][1], cst_seeked);
var seeking = call1(Js_of_ocaml_Dom[14][1], cst_seeking);
var stalled = call1(Js_of_ocaml_Dom[14][1], cst_stalled);
var suspend = call1(Js_of_ocaml_Dom[14][1], cst_suspend);
var volumechange = call1(Js_of_ocaml_Dom[14][1], cst_volumechange);
var waiting = call1(Js_of_ocaml_Dom[14][1], cst_waiting);
var make = Js_of_ocaml_Dom[14][1];
var Event = [
  0,
  click,
  dblclick,
  mousedown,
  mouseup,
  mouseover,
  mousemove,
  mouseout,
  keypress,
  keydown,
  keyup,
  mousewheel,
  DOMMouseScroll,
  touchstart,
  touchmove,
  touchend,
  touchcancel,
  dragstart,
  dragend,
  dragenter,
  dragover,
  dragleave,
  drag,
  drop,
  hashchange,
  change,
  input,
  timeupdate,
  submit,
  scroll,
  focus,
  blur,
  load,
  unload,
  beforeunload,
  resize,
  orientationchange,
  popstate,
  error,
  abort,
  select,
  online,
  offline,
  checking,
  noupdate,
  downloading,
  progress,
  updateready,
  cached,
  obsolete,
  domContentLoaded,
  animationstart,
  animationend,
  animationiteration,
  animationcancel,
  canplay,
  canplaythrough,
  durationchange,
  emptied,
  ended,
  loadeddata,
  loadedmetadata,
  loadstart,
  pause,
  play,
  playing,
  ratechange,
  seeked,
  seeking,
  stalled,
  suspend,
  volumechange,
  waiting,
  make
];
var addEventListener = Js_of_ocaml_Dom[15];
var removeEventListener = Js_of_ocaml_Dom[16];
var d = "2d";

function location_origin(loc) {
  function dg(o) {return o;}
  function dh(param) {
    function dk(x) {return call1(caml_get_public_method(x, 6510168, 67), x);}
    var protocol = function(t13, param) {return t13.protocol;}(loc, dk);
    function dl(x) {
      return call1(caml_get_public_method(x, -757983821, 68), x);
    }
    var hostname = function(t12, param) {return t12.hostname;}(loc, dl);
    function dm(x) {
      return call1(caml_get_public_method(x, -899906687, 69), x);
    }
    var port = function(t11, param) {return t11.port;}(loc, dm);
    function dn(x) {
      return call1(caml_get_public_method(x, 520590566, 70), x);
    }
    if (0 === function(t9, param) {return t9.length;}(protocol, dn)) {
      var dp = function(x) {
        return call1(caml_get_public_method(x, 520590566, 71), x);
      };
      if (0 === function(t10, param) {return t10.length;}(hostname, dp)) {return "";}
    }
    function dq(x) {
      return call1(caml_get_public_method(x, -491534073, 72), x);
    }
    var dr = "//";
    var origin = function(t8, t6, t7, param) {return t8.concat(t6, t7);}(protocol, dr, hostname, dq
    );
    function ds(x) {
      return call1(caml_get_public_method(x, 520590566, 73), x);
    }
    if (0 < function(t5, param) {return t5.length;}(port, ds)) {
      var dt = function(x) {
        return call1(caml_get_public_method(x, -491534073, 74), x);
      };
      var du = function(x) {
        return call1(caml_get_public_method(x, -899906687, 75), x);
      };
      var dv = function(t1, param) {return t1.port;}(loc, du);
      var dw = ":";
      return function(t4, t2, t3, param) {return t4.concat(t2, t3);}(origin, dw, dv, dt
      );
    }
    return origin;
  }
  function di(x) {return call1(caml_get_public_method(x, -889120282, 76), x);}
  var dj = function(t0, param) {return t0.origin;}(loc, di);
  return call3(Js_of_ocaml_Js[6][7], dj, dh, dg);
}

var window = Js_of_ocaml_Js[50][1];

function a(x) {return call1(caml_get_public_method(x, 454225691, 77), x);}

var document = function(t14, param) {return t14.document;}(window, a);

function getElementById(id) {
  function db(pnode) {return pnode;}
  function dc(param) {throw runtime["caml_wrap_thrown_exception"](Not_found);}
  function dd(x) {return call1(caml_get_public_method(x, -332188296, 78), x);}
  var de = id.toString();
  var df = function(t16, t15, param) {return t16.getElementById(t15);}(document, de, dd
  );
  return call3(Js_of_ocaml_Js[5][7], df, dc, db);
}

function getElementById_exn(id) {
  function c6(pnode) {return pnode;}
  function c7(param) {
    var da = call2(Printf[4], b, id);
    return call1(Pervasives[2], da);
  }
  function c8(x) {return call1(caml_get_public_method(x, -332188296, 79), x);}
  var c9 = id.toString();
  var c_ = function(t18, t17, param) {return t18.getElementById(t17);}(document, c9, c8
  );
  return call3(Js_of_ocaml_Js[5][7], c_, c7, c6);
}

function getElementById_opt(id) {
  function c3(x) {return call1(caml_get_public_method(x, -332188296, 80), x);}
  var c4 = id.toString();
  var c5 = function(t20, t19, param) {return t20.getElementById(t19);}(document, c4, c3
  );
  return call1(Js_of_ocaml_Js[5][10], c5);
}

function getElementById_coerce(id, coerce) {
  function cX(e) {
    var c2 = call1(coerce, e);
    return call1(Js_of_ocaml_Js[5][10], c2);
  }
  function cY(param) {return 0;}
  function cZ(x) {return call1(caml_get_public_method(x, -332188296, 81), x);}
  var c0 = id.toString();
  var c1 = function(t22, t21, param) {return t22.getElementById(t21);}(document, c0, cZ
  );
  return call3(Js_of_ocaml_Js[5][7], c1, cY, cX);
}

function opt_iter(x, f) {if (x) {var v = x[1];return call1(f, v);}return 0;}

function createElement(doc, name) {
  function cV(x) {return call1(caml_get_public_method(x, -292059360, 82), x);}
  var cW = name.toString();
  return function(t24, t23, param) {return t24.createElement(t23);}(doc, cW, cV
  );
}

function unsafeCreateElement(doc, name) {return createElement(doc, name);}

var createElementSyntax = [0,785140586];

function unsafeCreateElementEx(type, name, doc, elt) {
  for (; ; ) {
    if (0 === type) {if (0 === name) {return createElement(doc, elt);}}
    var cm = createElementSyntax[1];
    if (785140586 === cm) {
      try {
        var cp = function(x) {
          return call1(caml_get_public_method(x, -292059360, 83), x);
        };
        var cq = '<input name="x">';
        var el = function(t51, t50, param) {return t51.createElement(t50);}(document, cq, cp
        );
        var cr = "input";
        var cs = function(x) {
          return call1(caml_get_public_method(x, 946097238, 84), x);
        };
        var ct = function(x) {
          return call1(caml_get_public_method(x, 578170309, 85), x);
        };
        var cu = function(t47, param) {return t47.tagName;}(el, ct);
        var cv = function(t48, param) {return t48.toLowerCase();}(cu, cs) === cr ?
          1 :
          0;
        if (cv) {
          var cw = "x";
          var cx = function(x) {
            return call1(caml_get_public_method(x, -922783157, 86), x);
          };
          var cy = function(t49, param) {return t49.name;}(el, cx) === cw ?
            1 :
            0;
        }
        else var cy = cv;
        var cn = cy;
      }
      catch(cU) {var cn = 0;}
      var co = cn ? 982028505 : -1003883683;
      createElementSyntax[1] = co;
      continue;
    }
    if (982028505 <= cm) {
      var cz = 0;
      var cA = Js_of_ocaml_Js[14];
      var a = function(t46, param) {return new t46();}(cA, cz);
      var cB = function(x) {
        return call1(caml_get_public_method(x, -231927987, 87), x);
      };
      var cC = elt.toString();
      var cD = "<";
      (function(t45, t43, t44, param) {return t45.push(t43, t44);}(a, cD, cC, cB
       ));
      opt_iter(
        type,
        function(t) {
          function cQ(x) {
            return call1(caml_get_public_method(x, -231927986, 88), x);
          }
          var cR = '"';
          var cS = caml_js_html_escape(t);
          var cT = ' type="';
          (function(t42, t39, t40, t41, param) {return t42.push(t39, t40, t41);
           }(a, cT, cS, cR, cQ
           ));
          return 0;
        }
      );
      opt_iter(
        name,
        function(n) {
          function cM(x) {
            return call1(caml_get_public_method(x, -231927986, 89), x);
          }
          var cN = '"';
          var cO = caml_js_html_escape(n);
          var cP = ' name="';
          (function(t38, t35, t36, t37, param) {return t38.push(t35, t36, t37);
           }(a, cP, cO, cN, cM
           ));
          return 0;
        }
      );
      var cE = function(x) {
        return call1(caml_get_public_method(x, -899608102, 90), x);
      };
      var cF = ">";
      (function(t34, t33, param) {return t34.push(t33);}(a, cF, cE));
      var cG = function(x) {
        return call1(caml_get_public_method(x, -292059360, 91), x);
      };
      var cH = function(x) {
        return call1(caml_get_public_method(x, -966446102, 92), x);
      };
      var cI = "";
      var cJ = function(t30, t29, param) {return t30.join(t29);}(a, cI, cH);
      return function(t32, t31, param) {return t32.createElement(t31);}(doc, cJ, cG
      );
    }
    var res = createElement(doc, elt);
    opt_iter(
      type,
      function(t) {
        function cL(x) {
          return call1(caml_get_public_method(x, 1707673, 93), x);
        }
        return function(t28, t27, param) {t28.type = t27;return 0;}(res, t, cL
        );
      }
    );
    opt_iter(
      name,
      function(n) {
        function cK(x) {
          return call1(caml_get_public_method(x, -922783157, 94), x);
        }
        return function(t26, t25, param) {t26.name = t25;return 0;}(res, n, cK
        );
      }
    );
    return res;
  }
}

function createHtml(doc) {return unsafeCreateElement(doc, cst_html);}

function createHead(doc) {return unsafeCreateElement(doc, cst_head);}

function createLink(doc) {return unsafeCreateElement(doc, cst_link);}

function createTitle(doc) {return unsafeCreateElement(doc, cst_title);}

function createMeta(doc) {return unsafeCreateElement(doc, cst_meta);}

function createBase(doc) {return unsafeCreateElement(doc, cst_base);}

function createStyle(doc) {return unsafeCreateElement(doc, cst_style);}

function createBody(doc) {return unsafeCreateElement(doc, cst_body);}

function createForm(doc) {return unsafeCreateElement(doc, cst_form);}

function createOptgroup(doc) {return unsafeCreateElement(doc, cst_optgroup);}

function createOption(doc) {return unsafeCreateElement(doc, cst_option);}

function createSelect(type, name, doc) {
  return unsafeCreateElementEx(type, name, doc, cst_select__0);
}

function createInput(type, name, doc) {
  return unsafeCreateElementEx(type, name, doc, cst_input__0);
}

function createTextarea(type, name, doc) {
  return unsafeCreateElementEx(type, name, doc, cst_textarea);
}

function createButton(type, name, doc) {
  return unsafeCreateElementEx(type, name, doc, cst_button);
}

function createLabel(doc) {return unsafeCreateElement(doc, cst_label);}

function createFieldset(doc) {return unsafeCreateElement(doc, cst_fieldset);}

function createLegend(doc) {return unsafeCreateElement(doc, cst_legend);}

function createUl(doc) {return unsafeCreateElement(doc, cst_ul);}

function createOl(doc) {return unsafeCreateElement(doc, cst_ol);}

function createDl(doc) {return unsafeCreateElement(doc, cst_dl);}

function createLi(doc) {return unsafeCreateElement(doc, cst_li);}

function createDiv(doc) {return unsafeCreateElement(doc, cst_div);}

function createEmbed(doc) {return unsafeCreateElement(doc, cst_embed);}

function createP(doc) {return unsafeCreateElement(doc, cst_p);}

function createH1(doc) {return unsafeCreateElement(doc, cst_h1);}

function createH2(doc) {return unsafeCreateElement(doc, cst_h2);}

function createH3(doc) {return unsafeCreateElement(doc, cst_h3);}

function createH4(doc) {return unsafeCreateElement(doc, cst_h4);}

function createH5(doc) {return unsafeCreateElement(doc, cst_h5);}

function createH6(doc) {return unsafeCreateElement(doc, cst_h6);}

function createQ(doc) {return unsafeCreateElement(doc, cst_q);}

function createBlockquote(doc) {
  return unsafeCreateElement(doc, cst_blockquote);
}

function createPre(doc) {return unsafeCreateElement(doc, cst_pre);}

function createBr(doc) {return unsafeCreateElement(doc, cst_br);}

function createHr(doc) {return unsafeCreateElement(doc, cst_hr);}

function createIns(doc) {return unsafeCreateElement(doc, cst_ins);}

function createDel(doc) {return unsafeCreateElement(doc, cst_del);}

function createA(doc) {return unsafeCreateElement(doc, cst_a);}

function createImg(doc) {return unsafeCreateElement(doc, cst_img);}

function createObject(doc) {return unsafeCreateElement(doc, cst_object);}

function createParam(doc) {return unsafeCreateElement(doc, cst_param);}

function createMap(doc) {return unsafeCreateElement(doc, cst_map);}

function createArea(doc) {return unsafeCreateElement(doc, cst_area);}

function createScript(doc) {return unsafeCreateElement(doc, cst_script);}

function createTable(doc) {return unsafeCreateElement(doc, cst_table);}

function createCaption(doc) {return unsafeCreateElement(doc, cst_caption);}

function createCol(doc) {return unsafeCreateElement(doc, cst_col);}

function createColgroup(doc) {return unsafeCreateElement(doc, cst_colgroup);}

function createThead(doc) {return unsafeCreateElement(doc, cst_thead);}

function createTfoot(doc) {return unsafeCreateElement(doc, cst_tfoot);}

function createTbody(doc) {return unsafeCreateElement(doc, cst_tbody);}

function createTr(doc) {return unsafeCreateElement(doc, cst_tr);}

function createTh(doc) {return unsafeCreateElement(doc, cst_th);}

function createTd(doc) {return unsafeCreateElement(doc, cst_td);}

function createSub(doc) {return createElement(doc, cst_sub);}

function createSup(doc) {return createElement(doc, cst_sup);}

function createSpan(doc) {return createElement(doc, cst_span);}

function createTt(doc) {return createElement(doc, cst_tt);}

function createI(doc) {return createElement(doc, cst_i);}

function createB(doc) {return createElement(doc, cst_b);}

function createBig(doc) {return createElement(doc, cst_big);}

function createSmall(doc) {return createElement(doc, cst_small);}

function createEm(doc) {return createElement(doc, cst_em);}

function createStrong(doc) {return createElement(doc, cst_strong);}

function createCite(doc) {return createElement(doc, cst_cite);}

function createDfn(doc) {return createElement(doc, cst_dfn);}

function createCode(doc) {return createElement(doc, cst_code);}

function createSamp(doc) {return createElement(doc, cst_samp);}

function createKbd(doc) {return createElement(doc, cst_kbd);}

function createVar(doc) {return createElement(doc, cst_var);}

function createAbbr(doc) {return createElement(doc, cst_abbr);}

function createDd(doc) {return createElement(doc, cst_dd);}

function createDt(doc) {return createElement(doc, cst_dt);}

function createNoscript(doc) {return createElement(doc, cst_noscript);}

function createAddress(doc) {return createElement(doc, cst_address);}

function createFrameset(doc) {return unsafeCreateElement(doc, cst_frameset);}

function createFrame(doc) {return unsafeCreateElement(doc, cst_frame);}

function createIframe(doc) {return unsafeCreateElement(doc, cst_iframe);}

function createAudio(doc) {return unsafeCreateElement(doc, cst_audio);}

function createVideo(doc) {return unsafeCreateElement(doc, cst_video);}

var Canvas_not_available = [
  248,
  cst_Js_of_ocaml_Dom_html_Canvas_not_available,
  runtime["caml_fresh_oo_id"](0)
];

function createCanvas(doc) {
  var c = unsafeCreateElement(doc, cst_canvas);
  function ck(x) {return call1(caml_get_public_method(x, -388424711, 95), x);}
  var cl = function(t52, param) {return t52.getContext;}(c, ck);
  if (1 - call1(Js_of_ocaml_Js[5][5], cl)) {
    throw runtime["caml_wrap_thrown_exception"](Canvas_not_available);
  }
  return c;
}

function c(x) {return call1(caml_get_public_method(x, -29132142, 96), x);}

var d = Js_of_ocaml_Js[50][1];
var html_element = function(t53, param) {return t53.HTMLElement;}(d, c);
var e = Js_of_ocaml_Js[3];
var element = call1(Js_of_ocaml_Js[4], html_element) === e ?
  function(e) {
   var ch = Js_of_ocaml_Js[3];
   function ci(x) {return call1(caml_get_public_method(x, 746263041, 97), x);}
   var cj = function(t54, param) {return t54.innerHTML;}(e, ci);
   return call1(Js_of_ocaml_Js[4], cj) === ch ?
     Js_of_ocaml_Js[1] :
     call1(Js_of_ocaml_Js[2], e);
 } :
  function(e) {
   return e instanceof html_element ?
     call1(Js_of_ocaml_Js[2], e) :
     Js_of_ocaml_Js[1];
 };

function unsafeCoerce(tag, e) {
  var cd = tag.toString();
  function ce(x) {return call1(caml_get_public_method(x, 946097238, 98), x);}
  function cf(x) {return call1(caml_get_public_method(x, 578170309, 99), x);}
  var cg = function(t55, param) {return t55.tagName;}(e, cf);
  return function(t56, param) {return t56.toLowerCase();}(cg, ce) === cd ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function a__0(e) {return unsafeCoerce(cst_a__0, e);}

function area(e) {return unsafeCoerce(cst_area__0, e);}

function base(e) {return unsafeCoerce(cst_base__0, e);}

function blockquote(e) {return unsafeCoerce(cst_blockquote__0, e);}

function body(e) {return unsafeCoerce(cst_body__0, e);}

function br(e) {return unsafeCoerce(cst_br__0, e);}

function button(e) {return unsafeCoerce(cst_button__0, e);}

function canvas(e) {return unsafeCoerce(cst_canvas__0, e);}

function caption(e) {return unsafeCoerce(cst_caption__0, e);}

function col(e) {return unsafeCoerce(cst_col__0, e);}

function colgroup(e) {return unsafeCoerce(cst_colgroup__0, e);}

function del(e) {return unsafeCoerce(cst_del__0, e);}

function div(e) {return unsafeCoerce(cst_div__0, e);}

function dl(e) {return unsafeCoerce(cst_dl__0, e);}

function fieldset(e) {return unsafeCoerce(cst_fieldset__0, e);}

function embed(e) {return unsafeCoerce(cst_embed__0, e);}

function form(e) {return unsafeCoerce(cst_form__0, e);}

function frameset(e) {return unsafeCoerce(cst_frameset__0, e);}

function frame(e) {return unsafeCoerce(cst_frame__0, e);}

function h1(e) {return unsafeCoerce(cst_h1__0, e);}

function h2(e) {return unsafeCoerce(cst_h2__0, e);}

function h3(e) {return unsafeCoerce(cst_h3__0, e);}

function h4(e) {return unsafeCoerce(cst_h4__0, e);}

function h5(e) {return unsafeCoerce(cst_h5__0, e);}

function h6(e) {return unsafeCoerce(cst_h6__0, e);}

function head(e) {return unsafeCoerce(cst_head__0, e);}

function hr(e) {return unsafeCoerce(cst_hr__0, e);}

function html(e) {return unsafeCoerce(cst_html__0, e);}

function iframe(e) {return unsafeCoerce(cst_iframe__0, e);}

function img(e) {return unsafeCoerce(cst_img__0, e);}

function input__0(e) {return unsafeCoerce(cst_input__1, e);}

function ins(e) {return unsafeCoerce(cst_ins__0, e);}

function label(e) {return unsafeCoerce(cst_label__0, e);}

function legend(e) {return unsafeCoerce(cst_legend__0, e);}

function li(e) {return unsafeCoerce(cst_li__0, e);}

function link(e) {return unsafeCoerce(cst_link__0, e);}

function map(e) {return unsafeCoerce(cst_map__0, e);}

function meta(e) {return unsafeCoerce(cst_meta__0, e);}

function object(e) {return unsafeCoerce(cst_object__0, e);}

function ol(e) {return unsafeCoerce(cst_ol__0, e);}

function optgroup(e) {return unsafeCoerce(cst_optgroup__0, e);}

function option(e) {return unsafeCoerce(cst_option__0, e);}

function p(e) {return unsafeCoerce(cst_p__0, e);}

function param(e) {return unsafeCoerce(cst_param__0, e);}

function pre(e) {return unsafeCoerce(cst_pre__0, e);}

function q(e) {return unsafeCoerce(cst_q__0, e);}

function script(e) {return unsafeCoerce(cst_script__0, e);}

function select__0(e) {return unsafeCoerce(cst_select__1, e);}

function style(e) {return unsafeCoerce(cst_style__0, e);}

function table(e) {return unsafeCoerce(cst_table__0, e);}

function tbody(e) {return unsafeCoerce(cst_tbody__0, e);}

function td(e) {return unsafeCoerce(cst_td__0, e);}

function textarea(e) {return unsafeCoerce(cst_textarea__0, e);}

function tfoot(e) {return unsafeCoerce(cst_tfoot__0, e);}

function th(e) {return unsafeCoerce(cst_th__0, e);}

function thead(e) {return unsafeCoerce(cst_thead__0, e);}

function title(e) {return unsafeCoerce(cst_title__0, e);}

function tr(e) {return unsafeCoerce(cst_tr__0, e);}

function ul(e) {return unsafeCoerce(cst_ul__0, e);}

function audio(e) {return unsafeCoerce(cst_audio__0, e);}

function video(e) {return unsafeCoerce(cst_video__0, e);}

function unsafeCoerceEvent(constr, ev) {
  var cc = Js_of_ocaml_Js[3];
  if (call1(Js_of_ocaml_Js[4], constr) !== cc) {
    if (ev instanceof constr) {return call1(Js_of_ocaml_Js[2], ev);}
  }
  return Js_of_ocaml_Js[1];
}

function mouseEvent(ev) {
  function ca(x) {
    return call1(caml_get_public_method(x, -590574348, 100), x);
  }
  var cb = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t57, param) {return t57.MouseEvent;}(cb, ca),
    ev
  );
}

function keyboardEvent(ev) {
  function b9(x) {
    return call1(caml_get_public_method(x, -807764460, 101), x);
  }
  var b_ = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t58, param) {return t58.KeyboardEvent;}(b_, b9),
    ev
  );
}

function wheelEvent(ev) {
  function b7(x) {return call1(caml_get_public_method(x, 239551166, 102), x);}
  var b8 = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t59, param) {return t59.WheelEvent;}(b8, b7),
    ev
  );
}

function mouseScrollEvent(ev) {
  function b5(x) {return call1(caml_get_public_method(x, -31722201, 103), x);}
  var b6 = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t60, param) {return t60.MouseScrollEvent;}(b6, b5),
    ev
  );
}

function popStateEvent(ev) {
  function b3(x) {
    return call1(caml_get_public_method(x, -903494309, 104), x);
  }
  var b4 = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t61, param) {return t61.PopStateEvent;}(b4, b3),
    ev
  );
}

var eventTarget = Js_of_ocaml_Dom[13];

function eventRelatedTarget(e) {
  function bT(param) {
    function bW(x) {return call1(caml_get_public_method(x, 1707673, 105), x);}
    var match = caml_js_to_string(
      function(t65, param) {return t65.type;}(e, bW)
    );
    if (caml_string_notequal(match, cst_mouseout__0)) {
      if (caml_string_notequal(match, cst_mouseover__0)) {return Js_of_ocaml_Js[1];}
      var bX = function(param) {
        throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,f]);
      };
      var bY = function(x) {
        return call1(caml_get_public_method(x, 513086066, 106), x);
      };
      var bZ = function(t63, param) {return t63.fromElement;}(e, bY);
      return call2(Js_of_ocaml_Js[6][8], bZ, bX);
    }
    function b0(param) {
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,g]);
    }
    function b1(x) {
      return call1(caml_get_public_method(x, 904455809, 107), x);
    }
    var b2 = function(t64, param) {return t64.toElement;}(e, b1);
    return call2(Js_of_ocaml_Js[6][8], b2, b0);
  }
  function bU(x) {
    return call1(caml_get_public_method(x, -629591140, 108), x);
  }
  var bV = function(t62, param) {return t62.relatedTarget;}(e, bU);
  return call2(Js_of_ocaml_Js[6][8], bV, bT);
}

function eventAbsolutePosition(e) {
  function bG(x) {
    return call1(caml_get_public_method(x, -1055163742, 109), x);
  }
  var body = function(t73, param) {return t73.body;}(document, bG);
  function bH(x) {
    return call1(caml_get_public_method(x, 1068552417, 110), x);
  }
  var html = function(t72, param) {return t72.documentElement;}(document, bH);
  function bI(x) {
    return call1(caml_get_public_method(x, 1040845960, 111), x);
  }
  var bJ = function(t71, param) {return t71.scrollTop;}(html, bI);
  function bK(x) {
    return call1(caml_get_public_method(x, 1040845960, 112), x);
  }
  var bL = function(t70, param) {return t70.scrollTop;}(body, bK);
  function bM(x) {return call1(caml_get_public_method(x, -75417682, 113), x);}
  var bN = (function(t69, param) {return t69.clientY;}(e, bM) + bL | 0) + bJ | 0;
  function bO(x) {return call1(caml_get_public_method(x, 91199156, 114), x);}
  var bP = function(t68, param) {return t68.scrollLeft;}(html, bO);
  function bQ(x) {return call1(caml_get_public_method(x, 91199156, 115), x);}
  var bR = function(t67, param) {return t67.scrollLeft;}(body, bQ);
  function bS(x) {return call1(caml_get_public_method(x, -75417683, 116), x);}
  return [
    0,
    (function(t66, param) {return t66.clientX;}(e, bS) + bR | 0) + bP | 0,
    bN
  ];
}

function eventAbsolutePosition__0(e) {
  function by(x) {
    function bC(y) {return [0,x,y];}
    function bD(param) {return eventAbsolutePosition(e);}
    function bE(x) {
      return call1(caml_get_public_method(x, 1028467498, 117), x);
    }
    var bF = function(t75, param) {return t75.pageY;}(e, bE);
    return call3(Js_of_ocaml_Js[6][7], bF, bD, bC);
  }
  function bz(param) {return eventAbsolutePosition(e);}
  function bA(x) {
    return call1(caml_get_public_method(x, 1028467497, 118), x);
  }
  var bB = function(t74, param) {return t74.pageX;}(e, bA);
  return call3(Js_of_ocaml_Js[6][7], bB, bz, by);
}

function elementClientPosition(e) {
  function bk(x) {return call1(caml_get_public_method(x, 718768073, 119), x);}
  var r = function(t84, param) {return t84.getBoundingClientRect();}(e, bk);
  function bl(x) {
    return call1(caml_get_public_method(x, -1055163742, 120), x);
  }
  var body = function(t83, param) {return t83.body;}(document, bl);
  function bm(x) {
    return call1(caml_get_public_method(x, 1068552417, 121), x);
  }
  var html = function(t82, param) {return t82.documentElement;}(document, bm);
  function bn(x) {
    return call1(caml_get_public_method(x, -939682550, 122), x);
  }
  var bo = function(t81, param) {return t81.clientTop;}(html, bn);
  function bp(x) {
    return call1(caml_get_public_method(x, -939682550, 123), x);
  }
  var bq = function(t80, param) {return t80.clientTop;}(body, bp);
  function br(x) {return call1(caml_get_public_method(x, 5793429, 124), x);}
  var bs = ((function(t79, param) {return t79.top;}(r, br) | 0) - bq | 0) - bo | 0;
  function bt(x) {return call1(caml_get_public_method(x, 814972914, 125), x);}
  var bu = function(t78, param) {return t78.clientLeft;}(html, bt);
  function bv(x) {return call1(caml_get_public_method(x, 814972914, 126), x);}
  var bw = function(t77, param) {return t77.clientLeft;}(body, bv);
  function bx(x) {
    return call1(caml_get_public_method(x, -944764921, 127), x);
  }
  return [
    0,
    ((function(t76, param) {return t76.left;}(r, bx) | 0) - bw | 0) - bu | 0,
    bs
  ];
}

function getDocumentScroll(param) {
  function bb(x) {
    return call1(caml_get_public_method(x, -1055163742, 128), x);
  }
  var body = function(t90, param) {return t90.body;}(document, bb);
  function bc(x) {
    return call1(caml_get_public_method(x, 1068552417, 129), x);
  }
  var html = function(t89, param) {return t89.documentElement;}(document, bc);
  function bd(x) {
    return call1(caml_get_public_method(x, 1040845960, 130), x);
  }
  var be = function(t88, param) {return t88.scrollTop;}(html, bd);
  function bf(x) {
    return call1(caml_get_public_method(x, 1040845960, 131), x);
  }
  var bg = function(t87, param) {return t87.scrollTop;}(body, bf) + be | 0;
  function bh(x) {return call1(caml_get_public_method(x, 91199156, 132), x);}
  var bi = function(t86, param) {return t86.scrollLeft;}(html, bh);
  function bj(x) {return call1(caml_get_public_method(x, 91199156, 133), x);}
  return [
    0,
    function(t85, param) {return t85.scrollLeft;}(body, bj) + bi | 0,
    bg
  ];
}

function buttonPressed(ev) {
  function a7(x) {return x;}
  function a8(param) {
    function ba(x) {
      return call1(caml_get_public_method(x, -639606286, 134), x);
    }
    var match = function(t92, param) {return t92.button;}(ev, ba);
    var switcher = match + -1 | 0;
    if (! (3 < switcher >>> 0)) {
      switch (switcher) {
        case 0:
          return 1;
        case 1:
          return 3;
        case 2:break;
        default:return 2
        }
    }
    return 0;
  }
  function a9(x) {
    return call1(caml_get_public_method(x, -910345251, 135), x);
  }
  var a_ = function(t91, param) {return t91.which;}(ev, a9);
  return call3(Js_of_ocaml_Js[6][7], a_, a8, a7);
}

function hasMousewheelEvents(param) {
  var d = createDiv(document);
  function a4(x) {return call1(caml_get_public_method(x, 524300314, 136), x);}
  var a5 = "return;";
  var a6 = "onmousewheel";
  (function(t95, t93, t94, param) {return t95.setAttribute(t93, t94);}(d, a6, a5, a4
   ));
  return typeof d.onmousewheel === "function" ? 1 : 0;
}

function addMousewheelEventListener(e, h, capt) {
  if (hasMousewheelEvents(0)) {
    var aR = call1(
      handler,
      function(e) {
        function aX(param) {return 0;}
        function aY(x) {
          return call1(caml_get_public_method(x, -95379365, 137), x);
        }
        var aZ = function(t101, param) {return t101.wheelDeltaX;}(e, aY);
        var dx = (- call2(Js_of_ocaml_Js[6][8], aZ, aX) | 0) / 40 | 0;
        function a0(param) {
          function a3(x) {
            return call1(caml_get_public_method(x, 644780381, 138), x);
          }
          return function(t100, param) {return t100.wheelDelta;}(e, a3);
        }
        function a1(x) {
          return call1(caml_get_public_method(x, -95379364, 139), x);
        }
        var a2 = function(t99, param) {return t99.wheelDeltaY;}(e, a1);
        var dy = (- call2(Js_of_ocaml_Js[6][8], a2, a0) | 0) / 40 | 0;
        return call3(h, e, dx, dy);
      }
    );
    return call4(addEventListener, e, Event[11], aR, capt);
  }
  var aS = call1(
    handler,
    function(e) {
      function aT(x) {
        return call1(caml_get_public_method(x, -266378607, 140), x);
      }
      var d = function(t98, param) {return t98.detail;}(e, aT);
      function aU(x) {
        return call1(caml_get_public_method(x, -66775139, 141), x);
      }
      var aV = function(t97, param) {return t97.HORIZONTAL;}(e, aU);
      function aW(x) {
        return call1(caml_get_public_method(x, -1065804639, 142), x);
      }
      return function(t96, param) {return t96.axis;}(e, aW) === aV ?
        call3(h, e, d, 0) :
        call3(h, e, 0, d);
    }
  );
  return call4(addEventListener, e, Event[12], aS, capt);
}

function try_code(v) {
  var match = caml_js_to_string(v);
  var switch__0 = caml_string_compare(match, cst_KeyH);
  if (0 <= switch__0) {
    if (! (0 < switch__0)) {return 8;}
    var switch__1 = caml_string_compare(match, cst_Numpad4);
    if (0 <= switch__1) {
      if (! (0 < switch__1)) {return 72;}
      var switch__2 = caml_string_compare(match, cst_PageUp);
      if (0 <= switch__2) {
        if (! (0 < switch__2)) {return 98;}
        var switch__3 = caml_string_compare(match, cst_ShiftRight);
        if (0 <= switch__3) {
          if (! (0 < switch__3)) {return 91;}
          if (! caml_string_notequal(match, cst_Slash)) {return 55;}
          if (! caml_string_notequal(match, cst_Space)) {return 41;}
          if (! caml_string_notequal(match, cst_Tab)) {return 39;}
          if (! caml_string_notequal(match, cst_VolumeDown)) {return 103;}
          if (! caml_string_notequal(match, cst_VolumeMute)) {return 102;}
          if (! caml_string_notequal(match, cst_VolumeUp)) {return 104;}
        }
        else {
          if (! caml_string_notequal(match, cst_Pause)) {return 123;}
          if (! caml_string_notequal(match, cst_Period)) {return 54;}
          if (! caml_string_notequal(match, cst_PrintScreen)) {return 120;}
          if (! caml_string_notequal(match, cst_Quote)) {return 50;}
          if (! caml_string_notequal(match, cst_ScrollLock)) {return 119;}
          if (! caml_string_notequal(match, cst_Semicolon)) {return 49;}
          if (! caml_string_notequal(match, cst_ShiftLeft)) {return 90;}
        }
      }
      else {
        var switch__4 = caml_string_compare(match, cst_NumpadDivide);
        if (0 <= switch__4) {
          if (! (0 < switch__4)) {return 84;}
          if (! caml_string_notequal(match, cst_NumpadEnter)) {return 83;}
          if (! caml_string_notequal(match, cst_NumpadEqual)) {return 82;}
          if (! caml_string_notequal(match, cst_NumpadMultiply)) {return 78;}
          if (! caml_string_notequal(match, cst_NumpadSubtract)) {return 79;}
          if (! caml_string_notequal(match, cst_OSLeft)) {return 117;}
          if (! caml_string_notequal(match, cst_OSRight)) {return 118;}
          if (! caml_string_notequal(match, cst_PageDown)) {return 99;}
        }
        else {
          if (! caml_string_notequal(match, cst_Numpad5)) {return 73;}
          if (! caml_string_notequal(match, cst_Numpad6)) {return 74;}
          if (! caml_string_notequal(match, cst_Numpad7)) {return 75;}
          if (! caml_string_notequal(match, cst_Numpad8)) {return 76;}
          if (! caml_string_notequal(match, cst_Numpad9)) {return 77;}
          if (! caml_string_notequal(match, cst_NumpadAdd)) {return 80;}
          if (! caml_string_notequal(match, cst_NumpadDecimal)) {return 81;}
        }
      }
    }
    else {
      var switch__5 = caml_string_compare(match, cst_KeyX);
      if (0 <= switch__5) {
        if (! (0 < switch__5)) {return 24;}
        var switch__6 = caml_string_compare(match, cst_MetaRight);
        if (0 <= switch__6) {
          if (! (0 < switch__6)) {return 89;}
          if (! caml_string_notequal(match, cst_Minus)) {return 37;}
          if (! caml_string_notequal(match, cst_NumLock)) {return 85;}
          if (! caml_string_notequal(match, cst_Numpad0)) {return 68;}
          if (! caml_string_notequal(match, cst_Numpad1)) {return 69;}
          if (! caml_string_notequal(match, cst_Numpad2)) {return 70;}
          if (! caml_string_notequal(match, cst_Numpad3)) {return 71;}
        }
        else {
          if (! caml_string_notequal(match, cst_KeyY)) {return 25;}
          if (! caml_string_notequal(match, cst_KeyZ)) {return 26;}
          if (! caml_string_notequal(match, cst_MediaPlayPause)) {return 107;}
          if (! caml_string_notequal(match, cst_MediaStop)) {return 108;}
          if (! caml_string_notequal(match, cst_MediaTrackNext)) {return 106;}
          if (! caml_string_notequal(match, cst_MediaTrackPrevious)) {return 105;}
          if (! caml_string_notequal(match, cst_MetaLeft)) {return 88;}
        }
      }
      else {
        var switch__7 = caml_string_compare(match, cst_KeyP);
        if (0 <= switch__7) {
          if (! (0 < switch__7)) {return 16;}
          if (! caml_string_notequal(match, cst_KeyQ)) {return 17;}
          if (! caml_string_notequal(match, cst_KeyR)) {return 18;}
          if (! caml_string_notequal(match, cst_KeyS)) {return 19;}
          if (! caml_string_notequal(match, cst_KeyT)) {return 20;}
          if (! caml_string_notequal(match, cst_KeyU)) {return 21;}
          if (! caml_string_notequal(match, cst_KeyV)) {return 22;}
          if (! caml_string_notequal(match, cst_KeyW)) {return 23;}
        }
        else {
          if (! caml_string_notequal(match, cst_KeyI)) {return 9;}
          if (! caml_string_notequal(match, cst_KeyJ)) {return 10;}
          if (! caml_string_notequal(match, cst_KeyK)) {return 11;}
          if (! caml_string_notequal(match, cst_KeyL)) {return 12;}
          if (! caml_string_notequal(match, cst_KeyM)) {return 13;}
          if (! caml_string_notequal(match, cst_KeyN)) {return 14;}
          if (! caml_string_notequal(match, cst_KeyO)) {return 15;}
        }
      }
    }
  }
  else {
    var switch__8 = caml_string_compare(match, cst_Digit6);
    if (0 <= switch__8) {
      if (! (0 < switch__8)) {return 33;}
      var switch__9 = caml_string_compare(match, cst_F6);
      if (0 <= switch__9) {
        if (! (0 < switch__9)) {return 61;}
        var switch__10 = caml_string_compare(match, cst_KeyA);
        if (0 <= switch__10) {
          if (! (0 < switch__10)) {return 1;}
          if (! caml_string_notequal(match, cst_KeyB)) {return 2;}
          if (! caml_string_notequal(match, cst_KeyC)) {return 3;}
          if (! caml_string_notequal(match, cst_KeyD)) {return 4;}
          if (! caml_string_notequal(match, cst_KeyE)) {return 5;}
          if (! caml_string_notequal(match, cst_KeyF)) {return 6;}
          if (! caml_string_notequal(match, cst_KeyG)) {return 7;}
        }
        else {
          if (! caml_string_notequal(match, cst_F7)) {return 62;}
          if (! caml_string_notequal(match, cst_F8)) {return 63;}
          if (! caml_string_notequal(match, cst_F9)) {return 64;}
          if (! caml_string_notequal(match, cst_Home)) {return 100;}
          if (! caml_string_notequal(match, cst_Insert)) {return 44;}
          if (! caml_string_notequal(match, cst_IntlBackslash)) {return 121;}
          if (! caml_string_notequal(match, cst_IntlYen)) {return 122;}
        }
      }
      else {
        var switch__11 = caml_string_compare(match, cst_F1);
        if (0 <= switch__11) {
          if (! (0 < switch__11)) {return 56;}
          if (! caml_string_notequal(match, cst_F10)) {return 65;}
          if (! caml_string_notequal(match, cst_F11)) {return 66;}
          if (! caml_string_notequal(match, cst_F12)) {return 67;}
          if (! caml_string_notequal(match, cst_F2)) {return 57;}
          if (! caml_string_notequal(match, cst_F3)) {return 58;}
          if (! caml_string_notequal(match, cst_F4)) {return 59;}
          if (! caml_string_notequal(match, cst_F5)) {return 60;}
        }
        else {
          if (! caml_string_notequal(match, cst_Digit7)) {return 34;}
          if (! caml_string_notequal(match, cst_Digit8)) {return 35;}
          if (! caml_string_notequal(match, cst_Digit9)) {return 36;}
          if (! caml_string_notequal(match, cst_End)) {return 101;}
          if (! caml_string_notequal(match, cst_Enter)) {return 40;}
          if (! caml_string_notequal(match, cst_Equal)) {return 38;}
          if (! caml_string_notequal(match, cst_Escape)) {return 42;}
        }
      }
    }
    else {
      var switch__12 = caml_string_compare(match, cst_BrowserRefresh);
      if (0 <= switch__12) {
        if (! (0 < switch__12)) {return 113;}
        var switch__13 = caml_string_compare(match, cst_Delete);
        if (0 <= switch__13) {
          if (! (0 < switch__13)) {return 45;}
          if (! caml_string_notequal(match, cst_Digit0)) {return 27;}
          if (! caml_string_notequal(match, cst_Digit1)) {return 28;}
          if (! caml_string_notequal(match, cst_Digit2)) {return 29;}
          if (! caml_string_notequal(match, cst_Digit3)) {return 30;}
          if (! caml_string_notequal(match, cst_Digit4)) {return 31;}
          if (! caml_string_notequal(match, cst_Digit5)) {return 32;}
        }
        else {
          if (! caml_string_notequal(match, cst_BrowserSearch)) {return 110;}
          if (! caml_string_notequal(match, cst_BrowserStop)) {return 114;}
          if (! caml_string_notequal(match, cst_CapsLock)) {return 46;}
          if (! caml_string_notequal(match, cst_Comma)) {return 53;}
          if (! caml_string_notequal(match, cst_ContextMenu)) {return 109;}
          if (! caml_string_notequal(match, cst_ControlLeft)) {return 86;}
          if (! caml_string_notequal(match, cst_ControlRight)) {return 87;}
        }
      }
      else {
        var switch__14 = caml_string_compare(match, cst_Backslash);
        if (0 <= switch__14) {
          if (! (0 < switch__14)) {return 52;}
          if (! caml_string_notequal(match, cst_Backspace)) {return 43;}
          if (! caml_string_notequal(match, cst_BracketLeft)) {return 47;}
          if (! caml_string_notequal(match, cst_BracketRight)) {return 48;}
          if (! caml_string_notequal(match, cst_BrowserBack)) {return 116;}
          if (! caml_string_notequal(match, cst_BrowserFavorites)) {return 112;}
          if (! caml_string_notequal(match, cst_BrowserForward)) {return 115;}
          if (! caml_string_notequal(match, cst_BrowserHome)) {return 111;}
        }
        else {
          if (! caml_string_notequal(match, cst_AltLeft)) {return 92;}
          if (! caml_string_notequal(match, cst_AltRight)) {return 93;}
          if (! caml_string_notequal(match, cst_ArrowDown)) {return 97;}
          if (! caml_string_notequal(match, cst_ArrowLeft)) {return 94;}
          if (! caml_string_notequal(match, cst_ArrowRight)) {return 95;}
          if (! caml_string_notequal(match, cst_ArrowUp)) {return 96;}
          if (! caml_string_notequal(match, cst_Backquote)) {return 51;}
        }
      }
    }
  }
  return 0;
}

function try_key_code_left(param) {
  if (19 <= param) {
    if (91 === param) {return 88;}
  }
  else if (16 <= param) {
    var switcher = param + -16 | 0;
    switch (switcher) {case 0:return 90;case 1:return 86;default:return 92}
  }
  return 0;
}

function try_key_code_right(param) {
  if (19 <= param) {
    if (91 === param) {return 89;}
  }
  else if (16 <= param) {
    var switcher = param + -16 | 0;
    switch (switcher) {case 0:return 91;case 1:return 87;default:return 93}
  }
  return 0;
}

function try_key_code_numpad(param) {
  if (47 <= param) {
    var switcher = param + -96 | 0;
    if (! (15 < switcher >>> 0)) {
      switch (switcher) {
        case 0:
          return 68;
        case 1:
          return 69;
        case 2:
          return 70;
        case 3:
          return 71;
        case 4:
          return 72;
        case 5:
          return 73;
        case 6:
          return 74;
        case 7:
          return 75;
        case 8:
          return 76;
        case 9:
          return 77;
        case 10:
          return 78;
        case 11:
          return 80;
        case 12:break;
        case 13:
          return 79;
        case 14:
          return 81;
        default:
          return 84
        }
    }
  }
  else if (12 <= param) {
    var switcher__0 = param + -12 | 0;
    switch (switcher__0) {
      case 0:
        return 73;
      case 1:
        return 83;
      case 21:
        return 77;
      case 22:
        return 71;
      case 23:
        return 69;
      case 24:
        return 75;
      case 25:
        return 72;
      case 26:
        return 76;
      case 27:
        return 74;
      case 28:
        return 70;
      case 33:
        return 68;
      case 34:
        return 81
      }
  }
  return 0;
}

function try_key_code_normal(param) {
  var switcher = param + -8 | 0;
  if (! (214 < switcher >>> 0)) {
    var aQ = switcher;
    if (67 <= aQ) switch (aQ) {
      case 67:
        return 11;
      case 68:
        return 12;
      case 69:
        return 13;
      case 70:
        return 14;
      case 71:
        return 15;
      case 72:
        return 16;
      case 73:
        return 17;
      case 74:
        return 18;
      case 75:
        return 19;
      case 76:
        return 20;
      case 77:
        return 21;
      case 78:
        return 22;
      case 79:
        return 23;
      case 80:
        return 24;
      case 81:
        return 25;
      case 82:
        return 26;
      case 85:
        return 109;
      case 104:
        return 56;
      case 105:
        return 57;
      case 106:
        return 58;
      case 107:
        return 59;
      case 108:
        return 60;
      case 109:
        return 61;
      case 110:
        return 62;
      case 111:
        return 63;
      case 112:
        return 64;
      case 113:
        return 65;
      case 114:
        return 66;
      case 115:
        return 67;
      case 137:
        return 119;
      case 178:
        return 49;
      case 179:
        return 38;
      case 180:
        return 53;
      case 181:
        return 37;
      case 182:
        return 54;
      case 183:
        return 55;
      case 184:
        return 51;
      case 211:
        return 47;
      case 212:
        return 52;
      case 213:
        return 48;
      case 214:return 50
      }
    else switch (aQ) {
      case 0:
        return 43;
      case 1:
        return 39;
      case 5:
        return 40;
      case 11:
        return 123;
      case 12:
        return 46;
      case 19:
        return 42;
      case 24:
        return 41;
      case 25:
        return 98;
      case 26:
        return 99;
      case 27:
        return 101;
      case 28:
        return 100;
      case 29:
        return 94;
      case 30:
        return 96;
      case 31:
        return 95;
      case 32:
        return 97;
      case 34:
        return 120;
      case 37:
        return 44;
      case 38:
        return 45;
      case 40:
        return 27;
      case 41:
        return 28;
      case 42:
        return 29;
      case 43:
        return 30;
      case 44:
        return 31;
      case 45:
        return 32;
      case 46:
        return 33;
      case 47:
        return 34;
      case 48:
        return 35;
      case 49:
        return 36;
      case 57:
        return 1;
      case 58:
        return 2;
      case 59:
        return 3;
      case 60:
        return 4;
      case 61:
        return 5;
      case 62:
        return 6;
      case 63:
        return 7;
      case 64:
        return 8;
      case 65:
        return 9;
      case 66:
        return 10
      }
  }
  return 0;
}

function make_unidentified(param) {return 0;}

function try_next(value, f, v) {
  return 0 === v ?
    call3(Js_of_ocaml_Js[6][7], value, make_unidentified, f) :
    v;
}

function run_next(value, f, v) {return 0 === v ? call1(f, value) : v;}

function get_key_code(evt) {
  function aP(x) {return call1(caml_get_public_method(x, 463348332, 143), x);}
  return function(t102, param) {return t102.keyCode;}(evt, aP);
}

function try_key_location(evt) {
  function aI(x) {
    return call1(caml_get_public_method(x, -448369099, 144), x);
  }
  var match = function(t103, param) {return t103.location;}(evt, aI);
  var switcher = match + -1 | 0;
  if (2 < switcher >>> 0) {return make_unidentified;}
  switch (switcher) {
    case 0:
      var aJ = get_key_code(evt);
      return function(aN) {return run_next(aJ, try_key_code_left, aN);};
    case 1:
      var aK = get_key_code(evt);
      return function(aM) {return run_next(aK, try_key_code_right, aM);};
    default:
      var aL = get_key_code(evt);
      return function(aO) {return run_next(aL, try_key_code_numpad, aO);}
    }
}

function symbol(x, f) {return call1(f, x);}

function of_event(evt) {
  var aB = get_key_code(evt);
  function aC(aH) {return run_next(aB, try_key_code_normal, aH);}
  var aD = try_key_location(evt);
  function aE(x) {
    return call1(caml_get_public_method(x, -1044074195, 145), x);
  }
  var aF = function(t104, param) {return t104.code;}(evt, aE);
  return symbol(
    symbol(symbol(0, function(aG) {return try_next(aF, try_code, aG);}), aD),
    aC
  );
}

function char_of_int(value) {
  if (0 < value) {
    try {var az = [0,call1(Uchar[8], value)];return az;}catch(aA) {return 0;}
  }
  return 0;
}

function empty_string(param) {return "";}

function none(param) {return 0;}

function of_event__0(evt) {
  function as(x) {return call1(caml_get_public_method(x, 5343647, 146), x);}
  var at = function(t109, param) {return t109.key;}(evt, as);
  var key = call2(Js_of_ocaml_Js[6][8], at, empty_string);
  function au(x) {return call1(caml_get_public_method(x, 520590566, 147), x);}
  var match = function(t108, param) {return t108.length;}(key, au);
  if (0 === match) {
    var av = function(x) {
      return call1(caml_get_public_method(x, 472145699, 148), x);
    };
    var aw = function(t105, param) {return t105.charCode;}(evt, av);
    return call3(Js_of_ocaml_Js[6][7], aw, none, char_of_int);
  }
  if (1 === match) {
    var ax = function(x) {
      return call1(caml_get_public_method(x, 894756598, 149), x);
    };
    var ay = 0;
    return char_of_int(
      function(t107, t106, param) {return t107.charCodeAt(t106);}(key, ay, ax) | 0
    );
  }
  return 0;
}

function element__0(ar) {return ar;}

function other(e) {return [61,e];}

function tagged(e) {
  function ao(x) {return call1(caml_get_public_method(x, 946097238, 150), x);}
  function ap(x) {return call1(caml_get_public_method(x, 578170309, 151), x);}
  var aq = function(t110, param) {return t110.tagName;}(e, ap);
  var tag = runtime["caml_js_to_byte_string"](
    function(t111, param) {return t111.toLowerCase();}(aq, ao)
  );
  if (0 === runtime["caml_ml_string_length"](tag)) {return other(e);}
  var match = runtime["caml_bytes_unsafe_get"](tag, 0);
  var switcher = match + -97 | 0;
  if (! (21 < switcher >>> 0)) {
    switch (switcher) {
      case 0:
        return caml_string_notequal(tag, cst_a__1) ?
          caml_string_notequal(tag, cst_area__1) ?
           caml_string_notequal(tag, cst_audio__1) ? other(e) : [2,e] :
           [1,e] :
          [0,e];
      case 1:
        return caml_string_notequal(tag, cst_base__1) ?
          caml_string_notequal(tag, cst_blockquote__1) ?
           caml_string_notequal(tag, cst_body__1) ?
            caml_string_notequal(tag, cst_br__1) ?
             caml_string_notequal(tag, cst_button__1) ? other(e) : [7,e] :
             [6,e] :
            [5,e] :
           [4,e] :
          [3,e];
      case 2:
        return caml_string_notequal(tag, cst_canvas__1) ?
          caml_string_notequal(tag, cst_caption__1) ?
           caml_string_notequal(tag, cst_col__1) ?
            caml_string_notequal(tag, cst_colgroup__1) ? other(e) : [11,e] :
            [10,e] :
           [9,e] :
          [8,e];
      case 3:
        return caml_string_notequal(tag, cst_del__1) ?
          caml_string_notequal(tag, cst_div__1) ?
           caml_string_notequal(tag, cst_dl__1) ? other(e) : [14,e] :
           [13,e] :
          [12,e];
      case 4:
        return caml_string_notequal(tag, cst_embed__1) ? other(e) : [15,e];
      case 5:
        return caml_string_notequal(tag, cst_fieldset__1) ?
          caml_string_notequal(tag, cst_form__1) ?
           caml_string_notequal(tag, cst_frame__1) ?
            caml_string_notequal(tag, cst_frameset__1) ? other(e) : [18,e] :
            [19,e] :
           [17,e] :
          [16,e];
      case 7:
        return caml_string_notequal(tag, cst_h1__1) ?
          caml_string_notequal(tag, cst_h2__1) ?
           caml_string_notequal(tag, cst_h3__1) ?
            caml_string_notequal(tag, cst_h4__1) ?
             caml_string_notequal(tag, cst_h5__1) ?
              caml_string_notequal(tag, cst_h6__1) ?
               caml_string_notequal(tag, cst_head__1) ?
                caml_string_notequal(tag, cst_hr__1) ?
                 caml_string_notequal(tag, cst_html__1) ? other(e) : [28,e] :
                 [27,e] :
                [26,e] :
               [25,e] :
              [24,e] :
             [23,e] :
            [22,e] :
           [21,e] :
          [20,e];
      case 8:
        return caml_string_notequal(tag, cst_iframe__1) ?
          caml_string_notequal(tag, cst_img__1) ?
           caml_string_notequal(tag, cst_input__2) ?
            caml_string_notequal(tag, cst_ins__1) ? other(e) : [32,e] :
            [31,e] :
           [30,e] :
          [29,e];
      case 11:
        return caml_string_notequal(tag, cst_label__1) ?
          caml_string_notequal(tag, cst_legend__1) ?
           caml_string_notequal(tag, cst_li__1) ?
            caml_string_notequal(tag, cst_link__1) ? other(e) : [36,e] :
            [35,e] :
           [34,e] :
          [33,e];
      case 12:
        return caml_string_notequal(tag, cst_map__1) ?
          caml_string_notequal(tag, cst_meta__1) ? other(e) : [38,e] :
          [37,e];
      case 14:
        return caml_string_notequal(tag, cst_object__1) ?
          caml_string_notequal(tag, cst_ol__1) ?
           caml_string_notequal(tag, cst_optgroup__1) ?
            caml_string_notequal(tag, cst_option__1) ? other(e) : [42,e] :
            [41,e] :
           [40,e] :
          [39,e];
      case 15:
        return caml_string_notequal(tag, cst_p__1) ?
          caml_string_notequal(tag, cst_param__1) ?
           caml_string_notequal(tag, cst_pre__1) ? other(e) : [45,e] :
           [44,e] :
          [43,e];
      case 16:
        return caml_string_notequal(tag, cst_q__1) ? other(e) : [46,e];
      case 18:
        return caml_string_notequal(tag, cst_script__1) ?
          caml_string_notequal(tag, cst_select__2) ?
           caml_string_notequal(tag, cst_style__1) ? other(e) : [49,e] :
           [48,e] :
          [47,e];
      case 19:
        return caml_string_notequal(tag, cst_table__1) ?
          caml_string_notequal(tag, cst_tbody__1) ?
           caml_string_notequal(tag, cst_td__1) ?
            caml_string_notequal(tag, cst_textarea__1) ?
             caml_string_notequal(tag, cst_tfoot__1) ?
              caml_string_notequal(tag, cst_th__1) ?
               caml_string_notequal(tag, cst_thead__1) ?
                caml_string_notequal(tag, cst_title__1) ?
                 caml_string_notequal(tag, cst_tr__1) ? other(e) : [58,e] :
                 [57,e] :
                [56,e] :
               [55,e] :
              [54,e] :
             [53,e] :
            [52,e] :
           [51,e] :
          [50,e];
      case 20:
        return caml_string_notequal(tag, cst_ul__1) ? other(e) : [59,e];
      case 21:
        return caml_string_notequal(tag, cst_video__1) ? other(e) : [60,e]
      }
  }
  return other(e);
}

function opt_tagged(e) {
  function am(e) {return [0,tagged(e)];}
  function an(param) {return 0;}
  return call3(Js_of_ocaml_Js[5][7], e, an, am);
}

function taggedEvent(ev) {
  function X(ev) {return [0,ev];}
  function Y(param) {
    function aa(ev) {return [1,ev];}
    function ab(param) {
      function ad(ev) {return [2,ev];}
      function ae(param) {
        function ag(ev) {return [3,ev];}
        function ah(param) {
          function aj(ev) {return [4,ev];}
          function ak(param) {return [5,ev];}
          var al = popStateEvent(ev);
          return call3(Js_of_ocaml_Js[5][7], al, ak, aj);
        }
        var ai = mouseScrollEvent(ev);
        return call3(Js_of_ocaml_Js[5][7], ai, ah, ag);
      }
      var af = wheelEvent(ev);
      return call3(Js_of_ocaml_Js[5][7], af, ae, ad);
    }
    var ac = keyboardEvent(ev);
    return call3(Js_of_ocaml_Js[5][7], ac, ab, aa);
  }
  var Z = mouseEvent(ev);
  return call3(Js_of_ocaml_Js[5][7], Z, Y, X);
}

function opt_taggedEvent(ev) {
  function V(ev) {return [0,taggedEvent(ev)];}
  function W(param) {return 0;}
  return call3(Js_of_ocaml_Js[5][7], ev, W, V);
}

function stopPropagation(ev) {
  function O(param) {
    function U(x) {
      return call1(caml_get_public_method(x, 189842539, 152), x);
    }
    return function(t115, param) {return t115.stopPropagation();}(ev, U);
  }
  function P(param) {
    function S(x) {
      return call1(caml_get_public_method(x, 320837798, 153), x);
    }
    var T = Js_of_ocaml_Js[7];
    return function(t114, t113, param) {t114.cancelBubble = t113;return 0;}(ev, T, S
    );
  }
  function Q(x) {return call1(caml_get_public_method(x, 544309738, 154), x);}
  var R = function(t112, param) {return t112.stopPropagation;}(ev, Q);
  return call3(Js_of_ocaml_Js[6][7], R, P, O);
}

var requestAnimationFrame = runtime["caml_js_pure_expr"](
  function(param) {
    var w = 0;
    function x(x) {
      return call1(caml_get_public_method(x, 497949938, 155), x);
    }
    var y = [
      0,
      function(t125, param) {return t125.msRequestAnimationFrame;}(window, x),
      w
    ];
    function z(x) {
      return call1(caml_get_public_method(x, -153781943, 156), x);
    }
    var A = [
      0,
      function(t124, param) {return t124.oRequestAnimationFrame;}(window, z),
      y
    ];
    function B(x) {
      return call1(caml_get_public_method(x, -151539242, 157), x);
    }
    var C = [
      0,
      function(t123, param) {return t123.webkitRequestAnimationFrame;}(window, B
      ),
      A
    ];
    function D(x) {
      return call1(caml_get_public_method(x, -769448896, 158), x);
    }
    var E = [
      0,
      function(t122, param) {return t122.mozRequestAnimationFrame;}(window, D),
      C
    ];
    function F(x) {
      return call1(caml_get_public_method(x, 240126520, 159), x);
    }
    var l = [
      0,
      function(t121, param) {return t121.requestAnimationFrame;}(window, F),
      E
    ];
    try {
      var G = function(c) {return call1(Js_of_ocaml_Js[6][5], c);};
      var req = call2(List[33], G, l);
      var H = function(callback) {return req(callback);};
      return H;
    }
    catch(I) {
      I = caml_wrap_exception(I);
      if (I === Not_found) {
        var now = function(param) {
          function K(x) {
            return call1(caml_get_public_method(x, 528448451, 160), x);
          }
          var L = 0;
          var M = Js_of_ocaml_Js[22];
          var N = function(t119, param) {return new t119();}(M, L);
          return function(t120, param) {return t120.getTime();}(N, K);
        };
        var last = [0,now(0)];
        return function(callback) {
          var t = now(0);
          var dt = last[1] + 16.6666666666666679 - t;
          var dt__0 = dt < 0 ? 0 : dt;
          last[1] = t;
          function J(x) {
            return call1(caml_get_public_method(x, 735461151, 161), x);
          }
          (function(t118, t116, t117, param) {
             return t118.setTimeout(t116, t117);
           }(window, callback, dt__0, J
           ));
          return 0;
        };
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](I);
    }
  }
);

function hasPushState(param) {
  function s(x) {return call1(caml_get_public_method(x, -936976937, 162), x);}
  function t(x) {return call1(caml_get_public_method(x, -465095340, 163), x);}
  var u = function(t126, param) {return t126.history;}(window, t);
  var v = function(t127, param) {return t127.pushState;}(u, s);
  return call1(Js_of_ocaml_Js[6][5], v);
}

function hasPlaceholder(param) {
  var i = createInput(0, 0, document);
  function q(x) {return call1(caml_get_public_method(x, 989033331, 164), x);}
  var r = function(t128, param) {return t128.placeholder;}(i, q);
  return call1(Js_of_ocaml_Js[6][5], r);
}

function hasRequired(param) {
  var i = createInput(0, 0, document);
  function o(x) {return call1(caml_get_public_method(x, 845320543, 165), x);}
  var p = function(t129, param) {return t129.required;}(i, o);
  return call1(Js_of_ocaml_Js[6][5], p);
}

var overflow_limit = 2147483e3;

function setTimeout(callback, d) {
  var id = [0,0];
  function loop(step, param) {
    if (2147483e3 < step) {
      var k = step - 2147483e3;
      var step__0 = overflow_limit;
      var remain = k;
    }
    else {var remain__0 = 0;var step__0 = step;var remain = remain__0;}
    var cb = remain == 0 ? callback : function(n) {return loop(remain, n);};
    function l(x) {
      return call1(caml_get_public_method(x, 735461151, 166), x);
    }
    var m = runtime["caml_js_wrap_callback"](cb);
    id[1] =
      [
        0,
        function(t132, t130, t131, param) {
          return t132.setTimeout(t130, t131);
        }(window, m, step__0, l
        )
      ];
    return 0;
  }
  loop(d, 0);
  return id;
}

function clearTimeout(id) {
  var i = id[1];
  if (i) {
    var x = i[1];
    id[1] = 0;
    var j = function(x) {
      return call1(caml_get_public_method(x, 880135316, 167), x);
    };
    return function(t134, t133, param) {return t134.clearTimeout(t133);}(window, x, j
    );
  }
  return 0;
}

function js_array_of_collection(c) {return  [].slice .call(c);}

var Js_of_ocaml_Dom_html = [
  0,
  d,
  document,
  getElementById_opt,
  getElementById_exn,
  getElementById_coerce,
  getElementById,
  location_origin,
  window,
  no_handler,
  handler,
  full_handler,
  invoke_handler,
  eventTarget,
  eventRelatedTarget,
  Event,
  addEventListener,
  removeEventListener,
  addMousewheelEventListener,
  buttonPressed,
  eventAbsolutePosition__0,
  elementClientPosition,
  getDocumentScroll,
  [0,of_event,try_key_code_normal],
  [0,of_event__0],
  createHtml,
  createHead,
  createLink,
  createTitle,
  createMeta,
  createBase,
  createStyle,
  createBody,
  createForm,
  createOptgroup,
  createOption,
  createSelect,
  createInput,
  createTextarea,
  createButton,
  createLabel,
  createFieldset,
  createLegend,
  createUl,
  createOl,
  createDl,
  createLi,
  createDiv,
  createEmbed,
  createP,
  createH1,
  createH2,
  createH3,
  createH4,
  createH5,
  createH6,
  createQ,
  createBlockquote,
  createPre,
  createBr,
  createHr,
  createIns,
  createDel,
  createA,
  createImg,
  createObject,
  createParam,
  createMap,
  createArea,
  createScript,
  createTable,
  createCaption,
  createCol,
  createColgroup,
  createThead,
  createTfoot,
  createTbody,
  createTr,
  createTh,
  createTd,
  createSub,
  createSup,
  createSpan,
  createTt,
  createI,
  createB,
  createBig,
  createSmall,
  createEm,
  createStrong,
  createCite,
  createDfn,
  createCode,
  createSamp,
  createKbd,
  createVar,
  createAbbr,
  createDd,
  createDt,
  createNoscript,
  createAddress,
  createFrameset,
  createFrame,
  createIframe,
  createAudio,
  createVideo,
  Canvas_not_available,
  createCanvas,
  element__0,
  tagged,
  opt_tagged,
  taggedEvent,
  opt_taggedEvent,
  stopPropagation,
  [
    0,
    element,
    a__0,
    area,
    audio,
    base,
    blockquote,
    body,
    br,
    button,
    canvas,
    caption,
    col,
    colgroup,
    del,
    div,
    embed,
    dl,
    fieldset,
    form,
    frameset,
    frame,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    head,
    hr,
    html,
    iframe,
    img,
    input__0,
    ins,
    label,
    legend,
    li,
    link,
    map,
    meta,
    object,
    ol,
    optgroup,
    option,
    p,
    param,
    pre,
    q,
    script,
    select__0,
    style,
    table,
    tbody,
    td,
    textarea,
    tfoot,
    th,
    thead,
    title,
    tr,
    ul,
    video,
    mouseEvent,
    keyboardEvent,
    wheelEvent,
    mouseScrollEvent,
    popStateEvent
  ],
  setTimeout,
  clearTimeout,
  js_array_of_collection,
  requestAnimationFrame,
  function(h) {return runtime["caml_js_html_entities"](h);},
  onIE,
  hasPushState,
  hasPlaceholder,
  hasRequired
];

runtime["caml_register_global"](
  542,
  Js_of_ocaml_Dom_html,
  "Js_of_ocaml__Dom_html"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Dom_html;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
