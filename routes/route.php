<?php
$routes = [

    '' => ['GameController', 'index'],
    'login-usuario' => ['UserController', 'login'],
    'registro-de-usuario' => ['UserController', 'add_user'],
    'pagina-principal' => ['GameController', 'main_page'],
    'ruleta' => ['GameController', 'ruleta'],
    'actualizar-ranking' => ['GameController', 'get_ranking'],

];