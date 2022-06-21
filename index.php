<?php 
require("./smtp/class.phpmailer.php");
function send_email($email,$html,$subject){
	$mail=new PHPMailer(true);
	//$mail->SMTPDebug=3;
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->setFrom('yourgmail@gmail.com', 'Dhrubo');
	$mail->Username="yourgmail.com@gmail.com";
	$mail->Password="Password";
	$mail->addAddress($email,'Joe User');
	$mail->IsHTML(true);
	$mail->Subject=$subject;
	$mail->Body=$html;
    	//$mail->addAttachment('/var/tmp/file.tar.gz');      
    	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 
	$mail->SMTPOptions=array(
	    'ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
	if($mail->send()){
		return "done";
	}else{
		return "Error occur";
	}
}
echo send_email("Dhruborajroy3@gmail.com",$html,"otp1");



function send_email_using_tamplate(){
	$tamplate= "./email.php";
	$file_content=file_get_contents($tamplate);
	$array=array(
		"{YOUR_NAME}"=>"DHRUBO 1",
		"{OTP_NUMBER}"=>rand(),
	);
	$keys = array_keys($array);
	$values = array_values($array);
	return str_replace($keys, $values, $file_content);
}
