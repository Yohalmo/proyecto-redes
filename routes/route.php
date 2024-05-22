<?php
$routes = [

    '' => ['GameController', 'index'],
    'juegos' => ['GameController', 'games'],
    'login-usuario' => ['UserController', 'login'],
    'registro-de-usuario' => ['UserController', 'add_user'],
    'juego-principal' => ['GameController', 'index'],
    'actualizar-ranking' => ['GameController', 'get_ranking'],

];