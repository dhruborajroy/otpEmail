<?php 
function emailBody($otp){
    return $body='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Lalmonirhat Science & Literature Club</a>
    </div>
    <p style="font-size:1.1em">Hi, Dhrubo</p>
    <p>Thank you for choosing Your Brand. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
    
    <div style="display:inline-flex;">
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$otp.'</h2>
    <p style="margin-left:10px">OR</p>
    <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600"><h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;margin-left:10px">Verify Email</h2></a>
    </div>
    
    <p style="font-size:0.9em;">Regards,<br />Your Brand</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>Lalmonirhat Science & Literature Club</p>
      <p>Lalmonirhat</p>
    </div>
  </div>
</div>';
}
$html=emailBody(555);
require("./smtp/class.phpmailer.php");
function send_email($email,$html,$subject){
	$mail=new PHPMailer(true);
// 	$mail->SMTPDebug=3;
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
