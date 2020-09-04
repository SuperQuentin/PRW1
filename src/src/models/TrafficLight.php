<?php

class TrafficLight
{
    public $red = false;
    public $yellow = false;
    public $green = false;

    public $state;
    public $id;

    public function __construct($state = null){
        $this->id = uniqid('tl');
        $this->setState($state);
    }

    public function setState($state = 0)
    {
        switch ($state) {
            case 0 :
                $this->red = true;
                $this->yellow = false;
                $this->green = false;
                break;

            case 1 :
                $this->red = true;
                $this->yellow = true;
                $this->green = false;
                break;

            case 2 :
                $this->red = false;
                $this->yellow = false;
                $this->green = true;
                break;

            case 3 :
                $this->red = false;
                $this->yellow = true;
                $this->green = true;
                break;

            default :
                $this->red = false;
                $this->yellow = true;
                $this->green = false;
        }

        $this->$state = $state;
    }

    public function build()
    {
        $data['red'] = $this->red;
        $data['yellow'] = $this->yellow;
        $data['green'] = $this->green;

        $state = $this->state;

        $data['nextState'] = ! $state <= 3 ? $state + 1 : 0;

        ob_start();

        require_once "../src/view/components/TrafficLight.php";

        $trafficLight = ob_get_clean();

        return $trafficLight;

    }



}