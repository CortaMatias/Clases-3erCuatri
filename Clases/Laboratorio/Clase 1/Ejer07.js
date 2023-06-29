"use strict";
function esPrimo(numero) {
    if (numero <= 1) {
        return false;
    }
    for (let i = 2; i <= Math.sqrt(numero); i++) {
        if (numero % i === 0) {
            return false;
        }
    }
    return true;
}
function mostrarPrimerosNPrimos(n) {
    let contador = 0;
    let numeroActual = 2;
    while (contador < n) {
        if (esPrimo(numeroActual)) {
            console.log(numeroActual);
            contador++;
        }
        numeroActual++;
    }
}
mostrarPrimerosNPrimos(20);
//# sourceMappingURL=Ejer07.js.map