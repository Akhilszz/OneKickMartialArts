<?php

include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to,$subject, $msg){
	//$obj=new Connectionclass();
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "kickfiremartialarts@gmail.com"; // Sender's Email
	$mail->Password = "agwl bjne lupk lhzc"; //Sender's Email App Password
	$mail->SetFrom("kickfiremartialarts@gmail.com"); // Sender's Email
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		
		

}
}
?>