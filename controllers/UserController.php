<?php

class UserController extends Controller{

    public function __construct() {
        parent::__construct();
    }

    public function login(Request $request){
        if($this->validate_inputs(['email', 'password'], $request)){

            $result = $this->table('usuarios')->where('usuario_email', $request->email)->first();
        
            if(isset($result->usuario_id) && password_verify($request->password, $result->usuario_password)){
                $this->put_session('user-info', $result);
                $this->response_message(['message' => 'Login correcto']);
            }
    
            $this->response_message(['message' => 'Usuario o contraseña incorrecta'], 500);
        }

        $this->response_message(['message' => 'Debe de llenar el correo y la contraseña'], 500);
    }

    public function add_user(Request $request){
        
        if($this->validate_inputs(['nombre', 'email', 'password'], $request)){

            $info = $this->table('usuarios')->where('usuario_email', $request->email)
            ->first(['count(*) as total']);
    
            if($info->total){
                $this->response_message(['message' => 'Ya existe un usuario con ese correo electronico registrado'], 500);
            }
    
            $password = password_hash($request->password, PASSWORD_DEFAULT);
            
            $this->table('usuarios')->insert([
                'usuario_nombre' => $request->nombre,
                'usuario_email' => $request->email,
                'usuario_password' => $password
            ]);
    
            $this->response_message(['message' => 'Usuario creado exitosamente']);
        }

        $this->response_message(['message' => 'Debe llenar todos los campos del formulario']);
    }
}
