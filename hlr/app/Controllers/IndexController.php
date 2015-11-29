<?php

namespace App\Controllers;

use Bootstrap\App;

class IndexController
{
    /*
    |--------------------------------------------------------------------------
    | Index Controller
    |--------------------------------------------------------------------------
    |
    | Controller that handles main requests
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