Tasks:
- static-react test case infinitely loops because of goto/break logic.
- Nan isn't working correctly likely because of incorrect translation of
  `caml_int64_float_of_bits` . In JS backend they both return false. In PHP
  backend they both return true!  in ocamlopt/rtop === returns false, and ==
  returns true.
  Requirement: == should return false. Ideally === would return false as well
  but it's okay if it returns true.

- Php supports `break n` and `continue n` for loops.
- JS supports `continue label` and `break label`
  which are different and more flexible. Rehp uses `Continue_statement(label)` and `Break(label)`,
  but currently only ever generates from bytecode `Break(None)` and
  `Continue(None | Some(l))`. `Break(Some(l))` will only ever be generated from
  parsing JS currently.
  - So that means we need to create the `break;` and `continue lbl;` features
    in Php.
  - Php supports `goto label;` but that doesn't have loop characteristics - it
    has arbitrary `goto` semantics.

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/label
> "Note that JavaScript has no goto statement, you can only use labels with break or continue."

We really do need some kind of a labeled continue in Php, or something equivalent for loop structures.
The following Php infinite loops using `goto`:

    <?php
    $i=0;
    $j=0;

    loop1:
    for ($i = 0; $i < 3; $i++) {      //The first for statement is labeled "loop1"
       loop2:
       for ($j = 0; $j < 3; $j++) {   //The second for statement is labeled "loop2"
          if ($i === 1 && $j === 1) {
             goto loop1;
          }
          print 'i = ' + $i + ', j = ' + $j;
       }
    }

    ?>

The following Js terminates regardless of if you use `break loop1`/`continue
loop1`.

    $i=0;
    $j=0;

    loop1:
    for ($i = 0; $i < 3; $i++) {      //The first for statement is labeled "loop1"
       loop2:
       for ($j = 0; $j < 3; $j++) {   //The second for statement is labeled "loop2"
          if ($i === 1 && $j === 1) {
             continue loop1;
          }
          console.log('i = ' + $i + ', j = ' + $j);
       }
    }





