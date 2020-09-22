
<?php session_start()?>
<?php
//echo ('linha 4');

/* nao funciona da versao gratis

require dirname(__FILE__) . '/../PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/../PHPMailer/src/SMTP.php';
require dirname(__FILE__) . '/../PHPMailer/src/Exception.php';
// use PHPMailer\PHPMailer\src\PHPMailer;
//  use PHPMailer\PHPMailer\src\SMTP;
//  use PHPMailer\PHPMailer\scr\Exception;


/// $emailCli = $_SESSION['semail'];
// $texto    = $_SESSION['stexto'];


//
// $emailCliente = 'albertschymydt@gmail.com';
$emailCli = 'reginaldobrain@gmail.com';

  $emailCliente = 'reginaldobrain@gmail.com';
  $texto = 'mgs';
echo ('linha 18');
   //function envia($emailCli,$texto){
  echo ('linha 27');
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  echo ('linha 28');
        try{

            $email->SMTPDebug = SMTP::DEBUG_SERVER;
            $email->isSMTP();

            $email->Host = 'smtp.gmail.com';

            $email->Username = 'reginaldobrain@gmail.com';
            $email->Password = 'saguides@123';
            $email->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
  echo ('linha 40');
            $email->setFrom = ('reginaldobrain@gmail.com');
  echo ('linha 42');
           // $email->addAddress($emailCli);
            $mail->AddAddress('reginaldobrain@gmail.com', 'Regi');
            echo ('l45');
            $email->isHTML(true);
  echo ('l47');
            $email->Subject = 'teste de email';
            $email->Body = $texto; //'Parabens voce adqueriu um otimo sistema seu plano é :'.$tipo;
            $email->AltBody = 'email regi passando';
  echo ('l51');
             $mail->Send();
  echo ('l53');
            if($email->send()){
                echo 'enviado';
            }else{
                echo 'nao enviou';
            }
        }catch (Exception $e){
        echo "erro ao enviar a mensagem :{$email->ErrorInfo} ";

        }
 //  }
  // envia($emailCliente,$texto);

   // https://www.yougetsignal.com/tools/open-ports/ testa porta fechada
   */


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.

$destinatario = "vitorsaop@gmail.com";
$assunto      = "lincensa de uso do sistema conversao";
$texto        = "obrigado por comprar o sistema";


$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
$headers .= "From: reginaldobrain@gmail.com\r\n"; // remetente
$headers .= "Return-Path: reginaldobrain@gmail.com\r\n"; // return-path

//$envio = mail("destinatario@algum-email.com", "Assunto", "Texto", $headers);
$envio = mail("$destinatario", "$assunto", "$texto", $headers);
 
if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem não pode ser enviada";
?>

?>