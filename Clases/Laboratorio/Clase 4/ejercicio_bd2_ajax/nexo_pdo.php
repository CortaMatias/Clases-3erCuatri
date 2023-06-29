<?php

require_once ("accesoDatos.php");
require_once ("Alumno_bd.php");

use ejercicio_bd\AccesoDatos;
use ejercicio_bd\Alumno_bd;
session_start();
//$alumno = isset($_POST['alumno']) ? $_POST['alumno'] : NULL;
$op = isset($_POST['accion']) ? $_POST['accion'] : NULL;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : NULL;
$legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : NULL;
$foto = isset($_FILES["foto"]["size"]) && $_FILES["foto"]["size"] > 0 ? $_FILES["foto"] : NULL;

  switch($op)
  {
      
      case "obtenerAlumnos" : 
        $alumnos = Alumno_bd::obtenerAlumnos();
        $tabla = "<table><tr><td>NOMBRE</td><td>APELLIDO</td><td>LEGAJO</td><td>FOTO</td></tr>";
        foreach($alumnos as $alumno){
          $tabla .= "<tr><td>{$alumno->nombre}</td><td>{$alumno->apellido}</td><td>{$alumno->legajo}</td><td>{$alumno->foto}</td></tr>";
        }
        $tabla .= "</table>";
        echo $tabla;
        break;

        case "eliminarAlumno":
          if(Alumno_bd::verificarAlumno($legajo)){
            //$retorno = Alumno_bd::eliminarAlumno($legajo);
            echo true;
          }else echo "0";          
          break;

      case "insertarAlumno":
        $alumno = new Alumno_bd();
        $alumno->nombre = $nombre;
        $alumno->apellido = $apellido;
        $alumno->foto = validarFoto($legajo);
        $alumno->legajo = $legajo;
        $alumno->insertarAlumno();
        echo "<h3> Alumno con legajo: $legajo agregado correctamente<h3/>";
        break;

      case "modificarAlumno":
          

          break;

     

      case "redirigir":


        break;
      
      default: 
        echo "<h3>Ingrese alguna accion para realizar <h3/>";
      break;

  }


  function validarFoto($legajo){
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    
      // Obtener la información del archivo
      $file_name = $_FILES['foto']['name'];
      $file_size = $_FILES['foto']['size'];
      $file_tmp = $_FILES['foto']['tmp_name'];
      $file_type = $_FILES['foto']['type'];
      $errors = "";
      
      // Obtener la extensión del archivo
      $file_ext_arr = explode('.',$_FILES['foto']['name']);
      $file_ext = strtolower(end($file_ext_arr));
      
      // Definir los formatos de archivo permitidos y el tamaño máximo permitido en bytes
      $allowed_extensions = array('jpg', 'jpeg', 'png');
      $max_file_size = 50 * 1024 * 1024; // 50 MB
      
      // Validar la extensión del archivo
      if(in_array($file_ext, $allowed_extensions) === false){
          $errors .= 'Error: La extensión del archivo no está permitida. Solo se permiten archivos de tipo JPG o PNG.';
      }
      
      // Validar el tamaño del archivo
      if($file_size > $max_file_size){
        $errors .= 'Error: El tamaño del archivo es mayor al permitido. El tamaño máximo permitido es de 50 MB.';
      }
      
      // Si no hay errores, renombrar y mover el archivo a la carpeta de destino
      if(empty($errors) == true){
          move_uploaded_file($file_tmp, "./fotos/".$legajo.".".$file_ext);
          echo "El archivo ".$file_name." ha sido cargado correctamente.";
          return "./fotos/".$legajo.".".$file_ext;
      } else echo $errors;
    } else echo 'Error: No se ha seleccionado un archivo para cargar.';
  }


?>

