<?php
    require "../Autoloader.php";

    $webRouter = new App\Routers\Router($_SERVER['REQUEST_URI']);

    $webRouter->get(['/','App\Controller\HomeController@index']);
    $webRouter->get(['/next','TrafficLightsController@next']);
