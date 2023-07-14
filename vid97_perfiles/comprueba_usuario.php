<?php
    class ClassComprueba
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();
            //$this->productos=array();
        }
        /**creamos lo metodos */
        public function verifica_usuario($usuario, $contraseña){
            $sql="select usuario, contraseña from perfilusuarios where usuario= :usu and contraseña= :contra"; // antes del and no se pone ningula COMA. 
            $sentencia=$this->db->prepare($sql);
            $sentencia->bindParam(":usu",$usuario);
            $sentencia->bindParam(":contra",$contraseña);
            $sentencia->execute();
            return $sentencia;
        
            /* ESTE IF NO SIRVE TODO LO VE VERDADERO
            if($sentencia==false){			
                echo "Error al ejecutar la consulta";  
            }else{     
                echo "CONSULTA EJECUTADA" ;
            } */
/*
            while ($fila=$sentencia->fetch()) { //LLEMANOS EL ARRAY FILA POR FILA
                $this->resultado[]=$fila;
            }
            return $this->resultado; 
*/
            
        }

        public function mostrar_usuario($usuario, $contraseña){
            $sql="select * from perfilusuarios where usuario= :usu and contraseña= :contra"; // antes del and no se pone ningula COMA. 
            $sentencia=$this->db->prepare($sql);
            $sentencia->bindParam(":usu",$usuario);
            $sentencia->bindParam(":contra",$contraseña);
            $sentencia->execute();
            
            
            /**ESTO DEVUELVE UN CONJUNTO DE RESULTADOS */
             /*    while ($fila=$resultado->fetch(PDO::FETCH_OBJ)) { //LLEMANOS EL ARRAY FILA POR FILA
                $this->productos[]=$fila;
            }
            
            return $this->productos; 
            */

            /** yo hice esto el parecer solo devuelve una sola fila son sus respectivas columnas  */
            $resulta=$sentencia->fetch(); // solo fech por q en la conexion se defiono que fuea de tipo objeto
            return $resulta;
        }
    }

    $usuario= $_POST["campousuario"];
    $contraseña= $_POST["campocontraseña"];
    
    $login=new ClassComprueba();
    $consulta=$login->verifica_usuario($usuario, $contraseña);

    if($consulta->fetchColumn()> 0){//fetchColumn()>0   rowcount() == 0
        echo "Si Existe ";
        $matriz= $login->mostrar_usuario($usuario, $contraseña);
        echo "hola: " . $matriz->usuario . "<br/>";// $matris as $ valor al final solo ponias $valor->id de el vid 86 
        echo "tu perfil es: " . $matriz->perfil . "<br/>";
        if($matriz->perfil=="administrador"){
			   
            include("menu_administrador.html");   
           
           
       }else{
           
           
            include("menu_usuario.html");   
           
       }
        
    }else{
        echo "No existe ";// esto ya no se muestra
        header("location:login_perfiles.html");
    } 

    /**ayudo mucho EL VIDEO 69 */
    // Como recorrer consulta PDO en PHP 
    // https://es.stackoverflow.com/questions/68150/como-recorrer-consulta-pdo-en-php 
    // Sentencias preparadas y procedimientos almacenados 
    // https://www.php.net/manual/es/pdo.prepared-statements.php
       // quees rowCount https://www.php.net/manual/es/pdostatement.rowcount.php 
    // que es fetchColumn
    // https://www.php.net/manual/es/pdostatement.fetchcolumn.php 
    // como devolver valores php
    // https://www.php.net/manual/es/functions.returning-values.php
    //¿Cómo verificar la existencia de un usuario en MySQL con PDO-PHP?
    //https://es.stackoverflow.com/questions/408755/c%C3%B3mo-verificar-la-existencia-de-un-usuario-en-mysql-con-pdo-php
?>
