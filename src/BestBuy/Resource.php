<?php

namespace BestBuy;

abstract class Resource
{
    protected $client = null;
    protected $resource = null;

    public function __construct(\BestBuy\Client $client)
    {
        $this->client = $client;

        $this->resource = strtolower(str_replace('BestBuy\\', '', get_class($this)));

    }

    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
    }
}