<?php

use FastRoute\RouteParser\StdTest;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response as ResponseMW;

use Slim\Factory\AppFactory;
use \Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


//*********************************************************************************************//
//EJERCICIO 1:
//AGREGAR EL GRUPO /CREDENCIALES CON LOS VERBOS GET Y POST (MOSTRAR QUE VERBO ES)
//AL GRUPO, AGREGARLE UN MW QUE, DE ACUERDO EL VERBO, VERIFIQUE CREDENCIALES O NO. 
//GET -> NO VERIFICA (INFORMARLO). ACCEDE AL VERBO.
//POST-> VERIFICA; SE ENVIA: NOMBRE Y PERFIL.
//*-SI EL PERFIL ES 'ADMINISTRADOR', MUESTRA EL NOMBRE Y ACCEDE AL VERBO.
//*-SI NO, MUESTRA MENSAJE DE ERROR. NO ACCEDE AL VERBO.
//*********************************************************************************************//

$app->group('/credenciales', function (RouteCollectorProxy $grupo) {

  //EN LA RAIZ DEL GRUPO
  $grupo->get('/', function (Request $request, Response $response, array $args): Response {

    $response->getBody()->write("-GET- En el raíz del grupo...");
    return $response;

  });

  $grupo->post('/', function (Request $request, Response $response, array $args): Response {

    $response->getBody()->write("-POST- En el raíz del grupo...");
    return $response;

  });

})->add(function(Request $request, RequestHandler $handler) : ResponseMW {

  //EJECUTO ACCIONES ANTES DE INVOCAR AL SIGUIENTE MW
  $contenidoAPI = "";
  $accesoAlVerbo = true;

  if($request->getMethod()==="GET"){
    $antes = " NO necesita credenciales para GET  <br><br>";
  }else{
    $antes = " Verifico credenciales:  <br><br>";
    $postData = $request->getParsedBody();

    // Acceder a los parámetros POST individuales
    $nombre = $postData['nombre'];
    $perfil = $postData['perfil'];
    if($perfil === "Administrador"){
      $antes .= "<h1> Bienvenido $nombre </h1><br>";
    }else{
      $antes .= "<h1> No tienes habilitado el ingreso </h1><br>";
      $accesoAlVerbo = false;
    }
  }

  if($accesoAlVerbo){
    //INVOCO AL SIGUIENTE MW
    $response = $handler->handle($request);

    //OBTENGO LA RESPUESTA DEL MW
    $contenidoAPI = (string) $response->getBody();
  }

  //GENERO UNA NUEVA RESPUESTA
  $response = new ResponseMW();

  //EJECUTO ACCIONES DESPUES DE INVOCAR AL SIGUIENTE MW
  $despues = "<br>Vuelvo del verificador de credenciales <br>";

  $response->getBody()->write("{$antes} {$contenidoAPI} <br> {$despues}");

  return $response;
});

//*********************************************************************************************//
//EJERCICIO 2:
//AGREGAR EL GRUPO /JSON CON LOS VERBOS GET Y POST. RETORNA UN JSON (MENSAJE, STATUS)
//AL GRUPO, AGREGARLE UN MW QUE, DE ACUERDO EL VERBO, VERIFIQUE CREDENCIALES O NO. 
//GET -> NO VERIFICA. ACCEDE AL VERBO. RETORNA {"API => GET", 200}.
//POST-> VERIFICA; SE ENVIA (JSON): OBJ_JSON, CON NOMBRE Y PERFIL.
//*-SI EL PERFIL ES 'ADMINISTRADOR', ACCEDE AL VERBO. RETORNA {"API => POST", 200}.
//*-SI NO, MUESTRA MENSAJE DE ERROR. NO ACCEDE AL VERBO. {"ERROR. NOMBRE", 403}
//*********************************************************************************************//

