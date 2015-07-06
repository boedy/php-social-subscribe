<?php

namespace Boedy\Subscription\Adapter\Facbook;

use Boedy\Http\Response\ResponseInterface;
use Boedy\Subscription\Adapter\AbstractAdapter;
use Boedy\Subscription\SubscriptionErrorException;

class FacebookAdapter extends AbstractAdapter {

    public function subscribe($options) {
        $requiredOptions = array(
            'app_id',
            'access_token',
            'object',
            'fields',
            'callback_url',
            'verify_token'
        );

        $this->validateRequiredOptions($options, $requiredOptions);

        $url = 'https://graph.facebook.com/v2.3/';
        $url .= $options['app_id'].'/subscriptions';
        $url .= '?object='.$options['object'];
        $url .= '&fields='.$options['fields'];
        $url .= '&callback_url='.urlencode($options['callback_url']);
        $url .= '&active=1';
        $url .= '&access_token='.$options['access_token'];
        $url .= '&verify_token='.$options['verify_token'];

        $request = $this->requestFactory->make('post');
        $response = $request->exec($url, array());

        if ( ! $response->success()) {
            $this->failed($response);
        }
    }

    public function unsubscribe($options) {
        // TODO: Implement unsubscribe() method.
    }

    protected function failed(ResponseInterface $response) {
        $message = json_decode($response->body(), true);
        throw new SubscriptionErrorException($message['error']['message'], $response->code());
    }


}