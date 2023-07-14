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
        $db_host="localhost";
        $db_nombre="pruebas";
        $db_usuario="root";
        $db_contra="vill$";

        $conexion= mysqli_connect($db_host,$db_usuario,$db_contra);//podemos precindir de el nobre de la base de datos.

        /*if (!$conexion) { //condicional de negacion
            die('!Error de conexión al la base de datos: ' . mysqli_connect_errno());
        }*/
         //pueden ocurrir todo tipo de erres,
        if (mysqli_connect_errno()) {
            echo "********fallo al conectar con la BBDD*****";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la DB.");

        //if (!$conexion) {
          //  die("Connection failed  ......: " . mysqli_connect_error());
        //}
        //consultas
        $consulta="select * from datospersonales";
        //ejecutamos la consulta
        $resultados=mysqli_query($conexion,$consulta);
        //esta consulta se almacena en un resulced es como un tabla virtual en memoria
        //para poder ver la informacion de esta tabla virtual usamos la funcion mysql_fetch_row
        //lo ve linea por linea y lo almacena en un array
         //mientras aya registros en el resulset. 
        while ($fila=mysqli_fetch_row($resultados)) { //accede al primer registro,sin true por que se evalual por defecto en verdadero == true
            /*echo $fila[0]. " ";
            echo $fila[1]. " ";
            echo $fila[2]. " ";
            echo $fila[3]. " ";
            echo "<br>";*/
            foreach($fila as $valor)
   			echo $valor . " ";
  			echo "<br>";

        }

        mysqli_close($conexion);// es posible establecer con varias bases de datos diferentes.
        
    ?>
</body>
</html>