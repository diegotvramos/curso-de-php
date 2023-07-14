<?php
    require("datos_conexion.php");
    $miconexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    /*comprobamos conexion */
    if (!$miconexion) {
        die("la conexion a fallado: " . mysqli_connect_error());// la funcion DIE termina con el script
    }
    
    if ($_FILES['campoimagen']['error']) {
        switch ($_FILES['campoimagen']['error']) {
            case '1': // https://www.php.net/manual/es/ini.core.php#ini.upload-max-filesize EXEDE LOS 2MB PHP.INI
                echo "El tamaño del archivo excede lo permitido por el servidor ";
                break; //sale de case
            case '2': //Antes de comenzar, permítanme enfatizar que el tamaño del archivo debe verificarse en el lado del servidor . Si no se marca en el lado del servidor, los usuarios malintencionados pueden anular los límites del lado del cliente y cargar archivos de gran tamaño en su servidor. NO CONFIAR EN LOS USUARIOS.
                echo "el tamaño del archivo excede los 2 mb en el formulario";
                break;
            case '3': // El fichero fue sólo parcialmente subido.  se corta el internet, se cae el servidor etc
                echo "el envio del archivo se interrumpio";
                break;
            case '4' : // no hay fichero 
                echo "no se subio ningun fichero o archivo";        
            default:
                # code...
                break;
        }
    }else {
        echo "Entrada subida correctamente </br>"; // da igual hacer mencion a la constante  UPLOAD_ERR_OK que hacer mencion al valor en este caso: 0
        if (isset($_FILES['campoimagen']['name'])&&($_FILES['campoimagen']['error']==UPLOAD_ERR_OK)) {// si tenemos un archivo con su nombre si el error ha sido 0 //es decir si no ha habido ningun tipo de error.
            $carpeta_destino='carpetaimagenes/';

            echo $carpeta_destino . "------------"; 
            move_uploaded_file($_FILES['campoimagen']['tmp_name'], $carpeta_destino . $_FILES['campoimagen']['name']); // $_FILES es un array asociativo que guarda diversa informacion una de ellas es el directorio temporal
            echo "EL ARCHIVO " . $_FILES['campoimagen']['name'] . "SE HA COPIADO EN EL DIRECTORIO DE IMAGENES"; 
        }else {
            echo "El archivo no se ha podido copiar al directorio de imagenes: carpetaimagenes";
        }
    }

    date_default_timezone_set('America/La_Paz'); 
    $titulo=$_POST['campotitulo'];  //el formulario envia infomacion mediante el metodo post. 
    $fecha=date("y-m-d h:i:s"); // https://www.php.net/manual/es/function.date.php 
    $comentario=$_POST['campocomentario'];
    $imagen=$_FILES['campoimagen']['name'];





    $miconsulta="insert into contenido(titulo, fecha, comentario, imagen)values('$titulo','$fecha','$comentario','$imagen')";
    // ejecutamos la instruccion sql
    
    $resultado= mysqli_query($miconexion,$miconsulta); //utilizando nuestra conexion, ejecute( , )
    mysqli_close($miconexion); // Si no se especifica, las conexiones MySQL se cerrarán por sí solas una vez que finalice el script.
    echo "se ha agregado el comentario con exito <br/>";

/*
    https://www.hostinger.es/tutoriales/conectar-php-mysql conecciones


    https://stackoverflow-com.translate.goog/questions/6327965/html-upload-max-file-size-does-not-appear-to-work?_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=es

    vid 91
    No es necesario realizar la concatenacion de estas variables, 
    PHP admite interpolar las variables $sql = " Values( '$variable')"

    https://www.php.net/manual/es/mysqli.query.php 

    https://www.php.net/manual/es/function.date-default-timezone-set.php
    Listado de zonas horarias admitidas 
    https://www.php.net/manual/es/timezones.america.php 
    */
?>

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
<a href="formulario.php" class="btn btn-primary">ir al formulario</a> <!-- stretched-link=enlace estirado-->
<a href="mostrar_blog.php" class="btn btn-primary s">mostrar blog</a> <!-- LOS LINKS SE PUEDEN PONER EN IMAGENES, BOTONES ETC.  hay una funcion para arastrar y pegar donde quieras-->
</body>
</html>