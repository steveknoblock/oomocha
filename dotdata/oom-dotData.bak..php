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
	    /**
     * Flatten array, preventing key collisions,
     * by concatenating keys using dot notation.
     * J. Bruni answer to
     * http://stackoverflow.com/questions/9546181/flatten-multidimensional-array-concatenating-keys
     * @param $array
     * @param string $prefix
     * @return array
     */

    public function array_flat($array, $prefix = '')
    {
        $result = array();

        foreach ($array as $key => $value)
        {
            $new_key = $prefix . (empty($prefix) ? '' : '.') . $key;

            if (is_array($value))
            {
                $result = array_merge($result, $this->array_flat($value, $new_key));
            }
            else
            {
                $result[$new_key] = $value;
            }
        }

        return $result;
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
  'company' => "Hammer Restoration"
  'first_name' => "Roxanne"
  'last_name' => "Moreno"
  'email' => "rmoreno@hammerrestoration.com"
  'phone' => "989-773-3473"
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
  string(6) "Moreno"
  'addresses.company' =>
  string(18) "Hammer Restoration"
  'addresses.street_1' =>
  string(26) "1733 Industrial Park Drive"
  'addresses.street_2' =>
  string(0) ""
  'addresses.city' =>
  string(12) "Mt. Pleasant"
  'addresses.state' =>
  string(8) "Michigan"
  'addresses.zip' =>
  string(5) "48858"
  'addresses.country' =>
  string(13) "United States"
  'addresses.country_iso2' =>
  
 */

	
	
