<?php
/*
echo ('linha 2');

require_once("/src/PHPMailer.php");
require_once("/src/SMTP.php");
require_once("/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
//include_once("PHPMailer/src/OAuth.php");
//include_once("PHPMailer/src/PHPMailer.php");
//include_once("PHPMailer/src/SMTP.php");
//include_once("PHPMailer/src/Exception.php");


echo ('linha 10');
// Inicia a classe PHPMailer 
//$mail = new PMailer;
$mail = new PMailer();
echo ('linha 13');
// Método de envio 
$mail->IsSMTP();

// Enviar por SMTP 
$mail->Host = 'smtp.gmail.com';

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 25;


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true;

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'reginaldobrain@gmail.com';
$mail->Password = 'saguides@123';

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
// $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "reginaldobrain@gmail.com";

// Seu nome 
$mail->FromName = "Reginaldo";

// Define o(s) destinatário(s) 
$mail->AddAddress('reginaldobrain@gmail.com', 'Regi');

// Opcional: mais de um destinatário
// $mail->AddAddress('fernando@email.com'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true);

// Charset (opcional) 
$mail->CharSet = 'UTF-8';

// Assunto da mensagem 
$mail->Subject = "Assunto da mensagem";

// Corpo do email 
$mail->Body = 'Aqui entra o conteudo texto do email';

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send();

// Exibe uma mensagem de resultado 
if ($enviado) {
    echo "Seu email foi enviado com sucesso!";
} else {
    echo "Houve um erro enviando o email: " . $mail->ErrorInfo;
}

/*

// The message
$message = "Line 1\nLine 2\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send
mail('anabetevieira@ig.com.br', 'My Subject', $message);

*/

//-------------------------------
function evmail($destino, $assunto){

    // emails para quem será enviado o formulário
    // $emailenviar = "seuemail@seudominio.com.br";
    $nome = "nometeste";
    $email = "reginaldobrain@gmail.com";
 
 
  // É necessário indicar que o formato do e-mail é html
    //  $headers  = 'MIME-Version: 1.0'."\r\n";
   //  $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
   //   $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";
   echo ('linha 121');
 $enviaremail = mail($destino, $assunto, $headers);
echo ('linha 123');
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
}
$emailenviar = "reginaldobrain@gmail.com";
$destino = $emailenviar;
$assunto = "Contato pelo Site";

evmail($destino, $assunto);
?>






