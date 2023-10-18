<?php
    require_once("Conexao.php");
    require_once("Crud.php");

    if(!isset($_SESSION)){
        session_start();
    }

    class Controlador{
        public static function GetID(){
            $con = new Conexao();
            $crud = new Crud($con);

            $row = $crud->PrepareAndFetch(
                "SELECT id_usuario FROM gr_usuarios",
                NULL
            );

            foreach($row as $r){
                if($r['id_usuario'] == $_SESSION['id'])
                    return $r['id_usuario'];
            }
            return 0;
        }

        public static function GetNome(){
            $con = new Conexao();
            $crud = new Crud($con);
            $id = Controlador::GetID();

            $row = $crud->PrepareAndFetch(
                "SELECT nome FROM gr_usuarios WHERE id_usuario = $id",
                NULL
            );

            return $row[0]['nome'];
        }

        public static function GetUploadPath(int $id){
            $con = new Conexao();
            $crud = new Crud($con);
            $row = $crud->PrepareAndFetch(
                "SELECT nome, extensao 
                FROM gr_uploads
                WHERE id_upload = ?",
                [$id]
            )[0];

            $path = $row['nome'].$row['extensao'];
            return $path;
        }
    }


?>