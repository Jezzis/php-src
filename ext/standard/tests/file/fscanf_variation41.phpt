--TEST--
Test fscanf() function: usage variations - unsigned formats with resource
--FILE--
<?php

/*
  Prototype: mixed fscanf ( resource $handle, string $format [, mixed &$...] );
  Description: Parses input from a file according to a format
*/

/* Test fscanf() to scan resource type using different unsigned format types */

$file_path = __DIR__;

echo "*** Test fscanf(): different unsigned format types with resource ***\n";

// create a file
$filename = "$file_path/fscanf_variation41.tmp";
$file_handle = fopen($filename, "w");
if($file_handle == false)
  exit("Error:failed to open file $filename");


// resource type variable
$fp = fopen (__FILE__, "r");
$dfp = opendir ( __DIR__ );

// array of resource types
$resource_types = array (
  $fp,
  $dfp
);

$unsigned_formats = array( "%u", "%hu", "%lu", "%Lu", " %u", "%u ", "% u", "\t%u", "\n%u", "%4u", "%30u", "%[0-9]", "%*u");

$counter = 1;

// writing to the file
foreach($resource_types as $value) {
  @fprintf($file_handle, "%s", $value);
  @fprintf($file_handle, "\n");
}
// closing the file
fclose($file_handle);

// opening the file for reading
$file_handle = fopen($filename, "r");
if($file_handle == false) {
  exit("Error:failed to open file $filename");
}

$counter = 1;
// reading the values from file using different unsigned formats
foreach($unsigned_formats as $unsigned_format) {
  // rewind the file so that for every foreach iteration the file pointer starts from bof
  rewind($file_handle);
  echo "\n-- iteration $counter --\n";
  while( !feof($file_handle) ) {
    var_dump( fscanf($file_handle,$unsigned_format) );
  }
  $counter++;
}

// closing the resources
fclose($fp);
closedir($dfp);

echo "\n*** Done ***";
?>
--CLEAN--
<?php
$file_path = __DIR__;
$filename = "$file_path/fscanf_variation41.tmp";
unlink($filename);
?>
--EXPECTF--
*** Test fscanf(): different unsigned format types with resource ***

-- iteration 1 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 2 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 3 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 4 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 5 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 6 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 7 --

Warning: fscanf(): Bad scan conversion character " " in %s on line %d
NULL

Warning: fscanf(): Bad scan conversion character " " in %s on line %d
NULL
bool(false)

-- iteration 8 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 9 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 10 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 11 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 12 --
array(1) {
  [0]=>
  NULL
}
array(1) {
  [0]=>
  NULL
}
bool(false)

-- iteration 13 --
array(0) {
}
array(0) {
}
bool(false)

*** Done ***
