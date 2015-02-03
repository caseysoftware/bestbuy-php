<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$products = $client->products->byReviews(4, 100);

foreach($products as $product) {
    echo $product->name . "\n";
}