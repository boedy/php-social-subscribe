<?php


namespace Subscriptions\Adapter\Instagram;


use AspectMock\Test;
use Boedy\Http\HttpRequestFactory;
use Boedy\Http\Response\HttpResponse;
use Boedy\Subscription\Adapter\Instagram\InstagramAdapter;


class InstagramAdapterTest extends \PHPUnit_Framework_TestCase {

    public function testSuccessfulSubscribe(){
        $parameters = array(
            'client_id' => '123456789',
            'client_secret' => 'abcdefghij',
            'object' => 'user',
            'aspect' => 'media',
            'verify_token' => 'sometoken',
            'callback_url' => 'http://example.com'
        );

        //return 200 response
        Test::double('\Boedy\Http\Request\Post', ['exec' => new HttpResponse('header', 'body', 200)]);

        $factory = new HttpRequestFactory();
        $instagramAdapter = new InstagramAdapter($factory);
        $instagramAdapter->subscribe($parameters);

    }

    /**
     * @expectedException \Boedy\Subscription\SubscriptionErrorException
     */
    public function testUnsuccessfulSubscribe(){

        $parameters = array(
            'client_id' => '123456789',
            'client_secret' => 'abcdefghij',
            'object' => 'user',
            'aspect' => 'media',
            'verify_token' => 'sometoken',
            'callback_url' => 'http://example.com'
        );

        //return 400 response
        Test::double('\Boedy\Http\Request\Post', ['exec' => new HttpResponse('header', 'body', 400)]);

        $factory = new HttpRequestFactory();
        $instagramAdapter = new InstagramAdapter($factory);
        $instagramAdapter->subscribe($parameters);

    }

    public function testSuccessfulUnsubscribe(){
        $parameters = array(
            'client_id' => '123456789',
            'client_secret' => 'abcdefghij',
        );

        //return 200 response
        Test::double('\Boedy\Http\Request\Delete', ['exec' => new HttpResponse('header', 'body', 200)]);

        $factory = new HttpRequestFactory();
        $instagramAdapter = new InstagramAdapter($factory);
        $instagramAdapter->unsubscribe($parameters);
    }

    /**
     * @expectedException \Boedy\Subscription\SubscriptionErrorException
     */
    public function testUnsuccessfulUnsubscribe(){
        $parameters = array(
            'client_id' => '123456789',
            'client_secret' => 'abcdefghij',
        );

        //return 400 response
        Test::double('\Boedy\Http\Request\Delete', ['exec' => new HttpResponse('header', 'body', 400)]);

        $factory = new HttpRequestFactory();
        $instagramAdapter = new InstagramAdapter($factory);
        $instagramAdapter->unsubscribe($parameters);
    }

}
