<?php

  class Alumno {

    public string $accion;
    public string $nombre;
    public string $apellido;
    public string $legajo;
		public string $foto;

    public function __construct(string $nombre, string $apellido, string $legajo, string $foto = "/imagen.svg")
    {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->legajo= $legajo;
			$this->foto = $foto;
    }

    public function toString(){
      echo "Nombre: " . $this->nombre . " Apellido: " . $this->apellido . " Legajo: " . $this->legajo . " Foto: " . $this->foto;
    }

    public static function agregar(Alumno $obj) : bool {

      $retorno = false;
  
      //ABRO EL ARCHIVO
      $ar = fopen("./archivos/alumnos.txt", "a");//A - append
  
      //ESCRIBO EN EL ARCHIVO CON FORMATO: legajo-VALOR_UNO-VALOR_DOS
      $cant = fwrite($ar, "{$obj->nombre}-{$obj->apellido}-{$obj->legajo}-{$obj->foto}\r\n");
  
      if($cant > 0)      
        $retorno = true;	

      //CIERRO EL ARCHIVO
      fclose($ar);
  
      return $retorno;
    }


    public static function listar() : string {

      $retorno = "";
  
      //ABRO EL ARCHIVO
      $ar = fopen("./archivos/alumnos.txt", "r");
  
      //LEO LINEA X LINEA DEL ARCHIVO 
      while(!feof($ar))
      {
        $retorno .= fgets($ar) . "<br>";		
      }
  
      //CIERRO EL ARCHIVO
      fclose($ar);
  
      return $retorno;
    }

		public static function obtenerLista() : ?array {
			$elementos = array();
			$alumnos = array();

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "r");

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
		
			$array_linea = explode("-", $linea);

			$array_linea[0] = trim($array_linea[0]);

			if($array_linea[0] != ""){

				//RECUPERO LOS CAMPOS
				$nombre = trim($array_linea[0]);
				$apellido = trim($array_linea[1]);
				$valor_legajo = trim($array_linea[2]);
				$valor_foto = trim($array_linea[3]);			
				$alumno = new Alumno($nombre,$apellido,$valor_legajo,$valor_foto);
				array_push($alumnos, $alumno);						
			}
		}
		fclose($ar);
		return $alumnos;
		}

    public static function verificar(string $legajo) : bool{
		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "r");
    $retorno = false;

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
		
			$array_linea = explode("-", $linea);

			$array_linea[0] = trim($array_linea[0]);

			if($array_linea[0] != ""){
				//RECUPERO LOS CAMPOS		
				$valor_legajo = trim($array_linea[2]);
				if ($legajo == $valor_legajo){
					$retorno = true;  
				}       
      }
    }
    return $retorno;
  }

  public static function modificar(Alumno $obj) : bool {

		$retorno = false;

		$elementos = array();

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "r");

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
		
			$array_linea = explode("-", $linea);

			$array_linea[0] = trim($array_linea[0]);

			if($array_linea[0] != ""){
				//RECUPERO LOS CAMPOS
				$nombre = trim($array_linea[0]);
				$apellido = trim($array_linea[1]);
				$legajo = trim($array_linea[2]);
				$foto = trim($array_linea[3]);

				if ($legajo == $obj->legajo) {					
					array_push($elementos, "{$obj->nombre}-{$obj->apellido}-{$obj->legajo}-{$obj->foto}\r\n");
				}
				else{
					array_push($elementos, "{$nombre}-{$apellido}-{$legajo}-{$obj->foto}\r\n");
				}
			}
		}

		//CIERRO EL ARCHIVO
		fclose($ar);

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "w");

		$cant = 0;
		
		//ESCRIBO EN EL ARCHIVO
		foreach($elementos AS $item)
			$cant = fwrite($ar, $item);
		

		if($cant > 0)		
			$retorno = true;			
		
		//CIERRO EL ARCHIVO
		fclose($ar);

		return $retorno;
	}

	public static function obtener (int $legajo ) : ?Alumno{

		$elementos = array();

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "r");

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
		
			$array_linea = explode("-", $linea);

			$array_linea[0] = trim($array_linea[0]);

			if($array_linea[0] != ""){

				//RECUPERO LOS CAMPOS
				$nombre = trim($array_linea[0]);
				$apellido = trim($array_linea[1]);
				$valor_legajo = trim($array_linea[2]);
				$valor_foto = trim($array_linea[3]);

				if ($valor_legajo == $legajo) {
					$alumnno = new Alumno($nombre,$apellido,$valor_legajo,$valor_foto);
					fclose($ar);
					return $alumnno;		
				}				
			}
		}		
		return null;
		}

  public static function borrar(int $legajo) : bool {

		$retorno = false;

		$elementos = array();

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "r");

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
		
			$array_linea = explode("-", $linea);

			$array_linea[0] = trim($array_linea[0]);

			if($array_linea[0] != ""){

				//RECUPERO LOS CAMPOS
				$nombre = trim($array_linea[0]);
				$apellido = trim($array_linea[1]);
				$valor_legajo = trim($array_linea[2]);
				$valor_foto = trim($array_linea[3]);

				if ($valor_legajo == $legajo) {
					$retorno = true;
					continue;
				}

				array_push($elementos, "{$nombre}-{$apellido}-{$valor_legajo}-{$valor_foto}\r\n");
			}
		}

		//CIERRO EL ARCHIVO
		fclose($ar);

		$cant = 0;

		//ABRO EL ARCHIVO
		$ar = fopen("./archivos/alumnos.txt", "w");

		//ESCRIBO EN EL ARCHIVO
		foreach($elementos AS $item)
			$cant = fwrite($ar, $item);

		//CIERRO EL ARCHIVO
		fclose($ar);

		return $retorno;
	}

}

	

?>