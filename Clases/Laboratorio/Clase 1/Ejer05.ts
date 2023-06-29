function MostrarNombreApellido( nombre : string , apellido : string ) : void{
  let nombreCambiado : string = nombre.charAt(0).toUpperCase() + nombre.slice(1).toLowerCase();
  let apellidoMayus : string = apellido.toUpperCase();
  console.log(`${nombreCambiado}, ${apellidoMayus}`);
}

MostrarNombreApellido("JUAN PABLO", "MATIAS");
MostrarNombreApellido("matias", "corta");