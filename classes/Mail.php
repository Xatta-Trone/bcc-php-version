<?php 
/**
* User Level Class
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class Mail{

	private $from;
	private $to;
	private $subject;
	private $body;
	
	
	function __construct(){

	}


	public function sendMail($to,$subject,$message,$from){
		$send = mail($to, $subject, $message,$from);

		if ($send) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Message Sent Succesfully</div>';
				return $msg;
			//self::markSentMailById($id);
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Message Not Sent</div>';
			return $msg;
			}

	}


	public function sendEmail($to,$body,$from = 'admin@buetcareerclub.org',$subject='',$from_name='Admin'){

		require 'mailer/src/Exception.php';
		require 'mailer/src/PHPMailer.php';
		require 'mailer/src/SMTP.php';

		$mail = new PHPMailer(true);

		try {

/*			
    SMTP::DEBUG_OFF (0): Disable debugging (you can also leave this out completely, 0 is the default).
    SMTP::DEBUG_CLIENT (1): Output messages sent by the client.
    SMTP::DEBUG_SERVER (2): as 1, plus responses received from the server (this is the most useful setting).
    SMTP::DEBUG_CONNECTION (3): as 2, plus more information about the initial connection - this level can help diagnose STARTTLS failures.
    SMTP::DEBUG_LOWLEVEL (4): as 3, plus even lower-level information, very verbose, don't use for debugging SMTP, only low-level problems.*/


			$mail->SMTPDebug = 0;

			$mail->isSMTP();

			$mail->Host = 'server4.hostthewebsite.com';

		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'admin@buetcareerclub.org';  

			$mail->Password = 't25QSf66jk';

			$mail->SMTPSecure = 'ssl'; //tls

			$mail->Port = 465;

			$mail->setFrom($from,$from_name);

			//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

			$mail->addAddress($to);

			//$mail->addReplyTo('info@example.com', 'Information');
		   // $mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			$mail->isHTML(true);

			if (!empty($subject)) {
				$mail->Subject = $subject;   
			}
			$mail->Body    = $body;

			$mail->send();
			//echo 'Message has been sent';
			
		} catch (Exception $e) {
			echo 'Message could not be sent.';
   			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}



	}



}//end of class



 ?>