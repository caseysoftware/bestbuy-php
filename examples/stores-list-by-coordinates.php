<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$stores = new \BestBuy\Stores($apikey);
$storeList = $stores->byCoordinates(71.3, -156.8, 1000);

foreach($storeList as $store) {
    echo $store->name . "\n";
}