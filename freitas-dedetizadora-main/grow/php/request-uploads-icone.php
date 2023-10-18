<?php
    require_once('../classes/Conexao.php');
    require_once('../classes/Crud.php');

    define("ITENS_POR_PAGINA", 50);
    

    if(isset($_POST['midia'], $_POST['ordenar'], $_POST['pesquisar'], $_POST['pagina'])){
        $con = new Conexao();
        $crud = new Crud($con);

        $tipo = $_POST['midia'];
        $nome = "%".$_POST['pesquisar']."%";
        $ordenar = $_POST['ordenar'];
        $pagina = $_POST['pagina'] + 1;
        $qtBuscar = $_POST['pagina'] < 0 ? ContaTotalArquivos() : ITENS_POR_PAGINA*$pagina;

        $sql = 
            "SELECT id_upload, nome, extensao, data, tipo 
            FROM gr_uploads
            WHERE (tipo = ? OR ? = 'todos') AND nome LIKE ?
            ORDER BY data $ordenar
            LIMIT 0, $qtBuscar";
        $params = [$tipo, $tipo, $nome];
        $row = $crud->PrepareAndFetch($sql, $params);

        $qt = count($row);
        $qtTotal = ContaTotalConsulta(
            "SELECT id_upload, nome, extensao, data, tipo 
            FROM gr_uploads
            WHERE (tipo = ? OR ? = 'todos') AND nome LIKE ?
            ORDER BY data $ordenar",
            [$tipo, $tipo, $nome]
        );

        if($qt){
            echo "<div id='dentro'>";
            foreach($row as $r){
                $path = "arquivos/uploads/".$r['nome'].$r['extensao'];
                $id = $r['id_upload'];
                $tipo = $r['tipo'];

                if($tipo == 'video'){
                    echo <<<EOL
                        <video src='$path' onclick="SelecionaImagem($id, '$tipo')"></video>
                    EOL;
                }
                else if($tipo == 'imagem'){
                    echo <<<EOL
                        <img src='$path' onclick="SelecionaImagem($id, '$tipo')"></img>
                    EOL;
                }
            }
            echo "</div>";

            EchoFora($qt, $qtTotal);
            echo "<button onclick='DeselecionaImagem()'>Redefinir</button>";
        }else{
            EchoFora($qt, $qtTotal);
            echo "<button onclick='DeselecionaImagem()'>Redefinir</button>";
        }
        
    }

    function EchoFora($qt, $count){
        $total = $count;
        $mais = EchoVerMais($qt, $count);
        if($qt == 1){
            echo "
                <div id='fora'>
                    <span class='mb-0'>{$qt} arquivo encontrado (total: {$total})</span>
                    {$mais}
                </div>
            ";
        }else if($qt){
            echo "
                <div id='fora'>
                    <span class='mb-0'>{$qt} arquivos encontrados (total: {$total})</span>
                    {$mais}
                </div>
            ";
        }else{
            echo "
                <div id='fora'>
                    <span class='mb-0'>Nenhum arquivo encontrado...</span>
                </div>
            ";
        }
    }

    function EchoVerMais($qt, $count){
        if($qt < $count){
            return "
                <div>
                    <a class='' onclick=SetaOffset(1)>Ver mais</a>
                    <span>|</span>
                    <a class='' onclick=SetaOffset(-1)>Ver tudo</a>
                </div>
            ";
        }
    }

    function ContaTotalConsulta($sql, $params){
        $con = new Conexao();
        $crud = new Crud($con);

        $row = $crud->PrepareAndFetch($sql, $params);
        return count($row);
    }

    function ContaTotalArquivos(){
        $con = new Conexao();
        $crud = new Crud($con);

        $row = $crud->PrepareAndFetch(
            "SELECT * FROM gr_uploads",
            NULL
        );

        return count($row);
    }
?>