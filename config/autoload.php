<?php 

spl_autoload_register(function ($class) {

    $clase = explode('\\', $class);

    for($i = 0; $i < count($clase) - 1; $i++){
        $clase[$i] = strtolower($clase[$i]);
    }

    $class = implode('/', $clase);

    $base_dir = '../';
    $file = $base_dir . $class . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});