<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>
    <!--formulario horizontal-->

    <div class="container mt-4">
        <form method="post" action="vid56_pagina_insertar_pdo.php" class=""> <!--mt= margin top de 5--><!--el metodo get nos permite q la informacion viaje entre paginas-->
            <h3 class="text-center mb-4">INSERTAR PRODUCTOS</h3>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="c_art">Código Articulo</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="c_art" name="c_art"><!--El único atributo que suele utilizarse con la etiqueta <label> es for , que indica el identificador (atributo id ) del campo de formulario para el que esta etiqueta hace de título.-->
                </div> 
            </div>

            <div class="row mb-3"> <!--margin boton da un espacio para q no esten apegadoss-->
                <label for="secc" class="col-sm-2 col-form-label">Seccion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="secc" name="secc"><!--tambien hay el 'name' Cual usar?-->
                </div>
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="n_art">Nombre Articulo</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="n_art" name="n_art">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="pre">Precio</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pre" name="pre">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="fec">Fecha</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fec" name="fec">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="imp">Importado</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="imp" name="imp">
                </div> 
            </div>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="p_orig">Pais de Origen</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="p_orig" name="p_orig">
                </div> 
            </div>




            <button type="submit" class="btn btn-outline-primary">insertar</button><!--buscar 'buttons' en bootstrap-->
            <button type="button" class="btn btn-outline-danger">cancelar</button>
        </form>
    </div>
</body>
</html>