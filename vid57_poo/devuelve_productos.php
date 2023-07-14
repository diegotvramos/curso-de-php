<?php
    require("conexion.php");
    class devuelveProductos extends conexion // 'extends' erencia  con esto consigo utilizar dentro de esta clase aquellas variables y metodos que aya definido en el archivo 'conexion.php' y q sean accesibles ya q las variables y metodos no tienen modificador de acceso private.
    {//heredamos el codigo de conexion
        public function __construct(){
            parent:: __construct(); //ejecutamos implicitamente el constructor del archivo 'conexion'
        }
        //creamos un metodo
        public function get_productos(){
            $resultado=$this->conexion_db->query('select * from productos');// 'this' es decir a la propia clase| podemos utilizar la variable 'cibexuib_db' gracias a la herencia.
            $productos=$resultado; //'mysqli-.assoc' quiero un arrat asociativo  || ->fetch_all(MYSQLI_ASSOC) comentado por q al imprimir me daba error. all?
            return $productos; // le decimos q nos devuelva ese array
        }
    }
    
?>