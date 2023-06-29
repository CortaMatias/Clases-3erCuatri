<?php
  include_once "FiguraGeometrica.php";

  class Triangulo extends FiguraGeometrica{

    private $_altura;
    private $_base;

    public function __construct($b, $h){
      $this->_altura = $h;
      $this->_base = $b;
      $this->CalcularDatos();
    }   
    
    protected function CalcularDatos(){
      $this->_superficie = ($this->_base * $this->_altura) / 2;
      $this->_perimetro = $this->_base +2 * sqrt(pow($this->_base /2 , 2) + pow($this->_altura,2));
    }

    public function Dibujar(){
      echo "<pre>";
		for ($i = 1; $i <= $this->_altura; $i++) {
			for ($j = 1; $j <= $i; $j++) {
				echo "* ";
			  }
			echo "\n";
		  }
		echo "</pre>";
    }
  }
