<?php   
function potencia(){

    for($i = 1; $i < 5; $i ++){
      echo "Potencia de $i: ";
      for($j = 1; $j < 5; $j ++){
        echo pow($i, $j) . " ";
      }
      echo "<br>";
    }
}
 
  potencia();
?>