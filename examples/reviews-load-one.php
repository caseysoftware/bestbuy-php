<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$reviews = new \BestBuy\Reviews($apikey);

try {
    $review = $reviews->load(43826327);
} catch (\BestBuy\Exceptions\MethodNotImplemented $exc) {
    echo "Yes, this got a MethodNotImplemented exception, just as we expected.";
}