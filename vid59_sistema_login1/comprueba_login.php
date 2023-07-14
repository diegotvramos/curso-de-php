<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        try {
            $base=new PDO("mysql:host=localhost; dbname=pruebas", 'root', 'vill$');  //datos de conexion
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //propiedades de la conexion 'el objeto BASE llama a la funcion SETTATRIBUTE'
            $sql="select * from usuario_pass where usuario= :user and password= :password";    //preparamos sentencia SQL.
            $resultado=$base->prepare($sql);    //cramos una consulta preparada con marcadore.
            $login=htmlentities(addslashes($_POST["username"]));   //rescatamos el login y el password q el usuario introdujjo|| en addslashes rescatamos lo q el usuario introdujo en el formulario
            $password=htmlentities(addslashes($_POST["password"]));
            $resultado->bindValue(":user", $login);        //identificamos cada marcador con su correspondiente valor para ello usamos la funcion BINDVALUE
            $resultado->bindValue(":password", $password);
            $resultado->execute(); //ejecutamos la instrucion SQL
           // echo"usuario encontrado"; // usamos este mensaje para comprobar.
            $numero_registro=$resultado->rowCount();    // para saber si un usuario esta dentro o no esta dentro de una base de datos 
            if ($numero_registro!=0) {
                //echo"<h2>_________ADELANTE_______</h2>";
                //si el usuario se encuentra en la base de datos entonces me creas una session. para el usuario q se acaba de logear.
                session_start();
                $_SESSION["session_username"]=$_POST["username"];    //almacenar dentro de la variable super global $_SESSION el NOMBRE del usuario 
                header("location:usuarios_registrados1.php");
            }else {
                header("location:login.php");
            }
        } catch (Exception $e) {
            die ("ERROR: " . $e->getMessage()); 
        }
    ?>
</body>
</html>