<?php

class Bootstrap
{
    public function run()
    {
        require_once __DIR__ . '/../../vendor/autoload.php';
        define('TEST_DIR', realpath(__DIR__ . '/../'));
    }
}

$bootstrap = new Bootstrap();
$bootstrap->run();
