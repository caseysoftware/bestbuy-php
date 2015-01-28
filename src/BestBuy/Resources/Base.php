<?php

namespace BestBuy\Resources;

abstract class Base
{
    protected $client = null;
    protected $resource = null;
    protected $position = 0;

    public function __construct(\BestBuy\Client $client)
    {
        $this->client = $client;
    }

    public function index($page = 1, $pagesize = 10)
    {
        return $this->client->get($this->resource, array('pageSize' => $pagesize, 'page' => $page));
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

//    public function bind($hash)
//    {
//        foreach ($hash as $key => $value) {
//            $this->$key = $value;
//        }
//    }
//
//    public function rewind()
//    {
//        $this->position = 0;
//    }
//
//    public function current()
//    {
//        return $this->data[$this->position];
//    }
//
//    public function key()
//    {
//        return $this->position;
//    }
//
//    public function next()
//    {
//        $this->position++;
//    }
//
//    public function valid()
//    {
//        return isset($this->data[$this->position]);
//    }
//
//    public function count()
//    {
//        return count($this->data);
//    }
}