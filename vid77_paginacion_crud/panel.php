<?php
    require "devuelve_registro.php";
    $cortes=3;// numero de registros por pagina.El corte o seccionamiento se hará cada 3 registros

    if (isset($_GET["pagina"])) {//funcion isset(): determina si una variable ha sido declarada y su valor no es NULO ¿PULSO?   
        if ($_GET["pagina"]==1) {
            header ("Location:panel.php");
        }else {
            $num_pagina=$_GET["pagina"];
        }
    }else {
        $num_pagina=1;//pagina por defecto 
    }

    $devuelve_reg=new ClassDevuelve();// instancia creada. || 1) estamos conectando con la base de datos 2) estamos buscando en la base de datos 'devuelve________()'<===== es una clase 
    
    $comienzo=$devuelve_reg->get_calcula_comenzar($num_pagina,$cortes); 
    echo"NUMERO DE PAGINA ". $num_pagina ."<br>";

    $total=$devuelve_reg->get_total_paginas($cortes);

    $array_registros= $devuelve_reg->get_registros_usuarios($comienzo,$cortes);  //llamamos a el metodo o funcion (get_productos) el cual nos devuelve un arrray  || llamamos a la funcion 'get productos'
        
    

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

        <div class=" row text-center text-primary mb-5 col">
                    <h5 class="fw-bold">PANEL DE ADMINISTRACION</h5>
        </div>

        <div>



        <div class="row d-flex justify-content-center">
                <div class="col-8"></div>
                <div class="col-2">
                    <div >
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            INCERTAR NUEVO REGISTRO
                        </button>
                    </div>
                    

                    <!-- Modal para crear registro -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">CREAR NUEVO REGISTRO</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="crear.php" method="post"> <!--se escribe method--> <!---->
                                        <div class="row mb-3 justify-content-center">  
                                            <label for="username" class="col-sm-2 col-form-label">NOMBRE</label>
                                            <div class="col-sm-8 col-lg-6">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label for="text" class="col-sm-2 col-form-label">APELLIDO</label>
                                            <div class="col-sm-8 col-lg-6">
                                                <input type="text" class="form-control" name="apellido">
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label for="text" class="col-sm-2 col-form-label">DIRECCION</label>
                                            <div class="col-sm-8 col-lg-6">
                                                <input type="text" class="form-control" name="direccion">
                                            </div>
                                        </div>


                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-success" name="enviar">CREAR!</button>
                                            </div>   
                                        </div>   
                                    </form>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


        
           
        <div class="row d-flex justify-content-center">
            <div class="col-10 mt-3"><!--P=4 paddign lo tube q borrar por q no cuadraba con el-->
                <table class="table table-hover table-bordered border-primary table-responsive">
                    
                    <thead class="table-group-divider">                
                        <tr class="border-primary table-primary "> <!--color de borde azul|| color de celda azul-->
                            <th scope="col">id</th><!--celdas del encabezado-->
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Direccion </th>
                            <th scope="col">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($array_registros as $valor):?><!--'array_productos' es el array donde tengo almacenado los objetos con toda las personas q hay almacenadas en mi base de datos 
                                //es 'valor ' solo es nobre de la variable || por cada valor q hay en el array repiteme el codigo  que hay a dentro.-->
                            
                
                                <tr>
                                    <th scope="row"><?php echo $valor->id?></th>
                                    <td><?php echo $valor->nombre?></td>
                                    <td><?php echo $valor->apellido?></td>
                                    <td><?php echo $valor->direccion?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block"><!--https://getbootstrap.com/docs/5.0/components/buttons/#block-buttons-->
                                            <!--ESTO ES PARA EL BOTON DE EDITAR-->
                                            
                                            
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditar<?php echo$valor->id?>">
                                                    editar
                                                </button>
                                            <!--borre los divs q tenia el boton de editar-->
                                            <!-- Modal para editar los registros -->
                                            <div class="modal fade" id="modaleditar<?php echo$valor->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">EDITOR DE REGISTRO.</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="editar.php" method="post"> <!--se escribe method--> <!---->
                                                                <input type="hidden" name="idname" value="<?php echo$valor->id?>"> <!-- NO queremos que nos imprima el id, es un cuadro de texto que esta oculto el valo existe pero el usuario no lo puede ver ni editar.-->
                                                                <input type="hidden" name="npag" value="<?php echo $num_pagina?>"><!--GET no recuparaba nada cuando estaba en la pagina 1 -->
                                                                <div class="row mb-3 justify-content-center">  
                                                                    <label for="username" class="col-sm-2 col-form-label">NOMBRE</label>
                                                                    <div class="col-sm-8 col-lg-6">
                                                                        <input type="text" class="form-control" name="nombre" value="<?php echo$valor->nombre?>"><!--el objeto valor su nombre lo identifica pr que en el id del modal ya se guarda todo el objeto valor con su id-->
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 justify-content-center">
                                                                    <label for="text" class="col-sm-2 col-form-label">APELLIDO</label>
                                                                    <div class="col-sm-8 col-lg-6">
                                                                        <input type="text" class="form-control" name="apellido" value="<?php echo$valor->apellido?>"><!--es un cuadro de texto-->
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3 justify-content-center">
                                                                    <label for="text" class="col-sm-2 col-form-label">DIRECCION</label>
                                                                    <div class="col-sm-8 col-lg-6">
                                                                        <input type="text" class="form-control" name="direccion"value="<?php echo$valor->direccion?>">
                                                                    </div>
                                                                </div>
                                                                <?php echo$valor->id?>

                                                                <div class="row justify-content-center">
                                                                    <div class="col-auto">
                                                                        <button type="submit" class="btn btn-success" name="enviar">EDITAR!</button> <!--envia el formulario por q es tipo: submit ya sabes que cuendo pulsamos un boton de tipo submit la pagina en donde estamos vuelve hacer una recarga desde el principio hasta el fin-->
                                                                    </div>   
                                                                </div>   
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--ESTO ES PARA EL BOTON  DE ELIMINAR.-->
                                            <button type="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModa<?php echo$valor->id?>">
                                                Eliminar 
                                            </button>                                                    
                                                <!-- Modal para eliminar registro -->
                                                <div class="modal fade" id="exampleModa<?php echo$valor->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">REALMENTE DESEAS ELIMINAR A...? </h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo $valor->id?>
                                                                    <?php echo $valor->nombre?><!--lo que se guarda es todo el OBJETO valor (id, nombre, apellido, direccion) des que q lo posamos al id del modal-->
                                                                    <?php echo $valor->apellido?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><!--vid 72 curd II-->
                                                                    <a href="borrar.php?idname=<?php echo $valor->id?>"><!--propiedad id del objeto valor || es simplemente un enlace el boton como puede ser una imagen, un texto el cual le estamos pasando por la url el id POR SI ACASO ES UN GET.-->
                                                                        <button type="button" class="btn btn-danger">Confirmar</button>
                                                                    </a>          
                                                                </div>
                                                            </div>
                                                    </div>                  
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
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
                                            
-->