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

    $pass_cifrado=password_hash($pas, PASSWORD_DEFAULT, array("cost"=>12));// PIDE 2 parametros la informacion que queremos cifrar/modo de incriptacion(conseguimos la sal q va generar)

    $productoss5=new insertaUsuario();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelveProductos()'<===== es una clase 
    //$array_productos= 
    $productoss5->get_registrar($usu,$pass_cifrado); //con esto enviamos los parametros al metodo 
    
?>