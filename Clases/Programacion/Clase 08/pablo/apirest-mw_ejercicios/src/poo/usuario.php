<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once "accesoDatos.php";

class Usuario
{
	public int $id;
 	public string $nombre;
  	public string $apellido;
    public string $correo;
    public string $foto;
  	public int $id_perfil;
    public string $clave;

//*********************************************************************************************//
/* IMPLEMENTO LAS FUNCIONES PARA SLIM */
//*********************************************************************************************//

	public function TraerTodos(Request $request, Response $response, array $args): Response 
	{
		$todosLosUsuarios = Usuario::traerTodoLosUsuarios();
		$response = $response->withStatus(200, "OK");
		$response->withHeader('Content-Type', 'application/json');
		$response->getBody()->write(json_encode($todosLosUsuarios));
		return 	$response;
	}


	public static function traerTodoLosUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->retornarConsulta("select id, nombre, apellido, correo,foto,id_perfil,clave from usuarios");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
	}

	public static function verificarUsuario($datos) //traerUnCd
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->retornarConsulta("select id, nombre, apellido, correo,foto,id_perfil,clave from usuarios where correo = :correo and clave = :clave");
		$consulta->bindValue(':correo', $datos->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $datos->clave, PDO::PARAM_STR);
		$consulta->execute();
		$usuarioBuscado = $consulta->fetchObject('usuario');
		return $usuarioBuscado  && $usuarioBuscado->correo === $datos->correo && $usuarioBuscado->clave === $datos->clave;		
	}
	

}