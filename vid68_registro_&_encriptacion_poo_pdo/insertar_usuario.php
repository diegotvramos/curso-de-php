<?php
    //no conectamos a la base de datos
    require("conexion.php");
    /*qui vemos el primer ejemplo de herencia donde la clase inserta usuario utiliza
    aquelas variables y metodos definidas enel archivo conexion php y q estas sean 
    accesibles es decir dependiendo de los modificadores de acceso q tenga */

    class insertaUsuario extends conexion //nombre de la clase anterior= conexion.
    {
        public function __construct(){
            /*llamamos al constructor de la clase padre mediante el uso del parent lo que nos permite ejecutar
              el constructor de la clase conexion y el codigo extra que agregaremos en esta funcion q lo hereda */
            parent::__construct();
        }
        // metodo que se encarga de registrar a la base de datos los nuevos usuarios
         public function get_registrar($usuario,$password){
            /*podemos la variable conexion_db gracias a la herencia*/
            //creamos la consulta sql
            /*$inserta=$this->conexion_db->sql("insert into usuarios(usuarios, password) values
                                      (:usu, :contra)");*/
            $sql="insert into usuario_pass(usuario, password) values (:usu, :contra)";
            $resultado=$this->conexion_db->prepare($sql); //consulta preparada USO DE THIS ESTA EXPLICADO EN VIDEO 55

            $resultado->execute(array(":usu"=>$usuario,":contra"=>$password));
            echo"registro insertado correctamente";
            $registro=$resultado;
            return $registro;
            $resultado->closeCursor();
            
         }    
    }
    //DEL vid58
    $usu=$_POST["username"];
    $pas=$_POST["password"];

    $pass_cifrado=password_hash($pas, PASSWORD_DEFAULT);// PIDE 2 parametros la informacion que queremos cifrar/modo de incriptacion(conseguimos la sal q va generar)

    $productoss5=new insertaUsuario();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelveProductos()'<===== es una clase 
    //$array_productos= 
    $productoss5->get_registrar($usu,$pass_cifrado); //con esto enviamos los parametros al metodo 
    


    /*
        Ya que estamos heredeando de una clase padre sus variables usamos THIS para hacer referencia al objeto q 
        hemos instanciado

        La pseudovariable $this está disponible cuando un método es invocado dentro del contexto de 
        un objeto. $this es una referencia al objeto invocador. https://www.php.net/manual/es/language.oop5.basic.php

        
        y usamos el singo y fleca (->)para usar la variable del objeto 






        busque: como hacer una clase de conexion en php poo
        -> Conexión a una base de datos MySQL utilizando POO
        https://phpscript.cubava.cu/2020/06/19/conexion-a-una-base-de-datos-mysql-utilizando-poo/

        busque: conexion a la base de datos con pdo y poo php
        no tan comprensible
        https://www.jairogarciarincon.com/clase/bases-de-datos-en-php/utilizacion-de-bases-de-datos-mediante-pdo-php-data-objects
    
        BUSQUEDA: que es this en php poo
        BUSQUEDA: como leer la las variables q estan fuera de una clase en php

        busqueda: como modificar el varchar de un campo en mysql ||||||| el campo PASSWORD LO TENIA como varchar max20 min 60 lo puse varchar (100)
        https://styde.net/modificar-tablas-en-mysql-mariadb/
    */


?>