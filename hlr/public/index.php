<?php

/**
 * HLR APP - A PHP HLR lookup app
 *
 * @author   Nejc Krajnik <krajnik.nejc@gmail.com>
 */

error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it!
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Configuration And App Variables
|--------------------------------------------------------------------------
|
| Here we require applications configuration variables.
| We need them so that our application can run.
|
*/

$configuration = require_once __DIR__.'/../config/config.php';

$app = require_once __DIR__.'/../config/app.php';

/*
|--------------------------------------------------------------------------
| Answer to the Request
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through our router, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$router = new \App\Routes\Router(new \Bootstrap\App($configuration, $app));

$router->handleIt();

