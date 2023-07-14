<?php
    require("conexion.php");

    class ClassProductos extends Conexion 
    {
        public function __construct(){
            parent:: __construct();
        }
        //creamos los metodos
        public function get_calcula_comenzar($pagina_num,$corte){
            //el corte o seccionamiento se hará cada 3 registros
            $comenzar_desde=($pagina_num-1)*$corte; 
            return $comenzar_desde;
        }
        public function get_total_paginas($corte){
            $sql="select nombreArticulo from productos where seccion='DEPORTES'";
            $sentencia=$this->conexion_db->prepare($sql); // preparamos la sentencia.
            $sentencia->execute(array());
            $num_filas=$sentencia->rowCount();//devuelve numero de filas afectadas por la ultima sentencia.
            $total_paginas=ceil($num_filas/$corte); //usamos la funcion CEIL redondea el resultado 7.33 lo redondea a 8
            return $total_paginas;
            
            $sentencia->closeCursor(); //despues de debolver cerrar el cursor para no cunsumir recursos.
        }
        public function get_devuelve_productos($inicio,$corte){         
            $sql="select nombreArticulo, seccion, precio, paisdeorigen from productos where seccion='DEPORTES' limit $inicio,$corte";
            $sentencia=$this->conexion_db->prepare($sql); // preparamos la sentencia.
            $sentencia->execute(array());
            $resultado=$sentencia->fetchAll(PDO::FETCH_OBJ);//en la variable de 'resultado' tendriamos un array de objetos.
            return $resultado;
            $resultado->closeCursor(); //despues de debolver cerrar el cursor para no cunsumir recursos.
        }

        
    }
    



    /*
        PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que se corresponden 
        a los nombres de las columnas devueltas en el conjunto de resultados.
        COMO OBJETOS VAN A TENER SUS PROPIEDADES: id, nombre, apellido, direccion 


        tube problemas al obtener y mostrar un unico registro en la consulta count(*)
        https://es.stackoverflow.com/questions/134228/contar-y-mostrar-el-n%C3%BAmero-de-registros-que-cumplen-una-condici%C3%B3n 
        https://es.stackoverflow.com/questions/304856/c%C3%B3mo-poder-obtener-los-valores-del-count 
        busqueda: como contar numero de registros pdo
        https://www.php.net/manual/es/pdostatement.rowcount.php 

    */


?>