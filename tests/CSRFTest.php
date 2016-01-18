<?php

namespace Tests;

use App\Validators\CSRF;

class CSRFTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test CSRF random string length
     * @return [type] [description]
     */
    public function testCsrfLength()
    {
        $this->assertEquals(strlen(CSRF::randomString(6)), 6);
    }

    /**
     * Test CSRF if the same
     * @return [type] [description]
     */
    public function testCsrfCheck()
    {
        $this->assertTrue(CSRF::csrfCheck('ImeTokena', 'ImeTokena'));
    }

    /**
     * Test CSRF if string
     * @return [type] [description]
     */
    public function testIfString()
    {
        $this->assertTrue(is_string(CSRF::createToken()));
    }
}
