open Stdlib;
module Fp = RehpFp;
type output = {
  dirRelativeToOutput: Fp.t(Fp.relative),
  normalizedCompilationUnit: string,
  filename: string,
};
let dependency_outputs: ref(list(output)) = (ref([]): ref(list(output)));

let set = outputs => dependency_outputs.contents = outputs;

let get = () => dependency_outputs.contents;

/* Ensures a directory exists. Will fail if path is a non-dir file.
      Containing directory must already exist.
      Sys.is_directory fails if the path doesn't exist.
      But on windows Sys.file_exists fails if it is an existing directory!
   */
let existsAndIsDir = s =>
  try(Sys.is_directory(RehpFp.toDebugString(s))) {
  | Sys_error(_) => false
  };

let ensureDir = fp => {
  let dirExists = existsAndIsDir(fp);
  if (!dirExists) {
    if (Sys.file_exists(RehpFp.toDebugString(fp))) {
      raise(
        Invalid_argument(
          "Directory "
          ++ RehpFp.toDebugString(fp)
          ++ " already exists but is not a directory.",
        ),
      );
    };
    /* TODO: Drop the dependency on Unix */
    Unix.mkdir(RehpFp.toDebugString(fp), 0o755);
  };
};
let dirContents = dir => {
  let exists = Sys.file_exists(Fp.toString(dir));
  if (exists) {
    if (!Sys.is_directory(Fp.toString(dir))) {
      raise(
        Invalid_argument(
          "Directory "
          ++ Fp.toString(dir)
          ++ " already exists but is not a directory.",
        ),
      );
    } else {
      let dirContents = Sys.readdir(Fp.toString(dir));
      Array.to_list(dirContents);
    };
  } else {
    [];
  };
};

let scanModulesInOneDir = (ext, forOutDir, inDir) =>
  if (Fp.eq(inDir, forOutDir)) {
    [];
  } else {
    let contents = dirContents(inDir);
    let backend_ext = Backend.Current.extension();
    let dot_backend_ext = "." ++ backend_ext;
    if (List.find_opt(~f=nm => nm == "rehp-output-dir.txt", contents) === None) {
      [];
    } else {
      let matchingSuffix =
        List.filter_map(contents, ~f=nm => {
          switch (ext) {
          | None =>
            if (Filename.check_suffix(nm, dot_backend_ext)) {
              Some((nm, Filename.chop_suffix(nm, dot_backend_ext)));
            } else {
              None;
            }
          | Some(e) =>
            let dot_ext = "." ++ e;
            if (Filename.check_suffix(nm, dot_backend_ext)) {
              Some((nm, Filename.chop_suffix(nm, dot_backend_ext)));
            } else if (Filename.check_suffix(nm, dot_ext)) {
              Some((nm, Filename.chop_suffix(nm, dot_ext)));
            } else {
              None;
            };
          }
        });

      List.rev_map(matchingSuffix, ~f=((file_name, base_name)) => {
        {
          dirRelativeToOutput:
            Fp.relativizeExn(~source=forOutDir, ~dest=inDir),
          normalizedCompilationUnit:
            Parse_bytecode.normalize_module_name(base_name),
          filename: file_name,
        }
      });
    };
  };

/* We will assume build rules that place artifacts at the following locations:
 *
 * Finds the .js directory for a compiled artifact for the "current project".
 * _build/default/path-to/SomeLibrary.cma.js/rehp-output-dir.txt
 * _build/default/.js/package-dependency-name/PackageDependency.cma.js/rehp-output-dir.txt
 * _build/default/.js/runtime/runtime.js/runtime.js/rehp-output-dir.txt
 *   |
 *   v
 */

/* Commonly used directory in dune build output:
 *
 * Finds the .js directory for a compiled artifact for the "current project".
 * _build/default/path/to/SomeLibrary.cma.js/
 *   |
 *   v
 * _build/default/.js
 */
