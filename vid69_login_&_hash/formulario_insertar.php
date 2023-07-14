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
        <form action="insertar_usuario.php" method="post"> <!--se escribe method--> <!---->
            <div class="text-center text-primary mb-4 col">
                <h5 class="fw-bold">CREAR USUARIO</h5>
            </div>
            <div class="row mb-3 justify-content-center">  
                <label for="username" class="col-sm-2 col-form-label">NOMBRE DE USUARIO</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <label for="password" class="col-sm-2 col-form-label">CONTRASEÑA</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="form-check col-auto"> 
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="recordar">
                    <label class="form-check-label" for="flexCheckDefault">
                    Recordarme
                    </label>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" name="enviar">CREAR!</button>
                </div>   
            </div>   
        </form>
            
        </div>
</body>
</html>