TODO: Add test case for this scenario:

     $render(
       $containerRoot,
       $element (
        V(
          0,
          function($_bp_) use ( &$_aZ_,&$render____1 ) {
            return function($_bq_,$_br_) {
             return $render____1($_aZ_,$_bp_,$_bq_,$_br_);
            };
          }
         )
       )

# Perf:
- All arrays items in Javascript.ml are boxed in a Some() because of the possibility to have arrays like [1,2,,4].
  - Instead we can have an "empty-expression" for those missing expressions,
    and avoid boxing on a huge number of elements (better memory / perf).

# Compat:
Look into js_specialize to see if anything there needs abstracting.

# Exception handling:
Currently we hack around exception handling to make PHP work a little more like
JS (in that JS can throw anything regardless of if it extends some base class -
not so with PHP). We could instead revise the generate.ml process to emit
higher level AST codes.

# Misc:

- When compiling from JS the `arguments` variable is incorrectly considered
  global. We simply won't support any stub that relies on arguments in the
  short term.
- `caml_format_int_special` in `generate.ml` makes an assumption that
any backend may concatenate an integer with a string. Instead setup a
high level Rehp operation for `IntToString`.

- Strings in switch case statements are wrapped in String->jsNew, which is
  likely not correct. `caml_make_path` uses this for example and would likely
  fail. Again, this won't matter if we don't compile stdlib from JS anyways.
- Avoid wrapping the string from require("string") - again, won't matter if
  abandoning approach of compiling stubs from JS.

- This code produces usage of `caml_trampoline` which fails:
  `print_string(Printf.sprintf("Hello %s %d\n", "world", 123));`

- In `support.php`:

    # TODO: This needs fixing
    $max_int=$unsigned_right_shift_32(-1,1) | 0;

- Add tests to ensure that $right_shift is always equal to
  $unsigned_right_shift_32 but with sign preserved.

- Consider creating new Rehp operation `Take32(e)` which will take 32 bits of
  integers to ensure compatibility with other backends. Currently we use `BOr`
  for that, but various backends won't use binary or because it won't operate
  on 32 bits of integers.

- We could remove the LsrEq/AsrEq/LslEq from Rehp - they are just sugar for
  `x=x>>n`. Most JS minifiers will do that simplification anyways.

# Attempts:
Attempted to remove the patch to caml_new_string that checks if the argument is
yet wrapped in a JS string before wrapping it. Approach: change mlstring.js so
that any access to `.length` went through a call to a new
`caml_js_string_length`, and then changing rehp_from_javascript to change
`caml_js_string_length(s)` into `strLen(s)`. I thought that would allow us to
not wrap strings on the way in, letting them remain php strings, but that
wasn't enough because functions also rely on those strings having methods like
substr. Also, (and more importantly) OCaml strings are _already_ more like PHP
strings, and the JS stub implementations assume that JS strings have some
unicode support with indexing. For example:

JS:

    "Ɋ".length == 1
    "Ɋ"[0] == "Ɋ"

Php:

    strlen("Ɋ") == 2
    "Ɋ"[0] == "�"
    "Ɋ"[1] == "�"
    "Ɋ"[0] . "Ɋ"[1] == "Ɋ"

OCaml:

    String.length("Ɋ") == 2
    String.get("Ɋ", 0) == <some-weird-char>
    String.get("Ɋ", 1) == <some-weird-char>
    String.sub("Ɋ", 0, 1) ++ String.sub("Ɋ", 1, 1) == "Ɋ";

In fact, even Vim Script's string behavior is closer to OCaml's string
implementation than JS:

Vim:

    strpart("Ɋ", 0, 1) . strpart("Ɋ", 1, 1) == "Ɋ"



So apart from the mutability, there may not be much work to do to get PHP to
emulate OCaml strings. All the work to get JS strings to work as OCaml strings
is not needed, and in fact is likely innacurate.


Problem With Regexes (maybe not):
=====================
There's also a problem with the PHP implementation of regexes where it's
incompatible with JS regexes:

Take the string "Ɋ"

When chunked by OCaml into UTF-8 bytes it is:

"\xc9\x8a"

That's its actual representation at runtime in PHP and OCaml.

The `u` flag is (I think) supposed to be used to treat each (code-point?)
match as a series of unicode matches as opposed to matching on the raw
sequence of bytes.

In JS, all of these return true:

    /[^\x00-\x7f]/u.test("\xc9\x8a")
    /[^\x00-\x7f]/u.test("Ɋ")
    /[^\x00-\x7f]/.test("\xc9\x8a")
    /[^\x00-\x7f]/.test("Ɋ")


In PHP all these return 1:
var_dump(preg_match("/[^\\x{0000}-\\x{007f}]/", "Ɋ"));
var_dump(preg_match("/[^\\x{0000}-\\x{007f}]/", "\xc9\x8a"));
var_dump(preg_match("/[^\\x{0000}-\\x{007f}]/u", "Ɋ"));
var_dump(preg_match("/[^\\x{0000}-\\x{007f}]/u", "\xc9\x8a"));

var_dump(preg_match("/[^\\x00-\\x7f]/", "Ɋ"));
var_dump(preg_match("/[^\\x00-\\x7f]/", "\xc9\x8a"));
var_dump(preg_match("/[^\\x00-\\x7f]/u", "Ɋ"));
var_dump(preg_match("/[^\\x00-\\x7f]/u", "\xc9\x8a"));


However there's a discrepency with the following use of `/u`.

JS returns true for both of these:

    /[^\x00-\x7f]/u.test("\x00\x8a")
    /[^\x00-\x7f]/.test("\x00\x8a")

But PHP returns 1 only for the second: The `u` flag doesn't work on this range of characters.
For the first one it returns false! False means the length aren't correct.

    preg_match("/[^\\x00-\\x7f]/u", "\x00\x8a")
    preg_match("/[^\\x00-\\x7f]/", "\x00\x8a")

> preg_match Returns FALSE if offset (default) is higher than subject length.
> That probably means it can't even find one unicode character in \x00\x8a.
> What's going on?

When in unicode mode, PHP actually is chunking the characters of "\x00\x8a"
into Unicode. It chunks the first one as a separate "character", then gets to
the second one and the length of the string is zero because \x8a is not by
itself a valid UTF8 character (0b10001010) (It's not, check the utf-8 chart).
So it returns false which is like an error for improper arguments.

However, when running in JS unicode mode, the string "\x00\x8a" parses the 00,
then the \x8a and probably declares it couldn't find another unicode character
to even compare. Or even if it did, somehow pad it with zeros it still would
end up returning the same thing.

> this is how UTF-8 is encoded: UTF-16 is likely similar with the zero range.

      0xxxxxxx (length 1)
      110xxxxx 10xxxxxx (length 2)
      1110xxxx 10xxxxxx 10xxxxxx (length 3)
      11110xxx 10xxxxxx 10xxxxxx 10xxxxxx (length 4)


Bigger Issue:
=============
The JS algorithm translates UTF8 to UTF16 when it converts to JS strings.
This isn't really even well defined `caml_to_js_string`.

At the very least the portion that does this:


    $i -= $v;$t = $jsPlus($t,$String->jsNew("\ufffd"));}

Is very very wrong, so the function `caml_utf16_of_utf8` never terminates.
(That unicode isn't escaping - it has length 6).

In the mean time:
=================

Don't use UCS-2 when converting in charCodeAt


Suggestions For Upstream:
=========================
I would have suggested representing strings via:

String form one:
        "asdf"

String form two:
        s = new String("asdf");
        (typeof s === 'object') not string!

This allows an additional bit of information to distinguish different kinds of strings.

Concat propagates form one's bit, so form one can be used for representations
that are possibly "dirty". Else, you could use form two to represent dirtiness
but upon every concatenation manually propagate the form.

Form two may store additional information on it (but still cannot be mutated).




Debug Info:

The following code

      6. let unicodeLength = String.length(String.make(Random.int(30), 'i'));
      7. print_endline(
      8.   "String.length(\"Ɋ\") should be two:" ++ string_of_int(unicodeLength),
      9. );


Is compiled to:

      /*<<rehack_tests/strings/strings.re:4 0>>*/ _g_ = 30,
      /*<<rehack_tests/strings/strings.re:6 46>>*/ _h_ = 
       /*<<rehack_tests/strings/strings.re:6 46>>*/ int__1(_g_),
      /*<<rehack_tests/strings/strings.re:6 34>>*/ unicodeLength = 
       /*<<rehack_tests/strings/strings.re:6 34>>*/ caml_ml_string_length(
         /*<<rehack_tests/strings/strings.re:6 34>>*/ make__0(_h_, _f_)

`_h_` is the result of `Random.int(30)`, yet in the original code it is inlined into the call site. 
There is a compilation mode that will inline that variable, but it will inline all the other variables too.
But notice that the debug info location for _h_ is the same as the debug info for the expression it refers to.
That's a sign that this variable was inlined in its original source. You could use that sign to create a compilation mode
that only inlines variables that were inlined in the original source.
However, look at the location for `_g_`. It is clearly wrong. See the long comment in Parse_bytecode.ml

Also, see that 

