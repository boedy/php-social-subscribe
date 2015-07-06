<?php


namespace Boedy\Subscription;


class SubscriptionErrorException extends \Exception {

    function __construct($message = null, $code = 0, \Exception $previous = null) {
        $message = htmlspecialchars($message);
        parent::__construct('Subscription failed.'.($message ? ' Reason: '.$message : ''), $code, $previous);
    }
}