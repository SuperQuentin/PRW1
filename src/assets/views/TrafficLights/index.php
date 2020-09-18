<?php 


ob_start();

if(isset($trafficLights)){
    foreach($trafficLights as $tl){
        $tl->build();
    }
}
else
{
    ?> 
    <h2>There is no traffic light ¯\_(ツ)_/¯</h2>
    <?php
}

$content = ob_get_clean();
