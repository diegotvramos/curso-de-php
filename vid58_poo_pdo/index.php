<?php
    require "devuelve_productos.php";
    $pais=$_GET["buscar"];
    $productoss5=new devuelveProductos();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelveProductos()'<===== es una clase 
    $array_productos= $productoss5->get_productos($pais);  //llamamos a el metodo o funcion (get_productos) el cual nos devuelve un arrray  || llamamos a la funcion 'get productos'
?>

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
            echo '<h3 class="text-center mt-3 mb-3">PRODUCTOS DEVUELTOS: </h3>';
            echo"<div class='container'>
            <div class='row'>
                <div div class='col'>
                    <table class='table table-bordered border-danger table-hover'>
                        <thead>
                            <tr>
                                <th>codigo Articulo</th>
                                <th>Seccion</th>
                                <th>nombre articulo </th>
                                <th>precio</th>
                                <th>fecha</th>
                                <th>Importado</th>
                                <th>Pais de Origen</th>
                                <th>Foto</th>
                                
                            </tr>
                        </thead>
                        <tbody>";
                                while ($registro=$array_productos->fetch(PDO::FETCH_ASSOC)) {  /*para q funcionara borre el mysql_assoc de el archivo(devuelve_productos) */  //pdo fetch array español BUSQUEDA....  https://www.php.net/manual/es/pdostatement.fetch.php
                                    echo "<tr>";
                                                    foreach($registro as $valor){ /*esto funciona como los punteros */
                                                    echo"<td>" . $valor . "</td>";
                                                    }
                                    echo"</tr>";
                                }
                    echo"</tbody>
                    </table>
                </div>
            </div>
        </div>";

        //$array_productos->fetch(PDO::FETCH_ASSOC) mysqli_fetch_array($array_productos, MYSQLI_ASSOC) |||||| ninguno funciono.

        //https://www.php.net/manual/es/mysqli-result.fetch-array.php
        ///* array asociativo */
            //$row = $result->fetch_array(MYSQLI_ASSOC);
            //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);

            //https://www.php.net/manual/es/pdo.connections.php
    ?>
</body>