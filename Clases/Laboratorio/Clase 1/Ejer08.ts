export function factorial(n : number ) : number {
  let resultado : number = 1;

  for(let i = 1; i <= n; i ++){
    resultado *= i;
  }
  console.log("El factorial es " + resultado);
  return resultado;
}


factorial (1);
factorial (3);
factorial (5);
factorial (10);
factorial (0);