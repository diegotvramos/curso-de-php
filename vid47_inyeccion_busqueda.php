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

    <!--por q me busca valores nullos en el buscador osea muestra todo-->
    <form action="vid47_pagina_busqueda.php" class="container" method= "get"> <!--el container me define tanaño en bootstrap-->
        <div class="mb-3 mt-5">
            <label class="form-label">escribe el dato a buscar: </label>
            <input type="text" class="form-control" name="buscar">           
        </div>    
        <button type="submit" class="btn btn-danger">BUSCAR!</button> <!--name="enviar" value="BUSCAR"-->
    </form>
</body>
</html>