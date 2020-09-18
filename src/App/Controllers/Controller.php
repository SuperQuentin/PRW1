<?php

namespace App\Controllers;

class Controller{

    protected $layout;
    
    public function __construct(){
        $this->layout = dirname(__DIR__,2)."/assets/views/layouts/default.php";
    }
    
}