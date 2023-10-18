<?php
    class Usuario{
        private $login;
        private $senha;
        
        public function __construct($login, $senha){
            $this->login = $login;
            $this->senha = $senha;
        }

        public function __get($name){
            return $this->$name;
        }
        
        public function __set($name, $value){
            $this->$name = $value;
        }
    }
?>