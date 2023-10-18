<?php 
    function ContaTotalArquivos(){
        $con = new Conexao();
        $crud = new Crud($con);

        $row = $crud->PrepareAndFetch(
            "SELECT * FROM gr_posts",
            NULL
        );

        return count($row);
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

    function ObterPagina(int $id_post){
        $con = new Conexao();
        $crud = new Crud($con);
        $row = $crud->PrepareAndFetch(
            "SELECT titulo 
            FROM gr_posts 
            WHERE id_post = {$id_post}",
            NULL
        )[0];
        $r = strtolower($row['titulo']);
        $r = str_replace(" ", "-", $r);
        return $r.".php";
    }
    
    if(isset($_GET['pagina'])){
        
        require_once("../grow/classes/Conexao.php");
        require_once("../grow/classes/Crud.php");

        $POST_POR_PAGINA = 5;
        define("LENGTH_TITULO", 150);
        define("LENGTH_CONTEUDO", 350);
    
        $con = new Conexao();
        $crud = new Crud($con);
    
        $pagina = intval($_GET['pagina']) * $POST_POR_PAGINA;
        $POST_POR_PAGINA = $_GET['todos'] ? ContaTotalArquivos() : $POST_POR_PAGINA;
    
        $res = (intval($_GET['pagina']) + 1) * $POST_POR_PAGINA >= ContaTotalArquivos() ? 1 : 0;
        $row = $crud->PrepareAndFetch(
            "SELECT * FROM gr_posts
            ORDER BY data_criacao DESC
            LIMIT $pagina, $POST_POR_PAGINA",
            NULL
        );

        $text = '';
        foreach($row as $r){
            $link = ObterPagina($r['id_post']);
            $id_upload = is_null($r['id_upload']) ? 0 : $r['id_upload'];
            $titulo = strlen($r['titulo']) > LENGTH_TITULO ? substr($r['titulo'], 0, LENGTH_TITULO)."..." : $r['titulo'];
            $subtitulo = strlen($r['subtitulo']) > LENGTH_TITULO ? substr($r['subtitulo'], 0, LENGTH_TITULO)."..." : $r['subtitulo'];
            $conteudo = strlen($r['conteudo']) > LENGTH_CONTEUDO ? substr($r['conteudo'], 0, LENGTH_CONTEUDO)."..." : $r['conteudo'];
            $path = $id_upload == 0 ? NULL : ObterPath(intval($id_upload));
            $data = date("d/m/Y", strtotime($r['data_criacao']));
            $icone = "";

            if(!is_null($path)){
                if(ObterTipo($id_upload) == "imagem")
                    $icone = "<img src='../grow/arquivos/uploads/$path'>";
                else if(ObterTipo($id_upload) == "video")
                    $icone = "<video src='../grow/arquivos/uploads/$path'></video>";
            }else{
                $icone =  "<img src='../grow/arquivos/logo.png'>";
            }

            $text .= <<<EOL
                <a href="$link">
                    <div class="post-card">
                        $icone
                        <h3>$titulo</h3>
                        <h4>$subtitulo</h4>
                        $conteudo
                    </div> 
                </a>
                
            EOL;
        }
        
        $resposta = [
            $text,
            $res
        ];

        echo json_encode($resposta);
    }
?>