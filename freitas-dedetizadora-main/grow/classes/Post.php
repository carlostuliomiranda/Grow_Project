<?php
    require_once("Conexao.php");
    require_once("Crud.php");
    require_once("Controlador.php");

    class Post{
        private $id;
        
        public function getId(){
            return $this->id;
        }

        public function __construct($id = NULL){
            $this->id = $id;
        }

        public function Create($icone, $titulo, $subtitulo, $conteudo){
            if($titulo == '' || $subtitulo == '' || $conteudo == '')
                return 1;
            if(strlen($titulo) > 245 || strlen($subtitulo) > 245)
                return 2;
            if(strlen($conteudo) > 50000)
                return 3;
            if($this->PostExiste())
                return 4;
            if($this->id != NULL)
                return 6;
            if($icone && !$this->ImagemExiste($icone))
                return 7;
            else if(!$icone)
                $icone = NULL;
            if($this->TituloExiste($titulo))
                return 8;
            
            $con = new Conexao();
            $crud = new Crud($con);

            $stmt = $crud->PrepareQuerry(
                "INSERT INTO gr_posts(autor, id_upload, titulo, subtitulo, conteudo)
                VALUES (?, ?, ?, ?, ?)",
                [Controlador::GetNome(), $icone, $titulo, $subtitulo, $conteudo]
            );

            if($stmt->execute()){
                $row = $crud->PrepareAndFetch(
                    "SELECT id_post 
                    FROM gr_posts 
                    ORDER BY id_post DESC
                    LIMIT 1",
                    NULL
                )[0];
                $this->id = $row['id_post'];

                $tipo = $icone ? $this->getUploadInfo("tipo", $icone) : "imagem";
                $path = $icone ? $this->getUploadInfo("nome", $icone).$this->getUploadInfo("extensao", $icone) : "";
                $data = date("d/m/Y", strtotime($this->getPostInfo("data_criacao")));
                $this->WriteFile($titulo, $subtitulo, $conteudo, $path, $tipo, $data);
                return 0;
            }else
                return 9;
        }

        public function Update($titulo, $subtitulo, $conteudo, $id_upload){
            if(!$this->PostExiste())
                return 5;
            if($this->TituloExiste($titulo) >= 1)
                return 8;
            if($id_upload && !$this->ImagemExiste($id_upload))
                return 7;
            else if(!$id_upload)
                $id_upload = NULL;
            if($titulo == NULL)
                $titulo = $this->getPostInfo('titulo');
            if($subtitulo == NULL)
                $subtitulo = $this->getPostInfo('subtitulo');
            if($conteudo == NULL)
                $conteudo = $this->getPostInfo('conteudo');

            $con = new Conexao();
            $crud = new Crud($con);
        
            $stmt = $crud->PrepareQuerry(
                "UPDATE gr_posts
                SET titulo = ?, subtitulo = ?, conteudo = ?, id_upload = ?
                WHERE id_post = ?",
                [$titulo, $subtitulo, $conteudo, $id_upload, $this->id]
            );

            $this->DeleteFile($this->getPostInfo("titulo"));
            if($stmt->execute()){
                $tipo = $id_upload ? $this->getUploadInfo("tipo", $id_upload) : "imagem";
                $path = $id_upload ? $this->getUploadInfo("nome", $id_upload).$this->getUploadInfo("extensao", $id_upload) : "";
                $data = date("d/m/Y", strtotime($this->getPostInfo("data_criacao")));
                $this->WriteFile($titulo, $subtitulo, $conteudo, $path, $tipo, $data);
                return 0;
            }else
                return 9;
        }

        public function Delete(){
            if(!is_null($this->id)){
                $con = new Conexao();
                $crud = new Crud($con);
                $stmt = $crud->PrepareQuerry(
                    "DELETE FROM gr_posts WHERE id_post = ?",
                    [intval($this->id)]
                );
                $this->DeleteFile($this->getPostInfo("titulo"));
                if($stmt->execute())
                    return 1;
            }
            return 0;
        }

        private function WriteFile($titulo, $subtitulo, $conteudo, $pathIcone, $tipo, $data){
            $fileName = strtolower($titulo);
            $fileName = str_replace(" ", "-", $fileName);
            $conteudoAbr = strlen($conteudo) > 255 ? substr($conteudo, 0, 252)."..." : $conteudo;
            $src = $pathIcone != "" ? "../grow/arquivos/uploads/{$pathIcone}" : "' class='d-none";
            $icone = NULL;
            if($tipo == "imagem")
                $icone = "<img src='$src'>";
            else if($tipo == "video")
                $icone = "<video src='$src' controls></video>";

            $html = <<<EOL
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
                        <meta name="robots" content="index,follow">
                        <meta name="googlebot" content="noodp">
                        <link rel="icon" type="image/png" href="../arquivos/favicon.png">
                
                        <meta name="description" content="{$conteudoAbr}">
                        <title>Blog | {$titulo}</title>
                
                        <!--[if lt IE 9]>
                            <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
                        <![endif]-->
                
                        <!-- Bootstrap CSS -->
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                        
                        <!-- CSS Customizado -->
                        <link href="../css/estilo.css" rel="stylesheet">
                        <link href="../css/blog.css" rel="stylesheet">
                        
                    </head>
                
                    <body>
                
                        <!-- Cabeçalho -->
                        <header>
                            <div class="container-maxw pt-3">
                                <nav class="navbar navbar-expand-md">
                
                                    <a href="index.php" class="navbar-brand" style="max-width: 250px; min-width: 200px; width: 33%;">
                                        <img src="../arquivos/logo.png" class="img-fluid" alt="Dedetizadora Freitas">
                                    </a>
                            
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#nav-header" class="navbar-toggler">
                                        <i class="navbar-toggler-icon"></i>
                                    </button>
                            
                                    <div class="collapse navbar-collapse mt-5 mt-md-0" id="nav-header">
                                        <ul class="navbar-nav ms-auto">
                                            <li class="nav-item">
                                                <a href="../index.php" class="nav-link">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="../index.php#sobre" class="nav-link">Sobre</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="../servicos.php" class="nav-link">Serviços</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="../contato.php" class="nav-link nav-button">Contato</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </header>
                
                        <main>
                            
                            <section id="capa-blog">
                                <div class="sobreposicao bg-black" style="opacity: 50%;"></div>
                                <div class="container-maxw d-flex" style="font-size: 10px">
                                    <h2 class="text-white align-self-center">{$titulo}</h2>
                                </div>
                            </section>
                
                            <section id="blog">
                                <div class="container-maxw">
                                    <div class="row justify-content-center gap-2">
                                        {$icone}
                                        <h2 class="text-secondary p-0 mt-3">{$subtitulo}</h2>
                                        <div class="p-0">
                                            {$conteudo}
                                        </div>
                                        <h5>Postado em: {$data}</h5>
                                    </div>
                                </div>
                            </section>
                            
                            <!-- Botão Whats -->
                            <?php include '../templates/botao-whats.html' ?>
                
                        </main>
                
                        <!-- Rodapé -->
                        <footer>
                            <div class="container-maxw text-center">                
                                <div class="row">
                                    <div class="col-6 col-md-3 p-3">
                                        <div class="bg-white rounded-4 p-3 shadow">
                                            <a href="index.php"><img src="../arquivos/logo.png" alt="Dedetizadora Freitas" width="100%"></a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-7 d-flex justify-content-center p-3">
                                        <div class="align-self-center">
                                            <h5>Atendimento: Segunda a Sexta: 08h-18h Sábado: 08h-12h</h5>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex p-3">
                                        <div class="col row align-self-center justify-content-center justify-content-md-around social-media">
                                            <a href="https://pt-br.facebook.com/freitasdedetizadora" class="col-4"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="https://www.instagram.com/dedetizadorafreitas/" class="col-4"><i class="fa-brands fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        Desenvolvido por <a href="https://www.growagency.com.br">Grow Agency</a>
                                    </div>
                                </div>
                            </div>
                
                            <img src="../arquivos/arte.png" alt="" id="detalhe-footer" class="d-none d-xxl-block">
                        </footer>
                        
                        <!-- Bootstrap JS, Font-Awesome JS -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
                        <script src="https://kit.fontawesome.com/bc6bade300.js" crossorigin="anonymous"></script>
                    </body>
                </html>
            EOL;
            $file = fopen("../../blog/$fileName.php", "w");
            fwrite($file, $html);
        }

        private function DeleteFile($titulo){
            $fileName = strtolower($titulo);
            $fileName = str_replace(" ", "-", $fileName);
            unlink("../../blog/$fileName.php");
        }

        private function PostExiste(){
            if(!is_null($this->id)){
                $con = new Conexao();
                $crud = new Crud($con);

                $row = $crud->PrepareAndFetch(
                    "SELECT * FROM gr_posts
                    WHERE id_post = ?",
                    [$this->id]
                );

                if($row)
                    return 1;
                else
                    return 0;
                
            }
            else
                return 0;
        }

        private function TituloExiste(string $titulo){
            $con = new Conexao();
            $crud = new Crud($con);
            $row = $crud->PrepareAndFetch(
                "SELECT * FROM gr_posts
                WHERE titulo = ?
                AND id_post != ?",
                [$titulo, $this->id]
            );
            return count($row);
        }

        private function ImagemExiste(int $id_upload){
            $con = new Conexao();
            $crud = new Crud($con);
            $row = $crud->PrepareAndFetch(
                "SELECT * FROM gr_uploads
                WHERE id_upload = ?
                AND (tipo = 'imagem'
                OR tipo = 'video')",
                [$id_upload]
            );
            return count($row);
        }

        private function getPostInfo($info){
            $con = new Conexao();
            $crud = new Crud($con);

            $row = $crud->PrepareAndFetch(
                "SELECT * FROM gr_posts WHERE id_post = ?",
                [$this->id]
            )[0];

            return $row[$info];
        }

        private function getUploadInfo($info, $id_upload){
            $con = new Conexao();
            $crud = new Crud($con);

            $row = $crud->PrepareAndFetch(
                "SELECT * FROM gr_uploads WHERE id_upload = ?",
                [$id_upload]
            )[0];

            return $row[$info];
        }
    }
?>