<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require '../credentials.php';
require '../vendor/autoload.php';

$categories = new \BestBuy\Categories($apikey);
$category = $categories->load('abcat0010000');

print_r($category);