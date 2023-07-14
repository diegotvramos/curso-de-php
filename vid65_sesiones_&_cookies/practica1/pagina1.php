<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="p-3 m-0 border-0 bd-example">


<?php
    if (isset($_COOKIE["idioma_seleccionado"])) {
        if ($_COOKIE["idioma_seleccionado"]=="es") {        //redirige a la pagina de Español
            header("Location:spanish.php");
        }elseif ($_COOKIE["idioma_seleccionado"]=="en") {  //redirige a la pagina de Ingles
            header("Location:english.php");
        }
    }
?>


<form action="creaCookie.php" method="GET">
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-sm-3 col-lg-2 mt-3 text-center" >
                <select class="form-select" aria-label="Default select example" id="idiomaselec" name="idiomaselec">   <!--onchange="getval(this);"-->
                    <option selected>idioma</option>
                    <option type= hidden value="es">Español</option>
                    <option type="hidden" value="en">English</option>
                </select>
                <div class="col-sm-3"><!--? sin esto no se alinea-->
                    <button type="submit" class="btn btn-primary">seleccionar</button>
                </div>                
            </div>
        </div>
    </div>
</form>




<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  <button type="button" class="btn btn-primary">1</button>
  <button type="button" class="btn btn-primary">2</button>

  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Dropdown link</a></li>
      <li><a class="dropdown-item" href="#">Dropdown link</a></li>
    </ul>
  </div>
</div>

   <a href="creaCookie.php?idioma=es"> español </a> 
    <a href="creaCookie.php?idioma=en"> ingles </a>
</body>
</html> 

<!--
    formularios de selecion
    https://getbootstrap.com/docs/5.2/forms/select/#default 

    si va ser mayor a SM pon col-3 si va ser mayor a lg pon COL 2. linea 14

    no es necesario ponerlo a la derecha por q cuando agas el programa va ver un lugar vacio para cambio de idoma y ahi lo
    tienes que poner.

    lo logre con LA ALINEACION HORIZONTAL. class="row justify-content-end"
    https://getbootstrap.com/docs/5.2/layout/columns/#horizontal-alignment 

                    <form action="creaCookie.php" method= "post">
                        <option value="es">Español</option>
                        <option value="en">English</option>
                    </form>
-->

<?php
/*

                    <!--<option selected>seleccione idioma</option>-->
                    <a href="creaCookie.php?idioma=es"><option value="es">Español</option></a><!--ademas a esta pagina le vamos a pasar un parametro utilizando la bara de direcciones UTILIZANDO GET-->
                    <a href="creaCookie.php?idioma=en"><option value="en">English</option></a><!--cuando el usuario pulse en el idioma pues a la pagina creaCookie.php le va pasar un parametro(llamado dioma)con un (valor) EN o ES -->
                
                    <option value="es" name="esp">Español</option>
                    <option value="en" name="eng">English</option>    

                                <form method=POST name=form1>
<input type=hidden name=Friend1 value=$Friend1>
<input type=hidden name=Friend2 value=$Friend2>
</form>

                    PREGUNTAS¿?
                    *Enviar form sin boton ni submit(YO)
                    *¿Como puedo mandar eso al siguiente formulario sino tengo q colocar ningun boton ni nada?
                    Un saludo y gracias
                    http://www.forosdelweb.com/f18/enviar-form-sin-boton-ni-submit-441626/ 
                    como hace para que la informacion se envie sin el boton submit

                    como rescatamos el value en php (YO)
                    *PHP - Rescatar valor formulario de un select
                    https://www.lawebdelprogramador.com/foros/PHP/1644365-Rescatar-valor-formulario-de-un-select.html
                    <select name="vehiculo">
                    <option value="Turismo">Turismo</option>
                    <option value="Todoterreno">Todoterreno</option>
                    <option value="Furgoneta">Furgoneta</option>
                    <option value="Quad">Quad</option>
                    <option value="Agricola">Maquinaria Agrícola</option>
                    </select>

                    CONCLUCION.
                    para poder enviar formulario sin el boton submit es necesario usar javascript o jqueri o si hay mas (investigar.)


*/
?>