<?php

namespace BestBuy;

class Products extends Resource
{
    protected $resource = 'products';
    protected $resourceId = 'productId';

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