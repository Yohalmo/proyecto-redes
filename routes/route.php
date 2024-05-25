<?php
$routes = [

    '' => ['GameController', 'index'],
    'home' => ['GameController', 'index'],
    'login-usuario' => ['UserController', 'login'],
    'registro-de-usuario' => ['UserController', 'add_user'],
    'pagina-principal' => ['GameController', 'main_page'],
    'ruleta' => ['GameController', 'ruleta'],
    'actualizar-ranking' => ['GameController', 'get_ranking'],
    'guardar-juego' => ['GameController', 'save_game'],

];