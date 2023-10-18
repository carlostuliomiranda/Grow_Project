<?php require_once('includes/autenticacao.php') ?>
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
            .card-post img, .card-post video{
                float: left;
                width: 100px;
                height: 100px;
                margin-right: 10px;
                object-fit: contain;
                object-position: center;
            }
            #icones *{
                font-size: 1.3em;
                color: var(--gr-cinza);
            }
            #icones *:hover{
                cursor: pointer;
                color: var(--gr-laranja);
            }
            #mais a{
                color: var(--gr-laranja);
                text-decoration: underline;
                cursor: pointer;
            }
            #mais a:hover{
                color: var(--gr-cinza);
            }
        </style>
    </head>

    <body>
        <script src="js/posts.js"></script>
        <?php require_once('includes/cabecalho.php') ?>

        <main>
            <?php require_once('includes/menu-lateral.php') ?>
            <div class="content">
                <div class="d-flex flex-column gap-2 gap-md-3" id="conteudo">
                    <div id="loading">Carregando...</div>
                </div>
                <div id="mais" class="mt-2">
                    <a class="" onclick="SetaOffset(1)">Ver mais</a>
                    |
                    <a class="" onclick="SetaOffset(-1)">Ver todos</a>
                </div>
            </div>
        </main>

        <!-- Bootstrap JS, Font-Awesome JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/bc6bade300.js" crossorigin="anonymous"></script>
        
    </body>
</html>