

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
    <div class="text-center mt-5 mb-5"><!--alineacion de texto https://getbootstrap.com/docs/5.2/utilities/text/#text-alignment-->
        <h1 class="fs-5 fw-bold text-primary">BLOG HECHO CON POO Y PDO </h1>
    </div>

<body>
    <?php
        include_once("../modelo/manejo_objetos.php");
        /**ahora debemos conectar con la base de datos */

        try {
            $miconexion= new PDO('mysql:host=localhost;dbname=dbblog', 'root', 'vill$');
            $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            /**creamos ese objeto perteneciente a manejo objeto  */
            $manejo_objetos=new ClassManejoObjetos($miconexion);
            /** usamos el metodo a traves del objeto creado */
            $tabla_blog= $manejo_objetos->getContenidoPorFecha(); //el array se almacena en $tabla_blog
            if (empty($tabla_blog)) { /**en caso de que la tabla este vacia nos responda... */
                echo "NO HAY ENTRADAS DE BLOG AUN";
            }else {
                /** Recoremos el array */
                foreach ($tabla_blog as $valor) {/**con esto recoremos pocicion a posicion el array */
                    echo "<h3>" . $valor->gettitulo() . "</h3>";
                    echo "<h4>" . $valor->getfecha() . "</h4>";
                    echo "<div>". $valor->getcomentario() . "</div>";
                    if ($valor->getimagen()!= "" ) {// se puede usar el empty? | si hay imagen hass...
                        echo "<img src='../imagenes/" . $valor->getimagen() . "'>";
                    }
                    echo "<hr/>";// linea divisoria
                }
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            echo "linea del error: " . $e->getLine();
        }
    ?>
    <!--hacemos un link para volver al formulario-->
    <div class="row mb-3 justify-content-center">
        <div class="col-auto">
            <a href="formulario.php" class="btn btn-primary s">ir al formulario </a>
        </div>   
    </div>
</body>
</html>