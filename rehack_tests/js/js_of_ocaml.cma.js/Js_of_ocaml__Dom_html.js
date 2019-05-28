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
var caml_new_string = runtime["caml_new_string"];
var caml_string_compare = runtime["caml_string_compare"];
var caml_string_notequal = runtime["caml_string_notequal"];
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
var cst_a__1 = caml_new_string("a");
var cst_area__1 = caml_new_string("area");
var cst_audio__1 = caml_new_string("audio");
var cst_base__1 = caml_new_string("base");
var cst_blockquote__1 = caml_new_string("blockquote");
var cst_body__1 = caml_new_string("body");
var cst_br__1 = caml_new_string("br");
var cst_button__1 = caml_new_string("button");
var cst_canvas__1 = caml_new_string("canvas");
var cst_caption__1 = caml_new_string("caption");
var cst_col__1 = caml_new_string("col");
var cst_colgroup__1 = caml_new_string("colgroup");
var cst_del__1 = caml_new_string("del");
var cst_div__1 = caml_new_string("div");
var cst_dl__1 = caml_new_string("dl");
var cst_embed__1 = caml_new_string("embed");
var cst_fieldset__1 = caml_new_string("fieldset");
var cst_form__1 = caml_new_string("form");
var cst_frame__1 = caml_new_string("frame");
var cst_frameset__1 = caml_new_string("frameset");
var cst_h1__1 = caml_new_string("h1");
var cst_h2__1 = caml_new_string("h2");
var cst_h3__1 = caml_new_string("h3");
var cst_h4__1 = caml_new_string("h4");
var cst_h5__1 = caml_new_string("h5");
var cst_h6__1 = caml_new_string("h6");
var cst_head__1 = caml_new_string("head");
var cst_hr__1 = caml_new_string("hr");
var cst_html__1 = caml_new_string("html");
var cst_iframe__1 = caml_new_string("iframe");
var cst_img__1 = caml_new_string("img");
var cst_input__2 = caml_new_string("input");
var cst_ins__1 = caml_new_string("ins");
var cst_label__1 = caml_new_string("label");
var cst_legend__1 = caml_new_string("legend");
var cst_li__1 = caml_new_string("li");
var cst_link__1 = caml_new_string("link");
var cst_map__1 = caml_new_string("map");
var cst_meta__1 = caml_new_string("meta");
var cst_object__1 = caml_new_string("object");
var cst_ol__1 = caml_new_string("ol");
var cst_optgroup__1 = caml_new_string("optgroup");
var cst_option__1 = caml_new_string("option");
var cst_p__1 = caml_new_string("p");
var cst_param__1 = caml_new_string("param");
var cst_pre__1 = caml_new_string("pre");
var cst_q__1 = caml_new_string("q");
var cst_script__1 = caml_new_string("script");
var cst_select__2 = caml_new_string("select");
var cst_style__1 = caml_new_string("style");
var cst_table__1 = caml_new_string("table");
var cst_tbody__1 = caml_new_string("tbody");
var cst_td__1 = caml_new_string("td");
var cst_textarea__1 = caml_new_string("textarea");
var cst_tfoot__1 = caml_new_string("tfoot");
var cst_th__1 = caml_new_string("th");
var cst_thead__1 = caml_new_string("thead");
var cst_title__1 = caml_new_string("title");
var cst_tr__1 = caml_new_string("tr");
var cst_ul__1 = caml_new_string("ul");
var cst_video__1 = caml_new_string("video");
var cst_KeyH = caml_new_string("KeyH");
var cst_Digit6 = caml_new_string("Digit6");
var cst_BrowserRefresh = caml_new_string("BrowserRefresh");
var cst_Backslash = caml_new_string("Backslash");
var cst_AltLeft = caml_new_string("AltLeft");
var cst_AltRight = caml_new_string("AltRight");
var cst_ArrowDown = caml_new_string("ArrowDown");
var cst_ArrowLeft = caml_new_string("ArrowLeft");
var cst_ArrowRight = caml_new_string("ArrowRight");
var cst_ArrowUp = caml_new_string("ArrowUp");
var cst_Backquote = caml_new_string("Backquote");
var cst_Backspace = caml_new_string("Backspace");
var cst_BracketLeft = caml_new_string("BracketLeft");
var cst_BracketRight = caml_new_string("BracketRight");
var cst_BrowserBack = caml_new_string("BrowserBack");
var cst_BrowserFavorites = caml_new_string("BrowserFavorites");
var cst_BrowserForward = caml_new_string("BrowserForward");
var cst_BrowserHome = caml_new_string("BrowserHome");
var cst_Delete = caml_new_string("Delete");
var cst_BrowserSearch = caml_new_string("BrowserSearch");
var cst_BrowserStop = caml_new_string("BrowserStop");
var cst_CapsLock = caml_new_string("CapsLock");
var cst_Comma = caml_new_string("Comma");
var cst_ContextMenu = caml_new_string("ContextMenu");
var cst_ControlLeft = caml_new_string("ControlLeft");
var cst_ControlRight = caml_new_string("ControlRight");
var cst_Digit0 = caml_new_string("Digit0");
var cst_Digit1 = caml_new_string("Digit1");
var cst_Digit2 = caml_new_string("Digit2");
var cst_Digit3 = caml_new_string("Digit3");
var cst_Digit4 = caml_new_string("Digit4");
var cst_Digit5 = caml_new_string("Digit5");
var cst_F6 = caml_new_string("F6");
var cst_F1 = caml_new_string("F1");
var cst_Digit7 = caml_new_string("Digit7");
var cst_Digit8 = caml_new_string("Digit8");
var cst_Digit9 = caml_new_string("Digit9");
var cst_End = caml_new_string("End");
var cst_Enter = caml_new_string("Enter");
var cst_Equal = caml_new_string("Equal");
var cst_Escape = caml_new_string("Escape");
var cst_F10 = caml_new_string("F10");
var cst_F11 = caml_new_string("F11");
var cst_F12 = caml_new_string("F12");
var cst_F2 = caml_new_string("F2");
var cst_F3 = caml_new_string("F3");
var cst_F4 = caml_new_string("F4");
var cst_F5 = caml_new_string("F5");
var cst_KeyA = caml_new_string("KeyA");
var cst_F7 = caml_new_string("F7");
var cst_F8 = caml_new_string("F8");
var cst_F9 = caml_new_string("F9");
var cst_Home = caml_new_string("Home");
var cst_Insert = caml_new_string("Insert");
var cst_IntlBackslash = caml_new_string("IntlBackslash");
var cst_IntlYen = caml_new_string("IntlYen");
var cst_KeyB = caml_new_string("KeyB");
var cst_KeyC = caml_new_string("KeyC");
var cst_KeyD = caml_new_string("KeyD");
var cst_KeyE = caml_new_string("KeyE");
var cst_KeyF = caml_new_string("KeyF");
var cst_KeyG = caml_new_string("KeyG");
var cst_Numpad4 = caml_new_string("Numpad4");
var cst_KeyX = caml_new_string("KeyX");
var cst_KeyP = caml_new_string("KeyP");
var cst_KeyI = caml_new_string("KeyI");
var cst_KeyJ = caml_new_string("KeyJ");
var cst_KeyK = caml_new_string("KeyK");
var cst_KeyL = caml_new_string("KeyL");
var cst_KeyM = caml_new_string("KeyM");
var cst_KeyN = caml_new_string("KeyN");
var cst_KeyO = caml_new_string("KeyO");
var cst_KeyQ = caml_new_string("KeyQ");
var cst_KeyR = caml_new_string("KeyR");
var cst_KeyS = caml_new_string("KeyS");
var cst_KeyT = caml_new_string("KeyT");
var cst_KeyU = caml_new_string("KeyU");
var cst_KeyV = caml_new_string("KeyV");
var cst_KeyW = caml_new_string("KeyW");
var cst_MetaRight = caml_new_string("MetaRight");
var cst_KeyY = caml_new_string("KeyY");
var cst_KeyZ = caml_new_string("KeyZ");
var cst_MediaPlayPause = caml_new_string("MediaPlayPause");
var cst_MediaStop = caml_new_string("MediaStop");
var cst_MediaTrackNext = caml_new_string("MediaTrackNext");
var cst_MediaTrackPrevious = caml_new_string("MediaTrackPrevious");
var cst_MetaLeft = caml_new_string("MetaLeft");
var cst_Minus = caml_new_string("Minus");
var cst_NumLock = caml_new_string("NumLock");
var cst_Numpad0 = caml_new_string("Numpad0");
var cst_Numpad1 = caml_new_string("Numpad1");
var cst_Numpad2 = caml_new_string("Numpad2");
var cst_Numpad3 = caml_new_string("Numpad3");
var cst_PageUp = caml_new_string("PageUp");
var cst_NumpadDivide = caml_new_string("NumpadDivide");
var cst_Numpad5 = caml_new_string("Numpad5");
var cst_Numpad6 = caml_new_string("Numpad6");
var cst_Numpad7 = caml_new_string("Numpad7");
var cst_Numpad8 = caml_new_string("Numpad8");
var cst_Numpad9 = caml_new_string("Numpad9");
var cst_NumpadAdd = caml_new_string("NumpadAdd");
var cst_NumpadDecimal = caml_new_string("NumpadDecimal");
var cst_NumpadEnter = caml_new_string("NumpadEnter");
var cst_NumpadEqual = caml_new_string("NumpadEqual");
var cst_NumpadMultiply = caml_new_string("NumpadMultiply");
var cst_NumpadSubtract = caml_new_string("NumpadSubtract");
var cst_OSLeft = caml_new_string("OSLeft");
var cst_OSRight = caml_new_string("OSRight");
var cst_PageDown = caml_new_string("PageDown");
var cst_ShiftRight = caml_new_string("ShiftRight");
var cst_Pause = caml_new_string("Pause");
var cst_Period = caml_new_string("Period");
var cst_PrintScreen = caml_new_string("PrintScreen");
var cst_Quote = caml_new_string("Quote");
var cst_ScrollLock = caml_new_string("ScrollLock");
var cst_Semicolon = caml_new_string("Semicolon");
var cst_ShiftLeft = caml_new_string("ShiftLeft");
var cst_Slash = caml_new_string("Slash");
var cst_Space = caml_new_string("Space");
var cst_Tab = caml_new_string("Tab");
var cst_VolumeDown = caml_new_string("VolumeDown");
var cst_VolumeMute = caml_new_string("VolumeMute");
var cst_VolumeUp = caml_new_string("VolumeUp");
var cst_mouseout__0 = caml_new_string("mouseout");
var cst_mouseover__0 = caml_new_string("mouseover");
var cst_video__0 = caml_new_string("video");
var cst_audio__0 = caml_new_string("audio");
var cst_ul__0 = caml_new_string("ul");
var cst_tr__0 = caml_new_string("tr");
var cst_title__0 = caml_new_string("title");
var cst_thead__0 = caml_new_string("thead");
var cst_th__0 = caml_new_string("th");
var cst_tfoot__0 = caml_new_string("tfoot");
var cst_textarea__0 = caml_new_string("textarea");
var cst_td__0 = caml_new_string("td");
var cst_tbody__0 = caml_new_string("tbody");
var cst_table__0 = caml_new_string("table");
var cst_style__0 = caml_new_string("style");
var cst_select__1 = caml_new_string("select");
var cst_script__0 = caml_new_string("script");
var cst_q__0 = caml_new_string("q");
var cst_pre__0 = caml_new_string("pre");
var cst_param__0 = caml_new_string("param");
var cst_p__0 = caml_new_string("p");
var cst_option__0 = caml_new_string("option");
var cst_optgroup__0 = caml_new_string("optgroup");
var cst_ol__0 = caml_new_string("ol");
var cst_object__0 = caml_new_string("object");
var cst_meta__0 = caml_new_string("meta");
var cst_map__0 = caml_new_string("map");
var cst_link__0 = caml_new_string("link");
var cst_li__0 = caml_new_string("li");
var cst_legend__0 = caml_new_string("legend");
var cst_label__0 = caml_new_string("label");
var cst_ins__0 = caml_new_string("ins");
var cst_input__1 = caml_new_string("input");
var cst_img__0 = caml_new_string("img");
var cst_iframe__0 = caml_new_string("iframe");
var cst_html__0 = caml_new_string("html");
var cst_hr__0 = caml_new_string("hr");
var cst_head__0 = caml_new_string("head");
var cst_h6__0 = caml_new_string("h6");
var cst_h5__0 = caml_new_string("h5");
var cst_h4__0 = caml_new_string("h4");
var cst_h3__0 = caml_new_string("h3");
var cst_h2__0 = caml_new_string("h2");
var cst_h1__0 = caml_new_string("h1");
var cst_frame__0 = caml_new_string("frame");
var cst_frameset__0 = caml_new_string("frameset");
var cst_form__0 = caml_new_string("form");
var cst_embed__0 = caml_new_string("embed");
var cst_fieldset__0 = caml_new_string("fieldset");
var cst_dl__0 = caml_new_string("dl");
var cst_div__0 = caml_new_string("div");
var cst_del__0 = caml_new_string("del");
var cst_colgroup__0 = caml_new_string("colgroup");
var cst_col__0 = caml_new_string("col");
var cst_caption__0 = caml_new_string("caption");
var cst_canvas__0 = caml_new_string("canvas");
var cst_button__0 = caml_new_string("button");
var cst_br__0 = caml_new_string("br");
var cst_body__0 = caml_new_string("body");
var cst_blockquote__0 = caml_new_string("blockquote");
var cst_base__0 = caml_new_string("base");
var cst_area__0 = caml_new_string("area");
var cst_a__0 = caml_new_string("a");
var cst_canvas = caml_new_string("canvas");
var cst_video = caml_new_string("video");
var cst_audio = caml_new_string("audio");
var cst_iframe = caml_new_string("iframe");
var cst_frame = caml_new_string("frame");
var cst_frameset = caml_new_string("frameset");
var cst_address = caml_new_string("address");
var cst_noscript = caml_new_string("noscript");
var cst_dt = caml_new_string("dt");
var cst_dd = caml_new_string("dd");
var cst_abbr = caml_new_string("abbr");
var cst_var = caml_new_string("var");
var cst_kbd = caml_new_string("kbd");
var cst_samp = caml_new_string("samp");
var cst_code = caml_new_string("code");
var cst_dfn = caml_new_string("dfn");
var cst_cite = caml_new_string("cite");
var cst_strong = caml_new_string("strong");
var cst_em = caml_new_string("em");
var cst_small = caml_new_string("small");
var cst_big = caml_new_string("big");
var cst_b = caml_new_string("b");
var cst_i = caml_new_string("i");
var cst_tt = caml_new_string("tt");
var cst_span = caml_new_string("span");
var cst_sup = caml_new_string("sup");
var cst_sub = caml_new_string("sub");
var cst_td = caml_new_string("td");
var cst_th = caml_new_string("th");
var cst_tr = caml_new_string("tr");
var cst_tbody = caml_new_string("tbody");
var cst_tfoot = caml_new_string("tfoot");
var cst_thead = caml_new_string("thead");
var cst_colgroup = caml_new_string("colgroup");
var cst_col = caml_new_string("col");
var cst_caption = caml_new_string("caption");
var cst_table = caml_new_string("table");
var cst_script = caml_new_string("script");
var cst_area = caml_new_string("area");
var cst_map = caml_new_string("map");
var cst_param = caml_new_string("param");
var cst_object = caml_new_string("object");
var cst_img = caml_new_string("img");
var cst_a = caml_new_string("a");
var cst_del = caml_new_string("del");
var cst_ins = caml_new_string("ins");
var cst_hr = caml_new_string("hr");
var cst_br = caml_new_string("br");
var cst_pre = caml_new_string("pre");
var cst_blockquote = caml_new_string("blockquote");
var cst_q = caml_new_string("q");
var cst_h6 = caml_new_string("h6");
var cst_h5 = caml_new_string("h5");
var cst_h4 = caml_new_string("h4");
var cst_h3 = caml_new_string("h3");
var cst_h2 = caml_new_string("h2");
var cst_h1 = caml_new_string("h1");
var cst_p = caml_new_string("p");
var cst_embed = caml_new_string("embed");
var cst_div = caml_new_string("div");
var cst_li = caml_new_string("li");
var cst_dl = caml_new_string("dl");
var cst_ol = caml_new_string("ol");
var cst_ul = caml_new_string("ul");
var cst_legend = caml_new_string("legend");
var cst_fieldset = caml_new_string("fieldset");
var cst_label = caml_new_string("label");
var cst_button = caml_new_string("button");
var cst_textarea = caml_new_string("textarea");
var cst_input__0 = caml_new_string("input");
var cst_select__0 = caml_new_string("select");
var cst_option = caml_new_string("option");
var cst_optgroup = caml_new_string("optgroup");
var cst_form = caml_new_string("form");
var cst_body = caml_new_string("body");
var cst_style = caml_new_string("style");
var cst_base = caml_new_string("base");
var cst_meta = caml_new_string("meta");
var cst_title = caml_new_string("title");
var cst_link = caml_new_string("link");
var cst_head = caml_new_string("head");
var cst_html = caml_new_string("html");
var cst_click = caml_new_string("click");
var cst_dblclick = caml_new_string("dblclick");
var cst_mousedown = caml_new_string("mousedown");
var cst_mouseup = caml_new_string("mouseup");
var cst_mouseover = caml_new_string("mouseover");
var cst_mousemove = caml_new_string("mousemove");
var cst_mouseout = caml_new_string("mouseout");
var cst_keypress = caml_new_string("keypress");
var cst_keydown = caml_new_string("keydown");
var cst_keyup = caml_new_string("keyup");
var cst_mousewheel = caml_new_string("mousewheel");
var cst_DOMMouseScroll = caml_new_string("DOMMouseScroll");
var cst_touchstart = caml_new_string("touchstart");
var cst_touchmove = caml_new_string("touchmove");
var cst_touchend = caml_new_string("touchend");
var cst_touchcancel = caml_new_string("touchcancel");
var cst_dragstart = caml_new_string("dragstart");
var cst_dragend = caml_new_string("dragend");
var cst_dragenter = caml_new_string("dragenter");
var cst_dragover = caml_new_string("dragover");
var cst_dragleave = caml_new_string("dragleave");
var cst_drag = caml_new_string("drag");
var cst_drop = caml_new_string("drop");
var cst_hashchange = caml_new_string("hashchange");
var cst_change = caml_new_string("change");
var cst_input = caml_new_string("input");
var cst_timeupdate = caml_new_string("timeupdate");
var cst_submit = caml_new_string("submit");
var cst_scroll = caml_new_string("scroll");
var cst_focus = caml_new_string("focus");
var cst_blur = caml_new_string("blur");
var cst_load = caml_new_string("load");
var cst_unload = caml_new_string("unload");
var cst_beforeunload = caml_new_string("beforeunload");
var cst_resize = caml_new_string("resize");
var cst_orientationchange = caml_new_string("orientationchange");
var cst_popstate = caml_new_string("popstate");
var cst_error = caml_new_string("error");
var cst_abort = caml_new_string("abort");
var cst_select = caml_new_string("select");
var cst_online = caml_new_string("online");
var cst_offline = caml_new_string("offline");
var cst_checking = caml_new_string("checking");
var cst_noupdate = caml_new_string("noupdate");
var cst_downloading = caml_new_string("downloading");
var cst_progress = caml_new_string("progress");
var cst_updateready = caml_new_string("updateready");
var cst_cached = caml_new_string("cached");
var cst_obsolete = caml_new_string("obsolete");
var cst_DOMContentLoaded = caml_new_string("DOMContentLoaded");
var cst_animationstart = caml_new_string("animationstart");
var cst_animationend = caml_new_string("animationend");
var cst_animationiteration = caml_new_string("animationiteration");
var cst_animationcancel = caml_new_string("animationcancel");
var cst_canplay = caml_new_string("canplay");
var cst_canplaythrough = caml_new_string("canplaythrough");
var cst_durationchange = caml_new_string("durationchange");
var cst_emptied = caml_new_string("emptied");
var cst_ended = caml_new_string("ended");
var cst_loadeddata = caml_new_string("loadeddata");
var cst_loadedmetadata = caml_new_string("loadedmetadata");
var cst_loadstart = caml_new_string("loadstart");
var cst_pause = caml_new_string("pause");
var cst_play = caml_new_string("play");
var cst_playing = caml_new_string("playing");
var cst_ratechange = caml_new_string("ratechange");
var cst_seeked = caml_new_string("seeked");
var cst_seeking = caml_new_string("seeking");
var cst_stalled = caml_new_string("stalled");
var cst_suspend = caml_new_string("suspend");
var cst_volumechange = caml_new_string("volumechange");
var cst_waiting = caml_new_string("waiting");
var cst_Js_of_ocaml_Dom_html_Canvas_not_available = caml_new_string(
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
var gN = [0,caml_new_string("lib/js_of_ocaml/dom_html.ml"),2704,58];
var gM = [0,caml_new_string("lib/js_of_ocaml/dom_html.ml"),2703,61];
var gI = [
  0,
  [
    11,
    caml_new_string("getElementById_exn: "),
    [3,0,[11,caml_new_string(" not found"),0]]
  ],
  caml_new_string("getElementById_exn: %S not found")
];
var onIE = runtime["caml_js_on_ie"](0) | 0;
var no_handler = Js_of_ocaml_Dom[9];
var handler = Js_of_ocaml_Dom[10];
var full_handler = Js_of_ocaml_Dom[11];
var invoke_handler = Js_of_ocaml_Dom[12];
var click = caml_call1(Js_of_ocaml_Dom[14][1], cst_click);
var dblclick = caml_call1(Js_of_ocaml_Dom[14][1], cst_dblclick);
var mousedown = caml_call1(Js_of_ocaml_Dom[14][1], cst_mousedown);
var mouseup = caml_call1(Js_of_ocaml_Dom[14][1], cst_mouseup);
var mouseover = caml_call1(Js_of_ocaml_Dom[14][1], cst_mouseover);
var mousemove = caml_call1(Js_of_ocaml_Dom[14][1], cst_mousemove);
var mouseout = caml_call1(Js_of_ocaml_Dom[14][1], cst_mouseout);
var keypress = caml_call1(Js_of_ocaml_Dom[14][1], cst_keypress);
var keydown = caml_call1(Js_of_ocaml_Dom[14][1], cst_keydown);
var keyup = caml_call1(Js_of_ocaml_Dom[14][1], cst_keyup);
var mousewheel = caml_call1(Js_of_ocaml_Dom[14][1], cst_mousewheel);
var DOMMouseScroll = caml_call1(Js_of_ocaml_Dom[14][1], cst_DOMMouseScroll);
var touchstart = caml_call1(Js_of_ocaml_Dom[14][1], cst_touchstart);
var touchmove = caml_call1(Js_of_ocaml_Dom[14][1], cst_touchmove);
var touchend = caml_call1(Js_of_ocaml_Dom[14][1], cst_touchend);
var touchcancel = caml_call1(Js_of_ocaml_Dom[14][1], cst_touchcancel);
var dragstart = caml_call1(Js_of_ocaml_Dom[14][1], cst_dragstart);
var dragend = caml_call1(Js_of_ocaml_Dom[14][1], cst_dragend);
var dragenter = caml_call1(Js_of_ocaml_Dom[14][1], cst_dragenter);
var dragover = caml_call1(Js_of_ocaml_Dom[14][1], cst_dragover);
var dragleave = caml_call1(Js_of_ocaml_Dom[14][1], cst_dragleave);
var drag = caml_call1(Js_of_ocaml_Dom[14][1], cst_drag);
var drop = caml_call1(Js_of_ocaml_Dom[14][1], cst_drop);
var hashchange = caml_call1(Js_of_ocaml_Dom[14][1], cst_hashchange);
var change = caml_call1(Js_of_ocaml_Dom[14][1], cst_change);
var input = caml_call1(Js_of_ocaml_Dom[14][1], cst_input);
var timeupdate = caml_call1(Js_of_ocaml_Dom[14][1], cst_timeupdate);
var submit = caml_call1(Js_of_ocaml_Dom[14][1], cst_submit);
var scroll = caml_call1(Js_of_ocaml_Dom[14][1], cst_scroll);
var focus = caml_call1(Js_of_ocaml_Dom[14][1], cst_focus);
var blur = caml_call1(Js_of_ocaml_Dom[14][1], cst_blur);
var load = caml_call1(Js_of_ocaml_Dom[14][1], cst_load);
var unload = caml_call1(Js_of_ocaml_Dom[14][1], cst_unload);
var beforeunload = caml_call1(Js_of_ocaml_Dom[14][1], cst_beforeunload);
var resize = caml_call1(Js_of_ocaml_Dom[14][1], cst_resize);
var orientationchange = caml_call1(
  Js_of_ocaml_Dom[14][1],
  cst_orientationchange
);
var popstate = caml_call1(Js_of_ocaml_Dom[14][1], cst_popstate);
var error = caml_call1(Js_of_ocaml_Dom[14][1], cst_error);
var abort = caml_call1(Js_of_ocaml_Dom[14][1], cst_abort);
var select = caml_call1(Js_of_ocaml_Dom[14][1], cst_select);
var online = caml_call1(Js_of_ocaml_Dom[14][1], cst_online);
var offline = caml_call1(Js_of_ocaml_Dom[14][1], cst_offline);
var checking = caml_call1(Js_of_ocaml_Dom[14][1], cst_checking);
var noupdate = caml_call1(Js_of_ocaml_Dom[14][1], cst_noupdate);
var downloading = caml_call1(Js_of_ocaml_Dom[14][1], cst_downloading);
var progress = caml_call1(Js_of_ocaml_Dom[14][1], cst_progress);
var updateready = caml_call1(Js_of_ocaml_Dom[14][1], cst_updateready);
var cached = caml_call1(Js_of_ocaml_Dom[14][1], cst_cached);
var obsolete = caml_call1(Js_of_ocaml_Dom[14][1], cst_obsolete);
var domContentLoaded = caml_call1(Js_of_ocaml_Dom[14][1], cst_DOMContentLoaded
);
var animationstart = caml_call1(Js_of_ocaml_Dom[14][1], cst_animationstart);
var animationend = caml_call1(Js_of_ocaml_Dom[14][1], cst_animationend);
var animationiteration = caml_call1(
  Js_of_ocaml_Dom[14][1],
  cst_animationiteration
);
var animationcancel = caml_call1(Js_of_ocaml_Dom[14][1], cst_animationcancel);
var canplay = caml_call1(Js_of_ocaml_Dom[14][1], cst_canplay);
var canplaythrough = caml_call1(Js_of_ocaml_Dom[14][1], cst_canplaythrough);
var durationchange = caml_call1(Js_of_ocaml_Dom[14][1], cst_durationchange);
var emptied = caml_call1(Js_of_ocaml_Dom[14][1], cst_emptied);
var ended = caml_call1(Js_of_ocaml_Dom[14][1], cst_ended);
var loadeddata = caml_call1(Js_of_ocaml_Dom[14][1], cst_loadeddata);
var loadedmetadata = caml_call1(Js_of_ocaml_Dom[14][1], cst_loadedmetadata);
var loadstart = caml_call1(Js_of_ocaml_Dom[14][1], cst_loadstart);
var pause = caml_call1(Js_of_ocaml_Dom[14][1], cst_pause);
var play = caml_call1(Js_of_ocaml_Dom[14][1], cst_play);
var playing = caml_call1(Js_of_ocaml_Dom[14][1], cst_playing);
var ratechange = caml_call1(Js_of_ocaml_Dom[14][1], cst_ratechange);
var seeked = caml_call1(Js_of_ocaml_Dom[14][1], cst_seeked);
var seeking = caml_call1(Js_of_ocaml_Dom[14][1], cst_seeking);
var stalled = caml_call1(Js_of_ocaml_Dom[14][1], cst_stalled);
var suspend = caml_call1(Js_of_ocaml_Dom[14][1], cst_suspend);
var volumechange = caml_call1(Js_of_ocaml_Dom[14][1], cst_volumechange);
var waiting = caml_call1(Js_of_ocaml_Dom[14][1], cst_waiting);
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
  function kF(o) {return o;}
  function kG(param) {
    function kJ(x) {
      return caml_call1(caml_get_public_method(x, 6510168, 91), x);
    }
    var protocol = function(t13, param) {return t13.protocol;}(loc, kJ);
    function kK(x) {
      return caml_call1(caml_get_public_method(x, -757983821, 92), x);
    }
    var hostname = function(t12, param) {return t12.hostname;}(loc, kK);
    function kL(x) {
      return caml_call1(caml_get_public_method(x, -899906687, 93), x);
    }
    var port = function(t11, param) {return t11.port;}(loc, kL);
    function kM(x) {
      return caml_call1(caml_get_public_method(x, 520590566, 94), x);
    }
    if (0 === function(t9, param) {return t9.length;}(protocol, kM)) {
      var kN = function(x) {
        return caml_call1(caml_get_public_method(x, 520590566, 95), x);
      };
      if (0 === function(t10, param) {return t10.length;}(hostname, kN)) {return "";}
    }
    function kO(x) {
      return caml_call1(caml_get_public_method(x, -491534073, 96), x);
    }
    var kP = "//";
    var origin = function(t8, t6, t7, param) {return t8.concat(t6, t7);}(protocol, kP, hostname, kO
    );
    function kQ(x) {
      return caml_call1(caml_get_public_method(x, 520590566, 97), x);
    }
    if (0 < function(t5, param) {return t5.length;}(port, kQ)) {
      var kR = function(x) {
        return caml_call1(caml_get_public_method(x, -491534073, 98), x);
      };
      var kS = function(x) {
        return caml_call1(caml_get_public_method(x, -899906687, 99), x);
      };
      var kT = function(t1, param) {return t1.port;}(loc, kS);
      var kU = ":";
      return function(t4, t2, t3, param) {return t4.concat(t2, t3);}(origin, kU, kT, kR
      );
    }
    return origin;
  }
  function kH(x) {
    return caml_call1(caml_get_public_method(x, -889120282, 100), x);
  }
  var kI = function(t0, param) {return t0.origin;}(loc, kH);
  return caml_call3(Js_of_ocaml_Js[6][7], kI, kG, kF);
}

