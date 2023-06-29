<?php

// Cargar los tres arrays
$animales = array();
array_push($animales, "Perro", "Gato", "Ratón", "Araña", "Mosca");
foreach($animales as $animal) echo "Animal:  $animal  <br>";
echo "<hr>";

$años = array();
array_push($años, "1986", "1996", "2015", "78", "86");
foreach($años as $año) echo "Año:  $año  <br>";
echo "<hr>";

$tecnologias = array();
array_push($tecnologias, "php", "mysql", "html5", "typescript", "ajax");
foreach($tecnologias as $tecnologia) echo "Tecnologia:  $tecnologia  <br>";
echo "<hr>";

// Juntar los tres arrays en uno
$array_junto = array_merge($animales, $años, $tecnologias);

// Mostrar el array por pantalla
echo "El array juntado es: <br>";
foreach ($array_junto as $valor) {
  echo $valor . "<br>";
}
?>