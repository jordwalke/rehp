/**
 * Exception for problems that the user is responsible for - something wrong
 * with their code for example.
 * Could be used beyond macros as well. Used to surface a user facing message
 * with potential file/lineno.
 */
exception UserError(string, option(Parse_info.t));

let backend_unsupported_require = path =>
  "The backend was not capable of loading the require module "
  ++ path
  ++ "This is likely caused by a macro with a <@require*> tag that isn't"
  ++ "supported by your backend.";

let require_unsupported_backend = path =>
  "Somewhere in this file you are calling macro that has a <@require*> tag "
  ++ " but your backend doesn't support require tags. The macro definition "
  ++ "itself is requiring "
  ++ path
  ++ ". That macro may be defined in another file but called here.";

let weirdArgumentsToCamlRequire =
  "Something passed an invalid argument to caml_require which is likely caused "
  ++ "by invalid contents of a <@require*> macro. "
  ++ "It should only be a single string but something is interpretting is as more "
  ++ "than one string or richer children content etc."
  ++ "This is likely caused by a macro with a <@require*> tag that isn't"
  ++ "supported by your backend.";
