<?php

    include_once("../modelo/objeto_blog.php"); //subimos un nivel en la gerarquia de carpetas y entramos dentro del modelo(carpeta)
    include_once("../modelo/manejo_objetos.php");

    /**conexion y manejo de errores  https://www.php.net/manual/es/pdo.connections.php  https://www.hostinger.es/tutoriales/conectar-php-mysql*/
    try {
        $miconexion= new PDO('mysql:host=localhost;dbname=dbblog', 'root', 'vill$');
        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

         if ($_FILES['campoimagen']['error']) {

            switch ($_FILES['campoimagen']['error']) {
                case '1': // https://www.php.net/manual/es/ini.core.php#ini.upload-max-filesize EXEDE LOS 2MB PHP.INI
                    echo "El tamaño del archivo excede lo permitido por el servidor ";
                    break; //sale de case
                case '2': //Antes de comenzar, permítanme enfatizar que el tamaño del archivo debe verificarse en el lado del servidor . Si no se marca en el lado del servidor, los usuarios malintencionados pueden anular los límites del lado del cliente y cargar archivos de gran tamaño en su servidor. NO CONFIAR EN LOS USUARIOS.
                    echo "el tamaño del archivo excede los 2 mb en el formulario";
                    break;
                case '3': // El fichero fue sólo parcialmente subido.  se corta el internet, se cae el servidor etc
                    echo "el envio del archivo se interrumpio";
                    break;
                case '4' : // no hay fichero 
                    echo "no se subio ningun fichero o archivo";        
                default:
                    # code...
                    break;
            }
            }else {
                echo "Entrada subida correctamente </br>"; // da igual hacer mencion a la constante  UPLOAD_ERR_OK que hacer mencion al valor en este caso: 0
                if (isset($_FILES['campoimagen']['name'])&&($_FILES['campoimagen']['error']==UPLOAD_ERR_OK)) {// si tenemos un archivo con su nombre si el error ha sido 0 //es decir si no ha habido ningun tipo de error.
                    $carpeta_destino='../imagenes/';
        
                    echo $carpeta_destino . "------------"; 
                    move_uploaded_file($_FILES['campoimagen']['tmp_name'], $carpeta_destino . $_FILES['campoimagen']['name']); // $_FILES es un array asociativo que guarda diversa informacion una de ellas es el directorio temporal
                    echo "EL ARCHIVO " . $_FILES['campoimagen']['name'] . "SE HA COPIADO EN EL DIRECTORIO DE IMAGENES"; 
                }else {
                    echo "El archivo no se ha podido copiar al directorio de imagenes: carpetaimagenes";
                }
        }      
            /**creamos una instancia un bojeto perteneciente a la clase manejo_objetos.php; el constructor de la clase manejo_objetos 
             * nos pide que pasemos por parametro la conexion a la db par que ese archivo se pueda conectar  */
            $manejo_objetos=new ClassManejoObjetos($miconexion);
            /**ahora debemos crear un objeto de tipo blog
             * el constructor de ClassObjetoBlog no lo hemos creado, eso quiere decir que se utiliza
             * el constructor por defecto lo mismo que constructor sin parametros ninguno
             * ahora con esa instancia $blog ya podemos acceder a todos los metodos pertenecientes
             * a la classeobjetoblog para ir estableciendo propiedades tos los SET
             */
            $blog= new ClassObjetoBlog();
            /*
            $blog->settitulo(htmlentities(addslashes($_POST["campotitulo"]), ENT_QUOTES));
            $blog->setfecha(Date("y-m-d h:i:s"));
            $blog->setcomentario(htmlentities(addslashes($_POST["campocomentario"]), ENT_QUOTES));
            $blog->setimagen($_FILES["campoimagen"]["name"]);
            */

            date_default_timezone_set('America/La_Paz'); 
            $blog->settitulo($_POST['campotitulo']);
            $blog->setfecha(Date('y-m-d h:i:s'));
            $blog->setcomentario($_POST['campocomentario']);
            $blog->setimagen($_FILES['campoimagen']['name']);

            echo $blog->settitulo($_POST['campotitulo']) . "eso muestra un set insertado";

             echo $blog->gettitulo();
            $manejo_objetos->inserta_contenido($blog);

            echo "entrada de blog agregada con exito!**************  <br/>";

            

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br/>";
        /**die () función imprime un mensaje y sale del script actual. */
        echo "linea del error: " . $e->getLine();
    }

   /** Por favor, observe que el uso de addslashes() para el escape (escapado )
    * de parámetros de bases de datos puede ser la causa de 
    * problemas de seguridad en la mayoría de las bases de datos.  
    * https://www.php.net/manual/es/function.addslashes.php 
    * https://www.php.net/manual/es/function.htmlentities.php
    * CONCLUCION, NO ES BUENO EVITAR INYECCION SQL EN EL FORMULARIO O evitar otro tipo de archivos que no sean imagens SE DEBE USAR 
    * UNA API ESPECIFICA DE ESCAPADO
    * DE Para escapar parámetros de bases de datos, deberían usarse
    * funciones de escape específicas de cada SGBD por razones de seguridad 
    * (p.ej. mysqli_real_escape_string() para MySQL
    */
    /*
      
Adrian Córdova
Adrian Córdova
hace 1 año
Me he dado cuenta que la función htmlentities genera problemas con caracteres 
especiales y no se leen o se guardan correctamente en la base de datos.
 Yo mejor creé una consulta preparada en el método que guarda el objeto 
 blog en la base de datos utilizando marcadores de parámetros. Muchas gracias
  por este magnífico ejercicio del blog me está gustando, saludos desde México 
  profesor. 

  Adrian Córdova
Adrian Córdova
hace 1 año (editado)
Woow !!!! excelente ejercicio de blog me gustó mucho maestro Juan :) y
 dejó ver más claro el funcionamiento de POO en un proyecto más real. Como 
 observación, el error generado por los "include" era porque en el archivo
  de transacciones y Manejo_Objetos se está importando a la vez el de Objeto_Blog, 
  es decir, cuando se pulsa el botón de enviar se carga la página de transacciones
   el cual importa los archivos Manejo_Objetos y Objeto_Blog, pero el de 
   Manejo_Objetos importa también el de Objeto_Blog, y por tanto es como si 
   en la página de transacciones se importaran 2 veces el archivo Objeto_Blog 
   y por tanto se intenta definir 2 veces la clase de Objeto_Blog. También faltó 
   agregar un mayor control en la carga de la imagen, yo en mi caso en el archivo 
   de transacciones lo que hice primero antes que nada fue declarar una variable 
   $nombre_imagen = null, dando por hecho en un principio que no se cargó imagen, 
   y conforme contemplaba los posibles errores en la carga de la imagen cambiaba 
   el valor de la variable al nombre de la imagen con $_FILES en los casos de que
    no se cumplan tales errores para que al final al crear un objeto de tipo blog
     establecer en su propiedad "Imagen" o bien el valor null o bien el nombre de
     la imagen (segúna la variable $nombre_imagen pasada como argumento). En este 
     último caso hay que tener en cuenta que el campo Imagen de la base de datos
      debe admitir valores nulos (haber activado la casilla de permitir valores
       nulos en phpMyadmin al momento de haber creado la tabla).

Ah y otra cosa !!! el formulario se ejecutó directamente desde la carpeta vista, 
cuando lo ideal era desde la raíz del proyecto en un archivo index. Si alguien 
quiere hacer esto sólo se crea el archivo index.php desde la raíz e incluir con 
un include el archivo del formulario que se encuentra dentro de la carpeta vista, 
y se debe tomar en cuenta que se deben cambiar las rutas de todos los demás 
archivos, tales como los include y la ruta donde se almacenan las imágenes, etc., 
porque en este caso todo se ejecuta en el index, es como incluir en el index todo 
el código de todos los archivos porque todos ellos se unen entre sí con un include
 y se parte del index que está fuera de las carpetas de las capas del 
 proyecto (modelo, vista, controlador) .....y ya me hice bolas de tanto texto 
 pero bueno sólo fue una pequeña observación sobre este ejercicio ............... :) 
     */
    
?>