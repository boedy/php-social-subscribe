<?php


namespace Boedy\Http\Request;


use Boedy\Http\Response\HttpResponse;

abstract class AbstractHttpRequest implements RequestInterface
{

    protected $default_request_parameters;

    function __construct() {
        $this->default_request_parameters = array(
            CURLOPT_USERAGENT      => "PubSubHubbub-Subscriber-PHP/1.0",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true
        );
    }

    abstract public function exec($url, $payload = [], $request_parameters = []);

    protected function doRequest($options) {
        $options = $options + $this->default_request_parameters;

        $ch = curl_init();

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $info = curl_getinfo($ch);

        return new HttpResponse($header, $body, $info['http_code']);
    }
}