<?php
namespace App\Controllers;

session_start();
use App\Models\TrafficLight;
use App\Controllers\Controller;

class TrafficLightsController extends Controller
{
    protected $trafficLights;


    public function __construct()
    {
        $this->trafficLights = $this->getTrafficLightsItemFromSession(isset($_SESSION['traffic-lights'])?$_SESSION['traffic-lights']:null);
        parent::__construct();
    }

    public function index(){
        require  dirname(__DIR__,2)."/assets/views/trafficLights/index.php";

        require $this->layout;
         
        $this->setTrafficLightsItemFromSession(isset($_SESSION['traffic-lights'])?$_SESSION['traffic-lights']:null);
       
    }
    public function next(){
        var_dump($this->trafficLights);
        foreach($this->trafficLights as $tl){
            var_dump($tl);
        }
    }

    protected function setTrafficLightsItemFromSession($session = null){
        $_SESSION['traffic-lights'] = isset($session)? serialize($session)
        
        $session = serialize($session);
    }

    protected function getTrafficLightsItemFromSession($session = null){
        $trafficLights = isset($session) ? unserialize($session) : [];

        if(empty($trafficLights)){
            array_push($trafficLights,new TrafficLight());
        }

        return $trafficLights;
    }
}