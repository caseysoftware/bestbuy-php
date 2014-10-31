<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$product = $client->products->load(1218360617202);

echo '<pre>';
print_r($product);