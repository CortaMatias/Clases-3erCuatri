<?php
require_once "Alumno_bd.php";
require_once "accesoDatos.php";
use ejercicio_bd\Alumno_bd;

session_start();
  $alumno = json_decode($_SESSION["alumno"]);

session_destroy();  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<label>Alumno buscado:</label>
<div style="display: flex; justify-content: center;">

<div style="text-align: center;">
  <h2><?php echo $alumno->nombre . " " . $alumno->apellido; ?></h2>
  <h2><?php echo "Legajo: " . $alumno->legajo; ?></h2>
  <img style="width: 100px; height: 100px;" src="<?php echo $alumno->foto;?>" alt="Imagen de <?php echo $alumno->nombre; ?>">
</div>
</div>
<hr>
  <style>
table {
  border-collapse: collapse; 
  width: 80%; 
  padding: 10px;
  margin: 50px auto;
  text-align: center;
}
td, th {
  border: 1px solid black;
  padding: 8px; 
  text-align: center;
}
</style>
  <label>Tabla con los alumnos ingresados</label>
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
          $alumnos = Alumno_bd::obtenerAlumnos();
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
  <a href="./nexo_pdo.php" >Volver al Inicio</a>
</body>
</html>