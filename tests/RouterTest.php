<?php

namespace Tests;

use Bootstrap\App;
use App\Routes\Router;

class RoutesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Routes find controller test
     * @return [type] [description]
     */
    public function testFindController()
    {

        $configuration = require_once __DIR__.'/../config/config.php';

        $aplication = require_once __DIR__.'/../config/app.php';

        $app = new App($aplication, $configuration);

        $router = new Router($app);

        $controller = $router->findController([
            'action' => 'get',
            'uri'    => '/'
            ]);

        $this->assertEquals($controller, 'IndexController@index');

    }

}