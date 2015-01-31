<?php

namespace BestBuy;

class Categories extends \BestBuy\Resources\Base
{
    protected $resource = 'categories';
    protected $resourceId = 'id';

    public function byName($name)
    {
        return $this->byValue('name', $name);
    }
}