<?php

class UserController extends Controller{

    public function __construct() {
        parent::__construct();
    }

    public function login(Request $request){
        $this->validate_inputs(['email', 'password'], $request);

        $this->make_query('select * from usuarios where usuario_email = :email', 
        [':email' => $request->email]);

        $result = $this->query->fetch(PDO::FETCH_OBJ);
        
        if(password_verify($request->password, $result->usuario_password)){
            $this->put_session('user-info', $result);
            $this->response_message(['message' => 'Login correcto']);
        }

        $this->response_message(['message' => 'Usuario o contraseña incorrecta'], 500);
    }

    public function add_user(Request $request){
        $this->validate_inputs(['usuario', 'email', 'password'], $request);

        $this->make_query('select count(*) from usuarios where usuario_email = :email', 
        [':email' => $request->email]);

        if($this->query->fetchColumn()){
            $this->response_message(['message' => 'Ya existe un usuario con ese correo electronico registrado'], 500);
        }

        $password = password_hash($request->password, PASSWORD_DEFAULT);
        $insert = "insert into usuarios (usuario_nombre, usuario_email, usuario_password) values (:nombre, :email, :password)";

        $this->make_query($insert, [':nombre' => $request->nombre, 
        ':email' => $request->email, ':password' => $password]);
        $this->response_message(['message' => 'Usuario creado exitosamente']);
    }
}
