<?php
    class ErrosLogin{
        public static $ErrList = [
            '1' => 'Sessão expirada',
            '2' => 'Usuário ou senha incorretos',
            '3' => 'Preencha todos os campos'
        ];
    }

    class ErrosUpload{
        public static $ErrList = [
            0 => "<p class='text-success mb-0 col-auto'>Arquivo enviado com sucesso</p>",
            1 => "<p class='text-danger mb-0 col-auto'>Selecione um arquivo</p>",
            2 => "<p class='text-danger mb-0 col-auto'>Formato não permitido</p>",
            3 => "<p class='text-danger mb-0 col-auto'>Nome do arquivo muito grande</p>",
            4 => "<p class='text-danger mb-0 col-auto'>Já existe um arquivo com este nome</p>",
            5 => "<p class='text-danger mb-0 col-auto'>Erro no banco de dados</p>",
            6 => "<p class='text-danger mb-0 col-auto'>Erro em um ou mais arquivos</p>",
            7 => "<p class='text-danger mb-0 col-auto'>Número maximo de arquivos excedido (20)</p>",
        ];
    }

    class ErrosRenomearArquivo{
        public static $ErrList = [
            0 => "<p class='text-success mb-0'>Salvo com sucesso</p>",
            1 => "<p class='text-danger mb-0'>Digite um nome válido</p>",
            2 => "<p class='text-danger mb-0'>Erro ao renomear arquivo</p>",
            3 => "<p class='text-danger mb-0'>Erro no banco de dados</p>"
        ];
    }

    class ErrosPosts{
        public static $ErrList = [
            0 => "<p class='text-success mb-0'>Post criado/atualizado com sucesso</p>",
            1 => "<p class='text-danger mb-0'>Preencha todos os campos</p>",
            2 => "<p class='text-danger mb-0'>Titulo ou subtitulo excederam o limite de 245 caracteres</p>",
            3 => "<p class='text-danger mb-0'>Conteudo muito grande</p>",
            4 => "<p class='text-danger mb-0'>Falha ao criar post, ele já existe</p>",
            5 => "<p class='text-danger mb-0'>Falha ao atualizar post, ele não existe</p>",
            6 => "<p class='text-danger mb-0'>Código do post nao deve existir para cria-lo</p>",
            7 => "<p class='text-danger mb-0'>Erro ao encontrar esta imagem</p>",
            8 => "<p class='text-danger mb-0'>Este título já esta em uso</p>",
            9 => "<p class='text-danger mb-0'>Erro no banco de dados</p>",
            9 => "<p class='text-danger mb-0'>Erro ao escrever o arquivo</p>"
        ];
    }
?>