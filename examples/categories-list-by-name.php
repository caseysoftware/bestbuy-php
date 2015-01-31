<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);
$categories = $client->categories->byName('Leisure Gifts');

foreach($categories as $category) {
    echo $category->name . "\n";

    $paths = $category->path;
    foreach($paths as $path) {
        echo $path['name'] . "\n";
    }
}