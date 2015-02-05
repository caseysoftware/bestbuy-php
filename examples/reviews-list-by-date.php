<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$reviews = new \BestBuy\Reviews($apikey);
$reviewList = $reviews->byDate('2015-01-02');

foreach($reviewList as $review) {

    echo $review->title . "\n";
}