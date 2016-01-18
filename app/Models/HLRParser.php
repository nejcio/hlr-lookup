<?php

namespace App\Models;

use App\Interfaces\HLRParserInterface;
use App\Services\HLRLookups;

class HLRParser implements HLRParserInterface
{
    /*
    |--------------------------------------------------------------------------
    | HLR parser
    |--------------------------------------------------------------------------
    |
    | This model parses the response from HLR lookup service
    |
     */
    protected $app;
    protected $input;

    /**
     * HLRParser constructor
     * @param object $app       app spacific object
     * @param string $input     input from text field
     */
    public function __construct($input, $app)
    {
        $this->app   = $app;
        $this->input = $input;
    }

    /**
     * Look it up
     * @return array response from the external service
     */
    public function lookItUp()
    {
        $response = $this->getData($this->app, $this->input);
        return $response;
    }

    /**
     * Builds the url from config data, makes a look up
     * And parses the response
     * @param  array $app       app spacific variables
     * @param  string $input    input from text field
     * @return array            Array of parsed data
     */
    public function getData($app, $input)
    {
        $url        = HLRLookups::urlBuilder($app, $input);
        $data       = $this->getHttp($url);
        $parsedData = HLRLookups::responseParser($data);
        return $parsedData;
    }

    /**
     * Makes a CURL request to external service
     * @param  string       $url built url for request
     * @return json         returns json from externalservice
     */
    public function getHttp($url)
    {
        try {
            $ch = curl_init();
            if ($ch === false) {
                throw new \Exception('Failed to initialize');
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch);
            if ($output === false) {
                throw new \Exception(curl_error($ch), curl_errno($ch));
            }

            return $output;
        } catch (\Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
    }
}
