<?php
    class ClassCrearPerfil
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();//instanciamos y accedemos al metodo conexion()
           //$this->db=new ClassConectar();
        }
        /**creamos los metodos */

        public function metodocrear($usuario, $cotraseña, $perfil){
            $sql="insert into perfilusuarios(usuario, contraseña, perfil)values(:usu, :contra, :perfil)";
            $sentencia=$this->db->prepare($sql);
            $sentencia->bindParam(':usu',$usuario);
            $sentencia->bindParam(':contra',$cotraseña);
            $sentencia->bindParam(':perfil',$perfil);
            $sentencia->execute();  // https://www.php.net/manual/es/pdostatement.bindparam.php
            if($sentencia==false){
			
                echo "Error al ejecutar la consulta";
                
            }else{
                       
                echo "Agregado nuevo perfil";
            }    
        }
    }
    /**recuperamos lo que se envio desde el formulario */
    $usu=$_POST["campousuario"];
    $con=$_POST["campocontraseña"];
    $perfil=$_POST["campoperfil"];
    
    /**creamos la instancia de la clase */
    $crear= new ClassCrearPerfil();
    $crear->metodocrear($usu, $con, $perfil);
?>