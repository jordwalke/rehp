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

function caml_call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_is_not_a_valid_length__0 = caml_new_string(" is not a valid length");
var cst_d_d_deg_grad_rad_turns = caml_new_string(
  "^(\\d*(?:\\.\\d*))(deg|grad|rad|turns)$"
);
var cst_length_conversion_error__0 = caml_new_string(
  "length conversion error: "
);
var cst_deg__0 = caml_new_string("deg");
var cst_grad__0 = caml_new_string("grad");
var cst_rad__0 = caml_new_string("rad");
var cst_turns__0 = caml_new_string("turns");
var cst_deg = caml_new_string("deg");
var cst_grad = caml_new_string("grad");
var cst_rad = caml_new_string("rad");
var cst_turns = caml_new_string("turns");
var cst_is_not_a_valid_length = caml_new_string(" is not a valid length");
var cst_0__0 = caml_new_string("0");
var cst_d_d_s_S = caml_new_string("^(\\d*(?:\\.\\d*)?)\\s*(\\S*)$");
var cst_length_conversion_error = caml_new_string("length conversion error: ");
var cst_pc__0 = caml_new_string("pc");
var cst_ch__0 = caml_new_string("ch");
var cst_cm__0 = caml_new_string("cm");
var cst_em__0 = caml_new_string("em");
var cst_ex__0 = caml_new_string("ex");
var cst_gd__0 = caml_new_string("gd");
var cst_in__0 = caml_new_string("in");
var cst_mm__0 = caml_new_string("mm");
var cst_pt__0 = caml_new_string("pt");
var cst_px__0 = caml_new_string("px");
var cst_rem__0 = caml_new_string("rem");
var cst_vh__0 = caml_new_string("vh");
var cst_vm__0 = caml_new_string("vm");
var cst_vw__0 = caml_new_string("vw");
var cst_0 = caml_new_string("0");
var cst_em = caml_new_string("em");
var cst_ex = caml_new_string("ex");
var cst_px = caml_new_string("px");
var cst_gd = caml_new_string("gd");
var cst_rem = caml_new_string("rem");
var cst_vw = caml_new_string("vw");
var cst_vh = caml_new_string("vh");
var cst_vm = caml_new_string("vm");
var cst_ch = caml_new_string("ch");
var cst_mm = caml_new_string("mm");
var cst_cm = caml_new_string("cm");
var cst_in = caml_new_string("in");
var cst_pt = caml_new_string("pt");
var cst_pc = caml_new_string("pc");
var cst__0 = caml_new_string("): ");
var cst_color_conversion_error__0 = caml_new_string("color conversion error ("
);
var cst = caml_new_string("): ");
var cst_color_conversion_error = caml_new_string("color conversion error (");
var cst_is_not_a_valid_color__0 = caml_new_string(" is not a valid color");
var cst_rgba_d_d_d_d_d = caml_new_string(
  "(rgba?)\\((?:(\\d*),(\\d*),(\\d*)(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_rgba_d_d_d_d_d__0 = caml_new_string(
  "(rgba?)\\((?:(\\d*)%,(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_hsla_d_d_d_d_d = caml_new_string(
  "(hsla?)\\((?:(\\d*),(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
);
var cst_rgb = caml_new_string("rgb");
var cst_rgba = caml_new_string("rgba");
var cst_rgb__0 = caml_new_string("rgb");
var cst_rgba__0 = caml_new_string("rgba");
var cst_hsl = caml_new_string("hsl");
var cst_hsla = caml_new_string("hsla");
var cst_rgb_s_d_s_d_s_d = caml_new_string(
  "^rgb\\(\\s*\\d*,\\s*\\d*,\\s*\\d*\\)$"
);
var cst_rgb_s_d_s_d_s_d__0 = caml_new_string(
  "^rgb\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%\\)$"
);
var cst_rgba_s_d_s_d_s_d_d_d = caml_new_string(
  "^rgba\\(\\s*\\d*,\\s*\\d*,\\s*\\d*,\\d*\\.?\\d*\\)$"
);
var cst_rgba_s_d_s_d_s_d_d_d__0 = caml_new_string(
  "^rgba\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)$"
);
var cst_hsl_s_d_s_d_s_d = caml_new_string(
  "^hsl\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%\\)$"
);
var cst_hsla_s_d_s_d_s_d_d_d = caml_new_string(
  "^hsla\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)$"
);
var cst_is_not_a_valid_color = caml_new_string(" is not a valid color");
var cst_is_out_of_valid_range = caml_new_string(" is out of valid range");
var partial = [8,0,0,0,[12,41,0]];
var partial__0 = [12,41,0];
var cst_lightgrey__0 = caml_new_string("lightgrey");
var cst_darkslategray__0 = caml_new_string("darkslategray");
var cst_cornsilk__0 = caml_new_string("cornsilk");
var cst_blue__0 = caml_new_string("blue");
var cst_aliceblue__0 = caml_new_string("aliceblue");
var cst_antiquewhite__0 = caml_new_string("antiquewhite");
var cst_aqua__0 = caml_new_string("aqua");
var cst_aquamarine__0 = caml_new_string("aquamarine");
var cst_azure__0 = caml_new_string("azure");
var cst_beige__0 = caml_new_string("beige");
var cst_bisque__0 = caml_new_string("bisque");
var cst_black__0 = caml_new_string("black");
var cst_blanchedalmond__0 = caml_new_string("blanchedalmond");
var cst_blueviolet__0 = caml_new_string("blueviolet");
var cst_brown__0 = caml_new_string("brown");
var cst_burlywood__0 = caml_new_string("burlywood");
var cst_cadetblue__0 = caml_new_string("cadetblue");
var cst_chartreuse__0 = caml_new_string("chartreuse");
var cst_chocolate__0 = caml_new_string("chocolate");
var cst_coral__0 = caml_new_string("coral");
var cst_cornflowerblue__0 = caml_new_string("cornflowerblue");
var cst_darkkhaki__0 = caml_new_string("darkkhaki");
var cst_crimson__0 = caml_new_string("crimson");
var cst_cyan__0 = caml_new_string("cyan");
var cst_darkblue__0 = caml_new_string("darkblue");
var cst_darkcyan__0 = caml_new_string("darkcyan");
var cst_darkgoldenrod__0 = caml_new_string("darkgoldenrod");
var cst_darkgray__0 = caml_new_string("darkgray");
var cst_darkgreen__0 = caml_new_string("darkgreen");
var cst_darkgrey__0 = caml_new_string("darkgrey");
var cst_darkmagenta__0 = caml_new_string("darkmagenta");
var cst_darkolivegreen__0 = caml_new_string("darkolivegreen");
var cst_darkorange__0 = caml_new_string("darkorange");
var cst_darkorchid__0 = caml_new_string("darkorchid");
var cst_darkred__0 = caml_new_string("darkred");
var cst_darksalmon__0 = caml_new_string("darksalmon");
var cst_darkseagreen__0 = caml_new_string("darkseagreen");
var cst_darkslateblue__0 = caml_new_string("darkslateblue");
var cst_greenyellow__0 = caml_new_string("greenyellow");
var cst_floralwhite__0 = caml_new_string("floralwhite");
var cst_darkslategrey__0 = caml_new_string("darkslategrey");
var cst_darkturquoise__0 = caml_new_string("darkturquoise");
var cst_darkviolet__0 = caml_new_string("darkviolet");
var cst_deeppink__0 = caml_new_string("deeppink");
var cst_deepskyblue__0 = caml_new_string("deepskyblue");
var cst_dimgray__0 = caml_new_string("dimgray");
var cst_dimgrey__0 = caml_new_string("dimgrey");
var cst_dodgerblue__0 = caml_new_string("dodgerblue");
var cst_firebrick__0 = caml_new_string("firebrick");
var cst_forestgreen__0 = caml_new_string("forestgreen");
var cst_fuchsia__0 = caml_new_string("fuchsia");
var cst_gainsboro__0 = caml_new_string("gainsboro");
var cst_ghostwhite__0 = caml_new_string("ghostwhite");
var cst_gold__0 = caml_new_string("gold");
var cst_goldenrod__0 = caml_new_string("goldenrod");
var cst_gray__0 = caml_new_string("gray");
var cst_green__0 = caml_new_string("green");
var cst_lavenderblush__0 = caml_new_string("lavenderblush");
var cst_grey__0 = caml_new_string("grey");
var cst_honeydew__0 = caml_new_string("honeydew");
var cst_hotpink__0 = caml_new_string("hotpink");
var cst_indianred__0 = caml_new_string("indianred");
var cst_indigo__0 = caml_new_string("indigo");
var cst_ivory__0 = caml_new_string("ivory");
var cst_khaki__0 = caml_new_string("khaki");
var cst_lavender__0 = caml_new_string("lavender");
var cst_lawngreen__0 = caml_new_string("lawngreen");
var cst_lemonchiffon__0 = caml_new_string("lemonchiffon");
var cst_lightblue__0 = caml_new_string("lightblue");
var cst_lightcoral__0 = caml_new_string("lightcoral");
var cst_lightcyan__0 = caml_new_string("lightcyan");
var cst_lightgoldenrodyellow__0 = caml_new_string("lightgoldenrodyellow");
var cst_lightgray__0 = caml_new_string("lightgray");
var cst_lightgreen__0 = caml_new_string("lightgreen");
var cst_paleturquoise__0 = caml_new_string("paleturquoise");
var cst_mediumslateblue__0 = caml_new_string("mediumslateblue");
var cst_limegreen__0 = caml_new_string("limegreen");
var cst_lightpink__0 = caml_new_string("lightpink");
var cst_lightsalmon__0 = caml_new_string("lightsalmon");
var cst_lightseagreen__0 = caml_new_string("lightseagreen");
var cst_lightskyblue__0 = caml_new_string("lightskyblue");
var cst_lightslategray__0 = caml_new_string("lightslategray");
var cst_lightslategrey__0 = caml_new_string("lightslategrey");
var cst_lightsteelblue__0 = caml_new_string("lightsteelblue");
var cst_lightyellow__0 = caml_new_string("lightyellow");
var cst_lime__0 = caml_new_string("lime");
var cst_linen__0 = caml_new_string("linen");
var cst_magenta__0 = caml_new_string("magenta");
var cst_maroon__0 = caml_new_string("maroon");
var cst_mediumaquamarine__0 = caml_new_string("mediumaquamarine");
var cst_mediumblue__0 = caml_new_string("mediumblue");
var cst_mediumorchid__0 = caml_new_string("mediumorchid");
var cst_mediumpurple__0 = caml_new_string("mediumpurple");
var cst_mediumseagreen__0 = caml_new_string("mediumseagreen");
var cst_navy__0 = caml_new_string("navy");
var cst_mediumspringgreen__0 = caml_new_string("mediumspringgreen");
var cst_mediumturquoise__0 = caml_new_string("mediumturquoise");
var cst_mediumvioletred__0 = caml_new_string("mediumvioletred");
var cst_midnightblue__0 = caml_new_string("midnightblue");
var cst_mintcream__0 = caml_new_string("mintcream");
var cst_mistyrose__0 = caml_new_string("mistyrose");
var cst_moccasin__0 = caml_new_string("moccasin");
var cst_navajowhite__0 = caml_new_string("navajowhite");
var cst_oldlace__0 = caml_new_string("oldlace");
var cst_olive__0 = caml_new_string("olive");
var cst_olivedrab__0 = caml_new_string("olivedrab");
var cst_orange__0 = caml_new_string("orange");
var cst_orangered__0 = caml_new_string("orangered");
var cst_orchid__0 = caml_new_string("orchid");
var cst_palegoldenrod__0 = caml_new_string("palegoldenrod");
var cst_palegreen__0 = caml_new_string("palegreen");
var cst_skyblue__0 = caml_new_string("skyblue");
var cst_rosybrown__0 = caml_new_string("rosybrown");
var cst_palevioletred__0 = caml_new_string("palevioletred");
var cst_papayawhip__0 = caml_new_string("papayawhip");
var cst_peachpuff__0 = caml_new_string("peachpuff");
var cst_peru__0 = caml_new_string("peru");
var cst_pink__0 = caml_new_string("pink");
var cst_plum__0 = caml_new_string("plum");
var cst_powderblue__0 = caml_new_string("powderblue");
var cst_purple__0 = caml_new_string("purple");
var cst_red__0 = caml_new_string("red");
var cst_royalblue__0 = caml_new_string("royalblue");
var cst_saddlebrown__0 = caml_new_string("saddlebrown");
var cst_salmon__0 = caml_new_string("salmon");
var cst_sandybrown__0 = caml_new_string("sandybrown");
var cst_seagreen__0 = caml_new_string("seagreen");
var cst_seashell__0 = caml_new_string("seashell");
var cst_sienna__0 = caml_new_string("sienna");
var cst_silver__0 = caml_new_string("silver");
var cst_thistle__0 = caml_new_string("thistle");
var cst_slateblue__0 = caml_new_string("slateblue");
var cst_slategray__0 = caml_new_string("slategray");
var cst_slategrey__0 = caml_new_string("slategrey");
var cst_snow__0 = caml_new_string("snow");
var cst_springgreen__0 = caml_new_string("springgreen");
var cst_steelblue__0 = caml_new_string("steelblue");
var cst_tan__0 = caml_new_string("tan");
var cst_teal__0 = caml_new_string("teal");
var cst_tomato__0 = caml_new_string("tomato");
var cst_turquoise__0 = caml_new_string("turquoise");
var cst_violet__0 = caml_new_string("violet");
var cst_wheat__0 = caml_new_string("wheat");
var cst_white__0 = caml_new_string("white");
var cst_whitesmoke__0 = caml_new_string("whitesmoke");
var cst_yellow__0 = caml_new_string("yellow");
var cst_yellowgreen__0 = caml_new_string("yellowgreen");
var cst_is_not_a_valid_color_name = caml_new_string(
  " is not a valid color name"
);
var cst_aliceblue = caml_new_string("aliceblue");
var cst_antiquewhite = caml_new_string("antiquewhite");
var cst_aqua = caml_new_string("aqua");
var cst_aquamarine = caml_new_string("aquamarine");
var cst_azure = caml_new_string("azure");
var cst_beige = caml_new_string("beige");
var cst_bisque = caml_new_string("bisque");
var cst_black = caml_new_string("black");
var cst_blanchedalmond = caml_new_string("blanchedalmond");
var cst_blue = caml_new_string("blue");
var cst_blueviolet = caml_new_string("blueviolet");
var cst_brown = caml_new_string("brown");
var cst_burlywood = caml_new_string("burlywood");
var cst_cadetblue = caml_new_string("cadetblue");
var cst_chartreuse = caml_new_string("chartreuse");
var cst_chocolate = caml_new_string("chocolate");
var cst_coral = caml_new_string("coral");
var cst_cornflowerblue = caml_new_string("cornflowerblue");
var cst_cornsilk = caml_new_string("cornsilk");
var cst_crimson = caml_new_string("crimson");
var cst_cyan = caml_new_string("cyan");
var cst_darkblue = caml_new_string("darkblue");
var cst_darkcyan = caml_new_string("darkcyan");
var cst_darkgoldenrod = caml_new_string("darkgoldenrod");
var cst_darkgray = caml_new_string("darkgray");
var cst_darkgreen = caml_new_string("darkgreen");
var cst_darkgrey = caml_new_string("darkgrey");
var cst_darkkhaki = caml_new_string("darkkhaki");
var cst_darkmagenta = caml_new_string("darkmagenta");
var cst_darkolivegreen = caml_new_string("darkolivegreen");
var cst_darkorange = caml_new_string("darkorange");
var cst_darkorchid = caml_new_string("darkorchid");
var cst_darkred = caml_new_string("darkred");
var cst_darksalmon = caml_new_string("darksalmon");
var cst_darkseagreen = caml_new_string("darkseagreen");
var cst_darkslateblue = caml_new_string("darkslateblue");
var cst_darkslategray = caml_new_string("darkslategray");
var cst_darkslategrey = caml_new_string("darkslategrey");
var cst_darkturquoise = caml_new_string("darkturquoise");
var cst_darkviolet = caml_new_string("darkviolet");
var cst_deeppink = caml_new_string("deeppink");
var cst_deepskyblue = caml_new_string("deepskyblue");
var cst_dimgray = caml_new_string("dimgray");
var cst_dimgrey = caml_new_string("dimgrey");
var cst_dodgerblue = caml_new_string("dodgerblue");
var cst_firebrick = caml_new_string("firebrick");
var cst_floralwhite = caml_new_string("floralwhite");
var cst_forestgreen = caml_new_string("forestgreen");
var cst_fuchsia = caml_new_string("fuchsia");
var cst_gainsboro = caml_new_string("gainsboro");
var cst_ghostwhite = caml_new_string("ghostwhite");
var cst_gold = caml_new_string("gold");
var cst_goldenrod = caml_new_string("goldenrod");
var cst_gray = caml_new_string("gray");
var cst_grey = caml_new_string("grey");
var cst_green = caml_new_string("green");
var cst_greenyellow = caml_new_string("greenyellow");
var cst_honeydew = caml_new_string("honeydew");
var cst_hotpink = caml_new_string("hotpink");
var cst_indianred = caml_new_string("indianred");
var cst_indigo = caml_new_string("indigo");
var cst_ivory = caml_new_string("ivory");
var cst_khaki = caml_new_string("khaki");
var cst_lavender = caml_new_string("lavender");
var cst_lavenderblush = caml_new_string("lavenderblush");
var cst_lawngreen = caml_new_string("lawngreen");
var cst_lemonchiffon = caml_new_string("lemonchiffon");
var cst_lightblue = caml_new_string("lightblue");
var cst_lightcoral = caml_new_string("lightcoral");
var cst_lightcyan = caml_new_string("lightcyan");
var cst_lightgoldenrodyellow = caml_new_string("lightgoldenrodyellow");
var cst_lightgray = caml_new_string("lightgray");
var cst_lightgreen = caml_new_string("lightgreen");
var cst_lightgrey = caml_new_string("lightgrey");
var cst_lightpink = caml_new_string("lightpink");
var cst_lightsalmon = caml_new_string("lightsalmon");
var cst_lightseagreen = caml_new_string("lightseagreen");
var cst_lightskyblue = caml_new_string("lightskyblue");
var cst_lightslategray = caml_new_string("lightslategray");
var cst_lightslategrey = caml_new_string("lightslategrey");
var cst_lightsteelblue = caml_new_string("lightsteelblue");
var cst_lightyellow = caml_new_string("lightyellow");
var cst_lime = caml_new_string("lime");
var cst_limegreen = caml_new_string("limegreen");
var cst_linen = caml_new_string("linen");
var cst_magenta = caml_new_string("magenta");
var cst_maroon = caml_new_string("maroon");
var cst_mediumaquamarine = caml_new_string("mediumaquamarine");
var cst_mediumblue = caml_new_string("mediumblue");
var cst_mediumorchid = caml_new_string("mediumorchid");
var cst_mediumpurple = caml_new_string("mediumpurple");
var cst_mediumseagreen = caml_new_string("mediumseagreen");
var cst_mediumslateblue = caml_new_string("mediumslateblue");
var cst_mediumspringgreen = caml_new_string("mediumspringgreen");
var cst_mediumturquoise = caml_new_string("mediumturquoise");
var cst_mediumvioletred = caml_new_string("mediumvioletred");
var cst_midnightblue = caml_new_string("midnightblue");
var cst_mintcream = caml_new_string("mintcream");
var cst_mistyrose = caml_new_string("mistyrose");
var cst_moccasin = caml_new_string("moccasin");
var cst_navajowhite = caml_new_string("navajowhite");
var cst_navy = caml_new_string("navy");
var cst_oldlace = caml_new_string("oldlace");
var cst_olive = caml_new_string("olive");
var cst_olivedrab = caml_new_string("olivedrab");
var cst_orange = caml_new_string("orange");
var cst_orangered = caml_new_string("orangered");
var cst_orchid = caml_new_string("orchid");
var cst_palegoldenrod = caml_new_string("palegoldenrod");
var cst_palegreen = caml_new_string("palegreen");
var cst_paleturquoise = caml_new_string("paleturquoise");
var cst_palevioletred = caml_new_string("palevioletred");
var cst_papayawhip = caml_new_string("papayawhip");
var cst_peachpuff = caml_new_string("peachpuff");
var cst_peru = caml_new_string("peru");
var cst_pink = caml_new_string("pink");
var cst_plum = caml_new_string("plum");
var cst_powderblue = caml_new_string("powderblue");
var cst_purple = caml_new_string("purple");
var cst_red = caml_new_string("red");
var cst_rosybrown = caml_new_string("rosybrown");
var cst_royalblue = caml_new_string("royalblue");
var cst_saddlebrown = caml_new_string("saddlebrown");
var cst_salmon = caml_new_string("salmon");
var cst_sandybrown = caml_new_string("sandybrown");
var cst_seagreen = caml_new_string("seagreen");
var cst_seashell = caml_new_string("seashell");
var cst_sienna = caml_new_string("sienna");
var cst_silver = caml_new_string("silver");
var cst_skyblue = caml_new_string("skyblue");
var cst_slateblue = caml_new_string("slateblue");
var cst_slategray = caml_new_string("slategray");
var cst_slategrey = caml_new_string("slategrey");
var cst_snow = caml_new_string("snow");
var cst_springgreen = caml_new_string("springgreen");
var cst_steelblue = caml_new_string("steelblue");
var cst_tan = caml_new_string("tan");
var cst_teal = caml_new_string("teal");
var cst_thistle = caml_new_string("thistle");
var cst_tomato = caml_new_string("tomato");
var cst_turquoise = caml_new_string("turquoise");
var cst_violet = caml_new_string("violet");
var cst_wheat = caml_new_string("wheat");
var cst_white = caml_new_string("white");
var cst_whitesmoke = caml_new_string("whitesmoke");
var cst_yellow = caml_new_string("yellow");
var cst_yellowgreen = caml_new_string("yellowgreen");
var Pervasives = global_data["Pervasives"];
var Invalid_argument = global_data["Invalid_argument"];
var Js_of_ocaml_Regexp = global_data["Js_of_ocaml__Regexp"];
var Printf = global_data["Printf"];
var Failure = global_data["Failure"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var List = global_data["List_"];
var d8 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d9 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d_ = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var ea = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dU = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dV = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dW = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dX = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dY = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dZ = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d0 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d1 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d2 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d3 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d4 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d5 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d6 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var d7 = [0,[8,0,0,0,[2,0,0]],caml_new_string("%f%s")];
var dT = caml_list_of_js_array(
  [
    caml_new_string("aliceblue"),
    caml_new_string("antiquewhite"),
    caml_new_string("aqua"),
    caml_new_string("aquamarine"),
    caml_new_string("azure"),
    caml_new_string("beige"),
    caml_new_string("bisque"),
    caml_new_string("black"),
    caml_new_string("blanchedalmond"),
    caml_new_string("blue"),
    caml_new_string("blueviolet"),
    caml_new_string("brown"),
    caml_new_string("burlywood"),
    caml_new_string("cadetblue"),
    caml_new_string("chartreuse"),
    caml_new_string("chocolate"),
    caml_new_string("coral"),
    caml_new_string("cornflowerblue"),
    caml_new_string("cornsilk"),
    caml_new_string("crimson"),
    caml_new_string("cyan"),
    caml_new_string("darkblue"),
    caml_new_string("darkcyan"),
    caml_new_string("darkgoldenrod"),
    caml_new_string("darkgray"),
    caml_new_string("darkgreen"),
    caml_new_string("darkgrey"),
    caml_new_string("darkkhaki"),
    caml_new_string("darkmagenta"),
    caml_new_string("darkolivegreen"),
    caml_new_string("darkorange"),
    caml_new_string("darkorchid"),
    caml_new_string("darkred"),
    caml_new_string("darksalmon"),
    caml_new_string("darkseagreen"),
    caml_new_string("darkslateblue"),
    caml_new_string("darkslategray"),
    caml_new_string("darkslategrey"),
    caml_new_string("darkturquoise"),
    caml_new_string("darkviolet"),
    caml_new_string("deeppink"),
    caml_new_string("deepskyblue"),
    caml_new_string("dimgray"),
    caml_new_string("dimgrey"),
    caml_new_string("dodgerblue"),
    caml_new_string("firebrick"),
    caml_new_string("floralwhite"),
    caml_new_string("forestgreen"),
    caml_new_string("fuchsia"),
    caml_new_string("gainsboro"),
    caml_new_string("ghostwhite"),
    caml_new_string("gold"),
    caml_new_string("goldenrod"),
    caml_new_string("gray"),
    caml_new_string("green"),
    caml_new_string("greenyellow"),
    caml_new_string("grey"),
    caml_new_string("honeydew"),
    caml_new_string("hotpink"),
    caml_new_string("indianred"),
    caml_new_string("indigo"),
    caml_new_string("ivory"),
    caml_new_string("khaki"),
    caml_new_string("lavender"),
    caml_new_string("lavenderblush"),
    caml_new_string("lawngreen"),
    caml_new_string("lemonchiffon"),
    caml_new_string("lightblue"),
    caml_new_string("lightcoral"),
    caml_new_string("lightcyan"),
    caml_new_string("lightgoldenrodyellow"),
    caml_new_string("lightgray"),
    caml_new_string("lightgreen"),
    caml_new_string("lightgrey"),
    caml_new_string("lightpink"),
    caml_new_string("lightsalmon"),
    caml_new_string("lightseagreen"),
    caml_new_string("lightskyblue"),
    caml_new_string("lightslategray"),
    caml_new_string("lightslategrey"),
    caml_new_string("lightsteelblue"),
    caml_new_string("lightyellow"),
    caml_new_string("lime"),
    caml_new_string("limegreen"),
    caml_new_string("linen"),
    caml_new_string("magenta"),
    caml_new_string("maroon"),
    caml_new_string("mediumaquamarine"),
    caml_new_string("mediumblue"),
    caml_new_string("mediumorchid"),
    caml_new_string("mediumpurple"),
    caml_new_string("mediumseagreen"),
    caml_new_string("mediumslateblue"),
    caml_new_string("mediumspringgreen"),
    caml_new_string("mediumturquoise"),
    caml_new_string("mediumvioletred"),
    caml_new_string("midnightblue"),
    caml_new_string("mintcream"),
    caml_new_string("mistyrose"),
    caml_new_string("moccasin"),
    caml_new_string("navajowhite"),
    caml_new_string("navy"),
    caml_new_string("oldlace"),
    caml_new_string("olive"),
    caml_new_string("olivedrab"),
    caml_new_string("orange"),
    caml_new_string("orangered"),
    caml_new_string("orchid"),
    caml_new_string("palegoldenrod"),
    caml_new_string("palegreen"),
    caml_new_string("paleturquoise"),
    caml_new_string("palevioletred"),
    caml_new_string("papayawhip"),
    caml_new_string("peachpuff"),
    caml_new_string("peru"),
    caml_new_string("pink"),
    caml_new_string("plum"),
    caml_new_string("powderblue"),
    caml_new_string("purple"),
    caml_new_string("red"),
    caml_new_string("rosybrown"),
    caml_new_string("royalblue"),
    caml_new_string("saddlebrown"),
    caml_new_string("salmon"),
    caml_new_string("sandybrown"),
    caml_new_string("seagreen"),
    caml_new_string("seashell"),
    caml_new_string("sienna"),
    caml_new_string("silver"),
    caml_new_string("skyblue"),
    caml_new_string("slateblue"),
    caml_new_string("slategray"),
    caml_new_string("slategrey"),
    caml_new_string("snow"),
    caml_new_string("springgreen"),
    caml_new_string("steelblue"),
    caml_new_string("tan"),
    caml_new_string("teal"),
    caml_new_string("thistle"),
    caml_new_string("tomato"),
    caml_new_string("turquoise"),
    caml_new_string("violet"),
    caml_new_string("wheat"),
    caml_new_string("white"),
    caml_new_string("whitesmoke"),
    caml_new_string("yellow"),
    caml_new_string("yellowgreen")
  ]
);
var dS = [
  0,
  [12,35,[4,8,[0,2,2],0,[4,8,[0,2,2],0,[4,8,[0,2,2],0,0]]]],
  caml_new_string("#%02X%02X%02X")
];
var dM = [
  0,
  [
    11,
    caml_new_string("rgb("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,41,0]]]]]]
  ],
  caml_new_string("rgb(%d,%d,%d)")
];
var dN = [
  0,
  [
    11,
    caml_new_string("rgb("),
    [
      4,
      0,
      0,
      0,
      [12,37,[12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,41,0]]]]]]]]
    ]
  ],
  caml_new_string("rgb(%d%%,%d%%,%d%%)")
];
var dO = [
  0,
  [
    11,
    caml_new_string("rgba("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,44,[4,0,0,0,[12,44,[8,0,0,0,[12,41,0]]]]]]]]
  ],
  caml_new_string("rgba(%d,%d,%d,%f)")
];
var dP = [
  0,
  [
    11,
    caml_new_string("rgba("),
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
  caml_new_string("rgba(%d%%,%d%%,%d%%,%f)")
];
var dQ = [
  0,
  [
    11,
    caml_new_string("hsl("),
    [4,0,0,0,[12,44,[4,0,0,0,[12,37,[12,44,[4,0,0,0,[12,37,[12,41,0]]]]]]]]
  ],
  caml_new_string("hsl(%d,%d%%,%d%%)")
];
var dR = [
  0,
  [
    11,
    caml_new_string("hsla("),
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
  caml_new_string("hsla(%d,%d%%,%d%%,%f)")
];
var bq = [0,240,248,255];
var br = [0,250,235,215];
var bs = [0,0,255,255];
var bt = [0,127,255,212];
var bu = [0,240,255,255];
var bv = [0,245,245,220];
var bw = [0,255,228,196];
var bx = [0,0,0,0];
var by = [0,255,235,205];
var bz = [0,0,0,255];
var bA = [0,138,43,226];
var bB = [0,165,42,42];
var bC = [0,222,184,135];
var bD = [0,95,158,160];
var bE = [0,127,255,0];
var bF = [0,210,105,30];
var bG = [0,255,127,80];
var bH = [0,100,149,237];
var bI = [0,255,248,220];
var bJ = [0,220,20,60];
var bK = [0,0,255,255];
var bL = [0,0,0,139];
var bM = [0,0,139,139];
var bN = [0,184,134,11];
var bO = [0,169,169,169];
var bP = [0,0,100,0];
var bQ = [0,169,169,169];
var bR = [0,189,183,107];
var bS = [0,139,0,139];
var bT = [0,85,107,47];
var bU = [0,255,140,0];
var bV = [0,153,50,204];
var bW = [0,139,0,0];
var bX = [0,233,150,122];
var bY = [0,143,188,143];
var bZ = [0,72,61,139];
var b0 = [0,47,79,79];
var b1 = [0,47,79,79];
var b2 = [0,0,206,209];
var b3 = [0,148,0,211];
var b4 = [0,255,20,147];
var b5 = [0,0,191,255];
var b6 = [0,105,105,105];
var b7 = [0,105,105,105];
var b8 = [0,30,144,255];
var b9 = [0,178,34,34];
var b_ = [0,255,250,240];
var ca = [0,34,139,34];
var cb = [0,255,0,255];
var cc = [0,220,220,220];
var cd = [0,248,248,255];
var ce = [0,255,215,0];
var cf = [0,218,165,32];
var cg = [0,128,128,128];
var ch = [0,128,128,128];
var ci = [0,0,128,0];
var cj = [0,173,255,47];
var ck = [0,240,255,240];
var cl = [0,255,105,180];
var cm = [0,205,92,92];
var cn = [0,75,0,130];
var co = [0,255,255,240];
var cp = [0,240,230,140];
var cq = [0,230,230,250];
var cr = [0,255,240,245];
var cs = [0,124,252,0];
var ct = [0,255,250,205];
var cu = [0,173,216,230];
var cv = [0,240,128,128];
var cw = [0,224,255,255];
var cx = [0,250,250,210];
var cy = [0,211,211,211];
var cz = [0,144,238,144];
var cA = [0,211,211,211];
var cB = [0,255,182,193];
var cC = [0,255,160,122];
var cD = [0,32,178,170];
var cE = [0,135,206,250];
var cF = [0,119,136,153];
var cG = [0,119,136,153];
var cH = [0,176,196,222];
var cI = [0,255,255,224];
var cJ = [0,0,255,0];
var cK = [0,50,205,50];
var cL = [0,250,240,230];
var cM = [0,255,0,255];
var cN = [0,128,0,0];
var cO = [0,102,205,170];
var cP = [0,0,0,205];
var cQ = [0,186,85,211];
var cR = [0,147,112,219];
var cS = [0,60,179,113];
var cT = [0,123,104,238];
var cU = [0,0,250,154];
var cV = [0,72,209,204];
var cW = [0,199,21,133];
var cX = [0,25,25,112];
var cY = [0,245,255,250];
var cZ = [0,255,228,225];
var c0 = [0,255,228,181];
var c1 = [0,255,222,173];
var c2 = [0,0,0,128];
var c3 = [0,253,245,230];
var c4 = [0,128,128,0];
var c5 = [0,107,142,35];
var c6 = [0,255,165,0];
var c7 = [0,255,69,0];
var c8 = [0,218,112,214];
var c9 = [0,238,232,170];
var c_ = [0,152,251,152];
var da = [0,175,238,238];
var db = [0,219,112,147];
var dc = [0,255,239,213];
var dd = [0,255,218,185];
var de = [0,205,133,63];
var df = [0,255,192,203];
var dg = [0,221,160,221];
var dh = [0,176,224,230];
var di = [0,128,0,128];
var dj = [0,255,0,0];
var dk = [0,188,143,143];
var dl = [0,65,105,225];
var dm = [0,139,69,19];
var dn = [0,250,128,114];
var dp = [0,244,164,96];
var dq = [0,46,139,87];
var dr = [0,255,245,238];
var ds = [0,160,82,45];
var dt = [0,192,192,192];
var du = [0,135,206,235];
var dv = [0,106,90,205];
var dw = [0,112,128,144];
var dx = [0,112,128,144];
var dy = [0,255,250,250];
var dz = [0,0,255,127];
var dA = [0,70,130,180];
var dB = [0,210,180,140];
var dC = [0,0,128,128];
var dD = [0,216,191,216];
var dE = [0,255,99,71];
var dF = [0,64,224,208];
var dG = [0,238,130,238];
var dH = [0,245,222,179];
var dI = [0,255,255,255];
var dJ = [0,245,245,245];
var dK = [0,255,255,0];
var dL = [0,154,205,50];

function string_of_name(param) {
  var e9 = param;
  if (74 <= e9) {
    if (111 <= e9) {
      switch (e9) {
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
    switch (e9) {
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
  if (37 <= e9) {
    switch (e9) {
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
  switch (e9) {
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
            caml_call2(Pervasives[16], s, cst_is_not_a_valid_color_name)
          ]
        );
}

function rgb_of_name(param) {
  var e8 = param;
  if (74 <= e8) {
    if (111 <= e8) {
      switch (e8) {
        case 111:
          return db;
        case 112:
          return dc;
        case 113:
          return dd;
        case 114:
          return de;
        case 115:
          return df;
        case 116:
          return dg;
        case 117:
          return dh;
        case 118:
          return di;
        case 119:
          return dj;
        case 120:
          return dk;
        case 121:
          return dl;
        case 122:
          return dm;
        case 123:
          return dn;
        case 124:
          return dp;
        case 125:
          return dq;
        case 126:
          return dr;
        case 127:
          return ds;
        case 128:
          return dt;
        case 129:
          return du;
        case 130:
          return dv;
        case 131:
          return dw;
        case 132:
          return dx;
        case 133:
          return dy;
        case 134:
          return dz;
        case 135:
          return dA;
        case 136:
          return dB;
        case 137:
          return dC;
        case 138:
          return dD;
        case 139:
          return dE;
        case 140:
          return dF;
        case 141:
          return dG;
        case 142:
          return dH;
        case 143:
          return dI;
        case 144:
          return dJ;
        case 145:
          return dK;
        default:
          return dL
        }
    }
    switch (e8) {
      case 74:
        return cB;
      case 75:
        return cC;
      case 76:
        return cD;
      case 77:
        return cE;
      case 78:
        return cF;
      case 79:
        return cG;
      case 80:
        return cH;
      case 81:
        return cI;
      case 82:
        return cJ;
      case 83:
        return cK;
      case 84:
        return cL;
      case 85:
        return cM;
      case 86:
        return cN;
      case 87:
        return cO;
      case 88:
        return cP;
      case 89:
        return cQ;
      case 90:
        return cR;
      case 91:
        return cS;
      case 92:
        return cT;
      case 93:
        return cU;
      case 94:
        return cV;
      case 95:
        return cW;
      case 96:
        return cX;
      case 97:
        return cY;
      case 98:
        return cZ;
      case 99:
        return c0;
      case 100:
        return c1;
      case 101:
        return c2;
      case 102:
        return c3;
      case 103:
        return c4;
      case 104:
        return c5;
      case 105:
        return c6;
      case 106:
        return c7;
      case 107:
        return c8;
      case 108:
        return c9;
      case 109:
        return c_;
      default:
        return da
      }
  }
  if (37 <= e8) {
    switch (e8) {
      case 37:
        return b1;
      case 38:
        return b2;
      case 39:
        return b3;
      case 40:
        return b4;
      case 41:
        return b5;
      case 42:
        return b6;
      case 43:
        return b7;
      case 44:
        return b8;
      case 45:
        return b9;
      case 46:
        return b_;
      case 47:
        return ca;
      case 48:
        return cb;
      case 49:
        return cc;
      case 50:
        return cd;
      case 51:
        return ce;
      case 52:
        return cf;
      case 53:
        return cg;
      case 54:
        return ch;
      case 55:
        return ci;
      case 56:
        return cj;
      case 57:
        return ck;
      case 58:
        return cl;
      case 59:
        return cm;
      case 60:
        return cn;
      case 61:
        return co;
      case 62:
        return cp;
      case 63:
        return cq;
      case 64:
        return cr;
      case 65:
        return cs;
      case 66:
        return ct;
      case 67:
        return cu;
      case 68:
        return cv;
      case 69:
        return cw;
      case 70:
        return cx;
      case 71:
        return cy;
      case 72:
        return cz;
      default:
        return cA
      }
  }
  switch (e8) {
    case 0:
      return bq;
    case 1:
      return br;
    case 2:
      return bs;
    case 3:
      return bt;
    case 4:
      return bu;
    case 5:
      return bv;
    case 6:
      return bw;
    case 7:
      return bx;
    case 8:
      return by;
    case 9:
      return bz;
    case 10:
      return bA;
    case 11:
      return bB;
    case 12:
      return bC;
    case 13:
      return bD;
    case 14:
      return bE;
    case 15:
      return bF;
    case 16:
      return bG;
    case 17:
      return bH;
    case 18:
      return bI;
    case 19:
      return bJ;
    case 20:
      return bK;
    case 21:
      return bL;
    case 22:
      return bM;
    case 23:
      return bN;
    case 24:
      return bO;
    case 25:
      return bP;
    case 26:
      return bQ;
    case 27:
      return bR;
    case 28:
      return bS;
    case 29:
      return bT;
    case 30:
      return bU;
    case 31:
      return bV;
    case 32:
      return bW;
    case 33:
      return bX;
    case 34:
      return bY;
    case 35:
      return bZ;
    default:
      return b0
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
      return caml_call4(Printf[4], dM, r, g, b);
    case 2:
      var match__0 = param[1];
      var b__0 = match__0[3];
      var g__0 = match__0[2];
      var r__0 = match__0[1];
      return caml_call4(Printf[4], dN, r__0, g__0, b__0);
    case 3:
      var match__1 = param[1];
      var a = match__1[4];
      var b__1 = match__1[3];
      var g__1 = match__1[2];
      var r__1 = match__1[1];
      return caml_call5(Printf[4], dO, r__1, g__1, b__1, a);
    case 4:
      var match__2 = param[1];
      var a__0 = match__2[4];
      var b__2 = match__2[3];
      var g__2 = match__2[2];
      var r__2 = match__2[1];
      return caml_call5(Printf[4], dP, r__2, g__2, b__2, a__0);
    case 5:
      var match__3 = param[1];
      var l = match__3[3];
      var s = match__3[2];
      var h = match__3[1];
      return caml_call4(Printf[4], dQ, h, s, l);
    default:
      var match__4 = param[1];
      var a__1 = match__4[4];
      var l__0 = match__4[3];
      var s__0 = match__4[2];
      var h__0 = match__4[1];
      return caml_call5(Printf[4], dR, h__0, s__0, l__0, a__1)
    }
}

function hex_of_rgb(param) {
  var blue = param[3];
  var green = param[2];
  var red = param[1];
  function in_range(i) {
    var e5 = i < 0 ? 1 : 0;
    if (e5) var e6 = e5;
    else var e6 = 255 < i ? 1 : 0;
    if (e6) {
      var e7 = caml_call1(Pervasives[21], i);
      throw runtime["caml_wrap_thrown_exception"](
              [
                0,
                Invalid_argument,
                caml_call2(Pervasives[16], e7, cst_is_out_of_valid_range)
              ]
            );
    }
    return e6;
  }
  in_range(red);
  in_range(green);
  in_range(blue);
  return caml_call4(Printf[4], dS, red, green, blue);
}

function js_t_of_js_string(s) {
  var eH = 0;
  var eI = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d);
  var eJ = Js_of_ocaml_Js[10];
  var rgb_re = function(t23, t22, param) {return new t23(t22);}(eJ, eI, eH);
  var eK = 0;
  var eL = caml_jsbytes_of_string(cst_rgb_s_d_s_d_s_d__0);
  var eM = Js_of_ocaml_Js[10];
  var rgb_pct_re = function(t21, t20, param) {return new t21(t20);}(eM, eL, eK
  );
  var eN = 0;
  var eO = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d);
  var eP = Js_of_ocaml_Js[10];
  var rgba_re = function(t19, t18, param) {return new t19(t18);}(eP, eO, eN);
  var eQ = 0;
  var eR = caml_jsbytes_of_string(cst_rgba_s_d_s_d_s_d_d_d__0);
  var eS = Js_of_ocaml_Js[10];
  var rgba_pct_re = function(t17, t16, param) {return new t17(t16);}(eS, eR, eQ
  );
  var eT = 0;
  var eU = caml_jsbytes_of_string(cst_hsl_s_d_s_d_s_d);
  var eV = Js_of_ocaml_Js[10];
  var hsl_re = function(t15, t14, param) {return new t15(t14);}(eV, eU, eT);
  var eW = 0;
  var eX = caml_jsbytes_of_string(cst_hsla_s_d_s_d_s_d_d_d);
  var eY = Js_of_ocaml_Js[10];
  var hsla_re = function(t13, t12, param) {return new t13(t12);}(eY, eX, eW);
  function eZ(x) {
    return caml_call1(caml_get_public_method(x, -856045486, 42), x);
  }
  if (! (function(t1, t0, param) {return t1.test(t0);}(rgb_re, s, eZ) | 0)) {
    var e0 = function(x) {
      return caml_call1(caml_get_public_method(x, -856045486, 43), x);
    };
    if (! (function(t3, t2, param) {return t3.test(t2);}(rgba_re, s, e0) | 0)) {
      var e1 = function(x) {
        return caml_call1(caml_get_public_method(x, -856045486, 44), x);
      };
      if (
      !
      (function(t5, t4, param) {return t5.test(t4);}(rgb_pct_re, s, e1) | 0)
      ) {
        var e2 = function(x) {
          return caml_call1(caml_get_public_method(x, -856045486, 45), x);
        };
        if (
        !
        (function(t7, t6, param) {return t7.test(t6);}(rgba_pct_re, s, e2) | 0)
        ) {
          var e3 = function(x) {
            return caml_call1(caml_get_public_method(x, -856045486, 46), x);
          };
          if (
          !
          (function(t9, t8, param) {return t9.test(t8);}(hsl_re, s, e3) | 0)
          ) {
            var e4 = function(x) {
              return caml_call1(caml_get_public_method(x, -856045486, 47), x);
            };
            if (
            !
            (function(t11, t10, param) {return t11.test(t10);}(hsla_re, s, e4) | 0)
            ) {
              if (caml_call2(List[31], caml_js_to_string(s), dT)) {return s;}
              throw runtime["caml_wrap_thrown_exception"](
                      [
                        0,
                        Invalid_argument,
                        caml_call2(
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
  try {var ex = [0,name_of_string(s)];return ex;}
  catch(ey) {
    ey = caml_wrap_exception(ey);
    if (ey[1] === Invalid_argument) {
      var fail = function(param) {
        throw runtime["caml_wrap_thrown_exception"](
                [
                  0,
                  Invalid_argument,
                  caml_call2(Pervasives[16], s, cst_is_not_a_valid_color__0)
                ]
              );
      };
      var re_rgb = caml_call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d);
      var re_rgb_pct = caml_call1(Js_of_ocaml_Regexp[1], cst_rgba_d_d_d_d_d__0
      );
      var re_hsl = caml_call1(Js_of_ocaml_Regexp[1], cst_hsla_d_d_d_d_d);
      var i_of_s_o = function(param) {
        if (param) {
          var i = param[1];
          try {var eF = runtime["caml_int_of_string"](i);return eF;}
          catch(eG) {
            eG = caml_wrap_exception(eG);
            if (eG[1] === Invalid_argument) var s = eG[2];
            else {
              if (eG[1] !== Failure) {
                throw runtime["caml_wrap_thrown_exception_reraise"](eG);
              }
              var s = eG[2];
            }
            var eD = caml_call2(Pervasives[16], cst, s);
            var eE = caml_call2(Pervasives[16], i, eD);
            throw runtime["caml_wrap_thrown_exception"](
                    [
                      0,
                      Invalid_argument,
                      caml_call2(Pervasives[16], cst_color_conversion_error, eE)
                    ]
                  );
          }
        }
        return fail(0);
      };
      var f_of_s = function(f) {
        try {var eB = caml_float_of_string(f);return eB;}
        catch(eC) {
          eC = caml_wrap_exception(eC);
          if (eC[1] === Invalid_argument) var s = eC[2];
          else {
            if (eC[1] !== Failure) {
              throw runtime["caml_wrap_thrown_exception_reraise"](eC);
            }
            var s = eC[2];
          }
          var ez = caml_call2(Pervasives[16], cst__0, s);
          var eA = caml_call2(Pervasives[16], f, ez);
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    caml_call2(Pervasives[16], cst_color_conversion_error__0, eA
                    )
                  ]
                );
        }
      };
      var match = caml_call3(Js_of_ocaml_Regexp[7], re_rgb, s, 0);
      if (match) {
        var r = match[1];
        var red = caml_call2(Js_of_ocaml_Regexp[11], r, 2);
        var green = caml_call2(Js_of_ocaml_Regexp[11], r, 3);
        var blue = caml_call2(Js_of_ocaml_Regexp[11], r, 4);
        var alpha = caml_call2(Js_of_ocaml_Regexp[11], r, 5);
        var match__0 = caml_call2(Js_of_ocaml_Regexp[11], r, 1);
        if (match__0) {
          var ef = match__0[1];
          if (! caml_string_notequal(ef, cst_rgb)) {
            if (alpha) {return fail(0);}
            var ej = i_of_s_o(blue);
            var ek = i_of_s_o(green);
            return [1,[0,i_of_s_o(red),ek,ej]];
          }
          if (! caml_string_notequal(ef, cst_rgba)) {
            if (alpha) {
              var a = alpha[1];
              var eg = f_of_s(a);
              var eh = i_of_s_o(blue);
              var ei = i_of_s_o(green);
              return [3,[0,i_of_s_o(red),ei,eh,eg]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      var match__1 = caml_call3(Js_of_ocaml_Regexp[7], re_rgb_pct, s, 0);
      if (match__1) {
        var r__0 = match__1[1];
        var red__0 = caml_call2(Js_of_ocaml_Regexp[11], r__0, 2);
        var green__0 = caml_call2(Js_of_ocaml_Regexp[11], r__0, 3);
        var blue__0 = caml_call2(Js_of_ocaml_Regexp[11], r__0, 4);
        var alpha__0 = caml_call2(Js_of_ocaml_Regexp[11], r__0, 5);
        var match__2 = caml_call2(Js_of_ocaml_Regexp[11], r__0, 1);
        if (match__2) {
          var el = match__2[1];
          if (! caml_string_notequal(el, cst_rgb__0)) {
            if (alpha__0) {return fail(0);}
            var ep = i_of_s_o(blue__0);
            var eq = i_of_s_o(green__0);
            return [2,[0,i_of_s_o(red__0),eq,ep]];
          }
          if (! caml_string_notequal(el, cst_rgba__0)) {
            if (alpha__0) {
              var a__0 = alpha__0[1];
              var em = f_of_s(a__0);
              var en = i_of_s_o(blue__0);
              var eo = i_of_s_o(green__0);
              return [4,[0,i_of_s_o(red__0),eo,en,em]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      var match__3 = caml_call3(Js_of_ocaml_Regexp[7], re_hsl, s, 0);
      if (match__3) {
        var r__1 = match__3[1];
        var red__1 = caml_call2(Js_of_ocaml_Regexp[11], r__1, 2);
        var green__1 = caml_call2(Js_of_ocaml_Regexp[11], r__1, 3);
        var blue__1 = caml_call2(Js_of_ocaml_Regexp[11], r__1, 4);
        var alpha__1 = caml_call2(Js_of_ocaml_Regexp[11], r__1, 5);
        var match__4 = caml_call2(Js_of_ocaml_Regexp[11], r__1, 1);
        if (match__4) {
          var er = match__4[1];
          if (! caml_string_notequal(er, cst_hsl)) {
            if (alpha__1) {return fail(0);}
            var ev = i_of_s_o(blue__1);
            var ew = i_of_s_o(green__1);
            return [5,[0,i_of_s_o(red__1),ew,ev]];
          }
          if (! caml_string_notequal(er, cst_hsla)) {
            if (alpha__1) {
              var a__1 = alpha__1[1];
              var es = f_of_s(a__1);
              var et = i_of_s_o(blue__1);
              var eu = i_of_s_o(green__1);
              return [6,[0,i_of_s_o(red__1),eu,et,es]];
            }
            return fail(0);
          }
        }
        return fail(0);
      }
      return fail(0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](ey);
  }
}

function string_of_t__0(param) {
  if (typeof param === "number") return cst_0;
  else switch (param[0]) {
    case 0:
      var f = param[1];
      return caml_call3(Printf[4], dU, f, cst_em);
    case 1:
      var f__0 = param[1];
      return caml_call3(Printf[4], dV, f__0, cst_ex);
    case 2:
      var f__1 = param[1];
      return caml_call3(Printf[4], dW, f__1, cst_px);
    case 3:
      var f__2 = param[1];
      return caml_call3(Printf[4], dX, f__2, cst_gd);
    case 4:
      var f__3 = param[1];
      return caml_call3(Printf[4], dY, f__3, cst_rem);
    case 5:
      var f__4 = param[1];
      return caml_call3(Printf[4], dZ, f__4, cst_vw);
    case 6:
      var f__5 = param[1];
      return caml_call3(Printf[4], d0, f__5, cst_vh);
    case 7:
      var f__6 = param[1];
      return caml_call3(Printf[4], d1, f__6, cst_vm);
    case 8:
      var f__7 = param[1];
      return caml_call3(Printf[4], d2, f__7, cst_ch);
    case 9:
      var f__8 = param[1];
      return caml_call3(Printf[4], d3, f__8, cst_mm);
    case 10:
      var f__9 = param[1];
      return caml_call3(Printf[4], d4, f__9, cst_cm);
    case 11:
      var f__10 = param[1];
      return caml_call3(Printf[4], d5, f__10, cst_in);
    case 12:
      var f__11 = param[1];
      return caml_call3(Printf[4], d6, f__11, cst_pt);
    default:
      var f__12 = param[1];
      return caml_call3(Printf[4], d7, f__12, cst_pc)
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
              caml_call2(Pervasives[16], s, cst_is_not_a_valid_length)
            ]
          );
  }
  var re = caml_call1(Js_of_ocaml_Regexp[1], cst_d_d_s_S);
  var match = caml_call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = caml_call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var ed = caml_float_of_string(f);}
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] === Invalid_argument) {
          var s__0 = exn[2];
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    caml_call2(Pervasives[16], cst_length_conversion_error, s__0
                    )
                  ]
                );
        }
        throw runtime["caml_wrap_thrown_exception_reraise"](exn);
      }
      var f__0 = ed;
    }
    else var f__0 = fail(0);
    var match__1 = caml_call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var ee = match__1[1];
      var switch__0 = caml_string_compare(ee, cst_pc__0);
      if (0 <= switch__0) {
        if (! (0 < switch__0)) {return [13,f__0];}
        if (! caml_string_notequal(ee, cst_pt__0)) {return [12,f__0];}
        if (! caml_string_notequal(ee, cst_px__0)) {return [2,f__0];}
        if (! caml_string_notequal(ee, cst_rem__0)) {return [4,f__0];}
        if (! caml_string_notequal(ee, cst_vh__0)) {return [6,f__0];}
        if (! caml_string_notequal(ee, cst_vm__0)) {return [7,f__0];}
        if (! caml_string_notequal(ee, cst_vw__0)) {return [5,f__0];}
      }
      else {
        if (! caml_string_notequal(ee, cst_ch__0)) {return [8,f__0];}
        if (! caml_string_notequal(ee, cst_cm__0)) {return [10,f__0];}
        if (! caml_string_notequal(ee, cst_em__0)) {return [0,f__0];}
        if (! caml_string_notequal(ee, cst_ex__0)) {return [1,f__0];}
        if (! caml_string_notequal(ee, cst_gd__0)) {return [3,f__0];}
        if (! caml_string_notequal(ee, cst_in__0)) {return [11,f__0];}
        if (! caml_string_notequal(ee, cst_mm__0)) {return [9,f__0];}
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
      return caml_call3(Printf[4], d8, f, cst_deg);
    case 1:
      var f__0 = param[1];
      return caml_call3(Printf[4], d9, f__0, cst_grad);
    case 2:
      var f__1 = param[1];
      return caml_call3(Printf[4], d_, f__1, cst_rad);
    default:
      var f__2 = param[1];
      return caml_call3(Printf[4], ea, f__2, cst_turns)
    }
}

function js__1(t) {return string_of_t__1(t).toString();}

function ml__1(j) {
  var s = caml_js_to_string(j);
  var re = caml_call1(Js_of_ocaml_Regexp[1], cst_d_d_deg_grad_rad_turns);
  function fail(param) {
    throw runtime["caml_wrap_thrown_exception"](
            [
              0,
              Invalid_argument,
              caml_call2(Pervasives[16], s, cst_is_not_a_valid_length__0)
            ]
          );
  }
  var match = caml_call3(Js_of_ocaml_Regexp[7], re, s, 0);
  if (match) {
    var r = match[1];
    var match__0 = caml_call2(Js_of_ocaml_Regexp[11], r, 1);
    if (match__0) {
      var f = match__0[1];
      try {var eb = caml_float_of_string(f);}
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] === Invalid_argument) {
          var s__0 = exn[2];
          throw runtime["caml_wrap_thrown_exception"](
                  [
                    0,
                    Invalid_argument,
                    caml_call2(
                      Pervasives[16],
                      cst_length_conversion_error__0,
                      s__0
                    )
                  ]
                );
        }
        throw runtime["caml_wrap_thrown_exception_reraise"](exn);
      }
      var f__0 = eb;
    }
    else var f__0 = fail(0);
    var match__1 = caml_call2(Js_of_ocaml_Regexp[11], r, 2);
    if (match__1) {
      var ec = match__1[1];
      if (! caml_string_notequal(ec, cst_deg__0)) {return [0,f__0];}
      if (! caml_string_notequal(ec, cst_grad__0)) {return [1,f__0];}
      if (! caml_string_notequal(ec, cst_rad__0)) {return [2,f__0];}
      if (! caml_string_notequal(ec, cst_turns__0)) {return [3,f__0];}
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