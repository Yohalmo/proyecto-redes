<?php

class GameController extends Controller{

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $ranking = $this->ranking_info();
        $this->view('index', compact('ranking'));
    }

    public function get_ranking(){
        $ranking = $this->ranking_info();
        $this->response_message($ranking);
    }

    private function ranking_info(){
        return $this->table('usuarios')->limit(10)->orderBy('usuario_dinero', 'desc')
        ->get(['usuario_id as registro', 'usuario_nombre as usuario', 'usuario_dinero as dinero']);
    }

    public function save_game(){
        $usuario = $this->get_session('user-info');

        if(!isset($usuario)){
            $this->response_message(['message' => 'Se ha terminado la sesión. Por favor vuelva a ingresar sus credenciales'], 500);
        }
        
        $this->make_query('call save_game(:id, :apuesta, :ganancia)', [':id' => $usuario->usuario_id]);

        $response = $this->query->fetch(PDO::FETCH_OBJ);
        $usuario->usuario_jugadas = $response->usuario_jugadas;
        $usuario->usuario_dinero = $response->usuario_dinero;
        $this->put_session('user-info', $usuario);

        $this->response_message(['intentos_restantes' => 5 - $usuario->usuario_jugadas]);
    }
}