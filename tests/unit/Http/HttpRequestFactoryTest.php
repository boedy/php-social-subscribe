<?php


namespace Http;


use Boedy\Http\HttpRequestFactory;

class HttpRequestFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testMakeGetRequest() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\Get', $requestFactory->make('get'));
    }

    public function testMakePostRequest() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\Post', $requestFactory->make('post'));
    }

    public function testMakePutRequest() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\Put', $requestFactory->make('put'));
    }

    public function testMakeDeleteRequest() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\Delete', $requestFactory->make('delete'));
    }

    public function testMakeHeadRequest() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\Head', $requestFactory->make('head'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testExceptionThrownOnNonExistingRequest(){
        $requestFactory = new HttpRequestFactory();
        $requestFactory->make('SomeRandomRequestType');
    }

    public function testCaseInsensitivy() {
        $requestFactory = new HttpRequestFactory();
        $this->assertInstanceOf('Boedy\Http\Request\RequestInterface' ,$requestFactory->make('PoSt'));
    }
}
