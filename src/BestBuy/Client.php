<?php

namespace BestBuy;

use BestBuy\Exceptions\InvalidAPIKey;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const USER_AGENT = 'bestbuy-php/2.0.1';

    protected $baseURI    = 'http://api.remix.bestbuy.com/v1/';
    protected $apiKey     = '';
    protected $httpClient = null;

    protected $format   = 'json';

    public $response = null;
    public $httpCode = null;
    public $success  = false;

    /**
     * @param $apiKey
     * @param null $httpClient
     */
    public function __construct($apiKey, $httpClient = null)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = (is_null($httpClient)) ? new GuzzleClient(
                    ['base_uri' => $this->baseURI, 'headers' => ['User-Agent' => $this::USER_AGENT . '/' . PHP_VERSION ]]
        ) : $httpClient;
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

        $this->response = $this->httpClient->get($url, ['exceptions' => false, 'query' => $parameters] );

        $this->httpCode = $this->response->getStatusCode();
        if (2 == substr($this->httpCode, 0, 1)) {
            // This is only to replace the isSuccessful() call the response used to support.
            $this->success = true;
        }

        $raw_body = $this->response->getBody();

        switch($this->format) {
            case 'xml':
                return simplexml_load_string($raw_body);
            default:
                return json_decode($raw_body, true);
        }
    }

    public function put()
    {
        throw new \BestBuy\Exceptions\MethodNotImplemented('This API is read only.');
    }

    public function update()
    {
        throw new \BestBuy\Exceptions\MethodNotImplemented('This API is read only.');
    }

    public function delete()
    {
        throw new \BestBuy\Exceptions\MethodNotImplemented('This API is read only.');
    }

    /**
     * @param $name
     * @return Categories|Products|Reviews|Stores
     * @throws \Exception
     */
    public function __get($name)
    {
        $classname = '\\BestBuy\\' . ucwords($name);

        if (class_exists($classname)) {
            return new $classname($this);
        }

        throw new \BestBuy\Exceptions\InvalidResourceException('Not supported');
    }
}
