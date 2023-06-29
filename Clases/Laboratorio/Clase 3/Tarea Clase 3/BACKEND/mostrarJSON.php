<?php

  $data = isset($_POST["productos"]) ? $_POST["productos"] : NULL;

  if($data != NULL) $productos = json_decode($data);
  else $productos  = "VACIO";

  echo("DESDE PHP" . $data);