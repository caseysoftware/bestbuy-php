<?php

namespace BestBuy;

class Stores extends Resource
{
    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get('stores', array('pageSize' => $pagesize, 'page' => $page));
    }

    public function load($store_id)
    {
        $data = $this->client->get('stores(storeId=' . $store_id . ')');

        return $data['stores'][0];
    }
}