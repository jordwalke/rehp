<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom_svg {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
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
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Not_found =  Not_found::get ();
    $xmlns = "http://www.w3.org/2000/svg";
    $SVGError = Vector{
      248,
      $cst_Js_of_ocaml_Dom_svg_SVGError,
      $runtime["caml_fresh_oo_id"](0)
    };
    $createElement = (dynamic $doc, dynamic $name) ==> {
      $q_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -387984539, 288), $x);
      };
      $r_ = $name->toString();
      return ((dynamic $t2, dynamic $t0, dynamic $t1, dynamic $param) ==> {return $t2->createElementNS($t0, $t1);
       })($doc, $xmlns, $r_, $q_);
    };
    $unsafeCreateElement = (dynamic $doc, dynamic $name) ==> {
      return $createElement($doc, $name);
    };
    $createA = (dynamic $doc) ==> {return $unsafeCreateElement($doc, $cst_a);};
    $createAltGlyph = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_altglyph);
    };
    $createAltGlyphDef = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_altglyphdef);
    };
    $createAltGlyphItem = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_altglyphitem);
    };
    $createAnimate = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_animate);
    };
    $createAnimateColor = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_animatecolor);
    };
    $createAnimateMotion = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_animatemotion);
    };
    $createAnimateTransform = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_animatetransform);
    };
    $createCircle = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_circle);
    };
    $createClipPath = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_clippath);
    };
    $createCursor = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_cursor);
    };
    $createDefs = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_defs);
    };
    $createDesc = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_desc);
    };
    $createEllipse = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_ellipse);
    };
    $createFilter = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_filter);
    };
    $createFont = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font);
    };
    $createFontFace = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font_face);
    };
    $createFontFaceFormat = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font_face_format);
    };
    $createFontFaceName = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font_face_name);
    };
    $createFontFaceSrc = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font_face_src);
    };
    $createFontFaceUri = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_font_face_uri);
    };
    $createForeignObject = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_foreignobject);
    };
    $createG = (dynamic $doc) ==> {return $unsafeCreateElement($doc, $cst_g);};
    $createGlyph = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_glyph);
    };
    $createGlyphRef = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_glyphref);
    };
    $createhkern = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_hkern);
    };
    $createImage = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_image);
    };
    $createLineElement = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_line);
    };
    $createLinearElement = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_lineargradient);
    };
    $createMask = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_mask);
    };
    $createMetaData = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_metadata);
    };
    $createMissingGlyph = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_missing_glyph);
    };
    $createMPath = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_mpath);
    };
    $createPath = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_path);
    };
    $createPattern = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_pattern);
    };
    $createPolygon = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_polygon);
    };
    $createPolyline = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_polyline);
    };
    $createRadialgradient = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_radialgradient);
    };
    $createRect = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_rect);
    };
    $createScript = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_script);
    };
    $createSet = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_set);
    };
    $createStop = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_stop);
    };
    $createStyle = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_style);
    };
    $createSvg = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_svg);
    };
    $createSwitch = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_switch);
    };
    $createSymbol = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_symbol);
    };
    $createTextElement = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_text);
    };
    $createTextpath = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_textpath);
    };
    $createTitle = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_title);
    };
    $createTref = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_tref);
    };
    $createTspan = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_tspan);
    };
    $createUse = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_use);
    };
    $createView = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_view);
    };
    $createvkern = (dynamic $doc) ==> {
      return $unsafeCreateElement($doc, $cst_vkern);
    };
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 946564599, 289), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $svg_element = ((dynamic $t3, dynamic $param) ==> {return $t3->SVGElement;
     })($b_, $a_);
    $c_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 454225691, 290), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $document = ((dynamic $t4, dynamic $param) ==> {return $t4->document;})($d_, $c_);
    $getElementById = (dynamic $id) ==> {
      $i_ = (dynamic $e) ==> {
        if (instance_of($e, $svg_element)) {return $e;}
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      };
      $j_ = (dynamic $param) ==> {
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      };
      $k_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -332188296, 291), $x);
      };
      $l_ = $id->toString();
      $m_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 454225691, 292), $x);
      };
      $n_ = $Js_of_ocaml_Js[50][1];
      $o_ = ((dynamic $t5, dynamic $param) ==> {return $t5->document;})($n_, $m_);
      $p_ = ((dynamic $t7, dynamic $t6, dynamic $param) ==> {return $t7->getElementById($t6);
       })($o_, $l_, $k_);
      return $call3($Js_of_ocaml_Js[5][7], $p_, $j_, $i_);
    };
    $element = (dynamic $e) ==> {
      return instance_of($e, $svg_element)
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $unsafeCoerce = (dynamic $e, dynamic $tag) ==> {
      $e_ = $tag->toString();
      $f_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 946097238, 293), $x);
      };
      $g_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 578170309, 294), $x);
      };
      $h_ = ((dynamic $t8, dynamic $param) ==> {return $t8->tagName;})($e, $g_);
      return ((dynamic $t9, dynamic $param) ==> {return $t9->toLowerCase();})($h_, $f_) === $e_
        ? $call1($Js_of_ocaml_Js[2], $e)
        : ($Js_of_ocaml_Js[1]);
    };
    $a = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_a__0);};
    $altGlyph = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_altglyph__0);};
    $altGlyphDef = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_altglyphdef__0);
    };
    $altGlyphItem = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_altglyphitem__0);
    };
    $animate = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_animate__0);};
    $animateColor = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_animatecolor__0);
    };
    $animateMotion = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_animatemotion__0);
    };
    $animateTransform = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_animatetransform__0);
    };
    $circle = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_circle__0);};
    $clipPath = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_clippath__0);};
    $cursor = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_cursor__0);};
    $defs = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_defs__0);};
    $desc = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_desc__0);};
    $ellipse = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_ellipse__0);};
    $filter = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_filter__0);};
    $font = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_font__0);};
    $fontFace = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_font_face__0);
    };
    $fontFaceFormat = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_font_face_format__0);
    };
    $fontFaceName = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_font_face_name__0);
    };
    $fontFaceSrc = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_font_face_src__0);
    };
    $fontFaceUri = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_font_face_uri__0);
    };
    $foreignObject = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_foreignobject__0);
    };
    $g = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_g__0);};
    $glyph = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_glyph__0);};
    $glyphRef = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_glyphref__0);};
    $hkern = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_hkern__0);};
    $image = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_image__0);};
    $lineElement = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_line__0);};
    $linearElement = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_lineargradient__0);
    };
    $mask = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_mask__0);};
    $metaData = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_metadata__0);};
    $missingGlyph = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_missing_glyph__0);
    };
    $mPath = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_mpath__0);};
    $path = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_path__0);};
    $pattern = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_pattern__0);};
    $polygon = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_polygon__0);};
    $polyline = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_polyline__0);};
    $radialgradient = (dynamic $e) ==> {
      return $unsafeCoerce($e, $cst_radialgradient__0);
    };
    $rect = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_rect__0);};
    $script = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_script__0);};
    $set = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_set__0);};
    $stop = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_stop__0);};
    $style = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_style__0);};
    $svg = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_svg__0);};
    $switch__0 = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_switch__0);};
    $symbol = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_symbol__0);};
    $textElement = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_text__0);};
    $textpath = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_textpath__0);};
    $title = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_title__0);};
    $tref = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_tref__0);};
    $tspan = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_tspan__0);};
    $use = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_use__0);};
    $view = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_view__0);};
    $vkern = (dynamic $e) ==> {return $unsafeCoerce($e, $cst_vkern__0);};
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
        $a,
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
    
     return ($Js_of_ocaml_Dom_svg);

  }
  public static function xmlns(): dynamic {
    return static::get()[1]();
  }
  public static function SVGError(): dynamic {
    return static::get()[2]();
  }
  public static function createElement(dynamic $doc, dynamic $name): dynamic {
    return static::get()[3]($doc, $name);
  }
  public static function createA(dynamic $doc): dynamic {
    return static::get()[4]($doc);
  }
  public static function createAltGlyph(dynamic $doc): dynamic {
    return static::get()[5]($doc);
  }
  public static function createAltGlyphDef(dynamic $doc): dynamic {
    return static::get()[6]($doc);
  }
  public static function createAltGlyphItem(dynamic $doc): dynamic {
    return static::get()[7]($doc);
  }
  public static function createAnimate(dynamic $doc): dynamic {
    return static::get()[8]($doc);
  }
  public static function createAnimateColor(dynamic $doc): dynamic {
    return static::get()[9]($doc);
  }
  public static function createAnimateMotion(dynamic $doc): dynamic {
    return static::get()[10]($doc);
  }
  public static function createAnimateTransform(dynamic $doc): dynamic {
    return static::get()[11]($doc);
  }
  public static function createCircle(dynamic $doc): dynamic {
    return static::get()[12]($doc);
  }
  public static function createClipPath(dynamic $doc): dynamic {
    return static::get()[13]($doc);
  }
  public static function createCursor(dynamic $doc): dynamic {
    return static::get()[14]($doc);
  }
  public static function createDefs(dynamic $doc): dynamic {
    return static::get()[15]($doc);
  }
  public static function createDesc(dynamic $doc): dynamic {
    return static::get()[16]($doc);
  }
  public static function createEllipse(dynamic $doc): dynamic {
    return static::get()[17]($doc);
  }
  public static function createFilter(dynamic $doc): dynamic {
    return static::get()[18]($doc);
  }
  public static function createFont(dynamic $doc): dynamic {
    return static::get()[19]($doc);
  }
  public static function createFontFace(dynamic $doc): dynamic {
    return static::get()[20]($doc);
  }
  public static function createFontFaceFormat(dynamic $doc): dynamic {
    return static::get()[21]($doc);
  }
  public static function createFontFaceName(dynamic $doc): dynamic {
    return static::get()[22]($doc);
  }
  public static function createFontFaceSrc(dynamic $doc): dynamic {
    return static::get()[23]($doc);
  }
  public static function createFontFaceUri(dynamic $doc): dynamic {
    return static::get()[24]($doc);
  }
  public static function createForeignObject(dynamic $doc): dynamic {
    return static::get()[25]($doc);
  }
  public static function createG(dynamic $doc): dynamic {
    return static::get()[26]($doc);
  }
  public static function createGlyph(dynamic $doc): dynamic {
    return static::get()[27]($doc);
  }
  public static function createGlyphRef(dynamic $doc): dynamic {
    return static::get()[28]($doc);
  }
  public static function createhkern(dynamic $doc): dynamic {
    return static::get()[29]($doc);
  }
  public static function createImage(dynamic $doc): dynamic {
    return static::get()[30]($doc);
  }
  public static function createLineElement(dynamic $doc): dynamic {
    return static::get()[31]($doc);
  }
  public static function createLinearElement(dynamic $doc): dynamic {
    return static::get()[32]($doc);
  }
  public static function createMask(dynamic $doc): dynamic {
    return static::get()[33]($doc);
  }
  public static function createMetaData(dynamic $doc): dynamic {
    return static::get()[34]($doc);
  }
  public static function createMissingGlyph(dynamic $doc): dynamic {
    return static::get()[35]($doc);
  }
  public static function createMPath(dynamic $doc): dynamic {
    return static::get()[36]($doc);
  }
  public static function createPath(dynamic $doc): dynamic {
    return static::get()[37]($doc);
  }
  public static function createPattern(dynamic $doc): dynamic {
    return static::get()[38]($doc);
  }
  public static function createPolygon(dynamic $doc): dynamic {
    return static::get()[39]($doc);
  }
  public static function createPolyline(dynamic $doc): dynamic {
    return static::get()[40]($doc);
  }
  public static function createRadialgradient(dynamic $doc): dynamic {
    return static::get()[41]($doc);
  }
  public static function createRect(dynamic $doc): dynamic {
    return static::get()[42]($doc);
  }
  public static function createScript(dynamic $doc): dynamic {
    return static::get()[43]($doc);
  }
  public static function createSet(dynamic $doc): dynamic {
    return static::get()[44]($doc);
  }
  public static function createStop(dynamic $doc): dynamic {
    return static::get()[45]($doc);
  }
  public static function createStyle(dynamic $doc): dynamic {
    return static::get()[46]($doc);
  }
  public static function createSvg(dynamic $doc): dynamic {
    return static::get()[47]($doc);
  }
  public static function createSwitch(dynamic $doc): dynamic {
    return static::get()[48]($doc);
  }
  public static function createSymbol(dynamic $doc): dynamic {
    return static::get()[49]($doc);
  }
  public static function createTextElement(dynamic $doc): dynamic {
    return static::get()[50]($doc);
  }
  public static function createTextpath(dynamic $doc): dynamic {
    return static::get()[51]($doc);
  }
  public static function createTitle(dynamic $doc): dynamic {
    return static::get()[52]($doc);
  }
  public static function createTref(dynamic $doc): dynamic {
    return static::get()[53]($doc);
  }
  public static function createTspan(dynamic $doc): dynamic {
    return static::get()[54]($doc);
  }
  public static function createUse(dynamic $doc): dynamic {
    return static::get()[55]($doc);
  }
  public static function createView(dynamic $doc): dynamic {
    return static::get()[56]($doc);
  }
  public static function createvkern(dynamic $doc): dynamic {
    return static::get()[57]($doc);
  }
  public static function svg_element(): dynamic {
    return static::get()[58]();
  }
  public static function document(): dynamic {
    return static::get()[59]();
  }
  public static function getElementById(dynamic $id): dynamic {
    return static::get()[60]($id);
  }

}
/* Hashing disabled */
