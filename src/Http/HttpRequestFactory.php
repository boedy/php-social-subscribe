<?php


namespace Boedy\Http;


use Boedy\Http\Request\Get;
use Boedy\Http\Request\Post;
use Boedy\Http\Request\Put;
use Boedy\Http\Request\Delete;
use Boedy\Http\Request\Head;
use Boedy\Http\Request\RequestInterface;
use Boedy\RequestFactoryInterface;
use Symfony\Component\Yaml\Exception\RuntimeException;

class HttpRequestFactory implements RequestFactoryInterface {

    /**
     * Factors a new http request
     * @param $request_type
     * @return RequestInterface
     */
    public function make($request_type){
        switch(strtolower($request_type)){
            default:
                throw new RuntimeException('Invalid Http request');
                break;
            case 'get';
                return new Get();
                break;
            case 'post':
                return new Post();
                break;
            case 'put':
                return new Put();
                break;
            case 'delete':
                return new Delete();
                break;
            case 'head':
                return new Head();
                break;
        }
    }
}