<?php
    require_once('Conexao.php');
    require_once('Crud.php');
    require_once('Formatos.php');
    require_once('Controlador.php');

    class Upload{
        private $tmpName;
        private $nomeCompleto;
        private $nome;
        private $extensao;
        private $tipo;
        public $status;

        public function __get($name){
            return $this->$name;
        }

        public function __construct($nomeCompleto, $tmpName){
            $this->nomeCompleto = $nomeCompleto;
            $this->extensao = $this->GetExtension($nomeCompleto);
            $this->tmpName = $tmpName;
            $this->nome = $this->RemoveExtension($nomeCompleto);

            foreach(Formatos::$formatos as $k => $f){
                if(in_array($this->extensao, $f)){
                    $this->tipo = $k;
                    break;
                }
            }

            $this->status = $this->VerifyErrors();
        }

        private function RemoveExtension($str){
            $newStr = ""; $flag = false;
            for($i = strlen($str) - 1; $i >= 0; $i--){
                if($flag) $newStr .= $str[$i];
                else if($str[$i] == '.') $flag = true;
            }
            return strrev($newStr);
        }

        private function GetExtension($str){
            $newStr = ""; $flag = true;
            for($i = strlen($str) - 1; $i >= 0; $i--){
                if($str[$i] == '.'){
                    $newStr .= '.';
                    break;
                }
                $newStr .= $str[$i];
            }
            return strrev($newStr);
        }

        public function VerifyErrors(){
            if($this->nomeCompleto == '')
                return 1;
            if(!in_array($this->extensao, Formatos::$permitidos))
                return 2;
            if(strlen($this->nome) > 255)
                return 3;
            if(file_exists("arquivos/uploads/".$this->nomeCompleto))
                return 4;
            return 0;
        }

        public function InsertUpload(){
            if(!$this->status){
                $con = new Conexao();
                $crud = new Crud($con);

                $stmt = $crud->PrepareQuerry(
                    "INSERT INTO gr_uploads(autor, nome, extensao, tipo) VALUES(?,?,?,?)",
                    [Controlador::GetNome(), $this->nome, $this->extensao, $this->tipo]
                );

                if($stmt->execute()){
                    move_uploaded_file($this->tmpName, "arquivos/uploads/".$this->nomeCompleto);
                }else{
                    $this->status = 5;
                }
            }
        }
    }
?>