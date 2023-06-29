function analizarCadena(cadena : string ): void {
  if(cadena === cadena.toLowerCase())console.log("La cadena esta formada por minusculas");
  else if(cadena === cadena.toUpperCase())console.log("La cadena esta formada por mayusculas");
  else console.log("La cadena esta formada por mayusculas y minusculas");
}

analizarCadena("JAJAJAJA");
analizarCadena("jajajaja");
analizarCadena("JaJAajA");