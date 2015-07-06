<?php


namespace Subscriptions\Adapter;


use Boedy\Subscription\Adapter\AbstractAdapter;

class ConcreteAdapter extends AbstractAdapter
{

    public function subscribe($options) {
    }

    public function unsubscribe($options) {
    }

}


class AbstractAdapterTest extends \PHPUnit_Framework_TestCase
{

    public function testValidRequiredParameters() {

        $options = array(
            'key1' => 1,
            'key2' => 2
        );

        $required = array('key1', 'key2');

        $mock = \Mockery::mock('Boedy\RequestFactoryInterface');

        $adapter = new ConcreteAdapter($mock);
        $adapter->validateRequiredOptions($options, $required);
    }

    /**
     * @expectedException \Boedy\Subscription\InvalidParametersException
     */
    public function testInvalidRequiredParameters() {

        $options = array(
            'key1' => 1,
            'key2' => 2
        );

        $required = array('key1', 'key2', 'key3');

        $mock = \Mockery::mock('Boedy\RequestFactoryInterface');

        $adapter = new ConcreteAdapter($mock);
        $adapter->validateRequiredOptions($options, $required);
    }
}
