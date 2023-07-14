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

        $pais=$_GET["buscar"]; //almacena en bsqueda lo q te estoy pasando por url del cuadro te texto buscar
        require ("vid38_datos_conexion.php");//ponemos la ruta, como lo tenemos en el mismo directorio

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");
        //consultas
        $sql="select codigoArticulo, seccion, precio, paisdeorigen from productos where paisdeorigen=?"; //paso 1 creamos la sentencia SQL.
        //preparamos la consulta
        $resultado=mysqli_prepare($conexion,$sql); //paso 2 nos devuelve el objeto tip mysqli_stmt
        $ok=mysqli_stmt_bind_param($resultado,"s",$pais);//paso 3devulve true o false| tiene 3 argumentos, el parametro
 /*Rafael Cuello
Rafael Cuello

Especificación del tipo de caracteres 

mysqli_stmt_bind_param($resultado,"caracterDescripcion",$pais);

              Carácter Descripción

i la variable correspondiente es de tipo entero
d la variable correspondiente es de tipo double
s la variable correspondiente es de tipo string
b la variable correspondiente es un blob y se envía en paqu*/
        //paso 4 |ejecutamos las consulta
        $ok=mysqli_stmt_execute($resultado); //en resultado se almacena el objeto 'mysqli_stmt' || trrue o false
        if ($ok==false) {
            echo "error al ejecutar la consulta";
        }else {
            $ok=mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);// paso 5| asociamos variables al resultado de la consulta
        
        echo '<h3 class="text-center mt-3 mb-3">ARTICULOS ENCONTRADOS: </h3>';
        echo"<div class='container'>
        <div class='row'>
            <div div class='col'>
                <table class='table table-bordered border-danger table-hover'>
                    <thead>
                        <tr>
                            <th>Código Articulo</th>
                            <th>Seccion</th>
                            <th>Precio</th>
                            <th>Pais de Origen</th>
                        </tr>
                    </thead>
                    <tbody>";
                            while (mysqli_stmt_fetch($resultado)) { //paso 6, leemos resultados
                                echo'<tr>
                                        <td>' . $codigo . '</td>
                                        <td>' . $seccion . '</td>
                                        <td>' . $precio . '</td>
                                        <td>' . $pais . '</td>
                                    </tr>';
                            }
                            mysqli_stmt_close($resultado); //cerramos el objeto q nos devolvio la funcion PREPARE.
                    echo"</tbody>
                </table>
            </div>
        </div>
    </div>";
        }

        /*con todo esto evitamos la inyeccion SQL*/ 
        /*seria bueno q al no encontrar articulos muestre simplemente un mensaje de no se encontro articulos */
        /*mas sobre sentencias preparadas  https://www.php.net/manual/es/mysqli.quickstart.prepared-statements.php */
        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.




        /*lo encontre en los comentarios */
        /*Juan Muñoz
Juan Muñoz
hace 1 año
Buenas os pongo que tendria que ser en PHP 8 el Bucle, ya que tiene que ser con la función FETCH en el WHILE

$sql="SELECT Nombre, Oficina, Codigo_de_Empresa FROM progress_excel_avanzado_2016_no WHERE Codigo_de_Empresa= ? ";

  

  $resultado=mysqli_prepare($conexion,$sql);
  $ok=mysqli_stmt_bind_param($resultado, "s", $c_emp);


  $ok=mysqli_stmt_execute($resultado);

    if($ok==false){

      echo "Error al ejecutar la consulta";

    }else{

      $ok=mysqli_stmt_bind_result($resultado, $Nombre, $Oficina, $c_emp);

      echo "Artículos encontrados: <br><br>";

      
      

      

       while ($resultado->fetch()){
        
        

       echo $Nombre . "   " . $Oficina . "   " . $c_emp . "<br>";
       }
       $resultado->close();

       mysqli_stmt_close($resultado);



    } 
        */
    ?>
</body>
</html>