<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$category = $client->categories->load('abcat0010000');

print_r($category);