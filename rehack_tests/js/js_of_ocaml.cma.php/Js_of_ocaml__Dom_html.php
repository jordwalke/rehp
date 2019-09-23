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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_html_escape = $runtime["caml_js_html_escape"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $string = $runtime["caml_new_string"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_a__1 = $string("a");
    $cst_area__1 = $string("area");
    $cst_audio__1 = $string("audio");
    $cst_base__1 = $string("base");
    $cst_blockquote__1 = $string("blockquote");
    $cst_body__1 = $string("body");
    $cst_br__1 = $string("br");
    $cst_button__1 = $string("button");
    $cst_canvas__1 = $string("canvas");
    $cst_caption__1 = $string("caption");
    $cst_col__1 = $string("col");
    $cst_colgroup__1 = $string("colgroup");
    $cst_del__1 = $string("del");
    $cst_div__1 = $string("div");
    $cst_dl__1 = $string("dl");
    $cst_embed__1 = $string("embed");
    $cst_fieldset__1 = $string("fieldset");
    $cst_form__1 = $string("form");
    $cst_frame__1 = $string("frame");
    $cst_frameset__1 = $string("frameset");
    $cst_h1__1 = $string("h1");
    $cst_h2__1 = $string("h2");
    $cst_h3__1 = $string("h3");
    $cst_h4__1 = $string("h4");
    $cst_h5__1 = $string("h5");
    $cst_h6__1 = $string("h6");
    $cst_head__1 = $string("head");
    $cst_hr__1 = $string("hr");
    $cst_html__1 = $string("html");
    $cst_iframe__1 = $string("iframe");
    $cst_img__1 = $string("img");
    $cst_input__2 = $string("input");
    $cst_ins__1 = $string("ins");
    $cst_label__1 = $string("label");
    $cst_legend__1 = $string("legend");
    $cst_li__1 = $string("li");
    $cst_link__1 = $string("link");
    $cst_map__1 = $string("map");
    $cst_meta__1 = $string("meta");
    $cst_object__1 = $string("object");
    $cst_ol__1 = $string("ol");
    $cst_optgroup__1 = $string("optgroup");
    $cst_option__1 = $string("option");
    $cst_p__1 = $string("p");
    $cst_param__1 = $string("param");
    $cst_pre__1 = $string("pre");
    $cst_q__1 = $string("q");
    $cst_script__1 = $string("script");
    $cst_select__2 = $string("select");
    $cst_style__1 = $string("style");
    $cst_table__1 = $string("table");
    $cst_tbody__1 = $string("tbody");
    $cst_td__1 = $string("td");
    $cst_textarea__1 = $string("textarea");
    $cst_tfoot__1 = $string("tfoot");
    $cst_th__1 = $string("th");
    $cst_thead__1 = $string("thead");
    $cst_title__1 = $string("title");
    $cst_tr__1 = $string("tr");
    $cst_ul__1 = $string("ul");
    $cst_video__1 = $string("video");
    $cst_KeyH = $string("KeyH");
    $cst_Digit6 = $string("Digit6");
    $cst_BrowserRefresh = $string("BrowserRefresh");
    $cst_Backslash = $string("Backslash");
    $cst_AltLeft = $string("AltLeft");
    $cst_AltRight = $string("AltRight");
    $cst_ArrowDown = $string("ArrowDown");
    $cst_ArrowLeft = $string("ArrowLeft");
    $cst_ArrowRight = $string("ArrowRight");
    $cst_ArrowUp = $string("ArrowUp");
    $cst_Backquote = $string("Backquote");
    $cst_Backspace = $string("Backspace");
    $cst_BracketLeft = $string("BracketLeft");
    $cst_BracketRight = $string("BracketRight");
    $cst_BrowserBack = $string("BrowserBack");
    $cst_BrowserFavorites = $string("BrowserFavorites");
    $cst_BrowserForward = $string("BrowserForward");
    $cst_BrowserHome = $string("BrowserHome");
    $cst_Delete = $string("Delete");
    $cst_BrowserSearch = $string("BrowserSearch");
    $cst_BrowserStop = $string("BrowserStop");
    $cst_CapsLock = $string("CapsLock");
    $cst_Comma = $string("Comma");
    $cst_ContextMenu = $string("ContextMenu");
    $cst_ControlLeft = $string("ControlLeft");
    $cst_ControlRight = $string("ControlRight");
    $cst_Digit0 = $string("Digit0");
    $cst_Digit1 = $string("Digit1");
    $cst_Digit2 = $string("Digit2");
    $cst_Digit3 = $string("Digit3");
    $cst_Digit4 = $string("Digit4");
    $cst_Digit5 = $string("Digit5");
    $cst_F6 = $string("F6");
    $cst_F1 = $string("F1");
    $cst_Digit7 = $string("Digit7");
    $cst_Digit8 = $string("Digit8");
    $cst_Digit9 = $string("Digit9");
    $cst_End = $string("End");
    $cst_Enter = $string("Enter");
    $cst_Equal = $string("Equal");
    $cst_Escape = $string("Escape");
    $cst_F10 = $string("F10");
    $cst_F11 = $string("F11");
    $cst_F12 = $string("F12");
    $cst_F2 = $string("F2");
    $cst_F3 = $string("F3");
    $cst_F4 = $string("F4");
    $cst_F5 = $string("F5");
    $cst_KeyA = $string("KeyA");
    $cst_F7 = $string("F7");
    $cst_F8 = $string("F8");
    $cst_F9 = $string("F9");
    $cst_Home = $string("Home");
    $cst_Insert = $string("Insert");
    $cst_IntlBackslash = $string("IntlBackslash");
    $cst_IntlYen = $string("IntlYen");
    $cst_KeyB = $string("KeyB");
    $cst_KeyC = $string("KeyC");
    $cst_KeyD = $string("KeyD");
    $cst_KeyE = $string("KeyE");
    $cst_KeyF = $string("KeyF");
    $cst_KeyG = $string("KeyG");
    $cst_Numpad4 = $string("Numpad4");
    $cst_KeyX = $string("KeyX");
    $cst_KeyP = $string("KeyP");
    $cst_KeyI = $string("KeyI");
    $cst_KeyJ = $string("KeyJ");
    $cst_KeyK = $string("KeyK");
    $cst_KeyL = $string("KeyL");
    $cst_KeyM = $string("KeyM");
    $cst_KeyN = $string("KeyN");
    $cst_KeyO = $string("KeyO");
    $cst_KeyQ = $string("KeyQ");
    $cst_KeyR = $string("KeyR");
    $cst_KeyS = $string("KeyS");
    $cst_KeyT = $string("KeyT");
    $cst_KeyU = $string("KeyU");
    $cst_KeyV = $string("KeyV");
    $cst_KeyW = $string("KeyW");
    $cst_MetaRight = $string("MetaRight");
    $cst_KeyY = $string("KeyY");
    $cst_KeyZ = $string("KeyZ");
    $cst_MediaPlayPause = $string("MediaPlayPause");
    $cst_MediaStop = $string("MediaStop");
    $cst_MediaTrackNext = $string("MediaTrackNext");
    $cst_MediaTrackPrevious = $string("MediaTrackPrevious");
    $cst_MetaLeft = $string("MetaLeft");
    $cst_Minus = $string("Minus");
    $cst_NumLock = $string("NumLock");
    $cst_Numpad0 = $string("Numpad0");
    $cst_Numpad1 = $string("Numpad1");
    $cst_Numpad2 = $string("Numpad2");
    $cst_Numpad3 = $string("Numpad3");
    $cst_PageUp = $string("PageUp");
    $cst_NumpadDivide = $string("NumpadDivide");
    $cst_Numpad5 = $string("Numpad5");
    $cst_Numpad6 = $string("Numpad6");
    $cst_Numpad7 = $string("Numpad7");
    $cst_Numpad8 = $string("Numpad8");
    $cst_Numpad9 = $string("Numpad9");
    $cst_NumpadAdd = $string("NumpadAdd");
    $cst_NumpadDecimal = $string("NumpadDecimal");
    $cst_NumpadEnter = $string("NumpadEnter");
    $cst_NumpadEqual = $string("NumpadEqual");
    $cst_NumpadMultiply = $string("NumpadMultiply");
    $cst_NumpadSubtract = $string("NumpadSubtract");
    $cst_OSLeft = $string("OSLeft");
    $cst_OSRight = $string("OSRight");
    $cst_PageDown = $string("PageDown");
    $cst_ShiftRight = $string("ShiftRight");
    $cst_Pause = $string("Pause");
    $cst_Period = $string("Period");
    $cst_PrintScreen = $string("PrintScreen");
    $cst_Quote = $string("Quote");
    $cst_ScrollLock = $string("ScrollLock");
    $cst_Semicolon = $string("Semicolon");
    $cst_ShiftLeft = $string("ShiftLeft");
    $cst_Slash = $string("Slash");
    $cst_Space = $string("Space");
    $cst_Tab = $string("Tab");
    $cst_VolumeDown = $string("VolumeDown");
    $cst_VolumeMute = $string("VolumeMute");
    $cst_VolumeUp = $string("VolumeUp");
    $cst_mouseout__0 = $string("mouseout");
    $cst_mouseover__0 = $string("mouseover");
    $cst_video__0 = $string("video");
    $cst_audio__0 = $string("audio");
    $cst_ul__0 = $string("ul");
    $cst_tr__0 = $string("tr");
    $cst_title__0 = $string("title");
    $cst_thead__0 = $string("thead");
    $cst_th__0 = $string("th");
    $cst_tfoot__0 = $string("tfoot");
    $cst_textarea__0 = $string("textarea");
    $cst_td__0 = $string("td");
    $cst_tbody__0 = $string("tbody");
    $cst_table__0 = $string("table");
    $cst_style__0 = $string("style");
    $cst_select__1 = $string("select");
    $cst_script__0 = $string("script");
    $cst_q__0 = $string("q");
    $cst_pre__0 = $string("pre");
    $cst_param__0 = $string("param");
    $cst_p__0 = $string("p");
    $cst_option__0 = $string("option");
    $cst_optgroup__0 = $string("optgroup");
    $cst_ol__0 = $string("ol");
    $cst_object__0 = $string("object");
    $cst_meta__0 = $string("meta");
    $cst_map__0 = $string("map");
    $cst_link__0 = $string("link");
    $cst_li__0 = $string("li");
    $cst_legend__0 = $string("legend");
    $cst_label__0 = $string("label");
    $cst_ins__0 = $string("ins");
    $cst_input__1 = $string("input");
    $cst_img__0 = $string("img");
    $cst_iframe__0 = $string("iframe");
    $cst_html__0 = $string("html");
    $cst_hr__0 = $string("hr");
    $cst_head__0 = $string("head");
    $cst_h6__0 = $string("h6");
    $cst_h5__0 = $string("h5");
    $cst_h4__0 = $string("h4");
    $cst_h3__0 = $string("h3");
    $cst_h2__0 = $string("h2");
    $cst_h1__0 = $string("h1");
    $cst_frame__0 = $string("frame");
    $cst_frameset__0 = $string("frameset");
    $cst_form__0 = $string("form");
    $cst_embed__0 = $string("embed");
    $cst_fieldset__0 = $string("fieldset");
    $cst_dl__0 = $string("dl");
    $cst_div__0 = $string("div");
    $cst_del__0 = $string("del");
    $cst_colgroup__0 = $string("colgroup");
    $cst_col__0 = $string("col");
    $cst_caption__0 = $string("caption");
    $cst_canvas__0 = $string("canvas");
    $cst_button__0 = $string("button");
    $cst_br__0 = $string("br");
    $cst_body__0 = $string("body");
    $cst_blockquote__0 = $string("blockquote");
    $cst_base__0 = $string("base");
    $cst_area__0 = $string("area");
    $cst_a__0 = $string("a");
    $cst_canvas = $string("canvas");
    $cst_video = $string("video");
    $cst_audio = $string("audio");
    $cst_iframe = $string("iframe");
    $cst_frame = $string("frame");
    $cst_frameset = $string("frameset");
    $cst_address = $string("address");
    $cst_noscript = $string("noscript");
    $cst_dt = $string("dt");
    $cst_dd = $string("dd");
    $cst_abbr = $string("abbr");
    $cst_var = $string("var");
    $cst_kbd = $string("kbd");
    $cst_samp = $string("samp");
    $cst_code = $string("code");
    $cst_dfn = $string("dfn");
    $cst_cite = $string("cite");
    $cst_strong = $string("strong");
    $cst_em = $string("em");
    $cst_small = $string("small");
    $cst_big = $string("big");
    $cst_b = $string("b");
    $cst_i = $string("i");
    $cst_tt = $string("tt");
    $cst_span = $string("span");
    $cst_sup = $string("sup");
    $cst_sub = $string("sub");
    $cst_td = $string("td");
    $cst_th = $string("th");
    $cst_tr = $string("tr");
    $cst_tbody = $string("tbody");
    $cst_tfoot = $string("tfoot");
    $cst_thead = $string("thead");
    $cst_colgroup = $string("colgroup");
    $cst_col = $string("col");
    $cst_caption = $string("caption");
    $cst_table = $string("table");
    $cst_script = $string("script");
    $cst_area = $string("area");
    $cst_map = $string("map");
    $cst_param = $string("param");
    $cst_object = $string("object");
    $cst_img = $string("img");
    $cst_a = $string("a");
    $cst_del = $string("del");
    $cst_ins = $string("ins");
    $cst_hr = $string("hr");
    $cst_br = $string("br");
    $cst_pre = $string("pre");
    $cst_blockquote = $string("blockquote");
    $cst_q = $string("q");
    $cst_h6 = $string("h6");
    $cst_h5 = $string("h5");
    $cst_h4 = $string("h4");
    $cst_h3 = $string("h3");
    $cst_h2 = $string("h2");
    $cst_h1 = $string("h1");
    $cst_p = $string("p");
    $cst_embed = $string("embed");
    $cst_div = $string("div");
    $cst_li = $string("li");
    $cst_dl = $string("dl");
    $cst_ol = $string("ol");
    $cst_ul = $string("ul");
    $cst_legend = $string("legend");
    $cst_fieldset = $string("fieldset");
    $cst_label = $string("label");
    $cst_button = $string("button");
    $cst_textarea = $string("textarea");
    $cst_input__0 = $string("input");
    $cst_select__0 = $string("select");
    $cst_option = $string("option");
    $cst_optgroup = $string("optgroup");
    $cst_form = $string("form");
    $cst_body = $string("body");
    $cst_style = $string("style");
    $cst_base = $string("base");
    $cst_meta = $string("meta");
    $cst_title = $string("title");
    $cst_link = $string("link");
    $cst_head = $string("head");
    $cst_html = $string("html");
    $cst_click = $string("click");
    $cst_dblclick = $string("dblclick");
    $cst_mousedown = $string("mousedown");
    $cst_mouseup = $string("mouseup");
    $cst_mouseover = $string("mouseover");
    $cst_mousemove = $string("mousemove");
    $cst_mouseout = $string("mouseout");
    $cst_keypress = $string("keypress");
    $cst_keydown = $string("keydown");
    $cst_keyup = $string("keyup");
    $cst_mousewheel = $string("mousewheel");
    $cst_DOMMouseScroll = $string("DOMMouseScroll");
    $cst_touchstart = $string("touchstart");
    $cst_touchmove = $string("touchmove");
    $cst_touchend = $string("touchend");
    $cst_touchcancel = $string("touchcancel");
    $cst_dragstart = $string("dragstart");
    $cst_dragend = $string("dragend");
    $cst_dragenter = $string("dragenter");
    $cst_dragover = $string("dragover");
    $cst_dragleave = $string("dragleave");
    $cst_drag = $string("drag");
    $cst_drop = $string("drop");
    $cst_hashchange = $string("hashchange");
    $cst_change = $string("change");
    $cst_input = $string("input");
    $cst_timeupdate = $string("timeupdate");
    $cst_submit = $string("submit");
    $cst_scroll = $string("scroll");
    $cst_focus = $string("focus");
    $cst_blur = $string("blur");
    $cst_load = $string("load");
    $cst_unload = $string("unload");
    $cst_beforeunload = $string("beforeunload");
    $cst_resize = $string("resize");
    $cst_orientationchange = $string("orientationchange");
    $cst_popstate = $string("popstate");
    $cst_error = $string("error");
    $cst_abort = $string("abort");
    $cst_select = $string("select");
    $cst_online = $string("online");
    $cst_offline = $string("offline");
    $cst_checking = $string("checking");
    $cst_noupdate = $string("noupdate");
    $cst_downloading = $string("downloading");
    $cst_progress = $string("progress");
    $cst_updateready = $string("updateready");
    $cst_cached = $string("cached");
    $cst_obsolete = $string("obsolete");
    $cst_DOMContentLoaded = $string("DOMContentLoaded");
    $cst_animationstart = $string("animationstart");
    $cst_animationend = $string("animationend");
    $cst_animationiteration = $string("animationiteration");
    $cst_animationcancel = $string("animationcancel");
    $cst_canplay = $string("canplay");
    $cst_canplaythrough = $string("canplaythrough");
    $cst_durationchange = $string("durationchange");
    $cst_emptied = $string("emptied");
    $cst_ended = $string("ended");
    $cst_loadeddata = $string("loadeddata");
    $cst_loadedmetadata = $string("loadedmetadata");
    $cst_loadstart = $string("loadstart");
    $cst_pause = $string("pause");
    $cst_play = $string("play");
    $cst_playing = $string("playing");
    $cst_ratechange = $string("ratechange");
    $cst_seeked = $string("seeked");
    $cst_seeking = $string("seeking");
    $cst_stalled = $string("stalled");
    $cst_suspend = $string("suspend");
    $cst_volumechange = $string("volumechange");
    $cst_waiting = $string("waiting");
    $cst_Js_of_ocaml_Dom_html_Canvas_not_available = $string(
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
    $g = Vector{0, $string("lib/js_of_ocaml/dom_html.ml"), 2704, 58};
    $f = Vector{0, $string("lib/js_of_ocaml/dom_html.ml"), 2703, 61};
    $b = Vector{
      0,
      Vector{
        11,
        $string("getElementById_exn: "),
        Vector{3, 0, Vector{11, $string(" not found"), 0}}
      },
      $string("getElementById_exn: %S not found")
    };
    $onIE = (int) $runtime["caml_js_on_ie"](0);
    $no_handler = $Js_of_ocaml_Dom[9];
    $handler = $Js_of_ocaml_Dom[10];
    $full_handler = $Js_of_ocaml_Dom[11];
    $invoke_handler = $Js_of_ocaml_Dom[12];
    $click = $call1($Js_of_ocaml_Dom[14][1], $cst_click);
    $dblclick = $call1($Js_of_ocaml_Dom[14][1], $cst_dblclick);
    $mousedown = $call1($Js_of_ocaml_Dom[14][1], $cst_mousedown);
    $mouseup = $call1($Js_of_ocaml_Dom[14][1], $cst_mouseup);
    $mouseover = $call1($Js_of_ocaml_Dom[14][1], $cst_mouseover);
    $mousemove = $call1($Js_of_ocaml_Dom[14][1], $cst_mousemove);
    $mouseout = $call1($Js_of_ocaml_Dom[14][1], $cst_mouseout);
    $keypress = $call1($Js_of_ocaml_Dom[14][1], $cst_keypress);
    $keydown = $call1($Js_of_ocaml_Dom[14][1], $cst_keydown);
    $keyup = $call1($Js_of_ocaml_Dom[14][1], $cst_keyup);
    $mousewheel = $call1($Js_of_ocaml_Dom[14][1], $cst_mousewheel);
    $DOMMouseScroll = $call1($Js_of_ocaml_Dom[14][1], $cst_DOMMouseScroll);
    $touchstart = $call1($Js_of_ocaml_Dom[14][1], $cst_touchstart);
    $touchmove = $call1($Js_of_ocaml_Dom[14][1], $cst_touchmove);
    $touchend = $call1($Js_of_ocaml_Dom[14][1], $cst_touchend);
    $touchcancel = $call1($Js_of_ocaml_Dom[14][1], $cst_touchcancel);
    $dragstart = $call1($Js_of_ocaml_Dom[14][1], $cst_dragstart);
    $dragend = $call1($Js_of_ocaml_Dom[14][1], $cst_dragend);
    $dragenter = $call1($Js_of_ocaml_Dom[14][1], $cst_dragenter);
    $dragover = $call1($Js_of_ocaml_Dom[14][1], $cst_dragover);
    $dragleave = $call1($Js_of_ocaml_Dom[14][1], $cst_dragleave);
    $drag = $call1($Js_of_ocaml_Dom[14][1], $cst_drag);
    $drop = $call1($Js_of_ocaml_Dom[14][1], $cst_drop);
    $hashchange = $call1($Js_of_ocaml_Dom[14][1], $cst_hashchange);
    $change = $call1($Js_of_ocaml_Dom[14][1], $cst_change);
    $input = $call1($Js_of_ocaml_Dom[14][1], $cst_input);
    $timeupdate = $call1($Js_of_ocaml_Dom[14][1], $cst_timeupdate);
    $submit = $call1($Js_of_ocaml_Dom[14][1], $cst_submit);
    $scroll = $call1($Js_of_ocaml_Dom[14][1], $cst_scroll);
    $focus = $call1($Js_of_ocaml_Dom[14][1], $cst_focus);
    $blur = $call1($Js_of_ocaml_Dom[14][1], $cst_blur);
    $load = $call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $unload = $call1($Js_of_ocaml_Dom[14][1], $cst_unload);
    $beforeunload = $call1($Js_of_ocaml_Dom[14][1], $cst_beforeunload);
    $resize = $call1($Js_of_ocaml_Dom[14][1], $cst_resize);
    $orientationchange = $call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_orientationchange
    );
    $popstate = $call1($Js_of_ocaml_Dom[14][1], $cst_popstate);
    $error = $call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $abort = $call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $select = $call1($Js_of_ocaml_Dom[14][1], $cst_select);
    $online = $call1($Js_of_ocaml_Dom[14][1], $cst_online);
    $offline = $call1($Js_of_ocaml_Dom[14][1], $cst_offline);
    $checking = $call1($Js_of_ocaml_Dom[14][1], $cst_checking);
    $noupdate = $call1($Js_of_ocaml_Dom[14][1], $cst_noupdate);
    $downloading = $call1($Js_of_ocaml_Dom[14][1], $cst_downloading);
    $progress = $call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $updateready = $call1($Js_of_ocaml_Dom[14][1], $cst_updateready);
    $cached = $call1($Js_of_ocaml_Dom[14][1], $cst_cached);
    $obsolete = $call1($Js_of_ocaml_Dom[14][1], $cst_obsolete);
    $domContentLoaded = $call1($Js_of_ocaml_Dom[14][1], $cst_DOMContentLoaded);
    $animationstart = $call1($Js_of_ocaml_Dom[14][1], $cst_animationstart);
    $animationend = $call1($Js_of_ocaml_Dom[14][1], $cst_animationend);
    $animationiteration = $call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_animationiteration
    );
    $animationcancel = $call1($Js_of_ocaml_Dom[14][1], $cst_animationcancel);
    $canplay = $call1($Js_of_ocaml_Dom[14][1], $cst_canplay);
    $canplaythrough = $call1($Js_of_ocaml_Dom[14][1], $cst_canplaythrough);
    $durationchange = $call1($Js_of_ocaml_Dom[14][1], $cst_durationchange);
    $emptied = $call1($Js_of_ocaml_Dom[14][1], $cst_emptied);
    $ended = $call1($Js_of_ocaml_Dom[14][1], $cst_ended);
    $loadeddata = $call1($Js_of_ocaml_Dom[14][1], $cst_loadeddata);
    $loadedmetadata = $call1($Js_of_ocaml_Dom[14][1], $cst_loadedmetadata);
    $loadstart = $call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $pause = $call1($Js_of_ocaml_Dom[14][1], $cst_pause);
    $play = $call1($Js_of_ocaml_Dom[14][1], $cst_play);
    $playing = $call1($Js_of_ocaml_Dom[14][1], $cst_playing);
    $ratechange = $call1($Js_of_ocaml_Dom[14][1], $cst_ratechange);
    $seeked = $call1($Js_of_ocaml_Dom[14][1], $cst_seeked);
    $seeking = $call1($Js_of_ocaml_Dom[14][1], $cst_seeking);
    $stalled = $call1($Js_of_ocaml_Dom[14][1], $cst_stalled);
    $suspend = $call1($Js_of_ocaml_Dom[14][1], $cst_suspend);
    $volumechange = $call1($Js_of_ocaml_Dom[14][1], $cst_volumechange);
    $waiting = $call1($Js_of_ocaml_Dom[14][1], $cst_waiting);
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
    $location_origin = function(dynamic $loc) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method) {
      $dg = function(dynamic $o) {return $o;};
      $dh = function(dynamic $param) use ($call1,$caml_get_public_method,$loc) {
        $dk = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 6510168, 67), $x);
        };
        $protocol = (function(dynamic $t13, dynamic $param) {return $t13->protocol;
         })($loc, $dk);
        $dl = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -757983821, 68), $x);
        };
        $hostname = (function(dynamic $t12, dynamic $param) {return $t12->hostname;
         })($loc, $dl);
        $dm = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -899906687, 69), $x);
        };
        $port = (function(dynamic $t11, dynamic $param) {return $t11->port;})($loc, $dm);
        $dn = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 520590566, 70), $x);
        };
        if (
          0 ===
            (function(dynamic $t9, dynamic $param) {return $t9->length;})($protocol, $dn)
        ) {
          $dp = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 71), $x);
          };
          if (
            0 ===
              (function(dynamic $t10, dynamic $param) {return $t10->length;})($hostname, $dp)
          ) {return "";}
        }
        $dq = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -491534073, 72), $x);
        };
        $dr = "//";
        $origin = (function
         (dynamic $t8, dynamic $t6, dynamic $t7, dynamic $param) {return $t8->concat($t6, $t7);
         })($protocol, $dr, $hostname, $dq);
        $ds = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 520590566, 73), $x);
        };
        if (
          0 <
            (function(dynamic $t5, dynamic $param) {return $t5->length;})($port, $ds)
        ) {
          $dt = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -491534073, 74), $x);
          };
          $du = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -899906687, 75), $x);
          };
          $dv = (function(dynamic $t1, dynamic $param) {return $t1->port;})($loc, $du);
          $dw = ":";
          return (function
           (dynamic $t4, dynamic $t2, dynamic $t3, dynamic $param) {return $t4->concat($t2, $t3);
           })($origin, $dw, $dv, $dt);
        }
        return $origin;
      };
      $di = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -889120282, 76), $x);
      };
      $dj = (function(dynamic $t0, dynamic $param) {return $t0->origin;})($loc, $di);
      return $call3($Js_of_ocaml_Js[6][7], $dj, $dh, $dg);
    };
    $window = $Js_of_ocaml_Js[50][1];
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 454225691, 77), $x);
    };
    $document = (function(dynamic $t14, dynamic $param) {return $t14->document;
     })($window, $a);
    $getElementById = function(dynamic $id) use ($Js_of_ocaml_Js,$Not_found,$call1,$call3,$caml_get_public_method,$document,$runtime) {
      $db = function(dynamic $pnode) {return $pnode;};
      $dc = function(dynamic $param) use ($Not_found,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $dd = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -332188296, 78), $x);
      };
      $de = $id->toString();
      $df = (function(dynamic $t16, dynamic $t15, dynamic $param) {return $t16->getElementById($t15);
       })($document, $de, $dd);
      return $call3($Js_of_ocaml_Js[5][7], $df, $dc, $db);
    };
    $getElementById_exn = function(dynamic $id) use ($Js_of_ocaml_Js,$Pervasives,$Printf,$b,$call1,$call2,$call3,$caml_get_public_method,$document) {
      $c6 = function(dynamic $pnode) {return $pnode;};
      $c7 = function(dynamic $param) use ($Pervasives,$Printf,$b,$call1,$call2,$id) {
        $da = $call2($Printf[4], $b, $id);
        return $call1($Pervasives[2], $da);
      };
      $c8 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -332188296, 79), $x);
      };
      $c9 = $id->toString();
      $c_ = (function(dynamic $t18, dynamic $t17, dynamic $param) {return $t18->getElementById($t17);
       })($document, $c9, $c8);
      return $call3($Js_of_ocaml_Js[5][7], $c_, $c7, $c6);
    };
    $getElementById_opt = function(dynamic $id) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$document) {
      $c3 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -332188296, 80), $x);
      };
      $c4 = $id->toString();
      $c5 = (function(dynamic $t20, dynamic $t19, dynamic $param) {return $t20->getElementById($t19);
       })($document, $c4, $c3);
      return $call1($Js_of_ocaml_Js[5][10], $c5);
    };
    $getElementById_coerce = function(dynamic $id, dynamic $coerce) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method,$document) {
      $cX = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$coerce) {
        $c2 = $call1($coerce, $e);
        return $call1($Js_of_ocaml_Js[5][10], $c2);
      };
      $cY = function(dynamic $param) {return 0;};
      $cZ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -332188296, 81), $x);
      };
      $c0 = $id->toString();
      $c1 = (function(dynamic $t22, dynamic $t21, dynamic $param) {return $t22->getElementById($t21);
       })($document, $c0, $cZ);
      return $call3($Js_of_ocaml_Js[5][7], $c1, $cY, $cX);
    };
    $opt_iter = function(dynamic $x, dynamic $f) use ($call1) {
      if ($x) {$v = $x[1];return $call1($f, $v);}
      return 0;
    };
    $createElement = function(dynamic $doc, dynamic $name) use ($call1,$caml_get_public_method) {
      $cV = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -292059360, 82), $x);
      };
      $cW = $name->toString();
      return (function(dynamic $t24, dynamic $t23, dynamic $param) {return $t24->createElement($t23);
       })($doc, $cW, $cV);
    };
    $unsafeCreateElement = function(dynamic $doc, dynamic $name) use ($createElement) {
      return $createElement($doc, $name);
    };
    $createElementSyntax = Vector{0, 785140586};
    $unsafeCreateElementEx = function
    (dynamic $type, dynamic $name, dynamic $doc, dynamic $elt) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$caml_js_html_escape,$createElement,$createElementSyntax,$document,$opt_iter) {
      for (;;) {
        if (0 === $type) {
          if (0 === $name) {return $createElement($doc, $elt);}
        }
        $cm = $createElementSyntax[1];
        if (785140586 === $cm) {
          try {
            $cp = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -292059360, 83), $x);
            };
            $cq = "<input name=\"x\">";
            $el = (function(dynamic $t51, dynamic $t50, dynamic $param) {return $t51->createElement($t50);
             })($document, $cq, $cp);
            $cr = "input";
            $cs = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 946097238, 84), $x);
            };
            $ct = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 578170309, 85), $x);
            };
            $cu = (function(dynamic $t47, dynamic $param) {return $t47->tagName;
             })($el, $ct);
            $cv = (function(dynamic $t48, dynamic $param) {return $t48->toLowerCase();
              })($cu, $cs) === $cr
              ? 1
              : (0);
            if ($cv) {
              $cw = "x";
              $cx = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -922783157, 86), $x);
              };
              $cy = (function(dynamic $t49, dynamic $param) {return $t49->name;
                })($el, $cx) === $cw
                ? 1
                : (0);
            }
            else {$cy = $cv;}
            $cn = $cy;
          }
          catch(\Throwable $cU) {$cn = 0;}
          $co = $cn ? 982028505 : (-1003883683);
          $createElementSyntax[1] = $co;
          continue;
        }
        if (982028505 <= $cm) {
          $cz = 0;
          $cA = $Js_of_ocaml_Js[14];
          $a = (function(dynamic $t46, dynamic $param) {return new $t46();})($cA, $cz);
          $cB = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -231927987, 87), $x);
          };
          $cC = $elt->toString();
          $cD = "<";
          ((function(dynamic $t45, dynamic $t43, dynamic $t44, dynamic $param) {return $t45->push($t43, $t44);
            })($a, $cD, $cC, $cB));
          $opt_iter(
            $type,
            function(dynamic $t) use ($a,$call1,$caml_get_public_method,$caml_js_html_escape) {
              $cQ = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -231927986, 88), $x);
              };
              $cR = "\"";
              $cS = $caml_js_html_escape($t);
              $cT = " type=\"";
              ((function
                (dynamic $t42, dynamic $t39, dynamic $t40, dynamic $t41, dynamic $param) {
                  return $t42->push($t39, $t40, $t41);
                })($a, $cT, $cS, $cR, $cQ));
              return 0;
            }
          );
          $opt_iter(
            $name,
            function(dynamic $n) use ($a,$call1,$caml_get_public_method,$caml_js_html_escape) {
              $cM = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -231927986, 89), $x);
              };
              $cN = "\"";
              $cO = $caml_js_html_escape($n);
              $cP = " name=\"";
              ((function
                (dynamic $t38, dynamic $t35, dynamic $t36, dynamic $t37, dynamic $param) {
                  return $t38->push($t35, $t36, $t37);
                })($a, $cP, $cO, $cN, $cM));
              return 0;
            }
          );
          $cE = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -899608102, 90), $x);
          };
          $cF = ">";
          ((function(dynamic $t34, dynamic $t33, dynamic $param) {return $t34->push($t33);
            })($a, $cF, $cE));
          $cG = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -292059360, 91), $x);
          };
          $cH = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -966446102, 92), $x);
          };
          $cI = "";
          $cJ = (function(dynamic $t30, dynamic $t29, dynamic $param) {return $t30->join($t29);
           })($a, $cI, $cH);
          return (function(dynamic $t32, dynamic $t31, dynamic $param) {return $t32->createElement($t31);
           })($doc, $cJ, $cG);
        }
        $res = $createElement($doc, $elt);
        $opt_iter(
          $type,
          function(dynamic $t) use ($call1,$caml_get_public_method,$res) {
            $cL = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, 1707673, 93), $x);
            };
            return (function(dynamic $t28, dynamic $t27, dynamic $param) {$t28->type = $t27;return 0;
             })($res, $t, $cL);
          }
        );
        $opt_iter(
          $name,
          function(dynamic $n) use ($call1,$caml_get_public_method,$res) {
            $cK = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -922783157, 94), $x);
            };
            return (function(dynamic $t26, dynamic $t25, dynamic $param) {$t26->name = $t25;return 0;
             })($res, $n, $cK);
          }
        );
        return $res;
      }
    };
    $createHtml = function(dynamic $doc) use ($cst_html,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_html);
    };
    $createHead = function(dynamic $doc) use ($cst_head,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_head);
    };
    $createLink = function(dynamic $doc) use ($cst_link,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_link);
    };
    $createTitle = function(dynamic $doc) use ($cst_title,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_title);
    };
    $createMeta = function(dynamic $doc) use ($cst_meta,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_meta);
    };
    $createBase = function(dynamic $doc) use ($cst_base,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_base);
    };
    $createStyle = function(dynamic $doc) use ($cst_style,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_style);
    };
    $createBody = function(dynamic $doc) use ($cst_body,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_body);
    };
    $createForm = function(dynamic $doc) use ($cst_form,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_form);
    };
    $createOptgroup = function(dynamic $doc) use ($cst_optgroup,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_optgroup);
    };
    $createOption = function(dynamic $doc) use ($cst_option,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_option);
    };
    $createSelect = function(dynamic $type, dynamic $name, dynamic $doc) use ($cst_select__0,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_select__0);
    };
    $createInput = function(dynamic $type, dynamic $name, dynamic $doc) use ($cst_input__0,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_input__0);
    };
    $createTextarea = function(dynamic $type, dynamic $name, dynamic $doc) use ($cst_textarea,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_textarea);
    };
    $createButton = function(dynamic $type, dynamic $name, dynamic $doc) use ($cst_button,$unsafeCreateElementEx) {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_button);
    };
    $createLabel = function(dynamic $doc) use ($cst_label,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_label);
    };
    $createFieldset = function(dynamic $doc) use ($cst_fieldset,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_fieldset);
    };
    $createLegend = function(dynamic $doc) use ($cst_legend,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_legend);
    };
    $createUl = function(dynamic $doc) use ($cst_ul,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ul);
    };
    $createOl = function(dynamic $doc) use ($cst_ol,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ol);
    };
    $createDl = function(dynamic $doc) use ($cst_dl,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_dl);
    };
    $createLi = function(dynamic $doc) use ($cst_li,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_li);
    };
    $createDiv = function(dynamic $doc) use ($cst_div,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_div);
    };
    $createEmbed = function(dynamic $doc) use ($cst_embed,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_embed);
    };
    $createP = function(dynamic $doc) use ($cst_p,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_p);
    };
    $createH1 = function(dynamic $doc) use ($cst_h1,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h1);
    };
    $createH2 = function(dynamic $doc) use ($cst_h2,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h2);
    };
    $createH3 = function(dynamic $doc) use ($cst_h3,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h3);
    };
    $createH4 = function(dynamic $doc) use ($cst_h4,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h4);
    };
    $createH5 = function(dynamic $doc) use ($cst_h5,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h5);
    };
    $createH6 = function(dynamic $doc) use ($cst_h6,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_h6);
    };
    $createQ = function(dynamic $doc) use ($cst_q,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_q);
    };
    $createBlockquote = function(dynamic $doc) use ($cst_blockquote,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_blockquote);
    };
    $createPre = function(dynamic $doc) use ($cst_pre,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_pre);
    };
    $createBr = function(dynamic $doc) use ($cst_br,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_br);
    };
    $createHr = function(dynamic $doc) use ($cst_hr,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_hr);
    };
    $createIns = function(dynamic $doc) use ($cst_ins,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ins);
    };
    $createDel = function(dynamic $doc) use ($cst_del,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_del);
    };
    $createA = function(dynamic $doc) use ($cst_a,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_a);
    };
    $createImg = function(dynamic $doc) use ($cst_img,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_img);
    };
    $createObject = function(dynamic $doc) use ($cst_object,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_object);
    };
    $createParam = function(dynamic $doc) use ($cst_param,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_param);
    };
    $createMap = function(dynamic $doc) use ($cst_map,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_map);
    };
    $createArea = function(dynamic $doc) use ($cst_area,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_area);
    };
    $createScript = function(dynamic $doc) use ($cst_script,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_script);
    };
    $createTable = function(dynamic $doc) use ($cst_table,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_table);
    };
    $createCaption = function(dynamic $doc) use ($cst_caption,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_caption);
    };
    $createCol = function(dynamic $doc) use ($cst_col,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_col);
    };
    $createColgroup = function(dynamic $doc) use ($cst_colgroup,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_colgroup);
    };
    $createThead = function(dynamic $doc) use ($cst_thead,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_thead);
    };
    $createTfoot = function(dynamic $doc) use ($cst_tfoot,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tfoot);
    };
    $createTbody = function(dynamic $doc) use ($cst_tbody,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tbody);
    };
    $createTr = function(dynamic $doc) use ($cst_tr,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tr);
    };
    $createTh = function(dynamic $doc) use ($cst_th,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_th);
    };
    $createTd = function(dynamic $doc) use ($cst_td,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_td);
    };
    $createSub = function(dynamic $doc) use ($createElement,$cst_sub) {
      return $createElement($doc, $cst_sub);
    };
    $createSup = function(dynamic $doc) use ($createElement,$cst_sup) {
      return $createElement($doc, $cst_sup);
    };
    $createSpan = function(dynamic $doc) use ($createElement,$cst_span) {
      return $createElement($doc, $cst_span);
    };
    $createTt = function(dynamic $doc) use ($createElement,$cst_tt) {
      return $createElement($doc, $cst_tt);
    };
    $createI = function(dynamic $doc) use ($createElement,$cst_i) {
      return $createElement($doc, $cst_i);
    };
    $createB = function(dynamic $doc) use ($createElement,$cst_b) {
      return $createElement($doc, $cst_b);
    };
    $createBig = function(dynamic $doc) use ($createElement,$cst_big) {
      return $createElement($doc, $cst_big);
    };
    $createSmall = function(dynamic $doc) use ($createElement,$cst_small) {
      return $createElement($doc, $cst_small);
    };
    $createEm = function(dynamic $doc) use ($createElement,$cst_em) {
      return $createElement($doc, $cst_em);
    };
    $createStrong = function(dynamic $doc) use ($createElement,$cst_strong) {
      return $createElement($doc, $cst_strong);
    };
    $createCite = function(dynamic $doc) use ($createElement,$cst_cite) {
      return $createElement($doc, $cst_cite);
    };
    $createDfn = function(dynamic $doc) use ($createElement,$cst_dfn) {
      return $createElement($doc, $cst_dfn);
    };
    $createCode = function(dynamic $doc) use ($createElement,$cst_code) {
      return $createElement($doc, $cst_code);
    };
    $createSamp = function(dynamic $doc) use ($createElement,$cst_samp) {
      return $createElement($doc, $cst_samp);
    };
    $createKbd = function(dynamic $doc) use ($createElement,$cst_kbd) {
      return $createElement($doc, $cst_kbd);
    };
    $createVar = function(dynamic $doc) use ($createElement,$cst_var) {
      return $createElement($doc, $cst_var);
    };
    $createAbbr = function(dynamic $doc) use ($createElement,$cst_abbr) {
      return $createElement($doc, $cst_abbr);
    };
    $createDd = function(dynamic $doc) use ($createElement,$cst_dd) {
      return $createElement($doc, $cst_dd);
    };
    $createDt = function(dynamic $doc) use ($createElement,$cst_dt) {
      return $createElement($doc, $cst_dt);
    };
    $createNoscript = function(dynamic $doc) use ($createElement,$cst_noscript) {
      return $createElement($doc, $cst_noscript);
    };
    $createAddress = function(dynamic $doc) use ($createElement,$cst_address) {
      return $createElement($doc, $cst_address);
    };
    $createFrameset = function(dynamic $doc) use ($cst_frameset,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_frameset);
    };
    $createFrame = function(dynamic $doc) use ($cst_frame,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_frame);
    };
    $createIframe = function(dynamic $doc) use ($cst_iframe,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_iframe);
    };
    $createAudio = function(dynamic $doc) use ($cst_audio,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_audio);
    };
    $createVideo = function(dynamic $doc) use ($cst_video,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_video);
    };
    $Canvas_not_available = Vector{
      248,
      $cst_Js_of_ocaml_Dom_html_Canvas_not_available,
      $runtime["caml_fresh_oo_id"](0)
    };
    $createCanvas = function(dynamic $doc) use ($Canvas_not_available,$Js_of_ocaml_Js,$call1,$caml_get_public_method,$cst_canvas,$runtime,$unsafeCreateElement) {
      $c = $unsafeCreateElement($doc, $cst_canvas);
      $ck = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -388424711, 95), $x);
      };
      $cl = (function(dynamic $t52, dynamic $param) {return $t52->getContext;})($c, $ck);
      if (1 - $call1($Js_of_ocaml_Js[5][5], $cl)) {
        throw $runtime["caml_wrap_thrown_exception"]($Canvas_not_available) as \Throwable;
      }
      return $c;
    };
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -29132142, 96), $x);
    };
    $d = $Js_of_ocaml_Js[50][1];
    $html_element = (function(dynamic $t53, dynamic $param) {return $t53->HTMLElement;
     })($d, $c);
    $e = $Js_of_ocaml_Js[3];
    $element = $call1($Js_of_ocaml_Js[4], $html_element) === $e
      ? function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
       $ch = $Js_of_ocaml_Js[3];
       $ci = function(dynamic $x) use ($call1,$caml_get_public_method) {
         return $call1($caml_get_public_method($x, 746263041, 97), $x);
       };
       $cj = (function(dynamic $t54, dynamic $param) {return $t54->innerHTML;})($e, $ci);
       return $call1($Js_of_ocaml_Js[4], $cj) === $ch
         ? $Js_of_ocaml_Js[1]
         : ($call1($Js_of_ocaml_Js[2], $e));
     }
      : (function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$html_element) {
       return instance_of($e, $html_element)
         ? $call1($Js_of_ocaml_Js[2], $e)
         : ($Js_of_ocaml_Js[1]);
     });
    $unsafeCoerce = function(dynamic $tag, dynamic $e) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $cd = $tag->toString();
      $ce = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946097238, 98), $x);
      };
      $cf = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 578170309, 99), $x);
      };
      $cg = (function(dynamic $t55, dynamic $param) {return $t55->tagName;})($e, $cf);
      return (function(dynamic $t56, dynamic $param) {return $t56->toLowerCase();
        })($cg, $ce) === $cd
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $a__0 = function(dynamic $e) use ($cst_a__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_a__0, $e);
    };
    $area = function(dynamic $e) use ($cst_area__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_area__0, $e);
    };
    $base = function(dynamic $e) use ($cst_base__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_base__0, $e);
    };
    $blockquote = function(dynamic $e) use ($cst_blockquote__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_blockquote__0, $e);
    };
    $body = function(dynamic $e) use ($cst_body__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_body__0, $e);
    };
    $br = function(dynamic $e) use ($cst_br__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_br__0, $e);
    };
    $button = function(dynamic $e) use ($cst_button__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_button__0, $e);
    };
    $canvas = function(dynamic $e) use ($cst_canvas__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_canvas__0, $e);
    };
    $caption = function(dynamic $e) use ($cst_caption__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_caption__0, $e);
    };
    $col = function(dynamic $e) use ($cst_col__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_col__0, $e);
    };
    $colgroup = function(dynamic $e) use ($cst_colgroup__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_colgroup__0, $e);
    };
    $del = function(dynamic $e) use ($cst_del__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_del__0, $e);
    };
    $div = function(dynamic $e) use ($cst_div__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_div__0, $e);
    };
    $dl = function(dynamic $e) use ($cst_dl__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_dl__0, $e);
    };
    $fieldset = function(dynamic $e) use ($cst_fieldset__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_fieldset__0, $e);
    };
    $embed = function(dynamic $e) use ($cst_embed__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_embed__0, $e);
    };
    $form = function(dynamic $e) use ($cst_form__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_form__0, $e);
    };
    $frameset = function(dynamic $e) use ($cst_frameset__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_frameset__0, $e);
    };
    $frame = function(dynamic $e) use ($cst_frame__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_frame__0, $e);
    };
    $h1 = function(dynamic $e) use ($cst_h1__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h1__0, $e);
    };
    $h2 = function(dynamic $e) use ($cst_h2__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h2__0, $e);
    };
    $h3 = function(dynamic $e) use ($cst_h3__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h3__0, $e);
    };
    $h4 = function(dynamic $e) use ($cst_h4__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h4__0, $e);
    };
    $h5 = function(dynamic $e) use ($cst_h5__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h5__0, $e);
    };
    $h6 = function(dynamic $e) use ($cst_h6__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_h6__0, $e);
    };
    $head = function(dynamic $e) use ($cst_head__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_head__0, $e);
    };
    $hr = function(dynamic $e) use ($cst_hr__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_hr__0, $e);
    };
    $html = function(dynamic $e) use ($cst_html__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_html__0, $e);
    };
    $iframe = function(dynamic $e) use ($cst_iframe__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_iframe__0, $e);
    };
    $img = function(dynamic $e) use ($cst_img__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_img__0, $e);
    };
    $input__0 = function(dynamic $e) use ($cst_input__1,$unsafeCoerce) {
      return $unsafeCoerce($cst_input__1, $e);
    };
    $ins = function(dynamic $e) use ($cst_ins__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ins__0, $e);
    };
    $label = function(dynamic $e) use ($cst_label__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_label__0, $e);
    };
    $legend = function(dynamic $e) use ($cst_legend__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_legend__0, $e);
    };
    $li = function(dynamic $e) use ($cst_li__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_li__0, $e);
    };
    $link = function(dynamic $e) use ($cst_link__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_link__0, $e);
    };
    $map = function(dynamic $e) use ($cst_map__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_map__0, $e);
    };
    $meta = function(dynamic $e) use ($cst_meta__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_meta__0, $e);
    };
    $object = function(dynamic $e) use ($cst_object__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_object__0, $e);
    };
    $ol = function(dynamic $e) use ($cst_ol__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ol__0, $e);
    };
    $optgroup = function(dynamic $e) use ($cst_optgroup__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_optgroup__0, $e);
    };
    $option = function(dynamic $e) use ($cst_option__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_option__0, $e);
    };
    $p = function(dynamic $e) use ($cst_p__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_p__0, $e);
    };
    $param = function(dynamic $e) use ($cst_param__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_param__0, $e);
    };
    $pre = function(dynamic $e) use ($cst_pre__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_pre__0, $e);
    };
    $q = function(dynamic $e) use ($cst_q__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_q__0, $e);
    };
    $script = function(dynamic $e) use ($cst_script__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_script__0, $e);
    };
    $select__0 = function(dynamic $e) use ($cst_select__1,$unsafeCoerce) {
      return $unsafeCoerce($cst_select__1, $e);
    };
    $style = function(dynamic $e) use ($cst_style__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_style__0, $e);
    };
    $table = function(dynamic $e) use ($cst_table__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_table__0, $e);
    };
    $tbody = function(dynamic $e) use ($cst_tbody__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tbody__0, $e);
    };
    $td = function(dynamic $e) use ($cst_td__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_td__0, $e);
    };
    $textarea = function(dynamic $e) use ($cst_textarea__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_textarea__0, $e);
    };
    $tfoot = function(dynamic $e) use ($cst_tfoot__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tfoot__0, $e);
    };
    $th = function(dynamic $e) use ($cst_th__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_th__0, $e);
    };
    $thead = function(dynamic $e) use ($cst_thead__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_thead__0, $e);
    };
    $title = function(dynamic $e) use ($cst_title__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_title__0, $e);
    };
    $tr = function(dynamic $e) use ($cst_tr__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_tr__0, $e);
    };
    $ul = function(dynamic $e) use ($cst_ul__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_ul__0, $e);
    };
    $audio = function(dynamic $e) use ($cst_audio__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_audio__0, $e);
    };
    $video = function(dynamic $e) use ($cst_video__0,$unsafeCoerce) {
      return $unsafeCoerce($cst_video__0, $e);
    };
    $unsafeCoerceEvent = function(dynamic $constr, dynamic $ev) use ($Js_of_ocaml_Js,$call1) {
      $cc = $Js_of_ocaml_Js[3];
      if ($call1($Js_of_ocaml_Js[4], $constr) !== $cc) {
        if (instance_of($ev, $constr)) {
          return $call1($Js_of_ocaml_Js[2], $ev);
        }
      }
      return $Js_of_ocaml_Js[1];
    };
    $mouseEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $ca = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -590574348, 100), $x);
      };
      $cb = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function(dynamic $t57, dynamic $param) {return $t57->MouseEvent;})($cb, $ca),
        $ev
      );
    };
    $keyboardEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $b9 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -807764460, 101), $x);
      };
      $b_ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function(dynamic $t58, dynamic $param) {return $t58->KeyboardEvent;})($b_, $b9),
        $ev
      );
    };
    $wheelEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $b7 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 239551166, 102), $x);
      };
      $b8 = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function(dynamic $t59, dynamic $param) {return $t59->WheelEvent;})($b8, $b7),
        $ev
      );
    };
    $mouseScrollEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $b5 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -31722201, 103), $x);
      };
      $b6 = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function(dynamic $t60, dynamic $param) {return $t60->MouseScrollEvent;
         })($b6, $b5),
        $ev
      );
    };
    $popStateEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$unsafeCoerceEvent) {
      $b3 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -903494309, 104), $x);
      };
      $b4 = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        (function(dynamic $t61, dynamic $param) {return $t61->PopStateEvent;})($b4, $b3),
        $ev
      );
    };
    $eventTarget = $Js_of_ocaml_Dom[13];
    $eventRelatedTarget = function(dynamic $e) use ($Assert_failure,$Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_mouseout__0,$cst_mouseover__0,$f,$g,$runtime) {
      $bT = function(dynamic $param) use ($Assert_failure,$Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$caml_string_notequal,$cst_mouseout__0,$cst_mouseover__0,$e,$f,$g,$runtime) {
        $bW = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 1707673, 105), $x);
        };
        $match = $caml_js_to_string(
          (function(dynamic $t65, dynamic $param) {return $t65->type;})($e, $bW)
        );
        if ($caml_string_notequal($match, $cst_mouseout__0)) {
          if ($caml_string_notequal($match, $cst_mouseover__0)) {return $Js_of_ocaml_Js[1];}
          $bX = function(dynamic $param) use ($Assert_failure,$f,$runtime) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $f}) as \Throwable;
          };
          $bY = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 513086066, 106), $x);
          };
          $bZ = (function(dynamic $t63, dynamic $param) {return $t63->fromElement;
           })($e, $bY);
          return $call2($Js_of_ocaml_Js[6][8], $bZ, $bX);
        }
        $b0 = function(dynamic $param) use ($Assert_failure,$g,$runtime) {
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $g}) as \Throwable;
        };
        $b1 = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 904455809, 107), $x);
        };
        $b2 = (function(dynamic $t64, dynamic $param) {return $t64->toElement;
         })($e, $b1);
        return $call2($Js_of_ocaml_Js[6][8], $b2, $b0);
      };
      $bU = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -629591140, 108), $x);
      };
      $bV = (function(dynamic $t62, dynamic $param) {return $t62->relatedTarget;
       })($e, $bU);
      return $call2($Js_of_ocaml_Js[6][8], $bV, $bT);
    };
    $eventAbsolutePosition = function(dynamic $e) use ($call1,$caml_get_public_method,$document) {
      $bG = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1055163742, 109), $x);
      };
      $body = (function(dynamic $t73, dynamic $param) {return $t73->body;})($document, $bG);
      $bH = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1068552417, 110), $x);
      };
      $html = (function(dynamic $t72, dynamic $param) {return $t72->documentElement;
       })($document, $bH);
      $bI = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1040845960, 111), $x);
      };
      $bJ = (function(dynamic $t71, dynamic $param) {return $t71->scrollTop;})($html, $bI);
      $bK = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1040845960, 112), $x);
      };
      $bL = (function(dynamic $t70, dynamic $param) {return $t70->scrollTop;})($body, $bK);
      $bM = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -75417682, 113), $x);
      };
      $bN = (int)
      ((int)
       ((function(dynamic $t69, dynamic $param) {return $t69->clientY;})($e, $bM) + $bL) +
         $bJ);
      $bO = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 91199156, 114), $x);
      };
      $bP = (function(dynamic $t68, dynamic $param) {return $t68->scrollLeft;})($html, $bO);
      $bQ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 91199156, 115), $x);
      };
      $bR = (function(dynamic $t67, dynamic $param) {return $t67->scrollLeft;})($body, $bQ);
      $bS = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -75417683, 116), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         ((function(dynamic $t66, dynamic $param) {return $t66->clientX;})($e, $bS) + $bR) +
           $bP),
        $bN
      };
    };
    $eventAbsolutePosition__0 = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method,$eventAbsolutePosition) {
      $by = function(dynamic $x) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method,$e,$eventAbsolutePosition) {
        $bC = function(dynamic $y) use ($x) {return Vector{0, $x, $y};};
        $bD = function(dynamic $param) use ($e,$eventAbsolutePosition) {
          return $eventAbsolutePosition($e);
        };
        $bE = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 1028467498, 117), $x);
        };
        $bF = (function(dynamic $t75, dynamic $param) {return $t75->pageY;})($e, $bE);
        return $call3($Js_of_ocaml_Js[6][7], $bF, $bD, $bC);
      };
      $bz = function(dynamic $param) use ($e,$eventAbsolutePosition) {
        return $eventAbsolutePosition($e);
      };
      $bA = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1028467497, 118), $x);
      };
      $bB = (function(dynamic $t74, dynamic $param) {return $t74->pageX;})($e, $bA);
      return $call3($Js_of_ocaml_Js[6][7], $bB, $bz, $by);
    };
    $elementClientPosition = function(dynamic $e) use ($call1,$caml_get_public_method,$document) {
      $bk = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 718768073, 119), $x);
      };
      $r = (function(dynamic $t84, dynamic $param) {
         return $t84->getBoundingClientRect();
       })($e, $bk);
      $bl = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1055163742, 120), $x);
      };
      $body = (function(dynamic $t83, dynamic $param) {return $t83->body;})($document, $bl);
      $bm = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1068552417, 121), $x);
      };
      $html = (function(dynamic $t82, dynamic $param) {return $t82->documentElement;
       })($document, $bm);
      $bn = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -939682550, 122), $x);
      };
      $bo = (function(dynamic $t81, dynamic $param) {return $t81->clientTop;})($html, $bn);
      $bp = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -939682550, 123), $x);
      };
      $bq = (function(dynamic $t80, dynamic $param) {return $t80->clientTop;})($body, $bp);
      $br = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 5793429, 124), $x);
      };
      $bs = (int)
      ((int)
       ((int)
        (function(dynamic $t79, dynamic $param) {return $t79->top;})($r, $br) - $bq) -
         $bo);
      $bt = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 814972914, 125), $x);
      };
      $bu = (function(dynamic $t78, dynamic $param) {return $t78->clientLeft;})($html, $bt);
      $bv = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 814972914, 126), $x);
      };
      $bw = (function(dynamic $t77, dynamic $param) {return $t77->clientLeft;})($body, $bv);
      $bx = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -944764921, 127), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         ((int)
          (function(dynamic $t76, dynamic $param) {return $t76->left;})($r, $bx) - $bw) -
           $bu),
        $bs
      };
    };
    $getDocumentScroll = function(dynamic $param) use ($call1,$caml_get_public_method,$document) {
      $bb = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1055163742, 128), $x);
      };
      $body = (function(dynamic $t90, dynamic $param) {return $t90->body;})($document, $bb);
      $bc = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1068552417, 129), $x);
      };
      $html = (function(dynamic $t89, dynamic $param) {return $t89->documentElement;
       })($document, $bc);
      $bd = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1040845960, 130), $x);
      };
      $be = (function(dynamic $t88, dynamic $param) {return $t88->scrollTop;})($html, $bd);
      $bf = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 1040845960, 131), $x);
      };
      $bg = (int)
      ((function(dynamic $t87, dynamic $param) {return $t87->scrollTop;})($body, $bf) + $be);
      $bh = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 91199156, 132), $x);
      };
      $bi = (function(dynamic $t86, dynamic $param) {return $t86->scrollLeft;})($html, $bh);
      $bj = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 91199156, 133), $x);
      };
      return Vector{
        0,
        (int)
        ((function(dynamic $t85, dynamic $param) {return $t85->scrollLeft;})($body, $bj) + $bi),
        $bg
      };
    };
    $buttonPressed = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method,$unsigned_right_shift_32) {
      $a7 = function(dynamic $x) {return $x;};
      $a8 = function(dynamic $param) use ($call1,$caml_get_public_method,$ev,$unsigned_right_shift_32) {
        $ba = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -639606286, 134), $x);
        };
        $match = (function(dynamic $t92, dynamic $param) {return $t92->button;
         })($ev, $ba);
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
      $a9 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -910345251, 135), $x);
      };
      $a_ = (function(dynamic $t91, dynamic $param) {return $t91->which;})($ev, $a9);
      return $call3($Js_of_ocaml_Js[6][7], $a_, $a8, $a7);
    };
    $hasMousewheelEvents = function(dynamic $param) use ($call1,$caml_get_public_method,$createDiv,$document) {
      $d = $createDiv($document);
      $a4 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 524300314, 136), $x);
      };
      $a5 = "return;";
      $a6 = "onmousewheel";
      ((function(dynamic $t95, dynamic $t93, dynamic $t94, dynamic $param) {return $t95->setAttribute($t93, $t94);
        })($d, $a6, $a5, $a4));
      return typeof($d->onmousewheel) === "function" ? 1 : (0);
    };
    $addMousewheelEventListener = function
    (dynamic $e, dynamic $h, dynamic $capt) use ($Event,$Js_of_ocaml_Js,$addEventListener,$call1,$call2,$call3,$call4,$caml_get_public_method,$handler,$hasMousewheelEvents) {
      if ($hasMousewheelEvents(0)) {
        $aR = $call1(
          $handler,
          function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$call2,$call3,$caml_get_public_method,$h) {
            $aX = function(dynamic $param) {return 0;};
            $aY = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -95379365, 137), $x);
            };
            $aZ = (function(dynamic $t101, dynamic $param) {return $t101->wheelDeltaX;
             })($e, $aY);
            $dx = (int)
            ((int) - $call2($Js_of_ocaml_Js[6][8], $aZ, $aX) / 40);
            $a0 = function(dynamic $param) use ($call1,$caml_get_public_method,$e) {
              $a3 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 644780381, 138), $x);
              };
              return (function(dynamic $t100, dynamic $param) {return $t100->wheelDelta;
               })($e, $a3);
            };
            $a1 = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -95379364, 139), $x);
            };
            $a2 = (function(dynamic $t99, dynamic $param) {return $t99->wheelDeltaY;
             })($e, $a1);
            $dy = (int)
            ((int) - $call2($Js_of_ocaml_Js[6][8], $a2, $a0) / 40);
            return $call3($h, $e, $dx, $dy);
          }
        );
        return $call4($addEventListener, $e, $Event[11], $aR, $capt);
      }
      $aS = $call1(
        $handler,
        function(dynamic $e) use ($call1,$call3,$caml_get_public_method,$h) {
          $aT = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -266378607, 140), $x);
          };
          $d = (function(dynamic $t98, dynamic $param) {return $t98->detail;})($e, $aT);
          $aU = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -66775139, 141), $x);
          };
          $aV = (function(dynamic $t97, dynamic $param) {return $t97->HORIZONTAL;
           })($e, $aU);
          $aW = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -1065804639, 142), $x);
          };
          return (function(dynamic $t96, dynamic $param) {return $t96->axis;})($e, $aW) === $aV
            ? $call3($h, $e, $d, 0)
            : ($call3($h, $e, 0, $d));
        }
      );
      return $call4($addEventListener, $e, $Event[12], $aS, $capt);
    };
    $try_code = function(dynamic $v) use ($caml_js_to_string,$caml_string_compare,$caml_string_notequal,$cst_AltLeft,$cst_AltRight,$cst_ArrowDown,$cst_ArrowLeft,$cst_ArrowRight,$cst_ArrowUp,$cst_Backquote,$cst_Backslash,$cst_Backspace,$cst_BracketLeft,$cst_BracketRight,$cst_BrowserBack,$cst_BrowserFavorites,$cst_BrowserForward,$cst_BrowserHome,$cst_BrowserRefresh,$cst_BrowserSearch,$cst_BrowserStop,$cst_CapsLock,$cst_Comma,$cst_ContextMenu,$cst_ControlLeft,$cst_ControlRight,$cst_Delete,$cst_Digit0,$cst_Digit1,$cst_Digit2,$cst_Digit3,$cst_Digit4,$cst_Digit5,$cst_Digit6,$cst_Digit7,$cst_Digit8,$cst_Digit9,$cst_End,$cst_Enter,$cst_Equal,$cst_Escape,$cst_F1,$cst_F10,$cst_F11,$cst_F12,$cst_F2,$cst_F3,$cst_F4,$cst_F5,$cst_F6,$cst_F7,$cst_F8,$cst_F9,$cst_Home,$cst_Insert,$cst_IntlBackslash,$cst_IntlYen,$cst_KeyA,$cst_KeyB,$cst_KeyC,$cst_KeyD,$cst_KeyE,$cst_KeyF,$cst_KeyG,$cst_KeyH,$cst_KeyI,$cst_KeyJ,$cst_KeyK,$cst_KeyL,$cst_KeyM,$cst_KeyN,$cst_KeyO,$cst_KeyP,$cst_KeyQ,$cst_KeyR,$cst_KeyS,$cst_KeyT,$cst_KeyU,$cst_KeyV,$cst_KeyW,$cst_KeyX,$cst_KeyY,$cst_KeyZ,$cst_MediaPlayPause,$cst_MediaStop,$cst_MediaTrackNext,$cst_MediaTrackPrevious,$cst_MetaLeft,$cst_MetaRight,$cst_Minus,$cst_NumLock,$cst_Numpad0,$cst_Numpad1,$cst_Numpad2,$cst_Numpad3,$cst_Numpad4,$cst_Numpad5,$cst_Numpad6,$cst_Numpad7,$cst_Numpad8,$cst_Numpad9,$cst_NumpadAdd,$cst_NumpadDecimal,$cst_NumpadDivide,$cst_NumpadEnter,$cst_NumpadEqual,$cst_NumpadMultiply,$cst_NumpadSubtract,$cst_OSLeft,$cst_OSRight,$cst_PageDown,$cst_PageUp,$cst_Pause,$cst_Period,$cst_PrintScreen,$cst_Quote,$cst_ScrollLock,$cst_Semicolon,$cst_ShiftLeft,$cst_ShiftRight,$cst_Slash,$cst_Space,$cst_Tab,$cst_VolumeDown,$cst_VolumeMute,$cst_VolumeUp) {
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
    $try_key_code_left = function(dynamic $param) {
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
    $try_key_code_right = function(dynamic $param) {
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
    $try_key_code_numpad = function(dynamic $param) use ($unsigned_right_shift_32) {
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
    $try_key_code_normal = function(dynamic $param) use ($unsigned_right_shift_32) {
      $switcher = (int) ($param + -8);
      if (! (214 < $unsigned_right_shift_32($switcher, 0))) {
        $aQ = $switcher;
        if (67 <= $aQ) {
          switch($aQ) {
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
          switch($aQ) {
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
    $make_unidentified = function(dynamic $param) {return 0;};
    $try_next = function(dynamic $value, dynamic $f, dynamic $v) use ($Js_of_ocaml_Js,$call3,$make_unidentified) {
      return 0 === $v
        ? $call3($Js_of_ocaml_Js[6][7], $value, $make_unidentified, $f)
        : ($v);
    };
    $run_next = function(dynamic $value, dynamic $f, dynamic $v) use ($call1) {
      return 0 === $v ? $call1($f, $value) : ($v);
    };
    $get_key_code = function(dynamic $evt) use ($call1,$caml_get_public_method) {
      $aP = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 463348332, 143), $x);
      };
      return (function(dynamic $t102, dynamic $param) {return $t102->keyCode;})($evt, $aP);
    };
    $try_key_location = function(dynamic $evt) use ($call1,$caml_get_public_method,$get_key_code,$make_unidentified,$run_next,$try_key_code_left,$try_key_code_numpad,$try_key_code_right,$unsigned_right_shift_32) {
      $aI = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -448369099, 144), $x);
      };
      $match = (function(dynamic $t103, dynamic $param) {return $t103->location;
       })($evt, $aI);
      $switcher = (int) ($match + -1);
      if (2 < $unsigned_right_shift_32($switcher, 0)) {return $make_unidentified;}
      switch($switcher) {
        // FALLTHROUGH
        case 0:
          $aJ = $get_key_code($evt);
          return function(dynamic $aN) use ($aJ,$run_next,$try_key_code_left) {
            return $run_next($aJ, $try_key_code_left, $aN);
          };
        // FALLTHROUGH
        case 1:
          $aK = $get_key_code($evt);
          return function(dynamic $aM) use ($aK,$run_next,$try_key_code_right) {
            return $run_next($aK, $try_key_code_right, $aM);
          };
        // FALLTHROUGH
        default:
          $aL = $get_key_code($evt);
          return function(dynamic $aO) use ($aL,$run_next,$try_key_code_numpad) {
            return $run_next($aL, $try_key_code_numpad, $aO);
          };
        }
    };
    $symbol = function(dynamic $x, dynamic $f) use ($call1) {
      return $call1($f, $x);
    };
    $of_event = function(dynamic $evt) use ($call1,$caml_get_public_method,$get_key_code,$run_next,$symbol,$try_code,$try_key_code_normal,$try_key_location,$try_next) {
      $aB = $get_key_code($evt);
      $aC = function(dynamic $aH) use ($aB,$run_next,$try_key_code_normal) {
        return $run_next($aB, $try_key_code_normal, $aH);
      };
      $aD = $try_key_location($evt);
      $aE = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1044074195, 145), $x);
      };
      $aF = (function(dynamic $t104, dynamic $param) {return $t104->code;})($evt, $aE);
      return $symbol(
        $symbol(
          $symbol(
            0,
            function(dynamic $aG) use ($aF,$try_code,$try_next) {
              return $try_next($aF, $try_code, $aG);
            }
          ),
          $aD
        ),
        $aC
      );
    };
    $char_of_int = function(dynamic $value) use ($Uchar,$call1) {
      if (0 < $value) {
        try {$az = Vector{0, $call1($Uchar[8], $value)};return $az;}
        catch(\Throwable $aA) {return 0;}
      }
      return 0;
    };
    $empty_string = function(dynamic $param) {return "";};
    $none = function(dynamic $param) {return 0;};
    $of_event__0 = function(dynamic $evt) use ($Js_of_ocaml_Js,$call1,$call2,$call3,$caml_get_public_method,$char_of_int,$empty_string,$none) {
      $as = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 5343647, 146), $x);
      };
      $at = (function(dynamic $t109, dynamic $param) {return $t109->key;})($evt, $as);
      $key = $call2($Js_of_ocaml_Js[6][8], $at, $empty_string);
      $au = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 147), $x);
      };
      $match = (function(dynamic $t108, dynamic $param) {return $t108->length;
       })($key, $au);
      if (0 === $match) {
        $av = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 472145699, 148), $x);
        };
        $aw = (function(dynamic $t105, dynamic $param) {return $t105->charCode;
         })($evt, $av);
        return $call3($Js_of_ocaml_Js[6][7], $aw, $none, $char_of_int);
      }
      if (1 === $match) {
        $ax = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 894756598, 149), $x);
        };
        $ay = 0;
        return $char_of_int(
          (int)
          (function(dynamic $t107, dynamic $t106, dynamic $param) {return $t107->charCodeAt($t106);
           })($key, $ay, $ax)
        );
      }
      return 0;
    };
    $element__0 = function(dynamic $ar) {return $ar;};
    $other = function(dynamic $e) {return Vector{61, $e};};
    $tagged = function(dynamic $e) use ($call1,$caml_get_public_method,$caml_string_notequal,$cst_a__1,$cst_area__1,$cst_audio__1,$cst_base__1,$cst_blockquote__1,$cst_body__1,$cst_br__1,$cst_button__1,$cst_canvas__1,$cst_caption__1,$cst_col__1,$cst_colgroup__1,$cst_del__1,$cst_div__1,$cst_dl__1,$cst_embed__1,$cst_fieldset__1,$cst_form__1,$cst_frame__1,$cst_frameset__1,$cst_h1__1,$cst_h2__1,$cst_h3__1,$cst_h4__1,$cst_h5__1,$cst_h6__1,$cst_head__1,$cst_hr__1,$cst_html__1,$cst_iframe__1,$cst_img__1,$cst_input__2,$cst_ins__1,$cst_label__1,$cst_legend__1,$cst_li__1,$cst_link__1,$cst_map__1,$cst_meta__1,$cst_object__1,$cst_ol__1,$cst_optgroup__1,$cst_option__1,$cst_p__1,$cst_param__1,$cst_pre__1,$cst_q__1,$cst_script__1,$cst_select__2,$cst_style__1,$cst_table__1,$cst_tbody__1,$cst_td__1,$cst_textarea__1,$cst_tfoot__1,$cst_th__1,$cst_thead__1,$cst_title__1,$cst_tr__1,$cst_ul__1,$cst_video__1,$other,$runtime,$unsigned_right_shift_32) {
      $ao = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946097238, 150), $x);
      };
      $ap = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 578170309, 151), $x);
      };
      $aq = (function(dynamic $t110, dynamic $param) {return $t110->tagName;})($e, $ap);
      $tag = $runtime["caml_js_to_byte_string"](
        (function(dynamic $t111, dynamic $param) {return $t111->toLowerCase();
         })($aq, $ao)
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
    $opt_tagged = function(dynamic $e) use ($Js_of_ocaml_Js,$call3,$tagged) {
      $am = function(dynamic $e) use ($tagged) {
        return Vector{0, $tagged($e)};
      };
      $an = function(dynamic $param) {return 0;};
      return $call3($Js_of_ocaml_Js[5][7], $e, $an, $am);
    };
    $taggedEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call3,$keyboardEvent,$mouseEvent,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
      $X = function(dynamic $ev) {return Vector{0, $ev};};
      $Y = function(dynamic $param) use ($Js_of_ocaml_Js,$call3,$ev,$keyboardEvent,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
        $aa = function(dynamic $ev) {return Vector{1, $ev};};
        $ab = function(dynamic $param) use ($Js_of_ocaml_Js,$call3,$ev,$mouseScrollEvent,$popStateEvent,$wheelEvent) {
          $ad = function(dynamic $ev) {return Vector{2, $ev};};
          $ae = function(dynamic $param) use ($Js_of_ocaml_Js,$call3,$ev,$mouseScrollEvent,$popStateEvent) {
            $ag = function(dynamic $ev) {return Vector{3, $ev};};
            $ah = function(dynamic $param) use ($Js_of_ocaml_Js,$call3,$ev,$popStateEvent) {
              $aj = function(dynamic $ev) {return Vector{4, $ev};};
              $ak = function(dynamic $param) use ($ev) {
                return Vector{5, $ev};
              };
              $al = $popStateEvent($ev);
              return $call3($Js_of_ocaml_Js[5][7], $al, $ak, $aj);
            };
            $ai = $mouseScrollEvent($ev);
            return $call3($Js_of_ocaml_Js[5][7], $ai, $ah, $ag);
          };
          $af = $wheelEvent($ev);
          return $call3($Js_of_ocaml_Js[5][7], $af, $ae, $ad);
        };
        $ac = $keyboardEvent($ev);
        return $call3($Js_of_ocaml_Js[5][7], $ac, $ab, $aa);
      };
      $Z = $mouseEvent($ev);
      return $call3($Js_of_ocaml_Js[5][7], $Z, $Y, $X);
    };
    $opt_taggedEvent = function(dynamic $ev) use ($Js_of_ocaml_Js,$call3,$taggedEvent) {
      $V = function(dynamic $ev) use ($taggedEvent) {
        return Vector{0, $taggedEvent($ev)};
      };
      $W = function(dynamic $param) {return 0;};
      return $call3($Js_of_ocaml_Js[5][7], $ev, $W, $V);
    };
    $stopPropagation = function(dynamic $ev) use ($Js_of_ocaml_Js,$call1,$call3,$caml_get_public_method) {
      $O = function(dynamic $param) use ($call1,$caml_get_public_method,$ev) {
        $U = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 189842539, 152), $x);
        };
        return (function(dynamic $t115, dynamic $param) {return $t115->stopPropagation();
         })($ev, $U);
      };
      $P = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$ev) {
        $S = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 320837798, 153), $x);
        };
        $T = $Js_of_ocaml_Js[7];
        return (function(dynamic $t114, dynamic $t113, dynamic $param) {$t114->cancelBubble = $t113;return 0;
         })($ev, $T, $S);
      };
      $Q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 544309738, 154), $x);
      };
      $R = (function(dynamic $t112, dynamic $param) {return $t112->stopPropagation;
       })($ev, $Q);
      return $call3($Js_of_ocaml_Js[6][7], $R, $P, $O);
    };
    $requestAnimationFrame = $runtime["caml_js_pure_expr"](
      function(dynamic $param) use ($Js_of_ocaml_Js,$List,$Not_found,$call1,$call2,$caml_get_public_method,$caml_wrap_exception,$runtime,$window) {
        $w = 0;
        $x = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 497949938, 155), $x);
        };
        $y = Vector{
          0,
          (function(dynamic $t125, dynamic $param) {
             return $t125->msRequestAnimationFrame;
           })($window, $x),
          $w
        };
        $z = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -153781943, 156), $x);
        };
        $A = Vector{
          0,
          (function(dynamic $t124, dynamic $param) {return $t124->oRequestAnimationFrame;
           })($window, $z),
          $y
        };
        $B = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -151539242, 157), $x);
        };
        $C = Vector{
          0,
          (function(dynamic $t123, dynamic $param) {
             return $t123->webkitRequestAnimationFrame;
           })($window, $B),
          $A
        };
        $D = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -769448896, 158), $x);
        };
        $E = Vector{
          0,
          (function(dynamic $t122, dynamic $param) {
             return $t122->mozRequestAnimationFrame;
           })($window, $D),
          $C
        };
        $F = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 240126520, 159), $x);
        };
        $l = Vector{
          0,
          (function(dynamic $t121, dynamic $param) {return $t121->requestAnimationFrame;
           })($window, $F),
          $E
        };
        try {
          $G = function(dynamic $c) use ($Js_of_ocaml_Js,$call1) {
            return $call1($Js_of_ocaml_Js[6][5], $c);
          };
          $req = $call2($List[33], $G, $l);
          $H = function(dynamic $callback) use ($req) {
            return $req($callback);
          };
          return $H;
        }
        catch(\Throwable $I) {
          $I = $caml_wrap_exception($I);
          if ($I === $Not_found) {
            $now = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
              $K = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 528448451, 160), $x);
              };
              $L = 0;
              $M = $Js_of_ocaml_Js[22];
              $N = (function(dynamic $t119, dynamic $param) {return new $t119();
               })($M, $L);
              return (function(dynamic $t120, dynamic $param) {return $t120->getTime();
               })($N, $K);
            };
            $last = Vector{0, $now(0)};
            return function(dynamic $callback) use ($call1,$caml_get_public_method,$last,$now,$window) {
              $t = $now(0);
              $dt = $last[1] + 16.6666666666666679 - $t;
              $dt__0 = $dt < 0 ? 0 : ($dt);
              $last[1] = $t;
              $J = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, 735461151, 161), $x);
              };
              ((function
                (dynamic $t118, dynamic $t116, dynamic $t117, dynamic $param) {return $t118->setTimeout($t116, $t117);
                })($window, $callback, $dt__0, $J));
              return 0;
            };
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($I) as \Throwable;
        }
      }
    );
    $hasPushState = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$window) {
      $s = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -936976937, 162), $x);
      };
      $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -465095340, 163), $x);
      };
      $u = (function(dynamic $t126, dynamic $param) {return $t126->history;})($window, $t);
      $v = (function(dynamic $t127, dynamic $param) {return $t127->pushState;})($u, $s);
      return $call1($Js_of_ocaml_Js[6][5], $v);
    };
    $hasPlaceholder = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$createInput,$document) {
      $i = $createInput(0, 0, $document);
      $q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 989033331, 164), $x);
      };
      $r = (function(dynamic $t128, dynamic $param) {return $t128->placeholder;
       })($i, $q);
      return $call1($Js_of_ocaml_Js[6][5], $r);
    };
    $hasRequired = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$createInput,$document) {
      $i = $createInput(0, 0, $document);
      $o = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 845320543, 165), $x);
      };
      $p = (function(dynamic $t129, dynamic $param) {return $t129->required;})($i, $o);
      return $call1($Js_of_ocaml_Js[6][5], $p);
    };
    $overflow_limit = 2147483000;
    $setTimeout = function(dynamic $callback, dynamic $d) use ($call1,$caml_get_public_method,$overflow_limit,$runtime,$window) {
      $loop = new Ref();
      $id = Vector{0, 0};
      $loop->contents = function(dynamic $step, dynamic $param) use ($call1,$callback,$caml_get_public_method,$id,$loop,$overflow_limit,$runtime,$window) {
        if (2147483000 < $step) {
          $k = $step - 2147483000;
          $step__0 = $overflow_limit;
          $remain = $k;
        }
        else {$remain__0 = 0;$step__0 = $step;$remain = $remain__0;}
        $cb = $remain == 0
          ? $callback
          : (function(dynamic $n) use ($loop,$remain) {
           return $loop->contents($remain, $n);
         });
        $l = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 735461151, 166), $x);
        };
        $m = $runtime["caml_js_wrap_callback"]($cb);
        $id[1] =
          Vector{
            0,
            (function
             (dynamic $t132, dynamic $t130, dynamic $t131, dynamic $param) {return $t132->setTimeout($t130, $t131);
             })($window, $m, $step__0, $l)
          };
        return 0;
      };
      $loop->contents($d, 0);
      return $id;
    };
    $clearTimeout = function(dynamic $id) use ($call1,$caml_get_public_method,$window) {
      $i = $id[1];
      if ($i) {
        $x = $i[1];
        $id[1] = 0;
        $j = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 880135316, 167), $x);
        };
        return (function(dynamic $t134, dynamic $t133, dynamic $param) {return $t134->clearTimeout($t133);
         })($window, $x, $j);
      }
      return 0;
    };
    $js_array_of_collection = function(dynamic $c) {
      return  [].slice ->call($c);
    };
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
        $a__0,
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
      function(dynamic $h) use ($runtime) {
        return $runtime["caml_js_html_entities"]($h);
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