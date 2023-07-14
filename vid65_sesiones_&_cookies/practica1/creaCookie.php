<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

                                                //idiomaselec es el nombre de el formulario el valor es el selecionado por el usuario. que se almasena en NAME.
        setcookie("idioma_seleccionado", $_GET["idiomaselec"], time()+100000);//rescatamos de la barra de dirreciones lo que venga en el parametro IDIOMAS.)(pildoras)
        header("Location:ver_cookie.php");
    ?>
</body>
</html>