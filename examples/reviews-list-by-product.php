<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$reviews = new \BestBuy\Reviews($apikey);
$reviewList = $reviews->bySku(1780275);

foreach($reviewList as $review) {
    echo $review->title . "\n";
}