<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <form action="insertar.php" method="post" enctype="multipart/form-data"> <!--se escribe method--> <!---->
            <div class="text-center text-primary mb-4 col">
                <h5 class="fw-bold">FORMULARIO</h5>
            </div>
            <div class="row mb-3 justify-content-center">  
                <label for="campotitulo" class="col-sm-2 col-form-label">TITULO</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" name="campotitulo" required> <!--Si no me interesan los mensajes de comentarios de validación personalizados Todo bien, puedes usar los valores predeterminados del navegador Se aplica a los elementos <input>, <select>y <textarea>-->
                </div>
            </div>
            <div class="row mb-3 justify-content-center">  
                <label for="campocomentario" class="col-sm-2 col-form-label">COMENTARIO</label>                
                <div class="col-sm-8 col-lg-6">
                    <textarea class="form-control" id="campocomentario" name="campocomentario" rows="3" required></textarea>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <label for="formFile" class="col-sm-2 form-label">SELECCIONE IMAGEN</label><!--nombre de la etiqueta-->
                    <div class="col-sm-8 col-lg-6">
                        <input class="form-control" type="file" id="formFile" name="campoimagen"><!--FILE es un boton de examinar || accept="image/*" SOLO ME PERMITE VER IMAGENES PARA SUBIR PERO SI DESDE EL INSPECTOR LO MODIFICAMOS PODEMOS subir arivos extraños. por eso es necesario validar desde el php-->
                    </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" name="enviar">ENVIAR!</button>
                </div>   
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-auto">
                    <a href="mostrar_blog.php" class="btn btn-primary s">mostrar blog</a>
                </div>   
            </div>
            
        </form>
            
        </div>
</body>
</html>

<!-- 
    el boton submit solo funciona si esta dentro de el formulario caso contrario no envia la informacion.
-->