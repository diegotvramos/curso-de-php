<?php
    require("conexion.php");

    class compruebaUsuario extends conexion
    {
        public function __construct(){
            parent::__construct();
        }

        public function get_verificar($sesion){
            $sql="select * from usuario_pass where usuario= :login_marcador";//solo un marcador sonsulta si hay por lo menos uno o varios usuarios cone esos nombres
            $resultado=$this->conexion_db->prepare($sql);//consulta preparada
            $resultado->execute(array(":login_marcador"=>$sesion));//en el marador se debe introducir lo q el usuario introdujo.
            $registro=$resultado;
            return $registro;
            $resultado->closeCursor();
            
        }
    }
    
    $login=htmlentities(addslashes($_POST["username"]));
    $password=htmlentities(addslashes($_POST["password"]));

    $contador = 0;

    $compru=new compruebaUsuario();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelveProductos()'<===== es una clase 
    $array_comprueba= $compru->get_verificar($login); //con esto enviamos los parametros al metodo || devuelve unna lista(recorset) con todo los nombres iguales.



    while ($registro=$array_comprueba->fetch(PDO::FETCH_ASSOC)) {  /*para q funcionara borre el mysql_assoc de el archivo(devuelve_productos) */  //pdo fetch array español BUSQUEDA....  https://www.php.net/manual/es/pdostatement.fetch.php
       /* echo "<tr>";
                        foreach($registro as $valor){ //esto funciona como los punteros
                        echo"<td>" . $valor . "</td>";
                        diego 123
                        diego 123
                        diego 123
                        
        echo"</tr>";*/
        if (password_verify($password, $registro['password'])) { //devuelve true si las 2 son iguales y false si no son iguales.|| va entrar si ambos datos son iguales. pasword/ pasword cifrado
            $contador++;
            echo "conto el contador. ";//ESTA INSTRUCCION FUNCIONA SIEMPRE Y CUANDO LA CONTRASEÑA ESTE CIFRADA, CASO CONTRARIO NO LO ENCUENTRA.
        }
    }//el recorset ya termino.


    if ($contador>0) {
        echo "usuario registrado   || el password cifrado coicide el nombre de usuario debe ser unico. SI OSI NO DEBE REPETIRSE.";
    }else{
        echo "usuario no registrado:(  ";
    }






    /*primero se crea despues se usa. */

    //echo "Usuario: " . $registro['usuario'] . "contraseña: " . $registro['password']; //MUCHO CUIDADO CON PONER EN MAYUSCULA EL NOMBRE DE LAS TABLAS.
?>