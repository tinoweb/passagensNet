<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;

$mail->IsSMTP();     
$mail->SMTPDebug = 1;
$mail->CharSet = 'UTF-8';                
$mail->SMTPAuth   = true;    

$mail->SMTPSecure = 'ssl';                  
$mail->Host       = "smtp.gmail.com";       
$mail->Port     = 465;  
$mail->Username   = "tino477@gmail.com";    
$mail->Password   = "Lopesgomes102";     
$mail->From     = "tino477@gmail.com";
$mail->FromName = "Passagens.net";

$mail->addAddress("tino477@gmail.com");
$mail->addReplyTo("tino477@gmail.com", "Reply");

$mail->isHTML(true);

	$data        = $_POST;
    $name        = $data['nome'];
    $email       = $data['email'];
    $telefone    = $data['telefone'];
    $origem         = $data['origem'];
    $destino        = $data['destino'];
    $passAdulto      = $data['passAdulto'];
    $passCrianca     = $data['passCrianca'];
    $passBebe        = $data['passBebe'];
    $dataIda     = $data['dataIda'];
    $dataChegada = $data['dataChegada'];
    
    $body = 
    	'
		   <strong>Nome:</strong>         ' . $name .         '<br>
           <strong>Email:</strong>        ' . $email .        '<br>
		   <strong>Telefone:</strong>     ' . $telefone .     '<br>
		   <strong>Origem:</strong>       ' . $origem .       '<br>
           <strong>Destino:</strong>      ' . $destino .      '<br>
		   <strong>Passgem Adulto:</strong>   ' . $passAdulto .   '<br>
           <strong>Passgem Criança:</strong>  ' . $passCrianca .  '<br>
           <strong>Passgem Bebe:</strong>     ' . $passBebe .     '<br>
           <strong>Data Ida:</strong>     ' . $dataIda .      '<br>
		   <strong>Data chegada:</strong> ' . $dataChegada .  '<br>
		';


$mail->Subject = "Simulação passagem";
$mail->Body = '<p> Olá Olan Novais estou fazendo simulações de passagens no site passagem.net
		   Os dados para contato são: </p>' .$body;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Mensagem enviado com sucesso";
}




