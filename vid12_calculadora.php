<style>
    .resultado{   /* creamos un estilo de clase*/ 
        color:#f00;
        font-weight:bolod;
        font: size 32px;
    }
</style>



<?php
        //enviar la informacion al servidor cuando el usuario pulse el boton de ENVIAR. USAMOS LA FUNCION ISSENT
        /*if (isset($_POST["button"])) {
            $numero1=$_POST["num1"];
            $numero2=$_POST["num2"];
            $operacion=$_POST["operacion"];//tenemos almacenado + - * / % q el usuario escojio

            calcular($operacion);
        }*/

        function calcular($calculo){ //declaramos un parametro de la funcion. en este caso $calculo.
            if (!strcmp("Suma", $calculo)) { //https://www.php.net/manual/es/function.strcmp.php
                global $numero1;
                global $numero2;
                $resultado=$numero1+$numero2;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";//no reconose las variables $numero1 y $numer2 por 
                                //q estan declaradas dentro de un if y nosotros la estamos mencionando dentro de una funcion 
                                // solucion: declaramos $numero1 y $numero2 como variables GLOBALES. para q sean reconocidas
                                //en cualquier lugar de este codigo php.
            }
            if (!strcmp("Resta", $calculo)) { //remplazamos la variable operacion por CALCULO.
                global $numero1;
                global $numero2; 
                $resultado=$numero1-$numero2;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
            if (!strcmp("Multiplicacion", $calculo)) {
                global $numero1;
                global $numero2; 
                $resultado=$numero1*$numero2;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
            if (!strcmp("Division", $calculo)) { 
                global $numero1;
                global $numero2;
                $resultado=$numero1/$numero2;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
            if (!strcmp("Modulo", $calculo)) { 
                global $numero1;
                global $numero2;
                $resultado=$numero1%$numero2;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
             if (!strcmp("Incremento", $calculo)) { 
                global $numero1;
                $numero1++;
                $resultado=$numero1;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
            if (!strcmp("Decremento", $calculo)) { 
                global $numero1;
                $numero1--;
                $resultado=$numero1;
                echo "<p class = 'resultado'>El resultado es...$resultado</p>";
            }
        }
    ?>