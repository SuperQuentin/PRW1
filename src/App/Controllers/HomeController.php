<?php
namespace App\Controllers;

session_start();

use App\Controllers\Controller;
use App\Models\TrafficLight;

class HomeController extends Controller
{
    public function index(){
        $trafficLights = isset($_SESSION['traffic-lights']) ? unserialize($_SESSION['traffic-lights']) : [];

        if(empty($trafficLights)){
            array_push($trafficLights,new TrafficLight());
        }

        $_SESSION['traffic-lights'] = serialize($trafficLights);
    }
}