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
 
 Seja bem vindo!
 
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
