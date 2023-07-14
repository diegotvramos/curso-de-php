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
        <form method="post" action="vid56_pagina_eliminar_pdo.php" class=""> <!--mt= margin top de 5--><!--el metodo get nos permite q la informacion viaje entre paginas-->
            <h3 class="text-center mb-4">ELIMINAR PRODUCTOS</h3>
            <div class="row mb-3">
                <lavel class="col-sm-2 col-form-label" for="c_art">Código Articulo</lavel>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="c_art" name="c_art"><!--El único atributo que suele utilizarse con la etiqueta <label> es for , que indica el identificador (atributo id ) del campo de formulario para el que esta etiqueta hace de título.-->
                </div> 
            </div>
            <button type="submit" class="btn btn-outline-primary">eliminar</button><!--buscar 'buttons' en bootstrap-->
            <button type="button" class="btn btn-outline-danger">cancelar</button>
        </form>
    </div>
</body>
</html>