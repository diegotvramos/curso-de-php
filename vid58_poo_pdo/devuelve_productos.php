<?php
    require("conexion.php");
    class devuelveProductos extends conexion // 'extends' erencia  con esto consigo utilizar dentro de esta clase aquellas variables y metodos que aya definido en el archivo 'conexion.php' y q sean accesibles ya q las variables y metodos no tienen modificador de acceso private.
    {//heredamos el codigo de conexion
        public function __construct(){
            parent:: __construct(); //ejecutamos implicitamente el constructor del archivo 'conexion' osea el constructor padre
        }
        //creamos un metodo
        public function get_productos($dato){
            $sql="select * from productos where paisdeorigen='" . $dato . "'";
            $sentencia = $this->conexion_db->prepare($sql);// CONSULTA PREPARADA.
            $sentencia->execute(array());
            $resultado=$sentencia;//->fetchAll(PDO::FETCH_ASSOC); // https://www.php.net/manual/en/pdostatement.fetch.php  https://www.php.net/manual/es/pdostatement.fetchall.php
            //$sentencia->closeCursor(); //https://www.php.net/manual/es/pdostatement.closecursor.php  || CON ESTO CERRAMOS LA TABLA VIRTUAL.
            return $resultado;
            //$this->conexion_db=null; //vaciamos la memoria. para cerar conexiones y eliminar de la memoria loque hubiera abierto
        }
    }
    /* PDOStatement::fetchAll() devuelve un array que contiene todas las filas restantes del conjunto de resultados.
     El array representa cada fila como un array con valores de las columnas, o como un objeto con propiedades 
     correspondientes a cada nombre de columna. Es devuelto un array vacío si hay cero resultados que obtener, 
     o false en caso de fallo.

Usar este método para obtener conjuntos de resultados grandes dará como resultado una fuerte demanda del 
sistema y, posiblemente, de los recursos de red. En lugar de recuperar todos los datos y manipularlos en PHP,
 considérese usar el servidor de bases de datos para manipular los conjuntos de resultados. Por ejemplo, 
 se pueden usar las cláusulas WHERE y ORDER BY en sentencias SQL para restringir el resultado antes de 
 recuperarlos y procesarlos con PHP. 
 https://www.php.net/manual/es/pdostatement.fetchall.php  */




 /*COMENTARIO
 Rubén Pole
Rubén Pole
hace 5 años
Hola Juan! Tengo una pequeña duda. En el minuto 17:12, añades la instrucción:
                                                              $this->conexión_db=null;
para liberar los recursos, pero se encuentra detrás de la instrucción:
                                                               return $resultado;
Se llegará a ejecutar si va después del return?
Y realmente es necesario liberar recursos, no se liberan automáticamente cuando no se encuentren más referencias al objeto en cuestión?
He encontrado opiniones de todo tipo en foros y demás, y al final siempre me queda la duda... 
 */
?>