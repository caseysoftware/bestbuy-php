<?php

namespace BestBuy;

class Reviews extends \BestBuy\Resources\Base
{
    protected $resource = 'reviews';

    public function load($resource_id)
    {
        throw new \BestBuy\Exceptions\MethodNotImplemented();
    }

    public function bySku($sku)
    {
        return $this->byValue(array('sku' => '=' . $sku));
    }

    public function byDate($date)
    {
        return $this->byValue(array('submissionTime' => '=' . $date));
    }
}