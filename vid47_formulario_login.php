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
    <form method="get" action="vid48_pagina_datos.php" class="container mt-5">
    <h3 class="text-center mb-4">ACCESO DE USUARIO</h3>
        <div class="row mb-3">
            <label for="usuario" class="col-sm-2 col-form-label">USUARIO</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="usuario" name="usu">
            </div>
        </div>
        <div class="row mb-3">
        <label for="Password3" class="col-sm-2 col-form-label">PASSWORD</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="Password3" name="con">
            </div>
         </div>

        <button type="submit" class="btn btn-primary" value="login" name='enviando'>ENVIAR</button>
    </form>
</body>
</html>