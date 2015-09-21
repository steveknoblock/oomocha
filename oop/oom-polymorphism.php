<?php

/*
 * Animal Speaks
 * A typical example of polymorphism.
 * Steve Knoblock 2015
 * https://github.com/steveknoblock/oomocha
 */


 interface InterfaceAnimal { 

	public function speak();
 }


 class Animal implements InterfaceAnimal {

 	public function speak() { return false; }
 }


 class Cat extends Animal {

 	function speak() {
		return "Meow!";
	}
 }


 class Dog extends Animal {

 	function speak() {
		return "Woof!";
	}
 }


$dog = new Dog;
$dog->speak();

