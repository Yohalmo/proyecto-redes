<?php

class Request extends stdClass{

    public function __construct() {
        $this->get_data();
    }

    public function get_data(){

        foreach($_GET as $key => $item){
            $item = filter_input(INPUT_GET, $key);
            $this->{$key} = $item;
        }

        foreach($_POST as $key => $item){
            $item = filter_input(INPUT_POST, $key);
            $this->{$key} = $item;
        }
    }
}