var window = Js_of_ocaml_Js[50][1];

function gH(x) {
  return caml_call1(caml_get_public_method(x, 454225691, 101), x);
}

var document = function(t14, param) {return t14.document;}(window, gH);

function getElementById(id) {
  function kA(pnode) {return pnode;}
  function kB(param) {throw runtime["caml_wrap_thrown_exception"](Not_found);}
  function kC(x) {
    return caml_call1(caml_get_public_method(x, -332188296, 102), x);
  }
  var kD = id.toString();
  var kE = function(t16, t15, param) {return t16.getElementById(t15);}(document, kD, kC
  );
  return caml_call3(Js_of_ocaml_Js[5][7], kE, kB, kA);
}

function getElementById_exn(id) {
  function ku(pnode) {return pnode;}
  function kv(param) {
    var kz = caml_call2(Printf[4], gI, id);
    return caml_call1(Pervasives[2], kz);
  }
  function kw(x) {
    return caml_call1(caml_get_public_method(x, -332188296, 103), x);
  }
  var kx = id.toString();
  var ky = function(t18, t17, param) {return t18.getElementById(t17);}(document, kx, kw
  );
  return caml_call3(Js_of_ocaml_Js[5][7], ky, kv, ku);
}

function getElementById_opt(id) {
  function kr(x) {
    return caml_call1(caml_get_public_method(x, -332188296, 104), x);
  }
  var ks = id.toString();
  var kt = function(t20, t19, param) {return t20.getElementById(t19);}(document, ks, kr
  );
  return caml_call1(Js_of_ocaml_Js[5][10], kt);
}

