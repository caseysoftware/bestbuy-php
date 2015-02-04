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

    public function byZipcode($zipcode, $radius = 0)
    {
        if ($radius) {
            return $this->byValue(array("area($zipcode, $radius)" => ''));
        } else {
            return $this->byValue(array('postalCode' => '=' . $zipcode));
        }
    }

    public function byCoordinates($latitude, $longitude, $radius)
    {
        return $this->byValue(array("area($latitude, $longitude, $radius)" => ''));
    }
}