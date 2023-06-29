<?php

// Definir el vector asociativo
$v = array();
$v[1] = 90;
$v[30] = 7;
$v['e'] = 99;
$v['hola'] = 'mundo';

// Imprimir los valores utilizando la estructura foreach
foreach ($v as $valor) {
    echo $valor . "<br/>";
}

?>