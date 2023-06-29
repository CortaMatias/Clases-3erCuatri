namespace Prueba {

  export class Alumno extends Persona {
    protected legajo:number;

    public constructor (legajo:number, apellido:string, nombre:string){
      super(apellido, nombre);     
      this.legajo = legajo;     
    }
    
    public set Legajo(value:number){
      this.legajo = value;
    }
    public get Legajo(){
      return this.legajo;
    }

    public set Apellido(value:string){
      this.apellido = value;
    }

    public get Apellido(){
      return this.apellido;
    }

    public set Nombre(value:string){
      this.nombre = value;
    }

    public get Nombre(){
      return this.nombre;
    }

    public ToString(): string {
      return super.ToString() + " Legajo: " + this.legajo;
    }
  }
}