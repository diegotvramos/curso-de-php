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
        include ("vid29_v2.php");
        //Compra_vehiculo::$ayuda=10000;
        Compra_vehiculo::descuento_gobierno(); //aplica descuento para todos los compradores.
        $compra_Antonio=new Compra_vehiculo("compacto"); //cremos un primer objeto o instancia. llamada compra_Antonio; ya le damos un estado inicial osea un precio <base href="" class="">
        $compra_Antonio->climatizador();
        $compra_Antonio->tapiseria_cuero("blanco");
        echo $compra_Antonio->precio_final() . "<br>";

        $compra_Ana=new Compra_vehiculo("compacto");
        $compra_Ana->climatizador();
        $compra_Ana->tapiseria_cuero("rojo");  //esta funcion se comporta diferente en ambos objetos.
        echo $compra_Ana->precio_final() . "<br>";

        
    ?>
</body>
</html>