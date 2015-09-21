<?php

/* The foos of foosville,
	stay there all day
	until they are asked
	to come lend a flan.

*/

class Foo {

    protected $foosville = array();

    public function getFoos() {
        if(empty($this->foosville)){
            // get foos from foosville
        } else {
            // we already have some foos
            return $this->foosville;
        }
    }

}
