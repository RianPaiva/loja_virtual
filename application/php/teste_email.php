<?php

function send_mail($nome_cliente, $email_cliente){

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP(); 

// Enviar por SMTP 
$mail->Host = "smtp.office365.com"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'projeto.lstore@outlook.com'; 
$mail->Password = "@lstore2023"; 

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
// $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "projeto.lstore@outlook.com"; 

// Seu nome 
$mail->FromName = "Lavechia Store"; 

// Define o(s) destinatário(s) 
$mail->AddAddress($email_cliente, $nome_cliente); 

// Opcional: mais de um destinatário
// $mail->AddAddress('email@email.com'); 


// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = "Bem Vindo(a) a Lavechia Store!"; 


 $mensagem = '
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<style>
    
    @media (max-width: 768px) {

        .bg-gold {
            font-size: 35px;
        }

        .bg-white {
            margin-bottom: 100px;
            margin-top: 100px;
        }

        .bg-black-b {
            margin-bottom: 0px;
        }

        .p-text {
            font-size: 20px;
            margin-top: 50px;
        }

        .p-text-2 {
            font-size: 20px;
        }

        igm {
            width: 360px;
            height: 192.13;
        }

    }
</style>

<body style="margin: 0; font-family: "roboto"; color: black; text-align: center; align-items: center; justify-content: center;">

    <div style="background-color: black; height: 192.13px; width: 100%; text-align: center;">

        <picture>
            <source media="(max-width: 768px)" srcset="lavechiastoresemfundo.png">
            <img style="height: 192.13px; width: 700px;" src="lavechiastore.png" alt="Logo Lavechia Store">
        </picture>

    </div>

    <div style="background-color: #CFB53B; height: 90px; width: 100%; font-size: 50px; text-align: center;">

        <p style="margin: 0; color: black;"><b>SEJA BEM VINDO!</b></p>

    </div>

    <div style="background-color: white; height: 804px; width: 100%; font-size: 30px;">

        <p style="margin-left: 400px; margin-right: auto; margin-top: 70px; display: flex; text-indent: 0; justify-content: center; align-items: center; font-size: 30px;">
            Olá, '.$nome_cliente.'! <br> <br>
            Sua conta na Lavechia Store está quase pronta. <br>
            Para ativá-la, por favor confirme <br>
            o seu endereço de Email clicando no link abaixo.
        </p>

        <button style="height: 70px; width: 243.4px; border-radius: 10px; font-size: 30px; background-color: #CFB53B; cursor: pointer; border: none; display: block; margin: auto; margin-top: 40px; margin-bottom: 40px;"><b>Ativar a Conta</b></button>

        <p style="margin-left: 400px; margin-right: auto; margin-bottom: 70px; display: flex; text-indent: 0; justify-content: center; align-items: center; font-size: 30px;">
            Sua conta não será ativada até que seu Email seja <br> confirmado. <br> <br>
            Se você não se cadastrou na Lavechia Store <br> recentemente, por favor ignore este Email. <br> <br>
            Agradecemos pelo seu interesse e estamos <br> ansiosos pela sua primeira compra! <br> <br>
        </p>

    </div>

    <div style="background-color: #CFB53B; height: 90px; width: 100%; font-size: 50px; text-align: center;">

        <p style="margin: 0; color: black"><b>@LAVECHIA__STORE</b></p>

    </div>

    <div style="background-color: black; height: 192.13px; width: 100%;">

    </div>

</body>

</html>
 
 '; 
// Corpo do email 
$mail->Body =  $mensagem;

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
if ($mail->Send()) 
{ 
    return "Email enviado com sucesso!";
}else{
    return "Email falha";
}


}

send_mail("Vinicius", "vini.gama741@gmail.com");
