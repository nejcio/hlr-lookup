<?php

namespace Tests;

use Bootstrap\App;
use App\Models\HLR;

class HLRTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if HLR Look up works - get a response
     * @return [type] [description]
     */
    public function testIfLookUpWoks()
    {

        $configuration = require_once __DIR__.'/../config/config.php';

        $application = require_once __DIR__.'/../config/app.php';

        $app = new App($application, $configuration);

        $hlr = new HLR($app);

        $response = $hlr->lookUp('0038640123456');

        $this->assertTrue(is_array($response));

    }

}