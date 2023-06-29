<?php

$operador = "+";
$op1 = 2;
$op2 = 4;

switch ($operador) {
    case "+":
        $resultado = $op1 + $op2;
        break;
    case "-":
        $resultado = $op1 - $op2;
        break;
    case "*":
        $resultado = $op1 * $op2;
        break;
    case "/":
        if ($op2 == 0) {
            echo "Error: división por cero";
            break;
        }
        $resultado = $op1 / $op2;
        break;
    default:
        echo "Operador no válido";
        break;
}

if (isset($resultado)) {
    echo "El resultado es: " . $resultado;
}

?>