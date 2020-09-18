<?php

namespace App\Models;

class TrafficLight
{
    public $red = false;
    public $yellow = false;
    public $green = false;

    public $state;
    public $id;

    public function __construct($state = 0){
        $this->id = uniqid('tl');
        $this->setState($state);
    }

    public function setState($state)
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

        $this->state = $state;
    }

    public function nextState()
    {
        $tmpState = $this->state;

        if(0 <= $tmpState && $tmpState < 3){
            $this->state++;
        }
        else{
            $this->state = 0;
        }
        $this->setState($this->state);
    }

    public function build()
    {
        $data['red'] = $this->red;
        $data['yellow'] = $this->yellow;
        $data['green'] = $this->green;
        
        require_once dirname(__DIR__,2)."/assets/views/components/TrafficLight.php";

    }



}