function getElementById_coerce(id, coerce) {
  function kl(e) {
    var kq = caml_call1(coerce, e);
    return caml_call1(Js_of_ocaml_Js[5][10], kq);
  }
  function km(param) {return 0;}
  function kn(x) {
    return caml_call1(caml_get_public_method(x, -332188296, 105), x);
  }
  var ko = id.toString();
  var kp = function(t22, t21, param) {return t22.getElementById(t21);}(document, ko, kn
  );
  return caml_call3(Js_of_ocaml_Js[5][7], kp, km, kl);
}

function opt_iter(x, f) {
  if (x) {var v = x[1];return caml_call1(f, v);}
  return 0;
}

function createElement(doc, name) {
  function kj(x) {
    return caml_call1(caml_get_public_method(x, -292059360, 106), x);
  }
  var kk = name.toString();
  return function(t24, t23, param) {return t24.createElement(t23);}(doc, kk, kj
  );
}

function unsafeCreateElement(doc, name) {return createElement(doc, name);}

var createElementSyntax = [0,785140586];

function unsafeCreateElementEx(type, name, doc, elt) {
  for (; ; ) {
    if (0 === type) {if (0 === name) {return createElement(doc, elt);}}
    var jL = createElementSyntax[1];
    if (785140586 === jL) {
      try {
        var jO = function(x) {
          return caml_call1(caml_get_public_method(x, -292059360, 107), x);
        };
        var jP = '<input name="x">';
        var el = function(t51, t50, param) {return t51.createElement(t50);}(document, jP, jO
        );
        var jQ = "input";
        var jR = function(x) {
          return caml_call1(caml_get_public_method(x, 946097238, 108), x);
        };
        var jS = function(x) {
          return caml_call1(caml_get_public_method(x, 578170309, 109), x);
        };
        var jT = function(t47, param) {return t47.tagName;}(el, jS);
        var jU = function(t48, param) {return t48.toLowerCase();}(jT, jR) === jQ ?
          1 :
          0;
        if (jU) {
          var jV = "x";
          var jW = function(x) {
            return caml_call1(caml_get_public_method(x, -922783157, 110), x);
          };
          var jX = function(t49, param) {return t49.name;}(el, jW) === jV ?
            1 :
            0;
        }
        else var jX = jU;
        var jM = jX;
      }
      catch(ki) {var jM = 0;}
      if (jM) var jN = 982028505;
      else var jN = -1003883683;
      createElementSyntax[1] = jN;
      continue;
    }
    if (982028505 <= jL) {
      var jY = 0;
      var jZ = Js_of_ocaml_Js[14];
      var a = function(t46, param) {return new t46();}(jZ, jY);
      var j0 = function(x) {
        return caml_call1(caml_get_public_method(x, -231927987, 111), x);
      };
      var j1 = elt.toString();
      var j2 = "<";
      (function(t45, t43, t44, param) {return t45.push(t43, t44);}(a, j2, j1, j0
       ));
      opt_iter(
        type,
        function(t) {
          function ke(x) {
            return caml_call1(caml_get_public_method(x, -231927986, 112), x);
          }
          var kf = '"';
          var kg = caml_js_html_escape(t);
          var kh = ' type="';
          (function(t42, t39, t40, t41, param) {return t42.push(t39, t40, t41);
           }(a, kh, kg, kf, ke
           ));
          return 0;
        }
      );
      opt_iter(
        name,
        function(n) {
          function ka(x) {
            return caml_call1(caml_get_public_method(x, -231927986, 113), x);
          }
          var kb = '"';
          var kc = caml_js_html_escape(n);
          var kd = ' name="';
          (function(t38, t35, t36, t37, param) {return t38.push(t35, t36, t37);
           }(a, kd, kc, kb, ka
           ));
          return 0;
        }
      );
      var j3 = function(x) {
        return caml_call1(caml_get_public_method(x, -899608102, 114), x);
      };
      var j4 = ">";
      (function(t34, t33, param) {return t34.push(t33);}(a, j4, j3));
      var j5 = function(x) {
        return caml_call1(caml_get_public_method(x, -292059360, 115), x);
      };
      var j6 = function(x) {
        return caml_call1(caml_get_public_method(x, -966446102, 116), x);
      };
      var j7 = "";
      var j8 = function(t30, t29, param) {return t30.join(t29);}(a, j7, j6);
      return function(t32, t31, param) {return t32.createElement(t31);}(doc, j8, j5
      );
    }
    var res = createElement(doc, elt);
    opt_iter(
      type,
      function(t) {
        function j_(x) {
          return caml_call1(caml_get_public_method(x, 1707673, 117), x);
        }
        return function(t28, t27, param) {return t28.type = t27;}(res, t, j_);
      }
    );
    opt_iter(
      name,
      function(n) {
        function j9(x) {
          return caml_call1(caml_get_public_method(x, -922783157, 118), x);
        }
        return function(t26, t25, param) {return t26.name = t25;}(res, n, j9);
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
  function jJ(x) {
    return caml_call1(caml_get_public_method(x, -388424711, 119), x);
  }
  var jK = function(t52, param) {return t52.getContext;}(c, jJ);
  if (1 - caml_call1(Js_of_ocaml_Js[5][5], jK)) {
    throw runtime["caml_wrap_thrown_exception"](Canvas_not_available);
  }
  return c;
}

function gJ(x) {
  return caml_call1(caml_get_public_method(x, -29132142, 120), x);
}

var gK = Js_of_ocaml_Js[50][1];
var html_element = function(t53, param) {return t53.HTMLElement;}(gK, gJ);
var gL = Js_of_ocaml_Js[3];

if (caml_call1(Js_of_ocaml_Js[4], html_element) === gL) var element = function(e) {
  var jG = Js_of_ocaml_Js[3];
  function jH(x) {
    return caml_call1(caml_get_public_method(x, 746263041, 121), x);
  }
  var jI = function(t54, param) {return t54.innerHTML;}(e, jH);
  if (caml_call1(Js_of_ocaml_Js[4], jI) === jG) {return Js_of_ocaml_Js[1];}
  return caml_call1(Js_of_ocaml_Js[2], e);
};
else var element = function(e) {
  if (e instanceof html_element) {return caml_call1(Js_of_ocaml_Js[2], e);}
  return Js_of_ocaml_Js[1];
};

function unsafeCoerce(tag, e) {
  var jC = tag.toString();
  function jD(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 122), x);
  }
  function jE(x) {
    return caml_call1(caml_get_public_method(x, 578170309, 123), x);
  }
  var jF = function(t55, param) {return t55.tagName;}(e, jE);
  if (function(t56, param) {return t56.toLowerCase();}(jF, jD) === jC) {return caml_call1(Js_of_ocaml_Js[2], e);}
  return Js_of_ocaml_Js[1];
}

function a(e) {return unsafeCoerce(cst_a__0, e);}

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
  var jB = Js_of_ocaml_Js[3];
  if (caml_call1(Js_of_ocaml_Js[4], constr) !== jB) {
    if (ev instanceof constr) {return caml_call1(Js_of_ocaml_Js[2], ev);}
  }
  return Js_of_ocaml_Js[1];
}

