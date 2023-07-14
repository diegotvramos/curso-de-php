<?php
    class ClassActualizar
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();//instanciamos y accedemos al metodo Conexion    
        }
        public function get_editar($id, $nom, $ape, $dir){
            $sql=("update datos_usuarios set nombre=:miNom, apellido=:miApe, direccion=:miDir where id=:miId");//vamos a usar marcadores para hacer una consulta preparada. para evitar inyeccion sql.
            $resultado=$this->db->prepare($sql);
            $resultado->execute(array(":miId"=>$id, ":miNom"=>$nom, ":miApe"=>$ape, ":miDir"=>$dir));//el parametro :miId corresponde al 'id' || asignamos cada variable con el parametro q debe utilizar en la consulta sql|| asignamos los valores a los marcadores
        }

        public function get_redirigir($p){
            if ($p==1) {
                header ("Location:../index.php");
            }
            header("Location:../index.php?pagina=$p");//esto lo hicimos con la intencion de mantner la pagina en la q estamos al actualizr el registro.
            //redirigimos desde este archivo al index.php

           // echo "$p";
        }
    }

    $id=$_POST["idname"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $direccion=$_POST["direccion"];
    $npag=$_POST["npag"];//me di cuenta que el formulario no envia el numero de pagina entonces lo envie en hun hiden desde el formulario

    //cramos la instancia de la clase
    $modificar= new ClassActualizar();
    $modificar->get_editar($id, $nombre, $apellido, $direccion);
    $modificar->get_redirigir($npag);
    
?>