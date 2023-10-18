<?php
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    define('HOST', 'smtp.hostinger.com');
    define('PORT', 465);
    define('USERNAME_EMAIL', 'contato@freitasdedetizadora.com.br');
    define('PASSWORD_EMAIL', 'Formigas@cagonas123');
    
    $dados = $_POST;
    $nome = $dados['nome'];
    $email = $dados['email'];
    $telefone = $dados['telefone'];
    $local = $dados['local'];

    $servicos .= $dados['desinsetizacao'] != NULL ? 'Desinsetização - ' : '';
    $servicos .= $dados['desratizacao'] != NULL ? 'Desratização - ' : '';
    $servicos .= $dados['pombos'] != NULL ? 'Manejo de pombos e morcegos - ' : '';
    $servicos .= $dados['descupinizacao'] != NULL ? 'Descupinização - ' : '';
    $servicos .= $dados['sanitizacao'] != NULL ? 'Sanitização - ' : '';
    $servicos .= $dados['desinsetizacao'] != NULL ? "Caixa d'água - " : '';
    $servicos[strlen($servicos) - 2] = ' ';

    $mensagem = "
        <h1>Formulário de contato realizado pelo site Dedetizadora Freitas</h1>
        <p><strong>Nome: </strong>{$nome}</p>
        <p><strong>E-mail: </strong>{$email}</p>
        <p><strong>Telefone: </strong>{$telefone}</p>
        <p><strong>Serviços: </strong>{$servicos}</p>
        <p><strong>Local: </strong>{$local}</p>
        <small>Desenvolvido por https://www.growagency.com.br</small>
    ";
    
    if(empty($nome) || empty($email) || empty($telefone) || empty($telefone))
        $mensagem = NULL;

    function EnviaEmail($assunto, $body, $destinatario){
        if($body == NULL)
            return 0;
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = HOST;
        $mail->Port = PORT;
        $mail->Username = USERNAME_EMAIL;
        $mail->Password = PASSWORD_EMAIL;

        $mail->setFrom(USERNAME_EMAIL, 'Contato site');
        $mail->addAddress($destinatario);
        $mail->Subject = $assunto;
        $mail->Body = $body;
    
        if($mail->send())
            return 1;
        else
            return 0;
    }

    if(EnviaEmail('Formulario de contato', $mensagem, 'gildoricardofreitas@gmail.com'))
        echo "<script>alert('Recebemos sua mensagem, obrigado por entrar em contato')</script>";
    else
        echo "<script>alert('Não foi possível receber sua mensagem, tente novamente mais tarde')</script>";
    echo '<meta http-equiv="refresh" content="0;url=../contato.php">';
?>