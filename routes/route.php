<?php
$routes = [

    '' => ['GameController', 'index'],
    'login-usuario' => ['UserController', 'login_usuario'],
    'juego-principal' => ['GameController', 'index'],
    'actualizar-ranking' => ['GameController', 'get_ranking'],

];