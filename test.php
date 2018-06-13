<?php

global $_jsContext;


$_jsContext = "hi";

function f() {
  var_dump($_jsContext);
}

f();
