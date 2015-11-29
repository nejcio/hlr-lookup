<?php

namespace App\Controllers;

use Bootstrap\App;
use App\Models\HLR;
use App\Validators\MSISDN;
use App\Validators\API;

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

    /**
     * This method handles the get request to the api
     * @return json    returns the json response
     */
    public function handle()
    {

        (array_key_exists('apikey', $_GET)) ? $apikey = htmlspecialchars($_GET["apikey"]) : $apikey = '';

        $keyCheck = API::APIkey_check($apikey, $this->app);

        if($keyCheck):

            (array_key_exists('msisdn', $_GET)) ? $msisdn = $_GET['msisdn'] : $msisdn = '';
            $validated = MSISDN::senitize($msisdn);

            if($validated):

                $hlr = new HLR($this->app);

                $lookup = $hlr->lookUp($validated);

                echo json_encode( ['success' => 'success','data' => $lookup]);

                return;

            else:

                echo json_encode(['success' => 'failed', 'data' => ['ERROR' => 'Not a valid number!']]);

                return;

            endif;

        else :

            echo json_encode(['success' => 'failed', 'data'=> ['ERROR' => 'Authentication failed!']]);

            return;

        endif;

    }

}