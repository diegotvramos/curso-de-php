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
        //almacenar los primeros 3 dias de la semana

        /*$semana[1]="lunes";//no tiene indices? php lo permite 
        $semana[2]="martes";
        $semana[3]="miercoles";*/
// segunda forma de crear un array, pero no hayni una mejor q la otra 
        /*$semana=array("lunes","martes","miercoles","jueves");

        echo $semana [3];*/

        $datos = array("nombre"=>"juan","apellido"=>"Gomez","edad"=>21); //en un array para asociar el nombre con su posicion unilizamos=>
        //si queremos imprimir en pantalla ya no podemos referirnos a la posicion 0,1,2 indice 0,2,3

        $datos="martin";
         echo $datos; //sobre escribe al anterior, evitar este tipo de problemas 'foco de problemas'
        //echo $datos["apellido "];

        /*en el futuro tendras una base de datos necesitaras reflejar datos que hay almacenadas en esa bd en la pgina web
        por lo cual aras una consulta y la base datos de debolvera una informacion, esa informacion q te devuelve la bd donde
        la almacenas para en un futuro reflejarla en la pagina web una alternativa es:almacenarlas en un array*/ 
    ?>
</body>
</html>