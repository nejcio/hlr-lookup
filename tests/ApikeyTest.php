<?php

namespace Tests;

use App\Validators\API;
use Bootstrap\App;

class ApikeyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test If Api keys match
     * @return [type] [description]
     */
    public function testIfApiKeyMatch()
    {
        $configuration = require_once __DIR__ . '/../config/config.php';
        $application   = require_once __DIR__ . '/../config/app.php';
        $app           = new App($application, $configuration);
        $this->assertTrue(API::APIkey_check($app->getAppVariable('API_KEY'), $app));
    }

}
