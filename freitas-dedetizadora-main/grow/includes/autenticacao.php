<?php
    require_once("classes/Conexao.php");
    require_once("classes/Crud.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id']) || $_SESSION['id'] == 0)
        header('Location: login.php?erro=1');
    else{
        $con = new Conexao();
        $crud = new Crud($con);
        $row = $crud->PrepareAndFetch("
            SELECT * FROM gr_usuarios 
            WHERE id_usuario = ?", 
            [$_SESSION['id']]
        )[0];
        if(!count($row))
            header('Location: login.php?erro=1');
    }
?>