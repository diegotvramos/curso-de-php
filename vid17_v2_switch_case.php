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
                $nombre=$_POST["nombre_usuario"];
                $edad=$_POST["edad_usuario"];
                //$contra=$_POST["contra_usuario"];

        switch (true) { //evaluar 2 variables a la vez con un shitch.
            case $edad<=18:
                echo "eres menor de edad,  $nombre";
                break; //rompe la ejecucion de los CASES qu puedan ir a continuacion
            case $edad<=40:
                echo "Eres joven,  $nombre";
                break;
            case $edad<=65:
                echo "Eres maduro,  $nombre";
                break;  

            default:
                echo "cuidate.";
                break;
        }
        
    }
?>