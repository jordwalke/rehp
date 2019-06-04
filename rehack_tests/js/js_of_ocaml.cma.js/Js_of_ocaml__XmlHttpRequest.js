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
var tB = [0,caml_new_string("lib/js_of_ocaml/xmlHttpRequest.ml"),125,75];
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
  function tC(x) {
    return caml_call1(caml_get_public_method(x, -1035517745, 307), x);
  }
  var tD = Js_of_ocaml_Js[50][1];
  var xmlHttpRequest = function(t8, param) {return t8.XMLHttpRequest;}(tD, tC);
  function tE(x) {
    return caml_call1(caml_get_public_method(x, -5445583, 308), x);
  }
  var tF = Js_of_ocaml_Js[50][1];
  var activeXObject = function(t7, param) {return t7.activeXObject;}(tF, tE);
  try {
    var tP = 0;
    var tQ = function(t6, param) {return new t6();}(xmlHttpRequest, tP);
    return tQ;
  }
  catch(tR) {
    try {
      var tM = 0;
      var tN = "Msxml2.XMLHTTP";
      var tO = function(t5, t4, param) {return new t5(t4);}(activeXObject, tN, tM
      );
      return tO;
    }
    catch(tS) {
      try {
        var tJ = 0;
        var tK = "Msxml3.XMLHTTP";
        var tL = function(t3, t2, param) {return new t3(t2);}(activeXObject, tK, tJ
        );
        return tL;
      }
      catch(tT) {
        try {
          var tG = 0;
          var tH = "Microsoft.XMLHTTP";
          var tI = function(t1, t0, param) {return new t1(t0);}(activeXObject, tH, tG
          );
          return tI;
        }
        catch(tU) {
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,tB]);
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