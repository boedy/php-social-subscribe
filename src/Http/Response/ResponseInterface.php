<?php

namespace Boedy\Http\Response;

interface ResponseInterface {

    /**
     * @return string
     */
    public function header();

    /**
     * @return string
     */
    public function body();

    /**
     * @return int
     */
    public function code();

    /**
     * @return Boolean
     */
    public function success();

}