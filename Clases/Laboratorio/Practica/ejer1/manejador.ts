/// <reference path="./alumno.ts" />
/// <reference path="./persona.ts" />

namespace Manejador {

  export function CrearAlumno() :void {
    let nombre:string = (<HTMLInputElement> document.getElementById("nombre")).value;
    let apellido:string = (<HTMLInputElement> document.getElementById("apellido")).value;
    let legajo:string = (<HTMLInputElement> document.getElementById("legajo")).value;
    let alumno:Prueba.Alumno = new Prueba.Alumno(parseInt(legajo), apellido, nombre); 
    console.log(alumno.ToString());
  }

  
}