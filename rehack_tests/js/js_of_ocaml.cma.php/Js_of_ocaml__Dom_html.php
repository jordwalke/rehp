<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Dom_html.php
 */

namespace Rehack;

final class Js_of_ocaml__Dom_html {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Dom = Js_of_ocaml__Dom::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $Uchar = Uchar::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    Js_of_ocaml__Dom_html::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Dom_html;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_html_escape = $runtime["caml_js_html_escape"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
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
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_a__1 = $caml_new_string("a");
    $cst_area__1 = $caml_new_string("area");
    $cst_audio__1 = $caml_new_string("audio");
    $cst_base__1 = $caml_new_string("base");
    $cst_blockquote__1 = $caml_new_string("blockquote");
    $cst_body__1 = $caml_new_string("body");
    $cst_br__1 = $caml_new_string("br");
    $cst_button__1 = $caml_new_string("button");
    $cst_canvas__1 = $caml_new_string("canvas");
    $cst_caption__1 = $caml_new_string("caption");
    $cst_col__1 = $caml_new_string("col");
    $cst_colgroup__1 = $caml_new_string("colgroup");
    $cst_del__1 = $caml_new_string("del");
    $cst_div__1 = $caml_new_string("div");
    $cst_dl__1 = $caml_new_string("dl");
    $cst_embed__1 = $caml_new_string("embed");
    $cst_fieldset__1 = $caml_new_string("fieldset");
    $cst_form__1 = $caml_new_string("form");
    $cst_frame__1 = $caml_new_string("frame");
    $cst_frameset__1 = $caml_new_string("frameset");
    $cst_h1__1 = $caml_new_string("h1");
    $cst_h2__1 = $caml_new_string("h2");
    $cst_h3__1 = $caml_new_string("h3");
    $cst_h4__1 = $caml_new_string("h4");
    $cst_h5__1 = $caml_new_string("h5");
    $cst_h6__1 = $caml_new_string("h6");
    $cst_head__1 = $caml_new_string("head");
    $cst_hr__1 = $caml_new_string("hr");
    $cst_html__1 = $caml_new_string("html");
    $cst_iframe__1 = $caml_new_string("iframe");
    $cst_img__1 = $caml_new_string("img");
    $cst_input__2 = $caml_new_string("input");
    $cst_ins__1 = $caml_new_string("ins");
    $cst_label__1 = $caml_new_string("label");
    $cst_legend__1 = $caml_new_string("legend");
    $cst_li__1 = $caml_new_string("li");
    $cst_link__1 = $caml_new_string("link");
    $cst_map__1 = $caml_new_string("map");
    $cst_meta__1 = $caml_new_string("meta");
    $cst_object__1 = $caml_new_string("object");
    $cst_ol__1 = $caml_new_string("ol");
    $cst_optgroup__1 = $caml_new_string("optgroup");
    $cst_option__1 = $caml_new_string("option");
    $cst_p__1 = $caml_new_string("p");
    $cst_param__1 = $caml_new_string("param");
    $cst_pre__1 = $caml_new_string("pre");
    $cst_q__1 = $caml_new_string("q");
    $cst_script__1 = $caml_new_string("script");
    $cst_select__2 = $caml_new_string("select");
    $cst_style__1 = $caml_new_string("style");
    $cst_table__1 = $caml_new_string("table");
    $cst_tbody__1 = $caml_new_string("tbody");
    $cst_td__1 = $caml_new_string("td");
    $cst_textarea__1 = $caml_new_string("textarea");
    $cst_tfoot__1 = $caml_new_string("tfoot");
    $cst_th__1 = $caml_new_string("th");
    $cst_thead__1 = $caml_new_string("thead");
    $cst_title__1 = $caml_new_string("title");
    $cst_tr__1 = $caml_new_string("tr");
    $cst_ul__1 = $caml_new_string("ul");
    $cst_video__1 = $caml_new_string("video");
    $cst_KeyH = $caml_new_string("KeyH");
    $cst_Digit6 = $caml_new_string("Digit6");
    $cst_BrowserRefresh = $caml_new_string("BrowserRefresh");
    $cst_Backslash = $caml_new_string("Backslash");
    $cst_AltLeft = $caml_new_string("AltLeft");
    $cst_AltRight = $caml_new_string("AltRight");
    $cst_ArrowDown = $caml_new_string("ArrowDown");
    $cst_ArrowLeft = $caml_new_string("ArrowLeft");
    $cst_ArrowRight = $caml_new_string("ArrowRight");
    $cst_ArrowUp = $caml_new_string("ArrowUp");
    $cst_Backquote = $caml_new_string("Backquote");
    $cst_Backspace = $caml_new_string("Backspace");
    $cst_BracketLeft = $caml_new_string("BracketLeft");
    $cst_BracketRight = $caml_new_string("BracketRight");
    $cst_BrowserBack = $caml_new_string("BrowserBack");
    $cst_BrowserFavorites = $caml_new_string("BrowserFavorites");
    $cst_BrowserForward = $caml_new_string("BrowserForward");
    $cst_BrowserHome = $caml_new_string("BrowserHome");
    $cst_Delete = $caml_new_string("Delete");
    $cst_BrowserSearch = $caml_new_string("BrowserSearch");
    $cst_BrowserStop = $caml_new_string("BrowserStop");
    $cst_CapsLock = $caml_new_string("CapsLock");
    $cst_Comma = $caml_new_string("Comma");
    $cst_ContextMenu = $caml_new_string("ContextMenu");
    $cst_ControlLeft = $caml_new_string("ControlLeft");
    $cst_ControlRight = $caml_new_string("ControlRight");
    $cst_Digit0 = $caml_new_string("Digit0");
    $cst_Digit1 = $caml_new_string("Digit1");
    $cst_Digit2 = $caml_new_string("Digit2");
    $cst_Digit3 = $caml_new_string("Digit3");
    $cst_Digit4 = $caml_new_string("Digit4");
    $cst_Digit5 = $caml_new_string("Digit5");
    $cst_F6 = $caml_new_string("F6");
    $cst_F1 = $caml_new_string("F1");
    $cst_Digit7 = $caml_new_string("Digit7");
    $cst_Digit8 = $caml_new_string("Digit8");
    $cst_Digit9 = $caml_new_string("Digit9");
    $cst_End = $caml_new_string("End");
    $cst_Enter = $caml_new_string("Enter");
    $cst_Equal = $caml_new_string("Equal");
    $cst_Escape = $caml_new_string("Escape");
    $cst_F10 = $caml_new_string("F10");
    $cst_F11 = $caml_new_string("F11");
    $cst_F12 = $caml_new_string("F12");
    $cst_F2 = $caml_new_string("F2");
    $cst_F3 = $caml_new_string("F3");
    $cst_F4 = $caml_new_string("F4");
    $cst_F5 = $caml_new_string("F5");
    $cst_KeyA = $caml_new_string("KeyA");
    $cst_F7 = $caml_new_string("F7");
    $cst_F8 = $caml_new_string("F8");
    $cst_F9 = $caml_new_string("F9");
    $cst_Home = $caml_new_string("Home");
    $cst_Insert = $caml_new_string("Insert");
    $cst_IntlBackslash = $caml_new_string("IntlBackslash");
    $cst_IntlYen = $caml_new_string("IntlYen");
    $cst_KeyB = $caml_new_string("KeyB");
    $cst_KeyC = $caml_new_string("KeyC");
    $cst_KeyD = $caml_new_string("KeyD");
    $cst_KeyE = $caml_new_string("KeyE");
    $cst_KeyF = $caml_new_string("KeyF");
    $cst_KeyG = $caml_new_string("KeyG");
    $cst_Numpad4 = $caml_new_string("Numpad4");
    $cst_KeyX = $caml_new_string("KeyX");
    $cst_KeyP = $caml_new_string("KeyP");
    $cst_KeyI = $caml_new_string("KeyI");
    $cst_KeyJ = $caml_new_string("KeyJ");
    $cst_KeyK = $caml_new_string("KeyK");
    $cst_KeyL = $caml_new_string("KeyL");
    $cst_KeyM = $caml_new_string("KeyM");
    $cst_KeyN = $caml_new_string("KeyN");
    $cst_KeyO = $caml_new_string("KeyO");
    $cst_KeyQ = $caml_new_string("KeyQ");
    $cst_KeyR = $caml_new_string("KeyR");
    $cst_KeyS = $caml_new_string("KeyS");
    $cst_KeyT = $caml_new_string("KeyT");
    $cst_KeyU = $caml_new_string("KeyU");
    $cst_KeyV = $caml_new_string("KeyV");
    $cst_KeyW = $caml_new_string("KeyW");
    $cst_MetaRight = $caml_new_string("MetaRight");
    $cst_KeyY = $caml_new_string("KeyY");
    $cst_KeyZ = $caml_new_string("KeyZ");
    $cst_MediaPlayPause = $caml_new_string("MediaPlayPause");
    $cst_MediaStop = $caml_new_string("MediaStop");
    $cst_MediaTrackNext = $caml_new_string("MediaTrackNext");
    $cst_MediaTrackPrevious = $caml_new_string("MediaTrackPrevious");
    $cst_MetaLeft = $caml_new_string("MetaLeft");
    $cst_Minus = $caml_new_string("Minus");
    $cst_NumLock = $caml_new_string("NumLock");
    $cst_Numpad0 = $caml_new_string("Numpad0");
    $cst_Numpad1 = $caml_new_string("Numpad1");
    $cst_Numpad2 = $caml_new_string("Numpad2");
    $cst_Numpad3 = $caml_new_string("Numpad3");
    $cst_PageUp = $caml_new_string("PageUp");
    $cst_NumpadDivide = $caml_new_string("NumpadDivide");
    $cst_Numpad5 = $caml_new_string("Numpad5");
    $cst_Numpad6 = $caml_new_string("Numpad6");
    $cst_Numpad7 = $caml_new_string("Numpad7");
    $cst_Numpad8 = $caml_new_string("Numpad8");
    $cst_Numpad9 = $caml_new_string("Numpad9");
    $cst_NumpadAdd = $caml_new_string("NumpadAdd");
    $cst_NumpadDecimal = $caml_new_string("NumpadDecimal");
    $cst_NumpadEnter = $caml_new_string("NumpadEnter");
    $cst_NumpadEqual = $caml_new_string("NumpadEqual");
    $cst_NumpadMultiply = $caml_new_string("NumpadMultiply");
    $cst_NumpadSubtract = $caml_new_string("NumpadSubtract");
    $cst_OSLeft = $caml_new_string("OSLeft");
    $cst_OSRight = $caml_new_string("OSRight");
    $cst_PageDown = $caml_new_string("PageDown");
    $cst_ShiftRight = $caml_new_string("ShiftRight");
    $cst_Pause = $caml_new_string("Pause");
    $cst_Period = $caml_new_string("Period");
    $cst_PrintScreen = $caml_new_string("PrintScreen");
    $cst_Quote = $caml_new_string("Quote");
    $cst_ScrollLock = $caml_new_string("ScrollLock");
    $cst_Semicolon = $caml_new_string("Semicolon");
    $cst_ShiftLeft = $caml_new_string("ShiftLeft");
    $cst_Slash = $caml_new_string("Slash");
    $cst_Space = $caml_new_string("Space");
    $cst_Tab = $caml_new_string("Tab");
    $cst_VolumeDown = $caml_new_string("VolumeDown");
    $cst_VolumeMute = $caml_new_string("VolumeMute");
    $cst_VolumeUp = $caml_new_string("VolumeUp");
    $cst_mouseout__0 = $caml_new_string("mouseout");
    $cst_mouseover__0 = $caml_new_string("mouseover");
    $cst_video__0 = $caml_new_string("video");
    $cst_audio__0 = $caml_new_string("audio");
    $cst_ul__0 = $caml_new_string("ul");
    $cst_tr__0 = $caml_new_string("tr");
    $cst_title__0 = $caml_new_string("title");
    $cst_thead__0 = $caml_new_string("thead");
    $cst_th__0 = $caml_new_string("th");
    $cst_tfoot__0 = $caml_new_string("tfoot");
    $cst_textarea__0 = $caml_new_string("textarea");
    $cst_td__0 = $caml_new_string("td");
    $cst_tbody__0 = $caml_new_string("tbody");
    $cst_table__0 = $caml_new_string("table");
    $cst_style__0 = $caml_new_string("style");
    $cst_select__1 = $caml_new_string("select");
    $cst_script__0 = $caml_new_string("script");
    $cst_q__0 = $caml_new_string("q");
    $cst_pre__0 = $caml_new_string("pre");
    $cst_param__0 = $caml_new_string("param");
    $cst_p__0 = $caml_new_string("p");
    $cst_option__0 = $caml_new_string("option");
    $cst_optgroup__0 = $caml_new_string("optgroup");
    $cst_ol__0 = $caml_new_string("ol");
    $cst_object__0 = $caml_new_string("object");
    $cst_meta__0 = $caml_new_string("meta");
    $cst_map__0 = $caml_new_string("map");
    $cst_link__0 = $caml_new_string("link");
    $cst_li__0 = $caml_new_string("li");
    $cst_legend__0 = $caml_new_string("legend");
    $cst_label__0 = $caml_new_string("label");
    $cst_ins__0 = $caml_new_string("ins");
    $cst_input__1 = $caml_new_string("input");
    $cst_img__0 = $caml_new_string("img");
    $cst_iframe__0 = $caml_new_string("iframe");
    $cst_html__0 = $caml_new_string("html");
    $cst_hr__0 = $caml_new_string("hr");
    $cst_head__0 = $caml_new_string("head");
    $cst_h6__0 = $caml_new_string("h6");
    $cst_h5__0 = $caml_new_string("h5");
    $cst_h4__0 = $caml_new_string("h4");
    $cst_h3__0 = $caml_new_string("h3");
    $cst_h2__0 = $caml_new_string("h2");
    $cst_h1__0 = $caml_new_string("h1");
    $cst_frame__0 = $caml_new_string("frame");
    $cst_frameset__0 = $caml_new_string("frameset");
    $cst_form__0 = $caml_new_string("form");
    $cst_embed__0 = $caml_new_string("embed");
    $cst_fieldset__0 = $caml_new_string("fieldset");
    $cst_dl__0 = $caml_new_string("dl");
    $cst_div__0 = $caml_new_string("div");
    $cst_del__0 = $caml_new_string("del");
    $cst_colgroup__0 = $caml_new_string("colgroup");
    $cst_col__0 = $caml_new_string("col");
    $cst_caption__0 = $caml_new_string("caption");
    $cst_canvas__0 = $caml_new_string("canvas");
    $cst_button__0 = $caml_new_string("button");
    $cst_br__0 = $caml_new_string("br");
    $cst_body__0 = $caml_new_string("body");
    $cst_blockquote__0 = $caml_new_string("blockquote");
    $cst_base__0 = $caml_new_string("base");
    $cst_area__0 = $caml_new_string("area");
    $cst_a__0 = $caml_new_string("a");
    $cst_canvas = $caml_new_string("canvas");
    $cst_video = $caml_new_string("video");
    $cst_audio = $caml_new_string("audio");
    $cst_iframe = $caml_new_string("iframe");
    $cst_frame = $caml_new_string("frame");
    $cst_frameset = $caml_new_string("frameset");
    $cst_address = $caml_new_string("address");
    $cst_noscript = $caml_new_string("noscript");
    $cst_dt = $caml_new_string("dt");
    $cst_dd = $caml_new_string("dd");
    $cst_abbr = $caml_new_string("abbr");
    $cst_var = $caml_new_string("var");
    $cst_kbd = $caml_new_string("kbd");
    $cst_samp = $caml_new_string("samp");
    $cst_code = $caml_new_string("code");
    $cst_dfn = $caml_new_string("dfn");
    $cst_cite = $caml_new_string("cite");
    $cst_strong = $caml_new_string("strong");
    $cst_em = $caml_new_string("em");
    $cst_small = $caml_new_string("small");
    $cst_big = $caml_new_string("big");
    $cst_b = $caml_new_string("b");
    $cst_i = $caml_new_string("i");
    $cst_tt = $caml_new_string("tt");
    $cst_span = $caml_new_string("span");
    $cst_sup = $caml_new_string("sup");
    $cst_sub = $caml_new_string("sub");
    $cst_td = $caml_new_string("td");
    $cst_th = $caml_new_string("th");
    $cst_tr = $caml_new_string("tr");
    $cst_tbody = $caml_new_string("tbody");
    $cst_tfoot = $caml_new_string("tfoot");
    $cst_thead = $caml_new_string("thead");
    $cst_colgroup = $caml_new_string("colgroup");
    $cst_col = $caml_new_string("col");
    $cst_caption = $caml_new_string("caption");
    $cst_table = $caml_new_string("table");
    $cst_script = $caml_new_string("script");
    $cst_area = $caml_new_string("area");
    $cst_map = $caml_new_string("map");
    $cst_param = $caml_new_string("param");
    $cst_object = $caml_new_string("object");
    $cst_img = $caml_new_string("img");
    $cst_a = $caml_new_string("a");
    $cst_del = $caml_new_string("del");
    $cst_ins = $caml_new_string("ins");
    $cst_hr = $caml_new_string("hr");
    $cst_br = $caml_new_string("br");
    $cst_pre = $caml_new_string("pre");
    $cst_blockquote = $caml_new_string("blockquote");
    $cst_q = $caml_new_string("q");
    $cst_h6 = $caml_new_string("h6");
    $cst_h5 = $caml_new_string("h5");
    $cst_h4 = $caml_new_string("h4");
    $cst_h3 = $caml_new_string("h3");
    $cst_h2 = $caml_new_string("h2");
    $cst_h1 = $caml_new_string("h1");
    $cst_p = $caml_new_string("p");
    $cst_embed = $caml_new_string("embed");
    $cst_div = $caml_new_string("div");
    $cst_li = $caml_new_string("li");
    $cst_dl = $caml_new_string("dl");
    $cst_ol = $caml_new_string("ol");
    $cst_ul = $caml_new_string("ul");
    $cst_legend = $caml_new_string("legend");
    $cst_fieldset = $caml_new_string("fieldset");
    $cst_label = $caml_new_string("label");
    $cst_button = $caml_new_string("button");
    $cst_textarea = $caml_new_string("textarea");
    $cst_input__0 = $caml_new_string("input");
    $cst_select__0 = $caml_new_string("select");
    $cst_option = $caml_new_string("option");
    $cst_optgroup = $caml_new_string("optgroup");
    $cst_form = $caml_new_string("form");
    $cst_body = $caml_new_string("body");
    $cst_style = $caml_new_string("style");
    $cst_base = $caml_new_string("base");
    $cst_meta = $caml_new_string("meta");
    $cst_title = $caml_new_string("title");
    $cst_link = $caml_new_string("link");
    $cst_head = $caml_new_string("head");
    $cst_html = $caml_new_string("html");
    $cst_click = $caml_new_string("click");
    $cst_dblclick = $caml_new_string("dblclick");
    $cst_mousedown = $caml_new_string("mousedown");
    $cst_mouseup = $caml_new_string("mouseup");
    $cst_mouseover = $caml_new_string("mouseover");
    $cst_mousemove = $caml_new_string("mousemove");
    $cst_mouseout = $caml_new_string("mouseout");
    $cst_keypress = $caml_new_string("keypress");
    $cst_keydown = $caml_new_string("keydown");
    $cst_keyup = $caml_new_string("keyup");
    $cst_mousewheel = $caml_new_string("mousewheel");
    $cst_DOMMouseScroll = $caml_new_string("DOMMouseScroll");
    $cst_touchstart = $caml_new_string("touchstart");
    $cst_touchmove = $caml_new_string("touchmove");
    $cst_touchend = $caml_new_string("touchend");
    $cst_touchcancel = $caml_new_string("touchcancel");
    $cst_dragstart = $caml_new_string("dragstart");
    $cst_dragend = $caml_new_string("dragend");
    $cst_dragenter = $caml_new_string("dragenter");
    $cst_dragover = $caml_new_string("dragover");
    $cst_dragleave = $caml_new_string("dragleave");
    $cst_drag = $caml_new_string("drag");
    $cst_drop = $caml_new_string("drop");
    $cst_hashchange = $caml_new_string("hashchange");
    $cst_change = $caml_new_string("change");
    $cst_input = $caml_new_string("input");
    $cst_timeupdate = $caml_new_string("timeupdate");
    $cst_submit = $caml_new_string("submit");
    $cst_scroll = $caml_new_string("scroll");
    $cst_focus = $caml_new_string("focus");
    $cst_blur = $caml_new_string("blur");
    $cst_load = $caml_new_string("load");
    $cst_unload = $caml_new_string("unload");
    $cst_beforeunload = $caml_new_string("beforeunload");
    $cst_resize = $caml_new_string("resize");
    $cst_orientationchange = $caml_new_string("orientationchange");
    $cst_popstate = $caml_new_string("popstate");
    $cst_error = $caml_new_string("error");
    $cst_abort = $caml_new_string("abort");
    $cst_select = $caml_new_string("select");
    $cst_online = $caml_new_string("online");
    $cst_offline = $caml_new_string("offline");
    $cst_checking = $caml_new_string("checking");
    $cst_noupdate = $caml_new_string("noupdate");
    $cst_downloading = $caml_new_string("downloading");
    $cst_progress = $caml_new_string("progress");
    $cst_updateready = $caml_new_string("updateready");
    $cst_cached = $caml_new_string("cached");
    $cst_obsolete = $caml_new_string("obsolete");
    $cst_DOMContentLoaded = $caml_new_string("DOMContentLoaded");
    $cst_animationstart = $caml_new_string("animationstart");
    $cst_animationend = $caml_new_string("animationend");
    $cst_animationiteration = $caml_new_string("animationiteration");
    $cst_animationcancel = $caml_new_string("animationcancel");
    $cst_canplay = $caml_new_string("canplay");
    $cst_canplaythrough = $caml_new_string("canplaythrough");
    $cst_durationchange = $caml_new_string("durationchange");
    $cst_emptied = $caml_new_string("emptied");
    $cst_ended = $caml_new_string("ended");
    $cst_loadeddata = $caml_new_string("loadeddata");
    $cst_loadedmetadata = $caml_new_string("loadedmetadata");
    $cst_loadstart = $caml_new_string("loadstart");
    $cst_pause = $caml_new_string("pause");
    $cst_play = $caml_new_string("play");
    $cst_playing = $caml_new_string("playing");
    $cst_ratechange = $caml_new_string("ratechange");
    $cst_seeked = $caml_new_string("seeked");
    $cst_seeking = $caml_new_string("seeking");
    $cst_stalled = $caml_new_string("stalled");
    $cst_suspend = $caml_new_string("suspend");
    $cst_volumechange = $caml_new_string("volumechange");
    $cst_waiting = $caml_new_string("waiting");
    $cst_Js_of_ocaml_Dom_html_Canvas_not_available = $caml_new_string(
      "Js_of_ocaml__Dom_html.Canvas_not_available"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $Uchar = $global_data["Uchar"];
    $Assert_failure = $global_data["Assert_failure"];
    $Printf = $global_data["Printf"];
    $Pervasives = $global_data["Pervasives"];
    $Js_of_ocaml_Dom = $global_data["Js_of_ocaml__Dom"];
    $gN = Vector{0, $caml_new_string("lib/js_of_ocaml/dom_html.ml"), 2704, 58};
    $gM = Vector{0, $caml_new_string("lib/js_of_ocaml/dom_html.ml"), 2703, 61};
    $gI = Vector{
      0,
      Vector{
        11,
        $caml_new_string("getElementById_exn: "),
        Vector{3, 0, Vector{11, $caml_new_string(" not found"), 0}}
      },
      $caml_new_string("getElementById_exn: %S not found")
    };
    $onIE = (int) $runtime["caml_js_on_ie"](0);
    $no_handler = $Js_of_ocaml_Dom[9];
    $handler = $Js_of_ocaml_Dom[10];
    $full_handler = $Js_of_ocaml_Dom[11];
    $invoke_handler = $Js_of_ocaml_Dom[12];
    $click = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_click);
    $dblclick = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dblclick);
    $mousedown = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mousedown);
    $mouseup = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mouseup);
    $mouseover = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mouseover);
    $mousemove = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mousemove);
    $mouseout = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mouseout);
    $keypress = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_keypress);
    $keydown = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_keydown);
    $keyup = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_keyup);
    $mousewheel = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_mousewheel);
    $DOMMouseScroll = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_DOMMouseScroll
    );
    $touchstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_touchstart);
    $touchmove = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_touchmove);
    $touchend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_touchend);
    $touchcancel = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_touchcancel);
    $dragstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dragstart);
    $dragend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dragend);
    $dragenter = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dragenter);
    $dragover = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dragover);
    $dragleave = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_dragleave);
    $drag = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_drag);
    $drop = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_drop);
    $hashchange = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_hashchange);
    $change = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_change);
    $input = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_input);
    $timeupdate = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_timeupdate);
    $submit = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_submit);
    $scroll = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_scroll);
    $focus = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_focus);
    $blur = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_blur);
    $load = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $unload = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_unload);
    $beforeunload = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_beforeunload);
    $resize = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_resize);
    $orientationchange = $caml_call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_orientationchange
    );
    $popstate = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_popstate);
    $error = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $abort = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $select = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_select);
    $online = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_online);
    $offline = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_offline);
    $checking = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_checking);
    $noupdate = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_noupdate);
    $downloading = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_downloading);
    $progress = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $updateready = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_updateready);
    $cached = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_cached);
    $obsolete = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_obsolete);
    $domContentLoaded = $caml_call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_DOMContentLoaded
    );
    $animationstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_animationstart
    );
    $animationend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_animationend);
    $animationiteration = $caml_call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_animationiteration
    );
    $animationcancel = $caml_call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_animationcancel
    );
    $canplay = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_canplay);
    $canplaythrough = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_canplaythrough
    );
    $durationchange = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_durationchange
    );
    $emptied = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_emptied);
    $ended = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_ended);
    $loadeddata = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadeddata);
    $loadedmetadata = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadedmetadata
    );
    $loadstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $pause = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_pause);
    $play = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_play);
    $playing = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_playing);
    $ratechange = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_ratechange);
    $seeked = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_seeked);
    $seeking = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_seeking);
    $stalled = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_stalled);
    $suspend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_suspend);
    $volumechange = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_volumechange);
    $waiting = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_waiting);
    $make = $Js_of_ocaml_Dom[14][1];
    $Event = Vector{
      0,
      $click,
      $dblclick,
      $mousedown,
      $mouseup,
      $mouseover,
      $mousemove,
      $mouseout,
      $keypress,
      $keydown,
      $keyup,
      $mousewheel,
      $DOMMouseScroll,
      $touchstart,
      $touchmove,
      $touchend,
      $touchcancel,
      $dragstart,
      $dragend,
      $dragenter,
      $dragover,
      $dragleave,
      $drag,
      $drop,
      $hashchange,
      $change,
      $input,
      $timeupdate,
      $submit,
      $scroll,
      $focus,
      $blur,
      $load,
      $unload,
      $beforeunload,
      $resize,
      $orientationchange,
      $popstate,
      $error,
      $abort,
      $select,
      $online,
      $offline,
      $checking,
      $noupdate,
      $downloading,
      $progress,
      $updateready,
      $cached,
      $obsolete,
      $domContentLoaded,
      $animationstart,
      $animationend,
      $animationiteration,
      $animationcancel,
      $canplay,
      $canplaythrough,
      $durationchange,
      $emptied,
      $ended,
      $loadeddata,
      $loadedmetadata,
      $loadstart,
      $pause,
      $play,
      $playing,
      $ratechange,
      $seeked,
      $seeking,
      $stalled,
      $suspend,
      $volumechange,
      $waiting,
      $make
    };
    $addEventListener = $Js_of_ocaml_Dom[15];
    $removeEventListener = $Js_of_ocaml_Dom[16];
    $d = "2d";
    $location_origin = function($loc) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method) {
      $kF = function($o) {return $o;};
      $kG = function($param) use ($caml_call1,$caml_get_public_method,$loc) {
        $kJ = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 6510168, 91), $x);
        };
        $protocol = (function($t13, $param) {return $t13->protocol;})($loc, $kJ);
        $kK = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -757983821, 92), $x);
        };
        $hostname = (function($t12, $param) {return $t12->hostname;})($loc, $kK);
        $kL = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -899906687, 93), $x);
        };
        $port = (function($t11, $param) {return $t11->port;})($loc, $kL);
        $kM = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 520590566, 94), $x);
        };
        if (
          0 === (function($t9, $param) {return $t9->length;})($protocol, $kM)
        ) {
          $kN = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 520590566, 95), $x);
          };
          if (
            0 ===
              (function($t10, $param) {return $t10->length;})($hostname, $kN)
          ) {return "";}
        }
        $kO = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -491534073, 96), $x);
        };
        $kP = "//";
        $origin = (function($t8, $t6, $t7, $param) {return $t8->concat($t6, $t7);
         })($protocol, $kP, $hostname, $kO);
        $kQ = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 520590566, 97), $x);
        };
        if (0 < (function($t5, $param) {return $t5->length;})($port, $kQ)) {
          $kR = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, -491534073, 98), $x
            );
          };
          $kS = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, -899906687, 99), $x
            );
          };
          $kT = (function($t1, $param) {return $t1->port;})($loc, $kS);
          $kU = ":";
          return (function($t4, $t2, $t3, $param) {return $t4->concat($t2, $t3);
           })($origin, $kU, $kT, $kR);
        }
        return $origin;
      };
      $kH = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -889120282, 100), $x);
      };
      $kI = (function($t0, $param) {return $t0->origin;})($loc, $kH);
      return $caml_call3($Js_of_ocaml_Js[6][7], $kI, $kG, $kF);
    };
    $window = $Js_of_ocaml_Js[50][1];
    $gH = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 454225691, 101), $x);
    };
    $document = (function($t14, $param) {return $t14->document;})($window, $gH);
    $getElementById = function($id) use ($Js_of_ocaml_Js,$Not_found,$caml_call1,$caml_call3,$caml_get_public_method,$document,$runtime) {
      $kA = function($pnode) {return $pnode;};
      $kB = function($param) use ($Not_found,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $kC = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -332188296, 102), $x);
      };
      $kD = $id->toString();
      $kE = (function($t16, $t15, $param) {return $t16->getElementById($t15);})($document, $kD, $kC);
      return $caml_call3($Js_of_ocaml_Js[5][7], $kE, $kB, $kA);
    };
    $getElementById_exn = function($id) use ($Js_of_ocaml_Js,$Pervasives,$Printf,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$document,$gI) {
      $ku = function($pnode) {return $pnode;};
      $kv = function($param) use ($Pervasives,$Printf,$caml_call1,$caml_call2,$gI,$id) {
        $kz = $caml_call2($Printf[4], $gI, $id);
        return $caml_call1($Pervasives[2], $kz);
      };
      $kw = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -332188296, 103), $x);
      };
      $kx = $id->toString();
      $ky = (function($t18, $t17, $param) {return $t18->getElementById($t17);})($document, $kx, $kw);
      return $caml_call3($Js_of_ocaml_Js[5][7], $ky, $kv, $ku);
    };
    $getElementById_opt = function($id) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$document) {
      $kr = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -332188296, 104), $x);
      };
      $ks = $id->toString();
      $kt = (function($t20, $t19, $param) {return $t20->getElementById($t19);})($document, $ks, $kr);
      return $caml_call1($Js_of_ocaml_Js[5][10], $kt);
    };
    $getElementById_coerce = function($id, $coerce) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$document) {
      $kl = function($e) use ($Js_of_ocaml_Js,$caml_call1,$coerce) {
        $kq = $caml_call1($coerce, $e);
        return $caml_call1($Js_of_ocaml_Js[5][10], $kq);
      };
      $km = function($param) {return 0;};
      $kn = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -332188296, 105), $x);
      };
      $ko = $id->toString();
      $kp = (function($t22, $t21, $param) {return $t22->getElementById($t21);})($document, $ko, $kn);
      return $caml_call3($Js_of_ocaml_Js[5][7], $kp, $km, $kl);
    };
    $opt_iter = function($x, $f) use ($caml_call1) {
      if ($x) {$v = $x[1];return $caml_call1($f, $v);}
      return 0;
    };
    $createElement = function($doc, $name) use ($caml_call1,$caml_get_public_method) {
      $kj = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -292059360, 106), $x);
      };
      $kk = $name->toString();
      return (function($t24, $t23, $param) {return $t24->createElement($t23);})($doc, $kk, $kj);
    };
    $unsafeCreateElement = function($doc, $name) use ($createElement) {
      return $createElement($doc, $name);
    };
    $createElementSyntax = Vector{0, 785140586};
    $unsafeCreateElementEx = function($type, $name, $doc, $elt) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$caml_js_html_escape,$createElement,$createElementSyntax,$document,$opt_iter) {
      for (;;) {
        if (0 === $type) {
          if (0 === $name) {return $createElement($doc, $elt);}
        }
        $jL = $createElementSyntax[1];
        if (785140586 === $jL) {
          try {
            $jO = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -292059360, 107),
                $x
              );
            };
            $jP = "<input name=\"x\">";
            $el = (function($t51, $t50, $param) {
               return $t51->createElement($t50);
             })($document, $jP, $jO);
            $jQ = "input";
            $jR = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, 946097238, 108),
                $x
              );
            };
            $jS = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, 578170309, 109),
                $x
              );
            };
            $jT = (function($t47, $param) {return $t47->tagName;})($el, $jS);
            $jU = (function($t48, $param) {return $t48->toLowerCase();})($jT, $jR) === $jQ
              ? 1
              : (0);
            if ($jU) {
              $jV = "x";
              $jW = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, -922783157, 110),
                  $x
                );
              };
              $jX = (function($t49, $param) {return $t49->name;})($el, $jW) === $jV
                ? 1
                : (0);
            }
            else {$jX = $jU;}
            $jM = $jX;
          }
          catch(\Throwable $ki) {$jM = 0;}
          $jN = $jM ? 982028505 : (-1003883683);
          $createElementSyntax[1] = $jN;
          continue;
        }
        if (982028505 <= $jL) {
          $jY = 0;
          $jZ = $Js_of_ocaml_Js[14];
          $a = (function($t46, $param) {return new $t46();})($jZ, $jY);
          $j0 = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -231927987, 111),
              $x
            );
          };
          $j1 = $elt->toString();
          $j2 = "<";
          ((function($t45, $t43, $t44, $param) {return $t45->push($t43, $t44);
            })($a, $j2, $j1, $j0));
          $opt_iter(
            $type,
            function($t) use ($a,$caml_call1,$caml_get_public_method,$caml_js_html_escape) {
              $ke = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, -231927986, 112),
                  $x
                );
              };
              $kf = "\"";
              $kg = $caml_js_html_escape($t);
              $kh = " type=\"";
              ((function($t42, $t39, $t40, $t41, $param) {return $t42->push($t39, $t40, $t41);
                })($a, $kh, $kg, $kf, $ke));
              return 0;
            }
          );
          $opt_iter(
            $name,
            function($n) use ($a,$caml_call1,$caml_get_public_method,$caml_js_html_escape) {
              $ka = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, -231927986, 113),
                  $x
                );
              };
              $kb = "\"";
              $kc = $caml_js_html_escape($n);
              $kd = " name=\"";
              ((function($t38, $t35, $t36, $t37, $param) {return $t38->push($t35, $t36, $t37);
                })($a, $kd, $kc, $kb, $ka));
              return 0;
            }
          );
          $j3 = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -899608102, 114),
              $x
            );
          };
          $j4 = ">";
          ((function($t34, $t33, $param) {return $t34->push($t33);})($a, $j4, $j3));
          $j5 = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -292059360, 115),
              $x
            );
          };
          $j6 = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -966446102, 116),
              $x
            );
          };
          $j7 = "";
          $j8 = (function($t30, $t29, $param) {return $t30->join($t29);})($a, $j7, $j6);
          return (function($t32, $t31, $param) {
             return $t32->createElement($t31);
           })($doc, $j8, $j5);
        }
        $res = $createElement($doc, $elt);
        $opt_iter(
          $type,
          function($t) use ($caml_call1,$caml_get_public_method,$res) {
            $j_ = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1($caml_get_public_method($x, 1707673, 117), $x
              );
            };
            return (function($t28, $t27, $param) {$t28->type = $t27;return 0;})($res, $t, $j_);
          }
        );
        $opt_iter(
          $name,
          function($n) use ($caml_call1,$caml_get_public_method,$res) {
            $j9 = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -922783157, 118),
                $x
              );
            };
            return (function($t26, $t25, $param) {$t26->name = $t25;return 0;})($res, $n, $j9);
          }
        );
        return $res;
      }
    };
    $createHtml = function($doc) use ($cst_html,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_html);
    };
    $createHead = function($doc) use ($cst_head,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_head);
    };
    $createLink = function($doc) use ($cst_link,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_link);
    };
    $createTitle = function($doc) use ($cst_title,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_title);
    };
    $createMeta = function($doc) use ($cst_meta,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_meta);
    };
    $createBase = function($doc) use ($cst_base,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_base);
    };
    $createStyle = function($doc) use ($cst_style,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_style);
    };
    $createBody = function($doc) use ($cst_body,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_body);
    };
    $createForm = function($doc) use ($cst_form,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_form);
    };
    $createOptgroup = function($doc) use ($cst_optgroup,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_optgroup);
    };
    $createOption = function($doc) use ($cst_option,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_option);
    };
    $createSelect = function($type, $name, $doc) use ($cst_select__0,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_select__0);
    };
    $createInput = function($type, $name, $doc) use ($cst_input__0,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_input__0);
    };
    $createTextarea = function($type, $name, $doc) use ($cst_textarea,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_textarea);
    };
    $createButton = function($type, $name, $doc) use ($cst_button,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_button);
    };
    $createLabel = function($doc) use ($cst_label,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_label);
    };
    $createFieldset = function($doc) use ($cst_fieldset,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_fieldset);
    };
    $createLegend = function($doc) use ($cst_legend,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_legend);
    };
    $createUl = function($doc) use ($cst_ul,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ul);
    };
    $createOl = function($doc) use ($cst_ol,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ol);
    };
    $createDl = function($doc) use ($cst_dl,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_dl);
    };
    $createLi = function($doc) use ($cst_li,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_li);
    };
    $createDiv = function($doc) use ($cst_div,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_div);
    };
    $createEmbed = function($doc) use ($cst_embed,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_embed);
    };
    $createP = function($doc) use ($cst_p,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_p);
    };
    $createH1 = function($doc) use ($cst_h1,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h1);
    };
    $createH2 = function($doc) use ($cst_h2,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h2);
    };
    $createH3 = function($doc) use ($cst_h3,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h3);
    };
    $createH4 = function($doc) use ($cst_h4,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h4);
    };
    $createH5 = function($doc) use ($cst_h5,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h5);
    };
    $createH6 = function($doc) use ($cst_h6,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h6);
    };
    $createQ = function($doc) use ($cst_q,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_q);
    };
    $createBlockquote = function($doc) use ($cst_blockquote,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_blockquote);
    };
    $createPre = function($doc) use ($cst_pre,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_pre);
    };
    $createBr = function($doc) use ($cst_br,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_br);
    };
    $createHr = function($doc) use ($cst_hr,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_hr);
    };
    $createIns = function($doc) use ($cst_ins,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ins);
    };
    $createDel = function($doc) use ($cst_del,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_del);
    };
    $createA = function($doc) use ($cst_a,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_a);
    };
    $createImg = function($doc) use ($cst_img,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_img);
    };
    $createObject = function($doc) use ($cst_object,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_object);
    };
    $createParam = function($doc) use ($cst_param,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_param);
    };
    $createMap = function($doc) use ($cst_map,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_map);
    };
    $createArea = function($doc) use ($cst_area,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_area);
    };
    $createScript = function($doc) use ($cst_script,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_script);
    };
    $createTable = function($doc) use ($cst_table,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_table);
    };
    $createCaption = function($doc) use ($cst_caption,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_caption);
    };
    $createCol = function($doc) use ($cst_col,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_col);
    };
    $createColgroup = function($doc) use ($cst_colgroup,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_colgroup);
    };
    $createThead = function($doc) use ($cst_thead,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_thead);
    };
    $createTfoot = function($doc) use ($cst_tfoot,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tfoot);
    };
    $createTbody = function($doc) use ($cst_tbody,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tbody);
    };
    $createTr = function($doc) use ($cst_tr,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tr);
    };
    $createTh = function($doc) use ($cst_th,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_th);
    };
    $createTd = function($doc) use ($cst_td,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_td);
    };
    $createSub = function($doc) use ($createElement,$cst_sub) {
      return $createElement($doc, $cst_sub);
    };
    $createSup = function($doc) use ($createElement,$cst_sup) {
      return $createElement($doc, $cst_sup);
    };
    $createSpan = function($doc) use ($createElement,$cst_span) {
      return $createElement($doc, $cst_span);
    };
    $createTt = function($doc) use ($createElement,$cst_tt) {
      return $createElement($doc, $cst_tt);
    };
    $createI = function($doc) use ($createElement,$cst_i) {
      return $createElement($doc, $cst_i);
    };
    $createB = function($doc) use ($createElement,$cst_b) {
      return $createElement($doc, $cst_b);
    };
    $createBig = function($doc) use ($createElement,$cst_big) {
      return $createElement($doc, $cst_big);
    };
    $createSmall = function($doc) use ($createElement,$cst_small) {
      return $createElement($doc, $cst_small);
    };
    $createEm = function($doc) use ($createElement,$cst_em) {
      return $createElement($doc, $cst_em);
    };
    $createStrong = function($doc) use ($createElement,$cst_strong) {
      return $createElement($doc, $cst_strong);
    };
    $createCite = function($doc) use ($createElement,$cst_cite) {
      return $createElement($doc, $cst_cite);
    };
    $createDfn = function($doc) use ($createElement,$cst_dfn) {
      return $createElement($doc, $cst_dfn);
    };
    $createCode = function($doc) use ($createElement,$cst_code) {
      return $createElement($doc, $cst_code);
    };
    $createSamp = function($doc) use ($createElement,$cst_samp) {
      return $createElement($doc, $cst_samp);
    };
    $createKbd = function($doc) use ($createElement,$cst_kbd) {
      return $createElement($doc, $cst_kbd);
    };
    $createVar = function($doc) use ($createElement,$cst_var) {
      return $createElement($doc, $cst_var);
    };
    $createAbbr = function($doc) use ($createElement,$cst_abbr) {
      return $createElement($doc, $cst_abbr);
    };
    $createDd = function($doc) use ($createElement,$cst_dd) {
      return $createElement($doc, $cst_dd);
    };
    $createDt = function($doc) use ($createElement,$cst_dt) {
      return $createElement($doc, $cst_dt);
    };
    $createNoscript = function($doc) use ($createElement,$cst_noscript) {
      return $createElement($doc, $cst_noscript);
    };
    $createAddress = function($doc) use ($createElement,$cst_address) {
      return $createElement($doc, $cst_address);
    };
    $createFrameset = function($doc) use ($cst_frameset,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_frameset);
    };
    $createFrame = function($doc) use ($cst_frame,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_frame);
    };
    $createIframe = function($doc) use ($cst_iframe,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_iframe);
    };
    $createAudio = function($doc) use ($cst_audio,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_audio);
    };
    $createVideo = function($doc) use ($cst_video,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_video);
    };
    $Canvas_not_available = Vector{
      248,
      $cst_Js_of_ocaml_Dom_html_Canvas_not_available,
      $runtime["caml_fresh_oo_id"](0)
    };
    $createCanvas = function($doc) use ($Canvas_not_available,$Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$cst_canvas,$runtime,$unsafeCreateElement) {
      $c = $unsafeCreateElement($doc, $cst_canvas);
      $jJ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -388424711, 119), $x);
      };
      $jK = (function($t52, $param) {return $t52->getContext;})($c, $jJ);
      if (1 - $caml_call1($Js_of_ocaml_Js[5][5], $jK)) {
        throw $runtime["caml_wrap_thrown_exception"]($Canvas_not_available) as \Throwable;
      }
      return $c;
    };
    $gJ = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -29132142, 120), $x);
    };
    $gK = $Js_of_ocaml_Js[50][1];
    $html_element = (function($t53, $param) {return $t53->HTMLElement;})($gK, $gJ);
    $gL = $Js_of_ocaml_Js[3];
    $element = $caml_call1($Js_of_ocaml_Js[4], $html_element) === $gL
      ? function($e) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
       $jG = $Js_of_ocaml_Js[3];
       $jH = function($x) use ($caml_call1,$caml_get_public_method) {
         return $caml_call1($caml_get_public_method($x, 746263041, 121), $x);
       };
       $jI = (function($t54, $param) {return $t54->innerHTML;})($e, $jH);
       return $caml_call1($Js_of_ocaml_Js[4], $jI) === $jG
         ? $Js_of_ocaml_Js[1]
         : ($caml_call1($Js_of_ocaml_Js[2], $e));
     }
      : (function($e) use ($Js_of_ocaml_Js,$caml_call1,$html_element) {
       return instance_of($e, $html_element)
         ? $caml_call1($Js_of_ocaml_Js[2], $e)
         : ($Js_of_ocaml_Js[1]);
     });
    $unsafeCoerce = function($tag, $e) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $jC = $tag->toString();
      $jD = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946097238, 122), $x);
      };
      $jE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 578170309, 123), $x);
      };
      $jF = (function($t55, $param) {return $t55->tagName;})($e, $jE);
      return (function($t56, $param) {return $t56->toLowerCase();})($jF, $jD) === $jC
        ? $caml_call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $a = function($e) use ($cst_a__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_a__0, $e);
    };
    $area = function($e) use ($cst_area__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_area__0, $e);
    };
    $base = function($e) use ($cst_base__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_base__0, $e);
    };
    $blockquote = function($e) use ($cst_blockquote__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_blockquote__0, $e);
    };
    $body = function($e) use ($cst_body__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_body__0, $e);
    };
    $br = function($e) use ($cst_br__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_br__0, $e);
    };
    $button = function($e) use ($cst_button__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_button__0, $e);
    };
    $canvas = function($e) use ($cst_canvas__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_canvas__0, $e);
    };
    $caption = function($e) use ($cst_caption__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_caption__0, $e);
    };
    $col = function($e) use ($cst_col__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_col__0, $e);
    };
    $colgroup = function($e) use ($cst_colgroup__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_colgroup__0, $e);
    };
    $del = function($e) use ($cst_del__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_del__0, $e);
    };
    $div = function($e) use ($cst_div__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_div__0, $e);
    };
    $dl = function($e) use ($cst_dl__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_dl__0, $e);
    };
    $fieldset = function($e) use ($cst_fieldset__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_fieldset__0, $e);
    };
    $embed = function($e) use ($cst_embed__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_embed__0, $e);
    };
    $form = function($e) use ($cst_form__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_form__0, $e);
    };
    $frameset = function($e) use ($cst_frameset__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_frameset__0, $e);
    };
    $frame = function($e) use ($cst_frame__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_frame__0, $e);
    };
    $h1 = function($e) use ($cst_h1__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h1__0, $e);
    };
    $h2 = function($e) use ($cst_h2__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h2__0, $e);
    };
    $h3 = function($e) use ($cst_h3__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h3__0, $e);
    };
    $h4 = function($e) use ($cst_h4__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h4__0, $e);
    };
    $h5 = function($e) use ($cst_h5__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h5__0, $e);
    };
    $h6 = function($e) use ($cst_h6__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h6__0, $e);
    };
    $head = function($e) use ($cst_head__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_head__0, $e);
    };
    $hr = function($e) use ($cst_hr__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_hr__0, $e);
    };
    $html = function($e) use ($cst_html__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_html__0, $e);
    };
    $iframe = function($e) use ($cst_iframe__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_iframe__0, $e);
    };
    $img = function($e) use ($cst_img__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_img__0, $e);
    };
    $input__0 = function($e) use ($cst_input__1,$unsafeCoerce) {
      return $unsafeCoerce($cst_input__1, $e);
    };
    $ins = function($e) use ($cst_ins__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ins__0, $e);
    };
    $label = function($e) use ($cst_label__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_label__0, $e);
    };
    $legend = function($e) use ($cst_legend__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_legend__0, $e);
    };
    $li = function($e) use ($cst_li__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_li__0, $e);
    };
    $link = function($e) use ($cst_link__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_link__0, $e);
    };
    $map = function($e) use ($cst_map__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_map__0, $e);
    };
    $meta = function($e) use ($cst_meta__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_meta__0, $e);
    };
    $object = function($e) use ($cst_object__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_object__0, $e);
    };
    $ol = function($e) use ($cst_ol__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ol__0, $e);
    };
    $optgroup = function($e) use ($cst_optgroup__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_optgroup__0, $e);
    };
    $option = function($e) use ($cst_option__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_option__0, $e);
    };
    $p = function($e) use ($cst_p__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_p__0, $e);
    };
    $param = function($e) use ($cst_param__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_param__0, $e);
    };
    $pre = function($e) use ($cst_pre__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_pre__0, $e);
    };
    $q = function($e) use ($cst_q__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_q__0, $e);
    };
    $script = function($e) use ($cst_script__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_script__0, $e);
    };
    $select__0 = function($e) use ($cst_select__1,$unsafeCoerce) {
      return $unsafeCoerce($cst_select__1, $e);
    };
    $style = function($e) use ($cst_style__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_style__0, $e);
    };
    $table = function($e) use ($cst_table__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_table__0, $e);
    };
    $tbody = function($e) use ($cst_tbody__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tbody__0, $e);
    };
    $td = function($e) use ($cst_td__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_td__0, $e);
    };
    $textarea = function($e) use ($cst_textarea__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_textarea__0, $e);
    };
    $tfoot = function($e) use ($cst_tfoot__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tfoot__0, $e);
    };
    $th = function($e) use ($cst_th__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_th__0, $e);
    };
    $thead = function($e) use ($cst_thead__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_thead__0, $e);
    };
    $title = function($e) use ($cst_title__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_title__0, $e);
    };
    $tr = function($e) use ($cst_tr__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tr__0, $e);
    };
    $ul = function($e) use ($cst_ul__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ul__0, $e);
    };
    $audio = function($e) use ($cst_audio__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_audio__0, $e);
    };
    $video = function($e) use ($cst_video__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_video__0, $e);
    };
    $unsafeCoerceEvent = function($constr, $ev) use ($Js_of_ocaml_Js,$caml_call1) {
      $jB = $Js_of_ocaml_Js[3];
      if ($caml_call1($Js_of_ocaml_Js[4], $constr) !== $jB) {
        if (instance_of($ev, $constr)) {
          return $caml_call1($Js_of_ocaml_Js[2], $ev);
        }
      }
      return $Js_of_ocaml_Js[1];
    };
    $mouseEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $jz = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -590574348, 124), $x);
      };
      $jA = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function($t57, $param) {return $t57->MouseEvent;})($jA, $jz),
        $ev
      );
    };
    $keyboardEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $jx = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -807764460, 125), $x);
      };
      $jy = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function($t58, $param) {return $t58->KeyboardEvent;})($jy, $jx),
        $ev
      );
    };
    $wheelEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $jv = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 239551166, 126), $x);
      };
      $jw = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function($t59, $param) {return $t59->WheelEvent;})($jw, $jv),
        $ev
      );
    };
    $mouseScrollEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $jt = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -31722201, 127), $x);
      };
      $ju = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function($t60, $param) {return $t60->MouseScrollEvent;})($ju, $jt),
        $ev
      );
    };
    $popStateEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $jr = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -903494309, 128), $x);
      };
      $js = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function($t61, $param) {return $t61->PopStateEvent;})($js, $jr),
        $ev
      );
    };
    $eventTarget = $Js_of_ocaml_Dom[13];
    $eventRelatedTarget = function($e) use ($Assert_failure,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_mouseout__0,$cst_mouseover__0,$gM,$gN,$runtime) {
      $jh = function($param) use ($Assert_failure,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_mouseout__0,$cst_mouseover__0,$e,$gM,$gN,$runtime) {
        $jk = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 1707673, 129), $x);
        };
        $match = $caml_js_to_string(
          (function($t65, $param) {return $t65->type;})($e, $jk)
        );
        if ($caml_string_notequal($match, $cst_mouseout__0)) {
          if ($caml_string_notequal($match, $cst_mouseover__0)) {return $Js_of_ocaml_Js[1];}
          $jl = function($param) use ($Assert_failure,$gM,$runtime) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $gM}) as \Throwable;
          };
          $jm = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 513086066, 130), $x
            );
          };
          $jn = (function($t63, $param) {return $t63->fromElement;})($e, $jm);
          return $caml_call2($Js_of_ocaml_Js[6][8], $jn, $jl);
        }
        $jo = function($param) use ($Assert_failure,$gN,$runtime) {
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $gN}) as \Throwable;
        };
        $jp = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 904455809, 131), $x);
        };
        $jq = (function($t64, $param) {return $t64->toElement;})($e, $jp);
        return $caml_call2($Js_of_ocaml_Js[6][8], $jq, $jo);
      };
      $ji = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -629591140, 132), $x);
      };
      $jj = (function($t62, $param) {return $t62->relatedTarget;})($e, $ji);
      return $caml_call2($Js_of_ocaml_Js[6][8], $jj, $jh);
    };
    $eventAbsolutePosition = function($e) use ($caml_call1,$caml_get_public_method,$document) {
      $i5 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1055163742, 133), $x);
      };
      $body = (function($t73, $param) {return $t73->body;})($document, $i5);
      $i6 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1068552417, 134), $x);
      };
      $html = (function($t72, $param) {return $t72->documentElement;})($document, $i6);
      $i7 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1040845960, 135), $x);
      };
      $i8 = (function($t71, $param) {return $t71->scrollTop;})($html, $i7);
      $i9 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1040845960, 136), $x);
      };
      $i_ = (function($t70, $param) {return $t70->scrollTop;})($body, $i9);
      $ja = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -75417682, 137), $x);
      };
      $jb = (int)
      ((int)
       ((function($t69, $param) {return $t69->clientY;})($e, $ja) + $i_) + $i8);
      $jc = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 91199156, 138), $x);
      };
      $jd = (function($t68, $param) {return $t68->scrollLeft;})($html, $jc);
      $je = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 91199156, 139), $x);
      };
      $jf = (function($t67, $param) {return $t67->scrollLeft;})($body, $je);
      $jg = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -75417683, 140), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         ((function($t66, $param) {return $t66->clientX;})($e, $jg) + $jf) + $jd),
        $jb
      };
    };
    $eventAbsolutePosition__0 = function($e) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$eventAbsolutePosition) {
      $iX = function($x) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$e,$eventAbsolutePosition) {
        $i1 = function($y) use ($x) {return Vector{0, $x, $y};};
        $i2 = function($param) use ($e,$eventAbsolutePosition) {
          return $eventAbsolutePosition($e);
        };
        $i3 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 1028467498, 141), $x);
        };
        $i4 = (function($t75, $param) {return $t75->pageY;})($e, $i3);
        return $caml_call3($Js_of_ocaml_Js[6][7], $i4, $i2, $i1);
      };
      $iY = function($param) use ($e,$eventAbsolutePosition) {
        return $eventAbsolutePosition($e);
      };
      $iZ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1028467497, 142), $x);
      };
      $i0 = (function($t74, $param) {return $t74->pageX;})($e, $iZ);
      return $caml_call3($Js_of_ocaml_Js[6][7], $i0, $iY, $iX);
    };
    $elementClientPosition = function($e) use ($caml_call1,$caml_get_public_method,$document) {
      $iJ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 718768073, 143), $x);
      };
      $r = (function($t84, $param) {return $t84->getBoundingClientRect();})($e, $iJ);
      $iK = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1055163742, 144), $x);
      };
      $body = (function($t83, $param) {return $t83->body;})($document, $iK);
      $iL = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1068552417, 145), $x);
      };
      $html = (function($t82, $param) {return $t82->documentElement;})($document, $iL);
      $iM = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -939682550, 146), $x);
      };
      $iN = (function($t81, $param) {return $t81->clientTop;})($html, $iM);
      $iO = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -939682550, 147), $x);
      };
      $iP = (function($t80, $param) {return $t80->clientTop;})($body, $iO);
      $iQ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 5793429, 148), $x);
      };
      $iR = (int)
      ((int)
       ((int) (function($t79, $param) {return $t79->top;})($r, $iQ) - $iP) - $iN);
      $iS = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 814972914, 149), $x);
      };
      $iT = (function($t78, $param) {return $t78->clientLeft;})($html, $iS);
      $iU = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 814972914, 150), $x);
      };
      $iV = (function($t77, $param) {return $t77->clientLeft;})($body, $iU);
      $iW = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -944764921, 151), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         ((int) (function($t76, $param) {return $t76->left;})($r, $iW) - $iV) - $iT),
        $iR
      };
    };
    $getDocumentScroll = function($param) use ($caml_call1,$caml_get_public_method,$document) {
      $iA = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1055163742, 152), $x);
      };
      $body = (function($t90, $param) {return $t90->body;})($document, $iA);
      $iB = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1068552417, 153), $x);
      };
      $html = (function($t89, $param) {return $t89->documentElement;})($document, $iB);
      $iC = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1040845960, 154), $x);
      };
      $iD = (function($t88, $param) {return $t88->scrollTop;})($html, $iC);
      $iE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 1040845960, 155), $x);
      };
      $iF = (int)
      ((function($t87, $param) {return $t87->scrollTop;})($body, $iE) + $iD);
      $iG = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 91199156, 156), $x);
      };
      $iH = (function($t86, $param) {return $t86->scrollLeft;})($html, $iG);
      $iI = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 91199156, 157), $x);
      };
      return Vector{
        0,
        (int)
        ((function($t85, $param) {return $t85->scrollLeft;})($body, $iI) + $iH),
        $iF
      };
    };
    $buttonPressed = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method,$unsigned_right_shift_32) {
      $iv = function($x) {return $x;};
      $iw = function($param) use ($caml_call1,$caml_get_public_method,$ev,$unsigned_right_shift_32) {
        $iz = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -639606286, 158), $x);
        };
        $match = (function($t92, $param) {return $t92->button;})($ev, $iz);
        $switcher = (int) ($match + -1);
        if (! (3 < $unsigned_right_shift_32($switcher, 0))) {
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 1;
            // FALLTHROUGH
            case 1:
              return 3;
            // FALLTHROUGH
            case 2:break;
            // FALLTHROUGH
            default:
              return 2;
            }
        }
        return 0;
      };
      $ix = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -910345251, 159), $x);
      };
      $iy = (function($t91, $param) {return $t91->which;})($ev, $ix);
      return $caml_call3($Js_of_ocaml_Js[6][7], $iy, $iw, $iv);
    };
    $hasMousewheelEvents = function($param) use ($caml_call1,$caml_get_public_method,$createDiv,$document) {
      $d = $createDiv($document);
      $is = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 524300314, 160), $x);
      };
      $it = "return;";
      $iu = "onmousewheel";
      ((function($t95, $t93, $t94, $param) {
          return $t95->setAttribute($t93, $t94);
        })($d, $iu, $it, $is));
      return typeof($d->onmousewheel) === "function" ? 1 : (0);
    };
    $addMousewheelEventListener = function($e, $h, $capt) use ($Event,$Js_of_ocaml_Js,$addEventListener,$caml_call1,$caml_call2,$caml_call3,$caml_call4,$caml_get_public_method,$handler,$hasMousewheelEvents) {
      if ($hasMousewheelEvents(0)) {
        $id = $caml_call1(
          $handler,
          function($e) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$h) {
            $ik = function($param) {return 0;};
            $il = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -95379365, 161),
                $x
              );
            };
            $im = (function($t101, $param) {return $t101->wheelDeltaX;})($e, $il);
            $dx = (int)
            ((int) - $caml_call2($Js_of_ocaml_Js[6][8], $im, $ik) / 40);
            $io = function($param) use ($caml_call1,$caml_get_public_method,$e) {
              $ir = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, 644780381, 162),
                  $x
                );
              };
              return (function($t100, $param) {return $t100->wheelDelta;})($e, $ir);
            };
            $ip = function($x) use ($caml_call1,$caml_get_public_method) {
              return $caml_call1(
                $caml_get_public_method($x, -95379364, 163),
                $x
              );
            };
            $iq = (function($t99, $param) {return $t99->wheelDeltaY;})($e, $ip);
            $dy = (int)
            ((int) - $caml_call2($Js_of_ocaml_Js[6][8], $iq, $io) / 40);
            return $caml_call3($h, $e, $dx, $dy);
          }
        );
        return $caml_call4($addEventListener, $e, $Event[11], $id, $capt);
      }
      $ie = $caml_call1(
        $handler,
        function($e) use ($caml_call1,$caml_call3,$caml_get_public_method,$h) {
          $ig = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -266378607, 164),
              $x
            );
          };
          $d = (function($t98, $param) {return $t98->detail;})($e, $ig);
          $ih = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, -66775139, 165), $x
            );
          };
          $ii = (function($t97, $param) {return $t97->HORIZONTAL;})($e, $ih);
          $ij = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -1065804639, 166),
              $x
            );
          };
          return (function($t96, $param) {return $t96->axis;})($e, $ij) === $ii
            ? $caml_call3($h, $e, $d, 0)
            : ($caml_call3($h, $e, 0, $d));
        }
      );
      return $caml_call4($addEventListener, $e, $Event[12], $ie, $capt);
    };
    $try_code = function($v) use ($caml_js_to_string,$caml_string_compare,$caml_string_notequal,$cst_AltLeft,$cst_AltRight,$cst_ArrowDown,$cst_ArrowLeft,$cst_ArrowRight,$cst_ArrowUp,$cst_Backquote,$cst_Backslash,$cst_Backspace,$cst_BracketLeft,$cst_BracketRight,$cst_BrowserBack,$cst_BrowserFavorites,$cst_BrowserForward,$cst_BrowserHome,$cst_BrowserRefresh,$cst_BrowserSearch,$cst_BrowserStop,$cst_CapsLock,$cst_Comma,$cst_ContextMenu,$cst_ControlLeft,$cst_ControlRight,$cst_Delete,$cst_Digit0,$cst_Digit1,$cst_Digit2,$cst_Digit3,$cst_Digit4,$cst_Digit5,$cst_Digit6,$cst_Digit7,$cst_Digit8,$cst_Digit9,$cst_End,$cst_Enter,$cst_Equal,$cst_Escape,$cst_F1,$cst_F10,$cst_F11,$cst_F12,$cst_F2,$cst_F3,$cst_F4,$cst_F5,$cst_F6,$cst_F7,$cst_F8,$cst_F9,$cst_Home,$cst_Insert,$cst_IntlBackslash,$cst_IntlYen,$cst_KeyA,$cst_KeyB,$cst_KeyC,$cst_KeyD,$cst_KeyE,$cst_KeyF,$cst_KeyG,$cst_KeyH,$cst_KeyI,$cst_KeyJ,$cst_KeyK,$cst_KeyL,$cst_KeyM,$cst_KeyN,$cst_KeyO,$cst_KeyP,$cst_KeyQ,$cst_KeyR,$cst_KeyS,$cst_KeyT,$cst_KeyU,$cst_KeyV,$cst_KeyW,$cst_KeyX,$cst_KeyY,$cst_KeyZ,$cst_MediaPlayPause,$cst_MediaStop,$cst_MediaTrackNext,$cst_MediaTrackPrevious,$cst_MetaLeft,$cst_MetaRight,$cst_Minus,$cst_NumLock,$cst_Numpad0,$cst_Numpad1,$cst_Numpad2,$cst_Numpad3,$cst_Numpad4,$cst_Numpad5,$cst_Numpad6,$cst_Numpad7,$cst_Numpad8,$cst_Numpad9,$cst_NumpadAdd,$cst_NumpadDecimal,$cst_NumpadDivide,$cst_NumpadEnter,$cst_NumpadEqual,$cst_NumpadMultiply,$cst_NumpadSubtract,$cst_OSLeft,$cst_OSRight,$cst_PageDown,$cst_PageUp,$cst_Pause,$cst_Period,$cst_PrintScreen,$cst_Quote,$cst_ScrollLock,$cst_Semicolon,$cst_ShiftLeft,$cst_ShiftRight,$cst_Slash,$cst_Space,$cst_Tab,$cst_VolumeDown,$cst_VolumeMute,$cst_VolumeUp) {
      $match = $caml_js_to_string($v);
      $switch__0 = $caml_string_compare($match, $cst_KeyH);
      if (0 <= $switch__0) {
        if (! (0 < $switch__0)) {return 8;}
        $switch__1 = $caml_string_compare($match, $cst_Numpad4);
        if (0 <= $switch__1) {
          if (! (0 < $switch__1)) {return 72;}
          $switch__2 = $caml_string_compare($match, $cst_PageUp);
          if (0 <= $switch__2) {
            if (! (0 < $switch__2)) {return 98;}
            $switch__3 = $caml_string_compare($match, $cst_ShiftRight);
            if (0 <= $switch__3) {
              if (! (0 < $switch__3)) {return 91;}
              if (! $caml_string_notequal($match, $cst_Slash)) {return 55;}
              if (! $caml_string_notequal($match, $cst_Space)) {return 41;}
              if (! $caml_string_notequal($match, $cst_Tab)) {return 39;}
              if (! $caml_string_notequal($match, $cst_VolumeDown)) {return 103;}
              if (! $caml_string_notequal($match, $cst_VolumeMute)) {return 102;}
              if (! $caml_string_notequal($match, $cst_VolumeUp)) {return 104;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_Pause)) {return 123;}
              if (! $caml_string_notequal($match, $cst_Period)) {return 54;}
              if (! $caml_string_notequal($match, $cst_PrintScreen)) {return 120;}
              if (! $caml_string_notequal($match, $cst_Quote)) {return 50;}
              if (! $caml_string_notequal($match, $cst_ScrollLock)) {return 119;}
              if (! $caml_string_notequal($match, $cst_Semicolon)) {return 49;}
              if (! $caml_string_notequal($match, $cst_ShiftLeft)) {return 90;}
            }
          }
          else {
            $switch__4 = $caml_string_compare($match, $cst_NumpadDivide);
            if (0 <= $switch__4) {
              if (! (0 < $switch__4)) {return 84;}
              if (! $caml_string_notequal($match, $cst_NumpadEnter)) {return 83;}
              if (! $caml_string_notequal($match, $cst_NumpadEqual)) {return 82;}
              if (! $caml_string_notequal($match, $cst_NumpadMultiply)) {return 78;}
              if (! $caml_string_notequal($match, $cst_NumpadSubtract)) {return 79;}
              if (! $caml_string_notequal($match, $cst_OSLeft)) {return 117;}
              if (! $caml_string_notequal($match, $cst_OSRight)) {return 118;}
              if (! $caml_string_notequal($match, $cst_PageDown)) {return 99;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_Numpad5)) {return 73;}
              if (! $caml_string_notequal($match, $cst_Numpad6)) {return 74;}
              if (! $caml_string_notequal($match, $cst_Numpad7)) {return 75;}
              if (! $caml_string_notequal($match, $cst_Numpad8)) {return 76;}
              if (! $caml_string_notequal($match, $cst_Numpad9)) {return 77;}
              if (! $caml_string_notequal($match, $cst_NumpadAdd)) {return 80;}
              if (! $caml_string_notequal($match, $cst_NumpadDecimal)) {return 81;}
            }
          }
        }
        else {
          $switch__5 = $caml_string_compare($match, $cst_KeyX);
          if (0 <= $switch__5) {
            if (! (0 < $switch__5)) {return 24;}
            $switch__6 = $caml_string_compare($match, $cst_MetaRight);
            if (0 <= $switch__6) {
              if (! (0 < $switch__6)) {return 89;}
              if (! $caml_string_notequal($match, $cst_Minus)) {return 37;}
              if (! $caml_string_notequal($match, $cst_NumLock)) {return 85;}
              if (! $caml_string_notequal($match, $cst_Numpad0)) {return 68;}
              if (! $caml_string_notequal($match, $cst_Numpad1)) {return 69;}
              if (! $caml_string_notequal($match, $cst_Numpad2)) {return 70;}
              if (! $caml_string_notequal($match, $cst_Numpad3)) {return 71;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_KeyY)) {return 25;}
              if (! $caml_string_notequal($match, $cst_KeyZ)) {return 26;}
              if (! $caml_string_notequal($match, $cst_MediaPlayPause)) {return 107;}
              if (! $caml_string_notequal($match, $cst_MediaStop)) {return 108;}
              if (! $caml_string_notequal($match, $cst_MediaTrackNext)) {return 106;}
              if (! $caml_string_notequal($match, $cst_MediaTrackPrevious)) {return 105;}
              if (! $caml_string_notequal($match, $cst_MetaLeft)) {return 88;}
            }
          }
          else {
            $switch__7 = $caml_string_compare($match, $cst_KeyP);
            if (0 <= $switch__7) {
              if (! (0 < $switch__7)) {return 16;}
              if (! $caml_string_notequal($match, $cst_KeyQ)) {return 17;}
              if (! $caml_string_notequal($match, $cst_KeyR)) {return 18;}
              if (! $caml_string_notequal($match, $cst_KeyS)) {return 19;}
              if (! $caml_string_notequal($match, $cst_KeyT)) {return 20;}
              if (! $caml_string_notequal($match, $cst_KeyU)) {return 21;}
              if (! $caml_string_notequal($match, $cst_KeyV)) {return 22;}
              if (! $caml_string_notequal($match, $cst_KeyW)) {return 23;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_KeyI)) {return 9;}
              if (! $caml_string_notequal($match, $cst_KeyJ)) {return 10;}
              if (! $caml_string_notequal($match, $cst_KeyK)) {return 11;}
              if (! $caml_string_notequal($match, $cst_KeyL)) {return 12;}
              if (! $caml_string_notequal($match, $cst_KeyM)) {return 13;}
              if (! $caml_string_notequal($match, $cst_KeyN)) {return 14;}
              if (! $caml_string_notequal($match, $cst_KeyO)) {return 15;}
            }
          }
        }
      }
      else {
        $switch__8 = $caml_string_compare($match, $cst_Digit6);
        if (0 <= $switch__8) {
          if (! (0 < $switch__8)) {return 33;}
          $switch__9 = $caml_string_compare($match, $cst_F6);
          if (0 <= $switch__9) {
            if (! (0 < $switch__9)) {return 61;}
            $switch__10 = $caml_string_compare($match, $cst_KeyA);
            if (0 <= $switch__10) {
              if (! (0 < $switch__10)) {return 1;}
              if (! $caml_string_notequal($match, $cst_KeyB)) {return 2;}
              if (! $caml_string_notequal($match, $cst_KeyC)) {return 3;}
              if (! $caml_string_notequal($match, $cst_KeyD)) {return 4;}
              if (! $caml_string_notequal($match, $cst_KeyE)) {return 5;}
              if (! $caml_string_notequal($match, $cst_KeyF)) {return 6;}
              if (! $caml_string_notequal($match, $cst_KeyG)) {return 7;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_F7)) {return 62;}
              if (! $caml_string_notequal($match, $cst_F8)) {return 63;}
              if (! $caml_string_notequal($match, $cst_F9)) {return 64;}
              if (! $caml_string_notequal($match, $cst_Home)) {return 100;}
              if (! $caml_string_notequal($match, $cst_Insert)) {return 44;}
              if (! $caml_string_notequal($match, $cst_IntlBackslash)) {return 121;}
              if (! $caml_string_notequal($match, $cst_IntlYen)) {return 122;}
            }
          }
          else {
            $switch__11 = $caml_string_compare($match, $cst_F1);
            if (0 <= $switch__11) {
              if (! (0 < $switch__11)) {return 56;}
              if (! $caml_string_notequal($match, $cst_F10)) {return 65;}
              if (! $caml_string_notequal($match, $cst_F11)) {return 66;}
              if (! $caml_string_notequal($match, $cst_F12)) {return 67;}
              if (! $caml_string_notequal($match, $cst_F2)) {return 57;}
              if (! $caml_string_notequal($match, $cst_F3)) {return 58;}
              if (! $caml_string_notequal($match, $cst_F4)) {return 59;}
              if (! $caml_string_notequal($match, $cst_F5)) {return 60;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_Digit7)) {return 34;}
              if (! $caml_string_notequal($match, $cst_Digit8)) {return 35;}
              if (! $caml_string_notequal($match, $cst_Digit9)) {return 36;}
              if (! $caml_string_notequal($match, $cst_End)) {return 101;}
              if (! $caml_string_notequal($match, $cst_Enter)) {return 40;}
              if (! $caml_string_notequal($match, $cst_Equal)) {return 38;}
              if (! $caml_string_notequal($match, $cst_Escape)) {return 42;}
            }
          }
        }
        else {
          $switch__12 = $caml_string_compare($match, $cst_BrowserRefresh);
          if (0 <= $switch__12) {
            if (! (0 < $switch__12)) {return 113;}
            $switch__13 = $caml_string_compare($match, $cst_Delete);
            if (0 <= $switch__13) {
              if (! (0 < $switch__13)) {return 45;}
              if (! $caml_string_notequal($match, $cst_Digit0)) {return 27;}
              if (! $caml_string_notequal($match, $cst_Digit1)) {return 28;}
              if (! $caml_string_notequal($match, $cst_Digit2)) {return 29;}
              if (! $caml_string_notequal($match, $cst_Digit3)) {return 30;}
              if (! $caml_string_notequal($match, $cst_Digit4)) {return 31;}
              if (! $caml_string_notequal($match, $cst_Digit5)) {return 32;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_BrowserSearch)) {return 110;}
              if (! $caml_string_notequal($match, $cst_BrowserStop)) {return 114;}
              if (! $caml_string_notequal($match, $cst_CapsLock)) {return 46;}
              if (! $caml_string_notequal($match, $cst_Comma)) {return 53;}
              if (! $caml_string_notequal($match, $cst_ContextMenu)) {return 109;}
              if (! $caml_string_notequal($match, $cst_ControlLeft)) {return 86;}
              if (! $caml_string_notequal($match, $cst_ControlRight)) {return 87;}
            }
          }
          else {
            $switch__14 = $caml_string_compare($match, $cst_Backslash);
            if (0 <= $switch__14) {
              if (! (0 < $switch__14)) {return 52;}
              if (! $caml_string_notequal($match, $cst_Backspace)) {return 43;}
              if (! $caml_string_notequal($match, $cst_BracketLeft)) {return 47;}
              if (! $caml_string_notequal($match, $cst_BracketRight)) {return 48;}
              if (! $caml_string_notequal($match, $cst_BrowserBack)) {return 116;}
              if (! $caml_string_notequal($match, $cst_BrowserFavorites)) {return 112;}
              if (! $caml_string_notequal($match, $cst_BrowserForward)) {return 115;}
              if (! $caml_string_notequal($match, $cst_BrowserHome)) {return 111;}
            }
            else {
              if (! $caml_string_notequal($match, $cst_AltLeft)) {return 92;}
              if (! $caml_string_notequal($match, $cst_AltRight)) {return 93;}
              if (! $caml_string_notequal($match, $cst_ArrowDown)) {return 97;}
              if (! $caml_string_notequal($match, $cst_ArrowLeft)) {return 94;}
              if (! $caml_string_notequal($match, $cst_ArrowRight)) {return 95;}
              if (! $caml_string_notequal($match, $cst_ArrowUp)) {return 96;}
              if (! $caml_string_notequal($match, $cst_Backquote)) {return 51;}
            }
          }
        }
      }
      return 0;
    };
    $try_key_code_left = function($param) {
      if (19 <= $param) {
        if (91 === $param) {return 88;}
      }
      else {
        if (16 <= $param) {
          $switcher = (int) ($param + -16);
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 90;
            // FALLTHROUGH
            case 1:
              return 86;
            // FALLTHROUGH
            default:
              return 92;
            }
        }
      }
      return 0;
    };
    $try_key_code_right = function($param) {
      if (19 <= $param) {
        if (91 === $param) {return 89;}
      }
      else {
        if (16 <= $param) {
          $switcher = (int) ($param + -16);
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 91;
            // FALLTHROUGH
            case 1:
              return 87;
            // FALLTHROUGH
            default:
              return 93;
            }
        }
      }
      return 0;
    };
    $try_key_code_numpad = function($param) use ($unsigned_right_shift_32) {
      if (47 <= $param) {
        $switcher = (int) ($param + -96);
        if (! (15 < $unsigned_right_shift_32($switcher, 0))) {
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 68;
            // FALLTHROUGH
            case 1:
              return 69;
            // FALLTHROUGH
            case 2:
              return 70;
            // FALLTHROUGH
            case 3:
              return 71;
            // FALLTHROUGH
            case 4:
              return 72;
            // FALLTHROUGH
            case 5:
              return 73;
            // FALLTHROUGH
            case 6:
              return 74;
            // FALLTHROUGH
            case 7:
              return 75;
            // FALLTHROUGH
            case 8:
              return 76;
            // FALLTHROUGH
            case 9:
              return 77;
            // FALLTHROUGH
            case 10:
              return 78;
            // FALLTHROUGH
            case 11:
              return 80;
            // FALLTHROUGH
            case 12:break;
            // FALLTHROUGH
            case 13:
              return 79;
            // FALLTHROUGH
            case 14:
              return 81;
            // FALLTHROUGH
            default:
              return 84;
            }
        }
      }
      else {
        if (12 <= $param) {
          $switcher__0 = (int) ($param + -12);
          switch($switcher__0) {
            // FALLTHROUGH
            case 0:
              return 73;
            // FALLTHROUGH
            case 1:
              return 83;
            // FALLTHROUGH
            case 21:
              return 77;
            // FALLTHROUGH
            case 22:
              return 71;
            // FALLTHROUGH
            case 23:
              return 69;
            // FALLTHROUGH
            case 24:
              return 75;
            // FALLTHROUGH
            case 25:
              return 72;
            // FALLTHROUGH
            case 26:
              return 76;
            // FALLTHROUGH
            case 27:
              return 74;
            // FALLTHROUGH
            case 28:
              return 70;
            // FALLTHROUGH
            case 33:
              return 68;
            // FALLTHROUGH
            case 34:
              return 81;
            }
        }
      }
      return 0;
    };
    $try_key_code_normal = function($param) use ($unsigned_right_shift_32) {
      $switcher = (int) ($param + -8);
      if (! (214 < $unsigned_right_shift_32($switcher, 0))) {
        $ic = $switcher;
        if (67 <= $ic) {
          switch($ic) {
            // FALLTHROUGH
            case 67:
              return 11;
            // FALLTHROUGH
            case 68:
              return 12;
            // FALLTHROUGH
            case 69:
              return 13;
            // FALLTHROUGH
            case 70:
              return 14;
            // FALLTHROUGH
            case 71:
              return 15;
            // FALLTHROUGH
            case 72:
              return 16;
            // FALLTHROUGH
            case 73:
              return 17;
            // FALLTHROUGH
            case 74:
              return 18;
            // FALLTHROUGH
            case 75:
              return 19;
            // FALLTHROUGH
            case 76:
              return 20;
            // FALLTHROUGH
            case 77:
              return 21;
            // FALLTHROUGH
            case 78:
              return 22;
            // FALLTHROUGH
            case 79:
              return 23;
            // FALLTHROUGH
            case 80:
              return 24;
            // FALLTHROUGH
            case 81:
              return 25;
            // FALLTHROUGH
            case 82:
              return 26;
            // FALLTHROUGH
            case 85:
              return 109;
            // FALLTHROUGH
            case 104:
              return 56;
            // FALLTHROUGH
            case 105:
              return 57;
            // FALLTHROUGH
            case 106:
              return 58;
            // FALLTHROUGH
            case 107:
              return 59;
            // FALLTHROUGH
            case 108:
              return 60;
            // FALLTHROUGH
            case 109:
              return 61;
            // FALLTHROUGH
            case 110:
              return 62;
            // FALLTHROUGH
            case 111:
              return 63;
            // FALLTHROUGH
            case 112:
              return 64;
            // FALLTHROUGH
            case 113:
              return 65;
            // FALLTHROUGH
            case 114:
              return 66;
            // FALLTHROUGH
            case 115:
              return 67;
            // FALLTHROUGH
            case 137:
              return 119;
            // FALLTHROUGH
            case 178:
              return 49;
            // FALLTHROUGH
            case 179:
              return 38;
            // FALLTHROUGH
            case 180:
              return 53;
            // FALLTHROUGH
            case 181:
              return 37;
            // FALLTHROUGH
            case 182:
              return 54;
            // FALLTHROUGH
            case 183:
              return 55;
            // FALLTHROUGH
            case 184:
              return 51;
            // FALLTHROUGH
            case 211:
              return 47;
            // FALLTHROUGH
            case 212:
              return 52;
            // FALLTHROUGH
            case 213:
              return 48;
            // FALLTHROUGH
            case 214:
              return 50;
            }
        }
        else {
          switch($ic) {
            // FALLTHROUGH
            case 0:
              return 43;
            // FALLTHROUGH
            case 1:
              return 39;
            // FALLTHROUGH
            case 5:
              return 40;
            // FALLTHROUGH
            case 11:
              return 123;
            // FALLTHROUGH
            case 12:
              return 46;
            // FALLTHROUGH
            case 19:
              return 42;
            // FALLTHROUGH
            case 24:
              return 41;
            // FALLTHROUGH
            case 25:
              return 98;
            // FALLTHROUGH
            case 26:
              return 99;
            // FALLTHROUGH
            case 27:
              return 101;
            // FALLTHROUGH
            case 28:
              return 100;
            // FALLTHROUGH
            case 29:
              return 94;
            // FALLTHROUGH
            case 30:
              return 96;
            // FALLTHROUGH
            case 31:
              return 95;
            // FALLTHROUGH
            case 32:
              return 97;
            // FALLTHROUGH
            case 34:
              return 120;
            // FALLTHROUGH
            case 37:
              return 44;
            // FALLTHROUGH
            case 38:
              return 45;
            // FALLTHROUGH
            case 40:
              return 27;
            // FALLTHROUGH
            case 41:
              return 28;
            // FALLTHROUGH
            case 42:
              return 29;
            // FALLTHROUGH
            case 43:
              return 30;
            // FALLTHROUGH
            case 44:
              return 31;
            // FALLTHROUGH
            case 45:
              return 32;
            // FALLTHROUGH
            case 46:
              return 33;
            // FALLTHROUGH
            case 47:
              return 34;
            // FALLTHROUGH
            case 48:
              return 35;
            // FALLTHROUGH
            case 49:
              return 36;
            // FALLTHROUGH
            case 57:
              return 1;
            // FALLTHROUGH
            case 58:
              return 2;
            // FALLTHROUGH
            case 59:
              return 3;
            // FALLTHROUGH
            case 60:
              return 4;
            // FALLTHROUGH
            case 61:
              return 5;
            // FALLTHROUGH
            case 62:
              return 6;
            // FALLTHROUGH
            case 63:
              return 7;
            // FALLTHROUGH
            case 64:
              return 8;
            // FALLTHROUGH
            case 65:
              return 9;
            // FALLTHROUGH
            case 66:
              return 10;
            }
        }
      }
      return 0;
    };
    $make_unidentified = function($param) {return 0;};
    $try_next = function($value, $f, $v) use ($Js_of_ocaml_Js,$caml_call3,$make_unidentified) {
      return 0 === $v
        ? $caml_call3($Js_of_ocaml_Js[6][7], $value, $make_unidentified, $f)
        : ($v);
    };
    $run_next = function($value, $f, $v) use ($caml_call1) {
      return 0 === $v ? $caml_call1($f, $value) : ($v);
    };
    $get_key_code = function($evt) use ($caml_call1,$caml_get_public_method) {
      $ib = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 463348332, 167), $x);
      };
      return (function($t102, $param) {return $t102->keyCode;})($evt, $ib);
    };
    $try_key_location = function($evt) use ($caml_call1,$caml_get_public_method,$get_key_code,$make_unidentified,$run_next,$try_key_code_left,$try_key_code_numpad,$try_key_code_right,$unsigned_right_shift_32) {
      $h5 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -448369099, 168), $x);
      };
      $match = (function($t103, $param) {return $t103->location;})($evt, $h5);
      $switcher = (int) ($match + -1);
      if (2 < $unsigned_right_shift_32($switcher, 0)) {return $make_unidentified;}
      switch($switcher) {
        // FALLTHROUGH
        case 0:
          $h6 = $get_key_code($evt);
          return function($h_) use ($h6,$run_next,$try_key_code_left) {
            return $run_next($h6, $try_key_code_left, $h_);
          };
        // FALLTHROUGH
        case 1:
          $h7 = $get_key_code($evt);
          return function($h9) use ($h7,$run_next,$try_key_code_right) {
            return $run_next($h7, $try_key_code_right, $h9);
          };
        // FALLTHROUGH
        default:
          $h8 = $get_key_code($evt);
          return function($ia) use ($h8,$run_next,$try_key_code_numpad) {
            return $run_next($h8, $try_key_code_numpad, $ia);
          };
        }
    };
    $gO = function($x, $f) use ($caml_call1) {return $caml_call1($f, $x);};
    $of_event = function($evt) use ($caml_call1,$caml_get_public_method,$gO,$get_key_code,$run_next,$try_code,$try_key_code_normal,$try_key_location,$try_next) {
      $hY = $get_key_code($evt);
      $hZ = function($h4) use ($hY,$run_next,$try_key_code_normal) {
        return $run_next($hY, $try_key_code_normal, $h4);
      };
      $h0 = $try_key_location($evt);
      $h1 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1044074195, 169), $x);
      };
      $h2 = (function($t104, $param) {return $t104->code;})($evt, $h1);
      return $gO(
        $gO(
          $gO(
            0,
            function($h3) use ($h2,$try_code,$try_next) {
              return $try_next($h2, $try_code, $h3);
            }
          ),
          $h0
        ),
        $hZ
      );
    };
    $char_of_int = function($value) use ($Uchar,$caml_call1) {
      if (0 < $value) {
        try {$hW = Vector{0, $caml_call1($Uchar[8], $value)};return $hW;}
        catch(\Throwable $hX) {return 0;}
      }
      return 0;
    };
    $empty_string = function($param) {return "";};
    $none = function($param) {return 0;};
    $of_event__0 = function($evt) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_call3,$caml_get_public_method,$char_of_int,$empty_string,$none) {
      $hP = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 5343647, 170), $x);
      };
      $hQ = (function($t109, $param) {return $t109->key;})($evt, $hP);
      $key = $caml_call2($Js_of_ocaml_Js[6][8], $hQ, $empty_string);
      $hR = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 171), $x);
      };
      $match = (function($t108, $param) {return $t108->length;})($key, $hR);
      if (0 === $match) {
        $hS = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 472145699, 172), $x);
        };
        $hT = (function($t105, $param) {return $t105->charCode;})($evt, $hS);
        return $caml_call3($Js_of_ocaml_Js[6][7], $hT, $none, $char_of_int);
      }
      if (1 === $match) {
        $hU = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 894756598, 173), $x);
        };
        $hV = 0;
        return $char_of_int(
          (int)
          (function($t107, $t106, $param) {return $t107->charCodeAt($t106);})($key, $hV, $hU)
        );
      }
      return 0;
    };
    $element__0 = function($hO) {return $hO;};
    $other = function($e) {return Vector{61, $e};};
    $tagged = function($e) use ($caml_call1,$caml_get_public_method,$caml_string_notequal,$cst_a__1,$cst_area__1,$cst_audio__1,$cst_base__1,$cst_blockquote__1,$cst_body__1,$cst_br__1,$cst_button__1,$cst_canvas__1,$cst_caption__1,$cst_col__1,$cst_colgroup__1,$cst_del__1,$cst_div__1,$cst_dl__1,$cst_embed__1,$cst_fieldset__1,$cst_form__1,$cst_frame__1,$cst_frameset__1,$cst_h1__1,$cst_h2__1,$cst_h3__1,$cst_h4__1,$cst_h5__1,$cst_h6__1,$cst_head__1,$cst_hr__1,$cst_html__1,$cst_iframe__1,$cst_img__1,$cst_input__2,$cst_ins__1,$cst_label__1,$cst_legend__1,$cst_li__1,$cst_link__1,$cst_map__1,$cst_meta__1,$cst_object__1,$cst_ol__1,$cst_optgroup__1,$cst_option__1,$cst_p__1,$cst_param__1,$cst_pre__1,$cst_q__1,$cst_script__1,$cst_select__2,$cst_style__1,$cst_table__1,$cst_tbody__1,$cst_td__1,$cst_textarea__1,$cst_tfoot__1,$cst_th__1,$cst_thead__1,$cst_title__1,$cst_tr__1,$cst_ul__1,$cst_video__1,$other,$runtime,$unsigned_right_shift_32) {
      $hL = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946097238, 174), $x);
      };
      $hM = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 578170309, 175), $x);
      };
      $hN = (function($t110, $param) {return $t110->tagName;})($e, $hM);
      $tag = $runtime["caml_js_to_byte_string"](
        (function($t111, $param) {return $t111->toLowerCase();})($hN, $hL)
      );
      if (0 === $runtime["caml_ml_string_length"]($tag)) {return $other($e);}
      $match = $runtime["caml_bytes_unsafe_get"]($tag, 0);
      $switcher = (int) ($match + -97);
      if (! (21 < $unsigned_right_shift_32($switcher, 0))) {
        switch($switcher) {
          // FALLTHROUGH
          case 0:
            return $caml_string_notequal($tag, $cst_a__1)
              ? $caml_string_notequal($tag, $cst_area__1)
               ? $caml_string_notequal($tag, $cst_audio__1)
                ? $other($e)
                : (Vector{2, $e})
               : (Vector{1, $e})
              : (Vector{0, $e});
          // FALLTHROUGH
          case 1:
            return $caml_string_notequal($tag, $cst_base__1)
              ? $caml_string_notequal($tag, $cst_blockquote__1)
               ? $caml_string_notequal($tag, $cst_body__1)
                ? $caml_string_notequal($tag, $cst_br__1)
                 ? $caml_string_notequal($tag, $cst_button__1)
                  ? $other($e)
                  : (Vector{7, $e})
                 : (Vector{6, $e})
                : (Vector{5, $e})
               : (Vector{4, $e})
              : (Vector{3, $e});
          // FALLTHROUGH
          case 2:
            return $caml_string_notequal($tag, $cst_canvas__1)
              ? $caml_string_notequal($tag, $cst_caption__1)
               ? $caml_string_notequal($tag, $cst_col__1)
                ? $caml_string_notequal($tag, $cst_colgroup__1)
                 ? $other($e)
                 : (Vector{11, $e})
                : (Vector{10, $e})
               : (Vector{9, $e})
              : (Vector{8, $e});
          // FALLTHROUGH
          case 3:
            return $caml_string_notequal($tag, $cst_del__1)
              ? $caml_string_notequal($tag, $cst_div__1)
               ? $caml_string_notequal($tag, $cst_dl__1)
                ? $other($e)
                : (Vector{14, $e})
               : (Vector{13, $e})
              : (Vector{12, $e});
          // FALLTHROUGH
          case 4:
            return $caml_string_notequal($tag, $cst_embed__1)
              ? $other($e)
              : (Vector{15, $e});
          // FALLTHROUGH
          case 5:
            return $caml_string_notequal($tag, $cst_fieldset__1)
              ? $caml_string_notequal($tag, $cst_form__1)
               ? $caml_string_notequal($tag, $cst_frame__1)
                ? $caml_string_notequal($tag, $cst_frameset__1)
                 ? $other($e)
                 : (Vector{18, $e})
                : (Vector{19, $e})
               : (Vector{17, $e})
              : (Vector{16, $e});
          // FALLTHROUGH
          case 7:
            return $caml_string_notequal($tag, $cst_h1__1)
              ? $caml_string_notequal($tag, $cst_h2__1)
               ? $caml_string_notequal($tag, $cst_h3__1)
                ? $caml_string_notequal($tag, $cst_h4__1)
                 ? $caml_string_notequal($tag, $cst_h5__1)
                  ? $caml_string_notequal($tag, $cst_h6__1)
                   ? $caml_string_notequal($tag, $cst_head__1)
                    ? $caml_string_notequal($tag, $cst_hr__1)
                     ? $caml_string_notequal($tag, $cst_html__1)
                      ? $other($e)
                      : (Vector{28, $e})
                     : (Vector{27, $e})
                    : (Vector{26, $e})
                   : (Vector{25, $e})
                  : (Vector{24, $e})
                 : (Vector{23, $e})
                : (Vector{22, $e})
               : (Vector{21, $e})
              : (Vector{20, $e});
          // FALLTHROUGH
          case 8:
            return $caml_string_notequal($tag, $cst_iframe__1)
              ? $caml_string_notequal($tag, $cst_img__1)
               ? $caml_string_notequal($tag, $cst_input__2)
                ? $caml_string_notequal($tag, $cst_ins__1)
                 ? $other($e)
                 : (Vector{32, $e})
                : (Vector{31, $e})
               : (Vector{30, $e})
              : (Vector{29, $e});
          // FALLTHROUGH
          case 11:
            return $caml_string_notequal($tag, $cst_label__1)
              ? $caml_string_notequal($tag, $cst_legend__1)
               ? $caml_string_notequal($tag, $cst_li__1)
                ? $caml_string_notequal($tag, $cst_link__1)
                 ? $other($e)
                 : (Vector{36, $e})
                : (Vector{35, $e})
               : (Vector{34, $e})
              : (Vector{33, $e});
          // FALLTHROUGH
          case 12:
            return $caml_string_notequal($tag, $cst_map__1)
              ? $caml_string_notequal($tag, $cst_meta__1)
               ? $other($e)
               : (Vector{38, $e})
              : (Vector{37, $e});
          // FALLTHROUGH
          case 14:
            return $caml_string_notequal($tag, $cst_object__1)
              ? $caml_string_notequal($tag, $cst_ol__1)
               ? $caml_string_notequal($tag, $cst_optgroup__1)
                ? $caml_string_notequal($tag, $cst_option__1)
                 ? $other($e)
                 : (Vector{42, $e})
                : (Vector{41, $e})
               : (Vector{40, $e})
              : (Vector{39, $e});
          // FALLTHROUGH
          case 15:
            return $caml_string_notequal($tag, $cst_p__1)
              ? $caml_string_notequal($tag, $cst_param__1)
               ? $caml_string_notequal($tag, $cst_pre__1)
                ? $other($e)
                : (Vector{45, $e})
               : (Vector{44, $e})
              : (Vector{43, $e});
          // FALLTHROUGH
          case 16:
            return $caml_string_notequal($tag, $cst_q__1)
              ? $other($e)
              : (Vector{46, $e});
          // FALLTHROUGH
          case 18:
            return $caml_string_notequal($tag, $cst_script__1)
              ? $caml_string_notequal($tag, $cst_select__2)
               ? $caml_string_notequal($tag, $cst_style__1)
                ? $other($e)
                : (Vector{49, $e})
               : (Vector{48, $e})
              : (Vector{47, $e});
          // FALLTHROUGH
          case 19:
            return $caml_string_notequal($tag, $cst_table__1)
              ? $caml_string_notequal($tag, $cst_tbody__1)
               ? $caml_string_notequal($tag, $cst_td__1)
                ? $caml_string_notequal($tag, $cst_textarea__1)
                 ? $caml_string_notequal($tag, $cst_tfoot__1)
                  ? $caml_string_notequal($tag, $cst_th__1)
                   ? $caml_string_notequal($tag, $cst_thead__1)
                    ? $caml_string_notequal($tag, $cst_title__1)
                     ? $caml_string_notequal($tag, $cst_tr__1)
                      ? $other($e)
                      : (Vector{58, $e})
                     : (Vector{57, $e})
                    : (Vector{56, $e})
                   : (Vector{55, $e})
                  : (Vector{54, $e})
                 : (Vector{53, $e})
                : (Vector{52, $e})
               : (Vector{51, $e})
              : (Vector{50, $e});
          // FALLTHROUGH
          case 20:
            return $caml_string_notequal($tag, $cst_ul__1)
              ? $other($e)
              : (Vector{59, $e});
          // FALLTHROUGH
          case 21:
            return $caml_string_notequal($tag, $cst_video__1)
              ? $other($e)
              : (Vector{60, $e});
          }
      }
      return $other($e);
    };
    $opt_tagged = function($e) use ($Js_of_ocaml_Js,$caml_call3,$tagged) {
      $hJ = function($e) use ($tagged) {return Vector{0, $tagged($e)};};
      $hK = function($param) {return 0;};
      return $caml_call3($Js_of_ocaml_Js[5][7], $e, $hK, $hJ);
    };
    $taggedEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call3,$keyboardEvent,$mouseEvent,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
      $hu = function($ev) {return Vector{0, $ev};};
      $hv = function($param) use ($Js_of_ocaml_Js,$caml_call3,$ev,$keyboardEvent,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
        $hx = function($ev) {return Vector{1, $ev};};
        $hy = function($param) use ($Js_of_ocaml_Js,$caml_call3,$ev,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
          $hA = function($ev) {return Vector{2, $ev};};
          $hB = function($param) use ($Js_of_ocaml_Js,$caml_call3,$ev,$mouseScrollEvent,$popStateEvent) {
            $hD = function($ev) {return Vector{3, $ev};};
            $hE = function($param) use ($Js_of_ocaml_Js,$caml_call3,$ev,$popStateEvent) {
              $hG = function($ev) {return Vector{4, $ev};};
              $hH = function($param) use ($ev) {return Vector{5, $ev};};
              $hI = $popStateEvent($ev);
              return $caml_call3($Js_of_ocaml_Js[5][7], $hI, $hH, $hG);
            };
            $hF = $mouseScrollEvent($ev);
            return $caml_call3($Js_of_ocaml_Js[5][7], $hF, $hE, $hD);
          };
          $hC = $wheelEvent($ev);
          return $caml_call3($Js_of_ocaml_Js[5][7], $hC, $hB, $hA);
        };
        $hz = $keyboardEvent($ev);
        return $caml_call3($Js_of_ocaml_Js[5][7], $hz, $hy, $hx);
      };
      $hw = $mouseEvent($ev);
      return $caml_call3($Js_of_ocaml_Js[5][7], $hw, $hv, $hu);
    };
    $opt_taggedEvent = function($ev) use ($Js_of_ocaml_Js,$caml_call3,$taggedEvent) {
      $hs = function($ev) use ($taggedEvent) {
        return Vector{0, $taggedEvent($ev)};
      };
      $ht = function($param) {return 0;};
      return $caml_call3($Js_of_ocaml_Js[5][7], $ev, $ht, $hs);
    };
    $stopPropagation = function($ev) use ($Js_of_ocaml_Js,$caml_call1,$caml_call3,$caml_get_public_method) {
      $hl = function($param) use ($caml_call1,$caml_get_public_method,$ev) {
        $hr = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 189842539, 176), $x);
        };
        return (function($t115, $param) {return $t115->stopPropagation();})($ev, $hr);
      };
      $hm = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$ev) {
        $hp = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 320837798, 177), $x);
        };
        $hq = $Js_of_ocaml_Js[7];
        return (function($t114, $t113, $param) {
           $t114->cancelBubble = $t113;
           return 0;
         })($ev, $hq, $hp);
      };
      $hn = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 544309738, 178), $x);
      };
      $ho = (function($t112, $param) {return $t112->stopPropagation;})($ev, $hn);
      return $caml_call3($Js_of_ocaml_Js[6][7], $ho, $hm, $hl);
    };
    $requestAnimationFrame = $runtime["caml_js_pure_expr"](
      function($param) use ($Js_of_ocaml_Js,$List,$Not_found,$caml_call1,$caml_call2,$caml_get_public_method,$caml_wrap_exception,$runtime,$window) {
        $g4 = 0;
        $g5 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 497949938, 179), $x);
        };
        $g6 = Vector{
          0,
          (function($t125, $param) {return $t125->msRequestAnimationFrame;})($window, $g5),
          $g4
        };
        $g7 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -153781943, 180), $x);
        };
        $g8 = Vector{
          0,
          (function($t124, $param) {return $t124->oRequestAnimationFrame;})($window, $g7),
          $g6
        };
        $g9 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -151539242, 181), $x);
        };
        $g_ = Vector{
          0,
          (function($t123, $param) {
             return $t123->webkitRequestAnimationFrame;
           })($window, $g9),
          $g8
        };
        $ha = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -769448896, 182), $x);
        };
        $hb = Vector{
          0,
          (function($t122, $param) {return $t122->mozRequestAnimationFrame;})($window, $ha),
          $g_
        };
        $hc = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 240126520, 183), $x);
        };
        $l = Vector{
          0,
          (function($t121, $param) {return $t121->requestAnimationFrame;})($window, $hc),
          $hb
        };
        try {
          $hd = function($c) use ($Js_of_ocaml_Js,$caml_call1) {
            return $caml_call1($Js_of_ocaml_Js[6][5], $c);
          };
          $req = $caml_call2($List[33], $hd, $l);
          $he = function($callback) use ($req) {return $req($callback);};
          return $he;
        }
        catch(\Throwable $hf) {
          $hf = $caml_wrap_exception($hf);
          if ($hf === $Not_found) {
            $now = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
              $hh = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, 528448451, 184),
                  $x
                );
              };
              $hi = 0;
              $hj = $Js_of_ocaml_Js[22];
              $hk = (function($t119, $param) {return new $t119();})($hj, $hi);
              return (function($t120, $param) {return $t120->getTime();})($hk, $hh);
            };
            $last = Vector{0, $now(0)};
            return function($callback) use ($caml_call1,$caml_get_public_method,$last,$now,$window) {
              $t = $now(0);
              $dt = $last[1] + 16.6666666666666679 - $t;
              $dt__0 = $dt < 0 ? 0 : ($dt);
              $last[1] = $t;
              $hg = function($x) use ($caml_call1,$caml_get_public_method) {
                return $caml_call1(
                  $caml_get_public_method($x, 735461151, 185),
                  $x
                );
              };
              ((function($t118, $t116, $t117, $param) {
                  return $t118->setTimeout($t116, $t117);
                })($window, $callback, $dt__0, $hg));
              return 0;
            };
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($hf) as \Throwable;
        }
      }
    );
    $hasPushState = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$window) {
      $g0 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -936976937, 186), $x);
      };
      $g1 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -465095340, 187), $x);
      };
      $g2 = (function($t126, $param) {return $t126->history;})($window, $g1);
      $g3 = (function($t127, $param) {return $t127->pushState;})($g2, $g0);
      return $caml_call1($Js_of_ocaml_Js[6][5], $g3);
    };
    $hasPlaceholder = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$createInput,$document) {
      $i = $createInput(0, 0, $document);
      $gY = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 989033331, 188), $x);
      };
      $gZ = (function($t128, $param) {return $t128->placeholder;})($i, $gY);
      return $caml_call1($Js_of_ocaml_Js[6][5], $gZ);
    };
    $hasRequired = function($param) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$createInput,$document) {
      $i = $createInput(0, 0, $document);
      $gW = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 845320543, 189), $x);
      };
      $gX = (function($t129, $param) {return $t129->required;})($i, $gW);
      return $caml_call1($Js_of_ocaml_Js[6][5], $gX);
    };
    $overflow_limit = 2147483000;
    $setTimeout = function($callback, $d) use ($caml_call1,$caml_get_public_method,$overflow_limit,$runtime,$window) {
      $loop = new Ref();
      $id = Vector{0, 0};
      $loop->contents = function($step, $param) use ($callback,$caml_call1,$caml_get_public_method,$id,$loop,$overflow_limit,$runtime,$window) {
        if (2147483000 < $step) {
          $gS = $step - 2147483000;
          $step__0 = $overflow_limit;
          $remain = $gS;
        }
        else {$remain__0 = 0;$step__0 = $step;$remain = $remain__0;}
        $cb = $remain == 0
          ? $callback
          : (function($gV) use ($loop,$remain) {
           return $loop->contents($remain, $gV);
         });
        $gT = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 735461151, 190), $x);
        };
        $gU = $runtime["caml_js_wrap_callback"]($cb);
        $id[1] =
          Vector{
            0,
            (function($t132, $t130, $t131, $param) {
               return $t132->setTimeout($t130, $t131);
             })($window, $gU, $step__0, $gT)
          };
        return 0;
      };
      $loop->contents($d, 0);
      return $id;
    };
    $clearTimeout = function($id) use ($caml_call1,$caml_get_public_method,$window) {
      $gQ = $id[1];
      if ($gQ) {
        $x = $gQ[1];
        $id[1] = 0;
        $gR = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 880135316, 191), $x);
        };
        return (function($t134, $t133, $param) {
           return $t134->clearTimeout($t133);
         })($window, $x, $gR);
      }
      return 0;
    };
    $js_array_of_collection = function($c) {return  [].slice ->call($c);};
    $Js_of_ocaml_Dom_html = Vector{
      0,
      $d,
      $document,
      $getElementById_opt,
      $getElementById_exn,
      $getElementById_coerce,
      $getElementById,
      $location_origin,
      $window,
      $no_handler,
      $handler,
      $full_handler,
      $invoke_handler,
      $eventTarget,
      $eventRelatedTarget,
      $Event,
      $addEventListener,
      $removeEventListener,
      $addMousewheelEventListener,
      $buttonPressed,
      $eventAbsolutePosition__0,
      $elementClientPosition,
      $getDocumentScroll,
      Vector{0, $of_event, $try_key_code_normal},
      Vector{0, $of_event__0},
      $createHtml,
      $createHead,
      $createLink,
      $createTitle,
      $createMeta,
      $createBase,
      $createStyle,
      $createBody,
      $createForm,
      $createOptgroup,
      $createOption,
      $createSelect,
      $createInput,
      $createTextarea,
      $createButton,
      $createLabel,
      $createFieldset,
      $createLegend,
      $createUl,
      $createOl,
      $createDl,
      $createLi,
      $createDiv,
      $createEmbed,
      $createP,
      $createH1,
      $createH2,
      $createH3,
      $createH4,
      $createH5,
      $createH6,
      $createQ,
      $createBlockquote,
      $createPre,
      $createBr,
      $createHr,
      $createIns,
      $createDel,
      $createA,
      $createImg,
      $createObject,
      $createParam,
      $createMap,
      $createArea,
      $createScript,
      $createTable,
      $createCaption,
      $createCol,
      $createColgroup,
      $createThead,
      $createTfoot,
      $createTbody,
      $createTr,
      $createTh,
      $createTd,
      $createSub,
      $createSup,
      $createSpan,
      $createTt,
      $createI,
      $createB,
      $createBig,
      $createSmall,
      $createEm,
      $createStrong,
      $createCite,
      $createDfn,
      $createCode,
      $createSamp,
      $createKbd,
      $createVar,
      $createAbbr,
      $createDd,
      $createDt,
      $createNoscript,
      $createAddress,
      $createFrameset,
      $createFrame,
      $createIframe,
      $createAudio,
      $createVideo,
      $Canvas_not_available,
      $createCanvas,
      $element__0,
      $tagged,
      $opt_tagged,
      $taggedEvent,
      $opt_taggedEvent,
      $stopPropagation,
      Vector{
        0,
        $element,
        $a,
        $area,
        $audio,
        $base,
        $blockquote,
        $body,
        $br,
        $button,
        $canvas,
        $caption,
        $col,
        $colgroup,
        $del,
        $div,
        $embed,
        $dl,
        $fieldset,
        $form,
        $frameset,
        $frame,
        $h1,
        $h2,
        $h3,
        $h4,
        $h5,
        $h6,
        $head,
        $hr,
        $html,
        $iframe,
        $img,
        $input__0,
        $ins,
        $label,
        $legend,
        $li,
        $link,
        $map,
        $meta,
        $object,
        $ol,
        $optgroup,
        $option,
        $p,
        $param,
        $pre,
        $q,
        $script,
        $select__0,
        $style,
        $table,
        $tbody,
        $td,
        $textarea,
        $tfoot,
        $th,
        $thead,
        $title,
        $tr,
        $ul,
        $video,
        $mouseEvent,
        $keyboardEvent,
        $wheelEvent,
        $mouseScrollEvent,
        $popStateEvent
      },
      $setTimeout,
      $clearTimeout,
      $js_array_of_collection,
      $requestAnimationFrame,
      function($gP) use ($runtime) {
        return $runtime["caml_js_html_entities"]($gP);
      },
      $onIE,
      $hasPushState,
      $hasPlaceholder,
      $hasRequired
    };
    
    $runtime["caml_register_global"](
      542,
      $Js_of_ocaml_Dom_html,
      "Js_of_ocaml__Dom_html"
    );

  }
}