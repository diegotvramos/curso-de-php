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
        

        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        echo'<div class="container">
        <form method="get" action="vid46_actualizar.php" class="mt-5"> <!--mt= margin top de 5-->
            <h3 class="text-center mb-4">REGISTRO DE ARTICULOS</h3>';
            while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {/*los nombre de los campos es suseptible a mayuscal al identificar en la fila de el array asociativo */
            echo'<div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="c_art">Código Articulo</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="c_art" name="c_art" value="' . $fila['codigoArticulo'] . '">
                </div> 
            </div>
            <div class="row mb-3"> <!--margin boton da un espacio para q no esten apegadoss-->
                <label for="seccion" class="col-sm-2 col-form-label">Seccion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="seccion" name="seccion" value="' . $fila['seccion'] . '">
                </div>
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="n_art">Nombre Articulo</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="n_art" name="n_art" value="' . $fila['nombreArticulo'] . '">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="precio">Precio</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="precio" name="precio" value="' . $fila['precio'] . '">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="fecha">Fecha</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fecha" name="fecha" value="' . $fila['fecha'] . '">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="importado">Importado</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="importado" name="importado" value="' . $fila['importado'] . '">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="p_orig">Pais de Origen</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="p_orig" name="p_orig" value="' . $fila['paisdeorigen'] . '">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="fot">foto</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fot" name="fot" value="' . $fila['foto'] . '">
                </div> 
            </div>';
              }

            echo '<button type="submit" class="btn btn-outline-primary" value="Actualizar">actualizar</button>
                  <button type="button" class="btn btn-outline-danger">Borrar</button>
        </form>
    </div>';
    ?>
</body>
</html>