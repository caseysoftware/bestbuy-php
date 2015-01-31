<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$reviews = $client->reviews->bySku(1780275);

foreach($reviews as $review) {
    echo $review->title . "\n";
}