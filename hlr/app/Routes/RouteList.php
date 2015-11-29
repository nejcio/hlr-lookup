<?php

namespace App\Routes;

class RouteList
{

    /*
    |--------------------------------------------------------------------------
    | Main Application Route List
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    |
    */

  /**
   * Returns Active List of routes
   * @return array list of routes
   */
  public static function routes() {

    return [

        ["uri" => "/", "action" => "get" ,"uses" => "IndexController@index"],
        ["uri" => "/", "action" => "post" ,"uses" => "IndexController@handle"],
        ["uri" => "/api", "action" => "get" ,"uses" => "APIController@handle"]

    ];

  }

}