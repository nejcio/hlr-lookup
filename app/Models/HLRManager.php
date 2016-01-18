<?php

namespace App\Models;

use App\Interfaces\HLRInterface;

class HLRManager
{
    /*
    |--------------------------------------------------------------------------
    | HLR Manager
    |--------------------------------------------------------------------------
    |
    | Manages HLR lookups
    |
     */
    protected $hlr;

    /**
     * HLR Manager constructor
     * @param object $app       app spacific object
     */
    public function __construct(HLRInterface $hlr)
    {
        $this->hlr = $hlr;
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
        $response = $this->hlr->lookup($input);
        return $response;
    }
}
