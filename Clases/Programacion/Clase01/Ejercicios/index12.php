<?php

// Array de lapiceras
$lapiceras = array(
    array(
        'color' => 'azul',
        'marca' => 'Bic',
        'trazo' => 'fino',
        'precio' => 1.5
    ),
    array(
        'color' => 'negro',
        'marca' => 'Pilot',
        'trazo' => 'medio',
        'precio' => 2.0
    ),
    array(
        'color' => 'rojo',
        'marca' => 'Paper Mate',
        'trazo' => 'grueso',
        'precio' => 1.75
    )
);

// Mostrar las lapiceras
for ($i = 0; $i < count($lapiceras); $i++) {
    echo "<strong>Lapicera " . ($i+1) . ":</strong><br/>";
    echo "Color: " . $lapiceras[$i]['color'] . "<br/>";
    echo "Marca: " . $lapiceras[$i]['marca'] . "<br/>";
    echo "Trazo: " . $lapiceras[$i]['trazo'] . "<br/>";
    echo "Precio: $" . $lapiceras[$i]['precio'] . "<br/><br/>";
}

?>