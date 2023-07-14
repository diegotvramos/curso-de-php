<?php
    require("conexion.php");// cual es diferencia con include?
    class Classborrar extends Conexion
    {
        public function __construct(){
            parent:: __construct();
        }
        //creamos los metodos.
        public function get_borrar($identificador){
            $sentencia=$this->conexion_db->query("delete from datos_usuarios where id='$identificador'");// no es una consulta preparada. por eso usa el QUERY
            return $sentencia;// NO seria necesario devolver algo. ni la variable sentencia.
        }
    }

    $id=$_GET["idname"];
    $borrar= new Classborrar(); //creamos instancia
    $borrar->get_borrar($id); // usa el metodo get borrar.
    header("Location:panel.php");//redirigimos desde este archivo al panel


    /*
        al pulzar el boton eliminar el registro desaparece y al ojo humano no le da tiempo ver 
        como se va a otro archivo y vuelve
    */
    
?>