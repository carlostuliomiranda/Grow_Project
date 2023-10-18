<?php
    require_once("../classes/Post.php");
    require_once("../classes/Erros.php");

    $icone = $_POST['icone'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $conteudo = $_POST['conteudo'];

    $post = new Post();
    $r = $post->Create(intval($icone), $titulo, $subtitulo, $conteudo);

    $resposta = [
        ErrosPosts::$ErrList[$r],
        $r
    ];

    echo json_encode($resposta);
?>