<?php


namespace Boedy\Subscription\Adapter\YouTube;


use Boedy\Http\Response\ResponseInterface;
use Boedy\Subscription\Adapter\AbstractAdapter;

class YouTubeAdapter extends AbstractAdapter {

    public function subscribe($options) {
        $requiredOptions = array(
            'hub.callback',
            'hub.topic'
        );

        $this->validateRequiredOptions($options, $requiredOptions);

        $options = array_merge($options, array(
            'hub.secret' => hash('sha1', uniqid(rand(), true)),
            'hub.verify' => 'async',
        ));

        $options['hub.mode'] = 'subscribe';

        $url = 'https://pubsubhubbub.appspot.com/';

        $request = $this->requestFactory->make('post');
        $response = $request->exec($url, $options);

        if ( ! $response->success()) {
            $this->failed($response);
        }
    }

    public function unsubscribe($options) {
        // TODO: Implement unsubscribe() method.
    }

    protected function failed(ResponseInterface $response) {
        dd($response->body());
    }

}