<?php
//PRIMERO SE CREA DESPUES SE EJECUTA.

    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"]==1) {
            header ("Location:index.php");
        }else {
            $num_pagina=$_GET["pagina"];
        }
    }else {
        $num_pagina=1;// number page for defecto.
    }
    $corte=3;
    
    require_once("modelo/paginacion.php");
    $calculo=new ClassPaginacion();//instanciamos.
    $comienzo=$calculo->get_calcula_comenzar($num_pagina,$corte);
    $total_paginas=$calculo->get_total_paginas($corte);

    require_once("modelo/personas_modelo.php");//incluimos todo el archivo| ES UNA RUTA.
    $persona=new ClassPersonas(); //instanciamos la ClassProductos. || estamos llamando automaticamente al constructor.  ahora podemos llamar a sus metodos.
    $matriz=$persona->get_personas($comienzo,$corte);//'$producto es la instancia q acabamos de crear' devuelve un array y lo almacena en matriz.

    require_once("vista/personas_view.php");// es como si tuvieramos todo el archivo de 'productos view' [el orden si importa. para ejecutar]
    //funcion isset(): determina si una variable ha sido declarada y su valor no es NULO ¿PULSO?  

    //if (isset($_POST["enviar"])) {// con estro preguntamos si se pulzo el boton de enviar  
        //include_once("modelo/actualizar.php");

    //}


/*
    La función require_once() incluye y evalua el fichero especificado 
    durante la ejecución del script. Se comporta de manera similar a 
    require(), con la única diferencia que si el código ha sido ya 
    incluido, no se volverá a incluir. Consultar la documentación de 
    la función require() para obtener más información.


    https://es.stackoverflow.com/questions/239648/enviar-formulario-a-la-misma-p%C3%A1gina-con-url-o-php-self

    es preistorico usar php self.
*/

?>