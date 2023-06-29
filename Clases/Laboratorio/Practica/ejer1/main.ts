/// <reference path="./alumno.ts" />
/// <reference path="./persona.ts" />

  let a1:Prueba.Alumno = new Prueba.Alumno(2321,"Corta", "Matias");
  let a2:Prueba.Alumno = new Prueba.Alumno(2322,"Gimenez", "roberto");
  let a3:Prueba.Alumno = new Prueba.Alumno(2322,"Menez", "alfredo");
  let a4:Prueba.Alumno = new Prueba.Alumno(2322,"Giz", "roto");

  let arrayAlumno:Array<Prueba.Persona> = [a1,a2,a3,a4];
  arrayAlumno.forEach(Mostrar);

  function Mostrar(a : Prueba.Persona){
    console.log(a.ToString());
  }
