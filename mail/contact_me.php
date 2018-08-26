<?php
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
//$to = 'milastapenka@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$to = 'contacto@cebs.cl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.

$email_subject = "cebs.cl - Mail: $email_address";

$email_body = "Nombre: $name" . "\r\n";
$email_body .= "Mail: $email_address" . "\r\n"; 
$email_body .= "Telefono: $phone" . "\r\n \r\n";
$email_body .= "$message";

$headers = "From: noreply@cebs.cl\n"; // This is the email address the generated message will be from. We recommend using something like 

$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>