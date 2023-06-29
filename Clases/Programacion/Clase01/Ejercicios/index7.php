<?php

// Obtener la fecha actual del servidor
$fecha = date("d/m/Y");
$hora = date("H:i:s");

// Mostrar la fecha y hora
echo "La fecha actual es: $fecha<br>";
echo "La hora actual es: $hora<br>";
echo "<hr>";

// Determinar la estación 
$estaciones = [
    [12, 1, 2, "verano"],
    [3, 4, 5, "otoño"],
    [6, 7, 8, "invierno"],
    [9, 10, 11, "primavera"]
];

$mes = date("n"); // Obtener el número del mes actual
$estacion = "desconocida";

foreach ($estaciones as $temporada) {
    if (in_array($mes, $temporada)) {
        $estacion = $temporada[3];
        break;
    }
}

echo "Estamos en $estacion";

?>