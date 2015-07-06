<?php

namespace Boedy\Subscription;

interface SubscriptionInterface {

    public function subscribe($options);

    public function unsubscribe($options);
}