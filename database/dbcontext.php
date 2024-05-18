<?php 

$conexion = new DBContext();

class DBContext{

    protected $conexion;
    private $usuario = 'root';
    private $password = '';
    private $dbname = 'proyecto_redes';
    private $host = 'localhost';
    protected $query;

    public function __construct() {
        $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    protected function make_query($sql, $datos = []){

        $this->query = $this->conexion->prepare($sql);

        foreach($datos as $key => $dato){
            $this->query->bindValue($key, $dato, PDO::PARAM_STR);
        }
        
        $this->query->execute();
    }
}