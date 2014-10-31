<?php

namespace BestBuy;

class Products extends Resource
{
    public function index()
    {
        return $this->client->get('products', array());
    }
}