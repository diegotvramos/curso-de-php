<?php
    require "devuelve_productos.php";
    //debemos crear una instancia de la clase debuelve productos
    //necesito crear una instacia para q se ejecute el constructor de la clase
    //cuando instanciamos,(cuando creamos el objeto de esa clase ) lo que hace es ejecutar el constructor. START.
    $productos=new devuelveProductos();// instancia creada.
    $array_productos= $productos->get_productos();  //el metodo o funcion (get_productos) nos devuelve un arrray 
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
                                while ($registro=$array_productos->fetch_array(MYSQLI_ASSOC)) {  /*para q funcionara borre el mysql_assoc de el archivo(devuelve_productos) */
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
    ?>
</body>
</html>