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
        $busqueda_cart=$_POST["c_art"];
        $busqueda_seccion=$_POST["secc"];
        $busqueda_nart=$_POST["n_art"];
        $busqueda_precio=$_POST["pre"];
        $busqueda_fecha=$_POST["fec"];
        $busqueda_importado=$_POST["imp"];
        $busqueda_porig=$_POST["p_orig"];
         try {
            $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root','vill$');// INSTACIAMOS LA CLASE PDO llamando al constructur de la clase con el operador NEW pdo  PDO es la clase
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//hacen que en caso de un error se lance una excepción || https://www.php.net/manual/es/pdo.setattribute.php
           $sql="insert into PRODUCTOS(codigoArticulo, seccion, nombreArticulo, precio, fecha, importado, paisdeorigen)
                                values(:c_art, :secc, :n_art, :pre, :fec, :imp, :p_orig)"; //saber exactamente como se llaman las tablas.
            $resultado=$base->prepare($sql);// base llamando a su metodo PREPARE QUE RECIBE POR PARAMETRO EL OBJETO SQL    
            $resultado->execute(array(":c_art"=>$busqueda_cart, ":secc"=>$busqueda_seccion, ":n_art"=>$busqueda_nart, ":pre"=>$busqueda_precio, 
                                        ":fec"=>$busqueda_fecha, ":imp"=>$busqueda_importado, ":p_orig"=>$busqueda_porig));//=> operador de turno
            /*USAMOS EL EJEMPLO 3 DE PHP DE EXECUTE */
              /*  echo '<h3 class="text-center mt-3 mb-3">ARTICULOS ENCONTRADOS: </h3>';
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
                                    while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) { //¿como hacer para mostrar el registro insertado?
                                        echo "<tr>";
                                                        foreach($registro as $valor){ /*esto funciona como los punteros */
                                                        /*echo"<td>" . $valor . "</td>";
                                                        }
                                        echo"</tr>";
                                    }
                        echo"</tbody>
                        </table>
                    </div>
                </div>
            </div>";*/
                                    
            echo'<h5 class="text-center mb-4 mt-4">REGISTRO GUARDADO</h5>'; /*mt-4 es el magin top para q no este pegado a la parte superior */

            echo'<div class="container">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered border-danger table-hover">
                                <thead>
                                    <tr>
                                        <th>Código Articulo</th>
                                        <th>Seccion</th>
                                        <th>Nombre Articulo</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                        <th>Importado</th>
                                        <th>Pais de Origen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>' . $busqueda_cart . '</td>
                                        <td>' . $busqueda_seccion . '</td>
                                        <td>' . $busqueda_nart . '</td>
                                        <td>' . $busqueda_precio . '</td>
                                        <td>' . $busqueda_fecha . '</td>
                                        <td>' . $busqueda_importado . '</td>
                                        <td>' . $busqueda_porig . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>'; 
            
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