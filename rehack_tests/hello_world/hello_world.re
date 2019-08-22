let rec detectList: type o. (~maxLength: int, o) => bool =
  (~maxLength, o) =>
    if (maxLength === 0) {
      true;
    } else {
      let magicO = Obj.magic(o);
      let tag = Obj.tag(magicO);
      tag === Obj.string_tag || tag === Obj.double_array_tag
        ? {
          print_endline("NOT A LIST BECAUSE TAG IS: " ++ string_of_int(tag));
          false;
        }
        : tag === Obj.int_tag
            ? magicO == Obj.repr([])
            : {
              let size = Obj.size(magicO);
              tag === Obj.first_non_constant_constructor_tag
              && size === 2
              && detectList(~maxLength=maxLength - 1, Obj.field(magicO, 1));
            };
    };

detectList(3, 4);
