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
        $conexion= new mysqli("localhost","root","vill$","pruebas");
        if ($conexion->connect_errno) {// si este objeto conexion llama a la propiedad connect
            echo"FALLO LA CONECCION " . $conexion->connect_errno;
        }

        //mysqli_set_charset($conexion, "utf8");// esta es la forma procedimental
        $conexion->set_charset("utf8");//forma orientada a objetos

        /*instruccion sql */
        $sql="select * from productos"; 
        //$resultados=mysqli_query($conexion, $sql);
        $resultados=$conexion->query($sql);//resultados va ser igual al objeto conexion con la funcion query 
        /*si la cunsulta sql esta mal escrita creamos un condicional */
        if ($conexion->errno) {
            die($conexion->errno);// qe mate el error de alguna forma
        }

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
        //while ($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)) {  || es la forma procedimental
        while ($fila=$resultados->fetch_row()) {
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
                
                //mysqli_close($conexion); es la forma procedimental
                $conexion->close();   /*OPERADOR FLECHA */ //forma orientada a objetos || finalmente es un objeto y como objeto con el carácter -> le añadimos funciones prefabricadas como close ().

                /*jesssie
                    jesssie
                    hace 1 año
                    la función fetch_array() crea los dos tipos de array a partir del resultado, 
                    uno indexado y el otro asociativo, independientemente de si quieras utilizar 
                    indices numericos o strings para referirite a tus campos del array, siempre 
                    funcionará, el  fetch_row() crea un array indexado, y el fetch_assoc() de 
                    tipo asociativo, utilizar el que mejor convenga queda a nuestro juicio.  
                    

                    pildorasinformaticas
                    pildorasinformaticas
                    hace 6 años
                    +Javier Ocampos Hola !! Poder sí que se puede. Pero hacerlo se vuelve confuso. 
                    No es tan sencillo utilizar la programación procedimental una vez que ya hemos 
                    creado objetos y métodos. Además es algo que no se recomienda por estar considerado 
                    una mala práctica de programación. La POO surgió por la necesidad de hacer más 
                    claro el código sobre todo en programas complejos. Si mezclamos POO con programación 
                    procedimental, lo que hacemos es justo lo contrario de lo que se pretende 
                    (simplificar el código). Un saludo!! 
                                        */
                        
    ?>
</body>
</html>