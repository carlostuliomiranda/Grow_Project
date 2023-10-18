<?php
    require_once("../classes/Conexao.php");
    require_once("../classes/Crud.php");

    class RenomearArquivo{
        private $antigo;
        public $novo;
        private $extensao;
        public $status = 0;
        public $sql;

        public function __construct($antigo, $novo, $extensao){
            $this->antigo = $antigo;
            $this->novo = $novo;
            $this->extensao = $extensao;
        }

        public function __get($name){
            return $this->$name;
        }

        public function Verify(){
            if($this->novo == '')
                $this->status = 1; return;
            $this->status = 0;
        }

        public function Rename(){
            if(!$this->status){
                $old = $this->antigo.$this->extensao;
                $new = $this->novo.$this->extensao;

                $con = new Conexao();
                $crud = new Crud($con);

                $stmt = $crud->PrepareQuerry(
                    "UPDATE gr_uploads
                    SET nome = ?
                    WHERE nome = '{$this->antigo}'
                    AND extensao = '{$this->extensao}'",
                    [$this->novo]
                );

                if(!$stmt->execute()){
                    $this->status = 3; 
                    return;
                }
                
                if(!rename("../arquivos/uploads/{$old}", "../arquivos/uploads/{$new}"))
                    $this->status = 2;
            }
        }
    }
?>