<?php
    require("conexion.php");
    class ClassCrear extends Conexion
    {
        public function __construct(){
            parent:: __construct();
        }

        //creamos los metodos.

        public function get_crear($nombre, $apellido, $direccion){
            $sql="insert into datos_usuarios(nombre, apellido, direccion)values(:nom, :ape, :dir)";
            $resultado=$this->conexion_db->prepare($sql);
            $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));
        }
    }
    //primero crea despues ejecuta.
    $nombre=$_POST["nombre"]; //guarda lo que enviamos desde el formulario $_POST desde el cuadro de texto nombre.
    $apellido=$_POST["apellido"];
    $direccion=$_POST["direccion"];
    //creamos instancia de la clase
    $crear= new ClassCrear();
    $crear->get_crear($nombre, $apellido, $direccion);
    header("Location:panel.php"); // redirige a la pagina panel

    /*la pregunta es: esta mi base de datos abierta? y como cerrar desde el cursor? */
?>