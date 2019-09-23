/**
 * Js_of_ocaml__XmlHttpRequest
 * @providesModule Js_of_ocaml__XmlHttpRequest
 */
"use strict";
var Js_of_ocaml__Dom = require('Js_of_ocaml__Dom.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_readystatechange = string("readystatechange");
var cst_loadstart = string("loadstart");
var cst_progress = string("progress");
var cst_abort = string("abort");
var cst_error = string("error");
var cst_load = string("load");
var cst_timeout = string("timeout");
var cst_loadend = string("loadend");
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Js_of_ocaml_Dom = global_data["Js_of_ocaml__Dom"];
var a = [0,string("lib/js_of_ocaml/xmlHttpRequest.ml"),125,75];
var readystatechange = call1(Js_of_ocaml_Dom[14][1], cst_readystatechange);
var loadstart = call1(Js_of_ocaml_Dom[14][1], cst_loadstart);
var progress = call1(Js_of_ocaml_Dom[14][1], cst_progress);
var abort = call1(Js_of_ocaml_Dom[14][1], cst_abort);
var error = call1(Js_of_ocaml_Dom[14][1], cst_error);
var load = call1(Js_of_ocaml_Dom[14][1], cst_load);
var timeout = call1(Js_of_ocaml_Dom[14][1], cst_timeout);
var loadend = call1(Js_of_ocaml_Dom[14][1], cst_loadend);
var Event = [
  0,
  readystatechange,
  loadstart,
  progress,
  abort,
  error,
  load,
  timeout,
  loadend
];

function create(param) {
  function b(x) {
    return call1(caml_get_public_method(x, -1035517745, 201), x);
  }
  var c = Js_of_ocaml_Js[50][1];
  var xmlHttpRequest = function(t8, param) {return t8.XMLHttpRequest;}(c, b);
  function d(x) {return call1(caml_get_public_method(x, -5445583, 202), x);}
  var e = Js_of_ocaml_Js[50][1];
  var activeXObject = function(t7, param) {return t7.activeXObject;}(e, d);
  try {
    var o = 0;
    var p = function(t6, param) {return new t6();}(xmlHttpRequest, o);
    return p;
  }
  catch(q) {
    try {
      var l = 0;
      var m = "Msxml2.XMLHTTP";
      var n = function(t5, t4, param) {return new t5(t4);}(activeXObject, m, l
      );
      return n;
    }
    catch(r) {
      try {
        var i = 0;
        var j = "Msxml3.XMLHTTP";
        var k = function(t3, t2, param) {return new t3(t2);}(activeXObject, j, i
        );
        return k;
      }
      catch(s) {
        try {
          var f = 0;
          var g = "Microsoft.XMLHTTP";
          var h = function(t1, t0, param) {return new t1(t0);}(activeXObject, g, f
          );
          return h;
        }
        catch(t) {
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,a]);
        }
      }
    }
  }
}

var Js_of_ocaml_XmlHttpRequest = [0,create,Event];

runtime["caml_register_global"](
  17,
  Js_of_ocaml_XmlHttpRequest,
  "Js_of_ocaml__XmlHttpRequest"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__XmlHttpRequest;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
