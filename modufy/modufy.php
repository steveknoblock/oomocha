<?php

/*

oomocha
Python style module loader.
Steve Knoblock 7/25/2015

$path = join(DIRECTORY_SEPARATOR, $pathParts)

*/

// Test module
$moduleName = 'Pluto';


define('PHP_EXT', '.php');

$pathParts = [ 'modules', $moduleName . PHP_EXT ];

$path = join(DIRECTORY_SEPARATOR, $pathParts);

// load module

require_once $path;
 
// instantiate module from class
${$moduleName} = new $moduleName;


// demo
$Pluto->hello();

