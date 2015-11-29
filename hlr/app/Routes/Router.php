<?php

namespace App\Routes;

use Bootstrap\App;
use App\Interfaces\RouterInterface;
use App\Routes\RouteList;


class Router implements RouterInterface
{

    /*
    |--------------------------------------------------------------------------
    | Main Application Router
    |--------------------------------------------------------------------------
    |
    | This is the main application router.
    |
    */

    protected $app;

    /**
     * Router constructor
     * @param array $app array of aplication variables
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Request handler
     * Handles the request and fires associated controller
     * @return json/view
     */
    public function handleIt()
    {

        $requestDetails = $this->prettyfyRequest($_SERVER);

        $findController = $this->findController($requestDetails);

        if($findController !== null):

            $controller = explode( "@", $findController);

            $namespace = explode("\\",  __NAMESPACE__);

            $objPath = "\\" . $namespace[0]. "\\" . "Controllers\\" . $controller[0];

            $controllerObject = new $objPath($this->app);

            $controllerObject->$controller[1]();

        else:

            die('404 Page not found, sorry');

        endif;

    }

    /**
     * Request Array Prettifier
     * @param  array $request   $_SERVER request
     * @return array          array of prettyfied uri and action from the request array
     */
    public function prettyfyRequest($request)
    {

        $requestArray = [

            "action" => strtolower($request["REQUEST_METHOD"]),
            "uri"    => strtolower(htmlspecialchars(strtok($request["REQUEST_URI"],'?'))),

        ];

        return $requestArray;

    }

    /**
     * [findController description]
     * @param  [type] $preetyfiedRequest [description]
     * @return [type]                    [description]
     */
    public function findController($preetyfiedRequest)
    {

        $found = null;

        foreach (RouteList::routes() as $route) :

            if ($route["uri"] == $preetyfiedRequest["uri"] && $route["action"] == $preetyfiedRequest["action"]):

               $found = $route["uses"];

            endif;

        endforeach;

        return $found;

    }
}