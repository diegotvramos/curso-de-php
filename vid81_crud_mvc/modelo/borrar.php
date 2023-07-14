<?php
    
    class ClassBorrar // [eso lo hizo con PRIVATE]
    {   private $db;
        public function __construct(){
            require_once("conexion.php");
            $this->db=ClassConectar::conexion(); //instanciamos y accedemos al metodo(conexion) de la clase 
        }
        //creamos los metodos.
        public function get_borrar($identificador){
            $sentencia=$this->db->query("delete from datos_usuarios where id='$identificador'");// no es una consulta preparada. por eso usa el QUERY el signo de DOLAR ESTABA DE MAS POR ESO ME DABA ERROR.
            return $sentencia;// NO seria necesario devolver algo. ni la variable sentencia.
        }
        public function get_redirigir($p){
            if ($p==1) {
                header ("Location:../index.php");
            }
            header("Location:../index.php?pagina=$p");//esto lo hicimos con la intencion de mantner la pagina en la q estamos al actualizr el registro.
            //redirigimos desde este archivo al index.php
            //redirigimos desde este archivo al panel ../ AVANZAMOS EN EL MVC ANTERIOR ESTA EN EL VIDEO.

           // echo "$p";
        }
    }
    $id=$_GET["idname"];
    $npag=$_GET["npag"];
    $borrar= new ClassBorrar(); //creamos instancia
    $borrar->get_borrar($id); // usa el metodo get borrar.
    $borrar->get_redirigir($npag);
    

    /*
        al pulzar el boton eliminar el registro desaparece y al ojo humano no le da tiempo ver 
        como se va a otro archivo y vuelve
    */
    

    /*
    DIferencia entre metodo estatico y un metodo no estatico.
https://youtu.be/JVkHVQ_ASWw













B. J. C.
B. J. C.
hace 5 meses
Para seguir el modelo de MVC, Debes crear 3 funciones en personas_modelo.php, que son de borrar_personas, actualizar_personas y insertar_personas. 

Cuando creas estas funciones entonces debes llamarlas por personas_controlador.php. (ya que el controlador es quién está conectando modelos con vista)
Ahora como puedo hacer que cuando aprete un boton me lleve a las funciones borrar, actualizar o inserta de personas_modelo.phpr?

Simplemente utilizando un if (isset($_GET["confirmacion_borrar"]))   en personas_controlador.php 
Lo que hago para tener ese GET "confirmacion_borrar" es colocarlo en la href  del botón borrar: así 

<td class="bot"><a href="?id=<?php echo $persona["id"] ?>&

    confirmacion_borrar=<?php echo "borrar"?>"><input type='button' name='del' id='del' value='Borrar'></a></td>


Y así otro if GET para actualizar, y luego un if POST para insertar porque será llamado desde el formulario con el submit.

Recuerda además que en vista debe ir actualizar_view.php para ver esa vista cuando apretemos el botón de actualizar. 







https://www.youtube.com/watch?v=tMoMzB3FfDI 






*/
?>

