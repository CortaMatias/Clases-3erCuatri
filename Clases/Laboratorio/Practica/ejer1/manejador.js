"use strict";
/// <reference path="./alumno.ts" />
/// <reference path="./persona.ts" />
var Manejador;
(function (Manejador) {
    function CrearAlumno() {
        let nombre = document.getElementById("nombre").value;
        let apellido = document.getElementById("apellido").value;
        let legajo = document.getElementById("legajo").value;
        let alumno = new Prueba.Alumno(parseInt(legajo), apellido, nombre);
        console.log(alumno.ToString());
    }
    Manejador.CrearAlumno = CrearAlumno;
})(Manejador || (Manejador = {}));
//# sourceMappingURL=manejador.js.map