<?php

namespace BestBuy;

class Stores extends Resource
{
    protected $resource = 'stores';

    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
    }

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