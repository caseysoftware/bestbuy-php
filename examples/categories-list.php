<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$categories = new \BestBuy\Categories($apikey);
$categoryList = $categories->index(1, 100);

foreach($categoryList as $category) {
    echo $category->name . "\n";
}