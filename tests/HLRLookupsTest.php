<?php

namespace Tests;

use Bootstrap\App;
use App\Services\HLRLookups;

class HLRLookupsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if API_PASS is last in a string
     * @return [type] [description]
     */
    public function testTheURLBuilder()
    {

        $configuration = require_once __DIR__.'/../config/config.php';

        $application = require_once __DIR__.'/../config/app.php';

        $app = new App($application, $configuration);

        $this->assertStringEndsWith($app->getAppVariable('API_PASS'), HLRLookups::urlBuilder($app,'0038640000000'));

    }

}