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
         $nombre="juan";
            function damenombre(){
                //$nombre="maria";
                global $nombre;
                //echo "el nombre es: " . $nombre;
                $nombre="el nombre es: " . $nombre;
            }
            damenombre ();
         echo $nombre;
    ?>
</body>
</html>