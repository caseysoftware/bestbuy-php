<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$products = new \BestBuy\Products($apikey);
$productList = $products->index(1, 100);

foreach($productList as $product) {
    echo $product->name . "\n";
}