<html>

<head>
    <meta charset="utf-8" />
    <title>Feu tri color</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="trafic-light">

        <?php
            $stage = $_GET["stage"];


            switch ($stage){
                case "stop" :

                    break;

                case "ready_to_go" :
                    break;

                case "go" :
                    break;

                case "ready_to_stop":
                    break;
            }
        ?>

        <div class="red light"></div>
        <div class="yellow light"></div>
        <div class="green light"></div>

        <button>=></button>

    </div>

</body>

</html>
