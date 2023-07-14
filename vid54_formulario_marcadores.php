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


    <form action="vid54_marcadores_pdo.php" class="container mt-5" method= "get"> <!--el container me define tanaño en bootstrap-->
    <h3 class="text-center mb-4">ALTA DE ARTICULOS</h3>
        <div class="row mb-3">
            <lavel class="col-sm-2 col-form-label" for="seci">seccion</lavel>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="seci" name="seci">
            </div> 
        </div>  
        <div class="row mb-3">
            <lavel class="col-sm-2 col-form-label" for="p_orig">Pais de Origen</lavel>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="p_orig" name="p_orig">
            </div> 
        </div>
        <button type="submit" class="btn btn-danger">BUSCAR!</button>
    </form>
</body>
</html>