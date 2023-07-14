

<style>
        h1{
            text-align:center;
            }

        table{
            background-color:#FFC;
            padding:5px;
            border:#666 5px solid;
            }

        .no_validado{
            font-size:18px;
            color:#F00;
            font-weight:bold;
            }

        .validado{
            font-size:18px;
            color:#0C3;
            font-weight:bold;
            }
</style>

<?php
    if (isset($_POST["enviando"])) { // 'enviando' es el id del voton enviar.
        $contra=$_POST["contra"];
        $nombre=$_POST["nombre_usuario"];

        /*if ($edad<18) {
            echo "Eres menor de edad. no tienes acceso";
        }else {
            echo "Eres mayor de edad. puedes acceder"
        }*/

        $resultado= ($nombre=="Juan" && $contra="1234") ? "Puedes acceder" : "No puedes acceder";
        echo $resultado;

        /*$resultado = $nombre=="Juan" ? ($contra == "1234" ? "Puedes acceder." : "Contraseña incorrecta") : 
        ($contra == "1234" ? "Nombre incorrecto." : "Contraseña y nombre incorrecto");*/

    }
?>