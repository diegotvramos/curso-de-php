<?php
    class Compra_vehiculo{
        private $precio_base;
        static $ayuda=4500; // no pertenese a ningun objeto q podamos crear.

        function __construct($gama){
            if ($gama=="urbano") {
                $this->precio_base=10000;
            }elseif ($gama=="compacto") {
                $this->precio_base=20000;
            }elseif ($gama=="berlina") {
                $this->precion_base=30000;
            }
        }//fin del constructor.
        function climatizador (){
            $this->precio_base+=2000; //+= es un incremento
        }
        function navegador_gps (){
            $this->precio_base+=2500;
        }
        function tapiseria_cuero ($color){
            if ($color=="blanco") {
                $this->precio_base+=3000;
            }elseif ($color=="beige") {
                $this->precio_base+=3500;
            }else {
                $this->precio_base+=5000;
            }
        }//fin tapiceria
        function precio_final(){
            $valor_final=$this->precio_base-self::$ayuda;
            return $valor_final;
        }
    }
?>