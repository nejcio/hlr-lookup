<?php

namespace App\View;

class View
{
    /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    |
    | This class is responsible to handle view renders and get data from view
    |
    */

    /**
     * Renders the view
     * @param  string $file  path to the view file
     * @param  array $data   data that will be passed to the view
     */
    public static function render($file, $data) {

        ob_start(); extract($data);

        try
        {

          include($file);

           echo ob_get_clean();
        }

        catch(\Exception $e)
        {
          ob_end_clean(); throw $e;
        }

    }

}