function mouseEvent(ev) {
  function jz(x) {
    return caml_call1(caml_get_public_method(x, -590574348, 124), x);
  }
  var jA = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t57, param) {return t57.MouseEvent;}(jA, jz),
    ev
  );
}

function keyboardEvent(ev) {
  function jx(x) {
    return caml_call1(caml_get_public_method(x, -807764460, 125), x);
  }
  var jy = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t58, param) {return t58.KeyboardEvent;}(jy, jx),
    ev
  );
}

function wheelEvent(ev) {
  function jv(x) {
    return caml_call1(caml_get_public_method(x, 239551166, 126), x);
  }
  var jw = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t59, param) {return t59.WheelEvent;}(jw, jv),
    ev
  );
}

function mouseScrollEvent(ev) {
  function jt(x) {
    return caml_call1(caml_get_public_method(x, -31722201, 127), x);
  }
  var ju = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t60, param) {return t60.MouseScrollEvent;}(ju, jt),
    ev
  );
}

function popStateEvent(ev) {
  function jr(x) {
    return caml_call1(caml_get_public_method(x, -903494309, 128), x);
  }
  var js = Js_of_ocaml_Js[50][1];
  return unsafeCoerceEvent(
    function(t61, param) {return t61.PopStateEvent;}(js, jr),
    ev
  );
}

