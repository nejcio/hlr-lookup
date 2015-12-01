<?php

namespace Tests;

use Bootstrap\App;

class AppTest extends \PHPUnit_Framework_TestCase
{

    public function testIfReturnsString()
    {
        $configuration = require_once __DIR__.'/../config/config.php';
        $app2 = require_once __DIR__.'/../config/app.php';

        $app = new App($app2, $configuration);
        $this->assertTrue(is_string($app->getAppVariable('API_PASS')));
    }

    public function testIfReturnsArray()
    {
        $configuration = require_once __DIR__.'/../config/config.php';
        $app2 = require_once __DIR__.'/../config/app.php';

        $app = new App($app2, $configuration);
        $this->assertTrue(is_string($app->getAppVariable('API_PASS')));
    }
}