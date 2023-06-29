"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.factorial = void 0;
function factorial(n) {
    let resultado = 1;
    for (let i = 1; i <= n; i++) {
        resultado *= i;
    }
    console.log("El factorial es " + resultado);
    return resultado;
}
exports.factorial = factorial;
factorial(1);
factorial(3);
factorial(5);
factorial(10);
factorial(0);
//# sourceMappingURL=Ejer08.js.map