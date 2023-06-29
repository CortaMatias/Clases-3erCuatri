<?php

// Definir el array y cargar los primeros 10 números impares
$numeros_impares = array();
$contador_impares = 1;

while (count($numeros_impares) < 10) {
    if ($contador_impares % 2 != 0) {
        array_push($numeros_impares, $contador_impares);
    }
    $contador_impares++;
}

// Imprimir los números utilizando la estructura for
echo "<strong>Impresión utilizando la estructura for:</strong><br/>";
for ($i = 0; $i < count($numeros_impares); $i++) {
    echo $numeros_impares[$i] . "<br/>";
}

// Imprimir los números utilizando la estructura while
echo "<strong>Impresión utilizando la estructura while:</strong><br/>";
$j = 0;
while ($j < count($numeros_impares)) {
    echo $numeros_impares[$j] . "<br/>";
    $j++;
}

// Imprimir los números utilizando la estructura foreach
echo "<strong>Impresión utilizando la estructura foreach:</strong><br/>";
foreach ($numeros_impares as $numero) {
    echo $numero . "<br/>";
}

?>