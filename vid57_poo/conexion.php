<?php
    // en este archivo de coneccion necesito los datos de configuracion,
    require("config.php"); //contamos con la informacion que hay en config .php
    class Conexion
    {
        protected $conexion_db; 
        public function __construct(){// el constructor ya no lleva nombre
            $this->conexion_db= new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);//hacemos referencia a conexion_db

            if ($this->conexion_db->connect_errno) {
                echo 'FALLO AL CONECTAR MYSQL: ' . $this->conexion_db->connect_error;
                return;
            }
            $this->conexion_db->set_charset(DB_CHARSET);//set charset es un metodo utilizamos el metodo
            
        }
    }
    
?>