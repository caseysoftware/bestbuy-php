<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$categories = new \BestBuy\Categories($apikey);
$categoryList = $categories->byName('Leisure Gifts');

foreach($categoryList as $category) {
    echo $category->name . "\n";

    $paths = $category->path;
    foreach($paths as $path) {
        echo $path['name'] . "\n";
    }
}