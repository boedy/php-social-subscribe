<?php

$loader = require __DIR__ . '/../../vendor/autoload.php';
$loader->add('', __DIR__);

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'debug'        => true,
    "cacheDir" => "/tmp/push_notifications",
    'includePaths' => [__DIR__ . '/../../src']

]);

abstract class BaseTestCase extends PHPUnit_Framework_TestCase
{

    function __construct()
    {
    }
}