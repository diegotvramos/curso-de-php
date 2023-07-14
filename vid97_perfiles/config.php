<?php

    //almacenamos los datos en constantes.
    //PARAMETROS

    /*
    define('DB_HOST','localhost');
    define('DB_USUARIO','root'); 
    define('DB_CONTRA','vill$');
    define('DB_NOMBRE','pruebas');
    define('DB_CHARSET','UTF-8');
*/

    /** la mayoria lo hace así */
    $dsn = 'mysql:host=localhost;dbname=pruebas';   //NMBRE DE LA FUENTE DE DATOS 
    $username = 'root';
    $password = 'vill$';
    $options = array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    );
    //$dbname = 'databasename';
    // $host = 'localhost';
    //Si bien existe la extensión mysqli, esta sólo funciona con MySQL, 
    //mientras que PDO puede funcionar con otras bases de datos, por ello vamos 
    //a trabajar con PDO.
    /**Donde se tiene:

    $dsn: (data source name) cadena de texto que especifica la fuente de datos.
    $username: nombre de usuario de la base de datos.
    $password: clave de usuario de la base de datos.
    $options: array con parámetros adicionales para la conexión. */

    /** mysql:host=localhost;port=3306;dbname=dbname
     * https://www.hostinger.es/tutoriales/conectar-php-mysql
     * https://www.php.net/manual/es/pdo.connections.php 
     * https://www.kodetop.com/conectar-php-con-base-de-datos-utilizando-pdo/  (<-*******************BUENA)
     *
     * Recomendaciones

* Se recomienda el uso de PDO para la conexión a base datos, por que con una misma interfaz se puede conectar a diferentes bases de datos.

 * Se recomienda crear un archivo para conexión a base de datos, de forma tal que si cambian los parámetros de conexión entonces sólo es necesario editar el archivo de conexión.

* Es recomendable el uso de las opciones de configuración para establecer opciones globales en el acceso a base de datos.
     */
    
?>