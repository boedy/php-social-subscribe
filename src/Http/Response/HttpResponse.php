<?php


namespace Boedy\Http\Response;


class HttpResponse implements ResponseInterface {

    private $header;
    private $body;
    private $responseCode;

    function __construct($header, $body, $responseCode) {
        $this->header = $header;
        $this->body = $body;
        $this->responseCode = $responseCode;
    }

    public function code(){
        return $this->responseCode;
    }

    public function success(){
        if (substr($this->code(), 0, 1) == "2") {
            return true;
        }
        return false;
    }

    public function header() {
        return $this->header;
    }

    public function body() {
        return $this->body;
    }


}