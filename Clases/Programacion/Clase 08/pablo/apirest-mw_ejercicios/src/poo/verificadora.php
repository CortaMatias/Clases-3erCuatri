<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response as ResponseMW;

class Verificadora
{

    public function VerificarUsuario(Request $request, RequestHandler $handler) : ResponseMW
    {
		$params = $request->getParsedBody();
		$datos = $params['obj_json'];
		$datos = json_decode($datos);

		//GENERO UNA NUEVA RESPUESTA
		$response = new ResponseMW();

		if(Usuario::verificarUsuario($datos)){
				$response = $handler->handle($request);
		}else{
			$response = $response->withStatus(403,"ERROR");
		}

		return $response;
    }

}