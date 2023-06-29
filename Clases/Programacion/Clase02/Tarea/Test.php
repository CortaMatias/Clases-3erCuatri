<?php
  require_once "Mascota.php";
  require_once "Guarderia.php";

  $mascota1 =  new Mascota("Pedrito", "Buffalo");
  $mascota2 =  new Mascota("Pedrito", "Buffalo", 9);
  $mascota3 =  new Mascota("Juan", "Perro", 5);
  $mascota4 =  new Mascota("Juan", "Perro", 8);

  $guarderia = new Guarderia("La guarderia de Pancho");

  echo $mascota1->toString();
  echo "<hr>";
  echo Mascota::mostrar($mascota2);
  echo "<hr>";
   if($mascota1->equals($mascota2)) echo "Iguales";
  else echo "Distintos";
  echo "<hr>";
  echo $mascota3->toString();
  echo "<hr>";
  echo Mascota::mostrar($mascota4);
  echo "<hr>";
  if($mascota3->equals($mascota4)) echo "Iguales";
  else echo "Distintos";
  echo "<hr>";
  if($mascota1->equals($mascota3)) echo "Iguales";
  else echo "Distintos";
  echo "<hr>";

  if($guarderia->add($mascota1)) echo "agregado";
  else echo "Ya esta";
  echo "<hr>";
  if($guarderia->add($mascota2)) echo "agregado";
  else echo "Ya esta";
  echo "<hr>";
  if($guarderia->add($mascota3)) echo "agregado";
  else echo "Ya esta";
  echo "<hr>";
  if($guarderia->add($mascota4)) echo "agregado";
  else echo "Ya esta";
  echo "<hr>";
 
  echo $guarderia->toString();


?>