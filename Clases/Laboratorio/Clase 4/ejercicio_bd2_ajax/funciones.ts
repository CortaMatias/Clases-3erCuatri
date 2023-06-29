/// <reference path="ajax.ts" />

const xhttp: XMLHttpRequest = new XMLHttpRequest();
const pagina = "./nexo_pdo.php";


function Manejadora() {
  let accion: string = (<HTMLInputElement>document.getElementById("accion")).value;
  let legajo: string = (<HTMLInputElement>document.getElementById("legajo")).value;
  let nombre: string = (<HTMLInputElement>document.getElementById("nombre")).value;
  let apellido: string = (<HTMLInputElement>document.getElementById("apellido")).value;
  let foto = document.getElementById("foto") as HTMLInputElement; 

  if (accion == "obtenerAlumnos") {
    let ajax = new Ajax();
    let param: string = `accion=${accion}`;
    ajax.Post(pagina, (response: string) => {
      const tableData = response;

      const tableContainer = document.createElement("div");
      tableContainer.innerHTML = tableData;

      const style = document.createElement("style");
      style.innerHTML = "table { border-collapse: collapse; width: 80%; padding: 10px; margin: 50px auto; text-align: center; } td, th { border: 1px solid black; padding: 8px; text-align: center; }";

      document.head.appendChild(style);
      document.body.appendChild(tableContainer);
    }, param);
  }

  if (accion == "eliminarAlumno") {
    let ajax = new Ajax();
    let param: string = `accion=${accion}&legajo=${legajo}`;
    ajax.Post(pagina, (response: string) => {

      if (response.trim()== "1") {
        const h3Data = "Alumno eliminado";
        const h3Container = document.createElement("div");
        const h3 = document.createElement("h3");
        h3.innerHTML = h3Data;
        h3Container.appendChild(h3);
        document.body.appendChild(h3Container);
      } else {
        const h3Data = "Alumno no encontrado";
        const h3Container = document.createElement("div");
        const h3 = document.createElement("h3");
        h3.innerHTML = h3Data;
        h3Container.appendChild(h3);
        document.body.appendChild(h3Container); 
      }
    }, param);
  }

  if (accion == "insertarAlumno") {
    if (foto.files && foto.files.length > 0) {
      const formData = new FormData();
      formData.append('accion', accion);
      formData.append('legajo', legajo);
      formData.append('nombre', nombre);
      formData.append('apellido', apellido);
      for (const [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
      }
      let ajax = new Ajax();
      
      const paramFoto = new FormData();
      paramFoto.append('accion', accion);
      paramFoto.append('legajo', legajo);
      paramFoto.append('nombre', nombre);
      paramFoto.append('apellido', apellido);
      paramFoto.append("foto", foto.files[0]);
      ajax.PostImageForm(pagina, (response: string) => {
        console.log(response);
      }, paramFoto);   
    } else console.log("BOLUDO");
  }
}

function Fail(retorno: string): void {
  console.clear();
  console.log("ERROR!!!");
  console.log(retorno);
}

