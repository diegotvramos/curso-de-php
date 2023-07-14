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
        echo"USUARIO: " . $_SESSION["session_username"] . "<br>";
    ?>
    <P>esto es solo informacion para usuarios registrados</P>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="usuarios_registrados1.php">Volver</a></li>
        </ul>
    </nav>
    <div class="btn-group">
        <a href="cierre.php" class="btn btn-danger">cerar sesion</a>
    </div>
</body>
</html>

<!--vid 60-->
<!--en una misma pestaña se puede abrir pero en otro navegador TE ENVIA DE VUELTA AL LOGIN.
if(!empty($_SESSION["usuario"])){

-->