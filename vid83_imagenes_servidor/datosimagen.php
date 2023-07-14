<?php

class ClassImagen
{
    private $db;
    public function __construct(){
        require_once("conexion.php");
        $this->db=ClassConectar::conexion();// instanciamos y accedemos al metodo conexion
    }
    public function get_poner_imagen($id, $foto){
        $sql="update productos set foto=:miFoto where codigoArticulo=:miId"; //vamos a usar marcadores para hacer una consulta preparada. para evitar inyeccion sql.
        $resultado=$this->db->prepare($sql);
        $resultado->execute(array(":miId"=>$id, ":miFoto"=>$foto)); //asignamos los valores a los marcadores
        echo "entro a funcion";
    }
}


    //recibimos los datos de la imagen

    $nombre_imagen=$_FILES['nameimagen']['name'];// procede del imput type llamado nameimagen || SIPONES COMILLAS 2BLES EN VES DE SIMPLES, GENERA UN ERROR FATAL
    $tipo_imagen=$_FILES['nameimagen']['type']; //hacemos referencia a la propiedad TYPE
    $tamaño_imagen=$_FILES['nameimagen']['size'];
    $id=$_POST["idname"];
    echo $tipo_imagen . "............";// con esto veo el tipo de archivo q subí.

    if ($tamaño_imagen<=3000000) {// vid 84 con esto limitamos el tamaño del archivo 

        if ($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"|| $tipo_imagen=="image/png" || $tipo_imagen=="image/gif" ) { //usamos baras verticales
            //indicamos el direcctorio o carpeta dentro de nuestro servidor donde queremos guardar la imagen 
            //ruta de la carpeta destino en servidor.
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/uploads/'; //cuando subimos una imagen, antes de llegar a su destino pasa por una carpeta temporal || gaurdamos la ruta destino
            //movemos la imagen del directorio temporal al direcctorio escojido
            // movemos de la carpeta temporal a la carpeta destino, para ello usamos la funcion
            move_uploaded_file($_FILES['nameimagen']['tmp_name'], $carpeta_destino.$nombre_imagen);// lo concatenamos con nombre_imagen (.) el punto se usa para concatenar


               //cramos la instancia de la clase

                $modificar = new ClassImagen(); // una istancia ya es un objeto.
                $modificar->get_poner_imagen($id, $nombre_imagen); // aca iria el id y la ruta de la imagen.

                




            echo $_FILES['nameimagen']['size'] . " tamaño en bytes"; //iprimimos el tamaño de la imagen 
        }else {
            echo "solo se pueden subir imagenes";
        }
    }else {
        echo "el tamaño excede los 1 mB";
    }


 

 










    /*
    El simbolo -> en php esta asociado a notación de programación orientado a
    objetos. Por lo regular significa que accederas a una propiedad o un 
    procedimiento que se genero al crear una instancia de un objeto en php.

    Por ejemplo si tienes una clase en php llamada triangulo, el cual tiene las 
    propiedades base, altura y el método area; despues de crear una instancia de esta 
    clase con el nombre miTriangulo, para acceder a las propiedades escribirias: 
    $miTriangulo->base = 5; en este caso estas asignando el valor 5 a la propiedad 
    base del objecto. Y para llamar al metodo área en este mismo 
    ejemplo harias: $miTriangulo->area();

    Te recomiendo que veas informacion sobre objetos y clases en PHP.

    Saludos..






    Roberto Perez
Roberto Perez
hace 3 años
Otra forma de restringir el tipo de archivo que se subira sin tener que meter tanto 
codigo es especificarlo dentro del Input type="file" del index añadiendo la propiedas
 accept como se muetra a continuacion:


<input type="file" name="imagen" size="20" accept="image/*">


nota: esto lo busque por que en algun momento me toco hacer lo mismo en una aplicacion 
que desarrolle en VB


Saludos,
5
Cubik Centro de formación en alturas
Cubik Centro de formación en alturas
hace 3 años
Roberto mil gracias por este apunté, aunque lo lei un poco tarde, si es maravilloso 
porque unicamente te muestra imagenes cuando vas a cargar, ni siquiera muestra documentos.
3
El4Gamer
El4Gamer
hace 3 años
Esa es una buena opción, pero aún así, se debe validar desde el servidor, porque también 
supone  riesgo de borrar ese atributo desde el inspector y luego subir cualquier archivo.
4
Cubik Centro de formación en alturas
Cubik Centro de formación en alturas
hace 3 años
 @El4Gamer  Amigo no se cual es el inspector? que es el inspector? por otra parte si te 
 fijas en el código no está validando en el servidor estamos validando en la web antes 
 de subir cualquier cosa al servidor.
Cubik Centro de formación en alturas
Cubik Centro de formación en alturas
hace 3 años
 @El4Gamer  Y si igual deje la validación en caso de existir algo extraño que le permita 
 cargar un archivo diferente al usuario, pero de momento funciona perfecto porque cómo
  mencionaba  antes ni siquiera le muestra al usuario archivos diferentes al formato que le pides
El4Gamer
El4Gamer
hace 3 años
 @Cubik Centro de formación en alturas  Hola, el inspector de elementos es lo que te sale 
 al presionar la tecla F12. Ahora bien, no digo que esté mal, digo que de todas formas
  una validación en el servidor igual es necesaria.
1





    */
?>