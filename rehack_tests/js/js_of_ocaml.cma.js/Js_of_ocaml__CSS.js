/**
 * Js_of_ocaml__CSS
 * @providesModule Js_of_ocaml__CSS
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Js_of_ocaml__Regexp = require('Js_of_ocaml__Regexp.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var Invalid_argument = require('Invalid_argument.js');
var Failure = require('Failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_float_of_string = runtime["caml_float_of_string"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_string = runtime["caml_js_to_string"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var caml_list_of_js_array = runtime["caml_list_of_js_array"];
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

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
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
var partial = [8,0,0,0,[12,41,0]];
var partial__0 = [12,41,0];
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
var Pervasives = global_data["Pervasives"];
var Invalid_argument = global_data["Invalid_argument"];
var Js_of_ocaml_Regexp = global_data["Js_of_ocaml__Regexp"];
var Printf = global_data["Printf"];
var Failure = global_data["Failure"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var List = global_data["List_"];
var b2 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var b3 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var b4 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var b5 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bO = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bP = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bQ = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bR = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bS = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bT = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bU = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bV = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bW = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bX = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bY = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bZ = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var b0 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var b1 = [0,[8,0,0,0,[2,0,0]],string("%f%s")];
var bN = caml_list_of_js_array(
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
var bM = [
  0,
  [12,35,[4,8,[0,2,2],0,[4,8,[0,2,2],0,[4,8,[0,2,2],0,0]]]],
  string("#%02X%02X%02X")
];
var bG = [
  0,
  [11,string("rgb("),[4,0,0,0,[12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,41,0]]]]]]],
  string("rgb(%d,%d,%d)")
];
var bH = [
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
var bI = [
  0,
  [
    11,
    string("rgba("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,44,[8,0,0,0,[12,41,0]]]]]]]]
  ],
  string("rgba(%d,%d,%d,%f)")
];
var bJ = [
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
var bK = [
  0,
  [
    11,
    string("hsl("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,41,0]]]]]]]]
  ],
  string("hsl(%d,%d%%,%d%%)")
];
var bL = [
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
          [12,37,[12,44,[4,0,0,0,[12,37,[12,44,[8,0,0,0,partial__0]]]]]]
        ]
      ]
    ]
  ],
  string("hsla(%d,%d%%,%d%%,%f)")
];
var a = [0,240,248,255];
var b = [0,250,235,215];
var c = [0,0,255,255];
var d = [0,127,255,212];
var e = [0,240,255,255];
var f = [0,245,245,220];
var g = [0,255,228,196];
var h = [0,0,0,0];
var i = [0,255,235,205];
var j = [0,0,0,255];
var k = [0,138,43,226];
var l = [0,165,42,42];
var m = [0,222,184,135];
var n = [0,95,158,160];
var o = [0,127,255,0];
var p = [0,210,105,30];
var q = [0,255,127,80];
var r = [0,100,149,237];
var s = [0,255,248,220];
var t = [0,220,20,60];
var u = [0,0,255,255];
var v = [0,0,0,139];
var w = [0,0,139,139];
var x = [0,184,134,11];
var y = [0,169,169,169];
var z = [0,0,100,0];
var A = [0,169,169,169];
var B = [0,189,183,107];
var C = [0,139,0,139];
var D = [0,85,107,47];
var E = [0,255,140,0];
var F = [0,153,50,204];
var G = [0,139,0,0];
var H = [0,233,150,122];
var I = [0,143,188,143];
var J = [0,72,61,139];
var K = [0,47,79,79];
var L = [0,47,79,79];
var M = [0,0,206,209];
var N = [0,148,0,211];
var O = [0,255,20,147];
var P = [0,0,191,255];
var Q = [0,105,105,105];
var R = [0,105,105,105];
var S = [0,30,144,255];
var T = [0,178,34,34];
var U = [0,255,250,240];
var V = [0,34,139,34];
var W = [0,255,0,255];
var X = [0,220,220,220];
var Y = [0,248,248,255];
var Z = [0,255,215,0];
var aa = [0,218,165,32];
var ab = [0,128,128,128];
var ac = [0,128,128,128];
var ad = [0,0,128,0];
var ae = [0,173,255,47];
var af = [0,240,255,240];
var ag = [0,255,105,180];
var ah = [0,205,92,92];
var ai = [0,75,0,130];
var aj = [0,255,255,240];
var ak = [0,240,230,140];
var al = [0,230,230,250];
var am = [0,255,240,245];
var an = [0,124,252,0];
var ao = [0,255,250,205];
var ap = [0,173,216,230];
var aq = [0,240,128,128];
var ar = [0,224,255,255];
var as = [0,250,250,210];
var at = [0,211,211,211];
var au = [0,144,238,144];
var av = [0,211,211,211];
var aw = [0,255,182,193];
var ax = [0,255,160,122];
var ay = [0,32,178,170];
var az = [0,135,206,250];
var aA = [0,119,136,153];
var aB = [0,119,136,153];
var aC = [0,176,196,222];
var aD = [0,255,255,224];
var aE = [0,0,255,0];
var aF = [0,50,205,50];
var aG = [0,250,240,230];
var aH = [0,255,0,255];
var aI = [0,128,0,0];
var aJ = [0,102,205,170];
var aK = [0,0,0,205];
var aL = [0,186,85,211];
var aM = [0,147,112,219];
var aN = [0,60,179,113];
var aO = [0,123,104,238];
var aP = [0,0,250,154];
var aQ = [0,72,209,204];
var aR = [0,199,21,133];
var aS = [0,25,25,112];
var aT = [0,245,255,250];
var aU = [0,255,228,225];
var aV = [0,255,228,181];
var aW = [0,255,222,173];
var aX = [0,0,0,128];
var aY = [0,253,245,230];
var aZ = [0,128,128,0];
var a0 = [0,107,142,35];
var a1 = [0,255,165,0];
var a2 = [0,255,69,0];
var a3 = [0,218,112,214];
var a4 = [0,238,232,170];
var a5 = [0,152,251,152];
var a6 = [0,175,238,238];
var a7 = [0,219,112,147];
var a8 = [0,255,239,213];
var a9 = [0,255,218,185];
var a_ = [0,205,133,63];
var ba = [0,255,192,203];
var bb = [0,221,160,221];
var bc = [0,176,224,230];
var bd = [0,128,0,128];
var be = [0,255,0,0];
var bf = [0,188,143,143];
var bg = [0,65,105,225];
var bh = [0,139,69,19];
var bi = [0,250,128,114];
var bj = [0,244,164,96];
var bk = [0,46,139,87];
var bl = [0,255,245,238];
var bm = [0,160,82,45];
var bn = [0,192,192,192];
var bo = [0,135,206,235];
var bp = [0,106,90,205];
var bq = [0,112,128,144];
var br = [0,112,128,144];
var bs = [0,255,250,250];
var bt = [0,0,255,127];
var bu = [0,70,130,180];
var bv = [0,210,180,140];
var bw = [0,0,128,128];
var bx = [0,216,191,216];
var by = [0,255,99,71];
var bz = [0,64,224,208];
var bA = [0,238,130,238];
var bB = [0,245,222,179];
var bC = [0,255,255,255];
var bD = [0,245,245,245];
var bE = [0,255,255,0];
var bF = [0,154,205,50];

function string_of_name(param) {
  var c3 = param;
  if (74 <= c3) {
    if (111 <= c3) {
      switch (c3) {
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
    switch (c3) {
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
  if (37 <= c3) {
    switch (c3) {
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
  switch (c3) {
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
  throw runtime["caml_wrap_thrown_exception"](
          [
            0,
            Invalid_argument,
            call2(Pervasives[16], s, cst_is_not_a_valid_color_name)
          ]
        );
}

function rgb_of_name(param) {
  var c2 = param;
  if (74 <= c2) {
    if (111 <= c2) {
      switch (c2) {
        case 111:
          return a7;
        case 112:
          return a8;
        case 113:
          return a9;
        case 114:
          return a_;
        case 115:
          return ba;
        case 116:
          return bb;
        case 117:
          return bc;
        case 118:
          return bd;
        case 119:
          return be;
        case 120:
          return bf;
        case 121:
          return bg;
        case 122:
          return bh;
        case 123:
          return bi;
        case 124:
          return bj;
        case 125:
          return bk;
        case 126:
          return bl;
        case 127:
          return bm;
        case 128:
          return bn;
        case 129:
          return bo;
        case 130:
          return bp;
        case 131:
          return bq;
        case 132:
          return br;
        case 133:
          return bs;
        case 134:
          return bt;
        case 135:
          return bu;
        case 136:
          return bv;
        case 137:
          return bw;
        case 138:
          return bx;
        case 139:
          return by;
        case 140:
          return bz;
        case 141:
          return bA;
        case 142:
          return bB;
        case 143:
          return bC;
        case 144:
          return bD;
        case 145:
          return bE;
        default:
          return bF
        }
    }
    switch (c2) {
      case 74:
        return aw;
      case 75:
        return ax;
      case 76:
        return ay;
      case 77:
        return az;
      case 78:
        return aA;
      case 79:
        return aB;
      case 80:
        return aC;
      case 81:
        return aD;
      case 82:
        return aE;
      case 83:
        return aF;
      case 84:
        return aG;
      case 85:
        return aH;
      case 86:
        return aI;
      case 87:
        return aJ;
      case 88:
        return aK;
      case 89:
        return aL;
      case 90:
        return aM;
      case 91:
        return aN;
      case 92:
        return aO;
      case 93:
        return aP;
      case 94:
        return aQ;
      case 95:
        return aR;
      case 96:
        return aS;
      case 97:
        return aT;
      case 98:
        return aU;
      case 99:
        return aV;
      case 100:
        return aW;
      case 101:
        return aX;
      case 102:
        return aY;
      case 103:
        return aZ;
      case 104:
        return a0;
      case 105:
        return a1;
      case 106:
        return a2;
      case 107:
        return a3;
      case 108:
        return a4;
      case 109:
        return a5;
      default:
        return a6
      }
  }
  if (37 <= c2) {
    switch (c2) {
      case 37:
        return L;
      case 38:
        return M;
      case 39:
        return N;
      case 40:
        return O;
      case 41:
        return P;
      case 42:
        return Q;
      case 43:
        return R;
      case 44:
        return S;
      case 45:
        return T;
      case 46:
        return U;
      case 47:
        return V;
      case 48:
        return W;
      case 49:
        return X;
      case 50:
        return Y;
      case 51:
        return Z;
      case 52:
        return aa;
      case 53:
        return ab;
      case 54:
        return ac;
      case 55:
        return ad;
      case 56:
        return ae;
      case 57:
        return af;
      case 58:
        return ag;
      case 59:
        return ah;
      case 60:
        return ai;
      case 61:
        return aj;
      case 62:
        return ak;
      case 63:
        return al;
      case 64:
        return am;
      case 65:
        return an;
      case 66:
        return ao;
      case 67:
        return ap;
      case 68:
        return aq;
      case 69:
        return ar;
      case 70:
        return as;
      case 71:
        return at;
      case 72:
        return au;
      default:
        return av
      }
  }
  switch (c2) {
    case 0:
      return a;
    case 1:
      return b;
    case 2:
      return c;
    case 3:
      return d;
    case 4:
      return e;
    case 5:
      return f;
    case 6:
      return g;
    case 7:
      return h;
    case 8:
      return i;
    case 9:
      return j;
    case 10:
      return k;
    case 11:
      return l;
    case 12:
      return m;
    case 13:
      return n;
    case 14:
      return o;
    case 15:
      return p;
    case 16:
      return q;
    case 17:
      return r;
    case 18:
      return s;
    case 19:
      return t;
    case 20:
      return u;
    case 21:
      return v;
    case 22:
      return w;
    case 23:
      return x;
    case 24:
      return y;
    case 25:
      return z;
    case 26:
      return A;
    case 27:
      return B;
    case 28:
      return C;
    case 29:
      return D;
    case 30:
      return E;
    case 31:
      return F;
    case 32:
      return G;
    case 33:
      return H;
    case 34:
      return I;
    case 35:
      return J;
    default:return K
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
      return call4(Printf[4], bG, r, g, b);
    case 2:
      var match__0 = param[1];
      var b__0 = match__0[3];
      var g__0 = match__0[2];
      var r__0 = match__0[1];
      return call4(Printf[4], bH, r__0, g__0, b__0);
    case 3:
      var match__1 = param[1];
      var a = match__1[4];
      var b__1 = match__1[3];
      var g__1 = match__1[2];
      var r__1 = match__1[1];
      return call5(Printf[4], bI, r__1, g__1, b__1, a);
    case 4:
      var match__2 = param[1];
      var a__0 = match__2[4];
      var b__2 = match__2[3];
      var g__2 = match__2[2];
      var r__2 = match__2[1];
      return call5(Printf[4], bJ, r__2, g__2, b__2, a__0);
    case 5:
      var match__3 = param[1];
      var l = match__3[3];
      var s = match__3[2];
      var h = match__3[1];
      return call4(Printf[4], bK, h, s, l);
    default:
      var match__4 = param[1];
      var a__1 = match__4[4];
      var l__0 = match__4[3];
      var s__0 = match__4[2];
      var h__0 = match__4[1];
      return call5(Printf[4], bL, h__0, s__0, l__0, a__1)
    }
}

function hex_of_rgb(param) {
  var blue = param[3];
  var green = param[2];
  var red = param[1];
  function in_range(i) {
    var cZ = i < 0 ? 1 : 0;
    var c0 = cZ ? cZ : 255 < i ? 1 : 0;
    if (c0) {
      var c1 = call1(Pervasives[21], i);
      throw runtime["caml_wrap_thrown_exception"](
              [
                0,
                Invalid_argument,
                call2(Pervasives[16], c1, cst_is_out_of_valid_range)
              ]
            );
    }
    return c0;
  }
  in_range(red);
  in_range(green);
  in_range(blue);
  return call4(Printf[4], bM, red, green, blue);
}

function js_t_of_js_string(s) {
  var cB = 0;
  var cC = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d);
  var cD = Js_of_ocaml_Js[10];
  var rgb_re = function(t23, t22, param) {return new t23(t22);}(cD, cC, cB);
  var cE = 0;
  var cF = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d__0);
  var cG = Js_of_ocaml_Js[10];
  var rgb_pct_re = function(t21, t20, param) {return new t21(t20);}(cG, cF, cE
  );
  var cH = 0;
  var cI = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d);
  var cJ = Js_of_ocaml_Js[10];
  var rgba_re = function(t19, t18, param) {return new t19(t18);}(cJ, cI, cH);
  var cK = 0;
  var cL = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d__0);
  var cM = Js_of_ocaml_Js[10];
  var rgba_pct_re = function(t17, t16, param) {return new t17(t16);}(cM, cL, cK
  );
  var cN = 0;
  var cO = caml_jsbytes_of_string(cst_hsl_s_d_s_d_s_d);
  var cP = Js_of_ocaml_Js[10];
  var hsl_re = function(t15, t14, param) {return new t15(t14);}(cP, cO, cN);
  var cQ = 0;
  var cR = caml_jsbytes_of_string(cst_hsla_s_d_s_d_s_d_d_d);
  var cS = Js_of_ocaml_Js[10];
  var hsla_re = function(t13, t12, param) {return new t13(t12);}(cS, cR, cQ);
  function cT(x) {
    return call1(caml_get_public_method(x, -856045486, 282), x);
  }
  if (! (function(t1, t0, param) {return t1.test(t0);}(rgb_re, s, cT) | 0)) {
    var cU = function(x) {
      return call1(caml_get_public_method(x, -856045486, 283), x);
    };
    if (! (function(t3, t2, param) {return t3.test(t2);}(rgba_re, s, cU) | 0)) {
      var cV = function(x) {
        return call1(caml_get_public_method(x, -856045486, 284), x);
      };
      if (
      !
      (function(t5, t4, param) {return t5.test(t4);}(rgb_pct_re, s, cV) | 0)
      ) {
        var cW = function(x) {
          return call1(caml_get_public_method(x, -856045486, 285), x);
        };
        if (
        !
        (function(t7, t6, param) {return t7.test(t6);}(rgba_pct_re, s, cW) | 0)
        ) {
          var cX = function(x) {
            return call1(caml_get_public_method(x, -856045486, 286), x);
          };
          if (
          !
          (function(t9, t8, param) {return t9.test(t8);}(hsl_re, s, cX) | 0)
          ) {
            var cY = function(x) {
              return call1(caml_get_public_method(x, -856045486, 287), x);
            };
            if (
            !
            (function(t11, t10, param) {return t11.test(t10);}(hsla_re, s, cY) | 0)
            ) {
              if (call2(List[31], caml_js_to_string(s), bN)) {return s;}
              throw runtime["caml_wrap_thrown_exception"](
                      [
                        0,
                        Invalid_argument,
                        call2(
                          Pervasives[16],
                          caml_js_to_string(s),
                          cst_is_not_a_valid_color
                        )
                      ]
                    );
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
  try {var cr = [0,name_of_string(s)];return cr;}
  catch(cs) {
    cs = caml_wrap_exception(cs);
    if (cs[1] === Invalid_argument) {
      var fail = function(param) {
        throw runtime["caml_wrap_thrown_exception"](
                [
                  0,
                  Invalid_argument,
                  call2(Pervasives[16], s, cst_is_not_a_valid_color__0)
                ]
              );
      };
      var re_rgb = call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d);
      var re_rgb_pct = call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d__0);
      var re_hsl = call1(Js_of_ocaml_Regexp[1], cst_hsla_d_d_d_d_d);
      var i_of_s_o = function(param) {
        if (param) {
          var i = param[1];
          try {var cz = runtime["caml_int_of_string"](i);return cz;}
          catch(cA) {
            cA = caml_wrap_exception(cA);
            if (cA[1] === Invalid_argument) var s = cA[2];
            else {
              if (cA[1] !== Failure) {
                throw runtime["caml_wrap_thrown_exception_reraise"](cA);
              }
              var s = cA[2];
            }
            var cx = call2(Pervasives[16], cst, s);
            var cy = call2(Pervasives[16], i, cx);
            throw runtime["caml_wrap_thrown_exception"](
                    [
                      0,
                      Invalid_argument,
                      call2(Pervasives[16], cst_color_conversion_error, cy)
                    ]
                  );
          }
        }
        return fail(0);
      };
      var f_of_s = function(f) {
        try {var cv = caml_float_of_string(f);return cv;}
        catch(cw) {
          cw = caml_wrap_exception(cw);
          if (cw[1] === Invalid_argument) var s = cw[2];
          else {
            if (cw[1] !== Failure) {
              throw runtime["caml_wrap_thrown_exception_reraise"](cw);
            }
            var s = cw[2];
          }
          var ct = call2(Pervasives[16], cst__0, s);
          var cu = call2(Pervasives[16], f, ct);
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    call2(Pervasives[16], cst_color_conversion_error__0, cu)
                  ]
                );
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
          var b_ = match__0[1];
          if (! caml_string_notequal(b_, cst_rgb)) {
            if (alpha) {return fail(0);}
            var cd = i_of_s_o(blue);
            var ce = i_of_s_o(green);
            return [1,[0,i_of_s_o(red),ce,cd]];
          }
          if (! caml_string_notequal(b_, cst_rgba)) {
            if (alpha) {
              var a = alpha[1];
              var ca = f_of_s(a);
              var cb = i_of_s_o(blue);
              var cc = i_of_s_o(green);
              return [3,[0,i_of_s_o(red),cc,cb,ca]];
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
          var cf = match__2[1];
          if (! caml_string_notequal(cf, cst_rgb__0)) {
            if (alpha__0) {return fail(0);}
            var cj = i_of_s_o(blue__0);
            var ck = i_of_s_o(green__0);
            return [2,[0,i_of_s_o(red__0),ck,cj]];
          }
          if (! caml_string_notequal(cf, cst_rgba__0)) {
            if (alpha__0) {
              var a__0 = alpha__0[1];
              var cg = f_of_s(a__0);
              var ch = i_of_s_o(blue__0);
              var ci = i_of_s_o(green__0);
              return [4,[0,i_of_s_o(red__0),ci,ch,cg]];
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
          var cl = match__4[1];
          if (! caml_string_notequal(cl, cst_hsl)) {
            if (alpha__1) {return fail(0);}
            var cp = i_of_s_o(blue__1);
            var cq = i_of_s_o(green__1);
            return [5,[0,i_of_s_o(red__1),cq,cp]];
          }
          if (! caml_string_notequal(cl, cst_hsla)) {
            if (alpha__1) {
              var a__1 = alpha__1[1];
              var cm = f_of_s(a__1);
              var cn = i_of_s_o(blue__1);
              var co = i_of_s_o(green__1);
              return [6,[0,i_of_s_o(red__1),co,cn,cm]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      return fail(0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](cs);
  }
}

function string_of_t__0(param) {
  if (typeof param === "number") return cst_0;
  else switch (param[0]) {
    case 0:
      var f = param[1];
      return call3(Printf[4], bO, f, cst_em);
    case 1:
      var f__0 = param[1];
      return call3(Printf[4], bP, f__0, cst_ex);
    case 2:
      var f__1 = param[1];
      return call3(Printf[4], bQ, f__1, cst_px);
    case 3:
      var f__2 = param[1];
      return call3(Printf[4], bR, f__2, cst_gd);
    case 4:
      var f__3 = param[1];
      return call3(Printf[4], bS, f__3, cst_rem);
    case 5:
      var f__4 = param[1];
      return call3(Printf[4], bT, f__4, cst_vw);
    case 6:
      var f__5 = param[1];
      return call3(Printf[4], bU, f__5, cst_vh);
    case 7:
      var f__6 = param[1];
      return call3(Printf[4], bV, f__6, cst_vm);
    case 8:
      var f__7 = param[1];
      return call3(Printf[4], bW, f__7, cst_ch);
    case 9:
      var f__8 = param[1];
      return call3(Printf[4], bX, f__8, cst_mm);
    case 10:
      var f__9 = param[1];
      return call3(Printf[4], bY, f__9, cst_cm);
    case 11:
      var f__10 = param[1];
      return call3(Printf[4], bZ, f__10, cst_in);
    case 12:
      var f__11 = param[1];
      return call3(Printf[4], b0, f__11, cst_pt);
    default:
      var f__12 = param[1];
      return call3(Printf[4], b1, f__12, cst_pc)
    }
}

function js__0(t) {return string_of_t__0(t).toString();}

function ml__0(t) {
  var s = caml_js_to_string(t);
  if (runtime["caml_string_equal"](s, cst_0__0)) {return 0;}
  function fail(param) {
    throw runtime["caml_wrap_thrown_exception"](
            [
              0,
              Invalid_argument,
              call2(Pervasives[16], s, cst_is_not_a_valid_length)
            ]
          );
  }
  var re = call1(Js_of_ocaml_Regexp[1], cst_d_d_s_S);
  var match = call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var b8 = caml_float_of_string(f);}
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] === Invalid_argument) {
          var s__0 = exn[2];
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    call2(Pervasives[16], cst_length_conversion_error, s__0)
                  ]
                );
        }
        throw runtime["caml_wrap_thrown_exception_reraise"](exn);
      }
      var f__0 = b8;
    }
    else var f__0 = fail(0);
    var match__1 = call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var b9 = match__1[1];
      var switch__0 = caml_string_compare(b9, cst_pc__0);
      if (0 <= switch__0) {
        if (! (0 < switch__0)) {return [13,f__0];}
        if (! caml_string_notequal(b9, cst_pt__0)) {return [12,f__0];}
        if (! caml_string_notequal(b9, cst_px__0)) {return [2,f__0];}
        if (! caml_string_notequal(b9, cst_rem__0)) {return [4,f__0];}
        if (! caml_string_notequal(b9, cst_vh__0)) {return [6,f__0];}
        if (! caml_string_notequal(b9, cst_vm__0)) {return [7,f__0];}
        if (! caml_string_notequal(b9, cst_vw__0)) {return [5,f__0];}
      }
      else {
        if (! caml_string_notequal(b9, cst_ch__0)) {return [8,f__0];}
        if (! caml_string_notequal(b9, cst_cm__0)) {return [10,f__0];}
        if (! caml_string_notequal(b9, cst_em__0)) {return [0,f__0];}
        if (! caml_string_notequal(b9, cst_ex__0)) {return [1,f__0];}
        if (! caml_string_notequal(b9, cst_gd__0)) {return [3,f__0];}
        if (! caml_string_notequal(b9, cst_in__0)) {return [11,f__0];}
        if (! caml_string_notequal(b9, cst_mm__0)) {return [9,f__0];}
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
      return call3(Printf[4], b2, f, cst_deg);
    case 1:
      var f__0 = param[1];
      return call3(Printf[4], b3, f__0, cst_grad);
    case 2:
      var f__1 = param[1];
      return call3(Printf[4], b4, f__1, cst_rad);
    default:
      var f__2 = param[1];
      return call3(Printf[4], b5, f__2, cst_turns)
    }
}

function js__1(t) {return string_of_t__1(t).toString();}

function ml__1(j) {
  var s = caml_js_to_string(j);
  var re = call1(Js_of_ocaml_Regexp[1], cst_d_d_deg_grad_rad_turns);
  function fail(param) {
    throw runtime["caml_wrap_thrown_exception"](
            [
              0,
              Invalid_argument,
              call2(Pervasives[16], s, cst_is_not_a_valid_length__0)
            ]
          );
  }
  var match = call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var b6 = caml_float_of_string(f);}
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] === Invalid_argument) {
          var s__0 = exn[2];
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    call2(Pervasives[16], cst_length_conversion_error__0, s__0)
                  ]
                );
        }
        throw runtime["caml_wrap_thrown_exception_reraise"](exn);
      }
      var f__0 = b6;
    }
    else var f__0 = fail(0);
    var match__1 = call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var b7 = match__1[1];
      if (! caml_string_notequal(b7, cst_deg__0)) {return [0,f__0];}
      if (! caml_string_notequal(b7, cst_grad__0)) {return [1,f__0];}
      if (! caml_string_notequal(b7, cst_rad__0)) {return [2,f__0];}
      if (! caml_string_notequal(b7, cst_turns__0)) {return [3,f__0];}
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

runtime["caml_register_global"](547, Js_of_ocaml_CSS, "Js_of_ocaml__CSS");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__CSS;