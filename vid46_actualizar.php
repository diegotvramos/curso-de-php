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
        $cod=$_GET["c_art"];/*con estas variables solo el ultimo formulario será tomado en cuenta para actualizar  */
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
        $consulta="update productos set 
        codigoarticulo='$cod', seccion='$sec', nombrearticulo='$nom', precio= $pre, fecha='$fec', importado='$imp', paisdeorigen='$por'
        where codigoarticulo='$cod'";/*muy importante el capo de criterio para q no modifique toda la tabla, tambien es importante mencionar q si el campo es de tipo numerico no ponerlo en comilla, al parecer esta linea no es suseptible a mayusculas */
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);
        if ($resultados==false) {/*este if nos informa si el registro fue exitoso o fue fallido */
            echo "Error en la consulta";
        }else {
            echo'<h5 class="text-center mb-4 mt-4">REGISTRO ACTUALIZADO</h5>'; /*mt-4 es el magin top para q no este pegado a la parte superior */

            echo'<div class="container">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered border-danger table-hover">
                                <thead>
                                    <tr>
                                        <th>Código Articulo</th>
                                        <th>Seccion</th>
                                        <th>Nombre Articulo</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                        <th>Importado</th>
                                        <th>Pais de Origen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>' . $cod . '</td>
                                        <td>' . $sec . '</td>
                                        <td>' . $nom . '</td>
                                        <td>' . $pre . '</td>
                                        <td>' . $fec . '</td>
                                        <td>' . $imp . '</td>
                                        <td>' . $por . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>';    /*al solo poner comillas a las variables de php como $cod o $sec no me funcionó, tube q concatenar con el'  . '*/
        }
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
    ?>
</body>
</html>