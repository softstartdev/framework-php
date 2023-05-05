<?php

/*
 * Envia un emails a varios usuarios usando PhpMailer si está configurado.
 *

$subject = "Prueba envío de emails";
$message = "<h3>Prueba de envío de correo</h3>";

$emails = array();

$emails[] = array(
	"fromName" 	=> "Example 1",
	"fromEmail"	=> "example1@email.com",
	"toEmail"	=> "Example 2",
	"toName"	=> "example2@email.com",
	"subject"	=> $subject,
	"message"	=> $message
);

$emails[] = array(
	"fromName" 	=> "Example 1",
	"fromEmail"	=> "example1@email.com",
	"toEmail"	=> "Example 3",
	"toName"	=> "example3@email.com",
	"subject"	=> $subject,
	"message"	=> $message
);

STemailSend(arrar(
		"host" => 		"mail.domain.com",
		"port" => 		"587",
		"user" => 		"user@domain.com",
		"password" => 	"123456",
	),
	$emails, true
);
*/

/*
 * IMPORTANTE:
 * Es necesario ir a la cuenta de Google (No de GMail).
 * Ir a seguridad/Habilitar acceso a aplicaciones poco seguras.
 * Activar para permitir.
 */

 namespace MxSoftstart\FrameworkPhp\classes\smtp;

//require_once dirname(__FILE__) . '/php-mailer/class.phpmailer.php';

class Mail {
    
    public function __construct() {}
	
    public static function send($server, $mails, $isHtml = true) {
		
		if (
			$server["host"] !== "" &&
			$server["user"] !== "" &&
			$server["password"] !== ""
		) {
			
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer   = "smtp";
			$mail->SMTPAuth = true;
			$mail->Host     = $server["host"];
			$mail->Port 	= $server["port"];
			$mail->Username = $server["user"];
			$mail->Password = $server["password"];

			// Fix: para G Mail
			$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			
			foreach ($mails as $data) {

				$mail->FromName = $data["fromName"];
				$mail->From     = $data["fromEmail"];

				$mail->AddAddress($data["toEmail"], $data["toName"]);
				
				//echo $data["subject"];
				$mail->Subject = "=?ISO-8859-1?B?" . base64_encode(utf8_decode($data["subject"])) . "=?=";
				//$mail->Subject = utf8_decode($data["subject"]);//Cuidado con los acentos
				//$mail->CharSet = 'UTF-8';
				//$mail->Subject = "test 1407";

				$mail->IsHTML("true");
				//$mail->MsgHTML("<html><head><title>{$data["subject"]}</title></head><body>{$data["message"]}</body></html>");
				$mail->MsgHTML(utf8_decode($data["message"]));
				
				if (!$mail->Send()) {
					echo "Mailer Error: " . $mail->ErrorInfo;
					return "ERROR";
				} else {
					return "OK";
				}
			}

		} else {
			foreach ($datas as $data) {
				@mail($data['toEmail'], $data['subject'], $data['message']);
			}
		}
	}
	
}

?>