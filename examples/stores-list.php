<?php

// Don't forget to rename credentials-dist.php to credentials.php and insert your API key
require __DIR__.'/credentials.php';
require __DIR__.'/../vendor/autoload.php';

$client = new \BestBuy\Client($apikey);

$stores = $client->stores->index();