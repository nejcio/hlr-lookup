<?php

namespace App\Validators;

class MSISDN
{

    /*
    |--------------------------------------------------------------------------
    | MSISDN Validator
    |--------------------------------------------------------------------------
    |
    | This validator validates user input from the text fied
    |
    */

     /**
      * Senitizes the input
      * @param  string $msisdn MSISDN input from the text field
      * @return string         validated string
      */
    public static function senitize($msisdn)
    {

        $cleaned = htmlspecialchars(trim($msisdn));

        $validated = self::validate($cleaned);

        return $validated;

    }

    /**
     * validates the input - string length
     * @param  string $msisdn MSISDN input from the text field
     * @return string         returns validated string
     */
    public static function validate($msisdn)
    {

        (strlen($msisdn) < 15) ? $valid = $msisdn : $valid = false ;

        (strlen($msisdn) > 1) ? $valid = $msisdn : $valid = false ;

        return $valid;

    }

}