<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$products = new \BestBuy\Products($apikey);
$product = $products->load(1788194);

print_r($product);