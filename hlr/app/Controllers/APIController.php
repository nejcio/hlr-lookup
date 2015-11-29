<?php

namespace App\Controllers;

use Bootstrap\App;

class APIController
{
    /*
    |--------------------------------------------------------------------------
    | API Controller
    |--------------------------------------------------------------------------
    |
    | Controller that handles API requests
    |
    */

    protected $app;

    /**
     * Controller constructor
     * @param object $app       app spacific object
     */
    function __construct(App $app)
    {

        $this->app = $app;

    }

}