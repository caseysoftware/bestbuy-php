<?php

namespace BestBuy;

use BestBuy\Exceptions\InvalidAPIKey;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const USER_AGENT = 'bestbuy-php/1.1.0';

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

        $request = $this->httpClient->get($url, array(), array('exceptions' => false));
        foreach($parameters as $key => $value) {
            $request->getQuery()->set($key, $value);
        }

        $this->response = $request->send();
        $this->httpCode = $this->response->getStatusCode();
        $this->success  = $this->response->isSuccessful();

        if (4 == substr($this->httpCode, 0, 1)) {
            throw new InvalidAPIKey('The specified API key did now work.');
        }

        switch($this->format) {
            case 'xml':
                return $this->response->xml();
            default:
                return $this->response->json();
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
