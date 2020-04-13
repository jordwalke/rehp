/**
 * @flow strict
 * Stdlib__bigarray
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var caml_ba_change_layout = runtime["caml_ba_change_layout"];
var caml_ba_create = runtime["caml_ba_create"];
var caml_ba_dim_1 = runtime["caml_ba_dim_1"];
var caml_ba_dim_2 = runtime["caml_ba_dim_2"];
var caml_ba_kind = runtime["caml_ba_kind"];
var caml_ba_num_dims = runtime["caml_ba_num_dims"];
var caml_ba_reshape = runtime["caml_ba_reshape"];
var caml_ba_slice = runtime["caml_ba_slice"];
var caml_check_bound = runtime["caml_check_bound"];
var caml_mul = runtime["caml_mul"];
var string = runtime["caml_new_string"];
var cst_Bigarray_array3_of_genarray = string("Bigarray.array3_of_genarray");
var cst_Bigarray_array2_of_genarray = string("Bigarray.array2_of_genarray");
var cst_Bigarray_array1_of_genarray = string("Bigarray.array1_of_genarray");
var cst_Bigarray_array0_of_genarray = string("Bigarray.array0_of_genarray");
var cst_Bigarray_Array3_of_array_non_cubic_data = string(
  "Bigarray.Array3.of_array: non-cubic data"
);
var cst_Bigarray_Array3_of_array_non_cubic_data__0 = string(
  "Bigarray.Array3.of_array: non-cubic data"
);
var cst_Bigarray_Array2_of_array_non_rectangular_data = string(
  "Bigarray.Array2.of_array: non-rectangular data"
);
var Stdlib = require("./Stdlib.js");
var Stdlib_array = require("./Stdlib__array.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var float32 = 0;
var float64 = 1;
var int8_signed = 2;
var int8_unsigned = 3;
var int16_signed = 4;
var int16_unsigned = 5;
var int32 = 6;
var int64 = 7;
var int__0 = 8;
var nativeint = 9;
var complex32 = 10;
var complex64 = 11;
var char__0 = 12;

function kind_size_in_bytes(param) {
  switch (param) {
    case 0:
      return 4;
    case 1:
      return 8;
    case 2:
      return 1;
    case 3:
      return 1;
    case 4:
      return 2;
    case 5:
      return 2;
    case 6:
      return 4;
    case 7:
      return 8;
    case 8:
      return Stdlib_sys[10] / 8 | 0;
    case 9:
      return Stdlib_sys[10] / 8 | 0;
    case 10:
      return 8;
    case 11:
      return 16;
    default:return 1
    }
}

var c_layout = 0;
var fortran_layout = 1;

function dims(a) {
  var i;
  var aa_;
  var ab_;
  var n = caml_ba_num_dims(a);
  var d = runtime["caml_make_vect"](n, 0);
  var Z_ = n + -1 | 0;
  var Y_ = 0;
  if (! (Z_ < 0)) {
    i = Y_;
    for (; ; ) {
      aa_ = runtime["caml_ba_dim"](a, i);
      caml_check_bound(d, i)[i + 1] = aa_;
      ab_ = i + 1 | 0;
      if (Z_ !== i) {i = ab_;continue;}
      break;
    }
  }
  return d;
}

function size_in_bytes(arr) {
  var S_ = dims(arr);
  var T_ = 1;
  function U_(X_, W_) {return caml_mul(X_, W_);}
  var V_ = call3(Stdlib_array[17], U_, T_, S_);
  return caml_mul(kind_size_in_bytes(caml_ba_kind(arr)), V_);
}

var Genarray = [0,dims,size_in_bytes];

function create(kind, layout) {return caml_ba_create(kind, layout, [0]);}

function get(arr) {return runtime["caml_ba_get_generic"](arr, [0]);}

function set(arr) {
  var M_ = [0];
  function N_(R_, Q_, P_) {return runtime["caml_ba_set_generic"](R_, Q_, P_);}
  return function(O_) {return N_(arr, M_, O_);};
}

function size_in_bytes__0(arr) {return kind_size_in_bytes(caml_ba_kind(arr));}

function of_value(kind, layout, v) {
  var a = create(kind, layout);
  call1(set(a), v);
  return a;
}

function create__0(kind, layout, dim) {
  return caml_ba_create(kind, layout, [0,dim]);
}

function size_in_bytes__1(arr) {
  var L_ = caml_ba_dim_1(arr);
  return caml_mul(kind_size_in_bytes(caml_ba_kind(arr)), L_);
}

function slice(a, n) {
  var match = runtime["caml_ba_layout"](a);
  return 0 === match ? caml_ba_slice(a, [0,n]) : caml_ba_slice(a, [0,n]);
}

function of_array(kind, layout, data) {
  var i;
  var K_;
  var ba = create__0(kind, layout, data.length - 1);
  var ofs = 0 === layout ? 0 : 1;
  var J_ = data.length - 1 + -1 | 0;
  var I_ = 0;
  if (! (J_ < 0)) {
    i = I_;
    for (; ; ) {
      runtime["caml_ba_set_1"](
        ba,
        i + ofs | 0,
        caml_check_bound(data, i)[i + 1]
      );
      K_ = i + 1 | 0;
      if (J_ !== i) {i = K_;continue;}
      break;
    }
  }
  return ba;
}

function create__1(kind, layout, dim1, dim2) {
  return caml_ba_create(kind, layout, [0,dim1,dim2]);
}

function size_in_bytes__2(arr) {
  var G_ = caml_ba_dim_2(arr);
  var H_ = caml_ba_dim_1(arr);
  return caml_mul(caml_mul(kind_size_in_bytes(caml_ba_kind(arr)), H_), G_);
}

function slice_left(a, n) {return caml_ba_slice(a, [0,n]);}

function slice_right(a, n) {return caml_ba_slice(a, [0,n]);}

function of_array__0(kind, layout, data) {
  var i;
  var row;
  var C_;
  var D_;
  var E_;
  var j;
  var F_;
  var dim1 = data.length - 1;
  var dim2 = 0 === dim1 ? 0 : caml_check_bound(data, 0)[1].length - 1;
  var ba = create__1(kind, layout, dim1, dim2);
  var ofs = 0 === layout ? 0 : 1;
  var B_ = dim1 + -1 | 0;
  var A_ = 0;
  if (! (B_ < 0)) {
    i = A_;
    for (; ; ) {
      row = caml_check_bound(data, i)[i + 1];
      if (row.length - 1 !== dim2) {
        call1(Stdlib[1], cst_Bigarray_Array2_of_array_non_rectangular_data);
      }
      D_ = dim2 + -1 | 0;
      C_ = 0;
      if (! (D_ < 0)) {
        j = C_;
        for (; ; ) {
          runtime["caml_ba_set_2"](
            ba,
            i + ofs | 0,
            j + ofs | 0,
            caml_check_bound(row, j)[j + 1]
          );
          F_ = j + 1 | 0;
          if (D_ !== j) {j = F_;continue;}
          break;
        }
      }
      E_ = i + 1 | 0;
      if (B_ !== i) {i = E_;continue;}
      break;
    }
  }
  return ba;
}

function create__2(kind, layout, dim1, dim2, dim3) {
  return caml_ba_create(kind, layout, [0,dim1,dim2,dim3]);
}

function size_in_bytes__3(arr) {
  var x_ = runtime["caml_ba_dim_3"](arr);
  var y_ = caml_ba_dim_2(arr);
  var z_ = caml_ba_dim_1(arr);
  return caml_mul(
    caml_mul(caml_mul(kind_size_in_bytes(caml_ba_kind(arr)), z_), y_),
    x_
  );
}

function slice_left_1(a, n, m) {return caml_ba_slice(a, [0,n,m]);}

function slice_right_1(a, n, m) {return caml_ba_slice(a, [0,n,m]);}

function slice_left_2(a, n) {return caml_ba_slice(a, [0,n]);}

function slice_right_2(a, n) {return caml_ba_slice(a, [0,n]);}

function of_array__1(kind, layout, data) {
  var i;
  var row;
  var q_;
  var r_;
  var s_;
  var j;
  var col;
  var t_;
  var u_;
  var v_;
  var k;
  var w_;
  var dim1 = data.length - 1;
  var dim2 = 0 === dim1 ? 0 : caml_check_bound(data, 0)[1].length - 1;
  var dim3 = 0 === dim2 ?
    0 :
    caml_check_bound(caml_check_bound(data, 0)[1], 0)[1].length - 1;
  var ba = create__2(kind, layout, dim1, dim2, dim3);
  var ofs = 0 === layout ? 0 : 1;
  var p_ = dim1 + -1 | 0;
  var o_ = 0;
  if (! (p_ < 0)) {
    i = o_;
    for (; ; ) {
      row = caml_check_bound(data, i)[i + 1];
      if (row.length - 1 !== dim2) {
        call1(Stdlib[1], cst_Bigarray_Array3_of_array_non_cubic_data);
      }
      r_ = dim2 + -1 | 0;
      q_ = 0;
      if (! (r_ < 0)) {
        j = q_;
        for (; ; ) {
          col = caml_check_bound(row, j)[j + 1];
          if (col.length - 1 !== dim3) {
            call1(Stdlib[1], cst_Bigarray_Array3_of_array_non_cubic_data__0);
          }
          u_ = dim3 + -1 | 0;
          t_ = 0;
          if (! (u_ < 0)) {
            k = t_;
            for (; ; ) {
              runtime["caml_ba_set_3"](
                ba,
                i + ofs | 0,
                j + ofs | 0,
                k + ofs | 0,
                caml_check_bound(col, k)[k + 1]
              );
              w_ = k + 1 | 0;
              if (u_ !== k) {k = w_;continue;}
              break;
            }
          }
          v_ = j + 1 | 0;
          if (r_ !== j) {j = v_;continue;}
          break;
        }
      }
      s_ = i + 1 | 0;
      if (p_ !== i) {i = s_;continue;}
      break;
    }
  }
  return ba;
}

function array0_of_genarray(a) {
  return 0 === caml_ba_num_dims(a) ?
    a :
    call1(Stdlib[1], cst_Bigarray_array0_of_genarray);
}

function array1_of_genarray(a) {
  return 1 === caml_ba_num_dims(a) ?
    a :
    call1(Stdlib[1], cst_Bigarray_array1_of_genarray);
}

function array2_of_genarray(a) {
  return 2 === caml_ba_num_dims(a) ?
    a :
    call1(Stdlib[1], cst_Bigarray_array2_of_genarray);
}

function array3_of_genarray(a) {
  return 3 === caml_ba_num_dims(a) ?
    a :
    call1(Stdlib[1], cst_Bigarray_array3_of_genarray);
}

function reshape_0(a) {return caml_ba_reshape(a, [0]);}

function reshape_1(a, dim1) {return caml_ba_reshape(a, [0,dim1]);}

function reshape_2(a, dim1, dim2) {return caml_ba_reshape(a, [0,dim1,dim2]);}

function reshape_3(a, dim1, dim2, dim3) {
  return caml_ba_reshape(a, [0,dim1,dim2,dim3]);
}

function a_(n_, m_) {return caml_ba_reshape(n_, m_);}

var b_ = [
  0,
  create__2,
  function(l_, k_) {return caml_ba_change_layout(l_, k_);},
  size_in_bytes__3,
  slice_left_1,
  slice_right_1,
  slice_left_2,
  slice_right_2,
  of_array__1
];
var c_ = [
  0,
  create__1,
  function(j_, i_) {return caml_ba_change_layout(j_, i_);},
  size_in_bytes__2,
  slice_left,
  slice_right,
  of_array__0
];
var d_ = [
  0,
  create__0,
  function(h_, g_) {return caml_ba_change_layout(h_, g_);},
  size_in_bytes__1,
  slice,
  of_array
];
var Stdlib_bigarray = [
  0,
  float32,
  float64,
  complex32,
  complex64,
  int8_signed,
  int8_unsigned,
  int16_signed,
  int16_unsigned,
  int__0,
  int32,
  int64,
  nativeint,
  char__0,
  kind_size_in_bytes,
  c_layout,
  fortran_layout,
  Genarray,
  [
    0,
    create,
    function(f_, e_) {return caml_ba_change_layout(f_, e_);},
    size_in_bytes__0,
    get,
    set,
    of_value
  ],
  d_,
  c_,
  b_,
  array0_of_genarray,
  array1_of_genarray,
  array2_of_genarray,
  array3_of_genarray,
  a_,
  reshape_0,
  reshape_1,
  reshape_2,
  reshape_3
];

module.exports = Stdlib_bigarray;

/*::type Exports = {
  float32: any,
  float64: any,
  complex32: any,
  complex64: any,
  int8_signed: any,
  int8_unsigned: any,
  int16_signed: any,
  int16_unsigned: any,
  _int_: any,
  int32: any,
  int64: any,
  nativeint: any,
  _char_: any,
  kind_size_in_bytes: (param: any) => any,
  c_layout: any,
  fortran_layout: any,
  Genarray: any,
  array0_of_genarray: (a: any) => any,
  array1_of_genarray: (a: any) => any,
  array2_of_genarray: (a: any) => any,
  array3_of_genarray: (a: any) => any,
  reshape_0: (a: any) => any,
  reshape_1: (a: any, dim1: any) => any,
  reshape_2: (a: any, dim1: any, dim2: any) => any,
  reshape_3: (a: any, dim1: any, dim2: any, dim3: any) => any,
}*/
/** @type {{
  float32: any,
  float64: any,
  complex32: any,
  complex64: any,
  int8_signed: any,
  int8_unsigned: any,
  int16_signed: any,
  int16_unsigned: any,
  _int_: any,
  int32: any,
  int64: any,
  nativeint: any,
  _char_: any,
  kind_size_in_bytes: (param: any) => any,
  c_layout: any,
  fortran_layout: any,
  Genarray: any,
  array0_of_genarray: (a: any) => any,
  array1_of_genarray: (a: any) => any,
  array2_of_genarray: (a: any) => any,
  array3_of_genarray: (a: any) => any,
  reshape_0: (a: any) => any,
  reshape_1: (a: any, dim1: any) => any,
  reshape_2: (a: any, dim1: any, dim2: any) => any,
  reshape_3: (a: any, dim1: any, dim2: any, dim3: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.float32 = module.exports[1];
module.exports.float64 = module.exports[2];
module.exports.complex32 = module.exports[3];
module.exports.complex64 = module.exports[4];
module.exports.int8_signed = module.exports[5];
module.exports.int8_unsigned = module.exports[6];
module.exports.int16_signed = module.exports[7];
module.exports.int16_unsigned = module.exports[8];
module.exports._int_ = module.exports[9];
module.exports.int32 = module.exports[10];
module.exports.int64 = module.exports[11];
module.exports.nativeint = module.exports[12];
module.exports._char_ = module.exports[13];
module.exports.kind_size_in_bytes = module.exports[14];
module.exports.c_layout = module.exports[15];
module.exports.fortran_layout = module.exports[16];
module.exports.Genarray = module.exports[17];
module.exports.array0_of_genarray = module.exports[22];
module.exports.array1_of_genarray = module.exports[23];
module.exports.array2_of_genarray = module.exports[24];
module.exports.array3_of_genarray = module.exports[25];
module.exports.reshape_0 = module.exports[27];
module.exports.reshape_1 = module.exports[28];
module.exports.reshape_2 = module.exports[29];
module.exports.reshape_3 = module.exports[30];

/* Hashing disabled */