var eventTarget = Js_of_ocaml_Dom[13];

function eventRelatedTarget(e) {
  function jh(param) {
    function jk(x) {
      return caml_call1(caml_get_public_method(x, 1707673, 129), x);
    }
    var match = caml_js_to_string(
      function(t65, param) {return t65.type;}(e, jk)
    );
    if (caml_string_notequal(match, cst_mouseout__0)) {
      if (caml_string_notequal(match, cst_mouseover__0)) {return Js_of_ocaml_Js[1];}
      var jl = function(param) {
        throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,gM]);
      };
      var jm = function(x) {
        return caml_call1(caml_get_public_method(x, 513086066, 130), x);
      };
      var jn = function(t63, param) {return t63.fromElement;}(e, jm);
      return caml_call2(Js_of_ocaml_Js[6][8], jn, jl);
    }
    function jo(param) {
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,gN]);
    }
    function jp(x) {
      return caml_call1(caml_get_public_method(x, 904455809, 131), x);
    }
    var jq = function(t64, param) {return t64.toElement;}(e, jp);
    return caml_call2(Js_of_ocaml_Js[6][8], jq, jo);
  }
  function ji(x) {
    return caml_call1(caml_get_public_method(x, -629591140, 132), x);
  }
  var jj = function(t62, param) {return t62.relatedTarget;}(e, ji);
  return caml_call2(Js_of_ocaml_Js[6][8], jj, jh);
}

