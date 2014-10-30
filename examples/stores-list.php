<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$stores = $client->stores->index();
$storeList = $stores['stores'];

foreach($storeList as $store) {
    echo $store['name'];
    echo "<br />\n";
}