<?php
    //require_once("config.php");
    class ClassConectar 
    {   
/*
        private $dsn = "mysql:host=localhost;dbname=pruebas";   //NMBRE DE LA FUENTE DE DATOS 
        private $host= 'localhost';
        private $dbname= 'pruebas';
        private $username = 'root';
        private $password = 'vill$';
        private $options = array(
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                        );*/

        //cramos un metodo estatico (al ser estatico solo necesitare utilizar el nombre de la clase para llamar al metodo)
        //un metodo estatico es un metodo q pertenese a la clase no hay nesesidad de crear ninguna instancia.
        public static function conexion(){
            //public function __construct(){
            //$dsn="mysql:host={$this->host};dbname={$this->dbname}";
            require_once("config.php");
             /*$dsn = "mysql:host=localhost;dbname=pruebas";   //NMBRE DE LA FUENTE DE DATOS 
             $host= 'localhost';
             $dbname= 'pruebas';
             $username = 'root';
             $password = 'vill$';
             $options = array(
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                            );*/
            try {
                $conexion_db= new PDO($dsn, $username, $password,$options);
                $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//establecemos los atributos ayuda a detectar errores
                echo "conexion exitosa****";
            } catch (PDOException $e) {
                echo "Error al conectar con la DB: " . $e->getMessage() . "<br/>";
                echo "linea del error " . $e->getLine();
                die ();
            }
            return $conexion_db; //que nos devuelva la conexion /*TODA FUNCION DEBE RETORNAR ALGO O IMPRIMIRLA AHI MISMO.  Uncaught Error: Call to a member function query() on null  */
        }
    }

/*
    class Classprueba
    {
        private $db;
        public function __construct(){
            $this->db = ClassConectar::conexion();
        }

        
    }
    $con= new Classprueba(); 
    
  */
  $conectar= new ClassConectar();  
   
  
    /** https://www.php.net/manual/es/pdo.connections.php
     *  https://www.kodetop.com/conectar-php-con-base-de-datos-utilizando-pdo/
     *  http://www.codigo-facil.com/es/poo-php-clases.php 
     * https://es.stackoverflow.com/questions/4636/c%C3%B3mo-hacer-la-conexi%C3%B3n-a-mysql-aplicando-poo 
     * https://es.quora.com/Para-qu%C3%A9-sirve-la-public-static-function 
     * https://www.youtube.com/watch?v=dnjoAZo8kA0 
     * https://blog.nubecolectiva.com/como-crear-una-conexion-inicial-a-mysql-con-pdo-php/ 
     * 
     */
?>