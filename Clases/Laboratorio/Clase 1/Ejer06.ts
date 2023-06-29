export function alCubo (num : number ) : number{
  return num ** 3;
}

function mostrar( num : number) : void{
  let cubo : number = alCubo(num);
  console.log(`El cubo de ${num} es ${cubo}`);
}

mostrar(4);
mostrar(6);
mostrar(3);