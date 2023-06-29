<?php

$a = 6;
$b = 9;
$c = 8;

// Ordenar las variables de menor a mayor
if ($a > $b) {
    [$a, $b] = [$b, $a];
}
if ($b > $c) {
    [$b, $c] = [$c, $b];
}
if ($a > $b) {
    [$a, $b] = [$b, $a];
}

// Comprobar si el valor medio existe
if ($a == $b || $b == $c) {
    echo "No hay valor del medio";
} else {
    echo $b; // El valor medio siempre será el de en medio (segunda variable)
}

?>