

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="text-center mt-5 mb-5"><!--alineacion de texto https://getbootstrap.com/docs/5.2/utilities/text/#text-alignment-->
        <h1 class="fs-5 fw-bold text-primary">TODO EL BLOG </h1>
    </div>

    <?php

        /*conectamos con la base de datos */
        require("datos_conexion.php");
        $miconexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
        /*comprobamos conexion */
        if (!$miconexion) {
            die("la conexion a fallado: " . mysqli_connect_error());// la funcion DIE termina con el script
        }
        /*cramos la instruccion para q rescate la informacion que hay almacenada en la db */

        $miconsulta="select * from contenido order by fecha DESC"; //ORDER BY por defecto es ASC (acendente)empieza a mostrar la fecha mas antigua primero!! para q no ocura eso agregamos la clausula DESC

        if ($resultado=mysqli_query($miconexion, $miconsulta)) { // el $resultado se vuelve en un array donde se almacena los registros
            //obtener array asociativo
            while ($fila=mysqli_fetch_assoc($resultado)) {
                echo "<h3>" .$fila['titulo']. "</h3><br/>";
                echo "<h4>" .$fila['fecha']. "</h4><br/>";
                echo "<h3>" .$fila['comentario']. "</h3><br/>";
                if ($fila['imagen']!='') { // si el usuario no sube imagen, no nos debe aparecer error al cargar la imagen, esos lo solucionamos con un condicional
                    echo "<img src='carpetaimagenes/" .$fila['imagen']. "' class='rounded-circle img-fluid'/>";
                }
                echo "<hr/>"; //representa un cambio de tema entre parafos
            }
        }

        /*
            Obtener una fila de resultado como un array asociativo (estilo orientado a objetos/ estilo por procedimientos)
            https://www.php.net/manual/es/mysqli-result.fetch-assoc.php 

        */
?>

</body>
</html>