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

        $busqueda=$_GET["buscar"]; //almacena en bsqueda lo q te estoy pasando por url del cuadro te texto buscar
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="select * from productos WHERE nombrearticulo like '%$busqueda%'"; //carracter comodin %
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);

        echo"<div class='container mt-5'>
        <div class='row'>
            <div div class='col'>
                <table class='table table-bordered border-danger table-hover'>
                    <thead>
                        <tr>
                            <th>Código Articulo</th>
                            <th>Seccion</th>
                            <th>Nombre Articulo</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Importado</th>
                            <th>Pais de Origen</th>
                            <th>foto</th>
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
        
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        
    ?>
</body>
</html>