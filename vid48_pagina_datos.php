<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        
</head>
<body>
    <?php

        

        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.
        $usuario= mysqli_real_escape_string($conexion,$_GET["usu"]); //te estoy pasando por url del cuadro te texto...
        $contra= mysqli_real_escape_string($conexion,$_GET["con"]);
        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="select * from usuarios WHERE usuario = '$usuario' and contraseña='$contra'";
        //$consulta="delete from usuarios where usuario='$usuario' and contraseña='$contra'" /*para pagina de baja */ /*or'z'='z */
        echo $consulta;
        //ejecutamos la consulta SQL
        $resultados=mysqli_query($conexion,$consulta);

        if(mysqli_affected_rows($conexion)>0){//¿SE ENTRO FILAS AFECTADAS?
            echo"<div class='container mt-5'>
                    <div class='row'>
                        <div div class='col'>
                            <table class='table table-bordered border-danger table-hover'>
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                    while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {/*al poner todo como echo es como si quisera imprimir incluido esta fila mas */
                                    echo "<tr>";
                                        foreach($fila as $valor){
                                        echo"<td>" . $valor . "</td>";
                                    }
                                    echo"</tr>";
                                    }
                                echo"</tbody>
                            </table>
                        </div>
                    </div>
                </div>";
        }else {
            echo'<h5 class="text-center mb-4">NO SE HA ENCONTRADO USUARIOS</h5>';
            mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        }







        /*if ($resultados=mysqli_query($conexion,$consulta)) { // realizamos una consulta a la base de datos el resultado es mixto
            echo"<div class='container mt-5'>
                    <div class='row'>
                        <div div class='col'>
                            <table class='table table-bordered border-danger table-hover'>
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                    while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {/*al poner todo como echo es como si quisera imprimir incluido esta fila mas */
                                 /*   echo "<tr>";
                                        foreach($fila as $valor){
                                        echo"<td>" . $valor . "</td>";
                                    }
                                    echo"</tr>";
                                    }
                                echo"</tbody>
                            </table>
                        </div>
                    </div>
                </div>";
        }else {
            mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        }*/
    ?>
</body>
</html>