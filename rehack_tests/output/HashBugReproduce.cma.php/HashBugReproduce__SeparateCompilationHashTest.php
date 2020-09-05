<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class HashBugReproduce__SeparateCompilationHashTest {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $empty = Vector{
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0
    } as dynamic;
    $setX1 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $v,
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX2 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $v,
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX3 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $v,
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX4 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $v,
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX5 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $v,
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX6 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $v,
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX7 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $v,
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX8 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $v,
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX9 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $v,
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX10 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $v,
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX11 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $v,
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX12 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $v,
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX13 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $v,
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX14 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $v,
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX15 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $v,
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX16 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $v,
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX17 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $v,
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX18 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $v,
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX19 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $v,
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX20 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $v,
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX21 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $v,
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX22 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $v,
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX23 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $v,
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX24 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $v,
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX25 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $v,
        $o[26],
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX26 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $v,
        $o[27],
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX27 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $v,
        $o[28],
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX29 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $v,
        $o[29],
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $setX28 = (dynamic $o, dynamic $v) : dynamic ==> {
      return Vector{
        0,
        $o[1],
        $o[2],
        $o[3],
        $o[4],
        $o[5],
        $o[6],
        $o[7],
        $o[8],
        $o[9],
        $o[10],
        $o[11],
        $o[12],
        $o[13],
        $o[14],
        $o[15],
        $o[16],
        $o[17],
        $o[18],
        $o[19],
        $o[20],
        $o[21],
        $o[22],
        $o[23],
        $o[24],
        $o[25],
        $o[26],
        $o[27],
        $o[28],
        $v,
        $o[30],
        $o[31],
        $o[32],
        $o[33],
        $o[34],
        $o[35],
        $o[36],
        $o[37],
        $o[38],
        $o[39]
      };
    };
    $getX1 = (dynamic $o) : dynamic ==> {return $o[1];};
    $getX2 = (dynamic $o) : dynamic ==> {return $o[2];};
    $getX3 = (dynamic $o) : dynamic ==> {return $o[3];};
    $getX4 = (dynamic $o) : dynamic ==> {return $o[4];};
    $getX5 = (dynamic $o) : dynamic ==> {return $o[5];};
    $getX6 = (dynamic $o) : dynamic ==> {return $o[6];};
    $getX7 = (dynamic $o) : dynamic ==> {return $o[7];};
    $getX8 = (dynamic $o) : dynamic ==> {return $o[8];};
    $getX9 = (dynamic $o) : dynamic ==> {return $o[9];};
    $getX10 = (dynamic $o) : dynamic ==> {return $o[10];};
    $getX11 = (dynamic $o) : dynamic ==> {return $o[11];};
    $getX12 = (dynamic $o) : dynamic ==> {return $o[12];};
    $getX13 = (dynamic $o) : dynamic ==> {return $o[13];};
    $getX14 = (dynamic $o) : dynamic ==> {return $o[14];};
    $getX15 = (dynamic $o) : dynamic ==> {return $o[15];};
    $getX16 = (dynamic $o) : dynamic ==> {return $o[16];};
    $getX17 = (dynamic $o) : dynamic ==> {return $o[17];};
    $getX18 = (dynamic $o) : dynamic ==> {return $o[18];};
    $getX19 = (dynamic $o) : dynamic ==> {return $o[19];};
    $getX20 = (dynamic $o) : dynamic ==> {return $o[20];};
    $getX21 = (dynamic $o) : dynamic ==> {return $o[21];};
    $getX22 = (dynamic $o) : dynamic ==> {return $o[22];};
    $getX23 = (dynamic $o) : dynamic ==> {return $o[23];};
    $getX24 = (dynamic $o) : dynamic ==> {return $o[24];};
    $getX25 = (dynamic $o) : dynamic ==> {return $o[25];};
    $getX26 = (dynamic $o) : dynamic ==> {return $o[26];};
    $getX27 = (dynamic $o) : dynamic ==> {return $o[27];};
    $getX29 = (dynamic $o) : dynamic ==> {return $o[28];};
    $getX28 = (dynamic $o) : dynamic ==> {return $o[29];};
    $helperUtil = (dynamic $b, dynamic $a) : dynamic ==> {
      return (int) ($b + $a);
    };
    $HashBugReproduce_SeparateCompilationHashTest = Vector{
      0,
      $empty,
      $setX1,
      $setX2,
      $setX3,
      $setX4,
      $setX5,
      $setX6,
      $setX7,
      $setX8,
      $setX9,
      $setX10,
      $setX11,
      $setX12,
      $setX13,
      $setX14,
      $setX15,
      $setX16,
      $setX17,
      $setX18,
      $setX19,
      $setX20,
      $setX21,
      $setX22,
      $setX23,
      $setX24,
      $setX25,
      $setX26,
      $setX27,
      $setX29,
      $setX28,
      $getX1,
      $getX2,
      $getX3,
      $getX4,
      $getX5,
      $getX6,
      $getX7,
      $getX8,
      $getX9,
      $getX10,
      $getX11,
      $getX12,
      $getX13,
      $getX14,
      $getX15,
      $getX16,
      $getX17,
      $getX18,
      $getX19,
      $getX20,
      $getX21,
      $getX22,
      $getX23,
      $getX24,
      $getX25,
      $getX26,
      $getX27,
      $getX29,
      $getX28,
      $helperUtil
    } as dynamic;
    
    return($HashBugReproduce_SeparateCompilationHashTest);

  }
  public static function setX1(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 2, $o, $v);
  }
  public static function setX2(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 3, $o, $v);
  }
  public static function setX3(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 4, $o, $v);
  }
  public static function setX4(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 5, $o, $v);
  }
  public static function setX5(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 6, $o, $v);
  }
  public static function setX6(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 7, $o, $v);
  }
  public static function setX7(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 8, $o, $v);
  }
  public static function setX8(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 9, $o, $v);
  }
  public static function setX9(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 10, $o, $v);
  }
  public static function setX10(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 11, $o, $v);
  }
  public static function setX11(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 12, $o, $v);
  }
  public static function setX12(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 13, $o, $v);
  }
  public static function setX13(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 14, $o, $v);
  }
  public static function setX14(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 15, $o, $v);
  }
  public static function setX15(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 16, $o, $v);
  }
  public static function setX16(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 17, $o, $v);
  }
  public static function setX17(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 18, $o, $v);
  }
  public static function setX18(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 19, $o, $v);
  }
  public static function setX19(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 20, $o, $v);
  }
  public static function setX20(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 21, $o, $v);
  }
  public static function setX21(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 22, $o, $v);
  }
  public static function setX22(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 23, $o, $v);
  }
  public static function setX23(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 24, $o, $v);
  }
  public static function setX24(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 25, $o, $v);
  }
  public static function setX25(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 26, $o, $v);
  }
  public static function setX26(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 27, $o, $v);
  }
  public static function setX27(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 28, $o, $v);
  }
  public static function setX29(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 29, $o, $v);
  }
  public static function setX28(dynamic $o, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 30, $o, $v);
  }
  public static function getX1(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 31, $o);
  }
  public static function getX2(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 32, $o);
  }
  public static function getX3(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 33, $o);
  }
  public static function getX4(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 34, $o);
  }
  public static function getX5(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 35, $o);
  }
  public static function getX6(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 36, $o);
  }
  public static function getX7(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 37, $o);
  }
  public static function getX8(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 38, $o);
  }
  public static function getX9(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 39, $o);
  }
  public static function getX10(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 40, $o);
  }
  public static function getX11(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 41, $o);
  }
  public static function getX12(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 42, $o);
  }
  public static function getX13(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 43, $o);
  }
  public static function getX14(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 44, $o);
  }
  public static function getX15(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 45, $o);
  }
  public static function getX16(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 46, $o);
  }
  public static function getX17(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 47, $o);
  }
  public static function getX18(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 48, $o);
  }
  public static function getX19(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 49, $o);
  }
  public static function getX20(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 50, $o);
  }
  public static function getX21(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 51, $o);
  }
  public static function getX22(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 52, $o);
  }
  public static function getX23(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 53, $o);
  }
  public static function getX24(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 54, $o);
  }
  public static function getX25(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 55, $o);
  }
  public static function getX26(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 56, $o);
  }
  public static function getX27(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 57, $o);
  }
  public static function getX29(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 58, $o);
  }
  public static function getX28(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 59, $o);
  }
  public static function helperUtil(dynamic $b, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 60, $b, $a);
  }

}
/*____hashes flags: 1068210421 bytecode: 729515992277 debug-data: 54564383401 primitives: 1058613066*/
