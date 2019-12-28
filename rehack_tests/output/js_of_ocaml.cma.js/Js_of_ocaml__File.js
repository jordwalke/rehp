/**
 * @flow strict
 * Js_of_ocaml__File
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var string__0 = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_can_t_retrieve_file_name_not_implemented = string__0(
  "can't retrieve file name: not implemented"
);
var cst_endings = string__0("endings");
var cst_type = string__0("type");
var cst_loadstart = string__0("loadstart");
var cst_progress = string__0("progress");
var cst_abort = string__0("abort");
var cst_error = string__0("error");
var cst_load = string__0("load");
var cst_loadend = string__0("loadend");
var Js_of_ocaml_Typed_array = require("./Js_of_ocaml__Typed_array.js");
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Pervasives = require("../stdlib.cma.js/Pervasives.js");
var List = require("../stdlib.cma.js/List.js");
var Array = require("../stdlib.cma.js/Array.js");
var Js_of_ocaml_Dom = require("./Js_of_ocaml__Dom.js");
var c_ = [0,string__0("transparent")];
var d_ = [0,string__0("native")];

function a_(x) {return call1(caml_get_public_method(x, -553417380, 62), x);}

var b_ = Js_of_ocaml_Js[50][1];
var blob_constr = function(t0, param) {return t0.Blob;}(b_, a_);

function filter_map(f, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var q = param__0[2];
      var v = param__0[1];
      var match = call1(f, v);
      if (match) {var v__0 = match[1];return [0,v__0,filter_map(f, q)];}
      var param__0 = q;
      continue;
    }
    return 0;
  }
}

function make_blob_options(contentType, endings) {
  var r_ = 0;
  if (endings) {
    var s_ = 116179762 <= endings[1] ? c_ : d_;
    var t_ = s_;
  }
  else var t_ = 0;
  var u_ = [0,[0,cst_type,contentType],[0,[0,cst_endings,t_],r_]];
  var options = filter_map(
    function(param) {
      var v = param[2];
      var name = param[1];
      if (v) {var v__0 = v[1];return [0,[0,name,v__0.toString()]];}
      return 0;
    },
    u_
  );
  return options ?
    runtime["caml_js_object"](call1(Array[12], options)) :
    Js_of_ocaml_Js[3];
}

function blob_raw(contentType, endings, a) {
  var options = make_blob_options(contentType, endings);
  var p_ = 0;
  var q_ = runtime["caml_js_from_array"](a);
  return function(t3, t1, t2, param) {return new t3(t1, t2);}(blob_constr, q_, options, p_
  );
}

function blob_from_string(contentType, endings, s) {
  return blob_raw(contentType, endings, [0,s.toString()]);
}

function blob_from_any(contentType, endings, l) {
  function n_(param) {
    var o_ = param[1];
    if (155580615 === o_) {var s = param[2];return s;}
    if (486041214 <= o_) {
      if (1037850489 <= o_) {var a = param[2];return a;}
      var a__0 = param[2];
      return a__0;
    }
    if (288368849 <= o_) {var s__0 = param[2];return s__0.toString();}
    var b = param[2];
    return b;
  }
  var l__0 = call2(List[17], n_, l);
  return blob_raw(contentType, endings, call1(Array[12], l__0));
}

function filename(file) {
  function j_(x) {return call1(caml_get_public_method(x, -922783157, 63), x);}
  var k_ = function(t5, param) {return t5.name;}(file, j_);
  var match = call1(Js_of_ocaml_Js[6][10], k_);
  if (match) {var name = match[1];return name;}
  function l_(x) {return call1(caml_get_public_method(x, -498902297, 64), x);}
  var m_ = function(t4, param) {return t4.fileName;}(file, l_);
  var match__0 = call1(Js_of_ocaml_Js[6][10], m_);
  if (match__0) {var name__0 = match__0[1];return name__0;}
  return call1(Pervasives[2], cst_can_t_retrieve_file_name_not_implemented);
}

function e_(x) {return call1(caml_get_public_method(x, 1012572826, 65), x);}

var f_ = Js_of_ocaml_Js[50][1];
var doc_constr = function(t6, param) {return t6.Document;}(f_, e_);

function document(e) {
  return e instanceof doc_constr ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function blob(e) {
  return e instanceof blob_constr ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function string(e) {
  return runtime["caml_equal"](typeof e, "string") ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

function arrayBuffer(e) {
  return e instanceof Js_of_ocaml_Typed_array[1] ?
    call1(Js_of_ocaml_Js[2], e) :
    Js_of_ocaml_Js[1];
}

var loadstart = call1(Js_of_ocaml_Dom[14][1], cst_loadstart);
var progress = call1(Js_of_ocaml_Dom[14][1], cst_progress);
var abort = call1(Js_of_ocaml_Dom[14][1], cst_abort);
var error = call1(Js_of_ocaml_Dom[14][1], cst_error);
var load = call1(Js_of_ocaml_Dom[14][1], cst_load);
var loadend = call1(Js_of_ocaml_Dom[14][1], cst_loadend);
var ReaderEvent = [0,loadstart,progress,abort,error,load,loadend];

function g_(x) {return call1(caml_get_public_method(x, 642825758, 66), x);}

var h_ = Js_of_ocaml_Js[50][1];
var fileReader = function(t7, param) {return t7.FileReader;}(h_, g_);
var addEventListener = Js_of_ocaml_Dom[15];
var Js_of_ocaml_File = [
  0,
  blob_from_string,
  blob_from_any,
  [0,document,blob,function(i_) {return i_;},string,arrayBuffer],
  ReaderEvent,
  filename,
  fileReader,
  addEventListener
];

exports = Js_of_ocaml_File;

/*::type Exports = {
  blob_from_string: (contentType: any, endings: any, s: any) => any,
  blob_from_any: (contentType: any, endings: any, l: any) => any,
  ReaderEvent: any,
  filename: (file: any) => any,
  fileReader: any,
  addEventListener: any,
}*/
/** @type {{
  blob_from_string: (contentType: any, endings: any, s: any) => any,
  blob_from_any: (contentType: any, endings: any, l: any) => any,
  ReaderEvent: any,
  filename: (file: any) => any,
  fileReader: any,
  addEventListener: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.blob_from_string = module.exports[1];
module.exports.blob_from_any = module.exports[2];
module.exports.ReaderEvent = module.exports[4];
module.exports.filename = module.exports[5];
module.exports.fileReader = module.exports[6];
module.exports.addEventListener = module.exports[7];

/* Hashing disabled */
