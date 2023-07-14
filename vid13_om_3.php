<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>&nbsp;</p>
<form name="form1" method="post" action=""><!--borramos el nombre del archivo direccionado-->
	<p>
    	<label for="num1"></label>
        <input type="text" name="num1" id="num1" /><!--importa mucho el ID para relacionarlo con php-->
        <label for="num2"></label>
        <input type="text" name="num2" id="num2" />
        <label for="operacion"></label>

        <select name="operacion" id="operacion">
        	<option>Suma</option>
            <option>Resta</option>
            <option>Multiplicacion</option>
            <option>Division</option>
            <option>Modulo</option>
            <option>Incremento</option> 
            <option>Decremento</option>         
        </select>
    </p>
    <p>
    	<input type="submit" name="button" id="button" value="enviar" onClick="prueba" />
    </p>
    </form>
    <p>&nbsp;</p>

  <?php
        include("vid12_calculadora.php");

        if (isset($_POST["button"])) {
            $numero1=$_POST["num1"];
            $numero2=$_POST["num2"];
            $operacion=$_POST["operacion"];//tenemos almacenado + - * / % q el usuario escojio

            calcular($operacion); //lamada a la funcion calcular.
        }

    ?>

    

</body>
</html>
