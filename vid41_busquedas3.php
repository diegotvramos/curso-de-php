<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <?php
        function ejecuta_consulta($labusqueda){

        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $consulta="select * from productos WHERE nombrearticulo like '%$labusqueda%'"; //carracter comodin %
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);

         echo "<div class='container'><div class='row' ><div class='col'>";
            echo "<table class= 'table  table-bordered border-danger table-hover'><tbody>"; /*las mayusculas en css si importan */
        while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) { //accede al primer registro,sin true por que se evalual por defecto en verdadero == true
            
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
    }
    ?>
</head>
<body>
    <?php
        /*@$mibusqueda=$_GET["buscar"];
        $mipag=$_SERVER["PHP_SELF"]; //para q la informacion se envie a la misma pagina

        if ($mibusqueda!=null) {
            ejecuta_consulta($mibusqueda); 
        }else {
            echo'<form action="' . $mipag . '" class="container" method= "get">'; /*' . $mipag . '*/
             /*   echo'<div class="mb-3">';
                    echo'<label class="form-label">escribe el dato a buscar: </label>';
                    echo'<input type="text" class="form-control" name="buscar">';           
                echo'</div>';    
                echo'<button type="submit" class="btn btn-danger">BUSCAR!</button>';
            echo'</form>';
        }*/



    /*el true puede ir por defecto en un if pero el FALSE lo cabia el sentido de la pregunta en if */
if(isset($_GET["buscar"])==false)  //Recordar que isset determina si una variable está definida y no es NULL. Entonces devolverá false si no está definida (como en este caso). Por lo tanto, si el input buscar no a enviado datos, entonces  muestra el formulario/
{                                   /* Al dejar action="", le indica al submit que lo envíe a la misma página*/
    echo'<form action="" class="container" method= "get">';
       echo'<div class="mb-3">';
           echo'<label class="form-label">escribe el dato a buscar: </label>';
           echo'<input type="text" class="form-control" name="buscar">';           
       echo'</div>';    
       echo'<button type="submit" class="btn btn-danger">BUSCAR!</button>';
   echo'</form>';
}
else                   /* Si el input buscar está definido (si envió datos) ejecuta la consulta*/
{  
   ejecuta_consulta($_GET["buscar"]);
} 
    ?>
</body>
</html>