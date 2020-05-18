/**
 * @flow strict
 * HashBugReproduce__Consumer
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function getField(o) {return o[9];}

var HashBugReproduce_Consumer = [0,getField];

module.exports = HashBugReproduce_Consumer;

/*::type Exports = {
  getField: (o: any) => any,
}*/
/** @type {{
  getField: (o: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.getField = module.exports[1];

/*____hashes flags: 589793685 bytecode: 7303456054 debug-data: 1066682977 primitives: 1058613066*/
