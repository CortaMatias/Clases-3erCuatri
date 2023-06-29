<?php   

    $num = 1; 
    $suma = 0;
    while($suma + $num  < 1000){
        $suma += $num;
        $num++; 
    } 
    echo "Suma: $suma";
    echo "   Numeros que se sumaron: $num ";

?>