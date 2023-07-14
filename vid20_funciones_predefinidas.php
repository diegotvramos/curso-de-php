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
     /*$palabra="juan";
     //echo(strtolower($palabra));// devuelve en minusculas
     echo(strtoupper($palabra));//devuelve en mayuscula

     function suma($num1, $num2){
         $resultado= $num1+ $num2;
         return $resultado; // la instruccion return devuelve un valor.
     }

     echo (suma(7,5));*/

     function frase_mayus($frase, $convercion= true){
         $frace=strtolower($frase);
         if ($convercion==true) {
             $resultado=ucwords($frace);
         }else {
             $resultado=strtoupper($frase);
         }
         return $resultado;
     }

     echo(frase_mayus("esto es una prueba",false));
    ?>
</body>
</html>