$app->group('/json', function (RouteCollectorProxy $grupo) {

  $grupo->get('/', function (Request $request, Response $response, array $args): Response {

    $datos = new stdclass();

    $datos->mensaje = "API => GET";

    $newResponse = $response->withStatus(200);
  
    $newResponse->getBody()->write(json_encode($datos));

    return $newResponse->withHeader('Content-Type', 'application/json');

  });

  $grupo->post('/', function (Request $request, Response $response, array $args): Response {

    $datos = new stdclass();

    $datos->mensaje = "API => POST";

    $newResponse = $response->withStatus(200);
  
    $newResponse->getBody()->write(json_encode($datos));

    return $newResponse->withHeader('Content-Type', 'application/json');

  });

})->add(function(Request $request, RequestHandler $handler) : ResponseMW {

  //EJECUTO ACCIONES ANTES DE INVOCAR AL SIGUIENTE MW
  $contenidoAPI = "";
  $accesoAlVerbo = true;

  if($request->getMethod()==="POST"){
    $postData = $request->getParsedBody();

    // Acceder a los parámetros POST individuales
    $nombre = $postData['nombre'];
    $perfil = $postData['perfil'];
    if($perfil !== "Administrador"){
      $contenidoAPI = new stdClass();
      $contenidoAPI->mensaje = "ERROR, $nombre sin permisos";
      $contenidoAPI = json_encode($contenidoAPI);
      $accesoAlVerbo = false;
    }
  }

  if($accesoAlVerbo){
    //INVOCO AL SIGUIENTE MW
    $response = $handler->handle($request);

    //OBTENGO LA RESPUESTA DEL MW
    $contenidoAPI = (string) $response->getBody();
  }

  //GENERO UNA NUEVA RESPUESTA
  $response = new ResponseMW();

  $response->getBody()->write($contenidoAPI);

  return $response;
});

//*********************************************************************************************//
//EJERCICIO 3:
//AGREGAR EL GRUPO /JSON_BD CON LOS VERBOS GET Y POST (A NIVEL RAIZ). 
//GET Y POST -> TRAEN (EN FORMATO JSON) TODOS LOS USUARIO DE LA BASE DE DATOS. USUARIO->TRAERTODOS().
//AGREGAR UN MW, SOLO PARA POST, QUE VERIFIQUE AL USUARIO (CORREO Y CLAVE).
//POST-> VERIFICADORA->VERIFICARUSUARIO(); SE ENVIA(JSON): OBJ_JSON, CON CORREO Y CLAVE.
//*-SI EXISTE EL USUARIO EN LA BASE DE DATOS (VERIFICADORA::EXISTEUSUARIO($OBJ)), ACCEDE AL VERBO.
//*-SI NO, MUESTRA MENSAJE DE ERROR. NO ACCEDE AL VERBO. {"ERROR.", 403}
//*********************************************************************************************//

require_once __DIR__ . '/../src/poo/accesodatos.php';
require_once __DIR__ . '/../src/poo/usuario.php';
require_once __DIR__ . '/../src/poo/verificadora.php';

$app->group('/json_bd', function (RouteCollectorProxy $grupo) {

  $grupo->get('[/]', \Usuario::class . ':TraerTodos'); 

  $grupo->post('[/]', \Usuario::class . ':TraerTodos')->add(\Verificadora::class . ":VerificarUsuario");  

})->add(function(Request $request, RequestHandler $handler) : ResponseMW {
    $contenidoAPI = new stdClass();
    $contenidoAPI->mensaje = "";
    $hayMensaje=true;
    $params = $request->getParsedBody();

    $response = new ResponseMW();
    $response = $response->withStatus(403,"ERROR");

    if($request->getMethod()==="POST"){
      if(isset($params['obj_json'])){
        $datos = $params['obj_json'];
        $datos = json_decode($datos);
        if(!isset($datos->correo)){
          $contenidoAPI->mensaje = "Falta atributo correo!!!";
        }
        if(!isset($datos->clave)){
          $contenidoAPI->mensaje .= "Falta atributo clave!!!";
        }
        if(isset($datos->correo) && isset($datos->clave)){
          $response = $response->withStatus(200,"OK");
          $response = $handler->handle($request);
          $hayMensaje = false;
        } 
      }else{
        $contenidoAPI->mensaje = "Falta parametro obj_json!!!";
      }
      
    }else{
        $response = $response->withStatus(200,"OK");
        $response = $handler->handle($request);
        $hayMensaje = false;
    }

    if($hayMensaje)
      $response->getBody()->write(json_encode($contenidoAPI));
    
    return $response;
});


//*********************************************************************************************//
//EJERCICIO 4:
//AL EJERCICIO ANTERIOR:
//AGREGAR, A NIVEL DE GRUPO, UN MW QUE VERIFIQUE:
//GET-> ACCEDE AL VERBO. (NO HACE NADA NUEVO).
//POST-> VERIFICA SI FUE ENVIADO EL PARAMETRO 'OBJ_JSON'.
//*-SI NO, MUESTRA MENSAJE DE ERROR. NO ACCEDE AL VERBO. {"ERROR.", 403}
//*-SI FUE ENVIADO, VERIFICA SI EXISTEN LOS PARAMETROS 'CORREO' Y 'CLAVE'.
//*-*-SI ALGUNO NO EXISTE (O LOS DOS), MUESTRA MENSAJE DE ERROR. NO ACCEDE AL VERBO. {"ERROR.", 403}
//*-SI EXISTEN, ACCEDE AL VERBO.
//*********************************************************************************************//




//CORRE LA APLICACIÓN.
$app->run();