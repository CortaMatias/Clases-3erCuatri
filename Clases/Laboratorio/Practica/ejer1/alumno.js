"use strict";
var Prueba;
(function (Prueba) {
    class Alumno extends Prueba.Persona {
        constructor(legajo, apellido, nombre) {
            super(apellido, nombre);
            this.legajo = legajo;
        }
        set Legajo(value) {
            this.legajo = value;
        }
        get Legajo() {
            return this.legajo;
        }
        set Apellido(value) {
            this.apellido = value;
        }
        get Apellido() {
            return this.apellido;
        }
        set Nombre(value) {
            this.nombre = value;
        }
        get Nombre() {
            return this.nombre;
        }
        ToString() {
            return super.ToString() + " Legajo: " + this.legajo;
        }
    }
    Prueba.Alumno = Alumno;
})(Prueba || (Prueba = {}));
//# sourceMappingURL=alumno.js.map