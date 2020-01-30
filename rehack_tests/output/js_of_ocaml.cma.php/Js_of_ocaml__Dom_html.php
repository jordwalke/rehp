<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom_html {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call6 = $runtime["caml_call6"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_html_escape = $runtime["caml_js_html_escape"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $string = $runtime["caml_new_string"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
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
    $cst_gotpointercapture = $string("gotpointercapture");
    $cst_loadeddata = $string("loadeddata");
    $cst_loadedmetadata = $string("loadedmetadata");
    $cst_loadstart = $string("loadstart");
    $cst_lostpointercapture = $string("lostpointercapture");
    $cst_pause = $string("pause");
    $cst_play = $string("play");
    $cst_playing = $string("playing");
    $cst_pointerenter = $string("pointerenter");
    $cst_pointercancel = $string("pointercancel");
    $cst_pointerdown = $string("pointerdown");
    $cst_pointerleave = $string("pointerleave");
    $cst_pointermove = $string("pointermove");
    $cst_pointerout = $string("pointerout");
    $cst_pointerover = $string("pointerover");
    $cst_pointerup = $string("pointerup");
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
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $List = List_::get();
    $Not_found = Not_found::get();
    $Js_of_ocaml_Import = Js_of_ocaml__Import::get();
    $Uchar = Uchar::get();
    $Assert_failure = Assert_failure::get();
    $Printf = Printf::get();
    $Pervasives = Pervasives::get();
    $Js_of_ocaml_Dom = Js_of_ocaml__Dom::get();
    $g_ = Vector{0, $string("lib/js_of_ocaml/dom_html.ml"), 2792, 58} as dynamic;
    $f_ = Vector{0, $string("lib/js_of_ocaml/dom_html.ml"), 2791, 61} as dynamic;
    $b_ = Vector{
      0,
      Vector{
        11,
        $string("getElementById_exn: "),
        Vector{3, 0, Vector{11, $string(" not found"), 0}}
      },
      $string("getElementById_exn: %S not found")
    } as dynamic;
    $onIE = (int) $runtime["caml_js_on_ie"](0) as dynamic;
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
    $gotpointercapture = $call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_gotpointercapture
    );
    $loadeddata = $call1($Js_of_ocaml_Dom[14][1], $cst_loadeddata);
    $loadedmetadata = $call1($Js_of_ocaml_Dom[14][1], $cst_loadedmetadata);
    $loadstart = $call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $lostpointercapture = $call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_lostpointercapture
    );
    $pause = $call1($Js_of_ocaml_Dom[14][1], $cst_pause);
    $play = $call1($Js_of_ocaml_Dom[14][1], $cst_play);
    $playing = $call1($Js_of_ocaml_Dom[14][1], $cst_playing);
    $pointerenter = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerenter);
    $pointercancel = $call1($Js_of_ocaml_Dom[14][1], $cst_pointercancel);
    $pointerdown = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerdown);
    $pointerleave = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerleave);
    $pointermove = $call1($Js_of_ocaml_Dom[14][1], $cst_pointermove);
    $pointerout = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerout);
    $pointerover = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerover);
    $pointerup = $call1($Js_of_ocaml_Dom[14][1], $cst_pointerup);
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
      $gotpointercapture,
      $loadeddata,
      $loadedmetadata,
      $loadstart,
      $lostpointercapture,
      $pause,
      $play,
      $playing,
      $pointerenter,
      $pointercancel,
      $pointerdown,
      $pointerleave,
      $pointermove,
      $pointerout,
      $pointerover,
      $pointerup,
      $ratechange,
      $seeked,
      $seeking,
      $stalled,
      $suspend,
      $volumechange,
      $waiting,
      $make
    } as dynamic;
    $addEventListener = $Js_of_ocaml_Dom[16];
    $addEventListenerWithOptions = $Js_of_ocaml_Dom[15];
    $removeEventListener = $Js_of_ocaml_Dom[17];
    $createCustomEvent = $Js_of_ocaml_Dom[19];
    $d = "2d";
    $location_origin = (dynamic $loc) : dynamic ==> {
      $de_ = (dynamic $o) : dynamic ==> {return $o;};
      $df_ = (dynamic $param) : dynamic ==> {
        $di_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 6510168, 74), $x);
        };
        $protocol = ((dynamic $t13, dynamic $param) : dynamic ==> {
           return $t13->protocol;
         })($loc, $di_);
        $dj_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -757983821, 75), $x);
        };
        $hostname = ((dynamic $t12, dynamic $param) : dynamic ==> {
           return $t12->hostname;
         })($loc, $dj_);
        $dk_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -899906687, 76), $x);
        };
        $port = ((dynamic $t11, dynamic $param) : dynamic ==> {
           return $t11->port;
         })($loc, $dk_);
        $dl_ = 0 as dynamic;
        $dm_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 520590566, 77), $x);
        };
        $dn_ = ((dynamic $t9, dynamic $param) : dynamic ==> {
           return $t9->length;
         })($protocol, $dm_);
        if ($call2($Js_of_ocaml_Import[8], $dn_, $dl_)) {
          $do_ = 0 as dynamic;
          $dp_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, 520590566, 78), $x);
          };
          $dq_ = ((dynamic $t10, dynamic $param) : dynamic ==> {
             return $t10->length;
           })($hostname, $dp_);
          if ($call2($Js_of_ocaml_Import[8], $dq_, $do_)) {return "";}
        }
        $dr_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -491534073, 79), $x);
        };
        $ds_ = "//";
        $origin = ((dynamic $t8, dynamic $t6, dynamic $t7, dynamic $param) : dynamic ==> {return $t8->concat($t6, $t7);
         })($protocol, $ds_, $hostname, $dr_);
        $dt_ = 0 as dynamic;
        $du_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 520590566, 80), $x);
        };
        $dv_ = ((dynamic $t5, dynamic $param) : dynamic ==> {
           return $t5->length;
         })($port, $du_);
        if ($call2($Js_of_ocaml_Import[9], $dv_, $dt_)) {
          $dw_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -491534073, 81), $x);
          };
          $dx_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -899906687, 82), $x);
          };
          $dy_ = ((dynamic $t1, dynamic $param) : dynamic ==> {
             return $t1->port;
           })($loc, $dx_);
          $dz_ = ":";
          return ((dynamic $t4, dynamic $t2, dynamic $t3, dynamic $param) : dynamic ==> {return $t4->concat($t2, $t3);
           })($origin, $dz_, $dy_, $dw_);
        }
        return $origin;
      };
      $dg_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -889120282, 83), $x);
      };
      $dh_ = ((dynamic $t0, dynamic $param) : dynamic ==> {
         return $t0->origin;
       })($loc, $dg_);
      return $call3($Js_of_ocaml_Js[6][7], $dh_, $df_, $de_);
    };
    $window = $Js_of_ocaml_Js[50][1];
    $a_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 454225691, 84), $x);
    };
    $document = ((dynamic $t14, dynamic $param) : dynamic ==> {
       return $t14->document;
     })($window, $a_);
    $getElementById = (dynamic $id) : dynamic ==> {
      $c__ = (dynamic $pnode) : dynamic ==> {return $pnode;};
      $da_ = (dynamic $param) : dynamic ==> {
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      };
      $db_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -332188296, 85), $x);
      };
      $dc_ = $id->toString();
      $dd_ = ((dynamic $t16, dynamic $t15, dynamic $param) : dynamic ==> {
         return $t16->getElementById($t15);
       })($document, $dc_, $db_);
      return $call3($Js_of_ocaml_Js[5][7], $dd_, $da_, $c__);
    };
    $getElementById_exn = (dynamic $id) : dynamic ==> {
      $c4_ = (dynamic $pnode) : dynamic ==> {return $pnode;};
      $c5_ = (dynamic $param) : dynamic ==> {
        $c9_ = $call2($Printf[4], $b_, $id);
        return $call1($Pervasives[2], $c9_);
      };
      $c6_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -332188296, 86), $x);
      };
      $c7_ = $id->toString();
      $c8_ = ((dynamic $t18, dynamic $t17, dynamic $param) : dynamic ==> {
         return $t18->getElementById($t17);
       })($document, $c7_, $c6_);
      return $call3($Js_of_ocaml_Js[5][7], $c8_, $c5_, $c4_);
    };
    $getElementById_opt = (dynamic $id) : dynamic ==> {
      $c1_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -332188296, 87), $x);
      };
      $c2_ = $id->toString();
      $c3_ = ((dynamic $t20, dynamic $t19, dynamic $param) : dynamic ==> {
         return $t20->getElementById($t19);
       })($document, $c2_, $c1_);
      return $call1($Js_of_ocaml_Js[5][10], $c3_);
    };
    $getElementById_coerce = (dynamic $id, dynamic $coerce) : dynamic ==> {
      $cV_ = (dynamic $e) : dynamic ==> {
        $c0_ = $call1($coerce, $e);
        return $call1($Js_of_ocaml_Js[5][10], $c0_);
      };
      $cW_ = (dynamic $param) : dynamic ==> {return 0;};
      $cX_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -332188296, 88), $x);
      };
      $cY_ = $id->toString();
      $cZ_ = ((dynamic $t22, dynamic $t21, dynamic $param) : dynamic ==> {
         return $t22->getElementById($t21);
       })($document, $cY_, $cX_);
      return $call3($Js_of_ocaml_Js[5][7], $cZ_, $cW_, $cV_);
    };
    $opt_iter = (dynamic $x, dynamic $f) : dynamic ==> {
      if ($x) {$v = $x[1];return $call1($f, $v);}
      return 0;
    };
    $createElement = (dynamic $doc, dynamic $name) : dynamic ==> {
      $cT_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -292059360, 89), $x);
      };
      $cU_ = $name->toString();
      return ((dynamic $t24, dynamic $t23, dynamic $param) : dynamic ==> {
         return $t24->createElement($t23);
       })($doc, $cU_, $cT_);
    };
    $unsafeCreateElement = (dynamic $doc, dynamic $name) : dynamic ==> {
      return $createElement($doc, $name);
    };
    $createElementSyntax = Vector{0, 785140586} as dynamic;
    $unsafeCreateElementEx = 
    (dynamic $type, dynamic $name, dynamic $doc, dynamic $elt) : dynamic ==> {
      for (;;) {
        if (0 === $type) {
          if (0 === $name) {return $createElement($doc, $elt);}
        }
        $ck_ = $createElementSyntax[1];
        if (785140586 === $ck_) {
          try {
            $cn_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, -292059360, 90), $x);
            };
            $co_ = "<input name=\"x\">";
            $el = ((dynamic $t51, dynamic $t50, dynamic $param) : dynamic ==> {
               return $t51->createElement($t50);
             })($document, $co_, $cn_);
            $cp_ = "input";
            $cq_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, 946097238, 91), $x);
            };
            $cr_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, 578170309, 92), $x);
            };
            $cs_ = ((dynamic $t47, dynamic $param) : dynamic ==> {
               return $t47->tagName;
             })($el, $cr_);
            $ct_ = ((dynamic $t48, dynamic $param) : dynamic ==> {
                return $t48->toLowerCase();
              })($cs_, $cq_) === $cp_
              ? 1
              : (0);
            if ($ct_) {
              $cu_ = "x";
              $cv_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, -922783157, 93), $x);
              };
              $cw_ = ((dynamic $t49, dynamic $param) : dynamic ==> {
                  return $t49->name;
                })($el, $cv_) === $cu_
                ? 1
                : (0);
            }
            else {$cw_ = $ct_;}
            $cl_ = $cw_;
          }
          catch(\Throwable $cS_) {$cl_ = 0 as dynamic;}
          $cm_ = $cl_ ? 982028505 : (-1003883683);
          $createElementSyntax[1] = $cm_;
          continue;
        }
        if (982028505 <= $ck_) {
          $cx_ = 0 as dynamic;
          $cy_ = $Js_of_ocaml_Js[14];
          $a = ((dynamic $t46, dynamic $param) : dynamic ==> {
             return new $t46();
           })($cy_, $cx_);
          $cz_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -231927987, 94), $x);
          };
          $cA_ = $elt->toString();
          $cB_ = "<";
          (((dynamic $t45, dynamic $t43, dynamic $t44, dynamic $param) : dynamic ==> {return $t45->push($t43, $t44);
            })($a, $cB_, $cA_, $cz_));
          $opt_iter(
            $type,
            (dynamic $t) : dynamic ==> {
              $cO_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, -231927986, 95), $x);
              };
              $cP_ = "\"";
              $cQ_ = $caml_js_html_escape($t);
              $cR_ = " type=\"";
              ((
                (dynamic $t42, dynamic $t39, dynamic $t40, dynamic $t41, dynamic $param) : dynamic ==> {
                  return $t42->push($t39, $t40, $t41);
                })($a, $cR_, $cQ_, $cP_, $cO_));
              return 0;
            }
          );
          $opt_iter(
            $name,
            (dynamic $n) : dynamic ==> {
              $cK_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, -231927986, 96), $x);
              };
              $cL_ = "\"";
              $cM_ = $caml_js_html_escape($n);
              $cN_ = " name=\"";
              ((
                (dynamic $t38, dynamic $t35, dynamic $t36, dynamic $t37, dynamic $param) : dynamic ==> {
                  return $t38->push($t35, $t36, $t37);
                })($a, $cN_, $cM_, $cL_, $cK_));
              return 0;
            }
          );
          $cC_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -899608102, 97), $x);
          };
          $cD_ = ">";
          (((dynamic $t34, dynamic $t33, dynamic $param) : dynamic ==> {return $t34->push($t33);
            })($a, $cD_, $cC_));
          $cE_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -292059360, 98), $x);
          };
          $cF_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -966446102, 99), $x);
          };
          $cG_ = "";
          $cH_ = ((dynamic $t30, dynamic $t29, dynamic $param) : dynamic ==> {return $t30->join($t29);
           })($a, $cG_, $cF_);
          return ((dynamic $t32, dynamic $t31, dynamic $param) : dynamic ==> {
             return $t32->createElement($t31);
           })($doc, $cH_, $cE_);
        }
        $res = $createElement($doc, $elt);
        $opt_iter(
          $type,
          (dynamic $t) : dynamic ==> {
            $cJ_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, 1707673, 100), $x);
            };
            return ((dynamic $t28, dynamic $t27, dynamic $param) : dynamic ==> {$t28->type = $t27;return 0;
             })($res, $t, $cJ_);
          }
        );
        $opt_iter(
          $name,
          (dynamic $n) : dynamic ==> {
            $cI_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, -922783157, 101), $x);
            };
            return ((dynamic $t26, dynamic $t25, dynamic $param) : dynamic ==> {$t26->name = $t25;return 0;
             })($res, $n, $cI_);
          }
        );
        return $res;
      }
    };
    $createHtml = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_html);
    };
    $createHead = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_head);
    };
    $createLink = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_link);
    };
    $createTitle = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_title);
    };
    $createMeta = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_meta);
    };
    $createBase = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_base);
    };
    $createStyle = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_style);
    };
    $createBody = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_body);
    };
    $createForm = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_form);
    };
    $createOptgroup = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_optgroup);
    };
    $createOption = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_option);
    };
    $createSelect = (dynamic $type, dynamic $name, dynamic $doc) : dynamic ==> {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_select__0);
    };
    $createInput = (dynamic $type, dynamic $name, dynamic $doc) : dynamic ==> {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_input__0);
    };
    $createTextarea = (dynamic $type, dynamic $name, dynamic $doc) : dynamic ==> {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_textarea);
    };
    $createButton = (dynamic $type, dynamic $name, dynamic $doc) : dynamic ==> {
      return $unsafeCreateElementEx($type, $name, $doc, $cst_button);
    };
    $createLabel = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_label);
    };
    $createFieldset = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_fieldset);
    };
    $createLegend = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_legend);
    };
    $createUl = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_ul);
    };
    $createOl = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_ol);
    };
    $createDl = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_dl);
    };
    $createLi = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_li);
    };
    $createDiv = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_div);
    };
    $createEmbed = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_embed);
    };
    $createP = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_p);
    };
    $createH1 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h1);
    };
    $createH2 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h2);
    };
    $createH3 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h3);
    };
    $createH4 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h4);
    };
    $createH5 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h5);
    };
    $createH6 = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_h6);
    };
    $createQ = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_q);
    };
    $createBlockquote = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_blockquote);
    };
    $createPre = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_pre);
    };
    $createBr = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_br);
    };
    $createHr = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_hr);
    };
    $createIns = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_ins);
    };
    $createDel = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_del);
    };
    $createA = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_a);
    };
    $createImg = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_img);
    };
    $createObject = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_object);
    };
    $createParam = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_param);
    };
    $createMap = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_map);
    };
    $createArea = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_area);
    };
    $createScript = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_script);
    };
    $createTable = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_table);
    };
    $createCaption = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_caption);
    };
    $createCol = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_col);
    };
    $createColgroup = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_colgroup);
    };
    $createThead = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_thead);
    };
    $createTfoot = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_tfoot);
    };
    $createTbody = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_tbody);
    };
    $createTr = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_tr);
    };
    $createTh = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_th);
    };
    $createTd = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_td);
    };
    $createSub = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_sub);
    };
    $createSup = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_sup);
    };
    $createSpan = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_span);
    };
    $createTt = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_tt);
    };
    $createI = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_i);
    };
    $createB = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_b);
    };
    $createBig = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_big);
    };
    $createSmall = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_small);
    };
    $createEm = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_em);
    };
    $createStrong = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_strong);
    };
    $createCite = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_cite);
    };
    $createDfn = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_dfn);
    };
    $createCode = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_code);
    };
    $createSamp = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_samp);
    };
    $createKbd = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_kbd);
    };
    $createVar = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_var);
    };
    $createAbbr = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_abbr);
    };
    $createDd = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_dd);
    };
    $createDt = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_dt);
    };
    $createNoscript = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_noscript);
    };
    $createAddress = (dynamic $doc) : dynamic ==> {
      return $createElement($doc, $cst_address);
    };
    $createFrameset = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_frameset);
    };
    $createFrame = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_frame);
    };
    $createIframe = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_iframe);
    };
    $createAudio = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_audio);
    };
    $createVideo = (dynamic $doc) : dynamic ==> {
      return $unsafeCreateElement($doc, $cst_video);
    };
    $Canvas_not_available = Vector{
      248,
      $cst_Js_of_ocaml_Dom_html_Canvas_not_available,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $createCanvas = (dynamic $doc) : dynamic ==> {
      $c = $unsafeCreateElement($doc, $cst_canvas);
      $ci_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -388424711, 102), $x);
      };
      $cj_ = ((dynamic $t52, dynamic $param) : dynamic ==> {
         return $t52->getContext;
       })($c, $ci_);
      if (1 - $call1($Js_of_ocaml_Js[5][5], $cj_)) {
        throw $caml_wrap_thrown_exception($Canvas_not_available) as \Throwable;
      }
      return $c;
    };
    $c_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -29132142, 103), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $html_element = ((dynamic $t53, dynamic $param) : dynamic ==> {
       return $t53->HTMLElement;
     })($d_, $c_);
    $e_ = $Js_of_ocaml_Js[3];
    $element = $call1($Js_of_ocaml_Js[4], $html_element) === $e_
      ? (dynamic $e) : dynamic ==> {
       $cf_ = $Js_of_ocaml_Js[3];
       $cg_ = (dynamic $x) : dynamic ==> {
         return $call1($caml_get_public_method($x, 746263041, 104), $x);
       };
       $ch_ = ((dynamic $t54, dynamic $param) : dynamic ==> {
          return $t54->innerHTML;
        })($e, $cg_);
       return $call1($Js_of_ocaml_Js[4], $ch_) === $cf_
         ? $Js_of_ocaml_Js[1]
         : ($call1($Js_of_ocaml_Js[2], $e));
     }
      : ((dynamic $e) : dynamic ==> {
       return instance_of($e, $html_element)
         ? $call1($Js_of_ocaml_Js[2], $e)
         : ($Js_of_ocaml_Js[1]);
     });
    $unsafeCoerce = (dynamic $tag, dynamic $e) : dynamic ==> {
      $cb_ = $tag->toString();
      $cc_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 946097238, 105), $x);
      };
      $cd_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 578170309, 106), $x);
      };
      $ce_ = ((dynamic $t55, dynamic $param) : dynamic ==> {
         return $t55->tagName;
       })($e, $cd_);
      return ((dynamic $t56, dynamic $param) : dynamic ==> {
          return $t56->toLowerCase();
        })($ce_, $cc_) === $cb_
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $a = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_a__0, $e);};
    $area = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_area__0, $e);
    };
    $base = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_base__0, $e);
    };
    $blockquote = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_blockquote__0, $e);
    };
    $body = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_body__0, $e);
    };
    $br = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_br__0, $e);};
    $button = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_button__0, $e);
    };
    $canvas = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_canvas__0, $e);
    };
    $caption = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_caption__0, $e);
    };
    $col = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_col__0, $e);};
    $colgroup = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_colgroup__0, $e);
    };
    $del = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_del__0, $e);};
    $div = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_div__0, $e);};
    $dl = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_dl__0, $e);};
    $fieldset = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_fieldset__0, $e);
    };
    $embed = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_embed__0, $e);
    };
    $form = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_form__0, $e);
    };
    $frameset = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_frameset__0, $e);
    };
    $frame = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_frame__0, $e);
    };
    $h1 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h1__0, $e);};
    $h2 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h2__0, $e);};
    $h3 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h3__0, $e);};
    $h4 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h4__0, $e);};
    $h5 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h5__0, $e);};
    $h6 = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_h6__0, $e);};
    $head = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_head__0, $e);
    };
    $hr = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_hr__0, $e);};
    $html = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_html__0, $e);
    };
    $iframe = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_iframe__0, $e);
    };
    $img = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_img__0, $e);};
    $input__0 = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_input__1, $e);
    };
    $ins = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_ins__0, $e);};
    $label = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_label__0, $e);
    };
    $legend = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_legend__0, $e);
    };
    $li = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_li__0, $e);};
    $link = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_link__0, $e);
    };
    $map = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_map__0, $e);};
    $meta = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_meta__0, $e);
    };
    $object = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_object__0, $e);
    };
    $ol = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_ol__0, $e);};
    $optgroup = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_optgroup__0, $e);
    };
    $option = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_option__0, $e);
    };
    $p = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_p__0, $e);};
    $param = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_param__0, $e);
    };
    $pre = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_pre__0, $e);};
    $q = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_q__0, $e);};
    $script = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_script__0, $e);
    };
    $select__0 = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_select__1, $e);
    };
    $style = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_style__0, $e);
    };
    $table = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_table__0, $e);
    };
    $tbody = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_tbody__0, $e);
    };
    $td = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_td__0, $e);};
    $textarea = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_textarea__0, $e);
    };
    $tfoot = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_tfoot__0, $e);
    };
    $th = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_th__0, $e);};
    $thead = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_thead__0, $e);
    };
    $title = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_title__0, $e);
    };
    $tr = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_tr__0, $e);};
    $ul = (dynamic $e) : dynamic ==> {return $unsafeCoerce($cst_ul__0, $e);};
    $audio = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_audio__0, $e);
    };
    $video = (dynamic $e) : dynamic ==> {
      return $unsafeCoerce($cst_video__0, $e);
    };
    $unsafeCoerceEvent = (dynamic $constr, dynamic $ev) : dynamic ==> {
      $ca_ = $Js_of_ocaml_Js[3];
      if ($call1($Js_of_ocaml_Js[4], $constr) !== $ca_) {
        if (instance_of($ev, $constr)) {
          return $call1($Js_of_ocaml_Js[2], $ev);
        }
      }
      return $Js_of_ocaml_Js[1];
    };
    $mouseEvent = (dynamic $ev) : dynamic ==> {
      $b9_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -590574348, 107), $x);
      };
      $b__ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        ((dynamic $t57, dynamic $param) : dynamic ==> {
           return $t57->MouseEvent;
         })($b__, $b9_),
        $ev
      );
    };
    $keyboardEvent = (dynamic $ev) : dynamic ==> {
      $b7_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -807764460, 108), $x);
      };
      $b8_ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        ((dynamic $t58, dynamic $param) : dynamic ==> {
           return $t58->KeyboardEvent;
         })($b8_, $b7_),
        $ev
      );
    };
    $wheelEvent = (dynamic $ev) : dynamic ==> {
      $b5_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 239551166, 109), $x);
      };
      $b6_ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        ((dynamic $t59, dynamic $param) : dynamic ==> {
           return $t59->WheelEvent;
         })($b6_, $b5_),
        $ev
      );
    };
    $mouseScrollEvent = (dynamic $ev) : dynamic ==> {
      $b3_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -31722201, 110), $x);
      };
      $b4_ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        ((dynamic $t60, dynamic $param) : dynamic ==> {
           return $t60->MouseScrollEvent;
         })($b4_, $b3_),
        $ev
      );
    };
    $popStateEvent = (dynamic $ev) : dynamic ==> {
      $b1_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -903494309, 111), $x);
      };
      $b2_ = $Js_of_ocaml_Js[50][1];
      return $unsafeCoerceEvent(
        ((dynamic $t61, dynamic $param) : dynamic ==> {
           return $t61->PopStateEvent;
         })($b2_, $b1_),
        $ev
      );
    };
    $eventTarget = $Js_of_ocaml_Dom[13];
    $eventRelatedTarget = (dynamic $e) : dynamic ==> {
      $bR_ = (dynamic $param) : dynamic ==> {
        $bU_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 1707673, 112), $x);
        };
        $match = $caml_js_to_string(
          ((dynamic $t65, dynamic $param) : dynamic ==> {return $t65->type;})($e, $bU_)
        );
        if ($caml_string_notequal($match, $cst_mouseout__0)) {
          if ($caml_string_notequal($match, $cst_mouseover__0)) {return $Js_of_ocaml_Js[1];}
          $bV_ = (dynamic $param) : dynamic ==> {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $f_}) as \Throwable;
          };
          $bW_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, 513086066, 113), $x);
          };
          $bX_ = ((dynamic $t63, dynamic $param) : dynamic ==> {
             return $t63->fromElement;
           })($e, $bW_);
          return $call2($Js_of_ocaml_Js[6][8], $bX_, $bV_);
        }
        $bY_ = (dynamic $param) : dynamic ==> {
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $g_}) as \Throwable;
        };
        $bZ_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 904455809, 114), $x);
        };
        $b0_ = ((dynamic $t64, dynamic $param) : dynamic ==> {
           return $t64->toElement;
         })($e, $bZ_);
        return $call2($Js_of_ocaml_Js[6][8], $b0_, $bY_);
      };
      $bS_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -629591140, 115), $x);
      };
      $bT_ = ((dynamic $t62, dynamic $param) : dynamic ==> {
         return $t62->relatedTarget;
       })($e, $bS_);
      return $call2($Js_of_ocaml_Js[6][8], $bT_, $bR_);
    };
    $eventAbsolutePosition = (dynamic $e) : dynamic ==> {
      $bE_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1055163742, 116), $x);
      };
      $body = ((dynamic $t73, dynamic $param) : dynamic ==> {
         return $t73->body;
       })($document, $bE_);
      $bF_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1068552417, 117), $x);
      };
      $html = ((dynamic $t72, dynamic $param) : dynamic ==> {
         return $t72->documentElement;
       })($document, $bF_);
      $bG_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1040845960, 118), $x);
      };
      $bH_ = ((dynamic $t71, dynamic $param) : dynamic ==> {
         return $t71->scrollTop;
       })($html, $bG_);
      $bI_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1040845960, 119), $x);
      };
      $bJ_ = ((dynamic $t70, dynamic $param) : dynamic ==> {
         return $t70->scrollTop;
       })($body, $bI_);
      $bK_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -75417682, 120), $x);
      };
      $bL_ = (int)
      ((int)
       (((dynamic $t69, dynamic $param) : dynamic ==> {return $t69->clientY;})($e, $bK_) + $bJ_) +
         $bH_) as dynamic;
      $bM_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 91199156, 121), $x);
      };
      $bN_ = ((dynamic $t68, dynamic $param) : dynamic ==> {
         return $t68->scrollLeft;
       })($html, $bM_);
      $bO_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 91199156, 122), $x);
      };
      $bP_ = ((dynamic $t67, dynamic $param) : dynamic ==> {
         return $t67->scrollLeft;
       })($body, $bO_);
      $bQ_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -75417683, 123), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         (((dynamic $t66, dynamic $param) : dynamic ==> {
             return $t66->clientX;
           })($e, $bQ_) + $bP_) +
           $bN_),
        $bL_
      };
    };
    $eventAbsolutePosition__0 = (dynamic $e) : dynamic ==> {
      $bw_ = (dynamic $x) : dynamic ==> {
        $bA_ = (dynamic $y) : dynamic ==> {return Vector{0, $x, $y};};
        $bB_ = (dynamic $param) : dynamic ==> {
          return $eventAbsolutePosition($e);
        };
        $bC_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 1028467498, 124), $x);
        };
        $bD_ = ((dynamic $t75, dynamic $param) : dynamic ==> {
           return $t75->pageY;
         })($e, $bC_);
        return $call3($Js_of_ocaml_Js[6][7], $bD_, $bB_, $bA_);
      };
      $bx_ = (dynamic $param) : dynamic ==> {
        return $eventAbsolutePosition($e);
      };
      $by_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1028467497, 125), $x);
      };
      $bz_ = ((dynamic $t74, dynamic $param) : dynamic ==> {
         return $t74->pageX;
       })($e, $by_);
      return $call3($Js_of_ocaml_Js[6][7], $bz_, $bx_, $bw_);
    };
    $elementClientPosition = (dynamic $e) : dynamic ==> {
      $bi_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 718768073, 126), $x);
      };
      $r = ((dynamic $t84, dynamic $param) : dynamic ==> {
         return $t84->getBoundingClientRect();
       })($e, $bi_);
      $bj_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1055163742, 127), $x);
      };
      $body = ((dynamic $t83, dynamic $param) : dynamic ==> {
         return $t83->body;
       })($document, $bj_);
      $bk_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1068552417, 128), $x);
      };
      $html = ((dynamic $t82, dynamic $param) : dynamic ==> {
         return $t82->documentElement;
       })($document, $bk_);
      $bl_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -939682550, 129), $x);
      };
      $bm_ = ((dynamic $t81, dynamic $param) : dynamic ==> {
         return $t81->clientTop;
       })($html, $bl_);
      $bn_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -939682550, 130), $x);
      };
      $bo_ = ((dynamic $t80, dynamic $param) : dynamic ==> {
         return $t80->clientTop;
       })($body, $bn_);
      $bp_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 5793429, 131), $x);
      };
      $bq_ = (int)
      ((int)
       ((int)
        ((dynamic $t79, dynamic $param) : dynamic ==> {return $t79->top;})($r, $bp_) - $bo_) -
         $bm_) as dynamic;
      $br_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 814972914, 132), $x);
      };
      $bs_ = ((dynamic $t78, dynamic $param) : dynamic ==> {
         return $t78->clientLeft;
       })($html, $br_);
      $bt_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 814972914, 133), $x);
      };
      $bu_ = ((dynamic $t77, dynamic $param) : dynamic ==> {
         return $t77->clientLeft;
       })($body, $bt_);
      $bv_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -944764921, 134), $x);
      };
      return Vector{
        0,
        (int)
        ((int)
         ((int)
          ((dynamic $t76, dynamic $param) : dynamic ==> {return $t76->left;})($r, $bv_) - $bu_) -
           $bs_),
        $bq_
      };
    };
    $getDocumentScroll = (dynamic $param) : dynamic ==> {
      $a__ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1055163742, 135), $x);
      };
      $body = ((dynamic $t90, dynamic $param) : dynamic ==> {
         return $t90->body;
       })($document, $a__);
      $ba_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1068552417, 136), $x);
      };
      $html = ((dynamic $t89, dynamic $param) : dynamic ==> {
         return $t89->documentElement;
       })($document, $ba_);
      $bb_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1040845960, 137), $x);
      };
      $bc_ = ((dynamic $t88, dynamic $param) : dynamic ==> {
         return $t88->scrollTop;
       })($html, $bb_);
      $bd_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 1040845960, 138), $x);
      };
      $be_ = (int)
      (((dynamic $t87, dynamic $param) : dynamic ==> {return $t87->scrollTop;})($body, $bd_) + $bc_) as dynamic;
      $bf_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 91199156, 139), $x);
      };
      $bg_ = ((dynamic $t86, dynamic $param) : dynamic ==> {
         return $t86->scrollLeft;
       })($html, $bf_);
      $bh_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 91199156, 140), $x);
      };
      return Vector{
        0,
        (int)
        (((dynamic $t85, dynamic $param) : dynamic ==> {
            return $t85->scrollLeft;
          })($body, $bh_) + $bg_),
        $be_
      };
    };
    $buttonPressed = (dynamic $ev) : dynamic ==> {
      $a5_ = (dynamic $x) : dynamic ==> {return $x;};
      $a6_ = (dynamic $param) : dynamic ==> {
        $a9_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -639606286, 141), $x);
        };
        $match = ((dynamic $t92, dynamic $param) : dynamic ==> {
           return $t92->button;
         })($ev, $a9_);
        $switcher = (int) ($match + -1) as dynamic;
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
      $a7_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -910345251, 142), $x);
      };
      $a8_ = ((dynamic $t91, dynamic $param) : dynamic ==> {
         return $t91->which;
       })($ev, $a7_);
      return $call3($Js_of_ocaml_Js[6][7], $a8_, $a6_, $a5_);
    };
    $hasMousewheelEvents = (dynamic $param) : dynamic ==> {
      $d = $createDiv($document);
      $a2_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 524300314, 143), $x);
      };
      $a3_ = "return;";
      $a4_ = "onmousewheel";
      (((dynamic $t95, dynamic $t93, dynamic $t94, dynamic $param) : dynamic ==> {return $t95->setAttribute($t93, $t94);
        })($d, $a4_, $a3_, $a2_));
      return typeof($d->onmousewheel) === "function" ? 1 : (0);
    };
    $addMousewheelEventListenerWithOptions = 
    (dynamic $e, dynamic $capture, dynamic $once, dynamic $passive, dynamic $h) : dynamic ==> {
      return $hasMousewheelEvents(0)
        ? $call6(
         $addEventListenerWithOptions,
         $e,
         $mousewheel,
         $capture,
         $once,
         $passive,
         $call1(
           $handler,
           (dynamic $e) : dynamic ==> {
             $aR_ = (dynamic $param) : dynamic ==> {return 0;};
             $aS_ = (dynamic $x) : dynamic ==> {
               return $call1($caml_get_public_method($x, -95379365, 144), $x);
             };
             $aT_ = ((dynamic $t101, dynamic $param) : dynamic ==> {
                return $t101->wheelDeltaX;
              })($e, $aS_);
             $dx = (int)
             ((int) - $call2($Js_of_ocaml_Js[6][8], $aT_, $aR_) / 40) as dynamic;
             $aU_ = (dynamic $param) : dynamic ==> {
               $aX_ = (dynamic $x) : dynamic ==> {
                 return $call1($caml_get_public_method($x, 644780381, 145), $x
                 );
               };
               return ((dynamic $t100, dynamic $param) : dynamic ==> {
                  return $t100->wheelDelta;
                })($e, $aX_);
             };
             $aV_ = (dynamic $x) : dynamic ==> {
               return $call1($caml_get_public_method($x, -95379364, 146), $x);
             };
             $aW_ = ((dynamic $t99, dynamic $param) : dynamic ==> {
                return $t99->wheelDeltaY;
              })($e, $aV_);
             $dy = (int)
             ((int) - $call2($Js_of_ocaml_Js[6][8], $aW_, $aU_) / 40) as dynamic;
             return $call3($h, $e, $dx, $dy);
           }
         )
       )
        : ($call6(
         $addEventListenerWithOptions,
         $e,
         $DOMMouseScroll,
         $capture,
         $once,
         $passive,
         $call1(
           $handler,
           (dynamic $e) : dynamic ==> {
             $aY_ = (dynamic $x) : dynamic ==> {
               return $call1($caml_get_public_method($x, -266378607, 147), $x);
             };
             $d = ((dynamic $t98, dynamic $param) : dynamic ==> {
                return $t98->detail;
              })($e, $aY_);
             $aZ_ = (dynamic $x) : dynamic ==> {
               return $call1($caml_get_public_method($x, -66775139, 148), $x);
             };
             $a0_ = ((dynamic $t97, dynamic $param) : dynamic ==> {
                return $t97->HORIZONTAL;
              })($e, $aZ_);
             $a1_ = (dynamic $x) : dynamic ==> {
               return $call1($caml_get_public_method($x, -1065804639, 149), $x
               );
             };
             return ((dynamic $t96, dynamic $param) : dynamic ==> {
                 return $t96->axis;
               })($e, $a1_) === $a0_
               ? $call3($h, $e, $d, 0)
               : ($call3($h, $e, 0, $d));
           }
         )
       ));
    };
    $addMousewheelEventListener = (dynamic $e, dynamic $h, dynamic $capt) : dynamic ==> {
      return $addMousewheelEventListenerWithOptions(
        $e,
        Vector{0, $capt},
        0,
        0,
        $h
      );
    };
    $try_code = (dynamic $v) : dynamic ==> {
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
    $try_key_code_left = (dynamic $param) : dynamic ==> {
      if (19 <= $param) {
        if (91 === $param) {return 88;}
      }
      else {
        if (16 <= $param) {
          $switcher = (int) ($param + -16) as dynamic;
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
    $try_key_code_right = (dynamic $param) : dynamic ==> {
      if (19 <= $param) {
        if (91 === $param) {return 89;}
      }
      else {
        if (16 <= $param) {
          $switcher = (int) ($param + -16) as dynamic;
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
    $try_key_code_numpad = (dynamic $param) : dynamic ==> {
      if (47 <= $param) {
        $switcher = (int) ($param + -96) as dynamic;
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
          $switcher__0 = (int) ($param + -12) as dynamic;
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
    $try_key_code_normal = (dynamic $param) : dynamic ==> {
      $switcher = (int) ($param + -8) as dynamic;
      if (! (214 < $unsigned_right_shift_32($switcher, 0))) {
        $aQ_ = $switcher;
        if (67 <= $aQ_) {
          switch($aQ_) {
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
          switch($aQ_) {
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
    $make_unidentified = (dynamic $param) : dynamic ==> {return 0;};
    $try_next = (dynamic $value, dynamic $f, dynamic $v) : dynamic ==> {
      return 0 === $v
        ? $call3($Js_of_ocaml_Js[6][7], $value, $make_unidentified, $f)
        : ($v);
    };
    $run_next = (dynamic $value, dynamic $f, dynamic $v) : dynamic ==> {
      return 0 === $v ? $call1($f, $value) : ($v);
    };
    $get_key_code = (dynamic $evt) : dynamic ==> {
      $aP_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 463348332, 150), $x);
      };
      return ((dynamic $t102, dynamic $param) : dynamic ==> {
         return $t102->keyCode;
       })($evt, $aP_);
    };
    $try_key_location = (dynamic $evt) : dynamic ==> {
      $aI_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -448369099, 151), $x);
      };
      $match = ((dynamic $t103, dynamic $param) : dynamic ==> {
         return $t103->location;
       })($evt, $aI_);
      $switcher = (int) ($match + -1) as dynamic;
      if (2 < $unsigned_right_shift_32($switcher, 0)) {return $make_unidentified;}
      switch($switcher) {
        // FALLTHROUGH
        case 0:
          $aJ_ = $get_key_code($evt);
          return (dynamic $aN_) : dynamic ==> {
            return $run_next($aJ_, $try_key_code_left, $aN_);
          };
        // FALLTHROUGH
        case 1:
          $aK_ = $get_key_code($evt);
          return (dynamic $aM_) : dynamic ==> {
            return $run_next($aK_, $try_key_code_right, $aM_);
          };
        // FALLTHROUGH
        default:
          $aL_ = $get_key_code($evt);
          return (dynamic $aO_) : dynamic ==> {
            return $run_next($aL_, $try_key_code_numpad, $aO_);
          };
        }
    };
    $symbol = (dynamic $x, dynamic $f) : dynamic ==> {return $call1($f, $x);};
    $of_event = (dynamic $evt) : dynamic ==> {
      $aB_ = $get_key_code($evt);
      $aC_ = (dynamic $aH_) : dynamic ==> {
        return $run_next($aB_, $try_key_code_normal, $aH_);
      };
      $aD_ = $try_key_location($evt);
      $aE_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1044074195, 152), $x);
      };
      $aF_ = ((dynamic $t104, dynamic $param) : dynamic ==> {
         return $t104->code;
       })($evt, $aE_);
      return $symbol(
        $symbol(
          $symbol(
            0,
            (dynamic $aG_) : dynamic ==> {
              return $try_next($aF_, $try_code, $aG_);
            }
          ),
          $aD_
        ),
        $aC_
      );
    };
    $char_of_int = (dynamic $value) : dynamic ==> {
      if ($call2($Js_of_ocaml_Import[5], 0, $value)) {
        try {
          $az_ = Vector{0, $call1($Uchar[8], $value)} as dynamic;
          return $az_;
        }
        catch(\Throwable $aA_) {return 0;}
      }
      return 0;
    };
    $empty_string = (dynamic $param) : dynamic ==> {return "";};
    $none = (dynamic $param) : dynamic ==> {return 0;};
    $of_event__0 = (dynamic $evt) : dynamic ==> {
      $as_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 5343647, 153), $x);
      };
      $at_ = ((dynamic $t109, dynamic $param) : dynamic ==> {
         return $t109->key;
       })($evt, $as_);
      $key = $call2($Js_of_ocaml_Js[6][8], $at_, $empty_string);
      $au_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 520590566, 154), $x);
      };
      $match = ((dynamic $t108, dynamic $param) : dynamic ==> {
         return $t108->length;
       })($key, $au_);
      if (0 === $match) {
        $av_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 472145699, 155), $x);
        };
        $aw_ = ((dynamic $t105, dynamic $param) : dynamic ==> {
           return $t105->charCode;
         })($evt, $av_);
        return $call3($Js_of_ocaml_Js[6][7], $aw_, $none, $char_of_int);
      }
      if (1 === $match) {
        $ax_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 894756598, 156), $x);
        };
        $ay_ = 0 as dynamic;
        return $char_of_int(
          (int)
          ((dynamic $t107, dynamic $t106, dynamic $param) : dynamic ==> {
             return $t107->charCodeAt($t106);
           })($key, $ay_, $ax_)
        );
      }
      return 0;
    };
    $element__0 = (dynamic $ar_) : dynamic ==> {return $ar_;};
    $other = (dynamic $e) : dynamic ==> {return Vector{61, $e};};
    $tagged = (dynamic $e) : dynamic ==> {
      $ao_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 946097238, 157), $x);
      };
      $ap_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 578170309, 158), $x);
      };
      $aq_ = ((dynamic $t110, dynamic $param) : dynamic ==> {
         return $t110->tagName;
       })($e, $ap_);
      $tag = $runtime["caml_js_to_byte_string"](
        ((dynamic $t111, dynamic $param) : dynamic ==> {
           return $t111->toLowerCase();
         })($aq_, $ao_)
      );
      if (
        $call2(
          $Js_of_ocaml_Import[8],
          $runtime["caml_ml_string_length"]($tag),
          0
        )
      ) {return $other($e);}
      $match = $runtime["caml_bytes_unsafe_get"]($tag, 0);
      $switcher = (int) ($match + -97) as dynamic;
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
    $opt_tagged = (dynamic $e) : dynamic ==> {
      $am_ = (dynamic $e) : dynamic ==> {return Vector{0, $tagged($e)};};
      $an_ = (dynamic $param) : dynamic ==> {return 0;};
      return $call3($Js_of_ocaml_Js[5][7], $e, $an_, $am_);
    };
    $taggedEvent = (dynamic $ev) : dynamic ==> {
      $X_ = (dynamic $ev) : dynamic ==> {return Vector{0, $ev};};
      $Y_ = (dynamic $param) : dynamic ==> {
        $aa_ = (dynamic $ev) : dynamic ==> {return Vector{1, $ev};};
        $ab_ = (dynamic $param) : dynamic ==> {
          $ad_ = (dynamic $ev) : dynamic ==> {return Vector{2, $ev};};
          $ae_ = (dynamic $param) : dynamic ==> {
            $ag_ = (dynamic $ev) : dynamic ==> {return Vector{3, $ev};};
            $ah_ = (dynamic $param) : dynamic ==> {
              $aj_ = (dynamic $ev) : dynamic ==> {return Vector{4, $ev};};
              $ak_ = (dynamic $param) : dynamic ==> {return Vector{5, $ev};};
              $al_ = $popStateEvent($ev);
              return $call3($Js_of_ocaml_Js[5][7], $al_, $ak_, $aj_);
            };
            $ai_ = $mouseScrollEvent($ev);
            return $call3($Js_of_ocaml_Js[5][7], $ai_, $ah_, $ag_);
          };
          $af_ = $wheelEvent($ev);
          return $call3($Js_of_ocaml_Js[5][7], $af_, $ae_, $ad_);
        };
        $ac_ = $keyboardEvent($ev);
        return $call3($Js_of_ocaml_Js[5][7], $ac_, $ab_, $aa_);
      };
      $Z_ = $mouseEvent($ev);
      return $call3($Js_of_ocaml_Js[5][7], $Z_, $Y_, $X_);
    };
    $opt_taggedEvent = (dynamic $ev) : dynamic ==> {
      $V_ = (dynamic $ev) : dynamic ==> {return Vector{0, $taggedEvent($ev)};};
      $W_ = (dynamic $param) : dynamic ==> {return 0;};
      return $call3($Js_of_ocaml_Js[5][7], $ev, $W_, $V_);
    };
    $stopPropagation = (dynamic $ev) : dynamic ==> {
      $O_ = (dynamic $param) : dynamic ==> {
        $U_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 189842539, 159), $x);
        };
        return ((dynamic $t115, dynamic $param) : dynamic ==> {
           return $t115->stopPropagation();
         })($ev, $U_);
      };
      $P_ = (dynamic $param) : dynamic ==> {
        $S_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 320837798, 160), $x);
        };
        $T_ = $Js_of_ocaml_Js[7];
        return ((dynamic $t114, dynamic $t113, dynamic $param) : dynamic ==> {
           $t114->cancelBubble = $t113;
           return 0;
         })($ev, $T_, $S_);
      };
      $Q_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 544309738, 161), $x);
      };
      $R_ = ((dynamic $t112, dynamic $param) : dynamic ==> {
         return $t112->stopPropagation;
       })($ev, $Q_);
      return $call3($Js_of_ocaml_Js[6][7], $R_, $P_, $O_);
    };
    $requestAnimationFrame = $runtime["caml_js_pure_expr"](
      (dynamic $param) : dynamic ==> {
        $w_ = 0 as dynamic;
        $x_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 497949938, 162), $x);
        };
        $y_ = Vector{
          0,
          ((dynamic $t125, dynamic $param) : dynamic ==> {
             return $t125->msRequestAnimationFrame;
           })($window, $x_),
          $w_
        } as dynamic;
        $z_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -153781943, 163), $x);
        };
        $A_ = Vector{
          0,
          ((dynamic $t124, dynamic $param) : dynamic ==> {
             return $t124->oRequestAnimationFrame;
           })($window, $z_),
          $y_
        } as dynamic;
        $B_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -151539242, 164), $x);
        };
        $C_ = Vector{
          0,
          ((dynamic $t123, dynamic $param) : dynamic ==> {
             return $t123->webkitRequestAnimationFrame;
           })($window, $B_),
          $A_
        } as dynamic;
        $D_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -769448896, 165), $x);
        };
        $E_ = Vector{
          0,
          ((dynamic $t122, dynamic $param) : dynamic ==> {
             return $t122->mozRequestAnimationFrame;
           })($window, $D_),
          $C_
        } as dynamic;
        $F_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 240126520, 166), $x);
        };
        $l = Vector{
          0,
          ((dynamic $t121, dynamic $param) : dynamic ==> {
             return $t121->requestAnimationFrame;
           })($window, $F_),
          $E_
        } as dynamic;
        try {
          $G_ = (dynamic $c) : dynamic ==> {
            return $call1($Js_of_ocaml_Js[6][5], $c);
          };
          $req = $call2($List[33], $G_, $l);
          $H_ = (dynamic $callback) : dynamic ==> {return $req($callback);};
          return $H_;
        }
        catch(\Throwable $I_) {
          $I_ = $runtime["caml_wrap_exception"]($I_);
          if ($I_ === $Not_found) {
            $now = (dynamic $param) : dynamic ==> {
              $K_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, 528448451, 167), $x);
              };
              $L_ = 0 as dynamic;
              $M_ = $Js_of_ocaml_Js[22];
              $N_ = ((dynamic $t119, dynamic $param) : dynamic ==> {
                 return new $t119();
               })($M_, $L_);
              return ((dynamic $t120, dynamic $param) : dynamic ==> {
                 return $t120->getTime();
               })($N_, $K_);
            };
            $last = Vector{0, $now(0)} as dynamic;
            return (dynamic $callback) : dynamic ==> {
              $t = $now(0);
              $dt = $last[1] + 16.6666666666666679 - $t;
              $dt__0 = $dt < 0 ? 0 : ($dt);
              $last[1] = $t;
              $J_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, 735461151, 168), $x);
              };
              (((dynamic $t118, dynamic $t116, dynamic $t117, dynamic $param) : dynamic ==> {return $t118->setTimeout($t116, $t117);
                })($window, $callback, $dt__0, $J_));
              return 0;
            };
          }
          throw $caml_wrap_thrown_exception_reraise($I_) as \Throwable;
        }
      }
    );
    $hasPushState = (dynamic $param) : dynamic ==> {
      $s_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -936976937, 169), $x);
      };
      $t_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -465095340, 170), $x);
      };
      $u_ = ((dynamic $t126, dynamic $param) : dynamic ==> {
         return $t126->history;
       })($window, $t_);
      $v_ = ((dynamic $t127, dynamic $param) : dynamic ==> {
         return $t127->pushState;
       })($u_, $s_);
      return $call1($Js_of_ocaml_Js[6][5], $v_);
    };
    $hasPlaceholder = (dynamic $param) : dynamic ==> {
      $i = $createInput(0, 0, $document);
      $q_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 989033331, 171), $x);
      };
      $r_ = ((dynamic $t128, dynamic $param) : dynamic ==> {
         return $t128->placeholder;
       })($i, $q_);
      return $call1($Js_of_ocaml_Js[6][5], $r_);
    };
    $hasRequired = (dynamic $param) : dynamic ==> {
      $i = $createInput(0, 0, $document);
      $o_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 845320543, 172), $x);
      };
      $p_ = ((dynamic $t129, dynamic $param) : dynamic ==> {
         return $t129->required;
       })($i, $o_);
      return $call1($Js_of_ocaml_Js[6][5], $p_);
    };
    $overflow_limit = 2147483000 as dynamic;
    $setTimeout = (dynamic $callback, dynamic $d) : dynamic ==> {
      $loop = new Ref();
      $id = Vector{0, 0} as dynamic;
      $loop->contents = (dynamic $step, dynamic $param) : dynamic ==> {
        if (2147483000 < $step) {
          $k_ = $step - 2147483000;
          $step__0 = $overflow_limit;
          $remain = $k_;
        }
        else {$remain__0 = 0 as dynamic;$step__0 = $step;$remain = $remain__0;
        }
        $cb = $remain == 0
          ? $callback
          : ((dynamic $n_) : dynamic ==> {
           return $loop->contents($remain, $n_);
         });
        $l_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 735461151, 173), $x);
        };
        $m_ = $runtime["caml_js_wrap_callback"]($cb);
        $id[1] =
          Vector{
            0,
            ((dynamic $t132, dynamic $t130, dynamic $t131, dynamic $param) : dynamic ==> {return $t132->setTimeout($t130, $t131);
             })($window, $m_, $step__0, $l_)
          };
        return 0;
      };
      $loop->contents($d, 0);
      return $id;
    };
    $clearTimeout = (dynamic $id) : dynamic ==> {
      $i_ = $id[1];
      if ($i_) {
        $x = $i_[1];
        $id[1] = 0;
        $j_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 880135316, 174), $x);
        };
        return ((dynamic $t134, dynamic $t133, dynamic $param) : dynamic ==> {
           return $t134->clearTimeout($t133);
         })($window, $x, $j_);
      }
      return 0;
    };
    $js_array_of_collection = (dynamic $c) : dynamic ==> {
      return [].slice->call($c);
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
      $addEventListenerWithOptions,
      $addEventListener,
      $removeEventListener,
      $addMousewheelEventListenerWithOptions,
      $addMousewheelEventListener,
      $createCustomEvent,
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
      (dynamic $h_) : dynamic ==> {
        return $runtime["caml_js_html_entities"]($h_);
      },
      $onIE,
      $hasPushState,
      $hasPlaceholder,
      $hasRequired
    } as dynamic;
    
    return($Js_of_ocaml_Dom_html);

  }
  public static function getElementById_opt(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 3, $id);
  }
  public static function getElementById_exn(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 4, $id);
  }
  public static function getElementById_coerce(dynamic $id, dynamic $coerce): dynamic {
    return static::syncCall(__FUNCTION__, 5, $id, $coerce);
  }
  public static function getElementById(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 6, $id);
  }
  public static function location_origin(dynamic $loc): dynamic {
    return static::syncCall(__FUNCTION__, 7, $loc);
  }
  public static function eventRelatedTarget(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 14, $e);
  }
  public static function addMousewheelEventListenerWithOptions(dynamic $e, dynamic $capture, dynamic $once, dynamic $passive, dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 19, $e, $capture, $once, $passive, $h);
  }
  public static function addMousewheelEventListener(dynamic $e, dynamic $h, dynamic $capt): dynamic {
    return static::syncCall(__FUNCTION__, 20, $e, $h, $capt);
  }
  public static function buttonPressed(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 22, $ev);
  }
  public static function eventAbsolutePosition(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 23, $e);
  }
  public static function elementClientPosition(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 24, $e);
  }
  public static function getDocumentScroll(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 25, $param);
  }
  public static function createHtml(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 28, $doc);
  }
  public static function createHead(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 29, $doc);
  }
  public static function createLink(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 30, $doc);
  }
  public static function createTitle(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 31, $doc);
  }
  public static function createMeta(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 32, $doc);
  }
  public static function createBase(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 33, $doc);
  }
  public static function createStyle(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 34, $doc);
  }
  public static function createBody(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 35, $doc);
  }
  public static function createForm(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 36, $doc);
  }
  public static function createOptgroup(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 37, $doc);
  }
  public static function createOption(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 38, $doc);
  }
  public static function createSelect(dynamic $type, dynamic $name, dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 39, $type, $name, $doc);
  }
  public static function createInput(dynamic $type, dynamic $name, dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 40, $type, $name, $doc);
  }
  public static function createTextarea(dynamic $type, dynamic $name, dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 41, $type, $name, $doc);
  }
  public static function createButton(dynamic $type, dynamic $name, dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 42, $type, $name, $doc);
  }
  public static function createLabel(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 43, $doc);
  }
  public static function createFieldset(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 44, $doc);
  }
  public static function createLegend(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 45, $doc);
  }
  public static function createUl(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 46, $doc);
  }
  public static function createOl(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 47, $doc);
  }
  public static function createDl(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 48, $doc);
  }
  public static function createLi(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 49, $doc);
  }
  public static function createDiv(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 50, $doc);
  }
  public static function createEmbed(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 51, $doc);
  }
  public static function createP(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 52, $doc);
  }
  public static function createH1(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 53, $doc);
  }
  public static function createH2(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 54, $doc);
  }
  public static function createH3(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 55, $doc);
  }
  public static function createH4(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 56, $doc);
  }
  public static function createH5(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 57, $doc);
  }
  public static function createH6(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 58, $doc);
  }
  public static function createQ(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 59, $doc);
  }
  public static function createBlockquote(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 60, $doc);
  }
  public static function createPre(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 61, $doc);
  }
  public static function createBr(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 62, $doc);
  }
  public static function createHr(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 63, $doc);
  }
  public static function createIns(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 64, $doc);
  }
  public static function createDel(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 65, $doc);
  }
  public static function createA(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 66, $doc);
  }
  public static function createImg(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 67, $doc);
  }
  public static function createObject(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 68, $doc);
  }
  public static function createParam(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 69, $doc);
  }
  public static function createMap(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 70, $doc);
  }
  public static function createArea(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 71, $doc);
  }
  public static function createScript(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 72, $doc);
  }
  public static function createTable(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 73, $doc);
  }
  public static function createCaption(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 74, $doc);
  }
  public static function createCol(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 75, $doc);
  }
  public static function createColgroup(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 76, $doc);
  }
  public static function createThead(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 77, $doc);
  }
  public static function createTfoot(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 78, $doc);
  }
  public static function createTbody(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 79, $doc);
  }
  public static function createTr(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 80, $doc);
  }
  public static function createTh(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 81, $doc);
  }
  public static function createTd(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 82, $doc);
  }
  public static function createSub(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 83, $doc);
  }
  public static function createSup(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 84, $doc);
  }
  public static function createSpan(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 85, $doc);
  }
  public static function createTt(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 86, $doc);
  }
  public static function createI(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 87, $doc);
  }
  public static function createB(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 88, $doc);
  }
  public static function createBig(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 89, $doc);
  }
  public static function createSmall(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 90, $doc);
  }
  public static function createEm(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 91, $doc);
  }
  public static function createStrong(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 92, $doc);
  }
  public static function createCite(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 93, $doc);
  }
  public static function createDfn(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 94, $doc);
  }
  public static function createCode(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 95, $doc);
  }
  public static function createSamp(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 96, $doc);
  }
  public static function createKbd(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 97, $doc);
  }
  public static function createVar(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 98, $doc);
  }
  public static function createAbbr(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 99, $doc);
  }
  public static function createDd(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 100, $doc);
  }
  public static function createDt(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 101, $doc);
  }
  public static function createNoscript(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 102, $doc);
  }
  public static function createAddress(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 103, $doc);
  }
  public static function createFrameset(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 104, $doc);
  }
  public static function createFrame(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 105, $doc);
  }
  public static function createIframe(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 106, $doc);
  }
  public static function createAudio(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 107, $doc);
  }
  public static function createVideo(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 108, $doc);
  }
  public static function createCanvas(dynamic $doc): dynamic {
    return static::syncCall(__FUNCTION__, 110, $doc);
  }
  public static function element(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 111, $unnamed1);
  }
  public static function tagged(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 112, $e);
  }
  public static function opt_tagged(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 113, $e);
  }
  public static function taggedEvent(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 114, $ev);
  }
  public static function opt_taggedEvent(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 115, $ev);
  }
  public static function stopPropagation(dynamic $ev): dynamic {
    return static::syncCall(__FUNCTION__, 116, $ev);
  }
  public static function setTimeout(dynamic $callback, dynamic $d): dynamic {
    return static::syncCall(__FUNCTION__, 118, $callback, $d);
  }
  public static function clearTimeout(dynamic $id): dynamic {
    return static::syncCall(__FUNCTION__, 119, $id);
  }
  public static function js_array_of_collection(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 120, $c);
  }
  public static function hasPushState(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 124, $param);
  }
  public static function hasPlaceholder(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 125, $param);
  }
  public static function hasRequired(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 126, $param);
  }

}
/* Hashing disabled */
