<?php

class GameController extends Controller{

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view('index');
    }

    public function ruleta(){
        $ranking = $this->ranking_info();
        $infoUser = $this->get_session('user-info');

        if(isset($infoUser->usuario_id)){
            $infoUser = $this->table('usuarios')->where('usuario_id', $infoUser->usuario_id)->first();
        }

        $numeros = [3, 2, 1];
        $colores = [['red', 'black'], ['black', 'red'], ['red', 'black']];
        $grupos = ['primeros', 'segundos', 'terceros'];
        $numeros = range(1, 36);
        shuffle($numeros);
        $red = $black = [];

        $this->view('ruleta.index', compact('ranking', 'infoUser', 'numeros', 'colores', 'grupos', 'red', 'black'));
    }

    public function main_page(){
        $this->view('Principal');
    }

    public function get_ranking(){
        $ranking = $this->ranking_info();
        $this->response_message($ranking);
    }

    private function ranking_info(){
        return $this->table('usuarios')->limit(10)->orderBy('usuario_dinero', 'desc')
        ->get(['usuario_id as registro', 'usuario_nombre as usuario', 'usuario_dinero as dinero']);
    }

    public function save_game(Request $request){
        $usuario = $this->get_session('user-info');

        if(!isset($usuario->usuario_id)){
            $this->response_message(['message' => 'Se ha terminado la sesión. Por favor vuelva a ingresar sus credenciales'], 500);
        }
        
        $this->make_query('call save_game(:id, :apuesta, :ganancia)', 
        [':id' => $usuario->usuario_id, ':apuesta' => $request->apostado, ':ganancia' => $request->ganancia]);

        $response = $this->query->fetch(PDO::FETCH_OBJ);
        $usuario->usuario_jugadas = $response->usuario_jugadas;
        $usuario->usuario_dinero = $response->usuario_dinero;
        $this->put_session('user-info', $usuario);

        $this->response_message(['intentos_restantes' => $response->usuario_jugadas]);
    }
}