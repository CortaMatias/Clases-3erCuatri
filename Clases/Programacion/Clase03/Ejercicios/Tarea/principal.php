<?php    
  require_once "Alumno.php";

  session_start();
  echo "Redirigido <br>";

  if($_SESSION["nombre"] == "undefined"){
    echo "El alumno con el legajo {$_SESSION["legajo"]} no se encontro";
  }
  else {
    $alumno = new Alumno ($_SESSION["nombre"], $_SESSION["apellido"], $_SESSION["legajo"],$_SESSION["foto"]);
  
    echo "<h1>Legajo: " . $alumno->legajo . "</h1>";
    echo "<h2>Nombre: " . $alumno->nombre . " - Apellido: " . $alumno->apellido . "</h2>";
    echo "<img src='" . $alumno->foto . "' alt='Foto del Alumno' style=\"width: 100px; height: 100px;\" />";
  }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirigido</title>
</head>
<body>
  <hr>
  <style>
table {
  border-collapse: collapse; 
  width: 100%; 
}
td, th {
  border: 1px solid black;
  padding: 8px; 
  text-align: center;
}
</style>
  <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Legajo</th>
          <th>Foto</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $alumnos = Alumno::obtenerLista();
          foreach($alumnos as $alumno):       
        ?>
        <tr>
          <td><?php echo $alumno->nombre?></td>
          <td><?php echo $alumno->apellido?></td>
          <td><?php echo $alumno->legajo?></td>
          <td><?php echo $alumno->foto ?></td>          
        </tr>
        <?php endforeach?>
      </tbody>

  </table>
  <a href="./nexo_poo_foto.php" >Volver al Inicio</a>
</body>
</html>