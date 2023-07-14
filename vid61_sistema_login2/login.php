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
                    session_start();
                    $_SESSION["session_username"]=$_POST["username"];    //almacenar dentro de la variable super global $_SESSION el NOMBRE del usuario 
                    //header("location:usuarios_registrados1.php");
                      //header("location:login.php");
                }else {
                    //header("location:login.php");
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
        if (!isset($_SESSION["session_username"])) { //con el signo de exclamacio lo que hacemos es negar todo!!
            include("formulario.html");  // con esto carga el formulario
        }else {
            echo "USUARIO: " . $_SESSION["session_username"];// cuando el usuario inice session el formulario desaparece.
            echo'<div>
                    <a href="cierre.php" class="btn btn-danger">cerrar sesion</a>
                </div>';
                //creo que no es buena idea poner un link para cerrar la ssecion seria mejor un boton?
        }
    ?>
    <div class="container mt-5 text-center text-warning mb-4 col">
        <h5 class="fw-bold">CONTENIDO DE LA WEB</h5>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3">
                <img src="img/cajas1.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-sm-3">
                <img src="img/cajas2.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-sm-3">
                <img src="img/cajas3.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-sm-3">
                <img src="img/cajas4.png" class="img-fluid img-thumbnail" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>

<!--    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <img src="img/cajas1.png" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/cajas2.png" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/cajas3.png" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/cajas4.png" class="img-fluid" alt="">
            </div>
        </div>



        EL SM HACE QUE CUANDO EL NAVEGADOR SE QUEDE A MENOS TAMAÑO LAS IMAGNES Y EL FORMULARIO SE ADECUAN ACIA ABAJO.
    </div>

        ¿QUE ES EL IFRAME...?
-->