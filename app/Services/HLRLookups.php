<?php

namespace App\Services;

use App\Interfaces\ServiceInterface;

class HLRLookups implements ServiceInterface
{
    /*
    |--------------------------------------------------------------------------
    | HLRLookups Service
    |--------------------------------------------------------------------------
    |
    | External service specific class : hlr-lookups.com
    |
     */

    /**
     * Builds service specific url
     * @param  object $app    main app object
     * @param  string $msisdn input from text field
     * @return string         built url
     */
    public static function urlBuilder($app, $msisdn)
    {
        $username    = $app->getAppVariable('API_USERNAME');
        $password    = $app->getAppVariable('API_PASS');
        $base        = 'https://www.hlr-lookups.com/api/?action=submitSyncLookupRequest';
        $msisdn_base = $base . '&msisdn=' . $msisdn;
        $url         = $msisdn_base . '&username=' . $username . '&password=' . $password;
        return $url;
    }

    /**
     * Service specific response parser
     * @param  json $response   response from exteral service (hlr-lookups.com)
     * @return array            parsed json
     */
    public static function responseParser($response)
    {
        $obj         = json_decode($response, true);
        $returnArray = null;
        if (($obj["success"] == true)):
            if (array_key_exists("results", $obj)):
                return self::parseSuccess($obj["results"]);
            else:
                return 'No results';
            endif;
        elseif ($obj["success"] == false):
            if (array_key_exists("errors", $obj)):
                return self::parseFailed($obj['errors']);
            endif;
        endif;
    }

    /**
     * If look up succeed
     * @param  json $data   response from exteral service (hlr-lookups.com)
     * @return array        parsed response
     */
    public static function parseSuccess($data)
    {
        $response = null;
        foreach ($data as $item):
            if (array_key_exists("msisdncountrycode", $item)):
                $response[] = ['Country Code' => $item["msisdncountrycode"]];
            endif;

            if (array_key_exists("originalcountryprefix", $item)):
                $response[] = ['Country Dialling Code' => $item["originalcountryprefix"]];
            endif;

            if (array_key_exists("originalnetworkname", $item)):
                $response[] = ['MNO Identifier' => $item["originalnetworkname"]];
            endif;

            if (array_key_exists("imsi", $item)):
                $response[] = ['imsi' => $item["imsi"]];
            endif;

            if (array_key_exists("msisdn", $item)):
                $response[] = ['msisdn' => $item["msisdn"]];
            endif;

            if (array_key_exists("isvalid", $item)):
                $response[] = ['is valid' => $item["isvalid"]];
            endif;
        endforeach;
        return $response;

    }

    /**
     * If lookup failed.
     * @param  json $data   response from exteral service (hlr-lookups.com)
     * @return array        parsed response
     */
    public static function parseFailed($data)
    {
        $response = null;
        foreach ($data as $item):
            foreach ($item as $error):
                if (count($error) == 2):
                    $response[] = [$error[0] => $error[1]];
                else:
                    $response[] = ['message' => 'Yikes, unknown error!'];
                endif;
            endforeach;
        endforeach;
        return $response;
    }
}
