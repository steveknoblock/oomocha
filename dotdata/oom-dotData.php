<?php

/* A flattened hierarchy 
 */

class dotData {
	
	
	/*
	 * Convert dot data to array
	 */
	public function unDotData() {
		
		// foreach element
		// if key is dot notation
		//     explode into array
		//     add to output
	}
	
	/*
	 * Convert array to dot data
	 */
	public function toDotData($data) {
        $data = $this->xml2array($data);
		return $data;
	}
	
	
	public function fromJson () {}
	
	public function toJson() {}
	
	
	
	
	// k dot antczak at livedata dot pl 22-Apr-2011 01:08
// http://theserverpages.com/php/manual/en/ref.simplexml.php
    public function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_array ( $node ) ) ? $this->xml2array ( $node ) : $node;
			print_r($out);
        return $out;
    }
}


// test

$a = array(
	'id'			=> '1',
	'first_name'	=> 'Jessica',
	'last_name'		=> 'Rabbit',
	'email'			=> 'jessica.rabbit@example.com',
	'phone'			=> '555-555-5555',
	'date_created'	=> 'Mon, 08 Apr 2013 14:48:56 +0000',
	'date_modified'	=> 'Mon, 08 Apr 2013 14:48:56 +0000',
	'addresses'		=> array (
          'id' => '1',
          'company'		=> 'Studio',
          'first_name'	=> 'Jessica',
          'last_name'	=> 'Rabbit',
          'email'		=> 'jessica.rabbit@example.com'
        )
);

$dd = new DotData;
var_dump( $dd->xml2array($a) );









/*




array(25) {
  'id' => "60"
  'company' => "Auto Restoration"
  'first_name' => "Roxanne"
  'last_name' => "M"
  'email' => "rm@example.com"
  'phone' => "989-555-5555"
  'date_created' => "Mon, 08 Apr 2013 14:48:56 +0000"
  'date_modified' => "Mon, 08 Apr 2013 14:48:56 +0000"
  'store_credit' => "0.0000"
  'addresses.id' =>
  int(27)
  'addresses.customer_id' =>
  int(60)
  'addresses.first_name' =>
  string(7) "Roxanne"
  'addresses.last_name' =>
  string(6) "M"
  'addresses.company' =>
  string(18) "Auto Restoration"
  'addresses.street_1' =>
  string(26) "1776 Wheel Park Drive"
  'addresses.street_2' =>
  string(0) ""
  'addresses.city' =>
  string(12) "Mt. Pleasant"
  'addresses.state' =>
  string(8) "PA"
  'addresses.zip' =>
  string(5) "48858"
  'addresses.country' =>
  string(13) "United States"
  'addresses.country_iso2' =>
  
 */

	
	
