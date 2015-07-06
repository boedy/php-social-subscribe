<?php

namespace Boedy\Subscription\Adapter\Instagram;


use Boedy\Http\Response\ResponseInterface;
use Boedy\Subscription\Adapter\AbstractAdapter;
use Boedy\Subscription\SubscriptionErrorException;

class InstagramAdapter extends AbstractAdapter
{

    public function subscribe($options) {
        $requiredOptions = array(
            'client_id',
            'client_secret',
            'object',
            'aspect',
            'verify_token',
            'callback_url'
        );
        $this->validateRequiredOptions($options, $requiredOptions);

        $url = 'https://api.instagram.com/v1/subscriptions/';

        $request = $this->requestFactory->make('post');
        $response = $request->exec($url, $options);

        if ( ! $response->success()) {
            $this->failed($response);
        }

    }

    public function unsubscribe($options) {
        $requiredOptions = array(
            'client_id',
            'client_secret'

        );
        $this->validateRequiredOptions($options, $requiredOptions);

        $url = 'https://api.instagram.com/v1/subscriptions';
        $url .= '?client_id=' . $options['client_id'];
        $url .= '&client_secret=' . $options['client_secret'];

        if (isset($options['id'])) {
            $url .= '&id=' . $options['id'];
        } elseif (isset($options['object'])) {
            $url .= '&object=' . $options['object'];
        }

        $request = $this->requestFactory->make('delete');
        $response = $request->exec($url, []);

        if ( ! $response->success()) {
            $this->failed($response);
        }
    }

    protected function failed(ResponseInterface $response) {
        $message = json_decode($response->body(), true);
        throw new SubscriptionErrorException($message['meta']['error_message'], $response->code());
    }


}