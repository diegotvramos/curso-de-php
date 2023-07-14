<?php
        class ClassPaginacion
        {
            private $db; //variable encapsulada | private = modificadores de acceso.
            //para hacer una consulta primero necesito conectar a la base de datos 
            public function __construct(){ // en cuanto instanciemos esta clase productos modelo ya estaremos llamando a su constructor 
                require_once("modelo/conexion.php"); //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo. 
                //this: especificamos la variable donde quiero almacenar esa conexion. (usamos this por que nos encotramos dentro de la propia clase)
                $this->db=ClassConectar::conexion();//usamos la clase conectar. usamos operador de los 2 puntos y llamamos al metodo estatico Conexion()para que conecte con la base de datos.
            }
            //Metodos
            public function get_calcula_comenzar($pagina_num,$corte){
                $comenzar_desde=($pagina_num-1)*$corte; //comienza por defecto desde 0
                return $comenzar_desde;
            }
            public function get_total_paginas($corte){
                $consulta=$this->db->query("select * from datos_usuarios");
                $num_filas=$consulta->rowCount();//devuelve numero de filas afectadas por la ultima sentencia.
                $total_paginas=ceil($num_filas/$corte);
                return $total_paginas;

                $this->db->closeCursor();
            }    
        }
?>