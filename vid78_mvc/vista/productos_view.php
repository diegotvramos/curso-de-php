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
    <div class="container mt-3 col-8">
        <div class="text-center mb-3">
            <h1 class="fw-bold">Modelo Vista Controlador</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-light table-hover table-bordered border-dark">
                <caption>List of users</caption>

                <thead class="table-dark">
                    <tr>
                    <th scope="col">Codigo articulo</th>
                    <th scope="col">nombre del articulo</th>
                    <th scope="col">precio</th>
                    <th scope="col">procedencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matriz as $registro):?>
                        <tr>
                            <th><?php echo $registro->codigoArticulo?></th><!--codigoArticulo corresponde al nomre de la columna de la tabla en db-->  
                            <td><?php echo $registro->nombreArticulo?></td>
                            <td><?php echo $registro->precio?></td>  
                            <td><?php echo $registro->paisdeorigen?></td>  
                            <!--<td> echo $registro["precio"]paisdeorigen</td> abrir y cerar php para imprimir con FETCH_ASSOC(esta en productos_model.php) se hace de esta forma para recorrer y mostrar.-->
                        </tr>                                                          
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<!-- 
            Miguel Reyes
        Miguel Reyes
        hace 2 años
        Una manera diferente de mostrar la información, en vez de usar table y pienso que es más fácil, es:


        foreach($matrizProductos as $registro){

            var_dump($registro["NOMBREARTÍCULO"]);

        }

        Foreach en PHP es usado para recorrer en array de principio a fin
        https://codigonaranja.com/foreach-php 
-->