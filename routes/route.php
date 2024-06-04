<?php
namespace routes;

use controllers\GameController;
use controllers\UserController;

$routes = [

    '' => [GameController::class, 'index'],
    'home' => [GameController::class, 'index'],
    'login-usuario' => [UserController::class, 'login'],
    'registro-de-usuario' => [UserController::class, 'add_user'],
    'cerrar-session' => [UserController::class, 'cerrar_session'],
    'pagina-principal' => [GameController::class, 'main_page'],
    'ruleta' => [GameController::class, 'ruleta'],
    'cartas' => [GameController::class, 'cartas'],
    'traga-monedas' => [GameController::class, 'traga_monedas'],
    'actualizar-ranking' => [GameController::class, 'get_ranking'],
    'guardar-juego' => [GameController::class, 'save_game'],

];