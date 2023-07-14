<?php
    // en este archivo de coneccion necesito los datos de configuracion,
    require("config.php"); //accedemos a la informacion que hay dentro de pdoconfig.php
    //creamos una clase que nos va a permitir conectarnos a la base de datos
    //recuerden que el nombre puede ser a gusto, no tiene por que tener el mismo nombre.
    class Conexion      
    {
        protected $conexion_db;
        public function __construct(){
            try {
                $this->conexion_db=new PDO('mysql:host=localhost;dbname=pruebas',DB_USUARIO,DB_CONTRA);
                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //VID56 reporteErrores/lanza excepciones
                //$his->exec("SET CHARACTER SET UTF8");
                return $this->conexion_db;
            } catch (exeption $e) {
                die('Error'. $e->getMessage());
                echo"la linea de error es: !!!!!  " . $e->getMessage();
            }
        }
    }
    
?>