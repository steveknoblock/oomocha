<?php
/**
 * Created by PhpStorm.
 * User: sknoblock
 * Date: 4/5/2015
 * Time: 7:30 PM
 */

class Foo
{

    public $accounts;

    public $fieldMap;
    
    protected function __construct() {

    $this->fieldMap = [
        'Email__c'              => 'email',
        'Name'                  => 'name',
        'ZZML_MailOptIn__c'     => 'email_opt_in',
        'BillingPostalCode'     => 'billing_postal_code',
        'Birth_Month__c'        => 'birth_month',
        'trac_Email_Opt_out__c' => 'email_opt_out',
        'trac_Email_Opt_out_Date__c' => 'email_opt_out_date',
        'Id'                    => 'salesforce_id'
    ];
        
        $this->accounts = json_decode(
            
            '[
        {
          "id": 1,
          "company": "",
          "first_name": "Jessica ",
          "last_name": "Rabbit",
          "email": "jessica.rabbit@example.com"
        },

       {
          "id": 2,
          "company": "",
          "first_name": "Random ",
          "last_name": "Joe Bob",
          "email": "random.joebob@example.com"
        }
    ]'
        );
    }
    
    protected function mapprops($account)
    {
        // array as account properties
        foreach ($account as $property => $value) {
            // add new element using mapped key
            $account[$this->fieldMap[$property]] = $value;
            // remove element using original key
            unset($account[$property]);
        }
        return $account;
    }

    public function doit()
    {

        array_map('mapprops', $this->accounts);

    }

}


$bar = new Foo();

$bar->accounts = 