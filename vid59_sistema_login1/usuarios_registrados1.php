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
    <!--incluir el codigo php entes de cualquier contenido WEB antes de que se muestre toda la informacion de abajo-->
    <?php
        session_start();    //crea o reanuda la session.
        if (!isset($_SESSION["session_username"])) {
            header("location:login.php");
        }
    ?>

    <h1>BIENVENIDOS USUARIOS</h1>
    <?php
        echo"HOLA: " . $_SESSION["session_username"] . "<br>";
    ?>
    <P>esto es solo informacion para usuarios registrados</P>
    
    <div class="btn-group">
        <a href="usuarios_registrados2.php" class="btn btn-primary">Link</a>
        <a href="usuarios_registrados3.php" class="btn btn-primary">Link</a>
        <a href="usuarios_registrados4.php" class="btn btn-primary">Link</a> 
        <a href="cierre.php" class="btn btn-danger">cerar sesion</a>
    </div>
</body>
</html>

<!--vid 60-->
<!--en una misma pestaña se puede abrir pero en otro navegador TE ENVIA DE VUELTA AL LOGIN.
if(!empty($_SESSION["usuario"])){

    vid 61 
    se necesita una bara de navegacion mas conocida como NAVBAR esta en COMPONENTES de bootstrap

    tuve que usar para los links simplemente: https://getbootstrap.com/docs/5.2/components/button-group/ 
    GRUPO DE BOTONES por que el nvar esta hecho con responsive y le falta codigo. en bootstrap.

    lo mas basico de NAVBAR.
    https://getbootstrap.com/docs/5.2/components/navbar/ 
    Para cambiar color: navbar-dark bg-primary






        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                </ul>           
            </div>
        </div>
    </nav>
-->
