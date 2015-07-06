<?php

namespace Boedy\Subscription;

class InvalidParametersException extends \Exception {

    function __construct($missingParameters, $code = 0, \Exception $previous = null) {
        parent::__construct('Missing parameters: ' . implode(', ', $missingParameters), $code, $previous);
    }
}