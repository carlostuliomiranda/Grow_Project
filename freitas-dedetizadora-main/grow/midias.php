<?php require_once('includes/autenticacao.php') ?>
<?php require_once('classes/Formatos.php') ?>
<?php require_once('classes/Erros.php');?>

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
        <style>
            #container-imagens{
                width: 100%;
                background-color: #ececec;
                padding: 10px;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            #container-imagens #dentro{
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            #container-imagens #dentro *{
                width: 10vw;
                height: 10vw;
                min-width: 80px;
                max-width: 130px;
                min-height: 80px;
                max-height: 130px;
                border: 1px solid var(--gr-laranja);
                box-shadow: 1px 1px 3px black;
                transition: transform 0.1s ease-in-out;
                cursor: pointer;
            }

            #container-imagens #fora{
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                font-weight: 500;
            }

            #container-imagens #fora a{
                cursor: pointer;
                color: var(--gr-laranja);
                text-decoration: underline;
            }

            #container-imagens #fora a:hover{
                color: var(--gr-cinza);
            }
            
            dialog{
                width: 80%;
                min-width: 400px;
                max-width: 1200px;
                border: 1px solid black;
                grid-template-columns: 50% 50%;
                padding: 18px;
            }

            dialog::backdrop{
                background-color: rgb(0,0,0,.5);
            }

            dialog button{
                margin-top: 10px;
                border: none;
                outline: none;
                color: black;
                font-weight: 500;
                background-color: var(--gr-laranja);
                padding: 5px 15px;
                border-radius: 5px;
                transition: all .2s ease;
            }

            dialog button:hover{
                color: white;
                background-color: var(--gr-cinza);
            }

            dialog .close{
                position: absolute;
                width: 40px;
                text-align: center;
                padding: 5px;
                top: 10px;
                right: 10px;
                color: var(--gr-cinza);
                cursor: pointer;
                font-weight: 600;
                font-size: 1.2em;
                text-decoration: none;
                background-color: white;
                border: 2px dashed var(--gr-laranja);
                border-radius: 360px;
            }

            dialog .close:hover{
                color: var(--gr-laranja) !important;
            }

            dialog a{
                color: var(--gr-laranja);
                text-decoration: underline;
                font-weight: 500;
                outline: none;
                border: none;
                cursor: pointer;
            }

            dialog a:hover{
                color: var(--gr-cinza);
            }

            dialog .salvar{
                background-color: var(--gr-laranja);
                color: var(--gr-cinza);
                text-decoration: none;
                border-radius: 5px;
                padding: 5px 15px;
                font-weight: 500;
            }
            dialog .salvar:hover{
                background-color: var(--gr-cinza);
                color: var(--gr-laranja);
            }
            
        </style>


    </head>

    <body>
        <?php require_once('includes/cabecalho.php') ?>

        <main>
            <?php require_once('includes/menu-lateral.php') ?>
            <div class="content">
                <div class="d-flex flex-column gap-3 w-100">
                    <form action="" enctype="multipart/form-data" method="POST" class="d-flex gap-2 align-items-center flex-wrap" id="form">
                        <input type="file" name="arquivo[]" multiple id="files">
                        <div>
                            <button type="submit">Enviar <i class="fa-solid fa-upload d-none d-md-inline"></i></button>
                        </div>
                        <?php
                            if(isset($_FILES['arquivo']) && count($_FILES['arquivo']['name']) <= 20){
                                require_once("classes/Upload.php");
                                $file = $_FILES['arquivo'];
                                $flag = false;

                                for($i = 0; $i < count($file['name']); $i++){
                                    $upload = new Upload($file['name'][$i], $file['tmp_name'][$i]);
                                    $upload->InsertUpload();

                                    if(count($file['name']) > 1 && !$flag && $upload->status){
                                        $flag = true;
                                        $upload->status = 6;
                                        echo ErrosUpload::$ErrList[$upload->status];
                                    }else if(count($file['name']) == 1){
                                        echo ErrosUpload::$ErrList[$upload->status];
                                    }
                                }
                                
                                if(!$flag && count($file['name']) > 1)
                                    echo ErrosUpload::$ErrList[0];

                            }else if(isset($_FILES['arquivo']))
                                echo ErrosUpload::$ErrList[7];

                            unset($_FILES);

                        ?>
                    
                    <div class="w-100 d-flex align-items-center gap-3 p-2 flex-wrap" style="background-color: #ececec">
                        <select id="midia" onchange="RequestUploads()">
                            <option value="todos">Todas as mídias</option>
                            <option value="imagem">Imagens</option>
                            <option value="video">Vídeos</option>
                        </select>

                        <select id="ordenar" onchange="RequestUploads()">
                            <option value="DESC">Mais recentes</option>
                            <option value="ASC">Mais antigos</option>
                        </select>
                        
                        <div class="ms-auto">
                            <label for="pesquisar">Pesquisar</label>
                            <input type="text" id="pesquisar" style="height: 25px;" onkeyup="RequestUploads()">
                        </div>
                    </div>

                    <div id="container-imagens">
                        Carregando arquivos...
                    </div>

                    <dialog id="modal">
                    </dialog>
                    
                </div>
            </div>
        </main>
        
        <!-- Bootstrap JS, Font-Awesome JS -->
        <script src="js/midias.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/bc6bade300.js" crossorigin="anonymous"></script>
    </body>
</html>