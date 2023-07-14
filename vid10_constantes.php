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
        define("AUTOR", "JUAN");// se usa mayusculas
        //AUTOR="MARIA", TRUE; //al intentar reedefinir el valor de la constante da error. 
        //define("AUTOR", "maria");Defining Case-insensitive Constants Has Been Removed in PHP 8.0
        echo "el nombre del autor es: ". AUTOR."</br>";//da error. 
        echo "la linea de esta instruccion es: " . __LINE__ . "<br>";
        echo "estamos trabajando con este fichero: " . __FILE__."<br>";
        echo __DIR__;
    ?>
</body>
</html>