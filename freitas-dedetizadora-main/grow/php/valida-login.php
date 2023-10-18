<?php
    require_once("../classes/Usuario.php");
    require_once("../classes/Crud.php");
    session_start();

    $user = new Usuario($_POST['usuario'], $_POST['senha']);

    // Verifica se os dados estão preenchidos
    if($user->login == '' || $user->senha == ''){
        header("Location: ../login.php?erro=3");
        die();
    }

    $conexao = new Conexao();
    $crud = new Crud($conexao);
    $row = $crud->PrepareAndFetch(
        "SELECT * FROM gr_usuarios WHERE gr_usuarios.login = ? LIMIT 1", 
        [$user->login],
        PDO::FETCH_ASSOC
    );

    if(count($row) && password_verify($user->senha, $row[0]['senha'])){
        $_SESSION['id'] = $row[0]['id_usuario'];
        $_SESSION['nome'] = $row[0]['nome'];
        header('Location: ../index.php');
    }else{
        $_SESSION['id'] = 0;
        $_SESSION['nome'] = "";
        header('Location: ../login.php?erro=2');
    }
?>