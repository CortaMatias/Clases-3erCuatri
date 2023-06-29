<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">

  <label for="accion">Accion:</label>
  <input type="text" id="accion" name="accion"><br><br>

  <label for="legajo">Legajo:</label>
  <input type="text" id="legajo" name="legajo"><br><br>
  
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br><br>
  
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido"><br><br>
  
  <label for="foto">Foto:</label>
  <input type="file" id="foto" name="foto" accept=".png, .jpg" max-size="50000000000"><br><br>
  
  <input type="submit" value="Enviar">
</form>
</body>
</html>


<?php

require_once ("accesoDatos.php");
require_once ("Alumno_bd.php");

use ejercicio_bd\AccesoDatos;
use ejercicio_bd\Alumno_bd;

session_start();


$op = isset($_POST['accion']) ? $_POST['accion'] : NULL;
//$alumno = isset($_POST['alumno']) ? $_POST['alumno'] : NULL;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : NULL;
$legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : NULL;
$foto = isset($_FILES["foto"]["size"]) && $_FILES["foto"]["size"] > 0 ? $_FILES["foto"] : NULL;

  switch($op)
  {

      case "obtenerAlumnos" : 

        $alumnos = Alumno_bd::obtenerAlumnos();

        foreach($alumnos as $alumno){
          echo "<h1>Legajo: " . $alumno->legajo . "</h1>";
          echo "<h2>Nombre: " . $alumno->nombre . " - Apellido: " . $alumno->apellido . "</h2>";
          echo "<img src='" . $alumno->foto . "' alt='Foto del Alumno' style=\"width: 100px; height: 100px;\" />";
          echo "<hr><hr/>";
          //echo($alumno->mostrarAlumno());
          //echo("\n");
        }

        break;

      case "insertarAlumno":
        if($foto == NULL || $legajo == NULL || $apellido == NULL || $nombre == NULL){
          echo "Rellene todos los campos";
        }else {
          if(Alumno_bd::verificarAlumno($legajo)){
            echo "Ya existe un alumno con este legajo";
          }else {
            $alumno = new Alumno_bd();
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $alumno->foto = validarFoto($legajo);
            $alumno->legajo = $legajo;
            $alumno->insertarAlumno();
            echo "<h3> Alumno con legajo: $legajo agregado correctamente<h3/>";
          }

        }  

        break;

      case "modificarAlumno":
        if($foto == NULL || $legajo == NULL || $apellido == NULL || $nombre == NULL){
          echo "Rellene todos los campos";
        }else {
          if(Alumno_bd::verificarAlumno($legajo)){
            $alumno = new Alumno_bd();
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $alumno->foto = validarFoto($legajo);
            $alumno->legajo = $legajo;
            $alumno->modificarAlumno();
            echo "<h3> Alumno con legajo: $legajo modificado correctamente<h3/>";
          }else {
            echo "<h3> No se encontro al Alumno con legajo: $legajo <h3/>";
          }

        }  

          break;

      case "borrarAlumno":
          if($legajo != NULL){
            if(Alumno_bd::verificarAlumno($legajo) ==  true) {
              Alumno_bd::eliminarAlumno($legajo);
              echo "<h3>Alumno borrado <h3/>"; 
            } else echo  "<h3>No existe un alumno con ese legajo <h3/>";
          }
          break;

      case "redirigir":
        if($legajo != NULL){
          if(Alumno_bd::verificarAlumno($legajo)){
            $alumno  = Alumno_bd::obtenerAlumno($legajo);
            $alumnoJson = json_encode($alumno);
            $_SESSION["alumno"] = $alumnoJson;
            $alumnos = Alumno_bd::obtenerAlumnos();
            $alumnosJson = json_encode($alumnos);
            $_SESSION["alumnos"] = $alumnosJson;
            header("location: principal.php");
          }else echo "<h3> No hay un alumno con este legajo <h3/>";          
        } echo "<h3> Ingrese un legajo para redirigir <h3/>";  

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

