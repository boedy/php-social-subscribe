<?php

namespace Boedy;

use Boedy\Http\Request\RequestInterface;

interface RequestFactoryInterface {

    /**
     * @param $request_type
     * @return RequestInterface
     */
    public function make($request_type);
}