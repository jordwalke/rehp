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
var tC = [0,string("lib/js_of_ocaml/xmlHttpRequest.ml"),125,75];
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
  function tD(x) {
    return call1(caml_get_public_method(x, -1035517745, 307), x);
  }
  var tE = Js_of_ocaml_Js[50][1];
  var xmlHttpRequest = function(t8, param) {return t8.XMLHttpRequest;}(tE, tD);
  function tF(x) {return call1(caml_get_public_method(x, -5445583, 308), x);}
  var tG = Js_of_ocaml_Js[50][1];
  var activeXObject = function(t7, param) {return t7.activeXObject;}(tG, tF);
  try {
    var tQ = 0;
    var tR = function(t6, param) {return new t6();}(xmlHttpRequest, tQ);
    return tR;
  }
  catch(tS) {
    try {
      var tN = 0;
      var tO = "Msxml2.XMLHTTP";
      var tP = function(t5, t4, param) {return new t5(t4);}(activeXObject, tO, tN
      );
      return tP;
    }
    catch(tT) {
      try {
        var tK = 0;
        var tL = "Msxml3.XMLHTTP";
        var tM = function(t3, t2, param) {return new t3(t2);}(activeXObject, tL, tK
        );
        return tM;
      }
      catch(tU) {
        try {
          var tH = 0;
          var tI = "Microsoft.XMLHTTP";
          var tJ = function(t1, t0, param) {return new t1(t0);}(activeXObject, tI, tH
          );
          return tJ;
        }
        catch(tV) {
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,tC]);
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