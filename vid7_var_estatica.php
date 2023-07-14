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
   /* $contador = 0;
    function incrementaVariable()
    {
          global $contador; 
          $contador++;
          echo $contador . "<br>";  				

    }*/
        function incrementaVariable(){//muchocoidado con la M Y N
            Static  $contador=0;
                    $contador++; //incrementa en uno la variable 
                    echo $contador  .   "<br>";
        }
        incrementaVariable();
        incrementaVariable();
        incrementaVariable();
        incrementaVariable();
    ?>
</body>
</html>