<?php

namespace App\Mailer;

use App\Mailer\Exception;
use App\Mailer\SMTP;
use App\Mailer\PHPMailer;

class Mailer{

    public function sendConfirmationMail($email) {
        $mail = new PHPMailer(true);
        $mailid = $email;
        $subject = "Account confirmation";
        $message = "Open the link bellow to confirm your account:";

        try {
            $mail->IsSMTP();
            $mail->isHTML(true);
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = '587';
            $mail->AddAddress($mailid);
            $mail->Username ="ipch.service@gmail.com";
            $mail->Password ="90fef89bb091be";
            $mail->SetFrom('ipch.service@gmail.com','IPch Service');
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