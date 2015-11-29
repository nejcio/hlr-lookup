<?php

namespace App\Controllers;

use Bootstrap\App;
use App\Models\HLR;

class IndexController
{
    /*
    |--------------------------------------------------------------------------
    | Index Controller
    |--------------------------------------------------------------------------
    |
    | Controller that handles main app requests
    |
    */

    protected $app;

    /**
     * Controller constructor
     *  @param object $app       app spacific object
     */
    function __construct(App $app)
    {

        $this->app = $app;

    }

    /**
     * Landing page of the app
     * @return view returns the index view
     */
    public function index()
    {

        //CSRF

       //view Render

    }


}