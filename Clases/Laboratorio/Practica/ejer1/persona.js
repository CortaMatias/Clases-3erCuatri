"use strict";
var Prueba;
(function (Prueba) {
    class Persona {
        constructor(apellido, nombre) {
            this.apellido = apellido;
            this.nombre = nombre;
        }
        ToString() {
            return "Nombre: " + this.nombre + " Apellido: " + this.apellido;
        }
    }
    Prueba.Persona = Persona;
})(Prueba || (Prueba = {}));
//# sourceMappingURL=persona.js.map