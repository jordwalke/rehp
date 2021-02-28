
let rec is_even 
    = fun | 0 => true | n => is_odd(n - 1)
and is_odd 
    = fun | 0 => false | n => is_even(n - 1);
