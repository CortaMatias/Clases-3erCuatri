function opcional(num : number, cadena? : string ) : void {
  if(cadena)
    for(let i = 0 ; i < num; i++) console.log(cadena);
  else console.log(num);  
}

opcional(3, "JAJAJA");
opcional(5);