<?php

namespace BestBuy;

use Guzzle\Http;

class Client
{
    const USER_AGENT = 'bestbuy-php/0.0.1';

    protected $baseURI  = 'http://api.remix.bestbuy.com/v1/';
    protected $apiKey   = '';
    protected $client   = null;

    protected $format   = 'json';

    public $response = null;
    public $httpCode = null;
    public $success  = false;

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
        $request = $this->client->get($url, array(), array('exceptions' => false));
        foreach($parameters as $key => $value) {
            $request->getQuery()->set($key, $value);
        }
        $request->getQuery()->set('format', $this->format);
        $request->getQuery()->set('apiKey', $this->apiKey);

        $this->response = $request->send();
        $this->httpCode = $this->response->getStatusCode();
        $this->success  = $this->response->isSuccessful();

        switch($this->format) {
            case 'xml':
                return $this->response->xml();
            default:
                return $this->response->json();
        }

        return $this->response;
    }

    public function __get($name)
    {
        switch($name) {
            case 'stores':
                return new Stores($this);
                break;
            default:
                throw new \Exception($name . ' is not a recognized resource.');
        }

    }
}