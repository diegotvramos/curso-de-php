<?php
    class ClassMostrar
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();// instanciamos y accedemos al metodo conexion 
            $this->productos=array(); // cramos un array.
        }

        public function get_mostrar_archivo($id){
            $sql="select * from archivos where id=:miId"; //vamos a usar marcadores para hacer una consulta preparada. para evitar inyeccion sql.
            $resultado= $this->db->prepare($sql);
            $resultado->execute(array(":miId"=>$id)); //asignamos los valores a los marcadores
        
            while ($fila=$resultado->fetch(PDO::FETCH_OBJ)) { //LLEMANOS EL ARRAY FILA POR FILA
                $this->productos[]=$fila;
                //$id=$fila["id"];    //el campo id se corresponde con lo q aya en el array fila concretamente en la columna Id
                //$contenido=$fila["contenido"];
                //$tipo=$fila["tipo"];
            }
            
            return $this->productos; // despues del return ya no lee mas el codigo 
            
            $this->db->closeCursor();
        }
    }
    //$contenido="";
    //$tipo="";

    $id=$_POST["idname"];
    $archivo = new ClassMostrar();// una instancia ya es un objeto
    $matriz=$archivo->get_mostrar_archivo($id);//el objeto IMAGEN  debo almacenarlo en otra variable (llamado Matriz).

    /*

    todo inicio en este comentario del video  "Monica Luna Lima
Monica Luna Lima
hace 4 años
el curso ya tiene algún tiempo y para los que no nos mostraba la imagen, 
la opción de addslashes hay que sustituirla por mysqli_real_scape_string().. saludos! "
oscar ortiz ponce
oscar ortiz ponce
hace 1 año
Si usan PDO no es necesario utilizar el addslashes, de hecho te da error, para que lo tengan en cuenta 

    busque:
     Escapa los caracteres especiales de una cadena para usarla en una sentencia SQL con PDO
     https://www.php.net/manual/es/pdo.quote.php
    
     
    busque:
    donde usar PDO::quote 
     https://stackoverflow-com.translate.goog/questions/9250434/pdo-quote-method?_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=es

    busque: 
    como subir imagenes con pdo y php a campo blob
     https://www.phpcentral.com/pregunta/503/guardar-imagenes-en-campo-blob-de-la-base-de-datos-mysql-con-php-programacion-orientada-a-objetos-y-pdo
        Hola Amigo, quiero recomendarte esta mini librería que te puede ayudar con la subida de los archivos... http://franciscocampos.github.io/getBd/
        busque:
        img src="data:image/jpeg; base64, <?php base64_decode( 
        Visualización de imágenes Base64 desde una base de datos a través de PHP
        https://stackoverflow.com/questions/16262098/displaying-a-base64-images-from-a-database-via-php
        https://es.stackoverflow.com/questions/567817/c%C3%B3mo-guardar-una-imagen-en-base-de-datos-mysql-como-blob-con-env%C3%ADo-por-ajax-hac 
        */

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8"> SET NAMES utf8-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div>
        
       <h1>hola </h1>
        
        <?php foreach ($matriz as $valor):?> <!--con esto ya no debemos estar concatenando html y php-->
            <tr>
                <td><?php echo "______EL ID ES:______" . $valor->id?></td>
                <td><?php echo "______EL TIPO ES:______" . $valor->tipo?></td>
                <td><?php echo "______EL NOMBRE ES:______" . $valor->nombre?></td>
                
                <?php
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($valor->contenido) . '" />';
                        
                ?>


                <div class="col-sm-3">
                    <img src="data:image/jpeg;base64, <?php base64_encode($valor->contenido)?>"  class="rounded-circle img-fluid" alt="archivo rescatado MAIN">
                </div>
                <div class="col-sm-3">
                    <img src="data:image/jpeg;base64, <?php base64_encode($valor->contenido)?>"  class="rounded-circle img-fluid" alt="archivo rescatado MAIN">
                </div>
                
                
            </tr>
        <?php endforeach?>
    </div>
</body>
</html>


