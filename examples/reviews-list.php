<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$reviews = $client->reviews->index(1, 100);
print_r($reviews);
$reviewList = $reviews['reviews'];

foreach($reviewList as $review) {
    echo $review['title'];
    echo "<br />\n";
}