<?php

namespace App\Routers;
use App\Controllers;

class Router{
    protected $url = "";

    protected $routes = [];

    public function __construct($url){        
        $this->url = $url;
    }

    /**
     * Call the method of the controller passed in arguments
     * @param array(['uri', 'controller@index'])
     * @return 
     */
    public function get($args){
        try{
            if(sizeof($args) >= 2){
                $controller = explode('@', $args[1]);

                $controllersFolder = dirname(__DIR__).DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR;

                if(file_exists($controllersFolder.$controller[0].'.php')){
                    array_push($this->routes,new Route($args[0],$controller[0], $controller[1]));
                }
                else{
                    #throw new BadFunctionCallException('This controller doesn\'t exist');
                }
            }
            else{
                #throw new InvalidArgumentException('Too few arguments');
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * Verify if there is an action link to the call url
     */
    public function match(){
        
        $match = [];

        foreach($this->routes as $route){       
            if($route->path == $this->url){
                array_push($match,$route);
            }
        }

        $controllerName = '\App\Controllers\\'.$match[0]->controller;

        $controller = new $controllerName();

        $controller->{$match[0]->method}();
        
    }
}