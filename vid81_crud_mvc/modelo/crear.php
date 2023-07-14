<?php
    class ClassCrear
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();//instanciamos y accedemos al metodo conexion()
        }
        //creamos los metodos
        public function get_crear($nombre, $apellido, $direccion){
            $sql="insert into datos_usuarios(nombre, apellido, direccion)values(:nom, :ape, :dir)";
            $resultado=$this->db->prepare($sql);
            $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));
        }
    }
    // primerio crea despues ejecuta.
    $nombre=$_POST["nombre"];//recupera lo que enviamos desde el formulario $_POST[] desde el cuadro de texto nombre.
    $apellido=$_POST["apellido"];
    $direccion=$_POST["direccion"];
    // cramos las instancias de la clase

    $crear= new ClassCrear();
    $crear->get_crear($nombre, $apellido, $direccion);
    header ("Location:../index.php"); //redirige a la pagina pricipal.
?>