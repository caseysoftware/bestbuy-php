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
        return $this->byValue('sku', $sku);
    }

    protected function byValue($name, $value)
    {
        $result = $this->client->get($this->resource . '(' . $name . '=' . $value . ')');
        $this->data = $result[$this->resource];

        return $this;
    }
}