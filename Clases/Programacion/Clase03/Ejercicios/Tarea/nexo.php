<?php
  require_once "Alumno.php";

  
$accion = isset($_POST["accion"]) ? $_POST["accion"] : NULL;
//$accion = isset($_GET["accion"]) ? $_GET["accion"] : NULL;

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : NULL;
$legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : NULL;

 
  if($accion == "agregar"){  
    $alumno = new Alumno($nombre, $apellido, $legajo);
    if(Alumno::agregar($alumno)) echo "Alumno Agregado";
    else echo "Fallo";
  }  

  else if($accion == "listar"){
     $lista = Alumno::listar();
     echo $lista;
  }

  else if($accion == "verificar"){
    if(Alumno::verificar($legajo)) echo "Existe el alumno en la lista";
    else echo "No existe el alumno en la lista";
  }

  else if($accion == "modificar"){
    $alumno = new Alumno($nombre, $apellido, $legajo);
    if(Alumno::modificar($alumno)) {
      echo "El alumno con el legajo: {$legajo} fue modificado <br>";
      $lista = Alumno::listar();
      echo $lista;
    }else echo "El alumno con el legajo: 1legajo no se encuentra en la lista";    
  }

  else if ($accion == "borrar"){
    echo "Lista original: <br>";
    $lista = Alumno::listar();
      echo $lista;
    if(Alumno::borrar($legajo)) {
      echo "Alumno encontrado y borrado";
      $lista = Alumno::listar();
      echo $lista;
    }else echo "No se encontro un alumno con este legajo";
  }






?>