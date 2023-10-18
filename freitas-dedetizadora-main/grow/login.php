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

        <title>Login | GROW</title>

        <!--[if lt IE 9]>
            <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
        <![endif]-->

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            main{
                min-width: 300px;
                width: 70%;
                max-width: 350px;
                height: fit-content;
                box-shadow: 0px 0px 5px 1px white;
                border-radius: 15px;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                overflow: none;
                background-color: #222222;
                color: white;
            }
            input[type="text"], input[type="password"]{
                border: 1px solid #828282;
                width: 100%;
                padding: 5px;
                box-sizing: border-box;
                box-shadow: 1px 1px 3px black;
            }
            input[type="text"]:hover, input[type="password"]:hover{
                border: 1px solid #FF581A;
                box-sizing: border-box;
            }
            input[type="text"]:focus, input[type="password"]:focus{
                border-color: #FF581A;
                outline: none;
            }
            input[type="text"]:focus::placeholder, 
            input[type="password"]:focus::placeholder{
                color: white;
            }
            input[type="submit"]{
                width: 60%;
                background-color: #FF581A !important;
                align-self: center;
                font-weight: 700;
                transition: all .3s ease;
            }
            input[type="submit"]:hover{
                cursor: pointer;
            }
            #div-olho{
                color: #222222;
                padding: 5px;
                position: absolute;
                top: 0px;
                right: 0px;
                width: 30px;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #div-olho:hover{
                cursor: pointer;
                color: black;
            }
        </style>
    </head>

    <body>
        <main class="p-5 d-flex flex-column gap-3">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="https:\\growagency.com.br">
                    <img src="arquivos/logo-grow.png" alt="Grow" width="100px">
                </a>
                <h1>Grow</h1>
            </div>
            <form action="php/valida-login.php" method="POST" class="d-flex flex-column gap-3">
                <input type="text" placeholder="Usuário" name="usuario" id="usuario">
                <div style="position:relative;">
                    <input type="password" placeholder="Senha" name="senha" id="senha" maxlength="20">
                    <div id="div-olho">
                        <i class="fa-solid fa-eye-slash" id="olho"></i>
                    </div>
                </div>
                
                </input>
                <div>
                    <input type="checkbox" id="lembrar">
                    <label for="lembrar">Lembrar de mim</label>
                </div>

                <?php
                    require_once("classes/Erros.php");
                    if(isset($_GET['erro'])){
                        if(array_key_exists($_GET['erro'], ErrosLogin::$ErrList)){
                            $msg = ErrosLogin::$ErrList[$_GET['erro']];
                            echo
                            "<p class='text-danger mb-0'>
                                $msg
                            </p>";
                        }
                    }
                ?>

                <input type="submit" value="Entrar" onclick="LembrarDeMim()" class="btn">
            </form>
        </main>

        <!-- Algoritmo ver senha -->
        <script>
            const divolho = document.getElementById("div-olho"),
                olho = document.getElementById("olho");
            divolho.addEventListener("click", function(){
                if(olho.className == "fa-solid fa-eye-slash"){
                    olho.className = "fa-solid fa-eye";
                    document.getElementById("senha").setAttribute("type","text");
                }else{
                    olho.className = "fa-solid fa-eye-slash";
                    document.getElementById("senha").setAttribute("type","password");
                }
            });
        </script>

        <!-- Algoritmos de login -->
        <script src="js/lembra-login.js"></script>
        <script src="js/valida-login.js"></script>

        <!-- Bootstrap JS, Font-Awesome JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/bc6bade300.js" crossorigin="anonymous"></script>
    </body>
</html>