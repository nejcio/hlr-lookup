<?php

namespace App\Models;

use App\Models\HLRParser;

class HLR
{
    /*
    |--------------------------------------------------------------------------
    | HLR Model
    |--------------------------------------------------------------------------
    |
    | This model does the HLR lookup
    |
     */
    protected $app;

    /**
     * HLR constructor
     * @param object $app       app spacific object
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * HLR lookup method
     * Returns MNO identifier, country dialling code, subscriber number and country identifier
     * as defined with ISO 3166-1-alpha-2
     * @param  string $input input(msisdn) from the text field
     * @return array         returns an array of response data from external service
     */
    public function lookUp($input)
    {
        $hlrparser = new HLRParser($input, $this->app);
        $response  = $hlrparser->lookItUp();
        return $response;
    }
}
