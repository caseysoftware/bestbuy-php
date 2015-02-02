<?php

namespace BestBuy;

class Stores extends \BestBuy\Resources\Base
{
    protected $resource = 'stores';
    protected $resourceId = 'storeId';

    public function byCity($city)
    {
        return $this->byValue(array('city' => '=' . $city));
    }

    public function byZipcode($zipcode)
    {
        return $this->byValue(array('postalCode' => '=' . $zipcode));
    }
}