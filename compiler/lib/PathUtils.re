/**
 * TODO: This file should be replaced with a vendoring of reason-native
 * Path/Fs.
 */
open Stdlib;

/**
 * This probably needs to cover some case in windows with escaped spaces or
 * something.  Use reason-native/fs/path for a more thorough implementation.
 */
let normalizeSeps = s => {
  let withoutBackslashes =
    !String.equal(Filename.dir_sep, "/")
      ? String.split(~sep=Filename.dir_sep, s) |> String.concat(~sep="/") : s;
  /**
   * This is not entirely safe (stop gap until proper path manipulation
   * library.  (What if they have a literal slash at the end of a path segment
   * (super edge case)): /users/person-who-makes-really-dumb-paths/MyPath\//
   */
  String.split(~sep="//", withoutBackslashes)
  |> String.concat(~sep="/");
};

let removeLastNormalizedSep = s => {
  let len = String.length(s);
  if (!String.is_empty(s) && s.[len - 1] === '/') {
    String.sub(s, ~pos=0, ~len=len - 1);
  } else {
    s;
  };
};
let removeLast = lst =>
  switch (List.rev(lst)) {
  | [] => []
  | [hd, ...tl] => List.rev(tl)
  };

let rec relativizeRelativePathsImp = (from, p) =>
  switch (from, p) {
  | ([], []) => []
  | ([fromHd], [pHd]) => ["..", pHd]
  | ([fromHd, ...fromTl], [pHd, ...pTl]) =>
    if (fromHd == pHd) {
      relativizeRelativePathsImp(fromTl, pTl);
    } else {
      [
        "..",
        ...relativizeRelativePathsImp(removeLast(from), [pHd, ...pTl]),
      ];
    }
  | ([fromHd], []) => relativizeRelativePathsImp([], [])
  | ([fromHd, fromTl, ...fromTlTl], []) => [
      "..",
      ...relativizeRelativePathsImp(fromTlTl, []),
    ]
  | ([], [pHd, ...pTl]) => p
  };

/*
 * Relativizes two relative paths, assuming all of the directory slashes have
 * been normalized.
 *
 * relativizeNormalizedRelativePaths "./foo/bar/baz.js" "./foo/hi.js" == "../hi.js"
 *
 * relativizeNormalizedRelativePaths "./foo/bar/barbar/baz.js" "./foo/hi.js" == "../../hi.js"
 * relativizeNormalizedRelativePaths "./foo/bar/baz.js" "./foo/bye/now.js" == "../bye/now.js"
 * relativizeNormalizedRelativePaths "./bar/baz.js" "./bye/now.js"
 * relativizeNormalizedRelativePaths "../bye" + relativizeNormalizedRelativePaths "./baz.js" "./now.js"
 *
 * relativizeNormalizedRelativePaths "./foo/bar/baz.js" "./foo/bar/baz2.js" == "./baz2.js"
 */
let relativizeNormalizedRelativePaths = (from, p) =>
  /* let from = normalizeSeps(from); */
  /* let p = normalizeSeps(p); */
  if (String.equal(from, p)) {
    "./";
  } else {
    switch (
      String.find_substring("./", from, 0),
      String.find_substring("./", from, 0),
    ) {
    | exception Not_found =>
      raise(Sys_error("Paths not both relative " ++ from ++ ", " ++ p))
    | (0, 0) =>
      let from = String.sub(~pos=2, ~len=String.length(from) - 2, from);
      let p = String.sub(~pos=2, ~len=String.length(p) - 2, p);
      let res =
        String.concat(
          ~sep="/",
          relativizeRelativePathsImp(
            String.split_char(~sep='/', from),
            String.split_char(~sep='/', p),
          ),
        );

      if (String.length(res) > 1 && res.[0] === '.' && res.[1] === '.') {
        res;
      } else {
        "./" ++ res;
      };
    | (_, _) =>
      raise(
        Sys_error("Paths not both relative(other) " ++ from ++ ", " ++ p),
      )
    };
  };

/**
 * Relativizes two absolute paths if they are on the same "drive". Only gives
 * correct result if they are on the same drive.
 */
let relativizeAbsolutePathsOnSameDrive = (from, p) => {
  let from = String.trim(from);
  let p = String.trim(p);
  let from = normalizeSeps(from);
  let p = normalizeSeps(p);
  let fName = "relativizeAbsolutePathsOnSameDrive";
  if (String.is_empty(from)) {
    raise(Sys_error("Encountered empty " ++ fName ++ "(from)"));
  };
  if (String.is_empty(p)) {
    raise(Sys_error("Encountered empty " ++ fName ++ "(to)"));
  };
  if (from.[0] === '.') {
    raise(Sys_error("Encountered rel path " ++ fName ++ "(from)" ++ from));
  };
  if (p.[0] === '.') {
    raise(Sys_error("Encountered rel path " ++ fName ++ "(to)" ++ p));
  };
  /* Little trick */
  relativizeNormalizedRelativePaths("./" ++ from, "./" ++ p);
};

/**
 * Concats a relative path with no leading dot to an absolute path.  This is a
 * stop gap - should move to reason-native path module for something more
 * robust.
 */
let concat = (abs, rel) => {
  normalizeSeps(abs ++ "/" ++ rel);
};

let normalizeRelativeToCwd = p => {
  let len = String.length(p);
  if (len > 2 && p.[0] === '.' && (p.[1] === '/' || p.[1] == '\\')) {
    let cd = Sys.getcwd();
    normalizeSeps(concat(cd, String.sub(p, ~pos=2, ~len=len - 2)));
  } else {
    p;
  };
};
