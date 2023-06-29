"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.alCubo = void 0;
function alCubo(num) {
    return num ** 3;
}
exports.alCubo = alCubo;
function mostrar(num) {
    let cubo = alCubo(num);
    console.log(`El cubo de ${num} es ${cubo}`);
}
mostrar(4);
mostrar(6);
mostrar(3);
//# sourceMappingURL=Ejer06.js.map