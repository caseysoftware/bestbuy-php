<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$stores = new \BestBuy\Stores($apikey);
$store = $stores->load(123);

print_r($store);