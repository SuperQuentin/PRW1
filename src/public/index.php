<?php
    require_once "../src/controller/TrafficLight.php";

    $state = isset($_GET['state']) ? $_GET['state'] : 0;

    $tl1 = new TrafficLight($state);
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Feu tri color</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?= $tl1->build() ?>
</body>

</html>
