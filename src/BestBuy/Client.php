<?php

namespace BestBuy;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'bestbuy-php/0.0.1';

    protected $baseURI    = 'http://api.remix.bestbuy.com/v1/';
    protected $apiKey     = '';
    protected $httpClient = null;

    protected $format   = 'json';

    public $response = null;
    public $httpCode = null;
    public $success  = false;

    /**
     * @param $key
     * @param null $httpClient
     *
     * @property mixed  stores      This is the stores subresource of the client.
     * @property mixed  products    This is the products subresource of the client.
     */
    public function __construct($key, $httpClient = null)
    {
        $this->apiKey = $key;
        $this->httpClient = (is_null($httpClient)) ? new Http\Client($this->baseURI) : $httpClient;
        $this->httpClient->setUserAgent($this::USER_AGENT . '/' . PHP_VERSION);
    }

    /**
     * Only json and xml are valid values here.
     *
     * @param string $format
     */
    public function setFormat($format = 'json')
    {
        $this->format = $format;
    }

    public function get($url, array $parameters = array())
    {
        $parameters['format'] = $this->format;
        $parameters['apiKey'] = $this->apiKey;

        $request = $this->httpClient->get($url, array(), array('exceptions' => false));
        foreach($parameters as $key => $value) {
            $request->getQuery()->set($key, $value);
        }

        $this->response = $request->send();
        $this->httpCode = $this->response->getStatusCode();
        $this->success  = $this->response->isSuccessful();

        switch($this->format) {
            case 'xml':
                return $this->response->xml();
            default:
                return $this->response->json();
        }
    }

    /**
     * @param $name
     * @return Products|Stores
     * @throws \Exception
     */
    public function __get($name)
    {
        $classname = '\\BestBuy\\' . ucwords($name);

        if (class_exists($classname)) {
            return new $classname($this);
        }

        throw new \Exception($name . ' is not a recognized resource.');
    }
}