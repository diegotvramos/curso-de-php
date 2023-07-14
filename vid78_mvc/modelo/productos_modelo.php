<?php
    class ClassProductos
    {
        private $db; //variable encapsulada
        private $productos;//modificadores de acceso (tema)
        //para hacer una consulta primero necesito conectar a la base de datos 
        public function __construct(){ // en cuanto instanciemos esta clase productos modelo ya estaremos llamando a su constructor 
            require_once("modelo/conexion.php"); //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo. 
            //this: especificamos la variable donde quiero almacenar esa conexion. (usamos this por que nos encotramos dentro de la propia clase)
            $this->db=ClassConectar::conexion();//usamos operador de los 2 puntos y llamamos al metodo estatico Conexion() en db tenemos la conexion
            $this->productos=array();
        }
        //metodo
        public function get_productos(){
            $consulta=$this->db->query("select * from productos");
            while ($fila=$consulta->fetch(PDO::FETCH_OBJ)) {
                $this->productos[]=$fila;
            }
            return $this->productos;
        }

    }
    

    /*
        en cuanto instanciemos la ClassProductos simplemente por instanciarla ya estaremos ejecutando el constructor
        con lo cual estaremos conectando automaticamente y creando un array.
        PDO::FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados. 

        Diferencia entre fetch y fetchall en PHP?
        https://es.stackoverflow.com/questions/184341/diferencia-entre-fetch-y-fetchall-en-php 

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $datos []= $fila;
        }


        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $fila["nombre"]." ".$fila["apellido"].PHP_EOL;
        }


    */
?>