/* Deals with target language module loaders. Replaces templates with module
     names, line-by-line, while splitting into the
     header and footer region. Upon substituting, the header and footer is
     returned, so that code can later be injected in between them.  The goal is
     that without replacing anything, the custom template string can remain valid
     syntax in the host language.  A capital CompilationUnit becomes an
     uppercased form of the module name and a lowercase x becomes a lowercased
     form. Typically you should always use uppercase unless absolutely necessary
     as that willb be the casing used throughout the compilation output.

     Inside of the template, this:
       contentBefore ____CompilationUnitName contentAfter
     Will be expanded to:
       contentBefore ModuleName contentAfter

     Inside of the template, this:
       contentBefore ____compilationUnitName contentAfter
     Will be expanded to:
       contentBefore moduleName contentAfter

    The replacement is line-by-line so that lines may be expanded once per
    dependency. Any time `{DependencyCompilationUnitName}` appears, that line
    will be expanded to multiple lines (one per depdendency).

     Inside of the template, this:
       let ____ForEachDependencyCompilationUnitName = blah
     Will be expanded to:
       let ModuleDepOne = blah
       let ModuleDepTwo = blah
       let ModuleDepThree = blah

     Inside of the template, this:
       let ____forEachDependencyCompilationUnitName = "____ForEachDependencyCompilationUnitName"
     Will be expanded to:
       let moduleDepOne = "ModuleDepOne"
       let moduleDepTwo = "ModuleDepTwo"
       let moduleDepThree = "ModuleDepThree"

    The header and footer is split on a comment equalling
    /*____CompilationOutput*/


    Returns header_text * footer_text

   */
let substitute_and_split:
  /* Custom template text */
  (
    /* Template */
    string,
    /* string hashes comment: Git version of compiler, input hashes, bytecode hash */
    string,
    /* Module name */
    string,
    /* Module dependency list */
    list(string)
  ) =>
  /* Header, ident, footer */
  (string, int, string);

/* Normalizes a module name (by same convention that substitute_and_split does)
   Some names tend to be reserved (class) names in languages so this
   differentiates them. */
let normalize_module_name: string => string;
