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

        if (!isset($data[$this->resource])) {
            // todo: this only happens on an error.. should we throw an exception?
            return $data;
        }
        if (isset($data[$this->resource][0])) {
            return $data[$this->resource][0];
        } else {
            return array();
        }
    }

    public function bind($hash)
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