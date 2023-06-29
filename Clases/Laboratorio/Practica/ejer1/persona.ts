namespace Prueba {
  export abstract class Persona {

    protected apellido: string;
    protected nombre: string;

    public constructor(apellido: string, nombre: string) {
      this.apellido = apellido;
      this.nombre = nombre;
    }

    public abstract set Apellido(value: string);
    public abstract get Apellido();
    public abstract set Nombre(value: string);
    public abstract get Nombre();

    public ToString() {
      return "Nombre: " + this.nombre + " Apellido: " + this.apellido;
    }

  }
}