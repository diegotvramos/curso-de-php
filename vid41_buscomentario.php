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

$mibusqueda = $_GET['buscar'];



//* con $_SERVER le indicamos cual va ser la pagina del servido

$mipag = $_SERVER['PHP_SELF'];//PHP_SELF indica la misma pagina



//* valacion de GET para verificar llenado de formulario

if (isset($_GET["buscar"])) {

  echo '<form action="$mipag" methos="get">

  <fieldset>

  <legend>

  <h3>Formulario para buscar en base de datos</h3>

  </legend>

  <label for="">Buscar:

    <input type="text" name="buscar">

    <input type="submit" value="Enviar" name="enviando">

    </label>

    </fieldset>

    </form>';

  }else{

  ejecuta_consulta($mibusqueda);

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST["buscar"])==false)  /Recordar que isset determina si una variable está definida y no es NULL. Entonces devolverá false si no está definida (como en este caso). Por lo tanto, si el input buscar no a enviado datos, entonces  muestra el formulario/
{                                   /* Al dejar action="", le indica al submit que lo envíe a la misma página*/
 echo " <fieldset>
                <legend><h3>Formulario para buscar en una base de datos</h3></legend>    
                      <form action='' method='post'/> 
                             <label> BUSCAR: <input type='text' name = 'buscar'> </label>
                                             <input type='submit' name='enviando' value='Enviar'>
                      </form>
      </fieldset>";
}
else                   /* Si el input buscar está definido (si envió datos) ejecuta la consulta*/
{  
   ejecuta_consulta($_POST["buscar"]);
}
?>
</body>
</html>