<?php
    require_once("modelo/productos_modelo.php");//incluimos todo el archivo de productos modelo.
    //ejecutamos el metodo get_productos
    $producto=new ClassProductos(); //instanciamos la ClassProductos. || estamos llamando automaticamente al constructor.  ahora podemos llamar a sus metodos.
    $matriz=$producto->get_productos();//'$producto es la instancia q acabamos de crear' devuelve un array y lo almacena en matriz.
    
    require_once("vista/productos_view.php");// es como si tuvieramos todo el archivo de 'productos view'




?>