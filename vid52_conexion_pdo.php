<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // en programacion orientada a objetos cuando ocurre un fallo se produce una exepcion=fallo 
        //un fallo en tiempo de ejecucion quiere decir q no se trata un fallo de sintaxis.
        //por lo tanto para las excepciones untilizamos el bloque de codigo TRI CATCH.
        try {//intenta ejecutar un codigo, si tienes exito perfecto 
            //nos pide 3 argumentos: 1 host y nombre de la base de datos 2 usuario de la base de datos, 3 la contraseña de la base de datos 
            $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root','vill');// INSTACIAMOS LA CLASE PDO llamando al constructur de la clase con el operador NEW pdo  PDO es la clase
            echo "CONEXCION OK";
        } catch (exception $e) {//en caso de que haya un errer capturame catch y haz lo que to te diga con ese fallo.
            die('ERROR: ' . $e->GetMessage()); //lo concatemamos con una funcion que tiene el objeto 'E'
        }finally{ //tanto si hay extito o no en la conexion siempre se ejecutara 
            echo "bye";  // no se ejecuta al entrar en error en el TRY
            $base=null;//vacia la memoria
            
        }
        
        
/*comentario */
/*Erick Córdova Gavilanes
Erick Córdova Gavilanes
hace 1 año
Si una clase A hereda de una clase B, usando :: se puede acceder a un 
método de la clase padre desde una instancia de la clase hija, 
es decir: instancia_A::metodo_de_B(); 

$base = new PDO ('mysql:host=localhost; port=3308; dbname=curso_php', 'root', '',);*/

    ?>
</body>
</html>