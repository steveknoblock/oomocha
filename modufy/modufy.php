<?php

/*

oomocha
Python style module loader.

This makes fantastic things happen.

Steve Knoblock 7/25/2015

T_USE is a PHP token :(

*/

define('PHP_EXT', '.php');	


class Modufy {

	public function useme($moduleName) {
		global ${$moduleName}; // automatically inject into global namespace

		$pathParts = [ 'modules', $moduleName . PHP_EXT ];

		$path = join(DIRECTORY_SEPARATOR, $pathParts);

		// load module

		require_once $path;
		 
		// instantiate module from class
		${$moduleName} = new $moduleName;
	}

}


// fake autoload
$m = new Modufy();
// fake use statement
$m->useme('Pluto');


// demo
$Pluto->hello();

