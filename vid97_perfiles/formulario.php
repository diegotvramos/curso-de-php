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
        <form action="insertar_perfiles.php" method="post" enctype="multipart/form-data"> <!--se escribe method--> <!---->
            <div class="text-center text-primary mb-4 col">
                <h5 class="fw-bold">REGISTRA USUARIO</h5>
            </div>
            <div class="row mb-3 justify-content-center">  
                <label for="campousuario" class="col-sm-2 col-form-label">USUARIO</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="text" class="form-control" name="campousuario" required> <!--Si no me interesan los mensajes de comentarios de validación personalizados Todo bien, puedes usar los valores predeterminados del navegador Se aplica a los elementos <input>, <select>y <textarea>-->
                </div>
            </div>

            <div class="row mb-3 justify-content-center">  
                <label for="campocontraseña" class="col-sm-2 col-form-label">CONTRASEÑA</label>
                <div class="col-sm-8 col-lg-6">
                    <input type="password" class="form-control" name="campocontraseña" required> <!--Si no me interesan los mensajes de comentarios de validación personalizados Todo bien, puedes usar los valores predeterminados del navegador Se aplica a los elementos <input>, <select>y <textarea>-->
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <label for="campoperfil" class="col-sm-2 col-form-label">PERFIL</label>
                <div class="col-sm-8 col-lg-6">
                    <select class="form-select" aria-label="Default select example" name="campoperfil" id="perfil">
                        <option value="usuario"> Usuario</option>
                        <option value="administrador"> Administrador</option>
                    </select>
                </div>  
                
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" name="registrar">REGISTRAR!</button>
                </div>   
            </div>            
        </form>
            
        </div>
</body>
</html>