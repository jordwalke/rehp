type t = {
  x1: option(string),
  x2: option(string),
  x3: option(string),
  x4: option(string),
  x5: option(string),
  x6: option(string),
  x7: option(string),
  x8: option(string),
  x9: option(string),
  x10: option(string),
  x11: option(string),
  x12: option(string),
  x13: option(string),
  x14: option(string),
  x15: option(string),
  x16: option(string),
  x17: option(string),
  x18: option(string),
  x19: option(string),
  x20: option(string),
  x21: option(string),
  x22: option(string),
  x23: option(string),
  x24: option(string),
  x25: option(string),
  x26: option(string),
  x27: option(string),
  // If you switch x28/x29 and switch their getters/setters the bytecode didn't
  // change and therefore it will not be recompiled. However, the debug data
  // did change and so it should have triggered recompilation, but the change
  // isn't being detected.
  x29: option(string),
  x28: option(string),
  x30: option(string),
  x31: option(string),
  x32: option(string),
  x33: option(string),
  x34: option(string),
  x35: option(string),
  x36: option(string),
  x37: option(string),
  // You cannot swap these two and have the bytecode changes detected.
  x38: option(string),
  x39: option(string),
};

let empty = {
  x1: None,
  x2: None,
  x3: None,
  x4: None,
  x5: None,
  x6: None,
  x7: None,
  x8: None,
  x9: None,
  x10: None,
  x11: None,
  x12: None,
  x13: None,
  x14: None,
  x15: None,
  x16: None,
  x17: None,
  x18: None,
  x19: None,
  x20: None,
  x21: None,
  x22: None,
  x23: None,
  x24: None,
  x25: None,
  x26: None,
  x27: None,
  x29: None,
  x28: None,
  x30: None,
  x31: None,
  x32: None,
  x33: None,
  x34: None,
  x35: None,
  x36: None,
  x37: None,
  x38: None,
  x39: None,
};

let setX1 = (o, v) => {...o, x1: v};
let setX2 = (o, v) => {...o, x2: v};
let setX3 = (o, v) => {...o, x3: v};
let setX4 = (o, v) => {...o, x4: v};
let setX5 = (o, v) => {...o, x5: v};
let setX6 = (o, v) => {...o, x6: v};
let setX7 = (o, v) => {...o, x7: v};
let setX8 = (o, v) => {...o, x8: v};
let setX9 = (o, v) => {...o, x9: v};
let setX10 = (o, v) => {...o, x10: v};
let setX11 = (o, v) => {...o, x11: v};
let setX12 = (o, v) => {...o, x12: v};
let setX13 = (o, v) => {...o, x13: v};
let setX14 = (o, v) => {...o, x14: v};
let setX15 = (o, v) => {...o, x15: v};
let setX16 = (o, v) => {...o, x16: v};
let setX17 = (o, v) => {...o, x17: v};
let setX18 = (o, v) => {...o, x18: v};
let setX19 = (o, v) => {...o, x19: v};
let setX20 = (o, v) => {...o, x20: v};
let setX21 = (o, v) => {...o, x21: v};
let setX22 = (o, v) => {...o, x22: v};
let setX23 = (o, v) => {...o, x23: v};
let setX24 = (o, v) => {...o, x24: v};
let setX25 = (o, v) => {...o, x25: v};
let setX26 = (o, v) => {...o, x26: v};
let setX27 = (o, v) => {...o, x27: v};
let setX29 = (o, v) => {...o, x29: v};
let setX28 = (o, v) => {...o, x28: v};

let getX1 = o => o.x1;
let getX2 = o => o.x2;
let getX3 = o => o.x3;
let getX4 = o => o.x4;
let getX5 = o => o.x5;
let getX6 = o => o.x6;
let getX7 = o => o.x7;
let getX8 = o => o.x8;
let getX9 = o => o.x9;
let getX10 = o => o.x10;
let getX11 = o => o.x11;
let getX12 = o => o.x12;
let getX13 = o => o.x13;
let getX14 = o => o.x14;
let getX15 = o => o.x15;
let getX16 = o => o.x16;
let getX17 = o => o.x17;
let getX18 = o => o.x18;
let getX19 = o => o.x19;
let getX20 = o => o.x20;
let getX21 = o => o.x21;
let getX22 = o => o.x22;
let getX23 = o => o.x23;
let getX24 = o => o.x24;
let getX25 = o => o.x25;
let getX26 = o => o.x26;
let getX27 = o => o.x27;
let getX29 = o => o.x29;
let getX28 = o => o.x28;


let helperUtil = (b, a) => b + a;
