<?php

namespace Tests;

use Bootstrap\App;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test If App variables exist
     * @return [type] [description]
     */
    public function testIfApiKeyExists()
    {
        $configuration = require_once __DIR__ . '/../config/config.php';
        $application   = require_once __DIR__ . '/../config/app.php';
        $app           = new App($application, $configuration);
        $this->assertTrue(array_key_exists('API_KEY', $app->getAppVariables()));
        $this->assertTrue(array_key_exists('API_PASS', $app->getAppVariables()));
        $this->assertTrue(array_key_exists('API_USERNAME', $app->getAppVariables()));
    }
}
