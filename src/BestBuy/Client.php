<?php

namespace BestBuy;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'bestbuy-php/0.0.1';

    protected $baseURI  = 'http://api.remix.bestbuy.com/v1/';
    protected $apiKey   = '';
    protected $client   = null;

    /**
     * @param $key
     * @param null $httpClient
     */
    public function __construct($key, $httpClient = null)
    {
        $this->apiKey = $key;
        $this->client = (is_null($httpClient)) ? new Http\Client($this->baseURI) : $httpClient;
        $this->client->setUserAgent($this::USER_AGENT . '/' . PHP_VERSION);
    }
}