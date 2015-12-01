<?php

namespace Tests;

use Bootstrap\App;
use App\Models\HLRParser;

class HLRParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if response from external service
     * @return [type] [description]
     */
    public function testDoWeGetAResponseFromOurExternalService()
    {

        $configuration = require_once __DIR__.'/../config/config.php';

        $application = require_once __DIR__.'/../config/app.php';

        $app = new App($application, $configuration);

        $parser = new HLRParser('038641888888', $app );

        $this->assertTrue(is_array($parser->lookItUp()));
    }

}