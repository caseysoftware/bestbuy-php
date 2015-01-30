<?php

namespace BestBuy;

class Stores extends \BestBuy\Resources\Base
{
    protected $resource = 'stores';
    protected $resourceId = 'storeId';

    public function byCity($city)
    {
        $result = $this->client->get($this->resource . '(city=' . $city . ')');
        $this->data = $result[$this->resource];

        return $this;
    }

}