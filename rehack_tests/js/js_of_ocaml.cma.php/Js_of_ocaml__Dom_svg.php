<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Dom_svg.php
 */

namespace Rehack;

final class Js_of_ocaml__Dom_svg {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Not_found = Not_found::get();
    Js_of_ocaml__Dom_svg::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Dom_svg;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_vkern__0 = $string("vkern");
    $cst_view__0 = $string("view");
    $cst_use__0 = $string("use");
    $cst_tspan__0 = $string("tspan");
    $cst_tref__0 = $string("tref");
    $cst_title__0 = $string("title");
    $cst_textpath__0 = $string("textpath");
    $cst_text__0 = $string("text");
    $cst_symbol__0 = $string("symbol");
    $cst_switch__0 = $string("switch");
    $cst_svg__0 = $string("svg");
    $cst_style__0 = $string("style");
    $cst_stop__0 = $string("stop");
    $cst_set__0 = $string("set");
    $cst_script__0 = $string("script");
    $cst_rect__0 = $string("rect");
    $cst_radialgradient__0 = $string("radialgradient");
    $cst_polyline__0 = $string("polyline");
    $cst_polygon__0 = $string("polygon");
    $cst_pattern__0 = $string("pattern");
    $cst_path__0 = $string("path");
    $cst_mpath__0 = $string("mpath");
    $cst_missing_glyph__0 = $string("missing-glyph");
    $cst_metadata__0 = $string("metadata");
    $cst_mask__0 = $string("mask");
    $cst_lineargradient__0 = $string("lineargradient");
    $cst_line__0 = $string("line");
    $cst_image__0 = $string("image");
    $cst_hkern__0 = $string("hkern");
    $cst_glyphref__0 = $string("glyphref");
    $cst_glyph__0 = $string("glyph");
    $cst_g__0 = $string("g");
    $cst_foreignobject__0 = $string("foreignobject");
    $cst_font_face_uri__0 = $string("font-face-uri");
    $cst_font_face_src__0 = $string("font-face-src");
    $cst_font_face_name__0 = $string("font-face-name");
    $cst_font_face_format__0 = $string("font-face-format");
    $cst_font_face__0 = $string("font-face");
    $cst_font__0 = $string("font");
    $cst_filter__0 = $string("filter");
    $cst_ellipse__0 = $string("ellipse");
    $cst_desc__0 = $string("desc");
    $cst_defs__0 = $string("defs");
    $cst_cursor__0 = $string("cursor");
    $cst_clippath__0 = $string("clippath");
    $cst_circle__0 = $string("circle");
    $cst_animatetransform__0 = $string("animatetransform");
    $cst_animatemotion__0 = $string("animatemotion");
    $cst_animatecolor__0 = $string("animatecolor");
    $cst_animate__0 = $string("animate");
    $cst_altglyphitem__0 = $string("altglyphitem");
    $cst_altglyphdef__0 = $string("altglyphdef");
    $cst_altglyph__0 = $string("altglyph");
    $cst_a__0 = $string("a");
    $cst_vkern = $string("vkern");
    $cst_view = $string("view");
    $cst_use = $string("use");
    $cst_tspan = $string("tspan");
    $cst_tref = $string("tref");
    $cst_title = $string("title");
    $cst_textpath = $string("textpath");
    $cst_text = $string("text");
    $cst_symbol = $string("symbol");
    $cst_switch = $string("switch");
    $cst_svg = $string("svg");
    $cst_style = $string("style");
    $cst_stop = $string("stop");
    $cst_set = $string("set");
    $cst_script = $string("script");
    $cst_rect = $string("rect");
    $cst_radialgradient = $string("radialgradient");
    $cst_polyline = $string("polyline");
    $cst_polygon = $string("polygon");
    $cst_pattern = $string("pattern");
    $cst_path = $string("path");
    $cst_mpath = $string("mpath");
    $cst_missing_glyph = $string("missing-glyph");
    $cst_metadata = $string("metadata");
    $cst_mask = $string("mask");
    $cst_lineargradient = $string("lineargradient");
    $cst_line = $string("line");
    $cst_image = $string("image");
    $cst_hkern = $string("hkern");
    $cst_glyphref = $string("glyphref");
    $cst_glyph = $string("glyph");
    $cst_g = $string("g");
    $cst_foreignobject = $string("foreignobject");
    $cst_font_face_uri = $string("font-face-uri");
    $cst_font_face_src = $string("font-face-src");
    $cst_font_face_name = $string("font-face-name");
    $cst_font_face_format = $string("font-face-format");
    $cst_font_face = $string("font-face");
    $cst_font = $string("font");
    $cst_filter = $string("filter");
    $cst_ellipse = $string("ellipse");
    $cst_desc = $string("desc");
    $cst_defs = $string("defs");
    $cst_cursor = $string("cursor");
    $cst_clippath = $string("clippath");
    $cst_circle = $string("circle");
    $cst_animatetransform = $string("animatetransform");
    $cst_animatemotion = $string("animatemotion");
    $cst_animatecolor = $string("animatecolor");
    $cst_animate = $string("animate");
    $cst_altglyphitem = $string("altglyphitem");
    $cst_altglyphdef = $string("altglyphdef");
    $cst_altglyph = $string("altglyph");
    $cst_a = $string("a");
    $cst_Js_of_ocaml_Dom_svg_SVGError = $string(
      "Js_of_ocaml__Dom_svg.SVGError"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Not_found = $global_data["Not_found"];
    $xmlns = "http://www.w3.org/2000/svg";
    $SVGError = Vector{
      248,
      $cst_Js_of_ocaml_Dom_svg_SVGError,
      $runtime["caml_fresh_oo_id"](0)
    };
    $createElement = function(dynamic $doc, dynamic $name) use ($call1,$caml_get_public_method,$xmlns) {
      $q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -387984539, 288), $x);
      };
      $r = $name->toString();
      return (function(dynamic $t2, dynamic $t0, dynamic $t1, dynamic $param) {return $t2->createElementNS($t0, $t1);
       })($doc, $xmlns, $r, $q);
    };
    $unsafeCreateElement = function(dynamic $doc, dynamic $name) use ($createElement) {
      return $createElement($doc, $name);
    };
    $createA = function(dynamic $doc) use ($cst_a,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_a);
    };
    $createAltGlyph = function(dynamic $doc) use ($cst_altglyph,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_altglyph);
    };
    $createAltGlyphDef = function(dynamic $doc) use ($cst_altglyphdef,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_altglyphdef);
    };
    $createAltGlyphItem = function(dynamic $doc) use ($cst_altglyphitem,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_altglyphitem);
    };
    $createAnimate = function(dynamic $doc) use ($cst_animate,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_animate);
    };
    $createAnimateColor = function(dynamic $doc) use ($cst_animatecolor,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_animatecolor);
    };
    $createAnimateMotion = function(dynamic $doc) use ($cst_animatemotion,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_animatemotion);
    };
    $createAnimateTransform = function(dynamic $doc) use ($cst_animatetransform,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_animatetransform);
    };
    $createCircle = function(dynamic $doc) use ($cst_circle,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_circle);
    };
    $createClipPath = function(dynamic $doc) use ($cst_clippath,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_clippath);
    };
    $createCursor = function(dynamic $doc) use ($cst_cursor,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_cursor);
    };
    $createDefs = function(dynamic $doc) use ($cst_defs,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_defs);
    };
    $createDesc = function(dynamic $doc) use ($cst_desc,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_desc);
    };
    $createEllipse = function(dynamic $doc) use ($cst_ellipse,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_ellipse);
    };
    $createFilter = function(dynamic $doc) use ($cst_filter,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_filter);
    };
    $createFont = function(dynamic $doc) use ($cst_font,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font);
    };
    $createFontFace = function(dynamic $doc) use ($cst_font_face,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font_face);
    };
    $createFontFaceFormat = function(dynamic $doc) use ($cst_font_face_format,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font_face_format);
    };
    $createFontFaceName = function(dynamic $doc) use ($cst_font_face_name,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font_face_name);
    };
    $createFontFaceSrc = function(dynamic $doc) use ($cst_font_face_src,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font_face_src);
    };
    $createFontFaceUri = function(dynamic $doc) use ($cst_font_face_uri,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_font_face_uri);
    };
    $createForeignObject = function(dynamic $doc) use ($cst_foreignobject,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_foreignobject);
    };
    $createG = function(dynamic $doc) use ($cst_g,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_g);
    };
    $createGlyph = function(dynamic $doc) use ($cst_glyph,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_glyph);
    };
    $createGlyphRef = function(dynamic $doc) use ($cst_glyphref,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_glyphref);
    };
    $createhkern = function(dynamic $doc) use ($cst_hkern,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_hkern);
    };
    $createImage = function(dynamic $doc) use ($cst_image,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_image);
    };
    $createLineElement = function(dynamic $doc) use ($cst_line,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_line);
    };
    $createLinearElement = function(dynamic $doc) use ($cst_lineargradient,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_lineargradient);
    };
    $createMask = function(dynamic $doc) use ($cst_mask,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_mask);
    };
    $createMetaData = function(dynamic $doc) use ($cst_metadata,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_metadata);
    };
    $createMissingGlyph = function(dynamic $doc) use ($cst_missing_glyph,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_missing_glyph);
    };
    $createMPath = function(dynamic $doc) use ($cst_mpath,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_mpath);
    };
    $createPath = function(dynamic $doc) use ($cst_path,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_path);
    };
    $createPattern = function(dynamic $doc) use ($cst_pattern,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_pattern);
    };
    $createPolygon = function(dynamic $doc) use ($cst_polygon,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_polygon);
    };
    $createPolyline = function(dynamic $doc) use ($cst_polyline,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_polyline);
    };
    $createRadialgradient = function(dynamic $doc) use ($cst_radialgradient,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_radialgradient);
    };
    $createRect = function(dynamic $doc) use ($cst_rect,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_rect);
    };
    $createScript = function(dynamic $doc) use ($cst_script,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_script);
    };
    $createSet = function(dynamic $doc) use ($cst_set,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_set);
    };
    $createStop = function(dynamic $doc) use ($cst_stop,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_stop);
    };
    $createStyle = function(dynamic $doc) use ($cst_style,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_style);
    };
    $createSvg = function(dynamic $doc) use ($cst_svg,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_svg);
    };
    $createSwitch = function(dynamic $doc) use ($cst_switch,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_switch);
    };
    $createSymbol = function(dynamic $doc) use ($cst_symbol,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_symbol);
    };
    $createTextElement = function(dynamic $doc) use ($cst_text,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_text);
    };
    $createTextpath = function(dynamic $doc) use ($cst_textpath,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_textpath);
    };
    $createTitle = function(dynamic $doc) use ($cst_title,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_title);
    };
    $createTref = function(dynamic $doc) use ($cst_tref,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tref);
    };
    $createTspan = function(dynamic $doc) use ($cst_tspan,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_tspan);
    };
    $createUse = function(dynamic $doc) use ($cst_use,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_use);
    };
    $createView = function(dynamic $doc) use ($cst_view,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_view);
    };
    $createvkern = function(dynamic $doc) use ($cst_vkern,$unsafeCreateElement) {
      return $unsafeCreateElement($doc, $cst_vkern);
    };
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 946564599, 289), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $svg_element = (function(dynamic $t3, dynamic $param) {return $t3->SVGElement;
     })($b, $a);
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 454225691, 290), $x);
    };
    $d = $Js_of_ocaml_Js[50][1];
    $document = (function(dynamic $t4, dynamic $param) {return $t4->document;})($d, $c);
    $getElementById = function(dynamic $id) use ($Js_of_ocaml_Js,$Not_found,$call1,$call3,$caml_get_public_method,$runtime,$svg_element) {
      $i = function(dynamic $e) use ($Not_found,$runtime,$svg_element) {
        if (instance_of($e, $svg_element)) {return $e;}
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $j = function(dynamic $param) use ($Not_found,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -332188296, 291), $x);
      };
      $l = $id->toString();
      $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 454225691, 292), $x);
      };
      $n = $Js_of_ocaml_Js[50][1];
      $o = (function(dynamic $t5, dynamic $param) {return $t5->document;})($n, $m);
      $p = (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->getElementById($t6);
       })($o, $l, $k);
      return $call3($Js_of_ocaml_Js[5][7], $p, $j, $i);
    };
    $element = function(dynamic $e) use ($Js_of_ocaml_Js,$call1,$svg_element) {
      return instance_of($e, $svg_element)
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $unsafeCoerce = function(dynamic $e, dynamic $tag) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $e = $tag->toString();
      $f = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946097238, 293), $x);
      };
      $g = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 578170309, 294), $x);
      };
      $h = (function(dynamic $t8, dynamic $param) {return $t8->tagName;})($e, $g);
      return (function(dynamic $t9, dynamic $param) {return $t9->toLowerCase();
        })($h, $f) === $e
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $a__0 = function(dynamic $e) use ($cst_a__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_a__0);
    };
    $altGlyph = function(dynamic $e) use ($cst_altglyph__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_altglyph__0);
    };
    $altGlyphDef = function(dynamic $e) use ($cst_altglyphdef__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_altglyphdef__0);
    };
    $altGlyphItem = function(dynamic $e) use ($cst_altglyphitem__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_altglyphitem__0);
    };
    $animate = function(dynamic $e) use ($cst_animate__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_animate__0);
    };
    $animateColor = function(dynamic $e) use ($cst_animatecolor__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_animatecolor__0);
    };
    $animateMotion = function(dynamic $e) use ($cst_animatemotion__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_animatemotion__0);
    };
    $animateTransform = function(dynamic $e) use ($cst_animatetransform__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_animatetransform__0);
    };
    $circle = function(dynamic $e) use ($cst_circle__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_circle__0);
    };
    $clipPath = function(dynamic $e) use ($cst_clippath__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_clippath__0);
    };
    $cursor = function(dynamic $e) use ($cst_cursor__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_cursor__0);
    };
    $defs = function(dynamic $e) use ($cst_defs__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_defs__0);
    };
    $desc = function(dynamic $e) use ($cst_desc__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_desc__0);
    };
    $ellipse = function(dynamic $e) use ($cst_ellipse__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_ellipse__0);
    };
    $filter = function(dynamic $e) use ($cst_filter__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_filter__0);
    };
    $font = function(dynamic $e) use ($cst_font__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font__0);
    };
    $fontFace = function(dynamic $e) use ($cst_font_face__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font_face__0);
    };
    $fontFaceFormat = function(dynamic $e) use ($cst_font_face_format__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font_face_format__0);
    };
    $fontFaceName = function(dynamic $e) use ($cst_font_face_name__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font_face_name__0);
    };
    $fontFaceSrc = function(dynamic $e) use ($cst_font_face_src__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font_face_src__0);
    };
    $fontFaceUri = function(dynamic $e) use ($cst_font_face_uri__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_font_face_uri__0);
    };
    $foreignObject = function(dynamic $e) use ($cst_foreignobject__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_foreignobject__0);
    };
    $g = function(dynamic $e) use ($cst_g__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_g__0);
    };
    $glyph = function(dynamic $e) use ($cst_glyph__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_glyph__0);
    };
    $glyphRef = function(dynamic $e) use ($cst_glyphref__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_glyphref__0);
    };
    $hkern = function(dynamic $e) use ($cst_hkern__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_hkern__0);
    };
    $image = function(dynamic $e) use ($cst_image__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_image__0);
    };
    $lineElement = function(dynamic $e) use ($cst_line__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_line__0);
    };
    $linearElement = function(dynamic $e) use ($cst_lineargradient__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_lineargradient__0);
    };
    $mask = function(dynamic $e) use ($cst_mask__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_mask__0);
    };
    $metaData = function(dynamic $e) use ($cst_metadata__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_metadata__0);
    };
    $missingGlyph = function(dynamic $e) use ($cst_missing_glyph__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_missing_glyph__0);
    };
    $mPath = function(dynamic $e) use ($cst_mpath__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_mpath__0);
    };
    $path = function(dynamic $e) use ($cst_path__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_path__0);
    };
    $pattern = function(dynamic $e) use ($cst_pattern__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_pattern__0);
    };
    $polygon = function(dynamic $e) use ($cst_polygon__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_polygon__0);
    };
    $polyline = function(dynamic $e) use ($cst_polyline__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_polyline__0);
    };
    $radialgradient = function(dynamic $e) use ($cst_radialgradient__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_radialgradient__0);
    };
    $rect = function(dynamic $e) use ($cst_rect__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_rect__0);
    };
    $script = function(dynamic $e) use ($cst_script__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_script__0);
    };
    $set = function(dynamic $e) use ($cst_set__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_set__0);
    };
    $stop = function(dynamic $e) use ($cst_stop__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_stop__0);
    };
    $style = function(dynamic $e) use ($cst_style__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_style__0);
    };
    $svg = function(dynamic $e) use ($cst_svg__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_svg__0);
    };
    $switch__0 = function(dynamic $e) use ($cst_switch__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_switch__0);
    };
    $symbol = function(dynamic $e) use ($cst_symbol__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_symbol__0);
    };
    $textElement = function(dynamic $e) use ($cst_text__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_text__0);
    };
    $textpath = function(dynamic $e) use ($cst_textpath__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_textpath__0);
    };
    $title = function(dynamic $e) use ($cst_title__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_title__0);
    };
    $tref = function(dynamic $e) use ($cst_tref__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_tref__0);
    };
    $tspan = function(dynamic $e) use ($cst_tspan__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_tspan__0);
    };
    $use = function(dynamic $e) use ($cst_use__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_use__0);
    };
    $view = function(dynamic $e) use ($cst_view__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_view__0);
    };
    $vkern = function(dynamic $e) use ($cst_vkern__0,$unsafeCoerce) {
      return $unsafeCoerce($e, $cst_vkern__0);
    };
    $Js_of_ocaml_Dom_svg = Vector{
      0,
      $xmlns,
      $SVGError,
      $createElement,
      $createA,
      $createAltGlyph,
      $createAltGlyphDef,
      $createAltGlyphItem,
      $createAnimate,
      $createAnimateColor,
      $createAnimateMotion,
      $createAnimateTransform,
      $createCircle,
      $createClipPath,
      $createCursor,
      $createDefs,
      $createDesc,
      $createEllipse,
      $createFilter,
      $createFont,
      $createFontFace,
      $createFontFaceFormat,
      $createFontFaceName,
      $createFontFaceSrc,
      $createFontFaceUri,
      $createForeignObject,
      $createG,
      $createGlyph,
      $createGlyphRef,
      $createhkern,
      $createImage,
      $createLineElement,
      $createLinearElement,
      $createMask,
      $createMetaData,
      $createMissingGlyph,
      $createMPath,
      $createPath,
      $createPattern,
      $createPolygon,
      $createPolyline,
      $createRadialgradient,
      $createRect,
      $createScript,
      $createSet,
      $createStop,
      $createStyle,
      $createSvg,
      $createSwitch,
      $createSymbol,
      $createTextElement,
      $createTextpath,
      $createTitle,
      $createTref,
      $createTspan,
      $createUse,
      $createView,
      $createvkern,
      $svg_element,
      $document,
      $getElementById,
      Vector{
        0,
        $element,
        $a__0,
        $altGlyph,
        $altGlyphDef,
        $altGlyphItem,
        $animate,
        $animateColor,
        $animateMotion,
        $animateTransform,
        $circle,
        $clipPath,
        $cursor,
        $defs,
        $desc,
        $ellipse,
        $filter,
        $font,
        $fontFace,
        $fontFaceFormat,
        $fontFaceName,
        $fontFaceSrc,
        $fontFaceUri,
        $foreignObject,
        $g,
        $glyph,
        $glyphRef,
        $hkern,
        $image,
        $lineElement,
        $linearElement,
        $mask,
        $metaData,
        $missingGlyph,
        $mPath,
        $path,
        $pattern,
        $polygon,
        $polyline,
        $radialgradient,
        $rect,
        $script,
        $set,
        $stop,
        $style,
        $svg,
        $switch__0,
        $symbol,
        $textElement,
        $textpath,
        $title,
        $tref,
        $tspan,
        $use,
        $view,
        $vkern
      }
    };
    
    $runtime["caml_register_global"](
      119,
      $Js_of_ocaml_Dom_svg,
      "Js_of_ocaml__Dom_svg"
    );

  }
}

