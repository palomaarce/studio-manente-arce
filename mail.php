<?php

//use PHPMailer\PHPMailer\PHPMailer;

//require 'PHPMailer/src/Exception.php';
//require 'PHPMailer/src/PHPMailer.php';
//require 'PHPMailer/src/SMTP.php';
//require 'PHPMailer2/PHPMailer/PHPMailerAutoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//require_once('PHPMailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    //$mail->Port = '465'; //porta usada pelo gmail.
    

    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = "587"; 
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = "true"; 
    $mail->Username = "palomaarce456franciele@gmail.com"; // usuario gmail.   
    $mail->Password = "mk@3031@kz"; // senha do email.

    /*$mail->IsHTML(true); 
    $mail->Mailer = 'smtp'; 
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false; 
    */

    $mail->setFrom($mail->Username, "Paloma Arce");
    $mail->addAddress("palomaaarce456franciele@gmail.com");
    $mail->Subject="FORMULÁRIO DE CONTATO";

    $conteudo_email="Você recebeu uma mensagem de $nome ($email):
    <br><br>
    Mensagem: <br>
    $mensagem
    ";

    $mail->IsHTML(true);
    $mail->Body=$conteudo_email;
    //$mail->SingleTo = true; 

// configuração do email a ver enviado.
    //$mail->From = "palomaarces@outlook.com"; 
    //$mail->FromName = "Paloma"; 

    //$mail->addAddress("palomaaarce456franciele@gmail.com"); // email do destinatario.

   // $mail->Subject = "Contato pelo Site"; 
    //$mail->Body = $mensagem;

    if($mail->Send()){
        echo "Email enviado com sucesso";
    } else{
        echo "Erro ao enviar Email:" . $mail->ErrorInfo;
    }
?>