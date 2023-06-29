<?php

  class Guarderia{
    public string $nombre;
    public $mascotas = [];
    
    public function __construct(string $nombre)
    {
      $this->nombre = $nombre;
      $this->mascotas = array();
    }

    public static function equals(Guarderia $g, Mascota $m) : bool {    
      foreach($g->mascotas as $mascota){
        if($mascota->equals($m)) return true;        
      }
      return false;
      
    }

    public function add(Mascota $m) : bool{
      if(!$this->equals($this, $m )){$this->mascotas[] = $m; return true;}
      else return false; 
    }

    public function toString() : string {
      $output = "Guarderia : " . $this->nombre  ."<br>";
      $output .= "Mascotas:  <br>";
      foreach($this->mascotas as $mascota) $output .= $mascota->toString() . "<br>";
      return $output;
    }
  }
