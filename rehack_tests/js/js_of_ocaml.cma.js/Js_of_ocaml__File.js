/**
 * Js_of_ocaml__File
 * @providesModule Js_of_ocaml__File
 */
"use strict";
var Array_ = require('Array_.js');
var Js_of_ocaml__Dom = require('Js_of_ocaml__Dom.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Js_of_ocaml__Typed_array = require('Js_of_ocaml__Typed_array.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var string__0 = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
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
var Js_of_ocaml_Typed_array = global_data["Js_of_ocaml__Typed_array"];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var Array = global_data["Array_"];
var Js_of_ocaml_Dom = global_data["Js_of_ocaml__Dom"];
var go = [0,string__0("transparent")];
var gp = [0,string__0("native")];

function gm(x) {return call1(caml_get_public_method(x, -553417380, 86), x);}

var gn = Js_of_ocaml_Js[50][1];
var blob_constr = function(t0, param) {return t0.Blob;}(gn, gm);

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
  var gD = 0;
  if (endings) {
    var gE = 116179762 <= endings[1] ? go : gp;
    var gF = gE;
  }
  else var gF = 0;
  var gG = [0,[0,cst_type,contentType],[0,[0,cst_endings,gF],gD]];
  var options = filter_map(
    function(param) {
      var v = param[2];
      var name = param[1];
      if (v) {var v__0 = v[1];return [0,[0,name,v__0.toString()]];}
      return 0;
    },
    gG
  );
  return options ?
    runtime["caml_js_object"](call1(Array[12], options)) :
    Js_of_ocaml_Js[3];
}

function blob_raw(contentType, endings, a) {
  var options = make_blob_options(contentType, endings);
  var gB = 0;
  var gC = runtime["caml_js_from_array"](a);
  return function(t3, t1, t2, param) {return new t3(t1, t2);}(blob_constr, gC, options, gB
  );
}

function blob_from_string(contentType, endings, s) {
  return blob_raw(contentType, endings, [0,s.toString()]);
}

function blob_from_any(contentType, endings, l) {
  function gz(param) {
    var gA = param[1];
    if (155580615 === gA) {var s = param[2];return s;}
    if (486041214 <= gA) {
      if (1037850489 <= gA) {var a = param[2];return a;}
      var a__0 = param[2];
      return a__0;
    }
    if (288368849 <= gA) {var s__0 = param[2];return s__0.toString();}
    var b = param[2];
    return b;
  }
  var l__0 = call2(List[17], gz, l);
  return blob_raw(contentType, endings, call1(Array[12], l__0));
}

function filename(file) {
  function gv(x) {return call1(caml_get_public_method(x, -922783157, 87), x);}
  var gw = function(t5, param) {return t5.name;}(file, gv);
  var match = call1(Js_of_ocaml_Js[6][10], gw);
  if (match) {var name = match[1];return name;}
  function gx(x) {return call1(caml_get_public_method(x, -498902297, 88), x);}
  var gy = function(t4, param) {return t4.fileName;}(file, gx);
  var match__0 = call1(Js_of_ocaml_Js[6][10], gy);
  if (match__0) {var name__0 = match__0[1];return name__0;}
  return call1(Pervasives[2], cst_can_t_retrieve_file_name_not_implemented);
}

function gq(x) {return call1(caml_get_public_method(x, 1012572826, 89), x);}

var gr = Js_of_ocaml_Js[50][1];
var doc_constr = function(t6, param) {return t6.Document;}(gr, gq);

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

function gs(x) {return call1(caml_get_public_method(x, 642825758, 90), x);}

var gt = Js_of_ocaml_Js[50][1];
var fileReader = function(t7, param) {return t7.FileReader;}(gt, gs);
var addEventListener = Js_of_ocaml_Dom[15];
var Js_of_ocaml_File = [
  0,
  blob_from_string,
  blob_from_any,
  [0,document,blob,function(gu) {return gu;},string,arrayBuffer],
  ReaderEvent,
  filename,
  fileReader,
  addEventListener
];

runtime["caml_register_global"](23, Js_of_ocaml_File, "Js_of_ocaml__File");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__File;