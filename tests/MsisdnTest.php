<?php

namespace Tests;

use  App\Validators\MSISDN;

class MsisdnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test MSISDN length if < 1
     * @return [type] [description]
     */
    public function testMsisdnLength()
    {
        $this->assertFalse(MSISDN::senitize('1'));
    }

    /**
     * Test MSISDN length if < 1
     * @return [type] [description]
     */
    public function testMsisdnLength2()
    {
        $this->assertFalse(MSISDN::senitize(''));
    }

}