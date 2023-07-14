<?php

class ClassArchivo
{
    private $db;
    public function __construct(){
        require_once("conexion.php");
        $this->db=ClassConectar::conexion();// instanciamos y accedemos al metodo conexion
    }
    public function get_poner_archivo($nombre_archivo, $tipo_archivo, $contenido){
        $contenido=$this->db->quote($contenido); //escapamos?
        $sql="insert into archivos(nombre, tipo, contenido)values(:Nombre, :Tipo, :Contenido)"; //vamos a usar marcadores para hacer una consulta preparada. para evitar inyeccion sql.
        //$sentencia=$this->db->query("insert into archivos(nombre, tipo, contenido)values('$nombre_archivo','$tipo_archivo','$contenido')"); // quereslo poner esto en una variable sql me da error.
        $sentencia=$this->db->prepare($sql);
        $sentencia->execute(array(":Nombre"=>$nombre_archivo, ":Tipo"=>$tipo_archivo, ":Contenido"=>$contenido));//asignamos los valores a los marcadore
        $fila_afectada=$sentencia->rowCount();
        return $fila_afectada;
    }
}


    //recibimos los datos del archivo 

    $nombre_archivo=$_FILES['elarchivo']['name'];// procede del imput type llamado namearchivo || SIPONES COMILLAS 2BLES EN VES DE SIMPLES, GENERA UN ERROR FATAL
    $tipo_archivo=$_FILES['elarchivo']['type']; //hacemos referencia a la propiedad TYPE
    $tamaño_archivo=$_FILES['elarchivo']['size'];//tamaño
    //$id=$_POST["idname"];
    //echo $tipo_imagen . "............";// con esto veo el tipo de archivo q subí.

    if ($tamaño_archivo<=3000000) { //con esto limitamos el tamaño del archivo 

        //indicamos el direcctorio o carpeta dentro de nuestro servidor donde queremos guardar la imagen 
        //ruta de la carpeta destino en servidor.
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/uploads/'; //cuando subimos una imagen, antes de llegar a su destino pasa por una carpeta temporal || gaurdamos la ruta destino
        //movemos la imagen del directorio temporal al direcctorio escojido
        // movemos de la carpeta temporal a la carpeta destino, para ello usamos la funcion
        move_uploaded_file($_FILES['elarchivo']['tmp_name'], $carpeta_destino.$nombre_archivo);// lo concatenamos con nombre_imagen (.) el punto se usa para concatenar

       // $archivo_img = $_FILES['namearchivo']['tmp_name']; 

        $archivo_objetivo=fopen($carpeta_destino . $nombre_archivo, 'rb' ); // (ruta, permiso)lo concatenamos con nombre archivo es como si fuerra /uploads/nombrearchivo.pdf example || abre un flujo de datos para poder apuntar a un archivo despues leerlo 
        $contenido=fread($archivo_objetivo, $tamaño_archivo); //(archivo objetivo, y el tamaño) leemos los bytes y el tamaño
        //$contenido=addslashes($contenido); //escapa de las barras invertidas q hay en la ruta
        

        //cramos la instancia de la clase

        $archivo = new ClassArchivo(); // una istancia ya es un objeto.
        $resultado=$archivo->get_poner_archivo($nombre_archivo, $tipo_archivo, $contenido); // aca iria el id y la ruta de la imagen.
        

        fclose($archivo_objetivo);

        if ($resultado>0) {
            echo "__________se ha insertado el registro con exito_______";
        }else {
            echo "_________no se ha insertado el registro__________";
        }
        


        echo $_FILES['elarchivo']['size'] . " tamaño en bytes_____"; //iprimimos el tamaño de la imagen 
        echo $_FILES['elarchivo']['tmp_name'] . "_______que muestara"; 
        echo $carpeta_destino . "______carpeta destino______";
        echo $nombre_archivo . "___ nombre archivo_____";

        echo $carpeta_destino.$nombre_archivo . "_____muestra concatenado______";

    }else {
        echo "el tamaño excede los 1 mB";
    }


    /*oscar ortiz ponce
oscar ortiz ponce
hace 1 año
Si usan PDO no es necesario utilizar el addslashes, de hecho te da error, para que lo tengan en cuenta  */

    //Hola Amigo, quiero recomendarte esta mini librería que te puede ayudar con la subida de los archivos... http://franciscocampos.github.io/getBd/ 
    
    // https://www.php.net/manual/es/function.fopen.php
    //https://www.php.net/manual/es/function.addslashes.php 
?>