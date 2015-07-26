<?php

// $this->response->address

class Color {
	public $color;
	public $color_model;

	public function __construct() {
		$this->color = "blue";
		$this->color_model = "HSL";
	}	

	public function getColor() {
		return $this->color;
	}
}

class Foo {
	
	public $color;

	public function bar() {
		$c = new Color();
		$this->color = $c;
	}

}


$foo = new Foo();
$foo->bar();

var_dump($foo);


var_dump($foo->color->color_model);


if($foo->color->color_model) {
	echo "Test 1\n";
}
if(empty($foo->color->color_model)) {
        echo "empty() true\n";
}
if(isset($foo->color->color_model)) {
        echo "isset() true\n";
}




//$voo = new Color();

//var_dump($voo);

