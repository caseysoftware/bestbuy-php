<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$categories = $client->categories->index(1, 100);

$categoryList = $categories['categories'];

foreach($categoryList as $category) {
    echo $category['name'];
    echo "<br />\n";
}