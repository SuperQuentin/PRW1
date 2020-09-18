<?php
    require "../Autoloader.php";

    $webRouter = new App\Routers\Router($_SERVER['REQUEST_URI']);

    $webRouter->get(['/','HomeController@index']);
    $webRouter->get(['/next','TrafficLightsController@next']);

    $webRouter->match();
