<?php
require_once "./FiguraGeometrica.php";
require_once "./Cuadrado.php";
require_once "./Triangulo.php";


$cuadrado = new Cuadrado(5);
$cuadrado->setColor("Rojo");
echo $cuadrado->toString();
echo $cuadrado->Dibujar();

$triangulo = new Triangulo(3, 4);
$triangulo->setColor("Violeta");
echo $triangulo->toString();
echo $triangulo->Dibujar();

?>