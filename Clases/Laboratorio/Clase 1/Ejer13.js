"use strict";
function esPrimo(num) {
    if (num < 2) {
        return false;
    }
    const limite = Math.sqrt(num);
    for (let i = 2; i <= limite; i++) {
        if (num % i === 0) {
            return false;
        }
    }
    return true;
}
function descomponerEnPrimos(num) {
    const factores = [];
    let divisor = 2;
    while (num > 1) {
        if (esPrimo(divisor) && num % divisor === 0) {
            factores.push(divisor);
            num /= divisor;
        }
        else {
            divisor++;
        }
    }
    return factores;
}
//# sourceMappingURL=Ejer13.js.map