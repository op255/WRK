<?php

namespace App\Mailer;

use App\Mailer\Exception;
use App\Mailer\SMTP;
use App\Mailer\PHPMailer;

class Mailer{

    public function sendConfirmationMail($email, $token) {
        require 'Config/MailerConfig.php';
        $mail = new PHPMailer(true);

        $subject = "Account confirmation";
        $message = "Open the link to confirm your account: https://ip.ch/confirm$token";

        try {
            $mail->IsSMTP();
            $mail->isHTML(true);
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = '587';
            $mail->AddAddress($email);
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SetFrom($username,'IPch Service');
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = $message;
            $mail->Send();
        }
        catch(phpmailerException $ex) {
            $msg = "
            ".$ex->errorMessage()."
            ";
        }
    }

}

?>
