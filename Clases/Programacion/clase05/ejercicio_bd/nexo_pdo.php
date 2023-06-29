<?php

require_once ("accesoDatos.php");
require_once ("Alumno_bd.php");

use ejercicio_bd\AccesoDatos;
use ejercicio_bd\Alumno_bd;


$op = isset($_POST['op']) ? $_POST['op'] : NULL;
$alumno = isset($_POST['alumno']) ? $_POST['alumno'] : NULL;

  switch($op)
  {

      case "obtenerAlumnos" : 

        $alumnos = Alumno_bd::obtenerAlumnos();

        foreach($alumnos as $alumno){
          print_r($alumno->mostrarAlumno());
          print("\n");
        }

        break;

      case "insertarAlumno":
        if(isset($alumno)){
          $addAlumno = Alumno_bd::decodeAlumno($alumno);
          if(!Alumno_bd::verificarAlumno($addAlumno->legajo)){
            $addAlumno->insertarAlumno();
          }          
          else echo "ya existe un alumno con ese legajo en la base de datos";
        }

        break;

      case "modificarAlumno" :
        if(isset($alumno)){
          $alumnoModificar = Alumno_bd::decodeAlumno($alumno);
          if(Alumno_bd::verificarAlumno($alumnoModificar->legajo)){
            $alumnoModificar->modificarAlumno();
          }
          else echo "El alumno no se encuentra en la base de datos";
        }

          break;

      case "borrarAlumno":
        if(isset($alumno)){
          $alumnoEliminar = Alumno_bd::decodeAlumno($alumno);
          if(Alumno_bd::verificarAlumno($alumnoEliminar->legajo)){
            Alumno_bd::eliminarAlumno($alumnoEliminar->legajo);
          }
          else echo "El alumno no se encuenta en la base de datos";

          break;
        }

  }


?>