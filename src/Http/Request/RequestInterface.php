<?php


namespace Boedy\Http\Request;


use Boedy\Http\Response\ResponseInterface;

interface RequestInterface {

    /**
     * @param $url
     * @param array $payload
     * @param array $request_parameters
     * @return ResponseInterface
     */
    public function exec($url, $payload = [], $request_parameters = []);
}