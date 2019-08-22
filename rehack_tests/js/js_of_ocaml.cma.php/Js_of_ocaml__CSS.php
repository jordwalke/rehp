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
    $d8 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d9 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d_ = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $ea = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dU = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dV = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dW = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dX = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dY = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dZ = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d0 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d1 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d2 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d3 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d4 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d5 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d6 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $d7 = Vector{0, Vector{8, 0, 0, 0, Vector{2, 0, 0}}, $string("%f%s")};
    $dT = $caml_list_of_js_array(
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
    $dS = Vector{
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
    $dM = Vector{
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
    $dN = Vector{
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
    $dO = Vector{
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
    $dP = Vector{
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
    $dQ = Vector{
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
    $dR = Vector{
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
    $bq = Vector{0, 240, 248, 255};
    $br = Vector{0, 250, 235, 215};
    $bs = Vector{0, 0, 255, 255};
    $bt = Vector{0, 127, 255, 212};
    $bu = Vector{0, 240, 255, 255};
    $bv = Vector{0, 245, 245, 220};
    $bw = Vector{0, 255, 228, 196};
    $bx = Vector{0, 0, 0, 0};
    $by = Vector{0, 255, 235, 205};
    $bz = Vector{0, 0, 0, 255};
    $bA = Vector{0, 138, 43, 226};
    $bB = Vector{0, 165, 42, 42};
    $bC = Vector{0, 222, 184, 135};
    $bD = Vector{0, 95, 158, 160};
    $bE = Vector{0, 127, 255, 0};
    $bF = Vector{0, 210, 105, 30};
    $bG = Vector{0, 255, 127, 80};
    $bH = Vector{0, 100, 149, 237};
    $bI = Vector{0, 255, 248, 220};
    $bJ = Vector{0, 220, 20, 60};
    $bK = Vector{0, 0, 255, 255};
    $bL = Vector{0, 0, 0, 139};
    $bM = Vector{0, 0, 139, 139};
    $bN = Vector{0, 184, 134, 11};
    $bO = Vector{0, 169, 169, 169};
    $bP = Vector{0, 0, 100, 0};
    $bQ = Vector{0, 169, 169, 169};
    $bR = Vector{0, 189, 183, 107};
    $bS = Vector{0, 139, 0, 139};
    $bT = Vector{0, 85, 107, 47};
    $bU = Vector{0, 255, 140, 0};
    $bV = Vector{0, 153, 50, 204};
    $bW = Vector{0, 139, 0, 0};
    $bX = Vector{0, 233, 150, 122};
    $bY = Vector{0, 143, 188, 143};
    $bZ = Vector{0, 72, 61, 139};
    $b0 = Vector{0, 47, 79, 79};
    $b1 = Vector{0, 47, 79, 79};
    $b2 = Vector{0, 0, 206, 209};
    $b3 = Vector{0, 148, 0, 211};
    $b4 = Vector{0, 255, 20, 147};
    $b5 = Vector{0, 0, 191, 255};
    $b6 = Vector{0, 105, 105, 105};
    $b7 = Vector{0, 105, 105, 105};
    $b8 = Vector{0, 30, 144, 255};
    $b9 = Vector{0, 178, 34, 34};
    $b_ = Vector{0, 255, 250, 240};
    $ca = Vector{0, 34, 139, 34};
    $cb = Vector{0, 255, 0, 255};
    $cc = Vector{0, 220, 220, 220};
    $cd = Vector{0, 248, 248, 255};
    $ce = Vector{0, 255, 215, 0};
    $cf = Vector{0, 218, 165, 32};
    $cg = Vector{0, 128, 128, 128};
    $ch = Vector{0, 128, 128, 128};
    $ci = Vector{0, 0, 128, 0};
    $cj = Vector{0, 173, 255, 47};
    $ck = Vector{0, 240, 255, 240};
    $cl = Vector{0, 255, 105, 180};
    $cm = Vector{0, 205, 92, 92};
    $cn = Vector{0, 75, 0, 130};
    $co = Vector{0, 255, 255, 240};
    $cp = Vector{0, 240, 230, 140};
    $cq = Vector{0, 230, 230, 250};
    $cr = Vector{0, 255, 240, 245};
    $cs = Vector{0, 124, 252, 0};
    $ct = Vector{0, 255, 250, 205};
    $cu = Vector{0, 173, 216, 230};
    $cv = Vector{0, 240, 128, 128};
    $cw = Vector{0, 224, 255, 255};
    $cx = Vector{0, 250, 250, 210};
    $cy = Vector{0, 211, 211, 211};
    $cz = Vector{0, 144, 238, 144};
    $cA = Vector{0, 211, 211, 211};
    $cB = Vector{0, 255, 182, 193};
    $cC = Vector{0, 255, 160, 122};
    $cD = Vector{0, 32, 178, 170};
    $cE = Vector{0, 135, 206, 250};
    $cF = Vector{0, 119, 136, 153};
    $cG = Vector{0, 119, 136, 153};
    $cH = Vector{0, 176, 196, 222};
    $cI = Vector{0, 255, 255, 224};
    $cJ = Vector{0, 0, 255, 0};
    $cK = Vector{0, 50, 205, 50};
    $cL = Vector{0, 250, 240, 230};
    $cM = Vector{0, 255, 0, 255};
    $cN = Vector{0, 128, 0, 0};
    $cO = Vector{0, 102, 205, 170};
    $cP = Vector{0, 0, 0, 205};
    $cQ = Vector{0, 186, 85, 211};
    $cR = Vector{0, 147, 112, 219};
    $cS = Vector{0, 60, 179, 113};
    $cT = Vector{0, 123, 104, 238};
    $cU = Vector{0, 0, 250, 154};
    $cV = Vector{0, 72, 209, 204};
    $cW = Vector{0, 199, 21, 133};
    $cX = Vector{0, 25, 25, 112};
    $cY = Vector{0, 245, 255, 250};
    $cZ = Vector{0, 255, 228, 225};
    $c0 = Vector{0, 255, 228, 181};
    $c1 = Vector{0, 255, 222, 173};
    $c2 = Vector{0, 0, 0, 128};
    $c3 = Vector{0, 253, 245, 230};
    $c4 = Vector{0, 128, 128, 0};
    $c5 = Vector{0, 107, 142, 35};
    $c6 = Vector{0, 255, 165, 0};
    $c7 = Vector{0, 255, 69, 0};
    $c8 = Vector{0, 218, 112, 214};
    $c9 = Vector{0, 238, 232, 170};
    $c_ = Vector{0, 152, 251, 152};
    $da = Vector{0, 175, 238, 238};
    $db = Vector{0, 219, 112, 147};
    $dc = Vector{0, 255, 239, 213};
    $dd = Vector{0, 255, 218, 185};
    $de = Vector{0, 205, 133, 63};
    $df = Vector{0, 255, 192, 203};
    $dg = Vector{0, 221, 160, 221};
    $dh = Vector{0, 176, 224, 230};
    $di = Vector{0, 128, 0, 128};
    $dj = Vector{0, 255, 0, 0};
    $dk = Vector{0, 188, 143, 143};
    $dl = Vector{0, 65, 105, 225};
    $dm = Vector{0, 139, 69, 19};
    $dn = Vector{0, 250, 128, 114};
    $dp = Vector{0, 244, 164, 96};
    $dq = Vector{0, 46, 139, 87};
    $dr = Vector{0, 255, 245, 238};
    $ds = Vector{0, 160, 82, 45};
    $dt = Vector{0, 192, 192, 192};
    $du = Vector{0, 135, 206, 235};
    $dv = Vector{0, 106, 90, 205};
    $dw = Vector{0, 112, 128, 144};
    $dx = Vector{0, 112, 128, 144};
    $dy = Vector{0, 255, 250, 250};
    $dz = Vector{0, 0, 255, 127};
    $dA = Vector{0, 70, 130, 180};
    $dB = Vector{0, 210, 180, 140};
    $dC = Vector{0, 0, 128, 128};
    $dD = Vector{0, 216, 191, 216};
    $dE = Vector{0, 255, 99, 71};
    $dF = Vector{0, 64, 224, 208};
    $dG = Vector{0, 238, 130, 238};
    $dH = Vector{0, 245, 222, 179};
    $dI = Vector{0, 255, 255, 255};
    $dJ = Vector{0, 245, 245, 245};
    $dK = Vector{0, 255, 255, 0};
    $dL = Vector{0, 154, 205, 50};
    $string_of_name = function(dynamic $param) use ($cst_aliceblue,$cst_antiquewhite,$cst_aqua,$cst_aquamarine,$cst_azure,$cst_beige,$cst_bisque,$cst_black,$cst_blanchedalmond,$cst_blue,$cst_blueviolet,$cst_brown,$cst_burlywood,$cst_cadetblue,$cst_chartreuse,$cst_chocolate,$cst_coral,$cst_cornflowerblue,$cst_cornsilk,$cst_crimson,$cst_cyan,$cst_darkblue,$cst_darkcyan,$cst_darkgoldenrod,$cst_darkgray,$cst_darkgreen,$cst_darkgrey,$cst_darkkhaki,$cst_darkmagenta,$cst_darkolivegreen,$cst_darkorange,$cst_darkorchid,$cst_darkred,$cst_darksalmon,$cst_darkseagreen,$cst_darkslateblue,$cst_darkslategray,$cst_darkslategrey,$cst_darkturquoise,$cst_darkviolet,$cst_deeppink,$cst_deepskyblue,$cst_dimgray,$cst_dimgrey,$cst_dodgerblue,$cst_firebrick,$cst_floralwhite,$cst_forestgreen,$cst_fuchsia,$cst_gainsboro,$cst_ghostwhite,$cst_gold,$cst_goldenrod,$cst_gray,$cst_green,$cst_greenyellow,$cst_grey,$cst_honeydew,$cst_hotpink,$cst_indianred,$cst_indigo,$cst_ivory,$cst_khaki,$cst_lavender,$cst_lavenderblush,$cst_lawngreen,$cst_lemonchiffon,$cst_lightblue,$cst_lightcoral,$cst_lightcyan,$cst_lightgoldenrodyellow,$cst_lightgray,$cst_lightgreen,$cst_lightgrey,$cst_lightpink,$cst_lightsalmon,$cst_lightseagreen,$cst_lightskyblue,$cst_lightslategray,$cst_lightslategrey,$cst_lightsteelblue,$cst_lightyellow,$cst_lime,$cst_limegreen,$cst_linen,$cst_magenta,$cst_maroon,$cst_mediumaquamarine,$cst_mediumblue,$cst_mediumorchid,$cst_mediumpurple,$cst_mediumseagreen,$cst_mediumslateblue,$cst_mediumspringgreen,$cst_mediumturquoise,$cst_mediumvioletred,$cst_midnightblue,$cst_mintcream,$cst_mistyrose,$cst_moccasin,$cst_navajowhite,$cst_navy,$cst_oldlace,$cst_olive,$cst_olivedrab,$cst_orange,$cst_orangered,$cst_orchid,$cst_palegoldenrod,$cst_palegreen,$cst_paleturquoise,$cst_palevioletred,$cst_papayawhip,$cst_peachpuff,$cst_peru,$cst_pink,$cst_plum,$cst_powderblue,$cst_purple,$cst_red,$cst_rosybrown,$cst_royalblue,$cst_saddlebrown,$cst_salmon,$cst_sandybrown,$cst_seagreen,$cst_seashell,$cst_sienna,$cst_silver,$cst_skyblue,$cst_slateblue,$cst_slategray,$cst_slategrey,$cst_snow,$cst_springgreen,$cst_steelblue,$cst_tan,$cst_teal,$cst_thistle,$cst_tomato,$cst_turquoise,$cst_violet,$cst_wheat,$cst_white,$cst_whitesmoke,$cst_yellow,$cst_yellowgreen) {
      $e9 = $param;
      if (74 <= $e9) {
        if (111 <= $e9) {
          switch($e9) {
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
        switch($e9) {
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
      if (37 <= $e9) {
        switch($e9) {
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
      switch($e9) {
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
    $rgb_of_name = function(dynamic $param) use ($b0,$b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8,$b9,$bA,$bB,$bC,$bD,$bE,$bF,$bG,$bH,$bI,$bJ,$bK,$bL,$bM,$bN,$bO,$bP,$bQ,$bR,$bS,$bT,$bU,$bV,$bW,$bX,$bY,$bZ,$b_,$bq,$br,$bs,$bt,$bu,$bv,$bw,$bx,$by,$bz,$c0,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$cA,$cB,$cC,$cD,$cE,$cF,$cG,$cH,$cI,$cJ,$cK,$cL,$cM,$cN,$cO,$cP,$cQ,$cR,$cS,$cT,$cU,$cV,$cW,$cX,$cY,$cZ,$c_,$ca,$cb,$cc,$cd,$ce,$cf,$cg,$ch,$ci,$cj,$ck,$cl,$cm,$cn,$co,$cp,$cq,$cr,$cs,$ct,$cu,$cv,$cw,$cx,$cy,$cz,$dA,$dB,$dC,$dD,$dE,$dF,$dG,$dH,$dI,$dJ,$dK,$dL,$da,$db,$dc,$dd,$de,$df,$dg,$dh,$di,$dj,$dk,$dl,$dm,$dn,$dp,$dq,$dr,$ds,$dt,$du,$dv,$dw,$dx,$dy,$dz) {
      $e8 = $param;
      if (74 <= $e8) {
        if (111 <= $e8) {
          switch($e8) {
            // FALLTHROUGH
            case 111:
              return $db;
            // FALLTHROUGH
            case 112:
              return $dc;
            // FALLTHROUGH
            case 113:
              return $dd;
            // FALLTHROUGH
            case 114:
              return $de;
            // FALLTHROUGH
            case 115:
              return $df;
            // FALLTHROUGH
            case 116:
              return $dg;
            // FALLTHROUGH
            case 117:
              return $dh;
            // FALLTHROUGH
            case 118:
              return $di;
            // FALLTHROUGH
            case 119:
              return $dj;
            // FALLTHROUGH
            case 120:
              return $dk;
            // FALLTHROUGH
            case 121:
              return $dl;
            // FALLTHROUGH
            case 122:
              return $dm;
            // FALLTHROUGH
            case 123:
              return $dn;
            // FALLTHROUGH
            case 124:
              return $dp;
            // FALLTHROUGH
            case 125:
              return $dq;
            // FALLTHROUGH
            case 126:
              return $dr;
            // FALLTHROUGH
            case 127:
              return $ds;
            // FALLTHROUGH
            case 128:
              return $dt;
            // FALLTHROUGH
            case 129:
              return $du;
            // FALLTHROUGH
            case 130:
              return $dv;
            // FALLTHROUGH
            case 131:
              return $dw;
            // FALLTHROUGH
            case 132:
              return $dx;
            // FALLTHROUGH
            case 133:
              return $dy;
            // FALLTHROUGH
            case 134:
              return $dz;
            // FALLTHROUGH
            case 135:
              return $dA;
            // FALLTHROUGH
            case 136:
              return $dB;
            // FALLTHROUGH
            case 137:
              return $dC;
            // FALLTHROUGH
            case 138:
              return $dD;
            // FALLTHROUGH
            case 139:
              return $dE;
            // FALLTHROUGH
            case 140:
              return $dF;
            // FALLTHROUGH
            case 141:
              return $dG;
            // FALLTHROUGH
            case 142:
              return $dH;
            // FALLTHROUGH
            case 143:
              return $dI;
            // FALLTHROUGH
            case 144:
              return $dJ;
            // FALLTHROUGH
            case 145:
              return $dK;
            // FALLTHROUGH
            default:
              return $dL;
            }
        }
        switch($e8) {
          // FALLTHROUGH
          case 74:
            return $cB;
          // FALLTHROUGH
          case 75:
            return $cC;
          // FALLTHROUGH
          case 76:
            return $cD;
          // FALLTHROUGH
          case 77:
            return $cE;
          // FALLTHROUGH
          case 78:
            return $cF;
          // FALLTHROUGH
          case 79:
            return $cG;
          // FALLTHROUGH
          case 80:
            return $cH;
          // FALLTHROUGH
          case 81:
            return $cI;
          // FALLTHROUGH
          case 82:
            return $cJ;
          // FALLTHROUGH
          case 83:
            return $cK;
          // FALLTHROUGH
          case 84:
            return $cL;
          // FALLTHROUGH
          case 85:
            return $cM;
          // FALLTHROUGH
          case 86:
            return $cN;
          // FALLTHROUGH
          case 87:
            return $cO;
          // FALLTHROUGH
          case 88:
            return $cP;
          // FALLTHROUGH
          case 89:
            return $cQ;
          // FALLTHROUGH
          case 90:
            return $cR;
          // FALLTHROUGH
          case 91:
            return $cS;
          // FALLTHROUGH
          case 92:
            return $cT;
          // FALLTHROUGH
          case 93:
            return $cU;
          // FALLTHROUGH
          case 94:
            return $cV;
          // FALLTHROUGH
          case 95:
            return $cW;
          // FALLTHROUGH
          case 96:
            return $cX;
          // FALLTHROUGH
          case 97:
            return $cY;
          // FALLTHROUGH
          case 98:
            return $cZ;
          // FALLTHROUGH
          case 99:
            return $c0;
          // FALLTHROUGH
          case 100:
            return $c1;
          // FALLTHROUGH
          case 101:
            return $c2;
          // FALLTHROUGH
          case 102:
            return $c3;
          // FALLTHROUGH
          case 103:
            return $c4;
          // FALLTHROUGH
          case 104:
            return $c5;
          // FALLTHROUGH
          case 105:
            return $c6;
          // FALLTHROUGH
          case 106:
            return $c7;
          // FALLTHROUGH
          case 107:
            return $c8;
          // FALLTHROUGH
          case 108:
            return $c9;
          // FALLTHROUGH
          case 109:
            return $c_;
          // FALLTHROUGH
          default:
            return $da;
          }
      }
      if (37 <= $e8) {
        switch($e8) {
          // FALLTHROUGH
          case 37:
            return $b1;
          // FALLTHROUGH
          case 38:
            return $b2;
          // FALLTHROUGH
          case 39:
            return $b3;
          // FALLTHROUGH
          case 40:
            return $b4;
          // FALLTHROUGH
          case 41:
            return $b5;
          // FALLTHROUGH
          case 42:
            return $b6;
          // FALLTHROUGH
          case 43:
            return $b7;
          // FALLTHROUGH
          case 44:
            return $b8;
          // FALLTHROUGH
          case 45:
            return $b9;
          // FALLTHROUGH
          case 46:
            return $b_;
          // FALLTHROUGH
          case 47:
            return $ca;
          // FALLTHROUGH
          case 48:
            return $cb;
          // FALLTHROUGH
          case 49:
            return $cc;
          // FALLTHROUGH
          case 50:
            return $cd;
          // FALLTHROUGH
          case 51:
            return $ce;
          // FALLTHROUGH
          case 52:
            return $cf;
          // FALLTHROUGH
          case 53:
            return $cg;
          // FALLTHROUGH
          case 54:
            return $ch;
          // FALLTHROUGH
          case 55:
            return $ci;
          // FALLTHROUGH
          case 56:
            return $cj;
          // FALLTHROUGH
          case 57:
            return $ck;
          // FALLTHROUGH
          case 58:
            return $cl;
          // FALLTHROUGH
          case 59:
            return $cm;
          // FALLTHROUGH
          case 60:
            return $cn;
          // FALLTHROUGH
          case 61:
            return $co;
          // FALLTHROUGH
          case 62:
            return $cp;
          // FALLTHROUGH
          case 63:
            return $cq;
          // FALLTHROUGH
          case 64:
            return $cr;
          // FALLTHROUGH
          case 65:
            return $cs;
          // FALLTHROUGH
          case 66:
            return $ct;
          // FALLTHROUGH
          case 67:
            return $cu;
          // FALLTHROUGH
          case 68:
            return $cv;
          // FALLTHROUGH
          case 69:
            return $cw;
          // FALLTHROUGH
          case 70:
            return $cx;
          // FALLTHROUGH
          case 71:
            return $cy;
          // FALLTHROUGH
          case 72:
            return $cz;
          // FALLTHROUGH
          default:
            return $cA;
          }
      }
      switch($e8) {
        // FALLTHROUGH
        case 0:
          return $bq;
        // FALLTHROUGH
        case 1:
          return $br;
        // FALLTHROUGH
        case 2:
          return $bs;
        // FALLTHROUGH
        case 3:
          return $bt;
        // FALLTHROUGH
        case 4:
          return $bu;
        // FALLTHROUGH
        case 5:
          return $bv;
        // FALLTHROUGH
        case 6:
          return $bw;
        // FALLTHROUGH
        case 7:
          return $bx;
        // FALLTHROUGH
        case 8:
          return $by;
        // FALLTHROUGH
        case 9:
          return $bz;
        // FALLTHROUGH
        case 10:
          return $bA;
        // FALLTHROUGH
        case 11:
          return $bB;
        // FALLTHROUGH
        case 12:
          return $bC;
        // FALLTHROUGH
        case 13:
          return $bD;
        // FALLTHROUGH
        case 14:
          return $bE;
        // FALLTHROUGH
        case 15:
          return $bF;
        // FALLTHROUGH
        case 16:
          return $bG;
        // FALLTHROUGH
        case 17:
          return $bH;
        // FALLTHROUGH
        case 18:
          return $bI;
        // FALLTHROUGH
        case 19:
          return $bJ;
        // FALLTHROUGH
        case 20:
          return $bK;
        // FALLTHROUGH
        case 21:
          return $bL;
        // FALLTHROUGH
        case 22:
          return $bM;
        // FALLTHROUGH
        case 23:
          return $bN;
        // FALLTHROUGH
        case 24:
          return $bO;
        // FALLTHROUGH
        case 25:
          return $bP;
        // FALLTHROUGH
        case 26:
          return $bQ;
        // FALLTHROUGH
        case 27:
          return $bR;
        // FALLTHROUGH
        case 28:
          return $bS;
        // FALLTHROUGH
        case 29:
          return $bT;
        // FALLTHROUGH
        case 30:
          return $bU;
        // FALLTHROUGH
        case 31:
          return $bV;
        // FALLTHROUGH
        case 32:
          return $bW;
        // FALLTHROUGH
        case 33:
          return $bX;
        // FALLTHROUGH
        case 34:
          return $bY;
        // FALLTHROUGH
        case 35:
          return $bZ;
        // FALLTHROUGH
        default:
          return $b0;
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
    $string_of_t = function(dynamic $param) use ($Printf,$call4,$call5,$dM,$dN,$dO,$dP,$dQ,$dR,$string_of_name) {
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
          return $call4($Printf[4], $dM, $r, $g, $b);
        // FALLTHROUGH
        case 2:
          $match__0 = $param[1];
          $b__0 = $match__0[3];
          $g__0 = $match__0[2];
          $r__0 = $match__0[1];
          return $call4($Printf[4], $dN, $r__0, $g__0, $b__0);
        // FALLTHROUGH
        case 3:
          $match__1 = $param[1];
          $a = $match__1[4];
          $b__1 = $match__1[3];
          $g__1 = $match__1[2];
          $r__1 = $match__1[1];
          return $call5($Printf[4], $dO, $r__1, $g__1, $b__1, $a);
        // FALLTHROUGH
        case 4:
          $match__2 = $param[1];
          $a__0 = $match__2[4];
          $b__2 = $match__2[3];
          $g__2 = $match__2[2];
          $r__2 = $match__2[1];
          return $call5($Printf[4], $dP, $r__2, $g__2, $b__2, $a__0);
        // FALLTHROUGH
        case 5:
          $match__3 = $param[1];
          $l = $match__3[3];
          $s = $match__3[2];
          $h = $match__3[1];
          return $call4($Printf[4], $dQ, $h, $s, $l);
        // FALLTHROUGH
        default:
          $match__4 = $param[1];
          $a__1 = $match__4[4];
          $l__0 = $match__4[3];
          $s__0 = $match__4[2];
          $h__0 = $match__4[1];
          return $call5($Printf[4], $dR, $h__0, $s__0, $l__0, $a__1);
        }
    };
    $hex_of_rgb = function(dynamic $param) use ($Invalid_argument,$Pervasives,$Printf,$call1,$call2,$call4,$cst_is_out_of_valid_range,$dS,$runtime) {
      $blue = $param[3];
      $green = $param[2];
      $red = $param[1];
      $in_range = function(dynamic $i) use ($Invalid_argument,$Pervasives,$call1,$call2,$cst_is_out_of_valid_range,$runtime) {
        $e5 = $i < 0 ? 1 : (0);
        $e6 = $e5 ? $e5 : (255 < $i ? 1 : (0));
        if ($e6) {
          $e7 = $call1($Pervasives[21], $i);
          throw $runtime["caml_wrap_thrown_exception"](
                  Vector{
                    0,
                    $Invalid_argument,
                    $call2($Pervasives[16], $e7, $cst_is_out_of_valid_range)
                  }
                ) as \Throwable;
        }
        return $e6;
      };
      $in_range($red);
      $in_range($green);
      $in_range($blue);
      return $call4($Printf[4], $dS, $red, $green, $blue);
    };
    $js_t_of_js_string = function(dynamic $s) use ($Invalid_argument,$Js_of_ocaml_Js,$List,$Pervasives,$call1,$call2,$caml_get_public_method,$caml_js_to_string,$caml_jsbytes_of_string,$cst_hsl_s_d_s_d_s_d,$cst_hsla_s_d_s_d_s_d_d_d,$cst_is_not_a_valid_color,$cst_rgb_s_d_s_d_s_d,$cst_rgb_s_d_s_d_s_d__0,$cst_rgba_s_d_s_d_s_d_d_d,$cst_rgba_s_d_s_d_s_d_d_d__0,$dT,$runtime) {
      $eH = 0;
      $eI = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d);
      $eJ = $Js_of_ocaml_Js[10];
      $rgb_re = (function(dynamic $t23, dynamic $t22, dynamic $param) {return new $t23($t22);
       })($eJ, $eI, $eH);
      $eK = 0;
      $eL = $caml_jsbytes_of_string($cst_rgb_s_d_s_d_s_d__0);
      $eM = $Js_of_ocaml_Js[10];
      $rgb_pct_re = (function(dynamic $t21, dynamic $t20, dynamic $param) {return new $t21($t20);
       })($eM, $eL, $eK);
      $eN = 0;
      $eO = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d);
      $eP = $Js_of_ocaml_Js[10];
      $rgba_re = (function(dynamic $t19, dynamic $t18, dynamic $param) {return new $t19($t18);
       })($eP, $eO, $eN);
      $eQ = 0;
      $eR = $caml_jsbytes_of_string($cst_rgba_s_d_s_d_s_d_d_d__0);
      $eS = $Js_of_ocaml_Js[10];
      $rgba_pct_re = (function(dynamic $t17, dynamic $t16, dynamic $param) {return new $t17($t16);
       })($eS, $eR, $eQ);
      $eT = 0;
      $eU = $caml_jsbytes_of_string($cst_hsl_s_d_s_d_s_d);
      $eV = $Js_of_ocaml_Js[10];
      $hsl_re = (function(dynamic $t15, dynamic $t14, dynamic $param) {return new $t15($t14);
       })($eV, $eU, $eT);
      $eW = 0;
      $eX = $caml_jsbytes_of_string($cst_hsla_s_d_s_d_s_d_d_d);
      $eY = $Js_of_ocaml_Js[10];
      $hsla_re = (function(dynamic $t13, dynamic $t12, dynamic $param) {return new $t13($t12);
       })($eY, $eX, $eW);
      $eZ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -856045486, 42), $x);
      };
      if (
        !
        (int)
        (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->test($t0);
         })($rgb_re, $s, $eZ)
      ) {
        $e0 = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -856045486, 43), $x);
        };
        if (
          !
          (int)
          (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->test($t2);
           })($rgba_re, $s, $e0)
        ) {
          $e1 = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -856045486, 44), $x);
          };
          if (
            !
            (int)
            (function(dynamic $t5, dynamic $t4, dynamic $param) {return $t5->test($t4);
             })($rgb_pct_re, $s, $e1)
          ) {
            $e2 = function(dynamic $x) use ($call1,$caml_get_public_method) {
              return $call1($caml_get_public_method($x, -856045486, 45), $x);
            };
            if (
              !
              (int)
              (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->test($t6);
               })($rgba_pct_re, $s, $e2)
            ) {
              $e3 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                return $call1($caml_get_public_method($x, -856045486, 46), $x);
              };
              if (
                !
                (int)
                (function(dynamic $t9, dynamic $t8, dynamic $param) {return $t9->test($t8);
                 })($hsl_re, $s, $e3)
              ) {
                $e4 = function(dynamic $x) use ($call1,$caml_get_public_method) {
                  return $call1(
                    $caml_get_public_method($x, -856045486, 47),
                    $x
                  );
                };
                if (
                  !
                  (int)
                  (function(dynamic $t11, dynamic $t10, dynamic $param) {return $t11->test($t10);
                   })($hsla_re, $s, $e4)
                ) {
                  if ($call2($List[31], $caml_js_to_string($s), $dT)) {return $s;}
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
      try {$ex = Vector{0, $name_of_string($s)};return $ex;}
      catch(\Throwable $ey) {
        $ey = $caml_wrap_exception($ey);
        if ($ey[1] === $Invalid_argument) {
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
              try {$eF = $runtime["caml_int_of_string"]($i);return $eF;}
              catch(\Throwable $eG) {
                $eG = $caml_wrap_exception($eG);
                if ($eG[1] === $Invalid_argument) {$s = $eG[2];}
                else {
                  if ($eG[1] !== $Failure) {
                    throw $runtime["caml_wrap_thrown_exception_reraise"]($eG) as \Throwable;
                  }
                  $s = $eG[2];
                }
                $eD = $call2($Pervasives[16], $cst, $s);
                $eE = $call2($Pervasives[16], $i, $eD);
                throw $runtime["caml_wrap_thrown_exception"](
                        Vector{
                          0,
                          $Invalid_argument,
                          $call2($Pervasives[16], $cst_color_conversion_error, $eE)
                        }
                      ) as \Throwable;
              }
            }
            return $fail(0);
          };
          $f_of_s = function(dynamic $f) use ($Failure,$Invalid_argument,$Pervasives,$call2,$caml_float_of_string,$caml_wrap_exception,$cst__0,$cst_color_conversion_error__0,$runtime) {
            try {$eB = $caml_float_of_string($f);return $eB;}
            catch(\Throwable $eC) {
              $eC = $caml_wrap_exception($eC);
              if ($eC[1] === $Invalid_argument) {$s = $eC[2];}
              else {
                if ($eC[1] !== $Failure) {
                  throw $runtime["caml_wrap_thrown_exception_reraise"]($eC) as \Throwable;
                }
                $s = $eC[2];
              }
              $ez = $call2($Pervasives[16], $cst__0, $s);
              $eA = $call2($Pervasives[16], $f, $ez);
              throw $runtime["caml_wrap_thrown_exception"](
                      Vector{
                        0,
                        $Invalid_argument,
                        $call2($Pervasives[16], $cst_color_conversion_error__0, $eA)
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
              $ef = $match__0[1];
              if (! $caml_string_notequal($ef, $cst_rgb)) {
                if ($alpha) {return $fail(0);}
                $ej = $i_of_s_o($blue);
                $ek = $i_of_s_o($green);
                return Vector{1, Vector{0, $i_of_s_o($red), $ek, $ej}};
              }
              if (! $caml_string_notequal($ef, $cst_rgba)) {
                if ($alpha) {
                  $a = $alpha[1];
                  $eg = $f_of_s($a);
                  $eh = $i_of_s_o($blue);
                  $ei = $i_of_s_o($green);
                  return Vector{3, Vector{0, $i_of_s_o($red), $ei, $eh, $eg}};
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
              $el = $match__2[1];
              if (! $caml_string_notequal($el, $cst_rgb__0)) {
                if ($alpha__0) {return $fail(0);}
                $ep = $i_of_s_o($blue__0);
                $eq = $i_of_s_o($green__0);
                return Vector{2, Vector{0, $i_of_s_o($red__0), $eq, $ep}};
              }
              if (! $caml_string_notequal($el, $cst_rgba__0)) {
                if ($alpha__0) {
                  $a__0 = $alpha__0[1];
                  $em = $f_of_s($a__0);
                  $en = $i_of_s_o($blue__0);
                  $eo = $i_of_s_o($green__0);
                  return Vector{
                    4,
                    Vector{0, $i_of_s_o($red__0), $eo, $en, $em}
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
              $er = $match__4[1];
              if (! $caml_string_notequal($er, $cst_hsl)) {
                if ($alpha__1) {return $fail(0);}
                $ev = $i_of_s_o($blue__1);
                $ew = $i_of_s_o($green__1);
                return Vector{5, Vector{0, $i_of_s_o($red__1), $ew, $ev}};
              }
              if (! $caml_string_notequal($er, $cst_hsla)) {
                if ($alpha__1) {
                  $a__1 = $alpha__1[1];
                  $es = $f_of_s($a__1);
                  $et = $i_of_s_o($blue__1);
                  $eu = $i_of_s_o($green__1);
                  return Vector{
                    6,
                    Vector{0, $i_of_s_o($red__1), $eu, $et, $es}
                  };
                }
                return $fail(0);
              }
            }
            return $fail(0);
          }
          return $fail(0);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($ey) as \Throwable;
      }
    };
    $string_of_t__0 = function(dynamic $param) use ($Printf,$call3,$cst_0,$cst_ch,$cst_cm,$cst_em,$cst_ex,$cst_gd,$cst_in,$cst_mm,$cst_pc,$cst_pt,$cst_px,$cst_rem,$cst_vh,$cst_vm,$cst_vw,$d0,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$dU,$dV,$dW,$dX,$dY,$dZ,$is_int) {
      if ($is_int($param)) {return $cst_0;}
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $f = $param[1];
            return $call3($Printf[4], $dU, $f, $cst_em);
          // FALLTHROUGH
          case 1:
            $f__0 = $param[1];
            return $call3($Printf[4], $dV, $f__0, $cst_ex);
          // FALLTHROUGH
          case 2:
            $f__1 = $param[1];
            return $call3($Printf[4], $dW, $f__1, $cst_px);
          // FALLTHROUGH
          case 3:
            $f__2 = $param[1];
            return $call3($Printf[4], $dX, $f__2, $cst_gd);
          // FALLTHROUGH
          case 4:
            $f__3 = $param[1];
            return $call3($Printf[4], $dY, $f__3, $cst_rem);
          // FALLTHROUGH
          case 5:
            $f__4 = $param[1];
            return $call3($Printf[4], $dZ, $f__4, $cst_vw);
          // FALLTHROUGH
          case 6:
            $f__5 = $param[1];
            return $call3($Printf[4], $d0, $f__5, $cst_vh);
          // FALLTHROUGH
          case 7:
            $f__6 = $param[1];
            return $call3($Printf[4], $d1, $f__6, $cst_vm);
          // FALLTHROUGH
          case 8:
            $f__7 = $param[1];
            return $call3($Printf[4], $d2, $f__7, $cst_ch);
          // FALLTHROUGH
          case 9:
            $f__8 = $param[1];
            return $call3($Printf[4], $d3, $f__8, $cst_mm);
          // FALLTHROUGH
          case 10:
            $f__9 = $param[1];
            return $call3($Printf[4], $d4, $f__9, $cst_cm);
          // FALLTHROUGH
          case 11:
            $f__10 = $param[1];
            return $call3($Printf[4], $d5, $f__10, $cst_in);
          // FALLTHROUGH
          case 12:
            $f__11 = $param[1];
            return $call3($Printf[4], $d6, $f__11, $cst_pt);
          // FALLTHROUGH
          default:
            $f__12 = $param[1];
            return $call3($Printf[4], $d7, $f__12, $cst_pc);
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
          try {$ed = $caml_float_of_string($f);}
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
          $f__0 = $ed;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $ee = $match__1[1];
          $switch__0 = $caml_string_compare($ee, $cst_pc__0);
          if (0 <= $switch__0) {
            if (! (0 < $switch__0)) {return Vector{13, $f__0};}
            if (! $caml_string_notequal($ee, $cst_pt__0)) {return Vector{12, $f__0};}
            if (! $caml_string_notequal($ee, $cst_px__0)) {return Vector{2, $f__0};}
            if (! $caml_string_notequal($ee, $cst_rem__0)) {return Vector{4, $f__0};}
            if (! $caml_string_notequal($ee, $cst_vh__0)) {return Vector{6, $f__0};}
            if (! $caml_string_notequal($ee, $cst_vm__0)) {return Vector{7, $f__0};}
            if (! $caml_string_notequal($ee, $cst_vw__0)) {return Vector{5, $f__0};}
          }
          else {
            if (! $caml_string_notequal($ee, $cst_ch__0)) {return Vector{8, $f__0};}
            if (! $caml_string_notequal($ee, $cst_cm__0)) {return Vector{10, $f__0};}
            if (! $caml_string_notequal($ee, $cst_em__0)) {return Vector{0, $f__0};}
            if (! $caml_string_notequal($ee, $cst_ex__0)) {return Vector{1, $f__0};}
            if (! $caml_string_notequal($ee, $cst_gd__0)) {return Vector{3, $f__0};}
            if (! $caml_string_notequal($ee, $cst_in__0)) {return Vector{11, $f__0};}
            if (! $caml_string_notequal($ee, $cst_mm__0)) {return Vector{9, $f__0};}
          }
          return $fail(0);
        }
        return $fail(0);
      }
      return $fail(0);
    };
    $Length = Vector{0, $string_of_t__0, $js__0, $ml__0};
    $string_of_t__1 = function(dynamic $param) use ($Printf,$call3,$cst_deg,$cst_grad,$cst_rad,$cst_turns,$d8,$d9,$d_,$ea) {
      switch($param[0]) {
        // FALLTHROUGH
        case 0:
          $f = $param[1];
          return $call3($Printf[4], $d8, $f, $cst_deg);
        // FALLTHROUGH
        case 1:
          $f__0 = $param[1];
          return $call3($Printf[4], $d9, $f__0, $cst_grad);
        // FALLTHROUGH
        case 2:
          $f__1 = $param[1];
          return $call3($Printf[4], $d_, $f__1, $cst_rad);
        // FALLTHROUGH
        default:
          $f__2 = $param[1];
          return $call3($Printf[4], $ea, $f__2, $cst_turns);
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
          try {$eb = $caml_float_of_string($f);}
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
          $f__0 = $eb;
        }
        else {$f__0 = $fail(0);}
        $match__1 = $call2($Js_of_ocaml_Regexp[11], $r, 2);
        if ($match__1) {
          $ec = $match__1[1];
          if (! $caml_string_notequal($ec, $cst_deg__0)) {return Vector{0, $f__0};}
          if (! $caml_string_notequal($ec, $cst_grad__0)) {return Vector{1, $f__0};}
          if (! $caml_string_notequal($ec, $cst_rad__0)) {return Vector{2, $f__0};}
          if (! $caml_string_notequal($ec, $cst_turns__0)) {return Vector{3, $f__0};}
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