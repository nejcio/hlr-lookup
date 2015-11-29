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
     * Router constructor
     * @param array $app array of aplication variables
     */
    function __construct(App $app)
    {

        $this->app = $app;

    }

}