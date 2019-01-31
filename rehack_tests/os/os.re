print_endline("Prints current working directory:");
print_string(Sys.getcwd());
print_newline();

print_endline("Prints current PATH:");
switch (Sys.getenv_opt("PATH")) {
| None => print_string("No Path")
| Some(p) => print_string(p)
};
print_newline();
