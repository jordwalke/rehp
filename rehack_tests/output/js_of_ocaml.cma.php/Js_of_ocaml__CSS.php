<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__CSS {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_float_of_string = $runtime["caml_float_of_string"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $caml_list_of_js_array = $runtime["caml_list_of_js_array"];
    $string = $runtime["caml_new_string"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $cst_is_not_a_valid_length__0 = $string(" is not a valid length");
    $cst_d_d_deg_grad_rad_turns = $string(
      "^(\\d*(?:\\.\\d*))(deg|grad|rad|turns)\\$"
    );
    $cst_length_conversion_error__0 = $string("length conversion error: ");
    $cst_deg__0 = $string("deg");
    $cst_grad__0 = $string("grad");
    $cst_rad__0 = $string("rad");
    $cst_turns__0 = $string("turns");
    $cst_deg = $string("deg");
    $cst_grad = $string("grad");
    $cst_rad = $string("rad");
    $cst_turns = $string("turns");
    $cst_is_not_a_valid_length = $string(" is not a valid length");
    $cst_0__0 = $string("0");
    $cst_d_d_s_S = $string("^(\\d*(?:\\.\\d*)?)\\s*(\\S*)\\$");
    $cst_length_conversion_error = $string("length conversion error: ");
    $cst_pc__0 = $string("pc");
    $cst_ch__0 = $string("ch");
    $cst_cm__0 = $string("cm");
    $cst_em__0 = $string("em");
    $cst_ex__0 = $string("ex");
    $cst_gd__0 = $string("gd");
    $cst_in__0 = $string("in");
    $cst_mm__0 = $string("mm");
    $cst_pt__0 = $string("pt");
    $cst_px__0 = $string("px");
    $cst_rem__0 = $string("rem");
    $cst_vh__0 = $string("vh");
    $cst_vm__0 = $string("vm");
    $cst_vw__0 = $string("vw");
    $cst_0 = $string("0");
    $cst_em = $string("em");
    $cst_ex = $string("ex");
    $cst_px = $string("px");
    $cst_gd = $string("gd");
    $cst_rem = $string("rem");
    $cst_vw = $string("vw");
    $cst_vh = $string("vh");
    $cst_vm = $string("vm");
    $cst_ch = $string("ch");
    $cst_mm = $string("mm");
    $cst_cm = $string("cm");
    $cst_in = $string("in");
    $cst_pt = $string("pt");
    $cst_pc = $string("pc");
    $cst__0 = $string("): ");
    $cst_color_conversion_error__0 = $string("color conversion error (");
    $cst = $string("): ");
    $cst_color_conversion_error = $string("color conversion error (");
    $cst_is_not_a_valid_color__0 = $string(" is not a valid color");
    $cst_rgba_d_d_d_d_d = $string(
      "(rgba?)\\((?:(\\d*),(\\d*),(\\d*)(?:,(\\d*(?:\\.\\d*)?))?)\\)"
    );
    $cst_rgba_d_d_d_d_d__0 = $string(
      "(rgba?)\\((?:(\\d*)%,(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
    );
    $cst_hsla_d_d_d_d_d = $string(
      "(hsla?)\\((?:(\\d*),(\\d*)%,(\\d*)%(?:,(\\d*(?:\\.\\d*)?))?)\\)"
    );
    $cst_rgb = $string("rgb");
    $cst_rgba = $string("rgba");
    $cst_rgb__0 = $string("rgb");
    $cst_rgba__0 = $string("rgba");
    $cst_hsl = $string("hsl");
    $cst_hsla = $string("hsla");
    $cst_rgb_s_d_s_d_s_d = $string("^rgb\\(\\s*\\d*,\\s*\\d*,\\s*\\d*\\)\\$");
    $cst_rgb_s_d_s_d_s_d__0 = $string(
      "^rgb\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%\\)\\$"
    );
    $cst_rgba_s_d_s_d_s_d_d_d = $string(
      "^rgba\\(\\s*\\d*,\\s*\\d*,\\s*\\d*,\\d*\\.?\\d*\\)\\$"
    );
    $cst_rgba_s_d_s_d_s_d_d_d__0 = $string(
      "^rgba\\(\\s*\\d*%,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)\\$"
    );
    $cst_hsl_s_d_s_d_s_d = $string("^hsl\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%\\)\\$"
    );
    $cst_hsla_s_d_s_d_s_d_d_d = $string(
      "^hsla\\(\\s*\\d*,\\s*\\d*%,\\s*\\d*%,\\d*\\.?\\d*\\)\\$"
    );
    $cst_is_not_a_valid_color = $string(" is not a valid color");
    $cst_is_out_of_valid_range = $string(" is out of valid range");
    $partial = Vector{8, Vector{0, 0, 0}, 0, 0, Vector{12, 41, 0}} as dynamic;
    $partial__0 = Vector{12, 41, 0} as dynamic;
    $partial__1 = Vector{0, 0, 0} as dynamic;
    $cst_lightgrey__0 = $string("lightgrey");
    $cst_darkslategray__0 = $string("darkslategray");
    $cst_cornsilk__0 = $string("cornsilk");
    $cst_blue__0 = $string("blue");
    $cst_aliceblue__0 = $string("aliceblue");
    $cst_antiquewhite__0 = $string("antiquewhite");
    $cst_aqua__0 = $string("aqua");
    $cst_aquamarine__0 = $string("aquamarine");
    $cst_azure__0 = $string("azure");
    $cst_beige__0 = $string("beige");
    $cst_bisque__0 = $string("bisque");
    $cst_black__0 = $string("black");
    $cst_blanchedalmond__0 = $string("blanchedalmond");
    $cst_blueviolet__0 = $string("blueviolet");
    $cst_brown__0 = $string("brown");
    $cst_burlywood__0 = $string("burlywood");
    $cst_cadetblue__0 = $string("cadetblue");
    $cst_chartreuse__0 = $string("chartreuse");
    $cst_chocolate__0 = $string("chocolate");
    $cst_coral__0 = $string("coral");
    $cst_cornflowerblue__0 = $string("cornflowerblue");
    $cst_darkkhaki__0 = $string("darkkhaki");
    $cst_crimson__0 = $string("crimson");
    $cst_cyan__0 = $string("cyan");
    $cst_darkblue__0 = $string("darkblue");
    $cst_darkcyan__0 = $string("darkcyan");
    $cst_darkgoldenrod__0 = $string("darkgoldenrod");
    $cst_darkgray__0 = $string("darkgray");
    $cst_darkgreen__0 = $string("darkgreen");
    $cst_darkgrey__0 = $string("darkgrey");
    $cst_darkmagenta__0 = $string("darkmagenta");
    $cst_darkolivegreen__0 = $string("darkolivegreen");
    $cst_darkorange__0 = $string("darkorange");
    $cst_darkorchid__0 = $string("darkorchid");
    $cst_darkred__0 = $string("darkred");
    $cst_darksalmon__0 = $string("darksalmon");
    $cst_darkseagreen__0 = $string("darkseagreen");
    $cst_darkslateblue__0 = $string("darkslateblue");
    $cst_greenyellow__0 = $string("greenyellow");
    $cst_floralwhite__0 = $string("floralwhite");
    $cst_darkslategrey__0 = $string("darkslategrey");
    $cst_darkturquoise__0 = $string("darkturquoise");
    $cst_darkviolet__0 = $string("darkviolet");
    $cst_deeppink__0 = $string("deeppink");
    $cst_deepskyblue__0 = $string("deepskyblue");
    $cst_dimgray__0 = $string("dimgray");
    $cst_dimgrey__0 = $string("dimgrey");
    $cst_dodgerblue__0 = $string("dodgerblue");
    $cst_firebrick__0 = $string("firebrick");
    $cst_forestgreen__0 = $string("forestgreen");
    $cst_fuchsia__0 = $string("fuchsia");
    $cst_gainsboro__0 = $string("gainsboro");
    $cst_ghostwhite__0 = $string("ghostwhite");
    $cst_gold__0 = $string("gold");
    $cst_goldenrod__0 = $string("goldenrod");
    $cst_gray__0 = $string("gray");
    $cst_green__0 = $string("green");
    $cst_lavenderblush__0 = $string("lavenderblush");
    $cst_grey__0 = $string("grey");
    $cst_honeydew__0 = $string("honeydew");
    $cst_hotpink__0 = $string("hotpink");
    $cst_indianred__0 = $string("indianred");
    $cst_indigo__0 = $string("indigo");
    $cst_ivory__0 = $string("ivory");
    $cst_khaki__0 = $string("khaki");
    $cst_lavender__0 = $string("lavender");
    $cst_lawngreen__0 = $string("lawngreen");
    $cst_lemonchiffon__0 = $string("lemonchiffon");
    $cst_lightblue__0 = $string("lightblue");
    $cst_lightcoral__0 = $string("lightcoral");
    $cst_lightcyan__0 = $string("lightcyan");
    $cst_lightgoldenrodyellow__0 = $string("lightgoldenrodyellow");
    $cst_lightgray__0 = $string("lightgray");
    $cst_lightgreen__0 = $string("lightgreen");
    $cst_paleturquoise__0 = $string("paleturquoise");
    $cst_mediumslateblue__0 = $string("mediumslateblue");
    $cst_limegreen__0 = $string("limegreen");
    $cst_lightpink__0 = $string("lightpink");
    $cst_lightsalmon__0 = $string("lightsalmon");
    $cst_lightseagreen__0 = $string("lightseagreen");
    $cst_lightskyblue__0 = $string("lightskyblue");
    $cst_lightslategray__0 = $string("lightslategray");
    $cst_lightslategrey__0 = $string("lightslategrey");
    $cst_lightsteelblue__0 = $string("lightsteelblue");
    $cst_lightyellow__0 = $string("lightyellow");
    $cst_lime__0 = $string("lime");
    $cst_linen__0 = $string("linen");
    $cst_magenta__0 = $string("magenta");
    $cst_maroon__0 = $string("maroon");
    $cst_mediumaquamarine__0 = $string("mediumaquamarine");
    $cst_mediumblue__0 = $string("mediumblue");
    $cst_mediumorchid__0 = $string("mediumorchid");
    $cst_mediumpurple__0 = $string("mediumpurple");
    $cst_mediumseagreen__0 = $string("mediumseagreen");
    $cst_navy__0 = $string("navy");
    $cst_mediumspringgreen__0 = $string("mediumspringgreen");
    $cst_mediumturquoise__0 = $string("mediumturquoise");
    $cst_mediumvioletred__0 = $string("mediumvioletred");
    $cst_midnightblue__0 = $string("midnightblue");
    $cst_mintcream__0 = $string("mintcream");
    $cst_mistyrose__0 = $string("mistyrose");
    $cst_moccasin__0 = $string("moccasin");
    $cst_navajowhite__0 = $string("navajowhite");
    $cst_oldlace__0 = $string("oldlace");
    $cst_olive__0 = $string("olive");
    $cst_olivedrab__0 = $string("olivedrab");
    $cst_orange__0 = $string("orange");
    $cst_orangered__0 = $string("orangered");
    $cst_orchid__0 = $string("orchid");
    $cst_palegoldenrod__0 = $string("palegoldenrod");
    $cst_palegreen__0 = $string("palegreen");
    $cst_skyblue__0 = $string("skyblue");
    $cst_rosybrown__0 = $string("rosybrown");
    $cst_palevioletred__0 = $string("palevioletred");
    $cst_papayawhip__0 = $string("papayawhip");
    $cst_peachpuff__0 = $string("peachpuff");
    $cst_peru__0 = $string("peru");
    $cst_pink__0 = $string("pink");
    $cst_plum__0 = $string("plum");
    $cst_powderblue__0 = $string("powderblue");
    $cst_purple__0 = $string("purple");
    $cst_red__0 = $string("red");
    $cst_royalblue__0 = $string("royalblue");
    $cst_saddlebrown__0 = $string("saddlebrown");
    $cst_salmon__0 = $string("salmon");
    $cst_sandybrown__0 = $string("sandybrown");
    $cst_seagreen__0 = $string("seagreen");
    $cst_seashell__0 = $string("seashell");
    $cst_sienna__0 = $string("sienna");
    $cst_silver__0 = $string("silver");
    $cst_thistle__0 = $string("thistle");
    $cst_slateblue__0 = $string("slateblue");
    $cst_slategray__0 = $string("slategray");
    $cst_slategrey__0 = $string("slategrey");
    $cst_snow__0 = $string("snow");
    $cst_springgreen__0 = $string("springgreen");
    $cst_steelblue__0 = $string("steelblue");
    $cst_tan__0 = $string("tan");
    $cst_teal__0 = $string("teal");
    $cst_tomato__0 = $string("tomato");
    $cst_turquoise__0 = $string("turquoise");
    $cst_violet__0 = $string("violet");
    $cst_wheat__0 = $string("wheat");
    $cst_white__0 = $string("white");
    $cst_whitesmoke__0 = $string("whitesmoke");
    $cst_yellow__0 = $string("yellow");
    $cst_yellowgreen__0 = $string("yellowgreen");
    $cst_is_not_a_valid_color_name = $string(" is not a valid color name");
    $cst_aliceblue = $string("aliceblue");
    $cst_antiquewhite = $string("antiquewhite");
    $cst_aqua = $string("aqua");
    $cst_aquamarine = $string("aquamarine");
    $cst_azure = $string("azure");
    $cst_beige = $string("beige");
    $cst_bisque = $string("bisque");
    $cst_black = $string("black");
    $cst_blanchedalmond = $string("blanchedalmond");
    $cst_blue = $string("blue");
    $cst_blueviolet = $string("blueviolet");
    $cst_brown = $string("brown");
    $cst_burlywood = $string("burlywood");
    $cst_cadetblue = $string("cadetblue");
    $cst_chartreuse = $string("chartreuse");
    $cst_chocolate = $string("chocolate");
    $cst_coral = $string("coral");
    $cst_cornflowerblue = $string("cornflowerblue");
    $cst_cornsilk = $string("cornsilk");
    $cst_crimson = $string("crimson");
    $cst_cyan = $string("cyan");
    $cst_darkblue = $string("darkblue");
    $cst_darkcyan = $string("darkcyan");
    $cst_darkgoldenrod = $string("darkgoldenrod");
    $cst_darkgray = $string("darkgray");
    $cst_darkgreen = $string("darkgreen");
    $cst_darkgrey = $string("darkgrey");
    $cst_darkkhaki = $string("darkkhaki");
    $cst_darkmagenta = $string("darkmagenta");
    $cst_darkolivegreen = $string("darkolivegreen");
    $cst_darkorange = $string("darkorange");
    $cst_darkorchid = $string("darkorchid");
    $cst_darkred = $string("darkred");
    $cst_darksalmon = $string("darksalmon");
    $cst_darkseagreen = $string("darkseagreen");
    $cst_darkslateblue = $string("darkslateblue");
    $cst_darkslategray = $string("darkslategray");
    $cst_darkslategrey = $string("darkslategrey");
    $cst_darkturquoise = $string("darkturquoise");
    $cst_darkviolet = $string("darkviolet");
    $cst_deeppink = $string("deeppink");
    $cst_deepskyblue = $string("deepskyblue");
    $cst_dimgray = $string("dimgray");
    $cst_dimgrey = $string("dimgrey");
    $cst_dodgerblue = $string("dodgerblue");
    $cst_firebrick = $string("firebrick");
    $cst_floralwhite = $string("floralwhite");
    $cst_forestgreen = $string("forestgreen");
    $cst_fuchsia = $string("fuchsia");
    $cst_gainsboro = $string("gainsboro");
    $cst_ghostwhite = $string("ghostwhite");
    $cst_gold = $string("gold");
    $cst_goldenrod = $string("goldenrod");
    $cst_gray = $string("gray");
    $cst_grey = $string("grey");
    $cst_green = $string("green");
    $cst_greenyellow = $string("greenyellow");
    $cst_honeydew = $string("honeydew");
    $cst_hotpink = $string("hotpink");
    $cst_indianred = $string("indianred");
    $cst_indigo = $string("indigo");
    $cst_ivory = $string("ivory");
    $cst_khaki = $string("khaki");
    $cst_lavender = $string("lavender");
    $cst_lavenderblush = $string("lavenderblush");
    $cst_lawngreen = $string("lawngreen");
    $cst_lemonchiffon = $string("lemonchiffon");
    $cst_lightblue = $string("lightblue");
    $cst_lightcoral = $string("lightcoral");
    $cst_lightcyan = $string("lightcyan");
    $cst_lightgoldenrodyellow = $string("lightgoldenrodyellow");
    $cst_lightgray = $string("lightgray");
    $cst_lightgreen = $string("lightgreen");
    $cst_lightgrey = $string("lightgrey");
    $cst_lightpink = $string("lightpink");
    $cst_lightsalmon = $string("lightsalmon");
    $cst_lightseagreen = $string("lightseagreen");
    $cst_lightskyblue = $string("lightskyblue");
    $cst_lightslategray = $string("lightslategray");
    $cst_lightslategrey = $string("lightslategrey");
    $cst_lightsteelblue = $string("lightsteelblue");
    $cst_lightyellow = $string("lightyellow");
    $cst_lime = $string("lime");
    $cst_limegreen = $string("limegreen");
    $cst_linen = $string("linen");
    $cst_magenta = $string("magenta");
    $cst_maroon = $string("maroon");
    $cst_mediumaquamarine = $string("mediumaquamarine");
    $cst_mediumblue = $string("mediumblue");
    $cst_mediumorchid = $string("mediumorchid");
    $cst_mediumpurple = $string("mediumpurple");
    $cst_mediumseagreen = $string("mediumseagreen");
    $cst_mediumslateblue = $string("mediumslateblue");
    $cst_mediumspringgreen = $string("mediumspringgreen");
    $cst_mediumturquoise = $string("mediumturquoise");
    $cst_mediumvioletred = $string("mediumvioletred");
    $cst_midnightblue = $string("midnightblue");
    $cst_mintcream = $string("mintcream");
    $cst_mistyrose = $string("mistyrose");
    $cst_moccasin = $string("moccasin");
    $cst_navajowhite = $string("navajowhite");
    $cst_navy = $string("navy");
    $cst_oldlace = $string("oldlace");
    $cst_olive = $string("olive");
    $cst_olivedrab = $string("olivedrab");
    $cst_orange = $string("orange");
    $cst_orangered = $string("orangered");
    $cst_orchid = $string("orchid");
    $cst_palegoldenrod = $string("palegoldenrod");
    $cst_palegreen = $string("palegreen");
    $cst_paleturquoise = $string("paleturquoise");
    $cst_palevioletred = $string("palevioletred");
    $cst_papayawhip = $string("papayawhip");
    $cst_peachpuff = $string("peachpuff");
    $cst_peru = $string("peru");
    $cst_pink = $string("pink");
    $cst_plum = $string("plum");
    $cst_powderblue = $string("powderblue");
    $cst_purple = $string("purple");
    $cst_red = $string("red");
    $cst_rosybrown = $string("rosybrown");
    $cst_royalblue = $string("royalblue");
    $cst_saddlebrown = $string("saddlebrown");
    $cst_salmon = $string("salmon");
    $cst_sandybrown = $string("sandybrown");
    $cst_seagreen = $string("seagreen");
    $cst_seashell = $string("seashell");
    $cst_sienna = $string("sienna");
    $cst_silver = $string("silver");
    $cst_skyblue = $string("skyblue");
    $cst_slateblue = $string("slateblue");
    $cst_slategray = $string("slategray");
    $cst_slategrey = $string("slategrey");
    $cst_snow = $string("snow");
    $cst_springgreen = $string("springgreen");
    $cst_steelblue = $string("steelblue");
    $cst_tan = $string("tan");
    $cst_teal = $string("teal");
    $cst_thistle = $string("thistle");
    $cst_tomato = $string("tomato");
    $cst_turquoise = $string("turquoise");
    $cst_violet = $string("violet");
    $cst_wheat = $string("wheat");
    $cst_white = $string("white");
    $cst_whitesmoke = $string("whitesmoke");
    $cst_yellow = $string("yellow");
    $cst_yellowgreen = $string("yellowgreen");
    $Stdlib = Stdlib::get();
    $Js_of_ocaml_Regexp = Js_of_ocaml__Regexp::get();
    $Stdlib_printf = Stdlib__printf::get();
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $Stdlib_list = Stdlib__list::get();
    $b2_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $b3_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $b4_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $b5_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bO_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bP_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bQ_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bR_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bS_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bT_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bU_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bV_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bW_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bX_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bY_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bZ_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $b0_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $b1_ = Vector{
      0,
      Vector{8, Vector{0, 0, 0}, 0, 0, Vector{2, 0, 0}},
      $string("%f%s")
    } as dynamic;
    $bN_ = $caml_list_of_js_array(
      varray[
        $string("aliceblue"),
        $string("antiquewhite"),
        $string("aqua"),
        $string("aquamarine"),
        $string("azure"),
        $string("beige"),
        $string("bisque"),
        $string("black"),
        $string("blanchedalmond"),
        $string("blue"),
        $string("blueviolet"),
        $string("brown"),
        $string("burlywood"),
        $string("cadetblue"),
        $string("chartreuse"),
        $string("chocolate"),
        $string("coral"),
        $string("cornflowerblue"),
        $string("cornsilk"),
        $string("crimson"),
        $string("cyan"),
        $string("darkblue"),
        $string("darkcyan"),
        $string("darkgoldenrod"),
        $string("darkgray"),
        $string("darkgreen"),
        $string("darkgrey"),
        $string("darkkhaki"),
        $string("darkmagenta"),
        $string("darkolivegreen"),
        $string("darkorange"),
        $string("darkorchid"),
        $string("darkred"),
        $string("darksalmon"),
        $string("darkseagreen"),
        $string("darkslateblue"),
        $string("darkslategray"),
        $string("darkslategrey"),
        $string("darkturquoise"),
        $string("darkviolet"),
        $string("deeppink"),
        $string("deepskyblue"),
        $string("dimgray"),
        $string("dimgrey"),
        $string("dodgerblue"),
        $string("firebrick"),
        $string("floralwhite"),
        $string("forestgreen"),
        $string("fuchsia"),
        $string("gainsboro"),
        $string("ghostwhite"),
        $string("gold"),
        $string("goldenrod"),
        $string("gray"),
        $string("green"),
        $string("greenyellow"),
        $string("grey"),
        $string("honeydew"),
        $string("hotpink"),
        $string("indianred"),
        $string("indigo"),
        $string("ivory"),
        $string("khaki"),
        $string("lavender"),
        $string("lavenderblush"),
        $string("lawngreen"),
        $string("lemonchiffon"),
        $string("lightblue"),
        $string("lightcoral"),
        $string("lightcyan"),
        $string("lightgoldenrodyellow"),
        $string("lightgray"),
        $string("lightgreen"),
        $string("lightgrey"),
        $string("lightpink"),
        $string("lightsalmon"),
        $string("lightseagreen"),
        $string("lightskyblue"),
        $string("lightslategray"),
        $string("lightslategrey"),
        $string("lightsteelblue"),
        $string("lightyellow"),
        $string("lime"),
        $string("limegreen"),
        $string("linen"),
        $string("magenta"),
        $string("maroon"),
        $string("mediumaquamarine"),
        $string("mediumblue"),
        $string("mediumorchid"),
        $string("mediumpurple"),
        $string("mediumseagreen"),
        $string("mediumslateblue"),
        $string("mediumspringgreen"),
        $string("mediumturquoise"),
        $string("mediumvioletred"),
        $string("midnightblue"),
        $string("mintcream"),
        $string("mistyrose"),
        $string("moccasin"),
        $string("navajowhite"),
        $string("navy"),
        $string("oldlace"),
        $string("olive"),
        $string("olivedrab"),
        $string("orange"),
        $string("orangered"),
        $string("orchid"),
        $string("palegoldenrod"),
        $string("palegreen"),
        $string("paleturquoise"),
        $string("palevioletred"),
        $string("papayawhip"),
        $string("peachpuff"),
        $string("peru"),
        $string("pink"),
        $string("plum"),
        $string("powderblue"),
        $string("purple"),
        $string("red"),
        $string("rosybrown"),
        $string("royalblue"),
        $string("saddlebrown"),
        $string("salmon"),
        $string("sandybrown"),
        $string("seagreen"),
        $string("seashell"),
        $string("sienna"),
        $string("silver"),
        $string("skyblue"),
        $string("slateblue"),
        $string("slategray"),
        $string("slategrey"),
        $string("snow"),
        $string("springgreen"),
        $string("steelblue"),
        $string("tan"),
        $string("teal"),
        $string("thistle"),
        $string("tomato"),
        $string("turquoise"),
        $string("violet"),
        $string("wheat"),
        $string("white"),
        $string("whitesmoke"),
        $string("yellow"),
        $string("yellowgreen")
      ]
    );
    $bM_ = Vector{
      0,
      Vector{
        12,
        35,
        Vector{
          4,
          8,
          Vector{0, 2, 2},
          0,
          Vector{4, 8, Vector{0, 2, 2}, 0, Vector{4, 8, Vector{0, 2, 2}, 0, 0}
          }
        }
      },
      $string("#%02X%02X%02X")
    } as dynamic;
    $bG_ = Vector{
      0,
      Vector{
        11,
        $string("rgb("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            44,
            Vector{
              4,
              0,
              0,
              0,
              Vector{12, 44, Vector{4, 0, 0, 0, Vector{12, 41, 0}}}
            }
          }
        }
      },
      $string("rgb(%d,%d,%d)")
    } as dynamic;
    $bH_ = Vector{
      0,
      Vector{
        11,
        $string("rgb("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            37,
            Vector{
              12,
              44,
              Vector{
                4,
                0,
                0,
                0,
                Vector{
                  12,
                  37,
                  Vector{
                    12,
                    44,
                    Vector{4, 0, 0, 0, Vector{12, 37, Vector{12, 41, 0}}}
                  }
                }
              }
            }
          }
        }
      },
      $string("rgb(%d%%,%d%%,%d%%)")
    } as dynamic;
    $bI_ = Vector{
      0,
      Vector{
        11,
        $string("rgba("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            44,
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                12,
                44,
                Vector{
                  4,
                  0,
                  0,
                  0,
                  Vector{
                    12,
                    44,
                    Vector{8, Vector{0, 0, 0}, 0, 0, Vector{12, 41, 0}}
                  }
                }
              }
            }
          }
        }
      },
      $string("rgba(%d,%d,%d,%f)")
    } as dynamic;
    $bJ_ = Vector{
      0,
      Vector{
        11,
        $string("rgba("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            37,
            Vector{
              12,
              44,
              Vector{
                4,
                0,
                0,
                0,
                Vector{
                  12,
                  37,
                  Vector{
                    12,
                    44,
                    Vector{4, 0, 0, 0, Vector{12, 37, Vector{12, 44, $partial}}}
                  }
                }
              }
            }
          }
        }
      },
      $string("rgba(%d%%,%d%%,%d%%,%f)")
    } as dynamic;
    $bK_ = Vector{
      0,
      Vector{
        11,
        $string("hsl("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            44,
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                12,
                37,
                Vector{
                  12,
                  44,
                  Vector{4, 0, 0, 0, Vector{12, 37, Vector{12, 41, 0}}}
                }
              }
            }
          }
        }
      },
      $string("hsl(%d,%d%%,%d%%)")
    } as dynamic;
    $bL_ = Vector{
      0,
      Vector{
        11,
        $string("hsla("),
        Vector{
          4,
          0,
          0,
          0,
          Vector{
            12,
            44,
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                12,
                37,
                Vector{
                  12,
                  44,
                  Vector{
                    4,
                    0,
                    0,
                    0,
                    Vector{
                      12,
                      37,
                      Vector{12, 44, Vector{8, $partial__1, 0, 0, $partial__0}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string("hsla(%d,%d%%,%d%%,%f)")
    } as dynamic;
    $a_ = Vector{0, 240, 248, 255} as dynamic;
    $b_ = Vector{0, 250, 235, 215} as dynamic;
    $c_ = Vector{0, 0, 255, 255} as dynamic;
    $d_ = Vector{0, 127, 255, 212} as dynamic;
    $e_ = Vector{0, 240, 255, 255} as dynamic;
    $f_ = Vector{0, 245, 245, 220} as dynamic;
    $g_ = Vector{0, 255, 228, 196} as dynamic;
    $h_ = Vector{0, 0, 0, 0} as dynamic;
    $i_ = Vector{0, 255, 235, 205} as dynamic;
    $j_ = Vector{0, 0, 0, 255} as dynamic;
    $k_ = Vector{0, 138, 43, 226} as dynamic;
    $l_ = Vector{0, 165, 42, 42} as dynamic;
    $m_ = Vector{0, 222, 184, 135} as dynamic;
    $n_ = Vector{0, 95, 158, 160} as dynamic;
    $o_ = Vector{0, 127, 255, 0} as dynamic;
    $p_ = Vector{0, 210, 105, 30} as dynamic;
    $q_ = Vector{0, 255, 127, 80} as dynamic;
    $r_ = Vector{0, 100, 149, 237} as dynamic;
    $s_ = Vector{0, 255, 248, 220} as dynamic;
    $t_ = Vector{0, 220, 20, 60} as dynamic;
    $u_ = Vector{0, 0, 255, 255} as dynamic;
    $v_ = Vector{0, 0, 0, 139} as dynamic;
    $w_ = Vector{0, 0, 139, 139} as dynamic;
    $x_ = Vector{0, 184, 134, 11} as dynamic;
    $y_ = Vector{0, 169, 169, 169} as dynamic;
    $z_ = Vector{0, 0, 100, 0} as dynamic;
    $A_ = Vector{0, 169, 169, 169} as dynamic;
    $B_ = Vector{0, 189, 183, 107} as dynamic;
    $C_ = Vector{0, 139, 0, 139} as dynamic;
    $D_ = Vector{0, 85, 107, 47} as dynamic;
    $E_ = Vector{0, 255, 140, 0} as dynamic;
    $F_ = Vector{0, 153, 50, 204} as dynamic;
    $G_ = Vector{0, 139, 0, 0} as dynamic;
    $H_ = Vector{0, 233, 150, 122} as dynamic;
    $I_ = Vector{0, 143, 188, 143} as dynamic;
    $J_ = Vector{0, 72, 61, 139} as dynamic;
    $K_ = Vector{0, 47, 79, 79} as dynamic;
    $L_ = Vector{0, 47, 79, 79} as dynamic;
    $M_ = Vector{0, 0, 206, 209} as dynamic;
    $N_ = Vector{0, 148, 0, 211} as dynamic;
    $O_ = Vector{0, 255, 20, 147} as dynamic;
    $P_ = Vector{0, 0, 191, 255} as dynamic;
    $Q_ = Vector{0, 105, 105, 105} as dynamic;
    $R_ = Vector{0, 105, 105, 105} as dynamic;
    $S_ = Vector{0, 30, 144, 255} as dynamic;
    $T_ = Vector{0, 178, 34, 34} as dynamic;
    $U_ = Vector{0, 255, 250, 240} as dynamic;
    $V_ = Vector{0, 34, 139, 34} as dynamic;
    $W_ = Vector{0, 255, 0, 255} as dynamic;
    $X_ = Vector{0, 220, 220, 220} as dynamic;
    $Y_ = Vector{0, 248, 248, 255} as dynamic;
    $Z_ = Vector{0, 255, 215, 0} as dynamic;
    $aa_ = Vector{0, 218, 165, 32} as dynamic;
    $ab_ = Vector{0, 128, 128, 128} as dynamic;
    $ac_ = Vector{0, 128, 128, 128} as dynamic;
    $ad_ = Vector{0, 0, 128, 0} as dynamic;
    $ae_ = Vector{0, 173, 255, 47} as dynamic;
    $af_ = Vector{0, 240, 255, 240} as dynamic;
    $ag_ = Vector{0, 255, 105, 180} as dynamic;
    $ah_ = Vector{0, 205, 92, 92} as dynamic;
    $ai_ = Vector{0, 75, 0, 130} as dynamic;
    $aj_ = Vector{0, 255, 255, 240} as dynamic;
    $ak_ = Vector{0, 240, 230, 140} as dynamic;
    $al_ = Vector{0, 230, 230, 250} as dynamic;
    $am_ = Vector{0, 255, 240, 245} as dynamic;
    $an_ = Vector{0, 124, 252, 0} as dynamic;
    $ao_ = Vector{0, 255, 250, 205} as dynamic;
    $ap_ = Vector{0, 173, 216, 230} as dynamic;
    $aq_ = Vector{0, 240, 128, 128} as dynamic;
    $ar_ = Vector{0, 224, 255, 255} as dynamic;
    $as_ = Vector{0, 250, 250, 210} as dynamic;
    $at_ = Vector{0, 211, 211, 211} as dynamic;
    $au_ = Vector{0, 144, 238, 144} as dynamic;
    $av_ = Vector{0, 211, 211, 211} as dynamic;
    $aw_ = Vector{0, 255, 182, 193} as dynamic;
    $ax_ = Vector{0, 255, 160, 122} as dynamic;
    $ay_ = Vector{0, 32, 178, 170} as dynamic;
    $az_ = Vector{0, 135, 206, 250} as dynamic;
    $aA_ = Vector{0, 119, 136, 153} as dynamic;
    $aB_ = Vector{0, 119, 136, 153} as dynamic;
    $aC_ = Vector{0, 176, 196, 222} as dynamic;
    $aD_ = Vector{0, 255, 255, 224} as dynamic;
    $aE_ = Vector{0, 0, 255, 0} as dynamic;
    $aF_ = Vector{0, 50, 205, 50} as dynamic;
    $aG_ = Vector{0, 250, 240, 230} as dynamic;
    $aH_ = Vector{0, 255, 0, 255} as dynamic;
    $aI_ = Vector{0, 128, 0, 0} as dynamic;
    $aJ_ = Vector{0, 102, 205, 170} as dynamic;
    $aK_ = Vector{0, 0, 0, 205} as dynamic;
    $aL_ = Vector{0, 186, 85, 211} as dynamic;
    $aM_ = Vector{0, 147, 112, 219} as dynamic;
    $aN_ = Vector{0, 60, 179, 113} as dynamic;
    $aO_ = Vector{0, 123, 104, 238} as dynamic;
    $aP_ = Vector{0, 0, 250, 154} as dynamic;
    $aQ_ = Vector{0, 72, 209, 204} as dynamic;
    $aR_ = Vector{0, 199, 21, 133} as dynamic;
    $aS_ = Vector{0, 25, 25, 112} as dynamic;
    $aT_ = Vector{0, 245, 255, 250} as dynamic;
    $aU_ = Vector{0, 255, 228, 225} as dynamic;
    $aV_ = Vector{0, 255, 228, 181} as dynamic;
    $aW_ = Vector{0, 255, 222, 173} as dynamic;
    $aX_ = Vector{0, 0, 0, 128} as dynamic;
    $aY_ = Vector{0, 253, 245, 230} as dynamic;
    $aZ_ = Vector{0, 128, 128, 0} as dynamic;
    $a0_ = Vector{0, 107, 142, 35} as dynamic;
    $a1_ = Vector{0, 255, 165, 0} as dynamic;
    $a2_ = Vector{0, 255, 69, 0} as dynamic;
    $a3_ = Vector{0, 218, 112, 214} as dynamic;
    $a4_ = Vector{0, 238, 232, 170} as dynamic;
    $a5_ = Vector{0, 152, 251, 152} as dynamic;
    $a6_ = Vector{0, 175, 238, 238} as dynamic;
    $a7_ = Vector{0, 219, 112, 147} as dynamic;
    $a8_ = Vector{0, 255, 239, 213} as dynamic;
    $a9_ = Vector{0, 255, 218, 185} as dynamic;
    $a__ = Vector{0, 205, 133, 63} as dynamic;
    $ba_ = Vector{0, 255, 192, 203} as dynamic;
    $bb_ = Vector{0, 221, 160, 221} as dynamic;
    $bc_ = Vector{0, 176, 224, 230} as dynamic;
    $bd_ = Vector{0, 128, 0, 128} as dynamic;
    $be_ = Vector{0, 255, 0, 0} as dynamic;
    $bf_ = Vector{0, 188, 143, 143} as dynamic;
    $bg_ = Vector{0, 65, 105, 225} as dynamic;
    $bh_ = Vector{0, 139, 69, 19} as dynamic;
    $bi_ = Vector{0, 250, 128, 114} as dynamic;
    $bj_ = Vector{0, 244, 164, 96} as dynamic;
    $bk_ = Vector{0, 46, 139, 87} as dynamic;
    $bl_ = Vector{0, 255, 245, 238} as dynamic;
    $bm_ = Vector{0, 160, 82, 45} as dynamic;
    $bn_ = Vector{0, 192, 192, 192} as dynamic;
    $bo_ = Vector{0, 135, 206, 235} as dynamic;
    $bp_ = Vector{0, 106, 90, 205} as dynamic;
    $bq_ = Vector{0, 112, 128, 144} as dynamic;
    $br_ = Vector{0, 112, 128, 144} as dynamic;
    $bs_ = Vector{0, 255, 250, 250} as dynamic;
    $bt_ = Vector{0, 0, 255, 127} as dynamic;
    $bu_ = Vector{0, 70, 130, 180} as dynamic;
    $bv_ = Vector{0, 210, 180, 140} as dynamic;
    $bw_ = Vector{0, 0, 128, 128} as dynamic;
    $bx_ = Vector{0, 216, 191, 216} as dynamic;
    $by_ = Vector{0, 255, 99, 71} as dynamic;
    $bz_ = Vector{0, 64, 224, 208} as dynamic;
    $bA_ = Vector{0, 238, 130, 238} as dynamic;
    $bB_ = Vector{0, 245, 222, 179} as dynamic;
    $bC_ = Vector{0, 255, 255, 255} as dynamic;
    $bD_ = Vector{0, 245, 245, 245} as dynamic;
    $bE_ = Vector{0, 255, 255, 0} as dynamic;
    $bF_ = Vector{0, 154, 205, 50} as dynamic;
    $string_of_name = (dynamic $param) : dynamic ==> {
      $dc_ = $param;
      if (74 <= $dc_) {
        if (111 <= $dc_) {
          switch($dc_) {
            // FALLTHROUGH
            case 111:
              return $cst_palevioletred;
            // FALLTHROUGH
            case 112:
              return $cst_papayawhip;
            // FALLTHROUGH
            case 113:
              return $cst_peachpuff;
            // FALLTHROUGH
            case 114:
              return $cst_peru;
            // FALLTHROUGH
            case 115:
              return $cst_pink;
            // FALLTHROUGH
            case 116:
              return $cst_plum;
            // FALLTHROUGH
            case 117:
              return $cst_powderblue;
            // FALLTHROUGH
            case 118:
              return $cst_purple;
            // FALLTHROUGH
            case 119:
              return $cst_red;
            // FALLTHROUGH
            case 120:
              return $cst_rosybrown;
            // FALLTHROUGH
            case 121:
              return $cst_royalblue;
            // FALLTHROUGH
            case 122:
              return $cst_saddlebrown;
            // FALLTHROUGH
            case 123:
              return $cst_salmon;
            // FALLTHROUGH
            case 124:
              return $cst_sandybrown;
            // FALLTHROUGH
            case 125:
              return $cst_seagreen;
            // FALLTHROUGH
            case 126:
              return $cst_seashell;
            // FALLTHROUGH
            case 127:
              return $cst_sienna;
            // FALLTHROUGH
            case 128:
              return $cst_silver;
            // FALLTHROUGH
            case 129:
              return $cst_skyblue;
            // FALLTHROUGH
            case 130:
              return $cst_slateblue;
            // FALLTHROUGH
            case 131:
              return $cst_slategray;
            // FALLTHROUGH
            case 132:
              return $cst_slategrey;
            // FALLTHROUGH
            case 133:
              return $cst_snow;
            // FALLTHROUGH
            case 134:
              return $cst_springgreen;
            // FALLTHROUGH
            case 135:
              return $cst_steelblue;
            // FALLTHROUGH
            case 136:
              return $cst_tan;
            // FALLTHROUGH
            case 137:
              return $cst_teal;
            // FALLTHROUGH
            case 138:
              return $cst_thistle;
            // FALLTHROUGH
            case 139:
              return $cst_tomato;
            // FALLTHROUGH
            case 140:
              return $cst_turquoise;
            // FALLTHROUGH
            case 141:
              return $cst_violet;
            // FALLTHROUGH
            case 142:
              return $cst_wheat;
            // FALLTHROUGH
            case 143:
              return $cst_white;
            // FALLTHROUGH
            case 144:
              return $cst_whitesmoke;
            // FALLTHROUGH
            case 145:
              return $cst_yellow;
            // FALLTHROUGH
            default:
              return $cst_yellowgreen;
            }
        }
        switch($dc_) {
          // FALLTHROUGH
          case 74:
            return $cst_lightpink;
          // FALLTHROUGH
          case 75:
            return $cst_lightsalmon;
          // FALLTHROUGH
          case 76:
            return $cst_lightseagreen;
          // FALLTHROUGH
          case 77:
            return $cst_lightskyblue;
          // FALLTHROUGH
          case 78:
            return $cst_lightslategray;
          // FALLTHROUGH
          case 79:
            return $cst_lightslategrey;
          // FALLTHROUGH
          case 80:
            return $cst_lightsteelblue;
          // FALLTHROUGH
          case 81:
            return $cst_lightyellow;
          // FALLTHROUGH
          case 82:
            return $cst_lime;
          // FALLTHROUGH
          case 83:
            return $cst_limegreen;
          // FALLTHROUGH
          case 84:
            return $cst_linen;
          // FALLTHROUGH
          case 85:
            return $cst_magenta;
          // FALLTHROUGH
          case 86:
            return $cst_maroon;
          // FALLTHROUGH
          case 87:
            return $cst_mediumaquamarine;
          // FALLTHROUGH
          case 88:
            return $cst_mediumblue;
          // FALLTHROUGH
          case 89:
            return $cst_mediumorchid;
          // FALLTHROUGH
          case 90:
            return $cst_mediumpurple;
          // FALLTHROUGH
          case 91:
            return $cst_mediumseagreen;
          // FALLTHROUGH
          case 92:
            return $cst_mediumslateblue;
          // FALLTHROUGH
          case 93:
            return $cst_mediumspringgreen;
          // FALLTHROUGH
          case 94:
            return $cst_mediumturquoise;
          // FALLTHROUGH
          case 95:
            return $cst_mediumvioletred;
          // FALLTHROUGH
          case 96:
            return $cst_midnightblue;
          // FALLTHROUGH
          case 97:
            return $cst_mintcream;
          // FALLTHROUGH
          case 98:
            return $cst_mistyrose;
          // FALLTHROUGH
          case 99:
            return $cst_moccasin;
          // FALLTHROUGH
          case 100:
            return $cst_navajowhite;
          // FALLTHROUGH
          case 101:
            return $cst_navy;
          // FALLTHROUGH
          case 102:
            return $cst_oldlace;
          // FALLTHROUGH
          case 103:
            return $cst_olive;
          // FALLTHROUGH
          case 104:
            return $cst_olivedrab;
          // FALLTHROUGH
          case 105:
            return $cst_orange;
          // FALLTHROUGH
          case 106:
            return $cst_orangered;
          // FALLTHROUGH
          case 107:
            return $cst_orchid;
          // FALLTHROUGH
          case 108:
            return $cst_palegoldenrod;
          // FALLTHROUGH
          case 109:
            return $cst_palegreen;
          // FALLTHROUGH
          default:
            return $cst_paleturquoise;
          }
      }
      if (37 <= $dc_) {
        switch($dc_) {
          // FALLTHROUGH
          case 37:
            return $cst_darkslategrey;
          // FALLTHROUGH
          case 38:
            return $cst_darkturquoise;
          // FALLTHROUGH
          case 39:
            return $cst_darkviolet;
          // FALLTHROUGH
          case 40:
            return $cst_deeppink;
          // FALLTHROUGH
          case 41:
            return $cst_deepskyblue;
          // FALLTHROUGH
          case 42:
            return $cst_dimgray;
          // FALLTHROUGH
          case 43:
            return $cst_dimgrey;
          // FALLTHROUGH
          case 44:
            return $cst_dodgerblue;
          // FALLTHROUGH
          case 45:
            return $cst_firebrick;
          // FALLTHROUGH
          case 46:
            return $cst_floralwhite;
          // FALLTHROUGH
          case 47:
            return $cst_forestgreen;
          // FALLTHROUGH
          case 48:
            return $cst_fuchsia;
          // FALLTHROUGH
          case 49:
            return $cst_gainsboro;
          // FALLTHROUGH
          case 50:
            return $cst_ghostwhite;
          // FALLTHROUGH
          case 51:
            return $cst_gold;
          // FALLTHROUGH
          case 52:
            return $cst_goldenrod;
          // FALLTHROUGH
          case 53:
            return $cst_gray;
          // FALLTHROUGH
          case 54:
            return $cst_grey;
          // FALLTHROUGH
          case 55:
            return $cst_green;
          // FALLTHROUGH
          case 56:
            return $cst_greenyellow;
          // FALLTHROUGH
          case 57:
            return $cst_honeydew;
          // FALLTHROUGH
          case 58:
            return $cst_hotpink;
          // FALLTHROUGH
          case 59:
            return $cst_indianred;
          // FALLTHROUGH
          case 60:
            return $cst_indigo;
          // FALLTHROUGH
          case 61:
            return $cst_ivory;
          // FALLTHROUGH
          case 62:
            return $cst_khaki;
          // FALLTHROUGH
          case 63:
            return $cst_lavender;
          // FALLTHROUGH
          case 64:
            return $cst_lavenderblush;
          // FALLTHROUGH
          case 65:
            return $cst_lawngreen;
          // FALLTHROUGH
          case 66:
            return $cst_lemonchiffon;
          // FALLTHROUGH
          case 67:
            return $cst_lightblue;
          // FALLTHROUGH
          case 68:
            return $cst_lightcoral;
          // FALLTHROUGH
          case 69:
            return $cst_lightcyan;
          // FALLTHROUGH
          case 70:
            return $cst_lightgoldenrodyellow;
          // FALLTHROUGH
          case 71:
            return $cst_lightgray;
          // FALLTHROUGH
          case 72:
            return $cst_lightgreen;
          // FALLTHROUGH
          default:
            return $cst_lightgrey;
          }
      }
      switch($dc_) {
        // FALLTHROUGH
        case 0:
          return $cst_aliceblue;
        // FALLTHROUGH
        case 1:
          return $cst_antiquewhite;
        // FALLTHROUGH
        case 2:
          return $cst_aqua;
        // FALLTHROUGH
        case 3:
          return $cst_aquamarine;
        // FALLTHROUGH
        case 4:
          return $cst_azure;
        // FALLTHROUGH
        case 5:
          return $cst_beige;
        // FALLTHROUGH
        case 6:
          return $cst_bisque;
        // FALLTHROUGH
        case 7:
          return $cst_black;
        // FALLTHROUGH
        case 8:
          return $cst_blanchedalmond;
        // FALLTHROUGH
        case 9:
          return $cst_blue;
        // FALLTHROUGH
        case 10:
          return $cst_blueviolet;
        // FALLTHROUGH
        case 11:
          return $cst_brown;
        // FALLTHROUGH
        case 12:
          return $cst_burlywood;
        // FALLTHROUGH
        case 13:
          return $cst_cadetblue;
        // FALLTHROUGH
        case 14:
          return $cst_chartreuse;
        // FALLTHROUGH
        case 15:
          return $cst_chocolate;
        // FALLTHROUGH
        case 16:
          return $cst_coral;
        // FALLTHROUGH
        case 17:
          return $cst_cornflowerblue;
        // FALLTHROUGH
        case 18:
          return $cst_cornsilk;
        // FALLTHROUGH
        case 19:
          return $cst_crimson;
        // FALLTHROUGH
        case 20:
          return $cst_cyan;
        // FALLTHROUGH
        case 21:
          return $cst_darkblue;
        // FALLTHROUGH
        case 22:
          return $cst_darkcyan;
        // FALLTHROUGH
        case 23:
          return $cst_darkgoldenrod;
        // FALLTHROUGH
        case 24:
          return $cst_darkgray;
        // FALLTHROUGH
        case 25:
          return $cst_darkgreen;
        // FALLTHROUGH
        case 26:
          return $cst_darkgrey;
        // FALLTHROUGH
        case 27:
          return $cst_darkkhaki;
        // FALLTHROUGH
        case 28:
          return $cst_darkmagenta;
        // FALLTHROUGH
        case 29:
          return $cst_darkolivegreen;
        // FALLTHROUGH
        case 30:
          return $cst_darkorange;
        // FALLTHROUGH
        case 31:
          return $cst_darkorchid;
        // FALLTHROUGH
        case 32:
          return $cst_darkred;
        // FALLTHROUGH
        case 33:
          return $cst_darksalmon;
        // FALLTHROUGH
        case 34:
          return $cst_darkseagreen;
        // FALLTHROUGH
        case 35:
          return $cst_darkslateblue;
        // FALLTHROUGH
        default:
          return $cst_darkslategray;
        }
    };
    $name_of_string = (dynamic $s) : dynamic ==> {
      $switch__0 = $caml_string_compare($s, $cst_lightgrey__0);
      if (0 <= $switch__0) {
        if (! (0 < $switch__0)) {return 73;}
        $switch__1 = $caml_string_compare($s, $cst_paleturquoise__0);
        if (0 <= $switch__1) {
          if (! (0 < $switch__1)) {return 110;}
          $switch__2 = $caml_string_compare($s, $cst_skyblue__0);
          if (0 <= $switch__2) {
            if (! (0 < $switch__2)) {return 129;}
            $switch__3 = $caml_string_compare($s, $cst_thistle__0);
            if (0 <= $switch__3) {
              if (! (0 < $switch__3)) {return 138;}
              if (! $caml_string_notequal($s, $cst_tomato__0)) {return 139;}
              if (! $caml_string_notequal($s, $cst_turquoise__0)) {return 140;}
              if (! $caml_string_notequal($s, $cst_violet__0)) {return 141;}
              if (! $caml_string_notequal($s, $cst_wheat__0)) {return 142;}
              if (! $caml_string_notequal($s, $cst_white__0)) {return 143;}
              if (! $caml_string_notequal($s, $cst_whitesmoke__0)) {return 144;}
              if (! $caml_string_notequal($s, $cst_yellow__0)) {return 145;}
              if (! $caml_string_notequal($s, $cst_yellowgreen__0)) {return 146;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_slateblue__0)) {return 130;}
              if (! $caml_string_notequal($s, $cst_slategray__0)) {return 131;}
              if (! $caml_string_notequal($s, $cst_slategrey__0)) {return 132;}
              if (! $caml_string_notequal($s, $cst_snow__0)) {return 133;}
              if (! $caml_string_notequal($s, $cst_springgreen__0)) {return 134;}
              if (! $caml_string_notequal($s, $cst_steelblue__0)) {return 135;}
              if (! $caml_string_notequal($s, $cst_tan__0)) {return 136;}
              if (! $caml_string_notequal($s, $cst_teal__0)) {return 137;}
            }
          }
          else {
            $switch__4 = $caml_string_compare($s, $cst_rosybrown__0);
            if (0 <= $switch__4) {
              if (! (0 < $switch__4)) {return 120;}
              if (! $caml_string_notequal($s, $cst_royalblue__0)) {return 121;}
              if (! $caml_string_notequal($s, $cst_saddlebrown__0)) {return 122;}
              if (! $caml_string_notequal($s, $cst_salmon__0)) {return 123;}
              if (! $caml_string_notequal($s, $cst_sandybrown__0)) {return 124;}
              if (! $caml_string_notequal($s, $cst_seagreen__0)) {return 125;}
              if (! $caml_string_notequal($s, $cst_seashell__0)) {return 126;}
              if (! $caml_string_notequal($s, $cst_sienna__0)) {return 127;}
              if (! $caml_string_notequal($s, $cst_silver__0)) {return 128;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_palevioletred__0)) {return 111;}
              if (! $caml_string_notequal($s, $cst_papayawhip__0)) {return 112;}
              if (! $caml_string_notequal($s, $cst_peachpuff__0)) {return 113;}
              if (! $caml_string_notequal($s, $cst_peru__0)) {return 114;}
              if (! $caml_string_notequal($s, $cst_pink__0)) {return 115;}
              if (! $caml_string_notequal($s, $cst_plum__0)) {return 116;}
              if (! $caml_string_notequal($s, $cst_powderblue__0)) {return 117;}
              if (! $caml_string_notequal($s, $cst_purple__0)) {return 118;}
              if (! $caml_string_notequal($s, $cst_red__0)) {return 119;}
            }
          }
        }
        else {
          $switch__5 = $caml_string_compare($s, $cst_mediumslateblue__0);
          if (0 <= $switch__5) {
            if (! (0 < $switch__5)) {return 92;}
            $switch__6 = $caml_string_compare($s, $cst_navy__0);
            if (0 <= $switch__6) {
              if (! (0 < $switch__6)) {return 101;}
              if (! $caml_string_notequal($s, $cst_oldlace__0)) {return 102;}
              if (! $caml_string_notequal($s, $cst_olive__0)) {return 103;}
              if (! $caml_string_notequal($s, $cst_olivedrab__0)) {return 104;}
              if (! $caml_string_notequal($s, $cst_orange__0)) {return 105;}
              if (! $caml_string_notequal($s, $cst_orangered__0)) {return 106;}
              if (! $caml_string_notequal($s, $cst_orchid__0)) {return 107;}
              if (! $caml_string_notequal($s, $cst_palegoldenrod__0)) {return 108;}
              if (! $caml_string_notequal($s, $cst_palegreen__0)) {return 109;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_mediumspringgreen__0)) {return 93;}
              if (! $caml_string_notequal($s, $cst_mediumturquoise__0)) {return 94;}
              if (! $caml_string_notequal($s, $cst_mediumvioletred__0)) {return 95;}
              if (! $caml_string_notequal($s, $cst_midnightblue__0)) {return 96;}
              if (! $caml_string_notequal($s, $cst_mintcream__0)) {return 97;}
              if (! $caml_string_notequal($s, $cst_mistyrose__0)) {return 98;}
              if (! $caml_string_notequal($s, $cst_moccasin__0)) {return 99;}
              if (! $caml_string_notequal($s, $cst_navajowhite__0)) {return 100;}
            }
          }
          else {
            $switch__7 = $caml_string_compare($s, $cst_limegreen__0);
            if (0 <= $switch__7) {
              if (! (0 < $switch__7)) {return 83;}
              if (! $caml_string_notequal($s, $cst_linen__0)) {return 84;}
              if (! $caml_string_notequal($s, $cst_magenta__0)) {return 85;}
              if (! $caml_string_notequal($s, $cst_maroon__0)) {return 86;}
              if (! $caml_string_notequal($s, $cst_mediumaquamarine__0)) {return 87;}
              if (! $caml_string_notequal($s, $cst_mediumblue__0)) {return 88;}
              if (! $caml_string_notequal($s, $cst_mediumorchid__0)) {return 89;}
              if (! $caml_string_notequal($s, $cst_mediumpurple__0)) {return 90;}
              if (! $caml_string_notequal($s, $cst_mediumseagreen__0)) {return 91;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_lightpink__0)) {return 74;}
              if (! $caml_string_notequal($s, $cst_lightsalmon__0)) {return 75;}
              if (! $caml_string_notequal($s, $cst_lightseagreen__0)) {return 76;}
              if (! $caml_string_notequal($s, $cst_lightskyblue__0)) {return 77;}
              if (! $caml_string_notequal($s, $cst_lightslategray__0)) {return 78;}
              if (! $caml_string_notequal($s, $cst_lightslategrey__0)) {return 79;}
              if (! $caml_string_notequal($s, $cst_lightsteelblue__0)) {return 80;}
              if (! $caml_string_notequal($s, $cst_lightyellow__0)) {return 81;}
              if (! $caml_string_notequal($s, $cst_lime__0)) {return 82;}
            }
          }
        }
      }
      else {
        $switch__8 = $caml_string_compare($s, $cst_darkslategray__0);
        if (0 <= $switch__8) {
          if (! (0 < $switch__8)) {return 36;}
          $switch__9 = $caml_string_compare($s, $cst_greenyellow__0);
          if (0 <= $switch__9) {
            if (! (0 < $switch__9)) {return 56;}
            $switch__10 = $caml_string_compare($s, $cst_lavenderblush__0);
            if (0 <= $switch__10) {
              if (! (0 < $switch__10)) {return 64;}
              if (! $caml_string_notequal($s, $cst_lawngreen__0)) {return 65;}
              if (! $caml_string_notequal($s, $cst_lemonchiffon__0)) {return 66;}
              if (! $caml_string_notequal($s, $cst_lightblue__0)) {return 67;}
              if (! $caml_string_notequal($s, $cst_lightcoral__0)) {return 68;}
              if (! $caml_string_notequal($s, $cst_lightcyan__0)) {return 69;}
              if (! $caml_string_notequal($s, $cst_lightgoldenrodyellow__0)) {return 70;}
              if (! $caml_string_notequal($s, $cst_lightgray__0)) {return 71;}
              if (! $caml_string_notequal($s, $cst_lightgreen__0)) {return 72;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_grey__0)) {return 54;}
              if (! $caml_string_notequal($s, $cst_honeydew__0)) {return 57;}
              if (! $caml_string_notequal($s, $cst_hotpink__0)) {return 58;}
              if (! $caml_string_notequal($s, $cst_indianred__0)) {return 59;}
              if (! $caml_string_notequal($s, $cst_indigo__0)) {return 60;}
              if (! $caml_string_notequal($s, $cst_ivory__0)) {return 61;}
              if (! $caml_string_notequal($s, $cst_khaki__0)) {return 62;}
              if (! $caml_string_notequal($s, $cst_lavender__0)) {return 63;}
            }
          }
          else {
            $switch__11 = $caml_string_compare($s, $cst_floralwhite__0);
            if (0 <= $switch__11) {
              if (! (0 < $switch__11)) {return 46;}
              if (! $caml_string_notequal($s, $cst_forestgreen__0)) {return 47;}
              if (! $caml_string_notequal($s, $cst_fuchsia__0)) {return 48;}
              if (! $caml_string_notequal($s, $cst_gainsboro__0)) {return 49;}
              if (! $caml_string_notequal($s, $cst_ghostwhite__0)) {return 50;}
              if (! $caml_string_notequal($s, $cst_gold__0)) {return 51;}
              if (! $caml_string_notequal($s, $cst_goldenrod__0)) {return 52;}
              if (! $caml_string_notequal($s, $cst_gray__0)) {return 53;}
              if (! $caml_string_notequal($s, $cst_green__0)) {return 55;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_darkslategrey__0)) {return 37;}
              if (! $caml_string_notequal($s, $cst_darkturquoise__0)) {return 38;}
              if (! $caml_string_notequal($s, $cst_darkviolet__0)) {return 39;}
              if (! $caml_string_notequal($s, $cst_deeppink__0)) {return 40;}
              if (! $caml_string_notequal($s, $cst_deepskyblue__0)) {return 41;}
              if (! $caml_string_notequal($s, $cst_dimgray__0)) {return 42;}
              if (! $caml_string_notequal($s, $cst_dimgrey__0)) {return 43;}
              if (! $caml_string_notequal($s, $cst_dodgerblue__0)) {return 44;}
              if (! $caml_string_notequal($s, $cst_firebrick__0)) {return 45;}
            }
          }
        }
        else {
          $switch__12 = $caml_string_compare($s, $cst_cornsilk__0);
          if (0 <= $switch__12) {
            if (! (0 < $switch__12)) {return 18;}
            $switch__13 = $caml_string_compare($s, $cst_darkkhaki__0);
            if (0 <= $switch__13) {
              if (! (0 < $switch__13)) {return 27;}
              if (! $caml_string_notequal($s, $cst_darkmagenta__0)) {return 28;}
              if (! $caml_string_notequal($s, $cst_darkolivegreen__0)) {return 29;}
              if (! $caml_string_notequal($s, $cst_darkorange__0)) {return 30;}
              if (! $caml_string_notequal($s, $cst_darkorchid__0)) {return 31;}
              if (! $caml_string_notequal($s, $cst_darkred__0)) {return 32;}
              if (! $caml_string_notequal($s, $cst_darksalmon__0)) {return 33;}
              if (! $caml_string_notequal($s, $cst_darkseagreen__0)) {return 34;}
              if (! $caml_string_notequal($s, $cst_darkslateblue__0)) {return 35;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_crimson__0)) {return 19;}
              if (! $caml_string_notequal($s, $cst_cyan__0)) {return 20;}
              if (! $caml_string_notequal($s, $cst_darkblue__0)) {return 21;}
              if (! $caml_string_notequal($s, $cst_darkcyan__0)) {return 22;}
              if (! $caml_string_notequal($s, $cst_darkgoldenrod__0)) {return 23;}
              if (! $caml_string_notequal($s, $cst_darkgray__0)) {return 24;}
              if (! $caml_string_notequal($s, $cst_darkgreen__0)) {return 25;}
              if (! $caml_string_notequal($s, $cst_darkgrey__0)) {return 26;}
            }
          }
          else {
            $switch__14 = $caml_string_compare($s, $cst_blue__0);
            if (0 <= $switch__14) {
              if (! (0 < $switch__14)) {return 9;}
              if (! $caml_string_notequal($s, $cst_blueviolet__0)) {return 10;}
              if (! $caml_string_notequal($s, $cst_brown__0)) {return 11;}
              if (! $caml_string_notequal($s, $cst_burlywood__0)) {return 12;}
              if (! $caml_string_notequal($s, $cst_cadetblue__0)) {return 13;}
              if (! $caml_string_notequal($s, $cst_chartreuse__0)) {return 14;}
              if (! $caml_string_notequal($s, $cst_chocolate__0)) {return 15;}
              if (! $caml_string_notequal($s, $cst_coral__0)) {return 16;}
              if (! $caml_string_notequal($s, $cst_cornflowerblue__0)) {return 17;}
            }
            else {
              if (! $caml_string_notequal($s, $cst_aliceblue__0)) {return 0;}
              if (! $caml_string_notequal($s, $cst_antiquewhite__0)) {return 1;}
              if (! $caml_string_notequal($s, $cst_aqua__0)) {return 2;}
              if (! $caml_string_notequal($s, $cst_aquamarine__0)) {return 3;}
              if (! $caml_string_notequal($s, $cst_azure__0)) {return 4;}
              if (! $caml_string_notequal($s, $cst_beige__0)) {return 5;}
              if (! $caml_string_notequal($s, $cst_bisque__0)) {return 6;}
              if (! $caml_string_notequal($s, $cst_black__0)) {return 7;}
              if (! $caml_string_notequal($s, $cst_blanchedalmond__0)) {return 8;}
            }
          }
        }
      }
      $db_ = $call2($Stdlib[28], $s, $cst_is_not_a_valid_color_name);
      throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $db_}) as \Throwable;
    };
    $rgb_of_name = (dynamic $param) : dynamic ==> {
      $da_ = $param;
      if (74 <= $da_) {
        if (111 <= $da_) {
          switch($da_) {
            // FALLTHROUGH
            case 111:
              return $a7_;
            // FALLTHROUGH
            case 112:
              return $a8_;
            // FALLTHROUGH
            case 113:
              return $a9_;
            // FALLTHROUGH
            case 114:
              return $a__;
            // FALLTHROUGH
            case 115:
              return $ba_;
            // FALLTHROUGH
            case 116:
              return $bb_;
            // FALLTHROUGH
            case 117:
              return $bc_;
            // FALLTHROUGH
            case 118:
              return $bd_;
            // FALLTHROUGH
            case 119:
              return $be_;
            // FALLTHROUGH
            case 120:
              return $bf_;
            // FALLTHROUGH
            case 121:
              return $bg_;
            // FALLTHROUGH
            case 122:
              return $bh_;
            // FALLTHROUGH
            case 123:
              return $bi_;
            // FALLTHROUGH
            case 124:
              return $bj_;
            // FALLTHROUGH
            case 125:
              return $bk_;
            // FALLTHROUGH
            case 126:
              return $bl_;
            // FALLTHROUGH
            case 127:
              return $bm_;
            // FALLTHROUGH
            case 128:
              return $bn_;
            // FALLTHROUGH
            case 129:
              return $bo_;
            // FALLTHROUGH
            case 130:
              return $bp_;
            // FALLTHROUGH
            case 131:
              return $bq_;
            // FALLTHROUGH
            case 132:
              return $br_;
            // FALLTHROUGH
            case 133:
              return $bs_;
            // FALLTHROUGH
            case 134:
              return $bt_;
            // FALLTHROUGH
            case 135:
              return $bu_;
            // FALLTHROUGH
            case 136:
              return $bv_;
            // FALLTHROUGH
            case 137:
              return $bw_;
            // FALLTHROUGH
            case 138:
              return $bx_;
            // FALLTHROUGH
            case 139:
              return $by_;
            // FALLTHROUGH
            case 140:
              return $bz_;
            // FALLTHROUGH
            case 141:
              return $bA_;
            // FALLTHROUGH
            case 142:
              return $bB_;
            // FALLTHROUGH
            case 143:
              return $bC_;
            // FALLTHROUGH
            case 144:
              return $bD_;
            // FALLTHROUGH
            case 145:
              return $bE_;
            // FALLTHROUGH
            default:
              return $bF_;
            }
        }
        switch($da_) {
          // FALLTHROUGH
          case 74:
            return $aw_;
          // FALLTHROUGH
          case 75:
            return $ax_;
          // FALLTHROUGH
          case 76:
            return $ay_;
          // FALLTHROUGH
          case 77:
            return $az_;
          // FALLTHROUGH
          case 78:
            return $aA_;
          // FALLTHROUGH
          case 79:
            return $aB_;
          // FALLTHROUGH
          case 80:
            return $aC_;
          // FALLTHROUGH
          case 81:
            return $aD_;
          // FALLTHROUGH
          case 82:
            return $aE_;
          // FALLTHROUGH
          case 83:
            return $aF_;
          // FALLTHROUGH
          case 84:
            return $aG_;
          // FALLTHROUGH
          case 85:
            return $aH_;
          // FALLTHROUGH
          case 86:
            return $aI_;
          // FALLTHROUGH
          case 87:
            return $aJ_;
          // FALLTHROUGH
          case 88:
            return $aK_;
          // FALLTHROUGH
          case 89:
            return $aL_;
          // FALLTHROUGH
          case 90:
            return $aM_;
          // FALLTHROUGH
          case 91:
            return $aN_;
          // FALLTHROUGH
          case 92:
            return $aO_;
          // FALLTHROUGH
          case 93:
            return $aP_;
          // FALLTHROUGH
          case 94:
            return $aQ_;
          // FALLTHROUGH
          case 95:
            return $aR_;
          // FALLTHROUGH
          case 96:
            return $aS_;
          // FALLTHROUGH
          case 97:
            return $aT_;
          // FALLTHROUGH
          case 98:
            return $aU_;
          // FALLTHROUGH
          case 99:
            return $aV_;
          // FALLTHROUGH
          case 100:
            return $aW_;
          // FALLTHROUGH
          case 101:
            return $aX_;
          // FALLTHROUGH
          case 102:
            return $aY_;
          // FALLTHROUGH
          case 103:
            return $aZ_;
          // FALLTHROUGH
          case 104:
            return $a0_;
          // FALLTHROUGH
          case 105:
            return $a1_;
          // FALLTHROUGH
          case 106:
            return $a2_;
          // FALLTHROUGH
          case 107:
            return $a3_;
          // FALLTHROUGH
          case 108:
            return $a4_;
          // FALLTHROUGH
          case 109:
            return $a5_;
          // FALLTHROUGH
          default:
            return $a6_;
          }
      }
      if (37 <= $da_) {
        switch($da_) {
          // FALLTHROUGH
          case 37:
            return $L_;
          // FALLTHROUGH
          case 38:
            return $M_;
          // FALLTHROUGH
          case 39:
            return $N_;
          // FALLTHROUGH
          case 40:
            return $O_;
          // FALLTHROUGH
          case 41:
            return $P_;
          // FALLTHROUGH
          case 42:
            return $Q_;
          // FALLTHROUGH
          case 43:
            return $R_;
          // FALLTHROUGH
          case 44:
            return $S_;
          // FALLTHROUGH
          case 45:
            return $T_;
          // FALLTHROUGH
          case 46:
            return $U_;
          // FALLTHROUGH
          case 47:
            return $V_;
          // FALLTHROUGH
          case 48:
            return $W_;
          // FALLTHROUGH
          case 49:
            return $X_;
          // FALLTHROUGH
          case 50:
            return $Y_;
          // FALLTHROUGH
          case 51:
            return $Z_;
          // FALLTHROUGH
          case 52:
            return $aa_;
          // FALLTHROUGH
          case 53:
            return $ab_;
          // FALLTHROUGH
          case 54:
            return $ac_;
          // FALLTHROUGH
          case 55:
            return $ad_;
          // FALLTHROUGH
          case 56:
            return $ae_;
          // FALLTHROUGH
          case 57:
            return $af_;
          // FALLTHROUGH
          case 58:
            return $ag_;
          // FALLTHROUGH
          case 59:
            return $ah_;
          // FALLTHROUGH
          case 60:
            return $ai_;
          // FALLTHROUGH
          case 61:
            return $aj_;
          // FALLTHROUGH
          case 62:
            return $ak_;
          // FALLTHROUGH
          case 63:
            return $al_;
          // FALLTHROUGH
          case 64:
            return $am_;
          // FALLTHROUGH
          case 65:
            return $an_;
          // FALLTHROUGH
          case 66:
            return $ao_;
          // FALLTHROUGH
          case 67:
            return $ap_;
          // FALLTHROUGH
          case 68:
            return $aq_;
          // FALLTHROUGH
          case 69:
            return $ar_;
          // FALLTHROUGH
          case 70:
            return $as_;
          // FALLTHROUGH
          case 71:
            return $at_;
          // FALLTHROUGH
          case 72:
            return $au_;
          // FALLTHROUGH
          default:
            return $av_;
          }
      }
      switch($da_) {
        // FALLTHROUGH
        case 0:
          return $a_;
        // FALLTHROUGH
        case 1:
          return $b_;
        // FALLTHROUGH
        case 2:
          return $c_;
        // FALLTHROUGH
        case 3:
          return $d_;
        // FALLTHROUGH
        case 4:
          return $e_;
        // FALLTHROUGH
        case 5:
          return $f_;
        // FALLTHROUGH
        case 6:
          return $g_;
        // FALLTHROUGH
        case 7:
          return $h_;
        // FALLTHROUGH
        case 8:
          return $i_;
        // FALLTHROUGH
        case 9:
          return $j_;
        // FALLTHROUGH
        case 10:
          return $k_;
        // FALLTHROUGH
        case 11:
          return $l_;
        // FALLTHROUGH
        case 12:
          return $m_;
        // FALLTHROUGH
        case 13:
          return $n_;
        // FALLTHROUGH
        case 14:
          return $o_;
        // FALLTHROUGH
        case 15:
          return $p_;
        // FALLTHROUGH
        case 16:
          return $q_;
        // FALLTHROUGH
        case 17:
          return $r_;
        // FALLTHROUGH
        case 18:
          return $s_;
        // FALLTHROUGH
        case 19:
          return $t_;
        // FALLTHROUGH
        case 20:
          return $u_;
        // FALLTHROUGH
        case 21:
          return $v_;
        // FALLTHROUGH
        case 22:
          return $w_;
        // FALLTHROUGH
        case 23:
          return $x_;
        // FALLTHROUGH
        case 24:
          return $y_;
        // FALLTHROUGH
        case 25:
          return $z_;
        // FALLTHROUGH
        case 26:
          return $A_;
        // FALLTHROUGH
        case 27:
          return $B_;
        // FALLTHROUGH
        case 28:
          return $C_;
        // FALLTHROUGH
        case 29:
          return $D_;
        // FALLTHROUGH
        case 30:
          return $E_;
        // FALLTHROUGH
        case 31:
          return $F_;
        // FALLTHROUGH
        case 32:
          return $G_;
        // FALLTHROUGH
        case 33:
          return $H_;
        // FALLTHROUGH
        case 34:
          return $I_;
        // FALLTHROUGH
        case 35:
          return $J_;
        // FALLTHROUGH
        default:
          return $K_;
        }
    };
    $rgb = (dynamic $a, dynamic $r, dynamic $g, dynamic $b) : dynamic ==> {
      if ($a) {$a__0 = $a[1];return Vector{3, Vector{0, $r, $g, $b, $a__0}};}
      return Vector{1, Vector{0, $r, $g, $b}};
    };
    $hsl = (dynamic $a, dynamic $h, dynamic $s, dynamic $l) : dynamic ==> {
      if ($a) {$a__0 = $a[1];return Vector{6, Vector{0, $h, $s, $l, $a__0}};}
      return Vector{5, Vector{0, $h, $s, $l}};
    };
    $string_of_t = (dynamic $param) : dynamic ==> {
      switch($param[0]) {
        // FALLTHROUGH
        case 0:
          $n = $param[1];
          return $string_of_name($n);
        // FALLTHROUGH
        case 1:
          $match = $param[1];
          $b = $match[3];
          $g = $match[2];
          $r = $match[1];
          return $call4($Stdlib_printf[4], $bG_, $r, $g, $b);
        // FALLTHROUGH
        case 2:
          $match__0 = $param[1];
          $b__0 = $match__0[3];
          $g__0 = $match__0[2];
          $r__0 = $match__0[1];
          return $call4($Stdlib_printf[4], $bH_, $r__0, $g__0, $b__0);
        // FALLTHROUGH
        case 3:
          $match__1 = $param[1];
          $a = $match__1[4];
          $b__1 = $match__1[3];
          $g__1 = $match__1[2];
          $r__1 = $match__1[1];
          return $call5($Stdlib_printf[4], $bI_, $r__1, $g__1, $b__1, $a);
        // FALLTHROUGH
        case 4:
          $match__2 = $param[1];
          $a__0 = $match__2[4];
          $b__2 = $match__2[3];
          $g__2 = $match__2[2];
          $r__2 = $match__2[1];
          return $call5($Stdlib_printf[4], $bJ_, $r__2, $g__2, $b__2, $a__0);
        // FALLTHROUGH
        case 5:
          $match__3 = $param[1];
          $l = $match__3[3];
          $s = $match__3[2];
          $h = $match__3[1];
          return $call4($Stdlib_printf[4], $bK_, $h, $s, $l);
        // FALLTHROUGH
        default:
          $match__4 = $param[1];
          $a__1 = $match__4[4];
          $l__0 = $match__4[3];
          $s__0 = $match__4[2];
          $h__0 = $match__4[1];
          return $call5($Stdlib_printf[4], $bL_, $h__0, $s__0, $l__0, $a__1);
        }
    };
    $hex_of_rgb = (dynamic $param) : dynamic ==> {
      $blue = $param[3];
      $green = $param[2];
      $red = $param[1];
      $in_range = (dynamic $i) : dynamic ==> {
        $c7_ = $i < 0 ? 1 : (0);
        $c8_ = $c7_ ? $c7_ : (255 < $i ? 1 : (0));
        if ($c8_) {
          $c9_ = $call1($Stdlib[33], $i);
          $c__ = $call2($Stdlib[28], $c9_, $cst_is_out_of_valid_range);
          throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $c__}) as \Throwable;
        }
        return $c8_;
      };
      $in_range($red);
      $in_range($green);
      $in_range($blue);
      return $call4($Stdlib_printf[4], $bM_, $red, $green, $blue);
    };
    $js_t_of_js_string = (dynamic $s) : dynamic ==> {
      $cI_ = 0 as dynamic;
      $cJ_ = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d);
      $cK_ = $Js_of_ocaml_Js[10];
      $rgb_re = ((dynamic $t23, dynamic $t22, dynamic $param) : dynamic ==> {return new $t23($t22);
       })($cK_, $cJ_, $cI_);
      $cL_ = 0 as dynamic;
      $cM_ = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d__0);
      $cN_ = $Js_of_ocaml_Js[10];
      $rgb_pct_re = ((dynamic $t21, dynamic $t20, dynamic $param) : dynamic ==> {return new $t21($t20);
       })($cN_, $cM_, $cL_);
      $cO_ = 0 as dynamic;
      $cP_ = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d);
      $cQ_ = $Js_of_ocaml_Js[10];
      $rgba_re = ((dynamic $t19, dynamic $t18, dynamic $param) : dynamic ==> {return new $t19($t18);
       })($cQ_, $cP_, $cO_);
      $cR_ = 0 as dynamic;
      $cS_ = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d__0);
      $cT_ = $Js_of_ocaml_Js[10];
      $rgba_pct_re = ((dynamic $t17, dynamic $t16, dynamic $param) : dynamic ==> {return new $t17($t16);
       })($cT_, $cS_, $cR_);
      $cU_ = 0 as dynamic;
      $cV_ = $caml_jsbytes_of_string($cst_hsl_s_d_s_d_s_d);
      $cW_ = $Js_of_ocaml_Js[10];
      $hsl_re = ((dynamic $t15, dynamic $t14, dynamic $param) : dynamic ==> {return new $t15($t14);
       })($cW_, $cV_, $cU_);
      $cX_ = 0 as dynamic;
      $cY_ = $caml_jsbytes_of_string($cst_hsla_s_d_s_d_s_d_d_d);
      $cZ_ = $Js_of_ocaml_Js[10];
      $hsla_re = ((dynamic $t13, dynamic $t12, dynamic $param) : dynamic ==> {return new $t13($t12);
       })($cZ_, $cY_, $cX_);
      $c0_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -856045486, 289), $x);
      };
      if (
        !
        (int)
        ((dynamic $t1, dynamic $t0, dynamic $param) : dynamic ==> {return $t1->test($t0);
         })($rgb_re, $s, $c0_)
      ) {
        $c1_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, -856045486, 290), $x);
        };
        if (
          !
          (int)
          ((dynamic $t3, dynamic $t2, dynamic $param) : dynamic ==> {return $t3->test($t2);
           })($rgba_re, $s, $c1_)
        ) {
          $c2_ = (dynamic $x) : dynamic ==> {
            return $call1($caml_get_public_method($x, -856045486, 291), $x);
          };
          if (
            !
            (int)
            ((dynamic $t5, dynamic $t4, dynamic $param) : dynamic ==> {return $t5->test($t4);
             })($rgb_pct_re, $s, $c2_)
          ) {
            $c3_ = (dynamic $x) : dynamic ==> {
              return $call1($caml_get_public_method($x, -856045486, 292), $x);
            };
            if (
              !
              (int)
              ((dynamic $t7, dynamic $t6, dynamic $param) : dynamic ==> {return $t7->test($t6);
               })($rgba_pct_re, $s, $c3_)
            ) {
              $c4_ = (dynamic $x) : dynamic ==> {
                return $call1($caml_get_public_method($x, -856045486, 293), $x
                );
              };
              if (
                !
                (int)
                ((dynamic $t9, dynamic $t8, dynamic $param) : dynamic ==> {return $t9->test($t8);
                 })($hsl_re, $s, $c4_)
              ) {
                $c5_ = (dynamic $x) : dynamic ==> {
                  return $call1(
                    $caml_get_public_method($x, -856045486, 294),
                    $x
                  );
                };
                if (
                  !
                  (int)
                  ((dynamic $t11, dynamic $t10, dynamic $param) : dynamic ==> {return $t11->test($t10);
                   })($hsla_re, $s, $c5_)
                ) {
                  if ($call2($Stdlib_list[32], $caml_js_to_string($s), $bN_)) {return $s;}
                  $c6_ = $call2(
                    $Stdlib[28],
                    $caml_js_to_string($s),
                    $cst_is_not_a_valid_color
                  );
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Stdlib[6], $c6_}
                        ) as \Throwable;
                }
              }
            }
          }
        }
      }
      return $s;
    };
    $name = (dynamic $cn) : dynamic ==> {
      return $string_of_name($cn)->toString();
    };
    $js = (dynamic $c) : dynamic ==> {
      if (0 === $c[0]) {$n = $c[1];return $name($n);}
      return $string_of_t($c)->toString();
    };
    $ml = (dynamic $c) : dynamic ==> {
      $s = $caml_js_to_string($c);
      try {$cv_ = Vector{0, $name_of_string($s)} as dynamic;return $cv_;}
      catch(\Throwable $cw_) {
        $cw_ = $runtime["caml_wrap_exception"]($cw_);
        if ($cw_[1] === $Stdlib[6]) {
          $fail = (dynamic $param) : dynamic ==> {
            $cH_ = $call2($Stdlib[28], $s, $cst_is_not_a_valid_color__0);
            throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $cH_}) as \Throwable;
          };
          $re_rgb = $call1($Js_of_ocaml_Regexp[1], $cst_rgba_d_d_d_d_d);
          $re_rgb_pct = $call1($Js_of_ocaml_Regexp[1], $cst_rgba_d_d_d_d_d__0);
          $re_hsl = $call1($Js_of_ocaml_Regexp[1], $cst_hsla_d_d_d_d_d);
          $i_of_s_o = (dynamic $param) : dynamic ==> {
            if ($param) {
              $i = $param[1];
              try {$cF_ = $runtime["caml_int_of_string"]($i);return $cF_;}
              catch(\Throwable $cG_) {
                $cG_ = $runtime["caml_wrap_exception"]($cG_);
                if ($cG_[1] === $Stdlib[6]) {$s = $cG_[2];}
                else {
                  if ($cG_[1] !== $Stdlib[7]) {
                    throw $caml_wrap_thrown_exception_reraise($cG_) as \Throwable;
                  }
                  $s = $cG_[2];
                }
                $cC_ = $call2($Stdlib[28], $cst, $s);
                $cD_ = $call2($Stdlib[28], $i, $cC_);
                $cE_ = $call2($Stdlib[28], $cst_color_conversion_error, $cD_);
                throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $cE_}) as \Throwable;
              }
            }
            return $fail(0);
          };
          $f_of_s = (dynamic $f) : dynamic ==> {
            try {$cA_ = $caml_float_of_string($f);return $cA_;}
            catch(\Throwable $cB_) {
              $cB_ = $runtime["caml_wrap_exception"]($cB_);
              if ($cB_[1] === $Stdlib[6]) {$s = $cB_[2];}
              else {
                if ($cB_[1] !== $Stdlib[7]) {
                  throw $caml_wrap_thrown_exception_reraise($cB_) as \Throwable;
                }
                $s = $cB_[2];
              }
              $cx_ = $call2($Stdlib[28], $cst__0, $s);
              $cy_ = $call2($Stdlib[28], $f, $cx_);
              $cz_ = $call2($Stdlib[28], $cst_color_conversion_error__0, $cy_);
              throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $cz_}) as \Throwable;
            }
          };
          $match = $call3($Js_of_ocaml_Regexp[7], $re_rgb, $s, 0);
          if ($match) {
            $r = $match[1];
            $red = $call2($Js_of_ocaml_Regexp[11], $r, 2);
            $green = $call2($Js_of_ocaml_Regexp[11], $r, 3);
            $blue = $call2($Js_of_ocaml_Regexp[11], $r, 4);
            $alpha = $call2($Js_of_ocaml_Regexp[11], $r, 5);
            $match__0 = $call2($Js_of_ocaml_Regexp[11], $r, 1);
            if ($match__0) {
              $cd_ = $match__0[1];
              if (! $caml_string_notequal($cd_, $cst_rgb)) {
                if ($alpha) {return $fail(0);}
                $ch_ = $i_of_s_o($blue);
                $ci_ = $i_of_s_o($green);
                return Vector{1, Vector{0, $i_of_s_o($red), $ci_, $ch_}};
              }
              if (! $caml_string_notequal($cd_, $cst_rgba)) {
                if ($alpha) {
                  $a = $alpha[1];
                  $ce_ = $f_of_s($a);
                  $cf_ = $i_of_s_o($blue);
                  $cg_ = $i_of_s_o($green);
                  return Vector{
                    3,
                    Vector{0, $i_of_s_o($red), $cg_, $cf_, $ce_}
                  };
                }
                return $fail(0);
              }
            }
            return $fail(0);
          }
          $match__1 = $call3($Js_of_ocaml_Regexp[7], $re_rgb_pct, $s, 0);
          if ($match__1) {
            $r__0 = $match__1[1];
            $red__0 = $call2($Js_of_ocaml_Regexp[11], $r__0, 2);
            $green__0 = $call2($Js_of_ocaml_Regexp[11], $r__0, 3);
            $blue__0 = $call2($Js_of_ocaml_Regexp[11], $r__0, 4);
            $alpha__0 = $call2($Js_of_ocaml_Regexp[11], $r__0, 5);
            $match__2 = $call2($Js_of_ocaml_Regexp[11], $r__0, 1);
            if ($match__2) {
              $cj_ = $match__2[1];
              if (! $caml_string_notequal($cj_, $cst_rgb__0)) {
                if ($alpha__0) {return $fail(0);}
                $cn_ = $i_of_s_o($blue__0);
                $co_ = $i_of_s_o($green__0);
                return Vector{2, Vector{0, $i_of_s_o($red__0), $co_, $cn_}};
              }
              if (! $caml_string_notequal($cj_, $cst_rgba__0)) {
                if ($alpha__0) {
                  $a__0 = $alpha__0[1];
                  $ck_ = $f_of_s($a__0);
                  $cl_ = $i_of_s_o($blue__0);
                  $cm_ = $i_of_s_o($green__0);
                  return Vector{
                    4,
                    Vector{0, $i_of_s_o($red__0), $cm_, $cl_, $ck_}
                  };
                }
                return $fail(0);
              }
            }
            return $fail(0);
          }
          $match__3 = $call3($Js_of_ocaml_Regexp[7], $re_hsl, $s, 0);
          if ($match__3) {
            $r__1 = $match__3[1];
            $red__1 = $call2($Js_of_ocaml_Regexp[11], $r__1, 2);
            $green__1 = $call2($Js_of_ocaml_Regexp[11], $r__1, 3);
            $blue__1 = $call2($Js_of_ocaml_Regexp[11], $r__1, 4);
            $alpha__1 = $call2($Js_of_ocaml_Regexp[11], $r__1, 5);
            $match__4 = $call2($Js_of_ocaml_Regexp[11], $r__1, 1);
            if ($match__4) {
              $cp_ = $match__4[1];
              if (! $caml_string_notequal($cp_, $cst_hsl)) {
                if ($alpha__1) {return $fail(0);}
                $ct_ = $i_of_s_o($blue__1);
                $cu_ = $i_of_s_o($green__1);
                return Vector{5, Vector{0, $i_of_s_o($red__1), $cu_, $ct_}};
              }
              if (! $caml_string_notequal($cp_, $cst_hsla)) {
                if ($alpha__1) {
                  $a__1 = $alpha__1[1];
                  $cq_ = $f_of_s($a__1);
                  $cr_ = $i_of_s_o($blue__1);
                  $cs_ = $i_of_s_o($green__1);
                  return Vector{
                    6,
                    Vector{0, $i_of_s_o($red__1), $cs_, $cr_, $cq_}
                  };
                }
                return $fail(0);
              }
            }
            return $fail(0);
          }
          return $fail(0);
        }
        throw $caml_wrap_thrown_exception_reraise($cw_) as \Throwable;
      }
    };
    $string_of_t__0 = (dynamic $param) : dynamic ==> {
      if ($is_int($param)) {return $cst_0;}
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $f = $param[1];
            return $call3($Stdlib_printf[4], $bO_, $f, $cst_em);
          // FALLTHROUGH
          case 1:
            $f__0 = $param[1];
            return $call3($Stdlib_printf[4], $bP_, $f__0, $cst_ex);
          // FALLTHROUGH
          case 2:
            $f__1 = $param[1];
            return $call3($Stdlib_printf[4], $bQ_, $f__1, $cst_px);
          // FALLTHROUGH
          case 3:
            $f__2 = $param[1];
            return $call3($Stdlib_printf[4], $bR_, $f__2, $cst_gd);
          // FALLTHROUGH
          case 4:
            $f__3 = $param[1];
            return $call3($Stdlib_printf[4], $bS_, $f__3, $cst_rem);
          // FALLTHROUGH
          case 5:
            $f__4 = $param[1];
            return $call3($Stdlib_printf[4], $bT_, $f__4, $cst_vw);
          // FALLTHROUGH
          case 6:
            $f__5 = $param[1];
            return $call3($Stdlib_printf[4], $bU_, $f__5, $cst_vh);
          // FALLTHROUGH
          case 7:
            $f__6 = $param[1];
            return $call3($Stdlib_printf[4], $bV_, $f__6, $cst_vm);
          // FALLTHROUGH
          case 8:
            $f__7 = $param[1];
            return $call3($Stdlib_printf[4], $bW_, $f__7, $cst_ch);
          // FALLTHROUGH
          case 9:
            $f__8 = $param[1];
            return $call3($Stdlib_printf[4], $bX_, $f__8, $cst_mm);
          // FALLTHROUGH
          case 10:
            $f__9 = $param[1];
            return $call3($Stdlib_printf[4], $bY_, $f__9, $cst_cm);
          // FALLTHROUGH
          case 11:
            $f__10 = $param[1];
            return $call3($Stdlib_printf[4], $bZ_, $f__10, $cst_in);
          // FALLTHROUGH
          case 12:
            $f__11 = $param[1];
            return $call3($Stdlib_printf[4], $b0_, $f__11, $cst_pt);
          // FALLTHROUGH
          default:
            $f__12 = $param[1];
            return $call3($Stdlib_printf[4], $b1_, $f__12, $cst_pc);
          }
      }
    };
    $js__0 = (dynamic $t) : dynamic ==> {
      return $string_of_t__0($t)->toString();
    };
    $ml__0 = (dynamic $t) : dynamic ==> {
      $s = $caml_js_to_string($t);
      if ($runtime["caml_string_equal"]($s, $cst_0__0)) {return 0;}
      $fail = (dynamic $param) : dynamic ==> {
        $cc_ = $call2($Stdlib[28], $s, $cst_is_not_a_valid_length);
        throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $cc_}) as \Throwable;
      };
      $re = $call1($Js_of_ocaml_Regexp[1], $cst_d_d_s_S);
      $match = $call3($Js_of_ocaml_Regexp[7], $re, $s, 0);
      if ($match) {
        $r = $match[1];
        $match__0 = $call2($Js_of_ocaml_Regexp[11], $r, 1);
        if ($match__0) {
          $f = $match__0[1];
          try {$ca_ = $caml_float_of_string($f);}
          catch(\Throwable $exn) {
            $exn = $runtime["caml_wrap_exception"]($exn);
            if ($exn[1] === $Stdlib[6]) {
              $s__0 = $exn[2];
              $b__ = $call2($Stdlib[28], $cst_length_conversion_error, $s__0);
              throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $b__}) as \Throwable;
            }
            throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
          }
          $f__0 = $ca_;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $cb_ = $match__1[1];
          $switch__0 = $caml_string_compare($cb_, $cst_pc__0);
          if (0 <= $switch__0) {
            if (! (0 < $switch__0)) {return Vector{13, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_pt__0)) {return Vector{12, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_px__0)) {return Vector{2, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_rem__0)) {return Vector{4, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_vh__0)) {return Vector{6, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_vm__0)) {return Vector{7, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_vw__0)) {return Vector{5, $f__0};}
          }
          else {
            if (! $caml_string_notequal($cb_, $cst_ch__0)) {return Vector{8, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_cm__0)) {return Vector{10, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_em__0)) {return Vector{0, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_ex__0)) {return Vector{1, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_gd__0)) {return Vector{3, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_in__0)) {return Vector{11, $f__0};}
            if (! $caml_string_notequal($cb_, $cst_mm__0)) {return Vector{9, $f__0};}
          }
          return $fail(0);
        }
        return $fail(0);
      }
      return $fail(0);
    };
    $Length = Vector{0, $string_of_t__0, $js__0, $ml__0} as dynamic;
    $string_of_t__1 = (dynamic $param) : dynamic ==> {
      switch($param[0]) {
        // FALLTHROUGH
        case 0:
          $f = $param[1];
          return $call3($Stdlib_printf[4], $b2_, $f, $cst_deg);
        // FALLTHROUGH
        case 1:
          $f__0 = $param[1];
          return $call3($Stdlib_printf[4], $b3_, $f__0, $cst_grad);
        // FALLTHROUGH
        case 2:
          $f__1 = $param[1];
          return $call3($Stdlib_printf[4], $b4_, $f__1, $cst_rad);
        // FALLTHROUGH
        default:
          $f__2 = $param[1];
          return $call3($Stdlib_printf[4], $b5_, $f__2, $cst_turns);
        }
    };
    $js__1 = (dynamic $t) : dynamic ==> {
      return $string_of_t__1($t)->toString();
    };
    $ml__1 = (dynamic $j) : dynamic ==> {
      $s = $caml_js_to_string($j);
      $re = $call1($Js_of_ocaml_Regexp[1], $cst_d_d_deg_grad_rad_turns);
      $fail = (dynamic $param) : dynamic ==> {
        $b9_ = $call2($Stdlib[28], $s, $cst_is_not_a_valid_length__0);
        throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $b9_}) as \Throwable;
      };
      $match = $call3($Js_of_ocaml_Regexp[7], $re, $s, 0);
      if ($match) {
        $r = $match[1];
        $match__0 = $call2($Js_of_ocaml_Regexp[11], $r, 1);
        if ($match__0) {
          $f = $match__0[1];
          try {$b7_ = $caml_float_of_string($f);}
          catch(\Throwable $exn) {
            $exn = $runtime["caml_wrap_exception"]($exn);
            if ($exn[1] === $Stdlib[6]) {
              $s__0 = $exn[2];
              $b6_ = $call2(
                $Stdlib[28],
                $cst_length_conversion_error__0,
                $s__0
              );
              throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $b6_}) as \Throwable;
            }
            throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
          }
          $f__0 = $b7_;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $b8_ = $match__1[1];
          if (! $caml_string_notequal($b8_, $cst_deg__0)) {return Vector{0, $f__0};}
          if (! $caml_string_notequal($b8_, $cst_grad__0)) {return Vector{1, $f__0};}
          if (! $caml_string_notequal($b8_, $cst_rad__0)) {return Vector{2, $f__0};}
          if (! $caml_string_notequal($b8_, $cst_turns__0)) {return Vector{3, $f__0};}
        }
        return $fail(0);
      }
      return $fail(0);
    };
    $Angle = Vector{0, $string_of_t__1, $js__1, $ml__1} as dynamic;
    $Js_of_ocaml_CSS = Vector{
      0,
      Vector{
        0,
        $string_of_name,
        $rgb_of_name,
        $hex_of_rgb,
        $rgb,
        $hsl,
        $string_of_t,
        $js,
        $ml,
        $js_t_of_js_string
      },
      $Length,
      $Angle
    } as dynamic;
    
    return($Js_of_ocaml_CSS);

  }

}
/* Hashing disabled */
