<?php

namespace BestBuy;

class Stores extends Resource
{
    public function load($store_id)
    {
        $data = $this->client->get('stores(storeId=' . $store_id . ')');

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