<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__CSS.php
 */

namespace Rehack;

final class Js_of_ocaml__CSS {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Js_of_ocaml__Regexp = Js_of_ocaml__Regexp::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    Js_of_ocaml__CSS::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__CSS;
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
    $call5 = $runtime["caml_call5"];
    $caml_float_of_string = $runtime["caml_float_of_string"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $caml_list_of_js_array = $runtime["caml_list_of_js_array"];
    $string = $runtime["caml_new_string"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $is_int = $runtime["is_int"];
    $global_data = $runtime["caml_get_global_data"]();
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
    $partial = Vector{8, 0, 0, 0, Vector{12, 41, 0}};
    $partial__0 = Vector{12, 41, 0};
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
    $Pervasives = $global_data["Pervasives"];
    $Invalid_argument = $global_data["Invalid_argument"];
    $Js_of_ocaml_Regexp = $global_data["Js_of_ocaml__Regexp"];
    $Printf = $global_data["Printf"];
    $Failure = $global_data["Failure"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $List = $global_data["List_"];
    $b2 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $b3 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $b4 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $b5 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bO = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bP = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bQ = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bR = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bS = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bT = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bU = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bV = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bW = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bX = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bY = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bZ = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $b0 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $b1 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $bN = $caml_list_of_js_array(
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
    $bM = Vector{
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
    };
    $bG = Vector{
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
    };
    $bH = Vector{
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
    };
    $bI = Vector{
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
                  Vector{12, 44, Vector{8, 0, 0, 0, Vector{12, 41, 0}}}
                }
              }
            }
          }
        }
      },
      $string("rgba(%d,%d,%d,%f)")
    };
    $bJ = Vector{
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
    };
    $bK = Vector{
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
    };
    $bL = Vector{
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
                      Vector{12, 44, Vector{8, 0, 0, 0, $partial__0}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string("hsla(%d,%d%%,%d%%,%f)")
    };
    $a = Vector{0, 240, 248, 255};
    $b = Vector{0, 250, 235, 215};
    $c = Vector{0, 0, 255, 255};
    $d = Vector{0, 127, 255, 212};
    $e = Vector{0, 240, 255, 255};
    $f = Vector{0, 245, 245, 220};
    $g = Vector{0, 255, 228, 196};
    $h = Vector{0, 0, 0, 0};
    $i = Vector{0, 255, 235, 205};
    $j = Vector{0, 0, 0, 255};
    $k = Vector{0, 138, 43, 226};
    $l = Vector{0, 165, 42, 42};
    $m = Vector{0, 222, 184, 135};
    $n = Vector{0, 95, 158, 160};
    $o = Vector{0, 127, 255, 0};
    $p = Vector{0, 210, 105, 30};
    $q = Vector{0, 255, 127, 80};
    $r = Vector{0, 100, 149, 237};
    $s = Vector{0, 255, 248, 220};
    $t = Vector{0, 220, 20, 60};
    $u = Vector{0, 0, 255, 255};
    $v = Vector{0, 0, 0, 139};
    $w = Vector{0, 0, 139, 139};
    $x = Vector{0, 184, 134, 11};
    $y = Vector{0, 169, 169, 169};
    $z = Vector{0, 0, 100, 0};
    $A = Vector{0, 169, 169, 169};
    $B = Vector{0, 189, 183, 107};
    $C = Vector{0, 139, 0, 139};
    $D = Vector{0, 85, 107, 47};
    $E = Vector{0, 255, 140, 0};
    $F = Vector{0, 153, 50, 204};
    $G = Vector{0, 139, 0, 0};
    $H = Vector{0, 233, 150, 122};
    $I = Vector{0, 143, 188, 143};
    $J = Vector{0, 72, 61, 139};
    $K = Vector{0, 47, 79, 79};
    $L = Vector{0, 47, 79, 79};
    $M = Vector{0, 0, 206, 209};
    $N = Vector{0, 148, 0, 211};
    $O = Vector{0, 255, 20, 147};
    $P = Vector{0, 0, 191, 255};
    $Q = Vector{0, 105, 105, 105};
    $R = Vector{0, 105, 105, 105};
    $S = Vector{0, 30, 144, 255};
    $T = Vector{0, 178, 34, 34};
    $U = Vector{0, 255, 250, 240};
    $V = Vector{0, 34, 139, 34};
    $W = Vector{0, 255, 0, 255};
    $X = Vector{0, 220, 220, 220};
    $Y = Vector{0, 248, 248, 255};
    $Z = Vector{0, 255, 215, 0};
    $aa = Vector{0, 218, 165, 32};
    $ab = Vector{0, 128, 128, 128};
    $ac = Vector{0, 128, 128, 128};
    $ad = Vector{0, 0, 128, 0};
    $ae = Vector{0, 173, 255, 47};
    $af = Vector{0, 240, 255, 240};
    $ag = Vector{0, 255, 105, 180};
    $ah = Vector{0, 205, 92, 92};
    $ai = Vector{0, 75, 0, 130};
    $aj = Vector{0, 255, 255, 240};
    $ak = Vector{0, 240, 230, 140};
    $al = Vector{0, 230, 230, 250};
    $am = Vector{0, 255, 240, 245};
    $an = Vector{0, 124, 252, 0};
    $ao = Vector{0, 255, 250, 205};
    $ap = Vector{0, 173, 216, 230};
    $aq = Vector{0, 240, 128, 128};
    $ar = Vector{0, 224, 255, 255};
    $as = Vector{0, 250, 250, 210};
    $at = Vector{0, 211, 211, 211};
    $au = Vector{0, 144, 238, 144};
    $av = Vector{0, 211, 211, 211};
    $aw = Vector{0, 255, 182, 193};
    $ax = Vector{0, 255, 160, 122};
    $ay = Vector{0, 32, 178, 170};
    $az = Vector{0, 135, 206, 250};
    $aA = Vector{0, 119, 136, 153};
    $aB = Vector{0, 119, 136, 153};
    $aC = Vector{0, 176, 196, 222};
    $aD = Vector{0, 255, 255, 224};
    $aE = Vector{0, 0, 255, 0};
    $aF = Vector{0, 50, 205, 50};
    $aG = Vector{0, 250, 240, 230};
    $aH = Vector{0, 255, 0, 255};
    $aI = Vector{0, 128, 0, 0};
    $aJ = Vector{0, 102, 205, 170};
    $aK = Vector{0, 0, 0, 205};
    $aL = Vector{0, 186, 85, 211};
    $aM = Vector{0, 147, 112, 219};
    $aN = Vector{0, 60, 179, 113};
    $aO = Vector{0, 123, 104, 238};
    $aP = Vector{0, 0, 250, 154};
    $aQ = Vector{0, 72, 209, 204};
    $aR = Vector{0, 199, 21, 133};
    $aS = Vector{0, 25, 25, 112};
    $aT = Vector{0, 245, 255, 250};
    $aU = Vector{0, 255, 228, 225};
    $aV = Vector{0, 255, 228, 181};
    $aW = Vector{0, 255, 222, 173};
    $aX = Vector{0, 0, 0, 128};
    $aY = Vector{0, 253, 245, 230};
    $aZ = Vector{0, 128, 128, 0};
    $a0 = Vector{0, 107, 142, 35};
    $a1 = Vector{0, 255, 165, 0};
    $a2 = Vector{0, 255, 69, 0};
    $a3 = Vector{0, 218, 112, 214};
    $a4 = Vector{0, 238, 232, 170};
    $a5 = Vector{0, 152, 251, 152};
    $a6 = Vector{0, 175, 238, 238};
    $a7 = Vector{0, 219, 112, 147};
    $a8 = Vector{0, 255, 239, 213};
    $a9 = Vector{0, 255, 218, 185};
    $a_ = Vector{0, 205, 133, 63};
    $ba = Vector{0, 255, 192, 203};
    $bb = Vector{0, 221, 160, 221};
    $bc = Vector{0, 176, 224, 230};
    $bd = Vector{0, 128, 0, 128};
    $be = Vector{0, 255, 0, 0};
    $bf = Vector{0, 188, 143, 143};
    $bg = Vector{0, 65, 105, 225};
    $bh = Vector{0, 139, 69, 19};
    $bi = Vector{0, 250, 128, 114};
    $bj = Vector{0, 244, 164, 96};
    $bk = Vector{0, 46, 139, 87};
    $bl = Vector{0, 255, 245, 238};
    $bm = Vector{0, 160, 82, 45};
    $bn = Vector{0, 192, 192, 192};
    $bo = Vector{0, 135, 206, 235};
    $bp = Vector{0, 106, 90, 205};
    $bq = Vector{0, 112, 128, 144};
    $br = Vector{0, 112, 128, 144};
    $bs = Vector{0, 255, 250, 250};
    $bt = Vector{0, 0, 255, 127};
    $bu = Vector{0, 70, 130, 180};
    $bv = Vector{0, 210, 180, 140};
    $bw = Vector{0, 0, 128, 128};
    $bx = Vector{0, 216, 191, 216};
    $by = Vector{0, 255, 99, 71};
    $bz = Vector{0, 64, 224, 208};
    $bA = Vector{0, 238, 130, 238};
    $bB = Vector{0, 245, 222, 179};
    $bC = Vector{0, 255, 255, 255};
    $bD = Vector{0, 245, 245, 245};
    $bE = Vector{0, 255, 255, 0};
    $bF = Vector{0, 154, 205, 50};
    $string_of_name = function(dynamic $param) use ($cst_aliceblue,$cst_antiquewhite,$cst_aqua,$cst_aquamarine,$cst_azure,$cst_beige,$cst_bisque,$cst_black,$cst_blanchedalmond,$cst_blue,$cst_blueviolet,$cst_brown,$cst_burlywood,$cst_cadetblue,$cst_chartreuse,$cst_chocolate,$cst_coral,$cst_cornflowerblue,$cst_cornsilk,$cst_crimson,$cst_cyan,$cst_darkblue,$cst_darkcyan,$cst_darkgoldenrod,$cst_darkgray,$cst_darkgreen,$cst_darkgrey,$cst_darkkhaki,$cst_darkmagenta,$cst_darkolivegreen,$cst_darkorange,$cst_darkorchid,$cst_darkred,$cst_darksalmon,$cst_darkseagreen,$cst_darkslateblue,$cst_darkslategray,$cst_darkslategrey,$cst_darkturquoise,$cst_darkviolet,$cst_deeppink,$cst_deepskyblue,$cst_dimgray,$cst_dimgrey,$cst_dodgerblue,$cst_firebrick,$cst_floralwhite,$cst_forestgreen,$cst_fuchsia,$cst_gainsboro,$cst_ghostwhite,$cst_gold,$cst_goldenrod,$cst_gray,$cst_green,$cst_greenyellow,$cst_grey,$cst_honeydew,$cst_hotpink,$cst_indianred,$cst_indigo,$cst_ivory,$cst_khaki,$cst_lavender,$cst_lavenderblush,$cst_lawngreen,$cst_lemonchiffon,$cst_lightblue,$cst_lightcoral,$cst_lightcyan,$cst_lightgoldenrodyellow,$cst_lightgray,$cst_lightgreen,$cst_lightgrey,$cst_lightpink,$cst_lightsalmon,$cst_lightseagreen,$cst_lightskyblue,$cst_lightslategray,$cst_lightslategrey,$cst_lightsteelblue,$cst_lightyellow,$cst_lime,$cst_limegreen,$cst_linen,$cst_magenta,$cst_maroon,$cst_mediumaquamarine,$cst_mediumblue,$cst_mediumorchid,$cst_mediumpurple,$cst_mediumseagreen,$cst_mediumslateblue,$cst_mediumspringgreen,$cst_mediumturquoise,$cst_mediumvioletred,$cst_midnightblue,$cst_mintcream,$cst_mistyrose,$cst_moccasin,$cst_navajowhite,$cst_navy,$cst_oldlace,$cst_olive,$cst_olivedrab,$cst_orange,$cst_orangered,$cst_orchid,$cst_palegoldenrod,$cst_palegreen,$cst_paleturquoise,$cst_palevioletred,$cst_papayawhip,$cst_peachpuff,$cst_peru,$cst_pink,$cst_plum,$cst_powderblue,$cst_purple,$cst_red,$cst_rosybrown,$cst_royalblue,$cst_saddlebrown,$cst_salmon,$cst_sandybrown,$cst_seagreen,$cst_seashell,$cst_sienna,$cst_silver,$cst_skyblue,$cst_slateblue,$cst_slategray,$cst_slategrey,$cst_snow,$cst_springgreen,$cst_steelblue,$cst_tan,$cst_teal,$cst_thistle,$cst_tomato,$cst_turquoise,$cst_violet,$cst_wheat,$cst_white,$cst_whitesmoke,$cst_yellow,$cst_yellowgreen) {
      $c3 = $param;
      if (74 <= $c3) {
        if (111 <= $c3) {
          switch($c3) {
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
        switch($c3) {
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
      if (37 <= $c3) {
        switch($c3) {
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
      switch($c3) {
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
    $name_of_string = function(dynamic $s) use ($Invalid_argument,$Pervasives,$call2,$caml_string_compare,$caml_string_notequal,$cst_aliceblue__0,$cst_antiquewhite__0,$cst_aqua__0,$cst_aquamarine__0,$cst_azure__0,$cst_beige__0,$cst_bisque__0,$cst_black__0,$cst_blanchedalmond__0,$cst_blue__0,$cst_blueviolet__0,$cst_brown__0,$cst_burlywood__0,$cst_cadetblue__0,$cst_chartreuse__0,$cst_chocolate__0,$cst_coral__0,$cst_cornflowerblue__0,$cst_cornsilk__0,$cst_crimson__0,$cst_cyan__0,$cst_darkblue__0,$cst_darkcyan__0,$cst_darkgoldenrod__0,$cst_darkgray__0,$cst_darkgreen__0,$cst_darkgrey__0,$cst_darkkhaki__0,$cst_darkmagenta__0,$cst_darkolivegreen__0,$cst_darkorange__0,$cst_darkorchid__0,$cst_darkred__0,$cst_darksalmon__0,$cst_darkseagreen__0,$cst_darkslateblue__0,$cst_darkslategray__0,$cst_darkslategrey__0,$cst_darkturquoise__0,$cst_darkviolet__0,$cst_deeppink__0,$cst_deepskyblue__0,$cst_dimgray__0,$cst_dimgrey__0,$cst_dodgerblue__0,$cst_firebrick__0,$cst_floralwhite__0,$cst_forestgreen__0,$cst_fuchsia__0,$cst_gainsboro__0,$cst_ghostwhite__0,$cst_gold__0,$cst_goldenrod__0,$cst_gray__0,$cst_green__0,$cst_greenyellow__0,$cst_grey__0,$cst_honeydew__0,$cst_hotpink__0,$cst_indianred__0,$cst_indigo__0,$cst_is_not_a_valid_color_name,$cst_ivory__0,$cst_khaki__0,$cst_lavender__0,$cst_lavenderblush__0,$cst_lawngreen__0,$cst_lemonchiffon__0,$cst_lightblue__0,$cst_lightcoral__0,$cst_lightcyan__0,$cst_lightgoldenrodyellow__0,$cst_lightgray__0,$cst_lightgreen__0,$cst_lightgrey__0,$cst_lightpink__0,$cst_lightsalmon__0,$cst_lightseagreen__0,$cst_lightskyblue__0,$cst_lightslategray__0,$cst_lightslategrey__0,$cst_lightsteelblue__0,$cst_lightyellow__0,$cst_lime__0,$cst_limegreen__0,$cst_linen__0,$cst_magenta__0,$cst_maroon__0,$cst_mediumaquamarine__0,$cst_mediumblue__0,$cst_mediumorchid__0,$cst_mediumpurple__0,$cst_mediumseagreen__0,$cst_mediumslateblue__0,$cst_mediumspringgreen__0,$cst_mediumturquoise__0,$cst_mediumvioletred__0,$cst_midnightblue__0,$cst_mintcream__0,$cst_mistyrose__0,$cst_moccasin__0,$cst_navajowhite__0,$cst_navy__0,$cst_oldlace__0,$cst_olive__0,$cst_olivedrab__0,$cst_orange__0,$cst_orangered__0,$cst_orchid__0,$cst_palegoldenrod__0,$cst_palegreen__0,$cst_paleturquoise__0,$cst_palevioletred__0,$cst_papayawhip__0,$cst_peachpuff__0,$cst_peru__0,$cst_pink__0,$cst_plum__0,$cst_powderblue__0,$cst_purple__0,$cst_red__0,$cst_rosybrown__0,$cst_royalblue__0,$cst_saddlebrown__0,$cst_salmon__0,$cst_sandybrown__0,$cst_seagreen__0,$cst_seashell__0,$cst_sienna__0,$cst_silver__0,$cst_skyblue__0,$cst_slateblue__0,$cst_slategray__0,$cst_slategrey__0,$cst_snow__0,$cst_springgreen__0,$cst_steelblue__0,$cst_tan__0,$cst_teal__0,$cst_thistle__0,$cst_tomato__0,$cst_turquoise__0,$cst_violet__0,$cst_wheat__0,$cst_white__0,$cst_whitesmoke__0,$cst_yellow__0,$cst_yellowgreen__0,$runtime) {
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
      throw $runtime["caml_wrap_thrown_exception"](
              Vector{
                0,
                $Invalid_argument,
                $call2($Pervasives[16], $s, $cst_is_not_a_valid_color_name)
              }
            ) as \Throwable;
    };
    $rgb_of_name = function(dynamic $param) use ($A,$B,$C,$D,$E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$Q,$R,$S,$T,$U,$V,$W,$X,$Y,$Z,$a,$a0,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$aA,$aB,$aC,$aD,$aE,$aF,$aG,$aH,$aI,$aJ,$aK,$aL,$aM,$aN,$aO,$aP,$aQ,$aR,$aS,$aT,$aU,$aV,$aW,$aX,$aY,$aZ,$a_,$aa,$ab,$ac,$ad,$ae,$af,$ag,$ah,$ai,$aj,$ak,$al,$am,$an,$ao,$ap,$aq,$ar,$as,$at,$au,$av,$aw,$ax,$ay,$az,$b,$bA,$bB,$bC,$bD,$bE,$bF,$ba,$bb,$bc,$bd,$be,$bf,$bg,$bh,$bi,$bj,$bk,$bl,$bm,$bn,$bo,$bp,$bq,$br,$bs,$bt,$bu,$bv,$bw,$bx,$by,$bz,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z) {
      $c2 = $param;
      if (74 <= $c2) {
        if (111 <= $c2) {
          switch($c2) {
            // FALLTHROUGH
            case 111:
              return $a7;
            // FALLTHROUGH
            case 112:
              return $a8;
            // FALLTHROUGH
            case 113:
              return $a9;
            // FALLTHROUGH
            case 114:
              return $a_;
            // FALLTHROUGH
            case 115:
              return $ba;
            // FALLTHROUGH
            case 116:
              return $bb;
            // FALLTHROUGH
            case 117:
              return $bc;
            // FALLTHROUGH
            case 118:
              return $bd;
            // FALLTHROUGH
            case 119:
              return $be;
            // FALLTHROUGH
            case 120:
              return $bf;
            // FALLTHROUGH
            case 121:
              return $bg;
            // FALLTHROUGH
            case 122:
              return $bh;
            // FALLTHROUGH
            case 123:
              return $bi;
            // FALLTHROUGH
            case 124:
              return $bj;
            // FALLTHROUGH
            case 125:
              return $bk;
            // FALLTHROUGH
            case 126:
              return $bl;
            // FALLTHROUGH
            case 127:
              return $bm;
            // FALLTHROUGH
            case 128:
              return $bn;
            // FALLTHROUGH
            case 129:
              return $bo;
            // FALLTHROUGH
            case 130:
              return $bp;
            // FALLTHROUGH
            case 131:
              return $bq;
            // FALLTHROUGH
            case 132:
              return $br;
            // FALLTHROUGH
            case 133:
              return $bs;
            // FALLTHROUGH
            case 134:
              return $bt;
            // FALLTHROUGH
            case 135:
              return $bu;
            // FALLTHROUGH
            case 136:
              return $bv;
            // FALLTHROUGH
            case 137:
              return $bw;
            // FALLTHROUGH
            case 138:
              return $bx;
            // FALLTHROUGH
            case 139:
              return $by;
            // FALLTHROUGH
            case 140:
              return $bz;
            // FALLTHROUGH
            case 141:
              return $bA;
            // FALLTHROUGH
            case 142:
              return $bB;
            // FALLTHROUGH
            case 143:
              return $bC;
            // FALLTHROUGH
            case 144:
              return $bD;
            // FALLTHROUGH
            case 145:
              return $bE;
            // FALLTHROUGH
            default:
              return $bF;
            }
        }
        switch($c2) {
          // FALLTHROUGH
          case 74:
            return $aw;
          // FALLTHROUGH
          case 75:
            return $ax;
          // FALLTHROUGH
          case 76:
            return $ay;
          // FALLTHROUGH
          case 77:
            return $az;
          // FALLTHROUGH
          case 78:
            return $aA;
          // FALLTHROUGH
          case 79:
            return $aB;
          // FALLTHROUGH
          case 80:
            return $aC;
          // FALLTHROUGH
          case 81:
            return $aD;
          // FALLTHROUGH
          case 82:
            return $aE;
          // FALLTHROUGH
          case 83:
            return $aF;
          // FALLTHROUGH
          case 84:
            return $aG;
          // FALLTHROUGH
          case 85:
            return $aH;
          // FALLTHROUGH
          case 86:
            return $aI;
          // FALLTHROUGH
          case 87:
            return $aJ;
          // FALLTHROUGH
          case 88:
            return $aK;
          // FALLTHROUGH
          case 89:
            return $aL;
          // FALLTHROUGH
          case 90:
            return $aM;
          // FALLTHROUGH
          case 91:
            return $aN;
          // FALLTHROUGH
          case 92:
            return $aO;
          // FALLTHROUGH
          case 93:
            return $aP;
          // FALLTHROUGH
          case 94:
            return $aQ;
          // FALLTHROUGH
          case 95:
            return $aR;
          // FALLTHROUGH
          case 96:
            return $aS;
          // FALLTHROUGH
          case 97:
            return $aT;
          // FALLTHROUGH
          case 98:
            return $aU;
          // FALLTHROUGH
          case 99:
            return $aV;
          // FALLTHROUGH
          case 100:
            return $aW;
          // FALLTHROUGH
          case 101:
            return $aX;
          // FALLTHROUGH
          case 102:
            return $aY;
          // FALLTHROUGH
          case 103:
            return $aZ;
          // FALLTHROUGH
          case 104:
            return $a0;
          // FALLTHROUGH
          case 105:
            return $a1;
          // FALLTHROUGH
          case 106:
            return $a2;
          // FALLTHROUGH
          case 107:
            return $a3;
          // FALLTHROUGH
          case 108:
            return $a4;
          // FALLTHROUGH
          case 109:
            return $a5;
          // FALLTHROUGH
          default:
            return $a6;
          }
      }
      if (37 <= $c2) {
        switch($c2) {
          // FALLTHROUGH
          case 37:
            return $L;
          // FALLTHROUGH
          case 38:
            return $M;
          // FALLTHROUGH
          case 39:
            return $N;
          // FALLTHROUGH
          case 40:
            return $O;
          // FALLTHROUGH
          case 41:
            return $P;
          // FALLTHROUGH
          case 42:
            return $Q;
          // FALLTHROUGH
          case 43:
            return $R;
          // FALLTHROUGH
          case 44:
            return $S;
          // FALLTHROUGH
          case 45:
            return $T;
          // FALLTHROUGH
          case 46:
            return $U;
          // FALLTHROUGH
          case 47:
            return $V;
          // FALLTHROUGH
          case 48:
            return $W;
          // FALLTHROUGH
          case 49:
            return $X;
          // FALLTHROUGH
          case 50:
            return $Y;
          // FALLTHROUGH
          case 51:
            return $Z;
          // FALLTHROUGH
          case 52:
            return $aa;
          // FALLTHROUGH
          case 53:
            return $ab;
          // FALLTHROUGH
          case 54:
            return $ac;
          // FALLTHROUGH
          case 55:
            return $ad;
          // FALLTHROUGH
          case 56:
            return $ae;
          // FALLTHROUGH
          case 57:
            return $af;
          // FALLTHROUGH
          case 58:
            return $ag;
          // FALLTHROUGH
          case 59:
            return $ah;
          // FALLTHROUGH
          case 60:
            return $ai;
          // FALLTHROUGH
          case 61:
            return $aj;
          // FALLTHROUGH
          case 62:
            return $ak;
          // FALLTHROUGH
          case 63:
            return $al;
          // FALLTHROUGH
          case 64:
            return $am;
          // FALLTHROUGH
          case 65:
            return $an;
          // FALLTHROUGH
          case 66:
            return $ao;
          // FALLTHROUGH
          case 67:
            return $ap;
          // FALLTHROUGH
          case 68:
            return $aq;
          // FALLTHROUGH
          case 69:
            return $ar;
          // FALLTHROUGH
          case 70:
            return $as;
          // FALLTHROUGH
          case 71:
            return $at;
          // FALLTHROUGH
          case 72:
            return $au;
          // FALLTHROUGH
          default:
            return $av;
          }
      }
      switch($c2) {
        // FALLTHROUGH
        case 0:
          return $a;
        // FALLTHROUGH
        case 1:
          return $b;
        // FALLTHROUGH
        case 2:
          return $c;
        // FALLTHROUGH
        case 3:
          return $d;
        // FALLTHROUGH
        case 4:
          return $e;
        // FALLTHROUGH
        case 5:
          return $f;
        // FALLTHROUGH
        case 6:
          return $g;
        // FALLTHROUGH
        case 7:
          return $h;
        // FALLTHROUGH
        case 8:
          return $i;
        // FALLTHROUGH
        case 9:
          return $j;
        // FALLTHROUGH
        case 10:
          return $k;
        // FALLTHROUGH
        case 11:
          return $l;
        // FALLTHROUGH
        case 12:
          return $m;
        // FALLTHROUGH
        case 13:
          return $n;
        // FALLTHROUGH
        case 14:
          return $o;
        // FALLTHROUGH
        case 15:
          return $p;
        // FALLTHROUGH
        case 16:
          return $q;
        // FALLTHROUGH
        case 17:
          return $r;
        // FALLTHROUGH
        case 18:
          return $s;
        // FALLTHROUGH
        case 19:
          return $t;
        // FALLTHROUGH
        case 20:
          return $u;
        // FALLTHROUGH
        case 21:
          return $v;
        // FALLTHROUGH
        case 22:
          return $w;
        // FALLTHROUGH
        case 23:
          return $x;
        // FALLTHROUGH
        case 24:
          return $y;
        // FALLTHROUGH
        case 25:
          return $z;
        // FALLTHROUGH
        case 26:
          return $A;
        // FALLTHROUGH
        case 27:
          return $B;
        // FALLTHROUGH
        case 28:
          return $C;
        // FALLTHROUGH
        case 29:
          return $D;
        // FALLTHROUGH
        case 30:
          return $E;
        // FALLTHROUGH
        case 31:
          return $F;
        // FALLTHROUGH
        case 32:
          return $G;
        // FALLTHROUGH
        case 33:
          return $H;
        // FALLTHROUGH
        case 34:
          return $I;
        // FALLTHROUGH
        case 35:
          return $J;
        // FALLTHROUGH
        default:
          return $K;
        }
    };
    $rgb = function(dynamic $a, dynamic $r, dynamic $g, dynamic $b) {
      if ($a) {$a__0 = $a[1];return Vector{3, Vector{0, $r, $g, $b, $a__0}};}
      return Vector{1, Vector{0, $r, $g, $b}};
    };
    $hsl = function(dynamic $a, dynamic $h, dynamic $s, dynamic $l) {
      if ($a) {$a__0 = $a[1];return Vector{6, Vector{0, $h, $s, $l, $a__0}};}
      return Vector{5, Vector{0, $h, $s, $l}};
    };
    $string_of_t = function(dynamic $param) use ($Printf,$bG,$bH,$bI,$bJ,$bK,$bL,$call4,$call5,$string_of_name) {
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
          return $call4($Printf[4], $bG, $r, $g, $b);
        // FALLTHROUGH
        case 2:
          $match__0 = $param[1];
          $b__0 = $match__0[3];
          $g__0 = $match__0[2];
          $r__0 = $match__0[1];
          return $call4($Printf[4], $bH, $r__0, $g__0, $b__0);
        // FALLTHROUGH
        case 3:
          $match__1 = $param[1];
          $a = $match__1[4];
          $b__1 = $match__1[3];
          $g__1 = $match__1[2];
          $r__1 = $match__1[1];
          return $call5($Printf[4], $bI, $r__1, $g__1, $b__1, $a);
        // FALLTHROUGH
        case 4:
          $match__2 = $param[1];
          $a__0 = $match__2[4];
          $b__2 = $match__2[3];
          $g__2 = $match__2[2];
          $r__2 = $match__2[1];
          return $call5($Printf[4], $bJ, $r__2, $g__2, $b__2, $a__0);
        // FALLTHROUGH
        case 5:
          $match__3 = $param[1];
          $l = $match__3[3];
          $s = $match__3[2];
          $h = $match__3[1];
          return $call4($Printf[4], $bK, $h, $s, $l);
        // FALLTHROUGH
        default:
          $match__4 = $param[1];
          $a__1 = $match__4[4];
          $l__0 = $match__4[3];
          $s__0 = $match__4[2];
          $h__0 = $match__4[1];
          return $call5($Printf[4], $bL, $h__0, $s__0, $l__0, $a__1);
        }
    };
    $hex_of_rgb = function(dynamic $param) use ($Invalid_argument,$Pervasives,$Printf,$bM,$call1,$call2,$call4,$cst_is_out_of_valid_range,$runtime) {
      $blue = $param[3];
      $green = $param[2];
      $red = $param[1];
      $in_range = function(dynamic $i) use ($Invalid_argument,$Pervasives,$call1,$call2,$cst_is_out_of_valid_range,$runtime) {
        $cZ = $i < 0 ? 1 : (0);
        $c0 = $cZ ? $cZ : (255 < $i ? 1 : (0));
        if ($c0) {
          $c1 = $call1($Pervasives[21], $i);
          throw $runtime["caml_wrap_thrown_exception"](
                  Vector{
                    0,
                    $Invalid_argument,
                    $call2($Pervasives[16], $c1, $cst_is_out_of_valid_range)
                  }
                ) as \Throwable;
        }
        return $c0;
      };
      $in_range($red);
      $in_range($green);
      $in_range($blue);
      return $call4($Printf[4], $bM, $red, $green, $blue);
    };
    $js_t_of_js_string = function(dynamic $s) use ($Invalid_argument,$Js_of_ocaml_Js,$List,$Pervasives,$bN,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$caml_jsbytes_of_string,$cst_hsl_s_d_s_d_s_d,$cst_hsla_s_d_s_d_s_d_d_d,$cst_is_not_a_valid_color,$cst_rgb_s_d_s_d_s_d,$cst_rgb_s_d_s_d_s_d__0,$cst_rgba_s_d_s_d_s_d_d_d,$cst_rgba_s_d_s_d_s_d_d_d__0,$runtime) {
      $cB = 0;
      $cC = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d);
      $cD = $Js_of_ocaml_Js[10];
      $rgb_re = (function(dynamic $t23, dynamic $t22, dynamic $param) {return new $t23($t22);
       })($cD, $cC, $cB);
      $cE = 0;
      $cF = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d__0);
      $cG = $Js_of_ocaml_Js[10];
      $rgb_pct_re = (function(dynamic $t21, dynamic $t20, dynamic $param) {return new $t21($t20);
       })($cG, $cF, $cE);
      $cH = 0;
      $cI = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d);
      $cJ = $Js_of_ocaml_Js[10];
      $rgba_re = (function(dynamic $t19, dynamic $t18, dynamic $param) {return new $t19($t18);
       })($cJ, $cI, $cH);
      $cK = 0;
      $cL = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d__0);
      $cM = $Js_of_ocaml_Js[10];
      $rgba_pct_re = (function(dynamic $t17, dynamic $t16, dynamic $param) {return new $t17($t16);
       })($cM, $cL, $cK);
      $cN = 0;
      $cO = $caml_jsbytes_of_string($cst_hsl_s_d_s_d_s_d);
      $cP = $Js_of_ocaml_Js[10];
      $hsl_re = (function(dynamic $t15, dynamic $t14, dynamic $param) {return new $t15($t14);
       })($cP, $cO, $cN);
      $cQ = 0;
      $cR = $caml_jsbytes_of_string($cst_hsla_s_d_s_d_s_d_d_d);
      $cS = $Js_of_ocaml_Js[10];
      $hsla_re = (function(dynamic $t13, dynamic $t12, dynamic $param) {return new $t13($t12);
       })($cS, $cR, $cQ);
      $cT = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -856045486, 282), $x);
      };
      if (
        !
        (int)
        (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->test($t0);
         })($rgb_re, $s, $cT)
      ) {
        $cU = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -856045486, 283), $x);
        };
        if (
          !
          (int)
          (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->test($t2);
           })($rgba_re, $s, $cU)
        ) {
          $cV = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -856045486, 284), $x);
          };
          if (
            !
            (int)
            (function(dynamic $t5, dynamic $t4, dynamic $param) {return $t5->test($t4);
             })($rgb_pct_re, $s, $cV)
          ) {
            $cW = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -856045486, 285), $x);
            };
            if (
              !
              (int)
              (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->test($t6);
               })($rgba_pct_re, $s, $cW)
            ) {
              $cX = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -856045486, 286), $x
                );
              };
              if (
                !
                (int)
                (function(dynamic $t9, dynamic $t8, dynamic $param) {return $t9->test($t8);
                 })($hsl_re, $s, $cX)
              ) {
                $cY = function(dynamic $x) use ($call1,$caml_get_public_method) {
                  return $call1(
                    $caml_get_public_method($x, -856045486, 287),
                    $x
                  );
                };
                if (
                  !
                  (int)
                  (function(dynamic $t11, dynamic $t10, dynamic $param) {return $t11->test($t10);
                   })($hsla_re, $s, $cY)
                ) {
                  if ($call2($List[31], $caml_js_to_string($s), $bN)) {return $s;}
                  throw $runtime["caml_wrap_thrown_exception"](
                          Vector{
                            0,
                            $Invalid_argument,
                            $call2(
                              $Pervasives[16],
                              $caml_js_to_string($s),
                              $cst_is_not_a_valid_color
                            )
                          }
                        ) as \Throwable;
                }
              }
            }
          }
        }
      }
      return $s;
    };
    $name = function(dynamic $cn) use ($string_of_name) {
      return $string_of_name($cn)->toString();
    };
    $js = function(dynamic $c) use ($name,$string_of_t) {
      if (0 === $c[0]) {$n = $c[1];return $name($n);}
      return $string_of_t($c)->toString();
    };
    $ml = function(dynamic $c) use ($Failure,$Invalid_argument,$Js_of_ocaml_Regexp,$Pervasives,$call1,$call2,$call3,$caml_float_of_string,$caml_js_to_string,$caml_string_notequal,$caml_wrap_exception,$cst,$cst__0,$cst_color_conversion_error,$cst_color_conversion_error__0,$cst_hsl,$cst_hsla,$cst_hsla_d_d_d_d_d,$cst_is_not_a_valid_color__0,$cst_rgb,$cst_rgb__0,$cst_rgba,$cst_rgba__0,$cst_rgba_d_d_d_d_d,$cst_rgba_d_d_d_d_d__0,$name_of_string,$runtime) {
      $s = $caml_js_to_string($c);
      try {$cr = Vector{0, $name_of_string($s)};return $cr;}
      catch(\Throwable $cs) {
        $cs = $caml_wrap_exception($cs);
        if ($cs[1] === $Invalid_argument) {
          $fail = function(dynamic $param) use ($Invalid_argument,$Pervasives,$call2,$cst_is_not_a_valid_color__0,$runtime,$s) {
            throw $runtime["caml_wrap_thrown_exception"](
                    Vector{
                      0,
                      $Invalid_argument,
                      $call2($Pervasives[16], $s, $cst_is_not_a_valid_color__0)
                    }
                  ) as \Throwable;
          };
          $re_rgb = $call1($Js_of_ocaml_Regexp[1], $cst_rgba_d_d_d_d_d);
          $re_rgb_pct = $call1($Js_of_ocaml_Regexp[1], $cst_rgba_d_d_d_d_d__0);
          $re_hsl = $call1($Js_of_ocaml_Regexp[1], $cst_hsla_d_d_d_d_d);
          $i_of_s_o = function(dynamic $param) use ($Failure,$Invalid_argument,$Pervasives,$call2,$caml_wrap_exception,$cst,$cst_color_conversion_error,$fail,$runtime) {
            if ($param) {
              $i = $param[1];
              try {$cz = $runtime["caml_int_of_string"]($i);return $cz;}
              catch(\Throwable $cA) {
                $cA = $caml_wrap_exception($cA);
                if ($cA[1] === $Invalid_argument) {$s = $cA[2];}
                else {
                  if ($cA[1] !== $Failure) {
                    throw $runtime["caml_wrap_thrown_exception_reraise"]($cA) as \Throwable;
                  }
                  $s = $cA[2];
                }
                $cx = $call2($Pervasives[16], $cst, $s);
                $cy = $call2($Pervasives[16], $i, $cx);
                throw $runtime["caml_wrap_thrown_exception"](
                        Vector{
                          0,
                          $Invalid_argument,
                          $call2($Pervasives[16], $cst_color_conversion_error, $cy)
                        }
                      ) as \Throwable;
              }
            }
            return $fail(0);
          };
          $f_of_s = function(dynamic $f) use ($Failure,$Invalid_argument,$Pervasives,$call2,$caml_float_of_string,$caml_wrap_exception,$cst__0,$cst_color_conversion_error__0,$runtime) {
            try {$cv = $caml_float_of_string($f);return $cv;}
            catch(\Throwable $cw) {
              $cw = $caml_wrap_exception($cw);
              if ($cw[1] === $Invalid_argument) {$s = $cw[2];}
              else {
                if ($cw[1] !== $Failure) {
                  throw $runtime["caml_wrap_thrown_exception_reraise"]($cw) as \Throwable;
                }
                $s = $cw[2];
              }
              $ct = $call2($Pervasives[16], $cst__0, $s);
              $cu = $call2($Pervasives[16], $f, $ct);
              throw $runtime["caml_wrap_thrown_exception"](
                      Vector{
                        0,
                        $Invalid_argument,
                        $call2($Pervasives[16], $cst_color_conversion_error__0, $cu)
                      }
                    ) as \Throwable;
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
              $b_ = $match__0[1];
              if (! $caml_string_notequal($b_, $cst_rgb)) {
                if ($alpha) {return $fail(0);}
                $cd = $i_of_s_o($blue);
                $ce = $i_of_s_o($green);
                return Vector{1, Vector{0, $i_of_s_o($red), $ce, $cd}};
              }
              if (! $caml_string_notequal($b_, $cst_rgba)) {
                if ($alpha) {
                  $a = $alpha[1];
                  $ca = $f_of_s($a);
                  $cb = $i_of_s_o($blue);
                  $cc = $i_of_s_o($green);
                  return Vector{3, Vector{0, $i_of_s_o($red), $cc, $cb, $ca}};
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
              $cf = $match__2[1];
              if (! $caml_string_notequal($cf, $cst_rgb__0)) {
                if ($alpha__0) {return $fail(0);}
                $cj = $i_of_s_o($blue__0);
                $ck = $i_of_s_o($green__0);
                return Vector{2, Vector{0, $i_of_s_o($red__0), $ck, $cj}};
              }
              if (! $caml_string_notequal($cf, $cst_rgba__0)) {
                if ($alpha__0) {
                  $a__0 = $alpha__0[1];
                  $cg = $f_of_s($a__0);
                  $ch = $i_of_s_o($blue__0);
                  $ci = $i_of_s_o($green__0);
                  return Vector{
                    4,
                    Vector{0, $i_of_s_o($red__0), $ci, $ch, $cg}
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
              $cl = $match__4[1];
              if (! $caml_string_notequal($cl, $cst_hsl)) {
                if ($alpha__1) {return $fail(0);}
                $cp = $i_of_s_o($blue__1);
                $cq = $i_of_s_o($green__1);
                return Vector{5, Vector{0, $i_of_s_o($red__1), $cq, $cp}};
              }
              if (! $caml_string_notequal($cl, $cst_hsla)) {
                if ($alpha__1) {
                  $a__1 = $alpha__1[1];
                  $cm = $f_of_s($a__1);
                  $cn = $i_of_s_o($blue__1);
                  $co = $i_of_s_o($green__1);
                  return Vector{
                    6,
                    Vector{0, $i_of_s_o($red__1), $co, $cn, $cm}
                  };
                }
                return $fail(0);
              }
            }
            return $fail(0);
          }
          return $fail(0);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($cs) as \Throwable;
      }
    };
    $string_of_t__0 = function(dynamic $param) use ($Printf,$b0,$b1,$bO,$bP,$bQ,$bR,$bS,$bT,$bU,$bV,$bW,$bX,$bY,$bZ,$call3,$cst_0,$cst_ch,$cst_cm,$cst_em,$cst_ex,$cst_gd,$cst_in,$cst_mm,$cst_pc,$cst_pt,$cst_px,$cst_rem,$cst_vh,$cst_vm,$cst_vw,$is_int) {
      if ($is_int($param)) {return $cst_0;}
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $f = $param[1];
            return $call3($Printf[4], $bO, $f, $cst_em);
          // FALLTHROUGH
          case 1:
            $f__0 = $param[1];
            return $call3($Printf[4], $bP, $f__0, $cst_ex);
          // FALLTHROUGH
          case 2:
            $f__1 = $param[1];
            return $call3($Printf[4], $bQ, $f__1, $cst_px);
          // FALLTHROUGH
          case 3:
            $f__2 = $param[1];
            return $call3($Printf[4], $bR, $f__2, $cst_gd);
          // FALLTHROUGH
          case 4:
            $f__3 = $param[1];
            return $call3($Printf[4], $bS, $f__3, $cst_rem);
          // FALLTHROUGH
          case 5:
            $f__4 = $param[1];
            return $call3($Printf[4], $bT, $f__4, $cst_vw);
          // FALLTHROUGH
          case 6:
            $f__5 = $param[1];
            return $call3($Printf[4], $bU, $f__5, $cst_vh);
          // FALLTHROUGH
          case 7:
            $f__6 = $param[1];
            return $call3($Printf[4], $bV, $f__6, $cst_vm);
          // FALLTHROUGH
          case 8:
            $f__7 = $param[1];
            return $call3($Printf[4], $bW, $f__7, $cst_ch);
          // FALLTHROUGH
          case 9:
            $f__8 = $param[1];
            return $call3($Printf[4], $bX, $f__8, $cst_mm);
          // FALLTHROUGH
          case 10:
            $f__9 = $param[1];
            return $call3($Printf[4], $bY, $f__9, $cst_cm);
          // FALLTHROUGH
          case 11:
            $f__10 = $param[1];
            return $call3($Printf[4], $bZ, $f__10, $cst_in);
          // FALLTHROUGH
          case 12:
            $f__11 = $param[1];
            return $call3($Printf[4], $b0, $f__11, $cst_pt);
          // FALLTHROUGH
          default:
            $f__12 = $param[1];
            return $call3($Printf[4], $b1, $f__12, $cst_pc);
          }
      }
    };
    $js__0 = function(dynamic $t) use ($string_of_t__0) {
      return $string_of_t__0($t)->toString();
    };
    $ml__0 = function(dynamic $t) use ($Invalid_argument,$Js_of_ocaml_Regexp,$Pervasives,$call1,$call2,$call3,$caml_float_of_string,$caml_js_to_string,$caml_string_compare,$caml_string_notequal,$caml_wrap_exception,$cst_0__0,$cst_ch__0,$cst_cm__0,$cst_d_d_s_S,$cst_em__0,$cst_ex__0,$cst_gd__0,$cst_in__0,$cst_is_not_a_valid_length,$cst_length_conversion_error,$cst_mm__0,$cst_pc__0,$cst_pt__0,$cst_px__0,$cst_rem__0,$cst_vh__0,$cst_vm__0,$cst_vw__0,$runtime) {
      $s = $caml_js_to_string($t);
      if ($runtime["caml_string_equal"]($s, $cst_0__0)) {return 0;}
      $fail = function(dynamic $param) use ($Invalid_argument,$Pervasives,$call2,$cst_is_not_a_valid_length,$runtime,$s) {
        throw $runtime["caml_wrap_thrown_exception"](
                Vector{
                  0,
                  $Invalid_argument,
                  $call2($Pervasives[16], $s, $cst_is_not_a_valid_length)
                }
              ) as \Throwable;
      };
      $re = $call1($Js_of_ocaml_Regexp[1], $cst_d_d_s_S);
      $match = $call3($Js_of_ocaml_Regexp[7], $re, $s, 0);
      if ($match) {
        $r = $match[1];
        $match__0 = $call2($Js_of_ocaml_Regexp[11], $r, 1);
        if ($match__0) {
          $f = $match__0[1];
          try {$b8 = $caml_float_of_string($f);}
          catch(\Throwable $exn) {
            $exn = $caml_wrap_exception($exn);
            if ($exn[1] === $Invalid_argument) {
              $s__0 = $exn[2];
              throw $runtime["caml_wrap_thrown_exception"](
                      Vector{
                        0,
                        $Invalid_argument,
                        $call2($Pervasives[16], $cst_length_conversion_error, $s__0)
                      }
                    ) as \Throwable;
            }
            throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
          }
          $f__0 = $b8;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $b9 = $match__1[1];
          $switch__0 = $caml_string_compare($b9, $cst_pc__0);
          if (0 <= $switch__0) {
            if (! (0 < $switch__0)) {return Vector{13, $f__0};}
            if (! $caml_string_notequal($b9, $cst_pt__0)) {return Vector{12, $f__0};}
            if (! $caml_string_notequal($b9, $cst_px__0)) {return Vector{2, $f__0};}
            if (! $caml_string_notequal($b9, $cst_rem__0)) {return Vector{4, $f__0};}
            if (! $caml_string_notequal($b9, $cst_vh__0)) {return Vector{6, $f__0};}
            if (! $caml_string_notequal($b9, $cst_vm__0)) {return Vector{7, $f__0};}
            if (! $caml_string_notequal($b9, $cst_vw__0)) {return Vector{5, $f__0};}
          }
          else {
            if (! $caml_string_notequal($b9, $cst_ch__0)) {return Vector{8, $f__0};}
            if (! $caml_string_notequal($b9, $cst_cm__0)) {return Vector{10, $f__0};}
            if (! $caml_string_notequal($b9, $cst_em__0)) {return Vector{0, $f__0};}
            if (! $caml_string_notequal($b9, $cst_ex__0)) {return Vector{1, $f__0};}
            if (! $caml_string_notequal($b9, $cst_gd__0)) {return Vector{3, $f__0};}
            if (! $caml_string_notequal($b9, $cst_in__0)) {return Vector{11, $f__0};}
            if (! $caml_string_notequal($b9, $cst_mm__0)) {return Vector{9, $f__0};}
          }
          return $fail(0);
        }
        return $fail(0);
      }
      return $fail(0);
    };
    $Length = Vector{0, $string_of_t__0, $js__0, $ml__0};
    $string_of_t__1 = function(dynamic $param) use ($Printf,$b2,$b3,$b4,$b5,$call3,$cst_deg,$cst_grad,$cst_rad,$cst_turns) {
      switch($param[0]) {
        // FALLTHROUGH
        case 0:
          $f = $param[1];
          return $call3($Printf[4], $b2, $f, $cst_deg);
        // FALLTHROUGH
        case 1:
          $f__0 = $param[1];
          return $call3($Printf[4], $b3, $f__0, $cst_grad);
        // FALLTHROUGH
        case 2:
          $f__1 = $param[1];
          return $call3($Printf[4], $b4, $f__1, $cst_rad);
        // FALLTHROUGH
        default:
          $f__2 = $param[1];
          return $call3($Printf[4], $b5, $f__2, $cst_turns);
        }
    };
    $js__1 = function(dynamic $t) use ($string_of_t__1) {
      return $string_of_t__1($t)->toString();
    };
    $ml__1 = function(dynamic $j) use ($Invalid_argument,$Js_of_ocaml_Regexp,$Pervasives,$call1,$call2,$call3,$caml_float_of_string,$caml_js_to_string,$caml_string_notequal,$caml_wrap_exception,$cst_d_d_deg_grad_rad_turns,$cst_deg__0,$cst_grad__0,$cst_is_not_a_valid_length__0,$cst_length_conversion_error__0,$cst_rad__0,$cst_turns__0,$runtime) {
      $s = $caml_js_to_string($j);
      $re = $call1($Js_of_ocaml_Regexp[1], $cst_d_d_deg_grad_rad_turns);
      $fail = function(dynamic $param) use ($Invalid_argument,$Pervasives,$call2,$cst_is_not_a_valid_length__0,$runtime,$s) {
        throw $runtime["caml_wrap_thrown_exception"](
                Vector{
                  0,
                  $Invalid_argument,
                  $call2($Pervasives[16], $s, $cst_is_not_a_valid_length__0)
                }
              ) as \Throwable;
      };
      $match = $call3($Js_of_ocaml_Regexp[7], $re, $s, 0);
      if ($match) {
        $r = $match[1];
        $match__0 = $call2($Js_of_ocaml_Regexp[11], $r, 1);
        if ($match__0) {
          $f = $match__0[1];
          try {$b6 = $caml_float_of_string($f);}
          catch(\Throwable $exn) {
            $exn = $caml_wrap_exception($exn);
            if ($exn[1] === $Invalid_argument) {
              $s__0 = $exn[2];
              throw $runtime["caml_wrap_thrown_exception"](
                      Vector{
                        0,
                        $Invalid_argument,
                        $call2(
                          $Pervasives[16],
                          $cst_length_conversion_error__0,
                          $s__0
                        )
                      }
                    ) as \Throwable;
            }
            throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
          }
          $f__0 = $b6;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $b7 = $match__1[1];
          if (! $caml_string_notequal($b7, $cst_deg__0)) {return Vector{0, $f__0};}
          if (! $caml_string_notequal($b7, $cst_grad__0)) {return Vector{1, $f__0};}
          if (! $caml_string_notequal($b7, $cst_rad__0)) {return Vector{2, $f__0};}
          if (! $caml_string_notequal($b7, $cst_turns__0)) {return Vector{3, $f__0};}
        }
        return $fail(0);
      }
      return $fail(0);
    };
    $Angle = Vector{0, $string_of_t__1, $js__1, $ml__1};
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
    };
    
    $runtime["caml_register_global"](
      547,
      $Js_of_ocaml_CSS,
      "Js_of_ocaml__CSS"
    );

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
