<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            for ($i=1; $i <=10 ; $i++) { 
                //echo "<p>Emos entrado en el bucle </p>";
                echo "9*$i=" . 9*$i .   "<br>";
            }
            echo "Hemos salido del Bucle<br><br>";

            /*for ($i=0; $i<=20 ; $i+=2) { 
                echo "<p>Emos entrado en el bucle </p>";
                if ($i==6) {
                    echo "<p>Bucle interrumpido</p>";
                    break;// hace q termine el bucle
                }
            }*/

            for ($i=0 ; $i <=10 ; $i++) { 
                if($i==0){
                    echo"la division por 0 no es posible<br>";
                    continue; // no permite la iteracion, hace q se salte a la otra vuelta
                }
                echo "9/$i=" . 9/$i .   "<br>";
            }
            echo "<p>hemos salido de el bucle </p>";
    ?>
</body>
</html>