<?php

  $archivoCopiar = isset($_POST["archivo"]) ? $_POST["archivo"] : NULL;

  $nuevoArchivo = "../archivos/" . date("Y_m_d_H_i_s") . ".txt";

  if(copy($archivoCopiar, $nuevoArchivo)) echo "Se copio correctamente el archivo en " . $nuevoArchivo;
  else echo "No se pudo copiar el archivo";

  $contenido = file_get_contents($archivoCopiar);
  $contenidoInvertido = strrev($contenido);

  if(file_put_contents($nuevoArchivo, $contenidoInvertido)) echo "El archivo copio el texto de manera invertida";
  else echo "Hubo un problema al copiar el archivo";


?>

