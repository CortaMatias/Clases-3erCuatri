<?php

  class Enigma {

    public static function Encriptar($mensaje, $archivo) : bool {
      $mensajeEncriptado = "";
      for($i = 0; $i < strlen($mensaje); $i++){
        $codigoASCII = ord($mensaje[$i]);
        $codigoEncriptado = $codigoASCII + 200;
        $mensajeEncriptado .= chr($codigoEncriptado);
      }
      if(file_put_contents($archivo, $mensajeEncriptado)!== false) return true;
      else return false;      
    }

    public static function Desencriptar ($archivo) : string {
      $mensajeEncriptado = file_get_contents($archivo);

      $mensajeDesencriptado = "";

      for($i = 0; $i < strlen($mensajeEncriptado); $i++){
        $codigoEncriptado = ord($mensajeEncriptado[$i]);
        $codigoASCII = $codigoEncriptado - 200;
        $mensajeDesencriptado .= chr($codigoASCII);
      }
      return $mensajeDesencriptado;
    }
  }

  $mensaje = isset($_POST["mensaje"]) ? $_POST["mensaje"] : NULL;
  $archivo = isset($_POST["archivo"]) ? $_POST["archivo"] : NULL;
 
  echo Enigma::Desencriptar($archivo);

?>