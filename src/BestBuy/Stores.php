<?php

namespace BestBuy;

class Stores extends Resource
{
    /**
     * TODO: At some point, this should probably accept a page number or offset of some kind..
     */
    public function index()
    {
        return $this->client->get('stores', array());
    }
}