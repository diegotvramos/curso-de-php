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

        $c_art=$_GET["c_art"]; //almacena en bsqueda lo q te estoy pasando por url del cuadro te texto buscar
        $secc=$_GET["secc"]; // el nombre de las variables da igual
        $n_art=$_GET["n_art"];
        $pre=$_GET["pre"];
        $fec=$_GET["fec"];
        $imp=$_GET["imp"];
        $p_ori=$_GET["p_orig"];
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $sql="insert into productos (codigoArticulo, seccion, nombreArticulo, precio, fecha, importado, paisdeorigen) values
                                    (?,?,?,?,?,?,?)"; //paso 1 creamos la sentencia SQL. | vamos a trabajar con 7 campos entonces ponemos 7 interogantes
        //preparamos la consulta
        $resultado=mysqli_prepare($conexion,$sql); //paso 2 nos devuelve el objeto tip mysqli_stmt
        $ok=mysqli_stmt_bind_param($resultado,"sssdsss",$c_art, $secc, $n_art, $pre, $fec, $imp, $p_ori);//paso 3devulve true o false| tiene 3 argumentos, el parametro | lo debemos hacer en el mismo orden  en el que tenemos los campos en la sentencia sql.
        $ok=mysqli_stmt_execute($resultado); //en resultado se almacena el objeto 'mysqli_stmt' || trrue o false
        if ($ok==false) {
            echo "error al ejecutar la consulta";
        }else {
            //$ok=mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);// paso 5| asociamos variables al resultado de la consulta
       
            echo'<h5 class="text-center mb-4 mt-4">REGISTRO GUARDADO</h5>'; /*mt-4 es el magin top para q no este pegado a la parte superior */

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
                                        <td>' . $c_art . '</td>
                                        <td>' . $secc . '</td>
                                        <td>' . $n_art . '</td>
                                        <td>' . $pre . '</td>
                                        <td>' . $fec . '</td>
                                        <td>' . $imp . '</td>
                                        <td>' . $p_ori . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>'; 
        }
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        


        /*
Miguel Reyes
hace 2 años
Para mostrar los datos de el producto insertado es tan sencillo como:
echo "Agregado nuevo registro: <br><br>";

            echo "Código Artículo: $c_art <br>

            Sección: $secc <br>

            Nombre: $n_art <br>

            Precio: $precio <br>

            Fecha: $fecha <br>

            Importado: $imp <br>

            País de origen: $pais";  */
    ?>
</body>
</html>