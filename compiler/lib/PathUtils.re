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
