/**
 * @flow strict
 * Js_of_ocaml__CSS
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_float_of_string = runtime["caml_float_of_string"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_string = runtime["caml_js_to_string"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var caml_list_of_js_array = runtime["caml_list_of_js_array"];
var string = runtime["caml_new_string"];
var caml_string_compare = runtime["caml_string_compare"];
var caml_string_notequal = runtime["caml_string_notequal"];
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

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var cst_is_not_a_valid_length__0 = string(" is not a valid length");
var cst_d_d_deg_grad_rad_turns = string(
  "^(\\d*(?:\\.\\d*))(deg|grad|rad|turns)$"
);
var cst_length_conversion_error__0 = string("length conversion error: ");
var cst_deg__0 = string("deg");
var cst_grad__0 = string("grad");
var cst_rad__0 = string("rad");
var cst_turns__0 = string("turns");
var cst_deg = string("deg");
var cst_grad = string("grad");
var cst_rad = string("rad");
var cst_turns = string("turns");
var cst_is_not_a_valid_length = string(" is not a valid length");
var cst_0__0 = string("0");
var cst_d_d_s_S = string("^(\\d*(?:\\.\\d*)?)\\s*(\\S*)$");
var cst_length_conversion_error = string("length conversion error: ");
var cst_pc__0 = string("pc");
var cst_ch__0 = string("ch");
var cst_cm__0 = string("cm");
var cst_em__0 = string("em");
var cst_ex__0 = string("ex");
var cst_gd__0 = string("gd");
var cst_in__0 = string("in");
var cst_mm__0 = string("mm");
var cst_pt__0 = string("pt");
var cst_px__0 = string("px");
var cst_rem__0 = string("rem");
var cst_vh__0 = string("vh");
var cst_vm__0 = string("vm");
var cst_vw__0 = string("vw");
var cst_0 = string("0");
var cst_em = string("em");
var cst_ex = string("ex");
var cst_px = string("px");
var cst_gd = string("gd");
var cst_rem = string("rem");
var cst_vw = string("vw");
var cst_vh = string("vh");
var cst_vm = string("vm");
var cst_ch = string("ch");
var cst_mm = string("mm");
var cst_cm = string("cm");
var cst_in = string("in");
var cst_pt = string("pt");
var cst_pc = string("pc");
var cst__0 = string("): ");
var cst_color_conversion_error__0 = string("color conversion error (");
var cst = string("): ");
var cst_color_conversion_error = string("color conversion error (");
var cst_is_not_a_valid_color__0 = string(" is not a valid color");
var cst_rgba_d_d_d_d_d = string(
  "(rgba?)\\((?:(\\d*),(\\d*),(\\d*)(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_rgba_d_d_d_d_d__0 = string(
  "(rgba?)\\((?:(\\d*)%,(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_hsla_d_d_d_d_d = string(
  "(hsla?)\\((?:(\\d*),(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_rgb = string("rgb");
var cst_rgba = string("rgba");
var cst_rgb__0 = string("rgb");
var cst_rgba__0 = string("rgba");
var cst_hsl = string("hsl");
var cst_hsla = string("hsla");
var cst_rgb_s_d_s_d_s_d = string("^rgb\\(\\s*\\d*,\\s*\\d*,\\s*\\d*\\)$");
var cst_rgb_s_d_s_d_s_d__0 = string("^rgb\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%\\)$"
);
var cst_rgba_s_d_s_d_s_d_d_d = string(
  "^rgba\\(\\s*\\d*,\\s*\\d*,\\s*\\d*,\\d*\\.?\\d*\\)$"
);
var cst_rgba_s_d_s_d_s_d_d_d__0 = string(
  "^rgba\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)$"
);
var cst_hsl_s_d_s_d_s_d = string("^hsl\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%\\)$");
var cst_hsla_s_d_s_d_s_d_d_d = string(
  "^hsla\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)$"
);
var cst_is_not_a_valid_color = string(" is not a valid color");
var cst_is_out_of_valid_range = string(" is out of valid range");
var partial = [8,[0,0,0],0,0,[12,41,0]];
var partial__0 = [12,41,0];
var partial__1 = [0,0,0];
var cst_lightgrey__0 = string("lightgrey");
var cst_darkslategray__0 = string("darkslategray");
var cst_cornsilk__0 = string("cornsilk");
var cst_blue__0 = string("blue");
var cst_aliceblue__0 = string("aliceblue");
var cst_antiquewhite__0 = string("antiquewhite");
var cst_aqua__0 = string("aqua");
var cst_aquamarine__0 = string("aquamarine");
var cst_azure__0 = string("azure");
var cst_beige__0 = string("beige");
var cst_bisque__0 = string("bisque");
var cst_black__0 = string("black");
var cst_blanchedalmond__0 = string("blanchedalmond");
var cst_blueviolet__0 = string("blueviolet");
var cst_brown__0 = string("brown");
var cst_burlywood__0 = string("burlywood");
var cst_cadetblue__0 = string("cadetblue");
var cst_chartreuse__0 = string("chartreuse");
var cst_chocolate__0 = string("chocolate");
var cst_coral__0 = string("coral");
var cst_cornflowerblue__0 = string("cornflowerblue");
var cst_darkkhaki__0 = string("darkkhaki");
var cst_crimson__0 = string("crimson");
var cst_cyan__0 = string("cyan");
var cst_darkblue__0 = string("darkblue");
var cst_darkcyan__0 = string("darkcyan");
var cst_darkgoldenrod__0 = string("darkgoldenrod");
var cst_darkgray__0 = string("darkgray");
var cst_darkgreen__0 = string("darkgreen");
var cst_darkgrey__0 = string("darkgrey");
var cst_darkmagenta__0 = string("darkmagenta");
var cst_darkolivegreen__0 = string("darkolivegreen");
var cst_darkorange__0 = string("darkorange");
var cst_darkorchid__0 = string("darkorchid");
var cst_darkred__0 = string("darkred");
var cst_darksalmon__0 = string("darksalmon");
var cst_darkseagreen__0 = string("darkseagreen");
var cst_darkslateblue__0 = string("darkslateblue");
var cst_greenyellow__0 = string("greenyellow");
var cst_floralwhite__0 = string("floralwhite");
var cst_darkslategrey__0 = string("darkslategrey");
var cst_darkturquoise__0 = string("darkturquoise");
var cst_darkviolet__0 = string("darkviolet");
var cst_deeppink__0 = string("deeppink");
var cst_deepskyblue__0 = string("deepskyblue");
var cst_dimgray__0 = string("dimgray");
var cst_dimgrey__0 = string("dimgrey");
var cst_dodgerblue__0 = string("dodgerblue");
var cst_firebrick__0 = string("firebrick");
var cst_forestgreen__0 = string("forestgreen");
var cst_fuchsia__0 = string("fuchsia");
var cst_gainsboro__0 = string("gainsboro");
var cst_ghostwhite__0 = string("ghostwhite");
var cst_gold__0 = string("gold");
var cst_goldenrod__0 = string("goldenrod");
var cst_gray__0 = string("gray");
var cst_green__0 = string("green");
var cst_lavenderblush__0 = string("lavenderblush");
var cst_grey__0 = string("grey");
var cst_honeydew__0 = string("honeydew");
var cst_hotpink__0 = string("hotpink");
var cst_indianred__0 = string("indianred");
var cst_indigo__0 = string("indigo");
var cst_ivory__0 = string("ivory");
var cst_khaki__0 = string("khaki");
var cst_lavender__0 = string("lavender");
var cst_lawngreen__0 = string("lawngreen");
var cst_lemonchiffon__0 = string("lemonchiffon");
var cst_lightblue__0 = string("lightblue");
var cst_lightcoral__0 = string("lightcoral");
var cst_lightcyan__0 = string("lightcyan");
var cst_lightgoldenrodyellow__0 = string("lightgoldenrodyellow");
var cst_lightgray__0 = string("lightgray");
var cst_lightgreen__0 = string("lightgreen");
var cst_paleturquoise__0 = string("paleturquoise");
var cst_mediumslateblue__0 = string("mediumslateblue");
var cst_limegreen__0 = string("limegreen");
var cst_lightpink__0 = string("lightpink");
var cst_lightsalmon__0 = string("lightsalmon");
var cst_lightseagreen__0 = string("lightseagreen");
var cst_lightskyblue__0 = string("lightskyblue");
var cst_lightslategray__0 = string("lightslategray");
var cst_lightslategrey__0 = string("lightslategrey");
var cst_lightsteelblue__0 = string("lightsteelblue");
var cst_lightyellow__0 = string("lightyellow");
var cst_lime__0 = string("lime");
var cst_linen__0 = string("linen");
var cst_magenta__0 = string("magenta");
var cst_maroon__0 = string("maroon");
var cst_mediumaquamarine__0 = string("mediumaquamarine");
var cst_mediumblue__0 = string("mediumblue");
var cst_mediumorchid__0 = string("mediumorchid");
var cst_mediumpurple__0 = string("mediumpurple");
var cst_mediumseagreen__0 = string("mediumseagreen");
var cst_navy__0 = string("navy");
var cst_mediumspringgreen__0 = string("mediumspringgreen");
var cst_mediumturquoise__0 = string("mediumturquoise");
var cst_mediumvioletred__0 = string("mediumvioletred");
var cst_midnightblue__0 = string("midnightblue");
var cst_mintcream__0 = string("mintcream");
var cst_mistyrose__0 = string("mistyrose");
var cst_moccasin__0 = string("moccasin");
var cst_navajowhite__0 = string("navajowhite");
var cst_oldlace__0 = string("oldlace");
var cst_olive__0 = string("olive");
var cst_olivedrab__0 = string("olivedrab");
var cst_orange__0 = string("orange");
var cst_orangered__0 = string("orangered");
var cst_orchid__0 = string("orchid");
var cst_palegoldenrod__0 = string("palegoldenrod");
var cst_palegreen__0 = string("palegreen");
var cst_skyblue__0 = string("skyblue");
var cst_rosybrown__0 = string("rosybrown");
var cst_palevioletred__0 = string("palevioletred");
var cst_papayawhip__0 = string("papayawhip");
var cst_peachpuff__0 = string("peachpuff");
var cst_peru__0 = string("peru");
var cst_pink__0 = string("pink");
var cst_plum__0 = string("plum");
var cst_powderblue__0 = string("powderblue");
var cst_purple__0 = string("purple");
var cst_red__0 = string("red");
var cst_royalblue__0 = string("royalblue");
var cst_saddlebrown__0 = string("saddlebrown");
var cst_salmon__0 = string("salmon");
var cst_sandybrown__0 = string("sandybrown");
var cst_seagreen__0 = string("seagreen");
var cst_seashell__0 = string("seashell");
var cst_sienna__0 = string("sienna");
var cst_silver__0 = string("silver");
var cst_thistle__0 = string("thistle");
var cst_slateblue__0 = string("slateblue");
var cst_slategray__0 = string("slategray");
var cst_slategrey__0 = string("slategrey");
var cst_snow__0 = string("snow");
var cst_springgreen__0 = string("springgreen");
var cst_steelblue__0 = string("steelblue");
var cst_tan__0 = string("tan");
var cst_teal__0 = string("teal");
var cst_tomato__0 = string("tomato");
var cst_turquoise__0 = string("turquoise");
var cst_violet__0 = string("violet");
var cst_wheat__0 = string("wheat");
var cst_white__0 = string("white");
var cst_whitesmoke__0 = string("whitesmoke");
var cst_yellow__0 = string("yellow");
var cst_yellowgreen__0 = string("yellowgreen");
var cst_is_not_a_valid_color_name = string(" is not a valid color name");
var cst_aliceblue = string("aliceblue");
var cst_antiquewhite = string("antiquewhite");
var cst_aqua = string("aqua");
var cst_aquamarine = string("aquamarine");
var cst_azure = string("azure");
var cst_beige = string("beige");
var cst_bisque = string("bisque");
var cst_black = string("black");
var cst_blanchedalmond = string("blanchedalmond");
var cst_blue = string("blue");
var cst_blueviolet = string("blueviolet");
var cst_brown = string("brown");
var cst_burlywood = string("burlywood");
var cst_cadetblue = string("cadetblue");
var cst_chartreuse = string("chartreuse");
var cst_chocolate = string("chocolate");
var cst_coral = string("coral");
var cst_cornflowerblue = string("cornflowerblue");
var cst_cornsilk = string("cornsilk");
var cst_crimson = string("crimson");
var cst_cyan = string("cyan");
var cst_darkblue = string("darkblue");
var cst_darkcyan = string("darkcyan");
var cst_darkgoldenrod = string("darkgoldenrod");
var cst_darkgray = string("darkgray");
var cst_darkgreen = string("darkgreen");
var cst_darkgrey = string("darkgrey");
var cst_darkkhaki = string("darkkhaki");
var cst_darkmagenta = string("darkmagenta");
var cst_darkolivegreen = string("darkolivegreen");
var cst_darkorange = string("darkorange");
var cst_darkorchid = string("darkorchid");
var cst_darkred = string("darkred");
var cst_darksalmon = string("darksalmon");
var cst_darkseagreen = string("darkseagreen");
var cst_darkslateblue = string("darkslateblue");
var cst_darkslategray = string("darkslategray");
var cst_darkslategrey = string("darkslategrey");
var cst_darkturquoise = string("darkturquoise");
var cst_darkviolet = string("darkviolet");
var cst_deeppink = string("deeppink");
var cst_deepskyblue = string("deepskyblue");
var cst_dimgray = string("dimgray");
var cst_dimgrey = string("dimgrey");
var cst_dodgerblue = string("dodgerblue");
var cst_firebrick = string("firebrick");
var cst_floralwhite = string("floralwhite");
var cst_forestgreen = string("forestgreen");
var cst_fuchsia = string("fuchsia");
var cst_gainsboro = string("gainsboro");
var cst_ghostwhite = string("ghostwhite");
var cst_gold = string("gold");
var cst_goldenrod = string("goldenrod");
var cst_gray = string("gray");
var cst_grey = string("grey");
var cst_green = string("green");
var cst_greenyellow = string("greenyellow");
var cst_honeydew = string("honeydew");
var cst_hotpink = string("hotpink");
var cst_indianred = string("indianred");
var cst_indigo = string("indigo");
var cst_ivory = string("ivory");
var cst_khaki = string("khaki");
var cst_lavender = string("lavender");
var cst_lavenderblush = string("lavenderblush");
var cst_lawngreen = string("lawngreen");
var cst_lemonchiffon = string("lemonchiffon");
var cst_lightblue = string("lightblue");
var cst_lightcoral = string("lightcoral");
var cst_lightcyan = string("lightcyan");
var cst_lightgoldenrodyellow = string("lightgoldenrodyellow");
var cst_lightgray = string("lightgray");
var cst_lightgreen = string("lightgreen");
var cst_lightgrey = string("lightgrey");
var cst_lightpink = string("lightpink");
var cst_lightsalmon = string("lightsalmon");
var cst_lightseagreen = string("lightseagreen");
var cst_lightskyblue = string("lightskyblue");
var cst_lightslategray = string("lightslategray");
var cst_lightslategrey = string("lightslategrey");
var cst_lightsteelblue = string("lightsteelblue");
var cst_lightyellow = string("lightyellow");
var cst_lime = string("lime");
var cst_limegreen = string("limegreen");
var cst_linen = string("linen");
var cst_magenta = string("magenta");
var cst_maroon = string("maroon");
var cst_mediumaquamarine = string("mediumaquamarine");
var cst_mediumblue = string("mediumblue");
var cst_mediumorchid = string("mediumorchid");
var cst_mediumpurple = string("mediumpurple");
var cst_mediumseagreen = string("mediumseagreen");
var cst_mediumslateblue = string("mediumslateblue");
var cst_mediumspringgreen = string("mediumspringgreen");
var cst_mediumturquoise = string("mediumturquoise");
var cst_mediumvioletred = string("mediumvioletred");
var cst_midnightblue = string("midnightblue");
var cst_mintcream = string("mintcream");
var cst_mistyrose = string("mistyrose");
var cst_moccasin = string("moccasin");
var cst_navajowhite = string("navajowhite");
var cst_navy = string("navy");
var cst_oldlace = string("oldlace");
var cst_olive = string("olive");
var cst_olivedrab = string("olivedrab");
var cst_orange = string("orange");
var cst_orangered = string("orangered");
var cst_orchid = string("orchid");
var cst_palegoldenrod = string("palegoldenrod");
var cst_palegreen = string("palegreen");
var cst_paleturquoise = string("paleturquoise");
var cst_palevioletred = string("palevioletred");
var cst_papayawhip = string("papayawhip");
var cst_peachpuff = string("peachpuff");
var cst_peru = string("peru");
var cst_pink = string("pink");
var cst_plum = string("plum");
var cst_powderblue = string("powderblue");
var cst_purple = string("purple");
var cst_red = string("red");
var cst_rosybrown = string("rosybrown");
var cst_royalblue = string("royalblue");
var cst_saddlebrown = string("saddlebrown");
var cst_salmon = string("salmon");
var cst_sandybrown = string("sandybrown");
var cst_seagreen = string("seagreen");
var cst_seashell = string("seashell");
var cst_sienna = string("sienna");
var cst_silver = string("silver");
var cst_skyblue = string("skyblue");
var cst_slateblue = string("slateblue");
var cst_slategray = string("slategray");
var cst_slategrey = string("slategrey");
var cst_snow = string("snow");
var cst_springgreen = string("springgreen");
var cst_steelblue = string("steelblue");
var cst_tan = string("tan");
var cst_teal = string("teal");
var cst_thistle = string("thistle");
var cst_tomato = string("tomato");
var cst_turquoise = string("turquoise");
var cst_violet = string("violet");
var cst_wheat = string("wheat");
var cst_white = string("white");
var cst_whitesmoke = string("whitesmoke");
var cst_yellow = string("yellow");
var cst_yellowgreen = string("yellowgreen");
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var Js_of_ocaml_Regexp = require("./Js_of_ocaml__Regexp.js");
var Stdlib_printf = require("../stdlib.cma.js/Stdlib__printf.js");
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Stdlib_list = require("../stdlib.cma.js/Stdlib__list.js");
var b2_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var b3_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var b4_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var b5_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bO_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bP_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bQ_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bR_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bS_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bT_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bU_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bV_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bW_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bX_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bY_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bZ_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var b0_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var b1_ = [0,[8,[0,0,0],0,0,[2,0,0]],string("%f%s")];
var bN_ = caml_list_of_js_array(
  [
    string("aliceblue"),
    string("antiquewhite"),
    string("aqua"),
    string("aquamarine"),
    string("azure"),
    string("beige"),
    string("bisque"),
    string("black"),
    string("blanchedalmond"),
    string("blue"),
    string("blueviolet"),
    string("brown"),
    string("burlywood"),
    string("cadetblue"),
    string("chartreuse"),
    string("chocolate"),
    string("coral"),
    string("cornflowerblue"),
    string("cornsilk"),
    string("crimson"),
    string("cyan"),
    string("darkblue"),
    string("darkcyan"),
    string("darkgoldenrod"),
    string("darkgray"),
    string("darkgreen"),
    string("darkgrey"),
    string("darkkhaki"),
    string("darkmagenta"),
    string("darkolivegreen"),
    string("darkorange"),
    string("darkorchid"),
    string("darkred"),
    string("darksalmon"),
    string("darkseagreen"),
    string("darkslateblue"),
    string("darkslategray"),
    string("darkslategrey"),
    string("darkturquoise"),
    string("darkviolet"),
    string("deeppink"),
    string("deepskyblue"),
    string("dimgray"),
    string("dimgrey"),
    string("dodgerblue"),
    string("firebrick"),
    string("floralwhite"),
    string("forestgreen"),
    string("fuchsia"),
    string("gainsboro"),
    string("ghostwhite"),
    string("gold"),
    string("goldenrod"),
    string("gray"),
    string("green"),
    string("greenyellow"),
    string("grey"),
    string("honeydew"),
    string("hotpink"),
    string("indianred"),
    string("indigo"),
    string("ivory"),
    string("khaki"),
    string("lavender"),
    string("lavenderblush"),
    string("lawngreen"),
    string("lemonchiffon"),
    string("lightblue"),
    string("lightcoral"),
    string("lightcyan"),
    string("lightgoldenrodyellow"),
    string("lightgray"),
    string("lightgreen"),
    string("lightgrey"),
    string("lightpink"),
    string("lightsalmon"),
    string("lightseagreen"),
    string("lightskyblue"),
    string("lightslategray"),
    string("lightslategrey"),
    string("lightsteelblue"),
    string("lightyellow"),
    string("lime"),
    string("limegreen"),
    string("linen"),
    string("magenta"),
    string("maroon"),
    string("mediumaquamarine"),
    string("mediumblue"),
    string("mediumorchid"),
    string("mediumpurple"),
    string("mediumseagreen"),
    string("mediumslateblue"),
    string("mediumspringgreen"),
    string("mediumturquoise"),
    string("mediumvioletred"),
    string("midnightblue"),
    string("mintcream"),
    string("mistyrose"),
    string("moccasin"),
    string("navajowhite"),
    string("navy"),
    string("oldlace"),
    string("olive"),
    string("olivedrab"),
    string("orange"),
    string("orangered"),
    string("orchid"),
    string("palegoldenrod"),
    string("palegreen"),
    string("paleturquoise"),
    string("palevioletred"),
    string("papayawhip"),
    string("peachpuff"),
    string("peru"),
    string("pink"),
    string("plum"),
    string("powderblue"),
    string("purple"),
    string("red"),
    string("rosybrown"),
    string("royalblue"),
    string("saddlebrown"),
    string("salmon"),
    string("sandybrown"),
    string("seagreen"),
    string("seashell"),
    string("sienna"),
    string("silver"),
    string("skyblue"),
    string("slateblue"),
    string("slategray"),
    string("slategrey"),
    string("snow"),
    string("springgreen"),
    string("steelblue"),
    string("tan"),
    string("teal"),
    string("thistle"),
    string("tomato"),
    string("turquoise"),
    string("violet"),
    string("wheat"),
    string("white"),
    string("whitesmoke"),
    string("yellow"),
    string("yellowgreen")
  ]
);
var bM_ = [
  0,
  [12,35,[4,8,[0,2,2],0,[4,8,[0,2,2],0,[4,8,[0,2,2],0,0]]]],
  string("#%02X%02X%02X")
];
var bG_ = [
  0,
  [11,string("rgb("),[4,0,0,0,[12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,41,0]]]]]]],
  string("rgb(%d,%d,%d)")
];
var bH_ = [
  0,
  [
    11,
    string("rgb("),
    [
      4,
      0,
      0,
      0,
      [12,37,[12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,41,0]]]]]]]]
    ]
  ],
  string("rgb(%d%%,%d%%,%d%%)")
];
var bI_ = [
  0,
  [
    11,
    string("rgba("),
    [
      4,
      0,
      0,
      0,
      [12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,44,[8,[0,0,0],0,0,[12,41,0]]]]]]]
    ]
  ],
  string("rgba(%d,%d,%d,%f)")
];
var bJ_ = [
  0,
  [
    11,
    string("rgba("),
    [
      4,
      0,
      0,
      0,
      [
        12,
        37,
        [12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,44,partial]]]]]]]
      ]
    ]
  ],
  string("rgba(%d%%,%d%%,%d%%,%f)")
];
var bK_ = [
  0,
  [
    11,
    string("hsl("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,41,0]]]]]]]]
  ],
  string("hsl(%d,%d%%,%d%%)")
];
var bL_ = [
  0,
  [
    11,
    string("hsla("),
    [
      4,
      0,
      0,
      0,
      [
        12,
        44,
        [
          4,
          0,
          0,
          0,
          [
            12,
            37,
            [12,44,[4,0,0,0,[12,37,[12,44,[8,partial__1,0,0,partial__0]]]]]
          ]
        ]
      ]
    ]
  ],
  string("hsla(%d,%d%%,%d%%,%f)")
];
var a_ = [0,240,248,255];
var b_ = [0,250,235,215];
var c_ = [0,0,255,255];
var d_ = [0,127,255,212];
var e_ = [0,240,255,255];
var f_ = [0,245,245,220];
var g_ = [0,255,228,196];
var h_ = [0,0,0,0];
var i_ = [0,255,235,205];
var j_ = [0,0,0,255];
var k_ = [0,138,43,226];
var l_ = [0,165,42,42];
var m_ = [0,222,184,135];
var n_ = [0,95,158,160];
var o_ = [0,127,255,0];
var p_ = [0,210,105,30];
var q_ = [0,255,127,80];
var r_ = [0,100,149,237];
var s_ = [0,255,248,220];
var t_ = [0,220,20,60];
var u_ = [0,0,255,255];
var v_ = [0,0,0,139];
var w_ = [0,0,139,139];
var x_ = [0,184,134,11];
var y_ = [0,169,169,169];
var z_ = [0,0,100,0];
var A_ = [0,169,169,169];
var B_ = [0,189,183,107];
var C_ = [0,139,0,139];
var D_ = [0,85,107,47];
var E_ = [0,255,140,0];
var F_ = [0,153,50,204];
var G_ = [0,139,0,0];
var H_ = [0,233,150,122];
var I_ = [0,143,188,143];
var J_ = [0,72,61,139];
var K_ = [0,47,79,79];
var L_ = [0,47,79,79];
var M_ = [0,0,206,209];
var N_ = [0,148,0,211];
var O_ = [0,255,20,147];
var P_ = [0,0,191,255];
var Q_ = [0,105,105,105];
var R_ = [0,105,105,105];
var S_ = [0,30,144,255];
var T_ = [0,178,34,34];
var U_ = [0,255,250,240];
var V_ = [0,34,139,34];
var W_ = [0,255,0,255];
var X_ = [0,220,220,220];
var Y_ = [0,248,248,255];
var Z_ = [0,255,215,0];
var aa_ = [0,218,165,32];
var ab_ = [0,128,128,128];
var ac_ = [0,128,128,128];
var ad_ = [0,0,128,0];
var ae_ = [0,173,255,47];
var af_ = [0,240,255,240];
var ag_ = [0,255,105,180];
var ah_ = [0,205,92,92];
var ai_ = [0,75,0,130];
var aj_ = [0,255,255,240];
var ak_ = [0,240,230,140];
var al_ = [0,230,230,250];
var am_ = [0,255,240,245];
var an_ = [0,124,252,0];
var ao_ = [0,255,250,205];
var ap_ = [0,173,216,230];
var aq_ = [0,240,128,128];
var ar_ = [0,224,255,255];
var as_ = [0,250,250,210];
var at_ = [0,211,211,211];
var au_ = [0,144,238,144];
var av_ = [0,211,211,211];
var aw_ = [0,255,182,193];
var ax_ = [0,255,160,122];
var ay_ = [0,32,178,170];
var az_ = [0,135,206,250];
var aA_ = [0,119,136,153];
var aB_ = [0,119,136,153];
var aC_ = [0,176,196,222];
var aD_ = [0,255,255,224];
var aE_ = [0,0,255,0];
var aF_ = [0,50,205,50];
var aG_ = [0,250,240,230];
var aH_ = [0,255,0,255];
var aI_ = [0,128,0,0];
var aJ_ = [0,102,205,170];
var aK_ = [0,0,0,205];
var aL_ = [0,186,85,211];
var aM_ = [0,147,112,219];
var aN_ = [0,60,179,113];
var aO_ = [0,123,104,238];
var aP_ = [0,0,250,154];
var aQ_ = [0,72,209,204];
var aR_ = [0,199,21,133];
var aS_ = [0,25,25,112];
var aT_ = [0,245,255,250];
var aU_ = [0,255,228,225];
var aV_ = [0,255,228,181];
var aW_ = [0,255,222,173];
var aX_ = [0,0,0,128];
var aY_ = [0,253,245,230];
var aZ_ = [0,128,128,0];
var a0_ = [0,107,142,35];
var a1_ = [0,255,165,0];
var a2_ = [0,255,69,0];
var a3_ = [0,218,112,214];
var a4_ = [0,238,232,170];
var a5_ = [0,152,251,152];
var a6_ = [0,175,238,238];
var a7_ = [0,219,112,147];
var a8_ = [0,255,239,213];
var a9_ = [0,255,218,185];
var a__ = [0,205,133,63];
var ba_ = [0,255,192,203];
var bb_ = [0,221,160,221];
var bc_ = [0,176,224,230];
var bd_ = [0,128,0,128];
var be_ = [0,255,0,0];
var bf_ = [0,188,143,143];
var bg_ = [0,65,105,225];
var bh_ = [0,139,69,19];
var bi_ = [0,250,128,114];
var bj_ = [0,244,164,96];
var bk_ = [0,46,139,87];
var bl_ = [0,255,245,238];
var bm_ = [0,160,82,45];
var bn_ = [0,192,192,192];
var bo_ = [0,135,206,235];
var bp_ = [0,106,90,205];
var bq_ = [0,112,128,144];
var br_ = [0,112,128,144];
var bs_ = [0,255,250,250];
var bt_ = [0,0,255,127];
var bu_ = [0,70,130,180];
var bv_ = [0,210,180,140];
var bw_ = [0,0,128,128];
var bx_ = [0,216,191,216];
var by_ = [0,255,99,71];
var bz_ = [0,64,224,208];
var bA_ = [0,238,130,238];
var bB_ = [0,245,222,179];
var bC_ = [0,255,255,255];
var bD_ = [0,245,245,245];
var bE_ = [0,255,255,0];
var bF_ = [0,154,205,50];

function string_of_name(param) {
  var dc_ = param;
  if (74 <= dc_) {
    if (111 <= dc_) {
      switch (dc_) {
        case 111:
          return cst_palevioletred;
        case 112:
          return cst_papayawhip;
        case 113:
          return cst_peachpuff;
        case 114:
          return cst_peru;
        case 115:
          return cst_pink;
        case 116:
          return cst_plum;
        case 117:
          return cst_powderblue;
        case 118:
          return cst_purple;
        case 119:
          return cst_red;
        case 120:
          return cst_rosybrown;
        case 121:
          return cst_royalblue;
        case 122:
          return cst_saddlebrown;
        case 123:
          return cst_salmon;
        case 124:
          return cst_sandybrown;
        case 125:
          return cst_seagreen;
        case 126:
          return cst_seashell;
        case 127:
          return cst_sienna;
        case 128:
          return cst_silver;
        case 129:
          return cst_skyblue;
        case 130:
          return cst_slateblue;
        case 131:
          return cst_slategray;
        case 132:
          return cst_slategrey;
        case 133:
          return cst_snow;
        case 134:
          return cst_springgreen;
        case 135:
          return cst_steelblue;
        case 136:
          return cst_tan;
        case 137:
          return cst_teal;
        case 138:
          return cst_thistle;
        case 139:
          return cst_tomato;
        case 140:
          return cst_turquoise;
        case 141:
          return cst_violet;
        case 142:
          return cst_wheat;
        case 143:
          return cst_white;
        case 144:
          return cst_whitesmoke;
        case 145:
          return cst_yellow;
        default:
          return cst_yellowgreen
        }
    }
    switch (dc_) {
      case 74:
        return cst_lightpink;
      case 75:
        return cst_lightsalmon;
      case 76:
        return cst_lightseagreen;
      case 77:
        return cst_lightskyblue;
      case 78:
        return cst_lightslategray;
      case 79:
        return cst_lightslategrey;
      case 80:
        return cst_lightsteelblue;
      case 81:
        return cst_lightyellow;
      case 82:
        return cst_lime;
      case 83:
        return cst_limegreen;
      case 84:
        return cst_linen;
      case 85:
        return cst_magenta;
      case 86:
        return cst_maroon;
      case 87:
        return cst_mediumaquamarine;
      case 88:
        return cst_mediumblue;
      case 89:
        return cst_mediumorchid;
      case 90:
        return cst_mediumpurple;
      case 91:
        return cst_mediumseagreen;
      case 92:
        return cst_mediumslateblue;
      case 93:
        return cst_mediumspringgreen;
      case 94:
        return cst_mediumturquoise;
      case 95:
        return cst_mediumvioletred;
      case 96:
        return cst_midnightblue;
      case 97:
        return cst_mintcream;
      case 98:
        return cst_mistyrose;
      case 99:
        return cst_moccasin;
      case 100:
        return cst_navajowhite;
      case 101:
        return cst_navy;
      case 102:
        return cst_oldlace;
      case 103:
        return cst_olive;
      case 104:
        return cst_olivedrab;
      case 105:
        return cst_orange;
      case 106:
        return cst_orangered;
      case 107:
        return cst_orchid;
      case 108:
        return cst_palegoldenrod;
      case 109:
        return cst_palegreen;
      default:
        return cst_paleturquoise
      }
  }
  if (37 <= dc_) {
    switch (dc_) {
      case 37:
        return cst_darkslategrey;
      case 38:
        return cst_darkturquoise;
      case 39:
        return cst_darkviolet;
      case 40:
        return cst_deeppink;
      case 41:
        return cst_deepskyblue;
      case 42:
        return cst_dimgray;
      case 43:
        return cst_dimgrey;
      case 44:
        return cst_dodgerblue;
      case 45:
        return cst_firebrick;
      case 46:
        return cst_floralwhite;
      case 47:
        return cst_forestgreen;
      case 48:
        return cst_fuchsia;
      case 49:
        return cst_gainsboro;
      case 50:
        return cst_ghostwhite;
      case 51:
        return cst_gold;
      case 52:
        return cst_goldenrod;
      case 53:
        return cst_gray;
      case 54:
        return cst_grey;
      case 55:
        return cst_green;
      case 56:
        return cst_greenyellow;
      case 57:
        return cst_honeydew;
      case 58:
        return cst_hotpink;
      case 59:
        return cst_indianred;
      case 60:
        return cst_indigo;
      case 61:
        return cst_ivory;
      case 62:
        return cst_khaki;
      case 63:
        return cst_lavender;
      case 64:
        return cst_lavenderblush;
      case 65:
        return cst_lawngreen;
      case 66:
        return cst_lemonchiffon;
      case 67:
        return cst_lightblue;
      case 68:
        return cst_lightcoral;
      case 69:
        return cst_lightcyan;
      case 70:
        return cst_lightgoldenrodyellow;
      case 71:
        return cst_lightgray;
      case 72:
        return cst_lightgreen;
      default:
        return cst_lightgrey
      }
  }
  switch (dc_) {
    case 0:
      return cst_aliceblue;
    case 1:
      return cst_antiquewhite;
    case 2:
      return cst_aqua;
    case 3:
      return cst_aquamarine;
    case 4:
      return cst_azure;
    case 5:
      return cst_beige;
    case 6:
      return cst_bisque;
    case 7:
      return cst_black;
    case 8:
      return cst_blanchedalmond;
    case 9:
      return cst_blue;
    case 10:
      return cst_blueviolet;
    case 11:
      return cst_brown;
    case 12:
      return cst_burlywood;
    case 13:
      return cst_cadetblue;
    case 14:
      return cst_chartreuse;
    case 15:
      return cst_chocolate;
    case 16:
      return cst_coral;
    case 17:
      return cst_cornflowerblue;
    case 18:
      return cst_cornsilk;
    case 19:
      return cst_crimson;
    case 20:
      return cst_cyan;
    case 21:
      return cst_darkblue;
    case 22:
      return cst_darkcyan;
    case 23:
      return cst_darkgoldenrod;
    case 24:
      return cst_darkgray;
    case 25:
      return cst_darkgreen;
    case 26:
      return cst_darkgrey;
    case 27:
      return cst_darkkhaki;
    case 28:
      return cst_darkmagenta;
    case 29:
      return cst_darkolivegreen;
    case 30:
      return cst_darkorange;
    case 31:
      return cst_darkorchid;
    case 32:
      return cst_darkred;
    case 33:
      return cst_darksalmon;
    case 34:
      return cst_darkseagreen;
    case 35:
      return cst_darkslateblue;
    default:
      return cst_darkslategray
    }
}

function name_of_string(s) {
  var switch__0 = caml_string_compare(s, cst_lightgrey__0);
  if (0 <= switch__0) {
    if (! (0 < switch__0)) {return 73;}
    var switch__1 = caml_string_compare(s, cst_paleturquoise__0);
    if (0 <= switch__1) {
      if (! (0 < switch__1)) {return 110;}
      var switch__2 = caml_string_compare(s, cst_skyblue__0);
      if (0 <= switch__2) {
        if (! (0 < switch__2)) {return 129;}
        var switch__3 = caml_string_compare(s, cst_thistle__0);
        if (0 <= switch__3) {
          if (! (0 < switch__3)) {return 138;}
          if (! caml_string_notequal(s, cst_tomato__0)) {return 139;}
          if (! caml_string_notequal(s, cst_turquoise__0)) {return 140;}
          if (! caml_string_notequal(s, cst_violet__0)) {return 141;}
          if (! caml_string_notequal(s, cst_wheat__0)) {return 142;}
          if (! caml_string_notequal(s, cst_white__0)) {return 143;}
          if (! caml_string_notequal(s, cst_whitesmoke__0)) {return 144;}
          if (! caml_string_notequal(s, cst_yellow__0)) {return 145;}
          if (! caml_string_notequal(s, cst_yellowgreen__0)) {return 146;}
        }
        else {
          if (! caml_string_notequal(s, cst_slateblue__0)) {return 130;}
          if (! caml_string_notequal(s, cst_slategray__0)) {return 131;}
          if (! caml_string_notequal(s, cst_slategrey__0)) {return 132;}
          if (! caml_string_notequal(s, cst_snow__0)) {return 133;}
          if (! caml_string_notequal(s, cst_springgreen__0)) {return 134;}
          if (! caml_string_notequal(s, cst_steelblue__0)) {return 135;}
          if (! caml_string_notequal(s, cst_tan__0)) {return 136;}
          if (! caml_string_notequal(s, cst_teal__0)) {return 137;}
        }
      }
      else {
        var switch__4 = caml_string_compare(s, cst_rosybrown__0);
        if (0 <= switch__4) {
          if (! (0 < switch__4)) {return 120;}
          if (! caml_string_notequal(s, cst_royalblue__0)) {return 121;}
          if (! caml_string_notequal(s, cst_saddlebrown__0)) {return 122;}
          if (! caml_string_notequal(s, cst_salmon__0)) {return 123;}
          if (! caml_string_notequal(s, cst_sandybrown__0)) {return 124;}
          if (! caml_string_notequal(s, cst_seagreen__0)) {return 125;}
          if (! caml_string_notequal(s, cst_seashell__0)) {return 126;}
          if (! caml_string_notequal(s, cst_sienna__0)) {return 127;}
          if (! caml_string_notequal(s, cst_silver__0)) {return 128;}
        }
        else {
          if (! caml_string_notequal(s, cst_palevioletred__0)) {return 111;}
          if (! caml_string_notequal(s, cst_papayawhip__0)) {return 112;}
          if (! caml_string_notequal(s, cst_peachpuff__0)) {return 113;}
          if (! caml_string_notequal(s, cst_peru__0)) {return 114;}
          if (! caml_string_notequal(s, cst_pink__0)) {return 115;}
          if (! caml_string_notequal(s, cst_plum__0)) {return 116;}
          if (! caml_string_notequal(s, cst_powderblue__0)) {return 117;}
          if (! caml_string_notequal(s, cst_purple__0)) {return 118;}
          if (! caml_string_notequal(s, cst_red__0)) {return 119;}
        }
      }
    }
    else {
      var switch__5 = caml_string_compare(s, cst_mediumslateblue__0);
      if (0 <= switch__5) {
        if (! (0 < switch__5)) {return 92;}
        var switch__6 = caml_string_compare(s, cst_navy__0);
        if (0 <= switch__6) {
          if (! (0 < switch__6)) {return 101;}
          if (! caml_string_notequal(s, cst_oldlace__0)) {return 102;}
          if (! caml_string_notequal(s, cst_olive__0)) {return 103;}
          if (! caml_string_notequal(s, cst_olivedrab__0)) {return 104;}
          if (! caml_string_notequal(s, cst_orange__0)) {return 105;}
          if (! caml_string_notequal(s, cst_orangered__0)) {return 106;}
          if (! caml_string_notequal(s, cst_orchid__0)) {return 107;}
          if (! caml_string_notequal(s, cst_palegoldenrod__0)) {return 108;}
          if (! caml_string_notequal(s, cst_palegreen__0)) {return 109;}
        }
        else {
          if (! caml_string_notequal(s, cst_mediumspringgreen__0)) {return 93;}
          if (! caml_string_notequal(s, cst_mediumturquoise__0)) {return 94;}
          if (! caml_string_notequal(s, cst_mediumvioletred__0)) {return 95;}
          if (! caml_string_notequal(s, cst_midnightblue__0)) {return 96;}
          if (! caml_string_notequal(s, cst_mintcream__0)) {return 97;}
          if (! caml_string_notequal(s, cst_mistyrose__0)) {return 98;}
          if (! caml_string_notequal(s, cst_moccasin__0)) {return 99;}
          if (! caml_string_notequal(s, cst_navajowhite__0)) {return 100;}
        }
      }
      else {
        var switch__7 = caml_string_compare(s, cst_limegreen__0);
        if (0 <= switch__7) {
          if (! (0 < switch__7)) {return 83;}
          if (! caml_string_notequal(s, cst_linen__0)) {return 84;}
          if (! caml_string_notequal(s, cst_magenta__0)) {return 85;}
          if (! caml_string_notequal(s, cst_maroon__0)) {return 86;}
          if (! caml_string_notequal(s, cst_mediumaquamarine__0)) {return 87;}
          if (! caml_string_notequal(s, cst_mediumblue__0)) {return 88;}
          if (! caml_string_notequal(s, cst_mediumorchid__0)) {return 89;}
          if (! caml_string_notequal(s, cst_mediumpurple__0)) {return 90;}
          if (! caml_string_notequal(s, cst_mediumseagreen__0)) {return 91;}
        }
        else {
          if (! caml_string_notequal(s, cst_lightpink__0)) {return 74;}
          if (! caml_string_notequal(s, cst_lightsalmon__0)) {return 75;}
          if (! caml_string_notequal(s, cst_lightseagreen__0)) {return 76;}
          if (! caml_string_notequal(s, cst_lightskyblue__0)) {return 77;}
          if (! caml_string_notequal(s, cst_lightslategray__0)) {return 78;}
          if (! caml_string_notequal(s, cst_lightslategrey__0)) {return 79;}
          if (! caml_string_notequal(s, cst_lightsteelblue__0)) {return 80;}
          if (! caml_string_notequal(s, cst_lightyellow__0)) {return 81;}
          if (! caml_string_notequal(s, cst_lime__0)) {return 82;}
        }
      }
    }
  }
  else {
    var switch__8 = caml_string_compare(s, cst_darkslategray__0);
    if (0 <= switch__8) {
      if (! (0 < switch__8)) {return 36;}
      var switch__9 = caml_string_compare(s, cst_greenyellow__0);
      if (0 <= switch__9) {
        if (! (0 < switch__9)) {return 56;}
        var switch__10 = caml_string_compare(s, cst_lavenderblush__0);
        if (0 <= switch__10) {
          if (! (0 < switch__10)) {return 64;}
          if (! caml_string_notequal(s, cst_lawngreen__0)) {return 65;}
          if (! caml_string_notequal(s, cst_lemonchiffon__0)) {return 66;}
          if (! caml_string_notequal(s, cst_lightblue__0)) {return 67;}
          if (! caml_string_notequal(s, cst_lightcoral__0)) {return 68;}
          if (! caml_string_notequal(s, cst_lightcyan__0)) {return 69;}
          if (! caml_string_notequal(s, cst_lightgoldenrodyellow__0)) {return 70;}
          if (! caml_string_notequal(s, cst_lightgray__0)) {return 71;}
          if (! caml_string_notequal(s, cst_lightgreen__0)) {return 72;}
        }
        else {
          if (! caml_string_notequal(s, cst_grey__0)) {return 54;}
          if (! caml_string_notequal(s, cst_honeydew__0)) {return 57;}
          if (! caml_string_notequal(s, cst_hotpink__0)) {return 58;}
          if (! caml_string_notequal(s, cst_indianred__0)) {return 59;}
          if (! caml_string_notequal(s, cst_indigo__0)) {return 60;}
          if (! caml_string_notequal(s, cst_ivory__0)) {return 61;}
          if (! caml_string_notequal(s, cst_khaki__0)) {return 62;}
          if (! caml_string_notequal(s, cst_lavender__0)) {return 63;}
        }
      }
      else {
        var switch__11 = caml_string_compare(s, cst_floralwhite__0);
        if (0 <= switch__11) {
          if (! (0 < switch__11)) {return 46;}
          if (! caml_string_notequal(s, cst_forestgreen__0)) {return 47;}
          if (! caml_string_notequal(s, cst_fuchsia__0)) {return 48;}
          if (! caml_string_notequal(s, cst_gainsboro__0)) {return 49;}
          if (! caml_string_notequal(s, cst_ghostwhite__0)) {return 50;}
          if (! caml_string_notequal(s, cst_gold__0)) {return 51;}
          if (! caml_string_notequal(s, cst_goldenrod__0)) {return 52;}
          if (! caml_string_notequal(s, cst_gray__0)) {return 53;}
          if (! caml_string_notequal(s, cst_green__0)) {return 55;}
        }
        else {
          if (! caml_string_notequal(s, cst_darkslategrey__0)) {return 37;}
          if (! caml_string_notequal(s, cst_darkturquoise__0)) {return 38;}
          if (! caml_string_notequal(s, cst_darkviolet__0)) {return 39;}
          if (! caml_string_notequal(s, cst_deeppink__0)) {return 40;}
          if (! caml_string_notequal(s, cst_deepskyblue__0)) {return 41;}
          if (! caml_string_notequal(s, cst_dimgray__0)) {return 42;}
          if (! caml_string_notequal(s, cst_dimgrey__0)) {return 43;}
          if (! caml_string_notequal(s, cst_dodgerblue__0)) {return 44;}
          if (! caml_string_notequal(s, cst_firebrick__0)) {return 45;}
        }
      }
    }
    else {
      var switch__12 = caml_string_compare(s, cst_cornsilk__0);
      if (0 <= switch__12) {
        if (! (0 < switch__12)) {return 18;}
        var switch__13 = caml_string_compare(s, cst_darkkhaki__0);
        if (0 <= switch__13) {
          if (! (0 < switch__13)) {return 27;}
          if (! caml_string_notequal(s, cst_darkmagenta__0)) {return 28;}
          if (! caml_string_notequal(s, cst_darkolivegreen__0)) {return 29;}
          if (! caml_string_notequal(s, cst_darkorange__0)) {return 30;}
          if (! caml_string_notequal(s, cst_darkorchid__0)) {return 31;}
          if (! caml_string_notequal(s, cst_darkred__0)) {return 32;}
          if (! caml_string_notequal(s, cst_darksalmon__0)) {return 33;}
          if (! caml_string_notequal(s, cst_darkseagreen__0)) {return 34;}
          if (! caml_string_notequal(s, cst_darkslateblue__0)) {return 35;}
        }
        else {
          if (! caml_string_notequal(s, cst_crimson__0)) {return 19;}
          if (! caml_string_notequal(s, cst_cyan__0)) {return 20;}
          if (! caml_string_notequal(s, cst_darkblue__0)) {return 21;}
          if (! caml_string_notequal(s, cst_darkcyan__0)) {return 22;}
          if (! caml_string_notequal(s, cst_darkgoldenrod__0)) {return 23;}
          if (! caml_string_notequal(s, cst_darkgray__0)) {return 24;}
          if (! caml_string_notequal(s, cst_darkgreen__0)) {return 25;}
          if (! caml_string_notequal(s, cst_darkgrey__0)) {return 26;}
        }
      }
      else {
        var switch__14 = caml_string_compare(s, cst_blue__0);
        if (0 <= switch__14) {
          if (! (0 < switch__14)) {return 9;}
          if (! caml_string_notequal(s, cst_blueviolet__0)) {return 10;}
          if (! caml_string_notequal(s, cst_brown__0)) {return 11;}
          if (! caml_string_notequal(s, cst_burlywood__0)) {return 12;}
          if (! caml_string_notequal(s, cst_cadetblue__0)) {return 13;}
          if (! caml_string_notequal(s, cst_chartreuse__0)) {return 14;}
          if (! caml_string_notequal(s, cst_chocolate__0)) {return 15;}
          if (! caml_string_notequal(s, cst_coral__0)) {return 16;}
          if (! caml_string_notequal(s, cst_cornflowerblue__0)) {return 17;}
        }
        else {
          if (! caml_string_notequal(s, cst_aliceblue__0)) {return 0;}
          if (! caml_string_notequal(s, cst_antiquewhite__0)) {return 1;}
          if (! caml_string_notequal(s, cst_aqua__0)) {return 2;}
          if (! caml_string_notequal(s, cst_aquamarine__0)) {return 3;}
          if (! caml_string_notequal(s, cst_azure__0)) {return 4;}
          if (! caml_string_notequal(s, cst_beige__0)) {return 5;}
          if (! caml_string_notequal(s, cst_bisque__0)) {return 6;}
          if (! caml_string_notequal(s, cst_black__0)) {return 7;}
          if (! caml_string_notequal(s, cst_blanchedalmond__0)) {return 8;}
        }
      }
    }
  }
  var db_ = call2(Stdlib[28], s, cst_is_not_a_valid_color_name);
  throw caml_wrap_thrown_exception([0,Stdlib[6],db_]);
}

function rgb_of_name(param) {
  var da_ = param;
  if (74 <= da_) {
    if (111 <= da_) {
      switch (da_) {
        case 111:
          return a7_;
        case 112:
          return a8_;
        case 113:
          return a9_;
        case 114:
          return a__;
        case 115:
          return ba_;
        case 116:
          return bb_;
        case 117:
          return bc_;
        case 118:
          return bd_;
        case 119:
          return be_;
        case 120:
          return bf_;
        case 121:
          return bg_;
        case 122:
          return bh_;
        case 123:
          return bi_;
        case 124:
          return bj_;
        case 125:
          return bk_;
        case 126:
          return bl_;
        case 127:
          return bm_;
        case 128:
          return bn_;
        case 129:
          return bo_;
        case 130:
          return bp_;
        case 131:
          return bq_;
        case 132:
          return br_;
        case 133:
          return bs_;
        case 134:
          return bt_;
        case 135:
          return bu_;
        case 136:
          return bv_;
        case 137:
          return bw_;
        case 138:
          return bx_;
        case 139:
          return by_;
        case 140:
          return bz_;
        case 141:
          return bA_;
        case 142:
          return bB_;
        case 143:
          return bC_;
        case 144:
          return bD_;
        case 145:
          return bE_;
        default:
          return bF_
        }
    }
    switch (da_) {
      case 74:
        return aw_;
      case 75:
        return ax_;
      case 76:
        return ay_;
      case 77:
        return az_;
      case 78:
        return aA_;
      case 79:
        return aB_;
      case 80:
        return aC_;
      case 81:
        return aD_;
      case 82:
        return aE_;
      case 83:
        return aF_;
      case 84:
        return aG_;
      case 85:
        return aH_;
      case 86:
        return aI_;
      case 87:
        return aJ_;
      case 88:
        return aK_;
      case 89:
        return aL_;
      case 90:
        return aM_;
      case 91:
        return aN_;
      case 92:
        return aO_;
      case 93:
        return aP_;
      case 94:
        return aQ_;
      case 95:
        return aR_;
      case 96:
        return aS_;
      case 97:
        return aT_;
      case 98:
        return aU_;
      case 99:
        return aV_;
      case 100:
        return aW_;
      case 101:
        return aX_;
      case 102:
        return aY_;
      case 103:
        return aZ_;
      case 104:
        return a0_;
      case 105:
        return a1_;
      case 106:
        return a2_;
      case 107:
        return a3_;
      case 108:
        return a4_;
      case 109:
        return a5_;
      default:
        return a6_
      }
  }
  if (37 <= da_) {
    switch (da_) {
      case 37:
        return L_;
      case 38:
        return M_;
      case 39:
        return N_;
      case 40:
        return O_;
      case 41:
        return P_;
      case 42:
        return Q_;
      case 43:
        return R_;
      case 44:
        return S_;
      case 45:
        return T_;
      case 46:
        return U_;
      case 47:
        return V_;
      case 48:
        return W_;
      case 49:
        return X_;
      case 50:
        return Y_;
      case 51:
        return Z_;
      case 52:
        return aa_;
      case 53:
        return ab_;
      case 54:
        return ac_;
      case 55:
        return ad_;
      case 56:
        return ae_;
      case 57:
        return af_;
      case 58:
        return ag_;
      case 59:
        return ah_;
      case 60:
        return ai_;
      case 61:
        return aj_;
      case 62:
        return ak_;
      case 63:
        return al_;
      case 64:
        return am_;
      case 65:
        return an_;
      case 66:
        return ao_;
      case 67:
        return ap_;
      case 68:
        return aq_;
      case 69:
        return ar_;
      case 70:
        return as_;
      case 71:
        return at_;
      case 72:
        return au_;
      default:
        return av_
      }
  }
  switch (da_) {
    case 0:
      return a_;
    case 1:
      return b_;
    case 2:
      return c_;
    case 3:
      return d_;
    case 4:
      return e_;
    case 5:
      return f_;
    case 6:
      return g_;
    case 7:
      return h_;
    case 8:
      return i_;
    case 9:
      return j_;
    case 10:
      return k_;
    case 11:
      return l_;
    case 12:
      return m_;
    case 13:
      return n_;
    case 14:
      return o_;
    case 15:
      return p_;
    case 16:
      return q_;
    case 17:
      return r_;
    case 18:
      return s_;
    case 19:
      return t_;
    case 20:
      return u_;
    case 21:
      return v_;
    case 22:
      return w_;
    case 23:
      return x_;
    case 24:
      return y_;
    case 25:
      return z_;
    case 26:
      return A_;
    case 27:
      return B_;
    case 28:
      return C_;
    case 29:
      return D_;
    case 30:
      return E_;
    case 31:
      return F_;
    case 32:
      return G_;
    case 33:
      return H_;
    case 34:
      return I_;
    case 35:
      return J_;
    default:
      return K_
    }
}

function rgb(a, r, g, b) {
  if (a) {var a__0 = a[1];return [3,[0,r,g,b,a__0]];}
  return [1,[0,r,g,b]];
}

function hsl(a, h, s, l) {
  if (a) {var a__0 = a[1];return [6,[0,h,s,l,a__0]];}
  return [5,[0,h,s,l]];
}

function string_of_t(param) {
  switch (param[0]) {
    case 0:
      var n = param[1];
      return string_of_name(n);
    case 1:
      var match = param[1];
      var b = match[3];
      var g = match[2];
      var r = match[1];
      return call4(Stdlib_printf[4], bG_, r, g, b);
    case 2:
      var match__0 = param[1];
      var b__0 = match__0[3];
      var g__0 = match__0[2];
      var r__0 = match__0[1];
      return call4(Stdlib_printf[4], bH_, r__0, g__0, b__0);
    case 3:
      var match__1 = param[1];
      var a = match__1[4];
      var b__1 = match__1[3];
      var g__1 = match__1[2];
      var r__1 = match__1[1];
      return call5(Stdlib_printf[4], bI_, r__1, g__1, b__1, a);
    case 4:
      var match__2 = param[1];
      var a__0 = match__2[4];
      var b__2 = match__2[3];
      var g__2 = match__2[2];
      var r__2 = match__2[1];
      return call5(Stdlib_printf[4], bJ_, r__2, g__2, b__2, a__0);
    case 5:
      var match__3 = param[1];
      var l = match__3[3];
      var s = match__3[2];
      var h = match__3[1];
      return call4(Stdlib_printf[4], bK_, h, s, l);
    default:
      var match__4 = param[1];
      var a__1 = match__4[4];
      var l__0 = match__4[3];
      var s__0 = match__4[2];
      var h__0 = match__4[1];
      return call5(Stdlib_printf[4], bL_, h__0, s__0, l__0, a__1)
    }
}

function hex_of_rgb(param) {
  var blue = param[3];
  var green = param[2];
  var red = param[1];
  function in_range(i) {
    var c7_ = i < 0 ? 1 : 0;
    var c8_ = c7_ ? c7_ : 255 < i ? 1 : 0;
    if (c8_) {
      var c9_ = call1(Stdlib[33], i);
      var c__ = call2(Stdlib[28], c9_, cst_is_out_of_valid_range);
      throw caml_wrap_thrown_exception([0,Stdlib[6],c__]);
    }
    return c8_;
  }
  in_range(red);
  in_range(green);
  in_range(blue);
  return call4(Stdlib_printf[4], bM_, red, green, blue);
}

function js_t_of_js_string(s) {
  var cI_ = 0;
  var cJ_ = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d);
  var cK_ = Js_of_ocaml_Js[10];
  var rgb_re = function(t23, t22, param) {return new t23(t22);}(cK_, cJ_, cI_);
  var cL_ = 0;
  var cM_ = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d__0);
  var cN_ = Js_of_ocaml_Js[10];
  var rgb_pct_re = function(t21, t20, param) {return new t21(t20);}(cN_, cM_, cL_
  );
  var cO_ = 0;
  var cP_ = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d);
  var cQ_ = Js_of_ocaml_Js[10];
  var rgba_re = function(t19, t18, param) {return new t19(t18);}(cQ_, cP_, cO_
  );
  var cR_ = 0;
  var cS_ = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d__0);
  var cT_ = Js_of_ocaml_Js[10];
  var rgba_pct_re = function(t17, t16, param) {return new t17(t16);}(cT_, cS_, cR_
  );
  var cU_ = 0;
  var cV_ = caml_jsbytes_of_string(cst_hsl_s_d_s_d_s_d);
  var cW_ = Js_of_ocaml_Js[10];
  var hsl_re = function(t15, t14, param) {return new t15(t14);}(cW_, cV_, cU_);
  var cX_ = 0;
  var cY_ = caml_jsbytes_of_string(cst_hsla_s_d_s_d_s_d_d_d);
  var cZ_ = Js_of_ocaml_Js[10];
  var hsla_re = function(t13, t12, param) {return new t13(t12);}(cZ_, cY_, cX_
  );
  function c0_(x) {
    return call1(caml_get_public_method(x, -856045486, 289), x);
  }
  if (! (function(t1, t0, param) {return t1.test(t0);}(rgb_re, s, c0_) | 0)) {
    var c1_ = function(x) {
      return call1(caml_get_public_method(x, -856045486, 290), x);
    };
    if (! (function(t3, t2, param) {return t3.test(t2);}(rgba_re, s, c1_) | 0)
    ) {
      var c2_ = function(x) {
        return call1(caml_get_public_method(x, -856045486, 291), x);
      };
      if (
      !
      (function(t5, t4, param) {return t5.test(t4);}(rgb_pct_re, s, c2_) | 0)
      ) {
        var c3_ = function(x) {
          return call1(caml_get_public_method(x, -856045486, 292), x);
        };
        if (
        !
        (function(t7, t6, param) {return t7.test(t6);}(rgba_pct_re, s, c3_) | 0)
        ) {
          var c4_ = function(x) {
            return call1(caml_get_public_method(x, -856045486, 293), x);
          };
          if (
          !
          (function(t9, t8, param) {return t9.test(t8);}(hsl_re, s, c4_) | 0)
          ) {
            var c5_ = function(x) {
              return call1(caml_get_public_method(x, -856045486, 294), x);
            };
            if (
            !
            (function(t11, t10, param) {return t11.test(t10);}(hsla_re, s, c5_
             ) | 0)
            ) {
              if (call2(Stdlib_list[32], caml_js_to_string(s), bN_)) {return s;}
              var c6_ = call2(
                Stdlib[28],
                caml_js_to_string(s),
                cst_is_not_a_valid_color
              );
              throw caml_wrap_thrown_exception([0,Stdlib[6],c6_]);
            }
          }
        }
      }
    }
  }
  return s;
}

function name(cn) {return string_of_name(cn).toString();}

function js(c) {
  if (0 === c[0]) {var n = c[1];return name(n);}
  return string_of_t(c).toString();
}

function ml(c) {
  var s = caml_js_to_string(c);
  try {var cv_ = [0,name_of_string(s)];return cv_;}
  catch(cw_) {
    cw_ = runtime["caml_wrap_exception"](cw_);
    if (cw_[1] === Stdlib[6]) {
      var fail = function(param) {
        var cH_ = call2(Stdlib[28], s, cst_is_not_a_valid_color__0);
        throw caml_wrap_thrown_exception([0,Stdlib[6],cH_]);
      };
      var re_rgb = call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d);
      var re_rgb_pct = call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d__0);
      var re_hsl = call1(Js_of_ocaml_Regexp[1], cst_hsla_d_d_d_d_d);
      var i_of_s_o = function(param) {
        if (param) {
          var i = param[1];
          try {var cF_ = runtime["caml_int_of_string"](i);return cF_;}
          catch(cG_) {
            cG_ = runtime["caml_wrap_exception"](cG_);
            if (cG_[1] === Stdlib[6]) var s = cG_[2];
            else {
              if (cG_[1] !== Stdlib[7]) {
                throw caml_wrap_thrown_exception_reraise(cG_);
              }
              var s = cG_[2];
            }
            var cC_ = call2(Stdlib[28], cst, s);
            var cD_ = call2(Stdlib[28], i, cC_);
            var cE_ = call2(Stdlib[28], cst_color_conversion_error, cD_);
            throw caml_wrap_thrown_exception([0,Stdlib[6],cE_]);
          }
        }
        return fail(0);
      };
      var f_of_s = function(f) {
        try {var cA_ = caml_float_of_string(f);return cA_;}
        catch(cB_) {
          cB_ = runtime["caml_wrap_exception"](cB_);
          if (cB_[1] === Stdlib[6]) var s = cB_[2];
          else {
            if (cB_[1] !== Stdlib[7]) {
              throw caml_wrap_thrown_exception_reraise(cB_);
            }
            var s = cB_[2];
          }
          var cx_ = call2(Stdlib[28], cst__0, s);
          var cy_ = call2(Stdlib[28], f, cx_);
          var cz_ = call2(Stdlib[28], cst_color_conversion_error__0, cy_);
          throw caml_wrap_thrown_exception([0,Stdlib[6],cz_]);
        }
      };
      var match = call3(Js_of_ocaml_Regexp[7], re_rgb, s, 0);
      if (match) {
        var r = match[1];
        var red = call2(Js_of_ocaml_Regexp[11], r, 2);
        var green = call2(Js_of_ocaml_Regexp[11], r, 3);
        var blue = call2(Js_of_ocaml_Regexp[11], r, 4);
        var alpha = call2(Js_of_ocaml_Regexp[11], r, 5);
        var match__0 = call2(Js_of_ocaml_Regexp[11], r, 1);
        if (match__0) {
          var cd_ = match__0[1];
          if (! caml_string_notequal(cd_, cst_rgb)) {
            if (alpha) {return fail(0);}
            var ch_ = i_of_s_o(blue);
            var ci_ = i_of_s_o(green);
            return [1,[0,i_of_s_o(red),ci_,ch_]];
          }
          if (! caml_string_notequal(cd_, cst_rgba)) {
            if (alpha) {
              var a = alpha[1];
              var ce_ = f_of_s(a);
              var cf_ = i_of_s_o(blue);
              var cg_ = i_of_s_o(green);
              return [3,[0,i_of_s_o(red),cg_,cf_,ce_]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      var match__1 = call3(Js_of_ocaml_Regexp[7], re_rgb_pct, s, 0);
      if (match__1) {
        var r__0 = match__1[1];
        var red__0 = call2(Js_of_ocaml_Regexp[11], r__0, 2);
        var green__0 = call2(Js_of_ocaml_Regexp[11], r__0, 3);
        var blue__0 = call2(Js_of_ocaml_Regexp[11], r__0, 4);
        var alpha__0 = call2(Js_of_ocaml_Regexp[11], r__0, 5);
        var match__2 = call2(Js_of_ocaml_Regexp[11], r__0, 1);
        if (match__2) {
          var cj_ = match__2[1];
          if (! caml_string_notequal(cj_, cst_rgb__0)) {
            if (alpha__0) {return fail(0);}
            var cn_ = i_of_s_o(blue__0);
            var co_ = i_of_s_o(green__0);
            return [2,[0,i_of_s_o(red__0),co_,cn_]];
          }
          if (! caml_string_notequal(cj_, cst_rgba__0)) {
            if (alpha__0) {
              var a__0 = alpha__0[1];
              var ck_ = f_of_s(a__0);
              var cl_ = i_of_s_o(blue__0);
              var cm_ = i_of_s_o(green__0);
              return [4,[0,i_of_s_o(red__0),cm_,cl_,ck_]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      var match__3 = call3(Js_of_ocaml_Regexp[7], re_hsl, s, 0);
      if (match__3) {
        var r__1 = match__3[1];
        var red__1 = call2(Js_of_ocaml_Regexp[11], r__1, 2);
        var green__1 = call2(Js_of_ocaml_Regexp[11], r__1, 3);
        var blue__1 = call2(Js_of_ocaml_Regexp[11], r__1, 4);
        var alpha__1 = call2(Js_of_ocaml_Regexp[11], r__1, 5);
        var match__4 = call2(Js_of_ocaml_Regexp[11], r__1, 1);
        if (match__4) {
          var cp_ = match__4[1];
          if (! caml_string_notequal(cp_, cst_hsl)) {
            if (alpha__1) {return fail(0);}
            var ct_ = i_of_s_o(blue__1);
            var cu_ = i_of_s_o(green__1);
            return [5,[0,i_of_s_o(red__1),cu_,ct_]];
          }
          if (! caml_string_notequal(cp_, cst_hsla)) {
            if (alpha__1) {
              var a__1 = alpha__1[1];
              var cq_ = f_of_s(a__1);
              var cr_ = i_of_s_o(blue__1);
              var cs_ = i_of_s_o(green__1);
              return [6,[0,i_of_s_o(red__1),cs_,cr_,cq_]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      return fail(0);
    }
    throw caml_wrap_thrown_exception_reraise(cw_);
  }
}

function string_of_t__0(param) {
  if (typeof param === "number") return cst_0;
  else switch (param[0]) {
    case 0:
      var f = param[1];
      return call3(Stdlib_printf[4], bO_, f, cst_em);
    case 1:
      var f__0 = param[1];
      return call3(Stdlib_printf[4], bP_, f__0, cst_ex);
    case 2:
      var f__1 = param[1];
      return call3(Stdlib_printf[4], bQ_, f__1, cst_px);
    case 3:
      var f__2 = param[1];
      return call3(Stdlib_printf[4], bR_, f__2, cst_gd);
    case 4:
      var f__3 = param[1];
      return call3(Stdlib_printf[4], bS_, f__3, cst_rem);
    case 5:
      var f__4 = param[1];
      return call3(Stdlib_printf[4], bT_, f__4, cst_vw);
    case 6:
      var f__5 = param[1];
      return call3(Stdlib_printf[4], bU_, f__5, cst_vh);
    case 7:
      var f__6 = param[1];
      return call3(Stdlib_printf[4], bV_, f__6, cst_vm);
    case 8:
      var f__7 = param[1];
      return call3(Stdlib_printf[4], bW_, f__7, cst_ch);
    case 9:
      var f__8 = param[1];
      return call3(Stdlib_printf[4], bX_, f__8, cst_mm);
    case 10:
      var f__9 = param[1];
      return call3(Stdlib_printf[4], bY_, f__9, cst_cm);
    case 11:
      var f__10 = param[1];
      return call3(Stdlib_printf[4], bZ_, f__10, cst_in);
    case 12:
      var f__11 = param[1];
      return call3(Stdlib_printf[4], b0_, f__11, cst_pt);
    default:
      var f__12 = param[1];
      return call3(Stdlib_printf[4], b1_, f__12, cst_pc)
    }
}

function js__0(t) {return string_of_t__0(t).toString();}

function ml__0(t) {
  var s = caml_js_to_string(t);
  if (runtime["caml_string_equal"](s, cst_0__0)) {return 0;}
  function fail(param) {
    var cc_ = call2(Stdlib[28], s, cst_is_not_a_valid_length);
    throw caml_wrap_thrown_exception([0,Stdlib[6],cc_]);
  }
  var re = call1(Js_of_ocaml_Regexp[1], cst_d_d_s_S);
  var match = call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var ca_ = caml_float_of_string(f);}
      catch(exn) {
        exn = runtime["caml_wrap_exception"](exn);
        if (exn[1] === Stdlib[6]) {
          var s__0 = exn[2];
          var b__ = call2(Stdlib[28], cst_length_conversion_error, s__0);
          throw caml_wrap_thrown_exception([0,Stdlib[6],b__]);
        }
        throw caml_wrap_thrown_exception_reraise(exn);
      }
      var f__0 = ca_;
    }
    else var f__0 = fail(0);
    var match__1 = call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var cb_ = match__1[1];
      var switch__0 = caml_string_compare(cb_, cst_pc__0);
      if (0 <= switch__0) {
        if (! (0 < switch__0)) {return [13,f__0];}
        if (! caml_string_notequal(cb_, cst_pt__0)) {return [12,f__0];}
        if (! caml_string_notequal(cb_, cst_px__0)) {return [2,f__0];}
        if (! caml_string_notequal(cb_, cst_rem__0)) {return [4,f__0];}
        if (! caml_string_notequal(cb_, cst_vh__0)) {return [6,f__0];}
        if (! caml_string_notequal(cb_, cst_vm__0)) {return [7,f__0];}
        if (! caml_string_notequal(cb_, cst_vw__0)) {return [5,f__0];}
      }
      else {
        if (! caml_string_notequal(cb_, cst_ch__0)) {return [8,f__0];}
        if (! caml_string_notequal(cb_, cst_cm__0)) {return [10,f__0];}
        if (! caml_string_notequal(cb_, cst_em__0)) {return [0,f__0];}
        if (! caml_string_notequal(cb_, cst_ex__0)) {return [1,f__0];}
        if (! caml_string_notequal(cb_, cst_gd__0)) {return [3,f__0];}
        if (! caml_string_notequal(cb_, cst_in__0)) {return [11,f__0];}
        if (! caml_string_notequal(cb_, cst_mm__0)) {return [9,f__0];}
      }
      return fail(0);
    }
    return fail(0);
  }
  return fail(0);
}

var Length = [0,string_of_t__0,js__0,ml__0];

function string_of_t__1(param) {
  switch (param[0]) {
    case 0:
      var f = param[1];
      return call3(Stdlib_printf[4], b2_, f, cst_deg);
    case 1:
      var f__0 = param[1];
      return call3(Stdlib_printf[4], b3_, f__0, cst_grad);
    case 2:
      var f__1 = param[1];
      return call3(Stdlib_printf[4], b4_, f__1, cst_rad);
    default:
      var f__2 = param[1];
      return call3(Stdlib_printf[4], b5_, f__2, cst_turns)
    }
}

function js__1(t) {return string_of_t__1(t).toString();}

function ml__1(j) {
  var s = caml_js_to_string(j);
  var re = call1(Js_of_ocaml_Regexp[1], cst_d_d_deg_grad_rad_turns);
  function fail(param) {
    var b9_ = call2(Stdlib[28], s, cst_is_not_a_valid_length__0);
    throw caml_wrap_thrown_exception([0,Stdlib[6],b9_]);
  }
  var match = call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var b7_ = caml_float_of_string(f);}
      catch(exn) {
        exn = runtime["caml_wrap_exception"](exn);
        if (exn[1] === Stdlib[6]) {
          var s__0 = exn[2];
          var b6_ = call2(Stdlib[28], cst_length_conversion_error__0, s__0);
          throw caml_wrap_thrown_exception([0,Stdlib[6],b6_]);
        }
        throw caml_wrap_thrown_exception_reraise(exn);
      }
      var f__0 = b7_;
    }
    else var f__0 = fail(0);
    var match__1 = call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var b8_ = match__1[1];
      if (! caml_string_notequal(b8_, cst_deg__0)) {return [0,f__0];}
      if (! caml_string_notequal(b8_, cst_grad__0)) {return [1,f__0];}
      if (! caml_string_notequal(b8_, cst_rad__0)) {return [2,f__0];}
      if (! caml_string_notequal(b8_, cst_turns__0)) {return [3,f__0];}
    }
    return fail(0);
  }
  return fail(0);
}

var Angle = [0,string_of_t__1,js__1,ml__1];
var Js_of_ocaml_CSS = [
  0,
  [
    0,
    string_of_name,
    rgb_of_name,
    hex_of_rgb,
    rgb,
    hsl,
    string_of_t,
    js,
    ml,
    js_t_of_js_string
  ],
  Length,
  Angle
];

module.exports = Js_of_ocaml_CSS;

/*::type Exports = {
  Length: any,
  Angle: any,
}*/
/** @type {{
  Length: any,
  Angle: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Length = module.exports[2];
module.exports.Angle = module.exports[3];

/* Hashing disabled */
