<?php
  class Auto {
    public string $color;
    public int $precio;
    private string $marca;
    private DateTime $fecha;

    public function __construct(string $marca, string $color,int  $precio = 0, DateTime $fecha = null)
    {
      $this->marca = $marca;
      $this->color = $color;
      $this->precio = $precio;
      if($fecha != null)$this->fecha = $fecha;
      else $this->fecha = new DateTime("now");
    }

    public function AgregarImpuestos($impuesto){
      $this->precio += $impuesto;
    }

    public static function MostrarAuto(Auto $auto){
      $auto->Mostrar();
    }

    private function Mostrar(){
      echo "Marca: " . $this->marca . ", Color: " . $this->color . ", Precio: " . $this->precio . ", Fecha: " . $this->fecha->format(("Y-m-d")) . "<br>";
    }

    public function Equals(Auto $a1, Auto $a2) : bool
    {
      if($a1->marca == $a2->marca)
      return true;
      else return false;
    }

    public static function Add(Auto $a1, Auto $a2){
      if($a1->marca == $a2->marca && $a1->color ==  $a2->color){ echo "Coinciden la suma es:$a1->precio + $a2->precio <br>"; return 1 ;}
      else {echo "No coincide la marca y el color <br>"; return 0;} 
    }
  }


?>