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

<div class="text-center mt-5 mb-5"><!--alineacion de texto https://getbootstrap.com/docs/5.2/utilities/text/#text-alignment-->
    <h1 class="fs-5 fw-bold text-primary">SELECCIONA UNA IMAGEN </h1>
</div>

    <form action="datosimagen.php" method="post" enctype="multipart/form-data"> <!--usamos el metodo POST por q vmos a tratar un archivo-->
        
                            <div class="row mb-3 justify-content-center">
                                <label for="text" class="col-sm-2 col-form-label">CODIGO DEL ARTICULO</label>
                                <div class="col-sm-8 col-lg-6">
                                    <input type="text" class="form-control" name="idname">
                                </div>
                            </div>
    
    
    
    <div class="row mb-3 justify-content-center">  
            <label for="username" class="col-sm-2 col-form-label">NOMBRE</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" name="nombre">
                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <!--<div class="mb-3 col-auto"> mi error fue no borrar la barra invertida en la etiqueta div y esto estaba de mas-->
                                    <label for="formFile" class="col-sm-2 form-label">selecciones una imagen</label><!--nombre de la etiqueta-->
                                    <div class="col-sm-8 col-lg-6">
                                        <input class="form-control" type="file" id="formFile" accept="image/*" name="nameimagen"><!--FILE es un boton de examinar || accept="image/*" SOLO ME PERMITE VER IMAGENES PARA SUBIR PERO SI DESDE EL INSPECTOR LO MODIFICAMOS PODEMOS subir arivos extraños. por eso es necesario validar desde el php-->
                                    </div>
                                <!--</div>-->
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success" name="enviar">enviar imagen</button>
                                </div>   
                            </div>

    </form>   
</body>
</html>