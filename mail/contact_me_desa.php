<?php
include("sendemail.php");

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
   echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$mail_username = 'adhes.khan@gmail.com';
$mail_password = '9mm-beretta';

$to = 'milastapenka@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.

$email_subject = "cebs.cl - Mail: $email_address";

$email_body = "Nombre: $name <br> Mail: $email_address <br> Teléfono: $phone <br><br> $message";

//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like 

//$headers .= "Reply-To: $email_address";   
//mail($to,$email_subject,$email_body,$headers);

sendemail($mail_username, $mail_password, $email_address, $name, $to, $email_body, $email_subject)
//return true;         
?>