<?php
    require_once("../classes/Post.php");
    require_once("../classes/Erros.php");

    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $conteudo = $_POST['conteudo'];
    $id_upload = $_POST['id_upload'] == '' ? 0 : $_POST['id_upload'];
    $id_post = $_POST['id_post'];

    $post = new Post($id_post);
    $r = $post->Update($titulo, $subtitulo, $conteudo, $id_upload);
    
    echo ErrosPosts::$ErrList[$r];
?>