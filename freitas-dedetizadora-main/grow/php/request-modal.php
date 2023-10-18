<?php
    require_once('../classes/Conexao.php');
    require_once('../classes/Crud.php');
    if(isset($_POST['id'])){
        $con = new Conexao();
        $crud = new Crud($con);
        $id = $_POST['id'];

        $row = $crud->PrepareAndFetch(
            "SELECT * FROM gr_uploads
            WHERE id_upload = ?",
            [$id]
        )[0];

        $autor = $row['autor'];
        $nome = $row['nome'];
        $extensao = $row['extensao'];
        $tipo = $row['tipo'];
        $data = $row['data'];
        $arquivo;
        
        if($tipo == 'imagem'){
            $arquivo = <<<EOL
                <img src='arquivos/uploads/{$nome}{$extensao}' width='100%'>
            EOL;
        }else if($tipo == 'video'){
            $arquivo = <<<EOL
                <video src='arquivos/uploads/{$nome}{$extensao}' controls width='100%'></video>
            EOL;
        }
        
        echo <<<EOL
            <div class='row g-4'>
                <div class='col-12 col-md-6'>
                    $arquivo
                </div>
                <div class='col-12 col-md-6 position-relative'>
                    <h2 class='text-center'>Detalhes do envio</h2>
                    <h6><b>Autor:</b> {$autor}</h6>
                    <h6 id="nome"><b>Nome:</b> {$nome}</h6>
                    <h6><b>Extensão:</b> {$extensao}</h6>
                    <h6 class='text-capitalize'><b>Tipo:</b> {$tipo}</h6>
                    <h6><b>Data envio:</b> {$data}</h6>
                    <a class="" onclick=DeleteFile({$id})>Apagar arquivo</a>

                    <h2 class='text-center'>Editar</h2>
                    <div class='mb-3'>
                        <label for='editar-nome'>Nome</label>
                        <input type='text' placeholder='{$nome}' id='editar-nome'>
                    </div>
                    <a class='mt-5 mb-2 salvar' onclick="RenameFile('{$nome}', '{$extensao}', {$id})">Salvar</a>
                    <div id='response'></div>
                </div>
            </div>
            <a onclick=CloseModal() class="close">X</a>
        EOL;
    }
?>