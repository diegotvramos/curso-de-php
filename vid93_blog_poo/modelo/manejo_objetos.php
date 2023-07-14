<?php
    /* creamos la clase que va hacer toda las operaciones */

    include_once("objeto_blog.php");
    class ClassManejoObjetos
    {
        /*en esta clase vamos a manipular los objetos en el archivo OBJETO_BLOG.PHP entonces incluimos el archivo objeto_blog 
            una ves incluida el archivo lo que se hace es establecer la conexion  con la base d datos 
        */

        private $conexion; 
        /*  voy hacer q esta clase "ClassManejo_Objetos" tenga un constructor que va ser el primer metodo que se ejecuta
            cuando instanciemos esta clase
        */

        public function __construct($conexion){
            /*vamos a llamar a un metodo dentro de esta clase  
            el nombre del parametro puede ser cualquiera*/
            $this->setConexion($conexion);
        }
        /*el metoo setConexion va recibir un argumento/parametro 
            el nombre del parametro puede ser cualquiera */
        public function setConexion(PDO $conexion){
            $this->conexion=$conexion; // BORRE EL SIGNO PESOS  $ DESPUES DE USAR $THIS. 
        } 
        /**AHORA SI CREAMOS LOS METODOS CORRESPONDIENTES PARA OBTENER LA INFORMACION ALMACENADA EN LA BASE DE DATOS 
         * creamos el metodo que se encarga de objetener las entradas de blog
        */
        public function getContenidoPorFecha(){ // hace una consulta
            //pretendo almacenar las entradas de blog en un array
            $matriz=array();
            $contador=0;
            $resultado=$this->conexion->query("select * from contenido ORDER BY fecha DESC ");

            while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) { // Diferencia entre fetch y fetchall en PHP? https://es.stackoverflow.com/questions/184341/diferencia-entre-fetch-y-fetchall-en-php 
                /**creamos una variable llamada BLOG que va ser una instancia del la classe(objeto) Class_Objeto_Blog */
                $blog= new ClassObjetoBlog(); // LOS NOMBRES DE OBJETO ME DIERON ERROR ESCRIBI MAL Y NO  ME DI CUENTA.
                /** y ahora debemos utilizar toda las propiedades y metodos del objeto creado para crear una entrada de blog
                 * con cada registro que nos hadevuelto el recordset(la consulta) que esta almacenada en la variable $fila
                 * y despues ir almacenando cada objeto blog en el array $MATRIZ.
                 */
                $blog->setid($fila["id"]); // introducimos id en el metodo setid
                $blog->settitulo($fila["titulo"]);
                $blog->setfecha($fila["fecha"]);
                $blog->setcomentario($fila["comentario"]);
                $blog->setimagen($fila["imagen"]);
                $matriz[$contador]=$blog; // he almacenado un objeto con toda sus propiedades, con todo sus metodos dentro del array
                $contador ++;  

                // en la 2da vuelta va crear un segundo objeto establesca las propidedades de ese segundo objeto 
            }
            return $matriz; 
        }

        /**creamos el metodo que inserta contenido en la base de datos */

        public function inserta_contenido(ClassObjetoBlog $blog){ /** con esa exprecion "ClassObjetoBlog $blog"  lo unico que hace es especificar de que tipo es esa variable no es de tipo texto ni entero es de tipo OBJETO. */
            echo "_____entro al metodo insertar";
            echo $blog->gettitulo();
            $sql="insert into contenido(titulo, fecha, comentario, imagen) values ('{$blog->gettitulo()}', '{$blog->getfecha()}', '{$blog->getcomentario()}', '{$blog->getimagen()}')"; // el id es autoincrementable no es nescesario ponerlo
            $this->conexion->exec($sql);
        }
    }
    /**roberto lavin
        roberto lavin
    hace 2 años
    la variable $contador no es necesaria, basta con dejar $matriz[]=$blog 
    y los indices se agregan automaticamente  
    
    M Ninety
M Ninety
hace 4 años
Profesar, por qué utilizas 'inlude' en vez de 'require' en el archivo de Manejo_objetos.php?
Victoria Ramirez Borges
Victoria Ramirez Borges
hace 4 años
Porque es humano. Pero sí, lo más correcto en este caso es utilizar un require o require_once, estás en lo correcto. 
 Felipe Restrepo
Felipe Restrepo
hace 2 años
¿¿Se podría concatenar los VALUES de la función INSERT INTO de la siguiente manera??
('${$blog->getTitulo()}', '${$blog->getFecha()}', '${$blog->getComentario()}', '${$blog->getImagen()}');
1
Diego Villacorta
Diego Villacorta
hace 1 segundo  
*/
?>