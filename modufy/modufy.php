<?php

/*

A software Oomocha.
This makes fantastic things happen.
Steve Knoblock 7/25/2015

This is a simple experiment designed to learn how the Python
module system works. It covers just the basics of understanding
how the idea of modularity can go beyond the idea of merely
including code. Modufy is intended explore not just including
code, but making it ready to use in a modular and object-oriented way.

Python allows the programmer to essentially say this in PHP:

$m->use_('Pluto');
$Pluto->setType('Planet');
$Pluto->hello();


The word use is reserved in PHP, so I can't use use it as a function name.
T_USE is a PHP token :( At least use_() is distinctive. :)

*/

define('PHP_EXT', '.php');	


class Modufy {

	public function use_($moduleName) {
		global ${$moduleName}; // automatically inject into global namespace

		$pathParts = [ 'modules', $moduleName . PHP_EXT ];

		$path = join(DIRECTORY_SEPARATOR, $pathParts);

		// load module
		require_once $path;
		 
		 /*
		 	This is a tricky bit of code. It creates a new
		 	instance of a module object from the code loaded
		 	by the include (require).
		 */

		// instantiate module from class
		${$moduleName} = new $moduleName;
	}

}


// fake autoload
$m = new Modufy();
// fake use statement
$m->use_('Pluto');


// demo
$Pluto->hello();

