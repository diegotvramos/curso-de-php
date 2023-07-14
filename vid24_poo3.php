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
        
        include("vid24_v2.php");
        $mazda=new Coche(); //en PHP no es necesario los parentesis. una clase puede q no tener
        $pegaso=new Camion();


        echo "El mazda tiene " . $mazda->ruedas . " ruedas<br>";
        echo "El mazda tiene " . $pegaso->ruedas . " ruedas";

    ?>
</body>
</html>