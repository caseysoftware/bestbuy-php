<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$categories = $client->categories->index(1, 100);

foreach($categories as $category) {
    echo $category->name . "\n";
}