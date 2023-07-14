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
         try {
            $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root','vill$');// INSTACIAMOS LA CLASE PDO llamando al constructur de la clase con el operador NEW pdo  PDO es la clase
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//hacen que en caso de un error se lance una excepción || https://www.php.net/manual/es/pdo.setattribute.php
            $sql="delete from PRODUCTOS where codigoArticulo= :c_art";
            $resultado=$base->prepare($sql);// base llamando a su metodo PREPARE QUE RECIBE POR PARAMETRO EL OBJETO SQL    
            $resultado->execute(array(":c_art"=>$busqueda_cart));//=> operador de turno
            /*USAMOS EL EJEMPLO 3 DE PHP DE EXECUTE */
                                    
            echo'<h5 class="text-center mb-4 mt-4">' . $busqueda_cart . '...REGISTRO ELIMINADO</h5>'; /*mt-4 es el magin top para q no este pegado a la parte superior */
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