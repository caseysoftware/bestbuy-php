<?php

namespace BestBuy;

class Products extends Resource
{
    protected $resource = 'products';

    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
    }

    public function load($product_id)
    {
        $data = $this->client->get('products(productId=' . $product_id . ')');

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