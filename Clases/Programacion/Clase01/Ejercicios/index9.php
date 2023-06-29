
<?php

// Definir el array con 5 elementos enteros
$numeros = array(6, 7, 9, 9, 9);

// Asignar a cada elemento un número aleatorio entre 1 y 10
for ($i = 0; $i < 5; $i++) {
    $numeros[$i] = rand(1, 10);
}

// Calcular el promedio de los números en el array
$promedio = array_sum($numeros) / count($numeros);

// Determinar si el promedio es mayor, menor o igual que 6 y mostrar un mensaje
if ($promedio > 6) {
    echo "El promedio es mayor que 6.";
} elseif ($promedio < 6) {
    echo "El promedio es menor que 6.";
} else {
    echo "El promedio es igual a 6.";
}
?>







