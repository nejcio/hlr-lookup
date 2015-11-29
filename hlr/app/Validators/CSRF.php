<?php

namespace App\Validators;

class CSRF
{
    /*
    |--------------------------------------------------------------------------
    | CSRF token validator
    |--------------------------------------------------------------------------
    |
    | This validator validates CSRF token
    |
    */

   /**
    * Creates the CSRF token
    * @return string CSRF token
    */
    public static function createToken()
    {

        $token = password_hash(self::randomString(6), PASSWORD_BCRYPT, ['cost' =>'8']);

        return $token;

    }

    /**
     * Creates random string for the CSRF token
     * @param  int $length      random string length
     * @return string           random string
     */
    public static function randomString($length)
    {

        $str = "";

        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));

        $max = count($characters)-1;

        for ($i = 0; $i < $length; $i++):

            $rand = mt_rand(0, $max);

            $str .= $characters[$rand];

        endfor;

        return $str;

    }

    /**
     * Checks if CSRF token in post request and in session match
     * @param  string $post_csrf    token from post request
     * @param  string $session_csrf token stored in session
     * @return boolean               true or false
     */
    public static function csrfCheck($post_csrf, $session_csrf)
    {

        if(htmlspecialchars($post_csrf) !== $session_csrf):

            return false;

        else:

            return true;

        endif;

    }
}