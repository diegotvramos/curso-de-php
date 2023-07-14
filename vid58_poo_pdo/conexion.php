<?php
    // en este archivo de coneccion necesito los datos de configuracion,
    require("config.php"); //contamos con la informacion que hay en config .php
    class Conexion
        {   
        protected   $conexion_db;
        public function __construct(){
        try{ 

            //$this->conexion_db = new PDO('mysql:host=localhost; dbname= pruebas','root','vill$');
            $this->conexion_db = new PDO('mysql:host=localhost;dbname=pruebas',DB_USUARIO,DB_CONTRA);//https://www.php.net/manual/es/pdo.connections.php
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion_db;
            } catch (exeption $e) {
            echo"la linea de error es: **********************" . $e->getMessage();
            }
            }
        }

        /* PALABRA RESERVADA THIS.
        Un constructor retorna una instancia de la clase en cuestion, es dicir es como si estuviera implicitamente un return 'this'
        -recuerda que this hace referencia al objeto actual.

        -$this en el contexto de metodos, es una referencia al objeto que esta invocando el metodo en cuestion.
        */
?>