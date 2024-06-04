<?php 
namespace Database;
use \PDO;

class DBContext{

    protected $conexion;
    protected $query;
    private $table;
    private $fields = '*';
    private $limit;
    private $sortfields = [];
    private $where = [];
    private $group = [];

    public function __construct() {
        
        $this->conexion = new PDO("mysql:host=". dbhost .";dbname=" . dbname, dbuser, dbpassword);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function query_row(){
        return $this->query->fetch(PDO::FETCH_OBJ);
    }

    protected function query_result(){
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
    
    protected function make_query($sql, $datos = []){

        $this->query = $this->conexion->prepare($sql);

        foreach($datos as $key => $dato){
            $this->query->bindValue($key, $dato, PDO::PARAM_STR);
        }
        
        $this->query->execute();
        $this->empty_query();
    }

    protected function insert($campos){
        $columns_name = array_keys($campos);
        $columns = implode(', ', $columns_name);
        $datos = $bindings = [];

        foreach($columns_name as $item){
            $bindings[] = ":$item";
            $datos[":$item"] = $campos[$item];
        }

        $query = "insert into `$this->table` ($columns) values (". implode(', ', $bindings) .")";
        $this->make_query($query, $datos);
    }

    protected function update($campos = []){

        $query = "update `$this->table` set ";
        $datos = $columns = [];

        foreach($campos as $key => $item){
            $columns[] = "`$key` = :$key";
            $datos[":$key"] = $item;
        }

        $query .= implode(', ', $columns);

        $this->condiciones($query);
        $this->make_query($query, $datos);
    }

    private function empty_query(){
        $this->table = $this->limit = '';
        $this->fields = '*';
        $this->sortfields = $this->where = $this->group = [];
    }

    protected function where($campo, $condicion = '=', $valor = ''){

        if($valor == ''){
            $valor = $condicion;
            $condicion = '=';
        }

        $type = 'and';
        $this->where[] = compact('campo', 'condicion', 'valor', 'type');
        return $this;
    }

    protected function orwhere($campo, $condicion = '=', $valor = ''){

        if($valor == ''){
            $valor = $condicion;
            $condicion = '=';
        }

        $type = 'or';
        $this->where[] = compact('campo', 'condicion', 'valor', 'type');
        return $this;
    }

    protected function table($table){
        $this->table = $table;
        return $this;
    }

    protected function select($fields){
        $this->fields = $fields;
        return $this;
    }

    protected function orderBy($field, $sort = 'asc'){
        $this->sortfields[] = "$field $sort";
        return $this;
    }

    protected function groupBy($field){
        $this->group[] = $field;
        return $this;
    }

    private function condiciones(&$query){
        if(count($this->where)){
            $query .= ' where ';

            foreach($this->where as $key => $item){
                if($key){
                    $query .= " {$item['type']} ";
                }

                $query .= " `{$item['campo']}` {$item['condicion']} '{$item['valor']}'";
            }
        }
    }

    private function get_query($campos){

        if(count($campos)){
            $this->fields = implode(', ', $campos);
        }

        $query = "select $this->fields";
        $query .= " from `$this->table`";

        $this->condiciones($query);

        if(count($this->group)){
            $groupfields = implode(',', $this->group);
            $query .= " group by $groupfields";
        }

        if(count($this->sortfields)){
            $sortfields = implode(',', $this->sortfields);
            $query .= " order by $sortfields";
        }

        if(isset($this->limit)){
            $query .= " limit $this->limit";
        }

        $this->make_query($query);
    }
    
    protected function limit($limit){
        $this->limit = $limit;
        return $this;
    }

    protected function get($campos = []){
        $this->get_query($campos);
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }

    protected function first($campos = []){
        $this->limit = 1;
        $this->get_query($campos);
        return $this->query->fetch(PDO::FETCH_OBJ);
    }

    protected function count(){
        $this->get_query(['count(*) as count']);
        return $this->query->fetch(PDO::FETCH_OBJ)->count;
    }
}