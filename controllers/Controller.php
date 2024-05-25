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
        return unserialize($info);
    }

    protected function put_session($campo, $datos){
        $_SESSION[$campo] = serialize($datos);
    }
    
    protected function validate_inputs($campos, $request){
        foreach($campos as $campo){
            if(!isset($request->$campo)){
                return false;
            }
        }

        return true;
    }
    
    protected function response_message($datos, $code = 200){
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($datos);
        die();
    }
}