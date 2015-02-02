<?php

namespace BestBuy\Resources;

abstract class Base implements \Iterator
{
    protected $client = null;
    protected $resource = null;
    protected $position = 0;

    public $data = '';

    public function __construct(\BestBuy\Client $client)
    {
        $this->client = $client;
    }

    public function index($page = 1, $pagesize = 10)
    {
        $result = $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
        $this->data = $result[$this->resource];

        return $this;
    }

    public function load($resource_id)
    {
        $data = $this->client->get($this->resource . '(' . $this->resourceId . '=' . $resource_id . ')');

        if (isset($data[$this->resource]) && isset($data[$this->resource][0])) {
            $this->bind($data[$this->resource][0]);
        }

        return $this;
    }

    protected function byValue(array $params)
    {

        foreach($params as $key => $value) {
            $filters[] = $key . $value;
        }

        $result = $this->client->get($this->resource . '(' . implode('&', $filters) . ')');
        $this->data = $result[$this->resource];

        return $this;
    }

    protected function bind($hash)
    {
        foreach ($hash as $key => $value) {
            $this->$key = $value;
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        $this->bind($this->data[$this->position]);

        return $this;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    public function count()
    {
        return count($this->data);
    }
}