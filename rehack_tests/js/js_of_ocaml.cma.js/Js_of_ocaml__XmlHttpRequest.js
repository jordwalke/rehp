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
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_readystatechange = caml_new_string("readystatechange");
var cst_loadstart = caml_new_string("loadstart");
var cst_progress = caml_new_string("progress");
var cst_abort = caml_new_string("abort");
var cst_error = caml_new_string("error");
var cst_load = caml_new_string("load");
var cst_timeout = caml_new_string("timeout");
var cst_loadend = caml_new_string("loadend");
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Js_of_ocaml_Dom = global_data["Js_of_ocaml__Dom"];
var tA = [0,caml_new_string("lib/js_of_ocaml/xmlHttpRequest.ml"),125,75];
var readystatechange = caml_call1(Js_of_ocaml_Dom[14][1], cst_readystatechange
);
var loadstart = caml_call1(Js_of_ocaml_Dom[14][1], cst_loadstart);
var progress = caml_call1(Js_of_ocaml_Dom[14][1], cst_progress);
var abort = caml_call1(Js_of_ocaml_Dom[14][1], cst_abort);
var error = caml_call1(Js_of_ocaml_Dom[14][1], cst_error);
var load = caml_call1(Js_of_ocaml_Dom[14][1], cst_load);
var timeout = caml_call1(Js_of_ocaml_Dom[14][1], cst_timeout);
var loadend = caml_call1(Js_of_ocaml_Dom[14][1], cst_loadend);
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
  function tB(x) {
    return caml_call1(caml_get_public_method(x, -1035517745, 307), x);
  }
  var tC = Js_of_ocaml_Js[50][1];
  var xmlHttpRequest = function(t8, param) {return t8.XMLHttpRequest;}(tC, tB);
  function tD(x) {
    return caml_call1(caml_get_public_method(x, -5445583, 308), x);
  }
  var tE = Js_of_ocaml_Js[50][1];
  var activeXObject = function(t7, param) {return t7.activeXObject;}(tE, tD);
  try {
    var tO = 0;
    var tP = function(t6, param) {return new t6();}(xmlHttpRequest, tO);
    return tP;
  }
  catch(tQ) {
    try {
      var tL = 0;
      var tM = "Msxml2.XMLHTTP";
      var tN = function(t5, t4, param) {return new t5(t4);}(activeXObject, tM, tL
      );
      return tN;
    }
    catch(tR) {
      try {
        var tI = 0;
        var tJ = "Msxml3.XMLHTTP";
        var tK = function(t3, t2, param) {return new t3(t2);}(activeXObject, tJ, tI
        );
        return tK;
      }
      catch(tS) {
        try {
          var tF = 0;
          var tG = "Microsoft.XMLHTTP";
          var tH = function(t1, t0, param) {return new t1(t0);}(activeXObject, tG, tF
          );
          return tH;
        }
        catch(tT) {
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,tA]);
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