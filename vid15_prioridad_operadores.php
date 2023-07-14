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
        $var1=true;
        $var2=false;
       // $resultado=$var1 && $var2; //ambos deben ser true para q almacene true, caso contrario basta con qe uno sea false
                                   //almacenará false. resultado= false.

        $resultado=$var1 and $var2;                           

         if ($resultado==true) { //diferencia entre "="y "==" el segundo tiene mayor prioridad.
             echo "Correcto";
         }else {
             echo"Incorrecto";
         }   
         
         //https://www.php.net/manual/es/language.operators.precedence.php
    ?>
</body>
</html>