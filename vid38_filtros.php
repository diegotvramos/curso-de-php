<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        
</head>
<body>
    <?php
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="select * from productos WHERE PAISDEORIGEN='ESPAÑA'";
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);
        //esta consulta se almacena en un resulced es como un tabla virtual en memoria
        //para poder ver la informacion de esta tabla virtual usamos la funcion mysql_fetch_row
        //lo ve linea por linea y lo almacena en un array
         //mientras aya registros en el resulset. 

         /*echo "<table>";
         echo "<thead>";
         echo "<tr>";                   
         echo "<th>titulo</th>";                         
         echo "</tr>";                   
         echo" </thead>";
         echo "</table>";*/
         // https://youtu.be/ixP7BHR522k    par hacer tablas con bostrap
         echo "<div class='container'><div class='row' ><div class='col'>";
            echo "<table class= 'table  table-bordered border-danger table-hover'>"; /*las mayusculas en css si importan */
            /*echo"<thead><tr><th>_Titulo_</th></tr></thead><tbody>";/*encabezad:  */
        while ($fila=mysqli_fetch_row($resultados)) { //accede al primer registro,sin true por que se evalual por defecto en verdadero == true
            
            echo "<tr>"; //es una fila
            foreach($fila as $valor){ /*para que me entiendan las etiquetas, era importante poner llave al foreach */
            echo"<td>";
   			echo $valor . " ";
  			echo "</td>";
            }
            echo "</tr>";/*al cerrar las etiquetas despues de la imprecion de valor, ya no me ponia el primer valor encima. */
            
        }
        echo "</tbody></table>";// el tbody no esta afectando.
        echo "</div></div></div>";
        
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        
    ?>
</body>
</html>