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
    <h1 class="fs-5 fw-bold text-primary">BUSCA DEL ARCHIVO</h1>
</div>

    <form action="leer_archivo.php" method="post"> <!--usamos el metodo POST por q vmos a tratar un archivo-->
        
        <div class="row mb-3 justify-content-center">
            <label for="text" class="col-sm-2 col-form-label">ID DEL ARCHIVO</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" name="idname">
                </div>
        </div>
                            
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-success" name="enviar">buscar archivo</button>
            </div>   
        </div>

    </form>   
</body>
</html>

<!-- cuando subimos una imagen, despues subimos otra pero con el mismo nombre de la imagen anterior ya subida, en el directorio dentro 
de HTDOC uploadas se reemplaza con la nueva image, es un problema ya que una persona puede subir otra imagen pero con el mismo nombre.  SOLUCION?-->