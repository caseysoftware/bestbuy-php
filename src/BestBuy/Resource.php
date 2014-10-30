<?php

namespace BestBuy;

abstract class Resource
{
    protected $client = null;

    public function __construct(\BestBuy\Client $client)
    {
        $this->client = $client;
    }
}