function eventAbsolutePosition(e) {
  function i5(x) {
    return caml_call1(caml_get_public_method(x, -1055163742, 133), x);
  }
  var body = function(t73, param) {return t73.body;}(document, i5);
  function i6(x) {
    return caml_call1(caml_get_public_method(x, 1068552417, 134), x);
  }
  var html = function(t72, param) {return t72.documentElement;}(document, i6);
  function i7(x) {
    return caml_call1(caml_get_public_method(x, 1040845960, 135), x);
  }
  var i8 = function(t71, param) {return t71.scrollTop;}(html, i7);
  function i9(x) {
    return caml_call1(caml_get_public_method(x, 1040845960, 136), x);
  }
  var i_ = function(t70, param) {return t70.scrollTop;}(body, i9);
  function ja(x) {
    return caml_call1(caml_get_public_method(x, -75417682, 137), x);
  }
  var jb = (function(t69, param) {return t69.clientY;}(e, ja) + i_ | 0) + i8 | 0;
  function jc(x) {
    return caml_call1(caml_get_public_method(x, 91199156, 138), x);
  }
  var jd = function(t68, param) {return t68.scrollLeft;}(html, jc);
  function je(x) {
    return caml_call1(caml_get_public_method(x, 91199156, 139), x);
  }
  var jf = function(t67, param) {return t67.scrollLeft;}(body, je);
  function jg(x) {
    return caml_call1(caml_get_public_method(x, -75417683, 140), x);
  }
  return [
    0,
    (function(t66, param) {return t66.clientX;}(e, jg) + jf | 0) + jd | 0,
    jb
  ];
}

function eventAbsolutePosition__0(e) {
  function iX(x) {
    function i1(y) {return [0,x,y];}
    function i2(param) {return eventAbsolutePosition(e);}
    function i3(x) {
      return caml_call1(caml_get_public_method(x, 1028467498, 141), x);
    }
    var i4 = function(t75, param) {return t75.pageY;}(e, i3);
    return caml_call3(Js_of_ocaml_Js[6][7], i4, i2, i1);
  }
  function iY(param) {return eventAbsolutePosition(e);}
  function iZ(x) {
    return caml_call1(caml_get_public_method(x, 1028467497, 142), x);
  }
  var i0 = function(t74, param) {return t74.pageX;}(e, iZ);
  return caml_call3(Js_of_ocaml_Js[6][7], i0, iY, iX);
}

function elementClientPosition(e) {
  function iJ(x) {
    return caml_call1(caml_get_public_method(x, 718768073, 143), x);
  }
  var r = function(t84, param) {return t84.getBoundingClientRect();}(e, iJ);
  function iK(x) {
    return caml_call1(caml_get_public_method(x, -1055163742, 144), x);
  }
  var body = function(t83, param) {return t83.body;}(document, iK);
  function iL(x) {
    return caml_call1(caml_get_public_method(x, 1068552417, 145), x);
  }
  var html = function(t82, param) {return t82.documentElement;}(document, iL);
  function iM(x) {
    return caml_call1(caml_get_public_method(x, -939682550, 146), x);
  }
  var iN = function(t81, param) {return t81.clientTop;}(html, iM);
  function iO(x) {
    return caml_call1(caml_get_public_method(x, -939682550, 147), x);
  }
  var iP = function(t80, param) {return t80.clientTop;}(body, iO);
  function iQ(x) {
    return caml_call1(caml_get_public_method(x, 5793429, 148), x);
  }
  var iR = ((function(t79, param) {return t79.top;}(r, iQ) | 0) - iP | 0) - iN | 0;
  function iS(x) {
    return caml_call1(caml_get_public_method(x, 814972914, 149), x);
  }
  var iT = function(t78, param) {return t78.clientLeft;}(html, iS);
  function iU(x) {
    return caml_call1(caml_get_public_method(x, 814972914, 150), x);
  }
  var iV = function(t77, param) {return t77.clientLeft;}(body, iU);
  function iW(x) {
    return caml_call1(caml_get_public_method(x, -944764921, 151), x);
  }
  return [
    0,
    ((function(t76, param) {return t76.left;}(r, iW) | 0) - iV | 0) - iT | 0,
    iR
  ];
}

function getDocumentScroll(param) {
  function iA(x) {
    return caml_call1(caml_get_public_method(x, -1055163742, 152), x);
  }
  var body = function(t90, param) {return t90.body;}(document, iA);
  function iB(x) {
    return caml_call1(caml_get_public_method(x, 1068552417, 153), x);
  }
  var html = function(t89, param) {return t89.documentElement;}(document, iB);
  function iC(x) {
    return caml_call1(caml_get_public_method(x, 1040845960, 154), x);
  }
  var iD = function(t88, param) {return t88.scrollTop;}(html, iC);
  function iE(x) {
    return caml_call1(caml_get_public_method(x, 1040845960, 155), x);
  }
  var iF = function(t87, param) {return t87.scrollTop;}(body, iE) + iD | 0;
  function iG(x) {
    return caml_call1(caml_get_public_method(x, 91199156, 156), x);
  }
  var iH = function(t86, param) {return t86.scrollLeft;}(html, iG);
  function iI(x) {
    return caml_call1(caml_get_public_method(x, 91199156, 157), x);
  }
  return [
    0,
    function(t85, param) {return t85.scrollLeft;}(body, iI) + iH | 0,
    iF
  ];
}

