<?php

   abstract class  FiguraGeometrica {
    protected $_color;
    protected $_superficie;
    protected $_perimetro;

    public function __construct(){}
   
    public function getColor(){
      return $this->_color;
    }

    public function setColor($color){
      $this->_color = $color;
    }

    public function toString(){
      return "Color: " . $this->_color . ", Superficie: " . $this->_superficie . ", Perimetro: " . $this->_perimetro . "<br>";
    }

    abstract protected function Dibujar();

    abstract protected function CalcularDatos();
    
  }

?>