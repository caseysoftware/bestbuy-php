<?php

namespace BestBuy;

class Products extends Resource
{
    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get('products', array('pageSize' => $pagesize, 'page' => $page));
    }

    public function load($product_id)
    {
        $data = $this->client->get('products(productId=' . $product_id . ')');

        if (!isset($data['products'])) {
            // todo: this only happens on an error.. should we throw an exception?
            return $data;
        }
        if (isset($data['products'][0])) {
            return $data['products'][0];
        } else {
            return array();
        }
    }
}