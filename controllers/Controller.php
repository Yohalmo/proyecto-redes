<?php

class Controller extends DBContext{
    
    public function __construct() {
        parent::__construct();
        session_start();
    }

    protected function view($vista, $datos = []){
        extract($datos);
        include ('../views/' . str_replace('.', '/', $vista) . '.php');
        die();
    }

    protected function get_session($campo){
        $info = $_SESSION[$campo] ?? '';

        if(is_array($info) || is_object($info)){
            $info = unserialize(${'info'});
        }

        return $info;
    }

    protected function put_session($campo, $datos){
        if(is_array($datos) || is_object($datos)){
            $datos = serialize($datos);
        }

        $_SESSION[$campo] = serialize($datos);
    }
    
    protected function validate_inputs($campos, $request){
        foreach($campos as $campo){
            if(!isset($request->$campo)){
                return false;
            }
        }
    }
    
    protected function response_message($datos, $code = 200){
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($datos);
        die();
    }
}