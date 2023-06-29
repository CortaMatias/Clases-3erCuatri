<?php
require_once "FiguraGeometrica.php";

  class Cuadrado extends FiguraGeometrica {

    private $_lado;

    public function __construct($l1)
    {
      $this->_lado = $l1;
      $this->CalcularDatos();
    }
    
    public function Dibujar(){
      $dibujo = "";
      for($i = 0; $i < $this->_lado; $i++){
        for($j = 0; $j < $this->_lado; $j++){
          $dibujo .= "*";
        }
        $dibujo .= "<br>";
      }
      return $dibujo;
    }

    public function CalcularDatos(){
       $this->_superficie = $this->_lado * $this->_lado . "<br>";
       $this->_perimetro = $this->_lado * 4 . "<br>";
    }

  }

?>