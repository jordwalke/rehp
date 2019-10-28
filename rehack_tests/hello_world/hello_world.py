Out_of_memory = [248, caml_new_string("Out_of_memory"), -1]
Sys_error = [248, caml_new_string("Sys_error"), -2]
Failure = [248, caml_new_string("Failure"), -3]
Invalid_argument = [248, caml_new_string("Invalid_argument"), -4]
End_of_file = [248, caml_new_string("End_of_file"), -5]
Division_by_zero = [248, caml_new_string("Division_by_zero"), -6]
Not_found = [248, caml_new_string("Not_found"), -7]
Match_failure = [248, caml_new_string("Match_failure"), -8]
Stack_overflow = [248, caml_new_string("Stack_overflow"), -9]
Sys_blocked_io = [248, caml_new_string("Sys_blocked_io"), -10]
Assert_failure = [248, caml_new_string("Assert_failure"), -11]
Undefined_recursive_module = [248, caml_new_string("Undefined_recursive_module"), -12]
caml_register_global(11, Undefined_recursive_module, "Undefined_recursive_module")
caml_register_global(10, Assert_failure, "Assert_failure")
caml_register_global(9, Sys_blocked_io, "Sys_blocked_io")
caml_register_global(8, Stack_overflow, "Stack_overflow")
caml_register_global(7, Match_failure, "Match_failure")
caml_register_global(6, Not_found, "Not_found")
caml_register_global(5, Division_by_zero, "Division_by_zero")
caml_register_global(4, End_of_file, "End_of_file")
caml_register_global(3, Invalid_argument, "Invalid_argument")
caml_register_global(2, Failure, "Failure")
caml_register_global(1, Sys_error, "Sys_error")
caml_register_global(0, Out_of_memory, "Out_of_memory")
a = caml_new_string("hello world")
caml_fresh_oo_id(0)
caml_ml_open_descriptor_in(0)
stdout = caml_ml_open_descriptor_out(1)
caml_ml_open_descriptor_out(2)


def flush_all(param):
    def iter(param):
        param__0 = param
        while True:
            if param__0:
                l = param__0[2]
                a = param__0[1]
                try:
                    caml_ml_flush(a)
                except:
                    b = caml_wrap_exception(b)
                    if b[1] is not Sys_error:
                        raise (caml_wrap_thrown_exception_reraise(b))
                param__0 = l
                continue
            return 0

    return iter(caml_ml_out_channels_list(0))


def output_string(oc, s):
    return caml_ml_output(oc, s, 0, caml_ml_string_length(s))


def print_endline(s):
    output_string(stdout, s)
    caml_ml_output_char(stdout, 10)
    return caml_ml_flush(stdout)


def do_at_exit(param):
    return flush_all(0)


print_endline(a)
do_at_exit(0)
