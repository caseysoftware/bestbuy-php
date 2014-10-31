<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$products = $client->products->index(1, 100);

$productList = $products['products'];

foreach($productList as $product) {
    echo $product['name'];
    echo "<br />\n";
}