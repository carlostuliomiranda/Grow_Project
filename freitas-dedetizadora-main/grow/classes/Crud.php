<?php
    require_once("Conexao.php");
    class Crud{

        private $conexao;

        function __construct($conexao){
            $this->conexao = $conexao->Conectar();
        }

        public function PrepareQuerry($querry, $params){
            $stmt = $this->conexao->prepare($querry);
            if($params != NULL){
                for($i = 1; $i <= count($params); $i++)
                $stmt->bindValue($i, $params[$i-1]);
            }
            return $stmt;
        }

        public function PrepareAndFetch($querry, $params, $fetch_type = PDO::FETCH_ASSOC){
            $stmt = $this->PrepareQuerry($querry, $params);
            $stmt->execute();
            return $stmt->fetchAll($fetch_type);
        }
    }
?>