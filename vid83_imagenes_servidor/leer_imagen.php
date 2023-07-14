<?php
    class ClassMostrar
    {
        private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion();// instanciamos y accedemos al metodo conexion 
            $this->productos=array(); // cramos un array.
        }

        public function get_mostrar_imagen($id){
            $sql="select foto, nombreArticulo from productos where codigoArticulo=:miId"; //vamos a usar marcadores para hacer una consulta preparada. para evitar inyeccion sql.
            $resultado= $this->db->prepare($sql);
            $resultado->execute(array(":miId"=>$id)); //asignamos los valores a los marcadores
        
            while ($fila=$resultado->fetch(PDO::FETCH_OBJ)) { //LLEMANOS EL ARRAY FILA POR FILA
                $this->productos[]=$fila;
            }
            
            return $this->productos; // despues del return ya no lee mas el codigo 
            
            $this->db->closeCursor();
        }
    }
    
    $id=$_POST["idname"];
    $imagen =new ClassMostrar();// una instancia ya es un objeto
    $matriz=$imagen->get_mostrar_imagen($id);//el objeto IMAGEN  debo almacenarlo en otra variable (llamado Matriz).

    /*
        https://www.php.net/manual/es/pdo.prepared-statements.php
        sentencias preparadas Manual php
        #consultas preparadas pdo y php

        ¿como hacer una consulta preparada pdo y marcadores php?
        https://www.mclibre.org/consultar/php/lecciones/php-db-pdo.html

        Intente leer la propiedad "foto" en la matriz en 
        C:\xampp\htdocs\php_pildoras\vid83_imagenes_servidor\leer_imagen.php en la línea 56

https://getbootstrap.com/docs/5.0/utilities/borders/#border-radius RADIO DE FOTOS  BORDE IMAGEN 

    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div>
        
       <h1>hola </h1>

        <?php foreach ($matriz as $valor):?> <!--con esto ya no debemos estar concatenando html y php-->
            <tr>
            <?php echo $valor->foto?>
                <div class="col-sm-3">
                    <img src="/uploads/<?php echo $valor->foto?>" class="rounded-circle img-fluid" alt="imagen del primer articulo"> / */
                </div>
                
                <td><?php echo $valor->nombreArticulo?></td>
            </tr>
        <?php endforeach?>
    </div>
</body>
</html>