function buttonPressed(ev) {
  function iv(x) {return x;}
  function iw(param) {
    function iz(x) {
      return caml_call1(caml_get_public_method(x, -639606286, 158), x);
    }
    var match = function(t92, param) {return t92.button;}(ev, iz);
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
  function ix(x) {
    return caml_call1(caml_get_public_method(x, -910345251, 159), x);
  }
  var iy = function(t91, param) {return t91.which;}(ev, ix);
  return caml_call3(Js_of_ocaml_Js[6][7], iy, iw, iv);
}

function hasMousewheelEvents(param) {
  var d = createDiv(document);
  function is(x) {
    return caml_call1(caml_get_public_method(x, 524300314, 160), x);
  }
  var it = "return;";
  var iu = "onmousewheel";
  (function(t95, t93, t94, param) {return t95.setAttribute(t93, t94);}(d, iu, it, is
   ));
  return typeof d.onmousewheel === "function" ? 1 : 0;
}

function addMousewheelEventListener(e, h, capt) {
  if (hasMousewheelEvents(0)) {
    var id = caml_call1(
      handler,
      function(e) {
        function ik(param) {return 0;}
        function il(x) {
          return caml_call1(caml_get_public_method(x, -95379365, 161), x);
        }
        var im = function(t101, param) {return t101.wheelDeltaX;}(e, il);
        var dx = (- caml_call2(Js_of_ocaml_Js[6][8], im, ik) | 0) / 40 | 0;
        function io(param) {
          function ir(x) {
            return caml_call1(caml_get_public_method(x, 644780381, 162), x);
          }
          return function(t100, param) {return t100.wheelDelta;}(e, ir);
        }
        function ip(x) {
          return caml_call1(caml_get_public_method(x, -95379364, 163), x);
        }
        var iq = function(t99, param) {return t99.wheelDeltaY;}(e, ip);
        var dy = (- caml_call2(Js_of_ocaml_Js[6][8], iq, io) | 0) / 40 | 0;
        return caml_call3(h, e, dx, dy);
      }
    );
    return caml_call4(addEventListener, e, Event[11], id, capt);
  }
  var ie = caml_call1(
    handler,
    function(e) {
      function ig(x) {
        return caml_call1(caml_get_public_method(x, -266378607, 164), x);
      }
      var d = function(t98, param) {return t98.detail;}(e, ig);
      function ih(x) {
        return caml_call1(caml_get_public_method(x, -66775139, 165), x);
      }
      var ii = function(t97, param) {return t97.HORIZONTAL;}(e, ih);
      function ij(x) {
        return caml_call1(caml_get_public_method(x, -1065804639, 166), x);
      }
      if (function(t96, param) {return t96.axis;}(e, ij) === ii) {return caml_call3(h, e, d, 0);}
      return caml_call3(h, e, 0, d);
    }
  );
  return caml_call4(addEventListener, e, Event[12], ie, capt);
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
    var ic = switcher;
    if (67 <= ic) switch (ic) {
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
    else switch (ic) {
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
  if (0 === v) {
    return caml_call3(Js_of_ocaml_Js[6][7], value, make_unidentified, f);
  }
  return v;
}

function run_next(value, f, v) {
  if (0 === v) {return caml_call1(f, value);}
  return v;
}

function get_key_code(evt) {
  function ib(x) {
    return caml_call1(caml_get_public_method(x, 463348332, 167), x);
  }
  return function(t102, param) {return t102.keyCode;}(evt, ib);
}

function try_key_location(evt) {
  function h5(x) {
    return caml_call1(caml_get_public_method(x, -448369099, 168), x);
  }
  var match = function(t103, param) {return t103.location;}(evt, h5);
  var switcher = match + -1 | 0;
  if (2 < switcher >>> 0) {return make_unidentified;}
  switch (switcher) {
    case 0:
      var h6 = get_key_code(evt);
      return function(h_) {return run_next(h6, try_key_code_left, h_);};
    case 1:
      var h7 = get_key_code(evt);
      return function(h9) {return run_next(h7, try_key_code_right, h9);};
    default:
      var h8 = get_key_code(evt);
      return function(ia) {return run_next(h8, try_key_code_numpad, ia);}
    }
}

function gO(x, f) {return caml_call1(f, x);}

function of_event(evt) {
  var hY = get_key_code(evt);
  function hZ(h4) {return run_next(hY, try_key_code_normal, h4);}
  var h0 = try_key_location(evt);
  function h1(x) {
    return caml_call1(caml_get_public_method(x, -1044074195, 169), x);
  }
  var h2 = function(t104, param) {return t104.code;}(evt, h1);
  return gO(
    gO(gO(0, function(h3) {return try_next(h2, try_code, h3);}), h0),
    hZ
  );
}

function char_of_int(value) {
  if (0 < value) {
    try {var hW = [0,caml_call1(Uchar[8], value)];return hW;}
    catch(hX) {return 0;}
  }
  return 0;
}

function empty_string(param) {return "";}

function none(param) {return 0;}

function of_event__0(evt) {
  function hP(x) {
    return caml_call1(caml_get_public_method(x, 5343647, 170), x);
  }
  var hQ = function(t109, param) {return t109.key;}(evt, hP);
  var key = caml_call2(Js_of_ocaml_Js[6][8], hQ, empty_string);
  function hR(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 171), x);
  }
  var match = function(t108, param) {return t108.length;}(key, hR);
  if (0 === match) {
    var hS = function(x) {
      return caml_call1(caml_get_public_method(x, 472145699, 172), x);
    };
    var hT = function(t105, param) {return t105.charCode;}(evt, hS);
    return caml_call3(Js_of_ocaml_Js[6][7], hT, none, char_of_int);
  }
  if (1 === match) {
    var hU = function(x) {
      return caml_call1(caml_get_public_method(x, 894756598, 173), x);
    };
    var hV = 0;
    return char_of_int(
      function(t107, t106, param) {return t107.charCodeAt(t106);}(key, hV, hU) | 0
    );
  }
  return 0;
}

function element__0(hO) {return hO;}

function other(e) {return [61,e];}

function tagged(e) {
  function hL(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 174), x);
  }
  function hM(x) {
    return caml_call1(caml_get_public_method(x, 578170309, 175), x);
  }
  var hN = function(t110, param) {return t110.tagName;}(e, hM);
  var tag = runtime["caml_js_to_byte_string"](
    function(t111, param) {return t111.toLowerCase();}(hN, hL)
  );
  if (0 === runtime["caml_ml_string_length"](tag)) {return other(e);}
  var match = runtime["caml_bytes_unsafe_get"](tag, 0);
  var switcher = match + -97 | 0;
  if (! (21 < switcher >>> 0)) {
    switch (switcher) {
      case 0:
        if (caml_string_notequal(tag, cst_a__1)) {
          if (caml_string_notequal(tag, cst_area__1)) {
            if (caml_string_notequal(tag, cst_audio__1)) {return other(e);}
            return [2,e];
          }
          return [1,e];
        }
        return [0,e];
      case 1:
        if (caml_string_notequal(tag, cst_base__1)) {
          if (caml_string_notequal(tag, cst_blockquote__1)) {
            if (caml_string_notequal(tag, cst_body__1)) {
              if (caml_string_notequal(tag, cst_br__1)) {
                if (caml_string_notequal(tag, cst_button__1)) {return other(e);}
                return [7,e];
              }
              return [6,e];
            }
            return [5,e];
          }
          return [4,e];
        }
        return [3,e];
      case 2:
        if (caml_string_notequal(tag, cst_canvas__1)) {
          if (caml_string_notequal(tag, cst_caption__1)) {
            if (caml_string_notequal(tag, cst_col__1)) {
              if (caml_string_notequal(tag, cst_colgroup__1)) {return other(e);}
              return [11,e];
            }
            return [10,e];
          }
          return [9,e];
        }
        return [8,e];
      case 3:
        if (caml_string_notequal(tag, cst_del__1)) {
          if (caml_string_notequal(tag, cst_div__1)) {
            if (caml_string_notequal(tag, cst_dl__1)) {return other(e);}
            return [14,e];
          }
          return [13,e];
        }
        return [12,e];
      case 4:
        if (caml_string_notequal(tag, cst_embed__1)) {return other(e);}
        return [15,e];
      case 5:
        if (caml_string_notequal(tag, cst_fieldset__1)) {
          if (caml_string_notequal(tag, cst_form__1)) {
            if (caml_string_notequal(tag, cst_frame__1)) {
              if (caml_string_notequal(tag, cst_frameset__1)) {return other(e);}
              return [18,e];
            }
            return [19,e];
          }
          return [17,e];
        }
        return [16,e];
      case 7:
        if (caml_string_notequal(tag, cst_h1__1)) {
          if (caml_string_notequal(tag, cst_h2__1)) {
            if (caml_string_notequal(tag, cst_h3__1)) {
              if (caml_string_notequal(tag, cst_h4__1)) {
                if (caml_string_notequal(tag, cst_h5__1)) {
                  if (caml_string_notequal(tag, cst_h6__1)) {
                    if (caml_string_notequal(tag, cst_head__1)) {
                      if (caml_string_notequal(tag, cst_hr__1)) {
                        if (caml_string_notequal(tag, cst_html__1)) {return other(e);}
                        return [28,e];
                      }
                      return [27,e];
                    }
                    return [26,e];
                  }
                  return [25,e];
                }
                return [24,e];
              }
              return [23,e];
            }
            return [22,e];
          }
          return [21,e];
        }
        return [20,e];
      case 8:
        if (caml_string_notequal(tag, cst_iframe__1)) {
          if (caml_string_notequal(tag, cst_img__1)) {
            if (caml_string_notequal(tag, cst_input__2)) {
              if (caml_string_notequal(tag, cst_ins__1)) {return other(e);}
              return [32,e];
            }
            return [31,e];
          }
          return [30,e];
        }
        return [29,e];
      case 11:
        if (caml_string_notequal(tag, cst_label__1)) {
          if (caml_string_notequal(tag, cst_legend__1)) {
            if (caml_string_notequal(tag, cst_li__1)) {
              if (caml_string_notequal(tag, cst_link__1)) {return other(e);}
              return [36,e];
            }
            return [35,e];
          }
          return [34,e];
        }
        return [33,e];
      case 12:
        if (caml_string_notequal(tag, cst_map__1)) {
          if (caml_string_notequal(tag, cst_meta__1)) {return other(e);}
          return [38,e];
        }
        return [37,e];
      case 14:
        if (caml_string_notequal(tag, cst_object__1)) {
          if (caml_string_notequal(tag, cst_ol__1)) {
            if (caml_string_notequal(tag, cst_optgroup__1)) {
              if (caml_string_notequal(tag, cst_option__1)) {return other(e);}
              return [42,e];
            }
            return [41,e];
          }
          return [40,e];
        }
        return [39,e];
      case 15:
        if (caml_string_notequal(tag, cst_p__1)) {
          if (caml_string_notequal(tag, cst_param__1)) {
            if (caml_string_notequal(tag, cst_pre__1)) {return other(e);}
            return [45,e];
          }
          return [44,e];
        }
        return [43,e];
      case 16:
        if (caml_string_notequal(tag, cst_q__1)) {return other(e);}
        return [46,e];
      case 18:
        if (caml_string_notequal(tag, cst_script__1)) {
          if (caml_string_notequal(tag, cst_select__2)) {
            if (caml_string_notequal(tag, cst_style__1)) {return other(e);}
            return [49,e];
          }
          return [48,e];
        }
        return [47,e];
      case 19:
        if (caml_string_notequal(tag, cst_table__1)) {
          if (caml_string_notequal(tag, cst_tbody__1)) {
            if (caml_string_notequal(tag, cst_td__1)) {
              if (caml_string_notequal(tag, cst_textarea__1)) {
                if (caml_string_notequal(tag, cst_tfoot__1)) {
                  if (caml_string_notequal(tag, cst_th__1)) {
                    if (caml_string_notequal(tag, cst_thead__1)) {
                      if (caml_string_notequal(tag, cst_title__1)) {
                        if (caml_string_notequal(tag, cst_tr__1)) {return other(e);}
                        return [58,e];
                      }
                      return [57,e];
                    }
                    return [56,e];
                  }
                  return [55,e];
                }
                return [54,e];
              }
              return [53,e];
            }
            return [52,e];
          }
          return [51,e];
        }
        return [50,e];
      case 20:
        if (caml_string_notequal(tag, cst_ul__1)) {return other(e);}
        return [59,e];
      case 21:
        if (caml_string_notequal(tag, cst_video__1)) {return other(e);}
        return [60,e]
      }
  }
  return other(e);
}

