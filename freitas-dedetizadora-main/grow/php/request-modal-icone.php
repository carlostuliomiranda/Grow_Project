<?php
    $resposta = [
        '<div class="w-100 d-flex align-items-center gap-3 p-2 flex-wrap" style="background-color: #ececec">
            <select id="midia" onchange="RequestUploads()">
                <option value="todos">Todas as mídias</option>
                <option value="imagem">Imagens</option>
                <option value="video">Vídeos</option>
            </select>

            <select id="ordenar" onchange="RequestUploads()">
                <option value="DESC">Mais recentes</option>
                <option value="ASC">Mais antigos </option>
            </select>
            
            <div class="ms-auto">
                <label for="pesquisar">Pesquisar</label>
                <input type="text" id="pesquisar" style="height: 25px;" onkeyup="RequestUploads()">
            </div>
        </div>

        <div id="container-imagens">
            Carregando arquivos...
        </div>'
    ];

    echo json_encode($resposta);
?>