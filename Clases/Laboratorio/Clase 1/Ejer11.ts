function esPalindromo(cadena: string): boolean {
  let cadenaLimpia = cadena.toLowerCase().replace(/[^a-zA-Z0-9]/g, "");
  let tam = cadenaLimpia.length;
  for (let i = 0; i < tam / 2; i++) {
    if (cadenaLimpia[i] !== cadenaLimpia[tam - 1 - i]) return false;
  }

  return true;
}

console.log(esPalindromo("La ruta nos aporto otro paso natural"));
console.log(esPalindromo("Matias blala"));
console.log(esPalindromo("Reconocer"));