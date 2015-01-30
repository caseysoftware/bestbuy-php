<?php

namespace BestBuy;

class Stores extends \BestBuy\Resources\Base
{
    protected $resource = 'stores';
    protected $resourceId = 'storeId';

    public function byCity($city)
    {
        return $this->byValue('city', $city);
    }

    public function byZipcode($zipcode)
    {
        return $this->byValue('postalCode', $zipcode);
    }

    protected function byValue($name, $value)
    {
        $result = $this->client->get($this->resource . '(' . $name . '=' . $value . ')');
        $this->data = $result[$this->resource];

        return $this;
    }
}