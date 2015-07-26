<?php

/*

oomocha
Python style module loader.
Steve Knoblock 7/25/2015

$path = join(DIRECTORY_SEPARATOR, $pathParts)

*/

define('PHP_EXT', '.php');

$moduleName = 'Pluto';

// load module

require_once 'modules/' . $moduleName . PHP_EXT;
 
// instantiate module from class
$moduleName = new $moduleName;

var_dump($moduleName);

// demo
$Pluto->hello();

