<?php

namespace BestBuy;

class Products extends Resource
{
    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get('products', array('pageSize' => $pagesize, 'page' => $page));
    }
}