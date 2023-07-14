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
        //$base;
        $busqueda_sec=$_GET["seci"];
        $busqueda_porig=$_GET["p_orig"];
         try {
            $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root','vill$');// INSTACIAMOS LA CLASE PDO llamando al constructur de la clase con el operador NEW pdo  PDO es la clase
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//hacen que en caso de un error se lance una excepción || https://www.php.net/manual/es/pdo.setattribute.php
            $sql="select nombreArticulo, seccion, precio, paisdeorigen from productos where seccion=:secc AND paisdeorigen=:porig"; //secc porig son nombre de marcadores SOLO SE ESTA ALMACENANDO EN LA VARIABLE SQL.
            $resultado=$base->prepare($sql);// base llamando a su metodo PREPARE QUE RECIBE POR PARAMETRO EL OBJETO SQL    
            $resultado->execute(array(":secc"=>$busqueda_sec, ":porig"=>$busqueda_porig));// busque las posiciones vid 30| la posicion SECC corresponde al termino busqueda_sec o lo que hay almacenado en la variable busqueda_sec
            /*USAMOS EL EJEMPLO 3 DE PHP DE EXECUTE */
                echo '<h3 class="text-center mt-3 mb-3">ARTICULOS ENCONTRADOS: </h3>';
                echo"<div class='container'>
                <div class='row'>
                    <div div class='col'>
                        <table class='table table-bordered border-danger table-hover'>
                            <thead>
                                <tr>
                                    <th>Nombre Articulo</th>
                                    <th>Seccion</th>
                                    <th>Precio</th>
                                    <th>Pais de Origen</th>
                                </tr>
                            </thead>
                            <tbody>";
                                    while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) { //paso 6, leemos resultados
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
            $resultado->closeCursor();//cerramos la base de datos? SI NO LO CIERRAS CONSUMES MEMORIA. STATEMANT

        } catch (exception $e) {
            //die('ERROR: ' . $e->GetMessage()); //lo concatemamos con una funcion que tiene el objeto 'E'
            echo'codigo del error: ' . $e->getCode();
            echo'linea del error: ' . $e->getLine();
        }finally{ //tanto si hay extito o no en la conexion siempre se ejecutara 
            echo "bye";  // no se ejecuta al entrar en error en el TRY
            $base=null;//vacia la memoria
            
        }
    ?>
</body>
</html>