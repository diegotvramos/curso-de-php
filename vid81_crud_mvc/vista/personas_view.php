<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-3 col-8">
        <div class="text-center mb-3">
            <h1 class="fw-bold">Modelo Vista Controlador</h1>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-end mb-2">
            <button class="btn btn-primary me-md-2" type="button">Botón1</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Incertar nuevo registro
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

                        <form action="modelo/crear.php" method="post"> <!--se escribe method--> <!---->
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



        <div class=""> <!--para que se centre la tabla con el div bore: row d-flex justify-content-center-->
            <table class="table table-light table-hover table-bordered border-dark">
                <caption>List of users</caption>

                <thead class="table-dark">
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matriz as $registro):?>
                        <tr><!--IMPRIMIMOS EL ARRAY -->
                            <th><?php echo $registro->id?></th>
                            <td><?php echo $registro->nombre?></td>
                            <td><?php echo $registro->apellido?></td>  
                            <td><?php echo $registro->direccion?></td>  
                            <!--<td> echo $registro["precio"]paisdeorigen</td> abrir y cerar php para imprimir con FETCH_ASSOC(esta en productos_model.php) se hace de esta forma para recorrer y mostrar.-->
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#modaleditar<?php echo$registro->id?>"><!--con esto creamos para cada fila su respectivo modal-->
                                        Editar
                                    </button>
                                    <!--MODAL PARA EL BOTON EDITAR-->
                                    <div class="modal fade" id="modaleditar<?php echo$registro->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 fw-bold text-primary" id="staticBackdropLabel">EDITOR DE REGISTRO.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="modelo/actualizar.php" method="post"> <!--se escribe method--> <!---->
                                                        <input type="hidden" name="idname" value="<?php echo$registro->id?>"> <!-- NO queremos que nos imprima el id, es un cuadro de texto que esta oculto el valo existe pero el usuario no lo puede ver ni editar.-->
                                                        <input type="hidden" name="npag" value="<?php echo $num_pagina?>"><!--GET no recuparaba nada cuando estaba en la pagina 1 -->
                                                        <div class="row mb-3 justify-content-center">  
                                                            <label for="username" class="col-sm-2 col-form-label">NOMBRE</label>
                                                            <div class="col-sm-8 col-lg-6">
                                                                <input type="text" class="form-control" name="nombre" value="<?php echo$registro->nombre?>"><!--el objeto valor su nombre lo identifica pr que en el id del modal ya se guarda todo el objeto valor con su id-->
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 justify-content-center">
                                                            <label for="text" class="col-sm-2 col-form-label">APELLIDO</label>
                                                            <div class="col-sm-8 col-lg-6">
                                                                <input type="text" class="form-control" name="apellido" value="<?php echo$registro->apellido?>"><!--es un cuadro de texto-->
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 justify-content-center">
                                                            <label for="text" class="col-sm-2 col-form-label">DIRECCION</label>
                                                            <div class="col-sm-8 col-lg-6">
                                                                <input type="text" class="form-control" name="direccion"value="<?php echo$registro->direccion?>">
                                                            </div>
                                                        </div>
                                                        <?php echo $registro->id?>

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
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo$registro->id?>">
                                        Borrar
                                    </button>
                                    <!--modal para eliminar registro-->
                                    <div class="modal fade" id="deleteModal<?php echo$registro->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">    
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">REALMENTE DESEAS ELIMINAR A...? </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $registro->id?>
                                                    <?php echo $registro->nombre?><!--lo que se guarda es todo el OBJETO resistro (id, nombre, apellido, direccion) des que q lo posamos al id del modal-->
                                                    <?php echo $registro->apellido?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><!--vid 72 curd II-->
                                                    <a href="modelo/borrar.php?idname=<?php echo $registro->id?>& npag=<?php echo $num_pagina?>"><!--propiedad id del objeto registro || es simplemente un enlace el boton como puede ser una imagen, un texto el cual le estamos pasando por la url el id POR SI ACASO ES UN GET.-->
                                                        <button type="button" class="btn btn-danger">Confirmar</button><!--https://desarrolloweb.com/articulos/317.php como enviar 2 variables por la url-->
                                                    </a>          
                                                </div>
                                            </div>                  
                                        </div>
                                    
                                    </div>
                                </td>
                            </tr>                                                                                  
                        </div>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div>
            <nav arial-label="Page navegation example">
                <ul class="pagination"><!--ul:list no ordenada contiene uno o mas elementos LI-->
                    <li class="page-item disabled">
                        <a class="page-link" href="">anterior</a>
                    </li><!--li: especifican los items de la lista-->
                    <?php for ($i=1; $i <=$total_paginas ; $i++) :?> <!--la bara de estado sale cuando paso el cursor sobre los datos, se observa qe le estoy pasando a la pagina por parametro atraves de la url el numero en el que estoy -->
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
         https://getbootstrap.esdocu.com/docs/5.1/components/buttons/#botones-de-bloque 
-->