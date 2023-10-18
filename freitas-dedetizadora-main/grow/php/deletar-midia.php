<?php
    require_once("../classes/Conexao.php");
    require_once("../classes/Crud.php");

    if(isset($_POST['id'])){
        $con = new Conexao();
        $crud = new Crud($con);
        
        $row = $crud->PrepareAndFetch(
            "SELECT nome, extensao
            FROM gr_uploads
            WHERE id_upload = ?",
            [$_POST['id']]
        )[0];

        $nome = $row['nome'];
        $extensao = $row['extensao'];
        
        $crud->PrepareAndFetch(
            "DELETE FROM gr_uploads
            WHERE id_upload = ?",
            [$_POST['id']]
        );

        if(file_exists("../arquivos/uploads/{$nome}{$extensao}"))
            unlink("../arquivos/uploads/{$nome}{$extensao}");
    }
?>