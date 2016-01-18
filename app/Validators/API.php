<?php

namespace App\Validators;

class API
{
    /*
    |--------------------------------------------------------------------------
    | API Key Validator
    |--------------------------------------------------------------------------
    |
    | Validates the api key from the request
    |
     */

    /**
     * Validates the api key from the request
     * @param string        $post_apikey string from the request
     * @param boolean       $app         true or false
     */
    public static function APIkey_check($post_apikey, $app)
    {
        if (htmlspecialchars($post_apikey) !== $app->getAppVariable('API_KEY')):
            return false;
        else:
            return true;
        endif;
    }
}
