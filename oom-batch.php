<?php
/**
 * Created by PhpStorm.
 * User: sknoblock
 * Date: 4/24/2015
 * Time: 9:28 AM
 */


$accounts = array(
    array(
    'id' =>
     "1",
    'company' =>
     "",
    'first_name' =>
     "Zach",
    'last_name' =>
     "Bluett",
    'email' =>
     "zach@intuitsolutions.net",
    'phone' =>
     "717-825-3920",
    'date_created' =>
     "Fri, 08 Mar 2013 22:52:32 +0000",
    'date_modified' =>
     "Fri, 08 Mar 2013 22:52:32 +0000",
    'store_credit' =>
     "0.0000",
    'registration_ip_address' =>
     "173.15.155.35",
    'customer_group_id' =>
     "0",
    'notes' =>
     "",
    'tax_exempt_category' =>
     "",
    'addresses' =>
     "",
    ),

    array(
        'id' =>
            "2",
        'company' =>
            "",
        'first_name' =>
            "Zach",
        'last_name' =>
            "Bluett",
        'email' =>
            "zach@intuitsolutions.net",
        'phone' =>
            "717-825-3920",
        'date_created' =>
            "Fri, 08 Mar 2013 22:52:32 +0000",
        'date_modified' =>
            "Fri, 08 Mar 2013 22:52:32 +0000",
        'store_credit' =>
            "0.0000",
        'registration_ip_address' =>
            "173.15.155.35",
        'customer_group_id' =>
            "0",
        'notes' =>
            "",
        'tax_exempt_category' =>
            "",
        'addresses' =>
            "",
    ),

    array(
        'id' =>
            "3",
        'company' =>
            "",
        'first_name' =>
            "Zach",
        'last_name' =>
            "Bluett",
        'email' =>
            "zach@intuitsolutions.net",
        'phone' =>
            "717-825-3920",
        'date_created' =>
            "Fri, 08 Mar 2013 22:52:32 +0000",
        'date_modified' =>
            "Fri, 08 Mar 2013 22:52:32 +0000",
        'store_credit' =>
            "0.0000",
        'registration_ip_address' =>
            "173.15.155.35",
        'customer_group_id' =>
            "0",
        'notes' =>
            "",
        'tax_exempt_category' =>
            "",
        'addresses' =>
            "",
    ),
);



$chunk_size = 250;
$count = count($accounts);

while ($count == $chunk_size) {

    // for each item in current chunk
    // do something with this item

}


/*
 *
 * Essentially
 * Get a chunk
 * Do something with the chunk
 * Is there another chunk?
 *  Continue
 * Else
 *  Done
 *
 *
 * or
 *
 * While a chunk is left
 *  Do something with the chunk
 *
 * This has the advantage that you don't need to know how many items are in a chunk.
 */



/*
 * This depends on returning a marker telling the while loop to end. The
 * marker could be defined as zero or FALSE, but a value more suited to
 * an array context is arguably null. While accepts zero, false or null
 * as a boolean FALSE value.
 * @return array or null
 */
class Accounts
{
    public $count = 3;

    function getAccounts()
    {
        echo "Count: {$this->count}\n";
        if($this->count > 1) {
            $this->count--;
            return range(1, 250);
        } elseif($this->count == 1) {
            // simulate fractional amount of accounts
            $this->count--;
            return range(1,40);
        } else {
            return null;
        }
    }

    function process()
    {
        // this is a specific idiom and it works because the value for while can be the result of an expression
        while ($account = $this->getAccounts()) {
            print_r($account);
        }

    }

}

$acc = new Accounts();
$acc->process();

// Here's a problem with this abstraction
/*


 class Foo {
    protected $accounts;

    public function getAccounts() {
        if(empty($this-accounts))
            // go get more accounts from server
        } else {
            return $this->accounts;
        }
}


The problem is that using while to drain the array (and the server) of accounts won't work
with returning the property for accounts.


It can be easy to write

$accounts = $this->getAccounts()

and efficient that it only gets the accounts from the server if there are no accounts
held by the object already.

Automatic refresh.

But this gets in the way of chunking, because we want to return null when there are
no more chunks to return.


So ?

$this->getChunkOfAccountsFromServer();

then

$this->getAccounts(); // calls get chunk of accounts


 */


