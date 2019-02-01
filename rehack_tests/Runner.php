#!/usr/local/bin/hhvm -vEval.Jit=false
<?php

# Invoke like php ./path/to/Runner.php -I ./include-this-dir -I ./and/that-dir run_this_file.php -r 'runThisLine::ofCode()'

const PRINT_UNCAUGHT_EXCEPTIONS = 1;

function exception_handler($exception) {
  print ("\n\n===================================\n");
  print ("Uncaught Exception: " . ($exception->getCode() ? $exception->getCode() : "") . "\n");
  print ("===================================\n");
  if ($exception instanceof \Rehack\RehpExceptionBox) {
    print ("\nMessage:\n\n" . $exception->display() . "\n");
  } else {
    print ("\nMessage:\n\n" . $exception->getMessage() . "\n");
  }
  print ("\nStack:\n\n");
  print ($exception->getFile() . ":" . $exception->getLine() . "\n");
  print (\Rehack\StackPrinter::callStack($exception->getTrace()). "\n");
  if ($exception->getPrevious()) {
    print ("Uncaught Exception Has Previous Exception - not printed here.\n");
  }
}

if (PRINT_UNCAUGHT_EXCEPTIONS) {
  set_exception_handler('exception_handler');
}

$runner_dir = dirname(__FILE__);
$arg_count = count($argv);
$args = array($runner_dir);
if ($arg_count > 1) {
  $args = array_slice($argv, 1);
}
$args_count = count($args);
$last = null;
$search_dirs = [];
$run_code = [];
$main_files = [];
for($i=0; $i < $args_count; $i++) {
  if ($last == "-I") {
    $search_dirs[] = $args[$i];
  } else if ($last == "-r") {
    $run_code[] = $args[$i];
  } else {
    if ($args[$i] != "-I" && $args[$i] != "-r") {
      $main_files[] = $args[$i];
    }
  }
  $last = $args[$i];
}

if (empty($main_files)) {
  throw new ErrorException("You did not specify any main files. Call like php Runner.php -I searchDir path/to/mainfile.php");
}

$search_dirs_count = count($search_dirs);
$all_files = array();

for($i=0; $i < $search_dirs_count; $i++) {
  $file_or_dir = $search_dirs[$i];
  $complete_search_path = $file_or_dir;
  if (is_dir($complete_search_path)) {
    $search_dir_subcontents = scandir($complete_search_path);
    $subdir_count = count($search_dir_subcontents);
    for($j=0; $j < $subdir_count; $j++) {
      $subfile_or_dir = $search_dir_subcontents[$j];
      if ($subfile_or_dir != "." && $subfile_or_dir != "..") {
        $complete_subpath = $file_or_dir . DIRECTORY_SEPARATOR . $subfile_or_dir;
        if (!is_dir($complete_subpath)) {
          $pathInfo = pathinfo($complete_subpath);
          if (!empty($pathInfo["extension"]) && $pathInfo["extension"] == "php") {
            $all_files[] = $complete_subpath;
          }
        }
      }
    }
  } else {
    if (pathinfo($complete_subpath)["extension"] == "php") {
      $all_files[] = $complete_search_path;
    }
  }
}

function normalize_classname($classname) {
  $matches = array();
  $match = preg_match('/.+\\\\(.+)/', $classname, $matches);
  if (!$match) {
    $normalized = $classname;
  } else {
    $normalized = $matches[1];
  }
  // String is one of the built in class names.
  if ($normalized == "String_") {
    return "String";
  }
  if ($normalized == "List_") {
    return "List";
  }
  // Array is one of the built in class names.
  if ($normalized == "Array_") {
    return "Array";
  }
  return $normalized;
}



// Remove file extensions because many files have something like x.cmo.php
function remove_file_ext($file) {
  return preg_replace('/\..+$/','',$file);
}

// Mimic the Facebook style autoloading behavior.
spl_autoload_register(function ($class) use($all_files) {
  $normalized_classname = normalize_classname($class);
  $lowerclassname = strtolower($normalized_classname);
  $file_count = count($all_files);
  for($i=0; $i < $file_count; $i++) {
    $file = $all_files[$i];
    if (pathinfo($file)["extension"] == "php") {
      // file/path/ModuleName.cmo.php => modulename.cmo.php
      $lowerbasename = strtolower(basename($file));
      // modulename.cmo.php => modulename
      $lowerbasename = remove_file_ext($lowerbasename);
      // Some classnames have a trailing underscore
      if ($lowerbasename == $lowerclassname . "_" || $lowerbasename == $lowerclassname) {
        require_once $file;
      } else {
      }
    }
  }
});

for($i=0; $i < count($main_files); $i++) {
  require_once $main_files[$i];
}

for($i=0; $i < count($run_code); $i++) {
  eval($run_code[$i]);
}
