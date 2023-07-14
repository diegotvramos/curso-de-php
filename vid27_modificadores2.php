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
        // quiero reutilizar el codigo para crear un vehiculo
        
        include("vid27_v2.php");
        $mazda=new Coche(); //llamamos al contructor utilizando el operador"new"
        $pegaso=new Camion();
        //$mazda->ruedas=7; //al poner en privadola variable rueda, esa linea genera error.


        echo "El mazda tiene " . $mazda->get_ruedas() . " ruedas<br>";
        //echo "El pegaso   tiene " . $pegaso->ruedas. " ruedas<br>";
        echo "El pegaso   tiene " . $pegaso->get_ruedas(). " ruedas<br>";
        echo"el mazda tiene motor de: " .$mazda->get_motor(). " cc <br>";

    ?>
</body>
</html>