<?php

include '../routes/route.php';
include '../config/Request.php';
include '../database/dbcontext.php';
include '../controllers/Controller.php';

$ruta = $_SERVER['REQUEST_URI'];
$datos = explode('?', $ruta)[0] ?? [''];
$datos = explode('/', $datos);
$params = [];

$server = explode('/public/', $_SERVER['SCRIPT_NAME']);
$server = $server[0];
$server = str_replace('/', '', $server);

foreach($datos as  $item){
    if($item != '' && $item != $server){
        $params[] = $item;
    }
}

$nparams = count($params);
$ruta = $params[0] ?? '';
$instancia = [];

if(isset($params[0])){
    unset($params[0]);
    $nparams--;
}

foreach($routes as $key => $route){
    $subruta = explode('/', $key);
    
    if($subruta[0] == $ruta && (count($subruta) - 1) == $nparams){
        $instancia = $route;
        break;
    }
}

if(!count($instancia)){
    http_response_code(404);
    die();
}

include "../controllers/{$instancia[0]}.php";

$request = new Request();
$class = new $instancia[0]();

$reflector = new ReflectionMethod($class, $instancia[1]);
$params = $reflector->getParameters();
$parametros = $datos = [];
$contador = 0;

foreach ($params as $param) {
    if ($param->getType() == Request::class) {
        $parametros[] = $request;
    }else{
        $parametros[] = $datos[$contador];
        $contador++;
    }
}

call_user_func_array(array($class, $instancia[1]), $parametros);