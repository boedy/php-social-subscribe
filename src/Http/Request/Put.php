<?php


namespace Boedy\Http\Request;


class Put extends AbstractHttpRequest
{

    public function exec($url, $payload = [], $request_parameters = []) {
        // add any additional curl options here
        $options = array(
            CURLOPT_URL           => $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS    => $payload
        );

        $options = $request_parameters + $options;

        return $this->doRequest($options);

    }
}