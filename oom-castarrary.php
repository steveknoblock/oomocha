<?php

$list = array(
    'foo' => "bar"
);

echo (string) $list;

// Returns
//PHP Notice:  Array to string conversion in /home/kadro/www/untitled/oom-castarrary.php on line 7

if(is_array($list)) {
    foreach($list as $item) {
        echo $item ."\n";
    }
} else {
    echo $list;
}