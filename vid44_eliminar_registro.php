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
        $cod=$_GET["c_art"];
        $sec=$_GET["seccion"];
        $nom=$_GET["n_art"];
        $pre=$_GET["precio"];
        $fec=$_GET["fecha"];
        $imp=$_GET["importado"];
        $por=$_GET["p_orig"];    
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//conectamos la basse de datos con el usuario y la contraseña

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="delete from productos where codigoarticulo='$cod'";/*se debe eliminar por codigo de articulo, por q es unico, pero si eliminas poniendo un nombre generico, borrará todos los nombres iguales y borrara toda las filas con el mismo nombre  */
        $resultados=mysqli_query($conexion,$consulta);           /*elimina toda las filas con ese nombre ^ */
        if ($resultados==false) {/*este if nos informa si el registro fue exitoso o fue fallido */
            echo "Error en la consulta";
        }else {/*hay articulos inexistentes q acepta la consulta y nos muestra como registro eliminado */
            
            if (mysqli_affected_rows($conexion)==0) {/*if anidado */
                echo'<h5 class="text-center mb-4 mt-4">NO HAY REGISTROS QUE ELIMINAR</h5>';
            }else {
                echo'<h5 class="text-center mb-4 mt-4">REGISTRO(S) ELIMINADO(S): '.mysqli_affected_rows($conexion).'</h5>'; /*mt-4 es el magin top para q no este pegado a la parte superior */
            }
        }
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
    ?>
</body>
</html>