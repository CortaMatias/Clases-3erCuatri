<?php


  function validar($cadena, $max){

    $array  = ["Recuperatorio", "Parcial", "Programacion"]; 

    if(strlen($cadena) > $max){
      echo "Supera el tamaño maximo";
      echo "<br>";
      return 0;
    }
    else {
      foreach($array as $palabra){
        if($palabra ==  $cadena){
          echo "Coincide";
          echo "<br>";
          return 1;
        }        
      }
    }
    echo "No hay coincidencia <br>";
    return 0;
  }
 
  validar("Recuperatorio", 15);
  validar("Parcial", 15); 
  validar("Programacion", 15);
  validar("Programacion", 5);
  validar("Programacion", 5);
  validar("Armenio", 20);  
?>