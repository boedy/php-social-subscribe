<?php


namespace Boedy\Http\Request;


class Get extends AbstractHttpRequest
{

    public function exec($url, $payload = [], $request_parameters = []) {
        // add any additional curl options here
        $options = array(
            CURLOPT_URL           => $url,
        );

        $options = $request_parameters + $options;

        return $this->doRequest($options);

    }
}