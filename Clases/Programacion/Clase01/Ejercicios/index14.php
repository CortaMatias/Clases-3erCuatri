<?php
// Crear los tres arrays
$array1 = array("Perro", "Gato", "Ratón", "Araña", "Mosca");
$array2 = array("1986", "1996", "2015", "78", "86");
$array3 = array("php", "mysql", "html5", "typescript", "ajax");

// Crear el array asociativo
$asociativo = array(
    "animales" => $array1,
    "años" => $array2,
    "tecnologías" => $array3
);

// Crear el array indexado
$indexado = array($array1, $array2, $array3);

// Mostrar los arrays de arrays
echo "<pre>";
print_r($asociativo);
print_r($indexado);
echo "</pre>";
?>