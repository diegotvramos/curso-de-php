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
        $var1=1;// que es la variable Static?..
        /*while ($var1<6) {
            echo "estamos ejecutando el codigo del bucle <br>";
            $var1++;
        }*/
        do {//do= haz/realiza
            echo "estamos ejecutando el codigo del bucle <br>";
            $var1++;
        } while ($var1<6);//while= mientras
        echo "hemos salido del buble";
    ?>
</body>
</html>