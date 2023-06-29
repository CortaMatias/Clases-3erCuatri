<?php

  namespace ejercicio_bd;
  use PDO;

  class Alumno_bd {

    public int $id;
    public int $legajo;
    public string $apellido;
    public string $nombre;
    public string $foto;

    public function mostrarAlumno() : string {
      return $this->id . " - ". $this->legajo . " - " . $this->apellido . " - " . $this->nombre . " - " . $this->foto ." - ";
    }
    

    public static function obtenerAlumnos()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT id,legajo,apellido,nombre,foto FROM alumnos");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Alumno_bd);                                                

        return $consulta;
    }

    public function insertarAlumno()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("INSERT INTO alumnos (legajo,apellido,nombre,foto)"
                                                    . "VALUES(:legajo, :apellido, :nombre, :foto)");
        
        $consulta->bindValue(':legajo', $this->legajo,  PDO::PARAM_INT);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->nombre,  PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);

        $consulta->execute();        
        return $consulta;
    }

    public function modificarAlumno()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("UPDATE alumnos SET apellido = :apellido, nombre = :nombre, foto = :foto WHERE legajo = :legajo");  

        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);

        return $consulta->execute();
    }

    public static function eliminarAlumno(int $legajo)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("DELETE FROM alumnos WHERE legajo = :legajo");
        
        $consulta->bindValue(':legajo', $legajo, PDO::PARAM_INT);

        return $consulta->execute();
    }

    public static function verificarAlumno(int $legajo)
    {    
        $existe = false;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT id,legajo,apellido,nombre,foto FROM alumnos");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Alumno_bd);          
        
        foreach($consulta as $alumno)
          if($alumno->legajo == $legajo)return true;         

        return $existe;
    }


    public static function decodeAlumno($alumno){
      $obj_alumno = json_decode($alumno);
      $addAlumno = new Alumno_bd();
      $addAlumno->nombre = $obj_alumno->nombre;
      $addAlumno->apellido = $obj_alumno->apellido;
      $addAlumno->legajo = $obj_alumno->legajo;
      $addAlumno->foto = $obj_alumno->foto;
      return $addAlumno;
    }



  }



?>