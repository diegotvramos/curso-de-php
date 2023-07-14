<?php
    class ClassObjetoBlog
    {
        /*declaramos las propiedades o atributos que va tener cada objeto blog */
        /*una entrada de blog puede tener como propiedad o atributo(titulo, comentario, imagen, fecha, id, ) */

        /*PROPIEDADES DEL OBJETO BLOG (CLASE) */
        private $id;  //para encapsular estas propiedades y que solo se puedan modifocar desde el propio objeto y no desde fuera
        private $titulo;
        private $fecha;
        private $comentario;
        private $imagen;

        /*  ahora necesitamos los metodos de acceso los GETTERS y los SETTERS.
            SETTERS = se encargan de establecer los valores de esas propiedades.
            GETTERS = muestra los valores de esas propiedades. 
        */
        /* METODS DE ACCESOS GETTERS Y SETTERS */
        public function getid(){
            return $this->id; // El THIS hace referencia al objeto donde nos encotramos es decir la clase i el id a lapropiedad id
        }

        public function setid($paraid){ // Debemos pasarle por parametro un argumento | es para establecer el id osea darle valor a ese $id(propiedad) 
            $this->id=$paraid;           // lo que le pasemos a este metodo setter por parametro sera el valor q le de a la propiedad $id del propio objeto(clase)
                                    // $this->id hace referencia a la propiedad id del objeto(clase) y $paraid(es el parametro que le paso al metodo en su llamada)
        }
        /* DEBEMOS CREAR LOS GUETER Y SETERS PARA CADA PROPIEDAD */
        public function gettitulo(){
            return $this->titulo;
        }
        public function settitulo($paratitulo){
            $this->titulo=$paratitulo;
        }

        public function getfecha(){
            return $this->fecha;
        }
        public function setfecha($parafecha){
            $this->fecha=$parafecha;
        }

        public function getcomentario(){ //para obtener la propiedad comentario del objeto blob(clase)
            return $this->comentario;
        }
        public function setcomentario($paracomentario){ // para establecer valor de la propiedad comentario del objeto blog(clase)
            $this->comentario=$paracomentario;
        }

        public function getimagen(){
            return $this->imagen;
        }
        public function setimagen($paraimagen){
            $this->imagen=$paraimagen;
        }
    }
    
?>