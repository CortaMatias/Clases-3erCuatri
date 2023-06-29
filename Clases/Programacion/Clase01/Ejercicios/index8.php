<?php
function numEnLetras($num) {
    $numeros = [
      0 => 'cero', 1 => 'uno', 2 => 'dos', 3 => 'tres', 4 => 'cuatro',
      5 => 'cinco', 6 => 'seis', 7 => 'siete', 8 => 'ocho', 9 => 'nueve',
      10 => 'diez', 20 => 'veinte', 30 => 'treinta', 40 => 'cuarenta', 50 => 'cincuenta', 60 => 'sesenta'
    ];
  
    if (array_key_exists($num, $numeros)) {
      return $numeros[$num];
    } else if ($num >= 21 && $num <= 29) {
      return 'veinti' . $numeros[$num - 20];
    } else if ($num >= 31 && $num <= 39) {
      return 'treinta y ' . $numeros[$num - 30];
    } else if ($num >= 41 && $num <= 49) {
      return 'cuarenta y ' . $numeros[$num - 40];
    } else if ($num >= 51 && $num <= 59) {
      return 'cincuenta y ' . $numeros[$num - 50];
    } else {
      return 'El número no se encuentra entre el 20 y el 60.';
    }
  }
  
  $num = 25;
  echo 'El número ' . $num . ' se escribe como: ' . numEnLetras($num);

?>