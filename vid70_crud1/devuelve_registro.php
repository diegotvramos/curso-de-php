<?php
    require ("conexion.php");
    class devuelveRegistro extends Conexion
    {
        public function __construct(){
            parent:: __construct(); 
        }
        //Creamos los metodos
        public function get_datos_usuario(){
            $sql="select * from datos_usuarios";
            $sentencia= $this->conexion_db->prepare($sql);
            $sentencia->execute(array());
            $resultado=$sentencia->fetchAll(PDO::FETCH_OBJ);//en la variable de 'resultado' tendriamos un array de objetos.
            return $resultado;
        }
    }

/*
    $sentencia=$this->conexion_db->query("select * from datos_usuarios");
    $resultado=$sentencia->fetchAll(PDO:: FETCH_OBJ);
    $resultado=$this->conexion_db->query("select * from datos_usuarios")->fetchAll(PDO::FETCH_OBJ);
*/

/*
    PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que se corresponden 
    a los nombres de las columnas devueltas en el conjunto de resultados. 
*/


/*COMO OBJETOS VAN A TENER SUS PROPIEDADES: id, nombre, apellido, direccion  */
    
?>