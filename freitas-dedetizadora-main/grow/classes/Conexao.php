<?php
    class Conexao{
        private $host = "localhost";
        private $database = "u126933690_grow";
        private $user = "u126933690_grow";
        private $pass = "Gpi@f87k&0";

        public function Conectar(){
            try{
                $conexao = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->pass);
                return $conexao;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>