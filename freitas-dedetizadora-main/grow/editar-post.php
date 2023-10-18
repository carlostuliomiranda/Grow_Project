<?php require_once('includes/autenticacao.php') ?>
<?php
    require_once("classes/Conexao.php");
    require_once("classes/Crud.php");

    $row;
    $con = new Conexao();
    $crud = new Crud($con);
    $id_post = intval($_GET['id']);

    $row = $crud->PrepareAndFetch(
        "SELECT * FROM gr_posts AS P
        WHERE P.id_post = $id_post",
        NULL
    );

    if(!count($row))
        header("Location: criar-post.php");
    $row = $row[0];
?>
<!doctype html>
<html lang="pt-br">
    <head>

        <!-- ****************************************** -->
        <!-- ***** Desenvolvido por Eduardo Kurek ***** -->
        <!-- ** Programador e designer / Grow Agency ** -->
        <!-- ****** https://www.growagency.com.br ***** -->
        <!-- ****************************************** -->

        <!--
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@,@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@/@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@.@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@%////////((//(/////(/////////&@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@%/////////#@@@@@@@@#(////////&@@@@        @@@@@@@/@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@,@%////////@@@@@@@@@@@@/(//////&@@@@        .@@@@@@#@@&@@@@@@@@@@@@
            @@@@@@@@@@@@@@@%////////@@@@@//@@@@@////////&@@@,    ,    @@@@@@@@@@@,@@@@@@@@@@
            @@@@@@@@,@@@@@@%////////@@@@@((/////////////&@@@    *#    @@@@@@@@@@@@@@@@@@@@@@
            @@@@@&@@#@@@@@@%////////@@@@@(@@@@@@////////&@@@    #@    @@@@@@@@@@@@@@@@/@@@@@
            @@@@@&@@@@@@@@@%////////@@@@@(@@@@@@////////&@@@    @@    *@@@@@@@@@@@@@@@*@@@@@
            @@@@@@@@*@@@@@@%////////@@@@@((&@@@@////////&@@,    **     @@@@@@@@@@@@@&@@@@@@@
            @@@@@@@@@@@@@&@%////////@@@@@((@@@@@////////&@@            @@@@@@@@@@ @@@@@@@@@@
            @@@@@@@@@@@@@*@%/////////@@@@@@@@@@@////////&@@    ,@@@    @@@@@@@@&@@@@@@@@@@@@
            @@@@@@@@@@@@@@@%//////////(@@@@#/(@@////////&@@    #@@@    /@@@@*@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@%//((((//////////////////////&@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@,@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@,@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@/@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&@@#@@@@@@@@@@@@@@@*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@,@@@@@@@@@@%@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@,@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
         -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="none">
        <link rel="icon" type="image/png" href="../arquivos/favicon.png">

        <title>Bem-vindo à GROW</title>

        <!--[if lt IE 9]>
            <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
        <![endif]-->

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/posts.css">
        <style>
            a.voltar{
                color: var(--gr-cinza);
            }
            a.voltar:hover{
                color: var(--gr-laranja);
            }
        </style>

    </head>

    <body>
        <?php require_once('includes/cabecalho.php') ?>

        <main>
            <?php require_once('includes/menu-lateral.php') ?>
            <div class="content">
                <a href="posts.php" class="voltar"><i class="fa-solid fa-arrow-left-long"></i></a>
                <div class="border border-2 p-2 d-flex flex-column gap-3 mb-0">
                    <h2>Editar post</h2>
                    <form class="d-flex flex-column gap-3">
                        <input type="text" name="titulo" id="titulo" class="col-12" placeholder="Adicione um título..." maxlength="255">
                        <input type="text" name="subtitulo" id="subtitulo" class="col-12" placeholder="Adicione um subtítulo..." maxlength="255">
                        <div class="mb-0 d-flex flex-column gap-1">
                            <span id="btn-icone" onclick="AbreModal()">Selecione uma imagem</span>
                            <span id="id-icone" class="d-none"></span>
                            <img src="" id="img-icone" class="d-none">
                            <video src="" id="video-icone" class="d-none"></video>
                        </div>
                        <textarea name="editor" id="editor">
                        </textarea>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button type="button" value="Salvar" onclick="AtualizaPost(<?php echo $row['id_post'] ?>)">
                                Salvar
                                <img src="arquivos/loading.svg" id="loading" class="d-none" height="30px">
                            </button>
                        </div>
                    </form>
                    <div id="response" class="d-none">

                    </div>

                </div>
            </div>
        </main>

        <dialog id="modal">
            <div class="modal-content">

            </div>
            <a onclick=CloseModal() class="close">X</a>
        </dialog>

        <!-- Bootstrap JS, Font-Awesome JS, CKEditor -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/bc6bade300.js" crossorigin="anonymous"></script>
        <script src="js/ckeditor.js"></script>
        <script src="js/editar-post.js"></script>
        <script>
            var editor;

            ClassicEditor
            .create(document.querySelector('#editor'), {
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragráfo', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Título', class: 'ck-heading_heading1' },
                        { model: 'heading3', view: 'h3', title: 'Subtítulo', class: 'ck-heading_heading2' }
                    ]
                },
                
                toolbar: [
                    'heading',
                    '|', 'bold', 'italic',
                    '|', 'numberedList', 'bulletedList',
                ]
            })
            .then(newEditor => {
                editor = newEditor;
            })

        </script>

        <?php
            $titulo = $row['titulo'];
            $subtitulo = $row['subtitulo'];
            $conteudo = $row['conteudo'];
            $id_upload = $row['id_upload'] == '' ? 0 : $row['id_upload'];
            $tipo = $id_upload == 0 ? 'imagem' : $crud->PrepareAndFetch(
                "SELECT tipo FROM gr_uploads 
                WHERE id_upload = {$id_upload}",
                NULL
            )[0]['tipo'];
            echo "<pre>";
            print_r($row);
            print_r($tipo);
            echo "</pre>";
            echo "<script>AtualizaDados('$titulo', '$subtitulo', '$conteudo', $id_upload, '$tipo')</script>";
        ?>
    </body>
</html>