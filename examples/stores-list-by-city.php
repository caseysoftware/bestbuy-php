<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$stores = new \BestBuy\Stores($apikey);
$storeList = $stores->byCity('Austin');

foreach($storeList as $store) {
    echo $store->name . "\n";
}