function opt_tagged(e) {
  function hJ(e) {return [0,tagged(e)];}
  function hK(param) {return 0;}
  return caml_call3(Js_of_ocaml_Js[5][7], e, hK, hJ);
}

function taggedEvent(ev) {
  function hu(ev) {return [0,ev];}
  function hv(param) {
    function hx(ev) {return [1,ev];}
    function hy(param) {
      function hA(ev) {return [2,ev];}
      function hB(param) {
        function hD(ev) {return [3,ev];}
        function hE(param) {
          function hG(ev) {return [4,ev];}
          function hH(param) {return [5,ev];}
          var hI = popStateEvent(ev);
          return caml_call3(Js_of_ocaml_Js[5][7], hI, hH, hG);
        }
        var hF = mouseScrollEvent(ev);
        return caml_call3(Js_of_ocaml_Js[5][7], hF, hE, hD);
      }
      var hC = wheelEvent(ev);
      return caml_call3(Js_of_ocaml_Js[5][7], hC, hB, hA);
    }
    var hz = keyboardEvent(ev);
    return caml_call3(Js_of_ocaml_Js[5][7], hz, hy, hx);
  }
  var hw = mouseEvent(ev);
  return caml_call3(Js_of_ocaml_Js[5][7], hw, hv, hu);
}

function opt_taggedEvent(ev) {
  function hs(ev) {return [0,taggedEvent(ev)];}
  function ht(param) {return 0;}
  return caml_call3(Js_of_ocaml_Js[5][7], ev, ht, hs);
}

function stopPropagation(ev) {
  function hl(param) {
    function hr(x) {
      return caml_call1(caml_get_public_method(x, 189842539, 176), x);
    }
    return function(t115, param) {return t115.stopPropagation();}(ev, hr);
  }
  function hm(param) {
    function hp(x) {
      return caml_call1(caml_get_public_method(x, 320837798, 177), x);
    }
    var hq = Js_of_ocaml_Js[7];
    return function(t114, t113, param) {return t114.cancelBubble = t113;}(ev, hq, hp
    );
  }
  function hn(x) {
    return caml_call1(caml_get_public_method(x, 544309738, 178), x);
  }
  var ho = function(t112, param) {return t112.stopPropagation;}(ev, hn);
  return caml_call3(Js_of_ocaml_Js[6][7], ho, hm, hl);
}

var requestAnimationFrame = runtime["caml_js_pure_expr"](
  function(param) {
    var g4 = 0;
    function g5(x) {
      return caml_call1(caml_get_public_method(x, 497949938, 179), x);
    }
    var g6 = [
      0,
      function(t125, param) {return t125.msRequestAnimationFrame;}(window, g5),
      g4
    ];
    function g7(x) {
      return caml_call1(caml_get_public_method(x, -153781943, 180), x);
    }
    var g8 = [
      0,
      function(t124, param) {return t124.oRequestAnimationFrame;}(window, g7),
      g6
    ];
    function g9(x) {
      return caml_call1(caml_get_public_method(x, -151539242, 181), x);
    }
    var g_ = [
      0,
      function(t123, param) {return t123.webkitRequestAnimationFrame;}(window, g9
      ),
      g8
    ];
    function ha(x) {
      return caml_call1(caml_get_public_method(x, -769448896, 182), x);
    }
    var hb = [
      0,
      function(t122, param) {return t122.mozRequestAnimationFrame;}(window, ha
      ),
      g_
    ];
    function hc(x) {
      return caml_call1(caml_get_public_method(x, 240126520, 183), x);
    }
    var l = [
      0,
      function(t121, param) {return t121.requestAnimationFrame;}(window, hc),
      hb
    ];
    try {
      var hd = function(c) {return caml_call1(Js_of_ocaml_Js[6][5], c);};
      var req = caml_call2(List[33], hd, l);
      var he = function(callback) {return req(callback);};
      return he;
    }
    catch(hf) {
      hf = caml_wrap_exception(hf);
      if (hf === Not_found) {
        var now = function(param) {
          function hh(x) {
            return caml_call1(caml_get_public_method(x, 528448451, 184), x);
          }
          var hi = 0;
          var hj = Js_of_ocaml_Js[22];
          var hk = function(t119, param) {return new t119();}(hj, hi);
          return function(t120, param) {return t120.getTime();}(hk, hh);
        };
        var last = [0,now(0)];
        return function(callback) {
          var t = now(0);
          var dt = last[1] + 16.6666666666666679 - t;
          if (dt < 0) var dt__0 = 0;
          else var dt__0 = dt;
          last[1] = t;
          function hg(x) {
            return caml_call1(caml_get_public_method(x, 735461151, 185), x);
          }
          (function(t118, t116, t117, param) {
             return t118.setTimeout(t116, t117);
           }(window, callback, dt__0, hg
           ));
          return 0;
        };
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](hf);
    }
  }
);

function hasPushState(param) {
  function g0(x) {
    return caml_call1(caml_get_public_method(x, -936976937, 186), x);
  }
  function g1(x) {
    return caml_call1(caml_get_public_method(x, -465095340, 187), x);
  }
  var g2 = function(t126, param) {return t126.history;}(window, g1);
  var g3 = function(t127, param) {return t127.pushState;}(g2, g0);
  return caml_call1(Js_of_ocaml_Js[6][5], g3);
}

function hasPlaceholder(param) {
  var i = createInput(0, 0, document);
  function gY(x) {
    return caml_call1(caml_get_public_method(x, 989033331, 188), x);
  }
  var gZ = function(t128, param) {return t128.placeholder;}(i, gY);
  return caml_call1(Js_of_ocaml_Js[6][5], gZ);
}

function hasRequired(param) {
  var i = createInput(0, 0, document);
  function gW(x) {
    return caml_call1(caml_get_public_method(x, 845320543, 189), x);
  }
  var gX = function(t129, param) {return t129.required;}(i, gW);
  return caml_call1(Js_of_ocaml_Js[6][5], gX);
}

var overflow_limit = 2147483e3;

function setTimeout(callback, d) {
  var id = [0,0];
  function loop(step, param) {
    if (2147483e3 < step) {
      var gS = step - 2147483e3;
      var step__0 = overflow_limit;
      var remain = gS;
    }
    else {var remain__0 = 0;var step__0 = step;var remain = remain__0;}
    if (remain == 0) var cb = callback;
    else var cb = function(gV) {return loop(remain, gV);};
    function gT(x) {
      return caml_call1(caml_get_public_method(x, 735461151, 190), x);
    }
    var gU = runtime["caml_js_wrap_callback"](cb);
    id[1] =
      [
        0,
        function(t132, t130, t131, param) {
          return t132.setTimeout(t130, t131);
        }(window, gU, step__0, gT
        )
      ];
    return 0;
  }
  loop(d, 0);
  return id;
}

function clearTimeout(id) {
  var gQ = id[1];
  if (gQ) {
    var x = gQ[1];
    id[1] = 0;
    var gR = function(x) {
      return caml_call1(caml_get_public_method(x, 880135316, 191), x);
    };
    return function(t134, t133, param) {return t134.clearTimeout(t133);}(window, x, gR
    );
  }
  return 0;
}

function js_array_of_collection(c) {return [].slice.call(c);}

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
    a,
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
  function(gP) {return runtime["caml_js_html_entities"](gP);},
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