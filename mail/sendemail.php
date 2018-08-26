<?php
function sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject/*, $template*/){
	require("PHPMailer-master/src/PHPMailer.php");
	require("PHPMailer-master/src/Exception.php");
  	require("PHPMailer-master/src/SMTP.php");
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	//indico a la clase que use SMTP
	$mail->IsSMTP();
	//permite modo debug para ver mensajes de las cosas que van ocurriendo
	$mail->SMTPDebug = 1;
	//indico el servidor de Gmail para SMTP
	$mail->Host = 'smtp.gmail.com';
	//Debo de hacer autenticación SMTP
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tsl';
	//indico el puerto que usa Gmail
	$mail->Port = 587;
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    	)
	);
	$mail->CharSet = 'UTF-8';

	//indico un usuario / clave de un usuario de gmail
	$mail->Username = 'adhes.khan@gmail.com'; //$mail_username;
	$mail->Password = '9mm-beretta'; //$mail_userpassword;
	$mail->SetFrom($mail_setFromEmail, $mail_setFromName);
	$mail->AddReplyTo($mail_setFromEmail, $mail_setFromName);
	$mail->Subject = $mail_subject;
	$mail->MsgHTML($txt_message);
	//indico destinatario
	$address = $mail_addAddress;
	$mail->AddAddress($address, "CEBS.cl");
	if(!$mail->Send()) {
	echo "Error al enviar: " . $mail->ErrorInfo;
	} else {
	echo "Mensaje enviado!";
	}
}
?>