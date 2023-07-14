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
    /*function incrementa(&$valor1){ //parametro por referencia
        $valor1++;
        return $valor1;
    }
    $numero=5;
    echo incrementa($numero) . "<br>";
    echo $numero;*/
    function cambia_mayus(&$param){
        $param=strtolower($param);//conbierte en minusculas
        $param=ucwords($param);
        return $param;
    }
    
    $cadena="hoLa mundO";
    echo cambia_mayus($cadena)."<br>";
    echo $cadena;
    ?>
</body>
</html>