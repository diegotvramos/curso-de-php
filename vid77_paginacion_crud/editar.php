<?php
    require("conexion.php");
    class ClassEditar extends Conexion
    {
        public function __construct(){
            parent:: __construct();
        }
        //creamos los metodos

        public function get_editar($id,$nom,$ape,$dir){

            $sql=("update datos_usuarios set nombre=:miNom, apellido=:miApe, direccion=:miDir where id=:miId");// ¿por q usamos marcadores?vamos a usar una consulta preparada para evitar la inyeccion SQL.
            $resultado=$this->conexion_db->prepare($sql);
            $resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, ":miApe"=>$ape, ":miDir"=>$dir));//el parametro :miId corresponde al 'id' || asignamos cada variable con el parametro q debe utilizar en la consulta sql|| asignamos los valores a los marcadores
            
        }

        public function get_redirigir($p){
            if ($p==1) {
                header("Location:panel.php");
            }
            header("Location:panel.php?pagina=$p"); //esto lo hicimos con la intencion de mantner la pagina en la q estamos al actualizr el registro.
            //redirigimos desde este archivo al panel

           // echo "$p";
        }
    }

    $id=$_POST["idname"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $direccion=$_POST["direccion"];
    $npag=$_POST["npag"];//me di cuenta que el formulario no envia el numero de pagina entonces lo envie en hun hiden desde el formulario
    
    //creamos instacia de la clase
    $modificar= new ClassEditar();
    $modificar->get_editar($id, $nombre, $apellido, $direccion);//usamos el metodo get_editar
    $modificar->get_redirigir($npag);
           
    
?>