let findDuneJsDirIfCurrentProjectArtifacts = outputLibDir => {
  let parentDir = Fp.dirName(outputLibDir);
  let gpDir = Fp.dirName(parentDir);
  let ggpDir = Fp.dirName(gpDir);
  let containingDirJs = Fp.append(parentDir, ".js");
  let parentDirJs = Fp.append(parentDir, ".js");
  let gpDirJs = Fp.append(gpDir, ".js");
  let ggpDirJs = Fp.append(ggpDir, ".js");
  if (existsAndIsDir(containingDirJs)) {
    Some(containingDirJs);
  } else if (existsAndIsDir(parentDirJs)) {
    Some(parentDirJs);
  } else if (existsAndIsDir(gpDirJs)) {
    Some(gpDirJs);
  } else if (existsAndIsDir(ggpDirJs)) {
    Some(ggpDirJs);
  } else {
    None;
  };
};

/**
 * Finds the .js directory for a compiled artifact that is itself a package
 * dependency.
 * _build/default/.js/some-library-name/SomeLibrary.cma.js/
 *                 ^                    |
 *                 +--------------------+
 */
let findDuneJsDirIfPackageDependencyArtifacts = outputLibDir => {
  let parentDir = Fp.dirName(outputLibDir);
  let gpDir = Fp.dirName(Fp.dirName(outputLibDir));
  let baseParent = Fp.baseName(parentDir);
  let baseGp = Fp.baseName(gpDir);
  switch (baseParent, baseGp) {
  | (Some(".js"), _) => Some(parentDir)
  | (_, Some(".js")) => Some(gpDir)
  | _ => None
  };
};

let rec findAllDirsMaxDeep = (~maxDepth, startDir) =>
  if (maxDepth === 0) {
    [];
  } else {
    let childNames = dirContents(startDir);
    List.map(
      childNames,
      ~f=childName => {
        let fullChildDir = Fp.append(startDir, childName);
        if (existsAndIsDir(fullChildDir)) {
          [
            fullChildDir,
            ...findAllDirsMaxDeep(~maxDepth=maxDepth - 1, fullChildDir),
          ];
        } else {
          [];
        };
      },
    )
    |> List.concat;
  };

/* Intentionally don't return the contents of the output dir because they are
 * stale at this point. The main compiler entrypoint will append the expected
 * dependencies to the returned list. */
let getPotentialDependencyOutputs = (~ext=?, outputLibDir) => {
  let gpDir = Fp.dirName(Fp.dirName(outputLibDir));
  let allSiblingDirs = findAllDirsMaxDeep(~maxDepth=2, gpDir);
  switch (
    findDuneJsDirIfPackageDependencyArtifacts(outputLibDir),
    findDuneJsDirIfCurrentProjectArtifacts(outputLibDir),
  ) {
  | (None, None) =>
    List.concat(
      List.map(~f=scanModulesInOneDir(ext, outputLibDir), allSiblingDirs),
    )
  | (Some(jsDir), Some(_))
  | (None, Some(jsDir))
  | (Some(jsDir), None) =>
    let buildOutputDir = Fp.dirName(jsDir);
    let potentialDirs = findAllDirsMaxDeep(~maxDepth=4, buildOutputDir);
    List.concat([
      List.concat(
        List.map(~f=scanModulesInOneDir(ext, outputLibDir), allSiblingDirs),
      ),
      List.concat(
        List.map(~f=scanModulesInOneDir(ext, outputLibDir), potentialDirs),
      ),
    ]);
  };
};

let removeUnexpectedFiles = (expected, observed) => {
  let expected = List.sort(~cmp=compare, expected);
  let observed = List.sort(~cmp=compare, observed);
  let rec toRemove = (cur, expected, observed) =>
    switch (expected, observed) {
    | ([], []) => cur
    | ([expect_hd, ...expectTl], []) => cur /* This is actually a problem - what happened? */
    | ([], [observeHd, ...observeTl]) =>
      toRemove([observeHd, ...cur], [], observeTl)
    | ([expect_hd, ...expectTl], [observeHd, ...observeTl]) =>
      Fp.eq(expect_hd, observeHd)
        ? toRemove(cur, expectTl, observeTl)
        : toRemove([observeHd, ...cur], expected, observeTl)
    };

  List.iter(toRemove([], expected, observed), ~f=file =>
    try(Sys.remove(Fp.toString(file))) {
    | Sys_error(_) => ()
    }
  );
};
