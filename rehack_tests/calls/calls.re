type t(+'a);
type unsafe;
type _externalString;
type str = t(_externalString);
external toString: str => string = "caml_js_to_string";
external fromString: string => str = "caml_js_from_string";

external toUnsafe: t('any) => unsafe = "%identity";

external call: t('a) => t('c) = "caml_js_fun_call0";
external call1: (t('a), t('b)) => t('d) = "caml_js_fun_call1";
external call2: (t('a), t('b), t('c)) => t('d) = "caml_js_fun_call2";
external call3: (t('a), t('b), t('c), t('d)) => t('e) =
  "caml_js_fun_call3";
external call4: (t('a), t('b), t('c), t('d), t('e)) => t('f) =
  "caml_js_fun_call4";
external callWithArgs: (t('a), array(unsafe)) => t('c) = "caml_js_fun_call";

external send: (t('a), string) => t('c) = "caml_js_meth_call0";
external send1: (t('a), string, t('a)) => t('c) = "caml_js_meth_call1";
external send2: (t('a), string, t('a), t('b)) => t('c) =
  "caml_js_meth_call2";
external send3: (t('a), string, t('a), t('b), t('c)) => t('d) =
  "caml_js_meth_call3";

external sendWithArgs: (t('a), string, array(unsafe)) => t('c) =
  "caml_js_meth_call";

let foo = fromString("foo");
let bar = fromString("bar");
let baz = fromString("baz");
let testFunctionCalls = (o: t('anything)) => {
  let withArgsResult = callWithArgs(o, [|toUnsafe(foo)|]);
  let callResult = call(o);
  let callResult1 = call1(o, fromString("passThis"));
  let callResult2 = call2(o, fromString("passThis"), foo);
  let callResult3 = call3(o, fromString("passThis"), bar, bar);
  let callResult4 = call4(o, fromString("passThis"), baz, baz, baz);
  (
    withArgsResult,
    callResult,
    callResult1,
    callResult2,
    callResult3,
    callResult4,
  );
};

let testMethodCalls = (o__: t('anything)) => {
  let withArgsResult = sendWithArgs(o__, "yourMethod", [|toUnsafe(foo)|]);
  let sendResult = send(o__, "myMethod");
  let sendResult1 = send1(o__, "myMethod", foo);
  let sendResult2 = send2(o__, "myMethod", foo, foo);
  let sendResult3 = send3(o__, "myMethod", bar, foo, foo);
  (withArgsResult, sendResult, sendResult1, sendResult2, sendResult3);
};

let testPartialFunctionCalls = (s_: t('anything)) => {
  let callResult1 = call1(s_);
  let callResult2 = call2(s_, fromString("passThis"));
  let callResult3 = call3(s_, fromString("passThis"), bar);
  let callResult4 = call4(s_, fromString("passThis"), baz, baz);
  (callResult1, callResult2, callResult3, callResult4);
};

let testPartialMethodCalls = (o: t('anything)) => {
  let sendResult1 = send1(o, "myPartiallyAppliedMethod");
  let sendResult2 = send2(o, "myPartiallyAppliedMethod", foo);
  let sendResult3 = send3(o, "myPartiallyAppliedMethod", bar, foo);
  (sendResult1, sendResult2, sendResult3);
};

external sideEffect: unit => unit = "side_effect";

external make1Array: 'a => 'any = {|
  raw-macro:
  <@.js>
  new Array(<@1/>)
  </@.js>
  <@.php>varray[<@1/>]</@.php>
|};

external make1ArrayDouble: 'a => 'any = {|
  raw-macro:
  <@.js>
  new Array(<@1/>, <@1/>)
  </@.js>
  <@.php>varray[<@1/>, <@1/>]</@.php>
|};

external make2Array: ('a, 'b) => 'any = {|
  raw-macro:
  <@.js>
  new Array(<@1/>, <@2/>)
  </@.js>
  <@.php>varray[<@1/>, <@2/>]</@.php>
|};



/**
 * The closures around the wrappers won't get eliminated by inline.ml because
 * the macro doesn't have a *registered* arity, even though it has a detectable
 * arity due to the extern definition. This is actually what we want. For macros,
 * it is not safe to do that.
 */
let resultMake1Array = make1Array("one");
/* Because the macro doesn't expand more than one reference to the argument,
 * this side effectful operation can be inlined into the call site. */
let resultMake1ArraySideEffect = make1Array(sideEffect());
let wrapMake1Array = x => make1Array(x);
let reexportCallMake1Array = make1Array;
let partiallyCallMake1Array = make1Array;
[@warning "-20"]
let overCallMake1Array = make1Array((), ());
let closeOverMake1Array = () => {
  let tmp = make1Array(999);
  [tmp, 100];
};

let r = {contents: 0};

let resultMake1ArrayDouble = make1ArrayDouble("one-double");
/* This argument should not be inlined into the callsite because the argument
 * is referenced multiple times in the macro. */
let resultMake1ArrayDoubleSideEffect = make1ArrayDouble(sideEffect());
let wrapMake1ArrayDouble = x => make1ArrayDouble(x);
let reexportCallMake1ArrayDouble = make1ArrayDouble;
let partiallyCallMake1ArrayDouble = make1ArrayDouble;
[@warning "-20"]
let overCallMake1ArrayDouble = make1ArrayDouble((), ());
let closeOverMake1ArrayDouble = () => {
  let tmp = make1ArrayDouble(999);
  [tmp, 100];
};

let resultMake2ArraySideEffect = make2Array(sideEffect(), sideEffect());
let resultMake2Array = make2Array("two", "two");
let wrapMake2Array = (x, y) => make2Array(x, y);
/* Need a type annotation here to avoid generalization error */
let reexportCallMake2Array = make2Array;
let partiallyCallMake2Array: int => 'any = make2Array("hi");

[@warning "-20"]
let overCallMake2Array = make2Array((), (), ());
let closeOverMake2Array = () => make2Array("hi", "bye");

module ReexportedMacros = {
  let make1Array = make1Array;
  let make2Array = make2Array;
};


external callExternWithCommentSuppression: ('a, 'b) => 'any = {|
  raw-macro:
  <@.js>

  // FLOW_FIXME blah blah
  console.log(<@1/>, <@2/>)
  </@.js>
  <@.php>

  // HH_IGNORE blah blah
  SomeUtilityClass::foo(<@1/>, <@2/>)
  </@.php>
|};


let callsAFunctionWithSuppression = () => {
  callExternWithCommentSuppression("fix", "me");
};


let rec f = (x, y) => 1
and z = Some((f, "Second Part Of Tuple:"));

switch (z) {
| None => ()
| Some((f, str)) => print_string(str ++ string_of_int(f(0, 0)))
};


let strKeyDetached = "ThisWasDetached";

external createObj2: (string, 'a, string, 'b) => str = "caml_js_object_args";

let myTwoObject = createObj2("firstField", true, "secondField", false);
let myTwoObjectWithWeirdKeys = createObj2("first/Field", true, "second$Field", false);

let myTwoObjectDetachedKey = createObj2(strKeyDetached, true, "secondField", false);

Macros.includeMe();
