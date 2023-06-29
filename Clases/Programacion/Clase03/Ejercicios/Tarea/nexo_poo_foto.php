<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejemplo de formulario con 5 campos input</title>
  </head>
  <body>
    <form method="POST" action="nexo_poo_foto.php">
      <label for="campo1">Accion:</label>
      <input type="text" id="campo1" name="accion"><br><br>
      
      <label for="campo2">Nombre:</label>
      <input type="text" id="campo2" name="nombre"><br><br>
      
      <label for="campo3">Apellido:</label>
      <input type="text" id="campo3" name="apellido"><br><br>
      
      <label for="campo4">Legajo:</label>
      <input type="text" id="campo4" name="legajo"><br><br>
      
      <label for="campo5">Foto:</label>
      <input type="text" id="campo5" name="foto"><br><br>
      
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>


<?php
require_once "Alumno.php";

session_start();


  $accion = isset($_POST["accion"]) ? $_POST["accion"] : NULL;
  //$accion = isset($_GET["accion"]) ? $_GET["accion"] : NULL;
  
  $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : NULL;
  $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : NULL;
  $legajo = isset($_POST["legajo"]) ? $_POST["legajo"] : NULL;
  $foto = isset($_POST["foto"]) ? $_POST["foto"] : NULL;


if ($accion == "agregar") {
  $alumno = new Alumno($nombre, $apellido, $legajo, $foto);
  if (Alumno::agregar($alumno)) echo "Alumno Agregado";
  else echo "Fallo";
} 

else if ($accion == "listar") {
  $lista = Alumno::listar();
  echo $lista;
} 

else if ($accion == "verificar") {
  if (Alumno::verificar($legajo)) echo "Existe el alumno en la lista";
  else echo "No existe el alumno en la lista";
} 

else if ($accion == "modificar") {
  $alumno = new Alumno($nombre, $apellido, $legajo, $foto);
  if (Alumno::modificar($alumno)) {
    echo "El alumno con el legajo: {$legajo} fue modificado <br>";
    $lista = Alumno::listar();
    echo $lista;
  } else echo "El alumno con el legajo: 1legajo no se encuentra en la lista";
}

else if ($accion == "borrar") {
  echo "Lista original: <br>";
  $lista = Alumno::listar();
  echo $lista;
  if (Alumno::borrar($legajo)) {
    echo "Alumno encontrado y borrado <br>";
    $lista = Alumno::listar();
    echo $lista;
  } else echo "No se encontro un alumno con este legajo";
}

else if ($accion == "obtener") {
  $alumno = Alumno::obtener($legajo);
  if (isset($alumno)) {
    echo "Alumno Encontrado: ";
    echo $alumno->toString();
  } else echo "NO hay un alumno con ese legajo";
} 

else if ($accion == "redirigir") {
  
  $alumno = Alumno::obtener($legajo);
  if (isset($alumno)) {    
    $_SESSION["nombre"] =  $alumno->nombre;
    $_SESSION["apellido"] =  $alumno->apellido;
    $_SESSION["legajo"] =  $alumno->legajo;
    $_SESSION["foto"] =  $alumno->foto;
    header("location: principal.php");
  } else {
    $_SESSION["legajo"] = $legajo;
    $_SESSION["nombre"] = "undefined";
    header("location: principal.php");
  };
}

?>