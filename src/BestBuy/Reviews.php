<?php

namespace BestBuy;

class Reviews extends \BestBuy\Resources\Base
{
    protected $resource = 'reviews';

    public function load($resource_id)
    {
        throw new \BestBuy\Exceptions\MethodNotImplemented();
    }
}