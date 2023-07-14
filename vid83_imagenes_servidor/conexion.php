<?php
    require("config.php");
    class ClassConectar 
    {
        //cramos un metodo estatico (al ser estatico solo necesitare utilizar el nombre de la clase para llamar al metodo)
        //un metodo estatico es un metodo q pertenese a la clase no hay nesesidad de crear ninguna instancia.
        public static function conexion(){
            try {
                $conexion_db= new PDO('mysql:host=localhost;dbname=pruebas',DB_USUARIO,DB_CONTRA);
                $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//establecemos los atributos
                $conexion_db->exec("SET CHARACTER SET UTF8");
            } catch (Exception $e) {
                die ("error: ". $e->getMessage());
                echo"linea del error ". $e->getLine();
            }
            return $conexion_db; //que nos devuelva la conexion /*TODA FUNCION DEBE RETORNAR ALGO O IMPRIMIRLA AHI MISMO.  Uncaught Error: Call to a member function query() on null  */
        }
    }
    
?>