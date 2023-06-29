"use strict";
function MostrarNombreApellido(nombre, apellido) {
    let nombreCambiado = nombre.charAt(0).toUpperCase() + nombre.slice(1).toLowerCase();
    let apellidoMayus = apellido.toUpperCase();
    console.log(`${nombreCambiado}, ${apellidoMayus}`);
}
MostrarNombreApellido("JUAN PABLO", "MATIAS");
MostrarNombreApellido("matias", "corta");
//# sourceMappingURL=Ejer05.js.map