<?php
    require ("conexion.php");
    class ClassDevuelve extends Conexion
    {
        public function __construct(){
            parent:: __construct();  
        }
        //Creamos los metodos
        public function get_calcula_comenzar($pagina_num,$corte){
            $comenzar_desde=($pagina_num-1)*$corte; //comienza por defecto desde 0
            return $comenzar_desde;
        }
        public function get_total_paginas($corte){
            $sql="select * from datos_usuarios";
            $sentencia=$this->conexion_db->prepare($sql); // preparamos la sentencia.
            $sentencia->execute(array());
            $num_filas=$sentencia->rowCount();//devuelve numero de filas afectadas por la ultima sentencia.
            $total_paginas=ceil($num_filas/$corte); //usamos la funcion CEIL redondea el resultado 7.33 lo redondea a 8
            return $total_paginas;
            
            $sentencia->closeCursor(); //despues de debolver cerrar el cursor para no cunsumir recursos.
        }
        public function get_registros_usuarios($inicio,$corte){         
            $sql="select * from datos_usuarios limit $inicio,$corte"; // con esto hace una pequeña consulta con limites 
            $sentencia=$this->conexion_db->prepare($sql); // preparamos la sentencia.
            $sentencia->execute(array());
            $resultado=$sentencia->fetchAll(PDO::FETCH_OBJ);//en la variable de 'resultado' tendriamos un array de objetos.[no es recomendable usar fechALL]
            return $resultado;
            $resultado->closeCursor(); //despues de debolver cerrar el cursor para no cunsumir recursos.
        }

    }
/*COMO OBJETOS VAN A TENER SUS PROPIEDADES: id, nombre, apellido, direccion  */
    
?>