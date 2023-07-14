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
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//conectamos la basse de datos con el usuario y la contraseña

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="insert into productos(codigoarticulo, seccion, nombrearticulo) values 
                                         ('AR44', 'DEPORTES', 'RAQUETA BADMINTON')";/**solo vasta refrescar la pagina para agregar registro */ 
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);
        
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
    ?>
</body>
</html>