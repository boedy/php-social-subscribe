<?php

namespace Boedy\Subscription\Adapter;

use Boedy\Http\Response\ResponseInterface;
use Boedy\RequestFactoryInterface;
use Boedy\Subscription\InvalidParametersException;
use Boedy\Subscription\SubscriptionInterface;

abstract class AbstractAdapter implements SubscriptionInterface
{

    protected $credentials = false;
    protected $callbackUrl;
    protected $userAgent = "PHP-push-subscriber/1.0";
    /**
     * @var RequestFactoryInterface
     */
    protected $requestFactory;

    function __construct(RequestFactoryInterface $requestFactory) {
        $this->requestFactory = $requestFactory;
    }

    abstract public function subscribe($options);

    abstract public function unsubscribe($options);

    public function validateRequiredOptions(array $options, array $required) {
        $missing_keys = array_diff($required, array_intersect(array_keys(array_filter($options)), $required));

        if (sizeof($missing_keys) > 0) throw new InvalidParametersException($missing_keys);
    }

    abstract protected function failed(ResponseInterface $response);
}