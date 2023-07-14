<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php

    $autenticado=false; //es una variable boleana.

        if (isset($_POST["enviar"])) {// con estro preguntamos si se pulzo el boton de enviar  
            try {
                // EL CODIGO SE EJECUTA DE ARIBA HACIA ABAJO ENTONCES SIN EL IF NOS DARIA ERROR
                $base=new PDO("mysql:host=localhost; dbname=pruebas", 'root', 'vill$');  //datos de conexion
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //propiedades de la conexion 'el objeto BASE llama a la funcion SETTATRIBUTE'
                $sql="select * from usuario_pass where usuario= :user and password= :password";    //preparamos sentencia SQL.
                $resultado=$base->prepare($sql);    //cramos una consulta preparada con marcadore.
                $login=htmlentities(addslashes($_POST["username"]));   //rescatamos el login y el password q el usuario introdujjo|| en addslashes rescatamos lo q el usuario introdujo en el formulario
                $password=htmlentities(addslashes($_POST["password"]));
                $resultado->bindValue(":user", $login);        //identificamos cada marcador con su correspondiente valor para ello usamos la funcion BINDVALUE
                $resultado->bindValue(":password", $password);
                $resultado->execute(); //ejecutamos la instrucion SQL
                $numero_registro=$resultado->rowCount();    // para saber si un usuario esta dentro o no esta dentro de una base de datos 
                if ($numero_registro!=0) {
                    $autenticado=true; // es cuando el login es exitos
                        if (isset($_POST["recordar"])) { // comprueba si la casilla RECORDAR ha sido activada
                            setcookie("nombre_usuario",$_POST["username"],time()+100000);//creamos la cookie.<-------
                        }
                        //session_start();
                        
                }else {
                    echo '<div class="container mt-5 text-center text-danger mb-4 col">
                                <h6 class="fw-bold"> usuario y contraseñas incorectos </h6>
                          </div>';
                }
            } catch (Exception $e) {
                die ("ERROR: " . $e->getMessage()); 
            }
        }
    ?>

    <?php
        if ($autenticado==false) {
            if (!isset($_COOKIE["nombre_usuario"])) {//si no hasido creado INCLUYA...
                include("formulario.html");
            }
        }

        if (isset($_COOKIE["nombre_usuario"])) {
            echo "USUARIO: " . $_COOKIE["nombre_usuario"];
            echo'<div>
                            <a href="cierre.php" class="btn btn-danger">destruir cookie</a>
                        </div>'; // no puedee serrar la session por q la cookie se vuelve a cargar. entonces sera destrir la cookie 
        }elseif ($autenticado==true) {
            echo "USUARIO post : " . $_POST["username"];
                    echo'<div>
                            <a href="cierre.php" class="btn btn-danger">cerrar sesion</a>
                        </div>';
        }
    ?>


    <div class="container mt-5 text-center text-warning mb-4 col">
        <h5 class="fw-bold">CONTENIDO DE LA WEB</h5>
    </div>
    <div class="container">
        <p class="text-success"><em>ESTAS SON LAS CAJAS QUE SE FABRICAN EN NUESTRA EMPRESA.</em></p>
    </div>
    
    <div class="container mt-5">
        <div class="row">   
            <div class="col-sm-6 col-md-3">
                <figure class="figure">
                    <img src="img/cajas3.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Un título para la imagen de arriba.</figcaption>
                </figure>
            </div>
            <div class="col-sm-6 col-md-3">
                <figure class="figure">
                    <img src="img/cajas3.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Un título para la imagen de arriba.</figcaption>
                </figure>
            </div>
            <div class="col-sm-6 col-md-3">
                <figure class="figure">
                    <img src="img/cajas3.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Un título para la imagen de arriba.</figcaption>
                </figure>
            </div>
            <div class="col-sm-6 col-md-3">
                <figure class="figure">
                    <img src="img/cajas3.png" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Un título para la imagen de arriba.</figcaption>
                </figure>
            </div>
        </div>    
    </div>
    <?php
        if ($autenticado==true || isset($_COOKIE["nombre_usuario"])) { //o cualquiera de las instrucciones se cumpla
            include("zona_registrados.html");
        }
    ?>

</body>
</html>


<!-- 
    manejo de sessiones
    https://www.php.net/manual/es/book.session.php

    https://www.php.net/manual/es/ref.session.php

    con php self da mucho erroes ecepto el cerar session.
    *no puedo duplicar pestañas.
    *no al cerrar la ssecion, se puede volver a reanudar si forzamos al navegador a q lo haga.



    CONCLUCION. 
    TAL VEZ LA COOKIE SOLO GUARDE EL CONTENIDO Y NO HACI EL CODIGO PHP.




    
-->