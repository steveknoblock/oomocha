<?php
/**
 * Created by PhpStorm.
 * User: sknoblock
 * Date: 4/21/2015
 * Time: 9:37 AM
 */

// from php.net comment
function dirToArray($dir) {

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value,array(".","..")))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            }
            else
            {
                $result[] = $value;
            }
        }
    }

    return $result;
}


// recurse Magento app directory structure
// find XML files
// open file and scan for observers
// extract observers to an array
// repeat until nothing left to scan

// app/code
// app/code/core
// app/code/local
// app/code/community

// The observers will be defined in an XML file in the module's etc directory.
// etc/config.xml


// The observers are defined in
// <observers></observers>



/*
 * Are we in the module's etc directory?
 * Is there a config.xml file?
 * If so, Open it
 * Search for observers and add them to an array
 * Repeat until no more configs found.
 * dev:module:observer:list
 * Observer type (global, admin, frontend)
 */
