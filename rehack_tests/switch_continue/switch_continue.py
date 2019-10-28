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
caml_fresh_oo_id(0)


def string_of_int(n):
    return caml_new_string("" + n)


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
                    a = caml_wrap_exception(a)
                    if a[1] is not Sys_error:
                        raise (caml_wrap_thrown_exception_reraise(a))
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


def h0(i):
    i__0 = i
    while True:
        match = 1 if 0 < i__0 else 0
        if 0 is match:
            return 42
        i__1 = int(i__0 + -1)
        i__0 = i__1
        continue


print_endline(string_of_int(h0(4)))


def g0(i):
    i__0 = i
    while True:
        if 0 is i__0:
            return 10
        if 10 < i__0:
            i__1 = int(i__0 + -5)
            i__0 = i__1
            continue
        i__2 = int(i__0 + -1)
        i__0 = i__2
        continue


def g1(i):
    x = 10 if 0 is i else g1(int(i + -5)) if 10 < i else g1(int(i + -1))
    return int(x + 1)


print_endline(string_of_int(g0(3)))
print_endline(string_of_int(g1(2)))


def f0(t):
    if t is 0:
        return 1
    else:
        if t is 1:
            return 2
        else:
            return 3


def f1(t):
    t__0 = t
    while True:
        if t__0 is 0:
            t__0 = 1
            continue
        else:
            if t__0 is 1:
                t__0 = 2
                continue
            else:
                return 3


def f2(t):
    if t is 0:
        x = f2(1)
        break
    else:
        if t is 1:
            x = f2(2)
            break
        else:
            x = 3
    return int(x + 1)


def f3(t):
    t__0 = t
    while True:
        if t__0 is 0:
            t__0 = 1
            continue
        else:
            if t__0 is 1:
                if t__0 is 0:
                    t__0 = 1
                    continue
                else:
                    if t__0 is 1:
                        t__0 = 2
                        continue
                    else:
                        return 3
            else:
                return 3


print_endline(string_of_int(f0(0)))
print_endline(string_of_int(f1(0)))
print_endline(string_of_int(f2(0)))
print_endline(string_of_int(f3(0)))


def h0__0(c):
    while True:
        if 40 is c:
            continue
        if 123 <= c:
            if not (126 <= c):
                switcher = int(c + -123)
                if switcher is 0:
                    continue
                else:
                    if switcher is 1:
                        break
                    else:
                        raise (caml_wrap_thrown_exception(Not_found))
        else:
            if 95 is c:
                continue
        raise (caml_wrap_thrown_exception(Not_found))


def h1(t):
    while True:
        if 0 is t:
            if t is 0:
                continue
            else:
                if t is 1:
                    return 2
                else:
                    return 3
        if t is 0:
            return 1
        else:
            if t is 1:
                return 2
            else:
                return 3


print_endline(string_of_int(h0__0(104)))
print_endline(string_of_int(h1(0)))
do_at_exit(0)
