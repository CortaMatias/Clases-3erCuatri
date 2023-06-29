"use strict";
/// <reference path="./alumno.ts" />
/// <reference path="./persona.ts" />
let a1 = new Prueba.Alumno(2321, "Corta", "Matias");
let a2 = new Prueba.Alumno(2322, "Gimenez", "roberto");
let a3 = new Prueba.Alumno(2322, "Menez", "alfredo");
let a4 = new Prueba.Alumno(2322, "Giz", "roto");
let arrayAlumno = [a1, a2, a3, a4];
arrayAlumno.forEach(Mostrar);
function Mostrar(a) {
    console.log(a.ToString());
}
//# sourceMappingURL=main.js.map