<?php
    session_start();
    require_once "../src/models/TrafficLight.php";

    $url = '';

    if(isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
    }

    if($url[0] == 'next' && empty($url[1])){

    }


    $trafficLights = isset($_SESSION['traffic-lights']) ? unserialize($_SESSION['traffic-lights']) : null;

    if(empty($trafficLights)){
        $trafficLights = array(new TrafficLight());
    }

    array_push($trafficLights, new TrafficLight());
    var_dump($trafficLights);

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Feu tri color</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
        foreach ($trafficLights as $tl){
    ?>
            <?= $tl->build(); ?>
    <?php
        }
    ?>
</body>

</html>

<?php
    $_SESSION['traffic-lights'] = serialize($trafficLights);
?>