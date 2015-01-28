<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$stores = $client->stores->index(1, 100);

foreach($stores as $store) {
    echo $store->name . "\n";
}