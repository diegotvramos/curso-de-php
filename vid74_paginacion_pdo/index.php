
<?php
    require "devuelve_productos.php";
    $cortes=3;// numero de registros por pagina.  

    if (isset($_GET["pagina"])) {//funcion isset(): determina si una variable ha sido declarada y su valor no es NULO ¿PULSO?   
        if ($_GET["pagina"]==1) {
            header ("Location:index.php");
        }else {
            $num_pagina=$_GET["pagina"];
        }
    }else {
        $num_pagina=1;//pagina por defecto
    }

    $devuelvep=new ClassProductos();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelveProductos()'<===== es una clase 
    
    $comienzo=$devuelvep->get_calcula_comenzar($num_pagina,$cortes); 
    echo"NUMERO DE PAGINA ". $num_pagina ."<br>";

    $array_productos= $devuelvep->get_devuelve_productos($comienzo,$cortes);  //llamamos a el metodo o funcion (get_productos) el cual nos devuelve un arrray  || llamamos a la funcion 'get productos'
        
    $total=$devuelvep->get_total_paginas($cortes);

    
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
    <div class="container mt-5">
        <div class="row text-center text-primary mb-5 col">
            <h5 class="fw-bold">LISTA DE PRODUCTOS</h5>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8 mt-3">
                <table class="table table-hover table-bordered border-primary table-responsive">
                    <thead class="table-group-divider">                
                        <tr class="border-primary table-primary "> <!--color de borde azul|| color de celda azul-->
                            <th scope="col">NOMRE ARTICULO</th><!--celdas del encabezado-->
                            <th scope="col">SECCION</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">PAIS DE ORIGEN </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($array_productos as $valor):?> <!--con esto ya no debemos estar concatenando html y php-->
                            <tr>
                                    <td><?php echo $valor->nombreArticulo?></td>
                                    <td><?php echo $valor->seccion?></td>
                                    <td><?php echo $valor->precio?></td>
                                    <td><?php echo $valor->paisdeorigen?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
           
               


        </div>
                                            <!--PAGINACION-->
        <div class="row d-flex justify-content-center">
            <div class="col-auto"><!--asi lo centre en el modal -->
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-secondary">1</button>
                        <button type="button" class="btn btn-outline-secondary">2</button>
                        <button type="button" class="btn btn-outline-secondary">3</button>
                        <button type="button" class="btn btn-outline-secondary">4</button>
                    </div>
                </div>               
            </div>
                 
        </div>

        <div>
            <nav arial-label="Page navegation example">
                <ul class="pagination justify-content-center"><!--ul:list no ordenada contiene uno o mas elementos LI-->
                    <li class="page-item disabled">
                        <a class="page-link" href="">anterior</a>
                    </li><!--li: especifican los items de la lista-->
                    <?php for ($i=1; $i <=$total ; $i++) :?> <!--la bara de estado sale cuando paso el cursor sobre los datos, se observa qe le estoy pasando a la pagina por parametro atraves de la url el numero en el que estoy -->
                        <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i?>"> <?php echo $i?> </a></li> <!--php dentro de php ECHO ES PARA VISUALIZAR EN LA BARA DE ESTADO del navegador-->
                    <?php endfor;?>        
                        <li class="page-item">
                        <a class="page-link" href="">siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>

<!--
    https://youtu.be/1V1kJKeYTpo 
    Cómo CENTRAR con BOOTSTRAP 5 Cualquier COSA
    busque: como centrar los botones debajo de la pagina bootstrap 5

    agrupacion de botones
    https://getbootstrap.com/docs/5.2/components/button-group/ 


    Busque: como hacer que funcione el boton de siguiente o tras en paginacion mysql y boostrap?
    Vid 76 como avanzar y retroceder en cada pagina
    https://www.netveloper.com/paginacion-de-registros-en-php-desde-mysql 

    https://youtu.be/1y_URsYEHps

    Cómo Paginar Datos con PHP
    https://code.tutsplus.com/es/tutorials/how-to-paginate-data-with-php--net-2928

    https://getbootstrap.com/docs/5.2/components/pagination/#alignment 

    AL ACTUALIZAR LA PAGINA NO SE VUELVE AL NUMERO 1 SE MANTIENE EN LA PAGINA QUE SE PULSO


    Carlos Talavera
Carlos Talavera
hace 4 años
Por si alguien quiere hacer el enlace de anterior y siguiente, les dejo el código que a mí se me ocurrió:

/*Fin del try catch*/

if($pagina != 1) {
    $anterior = $pagina - 1;

    echo "<a href='?pag=$anterior'>Anterior</a>" . "&nbsp;";
} //Yo utilicé el parámetro pag, si lo hicieron como Juan, cámbienlo a pagina

/*Ciclo for para el enlace a cada página*/

if($pagina != $total_paginas) {
    $siguiente = $pagina + 1;

    echo "<a href='?pag=$siguiente'>Siguiente</a>" . "&nbsp;";
} //Lo mismo del parámetro pag

Las condiciones que establecí ayudan a que si se está en la página 1 no aparezca el enlace a la página anterior (porque claro, no la hay), y que si se está en la última página no aparezca el enlace a la página siguiente (la misma razón mencionada anteriormente).

Gracias por tus tutoriales Juan :") 
-->