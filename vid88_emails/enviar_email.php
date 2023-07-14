<?php

    if ($_POST["camponombre"]==""||$_POST["campoapellido"]==""||$_POST["campoemail"]==""||$_POST["campoemail"]=="") {
        echo "los campos estan vacios";
        die(); //la funcion DIE hace que en el caso de entrar al if pues el programa no continue ejecutando lo que hay a continuacion 
        //el programa muere en esa linea de codigo 
    }

    $texto_mail=$_POST["campocomentario"]; //lo que estra dentro del corchete es el nombre el campo del formulario
    $destinatario=$_POST["campoemail"];
    $asunto=$_POST["campoasunto"];
    $headers="MIME-Versión: 1.0\r\n";    /*parametro opcional */ /*¿Qué es MIME y para qué sirve?
                    El tipo Extensiones multipropósito de Correo de Internet (MIME)
                     es una forma estandarizada de indicar la naturaleza y el formato 
                     de un documento, archivo o conjunto de datos. Está definido 
                     y estandarizado en IETF RFC 6838. */

    $headers.="Content-type: text/html; charset=iso- 8859-1\r\n ";
    $headers.="From: Prueba Juan <cursos@pildorasinformaticas.es>\r\n";//con esto especificamos de quien viene este mensaje 

    $exito= mail($destinatario, $asunto, $texto_mail, $headers);

    if ($exito) {// la variable exito el booleana por que la funcion MAIL debuelbe un boleano
        echo "mensaje enviado con exito ";
    }else {
        echo "Ha habido un error ";
    }

    //necesitamos un servidor de correo electronico o servicio de correo electronico 

     /*
        Tomás Acosta Aguilera
Tomás Acosta Aguilera
hace 2 años
2021-La funcion mail() en xampp requiere mucha configuracion para aplicarla y no es 
100% optima y segura. Sugerencia: enviar mails mediante la clase 
PHPMailer (si la buscan en google les va a aparecer, y hay muchos 
tutoriales que nos ofrece nuestro amigo Google para usar esta clase y 
enviar correos electronicos). Un saludo 
     
    Veni, vidi, vici
Veni, vidi, vici
hace 3 años
La verdad es que no entendí... solo me llegan a mi los correos. Lo ideal es que
 una persona con  X correos introduzca los datos y yo los reciba, tal como dices 
 solo llegan los correos al correo introducido en el formulario, es decir a uno 
 mismo, en vez de recibirlo el propietario del formulario, para posteriormente 
 ponerse en contacto con él usuario que introdujo los datos en el formulario. 
*/   
?>