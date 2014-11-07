<?php

namespace BestBuy;

abstract class Resource
{
    protected $client = null;
    protected $resource = null;

    public function __construct(\BestBuy\Client $client)
    {
        $this->client = $client;
    }

    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
    }

    public function load($resource_id)
    {
        $data = $this->client->get($this->resource . '(' . $this->resourceId . '=' . $resource_id . ')');

        if (!isset($data[$this->resource])) {
            // todo: this only happens on an error.. should we throw an exception?
            return $data;
        }
        if (isset($data[$this->resource][0])) {
            return $data[$this->resource][0];
        } else {
            return array();
        }
    }
}