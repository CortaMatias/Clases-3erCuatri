<?php
require "Auto.php";

  $auto1 = new Auto("Peugeot", "Rojo");
  $auto2 = new Auto("Peugeot", "Rojo");
  $auto3 =  new Auto("Renault", "Violeta", 300);
  $auto4 =  new Auto("Renault", "Violeta", 400);
  $auto5 = new Auto("Peugeot", "Azul", 200, new DateTime("2000-01-01"));
  $auto6 = new Auto("Peugeot", "Rojo", 300, new DateTime("2000-01-01"));

  
  $auto1->AgregarImpuestos(1500);
  $auto2->AgregarImpuestos(1500);
  $auto3->AgregarImpuestos(1500);
  
  Auto::Add($auto1, $auto2);
  Auto::Add($auto1, $auto5);
  Auto::Add($auto1, $auto6);

  Auto::MostrarAuto($auto1);
  Auto::MostrarAuto($auto3);
  Auto::MostrarAuto($auto5);


?>
