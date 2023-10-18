<?php
    require_once("../classes/Conexao.php");
    require_once("../classes/Crud.php");

    $POST_POR_PAGINA = 5;
    define("LENGTH_TITULO", 150);
    define("LENGTH_CONTEUDO", 350);
    
    $pagina = intval($_POST['pagina']) * $POST_POR_PAGINA;
    $POST_POR_PAGINA = $_POST['todos'] ? ContaTotalArquivos() : $POST_POR_PAGINA;

    $con = new Conexao();
    $crud = new Crud($con);
    $row = $crud->PrepareAndFetch(
        "SELECT * FROM gr_posts
        ORDER BY data_criacao DESC
        LIMIT $pagina, $POST_POR_PAGINA",
        NULL
    );

    $res = (intval($_POST['pagina']) + 1) * $POST_POR_PAGINA >= ContaTotalArquivos() ? 1 : 0;
    $text = '';
    foreach($row as $r){
        $id_post = $r['id_post'];
        $id_upload = is_null($r['id_upload']) ? 0 : $r['id_upload'];
        $titulo = strlen($r['titulo']) > LENGTH_TITULO ? substr($r['titulo'], 0, LENGTH_TITULO)."..." : $r['titulo'];
        $subtitulo = strlen($r['subtitulo']) > LENGTH_TITULO ? substr($r['subtitulo'], 0, LENGTH_TITULO)."..." : $r['subtitulo'];
        $conteudo = strlen($r['conteudo']) > LENGTH_CONTEUDO ? substr($r['conteudo'], 0, LENGTH_CONTEUDO)."..." : $r['conteudo'];
        $path = $id_upload == 0 ? NULL : ObterPath(intval($id_upload));
        $data = date("d/m/Y à\s H:i", strtotime($r['data_criacao']));
        $autor = $r['autor'];

        $text .= <<<EOL
            <div class="card-post border p-2 d-flex flex-column gap-2 gap-md-3">
                <div> 
        EOL;

        if($id_upload){
            if(ObterTipo($id_upload) == 'imagem')
                $text .= "<img src='arquivos/uploads/{$path}'>";
            else if(ObterTipo($id_upload) == 'video')
                $text .= "<video src='arquivos/uploads/{$path}'></video>";
        }else{
            $text .= "<img src='arquivos/logo.png'>";
        }

        $text .= <<<EOL
                    
                    <h3>{$titulo}</h3>
                    <h4 class="d-none d-md-block">{$subtitulo}</h4>
                    <p class="mb-0 d-none d-lg-block">{$conteudo}</p>
                    <p class="mb-0 mt-2"><strong>Criado em:</strong> {$data} por <strong>{$autor}</strong></p>
                </div>
                <div id="icones" class="d-flex gap-3">
                    <a class="" onclick="(location.replace('editar-post.php?id={$id_post}'))">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a class="" onclick="DeletePost({$id_post})">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </div>
        EOL;
    }

    function ObterTipo(int $id_upload){
        if(!$id_upload)
            return 'imagem';
        $con = new Conexao();
        $crud = new Crud($con);
        $row = $crud->PrepareAndFetch(
            "SELECT tipo 
            FROM gr_uploads 
            WHERE id_upload = {$id_upload}",
            NULL
        )[0];
        return $row['tipo'];
    }

    function ObterPath(int $id_upload){
        $con = new Conexao();
        $crud = new Crud($con);
        $row = $crud->PrepareAndFetch(
            "SELECT nome, extensao 
            FROM gr_uploads 
            WHERE id_upload = {$id_upload}",
            NULL
        )[0];
        if(count($row))
            return $row['nome'].$row['extensao'];
    }

    function ContaTotalArquivos(){
        $con = new Conexao();
        $crud = new Crud($con);

        $row = $crud->PrepareAndFetch(
            "SELECT * FROM gr_posts",
            NULL
        );

        return count($row);
    }

    $resposta = [
        $text,
        $res
    ];

    echo json_encode($resposta);
?>