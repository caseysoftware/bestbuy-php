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

        if (!isset($data['stores'])) {
            // todo: this only happens on an error.. should we throw an exception?
            return $data;
        }
        if (isset($data['stores'][0])) {
            return $data['stores'][0];
        } else {
            return array();
        }
    }
}